-- phpMyAdmin SQL Dump
-- version 6.0.0-dev+20251026.88b7dfd0f0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jan 24, 2026 at 09:19 AM
-- Server version: 8.4.3
-- PHP Version: 8.4.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pengaduan_sarana_sekolah`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id_admin` int NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id_admin`, `username`, `password`) VALUES
(1, 'Yoga', '123'),
(2, 'Alfi', '123'),
(3, 'Hilman', '123'),
(4, 'Resky', '123'),
(5, 'Punn', '123'),
(6, 'Fian', '123'),
(7, 'Arif', '123'),
(8, 'Arufian', '123'),
(9, 'hade', '123'),
(10, 'Maul', '123');

-- --------------------------------------------------------

--
-- Table structure for table `aspirasi`
--

CREATE TABLE `aspirasi` (
  `id_aspirasi` int NOT NULL,
  `id_kategori` int NOT NULL,
  `id_siswa` int NOT NULL,
  `tanggal_lapor` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `lokasi` varchar(50) NOT NULL,
  `ket_aspirasi` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `judul_aspirasi` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `aspirasi`
--

INSERT INTO `aspirasi` (`id_aspirasi`, `id_kategori`, `id_siswa`, `tanggal_lapor`, `lokasi`, `ket_aspirasi`, `judul_aspirasi`) VALUES
(1, 1, 1, '2026-01-16 03:16:46', 'dekat kantin', 'Meja rusak kakinya', 'Meja Rusak'),
(2, 3, 7, '2026-01-16 03:37:29', 'lapangan', 'lapangan bolong', 'Lapangsn bolong'),
(3, 2, 8, '2026-01-16 03:37:29', 'kelas', 'kela X RPL 1 temboknya bolong', 'Tembok Kelas'),
(4, 4, 5, '2026-01-16 03:37:29', 'toilet', 'toilet deket mushola banyak pandalisme', 'Toilet banyak coretan'),
(5, 5, 1, '2026-01-16 03:37:29', 'kelas', 'sapu hilang di kelas X RPL 4', 'Sapu hilang'),
(6, 3, 2, '2026-01-19 08:34:00', 'dekat kantin', 'ada kerusakan di tembok kantin', 'Tembok Kantin Rusak'),
(7, 1, 6, '2026-01-24 00:00:00', 'XI RPL 4', 'meja rusak', 'Meja rusak'),
(8, 1, 6, '2026-01-24 15:59:06', 'lapangn', 'ring basket rusak', 'Lapangan rusak'),
(9, 2, 6, '2026-01-24 16:05:35', 'X PPLG 1', 'tembuknya abruk', 'ruang kelas'),
(10, 1, 7, '2026-01-24 16:13:59', 'tes', 'tes', 'tes');

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE `kategori` (
  `id_kategori` int NOT NULL,
  `ket_kategori` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`id_kategori`, `ket_kategori`) VALUES
(1, 'Kursi atau Meja'),
(2, 'Bangunan'),
(3, 'Area terbuka'),
(4, 'Fasilitas umum'),
(5, 'Peralatan');

-- --------------------------------------------------------

--
-- Table structure for table `progres_aspirasi`
--

CREATE TABLE `progres_aspirasi` (
  `id_progres` int NOT NULL,
  `id_aspirasi` int NOT NULL,
  `tanggal_update` datetime NOT NULL,
  `id_admin` int NOT NULL,
  `umpan_balik` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `status` enum('menunggu','proses','selesai','') CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL DEFAULT 'menunggu'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `progres_aspirasi`
--

INSERT INTO `progres_aspirasi` (`id_progres`, `id_aspirasi`, `tanggal_update`, `id_admin`, `umpan_balik`, `status`) VALUES
(1, 1, '2026-01-16 03:32:33', 1, 'tong di tajongan jang', 'selesai'),
(2, 3, '2026-01-16 03:41:15', 2, 'sedang di perbaiki', 'proses'),
(3, 2, '2026-01-16 03:41:15', 5, 'sedang di perbaiki', 'proses'),
(4, 4, '2026-01-16 03:41:15', 6, 'ok', 'menunggu'),
(5, 5, '2026-01-16 03:41:15', 9, 'ok', 'menunggu'),
(6, 6, '2026-01-19 08:35:18', 2, 'akan segera di perbaiki', 'menunggu');

-- --------------------------------------------------------

--
-- Table structure for table `siswa`
--

CREATE TABLE `siswa` (
  `id_siswa` int NOT NULL,
  `nis` int NOT NULL,
  `kelas` varchar(10) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `siswa`
--

INSERT INTO `siswa` (`id_siswa`, `nis`, `kelas`, `password`) VALUES
(1, 971111117, 'XI RPL 1', '123'),
(2, 971111114, 'XI RPL 2', '123'),
(4, 971111116, 'XI RPL 1', '123'),
(5, 971111112, 'XI RPL 2', '123'),
(6, 971111118, 'XI RPL 2', '123'),
(7, 971111119, 'XI RPL 1', '123'),
(8, 971111113, 'XI RPL 4', '123'),
(9, 971111110, 'XI RPL 4', '123'),
(10, 971111113, 'XI RPL 4', '123'),
(11, 971111115, 'XI RPL 3', '123');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indexes for table `aspirasi`
--
ALTER TABLE `aspirasi`
  ADD PRIMARY KEY (`id_aspirasi`),
  ADD KEY `id_kategori` (`id_kategori`),
  ADD KEY `nis` (`id_siswa`);

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indexes for table `progres_aspirasi`
--
ALTER TABLE `progres_aspirasi`
  ADD PRIMARY KEY (`id_progres`),
  ADD KEY `nis` (`id_aspirasi`),
  ADD KEY `id_admin` (`id_admin`);

--
-- Indexes for table `siswa`
--
ALTER TABLE `siswa`
  ADD PRIMARY KEY (`id_siswa`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `aspirasi`
--
ALTER TABLE `aspirasi`
  MODIFY `id_aspirasi` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id_kategori` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `progres_aspirasi`
--
ALTER TABLE `progres_aspirasi`
  MODIFY `id_progres` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `siswa`
--
ALTER TABLE `siswa`
  MODIFY `id_siswa` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `aspirasi`
--
ALTER TABLE `aspirasi`
  ADD CONSTRAINT `aspirasi_ibfk_2` FOREIGN KEY (`id_siswa`) REFERENCES `siswa` (`id_siswa`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `aspirasi_ibfk_3` FOREIGN KEY (`id_kategori`) REFERENCES `kategori` (`id_kategori`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `progres_aspirasi`
--
ALTER TABLE `progres_aspirasi`
  ADD CONSTRAINT `progres_aspirasi_ibfk_1` FOREIGN KEY (`id_aspirasi`) REFERENCES `aspirasi` (`id_aspirasi`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `progres_aspirasi_ibfk_2` FOREIGN KEY (`id_admin`) REFERENCES `admin` (`id_admin`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
