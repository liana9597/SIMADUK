<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>SIMADUK</title>
    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css"
    />
    <link rel="stylesheet" href="css/style.css" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Source+Sans+3:ital,wght@0,200..900;1,200..900&display=swap"
      rel="stylesheet"
    />
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet" />
      <style>
        /* Grid Layout untuk berita */
        .news-container {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
            gap: 20px; /* Jarak antar item */
            margin: 20px 0;
        }

        .news-card {
            background: #fff;
            border: 1px solid #ddd;
            border-radius: 10px;
            padding: 15px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            transition: transform 0.2s ease;
            display: flex;
            flex-direction: column;
            align-items: center;
            text-align: center;
        }

        .news-card img {
            max-width: 100%;
            height: auto;
            border-radius: 5px;
            margin-bottom: 10px;
        }

        .news-card h3 {
            font-size: 18px;
            margin: 10px 0;
            color: #333;
        }

        .news-card p {
            font-size: 14px;
            color: #666;
        }

        .news-card .post-date {
            font-size: 12px;
            color: #aaa;
        }

        .news-card:hover {
            transform: scale(1.03);
        }
    </style>
  </head>
  <body>
    <!--header-->
    <header>
      <a href="#" class="nav-logo"
        ><img src="img/logoo.svg" alt="" class="logo"/></a>
      <div class="gp">
        <ul>
          <li class="dropdown">
            <a href="#" onclick="toggleDropdown(this)">Profil Desa</a>
            <ul class="dropdown-content">
              <li><a href="#beranda">Beranda</a></li>
              <li><a href="#profildesa">Tentang Desa</a></li>
              <li><a href="#strukturdesa">Struktur Desa</a></li>
              <li><a href="#berita">Berita Desa</a></li>
              <li><a href="#lokasi">Tata Letak Desa</a></li>
            </ul>
          </li>
          <li><a href="../login/form_login.html">Login</a></li>
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
    <!--header-->

    <!--body1-->
    <section class="home">
      <div class="content">
        <h3 >Selamat Datang Di</h3>
        <br />
        <h2>SIMADUK</h2>
        <p>
          Sistem Informasi Pendataan Migrasi Aspirasi Penduduk <br />
          Kemiri-Kertajaya-Karawang
        </p>
      </div>
    </section>
    <!--body1-->

    <!--pilihan-->
    <div class="pilihan">
      <div class="code1" data-aos="fade-right" data-aos-duration="1000" id="beranda">
        <a href="#"><h1>Program Kami</h1></a>
        <p>program yang kami miliki untuk anda</p>
      </div>
      <div class="kategori" data-aos="fade-up"
      data-aos-duration="2000">
      <a href="../berita/index.php">
        <div class="berita">
          <div class="berita_desc">
            <img src="img/Group 84.svg" />
            <span style="color: #3b3e51; opacity: 60%; font-size: 13px"
              >SIMADUK</span
            >
            <h3>Berita Desa</h3>
            <p class="hidden">
              Anda dapat mendapatkan berita dan informasi seputar desa.
            </p>
          </div>
        </div>
        </a>
        <a href="../login/form_login.html">
        <div class="migrasi">
          <div class="migrasi_desc">
            <img src="img/Group 85.svg" />
            <span style="color: #3b3e51; opacity: 60%; font-size: 13px"
              >SIMADUK</span
            >
            <h3>Pendataan Migrasi</h3>
            <p class="hidden">
              Pendataan migrasi yang hanya bisa dilakukan oleh pihak desa.
            </p>
          </div>
        </div>
        </a>
        <a href="../aspirasi/aspirasi.php">
        <div class="aspirasi">
          <div class="aspirasi_desc">
            <img src="img/Group 86.svg" />
            <span style="color: #3b3e51; opacity: 60%; font-size: 13px"
              >SIMADUK</span
            >
            <h3>Layanan Aspirasi</h3>
            <p class="hidden">
              Anda bisa mengirimkan Aspirasi dan keluhan seputar desa disini.
            </p>
          </div>
        </div>
        </a>
        <a href="../login/form_login.html">
        <div class="data_migrasi">
          <div class="data_migrasi_desc">
            <img src="img/Group 88 (1).svg" />
            <span style="color: #3b3e51; opacity: 60%; font-size: 13px"
              >SIMADUK</span
            >
            <h3>Data Migrasi</h3>
            <p class="hidden">
              Hasil data migrasi yang sudah dimasukan pihak desa terkait data
              anda.
            </p>
          </div>
          </a>
        </div>
    </div>
  </div>
    <!--pilihan-->

    <!--profil-->
    <section class="content-section" id="profildesa">
      <div class="content-container" data-aos="fade-left" data-aos-duration="2000" >
        <div class="image-container">
          <img src="img/Group 91.svg" alt="" />
        </div>
        <div class="description-container">
          <h2>Profil Desa</h2>
          <p>
            Menurut narasumber / cerita masyarakat dari berbagai kalangan asal
            mula terbentuknya Desa Kemiri adalah: merupakan salah satu daerah
            pedesaan yang terletak disebelah utara Kota Karawang yang tepatnya
            disebelah utara Kecamatan Rengasdengklok yang tanahnya subur, dan
            dipenuhi tumbuh-tumbuhan dan hutan jati. Dan di wilayah tersebut dan
            menurut Riwayat ada sekelompok masyarakat yang rukun dan damai
            meskipun kehidupan ekonominya masih serba kekurangan. Diantara
            rimbunnya hutan jati tumbuhlah satu pohon yang besar dan kokoh yaitu
            pohon “KEMIRI” karena perbedaan yang sangat mencolok maka sekelompok
            masyarakat tersebut dengan hasil musyawarah melalui ketua pemangku
            adat / tokoh masyarakat yang bernama RASIYEM yaitu kurang lebih pada
            tahun 1849 memberi nama wilayah tersebut dengan sebutan DESA KEMIRI,
            dan sekaligus mengukuhkan dan mengangkat RASIYEM sebagai kuwu
            (Kepala Desa) KEMIRI yang pertama.
          </p>
        </div>
      </div>
    </section>
    <!--profil-->

    <!--berita-->
    <?php
$servername = "localhost"; // Ganti dengan host database Anda
$username = "root"; // Ganti dengan username database Anda
$password = ""; // Ganti dengan password database Anda
$dbname = "simaduk_migrasi"; // Ganti dengan nama database Anda

// Koneksi ke database
$conn = new mysqli($servername, $username, $password, $dbname);

// Periksa koneksi
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Ambil berita terbaru
$sql = "SELECT title, description, file_path, created_at FROM berita ORDER BY created_at DESC LIMIT 2"; // Ambil dua berita terbaru
$result = $conn->query($sql);
?>

<?php
$servername = "localhost"; // Ganti dengan host database Anda
$username = "root"; // Ganti dengan username database Anda
$password = ""; // Ganti dengan password database Anda
$dbname = "simaduk_migrasi"; // Ganti dengan nama database Anda

// Koneksi ke database
$conn = new mysqli($servername, $username, $password, $dbname);

// Periksa koneksi
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Ambil berita terbaru
$sql = "SELECT title, description, file_path, created_at FROM berita ORDER BY created_at DESC LIMIT 2"; // Ambil dua berita terbaru
$result = $conn->query($sql);
?>

<section class="news-section">
      <div class="code"data-aos="fade-right" data-aos-duration="1000" id="berita">
        <a href="#"><h1>Berita terbaru</h1></a>
      </div>
      <div class="news-item" data-aos="fade-up"
      data-aos-duration="2000">
        <div class="news-image">
          <img src="img/tugu2.jpg" alt="" />
        </div>
        <div class="news-content">
          <h2>Berita Desa</h2>
          <span class="span">21 Januari 2024</span>
          <p>
          Monument ini dibangun pada tahun 1950 yang dimaksudkan untuk memperingati peristiwa Rengasdengklok...
          </p>
          <a href="#" class="read-more">Baca Selengkapnya</a>
        </div>
      </div>

      <div class="news-item">
        <div class="news-image">
          <img src="img/tugu.jpeg" alt="Foto Berita 2" />
        </div>
        <div class="news-content">
          <h2>Berita Desa</h2>
          <span class="span">21 Januari 2024</span>
          <p>
          Tugu Proklamasi adalah tugu peringatan proklamasi kemerdekaan Republik Indonesia yang berdiri di kompleks Taman Proklamasi di Jalan Proklamasi, ...
          </p>
          <a href="../berita/index.php" class="read-more">Baca Selengkapnya</a>
        </div>
      </div>
    </section>



    <!--berita-->

    <!--aspirasi-->
    <section class="news-section">
        <h1>Berita Desa</h1>
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
            echo '<div class="news-container">'; // Tambahkan container grid
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
            echo '</div>'; // Tutup container grid
        } else {
            echo "No news found.";
        }

        $conn->close();
        ?>
    </section>
    <!--aspirasi-->

    <!--organisasi-->
    <section class="swiper mySwiper">
      <div class="judul" data-aos="fade-up"
      data-aos-duration="2000" id="strukturdesa">
        <a href="#"><h1>Struktur Organisasi</h1></a>
      </div>
      <div class="swiper-wrapper">
        <div class="kard swiper-slide">
          <div class="kard_img">
            <img src="img/user.jpg" alt="" />
          </div>

          <div class="kard_content">
            <span class="kard_name">H. SALWANI</span>
            <p class="kard_text">Kepala Desa</p>
            <!--<button class="kard_btn">Lihat</button>-->
          </div>
        </div>

        <div class="kard swiper-slide">
          <div class="kard_img">
            <img src="img/user.jpg" alt="" />
          </div>

          <div class="kard_content">
            <span class="kard_name">GUNAWAN</span>
            <p class="kard_text">Sekertaris Desa</p>
            <!--<button class="kard_btn">Lihat</button>-->
          </div>
        </div>

        <div class="kard swiper-slide">
          <div class="kard_img">
            <img src="img/user.jpg" alt="" />
          </div>

          <div class="kard_content">
            <!--<span class="kard_title">Struktur ogra</span>-->
            <span class="kard_name">MUHAMMAD ISMAIL</span>
            <p class="kard_text">Kaur Umum & Perencanaan</p>
          </div>
        </div>

        <div class="kard swiper-slide">
          <div class="kard_img">
            <img src="img/user.jpg" alt="" />
          </div>

          <div class="kard_content">
            <span class="kard_name">LIA ANGGRAWATI</span>
            <p class="kard_text">Kaur Keuangan</p>
          </div>
        </div>

        <div class="kard swiper-slide">
          <div class="kard_img">
            <img src="img/user.jpg" alt="" />
          </div>

          <div class="kard_content">
            <span class="kard_name">ANWAR PERMANA</span>
            <p class="kard_text">Kasi Pelayanan</p>
          </div>
        </div>

        <div class="kard swiper-slide">
          <div class="kard_img">
            <img src="img/user.jpg" alt="" />
          </div>

          <div class="kard_content">
            <span class="kard_name">DEVI NOVIYANTI</span>
            <p class="kard_text">Kasi Kesejahteraan</p>
          </div>
        </div>

        <div class="kard swiper-slide">
          <div class="kard_img">
            <img src="img/user.jpg" alt="" />
          </div>

          <div class="kard_content">
            <span class="kard_name">PAHRUDIN</span>
            <p class="kard_text">Kasi Pemerintahan</p>
          </div>
        </div>

    </section>
    <!---organisasi-->

    <!---maps-->
    <div class="maps">
      <div class="code" data-aos="fade-right"
      data-aos-duration="1000">
        <h1>Lokasi</h1>
      </div>
      <div class="map-wrapper" data-aos="fade-up"
      data-aos-duration="1000" id="lokasi">
        <div class="map-container">
          <iframe
            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d25426.961869346098!2d107.29392178448387!3d-6.1260904189810175!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e697fe767bc0f93%3A0x46528a525c42a3e3!2sKemiri%2C%20Kec.%20Jayakerta%2C%20Karawang%2C%20Jawa%20Barat!5e0!3m2!1sid!2sid!4v1729767184665!5m2!1sid!2sid"
            width="600"
            height="450"
            style="border: 0"
            allowfullscreen=""
            loading="lazy"
            referrerpolicy="no-referrer-when-downgrade"
          ></iframe>
        </div>
        <div class="map-info">
          <h3>Desa Kemiri</h3>
          <p>Dusun Karajan A, Kecamatan Jayakerta, Kabupaten Karawang, Jawa Barat</p>
        </div>
      </div>
    </div>

    <!---maps-->

    <!--footer-->
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

    <!--footer-->
    <!--script js-->
    <script>
      const menuCards = document.querySelectorAll(".menu-card");
      const menuContents = document.querySelectorAll(".menu-content");

      menuCards.forEach((card) => {
        card.addEventListener("click", () => {
          const target = card.dataset.target;
          const content = document.getElementById(target);

          // Tampilkan konten yang sesuai
          menuContents.forEach((content) => content.classList.remove("active"));
          content.classList.add("active");
        });
      });
    </script>
    <script
      type="module"
      src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"
    ></script>
    <script
      nomodule
      src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"
    ></script>

    <script>
      let searchBtn = document.querySelector(".searchBtn");
      let closeBtn = document.querySelector(".closeBtn");
      let searchBox = document.querySelector(".searchBox");

      searchBtn.onclick = function () {
        searchBox.classList.add("active");
        closeBtn.classList.add("active");
        searchBtn.classList.add("active");
      };
      closeBtn.onclick = function () {
        searchBox.classList.remove("active");
        closeBtn.classList.remove("active");
        searchBtn.classList.remove("active");
      };
    </script>

    <script>
      function toggleDropdown(element) {
        element.classList.toggle("show");
      }
    </script>

    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>

    <!-- Initialize Swiper -->
    <script>
      var swiper = new Swiper(".mySwiper", {
        effect: "coverflow",
        grabCursor: true,
        centeredSlides: true,
        slidesPerView: "auto",
        coverflowEffect: {
          rotate: 0,
          stretch: 0,
          depth: 300,
          modifier: 1,
          slideShadows: false,
        },
        pagination: {
          el: ".swiper-pagination",
        },
      });
    </script>

    <!--aos animasi-->
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
      AOS.init();
    </script>

    <!--endscript js-->
  </body>
</html>
