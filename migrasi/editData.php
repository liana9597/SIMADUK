<?php
include 'db/koneksi.php';

$id = $_GET['id'];
$query = "SELECT * FROM migrasi WHERE id = $id";
$result = mysqli_query($conn, $query);
$data = mysqli_fetch_assoc($result);

if (isset($_POST['submit'])) {
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

    $query = "UPDATE migrasi SET 
        NIK = '$nik', 
        nama = '$nama', 
        tempat_lahir = '$tempat_lahir', 
        tanggal_lahir = '$tanggal_lahir', 
        agama = '$agama', 
        jenis_kelamin = '$jenis_kelamin', 
        status_pernikahan = '$status_pernikahan', 
        alamat = '$alamat', 
        kartu_keluarga = '$kartu_keluarga', 
        kedudukan_keluarga = '$kedudukan_keluarga', 
        kewarganegaraan = '$kewarganegaraan', 
        alamat_asal = '$alamat_asal', 
        alamat_tujuan = '$alamat_tujuan' 
        WHERE id = $id";

    if (mysqli_query($conn, $query)) {
        echo "<script>
        document.addEventListener('DOMContentLoaded', function() {
            Swal.fire({
                icon: 'success',
                title: 'Berhasil!',
                text: 'Data berhasil diperbarui!'
            }).then(() => {
                window.location.href = 'rekapMigrasi.php';
            });
        });
        </script>";
    } else {
        $error_message = addslashes(mysqli_error($conn));
        echo "<script>
        document.addEventListener('DOMContentLoaded', function() {
            Swal.fire({
                icon: 'error',
                title: 'Gagal!',
                text: 'Error: $error_message'
            });
        });
        </script>";
    }

    mysqli_close($conn);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Data</title>
    <link rel="stylesheet" href="css/style.css">
    <!-- SweetAlert CDN -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
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
                <li>
                    <a href="#">
                        <span class="icon"><ion-icon name="reader-outline"></ion-icon></span>
                        <span class="title">Pesan Aspirasi</span>
                    </a>
                </li>
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

                <li>
                    <a href="../data_login/index.php">
                        <span class="icon"><ion-icon name="bag-outline"></ion-icon></span>
                        <span class="title">Data Log In</span>
                    </a>
                </li>
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
            <!--Edit Data-->
            <div class="form-container">
                <h1>Edit Data Migrasi</h1>
                <hr class="orange-line">
                <form action="" method="POST">
                    <div class="form-row">
                        <div class="form-group">
                            <label>No Nik:</label><br>
                            <input type="text" name="NIK" value="<?= $data['NIK'] ?>" required><br>
                        </div>
                        <div class="form-group">
                            <label>Nama Lengkap:</label><br>
                            <input type="text" name="nama" value="<?= $data['nama'] ?>" required><br>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group">
                            <label>Tempat Lahir:</label><br>
                            <input type="text" name="tempat_lahir" value="<?= $data['tempat_lahir'] ?>" required><br>
                        </div>
                        <div class="form-group">
                            <label>Tanggal Lahir:</label><br>
                            <input type="date" name="tanggal_lahir" value="<?= $data['tanggal_lahir'] ?>" required><br>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group">
                            <label>Agama:</label><br>
                            <input type="text" name="agama" value="<?= $data['agama'] ?>" required><br>
                        </div>
                        <div class="form-group">
                            <label>Jenis Kelamin:</label><br>
                            <select name="jenis_kelamin" required>
                                <option value="" disabled selected>Jenis Kelamin</option>
                                <option value="Laki-laki" <?= $data['jenis_kelamin'] == 'Laki-laki' ? 'selected' : '' ?>>Laki-laki</option>
                                <option value="Perempuan" <?= $data['jenis_kelamin'] == 'Perempuan' ? 'selected' : '' ?>>Perempuan</option>
                            </select><br>
                        </div>
                    </div>

                    <div class="form-group">
                        <label>Alamat:</label><br>
                        <input type="text" name="alamat" value="<?= $data['alamat'] ?>" required><br>
                    </div>

                    <div class="form-row">
                        <div class="form-group">
                            <label>Kartu Keluarga:</label><br>
                            <input type="text" name="kartu_keluarga" value="<?= $data['kartu_keluarga'] ?>" required><br>
                        </div>
                        <div class="form-group">
                            <label>Status Pernikahan:</label><br>
                            <select name="status_pernikahan" required>
                                <option value="" disabled selected>Status Pernikahan</option>
                                <option value="Belum Menikah" <?= $data['status_pernikahan'] == 'Belum Menikah' ? 'selected' : '' ?>>Belum Menikah</option>
                                <option value="Menikah" <?= $data['status_pernikahan'] == 'Menikah' ? 'selected' : '' ?>>Menikah</option>
                                <option value="Cerai" <?= $data['status_pernikahan'] == 'Cerai' ? 'selected' : '' ?>>Cerai</option>
                            </select><br>
                        </div>
                    </div>

                    <div class="form-group">
                        <label>Kedudukan Keluarga:</label><br>
                        <input type="text" name="kedudukan_keluarga" value="<?= $data['kedudukan_keluarga'] ?>" required><br>
                    </div>
                    <div class="form-group">
                        <label>Kewarganegaraan:</label><br>
                        <input type="text" name="kewarganegaraan" value="<?= $data['kewarganegaraan'] ?>" required><br>
                    </div>
                    <div class="form-group">
                        <label>Alamat Asal:</label><br>
                        <input type="text" name="alamat_asal" value="<?= $data['alamat_asal'] ?>" required><br>
                    </div>
                    <div class="form-group">
                        <label>Alamat Tujuan:</label><br>
                        <input type="text" name="alamat_tujuan" value="<?= $data['alamat_tujuan'] ?>" required><br>
                    </div>

                    <button type="submit" name="submit">Simpan Perubahan</button>
                </form>
            </div>
        </div>
    </div>
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