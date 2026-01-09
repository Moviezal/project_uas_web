<?php
session_start();
require "../../config/database.php";

if (isset($_POST['login'])) {
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $password = $_POST['password'];

    // Contoh login sederhana (sesuaikan dengan logic database kamu)
    if ($username == "admin" && $password == "admin123") {
        $_SESSION['login'] = true;
        $_SESSION['role'] = 'admin';
        header("Location: ../../dashboard.php");
        exit;
    } else if ($username == "user" && $password == "user123") {
        $_SESSION['login'] = true;
        $_SESSION['role'] = 'user';
        header("Location: ../../index.php");
        exit;
    } else {
        $error = true;
    }
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Login - Toko Mainan Hafeezh</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="../../assets/style.css" rel="stylesheet">
</head>
<body class="d-flex align-items-center justify-content-center" style="height: 100vh;">
    <div class="card p-4 shadow-lg" style="width: 400px; border-radius: 20px;">
        <div class="text-center mb-4">
            <h3>🧩 Login</h3>
            <p class="text-muted">Toko Mainan Hafeezh</p>
        </div>

        <?php if (isset($error)) : ?>
            <div class="alert alert-danger text-center">Username / Password Salah!</div>
        <?php endif; ?>

        <form action="" method="POST">
            <div class="mb-3">
                <label class="form-label">Username</label>
                <input type="text" name="username" class="form-control" required placeholder="admin / user">
            </div>
            <div class="mb-3">
                <label class="form-label">Password</label>
                <input type="password" name="password" class="form-control" required placeholder="admin123 / user123">
            </div>
            <button type="submit" name="login" class="btn btn-primary w-100 rounded-pill">Masuk Sekarang</button>
        </form>
    </div>
</body>
</html>