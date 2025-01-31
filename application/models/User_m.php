<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User_m extends CI_Model
{
	var $table = 'user'; //nama tabel dari database
	var $column_order = array(null, 'name', 'email', 'phoneNumber', 'level', null); //Sesuaikan dengan field
	var $column_search = array('email', 'name'); //field yang diizin untuk pencarian 
	var $order = array('idUser' => 'ASC'); // default order 

	private function _get_datatables_query()
	{

		$this->db->from($this->table);

		$i = 0;

		foreach ($this->column_search as $item) // looping awal
		{
			if ($_POST['search']['value']) // jika datatable mengirimkan pencarian dengan metode POST
			{

				if ($i === 0) // looping awal
				{
					$this->db->group_start();
					$this->db->like($item, $_POST['search']['value']);
				} else {
					$this->db->or_like($item, $_POST['search']['value']);
				}

				if (count($this->column_search) - 1 == $i)
					$this->db->group_end();
			}
			$i++;
		}

		if (isset($_POST['order'])) {
			$this->db->order_by($this->column_order[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
		} else if (isset($this->order)) {
			$order = $this->order;
			$this->db->order_by(key($order), $order[key($order)]);
		}
	}

	function get_datatables()
	{
		$this->_get_datatables_query();
		if ($_POST['length'] != -1)
			$this->db->limit($_POST['length'], $_POST['start']);
		$query = $this->db->get();
		return $query->result();
	}

	function count_filtered()
	{
		$this->_get_datatables_query();
		$query = $this->db->get();
		return $query->num_rows();
	}

	public function count_all()
	{
		$this->db->from($this->table);
		return $this->db->count_all_results();
	}

	public function add($post)
	{
		$saveData['name'] = $post['name'];
		$saveData['email'] = $post['email'];
		$saveData['phoneNumber'] = $post['phoneNumber'];
		$saveData['password'] = $post['password'];
		$saveData['level'] = $post['level'];

		$this->db->insert('user', $saveData);
	}

	public function dataGet($name)
	{
		return $this->db->get_where('user', ['name' => $name]);
	}

	public function update($idUser, $name, $level, $email, $phoneNumber)
	{
		# code...
		$updateData = [
			'name' => $name,
			'level' => $level,
			'email' => $email,
			'phoneNumber' => $phoneNumber
		];

		$this->db->where('idUser', $idUser);
		$this->db->update('user', $updateData);
	}

	public function delete($name)
	{
		return $this->db->delete('user', ['name' => $name]);
	}

	public function reset($name)
	{
		$data = array(
			'password' => 12345,
		);

		$this->db->where('name', $name);
		$this->db->update('user', $data);
	}

}
