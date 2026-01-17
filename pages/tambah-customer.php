<?php
include '../koneksi.php';

// PROSES SIMPAN DATA
if (isset($_POST['simpan'])) {
    $kode   = $_POST['kode_pelanggan'];
    $nama   = $_POST['nama_pelanggan'];
    $alamat = $_POST['alamat'];
    $no_hp  = $_POST['no_hp'];
    $email  = $_POST['email'];

    $query = mysqli_query($koneksi, "
        INSERT INTO pelanggan 
        (kode_pelanggan, nama_pelanggan, alamat, no_hp, email)
        VALUES 
        ('$kode', '$nama', '$alamat', '$no_hp', '$email')
    ");

    if ($query) {
        header("Location: ../dashboard.php");
        exit;
    } else {
        $error = "Gagal menyimpan data!";
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Tambah Customer</title>
    <style>
        body {
            font-family: Arial;
            background: #f4f6f9;
        }
        .container {
            width: 400px;
            background: white;
            margin: 50px auto;
            padding: 20px;
            border-radius: 6px;
        }
        input, textarea, button {
            width: 100%;
            padding: 8px;
            margin-top: 10px;
        }
        button {
            background: #27ae60;
            color: white;
            border: none;
            cursor: pointer;
            font-weight: bold;
        }
        button:hover {
            background: #219150;
        }
        .btn-back {
            display: block;
            margin-top: 10px;
            text-align: center;
            background: #95a5a6;
            color: white;
            padding: 8px;
            text-decoration: none;
            border-radius: 4px;
        }
        .btn-back:hover {
            background: #7f8c8d;
        }
        .error {
            background: #e74c3c;
            color: white;
            padding: 8px;
            margin-bottom: 10px;
            text-align: center;
            border-radius: 4px;
        }
    </style>
</head>
<body>

<div class="container">
    <h2>Tambah Customer</h2>

    <?php if (!empty($error)) : ?>
        <div class="error"><?= $error; ?></div>
    <?php endif; ?>

    <form method="post">
        <label>Kode Pelanggan</label>
        <input type="text" name="kode_pelanggan" required>

        <label>Nama Pelanggan</label>
        <input type="text" name="nama_pelanggan" required>

        <label>Alamat</label>
        <textarea name="alamat" required></textarea>

        <label>No HP</label>
        <input type="text" name="no_hp" required>

        <label>Email</label>
        <input type="email" name="email">

        <button type="submit" name="simpan">Simpan</button>
    </form>

    <a href="../dashboard.php" class="btn-back">⬅ Kembali ke Dashboard</a>
</div>

</body>
</html>
