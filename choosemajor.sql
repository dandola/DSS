-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 01, 2017 at 06:43 PM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 7.0.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `choosemajor`
--

-- --------------------------------------------------------

--
-- Table structure for table `env_var`
--

CREATE TABLE `env_var` (
  `id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `type` varchar(200) NOT NULL,
  `weight` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `env_var`
--

INSERT INTO `env_var` (`id`, `name`, `type`, `weight`) VALUES
(1, 'Chỉ tiêu', 'X1', 0.15),
(2, 'độ lệch 1', 'X2', 0.25),
(3, 'độ lệch 2', 'X3', 0.25),
(4, 'Sở thích', 'X4', 0.2),
(5, 'Cơ hội làm việc', 'X5', 0.1),
(6, 'tỉ lệ giới tính', 'X6', 0.05),
(10, 'anhdan', 'anhdan', 0.8);

-- --------------------------------------------------------

--
-- Table structure for table `major`
--

CREATE TABLE `major` (
  `id` int(11) NOT NULL,
  `school_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `sign` varchar(200) NOT NULL,
  `reference_1` double NOT NULL,
  `reference_2` double NOT NULL,
  `amount` int(11) NOT NULL,
  `work_opportunity` float NOT NULL,
  `rate_of_male` double NOT NULL,
  `logo` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `major`
--

INSERT INTO `major` (`id`, `school_id`, `name`, `sign`, `reference_1`, `reference_2`, `amount`, `work_opportunity`, `rate_of_male`, `logo`) VALUES
(1, 2, 'kế toán', 'T1', 25.5, 27, 400, 0.55, 0.35, ''),
(2, 2, 'kinh tế quốc tế', 'T2', 25.44, 27, 70, 0.75, 0.45, ''),
(3, 2, 'tài chính ngân hàng', 'T3', 24.03, 26, 480, 0.65, 0.55, ''),
(4, 2, 'luật', 'T4', 22.92, 25, 120, 0.45, 0.6, ''),
(5, 2, 'khoa học máy tính', 'T5', 22.95, 24.5, 100, 0.85, 0.8, ''),
(6, 2, 'marketing', 'T6', 24.09, 26.5, 200, 0.7, 0.5, ''),
(7, 2, 'kinh tế nông nghiệp', 'T7', 21.51, 23.75, 100, 0.4, 0.25, ''),
(8, 2, 'quản trị nhân lực', 'T8', 23.31, 25.75, 80, 0.6, 0.55, ''),
(9, 3, 'cấp thoát nước', 'E1', 22.08, 15.75, 150, 0.45, 0.85, ''),
(10, 3, 'Công nghệ kỹ thuật môi trường', 'E2', 24.02, 16.5, 100, 0.55, 0.8, ''),
(11, 3, 'Kỹ thuật công trình biển', 'E3', 21.24, 15.5, 100, 0.35, 0.9, ''),
(12, 3, 'Công nghệ thông tin', 'E4', 29.52, 23.25, 115, 0.85, 0.8, ''),
(13, 3, 'Máy xây dựng', 'E5', 26.16, 15.75, 100, 0.45, 0.95, ''),
(14, 3, 'Kinh tế xây dựng', 'E6', 28.88, 21, 400, 0.5, 0.45, ''),
(15, 3, 'Kinh tế và quản lý đô thị', 'E7', 27.24, 16, 100, 0.55, 0.55, ''),
(16, 3, 'Kỹ thuật Trắc địa - Bản đồ', 'E8', 21.28, 15.75, 50, 0.4, 0.9, ''),
(17, 1, 'Công nghệ thông tin', 'B1', 8.82, 28.25, 500, 0.9, 0.8, ''),
(18, 1, 'Công nghệ kt điều khiển và tự động ', 'B2', 8.53, 27.25, 700, 0.85, 0.95, ''),
(19, 1, 'cơ khí - động lực', 'B3', 8, 25.75, 900, 0.7, 0.98, ''),
(20, 1, 'Toán-tin', 'B4', 8.03, 25.75, 120, 0.65, 0.82, ''),
(21, 1, 'Hóa - Sinh - Thực phẩm và Môi trường', 'T5', 7.93, 25, 950, 0.75, 0.45, ''),
(22, 1, 'kinh tế quản lý', 'B6', 7.47, 24.25, 140, 0.65, 0.4, ''),
(23, 1, 'vật liệu', 'T7', 7.66, 23.75, 200, 0.5, 0.75, ''),
(24, 1, 'kỹ thuật dệt may', 'T8', 7.73, 24.5, 180, 0.55, 0.35, ''),
(25, 1, 'Nguyễn Văn Đàn', 'qưeq', 34, 2, 23, 1, 1, '24'),
(26, 1, 'Nguyễn Văn nhưng', 'qưeq', 34, 2, 2147483647, 1, 1, '24');

-- --------------------------------------------------------

--
-- Table structure for table `school`
--

CREATE TABLE `school` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `address` text NOT NULL,
  `logo` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `school`
--

INSERT INTO `school` (`id`, `name`, `address`, `logo`) VALUES
(1, 'Đại Học Bách Khoa Hà Nội', 'số 1- đại cồ việt', 'bk'),
(2, 'Đại Học Kinh Tế Quốc Dân', '207, Giải Phóng, P. Đồng Tâm, Q. Hai Bà Trưng, Tp. Hà Nội', 'Neu'),
(3, 'Đại Học Xây Dựng Hà Nội', 'Số 55 đường Giải Phóng, quận Hai Bà Trưng\r\nVị trí	Hà Nội, ', 'NUCE'),
(7, 'Đại học quốc gia', 'xuân thuỷ cầu giấy abcs', 'vnu');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `env_var`
--
ALTER TABLE `env_var`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `major`
--
ALTER TABLE `major`
  ADD PRIMARY KEY (`id`),
  ADD KEY `major_school_id_fk` (`school_id`);

--
-- Indexes for table `school`
--
ALTER TABLE `school`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `env_var`
--
ALTER TABLE `env_var`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `major`
--
ALTER TABLE `major`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;
--
-- AUTO_INCREMENT for table `school`
--
ALTER TABLE `school`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `major`
--
ALTER TABLE `major`
  ADD CONSTRAINT `major_school_id_fk` FOREIGN KEY (`school_id`) REFERENCES `school` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
