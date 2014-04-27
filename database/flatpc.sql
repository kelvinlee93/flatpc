-- phpMyAdmin SQL Dump
-- version 4.1.7
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Apr 27, 2014 at 05:34 PM
-- Server version: 5.6.16
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

-- --------------------------------------------------------

--
-- Table structure for table `BINHLUAN`
--

CREATE TABLE IF NOT EXISTS `BINHLUAN` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `MASANPHAM` int(11) NOT NULL,
  `TENKHACHANG` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `EMAIL` text COLLATE utf8_unicode_ci NOT NULL,
  `NOIDUNG` longtext COLLATE utf8_unicode_ci NOT NULL,
  `THOIGIAN` datetime NOT NULL,
  PRIMARY KEY (`ID`),
  KEY `BINHLUAN_TO_SANPHAM` (`MASANPHAM`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `CHITIETLAPTOP`
--

CREATE TABLE IF NOT EXISTS `CHITIETLAPTOP` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `MASANPHAM` int(11) DEFAULT NULL,
  `HEDIEUHANH` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `MANHINH` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `VIXULY` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `DOHOA` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `RAM` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `DIACUNG` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `DIAQUANG` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `KETNOI` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `PIN` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `TRONGLUONG` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `BAOHANH` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `KHUYENMAI` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`ID`),
  KEY `CTLAPTOP_TO_SANPHAM` (`MASANPHAM`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `CHITIETMTB`
--

CREATE TABLE IF NOT EXISTS `CHITIETMTB` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `MASANPHAM` int(11) DEFAULT NULL,
  `HEDIEUHANH` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `MANHINH` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `VIXULY` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `RAM` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ROM` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `CAMERA` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `KETNOI` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `PIN` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `TRONGLUONG` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `BAOHANH` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `KHUYENMAI` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`ID`),
  KEY `CTMTB_TO_SANPHAM` (`MASANPHAM`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `CHITIETPC`
--

CREATE TABLE IF NOT EXISTS `CHITIETPC` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `MASANPHAM` int(11) DEFAULT NULL,
  `HEDIEUHANH` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `VIXULY` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `DOHOA` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `RAM` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `DIACUNG` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `KETNOI` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `BAOHANH` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `KHUYENMAI` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`ID`),
  KEY `CTPC_TO_SANPHAM` (`MASANPHAM`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `DANHGIA`
--

CREATE TABLE IF NOT EXISTS `DANHGIA` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `MASANPHAM` int(11) NOT NULL,
  `LUOTDANHGIA` int(11) NOT NULL DEFAULT '0',
  `TONGDIEM` int(11) NOT NULL DEFAULT '0',
  `DIEMDANHGIA` double NOT NULL DEFAULT '0',
  PRIMARY KEY (`ID`),
  KEY `DANHGIA_TO_SANPHAM` (`MASANPHAM`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `DATHANG`
--

CREATE TABLE IF NOT EXISTS `DATHANG` (
  `MADATHANG` int(11) NOT NULL,
  `MASANPHAM` int(11) NOT NULL,
  `SOLUONG` int(11) DEFAULT NULL,
  PRIMARY KEY (`MADATHANG`,`MASANPHAM`),
  KEY `DATHANG_TO_SANPHAM` (`MASANPHAM`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `HINHANH`
--

CREATE TABLE IF NOT EXISTS `HINHANH` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `TENANH` text COLLATE utf8_unicode_ci,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `HINHSANPHAM`
--

CREATE TABLE IF NOT EXISTS `HINHSANPHAM` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `MASANPHAM` int(11) NOT NULL,
  `LINK` char(20) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`ID`),
  KEY `HINHSANPHAM_TO_SANPHAM` (`MASANPHAM`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `LOAISANPHAM`
--

CREATE TABLE IF NOT EXISTS `LOAISANPHAM` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `TENLOAI` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=4 ;

--
-- Dumping data for table `LOAISANPHAM`
--

INSERT INTO `LOAISANPHAM` (`ID`, `TENLOAI`) VALUES
(0, 'Khác'),
(1, 'Máy tính bảng'),
(2, 'Máy tính xách tay'),
(3, 'Máy tính để bàn');

-- --------------------------------------------------------

--
-- Table structure for table `LOAITINTUC`
--

CREATE TABLE IF NOT EXISTS `LOAITINTUC` (
  `ID` int(11) NOT NULL,
  `TENLOAI` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`ID`)
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
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `TENNGUOIDUNG` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `TENDANGNHAP` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `MATKHAU` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `EMAIL` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `NGAYSINH` date DEFAULT NULL,
  `DIACHI` text COLLATE utf8_unicode_ci,
  `GIOITINH` tinyint(1) DEFAULT NULL,
  `CMND` decimal(10,0) DEFAULT NULL,
  `SDT` decimal(13,0) DEFAULT NULL,
  `QUYEN` int(11) DEFAULT NULL,
  `TRANGTHAI` int(11) DEFAULT '1',
  PRIMARY KEY (`ID`),
  KEY `NGUOIDUNG_TO_QUYEN` (`QUYEN`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=2 ;

--
-- Dumping data for table `NGUOIDUNG`
--

INSERT INTO `NGUOIDUNG` (`ID`, `TENNGUOIDUNG`, `TENDANGNHAP`, `MATKHAU`, `EMAIL`, `NGAYSINH`, `DIACHI`, `GIOITINH`, `CMND`, `SDT`, `QUYEN`, `TRANGTHAI`) VALUES
(1, 'Kelvin Lee', 'kelvinlee', '15920c7a701670e5a436b86b41fcc0d7', 'kelvinlee@hotmail.com.vn', '1993-06-13', 'Trường Chinh, Tây Thạnh', 1, '341638370', '1694662923', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `NHACUNGCAP`
--

CREATE TABLE IF NOT EXISTS `NHACUNGCAP` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `TENNCC` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=7 ;

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
(6, 'TOSHIBA');

-- --------------------------------------------------------

--
-- Table structure for table `QUYEN`
--

CREATE TABLE IF NOT EXISTS `QUYEN` (
  `ID` int(11) NOT NULL,
  `TENQUYEN` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`ID`)
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
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `TENSANPHAM` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `LOAI` int(11) NOT NULL DEFAULT '0',
  `NHACUNGCAP` int(11) NOT NULL DEFAULT '0',
  `SOLUONG` int(11) NOT NULL DEFAULT '0',
  `HINHDAIDIEN` int(11) DEFAULT '0',
  `MOTA` text COLLATE utf8_unicode_ci,
  `DONGIA` bigint(20) NOT NULL DEFAULT '0',
  `TINHTRANG` int(11) NOT NULL DEFAULT '0',
  `LUOTXEM` bigint(20) NOT NULL DEFAULT '0',
  `LUOTMUA` bigint(20) NOT NULL DEFAULT '0',
  PRIMARY KEY (`ID`),
  KEY `SANPHAM_TO_LOAI` (`LOAI`) USING BTREE,
  KEY `SANPHAM_TO_NCC` (`NHACUNGCAP`) USING BTREE,
  KEY `SANPHAM_TO_HINH` (`HINHDAIDIEN`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `THONGTINDATHANG`
--

CREATE TABLE IF NOT EXISTS `THONGTINDATHANG` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `NGAYDATHANG` datetime DEFAULT NULL,
  `TONGTIEN` bigint(20) DEFAULT NULL,
  `TINHTRANG` int(11) DEFAULT NULL,
  `TENNGUOINHAN` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `DIACHI` text COLLATE utf8_unicode_ci,
  `SDT` decimal(10,0) DEFAULT NULL,
  `MAKHACHHANG` int(11) DEFAULT NULL,
  `PTTHANHTOAN` int(11) DEFAULT NULL,
  `PTVANCHUYEN` int(11) DEFAULT NULL,
  `THANHTIEN` bigint(20) DEFAULT NULL,
  PRIMARY KEY (`ID`),
  KEY `TTDH_TO_NGUOIDUNG` (`MAKHACHHANG`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `TINTUC`
--

CREATE TABLE IF NOT EXISTS `TINTUC` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `TIEUDE` text COLLATE utf8_unicode_ci,
  `LOAITIN` int(11) DEFAULT NULL,
  `MOTA` text COLLATE utf8_unicode_ci,
  `NOIDUNG` longtext COLLATE utf8_unicode_ci,
  `NGAYDANG` datetime DEFAULT NULL,
  `HINH` text COLLATE utf8_unicode_ci,
  `TACGIA` int(11) DEFAULT NULL,
  PRIMARY KEY (`ID`),
  KEY `TINTUC_TO_NGUOIDUNG` (`TACGIA`),
  KEY `TINTUC_TO_LOAITINTUC` (`LOAITIN`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `BINHLUAN`
--
ALTER TABLE `BINHLUAN`
  ADD CONSTRAINT `BINHLUAN_TO_SANPHAM` FOREIGN KEY (`MASANPHAM`) REFERENCES `SANPHAM` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `CHITIETLAPTOP`
--
ALTER TABLE `CHITIETLAPTOP`
  ADD CONSTRAINT `CTLAPTOP_TO_SANPHAM` FOREIGN KEY (`MASANPHAM`) REFERENCES `SANPHAM` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `CHITIETMTB`
--
ALTER TABLE `CHITIETMTB`
  ADD CONSTRAINT `CTMTB_TO_SANPHAM` FOREIGN KEY (`MASANPHAM`) REFERENCES `SANPHAM` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `CHITIETPC`
--
ALTER TABLE `CHITIETPC`
  ADD CONSTRAINT `CTPC_TO_SANPHAM` FOREIGN KEY (`MASANPHAM`) REFERENCES `SANPHAM` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `DANHGIA`
--
ALTER TABLE `DANHGIA`
  ADD CONSTRAINT `DANHGIA_TO_SANPHAM` FOREIGN KEY (`MASANPHAM`) REFERENCES `SANPHAM` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `DATHANG`
--
ALTER TABLE `DATHANG`
  ADD CONSTRAINT `DATHANG_TO_SANPHAM` FOREIGN KEY (`MASANPHAM`) REFERENCES `SANPHAM` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `DATHANG_TO_THONGTINDATHANG` FOREIGN KEY (`MADATHANG`) REFERENCES `THONGTINDATHANG` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `HINHSANPHAM`
--
ALTER TABLE `HINHSANPHAM`
  ADD CONSTRAINT `HINHSANPHAM_TO_SANPHAM` FOREIGN KEY (`MASANPHAM`) REFERENCES `SANPHAM` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `NGUOIDUNG`
--
ALTER TABLE `NGUOIDUNG`
  ADD CONSTRAINT `NGUOIDUNG_TO_QUYEN` FOREIGN KEY (`QUYEN`) REFERENCES `QUYEN` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE;

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
  ADD CONSTRAINT `TTDH_TO_NGUOIDUNG` FOREIGN KEY (`MAKHACHHANG`) REFERENCES `NGUOIDUNG` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `TINTUC`
--
ALTER TABLE `TINTUC`
  ADD CONSTRAINT `TINTUC_TO_LOAITINTUC` FOREIGN KEY (`LOAITIN`) REFERENCES `LOAITINTUC` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `TINTUC_TO_NGUOIDUNG` FOREIGN KEY (`TACGIA`) REFERENCES `NGUOIDUNG` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
