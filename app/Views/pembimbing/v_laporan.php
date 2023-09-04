<?= $this->extend('template/main');?>

<?= $this->section('title');?>
Data Laporan Magang | E-Magang Informatika
<?= $this->endSection();?>

<?= $this->section('usernamelogin');?>
<?= session()->username;?>
<?= $this->endSection();?>

<?= $this->section('judul');?>
Laporan Magang
<?php $this->endSection(); ?>

<?= $this->section('subjudul');?>
Pembimbing
<?php $this->endSection(); ?>

<?= $this->section('subsubjudul');?>
Laporan
<?php $this->endSection(); ?>

<?= $this->section('content');?>


<div class="col-12">
	<?php 
	$no = 1;
	foreach ($laporan as $r): ?>
		<div class="card">
			<?php if ($r['validasi_pem'] == 'proses'): ?>
				<div class="card-header">
					<h3 class="card-title">Validasi Laporan</h3>
				</div>
				<!-- /.card-header -->
				<div class="card-body">
					<table id="datamagang" class="table table-bordered table-hover">
						<thead>
							<tr>
								<th width="150">No</th>
								<th>Nama Mahasiswa</th>
								<th>Laporan</th>
								<th>Status</th>
								<th>Tanggal Upload</th>
							</tr>
						</thead>

						<tbody>
							<tr>
								<td><?= $no++;?></td>
								<td><?= $r['nama'];?></td>
								<td>
									<a href="<?= base_url('MahasiswaController/unduhLaporanMahasiswa/' . $r['magangID']);?>" class="btn btn-primary btn-sm"><i class="fas fa-download"></i></a>
								</td>
								<td>
									<a href="#" type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#exampleModal"><i class="fas fa-times"></i></a>
									<a href="<?= base_url('MahasiswaController/validasiLaporanPembimbingValid/'. $r['magangID']);?>" type="button" class="btn btn-success btn-sm"><i class="fas fa-check"></i></a> 
								</td>
								<td><?= $r['tgl_upload'];?></td>

							</tr>
						</tbody>
					</table>
				</div>
			<?php endif ?>

		</div>
		<?php if ($r['validasi_pem'] == 'tidak valid'): ?>
			<div class="card">
				<div class="card-header">
					<h3 class="card-title">Laporan Magang</h3>
				</div>
				<!-- /.card-header -->
				<div class="card-body">
					<table id="datamagang" class="table table-bordered table-hover">
						<thead>
							<tr>
								<th width="150">NIM</th>
								<th>Nama</th>
								<th>Laporan Magang</th>
								<th>Status</th>
								<th>Tanggal Upload</th>
							</tr>
						</thead>

						<tbody>


							<tr>
								<td><?= $r['nim'];?></td>
								<td><?= $r['nama'];?></td>
								<td><?= $r['laporan'];?></td>
								<td><?= $r['validasi_pem'];?></td>
							</tr>
						</tbody>
					</table>
				</div>
			</div>
		<?php endif; ?>

		

		<?php if ($r['validasi_pem'] == 'valid'): ?>
			<div class="card">
				<div class="card-header">
					<h3 class="card-title">Laporan Magang</h3>
				</div>
				<!-- /.card-header -->
				<div class="card-body">
					<table id="datamagang" class="table table-bordered table-hover">
						<thead>
							<tr>
								<th width="150">NIM</th>
								<th>Nama</th>
								<th>Laporan Magang</th>
								<th>Validasi</th>
								<th>Tanggal Upload</th>
							</tr>
						</thead>

						<tbody>
							<?php 
							$no = 1;
							foreach ($laporan as $k): ?>
								<tr>
									<td><?= $k['nim'];?></td>
									<td><?= $k['nama'];?></td>
									<td>
										<a href="<?= base_url('MahasiswaController/unduhLaporanMahasiswa/' . $k['magangID']);?>" class="btn btn-primary btn-sm"><i class="fas fa-download"></i></a>
									</td>
									<td>
										<a href="#" class="btn btn-primary btn-sm"><i class="fas fa-check"></i></a>
									</td>
									<td><?= $k['tgl_upload'];?></td>
								</tr>
							</tbody>
						<?php endforeach; ?>
					</table>
				</div>
			</div>
		<?php endif; ?>


		<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
			<div class="modal-dialog">
				<div class="modal-content">
					<?php foreach ($laporan as $k):?>
						<div class="modal-header">
							<h5 class="modal-title" id="exampleModalLabel">Validasi Laporan Magang</h5>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>
						<form method="post" action="<?= base_url('MahasiswaController/validasiLaporanPembimbingTidakValid/' . $k['magangID']);?>" enctype="multipart/form-data">
							<div class="modal-body sm">
								<div class="mb-3">
									<label class="form-label">Berikan Komentar</label>
									<textarea name="keterangan" class="form-control" id="" autofocus></textarea>
								</div>
							</div>
							<div class="modal-footer">
								<button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Batal</button>

								<button type="submit" class="btn btn-primary btn-sm">Validasi</button>
							</div>
						</form>
					<?php endforeach; ?>
				</div>
			</div>
		</div>
	<?php endforeach; ?>
	<!-- ./col -->
	<?= $this->endSection();?>
