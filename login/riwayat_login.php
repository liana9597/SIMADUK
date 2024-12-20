<?php
session_start(); // Memulai session

$conn = mysqli_connect("localhost", "root", "", "simaduk_migrasi");

if (!$conn) {
    die("Koneksi gagal: " . mysqli_connect_error());
}

// Pastikan user sudah login
if (!isset($_SESSION['username'])) {
    header("Location: form_login.html");
    exit();
}

$username = $_SESSION['username'];

// Query untuk mengambil data riwayat login
$sql = "SELECT id, username, login_time, ip_address FROM login_history WHERE username = ? ORDER BY login_time DESC";
$stmt = mysqli_prepare($conn, $sql);

$login_history = [];
if ($stmt) {
    mysqli_stmt_bind_param($stmt, "s", $username);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);

    while ($row = mysqli_fetch_assoc($result)) {
        $login_history[] = $row;
    }
    mysqli_stmt_close($stmt);
}

mysqli_close($conn);
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Riwayat Login</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f9f9f9;
            margin: 0;
            padding: 20px;
        }

        h1 {
            text-align: center;
            color: #333;
        }

        .table-container {
            max-width: 800px;
            margin: 20px auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        table, th, td {
            border: 1px solid #ddd;
        }

        th, td {
            padding: 10px;
            text-align: left;
        }

        th {
            background-color: #007BFF;
            color: white;
        }

        tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        tr:hover {
            background-color: #ddd;
        }

        .back-button {
            display: block;
            margin: 20px auto;
            text-align: center;
            padding: 10px 20px;
            background-color: #007BFF;
            color: white;
            text-decoration: none;
            border-radius: 5px;
        }

        .back-button:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <h1>Riwayat Login</h1>
    <div class="table-container">
        <?php if (!empty($login_history)): ?>
            <table>
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Username</th>
                        <th>Waktu Login</th>
                        <th>Alamat IP</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($login_history as $index => $history): ?>
                        <tr>
                            <td><?php echo $index + 1; ?></td>
                            <td><?php echo htmlspecialchars($history['username']); ?></td>
                            <td><?php echo htmlspecialchars($history['login_time']); ?></td>
                            <td><?php echo htmlspecialchars($history['ip_address']); ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        <?php else: ?>
            <p style="text-align: center; color: #666;">Belum ada riwayat login.</p>
        <?php endif; ?>
    </div>
    <a href="../beranda/beranda.php" class="back-button">Kembali ke Beranda</a>
</body>
</html>
