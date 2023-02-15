<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Dashboard e-Magang | Informatika UPGRISBA</title>
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome Icons -->
  <!-- <link rel="stylesheet" href="<?= base_url() ?>/adminlte/plugins/fontawesome-free/css/all.min.css"> -->
  <!-- Theme style -->
  <link rel="stylesheet" href="<?= base_url() ?>/adminlte/dist/css/adminlte.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
  <!-- DataTables -->
  <link rel="stylesheet" href="<?= base_url() ?>/bootstrap/fontawesome/css/all.min.css">
  <link rel="stylesheet" href="<?= base_url() ?>/adminlte/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="<?= base_url() ?>/adminlte/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <link rel="stylesheet" href="<?= base_url() ?>/adminlte/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
  <link rel="stylesheet" href="<?= base_url() ?>/vendor/dropify/dropify.css">
</head>

<body class="hold-transition sidebar-mini">
  <div class="wrapper">

    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand navbar-white navbar-light">
      <!-- Left navbar links -->
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
        

      </ul>

      <!-- Right navbar links -->
      <ul class="navbar-nav ml-auto">
        <!-- Navbar Search -->
        <li class="nav-item">
          <a class="nav-link" href="<?= base_url('Login/logOut')?>" onclick="return confirm('Anda ingin keluar <?php echo session()->username ?> ?')">
            <i class="fas fa-sign-out-alt"></i>
            Logout
          </a>
        </li>
      </ul>
    </nav>
    <!-- /.navbar -->

    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
      <!-- Brand Logo -->
      <li class="brand-link">
        <center>
          <i class="nav-icon fas fa-user"></i><br>
          <span class="brand-text font-weight-light"><b><?= session()->namalengkap; ?></b><br>
            <?= session()->level ?></span>
        </center>
      </li>

      <!-- Sidebar -->
      <div class="sidebar">

        <nav class="mt-2">
          <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
         
            <li class="nav-item">
              <a href="<?= base_url('Admin') ?>" class="nav-link">
                <i class="nav-icon fas fa-home"></i>
                <p>
                  Dashboard
                </p>
              </a>
            </li>

            <li class="nav-item">
              <a href="<?= base_url('User/profile/' . session()->username) ?>" class="nav-link">
                <i class="nav-icon fas fa-user"></i>
                <p>
                  Profile
                </p>
              </a>
            </li>

            <?php if(session()->level == 'Administrator'){?>
            <li class="nav-item">
              <a href="<?= base_url('Admin/user') ?>" class="nav-link">
                <i class="nav-icon fas fa-users"></i>
                <p>
                  Kelola User
                </p>
              </a>
            </li>

            <li class="nav-item">
              <a href="<?= base_url('Admin/magang') ?>" class="nav-link">
                <i class="nav-icon fas fa-landmark"></i>
                <p>
                  Penempatan Magang
                </p>
              </a>
            </li>
            

            <li class="nav-item">
              <a href="<?= base_url('Admin/jadwal') ?>" class="nav-link">
                <i class="nav-icon fas fa-list"></i>
                <p>
                  Jadwal Sidang
                </p>
              </a>
            </li>
            <?php } ?>  

            <?php if(session()->level == 'Pembimbing'){ 

            ?>
            <li class="nav-item">
              <a href="<?= base_url('Admin/nilai') ?>" class="nav-link">
                <i class="nav-icon fas fa-pen-to-square"></i>
                <p>
                  Nilai Magang
                </p>
              </a>
            </li>
            <?php } ?>

            <?php if($user = session()->level == 'Mahasiswa'){
            ?>
            <li class="nav-item">
              <a href="<?= base_url('User') ?>" class="nav-link">
                <i class="nav-icon fas fa-book"></i>
                <p>
                  Logbook
                </p>
              </a>
            </li>
            <?php } ?>
            

          </ul>
        </nav>
        <!-- /.sidebar-menu -->
      </div>
      <!-- /.sidebar -->
    </aside>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <div class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1 class="m-0"><?= $this->renderSection('judul1') ?></h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#"><?= $this->renderSection('judul2') ?></a></li>
                <li class="breadcrumb-item"><?= $this->renderSection('subjudul') ?></li>
              </ol>
            </div><!-- /.col -->
          </div><!-- /.row -->
        </div><!-- /.container-fluid -->
      </div>
      <!-- /.content-header -->

      <!-- Main content -->
      <div class="content">
        <div class="container-fluid">
          <div class="row">
            <section class="col-sm">
              <!-- Custom tabs (Charts with tabs)-->
              <?= $this->renderSection('konten') ?>
              <!-- /.card -->
            </section>
          </div>
          <!-- /.row -->
        </div><!-- /.container-fluid -->
      </div>
      <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
      <!-- Control sidebar content goes here -->
      <div class="p-3">
        <h5>Title</h5>
        <p>Sidebar content</p>
      </div>
    </aside>
    <!-- /.control-sidebar -->

    <!-- Main Footer -->
    <footer class="main-footer">
      <!-- Default to the left -->
      <strong>Copyright &copy; 2023 <a href="https://adminlte.io">e-Magang Informatika UPGRISBA</a>.</strong>
    </footer>
  </div>
  <!-- ./wrapper -->

  <!-- REQUIRED SCRIPTS -->

  <!-- jQuery -->
  <script src="<?= base_url() ?>/adminlte/plugins/jquery/jquery.min.js"></script>
  <script src="<?= base_url() ?>/adminlte/plugins/datatables/jquery.dataTables.min.js"></script>
  <script src="<?= base_url() ?>/adminlte/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
  <script src="<?= base_url() ?>/adminlte/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
  <script src="<?= base_url() ?>/adminlte/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
  <script src="<?= base_url() ?>/adminlte/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
  <script src="<?= base_url() ?>/adminlte/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
  <script src="<?= base_url() ?>/adminlte/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
  <script src="<?= base_url() ?>/adminlte/plugins/datatables-buttons/js/buttons.print.min.js"></script>
  <script src="<?= base_url() ?>/adminlte/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
  <!-- Bootstrap 4 -->
  <script src="<?= base_url() ?>/adminlte/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>
  <!-- AdminLTE App -->
  <script src="<?= base_url() ?>/adminlte/dist/js/adminlte.js"></script>
  <script src="<?= base_url() ?>/bootstrap/js/script.js"></script>
  <script src="<?= base_url() ?>/vendor/dropify/dropify.js"></script>

  <script>
    $(function() {
      $("#tabelkategori").DataTable({
        "responsive": true,
        "lengthChange": false,
        "autoWidth": false,
        "buttons": ["pdf", "print"]
      }).buttons().container().appendTo('#tabelkategori_wrapper .col-md-6:eq(0)');
    });
    $(function() {
      $("#tabeluser").DataTable({
        "responsive": true,
        "lengthChange": false,
        "autoWidth": false,
        "buttons": ["pdf", "print"]
      }).buttons().container().appendTo('#tabeluser_wrapper .col-md-6:eq(0)');
    });
  </script>
</body>

</html>