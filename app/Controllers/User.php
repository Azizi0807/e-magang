<?php

namespace App\Controllers;

use CodeIgniter\Controller;

use App\Models\M_User;
use App\Models\M_logbook;

class User extends BaseController
{
    public function __construct()
    {

        $this->model = new M_User();
        $this->model = new M_logbook();
    }

    public function index()
    {
        $data = [
            'judul' => 'Logbook',
            'bio' => $this->model->getData()
        ];
        
        return view('user/logbook_user', $data);
    }

    public function profile()
    {
        $data = [
            'judul' => 'My Profile',
            'profil' => $this->model->profilMhs()
        ];
        return view('user/profile', $data);
    }

    public function tambah()
    {
        $data = [
            'tanggal' => $this->request->getPost('tanggal'),
            'kegiatan' => $this->request->getPost('kegiatan'),
            'hasil' => $this->request->getPost('hasil'),
        ];
        $success = $this->model->tambahData($data);
        if ($success) {
            return redirect()->to(base_url('User'));
        }
    }
}

