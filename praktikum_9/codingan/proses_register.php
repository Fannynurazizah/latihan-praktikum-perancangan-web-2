<?php
include "koneksi.php";
require 'vendor/autoload.php';

use PHPMailer\PHPMailer\PHPMailer;

$nama     = $_POST['nama'];
$email    = $_POST['email'];
$password = password_hash($_POST['password'], PASSWORD_DEFAULT);
$telepon  = $_POST['telepon'];
$email    = $_POST['email'];
$token    = md5(rand());

$cek = mysqli_query($conn, "SELECT * FROM user WHERE email='$email'");
if (mysqli_num_rows($cek) > 0) {
    echo "Email sudah terdaftar";
    exit;
}

mysqli_query($conn, "INSERT INTO user 
(nama, email, password, telepon, alamat, token, is_verified) 
VALUES 
('$nama', '$email', '$password', '$telepon', '$email', '$token',0)");

$mail = new PHPMailer(true);
try {
    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';
    $mail->SMTPAuth = true;
    $mail->Username = 'sewedekorasiacara@gmail.com';
    $mail->Password = 'sitsdsvoeyseuppp';
    $mail->SMTPSecure = 'tls';
    $mail->Port = 587;

    $mail->setFrom('sewedekorasiacara@gmail.com', 'Verifikasi Akun');
    $mail->addAddress($email);

    $link = "http://localhost/sewa_dekorasi/verify.php?token=$token";

    $mail->isHTML(true);
    $mail->Subject = 'Verifikasi Akun';
    $mail->Body = "
        Halo $nama,<br>
        Klik link berikut untuk verifikasi akun:<br>
        <a href='$link'>Verifikasi Sekarang</a>
    ";

    $mail->send();
    echo "Registrasi berhasil, cek email untuk verifikasi.";
} catch (Exception $e) {
    echo "Gagal kirim email";
}
