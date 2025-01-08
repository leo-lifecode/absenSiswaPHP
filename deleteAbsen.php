<?php
include 'koneksi.php'; 

// Pastikan parameter 'delete' dan 'table' ada dalam URL
if (isset($_GET['delete']) && isset($_GET['table'])) {
    $idAbsen = $_GET['delete'];
    $nama_table = $_GET['table'];

    // Validasi atau filter nama tabel jika diperlukan (misal hanya memungkinkan tabel dengan format tertentu)
    // Misalnya, hanya tabel yang dimulai dengan 'absensi_'
    if (preg_match('/^absensi_/', $nama_table) && !empty($idAbsen)) {

        // Buat query untuk menghapus absensi berdasarkan ID
        $query = "DELETE FROM $nama_table WHERE ID_ABSEN = ?";

        // Persiapkan statement untuk menghindari SQL Injection
        if ($stmt = $koneksi->prepare($query)) {
            $stmt->bind_param("i", $idAbsen); // Mengikat ID_ABSEN sebagai parameter integer
            if ($stmt->execute()) {
                echo "<script>alert('Absensi berhasil dihapus.'); window.location.href = 'absenshow.php?idtabel=$nama_table';</script>";
            } else {
                echo "<script>alert('Gagal menghapus absensi.'); window.location.href = 'absenshow.php?idtabel=$nama_table';</script>";
            }
            $stmt->close();
        } else {
            echo "<script>alert('Terjadi kesalahan dalam query.'); window.location.href = 'absenshow.php?idtabel=$nama_table';</script>";
        }

    } else {
        echo "<script>alert('ID absensi tidak valid atau tabel tidak ditemukan.'); window.location.href = 'absenshow.php?idtabel=$nama_table';</script>";
    }
} else {
    echo "<script>alert('ID absensi atau nama tabel tidak ditemukan.'); window.location.href = 'absenshow.php?idtabel=$nama_table';</script>";
}
?>
