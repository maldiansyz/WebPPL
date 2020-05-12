-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 12, 2020 at 05:35 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.2.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_android`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_barang`
--

CREATE TABLE `tb_barang` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) DEFAULT NULL,
  `detail` varchar(1000) DEFAULT NULL,
  `nilai` double DEFAULT NULL,
  `harga` double DEFAULT NULL,
  `gbr` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_barang`
--

INSERT INTO `tb_barang` (`id`, `nama`, `detail`, `nilai`, `harga`, `gbr`) VALUES
(1, 'ASUS ROG Strix Hero II GL504GM', 'berlayar 15.6\" dengan 144Hz refresh rate, GPU NVIDIA GeForce GTX 1060', 4.8, 500000, 'ASUS_ROG_STRIX_Hero_II.jpg'),
(2, 'Dell Inspiron 7000 Core i5 7th Gen - (8 GB/1 TB HDD/Windows 10 Home)', 'DDR4 SDRAM, 8GB, SSD, 512GB, 14 inches, Windows 10 Home', 5, 5200000, 'dell-inspiron-15-7000-w-g02.jpg'),
(17, 'Dell Alienware 17', 'Gaming Laptop Dell Alienware dengan display 17.3 yang mendukung kegatan gaming Anda semaikin memuaskan, ketahanan baterai hingga 6.5 jam.', 4.6, 24450000, 'Dell_Alienware_17_L_1.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tb_cart`
--

CREATE TABLE `tb_cart` (
  `id` int(11) NOT NULL,
  `token` int(11) DEFAULT NULL,
  `product_id` int(11) DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_cart`
--

INSERT INTO `tb_cart` (`id`, `token`, `product_id`, `quantity`, `created_at`) VALUES
(23, 5, 2, 1, '2020-04-06 14:31:51'),
(24, 5, 1, 3, '2020-04-07 04:23:07'),
(25, 5, 17, 2, '2020-04-06 14:35:08');

-- --------------------------------------------------------

--
-- Table structure for table `tb_login`
--

CREATE TABLE `tb_login` (
  `id` int(5) NOT NULL,
  `name` varchar(128) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(30) DEFAULT NULL,
  `role_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_login`
--

INSERT INTO `tb_login` (`id`, `name`, `username`, `password`, `role_id`, `created_at`) VALUES
(2, '', 'fang', '123', 0, '2020-03-28 13:25:29'),
(4, '', 'xin', '321', 0, '2020-03-26 08:49:36'),
(5, '', 'ervin', '12345', 0, '2020-03-26 08:49:36'),
(6, '', 'budi123', '234', 0, '2020-03-26 08:53:50'),
(7, 'Michael', 'admin', '$2y$10$cpO1XWV.Nsazf4zem3s05OM', 2, '0000-00-00 00:00:00'),
(8, 'joni', 'joni', NULL, 2, '0000-00-00 00:00:00'),
(9, 'jona', 'jona', NULL, 2, '0000-00-00 00:00:00'),
(10, 'joni', 'joni', '$2y$10$NSPGNo0GJEIj4Z3a8yCmDu.', 2, '0000-00-00 00:00:00'),
(11, 'joni', 'joni', '$2y$10$oD1y/7Q7C4MPmg9Fg/PgH.8', 2, '0000-00-00 00:00:00'),
(12, 'Michael', 'ax', '$2y$10$YJo2eBv9QjyDnzGpg6emaOK', 2, '0000-00-00 00:00:00'),
(13, 'Michael', 'joni', '$2y$10$8nm0tBeSb84n0L7CUuXLD.P', 2, '0000-00-00 00:00:00'),
(14, 'josu', 'josu', '$2y$10$Cv4AcQghgDp.gq3iH.3XCuk', 2, '0000-00-00 00:00:00'),
(15, 'Michael', 'qwe', '123', 2, '0000-00-00 00:00:00'),
(16, 'jiso', 'jiso', '123', 2, '0000-00-00 00:00:00'),
(17, 'udin', 'udin', '$2y$10$i75m6O0XZBqsb2MK6.K.SO3', 2, '0000-00-00 00:00:00'),
(18, 'hoha', 'hihi', '$2y$10$3Z8PIoI2xAw.ZBUpuRCATuC', 2, '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `tb_tran`
--

CREATE TABLE `tb_tran` (
  `id_tran` int(11) NOT NULL,
  `tgl_tran` datetime NOT NULL DEFAULT current_timestamp(),
  `id_user` int(11) DEFAULT NULL,
  `total_hg` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_tran`
--

INSERT INTO `tb_tran` (`id_tran`, `tgl_tran`, `id_user`, `total_hg`) VALUES
(7, '2020-04-13 17:42:27', 5, 55600000);

-- --------------------------------------------------------

--
-- Table structure for table `tb_user_role`
--

CREATE TABLE `tb_user_role` (
  `id` int(11) NOT NULL,
  `role` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_user_role`
--

INSERT INTO `tb_user_role` (`id`, `role`) VALUES
(1, 'Administrator'),
(2, 'Member');

-- --------------------------------------------------------

--
-- Table structure for table `upload`
--

CREATE TABLE `upload` (
  `id_files` int(11) NOT NULL,
  `nama_file` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `upload`
--

INSERT INTO `upload` (`id_files`, `nama_file`) VALUES
(1, 'asd.jpg'),
(2, 'magic-chess-syn-image.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_barang`
--
ALTER TABLE `tb_barang`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_cart`
--
ALTER TABLE `tb_cart`
  ADD KEY `id` (`id`);

--
-- Indexes for table `tb_login`
--
ALTER TABLE `tb_login`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_tran`
--
ALTER TABLE `tb_tran`
  ADD PRIMARY KEY (`id_tran`),
  ADD KEY `id_transc` (`id_tran`);

--
-- Indexes for table `tb_user_role`
--
ALTER TABLE `tb_user_role`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `upload`
--
ALTER TABLE `upload`
  ADD PRIMARY KEY (`id_files`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_barang`
--
ALTER TABLE `tb_barang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `tb_cart`
--
ALTER TABLE `tb_cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `tb_login`
--
ALTER TABLE `tb_login`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `tb_tran`
--
ALTER TABLE `tb_tran`
  MODIFY `id_tran` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tb_user_role`
--
ALTER TABLE `tb_user_role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `upload`
--
ALTER TABLE `upload`
  MODIFY `id_files` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
