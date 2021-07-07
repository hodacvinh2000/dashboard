-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th7 07, 2021 lúc 05:50 AM
-- Phiên bản máy phục vụ: 10.4.18-MariaDB
-- Phiên bản PHP: 8.0.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `tin_chi`
--
CREATE database tin_chi;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `classes`
--

CREATE TABLE `classes` (
  `id` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `subject` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `classes`
--

INSERT INTO `classes` (`id`, `name`, `subject`) VALUES
('C001', 'JavaCB - Nhóm 1', 'Java cơ bản'),
('C002', 'LTHDT - Nhóm 1', 'Lập trình hướng đối tượng'),
('C003', 'HHC  - Nhóm 1', 'Hóa hữu cơ'),
('C004', 'MAC - Nhóm 1', 'Triết học Mác Lê-nin'),
('C005', 'MDTN - Nhóm 1', 'Mạch điện trong nhà'),
('C006', 'LTHDT - Nhóm 2', 'Lập trình hướng đối tượng');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `majors`
--

CREATE TABLE `majors` (
  `id` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `majors`
--

INSERT INTO `majors` (`id`, `name`) VALUES
('M001', 'Công nghệ thông tin'),
('M002', 'Điện tử viễn thông'),
('M003', 'Hóa học'),
('M004', 'Báo chí truyền thông');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `students`
--

CREATE TABLE `students` (
  `id` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `age` int(11) NOT NULL,
  `major` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `students`
--

INSERT INTO `students` (`id`, `name`, `age`, `major`) VALUES
('ST001', 'Hồ Đắc Vinh', 20, 'Công nghệ thông tin'),
('ST002', 'Hoàng Xuân Quốc Việt', 20, 'Công nghệ thông tin'),
('ST003', 'Trần Kim Hiếu', 20, 'Điện tử viễn thông'),
('ST004', 'Nguyễn Võ Đan Phượng', 20, 'Báo chí truyền thông'),
('ST005', 'Phan Văn Guyn', 20, 'Hóa học');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `student_class`
--

CREATE TABLE `student_class` (
  `student_id` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `class_id` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `student_class`
--

INSERT INTO `student_class` (`student_id`, `class_id`) VALUES
('ST001', 'C001'),
('ST001', 'C002'),
('ST002', 'C001'),
('ST002', 'C002'),
('ST002', 'C003'),
('ST002', 'C004'),
('ST003', 'C004'),
('ST003', 'C005'),
('ST004', 'C004'),
('ST005', 'C003'),
('ST005', 'C004');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `subjects`
--

CREATE TABLE `subjects` (
  `id` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `subjects`
--

INSERT INTO `subjects` (`id`, `name`) VALUES
('S001', 'Lập trình hướng đối tượng'),
('S002', 'Triết học Mác Lê-nin'),
('S003', 'Hóa hữu cơ'),
('S004', 'Mạch điện trong nhà'),
('S005', 'Java cơ bản');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `classes`
--
ALTER TABLE `classes`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `majors`
--
ALTER TABLE `majors`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `student_class`
--
ALTER TABLE `student_class`
  ADD PRIMARY KEY (`student_id`,`class_id`),
  ADD KEY `class_id` (`class_id`);

--
-- Chỉ mục cho bảng `subjects`
--
ALTER TABLE `subjects`
  ADD PRIMARY KEY (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
