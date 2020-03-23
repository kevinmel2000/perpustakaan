<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pengaturan extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		if ($this->session->userdata('status') !== 'login') {
			redirect('/');
		}
		$this->load->model('pengaturan_model');
	}

	public function index()
	{
		$data['perpustakaan'] = $this->pengaturan_model->read();
		$this->load->view('pengaturan', $data);
	}

	public function simpan()
	{
		$data = array(
			'nama' => $this->input->post('nama'), 
			'denda' => $this->input->post('denda'), 
			'tentang' => $this->input->post('tentang') 
		);
		if ($this->pengaturan_model->simpan($data)) {
			$this->session->set_userdata('perpustakaan', $this->pengaturan_model->read());
			echo json_encode('sukses');
		}
	}

}

/* End of file Pengaturan.php */
/* Location: ./application/controllers/Pengaturan.php */