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

			<p>Validasi</p>
		</div>
		<div class="icon">
		</div>
		<a href="<?= site_url('PembimbingController');?>" class="small-box-footer">Klik disini <i class="fas fa-arrow-circle-right"></i></a>
	</div>
</div>
<!-- ./col -->
<div class="col-lg-3 col-6">
	<!-- small box -->
	<div class="small-box bg-warning">
		<div class="inner">
			<h3></h3>

			<p>Penilaian</p>
		</div>
		<div class="icon">
		</div>
		<a href="<?= base_url('PembimbingController/penilaian');?>" class="small-box-footer">Klik disini <i class="fas fa-arrow-circle-right"></i></a>
	</div>
</div>
<!-- ./col -->
<!-- ./col -->
<?= $this->endSection();?>


