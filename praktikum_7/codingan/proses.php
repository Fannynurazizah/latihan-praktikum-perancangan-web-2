<?php
include "koneksi.php";

$nama_produk = isset($_POST['nama_produk']) ? $_POST['nama_produk'] : "";
$foto = isset($_FILES['foto_produk']['name']) ? $_FILES['foto_produk']['name'] : "";

if ($nama_produk == "" || $foto == "") {
    echo "Input tidak lengkap! Pastikan Nama Produk dan Foto sudah diisi.<br>";
    echo "<a href='input_foto.php'>Kembali</a>";
    exit;
}

$size = $_FILES['foto_produk']['size'];
$tmp = $_FILES['foto_produk']['tmp_name'];

$folder = "sewa_layos_dan_sound/";
$ext = strtolower(pathinfo($foto, PATHINFO_EXTENSION));
$valid_ext = ['jpg','jpeg','png','gif'];

$nama_baru = rand(1000,999999).".".$ext;

if(!in_array($ext, $valid_ext)){
    echo "Jenis file tidak diperbolehkan!<br><a href='input_foto.php'>Kembali</a>";
    exit;
}

if($size > 2000000){
    echo "Ukuran foto terlalu besar!<br><a href='input_foto.php'>Kembali</a>";
    exit;
}

if(move_uploaded_file($tmp, $folder.$nama_baru)){
    mysqli_query($koneksi, 
        "INSERT INTO produk(nama_produk, foto_produk)
         VALUES('$nama_produk', '$nama_baru')");
    header("Location: tampil_foto.php?upload=success");
    exit;
}
?>



