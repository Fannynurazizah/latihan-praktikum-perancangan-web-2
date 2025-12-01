<?php
session_start();
if (!isset($_SESSION['id_user'])) {
    echo "<script>alert('Silakan login dulu.'); window.location='../login.php';</script>";
    exit;
}
?>
