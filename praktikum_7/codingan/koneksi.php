<?php
$koneksi = mysqli_connect("localhost", "root", "", "sewa_layos_dan_sound");

if (!$koneksi) {
    die("Koneksi gagal: " . mysqli_connect_error());
}
?>

