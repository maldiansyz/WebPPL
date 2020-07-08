-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 08, 2020 at 10:05 AM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.3.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
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
  `jenis` varchar(128) NOT NULL,
  `detail` text,
  `jumlah` int(255) DEFAULT NULL,
  `harga` double DEFAULT NULL,
  `gbr` text,
  `id_user` int(11) NOT NULL,
  `date_created` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_barang`
--

INSERT INTO `tb_barang` (`id`, `nama`, `jenis`, `detail`, `jumlah`, `harga`, `gbr`, `id_user`, `date_created`) VALUES
(1, 'ASUS ROG Strix Hero II GL504GM', 'PC & Laptop', 'berlayar 15.6', 5, 500000, 'rog.jpg', 11, 1590560775),
(2, 'Dell Inspiron 7000 Core i5 7th Gen - (8 GB/1 TB HDD/Windows 10 Home)', 'PC & Laptop', 'DDR4 SDRAM, 8GB, SSD, 512GB, 14 inches, Windows 10 Home', 5, 5200000, 'dell.jpeg', 11, 1590560787),
(17, 'Dell Alienware 17', 'PC & Laptop', 'Gaming Laptop Dell Alienware dengan display 17.3 yang mendukung kegatan gaming Anda semaikin memuaskan, ketahanan baterai hingga 6.5 jam.', 5, 24450000, 'alienware.jpg', 11, 1590560798),
(18, 'MacBook Pro 13 inci', 'PC &Laptop', 'MacBook Pro 13 inci dilengkapi prosesor quad-core dan grafis hingga 60% lebih cepat, Magic Keyboard, Chip T2 Security, dan layar Retina cemerlang.', 6, 9000000, 'download_(1).jpg', 11, 1594111855),
(19, 'Iphone 11 pro', 'Smartphone & Tablet', 'iPhone 11 Pro. Sistem tiga kamera dengan Ultra Wide, Wide, dan Telefoto. Mode Malam. Super Retina XDR. A13 Bionic. Kekuatan baterai hingga 5 jam', 41, 21000000, 'iphone.jpg', 16, 1594136968),
(22, 'Kipas Doraemon', 'Electronic', 'kipas dengan motif doraemon', 300, 100000, 'kipas.jpg', 17, 1594136996),
(23, 'AC', 'Electronic', 'Air Conditioner', 5, 100000, 'ac.jpg', 11, 1594195469);

-- --------------------------------------------------------

--
-- Table structure for table `tb_cart`
--

CREATE TABLE `tb_cart` (
  `id` int(11) NOT NULL,
  `token` int(11) DEFAULT NULL,
  `product_id` int(11) DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
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
  `stts` varchar(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_login`
--

INSERT INTO `tb_login` (`id`, `name`, `username`, `password`, `stts`, `created_at`) VALUES
(2, '', 'fang', '123', '0', '2020-03-28 13:25:29'),
(4, '', 'xin', '321', '0', '2020-03-26 08:49:36'),
(5, '', 'ervin', '12345', '0', '2020-03-26 08:49:36'),
(6, '', 'budi123', '234', '0', '2020-03-26 08:53:50'),
(7, 'Michael', 'admin', '$2y$10$cpO1XWV.Nsazf4zem3s05OM', 'admin', '2020-05-13 05:30:58'),
(10, 'joni', 'joni', '$2y$10$NSPGNo0GJEIj4Z3a8yCmDu.', 'member', '2020-05-13 05:32:19'),
(11, 'jani', 'jani', '$2y$10$oD1y/7Q7C4MPmg9Fg/PgH.8', 'member', '2020-05-13 05:33:18'),
(12, 'Michael', 'ax', '$2y$10$YJo2eBv9QjyDnzGpg6emaOK', 'member', '2020-05-13 05:33:39'),
(13, 'Michael', 'joni', '$2y$10$8nm0tBeSb84n0L7CUuXLD.P', 'member', '2020-05-13 05:33:48'),
(14, 'josu', 'josu', '$2y$10$Cv4AcQghgDp.gq3iH.3XCuk', 'member', '2020-05-13 05:33:56'),
(15, 'Michael', 'qwe', '123', 'member', '2020-05-13 05:34:09'),
(16, 'jiso', 'jiso', '123', 'member', '2020-05-13 05:34:27'),
(17, 'udin', 'udin', '$2y$10$i75m6O0XZBqsb2MK6.K.SO3', 'member', '2020-05-13 05:34:36'),
(18, 'hoha', 'hihi', '$2y$10$3Z8PIoI2xAw.ZBUpuRCATuC', 'member', '2020-05-13 05:34:44'),
(19, 'uwux', 'admin', 'admin', 'admin', '2020-05-13 05:35:30');

-- --------------------------------------------------------

--
-- Table structure for table `tb_tran`
--

CREATE TABLE `tb_tran` (
  `id` varchar(32) NOT NULL,
  `date_created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `id_cus` int(11) DEFAULT NULL,
  `id_user` int(11) DEFAULT NULL,
  `total_tran` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `date_pay` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_tran`
--

INSERT INTO `tb_tran` (`id`, `date_created`, `id_cus`, `id_user`, `total_tran`, `status`, `date_pay`) VALUES
('TRN-000001', '0000-00-00 00:00:00', 5, 11, 560000, 0, 0),
('TRN-000002', '2020-07-06 20:06:33', 10, 16, 700000, 1, 6072020),
('TRN-000003', '2020-07-06 20:06:33', 11, 17, 1000000, 1, 6072020);

-- --------------------------------------------------------

--
-- Table structure for table `tb_user`
--

CREATE TABLE `tb_user` (
  `id` int(11) NOT NULL,
  `name` varchar(128) NOT NULL,
  `username` varchar(15) NOT NULL,
  `email` varchar(128) NOT NULL,
  `image` varchar(128) NOT NULL,
  `password` varchar(256) NOT NULL,
  `alamat` text NOT NULL,
  `notelp` varchar(32) NOT NULL,
  `gender` varchar(4) NOT NULL,
  `role_id` int(11) NOT NULL,
  `is_active` int(1) NOT NULL,
  `date_created` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_user`
--

INSERT INTO `tb_user` (`id`, `name`, `username`, `email`, `image`, `password`, `alamat`, `notelp`, `gender`, `role_id`, `is_active`, `date_created`) VALUES
(11, 'Jack Sparrow', 'jack', 'jack@mhs.dinus.ac.id', 'b.jpg', '$2y$10$XDvu2xXxqA0J7wKmtmzEBukKpychrVj/i0Thn4hzCn6g5ieZIklz6', '-', '88888888', 'L', 1, 1, 1590562202),
(12, 'Joni Paleka', 'joni', 'joni@gmail.com', 'default.jpg', '$2y$10$uAroI1j6ka1zJ4VvxtiYce6qrXI3ffbk8tJKWImfCpxg8LmBB6nNi', '-', '1234567', 'L', 2, 1, 1589399557),
(13, 'Bill Gates', 'bill', 'billgates@gmail.com', 'bill.jpg', '$2y$10$8nHv/NWOfXHbNpo1Sgu87O1z59OQ0coJ6dxb2L1.rmlDajlzXYEzG', '-', '821454', 'L', 1, 1, 1590559969),
(15, 'Kim jong un', 'jongun', 'jongun@gmail.com', 'jongun.jpg', '$2y$10$D0OB0hWi1HudjoXg1DY2peTa5pAO/haCp.am11ezH4HKGBNALLqeW', 'korut', '9876967', 'P', 2, 1, 1590559981),
(16, 'Fadhilla', 'fadhilla', 'fadfad@gmail.com', 'k1.jpg', '$2y$10$lPT3vEUoWz5ihvdm0LZ/zOYneBefSa.A18hQBenYtn48wuJQHfWPW', 'smg', '67', 'P', 2, 1, 1594136209),
(17, 'Ariana grande', 'ariana', 'ariana@gmail.com', 'profile.jpg', '$2y$10$NS4yTXbXpYTjhU/iWkxr4.JfTrqGe6fQkVcCDkz2WyyZfFh8qUTjW', '', '', 'none', 2, 1, 1590560000),
(23, 'okeoke', 'fadhillaiffata', 'fadhillaiffata@gmail.com', 'default.jpg', '$2y$10$xOCa10Qe5y5iOIAOTDGtsOBf3wpd8bg5DNIKYHYJKp85ZZLBl8LeS', '-', '-', 'none', 2, 1, 1594110930),
(25, 'Selena Gemez', 'Selena', 'selena@gmail.com', 'sel.jpg', '$2y$10$NqHhbscWVzoagAZqlVEvFuBpRdFePYO4ID.TIDLNLxUuf/g1oAV22', '-', '-', 'none', 2, 1, 1594166876),
(27, 'Kim jong un', 'fadhilla', 'aldi@gmail.com', 'b.jpg', '$2y$10$5FIwvE9hWF0a2.yhOLYkr.sBryaic6eEcV/ghgKJ/wsUIyHVRqb9i', '-', '-', 'none', 2, 1, 1594133049),
(29, 'hahahha', 'huhuhu', 'hehehe@gmail.com', 'yellow.png', '$2y$10$b7x8JQhTeBF6HV/5fG.qxuVjrkKCX1AKDQD8Xozp2/5Hu62ppNU.K', '-', '-', 'none', 2, 1, 1594166675),
(30, 'okeoke', 'admin', 'oke@gmail.com', 'cherry-blossom-clip-art-sakura-branch.jpg', '$2y$10$kt/owLmDbNXL3EZyXzTmuO6ijn9ogXvUUJbFL06BNsabTq7lawgti', '-', '-', 'none', 2, 1, 1594139851),
(31, 'meow', 'meow', 'meow@gmail.com', 'default.jpg', '$2y$10$IDMHhSDlq8b5L1PLpee/7ejnwSaNTkdZqL/ff0sKuGB7DgTPFDzb2', '-', '-', 'none', 2, 1, 1594140151);

-- --------------------------------------------------------

--
-- Table structure for table `tb_user_access_menu`
--

CREATE TABLE `tb_user_access_menu` (
  `id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_user_access_menu`
--

INSERT INTO `tb_user_access_menu` (`id`, `role_id`, `menu_id`) VALUES
(1, 1, 1),
(2, 1, 2),
(3, 2, 2),
(4, 1, 3);

-- --------------------------------------------------------

--
-- Table structure for table `tb_user_menu`
--

CREATE TABLE `tb_user_menu` (
  `id` int(11) NOT NULL,
  `menu` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_user_menu`
--

INSERT INTO `tb_user_menu` (`id`, `menu`) VALUES
(1, 'Admin'),
(2, 'User'),
(3, 'Menu');

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
(2, 'Member'),
(3, 'Customer');

-- --------------------------------------------------------

--
-- Table structure for table `tb_user_sub_menu`
--

CREATE TABLE `tb_user_sub_menu` (
  `id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL,
  `title` varchar(128) NOT NULL,
  `url` varchar(128) NOT NULL,
  `icon` varchar(128) NOT NULL,
  `is_active` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_user_sub_menu`
--

INSERT INTO `tb_user_sub_menu` (`id`, `menu_id`, `title`, `url`, `icon`, `is_active`) VALUES
(1, 1, 'Dashboard', 'admin', 'fas fa-fw fa-store', 1),
(2, 2, 'My Profile', 'user', 'fas fa-fw fa-user', 1),
(3, 2, 'Edit Profile', 'user/edit', 'fas fa-fw fa-user-edit', 1),
(4, 3, 'Menu Management', 'menu', 'fas fa-fw fa-folder', 1),
(5, 3, 'Sub Menu Management', 'menu/submenu', 'fas fa-fw fa-folder-open', 1),
(6, 1, 'Data User', 'admin/datauser', 'fas fa-fw fa-users', 1),
(7, 2, 'Data Barang', 'user/databarang', 'fas fa-fw fa-book', 1),
(8, 2, 'List Transaksi', 'user/transaksi', 'fas fa-fw fa-shopping-bag', 1),
(11, 1, 'Role', 'admin/role', 'fas fa-fw fa-user-tie', 1),
(12, 2, 'Change Password', 'user/changepassword', 'fas fa-fw fa-key', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tb_user_token`
--

CREATE TABLE `tb_user_token` (
  `id` int(11) NOT NULL,
  `email` varchar(128) NOT NULL,
  `token` varchar(128) NOT NULL,
  `date_created` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_user_token`
--

INSERT INTO `tb_user_token` (`id`, `email`, `token`, `date_created`) VALUES
(5, 'fadhillaiffata@gmail.com', 'bScnmVBMQGOCCNrT0zvbUvknqLOrp4fIF6IYYG3nafc=', 1591241529);

-- --------------------------------------------------------

--
-- Table structure for table `upload`
--

CREATE TABLE `upload` (
  `id_files` int(11) NOT NULL,
  `nama_file` text
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
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_transc` (`id`);

--
-- Indexes for table `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_user_access_menu`
--
ALTER TABLE `tb_user_access_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_user_menu`
--
ALTER TABLE `tb_user_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_user_role`
--
ALTER TABLE `tb_user_role`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_user_sub_menu`
--
ALTER TABLE `tb_user_sub_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_user_token`
--
ALTER TABLE `tb_user_token`
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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `tb_cart`
--
ALTER TABLE `tb_cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `tb_login`
--
ALTER TABLE `tb_login`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `tb_user`
--
ALTER TABLE `tb_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `tb_user_access_menu`
--
ALTER TABLE `tb_user_access_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tb_user_menu`
--
ALTER TABLE `tb_user_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tb_user_role`
--
ALTER TABLE `tb_user_role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tb_user_sub_menu`
--
ALTER TABLE `tb_user_sub_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `tb_user_token`
--
ALTER TABLE `tb_user_token`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `upload`
--
ALTER TABLE `upload`
  MODIFY `id_files` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
