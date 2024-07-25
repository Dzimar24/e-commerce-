<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Category_m extends CI_Model
{

	public function saveData($dataCategory)
	{
		# code...
		$this->db->insert('category', $dataCategory);
	}

	public function selectImageCategory()
	{
		# code...
		$this->db->select('*')->from('category');
		return $this->db->get()->result_array();
	}

	public function updateDataCategory($imageCategory = null)
	{
		$data = array(
			'categoryName' => $this->input->post('nameCategory'),
		);

		if ($imageCategory) {
			$data['imageCategory'] = $imageCategory;
		}

		$this->db->where('idCategory', $this->input->post('idCategory'));
		$this->db->update('category', $data);
	}

	public function deletedDataCategory($imageCategory)
	{
		$this->db->where('imageCategory', $imageCategory);
		return $this->db->delete('category');
	}


}
