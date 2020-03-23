<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	public function index()
	{
		if ($this->session->userdata('status') !== 'login') {
			$this->load->view('login');
		} else {
			$this->load->model('dashboard_model');
			$data = array(
				'total_peminjaman' => $this->dashboard_model->totalPeminjaman(),
				'total_buku' => $this->dashboard_model->totalBuku(),
				'total_anggota' => $this->dashboard_model->totalAnggota(),
				'belum_dikembalikan' => $this->dashboard_model->belumDikembalikan(),
				'grafik_peminjaman' => $this->dashboard_model->grafikPeminjaman(),
				'buku_terlaris' => $this->dashboard_model->bukuTerlaris(),
				'anggota_terajin' => $this->dashboard_model->anggotaTerajin()
			);
			$this->load->view('dashboard', $data);
		}
	}

}

/* End of file Dashboard.php */
/* Location: ./application/controllers/Dashboard.php */