<?= $this->extend('template/main');?>

<?= $this->section('title');?>
Data Industri | E-Magang Informatika
<?= $this->endSection();?>

<?= $this->section('usernamelogin');?>
<?= session()->username;?>
<?= $this->endSection();?>

<?= $this->section('judul');?>
Data Industri
<?php $this->endSection(); ?>

<?= $this->section('subjudul');?>
Users
<?php $this->endSection(); ?>

<?= $this->section('subsubjudul');?>
<?= session()->username;?>
<?php $this->endSection(); ?>

<?= $this->section('content');?>
<div class="col-12">
	<div class="card">
		<div class="card-header">
			<h3 class="card-title">Data Industri</h3>
			<div class="d-flex flex-row-reverse bd-highlight">
				<button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#exampleModal">
					<i class="fas fa-plus"></i> Tambah Industri
				</button>	
			</div>
		</div>
		<!-- /.card-header -->
		<div class="card-body">
			<table id="datamagang" class="table table-bordered table-hover">
				<thead>
					<tr>
						<th width="30">No</th>
						<th>Nama Industri</th>
						<th>Alamat</th>
						<th>Kontak</th>
						<th width="50" colspan="2"><center>Aksi</center></th>
					</tr>
				</thead>
				<tbody>
					<?php
					$no = 1; 
					foreach ($industri as $k): 
						?>
						<tr>
							<td><?= $no++;?></td>
							<td><?= $k['namaindustri'];?></td>
							<td><?= $k['alamat'];?></td>
							<td><?= $k['kontak'];?></td>
							<td width="25">
								<button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#editModal<?= $k['industriID'];?>">
									<i class="fas fa-edit"></i>
								</button>	
							</td>
							<td width="50">
								<a href="<?= base_url('AdminController/hapusIndustri/' . $k['industriID']) ?>" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></a>
							</td>
						</tr>
					<?php endforeach; ?>
				</tbody>
			</table>
		</div>
	</div>
</div>
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Data Industri</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<div class="mb-3">
					<form method="post" action="<?= base_url('AdminController/tambahDataIndustri') ?>" enctype="multipart/form-data">
						<div class="mb-3">
							<label class="form-label">Nama Industri</label>
							<input type="text" value="" class="form-control" name="namaindustri" required>
						</div>
						<div class="mb-3">
							<label class="form-label">Alamat</label>
							<textarea type="text" class="form-control" name="alamat" required></textarea>
						</div>
						<div class="mb-3">
							<label class="form-label">Kontak</label>
							<input type="text" value="" class="form-control" name="kontak">
						</div>
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
					<button type="submit" class="btn btn-primary">Tambah</button>
				</div>
			</form>
		</div>
	</div>
</div>

<?php foreach ($industri as $k):?>
	<div class="modal fade" id="editModal<?= $k['industriID'];?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">Edit Data Industri</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<div class="mb-3">
						<form method="post" action="<?= base_url('AdminController/updateDataIndustri') ?>" enctype="multipart/form-data">
							<input type="hidden" name="id" value="<?= $k['industriID']; ?>">
							<div class="mb-3">
								<label class="form-label">Nama Industri</label>
								<input type="text" class="form-control" name="namaindustri" value="<?= $k['namaindustri'];?>">
							</div>
							<div class="mb-3">
								<label class="form-label">Alamat</label>
								<textarea type="text" class="form-control" name="alamat"><?= $k['alamat'];?></textarea>
							</div>
							<div class="mb-3">
								<label class="form-label">Kontak</label>
								<input type="text" value="<?= $k['kontak'];?>" class="form-control" name="kontak">
							</div>
						</div>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
						<button type="submit" class="btn btn-primary">Simpan Perubahan</button>
					</div>
				</form>
			</div>
		</div>
	</div>
<?php endforeach; ?>
<!-- ./col -->
<?= $this->endSection();?>
