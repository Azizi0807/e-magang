<?= $this->extend('admin/layout/main') ?>

<?= $this->section('judul1') ?>
Kelola User
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
            <button class="btn btn-primary" data-toggle="modal" data-target="#modalTambah">
                <i class="nav-icon fas fa-plus"></i>
                Tambah Data
            </button>
        </div>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
        <div class="table-responsive">
            <table id="tabeluser" class="table table-bordered table-hovertable-borderless table-primary ">
                <thead class="table-light">
                    <tr>
                        <th>No</th>
                        <th>Nama Lengkap</th>
                        <th>Username</th>
                        <th>Password</th>
                        <th>Level</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <?php $no = 1;
                foreach($user->getResultArray() as $row) : ?>
                <tbody class="table-group-divider">
                    <tr class="table-primary">
                        <td><?= $no; ?></td>
                        <td><?= $row['namalengkap']; ?></td>
                        <td><?= $row['username'] ?></td>
                        <td><?= $row['password'] ?></td>
                        <td><?= $row['level'] ?></td>
                        <td>
                            <button class="btn btn-success"><i class="fas fa-edit"></i></button>
                            <button class="btn btn-danger"><i class="fas fa-trash"></i></button>
                        </td>
                    </tr>
                </tbody>
            <?php $no++; ?>
        <?php endforeach; ?>
            </table>
        </div>
    </div>
    <!-- /.card-body -->
</div>

<div class="modal fade" id="modalTambah" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">User Baru</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="<?= base_url('Admin/tambahUser') ?>">
            <div class="form-group">
                <label for="">Username</label>
                <input type="text" class="form-control" id="username" name="username">
            </div>
            <div class="form-group">
                <label for="">Password</label>
                <input type="password" class="form-control" id="password" name="password">
            </div>
            <div class="form-group">
                <label for="">Level</label>
                <input type="text" class="form-control" id="level" name="level">
            </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">
            <i class="fas fa-close"></i>
            Batal
        </button>
        <button type="submit" class="btn btn-primary">
            <i class="fas fa-save"></i>
            Simpan
        </button>
      </div>
    </div>
  </div>
</div>

<?= $this->endSection() ?>