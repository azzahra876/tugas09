<?php
include "koneksi.php";

$id = $_GET['id'];
$result = mysqli_query($koneksi, "SELECT * FROM karyawan WHERE id_karyawan = $id");
$data = mysqli_fetch_assoc($result);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nama = $_POST['nama'];
    $jabatan = $_POST['jabatan'];

    $query = "UPDATE karyawan SET nama_karyawan='$nama', jabatan='$jabatan' WHERE id_karyawan=$id";
    $update = mysqli_query($koneksi, $query);

    if ($update) {
        echo "<script>alert('Data berhasil diubah!'); window.location='index.php';</script>";
    } else {
        echo "Gagal mengubah data: " . mysqli_error($koneksi);
    }
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Ubah Data Karyawan</title>
</head>
<body>
<div class="container">
    <h2>Ubah Data Karyawan</h2>
    <form method="post">
        <label>Nama Karyawan:</label>
        <input type="text" name="nama" value="<?= $data['nama_karyawan'] ?>" required>
        <label>Jabatan:</label>
        <input type="text" name="jabatan" value="<?= $data['jabatan'] ?>" required>
        <button class="btn" type="submit">Simpan Perubahan</button>
    </form>
    <a href="index.php">← Kembali</a>
</div>
</body>
</html>
