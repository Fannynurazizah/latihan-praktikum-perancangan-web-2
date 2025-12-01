<?php
session_start();

// Jika sudah login, langsung arahkan ke dashboard sesuai role
if (isset($_SESSION['role'])) {
    if ($_SESSION['role'] == 1) {
        header("Location: dashboard_pemilik.php");
        exit;
    } elseif ($_SESSION['role'] == 2) {
        header("Location: dashboard_admin.php");
        exit;
    } elseif ($_SESSION['role'] == 3) {
        header("Location: dashboard_pelanggan.php");
        exit;
    }
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Selamat Datang - Sistem Sewa Dekorasi Acara</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background: linear-gradient(135deg, #FFE6E6, #FFD3B6, #FFAAA7);
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
            height: 100vh;
            margin: 0;
            text-align: center;
            animation: bgFade 10s infinite alternate;
        }

        @keyframes bgFade {
            from { filter: brightness(0.95); }
            to { filter: brightness(1.05); }
        }

        .card {
            background: rgba(255, 255, 255, 0.35);
            backdrop-filter: blur(12px);
            padding: 45px;
            border-radius: 20px;
            box-shadow: 0 8px 32px rgba(0, 0, 0, 0.15);
            max-width: 480px;
            transition: transform 0.3s ease;
        }

        .card:hover {
            transform: translateY(-5px);
        }

        h1 {
            font-size: 36px;
            color: #444;
            margin-bottom: 10px;
        }

        p {
            font-size: 18px;
            color: #666;
            margin-bottom: 30px;
        }

        a {
            text-decoration: none;
            margin: 8px;
        }

        .btn {
            padding: 14px 30px;
            border-radius: 10px;
            display: inline-block;
            font-size: 16px;
            font-weight: 600;
            border: none;
            transition: 0.3s ease;
            box-shadow: 0 5px 15px rgba(0,0,0,0.1);
        }

        .btn-login {
            background: #6C63FF;
            color: white;
        }

        .btn-login:hover {
            background: #574bff;
            transform: scale(1.05);
        }

        .btn-regis {
            background: #FF6584;
            color: white;
        }

        .btn-regis:hover {
            background: #ff4470;
            transform: scale(1.05);
        }

        .footer {
            margin-top: 20px;
            font-size: 13px;
            color: #555;
        }
    </style>
</head>
<body>

<div class="card">
    <h1>✨ Selamat Datang ✨</h1>
    <p><b>Sistem Informasi Sewa Dekorasi Acara</b><br>Wujudkan Dekorasi Impian Anda</p>

    <a href="login.php" class="btn btn-login">Login</a>
    <a href="registrasi.php" class="btn btn-regis">Registrasi</a>
</div>

<p class="footer">© 2025 Sewa Dekorasi Acara • Elegan & Profesional</p>

</body>
</html>
