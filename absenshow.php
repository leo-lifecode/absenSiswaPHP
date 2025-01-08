<?php

session_start();
if (!isset($_SESSION["login"])) {
    header("Location: login.php");
    exit;
}
include "koneksi.php";
$NIDN = $_SESSION['NIDN'];
$NAME = $_SESSION["NAME"];
$FOTO = $_SESSION["FOTO"];

function getCurrentDateTime()
{
    date_default_timezone_set('Asia/Jakarta');
    return date('l, d-m-Y h:i:s a');
}

$idtabel = $_GET['idtabel'];
$parts = explode('_', $idtabel);

$prefix = $parts[0];     // 'absensi'
$kelas = $parts[1];      // '3c'
$tahun = $parts[2];      // '2024'
$bulan = $parts[3];      // '12'
$tanggal = $parts[4];    // '22'

$date = "{$tahun}_{$bulan}_{$tanggal}";

$nama_tabel = $_GET['idtabel'];

if (isset($_POST['simpan'])) {
    $guru = $_POST['guru'];
    $siswa = $_POST['siswa'];
    $status = $_POST['keterangan'];
    $tanggal = getCurrentDateTime();

    $query_insert = "INSERT INTO $nama_tabel (GURU, SISWA, TANGGAL, STATUS) VALUES (?, ?, ?, ?)";
    $stmt_insert = mysqli_prepare($koneksi, $query_insert);
    mysqli_stmt_bind_param($stmt_insert, "ssss", $guru, $siswa, $tanggal, $status);

    if (mysqli_stmt_execute($stmt_insert)) {
        echo "<script>alert('Data berhasil disimpan!');</script>";
        echo "<script>window.location.href='absenshow.php?idtabel=$nama_tabel';</script>";
    } else {
        echo "<script>alert('Gagal menyimpan data: " . mysqli_error($koneksi) . "');</script>";
    }
}

if (isset($_GET['edittabel'])) {
    $edit_id = $_GET['edittabel'];
    $query_edit = "SELECT * FROM $nama_tabel WHERE ID_ABSEN = ?";
    $stmt_edit = mysqli_prepare($koneksi, $query_edit);
    mysqli_stmt_bind_param($stmt_edit, "i", $edit_id);
    mysqli_stmt_execute($stmt_edit);
    $result_edit = mysqli_stmt_get_result($stmt_edit);
    $edit_data = mysqli_fetch_assoc($result_edit);

    $guru = $edit_data['GURU'];
    $siswa = $edit_data['SISWA'];
    $tanggal = $edit_data['TANGGAL'];
    $status = $edit_data['STATUS'];
}

if (isset($_POST['update'])) {
    $guru = $_POST['guru'];
    $siswa = $_POST['siswa'];
    $status = $_POST['keterangan'];
    $tanggal = $_POST['tanggal'];
    $edit_id = $_POST['edit_id'];

    $query_update = "UPDATE $nama_tabel 
                     SET GURU = '$guru', SISWA = '$siswa', TANGGAL = '$tanggal', STATUS = '$status' 
                     WHERE ID_ABSEN = '$edit_id'";

    if (mysqli_query($koneksi, $query_update)) {
        echo "<script>alert('Data berhasil diperbarui!');</script>";
        echo "<script>window.location.href='absenshow.php?idtabel=$nama_tabel';</script>";
    } else {
        echo "<script>alert('Gagal memperbarui data: " . mysqli_error($koneksi) . "');</script>";
    }
}

$role = false;
if ($NAME == "admin") {
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
    <title>Absensi | UPT SDN 02 KP LALANG</title>
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
                            <?php if (isset($_GET['edittabel'])) { ?>
                                <form action="" method="post">
                                    <div class="form-group">
                                        <table class="table table-borderless">
                                            <tbody>
                                                <input type="hidden" name="edit_id" value="<?= $edit_id; ?>">
                                                <tr>
                                                    <td>Nama Guru</td>
                                                    <td><input type="text" class="form-control" name="guru" autocomplete="off" readonly value="<?= $NAME; ?>"></td>
                                                </tr>

                                                <tr>
                                                    <td>Kelas</td>
                                                    <td><input type="text" class="form-control" name="kelas" autocomplete="off" readonly value="<?= $kelas; ?>"></td>
                                                </tr>

                                                <tr>
                                                    <td>Nama Siswa</td>
                                                    <td>
                                                        <input class="form-control" name="siswa" value="<?= $siswa; ?>" required readonly>
                                                    </td>
                                                </tr>

                                                <tr>
                                                    <td>Tanggal</td>
                                                    <td><input type="text" class="form-control" value="<?= getCurrentDateTime(); ?>" name="tanggal" readonly></td>
                                                </tr>

                                                <tr>
                                                    <td>Keterangan</td>
                                                    <td>
                                                        <select class="form-control" name="keterangan">
                                                            <option value="Hadir" <?= $status == 'Hadir' ? 'selected' : ''; ?>>Hadir</option>
                                                            <option value="Izin" <?= $status == 'Izin' ? 'selected' : ''; ?>>Izin</option>
                                                            <option value="Sakit" <?= $status == 'Sakit' ? 'selected' : ''; ?>>Sakit</option>
                                                            <option value="Alpa" <?= $status == 'Alpa' ? 'selected' : ''; ?>>Alpa</option>
                                                        </select>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td><button type="submit" name="update" class="btn btn-primary">Perbarui Absen</button></td>
                                                    <td><a href="absenshow.php?idtabel=<?= $idtabel; ?>" class="btn btn-warning">
                                                            Cancel
                                                        </a>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </form>
                            <?php } ?>
                            <?php if (!isset($_GET['edittabel'])) { ?>
                                <form action="" method="post">
                                    <div class="form-group">
                                        <table class="table table-borderless ">
                                            <tbody>
                                                <tr>
                                                    <td>Nama Guru</td>
                                                    <td><input type="text" class="form-control" name="guru" autocomplete="off" readonly="" value="<?= $NAME; ?>"></td>
                                                </tr>

                                                <tr>
                                                    <td>Kelas</td>
                                                    <td><input type="text" class="form-control" name="kelas" autocomplete="off" readonly="" value="<?= $kelas; ?>"></td>
                                                </tr>

                                                <tr>
                                                    <td>Nama Siswa</td>
                                                    <td>
                                                        <select class="form-control" name="siswa" required>
                                                        <option value="">-- Pilih Siswa --</option>
                                                        <?php
                                                        if (isset($kelas)) {
                                                            $stmt = $koneksi->prepare("SELECT * FROM siswa WHERE KELAS = ? ORDER BY NAMA ASC");
                                                            $stmt->bind_param("s", $kelas);
                                                            $stmt->execute();
                                                            $result = $stmt->get_result();

                                                            if ($result->num_rows > 0) {
                                                                while ($row = $result->fetch_assoc()) {
                                                                    echo "<option value='" . $row['NAMA'] . "'>" . $row['NAMA'] . "</option>";
                                                                }
                                                            }
                                                        }
                                                        ?>
                                                        </select>
                                                    </td>
                                                </tr>

                                                <tr>
                                                    <td>Tanggal</td>
                                                    <td><input type="text" class="form-control" value="<?= getCurrentDateTime(); ?>" name="tanggal" readonly=""></td>
                                                </tr>

                                                <tr>
                                                    <td>Keterangan</td>
                                                    <td>
                                                        <select class="form-control" name="keterangan">
                                                            <option value="Hadir">Hadir</option>
                                                            <option value="Izin">Izin</option>
                                                            <option value="Sakit">Sakit</option>
                                                            <option value="Alpa">Alpa</option>
                                                        </select>
                                                    </td>
                                                </tr>
                

                                                <tr>
                                                    <td><button type="submit" name="simpan" class="btn btn-primary">Absen</button></td>
                                                </tr>

                                            </tbody>
                                        </table>
                                    </div>
                                </form>
                            <?php } ?>
                        </div>
                    </div>

                    <div class="card shadow mb-4 mt-3">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Daftar Absensi</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr align="center">
                                            <th>No</th>
                                            <th>Nama Guru</th>
                                            <th>Nama Siswa</th>
                                            <th>Tanggal</th>
                                            <th>Keterangan</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody align="center">
                                        <?php
                                        $sql = "SELECT * FROM $nama_tabel";
                                        $query = mysqli_query($koneksi, $sql);
                                        $i = 1;
                                        while ($data = mysqli_fetch_array($query)) {
                                            $siswa = $data["SISWA"];
                                            $guru = $data["GURU"];
                                            $status = $data["STATUS"];
                                            $tanggal = $data["TANGGAL"];
                                        ?>
                                            <tr>
                                                <td><?= $i++; ?></td>
                                                <td><?= $guru; ?></td>
                                                <td><?= $siswa; ?></td>
                                                <td><?= $tanggal; ?></td>
                                                <td><?= $status; ?></td>

                                                <td>
                                                    <a href="deleteAbsen.php?delete=<?= $data['ID_ABSEN']; ?>&table=<?= $nama_tabel; ?>" class="btn btn-danger btn-icon-split">
                                                        <span class="icon text-white-50">
                                                            <i class="fas fa-trash"></i>
                                                        </span>
                                                        <span class="text">Delete</span>
                                                    </a>
                                                    <a href="absenshow.php?idtabel=<?= $nama_tabel; ?>&edittabel=<?= $data['ID_ABSEN']; ?>" class="btn btn-warning btn-icon-split">
                                                        <span class="icon text-white-50">
                                                            <i class="fas fa-edit"></i>
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