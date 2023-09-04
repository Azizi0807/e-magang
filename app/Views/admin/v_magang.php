<?= $this->extend('template/main');?>

<?= $this->section('title');?>
Pendaftaran Magang | E-Magang Informatika
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
Magang
<?php $this->endSection(); ?>

<?= $this->section('content');?>

<div class="col-12">
	<div class="card">
		<div class="card-header">		
			<h3 class="card-title">Validasi Magang</h3>
		</div>
		<!-- /.card-header -->
		<div class="card-body">
			<table id="datamagang" class="table table-bordered table-hover">
				<thead>
					<tr>
						<th width="60">No</th>
						<th width="150">NIM</th>
						<th>Nama</th>
						<th width="120">Validasi</th>
					</tr>
				</thead>
				<tbody>					

					<?php 
					$no = 1;
					foreach ($magang as $r):?>
						<?php if ($r['status'] == 'proses'): ?>
							<tr>
								<td><?= $no++;?></td>
								<td><?= $r['nim'];?></td>
								<td><?= $r['nama'];?></td>
								<td>
									<a href="#" type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#verifikasiMagang<?= $r['magangID'];?>"><i class="fas fa-info"></i></a>
									<div class="modal fade" id="verifikasiMagang<?= $r['magangID'];?>">
										<div class="modal-dialog">
											<div class="modal-content">
												<div class="modal-header">
													<h4 class="modal-title">Verifikasi Magang</h4>
												</div>
												<div class="modal-body">
													<div class="form-group">
														<label for="">Penempatan</label>
														<input type="text" class="form-control" value="<?= $r['namaindustri'];?>">
													</div>													
													<div class="form-group">
														<label for="">Kuota</label>
														<input type="text" class="form-control" value="<?= $r['kuota'];?>" name="kuota">
													</div>
												</div>
												<div class="modal-footer">
													<a href="<?= base_url('MagangController/validasiDitolak/'. $r['magangID']);?>" type="button" class="btn btn-danger btn-sm"><i class="fas fa-times"></i> Tolak</a>
													<a href="<?= base_url('MagangController/validasiDiterima/'. $r['magangID']);?>" type="button" class="btn btn-success btn-sm"><i class="fas fa-check"></i> Terima</a>
												</div>
											</div>
										</div>
									</div>

								</td>
							<?php endif ?>
						</tr>
					</tbody>
				<?php endforeach;;?>
			</table>
		</div>
	</div>

	<div class="card">
		<div class="card-header">		
			<h3 class="card-title">Daftar Mahasiswa Magang</h3>
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
						<th>Alamat</th>
						<!-- <th>Periode Magang</th> -->
					</tr>
				</thead>
				<tbody>					
					<?php 
					$no = 1;
					foreach ($magang as $r):?>
						<?php if ($r['status'] == 'diterima'): ?>
							<tr>
								<td><?= $no++;?></td>
								<td><?= $r['nim'];?></td>
								<td><?= $r['nama'];?></td>
								<td><?= $r['namaindustri'];?></td>
								<td><?= $r['alamat'];?></td>
								
							</tr>
						<?php endif; ?>
					</tbody>
				<?php endforeach;;?>
			</table>
		</div>
	</div>
</div>
</script>

<!-- ./col -->
<?= $this->endSection();?>
