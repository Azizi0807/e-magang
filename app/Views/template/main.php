<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title><?= $this->renderSection('title');?></title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="/AdminLTE/plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bootstrap 4 -->
  <link rel="stylesheet" href="/AdminLTE/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="/AdminLTE/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- JQVMap -->
  <link rel="stylesheet" href="/AdminLTE/plugins/jqvmap/jqvmap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="/AdminLTE/dist/css//AdminLTE.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="/AdminLTE/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="/AdminLTE/plugins/daterangepicker/daterangepicker.css">
  <!-- summernote -->
  <link rel="stylesheet" href="/AdminLTE/plugins/summernote/summernote-bs4.min.css">
</head>
<body class="hold-transition sidebar-mini layout-fixed">
  <div class="wrapper">

    <!-- Preloader -->
    <!-- <div class="preloader flex-column justify-content-center align-items-center">
      <img class="animation__shake" src="/AdminLTE/dist/img//AdminLTELogo.png" alt="/AdminLTELogo" height="60" width="60">
    </div> -->

    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand navbar-white navbar-light">
      <!-- Left navbar links -->
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
          <a href="#" class="nav-link">Home</a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
          <a href="#" class="nav-link">Contact</a>
        </li>
      </ul>

      <!-- Right navbar links -->
      <ul class="navbar-nav ml-auto">
        <li class="nav-item">
          <a class="nav-link" href="<?= base_url('AuthLogin/logout')?>" onclick="return confirm('Anda ingin keluar <?= session()->username ?> ?')">
            <i class="fas fa-arrow-right"></i> Logout
          </a>
        </li>
      </ul>
    </nav>
    <!-- /.navbar -->

    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
      <!-- Brand Logo -->
      <!-- <a href="index3.html" class="brand-link">
        <img src="/AdminLTE/dist/img//AdminLTELogo.png" alt="/AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">/AdminLTE 3</span>
      </a> -->

      <!-- Sidebar -->
      <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
          <div class="image">
            <img src="/AdminLTE/dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
          </div>
          <div class="info">
            <a href="#" class="d-block"><?= $this->renderSection('usernamelogin');?></a>
          </div>
        </div>
        <!-- SidebarSearch Form -->
        <!-- Sidebar Menu -->
        <nav class="mt-2">
          <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
           with font-awesome or any other icon font library -->
           <?php if (session()->role == 'admin') { ?>
            <li class="nav-item">
              <a href="<?= base_url('Home');?>" class="nav-link">
                <i class="nav-icon fas fa-tachometer-alt"></i>
                <p>
                  Dashboard
                </p>
              </a>
            </li>
            <li class="nav-item">
              <a href="<?= base_url('AdminController/getIndustri');?>" class="nav-link">
                <i class="nav-icon fas fa-users"></i>
                <p>
                  Industri
                </p>
              </a>
            </li>
            <li class="nav-item">
              <a href="<?= base_url('AdminController');?>" class="nav-link">
                <i class="nav-icon fas fa-house-user"></i>
                <p>
                  Magang
                </p>
              </a>
            </li>
            <li class="nav-item">
              <a href="<?= base_url('AdminController/pembimbing');?>" class="nav-link">
                <i class="nav-icon fas fa-address-book"></i>
                <p>
                  Pembimbing
                </p>
              </a>
            </li>
            <li class="nav-item">
              <a href="<?= base_url('AdminController/periode');?>" class="nav-link">
                <i class="nav-icon fas fa-address-book"></i>
                <p>
                  Periode Magang
                </p>
              </a>
            </li>
          <?php } ?>

          <?php if (session()->role == 'mahasiswa') { ?>
            <li class="nav-item">
              <a href="<?= base_url('Home/mahasiswa');?>" class="nav-link">
                <i class="nav-icon fas fa-tachometer-alt"></i>
                <p>
                  Dashboard
                </p>
              </a>
            </li>
            <li class="nav-item">
              <a href="<?= base_url('MahasiswaController');?>" class="nav-link">
                <i class="nav-icon fas fa-user-plus"></i>
                <p>
                  Pendaftaran
                </p>
              </a>
            </li>
            <li class="nav-item">
              <a href="<?= base_url('MahasiswaController/pembimbing');?>" class="nav-link">
                <i class="nav-icon fas fa-address-book"></i>
                <p>
                  Pembimbing
                </p>
              </a>
            </li>
            <li class="nav-item">
              <a href="<?= base_url('MahasiswaController/logbook');?>" class="nav-link">
                <i class="nav-icon fas fa-book"></i>
                <p>
                  Logbook
                </p>
              </a>
            </li>
            <li class="nav-item">
              <a href="<?= base_url('MahasiswaController/laporan');?>" class="nav-link">
                <i class="nav-icon fas fa-file"></i>
                <p>
                  Laporan
                </p>
              </a>
            </li>
            <li class="nav-item">
              <a href="<?= base_url('MahasiswaController/penilaian');?>" class="nav-link">
                <i class="nav-icon fas fa-list-ol"></i>
                <p>
                  Nilai Magang
                </p>
              </a>
            </li>
          <?php } ?>

          <?php if (session()->role == 'pembimbing') { ?>
            <li class="nav-item">
              <a href="<?= base_url('Home/pembimbing');?>" class="nav-link">
                <i class="nav-icon fas fa-tachometer-alt"></i>
                <p>
                  Dashboard
                </p>
              </a>
            </li>
            <li class="nav-item">
              <a href="#" class="nav-link">
                <i class="nav-icon fas fa-check"></i>
                <p>
                  Validasi
                  <i class="right fas fa-angle-left"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="<?= base_url('PembimbingController');?>" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Logbook</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="<?= base_url('PembimbingController/laporan');?>" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Laporan</p>
                  </a>
                </li>
              </ul>
            </li>
            <li class="nav-item">
              <a href="<?= base_url('PembimbingController/penilaian');?>" class="nav-link">
                <i class="nav-icon fas fa-list-ol"></i>
                <p>
                  Penilaian
                </p>
              </a>
            </li>
          <?php } ?>

          <?php if (session()->role == 'pamong') { ?>
            <li class="nav-item">
              <a href="<?= base_url('Home/pamong');?>" class="nav-link">
                <i class="nav-icon fas fa-tachometer-alt"></i>
                <p>
                  Dashboard
                </p>
              </a>
            </li>
            <li class="nav-item">
              <a href="<?= base_url('PamongController/dataProfil');?>" class="nav-link">
                <i class="nav-icon fas fa-user"></i>
                <p>
                  Profil
                </p>
              </a>
            </li>
            <li class="nav-item">
              <a href="<?= base_url('PamongController');?>" class="nav-link">
                <i class="nav-icon fas fa-check"></i>
                <p>
                  Validasi logbook
                </p>
              </a>
            </li>
            <li class="nav-item">
              <a href="<?= base_url('PamongController/penilaian');?>" class="nav-link">
                <i class="nav-icon fas fa-list-ol"></i>
                <p>
                  Penilaian
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
            <h1 class="m-0"><?= $this->renderSection('judul');?></h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><?= $this->renderSection('subjudul')?></li>
              <li class="breadcrumb-item"><?= $this->renderSection('subsubjudul');?></li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
          <?= $this->renderSection('content');?>
        </div>
        <!-- /.row -->
        <!-- Main row -->
      </div>
      <!-- /.row (main row) -->
    </div><!-- /.container-fluid -->
  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->
<footer class="main-footer">
  <strong>Copyright &copy; E-Magang Informatika.</strong>
  All rights reserved.
  <div class="float-right d-none d-sm-inline-block">
    <b>UPGRISBA</b> 
  </div>
</footer>

<!-- Control Sidebar -->
<aside class="control-sidebar control-sidebar-dark">
  <!-- Control sidebar content goes here -->
</aside>
<!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script>
  $(document).ready(function() {
    $('.btn-validasi').click(function(e) {
      e.preventDefault();

      var magangID = $(this).data('magang-id');
      var button = $(this);

    // Kirim permintaan AJAX ke Controller
      $.ajax({
        url: '<?= base_url('MagangController/validasiAdmin/'); ?>' + magangID,
        type: 'POST',
        dataType: 'json',
        success: function(response) {
          if (response.success) {
          // Ubah kelas ikon menjadi 'fas fa-times'
            button.find('i').removeClass('fas fa-paper-plane').addClass('fas fa-times');
          }
        },
        error: function(xhr, status, error) {
          console.log(error);
        }
      });
    });
  });
</script>


<script>
  $(function () {
    // $("#datamagang").DataTable({
    //   "responsive": true, "lengthChange": false, "autoWidth": false,
    //   "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
    // }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    $('#datamagang').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
  });
</script>
<script src="/AdminLTE/plugins/jquery/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="//AdminLTE/plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="/AdminLTE/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- ChartJS -->
<script src="/AdminLTE/plugins/chart.js/Chart.min.js"></script>
<!-- Sparkline -->
<script src="/AdminLTE/plugins/sparklines/sparkline.js"></script>
<!-- JQVMap -->
<script src="/AdminLTE/plugins/jqvmap/jquery.vmap.min.js"></script>
<script src="/AdminLTE/plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
<!-- jQuery Knob Chart -->
<script src="/AdminLTE/plugins/jquery-knob/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="/AdminLTE/plugins/moment/moment.min.js"></script>
<script src="/AdminLTE/plugins/daterangepicker/daterangepicker.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="/AdminLTE/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Summernote -->
<script src="/AdminLTE/plugins/summernote/summernote-bs4.min.js"></script>
<!-- overlayScrollbars -->
<script src="/AdminLTE/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- /AdminLTE App -->
<script src="/AdminLTE/dist/js//AdminLTE.js"></script>
<!-- /AdminLTE for demo purposes -->
<!-- <script src="/AdminLTE/dist/js/demo.js"></script> -->
<!-- /AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="/AdminLTE/dist/js/pages/dashboard.js"></script>
</body>
</html>
