<?php
$dataFile = "data.json";
$data = json_decode(file_get_contents($dataFile), true) ?? [];

$id = $_GET['id'] ?? null;
$found = false;

// cari data & hapus langsung
foreach ($data as $key => $item) {
    if ($item['id'] == $id) {
        unset($data[$key]);
        $found = true;
        break;
    }
}

if ($found) {
    // reindex array agar tidak ada index kosong
    $data = array_values($data);
    file_put_contents($dataFile, json_encode($data, JSON_PRETTY_PRINT));
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<title>Data Dihapus</title>
<style>
    body {
        font-family:'Poppins',sans-serif;
        background:linear-gradient(135deg,#fce7f3,#f8d7e8);
        margin:0;
        padding:0;
        display:flex;
        justify-content:center;
        align-items:center;
        height:100vh;
    }
    .box {
        background:rgba(255,255,255,.85);
        backdrop-filter:blur(10px);
        padding:40px 50px;
        border-radius:20px;
        box-shadow:0 10px 25px rgba(0,0,0,.1);
        text-align:center;
    }
    h2 {color:#d63384;}
    p {color:#555;margin-top:10px;}
    a {
        display:inline-block;
        margin-top:20px;
        padding:10px 18px;
        border-radius:12px;
        background:linear-gradient(135deg,#d63384,#f06292);
        color:white;
        text-decoration:none;
        font-weight:500;
    }
    a:hover {background:linear-gradient(135deg,#b0266b,#e75480);}
</style>
</head>
<body>
<div class="box">
    <?php if ($found): ?>
        <h2>🗑 Data Dihapus</h2>
        <p>Data karyawan berhasil dihapus dari daftar.</p>
    <?php else: ?>
        <h2>⚠ Data Tidak Ditemukan</h2>
        <p>Data yang ingin dihapus tidak tersedia.</p>
    <?php endif; ?>
    <a href="index.php">Kembali ke Data</a>
</div>
</body>
</html>