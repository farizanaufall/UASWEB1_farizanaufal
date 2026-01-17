<?php
include '../koneksi.php';

$id = $_GET['id'] ?? '';

// PROSES UPDATE
if (isset($_POST['update'])) {

    $kode   = $_POST['kode_pelanggan'];
    $nama   = $_POST['nama_pelanggan'];
    $alamat = $_POST['alamat'];
    $no_hp  = $_POST['no_hp'];
    $email  = $_POST['email'];

    $update = mysqli_query($koneksi, "
        UPDATE pelanggan SET
            kode_pelanggan='$kode',
            nama_pelanggan='$nama',
            alamat='$alamat',
            no_hp='$no_hp',
            email='$email'
        WHERE id_pelanggan='$id'
    ");

    if ($update) {
        header("Location: ../dashboard.php?page=listcustomers&status=updated");
        exit;
    } else {
        echo "Gagal update data: " . mysqli_error($koneksi);
    }
}

// AMBIL DATA LAMA
$data = mysqli_fetch_assoc(
    mysqli_query($koneksi, "SELECT * FROM pelanggan WHERE id_pelanggan='$id'")
);
?>

<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<title>Edit Customer</title>

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

input, textarea {
    width: 100%;
    padding: 10px;
}

textarea {
    resize: vertical;
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
    <h3>Edit Customer</h3>

    <form method="post">
        <div class="form-group">
            <label>Kode Pelanggan</label>
            <input type="text" name="kode_pelanggan" value="<?= $data['kode_pelanggan']; ?>" required>
        </div>

        <div class="form-group">
            <label>Nama Pelanggan</label>
            <input type="text" name="nama_pelanggan" value="<?= $data['nama_pelanggan']; ?>" required>
        </div>

        <div class="form-group">
            <label>Alamat</label>
            <textarea name="alamat" required><?= $data['alamat']; ?></textarea>
        </div>

        <div class="form-group">
            <label>No HP</label>
            <input type="text" name="no_hp" value="<?= $data['no_hp']; ?>" required>
        </div>

        <div class="form-group">
            <label>Email</label>
            <input type="email" name="email" value="<?= $data['email']; ?>">
        </div>

        <button type="submit" name="update" class="btn-edit">
            Update
        </button>

        <a href="../dashboard.php?page=listcustomers" class="btn-back">
            ⬅ Kembali
        </a>
    </form>
</div>

</body>
</html>
