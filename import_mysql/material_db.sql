-- phpMyAdmin SQL Dump
-- version 4.6.6deb5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jun 03, 2018 at 03:34 AM
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
  `no_barcode` tinyint(1) NOT NULL DEFAULT '0',
  `amount` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `equipment`
--

INSERT INTO `equipment` (`id`, `barcode`, `name`, `detail`, `image`, `datetime`, `no_barcode`, `amount`) VALUES
(1, '11111', 'fdsf', 'sdfds\r\n', 'default.png', '2018-06-03 03:31:47', 0, 5);

-- --------------------------------------------------------

--
-- Table structure for table `equipment_history`
--

CREATE TABLE `equipment_history` (
  `id` int(10) NOT NULL,
  `datetime` datetime DEFAULT CURRENT_TIMESTAMP COMMENT 'à¸§à¸±à¸™à¸—à¸µà¹ˆà¸ªà¹ˆà¸‡à¸„à¸³à¸‚à¸­',
  `equipment_id` int(11) NOT NULL,
  `amount` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `student_id` varchar(13) DEFAULT NULL,
  `status` varchar(20) NOT NULL DEFAULT 'รับอุปกรณ์แล้ว'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `equipment_history`
--

INSERT INTO `equipment_history` (`id`, `datetime`, `equipment_id`, `amount`, `user_id`, `student_id`, `status`) VALUES
(42, '2018-06-03 03:30:14', 1, 1, 2, '5704063001113', 'คืนอุปกรณ์แล้ว');

-- --------------------------------------------------------

--
-- Table structure for table `log`
--

CREATE TABLE `log` (
  `id` int(11) NOT NULL,
  `datetime` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `type` enum('à¸§à¸±à¸ªà¸”à¸¸','à¸­à¸¸à¸›à¸à¸£à¸“à¹Œ') NOT NULL,
  `item_id` int(11) NOT NULL,
  `amount` int(11) NOT NULL,
  `user_id` int(11) NOT NULL
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
  `image` varchar(50) NOT NULL DEFAULT 'default.png',
  `amount` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `material_history`
--

CREATE TABLE `material_history` (
  `id` int(10) NOT NULL,
  `datetime` datetime DEFAULT CURRENT_TIMESTAMP,
  `user_id` int(11) NOT NULL,
  `material_id` int(11) NOT NULL,
  `amount` int(11) NOT NULL,
  `student_id` varchar(13) DEFAULT NULL
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
(3, 'à¸§à¸±à¸ªà¸”à¸¸à¹‚à¸†à¸©à¸“à¸²à¹à¸¥à¸°à¹€à¸œà¸¢à¹'),
(4, 'à¸à¸²à¸£à¸¨à¸¶à¸à¸©à¸²'),
(5, 'à¸à¸µà¸¬à¸²');

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
  `id` varchar(13) NOT NULL COMMENT 'à¸£à¸«à¸±à¸ªà¸™à¸±à¸à¸¨à¸¶à¸à¸©à¸²',
  `full_name` varchar(50) NOT NULL,
  `section` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
(1, 'à¸«à¹ˆà¸­'),
(2, 'à¹à¸—à¹ˆà¸‡'),
(3, 'à¹€à¸¥à¹ˆà¸¡'),
(4, 'à¸•à¸±à¸§'),
(5, 'à¸Šà¸´à¹‰à¸™'),
(6, 'à¸à¹‰à¸­à¸™'),
(7, 'à¸•à¸¥à¸±à¸š'),
(8, 'à¸«à¸¥à¸­à¸”'),
(9, 'à¸‚à¸§à¸”');

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
  `image` varchar(50) NOT NULL DEFAULT 'default.png',
  `last_login` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `fullname`, `address`, `tel`, `login`, `password`, `image`, `last_login`) VALUES
(1, 'suthathip suksawat', '12 à¸•à¸³à¸šà¸¥à¸¡à¸°à¸‚à¸²à¸¡à¹€à¸•à¸µà¹‰à¸¢ à¸­à¸³à¹€à¸ à¸­à¹€à¸¡à¸·à¸­à¸‡ à¸ˆà¸±à¸‡à¸«à¸§à¸±à¸”à¸ªà¸¸à¸£à¸²à¸©à¸Žà¸£à¹Œà¸˜à¸²à¸™à¸µ 84000', '0936970259', 'admin', NULL, 'default.png', '2018-06-01 19:51:21'),
(2, 'suthathip suksawat', '12 à¸•à¸³à¸šà¸¥à¸¡à¸°à¸‚à¸²à¸¡à¹€à¸•à¸µà¹‰à¸¢ à¸­à¸³à¹€à¸ à¸­à¹€à¸¡à¸·à¸­à¸‡ à¸ˆà¸±à¸‡à¸«à¸§à¸±à¸”à¸ªà¸¸à¸£à¸²à¸©à¸Žà¸£à¹Œà¸˜à¸²à¸™à¸µ 84000', '0936970259', 'ann', '1102', 'default.png', '2018-06-01 19:51:21');

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
-- Indexes for table `log`
--
ALTER TABLE `log`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `material`
--
ALTER TABLE `material`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `barcode` (`barcode`),
  ADD KEY `barcode_2` (`barcode`);

--
-- Indexes for table `material_history`
--
ALTER TABLE `material_history`
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
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `equipment_history`
--
ALTER TABLE `equipment_history`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;
--
-- AUTO_INCREMENT for table `log`
--
ALTER TABLE `log`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `material`
--
ALTER TABLE `material`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `material_history`
--
ALTER TABLE `material_history`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `material_type`
--
ALTER TABLE `material_type`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `report_no`
--
ALTER TABLE `report_no`
  MODIFY `id` int(5) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=425;
--
-- AUTO_INCREMENT for table `unit`
--
ALTER TABLE `unit`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
