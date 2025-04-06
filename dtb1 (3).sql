-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 06, 2025 at 08:54 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dtb1`
--

-- --------------------------------------------------------

--
-- Table structure for table `chitiethoadon`
--

CREATE TABLE `chitiethoadon` (
  `mahoadon` varchar(10) NOT NULL,
  `masanpham` varchar(10) NOT NULL,
  `soluong` int(11) NOT NULL,
  `dongia` decimal(10,0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `chitiethoadon`
--

INSERT INTO `chitiethoadon` (`mahoadon`, `masanpham`, `soluong`, `dongia`) VALUES
('HD0001', 'SP004', 1, 300000),
('HD0002', 'SP003', 1, 280000),
('HD0003', 'SP004', 1, 300000),
('HD0003', 'SP005', 1, 306000),
('HD0003', 'SP033', 1, 340000),
('HD0004', 'SP003', 1, 280000),
('HD0005', 'SP002', 1, 400000),
('HD0005', 'SP003', 1, 280000),
('HD0005', 'SP004', 1, 300000),
('HD0006', 'SP004', 12, 300000),
('HD0007', 'SP003', 3, 280000),
('HD0007', 'SP005', 5, 306000),
('HD0009', 'SP002', 5, 400000),
('HD0010', 'SP002', 6, 400000),
('HD0011', 'SP004', 1, 300000),
('HD0011', 'SP005', 3, 306000),
('HD0012', 'SP002', 1, 400000),
('HD0012', 'SP003', 1, 280000);

-- --------------------------------------------------------

--
-- Table structure for table `danhmucsp`
--

CREATE TABLE `danhmucsp` (
  `id_danhmuc` int(10) NOT NULL,
  `tendanhmuc` varchar(100) NOT NULL,
  `id_loaisp` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `danhmucsp`
--

INSERT INTO `danhmucsp` (`id_danhmuc`, `tendanhmuc`, `id_loaisp`) VALUES
(1, 'Tẩy trang', 1),
(2, 'Sữa rửa mặt', 1),
(3, 'Nước hoa hồng', 1),
(4, 'Sữa dưỡng', 1),
(5, 'Tinh chất', 1),
(6, 'Dưỡng mắt', 1),
(7, 'Kem - Gel dưỡng', 1),
(8, 'Kem chống nắng', 1),
(9, 'Mặt nạ', 1),
(10, 'Dưỡng môi', 1),
(11, 'Xịt khoáng', 1),
(12, 'Bộ sản phẩm chăm sóc da', 1),
(13, 'Eyeliner', 2),
(14, 'Kẻ chân mày', 2),
(15, 'Mascara', 2),
(16, 'Son', 2),
(17, 'Bấm mi', 2),
(18, 'Dầu gội - xả', 3),
(19, 'Dưỡng tóc', 3);

-- --------------------------------------------------------

--
-- Table structure for table `hoadon`
--

CREATE TABLE `hoadon` (
  `id` int(3) NOT NULL,
  `mahoadon` varchar(10) NOT NULL,
  `makhachhang` varchar(10) NOT NULL,
  `hoten_nhan` varchar(200) NOT NULL,
  `sdt_nhan` varchar(10) NOT NULL,
  `diachi_nhan` varchar(500) NOT NULL,
  `ngaytao` datetime NOT NULL DEFAULT current_timestamp(),
  `tongtientruocgiam` decimal(10,0) NOT NULL,
  `giamgia` int(10) NOT NULL DEFAULT 0,
  `tongtiensaugiam` decimal(10,0) NOT NULL,
  `pttt` varchar(200) NOT NULL,
  `trangthai` varchar(20) DEFAULT 'new',
  `payment_time` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `hoadon`
--

INSERT INTO `hoadon` (`id`, `mahoadon`, `makhachhang`, `hoten_nhan`, `sdt_nhan`, `diachi_nhan`, `ngaytao`, `tongtientruocgiam`, `giamgia`, `tongtiensaugiam`, `pttt`, `trangthai`, `payment_time`) VALUES
(14, 'HD0001', 'KH0002', 'Ngô Ngọc Á', '0987654321', 'aaaaaaaa', '2025-03-30 11:18:59', 300000, 0, 330000, 'tien_mat', 'Đã thanh t', NULL),
(15, 'HD0002', 'KH0002', 'Ngô Ngọc Á', '0987654321', 'aaaaa', '2025-03-30 16:20:42', 280000, 0, 310000, 'tien_mat', 'Đã thanh t', NULL),
(16, 'HD0003', 'KH0002', 'Ngô Ngọc Á', '0987654321', 'qaqqqqq', '2025-03-30 16:55:46', 946000, 0, 976000, 'tien_mat', 'Đã thanh t', NULL),
(17, 'HD0004', 'KH0002', 'Ngô Ngọc Á', '0987654321', 'aaaaaaaaaaaaaa', '2025-03-30 16:56:57', 280000, 0, 310000, 'tien_mat', 'Đã thanh t', NULL),
(18, 'HD0005', 'KH0002', 'Ngô Ngọc Á', '0987654321', 'rrrrrrrrrrrr', '2025-03-30 17:03:12', 980000, 0, 1010000, 'tien_mat', 'Đã thanh t', NULL),
(19, 'HD0006', 'KH0002', 'Ngô Ngọc Á', '0987654321', 'uuuuuuuu', '2025-03-30 17:16:29', 3600000, 5, 3450000, 'tien_mat', 'Đã thanh t', NULL),
(20, 'HD0007', 'KH0002', 'Ngô Ngọc Á', '0987654321', 'aaaaaaaaaaa', '2025-03-30 17:31:36', 2370000, 10, 2163000, 'tien_mat', 'Đã thanh t', NULL),
(21, 'HD0008', 'KH0002', 'Ngô Ngọc Á', '0987654321', 'AAAAAAA', '2025-03-31 14:40:57', 2400000, 5, 2310000, 'tien_mat', 'new', NULL),
(22, 'HD0009', 'KH0002', 'Ngô Ngọc Á', '0987654321', 'aaaaaaaaa', '2025-03-31 14:42:09', 2000000, 5, 1930000, 'tien_mat', 'Đã thanh toán', NULL),
(23, 'HD0010', 'KH0002', 'Ngô Ngọc Á', '0987654321', 'aaaaa', '2025-04-01 07:37:44', 2400000, 5, 2310000, 'tien_mat', 'new', NULL),
(24, 'HD0011', 'KH0002', 'Ngô Ngọc Ánh', '0987654321', 'nnnn', '2025-04-01 17:03:49', 1218000, 5, 1187100, 'tien_mat', 'Đã thanh toán', NULL),
(25, 'HD0012', 'KH0002', 'Ngô Ngọc Á', '0987654321', 'za', '2025-04-01 17:04:38', 680000, 5, 676000, 'tien_mat', 'new', NULL);

--
-- Triggers `hoadon`
--
DELIMITER $$
CREATE TRIGGER `trg_generate_mahoadon` BEFORE INSERT ON `hoadon` FOR EACH ROW BEGIN
    DECLARE last_id INT;
    DECLARE new_mahoadon VARCHAR(10);
    
    -- Lấy số ID lớn nhất từ bảng hóa đơn
    SELECT COALESCE(MAX(CAST(SUBSTRING(mahoadon, 3, 4) AS UNSIGNED)), 0) + 1 INTO last_id FROM hoadon;
    
    -- Tạo mã hóa đơn mới theo định dạng HD0001, HD0002, ...
    SET new_mahoadon = CONCAT('HD', LPAD(last_id, 4, '0'));

    -- Gán mã mới vào bản ghi chuẩn bị insert
    SET NEW.mahoadon = new_mahoadon;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `incrementtable`
--

CREATE TABLE `incrementtable` (
  `TableName` varchar(50) NOT NULL,
  `CurrentValue` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `incrementtable`
--

INSERT INTO `incrementtable` (`TableName`, `CurrentValue`) VALUES
('khachhang', 9),
('nhanvien', 12),
('SanPham', 82);

-- --------------------------------------------------------

--
-- Table structure for table `khachhang`
--

CREATE TABLE `khachhang` (
  `id` varchar(50) NOT NULL,
  `tenkhachhang` varchar(100) NOT NULL,
  `email` varchar(100) DEFAULT NULL,
  `sdt` varchar(15) NOT NULL,
  `password` varchar(200) NOT NULL,
  `ngaysinh` date DEFAULT NULL,
  `id_rank` int(3) NOT NULL,
  `point` int(6) NOT NULL DEFAULT 50,
  `verification_code` int(6) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `khachhang`
--

INSERT INTO `khachhang` (`id`, `tenkhachhang`, `email`, `sdt`, `password`, `ngaysinh`, `id_rank`, `point`, `verification_code`) VALUES
('KH0002', 'Ngô Ngọc Á', 'ngoanh2345@gmail.com', '0987654321', '$2y$10$.wPymwBoKVq6nAldWBHL1uERSjfH9nQkwuZ5IWHcMxFdpT.e.eg/e', '2003-11-25', 3, 5638, NULL),
('KH0003', 'Vũ Nguyên Hương', 'ngongocanh15072311@gmail.com', '0000000000', '$2y$10$d50RdGxa9wo5oSbTKzt0/.NAX0NgmkRrOw66WeNcmoulaC7613s5i', '2003-11-25', 1, 50, 576270),
('KH0004', 'UUUUUUUUUU', 'ngoanh2311@gmail.com', '1111111111', '$2y$10$J3UQWi0ziIHmVRoIx6HKReiwUaEydo4RxDmwcK8rEXiXAi4aWufFS', '2003-11-25', 1, 50, NULL),
('KH0005', 'aaaa', 'sfsgg@gmail.com', '123456', '$2y$10$.Nfl21z/wAXXXa9tII35KeTmZt6xffMk88OiJQRjdZ/ThfeNqH8FG', '2003-11-23', 1, 50, NULL),
('KH0006', 'aaaaaaaaaaaaaaaaa', 'dgthtymj@gmail.com', '123556876', '$2y$10$FUGS5xN1K5QxCuCS6LeuE.veefXyRi7AL8ePUE8ED51Pv2ibIOjVu', '2003-11-23', 1, 50, NULL),
('KH0007', 'dkvbjfbvkj', 'ngtye@gmail.com', '24568976543', '$2y$10$yVjtIlaKB3l31PxAoiI8BeGM4RCmB0MQTVhGKrMhNPvKYCNTDuYwq', '3456-12-31', 1, 50, NULL),
('KH0008', 'Ngô Lan Anh', 'abcded@gmail.com', '03947573212', '$2y$10$hUqebhA6UnlnrbqI1XooCOWHqs6Ji.vX2aANZodQj1XtDgdP/06vy', '2003-11-23', 1, 50, NULL),
('KH0009', 'Trần Văn B', 'ngfnyk@gmail.com', '1234567890', '$2y$10$DMA/JEHWpHpqdFl6iZZBJOwSqmO1n/RxaqQaRobXUhoZrcF.Cz.GK', '0000-00-00', 1, 50, NULL);

--
-- Triggers `khachhang`
--
DELIMITER $$
CREATE TRIGGER `before_insert_khachhang` BEFORE INSERT ON `khachhang` FOR EACH ROW BEGIN
    DECLARE next_value INT;

    -- Kiểm tra xem bảng IncrementTable đã có dữ liệu cho khachhang chưa
    IF (SELECT COUNT(*) FROM IncrementTable WHERE TableName = 'khachhang') = 0 THEN
        -- Nếu chưa có, thêm mới với giá trị bắt đầu là 0
        INSERT INTO IncrementTable (TableName, CurrentValue) VALUES ('khachhang', 0);
    END IF;

    -- Lấy giá trị hiện tại từ IncrementTable
    SELECT CurrentValue INTO next_value FROM IncrementTable WHERE TableName = 'khachhang' FOR UPDATE;

    -- Sinh mã khách hàng tự động (VD: KH0001, KH0002, ...)
    SET NEW.id = CONCAT('KH', LPAD(next_value + 1, 4, '0'));

    -- Cập nhật giá trị trong IncrementTable
    UPDATE IncrementTable SET CurrentValue = next_value + 1 WHERE TableName = 'khachhang';
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `loaisp`
--

CREATE TABLE `loaisp` (
  `id_loaisp` int(10) NOT NULL,
  `tenloai` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `loaisp`
--

INSERT INTO `loaisp` (`id_loaisp`, `tenloai`) VALUES
(1, 'Chăm sóc da mặt'),
(2, 'Make up'),
(3, 'Chăm sóc tóc và cơ thể');

-- --------------------------------------------------------

--
-- Table structure for table `nhanvien`
--

CREATE TABLE `nhanvien` (
  `manhanvien` varchar(50) NOT NULL,
  `tennhanvien` varchar(50) NOT NULL,
  `sdt` varchar(20) NOT NULL,
  `password` varchar(200) DEFAULT NULL,
  `id_role` int(2) DEFAULT NULL,
  `trangthai` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `nhanvien`
--

INSERT INTO `nhanvien` (`manhanvien`, `tennhanvien`, `sdt`, `password`, `id_role`, `trangthai`) VALUES
('NV002', 'Ngô Ngọc Ánh', '0987654321', '$2y$10$WiLFDeTzqDRiER8LJWi96.GSCQjyTMdK5X0VcoqMY3lDFLdAO3ooy', 1, 1),
('NV003', 'Vũ Nguyên Hương', '0123456777', '$2y$10$jTEcVtfL3aL3.C00m6KtwuXB.gRLVt3Muzk2yHk13Jb9KOxeSQ1Te', 2, 1),
('NV004', 'Nguyễn Thị A', '0987678998', '$2y$10$bnSype0Mn8eBdTBXx0LiLekggFTtBQA4aTPrTP8ArqVzh1wQwrN1O', 1, 1),
('NV005', 'Nguyễn Thị AB', '0827928097', '$2y$10$4Ik8gUqkVlUKhL6avHTJuuPsYfXiKkYkUcFTSFleUnL0/1yEXfTy2', 2, 0),
('NV007', 'Nguyễn Thị ABCD', '0898989898', '$2y$10$8M87s9QIz8OwkZYluDbBoukug/oGIuZ/gBZX.IiZl1ed81U3OR37G', 1, 1),
('NV009', 'Ngô Ngọc Ánh', '0123456789', '$2y$10$OWobB1DWhAIdWh6W0S89Wey8e7tRQfDD5tI6xY5BAqhwefUQynN9.', 1, 1),
('NV010', 'Ngô Ngọc Ánh', '02745486759', '$2y$10$uEnXAAbeNPMHHOtwPNSwU.vDQ4S25xLZG4oLQ1Y/BGKbCVaYGbl6.', 1, 1),
('NV011', 'Ngô Ngọc Ánh', '09859395396', '$2y$10$7LjQlh2Hz1BtjOWoyFUPlO5XoTxLMuL865V5XOsV7msL1nGrAQb.a', 2, 1),
('NV012', 'Vũ Nguyên Hương', '0657482934', '$2y$10$/wTGHhdKT/bJLSRddM5V6.8gweNho1f1iLp7wB4IOze8ZI1152BZa', 1, 1);

--
-- Triggers `nhanvien`
--
DELIMITER $$
CREATE TRIGGER `before_insert_nhanvien` BEFORE INSERT ON `nhanvien` FOR EACH ROW BEGIN
    DECLARE new_value INT;
    
    -- Lấy giá trị hiện tại từ bảng incrementtable
    SELECT CurrentValue + 1 INTO new_value FROM incrementtable WHERE TableName = 'nhanvien' FOR UPDATE;
    
    -- Cập nhật giá trị mới vào bảng incrementtable
    UPDATE incrementtable SET CurrentValue = new_value WHERE TableName = 'nhanvien';

    -- Gán mã nhân viên theo format NVxxx
    SET NEW.MaNhanVien = CONCAT('NV', LPAD(new_value, 3, '0'));
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `rank`
--

CREATE TABLE `rank` (
  `id_rank` int(3) NOT NULL,
  `name` varchar(50) NOT NULL,
  `Min_point` int(10) NOT NULL,
  `discount` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `rank`
--

INSERT INTO `rank` (`id_rank`, `name`, `Min_point`, `discount`) VALUES
(1, 'Member', 0, 0),
(2, 'Silver', 2000, 5),
(3, 'Gold', 4000, 10),
(4, 'Diamond', 8000, 15);

-- --------------------------------------------------------

--
-- Table structure for table `role`
--

CREATE TABLE `role` (
  `id_role` int(2) NOT NULL,
  `ten` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `role`
--

INSERT INTO `role` (`id_role`, `ten`) VALUES
(1, 'Admin'),
(2, 'Nhân viên ');

-- --------------------------------------------------------

--
-- Table structure for table `sanpham`
--

CREATE TABLE `sanpham` (
  `masanpham` varchar(50) NOT NULL,
  `id_danhmuc` int(11) NOT NULL,
  `tensanpham` varchar(500) NOT NULL,
  `mota` text DEFAULT NULL,
  `giagoc` decimal(10,0) DEFAULT NULL,
  `rate` int(5) DEFAULT NULL,
  `hinhanh` varchar(255) DEFAULT NULL,
  `hinhanh1` varchar(100) DEFAULT NULL,
  `hinhanh2` varchar(100) DEFAULT NULL,
  `hinhanh3` varchar(100) DEFAULT NULL,
  `hinhanh4` varchar(100) DEFAULT NULL,
  `soluong` int(11) DEFAULT NULL,
  `ngay_them` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `sanpham`
--

INSERT INTO `sanpham` (`masanpham`, `id_danhmuc`, `tensanpham`, `mota`, `giagoc`, `rate`, `hinhanh`, `hinhanh1`, `hinhanh2`, `hinhanh3`, `hinhanh4`, `soluong`, `ngay_them`) VALUES
('SP002', 1, 'Nước tẩy trang dưỡng ẩm INNISFREE Green Tea Hydrating Amino Acid Cleansing Water 320G', '<div class=\"container\">\n<details>\n<summary>Th&ocirc;ng tin sản phẩm <span class=\"arrow\">▾</span></summary>\n<div class=\"content\">\n<p><strong>Th&acirc;n thiện với m&ocirc;i trường:</strong></p>\n<p>- Cả nắp v&agrave; hộp đựng đều được l&agrave;m ho&agrave;n to&agrave;n bằng nhựa PP để dễ d&agrave;ng t&aacute;i chế.</p>\n<p>- Nắp nhựa c&oacute; thể t&aacute;i chế.</p>\n<p><strong>Chứng nhận thuần chay:</strong></p>\n<p>- Sản phẩm đ&atilde; được Cơ quan Chứng nhận Vegan tại H&agrave;n Quốc x&aacute;c nhận l&agrave; sản phẩm thuần chay.</p>\n</div>\n</details>\n<hr><!-- Đường kẻ ngang ngăn cách -->\n<details>\n<summary>Hướng dẫn sử dụng <span class=\"arrow\">▾</span></summary>\n<div class=\"content\">\n<p>- Lấy một lượng th&iacute;ch hợp rồi nhẹ nh&agrave;ng tạo bọt.</p>\n<p>- Massage l&ecirc;n to&agrave;n bộ khu&ocirc;n mặt. Sau đ&oacute; rửa sạch với nước ấm.</p>\n</div>\n</details>\n</div>', 400000, NULL, 'duong_moi_1.jpg', 'srm2.jpg', 'duong_moi_1.jpg', 'toner_2.jpg', 'sua_duong_2.jpg', 99, '2024-12-01 22:45:16'),
('SP003', 2, 'Sữa rửa mặt dưỡng ẩm da từ trà xanh INNISFREE Green Tea Amino Cleansing Foam 150g', '<div class=\"container\">\r\n<details>\r\n<summary>Th&ocirc;ng tin sản phẩm <span class=\"arrow\">▾</span></summary>\r\n<div class=\"content\">\r\n<p><strong>Th&acirc;n thiện với m&ocirc;i trường:</strong></p>\r\n<p>- Cả nắp v&agrave; hộp đựng đều được l&agrave;m ho&agrave;n to&agrave;n bằng nhựa PP để dễ d&agrave;ng t&aacute;i chế.</p>\r\n<p>- Nắp nhựa c&oacute; thể t&aacute;i chế.</p>\r\n<p><strong>Chứng nhận thuần chay:</strong></p>\r\n<p>- Sản phẩm đ&atilde; được Cơ quan Chứng nhận Vegan tại H&agrave;n Quốc x&aacute;c nhận l&agrave; sản phẩm thuần chay.</p>\r\n</div>\r\n</details>\r\n<hr><!-- Đường kẻ ngang ngăn cách -->\r\n<details>\r\n<summary>Hướng dẫn sử dụng <span class=\"arrow\">▾</span></summary>\r\n<div class=\"content\">\r\n<p>- Lấy một lượng th&iacute;ch hợp rồi nhẹ nh&agrave;ng tạo bọt.</p>\r\n<p>- Massage l&ecirc;n to&agrave;n bộ khu&ocirc;n mặt. Sau đ&oacute; rửa sạch với nước ấm.</p>\r\n</div>\r\n</details>\r\n</div>', 280000, NULL, 'srm2.jpg', '', '', '', '', 66, '2024-12-09 22:44:57'),
('SP004', 3, 'Nước cân bằng phục hồi da và ngăn ngừa lão hóa từ trà đen INNISFREE Black Tea Enhancing Skin 170 mL', '<div class=\"container\">\r\n<details>\r\n<summary>Thông tin sản phẩm <span class=\"arrow\">▾</span></summary>\r\n<div class=\"content\">\r\n<p><strong>Thân thiện với môi trường:</strong></p>\r\n<p>Nước cân bằng độ ẩm cho da innisfree Green Tea Seed Hyaluronic Skin, cấp ẩm cho làn da tươi mát và mịn màng.</p>\r\n<p><strong>Chứng nhận thuần chay:</strong></p>\r\n<p>Sản phẩm đã được Cơ quan Chứng nhận Vegan tại Hàn Quốc xác nhận là sản phẩm thuần chay.</p>\r\n</div>\r\n</details>\r\n<hr><!-- Đường kẻ ngang ngăn cách -->\r\n<details>\r\n<summary>Hướng dẫn sử dụng <span class=\"arrow\">▾</span></summary>\r\n<div class=\"content\">\r\n<p>- Lấy một lượng tinh chất vừa phải ra bông tẩy trang.</p>\r\n<p>- Lau nhẹ nhàng lên khuôn mặt để tính chất thẩm thẩu từ từ và nhẹ nhàng vào làn da.</p>\r\n</div>\r\n</details>', 300000, NULL, 'toner_2.jpg', '', '', '', '', 53, '2024-12-11 15:58:07'),
('SP005', 4, 'Sữa dưỡng dành cho da mụn innisfree Bija Trouble Lotion 100 mL', '<div class=\"container\">\r\n<details>\r\n<summary>Thông tin sản phẩm <span class=\"arrow\">▾</span></summary>\r\n<div class=\"content\">\r\n<p><strong>Công dụng:</strong></p>\r\n<p>- Bija hấp thụ tinh hoa thiên nhiên suốt một khoảng thời gian dài, nhẹ nhàng làm dịu và tăng sức đề kháng cho da. Từ đó, tình trạng làn da được cải thiện đáng kể. innisfree lựa chọn hình thức thương mại công bằng, thu mua Bija được trồng tại Songdang-ri, Jeju. Nhờ vậy, innisfree đã mang lại nguồn thu nhập mới và thúc đẩy phát triển cộng đồng nơi đây.\r\n</p>\r\n<p>- Sữa dưỡng cung cấp độ ẩm và làm dịu da, kiểm soát lượng dầu thừa ngăn ngừa mụn phát sinh giúp làn da luôn ẩm mềm</p>\r\n<p>- Sản phẩm đạt kết quả thử nghiệm Noncomedogenic, an toàn cho da mụn. Dầu hạt Bija Jeju giúp làm dịu và bảo vệ vùng da gặp rắc rối về vấn đề mụn.</p>\r\n<p><strong>Chứng nhận:</strong></p>\r\n<p>Sản phẩm đạt chứng nhận 6 không (không parabens, không màu tổng hợp, không dầu khoáng, không dầu động vật, không mùi hương nhân tạo, không imidazolidinyl urea).</p>\r\n</div>\r\n</details>\r\n<hr><!-- Đường kẻ ngang ngăn cách -->\r\n<details>\r\n<summary>Hướng dẫn sử dụng <span class=\"arrow\">▾</span></summary>\r\n<div class=\"content\">\r\n<p>Sau khi dùng nước cân bằng da, lấy một lượng thích hợp thoa đều lên mặt.</p>\r\n</div>\r\n</details>', 306000, NULL, 'sua_duong_2.jpg', '', '', '', '', 7, '2024-12-11 16:07:53'),
('SP006', 5, 'Tinh chất dưỡng da từ hoa lan Innisfree Jeju Orchid Enriched Essence 50ml', '<div class=\"container\">\r\n<details>\r\n<summary>Thông tin sản phẩm <span class=\"arrow\">▾</span></summary>\r\n<div class=\"content\">\r\n<p><strong>Công dụng:</strong></p>\r\n<p>- Với hoạt chất Orchidelixir 2.0™ có trong hoa lan- loài hoa có sức sống mãnh liệt nở rộ ngay cả trong thời tiết lạnh giá, khắc nghiệt để cung cấp dưỡng chất giúp cải thiện các vấn đề về lão hóa da.\r\n</p>\r\n<p>- Hyaluronic Acid từ đậu xanh Jeju và chiết xuất bột yến mạch giúp cải thiện độ săn chắc và căng bóng cho da ngay sau khi sử dụng.</p>\r\n<p>- Sản phẩm chứa 4% đường tự nhiên được chiết xuất từ ​​yến mạch, tăng độ săn chắc, đàn hồi cho làn da với kết cấu sánh đặc giúp cung cấp dưỡng chất thiết yếu cho da.</p>\r\n<p><strong>Chứng nhận:</strong></p>\r\n<p>Sản phẩm đạt chứng nhận 6 không (không parabens, không màu tổng hợp, không dầu khoáng, không dầu động vật, không mùi hương nhân tạo, không imidazolidinyl urea).</p>\r\n</div>\r\n</details>\r\n<hr><!-- Đường kẻ ngang ngăn cách -->\r\n<details>\r\n<summary>Hướng dẫn sử dụng <span class=\"arrow\">▾</span></summary>\r\n<div class=\"content\">\r\n<p>Bơm 1-2 lần và thoa đều khắp mặt, sau đó vỗ nhẹ để sản phẩm được thẩm thấu.</p>\r\n</div>\r\n</details>', 785000, NULL, 'tinh_chat_1.jpg', '', '', '', '', 10, '2024-12-11 16:16:20'),
('SP007', 1, 'Dầu tẩy trang INNISFREE Green Tea Hydrating Amino Acid Cleansing Oil 150 mL', '<div class=\"container\">\r\n<details>\r\n<summary>Th&ocirc;ng tin sản phẩm <span class=\"arrow\">▾</span></summary>\r\n<div class=\"content\">\r\n<p><strong>Th&acirc;n thiện với m&ocirc;i trường:</strong></p>\r\n<p>- Cả nắp v&agrave; hộp đựng đều được l&agrave;m ho&agrave;n to&agrave;n bằng nhựa PP để dễ d&agrave;ng t&aacute;i chế.</p>\r\n<p>- Nắp nhựa c&oacute; thể t&aacute;i chế.</p>\r\n<p><strong>Chứng nhận thuần chay:</strong></p>\r\n<p>- Sản phẩm đ&atilde; được Cơ quan Chứng nhận Vegan tại H&agrave;n Quốc x&aacute;c nhận l&agrave; sản phẩm thuần chay.</p>\r\n</div>\r\n</details>\r\n<hr><!-- Đường kẻ ngang ngăn cách -->\r\n<details>\r\n<summary>Hướng dẫn sử dụng <span class=\"arrow\">▾</span></summary>\r\n<div class=\"content\">\r\n<p>- Lấy một lượng th&iacute;ch hợp rồi nhẹ nh&agrave;ng tạo bọt.</p>\r\n<p>- Massage l&ecirc;n to&agrave;n bộ khu&ocirc;n mặt. Sau đ&oacute; rửa sạch với nước ấm.</p>\r\n</div>\r\n</details>\r\n</div>', 510000, NULL, 'tay_trang_1.jpg', '', '', '', '', 98, '2024-12-09 22:45:12'),
('SP009', 1, 'Kem dưỡng', '<p>jhdgfefbjbd</p>', 400000, NULL, 'duong_toc_3.jpg', '', '', '', '', 300, NULL),
('SP010', 2, 'Sữa rửa mặt se khít lỗ chân lông INNISFREE Volcanic Pore BHA Cleansing Foam 150 g', '<div class=\"container\">\r\n<details>\r\n<summary>Th&ocirc;ng tin sản phẩm <span class=\"arrow\">▾</span></summary>\r\n<div class=\"content\">\r\n<p><strong>Th&acirc;n thiện với m&ocirc;i trường:</strong></p>\r\n<p>- Cả nắp v&agrave; hộp đựng đều được l&agrave;m ho&agrave;n to&agrave;n bằng nhựa PP để dễ d&agrave;ng t&aacute;i chế.</p>\r\n<p>- Nắp nhựa c&oacute; thể t&aacute;i chế.</p>\r\n<p><strong>Chứng nhận thuần chay:</strong></p>\r\n<p>- Sản phẩm đ&atilde; được Cơ quan Chứng nhận Vegan tại H&agrave;n Quốc x&aacute;c nhận l&agrave; sản phẩm thuần chay.</p>\r\n</div>\r\n</details>\r\n<hr><!-- Đường kẻ ngang ngăn cách -->\r\n<details>\r\n<summary>Hướng dẫn sử dụng <span class=\"arrow\">▾</span></summary>\r\n<div class=\"content\">\r\n<p>- Lấy một lượng th&iacute;ch hợp rồi nhẹ nh&agrave;ng tạo bọt.</p>\r\n<p>- Massage l&ecirc;n to&agrave;n bộ khu&ocirc;n mặt. Sau đ&oacute; rửa sạch với nước ấm.</p>\r\n</div>\r\n</details>\r\n</div>', 260000, NULL, 'srm1.png', '', '', '', '', 89, '2024-12-09 22:45:03'),
('SP011', 2, 'Sữa rửa mặt dưỡng ẩm da từ trà xanh INNISFREE Green Tea Amino Cleansing Foam 150g', '<div class=\"container\">\r\n<details>\r\n<summary>Th&ocirc;ng tin sản phẩm <span class=\"arrow\">▾</span></summary>\r\n<div class=\"content\">\r\n<p><strong>Th&acirc;n thiện với m&ocirc;i trường:</strong></p>\r\n<p>- Cả nắp v&agrave; hộp đựng đều được l&agrave;m ho&agrave;n to&agrave;n bằng nhựa PP để dễ d&agrave;ng t&aacute;i chế.</p>\r\n<p>- Nắp nhựa c&oacute; thể t&aacute;i chế.</p>\r\n<p><strong>Chứng nhận thuần chay:</strong></p>\r\n<p>- Sản phẩm đ&atilde; được Cơ quan Chứng nhận Vegan tại H&agrave;n Quốc x&aacute;c nhận l&agrave; sản phẩm thuần chay.</p>\r\n</div>\r\n</details>\r\n<hr><!-- Đường kẻ ngang ngăn cách -->\r\n<details>\r\n<summary>Hướng dẫn sử dụng <span class=\"arrow\">▾</span></summary>\r\n<div class=\"content\">\r\n<p>- Lấy một lượng th&iacute;ch hợp rồi nhẹ nh&agrave;ng tạo bọt.</p>\r\n<p>- Massage l&ecirc;n to&agrave;n bộ khu&ocirc;n mặt. Sau đ&oacute; rửa sạch với nước ấm.</p>\r\n</div>\r\n</details>\r\n</div>', 280000, NULL, 'srm2.jpg', '', '', '', '', 70, '2024-12-09 22:44:57'),
('SP013', 3, 'Nước cân bằng độ ẩm cho da INNISFREE Green Tea Hyaluronic Skin 170 mL', '<div class=\"container\">\r\n<details>\r\n<summary>Thông tin sản phẩm <span class=\"arrow\">▾</span></summary>\r\n<div class=\"content\">\r\n<p><strong>Thân thiện với môi trường:</strong></p>\r\n<p>Nước cân bằng độ ẩm cho da innisfree Green Tea Seed Hyaluronic Skin, cấp ẩm cho làn da tươi mát và mịn màng.</p>\r\n<p><strong>Chứng nhận thuần chay:</strong></p>\r\n<p>Sản phẩm đã được Cơ quan Chứng nhận Vegan tại Hàn Quốc xác nhận là sản phẩm thuần chay.</p>\r\n</div>\r\n</details>\r\n<hr><!-- Đường kẻ ngang ngăn cách -->\r\n<details>\r\n<summary>Hướng dẫn sử dụng <span class=\"arrow\">▾</span></summary>\r\n<div class=\"content\">\r\n<p>- Lấy một lượng tinh chất vừa phải ra bông tẩy trang.</p>\r\n<p>- Lau nhẹ nhàng lên khuôn mặt để tính chất thẩm thẩu từ từ và nhẹ nhàng vào làn da.</p>\r\n</div>\r\n</details>', 365000, NULL, 'toner_1.jpg', '', '', '', '', 60, '2024-12-11 22:44:57'),
('SP014', 1, 'Dầu tẩy trang INNISFREE Green Tea Hydrating Amino Acid Cleansing Oil 150 mL', '<div class=\"container\">\r\n<details>\r\n<summary>Th&ocirc;ng tin sản phẩm <span class=\"arrow\">▾</span></summary>\r\n<div class=\"content\">\r\n<p><strong>Th&acirc;n thiện với m&ocirc;i trường:</strong></p>\r\n<p>- Cả nắp v&agrave; hộp đựng đều được l&agrave;m ho&agrave;n to&agrave;n bằng nhựa PP để dễ d&agrave;ng t&aacute;i chế.</p>\r\n<p>- Nắp nhựa c&oacute; thể t&aacute;i chế.</p>\r\n<p><strong>Chứng nhận thuần chay:</strong></p>\r\n<p>- Sản phẩm đ&atilde; được Cơ quan Chứng nhận Vegan tại H&agrave;n Quốc x&aacute;c nhận l&agrave; sản phẩm thuần chay.</p>\r\n</div>\r\n</details>\r\n<hr><!-- Đường kẻ ngang ngăn cách -->\r\n<details>\r\n<summary>Hướng dẫn sử dụng <span class=\"arrow\">▾</span></summary>\r\n<div class=\"content\">\r\n<p>- Lấy một lượng th&iacute;ch hợp rồi nhẹ nh&agrave;ng tạo bọt.</p>\r\n<p>- Massage l&ecirc;n to&agrave;n bộ khu&ocirc;n mặt. Sau đ&oacute; rửa sạch với nước ấm.</p>\r\n</div>\r\n</details>\r\n</div>', 510000, NULL, 'tay_trang_1.jpg', '', '', '', '', 98, '2024-12-09 22:45:12'),
('SP015', 1, 'Sản phẩm tẩy trang mắt và môi INNISFREE Apple Seed Lip & Eye Makeup Remover 100 mL', '<div class=\"container\">\r\n<details>\r\n<summary>Th&ocirc;ng tin sản phẩm <span class=\"arrow\">▾</span></summary>\r\n<div class=\"content\">\r\n<p><strong>Th&acirc;n thiện với m&ocirc;i trường:</strong></p>\r\n<p>- Cả nắp v&agrave; hộp đựng đều được l&agrave;m ho&agrave;n to&agrave;n bằng nhựa PP để dễ d&agrave;ng t&aacute;i chế.</p>\r\n<p>- Nắp nhựa c&oacute; thể t&aacute;i chế.</p>\r\n<p><strong>Chứng nhận thuần chay:</strong></p>\r\n<p>- Sản phẩm đ&atilde; được Cơ quan Chứng nhận Vegan tại H&agrave;n Quốc x&aacute;c nhận l&agrave; sản phẩm thuần chay.</p>\r\n</div>\r\n</details>\r\n<hr><!-- Đường kẻ ngang ngăn cách -->\r\n<details>\r\n<summary>Hướng dẫn sử dụng <span class=\"arrow\">▾</span></summary>\r\n<div class=\"content\">\r\n<p>- Lấy một lượng th&iacute;ch hợp rồi nhẹ nh&agrave;ng tạo bọt.</p>\r\n<p>- Massage l&ecirc;n to&agrave;n bộ khu&ocirc;n mặt. Sau đ&oacute; rửa sạch với nước ấm.</p>\r\n</div>\r\n</details>\r\n</div>', 190000, NULL, 'tay_trang_1.jpg', '', '', '', '', 59, '2024-12-23 22:45:08'),
('SP016', 2, 'Sữa rửa mặt se khít lỗ chân lông INNISFREE Volcanic Pore BHA Cleansing Foam 150 g', '<div class=\"container\">\r\n<details>\r\n<summary>Th&ocirc;ng tin sản phẩm <span class=\"arrow\">▾</span></summary>\r\n<div class=\"content\">\r\n<p><strong>Th&acirc;n thiện với m&ocirc;i trường:</strong></p>\r\n<p>- Cả nắp v&agrave; hộp đựng đều được l&agrave;m ho&agrave;n to&agrave;n bằng nhựa PP để dễ d&agrave;ng t&aacute;i chế.</p>\r\n<p>- Nắp nhựa c&oacute; thể t&aacute;i chế.</p>\r\n<p><strong>Chứng nhận thuần chay:</strong></p>\r\n<p>- Sản phẩm đ&atilde; được Cơ quan Chứng nhận Vegan tại H&agrave;n Quốc x&aacute;c nhận l&agrave; sản phẩm thuần chay.</p>\r\n</div>\r\n</details>\r\n<hr><!-- Đường kẻ ngang ngăn cách -->\r\n<details>\r\n<summary>Hướng dẫn sử dụng <span class=\"arrow\">▾</span></summary>\r\n<div class=\"content\">\r\n<p>- Lấy một lượng th&iacute;ch hợp rồi nhẹ nh&agrave;ng tạo bọt.</p>\r\n<p>- Massage l&ecirc;n to&agrave;n bộ khu&ocirc;n mặt. Sau đ&oacute; rửa sạch với nước ấm.</p>\r\n</div>\r\n</details>\r\n</div>', 260000, NULL, 'srm1.png', '', '', '', '', 90, '2024-12-09 22:45:03'),
('SP017', 4, 'Sữa dưỡng ngăn ngừa lão hóa từ trà đen INNISFREE Black Tea Youth Enhancing Lotion 170 mL', '<div class=\"container\">\r\n<details>\r\n<summary>Thông tin sản phẩm <span class=\"arrow\">▾</span></summary>\r\n<div class=\"content\">\r\n<p><strong>Công dụng:</strong></p>\r\n<p>- Thành phần chính chiết xuất Trà Đen giúp làm dịu làn da mệt mỏi với lượng theabrownin dồi dào, giúp chống oxy hóa tuyệt vời mang lại một làn da khỏe mạnh và rạng rỡ.</p>\r\n<p>- Kết cấu dạng sữa nhẹ nhàng bao bọc và thấm sâu vào da với cảm giác mềm mại và mượt mà.</p>\r\n<p>- Làm săn chắc, dưỡng sáng, cấp ẩm, tăng cường sự rạng rỡ và phục hồi da cho việc chăm sóc da hoàn chỉnh từ việc giảm các dấu hiệu lão hóa cơ bản đến cân bằng dầu và độ ẩm trên da.</p>\r\n<p><strong>Chứng nhận thuần chay:</strong></p>\r\n<p>Sản phẩm đã được Cơ quan Chứng nhận Vegan tại Hàn Quốc xác nhận là sản phẩm thuần chay.</p>\r\n</div>\r\n</details>\r\n<hr><!-- Đường kẻ ngang ngăn cách -->\r\n<details>\r\n<summary>Hướng dẫn sử dụng <span class=\"arrow\">▾</span></summary>\r\n<div class=\"content\">\r\n<p>Lấy một lượng thích hợp rồi nhẹ nhàng thoa đều lên mặt và cổ.</p>\r\n</div>\r\n</details>', 501000, NULL, 'sua_duong_1.jpg', '', '', '', '', 50, '2024-12-11 16:07:53'),
('SP019', 6, 'Kem dưỡng vùng da mắt ngăn ngừa lão hóa chuyên sâu innisfree Perfect 9 Intensive Eye Cream 30 mL', '<div class=\"container\">\r\n<details>\r\n<summary>Thông tin sản phẩm <span class=\"arrow\">▾</span></summary>\r\n<div class=\"content\">\r\n<p><strong>Công dụng:</strong></p>\r\n<p>- Phức hợp trường sinh Jeju chống lão hóa™ #AgeDefyingElixir được tổng hợp từ 9 loại thảo mộc quý hiếm gồm nấm linh chi, ngải cứu, nấm bông, chi kim ngân, hoàng cầm, tiêu Cho-pi, diếp cát, bồ công anh, phúc bồn tử Hàn Quốc bằng phương pháp chiết xuất sóng âm, xóa tan lo lắng về 9 dấu hiệu lão hóa điển hình: Da không đều màu; da thiếu nước; da sậm màu, nám và tàn nhang, da thiếu đàn hồi, da thiếu ẩm, da xỉn màu, lỗ chân lông to; da chảy xệ, có nếp nhăn, chân chim; da nhiều tế bào chết.\r\n</p>\r\n<p>- Ngọn núi Halla đảo Jeju từ xưa đã được ví như núi trường sinh bởi vạn vật nơi đây sinh trưởng mạnh mẽ. Ẩn chứa nhiều loại thảo mộc quý, Jeju từng là nơi mà Seobok – thuộc hạ vua Tần Thũy Hoàng tìm đến vì thuốc trường sinh.\r\n</p>\r\n<p>- Kem dưỡng có kết cấu mịn giúp làm giảm quầng thâm và bọng mắt, cung cấp độ ẩm cho vùng da mắt trở nên săn chắc và đàn hồi, tái tạo đôi mắt tươi trẻ rạng ngời.\r\n</p>\r\n<p><strong>Chứng nhận:</strong></p>\r\n<p>Sản phẩm đạt chứng nhận 6 không (không parabens, không màu tổng hợp, không dầu khoáng, không dầu động vật, không mùi hương nhân tạo, không imidazolidinyl urea).</p>\r\n</div>\r\n</details>\r\n<hr><!-- Đường kẻ ngang ngăn cách -->\r\n<details>\r\n<summary>Hướng dẫn sử dụng <span class=\"arrow\">▾</span></summary>\r\n<div class=\"content\">\r\n<p>Dùng ngón áp út, thoa một lượng thích hợp lên vùng da quanh mắt, vỗ nhẹ cho hiệu quả thẩm thấu.</p>\r\n<p>[Trình tự sử dụng] Nước cân bằng - Sữa dưỡng ẩm - Sản phẩm dưỡng da (Serum) - Kem dưỡng ẩm vùng da mắt - Kem dưỡng ẩm</p>\r\n</div>\r\n</details>', 935000, NULL, 'kem_mat_1.jpg', '', '', '', '', 19, '2024-12-11 16:22:02'),
('SP020', 7, 'Kem dưỡng làm dịu và phục hồi da INNISFREE Retinol Cica Barrier Defense Cream 50 mL', '<div class=\"container\">\r\n<details>\r\n<summary>Thông tin sản phẩm <span class=\"arrow\">▾</span></summary>\r\n<div class=\"content\">\r\n<p><strong>Công dụng:</strong></p>\r\n<p>- Làm khỏe hàng rào bảo vệ da.\r\n</p>\r\n<p>- Chăm sóc làn da mụn/hư tổn/nhạy cảm.\r\n</p>\r\n<p>- Tái tạo & cải thiện bề mặt da.\r\n</p>\r\n<p>- Công thức dưỡng ẩm dạng Gel, dễ dàng lan tỏa và thẩm thấu trên da mà không gây bết dính.</p>\r\n<p>- Kiểm nghiệm không gây kích ứng - Dùng được cho nhiều loại da, kể cả da mụn.</p>\r\n<p><strong>Đối tượng sử dụng:</strong></p>\r\n<p>- Khách hàng có nhu cầu chăm sóc da, tăng cường hàng rào bảo vệ da hàng ngày (Giai đoạn Trước mụn - Ngăn ngừa mụn).</p>\r\n<p>- Khách hàng có làn da nhạy cảm, dễ bị tác động bởi yếu tố bên ngoài.</p>\r\n<p>- Khách hàng lo lắng về da khô, ửng đỏ, nhạy cảm, lỗ chân lông to và da không đều màu.</p>\r\n<p>- Khách hàng muốn làm dịu da và cải thiện mụn.</p>\r\n</div>\r\n</details>\r\n<hr><!-- Đường kẻ ngang ngăn cách -->\r\n<details>\r\n<summary>Hướng dẫn sử dụng <span class=\"arrow\">▾</span></summary>\r\n<div class=\"content\">\r\n<p>- Lấy một lượng thích hợp và nhẹ nhàng thoa lên mặt và cổ.</p>\r\n<p>- Khi sử dụng vào ban ngày nên thoa kem chống nắng để bảo vệ da.</p>\r\n</div>\r\n</details>', 671000, NULL, 'kem_duong_1.jpg', '', '', '', '', 20, '2024-12-11 16:22:02'),
('SP021', 7, 'Kem dưỡng da ngăn ngừa lão hóa từ trà đen INNISFREE Black Tea Youth Enhancing Cream 50 mL', '<div class=\"container\">\r\n<details>\r\n<summary>Thông tin sản phẩm <span class=\"arrow\">▾</span></summary>\r\n<div class=\"content\">\r\n<p><strong>Công dụng:</strong></p>\r\n<p>- Chống lão hóa.\r\n</p>\r\n<p>- Nuôi dưỡng làn da mệt mỏi từ sâu bên trong để xây dựng một nền da săn chắc và đủ ẩm.\r\n</p>\r\n<p>- Công thức giàu dưỡng chất tạo nên một lớp màng dưỡng ẩm trên da giúp mang lại hiệu quả cấp ẩm chuyên sâu, dưỡng da sáng và săn chắc, trả lại làn da tươi tắn, tràn đầy năng lượng, mạnh mẽ đẩy lùi quá trình lão hóa cho da.\r\n</p>\r\n<p>-  Thành phần chính là chiết xuất trà đen lên men ở mức 80% giúp giải phóng làn da mệt mỏi khỏi 5 dấu hiệu lão hóa sớm nhờ hàm lượng theabrownin dồi dào, giúp chống oxy hóa mạnh mẽ, mang đến cho bạn một làn da khỏe mạnh và rạng rỡ.</p>\r\n<p><strong>Đối tượng sử dụng:</strong></p>\r\n<p>- Khách hàng có nhu cầu chăm sóc da, tăng cường hàng rào bảo vệ da hàng ngày (Giai đoạn Trước mụn - Ngăn ngừa mụn).</p>\r\n<p>- Khách hàng có làn da nhạy cảm, dễ bị tác động bởi yếu tố bên ngoài.</p>\r\n<p>- Khách hàng lo lắng về da khô, ửng đỏ, nhạy cảm, lỗ chân lông to và da không đều màu.</p>\r\n<p>- Khách hàng muốn làm dịu da và cải thiện mụn.</p>\r\n</div>\r\n</details>\r\n<hr><!-- Đường kẻ ngang ngăn cách -->\r\n<details>\r\n<summary>Hướng dẫn sử dụng <span class=\"arrow\">▾</span></summary>\r\n<div class=\"content\">\r\n<p>- Lấy một lượng thích hợp và nhẹ nhàng thoa lên mặt và cổ.</p>\r\n<p>- Khi sử dụng vào ban ngày nên thoa kem chống nắng để bảo vệ da.</p>\r\n</div>\r\n</details>', 680000, NULL, 'kem_duong_2.jpg', '', '', '', '', 10, '2024-12-11 16:29:02'),
('SP022', 8, 'Kem chống nắng kiêm kem lót làm mịn lỗ chân lông innisfree UV Active Poreless Sunscreen SPF50+ PA++++ 50mL', '<div class=\"container\">\r\n<details>\r\n<summary>Thông tin sản phẩm <span class=\"arrow\">▾</span></summary>\r\n<div class=\"content\">\r\n<p><strong>Công dụng:</strong></p>\r\n<p>Kem chống nắng kiêm kem lót làm mịn lỗ chân lông innisfree UV Active Poreless Sunscreen SPF50+ PA++++ 50mL.</p>\r\n<p><strong>Đối tượng sử dụng:</strong></p>\r\n<p>- Khách hàng có nhu cầu chăm sóc da, tăng cường hàng rào bảo vệ da hàng ngày (Giai đoạn Trước mụn - Ngăn ngừa mụn).</p>\r\n<p>- Khách hàng có làn da nhạy cảm, dễ bị tác động bởi yếu tố bên ngoài.</p>\r\n<p>- Khách hàng lo lắng về da khô, ửng đỏ, nhạy cảm, lỗ chân lông to và da không đều màu.</p>\r\n<p>- Khách hàng muốn làm dịu da và cải thiện mụn.</p>\r\n</div>\r\n</details>\r\n<hr><!-- Đường kẻ ngang ngăn cách -->\r\n<details>\r\n<summary>Hướng dẫn sử dụng <span class=\"arrow\">▾</span></summary>\r\n<div class=\"content\">\r\n<p>Thoa đều sản phẩm lên những vùng da có khả năng tiếp xúc với tia UV như mặt và cơ thể. Thoa lại sản phẩm sau khi bơi hoặc tham gia các hoạt động tiết nhiều mồ hôi.</p>\r\n</div>\r\n</details>', 467000, NULL, 'kcn_1.png', '', '', '', '', 5, '2024-12-11 16:38:47'),
('SP023', 8, 'Kem dưỡng ẩm nâng tông làm sáng da và chống nắng INNISFREE Cherry Blossom Skin-Fit Tone-up Cream SPF50+ PA++++ 50 mL', '<div class=\"container\">\r\n<details>\r\n<summary>Thông tin sản phẩm <span class=\"arrow\">▾</span></summary>\r\n<div class=\"content\">\r\n<p><strong>Công dụng:</strong></p>\r\n<p>- Kem dưỡng chứa chiết xuất Lá Anh Đào Hoàng Gia + Niacinamide, đem lại làn da trắng hồng tự nhiên, da thêm mềm mượt, không còn thô ráp.</p>\r\n<p>- Chất kem mỏng nhẹ và tươi mát với khả năng chống tia UV tối ưu, giúp làn da sáng hồng tự nhiên, tạo nên lớp nền mỏng nhẹ cho da.</p>\r\n<p>- Công thức nhẹ dịu thẩm thấu nhanh vào da cùng hiệu ứng nâng tông hồng tự nhiên, đem lại làn da sáng khỏe căng mịn như cánh hoa anh đào.</p>\r\n<p>- Đem lại hiệu ứng sáng da tức thì bất kể sắc tố da, dù là tông ấm hay lạnh.</p>\r\n</div>\r\n</details>\r\n<hr><!-- Đường kẻ ngang ngăn cách -->\r\n<details>\r\n<summary>Hướng dẫn sử dụng <span class=\"arrow\">▾</span></summary>\r\n<div class=\"content\">\r\n<p>Sử dụng kem dưỡng tại bước cuối cùng của chu trình dưỡng da, khu vực mặt và cổ. Thoa thêm 1 lớp mỏng để tăng hiệu quả dưỡng sáng và nâng tông da.</p>\r\n</div>\r\n</details>', 484000, NULL, 'kcn_2.jpg', '', '', '', '', 10, '2024-12-11 16:38:47'),
('SP024', 9, 'Siêu mặt nạ đất sét đá tro núi lửa INNISFREE Super Volcanic Pore Clay Mask 2X 100 mL', '<div class=\"container\">\r\n<details>\r\n<summary>Thông tin sản phẩm <span class=\"arrow\">▾</span></summary>\r\n<div class=\"content\">\r\n<p><strong>Công dụng:</strong></p>\r\n<p>- Cấu trúc xốp khiến đá tro núi lửa Jeju có khả năng hút sạch bã nhờn, dầu thừa và các tế bào chết trên da một cách mạnh mẽ. Các khoáng chất trong nguyên liệu chăm sóc làn da sáng khỏe. Nguyên liệu quý này được loại bỏ tạp chất ở nhiệt độ cao trên 150 độ và nghiền thành bột mịn để dưỡng da.</p>\r\n<p>- Làm sạch sâu cả những bụi bẩn và dầu thừa tí hon nhất ẩn sâu trong lỗ chân lông nhờ đá tro núi lửa Jeju Volcanic Cluster Sphere™. Hiệu quả loại bỏ tế bào chết cao gấp ba lần với sức mạnh tổng hợp tro núi lửa + bột vỏ quả óc chó + AHA, thanh lọc da, làm sạch sâu và cải thiện bề mặt da.</p>\r\n<p>- Chăm sóc toàn bộ vấn đề lỗ chân lông: Se khít lỗ chân lông, kiểm soát bã nhờn, loại bỏ tế bào chết và tạp chất, loại bỏ mụn đầu đen, làm sạch sâu, dịu da, làm sáng và săn chắc da.</p>\r\n<p>- Hấp thụ 98%* bã nhờn sau môt lần sử dụng mặt nạ giúp làm sạch lỗ chân lông mạnh mẽ.</p>\r\n</div>\r\n</details>\r\n<hr><!-- Đường kẻ ngang ngăn cách -->\r\n<details>\r\n<summary>Hướng dẫn sử dụng <span class=\"arrow\">▾</span></summary>\r\n<div class=\"content\">\r\n<p>Sau khi rửa mặt, lau khô, thoa mặt nạ lên toàn mặt, lưu ý tránh vùng mắt và môi. Sau 10 phút, rửa mặt sạch với nước ấm. Dùng 1-2 lần/tuần (tùy vào tình trạng da).</p>\r\n</div>\r\n</details>', 306000, NULL, 'mat_na_1.jpg', '', '', '', '', 15, '2024-12-11 16:45:23'),
('SP025', 9, 'Mặt nạ tẩy tế bào da chết innisfree Green Barley Gommage Mask 120 mL', '<div class=\"container\">\r\n<details>\r\n<summary>Thông tin sản phẩm <span class=\"arrow\">▾</span></summary>\r\n<div class=\"content\">\r\n<p><strong>Công dụng:</strong></p>\r\n<p>- Lúa mạch xanh không hóa chất thu hoạch từ đảo Gapado chứa hàm lượng chất xơ và các thành phần dinh dưỡng khác (protein, vitamin, …) dồi dào hiệu quả trong việc làm sạch và sáng da.</p>\r\n<p>- 3 loại AHA có nguồn gốc thiên nhiên chiết xuất từ mầm lúa mạch xanh đảo Jeju giúp lấy đi tế bào chết hiệu quả cho làn da sạch mướt và tươi sáng.</p>\r\n<p>- Hiệu quả làm sạch và loại bỏ tế bào chết trên da gấp 2 lần nhờ kết hợp chức năng tẩy tế bào chết hóa học từ AHA, BHA và tẩy tế bào chết vật lý của Cellulose tự nhiên.</p>\r\n<p>- Chiết xuất từ lúa mạch xanh giàu chất xơ và protein giúp tăng cường khả năng loại bỏ tế bào chết, cải thiện bề mặt da mà không gây cảm giác khô căng trên da.</p>\r\n</div>\r\n</details>\r\n<hr><!-- Đường kẻ ngang ngăn cách -->\r\n<details>\r\n<summary>Hướng dẫn sử dụng <span class=\"arrow\">▾</span></summary>\r\n<div class=\"content\">\r\n<p>Sau khi rửa mặt và lau khô nước, lấy một lượng thích hợp khoảng bằng đồng xu thoa đều lên mặt, tránh vùng mắt và môi. Sau 3 phút, dùng đầu ngón tay miết nhẹ lên da rồi rửa sạch bằng nước. (Dùng 1-2 lần/tuần).</p>\r\n</div>\r\n</details>', 221000, NULL, 'mat_na_2.jpg', '', '', '', '', 25, '2024-12-11 16:45:23'),
('SP026', 10, 'Son dưỡng môi chuyên sâu INNISFREE Dewy Treatment Lip Balm 3.2 g', '<div class=\"container\">\r\n<details>\r\n<summary>Thông tin sản phẩm <span class=\"arrow\">▾</span></summary>\r\n<div class=\"content\">\r\n<p><strong>Công dụng:</strong></p>\r\n<p>- Liệu pháp giúp phục hồi đôi môi nứt nẻ và nuôi dưỡng chuyên sâu vào ban đêm nhờ chiết xuất dầu hạt hoa trà từ đảo Jeju và bơ hạt mỡ, cho đôi môi luôn được cấp ẩm và mềm mại vào mỗi sáng thức dậy.</p>\r\n<p>- Son lên môi tạo một lớp màng mỏng nhẹ như nhung giúp bảo vệ và lưu giữ độ ẩm lâu hơn, hạn chế tình trạng khô và bong tróc.</p>\r\n<p>- Son dưỡng với công thức sạch #Clean Recipe đã được kiểm nghiệm da liệu, thích hợp sử dụng mỗi tối.</p>\r\n<p><strong>Chứng nhận:</strong></p>\r\n<p>Không nguyên liệu Động vật; Không dầu khoáng; Không Parabens; Không bột Talc; Không Polyacrylamide; Không hương liệu; Không màu tổng hợp; Không Imidazolidinyl Urea; Không Triethanolamine; Không Silicone Oil; Không chất hoạt động bề mặt PEG.</p>\r\n</div>\r\n</details>\r\n<hr><!-- Đường kẻ ngang ngăn cách -->\r\n<details>\r\n<summary>Hướng dẫn sử dụng <span class=\"arrow\">▾</span></summary>\r\n<div class=\"content\">\r\n<p>Thoa nhẹ nhàng lượng thích hợp lên môi.</p>\r\n<p>*Tip: Thoa một lớp dày trên môi trước khi ngủ để môi được mềm mịn và đủ ẩm vào sáng hôm sau.</p>\r\n</div>\r\n</details>', 306000, NULL, 'duong_moi_1.jpg', '', '', '', '', 15, '2024-12-11 16:51:34'),
('SP027', 10, 'Son dưỡng ẩm không màu INNISFREE Canola Honey Lip Balm 3.5 g', '<div class=\"container\">\r\n<details>\r\n<summary>Thông tin sản phẩm <span class=\"arrow\">▾</span></summary>\r\n<div class=\"content\">\r\n<p><strong>Công dụng:</strong></p>\r\n<p>- Mật ong canola quý được thu hoạch từ vườn hoa cải vào tháng 4. Mật ong nổi tiếng giàu flavonoid và protein, cùng hương thơm ngọt ngào như đứng giữa vườn hoa mùa xuân trên đảo Jeju. Công thức mật ong và hạt cải dầu Jeju bổ sung nước cho da, đồng thời tạo lá chắn dưỡng ẩm nhờ acid béo không bão hòa.\r\n</p>\r\n<p>- Son dưỡng chứa chiết xuất từ mật ong và dầu hoa cải, giúp dưỡng ẩm và duy trì làn môi mềm mại. Son bổ sung thêm bơ hạt xoài tăng cường độ đàn hồi cho đôi môi.\r\n</p>\r\n<p>- Hương thơm ngọt ngào từ mật ong mang lại cảm giác dễ chịu, thư thái khi dưỡng môi.</p>\r\n</div>\r\n</details>\r\n<hr><!-- Đường kẻ ngang ngăn cách -->\r\n<details>\r\n<summary>Hướng dẫn sử dụng <span class=\"arrow\">▾</span></summary>\r\n<div class=\"content\">\r\n<p>Thoa nhẹ nhàng lượng thích hợp lên môi.</p>\r\n<p>*Tip: Thoa một lớp dày trên môi trước khi ngủ để môi được mềm mịn và đủ ẩm vào sáng hôm sau.</p>\r\n</div>\r\n</details>', 156000, NULL, 'duong_moi_2.jpg', '', '', '', '', 25, '2024-12-11 16:51:34'),
('SP028', 12, 'Kem dưỡng giúp làm mờ các dấu hiệu lão hóa trên da INNISFREE Collagen Green Tea Ceramide Bounce Cream 50mL', '<div class=\"container\">\r\n<details>\r\n<summary>Thông tin sản phẩm <span class=\"arrow\">▾</span></summary>\r\n<div class=\"content\">\r\n<p><strong>Công dụng:</strong></p>\r\n<p>- Cải thiện đến 19.2% độ đàn hồi và đẩy lùi đa dấu hiệu lão hóa sớm chỉ sau 4 tuần.\r\n</p>\r\n<p>- Kết hợp COLLAGEN thủy phân chiết xuất từ Sừng hươu biển và CERAMIDE chiết xuất từ Trà xanh giúp cải thiện độ đàn hồi, dưỡng ẩm và củng cố màng lipid của da.\r\n</p>\r\n<p>- Kem thẩm thấu nhanh không gây bết dính.</p>\r\n<p>- Công thức dịu nhẹ, không gây kích ứng, phù hợp cả da nhạy cảm và da mụn.</p>\r\n<p>- Công thức dịu nhẹ, không gây kích ứng, phù hợp cả da nhạy cảm và da mụn.</p>\r\n<p>- Công thức sạch, không hương liệu và thuần chay.</p>\r\n</div>\r\n</details>\r\n<hr><!-- Đường kẻ ngang ngăn cách -->\r\n<details>\r\n<summary>Hướng dẫn sử dụng <span class=\"arrow\">▾</span></summary>\r\n<div class=\"content\">\r\n<p>- Sử dụng ngày 2 lần sáng và tối.</p>\r\n<p>- Rửa mặt thật sạch bằng nước hoặc sữa rửa mặt. Dùng sau bước serum.</p>\r\n<p>- Cho 1 lượng kem vừa đủ ra tay và chấm lên 5 điểm: trán, mũi, 2 má và cằm</p>\r\n<p>- Xoa đều từ trong ra ngoài, từ trên xuống dưới. Vỗ nhẹ 30 giây để kem dưỡng thấm vào da.</p>\r\n</div>\r\n</details>', 756000, NULL, 'bo_cham_soc_da.jpg', '', '', '', '', 20, '2024-12-11 17:20:09'),
('SP029', 13, 'Chì kẻ viền mắt chống nước innisfree Simple Label Waterproof Pencil Liner 0.1 g', '<div class=\"container\">\r\n<details>\r\n<summary>Thông tin sản phẩm <span class=\"arrow\">▾</span></summary>\r\n<div class=\"content\">\r\n<p><strong>Công dụng:</strong></p>\r\n<p>- Công nghệ đa chống thấm, giúp chống lại cả dầu và nước trên da, giữ cho đường kẻ không lem, không trôi trong suốt cả ngày dài.\r\n</p>\r\n<p>- Chất chì với công thức khô nhanh giúp khắc phục các lỗi thường gặp khi kẻ mắt, cho thao tác vẽ dễ dàng và gọn gàng, tạo hiệu ứng đường kẻ sắc nét vẽ ít bị lem.\r\n</p>\r\n<p>- Chất chì với công thức khô nhanh giúp khắc phục các lỗi thường gặp khi kẻ mắt, cho thao tác vẽ dễ dàng và gọn gàng, tạo hiệu ứng đường kẻ sắc nét vẽ ít bị lem.</p>\r\n<p><strong>Chứng nhận thuần chay:</strong></p>\r\n<p>EVE Vegan là chứng nhận thuần chay chính thức từ Pháp. Sản phẩm không chứa thành phần từ động vật, hương liệu và màu hóa học.\r\n</p>\r\n</div>\r\n</details>\r\n<hr><!-- Đường kẻ ngang ngăn cách -->\r\n<details>\r\n<summary>Hướng dẫn sử dụng <span class=\"arrow\">▾</span></summary>\r\n<div class=\"content\">\r\n<p>- Kẻ và tô đầy dọc đường viền mí mắt.</p>\r\n<p>- Sử dụng sản phẩm tẩy trang chuyên dụng cho mắt khi tẩy trang.</p>\r\n</div>\r\n</details>', 212000, NULL, 'eyeliner_1.jpg', '', '', '', '', 50, '2024-12-11 17:29:10'),
('SP030', 13, 'Bút kẻ viền mắt nước lâu trôi innisfree Powerproof Pen Liner 0.6 g', '<div class=\"container\">\r\n<details>\r\n<summary>Thông tin sản phẩm <span class=\"arrow\">▾</span></summary>\r\n<div class=\"content\">\r\n<p><strong>Công dụng:</strong></p>\r\n<p>- Đầu bút có thiết kế thông minh, dễ dàng điều chỉnh độ dày bằng một đầu miếng bọt biển mềm, cho đường kẻ sắc nét và đôi mắt thêm sâu. Bút kẻ mắt có 2 tone màu tự nhiên và dễ dùng: Màu đen thu hút và màu nâu mộng mơ.\r\n</p>\r\n<p>- Công thức kháng nước, mồ hôi và bã nhờn giúp duy trì lớp trang điểm lâu bền.\r\n</p>\r\n<p>- Dễ dàng làm sạch bằng nước tẩy trang dành cho mắt & môi hoặc sữa rửa mặt mà không để lại vết lem, đồng thời lành tính cho làn da mắt mỏng manh.</p>\r\n</div>\r\n</details>\r\n<hr><!-- Đường kẻ ngang ngăn cách -->\r\n<details>\r\n<summary>Hướng dẫn sử dụng <span class=\"arrow\">▾</span></summary>\r\n<div class=\"content\">\r\n<p>- Kẻ và tô đầy dọc đường viền mí mắt.</p>\r\n<p>- Sử dụng sản phẩm tẩy trang chuyên dụng cho mắt khi tẩy trang.</p>\r\n</div>\r\n</details>', 212000, NULL, 'eyeliner_2.jpg', '', '', '', '', 50, '2024-12-11 17:29:10'),
('SP031', 14, 'Chì kẻ chân mày INNISFREE Auto Eyebrow Pencil 0.3 g', '<div class=\"container\">\r\n<details>\r\n<summary>Hướng dẫn sử dụng <span class=\"arrow\">▾</span></summary>\r\n<div class=\"content\">\r\n<p>- Kẻ đường viền rồi tô nhẹ bên trong chân mày.</p>\r\n<p>- Dùng đầu cọ chải nhẹ nhàng theo chiều cấu tạo chân mày.</p>\r\n</div>\r\n</details>', 92000, NULL, 'ke_chan_may_1.jpg', '', '', '', '', 10, '2024-12-11 17:35:37'),
('SP032', 14, 'Chì kẻ lông mày lâu trôi innisfree Simple Label Lasting Pencil Brow 0.15 g', '<div class=\"container\">\r\n<details>\r\n<summary>Thông tin sản phẩm <span class=\"arrow\">▾</span></summary>\r\n<div class=\"content\">\r\n<p><strong>Công dụng:</strong></p>\r\n<p>- Đầu chì kẻ được dát 3D cho thao tác vẽ dễ dàng và nhanh chóng, đường kẻ nét và tinh tế, tạo hiệu ứng trang điểm lông mày tự nhiên và thanh lịch.\r\n</p>\r\n<p>- Kết cấu chì chắc chắn giúp hạn chế đứt gãy khi vẽ. Công thức màu tự nhiên và bám lâu, chống thấm nước và dầu, mang lại hiệu ứng lông mày sắc nét và lâu trôi.\r\n</p>\r\n<p><strong>Chứng nhận thuần chay:</strong></p>\r\n<p>EVE Vegan là chứng nhận thuần chay chính thức từ Pháp. Sản phẩm không chứa thành phần từ động vật, hương liệu và màu hóa học.\r\n</p>\r\n</div>\r\n</details>\r\n<hr><!-- Đường kẻ ngang ngăn cách -->\r\n<details>\r\n<summary>Hướng dẫn sử dụng <span class=\"arrow\">▾</span></summary>\r\n<div class=\"content\">\r\n<p>Vẽ phác thảo khung chân mày sau đó tô đầy phần bên trong chân mày.</p>\r\n</div>\r\n</details>', 238000, NULL, 'ke_chan_may_2.jpg', '', '', '', '', 15, '2024-12-11 17:35:37'),
('SP033', 15, 'Mascara thuần chay, làm dài và cong mi innisfree Simple Label Volume & Curl Mascara 7.5 g', '<div class=\"container\">\r\n<details>\r\n<summary>Thông tin sản phẩm <span class=\"arrow\">▾</span></summary>\r\n<div class=\"content\">\r\n<p><strong>Công dụng:</strong></p>\r\n<p>- Simple Label chiết xuất hoàn toàn từ nguyên liệu thiên nhiên thuần chay như Tú Cầu và bộ khoáng vô cơ đạt chuẩn EVE Vegan Certified (*), an toàn và lành tính với cả làn da nhạy cảm và mắt đã trải qua phẫu thuật tật khúc xạ. Simple Label sinh ra để theo đuổi vẻ đẹp, khỏe mạnh tự nhiên, làm dịu và đồng thời giảm căng thẳng cho làn da phải trang điểm mỗi ngày.\r\n</p>\r\n<p>- Mascara thiết kế đầu cọ thẳng giúp làm mi dày và cong suốt nhiều 12 giờ, phù hợp cho hàng mi thưa. Mascara chống lem hoàn hảo nhờ chiết xuất sợi tre và tro núi lửa, cho hàng mi cong vút dài lâu.\r\n</p>\r\n<p>- Mascara dịu nhẹ, tạo cảm giác thoải mái và không nặng mi. Sản phẩm đạt kết quả chứng minh lâm sàng (**)</p>\r\n<p><strong>Chứng nhận :</strong></p>\r\n<p>- EVE Vegan là chứng nhận thuần chay chính thức từ Pháp. Sản phẩm không chứa thành phần từ động vật, hương liệu và màu hóa học.\r\n</p>\r\n<p>- Đạt kết quả chứng minh Human application eye irritation test - Bao gồm thử nghiệm nước mắt, khảo sát và đánh giá thị giác của chuyên gia.</p>\r\n</div>\r\n</details>\r\n<hr><!-- Đường kẻ ngang ngăn cách -->\r\n<details>\r\n<summary>Hướng dẫn sử dụng <span class=\"arrow\">▾</span></summary>\r\n<div class=\"content\">\r\n<p>- Nhẹ nhàng chải lông mi từ gốc đến ngọn.</p>\r\n<p>- Sử dụng sản phẩm tẩy trang chuyên dụng cho mắt khi tẩy trang.</p>\r\n</div>\r\n</details>', 340000, NULL, 'mascara_1.jpg', '', '', '', '', 15, '2024-12-11 17:42:41'),
('SP034', 15, 'Mascara thuần chay, làm dài và cong mi innisfree Simple Label Long & Curl Mascara 7.5 g', '<div class=\"container\">\r\n<details>\r\n<summary>Thông tin sản phẩm <span class=\"arrow\">▾</span></summary>\r\n<div class=\"content\">\r\n<p><strong>Công dụng:</strong></p>\r\n<p>- Simple Label chiết xuất hoàn toàn từ nguyên liệu thiên nhiên thuần chay như Tú Cầu và bộ khoáng vô cơ đạt chuẩn EVE Vegan Certified (*), an toàn và lành tính với cả làn da nhạy cảm và mắt đã trải qua phẫu thuật tật khúc xạ. Simple Label sinh ra để theo đuổi vẻ đẹp, khỏe mạnh tự nhiên, làm dịu và đồng thời giảm căng thẳng cho làn da phải trang điểm mỗi ngày.\r\n</p>\r\n<p>- Mascara thiết kế đầu cọ thẳng giúp làm mi dày và cong suốt nhiều 12 giờ, phù hợp cho hàng mi thưa. Mascara chống lem hoàn hảo nhờ chiết xuất sợi tre và tro núi lửa, cho hàng mi cong vút dài lâu.\r\n</p>\r\n<p>- Mascara dịu nhẹ, tạo cảm giác thoải mái và không nặng mi. Sản phẩm đạt kết quả chứng minh lâm sàng (**)</p>\r\n<p><strong>Chứng nhận :</strong></p>\r\n<p>- EVE Vegan là chứng nhận thuần chay chính thức từ Pháp. Sản phẩm không chứa thành phần từ động vật, hương liệu và màu hóa học.\r\n</p>\r\n<p>- Đạt kết quả chứng minh Human application eye irritation test - Bao gồm thử nghiệm nước mắt, khảo sát và đánh giá thị giác của chuyên gia.</p>\r\n</div>\r\n</details>\r\n<hr><!-- Đường kẻ ngang ngăn cách -->\r\n<details>\r\n<summary>Hướng dẫn sử dụng <span class=\"arrow\">▾</span></summary>\r\n<div class=\"content\">\r\n<p>- Nhẹ nhàng chải lông mi từ gốc đến ngọn.</p>\r\n<p>- Sử dụng sản phẩm tẩy trang chuyên dụng cho mắt khi tẩy trang.</p>\r\n</div>\r\n</details>', 340000, NULL, 'mascara_2.jpg', '', '', '', '', 15, '2024-12-11 17:42:41'),
('SP035', 16, 'Son bóng dạng thỏi INNISFREE DEWY GLOWY LIPSTICK 3.5G', '<div class=\"container\">\r\n<details>\r\n<summary>Thông tin sản phẩm <span class=\"arrow\">▾</span></summary>\r\n<div class=\"content\">\r\n<p><strong>Công dụng:</strong></p>\r\n<p>Kết cấu mềm mịn giúp son lên môi căng bóng mà vẫn mỏng nhẹ tuyệt đối, bền màu mà không khô môi. Bảng màu tự nhiên, đa dạng và dễ dùng, phù hợp với nhiều tông da Châu Á:\r\n</p>\r\n<p>- Dew Pink: Màu hồng nhạt có màu như sương sớm mai đọng trên cánh hồng, phù hợp với da tông màu lạnh.\r\n</p>\r\n<p>- Sugar Coral: Màu cam san hô pha một chút ánh hồng ngọt ngào, phù hợp với da tông màu ấm.</p>\r\n<p>- Tangerine Orange: Màu cam nhạt như một trái quýt căng mọng, phù hợp với da tông màu ấm.</p>\r\n<p>Son dưỡng có công thức polymer giữ nước cung cấp độ ẩm cho môi, tạo lớp son bóng nhưng không gây bết dính.\r\n</p>\r\n<p>Son bóng với đa sắc màu tự nhiên, chất son ẩm mịn nhưng vẫn nhẹ môi, độ bám màu cao cho đôi môi tươi tắn suốt cả ngày dài. Màu sẽ lên rõ hơn khi bạn thoa chồng nhiều lớp lên nhau. Bạn có thể tạo ra nhiều kiểu trang điểm môi khác nhau như khi thoa 1 lớp</p>\r\n</div>\r\n</details>\r\n<hr><!-- Đường kẻ ngang ngăn cách -->\r\n<details>\r\n<summary>Hướng dẫn sử dụng <span class=\"arrow\">▾</span></summary>\r\n<div class=\"content\">\r\n<p>Thoa một lượng vừa đủ lên môi và tán đều.</p>\r\n</div>\r\n</details>', 391000, NULL, 'son_moi_1.png', '', '', '', '', 15, '2024-12-11 17:46:59'),
('SP036', 16, 'Son lì dạng thỏi mỏng nhẹ INNISFREE Airy Matte Lipstick 3.5g', '<div class=\"container\">\r\n<details>\r\n<summary>Thông tin sản phẩm <span class=\"arrow\">▾</span></summary>\r\n<div class=\"content\">\r\n<p><strong>Công dụng:</strong></p>\r\n<p>Công thức bột siêu mịn cùng kết cấu mềm mại giúp son lên môi được mượt mà và mỏng nhẹ tuyệt đối, bền màu mà không khô môi. Bảng màu MLBB đa dạng và dễ dùng, phù hợp với nhiều tông da Châu Á:\r\n</p>\r\n<p># No.1 Almond Butter: Tông cam nude nhẹ nhàng mang lại cảm giác thời thượng và nổi bật.\r\n</p>\r\n<p># No.2 Mood Orange: Sắc cam cháy pha nâu cực kỳ trendy, không kén men răng, phù hợp với mọi tông da.</p>\r\n<p># No.3 Coral Land: Một sự kết hợp tinh tế giữa sắc cam san hô và sắc hồng đào đầy ấn tượng và cực kì tôn da.</p>\r\n<p>Sự kết hợp hoàn hảo giữa phức hợp Ceramide và 4 loại bơ: bơ cacao, bơ hạt mỡ, bơ hạt Murumuru, bơ hạt xoài Mangifera Indica giúp dưỡng ẩm toàn diện, làm mềm môi, giảm thiểu tình trạng nứt nẻ và bong tróc, giúp màu son lên môi chuẩn và mịn màng ngay từ lần thoa đầu tiên.\r\n</p>\r\n<p>Airy Matte Lipstick với đa sắc màu tự nhiên, chất son mịn và lì nhưng vẫn nhẹ nhàng, độ bám màu cao cho đôi môi tươi tắn suốt cả ngày dài.</p>\r\n</div>\r\n</details>\r\n<hr><!-- Đường kẻ ngang ngăn cách -->\r\n<details>\r\n<summary>Hướng dẫn sử dụng <span class=\"arrow\">▾</span></summary>\r\n<div class=\"content\">\r\n<p>Thoa một lượng vừa đủ lên môi và tán đều.</p>\r\n</div>\r\n</details>', 323000, NULL, 'son_moi_2.jpg', '', '', '', '', 20, '2024-12-11 17:51:38'),
('SP037', 17, 'Bấm mi cao cấp innisfree Premium Eyelash Curler 1ea', '<div class=\"container\">\r\n<details>\r\n<summary>Thông tin sản phẩm <span class=\"arrow\">▾</span></summary>\r\n<div class=\"content\">\r\n<p><strong>Công dụng:</strong></p>\r\n<p>Bấm mi với chất liệu cao cấp, cho mi cong tự nhiên và dễ dàng hơn. Bấm mi có đầu kẹp dẹt và cong nhẹ theo đường viền mắt, giiúp hàng mi cong đều từ đầu đến đuôi mắt một cách nhẹ nhàng.\r\n</p>\r\n<p>Thiết kế gọn nhẹ, vừa tay và chắc chắn, cho đôi mắt thêm sâu.\r\n</p>\r\n<p>Dụng cụ làm cong mi một cách tự nhiên, nhẹ nhàng mà không làm gãy hay rụng mi, bảo vệ hàng mi tự nhiên.</p>\r\n</div>\r\n</details>\r\n<hr><!-- Đường kẻ ngang ngăn cách -->\r\n<details>\r\n<summary>Hướng dẫn sử dụng <span class=\"arrow\">▾</span></summary>\r\n<div class=\"content\">\r\n<p>Nhẹ nhàng kẹp lông mi và bấm để tạo độ cong cho hàng mi.</p>\r\n</div>\r\n</details>', 102000, NULL, 'kep_mi.jpg', '', '', '', '', 15, '2024-12-11 17:46:59'),
('SP038', 18, 'Kem ủ dưỡng chân tóc innisfree My Hair Recipe Strength Treatment For Hair Roots Care 200 mL', '<div class=\"container\">\r\n<details>\r\n<summary>Thông tin sản phẩm <span class=\"arrow\">▾</span></summary>\r\n<div class=\"content\">\r\n<p><strong>Công dụng:</strong></p>\r\n<p>My Hair Strength là dòng dưỡng chân tóc khỏe mạnh và phục hồi gãy rụng nhờ thành phần thiên nhiên lành tính. Hỗn hợp Phytoncide gồm cây thông, cây bách và tuyết tùng trong dầu gội giúp giảm căng thẳng cho da đầu. Dòng sản phẩm bổ sung nhân sâm và bái tử nhân để tăng cường sức khỏe cho mái tóc.\r\n</p>\r\n<p>Bên cạnh dưỡng tóc khỏe mạnh, dầu hướng dương giúp tăng độ bóng, cho mái tóc thêm óng ả.\r\n</p>\r\n<p>Dầu xả không chứa silicon, an toàn cho da đầu và phục hồi sức sống cho mái tóc bóng khỏe.</p>\r\n</div>\r\n</details>\r\n<hr><!-- Đường kẻ ngang ngăn cách -->\r\n<details>\r\n<summary>Hướng dẫn sử dụng <span class=\"arrow\">▾</span></summary>\r\n<div class=\"content\">\r\n<p>Lau khô tóc sau khi gội đầu. Thoa một lượng thích hợp sản phẩm lên tóc, mát-xa da đầu và tóc. Sau đó, xả sạch lại với nước ấm.</p>\r\n</div>\r\n</details>', 263000, NULL, 'dau_goixa_1.jpg', '', '', '', '', 20, '2024-12-11 17:59:20'),
('SP039', 18, 'Dầu gội nuôi dưỡng chân tóc innisfree My Hair Recipe Strength Shampoo For Hair Roots Care 330 mL', '<div class=\"container\">\r\n<details>\r\n<summary>Thông tin sản phẩm <span class=\"arrow\">▾</span></summary>\r\n<div class=\"content\">\r\n<p><strong>Công dụng:</strong></p>\r\n<p>My Hair Strength là dòng dưỡng chân tóc khỏe mạnh và phục hồi gãy rụng nhờ thành phần thiên nhiên lành tính. Hỗn hợp Phytoncide gồm cây thông, cây bách và tuyết tùng trong dầu gội giúp giảm căng thẳng cho da đầu. Dòng sản phẩm bổ sung nhân sâm và bái tử nhân để tăng cường sức khỏe cho mái tóc.\r\n</p>\r\n<p>Bên cạnh dưỡng tóc khỏe mạnh, dầu hướng dương giúp tăng độ bóng, cho mái tóc thêm óng ả.\r\n</p>\r\n<p>Dầu xả không chứa silicon, an toàn cho da đầu và phục hồi sức sống cho mái tóc bóng khỏe.</p>\r\n</div>\r\n</details>\r\n<hr><!-- Đường kẻ ngang ngăn cách -->\r\n<details>\r\n<summary>Hướng dẫn sử dụng <span class=\"arrow\">▾</span></summary>\r\n<div class=\"content\">\r\n<p>Lau khô tóc sau khi gội đầu. Thoa một lượng thích hợp sản phẩm lên tóc, mát-xa da đầu và tóc. Sau đó, xả sạch lại với nước ấm.</p>\r\n</div>\r\n</details>', 229000, NULL, 'dau_goixa_2.jpg', '', '', '', '', 20, '2024-12-11 17:59:20'),
('SP040', 19, 'Dầu dưỡng tóc hương hoa trà INNISFREE Camellia Essential Hair Oil Serum 100 mL', '<div class=\"container\">\r\n<details>\r\n<summary>Thông tin sản phẩm <span class=\"arrow\">▾</span></summary>\r\n<div class=\"content\">\r\n<p><strong>Công dụng:</strong></p>\r\n<p>Hoa Camellia chịu đựng những ngày lạnh giá trên tuyết mà vẫn tràn đầy sức sống. Từ lâu, hoa Camellia từ lâu đã đượcsử dụng để làm đẹp cho da và tóc, nhờ khả năng dưỡng ẩm tuyệt vời và làm dịu. Ngoài ra, hoa Camellia là thành phần mà khoa học thường dùng để phục hồi làn hư tổn từ ô nhiễm môi trường hoặc căng thẳng. innisfree thu mua hoa trà tự nhiên từ phụ nữ cao tuổi sống ở làng Dongbaek Jeju để đóng góp xây dựng cộng đồng.\r\n</p>\r\n<p>Tinh chất dưỡng tóc với hiệu quả 2 trong 1 từ hoa trà, giúp tạo màn chắn bảo vệ từng sợi tóc, mang lại mái tóc bóng mượt, chắc khỏe.\r\n</p>\r\n<p>Tinh chất giúp giữ tóc vào nếp để dễ tạo kiểu. Kết cấu dạng dầu trong suốt và hương thảo mộc thơm nhẹ, thấm nhanh vào sâu trong chân tóc, cung cấp dưỡng chất đồng thời tạo kiểu đa dạng.</p>\r\n</div>\r\n</details>\r\n<hr><!-- Đường kẻ ngang ngăn cách -->\r\n<details>\r\n<summary>Hướng dẫn sử dụng <span class=\"arrow\">▾</span></summary>\r\n<div class=\"content\">\r\n<p>Bơm 2-3 lần sản phẩm rồi thoa nhẹ lên toàn bộ tóc đã được lau khô sau khi gội đầu, chú ý phần đuôi tóc.</p>\r\n</div>\r\n</details>', 246000, NULL, 'duong_toc_1.jpg', '', '', '', '', 15, '2024-12-11 18:03:40'),
('SP041', 19, 'Tinh chất dưỡng tóc uốn INNISFREE My Hair Recipe Curl Up Essence For Permed & Curly Hair 100 mL', '<div class=\"container\">\r\n<details>\r\n<summary>Thông tin sản phẩm <span class=\"arrow\">▾</span></summary>\r\n<div class=\"content\">\r\n<p><strong>Công dụng:</strong></p>\r\n<p>My Hair Curl Up là dòng dưỡng dành riêng cho tóc uốn, chứa thành phần hỗn hợp đậu nành Jeju cô đặc, protein từ đậu nành và giấm táo giúp tạo độ bồng bềnh và mượt mà cho mái tóc.</p>\r\n<p>Tinh chất dưỡng giúp các lọn tóc vào nếp và khỏe mạnh, tăng độ đàn hồi\r\n</p>\r\n<p>Tinh chất dưỡng giúp bạn dễ dàng tạo kiểu cho mái tóc và giữ nếp bền lâu mà không gây bết dính.</p>\r\n</div>\r\n</details>\r\n<hr><!-- Đường kẻ ngang ngăn cách -->\r\n<details>\r\n<summary>Hướng dẫn sử dụng <span class=\"arrow\">▾</span></summary>\r\n<div class=\"content\">\r\n<p>Lau khô tóc sau khi gội đầu. Thoa một lượng thích hợp sản phẩm lên tóc, đặc biệt phần tóc muốn tạo kiểu và giữ nếp.</p>\r\n</div>\r\n</details>', 272000, NULL, 'duong_toc_2.jpg', '', '', '', '', 15, '2024-12-11 18:03:40'),
('SP042', 1, 'Nước tẩy trang dưỡng ẩm INNISFREE Green Tea Hydrating Amino Acid Cleansing Water 320G', '<div class=\"container\">\n<details>\n<summary>Th&ocirc;ng tin sản phẩm <span class=\"arrow\">▾</span></summary>\n<div class=\"content\">\n<p><strong>Th&acirc;n thiện với m&ocirc;i trường:</strong></p>\n<p>- Cả nắp v&agrave; hộp đựng đều được l&agrave;m ho&agrave;n to&agrave;n bằng nhựa PP để dễ d&agrave;ng t&aacute;i chế.</p>\n<p>- Nắp nhựa c&oacute; thể t&aacute;i chế.</p>\n<p><strong>Chứng nhận thuần chay:</strong></p>\n<p>- Sản phẩm đ&atilde; được Cơ quan Chứng nhận Vegan tại H&agrave;n Quốc x&aacute;c nhận l&agrave; sản phẩm thuần chay.</p>\n</div>\n</details>\n<hr><!-- Đường kẻ ngang ngăn cách -->\n<details>\n<summary>Hướng dẫn sử dụng <span class=\"arrow\">▾</span></summary>\n<div class=\"content\">\n<p>- Lấy một lượng th&iacute;ch hợp rồi nhẹ nh&agrave;ng tạo bọt.</p>\n<p>- Massage l&ecirc;n to&agrave;n bộ khu&ocirc;n mặt. Sau đ&oacute; rửa sạch với nước ấm.</p>\n</div>\n</details>\n</div>', 400000, NULL, 'duong_moi_1.jpg', 'srm2.jpg', 'duong_moi_1.jpg', 'toner_2.jpg', 'sua_duong_2.jpg', 95, '2024-12-01 22:45:16'),
('SP043', 2, 'Sữa rửa mặt dưỡng ẩm da từ trà xanh INNISFREE Green Tea Amino Cleansing Foam 150g', '<div class=\"container\">\r\n<details>\r\n<summary>Th&ocirc;ng tin sản phẩm <span class=\"arrow\">▾</span></summary>\r\n<div class=\"content\">\r\n<p><strong>Th&acirc;n thiện với m&ocirc;i trường:</strong></p>\r\n<p>- Cả nắp v&agrave; hộp đựng đều được l&agrave;m ho&agrave;n to&agrave;n bằng nhựa PP để dễ d&agrave;ng t&aacute;i chế.</p>\r\n<p>- Nắp nhựa c&oacute; thể t&aacute;i chế.</p>\r\n<p><strong>Chứng nhận thuần chay:</strong></p>\r\n<p>- Sản phẩm đ&atilde; được Cơ quan Chứng nhận Vegan tại H&agrave;n Quốc x&aacute;c nhận l&agrave; sản phẩm thuần chay.</p>\r\n</div>\r\n</details>\r\n<hr><!-- Đường kẻ ngang ngăn cách -->\r\n<details>\r\n<summary>Hướng dẫn sử dụng <span class=\"arrow\">▾</span></summary>\r\n<div class=\"content\">\r\n<p>- Lấy một lượng th&iacute;ch hợp rồi nhẹ nh&agrave;ng tạo bọt.</p>\r\n<p>- Massage l&ecirc;n to&agrave;n bộ khu&ocirc;n mặt. Sau đ&oacute; rửa sạch với nước ấm.</p>\r\n</div>\r\n</details>\r\n</div>', 280000, NULL, 'srm2.jpg', '', '', '', '', 67, '2024-12-09 22:44:57'),
('SP044', 3, 'Nước cân bằng phục hồi da và ngăn ngừa lão hóa từ trà đen INNISFREE Black Tea Enhancing Skin 170 mL', '<div class=\"container\">\r\n<details>\r\n<summary>Thông tin sản phẩm <span class=\"arrow\">▾</span></summary>\r\n<div class=\"content\">\r\n<p><strong>Thân thiện với môi trường:</strong></p>\r\n<p>Nước cân bằng độ ẩm cho da innisfree Green Tea Seed Hyaluronic Skin, cấp ẩm cho làn da tươi mát và mịn màng.</p>\r\n<p><strong>Chứng nhận thuần chay:</strong></p>\r\n<p>Sản phẩm đã được Cơ quan Chứng nhận Vegan tại Hàn Quốc xác nhận là sản phẩm thuần chay.</p>\r\n</div>\r\n</details>\r\n<hr><!-- Đường kẻ ngang ngăn cách -->\r\n<details>\r\n<summary>Hướng dẫn sử dụng <span class=\"arrow\">▾</span></summary>\r\n<div class=\"content\">\r\n<p>- Lấy một lượng tinh chất vừa phải ra bông tẩy trang.</p>\r\n<p>- Lau nhẹ nhàng lên khuôn mặt để tính chất thẩm thẩu từ từ và nhẹ nhàng vào làn da.</p>\r\n</div>\r\n</details>', 300000, NULL, 'toner_2.jpg', '', '', '', '', 54, '2024-12-11 15:58:07');
INSERT INTO `sanpham` (`masanpham`, `id_danhmuc`, `tensanpham`, `mota`, `giagoc`, `rate`, `hinhanh`, `hinhanh1`, `hinhanh2`, `hinhanh3`, `hinhanh4`, `soluong`, `ngay_them`) VALUES
('SP045', 4, 'Sữa dưỡng dành cho da mụn innisfree Bija Trouble Lotion 100 mL', '<div class=\"container\">\r\n<details>\r\n<summary>Thông tin sản phẩm <span class=\"arrow\">▾</span></summary>\r\n<div class=\"content\">\r\n<p><strong>Công dụng:</strong></p>\r\n<p>- Bija hấp thụ tinh hoa thiên nhiên suốt một khoảng thời gian dài, nhẹ nhàng làm dịu và tăng sức đề kháng cho da. Từ đó, tình trạng làn da được cải thiện đáng kể. innisfree lựa chọn hình thức thương mại công bằng, thu mua Bija được trồng tại Songdang-ri, Jeju. Nhờ vậy, innisfree đã mang lại nguồn thu nhập mới và thúc đẩy phát triển cộng đồng nơi đây.\r\n</p>\r\n<p>- Sữa dưỡng cung cấp độ ẩm và làm dịu da, kiểm soát lượng dầu thừa ngăn ngừa mụn phát sinh giúp làn da luôn ẩm mềm</p>\r\n<p>- Sản phẩm đạt kết quả thử nghiệm Noncomedogenic, an toàn cho da mụn. Dầu hạt Bija Jeju giúp làm dịu và bảo vệ vùng da gặp rắc rối về vấn đề mụn.</p>\r\n<p><strong>Chứng nhận:</strong></p>\r\n<p>Sản phẩm đạt chứng nhận 6 không (không parabens, không màu tổng hợp, không dầu khoáng, không dầu động vật, không mùi hương nhân tạo, không imidazolidinyl urea).</p>\r\n</div>\r\n</details>\r\n<hr><!-- Đường kẻ ngang ngăn cách -->\r\n<details>\r\n<summary>Hướng dẫn sử dụng <span class=\"arrow\">▾</span></summary>\r\n<div class=\"content\">\r\n<p>Sau khi dùng nước cân bằng da, lấy một lượng thích hợp thoa đều lên mặt.</p>\r\n</div>\r\n</details>', 306000, NULL, 'sua_duong_2.jpg', '', '', '', '', 10, '2024-12-11 16:07:53'),
('SP046', 5, 'Tinh chất dưỡng da từ hoa lan Innisfree Jeju Orchid Enriched Essence 50ml', '<div class=\"container\">\r\n<details>\r\n<summary>Thông tin sản phẩm <span class=\"arrow\">▾</span></summary>\r\n<div class=\"content\">\r\n<p><strong>Công dụng:</strong></p>\r\n<p>- Với hoạt chất Orchidelixir 2.0™ có trong hoa lan- loài hoa có sức sống mãnh liệt nở rộ ngay cả trong thời tiết lạnh giá, khắc nghiệt để cung cấp dưỡng chất giúp cải thiện các vấn đề về lão hóa da.\r\n</p>\r\n<p>- Hyaluronic Acid từ đậu xanh Jeju và chiết xuất bột yến mạch giúp cải thiện độ săn chắc và căng bóng cho da ngay sau khi sử dụng.</p>\r\n<p>- Sản phẩm chứa 4% đường tự nhiên được chiết xuất từ ​​yến mạch, tăng độ săn chắc, đàn hồi cho làn da với kết cấu sánh đặc giúp cung cấp dưỡng chất thiết yếu cho da.</p>\r\n<p><strong>Chứng nhận:</strong></p>\r\n<p>Sản phẩm đạt chứng nhận 6 không (không parabens, không màu tổng hợp, không dầu khoáng, không dầu động vật, không mùi hương nhân tạo, không imidazolidinyl urea).</p>\r\n</div>\r\n</details>\r\n<hr><!-- Đường kẻ ngang ngăn cách -->\r\n<details>\r\n<summary>Hướng dẫn sử dụng <span class=\"arrow\">▾</span></summary>\r\n<div class=\"content\">\r\n<p>Bơm 1-2 lần và thoa đều khắp mặt, sau đó vỗ nhẹ để sản phẩm được thẩm thấu.</p>\r\n</div>\r\n</details>', 785000, NULL, 'tinh_chat_1.jpg', '', '', '', '', 10, '2024-12-11 16:16:20'),
('SP047', 1, 'Dầu tẩy trang INNISFREE Green Tea Hydrating Amino Acid Cleansing Oil 150 mL', '<div class=\"container\">\r\n<details>\r\n<summary>Th&ocirc;ng tin sản phẩm <span class=\"arrow\">▾</span></summary>\r\n<div class=\"content\">\r\n<p><strong>Th&acirc;n thiện với m&ocirc;i trường:</strong></p>\r\n<p>- Cả nắp v&agrave; hộp đựng đều được l&agrave;m ho&agrave;n to&agrave;n bằng nhựa PP để dễ d&agrave;ng t&aacute;i chế.</p>\r\n<p>- Nắp nhựa c&oacute; thể t&aacute;i chế.</p>\r\n<p><strong>Chứng nhận thuần chay:</strong></p>\r\n<p>- Sản phẩm đ&atilde; được Cơ quan Chứng nhận Vegan tại H&agrave;n Quốc x&aacute;c nhận l&agrave; sản phẩm thuần chay.</p>\r\n</div>\r\n</details>\r\n<hr><!-- Đường kẻ ngang ngăn cách -->\r\n<details>\r\n<summary>Hướng dẫn sử dụng <span class=\"arrow\">▾</span></summary>\r\n<div class=\"content\">\r\n<p>- Lấy một lượng th&iacute;ch hợp rồi nhẹ nh&agrave;ng tạo bọt.</p>\r\n<p>- Massage l&ecirc;n to&agrave;n bộ khu&ocirc;n mặt. Sau đ&oacute; rửa sạch với nước ấm.</p>\r\n</div>\r\n</details>\r\n</div>', 510000, NULL, 'tay_trang_1.jpg', '', '', '', '', 98, '2024-12-09 22:45:12'),
('SP049', 1, 'Kem dưỡng', '<p>jhdgfefbjbd</p>', 400000, NULL, 'duong_toc_3.jpg', '', '', '', '', 300, NULL),
('SP050', 2, 'Sữa rửa mặt se khít lỗ chân lông INNISFREE Volcanic Pore BHA Cleansing Foam 150 g', '<div class=\"container\">\r\n<details>\r\n<summary>Th&ocirc;ng tin sản phẩm <span class=\"arrow\">▾</span></summary>\r\n<div class=\"content\">\r\n<p><strong>Th&acirc;n thiện với m&ocirc;i trường:</strong></p>\r\n<p>- Cả nắp v&agrave; hộp đựng đều được l&agrave;m ho&agrave;n to&agrave;n bằng nhựa PP để dễ d&agrave;ng t&aacute;i chế.</p>\r\n<p>- Nắp nhựa c&oacute; thể t&aacute;i chế.</p>\r\n<p><strong>Chứng nhận thuần chay:</strong></p>\r\n<p>- Sản phẩm đ&atilde; được Cơ quan Chứng nhận Vegan tại H&agrave;n Quốc x&aacute;c nhận l&agrave; sản phẩm thuần chay.</p>\r\n</div>\r\n</details>\r\n<hr><!-- Đường kẻ ngang ngăn cách -->\r\n<details>\r\n<summary>Hướng dẫn sử dụng <span class=\"arrow\">▾</span></summary>\r\n<div class=\"content\">\r\n<p>- Lấy một lượng th&iacute;ch hợp rồi nhẹ nh&agrave;ng tạo bọt.</p>\r\n<p>- Massage l&ecirc;n to&agrave;n bộ khu&ocirc;n mặt. Sau đ&oacute; rửa sạch với nước ấm.</p>\r\n</div>\r\n</details>\r\n</div>', 260000, NULL, 'srm1.png', '', '', '', '', 89, '2024-12-09 22:45:03'),
('SP051', 2, 'Sữa rửa mặt dưỡng ẩm da từ trà xanh INNISFREE Green Tea Amino Cleansing Foam 150g', '<div class=\"container\">\r\n<details>\r\n<summary>Th&ocirc;ng tin sản phẩm <span class=\"arrow\">▾</span></summary>\r\n<div class=\"content\">\r\n<p><strong>Th&acirc;n thiện với m&ocirc;i trường:</strong></p>\r\n<p>- Cả nắp v&agrave; hộp đựng đều được l&agrave;m ho&agrave;n to&agrave;n bằng nhựa PP để dễ d&agrave;ng t&aacute;i chế.</p>\r\n<p>- Nắp nhựa c&oacute; thể t&aacute;i chế.</p>\r\n<p><strong>Chứng nhận thuần chay:</strong></p>\r\n<p>- Sản phẩm đ&atilde; được Cơ quan Chứng nhận Vegan tại H&agrave;n Quốc x&aacute;c nhận l&agrave; sản phẩm thuần chay.</p>\r\n</div>\r\n</details>\r\n<hr><!-- Đường kẻ ngang ngăn cách -->\r\n<details>\r\n<summary>Hướng dẫn sử dụng <span class=\"arrow\">▾</span></summary>\r\n<div class=\"content\">\r\n<p>- Lấy một lượng th&iacute;ch hợp rồi nhẹ nh&agrave;ng tạo bọt.</p>\r\n<p>- Massage l&ecirc;n to&agrave;n bộ khu&ocirc;n mặt. Sau đ&oacute; rửa sạch với nước ấm.</p>\r\n</div>\r\n</details>\r\n</div>', 280000, NULL, 'srm2.jpg', '', '', '', '', 70, '2024-12-09 22:44:57'),
('SP053', 3, 'Nước cân bằng độ ẩm cho da INNISFREE Green Tea Hyaluronic Skin 170 mL', '<div class=\"container\">\r\n<details>\r\n<summary>Thông tin sản phẩm <span class=\"arrow\">▾</span></summary>\r\n<div class=\"content\">\r\n<p><strong>Thân thiện với môi trường:</strong></p>\r\n<p>Nước cân bằng độ ẩm cho da innisfree Green Tea Seed Hyaluronic Skin, cấp ẩm cho làn da tươi mát và mịn màng.</p>\r\n<p><strong>Chứng nhận thuần chay:</strong></p>\r\n<p>Sản phẩm đã được Cơ quan Chứng nhận Vegan tại Hàn Quốc xác nhận là sản phẩm thuần chay.</p>\r\n</div>\r\n</details>\r\n<hr><!-- Đường kẻ ngang ngăn cách -->\r\n<details>\r\n<summary>Hướng dẫn sử dụng <span class=\"arrow\">▾</span></summary>\r\n<div class=\"content\">\r\n<p>- Lấy một lượng tinh chất vừa phải ra bông tẩy trang.</p>\r\n<p>- Lau nhẹ nhàng lên khuôn mặt để tính chất thẩm thẩu từ từ và nhẹ nhàng vào làn da.</p>\r\n</div>\r\n</details>', 365000, NULL, 'toner_1.jpg', '', '', '', '', 60, '2024-12-11 22:44:57'),
('SP054', 1, 'Dầu tẩy trang INNISFREE Green Tea Hydrating Amino Acid Cleansing Oil 150 mL', '<div class=\"container\">\r\n<details>\r\n<summary>Th&ocirc;ng tin sản phẩm <span class=\"arrow\">▾</span></summary>\r\n<div class=\"content\">\r\n<p><strong>Th&acirc;n thiện với m&ocirc;i trường:</strong></p>\r\n<p>- Cả nắp v&agrave; hộp đựng đều được l&agrave;m ho&agrave;n to&agrave;n bằng nhựa PP để dễ d&agrave;ng t&aacute;i chế.</p>\r\n<p>- Nắp nhựa c&oacute; thể t&aacute;i chế.</p>\r\n<p><strong>Chứng nhận thuần chay:</strong></p>\r\n<p>- Sản phẩm đ&atilde; được Cơ quan Chứng nhận Vegan tại H&agrave;n Quốc x&aacute;c nhận l&agrave; sản phẩm thuần chay.</p>\r\n</div>\r\n</details>\r\n<hr><!-- Đường kẻ ngang ngăn cách -->\r\n<details>\r\n<summary>Hướng dẫn sử dụng <span class=\"arrow\">▾</span></summary>\r\n<div class=\"content\">\r\n<p>- Lấy một lượng th&iacute;ch hợp rồi nhẹ nh&agrave;ng tạo bọt.</p>\r\n<p>- Massage l&ecirc;n to&agrave;n bộ khu&ocirc;n mặt. Sau đ&oacute; rửa sạch với nước ấm.</p>\r\n</div>\r\n</details>\r\n</div>', 510000, NULL, 'tay_trang_1.jpg', '', '', '', '', 98, '2024-12-09 22:45:12'),
('SP056', 2, 'Sữa rửa mặt se khít lỗ chân lông INNISFREE Volcanic Pore BHA Cleansing Foam 150 g', '<div class=\"container\">\r\n<details>\r\n<summary>Th&ocirc;ng tin sản phẩm <span class=\"arrow\">▾</span></summary>\r\n<div class=\"content\">\r\n<p><strong>Th&acirc;n thiện với m&ocirc;i trường:</strong></p>\r\n<p>- Cả nắp v&agrave; hộp đựng đều được l&agrave;m ho&agrave;n to&agrave;n bằng nhựa PP để dễ d&agrave;ng t&aacute;i chế.</p>\r\n<p>- Nắp nhựa c&oacute; thể t&aacute;i chế.</p>\r\n<p><strong>Chứng nhận thuần chay:</strong></p>\r\n<p>- Sản phẩm đ&atilde; được Cơ quan Chứng nhận Vegan tại H&agrave;n Quốc x&aacute;c nhận l&agrave; sản phẩm thuần chay.</p>\r\n</div>\r\n</details>\r\n<hr><!-- Đường kẻ ngang ngăn cách -->\r\n<details>\r\n<summary>Hướng dẫn sử dụng <span class=\"arrow\">▾</span></summary>\r\n<div class=\"content\">\r\n<p>- Lấy một lượng th&iacute;ch hợp rồi nhẹ nh&agrave;ng tạo bọt.</p>\r\n<p>- Massage l&ecirc;n to&agrave;n bộ khu&ocirc;n mặt. Sau đ&oacute; rửa sạch với nước ấm.</p>\r\n</div>\r\n</details>\r\n</div>', 260000, NULL, 'srm1.png', '', '', '', '', 90, '2024-12-09 22:45:03'),
('SP057', 4, 'Sữa dưỡng ngăn ngừa lão hóa từ trà đen INNISFREE Black Tea Youth Enhancing Lotion 170 mL', '<div class=\"container\">\r\n<details>\r\n<summary>Thông tin sản phẩm <span class=\"arrow\">▾</span></summary>\r\n<div class=\"content\">\r\n<p><strong>Công dụng:</strong></p>\r\n<p>- Thành phần chính chiết xuất Trà Đen giúp làm dịu làn da mệt mỏi với lượng theabrownin dồi dào, giúp chống oxy hóa tuyệt vời mang lại một làn da khỏe mạnh và rạng rỡ.</p>\r\n<p>- Kết cấu dạng sữa nhẹ nhàng bao bọc và thấm sâu vào da với cảm giác mềm mại và mượt mà.</p>\r\n<p>- Làm săn chắc, dưỡng sáng, cấp ẩm, tăng cường sự rạng rỡ và phục hồi da cho việc chăm sóc da hoàn chỉnh từ việc giảm các dấu hiệu lão hóa cơ bản đến cân bằng dầu và độ ẩm trên da.</p>\r\n<p><strong>Chứng nhận thuần chay:</strong></p>\r\n<p>Sản phẩm đã được Cơ quan Chứng nhận Vegan tại Hàn Quốc xác nhận là sản phẩm thuần chay.</p>\r\n</div>\r\n</details>\r\n<hr><!-- Đường kẻ ngang ngăn cách -->\r\n<details>\r\n<summary>Hướng dẫn sử dụng <span class=\"arrow\">▾</span></summary>\r\n<div class=\"content\">\r\n<p>Lấy một lượng thích hợp rồi nhẹ nhàng thoa đều lên mặt và cổ.</p>\r\n</div>\r\n</details>', 501000, NULL, 'sua_duong_1.jpg', '', '', '', '', 50, '2024-12-11 16:07:53'),
('SP058', 5, 'Nước dưỡng ngăn ngừa lão hóa từ trà đen INNISFREE Black tea Treatment Essence 75 mL', '<div class=\"container\">\r\n<details>\r\n<summary>Thông tin sản phẩm <span class=\"arrow\">▾</span></summary>\r\n<div class=\"content\">\r\n<p><strong>Công dụng:</strong></p>\r\n<p>- Công thức chứa 95% hoạt chất Trà Đen Peptide Activator™ hỗ trợ thúc đẩy hàng rào dưỡng chất giúp tái tạo, loại bỏ và phục hồi làn da thô ráp, xỉn màu do tế bào chết gây ra. Kết cấu dạng nước giúp thấm nhanh mà không gây bết dính.\r\n</p>\r\n<p>- Dẫn xuất Vitamin C ở dạng ổn định, kết hợp cùng Niacinamide và Glutathione, đem lại hiệu quả chống oxy hóa tuyệt vời, giúp da thêm sáng khỏe tự nhiên, ẩm mượt và rạng rỡ hơn sau 1 đêm sử dụng.\r\n</p>\r\n<p>- Sản phẩm khi kết hợp cùng tinh chất trà đen Black Tea Ampoule mang lại hiệu quả cấp ẩm & chống lão hóa vượt trội, đẩy nhanh chu kỳ tái tạo da và làm dịu làn da mệt mỏi. Tổ hợp bốn tác động giúp cải thiện độ đàn hồi, nếp nhăn, cho làn da đều màu và sáng khỏe hơn.</p>\r\n<p><strong>Chứng nhận:</strong></p>\r\n<p>Sản phẩm đạt chứng nhận 6 không (không parabens, không màu tổng hợp, không dầu khoáng, không dầu động vật, không mùi hương nhân tạo, không imidazolidinyl urea).</p>\r\n</div>\r\n</details>\r\n<hr><!-- Đường kẻ ngang ngăn cách -->\r\n<details>\r\n<summary>Hướng dẫn sử dụng <span class=\"arrow\">▾</span></summary>\r\n<div class=\"content\">\r\n<p>Thoa một lượng sản phẩm thích hợp lên mặt và cổ sau khi rửa mặt. Vỗ nhẹ để tăng độ thẩm thấu vào da.</p>\r\n</div>\r\n</details>', 467000, NULL, 'tinh_chat_2.jpg', '', '', '', '', 10, '2024-12-11 16:16:20'),
('SP059', 6, 'Kem dưỡng vùng da mắt ngăn ngừa lão hóa chuyên sâu innisfree Perfect 9 Intensive Eye Cream 30 mL', '<div class=\"container\">\r\n<details>\r\n<summary>Thông tin sản phẩm <span class=\"arrow\">▾</span></summary>\r\n<div class=\"content\">\r\n<p><strong>Công dụng:</strong></p>\r\n<p>- Phức hợp trường sinh Jeju chống lão hóa™ #AgeDefyingElixir được tổng hợp từ 9 loại thảo mộc quý hiếm gồm nấm linh chi, ngải cứu, nấm bông, chi kim ngân, hoàng cầm, tiêu Cho-pi, diếp cát, bồ công anh, phúc bồn tử Hàn Quốc bằng phương pháp chiết xuất sóng âm, xóa tan lo lắng về 9 dấu hiệu lão hóa điển hình: Da không đều màu; da thiếu nước; da sậm màu, nám và tàn nhang, da thiếu đàn hồi, da thiếu ẩm, da xỉn màu, lỗ chân lông to; da chảy xệ, có nếp nhăn, chân chim; da nhiều tế bào chết.\r\n</p>\r\n<p>- Ngọn núi Halla đảo Jeju từ xưa đã được ví như núi trường sinh bởi vạn vật nơi đây sinh trưởng mạnh mẽ. Ẩn chứa nhiều loại thảo mộc quý, Jeju từng là nơi mà Seobok – thuộc hạ vua Tần Thũy Hoàng tìm đến vì thuốc trường sinh.\r\n</p>\r\n<p>- Kem dưỡng có kết cấu mịn giúp làm giảm quầng thâm và bọng mắt, cung cấp độ ẩm cho vùng da mắt trở nên săn chắc và đàn hồi, tái tạo đôi mắt tươi trẻ rạng ngời.\r\n</p>\r\n<p><strong>Chứng nhận:</strong></p>\r\n<p>Sản phẩm đạt chứng nhận 6 không (không parabens, không màu tổng hợp, không dầu khoáng, không dầu động vật, không mùi hương nhân tạo, không imidazolidinyl urea).</p>\r\n</div>\r\n</details>\r\n<hr><!-- Đường kẻ ngang ngăn cách -->\r\n<details>\r\n<summary>Hướng dẫn sử dụng <span class=\"arrow\">▾</span></summary>\r\n<div class=\"content\">\r\n<p>Dùng ngón áp út, thoa một lượng thích hợp lên vùng da quanh mắt, vỗ nhẹ cho hiệu quả thẩm thấu.</p>\r\n<p>[Trình tự sử dụng] Nước cân bằng - Sữa dưỡng ẩm - Sản phẩm dưỡng da (Serum) - Kem dưỡng ẩm vùng da mắt - Kem dưỡng ẩm</p>\r\n</div>\r\n</details>', 935000, NULL, 'kem_mat_1.jpg', '', '', '', '', 19, '2024-12-11 16:22:02'),
('SP060', 7, 'Kem dưỡng làm dịu và phục hồi da INNISFREE Retinol Cica Barrier Defense Cream 50 mL', '<div class=\"container\">\r\n<details>\r\n<summary>Thông tin sản phẩm <span class=\"arrow\">▾</span></summary>\r\n<div class=\"content\">\r\n<p><strong>Công dụng:</strong></p>\r\n<p>- Làm khỏe hàng rào bảo vệ da.\r\n</p>\r\n<p>- Chăm sóc làn da mụn/hư tổn/nhạy cảm.\r\n</p>\r\n<p>- Tái tạo & cải thiện bề mặt da.\r\n</p>\r\n<p>- Công thức dưỡng ẩm dạng Gel, dễ dàng lan tỏa và thẩm thấu trên da mà không gây bết dính.</p>\r\n<p>- Kiểm nghiệm không gây kích ứng - Dùng được cho nhiều loại da, kể cả da mụn.</p>\r\n<p><strong>Đối tượng sử dụng:</strong></p>\r\n<p>- Khách hàng có nhu cầu chăm sóc da, tăng cường hàng rào bảo vệ da hàng ngày (Giai đoạn Trước mụn - Ngăn ngừa mụn).</p>\r\n<p>- Khách hàng có làn da nhạy cảm, dễ bị tác động bởi yếu tố bên ngoài.</p>\r\n<p>- Khách hàng lo lắng về da khô, ửng đỏ, nhạy cảm, lỗ chân lông to và da không đều màu.</p>\r\n<p>- Khách hàng muốn làm dịu da và cải thiện mụn.</p>\r\n</div>\r\n</details>\r\n<hr><!-- Đường kẻ ngang ngăn cách -->\r\n<details>\r\n<summary>Hướng dẫn sử dụng <span class=\"arrow\">▾</span></summary>\r\n<div class=\"content\">\r\n<p>- Lấy một lượng thích hợp và nhẹ nhàng thoa lên mặt và cổ.</p>\r\n<p>- Khi sử dụng vào ban ngày nên thoa kem chống nắng để bảo vệ da.</p>\r\n</div>\r\n</details>', 671000, NULL, 'kem_duong_1.jpg', '', '', '', '', 20, '2024-12-11 16:22:02'),
('SP061', 7, 'Kem dưỡng da ngăn ngừa lão hóa từ trà đen INNISFREE Black Tea Youth Enhancing Cream 50 mL', '<div class=\"container\">\r\n<details>\r\n<summary>Thông tin sản phẩm <span class=\"arrow\">▾</span></summary>\r\n<div class=\"content\">\r\n<p><strong>Công dụng:</strong></p>\r\n<p>- Chống lão hóa.\r\n</p>\r\n<p>- Nuôi dưỡng làn da mệt mỏi từ sâu bên trong để xây dựng một nền da săn chắc và đủ ẩm.\r\n</p>\r\n<p>- Công thức giàu dưỡng chất tạo nên một lớp màng dưỡng ẩm trên da giúp mang lại hiệu quả cấp ẩm chuyên sâu, dưỡng da sáng và săn chắc, trả lại làn da tươi tắn, tràn đầy năng lượng, mạnh mẽ đẩy lùi quá trình lão hóa cho da.\r\n</p>\r\n<p>-  Thành phần chính là chiết xuất trà đen lên men ở mức 80% giúp giải phóng làn da mệt mỏi khỏi 5 dấu hiệu lão hóa sớm nhờ hàm lượng theabrownin dồi dào, giúp chống oxy hóa mạnh mẽ, mang đến cho bạn một làn da khỏe mạnh và rạng rỡ.</p>\r\n<p><strong>Đối tượng sử dụng:</strong></p>\r\n<p>- Khách hàng có nhu cầu chăm sóc da, tăng cường hàng rào bảo vệ da hàng ngày (Giai đoạn Trước mụn - Ngăn ngừa mụn).</p>\r\n<p>- Khách hàng có làn da nhạy cảm, dễ bị tác động bởi yếu tố bên ngoài.</p>\r\n<p>- Khách hàng lo lắng về da khô, ửng đỏ, nhạy cảm, lỗ chân lông to và da không đều màu.</p>\r\n<p>- Khách hàng muốn làm dịu da và cải thiện mụn.</p>\r\n</div>\r\n</details>\r\n<hr><!-- Đường kẻ ngang ngăn cách -->\r\n<details>\r\n<summary>Hướng dẫn sử dụng <span class=\"arrow\">▾</span></summary>\r\n<div class=\"content\">\r\n<p>- Lấy một lượng thích hợp và nhẹ nhàng thoa lên mặt và cổ.</p>\r\n<p>- Khi sử dụng vào ban ngày nên thoa kem chống nắng để bảo vệ da.</p>\r\n</div>\r\n</details>', 680000, NULL, 'kem_duong_2.jpg', '', '', '', '', 10, '2024-12-11 16:29:02'),
('SP062', 8, 'Kem chống nắng kiêm kem lót làm mịn lỗ chân lông innisfree UV Active Poreless Sunscreen SPF50+ PA++++ 50mL', '<div class=\"container\">\r\n<details>\r\n<summary>Thông tin sản phẩm <span class=\"arrow\">▾</span></summary>\r\n<div class=\"content\">\r\n<p><strong>Công dụng:</strong></p>\r\n<p>Kem chống nắng kiêm kem lót làm mịn lỗ chân lông innisfree UV Active Poreless Sunscreen SPF50+ PA++++ 50mL.</p>\r\n<p><strong>Đối tượng sử dụng:</strong></p>\r\n<p>- Khách hàng có nhu cầu chăm sóc da, tăng cường hàng rào bảo vệ da hàng ngày (Giai đoạn Trước mụn - Ngăn ngừa mụn).</p>\r\n<p>- Khách hàng có làn da nhạy cảm, dễ bị tác động bởi yếu tố bên ngoài.</p>\r\n<p>- Khách hàng lo lắng về da khô, ửng đỏ, nhạy cảm, lỗ chân lông to và da không đều màu.</p>\r\n<p>- Khách hàng muốn làm dịu da và cải thiện mụn.</p>\r\n</div>\r\n</details>\r\n<hr><!-- Đường kẻ ngang ngăn cách -->\r\n<details>\r\n<summary>Hướng dẫn sử dụng <span class=\"arrow\">▾</span></summary>\r\n<div class=\"content\">\r\n<p>Thoa đều sản phẩm lên những vùng da có khả năng tiếp xúc với tia UV như mặt và cơ thể. Thoa lại sản phẩm sau khi bơi hoặc tham gia các hoạt động tiết nhiều mồ hôi.</p>\r\n</div>\r\n</details>', 467000, NULL, 'kcn_1.png', '', '', '', '', 5, '2024-12-11 16:38:47'),
('SP063', 8, 'Kem dưỡng ẩm nâng tông làm sáng da và chống nắng INNISFREE Cherry Blossom Skin-Fit Tone-up Cream SPF50+ PA++++ 50 mL', '<div class=\"container\">\r\n<details>\r\n<summary>Thông tin sản phẩm <span class=\"arrow\">▾</span></summary>\r\n<div class=\"content\">\r\n<p><strong>Công dụng:</strong></p>\r\n<p>- Kem dưỡng chứa chiết xuất Lá Anh Đào Hoàng Gia + Niacinamide, đem lại làn da trắng hồng tự nhiên, da thêm mềm mượt, không còn thô ráp.</p>\r\n<p>- Chất kem mỏng nhẹ và tươi mát với khả năng chống tia UV tối ưu, giúp làn da sáng hồng tự nhiên, tạo nên lớp nền mỏng nhẹ cho da.</p>\r\n<p>- Công thức nhẹ dịu thẩm thấu nhanh vào da cùng hiệu ứng nâng tông hồng tự nhiên, đem lại làn da sáng khỏe căng mịn như cánh hoa anh đào.</p>\r\n<p>- Đem lại hiệu ứng sáng da tức thì bất kể sắc tố da, dù là tông ấm hay lạnh.</p>\r\n</div>\r\n</details>\r\n<hr><!-- Đường kẻ ngang ngăn cách -->\r\n<details>\r\n<summary>Hướng dẫn sử dụng <span class=\"arrow\">▾</span></summary>\r\n<div class=\"content\">\r\n<p>Sử dụng kem dưỡng tại bước cuối cùng của chu trình dưỡng da, khu vực mặt và cổ. Thoa thêm 1 lớp mỏng để tăng hiệu quả dưỡng sáng và nâng tông da.</p>\r\n</div>\r\n</details>', 484000, NULL, 'kcn_2.jpg', '', '', '', '', 10, '2024-12-11 16:38:47'),
('SP064', 9, 'Siêu mặt nạ đất sét đá tro núi lửa INNISFREE Super Volcanic Pore Clay Mask 2X 100 mL', '<div class=\"container\">\r\n<details>\r\n<summary>Thông tin sản phẩm <span class=\"arrow\">▾</span></summary>\r\n<div class=\"content\">\r\n<p><strong>Công dụng:</strong></p>\r\n<p>- Cấu trúc xốp khiến đá tro núi lửa Jeju có khả năng hút sạch bã nhờn, dầu thừa và các tế bào chết trên da một cách mạnh mẽ. Các khoáng chất trong nguyên liệu chăm sóc làn da sáng khỏe. Nguyên liệu quý này được loại bỏ tạp chất ở nhiệt độ cao trên 150 độ và nghiền thành bột mịn để dưỡng da.</p>\r\n<p>- Làm sạch sâu cả những bụi bẩn và dầu thừa tí hon nhất ẩn sâu trong lỗ chân lông nhờ đá tro núi lửa Jeju Volcanic Cluster Sphere™. Hiệu quả loại bỏ tế bào chết cao gấp ba lần với sức mạnh tổng hợp tro núi lửa + bột vỏ quả óc chó + AHA, thanh lọc da, làm sạch sâu và cải thiện bề mặt da.</p>\r\n<p>- Chăm sóc toàn bộ vấn đề lỗ chân lông: Se khít lỗ chân lông, kiểm soát bã nhờn, loại bỏ tế bào chết và tạp chất, loại bỏ mụn đầu đen, làm sạch sâu, dịu da, làm sáng và săn chắc da.</p>\r\n<p>- Hấp thụ 98%* bã nhờn sau môt lần sử dụng mặt nạ giúp làm sạch lỗ chân lông mạnh mẽ.</p>\r\n</div>\r\n</details>\r\n<hr><!-- Đường kẻ ngang ngăn cách -->\r\n<details>\r\n<summary>Hướng dẫn sử dụng <span class=\"arrow\">▾</span></summary>\r\n<div class=\"content\">\r\n<p>Sau khi rửa mặt, lau khô, thoa mặt nạ lên toàn mặt, lưu ý tránh vùng mắt và môi. Sau 10 phút, rửa mặt sạch với nước ấm. Dùng 1-2 lần/tuần (tùy vào tình trạng da).</p>\r\n</div>\r\n</details>', 306000, NULL, 'mat_na_1.jpg', '', '', '', '', 15, '2024-12-11 16:45:23'),
('SP065', 9, 'Mặt nạ tẩy tế bào da chết innisfree Green Barley Gommage Mask 120 mL', '<div class=\"container\">\r\n<details>\r\n<summary>Thông tin sản phẩm <span class=\"arrow\">▾</span></summary>\r\n<div class=\"content\">\r\n<p><strong>Công dụng:</strong></p>\r\n<p>- Lúa mạch xanh không hóa chất thu hoạch từ đảo Gapado chứa hàm lượng chất xơ và các thành phần dinh dưỡng khác (protein, vitamin, …) dồi dào hiệu quả trong việc làm sạch và sáng da.</p>\r\n<p>- 3 loại AHA có nguồn gốc thiên nhiên chiết xuất từ mầm lúa mạch xanh đảo Jeju giúp lấy đi tế bào chết hiệu quả cho làn da sạch mướt và tươi sáng.</p>\r\n<p>- Hiệu quả làm sạch và loại bỏ tế bào chết trên da gấp 2 lần nhờ kết hợp chức năng tẩy tế bào chết hóa học từ AHA, BHA và tẩy tế bào chết vật lý của Cellulose tự nhiên.</p>\r\n<p>- Chiết xuất từ lúa mạch xanh giàu chất xơ và protein giúp tăng cường khả năng loại bỏ tế bào chết, cải thiện bề mặt da mà không gây cảm giác khô căng trên da.</p>\r\n</div>\r\n</details>\r\n<hr><!-- Đường kẻ ngang ngăn cách -->\r\n<details>\r\n<summary>Hướng dẫn sử dụng <span class=\"arrow\">▾</span></summary>\r\n<div class=\"content\">\r\n<p>Sau khi rửa mặt và lau khô nước, lấy một lượng thích hợp khoảng bằng đồng xu thoa đều lên mặt, tránh vùng mắt và môi. Sau 3 phút, dùng đầu ngón tay miết nhẹ lên da rồi rửa sạch bằng nước. (Dùng 1-2 lần/tuần).</p>\r\n</div>\r\n</details>', 221000, NULL, 'mat_na_2.jpg', '', '', '', '', 25, '2024-12-11 16:45:23'),
('SP066', 10, 'Son dưỡng môi chuyên sâu INNISFREE Dewy Treatment Lip Balm 3.2 g', '<div class=\"container\">\r\n<details>\r\n<summary>Thông tin sản phẩm <span class=\"arrow\">▾</span></summary>\r\n<div class=\"content\">\r\n<p><strong>Công dụng:</strong></p>\r\n<p>- Liệu pháp giúp phục hồi đôi môi nứt nẻ và nuôi dưỡng chuyên sâu vào ban đêm nhờ chiết xuất dầu hạt hoa trà từ đảo Jeju và bơ hạt mỡ, cho đôi môi luôn được cấp ẩm và mềm mại vào mỗi sáng thức dậy.</p>\r\n<p>- Son lên môi tạo một lớp màng mỏng nhẹ như nhung giúp bảo vệ và lưu giữ độ ẩm lâu hơn, hạn chế tình trạng khô và bong tróc.</p>\r\n<p>- Son dưỡng với công thức sạch #Clean Recipe đã được kiểm nghiệm da liệu, thích hợp sử dụng mỗi tối.</p>\r\n<p><strong>Chứng nhận:</strong></p>\r\n<p>Không nguyên liệu Động vật; Không dầu khoáng; Không Parabens; Không bột Talc; Không Polyacrylamide; Không hương liệu; Không màu tổng hợp; Không Imidazolidinyl Urea; Không Triethanolamine; Không Silicone Oil; Không chất hoạt động bề mặt PEG.</p>\r\n</div>\r\n</details>\r\n<hr><!-- Đường kẻ ngang ngăn cách -->\r\n<details>\r\n<summary>Hướng dẫn sử dụng <span class=\"arrow\">▾</span></summary>\r\n<div class=\"content\">\r\n<p>Thoa nhẹ nhàng lượng thích hợp lên môi.</p>\r\n<p>*Tip: Thoa một lớp dày trên môi trước khi ngủ để môi được mềm mịn và đủ ẩm vào sáng hôm sau.</p>\r\n</div>\r\n</details>', 306000, NULL, 'duong_moi_1.jpg', '', '', '', '', 15, '2024-12-11 16:51:34'),
('SP067', 10, 'Son dưỡng ẩm không màu INNISFREE Canola Honey Lip Balm 3.5 g', '<div class=\"container\">\r\n<details>\r\n<summary>Thông tin sản phẩm <span class=\"arrow\">▾</span></summary>\r\n<div class=\"content\">\r\n<p><strong>Công dụng:</strong></p>\r\n<p>- Mật ong canola quý được thu hoạch từ vườn hoa cải vào tháng 4. Mật ong nổi tiếng giàu flavonoid và protein, cùng hương thơm ngọt ngào như đứng giữa vườn hoa mùa xuân trên đảo Jeju. Công thức mật ong và hạt cải dầu Jeju bổ sung nước cho da, đồng thời tạo lá chắn dưỡng ẩm nhờ acid béo không bão hòa.\r\n</p>\r\n<p>- Son dưỡng chứa chiết xuất từ mật ong và dầu hoa cải, giúp dưỡng ẩm và duy trì làn môi mềm mại. Son bổ sung thêm bơ hạt xoài tăng cường độ đàn hồi cho đôi môi.\r\n</p>\r\n<p>- Hương thơm ngọt ngào từ mật ong mang lại cảm giác dễ chịu, thư thái khi dưỡng môi.</p>\r\n</div>\r\n</details>\r\n<hr><!-- Đường kẻ ngang ngăn cách -->\r\n<details>\r\n<summary>Hướng dẫn sử dụng <span class=\"arrow\">▾</span></summary>\r\n<div class=\"content\">\r\n<p>Thoa nhẹ nhàng lượng thích hợp lên môi.</p>\r\n<p>*Tip: Thoa một lớp dày trên môi trước khi ngủ để môi được mềm mịn và đủ ẩm vào sáng hôm sau.</p>\r\n</div>\r\n</details>', 156000, NULL, 'duong_moi_2.jpg', '', '', '', '', 25, '2024-12-11 16:51:34'),
('SP068', 12, 'Kem dưỡng giúp làm mờ các dấu hiệu lão hóa trên da INNISFREE Collagen Green Tea Ceramide Bounce Cream 50mL', '<div class=\"container\">\r\n<details>\r\n<summary>Thông tin sản phẩm <span class=\"arrow\">▾</span></summary>\r\n<div class=\"content\">\r\n<p><strong>Công dụng:</strong></p>\r\n<p>- Cải thiện đến 19.2% độ đàn hồi và đẩy lùi đa dấu hiệu lão hóa sớm chỉ sau 4 tuần.\r\n</p>\r\n<p>- Kết hợp COLLAGEN thủy phân chiết xuất từ Sừng hươu biển và CERAMIDE chiết xuất từ Trà xanh giúp cải thiện độ đàn hồi, dưỡng ẩm và củng cố màng lipid của da.\r\n</p>\r\n<p>- Kem thẩm thấu nhanh không gây bết dính.</p>\r\n<p>- Công thức dịu nhẹ, không gây kích ứng, phù hợp cả da nhạy cảm và da mụn.</p>\r\n<p>- Công thức dịu nhẹ, không gây kích ứng, phù hợp cả da nhạy cảm và da mụn.</p>\r\n<p>- Công thức sạch, không hương liệu và thuần chay.</p>\r\n</div>\r\n</details>\r\n<hr><!-- Đường kẻ ngang ngăn cách -->\r\n<details>\r\n<summary>Hướng dẫn sử dụng <span class=\"arrow\">▾</span></summary>\r\n<div class=\"content\">\r\n<p>- Sử dụng ngày 2 lần sáng và tối.</p>\r\n<p>- Rửa mặt thật sạch bằng nước hoặc sữa rửa mặt. Dùng sau bước serum.</p>\r\n<p>- Cho 1 lượng kem vừa đủ ra tay và chấm lên 5 điểm: trán, mũi, 2 má và cằm</p>\r\n<p>- Xoa đều từ trong ra ngoài, từ trên xuống dưới. Vỗ nhẹ 30 giây để kem dưỡng thấm vào da.</p>\r\n</div>\r\n</details>', 756000, NULL, 'bo_cham_soc_da.jpg', '', '', '', '', 20, '2024-12-11 17:20:09'),
('SP069', 13, 'Chì kẻ viền mắt chống nước innisfree Simple Label Waterproof Pencil Liner 0.1 g', '<div class=\"container\">\r\n<details>\r\n<summary>Thông tin sản phẩm <span class=\"arrow\">▾</span></summary>\r\n<div class=\"content\">\r\n<p><strong>Công dụng:</strong></p>\r\n<p>- Công nghệ đa chống thấm, giúp chống lại cả dầu và nước trên da, giữ cho đường kẻ không lem, không trôi trong suốt cả ngày dài.\r\n</p>\r\n<p>- Chất chì với công thức khô nhanh giúp khắc phục các lỗi thường gặp khi kẻ mắt, cho thao tác vẽ dễ dàng và gọn gàng, tạo hiệu ứng đường kẻ sắc nét vẽ ít bị lem.\r\n</p>\r\n<p>- Chất chì với công thức khô nhanh giúp khắc phục các lỗi thường gặp khi kẻ mắt, cho thao tác vẽ dễ dàng và gọn gàng, tạo hiệu ứng đường kẻ sắc nét vẽ ít bị lem.</p>\r\n<p><strong>Chứng nhận thuần chay:</strong></p>\r\n<p>EVE Vegan là chứng nhận thuần chay chính thức từ Pháp. Sản phẩm không chứa thành phần từ động vật, hương liệu và màu hóa học.\r\n</p>\r\n</div>\r\n</details>\r\n<hr><!-- Đường kẻ ngang ngăn cách -->\r\n<details>\r\n<summary>Hướng dẫn sử dụng <span class=\"arrow\">▾</span></summary>\r\n<div class=\"content\">\r\n<p>- Kẻ và tô đầy dọc đường viền mí mắt.</p>\r\n<p>- Sử dụng sản phẩm tẩy trang chuyên dụng cho mắt khi tẩy trang.</p>\r\n</div>\r\n</details>', 212000, NULL, 'eyeliner_1.jpg', '', '', '', '', 50, '2024-12-11 17:29:10'),
('SP070', 13, 'Bút kẻ viền mắt nước lâu trôi innisfree Powerproof Pen Liner 0.6 g', '<div class=\"container\">\r\n<details>\r\n<summary>Thông tin sản phẩm <span class=\"arrow\">▾</span></summary>\r\n<div class=\"content\">\r\n<p><strong>Công dụng:</strong></p>\r\n<p>- Đầu bút có thiết kế thông minh, dễ dàng điều chỉnh độ dày bằng một đầu miếng bọt biển mềm, cho đường kẻ sắc nét và đôi mắt thêm sâu. Bút kẻ mắt có 2 tone màu tự nhiên và dễ dùng: Màu đen thu hút và màu nâu mộng mơ.\r\n</p>\r\n<p>- Công thức kháng nước, mồ hôi và bã nhờn giúp duy trì lớp trang điểm lâu bền.\r\n</p>\r\n<p>- Dễ dàng làm sạch bằng nước tẩy trang dành cho mắt & môi hoặc sữa rửa mặt mà không để lại vết lem, đồng thời lành tính cho làn da mắt mỏng manh.</p>\r\n</div>\r\n</details>\r\n<hr><!-- Đường kẻ ngang ngăn cách -->\r\n<details>\r\n<summary>Hướng dẫn sử dụng <span class=\"arrow\">▾</span></summary>\r\n<div class=\"content\">\r\n<p>- Kẻ và tô đầy dọc đường viền mí mắt.</p>\r\n<p>- Sử dụng sản phẩm tẩy trang chuyên dụng cho mắt khi tẩy trang.</p>\r\n</div>\r\n</details>', 212000, NULL, 'eyeliner_2.jpg', '', '', '', '', 50, '2024-12-11 17:29:10'),
('SP071', 14, 'Chì kẻ chân mày INNISFREE Auto Eyebrow Pencil 0.3 g', '<div class=\"container\">\r\n<details>\r\n<summary>Hướng dẫn sử dụng <span class=\"arrow\">▾</span></summary>\r\n<div class=\"content\">\r\n<p>- Kẻ đường viền rồi tô nhẹ bên trong chân mày.</p>\r\n<p>- Dùng đầu cọ chải nhẹ nhàng theo chiều cấu tạo chân mày.</p>\r\n</div>\r\n</details>', 92000, NULL, 'ke_chan_may_1.jpg', '', '', '', '', 10, '2024-12-11 17:35:37'),
('SP072', 14, 'Chì kẻ lông mày lâu trôi innisfree Simple Label Lasting Pencil Brow 0.15 g', '<div class=\"container\">\r\n<details>\r\n<summary>Thông tin sản phẩm <span class=\"arrow\">▾</span></summary>\r\n<div class=\"content\">\r\n<p><strong>Công dụng:</strong></p>\r\n<p>- Đầu chì kẻ được dát 3D cho thao tác vẽ dễ dàng và nhanh chóng, đường kẻ nét và tinh tế, tạo hiệu ứng trang điểm lông mày tự nhiên và thanh lịch.\r\n</p>\r\n<p>- Kết cấu chì chắc chắn giúp hạn chế đứt gãy khi vẽ. Công thức màu tự nhiên và bám lâu, chống thấm nước và dầu, mang lại hiệu ứng lông mày sắc nét và lâu trôi.\r\n</p>\r\n<p><strong>Chứng nhận thuần chay:</strong></p>\r\n<p>EVE Vegan là chứng nhận thuần chay chính thức từ Pháp. Sản phẩm không chứa thành phần từ động vật, hương liệu và màu hóa học.\r\n</p>\r\n</div>\r\n</details>\r\n<hr><!-- Đường kẻ ngang ngăn cách -->\r\n<details>\r\n<summary>Hướng dẫn sử dụng <span class=\"arrow\">▾</span></summary>\r\n<div class=\"content\">\r\n<p>Vẽ phác thảo khung chân mày sau đó tô đầy phần bên trong chân mày.</p>\r\n</div>\r\n</details>', 238000, NULL, 'ke_chan_may_2.jpg', '', '', '', '', 15, '2024-12-11 17:35:37'),
('SP073', 15, 'Mascara thuần chay, làm dài và cong mi innisfree Simple Label Volume & Curl Mascara 7.5 g', '<div class=\"container\">\r\n<details>\r\n<summary>Thông tin sản phẩm <span class=\"arrow\">▾</span></summary>\r\n<div class=\"content\">\r\n<p><strong>Công dụng:</strong></p>\r\n<p>- Simple Label chiết xuất hoàn toàn từ nguyên liệu thiên nhiên thuần chay như Tú Cầu và bộ khoáng vô cơ đạt chuẩn EVE Vegan Certified (*), an toàn và lành tính với cả làn da nhạy cảm và mắt đã trải qua phẫu thuật tật khúc xạ. Simple Label sinh ra để theo đuổi vẻ đẹp, khỏe mạnh tự nhiên, làm dịu và đồng thời giảm căng thẳng cho làn da phải trang điểm mỗi ngày.\r\n</p>\r\n<p>- Mascara thiết kế đầu cọ thẳng giúp làm mi dày và cong suốt nhiều 12 giờ, phù hợp cho hàng mi thưa. Mascara chống lem hoàn hảo nhờ chiết xuất sợi tre và tro núi lửa, cho hàng mi cong vút dài lâu.\r\n</p>\r\n<p>- Mascara dịu nhẹ, tạo cảm giác thoải mái và không nặng mi. Sản phẩm đạt kết quả chứng minh lâm sàng (**)</p>\r\n<p><strong>Chứng nhận :</strong></p>\r\n<p>- EVE Vegan là chứng nhận thuần chay chính thức từ Pháp. Sản phẩm không chứa thành phần từ động vật, hương liệu và màu hóa học.\r\n</p>\r\n<p>- Đạt kết quả chứng minh Human application eye irritation test - Bao gồm thử nghiệm nước mắt, khảo sát và đánh giá thị giác của chuyên gia.</p>\r\n</div>\r\n</details>\r\n<hr><!-- Đường kẻ ngang ngăn cách -->\r\n<details>\r\n<summary>Hướng dẫn sử dụng <span class=\"arrow\">▾</span></summary>\r\n<div class=\"content\">\r\n<p>- Nhẹ nhàng chải lông mi từ gốc đến ngọn.</p>\r\n<p>- Sử dụng sản phẩm tẩy trang chuyên dụng cho mắt khi tẩy trang.</p>\r\n</div>\r\n</details>', 340000, NULL, 'mascara_1.jpg', '', '', '', '', 15, '2024-12-11 17:42:41'),
('SP074', 15, 'Mascara thuần chay, làm dài và cong mi innisfree Simple Label Long & Curl Mascara 7.5 g', '<div class=\"container\">\r\n<details>\r\n<summary>Thông tin sản phẩm <span class=\"arrow\">▾</span></summary>\r\n<div class=\"content\">\r\n<p><strong>Công dụng:</strong></p>\r\n<p>- Simple Label chiết xuất hoàn toàn từ nguyên liệu thiên nhiên thuần chay như Tú Cầu và bộ khoáng vô cơ đạt chuẩn EVE Vegan Certified (*), an toàn và lành tính với cả làn da nhạy cảm và mắt đã trải qua phẫu thuật tật khúc xạ. Simple Label sinh ra để theo đuổi vẻ đẹp, khỏe mạnh tự nhiên, làm dịu và đồng thời giảm căng thẳng cho làn da phải trang điểm mỗi ngày.\r\n</p>\r\n<p>- Mascara thiết kế đầu cọ thẳng giúp làm mi dày và cong suốt nhiều 12 giờ, phù hợp cho hàng mi thưa. Mascara chống lem hoàn hảo nhờ chiết xuất sợi tre và tro núi lửa, cho hàng mi cong vút dài lâu.\r\n</p>\r\n<p>- Mascara dịu nhẹ, tạo cảm giác thoải mái và không nặng mi. Sản phẩm đạt kết quả chứng minh lâm sàng (**)</p>\r\n<p><strong>Chứng nhận :</strong></p>\r\n<p>- EVE Vegan là chứng nhận thuần chay chính thức từ Pháp. Sản phẩm không chứa thành phần từ động vật, hương liệu và màu hóa học.\r\n</p>\r\n<p>- Đạt kết quả chứng minh Human application eye irritation test - Bao gồm thử nghiệm nước mắt, khảo sát và đánh giá thị giác của chuyên gia.</p>\r\n</div>\r\n</details>\r\n<hr><!-- Đường kẻ ngang ngăn cách -->\r\n<details>\r\n<summary>Hướng dẫn sử dụng <span class=\"arrow\">▾</span></summary>\r\n<div class=\"content\">\r\n<p>- Nhẹ nhàng chải lông mi từ gốc đến ngọn.</p>\r\n<p>- Sử dụng sản phẩm tẩy trang chuyên dụng cho mắt khi tẩy trang.</p>\r\n</div>\r\n</details>', 340000, NULL, 'mascara_2.jpg', '', '', '', '', 15, '2024-12-11 17:42:41'),
('SP075', 16, 'Son bóng dạng thỏi INNISFREE DEWY GLOWY LIPSTICK 3.5G', '<div class=\"container\">\r\n<details>\r\n<summary>Thông tin sản phẩm <span class=\"arrow\">▾</span></summary>\r\n<div class=\"content\">\r\n<p><strong>Công dụng:</strong></p>\r\n<p>Kết cấu mềm mịn giúp son lên môi căng bóng mà vẫn mỏng nhẹ tuyệt đối, bền màu mà không khô môi. Bảng màu tự nhiên, đa dạng và dễ dùng, phù hợp với nhiều tông da Châu Á:\r\n</p>\r\n<p>- Dew Pink: Màu hồng nhạt có màu như sương sớm mai đọng trên cánh hồng, phù hợp với da tông màu lạnh.\r\n</p>\r\n<p>- Sugar Coral: Màu cam san hô pha một chút ánh hồng ngọt ngào, phù hợp với da tông màu ấm.</p>\r\n<p>- Tangerine Orange: Màu cam nhạt như một trái quýt căng mọng, phù hợp với da tông màu ấm.</p>\r\n<p>Son dưỡng có công thức polymer giữ nước cung cấp độ ẩm cho môi, tạo lớp son bóng nhưng không gây bết dính.\r\n</p>\r\n<p>Son bóng với đa sắc màu tự nhiên, chất son ẩm mịn nhưng vẫn nhẹ môi, độ bám màu cao cho đôi môi tươi tắn suốt cả ngày dài. Màu sẽ lên rõ hơn khi bạn thoa chồng nhiều lớp lên nhau. Bạn có thể tạo ra nhiều kiểu trang điểm môi khác nhau như khi thoa 1 lớp</p>\r\n</div>\r\n</details>\r\n<hr><!-- Đường kẻ ngang ngăn cách -->\r\n<details>\r\n<summary>Hướng dẫn sử dụng <span class=\"arrow\">▾</span></summary>\r\n<div class=\"content\">\r\n<p>Thoa một lượng vừa đủ lên môi và tán đều.</p>\r\n</div>\r\n</details>', 391000, NULL, 'son_moi_1.png', '', '', '', '', 15, '2024-12-11 17:46:59'),
('SP076', 16, 'Son lì dạng thỏi mỏng nhẹ INNISFREE Airy Matte Lipstick 3.5g', '<div class=\"container\">\r\n<details>\r\n<summary>Thông tin sản phẩm <span class=\"arrow\">▾</span></summary>\r\n<div class=\"content\">\r\n<p><strong>Công dụng:</strong></p>\r\n<p>Công thức bột siêu mịn cùng kết cấu mềm mại giúp son lên môi được mượt mà và mỏng nhẹ tuyệt đối, bền màu mà không khô môi. Bảng màu MLBB đa dạng và dễ dùng, phù hợp với nhiều tông da Châu Á:\r\n</p>\r\n<p># No.1 Almond Butter: Tông cam nude nhẹ nhàng mang lại cảm giác thời thượng và nổi bật.\r\n</p>\r\n<p># No.2 Mood Orange: Sắc cam cháy pha nâu cực kỳ trendy, không kén men răng, phù hợp với mọi tông da.</p>\r\n<p># No.3 Coral Land: Một sự kết hợp tinh tế giữa sắc cam san hô và sắc hồng đào đầy ấn tượng và cực kì tôn da.</p>\r\n<p>Sự kết hợp hoàn hảo giữa phức hợp Ceramide và 4 loại bơ: bơ cacao, bơ hạt mỡ, bơ hạt Murumuru, bơ hạt xoài Mangifera Indica giúp dưỡng ẩm toàn diện, làm mềm môi, giảm thiểu tình trạng nứt nẻ và bong tróc, giúp màu son lên môi chuẩn và mịn màng ngay từ lần thoa đầu tiên.\r\n</p>\r\n<p>Airy Matte Lipstick với đa sắc màu tự nhiên, chất son mịn và lì nhưng vẫn nhẹ nhàng, độ bám màu cao cho đôi môi tươi tắn suốt cả ngày dài.</p>\r\n</div>\r\n</details>\r\n<hr><!-- Đường kẻ ngang ngăn cách -->\r\n<details>\r\n<summary>Hướng dẫn sử dụng <span class=\"arrow\">▾</span></summary>\r\n<div class=\"content\">\r\n<p>Thoa một lượng vừa đủ lên môi và tán đều.</p>\r\n</div>\r\n</details>', 323000, NULL, 'son_moi_2.jpg', '', '', '', '', 20, '2024-12-11 17:51:38'),
('SP077', 17, 'Bấm mi cao cấp innisfree Premium Eyelash Curler 1ea', '<div class=\"container\">\r\n<details>\r\n<summary>Thông tin sản phẩm <span class=\"arrow\">▾</span></summary>\r\n<div class=\"content\">\r\n<p><strong>Công dụng:</strong></p>\r\n<p>Bấm mi với chất liệu cao cấp, cho mi cong tự nhiên và dễ dàng hơn. Bấm mi có đầu kẹp dẹt và cong nhẹ theo đường viền mắt, giiúp hàng mi cong đều từ đầu đến đuôi mắt một cách nhẹ nhàng.\r\n</p>\r\n<p>Thiết kế gọn nhẹ, vừa tay và chắc chắn, cho đôi mắt thêm sâu.\r\n</p>\r\n<p>Dụng cụ làm cong mi một cách tự nhiên, nhẹ nhàng mà không làm gãy hay rụng mi, bảo vệ hàng mi tự nhiên.</p>\r\n</div>\r\n</details>\r\n<hr><!-- Đường kẻ ngang ngăn cách -->\r\n<details>\r\n<summary>Hướng dẫn sử dụng <span class=\"arrow\">▾</span></summary>\r\n<div class=\"content\">\r\n<p>Nhẹ nhàng kẹp lông mi và bấm để tạo độ cong cho hàng mi.</p>\r\n</div>\r\n</details>', 102000, NULL, 'kep_mi.jpg', '', '', '', '', 15, '2024-12-11 17:46:59'),
('SP078', 18, 'Kem ủ dưỡng chân tóc innisfree My Hair Recipe Strength Treatment For Hair Roots Care 200 mL', '<div class=\"container\">\r\n<details>\r\n<summary>Thông tin sản phẩm <span class=\"arrow\">▾</span></summary>\r\n<div class=\"content\">\r\n<p><strong>Công dụng:</strong></p>\r\n<p>My Hair Strength là dòng dưỡng chân tóc khỏe mạnh và phục hồi gãy rụng nhờ thành phần thiên nhiên lành tính. Hỗn hợp Phytoncide gồm cây thông, cây bách và tuyết tùng trong dầu gội giúp giảm căng thẳng cho da đầu. Dòng sản phẩm bổ sung nhân sâm và bái tử nhân để tăng cường sức khỏe cho mái tóc.\r\n</p>\r\n<p>Bên cạnh dưỡng tóc khỏe mạnh, dầu hướng dương giúp tăng độ bóng, cho mái tóc thêm óng ả.\r\n</p>\r\n<p>Dầu xả không chứa silicon, an toàn cho da đầu và phục hồi sức sống cho mái tóc bóng khỏe.</p>\r\n</div>\r\n</details>\r\n<hr><!-- Đường kẻ ngang ngăn cách -->\r\n<details>\r\n<summary>Hướng dẫn sử dụng <span class=\"arrow\">▾</span></summary>\r\n<div class=\"content\">\r\n<p>Lau khô tóc sau khi gội đầu. Thoa một lượng thích hợp sản phẩm lên tóc, mát-xa da đầu và tóc. Sau đó, xả sạch lại với nước ấm.</p>\r\n</div>\r\n</details>', 263000, NULL, 'dau_goixa_1.jpg', '', '', '', '', 20, '2024-12-11 17:59:20'),
('SP079', 18, 'Dầu gội nuôi dưỡng chân tóc innisfree My Hair Recipe Strength Shampoo For Hair Roots Care 330 mL', '<div class=\"container\">\r\n<details>\r\n<summary>Thông tin sản phẩm <span class=\"arrow\">▾</span></summary>\r\n<div class=\"content\">\r\n<p><strong>Công dụng:</strong></p>\r\n<p>My Hair Strength là dòng dưỡng chân tóc khỏe mạnh và phục hồi gãy rụng nhờ thành phần thiên nhiên lành tính. Hỗn hợp Phytoncide gồm cây thông, cây bách và tuyết tùng trong dầu gội giúp giảm căng thẳng cho da đầu. Dòng sản phẩm bổ sung nhân sâm và bái tử nhân để tăng cường sức khỏe cho mái tóc.\r\n</p>\r\n<p>Bên cạnh dưỡng tóc khỏe mạnh, dầu hướng dương giúp tăng độ bóng, cho mái tóc thêm óng ả.\r\n</p>\r\n<p>Dầu xả không chứa silicon, an toàn cho da đầu và phục hồi sức sống cho mái tóc bóng khỏe.</p>\r\n</div>\r\n</details>\r\n<hr><!-- Đường kẻ ngang ngăn cách -->\r\n<details>\r\n<summary>Hướng dẫn sử dụng <span class=\"arrow\">▾</span></summary>\r\n<div class=\"content\">\r\n<p>Lau khô tóc sau khi gội đầu. Thoa một lượng thích hợp sản phẩm lên tóc, mát-xa da đầu và tóc. Sau đó, xả sạch lại với nước ấm.</p>\r\n</div>\r\n</details>', 229000, NULL, 'dau_goixa_2.jpg', '', '', '', '', 20, '2024-12-11 17:59:20'),
('SP080', 19, 'Dầu dưỡng tóc hương hoa trà INNISFREE Camellia Essential Hair Oil Serum 100 mL', '<div class=\"container\">\r\n<details>\r\n<summary>Thông tin sản phẩm <span class=\"arrow\">▾</span></summary>\r\n<div class=\"content\">\r\n<p><strong>Công dụng:</strong></p>\r\n<p>Hoa Camellia chịu đựng những ngày lạnh giá trên tuyết mà vẫn tràn đầy sức sống. Từ lâu, hoa Camellia từ lâu đã đượcsử dụng để làm đẹp cho da và tóc, nhờ khả năng dưỡng ẩm tuyệt vời và làm dịu. Ngoài ra, hoa Camellia là thành phần mà khoa học thường dùng để phục hồi làn hư tổn từ ô nhiễm môi trường hoặc căng thẳng. innisfree thu mua hoa trà tự nhiên từ phụ nữ cao tuổi sống ở làng Dongbaek Jeju để đóng góp xây dựng cộng đồng.\r\n</p>\r\n<p>Tinh chất dưỡng tóc với hiệu quả 2 trong 1 từ hoa trà, giúp tạo màn chắn bảo vệ từng sợi tóc, mang lại mái tóc bóng mượt, chắc khỏe.\r\n</p>\r\n<p>Tinh chất giúp giữ tóc vào nếp để dễ tạo kiểu. Kết cấu dạng dầu trong suốt và hương thảo mộc thơm nhẹ, thấm nhanh vào sâu trong chân tóc, cung cấp dưỡng chất đồng thời tạo kiểu đa dạng.</p>\r\n</div>\r\n</details>\r\n<hr><!-- Đường kẻ ngang ngăn cách -->\r\n<details>\r\n<summary>Hướng dẫn sử dụng <span class=\"arrow\">▾</span></summary>\r\n<div class=\"content\">\r\n<p>Bơm 2-3 lần sản phẩm rồi thoa nhẹ lên toàn bộ tóc đã được lau khô sau khi gội đầu, chú ý phần đuôi tóc.</p>\r\n</div>\r\n</details>', 246000, NULL, 'duong_toc_1.jpg', '', '', '', '', 15, '2024-12-11 18:03:40'),
('SP081', 19, 'Tinh chất dưỡng tóc uốn INNISFREE My Hair Recipe Curl Up Essence For Permed & Curly Hair 100 mL', '<div class=\"container\">\r\n<details>\r\n<summary>Thông tin sản phẩm <span class=\"arrow\">▾</span></summary>\r\n<div class=\"content\">\r\n<p><strong>Công dụng:</strong></p>\r\n<p>My Hair Curl Up là dòng dưỡng dành riêng cho tóc uốn, chứa thành phần hỗn hợp đậu nành Jeju cô đặc, protein từ đậu nành và giấm táo giúp tạo độ bồng bềnh và mượt mà cho mái tóc.</p>\r\n<p>Tinh chất dưỡng giúp các lọn tóc vào nếp và khỏe mạnh, tăng độ đàn hồi\r\n</p>\r\n<p>Tinh chất dưỡng giúp bạn dễ dàng tạo kiểu cho mái tóc và giữ nếp bền lâu mà không gây bết dính.</p>\r\n</div>\r\n</details>\r\n<hr><!-- Đường kẻ ngang ngăn cách -->\r\n<details>\r\n<summary>Hướng dẫn sử dụng <span class=\"arrow\">▾</span></summary>\r\n<div class=\"content\">\r\n<p>Lau khô tóc sau khi gội đầu. Thoa một lượng thích hợp sản phẩm lên tóc, đặc biệt phần tóc muốn tạo kiểu và giữ nếp.</p>\r\n</div>\r\n</details>', 272000, NULL, 'duong_toc_2.jpg', '', '', '', '', 15, '2024-12-11 18:03:40'),
('SP082', 19, 'Xịt dưỡng tóc innisfree My Hair Recipe Strength Tonic Essence For Hair Roots Care 100 mL', '<div class=\"container\">\r\n<details>\r\n<summary>Thông tin sản phẩm <span class=\"arrow\">▾</span></summary>\r\n<div class=\"content\">\r\n<p><strong>Công dụng:</strong></p>\r\n<p>My Hair Strength là dòng dưỡng chân tóc khỏe mạnh và phục hồi gãy rụng nhờ thành phần thiên nhiên lành tính. Hỗn hợp Phytoncide gồm cây thông, cây bách và tuyết tùng trong dầu gội giúp giảm căng thẳng cho da đầu. Dòng sản phẩm bổ sung nhân sâm và bái tử nhân để tăng cường sức khỏe cho mái tóc.</p>\r\n<p>Dưỡng chất dạng xịt giúp lập tức cung cấp dưỡng chất và tạo cảm giác mát lạnh, tươi mới cho da đầu.\r\n</p>\r\n<p>Sản phẩm không chứa silicon, an toàn cho da đầu và phục hồi sức sống cho mái tóc bóng khỏe.</p>\r\n</div>\r\n</details>\r\n<hr><!-- Đường kẻ ngang ngăn cách -->\r\n<details>\r\n<summary>Hướng dẫn sử dụng <span class=\"arrow\">▾</span></summary>\r\n<div class=\"content\">\r\n<p>Lắc đều và xịt một lượng sản phẩm thích hợp trực tiếp lên da đầu đã gội sạch. Dùng các ngón tay mát-xa và vỗ nhẹ để tăng khả năng thẩm thấu.</p>\r\n</div>\r\n</details>', 272000, NULL, 'duong_toc_3.jpg', '', '', '', '', 10, '2024-12-11 18:07:38');

--
-- Triggers `sanpham`
--
DELIMITER $$
CREATE TRIGGER `before_insert_sanpham` BEFORE INSERT ON `sanpham` FOR EACH ROW BEGIN
    DECLARE next_value INT;

    -- Kiểm tra xem bảng SanPham đã có trong IncrementTable chưa
    IF (SELECT COUNT(*) FROM IncrementTable WHERE TableName = 'SanPham') = 0 THEN
        -- Nếu chưa có, thêm mới với giá trị bắt đầu là 0
        INSERT INTO IncrementTable (TableName, CurrentValue) VALUES ('SanPham', 0);
    END IF;

    -- Lấy giá trị hiện tại từ IncrementTable
    SELECT CurrentValue INTO next_value FROM IncrementTable WHERE TableName = 'SanPham' FOR UPDATE;

    -- Sinh mã tự động (VD: SP001, SP002, ...)
    SET NEW.masanpham = CONCAT('SP', LPAD(next_value + 1, 3, '0'));

    -- Cập nhật giá trị trong IncrementTable
    UPDATE IncrementTable SET CurrentValue = next_value + 1 WHERE TableName = 'SanPham';
END
$$
DELIMITER ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `chitiethoadon`
--
ALTER TABLE `chitiethoadon`
  ADD PRIMARY KEY (`mahoadon`,`masanpham`);

--
-- Indexes for table `danhmucsp`
--
ALTER TABLE `danhmucsp`
  ADD PRIMARY KEY (`id_danhmuc`);

--
-- Indexes for table `hoadon`
--
ALTER TABLE `hoadon`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `incrementtable`
--
ALTER TABLE `incrementtable`
  ADD PRIMARY KEY (`TableName`);

--
-- Indexes for table `khachhang`
--
ALTER TABLE `khachhang`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `sdt` (`sdt`) USING BTREE;

--
-- Indexes for table `loaisp`
--
ALTER TABLE `loaisp`
  ADD PRIMARY KEY (`id_loaisp`);

--
-- Indexes for table `nhanvien`
--
ALTER TABLE `nhanvien`
  ADD PRIMARY KEY (`manhanvien`);

--
-- Indexes for table `rank`
--
ALTER TABLE `rank`
  ADD PRIMARY KEY (`id_rank`);

--
-- Indexes for table `sanpham`
--
ALTER TABLE `sanpham`
  ADD PRIMARY KEY (`masanpham`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `danhmucsp`
--
ALTER TABLE `danhmucsp`
  MODIFY `id_danhmuc` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `hoadon`
--
ALTER TABLE `hoadon`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `loaisp`
--
ALTER TABLE `loaisp`
  MODIFY `id_loaisp` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `rank`
--
ALTER TABLE `rank`
  MODIFY `id_rank` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
