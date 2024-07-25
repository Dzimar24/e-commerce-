<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Index_m extends CI_Model
{
	public function searchProduct($id)
	{
		# code...
		$result = $this->db->where('idProduct', $id)->limit(1)->get('products');

		if ($result->num_rows() > 0) {
			# code...
			return $result->row();
		} else {
			return array();
		}
	}

	public function searchUser($id)
	{
		# code...
		$result = $this->db->where('idUser', $id)->limit(1)->get('user');

		if ($result->num_rows() > 0) {
			# code...
			return $result->row();
		} else {
			return array();
		}
	}
}
