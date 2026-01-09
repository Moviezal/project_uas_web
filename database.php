<?php
$host = "localhost";
$user = "root";
$pass = "";
// Kita ubah nama database-nya agar sesuai tema
$db   = "db_toko_mainan"; 

$conn = mysqli_connect($host, $user, $pass, $db);

if (!$conn) {
    die("Koneksi database gagal: " . mysqli_connect_error());
}
?>