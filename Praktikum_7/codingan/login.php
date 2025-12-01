<?php
session_start();
include "koneksi.php";

if (isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $query = mysqli_query($conn, "SELECT * FROM user WHERE username='$username'");
    $data = mysqli_fetch_array($query);

    if ($data && password_verify($password, $data['password'])) {
        $_SESSION['nama'] = $data['nama'];
        $_SESSION['username'] = $data['username'];
        $_SESSION['role'] = $data['role'];  // ➤ YANG PENTING INI

        header("Location: dashboard_pemilik.php");
        exit();
    } else {
        echo "<script>alert('Username atau password salah!');</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f0f0f0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }
        .card {
            background: white;
            padding: 20px;
            width: 320px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0,0,0,0.15);
        }
        h2 { text-align: center; color: #333; }
        input, button {
            width: 100%;
            padding: 10px;
            margin-top: 8px;
            border-radius: 5px;
            border: 1px solid #ccc;
        }
        button {
            background: #28a745; 
            color: white; 
            border: none;
        }
        button:hover { background: #218838; cursor: pointer; }
        .link { text-align: center; margin-top: 10px; }
        .link a { text-decoration: none; color: #007bff; }
    </style>
</head>
<body>

<div class="card">
    <h2>Login</h2>
    <form method="POST" action="proses_login.php">
        <input type="email" name="email" placeholder="Email" required>
        <input type="password" name="password" placeholder="Password" required>
        <button type="submit" name="login">Login</button>
    </form>
    <div class="link">
        <small>Belum punya akun? <a href="registrasi.php">Registrasi</a></small>
    </div>
</div>

</body>
</html>
