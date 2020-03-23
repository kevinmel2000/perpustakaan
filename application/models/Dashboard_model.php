<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard_model extends CI_Model {

	public function totalPeminjaman()
	{
		$this->db->select('COUNT(id) as total');
		return $this->db->get('peminjaman')->row()->total;
	}

	public function totalBuku()
	{
		$this->db->select('COUNT(id) as total');
		return $this->db->get('buku')->row()->total;
	}

	public function totalAnggota()
	{
		$this->db->select('COUNT(id) as total');
		return $this->db->get('anggota')->row()->total;	
	}

	public function belumDikembalikan()
	{
		$this->db->select('COUNT(id) as total');
		$this->db->where('status', 'dipinjam');
		return $this->db->get('peminjaman')->row()->total;
	}

	public function grafikPeminjaman()
	{
		for ($i=1; $i <= 12; $i++) { 
			$this->db->select('COUNT(id) as total');
			$this->db->where('MONTH(tanggal_pinjam)', $i);
			$data[] = $this->db->get('peminjaman')->row()->total;
		}
		return $data;
	}

	public function bukuTerlaris()
	{
		$this->db->select('DISTINCT(peminjaman.kode) as kode');
		$kode = $this->db->get('peminjaman');
		if ($kode->num_rows() < 1) {
			$judul = ['No Data'];
			$total = [1];
		} else {
			foreach ($kode->result() as $value) {
				$this->db->select('buku.nama as judul, SUM(peminjaman.jumlah) as total');
				$this->db->from('peminjaman');
				$this->db->join('buku', 'buku.id = peminjaman.kode');
				$this->db->where('peminjaman.kode', $value->kode);
				$this->db->limit(3);
				$this->db->order_by('SUM(peminjaman.jumlah)', 'desc');
				$buku = $this->db->get()->row();
				$judul[] = $buku->judul;
				$total[] = $buku->total;
			}
		}
		$data = array(
			'judul' => $judul,
			'total' => $total
		);
		return $data;
	}

	public function anggotaTerajin()
	{
		$this->db->select('DISTINCT(peminjaman.peminjam) as peminjam');
		$peminjam = $this->db->get('peminjaman');
		if ($peminjam->num_rows() < 1) {
			$anggota = ['No Data'];
			$total = [1];
		} else {
			foreach ($peminjam->result() as $value) {
				$this->db->select('anggota.nama as anggota, SUM(peminjaman.jumlah) as total');
				$this->db->from('peminjaman');
				$this->db->join('anggota', 'anggota.id = peminjaman.peminjam');
				$this->db->where('peminjaman.peminjam', $value->peminjam);
				$this->db->limit(3);
				$this->db->order_by('SUM(peminjaman.jumlah)', 'desc');
				$buku = $this->db->get()->row();
				$anggota[] = $buku->anggota;
				$total[] = $buku->total;
			}
		}
		$data = array(
			'nama' => $anggota,
			'total' => $total
		);
		return $data;
	}

}

/* End of file dashboard_model.php */
/* Location: ./application/models/dashboard_model.php */