<?php
defined('BASEPATH') or exit('No direct script access allowed');

class About extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		if ($this->session->userdata('level') != 'admin' && $this->session->userdata('level') != 'store' && $this->session->userdata('level') != 'customer') {
			redirect('Login');
		}
	}

	public function profile($id)
	{
		$this->db->from('user');
		$this->db->where('idUser', $id);
		$query = $this->db->get();
		$top = $query->row();

		$data['user'] = $top;

		$data['sectionPage'] = 'About';
		$this->template->load('templatePublic', 'about', $data);
	}

}
