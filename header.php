<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Toko Mainan Hafeezh</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" rel="stylesheet">

    <?php 
    // Deteksi otomatis lokasi file CSS
    if (file_exists('assets/style.css')) {
        $css_path = 'assets/style.css';
        $base_url = ''; // Jika di folder utama
    } else {
        $css_path = '../assets/style.css';
        $base_url = '../'; // Jika di dalam folder (seperti folder data/)
    }
    ?>
    <link href="<?= $css_path ?>" rel="stylesheet">

    <style>
        .navbar {
            background: linear-gradient(45deg, #0d6efd, #0dcaf0); /* Biru khas mainan */
        }
        .navbar-brand, .nav-link {
            color: white !important;
        }
        .nav-link:hover {
            color: #ffc107 !important; 
        }
        body {
            background-color: #f8f9fa;
        }
    </style>
</head>
<body>

<nav class="navbar navbar-expand-lg shadow-sm">
    <div class="container">
        <a class="navbar-brand fw-bold" href="<?= $base_url ?>dashboard.php">
            <i class="fa fa-gamepad me-2"></i>Toko Mainan Hafeezh
        </a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto align-items-center">
                <li class="nav-item">
                    <a class="nav-link" href="<?= $base_url ?>dashboard.php">
                        <i class="fa fa-house me-1"></i> Dashboard
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?= $base_url ?>index.php">
                        <i class="fa fa-box me-1"></i> Katalog
                    </a>
                </li>
                
                <?php if (isset($_SESSION['login'])): ?>
                <li class="nav-item ms-lg-3">
                    <a class="btn btn-outline-light btn-sm rounded-pill px-3" href="<?= $base_url ?>modules/auth/logout.php" onclick="return confirm('Yakin ingin keluar?')">
                        <i class="fa fa-right-from-bracket me-1"></i> Logout
                    </a>
                </li>
                <?php endif; ?>
            </ul>
        </div>
    </div>
</nav>

<div class="container mt-4">