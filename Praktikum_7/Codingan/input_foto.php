<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<title>Upload Foto Produk</title>

<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">

<style>
    body {
        margin: 0;
        padding: 0;
        font-family: Poppins, sans-serif;
        background: linear-gradient(135deg, #fbe8ff, #e4d4ff);
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100vh;
    }

    .card {
        width: 420px;
        background: white;
        padding: 25px;
        border-radius: 20px;
        box-shadow: 0 0 20px rgba(0,0,0,0.15);
        animation: pop 0.5s ease;
    }

    @keyframes pop {
        0% { transform: scale(0.7); opacity: 0; }
        100% { transform: scale(1); opacity: 1; }
    }

    h2 {
        text-align: center;
        color: #7b2cbf;
        margin-bottom: 20px;
    }

    label {
        font-weight: 600;
        display: block;
        margin-bottom: 5px;
        color: #5a189a;
    }

    input {
        width: 100%;
        padding: 10px;
        border-radius: 12px;
        border: 2px solid #d0b3ff;
        outline: none;
        margin-bottom: 15px;
        transition: 0.3s;
    }

    input:focus {
        border-color: #a06cd5;
        transform: scale(1.02);
    }

    .btn {
        width: 100%;
        padding: 12px;
        border: none;
        background: #c77dff;
        color: white;
        font-size: 16px;
        border-radius: 12px;
        cursor: pointer;
        transition: 0.3s;
        font-weight: 600;
    }

    .btn:hover {
        background: #9d4edd;
        transform: scale(1.05);
    }

</style>
</head>
<body>

<div class="card">
    <h2>✨ Upload Foto Produk ✨</h2>

    <form action="proses.php" method="post" enctype="multipart/form-data">

        <label>Nama Produk</label>
        <input type="text" name="nama_produk" required placeholder="Contoh: Tenda Layos 8M">

        <label>Foto Produk</label>
        <input type="file" name="foto_produk" required>

        <button class="btn">Upload Produk</button>
    </form>
</div>
</body>
</html>



