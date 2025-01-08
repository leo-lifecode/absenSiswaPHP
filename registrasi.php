<?php
require 'koneksi.php';

function registrasi($data)
{
    global $koneksi;

    $nidn = htmlspecialchars($data["nidn"]);
    $nama = htmlspecialchars($data["nama"]);
    $jk = htmlspecialchars($data["jk"]);
    $tgl_lahir = htmlspecialchars($data["tgl_lahir"]);
    $email = strtolower($data["email"]);
    $password = mysqli_real_escape_string($koneksi, $data["password"]);
    $password2 = mysqli_real_escape_string($koneksi, $data["password2"]);
    $no_hp = htmlspecialchars($data["no_hp"]);
    $agama = htmlspecialchars($data["agama"]);
    $alamat = htmlspecialchars($data["alamat"]);

    $foto = $_FILES["foto"]["name"];
    $tmp_name = $_FILES["foto"]["tmp_name"];
    $target_dir = "uploads/";
    $target_file = $target_dir . basename($foto);



    $result = mysqli_query($koneksi, "SELECT EMAIL FROM guru WHERE EMAIL = '$email'");
    if (mysqli_fetch_assoc($result)) {
        echo "<script>alert('Email sudah terdaftar');</script>";
        return false;
    }

    if ($password !== $password2) {
        echo "<script>alert('Konfirmasi password tidak sesuai');</script>";
        return false;
    }

    $password = password_hash($password, PASSWORD_DEFAULT);

    if (!move_uploaded_file($tmp_name, $target_file)) {
        echo "<script>alert('Gagal mengupload foto');</script>";
        return false;
    }

    $query = "INSERT INTO guru (NIDN, NAME, JK, TGL_LAHIR, EMAIL, PASSWORD, NO_HP, FOTO, AGAMA, ALAMAT) 
              VALUES ($nidn, '$nama', '$jk', '$tgl_lahir', '$email', '$password', '$no_hp', '$foto', '$agama', '$alamat')";

    $result = mysqli_query($koneksi, $query);

    if (!$result) {
        echo "<script>alert('Terjadi kesalahan: " . mysqli_error($koneksi) . "');</script>";
        return false;
    }

    return mysqli_affected_rows($koneksi);
}


if (isset($_POST["register"])) {
    if (registrasi($_POST) > 0) {
        echo "<script>
                alert('Guru baru berhasil ditambahkan');
                document.location.href = 'login.php';
                </script>";
    } else {
        echo "<script>
            alert('Gagal menambahkan Guru baru');
        </script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrasi Guru | UPT SDN 02 KP LALANG</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: rgba(205, 212, 162, 0.65);
        }

        .card {
            background: rgba(118, 172, 49, 0.33);
            padding: 20px;
            border-radius: 10px;
            border: 1px solid rgba(165, 162, 162, 0.2);
            box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1);
        }

        .form-control:focus {
            box-shadow: none;
            border-color: #4caf50;
        }

        .btn-custom {
            background-color: #4caf50;
            color: white;
            transition: 0.3s;
        }

        .btn-custom:hover {
            background-color: #45a049;
        }
    </style>
</head>

<body>
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-lg-8 col-md-10">
                <div class="card p-4">
                    <h2 class="text-center mb-4">Form Registrasi Guru</h2>
                    <form action="" method="post" enctype="multipart/form-data">
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label for="nidn" class="form-label">NIDN</label>
                                <input type="text" name="nidn" id="nidn" class="form-control" placeholder="Masukkan NIDN" required>
                            </div>
                            <div class="col-md-6">
                                <label for="nama" class="form-label">Nama Lengkap</label>
                                <input type="text" name="nama" id="nama" class="form-control" placeholder="Masukkan Nama Lengkap" required>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label for="jk" class="form-label">Jenis Kelamin</label>
                                <select name="jk" id="jk" class="form-select" required>
                                    <option value="" disabled selected>Pilih Jenis Kelamin</option>
                                    <option value="Laki-laki">Laki-Laki</option>
                                    <option value="Perempuan">Perempuan</option>
                                </select>
                            </div>
                            <div class="col-md-6">
                                <label for="tgl_lahir" class="form-label">Tanggal Lahir</label>
                                <input type="date" name="tgl_lahir" id="tgl_lahir" class="form-control" required>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" name="email" id="email" class="form-control" placeholder="Masukkan Email" required>
                            </div>
                            <div class="col-md-6">
                                <label for="no_hp" class="form-label">No. HP</label>
                                <input type="text" name="no_hp" id="no_hp" class="form-control" placeholder="Masukkan No. HP" required>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label for="password" class="form-label">Password</label>
                                <input type="password" name="password" id="password" class="form-control" placeholder="Masukkan Password" required>
                            </div>
                            <div class="col-md-6">
                                <label for="password2" class="form-label">Konfirmasi Password</label>
                                <input type="password" name="password2" id="password2" class="form-control" placeholder="Ulangi Password" required>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label for="agama" class="form-label">Agama</label>
                                <input type="text" name="agama" id="agama" class="form-control" placeholder="Masukkan Agama" required>
                            </div>
                            <div class="col-md-6">
                                <label for="foto" class="form-label">Upload Foto</label>
                                <input type="file" name="foto" id="foto" class="form-control" required>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="alamat" class="form-label">Alamat</label>
                            <textarea name="alamat" id="alamat" rows="3" class="form-control" placeholder="Masukkan Alamat" required></textarea>
                        </div>
                        <button type="submit" name="register" class="btn btn-custom w-100">Daftar</button>
                        <p class="text-center mt-3">Sudah punya akun? <a href="login.php">Login</a></p>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>

</html>