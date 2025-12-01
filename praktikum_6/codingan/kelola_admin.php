<?php
session_start();
include('koneksi.php');

// Cek level pemilik
if (!isset($_SESSION['nama'])) {
    header("Location: login.php");
    exit();
}

// Tambah Admin
if (isset($_POST['tambah_admin'])) {
    $nama = $_POST['nama'];
    $email = $_POST['email'];
    $password = $_POST['password'];  // bisa ditambah hashing
    $telepon = $_POST['telepon'];
    $alamat = $_POST['alamat'];

    $query = "INSERT INTO user (nama, email, password, telepon, alamat, id_role) 
              VALUES ('$nama','$email','$password','$telepon','$alamat',2)";
    mysqli_query($conn, $query);
    header("Location: kelola_admin.php");
}

// Hapus Admin
if (isset($_GET['hapus'])) {
    $id = $_GET['hapus'];
    mysqli_query($conn, "DELETE FROM user WHERE id_user='$id'");
    header("Location: kelola_admin.php");
}

// Edit Admin
if (isset($_POST['edit_admin'])) {
    $id = $_POST['id_admin'];
    $nama = $_POST['nama'];
    $email = $_POST['email'];
    $telepon = $_POST['telepon'];
    $alamat = $_POST['alamat'];

    mysqli_query($conn, "UPDATE user SET 
        nama='$nama', email='$email', telepon='$telepon', alamat='$alamat' 
        WHERE id_user='$id'");
    header("Location: kelola_admin.php");
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Kelola Admin – Sewa Dekorasi</title>
    <style>
        body { font-family: Arial, sans-serif; background: #f2f2f2; padding: 20px; }
        .container { width: 90%; max-width: 850px; margin: auto; background: white; padding: 20px;
            border-radius: 10px; box-shadow: 0 4px 10px rgba(0,0,0,0.2); }
        h2 { text-align: center; }
        table { width: 100%; border-collapse: collapse; margin-top: 20px; }
        th, td { padding: 10px; border: 1px solid #ddd; text-align: center; }
        th { background: #f0f0f0; }
        .btn { padding: 8px 15px; text-decoration: none; border-radius: 5px; }
        .btn-tambah { background: #28a745; color: white; }
        .btn-edit { background: #ffc107; color: black; }
        .btn-hapus { background: #dc3545; color: white; }
        .btn-back { background: #6c757d; color: white; }
    </style>
</head>
<body>

<div class="container">
    <h2>Kelola Admin</h2>
    <a href="dashboard_pemilik.php" class="btn btn-back">⬅ Kembali</a>
    <br><br>

    <!-- Form Tambah Admin -->
    <form method="POST">
        <h3>Tambah Admin Baru</h3>
        <input type="text" name="nama" placeholder="Nama" required>
        <input type="email" name="email" placeholder="Email" required>
        <input type="text" name="password" placeholder="Password" required>
        <input type="text" name="telepon" placeholder="Telepon">
        <input type="text" name="alamat" placeholder="Alamat">
        <button type="submit" name="tambah_admin" class="btn btn-tambah">Tambah Admin</button>
    </form>

    <!-- Tampilkan Daftar Admin -->
    <table>
        <tr>
            <th>No</th>
            <th>Nama</th>
            <th>Email</th>
            <th>Telepon</th>
            <th>Alamat</th>
            <th>Aksi</th>
        </tr>

        <?php
        $no = 1;
        $result = mysqli_query($conn, "SELECT * FROM user WHERE id_role = 2");
        while ($row = mysqli_fetch_assoc($result)) {
        ?>
        <tr>
            <td><?= $no++; ?></td>
            <td><?= $row['nama']; ?></td>
            <td><?= $row['email']; ?></td>
            <td><?= $row['telepon']; ?></td>
            <td><?= $row['alamat']; ?></td>
            <td>
                <!-- Tombol Edit -->
                <a href="kelola_admin.php?edit=<?= $row['id_user']; ?>" class="btn btn-edit">Edit</a>
                <!-- Tombol Hapus -->
                <a href="kelola_admin.php?hapus=<?= $row['id_user']; ?>" class="btn btn-hapus"
                   onclick="return confirm('Yakin ingin menghapus admin ini?')">Hapus</a>
            </td>
        </tr>
        <?php } ?>
    </table>

    <!-- Form Edit Admin -->
    <?php
    if (isset($_GET['edit'])) {
        $id = $_GET['edit'];
        $data = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM user WHERE id_user='$id'"));
    ?>
        <hr>
        <h3>Edit Admin</h3>
        <form method="POST">
            <input type="hidden" name="id_admin" value="<?= $data['id_user']; ?>">
            <input type="text" name="nama" value="<?= $data['nama']; ?>" required>
            <input type="email" name="email" value="<?= $data['email']; ?>" required>
            <input type="text" name="telepon" value="<?= $data['telepon']; ?>">
            <input type="text" name="alamat" value="<?= $data['alamat']; ?>">
            <button type="submit" name="edit_admin" class="btn btn-edit">Simpan Perubahan</button>
        </form>
    <?php } ?>

</div>

</body>
</html>
