<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('auth_model');
	}

	public function index()
	{
		if ($this->session->userdata('status') === 'login') {
			redirect('/');
		}
		$this->load->view('login');
	}

	public function login()
	{
		if ($this->session->userdata('status') === 'login') {
			redirect('/');
		}
		$username = $this->input->post('username');
		$user = $this->auth_model->cek_username($username);
		if ($user) {
			$password = $this->input->post('password');
			if (password_verify($password, $user->password)) {
				$data = array(
					'user' => $user,
					'perpustakaan' => $this->auth_model->get_perpustakaan(),
					'status' => 'login'
				);
				$this->session->set_userdata($data);
				echo json_encode('sukses');
			} else {
				echo json_encode('password');
			}
		} else {
			echo json_encode('username');
		}
	}

	public function logout()
	{
		$this->session->sess_destroy();
		redirect('/');
	}

}

/* End of file Auth.php */
/* Location: ./application/controllers/Auth.php */