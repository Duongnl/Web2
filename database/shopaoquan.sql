-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th6 07, 2024 lúc 06:28 PM
-- Phiên bản máy phục vụ: 10.4.28-MariaDB
-- Phiên bản PHP: 8.1.17

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `shopaoquan`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `anhchinh`
--

CREATE TABLE `anhchinh` (
  `MaAnhChinh` int(11) NOT NULL,
  `Url` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `anhchinh`
--

INSERT INTO `anhchinh` (`MaAnhChinh`, `Url`) VALUES
(19, '/upload/products/aokhoacdu.jpg'),
(20, '/upload/products/aokhoacgio.jpg'),
(21, '/upload/products/aokhoacjean.jpg'),
(22, '/upload/products/aokhoackaki.jpg'),
(23, '/upload/products/aopolonam.jpg'),
(24, '/upload/products/aopolonam-den.jpg'),
(25, '/upload/products/aosomitayngan.jpg'),
(26, '/upload/products/aosomitrang.jpg'),
(27, '/upload/products/aothukesoc.jpg'),
(28, '/upload/products/aothunambasic.jpg'),
(29, '/upload/products/aothunam.jpg'),
(30, '/upload/products/aokhoacdu.jpg'),
(31, '/upload/products/aothunnu1.jpg'),
(32, '/upload/products/aothuncotron.jpg'),
(33, '/upload/products/aothunrong.jpg'),
(34, '/upload/products/aothuncotrontaydaiden.jpg'),
(35, '/upload/products/aothuncotrontaydai.jpg'),
(36, '/upload/products/aothuncotroncottonxam.jpg'),
(37, '/upload/products/aothuncotroncotton.jpg'),
(38, '/upload/products/aothuncotron.jpg');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `anhphu`
--

CREATE TABLE `anhphu` (
  `MaAnhPhu` int(11) NOT NULL,
  `MaAnhChinh` int(11) NOT NULL,
  `Url` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `anhphu`
--

INSERT INTO `anhphu` (`MaAnhPhu`, `MaAnhChinh`, `Url`) VALUES
(7, 32, '/upload/products/aothuncotron1.jpg'),
(8, 32, '/upload/products/aothuncotron2.jpg'),
(9, 33, '/upload/products/aothunrong1.jpg'),
(10, 33, '/upload/products/aothunrong2.jpg'),
(11, 34, '/upload/products/aothuncotrontaydaiden1.jpg'),
(12, 34, '/upload/products/aothuncotrontaydaiden2.jpg'),
(13, 35, '/upload/products/aothuncotrontaydai1.jpg'),
(14, 35, '/upload/products/aothuncotrontaydai2.jpg'),
(15, 36, '/upload/products/aothuncotroncottonxam1.jpg'),
(16, 36, '/upload/products/aothuncotroncottonxam2.jpg'),
(17, 37, '/upload/products/aothuncotroncotton1.jpg'),
(18, 37, '/upload/products/aothuncotroncotton2.jpg'),
(19, 38, '/upload/products/aothuncotron1.jpg'),
(20, 38, '/upload/products/aothuncotron2.jpg');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `chitietquyen`
--

CREATE TABLE `chitietquyen` (
  `MaCTQ` int(11) NOT NULL,
  `ChiTietQuyen` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `chitietquyen`
--

INSERT INTO `chitietquyen` (`MaCTQ`, `ChiTietQuyen`) VALUES
(1, 'Quản lý Thống kê'),
(2, 'Quản lý sản phẩm'),
(3, 'Quản lý Category'),
(4, 'Quản lý Discount'),
(5, 'Quản lý Supplier'),
(6, 'Quản lý Staff'),
(7, 'Quản lý Guest'),
(8, 'Quản lý Order'),
(9, 'Quản Lý Import'),
(10, 'Quản lý Duyệt Nhập'),
(11, 'QuyenUser'),
(12, 'Quyền Quản Lý');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `cthoadon`
--

CREATE TABLE `cthoadon` (
  `MaCTHD` int(11) NOT NULL,
  `MaHD` int(11) NOT NULL,
  `MaSP` int(11) NOT NULL,
  `SoLuong` int(11) DEFAULT NULL,
  `DonGia` double DEFAULT NULL,
  `ThanhTien` double DEFAULT NULL,
  `MaSize` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `cthoadon`
--

INSERT INTO `cthoadon` (`MaCTHD`, `MaHD`, `MaSP`, `SoLuong`, `DonGia`, `ThanhTien`, `MaSize`) VALUES
(22, 7, 45, 1, 184450, 184450, 'L'),
(23, 7, 46, 6, 170000, 1020000, 'M'),
(24, 7, 49, 3, 255000, 765000, 'M'),
(25, 8, 46, 4, 170000, 680000, 'M'),
(26, 8, 48, 3, 345000, 1035000, 'L'),
(27, 8, 49, 3, 255000, 765000, 'S'),
(28, 8, 50, 4, 277950, 1111800, 'M'),
(29, 9, 48, 3, 345000, 1035000, 'M'),
(30, 9, 51, 3, 258400, 775200, 'M'),
(31, 10, 32, 3, 255000, 765000, 'M'),
(32, 10, 34, 2, 340000, 680000, 'L'),
(33, 10, 50, 3, 277950, 833850, 'M'),
(34, 11, 40, 2, 240000, 480000, 'M'),
(35, 11, 41, 3, 314500, 943500, 'M'),
(36, 11, 45, 2, 184450, 368900, 'M'),
(37, 12, 45, 2, 184450, 368900, 'M'),
(38, 12, 46, 3, 170000, 510000, 'S'),
(39, 13, 39, 3, 255000, 765000, 'M'),
(40, 13, 48, 2, 345000, 690000, 'M');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `ctphieunhap`
--

CREATE TABLE `ctphieunhap` (
  `MaCTPN` int(11) NOT NULL,
  `MaPN` int(11) NOT NULL,
  `MaSP` int(11) NOT NULL,
  `DonGia` double DEFAULT NULL,
  `SoLuong` int(11) DEFAULT NULL,
  `ThanhTien` double DEFAULT NULL,
  `MaSize` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `ctphieunhap`
--

INSERT INTO `ctphieunhap` (`MaCTPN`, `MaPN`, `MaSP`, `DonGia`, `SoLuong`, `ThanhTien`, `MaSize`) VALUES
(23, 14, 32, 120000, 12, 1440000, 'L'),
(24, 14, 32, 120000, 14, 1680000, 'M'),
(25, 14, 32, 120000, 14, 1680000, 'S'),
(26, 15, 33, 126000, 45, 5670000, 'L'),
(27, 15, 33, 126000, 50, 6300000, 'M'),
(28, 15, 33, 126000, 50, 6300000, 'S'),
(29, 16, 34, 340000, 23, 7820000, 'L'),
(30, 16, 34, 340000, 23, 7820000, 'M'),
(31, 16, 34, 340000, 23, 7820000, 'S'),
(32, 16, 34, 340000, 23, 7820000, 'XL'),
(33, 16, 34, 340000, 23, 7820000, 'XXL'),
(34, 17, 35, 210000, 12, 2520000, 'L'),
(35, 17, 35, 210000, 12, 2520000, 'M'),
(36, 17, 35, 210000, 12, 2520000, 'S'),
(37, 17, 36, 210000, 12, 2520000, 'L'),
(38, 17, 36, 210000, 12, 2520000, 'M'),
(39, 17, 36, 210000, 12, 2520000, 'S'),
(40, 17, 37, 210000, 12, 2520000, 'L'),
(41, 17, 37, 210000, 12, 2520000, 'M'),
(42, 17, 37, 210000, 12, 2520000, 'S'),
(43, 17, 37, 210000, 12, 2520000, 'XL'),
(44, 18, 38, 230000, 23, 5290000, 'L'),
(45, 18, 38, 230000, 23, 5290000, 'M'),
(46, 18, 38, 230000, 23, 5290000, 'S'),
(47, 18, 39, 230000, 23, 5290000, 'L'),
(48, 18, 39, 230000, 23, 5290000, 'M'),
(49, 18, 39, 230000, 23, 5290000, 'S'),
(50, 18, 40, 230000, 23, 5290000, 'L'),
(51, 18, 40, 230000, 23, 5290000, 'M'),
(52, 18, 40, 230000, 23, 5290000, 'S'),
(53, 18, 40, 230000, 23, 5290000, 'XL'),
(54, 19, 41, 120000, 23, 2760000, 'L'),
(55, 19, 41, 120000, 23, 2760000, 'M'),
(56, 19, 41, 120000, 23, 2760000, 'S'),
(57, 19, 41, 120000, 23, 2760000, 'XL'),
(58, 19, 42, 120000, 23, 2760000, 'L'),
(59, 19, 42, 120000, 23, 2760000, 'M'),
(60, 19, 42, 120000, 23, 2760000, 'S'),
(61, 19, 42, 120000, 23, 2760000, 'XL'),
(62, 19, 45, 120000, 23, 2760000, 'L'),
(63, 19, 45, 120000, 46, 5520000, 'M'),
(64, 19, 46, 120000, 23, 2760000, 'L'),
(65, 19, 46, 120000, 23, 2760000, 'M'),
(66, 19, 46, 120000, 23, 2760000, 'S'),
(67, 20, 47, 230000, 23, 5290000, 'L'),
(68, 20, 47, 230000, 23, 5290000, 'M'),
(69, 20, 47, 230000, 23, 5290000, 'S'),
(70, 20, 47, 230000, 23, 5290000, 'XL'),
(71, 20, 48, 230000, 23, 5290000, 'L'),
(72, 20, 48, 230000, 23, 5290000, 'M'),
(73, 20, 48, 230000, 23, 5290000, 'S'),
(74, 20, 49, 230000, 23, 5290000, 'L'),
(75, 20, 49, 230000, 23, 5290000, 'M'),
(76, 20, 49, 230000, 23, 5290000, 'S'),
(77, 20, 50, 230000, 23, 5290000, 'L'),
(78, 20, 50, 230000, 23, 5290000, 'M'),
(79, 20, 50, 230000, 23, 5290000, 'S'),
(80, 20, 50, 230000, 23, 5290000, 'XL'),
(81, 20, 51, 230000, 23, 5290000, 'L'),
(82, 20, 51, 230000, 23, 5290000, 'M'),
(83, 20, 51, 230000, 23, 5290000, 'S'),
(84, 21, 35, 2132131, 123, 262252113, 'L');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `danhmuc`
--

CREATE TABLE `danhmuc` (
  `MaDM` int(11) NOT NULL,
  `TenDM` varchar(200) DEFAULT NULL,
  `TrangThai` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `danhmuc`
--

INSERT INTO `danhmuc` (`MaDM`, `TenDM`, `TrangThai`) VALUES
(4, 'Áo khoác', 1),
(5, 'Áo sơ mi', 1),
(6, 'Áo thun', 1),
(7, 'Áo polo', 1),
(8, 'Áo cổ tròn', 1),
(9, 'Áo tay dài', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `giohang`
--

CREATE TABLE `giohang` (
  `MaTK` int(11) NOT NULL,
  `MaSP` int(11) NOT NULL,
  `SoLuong` int(11) NOT NULL,
  `MaSize` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `hoadon`
--

CREATE TABLE `hoadon` (
  `MaHD` int(11) NOT NULL,
  `MaTK` int(11) NOT NULL,
  `ThoiGian` date DEFAULT NULL,
  `ThanhToan` double DEFAULT NULL,
  `MoTa` varchar(255) DEFAULT NULL,
  `TrangThai` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `hoadon`
--

INSERT INTO `hoadon` (`MaHD`, `MaTK`, `ThoiGian`, `ThanhToan`, `MoTa`, `TrangThai`) VALUES
(7, 15, '2024-05-22', 1969450, NULL, 1),
(8, 16, '2024-05-22', 3591800, NULL, 1),
(9, 16, '2024-05-22', 1810200, NULL, 1),
(10, 15, '2024-05-22', 2278850, NULL, 1),
(11, 15, '2024-05-22', 1792400, NULL, 1),
(12, 2, '2024-05-22', 878900, NULL, 1),
(13, 2, '2024-05-22', 1455000, NULL, 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `khachhang`
--

CREATE TABLE `khachhang` (
  `MaKH` int(11) NOT NULL,
  `MaTK` int(11) NOT NULL,
  `TenKH` varchar(255) DEFAULT NULL,
  `DiaChi` varchar(255) DEFAULT NULL,
  `TrangThai` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `khachhang`
--

INSERT INTO `khachhang` (`MaKH`, `MaTK`, `TenKH`, `DiaChi`, `TrangThai`) VALUES
(4, 2, 'Lê Thị U', 'Tân Phú', 1),
(7, 15, 'Anh Thư', 'Tân Phú', 1),
(8, 16, 'baoloc', 'Tân phú', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `khuyenmai`
--

CREATE TABLE `khuyenmai` (
  `MaKM` int(11) NOT NULL,
  `TenKM` varchar(200) DEFAULT NULL,
  `PhanTramKM` double DEFAULT NULL,
  `TrangThai` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `khuyenmai`
--

INSERT INTO `khuyenmai` (`MaKM`, `TenKM`, `PhanTramKM`, `TrangThai`) VALUES
(3, 'Khuyến mãi tết', 20, 1),
(4, 'Khuyến mãi hè', 15, 1),
(5, 'Sinh nhật shop', 30, 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `nhacungcap`
--

CREATE TABLE `nhacungcap` (
  `MaNCC` int(11) NOT NULL,
  `TenNCC` varchar(255) NOT NULL,
  `TrangThai` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `nhacungcap`
--

INSERT INTO `nhacungcap` (`MaNCC`, `TenNCC`, `TrangThai`) VALUES
(14, 'Nhà cung cấp Tân Phú', 1),
(15, 'Nhà cung cấp Hòa Bình', 1),
(17, 'Nhà cung cấp Hòa Thạnh', 1),
(18, 'Nhà cung cấp Phát Tài', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `nhanvien`
--

CREATE TABLE `nhanvien` (
  `MaNV` int(11) NOT NULL,
  `MaTK` int(11) NOT NULL,
  `TenNV` varchar(255) DEFAULT NULL,
  `DiaChi` varchar(255) DEFAULT NULL,
  `TrangThai` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `nhanvien`
--

INSERT INTO `nhanvien` (`MaNV`, `MaTK`, `TenNV`, `DiaChi`, `TrangThai`) VALUES
(1, 1, 'Nguyễn Văn A', 'Tân Phú, HCM', 1),
(6, 14, 'Lê Văn B', 'HCM', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `phanquyen`
--

CREATE TABLE `phanquyen` (
  `MaQuyen` int(11) NOT NULL,
  `MaCTQ` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `phanquyen`
--

INSERT INTO `phanquyen` (`MaQuyen`, `MaCTQ`) VALUES
(1, 11),
(2, 1),
(2, 2),
(2, 3),
(2, 4),
(2, 5),
(2, 6),
(2, 7),
(2, 8),
(2, 9),
(2, 10),
(2, 11),
(2, 12),
(7, 2),
(7, 3),
(7, 4),
(7, 5),
(7, 7),
(7, 8),
(7, 10),
(7, 11),
(8, 1),
(8, 2),
(8, 4),
(8, 6),
(8, 8);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `phieunhap`
--

CREATE TABLE `phieunhap` (
  `MaPN` int(11) NOT NULL,
  `MaTK` int(11) NOT NULL,
  `MaNCC` int(11) NOT NULL,
  `ThanhToan` double NOT NULL,
  `ThoiGian` date NOT NULL,
  `TrangThai` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `phieunhap`
--

INSERT INTO `phieunhap` (`MaPN`, `MaTK`, `MaNCC`, `ThanhToan`, `ThoiGian`, `TrangThai`) VALUES
(14, 1, 15, 4800000, '2024-05-22', 1),
(15, 1, 14, 18270000, '2024-05-22', 1),
(16, 1, 18, 39100000, '2024-05-22', 1),
(17, 1, 14, 25200000, '2024-05-22', 1),
(18, 1, 15, 52900000, '2024-05-22', 1),
(19, 1, 15, 38640000, '2024-05-22', 1),
(20, 1, 14, 89930000, '2024-05-22', 1),
(21, 1, 15, 262252113, '2024-06-07', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `quyen`
--

CREATE TABLE `quyen` (
  `MaQuyen` int(11) NOT NULL,
  `TenQuyen` varchar(255) NOT NULL,
  `TrangThai` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `quyen`
--

INSERT INTO `quyen` (`MaQuyen`, `TenQuyen`, `TrangThai`) VALUES
(1, 'User', 1),
(2, 'Admin', 1),
(7, 'Quyền QL Nhập hàng', 1),
(8, 'Quyền QL Bán hàng', 1),
(9, 'Quyền mới', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `sanpham`
--

CREATE TABLE `sanpham` (
  `MaSP` int(11) NOT NULL,
  `MaAnhChinh` int(11) DEFAULT NULL,
  `MaKM` int(11) DEFAULT NULL,
  `MaDM` int(11) DEFAULT NULL,
  `TenSP` varchar(200) DEFAULT NULL,
  `MoTa` varchar(255) DEFAULT NULL,
  `GiaBan` double DEFAULT NULL,
  `TrangThai` int(11) DEFAULT NULL,
  `NgayTao` date DEFAULT NULL,
  `SoLuong` int(11) DEFAULT NULL,
  `GioiTinh` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `sanpham`
--

INSERT INTO `sanpham` (`MaSP`, `MaAnhChinh`, `MaKM`, `MaDM`, `TenSP`, `MoTa`, `GiaBan`, `TrangThai`, `NgayTao`, `SoLuong`, `GioiTinh`) VALUES
(32, 19, 4, 4, 'Áo khoác dù', 'Áo khoác dù mới, chất lượng', 300000, 1, '2024-05-22', 40, 2),
(33, 20, NULL, 4, 'Áo khoác gió', 'Áo khoác ấm, chống gió', 250000, 1, '2024-05-22', 145, 3),
(34, 21, 4, 4, 'Áo khoác jean', 'Áo đẹp, phong cách', 400000, 1, '2024-05-22', 115, 2),
(35, 22, 5, 4, 'Áo khoác kaki', 'Áo nâu, chất lượng, bền', 450000, 1, '2024-05-22', 159, 2),
(36, 23, NULL, 7, 'Áo polo nam', 'Áo thoáng mát', 200000, 1, '2024-05-22', 36, 2),
(37, 24, 4, 7, 'Áo polo nam đen', 'Áo đen, thời thượng, co giãn', 250000, 1, '2024-05-22', 48, 2),
(38, 25, 4, 5, 'Áo sơ mi tay ngắn', 'Áo sơ mi thoáng mát', 500000, 1, '2024-05-22', 69, 2),
(39, 26, 4, 5, 'Áo sơ mi trắng', 'Áo sơ mi trắng, thời thượng', 300000, 1, '2024-05-22', 69, 2),
(40, 27, 3, 6, 'Áo thun kẻ sọc', 'Áo thun mát mẻ, thời thượng', 300000, 1, '2024-05-22', 92, 2),
(41, 28, 4, 6, 'Áo thun nam basic', 'Áo đơn giản, đẹp', 370000, 1, '2024-05-22', 92, 2),
(42, 29, 4, 6, 'Áo thun nam', 'Áo thun mới nhập khẩu', 280000, 1, '2024-05-22', 92, 2),
(43, 30, 3, 4, 'abc', '', 120000, 0, '2024-05-22', 0, 3),
(44, 31, 3, 4, 'abc', 'asaas', 1200000, 0, '2024-05-22', 0, 3),
(45, 32, 4, 6, 'Áo thun cổ tròn', 'Áo mát mẻ, mùa hè', 217000, 1, '2024-05-22', 69, 1),
(46, 33, 4, 6, 'Áo thun rồng đen', 'Áo mới', 200000, 1, '2024-05-22', 69, 3),
(47, 34, 4, 9, 'Áo tay dài đen', '', 200000, 1, '2024-05-22', 92, 3),
(48, 35, NULL, 9, 'Áo tay dài trắng', 'Áo tay dài trắng', 345000, 1, '2024-05-22', 69, 3),
(49, 36, 4, 8, 'Áo cổ tròn xám', 'áo xám thời thượng', 300000, 1, '2024-05-22', 69, 2),
(50, 37, 4, 8, 'Áo thun cổ tròn trắng', 'áo thun cổ tròn mới nhất', 327000, 1, '2024-05-22', 92, 3),
(51, 38, 4, 8, 'Áo thun cổ tròn sọc', 'áo mới', 304000, 1, '2024-05-22', 69, 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `size`
--

CREATE TABLE `size` (
  `MaSP` int(11) NOT NULL,
  `MaSize` varchar(255) NOT NULL,
  `SoLuong` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `size`
--

INSERT INTO `size` (`MaSP`, `MaSize`, `SoLuong`) VALUES
(32, 'L', 12),
(32, 'M', 11),
(32, 'S', 14),
(33, 'L', 45),
(33, 'M', 50),
(33, 'S', 50),
(34, 'L', 21),
(34, 'M', 23),
(34, 'S', 23),
(34, 'XL', 23),
(34, 'XXL', 23),
(35, 'L', 135),
(35, 'M', 12),
(35, 'S', 12),
(36, 'L', 12),
(36, 'M', 12),
(36, 'S', 12),
(37, 'L', 12),
(37, 'M', 12),
(37, 'S', 12),
(37, 'XL', 12),
(38, 'L', 23),
(38, 'M', 23),
(38, 'S', 23),
(39, 'L', 23),
(39, 'M', 20),
(39, 'S', 23),
(40, 'L', 23),
(40, 'M', 21),
(40, 'S', 23),
(40, 'XL', 23),
(41, 'L', 23),
(41, 'M', 20),
(41, 'S', 23),
(41, 'XL', 23),
(42, 'L', 23),
(42, 'M', 23),
(42, 'S', 23),
(42, 'XL', 23),
(43, 'S', 0),
(44, 'M', 0),
(45, 'L', 22),
(45, 'M', 42),
(45, 'S', 0),
(46, 'L', 23),
(46, 'M', 13),
(46, 'S', 20),
(47, 'L', 23),
(47, 'M', 23),
(47, 'S', 23),
(47, 'XL', 23),
(48, 'L', 20),
(48, 'M', 18),
(48, 'S', 23),
(49, 'L', 23),
(49, 'M', 20),
(49, 'S', 20),
(50, 'L', 23),
(50, 'M', 16),
(50, 'S', 23),
(50, 'XL', 23),
(51, 'L', 23),
(51, 'M', 20),
(51, 'S', 23);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `taikhoan`
--

CREATE TABLE `taikhoan` (
  `MaTK` int(11) NOT NULL,
  `MaQuyen` int(11) NOT NULL,
  `TenTK` varchar(200) NOT NULL,
  `Email` varchar(255) NOT NULL,
  `SDT` int(11) NOT NULL,
  `MatKhau` varchar(255) NOT NULL,
  `ThoiGian` date NOT NULL,
  `TrangThai` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `taikhoan`
--

INSERT INTO `taikhoan` (`MaTK`, `MaQuyen`, `TenTK`, `Email`, `SDT`, `MatKhau`, `ThoiGian`, `TrangThai`) VALUES
(1, 2, 'admin', 'admin@gmail.com', 963717300, '12345', '2024-05-10', 1),
(2, 1, 'user', 'user@gmail.com', 963717333, '12345', '2024-05-10', 1),
(14, 8, 'banhang', 'banhang@gmail.com', 963717300, '12345', '2024-05-22', 1),
(15, 1, 'anhthu', 'anhthu@gmai.com', 963717322, '12345', '2024-05-15', 1),
(16, 1, 'baoloc', 'baoloc@gmail.com', 963717366, '12345', '2024-05-22', 1);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `anhchinh`
--
ALTER TABLE `anhchinh`
  ADD PRIMARY KEY (`MaAnhChinh`),
  ADD UNIQUE KEY `MaAnhChinh` (`MaAnhChinh`);

--
-- Chỉ mục cho bảng `anhphu`
--
ALTER TABLE `anhphu`
  ADD PRIMARY KEY (`MaAnhPhu`),
  ADD UNIQUE KEY `MaAnhPhu` (`MaAnhPhu`),
  ADD KEY `anhphu_fk1` (`MaAnhChinh`);

--
-- Chỉ mục cho bảng `chitietquyen`
--
ALTER TABLE `chitietquyen`
  ADD PRIMARY KEY (`MaCTQ`),
  ADD UNIQUE KEY `MaCTQ` (`MaCTQ`);

--
-- Chỉ mục cho bảng `cthoadon`
--
ALTER TABLE `cthoadon`
  ADD PRIMARY KEY (`MaCTHD`),
  ADD UNIQUE KEY `MaCTHD` (`MaCTHD`),
  ADD KEY `cthoadon_fk1` (`MaHD`),
  ADD KEY `cthoadon_fk2` (`MaSP`);

--
-- Chỉ mục cho bảng `ctphieunhap`
--
ALTER TABLE `ctphieunhap`
  ADD PRIMARY KEY (`MaCTPN`),
  ADD UNIQUE KEY `MaCTPN` (`MaCTPN`),
  ADD KEY `ctphieunhap_fk1` (`MaPN`),
  ADD KEY `ctphieunhap_fk2` (`MaSP`);

--
-- Chỉ mục cho bảng `danhmuc`
--
ALTER TABLE `danhmuc`
  ADD PRIMARY KEY (`MaDM`);

--
-- Chỉ mục cho bảng `giohang`
--
ALTER TABLE `giohang`
  ADD KEY `giohang_fk1` (`MaSP`),
  ADD KEY `giohang_fk2` (`MaTK`) USING BTREE;

--
-- Chỉ mục cho bảng `hoadon`
--
ALTER TABLE `hoadon`
  ADD PRIMARY KEY (`MaHD`),
  ADD UNIQUE KEY `MaHD` (`MaHD`),
  ADD KEY `hoadon_taikhoan_fk1` (`MaTK`);

--
-- Chỉ mục cho bảng `khachhang`
--
ALTER TABLE `khachhang`
  ADD PRIMARY KEY (`MaKH`),
  ADD UNIQUE KEY `MaKH` (`MaKH`),
  ADD KEY `khachhang_fk1` (`MaTK`);

--
-- Chỉ mục cho bảng `khuyenmai`
--
ALTER TABLE `khuyenmai`
  ADD PRIMARY KEY (`MaKM`);

--
-- Chỉ mục cho bảng `nhacungcap`
--
ALTER TABLE `nhacungcap`
  ADD PRIMARY KEY (`MaNCC`),
  ADD UNIQUE KEY `MaNCC` (`MaNCC`);

--
-- Chỉ mục cho bảng `nhanvien`
--
ALTER TABLE `nhanvien`
  ADD PRIMARY KEY (`MaNV`),
  ADD UNIQUE KEY `MaNV` (`MaNV`),
  ADD KEY `nhanvien_fk1` (`MaTK`);

--
-- Chỉ mục cho bảng `phanquyen`
--
ALTER TABLE `phanquyen`
  ADD PRIMARY KEY (`MaQuyen`,`MaCTQ`),
  ADD KEY `phanquyen_fk1` (`MaCTQ`),
  ADD KEY `MaQuyen` (`MaQuyen`) USING BTREE;

--
-- Chỉ mục cho bảng `phieunhap`
--
ALTER TABLE `phieunhap`
  ADD PRIMARY KEY (`MaPN`),
  ADD UNIQUE KEY `MaPN` (`MaPN`),
  ADD KEY `phieunhap_fk2` (`MaNCC`),
  ADD KEY `phieunhap_taikhoan_fk1` (`MaTK`);

--
-- Chỉ mục cho bảng `quyen`
--
ALTER TABLE `quyen`
  ADD PRIMARY KEY (`MaQuyen`),
  ADD UNIQUE KEY `MaQuyen` (`MaQuyen`);

--
-- Chỉ mục cho bảng `sanpham`
--
ALTER TABLE `sanpham`
  ADD PRIMARY KEY (`MaSP`),
  ADD UNIQUE KEY `MaSP` (`MaSP`),
  ADD KEY `sanpham_fk1` (`MaAnhChinh`),
  ADD KEY `fk_sanpham_danhmuc` (`MaDM`),
  ADD KEY `fk_sanpham_khuyenmai` (`MaKM`);

--
-- Chỉ mục cho bảng `size`
--
ALTER TABLE `size`
  ADD PRIMARY KEY (`MaSP`,`MaSize`),
  ADD KEY `MaSP` (`MaSP`) USING BTREE,
  ADD KEY `MaSize` (`MaSize`) USING BTREE;

--
-- Chỉ mục cho bảng `taikhoan`
--
ALTER TABLE `taikhoan`
  ADD PRIMARY KEY (`MaTK`),
  ADD UNIQUE KEY `MaTK` (`MaTK`),
  ADD KEY `taikhoan_fk1` (`MaQuyen`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `anhchinh`
--
ALTER TABLE `anhchinh`
  MODIFY `MaAnhChinh` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT cho bảng `anhphu`
--
ALTER TABLE `anhphu`
  MODIFY `MaAnhPhu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT cho bảng `chitietquyen`
--
ALTER TABLE `chitietquyen`
  MODIFY `MaCTQ` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT cho bảng `cthoadon`
--
ALTER TABLE `cthoadon`
  MODIFY `MaCTHD` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT cho bảng `ctphieunhap`
--
ALTER TABLE `ctphieunhap`
  MODIFY `MaCTPN` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=85;

--
-- AUTO_INCREMENT cho bảng `danhmuc`
--
ALTER TABLE `danhmuc`
  MODIFY `MaDM` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT cho bảng `hoadon`
--
ALTER TABLE `hoadon`
  MODIFY `MaHD` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT cho bảng `khachhang`
--
ALTER TABLE `khachhang`
  MODIFY `MaKH` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT cho bảng `khuyenmai`
--
ALTER TABLE `khuyenmai`
  MODIFY `MaKM` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT cho bảng `nhacungcap`
--
ALTER TABLE `nhacungcap`
  MODIFY `MaNCC` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT cho bảng `nhanvien`
--
ALTER TABLE `nhanvien`
  MODIFY `MaNV` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT cho bảng `phanquyen`
--
ALTER TABLE `phanquyen`
  MODIFY `MaQuyen` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT cho bảng `phieunhap`
--
ALTER TABLE `phieunhap`
  MODIFY `MaPN` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT cho bảng `quyen`
--
ALTER TABLE `quyen`
  MODIFY `MaQuyen` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT cho bảng `sanpham`
--
ALTER TABLE `sanpham`
  MODIFY `MaSP` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT cho bảng `taikhoan`
--
ALTER TABLE `taikhoan`
  MODIFY `MaTK` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `anhphu`
--
ALTER TABLE `anhphu`
  ADD CONSTRAINT `anhphu_fk1` FOREIGN KEY (`MaAnhChinh`) REFERENCES `anhchinh` (`MaAnhChinh`);

--
-- Các ràng buộc cho bảng `cthoadon`
--
ALTER TABLE `cthoadon`
  ADD CONSTRAINT `cthoadon_fk1` FOREIGN KEY (`MaHD`) REFERENCES `hoadon` (`MaHD`),
  ADD CONSTRAINT `cthoadon_fk2` FOREIGN KEY (`MaSP`) REFERENCES `sanpham` (`MaSP`);

--
-- Các ràng buộc cho bảng `ctphieunhap`
--
ALTER TABLE `ctphieunhap`
  ADD CONSTRAINT `ctphieunhap_fk1` FOREIGN KEY (`MaPN`) REFERENCES `phieunhap` (`MaPN`),
  ADD CONSTRAINT `ctphieunhap_fk2` FOREIGN KEY (`MaSP`) REFERENCES `sanpham` (`MaSP`);

--
-- Các ràng buộc cho bảng `giohang`
--
ALTER TABLE `giohang`
  ADD CONSTRAINT `giohang_fk1` FOREIGN KEY (`MaSP`) REFERENCES `size` (`MaSP`),
  ADD CONSTRAINT `giohang_taikhoan_fk1` FOREIGN KEY (`MaTK`) REFERENCES `taikhoan` (`MaTK`);

--
-- Các ràng buộc cho bảng `hoadon`
--
ALTER TABLE `hoadon`
  ADD CONSTRAINT `hoadon_taikhoan_fk1` FOREIGN KEY (`MaTK`) REFERENCES `taikhoan` (`MaTK`);

--
-- Các ràng buộc cho bảng `khachhang`
--
ALTER TABLE `khachhang`
  ADD CONSTRAINT `khachhang_fk1` FOREIGN KEY (`MaTK`) REFERENCES `taikhoan` (`MaTK`);

--
-- Các ràng buộc cho bảng `nhanvien`
--
ALTER TABLE `nhanvien`
  ADD CONSTRAINT `nhanvien_fk1` FOREIGN KEY (`MaTK`) REFERENCES `taikhoan` (`MaTK`);

--
-- Các ràng buộc cho bảng `phanquyen`
--
ALTER TABLE `phanquyen`
  ADD CONSTRAINT `phanquyen_fk0` FOREIGN KEY (`MaQuyen`) REFERENCES `quyen` (`MaQuyen`),
  ADD CONSTRAINT `phanquyen_fk1` FOREIGN KEY (`MaCTQ`) REFERENCES `chitietquyen` (`MaCTQ`);

--
-- Các ràng buộc cho bảng `phieunhap`
--
ALTER TABLE `phieunhap`
  ADD CONSTRAINT `phieunhap_fk2` FOREIGN KEY (`MaNCC`) REFERENCES `nhacungcap` (`MaNCC`),
  ADD CONSTRAINT `phieunhap_taikhoan_fk1` FOREIGN KEY (`MaTK`) REFERENCES `taikhoan` (`MaTK`);

--
-- Các ràng buộc cho bảng `sanpham`
--
ALTER TABLE `sanpham`
  ADD CONSTRAINT `fk_sanpham_danhmuc` FOREIGN KEY (`MaDM`) REFERENCES `danhmuc` (`MaDM`),
  ADD CONSTRAINT `fk_sanpham_khuyenmai` FOREIGN KEY (`MaKM`) REFERENCES `khuyenmai` (`MaKM`),
  ADD CONSTRAINT `sanpham_fk1` FOREIGN KEY (`MaAnhChinh`) REFERENCES `anhchinh` (`MaAnhChinh`);

--
-- Các ràng buộc cho bảng `size`
--
ALTER TABLE `size`
  ADD CONSTRAINT `size_fk0` FOREIGN KEY (`MaSP`) REFERENCES `sanpham` (`MaSP`);

--
-- Các ràng buộc cho bảng `taikhoan`
--
ALTER TABLE `taikhoan`
  ADD CONSTRAINT `taikhoan_fk1` FOREIGN KEY (`MaQuyen`) REFERENCES `quyen` (`MaQuyen`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
