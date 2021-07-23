-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 10, 2021 at 04:36 PM
-- Server version: 10.4.8-MariaDB
-- PHP Version: 7.3.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `admin`
--

-- --------------------------------------------------------

--
-- Table structure for table `detail_tupoksi`
--

CREATE TABLE `detail_tupoksi` (
  `id_detail_tupoksi` int(11) NOT NULL,
  `tugas_pokok` varchar(100) NOT NULL,
  `id_tupoksi` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `detail_tupoksi`
--

INSERT INTO `detail_tupoksi` (`id_detail_tupoksi`, `tugas_pokok`, `id_tupoksi`) VALUES
(25, '2', 12),
(26, '3', 12),
(27, '4', 12),
(28, '1', 12),
(32, '1', 13),
(33, '3', 13),
(37, 'ayam', 14),
(38, 'ikan', 14),
(42, 'Menyiram Tanaman', 15),
(43, 'Memotong Rumput', 15),
(44, 'Memakan Sayur', 15);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `detail_tupoksi`
--
ALTER TABLE `detail_tupoksi`
  ADD PRIMARY KEY (`id_detail_tupoksi`),
  ADD KEY `detail_tupoksi_ibfk_1` (`id_tupoksi`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `detail_tupoksi`
--
ALTER TABLE `detail_tupoksi`
  MODIFY `id_detail_tupoksi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `detail_tupoksi`
--
ALTER TABLE `detail_tupoksi`
  ADD CONSTRAINT `detail_tupoksi_ibfk_1` FOREIGN KEY (`id_tupoksi`) REFERENCES `tupoksi` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
