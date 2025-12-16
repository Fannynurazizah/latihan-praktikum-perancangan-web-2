<?php
session_start();
include "koneksi.php";

$error = "";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email    = $_POST['email'];
    $password = $_POST['password'];

    $query = mysqli_query($conn, "SELECT * FROM user WHERE email='$email'");
    $user  = mysqli_fetch_assoc($query);

    if (!$user) {
        $error = "Email tidak terdaftar";
    } elseif ($user['is_verified'] == 0) {
        $error = "Silakan verifikasi email terlebih dahulu";
    } elseif (!password_verify($password, $user['password'])) {
        $error = "Password salah";
    } else {
        $_SESSION['user'] = $user;

        if ($user['id_role'] == 1) {
            header("Location: pemilik/dashboard.php");
        } elseif ($user['id_role'] == 2) {
            header("Location: admin/dashboard_admin.php");
        } else {
            header("Location: pelanggan/dashboard.php");
        }
        exit;
    }
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<title>Login | Sewa Dekorasi</title>

<style>
* {
    box-sizing: border-box;
    font-family: 'Segoe UI', sans-serif;
}

body {
    margin: 0;
    height: 100vh;
    background: linear-gradient(135deg, #050b18, #0b1c2d);
    display: flex;
    justify-content: center;
    align-items: center;
}

/* CARD */
.login-card {
    width: 380px;
    background: rgba(15, 25, 40, 0.95);
    border-radius: 16px;
    padding: 35px;
    box-shadow: 0 20px 40px rgba(0,0,0,.6);
    border: 1px solid rgba(255,255,255,.05);
}

/* TITLE */
.login-card h2 {
    text-align: center;
    color: #fff;
    margin-bottom: 25px;
}

/* INPUT */
.login-card input {
    width: 100%;
    padding: 12px 14px;
    margin-bottom: 15px;
    border-radius: 8px;
    border: 1px solid #1f2a3a;
    background: #0c1522;
    color: #fff;
    font-size: 14px;
}

.login-card input::placeholder {
    color: #8fa3bf;
}

/* BUTTON */
.login-card button {
    width: 100%;
    padding: 12px;
    background: #22c55e;
    border: none;
    border-radius: 8px;
    color: #052e16;
    font-weight: bold;
    font-size: 15px;
    cursor: pointer;
    transition: .2s;
}

.login-card button:hover {
    background: #16a34a;
}

/* ERROR */
.error {
    background: rgba(239,68,68,.15);
    color: #fecaca;
    padding: 10px;
    border-radius: 8px;
    margin-bottom: 15px;
    text-align: center;
    font-size: 14px;
}

/* FOOTER */
.footer {
    margin-top: 15px;
    text-align: center;
    font-size: 13px;
    color: #94a3b8;
}

.footer a {
    color: #22c55e;
    text-decoration: none;
}
</style>
</head>

<body>

<div class="login-card">
    <h2>Login Sistem</h2>

    <?php if ($error): ?>
        <div class="error"><?= $error ?></div>
    <?php endif; ?>

    <form method="POST">
        <input type="email" name="email" placeholder="Email" required>
        <input type="password" name="password" placeholder="Password" required>
        <button type="submit">Masuk</button>
    </form>

    <div class="footer">
        Belum punya akun? <a href="register.php">Daftar</a>
    </div>
</div>

</body>
</html>
