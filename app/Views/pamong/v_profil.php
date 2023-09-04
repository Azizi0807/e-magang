<?= $this->extend('template/main');?>

<?= $this->section('title');?>
Data Profil | E-Magang Informatika
<?= $this->endSection();?>

<?= $this->section('usernamelogin');?>
<?= session()->username;?>
<?= $this->endSection();?>

<?= $this->section('judul');?>
Data Profil
<?php $this->endSection(); ?>

<?= $this->section('subjudul');?>
Home
<?php $this->endSection(); ?>

<?= $this->section('content');?>
<div class="col-12">
	<div class="row">
		<?php if ($pamong) : ?>
			<div class="col-md-3">
				<img src="#" alt="Foto Pamong" class="img-fluid">
			</div>
			<div class="col-md-9">
				<p>Nama Pamong: <?= $pamong['namapam']; ?></p>
				<p>NIDN: <?= $pamong['nidn']; ?></p>
				<!-- Tambahkan data lain yang ingin ditampilkan -->

				<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#updateProfil<?= $pamong['pamongID'];?>">
					Update Profil
				</button>
			</div>
		<?php else : ?>
			<div class="col-md-12">
				<p>Data pamong tidak ditemukan.</p>
			</div>
		<?php endif; ?>
	</div>
</div>

<div class="modal fade" id="updateProfil<?= $pamong['pamongID'];?>" tabindex="-1" role="dialog" aria-labelledby="updateModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="updateModalLabel">Update Profil</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<!-- Form untuk update profil -->
				<form id="updateForm" action="<?= base_url('PamongController/ubahProfilPamong/' . $pamong['pamongID']); ?>" method="post">
					<input type="hidden" name="id" value="<?= $pamong['pamongID']; ?>">
					<div class="form-group">
						<label for="namapam">Nama Pamong</label>
						<input type="text" class="form-control" id="namapam" name="namapam" value="<?= $pamong['namapam']; ?>" >
					</div>
					<div class="form-group">
						<label for="nidn">NIDN</label>
						<input type="text" class="form-control" id="nidn" name="nidn" value="<?= $pamong['nidn']; ?>">
					</div>
					<!-- Tambahkan input data lain yang ingin di-update -->
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
					<button type="submit" class="btn btn-primary">Simpan Perubahan</button>
				</div>
			</form>
		</div>
	</div>
</div>
<!-- ./col -->
<?= $this->endSection();?>


