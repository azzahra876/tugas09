<?php
include "koneksi.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nama = $_POST['nama'];
    $jabatan = $_POST['jabatan'];

    $query = "INSERT INTO karyawan (nama_karyawan, jabatan) VALUES ('$nama', '$jabatan')";
    $result = mysqli_query($koneksi, $query);

    if ($result) {
        echo "<script>alert('Data berhasil ditambahkan!'); window.location='index.php';</script>";
    } else {
        echo "Gagal menambahkan data: " . mysqli_error($koneksi);
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Tambah Karyawan</title>
</head>
<body>
<div class="container">
    <h2>Tambah Karyawan ✨</h2>
    <form method="post">
        <label>Nama Karyawan:</label>
        <input type="text" name="nama" required>
        <label>Jabatan:</label>
        <input type="text" name="jabatan" required>
        <button class="btn" type="submit">Simpan</button>
    </form>
    <a href="index.php">← Kembali</a>
</div>
</body>
</html>
