<?php
include 'koneksi.php';

$nama = $_POST['nama'];
$email = $_POST['email'];
$password = $_POST['password'];
$id_role = $_POST['id_role'];

$query = "INSERT INTO user (nama, email, password, id_role) VALUES ('$nama', '$email', '$password', '$id_role')";
if (mysqli_query($conn, $query)) {
    echo "<script>alert('Registrasi berhasil!'); window.location='login.php';</script>";
} else {
    echo "<script>alert('Registrasi gagal!'); window.location='registrasi.php';</script>";
}
?>
