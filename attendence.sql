-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jan 23, 2023 at 12:54 PM
-- Server version: 5.7.36
-- PHP Version: 7.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `attendence`
--

-- --------------------------------------------------------

--
-- Table structure for table `attend`
--

DROP TABLE IF EXISTS `attend`;
CREATE TABLE IF NOT EXISTS `attend` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` char(6) NOT NULL,
  `emp_id` int(3) UNSIGNED ZEROFILL NOT NULL,
  `brn_id` char(3) NOT NULL,
  `shift_id` int(11) NOT NULL,
  `loc_id` int(11) NOT NULL,
  `in_time` int(11) NOT NULL,
  `in_status` varchar(50) NOT NULL,
  `out_time` int(11) NOT NULL,
  `out_status` varchar(15) NOT NULL,
  `breakin` int(11) NOT NULL,
  `breakout` int(11) NOT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  KEY `username` (`username`) USING BTREE,
  KEY `emp_id` (`emp_id`) USING BTREE,
  KEY `brn_id` (`brn_id`) USING BTREE,
  KEY `loc_id` (`loc_id`) USING BTREE,
  KEY `shift_id` (`shift_id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=103 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `attend`
--

INSERT INTO `attend` (`id`, `username`, `emp_id`, `brn_id`, `shift_id`, `loc_id`, `in_time`, `in_status`, `out_time`, `out_status`, `breakin`, `breakout`) VALUES
(8, 'TBR009', 009, 'TBR', 1, 1, 1673964436, 'Late', 0, '', 0, 0),
(85, 'TBR009', 009, 'TBR', 1, 1, 1674048506, 'Late 08:58:032', 1674048576, 'Early 00:0:0', 0, 0),
(97, 'TBR009', 009, 'TBR', 1, 1, 1674120842, 'Late 05:4:018', 0, '', 0, 0),
(101, 'TBR009', 009, 'TBR', 1, 1, 1674189000, 'On Time', 1674221400, 'On Time', 0, 0),
(102, 'TBR009', 009, 'TBR', 1, 1, 1674452576, 'Late 01:12:12', 1674472589, 'Early 02:13:13', 1674467114, 1674470124);

-- --------------------------------------------------------

--
-- Table structure for table `branch`
--

DROP TABLE IF EXISTS `branch`;
CREATE TABLE IF NOT EXISTS `branch` (
  `id` char(4) NOT NULL,
  `name` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `branch`
--

INSERT INTO `branch` (`id`, `name`) VALUES
('ABR', 'Accounting Branch'),
('BBR', 'Business Branch'),
('DBR', 'Development Branch'),
('MBR', 'Main Branch'),
('SBR', 'Sales Branch'),
('TBR', 'Tester Branch');

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

DROP TABLE IF EXISTS `employee`;
CREATE TABLE IF NOT EXISTS `employee` (
  `id` int(3) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT,
  `name` varchar(150) NOT NULL,
  `number` bigint(11) NOT NULL,
  `gender` char(1) NOT NULL,
  `birth_date` date NOT NULL,
  `address` varchar(200) NOT NULL,
  `email` varchar(150) NOT NULL,
  `aadh` int(12) NOT NULL,
  `pan` char(10) NOT NULL,
  `pf` varchar(20) NOT NULL,
  `esi` varchar(20) NOT NULL,
  `branch` varchar(50) NOT NULL,
  `location` int(11) NOT NULL,
  `shift` int(11) NOT NULL,
  `title` varchar(50) NOT NULL,
  `salary` float NOT NULL,
  `date_joining` date NOT NULL,
  `image` varchar(100) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `branch` (`branch`),
  KEY `employee_ibfk_2` (`location`),
  KEY `shift` (`shift`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`id`, `name`, `number`, `gender`, `birth_date`, `address`, `email`, `aadh`, `pan`, `pf`, `esi`, `branch`, `location`, `shift`, `title`, `salary`, `date_joining`, `image`) VALUES
(009, 'Madhur', 9416329907, 'M', '2002-01-01', '#1024-B Milap Nagar', 'ocrajat@gmail.com', 0, '', '', '', 'TBR', 1, 1, '', 4000, '2023-01-10', 'default.png'),
(011, 'Rajat', 7404650301, 'M', '1998-12-13', '#1024-B Milap Nagar', 'turpo010@gmail.com', 0, '', '', '', 'TBR', 1, 1, '', 0, '2022-12-29', 'default.png'),
(012, 'Bella', 9121412211, 'F', '2001-07-01', '#999-A', 'bella@co.com', 0, '', '', '', 'DBR', 3, 5, '', 0, '2023-01-02', 'default.png'),
(013, 'Rohan', 171245982, 'F', '1999-11-01', 'ABC floor 4', 'abc@gmail.com', 0, '', '', '', 'BBR', 2, 1, '', 50000, '2023-01-09', 'default.png'),
(014, 'Mohit', 8950899587, 'M', '2002-01-01', 'Jacob road mumbai', 'mohit@uk.co', 0, '', '', '', 'BBR', 3, 1, '', 2500, '2023-01-21', 'default.png');

-- --------------------------------------------------------

--
-- Table structure for table `employee_branch`
--

DROP TABLE IF EXISTS `employee_branch`;
CREATE TABLE IF NOT EXISTS `employee_branch` (
  `id` int(4) NOT NULL AUTO_INCREMENT,
  `emp_id` int(3) UNSIGNED ZEROFILL NOT NULL,
  `brn_id` char(4) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `emp_id` (`emp_id`),
  KEY `brn_id` (`brn_id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `employee_branch`
--

INSERT INTO `employee_branch` (`id`, `emp_id`, `brn_id`) VALUES
(8, 011, 'TBR'),
(11, 009, 'TBR'),
(12, 012, 'DBR'),
(13, 013, 'BBR'),
(14, 014, 'BBR');

-- --------------------------------------------------------

--
-- Table structure for table `location`
--

DROP TABLE IF EXISTS `location`;
CREATE TABLE IF NOT EXISTS `location` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `location`
--

INSERT INTO `location` (`id`, `name`) VALUES
(1, 'Work From Home'),
(2, 'Kolkata'),
(3, 'Mumbai'),
(4, 'Agra');

-- --------------------------------------------------------

--
-- Table structure for table `register`
--

DROP TABLE IF EXISTS `register`;
CREATE TABLE IF NOT EXISTS `register` (
  `username` char(7) NOT NULL,
  `password` varchar(200) NOT NULL,
  `emp_id` int(3) UNSIGNED ZEROFILL NOT NULL,
  `role_id` int(11) NOT NULL,
  PRIMARY KEY (`username`),
  KEY `role_id` (`role_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `register`
--

INSERT INTO `register` (`username`, `password`, `emp_id`, `role_id`) VALUES
('admin', '$2y$10$x4pGdV9Hom69h2RXdjxam.C8oIv4ZptwF4aFRcRPcetJwan/.rYE6', 025, 1),
('BBR013', '$2y$10$tTd98HZr3HacHc5LGc9mLO1kdjnaSXZI9VLwD103u/RFpmr379WYO', 013, 2),
('BBR014', '$2y$10$63uMpua0bY2CpeNaTEKbFOppJjFx4mjr1ekJM7HXwpHET.6BOOT6e', 014, 2),
('DBR012', '$2y$10$66mrBKKllugnBF7DPshigOu0h0jmt6ZW54VGeIrAICxqYnsVvgHkO', 012, 2),
('TBR009', '$2y$10$hBz2vqPrQyWlB6DCRq7Wyu.cBnthdoo/VfV64QPZhRzZxFn8sfU8O', 009, 2);

-- --------------------------------------------------------

--
-- Table structure for table `salary`
--

DROP TABLE IF EXISTS `salary`;
CREATE TABLE IF NOT EXISTS `salary` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `emp_id` int(3) UNSIGNED ZEROFILL NOT NULL,
  `username` varchar(50) NOT NULL,
  `salary` int(11) NOT NULL,
  `time` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `salary`
--

INSERT INTO `salary` (`id`, `emp_id`, `username`, `salary`, `time`) VALUES
(1, 013, '', 40000, 1674279564),
(2, 009, '', 4000, 1674280606),
(3, 013, '', 10000, 1674280645),
(4, 013, 'BBR013', 50000, 1674284157),
(5, 014, 'BBR014', 25000, 1674284606),
(6, 014, 'BBR014', 20000, 1674284681),
(9, 014, 'BBR014', 2500, 1674287233);

-- --------------------------------------------------------

--
-- Table structure for table `shift`
--

DROP TABLE IF EXISTS `shift`;
CREATE TABLE IF NOT EXISTS `shift` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `start` time NOT NULL,
  `end` time NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `shift`
--

INSERT INTO `shift` (`id`, `start`, `end`) VALUES
(1, '10:00:00', '19:00:00'),
(5, '09:30:00', '18:30:00');

-- --------------------------------------------------------

--
-- Table structure for table `user_role`
--

DROP TABLE IF EXISTS `user_role`;
CREATE TABLE IF NOT EXISTS `user_role` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_role`
--

INSERT INTO `user_role` (`id`, `name`) VALUES
(1, 'admin'),
(2, 'employee');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `employee`
--
ALTER TABLE `employee`
  ADD CONSTRAINT `employee_ibfk_1` FOREIGN KEY (`branch`) REFERENCES `branch` (`id`),
  ADD CONSTRAINT `employee_ibfk_2` FOREIGN KEY (`location`) REFERENCES `location` (`id`),
  ADD CONSTRAINT `employee_ibfk_3` FOREIGN KEY (`shift`) REFERENCES `shift` (`id`);

--
-- Constraints for table `employee_branch`
--
ALTER TABLE `employee_branch`
  ADD CONSTRAINT `employee_branch_ibfk_1` FOREIGN KEY (`emp_id`) REFERENCES `employee` (`id`),
  ADD CONSTRAINT `employee_branch_ibfk_2` FOREIGN KEY (`brn_id`) REFERENCES `branch` (`id`);

--
-- Constraints for table `register`
--
ALTER TABLE `register`
  ADD CONSTRAINT `register_ibfk_1` FOREIGN KEY (`role_id`) REFERENCES `user_role` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
