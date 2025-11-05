<?php include 'koneksi.php'; ?>
<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<title>Data Pemesanan | Sewa Dekorasi Acara</title>
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet">
<style>
    body { font-family: 'Poppins', sans-serif; background: #F6F3FA; color: #4B0082; padding: 30px; }
    h1 { text-align: center; color: #4B0082; }
    a { text-decoration: none; color: white; background: #7A1FA2; padding: 8px 12px; border-radius: 6px; }
    a:hover { background: #4B0082; }
    table { border-collapse: collapse; width: 100%; margin-top: 20px; background: white; border-radius: 8px; overflow: hidden; }
    th, td { border: 1px solid #ddd; padding: 10px; text-align: left; }
    th { background: #EADAF8; }
    td a { margin-right: 6px; padding: 5px 10px; border-radius: 5px; }
    .edit { background: #7A1FA2; }
    .hapus { background: #b71c1c; }
</style>
</head>
<body>

<h1>Data Pemesanan</h1>
<a href="tambah_pemesanan.php">+ Tambah Pemesanan</a>
<table>
<tr>
    <th>ID</th>
    <th>ID User</th>
    <th>ID Paket</th>
    <th>Tgl Pesan</th>
    <th>Tgl Acara</th>
    <th>Total Harga</th>
    <th>Status</th>
    <th>Catatan</th>
    <th>Aksi</th>
</tr>

<?php
$result = $koneksi->query("SELECT * FROM pemesanan ORDER BY id_pemesanan DESC");
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo "<tr>
            <td>{$row['id_pemesanan']}</td>
            <td>{$row['id_user']}</td>
            <td>{$row['id_paket']}</td>
            <td>{$row['tanggal_pesan']}</td>
            <td>{$row['tanggal_acara']}</td>
            <td>Rp " . number_format($row['total_harga'], 0, ',', '.') . "</td>
            <td>{$row['status']}</td>
            <td>{$row['catatan']}</td>
            <td>
                <a class='edit' href='edit_pemesanan.php?id={$row['id_pemesanan']}'>Edit</a>
                <a class='hapus' href='hapus_pemesanan.php?id={$row['id_pemesanan']}' onclick='return confirm(\"Yakin ingin menghapus data ini?\")'>Hapus</a>
            </td>
        </tr>";
    }
} else {
    echo "<tr><td colspan='9' align='center'><i>Belum ada data pemesanan</i></td></tr>";
}
?>
</table>

</body>
</html>
