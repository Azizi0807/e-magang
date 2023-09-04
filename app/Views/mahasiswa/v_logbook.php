<?= $this->extend('template/main');?>

<?= $this->section('title');?>
e-Logbook Magang | E-Magang Informatika
<?= $this->endSection();?>

<?= $this->section('usernamelogin');?>
<?= session()->username;?>
<?= $this->endSection();?>

<?= $this->section('judul');?>
Logbook Harian
<?php $this->endSection(); ?>

<?= $this->section('subjudul');?>
Mahasiswa
<?php $this->endSection(); ?>

<?= $this->section('subsubjudul');?>
Logbook
<?php $this->endSection(); ?>

<?= $this->section('content');?>

<div class="col-12">
	<div class="card">
		<div class="card-header">
			<h3 class="card-title"></h3>
			<div class="d-flex flex-row-reverse bd-highlight">
				<button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modal-default">
					<i class="fas fa-plus"></i> Tambah
				</button>
			</div>
		</div>
		<!-- /.card-header -->
		<div class="card-body">
			<table id="datamagang" class="table table-bordered table-hover">
				<thead>
					<tr>
						<th width="50">No</th>
						<th width="150">Tanggal</th>
						<th>Kegiatan</th>
						<th>Dokumentasi</th>
						<th width="70">Validasi Pembimbing</th>
						<th width="70">Validasi Pamong</th>
					</tr>
				</thead>

				<tbody>

					<?php
					$no = 1;
					foreach ($logbook as $k): ?>
						<tr>
							<td><?= $no++;?></td>
							<td><?= $k['tanggal']; ?></td>
							<td><?= $k['aktivitas']; ?></td>
							<td><img src="<?= base_url('uploads/' . $k['dokumentasi']);?>" alt="" width="50"></td>
							<td>
								<form method="POST" action="<?= base_url('MahasiswaController/validasiLogbookPembimbing/'. $k['magangID']); ?>">
									<?php if ($k['valid_pem'] == 0) {
										echo "<button class='btn btn-primary btn-sm'><i class='fas fa-paper-plane'></i></button>";
									} elseif ($k['valid_pem'] == 'proses') {
										echo "<button class='btn btn-primary btn-sm'><i class='fas fa-spinner'></i></button>";
									} elseif ($k['valid_pem'] == 'tidak valid') {
										echo "<button class='btn btn-danger btn-sm'><i class='fas fa-times'></i></button>";
									} elseif ($k['valid_pem'] == 'valid') {
										echo "<button class='btn btn-success btn-sm'><i class='fas fa-check'></i></button>";
									};?>
								</form>
							</td>
							<td>
								<form method="POST" action="<?= base_url('MahasiswaController/validasiLogbookPamong/'. $k['magangID']); ?>">
									<?php if ($k['valid_pam'] == 0) {
										echo "<button class='btn btn-primary btn-sm'><i class='fas fa-paper-plane'></i></button>";
									} elseif ($k['valid_pam'] == 'proses') {
										echo "<button class='btn btn-primary btn-sm'><i class='fas fa-spinner'></i></button>";
									} elseif ($k['valid_pam'] == 'tidak valid') {
										echo "<button class='btn btn-danger btn-sm'><i class='fas fa-times'></i></button>";
									} elseif ($k['valid_pam'] == 'valid') {
										echo "<button class='btn btn-success btn-sm'><i class='fas fa-check'></i></button>";
									};?>
								</form>
							</td>
						</tbody>
					<?php endforeach; ?>
				</table>
			</div>
		</div>
	</div>
	<div class="modal fade" id="modal-default">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<h4 class="modal-title">Pengisian e-Logbook</h4>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<?php foreach ($magang as $r): ?>
						<form method="post" action="<?= base_url('MahasiswaController/inputLogbook/' . $r['magangID']); ?>" enctype="multipart/form-data">
							<div class="modal-body sm">
								<div class="mb-3">
									<label class="form-label">Tanggal</label>
									<input type="date" class="form-control" name="tanggal">
								</div>
								<div class="mb-3">
									<label class="form-label">Aktivitas</label>
									<textarea type="text" class="form-control" name="aktivitas"></textarea>
								</div>
								<div class="mb-3">
									<label for="exampleInputFile">Dokumentasi</label>
									<div class="input-group">
										<div class="custom-file">
											<label class="custom-file-label" for="exampleInputFile">Choose</label>
											<input type="file" class="custom-file-input" name="dokumentasi">
										</div>
									</div>
								</div>
							</div>

						<?php endforeach; ?>
					</div>
					<div class="modal-footer justify-content-between">
						<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
						<button type="submit" class="btn btn-primary btn-sm"> <i class="fas fa-save"></i> Tambah Logbook</button>
					</div>
				</form>
			</div>
			<!-- /.modal-content -->
		</div>
		<!-- /.modal-dialog -->
	</div>
	<!-- ./col -->
	<?= $this->endSection();?>
