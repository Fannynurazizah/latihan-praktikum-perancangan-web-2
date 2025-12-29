<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: PUT, OPTIONS");
header("Access-Control-Allow-Headers: Content-Type");

include 'koneksi.php';

if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') {
    exit();
}

$data = json_decode(file_get_contents("php://input"), true);

/* cek data masuk */
if (!$data) {
    echo json_encode(["error" => "JSON tidak terbaca"]);
    exit();
}

$id_user = $data['id_user'] ?? '';
$nama    = $data['nama'] ?? '';
$email   = $data['email'] ?? '';
$telepon = $data['telepon'] ?? '';
$alamat  = $data['alamat'] ?? '';
$id_role = $data['id_role'] ?? '';

if ($id_user == '') {
    echo json_encode(["error" => "id_user kosong"]);
    exit();
}

$query = "
    UPDATE user SET
        nama='$nama',
        email='$email',
        telepon='$telepon',
        alamat='$alamat',
        id_role='$id_role'
    WHERE id_user='$id_user'
";

$result = mysqli_query($conn, $query);

if (!$result) {
    echo json_encode([
        "error" => "Query error",
        "mysql_error" => mysqli_error($conn)
    ]);
    exit();
}

if (mysqli_affected_rows($conn) > 0) {
    echo json_encode(["success" => "Data berhasil diupdate"]);
} else {
    echo json_encode([
        "warning" => "Tidak ada data yang berubah",
        "id_user" => $id_user
    ]);
}
