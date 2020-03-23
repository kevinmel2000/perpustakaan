<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Anggota extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		if ($this->session->userdata('status') !== 'login') {
			redirect('login');
		}
		$this->load->model('anggota_model');
	}

	public function index()
	{
		$this->load->view('anggota/data_anggota');
	}

	public function read()
	{
		header('Content-Type: application/json');
		$data = array(
			'data' => $this->anggota_model->read()
		);
		echo json_encode($data);
	}
	
	public function add()
	{
		$data = array(
			'nama' => $this->input->post('nama'),
			'jenis_kelamin' => $this->input->post('jenis_kelamin'),
		);
		if ($this->anggota_model->create($data)) {
			echo json_encode('sukses');
		}
	}

	public function edit($id)
	{
		$data = array(
			'nama' => $this->input->post('nama'),
			'jenis_kelamin' => $this->input->post('jenis_kelamin'),
		);
		if ($this->anggota_model->update($id, $data)) {
			echo json_encode('sukses');
		}
	}

	public function delete($id)
	{
		if ($this->anggota_model->delete($id)) {
			echo json_encode('sukses');
		}
	}

	public function cetak()
	{
		$data['anggota'] = $this->anggota_model->read();
		$this->load->view('anggota/cetak', $data);
	}

	public function get_anggota()
	{
		header('Content-Type: application/json');
		$q = $this->input->get('nama');
		$anggota = $this->anggota_model->getAnggota($q);
		if ($anggota) {
			echo json_encode($anggota);
		}
	}

}

/* End of file Anggota.php */
/* Location: ./application/controllers/Anggota.php */