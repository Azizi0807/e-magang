<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index()
    {
        return view('template/home');
    }

    public function mahasiswa()
    {
        return view('mahasiswa/v_home_mhs');
    }

    public function pembimbing()
    {
        return view('pembimbing/v_home');
    }

    public function pamong()
    {
        return view('pamong/v_home');
    }

}
