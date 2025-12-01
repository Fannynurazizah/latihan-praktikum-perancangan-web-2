<?php
include "koneksi.php";

$id = $_GET['id'];

// ambil data dari database
$data = mysqli_query($koneksi, "SELECT * FROM produk WHERE id_produk='$id'");
$p = mysqli_fetch_assoc($data);

// hapus file foto
$folder = "sewa_layos_dan_sound/";
$lokasi_file = $folder . $p['foto_produk'];

if(file_exists($lokasi_file)){
    unlink($lokasi_file);
}

// hapus data dari database
mysqli_query($koneksi, "DELETE FROM produk WHERE id_produk='$id'");

// redirect dengan notifikasi sukses
header("Location: tampil_foto.php?delete=success");
exit;
?>




