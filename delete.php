<?php
require "../config/database.php";

// Ambil ID yang akan dihapus
$id = isset($_GET['id']) ? (int)$_GET['id'] : 0;

if ($id > 0) {
    // Query hapus data dari tabel mainan
    $query = "DELETE FROM mainan WHERE id = $id";
    
    if (mysqli_query($conn, $query)) {
        // Jika berhasil, kembali ke index dengan pesan sukses
        echo "<script>alert('Data Mainan Berhasil Dihapus!'); window.location='../index.php';</script>";
    } else {
        // Jika gagal
        echo "<script>alert('Gagal menghapus data: " . mysqli_error($conn) . "'); window.location='../index.php';</script>";
    }
} else {
    header("Location: ../index.php");
}
exit;
?>