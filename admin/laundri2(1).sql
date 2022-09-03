-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Aug 29, 2018 at 08:08 AM
-- Server version: 5.6.21
-- PHP Version: 5.5.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `laundri2`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE IF NOT EXISTS `admins` (
  `username` varchar(50) COLLATE latin1_general_ci NOT NULL,
  `password` varchar(50) COLLATE latin1_general_ci NOT NULL,
  `nama_lengkap` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `email` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `no_telp` varchar(20) COLLATE latin1_general_ci NOT NULL,
  `level` varchar(20) COLLATE latin1_general_ci NOT NULL DEFAULT 'user',
  `alamat` varchar(50) COLLATE latin1_general_ci NOT NULL,
  `blokir` enum('Y','N') COLLATE latin1_general_ci NOT NULL DEFAULT 'N'
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`username`, `password`, `nama_lengkap`, `email`, `no_telp`, `level`, `alamat`, `blokir`) VALUES
('admin', '21232f297a57a5a743894a0e4a801fc3', 'Administrator', 'webmaster@sixghakreasi.com', '08238923848', 'admin', '', 'N');

-- --------------------------------------------------------

--
-- Table structure for table `item`
--

CREATE TABLE IF NOT EXISTS `item` (
`id_item` int(5) NOT NULL,
  `item_name` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `type` varchar(50) COLLATE latin1_general_ci NOT NULL,
  `harga` int(10) NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=41 DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data for table `item`
--

INSERT INTO `item` (`id_item`, `item_name`, `type`, `harga`) VALUES
(33, 'Boneka', 'Laundry', 15000),
(32, 'Blus Mute S', 'Wet Cleaning', 17500),
(39, 'Bad Cover Single', 'Laundry', 50000),
(40, 'Blus', 'Laundry', 12000);

-- --------------------------------------------------------

--
-- Table structure for table `member`
--

CREATE TABLE IF NOT EXISTS `member` (
`id_member` int(10) NOT NULL,
  `nama_lengkap` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `no_telp` varchar(20) COLLATE latin1_general_ci NOT NULL,
  `alamat` varchar(50) COLLATE latin1_general_ci NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data for table `member`
--

INSERT INTO `member` (`id_member`, `nama_lengkap`, `no_telp`, `alamat`) VALUES
(7, 'ada', '0855345', 'asdas'),
(2, 'Novalia Sihitessss', '0818956973', 'Wosi'),
(3, '1234', '0818956973', 'Wosi'),
(4, 'Jimy Issacsssss', '081248490680', 'Amban');

-- --------------------------------------------------------

--
-- Table structure for table `order_detail_kiloan`
--

CREATE TABLE IF NOT EXISTS `order_detail_kiloan` (
`inc` int(11) NOT NULL,
  `purchase_order_id` varchar(9) NOT NULL,
  `id_paket` int(10) NOT NULL,
  `ket` varchar(100) NOT NULL,
  `berat` int(10) NOT NULL,
  `price` double(20,0) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `order_detail_kiloan`
--

INSERT INTO `order_detail_kiloan` (`inc`, `purchase_order_id`, `id_paket`, `ket`, `berat`, `price`) VALUES
(5, 'NOTA18-7', 1, 'a', 2, 24000),
(6, 'NOTA18-7', 1, 'aa', 4, 48000),
(9, 'NOTA18-5', 1, 'celana dan baju', 3, 36000),
(10, 'NOTA18-5', 1, 'kaos', 4, 48000);

-- --------------------------------------------------------

--
-- Table structure for table `order_detail_pcs`
--

CREATE TABLE IF NOT EXISTS `order_detail_pcs` (
`inc` int(11) NOT NULL,
  `purchase_order_id` varchar(20) NOT NULL,
  `id_item` int(10) NOT NULL,
  `quantity` int(10) NOT NULL,
  `price` int(10) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `order_detail_pcs`
--

INSERT INTO `order_detail_pcs` (`inc`, `purchase_order_id`, `id_item`, `quantity`, `price`) VALUES
(1, 'NOTA18-1', 33, 1, 15000),
(11, 'NOTA18-2', 32, 2, 35000),
(12, 'NOTA18-3', 38, 2, 16000),
(13, 'NOTA18-4', 33, 2, 30000),
(14, 'NOTA18-4', 32, 1, 17500),
(15, 'NOTA18-4', 38, 3, 24000);

-- --------------------------------------------------------

--
-- Table structure for table `paket`
--

CREATE TABLE IF NOT EXISTS `paket` (
`id_paket` int(5) NOT NULL,
  `nama_paket` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `harga` varchar(30) COLLATE latin1_general_ci NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data for table `paket`
--

INSERT INTO `paket` (`id_paket`, `nama_paket`, `harga`) VALUES
(1, 'Reguler', '12000'),
(2, 'Kilat', '24000'),
(3, 'a', '12600');

-- --------------------------------------------------------

--
-- Table structure for table `purchase_order`
--

CREATE TABLE IF NOT EXISTS `purchase_order` (
  `inc` int(9) NOT NULL,
  `purchase_order_id` varchar(9) NOT NULL,
  `tanggal_masuk` varchar(10) NOT NULL,
  `tanggal_selesai` varchar(10) NOT NULL,
  `id_member` int(10) NOT NULL,
  `grand_total` varchar(10) NOT NULL,
  `uang` varchar(10) NOT NULL,
  `kembalian` varchar(10) NOT NULL,
  `cetak` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `purchase_order`
--

INSERT INTO `purchase_order` (`inc`, `purchase_order_id`, `tanggal_masuk`, `tanggal_selesai`, `id_member`, `grand_total`, `uang`, `kembalian`, `cetak`) VALUES
(1, 'NOTA18-1', '07/16/2018', '07/16/2018', 2, '15000', '20000', '5000', 1),
(2, 'NOTA18-2', '08/02/2018', '08/02/2018', 7, '35000', '50000', '15000', 1),
(3, 'NOTA18-3', '08/02/2018', '08/02/2018', 2, '16000', '20000', '4000', 1),
(4, 'NOTA18-4', '08/02/2018', '08/02/2018', 4, '71500', '100000', '28500', 1),
(5, 'NOTA18-5', '08/02/2018', '08/02/2018', 7, '84000', '100000', '16000', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
 ADD PRIMARY KEY (`username`);

--
-- Indexes for table `item`
--
ALTER TABLE `item`
 ADD PRIMARY KEY (`id_item`);

--
-- Indexes for table `member`
--
ALTER TABLE `member`
 ADD PRIMARY KEY (`id_member`);

--
-- Indexes for table `order_detail_kiloan`
--
ALTER TABLE `order_detail_kiloan`
 ADD PRIMARY KEY (`inc`);

--
-- Indexes for table `order_detail_pcs`
--
ALTER TABLE `order_detail_pcs`
 ADD PRIMARY KEY (`inc`), ADD KEY `beli_id` (`purchase_order_id`);

--
-- Indexes for table `paket`
--
ALTER TABLE `paket`
 ADD PRIMARY KEY (`id_paket`);

--
-- Indexes for table `purchase_order`
--
ALTER TABLE `purchase_order`
 ADD PRIMARY KEY (`inc`), ADD KEY `beli_id` (`purchase_order_id`), ADD KEY `supplier_id` (`id_member`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `item`
--
ALTER TABLE `item`
MODIFY `id_item` int(5) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=41;
--
-- AUTO_INCREMENT for table `member`
--
ALTER TABLE `member`
MODIFY `id_member` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `order_detail_kiloan`
--
ALTER TABLE `order_detail_kiloan`
MODIFY `inc` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `order_detail_pcs`
--
ALTER TABLE `order_detail_pcs`
MODIFY `inc` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `paket`
--
ALTER TABLE `paket`
MODIFY `id_paket` int(5) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
