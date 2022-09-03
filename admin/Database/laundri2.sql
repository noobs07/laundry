-- phpMyAdmin SQL Dump
-- version 3.5.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Apr 15, 2016 at 01:47 AM
-- Server version: 5.5.25a
-- PHP Version: 5.4.4

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
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
  `blokir` enum('Y','N') COLLATE latin1_general_ci NOT NULL DEFAULT 'N',
  PRIMARY KEY (`username`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`username`, `password`, `nama_lengkap`, `email`, `no_telp`, `level`, `alamat`, `blokir`) VALUES
('admin', '21232f297a57a5a743894a0e4a801fc3', 'Administrator', 'webmaster@sixghakreasi.com', '08238923848', 'admin', '', 'N'),
('member1', 'c7764cfed23c5ca3bb393308a0da2306', 'member1', 'member1@gmail.com', '0818956973', 'member', 'Bandung', 'N'),
('member2', '88ed421f060aadcacbd63f28d889797f', 'member2', 'member2@gmail.com', '0818956973', 'member', 'Jakarta', 'N');

-- --------------------------------------------------------

--
-- Table structure for table `item`
--

CREATE TABLE IF NOT EXISTS `item` (
  `id_item` int(5) NOT NULL AUTO_INCREMENT,
  `item_name` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `uom` varchar(5) COLLATE latin1_general_ci NOT NULL,
  `type` varchar(10) COLLATE latin1_general_ci NOT NULL,
  `remark` varchar(30) COLLATE latin1_general_ci NOT NULL,
  PRIMARY KEY (`id_item`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=34 ;

--
-- Dumping data for table `item`
--

INSERT INTO `item` (`id_item`, `item_name`, `uom`, `type`, `remark`) VALUES
(33, 'Celana Pendek', 'pcs', 'Celana', 'ok'),
(32, 'Baju', 'pcs', 'Baju', 'ok');

-- --------------------------------------------------------

--
-- Table structure for table `paket`
--

CREATE TABLE IF NOT EXISTS `paket` (
  `id_paket` int(5) NOT NULL AUTO_INCREMENT,
  `nama_paket` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `harga` varchar(30) COLLATE latin1_general_ci NOT NULL,
  PRIMARY KEY (`id_paket`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=34 ;

--
-- Dumping data for table `paket`
--

INSERT INTO `paket` (`id_paket`, `nama_paket`, `harga`) VALUES
(33, 'Cuci Saja', '5000'),
(31, 'Cuci Setrika', '10000'),
(32, 'Cuci Komplit', '13000');

-- --------------------------------------------------------

--
-- Table structure for table `pewangi`
--

CREATE TABLE IF NOT EXISTS `pewangi` (
  `id_pewangi` int(5) NOT NULL AUTO_INCREMENT,
  `nama_pewangi` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `harga` varchar(30) COLLATE latin1_general_ci NOT NULL,
  PRIMARY KEY (`id_pewangi`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=36 ;

--
-- Dumping data for table `pewangi`
--

INSERT INTO `pewangi` (`id_pewangi`, `nama_pewangi`, `harga`) VALUES
(34, 'Molto', '6000'),
(35, 'Kisprai', '7000');

-- --------------------------------------------------------

--
-- Table structure for table `purchase_order`
--

CREATE TABLE IF NOT EXISTS `purchase_order` (
  `inc` int(9) NOT NULL,
  `purchase_order_id` varchar(9) NOT NULL,
  `tanggal_masuk` varchar(10) NOT NULL,
  `tanggal_selesai` varchar(10) NOT NULL,
  `member_id` varchar(90) NOT NULL,
  `id_pewangi` int(5) NOT NULL,
  `id_paket` int(5) NOT NULL,
  `harga` varchar(10) NOT NULL,
  `berat` varchar(10) NOT NULL,
  `total` varchar(10) NOT NULL,
  `uang` varchar(10) NOT NULL,
  `kembalian` varchar(10) NOT NULL,
  PRIMARY KEY (`inc`),
  KEY `beli_id` (`purchase_order_id`),
  KEY `supplier_id` (`member_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `purchase_order`
--

INSERT INTO `purchase_order` (`inc`, `purchase_order_id`, `tanggal_masuk`, `tanggal_selesai`, `member_id`, `id_pewangi`, `id_paket`, `harga`, `berat`, `total`, `uang`, `kembalian`) VALUES
(1, 'NOTA16-1', '04/14/2016', '04/14/2016', 'member1', 35, 31, '10000', '4', '40000', '10000', '-30000'),
(2, 'NOTA16-2', '04/14/2016', '04/14/2016', 'member2', 34, 31, '10000', '2', '20000', '20000', '0');

-- --------------------------------------------------------

--
-- Table structure for table `purchase_order_detail`
--

CREATE TABLE IF NOT EXISTS `purchase_order_detail` (
  `inc` int(11) NOT NULL AUTO_INCREMENT,
  `purchase_order_id` varchar(9) NOT NULL,
  `item_id` varchar(14) NOT NULL,
  `quantity` smallint(5) NOT NULL,
  `remain_order` int(10) NOT NULL,
  `price` double(20,0) NOT NULL,
  `amount` double(20,0) NOT NULL,
  PRIMARY KEY (`inc`),
  KEY `beli_id` (`purchase_order_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=21 ;

--
-- Dumping data for table `purchase_order_detail`
--

INSERT INTO `purchase_order_detail` (`inc`, `purchase_order_id`, `item_id`, `quantity`, `remain_order`, `price`, `amount`) VALUES
(18, 'PO16-1', '33', 2, 2, 0, 0),
(19, 'PO16-1', '32', 3, 3, 0, 0),
(20, 'PO16-2', '32', 5, 5, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `suplier`
--

CREATE TABLE IF NOT EXISTS `suplier` (
  `id_suplier` int(5) NOT NULL AUTO_INCREMENT,
  `nama_suplier` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `email` varchar(30) COLLATE latin1_general_ci NOT NULL,
  `alamat` text COLLATE latin1_general_ci NOT NULL,
  `telp` varchar(15) COLLATE latin1_general_ci NOT NULL,
  PRIMARY KEY (`id_suplier`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=31 ;

--
-- Dumping data for table `suplier`
--

INSERT INTO `suplier` (`id_suplier`, `nama_suplier`, `email`, `alamat`, `telp`) VALUES
(25, 'PT DUA PUTRA PERKASA', 'xxx@gmail.com', 'xx', '0818956973'),
(28, 'PT SIXGHAKREASI', 'webmaster@sixghakreasi.com', 'Yogyakarta', '0818956973');

-- --------------------------------------------------------

--
-- Table structure for table `temp_purchase_order_detail`
--

CREATE TABLE IF NOT EXISTS `temp_purchase_order_detail` (
  `inc` int(11) NOT NULL AUTO_INCREMENT,
  `purchase_order_id` varchar(9) NOT NULL,
  `id_item` varchar(14) NOT NULL,
  `quantity` smallint(7) NOT NULL,
  `item_name` varchar(14) NOT NULL,
  `price` double(20,0) NOT NULL,
  `amount` double(20,0) NOT NULL,
  PRIMARY KEY (`inc`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Dumping data for table `temp_purchase_order_detail`
--

INSERT INTO `temp_purchase_order_detail` (`inc`, `purchase_order_id`, `id_item`, `quantity`, `item_name`, `price`, `amount`) VALUES
(10, 'member2', '33', 10, 'Celana Pendek', 0, 0);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
