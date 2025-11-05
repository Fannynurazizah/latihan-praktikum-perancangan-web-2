<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Dashboard Sewa Dekorasi Acara</title>

<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet">

<style>
    body {
        margin: 0;
        font-family: 'Poppins', sans-serif;
        background-color: #F6F3FA;
        color: #3D004D;
        display: flex;
    }

    /* Sidebar */
    .sidebar {
        width: 250px;
        background: #4B0082;
        padding: 25px;
        min-height: 100vh;
        color: #EADAF8;
    }
    .sidebar h2 {
        text-align: center;
        margin-bottom: 35px;
        font-weight: 600;
        font-size: 20px;
        color: #fff;
    }
    .menu a {
        display: flex;
        align-items: center;
        padding: 12px;
        margin-bottom: 10px;
        border-radius: 8px;
        color: #EADAF8;
        text-decoration: none;
        font-size: 15px;
        transition: 0.3s;
    }
    .menu a:hover,
    .menu a.active {
        background-color: #7A1FA2;
        color: #fff;
    }

    /* Main */
    .main {
        flex: 1;
        padding: 30px;
    }
    .main h1 {
        font-size: 28px;
        margin-bottom: 5px;
        font-weight: 600;
        color: #4B0082;
    }
    .main p {
        color: #7A1FA2;
        margin-bottom: 25px;
        font-size: 15px;
    }

    /* Grid Cards */
    .grid {
        display: grid;
        grid-template-columns: repeat(3, 1fr);
        gap: 20px;
    }
    .card {
        background: #fff;
        padding: 20px;
        border-radius: 12px;
        box-shadow: 0 4px 12px rgba(0,0,0,0.1);
        transition: 0.3s ease;
        border-left: 6px solid #A66DD4;
    }
    .card:hover {
        transform: translateY(-4px);
    }
    .card h3 {
        font-size: 16px;
        color: #7A1FA2;
        font-weight: 500;
        margin-bottom: 5px;
    }
    .card .value {
        font-size: 34px;
        font-weight: 600;
        color: #4B0082;
    }

    /* Notifikasi */
    .notif {
        margin-top: 30px;
        background: #EADAF8;
        color: #4B0082;
        padding: 20px;
        border-radius: 12px;
        border-left: 6px solid #A66DD4;
    }
</style>
</head>
<body>

<!-- Sidebar -->
<div class="sidebar">
    <h2>SEWA DEKORASI</h2>
    <div class="menu">
        <a class="active" href="index.php">Dashboard</a>
        <a href="data_user.php">Data Pengguna</a>
        <a href="data_barang.php">Data Barang</a>
        <a href="data_paket.php">Data Paket</a>
        <a href="pemesanan.php">Data Pemesanan</a>
        <a href="data_pembayaran.php">Data Pembayaran</a>
        <a href="laporan.php">Laporan</a>
        <a href="notifikasi.php">Notifikasi</a>
        <a href="logout.php">Logout</a>
    </div>
</div>

<!-- Main Content -->
<div class="main">
    <h1>Dashboard Sewa Dekorasi Acara</h1>
    <p>Selamat datang di sistem informasi penyewaan dekorasi acara</p>

    <!-- Statistik -->
    <div class="grid">
        <div class="card">
            <h3>Jumlah Barang</h3>
            <div class="value">48</div>
        </div>

        <div class="card">
            <h3>Jumlah Pemesanan</h3>
            <div class="value">127</div>
        </div>

        <div class="card">
            <h3>Paket Aktif</h3>
            <div class="value">12</div>
        </div>
    </div>

    <!-- Notifikasi -->
    <div class="notif">
        <strong>Notifikasi Terbaru:</strong> Pemesanan baru telah diterima untuk paket “Wedding Elegant”.
    </div>

</div>
</body>
</html>
