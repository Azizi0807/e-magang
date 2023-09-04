<?php

namespace App\Models;

use CodeIgniter\Model;

class MLaporan extends Model
{
    protected $table            = 'tb_laporan';
    protected $primaryKey       = 'laporanID';
    protected $allowedFields    = ['magangID', 'laporan', 'tgl_upload', 'validasi_pem', 'keterangan'];

    public function getLaporanByMagangID($magangID)
    {
        return $this->select()
        ->join('tb_magang', 'tb_magang.magangID = tb_laporan.magangID', 'left')
        ->join('tb_mahasiswa', 'tb_mahasiswa.mahasiswaID = tb_magang.mahasiswaID', 'left')
        ->join('tb_pembimbing', 'tb_pembimbing.pembimbingID = tb_magang.pembimbingID', 'left')
        ->where('tb_laporan.magangID', $magangID,)
        ->first();
    }

    public function uploadLaporan($data)
    {
        return $this->insert($data);
    }

    public function getLaporanByPembimbingID($pembimbingID)
    {
        return $this->select()
        ->join('tb_magang', 'tb_magang.magangID = tb_laporan.magangID')
        ->join('tb_mahasiswa', 'tb_mahasiswa.mahasiswaID = tb_magang.mahasiswaID')
        ->join('tb_pembimbing', 'tb_pembimbing.pembimbingID = tb_magang.pembimbingID')
        ->where('tb_magang.pembimbingID', $pembimbingID)
        ->findAll();
    }

    public function getLaporanByPamongID($pamongID)
    {
        return $this->select()
        ->join('tb_magang', 'tb_magang.magangID = tb_laporan.magangID')
        ->join('tb_mahasiswa', 'tb_mahasiswa.mahasiswaID = tb_magang.mahasiswaID')
        ->join('tb_pamong', 'tb_pamong.pamongID = tb_magang.pamongID')
        ->where('tb_magang.pembimbingID', $pamongID)
        ->findAll();
    }

    public function getValidasiPembimbing($magangID, $data)
    {
        if ($data['validasi_pem'] == 'tidak valid') {
            return $this->db->table('tb_laporan')
            ->where('magangID', $magangID)
            ->update($data);
        } 
        elseif($data['validasi_pem'] == 'valid') {
            return $this->db->table('tb_laporan')
            ->where('magangID', $magangID)
            ->update($data);
        } 

    }

    public function updateLaporan($magangID, $data)
    {
        return $this->db->table('tb_laporan')
        ->where('magangID', $magangID)
        ->update($data);
    }

}
