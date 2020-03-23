<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kategori_buku extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		if ($this->session->userdata('status') !== 'login') {
			redirect('/');
		}
		$this->load->model('kategori_buku_model');
	}

	public function index()
	{
		$this->load->view('buku/kategori_buku');
	}

	public function read()
	{
		header('Content-Type: application/json');
		$data = array(
			'data' => $this->kategori_buku_model->read()
		);
		echo json_encode($data);
	}
	
	public function add()
	{
		$data = array(
			'nama' => $this->input->post('nama'),
		);
		if ($this->kategori_buku_model->create($data)) {
			echo json_encode('sukses');
		}
	}

	public function edit($id)
	{
		$data = array(
			'nama' => $this->input->post('nama'),
		);
		if ($this->kategori_buku_model->update($id, $data)) {
			echo json_encode('sukses');
		}
	}

	public function delete($id)
	{
		if ($this->kategori_buku_model->delete($id)) {
			echo json_encode('sukses');
		}
	}

	public function get_kategori()
	{
		header('Content-Type: application/json');
		$q = $this->input->get('nama');
		$kategori = $this->kategori_buku_model->getKategori($q);
		if ($kategori) {
			echo json_encode($kategori);
		}
	}

}

/* End of file Kategori_buku.php */
/* Location: ./application/controllers/Kategori_buku.php */