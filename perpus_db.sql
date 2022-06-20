-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jun 09, 2021 at 10:45 AM
-- Server version: 10.1.19-MariaDB
-- PHP Version: 5.5.38

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `perpus_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_anggota`
--

CREATE TABLE `tb_anggota` (
  `nis` int(10) NOT NULL,
  `nama` varchar(200) COLLATE latin1_general_ci NOT NULL,
  `tempat_lahir` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `tgl_lahir` date NOT NULL,
  `jk` enum('l','p') COLLATE latin1_general_ci NOT NULL,
  `kelas` enum('X','XI','XII') COLLATE latin1_general_ci NOT NULL,
  `tgl_input` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data for table `tb_anggota`
--

INSERT INTO `tb_anggota` (`nis`, `nama`, `tempat_lahir`, `tgl_lahir`, `jk`, `kelas`, `tgl_input`) VALUES
(47027775, 'Robby Carisma', 'Bojonegoro', '2004-04-05', 'l', 'XI', '2021-05-08 11:51:55'),
(41379007, 'Rahmatul Afis Sholiqin', 'Bojonegoro', '2004-10-10', 'l', 'XI', '2021-05-08 11:52:59'),
(127255, 'Revallendra Novla Pratama Effendi', 'Bojonegoro', '2003-04-29', 'l', 'XI', '2021-05-08 12:55:37'),
(840557308, 'Nico Ariest Putra', 'Bojonegoro', '0002-12-06', 'l', 'XI', '2021-05-08 11:53:59'),
(12345678, 'user', 'bn', '2021-05-31', 'p', 'XI', '2021-06-05 04:01:33'),
(1234567890, 'Reval', 'bn', '2021-06-09', 'p', 'XI', '2021-06-09 08:10:07'),
(0, '', '', '0000-00-00', '', '', '2021-06-09 08:11:02');

-- --------------------------------------------------------

--
-- Table structure for table `tb_buku`
--

CREATE TABLE `tb_buku` (
  `id_buku` int(11) NOT NULL,
  `judul` varchar(200) COLLATE latin1_general_ci NOT NULL,
  `pengarang` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `penerbit` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `tahun_terbit` varchar(4) COLLATE latin1_general_ci NOT NULL,
  `isbn` varchar(25) COLLATE latin1_general_ci NOT NULL,
  `jumlah_buku` int(11) NOT NULL,
  `lokasi` varchar(50) COLLATE latin1_general_ci NOT NULL,
  `tgl_input` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data for table `tb_buku`
--

INSERT INTO `tb_buku` (`id_buku`, `judul`, `pengarang`, `penerbit`, `tahun_terbit`, `isbn`, `jumlah_buku`, `lokasi`, `tgl_input`) VALUES
(27, 'RPL ITU ASIK', 'Rosa A.S', 'Bookmark', '2008', '345464', 0, 'Rak 1', '2021-04-20 23:28:16'),
(58, 'Lighting Itu Mudah', 'Enche Tjin', 'Bukune', '2011', '987-602-220-013-0', 3, 'Rak 1', '2021-06-05 04:04:42'),
(57, 'Mahir Sepakbola', 'Andi Cipta Nugraha', 'Nuansa', '2012', '978-602-7768-11-6', 2, 'Rak 5', '2021-04-28 22:40:07'),
(56, 'Berpikir Seperti Para Juara', 'Susi Ivvanty', 'Istana Media ', '2016', '978-602-0862-08-8', 1, 'Rak 6', '2021-04-28 22:37:52'),
(55, 'AMAZING! Pesawat Tempur Si Ahli Gempur', 'Remigius Septian, Harzan Djajasasmita', 'Grasindo', '2016', '9786023753604', 5, 'Rak 5', '2021-04-28 00:01:27'),
(48, 'Generasi 90an Anak Kemaren Sore', 'Marchella FP', 'Gramedia', '2015', '978-979-91-0966-8', 1, 'Rak 4', '2021-04-27 23:24:03'),
(49, 'Memahami Tanda&Sandi', 'Rohmat Kurnia', 'KNGP', '2015', '978-602-94738-72', 3, 'Rak 3', '2021-04-27 23:28:20'),
(50, 'Pernak-Pernik Flanel ', 'Rahmad & Greshendy', 'linguakata', '2013', '602-8388-85-8', 4, 'Rak 5', '2021-04-28 23:59:32'),
(51, 'Otak Superior Tip Meningkatkan Kecerdasan Otak', 'Badrul Munier Buchori', 'PSIKOPEDIA', '2016', '978-602-288-329-6', 5, 'Rak 6', '2021-04-27 23:34:42'),
(52, 'Berdamai dengan Diri Sendiri', 'Juni Soekendar', 'Elex Media Komputindo', '2014', '978-602-02-4904-9', 5, 'Rak 3', '2021-04-27 23:39:20'),
(53, 'Basis Data', 'Henry Pandia', 'Erlangga', '2019', '978-602-486-533-7', 5, 'Rak 5', '2021-04-27 23:41:19'),
(54, 'Sang Dewi Bermahkota Pelangi', 'Usman Setiadi', 'PT Azka Mulia Media', '2006', '979-1211-02-7', 6, 'Rak 2', '2021-04-27 23:43:35'),
(59, 'Hand Book P3K', 'Rina Verina Cho', 'Pustaka Cerdas', '2015', '978-602-1584-51-4', 4, 'Rak 2', '2021-04-28 22:47:26'),
(61, 'Situs Situs dalam Alquran', 'Syahruddin El-Fikri', 'Republika', '2013', '978-602-8997-68-3', 2, 'Rak 7', '2021-04-28 23:01:58'),
(62, 'Trnasmisi Daya Listrik', 'Cekmas Cekdin dan Taufik Barlian', 'ANDI Yogyakarta', '2013', '978-979-29-4067-9', 2, 'Rak 7', '2021-04-28 23:12:38'),
(63, 'Menyingkap Rahasia Ilahi', 'Syaikh Abdul Qadir al-Jailani', 'Citra Risalah', '2009', '979-3752-04-1', 2, 'Rak 5', '2021-04-28 23:15:39'),
(64, 'Melihat Api Bekerja', 'M AAN MANSYUR', 'Gramedia', '2015', '978-602-02-1557-7', 3, 'Rak 4', '2021-04-28 23:17:49'),
(65, 'Penerapan Efek Visual pada Video dengan Adobe After Effects CS6', 'Sri Sulistiyani', 'ANDI ', '2013', '978-979-29-3534-9', 3, 'Rak 5', '2021-04-28 23:23:19'),
(66, 'Mahir Digital Imaging dengan Adobe Photoshop', 'Sri Sulistani', 'Penerbit Andi & Wahana Komputer', '2011', '978-979-29-2589-0', 3, 'Rak 6', '2021-04-28 23:29:10'),
(67, 'Haji For Teens', 'Muhammad Safrodin', 'Penerbit Bunyan', '2013', '978-602-7888-63-0', 6, 'Rak 5', '2021-04-28 23:35:23'),
(68, 'Mendidik Remaja Nakal', '.po', 'Semesta Hikmah', '2015', '978-602-7701-61-8', 4, 'Rak 1', '2021-04-28 23:43:55'),
(69, 'Instant Marketing for Busy People', 'Ardhi Ridwansyah', 'Esensi', '2017', '976-602-6847-32-4', 5, 'Rak 1', '2021-04-28 23:45:55'),
(70, 'Jalan Keadilan Memahat Jatidiri Bersama Para Nabi', 'Muhammad Tahir al-Qadri', 'Nur al-Huda', '2015', '978-602-306-042-9', 3, 'Rak 4', '2021-04-28 23:49:35'),
(71, 'Kimi dan Buku Ajaib', '30 Penulis Cilik', 'Bestari', '2016', '978-602-341-066-8', 2, 'Rak 4', '2021-04-28 23:53:53'),
(72, 'Ada Apa dengan Cinta', 'Silvarani', 'Gramedia', '2016', '978-602-03-2645-0', 3, 'Rak 3', '2021-04-28 23:56:06'),
(78, 'Sedekah Super Stories 1', 'nico cs', 'Semesta Hikmah', '1997', '123', 5, 'Rak 4', '2021-06-09 07:19:51'),
(82, 'labbahsa', 'ggffg', 'Elex Media Komputindo', '1997', '79667865875', 7, 'Rak 4', '2021-06-09 08:26:21'),
(80, 'Berdamai Dengan Diri Sendiri', 'ggffg', 'Pandu Pustaka', '2000', '978-602-9473-87-2', 9, 'Rak 6', '2021-06-09 08:13:26'),
(84, 'Sedekah Super Stories 1', 'kuntul', 'Elex Media Komputindo', '1999', '46-9879-45-78-7', 7, 'Rak 1', '2021-06-09 08:34:44'),
(85, 'lab bahsa', 'ggffg', 'Elex Media Komputindo', '1999', '234-344-7657-67-4', 3, 'Rak 3', '2021-06-09 08:35:41');

-- --------------------------------------------------------

--
-- Table structure for table `tb_lokasi`
--

CREATE TABLE `tb_lokasi` (
  `id_lokasi` int(11) NOT NULL,
  `lokasi` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_lokasi`
--

INSERT INTO `tb_lokasi` (`id_lokasi`, `lokasi`) VALUES
(1, 'Rak 1'),
(4, 'Rak 2'),
(5, 'Rak 3'),
(6, 'Rak 4'),
(7, 'Rak 5'),
(8, 'Rak 6'),
(9, 'Rak 7');

-- --------------------------------------------------------

--
-- Table structure for table `tb_transaksi`
--

CREATE TABLE `tb_transaksi` (
  `id` int(11) NOT NULL,
  `id_buku` int(11) NOT NULL,
  `judul` varchar(200) COLLATE latin1_general_ci NOT NULL,
  `nis` int(11) NOT NULL,
  `nama` varchar(200) COLLATE latin1_general_ci NOT NULL,
  `tgl_pinjam` varchar(30) COLLATE latin1_general_ci NOT NULL,
  `tgl_kembali` varchar(30) COLLATE latin1_general_ci NOT NULL,
  `status` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `tgl_input` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tb_user`
--

CREATE TABLE `tb_user` (
  `id` int(11) NOT NULL,
  `username` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `password` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `nama` varchar(200) COLLATE latin1_general_ci NOT NULL,
  `level` enum('admin','user') COLLATE latin1_general_ci NOT NULL,
  `foto` varchar(200) COLLATE latin1_general_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data for table `tb_user`
--

INSERT INTO `tb_user` (`id`, `username`, `password`, `nama`, `level`, `foto`) VALUES
(1, 'admin', 'admin', 'admin', 'admin', 'My-Account-Icon.jpg'),
(2, 'PakBudi', 'PakBudi', 'Pak Budi', 'user', 'login.png'),
(11, 'narti', 'narti', 'Narti', 'user', 'My-Account-Icon.jpg'),
(19, 'afis', 'afis', 'Afis', 'admin', 'smklogo.png'),
(16, 'poii', 'poii', 'poii', 'user', 'bukurplrevisi.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_anggota`
--
ALTER TABLE `tb_anggota`
  ADD PRIMARY KEY (`nis`);

--
-- Indexes for table `tb_buku`
--
ALTER TABLE `tb_buku`
  ADD PRIMARY KEY (`id_buku`),
  ADD UNIQUE KEY `isbn` (`isbn`);

--
-- Indexes for table `tb_lokasi`
--
ALTER TABLE `tb_lokasi`
  ADD PRIMARY KEY (`id_lokasi`);

--
-- Indexes for table `tb_transaksi`
--
ALTER TABLE `tb_transaksi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_buku`
--
ALTER TABLE `tb_buku`
  MODIFY `id_buku` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=86;
--
-- AUTO_INCREMENT for table `tb_lokasi`
--
ALTER TABLE `tb_lokasi`
  MODIFY `id_lokasi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `tb_transaksi`
--
ALTER TABLE `tb_transaksi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;
--
-- AUTO_INCREMENT for table `tb_user`
--
ALTER TABLE `tb_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
perpus_db