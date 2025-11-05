<?php include 'koneksi.php'; ?>
<?php
$id = $_GET['id'];
$data = $koneksi->query("SELECT * FROM pemesanan WHERE id_pemesanan='$id'")->fetch_assoc();
?>
<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<title>Edit Pemesanan</title>
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
<h2 align="center">Edit Data Pemesanan</h2>

<form method="post">
    <label>ID User:</label>
    <input type="number" name="id_user" value="<?= $data['id_user'] ?>" required>

    <label>ID Paket:</label>
    <input type="number" name="id_paket" value="<?= $data['id_paket'] ?>" required>

    <label>Tanggal Pesan:</label>
    <input type="datetime-local" name="tanggal_pesan" value="<?= date('Y-m-d\TH:i', strtotime($data['tanggal_pesan'])) ?>" required>

    <label>Tanggal Acara:</label>
    <input type="date" name="tanggal_acara" value="<?= $data['tanggal_acara'] ?>" required>

    <label>Total Harga:</label>
    <input type="number" name="total_harga" value="<?= $data['total_harga'] ?>" required>

    <label>Status:</label>
    <select name="status">
        <?php
        $opsi = ['pending','disetujui','ditolak','selesai'];
        foreach ($opsi as $s) {
            $sel = ($data['status'] == $s) ? "selected" : "";
            echo "<option value='$s' $sel>$s</option>";
        }
        ?>
    </select>

    <label>Catatan:</label>
    <textarea name="catatan"><?= $data['catatan'] ?></textarea>

    <button type="submit" name="update">Perbarui</button>
</form>

<?php
if (isset($_POST['update'])) {
    $id_user = $_POST['id_user'];
    $id_paket = $_POST['id_paket'];
    $tanggal_pesan = $_POST['tanggal_pesan'];
    $tanggal_acara = $_POST['tanggal_acara'];
    $total_harga = $_POST['total_harga'];
    $status = $_POST['status'];
    $catatan = $_POST['catatan'];

    $query = "UPDATE pemesanan SET 
              id_user='$id_user', id_paket='$id_paket', tanggal_pesan='$tanggal_pesan', 
              tanggal_acara='$tanggal_acara', total_harga='$total_harga', 
              status='$status', catatan='$catatan' WHERE id_pemesanan='$id'";
    if ($koneksi->query($query)) {
        echo "<script>alert('Data berhasil diperbarui'); window.location='pemesanan.php';</script>";
    } else {
        echo "<script>alert('Gagal memperbarui data');</script>";
    }
}
?>
</body>
</html>
