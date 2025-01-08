<?php
include 'koneksi.php';

if (isset($_GET['id'])) {
    $id = $_GET['id']; 

    $query = "DELETE FROM guru WHERE NIDN = $id";

    if (mysqli_query($koneksi, $query)) {
        echo "<script>alert('Data berhasil dihapus!');
         window.location.href = 'lihatguru.php';</script>";
    } else {
        echo "Error: " . mysqli_error($koneksi);
        echo "<script>alert('Data tidak berhasil dihapus!');
         window.location.href = 'lihatguru.php';</script>";
    }
} else {
    echo "ID tidak ditemukan!";
    header("Location: lihatguru.php");
}
?>
