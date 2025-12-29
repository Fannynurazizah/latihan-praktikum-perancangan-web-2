<?php
$conn = mysqli_connect("localhost", "root", "", "sewa_dekorasiii");

if (!$conn) {
    die(json_encode(["message" => "Koneksi database gagal"]));
}
?>
