<?= $this->extend('template/main');?>

<?= $this->section('title');?>
Pengajuan Pembimbing Magang | E-Magang Informatika
<?= $this->endSection();?>

<?= $this->section('usernamelogin');?>
<?= session()->username;?>
<?= $this->endSection();?>

<?= $this->section('judul');?>
Laporan Magang
<?php $this->endSection(); ?>

<?= $this->section('subjudul');?>
Mahasiswa
<?php $this->endSection(); ?>

<?= $this->section('subsubjudul');?>
Laporan
<?php $this->endSection(); ?>

<?= $this->section('content');?>

<div class="col-12">
    <div class="card">
        <div class="card-header">
            <!-- <h3 class="card-title">Laporan Magang</h3> -->
            <?php if (!empty($magang['magangID'])):?>
                <div class="d-flex flex-row-reverse bd-highlight">
                    <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#exampleModal">
                        <i class="fas fa-plus"></i> Unggah Laporan
                    </button>
                </div>
            <?php endif; ?>
        </div>
    </div>
    <?php if (!empty($laporan['magangID']) && !empty($laporan['laporanID'])): ?>
    
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Laporan Magang</h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <table id="datamagang" class="table table-bordered table-hover">
                <thead>
                    <tr>
                        <th width="150">Nama</th>
                        <th>Tanggal Unggah</th>
                        <th>Laporan Magang</th>
                        <th>Status</th>
                        <?php if ($laporan['validasi_pem'] == 'tidak valid'): ?>
                            <th>Revisi</th>
                            <th>Upload Revisi</th>
                        <?php endif; ?>
                        <?php if ($laporan['validasi_pem'] == 'valid'): ?>
                            <th width="200">Ajukan Permintaan Nilai Magang (Pembimbing)</th>
                            <th width="200">Ajukan Permintaan Nilai Magang (Pamong)</th>
                        <?php endif; ?>
                    </tr>
                </thead>

                <tbody>
                    <tr>
                        <td><?= $laporan['nama'];?></td>
                        <td><?= $laporan['tgl_upload'];?></td>
                        <td><?= $laporan['laporan'];?></td>
                        <?php if ($laporan['validasi_pem'] == 'tidak valid'): ?>
                            <td>
                                <div class="alert alert-danger btn-sm"><i class="fas fa-times"></i> Belum valid!</div>
                            </td>
                            <td><?= $laporan['keterangan'];?></td>
                            <td>
                                <form method="post" action="<?= base_url('MahasiswaController/perbaikanLaporanMahasiswa/'. $laporan['magangID']);?>" enctype="multipart/form-data">
                                    <div class="input-group input-group-sm">
                                        <input type="file" class="form-control" name="revisiLaporan" required>
                                        <span class="input-group-append">
                                            <button type="submit" class="btn btn-info btn-flat">Upload</button>
                                        </span>
                                    </div>
                                </form> 
                            </td>
                        <?php endif; ?>
                        <?php if ($laporan['validasi_pem'] == 'proses'): ?>
                            <td>
                                <div class="alert alert-warning btn-sm"><i class="fas fa-spinner"></i> Menunggu ACC Pembimbing</div>
                            </td>
                        <?php endif; ?>
                        <?php if ($laporan['validasi_pem'] == 'valid'): ?>
                            <td>
                                <div class="alert alert-success btn-sm"><i class="fas fa-check"> </i> Valid!</div>
                            </td>
                            <td>
                                <a href="<?= base_url('MahasiswaController/pengajuanNilaiPembimbing/' . $laporan['magangID']);?>" type="button" class="btn btn-primary">
                                    <?php if(!empty($nilai)):?>
                                        <?php if ($nilai['status_nilai_pem'] === 'proses') {
                                            echo "<i class='fas fa-spinner'></i>";
                                        }elseif ($nilai['status_nilai_pem'] === 'ok') {
                                            echo "<i class='fas fa-check'></i>";
                                        } ?>
                                    <?php endif; ?>
                                    <?php if(empty($nilai)):?>
                                        <i class='fas fa-paper-plane'></i>
                                    <?php endif; ?>
                                </a>
                            </td>
                            <td>
                                <a href="<?= base_url('MahasiswaController/pengajuanNilaiPamong/' . $laporan['magangID']);?>" type="button" class="btn btn-primary">
                                    <?php if(!empty($nilai)):?>
                                        <?php print_r($nilai);die(); ?>
                                        <?php if ($nilai['status_nilai_pem'] === 'proses') {
                                            echo "<i class='fas fa-spinner'></i>";
                                        }elseif ($nilai['status_nilai_pem'] === 'ok') {
                                            echo "<i class='fas fa-check'></i>";
                                        } ?>
                                    <?php endif; ?>
                                    <?php if(empty($nilai)):?>
                                        <i class='fas fa-paper-plane'></i>
                                    <?php endif; ?>
                                </a>
                            </td>
                        <?php endif; ?>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
<?php endif; ?>

<?php if (!empty($magang)): ?>
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Unggah Laporan Magang</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form method="post" action="<?= base_url('MahasiswaController/uploadLaporan/' . $magang['magangID']);?>" enctype="multipart/form-data">
                    <div class="modal-body sm">
                        <div class="mb-3">
                            <label class="form-label">NIM</label>
                            <input type="text" value="<?= $magang['nim'];?>" readonly class="form-control" name="nim">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Nama</label>
                            <input type="text" value="<?= $magang['nama'];?>" readonly class="form-control" name="nama">
                        </div>
                        <hr>
                        <div class="mb-3">
                            <label class="form-label">Laporan</label>
                            <input type="file" class="form-control" name="laporan">
                        </div>
                    </div>
                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
<?php endif; ?>
<?= $this->endSection();?>
