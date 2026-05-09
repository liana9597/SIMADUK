<?php
$conn = new mysqli("localhost", "root", "", "simaduk_migrasi");
if ($conn->connect_error) die("Connection failed: " . $conn->connect_error);

$id = intval($_GET['id'] ?? 0);
$berita = $conn->query("SELECT * FROM berita WHERE id = $id")->fetch_assoc();

if (!$berita) {
    header("Location: index.php");
    exit();
}
$conn->close();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?= htmlspecialchars($berita['title']) ?></title>
  <link rel="stylesheet" href="style.css">
  <style>
    .detail-container {
      max-width: 800px;
      margin: 100px auto 40px auto; 
      padding: 20px;
      background: #fff;
      border-radius: 12px;
      box-shadow: 0 4px 12px rgba(0,0,0,0.1);
    }
    .detail-container img {
  width: 100%;
  max-height: none;        /* hapus batas tinggi */
  object-fit: contain;     /* gambar penuh, tidak dipotong */
  border-radius: 10px;
  margin-bottom: 20px;
  background: #f0f0f0;     /* opsional: background abu jika ada sisi kosong */
}
    .detail-container h1 {
      font-size: 26px;
      color: #333;
      margin-bottom: 10px;
    }
    .detail-date {
      font-size: 13px;
      color: #aaa;
      margin-bottom: 20px;
      display: block;
    }
    .detail-container p {
      font-size: 16px;
      color: #555;
      line-height: 1.8;
      text-align: justify;
    }
    .btn-kembali {
      display: inline-block;
      margin-top: 30px;
      padding: 10px 20px;
      background: #4CAF50;
      color: white;
      border-radius: 8px;
      text-decoration: none;
      font-size: 14px;
    }
    .btn-kembali:hover { background: #388E3C; }

  </style>
</head>
<body>

  <header>
    <a href="../halaman_utama/index.php" class="nav-logo">
      <img src="img/logoo.svg" alt="" class="logo" />
    </a>
  </header>

  <div class="detail-container">
    <img src="../upload/<?= htmlspecialchars($berita['file_path']) ?>" alt="Foto Berita">
    <h1><?= htmlspecialchars($berita['title']) ?></h1>
    <span class="detail-date">📅 <?= date("d F Y", strtotime($berita['created_at'])) ?></span>
    <p><?= nl2br(htmlspecialchars($berita['description'])) ?></p>

    <?php
$from = $_GET['from'] ?? 'berita';

if ($from === 'halaman_utama') {
    $urlKembali = '../halaman_utama/index.php#berita';
    $labelKembali = '← Kembali ke Beranda';
} else {
    $urlKembali = 'index.php#berita';
    $labelKembali = '← Kembali ke Berita';
}
?>
<a href="<?= $urlKembali ?>" class="btn-kembali"><?= $labelKembali ?></a>


</body>
</html>