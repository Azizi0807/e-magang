<?php 

namespace App\Models;

use CodeIgniter\Model;

class M_Logbook extends Model{

	public function __construct()
	{
		$this->db = db_connect();
	}

	public function getData()
	{
		return $this->db->table('tbl_logbook')->get();
	}

	public function tambahData($data)
	{
		return $this->db->table('tbl_logbook')->insert($data);
	}
}