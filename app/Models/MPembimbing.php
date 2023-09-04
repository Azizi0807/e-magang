<?php

namespace App\Models;

use CodeIgniter\Model;

class MPembimbing extends Model
{
    protected $table            = 'tb_pembimbing';
    protected $primaryKey       = 'pembimbingID';

    public function getPembimbingByID($userID)
    {
        return $this->where('userID', $userID)->first();
    }    

    public function getPembimbing()
    {
        return $this->findAll();
    }

    public function getLogbookByIDPembimbing($pembimbingID)
    {
        return $this->select()
        ->join('tb_magang', 'tb_logbook.magangID = tb_magang.magangID')
        ->join('tb_mahasiswa', 'tb_magang.mahasiswaID = tb_mahasiswa.mahasiswaID')
        ->join('tb_pembimbing', 'tb_magang.pembimbingID = tb_pembimbing.pembimbingID')
        ->where('pembimbingID', $pembimbingID)
        ->findAll();
    }

    public function insertDetailNilaiPem($detailpem)
    {
        $this->db->table('tb_detailnilai_pem')
        ->insert($detailpem);
    }
}
