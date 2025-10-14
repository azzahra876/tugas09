<?php
$dataFile = "data.json";
$data = json_decode(file_get_contents($dataFile), true) ?? [];

$id = $_GET['id'] ?? null;
$found = null;

foreach ($data as $key => $item) {
    if ($item['id'] == $id) {
        $found = &$data[$key];
        break;
    }
}

if (!$found) {
    echo "<p style='text-align:center;margin-top:50px;'>Data tidak ditemukan.</p>";
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $found['nama'] = $_POST['nama'];
    $found['jabatan'] = $_POST['jabatan'];
    file_put_contents($dataFile, json_encode($data, JSON_PRETTY_PRINT));
    header("Location: index.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<title>Ubah Karyawan</title>
<style>
    body {font-family:'Poppins',sans-serif;background:linear-gradient(135deg,#fce7f3,#f8d7e8);margin:0;padding:0;}
    .container {max-width:500px;margin:70px auto;background:rgba(255,255,255,.85);backdrop-filter:blur(10px);padding:30px;border-radius:20px;box-shadow:0 10px 25px rgba(0,0,0,.1);}
    h2 {text-align:center;color:#d63384;}
    label {display:block;margin-top:15px;font-weight:500;color:#555;}
    input {width:100%;padding:10px;margin-top:5px;border:1px solid #ddd;border-radius:10px;font-size:14px;}
    .btn {margin-top:20px;padding:10px 20px;border:none;border-radius:12px;background:linear-gradient(135deg,#6c757d,#adb5bd);color:#fff;font-weight:500;width:100%;cursor:pointer;}
    .btn:hover {background:linear-gradient(135deg,#495057,#868e96);}
    a {display:block;text-align:center;margin-top:15px;color:#d63384;text-decoration:none;}
</style>
</head>
<body>
<div class="container">
    <h2>Ubah Data ✏</h2>
    <form method="post">
        <label>Nama Karyawan:</label>
        <input type="text" name="nama" value="<?= htmlspecialchars($found['nama']) ?>" required>
        <label>Jabatan:</label>
        <input type="text" name="jabatan" value="<?= htmlspecialchars($found['jabatan']) ?>" required>
        <button class="btn" type="submit">Perbarui</button>
    </form>
    <a href="index.php">← Kembali</a>
</div>
</body>
</html>