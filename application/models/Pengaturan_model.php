<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pengaturan_model extends CI_Model {

	protected $table = 'pengaturan';

	public function simpan($data)
	{
		$this->db->where('id', 1);
		return $this->db->update($this->table, $data);
	}

	public function read()
	{
		return $this->db->get($this->table)->row();
	}

}

/* End of file Pengaturan_model.php */
/* Location: ./application/models/Pengaturan_model.php */