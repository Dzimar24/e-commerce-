<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Product extends CI_Controller
{

	// ? Check Page :
	// ? show_error('Ok Page already exists');

	public function __construct()
	{
		# code...
		parent::__construct();
		$this->load->model('Product_m');
	}

	public function product($id)
	{
		$data['titlePage'] = 'Product Page';
		$data['selectDataProduct'] = $this->Product_m->get_products_by_user($id);
		$this->template->load('templateAdmin', 'pages/store/product', $data);
	}

	public function viewAddProduct()
	{
		# code...
		$data['titlePage'] = 'Product Page';
		$data['secondPage'] = 'Product Add Page';
		$data['selectDatabaseCategory'] = $this->Product_m->selectCategory();
		$this->template->load('templateAdmin', 'pages/store/productAdd', $data);
	}

	public function viewUpdateProduct($id)
	{
		# code...
		$data['titlePage'] = 'Product Page';
		$data['secondPage'] = 'Product Update Page';
		$data['selectDataProductById'] = $this->Product_m->getProductById($id);
		$data['selectDatabaseCategory'] = $this->Product_m->selectCategory();
		$this->template->load('templateAdmin', 'pages/store/productUpdate', $data);
	}

	public function viewsData($id)
	{
		# code...
		$data['viewProduct'] = $this->Product_m->getProductByIdProduct($id);
		$data['titlePage'] = 'View Product';
		$this->load->view('pages/store/viewDataProduct', $data);

	}

	public function addProduct()
	{
		# code...
		//Todo: Add Product
		$imageProduct = date('YmdHis') . '.jpg';
		$id = $this->session->userdata('idUser');
		$price = $this->input->post('price');

		$price = filter_var($price, FILTER_SANITIZE_NUMBER_INT);

		//? Menggunakan FCPATH untuk memastikan jalur absolut yang benar
		$config['upload_path'] = FCPATH . 'asset/components/image/product/';
		$config['max_size'] = 3072; // 3MB dalam kilobyte
		$config['file_name'] = $imageProduct;
		$config['allowed_types'] = 'jpg|jpeg|png'; // Pertimbangkan untuk mengubah ke tipe file yang lebih spesifik seperti 'jpg|jpeg|png|gif'

		$this->load->library('upload', $config);

		//? Tidak perlu melakukan pengecekan ukuran file manual jika 'max_size' sudah diatur
		if (!$this->upload->do_upload('imageProduct')) {
			$error = $this->upload->display_errors();
			$this->session->set_flashdata('error', 'There was a problem : ' . $error);
			redirect('store/Product/viewAddProduct');
		} else {
			$data = array('upload_data' => $this->upload->data());

			$dataProduct = array(
				'name' => $this->input->post('name'),
				'price' => $price,
				'stock' => $this->input->post('stock'),
				'idCategory' => $this->input->post('idCategory'),
				'description' => $this->input->post('description'),
				'idUser' => $id,
				'image' => $data['upload_data']['file_name']
			);

			$this->Product_m->insertProduct($dataProduct);
			$this->session->set_flashdata('success', 'Product Successfully Added');
			redirect('store/Product/product/' . $id);
		}
	}

	public function updateProduct()
	{
		# code...
		//TODO: Update category 
		$id = $this->input->post('idUser');

		if (isset($_FILES['imageProduct']) && $_FILES['imageProduct']['name'] != '') {
			$imageCategory = $this->input->post('imageProduct');
			$config['upload_path'] = FCPATH . 'asset/components/image/product/';
			$config['max_size'] = 3 * 1024; // 3MB
			$config['file_name'] = $imageCategory;
			$config['overwrite'] = TRUE;
			$config['allowed_types'] = 'jpg|jpeg|png'; // Batasi hanya untuk jpg, jpeg, png

			$this->load->library('upload', $config);

			if ($_FILES['imageProduct']['size'] >= 3 * 1024 * 1024) {
				$this->session->set_flashdata('error', 'Ukuran foto terlalu besar, upload ulang foto dengan ukuran yang kurang dari 3 MB.');
				redirect('store/Category');
			} elseif (!$this->upload->do_upload('imageProduct')) {
				$error = array('error' => $this->upload->display_errors());
				$this->session->set_flashdata('error', 'There was a problem: ' . $error['error']);
				redirect('store/Category');
			} else {
				$upload_data = $this->upload->data();
				$imageCategory = $upload_data['file_name'];
			}

			$this->Product_m->updateDataCategory($imageCategory);
		} else {
			$this->Product_m->updateDataCategory();
		}

		$this->session->set_flashdata('success', 'Product Successfully Updated');
		redirect('store/Product/product/' . $id);

	}

	public function deletedProduct($image)
	{
		//TODO: Delete the product
		$id = $this->session->userdata('idUser');
		// var_dump($id, $image); die;
		// Pastikan ini hanya dijalankan jika permintaan datang dari AJAX
		$filename = FCPATH . 'asset\components\image\product' . $image;

		// var_dump($filename); die;

		// Pastikan file ada sebelum mencoba untuk menghapusnya
		if (file_exists($filename)) {
			unlink("./asset/components/image/product/" . $image); // Hapus file gambar
		}

		// Panggil method untuk menghapus data kategori dari model
		$this->Product_m->deletedDataProduct($image);

		// Kirim respons JSON ke client
		$this->session->set_flashdata('success', 'Product Successfully Deleted');
		redirect('store/Product/product/' . $id);
	}
}
