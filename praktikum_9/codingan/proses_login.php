<?php
session_start();
include "koneksi.php";

$email    = $_POST['email'];
$password = $_POST['password'];

$query = mysqli_query($conn, "SELECT * FROM user WHERE email='$email'");
$user  = mysqli_fetch_assoc($query);

if (!$user) {
    die("Email tidak terdaftar");
}

if ($user['is_verified'] == 0) {
    die("Silakan verifikasi email terlebih dahulu");
}

if (!password_verify($password, $user['password'])) {
    die("Password salah");
}

// SIMPAN SESSION
$_SESSION['user'] = [
    'id_user' => $user['id_user'],
    'nama'    => $user['nama'],
    'email'   => $user['email'],
    'id_role' => $user['id_role']
];

// REDIRECT SESUAI ROLE
if ($user['id_role'] == 2) {
    header("Location: pemilik/dashboard.php");
} elseif ($user['id_role'] == 1) {
    header("Location: admin/dashboard_admin.php");
} else {
    header("Location: pelanggan/dashboard.php");
}
exit;
