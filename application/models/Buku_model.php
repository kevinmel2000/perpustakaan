<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Buku_model extends CI_Model {

	protected $table = 'buku';

	public function create($data)
	{
		return $this->db->insert($this->table, $data);
	}

	public function read()
	{
		$this->db->select('buku.id, buku.kode, buku.nama, buku.kategori as kategori_id, buku.jumlah, buku.dipinjam, kategori_buku.nama as kategori');
		$this->db->from('buku');
		$this->db->join('kategori_buku', 'kategori_buku.id = buku.kategori');
		return $this->db->get()->result();
	}

	public function update($id, $data)
	{
		$this->db->where('id', $id);
		return $this->db->update($this->table, $data);
	}

	public function delete($id)
	{
		$this->db->where('id', $id);
		return $this->db->delete($this->table);
	}

	public function getBuku($kode='')
	{
		$this->db->select('id, kode as text, nama as judul, jumlah');
		$this->db->like('kode', $kode, 'BOTH');
		return $this->db->get($this->table)->result();
	}

}

/* End of file Buku_model.php */
/* Location: ./application/models/Buku_model.php */