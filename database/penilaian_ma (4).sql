-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 09, 2025 at 11:26 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.1.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `penilaian_ma`
--

-- --------------------------------------------------------

--
-- Table structure for table `ekstra`
--

CREATE TABLE `ekstra` (
  `id_ekstra` int(11) NOT NULL,
  `id_periode` int(11) NOT NULL,
  `nm_ekstra` varchar(30) NOT NULL,
  `penanggung_jawab` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `ekstra`
--

INSERT INTO `ekstra` (`id_ekstra`, `id_periode`, `nm_ekstra`, `penanggung_jawab`) VALUES
(1, 1, 'Pramuka', 'Fajar');

-- --------------------------------------------------------

--
-- Table structure for table `ekstra_siswa`
--

CREATE TABLE `ekstra_siswa` (
  `id_ekstra_siswa` int(11) NOT NULL,
  `id_ekstra` int(11) NOT NULL,
  `id_siswa` int(11) NOT NULL,
  `id_periode` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `ekstra_siswa`
--

INSERT INTO `ekstra_siswa` (`id_ekstra_siswa`, `id_ekstra`, `id_siswa`, `id_periode`) VALUES
(1, 1, 1, 1),
(2, 1, 2, 1),
(3, 1, 3, 1);

-- --------------------------------------------------------

--
-- Table structure for table `guru`
--

CREATE TABLE `guru` (
  `id_guru` int(11) NOT NULL,
  `nip` int(11) NOT NULL,
  `nm_guru` varchar(30) NOT NULL,
  `alamat_guru` text DEFAULT NULL,
  `jk_guru` enum('L','P') NOT NULL,
  `tgl_lahir` date DEFAULT NULL,
  `no_hp_guru` varchar(13) DEFAULT NULL,
  `foto` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `guru`
--

INSERT INTO `guru` (`id_guru`, `nip`, `nm_guru`, `alamat_guru`, `jk_guru`, `tgl_lahir`, `no_hp_guru`, `foto`) VALUES
(1, 1111, 'ulya', 'Jl. Merdeka No. 101', 'P', '1980-06-15', '81234567890', 'ahmad.png'),
(2, 1112, 'Endang', 'Jl. Kembang No. 21', 'P', '1982-08-20', '81234567891', 'siti.png'),
(3, 1113, 'bagus', 'Jl. Mawar No. 3', 'L', '1975-03-22', '81234567892', '6c757d.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `jadwal_siswa`
--

CREATE TABLE `jadwal_siswa` (
  `id_jadwal_siswa` int(11) NOT NULL,
  `id_siswa` int(11) NOT NULL,
  `id_mapel` int(11) NOT NULL,
  `id_guru` int(11) NOT NULL,
  `id_kelas` int(11) NOT NULL,
  `hari` varchar(10) DEFAULT NULL,
  `waktu_awal` time DEFAULT NULL,
  `waktu_akhir` time DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `jadwal_siswa`
--

INSERT INTO `jadwal_siswa` (`id_jadwal_siswa`, `id_siswa`, `id_mapel`, `id_guru`, `id_kelas`, `hari`, `waktu_awal`, `waktu_akhir`) VALUES
(1, 1, 1, 1, 1, 'Senin', '07:00:00', '07:00:00'),
(2, 2, 1, 1, 1, 'senin', '07:00:00', '08:00:00'),
(3, 3, 1, 1, 1, 'senin', '07:00:00', '08:00:00'),
(4, 1, 2, 2, 1, 'senin', '08:00:00', '09:00:00'),
(5, 2, 2, 2, 1, 'senin', '08:00:00', '09:00:00'),
(6, 3, 2, 2, 1, 'senin', '08:00:00', '09:00:00'),
(7, 1, 3, 3, 1, 'senin', '09:00:00', '10:00:00'),
(8, 2, 3, 3, 1, 'senin', '09:00:00', '10:00:00'),
(9, 3, 3, 3, 1, 'senin', '09:00:00', '10:00:00'),
(10, 1, 4, 1, 1, 'Senin', '07:00:00', '08:00:00'),
(11, 2, 4, 1, 1, 'Senin', '07:00:00', '08:00:00'),
(12, 3, 4, 1, 1, 'Senin', '07:00:00', '08:00:00'),
(13, 1, 5, 2, 1, 'Selasa', '07:00:00', '08:00:00'),
(14, 2, 5, 2, 1, 'Selasa', '07:00:00', '08:00:00'),
(15, 3, 5, 2, 1, 'Selasa', '07:00:00', '08:00:00'),
(16, 1, 6, 3, 1, 'Rabu', '07:00:00', '08:00:00'),
(17, 2, 6, 3, 1, 'Rabu', '07:00:00', '08:00:00'),
(18, 3, 6, 3, 1, 'Rabu', '07:00:00', '08:00:00'),
(19, 1, 7, 1, 1, 'Rabu', '07:00:00', '08:00:00'),
(20, 2, 7, 1, 1, 'Rabu', '07:00:00', '08:00:00'),
(21, 3, 7, 1, 1, 'Rabu', '07:00:00', '08:00:00'),
(22, 1, 8, 2, 1, 'Kamis', '07:00:00', '08:00:00'),
(23, 2, 8, 2, 1, 'Kamis', '07:00:00', '08:00:00'),
(24, 3, 8, 2, 1, 'Kamis', '07:00:00', '08:00:00'),
(25, 1, 9, 3, 2, 'Jumat', '07:00:01', '08:00:01'),
(26, 2, 9, 3, 2, 'Jumat', '07:00:02', '08:00:02'),
(27, 3, 9, 3, 2, 'Jumat', '07:00:03', '08:00:03');

-- --------------------------------------------------------

--
-- Table structure for table `kehadiran_siswa`
--

CREATE TABLE `kehadiran_siswa` (
  `id_kehadiran` int(11) NOT NULL,
  `id_siswa` int(11) NOT NULL,
  `tgl_masuk` date DEFAULT NULL,
  `jam_masuk` time DEFAULT NULL,
  `jam_pulang` time DEFAULT NULL,
  `status` enum('Masuk','Tidak Masuk','Izin') NOT NULL,
  `keterangan` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `kehadiran_siswa`
--

INSERT INTO `kehadiran_siswa` (`id_kehadiran`, `id_siswa`, `tgl_masuk`, `jam_masuk`, `jam_pulang`, `status`, `keterangan`) VALUES
(1, 1, '2024-10-14', '07:00:00', '12:00:00', 'Masuk', '-'),
(2, 2, '2024-10-14', '07:00:00', '12:00:00', 'Masuk', '-'),
(3, 3, '2024-10-14', '07:00:00', '12:00:00', 'Masuk', '-');

-- --------------------------------------------------------

--
-- Table structure for table `kelas`
--

CREATE TABLE `kelas` (
  `id_kelas` int(11) NOT NULL,
  `nm_kelas` varchar(50) DEFAULT NULL,
  `kelas` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `kelas`
--

INSERT INTO `kelas` (`id_kelas`, `nm_kelas`, `kelas`) VALUES
(1, 'IPA 1', 1);

-- --------------------------------------------------------

--
-- Table structure for table `mapel`
--

CREATE TABLE `mapel` (
  `id_mapel` int(11) NOT NULL,
  `id_periode` int(11) NOT NULL,
  `nm_mapel` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `mapel`
--

INSERT INTO `mapel` (`id_mapel`, `id_periode`, `nm_mapel`) VALUES
(1, 1, 'BAHASA INDONESIA'),
(2, 1, 'MATEMATIKA'),
(3, 1, 'BAHASA INGGRIS'),
(4, 2, 'BAHASA INDONESIA'),
(5, 2, 'MATEMATIKA'),
(6, 2, 'BAHASA INGGRIS'),
(7, 3, 'BAHASA INDONESIA'),
(8, 3, 'MATEMATIKA'),
(9, 3, 'BAHASA INGGRIS');

-- --------------------------------------------------------

--
-- Table structure for table `nilai_ekstra`
--

CREATE TABLE `nilai_ekstra` (
  `id_nilai_ekstra` int(11) NOT NULL,
  `id_siswa` int(11) NOT NULL,
  `id_ekstra_siswa` int(11) NOT NULL,
  `nilai` int(11) DEFAULT NULL,
  `ket_nilai` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `nilai_ekstra`
--

INSERT INTO `nilai_ekstra` (`id_nilai_ekstra`, `id_siswa`, `id_ekstra_siswa`, `nilai`, `ket_nilai`) VALUES
(1, 1, 1, 80, '-'),
(2, 2, 1, 85, '-'),
(3, 3, 1, 85, '-');

-- --------------------------------------------------------

--
-- Table structure for table `nilai_mapel`
--

CREATE TABLE `nilai_mapel` (
  `id_nilai_mapel` int(11) NOT NULL,
  `id_siswa` int(11) NOT NULL,
  `id_jadwal` int(11) NOT NULL,
  `nilai` int(11) DEFAULT NULL,
  `ket_nilai` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `nilai_mapel`
--

INSERT INTO `nilai_mapel` (`id_nilai_mapel`, `id_siswa`, `id_jadwal`, `nilai`, `ket_nilai`) VALUES
(1, 1, 1, 75, 'UH1'),
(2, 1, 1, 71, 'UH2'),
(3, 1, 1, 87, 'UH3'),
(4, 1, 1, 78, 'UH4'),
(5, 1, 1, 79, 'UTS'),
(6, 1, 1, 92, 'UAS'),
(7, 2, 2, 82, 'UH1'),
(8, 2, 2, 80, 'UH2'),
(9, 2, 2, 85, 'UH3'),
(10, 2, 2, 80, 'UH4'),
(11, 2, 2, 85, 'UTS'),
(12, 2, 2, 92, 'UAS'),
(13, 3, 3, 70, 'UH1'),
(14, 3, 3, 91, 'UH2'),
(15, 3, 3, 87, 'UH3'),
(16, 3, 3, 87, 'UH4'),
(17, 3, 3, 76, 'UTS'),
(18, 3, 3, 73, 'UAS'),
(19, 1, 4, 93, 'UH1'),
(20, 1, 4, 75, 'UH2'),
(21, 1, 4, 90, 'UH3'),
(22, 1, 4, 75, 'UH4'),
(23, 1, 4, 79, 'UTS'),
(24, 1, 4, 94, 'UAS'),
(25, 2, 5, 80, 'UH1'),
(26, 2, 5, 88, 'UH2'),
(27, 2, 5, 87, 'UH3'),
(28, 2, 5, 84, 'UH4'),
(29, 2, 5, 89, 'UTS'),
(30, 2, 5, 78, 'UAS'),
(31, 3, 6, 75, 'UH1'),
(32, 3, 6, 71, 'UH2'),
(33, 3, 6, 87, 'UH3'),
(34, 3, 6, 78, 'UH4'),
(35, 3, 6, 84, 'UTS'),
(36, 3, 6, 76, 'UAS'),
(37, 1, 7, 94, 'UH1'),
(38, 1, 7, 75, 'UH2'),
(39, 1, 7, 75, 'UH3'),
(40, 1, 7, 87, 'UH4'),
(41, 1, 7, 80, 'UTS'),
(42, 1, 7, 88, 'UAS'),
(43, 2, 8, 89, 'UH1'),
(44, 2, 8, 90, 'UH2'),
(45, 2, 8, 90, 'UH3'),
(46, 2, 8, 92, 'UH4'),
(47, 2, 8, 95, 'UTS'),
(48, 2, 8, 80, 'UAS'),
(49, 3, 9, 75, 'UH1'),
(50, 3, 9, 82, 'UH2'),
(51, 3, 9, 83, 'UH3'),
(52, 3, 9, 75, 'UH4'),
(53, 3, 9, 82, 'UTS'),
(54, 3, 9, 83, 'UAS'),
(55, 1, 10, 86, 'UH1'),
(56, 1, 10, 75, 'UH2'),
(57, 1, 10, 82, 'UH3'),
(58, 1, 10, 83, 'UH4'),
(59, 1, 10, 75, 'UTS'),
(60, 1, 10, 82, 'UAS'),
(61, 2, 11, 83, 'UH1'),
(62, 2, 11, 75, 'UH2'),
(63, 2, 11, 83, 'UH3'),
(64, 2, 11, 86, 'UH4'),
(65, 2, 11, 75, 'UTS'),
(66, 2, 11, 82, 'UAS'),
(67, 3, 12, 83, 'UH1'),
(68, 3, 12, 75, 'UH2'),
(69, 3, 12, 82, 'UH3'),
(70, 3, 12, 83, 'UH4'),
(71, 3, 12, 82, 'UTS'),
(72, 3, 12, 83, 'UAS'),
(73, 1, 13, 86, 'UH1'),
(74, 1, 13, 75, 'UH2'),
(75, 1, 13, 82, 'UH3'),
(76, 1, 13, 83, 'UH4'),
(77, 1, 13, 82, 'UTS'),
(78, 1, 13, 83, 'UAS'),
(79, 2, 14, 82, 'UH1'),
(80, 2, 14, 83, 'UH2'),
(81, 2, 14, 86, 'UH3'),
(82, 2, 14, 75, 'UH4'),
(83, 2, 14, 75, 'UTS'),
(84, 2, 14, 82, 'UAS'),
(85, 3, 15, 83, 'UH1'),
(86, 3, 15, 75, 'UH2'),
(87, 3, 15, 82, 'UH3'),
(88, 3, 15, 83, 'UH4'),
(89, 3, 15, 82, 'UTS'),
(90, 3, 15, 83, 'UAS'),
(91, 1, 16, 83, 'UH1'),
(92, 1, 16, 75, 'UH2'),
(93, 1, 16, 83, 'UH3'),
(94, 1, 16, 82, 'UH4'),
(95, 1, 16, 83, 'UTS'),
(96, 1, 16, 86, 'UAS'),
(97, 2, 17, 75, 'UH1'),
(98, 2, 17, 75, 'UH2'),
(99, 2, 17, 82, 'UH3'),
(100, 2, 17, 75, 'UH4'),
(101, 2, 17, 83, 'UTS'),
(102, 2, 17, 82, 'UAS'),
(103, 3, 18, 83, 'UH1'),
(104, 3, 18, 86, 'UH2'),
(105, 3, 18, 75, 'UH3'),
(106, 3, 18, 75, 'UH4'),
(107, 3, 18, 82, 'UTS'),
(108, 3, 18, 90, 'UAS'),
(109, 1, 19, 83, 'UH1'),
(110, 1, 19, 75, 'UH2'),
(111, 1, 19, 83, 'UH3'),
(112, 1, 19, 82, 'UH4'),
(113, 1, 19, 83, 'UTS'),
(114, 1, 19, 86, 'UAS'),
(115, 2, 20, 75, 'UH1'),
(116, 2, 20, 75, 'UH2'),
(117, 2, 20, 82, 'UH3'),
(118, 2, 20, 75, 'UH4'),
(119, 2, 20, 83, 'UTS'),
(120, 2, 20, 82, 'UAS'),
(121, 3, 21, 83, 'UH1'),
(122, 3, 21, 86, 'UH2'),
(123, 3, 21, 75, 'UH3'),
(124, 3, 21, 75, 'UH4'),
(125, 3, 21, 82, 'UTS'),
(126, 3, 21, 90, 'UAS'),
(127, 1, 22, 86, 'UH1'),
(128, 1, 22, 75, 'UH2'),
(129, 1, 22, 75, 'UH3'),
(130, 1, 22, 82, 'UH4'),
(131, 1, 22, 75, 'UTS'),
(132, 1, 22, 83, 'UAS'),
(133, 2, 23, 82, 'UH1'),
(134, 2, 23, 86, 'UH2'),
(135, 2, 23, 75, 'UH3'),
(136, 2, 23, 75, 'UH4'),
(137, 2, 23, 82, 'UTS'),
(138, 2, 23, 90, 'UAS'),
(139, 3, 24, 86, 'UH1'),
(140, 3, 24, 75, 'UH2'),
(141, 3, 24, 75, 'UH3'),
(142, 3, 24, 83, 'UH4'),
(143, 3, 24, 82, 'UTS'),
(144, 3, 24, 86, 'UAS'),
(145, 1, 25, 75, 'UH1'),
(146, 1, 25, 75, 'UH2'),
(147, 1, 25, 82, 'UH3'),
(148, 1, 25, 90, 'UH4'),
(149, 1, 25, 86, 'UTS'),
(150, 1, 25, 75, 'UAS'),
(151, 2, 26, 75, 'UH1'),
(152, 2, 26, 82, 'UH2'),
(153, 2, 26, 75, 'UH3'),
(154, 2, 26, 83, 'UH4'),
(155, 2, 26, 82, 'UTS'),
(156, 2, 26, 86, 'UAS'),
(157, 3, 27, 75, 'UH1'),
(158, 3, 27, 75, 'UH2'),
(159, 3, 27, 82, 'UH3'),
(160, 3, 27, 90, 'UH4'),
(161, 3, 27, 86, 'UTS'),
(162, 3, 27, 75, 'UAS');

-- --------------------------------------------------------

--
-- Table structure for table `periode`
--

CREATE TABLE `periode` (
  `id_periode` int(11) NOT NULL,
  `nm_periode` varchar(50) DEFAULT NULL,
  `status_periode` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `periode`
--

INSERT INTO `periode` (`id_periode`, `nm_periode`, `status_periode`) VALUES
(1, 'SEMESTER GASAL 2020', 'non-active'),
(2, 'SEMESTER GENAP 2020', 'non-active'),
(3, 'SEMESTER GASAL 2021', 'active');

-- --------------------------------------------------------

--
-- Table structure for table `siswa`
--

CREATE TABLE `siswa` (
  `id_siswa` int(11) NOT NULL,
  `nis` varchar(15) NOT NULL,
  `nm_siswa` varchar(20) DEFAULT NULL,
  `id_kelas` int(11) NOT NULL,
  `alamat_siswa` text DEFAULT NULL,
  `jk_siswa` enum('L','P') NOT NULL,
  `tgl_lahir_siswa` date DEFAULT NULL,
  `no_hp` varchar(20) NOT NULL,
  `nm_wali` varchar(100) DEFAULT NULL,
  `status_siswa` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `siswa`
--

INSERT INTO `siswa` (`id_siswa`, `nis`, `nm_siswa`, `id_kelas`, `alamat_siswa`, `jk_siswa`, `tgl_lahir_siswa`, `no_hp`, `nm_wali`, `status_siswa`) VALUES
(1, '101', 'Ali', 1, 'Jl. Kebon Jeruk No. 1', 'L', '2010-01-15', '81234567890', 'Bapak Ali', 'Aktif'),
(2, '102', 'Alya', 1, 'Jl. Kebon Jeruk No. 2', 'P', '2010-02-17', '81234567891', 'Bapak Alya', 'acrive'),
(3, '103', 'doni', 1, 'Jl. UMK', 'L', '2000-10-13', '897799696687', 'yudi', 'active');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `username` varchar(100) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
  `nm_pengguna` varchar(100) DEFAULT NULL,
  `level` varchar(11) DEFAULT NULL,
  `status` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `username`, `password`, `nm_pengguna`, `level`, `status`) VALUES
(1, 'andy', 'andy', 'andy', 'wakasiswa', 'active'),
(2, 'bagus', 'bagus', 'bagus', 'guru', 'active'),
(3, 'ina', 'ina', 'ina', 'guru', 'active'),
(4, 'ega', 'ega', 'ega', 'wakasiswa', 'active');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ekstra`
--
ALTER TABLE `ekstra`
  ADD PRIMARY KEY (`id_ekstra`),
  ADD KEY `id_periode` (`id_periode`);

--
-- Indexes for table `ekstra_siswa`
--
ALTER TABLE `ekstra_siswa`
  ADD PRIMARY KEY (`id_ekstra_siswa`),
  ADD KEY `id_siswa` (`id_siswa`),
  ADD KEY `id_ekstra` (`id_ekstra`);

--
-- Indexes for table `guru`
--
ALTER TABLE `guru`
  ADD PRIMARY KEY (`id_guru`);

--
-- Indexes for table `jadwal_siswa`
--
ALTER TABLE `jadwal_siswa`
  ADD PRIMARY KEY (`id_jadwal_siswa`),
  ADD KEY `id_siswa` (`id_siswa`),
  ADD KEY `id_mapel` (`id_mapel`),
  ADD KEY `id_guru` (`id_guru`);

--
-- Indexes for table `kehadiran_siswa`
--
ALTER TABLE `kehadiran_siswa`
  ADD PRIMARY KEY (`id_kehadiran`),
  ADD KEY `id_siswa` (`id_siswa`);

--
-- Indexes for table `kelas`
--
ALTER TABLE `kelas`
  ADD PRIMARY KEY (`id_kelas`);

--
-- Indexes for table `mapel`
--
ALTER TABLE `mapel`
  ADD PRIMARY KEY (`id_mapel`),
  ADD KEY `id_periode` (`id_periode`);

--
-- Indexes for table `nilai_ekstra`
--
ALTER TABLE `nilai_ekstra`
  ADD PRIMARY KEY (`id_nilai_ekstra`),
  ADD KEY `id_siswa` (`id_siswa`);

--
-- Indexes for table `nilai_mapel`
--
ALTER TABLE `nilai_mapel`
  ADD PRIMARY KEY (`id_nilai_mapel`),
  ADD KEY `id_jadwal` (`id_jadwal`),
  ADD KEY `id_siswa` (`id_siswa`);

--
-- Indexes for table `periode`
--
ALTER TABLE `periode`
  ADD PRIMARY KEY (`id_periode`);

--
-- Indexes for table `siswa`
--
ALTER TABLE `siswa`
  ADD PRIMARY KEY (`id_siswa`),
  ADD KEY `id_kelas` (`id_kelas`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `ekstra`
--
ALTER TABLE `ekstra`
  MODIFY `id_ekstra` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `ekstra_siswa`
--
ALTER TABLE `ekstra_siswa`
  MODIFY `id_ekstra_siswa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `guru`
--
ALTER TABLE `guru`
  MODIFY `id_guru` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `jadwal_siswa`
--
ALTER TABLE `jadwal_siswa`
  MODIFY `id_jadwal_siswa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `kehadiran_siswa`
--
ALTER TABLE `kehadiran_siswa`
  MODIFY `id_kehadiran` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `kelas`
--
ALTER TABLE `kelas`
  MODIFY `id_kelas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `mapel`
--
ALTER TABLE `mapel`
  MODIFY `id_mapel` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `nilai_ekstra`
--
ALTER TABLE `nilai_ekstra`
  MODIFY `id_nilai_ekstra` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `nilai_mapel`
--
ALTER TABLE `nilai_mapel`
  MODIFY `id_nilai_mapel` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=163;

--
-- AUTO_INCREMENT for table `periode`
--
ALTER TABLE `periode`
  MODIFY `id_periode` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `siswa`
--
ALTER TABLE `siswa`
  MODIFY `id_siswa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `ekstra`
--
ALTER TABLE `ekstra`
  ADD CONSTRAINT `ekstra_ibfk_1` FOREIGN KEY (`id_periode`) REFERENCES `periode` (`id_periode`);

--
-- Constraints for table `ekstra_siswa`
--
ALTER TABLE `ekstra_siswa`
  ADD CONSTRAINT `ekstra_siswa_ibfk_1` FOREIGN KEY (`id_siswa`) REFERENCES `siswa` (`id_siswa`),
  ADD CONSTRAINT `ekstra_siswa_ibfk_2` FOREIGN KEY (`id_ekstra`) REFERENCES `ekstra` (`id_ekstra`);

--
-- Constraints for table `jadwal_siswa`
--
ALTER TABLE `jadwal_siswa`
  ADD CONSTRAINT `jadwal_siswa_ibfk_1` FOREIGN KEY (`id_siswa`) REFERENCES `siswa` (`id_siswa`),
  ADD CONSTRAINT `jadwal_siswa_ibfk_2` FOREIGN KEY (`id_mapel`) REFERENCES `mapel` (`id_mapel`),
  ADD CONSTRAINT `jadwal_siswa_ibfk_3` FOREIGN KEY (`id_guru`) REFERENCES `guru` (`id_guru`);

--
-- Constraints for table `kehadiran_siswa`
--
ALTER TABLE `kehadiran_siswa`
  ADD CONSTRAINT `kehadiran_siswa_ibfk_1` FOREIGN KEY (`id_siswa`) REFERENCES `siswa` (`id_siswa`);

--
-- Constraints for table `mapel`
--
ALTER TABLE `mapel`
  ADD CONSTRAINT `mapel_ibfk_1` FOREIGN KEY (`id_periode`) REFERENCES `periode` (`id_periode`);

--
-- Constraints for table `nilai_ekstra`
--
ALTER TABLE `nilai_ekstra`
  ADD CONSTRAINT `nilai_ekstra_ibfk_1` FOREIGN KEY (`id_siswa`) REFERENCES `siswa` (`id_siswa`);

--
-- Constraints for table `nilai_mapel`
--
ALTER TABLE `nilai_mapel`
  ADD CONSTRAINT `nilai_mapel_ibfk_1` FOREIGN KEY (`id_jadwal`) REFERENCES `jadwal_siswa` (`id_jadwal_siswa`),
  ADD CONSTRAINT `nilai_mapel_ibfk_2` FOREIGN KEY (`id_siswa`) REFERENCES `siswa` (`id_siswa`);

--
-- Constraints for table `siswa`
--
ALTER TABLE `siswa`
  ADD CONSTRAINT `siswa_ibfk_1` FOREIGN KEY (`id_kelas`) REFERENCES `kelas` (`id_kelas`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
