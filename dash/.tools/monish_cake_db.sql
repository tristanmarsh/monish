-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jul 04, 2015 at 05:28 PM
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
  `first_name` varchar(25) NOT NULL,
  `last_name` varchar(25) NOT NULL,
  `phone` int(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `employees`
--

CREATE TABLE IF NOT EXISTS `employees` (
  `employee_id` int(11) NOT NULL,
  KEY `employee_id` (`employee_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `internet_connection`
--

CREATE TABLE IF NOT EXISTS `internet_connection` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `lease_id` int(11) NOT NULL,
  `bandwidth` enum('1GB','5GB','10GB') NOT NULL,
  `monthly_fee` enum('TEN','TWENTY','FORTY') NOT NULL,
  `date_start` date NOT NULL,
  `date_end` date NOT NULL,
  `status` enum('ACTIVE','INACTIVE') DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `lease_id` (`lease_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `leases`
--

INSERT INTO `leases` (`id`, `room_id`, `property_id`, `student_id`, `date_start`, `date_end`, `weekly_price`) VALUES
(7, 1, 1, 10, '2015-07-15', '2016-05-13', 200),
(8, 2, 1, 11, '2015-07-01', '2015-11-20', 250),
(9, 11, 3, 12, '2015-07-15', '2016-05-13', 260),
(10, 24, 5, 10, '2015-07-04', '2016-07-04', 300);

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE IF NOT EXISTS `payments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `lease_id` int(11) NOT NULL,
  `date_paid` date NOT NULL,
  `amount` int(11) NOT NULL,
  `payment_period_starting` date NOT NULL,
  PRIMARY KEY (`id`),
  KEY `lease_id` (`lease_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

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
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Dumping data for table `people`
--

INSERT INTO `people` (`id`, `first_name`, `last_name`, `common_name`, `gender`, `phone`, `email`) VALUES
(1, 'Tony', 'Wise', '', 'M', '404040404', 'tonywise@monish.com'),
(9, 'Amy', 'Insurance', 'Amy', 'F', '0404040404', 'amy@amy.com'),
(10, 'Ben', 'Hudson', 'Benny', 'M', '0404040404', 'ben@ben.com'),
(12, 'Constance', 'Petrovski', 'Con', 'F', '0404040404', 'constance@constance.com');

-- --------------------------------------------------------

--
-- Table structure for table `properties`
--

CREATE TABLE IF NOT EXISTS `properties` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `address` varchar(50) NOT NULL,
  `number_rooms` int(11) NOT NULL,
  `bathrooms` int(11) NOT NULL,
  `kitchens` int(11) NOT NULL,
  `storeys` int(11) NOT NULL,
  `garage` enum('TRUE','FALSE') NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `properties`
--

INSERT INTO `properties` (`id`, `address`, `number_rooms`, `bathrooms`, `kitchens`, `storeys`, `garage`) VALUES
(1, '100 one street', 5, 1, 1, 1, 'TRUE'),
(2, '200 two street', 5, 1, 1, 1, 'TRUE'),
(3, '300 three street', 4, 2, 2, 1, 'FALSE'),
(4, '400 four street', 5, 2, 2, 1, 'FALSE'),
(5, '500 five street', 5, 2, 2, 1, 'FALSE'),
(6, '600 six street', 3, 2, 2, 1, 'FALSE');

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
  `user_id` int(11) DEFAULT NULL,
  `category` enum('GENERAL','MAINTENANCE','INTERNET','LEASE') NOT NULL,
  `property_address` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=20 ;

--
-- Dumping data for table `requests`
--

INSERT INTO `requests` (`id`, `title`, `description`, `created`, `modified`, `user_id`, `category`, `property_address`) VALUES
(9, 'Broken Tap', 'Please fix my broken tap I can''t get water!', '2015-04-13 14:40:10', '2015-04-13 14:52:35', 36, 'MAINTENANCE', '200 two street'),
(10, 'Broken Fridge', 'My food is getting rotten', '2015-04-13 14:52:26', '2015-04-13 14:52:26', 28, 'MAINTENANCE', '200 two street'),
(11, 'Broken TV', 'I can''t watch me soap dramas', '2015-04-13 14:53:32', '2015-04-13 14:53:50', 29, 'MAINTENANCE', '200 two street'),
(12, 'Broken Window', 'Got broken into and robbed ', '2015-04-13 15:18:31', '2015-04-13 15:18:31', 36, 'MAINTENANCE', '100 one street'),
(13, 'Broken Airconditioner', 'Aircon does not turn on', '2015-04-14 03:50:50', '2015-04-14 03:50:50', 28, 'MAINTENANCE', '100 one street'),
(14, 'Broken Face', 'got bashed', '2015-04-16 05:25:43', '2015-04-16 05:25:43', 28, 'MAINTENANCE', '100 one street'),
(15, 'Broken dong', 'donger is broken ', '2015-04-22 10:57:33', '2015-04-22 10:57:33', 29, 'MAINTENANCE', '300 three street'),
(16, 'Broken Borken', 'Borken', '2015-04-25 09:33:29', '2015-04-25 09:33:29', 30, 'MAINTENANCE', '300 three street'),
(17, 'Can I have a new TV', 'Please I want to watch the footy', '2015-05-14 04:37:55', '2015-05-14 04:50:05', 36, 'GENERAL', '300 three street'),
(18, 'I want better internet', 'pleeease', '2015-05-14 04:47:40', '2015-05-14 04:49:49', 36, 'INTERNET', '300 three street'),
(19, 'I want to extend my lease', 'Can you make it cheaper', '2015-05-14 04:49:37', '2015-05-14 04:49:37', 36, 'LEASE', '300 three street');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=28 ;

--
-- Dumping data for table `rooms`
--

INSERT INTO `rooms` (`id`, `property_id`, `room_name`, `vacant`) VALUES
(1, 1, 'room 1', 'TRUE'),
(2, 1, 'room 2', 'TRUE'),
(3, 1, 'room 3', 'TRUE'),
(4, 1, 'room 4', 'TRUE'),
(5, 1, 'room 5', 'TRUE'),
(6, 2, 'room 1', 'TRUE'),
(7, 2, 'room 2', 'TRUE'),
(8, 2, 'room 3', 'TRUE'),
(9, 2, 'room 4', 'TRUE'),
(10, 2, 'room 5', 'TRUE'),
(11, 3, 'room 1', 'TRUE'),
(12, 3, 'room 2', 'TRUE'),
(13, 3, 'room 3', 'TRUE'),
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
(24, 5, 'room 5', 'TRUE'),
(25, 6, 'room 1', 'TRUE'),
(26, 6, 'room 2', 'TRUE'),
(27, 6, 'room 3', 'TRUE');

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE IF NOT EXISTS `students` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `person_id` int(11) NOT NULL,
  `emergency_id` int(11) DEFAULT NULL,
  `internet_plan` enum('FREE','BASIC','STANDARD','PREMIUM') DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `person_id` (`person_id`),
  KEY `emergency_id` (`emergency_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`id`, `person_id`, `emergency_id`, `internet_plan`) VALUES
(10, 9, NULL, 'STANDARD'),
(11, 10, NULL, 'PREMIUM'),
(12, 12, NULL, 'FREE');

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
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`),
  KEY `person_id` (`person_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=44 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `person_id`, `username`, `password`, `role`, `created`, `modified`) VALUES
(35, 1, 'admin', '$2y$10$W4EJplARM6UTAznYCvS50O37iSU.eyc1IUDFPuyxu0kju27md8G6e', 'admin', '2015-05-16 08:08:00', '2015-05-16 08:08:00'),
(41, 9, 'amy@amy.com', '$2y$10$3e2XcolsgnsWa1Shy7CkDupFW8fPbhQGHkwN79qg5o2CoCOsedz5K', 'tenant', '2015-07-03 05:24:37', '2015-07-03 10:23:07'),
(42, 10, 'ben@ben.com', '$2y$10$yPfJ9tHptXXaSeqpja9X2uf9Q/MaIe8jRpQm82XIqI.rCu6zzv4fK', 'tenant', '2015-07-03 10:18:53', '2015-07-03 10:19:57'),
(43, 12, 'constance@constance.com', '$2y$10$HSGV/kNZOdGcA6S6T8b8e.UiYzvelCpocBFOWHtCcUQ5S6wiW.HrG', 'tenant', '2015-07-04 13:20:44', '2015-07-04 13:26:51');

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
-- Constraints for table `employees`
--
ALTER TABLE `employees`
  ADD CONSTRAINT `employees_ibfk_1` FOREIGN KEY (`employee_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `internet_connection`
--
ALTER TABLE `internet_connection`
  ADD CONSTRAINT `internet_connection_ibfk_1` FOREIGN KEY (`lease_id`) REFERENCES `leases` (`id`);

--
-- Constraints for table `leases`
--
ALTER TABLE `leases`
  ADD CONSTRAINT `leases_ibfk_1` FOREIGN KEY (`room_id`) REFERENCES `rooms` (`id`),
  ADD CONSTRAINT `leases_ibfk_2` FOREIGN KEY (`student_id`) REFERENCES `students` (`id`),
  ADD CONSTRAINT `leases_ibfk_3` FOREIGN KEY (`property_id`) REFERENCES `properties` (`id`);

--
-- Constraints for table `payments`
--
ALTER TABLE `payments`
  ADD CONSTRAINT `payments_ibfk_1` FOREIGN KEY (`lease_id`) REFERENCES `leases` (`id`);

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
