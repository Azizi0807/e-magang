<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Dashboard e-Magang | Informatika UPGRISBA</title>
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="<?= base_url() ?>/adminlte/plugins/fontawesome-free/css/all.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?= base_url() ?>/adminlte/dist/css/adminlte.min.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
  <!-- DataTables -->
  <link rel="stylesheet" href="<?= base_url() ?>/adminlte/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="<?= base_url() ?>/adminlte/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <link rel="stylesheet" href="<?= base_url() ?>/adminlte/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
</head>

<body>
  <div class="container mt-5 col-5">
    <p align="center" class="mb-1">Selamat datang di <b>e-magang</b></p>
    <p align="center">Program Studi Pendidikan Informatika</p>
    <div class="card">
      <h5 class="card-header text-center bg-success">Login e-Magang</h5>
      <div class="card-body">
        <?php if (session()->getFlashdata('msg')) {
              echo "<div class='alert alert-danger' role='alert'>";
              echo session()->getFlashdata('msg');
              echo "</div";
            } ?>
        <form action="<?= base_url('Login/loginUser') ?>" method="post">
          <div class="form-group mb-3">
            <label for="inputUsername">Username</label>
            <input type="text" name="username" id="username" class="form-control" autofocus placeholder="Masukkan Username...">

          </div>
          <div class="form-group mb-3">
            <label for="inputUPassword">Password</label>
            <input type="password" name="password" id="password" class="form-control" placeholder="Masukkan Password...">
          </div>
          <div class="form-group mb-1">
            <input type="submit" class="btn btn-primary" name="submit" value="Log In">
          </div>
          <div class="form-group mb-3">
            <input type="checkbox"> remember me
          </div>
        </form>
      </div>
    </div>
  </div>

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  <!-- Include all compiled plugins (below), or include individual files as needed -->
  <script src="<?= base_url() ?>/bootstrap/js/bootstrap.min.js"></script>
</body>

</html>