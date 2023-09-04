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

class NilaiController extends BaseController
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
    }

    public function index()
    {
        
    }
}
