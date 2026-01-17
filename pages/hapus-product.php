<?php
include '../koneksi.php';

$id = $_GET['id'] ?? '';

if ($id != '') {

    $hapus = mysqli_query($koneksi, "
        DELETE FROM barang 
        WHERE id_barang='$id'
    ");

    if ($hapus) {
        // Setelah hapus, kembali ke dashboard
        header("Location: ../dashboard.php?page=listproducts&status=deleted");
        exit;
    } else {
        echo "Gagal menghapus data: " . mysqli_error($koneksi);
    }

} else {
    echo "ID tidak ditemukan";
}
