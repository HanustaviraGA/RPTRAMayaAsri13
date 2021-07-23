-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Waktu pembuatan: 10 Jul 2021 pada 18.06
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
-- Database: `admin`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `saran`
--

CREATE TABLE `saran` (
  `id` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `nama` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `saran` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data untuk tabel `saran`
--

INSERT INTO `saran` (`id`, `tanggal`, `nama`, `email`, `saran`) VALUES
(1, '2021-07-10', 'HANUSTAVIRA GURU ACARYA', 'hanustavira.acarya@binus.ac.id', 'Terima kasih atas kerjasamanya');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `saran`
--
ALTER TABLE `saran`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `saran`
--
ALTER TABLE `saran`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
