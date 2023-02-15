<?= $this->extend('admin/layout/main') ?>

<?= $this->section('judul1') ?>
Master Data
<?= $this->endSection() ?>

<?= $this->section('judul2') ?>
Master Data
<?= $this->endSection() ?>

<?= $this->section('subjudul') ?>
Kelola User
<?= $this->endSection() ?>

<?= $this->section('konten') ?>

<div class="card">
    <div class="card-header">

        <div class="card-tools">
            <button class="btn btn-primary">
                <i class="nav-icon fas fa-plus"></i>
                Tambah Data
            </button>
        </div>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
        <div class="table-responsive">
            <table id="tabelkategori" class="table table-bordered table-hovertable-borderless table-primary ">
                <thead class="table-light">
                    <tr>
                        <th>No</th>
                        <th>NIDN</th>
                        <th>Nama Dosen</th>
                        <th>Mata Kuliah</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody class="table-group-divider">
                    <tr class="table-primary">
                        <td>1</td>
                        <td>123982149</td>
                        <td>Azizi Azwir Aknul</td>
                        <td>Pemrograman Web Dasar</td>
                        <td>
                            <button class="btn btn-success"><i class="fas fa-edit"></i></button>
                            <button class="btn btn-danger"><i class="fas fa-trash"></i></button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>

    </div>
    <!-- /.card-body -->
</div>

<?= $this->endSection() ?>

