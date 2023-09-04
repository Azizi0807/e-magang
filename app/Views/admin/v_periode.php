<?= $this->extend('template/main');?>

<?= $this->section('title');?>
Periode Magang | E-Magang Informatika
<?= $this->endSection();?>

<?= $this->section('usernamelogin');?>
<?= session()->username;?>
<?= $this->endSection();?>

<?= $this->section('judul');?>
Periode Magang
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
			<h3 class="card-title">Periode Magang</h3>
			<div class="d-flex flex-row-reverse bd-highlight">
				<button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#exampleModal">
					<i class="fas fa-plus"></i> Tambah Periode Magang
				</button>	
			</div>
		</div>
		<!-- /.card-header -->
		<div class="card-body">
			<table id="datamagang" class="table table-bordered table-hover">
				<thead>
					<tr>
						<th width="30">No</th>
						<th>Tahun/Semester</th>
						<th>Periode Magang</th>
						<th>Batas Pendaftaran Magang</th>
						<th width="50" colspan="2"><center>Aksi</center></th>
						<th>Status</th>
					</tr>
				</thead>
				<tbody>
					<?php 
					// dd($periode);
					$no = 1;

					foreach ($periode as $r) { 
						//$tgl_mulai_parts = date_parse_from_format('d-m-Y', $r['tgl_mulai']);
						?>
						<tr>
							<td><?= $no++;?></td>
							<td><?= $r['tahun'];?>/<?= $r['semester'];?></td>
							<td><?= $r['tgl_mulai'];?> - <?= $r['tgl_selesai'];?></td>
							<td><?= $r['tgl_mulai_daftar'];?> - <?= $r['tgl_akhir_daftar'];?></td>
							<td width="25">
								<button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#editModal<?= $r['periodeID']; ?>">
									<i class="fas fa-edit"></i>
								</button>	
							</td>
							<td width="50">
								<a href="#" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></a>
							</td>
							<td>
								
								<div class="form-group">
									<div class="custom-control custom-switch custom-switch-on-success custom-switch-off-danger">
										<input type="checkbox" class="custom-control-input" id="customSwitch<?= $r['periodeID']; ?>" data-periode-id="<?= $r['periodeID']; ?>"
										<?= $r['status'] == 'Aktif' ? 'checked' : ''; ?>>
										<label class="custom-control-label"
										for="customSwitch<?= $r['periodeID']; ?>">
										<?= $r['status']; ?>
									</label>
								</div>
							</div>

						</td>
					</tr>
				</tbody>
			<?php } ?>
		</table>
	</div>
</div>
</div>
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Pengaturan Periode Magang</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<div class="mb-3">
					<form method="post" action="<?= base_url('AdminController/tambahPeriodeMagang');?>" enctype="multipart/form-data">
						<div class="mb-3">
							<label class="form-label">Tahun Ajaran</label>
							<select class="form-control select2" name="tahun" id="tahun">
								<option value="">--Pilih Tahun Ajaran--</option>
								<?php foreach ($tahun as $r) { ?>
									<option class="form-control" value="<?= $r;?>"><?= $r;?></option>
								<?php } ?>
							</select>
						</div>
						<div class="mb-3">
							<label class="form-label">Semester</label>
							<select class="form-control select2" name="semester" id="tahun">
								<option value="">--Pilih Semester--</option>
								<option value="1">Ganjil</option>
								<option value="2">Genap</option>
							</select>
						</div>
						<div class="mb-3">
							<div class="row">
								<div class="col-lg-6">
									<label class="form-label">Mulai Magang</label>
									<input type="date" class="form-control" name="mulai_magang">
								</div>
								<div class="col-lg-6">
									<label class="form-label">Akhir Magang</label>
									<input type="date" class="form-control" name="akhir_magang">
								</div>
							</div>
						</div>
						<div class="mb-3">
							<div class="row">
								<div class="col-lg-6">
									<label class="form-label">Mulai Daftar Magang</label>
									<input type="date" class="form-control" name="mulai_daftar_magang">
								</div>
								<div class="col-lg-6">
									<label class="form-label">Batas Akhir Daftar Magang</label>
									<input type="date" class="form-control" name="batas_akhir_daftar">
								</div>
							</div>
						</div>
						<div class="mb-3">
							<label class="form-label">Status</label>
							<select class="form-control select2" name="status" id="tahun">
								<option value="">--Status Magang--</option>
								<option value="1">Aktif</option>
								<option value="2">Non Aktif</option>
							</select>
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

<?php foreach ($periode as $r) { ?>
	<div class="modal fade" id="editModal<?= $r['periodeID']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">Edit Periode Magang</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<div class="mb-3">
						<form method="post" action="<?= base_url('AdminController/updatePeriode/' . $r['periodeID']);?>" enctype="multipart/form-data">
							<div class="mb-3">
								<div class="row">
									
									<div class="col-lg-6">
										<label class="form-label">Mulai Magang</label>
										<input type="date" class="form-control" name="mulai_magang" value="<?= $r['tgl_mulai'];?>">
									</div>
									<div class="col-lg-6">
										<label class="form-label">Akhir Magang</label>
										<input type="date" class="form-control" name="akhir_magang" value="<?= $r['tgl_selesai'];?>">
									</div>
								</div>
							</div>
							<div class="mb-3">
								<div class="row">
									<div class="col-lg-6">
										<label class="form-label">Mulai Daftar Magang</label>
										<input type="date" class="form-control" name="mulai_daftar_magang" value="<?= $r['tgl_mulai_daftar'];?>">
									</div>
									<div class="col-lg-6">
										<label class="form-label">Batas Akhir Daftar Magang</label>
										<input type="date" class="form-control" name="batas_akhir_daftar" value="<?= $r['tgl_akhir_daftar'];?>">
									</div>
								</div>
							</div>
							<div class="mb-3">
								<label class="form-label">Status</label>
								<select class="form-control select2" name="status" id="tahun">
									<option value="">--Status Magang--</option>
									<option value="1" <?= $r['status'] == 'Aktif' ? 'selected' : '';?>>Aktif</option>
									<option value="2" <?= $r['status'] == 'Non aktif' ? 'selected' : '';?> >Non Aktif</option>
								</select>
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
<?php } ?>



<!-- ./col -->
<?= $this->endSection();?>
