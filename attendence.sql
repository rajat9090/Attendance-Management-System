-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jan 31, 2023 at 05:10 AM
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
  `username` char(9) NOT NULL,
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
) ENGINE=InnoDB AUTO_INCREMENT=115 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `attend`
--

INSERT INTO `attend` (`id`, `username`, `emp_id`, `brn_id`, `shift_id`, `loc_id`, `in_time`, `in_status`, `out_time`, `out_status`, `breakin`, `breakout`) VALUES
(8, 'PWD4848', 009, 'TBR', 1, 1, 1675248658, 'Late', 0, '', 0, 0),
(85, 'PWD4848', 009, 'TBR', 1, 1, 1674048506, 'Late 08:58:032', 1674048576, 'Early 00:0:0', 0, 0),
(97, 'PWD4848', 009, 'TBR', 1, 1, 1674120842, 'Late 05:4:018', 0, '', 0, 0),
(101, 'PWD4848', 009, 'TBR', 1, 1, 1674189000, 'On Time', 1674221400, 'On Time', 0, 0),
(102, 'PWD4848', 009, 'TBR', 1, 1, 1674452576, 'Late 01:12:12', 1674472589, 'Early 02:13:13', 1674467114, 1674470124),
(103, 'PWD7906', 012, 'DBR', 5, 3, 1674623656, 'Late 01:14:14', 0, '', 0, 0),
(104, 'PWD4848', 009, 'TBR', 1, 1, 1674623712, 'Late 00:45:45', 0, '', 1674645274, 1674649258),
(106, 'PWD8648', 011, 'TBR', 1, 1, 1674643238, 'Late 06:10:10', 0, '', 0, 0),
(112, 'PWD4848', 009, 'TBR', 1, 1, 1674650512, 'Late 08:11:11', 1674653113, 'Early 00:4:4', 1674652942, 1674653111),
(113, 'PWD1718', 014, 'BBR', 1, 3, 1674826581, 'Late 09:6:6', 1674826778, 'Over Time 00:9:', 1674826733, 1674826765),
(114, 'PWD4848', 009, 'TBR', 1, 1, 1674826841, 'Late 09:10:10', 1674826844, 'Over Time 00:10', 0, 0);

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
(009, 'Madhur', 9416329906, 'M', '2002-01-01', '#1024-B Milap Nagar', 'ocrajat@gmail.com', 0, '', '', '', 'TBR', 1, 1, '', 20000, '2023-01-10', 'default.png'),
(011, 'Rajat', 7404650301, 'M', '1998-12-13', '#1024-B Milap Nagar', 'turpo010@gmail.com', 0, '', '', '', 'TBR', 1, 1, '', 21000, '2022-12-29', 'default.png'),
(012, 'Bella', 9121412211, 'F', '2001-07-01', '#999-A', 'bella@co.com', 0, '', '', '', 'DBR', 3, 5, '', 19000, '2023-01-02', 'default.png'),
(013, 'Rohan', 171245982, 'F', '1999-11-01', 'ABC floor 4', 'abc@gmail.com', 0, '', '', '', 'BBR', 2, 1, '', 17000, '2023-01-09', 'default.png'),
(014, 'Mohit', 8950899587, 'M', '2002-01-01', 'Jacob road mumbai', 'mohit@uk.co', 0, '', '', '', 'BBR', 3, 1, '', 41000, '2023-01-21', 'default.png');

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
  `username` varchar(11) NOT NULL,
  `username1` char(7) NOT NULL,
  `password` varchar(200) NOT NULL,
  `emp_id` int(3) UNSIGNED ZEROFILL NOT NULL,
  `role_id` int(11) NOT NULL,
  PRIMARY KEY (`username1`),
  KEY `role_id` (`role_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `register`
--

INSERT INTO `register` (`username`, `username1`, `password`, `emp_id`, `role_id`) VALUES
('admin', 'admin', '$2y$10$x4pGdV9Hom69h2RXdjxam.C8oIv4ZptwF4aFRcRPcetJwan/.rYE6', 025, 1),
('8950899587', 'PWD1718', '$2y$10$8usMNNCJJZB3wd6pMSMa1eHHRbVQNVhm4ar/nUpcrBQFVdLn6yEw.', 014, 2),
('9416329907', 'PWD4848', '$2y$10$BNNHxWihs8MGfyT4Df099uFCHo7z82cXYxUHZrd7zoXER3eU4yFp6', 009, 2),
('9121412211', 'PWD7906', '$2y$10$dCxupqeH2ltX6RQDmPDsZ.3IJWakNlXF6FaymcwNcXIru4uQ1rZr2', 012, 2),
('171245982', 'PWD8087', '$2y$10$VF4Q1JLpGmxIbBs1B6G9bu.DTj9FczdBAdmEq5eHzjXXX/0OlqL5G', 013, 2),
('7404650301', 'PWD8648', '$2y$10$v5SbojYR0ZPY9jsxounRRej8tvQ3nDOpegKmOorB8gUD/3noEI1la', 011, 2);

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
) ENGINE=InnoDB AUTO_INCREMENT=44 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `salary`
--

INSERT INTO `salary` (`id`, `emp_id`, `username`, `salary`, `time`) VALUES
(35, 009, 'PWD4848', 16000, 1674818334),
(36, 009, 'PWD4848', 20000, 1674818369),
(37, 011, 'PWD8648', 20000, 1674818396),
(38, 011, 'PWD8648', 21000, 1674818418),
(39, 012, 'PWD7906', 18000, 1674818432),
(40, 012, 'PWD7906', 19000, 1674818450),
(41, 014, 'PWD1718', 41000, 1674818469),
(42, 013, 'PWD8087', 10000, 1674818512),
(43, 013, 'PWD8087', 17000, 1674818533);

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
