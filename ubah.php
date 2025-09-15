<?php
include "koneksi.php";

$id = $_GET['id'];
$sql = "SELECT * FROM karyawan WHERE id_karyawan='$id'";
$query = mysqli_query($koneksi, $sql);
$data = mysqli_fetch_array($query);

if(isset($_POST['update'])){
    $nama = $_POST['nama_karyawan'];
    $jabatan = $_POST['jabatan'];

    $sql = "UPDATE karyawan SET nama_karyawan='$nama', jabatan='$jabatan' WHERE id_karyawan='$id'";
    $query = mysqli_query($koneksi, $sql);

    if($query){
        header("Location: index.php");
    } else {
        echo "Gagal update data";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Ubah Data</title>
</head>
<body>
    <h2>Ubah Data Karyawan</h2>
    <form method="POST">
        <label>Nama Karyawan:</label><br>
        <input type="text" name="nama_karyawan" value="<?php echo $data['nama_karyawan']; ?>" required><br><br>

        <label>Jabatan:</label><br>
        <input type="text" name="jabatan" value="<?php echo $data['jabatan']; ?>" required><br><br>

        <input type="submit" name="update" value="Update">
    </form>
</body>
</html>
