 <?php
require "config/database.php";

$per_page = 5; // Saya naikkan jadi 5 agar tidak terlalu sedikit per halamannya
$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
if ($page < 1) $page = 1;

$start = ($page - 1) * $per_page;

$keyword = isset($_GET['cari']) ? $_GET['cari'] : '';
$keyword = mysqli_real_escape_string($conn, $keyword);

$where = "";
if ($keyword != "") {
    $where = "WHERE nama LIKE '%$keyword%' 
              OR kategori LIKE '%$keyword%'";
}

// DATA PRODUK MAINAN (Sudah diubah ke tabel mainan)
$data = mysqli_query(
    $conn,
    "SELECT * FROM mainan $where LIMIT $start, $per_page"
);

// TOTAL DATA MAINAN
$total_result = mysqli_query(
    $conn,
    "SELECT COUNT(*) AS total FROM mainan $where"
);
$total = mysqli_fetch_assoc($total_result)['total'];

$total_page = ceil($total / $per_page);
?>

<div class="container">
    <h2>Daftar Koleksi Mainan</h2>
    <hr>
    
    </div>