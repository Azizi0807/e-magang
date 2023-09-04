<?= $this->extend('template/main');?>

<?= $this->section('title');?>
Pembimbing Magang | E-Magang Informatika
<?= $this->endSection();?>

<?= $this->section('usernamelogin');?>
<?= session()->username;?>
<?= $this->endSection();?>

<?= $this->section('judul');?>
Magang
<?php $this->endSection(); ?>

<?= $this->section('subjudul');?>
Mahasiswa
<?php $this->endSection(); ?>

<?= $this->section('subsubjudul');?>
Validasi Pembimbing
<?php $this->endSection(); ?>

<?= $this->section('content');?>

<div class="col-12">
	<div class="card">
		<?php 
		$no = 1;
		foreach ($magang as $r):?>
			<?php if ($r['status_pembimbing'] == 'proses'): ?>
				<div class="card-header">		
					<h3 class="card-title">Validasi Pembimbing</h3>
				</div>
				<!-- /.card-header -->
				<div class="card-body">

					
					<table id="datamagang" class="table table-bordered table-hover">
						<thead>
							<tr>
								<th width="60">No</th>
								<th width="150">NIM</th>
								<th>Nama</th>
								<th>Instansi</th>
								<th width="300">Tentukan Pembimbing</th>
							</tr>
						</thead>
						<tbody>					

							<tr>
								<td><?= $no++;?></td>
								<td><?= $r['nim'];?></td>
								<td><?= $r['nama'];?></td>
								<td><?= $r['namaindustri'];?></td>
								<td>
									<form action="<?= base_url('MagangController/getPembimbing/' . $r['magangID']);?>" method="post">
										<div class="input-group input-group-sm">
											<select name="pembimbing" id="" required class="form-control">
												<option value="" >Pilih Pembimbing</option>
												<?php foreach ($pembimbing as $k):?>
													<option value="<?= $k['pembimbingID'];?>"><?= $k['namapemb'];?></option>
												<?php endforeach; ?>
											</select>
											<span class="input-group-append">
												<button type="submit" class="btn btn-primary btn-flat">Kirim</button>
											</span>
										</div>
									</form>
								</td>
							</tr>

						</tbody>
					</table>
				</div>
			<?php endif ?>
		<?php endforeach;;?>
	</div>

	<div class="card">
		<div class="card-header">		
			<h3 class="card-title">Daftar Pembimbing Mahasiswa Magang</h3>
		</div>
		<!-- /.card-header -->
		<div class="card-body">
			<table id="datamagang" class="table table-bordered table-hover">
				<thead>
					<tr>
						<th width="60">No</th>
						<th width="150">NIM</th>
						<th>Nama</th>
						<th>Instansi</th>
						<th>Pembimbing</th>
					</tr>
				</thead>
				<tbody>					
					<?php 
					$no = 1;
					foreach ($magang as $r):?>
						<?php if ($r['status_pembimbing'] == 'diterima'): ?>
							<tr>
								<td><?= $no++;?></td>
								<td><?= $r['nim'];?></td>
								<td><?= $r['nama'];?></td>
								<td><?= $r['namaindustri'];?></td>
								<td><?= $r['namapemb'];?></td>

							</tr>
						<?php endif ?>
					<?php endforeach;;?>
				</tbody>
			</table>
		</div>
	</div>
</div>
</script>

<!-- ./col -->
<?= $this->endSection();?>
