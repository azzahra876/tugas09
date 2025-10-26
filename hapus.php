<?php
include "koneksi.php";

$id = $_GET['id'];
$query = "DELETE FROM karyawan WHERE id_karyawan = $id";
$result = mysqli_query($koneksi, $query);

if ($result) {
    echo "<script>alert('Data berhasil dihapus!'); window.location='index.php';</script>";
} else {
    echo "Gagal menghapus data: " . mysqli_error($koneksi);
}
?>
