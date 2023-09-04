<?php

namespace App\Models;

use CodeIgniter\Model;

class MIndustri extends Model
{
    protected $table            = 'tb_industri';
    protected $primaryKey       = 'industriID';
    protected $allowedFields    = ['namaindustri', 'alamat', 'kontak', 'kuota'];

    public function getAllData()
    {
        return $this->findAll();
    }

    public function getByID($id)    
    {
        return $this->find($id);
    }

    public function cekKuota($magangID) 
    {
        return $data = $this->db->table('tb_industri')
        ->join('tb_magang', 'tb_industri.industriID = tb_magang.industriID')
        ->where('tb_magang.magangID', $magangID)
        ->get()
        ->getRowArray();
    }

    public function cekKuotaMhs($industriID) 
    {
        return $data = $this->db->table('tb_industri')
        ->where('industriID', $industriID)
        ->get()
        ->getRowArray();
    }

    public function kurangiKuota($industriID)
    {
    // Mendapatkan kuota saat ini
        $currentKuota = $this->db->table('tb_industri')
        ->select('kuota')
        ->where('industriID', $industriID)
        ->get()
        ->getRowArray();

        if ($currentKuota) {
        // Mengurangi kuota dan update tabel tb_industri
            $newKuota = $currentKuota['kuota'] - 1;
            $this->db->table('tb_industri')
            ->where('industriID', $industriID)
            ->update(['kuota' => $newKuota]);
        }
    }

    public function addDataIndustri($data)
    {
        return $this->insert($data);
    }

    public function updateData($id, $data)
    {
        return $this->update($id, $data);
    }

    public function deleteIndustri($id)
    {   
        return $this->delete($id);
    }
}
