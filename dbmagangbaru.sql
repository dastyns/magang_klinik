-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 22, 2023 at 06:57 PM
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
(1, 'Toton Yuswanto'),
(2, 'Umi Yuswanto');

-- --------------------------------------------------------

--
-- Table structure for table `jams`
--

CREATE TABLE `jams` (
  `id` int(11) NOT NULL,
  `jam` varchar(45) NOT NULL,
  `dokter_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `jams`
--

INSERT INTO `jams` (`id`, `jam`, `dokter_id`) VALUES
(1, '08.00', 2),
(2, '08.30', 2),
(3, '09.00', 2),
(4, '09.30', 2),
(5, '10.00', 2),
(6, '10.30', 2),
(7, '11.00', 2),
(8, '11.30', 2),
(9, '12.00', 2),
(10, '17.00', 1),
(11, '17.30', 1),
(12, '18.00', 1),
(13, '18.30', 1),
(14, '19.00', 1),
(15, '19.30', 1),
(16, '20.00', 1),
(17, '20.30', 1),
(18, '21.00', 1),
(19, 'lainnya', 1),
(20, 'lainnya', 2);

-- --------------------------------------------------------

--
-- Table structure for table `konsultasis`
--

CREATE TABLE `konsultasis` (
  `id` int(11) NOT NULL,
  `tanggal_konsultasi` datetime NOT NULL DEFAULT current_timestamp(),
  `keterangan` varchar(45) DEFAULT NULL,
  `obat` varchar(500) DEFAULT NULL,
  `biaya` double DEFAULT NULL,
  `status_konsultasi` enum('0','1') NOT NULL,
  `tanggal_balik` datetime DEFAULT NULL,
  `reservasi_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `konsultasis`
--

INSERT INTO `konsultasis` (`id`, `tanggal_konsultasi`, `keterangan`, `obat`, `biaya`, `status_konsultasi`, `tanggal_balik`, `reservasi_id`) VALUES
(1, '0000-00-00 00:00:00', 'penambalan gigi', '', 300000, '1', NULL, 12),
(2, '0000-00-00 00:00:00', 'penambalan gigi', '', 250000, '1', NULL, 13),
(3, '2023-05-21 10:50:09', 'perawatan gigi 1', '', 250000, '1', NULL, 14);

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
(3, 'klinik', 'klinik', 'klinik', 'klinik', '2023-05-19 21:37:28'),
(4, 'Dastyn Susanto', '08967863876', 'dastyn@gmail.com', '12345', '2023-05-20 22:47:00'),
(5, 'Kenny Reandy Kwando', '0812894483964', 'kenkwando88@gmail.com', '12345', '2023-05-21 10:23:27');

-- --------------------------------------------------------

--
-- Table structure for table `reservasis`
--

CREATE TABLE `reservasis` (
  `id` int(11) NOT NULL,
  `tanggal_reservasi` datetime NOT NULL,
  `keluhan` varchar(45) DEFAULT NULL,
  `status_reservasi` enum('0','1') NOT NULL,
  `pengguna_id` int(11) NOT NULL,
  `keterangan` varchar(45) DEFAULT NULL,
  `jam_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `reservasis`
--

INSERT INTO `reservasis` (`id`, `tanggal_reservasi`, `keluhan`, `status_reservasi`, `pengguna_id`, `keterangan`, `jam_id`) VALUES
(12, '2023-05-22 00:00:00', 'sakit gigi', '0', 4, NULL, 10),
(13, '2023-05-21 00:00:00', 'gigi berlubang', '0', 5, NULL, 10),
(14, '2023-05-21 00:00:00', 'sakit gigi', '0', 4, NULL, 9);

-- --------------------------------------------------------

--
-- Table structure for table `ulasans`
--

CREATE TABLE `ulasans` (
  `id` int(11) NOT NULL,
  `tanggal_ulasan` datetime DEFAULT NULL,
  `ulasan` varchar(500) DEFAULT NULL,
  `konsultasi_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `ulasans`
--

INSERT INTO `ulasans` (`id`, `tanggal_ulasan`, `ulasan`, `konsultasi_id`) VALUES
(1, NULL, 'pelayanan baik dan memuaskan', 1),
(2, NULL, 'dokter sangat ramah', 2);

-- --------------------------------------------------------

--
-- Table structure for table `ulasan_baiks`
--

CREATE TABLE `ulasan_baiks` (
  `id` int(11) NOT NULL,
  `ulasan_id` int(11) NOT NULL
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
-- Indexes for table `konsultasis`
--
ALTER TABLE `konsultasis`
  ADD PRIMARY KEY (`id`,`reservasi_id`),
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
-- Indexes for table `ulasan_baiks`
--
ALTER TABLE `ulasan_baiks`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_ulasan_baiks_ulasans1_idx` (`ulasan_id`);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `konsultasis`
--
ALTER TABLE `konsultasis`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `penggunas`
--
ALTER TABLE `penggunas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `reservasis`
--
ALTER TABLE `reservasis`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `ulasans`
--
ALTER TABLE `ulasans`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `ulasan_baiks`
--
ALTER TABLE `ulasan_baiks`
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

--
-- Constraints for table `ulasan_baiks`
--
ALTER TABLE `ulasan_baiks`
  ADD CONSTRAINT `fk_ulasan_baiks_ulasans1` FOREIGN KEY (`ulasan_id`) REFERENCES `ulasans` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
