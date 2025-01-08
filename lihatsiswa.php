<?php

session_start();
if (!isset($_SESSION["login"])) {
  header("Location: login.php");
  exit;
}
include "koneksi.php";

$name = $_SESSION["NAME"];
$foto = $_SESSION["FOTO"];

$role = false;
if($name == "admin") {
  $role = true;
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <title>Lihat Siswa | UPT SDN 02 KP LALANG</title>
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
  <link href="css/sb-admin-2.min.css" rel="stylesheet">
  <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
</head>

<body id="page-top">
  <div id="wrapper">

    <ul class="navbar-nav bg-warning sidebar sidebar-dark accordion" id="accordionSidebar">

      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.php">
        <div class="sidebar-brand-icon">
          <img src="img/logo.png" width="35">
        </div>
        <div class="sidebar-brand-text mx-3">UPT SDN 02 KP LALANG</div>
      </a>

      <hr class="sidebar-divider my-0">

      <li class="nav-item">
        <a class="nav-link" href="dashboard.php">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span class="font-weight-bold">Menu Dashboard</span></a>
      </li>

      <hr class="sidebar-divider">

      <li class="nav-item">
        <a class="nav-link" href="absen.php">
          <i class="fas fa-check-circle"></i>
          <span class="font-weight-bold">Absensi</span></a>
      </li>

      <li class="nav-item">
        <a class="nav-link" href="lihatsiswa.php">
          <i class="fas fa-fw fa-user-check"></i>
          <span class="font-weight-bold">Data Siswa</span></a>
      </li>

      <?php if($role) { ?>
      <li class="nav-item">
        <a class="nav-link" href="lihatguru.php">
          <i class="fas fa-fw fa-user-check"></i>
          <span class="font-weight-bold">Data Guru</span></a>
      </li>
      <?php } ?>

      <li class="nav-item">
        <a class="nav-link" href="#" data-toggle="modal" data-target="#logoutModal">
          <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
          <span class="font-weight-bold">Logout</span>
        </a>
      </li>

      <hr class="sidebar-divider d-none d-md-block">

      <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
      </div>

    </ul>

    <div id="content-wrapper" class="d-flex flex-column">
      <div id="content">

        <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

          <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
            <i class="fa fa-bars"></i>
          </button>

          <ul class="navbar-nav ml-auto">
            <div class="topbar-divider d-none d-sm-block"></div>

            <li class="nav-item dropdown no-arrow">
              <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?= $name; ?></span>
                <img class="img-profile rounded-circle" src="uploads/<?= $foto; ?>">
              </a>
            </li>
          </ul>

        </nav>

        <div class="container-fluid">

          <h1 class="h3 mb-4 text-gray-800">Lihat Siswa</h1>
            
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Daftar Siswa</h6>
              <a href="tambahsiswa.php" class="btn btn-success btn-icon-split">
                            <span class="icon text-white-50">
                              <i class="fas fa-user"></i>
                            </span>
                            <span class="text">Tambah Baru</span>
                          </a>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr align="center">
                      <th>No</th>
                      <th>Nama</th>
                      <th>Jenis Kelamin</th>
                      <th>Kelas</th>
                      <?php if($role) { ?>
                        <th>Aksi</th>
                      <?php } ?>
                    </tr>
                  </thead>
                  <tbody align="center">
                    <?php
                    $sql = "SELECT * FROM siswa";
                    $query = mysqli_query($koneksi, $sql);
                    $i = 1;
                    while ($data = mysqli_fetch_array($query)) {
                      $nama = $data["NAMA"];
                      $jk = $data["JK"];
                      $kelas = $data["KELAS"];
                    ?>
                      <tr>
                        <td><?= $i++; ?></td>
                        <td><?= $nama; ?></td>
                        <td><?= $jk; ?></td>
                        <td><?= $kelas; ?></td>
                        <td>
                          <a href="deletesiswa.php?id=<?= $data["ID"]; ?>" class="btn btn-danger btn-icon-split">
                            <span class="icon text-white-50">
                              <i class="fas fa-user"></i>
                            </span>
                            <span class="text">Delete</span>
                          </a>
                          <a href="editsiswa.php?edittabel=<?= $data["ID"]; ?>" class="btn btn-warning btn-icon-split">
                            <span class="icon text-white-50">
                              <i class="fas fa-user"></i>
                            </span>
                            <span class="text">Edit</span>
                          </a>
                        </td>
                      </tr>
                    <?php } ?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>

      </div>

      <footer class="sticky-footer bg-white">
                    <div class="container my-auto">
                        <div class="copyright text-center my-auto">
                            <span>Tahun Ajar 2024/2025</span>
                        </div>
                    </div>
                </footer>

    </div>

  </div>

  <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Yakin ingin keluar?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">Pilih Logout untuk keluar.</div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
          <a class="btn btn-primary" href="logout.php">Logout</a>
        </div>
      </div>
    </div>
  </div>

  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
  <script src="vendor/datatables/jquery.dataTables.min.js"></script>
  <script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>
  <script src="js/demo/datatables-demo.js"></script>
  <script src="js/sb-admin-2.min.js"></script>
</body>
</html>