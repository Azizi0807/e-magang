<?= $this->extend('template/main');?>

<?= $this->section('title');?>
Pengajuan Pembimbing Magang | E-Magang Informatika
<?= $this->endSection();?>

<?= $this->section('usernamelogin');?>
<?= session()->username;?>
<?= $this->endSection();?>

<?= $this->section('judul');?>
Pembimbing Magang
<?php $this->endSection(); ?>

<?= $this->section('subjudul');?>
Mahasiswa
<?php $this->endSection(); ?>

<?= $this->section('subsubjudul');?>
Magang
<?php $this->endSection(); ?>

<?= $this->section('content');?>

<div class="col-12">
	<div class="card">
		
		<?php foreach ($magang as $k): ?>
			<?php if ($k['status'] == 'diterima') : ?>
				<div class="card-header">
					<h3 class="card-title">Pengajuan Pembimbing Magang</h3>
				</div>
				<!-- /.card-header -->
				<div class="card-body">
					<table id="datamagang" class="table table-bordered table-hover">
						<thead>
							<tr>
								<th width="150">NIM</th>
								<th>Nama</th>
								<th>Instansi</th>
								<th width="120">Pengajuan</th>
							</tr>
						</thead>

						<tbody>


							<tr>
								<td><?= $k['nim']; ?></td>
								<td><?= $k['nama']; ?></td>
								<td><?= $k['namaindustri']; ?></td>
								<td>
									<?php if ($k['suratbalasan'] !== '-') : ?>
										<form method="POST" action="<?= base_url('MagangController/validasiPembimbing/'. $k['magangID']); ?>">
											<?php if ($k['status_pembimbing'] == 'belum diajukan') {
												echo "<button class='btn btn-primary btn-sm'><i class='fas fa-paper-plane'></i></button>";
											} elseif ($k['status_pembimbing'] == 'proses') {
												echo "<button class='btn btn-primary btn-sm'><i class='fas fa-spinner'></i></button>";
											} elseif ($k['status_pembimbing'] == 'diterima') {
												echo "<button class='btn btn-primary btn-sm'><i class='fas fa-check'></i></button>";
											}?>	
										</form>
									<?php endif; ?>
								</td>
							</tr>
						</tbody>
					</table>
				</div>
			<?php endif ?>
		<?php endforeach; ?>
	</div>

	<div class="card">
		<?php foreach ($magang as $k): ?>
			<?php if ($k['status'] == 'diterima' && $k['status_pembimbing'] == 'diterima'): ?>
				<div class="card-header">
					<h3 class="card-title">Data Magang</h3>
				</div>
				<!-- /.card-header -->
				<div class="card-body">
					<table id="datamagang" class="table table-bordered table-hover">
						<thead>
							<tr>
								<th width="150">NIM</th>
								<th width="200">Nama</th>
								<th width="250">Instansi</th>
								<th width="300">Alamat</th>
								<th width="250">Pembimbing</th>
								<th width="200">Pamong</th>
							</tr>
						</thead>

						<tbody>

							<tr>
								<td><?= $k['nim']; ?></td>
								<td><?= $k['nama']; ?></td>
								<td><?= $k['namaindustri']; ?></td>
								<td><?= $k['alamat'];?></td>
								<td><?= $k['namapemb'];?></td>
								<td>
									<a href="<?= base_url('MahasiswaController/SetAkunPamong/' . $k['magangID']);?>" class="btn btn-primary"><i class="fas fa-cog"></i> Setup Akun</a>
								</td>

							</tr>
						</tbody>
					</table>
				<?php endif; ?>
			<?php endforeach; ?>
		</div>
		<div class="card">

			<div class="card-header">
				<h3 class="card-title">Akun Pamong</h3>
			</div>
			<!-- /.card-header -->
			<div class="card-body">
				<table id="datamagang" class="table table-bordered table-hover">
					<thead>
						<tr>
							<th width="250">Username</th>
							<th width="300">Password</th>
						</tr>
					</thead>

					<tbody>

						<tr>
							<td><?= $pamongUsername ?? ''; ?></td>
							<td><?= $pamongPassword ?? ''; ?></td>
						</tr>

					</tbody>
				</table>
			</div>
		</div>


		<!-- ./col -->
		<?= $this->endSection();?>
