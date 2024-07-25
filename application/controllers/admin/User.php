<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{

	public function __construct()
	{
		# code...
		parent::__construct();
		$this->load->model('User_m');
		$this->load->library('form_validation');
		if ($this->session->userdata('level') != 'admin') {
			redirect('Login');
		}
	}

	public function index()
	{
		# code...
		$data['titlePage'] = 'Page User';
		$this->template->load('templateAdmin', '/pages/admin/user.php', $data);
	}

	public function getData()
	{
		if ($this->input->is_ajax_request() == true) {
			$this->load->model('User_m', 'user');
			$list = $this->user->get_datatables();
			$data = array();
			$no = $_POST['start'];
			foreach ($list as $field) {

				$no++;
				$row = array();

				$buttonUpdate = "<button type=\"button\" class=\"btn btn-outline-info\" title=\"Edit Data\" onclick=\"update('" . $field->name . "')\"><i class=\"bi bi-pencil-square\"></i></button>";
				$buttonDelete = "<button type=\"button\" class=\"btn btn-outline-danger\" title=\"Delete Data\"  onclick=\"deleted('" . $field->name . "')\"><i class=\"bi bi-trash\"></i></button>";
				$buttonResetPassword = "<button type=\"button\" onclick=\"resetPassword('" . $field->name . "')\" class=\"btn btn-outline-warning\" title=\"Reset Password\"><i class=\"bi bi-arrow-clockwise\"></i></button>";

				$row[] = $no;
				$row[] = $field->name;
				$row[] = $field->email;
				$row[] = $field->phoneNumber;
				$row[] = $field->level;
				$row[] = $buttonUpdate . ' ' . $buttonDelete . ' ' . $buttonResetPassword;
				$data[] = $row;
			}

			$output = array(
				"draw" => $_POST['draw'],
				"recordsTotal" => $this->user->count_all(),
				"recordsFiltered" => $this->user->count_filtered(),
				"data" => $data,
			);
			//output dalam format JSON
			echo json_encode($output);
		} else {
			exit('Maaf data tidak bisa ditampilkan');
		}
	}

	public function userPlus()
	{
		# code...
		if ($this->input->is_ajax_request() == true) {
			$this->form_validation->set_rules('name', 'name', 'trim|required');
			$this->form_validation->set_rules('email', 'email', 'trim|valid_email|valid_emails|required');
			$this->form_validation->set_rules('phoneNumber', 'phoneNumber', 'trim|min_length[11]|max_length[13]|required');
			$this->form_validation->set_rules('password', 'password', 'trim|required');
			$this->form_validation->set_rules('level', 'level', 'required');

			if ($this->form_validation->run() == TRUE) {
				# code...
				$post = $this->input->post(null, TRUE);
				$this->User_m->add($post);

				$msg = [
					'success' => 'Successfully added User'
				];
			} else {
				$msg = [
					// 'error' => validation_errors()
					'error' => [
						'name' => form_error('name'),
						'level' => form_error('level'),
						'email' => form_error('email'),
						'phoneNumber' => form_error('phoneNumber'),
						'password' => form_error('password')
					]
				];
			}

			echo json_encode($msg);
		}
	}

	public function modalUpdate()
	{
		if ($this->input->is_ajax_request() == TRUE) {
			# code...
			$name = $this->input->post('name', true);

			$getData = $this->User_m->dataGet($name);

			if ($getData->num_rows() > 0) {
				# code...
				$row = $getData->row_array();

				$data = [
					'idUser' => $row['idUser'],
					'name' => $name,
					'level' => $row['level'],
					'email' => $row['email'],
					'phoneNumber' => $row['phoneNumber'],
					'password' => $row['password']
				];
			}
			$msg = [
				'success' => $this->load->view('pages/components/buildkite/user/ModalUpdateUser', $data, true)
			];
			echo json_encode($msg);
		}
	}

	public function userUpdate()
	{
		# code...
		if ($this->input->is_ajax_request()) {
			# code...
			$idUser = $this->input->post('idUser');
			$name = $this->input->post('name', true);
			$level = $this->input->post('level', true);
			$email = $this->input->post('email', true);
			$phoneNumber = $this->input->post('phoneNumber', true);

			// var_dump($name, $level, $email, $phoneNumber); die();

			$this->User_m->update($idUser, $name, $level, $email, $phoneNumber);

			$msg = [
				'success' => 'Successfully Updated'
			];
			echo json_encode($msg);
		}
	}

	public function deletedUser()
	{
		# code...
		if ($this->input->is_ajax_request()) {
			# code...
			$name = $this->input->post('name', true);

			$delete = $this->User_m->delete($name);

			if ($delete) {
				$msg = [
					'success' => 'User deleted successfully'
				];
			}
			echo json_encode($msg);

		}
	}

	public function resetPassword()
	{
		# code...
		if ($this->input->is_ajax_request()) {
			# code...
			$name = $this->input->post('name', true);

			$this->User_m->reset($name);

			$msg = [
				'success' => 'Successfully Reset Password',
			];
			echo json_encode($msg);
		}
	}
}

