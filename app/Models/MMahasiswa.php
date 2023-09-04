<?php

namespace App\Models;

use CodeIgniter\Model;

class MMahasiswa extends Model
{
    protected $table            = 'tb_mahasiswa';
    protected $primaryKey       = 'mahasiswaID';

    public function getMahasiswa($userID)
    {
        return $this->where('userID', $userID)->first();
    }

    public function getSemuaMahasiswa()
    {
        return $this->findAll();
    }
}
