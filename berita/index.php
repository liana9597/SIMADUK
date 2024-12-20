<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Berita Dari Desa</title>
  <link rel="stylesheet" href="style.css">
</head>

<body>

  <header>
    <header>
      <a href="#" class="nav-logo"><img src="img/logoo.svg" alt="" class="logo" /></a>
      <div class="gp">
        <ul>
          <li class="dropdown">
            
            <ul class="dropdown-content">
              <li><a href="#">Beranda</a></li>
              <li><a href="#">Tentang Desa</a></li>
              <li><a href="#">Struktur Desa</a></li>
              <li><a href="#">Berita Desa</a></li>
              <li><a href="#">Tata Letak Desa</a></li>
            </ul>
          </li>
        </ul>
        <div class="search">
          <span class="icon">
            <ion-icon name="search-outline" class="searchBtn"></ion-icon>
            <ion-icon name="close-outline" class="closeBtn"></ion-icon>
          </span>
        </div>
        <div class="searchBox">
          <input type="text" placeholder="cari disini.." />
        </div>
      </div>
    </header>
  </header>

  <section class="home">
    <div class="content">
      <img src="img/download 3.png" alt="">
    </div>
  </section>

  <!-- Main Section -->
  <div class="container">
    <!-- Kotak Pencarian -->
    <div class="search-bar">
      <input type="text" placeholder="Pencarian Berita">
      <button><i class="fa fa-search"></i></button>
    </div>

    <!-- Row: Berita dan Catatan Aspirasi -->
    <div class="content-row">
      <!-- Bagian Berita -->
      <section class="news-section">
        <div class="code">
          <a href="#">
            <h1>Berita</h1>
          </a>
        </div>
        <div class="news-container" data-aos="fade-up" data-aos-duration="2000">
          <?php
          // Koneksi ke database
          $servername = "localhost"; // Ganti dengan host database Anda
          $username = "root"; // Ganti dengan username database Anda
          $password = ""; // Ganti dengan password database Anda
          $dbname = "simaduk_migrasi"; // Ganti dengan nama database Anda

          $conn = new mysqli($servername, $username, $password, $dbname);

          if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
          }

          // Query untuk mengambil berita terbaru
          $sql = "SELECT * FROM berita ORDER BY created_at DESC LIMIT 5"; // Ambil 5 berita terbaru
          $result = $conn->query($sql);

          if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
              // Tampilkan berita dengan format yang sudah ada
              echo '<div class="news-card">';
              echo '<img src="../upload/' . $row['file_path'] . '" alt="Upload Photo" />';
              echo '<div class="news-content">';
              echo '<h3>' . $row['title'] . '</h3>';
              echo '<p>' . $row['description'] . '</p>';
              echo '<span class="post-date">' . $row['created_at'] . '</span>';
              echo '</div>';
              echo '</div>';
            }
          } else {
            echo "No news found.";
          }

          $conn->close();
          ?>
        </div>
      </section>

      <!-- Bagian Aspirasi -->
      <!-- Bagian Aspirasi -->
      <aside class="aspirasi-section">
        <h2>Catatan Aspirasi</h2>
        <div class="aspirasi-list">
          <?php
          // Koneksi ke database
          $servername = "localhost";
          $username = "root";
          $password = "";
          $dbname = "simaduk_migrasi";

          $conn = new mysqli($servername, $username, $password, $dbname);
          if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
          }

          // Query untuk mengambil aspirasi
          $sql = "SELECT * FROM aspirasi ORDER BY id DESC"; // Ambil semua data aspirasi
          $result = $conn->query($sql);

          if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
              // Menampilkan setiap aspirasi yang sudah ada
              echo '<div class="aspirasi-item">';
              echo '<img src="../aspirasi/' . $row['file_path'] . '" alt="Aspirasi Photo" />'; // Menampilkan foto (jika ada)
              echo '<p><strong>Nama: </strong>' . $row['nama_lengkap'] . '</p>';
              echo '<p><strong>NIK: </strong>' . $row['nik'] . '</p>';
              echo '<p><strong>Judul Aspirasi: </strong>' . $row['judul_aspirasi'] . '</p>';
              echo '<p><strong>Isi Aspirasi: </strong>' . $row['isi_aspirasi'] . '</p>';
              echo '</div>';
            }
          } else {
            echo "Tidak ada aspirasi yang ditemukan.";
          }

          $conn->close();
          ?>
        </div>
      </aside>

    </div>
  </div>

  <footer class="footer">
    <div class="footer-content">
      <!-- Logo -->
      <div class="logo">
          <img
            src="img/Screenshot_2024-10-24_202613-removebg-preview 1.svg"
            alt="Logo"
          />
        </div>

      <!-- Halaman -->
      <div class="section">
        <h4>Halaman</h4>
        <ul>
          <li><a href="#">Beranda</a></li>
          <li><a href="#">Sejarah Desa</a></li>
          <li><a href="#">Berita</a></li>
          <li><a href="#">Lokasi</a></li>
        </ul>
      </div>

      <!-- Tautan -->
      <div class="section">
        <h4>Tautan</h4>
        <ul>
          <li><a href="#">Kabupaten Karawang</a></li>
          <li><a href="#">KEMENDAGRI</a></li>
          <li><a href="#">KEMENDESA</a></li>
          <li><a href="#">KEMENKOMINFO</a></li>
        </ul>
      </div>

      <!-- Kontak Kami -->
      <div class="section">
        <h4>Kontak Kami</h4>
        <p>
          Desa.Kemiri, Kecamatan.Jayakerta <br />
          Kabupaten.Karawang
        </p>
        <p>0825 8373 6229</p>
        <p>Desa.Kemiri@gmail.com</p>
      </div>
    </div>

    <!-- Footer Pendek -->
  </footer>
  <div class="footer-pendek">
    <div class="footer-short">
      <div>horizon.ac.id</div>
      <div class="phone-center">Nomor Telepon: [Nomor Telepon]</div>
      <div class="right">simaduk.desa.id</div>
    </div>
  </div>

</body>
</html>