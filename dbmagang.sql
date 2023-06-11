-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 11, 2023 at 12:20 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 7.4.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dbmagang`
--

-- --------------------------------------------------------

--
-- Table structure for table `dokters`
--

CREATE TABLE `dokters` (
  `id` int(11) NOT NULL,
  `nama` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `dokters`
--

INSERT INTO `dokters` (`id`, `nama`) VALUES
(1, 'Toton Yuswando'),
(2, 'Umi Yuswanto');

-- --------------------------------------------------------

--
-- Table structure for table `jams`
--

CREATE TABLE `jams` (
  `id` int(11) NOT NULL,
  `dokter_id` int(11) NOT NULL,
  `hari` varchar(45) NOT NULL,
  `jam` varchar(45) NOT NULL,
  `status` enum('aktif','nonaktif') DEFAULT 'nonaktif'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `jams`
--

INSERT INTO `jams` (`id`, `dokter_id`, `hari`, `jam`, `status`) VALUES
(1, 1, 'Senin', '17.00', 'nonaktif'),
(2, 1, 'Senin', '17.30', 'aktif'),
(3, 1, 'Senin', '18.00', 'aktif'),
(4, 1, 'Senin', '18.30', 'aktif'),
(5, 1, 'Senin', '19.00', 'aktif'),
(6, 1, 'Senin', '19.30', 'aktif'),
(7, 1, 'Senin', '20.00', 'aktif'),
(8, 1, 'Senin', '20.30', 'aktif'),
(9, 1, 'Senin', '21.00', 'aktif'),
(10, 1, 'Selasa', '17.00', 'nonaktif'),
(11, 1, 'Selasa', '17.30', 'aktif'),
(12, 1, 'Selasa', '18.00', 'aktif'),
(13, 1, 'Selasa', '18.30', 'aktif'),
(14, 1, 'Selasa', '19.00', 'aktif'),
(15, 1, 'Selasa', '19.30', 'aktif'),
(16, 1, 'Selasa', '20.00', 'aktif'),
(17, 1, 'Selasa', '20.30', 'aktif'),
(18, 1, 'Selasa', '21.00', 'aktif'),
(19, 1, 'Rabu', '17.00', 'nonaktif'),
(20, 1, 'Rabu', '17.30', 'aktif'),
(21, 1, 'Rabu', '18.00', 'aktif'),
(22, 1, 'Rabu', '18.30', 'aktif'),
(23, 1, 'Rabu', '19.00', 'aktif'),
(24, 1, 'Rabu', '19.30', 'aktif'),
(25, 1, 'Rabu', '20.00', 'aktif'),
(26, 1, 'Rabu', '20.30', 'aktif'),
(27, 1, 'Rabu', '21.00', 'aktif'),
(28, 1, 'Kamis', '17.00', 'nonaktif'),
(29, 1, 'Kamis', '17.30', 'aktif'),
(30, 1, 'Kamis', '18.00', 'aktif'),
(31, 1, 'Kamis', '18.30', 'aktif'),
(32, 1, 'Kamis', '19.00', 'aktif'),
(33, 1, 'Kamis', '19.30', 'aktif'),
(34, 1, 'Kamis', '20.00', 'aktif'),
(35, 1, 'Kamis', '20.30', 'aktif'),
(36, 1, 'Kamis', '21.00', 'aktif'),
(37, 1, 'Jumat', '17.00', 'nonaktif'),
(38, 1, 'Jumat', '17.30', 'aktif'),
(39, 1, 'Jumat', '18.00', 'aktif'),
(40, 1, 'Jumat', '18.30', 'aktif'),
(41, 1, 'Jumat', '19.00', 'aktif'),
(42, 1, 'Jumat', '19.30', 'aktif'),
(43, 1, 'Jumat', '20.00', 'aktif'),
(44, 1, 'Jumat', '20.30', 'aktif'),
(45, 1, 'Jumat', '21.00', 'aktif'),
(46, 1, 'Sabtu', '17.00', 'nonaktif'),
(47, 1, 'Sabtu', '17.30', 'aktif'),
(48, 1, 'Sabtu', '18.00', 'aktif'),
(49, 1, 'Sabtu', '18.30', 'aktif'),
(50, 1, 'Sabtu', '19.00', 'aktif'),
(51, 1, 'Sabtu', '19.30', 'aktif'),
(52, 1, 'Sabtu', '20.00', 'aktif'),
(53, 1, 'Sabtu', '20.30', 'aktif'),
(54, 1, 'Sabtu', '21.00', 'aktif'),
(55, 1, 'Minggu', '17.00', 'nonaktif'),
(56, 1, 'Minggu', '17.30', 'aktif'),
(57, 1, 'Minggu', '18.00', 'aktif'),
(58, 1, 'Minggu', '18.30', 'aktif'),
(59, 1, 'Minggu', '19.00', 'aktif'),
(60, 1, 'Minggu', '19.30', 'aktif'),
(61, 1, 'Minggu', '20.00', 'aktif'),
(62, 1, 'Minggu', '20.30', 'aktif'),
(63, 1, 'Minggu', '21.00', 'aktif'),
(64, 2, 'Senin', '08.00', 'nonaktif'),
(65, 2, 'Senin', '08.30', 'aktif'),
(66, 2, 'Senin', '09.00', 'aktif'),
(67, 2, 'Senin', '09.30', 'aktif'),
(68, 2, 'Senin', '10.00', 'aktif'),
(69, 2, 'Senin', '10.30', 'aktif'),
(70, 2, 'Senin', '11.00', 'aktif'),
(71, 2, 'Senin', '11.30', 'aktif'),
(72, 2, 'Senin', '12.00', 'aktif'),
(73, 2, 'Selasa', '08.00', 'aktif'),
(74, 2, 'Selasa', '08.30', 'aktif'),
(75, 2, 'Selasa', '09.00', 'aktif'),
(76, 2, 'Selasa', '09.30', 'aktif'),
(77, 2, 'Selasa', '10.00', 'aktif'),
(78, 2, 'Selasa', '10.30', 'aktif'),
(79, 2, 'Selasa', '11.00', 'aktif'),
(80, 2, 'Selasa', '11.30', 'aktif'),
(81, 2, 'Selasa', '12.00', 'aktif'),
(82, 2, 'Rabu', '08.00', 'aktif'),
(83, 2, 'Rabu', '08.30', 'aktif'),
(84, 2, 'Rabu', '09.00', 'aktif'),
(85, 2, 'Rabu', '09.30', 'aktif'),
(86, 2, 'Rabu', '10.00', 'aktif'),
(87, 2, 'Rabu', '10.30', 'aktif'),
(88, 2, 'Rabu', '11.00', 'aktif'),
(89, 2, 'Rabu', '11.30', 'aktif'),
(90, 2, 'Rabu', '12.00', 'aktif'),
(91, 2, 'Kamis', '08.00', 'aktif'),
(92, 2, 'Kamis', '08.30', 'aktif'),
(93, 2, 'Kamis', '09.00', 'aktif'),
(94, 2, 'Kamis', '09.30', 'aktif'),
(95, 2, 'Kamis', '10.00', 'aktif'),
(96, 2, 'Kamis', '10.30', 'aktif'),
(97, 2, 'Kamis', '11.00', 'aktif'),
(98, 2, 'Kamis', '11.30', 'aktif'),
(99, 2, 'Kamis', '12.00', 'aktif'),
(100, 2, 'Jumat', '08.00', 'aktif'),
(101, 2, 'Jumat', '08.30', 'aktif'),
(102, 2, 'Jumat', '09.00', 'aktif'),
(103, 2, 'Jumat', '09.30', 'aktif'),
(104, 2, 'Jumat', '10.00', 'aktif'),
(105, 2, 'Jumat', '10.30', 'aktif'),
(106, 2, 'Jumat', '11.00', 'aktif'),
(107, 2, 'Jumat', '11.30', 'aktif'),
(108, 2, 'Jumat', '12.00', 'aktif'),
(109, 2, 'Sabtu', '08.00', 'aktif'),
(110, 2, 'Sabtu', '08.30', 'aktif'),
(111, 2, 'Sabtu', '09.00', 'aktif'),
(112, 2, 'Sabtu', '09.30', 'aktif'),
(113, 2, 'Sabtu', '10.00', 'aktif'),
(114, 2, 'Sabtu', '10.30', 'aktif'),
(115, 2, 'Sabtu', '11.00', 'aktif'),
(116, 2, 'Sabtu', '11.30', 'aktif'),
(117, 2, 'Sabtu', '12.00', 'aktif'),
(118, 2, 'Minggu', '08.00', 'aktif'),
(119, 2, 'Minggu', '08.30', 'aktif'),
(120, 2, 'Minggu', '09.00', 'aktif'),
(121, 2, 'Minggu', '09.30', 'aktif'),
(122, 2, 'Minggu', '10.00', 'aktif'),
(123, 2, 'Minggu', '10.30', 'aktif'),
(124, 2, 'Minggu', '11.00', 'aktif'),
(125, 2, 'Minggu', '11.30', 'aktif'),
(126, 2, 'Minggu', '12.00', 'aktif'),
(127, 1, 'Semua', 'Lainnya', 'aktif'),
(128, 2, 'Semua', 'Lainnya', 'aktif');

-- --------------------------------------------------------

--
-- Table structure for table `jenis_perawatans`
--

CREATE TABLE `jenis_perawatans` (
  `id` int(11) NOT NULL,
  `nama` varchar(45) NOT NULL,
  `standar_harga` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `jenis_perawatans`
--

INSERT INTO `jenis_perawatans` (`id`, `nama`, `standar_harga`) VALUES
(1, 'Cabut Gigi 124487', 200000),
(2, 'Cabut Gigi 2', 200000),
(3, 'Cabut Gigi 123', 140000),
(4, 'Cabut Gigi 12445', 120000);

-- --------------------------------------------------------

--
-- Table structure for table `jenis_perawatan_konsultasi`
--

CREATE TABLE `jenis_perawatan_konsultasi` (
  `id` int(11) NOT NULL,
  `jenis_perawatan_id` int(11) NOT NULL,
  `konsultasi_id` int(11) NOT NULL,
  `harga` int(11) NOT NULL,
  `posisi_gigi` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `konsultasis`
--

CREATE TABLE `konsultasis` (
  `id` int(11) NOT NULL,
  `keterangan` varchar(45) DEFAULT NULL,
  `obat` varchar(500) DEFAULT NULL,
  `tanggal_balik` datetime DEFAULT NULL,
  `total_harga` int(11) NOT NULL,
  `reservasi_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `penggunas`
--

CREATE TABLE `penggunas` (
  `id` int(11) NOT NULL,
  `nama` varchar(45) NOT NULL,
  `nomor_telepon` varchar(45) NOT NULL,
  `email` varchar(45) NOT NULL,
  `password` varchar(45) NOT NULL,
  `tanggal_registrasi` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `penggunas`
--

INSERT INTO `penggunas` (`id`, `nama`, `nomor_telepon`, `email`, `password`, `tanggal_registrasi`) VALUES
(1, 'Toton Yuswanto', '', 'totonyuswanto@gmail.com', '12345', '2023-06-02 19:18:33'),
(2, 'Umi Yuswanto', '082188888888', 'umiyuswanto@gmail.com', '12345', '2023-06-03 00:00:55'),
(3, 'Klinik', '0082134345656', 'klinik', 'klinik', '2023-06-11 12:29:26'),
(4, 'Kenny', '082165658787', 'kenkwando08@gmail.com', '12345', '2023-06-11 12:29:26'),
(5, 'Budi Hartanto', '123412341234', '', '', '2023-06-11 16:46:12');

-- --------------------------------------------------------

--
-- Table structure for table `reservasis`
--

CREATE TABLE `reservasis` (
  `id` int(11) NOT NULL,
  `tanggal_reservasi` datetime NOT NULL,
  `keluhan` varchar(500) DEFAULT NULL,
  `status_reservasi` enum('baru','dibatalkan klinik','dibatalkan pasien','selesai') NOT NULL,
  `pengguna_id` int(11) NOT NULL,
  `jam_id` int(11) NOT NULL,
  `tanggal_pesan` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `reservasis`
--

INSERT INTO `reservasis` (`id`, `tanggal_reservasi`, `keluhan`, `status_reservasi`, `pengguna_id`, `jam_id`, `tanggal_pesan`) VALUES
(7, '2023-06-11 00:00:00', 's d', 'dibatalkan pasien', 4, 56, '2023-06-11 15:48:10'),
(8, '2023-06-11 00:00:00', 'aa', 'dibatalkan klinik', 5, 57, '2023-06-11 16:46:12');

-- --------------------------------------------------------

--
-- Table structure for table `ulasans`
--

CREATE TABLE `ulasans` (
  `id` int(11) NOT NULL,
  `tanggal_ulasan` datetime NOT NULL DEFAULT current_timestamp(),
  `ulasan` varchar(500) NOT NULL,
  `konsultasi_id` int(11) NOT NULL,
  `status` enum('tampil','tidak') NOT NULL DEFAULT 'tidak'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `dokters`
--
ALTER TABLE `dokters`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jams`
--
ALTER TABLE `jams`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_jams_dokters1_idx` (`dokter_id`);

--
-- Indexes for table `jenis_perawatans`
--
ALTER TABLE `jenis_perawatans`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jenis_perawatan_konsultasi`
--
ALTER TABLE `jenis_perawatan_konsultasi`
  ADD PRIMARY KEY (`id`,`jenis_perawatan_id`,`konsultasi_id`),
  ADD KEY `fk_jenis_perawatan_has_konsultasis_konsultasis1_idx` (`konsultasi_id`),
  ADD KEY `fk_jenis_perawatan_has_konsultasis_jenis_perawatan1_idx` (`jenis_perawatan_id`);

--
-- Indexes for table `konsultasis`
--
ALTER TABLE `konsultasis`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_konsultasis_reservasis1_idx` (`reservasi_id`);

--
-- Indexes for table `penggunas`
--
ALTER TABLE `penggunas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reservasis`
--
ALTER TABLE `reservasis`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_reservasi_pengguna1_idx` (`pengguna_id`),
  ADD KEY `fk_reservasi_jam1_idx` (`jam_id`);

--
-- Indexes for table `ulasans`
--
ALTER TABLE `ulasans`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_ulasans_konsultasis1_idx` (`konsultasi_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `dokters`
--
ALTER TABLE `dokters`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `jams`
--
ALTER TABLE `jams`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=129;

--
-- AUTO_INCREMENT for table `jenis_perawatans`
--
ALTER TABLE `jenis_perawatans`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `jenis_perawatan_konsultasi`
--
ALTER TABLE `jenis_perawatan_konsultasi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `konsultasis`
--
ALTER TABLE `konsultasis`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `penggunas`
--
ALTER TABLE `penggunas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `reservasis`
--
ALTER TABLE `reservasis`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `ulasans`
--
ALTER TABLE `ulasans`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `jams`
--
ALTER TABLE `jams`
  ADD CONSTRAINT `fk_jams_dokters1` FOREIGN KEY (`dokter_id`) REFERENCES `dokters` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `jenis_perawatan_konsultasi`
--
ALTER TABLE `jenis_perawatan_konsultasi`
  ADD CONSTRAINT `fk_jenis_perawatan_has_konsultasis_jenis_perawatan1` FOREIGN KEY (`jenis_perawatan_id`) REFERENCES `jenis_perawatans` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_jenis_perawatan_has_konsultasis_konsultasis1` FOREIGN KEY (`konsultasi_id`) REFERENCES `konsultasis` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `konsultasis`
--
ALTER TABLE `konsultasis`
  ADD CONSTRAINT `fk_konsultasis_reservasis1` FOREIGN KEY (`reservasi_id`) REFERENCES `reservasis` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `reservasis`
--
ALTER TABLE `reservasis`
  ADD CONSTRAINT `fk_reservasi_jam1` FOREIGN KEY (`jam_id`) REFERENCES `jams` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_reservasi_pengguna1` FOREIGN KEY (`pengguna_id`) REFERENCES `penggunas` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `ulasans`
--
ALTER TABLE `ulasans`
  ADD CONSTRAINT `fk_ulasans_konsultasis1` FOREIGN KEY (`konsultasi_id`) REFERENCES `konsultasis` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
