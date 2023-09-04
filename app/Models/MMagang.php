<?php

namespace App\Models;

use CodeIgniter\Model;

class MMagang extends Model
{
    protected $table            = 'tb_magang';
    protected $primaryKey       = 'magangID';
    protected $allowedFields = [
        'mahasiswaID',
        'pembimbingID',
        'pamongID',
        'industriID',
        'periodeID',
        'status',
        'suratbalasan',
        'status_pembimbing',
        'qrcode'
    ];

    public function getMagang()
    {
        return $this->select()
        ->join('tb_mahasiswa', 'tb_magang.mahasiswaID = tb_mahasiswa.mahasiswaID')
        ->join('tb_users', 'tb_mahasiswa.userID = tb_users.userID')
        // ->join('tb_periode', 'tb_magang.periodeID = tb_periode.periodeID')
        ->join('tb_industri', 'tb_magang.industriID = tb_industri.industriID', 'left')
        // ->join('tb_pembimbing', 'tb_magang.pembimbingID = tb_pembimbing.pembimbingID', 'left')
        // ->join('tb_pamong', 'tb_magang.pamongID = tb_pamong.pamongID', 'left')
        ->findAll();
    }

    public function kirimPengajuan($data) 
    {
        return $this->insert($data);
    }

    public function getMagangByMahasiswaID($mahasiswaID)
    {
        return $this->select()
        ->join('tb_mahasiswa', 'tb_magang.mahasiswaID = tb_mahasiswa.mahasiswaID', 'left')
        ->join('tb_users', 'tb_mahasiswa.userID = tb_users.userID', 'left')
        ->join('tb_industri', 'tb_magang.industriID = tb_industri.industriID', 'left')
        ->join('tb_pembimbing', 'tb_magang.pembimbingID = tb_pembimbing.pembimbingID', 'left')
        ->join('tb_pamong', 'tb_magang.pamongID = tb_pamong.pamongID', 'left')
        ->where('tb_magang.mahasiswaID', $mahasiswaID)
        ->findAll();
    }

    public function getVerifikasiMagangByMahasiswaID($magangID)
    {
        return $this->select()
        ->join('tb_mahasiswa', 'tb_magang.mahasiswaID = tb_mahasiswa.mahasiswaID', 'left')
        ->join('tb_users', 'tb_mahasiswa.userID = tb_users.userID', 'left')
        ->join('tb_industri', 'tb_magang.industriID = tb_industri.industriID', 'left')
        ->join('tb_pembimbing', 'tb_magang.pembimbingID = tb_pembimbing.pembimbingID', 'left')
        ->join('tb_pamong', 'tb_magang.pamongID = tb_pamong.pamongID', 'left')
        ->where('tb_magang.magangID', $magangID)
        ->findAll();
    }

    public function getLaporanByMahasiswaID($mahasiswaID)
    {
        return $this->select()
        ->join('tb_mahasiswa', 'tb_magang.mahasiswaID = tb_mahasiswa.mahasiswaID')
        ->join('tb_users', 'tb_mahasiswa.userID = tb_users.userID', 'left')
        ->join('tb_industri', 'tb_magang.industriID = tb_industri.industriID', 'left')
        ->join('tb_pembimbing', 'tb_magang.pembimbingID = tb_pembimbing.pembimbingID', 'left')
        ->join('tb_pamong', 'tb_magang.pamongID = tb_pamong.pamongID', 'left')
        ->where('tb_magang.mahasiswaID', $mahasiswaID)
        ->first();
    }

    public function getPamongByUsernameAndPassword($pamongID)
    {
        return $this->select('username, password')
        ->join('tb_pamong', 'tb_magang.pamongID = tb_pamong.pamongID')
        ->join('tb_users', 'tb_pamong.userID = tb_users.userID')
        ->where('tb_magang.pamongID', $pamongID)
        ->first();
    }

    public function qrCodeSuratIzin($magangID, $dataQR)
    {
        return $this->db->table('tb_magang')
        ->where('magangID', $magangID)
        ->update($dataQR);
    }

    public function getIndustri()
    {
        return $this->db->table('tb_industri')
        ->get()
        ->getResultArray();
    }

    public function getValid($magangID, $data)
    {

        return $this->db->table('tb_magang')
        ->where('magangID', $magangID)
        ->update($data);
    }

    public function getMagangByID($magangID)
    {
        return $this->select()
        ->join('tb_mahasiswa', 'tb_magang.mahasiswaID = tb_mahasiswa.mahasiswaID')
        ->join('tb_industri', 'tb_magang.industriID = tb_industri.industriID')
        ->where('tb_magang.magangID', $magangID)
        ->first();
    }

    public function updateSurat($magangID, $suratBalas)
    {
        $data = [
            'suratbalasan' => $suratBalas
        ];
        return $this->db->table('tb_magang')
        ->where('magangID', $magangID)
        ->update($data);
    }

    public function getValidPembimbing($magangID, $data)
    {

        return $this->db->table('tb_magang')
        ->where('magangID', $magangID)
        ->update($data);
    }

    public function tambahPembimbing($magangID, $data)
    {
        return $this->db->table('tb_magang')
        ->where('magangID', $magangID)
        ->update($data);
    }

    public function updateMagangPamong($magangID, $pamongID)
    {
        $data = [
            'pamongID' => $pamongID
        ];
        return $this->db->table('tb_magang')
        ->where('magangID', $magangID)
        ->update($data);
    }

}
