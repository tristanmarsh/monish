-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Apr 26, 2015 at 04:11 PM
-- Server version: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `buildzeroeight`
--

-- --------------------------------------------------------

--
-- Table structure for table `emergency_contacts`
--

CREATE TABLE IF NOT EXISTS `emergency_contacts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `first_name` varchar(25) NOT NULL,
  `last_name` varchar(25) NOT NULL,
  `phone` int(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `emergency_contacts`
--

INSERT INTO `emergency_contacts` (`id`, `first_name`, `last_name`, `phone`, `email`) VALUES
(1, 'John', 'Smith', 412345678, 'john@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `emergency_student`
--

CREATE TABLE IF NOT EXISTS `emergency_student` (
  `emergency_id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  KEY `emergency_id` (`emergency_id`),
  KEY `student_id` (`student_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `internet_connection`
--

INSERT INTO `internet_connection` (`id`, `lease_id`, `bandwidth`, `monthly_fee`, `date_start`, `date_end`, `status`) VALUES
(1, 1, '1GB', '', '2015-04-23', '2015-09-23', '');

-- --------------------------------------------------------

--
-- Table structure for table `leases`
--

CREATE TABLE IF NOT EXISTS `leases` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `room_id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `date_start` date NOT NULL,
  `date_end` date NOT NULL,
  `lease_status` enum('ONGOING','EXPIRED') NOT NULL,
  `weekly_price` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `room_id` (`room_id`),
  KEY `student_id` (`student_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `leases`
--

INSERT INTO `leases` (`id`, `room_id`, `student_id`, `date_start`, `date_end`, `lease_status`, `weekly_price`) VALUES
(1, 1, 1, '2015-04-23', '2015-10-23', 'ONGOING', 200);

-- --------------------------------------------------------

--
-- Table structure for table `maintenances`
--

CREATE TABLE IF NOT EXISTS `maintenances` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(50) DEFAULT NULL,
  `description` text,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=17 ;

--
-- Dumping data for table `maintenances`
--

INSERT INTO `maintenances` (`id`, `title`, `description`, `created`, `modified`, `user_id`) VALUES
(9, 'Broken Tap', 'Please fix my broken tap I can''t get water!', '2015-04-13 14:40:10', '2015-04-13 14:52:35', 5),
(10, 'Broken Fridge', 'My food is getting rotten', '2015-04-13 14:52:26', '2015-04-13 14:52:26', 5),
(11, 'Broken TV', 'I can''t watch me soap dramas', '2015-04-13 14:53:32', '2015-04-13 14:53:50', 6),
(12, 'Broken Window', 'Got broken into and robbed ', '2015-04-13 15:18:31', '2015-04-13 15:18:31', 6),
(13, 'Broken Airconditioner', 'Aircon does not turn on', '2015-04-14 03:50:50', '2015-04-14 03:50:50', 10),
(14, 'Broken Face', 'got bashed', '2015-04-16 05:25:43', '2015-04-16 05:25:43', 24),
(15, 'Broken dong', 'donger is broken ', '2015-04-22 10:57:33', '2015-04-22 10:57:33', 29),
(16, 'Broken Borken', 'Borken', '2015-04-25 09:33:29', '2015-04-25 09:33:29', 30);

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `properties`
--

INSERT INTO `properties` (`id`, `address`, `number_rooms`, `bathrooms`, `kitchens`, `storeys`, `garage`) VALUES
(1, '70 something street', 5, 1, 1, 1, '');

-- --------------------------------------------------------

--
-- Table structure for table `rooms`
--

CREATE TABLE IF NOT EXISTS `rooms` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `property_id` int(11) NOT NULL,
  `vacant` enum('TRUE','FALSE') NOT NULL,
  PRIMARY KEY (`id`),
  KEY `property_id` (`property_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `rooms`
--

INSERT INTO `rooms` (`id`, `property_id`, `vacant`) VALUES
(1, 1, '');

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE IF NOT EXISTS `students` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `expected_grad_date` date NOT NULL,
  `person_id` int(11) NOT NULL,
  `country_of_birth` varchar(20) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `person_id` (`person_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`id`, `expected_grad_date`, `person_id`, `country_of_birth`) VALUES
(1, '2015-10-23', 28, 'China'),
(2, '2015-04-23', 29, 'Hong Kong');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `role` varchar(20) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `title` enum('MR','MRS','MISS','DR') NOT NULL,
  `first_name` varchar(50) DEFAULT NULL,
  `last_name` varchar(25) NOT NULL,
  `gender` enum('M','F') NOT NULL,
  `phone` int(20) NOT NULL,
  `email` varchar(30) NOT NULL,
  `home_country` varchar(25) NOT NULL,
  `city` varchar(25) NOT NULL,
  `suburb` varchar(25) NOT NULL,
  `postcode` int(15) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=31 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `role`, `created`, `modified`, `title`, `first_name`, `last_name`, `gender`, `phone`, `email`, `home_country`, `city`, `suburb`, `postcode`) VALUES
(1, 'admin', '$2y$10$ytpEvi6EvojZvBDYa18lDezDToFfQ9e64lD.gIo0r30z9uscH4xXy', 'admin', NULL, NULL, 'MR', 'Tony', 'Wise', 'M', 0, '', '', '', '', 0),
(28, 'tenant50', '$2y$10$rsTuv7CgtHwhyjtV4BqK9Om2W33vRJKlVs1SZpP/fxeImQt1YXJHK', 'tenant', '2015-04-22 10:38:52', '2015-04-22 10:38:52', 'MR', 'jacob', '', 'M', 0, '', '', '', '', 0),
(29, 'tenant51', '$2y$10$T2vn/qK4X/1r7h6QifMMyu229y5zDSSUAakejLXeB.Fhufop.rL5q', 'tenant', '2015-04-22 10:57:05', '2015-04-22 10:57:05', 'MR', 'mike', 'lai', 'M', 0, '', '', '', '', 0),
(30, 'tenant1', '$2y$10$9oL26vXvDX7JJsxH6JSTwOR/Ht75vkgoxzt1QFE.isPzZgURDQOTq', 'tenant', '2015-04-25 09:33:08', '2015-04-25 09:33:08', 'MISS', 'jenny', 'lo', 'F', 0, '', '', '', '', 0);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `emergency_student`
--
ALTER TABLE `emergency_student`
  ADD CONSTRAINT `emergency_student_ibfk_1` FOREIGN KEY (`emergency_id`) REFERENCES `emergency_contacts` (`id`),
  ADD CONSTRAINT `emergency_student_ibfk_2` FOREIGN KEY (`student_id`) REFERENCES `students` (`id`);

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
  ADD CONSTRAINT `leases_ibfk_2` FOREIGN KEY (`student_id`) REFERENCES `students` (`id`);

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
  ADD CONSTRAINT `students_ibfk_1` FOREIGN KEY (`person_id`) REFERENCES `users` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
