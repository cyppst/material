-- phpMyAdmin SQL Dump
-- version 4.6.6deb5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: May 28, 2018 at 09:32 AM
-- Server version: 5.7.22
-- PHP Version: 7.2.5-0ubuntu0.18.04.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `material_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `equipment`
--

CREATE TABLE `equipment` (
  `id` int(10) NOT NULL,
  `barcode` varchar(13) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `detail` text,
  `image` varchar(50) NOT NULL DEFAULT 'default.png',
  `datetime` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `no_barcode` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `equipment_history`
--

CREATE TABLE `equipment_history` (
  `id` int(10) NOT NULL,
  `datetime` datetime DEFAULT CURRENT_TIMESTAMP COMMENT 'วันที่ส่งคำขอ',
  `equipment_id` int(11) NOT NULL,
  `amount` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `student_id` varchar(13) DEFAULT NULL,
  `status` enum('รับอุปกรณ์แล้ว','คืนอุปกรณ์แล้ว') NOT NULL DEFAULT 'รับอุปกรณ์แล้ว'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `equipment_stock`
--

CREATE TABLE `equipment_stock` (
  `id` int(10) NOT NULL,
  `equipment_id` int(10) DEFAULT NULL,
  `amount` int(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `material`
--

CREATE TABLE `material` (
  `id` int(10) NOT NULL,
  `barcode` varchar(13) DEFAULT NULL,
  `name` varchar(100) NOT NULL,
  `detail` text NOT NULL,
  `type_id` int(10) NOT NULL,
  `unit_id` int(11) NOT NULL,
  `image` varchar(50) NOT NULL DEFAULT 'default.png'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `material_inventory`
--

CREATE TABLE `material_inventory` (
  `id` int(10) NOT NULL,
  `datetime` datetime DEFAULT CURRENT_TIMESTAMP,
  `user_id` int(11) NOT NULL,
  `material_id` int(11) NOT NULL,
  `amount` int(11) NOT NULL,
  `student_id` varchar(13) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `material_stock`
--

CREATE TABLE `material_stock` (
  `id` int(10) NOT NULL,
  `material_id` varchar(100) DEFAULT NULL,
  `amount` int(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `material_type`
--

CREATE TABLE `material_type` (
  `id` int(10) NOT NULL,
  `name` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `material_type`
--

INSERT INTO `material_type` (`id`, `name`) VALUES
(1, 'วัสดุสำนักงาน'),
(2, 'วัสดุงานบ้านงานครัว'),
(3, 'วัสดุโฆษณาและเผยเพร่');

-- --------------------------------------------------------

--
-- Table structure for table `report_no`
--

CREATE TABLE `report_no` (
  `id` int(5) UNSIGNED ZEROFILL NOT NULL,
  `datetime` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `id` varchar(13) NOT NULL COMMENT 'รหัสนักศึกษา',
  `full_name` varchar(50) NOT NULL,
  `section` varchar(50) NOT NULL,
  `last_login` datetime DEFAULT NULL COMMENT 'ใช้งานครั้งล่าสุด'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `unit`
--

CREATE TABLE `unit` (
  `id` int(10) NOT NULL,
  `name` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `unit`
--

INSERT INTO `unit` (`id`, `name`) VALUES
(1, 'ห่อ'),
(2, 'แท่ง'),
(3, 'เล่ม'),
(4, 'ตัว'),
(5, 'ชิ้น'),
(6, 'ก้อน'),
(7, 'ตลับ'),
(8, 'หลอด');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(10) NOT NULL,
  `fullname` varchar(50) DEFAULT NULL,
  `address` varchar(200) DEFAULT NULL,
  `tel` varchar(10) DEFAULT NULL,
  `login` varchar(20) DEFAULT NULL,
  `password` varchar(10) DEFAULT NULL,
  `image` varchar(50) NOT NULL DEFAULT 'default.png'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `fullname`, `address`, `tel`, `login`, `password`, `image`) VALUES
(1, 'Admin Comsci', '...', '0999999999', 'admin', '1234', 'default.png');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `equipment`
--
ALTER TABLE `equipment`
  ADD PRIMARY KEY (`id`),
  ADD KEY `barcode` (`barcode`);

--
-- Indexes for table `equipment_history`
--
ALTER TABLE `equipment_history`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `equipment_stock`
--
ALTER TABLE `equipment_stock`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `material`
--
ALTER TABLE `material`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `barcode` (`barcode`),
  ADD KEY `barcode_2` (`barcode`);

--
-- Indexes for table `material_inventory`
--
ALTER TABLE `material_inventory`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `material_stock`
--
ALTER TABLE `material_stock`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `material_type`
--
ALTER TABLE `material_type`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `report_no`
--
ALTER TABLE `report_no`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `unit`
--
ALTER TABLE `unit`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `user_login` (`login`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `equipment`
--
ALTER TABLE `equipment`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `equipment_history`
--
ALTER TABLE `equipment_history`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `equipment_stock`
--
ALTER TABLE `equipment_stock`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `material`
--
ALTER TABLE `material`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `material_inventory`
--
ALTER TABLE `material_inventory`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `material_stock`
--
ALTER TABLE `material_stock`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `material_type`
--
ALTER TABLE `material_type`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `report_no`
--
ALTER TABLE `report_no`
  MODIFY `id` int(5) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `unit`
--
ALTER TABLE `unit`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
