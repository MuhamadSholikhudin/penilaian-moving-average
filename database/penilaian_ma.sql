-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 14, 2024 at 12:13 AM
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
(1, 1111, 'ulya', 'Jl. Merdeka No. 10', 'L', '1980-05-15', '81234567890', 'ahmad.png'),
(2, 1112, 'guru', 'Jl. Kembang No. 21', 'P', '1982-08-20', '81234567891', 'siti.png'),
(3, 1113, 'bagus', 'Jl. Mawar No. 3', 'L', '1975-03-22', '81234567892', 'budi.png');

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
(1, 1, 1, 1, 1, 'senin', '07:00:00', '08:00:00'),
(2, 2, 1, 1, 1, 'senin', '07:00:00', '08:00:00'),
(3, 3, 1, 1, 1, 'senin', '07:00:00', '08:00:00'),
(4, 1, 2, 2, 1, 'senin', '08:00:00', '09:00:00'),
(5, 2, 2, 2, 1, 'senin', '08:00:00', '09:00:00'),
(6, 3, 2, 2, 1, 'senin', '08:00:00', '09:00:00'),
(7, 1, 3, 3, 1, 'senin', '09:00:00', '10:00:00'),
(8, 2, 3, 3, 1, 'senin', '09:00:00', '10:00:00'),
(9, 3, 3, 3, 1, 'senin', '09:00:00', '10:00:00');

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
(3, 1, 'BAHASA INGGRIS');

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
(2, 2, 1, 71, 'UH1'),
(3, 1, 2, 87, 'UH1'),
(4, 2, 2, 78, 'UH1'),
(5, 1, 3, 79, 'UH1'),
(6, 2, 3, 92, 'UH1'),
(7, 1, 1, 82, 'UH2'),
(8, 2, 1, 80, 'UH2'),
(9, 1, 2, 85, 'UH2'),
(10, 2, 2, 80, 'UH2'),
(11, 1, 3, 85, 'UH2'),
(12, 2, 3, 92, 'UH2'),
(13, 1, 1, 70, 'UH3'),
(14, 2, 1, 91, 'UH3'),
(15, 1, 2, 87, 'UH3'),
(16, 2, 2, 87, 'UH3'),
(17, 1, 3, 76, 'UH3'),
(18, 2, 3, 73, 'UH3'),
(19, 1, 1, 93, 'UH4'),
(20, 2, 1, 75, 'UH4'),
(21, 1, 2, 90, 'UH4'),
(22, 2, 2, 75, 'UH4'),
(23, 1, 3, 79, 'UH4'),
(24, 2, 3, 94, 'UH4'),
(25, 1, 1, 80, 'UTS'),
(26, 2, 1, 88, 'UTS'),
(27, 1, 2, 87, 'UTS'),
(28, 2, 2, 84, 'UTS'),
(29, 1, 3, 89, 'UTS'),
(30, 2, 3, 78, 'UTS'),
(31, 1, 1, 75, 'UAS'),
(32, 2, 1, 71, 'UAS'),
(33, 1, 2, 87, 'UAS'),
(34, 2, 2, 78, 'UAS'),
(35, 1, 3, 84, 'UAS'),
(36, 2, 3, 76, 'UAS');

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
(1, 'SEMESTER GASAL 2020', 'active');

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
  `status_siswa` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `siswa`
--

INSERT INTO `siswa` (`id_siswa`, `nis`, `nm_siswa`, `id_kelas`, `alamat_siswa`, `jk_siswa`, `tgl_lahir_siswa`, `no_hp`, `nm_wali`, `status_siswa`) VALUES
(1, '101', 'Ali', 1, 'Jl. Kebon Jeruk No. 1', 'L', '2010-01-15', '81234567890', 'Bapak Ali', 'acrive'),
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
(1, 'andy', 'andy', 'andy', 'guru', 'active'),
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
  MODIFY `id_jadwal_siswa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

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
  MODIFY `id_mapel` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `nilai_ekstra`
--
ALTER TABLE `nilai_ekstra`
  MODIFY `id_nilai_ekstra` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `nilai_mapel`
--
ALTER TABLE `nilai_mapel`
  MODIFY `id_nilai_mapel` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `periode`
--
ALTER TABLE `periode`
  MODIFY `id_periode` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

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
