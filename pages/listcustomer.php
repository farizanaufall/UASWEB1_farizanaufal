<?php
include 'koneksi.php';
$data = mysqli_query($koneksi, "SELECT * FROM pelanggan");
?>

<!DOCTYPE html>
<html>
<head>
    <title>Data Pelanggan</title>
    <style>
        .btn-tambah {
            display: inline-block;
            margin-bottom: 15px;
            padding: 10px 16px;
            background: #27ae60;
            color: white;
            border-radius: 5px;
            font-weight: bold;
            text-decoration: none;
        }
        .btn-tambah:hover {
            background: #219150;
        }
        .btn-aksi {
            display: inline-block;
            padding: 5px 10px;
            margin: 2px;
            border-radius: 3px;
            font-size: 12px;
            font-weight: bold;
            text-decoration: none;
            color: white;
        }
        .btn-edit {
            background: #3498db;
        }
        .btn-edit:hover {
            background: #2980b9;
        }
        .btn-hapus {
            background: #e74c3c;
        }
        .btn-hapus:hover {
            background: #c0392b;
        }
        table {
            border-collapse: collapse;
            width: 100%;
        }
        th, td {
            border: 1px solid #000;
            padding: 8px;
            text-align: center;
        }
    </style>
</head>
<body>

<h2>Data Pelanggan</h2>
<a href="pages/tambah-customer.php" class="btn-tambah">+ Tambah Customer</a>

<table>
    <tr>
        <th>No</th>
        <th>Kode Pelanggan</th>
        <th>Nama</th>
        <th>Alamat</th>
        <th>No HP</th>
        <th>Email</th>
        <th>Aksi</th>
    </tr>

    <?php $no = 1; ?>
    <?php while ($row = mysqli_fetch_assoc($data)) : ?>
    <tr>
        <td><?= $no++; ?></td>
        <td><?= $row['kode_pelanggan']; ?></td>
        <td><?= $row['nama_pelanggan']; ?></td>
        <td><?= $row['alamat']; ?></td>
        <td><?= $row['no_hp']; ?></td>
        <td><?= $row['email']; ?></td>
        <td>
            <a href="pages/edit-customer.php?id=<?= $row['id_pelanggan']; ?>" class="btn-aksi btn-edit">Edit</a>
            <a href="pages/hapus-customer.php?id=<?= $row['id_pelanggan']; ?>"
               class="btn-aksi btn-hapus"
               onclick="return confirm('Yakin ingin menghapus data ini?')">
               Hapus
            </a>
        </td>
    </tr>
    <?php endwhile; ?>
</table>

</body>
</html>
