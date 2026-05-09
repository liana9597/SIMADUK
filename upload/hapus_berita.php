<?php
$conn = new mysqli("localhost", "root", "", "simaduk_migrasi");
if ($conn->connect_error) die("Connection failed: " . $conn->connect_error);

$id = intval($_GET['id']);

// Ambil file_path dulu buat hapus file fotonya juga
$result = $conn->query("SELECT file_path FROM berita WHERE id = $id");
if ($row = $result->fetch_assoc()) {
  $file = "../upload/" . $row['file_path'];
  if (file_exists($file)) unlink($file); // hapus file foto dari server
}

$conn->query("DELETE FROM berita WHERE id = $id");
$conn->close();

header("Location: berita_list.php?status=deleted");
exit();
?>