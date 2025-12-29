<?php
include 'koneksi.php';

$data = json_decode(file_get_contents("php://input"), true);

$nama     = $data['nama'];
$email    = $data['email'];
$password = password_hash($data['password'], PASSWORD_DEFAULT);
$telepon  = $data['telepon'];
$alamat   = $data['alamat'];
$id_role  = $data['id_role'];

$query = mysqli_query($conn, "
    INSERT INTO user
    (nama, email, password, telepon, alamat, id_role, created_at)
    VALUES
    ('$nama', '$email', '$password', '$telepon', '$alamat', '$id_role', NOW())
");

if ($query) {
    echo json_encode(["message" => "User berhasil ditambahkan"]);
} else {
    echo json_encode(["message" => "Gagal menambahkan user"]);
}
?>
