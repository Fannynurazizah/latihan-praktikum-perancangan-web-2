<?php
session_start();
include('koneksi.php');

if (isset($_POST['login'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $query = "SELECT * FROM user WHERE email='$email'";
    $result = mysqli_query($conn, $query);

    if (mysqli_num_rows($result) > 0) {
        $data = mysqli_fetch_assoc($result);

        if ($password == $data['password']) {
            $_SESSION['nama'] = $data['nama'];
            $_SESSION['id_role'] = $data['id_role'];

            if ($data['id_role'] == 1) {
                header("Location: dashboard_pemilik.php");
            } elseif ($data['id_role'] == 2) {
                header("Location: dashboard_admin.php");
            } else {
                header("Location: dashboard_pelanggan.php");
            }
        } else {
            echo "<script>alert('Password salah'); window.location='login.php';</script>";
        }
    } else {
        echo "<script>alert('Email tidak ditemukan'); window.location='login.php';</script>";
    }
}
?>
