-- phpMyAdmin SQL Dump
-- version 4.0.10.10
-- http://www.phpmyadmin.net
--
-- Host: 213.171.200.97
-- Generation Time: Nov 10, 2017 at 01:06 PM
-- Server version: 5.6.36-log
-- PHP Version: 5.3.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `rajajbqa_onlinequran`
--

-- --------------------------------------------------------

--
-- Table structure for table `teacherrecord`
--

CREATE TABLE IF NOT EXISTS `teacherrecord` (
  `SerialNo` int(11) NOT NULL AUTO_INCREMENT,
  `TeacherName` varchar(255) NOT NULL,
  `Gender` varchar(10) NOT NULL,
  `ContactNo` varchar(30) NOT NULL,
  `SkypeID` varchar(255) NOT NULL,
  PRIMARY KEY (`SerialNo`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Dumping data for table `teacherrecord`
--

INSERT INTO `teacherrecord` (`SerialNo`, `TeacherName`, `Gender`, `ContactNo`, `SkypeID`) VALUES
(10, 'Muhammad Suleman', 'Male', '03331231231', 'Muhammad.Suleman'),
(11, 'Azam', 'Male', '03451234567', 'Azam123');

-- --------------------------------------------------------

--
-- Table structure for table `userlogin`
--

CREATE TABLE IF NOT EXISTS `userlogin` (
  `uniqueId` varchar(23) NOT NULL,
  `name` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  `phoneno` varchar(30) NOT NULL,
  `country` varchar(30) NOT NULL,
  `Sno` int(255) NOT NULL AUTO_INCREMENT,
  `Age` int(11) NOT NULL,
  `Gender` varchar(10) NOT NULL,
  `token` varchar(255) NOT NULL,
  `encrypted_password` varchar(255) NOT NULL,
  `salt` varchar(10) NOT NULL,
  `status` enum('Y','N') NOT NULL DEFAULT 'N',
  `created_at` datetime DEFAULT NULL,
  PRIMARY KEY (`Sno`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `userlogin`
--

INSERT INTO `userlogin` (`uniqueId`, `name`, `email`, `phoneno`, `country`, `Sno`, `Age`, `Gender`, `token`, `encrypted_password`, `salt`, `status`, `created_at`) VALUES
('59e93202f28c65.96357972', 'Chin', 'Chin@live.com', '123', 'China', 8, 33, 'Female', '51e95c56872845ad25dd84564f9c6572', '$2y$10$8b8HXAII2twvlDtI.F5.7uNCWjZfN.0p8OR63joQ31VntbCf4UUs2', '1adf3ff6e7', 'N', '2017-10-19 16:15:15'),
('59ec747f982fb8.04581046', 'hyder', 'hyder99@hotmail.com', '294294', 'Pakistan', 9, 20, 'Male', '1fb24711ca1bace1840bf3899e21c656', '$2y$10$FQ5CpEknDndfInBb1QAlt.4fKkqOSZFjcwtER1eZHLiCVZoD2IxRa', 'ccf89dd778', 'Y', '2017-10-22 06:35:43');

-- --------------------------------------------------------

--
-- Table structure for table `userrecord`
--

CREATE TABLE IF NOT EXISTS `userrecord` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `UserSno` int(255) NOT NULL,
  `logintime` datetime NOT NULL,
  `logouttime` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `UserSno` (`UserSno`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=19 ;

--
-- Dumping data for table `userrecord`
--

INSERT INTO `userrecord` (`id`, `UserSno`, `logintime`, `logouttime`) VALUES
(10, 8, '2017-10-19 16:18:39', '2017-10-19 16:41:04'),
(11, 8, '2017-10-20 13:03:15', '2017-10-20 13:03:35'),
(12, 8, '2017-10-20 15:20:58', '2017-10-20 15:21:16'),
(13, 9, '2017-10-22 03:36:48', '2017-10-22 03:38:23'),
(14, 9, '2017-10-22 04:54:25', '2017-10-22 05:15:07'),
(15, 8, '2017-10-22 04:54:42', '2017-10-22 05:02:04'),
(16, 8, '2017-10-22 05:04:51', '2017-10-22 05:06:09'),
(17, 8, '2017-10-22 05:06:49', '2017-10-22 05:11:41'),
(18, 8, '2017-10-23 04:23:48', '2017-10-23 04:24:02');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `userrecord`
--
ALTER TABLE `userrecord`
  ADD CONSTRAINT `UserLogIO` FOREIGN KEY (`UserSno`) REFERENCES `userlogin` (`Sno`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
