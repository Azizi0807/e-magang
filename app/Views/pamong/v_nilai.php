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
Pamong
<?php $this->endSection(); ?>

<?= $this->section('subsubjudul');?>
Nilai
<?php $this->endSection(); ?>

<?= $this->section('content');?>

<div class="col-12">
	<div class="card">
		<div class="card-header">
			<h3 class="card-title">Validasi Nilai</h3>
		</div>
		<!-- /.card-header -->
		<div class="card-body">
			<?php
			$no = 1;
			foreach ($nilai as $k): ?>
				<?php if ($k['status_nilai_pam'] == 'proses'):?>
					<table id="datamagang" class="table table-bordered table-hover">
						<thead>
							<tr>
								<th width="50">No</th>
								<th width="200">Mahasiswa</th>
								<th width="300">Input Nilai</th>
							</tr>
						</thead>

						<tbody>
							<tr>
								<td><?= $no++;?></td>
								<td><?= $k['nama'];?></td>
								<td>
									<a type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#exampleModal"><i class="fas fa-edit"></i></a>
								</td>
							</tr>
						</tbody>
					<?php endif ?>
					<?php if ($k['status_nilai_pam'] == 'ok'):?>
						<table id="datamagang" class="table table-bordered table-hover">
							<thead>
								<tr>
									<th width="50">No</th>
									<th width="200">Mahasiswa</th>
									<th width="50">Nilai</th>
								</tr>
							</thead>

							<tbody>
								<tr>
									<td><?= $no++;?></td>
									<td><?= $k['nama'];?></td>
									<td><?= $k['nilai_pamong'];?></td>
								</tr>
							</tbody>
						<?php endif ?>
					<?php endforeach; ?>
				</table>

			</div>

		</div>
	</div>
	<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<?php foreach ($nilai as $r): ?>
					<div class="modal-header">
						<h5 class="modal-title" id="exampleModalLabel">Input Nilai Magang</h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<div class="modal-body">
						<form method="post" action="<?= base_url('PamongController/inputNilaiMagang/' . $r['magangID']);?>">
							<div class="form-group">
								<label for="exampleInputEmail1">Nama</label>
								<input type="text" class="form-control" value="<?= $r['nama'];?>" readonly placeholder="Enter email">
							</div>
							<div class="form-group">
								<label for="exampleInputPassword1">Interaksi Sosial</label>
								<input type="number" class="form-control" name="item1" placeholder="Input angka..." required autofocus>
							</div>
							<div class="form-group">
								<label for="exampleInputPassword1">Adaptasi terhadap sistem kerja</label>
								<input type="number" class="form-control" name="item2" placeholder="Input angka..." required>
							</div>
							<div class="form-group">
								<label for="exampleInputPassword1">Kemampuan berkomunikasi</label>
								<input type="number" class="form-control" name="item3" placeholder="Input angka..." required>
							</div>
							<div class="form-group">
								<label for="exampleInputPassword1">Bekerja dalam tim</label>
								<input type="number" class="form-control" name="item4" placeholder="Input angka..." required>
							</div>
							<div class="form-group">
								<label for="exampleInputPassword1">Disiplin dan loyalitas</label>
								<input type="number" class="form-control" name="item5" placeholder="Input angka..." required>
							</div>
							<div class="form-group">
								<label for="exampleInputPassword1">Tanggung jawab</label>
								<input type="number" class="form-control" name="item6" placeholder="Input angka..." required>
							</div>
							<div class="form-group">
								<label for="exampleInputPassword1">Penguasaan dan pemahaman tugas</label>
								<input type="number" class="form-control" name="item7" placeholder="Input angka..." required>
							</div>
							<div class="form-group">
								<label for="exampleInputPassword1">Kemampuan dalam pemecahan masalah</label>
								<input type="number" class="form-control" name="item8" placeholder="Input angka..." required>
							</div>
							<div class="form-group">
								<label for="exampleInputPassword1">Ide-ide kreatif</label>
								<input type="number" class="form-control" name="item9" placeholder="Input angka..." required>
							</div>
							<div class="form-group">
								<label for="exampleInputPassword1">Kualitas hasil kerja</label>
								<input type="number" class="form-control" name="item10" placeholder="Input angka..." required>
							</div>
						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
							<button type="submit" class="btn btn-primary">Submit</button>
						</div>
					</form>
				<?php endforeach; ?>
			</div>
		</div>
	</div>
	<!-- ./col -->
	<?= $this->endSection();?>
