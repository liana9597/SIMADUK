<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rekapan Migrasi</title>
    <link rel="stylesheet" href="style.css" />
</head>

<body>
    <!-- navigation -->
    <div class="container">
        <div class="navigation">
            <ul>
                <li>
                    <a href="#">
                        <span class="icon"><img src="logo1.png" width="75%" height="85%"></span>
                        <span class="title"><img src="Logo.png" width="85%" height="80%"></span>
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
                    <a href="../simaduk_migrasi/index.php">
                        <span class="icon"><ion-icon name="documents-outline"></ion-icon></span>
                        <span class="title">Data Migrasi</span>

                    </a>
                </li>
                <li>
                    <a href="../rekapan/rekapanMigrasi.php">
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

            <!-- Rekapan Migrasi -->
            <div class="table-responsive">
                <h1>Data Log In</h1>
                <hr class="green-line">
                <div class="table-scrollable">
                    <table border="1" cellpadding="10" cellspacing="0" style="width: 100%; border-collapse: collapse;">
                        <tr>
                            <th>ID</th>
                            <th>Username</th>
                            <th>Password</th>
                            <th>Tempat Masuk</th>
                            <th>Status</th>
                        </tr>
                        <tr>
                            <td>XXXXXX</td>
                            <td>XXXXXXXX</td>
                            <td>XX</td>
                            <td>XXXXXX</td>
                            <td>
                                <span class="action-buttons">
                                    <a href="#" class="delete-button">Hapus</a>
                                </span>
                            </td>
                        </tr>
                        <tr>
                            <td>XXXXXX</td>
                            <td>XXXXXXXX</td>
                            <td>XX</td>
                            <td>XXXXXX</td>
                            <td>
                                <span class="action-buttons">
                                    <a href="#" class="delete-button">Hapus</a>
                                </span>
                            </td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
</body>
<!--memanggil file javascript / main.js -->
<script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
<script src="script.js"></script>
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
    toggle.onclick = function () {
        navigation.classList.toggle("active");
        main.classList.toggle("active");
    };

</script>

</html>