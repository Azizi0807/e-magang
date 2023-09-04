<?php

namespace App\Models;

use CodeIgniter\Model;

class MPeriode extends Model
{
    protected $table            = 'tb_periode';
    protected $primaryKey       = 'periodeID';
    protected $allowedFields    = ['tahun', 'semester', 'tgl_mulai', 'tgl_selesai', 'tgl_mulai_daftar', 'tgl_akhir_daftar', 'status'];

    public function getPeriodeMagang()
    {
        return $this->findAll();
    }

    public function addPeriode($data)  
    {
        return $this->insert($data);
    }

    public function updatePeriode($id, $data)
    {
        $update = $this->db->table('tb_periode')
        ->where('periodeID',$id)
        ->update($data);
        return $update;
    }
}
