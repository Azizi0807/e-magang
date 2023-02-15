<?php

namespace App\Controllers;

use CodeIgniter\Controller;

use App\Models\M_User;

class Login extends BaseController
{
	public function __construct()
	{
		$this->db = db_connect();
		$this->model = new M_User();
		$session = session();
	}

	public function index()
	{
		return view('login');
	}

	public function loginUser()
	{
		
		$username = $this->request->getPost('username');
		$password = $this->request->getPost('password');
		//$level = $this->request->getPost('level');
		$cek = $this->model->getUser($username)->getRowArray();
		if ($cek) {
			$pass = password_verify($password, $cek['password']);
			if ($pass) {
				$isAktif = $this->model->getAktif($username);
				session()->set('username', $username);
				session()->set('level', $cek['level']);
				session()->set('namalengkap', $cek['namalengkap']);
				session()->set('isAktif', $isAktif);
				return redirect()->to('Admin', $isAktif);
			}else{
				session()->setFlashdata('msg','Password tidak sesuai');
				return redirect()->to('Login');
			}
			
		}else{
			session()->setFlashdata('msg','Silahkan isi field dengan benar');
			return redirect()->to('Login');
				
		}

	}

	public function logOut()
	{
		$username = session()->username;
		if (session()->username) {
			$this->model->getNonAktif($username);
			session()->remove('username');
			session()->remove('level');
			session()->setFlashdata('msg', 'Anda telah logout!');
			return redirect()->to('Login');
		}else{
			session()->setFlashdata('msg', 'Anda belum login!');
			return redirect()->to('Login');
		}
		
		
	}
}