<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pengguna extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		if ($this->session->userdata('status') !== 'login') {
			redirect('/');
		}
		$this->load->model('pengguna_model');
	}

	public function index()
	{
		$this->load->view('pengguna/data_pengguna');
	}

	public function read()
	{
		header('Content-Type: application/json');
		$data = array(
			'data' => $this->pengguna_model->read()
		);
		echo json_encode($data);
	}
	
	public function add()
	{
		$data = array(
			'username' => $this->input->post('username'),
			'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
		);
		if ($this->pengguna_model->create($data)) {
			echo json_encode('sukses');
		}
	}

	public function edit($id)
	{
		$data = array(
			'username' => $this->input->post('username'),
			'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
		);
		if ($this->pengguna_model->update($id, $data)) {
			echo json_encode('sukses');
		}
	}

	public function delete($id)
	{
		if ($this->pengguna_model->delete($id)) {
			echo json_encode('sukses');
		}
	}

}

/* End of file Pengguna.php */
/* Location: ./application/controllers/Pengguna.php */