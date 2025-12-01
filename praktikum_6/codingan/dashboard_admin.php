<?php
session_start();
include('koneksi.php');

// Cek apakah sudah login dan role admin (misal id_role = 2 untuk admin)
if (!isset($_SESSION['id_role']) || $_SESSION['id_role'] != 2) {
    header("Location: login.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Dashboard Admin – Sewa Dekorasi</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f4f4f4;
            margin: 0;
        }
        .navbar {
            background: #007bff;
            padding: 15px;
            color: white;
        }
        .navbar a {
            color: white;
            margin-right: 20px;
            text-decoration: none;
        }
        .container {
            padding: 20px;
        }
        h2 {
            color: #333;
        }
        .box {
            background: white;
            padding: 20px;
            margin-top: 15px;
            border-radius: 10px;
            box-shadow: 0 0 5px rgba(0,0,0,0.1);
        }
        .btn {
            display: inline-block;
            padding: 10px 15px;
            background: #007bff;
            color: white;
            border-radius: 5px;
            text-decoration: none;
        }
        .btn:hover {
            background: #0056b3;
        }
    </style>
</head>
<body>

<div class="navbar">
    <strong>Dashboard Admin</strong> |
    <a href="dashboard_admin.php">Home</a>
    <a href="kelola_admin.php">Kelola Admin</a>
    <a href="kelola_pelanggan.php">Kelola Pelanggan</a>
    <a href="kelola_barang.php">Kelola Dekorasi</a>
    <a href="kelola_pesanan.php">Kelola Pesanan</a>
    <a href="logout.php">Logout</a>
</div>

<div class="container">
    <h2>Selamat Datang, Admin <?php echo $_SESSION['nama']; ?></h2>
    <p>Anda dapat mengelola seluruh data di sistem Sewa Dekorasi Acara.</p>

    <div class="box">
        <h3>Pintasan Cepat</h3>
        <a class="btn" href="kelola_admin.php">➤ Kelola Admin</a>
        <a class="btn" href="kelola_pelanggan.php">➤ Kelola Pelanggan</a>
        <a class="btn" href="kelola_barang.php">➤ Kelola Barang Dekorasi</a>
        <a class="btn" href="kelola_pesanan.php">➤ Kelola Pesanan</a>
    </div>
</div>

</body>
</html>
