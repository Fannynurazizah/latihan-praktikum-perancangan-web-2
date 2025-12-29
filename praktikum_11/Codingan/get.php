<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET, OPTIONS");
header("Access-Control-Allow-Headers: Content-Type");

include 'koneksi.php';

/* preflight */
if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') {
    http_response_code(200);
    exit();
}

/* pastikan GET */
if ($_SERVER['REQUEST_METHOD'] !== 'GET') {
    echo json_encode(["error" => "Method harus GET"]);
    exit();
}

/* cek apakah ada id_user di URL */
if (isset($_GET['id_user'])) {
    $id_user = $_GET['id_user'];

    $query = mysqli_query($conn, "
        SELECT id_user, nama, email, telepon, alamat, id_role, created_at
        FROM user
        WHERE id_user='$id_user'
    ");

    if (mysqli_num_rows($query) > 0) {
        $data = mysqli_fetch_assoc($query);
        echo json_encode($data);
    } else {
        echo json_encode(["message" => "Data user tidak ditemukan"]);
    }

} else {
    /* ambil semua data */
    $query = mysqli_query($conn, "
        SELECT id_user, nama, email, telepon, alamat, id_role, created_at
        FROM user
        ORDER BY id_user DESC
    ");

    $data = [];
    while ($row = mysqli_fetch_assoc($query)) {
        $data[] = $row;
    }

    echo json_encode($data);
}
