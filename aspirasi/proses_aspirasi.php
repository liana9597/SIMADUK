<?php
// Koneksi ke database
$servername = "localhost"; // Ganti dengan host database Anda
$username = "root"; // Ganti dengan username database Anda
$password = ""; // Ganti dengan password database Anda
$dbname = "simaduk_migrasi"; // Ganti dengan nama database Anda

// Membuat koneksi
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nama_lengkap = $_POST['nama_lengkap'];
    $nik = $_POST['nik'];
    $judul_aspirasi = $_POST['judul_aspirasi'];
    $isi_aspirasi = $_POST['isi_aspirasi'];

    // Inisialisasi $target_file agar tidak undefined jika tidak ada file yang di-upload
    $target_file = ''; // Set to empty string if no file is uploaded

    // Proses upload file gambar jika ada
    if (isset($_FILES['file']) && $_FILES['file']['error'] == 0) {
        $target_dir = "uploads/"; // Folder tempat menyimpan file
        if (!is_dir($target_dir)) {
            mkdir($target_dir, 0777, true); // Membuat folder jika belum ada
        }
        $target_file = $target_dir . basename($_FILES["file"]["name"]);
        move_uploaded_file($_FILES["file"]["tmp_name"], $target_file); // Pindahkan file ke folder tujuan
    }

    // Menyimpan data ke database
    $sql = "INSERT INTO aspirasi (nama_lengkap, nik, judul_aspirasi, isi_aspirasi, file_path)
            VALUES ('$nama_lengkap', '$nik', '$judul_aspirasi', '$isi_aspirasi', '$target_file')";

    if ($conn->query($sql) === TRUE) {
        // Tampilkan pop-up sukses
        echo "
        <div class='popup' id='successPopup'>
            <div class='popup-content'>
                <span class='emoji'>😊</span>
                <h2>Aspirasi Anda Terkirim!</h2>
                <p>Terima kasih telah menyampaikan aspirasi Anda.</p>
                <a href='../halaman_utama/index.php' class='btn'>Kembali ke Halaman Utama</a>
            </div>
        </div>
        <style>
            body {
                font-family: Arial, sans-serif;
                margin: 0;
                padding: 0;
                background-color: #f4f4f4;
            }
            .popup {
                position: fixed;
                top: 0;
                left: 0;
                width: 100%;
                height: 100%;
                background: rgba(0, 0, 0, 0.6);
                display: flex;
                justify-content: center;
                align-items: center;
            }
            .popup-content {
                background: white;
                padding: 30px;
                text-align: center;
                border-radius: 10px;
                box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
                animation: fadeIn 0.3s ease-in-out;
            }
            .popup-content .emoji {
                font-size: 50px;
                display: block;
                margin-bottom: 10px;
            }
            .popup-content h2 {
                margin: 10px 0;
                color: #333;
            }
            .popup-content p {
                color: #666;
            }
            .popup-content .btn {
                display: inline-block;
                margin-top: 15px;
                padding: 10px 20px;
                background: #007BFF;
                color: white;
                text-decoration: none;
                border-radius: 5px;
                transition: background 0.3s;
            }
            .popup-content .btn:hover {
                background: #0056b3;
            }
            @keyframes fadeIn {
                from {
                    opacity: 0;
                    transform: scale(0.8);
                }
                to {
                    opacity: 1;
                    transform: scale(1);
                }
            }
        </style>
        ";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>
