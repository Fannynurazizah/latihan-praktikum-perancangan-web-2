<?php
include "koneksi.php";

$token = $_GET['token'];

$cek = mysqli_query($conn, "SELECT * FROM user WHERE token='$token'");
if (mysqli_num_rows($cek) == 1) {
    mysqli_query($conn, "UPDATE user SET is_verified=1, token=NULL WHERE token='$token'");
    echo "Verifikasi berhasil. <a href='login.php'>Login</a>";
} else {
    echo "Token tidak valid";
}
