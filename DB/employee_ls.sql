-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Sep 22, 2021 at 07:14 AM
-- Server version: 5.7.31
-- PHP Version: 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `employee_ls`
--

-- --------------------------------------------------------

--
-- Table structure for table `leave_details`
--

DROP TABLE IF EXISTS `leave_details`;
CREATE TABLE IF NOT EXISTS `leave_details` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `employee_id` varchar(10) NOT NULL,
  `startdate` varchar(250) NOT NULL,
  `enddate` varchar(250) NOT NULL,
  `type` varchar(50) NOT NULL,
  `reasons` varchar(500) NOT NULL,
  `remaining_days` int(30) NOT NULL,
  `status` int(1) NOT NULL DEFAULT '0',
  `isread` int(1) NOT NULL DEFAULT '0',
  `posting_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `deleted` int(10) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `fk` (`employee_id`)
) ENGINE=MyISAM AUTO_INCREMENT=39 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `leave_details`
--

INSERT INTO `leave_details` (`id`, `employee_id`, `startdate`, `enddate`, `type`, `reasons`, `remaining_days`, `status`, `isread`, `posting_date`, `deleted`) VALUES
(37, '78', '21-09-2021', '24-09-2021', 'Absence', 'car break down', 3, 1, 1, '2021-09-20 09:51:16', 0),
(36, '78', '20-09-2021', '24-09-2021', 'Sick', 'just got vaccinated.', 4, 2, 1, '2021-09-19 21:09:45', 0),
(35, '439', '14-09-2021', '18-09-2021', 'Absence', 'not able to come, car breakdown.', 4, 1, 1, '2021-09-13 10:29:58', 0),
(31, '78', '07-09-2021', '13-09-2021', 'Study', 'Strathmore exams can be hard.', 6, 1, 1, '2021-09-08 10:21:26', 0),
(33, '78', '10-09-2021', '16-09-2021', 'Sick', 'covid-vaccine', 6, 1, 1, '2021-09-09 14:55:25', 0),
(38, '674', '22-09-2021', '25-09-2021', 'Sick', 'cold.', 3, 0, 0, '2021-09-21 18:38:58', 0);

-- --------------------------------------------------------

--
-- Table structure for table `leave_types`
--

DROP TABLE IF EXISTS `leave_types`;
CREATE TABLE IF NOT EXISTS `leave_types` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `total_days` varchar(250) NOT NULL,
  `policy` varchar(255) NOT NULL,
  `date_created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `leave_types`
--

INSERT INTO `leave_types` (`id`, `name`, `total_days`, `policy`, `date_created`) VALUES
(1, 'Maternity/Paternity leave', '90', 'Congratulations, this policy is created to cater for the maternity, paternity for employees. the maximum days-period is 90 days. After exceeding this amount of days you have to use up your other leave types.', '2021-08-19 17:43:37'),
(2, 'Sick Leave', '30', 'May you Get well Soon, this policy is created to provide recovery time, hopefully you get back soon. the maximum days-period is 30 days. After exceeding this amount of days you have to use up your other leave types.', '2021-08-19 17:47:04'),
(3, 'Study Leave', '1440', 'This policy is created to cater for the a study leave period of 4 years. Unfortunately the organization does not allow this leave at the moment. After exceeding this amount of days you have to report back to the organization.', '2021-08-19 17:53:34'),
(4, 'Absence Leave', '14', 'This policy is created to help employees, have a short break from the. The maximum days-period is 2 weeks. After exceeding this amount of days you have to use up your other leave types.', '2021-08-19 17:56:40');

-- --------------------------------------------------------

--
-- Table structure for table `register`
--

DROP TABLE IF EXISTS `register`;
CREATE TABLE IF NOT EXISTS `register` (
  `employee_id` varchar(10) NOT NULL,
  `department` text NOT NULL,
  `firstname` text NOT NULL,
  `lastname` text NOT NULL,
  `email` varchar(50) NOT NULL,
  `date_hired` date NOT NULL,
  `password` varchar(70) NOT NULL,
  `user_type` varchar(10) NOT NULL DEFAULT 'employee',
  `available_days` int(10) NOT NULL DEFAULT '30',
  `deleted` int(10) NOT NULL DEFAULT '0',
  PRIMARY KEY (`employee_id`),
  UNIQUE KEY `password_2` (`password`),
  KEY `password_3` (`password`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `register`
--

INSERT INTO `register` (`employee_id`, `department`, `firstname`, `lastname`, `email`, `date_hired`, `password`, `user_type`, `available_days`, `deleted`) VALUES
('123', 'Human Resource', 'Bennet', 'Kambona', 'bennetotieno@gmail.com', '2021-08-04', '202cb962ac59075b964b07152d234b70', 'admin', 30, 0),
('78', 'Finance', 'James', 'Ouko', 'jamesouko@gmail.com', '2021-08-12', '35f4a8d465e6e1edc05f3d8ab658c551', 'employee', 15, 0),
('674', 'Finance', 'new', 'employee', 'newemployee@gmail.com', '2021-09-01', '598b3e71ec378bd83e0a727608b5db01', 'employee', 30, 0),
('990', 'Production', 'manushi', 'patel', 'manushi@gmail.com', '2021-08-01', '8638096e4ddb49a0dd6592c57d9f50ab', 'employee', 30, 0),
('439', 'Production', 'jemini', 'moon', 'jemini@gmail.com', '2021-09-01', '4daa3db355ef2b0e64b472968cb70f0d', 'employee', 26, 0);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
