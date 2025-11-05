<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Login | Sewa Dekorasi Acara</title>

<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet">

<style>
    body {
        margin: 0;
        font-family: 'Poppins', sans-serif;
        background: linear-gradient(135deg, #4B0082, #A66DD4);
        height: 100vh;
        display: flex;
        align-items: center;
        justify-content: center;
        color: #3D004D;
    }

    .container {
        background-color: #fff;
        width: 380px;
        border-radius: 16px;
        padding: 40px 35px;
        box-shadow: 0 8px 25px rgba(0,0,0,0.2);
        text-align: center;
    }

    .container h2 {
        margin-bottom: 10px;
        font-weight: 600;
        color: #4B0082;
    }

    .container p {
        color: #7A1FA2;
        margin-bottom: 30px;
        font-size: 14px;
    }

    .form-group {
        text-align: left;
        margin-bottom: 20px;
    }

    .form-group label {
        display: block;
        font-size: 14px;
        margin-bottom: 5px;
        color: #4B0082;
    }

    .form-group input {
        width: 100%;
        padding: 10px;
        border-radius: 8px;
        border: 1px solid #ccc;
        font-size: 14px;
        outline: none;
        transition: 0.3s;
    }

    .form-group input:focus {
        border-color: #A66DD4;
        box-shadow: 0 0 5px rgba(166,109,212,0.5);
    }

    .btn {
        background: #7A1FA2;
        color: white;
        border: none;
        padding: 12px;
        border-radius: 8px;
        width: 100%;
        font-size: 15px;
        cursor: pointer;
        font-weight: 500;
        transition: 0.3s;
    }

    .btn:hover {
        background: #4B0082;
    }

    .footer {
        margin-top: 20px;
        font-size: 13px;
        color: #777;
    }

    .footer a {
        color: #7A1FA2;
        text-decoration: none;
        font-weight: 500;
    }

    .footer a:hover {
        text-decoration: underline;
    }
</style>
</head>
<body>

<div class="container">
    <h2>Login Akun</h2>
    <p>Masuk untuk mengelola data sewa dekorasi acara</p>

    <form action="index.php" method="post">
        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" name="email" id="email" placeholder="Masukkan email..." required>
        </div>

        <div class="form-group">
            <label for="password">Kata Sandi</label>
            <input type="password" name="password" id="password" placeholder="Masukkan kata sandi..." required>
        </div>

        <button type="submit" class="btn">Masuk</button>
    </form>

    <div class="footer">
        Belum punya akun? <a href="register.php">Daftar di sini</a>
    </div>
</div>

</body>
</html>
