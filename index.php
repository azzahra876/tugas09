<?php
include "koneksi.php";
?>

<!DOCTYPE html>
<html>
<head>
    <title>Data Karyawan</title>
</head>
<body>
    <h2>Data Karyawan</h2>
    <a href="tambah.php">+ Tambah Data</a>
    <br><br>
    <table border="1" cellpadding="8">
        <tr>
            <th>ID</th>
            <th>Nama Karyawan</th>
            <th>Jabatan</th>
            <th>Aksi</th>
        </tr>
        <?php
        $sql = "SELECT * FROM karyawan";
        $query = mysqli_query($koneksi, $sql);

        while($data = mysqli_fetch_array($query)){
            echo "<tr>";
            echo "<td>".$data['id_karyawan']."</td>";
            echo "<td>".$data['nama_karyawan']."</td>";
            echo "<td>".$data['jabatan']."</td>";
            echo "<td>
                    <a href='ubah.php?id=".$data['id_karyawan']."'>Ubah</a> | 
                    <a href='hapus.php?id=".$data['id_karyawan']."' onclick='return confirm(\"Yakin hapus?\")'>Hapus</a>
                 </td>";
            echo "</tr>";
        }
        ?>
    </table>
</body>
</html>
