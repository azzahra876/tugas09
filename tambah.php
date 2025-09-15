<?php
include "koneksi.php";

if(isset($_POST['simpan'])){
    $nama = $_POST['nama_karyawan'];
    $jabatan = $_POST['jabatan'];

    $sql = "INSERT INTO karyawan (nama_karyawan, jabatan) VALUES ('$nama', '$jabatan')";
    $query = mysqli_query($koneksi, $sql);

    if($query){
        header("Location: index.php");
    } else {
        echo "Gagal tambah data";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Tambah Data Karyawan</title>
</head>
<body>
    <h2>Tambah Data Karyawan</h2>
    <form method="POST">
        <label>Nama Karyawan:</label><br>
        <input type="text" name="nama_karyawan" required><br><br>

        <label>Jabatan:</label><br>
        <input type="text" name="jabatan" required><br><br>

        <input type="submit" name="simpan" value="Simpan">
    </form>
</body>
</html>
