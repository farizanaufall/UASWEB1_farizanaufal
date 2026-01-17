<?php
include 'koneksi.php';
?>

<!DOCTYPE html>
<html>
<head>
    <title>Data Barang</title>
    <style>
                body {
            font-family: Arial, sans-serif;
            background: #f4f6f9;
            margin: 0;
        }

        .container {
            padding: 20px;
        }

        h2 {
            margin-bottom: 15px;
        }

        /* Tombol tambah */
        .btn-tambah {
            display: inline-block;
            margin-bottom: 15px;
            padding: 10px 16px;
            background: #27ae60;
            color: white;
            border-radius: 5px;
            font-weight: bold;
            transition: 0.3s;
        }

        .btn-tambah:hover {
            background: #219150;
        }

        /* Tombol aksi (Edit dan Hapus) */
        .btn-aksi {
            display: inline-block;
            padding: 5px 10px;
            margin: 2px;
            border-radius: 3px;
            font-size: 12px;
            font-weight: bold;
            text-decoration: none;
            transition: 0.3s;
        }

        .btn-edit {
            background: #3498db;
            color: white;
        }

        .btn-edit:hover {
            background: #2980b9;
        }

        .btn-hapus {
            background: #e74c3c;
            color: white;
        }

        .btn-hapus:hover {
            background: #c0392b;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            background: white;
        }

        th, td {
            border: 1px solid #ddd;
            padding: 10px;
            text-align: center;
        }

        th {
            background: #2c3e50;
            color: white;
        }

        tr:nth-child(even) {
            background: #f2f2f2;
        }

        tr:hover {
            background: #eaeaea;
        }

        a {
            text-decoration: none;
        }
    </style>
</head>
<body>
<h3>List Product</h3>
    <a href="pages/tambah-product.php" class="btn-tambah">+ Tambah Produk</a>

<table>
    <tr>
        <th>Kode Barang</th>
        <th>Nama Barang</th>
        <th>Kategori</th>
        <th>Harga</th>
        <th>Stok</th>
        <th>Satuan</th>
        <th>Aksi</th> <!-- Kolom baru untuk aksi -->
    </tr>

<?php
$query = mysqli_query($koneksi, "SELECT * FROM barang");

while ($data = mysqli_fetch_assoc($query)) {
    echo "<tr>";
    echo "<td>".$data['kode_barang']."</td>";
    echo "<td>".$data['nama_barang']."</td>";
    echo "<td>".$data['kategori']."</td>";
    echo "<td>".$data['harga']."</td>";
    echo "<td>".$data['stok']."</td>";
    echo "<td>".$data['satuan']."</td>";
    echo "<td>";
    echo "<a href='pages/edit-product.php?id=".$data['id_barang']."' class='btn-edit'>Edit</a> ";
    echo "<a href='pages/hapus-product.php?id=".$data['id_barang']."' class='btn-hapus' onclick='return confirm(\"Yakin ingin menghapus produk ini?\")'>Hapus</a>";
    echo "</td>";
    echo "</tr>";
}
?>

</table>

</body>
</html>