<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Peminjaman_model extends CI_Model {

	protected $table = 'peminjaman';

	public function create($data)
	{
		return $this->db->insert($this->table, $data);
	}

	public function read()
	{
		return $this->db->query("SELECT peminjaman.id, buku.id as id_buku, buku.kode, buku.nama as judul, anggota.nama as peminjam, peminjaman.jumlah, DATE_FORMAT(peminjaman.tanggal_pinjam, '%d%-%m-%Y') as tanggal_pinjam, DATE_FORMAT(peminjaman.tanggal_kembali, '%d%-%m-%Y') as tanggal_kembali, IF(DATEDIFF(CURRENT_DATE(), peminjaman.tanggal_kembali) < 0, 0, DATEDIFF(peminjaman.tanggal_pinjam, peminjaman.tanggal_kembali)) AS terlambat, peminjaman.status FROM peminjaman INNER JOIN buku ON buku.id = peminjaman.kode INNER JOIN anggota ON anggota.id = peminjaman.peminjam")->result();
	}

	public function delete($id)
	{
		$this->db->where('id', $id);
		return $this->db->delete($this->table);
	}

	public function getStok($id)
	{
		$this->db->select('jumlah, dipinjam');
		$this->db->where('id', $id);
		return $this->db->get('buku')->row();
	}

	public function updateStok($id, $data)
	{
		$this->db->where('id', $id);
		return $this->db->update('buku', $data);
	}

	public function kembalikan($id)
	{
		$this->db->where('id', $id);
		$this->db->set('status', 'dikembalikan');
		return $this->db->update($this->table);
	}

	public function perpanjang($id, $tanggal)
	{
		$this->db->where('id', $id);
		$this->db->set('tanggal_kembali', $tanggal);
		return $this->db->update($this->table);
	}

}

/* End of file Peminjaman_model.php */
/* Location: ./application/models/Peminjaman_model.php */