<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\MLogbook;
use App\Models\MMahasiswa;
use App\Models\MLogin;
use App\Models\MMagang;
use App\Models\MLaporan;
use App\Models\MNilai;
use App\Models\MPembimbing;

class PembimbingController extends BaseController
{

    public function __construct()
    {
        $this->modelLogbook = new MLogbook();
        $this->modelMhs = new MMahasiswa();
        $this->modelLogin = new MLogin();
        $this->modelMagang = new MMagang();
        $this->modelLaporan = new MLaporan();
        $this->modelNilai = new MNilai();
        $this->modelPembimbing = new MPembimbing();
    }

    public function index()
    {
        $userID = session()->userID;
        $pembimbing = $this->modelLogin->getPembimbingByID($userID);
        $data['logbook'] = $this->modelLogbook->getLogbookByPembimbingID($pembimbing['pembimbingID']);
        return view('pembimbing/v_logbook', $data);
    }

    public function laporan()
    {   
        $userID = session()->userID;
        $pembimbing = $this->modelLogin->getPembimbingByID($userID);
        $data['laporan'] = $this->modelLaporan->getLaporanByPembimbingID($pembimbing['pembimbingID']);
        return view('pembimbing/v_laporan', $data);
    }

    public function penilaian()
    {
        $userID = session()->userID;
        $pembimbing = $this->modelLogin->getPembimbingByID($userID);
        $data['nilai'] = $this->modelNilai->getNilaiByPembimbingID($pembimbing['pembimbingID']);
        return view('pembimbing/v_nilai', $data);
    }

    public function inputNilaiMagang($magangID)
    {
        $detailpem =[
            'magangID' => $magangID,
            'penulisan' => $this->request->getPost('item1'),
            'kelengkapan' => $this->request->getPost('item2'),
            'kesesuaian' => $this->request->getPost('item3'),
            'presentasi' => $this->request->getPost('item4')
        ];
        $nilai = ($detailpem['penulisan'] + $detailpem['kelengkapan'] + $detailpem['kesesuaian'] + $detailpem['presentasi'])/4;
        $this->modelPembimbing->insertDetailNilaiPem($detailpem);
        $data = [
            'status_nilai_pem' => 'ok',
            'nilai_pembimbing' => $nilai
        ];
        $this->modelNilai->insertNilaiOlehPembimbing($magangID, $data);
        return redirect()->to('PembimbingController/penilaian');
    }
}
