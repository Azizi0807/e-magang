<?= $this->extend('template/main');?>

<?= $this->section('title');?>
e-Logbook Magang | E-Magang Informatika
<?= $this->endSection();?>

<?= $this->section('usernamelogin');?>
<?= session()->username;?>
<?= $this->endSection();?>

<?= $this->section('judul');?>
Logbook Magang
<?php $this->endSection(); ?>

<?= $this->section('subjudul');?>
Pamong
<?php $this->endSection(); ?>

<?= $this->section('subsubjudul');?>
Logbook
<?php $this->endSection(); ?>

<?= $this->section('content');?>

<div class="col-12">
	<div class="card">
		<div class="card-header">
			<h3 class="card-title">Validasi Logbook</h3>
		</div>
		<!-- /.card-header -->
		<div class="card-body">
			<?php
			$no = 1;
			foreach ($logbook as $k): ?>
				<?php if ($k['valid_pam'] == 'proses' || $k['valid_pam'] == 'tidak valid'):?>
					<table id="datamagang" class="table table-bordered table-hover">
						<thead>
							<tr>
								<th width="50">No</th>
								<th width="200">Mahasiswa</th>
								<th width="150">Tanggal</th>
								<th width="300">Kegiatan</th>
								<th>Dokumentasi</th>
								<th width="150">Status</th>
							</tr>
						</thead>

						<tbody>


							<tr>
								<td><?= $no++;?></td>
								<td><?= $k['nama'];?></td>
								<td><?= $k['tanggal']; ?></td>
								<td><?= $k['aktivitas']; ?></td>
								<td><img src="<?= base_url('uploads/' . $k['dokumentasi']);?>" alt="" width="50"></td>
								<td>
									<a href="<?= base_url('MahasiswaController/validasiLogbookPamongTidakValid/'. $k['magangID']);?>" type="button" class="btn btn-danger btn-sm"><i class="fas fa-times"></i></a>
									<a href="<?= base_url('MahasiswaController/validasiLogbookPamongValid/'. $k['magangID']);?>" type="button" class="btn btn-success btn-sm"><i class="fas fa-check"></i></a>
								</td>
							</tr>
						</tbody>
					<?php endif ?>
				<?php endforeach; ?>
			</table>
			<?php
			$no = 1;
			if ($k['valid_pam'] == 'valid'): ?>
				<table id="datamagang" class="table table-bordered table-hover">
					<thead>
						<tr>
							<th width="50">No</th>
							<th width="200">Mahasiswa</th>
							<th width="150">Tanggal</th>
							<th width="300">Kegiatan</th>
							<th>Dokumentasi</th>
							<th width="150">Validasi Logbook</th>
						</tr>
					</thead>

					<tbody>


						<tr>
							<td><?= $no++;?></td>
							<td><?= $k['nama'];?></td>
							<td><?= $k['tanggal']; ?></td>
							<td><?= $k['aktivitas']; ?></td>
							<td><img src="<?= base_url('uploads/' . $k['dokumentasi']);?>" alt="" width="50"></td>
							<td><?= $k['valid_pam'];?></td>
						</tr>
					</tbody>

				</table>
			<?php endif; ?>
		</div>

	</div>
</div>
<!-- ./col -->
<?= $this->endSection();?>
