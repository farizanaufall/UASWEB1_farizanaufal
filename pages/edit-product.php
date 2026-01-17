<?php
include '../koneksi.php';

$id = $_GET['id'] ?? '';

// PROSES UPDATE
if (isset($_POST['update'])) {

    $kode     = $_POST['kode_barang'];
    $nama     = $_POST['nama_barang'];
    $kategori = $_POST['kategori'];
    $harga    = $_POST['harga'];
    $stok     = $_POST['stok'];
    $satuan   = $_POST['satuan'];

    $update = mysqli_query($koneksi, "
        UPDATE barang SET
            kode_barang='$kode',
            nama_barang='$nama',
            kategori='$kategori',
            harga='$harga',
            stok='$stok',
            satuan='$satuan'
        WHERE id_barang='$id'
    ");

    if ($update) {
        header("Location: ../dashboard.php?page=listproducts&status=updated");
        exit;
    } else {
        echo "Gagal update data: " . mysqli_error($koneksi);
    }
}

// AMBIL DATA LAMA
$data = mysqli_fetch_assoc(
    mysqli_query($koneksi, "SELECT * FROM barang WHERE id_barang='$id'")
);
?>

<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<title>Edit Produk</title>

<style>
.card {
    background: #fff;
    padding: 30px;
    border-radius: 10px;
    max-width: 720px;
    box-shadow: 0 6px 18px rgba(0,0,0,.08);
}

.form-group {
    margin-bottom: 16px;
}

label {
    font-weight: bold;
    display: block;
    margin-bottom: 6px;
}

input {
    width: 100%;
    padding: 10px;
}

.btn-edit {
    background: #2980b9;
    color: #fff;
    padding: 10px 16px;
    border: none;
    cursor: pointer;
}

.btn-back {
    background: #7f8c8d;
    color: #fff;
    padding: 10px 16px;
    text-decoration: none;
    margin-left: 10px;
}
</style>
</head>

<body>

<div class="card">
    <h3>Edit Produk</h3>

    <form method="post">
        <div class="form-group">
            <label>Kode Barang</label>
            <input type="text" name="kode_barang" value="<?= $data['kode_barang']; ?>" required>
        </div>

        <div class="form-group">
            <label>Nama Barang</label>
            <input type="text" name="nama_barang" value="<?= $data['nama_barang']; ?>" required>
        </div>

        <div class="form-group">
            <label>Kategori</label>
            <input type="text" name="kategori" value="<?= $data['kategori']; ?>" required>
        </div>

        <div class="form-group">
            <label>Harga</label>
            <input type="number" name="harga" value="<?= $data['harga']; ?>" required>
        </div>

        <div class="form-group">
            <label>Stok</label>
            <input type="number" name="stok" value="<?= $data['stok']; ?>" required>
        </div>

        <div class="form-group">
            <label>Satuan</label>
            <input type="text" name="satuan" value="<?= $data['satuan']; ?>" required>
        </div>

        <button type="submit" name="update" class="btn-edit">
            Update
        </button>

        <a href="../dashboard.php?page=listproducts" class="btn-back">
            ⬅ Kembali
        </a>
    </form>
</div>

</body>
</html>
