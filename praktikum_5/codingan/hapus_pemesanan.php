<?php
include 'koneksi.php';
$id = $_GET['id'];
$hapus = $koneksi->query("DELETE FROM pemesanan WHERE id_pemesanan='$id'");
if ($hapus) {
    echo "<script>alert('Data berhasil dihapus'); window.location='pemesanan.php';</script>";
} else {
    echo "<script>alert('Gagal menghapus data'); window.location='pemesanan.php';</script>";
}
?>
