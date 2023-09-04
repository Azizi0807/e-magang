<?php

namespace App\Models;

use CodeIgniter\Model;

class MPamong extends Model
{
    protected $table            = 'tb_pamong';
    protected $primaryKey       = 'pamongID';
    protected $allowedFields    = ['userID', 'namapam', 'nidn'];

    public function insertPamong($datapamong)
    {
        $this->insert($datapamong);
        return $this->insertID();
    }

    public function insertDetailNilaiPam($detailpam)
    {
        $this->db->table('tb_detailnilai_pam')
        ->insert($detailpam);
    }

    public function getPamongByID($id)
    {
        return $this->where('userID', $id)->first();
    }

    public function updateProfil($id, $data)    
    {
        return $this->update($id, $data);
    }
}
