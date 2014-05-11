-- phpMyAdmin SQL Dump
-- version 4.1.7
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: May 11, 2014 at 04:51 PM
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
  `TENKHACHHANG` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `EMAIL` text COLLATE utf8_unicode_ci NOT NULL,
  `NOIDUNG` longtext COLLATE utf8_unicode_ci NOT NULL,
  `THOIGIAN` datetime NOT NULL,
  PRIMARY KEY (`ID`),
  KEY `BINHLUAN_TO_SANPHAM` (`MASANPHAM`) USING BTREE
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=4 ;

--
-- Dumping data for table `BINHLUAN`
--

INSERT INTO `BINHLUAN` (`ID`, `MASANPHAM`, `TENKHACHHANG`, `EMAIL`, `NOIDUNG`, `THOIGIAN`) VALUES
(1, 1, 'Lâm Vân', 'lamvan90@gmail.com', 'Hàng tốt, giá rẻ.', '2014-01-29 01:05:51'),
(3, 5, 'Văn Bảo', 'vanbaoit@gmail.com', 'Bền, giá phải chăng', '2014-04-23 13:24:43');

-- --------------------------------------------------------

--
-- Table structure for table `CHITIETSANPHAM`
--

CREATE TABLE IF NOT EXISTS `CHITIETSANPHAM` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
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
  `KHUYENMAI` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`ID`),
  KEY `CTLAPTOP_TO_SANPHAM` (`MASANPHAM`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=6 ;

--
-- Dumping data for table `CHITIETSANPHAM`
--

INSERT INTO `CHITIETSANPHAM` (`ID`, `MASANPHAM`, `HEDIEUHANH`, `MANHINH`, `CPU`, `CHIPSET`, `DOHOA`, `RAM`, `ROM`, `CAMERA`, `KETNOI`, `DIAQUANG`, `PIN`, `TRONGLUONG`, `BAOHANH`, `KHUYENMAI`) VALUES
(1, 1, 'Windows 8 và Android', 'IPS LCD Full HD, 11.6 inch', 'Intel core i5-4200U-2C/4T+Atom Z2560-2C/4T, 1.6 GHZ', NULL, NULL, '2GB + 4GB', '500GB, 16 GB', '5 MP (2592 x 1944 pixels)', 'Không 3G, Wifi chuẩn 802.11 a/b/g/n', NULL, 'Tablet 19Wh + PC Sation 33Wh', '1.7kg (Tablet: 0.7kg / PC Station: 1kg)', '24', NULL),
(2, 2, 'iOS 7', 'Retina công nghệ IPS, 9.7 inch', 'Dual - Core, 1.3 GHz', NULL, NULL, '1 GB', '128 GB', '5 MP (2592 x 1944 pixels)', 'Có 3G ( tốc độ Download 21 Mbps, Upload 5.76 Mbps), Wi-Fi chuẩn (802.11a/b/g/n); 2 kênh (2.4GHz/ 5GHz) và MIMO', NULL, '8820mAh (32.4W/h)', '487g', '12', NULL),
(3, 3, 'Linux', '14 inch, HD (1366 x 768 pixels)', 'Intel, Celeron, 2955U, 1.40 GHz', NULL, 'Intel® HD Graphics, Share', 'DDR3L (2 khe RAM), 2 GB', 'HDD, 500 GB', NULL, NULL, 'DVD Super Multi Double Layer', 'Lithium-ion 4 cell', '1.87kg', '12', 'Tặng Túi xách Laptop (giá trị đến 150.000đ)'),
(4, 4, 'Linux', '14 inch, HD (1366 x 768 pixels)', 'Intel, Pentium Haswell, 3558U, 1.70 GHz', NULL, NULL, 'DDR3L (2 khe RAM), 2 GB', 'HDD, 500 GB', NULL, NULL, 'DVD Super Multi Double Layer', 'Lithium-ion 4 cell', '2.05kg', '12', 'Tặng Túi xách Laptop (giá trị đến 150.000đ)'),
(5, 5, 'DOS', NULL, 'Intel Celeron G465 1.9GHz', 'Intel B75', 'Intel® HD Graphics', 'DDRAM 2GB/1600', 'HDD, 500GB SATA', NULL, 'LAN 10/100/1000, Card Reader', 'DVD-RW', NULL, '7.9kg', '12', NULL);

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=6 ;

--
-- Dumping data for table `DANHGIA`
--

INSERT INTO `DANHGIA` (`ID`, `MASANPHAM`, `LUOTDANHGIA`, `TONGDIEM`, `DIEMDANHGIA`) VALUES
(1, 1, 5, 45, 9),
(2, 2, 2, 13, 6.5),
(3, 3, 2, 15, 7.5),
(4, 4, 7, 37, 5.3),
(5, 5, 5, 43, 8.6);

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

--
-- Dumping data for table `DATHANG`
--

INSERT INTO `DATHANG` (`MADATHANG`, `MASANPHAM`, `SOLUONG`) VALUES
(10, 1, 1),
(10, 2, 2),
(10, 3, 1),
(11, 1, 150),
(11, 2, 1),
(12, 1, 1),
(12, 2, 1),
(12, 3, 1);

-- --------------------------------------------------------

--
-- Table structure for table `HINHANH`
--

CREATE TABLE IF NOT EXISTS `HINHANH` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `TENANH` text COLLATE utf8_unicode_ci,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=22 ;

--
-- Dumping data for table `HINHANH`
--

INSERT INTO `HINHANH` (`ID`, `TENANH`) VALUES
(0, 'chua-co-anh.gif'),
(1, 'Asus-Transformer-Trio-TX201LA-bo-ban-hang-355x220-chuan.jpg'),
(2, 'iPad-Air-bo-ban-hang-355x220-chuan.jpg'),
(3, 'Acer-Aspire-E1-432-bo-ban-hang-355x220-chuan.jpg'),
(4, 'Lenovo-G40-bo-ban-hang-355x220-chuan.jpg'),
(5, '2631_2700.jpg'),
(6, 'default-avatar.png'),
(7, 'avatar_kelvinlee.jpeg'),
(8, 'text.jpg'),
(9, 'text2.jpg'),
(10, 'Gemini.jpg'),
(11, 'avatars-000028039619-s41c0e-t500x500.jpg'),
(12, 'avatar1.jpg'),
(13, 'pro-ac-1.png'),
(14, 'follower-avatar.jpg'),
(15, 'ring.jpg'),
(16, 'product3.png'),
(17, 'pro-ac-2.png'),
(18, 'avatar-mini.jpg'),
(19, 'Kakashi.jpg'),
(20, 'Itachi.png'),
(21, '');

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
  `HINHDAIDIEN` int(11) DEFAULT '6',
  PRIMARY KEY (`ID`),
  KEY `NGUOIDUNG_TO_QUYEN` (`QUYEN`),
  KEY `NGUOIDUNG_TO_TINHTHANH` (`TINHTHANH`),
  KEY `NGUOIDUNG_TO_HINHANH` (`HINHDAIDIEN`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=35 ;

--
-- Dumping data for table `NGUOIDUNG`
--

INSERT INTO `NGUOIDUNG` (`ID`, `HODEM`, `TENNGUOIDUNG`, `TENDANGNHAP`, `MATKHAU`, `EMAIL`, `NGAYSINH`, `DIACHI`, `TINHTHANH`, `GIOITINH`, `CMND`, `SDT`, `QUYEN`, `TRANGTHAI`, `HINHDAIDIEN`) VALUES
(1, 'Lee', 'Kelvin', 'kelvinlee', '15920c7a701670e5a436b86b41fcc0d7', 'kelvinlee@hotmail.com.vn', '1993-06-13', 'Trường Chinh, Tây Thạnh', 5, 1, '341638370', '01694662923', 1, 1, 7),
(2, 'Nguyễn Ngọc', 'Hiếu', 'hieu1993', 'e10adc3949ba59abbe56e057f20f883e', 'hieu@gmail.com', '1993-01-30', 'Đà Lạt', 36, 1, '123456789', '0935574611', 2, 1, 6),
(3, 'Nguyễn Nhân', 'Ái', 'nhanai', 'e10adc3949ba59abbe56e057f20f883e', 'nhanai@yahoo.com.vn', '1993-10-08', 'Mỏ Cày', 12, 1, '376953625', '09191512771', 0, 1, 6),
(4, 'Nguyễn Tấn', 'Phát', 'phatnguyen', 'e10adc3949ba59abbe56e057f20f883e', 'phatng@yahoo.com', '1991-12-15', 'TP. Cao Lãnh', 23, 1, '867560152', '01234553613', 0, 0, 6),
(5, 'Lê Thanh', 'Diệp', 'thanhdiep', '15920c7a701670e5a436b86b41fcc0d7', 'kelvinlee.it@gmail.com', '1993-06-13', 'TP. Sa Đéc', 23, 1, '341637371', '01236977759', 1, 1, 6),
(6, 'Trần Thị Kim', 'Xuyến', 'kxuyen90', 'e10adc3949ba59abbe56e057f20f883e', 'kimxuyen@gmail.com', '1990-03-14', '', 7, 0, '340154786', '01227538572', 0, 0, 6),
(7, 'Lê Tấn', 'Lộc', 'locle994', 'e10adc3949ba59abbe56e057f20f883e', 'leloc94@gmail.com', '1994-07-28', '', 14, 1, '340559513', '0972373232', 0, 1, 6),
(8, 'Nguyễn Phúc', 'Hậu', 'phquynh', 'e10adc3949ba59abbe56e057f20f883e', 'phuchau80@gmail.com', '1993-10-30', '', 39, 1, '341096314', '01685498401', 2, 1, 20),
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
(22, 'Nguyễn Ngọc', 'Quyên', 'ngocquyen12', 'e10adc3949ba59abbe56e057f20f883e', 'ngocquyen12@gmail.com', '1993-12-12', 'Quận 3', 5, 1, '341998154', '0918185141', 0, 1, 10),
(23, 'Lý Kim', 'Nhã', 'kimnha90', 'e10adc3949ba59abbe56e057f20f883e', 'kimnha90@gmail.com', '1990-09-13', '', 3, 0, '', '', 0, 1, 11),
(24, 'Lê Nguyễn Như', 'Huỳnh', 'huynhle89', 'e10adc3949ba59abbe56e057f20f883e', 'huynhle89@gmail.com', '1989-09-19', '', 1, 1, '', '', 0, 1, 6),
(25, 'Nguyễn Kim', 'Hồng', 'kimhong93', 'e10adc3949ba59abbe56e057f20f883e', 'kimhong93@gmail.com', '1993-09-13', '', 5, 0, '', '', 0, 1, 12),
(26, 'Phan Thúy', 'Vy', 'thuyvyphan', 'e10adc3949ba59abbe56e057f20f883e', 'thuyvyphan@yahoo.com', '1993-11-18', 'Quận 7', 5, 1, '', '', 0, 1, 13),
(27, 'Vũ Văn', 'Long', 'wind_dragon_92', 'e10adc3949ba59abbe56e057f20f883e', 'wind_dragon_92@gmail.com', '1992-10-12', '', 5, 1, '', '', 0, 1, 14),
(28, 'Huỳnh', 'Khánh', 'khanh_huynh', 'e10adc3949ba59abbe56e057f20f883e', 'khanh_huynh@yahoo.com', '1993-02-02', '', 7, 1, '', '', 0, 1, 15),
(29, 'Phan Trọng', 'Trí', 'trongtri93', 'e10adc3949ba59abbe56e057f20f883e', 'trongtri93@gmail.com', '1993-04-14', '', 16, 1, '', '', 0, 1, 16),
(30, 'Bùi Thanh', 'Tuấn', 'tuanbui_90', 'e10adc3949ba59abbe56e057f20f883e', 'tuanbui_90@gmail.com', '1990-09-19', '', 5, 1, '', '', 0, 1, 6),
(31, 'Trịnh Thái', 'Hoàng', 'thaihoangtrinh', 'e10adc3949ba59abbe56e057f20f883e', 'thaihoangtrinh@yahoo.com', '1993-12-12', '', 5, 1, '', '', 0, 1, 6),
(32, 'Nguyễn Thái', 'Như', 'nhu_nguyen93', 'e10adc3949ba59abbe56e057f20f883e', 'nhu_nguyen93@yahoo.com', '1993-09-18', '', 5, 1, '', '', 0, 1, 17),
(33, 'Nguyễn Trung', 'Hậu', 'hau_trung', 'e10adc3949ba59abbe56e057f20f883e', 'hau_trung@gmail.com', '1988-09-19', '', 56, 1, '', '', 0, 1, 18),
(34, 'Nguyễn Phan', 'Phi', 'phanphi87', 'e10adc3949ba59abbe56e057f20f883e', 'phanphi87@gmail.com', '1987-04-17', '', 10, 1, '', '', 0, 1, 19);

-- --------------------------------------------------------

--
-- Table structure for table `NHACUNGCAP`
--

CREATE TABLE IF NOT EXISTS `NHACUNGCAP` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `TENNCC` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=9 ;

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
(8, 'LENOVO');

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
  `TINHTRANG` int(11) NOT NULL DEFAULT '1',
  `LUOTXEM` bigint(20) NOT NULL DEFAULT '0',
  `LUOTMUA` bigint(20) NOT NULL DEFAULT '0',
  PRIMARY KEY (`ID`),
  KEY `SANPHAM_TO_LOAI` (`LOAI`) USING BTREE,
  KEY `SANPHAM_TO_NCC` (`NHACUNGCAP`) USING BTREE,
  KEY `SANPHAM_TO_HINH` (`HINHDAIDIEN`) USING BTREE
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=6 ;

--
-- Dumping data for table `SANPHAM`
--

INSERT INTO `SANPHAM` (`ID`, `TENSANPHAM`, `LOAI`, `NHACUNGCAP`, `SOLUONG`, `HINHDAIDIEN`, `MOTA`, `DONGIA`, `TINHTRANG`, `LUOTXEM`, `LUOTMUA`) VALUES
(1, 'Asus Transformer Trio TX201LA', 1, 2, 150, 1, 'Đây là một sản phẩm công nghệ cao 3 trong 1 mới của Asus, sản phẩm này được kỳ vọng sẽ mang lại một là làn gió mới cho công nghệ cao năm 2013.', 22890000, 1, 0, 0),
(2, 'iPad Air Cellular 128GB', 1, 7, 60, 2, 'iPad Air có những cải tiến về công nghệ táo bạo, mang đến cho người dùng những trải nghiệm tuyệt vời nhất, Apple đã làm nó xứng đáng với tên gọi “iPad Air”, khẳng định vị thế số một trên thị trường máy tính bảng của hãng.', 21990000, 1, 0, 0),
(3, 'Acer Aspire E1 432 29552G50Dn', 2, 1, 120, 3, 'Aspire E1 432 hấp dẫn người dùng với thiết kế thời trang nhỏ gọn hơn các dòng sản phẩm trước, hiệu năng ổn định đáp ứng hầu hết các nhu cầu cơ bản của bạn như xem phim, lướt web, nghe nhạc,…', 6290000, 1, 0, 0),
(4, 'Lenovo G40 P3552G50', 2, 8, 0, 4, 'Lenovo G40 P3552G50 mang trong mình sức mạnh của bộ xử lý Pentium Haswell mới nhất của Intel đáp ứng nhu cầu sử dụng hằng ngày của người dùng – một sản phẩm nhắm đến những người có thu nhập còn hạn hẹp.', 7090000, 1, 0, 0),
(5, 'Dell Vostro 270 T222706', 3, 3, 0, 5, NULL, 6400000, 1, 0, 0);

--
-- Triggers `SANPHAM`
--
DROP TRIGGER IF EXISTS `INSERT_INTO_DANHGIA`;
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
  `user_data` text COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`session_id`),
  KEY `last_activity_idx` (`last_activity`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `SESSION`
--

INSERT INTO `SESSION` (`session_id`, `ip_address`, `user_agent`, `last_activity`, `user_data`) VALUES
('35e7b22113c27c6b380141358ea393cd', '127.0.0.1', 'Mozilla/5.0 (Windows NT 6.3; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/34.0.1847.131 Safari/537.36', 1399782604, 'a:10:{s:9:"user_data";s:0:"";s:2:"un";s:9:"kelvinlee";s:2:"bm";s:6:"FlatPC";s:2:"lg";b:1;s:14:"danhgia_action";s:1:"1";s:15:"binhluan_action";s:1:"1";s:13:"tintuc_action";s:1:"1";s:14:"dathang_action";s:1:"1";s:10:"order_list";a:3:{i:0;s:1:"1";i:1;s:1:"2";i:2;s:1:"3";}s:16:"nguoidung_action";s:1:"1";}'),
('b6b44aec43c2cd8ac67f4774d7d8e391', '127.0.0.1', 'Mozilla/5.0 (Windows NT 6.3; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/34.0.1847.131 Safari/537.36', 1399768477, 'a:6:{s:9:"user_data";s:0:"";s:2:"un";s:9:"kelvinlee";s:2:"bm";s:6:"FlatPC";s:2:"lg";b:1;s:10:"order_list";b:0;s:14:"dathang_action";s:1:"1";}'),
('ebf646b27711a4ac40f0fa0604754ab5', '127.0.0.1', 'Mozilla/5.0 (Windows NT 6.3; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/34.0.1847.131 Safari/537.36', 1399822239, 'a:10:{s:9:"user_data";s:0:"";s:2:"un";s:9:"kelvinlee";s:2:"bm";s:6:"FlatPC";s:2:"lg";b:1;s:14:"dathang_action";s:1:"1";s:10:"order_list";a:1:{i:0;s:1:"1";}s:16:"nguoidung_action";s:1:"1";s:14:"danhgia_action";s:1:"1";s:15:"binhluan_action";s:1:"1";s:13:"tintuc_action";s:1:"1";}');

-- --------------------------------------------------------

--
-- Table structure for table `THONGTINDATHANG`
--

CREATE TABLE IF NOT EXISTS `THONGTINDATHANG` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
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
  `TONGTIEN` bigint(20) DEFAULT NULL,
  PRIMARY KEY (`ID`),
  KEY `TTDT2_TO_NGUOIDUNG` (`NGUOILAPDON`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=13 ;

--
-- Dumping data for table `THONGTINDATHANG`
--

INSERT INTO `THONGTINDATHANG` (`ID`, `NGAYDATHANG`, `NGAYTHANHTOAN`, `TENKHACHHANG`, `SDTKHACHHANG`, `TENNGUOINHAN`, `SDTNGUOINHAN`, `DIACHI`, `PTTHANHTOAN`, `PTVANCHUYEN`, `THANHTIEN`, `TINHTRANG`, `GIAMGIA`, `NGUOILAPDON`, `TONGTIEN`) VALUES
(10, '2014-05-10 17:14:12', NULL, 'Kelvin Lee', '01694662923', 'ABCD', '01694662924', 'An Hòa, Sa Đéc, Đồng Tháp', 0, 0, 51170000, 1, NULL, 1, 56287000),
(11, '2014-05-11 07:36:53', NULL, 'Ngọc', '0919351168', 'Kelvin Lee', '01694662923', 'An Hòa, Sa Đéc, Đồng Tháp', 0, 0, 3455490000, 2, NULL, 1, 3801039000),
(12, '2014-05-11 21:24:32', NULL, 'Test khách 1', '01694662923', 'Test nhận 1', '01694662924', NULL, 0, 1, 51170000, 2, NULL, 1, 56287000);

-- --------------------------------------------------------

--
-- Table structure for table `TINHTHANH`
--

CREATE TABLE IF NOT EXISTS `TINHTHANH` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `TENTINHTHANH` varchar(255) NOT NULL DEFAULT '',
  PRIMARY KEY (`ID`)
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
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `TIEUDE` text COLLATE utf8_unicode_ci,
  `LOAITIN` int(11) DEFAULT '1',
  `MOTA` text COLLATE utf8_unicode_ci,
  `NOIDUNG` longtext COLLATE utf8_unicode_ci,
  `NGAYDANG` datetime DEFAULT NULL,
  `HINH` int(11) DEFAULT '0',
  `TACGIA` int(11) DEFAULT NULL,
  `TINHTRANG` int(11) DEFAULT '0',
  PRIMARY KEY (`ID`),
  KEY `TINTUC_TO_LOAITINTUC` (`LOAITIN`),
  KEY `TINTUC_TO_NGUOIDUNG` (`TACGIA`),
  KEY `TINTUC_TO_HINHANH` (`HINH`)
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
(6, 'Moto G và Nexus 5: Smartphone giá rẻ nào đáng mua nhất?', 1, 'Nexus 5 với cấu hình khủng, chạy Android mới nhất và giá cả đặc biệt hợp lý. Motorola tung ra Moto G giá rẻ và dường như để dành cho thị trường thấp hơn. Vậy điện thoại nào đáng mua nhất?', '', '2013-11-14 05:30:00', 0, 1, 1),
(7, 'iPad Air hay Galaxy Note 10.1 2014 hoàn hảo hơn?', 2, 'Nếu nói đến phân khúc máy tính bảng màn hình lớn và cao cấp thì iPad Air và Samsung Galaxy Note 10.1 2014 là hai cái tên đáng để quan tâm nhất hiện nay. Vậy giữa hai chiếc máy tính bảng này, thiết bị nào đáng để sở hữu hơn?', '<h2 style="margin-bottom: 0in; font-size: 12px; line-height: 100%; text-align: justify;">\r\n	<strong>Nếu n&oacute;i đến ph&acirc;n kh&uacute;c m&aacute;y t&iacute;nh bảng m&agrave;n h&igrave;nh lớn v&agrave; cao cấp th&igrave; <a href="http://www.thegioididong.com/may-tinh-bang/apple-ipad-air-16gb-wifi" target="_blank" title="Apple iPad Air 16GB/Wifi">iPad Air</a> v&agrave; <a href="http://www.thegioididong.com/may-tinh-bang/samsung-galaxy-note-101-2014" target="_blank" title="Samsung Galaxy Note 10.1 - 2014 Edition">Samsung Galaxy Note 10.1 2014</a> l&agrave; hai c&aacute;i t&ecirc;n đ&aacute;ng để quan t&acirc;m nhất hiện nay. Vậy giữa hai chiếc m&aacute;y t&iacute;nh bảng n&agrave;y, thiết bị n&agrave;o đ&aacute;ng để sở hữu hơn?</strong></h2>\r\n<p style="margin-bottom: 0in; text-align: justify;">\r\n	<strong>Thiết kế</strong></p>\r\n<p style="margin-bottom: 0in; text-align: justify;">\r\n	<strong>Galaxy Note 10.1 2014 Edition</strong> kh&ocirc;ng phải l&agrave; kh&ocirc;ng c&oacute; những thay đổi trong thiết kế so với phi&ecirc;n bản trước, thực sự l&agrave; n&oacute; mỏng hơn v&agrave; trong cứng c&aacute;p hơn tuy nhi&ecirc;n n&oacute; vẫn được l&agrave;m bằng nhựa v&agrave; c&oacute; th&ecirc;m một lớp vỏ giả da ở mặt sau. Điều n&agrave;y kh&ocirc;ng c&oacute; nghĩa l&agrave; Note 10.1 2014 xấu nhưng n&oacute; chỉ cho thấy Note 10.1 2014 chưa thực sự cao cấp như lớp vỏ bằng kim loại của iPad Air.</p>\r\n<p style="margin-bottom: 0in; text-align: justify;">\r\n	<img alt="iPad Air có thiết kế nổi bật hơn" src="http://cdn.tgdd.vn/Files/2013/11/19/523325/ImageAttach/Apple-iPad-Air-vs-Samsung-Galaxy-Note-10.1-2014-Edition-002-20131119113313.jpg" style="width: 600px; height: 450px;" /></p>\r\n<p style="margin-bottom: 0in; text-align: justify;">\r\n	<em>iPad Air c&oacute; thiết kế nổi bật hơn</em></p>\r\n<p style="margin-bottom: 0in; text-align: justify;">\r\n	Trong thực tế th&igrave; lớp vỏ hộp kim của <strong>iPad Air</strong> kh&ocirc;ng chỉ gi&uacute;p cho chiếc m&aacute;y t&iacute;nh bảng của Apple trong sang trọng m&agrave; n&oacute; c&ograve;n gi&uacute;p cho Air mỏng v&agrave; nhẹ hơn so với Note 10.1 2014. Chiếc iPad mới n&agrave;y chỉ nặng khoảng 478g so với 547g của Note 10.1 2014 v&agrave; chỉ d&agrave;y khoảng 7.5 mm so với 7.9 mm của Note. Điều n&agrave;y cho ph&eacute;p người d&ugrave;ng c&oacute; thể sử dụng iPad Air l&acirc;u m&agrave; &iacute;t c&oacute; cảm gi&aacute;c bị mỏi.</p>\r\n<p style="margin-bottom: 0in; text-align: justify;">\r\n	<img alt="iPad Air mỏng hơn Note 10.1 2014" src="http://cdn.tgdd.vn/Files/2013/11/19/523325/ImageAttach/Apple-iPad-Air-vs-Samsung-Galaxy-Note-10.1-2014-Edition-009-20131119113330.jpg" style="width: 600px; height: 450px;" /></p>\r\n<p style="margin-bottom: 0in; text-align: justify;">\r\n	<em>iPad Air mỏng hơn Note 10.1 2014</em></p>\r\n<p style="margin-bottom: 0in; text-align: justify;">\r\n	D&ugrave; sao, cũng c&oacute; một điều nổi bật trong thiết kế Galaxy Note 10.1 2014 l&agrave; n&oacute; c&oacute; khe cắm thẻ nhớ microSD v&agrave; tạo điều kiện cho những ai muốn mở rộng bộ nhớ trong của thiết bị n&agrave;y.</p>\r\n<p style="margin-bottom: 0in; text-align: justify;">\r\n	<strong>M&agrave;n h&igrave;nh hiển thị</strong></p>\r\n<p style="margin-bottom: 0in; text-align: justify;">\r\n	C&oacute; một sự kh&aacute;c biệt nhỏ giữa k&iacute;ch thước của m&agrave;n h&igrave;nh của hai chiếc m&aacute;y t&iacute;nh bảng đ&aacute;ng y&ecirc;u n&agrave;y. Trong khi iPad Air chỉ c&oacute; m&agrave;n h&igrave;nh 9,7 inch th&igrave; Galaxy Note 10.1 2014 lại hơi lớn hơn một ch&uacute;t với m&agrave;n h&igrave;nh 10,1 inch. Độ ph&acirc;n giải m&agrave;n h&igrave;nh của <strong>iPad Air</strong> cũng thấp hơn Note 10.1 khi chỉ c&oacute; 2048 x 1536 pixel (Note 10.1 l&agrave; 2560 x 1600 pixel) v&agrave; mật độ điểm ảnh cũng thấp hơn chỉ 264 ppi (Note 10.1 l&agrave; 299 ppi).</p>\r\n<p style="margin-bottom: 0in; text-align: justify;">\r\n	<img alt="Màn hình cả hai điều khá tốt" src="http://cdn.tgdd.vn/Files/2013/11/19/523325/ImageAttach/Apple-iPad-Air-vs-Samsung-Galaxy-Note-10-1.1-2014-Edition-001-20131119113346.jpg" style="width: 600px; height: 450px;" /></p>\r\n<p style="margin-bottom: 0in; text-align: justify;">\r\n	<em>M&agrave;n h&igrave;nh cả hai điều kh&aacute; tốt</em></p>\r\n<p style="margin-bottom: 0in; text-align: justify;">\r\n	Cũng cần phải nhớ rằng m&agrave;n h&igrave;nh của iPad Air vẫn đ&uacute;ng với tỉ lệ 4:3 rất thuận tiện để duyệt v&agrave; đọc web, trong khi <strong>Note 10.1</strong> c&oacute; m&agrave;n h&igrave;nh theo tỉ lệ 16:9 c&oacute; thể ph&ugrave; hợp với việc tr&igrave;nh chiếu video. Trong khi cả hai m&agrave;n h&igrave;nh đều sử dụng c&ocirc;ng nghệ LCD th&igrave; m&agrave;u sắc của iPad Air thực tế hơn v&agrave; c&acirc;n bằng hơn so với Note 10.1 2014, chiếc m&aacute;y t&iacute;nh bảng của Samsung c&oacute; xuất hiện hiện tượng &aacute;m xanh.</p>\r\n<p style="margin-bottom: 0in; text-align: justify;">\r\n	<strong>Giao diện</strong></p>\r\n<p style="margin-bottom: 0in; text-align: justify;">\r\n	Được trang bị hệ điều h&agrave;nh iOS 7.0.3, iPad Air đi k&egrave;m với một giao diện người d&ugrave;ng tươi v&agrave; vui vẻ, giao diện n&agrave;y cũng đơn giản hơn so với giao diện TouchWiz của Note 10.1, v&igrave; n&oacute; chỉ giới thiệu một mạng lưới c&aacute;c biểu tượng ứng dụng v&agrave; kh&ocirc;ng ph&acirc;n biệt m&agrave;n h&igrave;nh ch&iacute;nh với menu ứng dụng.</p>\r\n<p style="margin-bottom: 0in; text-align: justify;">\r\n	<img alt="Giao diện iOS 7 trên iPad Air" src="http://cdn.tgdd.vn/Files/2013/11/19/523325/ImageAttach/Apple-iPad-Air-Review-031-UI-20131119113411.jpg" style="width: 600px; height: 800px;" /></p>\r\n<p style="margin-bottom: 0in; text-align: justify;">\r\n	<em>Giao diện iOS 7 tr&ecirc;n iPad Air</em></p>\r\n<p style="margin-bottom: 0in; text-align: justify;">\r\n	Trong khi đ&oacute; Galaxy Note 10.1 2014 Edition, hiện đang chạy hệ điều h&agrave;nh Android 4.3 với giao diện Touch Wiz Nature UX, c&oacute; thể n&oacute;i Samsung đ&atilde; đem gần như mọi thứ l&ecirc;n giao diện của m&igrave;nh v&agrave; tận dụng tối đa ưu thế của m&agrave;n h&igrave;nh lớn để trung b&agrave;y c&aacute;c ứng dụng v&agrave; widget.</p>\r\n<p style="margin-bottom: 0in; text-align: justify;">\r\n	Trong thực tế th&igrave; Note 10.1 c&oacute; h&agrave;ng t&aacute; c&aacute;c thiết lập b&ecirc;n trong m&agrave; hầu hết người d&ugrave;ng sẽ kh&ocirc;ng d&ugrave;ng đến. TouchWiz l&agrave; một giao diện linh hoạt nhưng trong thực tế th&igrave; n&oacute; kh&aacute; lộn xộn v&agrave; hơi bị tốn thời gian để t&igrave;m hiểu.</p>\r\n<p style="margin-bottom: 0in; text-align: justify;">\r\n	<img alt="Giao diện TouchWiz trên Note 10.1 2014" src="http://cdn.tgdd.vn/Files/2013/11/19/523325/ImageAttach/Samsung-Galaxy-Note-10.1-2014-Review-029-UI-20131119113442.jpg" style="width: 600px; height: 375px;" /></p>\r\n<p style="margin-bottom: 0in; text-align: justify;">\r\n	<em>Giao diện TouchWiz tr&ecirc;n Note 10.1 2014</em></p>\r\n<p style="margin-bottom: 0in; text-align: justify;">\r\n	B&ugrave; lại, b&uacute;t S-Pen th&ocirc;ng minh c&ugrave;ng với <strong>t&iacute;nh năng Air Command</strong> sẽ gi&uacute;p &iacute;ch kh&aacute; nhiều cho bạn nếu như bạn th&iacute;ch ghi ch&eacute;p v&agrave; l&agrave;m việc với m&aacute;y t&iacute;nh bảng tương tự như với giấy v&agrave; b&uacute;t th&ocirc;ng thường.</p>\r\n<p style="margin-bottom: 0in; text-align: justify;">\r\n	<img alt="Bút S-Pen giúp làm việc nhanh hơn" src="http://cdn.tgdd.vn/Files/2013/11/19/523325/ImageAttach/Samsung-Galaxy-Note-10_1-2014-edition-Air-command1-20131119113524.jpg" style="width: 600px; height: 347px;" /></p>\r\n<p style="margin-bottom: 0in; text-align: justify;">\r\n	<em>B&uacute;t S-Pen gi&uacute;p l&agrave;m việc nhanh hơn</em></p>\r\n<p style="margin-bottom: 0in; text-align: justify;">\r\n	<strong>Cấu h&igrave;nh phần cứng</strong></p>\r\n<p style="margin-bottom: 0in; text-align: justify;">\r\n	Với chip A7 64-bit, Apple iPad Air c&oacute; thể chạy một c&aacute;ch mượt m&agrave; v&agrave; l&agrave;m cho hiệu suất sử dụng tổng thể kh&aacute; tuyệt vời. Mặc d&ugrave; chip A7 chỉ l&agrave; l&otilde;i k&eacute;p v&agrave; c&oacute; tốc độ xung nhịp chỉ 1,4 Ghz nhưng bộ xử l&yacute; đồ hoạ G6430 PowerVR được đ&aacute;nh gi&aacute; kh&aacute; cao do c&oacute; thể &ldquo;g&aacute;nh&rdquo; nổi m&agrave;n h&igrave;nh khủng.</p>\r\n<p style="margin-bottom: 0in; text-align: justify;">\r\n	Trong khi đ&oacute;, Note 10.1 2014 c&oacute; hai phi&ecirc;n bản, phi&ecirc;n bản chạy chip 8 nh&acirc;n của Samsung v&agrave; bản chạy chip Snapdragon 800. Mặc d&ugrave; phi&ecirc;n bản chạy chip 8 nh&acirc;n của Samsung l&agrave; bản quốc tế v&agrave; th&ocirc;ng dụng hơn nhưng trong b&agrave;i viết n&agrave;y, phi&ecirc;n bản Snapdragon 800 mới l&agrave; đối tượng ch&iacute;nh.</p>\r\n<p style="margin-bottom: 0in; text-align: justify;">\r\n	<img alt="iPad Air nhanh hơn Galaxy Note 10.1 2014" src="http://cdn.tgdd.vn/Files/2013/11/19/523325/ImageAttach/ScreenShot2013-11-19at11.24.27AM-20131119113632.jpg" style="width: 600px; height: 300px;" /></p>\r\n<p style="margin-bottom: 0in; text-align: justify;">\r\n	<em>iPad Air nhanh hơn Galaxy Note 10.1 2014</em></p>\r\n<p style="margin-bottom: 0in; text-align: justify;">\r\n	Tr&ecirc;n l&yacute; thuyết, phi&ecirc;n bản chạy chip Snapdragon 800 bốn nh&acirc;n xung nhịp 2,3 GHz v&agrave; GPU Adreno 330 nhanh hơn so với chip của Apple nhưng do giao diện TouchWiz, phi&ecirc;n bản n&agrave;y cũng &iacute;t nhiều bị chậm lại nhưng vẫn đỡ hơn so với bản chạy chip 8 nh&acirc;n của Samsung.</p>\r\n<p style="margin-bottom: 0in; text-align: justify;">\r\n	Một ưu điểm kh&aacute;c về cấu h&igrave;nh của Note 10.1 2014 l&agrave; n&oacute; c&oacute; RAM l&ecirc;n tới 3GB thay v&igrave; chỉ 1 GB như Apple iPad Air. Tuy nhi&ecirc;n c&aacute;c kết quả đo cấu h&igrave;nh cho thấy Note 10.1 2014 bị &ldquo;hụt hơi&rdquo; so với iPad Air.</p>\r\n<p style="margin-bottom: 0in; text-align: justify;">\r\n	<strong>Camera</strong></p>\r\n<p style="margin-bottom: 0in; text-align: justify;">\r\n	Apple thường kh&ocirc;ng mấy quan t&acirc;m đến camera tr&ecirc;n iPad do đ&oacute; so với camera đi k&egrave;m với độ ph&acirc;n giải 8MP v&agrave; đ&egrave;n Flash LED của Note 10.1 2014, camera của iPad tỏ ra kh&aacute; yếu thế. B&ecirc;n cạnh đ&oacute; ứng dụng chụp ảnh mặc định của iPad Air kh&aacute; nh&agrave;m ch&aacute;n do kh&ocirc;ng c&oacute; nhiều tuy chỉnh trong khi về ph&iacute;a Note 10.1 2014, c&oacute; h&agrave;ng t&aacute; th&ocirc;ng số để người d&ugrave;ng chọn lựa v&agrave; n&oacute; cũng c&oacute; nhiều chế độ chụp như chụp đ&ecirc;m, chụp Panorama v&agrave; cả chụp HDR.</p>\r\n<p style="margin-bottom: 0in; text-align: justify;">\r\n	<img alt="Ảnh chụp từ camera của iPad Air" src="http://cdn.tgdd.vn/Files/2013/11/19/523325/ImageAttach/Apple-iPad-Air-20131119113659.jpg" style="width: 600px; height: 448px;" /></p>\r\n<p style="margin-bottom: 0in; text-align: justify;">\r\n	<em>Ảnh chụp từ camera của iPad Air</em></p>\r\n<p style="margin-bottom: 0in; text-align: justify;">\r\n	<img alt="Ảnh chụp từ camera của Note 10.1 2014" src="http://cdn.tgdd.vn/Files/2013/11/19/523325/ImageAttach/Samsung-GALAXY-Note-10.1-2014-Edition-20131119113714.jpg" style="width: 600px; height: 450px;" /></p>\r\n<p style="margin-bottom: 0in; text-align: justify;">\r\n	<em>Ảnh chụp từ camera của Note 10.1 2014</em></p>\r\n<p style="margin-bottom: 0in; text-align: justify;">\r\n	<img alt="iPad Air không có đèn Flash" src="http://cdn.tgdd.vn/Files/2013/11/19/523325/ImageAttach/Apple-iPad-Air-vs-Samsung-Galaxy-Note-10.1-2014-Edition-003-20131119113734.jpg" style="width: 600px; height: 450px;" /></p>\r\n<p style="margin-bottom: 0in; text-align: justify;">\r\n	<em>iPad Air kh&ocirc;ng c&oacute; đ&egrave;n Flash</em></p>\r\n<p style="margin-bottom: 0in; text-align: justify;">\r\n	<strong>Pin</strong></p>\r\n<p style="margin-bottom: 0in; text-align: justify;">\r\n	Mặc d&ugrave; l&agrave; mỏng hơn rất nhiều so với người tiền nhiệm của n&oacute;, iPad Air vẫn giữ được thời lượng pin tuyệt vời với một vi&ecirc;n pin 8820 mAh b&ecirc;n trong kh&ocirc;ng thể th&aacute;o rời. Người d&ugrave;ng c&oacute; thể d&ugrave;ng chiếc m&aacute;y t&iacute;nh bảng của Apple cả một ng&agrave;y.</p>\r\n<p style="margin-bottom: 0in; text-align: justify;">\r\n	<img alt="Thời lượng pin có thể ngang nhau" src="http://cdn.tgdd.vn/Files/2013/11/19/523325/ImageAttach/7AD0B561E8BE122DECAE402E09B7B985-20131119114016.jpg" style="width: 600px; height: 451px;" /></p>\r\n<p style="margin-bottom: 0in; text-align: justify;">\r\n	<em>Thời lượng pin c&oacute; thể ngang nhau</em></p>\r\n<p style="margin-bottom: 0in; text-align: justify;">\r\n	Về ph&iacute;a Note 10.1 2014, pin của chiếc m&aacute;y t&iacute;nh bảng n&agrave;y chỉ c&oacute; dung lượng l&agrave; 8220 mAh b&ecirc;n cạnh đ&oacute; n&oacute; cũng c&oacute; m&agrave;n h&igrave;nh to hơn v&agrave; độ ph&acirc;n giải cao hơn iPad Air n&ecirc;n c&oacute; vẻ như sẽ c&oacute; thời gian d&ugrave;ng thấp hơn m&aacute;y t&iacute;nh bảng của Apple.</p>\r\n<p style="margin-bottom: 0in; text-align: justify;">\r\n	<strong>Kết luận</strong></p>\r\n<p style="margin-bottom: 0in; text-align: justify;">\r\n	Cả hai mẫu m&aacute;y t&iacute;nh bảng dường như kh&aacute; ngang t&agrave;i ngang sức v&agrave; đều c&oacute; một thế mạnh ri&ecirc;ng. Nếu bạn th&iacute;ch sự lịch l&atilde;m, sang trọng v&agrave; ổn định, iPad Air l&agrave; sự lựa chọn hợp l&yacute; d&agrave;nh cho bạn. C&ograve;n nếu như bạn th&iacute;ch sự mạnh mẽ, khả năng linh hoạt cũng như c&oacute; thể tuỳ biến giao diện dễ d&agrave;ng, Galaxy Note 10.1 2014 l&agrave; một lựa chọn kh&ocirc;ng tồi.</p>\r\n<p style="margin-bottom: 0in; text-align: justify;">\r\n	Nhưng d&ugrave; l&agrave; iPad Air hay Note 10.1 2014 th&igrave; nếu sở hữu một trong hai chiếc m&aacute;y t&iacute;nh bảng n&agrave;y th&igrave; bạn cũng đ&atilde; chạm tay đến được những c&ocirc;ng nghệ tin tiến nhất tr&ecirc;n m&aacute;y t&iacute;nh bảng.</p>\r\n', '2013-11-19 00:00:00', 0, 2, 2),
(8, 'BlackBerry Z50 lõi tứ màn hình full HD sẽ ra mắt Quý 3/2014', 2, 'BlackBerry dự kiến trình làng chiếc điện thoại Z50 vào Quý 3 2014. Đây sẽ là chiếc smartphone đầu tiên mà hãng tích hợp vi xử lý lõi tứ SoC cùng với panel màn hình độ phân giải 1080pixel. ', '<h2 style="text-align: justify; font-size: 12px; line-height: 100%;">\r\n	<strong>BlackBerry dự kiến tr&igrave;nh l&agrave;ng chiếc điện thoại Z50 v&agrave;o Qu&yacute; 3 2014. Đ&acirc;y sẽ l&agrave; chiếc smartphone đầu ti&ecirc;n m&agrave; h&atilde;ng t&iacute;ch hợp vi xử l&yacute; l&otilde;i tứ SoC c&ugrave;ng với panel m&agrave;n h&igrave;nh độ ph&acirc;n giải 1080pixel. </strong></h2>\r\n<p style="text-align: justify;">\r\n	Ngo&agrave;i ra, <strong>BlackBerry Z50</strong> c&ograve;n được trang bị m&agrave;n h&igrave;nh cảm ứng full HD k&iacute;ch thước 5,2 inch v&agrave;&nbsp;tương lai n&oacute;&nbsp;sẽ thay thế cho những chiếc <a href="http://www.thegioididong.com/dtdd/blackberry-z30" target="_blank" title="Chi tiết BlackBerry Z30">Z30</a> hiện đang b&aacute;n tr&ecirc;n thị trường.</p>\r\n<p style="text-align: center;">\r\n	<img alt="BlackBerry Z10 BlackBerry Z30" src="http://cdn.tgdd.vn/Files/2013/11/19/523321/ImageAttach/BlackBerryZ10_BlackBerryZ30-2013111992526.jpg" style="width: 640px; height: 380px;" /></p>\r\n<p align="center">\r\n	<em>BlackBerry Z50 sẽ thay thế những chiếc Z30, Z10 tr&ecirc;n thị trường</em></p>\r\n<p style="text-align: justify;">\r\n	Ri&ecirc;ng thiết bị <strong>BlackBerry Q30</strong> (b&agrave;n ph&iacute;m QWERTY) sẽ ra mắt v&agrave;o Qu&yacute; 2 2014, tuy nhi&ecirc;n đến thời điểm hiện tại vẫn chưa c&oacute; bất cứ&nbsp;th&ocirc;ng tin n&agrave;o li&ecirc;n quan đến th&ocirc;ng số kỹ thuật của Q30.</p>\r\n<p style="text-align: justify;">\r\n	Mặc d&ugrave; t&igrave;nh h&igrave;nh t&agrave;i ch&iacute;nh của<strong> BlackBerry</strong> vẫn chưa c&oacute; dấu hiệu phục hồi, c&ocirc;ng ty đang trong giai đoạn t&aacute;i cấu tr&uacute;c nhưng t&acirc;n CEO John Chen vẫn tỏ ra rất lạc quan. &Ocirc;ng cho biết sẽ tiếp tục đầu tư v&agrave;o bộ phận thiết bị di động của h&atilde;ng (mặc cho n&oacute; li&ecirc;n tục gặp kh&oacute; khăn trong v&agrave;i năm qua) v&agrave; sắp tới sẽ c&oacute; th&ecirc;m nhiều sản phẩm mới được ra mắt.</p>\r\n', '2013-11-19 00:00:00', 0, 5, 0),
(9, '[Người đẹp & Công nghệ] Những đường cong gợi cảm cùng tablet', 1, 'Cùng ngắm người đẹp với những đường cong quyến rũ bên chiếc máy tính bảng.', '<div class="content-main clearfix">\r <h2 ><strong>C&ugrave;ng ngắm người đẹp với những đường cong quyến rũ b&ecirc;n chiếc <a href="http://www.thegioididong.com/may-tinh-bang" target="_blank" title="Máy tính bảng">m&aacute;y t&iacute;nh bảng</a>.</strong></h2>\r\n\r <p ><strong><img alt="Những đường cong gợi cảm cùng tablet" src="http://cdn.tgdd.vn/Files/2013/11/19/523320/ImageAttach/Hotgirl-tablet1-2013111991752.jpg"  /></strong></p>\r\n\r <p ><strong><img alt="Những đường cong gợi cảm cùng tablet" src="http://cdn.tgdd.vn/Files/2013/11/19/523320/ImageAttach/Hotgirl-tablet2-201311199186.jpg"  /></strong></p>\r\n\r <p ><strong><img alt="Những đường cong gợi cảm cùng tablet" src="http://cdn.tgdd.vn/Files/2013/11/19/523320/ImageAttach/Hotgirl-tablet3-2013111991822.jpg"  /></strong></p>\r\n\r <p ><strong><img alt="Những đường cong gợi cảm cùng tablet" src="http://cdn.tgdd.vn/Files/2013/11/19/523320/ImageAttach/Hotgirl-tablet4-2013111991831.jpg"  /></strong></p>\r\n\r <p ><strong><img alt="Những đường cong gợi cảm cùng tablet" src="http://cdn.tgdd.vn/Files/2013/11/19/523320/ImageAttach/Hotgirl-tablet5-2013111991841.jpg"  /></strong></p>\r\n\r <p ><strong><img alt="Những đường cong gợi cảm cùng tablet" src="http://cdn.tgdd.vn/Files/2013/11/19/523320/ImageAttach/Hotgirl-tablet6-2013111991852.jpg"  /></strong></p>\r\n\r <p ><strong><img alt="Những đường cong gợi cảm cùng tablet" src="http://cdn.tgdd.vn/Files/2013/11/19/523320/ImageAttach/Hotgirl-tablet7-201311199191.jpg"  /></strong></p>\r\n</div>\r\n\r\n<p>&nbsp;</p>\r\n', '2013-11-19 00:00:00', 0, 5, 1),
(10, 'Khách hàng chờ smartphone 1,45 triệu đồng', 2, 'Sau những đồn đoán sôi sục của cộng đồng mạng về chiếc “điện thoại bí ẩn”, HKPhone đã hé lộ thêm về cấu hình “có một không hai” của sản phẩm mới có giá chỉ 1,45 triệu đồng.', '<div class="summary">\r\n	<p itemprop="description">\r\n		Sau những đồn đo&aacute;n s&ocirc;i sục của cộng đồng mạng về chiếc &ldquo;điện thoại b&iacute; ẩn&rdquo;, HKPhone đ&atilde; h&eacute; lộ th&ecirc;m về cấu h&igrave;nh &ldquo;c&oacute; một kh&ocirc;ng hai&rdquo; của sản phẩm mới c&oacute; gi&aacute; chỉ 1,45 triệu đồng.</p>\r\n</div>\r\n<p>\r\n	Chỉ c&ograve;n một ng&agrave;y nữa HKPhone sẽ ch&iacute;nh thức c&ocirc;ng bố th&ocirc;ng tin về chiếc smartphone b&iacute; ẩn.</p>\r\n<p>\r\n	Sau khi bật m&iacute; về mức gi&aacute; rẻ bất ngờ chỉ 1,45 triệu đồng, h&atilde;ng tiếp tục khiến người d&ugrave;ng t&ograve; m&ograve; khi &uacute;p mở về cấu h&igrave;nh của sản phẩm mới. &Ocirc;ng Ph&iacute; Hữu Thanh Long - gi&aacute;m đốc sản phẩm của HKPhone, cho biết: &ldquo;Thời gian vừa qua, h&atilde;ng đ&atilde; nhận được rất nhiều &yacute; kiến của người d&ugrave;ng về mong muốn sở hữu sản phẩm c&oacute; mức gi&aacute; chỉ 1-2 triệu đồng nhưng vẫn đ&aacute;p ứng tốt những nhu cầu thiết yếu như một chiếc smartphone cao cấp. Ch&iacute;nh v&igrave; thế ch&uacute;ng t&ocirc;i đ&atilde; nỗ lực để ra mắt sản phẩm mới c&oacute; gi&aacute; chỉ 1,45 triệu đồng với cấu h&igrave;nh vượt trội v&agrave; duy nhất trong tầm gi&aacute;&rdquo;.</p>\r\n<p>\r\n	Rất nhiều người đang c&oacute; &yacute; định mua điện thoại phổ th&ocirc;ng đ&atilde; đổi &yacute; khi biết th&ocirc;ng tin về sản phẩm n&agrave;y. Tuấn Anh (sinh vi&ecirc;n đại học Thủy Lợi) chia sẻ: &ldquo;M&igrave;nh chỉ c&oacute; hơn một triệu để mua điện thoại n&ecirc;n t&iacute;nh mua loại n&agrave;o nghe, gọi được th&ocirc;i, c&ugrave;ng lắm th&igrave; th&ecirc;m chức năng nghe nhạc. Nhưng ngay sau khi biết HKPhone sắp ra smartphone mới chỉ 1,45 triệu th&igrave; m&igrave;nh đ&atilde; quyết định chờ sản phẩm n&agrave;y&rdquo;.</p>\r\n<table cellpadding="0" cellspacing="0" class="picture">\r\n	<tbody>\r\n		<tr>\r\n			<td class="pic">\r\n				<img alt="" src="http://img.v3.news.zdn.vn/w660/Uploaded/JAC2_N3/2013_11_18/Them_thong_tin_hot_ve_smartphone_145_trieu_cua_HKPhone_1.jpg" /></td>\r\n		</tr>\r\n		<tr>\r\n			<td class="pCaption caption">\r\n				C&aacute;c sản phẩm của HKPhone lu&ocirc;n nhận được sự ủng hộ của người d&ugrave;ng.</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n<p>\r\n	Trước đ&oacute;, những h&igrave;nh ảnh r&ograve; rỉ về chiếc smartphone gi&aacute; rẻ kỷ lục n&agrave;y đ&atilde; khiến cộng đồng mạng th&iacute;ch th&uacute;. Kh&ocirc;ng chỉ c&oacute; thiết kế trẻ trung, nhỏ gọn m&agrave; chiếc điện thoại mới của h&atilde;ng c&ograve;n c&oacute; 4 phi&ecirc;n bản m&agrave;u sắc thời thượng nhất hiện nay, gồm &nbsp;anh dương, hồng, đen v&agrave; trắng.</p>\r\n<table cellpadding="0" cellspacing="0" class="picture">\r\n	<tbody>\r\n		<tr>\r\n			<td class="pic">\r\n				<img alt="" src="http://img.v3.news.zdn.vn/w660/Uploaded/JAC2_N3/2013_11_18/Them_thong_tin_hot_ve_smartphone_145_trieu_cua_HKPhone_2.jpg" /></td>\r\n		</tr>\r\n		<tr>\r\n			<td class="pCaption caption">\r\n				Những h&igrave;nh ảnh bị r&ograve; rỉ của sản phẩm mới HKPhone.</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n<p>\r\n	Mức gi&aacute; l&yacute; tưởng kết hợp với cấu h&igrave;nh khủng, thiết kế độc đ&aacute;o ở mỗi sản phẩm lu&ocirc;n l&agrave; sở trường của thương hiệu. Từ những th&ocirc;ng tin như hiện tại, nhiều người tin rằng sản phẩm mới của h&atilde;ng sẽ kh&ocirc;ng l&agrave;m người d&ugrave;ng thất vọng.</p>\r\n<table cellpadding="0" cellspacing="0" class="picture">\r\n	<tbody>\r\n		<tr>\r\n			<td class="pic">\r\n				<img alt="" src="http://img.v3.news.zdn.vn/w660/Uploaded/JAC2_N3/2013_11_18/Them_thong_tin_hot_ve_smartphone_145_trieu_cua_HKPhone_3.jpg" /></td>\r\n		</tr>\r\n		<tr>\r\n			<td class="pCaption caption">\r\n				Thiết kế trẻ trung v&agrave; tinh tế ở chiếc HKPhone gi&aacute; 1,45 triệu hấp dẫn người d&ugrave;ng.</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n<p>\r\n	L&agrave; th&agrave;nh vi&ecirc;n diễn đ&agrave;n HKPhone, Th&ugrave;y Linh chia sẻ: &ldquo;M&igrave;nh thực sự bất ngờ bởi mức gi&aacute; m&agrave; h&atilde;ng đưa ra. Với mức gi&aacute; n&agrave;y m&agrave; sản phẩm vừa c&oacute; thiết kế đẹp c&ugrave;ng với cấu h&igrave;nh cao th&igrave; c&oacute; lẽ đ&acirc;y sẽ l&agrave; chiếc smartphone đ&aacute;ng mua nhất hiện nay ở tầm gi&aacute; dưới 2 triệu đồng&rdquo;.</p>\r\n<p>\r\n	Đại diện h&atilde;ng cũng cho biết th&ecirc;m: &ldquo;Trong ng&agrave;y ra mắt sản phẩm ch&uacute;ng t&ocirc;i sẽ c&oacute; nhiều điều bất ngờ muốn gửi tới người d&ugrave;ng, đặc biệt l&agrave; những kh&aacute;ch h&agrave;ng đầu ti&ecirc;n&rdquo;.</p>\r\n<p>\r\n	C&ugrave;ng với việc tạo ra một luồng gi&oacute; mới cho thị trường, sản phẩm n&agrave;y hứa hẹn sẽ l&agrave; một &ldquo;quả bom tấn&rdquo; với c&aacute;c đối thủ trong ph&acirc;n kh&uacute;c gi&aacute; 1-2 triệu đồng. Những th&ocirc;ng tin đầy đủ v&agrave; chi tiết về sản phẩm mới sẽ được HKPhone c&ocirc;ng bố ngay ng&agrave;y mai, 20/11.</p>\r\n', '2013-11-19 00:00:00', 0, 8, 1),
(11, 'Google sắp hỗ trợ Android chụp ảnh RAW', 2, 'Theo Arstechnica, Google đang phát triển một định dạng ảnh RAW chất lượng cao dành cho các smartphone Android, mở rộng khả năng nhiếp ảnh trên những thiết bị di động.', '<div class="summary">\r\n	<p itemprop="description">\r\n		Theo Arstechnica, Google đang ph&aacute;t triển một định dạng ảnh RAW chất lượng cao d&agrave;nh cho c&aacute;c smartphone Android, mở rộng khả năng nhiếp ảnh tr&ecirc;n những thiết bị di động.</p>\r\n</div>\r\n<div class="content" itemprop="articleBody">\r\n	<p>\r\n		Kh&ocirc;ng l&acirc;u sau khi Nokia ph&aacute;t triển định dạng RAW cho d&ograve;ng m&aacute;y Lumia cao cấp, Google cũng bắt tay v&agrave;o việc n&acirc;ng cao khả năng chụp ảnh tr&ecirc;n c&aacute;c smartphone Android. Một lập tr&igrave;nh vi&ecirc;n mang t&ecirc;n Josh Brown đ&atilde; ph&aacute;t hiện ra c&aacute;c đoạn m&atilde; tr&ecirc;n hệ điều h&agrave;nh Android cho thấy Google đ&atilde; v&agrave; đang &quot;&acirc;m thầm&quot; ph&aacute;t triển khả năng hỗ trợ ảnh RAW - định dạng kh&ocirc;ng n&eacute;n v&agrave; chưa qua xử l&yacute;, tương tự như phim &acirc;m bản tr&ecirc;n m&aacute;y phim.</p>\r\n	<table cellpadding="0" cellspacing="0" class="picture">\r\n		<tbody>\r\n			<tr>\r\n				<td class="pic">\r\n					<img alt="" src="http://img.v3.news.zdn.vn/w660/Uploaded/ynssi/2013_11_19/nexuscamera.jpg" /></td>\r\n			</tr>\r\n			<tr>\r\n				<td class="pCaption caption">\r\n					Định dạng ảnh RAW kh&ocirc;ng n&eacute;n vốn chỉ c&oacute; tr&ecirc;n c&aacute;c d&ograve;ng m&aacute;y ảnh cao cấp, nay sắp c&oacute; mặt tr&ecirc;n Android.</td>\r\n			</tr>\r\n		</tbody>\r\n	</table>\r\n	<p>\r\n		Kh&aacute;c với định dạng JPEG th&ocirc;ng thường, định dạng RAW tương tự như phim &acirc;m bản nhưng ở dạng kĩ thuật số, cho ph&eacute;p người d&ugrave;ng can thiệp s&acirc;u v&agrave;o c&aacute;c th&ocirc;ng số của bức ảnh như &aacute;nh s&aacute;ng, m&agrave;u sắc, độ chi tiết,... những điều vốn bị hạn chế khi xử l&yacute; ảnh JPEG. N&oacute;i một c&aacute;ch đơn giản, việc hỗ trợ lưu ảnh RAW tr&ecirc;n di động sẽ gi&uacute;p người d&ugrave;ng tạo ra những bức ảnh đẹp hơn trước gấp nhiều lần (nếu biết c&aacute;ch t&ugrave;y chỉnh th&ocirc;ng qua c&aacute;c ứng dụng đi k&egrave;m).</p>\r\n	<p>\r\n		Tuy chậm ch&acirc;n hơn Nokia, nhưng Google cũng kh&ocirc;ng đến nỗi qu&aacute; muộn m&agrave;ng khi c&aacute;c model Android c&oacute; camera &quot;khủng&quot; như Sony Xperia Z1 cũng chỉ mới xuất hiện tr&ecirc;n thị trường. Nếu t&iacute;nh th&ecirc;m cả hai chiếc ống k&iacute;nh c&oacute; khả năng chụp ảnh QX10 v&agrave; QX100 của Sony, định dạng ảnh RAW d&agrave;nh cho Android đ&atilde; c&oacute; &quot;đất dụng v&otilde;&quot;.</p>\r\n	<p>\r\n		Bằng việc n&acirc;ng cao khả năng chụp ảnh v&agrave; lưu ảnh của Android, Google cũng đ&atilde; g&oacute;p một nh&aacute;t dao ch&iacute; mạng v&agrave;o c&ocirc;ng nghiệp sản xuất m&aacute;y số. Những chiếc m&aacute;y ảnh du lịch nhỏ gọn gi&aacute; rẻ c&oacute; thể sẽ biến mất trong tương lai gần v&igrave; kh&ocirc;ng thể cho ảnh chất lượng hơn c&aacute;c smartphone hỗ trợ định dạng RAW.</p>\r\n	<p>\r\n		Google hiện vẫn chưa x&aacute;c nhận th&ocirc;ng tin tr&ecirc;n cũng như chưa th&ocirc;ng b&aacute;o lộ tr&igrave;nh t&iacute;ch hợp c&ocirc;ng nghệ lưu v&agrave; xử l&yacute; ảnh RAW cho hệ điều h&agrave;nh Android, nhưng nhiều khả năng c&ocirc;ng nghệ n&agrave;y sẽ xuất hiện v&agrave;o năm sau.</p>\r\n</div>\r\n<p>\r\n	&nbsp;</p>\r\n', '2013-11-19 00:00:00', 0, 1, 0),
(12, '5 smartphone giá rẻ tốt nhất hiện nay ', 1, 'Smartphone ngày càng phổ biến và với số tiền không quá 400 USD vào thời điểm này, bạn đã có thể lựa chọn cho mình những chiếc điện thoại di động đẳng cấp.', '<div class="summary">\r\n	<p itemprop="description">\r\n		Smartphone ng&agrave;y c&agrave;ng phổ biến v&agrave; với số tiền kh&ocirc;ng qu&aacute; 400 USD v&agrave;o thời điểm n&agrave;y, bạn đ&atilde; c&oacute; thể lựa chọn cho m&igrave;nh những chiếc điện thoại di động đẳng cấp.</p>\r\n</div>\r\n<table cellpadding="0" cellspacing="0" class="picture">\r\n	<tbody>\r\n		<tr>\r\n			<td class="pic">\r\n				<img alt="" src="http://img.v3.news.zdn.vn/w660/Uploaded/erlu/2013_11_18/top1_1.jpg" /></td>\r\n		</tr>\r\n		<tr>\r\n			<td class="pCaption caption">\r\n				<p>\r\n					<strong>Nexus 5</strong></p>\r\n				<p>\r\n					Với Nexus 4, Google đ&atilde; cho thấy smartphone chất lượng cao cũng ho&agrave;n to&agrave;n c&oacute; thể được đưa ra ở mức gi&aacute; cực kỳ hợp l&yacute; với người d&ugrave;ng khi n&oacute; chỉ bằng tầm nửa gi&aacute; của những smartphone kh&aacute;c.</p>\r\n				<p>\r\n					Một năm sau, Nexus 5 tiếp tục trở th&agrave;nh đối thủ đ&aacute;ng gờm với rất nhiều smartphone của c&aacute;c h&atilde;ng khi n&oacute; c&oacute; mức gi&aacute; chỉ 349 USD. Kh&oacute; c&oacute; thể c&oacute; đối thủ cạnh tranh ở mức gi&aacute; đ&oacute; khi m&agrave; Nexus 5 sở hữu m&agrave;n h&igrave;nh HD, vi xử l&yacute; Snapdragon 800, hệ điều h&agrave;nh Android mới nhất KitKat,...</p>\r\n			</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n<table cellpadding="0" cellspacing="0" class="picture">\r\n	<tbody>\r\n		<tr>\r\n			<td class="pic">\r\n				<img alt="" src="http://img.v3.news.zdn.vn/w660/Uploaded/erlu/2013_11_18/top2.jpg" /></td>\r\n		</tr>\r\n		<tr>\r\n			<td class="pCaption caption">\r\n				<p>\r\n					<strong>Moto G</strong></p>\r\n				<p>\r\n					Chiếc smartphone n&agrave;y của Motorola kh&aacute; ấn tượng với m&agrave;n h&igrave;nh 4.5-inch với kiểu d&aacute;ng tương đối giống với Moto X, vi xử l&yacute; l&otilde;i tứ v&agrave; đặc biệt l&agrave; gi&aacute; của n&oacute; chỉ ở mức 179 USD. Nếu đ&uacute;ng như CEO của Motorola hứa hẹn, Moto G cũng c&oacute; thể n&acirc;ng cấp l&ecirc;n phi&ecirc;n bản Android mới nhất KitKat th&igrave; n&oacute; thực sự ph&ugrave; hợp với những ai y&ecirc;u th&iacute;ch một chiếc smartphone lịch l&atilde;m nhưng kh&ocirc;ng cần phải l&agrave; phi&ecirc;n bản mới nhất v&agrave; m&agrave;n h&igrave;nh lớn nhất.</p>\r\n			</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n<table cellpadding="0" cellspacing="0" class="picture">\r\n	<tbody>\r\n		<tr>\r\n			<td class="pic">\r\n				<img alt="" src="http://img.v3.news.zdn.vn/w660/Uploaded/erlu/2013_11_18/top3.jpg" /></td>\r\n		</tr>\r\n		<tr>\r\n			<td class="pCaption caption">\r\n				<p>\r\n					<strong>Moto X</strong></p>\r\n				<p>\r\n					Moto X được nh&agrave; mạng Republic Wireless đưa ra gi&aacute; b&aacute;n 299 USD kh&ocirc;ng k&egrave;m hợp đồng. Đ&acirc;y l&agrave; mức gi&aacute; c&oacute; lẽ l&agrave; kh&ocirc;ng thể tốt hơn. Tuy nhi&ecirc;n, rắc rối duy nhất l&agrave; m&aacute;y sẽ kh&ocirc;ng hoạt động với c&aacute;c nh&agrave; mạng kh&aacute;c, trừ Sprint.</p>\r\n			</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n<table cellpadding="0" cellspacing="0" class="picture">\r\n	<tbody>\r\n		<tr>\r\n			<td class="pic">\r\n				<img alt="" src="http://img.v3.news.zdn.vn/w660/Uploaded/erlu/2013_11_18/top4.jpg" /></td>\r\n		</tr>\r\n		<tr>\r\n			<td class="pCaption caption">\r\n				<p>\r\n					<strong>Galaxy S4 Mini</strong></p>\r\n				<p>\r\n					Phi&ecirc;n bản thu nhỏ chiếc smartphone mới nhất của Samsung được cung cấp ở mức gi&aacute; chưa đến 400 USD với một cấu h&igrave;nh mạnh tương đương người anh em của n&oacute; l&agrave; Galaxy S4.</p>\r\n			</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n<table cellpadding="0" cellspacing="0" class="picture">\r\n	<tbody>\r\n		<tr>\r\n			<td class="pic">\r\n				<img alt="" src="http://img.v3.news.zdn.vn/w660/Uploaded/erlu/2013_11_18/top5.jpg" /></td>\r\n		</tr>\r\n		<tr>\r\n			<td class="pCaption caption">\r\n				<p>\r\n					<strong>Lumia 520</strong></p>\r\n				<p>\r\n					D&ugrave; Windows Phone quả thực c&ograve;n thiếu kh&aacute; nhiều ứng dụng v&agrave; hệ điều h&agrave;nh c&ograve;n nhiều bất tiện nhưng Lumia 520/521 với mức gi&aacute; c&aacute;c nh&agrave; mạng đưa ra l&agrave; 149 USD đ&atilde; đem lại th&agrave;nh c&ocirc;ng ngo&agrave;i mong đợi cho Nokia. Đ&acirc;y cũng l&agrave; chiếc smartphone Windows Phone b&aacute;n chạy nhất thế giới theo th&ocirc;ng tin từ Microsoft.</p>\r\n			</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n<p>\r\n	&nbsp;</p>\r\n', '2013-11-19 00:00:00', 0, 2, 1),
(13, 'Nokia Lumia 929 có thể ra mắt sau ba ngày tới ', 2, 'Chiếc smartphone được cho là quan trọng của Nokia trong năm 2013 có thể sẽ được ra mắt trong ngày 21/11.', '<div class="summary">\r\n	<p itemprop="description">\r\n		Chiếc smartphone được cho l&agrave; quan trọng của Nokia trong năm 2013 c&oacute; thể sẽ được ra mắt trong ng&agrave;y 21/11.</p>\r\n</div>\r\n<div class="content" itemprop="articleBody">\r\n	<p>\r\n		Tuy Nokia vừa ra mắt bộ đ&ocirc;i Lumia 1520 v&agrave; Lumia 1320, nhưng giới c&ocirc;ng nghệ vẫn mong chờ th&ecirc;m một sản phẩm bom tấn của Nokia trong năm 2013. Với m&agrave;n h&igrave;nh l&ecirc;n đến 6 inch, 2 phablet kể tr&ecirc;n kh&ocirc;ng phải l&agrave; một sản phẩm ph&ugrave; hợp với số đ&ocirc;ng người d&ugrave;ng, v&agrave; đ&acirc;y cũng l&agrave; l&yacute; do để chiếc Lumia 929 ra mắt v&agrave;o cuối năm nay.</p>\r\n	<table cellpadding="0" cellspacing="0" class="picture">\r\n		<tbody>\r\n			<tr>\r\n				<td class="pic">\r\n					<img alt="" src="http://img.v3.news.zdn.vn/w660/Uploaded/ynssi/2013_11_18/lumia929_large_verge_medium_landscape.jpg" /></td>\r\n			</tr>\r\n			<tr>\r\n				<td class="pCaption caption">\r\n					H&igrave;nh ảnh về chiếc Lumia 929 của Nokia r&ograve; rỉ tr&ecirc;n trang Twitter @evleaks</td>\r\n			</tr>\r\n		</tbody>\r\n	</table>\r\n	<p>\r\n		Về cấu h&igrave;nh, Lumia 929 c&oacute; thể được trang bị m&agrave;n h&igrave;nh 5 inch độ ph&acirc;n giải 1.080 x 1.920 pixel, mật độ điểm ảnh 441ppi (cao hơn cả iPhone 5S v&agrave; iPad Mini Retina), camera 20,7 MP. Những th&ocirc;ng số c&ograve;n lại c&oacute; thể sẽ giống với chiếc Lumia 1520.</p>\r\n	<p>\r\n		Theo một nguồn tin nội bộ của Verizon, Lumia 929 c&oacute; thể được ra mắt v&agrave;o ng&agrave;y 21/11, một tuần trước khi &quot;ng&agrave;y thứ 6 đen tối&quot; (Black Friday - dịp mua sắm lớn nhất trong năm ở Mỹ) diễn ra. Gi&aacute; m&aacute;y cũng chưa được tiết lộ.</p>\r\n</div>\r\n<p>\r\n	&nbsp;</p>\r\n', '2013-11-19 00:00:00', 0, 5, 2),
(14, 'Apple phát hành iOS 7.1 Beta', 2, 'Bản cập nhật iOS 7.1 Beta được cho là nhằm khắc phục một số lỗi bug xuất hiện trên phiên bản iOS cũ như lỗi Bluetooth hay kết nối iTunes Match.', '<div class="summary">\r\n	<p itemprop="description">\r\n		Bản cập nhật iOS 7.1 Beta được cho l&agrave; nhằm khắc phục một số lỗi bug xuất hiện tr&ecirc;n phi&ecirc;n bản iOS cũ như lỗi Bluetooth hay kết nối iTunes Match.</p>\r\n</div>\r\n<table cellpadding="0" cellspacing="0" class="picture">\r\n	<tbody>\r\n		<tr>\r\n			<td class="pic">\r\n				<img alt="" src="http://img.v3.news.zdn.vn/w660/Uploaded/Aohuouk/2013_11_19/iphone5sreview5575x435.jpg" /></td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n<p>\r\n	Chỉ &iacute;t ng&agrave;y sau khi cập nhật bản iOS 7.0.4 cho iPhone, iPad v&agrave; iPod touch, Apple lại tiếp tục ph&aacute;t h&agrave;nh bản iOS 7.1 Beta đến c&aacute;c nh&agrave; ph&aacute;t triển. Đ&acirc;y được cho l&agrave; một bản cập nhật nhằm khắc phục một số lỗi người d&ugrave;ng từng ph&agrave;n n&agrave;n trước đ&oacute; về iOS 7, trong đ&oacute; c&oacute; lỗi kết nối Bluetooth hay iTunes Match. Tuy nhi&ecirc;n, Apple lại kh&ocirc;ng nhắc g&igrave; đến hiện tượng tự khởi động lại tr&ecirc;n một số chiếc iPhone 5S đ&atilde; được b&aacute;n ra thị trường.</p>\r\n<p>\r\n	Năm ngo&aacute;i, bản iOS 6.1 Beta cũng được ph&aacute;t h&agrave;nh v&agrave;o th&aacute;ng 11 nhưng phải đến tận th&aacute;ng 1, bản ch&iacute;nh thức mới đến tay người d&ugrave;ng. Th&ocirc;ng thường, phi&ecirc;n bản iOS x.1 của Apple thường mang đến nhiều t&iacute;nh năng lớn. Chẳng hạn, iOS 6.1 năm ngo&aacute;i sở hữu t&iacute;nh năng Siri cải tiến v&agrave; phần giao diện &acirc;m nhạc tr&ecirc;n m&agrave;n h&igrave;nh kh&oacute;a mới.</p>\r\n', '2013-11-19 00:00:00', 0, 8, 0);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `BINHLUAN`
--
ALTER TABLE `BINHLUAN`
  ADD CONSTRAINT `BINHLUAN_TO_SANPHAM` FOREIGN KEY (`MASANPHAM`) REFERENCES `SANPHAM` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `CHITIETSANPHAM`
--
ALTER TABLE `CHITIETSANPHAM`
  ADD CONSTRAINT `CTLAPTOP_TO_SANPHAM` FOREIGN KEY (`MASANPHAM`) REFERENCES `SANPHAM` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE;

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
-- Constraints for table `HINHSANPHAM`
--
ALTER TABLE `HINHSANPHAM`
  ADD CONSTRAINT `HINHSANPHAM_TO_SANPHAM` FOREIGN KEY (`MASANPHAM`) REFERENCES `SANPHAM` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `NGUOIDUNG`
--
ALTER TABLE `NGUOIDUNG`
  ADD CONSTRAINT `NGUOIDUNG_TO_HINHANH` FOREIGN KEY (`HINHDAIDIEN`) REFERENCES `HINHANH` (`ID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `NGUOIDUNG_TO_QUYEN` FOREIGN KEY (`QUYEN`) REFERENCES `QUYEN` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `NGUOIDUNG_TO_TINHTHANH` FOREIGN KEY (`TINHTHANH`) REFERENCES `TINHTHANH` (`ID`) ON DELETE NO ACTION ON UPDATE NO ACTION;

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
