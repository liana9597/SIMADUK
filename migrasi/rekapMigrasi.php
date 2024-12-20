<?php
include 'db/koneksi.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $query = "DELETE FROM migrasi WHERE id=$id";

    if (mysqli_query($conn, $query)) {
        echo "<script>
            Swal.fire({
                icon: 'success',
                title: 'Berhasil',
                text: 'Data berhasil dihapus!',
                confirmButtonText: 'OK'
            }).then(() => {
                window.location.href = 'rekapMigrasi.php';
            });
        </script>";
    } else {
        echo "<script>
            Swal.fire({
                icon: 'error',
                title: 'Gagal',
                text: 'Terjadi kesalahan saat menghapus data.',
                confirmButtonText: 'OK'
            });
        </script>";
    }
}

$query = "SELECT * FROM migrasi";
$result = mysqli_query($conn, $query);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rekap Migrasi</title>
    <link rel="stylesheet" href="css/style.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<body>
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

        <div class="main">
            <div class="topbar">
                <div class="toggle">
                    <ion-icon name="menu-outline"></ion-icon>
                </div>
                <div class="search">
                    <label>
                        <input type="text" placeholder="search here" />
                        <ion-icon name="search-outline"></ion-icon>
                    </label>
                </div>
                <div class="user">
                    <img src="../img/Profil.jpeg" alt="" style="margin-top: 4%;" />
                </div>
            </div>

            <div class="table-responsive">
                <h1>Rekapan Migrasi</h1>
                <hr class="green-line">
                <span class="action-buttons">
                    <a class="tambah-button" href="formMigrasi.php">Tambah Migrasi</a>
                </span>
                <div class="table-scrollable"></div>
                <table border="1" cellpadding="15" cellspacing="0">
                    <tr>
                        <th>No</th>
                        <th>No.NIK</th>
                        <th>Nama Lengkap</th>
                        <th>Tanggal lahir</th>
                        <th>Tempat lahir</th>
                        <th>Agama</th>
                        <th>Jenis Kelamin</th>
                        <th>Status pernikahan</th>
                        <th>Alamat</th>
                        <th>No.KK</th>
                        <th>Kedudukan keluarga</th>
                        <th>Kewarganegaraan</th>
                        <th>Alamat asal</th>
                        <th>Alamat tujuan</th>
                        <th>Aksi</th>
                    </tr>
                    <?php while ($row = mysqli_fetch_assoc($result)): ?>
                        <tr>
                            <td><?= $row['id'] ?></td>
                            <td><?= $row['NIK'] ?></td>
                            <td><?= $row['nama'] ?></td>
                            <td><?= $row['tempat_lahir'] ?></td>
                            <td><?= $row['tanggal_lahir'] ?></td>
                            <td><?= $row['agama'] ?></td>
                            <td><?= $row['jenis_kelamin'] ?></td>
                            <td><?= $row['status_pernikahan'] ?></td>
                            <td><?= $row['alamat'] ?></td>
                            <td><?= $row['kartu_keluarga'] ?></td>
                            <td><?= $row['kedudukan_keluarga'] ?></td>
                            <td><?= $row['kewarganegaraan'] ?></td>
                            <td><?= $row['alamat_asal'] ?></td>
                            <td><?= $row['alamat_tujuan'] ?></td>
                            <td>
                                <span class="action-buttons">
                                    <a class="edit-button" href="editData.php?id=<?= $row['id'] ?>"><span class="icon"><ion-icon name="create-outline"></ion-icon></span></a>
                                    <a class="delete-button" href="#" onclick="confirmDelete(<?= $row['id'] ?>)"><span class="icon"><ion-icon name="trash-outline"></ion-icon></span></a>
                                </span>
                            </td>
                        </tr>
                    <?php endwhile; ?>
                </table>
            </div>
        </div>
    </div>

    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script>
        function confirmDelete(id) {
            Swal.fire({
                title: 'Yakin ingin menghapus?',
                text: "Data yang dihapus tidak dapat dikembalikan!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Ya, hapus!',
                cancelButtonText: 'Batal'
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = `rekapMigrasi.php?id=${id}`;
                }
            });
        }
    </script>
</body>
</html>
