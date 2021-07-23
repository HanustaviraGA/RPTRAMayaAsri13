-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Waktu pembuatan: 08 Jul 2021 pada 06.06
-- Versi server: 10.3.16-MariaDB
-- Versi PHP: 7.3.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `id17184171_administrasi`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `gambar`
--

CREATE TABLE `gambar` (
  `id_artikel` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `judul` varchar(100) NOT NULL,
  `gambar` varchar(100) DEFAULT NULL,
  `isi` text NOT NULL,
  `admin` varchar(100) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `topik` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `gambar`
--

INSERT INTO `gambar` (`id_artikel`, `tanggal`, `judul`, `gambar`, `isi`, `admin`, `status`, `topik`) VALUES
(0, '2021-07-08', 'Sunib Ngalam2', '60e65c97147f2.jpeg', '<p>Test2</p>', 'Hanustavira Guru Acarya', 1, 1),
(0, '2021-07-08', 'Made Adi Adnyana', '60e65cdb64e92.jpg', '<p>Mahasiswa sunib ngalam</p>', 'Hanustavira Guru Acarya', 1, 1);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
