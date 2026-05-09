<?php
$conn = new mysqli("localhost", "root", "", "simaduk_migrasi");
if ($conn->connect_error) die("Connection failed: " . $conn->connect_error);

$id = intval($_GET['id'] ?? 0);

// Proses simpan kalau ada POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $title = $conn->real_escape_string($_POST['title']);
  $description = $conn->real_escape_string($_POST['description']);
  $id_post = intval($_POST['id']);

  // Cek kalau ada foto baru diupload
  if (!empty($_FILES['file']['name'])) {
    $ext = pathinfo($_FILES['file']['name'], PATHINFO_EXTENSION);
    $newFileName = "berita_" . time() . "." . $ext;
    $uploadDir = "../upload/";
    move_uploaded_file($_FILES['file']['tmp_name'], $uploadDir . $newFileName);

    // Hapus foto lama
    $old = $conn->query("SELECT file_path FROM berita WHERE id = $id_post")->fetch_assoc();
    if (file_exists($uploadDir . $old['file_path'])) unlink($uploadDir . $old['file_path']);

    $conn->query("UPDATE berita SET title='$title', description='$description', file_path='$newFileName' WHERE id=$id_post");
  } else {
    $conn->query("UPDATE berita SET title='$title', description='$description' WHERE id=$id_post");
  }

  $conn->close();
  header("Location: berita_list.php?status=updated");
  exit();
}

// Ambil data berita yang mau diedit
$berita = $conn->query("SELECT * FROM berita WHERE id = $id")->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Edit Berita</title>
  <link rel="stylesheet" href="../upload/UploadFile.css" />
  <style>
    .preview-img { width: 200px; height: 150px; object-fit: cover; border-radius: 8px; margin-bottom: 10px; }
  </style>
</head>
<body>
<div class="container">
  <div class="navigation">
    <ul>
      <li><a href="#"><span class="icon"><img src="../upload/logo1.png" width="75%" height="85%"></span><span class="title"><img src="../upload/Logo.png" width="85%" height="80%"></span></a></li>
      <li><a href="../beranda/beranda.php"><span class="icon"><ion-icon name="home-outline"></ion-icon></span><span class="title">Home</span></a></li>
      <li><a href="../upload/UploadFile.php"><span class="icon"><ion-icon name="add-circle-outline"></ion-icon></span><span class="title">Upload Berita</span></a></li>
      <li class="hovered"><a href="berita_list.php"><span class="icon"><ion-icon name="newspaper-outline"></ion-icon></span><span class="title">Kelola Berita</span></a></li>
      <li><a href="../migrasi/formMigrasi.php"><span class="icon"><ion-icon name="documents-outline"></ion-icon></span><span class="title">Data Migrasi</span></a></li>
      <li><a href="../migrasi/rekapMigrasi.php"><span class="icon"><ion-icon name="folder-outline"></ion-icon></span><span class="title">Rekap Migrasi</span></a></li>
      <li><a href="../halaman_utama/index.php"><span class="icon"><ion-icon name="log-out-outline"></ion-icon></span><span class="title">Keluar</span></a></li>
    </ul>
  </div>

  <div class="main">
    <div class="topbar">
      <div class="toggle"><ion-icon name="menu-outline"></ion-icon></div>
    </div>

    <div class="upload">
      <h1>Edit Berita</h1>
      <hr class="green-line">

      <form action="edit_berita.php" method="POST" enctype="multipart/form-data">
        <input type="hidden" name="id" value="<?= $berita['id'] ?>">

        <div class="upload-container">
          <div class="kotak" id="uploadBox" onclick="document.getElementById('fileInput').click()">
            <img src="../upload/<?= htmlspecialchars($berita['file_path']) ?>"
                 alt="foto berita" class="preview-img" id="previewImg">
            <h2><span class="teks1">Ganti</span> <span class="teks2">foto</span></h2>
            <input type="file" name="file" id="fileInput" accept="image/*" style="display:none;" />
          </div>

          <div class="teks-samping">
            <h3>Edit Berita</h3>
            <hr class="green-line-option">
            <div class="kotak-samping">
              <h4>Title*</h4>
              <input type="text" name="title" class="kotak-title"
                     value="<?= htmlspecialchars($berita['title']) ?>" required>
            </div>
            <div class="kotak-samping">
              <h4>Description*</h4>
              <textarea name="description" class="kotak-description" required><?= htmlspecialchars($berita['description']) ?></textarea>
            </div>
            <button type="submit" class="button">Simpan Perubahan</button>
            <a href="berita_list.php" style="display:block; margin-top:10px; color:#888;">← Batal</a>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>

<script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
<script>
  // Preview foto baru sebelum disimpan
  document.getElementById('fileInput').addEventListener('change', function () {
    const file = this.files[0];
    if (file) {
      document.getElementById('previewImg').src = URL.createObjectURL(file);
    }
  });

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