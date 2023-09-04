<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\MLogbook;
use App\Models\MMahasiswa;
use App\Models\MLogin;
use App\Models\MMagang;
use App\Models\MLaporan;
use App\Models\MNilai;
use App\Models\MPamong;
class PamongController extends BaseController
{

    public function __construct()
    {
        $this->model = new MLogbook();
        $this->modelMhs = new MMahasiswa();
        $this->modelLogin = new MLogin();
        $this->modelMagang = new MMagang();
        $this->modelLaporan = new MLaporan();
        $this->modelNilai = new MNilai();
        $this->modelPamong = new MPamong();
    }

    public function index()
    {
        $userID = session()->userID;
        $pamong = $this->modelLogin->getPamongByID($userID);
        $data['logbook'] = $this->model->getLogbookByPamongID($pamong['pamongID']);
        return view('pamong/v_logbook', $data);
    }

    public function dataProfil()
    {   
        $id = session()->userID;
        $data['pamong'] = $this->modelPamong->getPamongByID($id);
        return view('pamong/v_profil', $data);
    }

    public function ubahProfilPamong($id)
    {
        $id = $this->request->getPost('id');
        $data = [
            'namapam' => $this->request->getPost('namapam'),
            'nidn' => $this->request->getPost('nidn')
        ];

        $success = $this->modelPamong->updateProfil($id, $data);

        if ($success) {
            return redirect()->to(base_url('PamongController/dataProfil'));
        }else{
            return redirect()->to(base_url('PamongController/dataProfil'));
        }
    }

    public function penilaian()
    {
        $userID = session()->userID;
        $pamong = $this->modelLogin->getPamongByID($userID);
        $data['nilai'] = $this->modelNilai->getNilaiByPamongID($pamong['pamongID']);
        return view('pamong/v_nilai', $data);
    }

    public function inputNilaiMagang($magangID)
    {
        $detailpam =[
            'magangID' => $magangID,
            'sosial' => $this->request->getPost('item1'),
            'adaptasi' => $this->request->getPost('item2'),
            'komunikasi' => $this->request->getPost('item3'),
            'kerjasama' => $this->request->getPost('item4'),
            'disiplin' => $this->request->getPost('item5'),
            'tanggungjawab' => $this->request->getPost('item6'),
            'pemahaman' => $this->request->getPost('item7'),
            'solutif' => $this->request->getPost('item8'),
            'kreatif' => $this->request->getPost('item9'),
            'hasilkerja' => $this->request->getPost('item10')
        ];
        $nilai = ($detailpam['sosial'] + $detailpam['adaptasi'] + $detailpam['komunikasi'] + $detailpam['kerjasama'] + $detailpam['disiplin'] + $detailpam['tanggungjawab'] + $detailpam['pemahaman'] + $detailpam['solutif'] + $detailpam['kreatif'] + $detailpam['hasilkerja'])/10;
        $this->modelPamong->insertDetailNilaiPam($detailpam);
        $data = [
            'status_nilai_pam' => 'ok',
            'nilai_pamong' => $nilai
        ];
        $this->modelNilai->insertNilaiOlehPamong($magangID, $data);

        $userID = session()->userID;
        $akunPamong = $this->modelLogin->getPamongByID($userID);
        $pamong = $this->modelNilai->getInputNilaiByPamong($akunPamong['pamongID']);
        $tot = ($pamong['nilai_pembimbing'] + $pamong['nilai_pamong'])/2;
        $data = [
            'total' => $tot
        ]; 
        $this->modelNilai->updateTotalNilai($magangID, $data);
        return redirect()->to('PamongController/penilaian');
    }
}
