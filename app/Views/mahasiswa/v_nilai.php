<?= $this->extend('template/main');?>

<?= $this->section('title');?>
Nilai Magang | E-Magang Informatika
<?= $this->endSection();?>

<?= $this->section('usernamelogin');?>
<?= session()->username;?>
<?= $this->endSection();?>

<?= $this->section('judul');?>
Nilai Magang
<?php $this->endSection(); ?>

<?= $this->section('subjudul');?>
Mahasiswa
<?php $this->endSection(); ?>

<?= $this->section('subsubjudul');?>
Nilai
<?php $this->endSection(); ?>

<?= $this->section('content');?>
<div class="col-12">
	<div class="card">
		<div class="card-header">
			<h3 class="card-title">Nilai Magang</h3>
		</div>
		<!-- /.card-header -->
		<div class="card-body">
			<table id="datamagang" class="table table-bordered table-hover">
				<thead>
					<tr>
						<th>Item Penilaian Pembimbing</th>
						<th width="70">Nilai</th>
					</tr>
				</thead>

				<?php if (!empty($nilai)):?>
					<tbody>
						<tr>
							<td>Sistematika Penulisan</td>
							<td><?= $nilai['penulisan'];?></td>
						</tr>
						<tr>

							<td>Kelengkapan Laporan</td>
							<td><?= $nilai['kelengkapan'];?></td>

						</tr>
						<tr>
							
							<td>Isi Laporan yang Sesuai dengan Bidang TI</td>
							<td><?= $nilai['kesesuaian'];?></td>
						</tr>
						<tr>
							
							<td>Teknik Presentasi Laporan</td>
							<td><?= $nilai['presentasi'];?></td>
						</tr>
					</tbody>
				<?php endif; ?>
			</table>
		</div>
		<div class="card-body">
			<table id="datamagang" class="table table-bordered table-hover">
				<thead>
					<tr>
						<th>Item Penilaian Pamong</th>
						<th width="70">Nilai</th>
					</tr>
				</thead>

				<?php if (!empty($nilai)):?>
					<tbody>
						<tr>
							<td>Interaksi Sosial</td>
							<td><?= $nilai['sosial'];?></td>
						</tr>
						<tr>
							<td>Adaptasi terhadap sistem kerja</td>
							<td><?= $nilai['adaptasi'];?></td>
						</tr>
						<tr>
							
							<td>Kemampuan berkomunikasi</td>
							<td><?= $nilai['komunikasi'];?></td>
						</tr>
						<tr>
							<td>Kemampuan bekerja dalam tim</td>
							<td><?= $nilai['kerjasama'];?></td>
						</tr>
						<tr>
							<td>Disiplin dan loyalitas dalam pekerjaan</td>
							<td><?= $nilai['disiplin'];?></td>
						</tr>
						<tr>
							<td>Pelaksanaan dan tanggung jawab atas pekerjaan yang dilakukan</td>
							<td><?= $nilai['tanggungjawab'];?></td>
						</tr>
						<tr>
							<td>Penguasaan dan pemahaman tugas</td>
							<td><?= $nilai['pemahaman'];?></td>
						</tr>
						<tr>
							<td>Kemampuan dalam memecahkan masalah</td>
							<td><?= $nilai['solutif'];?></td>
						</tr>
						<tr>
							<td>Kemampuan memberikan ide-ide kreatif</td>
							<td><?= $nilai['kreatif'];?></td>
						</tr>
						<tr>
							<td>Kualitas hasil kerja</td>
							<td><?= $nilai['hasilkerja'];?></td>
						</tr>
					</tbody>
				<?php endif; ?>
			</table>
		</div>
		<div class="card-body">
			<table id="datamagang" class="table table-bordered table-hover">
				<thead>
					<tr>
						<th></th>
						<th>Nilai Pembimbing</th>
						<th>Nilai Pamong</th>
						<th>NA</th>
					</tr>
				</thead>

				<?php if (!empty($nilai)):?>
					<tbody>
						<tr>
							<th>Nilai Akhir</th>
							<td><?= $nilai['nilai_pembimbing'];?></td>
							<td><?= $nilai['nilai_pamong'];?></td>
							<td><?= $nilai['total'];?></td>
						</tr>
					</tbody>
				<?php endif; ?>
			</table>
		</div>
	</div>
</div>
</div>
</div>
<?= $this->endSection();?>
