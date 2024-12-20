-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Dec 19, 2024 at 12:54 PM
-- Server version: 8.0.30
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `simaduk_migrasi`
--

-- --------------------------------------------------------

--
-- Table structure for table `aspirasi`
--

CREATE TABLE `aspirasi` (
  `id` int NOT NULL,
  `nama_lengkap` varchar(255) DEFAULT NULL,
  `nik` varchar(255) DEFAULT NULL,
  `judul_aspirasi` text,
  `isi_aspirasi` text,
  `file_path` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `nama` varchar(255) DEFAULT NULL,
  `judul` varchar(255) DEFAULT NULL,
  `isi` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `aspirasi`
--

INSERT INTO `aspirasi` (`id`, `nama_lengkap`, `nik`, `judul_aspirasi`, `isi_aspirasi`, `file_path`, `created_at`, `nama`, `judul`, `isi`) VALUES
(7, 'Hadi Sutomo', '4337855201230112', 'Banjir', 'Banjir di jalan Sukasayri semakin dalam dan...', 'uploads/banjir.webp', '2024-12-13 17:05:25', NULL, NULL, NULL),
(8, 'Mika Putri', '4337890701230112', 'longsor', 'longsor di jalan melati', 'uploads/longsor.jpeg', '2024-12-13 17:06:36', NULL, NULL, NULL),
(9, 'Ida', '3452657567645', 'Jalan Rusak', 'segera di perbaiki', 'uploads/images.jpeg', '2024-12-14 01:28:16', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `berita`
--

CREATE TABLE `berita` (
  `id` int NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `file_path` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `berita`
--

INSERT INTO `berita` (`id`, `title`, `description`, `file_path`, `created_at`) VALUES
(10, 'Mayat Tanpa Identitas', 'Mayat Wanita Yang Ditemukan Warga Di Saluran Irigasi Desa...', 'uploads/5719943ad6d036e4142ecde528de2e95.jpeg', '2024-12-13 16:18:55'),
(11, 'Sertijab Kepala Desa', 'Kapolsek Rengasdengklok Hadiri Sertijab Kepala Desa Kemiri...', 'uploads/61546ef2c124640dbd3c45eb66dd02d7.jpeg', '2024-12-13 16:19:37'),
(12, 'Jalan Raya Kemiri', 'Jalan Raya Kemiri kembali di perbaiki dan sudah bisa digunakan...', 'uploads/37d76842b848240072ea52e38abdcf65.jpg', '2024-12-13 16:24:36'),
(13, 'Kebakaran Rumah Warga', 'Personil Polsek Rengasdengklok, Cek Lokasi Kebakaran Rumah Di...', 'uploads/a26b85c50fe2711a1deee2e58a37010a.jpeg', '2024-12-13 16:25:16'),
(14, 'Kades', 'Kades Kemiri Nyatakan Perihal 17 Agustus dan Pencalonannya...', 'uploads/b8395f16daf27ad17ed43fb85ffa06a9.jpg', '2024-12-13 16:25:50'),
(15, 'Cek KTP', 'Anggota Unit Reskrim Polsek Rengasdengklok Cek TKP...', 'uploads/7cb9ba95feddb815767d629a8cf5303b.jpeg', '2024-12-13 16:26:49'),
(16, 'longsor', 'longsor di jalan kayumanis disebabakan...', 'uploads/bb9851d08ec5129e3d8f07517f16cbad.jpeg', '2024-12-13 17:47:14'),
(17, 'Mayat Tanpa Identitas', 'Ditemukan mayat wanita di jalan...', 'uploads/94e9f7a9ef84ea4c54ee12ae82b004e9.jpeg', '2024-12-14 01:29:58'),
(22, 'mhgh', 'nb', '../upload/uploads/234f92c15621476f14d44368cdc23057.jpeg', '2024-12-14 01:57:54'),
(23, 'Mayat Tanpa Identitas', 'Ditemukan  Mayat Wanita di sisi jembatan di jalan...', '../upload/uploads/4f9c6cc9572b1707b353ca46954ed4dc.jpeg', '2024-12-14 02:02:29'),
(24, 'Sertijab Kepala Desa', 'Sertijab Kepala Desa di kantor desa untuk...', '../upload/uploads/220fcc7933f67fb1dcf7cc333e5dab6e.jpeg', '2024-12-14 02:03:04'),
(25, 'Jalan Raya Kemiri', 'Jalan Raya Kemiri sudah kembali di perbaiki...', '../upload/uploads/65cc97756f00e25ee75b77255a6cfde5.jpg', '2024-12-14 02:03:56'),
(26, 'Kebakaran Rumah Warga', 'Polisi setempat memeriksa korban kebakaran di...', '../upload/uploads/61681789d53f916b8b0ea1a8ceeb0d82.jpeg', '2024-12-14 02:05:06'),
(27, 'Kepala Desa mengumumkan Sertijab', 'Kepala Desa Kemiri mengumumkan setijab yang akan dilaksanakan...', '../upload/uploads/ad7b3558087495842924b804bb946d07.jpg', '2024-12-14 02:06:12');

-- --------------------------------------------------------

--
-- Table structure for table `migrasi`
--

CREATE TABLE `migrasi` (
  `id` int NOT NULL,
  `NIK` char(16) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `tempat_lahir` varchar(50) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `agama` varchar(20) NOT NULL,
  `jenis_kelamin` enum('Laki-laki','Perempuan') NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `status_pernikahan` enum('Belum Menikah','Menikah','Cerai') NOT NULL,
  `kartu_keluarga` char(16) NOT NULL,
  `kedudukan_keluarga` varchar(50) NOT NULL,
  `kewarganegaraan` varchar(30) NOT NULL,
  `alamat_asal` varchar(255) NOT NULL,
  `alamat_tujuan` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `migrasi`
--

INSERT INTO `migrasi` (`id`, `NIK`, `nama`, `tempat_lahir`, `tanggal_lahir`, `agama`, `jenis_kelamin`, `alamat`, `status_pernikahan`, `kartu_keluarga`, `kedudukan_keluarga`, `kewarganegaraan`, `alamat_asal`, `alamat_tujuan`) VALUES
(1, '1234567890123456', 'Liana Syifa Fauzia', 'Regasdengklok', '2024-12-14', 'Islam', 'Perempuan', 'Rengasdengklok', 'Menikah', '1234567891011765', 'istri', 'Indonesia', 'Rengasdengklok', 'Lamaran'),
(3, '1234567807433253', 'Ririn Dwi Ariyanti', 'karanganyar', '2024-12-14', 'Islam', 'Perempuan', 'Lamaran', 'Belum Menikah', '1234567891011765', 'anak', 'Indonesia', 'Rengasdengklok\r\nkemiri', 'Bolang');

-- --------------------------------------------------------

--
-- Table structure for table `uploads`
--

CREATE TABLE `uploads` (
  `id` int NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `file_path` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `created_at`) VALUES
(1, 'admin', '$2y$10$IcjPqPESwo9dobMHvtYdkeEfCeNc6Cs/lWPXbzZj.esloXiRG2vJa', '2024-12-13 14:13:40');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `aspirasi`
--
ALTER TABLE `aspirasi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `berita`
--
ALTER TABLE `berita`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrasi`
--
ALTER TABLE `migrasi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `uploads`
--
ALTER TABLE `uploads`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `aspirasi`
--
ALTER TABLE `aspirasi`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `berita`
--
ALTER TABLE `berita`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `migrasi`
--
ALTER TABLE `migrasi`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `uploads`
--
ALTER TABLE `uploads`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
