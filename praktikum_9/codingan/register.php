<?php
// register.php
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Register - Sewa Dekorasi</title>

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Segoe UI', sans-serif;
        }

        body {
            height: 100vh;
            background: linear-gradient(135deg, #0f172a, #020617);
            display: flex;
            justify-content: center;
            align-items: center;
            color: #fff;
        }

        .register-container {
            width: 100%;
            max-width: 480px;
        }

        .register-card {
            background: #020617;
            padding: 35px;
            border-radius: 14px;
            box-shadow: 0 20px 40px rgba(0,0,0,0.6);
        }

        .register-card h2 {
            text-align: center;
            margin-bottom: 5px;
        }

        .register-card p {
            text-align: center;
            font-size: 14px;
            color: #9ca3af;
            margin-bottom: 25px;
        }

        .input-group {
            margin-bottom: 15px;
        }

        .input-group input {
            width: 100%;
            padding: 12px 14px;
            background: #020617;
            border: 1px solid #1f2933;
            border-radius: 8px;
            color: #fff;
            outline: none;
        }

        .input-group input::placeholder {
            color: #9ca3af;
        }

        .input-group input:focus {
            border-color: #22c55e;
        }

        .btn-register {
            width: 100%;
            padding: 12px;
            border: none;
            border-radius: 8px;
            background: #22c55e;
            color: #020617;
            font-weight: bold;
            cursor: pointer;
            margin-top: 10px;
            transition: 0.3s;
        }

        .btn-register:hover {
            background: #16a34a;
        }

        .footer-text {
            text-align: center;
            margin-top: 20px;
            font-size: 14px;
        }

        .footer-text a {
            color: #22c55e;
            text-decoration: none;
        }

        .footer-text a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>

<div class="register-container">
    <div class="register-card">
        <h2>Register</h2>
        <p>Daftar Akun Sewa Dekorasi</p>

        <form action="proses_register.php" method="post">
            <div class="input-group">
                <input type="text" name="nama" placeholder="Nama Lengkap" required>
            </div>

            <div class="input-group">
                <input type="email" name="email" placeholder="Email" required>
            </div>

            <div class="input-group">
                <input type="text" name="telepon" placeholder="No Telepon" required>
            </div>

            <div class="input-group">
                <input type="text" name="alamat" placeholder="Alamat" required>
            </div>

            <div class="input-group">
                <input type="password" name="password" placeholder="Password" required>
            </div>

            <button type="submit" class="btn-register">Daftar</button>
        </form>

        <div class="footer-text">
            Sudah punya akun? <a href="login.php">Login</a>
        </div>
    </div>
</div>

</body>
</html>
