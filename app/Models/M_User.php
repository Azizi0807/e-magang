<?php

namespace App\Models;

use CodeIgniter\Model;

class M_User extends Model
{
	
	public function __construct()
	{
		$this->db = db_connect();
	}

	public function getUser($username)
	{
		return $this->db->table('tbl_user')->join('tbl_level', 'tbl_user.idlevel = tbl_level.id')
						->where('username', $username)
						->get();
	}

	public function getAktif($username)
	{
		return $this->db->table('tbl_user')->set('isAktif', 1)
								->where('username', $username)
								->update();
	}

	public function getNonAktif($username)
	{
		return $this->db->table('tbl_user')->set('isAktif', 0)
								->where('username', $username)
								->update();
	}	

	public function profilMhs($username)
	{
		return $this->db->table('tbl_mhs')
								->join('tbl_user a', 'tbl_mhs.npm = tbl_user.username')
								->where('npm', $username)
								->get();
	}
	
}