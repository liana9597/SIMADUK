<?php
session_start(); // Mulai session

$conn = mysqli_connect("localhost", "root", "", "simaduk_migrasi");

if (!$conn) {
    die("Koneksi gagal: " . mysqli_connect_error());
}

$error_message = ""; // Variabel untuk menyimpan pesan error
$icon_class = ""; // Menentukan ikon yang akan digunakan (centang atau silang)

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql = "SELECT id, password FROM users WHERE username = ?";
    $stmt = mysqli_prepare($conn, $sql);

    if ($stmt) {
        mysqli_stmt_bind_param($stmt, "s", $username);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_store_result($stmt);

        if (mysqli_stmt_num_rows($stmt) == 1) {
            mysqli_stmt_bind_result($stmt, $id, $hashed_password);
            mysqli_stmt_fetch($stmt);

            if (password_verify($password, $hashed_password)) {
                // Login berhasil, simpan session dan redirect ke login_success.php
                $_SESSION['username'] = $username;
                header("Location: login_success.php");
                exit();
            } else {
                // Password salah
                $error_message = "Password salah. Coba ulangi lagi.";
                $icon_class = "❌"; // Ikon silang
            }
        } else {
            // Username tidak ditemukan
            $error_message = "Username tidak ditemukan. Coba ulangi lagi.";
            $icon_class = "❌"; // Ikon silang
        }
        mysqli_stmt_close($stmt);
    }
}

mysqli_close($conn);
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
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

        /* Ikon */
        .popup-container .icon {
            font-size: 50px;
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

        /* Tombol coba lagi */
        .popup-container .retry-btn {
            background-color: #FF5722;
        }
        .popup-container .retry-btn:hover {
            background-color: #E64A19;
        }
    </style>
</head>
<body>
    <?php if ($error_message): ?>
    <div class="popup-container">
        <!-- Ikon tergantung kondisi (centang atau silang) -->
        <div class="icon" style="color: <?php echo $icon_class === '❌' ? '#FF0000' : '#4CAF50'; ?>"><?php echo $icon_class; ?></div>

        <!-- Judul -->
        <h2><?php echo $icon_class === '❌' ? 'Login Gagal' : 'Login Berhasil'; ?></h2>

        <!-- Pesan -->
        <p><?php echo $error_message; ?></p>

        <!-- Tombol Lanjut ke Beranda -->
        <?php if ($icon_class !== '❌'): ?>
            <button onclick="redirectToBeranda()">Lanjut ke Beranda</button>
        <?php else: ?>
            <!-- Tombol coba lagi jika login gagal -->
            <button onclick="retryLogin()">Coba Lagi</button>
        <?php endif; ?>
    </div>
    <?php endif; ?>

    <script>
        // Fungsi untuk mengarahkan ke beranda
        function redirectToBeranda() {
            window.location.href = '../beranda/beranda.php';
        }

        // Fungsi untuk kembali ke halaman login jika login gagal
        function retryLogin() {
            window.location.href = 'form_login.html'; // Ganti dengan halaman login Anda
        }
    </script>
</body>
</html>
