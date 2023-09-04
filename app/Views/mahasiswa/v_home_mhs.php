<?= $this->extend('template/main');?>

<?= $this->section('title');?>
Dashboard | E-Magang Informatika
<?= $this->endSection();?>

<?= $this->section('usernamelogin');?>
<?= session()->username;?>
<?= $this->endSection();?>

<?= $this->section('judul');?>
Dashboard
<?php $this->endSection(); ?>

<?= $this->section('subjudul');?>
Home
<?php $this->endSection(); ?>

<?= $this->section('content');?>
<div class="col-lg-3 col-6">
	<!-- small box -->
	<div class="small-box bg-info">
		<div class="inner">
			<h3></h3>

			<p>Pendaftaran</p>
		</div>
		<div class="icon">
		</div>
		<a href="<?= site_url('MahasiswaController');?>" class="small-box-footer">Klik disini <i class="fas fa-arrow-circle-right"></i></a>
	</div>
</div>
<!-- ./col -->
<div class="col-lg-3 col-6">
	<!-- small box -->
	<div class="small-box bg-success">
		<div class="inner">
			<h3></h3>

			<p>Pembimbing</p>
		</div>
		<a href="<?= site_url('MahasiswaController/pembimbing');?>" class="small-box-footer">Klik disini <i class="fas fa-arrow-circle-right"></i></a>
	</div>
</div>
<!-- ./col -->
<div class="col-lg-3 col-6">
	<!-- small box -->
	<div class="small-box bg-warning">
		<div class="inner">
			<h3></h3>

			<p>Logbook</p>
		</div>
		<div class="icon">
		</div>
		<a href="<?= site_url('MahasiswaController/logbook');?>" class="small-box-footer">Klik disini <i class="fas fa-arrow-circle-right"></i></a>
	</div>
</div>
<!-- ./col -->
<div class="col-lg-3 col-6">
	<!-- small box -->
	<div class="small-box bg-danger">
		<div class="inner">
			<h3></h3>

			<p>Laporan</p>
		</div>
		<div class="icon">
		</div>
		<a href="<?= site_url('MahasiswaController/laporan');?>" class="small-box-footer">Klik disini <i class="fas fa-arrow-circle-right"></i></a>
	</div>
</div>
<!-- ./col -->
<?= $this->endSection();?>


