<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: DELETE, OPTIONS");
header("Access-Control-Allow-Headers: Content-Type");

include 'koneksi.php';

/* preflight */
if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') {
    http_response_code(200);
    exit();
}

/* pastikan method DELETE */
if ($_SERVER['REQUEST_METHOD'] !== 'DELETE') {
    echo json_encode(["error" => "Method harus DELETE"]);
    exit();
}

/* ambil JSON */
$data = json_decode(file_get_contents("php://input"), true);

if (!$data) {
    echo json_encode(["error" => "Data JSON tidak terbaca"]);
    exit();
}

$id_user = $data['id_user'] ?? '';

if ($id_user == '') {
    echo json_encode(["error" => "id_user wajib diisi"]);
    exit();
}

/* query delete */
$query = mysqli_query($conn, "
    DELETE FROM user WHERE id_user='$id_user'
");

if (!$query) {
    echo json_encode([
        "error" => "Query gagal",
        "mysql_error" => mysqli_error($conn)
    ]);
    exit();
}

if (mysqli_affected_rows($conn) > 0) {
    echo json_encode([
        "success" => "Data user berhasil dihapus",
        "id_user" => $id_user
    ]);
} else {
    echo json_encode([
        "warning" => "Data tidak ditemukan",
        "id_user" => $id_user
    ]);
}
