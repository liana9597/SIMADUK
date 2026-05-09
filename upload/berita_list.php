<?php
$conn = new mysqli("localhost", "root", "", "simaduk_migrasi");
if ($conn->connect_error) die("Connection failed: " . $conn->connect_error);

$result = $conn->query("SELECT * FROM berita ORDER BY created_at DESC");
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Kelola Berita</title>
  <link rel="stylesheet" href="../upload/UploadFile.css" />
  <style>
    .berita-table { width: 100%; border-collapse: collapse; margin-top: 20px; }
    .berita-table th, .berita-table td { padding: 12px 15px; border: 1px solid #ddd; text-align: left; }
    .berita-table th { background-color: #4CAF50; color: white; }
    .berita-table tr:hover { background-color: #f5f5f5; }
    .berita-table img { width: 80px; height: 60px; object-fit: cover; border-radius: 5px; }
    .btn-edit { background: #2196F3; color: white; padding: 6px 12px; border-radius: 5px; text-decoration: none; }
    .btn-hapus { background: #f44336; color: white; padding: 6px 12px; border-radius: 5px; text-decoration: none; }
    .btn-edit:hover { background: #1976D2; }
    .btn-hapus:hover { background: #c62828; }
    .notif-success { background: #d4edda; color: #155724; padding: 10px 15px; border-radius: 5px; margin-bottom: 15px; }
    /* Perbaikan tombol aksi */
.aksi-container {
    display: flex;
    flex-direction: row;
    gap: 8px;
    align-items: center;
    flex-wrap: nowrap;
}

.btn-edit, .btn-hapus {
    display: inline-flex;
    align-items: center;
    gap: 4px;
    padding: 6px 12px;
    border-radius: 5px;
    text-decoration: none;
    font-size: 13px;
    white-space: nowrap;
}

/* Perbaikan kolom tabel biar ga terlalu sempit */
.berita-table td {
    vertical-align: middle;
}

.berita-table td:last-child {
    width: 160px;
    white-space: nowrap;
}
  </style>
</head>
<body>
<div class="container">

  <!-- Navigasi sidebar sama seperti UploadFile.php -->
  <div class="navigation">
    <ul>
      <li>
        <a href="#">
          <span class="icon"><img src="../upload/logo1.png" width="75%" height="85%"></span>
          <span class="title"><img src="../upload/Logo.png" width="85%" height="80%"></span>
        </a>
      </li>
      <li><a href="../beranda/beranda.php"><span class="icon"><ion-icon name="home-outline"></ion-icon></span><span class="title">Home</span></a></li>
      <li class="hovered"><a href="berita_list.php"><span class="icon"><ion-icon name="newspaper-outline"></ion-icon></span><span class="title">Kelola Berita</span></a></li>
      <li><a href="../migrasi/rekapMigrasi.php"><span class="icon"><ion-icon name="folder-outline"></ion-icon></span><span class="title">Rekap Migrasi</span></a></li>
      <li><a href="../halaman_utama/index.php"><span class="icon"><ion-icon name="log-out-outline"></ion-icon></span><span class="title">Keluar</span></a></li>
    </ul>
  </div>

  <div class="main">
    <div class="topbar">
      <div class="toggle"><ion-icon name="menu-outline"></ion-icon></div>
    </div>

    <div class="upload">
      <h1>Kelola Berita</h1>
      <hr class="green-line">
      <span class="action-buttons">
                    <a class="tambah-button" href="UploadFile.php">Upload Berita</a>
                </span>
                

      <?php if (isset($_GET['status']) && $_GET['status'] == 'deleted'): ?>
        <div class="notif-success">✅ Berita berhasil dihapus.</div>
      <?php elseif (isset($_GET['status']) && $_GET['status'] == 'updated'): ?>
        <div class="notif-success">✅ Berita berhasil diperbarui.</div>
      <?php endif; ?>

      <table class="berita-table">
        <thead>
          <tr>
            <th>#</th>
            <th>Foto</th>
            <th>Judul</th>
            <th>Deskripsi</th>
            <th>Tanggal Upload</th>
            <th>Aksi</th>
          </tr>
        </thead>
        <tbody>
          <?php
          $no = 1;
          while ($row = $result->fetch_assoc()):
          ?>
          <tr>
            <td><?= $no++ ?></td>
            <td><img src="../upload/<?= htmlspecialchars($row['file_path']) ?>" alt="foto"></td>
            <td><?= htmlspecialchars($row['title']) ?></td>
            <td><?= htmlspecialchars(mb_substr($row['description'], 0, 80)) ?>...</td>
            <td><?= date("d F Y", strtotime($row['created_at'])) ?></td>
            <td>
  <div class="aksi-container">
    <a href="edit_berita.php?id=<?= $row['id'] ?>" class="btn-edit">✏️ Edit</a>
    <a href="hapus_berita.php?id=<?= $row['id'] ?>" class="btn-hapus"
      onclick="return confirm('Yakin mau hapus berita ini?')">🗑️ Hapus</a>
  </div>
</td>
          </tr>
          <?php endwhile; ?>
        </tbody>
      </table>
    </div>
  </div>
</div>

<script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
<script>
  let toggle = document.querySelector(".toggle");
  let navigation = document.querySelector(".navigation");
  let main = document.querySelector(".main");
  toggle.onclick = function () {
    navigation.classList.toggle("active");
    main.classList.toggle("active");
  };
</script>
</body>
</html>