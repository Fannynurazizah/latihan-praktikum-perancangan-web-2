<?php
session_start();
require_once __DIR__ . '/../koneksi.php';

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    exit('AKSES TIDAK VALID');
}

if (
    !isset($_SESSION['user']) ||
    (int)$_SESSION['user']['id_role'] !== 1
) {
    exit('AKSES DITOLAK');
}

$emailTujuan = $_SESSION['user']['email'];

$items = db_fetch_all("SELECT * FROM barang ORDER BY id_barang DESC");

/* ===== PDF ===== */
require_once __DIR__ . '/../vendor/tecnickcom/tcpdf/tcpdf.php';

$pdf = new TCPDF();
$pdf->AddPage();

$html = '<h2>Laporan Barang</h2>
<table border="1" cellpadding="5">
<tr><th>ID</th><th>Nama</th><th>Stok</th><th>Harga</th></tr>';

$total = 0;
foreach ($items as $i) {
    $total += (int)$i['stok'];
    $html .= "
    <tr>
        <td>{$i['id_barang']}</td>
        <td>".htmlspecialchars($i['nama_barang'])."</td>
        <td>{$i['stok']}</td>
        <td>Rp ".number_format($i['harga'],0,',','.')."</td>
    </tr>";
}

$html .= "</table><br><b>Total Stok: {$total}</b>";

$pdf->writeHTML($html);

$namaFile = 'laporan_barang_'.date('Ymd_His').'.pdf';
$pathFile = __DIR__ . '/../tmp/' . $namaFile;
$pdf->Output($pathFile, 'F');

/* ===== EMAIL ===== */
require_once __DIR__ . '/../vendor/autoload.php';
use PHPMailer\PHPMailer\PHPMailer;

$mail = new PHPMailer(true);

try {
    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';
    $mail->SMTPAuth = true;
    $mail->Username = 'sewedekorasiacara@gmail.com';
    $mail->Password = 'vjbenwyovlpnfpxw';
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
    $mail->Port = 587;

    $mail->setFrom('sewedekorasiacara@gmail.com', 'Sistem');
    $mail->addAddress('fannynur2005@gmail.com');

    $mail->Subject = 'Laporan Barang';
    $mail->Body = 'Berikut laporan barang dalam bentuk PDF.';
    $mail->addAttachment($pathFile);

    $mail->send();
    unlink($pathFile);

    echo "<script>
        alert('PDF berhasil dikirim ke email!');
        window.location.href='laporan_barang.php';
    </script>";
    exit;

} catch (Exception $e) {
    echo 'Gagal kirim email: '.$mail->ErrorInfo;
}
