<?php

namespace App\Models;

use CodeIgniter\Model;

class MLogin extends Model
{
    protected $table            = 'tb_users';
    protected $primaryKey       = 'userID';
    protected $allowedFields    = ['username', 'password', 'role'];

    public function getMahasiswaId($userID)
    {
        return $this->db->table('tb_mahasiswa')
        ->where('userID', $userID)
        ->get()
        ->getRowArray();
    }

    public function getPembimbingById($userID)
    {
        return $this->db->table('tb_pembimbing')
        ->where('userID', $userID)
        ->get()
        ->getRowArray();
    }

    public function getPamongById($userID)
    {
        return $this->db->table('tb_pamong')
        ->where('userID', $userID)
        ->get()
        ->getRowArray();
    }

    public function getUserId($sess)
    {
        return $this->find($sess);
    }

    public function insertUser($data)
    {
        $this->insert($data);
        return $this->insertID();
    }
}
