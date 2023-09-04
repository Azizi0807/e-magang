<?php

namespace App\Models;

use CodeIgniter\Model;

class MNilai extends Model
{
    protected $table            = 'tb_nilai';
    protected $primaryKey       = 'nilaiID';
    protected $allowedFields = ['magangID', 'status_nilai_pem', 'nilai_pembimbing', 'status_nilai_pam','nilai_pamong', 'total'];


    public function updateStatusNilaiPembimbing($data)
    {

        return $this->insert($data);
    }

    public function updateStatusNilaiPamong($magangID, $data)
    {
        return $this->db->table('tb_nilai')
        ->where('magangID', $magangID)
        ->update($data);
    }

    public function updateTotalNilai($magangID, $data)
    {
        return $this->db->table('tb_nilai')
        ->where('magangID', $magangID)
        ->update($data);
    }

    public function getNilaiByMagangID($mahasiswaID)
    {
        return $this->select()
        ->join('tb_magang', 'tb_nilai.magangID = tb_magang.magangID', 'left')
        ->join('tb_mahasiswa', 'tb_magang.mahasiswaID = tb_mahasiswa.mahasiswaID', 'left')
        ->join('tb_detailnilai_pem', 'tb_magang.magangID = tb_detailnilai_pem.magangID', 'left')
        ->join('tb_detailnilai_pam', 'tb_magang.magangID = tb_detailnilai_pam.magangID', 'left')
        ->where('tb_mahasiswa.mahasiswaID', $mahasiswaID)
        ->first();
    }

    public function getNilaiByPembimbingID($pembimbingID)
    {
        return $this->select()
        ->join('tb_magang', 'tb_nilai.magangID = tb_magang.magangID', 'left')
        ->join('tb_mahasiswa', 'tb_mahasiswa.mahasiswaID = tb_magang.mahasiswaID', 'left')
        ->join('tb_pembimbing', 'tb_pembimbing.pembimbingID = tb_magang.pembimbingID', 'left')
        ->where('tb_magang.pembimbingID', $pembimbingID)
        ->findAll();
    }  

    public function getNilaiByPamongID($pamongID)
    {
        return $this->select()
        ->join('tb_magang', 'tb_nilai.magangID = tb_magang.magangID', 'left')
        ->join('tb_mahasiswa', 'tb_mahasiswa.mahasiswaID = tb_magang.mahasiswaID', 'left')
        ->join('tb_pamong', 'tb_pamong.pamongID = tb_magang.pamongID', 'left')
        ->where('tb_magang.pamongID', $pamongID)
        ->findAll();
    }

    public function getInputNilaiByPamong($pamongID)
    {
        return $this->select()
        ->join('tb_magang', 'tb_nilai.magangID = tb_magang.magangID', 'left')
        ->join('tb_mahasiswa', 'tb_mahasiswa.mahasiswaID = tb_magang.mahasiswaID', 'left')
        ->join('tb_pamong', 'tb_pamong.pamongID = tb_magang.pamongID', 'left')
        ->where('tb_magang.pamongID', $pamongID)
        ->get()
        ->getRowArray();
    }    

    public function insertNilaiOlehPembimbing($magangID, $data)
    {
        return $this->db->table('tb_nilai')
        ->where('magangID', $magangID)
        ->update($data);
    }

    public function insertNilaiOlehPamong($magangID, $data)
    {
        return $this->db->table('tb_nilai')
        ->where('magangID', $magangID)
        ->update($data);
    }
}
