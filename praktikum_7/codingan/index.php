<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<title>Home | Sewa Layos & Sound</title>

<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">

<style>
    body {
        margin: 0;
        font-family: Poppins, sans-serif;
        background: linear-gradient(135deg, #fbe8ff, #dec9ff);
        height: 100vh;
        display: flex;
        justify-content: center;
        align-items: center;
    }

    .container {
        text-align: center;
        background: white;
        padding: 40px;
        width: 450px;
        border-radius: 25px;
        box-shadow: 0 0 20px rgba(0,0,0,0.1);
        animation: fadeIn 0.7s ease;
    }

    @keyframes fadeIn {
        0% { transform: translateY(30px); opacity: 0; }
        100% { transform: translateY(0); opacity: 1; }
    }

    h1 {
        color: #7b2cbf;
        margin-bottom: 10px;
    }

    p {
        color: #5a189a;
        font-size: 15px;
        margin-bottom: 20px;
    }

    .btn-menu {
        display: block;
        margin: 12px auto;
        padding: 14px;
        width: 80%;
        text-decoration: none;
        color: white;
        background: #b185ff;
        border-radius: 15px;
        font-weight: 600;
        transition: 0.3s;
        font-size: 16px;
    }

    .btn-menu:hover {
        background: #7b2cbf;
        transform: scale(1.05);
    }

    .footer {
        margin-top: 20px;
        font-size: 12px;
        color: #6a00f4;
    }
</style>
</head>
<body>

<div class="container">
    <h1>🌸 Sewa Layos & Sound 🌸</h1>
    <p>Selamat datang di sistem pengelolaan foto produk layos dan sound.</p>

    <a class="btn-menu" href="input_foto.php">➕ Upload Produk</a>
    <a class="btn-menu" href="tampil_foto.php">📸 Daftar Produk</a>

    <div class="footer">© 2025 Sewa Layos & Sound</div>
</div>

</body>
</html>
