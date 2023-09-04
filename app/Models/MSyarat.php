<?php

namespace App\Models;

use CodeIgniter\Model;

class MSyarat extends Model
{
    protected $table = 'tb_syarat';
    protected $primaryKey = 'syaratID';
    protected $allowedFields = ['mahasiswaID', 'syarat'];

    public function getSyaratByMahasiswaID($mahasiswaID)
    {
        return $this->select()
        ->join('tb_mahasiswa', 'tb_syarat.mahasiswaID = tb_mahasiswa.mahasiswaID')
        ->join('tb_users', 'tb_mahasiswa.userID = tb_users.userID')
        ->where('tb_syarat.mahasiswaID', $mahasiswaID)
        ->findAll();
    }

    public function getVerifikasiSyaratByMahasiswaID($magangID)
    {
        return $this->select()
        ->join('tb_mahasiswa', 'tb_syarat.mahasiswaID = tb_mahasiswa.mahasiswaID')
        ->join('tb_users', 'tb_mahasiswa.userID = tb_users.userID')
        ->where('tb_syarat.magangID', $magangID)
        ->findAll();
    }    

}
