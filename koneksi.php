<?php


$koneksi = mysqli_connect("localhost","root","","uas_penjualan");

if (!$koneksi) {
    die("Koneksi gagal: " . mysqli_connect_error());
}
?>
