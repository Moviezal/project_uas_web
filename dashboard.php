<?php
session_start();

// Proteksi Halaman: Jika belum login, lempar ke login
if (!isset($_SESSION['login'])) {
    header("Location: modules/auth/login.php");
    exit;
}

require "layout/header.php";
?>

<h3 class="mb-2">🧩 Dashboard Toko Mainan Hafeezh</h3>
<p class="text-muted">
    Login sebagai: <b><?= htmlspecialchars($_SESSION['role']); ?></b>
</p>

<div class="row mt-4 g-3">

    <div class="col-md-4">
        <div class="card p-4 text-center shadow-sm card-soft">
            <h5>📦 Data Mainan</h5>
            <p class="small text-muted">Lihat semua koleksi mainan</p>
            <a href="index.php" class="btn btn-primary w-100 mt-2">
                Lihat Katalog
            </a>
        </div>
    </div>

    <?php if ($_SESSION['role'] == 'admin'): ?>
    <div class="col-md-4">
        <div class="card p-4 text-center shadow-sm card-soft">
            <h5>➕ Tambah Mainan</h5>
            <p class="small text-muted">Input stok mainan baru</p>
            <a href="data/add.php" class="btn btn-info w-100 mt-2 text-white">
                Tambah Mainan
            </a>
        </div>
    </div>
    <?php endif; ?>

    <div class="col-md-4">
        <div class="card p-4 text-center shadow-sm card-soft">
            <h5>🚪 Logout</h5>
            <p class="small text-muted">Keluar dari sistem</p>
            <a href="modules/auth/logout.php" class="btn btn-danger w-100 mt-2">
                Logout
            </a>
        </div>
    </div>

</div>

<?php require "layout/footer.php"; ?>