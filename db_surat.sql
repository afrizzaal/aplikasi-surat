-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 02, 2021 at 03:41 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_surat`
--

-- --------------------------------------------------------

--
-- Table structure for table `indeks`
--

CREATE TABLE `indeks` (
  `id_indeks` int(11) NOT NULL,
  `kode_indeks` varchar(10) NOT NULL,
  `nama` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `indeks`
--

INSERT INTO `indeks` (`id_indeks`, `kode_indeks`, `nama`) VALUES
(1, '100', 'Peringatan'),
(2, '200', 'Undangan'),
(5, '300', 'Dinas'),
(6, '400', 'Kepegawaian'),
(8, '500', 'Pemberitahuan'),
(16, '600', 'Surat Edaran'),
(17, '700', 'Surat Keputusan');

-- --------------------------------------------------------

--
-- Table structure for table `t_dataterkait`
--

CREATE TABLE `t_dataterkait` (
  `id_terkait` int(11) NOT NULL,
  `nama_terkait` varchar(50) NOT NULL,
  `nama_kepala` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `t_dataterkait`
--

INSERT INTO `t_dataterkait` (`id_terkait`, `nama_terkait`, `nama_kepala`) VALUES
(1, 'Sekretaris Camat', 'Benny Primiadi'),
(2, 'Kasubag Kepegawaian', 'Asep Subur'),
(3, 'Kasi Ketentraman dan Ketertiban', 'Dadang Supriatna'),
(4, 'Keuangan', 'Dian Ayu'),
(5, 'Kasi Tata Pemerintah', 'Imas Suryaningrat'),
(15, 'Camat', 'Drs. Al Idrus Nurhasan'),
(17, 'Operator', 'Devi Deria');

-- --------------------------------------------------------

--
-- Table structure for table `t_disposisi`
--

CREATE TABLE `t_disposisi` (
  `id_disposisi` int(11) NOT NULL,
  `sifat_surat` varchar(30) NOT NULL,
  `isi_disposisi` varchar(255) NOT NULL,
  `batas_waktu` date NOT NULL,
  `diteruskan_kepada` varchar(50) NOT NULL,
  `id_suratm` int(11) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `t_disposisi`
--

INSERT INTO `t_disposisi` (`id_disposisi`, `sifat_surat`, `isi_disposisi`, `batas_waktu`, `diteruskan_kepada`, `id_suratm`, `user_id`) VALUES
(1, 'Penting', 'Menghadiri undangan', '2020-11-28', 'Sekcam', 3, 1),
(3, 'Biasa', 'Undangan', '2020-11-25', 'Kasubag Kepegawaian dan Umum', 1, 1),
(9, 'Biasa', 'Undangan', '2020-11-25', 'Sekcam', 14, 1),
(10, 'Biasa', 'Mengenai Permohonan PKL', '2020-11-25', 'Kasubag Kepegawaian dan Umum', 18, 1),
(22, 'Biasa', 'Undangan', '2020-12-16', 'Sekcam', 32, 12);

-- --------------------------------------------------------

--
-- Table structure for table `t_suratkeluar`
--

CREATE TABLE `t_suratkeluar` (
  `id_suratk` int(11) NOT NULL,
  `no_agenda_sk` varchar(30) NOT NULL,
  `tanggal_surat` date NOT NULL,
  `ditujukan_kepada` varchar(50) NOT NULL,
  `perihal` varchar(50) NOT NULL,
  `unit_pengolah` varchar(50) NOT NULL,
  `id_indeks` int(11) NOT NULL,
  `keterangan` varchar(100) NOT NULL,
  `file_surat` varchar(100) NOT NULL,
  `status` varchar(20) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `t_suratkeluar`
--

INSERT INTO `t_suratkeluar` (`id_suratk`, `no_agenda_sk`, `tanggal_surat`, `ditujukan_kepada`, `perihal`, `unit_pengolah`, `id_indeks`, `keterangan`, `file_surat`, `status`, `user_id`) VALUES
(1, '138/51/Sekret', '2020-12-21', 'Koperasi Garuda', 'Pesanan Kit Pelatihan', 'Sekret', 1, 'Penting', 'suratk-201110-39a7f052d4.png', 'Dikirim', 1),
(2, '005/63/Tapem', '2020-12-21', 'Kepala Desa', 'Undangan', 'Tapem', 2, 'Penting', 'suratk-201010-13acc73c66.png', 'Diproses', 1),
(3, '900/60/Keu', '2020-12-21', 'PT. Bank BJB Cabang Bandung', 'Surat Perintah Pembayaran', 'Keuangan', 1, '-', 'suratk-201111-09c771d164.png', 'Diproses', 1),
(12, '139/81/Sekret', '2020-12-21', 'PT. Bank BJB Cabang Purwakarta', 'Surat Perintah Pembayaran', 'Sekret', 1, 'Biasa', 'suratk-201110-dca1e2162f.png', 'Diproses', 1),
(29, '139/53/Sekret', '2020-12-27', 'Koperasi Garuda', 'Pesanan Kit Pelatihan', 'Sekret', 1, 'Biasa', 'suratk-201227-0ec966ada0.png', 'Diproses', 1);

-- --------------------------------------------------------

--
-- Table structure for table `t_suratmasuk`
--

CREATE TABLE `t_suratmasuk` (
  `id_suratm` int(11) NOT NULL,
  `no_agenda_sm` varchar(30) NOT NULL,
  `tanggal_surat` date NOT NULL,
  `asal_surat` varchar(50) NOT NULL,
  `perihal` varchar(50) NOT NULL,
  `isi_surat` varchar(255) NOT NULL,
  `id_indeks` int(11) NOT NULL,
  `keterangan` varchar(100) NOT NULL,
  `file_surat` varchar(100) NOT NULL,
  `status` varchar(20) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `t_suratmasuk`
--

INSERT INTO `t_suratmasuk` (`id_suratm`, `no_agenda_sm`, `tanggal_surat`, `asal_surat`, `perihal`, `isi_surat`, `id_indeks`, `keterangan`, `file_surat`, `status`, `user_id`) VALUES
(1, '800/4404/BKAD', '2020-12-21', 'BKAD', 'Undangan', 'Mengenai Undangan', 1, 'Penting', 'suratm-201121-ababc3dc1c.png', 'Diproses', 1),
(3, '005/4409/Bappeda', '2020-12-21', 'Setda', 'Undangan', 'Mengenai Undangan', 1, 'Penting', 'suratm-201101-9c2c087d99.png', 'Diterima', 1),
(14, '400/666/BKPSDM', '2020-12-21', 'BPKSDM', 'Undangan', 'Mengenai Undangan', 2, 'Biasa', 'suratm-201104-b1302aeba3.png', 'Diterima', 1),
(18, '003/B/PPM/XII/2019', '2020-12-21', 'Politeknik Perdana Mandiri', 'Magang', 'Mengenai Permohonan PKL', 1, 'Biasa', 'suratm-201121-184c371563.png', 'Diterima', 1),
(32, '700/4405/BKAD', '2020-12-21', 'Pemda', 'Keterangan', 'Mengenai Undangan', 2, '-', 'suratm-201208-5d096bcebd.png', 'Diproses', 1);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(255) NOT NULL,
  `name` varchar(50) NOT NULL,
  `address` varchar(100) DEFAULT NULL,
  `level` int(1) NOT NULL COMMENT '1:admin, 2:user'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `username`, `password`, `name`, `address`, `level`) VALUES
(1, 'afrizzaal', 'd033e22ae348aeb5660fc2140aec35850c4da997', 'M Afrijal Amrulah', 'Purwakarta', 1),
(2, 'dzikra', '8cb2237d0679ca88db6464eac60da96345513964', 'M Dzikra Al-Malik', 'Bandung', 2),
(3, 'risal', '8cb2237d0679ca88db6464eac60da96345513964', 'Risal Maulana Yusup', 'Karawang', 2),
(12, 'riska', '8cb2237d0679ca88db6464eac60da96345513964', 'Riska Andriani', 'Purwakarta', 3);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `indeks`
--
ALTER TABLE `indeks`
  ADD PRIMARY KEY (`id_indeks`);

--
-- Indexes for table `t_dataterkait`
--
ALTER TABLE `t_dataterkait`
  ADD PRIMARY KEY (`id_terkait`);

--
-- Indexes for table `t_disposisi`
--
ALTER TABLE `t_disposisi`
  ADD PRIMARY KEY (`id_disposisi`),
  ADD KEY `id_suratm` (`id_suratm`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `t_suratkeluar`
--
ALTER TABLE `t_suratkeluar`
  ADD PRIMARY KEY (`id_suratk`),
  ADD KEY `id_indeks` (`id_indeks`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `t_suratmasuk`
--
ALTER TABLE `t_suratmasuk`
  ADD PRIMARY KEY (`id_suratm`),
  ADD KEY `id_indeks` (`id_indeks`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `indeks`
--
ALTER TABLE `indeks`
  MODIFY `id_indeks` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `t_dataterkait`
--
ALTER TABLE `t_dataterkait`
  MODIFY `id_terkait` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `t_disposisi`
--
ALTER TABLE `t_disposisi`
  MODIFY `id_disposisi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `t_suratkeluar`
--
ALTER TABLE `t_suratkeluar`
  MODIFY `id_suratk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `t_suratmasuk`
--
ALTER TABLE `t_suratmasuk`
  MODIFY `id_suratm` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `t_disposisi`
--
ALTER TABLE `t_disposisi`
  ADD CONSTRAINT `t_disposisi_ibfk_1` FOREIGN KEY (`id_suratm`) REFERENCES `t_suratmasuk` (`id_suratm`),
  ADD CONSTRAINT `t_disposisi_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`);

--
-- Constraints for table `t_suratkeluar`
--
ALTER TABLE `t_suratkeluar`
  ADD CONSTRAINT `t_suratkeluar_ibfk_1` FOREIGN KEY (`id_indeks`) REFERENCES `indeks` (`id_indeks`),
  ADD CONSTRAINT `t_suratkeluar_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`);

--
-- Constraints for table `t_suratmasuk`
--
ALTER TABLE `t_suratmasuk`
  ADD CONSTRAINT `t_suratmasuk_ibfk_1` FOREIGN KEY (`id_indeks`) REFERENCES `indeks` (`id_indeks`),
  ADD CONSTRAINT `t_suratmasuk_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
