<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Login extends CI_Controller
{

	public function index()
	{
		# code...
		$this->load->view('/pages/loginPage/login');
	}

	public function registration()
	{
		# code...
		$this->load->view('/pages/loginPage/register');
	}

	public function process()
	{
		$email = $this->input->post('email');
		$password = $this->input->post('password');

		// var_dump($check); die;
		$this->db->from('user');
		$this->db->where('email', $email);
		$check = $this->db->get()->row();
		if ($check == NULL) {
			$this->session->set_flashdata('error', 'Email Unknown!!!');
			redirect('Login');
		} else if ($password == $check->password) {
			$data = array(
				'idUser' => $check->idUser,
				'name' => $check->name,
				'email' => $check->email,
				'level' => $check->level,
			);
			$this->session->set_userdata($data);
			$this->session->set_flashdata('success', 'You have successfully login !!');

			if ($check->level == 'customer') {
				redirect('Index');
			} elseif ($check->level == 'admin' || $check->level == 'store') {
				redirect('admin/Dashboard');
			}
		} else {
			$this->session->set_flashdata('error', 'Password Wrong !!!');
			redirect('Login');
		}
	}

	public function addUser()
	{
		$data = [
			'name' => $this->input->post('name'),
			'email' => $this->input->post('email'),
			'phoneNumber' => $this->input->post('phoneNumber'),
			'password' => $this->input->post('password'),
			'level' => 'customer'
		];


		$this->db->insert('user', $data);
		$this->session->set_flashdata('success', 'User Successfully Added !!');
		redirect('Login/registration');
	}

	public function logOut()
	{
		# code...
		$this->session->sess_destroy();
		// $this->session->set_flashdata('success', 'Log Out !!');
		redirect('Index');
	}

}
