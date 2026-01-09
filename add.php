<?php
require "../config/database.php";
require "../layout/header.php";

if (isset($_POST['simpan'])) {
    // Sesuaikan $_POST['nama_mainan'] dengan atribut 'name' di form input
    $nama        = $_POST['nama_mainan']; 
    $kategori    = $_POST['kategori'];
    $harga_jual  = $_POST['harga_jual'];
    $harga_beli  = $_POST['harga_beli'];
    $stok        = $_POST['stok'];

    // Proses upload gambar
    $gambar = $_FILES['gambar']['name'];
    $tmp    = $_FILES['gambar']['tmp_name'];

    // Folder tujuan: "../image/" (sesuai struktur folder di screenshot kamu)
    move_uploaded_file($tmp, "../image/" . $gambar);

    // Pastikan nama tabel 'mainan' dan nama kolom sesuai file SQL tadi (nama, kategori, dll)
    mysqli_query($conn, "
        INSERT INTO mainan 
        (nama, kategori, harga_jual, harga_beli, stok, gambar)
        VALUES
        ('$nama', '$kategori', '$harga_jual', '$harga_beli', '$stok', '$gambar')
    ");

    echo "<script>alert('Data Mainan Berhasil Ditambahkan!'); window.location='../index.php';</script>";
    exit;
}
?>

<div class="card form-card p-4 fade-in">
    <h4 class="form-title">Tambah Produk Mainan Baru</h4>

    <form method="POST" enctype="multipart/form-data">

        <div class="mb-3">
            <label class="form-label">Nama Mainan</label>
            <input type="text" name="nama_mainan" class="form-control" placeholder="Contoh: Robot Transformers" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Kategori Mainan</label>
            <select name="kategori" class="form-control" required>
                <option value="">-- Pilih Kategori --</option>
                <option value="Edukasi">Edukasi</option>
                <option value="Action Figure">Action Figure</option>
                <option value="Outdoor">Outdoor</option>
                <option value="Boneka">Boneka</option>
            </select>
        </div>

        <div class="mb-3">
            <label class="form-label">Harga Jual</label>
            <input type="number" name="harga_jual" class="form-control" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Harga Beli</label>
            <input type="number" name="harga_beli" class="form-control" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Stok</label>
            <input type="number" name="stok" class="form-control" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Foto Mainan</label>
            <input type="file" name="gambar" class="form-control" required>
        </div>

        <div class="d-flex gap-2">
            <button name="simpan" class="btn btn-primary">
                💾 Simpan Mainan
            </button>
            <a href="../index.php" class="btn btn-secondary">
                Batal
            </a>
        </div>

    </form>
</div>

<?php require "../layout/footer.php"; ?>