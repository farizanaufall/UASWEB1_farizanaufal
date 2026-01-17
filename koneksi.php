<?php
$host = "localhost";
$user = "root";
$pass = ""; // default XAMPP kosong
$db   = "uas_penjualan";

$koneksi = mysqli_connect($host, $user, $pass, $db);

if (!$koneksi) {
    die("Koneksi gagal: " . mysqli_connect_error());
}
?>
