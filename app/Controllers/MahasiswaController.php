<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\MMahasiswa;
use App\Models\MLogin;
use App\Models\MSyarat;
use App\Models\MMagang;
use App\Models\MLogbook;
use App\Models\MLaporan;
use App\Models\MPamong;
use App\Models\MNilai;
use App\Models\MPeriode;

class MahasiswaController extends BaseController
{
    public function __construct()
    {
        $this->modelMhs = new MMahasiswa();
        $this->model = new MLogin();
        $this->modelSyarat = new MSyarat();
        $this->modelMagang = new MMagang();
        $this->modelLogbook = new MLogbook();
        $this->modelLaporan = new MLaporan();
        $this->modelPamong = new MPamong();
        $this->modelNilai = new MNilai();
        $this->modelPeriode = new MPeriode();
    }

    public function index()
    {
        $userID = session()->userID;;
        $mahasiswa = $this->modelMhs->getMahasiswa($userID);
        $data['magang'] = $this->modelMagang->getMagangByMahasiswaID($mahasiswa['mahasiswaID']);
        $data['syarat'] = $this->modelSyarat->getSyaratByMahasiswaID($mahasiswa['mahasiswaID']);
        $data['industri'] = $this->modelMagang->getIndustri();
        $data['periode'] = $this->modelPeriode->where(['status' => 'Aktif'])->first();
        
        return view('mahasiswa/v_daftar', $data);
    }

    public function pembimbing()
    {
        $userID = session()->userID;
        $mahasiswa = $this->modelMhs->getMahasiswa($userID);
        $magang = $this->modelMagang->getMagangByMahasiswaID($mahasiswa['mahasiswaID']);
        if($magang){
            $pamongID = $magang[0]['pamongID'];
            $pamongAkun = $this->modelMagang->getPamongByUsernameAndPassword($pamongID);
            $data['pamongUsername'] = $pamongAkun['username'] ?? '';
            $data['pamongPassword'] = $pamongAkun['password'] ?? '';
        }else{
            $pamongAkun = [];
        }
        $data['magang'] = $magang;
        return view('mahasiswa/v_pembimbing', $data);
    }

    public function logbook()
    {
        $userID = session()->userID;
        $mahasiswa = $this->modelMhs->getMahasiswa($userID);
        $data['magang'] = $this->modelMagang->getMagangByMahasiswaID($mahasiswa['mahasiswaID']);
        $data['logbook'] = $this->modelLogbook->getLogbookByMahasiswaID($mahasiswa['mahasiswaID']);
        return view('mahasiswa/v_logbook', $data);
    }

    public function inputLogbook($magangID)
    {
        $foto = $this->request->getFile('dokumentasi');
        if ($foto->isValid()) {
            $foto->move('uploads/', $foto->getName());
            $fotoAktivitas = $foto->getName();
            $data = [
                'magangID' => $magangID,
                'tanggal' => $this->request->getPost('tanggal'),
                'aktivitas' => $this->request->getPost('aktivitas'),
                'dokumentasi' => $fotoAktivitas,
                'valid_pem' => 0,
                'valid_pam' => 0
            ];
            $datasimpan['logbook'] = $this->modelLogbook->tambahLogbook($data);
            if ($datasimpan) {
                return redirect()->to(base_url('MahasiswaController/logbook'))->with('pesan', 'Logbook berhasil ditambahkan!');
            }else{
                return redirect()->to(base_url('MahasiswaController/logbook'))->with('pesan', 'Logbook gagal ditambahkan!');
            }
        }
    }

    public function validasiLogbookPembimbing($magangID) 
    {
        $data['valid_pem'] = 'proses';
        $this->modelLogbook->getValidLogbookPembimbing($magangID, $data);
        return redirect()->to(base_url('MahasiswaController/logbook'));
    }

    public function validasiLogbookPembimbingValid($magangID) 
    {
        $data['valid_pem'] = 'valid';
        $this->modelLogbook->getValidLogbookPembimbing($magangID, $data);
        return redirect()->to(base_url('PembimbingController'));
    }

    public function validasiLogbookPembimbingTidakValid($magangID) 
    {
        $data['valid_pem'] = 'tidak valid';
        $this->modelLogbook->getValidLogbookPembimbing($magangID, $data);
        return redirect()->to(base_url('PembimbingController'));
    }

    public function validasiLogbookPamong($magangID) 
    {
        $data['valid_pam'] = 'proses';
        $this->modelLogbook->getValidLogbookPamong($magangID, $data);
        return redirect()->to(base_url('MahasiswaController/logbook'));
    }

    public function validasiLogbookPamongValid($magangID) 
    {
        $data['valid_pam'] = 'valid';
        $this->modelLogbook->getValidLogbookPamong($magangID, $data);
        return redirect()->to(base_url('PamongController'));
    }

    public function validasiLogbookPamongTidakValid($magangID) 
    {
        $data['valid_pam'] = 'tidak valid';
        $this->modelLogbook->getValidLogbookPamong($magangID, $data);
        return redirect()->to(base_url('PamongController'));
    }

    public function SetAkunPamong($magangID)
    {
        $tampilData = [
            'username' => mt_rand(10000000, 99999999), 
            'password' => 'pamong'
        ];

        $hash = password_hash($tampilData['password'], PASSWORD_DEFAULT);
        $data = [
            'username' => $tampilData['username'],
            'password' => $hash,
            'role'     => 'pamong'
        ];
        
        $this->model->insertUser($data);
        $userID = $this->model->getInsertID();

        $datapamong = [
            'userID' => $userID,
            'namapam' => '',
            'nidn' => ''
        ];
        $this->modelPamong->insertPamong($datapamong);
        $pamongID = $this->modelPamong->getInsertID();

        $this->modelMagang->updateMagangPamong($magangID, $pamongID);
        return redirect()->to(base_url('MahasiswaController/pembimbing'));
    }

    public function laporan()
    {
        $userID = session()->userID;
        $mahasiswa = $this->modelMhs->getMahasiswa($userID);
        $data = [];

        if ($mahasiswa) {
            $magang = $this->modelMagang->getLaporanByMahasiswaID($mahasiswa['mahasiswaID']);
            if ($magang) {
                $magangID = $magang['magangID'];
                $data['magang'] = $magang;
                $data['nilai'] = $this->modelNilai->getNilaiByMagangID($magangID);
                $data['laporan'] = $this->modelLaporan->getLaporanByMagangID($magangID);
            } else {
                $data['magang'] = [];
                $data['nilai'] = [];
                $data['laporan'] = [];
            }
        } else {
            $data['magang'] = [];
            $data['nilai'] = [];
            $data['laporan'] = [];
        }

        return view('mahasiswa/v_laporan', $data);
    }


    public function uploadLaporan($magangID)
    {
        $laporan = $this->request->getFile('laporan');
        if ($laporan->isValid()) {
            $laporan->move('uploads/', $laporan->getName());
            $uploadLaporan = $laporan->getName();
            $data = [
                'magangID' => $magangID,
                'laporan' => $uploadLaporan,
                'tgl_upload' => date('Y-m-d'),
                'validasi_pem' => 'proses',
                'keterangan' => ''
            ];
            // print_r($data);die();
            $datasimpan['laporan'] = $this->modelLaporan->uploadLaporan($data);
            if ($datasimpan) {
                return redirect()->to(base_url('MahasiswaController/laporan'))->with('pesan', 'Logbook berhasil ditambahkan!');
            }else{
                return redirect()->to(base_url('MahasiswaController/laporan'))->with('pesan', 'Logbook gagal ditambahkan!');
            }
        }
    }

    public function perbaikanLaporanMahasiswa($magangID)
    {
        $laporan = $this->request->getFile('revisiLaporan');
        if ($laporan->isValid()) {
            $laporan->move('uploads/', $laporan->getName());
            $laporanRevisi = $laporan->getName();
            $data = [
                'laporan' => $laporanRevisi,
                'validasi_pem' => 'proses'
            ];
            $this->modelLaporan->updateLaporan($magangID, $data);
            return redirect()->to(base_url('MahasiswaController/laporan'));
        }
    }

    public function unduhLaporanMahasiswa($magangID)
    {
        // $data = $this->modelLaporan->getLaporanByPembimbingID($magangID);print_r(expression)
        // try {
        //     return $this->response->download($filename, null);
        // } catch (\Exception $e) {
        //     echo 'Terjadi kesalahan dalam mengunduh file.';
        // }
    }

    public function validasiLaporanPembimbingTidakValid($magangID)
    {
        $data = [
            'validasi_pem' => 'tidak valid',
            'keterangan' => $this->request->getPost('keterangan')
        ];
        $this->modelLaporan->getValidasiPembimbing($magangID, $data);
        return redirect()->to(base_url('PembimbingController/laporan'));
    }

    public function validasiLaporanPembimbingValid($magangID)
    {
        $data['validasi_pem'] = 'valid';
        $this->modelLaporan->getValidasiPembimbing($magangID, $data);
        return redirect()->to(base_url('PembimbingController/laporan'));
    }

    public function penilaian()
    {
        $userID = session()->userID;
        $mahasiswa = $this->modelMhs->getMahasiswa($userID);
        $data['nilai'] = $this->modelNilai->getNilaiByMagangID($mahasiswa['mahasiswaID']);
        return view('mahasiswa/v_nilai', $data);
    }

    public function pengajuanNilaiPembimbing($magangID)
    {
        $data = [
            'magangID' => $magangID,
            'status_nilai_pem' => 'proses',
            'nilai_pembimbing' => 0,
            'nilai_pamong' => 0,
            'total' => 0
        ];
        //print_r($data);die();
        $this->modelNilai->updateStatusNilaiPembimbing($data);
        return redirect()->to(base_url('MahasiswaController/laporan'));
    }

    public function pengajuanNilaiPamong($magangID)
    {
        $data = [
            'status_nilai_pam' => 'proses',
            'nilai_pamong' => 0,
            'total' => 0
        ];
        $this->modelNilai->updateStatusNilaiPamong($magangID, $data);
        return redirect()->to(base_url('MahasiswaController/laporan'));
    }

    public function verifikasi($magangID)
    {
        $data['magang'] = $this->modelMagang->getVerifikasiMagangByMahasiswaID($magangID);
        $data['industri'] = $this->modelMagang->getIndustri();
        return view('verifikasi/v_verifikasi', $data);
    }
}
