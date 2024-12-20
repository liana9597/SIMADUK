<?php
session_start();

// Cek apakah username sudah disimpan dalam session
if (!isset($_SESSION['username'])) {
    // Redirect ke form login jika tidak ada session
    header("Location: form_login.html");
    exit();
}

// Ambil username untuk ditampilkan
$username = htmlspecialchars($_SESSION['username']);
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Selamat Datang</title>
    <style>
        /* Fullscreen background overlay */
        body {
            margin: 0;
            padding: 0;
            background-color: rgba(0, 0, 0, 0.5);
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        /* Pop-up container */
        .popup-container {
            background-color: white;
            width: 400px;
            padding: 20px;
            border-radius: 10px;
            text-align: center;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
            font-family: Arial, sans-serif;
        }

        /* Icon */
        .popup-container .icon {
            font-size: 50px;
            color: #4CAF50; /* Warna hijau untuk centang */
            margin-bottom: 15px;
        }

        /* Judul */
        .popup-container h2 {
            margin: 0;
            font-size: 24px;
            color: #333;
        }

        /* Pesan tambahan */
        .popup-container p {
            margin: 10px 0;
            font-size: 16px;
            color: #666;
        }

        /* Tombol */
        .popup-container button {
            margin-top: 20px;
            padding: 10px 20px;
            font-size: 16px;
            color: white;
            background-color: #007BFF;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        .popup-container button:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <div class="popup-container">
        <!-- Ikon centang -->
        <div class="icon">✔</div>

        <!-- Judul -->
        <h2>Login Admin Berhasil</h2>

        <!-- Pesan -->
        <p>Selamat datang, <?php echo $username; ?>!</p>

        <!-- Tombol lanjut -->
        <button onclick="redirectToBeranda()">Lanjut ke Beranda</button>
    </div>

    <script>
        // Fungsi untuk mengarahkan ke beranda
        function redirectToBeranda() {
            window.location.href = '../beranda/beranda.php';
        }
    </script>
</body>
</html>
