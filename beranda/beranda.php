<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: ../login/form_login.html");
    exit();
}

$conn = new mysqli("localhost", "root", "", "simaduk_migrasi");
if ($conn->connect_error) die("Connection failed: " . $conn->connect_error);

// ── Card counts ──────────────────────────────────────────────
$totalMigrasi  = $conn->query("SELECT COUNT(*) AS total FROM migrasi")->fetch_assoc()['total'];
$totalAspirasi = $conn->query("SELECT COUNT(*) AS total FROM aspirasi")->fetch_assoc()['total'];
$totalBerita   = $conn->query("SELECT COUNT(*) AS total FROM berita")->fetch_assoc()['total'];

// ── Chart 1: Migrasi masuk per bulan (12 bulan terakhir) ─────
$chartLabels = [];
$chartData   = [];
$res = $conn->query("
    SELECT DATE_FORMAT(created_at, '%b %Y') AS bulan,
           YEAR(created_at)  AS y,
           MONTH(created_at) AS m,
           COUNT(*) AS total
    FROM aspirasi
    GROUP BY YEAR(created_at), MONTH(created_at), DATE_FORMAT(created_at, '%b %Y')
    ORDER BY y ASC, m ASC
    LIMIT 12
");
while ($row = $res->fetch_assoc()) {
    $chartLabels[] = $row['bulan'];
    $chartData[]   = (int)$row['total'];
}

// ── Chart 2: Komposisi data (pie/doughnut) ───────────────────
$pieLabels = ['Migrasi', 'Aspirasi', 'Berita'];
$pieData   = [(int)$totalMigrasi, (int)$totalAspirasi, (int)$totalBerita];

// ── Aspirasi terbaru (5 data) ────────────────────────────────
$aspirasi5 = $conn->query("
    SELECT nama_lengkap, judul_aspirasi, created_at
    FROM aspirasi
    ORDER BY created_at DESC
    LIMIT 5
");

$conn->close();
?>
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Admin Dashboard</title>
  <link rel="stylesheet" href="style.css">
  <script src="https://cdn.jsdelivr.net/npm/chart.js@4.4.4/dist/chart.umd.js"></script>
</head>
<body>

<div class="container">

  <!-- ── Navigasi ── -->
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
        <a href="../upload/berita_list.php">
          <span class="icon"><ion-icon name="newspaper-outline"></ion-icon></span>
          <span class="title">Kelola Berita</span>
        </a>
      </li>
      <li>
        <a href="../migrasi/rekapMigrasi.php">
          <span class="icon"><ion-icon name="folder-outline"></ion-icon></span>
          <span class="title">Rekap Migrasi</span>
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

  <!-- ── Main ── -->
  <div class="main">

    <!-- Topbar -->
    <div class="topbar">
      <div class="toggle"><ion-icon name="menu-outline"></ion-icon></div>
      <div class="search">
        <label>
          <input type="text" placeholder="search here" />
          <ion-icon name="search-outline"></ion-icon>
        </label>
      </div>
      <div class="user">
        <img src="../img/Profil.jpeg" alt="" style="margin-top:4%;" />
      </div>
    </div>

    <!-- ── Cards ── -->
    <div class="cardBox">

      <div class="card">
        <div>
          <div class="number"><?= number_format($totalMigrasi) ?></div>
          <div class="cardName">Rekap Migrasi</div>
        </div>
        <div class="iconBox"><ion-icon name="folder-outline"></ion-icon></div>
      </div>

      <div class="card">
        <div>
          <div class="number"><?= number_format($totalAspirasi) ?></div>
          <div class="cardName">Aspirasi Masuk</div>
        </div>
        <div class="iconBox"><ion-icon name="reader-outline"></ion-icon></div>
      </div>

      <div class="card">
        <div>
          <div class="number"><?= number_format($totalBerita) ?></div>
          <div class="cardName">Berita / Postingan</div>
        </div>
        <div class="iconBox"><ion-icon name="newspaper-outline"></ion-icon></div>
      </div>

    </div>

    <!-- ── Charts ── -->
    <div class="graphBox">

      <!-- Chart 1: Aspirasi per bulan (bar) -->
      <div class="box">
        <h3 style="margin-bottom:10px;font-size:14px;color:#555;">Aspirasi Masuk per Bulan</h3>
        <canvas id="myChart"></canvas>
      </div>

      <!-- Chart 2: Komposisi data (doughnut) -->
      <div class="box" style="display:flex;flex-direction:column;align-items:center;justify-content:center;">
        <h3 style="margin-bottom:10px;font-size:14px;color:#555;align-self:flex-start;">Komposisi Data</h3>
        <div style="width:220px;height:220px;">
          <canvas id="earning"></canvas>
        </div>
      </div>

    </div>

    <!-- ── Aspirasi Terbaru ── -->
    <div class="recentOrders" style="margin:20px 20px 40px;">
      <div class="cardHeader">
        <h2>Aspirasi Terbaru</h2>
        <a href="../berita/index.php" class="btn-lihat">Lihat Semua</a>
      </div>
      <table style="width:100%;border-collapse:collapse;font-size:13px;">
        <thead>
          <tr style="background:#f5f5f5;">
            <th style="padding:10px 14px;text-align:left;border-bottom:2px solid #eee;">Nama</th>
            <th style="padding:10px 14px;text-align:left;border-bottom:2px solid #eee;">Judul Aspirasi</th>
            <th style="padding:10px 14px;text-align:left;border-bottom:2px solid #eee;white-space:nowrap;">Tanggal</th>
          </tr>
        </thead>
        <tbody>
          <?php if ($aspirasi5->num_rows > 0): ?>
            <?php while ($row = $aspirasi5->fetch_assoc()): ?>
            <tr style="border-bottom:1px solid #f0f0f0;">
              <td style="padding:10px 14px;"><?= htmlspecialchars($row['nama_lengkap']) ?></td>
              <td style="padding:10px 14px;"><?= htmlspecialchars($row['judul_aspirasi']) ?></td>
              <td style="padding:10px 14px;white-space:nowrap;color:#888;"><?= date("d M Y", strtotime($row['created_at'])) ?></td>
            </tr>
            <?php endwhile; ?>
          <?php else: ?>
            <tr><td colspan="3" style="text-align:center;color:#aaa;padding:20px;">Belum ada aspirasi masuk</td></tr>
          <?php endif; ?>
        </tbody>
      </table>
    </div>

  </div><!-- /main -->
</div><!-- /container -->

<!-- Ionicons -->
<script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>

<script>
  // ── Hover nav ──
  document.querySelectorAll(".navigation li").forEach(li => {
    li.addEventListener("mouseover", function () {
      document.querySelectorAll(".navigation li").forEach(i => i.classList.remove("hovered"));
      this.classList.add("hovered");
    });
  });

  // ── Toggle sidebar ──
  document.querySelector(".toggle").onclick = function () {
    document.querySelector(".navigation").classList.toggle("active");
    document.querySelector(".main").classList.toggle("active");
  };

  // ── Chart 1: Bar – Aspirasi per bulan ──
  new Chart(document.getElementById("myChart"), {
    type: "bar",
    data: {
      labels: <?= json_encode($chartLabels) ?>,
      datasets: [{
        label: "Aspirasi Masuk",
        data: <?= json_encode($chartData) ?>,
        backgroundColor: "rgba(21,49,9,0.7)",
        borderColor: "#153109",
        borderWidth: 1,
        borderRadius: 6
      }]
    },
    options: {
      responsive: true,
      plugins: { legend: { display: false } },
      scales: { y: { beginAtZero: true, ticks: { precision: 0 } } }
    }
  });

  // ── Chart 2: Doughnut – Komposisi data ──
  new Chart(document.getElementById("earning"), {
    type: "doughnut",
    data: {
      labels: <?= json_encode($pieLabels) ?>,
      datasets: [{
        data: <?= json_encode($pieData) ?>,
        backgroundColor: ["#153109", "#728d5a", "#ebf1b1"],
        borderColor: "#fff",
        borderWidth: 3
      }]
    },
    options: {
      responsive: true,
      plugins: {
        legend: { position: "bottom" }
      }
    }
  });
</script>
</body>
</html>