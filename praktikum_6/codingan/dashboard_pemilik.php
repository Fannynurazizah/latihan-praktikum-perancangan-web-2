<?php
session_start();

// Cek apakah pemilik sudah login
if (!isset($_SESSION['nama'])) {
    header("Location: login.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Dashboard Pemilik – Sewa Dekorasi</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f2f2f2;
            margin: 0;
            padding: 0;
        }
        .container {
            width: 90%;
            max-width: 780px;
            background: white;
            margin: 70px auto;
            padding: 25px;
            border-radius: 10px;
            box-shadow: 0 4px 10px rgba(0,0,0,0.2);
            text-align: center;
        }
        h2 {
            margin-top: 0;
            color: #333;
        }
        .btn {
            display: inline-block;
            padding: 10px 18px;
            margin: 10px 8px;
            background: #007bff;
            color: white;
            text-decoration: none;
            border-radius: 6px;
            font-size: 14px;
            transition: 0.3s;
        }
        .btn:hover { background: #0056b3; }
        .btn-warning { background: #ff9800; }
        .btn-warning:hover { background: #e68900; }
        .btn-danger { background: #d9534f; }
        .btn-danger:hover { background: #c9302c; }
    </style>
</head>
<body>

<div class="container">
    <h2>Selamat datang, <b>Pemilik <?php echo $_SESSION['nama']; ?></b></h2>
    <p>Anda dapat memantau perkembangan usaha dan mengelola akses pengguna.</p>

    <!-- Menu khusus Pemilik -->
    <a href="ringkasan_bisnis.php" class="btn">Ringkasan Bisnis</a>
    <a href="laporan.php" class="btn">Laporan Keuangan</a>
    <a href="kelola_admin.php" class="btn btn-warning">Kelola Admin</a>
    <a href="pengaturan_akun.php" class="btn">Pengaturan Akun</a>

    <br><br>
    <a href="logout.php" class="btn btn-danger">Logout</a>
</div>

</body>
</html>
