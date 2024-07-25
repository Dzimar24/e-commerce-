<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{

	public function __construct()
	{
		# code...
		parent::__construct();
		if ($this->session->userdata('level') != 'admin' && $this->session->userdata('level') != 'store') {
			redirect('Login');
		}
	}

	public function index(){
		$data['titlePage'] = 'Page Dashboard';
		$this->template->load('templateAdmin', '/pages/admin/dashboard.php', $data);
	}

	public function document()
	{
		# code...
		$this->template->load('templateAdmin', '/pages/document');
	}
}
