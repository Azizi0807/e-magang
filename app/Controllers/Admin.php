<?php

namespace App\Controllers;

use CodeIgniter\Controller;

use App\Models\M_User;

class Admin extends BaseController
{
    public function __construct()
    {
        $this->model = new M_User();
        $session = session();
        
    }

    public function index()
    {
        
        if (session()->username) {
            return view('admin/home');
        }else{
            return redirect()->to(site_url('login'));
        }
    }

    public function magang()
    {
        return view('admin/list_magang');
    }

    public function user()
    {
        $data= [
            'judul' => "Kelola User",
            'user' => $this->model->getUser(),
        ];
        return view('admin/kelola_user', $data);
    }

    public function tambahUser()
    {
        $data = [
            'username' => $this->request->getPost('username'),
            'password' => $this->request->getPost('password'),
            'level' => $this->request->getPost('level')
        ];

       // / $success = $this->model->tambahData($data);

    }

    public function jadwal()
    {
        return view('admin/jadwal');
    }
    
    public function nilai()
    {
        return view('admin/nilai');
    }
}