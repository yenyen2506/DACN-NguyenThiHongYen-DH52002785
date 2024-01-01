-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 09, 2023 at 02:26 AM
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
-- Database: `dacn`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin`
--

CREATE TABLE `tbl_admin` (
  `id_admin` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `admin_status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tbl_admin`
--

INSERT INTO `tbl_admin` (`id_admin`, `username`, `password`, `admin_status`) VALUES
(2, 'admin', '202cb962ac59075b964b07152d234b70', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_binhluan`
--

CREATE TABLE `tbl_binhluan` (
  `binhluan_id` int(11) NOT NULL,
  `tenbinhluan` varchar(255) NOT NULL,
  `binhluan` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `ngay_gio` varchar(100) NOT NULL,
  `id_sanpham` int(11) NOT NULL,
  `hienthi` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tbl_binhluan`
--

INSERT INTO `tbl_binhluan` (`binhluan_id`, `tenbinhluan`, `binhluan`, `ngay_gio`, `id_sanpham`, `hienthi`) VALUES
(19, 'ba', 'ngon', '03/12/2023 18:52:16', 11, 1),
(20, 'ba', 'ngon', '03/12/2023 18:52:52', 11, 1),
(21, 'bella', 'phục vụ tốt', '08/12/2023 15:03:44', 107, 1),
(22, 'bella', 'phục vụ tốt', '08/12/2023 15:05:09', 107, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_chitietdonhang`
--

CREATE TABLE `tbl_chitietdonhang` (
  `id_chitietdonhang` int(11) NOT NULL,
  `code_cart` int(11) NOT NULL,
  `id_sanpham` int(11) NOT NULL,
  `soluongmua` int(11) NOT NULL,
  `id_khachhang` int(11) NOT NULL,
  `tinhtrangdon` int(11) NOT NULL DEFAULT 0,
  `huydon` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tbl_chitietdonhang`
--

INSERT INTO `tbl_chitietdonhang` (`id_chitietdonhang`, `code_cart`, `id_sanpham`, `soluongmua`, `id_khachhang`, `tinhtrangdon`, `huydon`) VALUES
(23, 2994, 11, 2, 25, 0, 0),
(24, 4194, 104, 1, 26, 0, 0),
(25, 4971, 11, 1, 26, 0, 0),
(26, 6144, 11, 2, 26, 0, 0),
(27, 255, 11, 2, 26, 0, 0),
(28, 255, 104, 1, 26, 0, 0),
(29, 6282, 11, 2, 26, 0, 0),
(37, 3999, 107, 2, 26, 0, 0),
(38, 7383, 107, 2, 26, 0, 0),
(39, 357, 107, 2, 26, 0, 0),
(40, 357, 108, 1, 26, 0, 0),
(41, 357, 104, 1, 26, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_dangky`
--

CREATE TABLE `tbl_dangky` (
  `id_dangky` int(11) NOT NULL,
  `tenkhachhang` varchar(200) NOT NULL,
  `matkhau` varchar(100) NOT NULL,
  `r_matkhau` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `diachi` varchar(200) NOT NULL,
  `dienthoai` varchar(10) NOT NULL,
  `user_name` varchar(100) NOT NULL,
  `status` int(11) NOT NULL,
  `token` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tbl_dangky`
--

INSERT INTO `tbl_dangky` (`id_dangky`, `tenkhachhang`, `matkhau`, `r_matkhau`, `email`, `diachi`, `dienthoai`, `user_name`, `status`, `token`) VALUES
(25, 'suhao', '81dc9bdb52d04dc20036dbd8313ed055', '202cb962ac59075b964b07152d234b70', 'yenyen25062002@gmail.com', 'tiengiang', '1234567890', 'hi', 0, NULL),
(26, 'suhao', '202cb962ac59075b964b07152d234b70', '202cb962ac59075b964b07152d234b70', 'yenyen25062002@gmail.com', 'tiengiang', '1234567890', 'la', 0, NULL),
(27, 'suhao', '202cb962ac59075b964b07152d234b70', '202cb962ac59075b964b07152d234b70', 'yenyen25062002@gmail.com', 'tiengiang', '1234567890', 'lalaa', 0, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_danhmuc`
--

CREATE TABLE `tbl_danhmuc` (
  `id_danhmuc` int(11) NOT NULL,
  `tendanhmuc` varchar(100) NOT NULL,
  `thutu` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tbl_danhmuc`
--

INSERT INTO `tbl_danhmuc` (`id_danhmuc`, `tendanhmuc`, `thutu`) VALUES
(20, 'Miền Bắc', 0),
(21, 'Miền Trung', 2),
(22, 'Miền Nam', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_donhang`
--

CREATE TABLE `tbl_donhang` (
  `id_donhang` int(11) NOT NULL,
  `id_khachhang` int(11) NOT NULL,
  `code_cart` varchar(10) NOT NULL,
  `cart_status` int(11) NOT NULL,
  `tinhtrangdon` int(11) NOT NULL DEFAULT 0,
  `ghichudonhang` text DEFAULT NULL,
  `hinhthucthanhtoan` varchar(50) DEFAULT NULL,
  `ngaydat` varchar(50) NOT NULL DEFAULT current_timestamp(),
  `huydon` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tbl_donhang`
--

INSERT INTO `tbl_donhang` (`id_donhang`, `id_khachhang`, `code_cart`, `cart_status`, `tinhtrangdon`, `ghichudonhang`, `hinhthucthanhtoan`, `ngaydat`, `huydon`) VALUES
(18, 25, '2994', 0, 0, '', 'Nhận tiền mặt', '2023-12-03 15:48:24', 0),
(19, 26, '4194', 0, 0, '', 'Nhận tiền mặt', '2023-12-04 16:17:48', 0),
(20, 26, '4971', 0, 0, '', 'Nhận tiền mặt', '2023-12-04 16:19:24', 0),
(21, 26, '6144', 0, 0, '', 'Nhận tiền mặt', '2023-12-04 16:23:35', 0),
(22, 26, '255', 0, 0, '', 'Chuyển khoản', '2023-12-04 17:00:21', 0),
(23, 26, '6282', 0, 0, '', 'Nhận tiền mặt', '2023-12-07 15:28:10', 0),
(24, 22, '4537', 1, 0, '', 'Chuyển khoản', '2023-12-08 18:45:27', 0),
(25, 22, '1065', 1, 0, '', 'Chuyển khoản', '2023-12-08 18:45:28', 0),
(26, 22, '3160', 1, 0, '', 'Chuyển khoản', '2023-12-08 18:45:29', 0),
(27, 22, '583', 1, 0, '', 'Chuyển khoản', '2023-12-08 18:45:30', 0),
(28, 22, '5761', 1, 0, '', 'Chuyển khoản', '2023-12-08 18:45:30', 0),
(29, 22, '6316', 1, 0, '', 'Chuyển khoản', '2023-12-08 18:45:30', 0),
(30, 22, '2520', 1, 0, '', 'Chuyển khoản', '2023-12-08 18:45:30', 0),
(31, 22, '3070', 1, 0, '', 'Chuyển khoản', '2023-12-08 18:45:42', 0),
(32, 22, '9818', 1, 0, '', 'Chuyển khoản', '2023-12-08 18:46:07', 0),
(33, 22, '425', 1, 0, '', 'Chuyển khoản', '2023-12-08 18:46:08', 0),
(34, 22, '9944', 1, 0, '', 'Chuyển khoản', '2023-12-08 18:46:08', 0),
(35, 22, '6075', 1, 0, '', 'Chuyển khoản', '2023-12-08 18:46:32', 0),
(36, 22, '3984', 1, 0, '', 'Chuyển khoản', '2023-12-08 18:48:26', 0),
(37, 22, '5691', 1, 0, '', 'Chuyển khoản', '2023-12-08 18:48:27', 0),
(38, 26, '3999', 1, 0, '', 'Chuyển khoản', '2023-12-08 19:09:58', 0),
(39, 26, '7383', 1, 0, '', 'Chuyển khoản', '2023-12-08 19:13:14', 0),
(40, 26, '357', 1, 0, '', 'Chuyển khoản', '2023-12-08 19:35:29', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_khachhang`
--

CREATE TABLE `tbl_khachhang` (
  `id_khachhang` int(11) NOT NULL,
  `tenkhachhang` varchar(200) NOT NULL,
  `id_dangky` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_lienhe`
--

CREATE TABLE `tbl_lienhe` (
  `id` int(11) NOT NULL,
  `thongtinlienhe` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tbl_lienhe`
--

INSERT INTO `tbl_lienhe` (`id`, `thongtinlienhe`) VALUES
(1, '<p><strong>Mọi thắc mắc qu&yacute; kh&aacute;ch h&agrave;ng c&oacute; thể li&ecirc;n hệ với ch&uacute;ng t&ocirc;i qua c&aacute;c phương thức sau:</strong></p>\r\n\r\n<p>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;- Email: <strong>yenyen</strong><strong>@gmail.com</strong></p>\r\n\r\n<p>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;- Số điện thoại: <strong>0726753910</strong></p>\r\n\r\n<p>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;- Hotline: <strong>0708756281</strong></p>\r\n\r\n<p>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;- Fanpage: <strong>Việt Food</strong></p>\r\n\r\n<p><strong>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;-&nbsp;</strong>Địa chỉ:<strong>&nbsp;180 Cao Lộ, Quận 8</strong></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</p>\r\n');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_sanpham`
--

CREATE TABLE `tbl_sanpham` (
  `id_sanpham` int(11) NOT NULL,
  `tensanpham` varchar(250) NOT NULL,
  `masp` varchar(100) NOT NULL,
  `giasp` varchar(50) NOT NULL,
  `soluong` int(11) NOT NULL,
  `hinhanh` varchar(255) NOT NULL,
  `id_danhmuc` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tbl_sanpham`
--

INSERT INTO `tbl_sanpham` (`id_sanpham`, `tensanpham`, `masp`, `giasp`, `soluong`, `hinhanh`, `id_danhmuc`) VALUES
(11, 'bún bò', '1234', '59000', 10, 'bun bo hue.jpeg', 21),
(104, 'bánh xèo', '1122', '79000', 100, 'banh-xeo-mien-tay-net-van-hoa-am-thuc.jpg', 22),
(105, 'bún chả Hà Nội', '1199', '79000', 1000, '1701938412_bunchahanoi.jpg', 20),
(106, 'gỏi gà ngó sen', '1154', '149000', 1000, '1701938446_goigangosen.jpg', 22),
(107, 'Bún đậu mắm tôm', '1122', '79000', 1000, '1701938476_quan-bun-dau-mam-tom.jpg', 20),
(108, 'gỏi gà măng cụt', '1245', '199000', 1000, '1701938506_thuong-thuc-goi-ga-mang-cut-thom-ngon-gion-ngot-1-1654592840.jpg', 22);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_thongke`
--

CREATE TABLE `tbl_thongke` (
  `id` int(11) NOT NULL,
  `donhang` varchar(50) NOT NULL,
  `doanhthu` varchar(255) NOT NULL,
  `ngaydat` varchar(20) NOT NULL,
  `soluongban` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `tbl_thongke`
--

INSERT INTO `tbl_thongke` (`id`, `donhang`, `doanhthu`, `ngaydat`, `soluongban`) VALUES
(3, '4', '256000', '2023-12-04', 6),
(4, '5', '374000', '2023-12-07', 11);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indexes for table `tbl_binhluan`
--
ALTER TABLE `tbl_binhluan`
  ADD PRIMARY KEY (`binhluan_id`),
  ADD KEY `id_sanpham` (`id_sanpham`),
  ADD KEY `id_sanpham_2` (`id_sanpham`);

--
-- Indexes for table `tbl_chitietdonhang`
--
ALTER TABLE `tbl_chitietdonhang`
  ADD PRIMARY KEY (`id_chitietdonhang`),
  ADD KEY `id_sanpham` (`id_sanpham`,`id_khachhang`),
  ADD KEY `id_khachhang` (`id_khachhang`),
  ADD KEY `id_sanpham_2` (`id_sanpham`,`id_khachhang`);

--
-- Indexes for table `tbl_dangky`
--
ALTER TABLE `tbl_dangky`
  ADD PRIMARY KEY (`id_dangky`);

--
-- Indexes for table `tbl_danhmuc`
--
ALTER TABLE `tbl_danhmuc`
  ADD PRIMARY KEY (`id_danhmuc`);

--
-- Indexes for table `tbl_donhang`
--
ALTER TABLE `tbl_donhang`
  ADD PRIMARY KEY (`id_donhang`),
  ADD KEY `id_khachhang` (`id_khachhang`);

--
-- Indexes for table `tbl_khachhang`
--
ALTER TABLE `tbl_khachhang`
  ADD PRIMARY KEY (`id_khachhang`),
  ADD KEY `id_dangky` (`id_dangky`);

--
-- Indexes for table `tbl_lienhe`
--
ALTER TABLE `tbl_lienhe`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_sanpham`
--
ALTER TABLE `tbl_sanpham`
  ADD PRIMARY KEY (`id_sanpham`),
  ADD KEY `id_danhmuc` (`id_danhmuc`);

--
-- Indexes for table `tbl_thongke`
--
ALTER TABLE `tbl_thongke`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_binhluan`
--
ALTER TABLE `tbl_binhluan`
  MODIFY `binhluan_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `tbl_chitietdonhang`
--
ALTER TABLE `tbl_chitietdonhang`
  MODIFY `id_chitietdonhang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `tbl_dangky`
--
ALTER TABLE `tbl_dangky`
  MODIFY `id_dangky` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `tbl_danhmuc`
--
ALTER TABLE `tbl_danhmuc`
  MODIFY `id_danhmuc` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `tbl_donhang`
--
ALTER TABLE `tbl_donhang`
  MODIFY `id_donhang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `tbl_khachhang`
--
ALTER TABLE `tbl_khachhang`
  MODIFY `id_khachhang` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_lienhe`
--
ALTER TABLE `tbl_lienhe`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_sanpham`
--
ALTER TABLE `tbl_sanpham`
  MODIFY `id_sanpham` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=109;

--
-- AUTO_INCREMENT for table `tbl_thongke`
--
ALTER TABLE `tbl_thongke`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tbl_binhluan`
--
ALTER TABLE `tbl_binhluan`
  ADD CONSTRAINT `tbl_binhluan_ibfk_1` FOREIGN KEY (`id_sanpham`) REFERENCES `tbl_sanpham` (`id_sanpham`) ON UPDATE CASCADE;

--
-- Constraints for table `tbl_chitietdonhang`
--
ALTER TABLE `tbl_chitietdonhang`
  ADD CONSTRAINT `tbl_chitietdonhang_ibfk_2` FOREIGN KEY (`id_sanpham`) REFERENCES `tbl_sanpham` (`id_sanpham`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tbl_khachhang`
--
ALTER TABLE `tbl_khachhang`
  ADD CONSTRAINT `tbl_khachhang_ibfk_1` FOREIGN KEY (`id_dangky`) REFERENCES `tbl_dangky` (`id_dangky`),
  ADD CONSTRAINT `tbl_khachhang_ibfk_2` FOREIGN KEY (`id_khachhang`) REFERENCES `tbl_chitietdonhang` (`id_khachhang`),
  ADD CONSTRAINT `tbl_khachhang_ibfk_3` FOREIGN KEY (`id_dangky`) REFERENCES `tbl_donhang` (`id_khachhang`);

--
-- Constraints for table `tbl_sanpham`
--
ALTER TABLE `tbl_sanpham`
  ADD CONSTRAINT `tbl_sanpham_ibfk_1` FOREIGN KEY (`id_danhmuc`) REFERENCES `tbl_danhmuc` (`id_danhmuc`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
