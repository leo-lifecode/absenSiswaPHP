<?php
// Mulai session dan cek login
session_start();
if (!isset($_SESSION["login"])) {
    header("Location: login.php");
    exit;
}

// Masukkan koneksi database
include "koneksi.php";

// Ambil nama tabel dari parameter URL
if (isset($_GET['idtabel'])) {
    $idtabel = $_GET['idtabel'];

    // Query untuk menghapus tabel
    $query = "DROP TABLE IF EXISTS $idtabel";

    if (mysqli_query($koneksi, $query)) {
        echo "<script>alert('Tabel $idtabel berhasil dihapus.'); window.location.href = 'absen.php';</script>";
    } else {
        echo "<script>alert('Gagal menghapus tabel: " . mysqli_error($koneksi) . "'); window.location.href = 'absensi.php';</script>";
    }
} else {
    echo "<script>alert('Tidak ada tabel yang dipilih untuk dihapus.'); window.location.href = 'absen.php';</script>";
}
?>
