<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Product_m extends CI_Model
{

	public function selectCategory()
	{
		# code...
		$this->db->from('category');
		$this->db->order_by('categoryName', 'ASC');
		return $this->db->get()->result_array();
	}

	public function insertProduct($data)
	{
		# code...
		$data['created_at'] = date('Y-m-d H:i:s');

		$this->db->insert('products', $data);
	}

	public function get_products_by_user($idUser)
	{
		$this->db->from('products');
		$this->db->where('idUser', $idUser); // Asumsikan idUser ada di tabel produk
		$query = $this->db->get();
		return $query->result();
	}

	public function getProductById($id)
	{
		//TODO: View product in Update Page
		$this->db->from('products');
		$this->db->where('idProduct', $id);
		$query = $this->db->get();
		return $query->row(); // Mengembalikan satu baris hasil query
	}

	public function getProductByIdProduct($idProduct)
	{
		//TODO: View data in viewData Pages
		$this->db->select('*');
		$this->db->from('products');
		$this->db->join('category', 'category.idCategory = products.idCategory', 'left');
		
		$this->db->where('products.idProduct', $idProduct);
		$query = $this->db->get();
		return $query->row();
	}

	public function updateDataCategory($imageCategory = null)
	{
		$price = $this->input->post('price');

		$price = filter_var($price, FILTER_SANITIZE_NUMBER_INT);

		$data = array(
			'name' => $this->input->post('name'),
			'description' => $this->input->post('description'),
			'price' => $price,
			'stock' => $this->input->post('stock'),
			'idCategory' => $this->input->post('idCategory'),
		);

		if ($imageCategory) {
			$data['image'] = $imageCategory;
		}

		$data['updated_at'] = date('Y-m-d H:i:s');

		$this->db->where('idProduct', $this->input->post('idProduct'));
		$this->db->update('products', $data);
	}

	public function deletedDataProduct($image)
	{
		# code...
		$this->db->where('image', $image);
		return $this->db->delete('products');
	}

	public function viewsDataProduct($id)
	{
		$this->db->from('products');
		$this->db->where('idProduct', $id);
		$content = $this->db->get()->result_array();
		return $content;
	}
}
