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

$message = ""; // Variabel untuk menyimpan pesan pop-up

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $title = $_POST['title'];
    $description = $_POST['description'];

    // Menangani upload file
    if (isset($_FILES['file']) && $_FILES['file']['error'] == 0) {
        $fileTmpPath = $_FILES['file']['tmp_name'];
        $fileName = $_FILES['file']['name'];
        $fileSize = $_FILES['file']['size'];
        $fileType = $_FILES['file']['type'];

        // Mengatur nama file untuk disimpan di server
        $fileNameCmps = explode(".", $fileName);
        $fileExtension = strtolower(end($fileNameCmps));
        $newFileName = md5(time() . $fileName) . '.' . $fileExtension;

        // Update path to uploads folder
        $uploadPath = __DIR__ . '/../upload/uploads/' . $newFileName;

        if (!is_dir(__DIR__ . '/../upload/uploads')) {
            mkdir(__DIR__ . '/../upload/uploads', 0777, true); // Membuat folder jika belum ada
        }

        // Memindahkan file ke folder upload
        if (move_uploaded_file($fileTmpPath, $uploadPath)) {
            $relativePath = '../upload/uploads/' . $newFileName; // Path relatif
            $sql = "INSERT INTO berita (title, description, file_path, created_at) 
                    VALUES ('$title', '$description', '$relativePath', NOW())";
            if ($conn->query($sql) === TRUE) {
                $message = "Unggahan terkirim, kembali ke beranda";
            } else {
                $message = "Error: " . $sql . "<br>" . $conn->error;
            }
        } else {
            $message = "There was an error uploading the file.";
        }
        
    } else {
        $message = "No file uploaded or there was an error.";
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Unggahan</title>
    <style>
        /* Pop-up styling */
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
            visibility: hidden;
            opacity: 0;
            transition: visibility 0s, opacity 0.3s ease-in-out;
        }

        .popup.active {
            visibility: visible;
            opacity: 1;
        }

        .popup-content {
            background: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            text-align: center;
            max-width: 400px;
        }

        .popup-content h2 {
            margin: 0 0 10px;
            font-size: 18px;
            color: #333;
        }

        .popup-content p {
            font-size: 16px;
            margin-bottom: 15px;
        }

        .popup-content button {
            background-color: #4CAF50;
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
        }

        .popup-content button:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>
    <?php if ($message): ?>
    <div class="popup active" id="popup">
        <div class="popup-content">
            <h2>Berhasil!</h2>
            <p><?php echo $message; ?></p>
            <button onclick="closePopup()">Kembali ke Beranda</button>
        </div>
    </div>
    <?php endif; ?>

    <script>
        function closePopup() {
            document.getElementById('popup').classList.remove('active');
            window.location.href = '../beranda/beranda.php'; // Redirect ke beranda
        }
    </script>
</body>
</html>
