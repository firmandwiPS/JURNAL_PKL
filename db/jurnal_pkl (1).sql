-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jun 13, 2025 at 12:20 AM
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
-- Database: `jurnal_pkl`
--

-- --------------------------------------------------------

--
-- Table structure for table `jurnal`
--

CREATE TABLE `jurnal` (
  `id_jurnal` int NOT NULL,
  `nis` int DEFAULT NULL,
  `tanggal_kegiatan` date DEFAULT NULL,
  `uraian_kegiatan` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci,
  `catatan_pembimbing` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci,
  `paraf_pembimbing` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `jurnal`
--

INSERT INTO `jurnal` (`id_jurnal`, `nis`, `tanggal_kegiatan`, `uraian_kegiatan`, `catatan_pembimbing`, `paraf_pembimbing`) VALUES
(46, 222302, '2025-06-13', 'minum ', 'minum ', 'paraf_1749716827.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `laporan_pkl`
--

CREATE TABLE `laporan_pkl` (
  `id_laporan_pkl` int NOT NULL,
  `nis` int DEFAULT NULL,
  `file_laporan` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `file_project` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `nilai_akhir_pkl` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `laporan_pkl`
--

INSERT INTO `laporan_pkl` (`id_laporan_pkl`, `nis`, `file_laporan`, `file_project`, `nilai_akhir_pkl`) VALUES
(14, 10227463, 'JADWAL_PIKET_BMTI_PPLG-1_.docx', 'Bootslander (1).zip', 0);

-- --------------------------------------------------------

--
-- Table structure for table `presensi`
--

CREATE TABLE `presensi` (
  `id_presensi` int NOT NULL,
  `nis` int DEFAULT NULL,
  `tanggal` date DEFAULT NULL,
  `keterangan` varchar(10) COLLATE utf8mb4_general_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `presensi`
--

INSERT INTO `presensi` (`id_presensi`, `nis`, `tanggal`, `keterangan`) VALUES
(14, 10227463, '2025-01-30', 'Masuk');

-- --------------------------------------------------------

--
-- Table structure for table `siswa`
--

CREATE TABLE `siswa` (
  `id_siswa` int NOT NULL,
  `nis` int DEFAULT NULL,
  `nama_siswa` varchar(100) DEFAULT NULL,
  `jenis_kelamin` varchar(15) DEFAULT NULL,
  `asal_sekolah` varchar(100) DEFAULT NULL,
  `tanggal_mulai` date DEFAULT NULL,
  `tanggal_selesai` date DEFAULT NULL,
  `no_hp` varchar(15) DEFAULT NULL,
  `alamat` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `siswa`
--

INSERT INTO `siswa` (`id_siswa`, `nis`, `nama_siswa`, `jenis_kelamin`, `asal_sekolah`, `tanggal_mulai`, `tanggal_selesai`, `no_hp`, `alamat`) VALUES
(6, 222301, 'Achmad Rifaldy ', 'LAKI-LAKI', 'SMK CIBITUNG 1 ', '2025-01-01', '2025-06-30', '08215435364', 'BEKASI '),
(9, 222302, 'Firman Dwi ', 'LAKI-LAKI', 'SMK CIBITUNG 1 ', '2025-01-20', '2025-07-18', '085959903083', 'BEKASI ');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `jurnal`
--
ALTER TABLE `jurnal`
  ADD PRIMARY KEY (`id_jurnal`),
  ADD KEY `nis` (`nis`);

--
-- Indexes for table `siswa`
--
ALTER TABLE `siswa`
  ADD PRIMARY KEY (`id_siswa`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `jurnal`
--
ALTER TABLE `jurnal`
  MODIFY `id_jurnal` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT for table `siswa`
--
ALTER TABLE `siswa`
  MODIFY `id_siswa` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
