<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Peminjaman extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		if ($this->session->userdata('status') !== 'login') {
			redirect('/');
		}
		$this->load->model('peminjaman_model');
	}

	public function index()
	{
		$this->load->view('peminjaman/data_peminjaman');
	}

	public function read()
	{
		header('Content-Type: application/json');
		$data = array(
			'data' => $this->peminjaman_model->read()
		);
		echo json_encode($data);
	}
	
	public function add()
	{
		$kode = $this->input->post('kode');
		$jumlah = $this->input->post('jumlah');

		$stok = $this->peminjaman_model->getStok($kode);

		$updateStok = array(
			'jumlah' => $stok->jumlah - $jumlah,
			'dipinjam' => $stok->dipinjam + $jumlah
		);

		if ($this->peminjaman_model->updateStok($kode, $updateStok)) {
			$data = array(
				'kode' => $kode,
				'peminjam' => $this->input->post('peminjam'),
				'jumlah' => $jumlah,
				'tanggal_pinjam' => date('Y-m-d'),
				'tanggal_kembali' => $this->input->post('tanggal_kembali'),
			);
			if ($this->peminjaman_model->create($data)) {
				echo json_encode('sukses');
			}
		}
		
	}

	public function edit($id)
	{
		$data = array(
			'nama' => $this->input->post('nama'),
			'jenis_kelamin' => $this->input->post('jenis_kelamin'),
		);
		if ($this->peminjaman_model->update($id, $data)) {
			echo json_encode('sukses');
		}
	}

	public function delete($id)
	{
		if ($this->peminjaman_model->delete($id)) {
			echo json_encode('sukses');
		}
	}

	public function kembalikan($id)
	{
		$kode = $this->input->post('kode');
		$jumlah = $this->input->post('jumlah');

		$stok = $this->peminjaman_model->getStok($kode);

		$updateStok = array(
			'jumlah' => $stok->jumlah + $jumlah,
			'dipinjam' => $stok->dipinjam - $jumlah
		);

		if ($this->peminjaman_model->updateStok($kode, $updateStok)) {
			if ($this->peminjaman_model->kembalikan($id)) {
				echo json_encode('sukses');
			}
		}
	}

	public function perpanjang($id)
	{
		$tanggal = $this->input->post('tanggal');
		if ($this->peminjaman_model->perpanjang($id, $tanggal)) {
			echo json_encode('sukses');
		}
	}

	public function cetak()
	{
		$data['peminjaman'] = $this->peminjaman_model->read();
		$this->load->view('peminjaman/cetak', $data);
	}

}

/* End of file Peminjaman.php */
/* Location: ./application/controllers/Peminjaman.php */