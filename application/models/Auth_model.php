<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth_model extends CI_Model {

	protected $table = 'pengguna';

	public function cek_username($username)
	{
		$this->db->where('username', $username);
		return $this->db->get($this->table)->row();
	}

	public function get_perpustakaan()
	{
		return $this->db->get('pengaturan')->row();
	}

}

/* End of file Auth_model.php */
/* Location: ./application/models/Auth_model.php */