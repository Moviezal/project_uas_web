<?php
session_start();

// Proteksi Halaman: Jika belum login, lempar ke halaman login
if (!isset($_SESSION['login'])) {
    header("Location: modules/auth/login.php");
    exit;
}

require "config/database.php";
require "data/barang.php";
require "layout/header.php";
?>

<div class="d-flex justify-content-between align-items-center mb-4">
    <h4 class="mb-0">🧩 Katalog Mainan Hafeezh</h4>

    <div class="d-flex gap-2">
        <a href="dashboard.php" class="btn btn-outline-secondary">
            <i class="fa fa-home"></i> Dashboard
        </a>
        <a href="modules/auth/logout.php" class="btn btn-outline-danger">
            <i class="fa fa-sign-out"></i> Logout
        </a>
    </div>
</div>

<div class="row mb-3">
    <div class="col-md-6">
        <?php if (isset($_SESSION['login']) && $_SESSION['role'] == 'admin'): ?>
            <a href="data/add.php" class="btn btn-primary rounded-pill">
                <i class="fa fa-plus"></i> Tambah Mainan
            </a>
        <?php endif; ?>
    </div>

    <div class="col-md-6">
        <form method="GET" class="d-flex justify-content-end">
            <input type="text"
                   name="cari"
                   class="form-control w-50 me-2"
                   placeholder="Cari mainan..."
                   value="<?= isset($_GET['cari']) ? htmlspecialchars($_GET['cari']) : '' ?>">
            <button class="btn btn-primary">Cari</button>
        </form>
    </div>
</div>

<table class="table table-bordered text-center align-middle shadow-sm">
    <thead class="table-primary">
        <tr>
            <th>Gambar</th>
            <th>Nama Mainan</th>
            <th>Kategori</th>
            <th>Harga Jual</th>
            <th>Harga Beli</th>
            <th>Stok</th>
            <?php if (isset($_SESSION['login']) && $_SESSION['role'] == 'admin'): ?>
                <th>Aksi</th>
            <?php endif; ?>
        </tr>
    </thead>

    <tbody>
        <?php if (mysqli_num_rows($data) > 0): ?>
            <?php while ($row = mysqli_fetch_assoc($data)) { ?>
            <tr>
                <td>
                    <img src="image/<?= $row['gambar']; ?>" width="60" class="rounded">
                </td>
                <td><?= htmlspecialchars($row['nama']); ?></td>
                <td><?= htmlspecialchars($row['kategori']); ?></td>
                <td>Rp <?= number_format($row['harga_jual'], 0, ',', '.'); ?></td>
                <td>Rp <?= number_format($row['harga_beli'], 0, ',', '.'); ?></td>
                <td><?= $row['stok']; ?></td>

                <?php if (isset($_SESSION['login']) && $_SESSION['role'] == 'admin'): ?>
                <td>
                    <a href="data/edit.php?id=<?= $row['id']; ?>" class="btn btn-warning btn-sm">Edit</a>
                    <a href="data/delete.php?id=<?= $row['id']; ?>" class="btn btn-danger btn-sm" onclick="return confirm('Hapus mainan ini?')">Delete</a>
                </td>
                <?php endif; ?>
            </tr>
            <?php } ?>
        <?php else: ?>
            <tr>
                <td colspan="7" class="py-4 text-muted">Belum ada koleksi mainan yang ditemukan.</td>
            </tr>
        <?php endif; ?>
    </tbody>
</table>

<nav>
    <ul class="