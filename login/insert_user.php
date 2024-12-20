<?php

$conn = mysqli_connect("localhost", "root", "", "simaduk_migrasi");

if (!$conn) {
    die("Koneksi gagal: " . mysqli_connect_error());
}

$username = "admin";
$password = "123";

$hashed_password = password_hash($password, PASSWORD_DEFAULT);

$sql = "INSERT INTO users (username, password) VALUES (?, ?)";
$stmt = mysqli_prepare($conn, $sql);

if ($stmt) {
    mysqli_stmt_bind_param($stmt, "ss", $username, $hashed_password);
    if (mysqli_stmt_execute($stmt)) {
        echo "User berhasil ditambahkan.";
    } else {
        echo "Error: " . mysqli_error($conn);
    }
    mysqli_stmt_close($stmt);
} else {
    echo "Error dalam persiapan statement.";
}

mysqli_close($conn);
?>
