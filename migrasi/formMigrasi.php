<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulir Migrasi</title>
    <link rel="stylesheet" href="css/style.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script> <!-- SweetAlert -->
</head>

<body>
    <!-- navigation -->
    <div class="container">
        <div class="navigation">
        <ul>
                <li>
                    <a href="#">
                        <span class="icon"><img src="img/logo1.png" width="75%" height="85%"></span>
                        <span class="title"><img src="img/Logo.png" width="85%" height="80%"></span>
                    </a>
                </li>
                <li>
                    <a href="../beranda/beranda.php">
                        <span class="icon"><ion-icon name="home-outline"></ion-icon></span>
                        <span class="title">Home</span>
                    </a>
                </li>
                <li>
                    <a href="../upload/UploadFile.php">
                        <span class="icon"><ion-icon name="add-circle-outline"></ion-icon></span>
                        <span class="title">Upload Berita</span>
                    </a>
                </li>
               <!-- <li>
                    <a href="#">
                        <span class="icon"><ion-icon name="reader-outline"></ion-icon></span>
                        <span class="title">Pesan Aspirasi</span>
                    </a>
                </li>-->
                <li>
                    <a href="../migrasi/formMigrasi.php">
                        <span class="icon"><ion-icon name="documents-outline"></ion-icon></span>
                        <span class="title">Data Migrasi</span>

                    </a>
                </li>
                <li>
                    <a href="../migrasi/rekapMigrasi.php">
                        <span class="icon"><ion-icon name="folder-outline"></ion-icon></span>
                        <span class="title">Rekap Migrasi</span>
                    </a>
                </li>

             <!--   <li>
                    <a href="../data_login/index.php">
                        <span class="icon"><ion-icon name="bag-outline"></ion-icon></span>
                        <span class="title">Data Log In</span>
                    </a>
                </li>-->
                <li>
                    <a href="../halaman_utama/index.php">
                        <span class="icon"><ion-icon name="log-out-outline"></ion-icon></span>
                        <span class="title">Keluar</span>
                    </a>
                </li>
            </ul>
        </div>

        <!--Main-->
        <div class="main">
            <div class="topbar">
                <div class="toggle">
                    <ion-icon name="menu-outline"></ion-icon>
                </div>
            </div>
            <!-- Formulir Migrasi -->
            <div class="form-container">
                    <h1>Formulir Data Migrasi</h1>
                    <hr class="orange-line">
                    <form action="" method="POST">
                        <div class="form-row">
                            <div class="form-group">
                                <label>No. NIK:</label><br>
                                <input type="text" name="NIK" required><br>
                            </div>
                            <div class="form-group">
                                <label>Nama Lengkap:</label><br>
                                <input type="text" name="nama" required><br>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-group">
                                <label>Tempat Lahir:</label><br>
                                <input type="text" name="tempat_lahir" required><br>
                            </div>
                            <div class="form-group">
                                <label>Tanggal Lahir:</label><br>
                                <input type="date" name="tanggal_lahir" required><br>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-group">
                                <label>Agama:</label><br>
                                <input type="text" name="agama" required><br>
                            </div>
                            <div class="form-group">
                                <label>Jenis Kelamin:</label><br>
                                <select name="jenis_kelamin" required>
                                    <option value="" disabled selected>Jenis Kelamin</option>
                                    <option value="Laki-laki">Laki-laki</option>
                                    <option value="Perempuan">Perempuan</option>
                                </select><br>
                            </div>
                        </div>

                        <div class="form-group">
                            <label>Alamat:</label><br>
                            <input type="text" name="alamat" required><br>
                        </div>

                        <div class="form-row">
                            <div class="form-group">
                                <label>No. Kartu Keluarga:</label><br>
                                <input type="text" name="kartu_keluarga" required><br>
                            </div>
                            <div class="form-group">
                                <label>Status Pernikahan:</label><br>
                                <select name="status_pernikahan" required>
                                    <option value="" disabled selected>Status Pernikahan</option>
                                    <option value="Belum Menikah">Belum Menikah</option>
                                    <option value="Menikah">Menikah</option>
                                    <option value="Cerai">Cerai</option>
                                </select><br>
                            </div>
                        </div>

                        <div class="form-group">
                            <label>Kedudukan Keluarga:</label><br>
                            <input type="text" name="kedudukan_keluarga" required><br>
                        </div>
                        <div class="form-group">
                            <label>Kewarganegaraan:</label><br>
                            <input type="text" name="kewarganegaraan" required><br>
                        </div>
                        <div class="form-group">
                            <label>Alamat Asal:</label><br>
                            <textarea name="alamat_asal" rows="3" required></textarea>
                        </div>
                        <div class="form-group">
                            <label>Alamat Tujuan:</label><br>
                            <input type="text" name="alamat_tujuan" required><br>
                        </div>
                        <button type="submit" name="submit">Input</button>
                    </form>
                </div>
        </div>
    </div>

    <?php
    if (isset($_POST['submit'])) {
        include 'db/koneksi.php';

        $nik = $_POST['NIK'];
        $nama = $_POST['nama'];
        $tempat_lahir = $_POST['tempat_lahir'];
        $tanggal_lahir = $_POST['tanggal_lahir'];
        $agama = $_POST['agama'];
        $jenis_kelamin = $_POST['jenis_kelamin'];
        $status_pernikahan = $_POST['status_pernikahan'];
        $alamat = $_POST['alamat'];
        $kartu_keluarga = $_POST['kartu_keluarga'];
        $kedudukan_keluarga = $_POST['kedudukan_keluarga'];
        $kewarganegaraan = $_POST['kewarganegaraan'];
        $alamat_asal = $_POST['alamat_asal'];
        $alamat_tujuan = $_POST['alamat_tujuan'];

        $query = "INSERT INTO migrasi (NIK, nama, tempat_lahir, tanggal_lahir, agama, jenis_kelamin, status_pernikahan, alamat, kartu_keluarga, kedudukan_keluarga, kewarganegaraan, alamat_asal, alamat_tujuan) VALUES ('$nik', '$nama', '$tempat_lahir', '$tanggal_lahir', '$agama', '$jenis_kelamin', '$status_pernikahan', '$alamat', '$kartu_keluarga', '$kedudukan_keluarga', '$kewarganegaraan', '$alamat_asal', '$alamat_tujuan')";

        if (mysqli_query($conn, $query)) {
            echo "
                <script>
                    Swal.fire({
                        icon: 'success',
                        title: 'Berhasil!',
                        text: 'Data berhasil ditambahkan.',
                        confirmButtonText: 'OK'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            window.location.href = 'rekapMigrasi.php'; // Ganti dengan halaman tujuan
                        }
                    });
                </script>
            ";
        } else {
            echo "
                <script>
                    Swal.fire({
                        icon: 'error',
                        title: 'Gagal!',
                        text: 'Error: " . mysqli_error($conn) . "',
                        confirmButtonText: 'OK'
                    });
                </script>
            ";
        }

        mysqli_close($conn);
    }
    ?>
</body>
<!--Java script-->
<script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
<script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
<script>
    //menambahkankan hover pada klik menu
    let list = document.querySelectorAll(".navigation li");

    function activeLink() {
        list.forEach((item) => {
            item.classList.remove("hovered");
        });
        this.classList.add("hovered");
    }
    list.forEach((item) => item.addEventListener("mouseover", activeLink));
    // menu toggle
    let toggle = document.querySelector(".toggle");
    let navigation = document.querySelector(".navigation");
    let main = document.querySelector(".main");
    toggle.onclick = function() {
        navigation.classList.toggle("active");
        main.classList.toggle("active");
    };
</script>

</html>