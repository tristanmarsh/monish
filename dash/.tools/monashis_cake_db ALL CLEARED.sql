-- phpMyAdmin SQL Dump
-- version 4.0.10.7
-- http://www.phpmyadmin.net
--
-- Host: localhost:3306
-- Generation Time: Oct 22, 2015 at 11:55 AM
-- Server version: 5.6.23
-- PHP Version: 5.4.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `monashis_cake_db`
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
(1, '2015-10-14');

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
  `archived` enum('NO','YES') NOT NULL DEFAULT 'NO',
  PRIMARY KEY (`id`),
  KEY `room_id` (`room_id`),
  KEY `student_id` (`student_id`),
  KEY `property_id` (`property_id`),
  KEY `property_id_2` (`property_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=19 ;

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
(1, 'Tony', 'Wise', '', 'M', '404040404', 'tonywise@monish.com', '123', 'China', 'Mr Mang', '123', '123');

-- --------------------------------------------------------

--
-- Table structure for table `properties`
--

CREATE TABLE IF NOT EXISTS `properties` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `address` varchar(50) NOT NULL,
  `archived` enum('NO','YES') NOT NULL DEFAULT 'NO',
  `avatar` varchar(255) DEFAULT NULL,
  `avatar_directory` varchar(255) DEFAULT NULL,
  `avatar_url` varchar(255) DEFAULT NULL,
  `avatar_type` varchar(255) DEFAULT NULL,
  `avatar_size` varchar(255) DEFAULT NULL,
  `avatar_name` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=38 ;

-- --------------------------------------------------------

--
-- Table structure for table `rooms`
--

CREATE TABLE IF NOT EXISTS `rooms` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `property_id` int(11) NOT NULL,
  `room_name` varchar(50) NOT NULL,
  `vacant` enum('TRUE','FALSE') NOT NULL,
  `archived` enum('NO','YES') NOT NULL DEFAULT 'NO',
  PRIMARY KEY (`id`),
  KEY `property_id` (`property_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=30 ;

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE IF NOT EXISTS `students` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `person_id` int(11) NOT NULL,
  `emergency_id` int(11) DEFAULT NULL,
  `internet_plan` enum('Free','Basic','Standard','Premium') DEFAULT NULL,
  `archived` enum('NO','YES') NOT NULL DEFAULT 'NO',
  PRIMARY KEY (`id`),
  KEY `person_id` (`person_id`),
  KEY `emergency_id` (`emergency_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=18 ;

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
(35, 1, 'admin', '$2y$10$W4EJplARM6UTAznYCvS50O37iSU.eyc1IUDFPuyxu0kju27md8G6e', 'admin', '2015-05-16 08:08:00', '2015-05-16 08:08:00', '');

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
