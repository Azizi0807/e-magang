<?php

namespace App\Controllers;
use App\Controllers\BaseController;
use App\Models\MMagang;
use App\Models\MMahasiswa;
use App\Models\MPeriode;
use App\Models\MIndustri;
use Dompdf\Dompdf;
use Dompdf\Options;
use Endroid\QrCode\Color\Color;
use Endroid\QrCode\Encoding\Encoding;
use Endroid\QrCode\ErrorCorrectionLevel\ErrorCorrectionLevelLow;
use Endroid\QrCode\QrCode;
use Endroid\QrCode\Label\Label;
use Endroid\QrCode\Logo\Logo;
use Endroid\QrCode\RoundBlockSizeMode\RoundBlockSizeModeMargin;
use Endroid\QrCode\Writer\PngWriter;
use Endroid\QrCode\Writer\ValidationException;

class MagangController extends BaseController
{
    protected $model;

    public function __construct()
    {
        $this->model = new MMagang();
        $this->modelPeriode = new MPeriode();
        $this->modelIndustri = new MIndustri();
    }

    public function pengajuan()
    {
        $mhsID = $this->request->uri->getSegment(3);
        $periodeID = $this->request->getPost('periode');

        $industriID = $this->request->getPost('industri');
        $jumlahKuota = $this->modelIndustri->cekKuotaMhs($industriID);
        // print_r($jumlahKuota);die();
        if ($jumlahKuota['kuota'] <= 2 && $jumlahKuota['kuota'] <= 0) {
            return redirect()->to(base_url('MahasiswaController'))->with('pesan', 'Kuota Penuh');
            
        }
        else{
            $data = [
                'mahasiswaID' => $mhsID,
                'pembimbingID' => 0,
                'pamongID' => 0,
                'industriID' => $this->request->getPost('industri'),
                'periodeID' => $periodeID,
                'status' => 'belum diajukan',
                'suratbalasan' => '-',
                'status_pembimbing' => 'belum diajukan',
                'qrcode' => '-'
            ];
        // print_r($data);die();
            $datasimpan['magang'] = $this->model->kirimPengajuan($data);
            if ($datasimpan) {
                return redirect()->to(base_url('MahasiswaController'))->with('pesan', 'Pengajuan berhasil!');
            }else{
                return redirect()->to(base_url('MahasiswaController'))->with('pesan', 'Pengajuan gagal!');
            }
        }
    }

    public function validasiAdmin($magangID)
    {
        $data['status'] = 'proses';
        $this->model->getValid($magangID, $data);
        return redirect()->to(base_url('MahasiswaController'));
    }

    public function validasiDitolak($magangID) 
    {
        $data['status'] = 'ditolak';
        $this->model->getValid($magangID, $data);
        return redirect()->to(base_url('AdminController'));
    }

    public function validasiDiterima($magangID) 
    {
        $data['status'] = 'diterima';
        $this->model->getValid($magangID, $data);
        return redirect()->to(base_url('AdminController'));
    }

    public function unduhSuratIzin($magangID)
    {
        // phpinfo();die;   
        $magang = $this->model->getMagangByID($magangID);

        $url = base_url('MahasiswaController/verifikasi/'. $magangID);

        // print_r($url);die();

        // Buat QR code dengan konten yang diinginkan (misalnya nim)
        $qrCode = new QrCode($url);
        $qrCode->setSize(150); // Atur ukuran QR code
        $qrCode->setMargin(10); // Atur margin QR code

        // Konversi QR code menjadi gambar PNG
        $writer = new PngWriter();
        $gambarQR = $writer->write($qrCode);

        // Simpan gambar QR code ke dalam database
        $data = [
            'qrcode' => base64_encode($gambarQR->getString())
        ];
        $this->model->qrCodeSuratIzin($magangID, $data);

        // Render file PDF
        $options = new Options();
        $options->set('defaultFont', 'Courier');

        $dompdf = new Dompdf($options);

        $magangQR = $this->model->getMagangByID($magangID);
        $data['magang'] = $magangQR;
        $html = view('verifikasi/surat_izin', $data);

        $dompdf->loadHtml($html);
        $dompdf->setPaper('A4', 'portrait');
        $dompdf->render();

        // Simpan file PDF
        $output = $dompdf->output();
        $filename = 'SuratIzinMagang_' . $magang['nim'] . '.pdf';
        file_put_contents($filename, $output);

        try {
            return $this->response->download($filename, null);
        } catch (\Exception $e) {
            echo 'Terjadi kesalahan dalam mengunduh file.';
        }
    }


    public function uploadSuratBalasan($magangID)
    {
        $surat = $this->request->getFile('suratBalasan');
        if ($surat->isValid()) {
            $surat->move('uploads/', $surat->getName());
            $suratBalas = $surat->getName();
            $this->model->updateSurat($magangID, $suratBalas);
            return redirect()->to(base_url('MahasiswaController'));
        } else {
            return redirect()->to(base_url('MahasiswaController'));
        }
    }

    public function validasiPembimbing($magangID)
    {
        $data['status_pembimbing'] = 'proses';
        $this->model->getValidPembimbing($magangID, $data);
        return redirect()->to(base_url('MahasiswaController/pembimbing'));
    }

    public function getPembimbing($magangID) 
    {
        $cekSuratBalasan = $this->model->getMagangByID($magangID);
        if ($cekSuratBalasan) {
            $data = [
                'pembimbingID' => $this->request->getVar('pembimbing'),
                'status_pembimbing' => 'diterima'
            ];
            $this->model->tambahPembimbing($magangID, $data);
            return redirect()->to(base_url('AdminController/pembimbing'));
        } else {
            return redirect()->to(base_url('AdminController/pembimbing'))->with('msg', 'Anda belum upload surat balasan dari instansi!');
        }

    }


}
