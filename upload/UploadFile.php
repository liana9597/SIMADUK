<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Upload File</title>
    <link rel="stylesheet" href="UploadFile.css" />
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

            <!--Form Upload-->
            <div class="upload">
                <form action="upload.php" method="POST" enctype="multipart/form-data">
                    <h1>Upload Berita</h1>
                    <hr class="green-line">
                    <div class="upload-container">
                        <div class="kotak" id="uploadBox" onclick="document.getElementById('fileInput').click()">
                            <h2>
                                <span class="teks1">Upload your</span>
                                <span class="teks2" id="uploadText">file</span>
                            </h2>
                            <input type="file" name="file" id="fileInput" accept="image/*" style="display: none;" />
                        </div>

                        <div class="teks-samping">
                            <h3>Options</h3>
                            <hr class="green-line-option">
                            <div class="kotak-samping">
                                <h4>Title*</h4>
                                <input type="text" name="title" class="kotak-title" required>
                            </div>
                            <div class="kotak-samping">
                                <h4>Description*</h4>
                                <textarea name="description" class="kotak-description" required></textarea>
                            </div>
                            <button type="submit" class="button">Upload</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>

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
