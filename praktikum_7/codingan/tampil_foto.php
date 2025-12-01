<?php
include "koneksi.php";
$data = mysqli_query($koneksi, "SELECT * FROM produk ORDER BY id_produk DESC");
?>

<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<title>Daftar Produk</title>

<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<style>
    body {
        font-family: Poppins, sans-serif;
        background: linear-gradient(135deg, #f3d9fa, #e0bbff);
        padding: 20px;
    }

    h2 {
        text-align: center;
        color: #6a00f4;
        margin-bottom: 20px;
    }

    .btn-add {
        display: block;
        width: 220px;
        margin: 0 auto 20px;
        padding: 12px;
        background: #b185ff;
        color: white;
        text-align: center;
        text-decoration: none;
        border-radius: 12px;
        font-weight: 600;
        transition: 0.3s;
    }

    .btn-add:hover {
        background: #7b2cbf;
        transform: scale(1.05);
    }

    table {
        width: 90%;
        margin: auto;
        border-collapse: collapse;
        background: white;
        border-radius: 15px;
        overflow: hidden;
        box-shadow: 0 0 15px rgba(0,0,0,0.2);
    }

    th {
        background: #9d4edd;
        color: white;
        padding: 12px;
    }

    td {
        padding: 10px;
        text-align: center;
        border-bottom: 1px solid #eee;
    }

    tr:hover {
        background: #f5e1ff;
    }

    img {
        border-radius: 12px;
        width: 80px;
        transition: 0.3s;
    }

    img:hover {
        transform: scale(1.6);
        box-shadow: 0 0 20px rgba(0,0,0,0.3);
    }

    .btn-del {
        padding: 7px 14px;
        background: #ff6b6b;
        color: white;
        border: none;
        border-radius: 10px;
        font-weight: bold;
        cursor: pointer;
    }

    .btn-del:hover {
        background: #d90429;
    }
</style>
</head>
<body>

<!-- Notifikasi Upload Berhasil -->
<?php if(isset($_GET['upload']) && $_GET['upload'] == 'success'){ ?>
<script>
Swal.fire({
    title: 'Berhasil! 💜',
    text: 'Produk berhasil diupload!',
    icon: 'success',
    background: '#fceaff',
    confirmButtonColor: '#c77dff'
});
</script>
<?php } ?>

<!-- Notifikasi Delete Berhasil -->
<?php if(isset($_GET['delete']) && $_GET['delete'] == 'success'){ ?>
<script>
Swal.fire({
    title: 'Terhapus! 💔',
    text: 'Produk berhasil dihapus.',
    icon: 'success',
    background: '#ffe6ff',
    confirmButtonColor: '#c77dff'
});
</script>
<?php } ?>

<h2>🌸 Daftar Produk Layos & Sound 🌸</h2>

<a class="btn-add" href="input_foto.php">➕ Tambah Produk Baru</a>

<table>
<tr>
    <th>ID</th>
    <th>Nama Produk</th>
    <th>Foto</th>
    <th>Aksi</th>
</tr>

<?php while($p = mysqli_fetch_array($data)) { ?>
<tr>
    <td><?= $p['id_produk'] ?></td>
    <td><?= $p['nama_produk'] ?></td>
    <td><img src="sewa_layos_dan_sound/<?= $p['foto_produk'] ?>"></td>
    <td>
        <button class="btn-del" onclick="hapusData(<?= $p['id_produk'] ?>)">Hapus</button>
    </td>
</tr>
<?php } ?>

</table>

<!-- SweetAlert Konfirmasi Hapus -->
<script>
function hapusData(id){
    Swal.fire({
        title: 'Yakin ingin menghapus?',
        text: "Data akan hilang permanen!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#d90429',
        cancelButtonColor: '#9d4edd',
        confirmButtonText: 'Ya, hapus!',
        cancelButtonText: 'Batal',
        background: '#fff0ff'
    }).then((result) => {
        if (result.isConfirmed) {
            window.location.href = "delete.php?id=" + id;
        }
    })
}
</script>

</body>
</html>






