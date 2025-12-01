<?php
session_start();

// Jika belum login kembalikan ke halaman login
if (!isset($_SESSION['nama'])) {
    header("Location: login.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Dashboard Pelanggan</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f4f4f4;
            margin: 0;
            padding: 0;
        }
        .container {
            width: 80%;
            max-width: 800px;
            background: white;
            margin: 100px auto;
            padding: 30px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
            text-align: center;
            border-radius: 10px;
        }
        h2 {
            margin-top: 0;
            color: #333;
        }
        p {
            font-size: 16px;
            color: #555;
        }
        .btn {
            display: inline-block;
            padding: 10px 20px;
            margin: 15px 5px;
            text-decoration: none;
            color: white;
            background: #28a745;
            border-radius: 5px;
            transition: 0.3s;
        }
        .btn:hover {
            background: #218838;
        }
        .btn-logout {
            background: #dc3545;
        }
        .btn-logout:hover {
            background: #c82333;
        }
    </style>
</head>
<body>

<div class="container">
    <h2>Selamat datang, <b><?php echo $_SESSION['nama']; ?></b></h2>
    <p>Anda dapat melihat dan memesan dekorasi acara.</p>

    <!-- Tombol ke halaman daftar dekorasi -->
    <a href="dekorasi.php" class="btn">Lihat Dekorasi</a>

    <!-- Tombol ke halaman riwayat pesanan -->
    <a href="riwayat_pesanan.php" class="btn">Riwayat Pesanan</a>

    <!-- Tombol logout -->
    <a href="logout.php" class="btn btn-logout">Logout</a>
</div>

</body>
</html>
