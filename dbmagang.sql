-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 19, 2023 at 04:58 PM
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
  `idjam` int(11) NOT NULL,
  `jam` varchar(45) DEFAULT NULL,
  `dokter_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `jams`
--

INSERT INTO `jams` (`idjam`, `jam`, `dokter_id`) VALUES
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
(18, '21.00', 1);

-- --------------------------------------------------------

--
-- Table structure for table `konsultasis`
--

CREATE TABLE `konsultasis` (
  `id` int(11) NOT NULL,
  `tanggal_konsultasi` datetime DEFAULT NULL,
  `keterangan` varchar(45) DEFAULT NULL,
  `obat` varchar(500) DEFAULT NULL,
  `biaya` double DEFAULT NULL,
  `status` enum('0','1') DEFAULT NULL,
  `tanggal_balik` datetime DEFAULT NULL,
  `id_reservasi` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `penggunas`
--

CREATE TABLE `penggunas` (
  `id` int(11) NOT NULL,
  `nama` varchar(45) DEFAULT NULL,
  `nomor_telepon` varchar(45) DEFAULT NULL,
  `email` varchar(45) DEFAULT NULL,
  `password` varchar(45) DEFAULT NULL,
  `tanggal_registrasi` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `penggunas`
--

INSERT INTO `penggunas` (`id`, `nama`, `nomor_telepon`, `email`, `password`, `tanggal_registrasi`) VALUES
(3, 'klinik', 'klinik', 'klinik', 'klinik', '2023-05-19 21:37:28');

-- --------------------------------------------------------

--
-- Table structure for table `reservasis`
--

CREATE TABLE `reservasis` (
  `id` int(11) NOT NULL,
  `tanggal_reservasi` datetime DEFAULT NULL,
  `keluhan` varchar(45) DEFAULT NULL,
  `status_reservasi` enum('0','1') DEFAULT NULL,
  `id_pengguna` int(11) NOT NULL,
  `keterangan` varchar(45) DEFAULT NULL,
  `jam_idjam` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `ulasans`
--

CREATE TABLE `ulasans` (
  `id` int(11) NOT NULL,
  `tanggal_ulasan` datetime DEFAULT NULL,
  `ulasan` varchar(500) DEFAULT NULL,
  `konsultasis_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
  ADD PRIMARY KEY (`idjam`),
  ADD KEY `fk_jams_dokters1_idx` (`dokter_id`);

--
-- Indexes for table `konsultasis`
--
ALTER TABLE `konsultasis`
  ADD PRIMARY KEY (`id`,`id_reservasi`),
  ADD KEY `fk_konsultasi_reservasi_idx` (`id_reservasi`);

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
  ADD KEY `fk_reservasi_pengguna1_idx` (`id_pengguna`),
  ADD KEY `fk_reservasi_jam1_idx` (`jam_idjam`);

--
-- Indexes for table `ulasans`
--
ALTER TABLE `ulasans`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_ulasans_konsultasis1_idx` (`konsultasis_id`);

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
  MODIFY `idjam` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `konsultasis`
--
ALTER TABLE `konsultasis`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `penggunas`
--
ALTER TABLE `penggunas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `reservasis`
--
ALTER TABLE `reservasis`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `ulasans`
--
ALTER TABLE `ulasans`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

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
  ADD CONSTRAINT `fk_konsultasi_reservasi` FOREIGN KEY (`id_reservasi`) REFERENCES `reservasis` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `reservasis`
--
ALTER TABLE `reservasis`
  ADD CONSTRAINT `fk_reservasi_jam1` FOREIGN KEY (`jam_idjam`) REFERENCES `jams` (`idjam`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_reservasi_pengguna1` FOREIGN KEY (`id_pengguna`) REFERENCES `penggunas` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `ulasans`
--
ALTER TABLE `ulasans`
  ADD CONSTRAINT `fk_ulasans_konsultasis1` FOREIGN KEY (`konsultasis_id`) REFERENCES `konsultasis` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `ulasan_baiks`
--
ALTER TABLE `ulasan_baiks`
  ADD CONSTRAINT `fk_ulasan_baiks_ulasans1` FOREIGN KEY (`ulasan_id`) REFERENCES `ulasans` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
