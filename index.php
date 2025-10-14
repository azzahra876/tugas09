<?php
$dataFile = "data.json";
$data = json_decode(file_get_contents($dataFile), true) ?? [];
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>✨ Data Karyawan ✨</title>
    <style>
        * {
            box-sizing: border-box;
            transition: all 0.3s ease;
        }

        body {
            font-family: 'Poppins', sans-serif;
            background: linear-gradient(135deg, #fce7f3, #f8d7e8);
            margin: 0;
            padding: 0;
            color: #444;
        }

        .container {
            max-width: 950px;
            margin: 60px auto;
            background: rgba(255, 255, 255, 0.8);
            backdrop-filter: blur(10px);
            padding: 35px 40px;
            border-radius: 25px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, .1);
        }

        h2 {
            text-align: center;
            color: #d63384;
            font-size: 2rem;
            margin-bottom: 25px;
            letter-spacing: 1px;
        }

        .btn {
            display: inline-block;
            padding: 12px 18px;
            border: none;
            border-radius: 12px;
            background: linear-gradient(135deg, #d63384, #f06292);
            color: #fff;
            text-decoration: none;
            font-weight: 500;
            font-size: 14px;
            box-shadow: 0 3px 10px rgba(214, 51, 132, 0.3);
        }

        .btn:hover {
            transform: translateY(-2px);
            background: linear-gradient(135deg, #b0266b, #e75480);
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 25px;
            border-radius: 12px;
            overflow: hidden;
        }

        th {
            background: #f8d7e8;
            color: #333;
            font-weight: 600;
            padding: 14px;
        }

        td {
            padding: 14px;
            text-align: center;
            border-bottom: 1px solid #f1f1f1;
        }

        tr:nth-child(even) {
            background: #fffafc;
        }

        tr:hover {
            background: #ffe6f2;
        }

        .aksi a {
            margin: 0 5px;
            padding: 8px 12px;
            border-radius: 8px;
            font-size: 13px;
            text-decoration: none;
            display: inline-block;
            font-weight: 500;
        }

        .ubah {
            background: #6c757d;
            color: white;
        }

        .ubah:hover {
            background: #495057;
        }

        .hapus {
            background: #dc3545;
            color: white;
        }

        .hapus:hover {
            background: #a71d2a;
        }

        .terhapus {
            color: #999;
            font-style: italic;
        }

        .footer {
            text-align: center;
            margin-top: 30px;
            font-size: 13px;
            color: #777;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2> Data Karyawan </h2>
        <a href="tambah.php" class="btn">+ Tambah Data</a>
        <table>
            <tr>
                <th>ID</th>
                <th>Nama Karyawan</th>
                <th>Jabatan</th>
                <th>Status</th>
                <th>Aksi</th>
            </tr>
            <?php if(empty($data)): ?>
                <tr><td colspan="5">Belum ada data</td></tr>
            <?php else: ?>
                <?php foreach($data as $row): ?>
                    <tr>
                        <td><?= htmlspecialchars($row['id']) ?></td>
                        <td><?= htmlspecialchars($row['nama']) ?></td>
                        <td><?= htmlspecialchars($row['jabatan']) ?></td>
                        <td><?= htmlspecialchars($row['status'] ?? "Aktif") ?></td>
                        <td class="aksi">
                            <?php if(($row['status'] ?? "Aktif") == "Aktif"): ?>
                                <a href="ubah.php?id=<?= $row['id'] ?>" class="ubah">Ubah</a>
                                <a href="hapus.php?id=<?= $row['id'] ?>" class="hapus" onclick="return confirm('Yakin hapus data ini?')">Hapus</a>
                            <?php else: ?>
                                <span class="terhapus">(sudah dihapus)</span>
                            <?php endif; ?>
                        </td>
                    </tr>
                <?php endforeach; ?>
            <?php endif; ?>
        </table>
        <div class="footer">© <?= date("Y") ?> Data Karyawan — Elegant Version </div>
    </div>
</body>
</html>