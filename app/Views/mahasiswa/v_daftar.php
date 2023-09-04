<?= $this->extend('template/main');?>

<?= $this->section('title');?>
Pendaftaran Magang | E-Magang Informatika
<?= $this->endSection();?>

<?= $this->section('usernamelogin');?>
<?= session()->username;?>
<?= $this->endSection();?>

<?= $this->section('judul');?>
Pendaftaran Magang
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
			<h3 class="card-title">Pendaftaran Magang</h3>
			<div class="d-flex flex-row-reverse bd-highlight">	
				<button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#exampleModal">
					<i class="fas fa-plus"></i> Daftar
				</button>
			</div>
		</div>


		<!-- /.card-header -->
		<div class="card-body">
			<?php if (session()->getFlashdata('pesan')) {?>
				<div class="alert alert-danger"><?= session()->getFlashdata('pesan');?></div>
			<?php } ?>
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

					<?php foreach ($magang as $k): ?>
						<tr>
							<td><?= $k['nim']; ?></td>
							<td><?= $k['nama']; ?></td>
							<td><?= $k['namaindustri']; ?></td>
							<td>
								<form method="POST" action="<?= base_url('MagangController/validasiAdmin/'. $k['magangID']); ?>">
									<?php if ($k['status'] == 'belum diajukan') {
										echo "<button class='btn btn-primary btn-sm'><i class='fas fa-paper-plane'></i></button>";
									} elseif ($k['status'] == 'proses') {
										echo "<button class='btn btn-primary btn-sm'><i class='fas fa-spinner'></i></button>";
									} elseif ($k['status'] == 'ditolak') {
										echo "<button class='btn btn-danger btn-sm'><i class='fas fa-times'></i></button>";
									} elseif ($k['status'] == 'diterima') {
										echo "<button class='btn btn-success btn-sm'><i class='fas fa-check'></i></button>";
									};?>	
								</form>
							</td>
						</tr>
					<?php endforeach; ?>
				</tbody>
			</table>
		</div>
	</div>

	<div class="card">

		<div class="card-header">
			<h3 class="card-title">Download Surat Izin Magang</h3>
		</div>
		<!-- /.card-header -->
		<div class="card-body">
			<table id="datamagang" class="table table-bordered table-hover">
				<thead>
					<tr>
						<th width="150">NIM</th>
						<th width="200">Nama</th>
						<th width="250">Instansi</th>
						<th width="100">Surat Izin Magang</th>
						<th width="250">Surat Balasan</th>
					</tr>
				</thead>
				<?php foreach ($magang as $k): ?>
					<?php if ($k['status'] == 'diterima'): ?>
						<tbody>
							<tr>
								<td><?= $k['nim']; ?></td>
								<td><?= $k['nama']; ?></td>
								<td><?= $k['namaindustri']; ?></td>
								<td>
									<a href="<?= base_url('MagangController/unduhSuratIzin/' . $k['magangID']);?>" class="btn btn-primary btn-sm"><i class="fas fa-download"></i></a>
								</td>
								<?php if ($k['suratbalasan'] == '-'): ?>
									<td>
										<form method="post" action="<?= base_url('MagangController/uploadSuratBalasan/'. $k['magangID']);?>" enctype="multipart/form-data">
											<div class="input-group input-group-sm">
												<input type="file" class="form-control" name="suratBalasan" required>
												<span class="input-group-append">
													<button type="submit" class="btn btn-info btn-flat">Upload</button>
												</span>
											</div>
										</form> 
									</td>
								<?php endif; ?>
								<?php if ($k['suratbalasan'] !== '-' && $k['status_pembimbing'] !== 'belum diajukan') {
									echo "<td>OK</td>";
								} ?>
							</tr>
						</tbody>
					<?php endif; ?>
				<?php endforeach; ?>
			</table>
		</div>

	</div>

</div>
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<?php foreach ($syarat as $r): ?>
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">Registrasi Magang</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<form method="post" action="<?= base_url('MagangController/pengajuan/' . $r['mahasiswaID']); ?>" enctype="multipart/form-data">
					<div class="modal-body sm">
						
						<div class="mb-3">
							<label class="form-label">Nama</label>
							<input type="text" value="<?= $r['nama'] ?>" readonly class="form-control" name="nama">
						</div>
						<hr>
						<div class="mb-3">
							<label class="form-label">Jaringan Komputer</label>
							<input type="text" value="<?= $r['jarkom'] ?>" readonly class="form-control" name="jarkom">
						</div>
						<div class="mb-3">
							<label class="form-label">Desain Grafis</label>
							<input type="text" value="<?= $r['desaingrafis'] ?>" readonly class="form-control" name="desain">
						</div>
						<div class="mb-3">
							<label class="form-label">Sistem Informasi Manajemen</label>
							<input type="text" value="<?= $r['sim'] ?>" readonly class="form-control" name="sim">
						</div>
						<div class="mb-3">
							<select class="form-control" name="industri" id="">
								<option value="#" class="form-control">Pilih Instansi</option>
								<?php foreach ($industri as $ind): ?>
									<option value="<?= $ind['industriID'];?>"><?= $ind['namaindustri'];?></option>
								<?php endforeach; ?>
							</select>
						</div>				
						<div class="mb-3">
							<input type="hidden" class="form-control" name="periode" value="<?= $periode['periodeID'];?>">
						</div>

					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Batal</button>
						<button type="submit" class="btn btn-primary btn-sm">Ajukan</button>
					</div>
				</form>
			<?php endforeach; ?>
		</div>
	</div>
</div>





<!-- ./col -->
<?= $this->endSection();?>
