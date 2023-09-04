<?php

namespace App\Models;

use CodeIgniter\Model;

class MLogbook extends Model
{
    protected $table            = 'tb_logbook';
    protected $primaryKey       = 'logbookID';
    protected $allowedFields    = ['magangID', 'tanggal', 'aktivitas', 'dokumentasi', 'valid_pem', 'valid_pam'];

    public function getLogbookByMahasiswaID($mahasiswaID)
    {
        return $this->select()
        ->join('tb_magang', 'tb_logbook.magangID = tb_magang.magangID')
        ->join('tb_mahasiswa', 'tb_magang.mahasiswaID = tb_mahasiswa.mahasiswaID')
        ->join('tb_pembimbing', 'tb_magang.pembimbingID = tb_pembimbing.pembimbingID')
        ->where('tb_mahasiswa.mahasiswaID', $mahasiswaID)
        ->findAll();
    }

    public function getLogbookByPembimbingID($pembimbingID)
    {
        return $this->select()
        ->join('tb_magang', 'tb_logbook.magangID = tb_magang.magangID', 'left')
        ->join('tb_mahasiswa', 'tb_magang.mahasiswaID = tb_mahasiswa.mahasiswaID', 'left')
        ->join('tb_pembimbing', 'tb_magang.pembimbingID = tb_pembimbing.pembimbingID', 'left')
        ->where('tb_magang.pembimbingID', $pembimbingID)
        ->findAll();
    }

    public function getLogbookByPamongID($pamongID)
    {
        return $this->select()
        ->join('tb_magang', 'tb_logbook.magangID = tb_magang.magangID', 'left')
        ->join('tb_mahasiswa', 'tb_magang.mahasiswaID = tb_mahasiswa.mahasiswaID', 'left')
        ->join('tb_pamong', 'tb_magang.pamongID = tb_pamong.pamongID', 'left')
        ->where('tb_magang.pamongID', $pamongID)
        ->findAll();
    }

    public function tambahLogbook($data)
    {
        return $this->insert($data);
    }

    public function getValidLogbookPembimbing($magangID, $data)
    {
        if ($data['valid_pem'] == 'proses') {
            return $this->db->table('tb_logbook')
            ->where('magangID', $magangID)
            ->update($data);
        } 
        elseif($data['valid_pem'] == 'valid') {
            return $this->db->table('tb_logbook')
            ->where('magangID', $magangID)
            ->update($data);
        } 
        elseif($data['valid_pem'] == 'tidak') {
            return $this->db->table('tb_logbook')
            ->where('magangID', $magangID)
            ->update($data);
        }
    }
    public function getValidLogbookPamong($magangID, $data)
    {
        if ($data['valid_pam'] == 'proses') {
            return $this->db->table('tb_logbook')
            ->where('magangID', $magangID)
            ->update($data);
        } 
        elseif($data['valid_pam'] == 'valid') {
            return $this->db->table('tb_logbook')
            ->where('magangID', $magangID)
            ->update($data);
        } 
        elseif($data['valid_pam'] == 'tidak') {
            return $this->db->table('tb_logbook')
            ->where('magangID', $magangID)
            ->update($data);
        }
    }
}
