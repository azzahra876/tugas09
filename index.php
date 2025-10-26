<?php
include "koneksi.php";
$result = mysqli_query($koneksi, "SELECT * FROM karyawan");
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>✨ Data Karyawan ✨</title>
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background: linear-gradient(135deg, #fce7f3, #f8d7e8);
            margin: 0;
            padding: 0;
        }
        .container {
            max-width: 900px;
            margin: 50px auto;
            background: white;
            border-radius: 20px;
            padding: 30px;
            box-shadow: 0 8px 20px rgba(0,0,0,0.1);
        }
        h2 {
            text-align: center;
            color: #d63384;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        th, td {
            border: 1px solid #eee;
            padding: 10px;
            text-align: center;
        }
        th {
            background: #f8d7e8;
        }
        tr:nth-child(even) {
            background: #fffafc;
        }
        a.btn {
            display: inline-block;
            margin-bottom: 15px;
            background: linear-gradient(135deg, #d63384, #f06292);
            color: white;
            padding: 10px 15px;
            text-decoration: none;
            border-radius: 10px;
        }
        .ubah {
            background: #6c757d;
            color: #fff;
            padding: 5px 8px;
            border-radius: 5px;
        }
        .hapus {
            background: #dc3545;
            color: #fff;
            padding: 5px 8px;
            border-radius: 5px;
        }
    </style>
</head>
<body>
<div class="container">
    <h2>Data Karyawan</h2>
    <a href="tambah.php" class="btn">+ Tambah Karyawan</a>
    <table>
        <tr>
            <th>ID</th>
            <th>Nama</th>
            <th>Jabatan</th>
            <th>Aksi</th>
        </tr>
        <?php while($row = mysqli_fetch_assoc($result)) { ?>
        <tr>
            <td><?= $row['id_karyawan'] ?></td>
            <td><?= $row['nama_karyawan'] ?></td>
            <td><?= $row['jabatan'] ?></td>
            <td>
                <a href="ubah.php?id=<?= $row['id_karyawan'] ?>" class="ubah">Ubah</a>
                <a href="hapus.php?id=<?= $row['id_karyawan'] ?>" class="hapus" onclick="return confirm('Yakin hapus data ini?')">Hapus</a>
            </td>
        </tr>
        <?php } ?>
    </table>
</div>
</body>
</html>
