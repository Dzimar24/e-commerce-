<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Category extends CI_Controller
{

	public function __construct()
	{
		# code...
		parent::__construct();
		$this->load->model('Category_m');
		$this->load->library('form_validation');
	}

	public function index()
	{
		# code...
		$data['titlePage'] = 'Category Product Page';
		$data['displayDataCategory'] = $this->Category_m->selectImageCategory();
		$this->template->load('templateAdmin', 'pages/store/Category', $data);
	}

	public function plusCategory()
	{
		//TODO: Upload Image Category to database
		$imageCategory = date('YmdHis') . '.jpg';

		//? Menggunakan FCPATH untuk memastikan jalur absolut yang benar
		$config['upload_path'] = FCPATH . 'asset/components/image/category/';
		$config['max_size'] = 3072; // 3MB dalam kilobyte
		$config['file_name'] = $imageCategory;
		$config['allowed_types'] = 'jpg|jpeg|png'; // Pertimbangkan untuk mengubah ke tipe file yang lebih spesifik seperti 'jpg|jpeg|png|gif'

		$this->load->library('upload', $config);

		//? Tidak perlu melakukan pengecekan ukuran file manual jika 'max_size' sudah diatur
		if (!$this->upload->do_upload('imageCategory')) {
			$error = $this->upload->display_errors();
			$this->session->set_flashdata('error', 'There was a problem : ' . $error);
			redirect('store/Category');
		} else {
			$data = array('upload_data' => $this->upload->data());

			$dataCategory = array(
				'categoryName' => $this->input->post('nameCategory'),
				'imageCategory' => $data['upload_data']['file_name']
			);

			$this->Category_m->saveData($dataCategory);
			$this->session->set_flashdata('success', 'Category Successfully Added');
			redirect('store/Category');
		}
	}

	public function updateCategory()
	{
		# code...
		//TODO: Update category 
		if (isset($_FILES['imageCategoryUpdate']) && $_FILES['imageCategoryUpdate']['name'] != '') {
			$imageCategory = $this->input->post('imageCategory');
			$config['upload_path'] = FCPATH . 'asset/components/image/category/';
			$config['max_size'] = 3 * 1024; // 3MB
			$config['file_name'] = $imageCategory;
			$config['overwrite'] = TRUE;
			$config['allowed_types'] = 'jpg|jpeg|png'; // Batasi hanya untuk jpg, jpeg, png

			$this->load->library('upload', $config);

			if ($_FILES['imageCategoryUpdate']['size'] >= 3 * 1024 * 1024) {
				$this->session->set_flashdata('error', 'Ukuran foto terlalu besar, upload ulang foto dengan ukuran yang kurang dari 3 MB.');
				redirect('store/Category');
			} elseif (!$this->upload->do_upload('imageCategoryUpdate')) {
				$error = array('error' => $this->upload->display_errors());
				$this->session->set_flashdata('error', 'There was a problem: ' . $error['error']);
				redirect('store/Category');
			} else {
				$upload_data = $this->upload->data();
				$imageCategory = $upload_data['file_name'];
			}

			$this->Category_m->updateDataCategory($imageCategory);
		} else {
			$this->Category_m->updateDataCategory();
		}

		$this->session->set_flashdata('success', 'Category Successfully Updated');
		redirect('store/Category');

	}

	public function deletedCategory()
	{
		// Pastikan ini hanya dijalankan jika permintaan datang dari AJAX
		if ($this->input->is_ajax_request()) {
			$name = $this->input->post('name', true); // Ubah menjadi 'name' sesuai dengan apa yang dikirimkan dari AJAX
			$filename = FCPATH . 'asset\components\image\category' . $name;

			// var_dump($filename); die;

			// Pastikan file ada sebelum mencoba untuk menghapusnya
			if (file_exists($filename)) {
				unlink("./asset/components/image/category/" . $name); // Hapus file gambar
			}

			// Panggil method untuk menghapus data kategori dari model
			$this->Category_m->deletedDataCategory($name);

			// Kirim respons JSON ke client
			$response['success'] = 'Category Successfully Deleted';
			echo json_encode($response);
		} else {
			// Jika permintaan bukan dari AJAX, lakukan redirect ke halaman lain
			redirect('store/Category');
		}
	}

}
