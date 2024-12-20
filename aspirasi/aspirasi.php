<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css" />
    <title>Berikan Aspirasi</title>
</head>

<body>
    <!--header-->
    <header>
        <a href="#" class="nav-logo"><img src="img/logoo.svg" alt="" class="logo" /></a>
        <div class="gp">
            <ul>
                <li class="dropdown">
                    <ul class="dropdown-content">
                        <li><a href="/halaman_utama/index.php">Beranda</a></li>
                        <li><a href="#">Tentang Desa</a></li>
                        <li><a href="#">Struktur Desa</a></li>
                        <li><a href="#">Berita Desa</a></li>
                        <li><a href="#">Tata Letak Desa</a></li>
                    </ul>
                </li>
            </ul>
        </div>
    </header>
    <!--Form Aspirasi-->
    <div class="main">
        <div class="teks">
            <div class="vertical-line"></div>
            <h1>Berikan Aspirasi</h1>
        </div>
        <div class="aspirasi">
            <div class="aspirasi-container">
                <form action="proses_aspirasi.php" method="POST" enctype="multipart/form-data">
                    <div class="kotak" id="uploadBox" onclick="document.getElementById('fileInput').click()">
                        <h2>
                            <span class="teks1">Upload your</span>
                            <span class="teks2" id="uploadText">file</span>
                        </h2>
                        <input type="file" id="fileInput" name="file" accept="image/*" style="display: none;" />
                    </div>

                    <div class="teks-samping">
                        <h3>Options</h3>
                        <hr class="green-line-option">

                        <div class="kotak-samping">
                            <h4>Nama Lengkap*</h4>
                            <input type="text" name="nama_lengkap" class="kotak-title" required>
                        </div>
                        <div class="kotak-samping">
                            <h4>No NIK*</h4>
                            <input type="text" name="nik" class="kotak-title" required>
                        </div>
                        <div class="kotak-samping">
                            <h4>Judul Aspirasi*</h4>
                            <input type="text" name="judul_aspirasi" class="kotak-title" required>
                        </div>
                        <div class="kotak-samping">
                            <h4>Isi Aspirasi*</h4>
                            <textarea name="isi_aspirasi" class="kotak-description" required></textarea>
                        </div>
                        <button type="submit" name="submit" class="button">Kirim</button>
                </form>
            </div>
        </div>
    </div>
    <!--Proses Aspirasi-->
    <div class="teks3">
        <div class="vertical-line"></div>
        <h1>Proses Aspirasi</h1>
    </div>
    <div class="proses_aspirasi">
        <div class="img1">
            <img src="img/Group 99.png" alt="">
            <img src="img/Group 100.png" alt="">
            <img src="img/Group 101.png" alt="">
            <img src="img/Group 103.png" alt="">
        </div>

        <div class="garis"></div>

        <div class="teks-aspirasi">
            <span>Tulisan Laporan</span>
            <span>Proses Verifikasi</span>
            <span>Proses Tindak Lanjut</span>
            <span>Selesai</span>
        </div>

        <div class="teks-aspirasi2">
            <span>Laporkan keluhan atau aspirasi <br> anda dengan jelas dan lengkap</span>
            <span>Dalam 3 hari, laporan Anda akan <br> diverifikasi dan diteruskan kepada <br> instansi
                berwenang</span>
            <span>Dalam 5 hari, instansi akan <br> menindaklanjuti dan membalas <br> laporan Anda</span>
            <span>Laporan Anda akan terus <br> ditindaklanjuti hingga <br> terselesaikan</span>
        </div>
    </div>

    </div>
    </div>

    <!--footer-->
    <footer class="footer">
        <div class="footer-content">
            <div class="logo">
                <img src="img/Screenshot_2024-10-24_202613-removebg-preview 1.svg" alt="Logo">
            </div>
            <div class="section">
                <h4>Halaman</h4>
                <ul>
                    <li><a href="#">Beranda</a></li>
                    <li><a href="#">Sejarah Desa</a></li>
                    <li><a href="#">Berita</a></li>
                    <li><a href="#">Lokasi</a></li>
                </ul>
            </div>
            <div class="section">
                <h4>Tautan</h4>
                <ul>
                    <li><a href="#">Kabupaten Karawang</a></li>
                    <li><a href="#">KEMENDAGRI</a></li>
                    <li><a href="#">KEMENDESA</a></li>
                    <li><a href="#">KEMENKOMINFO</a></li>
                </ul>
            </div>
            <div class="section">
                <h4>Kontak Kami</h4>
                <p>Desa.Kemiri, Kecamatan.Jayakerta <br>
                    Kabupaten.Karawang</p>
                <p>0825 8373 6229</p>
                <p>Desa.Kemiri@gmail.com</p>
            </div>
        </div>
    </footer>
    <div class="footer-pendek">
        <div class="footer-short">
            <div>horizon.ac.id</div>
            <div class="phone-center">Nomor Telepon: [Nomor Telepon]</div>
            <div class="right">simaduk.desa.id</div>
        </div>
    </div>

</body>
<script>
    document.getElementById('fileInput').addEventListener('change', function(event) {
        const file = event.target.files[0];
        const reader = new FileReader();

        if (file) {
            reader.readAsDataURL(file);
        }

        reader.onload = function(e) {
            const uploadBox = document.getElementById('uploadBox');
            const teks1 = document.querySelector('.teks1');
            const teks2 = document.querySelector('.teks2');

            teks1.style.display = 'none';
            teks2.style.display = 'none';
            uploadBox.style.backgroundImage = `url(${e.target.result})`;
        };
    });
</script>

</html>