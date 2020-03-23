<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Buku extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		if ($this->session->userdata('status') !== 'login') {
			redirect('/');
		}
		$this->load->model('buku_model');
	}

	public function index()
	{
		$this->load->view('buku/data_buku');
	}

	public function read()
	{
		header('Content-Type: application/json');
		$data = array(
			'data' => $this->buku_model->read()
		);
		echo json_encode($data);
	}
	
	public function add()
	{
		$data = array(
			'kode' => $this->input->post('kode'),
			'nama' => $this->input->post('nama'),
			'kategori' => $this->input->post('kategori'),
			'jumlah' => $this->input->post('jumlah'),
			'dipinjam' => 0
		);
		if ($this->buku_model->create($data)) {
			echo json_encode('sukses');
		}
	}

	public function edit($id)
	{
		$data = array(
			'kode' => $this->input->post('kode'),
			'nama' => $this->input->post('nama'),
			'kategori' => $this->input->post('kategori'),
			'jumlah' => $this->input->post('jumlah'),
		);
		if ($this->buku_model->update($id, $data)) {
			echo json_encode('sukses');
		}
	}

	public function delete($id)
	{
		if ($this->buku_model->delete($id)) {
			echo json_encode('sukses');
		}
	}

	public function cetak()
	{
		$data['buku'] = $this->buku_model->read();
		$this->load->view('buku/cetak', $data);
	}

	public function get_buku()
	{
		header('Content-Type: application/json');
		$q = $this->input->get('kode');
		$buku = $this->buku_model->getBuku($q);
		if ($buku) {
			echo json_encode($buku);
		}
	}

}

/* End of file Buku.php */
/* Location: ./application/controllers/Buku.php */