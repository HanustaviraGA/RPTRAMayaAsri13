-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 10, 2021 at 02:17 PM
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
-- Table structure for table `artikel`
--

CREATE TABLE `artikel` (
  `id_artikel` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `judul` varchar(100) NOT NULL,
  `gambar` varchar(100) DEFAULT NULL,
  `isi` text NOT NULL,
  `admin` varchar(100) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `id_topik` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `artikel`
--

INSERT INTO `artikel` (`id_artikel`, `tanggal`, `judul`, `gambar`, `isi`, `admin`, `status`, `id_topik`) VALUES
(1, '2010-03-03', 'Test', 'abc.jpg', 'Adi', 'Admin', 0, 1),
(2, '2021-07-08', '123', '60e6b45f0f232.jpg', '<p>123</p>', 'Made Adi Adnyana', 0, 2),
(3, '2021-07-08', '123', '60e6b47e7f728.jpg', '<p>123</p>', 'Made Adi Adnyana', 1, 1),
(4, '2021-07-08', '13', '60e6b7fbbfd13.png', '<p>123</p>', 'Made Adi Adnyana', 0, 1),
(5, '2021-07-08', 'Bocoran Bank BCA Digital Bakal IPO, Siapkan Kocek Gaes!', '60e6ecaabe925.jpeg', '<p><strong>Jakarta, CNBC&nbsp;Indonesia</strong> - Kabar terbaru datang dari bank milik Grup Djarum, dengan kapitalisasi pasar (market cap) terbesar di Bursa Efek Indonesia (BEI) yakni PT Bank Central Asia Tbk&nbsp;(BBCA).</p><p>Manajemen BCA&nbsp;mengungkapkan bahwa PT Bank Digital BCA, anak usaha yang difokuskan sebagai bank digital, berencana akan melantai di pasar modal lewat mekanisme penawaran umum saham perdana (initial public offering/IPO) di BEI.</p><p>Namun rencana IPO alias<i> go public</i> tersebut belum akan dalam waktu dekat ini. Presiden Direktur BCA, Jahja Setiaatmadja&nbsp;membenarkan rencana IPO tersebut.</p><p>Bila tak ada halangan, dalam 1-2 tahun Bank Digital BCA diharapkan bisa melantai di pasar modal. Meski demikian, Jahja belum merinci lebih lanjut mengenai target besaran jumlah saham maupun harga yang akan dilepas ke publik.</p><p>\"Iya, dalam 1-2 tahun ke depan,\" kata Jahja, kepada CNBC Indonesia, Kamis kemarin (1/7/2021).</p><p>Bank Digital BCA dijadwalkan akan mulai meluncur pada 2 Juli 2021 melalui aplikasi blu untuk pengguna Android.</p><p>EVP Sekretariat dan Komunikasi Perusahaan BCA Hera F Haryn mengatakan, nantinya Bank Digital BCA akan beroperasi melalui aplikasi blu.</p><p>\"blu adalah aplikasi mobile banking BCA Digital. Akun Instagram resmi BCA Digital adalah @blubybcadigital,\" katanya saat dikonfirmasi.</p><p>Bank Digital BCA adalah hasil transformasi dari PT Bank Royal Indonesia. BCA mengambilalih saham Bank Royal pada November 2019. Nilai pengambilalihan yang dilakukan adalah sebesar Rp 988.046.957.182.</p><p>Saat ini, Bank Digital BCA&nbsp;juga tengah menanti izin layanan digital yang sudah diajukan bersama dengan enam bank lainnya yakni PT BRI Agroniaga Tbk, (AGRO), PT Bank Neo Commerce Tbk, (BBYB), PT Bank Capital Tbk(BACA), PT Bank Harda Internasional Tbk (BBHI), PT Bank QNB Indonesia Tbk (BKSW) dan PT Bank KEB Hana.</p><p>\"Royal Bank disiapkan menjadi BCA Digital, kami harap pertengahan tahun ini paling lambat bisa operasi sendiri yang bisa dioperasikan,\" kata Jahja&nbsp;dalam diskusi virtual VIP Forum Digital Bank, digelar CNBC Indonesia April lalu.</p><p>Jahja menjelaskan, dengan hadirnya bank digital layanan akan lebih terintegrasi dengan cakupan nasabah yang beragam. Selama ini BCA memiliki nasabah eksisting sehingga dengan adanya bank digital ada segmen tertentu yang bisa difokuskan.</p><p>Tidak hanya itu, Bank Digital BCA akan diarahkan menjadi bank yang sepenuhnya digital atau neo bank.</p><p>\"Kalau kita lihat ini masalah kebutuhan, saya ambil contoh McDonald, anda datang duduk nyaman itu fast food, tapi yang digital, dia bisa pesan melalui <i>ecommerce</i> yang menyediakan menu itu, ada Grab, Shopee Food, GoFood,\" jelas Jahja.</p><p>\"Tapi ada segmen tertentu yang suka atau kurang digital, mereka cari yang <i>drive thru</i>. Sama kaya BCA begitu kira-kira,kita punya bank ada yang nasabah konvensional, milenial, maka ada tengah-tengah kami pikir ada segmen tertentu yang lebih fokus kalau punya Digital Bank BCA, Royal Bank disiapkan menjadi BCA Digital.\"</p><p>Dari pasar modal, saham BBCA&nbsp;pada perdagangan Kamis kemarin (1/7) ditutup stagnan di level Rp 30.125/saham dengan nilai transaksi Rp 351 miliar dan volume perdagangan 11,63 juta saham. Sebulan terakhir perdagangan saham BBCA&nbsp;minus 8,7% dengan kapitalisasi pasar Rp 743 triliun.</p>', 'Made Adi Adnyana', 1, 1);

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
(38, 'ikan', 14);

-- --------------------------------------------------------

--
-- Table structure for table `gambar`
--

CREATE TABLE `gambar` (
  `id_gambar` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `judul` varchar(100) NOT NULL,
  `gambar` varchar(100) DEFAULT NULL,
  `admin` varchar(100) NOT NULL,
  `status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `gambar`
--

INSERT INTO `gambar` (`id_gambar`, `tanggal`, `judul`, `gambar`, `admin`, `status`) VALUES
(1, '2021-07-08', '123', '60e6f0e3a4a72.jpg', 'Richard Tandy Japutra', 0);

-- --------------------------------------------------------

--
-- Table structure for table `topik`
--

CREATE TABLE `topik` (
  `id_topik` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `topik`
--

INSERT INTO `topik` (`id_topik`, `nama`) VALUES
(1, '1'),
(2, 'nasgor');

-- --------------------------------------------------------

--
-- Table structure for table `tupoksi`
--

CREATE TABLE `tupoksi` (
  `id` int(11) NOT NULL,
  `posisi` text COLLATE utf8_unicode_ci NOT NULL,
  `misi` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tupoksi`
--

INSERT INTO `tupoksi` (`id`, `posisi`, `misi`) VALUES
(12, 'MAKAN', 'TIDUR'),
(13, '12345', '12345'),
(14, 'makan', 'makanan');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) CHARACTER SET latin1 DEFAULT NULL,
  `username` varchar(25) CHARACTER SET latin1 NOT NULL,
  `password` varchar(255) CHARACTER SET latin1 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `nama`, `username`, `password`) VALUES
(1, 'Hanustavira Guru Acarya', 'HanVir', 'sunibngalam'),
(3, 'Richard Tandy Japutra', '123', '123'),
(4, 'Yulyani Arifin', 'Yulyani', 'sunibngalam'),
(10, 'Elizabeth Paskahlia Gunawan', 'Lili', 'sunibngalam');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `artikel`
--
ALTER TABLE `artikel`
  ADD PRIMARY KEY (`id_artikel`),
  ADD KEY `artikel_ibfk_1` (`id_topik`);

--
-- Indexes for table `detail_tupoksi`
--
ALTER TABLE `detail_tupoksi`
  ADD PRIMARY KEY (`id_detail_tupoksi`),
  ADD KEY `detail_tupoksi_ibfk_1` (`id_tupoksi`);

--
-- Indexes for table `gambar`
--
ALTER TABLE `gambar`
  ADD PRIMARY KEY (`id_gambar`);

--
-- Indexes for table `topik`
--
ALTER TABLE `topik`
  ADD PRIMARY KEY (`id_topik`);

--
-- Indexes for table `tupoksi`
--
ALTER TABLE `tupoksi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `artikel`
--
ALTER TABLE `artikel`
  MODIFY `id_artikel` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `detail_tupoksi`
--
ALTER TABLE `detail_tupoksi`
  MODIFY `id_detail_tupoksi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `gambar`
--
ALTER TABLE `gambar`
  MODIFY `id_gambar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `topik`
--
ALTER TABLE `topik`
  MODIFY `id_topik` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tupoksi`
--
ALTER TABLE `tupoksi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `artikel`
--
ALTER TABLE `artikel`
  ADD CONSTRAINT `artikel_ibfk_1` FOREIGN KEY (`id_topik`) REFERENCES `topik` (`id_topik`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `detail_tupoksi`
--
ALTER TABLE `detail_tupoksi`
  ADD CONSTRAINT `detail_tupoksi_ibfk_1` FOREIGN KEY (`id_tupoksi`) REFERENCES `tupoksi` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
