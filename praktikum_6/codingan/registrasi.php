<?php
include('koneksi.php'); // pastikan file koneksi ada

if (isset($_POST['register'])) {
    $nama     = $_POST['nama'];
    $email    = $_POST['email'];
    $password = $_POST['password']; // password langsung dari input (TANPA HASH)
    $telepon  = $_POST['telepon'];
    $alamat   = $_POST['alamat'];

    // Tidak perlu cek password hashing, langsung insert
    $query = "INSERT INTO user (nama, email, password, telepon, alamat, id_role) VALUES 
    ('$nama', '$email', '$password', '$telepon', '$alamat', 3)"; // 3 = pelanggan

    if (mysqli_query($conn, $query)) {
        echo "<script>alert('Registrasi berhasil! Silakan login.'); window.location='login.php';</script>";
    } else {
        echo "<script>alert('Registrasi gagal!');</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Registrasi</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f4f4f4;
            margin: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        .card {
            background: white;
            padding: 25px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
            width: 350px;
        }
        h2 {
            text-align: center;
            color: #333;
        }
        input, textarea, button {
            width: 100%;
            padding: 10px;
            margin-top: 8px;
            border-radius: 5px;
            border: 1px solid #ccc;
        }
        button {
            background: #007bff;
            color: white;
            border: none;
            margin-top: 15px;
        }
        button:hover {
            background: #0056b3;
            cursor: pointer;
        }
        .link {
            text-align: center;
            margin-top: 10px;
        }
        .link a {
            text-decoration: none;
            color: #007bff;
        }
    </style>
</head>
<body>

<div class="card">
    <h2>Registrasi</h2>

    <form method="POST">
        <input type="text" name="nama" placeholder="Nama Lengkap" required>
        <input type="email" name="email" placeholder="Email" required>
        <input type="password" name="password" placeholder="Password" required>
        <input type="text" name="telepon" placeholder="Nomor Telepon" required>
        <textarea name="alamat" placeholder="Alamat Lengkap" required></textarea>
        <button type="submit" name="register">Daftar</button>
    </form>

    <div class="link">
        <small>Sudah punya akun? <a href="login.php">Login</a></small>
    </div>
</div>

</body>
</html>
