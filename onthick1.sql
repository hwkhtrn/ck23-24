-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 13, 2024 at 05:38 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `onthick1`
--

-- --------------------------------------------------------

--
-- Table structure for table `khachhang`
--

CREATE TABLE `khachhang` (
  `makh` varchar(40) NOT NULL,
  `tenkh` varchar(40) NOT NULL,
  `sdt` varchar(40) NOT NULL,
  `diachi` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `khachhang`
--

INSERT INTO `khachhang` (`makh`, `tenkh`, `sdt`, `diachi`) VALUES
('01', 'Trần Hoàng Khánh', '09100000001', 'Nghệ An'),
('02', 'Nguyễn Phan Khánh Linh', '09100000002', 'Hà Tĩnh'),
('03', 'Võ Thanh Lâm', '09100000003', 'Quảng Trị'),
('04', 'Lê Hồ Thanh Linh', '09100000004', 'Quảng Trị'),
('05', 'Nguyễn Hiền My', '09100000005', 'Quảng Ngãi'),
('06', 'Đào Duy Khang', '09100000006', 'Bình Định'),
('07', 'Trần Tuấn Kiệt', '09100000007', 'Bình Định'),
('08', 'Nguyễn Kỳ Lâm', '09100000008', 'Đồng Nai'),
('09', 'Nguyễn Công Hậu', '09100000009', 'Đồng Tháp'),
('10', 'Nguyễn Vân Khánh', '09100000010', 'An Giang');

-- --------------------------------------------------------

--
-- Table structure for table `thue`
--

CREATE TABLE `thue` (
  `mat` varchar(40) NOT NULL,
  `makh` varchar(40) NOT NULL,
  `soxe` varchar(40) NOT NULL,
  `ngaythue` date NOT NULL,
  `ngaytra` date NOT NULL,
  `giathue` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `thue`
--

INSERT INTO `thue` (`mat`, `makh`, `soxe`, `ngaythue`, `ngaytra`, `giathue`) VALUES
('1', '01', '04', '2024-06-12', '2024-06-13', 0),
('2', '01', '12', '2024-06-12', '2024-06-13', 0),
('3', '01', '15', '2024-06-12', '2024-06-13', 0),
('4', '01', '05', '2024-06-12', '2024-06-13', 0),
('5', '01', '11', '2024-06-12', '2024-06-13', 0);

-- --------------------------------------------------------

--
-- Table structure for table `xe`
--

CREATE TABLE `xe` (
  `soxe` varchar(40) NOT NULL,
  `tenxe` varchar(40) NOT NULL,
  `hangxe` varchar(40) NOT NULL,
  `socho` tinyint(4) NOT NULL,
  `namsx` varchar(40) NOT NULL,
  `dgthue` float NOT NULL,
  `tinhtrang` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `xe`
--

INSERT INTO `xe` (`soxe`, `tenxe`, `hangxe`, `socho`, `namsx`, `dgthue`, `tinhtrang`) VALUES
('01', 'Corolla', 'Toyota', 5, '2023', 10000000, 0),
('02', 'Camry', 'Toyota', 5, '2023', 10000000, 0),
('03', 'Prius', 'Toyota', 5, '1997', 10000000, 0),
('04', 'Mustang', 'Ford', 4, '2023', 10000000, 1),
('05', 'F-150', 'Ford', 5, '2023', 10000000, 1),
('06', 'Explorer', 'Ford', 7, '1990', 10000000, 0),
('07', '3 Series', 'BMW', 5, '1975', 10000000, 0),
('08', '5 Series', 'BMW', 5, '1972', 10000000, 0),
('09', 'X5', 'BMW', 7, '1999', 10000000, 0),
('10', 'S-Class', 'Mercedes-Benz', 5, '1972', 10000000, 0),
('11', 'E-Class', 'Mercedes-Benz', 5, '1993', 10000000, 1),
('12', 'G-Class', 'Mercedes-Benz', 5, '1979', 10000000, 1),
('13', 'Civic', 'Honda', 5, '1972', 10000000, 0),
('14', 'Accord', 'Honda', 5, '1976', 10000000, 0),
('15', 'CR-V', 'Honda', 5, '1995', 10000000, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `khachhang`
--
ALTER TABLE `khachhang`
  ADD PRIMARY KEY (`makh`),
  ADD KEY `makh` (`makh`);

--
-- Indexes for table `thue`
--
ALTER TABLE `thue`
  ADD PRIMARY KEY (`mat`),
  ADD KEY `makh` (`makh`),
  ADD KEY `soxe` (`soxe`);

--
-- Indexes for table `xe`
--
ALTER TABLE `xe`
  ADD PRIMARY KEY (`soxe`),
  ADD KEY `soxe` (`soxe`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `thue`
--
ALTER TABLE `thue`
  ADD CONSTRAINT `thue_ibfk_1` FOREIGN KEY (`makh`) REFERENCES `khachhang` (`makh`),
  ADD CONSTRAINT `thue_ibfk_2` FOREIGN KEY (`soxe`) REFERENCES `xe` (`soxe`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
