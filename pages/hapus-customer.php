<?php
include '../koneksi.php';

$id = $_GET['id'] ?? '';

if ($id == '') {
    echo "ID pelanggan tidak ditemukan";
    exit;
}

// PROSES HAPUS
$hapus = mysqli_query(
    $koneksi,
    "DELETE FROM pelanggan WHERE id_pelanggan='$id'"
);

if ($hapus) {
    header("Location: ../dashboard.php?page=listcustomers&status=deleted");
    exit;
} else {
    echo "Gagal menghapus data: " . mysqli_error($koneksi);
}
