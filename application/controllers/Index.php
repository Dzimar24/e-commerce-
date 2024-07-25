<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Index extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Index_m');
	}

	public function index()
	{
		$this->db->select('*')->from('products');
		$tay = $this->db->get()->result_array();

		$data['viewProduct'] = $tay;
		$this->template->load('templatePublic', 'index', $data);
	}

	public function addToCart($idProduct)
	{
		# code...

		// $this->session->sess_destroy();

		$product = $this->Index_m->searchProduct($idProduct);

		$data = array(
			'id' => $product->idProduct,
			'qty' => 1,
			'price' => $product->price,
			'name' => $product->name,
			'image' => $product->image,
		);

		$this->cart->insert($data);

		$this->session->set_flashdata('success', 'Success Add To Cart');

		redirect('Index');

	}

	public function addToCartFromDetail($idProduct)
	{
		# code...

		// $this->session->sess_destroy();

		$qty = $this->input->post('qty');

		$product = $this->Index_m->searchProduct($idProduct);

		$data = array(
			'id' => $product->idProduct,
			'qty' => $qty,
			'price' => $product->price,
			'name' => $product->name,
			'image' => $product->image,
		);

		$this->cart->insert($data);

		$this->session->set_flashdata('success', 'Success Add To Cart');

		redirect('Index');

	}

	public function delete($tai)
	{
		# code...
		$this->cart->destroy($tai);


		$this->session->flashdata('success', 'Success Delete From Cart');
		redirect('Index/viewCart');
	}

	public function detailProduct($id)
	{
		$this->load->model('Product_m');
		$data['viewProduct'] = $this->Product_m->getProductByIdProduct($id);
		$this->template->load('templatePublic', '/pages/public/viewProduct', $data);
	}

	public function checkout($id)
	{
		# code...
		$phone = $this->Index_m->searchUser($id);

		$data['dataUser'] = $phone;
		$this->template->load('templatePublic', '/pages/public/checkout', $data);
	}

	public function viewCart()
	{
		# code...
		$this->template->load('templatePublic', '/pages/public/cart');
	}
}
