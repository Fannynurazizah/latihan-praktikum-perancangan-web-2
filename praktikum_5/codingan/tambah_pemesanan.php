<?php include 'koneksi.php'; ?>
<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<title>Tambah Pemesanan</title>
<style>
    body { font-family: 'Poppins', sans-serif; background: #F6F3FA; color: #4B0082; padding: 30px; }
    form { background: white; padding: 25px; border-radius: 10px; width: 400px; margin: auto; box-shadow: 0 0 10px rgba(0,0,0,0.1); }
    label { display: block; margin-top: 10px; }
    input, select, textarea { width: 100%; padding: 8px; border: 1px solid #ccc; border-radius: 6px; }
    button { margin-top: 15px; padding: 10px; width: 100%; background: #7A1FA2; color: white; border: none; border-radius: 8px; cursor: pointer; }
    button:hover { background: #4B0082; }
</style>
</head>
<body>
<h2 align="center">Tambah Data Pemesanan</h2>

<form method="post" action="">
    <label>ID User:</label>
    <input type="number" name="id_user" required>

    <label>ID Paket:</label>
    <input type="number" name="id_paket" required>

    <label>Tanggal Pesan:</label>
    <input type="datetime-local" name="tanggal_pesan" required>

    <label>Tanggal Acara:</label>
    <input type="date" name="tanggal_acara" required>

    <label>Total Harga:</label>
    <input type="number" name="total_harga" required>

    <label>Status:</label>
    <select name="status">
        <option value="pending">Pending</option>
        <option value="disetujui">Disetujui</option>
        <option value="ditolak">Ditolak</option>
        <option value="selesai">Selesai</option>
    </select>

    <label>Catatan:</label>
    <textarea name="catatan" rows="3"></textarea>

    <button type="submit" name="simpan">Simpan</button>
</form>

<?php
if (isset($_POST['simpan'])) {
    $id_user = $_POST['id_user'];
    $id_paket = $_POST['id_paket'];
    $tanggal_pesan = $_POST['tanggal_pesan'];
    $tanggal_acara = $_POST['tanggal_acara'];
    $total_harga = $_POST['total_harga'];
    $status = $_POST['status'];
    $catatan = $_POST['catatan'];

    $query = "INSERT INTO pemesanan (id_user, id_paket, tanggal_pesan, tanggal_acara, total_harga, status, catatan)
              VALUES ('$id_user','$id_paket','$tanggal_pesan','$tanggal_acara','$total_harga','$status','$catatan')";
    if ($koneksi->query($query)) {
        echo "<script>alert('Data berhasil ditambahkan'); window.location='pemesanan.php';</script>";
    } else {
        echo "<script>alert('Gagal menambah data');</script>";
    }
}
?>
</body>
</html>
