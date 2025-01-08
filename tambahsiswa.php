<?php
session_start();
if (!isset($_SESSION["login"])) {
    header("Location: login.php");
    exit;
}
include "koneksi.php";

$NAME = $_SESSION["NAME"];
$FOTO = $_SESSION["FOTO"];

$role = false;
if ($NAME == "admin") {
    $role = true;
}

if (isset($_POST['simpan'])) {
    $siswa = $_POST['name'];
    $jk = $_POST['jk'];
    $kelas = $_POST['kelas'];

    $sql_check_siswa = "SELECT * FROM siswa WHERE NAMA = ? AND KELAS = ?";
    $stmt_check = mysqli_prepare($koneksi, $sql_check_siswa);
    mysqli_stmt_bind_param($stmt_check, "ss", $siswa, $kelas);
    mysqli_stmt_execute($stmt_check);
    $resolve = mysqli_stmt_get_result($stmt_check);

    if (mysqli_num_rows($resolve) == 0) {
        $sql_insert_siswa = "INSERT INTO siswa (NAMA, JK, KELAS) VALUES (?, ?, ?)";
        $stmt_insert_siswa = mysqli_prepare($koneksi, $sql_insert_siswa);
        mysqli_stmt_bind_param($stmt_insert_siswa, "sss", $siswa, $jk, $kelas);
        mysqli_stmt_execute($stmt_insert_siswa);
        echo "<script>
                alert('Data siswa berhasil disimpan!');
                window.location.href = 'lihatsiswa.php';
              </script>";
    } else {
        echo "<script>
                alert('Data siswa sudah ada di kelas tersebut!');
              </script>";
    }
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
    <title>Tambah Siswa | UPT SDN 02 KP LALANG</title>
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    <link href="css/sb-admin-2.min.css" rel="stylesheet">
    <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
</head>

<body id="page-top">
    <div id="wrapper">
        <ul class="navbar-nav bg-warning sidebar sidebar-dark accordion" id="accordionSidebar">
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="dashboard.php">
                <div class="sidebar-brand-icon">
                    <img src="img/logo.png" width="35">
                </div>
                <div class="sidebar-brand-text mx-3">UPT SDN 02 KP LALANG</div>
            </a>
            <hr class="sidebar-divider my-0">
            <li class="nav-item">
                <a class="nav-link" href="index.php">
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

            <?php if ($role) { ?>
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

                <!-- top nav -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>

                    <ul class="navbar-nav ml-auto">
                        <div class="topbar-divider d-none d-sm-block"></div>
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 text-gray-600"><?= $NAME; ?></span>
                                <img class="img-profile rounded-circle" src="uploads/<?= $FOTO; ?>">
                            </a>
                        </li>
                    </ul>

                </nav>
                <!-- end of top nav -->

                <!-- isi -->
                <div class="container-fluid">
                    <div class="row">
                        <div class="table-responsive table--no-card m-b-30">
                            <form action="" method="post">
                                <div class="form-group">
                                    <table class="table table-borderless">
                                        <tbody>
                                            <tr>
                                                <td>Nama Murid</td>
                                                <td><input type="text" class="form-control" name="name" autocomplete="off"></td>
                                            </tr>
                                            <tr>
                                                <td>Jenis Kelamin</td>
                                                <td>
                                                    <select class="form-control" name="jk">
                                                        <option value="Perempuan">Perempuan</option>
                                                        <option value="Laki-laki">Laki-laki</option>
                                                    </select>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Kelas</td>
                                                <td>
                                                    <select class="form-control" name="kelas">
                                                        <option value="1a">1a</option>
                                                        <option value="2b">2b</option>
                                                        <option value="3a">3a</option>
                                                        <option value="4b">4b</option>
                                                        <option value="5a">5a</option>
                                                        <option value="6b">6b</option>
                                                    </select>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td><button type="submit" name="simpan" class="btn btn-primary">Tambah Murid</button></td>
                                                <td>
                                                    <a href="lihatsiswa.php" class="btn btn-warning">
                                                        Cancel
                                                    </a>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

                <!-- akhir isi -->

                <!-- footer -->
                <footer class="sticky-footer bg-white">
                    <div class="container my-auto">
                        <div class="copyright text-center my-auto">
                            <span>Tahun Ajar 2024/2025</span>
                        </div>
                    </div>
                </footer>

            </div>
        </div>

        <!-- Logout Modal-->
        <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Yakin ingin keluar?</h5>
                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="modal-body">Pilih Logout untuk keluar</div>
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