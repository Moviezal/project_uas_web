<?php
require "../config/database.php";
require "../layout/header.php";

// ===========================
// AMBIL ID DARI URL
// ===========================
$id = isset($_GET['id']) ? (int) $_GET['id'] : 0;
if ($id <= 0) {
    die("ID tidak valid!");
}

// ===========================
// AMBIL DATA PRODUK LAMA (Ubah ke tabel mainan)
// ===========================
$sql = "SELECT * FROM mainan WHERE id = $id";
$result = mysqli_query($conn, $sql);

if (!$result) {
    die("Query error: " . mysqli_error($conn));
}

$data = mysqli_fetch_assoc($result);

if (!$data) {
    die("Data tidak ditemukan!");
}

// ===========================
// PROSES UPDATE JIKA FORM DIKIRIM
// ===========================
if (isset($_POST['update'])) {
    $nama       = mysqli_real_escape_string($conn, $_POST['nama']);
    $kategori   = mysqli_real_escape_string($conn, $_POST['kategori']);
    $harga_jual = (int) $_POST['harga_jual'];
    $harga_beli = (int) $_POST['harga_beli'];
    $stok       = (int) $_POST['stok'];

    // ===========================
    // CEK APAKAH GAMBAR DIGANTI
    // ===========================
    if (!empty($_FILES['gambar']['name'])) {
        $gambar = $_FILES['gambar']['name'];
        $tmp    = $_FILES['gambar']['tmp_name'];

        // Pindahkan file ke folder image (sesuai folder kamu)
        move_uploaded_file($tmp, "../image/" . $gambar);

        $sql_update = "
            UPDATE mainan SET
                nama='$nama',
                kategori='$kategori',
                harga_jual=$harga_jual,
                harga_beli=$harga_beli,
                stok=$stok,
                gambar='$gambar'
            WHERE id=$id
        ";
    } else {
        $sql_update = "
            UPDATE mainan SET
                nama='$nama',
                kategori='$kategori',
                harga_jual=$harga_jual,
                harga_beli=$harga_beli,
                stok=$stok
            WHERE id=$id
        ";
    }

    // Eksekusi query
    if (mysqli_query($conn, $sql_update)) {
        echo "<script>alert('Data Mainan Berhasil Diperbarui!'); window.location='../index.php';</script>";
        exit;
    } else {
        die("Update gagal: " . mysqli_error($conn));
    }
}
?>

<div class="card shadow border-0">
    <div class="card-header bg-primary text-white">
        <h5 class="mb-0">Edit Data Mainan</h5>
    </div>

    <div class="card-body">
        <form method="POST" enctype="multipart/form-data">

            <div class="mb-3">
                <label>Nama Mainan</label>