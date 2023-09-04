<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\MMagang;
use App\Models\MMahasiswa;
use App\Models\MPembimbing;
use App\Models\MIndustri;
use App\Models\MPeriode;

class AdminController extends BaseController
{
    public function __construct()
    {
        $this->model = new MMagang();
        $this->modelMhs = new MMahasiswa();
        $this->modelPembimbing = new MPembimbing();
        $this->modelIndustri = new MIndustri();
        $this->modelPeriode = new MPeriode();
    }

    public function index()
    {

        $data['magang'] = $this->model->getMagang();
        // echo "<pre>";
        // print_r($data);die();
        // echo "</pre>";
        return view('admin/v_magang', $data);
    }

    public function pembimbing()
    {
        $data['pembimbing'] = $this->modelPembimbing->getPembimbing();
        $data['magang'] = $this->model->getMagang();
        return view('admin/v_pembimbing', $data);
    }

    public function getIndustri()
    {
        $data['industri'] = $this->modelIndustri->getAllData();
        return view('admin/v_industri', $data);
    }

    public function tambahDataIndustri()
    {
        $data = [
            'namaindustri' => $this->request->getPost('namaindustri'),
            'alamat' => $this->request->getPost('alamat'),
            'kontak' => $this->request->getPost('kontak')
        ];

        $success = $this->modelIndustri->addDataIndustri($data);

        if ($success) {
            return redirect()->to(base_url('AdminController/getIndustri'))->with('pesan', 'Data berhasil ditambahkan!');
        }else{
            return redirect()->to(base_url('AdminController/getIndustri'));
        }
    }

    public function updateDataIndustri()
    {
        $id = $this->request->getPost('id');
        $data = [
            'namaindustri' => $this->request->getPost('namaindustri'),
            'alamat' => $this->request->getPost('alamat'),
            'kontak' => $this->request->getPost('kontak')
        ];

        $success = $this->modelIndustri->updateData($id, $data);
        if ($success) {
            return redirect()->to(base_url('AdminController/getIndustri'));
        }else{
            return redirect()->to(base_url('AdminController/getIndustri'));
        }
    }

    public function hapusIndustri($id)
    {
        $success = $this->modelIndustri->deleteIndustri($id);
        if ($success) {
            return redirect()->to(base_url('AdminController/getIndustri'));
        }else{
            return redirect()->to(base_url('AdminController/getIndustri'));
        }
    }

    public function periode()
    {
        $data['periode'] = $this->modelPeriode->getPeriodeMagang();
        $data['tahun'] = range(date('Y') - 3, date('Y') + 10);
        return view('admin/v_periode', $data);
    }

    public function tambahPeriodeMagang()
    {
        $data = [
            'tahun' => $this->request->getPost('tahun'),
            'semester' => $this->request->getPost('semester'),
            'tgl_mulai' => $this->request->getPost('mulai_magang'),
            'tgl_selesai' => $this->request->getPost('akhir_magang'),
            'tgl_mulai_daftar' => $this->request->getPost('mulai_daftar_magang'),
            'tgl_akhir_daftar' => $this->request->getPost('batas_akhir_daftar'),
            'status' => $this->request->getPost('status')
        ];
        //dd($data);

        $success = $this->modelPeriode->addPeriode($data);

        return redirect()->to(base_url('AdminController/periode'))->with('msg', 'Data berhasil ditambahkan!');
    }

    public function updatePeriode($id)
    {
        $data = [
            'tgl_mulai' => $this->request->getPost('mulai_magang'),
            'tgl_selesai' => $this->request->getPost('akhir_magang'),
            'tgl_mulai_daftar' => $this->request->getPost('mulai_daftar_magang'),
            'tgl_akhir_daftar' => $this->request->getPost('batas_akhir_daftar'),
            'status' => $this->request->getPost('status')
        ];

        $success = $this->modelPeriode->updatePeriode($id, $data);
        if ($success) {
            return redirect()->to(base_url('AdminController/periode'));
        } else{
            return redirect()->to(base_url('AdminController/periode'));
        }
    }
}
