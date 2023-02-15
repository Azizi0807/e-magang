<?= $this->extend('admin/layout/main') ?>

<?= $this->section('judul1') ?>
Dashboard
<?= $this->endSection() ?>

<?= $this->section('judul2') ?>
Dashboard
<?= $this->endSection() ?>

<?= $this->section('subjudul') ?>
Home
<?= $this->endSection() ?>

<?= $this->section('konten') ?>
<h2>Welcome <?= session()->level; ?>
	
</h2>

<?= $this->endSection() ?>