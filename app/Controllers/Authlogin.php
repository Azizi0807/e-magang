<?php

namespace App\Controllers;

use GuzzleHttp\Client;
use App\Controllers\BaseController;
use App\Models\mLogin;


class Authlogin extends BaseController
{
    protected $model;
    protected $client;

    function __construct()
    {
        $this->model = new MLogin();
        $session = session();
        $this->client = new Client();
    }

    public function index()
    {
        return view('v_login');
    }

    public function prosesLogin()
    {
        $username = $this->request->getPost('username');
        $password = $this->request->getPost('password');

        $user = $this->model->where('username', $username)->first();

        if ($user && password_verify($password, $user['password'])) {
            $role = $user['role'];
            $userId = $user['userID'];

            if ($role === 'admin') {
                session()->set('userID', $userId);
                session()->set('username', $user['username']);  
                session()->set('role', $role);
                return redirect()->to(base_url('Home'));
            } 
            elseif ($role === 'mahasiswa') {
                $mahasiswa = $this->model->getMahasiswaId($userId);
                session()->set('userID', $userId);
                session()->set('username', $mahasiswa['nama']);  
                session()->set('role', $role);
                return redirect()->to(base_url('Home/mahasiswa'));
            } 
            elseif ($role === 'pembimbing') {
                $pembimbing = $this->model->getPembimbingById($userId);
                session()->set('userID', $userId);
                session()->set('username', $pembimbing['namapemb']);  
                session()->set('role', $role);
                return redirect()->to(base_url('Home/pembimbing'));
            }
            elseif ($role === 'pamong') {
                $pamong = $this->model->getPamongById($userId);
                session()->set('userID', $userId);
                session()->set('username', $pamong['namapam']);
                session()->set('role', $role);
                return redirect()->to(base_url('Home/pamong'));
            } 
            else {
                return redirect()->back()->with('error', 'Username/password salah!');
            }
        }
        else{
            return redirect()->back()->with('error', 'Username/password salah!');
        }
    }

    // public function prosesLogin()
    // {
    //     $username = $this->request->getPost('username');
    //     $password = $this->request->getPost('password');

    //     try {
    //         $response = $this->client->request('POST', 'https://endpoint.upgrisba.ac.id/index.php/v1/autentikasi/autentikasi_dummy', [
    //             'headers' => [
    //                 'X-API-KEY' => 'EMONEVhasdjkhui23h487ofihsdf897234r'
    //             ],
    //             'form_params' => [
    //                 'login' => $username,
    //                 'password' => $password
    //             ]
    //         ]);

    //         $status_code = $response->getStatusCode();
    //         $response_body = $response->getBody()->getContents();
    //         $result = json_decode($response_body, true);

    //         if ($result['status'] === 'success') {
    //             $role = $result['data']['role'];
    //             $userId = $result['data']['LevelID'];
    //             $username = $result['data']['Nama'];
    //             session()->set('userID', $userId);
    //             session()->set('username', $username);
    //             session()->set('role', $role);

    //             return redirect()->to(base_url('Home'));
    //         } else {
    //             return redirect()->back()->with('error', 'Username/password salah!');
    //         }
    //     } catch (\Exception $e) {
    //         //return redirect()->back()->with('error', 'Terjadi kesalahan. Silakan coba lagi!');
    //         echo $e->getMessage();
    //     }
    // }   


    public function logout()
    {
        // Proses logout dan penghapusan sesi pengguna
        session()->remove('username');
        session()->remove('userID');
        session()->setFlashdata('msg', 'Anda telah keluar!');
        return redirect()->to(base_url());
    }
}