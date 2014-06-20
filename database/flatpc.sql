-- phpMyAdmin SQL Dump
-- version 4.2.0
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jun 16, 2014 at 01:48 AM
-- Server version: 5.6.17
-- PHP Version: 5.3.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `flatpc`
--
CREATE DATABASE IF NOT EXISTS `flatpc` DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci;
USE `flatpc`;

-- --------------------------------------------------------

--
-- Table structure for table `BINHLUAN`
--

CREATE TABLE IF NOT EXISTS `BINHLUAN` (
`ID` int(11) NOT NULL,
  `MASANPHAM` int(11) NOT NULL,
  `TENKHACHHANG` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `EMAIL` text COLLATE utf8_unicode_ci NOT NULL,
  `NOIDUNG` longtext COLLATE utf8_unicode_ci NOT NULL,
  `THOIGIAN` datetime NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=4 ;

--
-- Dumping data for table `BINHLUAN`
--

INSERT INTO `BINHLUAN` (`ID`, `MASANPHAM`, `TENKHACHHANG`, `EMAIL`, `NOIDUNG`, `THOIGIAN`) VALUES
(1, 8, 'Kelvin', 'kelvinlee@hotmail.com.vn', 'ssdssdsdsd', '2014-06-09 21:04:34'),
(2, 28, 'Kelvin', 'kelvinlee@hotmail.com.vn', 'à ờ', '2014-06-09 21:06:24'),
(3, 29, 'Kelvin', 'kelvinlee@hotmail.com.vn', 'Tốt', '2014-06-14 10:32:42');

-- --------------------------------------------------------

--
-- Table structure for table `BINHLUANTINTUC`
--

CREATE TABLE IF NOT EXISTS `BINHLUANTINTUC` (
`ID` int(11) NOT NULL,
  `MATINTUC` int(11) NOT NULL,
  `MAKHACHHANG` int(11) NOT NULL,
  `NOIDUNG` longtext COLLATE utf8_unicode_ci NOT NULL,
  `THOIGIAN` datetime NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=4 ;

--
-- Dumping data for table `BINHLUANTINTUC`
--

INSERT INTO `BINHLUANTINTUC` (`ID`, `MATINTUC`, `MAKHACHHANG`, `NOIDUNG`, `THOIGIAN`) VALUES
(3, 8, 1, 'Bài viết tốt', '2014-06-11 22:52:52');

-- --------------------------------------------------------

--
-- Table structure for table `CHITIETDANHGIA`
--

CREATE TABLE IF NOT EXISTS `CHITIETDANHGIA` (
`ID` int(11) NOT NULL,
  `MADANHGIA` int(11) DEFAULT NULL,
  `MASANPHAM` int(11) DEFAULT NULL,
  `MAKHACHHANG` int(11) DEFAULT NULL,
  `DIEM` int(11) DEFAULT NULL,
  `NOIDUNG` text COLLATE utf8_unicode_ci,
  `THOIGIAN` datetime DEFAULT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=37 ;

--
-- Dumping data for table `CHITIETDANHGIA`
--

INSERT INTO `CHITIETDANHGIA` (`ID`, `MADANHGIA`, `MASANPHAM`, `MAKHACHHANG`, `DIEM`, `NOIDUNG`, `THOIGIAN`) VALUES
(35, 13, 13, 1, 5, 'Tốt', '2014-06-14 02:47:56'),
(36, 29, 29, 1, 8, 'Được', '2014-06-14 10:32:58');

--
-- Triggers `CHITIETDANHGIA`
--
DELIMITER //
CREATE TRIGGER `UPDATE_CHITIET` AFTER UPDATE ON `chitietdanhgia`
 FOR EACH ROW UPDATE DANHGIA SET TONGDIEM = TONGDIEM + NEW.DIEM - OLD.DIEM, DIEMDANHGIA = ROUND((SELECT SUM(DIEM) FROM CHITIETDANHGIA WHERE MASANPHAM = NEW.MASANPHAM)/(SELECT COUNT(*) FROM CHITIETDANHGIA WHERE MASANPHAM = NEW.MASANPHAM),1) WHERE MASANPHAM = NEW.MASANPHAM
//
DELIMITER ;
DELIMITER //
CREATE TRIGGER `UPDATE_CHITIET_DELETE` AFTER DELETE ON `chitietdanhgia`
 FOR EACH ROW UPDATE DANHGIA SET LUOTDANHGIA = LUOTDANHGIA - 1, TONGDIEM = TONGDIEM - OLD.DIEM, DIEMDANHGIA = ROUND((SELECT SUM(DIEM) FROM CHITIETDANHGIA WHERE MASANPHAM = OLD.MASANPHAM)/(SELECT COUNT(*) FROM CHITIETDANHGIA WHERE MASANPHAM = OLD.MASANPHAM),1) WHERE MASANPHAM = OLD.MASANPHAM
//
DELIMITER ;
DELIMITER //
CREATE TRIGGER `UPDATE_CHITIET_INSERT` AFTER INSERT ON `chitietdanhgia`
 FOR EACH ROW UPDATE DANHGIA SET LUOTDANHGIA = LUOTDANHGIA + 1, TONGDIEM = TONGDIEM + NEW.DIEM, DIEMDANHGIA = ROUND((SELECT SUM(DIEM) FROM CHITIETDANHGIA WHERE MASANPHAM = NEW.MASANPHAM)/(SELECT COUNT(*) FROM CHITIETDANHGIA WHERE MASANPHAM = NEW.MASANPHAM),1) WHERE MASANPHAM = NEW.MASANPHAM
//
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `CHITIETHOADON`
--

CREATE TABLE IF NOT EXISTS `CHITIETHOADON` (
  `MADATHANG` int(11) NOT NULL,
  `MASANPHAM` int(11) NOT NULL,
  `SOLUONG` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `CHITIETHOADON`
--

INSERT INTO `CHITIETHOADON` (`MADATHANG`, `MASANPHAM`, `SOLUONG`) VALUES
(2, 8, 1),
(2, 10, 1),
(2, 28, 1),
(16, 12, 4),
(16, 14, 2),
(16, 28, 1),
(17, 7, 1),
(17, 31, 1),
(20, 11, 1);

-- --------------------------------------------------------

--
-- Table structure for table `CHITIETNHAPHANG`
--

CREATE TABLE IF NOT EXISTS `CHITIETNHAPHANG` (
  `MANHAPHANG` int(11) NOT NULL,
  `MASANPHAM` int(11) NOT NULL,
  `SOLUONG` int(11) DEFAULT NULL,
  `DONGIA` bigint(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `CHITIETNHAPHANG`
--

INSERT INTO `CHITIETNHAPHANG` (`MANHAPHANG`, `MASANPHAM`, `SOLUONG`, `DONGIA`) VALUES
(10, 6, 120, 20000000),
(10, 7, 50, 20500000),
(10, 8, 80, 19200000),
(11, 9, 250, 16500000),
(12, 10, 25, 17200000),
(12, 11, 25, 16500000),
(12, 12, 25, 16800000),
(13, 13, 10, 5600000),
(13, 14, 10, 4900000),
(13, 15, 10, 7200000),
(14, 16, 50, 75000),
(14, 17, 50, 300000),
(14, 18, 50, 120000),
(14, 19, 50, 480000),
(14, 20, 50, 115000),
(14, 21, 50, 270000),
(14, 22, 50, 265000),
(14, 23, 50, 320000),
(14, 24, 50, 85000),
(14, 25, 50, 165000),
(14, 26, 50, 240000),
(15, 27, 10, 2200000),
(15, 28, 15, 2790000),
(15, 29, 15, 2150000),
(15, 30, 10, 7100000),
(15, 31, 15, 6020000),
(15, 32, 10, 6900000),
(15, 33, 50, 100000),
(15, 34, 10, 1100000),
(15, 35, 10, 1720000),
(21, 52, 20, 2200000);

-- --------------------------------------------------------

--
-- Table structure for table `CHITIETSANPHAM`
--

CREATE TABLE IF NOT EXISTS `CHITIETSANPHAM` (
`ID` int(11) NOT NULL,
  `MASANPHAM` int(11) DEFAULT NULL,
  `HEDIEUHANH` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `MANHINH` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `CPU` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `CHIPSET` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `DOHOA` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `RAM` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ROM` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `CAMERA` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `KETNOI` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `DIAQUANG` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `PIN` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `TRONGLUONG` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `BAOHANH` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `KHUYENMAI` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=53 ;

--
-- Dumping data for table `CHITIETSANPHAM`
--

INSERT INTO `CHITIETSANPHAM` (`ID`, `MASANPHAM`, `HEDIEUHANH`, `MANHINH`, `CPU`, `CHIPSET`, `DOHOA`, `RAM`, `ROM`, `CAMERA`, `KETNOI`, `DIAQUANG`, `PIN`, `TRONGLUONG`, `BAOHANH`, `KHUYENMAI`) VALUES
(6, 6, 'Windows 8 và Android', 'IPS LCD Full HD, 11.6 inch', 'Intel core i5-4200U-2C/4T+Atom Z2560-2C/4T, 1.6 GHZ', '', '', '2GB + 4GB', '500GB, 16 GB', '5 MP(2592 x 1944 pixels)', 'Không 3G, Wifi chuẩn 802.11 a/b/g/n', '', 'Tablet 19Wh+PC Sation 33Wh', '1.7kg (Tablet: 0.7kg/ PC Station: 1kg )', '2 năm', ''),
(7, 7, 'iOS 7', 'Retina công nghệ IPS, 9.7 inch', 'Dual - Core, 1.3 GHz', '', '', '1 GB', '128 GB', '5 MP (2592 x 1944 pixels)', 'Có 3G ( tốc độ Download 21 Mbps, Upload 5.76 Mbps), Wi-Fi chuẩn (802.11a/b/g/n); 2 kênh (2.4GHz/ 5GHz) và MIMO', '', '8820 mAh (32.4W/h)', '487g', '1 năm', ''),
(8, 8, 'Android 4.4', 'WQXGA Super clear LCD, 12.2 inch', 'Quad core Cortex-A15+Quad core Cortex-A7, 1.9GHz x 4+1.3GHz x 4', '', '', '3 GB', '32 GB', '8 MP(3264x2448 pixels)', 'Có 3G ( tốc độ Download 21 Mbps, Upload 5.76 Mbps), WiFi (802.11 a/b/g/n/ac MIMO, HT80)', '', '9.500 mAh', '750g', '1 năm', ''),
(9, 9, 'Android 4.2', 'LED-backlit IPS TFT, 10.1 inch', 'Quad-core, 1.5 GHz', '', '', '2 GB', '16 GB', '8.1 MP', 'Có 3G ( tốc độ Download 21 Mbps, Upload 5.76 Mbps), Wifi chuẩn 802.11 a/b/g/n', '', '6000 mAh', '495g', '1 năm', ''),
(10, 10, 'Linux', '15.6 inch, HD (1366 x 768 pixels)', 'Intel, Core i7 Haswell, 4500U, 1.80 GHz', '', 'NVIDIA® GeForce® GT 840M, 2 GB', 'DDR3L(On board+1Khe), 4 GB', 'HDD + SSD, HDD: 500GB + SSD: 24GB', '', '', 'DVD Super Multimedia', 'Li-Po 4500mAh', '2.24 kg', '2 năm', 'Tặng chuột không dây cao cấp (giá trị đến 200.000đ), Balo Laptop cao cấp (giá trị đến 350.000đ)'),
(11, 11, 'Windows 8 Single Language,64-bit', '11.6 inch, HD (1366 x 768 pixels)', 'Intel, Core i5, 3339Y, 1.50 GHz', '', 'Intel® HD Graphics 4000, Share', 'DDR3 (on board), 2 GB', 'SSD, 120 GB', '', '', '', '4cell Li - Polymer', '0.8 kg', '1 năm', 'Tặng chuột không dây cao cấp (giá trị đến 200.000đ), Balo Laptop cao cấp (giá trị đến 350.000đ)'),
(12, 12, 'Linux', '14 inch, HD (1366 x 768 pixels)', 'Intel, Core i7 Haswell, 4500U, 1.80 GHz', '', 'NVIDIA® GeForce® GT 750M, 2 GB', 'DDR3L (2 khe RAM), 8 GB (2 Thanh)', 'HDD, 1 TB', '', '', 'DVD Super Multi Double Layer', 'Lithium-ion 6 cell', '2.14 kg', '1 năm', 'Tặng chuột không dây cao cấp (giá trị đến 200.000đ), Balo Laptop cao cấp (giá trị đến 350.000đ)'),
(13, 13, '', '', 'Intel Pentium G2020 2.9Ghz', 'Intel', 'Intel HD Graphics', 'DDR3, 1333Mhz, 2GB', 'HDD 500GB 5400rpm', '', '', 'DVD +/- RW', '', '', '3 năm', ''),
(14, 14, 'Free Dos', '', 'Intel Pentium 2.4Ghz', '', 'Shared', 'DDR3 2GB', 'HDD 500GB 7200rpm', '', '10/100/1000 Mbpsm Card Reader, Bluetooth', 'SuperMulti DVD +/- RW', '', '', '1 năm', ''),
(15, 15, 'Windows XP, Windows Vista, Windows 7, Windows 8,...', '', 'Intel 3.3 Ghz', 'Intel H61', 'Shared', 'DDR3 1333Mhz 4GB', 'HDD 500GB 7200rpm', '', '10/100/1000 Mbpsm Card Reader, Bluetooth', 'DVD +/- RW', '', '', '1 năm', ''),
(16, 16, '', '', '', '', '', '', '', '', '', '', '', '', '1 năm', ''),
(17, 17, '', '', '', '', '', '', '', '', '', '', '', '', '1 năm', ''),
(18, 18, '', '', '', '', '', '', '', '', '', '', '', '', '1 năm', ''),
(19, 19, '', '', '', '', '', '', '', '', '', '', '', '', '1 năm', ''),
(20, 20, '', '', '', '', '', '', '', '', '', '', '', '', '1 năm', ''),
(21, 21, '', '', '', '', '', '', '', '', '', '', '', '', '1 năm', ''),
(22, 22, '', '', '', '', '', '', '', '', '', '', '', '', '1 năm', ''),
(23, 23, '', '', '', '', '', '', '', '', '', '', '', '', '1 năm', ''),
(24, 24, '', '', '', '', '', '', '', '', '', '', '', '', '1 năm', ''),
(25, 25, '', '', '', '', '', '', '', '', '', '', '', '', '1 năm', ''),
(26, 26, '', '', '', '', '', '', '', '', '', '', '', '', '1 năm', ''),
(27, 27, 'Android 4.1', 'TFT LCD, 7 inch', 'Dual - Core, 1.2 GHz', '', '', '1 GB', '4 GB', '0.3 MP(VGA 640 x 480 pixels)', 'Không 3G, Wifi chuẩn 802.11 b/g/n', '', '3500 mAh', '340g', '1 năm', ''),
(28, 28, 'Android 4.3', 'LED Backlight WSVGA, 7 inch', 'Dual - Core, 1.2 GHz', '', '', '1 GB', '8 GB', '2 MP(1600 x 1200 pixels)', 'Có 3G (tốc độ Download 21Mbps/42 Mbps; Upload 5.76 Mbps, Wifi chuẩn 802.11 b/g/n', '', '3950 mAh', '295g', '1 năm', ''),
(29, 29, 'Android 4.2', 'TFT LCD, 7 inch', 'Dual - Core, 1.5 GHz', '', '', '1 GB', '8 GB', '1.9 MP(1600 x 1200 pixels)', 'Không 3G, Wifi chuẩn 802.11 b/g/n', '', 'Li-Ion 11,4W - 3000mAh', '289g', '1 năm', ''),
(30, 30, 'Linux', '14 inch, HD (1366 x 768 pixels)', 'Intel, Pentium Haswell, 3556U, 1.70 GHz', '', 'Intel® HD Graphics, Share', 'DDR3L (2 khe RAM), 2 GB', 'HDD, 500 GB', '', '', 'DVD Super Multi Double Layer', 'Li-Ion 2700mAh', '2.1kg', '1 năm', 'Tặng Túi xách Laptop (giá trị đến 150.000đ)'),
(31, 31, 'Linux', '14 inch, HD (1366 x 768 pixels)', 'Intel, Celeron, 2955U, 1.40 GHz', '', 'Intel® HD Graphics, Share', 'DDR3L (2 khe RAM), 2 GB', 'HDD, 500 GB', '', '', 'DVD Super Multi Double Layer', 'Li-Ion 2350mAh', '1.87kg', '1 năm', 'Tặng chuột quang (giá trị đến 90.000đ) và Túi xách Laptop (giá trị đến 150.000đ)'),
(32, 32, 'Linux', '14 inch, HD (1366 x 768 pixels)', 'Intel, Pentium Haswell, 3558U, 1.70 GHz', '', 'Intel® HD Graphics, 32 MB Share 972 MB', 'DDR3L (2 khe RAM), 2 GB', 'HDD, 500 GB', '', '', 'DVD Super Multi Double Layer', 'Li-Ion 2650mAh', '2.05kg', '1 năm', 'Tặng Túi xách Laptop (giá trị đến 150.000đ)'),
(33, 33, '', '', '', '', '', '', '', '', '', '', '', '', '1 năm', ''),
(34, 34, '', '', '', '', '', '', '', '', '', '', '', '', '1 năm', ''),
(35, 35, '', '', '', '', '', '', '', '', '', '', '', '', '1 năm', ''),
(36, 36, 'Android 4.3', 'IPS LCD Full HD, 7 inch', 'Quad-core, 1.5 GHz', '', '', '2 GB', '32 GB', '5 MP(2592 x 1944 pixels)', 'Có 3G ( tốc độ Download 21 Mbps, Upload 5.76 Mbps), Wifi chuẩn 802.11 a/b/g/n', '', '3950 mAh', '290g', '1 năm', 'Bao da silicon (giá trị đến 490.000đ)'),
(37, 37, 'Android 4.2', 'IPS-LCD, 8 inch', 'Quad-core, 1.2 GHz', '', '', '1 GB', '16 GB', '5 MP (2592 x 1944 pixels)', 'Có 3G ( tốc độ Download 21 Mbps, Upload 5.76 Mbps), Wifi chuẩn 802.11 a/b/g/n', '', '6000mAh', '399g', '1 năm', ''),
(38, 38, 'Linux', '14 inch, HD (1366 x 768 pixels)', 'Intel, Core i3, 3217U, 1.80 GHz', '', 'Intel® HD Graphics 4000, Share', 'DDR3 (2 khe RAM), 2 GB', 'HDD, 320 GB', '', '', 'DVD Super Multi Double Layer', 'Li-Ion 2700mAh', '1.98kg', '1 năm', 'Tặng chuột không dây cao cấp (giá trị đến 200.000đ), Balo Laptop cao cấp (giá trị đến 350.000đ)'),
(39, 39, 'Linux', '15.6 inch, HD (1366 x 768 pixels)', 'Intel, Core i3, 3110M, 2.40 GHz', '', 'Intel® HD Graphics 4000, Share 1760MB', 'DDR3L (2 khe RAM), 4 GB', 'HDD, 500 GB', '', '', 'DVD Super Multi Double Layer', 'Li-Ion 2620mAh', '2.25kg', '1 năm', 'Tặng chuột không dây cao cấp (giá trị đến 200.000đ), Balo Laptop cao cấp (giá trị đến 350.000đ)'),
(40, 40, 'Windows 8 Single Language,64-bit', '14 inch, HD (1366 x 768 pixels)', 'Intel, Core i3, 3110M, 2.40 GHz', '', 'Intel® HD Graphics 4000, Share 1664MB', 'DDR3L (2 khe RAM), 4 GB', 'HDD, 500 GB', '', '', 'DVD Super Multi Double Layer', 'Li-Ion 2620mAh', '1.95 kg', '1 năm', 'Tặng chuột quang (giá trị đến 90.000đ), Balo Laptop cao cấp (giá trị đến 150.000đ)'),
(43, 52, 'Android 4.1', 'TFT LCD, 7 inch', 'Dual - Core, 1.2 GHz', '', '', '1 GB', '4 GB', '0.3 MP(VGA 640 x 480 pixels)', 'Không 3G, Wifi chuẩn 802.11 b/g/n', '', '3500 mAh', '340g', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `DANHGIA`
--

CREATE TABLE IF NOT EXISTS `DANHGIA` (
`ID` int(11) NOT NULL,
  `MASANPHAM` int(11) NOT NULL,
  `LUOTDANHGIA` int(11) NOT NULL DEFAULT '0',
  `TONGDIEM` int(11) NOT NULL DEFAULT '0',
  `DIEMDANHGIA` double NOT NULL DEFAULT '0'
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=62 ;

--
-- Dumping data for table `DANHGIA`
--

INSERT INTO `DANHGIA` (`ID`, `MASANPHAM`, `LUOTDANHGIA`, `TONGDIEM`, `DIEMDANHGIA`) VALUES
(6, 6, 0, 0, 0),
(7, 7, 0, 0, 0),
(8, 8, 0, 0, 0),
(9, 9, 0, 0, 0),
(10, 10, 0, 0, 0),
(11, 11, 0, 0, 0),
(12, 12, 0, 0, 0),
(13, 13, 1, 5, 5),
(14, 14, 0, 0, 0),
(15, 15, 0, 0, 0),
(16, 16, 0, 0, 0),
(17, 17, 0, 0, 0),
(18, 18, 0, 0, 0),
(19, 19, 0, 0, 0),
(20, 20, 0, 0, 0),
(21, 21, 0, 0, 0),
(22, 22, 0, 0, 0),
(23, 23, 0, 0, 0),
(24, 24, 0, 0, 0),
(25, 25, 0, 0, 0),
(26, 26, 0, 0, 0),
(27, 27, 0, 0, 0),
(28, 28, 0, 0, 0),
(29, 29, 1, 8, 8),
(30, 30, 0, 0, 0),
(31, 31, 0, 0, 0),
(32, 32, 0, 0, 0),
(33, 33, 0, 0, 0),
(34, 34, 0, 0, 0),
(35, 35, 0, 0, 0),
(36, 36, 0, 0, 0),
(37, 37, 0, 0, 0),
(38, 38, 0, 0, 0),
(39, 39, 0, 0, 0),
(40, 40, 0, 0, 0),
(52, 52, 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `DATHANG`
--

CREATE TABLE IF NOT EXISTS `DATHANG` (
  `MADATHANG` int(11) NOT NULL,
  `MASANPHAM` int(11) NOT NULL,
  `SOLUONG` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `DATHANG`
--

INSERT INTO `DATHANG` (`MADATHANG`, `MASANPHAM`, `SOLUONG`) VALUES
(1, 8, 20990000),
(1, 10, 18390000),
(1, 28, 2990000),
(2, 8, 1),
(2, 10, 1),
(2, 28, 1),
(3, 8, 1),
(3, 10, 1),
(3, 28, 1),
(13, 8, 3),
(13, 10, 2),
(13, 28, 4),
(14, 28, 1),
(15, 6, 1),
(15, 8, 1),
(15, 10, 1),
(16, 12, 4),
(16, 14, 2),
(16, 28, 1),
(17, 7, 1),
(17, 31, 1),
(18, 6, 1),
(19, 10, 1),
(20, 11, 1),
(21, 28, 1);

-- --------------------------------------------------------

--
-- Table structure for table `HINHANH`
--

CREATE TABLE IF NOT EXISTS `HINHANH` (
`ID` int(11) NOT NULL,
  `TENANH` text COLLATE utf8_unicode_ci
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=60 ;

--
-- Dumping data for table `HINHANH`
--

INSERT INTO `HINHANH` (`ID`, `TENANH`) VALUES
(0, 'chua-co-anh.gif'),
(6, 'default-avatar.png'),
(7, 'avatar_kelvinlee.jpeg'),
(24, 'Asus-Transformer-Trio-TX201LA-bo-ban-hang-800x496-chuan.jpg'),
(25, 'iPad-Air-bo-ban-hang-800x496-chuan.jpg'),
(26, 'Samsung-Galaxy-Note-Pro-P901-bo-ban-hang-800x496-chuan.jpg'),
(27, 'Sony-Xperia-Tab-Z-Trang-01.jpg'),
(28, 'Asus-K551LN-bo-ban-hang-800x496-chuan.jpg'),
(29, 'acer-aspire-p3-bo-ban-hang-800x496-chuan.jpg'),
(30, 'Dell-Inspiron-5437-bo-ban-hang-800x496-chuan.jpg'),
(31, 'asus-bm6820-id28426.jpg'),
(32, 'lenovo-h500s-pentium-quadcore-j2850-id27961.jpg'),
(33, 'asus-cm6431-vn005s-id27712.jpg'),
(34, 'mieng-dan-man-hinh-ipad-3.jpg'),
(35, 'the-nho-16G-800x496-300.jpg'),
(36, 'the-nho-8G-800x496-300.jpg'),
(37, 'the-nho-32G-800x496-300.jpg'),
(38, 'usb-apacer-ah328_clip_image002.jpg'),
(39, 'usb-apacer-ah354-16gb_clip_image002.jpg'),
(40, 'usb-kingston-dt100-g3-16gb_clip_image002.jpg'),
(41, 'USBOTGFLASHDRIVEJETFLASH380-2014124161538.jpg'),
(42, 'chuot-quang-day-rut-zadez-m218_clip_image002.jpg'),
(43, 'chuot-khong-day-wintop-wm-692_clip_image005.jpg'),
(44, 'chuot-khong-day-genius-nx-6500_clip_image010.jpg'),
(45, 'Lenovo-IdeaTab-A1000-bo-ban-hang-800x496-chuan.jpg'),
(46, 'Asus-FonePad-7-bo-ban-hang-800x496-chuan.jpg'),
(47, 'Acer-Tab-7-bo-ban-hang-800x496-chuan.jpg'),
(48, 'Lenovo-S410P-bo-ban-hang-800x496-chuan.jpg'),
(49, 'Acer-Aspire-E1-432-bo-ban-hang-800x496-chuan.jpg'),
(50, 'Lenovo-G40-bo-ban-hang-800x496-chuan.jpg'),
(51, 'mieng-dan-man-hinh-laptop-nowatermark-300x300.jpg'),
(52, 'the-nho-transcend-microsd-64gb-class-10_clip_image002.jpg'),
(53, 'o-cung-800x496-300.jpg'),
(54, 'Asus-Google-Nexus-7-2013-bo-ban-hang-800x496-chuan.jpg'),
(55, 'Lenovo-Yoga-Tablet-8-B6000-bo-ban-hang-800x496-chuan.jpg'),
(56, 'Dell-Vostro-2421-bo-ban-hang-800x496-chuan.jpg'),
(57, 'Hp-15-D062TU-bo-ban-hang-800x496-chuan.jpg'),
(58, 'HP-14-D013TU-bo-ban-hang-800x496-chuan.jpg'),
(59, 'Lenovo-IdeaTab-A1000-bo-ban-hang-800x496-chuan1.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `HOADON`
--

CREATE TABLE IF NOT EXISTS `HOADON` (
`ID` int(11) NOT NULL,
  `NGAYDATHANG` datetime DEFAULT NULL,
  `NGAYTHANHTOAN` datetime DEFAULT NULL,
  `TENKHACHHANG` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `SDTKHACHHANG` char(13) COLLATE utf8_unicode_ci DEFAULT NULL,
  `TENNGUOINHAN` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `SDTNGUOINHAN` char(13) COLLATE utf8_unicode_ci DEFAULT NULL,
  `DIACHI` text COLLATE utf8_unicode_ci,
  `PTTHANHTOAN` int(11) DEFAULT NULL,
  `PTVANCHUYEN` int(11) DEFAULT NULL,
  `THANHTIEN` bigint(20) DEFAULT NULL,
  `TINHTRANG` int(11) DEFAULT NULL,
  `GIAMGIA` int(11) DEFAULT NULL,
  `NGUOILAPDON` int(11) DEFAULT NULL,
  `TONGTIEN` bigint(20) DEFAULT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=21 ;

--
-- Dumping data for table `HOADON`
--

INSERT INTO `HOADON` (`ID`, `NGAYDATHANG`, `NGAYTHANHTOAN`, `TENKHACHHANG`, `SDTKHACHHANG`, `TENNGUOINHAN`, `SDTNGUOINHAN`, `DIACHI`, `PTTHANHTOAN`, `PTVANCHUYEN`, `THANHTIEN`, `TINHTRANG`, `GIAMGIA`, `NGUOILAPDON`, `TONGTIEN`) VALUES
(2, '2014-06-09 13:18:39', '2014-06-14 17:14:32', 'Lee Kelvin', '01694662923', 'Kelvin Lee 2', '01694662924', 'TC', 0, 0, 42370000, -1, NULL, 1, 46607000),
(16, '2014-06-10 22:03:20', NULL, 'Lee Kelvin', '01694662923', 'Lê Thanh Diệp', '01694662923', 'Sa Đéc, Đồng Tháp', 1, 1, 90730000, 2, NULL, 1, 99853000),
(17, '2014-06-10 22:04:40', '2014-06-10 22:22:30', 'Lee Kelvin', '01694662923', 'Lê Thanh Diệp', '01694662923', 'TP.HCM', 1, 0, 28280000, -1, NULL, 1, 31108000),
(20, '2014-06-12 20:41:29', '2014-06-13 22:56:18', 'Lee Kelvin', '01694662923', 'Kelvin Lee 2', '01694662923', 'fgg', 1, 1, 18490000, -1, NULL, 1, 20389000);

-- --------------------------------------------------------

--
-- Table structure for table `LOAISANPHAM`
--

CREATE TABLE IF NOT EXISTS `LOAISANPHAM` (
`ID` int(11) NOT NULL,
  `TENLOAI` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=4 ;

--
-- Dumping data for table `LOAISANPHAM`
--

INSERT INTO `LOAISANPHAM` (`ID`, `TENLOAI`) VALUES
(0, 'Phụ kiện'),
(1, 'Máy tính bảng'),
(2, 'Máy tính xách tay'),
(3, 'Máy tính để bàn');

-- --------------------------------------------------------

--
-- Table structure for table `LOAITINTUC`
--

CREATE TABLE IF NOT EXISTS `LOAITINTUC` (
  `ID` int(11) NOT NULL,
  `TENLOAI` varchar(200) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `LOAITINTUC`
--

INSERT INTO `LOAITINTUC` (`ID`, `TENLOAI`) VALUES
(1, 'Tin khuyến mãi'),
(2, 'Tin công nghệ');

-- --------------------------------------------------------

--
-- Table structure for table `NGUOIDUNG`
--

CREATE TABLE IF NOT EXISTS `NGUOIDUNG` (
`ID` int(11) NOT NULL,
  `HODEM` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `TENNGUOIDUNG` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `TENDANGNHAP` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `MATKHAU` varchar(32) COLLATE utf8_unicode_ci DEFAULT NULL,
  `EMAIL` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `NGAYSINH` date DEFAULT NULL,
  `DIACHI` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `TINHTHANH` int(11) DEFAULT '64',
  `GIOITINH` tinyint(1) DEFAULT NULL,
  `CMND` char(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `SDT` char(13) COLLATE utf8_unicode_ci DEFAULT NULL,
  `QUYEN` int(11) DEFAULT '0',
  `TRANGTHAI` int(11) DEFAULT '1',
  `HINHDAIDIEN` int(11) DEFAULT '6'
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=36 ;

--
-- Dumping data for table `NGUOIDUNG`
--

INSERT INTO `NGUOIDUNG` (`ID`, `HODEM`, `TENNGUOIDUNG`, `TENDANGNHAP`, `MATKHAU`, `EMAIL`, `NGAYSINH`, `DIACHI`, `TINHTHANH`, `GIOITINH`, `CMND`, `SDT`, `QUYEN`, `TRANGTHAI`, `HINHDAIDIEN`) VALUES
(1, 'Lee', 'Kelvin', 'kelvinlee', '15920c7a701670e5a436b86b41fcc0d7', 'kelvinlee@hotmail.com.vn', '1993-06-13', 'Trường Chinh, Tây Thạnh', 5, 1, '341638370', '01694662923', 1, 1, 7),
(2, 'Nguyễn Ngọc', 'Hiếu', 'hieu1993', 'e10adc3949ba59abbe56e057f20f883e', 'hieu@gmail.com', '1993-01-30', 'Đà Lạt', 36, 1, '123456789', '0935574611', 2, 1, 6),
(3, 'Nguyễn Nhân', 'Ái', 'nhanai', 'e10adc3949ba59abbe56e057f20f883e', 'nhanai@yahoo.com.vn', '1993-10-08', 'Mỏ Cày', 12, 1, '376953625', '09191512771', 0, 1, 6),
(4, 'Nguyễn Tấn', 'Phát', 'phatnguyen', 'e10adc3949ba59abbe56e057f20f883e', 'phatng@yahoo.com', '1991-12-15', 'TP. Cao Lãnh', 23, 1, '867560152', '01234553613', 0, 1, 6),
(5, 'Lê Thanh', 'Diệp', 'thanhdiep', '15920c7a701670e5a436b86b41fcc0d7', 'kelvinlee.it@gmail.com', '1993-06-13', 'TP. Sa Đéc', 23, 1, '341637371', '01236977759', 1, 1, 6),
(6, 'Trần Thị Kim', 'Xuyến', 'kxuyen90', 'e10adc3949ba59abbe56e057f20f883e', 'kimxuyen@gmail.com', '1990-03-14', '', 7, 0, '340154786', '01227538572', 0, 0, 6),
(7, 'Lê Tấn', 'Lộc', 'locle994', 'e10adc3949ba59abbe56e057f20f883e', 'leloc94@gmail.com', '1994-07-28', '', 14, 1, '340559513', '0972373232', 0, 1, 6),
(8, 'Nguyễn Phúc', 'Hậu', 'phquynh', 'e10adc3949ba59abbe56e057f20f883e', 'phuchau80@gmail.com', '1993-10-30', '', 39, 1, '341096314', '01685498401', 2, 1, 6),
(9, 'Dương Tấn', 'Minh', 'minhduong', 'e10adc3949ba59abbe56e057f20f883e', 'tanminhduong@yahoo.com', '1988-04-26', '', 58, 1, '340186164', '01225159381', 0, 0, 6),
(10, 'Trương Trấn', 'Quốc', 'quoctruong90', 'e10adc3949ba59abbe56e057f20f883e', 'quoctruong90@gmail.com', '1990-05-15', '754/15 Lý Thường Kiệt', 5, 1, '340176843', '01684771537', 0, 1, 6),
(11, 'Lý Khánh', 'Hà', 'khanhha_kute', 'e10adc3949ba59abbe56e057f20f883e', 'khanhha_kute@yahoo.com.vn', '1991-04-17', 'Quận 1', 5, 0, '341695142', '01227966145', 0, 1, 6),
(12, 'Nguyễn Đỗ', 'Trung', 'trungnguyen1992', 'e10adc3949ba59abbe56e057f20f883e', 'trungnguyen92@gmail.com', '1992-09-05', '', 16, 1, '340851745', '0913665225', 0, 1, 6),
(13, 'Hà Như', 'Nguyệt', 'moonriver89', 'e10adc3949ba59abbe56e057f20f883e', 'moonriver89@gmail.com', '1989-09-19', '', 24, 0, '340998776', '01265778432', 0, 1, 6),
(14, 'Vũ Tuấn', 'Kiệt', 'kiet_pc', 'e10adc3949ba59abbe56e057f20f883e', 'kiet_pc@gmail.com', '1994-07-29', '', 61, 1, '340548661', '01692278716', 0, 1, 6),
(15, 'Trần Như', 'Lệ', 'tearfall_1992', 'e10adc3949ba59abbe56e057f20f883e', 'tearfall_1992@yahoo.com', '1992-02-01', '239 Lê Trọng Tấn, Q.Tân Phú', 5, 0, '340191277', '01217687551', 0, 1, 6),
(16, 'Trương Đức', 'Tấn', 'truongductan91', 'e10adc3949ba59abbe56e057f20f883e', 'truongductan91@gmail.com', '1991-02-11', '', 15, 1, '340188876', '0918725618', 0, 1, 6),
(17, 'Lê Trần Như', 'Hoa', 'flower812', 'e10adc3949ba59abbe56e057f20f883e', 'flower812@gmail.com', '1990-12-08', 'Quận 2', 5, 1, '341998105', '01222367851', 0, 1, 6),
(18, 'Nguyễn Nhật', 'Tiến', 'tiennhat88', 'e10adc3949ba59abbe56e057f20f883e', 'tiennhat88@gmail.com', '1988-03-12', 'Thủ Đức', 5, 1, '340198644', '0919514489', 0, 1, 6),
(19, 'Nguyễn Như', 'Ngọc', 'ngocnguyen2k14', 'e10adc3949ba59abbe56e057f20f883e', 'ngocnguyen2k14@gmail.com', '1993-04-14', '', 17, 0, '340676677', '01693671918', 0, 1, 6),
(20, 'Nguyễn', 'Khánh', 'khanhnguyen86', 'e10adc3949ba59abbe56e057f20f883e', 'khanhnguyen1986@gmail.com', '1986-06-25', '', 59, 1, '340998519', '012198461881', 0, 1, 6),
(21, 'Trương Ngọc', 'Huyền', 'ngochuyen1993', 'e10adc3949ba59abbe56e057f20f883e', 'ngochuyen93@gmail.com', '1993-12-23', '', 1, 0, '340664918', '0913518277', 0, 1, 6),
(22, 'Nguyễn Ngọc', 'Quyên', 'ngocquyen12', 'e10adc3949ba59abbe56e057f20f883e', 'ngocquyen12@gmail.com', '1993-12-12', 'Quận 3', 5, 1, '341998154', '0918185141', 0, 1, 6),
(23, 'Lý Kim', 'Nhã', 'kimnha90', 'e10adc3949ba59abbe56e057f20f883e', 'kimnha90@gmail.com', '1990-09-13', '', 3, 0, '', '', 0, 1, 6),
(24, 'Lê Nguyễn Như', 'Huỳnh', 'huynhle89', 'e10adc3949ba59abbe56e057f20f883e', 'huynhle89@gmail.com', '1989-09-19', '', 1, 1, '', '', 0, 1, 6),
(25, 'Nguyễn Kim', 'Hồng', 'kimhong93', 'e10adc3949ba59abbe56e057f20f883e', 'kimhong93@gmail.com', '1993-09-13', '', 5, 0, '', '', 0, 1, 6),
(26, 'Phan Thúy', 'Vy', 'thuyvyphan', 'e10adc3949ba59abbe56e057f20f883e', 'thuyvyphan@yahoo.com', '1993-11-18', 'Quận 7', 5, 1, '', '', 0, 1, 6),
(27, 'Vũ Văn', 'Long', 'wind_dragon_92', 'e10adc3949ba59abbe56e057f20f883e', 'wind_dragon_92@gmail.com', '1992-10-12', '', 5, 1, '', '', 0, 1, 6),
(28, 'Huỳnh', 'Khánh', 'khanh_huynh', 'e10adc3949ba59abbe56e057f20f883e', 'khanh_huynh@yahoo.com', '1993-02-02', '', 7, 1, '', '', 0, 1, 6),
(29, 'Phan Trọng', 'Trí', 'trongtri93', 'e10adc3949ba59abbe56e057f20f883e', 'trongtri93@gmail.com', '1993-04-14', '', 16, 1, '', '', 0, 1, 6),
(30, 'Bùi Thanh', 'Tuấn', 'tuanbui_90', 'e10adc3949ba59abbe56e057f20f883e', 'tuanbui_90@gmail.com', '1990-09-19', '', 5, 1, '', '', 0, 1, 6),
(31, 'Trịnh Thái', 'Hoàng', 'thaihoangtrinh', 'e10adc3949ba59abbe56e057f20f883e', 'thaihoangtrinh@yahoo.com', '1993-12-12', '', 5, 1, '', '', 0, 1, 6),
(32, 'Nguyễn Thái', 'Như', 'nhu_nguyen93', 'e10adc3949ba59abbe56e057f20f883e', 'nhu_nguyen93@yahoo.com', '1993-09-18', '', 5, 1, '', '', 0, 1, 6),
(33, 'Nguyễn Trung', 'Hậu', 'hau_trung', 'e10adc3949ba59abbe56e057f20f883e', 'hau_trung@gmail.com', '1988-09-19', '', 56, 1, '', '', 0, 1, 6),
(34, 'Nguyễn Phan', 'Phi', 'phanphi87', 'e10adc3949ba59abbe56e057f20f883e', 'phanphi87@gmail.com', '1987-04-17', '', 10, 1, '', '', 0, 1, 6),
(35, 'Lý', 'An', 'anly93', '15920c7a701670e5a436b86b41fcc0d7', 'anly93@gmail.com', '1991-09-14', '', 3, 1, '', '09191512775', 0, 1, 6);

-- --------------------------------------------------------

--
-- Table structure for table `NHACUNGCAP`
--

CREATE TABLE IF NOT EXISTS `NHACUNGCAP` (
`ID` int(11) NOT NULL,
  `TENNCC` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=10 ;

--
-- Dumping data for table `NHACUNGCAP`
--

INSERT INTO `NHACUNGCAP` (`ID`, `TENNCC`) VALUES
(0, 'Khác'),
(1, 'ACER'),
(2, 'ASUS'),
(3, 'DELL'),
(4, 'HP'),
(5, 'SONY'),
(6, 'TOSHIBA'),
(7, 'APPLE'),
(8, 'LENOVO'),
(9, 'SAMSUNG');

-- --------------------------------------------------------

--
-- Table structure for table `NHAPHANG`
--

CREATE TABLE IF NOT EXISTS `NHAPHANG` (
`ID` int(11) NOT NULL,
  `NGUOINHAP` int(11) DEFAULT NULL,
  `NGAYNHAP` datetime DEFAULT NULL,
  `TONGTIEN` bigint(20) DEFAULT NULL,
  `TINHTRANG` int(11) DEFAULT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=24 ;

--
-- Dumping data for table `NHAPHANG`
--

INSERT INTO `NHAPHANG` (`ID`, `NGUOINHAP`, `NGAYNHAP`, `TONGTIEN`, `TINHTRANG`) VALUES
(10, 1, '2014-06-05 13:47:38', 4961000000, 1),
(11, 1, '2014-06-05 13:57:03', 4125000000, 1),
(12, 1, '2014-06-05 14:43:06', 1262500000, 1),
(13, 1, '2014-06-05 15:56:34', 177000000, 1),
(14, 1, '2014-06-05 16:35:50', 121750000, 1),
(15, 1, '2014-06-05 23:52:25', 359600000, 1),
(21, 1, '2014-06-14 22:06:03', 44000000, 1),
(22, 1, '2014-06-15 09:18:48', 210, 1),
(23, 1, '2014-06-15 09:22:25', 14, 1);

-- --------------------------------------------------------

--
-- Table structure for table `QUYEN`
--

CREATE TABLE IF NOT EXISTS `QUYEN` (
  `ID` int(11) NOT NULL,
  `TENQUYEN` varchar(20) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `QUYEN`
--

INSERT INTO `QUYEN` (`ID`, `TENQUYEN`) VALUES
(0, 'Khách hàng'),
(1, 'Admin'),
(2, 'Nhân viên');

-- --------------------------------------------------------

--
-- Table structure for table `SANPHAM`
--

CREATE TABLE IF NOT EXISTS `SANPHAM` (
`ID` int(11) NOT NULL,
  `TENSANPHAM` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `LOAI` int(11) NOT NULL DEFAULT '0',
  `NHACUNGCAP` int(11) NOT NULL DEFAULT '0',
  `SOLUONG` int(11) NOT NULL DEFAULT '0',
  `HINHDAIDIEN` int(11) DEFAULT '0',
  `MOTA` text COLLATE utf8_unicode_ci,
  `DONGIA` bigint(20) NOT NULL DEFAULT '0',
  `NGAY` datetime DEFAULT NULL,
  `TINHTRANG` int(11) NOT NULL DEFAULT '1',
  `LUOTXEM` bigint(20) NOT NULL DEFAULT '0',
  `LUOTMUA` bigint(20) NOT NULL DEFAULT '0'
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=62 ;

--
-- Dumping data for table `SANPHAM`
--

INSERT INTO `SANPHAM` (`ID`, `TENSANPHAM`, `LOAI`, `NHACUNGCAP`, `SOLUONG`, `HINHDAIDIEN`, `MOTA`, `DONGIA`, `NGAY`, `TINHTRANG`, `LUOTXEM`, `LUOTMUA`) VALUES
(6, 'Asus Transformer Trio TX201LA', 1, 2, 120, 24, 'Asus đã công bố những hình ảnh và tính năng đặc biệt của siêu phẩm “biến hình” Asus Transformer Book Trio. Đây là một sản phẩm công nghệ cao 3 trong 1 mới của Asus, sản phẩm này được kỳ vọng sẽ mang lại một là làn gió mới cho công nghệ cao năm 2013.', 22890000, '2014-06-05 08:19:37', 1, 17, 29),
(7, 'iPad Air Cellular 128GB', 1, 7, 50, 25, 'iPad Air có những cải tiến về công nghệ táo bạo, mang đến cho người dùng những trải nghiệm tuyệt vời nhất, Apple đã làm nó xứng đáng với tên gọi “iPad Air”, khẳng định vị thế số một trên thị trường máy tính bảng của hãng.', 21990000, '2014-06-04 11:21:09', 1, 3, 6),
(8, 'Samsung Galaxy Note Pro 12.2 3G 32GB (P901)', 1, 9, 79, 26, 'Galaxy Note Pro 12.2 là một trong những chiếc tablet hàng đầu của hãng, sản phẩm mang đến sự khởi đầu đầy ấn tượng cho xu hướng máy tính bảng 12 inch. Thiết bị thuộc dòng “danh giá” mang thương hiệu Note, sở hữu màn hình cực lớn, sắc nét, bề ngoài được thiết kế với chất liệu cao cấp, sang trọng, bên trong thì được trang bị phần cứng và phần mềm có thể nói là tốt nhất hiện nay, sản phẩm có thể thách thức mọi đối thủ trên thị trường.', 20990000, '2014-06-05 11:21:18', 1, 24, 20),
(9, 'Sony Xperia Tab Z 10 3G/16GB', 1, 5, 250, 27, 'Xperia Tablet Z là một sản phẩm đáng tự hào của Sony, thiết bị được thiết kế khá giống với chiếc smartphone Xperia Z nhưng được trang bị màn hình rộng đến 10.1 inch, và độ dày của nó là 6.9mm, mỏng hơn cả iPad mini của Apple, và được cho ra chiếc tablet mỏng nhất thế giới tại thời điểm ra mắt.', 18990000, '2014-05-27 11:21:22', 1, 1, 4),
(10, 'Asus K551LN 74504G50G', 2, 2, 24, 28, 'Asus K551LN, một dòng laptop thời trang với hiệu suất ấn tượng, được Asus tung ra thị trường nhằm đáp ứng những yêu cầu ngày càng khắt khe của người dùng. Với màn hình lớn sắc nét, cấu hình khỏe, bàn phím rộng, sản phẩm rất thích hợp với người có nhu cầu tìm kiếm một thiết bị phục vụ công việc, học tập cũng như dùng cho mục đích giải trí.', 18390000, '2014-05-27 11:21:28', 1, 6, 15),
(11, 'Acer Aspire P3 171 53332G120W8T', 2, 1, 25, 29, 'Để đánh dấu sự trở lại của mình ở thị trường máy tính bảng Windows 8, Acer đã tung ra model máy tính bảng lai laptop với tên gọi Acer Aspire P3 171. Đây là một model máy tính với thiết kế hoàn toàn mới và mang đậm phong cách Acer.', 18490000, '2014-05-26 11:21:31', 1, 3, 6),
(12, 'Dell Inspiron 5437 74508G1TG', 2, 3, 21, 30, 'Dell Inspiron 5437 có lớp vỏ ngoài bằng nhôm vân xước, sơn màu xám lông chuột trông khá mát mắt. Logo Dell bằng kim loại sáng bóng nằm ngay giữa khá nổi bật và làm toàn thể máy trông cứng cáp hơn.', 18990000, '2014-06-01 11:21:34', 1, 6, 1),
(13, 'Asus BM6820', 3, 2, 5, 31, 'Asus BM6820/Pentium G2020 sử dụng bộ xử lý Pentium G2020 với RAM DDR3 2GB đáp ứng nhu sử dụng cơ bản của người dùng. Người dùng có thể vừa nghe nhạc vừa giải trí, và sử dụng các ứng dụng văn phòng mở nhiều ứng dụng cùng một lúc để nâng cao hiệu suất làm việc.', 6490000, '2014-05-29 11:21:38', 1, 9, 0),
(14, 'Lenovo H500s Pentium Quadcore J2850', 3, 8, 8, 32, 'H500s được trang bị bộ vi xử lý 4 nhân thế hệ mới Intel Pentium J2850 và 2 GB bộ nhớ RAM đem lại hiệu năng hoạt động xử lý nhanh chóng những tác vụ đa nhiệm, có thể xử dụng nhiều ứng dụng và phần mềm cùng một thời điểm.', 5890000, '2014-06-03 11:21:41', 1, 0, 1),
(15, 'Asus CM6431-VN005S', 3, 2, 10, 33, 'Asus CM6431-VN005S sử dụng bộ xử lý Intel Core i3 3220,3.3Ghz với RAM DDR3 4GB đáp ứng nhu sử dụng cơ bản của người dùng. Người dùng có thể vừa nghe nhạc vừa giải trí, và sử dụng các ứng dụng văn phòng mở nhiều ứng dụng cùng một lúc để nâng cao hiệu suất làm việc.', 8990000, '2014-06-04 11:21:45', 1, 0, 0),
(16, 'Miếng dán màn hình iPad', 0, 0, 50, 34, 'Giải pháp chống trầy xước màn hình iPad trong 12 tháng, với đặc điểm nổi bật. Miếng dán gồm 3 lớp, sau khi dán xong sử dụng lớp giữa, bỏ 2 lớp bìa. Giúp bảo vệ màn hình một cách tốt nhất, chống trầy, chống xướt. Tạo hình ảnh trên MH luôn sắt nét. Làm giảm phản quang của ánh sáng vào màn hình.', 90000, '2014-06-04 11:21:50', 1, 0, 0),
(17, 'Thẻ nhớ MicroSD 16gb class 10', 0, 0, 50, 35, 'Thẻ nhớ điện thoại 16GB class 10 có tốc độ ghi dữ liệu vào khoảng từ 10Mbs đến 12Mbs, tốc độ chép dữ liệu ra khoảng 19Mbs. Tốc độ đó giúp người dùng không phải đợi lâu khi chép dữ liệu ra cũng như đưa dữ liệu vào.', 350000, '2014-05-27 05:21:59', 1, 0, 0),
(18, 'Thẻ nhớ MicroSD 8gb Class 4', 0, 0, 50, 36, 'Thẻ nhớ ngoài là một thiết bị không thể thiếu cho thiết bị di động hiện nay, nó giúp mở rộng bộ nhớ, lưu trữ được nhiều hơn đặc biệt là phim ảnh, nhạc để giải trí.', 160000, '2014-05-07 06:22:05', 1, 0, 0),
(19, 'Thẻ nhớ MicroSD 32gb class 10', 0, 0, 50, 37, 'Với thẻ nhớ 32gb class 10, cùng đầu đọc thẻ, bạn hãy tưởng tượng nó như một ổ cứng di động tý hon, có thể thay thế USB, ổ cứng ngoài khác để sao chép và chia sẽ dữ liệu khi cần thiết từ máy tính này qua máy tính khác.', 600000, '2014-05-07 06:22:05', 1, 0, 0),
(20, 'USB Apacer AH328 8GB 2.0', 0, 0, 50, 38, 'USB Apacer AH328 8GB 2.0 là một sản phẩm đáng để bạn lưu tâm và chọn mua như một giải pháp lưu trữ gọn nhẹ, an toàn và tiết kiệm. Thương hiệu uy tín cùng chế độ bảo hành 12 tháng cho bạn một sự an tâm khi sử dụng sản phẩm để làm việc và cất giữ những tài liệu quan trọng của mình.', 150000, '2014-05-07 06:22:05', 1, 0, 0),
(21, 'USB Apacer AH354 16GB 3.0', 0, 0, 50, 39, 'USB Apacer AH354 mang đến giải pháp tối ưu và hiệu quả đối với việc lưu trữ và tạo điều kiện thuận để việc trao đổi dữ liệu giữa các thiết bị và giữa nhiều người được diễn ra một cách dễ dàng và nhanh chóng. Sản phẩm USB thời trang này có dung lượng lớn đến 16GB và tốc độ truyền dữ liệu cao gấp 10 lần so với các USB 2.0 thông thường, đó là tất các những gì bạn cần.', 300000, '2014-05-07 06:22:05', 1, 0, 0),
(22, 'USB Kingston DT100 G3 16GB 3.0', 0, 0, 50, 40, 'USB DT100 G3, một trong những sản phẩm của hãng sản xuất phụ kiện hàng đầu thế giới Kingston, là một sự lựa chọn khá hấp dẫn cho người dùng để giải quyết nhu cầu lưu trữ, truyền tải dữ liệu cá nhân. Không chỉ có dung lượng lớn (16GB), độ bền cao mà sản phẩm còn mang đến sự thoải mái và dễ dàng trong khi sử dụng nhờ thiết kế tinh tế.', 300000, '2014-05-07 06:22:05', 1, 0, 0),
(23, 'USB Transcend JetFlash 380 OTG 16GB 2.0', 0, 0, 50, 41, 'Hiện nay, với vòng quay công nghệ phát triển ngày càng nhanh và tân tiến. Hầu hết người dùng đều có nhu cầu trải nghiệm những sản phẩm công nghệ mới mang lại nhiều lợi ích. Hiểu được điều này Transcend đã cho ra đời sản phẩm USB OTG FLASH DRIVE JETFLASH 380 với những đặc điểm khác biệt và lợi ích của nó đối với các thiết bị Android.', 400000, '2014-05-23 09:22:17', 1, 0, 0),
(24, 'Chuột Zadez M218', 0, 0, 50, 42, 'Luôn là một trong những hàng có sản phẩm phụ kiện công nghệ hiện đại, Zadez M218 đã là một thương hiệu được nhiều người biết đến với sản phẩm chất lượng tốt, mẫu mã đẹp. Sản phẩm chuột quang dây rút Zadez M218 là một sản phẩm đã đạt được những tiêu chuẩn công nghệ và đáp ứng được nhu cầu người sủ dụng.', 100000, '2014-05-23 09:22:17', 1, 0, 0),
(25, 'Chuột không dây Wintop WM-692 Đen', 0, 0, 50, 43, 'Bạn đang tìm kiếm và lựa chọn cho mình một con chuột quang vừa thông minh vừa hiện đại mà lại hợp túi tiền cho chiếc laptop của bạn. Hiện nay có rất nhiều lựa chọn trong dòng sản phẩm chuột quang không dây. Chuột không dây Wintop WM-692 sẽ là lựa chọn mới lạ và độc đáo cho người dùng.', 200000, '2014-05-23 09:22:17', 1, 0, 0),
(26, 'Chuột quang không dây Genius NX 6500', 0, 0, 50, 44, 'Sử dụng máy tính hàng giờ, di chuyển nhiều và muốn tìm cho mình một giải pháp tối ưu trong việc sử dụng chuột máy tính, dẹp tan sự bất tiện của những sợi dây kết nối và còn phải có độ nhạy cao. Công việc của bạn sẽ trơn tru hơn với chuột không dây Genius NX 6500 mang đến sự thoải mái, chính xác trong từng cú click và cũng là một thiết bị mang đến sự chuyên nghiệp, sành điệu trên bàn làm việc của bạn.', 290000, '2014-05-23 09:22:17', 1, 0, 0),
(27, 'Lenovo IdeaTab A1000 7', 1, 8, 10, 45, 'Lenovo A1000 được tung ra nhằm vào thị trường tablet giá rẻ, khá hấp dẫn với chip lõi kép và bộ nhớ có thể mở rộng lên 32GB cùng hệ thống âm thanh trung thực Dolby Digital Plus. Tuy bề ngoài nhìn khá đơn giản nhưng khả năng di động của nó sẽ hấp dẫn nhiều khách hàng đến với sản phẩm hoàn thiện về chiếc máy tính bảng có chức năng gọi điện.', 2490000, '2014-05-23 09:22:17', 1, 0, 0),
(28, 'Asus FonePad 7 (FE170CG)', 1, 2, 18, 46, 'Sau thành công của loạt sản phẩm máy tính bảng 7 inch có chức năng nghe gọi với thương hiệu Fonepad 7, Asus tiếp tục ra mắt sản phẩm FonePad tiếp theo với tên mã Asus FonePad 7 (FE170CG). Theo Asus sản phẩm này sẽ có mức giá dưới 3 triệu đồng và trực tiếp cạnh tranh với các sản phẩm máy tính bảng cùng phân khúc như Huawei, Lenovo.', 2990000, '2014-05-23 09:22:17', 1, 206, 4),
(29, 'Acer Iconia One 7- B1 740', 1, 1, 15, 47, 'Không cạnh tranh mạnh mẽ trong phân khúc tablet cao cấp, Acer chiếm được lòng tin của khách hàng ở những sản phẩm giá rẻ, chất lượng ổn định. Sau Iconia B1-720 xuất hiện vào đầu năm 2014 và Iconia A1-830 vào cuối quý I-2014, Acer tiếp tục cho đưa lên kệ một máy tính bảng 7 inch giá rẻ, Iconia B1-740 với tên gọi khác là Acer Iconia One 7.', 2290000, '2014-05-31 14:22:31', 1, 8, 0),
(30, 'Lenovo S410P P3552G50', 2, 8, 10, 48, 'Lenovo S410P một dòng sản phẩm giá rẻ, hấp dẫn của Lenovo hướng đến người dùng bình dân, sản phẩm có thiết kế rất gọn gàng, mỏng và nhẹ.Bên trong máy được trang bị bộ xử lý mới Haswell của Intel, có khả năng tiết kiệm điện và hiệu suất ổn định. Dòng máy này thích hợp với các bạn sinh viên với khả năng tài chính eo hẹp nhưng có nhu cầu sử dụng máy tính để học tập.', 7390000, '2014-05-31 14:22:31', 1, 0, 0),
(31, 'Acer Aspire E1 432 29552G50Mn', 2, 1, 15, 49, 'Acer Aspire E1 432 sở hữu mức giá khá mềm, tuy nhiên thiết kế của laptop vẫn được trau chuốt cẩn thận, tỉ mỉ, cấu hình đáp ứng tốt những nhu cầu cơ bản từ học hành đến công việc văn phòng và được trang bị đầy đủ các cổng kết nối cơ bản nhằm phục vụ nhu cầu chia sẻ dữ liệu của người dùng. Đây sẽ là lựa chọn hợp lý cho các bạn học sinh, sinh viên và những ai muốn tiếp cận công nghệ với mức chi phí tiết kiệm nhất.', 6290000, '2014-05-31 14:22:31', 1, 5, 8),
(32, 'Lenovo G40 P3552G50', 2, 8, 10, 50, 'Lenovo G40 P3552G50 mang trong mình sức mạnh của bộ xử lý Pentium Haswell mới nhất của Intel đáp ứng nhu cầu sử dụng hằng ngày của người dùng – một sản phẩm nhắm đến những người có thu nhập còn hạn hẹp.', 7090000, '2014-05-31 14:22:31', 1, 1, 1),
(33, 'Miếng dán màn hình Laptop', 0, 0, 50, 51, 'Miếng dán màn hình laptop là một phụ kiện nhỏ nhưng có một giá trị vô cùng lớn đó là bảo vệ màn hình, chống xước, chống bám bụi, cho màn hình laptop của bạn luôn tươi mới.', 120000, '2014-05-31 14:22:31', 1, 1, 1),
(34, 'Thẻ nhớ MicroSD 64GB class 10_U1', 0, 0, 10, 52, 'Transcend MicroSD 64GB class 10 là thiết bị lưu trữ cao cấp rất đáng chú ý, sản phẩm cho bạn tốc độ truy cập dữ liệu rất nhanh, khởi động các chương trình nặng như game, video chất lượng full HD mà không hề có hiện tượng giật, lag, mọi thứ đều được diễn ra một cách mượt mà, trơn tru.', 1200000, '2014-05-31 14:22:31', 1, 0, 8),
(35, 'Transcend USB 3.0 StoreJet 25D3 1TB', 0, 0, 10, 53, 'Transcend StoreJet 25D3 sở hữu nhiều công nghệ chống sốc, bảo mật giúp bảo vệ dữ liệu một cách tối đa. Bên cạnh đó, thiết kế gọn nhẹ và dung lượng 1 TB cực lớn cho phép lưu trữ hàng trăm ngàn bài hát, video và dữ liệu khác. Với những ưu điểm đó, StoreJet 25D3 xứng đáng là người bạn đồng hành cùng bạn mọi lúc mọi nơi.', 1900000, '2014-05-31 14:22:31', 1, 0, 3),
(36, 'Asus Google Nexus 7 2013 Wifi/3G 32GB', 1, 2, 0, 54, 'Mẫu tablet này có chất lượng hoàn thiện tốt, màn hình sắc nét, hiệu năng vượt trội. Vì vậy, đây là lựa chọn tablet ở phân khúc 7 inch rất đáng đồng tiền bát gạo trong năm nay.', 8990000, '2014-06-06 11:19:12', 0, 12, 2),
(37, 'Lenovo Yoga Tablet 8 B6000', 1, 8, 0, 55, 'Sau thành công ấn tượng của dòng máy tích xách tay cao cấp Lenovo Yoga, Bây giờ Lenovo lại cho ra 1 sản phẩm tablet mới cũng rất ấn tượng, bởi nó vừa lạ, vừa độc đó chính là Lenovo Yoga Tablet 8 và 10.', 6490000, '2014-06-06 11:39:03', 0, 2, 8),
(38, 'Dell Vostro 2421 33212G32', 2, 3, 0, 56, 'Dell Vostro 2421 là một máy tính xách tay có thiết kế mỏng nhẹ, giá cả phải chăng, cấu hình ổn và đầy đủ kết nối. Tuy chưa phải là một chiếc máy có thiết kể vẻ ngoài xuất sắc và thực sự bắt mắt nhưng sản phẩm vẫn “ăn điểm” bởi sự chắc chắn, bền bỉ của mình. Máy thích hợp cho các bạn trẻ, đặc biệt là những bạn sinh viên có túi tiền vừa phải.', 8990000, '2014-06-06 11:42:51', 0, 0, 2),
(39, 'HP 15 D062TU 33114G50', 2, 4, 0, 57, 'Trong những tháng gần đây, HP liên tục tung ra những dòng sản phẩm tầm trung đánh vào phân khúc học sinh, sinh viên và nhân viên văn phòng. Đây là thế hệ laptop phổ thông mới, thay thế cho dòng HP 2000 vốn rất được ưa chuộng. Với những cải tiến vượt bậc về thiết kế và cấu hình, HP 15 D062TU là đại diện tiêu biểu và nổi bật trong dòng sản phẩm mới này.', 9290000, '2014-06-06 11:45:33', 0, 4, 4),
(40, 'HP 14 D013TU 33114G50W8', 2, 4, 0, 58, 'HP 14 D013TU sẽ là lựa chọn hoàn hảo cho các bạn học sinh, sinh viên và dân văn phòng cùng nhiều ngành nghề khác đòi hỏi phải đi lại nhiều. Bên cạnh đó với mức giá hợp túi tiền và chất lượng đã làm nên thương hiệu của HP, cũng là thiết bị giải trí đáng cân nhắc cho mọi gia đình. Tuy nhiên, cấu hình chưa thực sự cao là một nhược điểm đáng kể của máy.', 9990000, '2014-06-06 11:49:40', 0, 0, 1),
(52, 'Lenovo IdeaTab A1000 7', 1, 8, 20, 59, 'Lenovo A1000 được tung ra nhằm vào thị trường tablet giá rẻ, khá hấp dẫn với chip lõi kép và bộ nhớ có thể mở rộng lên 32GB cùng hệ thống âm thanh trung thực Dolby Digital Plus. Tuy bề ngoài nhìn khá đơn giản nhưng khả năng di động của nó sẽ hấp dẫn nhiều khách hàng đến với sản phẩm hoàn thiện về chiếc máy tính bảng có chức năng gọi điện.', 2490000, '2014-06-14 22:09:19', 1, 5, 0);

--
-- Triggers `SANPHAM`
--
DELIMITER //
CREATE TRIGGER `INSERT_INTO_DANHGIA` AFTER INSERT ON `sanpham`
 FOR EACH ROW INSERT INTO DANHGIA(MASANPHAM) VALUES (NEW.ID)
//
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `SESSION`
--

CREATE TABLE IF NOT EXISTS `SESSION` (
  `session_id` varchar(40) COLLATE utf8_unicode_ci NOT NULL DEFAULT '0',
  `ip_address` varchar(45) COLLATE utf8_unicode_ci NOT NULL DEFAULT '0',
  `user_agent` varchar(120) COLLATE utf8_unicode_ci NOT NULL,
  `last_activity` int(10) unsigned NOT NULL DEFAULT '0',
  `user_data` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `SESSION`
--

INSERT INTO `SESSION` (`session_id`, `ip_address`, `user_agent`, `last_activity`, `user_data`) VALUES
('2a7ae2e1e63fcba29998f12c3b2613e3', '127.0.0.1', 'Mozilla/5.0 (Windows NT 6.3; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/35.0.1916.153 Safari/537.36', 1402799030, 'a:9:{s:9:"user_data";s:0:"";s:19:"taikhoan_updateinfo";s:1:"1";s:2:"un";s:9:"kelvinlee";s:2:"bm";s:6:"FlatPC";s:2:"lg";b:1;s:15:"nhaphang_action";s:1:"1";s:11:"import_list";b:0;s:10:"sanphammoi";s:1:"3";s:14:"sanpham_action";s:1:"1";}'),
('715b4aded0dc26fe0ddb1698bc6b0b58', '127.0.0.1', 'Mozilla/5.0 (Windows NT 6.3; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/35.0.1916.153 Safari/537.36', 1402873812, 'a:29:{s:9:"user_data";s:0:"";s:19:"taikhoan_updateinfo";s:1:"1";s:19:"maytinhbang_perpage";s:1:"6";s:18:"maytinhbang_sortby";s:4:"time";s:18:"maytinhbang_viewby";s:4:"grid";s:16:"maytinhbang_page";s:1:"1";s:7:"captcha";s:6:"3B6FE8";s:2:"un";s:9:"kelvinlee";s:2:"bm";s:6:"FlatPC";s:2:"lg";b:1;s:16:"nguoidung_action";s:1:"1";s:14:"sanpham_action";s:1:"1";s:13:"hoadon_action";s:1:"1";s:14:"dathang_action";s:1:"1";s:13:"tintuc_action";s:1:"1";s:15:"binhluan_action";s:1:"1";s:14:"danhgia_action";s:1:"1";s:22:"maytinhxachtay_perpage";s:1:"6";s:21:"maytinhxachtay_sortby";s:4:"time";s:21:"maytinhxachtay_viewby";s:4:"grid";s:19:"maytinhxachtay_page";s:1:"1";s:20:"maytinhdeban_perpage";s:1:"6";s:19:"maytinhdeban_sortby";s:4:"time";s:19:"maytinhdeban_viewby";s:4:"grid";s:17:"maytinhdeban_page";s:1:"1";s:15:"phukien_perpage";s:1:"6";s:14:"phukien_sortby";s:4:"time";s:14:"phukien_viewby";s:4:"grid";s:12:"phukien_page";s:1:"1";}'),
('e446fab0252913a5ce46b6ab5717c18c', '127.0.0.1', 'Mozilla/5.0 (Windows NT 6.3; WOW64; rv:29.0) Gecko/20100101 Firefox/29.0', 1402799187, 'a:6:{s:9:"user_data";s:0:"";s:19:"taikhoan_updateinfo";s:1:"1";s:13:"cart_contents";a:4:{s:32:"093f65e080a295f8076b1c5722a46aa2";a:10:{s:5:"rowid";s:32:"093f65e080a295f8076b1c5722a46aa2";s:2:"id";s:2:"59";s:3:"qty";s:1:"1";s:5:"price";s:6:"500000";s:4:"name";s:6:"Test 1";s:3:"img";s:15:"chua-co-anh.gif";s:4:"type";s:17:"Máy tính bảng";s:3:"ncc";s:7:"SAMSUNG";s:7:"soluong";s:1:"1";s:8:"subtotal";i:500000;}s:32:"c9f0f895fb98ab9159f51fd0297e236d";a:10:{s:5:"rowid";s:32:"c9f0f895fb98ab9159f51fd0297e236d";s:2:"id";s:1:"8";s:3:"qty";s:1:"3";s:5:"price";s:8:"20990000";s:4:"name";s:43:"Samsung Galaxy Note Pro 12.2 3G 32GB (P901)";s:3:"img";s:58:"Samsung-Galaxy-Note-Pro-P901-bo-ban-hang-800x496-chuan.jpg";s:4:"type";s:17:"Máy tính bảng";s:3:"ncc";s:7:"SAMSUNG";s:7:"soluong";s:2:"79";s:8:"subtotal";i:62970000;}s:11:"total_items";i:4;s:10:"cart_total";i:63470000;}s:2:"un";s:6:"anly93";s:2:"bm";s:6:"FlatPC";s:2:"lg";b:1;}'),
('f24c61da5c7f7b967ec63b5766006dab', '127.0.0.1', 'Mozilla/5.0 (Windows NT 6.3; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/35.0.1916.153 Safari/537.36', 1402876700, 'a:6:{s:9:"user_data";s:0:"";s:2:"un";s:9:"kelvinlee";s:2:"bm";s:6:"FlatPC";s:2:"lg";b:1;s:19:"taikhoan_updateinfo";s:1:"1";s:14:"sanpham_action";s:1:"1";}'),
('f2a65e639e3cff2da956be03df9eec97', '127.0.0.1', 'Mozilla/5.0 (Windows NT 6.3; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/35.0.1916.153 Safari/537.36', 1402799032, 'a:7:{s:9:"user_data";s:0:"";s:2:"un";s:9:"kelvinlee";s:2:"bm";s:6:"FlatPC";s:2:"lg";b:1;s:19:"taikhoan_updateinfo";s:1:"1";s:14:"sanpham_action";s:1:"1";s:15:"nhaphang_action";s:1:"1";}');

-- --------------------------------------------------------

--
-- Table structure for table `THONGTINDATHANG`
--

CREATE TABLE IF NOT EXISTS `THONGTINDATHANG` (
`ID` int(11) NOT NULL,
  `NGAYDATHANG` datetime DEFAULT NULL,
  `NGAYTHANHTOAN` datetime DEFAULT NULL,
  `TENKHACHHANG` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `SDTKHACHHANG` char(13) COLLATE utf8_unicode_ci DEFAULT NULL,
  `TENNGUOINHAN` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `SDTNGUOINHAN` char(13) COLLATE utf8_unicode_ci DEFAULT NULL,
  `DIACHI` text COLLATE utf8_unicode_ci,
  `PTTHANHTOAN` int(11) DEFAULT NULL,
  `PTVANCHUYEN` int(11) DEFAULT NULL,
  `THANHTIEN` bigint(20) DEFAULT NULL,
  `TINHTRANG` int(11) DEFAULT NULL,
  `GIAMGIA` int(11) DEFAULT NULL,
  `NGUOILAPDON` int(11) DEFAULT NULL,
  `TONGTIEN` bigint(20) DEFAULT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=22 ;

--
-- Dumping data for table `THONGTINDATHANG`
--

INSERT INTO `THONGTINDATHANG` (`ID`, `NGAYDATHANG`, `NGAYTHANHTOAN`, `TENKHACHHANG`, `SDTKHACHHANG`, `TENNGUOINHAN`, `SDTNGUOINHAN`, `DIACHI`, `PTTHANHTOAN`, `PTVANCHUYEN`, `THANHTIEN`, `TINHTRANG`, `GIAMGIA`, `NGUOILAPDON`, `TONGTIEN`) VALUES
(1, '2014-06-09 13:15:20', NULL, 'Lee Kelvin', '01694662923', 'Kelvin Lee 2', '01694662924', 'Trường Chinh', 1, 1, 42370000, 0, NULL, 1, 46657000),
(2, '2014-06-09 13:18:39', '2014-06-14 17:14:32', 'Lee Kelvin', '01694662923', 'Kelvin Lee 2', '01694662924', 'TC', 0, 0, 42370000, -1, NULL, 1, 46607000),
(3, '2014-06-09 13:20:20', NULL, 'Lee Kelvin', '01694662923', 'Kelvin Lee 2', '01694662924', 'TC', 0, 1, 42370000, 2, NULL, 1, 46657000),
(13, '2014-06-09 13:45:06', NULL, 'Lee Kelvin', '01694662923', 'Kelvin Lee 2', '01694662923', 'tgb', 0, 0, 111710000, 2, NULL, 1, 122881000),
(14, '2014-06-09 14:10:56', NULL, 'Lee Kelvin', '01694662923', 'Kelvin Lee', '01694662923', 'TC', 0, 0, 2990000, 2, NULL, 1, 3289000),
(15, '2014-06-10 22:01:26', NULL, 'Lee Kelvin', '01694662923', 'Kelvin Lee', '01694662923', 'Trường Chinh, Tân Phú', 0, 0, 62270000, 0, NULL, 1, 68497000),
(16, '2014-06-10 22:03:20', '2014-06-14 17:11:21', 'Lee Kelvin', '01694662923', 'Lê Thanh Diệp', '01694662923', 'Sa Đéc, Đồng Tháp', 1, 1, 90730000, -1, NULL, 1, 99853000),
(17, '2014-06-10 22:04:40', '2014-06-10 22:22:30', 'Lee Kelvin', '01694662923', 'Lê Thanh Diệp', '01694662923', 'TP.HCM', 1, 0, 28280000, -1, NULL, 1, 31108000),
(18, '2014-06-11 15:00:14', NULL, 'Lê Thanh Diệp', '01236977759', 'Kelvin Lee', '01694662923', 'Truong Chinh', 0, 0, 22890000, 2, NULL, 5, 25179000),
(19, '2014-06-12 20:40:18', NULL, 'Lee Kelvin', '01694662923', 'Kelvin Lee', '01694662923', 'rrr', 0, 0, 18390000, 2, NULL, 1, 20229000),
(20, '2014-06-12 20:41:29', '2014-06-13 22:56:18', 'Lee Kelvin', '01694662923', 'Kelvin Lee 2', '01694662923', 'fgg', 1, 1, 18490000, -1, NULL, 1, 20389000),
(21, '2014-06-16 06:10:12', NULL, 'Lee Kelvin', '01694662923', 'Lê Thanh Diệp', '01694662923', 'Trường Chinh', 0, 0, 2990000, 2, NULL, 1, 3289000);

-- --------------------------------------------------------

--
-- Table structure for table `TINHTHANH`
--

CREATE TABLE IF NOT EXISTS `TINHTHANH` (
`ID` int(11) NOT NULL,
  `TENTINHTHANH` varchar(255) NOT NULL DEFAULT ''
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=65 ;

--
-- Dumping data for table `TINHTHANH`
--

INSERT INTO `TINHTHANH` (`ID`, `TENTINHTHANH`) VALUES
(1, 'TP. Cần Thơ'),
(2, 'TP. Đà Nẵng'),
(3, 'TP. Hà Nội'),
(4, 'TP. Hải Phòng'),
(5, 'TP. Hồ Chí Minh'),
(6, 'An Giang'),
(7, 'Bà Rịa - Vũng Tàu'),
(8, 'Bắc Giang'),
(9, 'Bắc Kạn'),
(10, 'Bạc Liêu'),
(11, 'Bắc Ninh'),
(12, 'Bến Tre'),
(13, 'Bình Định'),
(14, 'Bình Dương'),
(15, 'Bình Phước'),
(16, 'Bình Thuận'),
(17, 'Cà Mau'),
(18, 'Cao Bằng'),
(19, 'Đắk Lắk'),
(20, 'Đắk Nông'),
(21, 'Điện Biên'),
(22, 'Đồng Nai'),
(23, 'Đồng Tháp'),
(24, 'Gia Lai'),
(25, 'Hà Giang'),
(26, 'Hà Nam'),
(27, 'Hà Tĩnh'),
(28, 'Hải Dương'),
(29, 'Hậu Giang'),
(30, 'Hòa Bình'),
(31, 'Hưng Yên'),
(32, 'Khánh Hòa'),
(33, 'Kiên Giang'),
(34, 'Kon Tum'),
(35, 'Lai Châu'),
(36, 'Lâm Đồng'),
(37, 'Lạng Sơn'),
(38, 'Lào Cai'),
(39, 'Long An'),
(40, 'Nam Định'),
(41, 'Nghệ An'),
(42, 'Ninh Bình'),
(43, 'Ninh Thuận'),
(44, 'Phú Thọ'),
(45, 'Phú Yên'),
(46, 'Quảng Bình'),
(47, 'Quảng Nam'),
(48, 'Quảng Ngãi'),
(49, 'Quảng Ninh'),
(50, 'Quảng Trị'),
(51, 'Sóc Trăng'),
(52, 'Sơn La'),
(53, 'Tây Ninh'),
(54, 'Thái Bình'),
(55, 'Thái Nguyên'),
(56, 'Thanh Hóa'),
(57, 'Thừa Thiên Huế'),
(58, 'Tiền Giang'),
(59, 'Trà Vinh'),
(60, 'Tuyên Quang'),
(61, 'Vĩnh Long'),
(62, 'Vĩnh Phúc'),
(63, 'Yên Bái'),
(64, 'Khác');

-- --------------------------------------------------------

--
-- Table structure for table `TINTUC`
--

CREATE TABLE IF NOT EXISTS `TINTUC` (
`ID` int(11) NOT NULL,
  `TIEUDE` text COLLATE utf8_unicode_ci,
  `LOAITIN` int(11) DEFAULT '1',
  `MOTA` text COLLATE utf8_unicode_ci,
  `NOIDUNG` longtext COLLATE utf8_unicode_ci,
  `NGAYDANG` datetime DEFAULT NULL,
  `HINH` int(11) DEFAULT '0',
  `TACGIA` int(11) DEFAULT NULL,
  `TINHTRANG` int(11) DEFAULT '0'
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=15 ;

--
-- Dumping data for table `TINTUC`
--

INSERT INTO `TINTUC` (`ID`, `TIEUDE`, `LOAITIN`, `MOTA`, `NOIDUNG`, `NGAYDANG`, `HINH`, `TACGIA`, `TINHTRANG`) VALUES
(1, 'Nhanh tay trúng quà tặng khi đặt mua Samsung Galaxy Note 3', 1, 'Samsung Galaxy Note 3 N9000 là một smartphone trong yếu của samsung trong quý cuối năm 2013', 'Samsung Galaxy Note 3 N9000 là một smartphone trong yếu của samsung trong quý cuối năm 2013. Note 3 là một trong những mẫu smartphone được nguời dùng yêu thích màn hình to Full HD 5,7 inches, với CPU 2 lõi 4 nhân, HÐH Android 4.3 (Jelly Bean), camera 13 MP, dung lượng pin 3200 mAh. Hãy nhanh tay đặt mua Galaxy Note 3 để được 1 phiếu ưu đãi trị giá 500.000 đ, gói ứng dụng bản quyền, 1 bao gia thời trang.', '2013-09-27 00:00:00', 0, 1, 1),
(2, 'HÃY LÀ NGUỜI ÐẦU TIÊN SỎ HỮU SONY XPERIA Z1 C6902', 1, 'Sony Xperia Z1 là siêu điện thoại chuyên về chụp hình của Sony trong nam 2013', 'Sony Xperia Z1 là siêu điện thoại chuyên về chụp hình của Sony trong nam 2013. Xperia Z1 còn có tên gọi là Honami. Z1 không chỉ gây ấn tượng với camera độ phân giải 20 megapixel mà còn nhờ vào cấu hình cực mạnh, với đặc điểm nổi bậc: Màn hình HD 5.0 inches, CPU Quad-core 2.2 GHz, HÐH Android 4.2 (Jelly Bean), camera: 20.7 MP, cùng dung lượng pin 3000 mAh. Hãy nhanh tay đặt mua Sony Xperia Z1 để nhận được 1 Tai nghe Bluetooth NFC SBH50 (giá trị đến 1.690.000?), Gói ứng dụng trên Xperia Privilege (giá trị đến 1.510.000?), Tặng Phiếu mua hàng (giá trị đến 1.000.000?). Mọi chi tiết xin liên hệ: ', '2013-09-27 00:00:00', 0, 2, 1),
(3, 'HTC One X chính hãng còn 6,79 triệu đồng', 2, 'One X được trang bị vi xủ lý Tegra', 'Ngoài ra, khách hàng mua phụ kiện cùng với máy sẽ được giảm 30% giá trị phụ kiện. Máy được cài đặt sẵn hệ điều hành Android 4.0 Ice Cream Sandwich với giao diện sử dụng HTC Sense phiên bản 4 mới nhất. Sở hữu màn hình cảm ứng 4,7 inch tương tự như Sensation XL nhưng One X được trang bị độ phân giải HD 1.280 x 720 pixel và công nghệ Super IPS LCD2, cho chất lượng hình ảnh sắc nét, mịn và đẹp hơn người tiền nhiệm. Vỏ máy có thiết kế liền khối với chất liệu Polycarbonate với độ bền cao, chống bám bẩn. Bên cạnh công nghệ âm thanh Beats Audio, tính năng được nhấn mạnh trên One X là camera 8 Megapixel cảm biến BSI với ống kính gốc độ 28mm, f/2.0. One X được sử dụng pin dung lượng lên tới 1800 mAh, chính vì vậy với cấu hình khủng cùng nhiều phần mềm quý khách cũng không cần phải lo lắm về thời gian sử dụng.', '2013-09-27 00:00:00', 0, 2, 2),
(4, 'Samsung khai sinh dòng điện thoại siêu cao cấp Galaxy F', 2, 'Sản phẩm mới của SamSung', '\r\nSong song với dòng Galaxy S vốn đã thành công trên thị trường, dòng điện thoại Galaxy F của Samsung cũng sẽ là một dòng điện thoại cao cấp nhưng được trang bị vỏ kim loại và thiết kế cách tân.\r\nTrang tin ETNews của Hàn Quốc cho biết, Samsung đã lên kế hoạch phát triển dòng điện thoại siêu cao cấp mang tên Galaxy F. Thiết bị đầu tiên của dòng sản phẩm này sẽ xuất hiện vào năm sau.\r\nDòng Galaxy F sẽ có vỏ kim loại, camera "khủng" và cao cấp hơn dòng Note hiện nay.\r\nNguồn tin trên cũng khẳng định, các thiết bị dòng Galaxy F sẽ có thiết kế hoàn toàn bằng kim loại và sử dụng vi xử lý Octa-core Exynos, máy ảnh lên đến 16 MP tích hợp bộ ổn định hình ảnh quang học. Kích thước và độ phân giải màn hình của dòng Galaxy F có thể lớn hơn cả dòng Note. \r\nGiới công nghệ nhận định rằng việc ra mắt thêm một dòng điện thoại nữa sẽ giúp Samsung duy trì được sự mới mẻ trong suốt một năm. Hiện tại, hãng thường ra mắt hai siêu phẩm vào đầu năm (dòng Galaxy S) và cuối năm (dòng Galaxy Note). Nếu dòng Galaxy F được ra mắt vào giữa năm, thiết bị này sẽ cạnh tranh mạnh mẽ với các đối thủ thường ra mắt sản phẩm vào thời điểm này như LG và Sony.', '2013-09-27 00:00:00', 0, 5, 1),
(5, '"Biến" iPhone 5 thành 5S chỉ với 2 triệu đồng', 2, 'Cơn sốt giá iPhone 5S đang dần hạ nhiệt, tuy nhiên giá của phiên bản iPhone mới của Apple vẫn còn khá cao nhất là phiên bản iphone vàng và không phải ai cũng có thể sở hữu nó vào lúc này.', '<p style="text-align: justify;">\r\n	Đối với những người đang sử dụng iPhone 5 th&igrave; việc mua <a href="http://www.thegioididong.com/dtdd/iphone-5s-32gb" target="_blank" title="Chi tiết iPhone 5s">iPhone 5S</a> kh&ocirc;ng qu&aacute; cần thiết v&igrave; họ c&oacute; thể biến ho&aacute; chiếc điện thoại của m&igrave;nh th&agrave;nh iPhone 5S dễ d&agrave;ng.</p>\r\n<p style="text-align: justify;">\r\n	Những ai sở hữu phi&ecirc;n bản iPhone 5 m&agrave;u trắng th&igrave; họ chỉ cần mua một miếng d&aacute;n nh&aacute;i theo kiểu <a href="http://www.thegioididong.com/tin-tuc/soi-nut-home-nhan-dang-van-tay-tren-iphone-5s-521378" target="_blank" title="Soi nút Home nhận dạng vân tay trên iPhone 5s">ph&iacute;m Home cảm ứng v&acirc;n tay tr&ecirc;n iPhone 5S</a> v&agrave; d&aacute;n trực tiếp v&agrave;o n&uacute;t Home của m&aacute;y v&igrave; <strong>iPhone 5</strong> trắng cũng kh&ocirc;ng c&oacute; đổi mới về mặt m&agrave;u sắc so với iPhone 5S.</p>\r\n<p>\r\n	Gi&aacute; của những miếng d&aacute;n n&agrave;y chỉ khoảng v&agrave;i chục ngh&igrave;n đồng tuy nhi&ecirc;n, n&oacute; lại c&oacute; nhược điểm l&agrave; kh&ocirc;ng được thẩm mỹ</p>\r\n', '2013-10-09 00:00:00', 0, 8, 1),
(7, 'iPad Air hay Galaxy Note 10.1 2014 hoàn hảo hơn?', 2, 'Nếu nói đến phân khúc máy tính bảng màn hình lớn và cao cấp thì iPad Air và Samsung Galaxy Note 10.1 2014 là hai cái tên đáng để quan tâm nhất hiện nay. Vậy giữa hai chiếc máy tính bảng này, thiết bị nào đáng để sở hữu hơn?', '<h2 style="margin-bottom: 0in; font-size: 12px; line-height: 100%; text-align: justify;">\r\n	<strong>Nếu n&oacute;i đến ph&acirc;n kh&uacute;c m&aacute;y t&iacute;nh bảng m&agrave;n h&igrave;nh lớn v&agrave; cao cấp th&igrave; <a href="http://www.thegioididong.com/may-tinh-bang/apple-ipad-air-16gb-wifi" target="_blank" title="Apple iPad Air 16GB/Wifi">iPad Air</a> v&agrave; <a href="http://www.thegioididong.com/may-tinh-bang/samsung-galaxy-note-101-2014" target="_blank" title="Samsung Galaxy Note 10.1 - 2014 Edition">Samsung Galaxy Note 10.1 2014</a> l&agrave; hai c&aacute;i t&ecirc;n đ&aacute;ng để quan t&acirc;m nhất hiện nay. Vậy giữa hai chiếc m&aacute;y t&iacute;nh bảng n&agrave;y, thiết bị n&agrave;o đ&aacute;ng để sở hữu hơn?</strong></h2>\r\n<p style="margin-bottom: 0in; text-align: justify;">\r\n	<strong>Thiết kế</strong></p>\r\n<p style="margin-bottom: 0in; text-align: justify;">\r\n	<strong>Galaxy Note 10.1 2014 Edition</strong> kh&ocirc;ng phải l&agrave; kh&ocirc;ng c&oacute; những thay đổi trong thiết kế so với phi&ecirc;n bản trước, thực sự l&agrave; n&oacute; mỏng hơn v&agrave; trong cứng c&aacute;p hơn tuy nhi&ecirc;n n&oacute; vẫn được l&agrave;m bằng nhựa v&agrave; c&oacute; th&ecirc;m một lớp vỏ giả da ở mặt sau. Điều n&agrave;y kh&ocirc;ng c&oacute; nghĩa l&agrave; Note 10.1 2014 xấu nhưng n&oacute; chỉ cho thấy Note 10.1 2014 chưa thực sự cao cấp như lớp vỏ bằng kim loại của iPad Air.</p>\r\n<p style="margin-bottom: 0in; text-align: justify;">\r\n	<img alt="iPad Air có thiết kế nổi bật hơn" src="http://cdn.tgdd.vn/Files/2013/11/19/523325/ImageAttach/Apple-iPad-Air-vs-Samsung-Galaxy-Note-10.1-2014-Edition-002-20131119113313.jpg" style="width: 600px; height: 450px;" /></p>\r\n<p style="margin-bottom: 0in; text-align: justify;">\r\n	<em>iPad Air c&oacute; thiết kế nổi bật hơn</em></p>\r\n<p style="margin-bottom: 0in; text-align: justify;">\r\n	Trong thực tế th&igrave; lớp vỏ hộp kim của <strong>iPad Air</strong> kh&ocirc;ng chỉ gi&uacute;p cho chiếc m&aacute;y t&iacute;nh bảng của Apple trong sang trọng m&agrave; n&oacute; c&ograve;n gi&uacute;p cho Air mỏng v&agrave; nhẹ hơn so với Note 10.1 2014. Chiếc iPad mới n&agrave;y chỉ nặng khoảng 478g so với 547g của Note 10.1 2014 v&agrave; chỉ d&agrave;y khoảng 7.5 mm so với 7.9 mm của Note. Điều n&agrave;y cho ph&eacute;p người d&ugrave;ng c&oacute; thể sử dụng iPad Air l&acirc;u m&agrave; &iacute;t c&oacute; cảm gi&aacute;c bị mỏi.</p>\r\n<p style="margin-bottom: 0in; text-align: justify;">\r\n	<img alt="iPad Air mỏng hơn Note 10.1 2014" src="http://cdn.tgdd.vn/Files/2013/11/19/523325/ImageAttach/Apple-iPad-Air-vs-Samsung-Galaxy-Note-10.1-2014-Edition-009-20131119113330.jpg" style="width: 600px; height: 450px;" /></p>\r\n<p style="margin-bottom: 0in; text-align: justify;">\r\n	<em>iPad Air mỏng hơn Note 10.1 2014</em></p>\r\n<p style="margin-bottom: 0in; text-align: justify;">\r\n	D&ugrave; sao, cũng c&oacute; một điều nổi bật trong thiết kế Galaxy Note 10.1 2014 l&agrave; n&oacute; c&oacute; khe cắm thẻ nhớ microSD v&agrave; tạo điều kiện cho những ai muốn mở rộng bộ nhớ trong của thiết bị n&agrave;y.</p>\r\n<p style="margin-bottom: 0in; text-align: justify;">\r\n	<strong>M&agrave;n h&igrave;nh hiển thị</strong></p>\r\n<p style="margin-bottom: 0in; text-align: justify;">\r\n	C&oacute; một sự kh&aacute;c biệt nhỏ giữa k&iacute;ch thước của m&agrave;n h&igrave;nh của hai chiếc m&aacute;y t&iacute;nh bảng đ&aacute;ng y&ecirc;u n&agrave;y. Trong khi iPad Air chỉ c&oacute; m&agrave;n h&igrave;nh 9,7 inch th&igrave; Galaxy Note 10.1 2014 lại hơi lớn hơn một ch&uacute;t với m&agrave;n h&igrave;nh 10,1 inch. Độ ph&acirc;n giải m&agrave;n h&igrave;nh của <strong>iPad Air</strong> cũng thấp hơn Note 10.1 khi chỉ c&oacute; 2048 x 1536 pixel (Note 10.1 l&agrave; 2560 x 1600 pixel) v&agrave; mật độ điểm ảnh cũng thấp hơn chỉ 264 ppi (Note 10.1 l&agrave; 299 ppi).</p>\r\n<p style="margin-bottom: 0in; text-align: justify;">\r\n	<img alt="Màn hình cả hai điều khá tốt" src="http://cdn.tgdd.vn/Files/2013/11/19/523325/ImageAttach/Apple-iPad-Air-vs-Samsung-Galaxy-Note-10-1.1-2014-Edition-001-20131119113346.jpg" style="width: 600px; height: 450px;" /></p>\r\n<p style="margin-bottom: 0in; text-align: justify;">\r\n	<em>M&agrave;n h&igrave;nh cả hai điều kh&aacute; tốt</em></p>\r\n<p style="margin-bottom: 0in; text-align: justify;">\r\n	Cũng cần phải nhớ rằng m&agrave;n h&igrave;nh của iPad Air vẫn đ&uacute;ng với tỉ lệ 4:3 rất thuận tiện để duyệt v&agrave; đọc web, trong khi <strong>Note 10.1</strong> c&oacute; m&agrave;n h&igrave;nh theo tỉ lệ 16:9 c&oacute; thể ph&ugrave; hợp với việc tr&igrave;nh chiếu video. Trong khi cả hai m&agrave;n h&igrave;nh đều sử dụng c&ocirc;ng nghệ LCD th&igrave; m&agrave;u sắc của iPad Air thực tế hơn v&agrave; c&acirc;n bằng hơn so với Note 10.1 2014, chiếc m&aacute;y t&iacute;nh bảng của Samsung c&oacute; xuất hiện hiện tượng &aacute;m xanh.</p>\r\n<p style="margin-bottom: 0in; text-align: justify;">\r\n	<strong>Giao diện</strong></p>\r\n<p style="margin-bottom: 0in; text-align: justify;">\r\n	Được trang bị hệ điều h&agrave;nh iOS 7.0.3, iPad Air đi k&egrave;m với một giao diện người d&ugrave;ng tươi v&agrave; vui vẻ, giao diện n&agrave;y cũng đơn giản hơn so với giao diện TouchWiz của Note 10.1, v&igrave; n&oacute; chỉ giới thiệu một mạng lưới c&aacute;c biểu tượng ứng dụng v&agrave; kh&ocirc;ng ph&acirc;n biệt m&agrave;n h&igrave;nh ch&iacute;nh với menu ứng dụng.</p>\r\n<p style="margin-bottom: 0in; text-align: justify;">\r\n	<img alt="Giao diện iOS 7 trên iPad Air" src="http://cdn.tgdd.vn/Files/2013/11/19/523325/ImageAttach/Apple-iPad-Air-Review-031-UI-20131119113411.jpg" style="width: 600px; height: 800px;" /></p>\r\n<p style="margin-bottom: 0in; text-align: justify;">\r\n	<em>Giao diện iOS 7 tr&ecirc;n iPad Air</em></p>\r\n<p style="margin-bottom: 0in; text-align: justify;">\r\n	Trong khi đ&oacute; Galaxy Note 10.1 2014 Edition, hiện đang chạy hệ điều h&agrave;nh Android 4.3 với giao diện Touch Wiz Nature UX, c&oacute; thể n&oacute;i Samsung đ&atilde; đem gần như mọi thứ l&ecirc;n giao diện của m&igrave;nh v&agrave; tận dụng tối đa ưu thế của m&agrave;n h&igrave;nh lớn để trung b&agrave;y c&aacute;c ứng dụng v&agrave; widget.</p>\r\n<p style="margin-bottom: 0in; text-align: justify;">\r\n	Trong thực tế th&igrave; Note 10.1 c&oacute; h&agrave;ng t&aacute; c&aacute;c thiết lập b&ecirc;n trong m&agrave; hầu hết người d&ugrave;ng sẽ kh&ocirc;ng d&ugrave;ng đến. TouchWiz l&agrave; một giao diện linh hoạt nhưng trong thực tế th&igrave; n&oacute; kh&aacute; lộn xộn v&agrave; hơi bị tốn thời gian để t&igrave;m hiểu.</p>\r\n<p style="margin-bottom: 0in; text-align: justify;">\r\n	<img alt="Giao diện TouchWiz trên Note 10.1 2014" src="http://cdn.tgdd.vn/Files/2013/11/19/523325/ImageAttach/Samsung-Galaxy-Note-10.1-2014-Review-029-UI-20131119113442.jpg" style="width: 600px; height: 375px;" /></p>\r\n<p style="margin-bottom: 0in; text-align: justify;">\r\n	<em>Giao diện TouchWiz tr&ecirc;n Note 10.1 2014</em></p>\r\n<p style="margin-bottom: 0in; text-align: justify;">\r\n	B&ugrave; lại, b&uacute;t S-Pen th&ocirc;ng minh c&ugrave;ng với <strong>t&iacute;nh năng Air Command</strong> sẽ gi&uacute;p &iacute;ch kh&aacute; nhiều cho bạn nếu như bạn th&iacute;ch ghi ch&eacute;p v&agrave; l&agrave;m việc với m&aacute;y t&iacute;nh bảng tương tự như với giấy v&agrave; b&uacute;t th&ocirc;ng thường.</p>\r\n<p style="margin-bottom: 0in; text-align: justify;">\r\n	<img alt="Bút S-Pen giúp làm việc nhanh hơn" src="http://cdn.tgdd.vn/Files/2013/11/19/523325/ImageAttach/Samsung-Galaxy-Note-10_1-2014-edition-Air-command1-20131119113524.jpg" style="width: 600px; height: 347px;" /></p>\r\n<p style="margin-bottom: 0in; text-align: justify;">\r\n	<em>B&uacute;t S-Pen gi&uacute;p l&agrave;m việc nhanh hơn</em></p>\r\n<p style="margin-bottom: 0in; text-align: justify;">\r\n	<strong>Cấu h&igrave;nh phần cứng</strong></p>\r\n<p style="margin-bottom: 0in; text-align: justify;">\r\n	Với chip A7 64-bit, Apple iPad Air c&oacute; thể chạy một c&aacute;ch mượt m&agrave; v&agrave; l&agrave;m cho hiệu suất sử dụng tổng thể kh&aacute; tuyệt vời. Mặc d&ugrave; chip A7 chỉ l&agrave; l&otilde;i k&eacute;p v&agrave; c&oacute; tốc độ xung nhịp chỉ 1,4 Ghz nhưng bộ xử l&yacute; đồ hoạ G6430 PowerVR được đ&aacute;nh gi&aacute; kh&aacute; cao do c&oacute; thể &ldquo;g&aacute;nh&rdquo; nổi m&agrave;n h&igrave;nh khủng.</p>\r\n<p style="margin-bottom: 0in; text-align: justify;">\r\n	Trong khi đ&oacute;, Note 10.1 2014 c&oacute; hai phi&ecirc;n bản, phi&ecirc;n bản chạy chip 8 nh&acirc;n của Samsung v&agrave; bản chạy chip Snapdragon 800. Mặc d&ugrave; phi&ecirc;n bản chạy chip 8 nh&acirc;n của Samsung l&agrave; bản quốc tế v&agrave; th&ocirc;ng dụng hơn nhưng trong b&agrave;i viết n&agrave;y, phi&ecirc;n bản Snapdragon 800 mới l&agrave; đối tượng ch&iacute;nh.</p>\r\n<p style="margin-bottom: 0in; text-align: justify;">\r\n	<img alt="iPad Air nhanh hơn Galaxy Note 10.1 2014" src="http://cdn.tgdd.vn/Files/2013/11/19/523325/ImageAttach/ScreenShot2013-11-19at11.24.27AM-20131119113632.jpg" style="width: 600px; height: 300px;" /></p>\r\n<p style="margin-bottom: 0in; text-align: justify;">\r\n	<em>iPad Air nhanh hơn Galaxy Note 10.1 2014</em></p>\r\n<p style="margin-bottom: 0in; text-align: justify;">\r\n	Tr&ecirc;n l&yacute; thuyết, phi&ecirc;n bản chạy chip Snapdragon 800 bốn nh&acirc;n xung nhịp 2,3 GHz v&agrave; GPU Adreno 330 nhanh hơn so với chip của Apple nhưng do giao diện TouchWiz, phi&ecirc;n bản n&agrave;y cũng &iacute;t nhiều bị chậm lại nhưng vẫn đỡ hơn so với bản chạy chip 8 nh&acirc;n của Samsung.</p>\r\n<p style="margin-bottom: 0in; text-align: justify;">\r\n	Một ưu điểm kh&aacute;c về cấu h&igrave;nh của Note 10.1 2014 l&agrave; n&oacute; c&oacute; RAM l&ecirc;n tới 3GB thay v&igrave; chỉ 1 GB như Apple iPad Air. Tuy nhi&ecirc;n c&aacute;c kết quả đo cấu h&igrave;nh cho thấy Note 10.1 2014 bị &ldquo;hụt hơi&rdquo; so với iPad Air.</p>\r\n<p style="margin-bottom: 0in; text-align: justify;">\r\n	<strong>Camera</strong></p>\r\n<p style="margin-bottom: 0in; text-align: justify;">\r\n	Apple thường kh&ocirc;ng mấy quan t&acirc;m đến camera tr&ecirc;n iPad do đ&oacute; so với camera đi k&egrave;m với độ ph&acirc;n giải 8MP v&agrave; đ&egrave;n Flash LED của Note 10.1 2014, camera của iPad tỏ ra kh&aacute; yếu thế. B&ecirc;n cạnh đ&oacute; ứng dụng chụp ảnh mặc định của iPad Air kh&aacute; nh&agrave;m ch&aacute;n do kh&ocirc;ng c&oacute; nhiều tuy chỉnh trong khi về ph&iacute;a Note 10.1 2014, c&oacute; h&agrave;ng t&aacute; th&ocirc;ng số để người d&ugrave;ng chọn lựa v&agrave; n&oacute; cũng c&oacute; nhiều chế độ chụp như chụp đ&ecirc;m, chụp Panorama v&agrave; cả chụp HDR.</p>\r\n<p style="margin-bottom: 0in; text-align: justify;">\r\n	<img alt="Ảnh chụp từ camera của iPad Air" src="http://cdn.tgdd.vn/Files/2013/11/19/523325/ImageAttach/Apple-iPad-Air-20131119113659.jpg" style="width: 600px; height: 448px;" /></p>\r\n<p style="margin-bottom: 0in; text-align: justify;">\r\n	<em>Ảnh chụp từ camera của iPad Air</em></p>\r\n<p style="margin-bottom: 0in; text-align: justify;">\r\n	<img alt="Ảnh chụp từ camera của Note 10.1 2014" src="http://cdn.tgdd.vn/Files/2013/11/19/523325/ImageAttach/Samsung-GALAXY-Note-10.1-2014-Edition-20131119113714.jpg" style="width: 600px; height: 450px;" /></p>\r\n<p style="margin-bottom: 0in; text-align: justify;">\r\n	<em>Ảnh chụp từ camera của Note 10.1 2014</em></p>\r\n<p style="margin-bottom: 0in; text-align: justify;">\r\n	<img alt="iPad Air không có đèn Flash" src="http://cdn.tgdd.vn/Files/2013/11/19/523325/ImageAttach/Apple-iPad-Air-vs-Samsung-Galaxy-Note-10.1-2014-Edition-003-20131119113734.jpg" style="width: 600px; height: 450px;" /></p>\r\n<p style="margin-bottom: 0in; text-align: justify;">\r\n	<em>iPad Air kh&ocirc;ng c&oacute; đ&egrave;n Flash</em></p>\r\n<p style="margin-bottom: 0in; text-align: justify;">\r\n	<strong>Pin</strong></p>\r\n<p style="margin-bottom: 0in; text-align: justify;">\r\n	Mặc d&ugrave; l&agrave; mỏng hơn rất nhiều so với người tiền nhiệm của n&oacute;, iPad Air vẫn giữ được thời lượng pin tuyệt vời với một vi&ecirc;n pin 8820 mAh b&ecirc;n trong kh&ocirc;ng thể th&aacute;o rời. Người d&ugrave;ng c&oacute; thể d&ugrave;ng chiếc m&aacute;y t&iacute;nh bảng của Apple cả một ng&agrave;y.</p>\r\n<p style="margin-bottom: 0in; text-align: justify;">\r\n	<img alt="Thời lượng pin có thể ngang nhau" src="http://cdn.tgdd.vn/Files/2013/11/19/523325/ImageAttach/7AD0B561E8BE122DECAE402E09B7B985-20131119114016.jpg" style="width: 600px; height: 451px;" /></p>\r\n<p style="margin-bottom: 0in; text-align: justify;">\r\n	<em>Thời lượng pin c&oacute; thể ngang nhau</em></p>\r\n<p style="margin-bottom: 0in; text-align: justify;">\r\n	Về ph&iacute;a Note 10.1 2014, pin của chiếc m&aacute;y t&iacute;nh bảng n&agrave;y chỉ c&oacute; dung lượng l&agrave; 8220 mAh b&ecirc;n cạnh đ&oacute; n&oacute; cũng c&oacute; m&agrave;n h&igrave;nh to hơn v&agrave; độ ph&acirc;n giải cao hơn iPad Air n&ecirc;n c&oacute; vẻ như sẽ c&oacute; thời gian d&ugrave;ng thấp hơn m&aacute;y t&iacute;nh bảng của Apple.</p>\r\n<p style="margin-bottom: 0in; text-align: justify;">\r\n	<strong>Kết luận</strong></p>\r\n<p style="margin-bottom: 0in; text-align: justify;">\r\n	Cả hai mẫu m&aacute;y t&iacute;nh bảng dường như kh&aacute; ngang t&agrave;i ngang sức v&agrave; đều c&oacute; một thế mạnh ri&ecirc;ng. Nếu bạn th&iacute;ch sự lịch l&atilde;m, sang trọng v&agrave; ổn định, iPad Air l&agrave; sự lựa chọn hợp l&yacute; d&agrave;nh cho bạn. C&ograve;n nếu như bạn th&iacute;ch sự mạnh mẽ, khả năng linh hoạt cũng như c&oacute; thể tuỳ biến giao diện dễ d&agrave;ng, Galaxy Note 10.1 2014 l&agrave; một lựa chọn kh&ocirc;ng tồi.</p>\r\n<p style="margin-bottom: 0in; text-align: justify;">\r\n	Nhưng d&ugrave; l&agrave; iPad Air hay Note 10.1 2014 th&igrave; nếu sở hữu một trong hai chiếc m&aacute;y t&iacute;nh bảng n&agrave;y th&igrave; bạn cũng đ&atilde; chạm tay đến được những c&ocirc;ng nghệ tin tiến nhất tr&ecirc;n m&aacute;y t&iacute;nh bảng.</p>\r\n', '2013-11-19 00:00:00', 0, 2, 2),
(8, 'BlackBerry Z50 lõi tứ màn hình full HD sẽ ra mắt Quý 3/2014', 2, 'BlackBerry dự kiến trình làng chiếc điện thoại Z50 vào Quý 3 2014. Đây sẽ là chiếc smartphone đầu tiên mà hãng tích hợp vi xử lý lõi tứ SoC cùng với panel màn hình độ phân giải 1080pixel. ', '<h2 style="text-align: justify; font-size: 12px; line-height: 100%;">\r\n	<strong>BlackBerry dự kiến tr&igrave;nh l&agrave;ng chiếc điện thoại Z50 v&agrave;o Qu&yacute; 3 2014. Đ&acirc;y sẽ l&agrave; chiếc smartphone đầu ti&ecirc;n m&agrave; h&atilde;ng t&iacute;ch hợp vi xử l&yacute; l&otilde;i tứ SoC c&ugrave;ng với panel m&agrave;n h&igrave;nh độ ph&acirc;n giải 1080pixel. </strong></h2>\r\n<p style="text-align: justify;">\r\n	Ngo&agrave;i ra, <strong>BlackBerry Z50</strong> c&ograve;n được trang bị m&agrave;n h&igrave;nh cảm ứng full HD k&iacute;ch thước 5,2 inch v&agrave;&nbsp;tương lai n&oacute;&nbsp;sẽ thay thế cho những chiếc <a href="http://www.thegioididong.com/dtdd/blackberry-z30" target="_blank" title="Chi tiết BlackBerry Z30">Z30</a> hiện đang b&aacute;n tr&ecirc;n thị trường.</p>\r\n<p style="text-align: center;">\r\n	<img alt="BlackBerry Z10 BlackBerry Z30" src="http://cdn.tgdd.vn/Files/2013/11/19/523321/ImageAttach/BlackBerryZ10_BlackBerryZ30-2013111992526.jpg" style="width: 640px; height: 380px;" /></p>\r\n<p align="center">\r\n	<em>BlackBerry Z50 sẽ thay thế những chiếc Z30, Z10 tr&ecirc;n thị trường</em></p>\r\n<p style="text-align: justify;">\r\n	Ri&ecirc;ng thiết bị <strong>BlackBerry Q30</strong> (b&agrave;n ph&iacute;m QWERTY) sẽ ra mắt v&agrave;o Qu&yacute; 2 2014, tuy nhi&ecirc;n đến thời điểm hiện tại vẫn chưa c&oacute; bất cứ&nbsp;th&ocirc;ng tin n&agrave;o li&ecirc;n quan đến th&ocirc;ng số kỹ thuật của Q30.</p>\r\n<p style="text-align: justify;">\r\n	Mặc d&ugrave; t&igrave;nh h&igrave;nh t&agrave;i ch&iacute;nh của<strong> BlackBerry</strong> vẫn chưa c&oacute; dấu hiệu phục hồi, c&ocirc;ng ty đang trong giai đoạn t&aacute;i cấu tr&uacute;c nhưng t&acirc;n CEO John Chen vẫn tỏ ra rất lạc quan. &Ocirc;ng cho biết sẽ tiếp tục đầu tư v&agrave;o bộ phận thiết bị di động của h&atilde;ng (mặc cho n&oacute; li&ecirc;n tục gặp kh&oacute; khăn trong v&agrave;i năm qua) v&agrave; sắp tới sẽ c&oacute; th&ecirc;m nhiều sản phẩm mới được ra mắt.</p>\r\n', '2013-11-19 00:00:00', 0, 5, 0),
(9, '[Người đẹp & Công nghệ] Những đường cong gợi cảm cùng tablet', 1, 'Cùng ngắm người đẹp với những đường cong quyến rũ bên chiếc&nbsp;máy tính bảng.', '<div class="content-main clearfix">\r\n<h2><strong>C&ugrave;ng ngắm&nbsp;người đẹp với những đường cong quyến rũ b&ecirc;n chiếc <a href="http://www.thegioididong.com/may-tinh-bang" target="_blank" title="Máy tính bảng">m&aacute;y t&iacute;nh bảng</a>.</strong></h2>\r\n\r\n<p><strong><img alt="Những đường cong gợi cảm cùng tablet" src="http://cdn.tgdd.vn/Files/2013/11/19/523320/ImageAttach/Hotgirl-tablet1-2013111991752.jpg" /></strong></p>\r\n\r\n<p><strong><img alt="Những đường cong gợi cảm cùng tablet" src="http://cdn.tgdd.vn/Files/2013/11/19/523320/ImageAttach/Hotgirl-tablet2-201311199186.jpg" /></strong></p>\r\n\r\n<p><strong><img alt="Những đường cong gợi cảm cùng tablet" src="http://cdn.tgdd.vn/Files/2013/11/19/523320/ImageAttach/Hotgirl-tablet3-2013111991822.jpg" /></strong></p>\r\n\r\n<p><strong><img alt="Những đường cong gợi cảm cùng tablet" src="http://cdn.tgdd.vn/Files/2013/11/19/523320/ImageAttach/Hotgirl-tablet4-2013111991831.jpg" /></strong></p>\r\n\r\n<p><strong><img alt="Những đường cong gợi cảm cùng tablet" src="http://cdn.tgdd.vn/Files/2013/11/19/523320/ImageAttach/Hotgirl-tablet5-2013111991841.jpg" /></strong></p>\r\n\r\n<p><strong><img alt="Những đường cong gợi cảm cùng tablet" src="http://cdn.tgdd.vn/Files/2013/11/19/523320/ImageAttach/Hotgirl-tablet6-2013111991852.jpg" /></strong></p>\r\n\r\n<p><strong><img alt="Những đường cong gợi cảm cùng tablet" src="http://cdn.tgdd.vn/Files/2013/11/19/523320/ImageAttach/Hotgirl-tablet7-201311199191.jpg" /></strong></p>\r\n</div>\r\n\r\n<p>&nbsp;</p>\r\n', '2013-11-19 00:00:00', 0, 5, 1),
(10, 'Khách hàng chờ smartphone 1,45 triệu đồng', 2, 'Sau những đồn đoán sôi sục của cộng đồng mạng về chiếc “điện thoại bí ẩn”, HKPhone đã hé lộ thêm về cấu hình “có một không hai” của sản phẩm mới có giá chỉ 1,45 triệu đồng.', '<div class="summary">\r\n	<p itemprop="description">\r\n		Sau những đồn đo&aacute;n s&ocirc;i sục của cộng đồng mạng về chiếc &ldquo;điện thoại b&iacute; ẩn&rdquo;, HKPhone đ&atilde; h&eacute; lộ th&ecirc;m về cấu h&igrave;nh &ldquo;c&oacute; một kh&ocirc;ng hai&rdquo; của sản phẩm mới c&oacute; gi&aacute; chỉ 1,45 triệu đồng.</p>\r\n</div>\r\n<p>\r\n	Chỉ c&ograve;n một ng&agrave;y nữa HKPhone sẽ ch&iacute;nh thức c&ocirc;ng bố th&ocirc;ng tin về chiếc smartphone b&iacute; ẩn.</p>\r\n<p>\r\n	Sau khi bật m&iacute; về mức gi&aacute; rẻ bất ngờ chỉ 1,45 triệu đồng, h&atilde;ng tiếp tục khiến người d&ugrave;ng t&ograve; m&ograve; khi &uacute;p mở về cấu h&igrave;nh của sản phẩm mới. &Ocirc;ng Ph&iacute; Hữu Thanh Long - gi&aacute;m đốc sản phẩm của HKPhone, cho biết: &ldquo;Thời gian vừa qua, h&atilde;ng đ&atilde; nhận được rất nhiều &yacute; kiến của người d&ugrave;ng về mong muốn sở hữu sản phẩm c&oacute; mức gi&aacute; chỉ 1-2 triệu đồng nhưng vẫn đ&aacute;p ứng tốt những nhu cầu thiết yếu như một chiếc smartphone cao cấp. Ch&iacute;nh v&igrave; thế ch&uacute;ng t&ocirc;i đ&atilde; nỗ lực để ra mắt sản phẩm mới c&oacute; gi&aacute; chỉ 1,45 triệu đồng với cấu h&igrave;nh vượt trội v&agrave; duy nhất trong tầm gi&aacute;&rdquo;.</p>\r\n<p>\r\n	Rất nhiều người đang c&oacute; &yacute; định mua điện thoại phổ th&ocirc;ng đ&atilde; đổi &yacute; khi biết th&ocirc;ng tin về sản phẩm n&agrave;y. Tuấn Anh (sinh vi&ecirc;n đại học Thủy Lợi) chia sẻ: &ldquo;M&igrave;nh chỉ c&oacute; hơn một triệu để mua điện thoại n&ecirc;n t&iacute;nh mua loại n&agrave;o nghe, gọi được th&ocirc;i, c&ugrave;ng lắm th&igrave; th&ecirc;m chức năng nghe nhạc. Nhưng ngay sau khi biết HKPhone sắp ra smartphone mới chỉ 1,45 triệu th&igrave; m&igrave;nh đ&atilde; quyết định chờ sản phẩm n&agrave;y&rdquo;.</p>\r\n<table cellpadding="0" cellspacing="0" class="picture">\r\n	<tbody>\r\n		<tr>\r\n			<td class="pic">\r\n				<img alt="" src="http://img.v3.news.zdn.vn/w660/Uploaded/JAC2_N3/2013_11_18/Them_thong_tin_hot_ve_smartphone_145_trieu_cua_HKPhone_1.jpg" /></td>\r\n		</tr>\r\n		<tr>\r\n			<td class="pCaption caption">\r\n				C&aacute;c sản phẩm của HKPhone lu&ocirc;n nhận được sự ủng hộ của người d&ugrave;ng.</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n<p>\r\n	Trước đ&oacute;, những h&igrave;nh ảnh r&ograve; rỉ về chiếc smartphone gi&aacute; rẻ kỷ lục n&agrave;y đ&atilde; khiến cộng đồng mạng th&iacute;ch th&uacute;. Kh&ocirc;ng chỉ c&oacute; thiết kế trẻ trung, nhỏ gọn m&agrave; chiếc điện thoại mới của h&atilde;ng c&ograve;n c&oacute; 4 phi&ecirc;n bản m&agrave;u sắc thời thượng nhất hiện nay, gồm &nbsp;anh dương, hồng, đen v&agrave; trắng.</p>\r\n<table cellpadding="0" cellspacing="0" class="picture">\r\n	<tbody>\r\n		<tr>\r\n			<td class="pic">\r\n				<img alt="" src="http://img.v3.news.zdn.vn/w660/Uploaded/JAC2_N3/2013_11_18/Them_thong_tin_hot_ve_smartphone_145_trieu_cua_HKPhone_2.jpg" /></td>\r\n		</tr>\r\n		<tr>\r\n			<td class="pCaption caption">\r\n				Những h&igrave;nh ảnh bị r&ograve; rỉ của sản phẩm mới HKPhone.</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n<p>\r\n	Mức gi&aacute; l&yacute; tưởng kết hợp với cấu h&igrave;nh khủng, thiết kế độc đ&aacute;o ở mỗi sản phẩm lu&ocirc;n l&agrave; sở trường của thương hiệu. Từ những th&ocirc;ng tin như hiện tại, nhiều người tin rằng sản phẩm mới của h&atilde;ng sẽ kh&ocirc;ng l&agrave;m người d&ugrave;ng thất vọng.</p>\r\n<table cellpadding="0" cellspacing="0" class="picture">\r\n	<tbody>\r\n		<tr>\r\n			<td class="pic">\r\n				<img alt="" src="http://img.v3.news.zdn.vn/w660/Uploaded/JAC2_N3/2013_11_18/Them_thong_tin_hot_ve_smartphone_145_trieu_cua_HKPhone_3.jpg" /></td>\r\n		</tr>\r\n		<tr>\r\n			<td class="pCaption caption">\r\n				Thiết kế trẻ trung v&agrave; tinh tế ở chiếc HKPhone gi&aacute; 1,45 triệu hấp dẫn người d&ugrave;ng.</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n<p>\r\n	L&agrave; th&agrave;nh vi&ecirc;n diễn đ&agrave;n HKPhone, Th&ugrave;y Linh chia sẻ: &ldquo;M&igrave;nh thực sự bất ngờ bởi mức gi&aacute; m&agrave; h&atilde;ng đưa ra. Với mức gi&aacute; n&agrave;y m&agrave; sản phẩm vừa c&oacute; thiết kế đẹp c&ugrave;ng với cấu h&igrave;nh cao th&igrave; c&oacute; lẽ đ&acirc;y sẽ l&agrave; chiếc smartphone đ&aacute;ng mua nhất hiện nay ở tầm gi&aacute; dưới 2 triệu đồng&rdquo;.</p>\r\n<p>\r\n	Đại diện h&atilde;ng cũng cho biết th&ecirc;m: &ldquo;Trong ng&agrave;y ra mắt sản phẩm ch&uacute;ng t&ocirc;i sẽ c&oacute; nhiều điều bất ngờ muốn gửi tới người d&ugrave;ng, đặc biệt l&agrave; những kh&aacute;ch h&agrave;ng đầu ti&ecirc;n&rdquo;.</p>\r\n<p>\r\n	C&ugrave;ng với việc tạo ra một luồng gi&oacute; mới cho thị trường, sản phẩm n&agrave;y hứa hẹn sẽ l&agrave; một &ldquo;quả bom tấn&rdquo; với c&aacute;c đối thủ trong ph&acirc;n kh&uacute;c gi&aacute; 1-2 triệu đồng. Những th&ocirc;ng tin đầy đủ v&agrave; chi tiết về sản phẩm mới sẽ được HKPhone c&ocirc;ng bố ngay ng&agrave;y mai, 20/11.</p>\r\n', '2013-11-19 00:00:00', 0, 8, 1),
(11, 'Google sắp hỗ trợ Android chụp ảnh RAW', 2, 'Theo Arstechnica, Google đang phát triển một định dạng ảnh RAW chất lượng cao dành cho các smartphone Android, mở rộng khả năng nhiếp ảnh trên những thiết bị di động.', '<div class="summary">\r\n	<p itemprop="description">\r\n		Theo Arstechnica, Google đang ph&aacute;t triển một định dạng ảnh RAW chất lượng cao d&agrave;nh cho c&aacute;c smartphone Android, mở rộng khả năng nhiếp ảnh tr&ecirc;n những thiết bị di động.</p>\r\n</div>\r\n<div class="content" itemprop="articleBody">\r\n	<p>\r\n		Kh&ocirc;ng l&acirc;u sau khi Nokia ph&aacute;t triển định dạng RAW cho d&ograve;ng m&aacute;y Lumia cao cấp, Google cũng bắt tay v&agrave;o việc n&acirc;ng cao khả năng chụp ảnh tr&ecirc;n c&aacute;c smartphone Android. Một lập tr&igrave;nh vi&ecirc;n mang t&ecirc;n Josh Brown đ&atilde; ph&aacute;t hiện ra c&aacute;c đoạn m&atilde; tr&ecirc;n hệ điều h&agrave;nh Android cho thấy Google đ&atilde; v&agrave; đang &quot;&acirc;m thầm&quot; ph&aacute;t triển khả năng hỗ trợ ảnh RAW - định dạng kh&ocirc;ng n&eacute;n v&agrave; chưa qua xử l&yacute;, tương tự như phim &acirc;m bản tr&ecirc;n m&aacute;y phim.</p>\r\n	<table cellpadding="0" cellspacing="0" class="picture">\r\n		<tbody>\r\n			<tr>\r\n				<td class="pic">\r\n					<img alt="" src="http://img.v3.news.zdn.vn/w660/Uploaded/ynssi/2013_11_19/nexuscamera.jpg" /></td>\r\n			</tr>\r\n			<tr>\r\n				<td class="pCaption caption">\r\n					Định dạng ảnh RAW kh&ocirc;ng n&eacute;n vốn chỉ c&oacute; tr&ecirc;n c&aacute;c d&ograve;ng m&aacute;y ảnh cao cấp, nay sắp c&oacute; mặt tr&ecirc;n Android.</td>\r\n			</tr>\r\n		</tbody>\r\n	</table>\r\n	<p>\r\n		Kh&aacute;c với định dạng JPEG th&ocirc;ng thường, định dạng RAW tương tự như phim &acirc;m bản nhưng ở dạng kĩ thuật số, cho ph&eacute;p người d&ugrave;ng can thiệp s&acirc;u v&agrave;o c&aacute;c th&ocirc;ng số của bức ảnh như &aacute;nh s&aacute;ng, m&agrave;u sắc, độ chi tiết,... những điều vốn bị hạn chế khi xử l&yacute; ảnh JPEG. N&oacute;i một c&aacute;ch đơn giản, việc hỗ trợ lưu ảnh RAW tr&ecirc;n di động sẽ gi&uacute;p người d&ugrave;ng tạo ra những bức ảnh đẹp hơn trước gấp nhiều lần (nếu biết c&aacute;ch t&ugrave;y chỉnh th&ocirc;ng qua c&aacute;c ứng dụng đi k&egrave;m).</p>\r\n	<p>\r\n		Tuy chậm ch&acirc;n hơn Nokia, nhưng Google cũng kh&ocirc;ng đến nỗi qu&aacute; muộn m&agrave;ng khi c&aacute;c model Android c&oacute; camera &quot;khủng&quot; như Sony Xperia Z1 cũng chỉ mới xuất hiện tr&ecirc;n thị trường. Nếu t&iacute;nh th&ecirc;m cả hai chiếc ống k&iacute;nh c&oacute; khả năng chụp ảnh QX10 v&agrave; QX100 của Sony, định dạng ảnh RAW d&agrave;nh cho Android đ&atilde; c&oacute; &quot;đất dụng v&otilde;&quot;.</p>\r\n	<p>\r\n		Bằng việc n&acirc;ng cao khả năng chụp ảnh v&agrave; lưu ảnh của Android, Google cũng đ&atilde; g&oacute;p một nh&aacute;t dao ch&iacute; mạng v&agrave;o c&ocirc;ng nghiệp sản xuất m&aacute;y số. Những chiếc m&aacute;y ảnh du lịch nhỏ gọn gi&aacute; rẻ c&oacute; thể sẽ biến mất trong tương lai gần v&igrave; kh&ocirc;ng thể cho ảnh chất lượng hơn c&aacute;c smartphone hỗ trợ định dạng RAW.</p>\r\n	<p>\r\n		Google hiện vẫn chưa x&aacute;c nhận th&ocirc;ng tin tr&ecirc;n cũng như chưa th&ocirc;ng b&aacute;o lộ tr&igrave;nh t&iacute;ch hợp c&ocirc;ng nghệ lưu v&agrave; xử l&yacute; ảnh RAW cho hệ điều h&agrave;nh Android, nhưng nhiều khả năng c&ocirc;ng nghệ n&agrave;y sẽ xuất hiện v&agrave;o năm sau.</p>\r\n</div>\r\n<p>\r\n	&nbsp;</p>\r\n', '2013-11-19 00:00:00', 0, 1, 0),
(12, '5 smartphone giá rẻ tốt nhất hiện nay ', 1, 'Smartphone ngày càng phổ biến và với số tiền không quá 400 USD vào thời điểm này, bạn đã có thể lựa chọn cho mình những chiếc điện thoại di động đẳng cấp.', '<div class="summary">\r\n	<p itemprop="description">\r\n		Smartphone ng&agrave;y c&agrave;ng phổ biến v&agrave; với số tiền kh&ocirc;ng qu&aacute; 400 USD v&agrave;o thời điểm n&agrave;y, bạn đ&atilde; c&oacute; thể lựa chọn cho m&igrave;nh những chiếc điện thoại di động đẳng cấp.</p>\r\n</div>\r\n<table cellpadding="0" cellspacing="0" class="picture">\r\n	<tbody>\r\n		<tr>\r\n			<td class="pic">\r\n				<img alt="" src="http://img.v3.news.zdn.vn/w660/Uploaded/erlu/2013_11_18/top1_1.jpg" /></td>\r\n		</tr>\r\n		<tr>\r\n			<td class="pCaption caption">\r\n				<p>\r\n					<strong>Nexus 5</strong></p>\r\n				<p>\r\n					Với Nexus 4, Google đ&atilde; cho thấy smartphone chất lượng cao cũng ho&agrave;n to&agrave;n c&oacute; thể được đưa ra ở mức gi&aacute; cực kỳ hợp l&yacute; với người d&ugrave;ng khi n&oacute; chỉ bằng tầm nửa gi&aacute; của những smartphone kh&aacute;c.</p>\r\n				<p>\r\n					Một năm sau, Nexus 5 tiếp tục trở th&agrave;nh đối thủ đ&aacute;ng gờm với rất nhiều smartphone của c&aacute;c h&atilde;ng khi n&oacute; c&oacute; mức gi&aacute; chỉ 349 USD. Kh&oacute; c&oacute; thể c&oacute; đối thủ cạnh tranh ở mức gi&aacute; đ&oacute; khi m&agrave; Nexus 5 sở hữu m&agrave;n h&igrave;nh HD, vi xử l&yacute; Snapdragon 800, hệ điều h&agrave;nh Android mới nhất KitKat,...</p>\r\n			</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n<table cellpadding="0" cellspacing="0" class="picture">\r\n	<tbody>\r\n		<tr>\r\n			<td class="pic">\r\n				<img alt="" src="http://img.v3.news.zdn.vn/w660/Uploaded/erlu/2013_11_18/top2.jpg" /></td>\r\n		</tr>\r\n		<tr>\r\n			<td class="pCaption caption">\r\n				<p>\r\n					<strong>Moto G</strong></p>\r\n				<p>\r\n					Chiếc smartphone n&agrave;y của Motorola kh&aacute; ấn tượng với m&agrave;n h&igrave;nh 4.5-inch với kiểu d&aacute;ng tương đối giống với Moto X, vi xử l&yacute; l&otilde;i tứ v&agrave; đặc biệt l&agrave; gi&aacute; của n&oacute; chỉ ở mức 179 USD. Nếu đ&uacute;ng như CEO của Motorola hứa hẹn, Moto G cũng c&oacute; thể n&acirc;ng cấp l&ecirc;n phi&ecirc;n bản Android mới nhất KitKat th&igrave; n&oacute; thực sự ph&ugrave; hợp với những ai y&ecirc;u th&iacute;ch một chiếc smartphone lịch l&atilde;m nhưng kh&ocirc;ng cần phải l&agrave; phi&ecirc;n bản mới nhất v&agrave; m&agrave;n h&igrave;nh lớn nhất.</p>\r\n			</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n<table cellpadding="0" cellspacing="0" class="picture">\r\n	<tbody>\r\n		<tr>\r\n			<td class="pic">\r\n				<img alt="" src="http://img.v3.news.zdn.vn/w660/Uploaded/erlu/2013_11_18/top3.jpg" /></td>\r\n		</tr>\r\n		<tr>\r\n			<td class="pCaption caption">\r\n				<p>\r\n					<strong>Moto X</strong></p>\r\n				<p>\r\n					Moto X được nh&agrave; mạng Republic Wireless đưa ra gi&aacute; b&aacute;n 299 USD kh&ocirc;ng k&egrave;m hợp đồng. Đ&acirc;y l&agrave; mức gi&aacute; c&oacute; lẽ l&agrave; kh&ocirc;ng thể tốt hơn. Tuy nhi&ecirc;n, rắc rối duy nhất l&agrave; m&aacute;y sẽ kh&ocirc;ng hoạt động với c&aacute;c nh&agrave; mạng kh&aacute;c, trừ Sprint.</p>\r\n			</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n<table cellpadding="0" cellspacing="0" class="picture">\r\n	<tbody>\r\n		<tr>\r\n			<td class="pic">\r\n				<img alt="" src="http://img.v3.news.zdn.vn/w660/Uploaded/erlu/2013_11_18/top4.jpg" /></td>\r\n		</tr>\r\n		<tr>\r\n			<td class="pCaption caption">\r\n				<p>\r\n					<strong>Galaxy S4 Mini</strong></p>\r\n				<p>\r\n					Phi&ecirc;n bản thu nhỏ chiếc smartphone mới nhất của Samsung được cung cấp ở mức gi&aacute; chưa đến 400 USD với một cấu h&igrave;nh mạnh tương đương người anh em của n&oacute; l&agrave; Galaxy S4.</p>\r\n			</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n<table cellpadding="0" cellspacing="0" class="picture">\r\n	<tbody>\r\n		<tr>\r\n			<td class="pic">\r\n				<img alt="" src="http://img.v3.news.zdn.vn/w660/Uploaded/erlu/2013_11_18/top5.jpg" /></td>\r\n		</tr>\r\n		<tr>\r\n			<td class="pCaption caption">\r\n				<p>\r\n					<strong>Lumia 520</strong></p>\r\n				<p>\r\n					D&ugrave; Windows Phone quả thực c&ograve;n thiếu kh&aacute; nhiều ứng dụng v&agrave; hệ điều h&agrave;nh c&ograve;n nhiều bất tiện nhưng Lumia 520/521 với mức gi&aacute; c&aacute;c nh&agrave; mạng đưa ra l&agrave; 149 USD đ&atilde; đem lại th&agrave;nh c&ocirc;ng ngo&agrave;i mong đợi cho Nokia. Đ&acirc;y cũng l&agrave; chiếc smartphone Windows Phone b&aacute;n chạy nhất thế giới theo th&ocirc;ng tin từ Microsoft.</p>\r\n			</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n<p>\r\n	&nbsp;</p>\r\n', '2013-11-19 00:00:00', 0, 2, 1),
(13, 'Nokia Lumia 929 có thể ra mắt sau ba ngày tới ', 2, 'Chiếc smartphone được cho là quan trọng của Nokia trong năm 2013 có thể sẽ được ra mắt trong ngày 21/11.', '<div class="summary">\r\n	<p itemprop="description">\r\n		Chiếc smartphone được cho l&agrave; quan trọng của Nokia trong năm 2013 c&oacute; thể sẽ được ra mắt trong ng&agrave;y 21/11.</p>\r\n</div>\r\n<div class="content" itemprop="articleBody">\r\n	<p>\r\n		Tuy Nokia vừa ra mắt bộ đ&ocirc;i Lumia 1520 v&agrave; Lumia 1320, nhưng giới c&ocirc;ng nghệ vẫn mong chờ th&ecirc;m một sản phẩm bom tấn của Nokia trong năm 2013. Với m&agrave;n h&igrave;nh l&ecirc;n đến 6 inch, 2 phablet kể tr&ecirc;n kh&ocirc;ng phải l&agrave; một sản phẩm ph&ugrave; hợp với số đ&ocirc;ng người d&ugrave;ng, v&agrave; đ&acirc;y cũng l&agrave; l&yacute; do để chiếc Lumia 929 ra mắt v&agrave;o cuối năm nay.</p>\r\n	<table cellpadding="0" cellspacing="0" class="picture">\r\n		<tbody>\r\n			<tr>\r\n				<td class="pic">\r\n					<img alt="" src="http://img.v3.news.zdn.vn/w660/Uploaded/ynssi/2013_11_18/lumia929_large_verge_medium_landscape.jpg" /></td>\r\n			</tr>\r\n			<tr>\r\n				<td class="pCaption caption">\r\n					H&igrave;nh ảnh về chiếc Lumia 929 của Nokia r&ograve; rỉ tr&ecirc;n trang Twitter @evleaks</td>\r\n			</tr>\r\n		</tbody>\r\n	</table>\r\n	<p>\r\n		Về cấu h&igrave;nh, Lumia 929 c&oacute; thể được trang bị m&agrave;n h&igrave;nh 5 inch độ ph&acirc;n giải 1.080 x 1.920 pixel, mật độ điểm ảnh 441ppi (cao hơn cả iPhone 5S v&agrave; iPad Mini Retina), camera 20,7 MP. Những th&ocirc;ng số c&ograve;n lại c&oacute; thể sẽ giống với chiếc Lumia 1520.</p>\r\n	<p>\r\n		Theo một nguồn tin nội bộ của Verizon, Lumia 929 c&oacute; thể được ra mắt v&agrave;o ng&agrave;y 21/11, một tuần trước khi &quot;ng&agrave;y thứ 6 đen tối&quot; (Black Friday - dịp mua sắm lớn nhất trong năm ở Mỹ) diễn ra. Gi&aacute; m&aacute;y cũng chưa được tiết lộ.</p>\r\n</div>\r\n<p>\r\n	&nbsp;</p>\r\n', '2013-11-19 00:00:00', 0, 5, 2),
(14, 'Apple phát hành iOS 7.1 Beta', 2, 'Bản cập nhật iOS 7.1 Beta được cho là nhằm khắc phục một số lỗi bug xuất hiện trên phiên bản iOS cũ như lỗi Bluetooth hay kết nối iTunes Match.', '<div class="summary">\r\n	<p itemprop="description">\r\n		Bản cập nhật iOS 7.1 Beta được cho l&agrave; nhằm khắc phục một số lỗi bug xuất hiện tr&ecirc;n phi&ecirc;n bản iOS cũ như lỗi Bluetooth hay kết nối iTunes Match.</p>\r\n</div>\r\n<table cellpadding="0" cellspacing="0" class="picture">\r\n	<tbody>\r\n		<tr>\r\n			<td class="pic">\r\n				<img alt="" src="http://img.v3.news.zdn.vn/w660/Uploaded/Aohuouk/2013_11_19/iphone5sreview5575x435.jpg" /></td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n<p>\r\n	Chỉ &iacute;t ng&agrave;y sau khi cập nhật bản iOS 7.0.4 cho iPhone, iPad v&agrave; iPod touch, Apple lại tiếp tục ph&aacute;t h&agrave;nh bản iOS 7.1 Beta đến c&aacute;c nh&agrave; ph&aacute;t triển. Đ&acirc;y được cho l&agrave; một bản cập nhật nhằm khắc phục một số lỗi người d&ugrave;ng từng ph&agrave;n n&agrave;n trước đ&oacute; về iOS 7, trong đ&oacute; c&oacute; lỗi kết nối Bluetooth hay iTunes Match. Tuy nhi&ecirc;n, Apple lại kh&ocirc;ng nhắc g&igrave; đến hiện tượng tự khởi động lại tr&ecirc;n một số chiếc iPhone 5S đ&atilde; được b&aacute;n ra thị trường.</p>\r\n<p>\r\n	Năm ngo&aacute;i, bản iOS 6.1 Beta cũng được ph&aacute;t h&agrave;nh v&agrave;o th&aacute;ng 11 nhưng phải đến tận th&aacute;ng 1, bản ch&iacute;nh thức mới đến tay người d&ugrave;ng. Th&ocirc;ng thường, phi&ecirc;n bản iOS x.1 của Apple thường mang đến nhiều t&iacute;nh năng lớn. Chẳng hạn, iOS 6.1 năm ngo&aacute;i sở hữu t&iacute;nh năng Siri cải tiến v&agrave; phần giao diện &acirc;m nhạc tr&ecirc;n m&agrave;n h&igrave;nh kh&oacute;a mới.</p>\r\n', '2013-11-19 00:00:00', 0, 8, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `BINHLUAN`
--
ALTER TABLE `BINHLUAN`
 ADD PRIMARY KEY (`ID`), ADD KEY `BINHLUAN_TO_SANPHAM` (`MASANPHAM`) USING BTREE;

--
-- Indexes for table `BINHLUANTINTUC`
--
ALTER TABLE `BINHLUANTINTUC`
 ADD PRIMARY KEY (`ID`), ADD KEY `BINHLUAN_TO_SANPHAM` (`MATINTUC`) USING BTREE, ADD KEY `BINHLUANTT_TO_NGUOIDUNG` (`MAKHACHHANG`);

--
-- Indexes for table `CHITIETDANHGIA`
--
ALTER TABLE `CHITIETDANHGIA`
 ADD PRIMARY KEY (`ID`), ADD KEY `CTDG_TO_NGUOIDUNG` (`MAKHACHHANG`), ADD KEY `CTDG_TO_SANPHAM` (`MASANPHAM`), ADD KEY `CTDG_TO_DANHGIA` (`MADANHGIA`);

--
-- Indexes for table `CHITIETHOADON`
--
ALTER TABLE `CHITIETHOADON`
 ADD PRIMARY KEY (`MADATHANG`,`MASANPHAM`), ADD KEY `DATHANG_TO_SANPHAM` (`MASANPHAM`);

--
-- Indexes for table `CHITIETNHAPHANG`
--
ALTER TABLE `CHITIETNHAPHANG`
 ADD PRIMARY KEY (`MANHAPHANG`,`MASANPHAM`), ADD KEY `CTNH_TO_SANPHAM` (`MASANPHAM`);

--
-- Indexes for table `CHITIETSANPHAM`
--
ALTER TABLE `CHITIETSANPHAM`
 ADD PRIMARY KEY (`ID`), ADD KEY `CTLAPTOP_TO_SANPHAM` (`MASANPHAM`);

--
-- Indexes for table `DANHGIA`
--
ALTER TABLE `DANHGIA`
 ADD PRIMARY KEY (`ID`), ADD KEY `DANHGIA_TO_SANPHAM` (`MASANPHAM`);

--
-- Indexes for table `DATHANG`
--
ALTER TABLE `DATHANG`
 ADD PRIMARY KEY (`MADATHANG`,`MASANPHAM`), ADD KEY `DATHANG_TO_SANPHAM` (`MASANPHAM`);

--
-- Indexes for table `HINHANH`
--
ALTER TABLE `HINHANH`
 ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `HOADON`
--
ALTER TABLE `HOADON`
 ADD PRIMARY KEY (`ID`), ADD KEY `TTDT2_TO_NGUOIDUNG` (`NGUOILAPDON`);

--
-- Indexes for table `LOAISANPHAM`
--
ALTER TABLE `LOAISANPHAM`
 ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `LOAITINTUC`
--
ALTER TABLE `LOAITINTUC`
 ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `NGUOIDUNG`
--
ALTER TABLE `NGUOIDUNG`
 ADD PRIMARY KEY (`ID`), ADD KEY `NGUOIDUNG_TO_QUYEN` (`QUYEN`), ADD KEY `NGUOIDUNG_TO_TINHTHANH` (`TINHTHANH`), ADD KEY `NGUOIDUNG_TO_HINHANH` (`HINHDAIDIEN`), ADD KEY `SDT` (`SDT`);

--
-- Indexes for table `NHACUNGCAP`
--
ALTER TABLE `NHACUNGCAP`
 ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `NHAPHANG`
--
ALTER TABLE `NHAPHANG`
 ADD PRIMARY KEY (`ID`), ADD KEY `NHAPHANG_TO_NGUOIDUNG` (`NGUOINHAP`);

--
-- Indexes for table `QUYEN`
--
ALTER TABLE `QUYEN`
 ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `SANPHAM`
--
ALTER TABLE `SANPHAM`
 ADD PRIMARY KEY (`ID`), ADD KEY `SANPHAM_TO_LOAI` (`LOAI`) USING BTREE, ADD KEY `SANPHAM_TO_NCC` (`NHACUNGCAP`) USING BTREE, ADD KEY `SANPHAM_TO_HINH` (`HINHDAIDIEN`) USING BTREE;

--
-- Indexes for table `SESSION`
--
ALTER TABLE `SESSION`
 ADD PRIMARY KEY (`session_id`), ADD KEY `last_activity_idx` (`last_activity`);

--
-- Indexes for table `THONGTINDATHANG`
--
ALTER TABLE `THONGTINDATHANG`
 ADD PRIMARY KEY (`ID`), ADD KEY `TTDT2_TO_NGUOIDUNG` (`NGUOILAPDON`), ADD KEY `TTDH_TO_NGUOIDUNG` (`SDTKHACHHANG`);

--
-- Indexes for table `TINHTHANH`
--
ALTER TABLE `TINHTHANH`
 ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `TINTUC`
--
ALTER TABLE `TINTUC`
 ADD PRIMARY KEY (`ID`), ADD KEY `TINTUC_TO_LOAITINTUC` (`LOAITIN`), ADD KEY `TINTUC_TO_NGUOIDUNG` (`TACGIA`), ADD KEY `TINTUC_TO_HINHANH` (`HINH`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `BINHLUAN`
--
ALTER TABLE `BINHLUAN`
MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `BINHLUANTINTUC`
--
ALTER TABLE `BINHLUANTINTUC`
MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `CHITIETDANHGIA`
--
ALTER TABLE `CHITIETDANHGIA`
MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=37;
--
-- AUTO_INCREMENT for table `CHITIETSANPHAM`
--
ALTER TABLE `CHITIETSANPHAM`
MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=53;
--
-- AUTO_INCREMENT for table `DANHGIA`
--
ALTER TABLE `DANHGIA`
MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=62;
--
-- AUTO_INCREMENT for table `HINHANH`
--
ALTER TABLE `HINHANH`
MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=60;
--
-- AUTO_INCREMENT for table `HOADON`
--
ALTER TABLE `HOADON`
MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT for table `LOAISANPHAM`
--
ALTER TABLE `LOAISANPHAM`
MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `NGUOIDUNG`
--
ALTER TABLE `NGUOIDUNG`
MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=36;
--
-- AUTO_INCREMENT for table `NHACUNGCAP`
--
ALTER TABLE `NHACUNGCAP`
MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `NHAPHANG`
--
ALTER TABLE `NHAPHANG`
MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=24;
--
-- AUTO_INCREMENT for table `SANPHAM`
--
ALTER TABLE `SANPHAM`
MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=62;
--
-- AUTO_INCREMENT for table `THONGTINDATHANG`
--
ALTER TABLE `THONGTINDATHANG`
MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=22;
--
-- AUTO_INCREMENT for table `TINHTHANH`
--
ALTER TABLE `TINHTHANH`
MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=65;
--
-- AUTO_INCREMENT for table `TINTUC`
--
ALTER TABLE `TINTUC`
MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=15;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `BINHLUAN`
--
ALTER TABLE `BINHLUAN`
ADD CONSTRAINT `BINHLUAN_TO_SANPHAM` FOREIGN KEY (`MASANPHAM`) REFERENCES `SANPHAM` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `BINHLUANTINTUC`
--
ALTER TABLE `BINHLUANTINTUC`
ADD CONSTRAINT `BINHLUANTT_TO_NGUOIDUNG` FOREIGN KEY (`MAKHACHHANG`) REFERENCES `NGUOIDUNG` (`ID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
ADD CONSTRAINT `BINHLUANTT_TO_TINTUC` FOREIGN KEY (`MATINTUC`) REFERENCES `TINTUC` (`ID`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `CHITIETDANHGIA`
--
ALTER TABLE `CHITIETDANHGIA`
ADD CONSTRAINT `CTDG_TO_DANHGIA` FOREIGN KEY (`MADANHGIA`) REFERENCES `DANHGIA` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT `CTDG_TO_NGUOIDUNG` FOREIGN KEY (`MAKHACHHANG`) REFERENCES `NGUOIDUNG` (`ID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
ADD CONSTRAINT `CTDG_TO_SANPHAM` FOREIGN KEY (`MASANPHAM`) REFERENCES `SANPHAM` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `CHITIETHOADON`
--
ALTER TABLE `CHITIETHOADON`
ADD CONSTRAINT `chitiethoadon_ibfk_1` FOREIGN KEY (`MASANPHAM`) REFERENCES `SANPHAM` (`ID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
ADD CONSTRAINT `chitiethoadon_ibfk_2` FOREIGN KEY (`MADATHANG`) REFERENCES `THONGTINDATHANG` (`ID`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `CHITIETNHAPHANG`
--
ALTER TABLE `CHITIETNHAPHANG`
ADD CONSTRAINT `CTNH_TO_NHAPHANG` FOREIGN KEY (`MANHAPHANG`) REFERENCES `NHAPHANG` (`ID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
ADD CONSTRAINT `CTNH_TO_SANPHAM` FOREIGN KEY (`MASANPHAM`) REFERENCES `SANPHAM` (`ID`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `CHITIETSANPHAM`
--
ALTER TABLE `CHITIETSANPHAM`
ADD CONSTRAINT `CTSP_TO_SANPHAM` FOREIGN KEY (`MASANPHAM`) REFERENCES `SANPHAM` (`ID`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `DANHGIA`
--
ALTER TABLE `DANHGIA`
ADD CONSTRAINT `DANHGIA_TO_SANPHAM` FOREIGN KEY (`MASANPHAM`) REFERENCES `SANPHAM` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `DATHANG`
--
ALTER TABLE `DATHANG`
ADD CONSTRAINT `DATHANG_TO_SANPHAM` FOREIGN KEY (`MASANPHAM`) REFERENCES `SANPHAM` (`ID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
ADD CONSTRAINT `DATHANG_TO_THONGTINDATHANG` FOREIGN KEY (`MADATHANG`) REFERENCES `THONGTINDATHANG` (`ID`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `HOADON`
--
ALTER TABLE `HOADON`
ADD CONSTRAINT `hoadon_ibfk_1` FOREIGN KEY (`NGUOILAPDON`) REFERENCES `NGUOIDUNG` (`ID`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `NGUOIDUNG`
--
ALTER TABLE `NGUOIDUNG`
ADD CONSTRAINT `NGUOIDUNG_TO_HINHANH` FOREIGN KEY (`HINHDAIDIEN`) REFERENCES `HINHANH` (`ID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
ADD CONSTRAINT `NGUOIDUNG_TO_QUYEN` FOREIGN KEY (`QUYEN`) REFERENCES `QUYEN` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT `NGUOIDUNG_TO_TINHTHANH` FOREIGN KEY (`TINHTHANH`) REFERENCES `TINHTHANH` (`ID`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `NHAPHANG`
--
ALTER TABLE `NHAPHANG`
ADD CONSTRAINT `NHAPHANG_TO_NGUOIDUNG` FOREIGN KEY (`NGUOINHAP`) REFERENCES `NGUOIDUNG` (`ID`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `SANPHAM`
--
ALTER TABLE `SANPHAM`
ADD CONSTRAINT `SANPHAM_TO_HINHANH` FOREIGN KEY (`HINHDAIDIEN`) REFERENCES `HINHANH` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT `SANPHAM_TO_LOAISANPHAM` FOREIGN KEY (`LOAI`) REFERENCES `LOAISANPHAM` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT `SANPHAM_TO_NCC` FOREIGN KEY (`NHACUNGCAP`) REFERENCES `NHACUNGCAP` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `THONGTINDATHANG`
--
ALTER TABLE `THONGTINDATHANG`
ADD CONSTRAINT `TTDH_TO_NGUOIDUNG` FOREIGN KEY (`SDTKHACHHANG`) REFERENCES `NGUOIDUNG` (`SDT`) ON DELETE NO ACTION ON UPDATE NO ACTION,
ADD CONSTRAINT `TTDT2_TO_NGUOIDUNG` FOREIGN KEY (`NGUOILAPDON`) REFERENCES `NGUOIDUNG` (`ID`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `TINTUC`
--
ALTER TABLE `TINTUC`
ADD CONSTRAINT `TINTUC_TO_HINHANH` FOREIGN KEY (`HINH`) REFERENCES `HINHANH` (`ID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
ADD CONSTRAINT `TINTUC_TO_LOAITINTUC` FOREIGN KEY (`LOAITIN`) REFERENCES `LOAITINTUC` (`ID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
ADD CONSTRAINT `TINTUC_TO_NGUOIDUNG` FOREIGN KEY (`TACGIA`) REFERENCES `NGUOIDUNG` (`ID`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
