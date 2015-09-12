-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Sep 12, 2015 at 10:42 AM
-- Server version: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `monish_cake_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `emergencies`
--

CREATE TABLE IF NOT EXISTS `emergencies` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `person_id` int(11) DEFAULT NULL,
  `first_name` varchar(25) NOT NULL,
  `last_name` varchar(25) NOT NULL,
  `phone` varchar(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `person_id` (`person_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `emergencies`
--

INSERT INTO `emergencies` (`id`, `person_id`, `first_name`, `last_name`, `phone`, `email`) VALUES
(4, 9, 'Ethan', 'Chen', '2147483647', 'ethan@ethan.com'),
(5, 9, 'mike', 'lai', '123', '12313@123.com'),
(7, 9, 'tristan', 'marsh', '043131', '421@123.com'),
(8, 9, 'Hi', 'Hey', '123558525', 'this@this.com'),
(9, 9, 'Water', 'Melon', '04123456', 'this@this123.com'),
(10, 9, 'jgh', 'hjg', '234789', 'jkasdh@asd.com');

-- --------------------------------------------------------

--
-- Table structure for table `lastroomupdate`
--

CREATE TABLE IF NOT EXISTS `lastroomupdate` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `date` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `lastroomupdate`
--

INSERT INTO `lastroomupdate` (`id`, `date`) VALUES
(1, '2015-09-12');

-- --------------------------------------------------------

--
-- Table structure for table `leases`
--

CREATE TABLE IF NOT EXISTS `leases` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `room_id` int(11) NOT NULL,
  `property_id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `date_start` date NOT NULL,
  `date_end` date NOT NULL,
  `weekly_price` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `room_id` (`room_id`),
  KEY `student_id` (`student_id`),
  KEY `property_id` (`property_id`),
  KEY `property_id_2` (`property_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=18 ;

--
-- Dumping data for table `leases`
--

INSERT INTO `leases` (`id`, `room_id`, `property_id`, `student_id`, `date_start`, `date_end`, `weekly_price`) VALUES
(7, 1, 1, 10, '2015-07-15', '2016-05-13', 200),
(8, 2, 1, 11, '2015-07-01', '2015-11-20', 250),
(9, 11, 3, 12, '2015-07-15', '2016-05-13', 260),
(10, 24, 5, 10, '2015-07-04', '2016-07-04', 300),
(11, 1, 1, 12, '2015-07-16', '2015-12-11', 300),
(12, 13, 3, 11, '2015-07-15', '2016-11-23', 230),
(13, 1, 1, 13, '2015-07-15', '2016-01-21', 500),
(14, 17, 4, 14, '0000-00-00', '2015-07-09', 450),
(15, 15, 4, 15, '2015-08-20', '2015-08-21', 200),
(16, 26, 6, 16, '2015-09-09', '2016-03-17', 500),
(17, 25, 6, 17, '2015-09-10', '2015-09-30', 123123);

-- --------------------------------------------------------

--
-- Table structure for table `macaddresses`
--

CREATE TABLE IF NOT EXISTS `macaddresses` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `person_id` int(11) NOT NULL,
  `device_name_one` varchar(25) DEFAULT NULL,
  `device_name_two` varchar(25) DEFAULT NULL,
  `device_name_three` varchar(25) DEFAULT NULL,
  `device_name_four` varchar(25) DEFAULT NULL,
  `device_name_five` varchar(25) DEFAULT NULL,
  `device_name_six` varchar(25) DEFAULT NULL,
  `device_name_seven` varchar(25) DEFAULT NULL,
  `device_name_eight` varchar(25) DEFAULT NULL,
  `device_name_nine` varchar(25) DEFAULT NULL,
  `device_name_ten` varchar(25) DEFAULT NULL,
  `mac_address_one` varchar(25) DEFAULT NULL,
  `mac_address_two` varchar(25) DEFAULT NULL,
  `mac_address_three` varchar(25) DEFAULT NULL,
  `mac_address_four` varchar(25) DEFAULT NULL,
  `mac_address_five` varchar(25) DEFAULT NULL,
  `mac_address_six` varchar(25) DEFAULT NULL,
  `mac_address_seven` varchar(25) DEFAULT NULL,
  `mac_address_eight` varchar(25) DEFAULT NULL,
  `mac_address_nine` varchar(25) DEFAULT NULL,
  `mac_address_ten` varchar(25) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `person_id` (`person_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `macaddresses`
--

INSERT INTO `macaddresses` (`id`, `person_id`, `device_name_one`, `device_name_two`, `device_name_three`, `device_name_four`, `device_name_five`, `device_name_six`, `device_name_seven`, `device_name_eight`, `device_name_nine`, `device_name_ten`, `mac_address_one`, `mac_address_two`, `mac_address_three`, `mac_address_four`, `mac_address_five`, `mac_address_six`, `mac_address_seven`, `mac_address_eight`, `mac_address_nine`, `mac_address_ten`) VALUES
(1, 13, 'iPhone', '', '', '', '', '', '', '', '', '', '02-01-30-21', '', '', '', '', '', '', '', '', ''),
(2, 9, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(3, 10, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(4, 12, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(5, 14, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(6, 15, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(7, 16, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(8, 17, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `people`
--

CREATE TABLE IF NOT EXISTS `people` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `first_name` varchar(25) NOT NULL,
  `last_name` varchar(25) NOT NULL,
  `common_name` varchar(25) NOT NULL,
  `gender` enum('M','F') NOT NULL,
  `phone` varchar(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `visa` varchar(20) DEFAULT NULL,
  `parent_address` varchar(50) DEFAULT NULL,
  `account_name` varchar(255) DEFAULT NULL,
  `bsb_number` varchar(255) DEFAULT NULL,
  `account_number` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=18 ;

--
-- Dumping data for table `people`
--

INSERT INTO `people` (`id`, `first_name`, `last_name`, `common_name`, `gender`, `phone`, `email`, `visa`, `parent_address`, `account_name`, `bsb_number`, `account_number`) VALUES
(1, 'Tony', 'Wise', '', 'M', '404040404', 'tonywise@monish.com', '123', 'China', 'Mr Mang', '123', '123'),
(9, 'Amy', 'Insurance', 'Amy', 'F', '0404000404', 'tmar41@student.monash.edu', '123', 'China', 'Mr Mang', '123', '123'),
(10, 'Ben', 'Hudson', 'Benny', 'M', '0404040404', 'ben@ben.com', '123', 'China', 'Mr Mang', '123', '123'),
(12, 'Constance', 'Petrovski', 'Con', 'F', '0404040404', 'constance@constance.com', '123', 'China', 'Mr Mang', '123', '123'),
(13, 'Darren', 'Man', 'Darraman', 'M', '0404040404', 'darren@darren.com', '123', 'China', 'Mr Mang', '123', '123'),
(14, 'Esther', 'Dear', 'Esther', 'F', '0404040404', 'esther@esther.com', '123', 'China', 'Mr Mang', '123', '123'),
(15, 'Fiona', 'Lee', 'Feefee', 'F', '04940303030', 'fiona@fiona.com', '123', 'China', 'Mr Mang', '123', '123'),
(16, 'Emma', 'Emma', 'Emma', 'M', '05146464146', 'ethanchen01@163.com', 'G12421615', '254 something street 21552', 'Mr Mang', '123', '123'),
(17, 'zoe', 'zoe', 'zoe', 'M', '1231512341', 'zoe@zoe.com', '798123', 'asd', 'Mr Mang', '123897', '123879');

-- --------------------------------------------------------

--
-- Table structure for table `properties`
--

CREATE TABLE IF NOT EXISTS `properties` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `address` varchar(50) NOT NULL,
  `avatar` varchar(255) DEFAULT NULL,
  `avatar_directory` varchar(255) DEFAULT NULL,
  `avatar_url` varchar(255) DEFAULT NULL,
  `avatar_type` varchar(255) DEFAULT NULL,
  `avatar_size` varchar(255) DEFAULT NULL,
  `avatar_name` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=15 ;

--
-- Dumping data for table `properties`
--

INSERT INTO `properties` (`id`, `address`, `avatar`, `avatar_directory`, `avatar_url`, `avatar_type`, `avatar_size`, `avatar_name`) VALUES
(1, '100 one street', 'img/properties/1/eiffel-tower.jpg', 'img/properties/1/', '/img/properties/1/eiffel-tower.jpg', 'image/jpeg', '299947', 'eiffel-tower.jpg'),
(2, '200 two street', 'img/properties/2/home_temp1__medium.jpg', 'img/properties/2/', '/img/properties/2/home_temp1__medium.jpg', 'image/jpeg', '321651', 'home_temp1__medium.jpg'),
(3, '300 three street', 'img/properties/3/macalister-mansion-3.jpg', 'img/properties/3/', '/img/properties/3/macalister-mansion-3.jpg', 'image/jpeg', '124712', 'macalister-mansion-3.jpg'),
(4, '400 four street', 'img/properties/4/Gelbensande3.jpg', 'img/properties/4/', '/img/properties/4/Gelbensande3.jpg', 'image/jpeg', '1294712', 'Gelbensande3.jpg'),
(5, '500 five street', 'img/properties/5/Morey_Mansion_in_Winter.jpg', 'img/properties/5/', '/img/properties/5/Morey_Mansion_in_Winter.jpg', 'image/jpeg', '3469696', 'Morey_Mansion_in_Winter.jpg'),
(6, '600 six street', 'img/properties/6/100987825-121017_EJ_stone_mansion_0014r.1910x1000.jpg', 'img/properties/6/', '/img/properties/6/100987825-121017_EJ_stone_mansion_0014r.1910x1000.jpg', 'image/jpeg', '364184', '100987825-121017_EJ_stone_mansion_0014r.1910x1000.jpg'),
(7, '700 test avenue', 'img/properties/7/21mgqjl.jpg', 'img/properties/7/', '/img/properties/7/21mgqjl.jpg', 'image/jpeg', '86227', '21mgqjl.jpg'),
(10, '800 Rad Drive', 'img/properties/10/Great_Gatsby-TP-0000.jpg', 'img/properties/10/', '/img/properties/10/Great_Gatsby-TP-0000.jpg', 'image/jpeg', '1221441', 'Great_Gatsby-TP-0000.jpg'),
(11, '900 Frat House', 'img/properties/11/product899-001.jpg', 'img/properties/11/', '/img/properties/11/product899-001.jpg', 'image/jpeg', '78240', 'product899-001.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `recoveries`
--

CREATE TABLE IF NOT EXISTS `recoveries` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `requests`
--

CREATE TABLE IF NOT EXISTS `requests` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(50) DEFAULT NULL,
  `description` text,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `person_id` int(11) DEFAULT NULL,
  `category` varchar(255) NOT NULL,
  `property_address` varchar(100) NOT NULL,
  `status` enum('Unread','Viewed') NOT NULL,
  `entry_time` enum('Anytime','10am to 5pm','Arrange a time','N/A') NOT NULL,
  `avatar` varchar(255) DEFAULT NULL,
  `avatar_directory` varchar(255) DEFAULT NULL,
  `avatar_url` varchar(255) DEFAULT NULL,
  `avatar_type` varchar(255) DEFAULT NULL,
  `avatar_size` varchar(255) DEFAULT NULL,
  `avatar_name` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `user_id` (`person_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=39 ;

--
-- Dumping data for table `requests`
--

INSERT INTO `requests` (`id`, `title`, `description`, `created`, `modified`, `person_id`, `category`, `property_address`, `status`, `entry_time`, `avatar`, `avatar_directory`, `avatar_url`, `avatar_type`, `avatar_size`, `avatar_name`) VALUES
(9, 'Broken Tap', 'Please fix my broken tap I can''t get water!', '2015-04-13 14:40:10', '2015-09-01 08:18:59', 10, 'Maintenance', '200 two street', 'Viewed', 'Anytime', '', NULL, NULL, NULL, NULL, NULL),
(10, 'Broken Fridge', 'My food is getting rotten', '2015-04-13 14:52:26', '2015-09-01 08:47:05', 10, 'Maintenance', '200 two street', 'Viewed', 'Anytime', '', NULL, NULL, NULL, NULL, NULL),
(11, 'Broken TV', 'I can''t watch me soap dramas', '2015-04-13 14:53:32', '2015-09-08 10:49:24', 9, 'Maintenance', '200 two street', 'Viewed', 'Arrange a time', 'img\\requests\\11\\GetAttachment.jpg', 'img\\requests\\11\\', '/img/requests/11/GetAttachment.jpg', 'image/jpeg', '51899', 'GetAttachment.jpg'),
(12, 'Broken Window', 'Got broken into and robbed ', '2015-04-13 15:18:31', '2015-09-02 14:06:30', 12, 'Maintenance', '100 one street', 'Viewed', '', '', NULL, NULL, NULL, NULL, NULL),
(13, 'Broken Airconditioner', 'Aircon does not turn on', '2015-04-14 03:50:50', '2015-04-14 03:50:50', 10, 'Maintenance', '100 one street', 'Unread', '', '', NULL, NULL, NULL, NULL, NULL),
(14, 'Broken Face', 'got bashed', '2015-04-16 05:25:43', '2015-09-01 08:28:34', 9, 'Maintenance', '100 one street', 'Unread', 'N/A', '', NULL, NULL, NULL, NULL, NULL),
(16, 'Broken Borken', 'Borken', '2015-04-25 09:33:29', '2015-09-01 08:28:44', 9, 'Maintenance', '300 three street', 'Unread', 'Anytime', '', NULL, NULL, NULL, NULL, NULL),
(17, 'Can I have a new TV', 'Please I want to watch the footy', '2015-05-14 04:37:55', '2015-09-01 08:28:57', 9, 'General', '300 three street', 'Unread', '10am to 5pm', '', NULL, NULL, NULL, NULL, NULL),
(18, 'I want better internet', 'pleeease', '2015-05-14 04:47:40', '2015-05-14 04:49:49', 9, 'Internet', '300 three street', 'Unread', '', '', NULL, NULL, NULL, NULL, NULL),
(19, 'I want to extend my lease', 'Can you make it cheaper', '2015-05-14 04:49:37', '2015-05-14 04:49:37', 9, 'Lease', '300 three street', 'Unread', '', '', NULL, NULL, NULL, NULL, NULL),
(20, 'Test001', 'this is the first test', '2015-09-01 07:52:29', '2015-09-01 07:52:29', 1, 'General', '100 one street', 'Unread', '', '', NULL, NULL, NULL, NULL, NULL),
(21, 'test', 'test1', '2015-09-02 13:56:52', '2015-09-02 13:56:52', 16, 'General', '', 'Unread', 'Anytime', '', NULL, NULL, NULL, NULL, NULL),
(37, 'image1', 'image1', '2015-09-07 13:02:31', '2015-09-08 09:40:02', 1, 'General', '100 one street', 'Viewed', 'Anytime', 'img\\requests\\37\\Off Into The Sunset.jpg', 'img\\requests\\37\\', '/img/requests/37/Off Into The Sunset.jpg', 'image/jpeg', '56956', 'Off Into The Sunset.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `rooms`
--

CREATE TABLE IF NOT EXISTS `rooms` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `property_id` int(11) NOT NULL,
  `room_name` varchar(50) NOT NULL,
  `vacant` enum('TRUE','FALSE') NOT NULL,
  PRIMARY KEY (`id`),
  KEY `property_id` (`property_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=29 ;

--
-- Dumping data for table `rooms`
--

INSERT INTO `rooms` (`id`, `property_id`, `room_name`, `vacant`) VALUES
(1, 1, 'room 1', 'FALSE'),
(2, 1, 'room 2', 'FALSE'),
(3, 1, 'room 3', 'TRUE'),
(4, 1, 'room 4', 'TRUE'),
(5, 1, 'room 5', 'TRUE'),
(6, 2, 'room 1', 'TRUE'),
(7, 2, 'room 2', 'TRUE'),
(8, 2, 'room 3', 'TRUE'),
(9, 2, 'room 4', 'TRUE'),
(10, 2, 'room 5', 'TRUE'),
(11, 3, 'room 1', 'FALSE'),
(12, 3, 'room 2', 'TRUE'),
(13, 3, 'room 3', 'FALSE'),
(14, 3, 'room 4', 'TRUE'),
(15, 4, 'room 1', 'TRUE'),
(16, 4, 'room 2', 'TRUE'),
(17, 4, 'room 3', 'TRUE'),
(18, 4, 'room 4', 'TRUE'),
(19, 4, 'room 5', 'TRUE'),
(20, 5, 'room 1', 'TRUE'),
(21, 5, 'room 2', 'TRUE'),
(22, 5, 'room 3', 'TRUE'),
(23, 5, 'room 4', 'TRUE'),
(24, 5, 'room 5', 'FALSE'),
(25, 6, 'room 1', 'FALSE'),
(26, 6, 'room 2', 'FALSE'),
(27, 6, 'room 3', 'TRUE'),
(28, 7, '1', 'TRUE');

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE IF NOT EXISTS `students` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `person_id` int(11) NOT NULL,
  `emergency_id` int(11) DEFAULT NULL,
  `internet_plan` enum('Free','Basic','Standard','Premium') DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `person_id` (`person_id`),
  KEY `emergency_id` (`emergency_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=18 ;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`id`, `person_id`, `emergency_id`, `internet_plan`) VALUES
(10, 9, NULL, 'Standard'),
(11, 10, NULL, 'Premium'),
(12, 12, NULL, 'Free'),
(13, 13, NULL, 'Free'),
(14, 14, NULL, 'Premium'),
(15, 15, NULL, 'Free'),
(16, 16, NULL, 'Free'),
(17, 17, NULL, 'Standard');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `person_id` int(11) NOT NULL,
  `username` varchar(50) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `role` varchar(20) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `tokenhash` varchar(512) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`),
  KEY `person_id` (`person_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=49 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `person_id`, `username`, `password`, `role`, `created`, `modified`, `tokenhash`) VALUES
(35, 1, 'admin', '$2y$10$W4EJplARM6UTAznYCvS50O37iSU.eyc1IUDFPuyxu0kju27md8G6e', 'admin', '2015-05-16 08:08:00', '2015-05-16 08:08:00', ''),
(41, 9, 'tmar41@student.monash.edu', '$2y$10$ZB0GwBpdl7QNcKJ8aIxoCuDIZ0lbQKzBAaMtzg7Rdq2/5FXp1Uf2O', 'tenant', '2015-07-03 05:24:37', '2015-08-20 08:36:31', '099c2f8f6ad3aff0b631acedb82e57c6f16d795c'),
(42, 10, 'ben@ben.com', '$2y$10$o7oyds3JEEys60lguHMA4.Z0vFqA2ss70by.iSH7VL4Ga3Nq8ZnUi', 'tenant', '2015-07-03 10:18:53', '2015-09-01 07:13:27', ''),
(43, 12, 'constance@constance.com', '$2y$10$HSGV/kNZOdGcA6S6T8b8e.UiYzvelCpocBFOWHtCcUQ5S6wiW.HrG', 'tenant', '2015-07-04 13:20:44', '2015-07-04 13:26:51', ''),
(44, 13, 'darren@darren.com', '$2y$10$.Z7/9q8Bw3RfhZ0Q3Qo58Ou64ZtD32J/JKdKC1aRNKZPuFdNd88eq', 'tenant', '2015-07-09 16:12:08', '2015-07-09 16:12:08', ''),
(45, 14, 'esther@esther.com', '$2y$10$QRZYZSxPClT1HF0HgO8PnOW4zO5.eDkEnBljNiEETG8HmtHdCY0l6', 'tenant', '2015-07-09 16:57:20', '2015-07-09 16:57:20', ''),
(46, 15, 'fiona@fiona.com', '$2y$10$OEVNCpzk9TvOHqlHGdCzr.tw3rLfrXchAVuVZDW83lYBIfV9KTwma', 'tenant', '2015-08-19 09:36:36', '2015-08-19 09:52:22', ''),
(47, 16, 'ethanchen01@163.com', '$2y$10$62uQ2gFX2BTo2nMCASRoB.Y0Jhgn9ZrI/0QPDA0ijKHgMSVbxzHri', 'tenant', '2015-09-01 08:05:47', '2015-09-01 10:03:23', 'cf71c0d77ddce3d601067d3b24c8980746c07078'),
(48, 17, 'zoe@zoe.com', '$2y$10$VYJq4UyAEr8kkbXiadjNKevmiEdYtG4AU1HDJdzUR0HL7LztXYZS6', 'tenant', '2015-09-12 03:16:49', '2015-09-12 03:16:49', '');

--
-- Triggers `users`
--
DROP TRIGGER IF EXISTS `updateEmail`;
DELIMITER //
CREATE TRIGGER `updateEmail` AFTER UPDATE ON `users`
 FOR EACH ROW UPDATE people SET email = NEW.username WHERE people.id = NEW.person_id
//
DELIMITER ;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `emergencies`
--
ALTER TABLE `emergencies`
  ADD CONSTRAINT `emergencies_ibfk_1` FOREIGN KEY (`person_id`) REFERENCES `people` (`id`);

--
-- Constraints for table `leases`
--
ALTER TABLE `leases`
  ADD CONSTRAINT `leases_ibfk_1` FOREIGN KEY (`room_id`) REFERENCES `rooms` (`id`),
  ADD CONSTRAINT `leases_ibfk_2` FOREIGN KEY (`student_id`) REFERENCES `students` (`id`),
  ADD CONSTRAINT `leases_ibfk_3` FOREIGN KEY (`property_id`) REFERENCES `properties` (`id`);

--
-- Constraints for table `macaddresses`
--
ALTER TABLE `macaddresses`
  ADD CONSTRAINT `macaddresses_ibfk_1` FOREIGN KEY (`person_id`) REFERENCES `people` (`id`);

--
-- Constraints for table `requests`
--
ALTER TABLE `requests`
  ADD CONSTRAINT `requests_ibfk_1` FOREIGN KEY (`person_id`) REFERENCES `people` (`id`);

--
-- Constraints for table `rooms`
--
ALTER TABLE `rooms`
  ADD CONSTRAINT `rooms_ibfk_1` FOREIGN KEY (`property_id`) REFERENCES `properties` (`id`);

--
-- Constraints for table `students`
--
ALTER TABLE `students`
  ADD CONSTRAINT `students_ibfk_2` FOREIGN KEY (`emergency_id`) REFERENCES `emergencies` (`id`);

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`person_id`) REFERENCES `people` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
