<?php
session_start();
require_once __DIR__.'/../koneksi.php';
if (!isset($_SESSION['user']) || (int)$_SESSION['user']['id_role'] !== 2) {
  header('Location: ../login.php');
  exit;
}

$alert = '';
$UPLOAD_DIR = __DIR__.'/../assets/upload/';
if(!is_dir($UPLOAD_DIR)) { @mkdir($UPLOAD_DIR,0777,true); }
$ALLOWED_EXT = ['jpg','jpeg','png','webp'];
function find_barang_photo(int $id){
  global $ALLOWED_EXT;
  foreach($ALLOWED_EXT as $ext){
    $rel = 'assets/upload/barang_'.$id.'.'.$ext;
    if(file_exists(__DIR__.'/../'.$rel)) return $rel;
  }
  return null;
}
// Tambah barang
if ($_SERVER['REQUEST_METHOD'] === 'POST' && ($_POST['action'] ?? '') === 'add') {
  $nama = trim($_POST['nama_barang'] ?? '');
  $stok = (int)($_POST['stok'] ?? 0);
  $harga = (float)($_POST['harga'] ?? 0);
  $ket = trim($_POST['keterangan'] ?? '');
  if ($nama === '' || $stok < 0 || $harga < 0) {
    $alert = 'Data tidak valid.';
  } else {
    db_execute('INSERT INTO barang (nama_barang, stok, harga, keterangan) VALUES (?,?,?,?)', [$nama, $stok, $harga, $ket]);
    $id = (int)db_last_insert_id();
    if(isset($_FILES['foto']) && $_FILES['foto']['error']===UPLOAD_ERR_OK){
      $ext = strtolower(pathinfo($_FILES['foto']['name'], PATHINFO_EXTENSION));
      if(in_array($ext,$ALLOWED_EXT)){
        $target = $UPLOAD_DIR.'barang_'.$id.'.'.$ext;
        @move_uploaded_file($_FILES['foto']['tmp_name'],$target);
      }
    }
    $alert = 'Barang berhasil ditambahkan.';
  }
}
// Edit barang (update)
if ($_SERVER['REQUEST_METHOD'] === 'POST' && ($_POST['action'] ?? '') === 'edit') {
  $id = (int)($_POST['id_barang'] ?? 0);
  $nama = trim($_POST['nama_barang'] ?? '');
  $stok = (int)($_POST['stok'] ?? 0);
  $harga = (float)($_POST['harga'] ?? 0);
  $ket = trim($_POST['keterangan'] ?? '');
  if ($id<=0 || $nama === '' || $stok < 0 || $harga < 0) {
    $alert = 'Data edit tidak valid.';
  } else {
    db_execute('UPDATE barang SET nama_barang=?, stok=?, harga=?, keterangan=? WHERE id_barang=?', [$nama, $stok, $harga, $ket, $id]);
    // Ganti foto jika diunggah
    if(isset($_FILES['foto']) && $_FILES['foto']['error']===UPLOAD_ERR_OK){
      $ext = strtolower(pathinfo($_FILES['foto']['name'], PATHINFO_EXTENSION));
      if(in_array($ext,$ALLOWED_EXT)){
        // hapus foto lama (semua ekstensi) lalu simpan baru
        foreach($ALLOWED_EXT as $e){
          $old = $UPLOAD_DIR.'barang_'.$id.'.'.$e; if(file_exists($old)) @unlink($old);
        }
        $target = $UPLOAD_DIR.'barang_'.$id.'.'.$ext;
        @move_uploaded_file($_FILES['foto']['tmp_name'],$target);
      }
    }
    $alert = 'Barang berhasil diperbarui.';
  }
}
// Hapus barang
if (isset($_GET['delete'])) {
  $id = (int)$_GET['delete'];
  foreach($ALLOWED_EXT as $ext){
    $path = $UPLOAD_DIR.'barang_'.$id.'.'.$ext;
    if(file_exists($path)) @unlink($path);
  }
  db_execute('DELETE FROM barang WHERE id_barang = ?', [$id]);
  header('Location: kelola_barang.php');
  exit;
}

require_once __DIR__.'/pagination.php';
$pg = paginate('SELECT COUNT(*) AS c FROM barang', [], 5);
$items = db_fetch_all('SELECT * FROM barang ORDER BY id_barang DESC LIMIT ?, ?', [(int)$pg['start'], (int)$pg['per_page']]);
$edit_item = null;
if (isset($_GET['edit'])) {
  $eid = (int)$_GET['edit'];
  $edit_item = db_fetch_one('SELECT * FROM barang WHERE id_barang=?', [$eid]);
}
?>
<!doctype html>
<html lang="id">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Kelola Barang</title>
  <link rel="stylesheet" href="../style.css" />
</head>
<body>
  <?php include __DIR__.'/header.php'; ?>
  <div class="layout">
    <?php include __DIR__.'/sidebar.php'; ?>
    <main class="container">
      <h2>Kelola Barang</h2>
      <?php if ($alert): ?><div class="alert success"><?php echo htmlspecialchars($alert); ?></div><?php endif; ?>
      <div>
        <?php if($edit_item){ ?>
        <div class="card reveal" id="form-edit" style="margin-bottom:16px;">
          <div style="display:flex;justify-content:space-between;align-items:center;">
            <h3>Edit Barang</h3>
            <a class="btn outline" href="kelola_barang.php">Kembali ke Daftar</a>
          </div>
          <p class="muted">Form edit kini tersedia di halaman terpisah.<br />
            <a class="btn" href="barang_form.php?action=edit&id=<?php echo (int)$edit_item['id_barang']; ?>">Buka Form Edit</a>
          </p>
        </div>
        <?php } ?>
        <div class="card wide reveal">
          <div style="display:flex;justify-content:space-between;align-items:center;">
            <h3>Daftar Barang</h3>
            <a class="btn" href="barang_form.php?action=add">Tambah Barang</a>
          </div>
          <div style="overflow-x:auto;">
              <table style="width:100%;min-width:1100px;border-collapse:collapse;table-layout:auto;word-break:break-word;">
                <thead>
                  <style>
                   .thumb {
                      width: 120px;        /* ukuran kotak (boleh ubah jadi 100px, 150px, dll) */
                      height: 120px;       /* sama dengan width agar 1:1 */
                      object-fit: cover;   /* menjaga foto tetap jelas dan tidak gepeng */
                      border-radius: 6px;
                      border: 1px solid #ccc;
                    }
                    .thumb.placeholder {
                      background: #eee;
                    }

                  </style>
                <tr style="text-align:left;border-bottom:1px solid #1f2937;">
                  <th>No</th><th>Foto</th><th>ID</th><th>Nama</th><th>Stok</th><th>Harga</th><th>Keterangan</th><th>Aksi</th>
                </tr>
              </thead>
              <tbody>
                <?php $no=(int)$pg['start']+1; foreach ($items as $it): $foto=find_barang_photo((int)$it['id_barang']); ?>
                  <tr style="border-bottom:1px solid #1f2937;">
                    <td><?php echo $no++; ?></td>
                    <td><?php if($foto){?><img class="thumb" src="../<?php echo $foto; ?>" alt="Foto Barang" /><?php } else { ?><div class="thumb placeholder"></div><?php } ?></td>
                    <td><?php echo (int)$it['id_barang']; ?></td>
                    <td><?php echo htmlspecialchars($it['nama_barang']); ?></td>
                    <td><?php echo (int)$it['stok']; ?></td>
                    <td>Rp <?php echo number_format((float)$it['harga'],0,',','.'); ?></td>
                    <td><?php echo htmlspecialchars($it['keterangan'] ?? ''); ?></td>
                    <td style="display:flex;gap:6px;flex-wrap:wrap;">
                      <a class="btn" href="barang_form.php?action=edit&id=<?php echo (int)$it['id_barang']; ?>">Edit</a>
                      <a class="btn outline" href="?delete=<?php echo (int)$it['id_barang']; ?>" onclick="return confirm('Yakin ingin menghapus barang ini?');">Hapus</a>
                    </td>
                  </tr>
                <?php endforeach; ?>
                <?php if (!$items): ?>
                  <tr><td colspan="8" class="muted">Belum ada barang.</td></tr>
                <?php endif; ?>
              </tbody>
            </table>
            <div class="actions" style="margin-top:12px;display:flex;gap:8px;flex-wrap:wrap">
              <?php echo pagination_links('kelola_barang.php?', (int)$pg['page'], (int)$pg['total_page']); ?>
            </div>
          </div>
        </div>
      </main>
    </div>
    <script src="../script.js"></script>
</body>
</html>
