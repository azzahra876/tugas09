<?php
$koneksi = mysqli_connect("localhost", "root", "", "db_xirpl1_9_1");

if (!$koneksi) {
    die("Koneksi gagal: " . mysqli_connect_error());
}
?>
