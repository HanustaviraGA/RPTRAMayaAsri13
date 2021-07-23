-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 11, 2021 at 03:35 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.2

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
-- Table structure for table `struktur`
--

CREATE TABLE `struktur` (
  `id_struktur` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `gambar` varchar(100) NOT NULL,
  `id_jabatan` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `struktur`
--

INSERT INTO `struktur` (`id_struktur`, `nama`, `gambar`, `id_jabatan`) VALUES
(10, '123', '60eaa336c5ae8.jpg', 12);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `struktur`
--
ALTER TABLE `struktur`
  ADD PRIMARY KEY (`id_struktur`),
  ADD KEY `id_jabatan` (`id_jabatan`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `struktur`
--
ALTER TABLE `struktur`
  MODIFY `id_struktur` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `struktur`
--
ALTER TABLE `struktur`
  ADD CONSTRAINT `struktur_ibfk_1` FOREIGN KEY (`id_jabatan`) REFERENCES `tupoksi` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
