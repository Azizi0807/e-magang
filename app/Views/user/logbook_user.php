<?= $this->extend('admin/layout/main') ?>

<?= $this->section('judul1') ?>
Logbook
<?= $this->endSection() ?>

<?= $this->section('judul2') ?>
Master Data
<?= $this->endSection() ?>

<?= $this->section('subjudul') ?>

<?php echo $judul; ?>

<?= $this->endSection() ?>

<?= $this->section('konten') ?>

<div class="card">
    <div class="card-header">

        <div class="card-tools">
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#tambahlogbook">
                Tambah Logbook
            </button>
        </div>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
        <div class="table-responsive">
            <table id="tabeluser" class="table table-bordered table-hovertable-borderless">
                <thead class="table-light">

                    <tr>
                        <th>No</th>
                        <th>Tanggal</th>
                        <th>Uraian Kegiatan</th>
                        <th>Hasil</th>
                        <th>Dokumentasi</th>
                        <th>Status</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <?php 
                    $no = 1;
                    foreach($bio->getResultArray() as $row) : 
                 ?>
                <tbody class="table-group-divider">
                    <tr class="table-primary">
                        <td><?= $no; ?></td>
                        <td><?= $row['tanggal']; ?></td>
                        <td><?= $row['kegiatan']; ?></td>
                        <td><?= $row['hasil']; ?></td>
                        <td><img src="#" alt=""></td>
                        <td>Valid</td>
                        <td>
                            <button type="button" data-target="modalUbah" data-toggle="modal" class="btn btn-success">
                                <i class="fas fa-pencil"></i>
                                <a href="<?= base_url('Admin/editLogbook') . $row['id'] ?>"></a>
                            </button>
                            <button class="btn btn-danger"><i class="fas fa-trash"></i></button>
                        </td>
                    </tr>
                    <?php $no++; ?>
                <?php endforeach; ?>
                </tbody>
            </table>
        </div>

    </div>

    <!-- Modal -->
    <div class="modal fade" id="tambahlogbook" tabindex="-1" role="dialog">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title" id="exampleModalLabel">Logbook Baru</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <form action="<?= base_url('User/tambah'); ?>" method="post" enctype="multipart/form-data">
                <div class="row mb-2">
                    <label for="">Tanggal</label>
                    <input class="form-control" type="date" id="tanggal" name="tanggal">
                </div>
                <div class="row mb-2">
                    <label for="">Uraian Kegiatan</label>
                    <textarea class="form-control" type="text" id="kegiatan" name="kegiatan"></textarea>
                </div>
                <div class="row mb-2">
                    <label for="">Hasil</label>
                    <input class="form-control" type="text" id="hasil" name="hasil">
                </div>
                <div class="row mb-2">
                    <label for="">Dokumentasi</label>
                    <input type="file" class="dropify" name="dokumentasi" data-height="100">
                </div>
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
        </form>
      </div>
    </div>
    <!-- /.card-body -->
</div>

<?= $this->endSection() ?>