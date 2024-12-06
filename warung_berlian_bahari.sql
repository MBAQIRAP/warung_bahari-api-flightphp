-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 05, 2024 at 07:03 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `warung_berlian_bahari`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_kas`
--

CREATE TABLE `tbl_kas` (
  `id_kas` int(11) NOT NULL,
  `tgl_kas` datetime DEFAULT NULL,
  `total_harga_kas` decimal(10,0) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_kategori_pemasukan`
--

CREATE TABLE `tbl_kategori_pemasukan` (
  `id_kategori_pemasukan` int(11) NOT NULL,
  `nama_kategori_pemasukan` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_kategori_pemasukan`
--

INSERT INTO `tbl_kategori_pemasukan` (`id_kategori_pemasukan`, `nama_kategori_pemasukan`) VALUES
(3, 'gofood'),
(4, 'grab'),
(2, 'qris'),
(5, 'test'),
(1, 'tunai');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_kategori_pengeluaran`
--

CREATE TABLE `tbl_kategori_pengeluaran` (
  `id_kategori_pengeluaran` int(11) NOT NULL,
  `nama_kategori_pengeluaran` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_kategori_pengeluaran`
--

INSERT INTO `tbl_kategori_pengeluaran` (`id_kategori_pengeluaran`, `nama_kategori_pengeluaran`) VALUES
(4, 'lain-lain'),
(1, 'pasar'),
(2, 'sembako'),
(3, 'tetap');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_kategori_produk`
--

CREATE TABLE `tbl_kategori_produk` (
  `id_kategori_produk` int(11) NOT NULL,
  `nama_kategori_produk` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_kategori_produk`
--

INSERT INTO `tbl_kategori_produk` (`id_kategori_produk`, `nama_kategori_produk`) VALUES
(4, 'Cs'),
(1, 'Makanan'),
(2, 'Minuman');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_pemasukan`
--

CREATE TABLE `tbl_pemasukan` (
  `id_pemasukan` int(11) NOT NULL,
  `total_pemasukan` decimal(10,0) DEFAULT NULL,
  `tgl_pemasukan` datetime DEFAULT NULL,
  `id_kategori_pemasukan` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_pemasukan`
--

INSERT INTO `tbl_pemasukan` (`id_pemasukan`, `total_pemasukan`, `tgl_pemasukan`, `id_kategori_pemasukan`) VALUES
(1, 100000, '2024-10-23 18:02:29', 3);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_pemasukan_detail`
--

CREATE TABLE `tbl_pemasukan_detail` (
  `id_pemasukan_detail` int(11) NOT NULL,
  `id_produk` int(11) DEFAULT NULL,
  `jml_produk` int(11) DEFAULT NULL,
  `id_pemasukan` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_pemasukan_detail`
--

INSERT INTO `tbl_pemasukan_detail` (`id_pemasukan_detail`, `id_produk`, `jml_produk`, `id_pemasukan`) VALUES
(1, 1, 12, 1),
(2, 2, 13, 1),
(3, 1, 2, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_pengeluaran`
--

CREATE TABLE `tbl_pengeluaran` (
  `id_pengeluaran` int(11) NOT NULL,
  `total_pengeluaran` decimal(10,0) DEFAULT NULL,
  `tgl_pengeluaran` datetime DEFAULT NULL,
  `id_kategori_pengeluaran` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_pengeluaran_detail`
--

CREATE TABLE `tbl_pengeluaran_detail` (
  `id_pengeluaran_detail` int(11) NOT NULL,
  `id_pengeluaran` int(11) DEFAULT NULL,
  `nama_Pengeluaran` varchar(255) DEFAULT NULL,
  `satuan_pengeluaran` varchar(255) DEFAULT NULL,
  `harga_pengeluaran` decimal(10,0) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_produk`
--

CREATE TABLE `tbl_produk` (
  `id_produk` int(11) NOT NULL,
  `harga_jual` decimal(10,0) DEFAULT NULL,
  `harga_beli` decimal(10,0) DEFAULT NULL,
  `nama_produk` varchar(100) DEFAULT NULL,
  `gambar_produk` varchar(255) DEFAULT NULL,
  `status_produk` int(11) DEFAULT NULL,
  `id_kategori_produk` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_produk`
--

INSERT INTO `tbl_produk` (`id_produk`, `harga_jual`, `harga_beli`, `nama_produk`, `gambar_produk`, `status_produk`, `id_kategori_produk`) VALUES
(1, 10000, 20000, 'Ayam', '32321', 2, 1),
(2, 20000, 30000, 'Sapi', '33232', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE `tbl_user` (
  `id_user` int(11) NOT NULL,
  `nama_user` varchar(100) DEFAULT NULL,
  `password_user` varchar(100) DEFAULT NULL,
  `id_user_role` int(11) DEFAULT NULL,
  `token_device` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`id_user`, `nama_user`, `password_user`, `id_user_role`, `token_device`) VALUES
(1, 'kiana', 'tuna', 1, NULL),
(2, 'mei', 'mei', 2, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user_role`
--

CREATE TABLE `tbl_user_role` (
  `id_user_role` int(11) NOT NULL,
  `nama_role` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_user_role`
--

INSERT INTO `tbl_user_role` (`id_user_role`, `nama_role`) VALUES
(30, 'adadada'),
(2, 'admin'),
(29, 'bisa cuy'),
(26, 'bjir'),
(1, 'kasir'),
(28, 'rajaiblis');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_kas`
--
ALTER TABLE `tbl_kas`
  ADD PRIMARY KEY (`id_kas`);

--
-- Indexes for table `tbl_kategori_pemasukan`
--
ALTER TABLE `tbl_kategori_pemasukan`
  ADD PRIMARY KEY (`id_kategori_pemasukan`),
  ADD UNIQUE KEY `tbl_kategori_pemasukan_pk` (`nama_kategori_pemasukan`);

--
-- Indexes for table `tbl_kategori_pengeluaran`
--
ALTER TABLE `tbl_kategori_pengeluaran`
  ADD PRIMARY KEY (`id_kategori_pengeluaran`),
  ADD UNIQUE KEY `tbl_kategori_pengeluaran_pk` (`nama_kategori_pengeluaran`);

--
-- Indexes for table `tbl_kategori_produk`
--
ALTER TABLE `tbl_kategori_produk`
  ADD PRIMARY KEY (`id_kategori_produk`),
  ADD UNIQUE KEY `tbl_kategori_produk_pk` (`nama_kategori_produk`);

--
-- Indexes for table `tbl_pemasukan`
--
ALTER TABLE `tbl_pemasukan`
  ADD PRIMARY KEY (`id_pemasukan`),
  ADD KEY `tbl_pemasukan_tbl_kategori_pemasukan_id_kategori_pemasukan_fk` (`id_kategori_pemasukan`);

--
-- Indexes for table `tbl_pemasukan_detail`
--
ALTER TABLE `tbl_pemasukan_detail`
  ADD PRIMARY KEY (`id_pemasukan_detail`),
  ADD KEY `tbl_pemasukan_detail_tbl_produk_id_produk_fk` (`id_produk`),
  ADD KEY `tbl_pemasukan_detail_tbl_pemasukan_id_pemasukan_fk` (`id_pemasukan`);

--
-- Indexes for table `tbl_pengeluaran`
--
ALTER TABLE `tbl_pengeluaran`
  ADD PRIMARY KEY (`id_pengeluaran`),
  ADD KEY `tbl_pengeluaran_tbl_kategori_fk` (`id_kategori_pengeluaran`);

--
-- Indexes for table `tbl_pengeluaran_detail`
--
ALTER TABLE `tbl_pengeluaran_detail`
  ADD PRIMARY KEY (`id_pengeluaran_detail`),
  ADD KEY `tbl_pengeluaran_detail_tbl_pengeluaran_id_pengeluaran_fk` (`id_pengeluaran`);

--
-- Indexes for table `tbl_produk`
--
ALTER TABLE `tbl_produk`
  ADD PRIMARY KEY (`id_produk`),
  ADD UNIQUE KEY `tbl_produk_pk` (`nama_produk`),
  ADD KEY `tbl_produk_tbl_kategori_produk_id_kategori_produk_fk` (`id_kategori_produk`);

--
-- Indexes for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`id_user`),
  ADD UNIQUE KEY `tbl_user_pk` (`nama_user`),
  ADD KEY `tbl_user_tbl_user_role_id_user_role_fk` (`id_user_role`);

--
-- Indexes for table `tbl_user_role`
--
ALTER TABLE `tbl_user_role`
  ADD PRIMARY KEY (`id_user_role`),
  ADD UNIQUE KEY `tbl_user_role_pk` (`nama_role`),
  ADD UNIQUE KEY `tbl_user_role_pk_2` (`nama_role`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_kas`
--
ALTER TABLE `tbl_kas`
  MODIFY `id_kas` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_kategori_pemasukan`
--
ALTER TABLE `tbl_kategori_pemasukan`
  MODIFY `id_kategori_pemasukan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tbl_kategori_pengeluaran`
--
ALTER TABLE `tbl_kategori_pengeluaran`
  MODIFY `id_kategori_pengeluaran` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_kategori_produk`
--
ALTER TABLE `tbl_kategori_produk`
  MODIFY `id_kategori_produk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tbl_pemasukan`
--
ALTER TABLE `tbl_pemasukan`
  MODIFY `id_pemasukan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_pemasukan_detail`
--
ALTER TABLE `tbl_pemasukan_detail`
  MODIFY `id_pemasukan_detail` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_pengeluaran`
--
ALTER TABLE `tbl_pengeluaran`
  MODIFY `id_pengeluaran` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_pengeluaran_detail`
--
ALTER TABLE `tbl_pengeluaran_detail`
  MODIFY `id_pengeluaran_detail` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_produk`
--
ALTER TABLE `tbl_produk`
  MODIFY `id_produk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_user_role`
--
ALTER TABLE `tbl_user_role`
  MODIFY `id_user_role` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tbl_pemasukan_detail`
--
ALTER TABLE `tbl_pemasukan_detail`
  ADD CONSTRAINT `tbl_pemasukan_detail_tbl_pemasukan_id_pemasukan_fk` FOREIGN KEY (`id_pemasukan`) REFERENCES `tbl_pemasukan` (`id_pemasukan`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tbl_pemasukan_detail_tbl_produk_id_produk_fk` FOREIGN KEY (`id_produk`) REFERENCES `tbl_produk` (`id_produk`);

--
-- Constraints for table `tbl_pengeluaran`
--
ALTER TABLE `tbl_pengeluaran`
  ADD CONSTRAINT `tbl_pengeluaran_tbl_kategori_fk` FOREIGN KEY (`id_kategori_pengeluaran`) REFERENCES `tbl_kategori_pengeluaran` (`id_kategori_pengeluaran`);

--
-- Constraints for table `tbl_pengeluaran_detail`
--
ALTER TABLE `tbl_pengeluaran_detail`
  ADD CONSTRAINT `tbl_pengeluaran_detail_tbl_pengeluaran_id_pengeluaran_fk` FOREIGN KEY (`id_pengeluaran`) REFERENCES `tbl_pengeluaran` (`id_pengeluaran`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tbl_produk`
--
ALTER TABLE `tbl_produk`
  ADD CONSTRAINT `tbl_produk_tbl_kategori_produk_id_kategori_produk_fk` FOREIGN KEY (`id_kategori_produk`) REFERENCES `tbl_kategori_produk` (`id_kategori_produk`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD CONSTRAINT `tbl_user_tbl_user_role_id_user_role_fk` FOREIGN KEY (`id_user_role`) REFERENCES `tbl_user_role` (`id_user_role`) ON DELETE SET NULL ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
