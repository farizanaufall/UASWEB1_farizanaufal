<?php
session_start();
include "koneksi.php";

if (isset($_SESSION['email'])) {
    header("Location: dashboard.php");
    exit;
}

if (isset($_POST['email']) && isset($_POST['password'])) {

    $email = $_POST['email'];
    $password = $_POST['password'];

    $result = mysqli_query($koneksi, "SELECT * FROM user WHERE email='$email'");

    if ($row = mysqli_fetch_assoc($result)) {

        if ($password == $row['password']) {

            $_SESSION['email'] = $row['email'];
            $_SESSION['nama']     = $row['nama_lengkap'];
            $_SESSION['role']     = $row['role'];

            header("Location: dashboard.php");
            exit;

        } else {
            $error = "Password salah!";
        }

    } else {
        $error = "email tidak ditemukan!";
    }
}
?>


<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - POLGAN MART 2026</title>
    <style>
        /* RESET & GLOBAL */
* {
    box-sizing: border-box;
    margin: 0;
    padding: 0;
    font-family: 'Poppins', sans-serif;
}

body {
    min-height: 100vh;
    background: linear-gradient(135deg, #4c8cf5, #1a57e2);
    display: flex;
    justify-content: center;
    align-items: center;
}

/* LOGIN CARD */
.login-container {
    background: #ffffff;
    width: 100%;
    max-width: 400px;
    padding: 2.5rem 2rem;
    border-radius: 14px;
    box-shadow: 0 12px 30px rgba(0, 0, 0, 0.15);
    text-align: center;
}

/* TITLE */
.login-container h2 {
    color: #1a57e2;
    margin-bottom: 0.5rem;
}

.login-container p {
    color: #666;
    margin-bottom: 1.8rem;
    font-size: 0.95rem;
}

/* FORM */
.input-group {
    margin-bottom: 1.2rem;
    text-align: left;
}

.input-group label {
    display: block;
    margin-bottom: 0.4rem;
    font-size: 0.9rem;
    font-weight: 500;
    color: #333;
}

.input-group input {
    width: 100%;
    padding: 11px 12px;
    border-radius: 8px;
    border: 1px solid #ccc;
    font-size: 0.95rem;
    transition: all 0.3s ease;
}

.input-group input:focus {
    border-color: #1a57e2;
    outline: none;
    box-shadow: 0 0 6px rgba(26, 87, 226, 0.3);
}

/* BUTTON */
.btn {
    width: 100%;
    padding: 11px;
    background: #1a57e2;
    color: #ffffff;
    border: none;
    border-radius: 8px;
    font-size: 1rem;
    cursor: pointer;
    transition: background 0.3s ease;
}

.btn:hover {
    background: #0f3fb0;
}

/* ERROR MESSAGE */
.error-message {
    margin-bottom: 1rem;
    padding: 10px;
    background: #ffe6e6;
    color: #b30000;
    border: 1px solid #ff9999;
    border-radius: 8px;
    font-size: 0.9rem;
    text-align: center;
}

/* FOOTER */
.footer-text {
    margin-top: 1.6rem;
    font-size: 0.8rem;
    color: #777;
}

    </style>
</head>
<body>

    <div class="login-container">
        <h2>POLGAN MART </h2>
        <p>Silakan login untuk melanjutkan</p>

        <?php if (!empty($error)): ?>
            <div class="error-message"><?= $error; ?></div>
        <?php endif; ?>

        <form method="post">
            <div class="input-group">
                <label for="email">email</label>
                <input type="text" name="email" id="email" placeholder="Masukkan username" required>
            </div>

            <div class="input-group">
                <label for="password">Password</label>
                <input type="password" name="password" id="password" placeholder="Masukkan password" required>
            </div>

            <button type="submit" class="btn">Login</button>
        </form>

        <div class="footer-text">
            &copy; <?= date('Y'); ?> POLGAN MART — Sistem Penjualan Sederhana
        </div>
    </div>

</body>
</html>