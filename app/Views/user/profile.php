<?= $this->extend('admin/layout/main') ?>

<?= $this->section('judul1') ?>
Your Profile
<?= $this->endSection() ?>

<?= $this->section('judul2') ?>
User
<?= $this->endSection() ?>

<?= $this->section('subjudul') ?>
Profile
<?= $this->endSection() ?>

<?= $this->section('konten') ?>

<div class="card">
	<?= "Profil " session()->namalengkap ?>
</div>

<?= $this->endSection() ?>