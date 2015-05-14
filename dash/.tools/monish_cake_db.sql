-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 2015-05-14 06:10:22
-- 服务器版本： 5.6.17
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
-- 表的结构 `emergencies`
--

CREATE TABLE IF NOT EXISTS `emergencies` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `first_name` varchar(25) NOT NULL,
  `last_name` varchar(25) NOT NULL,
  `phone` int(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- 转存表中的数据 `emergencies`
--

INSERT INTO `emergencies` (`id`, `first_name`, `last_name`, `phone`, `email`) VALUES
(1, 'Jake', 'Mate', 812903, 'abc@gmail.com'),
(2, 'Manny', 'Man', 8129032, 'abccc@gmail.com');

-- --------------------------------------------------------

--
-- 表的结构 `emergency_contacts`
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
-- 转存表中的数据 `emergency_contacts`
--

INSERT INTO `emergency_contacts` (`id`, `first_name`, `last_name`, `phone`, `email`) VALUES
(1, 'John', 'Smith', 412345678, 'john@gmail.com');

-- --------------------------------------------------------

--
-- 表的结构 `emergency_student`
--

CREATE TABLE IF NOT EXISTS `emergency_student` (
  `emergency_id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  KEY `emergency_id` (`emergency_id`),
  KEY `student_id` (`student_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- 表的结构 `employees`
--

CREATE TABLE IF NOT EXISTS `employees` (
  `employee_id` int(11) NOT NULL,
  KEY `employee_id` (`employee_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- 表的结构 `internet_connection`
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
-- 表的结构 `leases`
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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- 转存表中的数据 `leases`
--

INSERT INTO `leases` (`id`, `room_id`, `student_id`, `date_start`, `date_end`, `lease_status`, `weekly_price`) VALUES
(4, 1, 4, '2015-04-29', '2015-04-29', 'EXPIRED', 12),
(5, 1, 5, '2015-04-29', '2015-04-29', 'ONGOING', 123),
(6, 1, 4, '2015-04-29', '2015-04-29', 'ONGOING', 2147483647),
(7, 13, 4, '2015-04-29', '2015-04-29', 'EXPIRED', 67),
(8, 1, 4, '2015-04-29', '2015-04-29', 'EXPIRED', 243);

-- --------------------------------------------------------

--
-- 表的结构 `payments`
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
-- 表的结构 `properties`
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
-- 转存表中的数据 `properties`
--

INSERT INTO `properties` (`id`, `address`, `number_rooms`, `bathrooms`, `kitchens`, `storeys`, `garage`) VALUES
(1, '70 something street', 5, 1, 1, 1, 'TRUE');

-- --------------------------------------------------------

--
-- 表的结构 `requests`
--

CREATE TABLE IF NOT EXISTS `requests` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(50) DEFAULT NULL,
  `description` text,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=17 ;

--
-- 转存表中的数据 `requests`
--

INSERT INTO `requests` (`id`, `title`, `description`, `created`, `modified`, `user_id`) VALUES
(9, 'Broken Tap', 'Please fix my broken tap I can''t get water!', '2015-04-13 14:40:10', '2015-04-13 14:52:35', 28),
(10, 'Broken Fridge', 'My food is getting rotten', '2015-04-13 14:52:26', '2015-04-13 14:52:26', 28),
(11, 'Broken TV', 'I can''t watch me soap dramas', '2015-04-13 14:53:32', '2015-04-13 14:53:50', 29),
(12, 'Broken Window', 'Got broken into and robbed ', '2015-04-13 15:18:31', '2015-04-13 15:18:31', 30),
(13, 'Broken Airconditioner', 'Aircon does not turn on', '2015-04-14 03:50:50', '2015-04-14 03:50:50', 28),
(14, 'Broken Face', 'got bashed', '2015-04-16 05:25:43', '2015-04-16 05:25:43', 28),
(15, 'Broken dong', 'donger is broken ', '2015-04-22 10:57:33', '2015-04-22 10:57:33', 29),
(16, 'Broken Borken', 'Borken', '2015-04-25 09:33:29', '2015-04-25 09:33:29', 30);

-- --------------------------------------------------------

--
-- 表的结构 `rooms`
--

CREATE TABLE IF NOT EXISTS `rooms` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `property_id` int(11) NOT NULL,
  `room_name` varchar(50) NOT NULL,
  `vacant` enum('TRUE','FALSE') NOT NULL,
  PRIMARY KEY (`id`),
  KEY `property_id` (`property_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=14 ;

--
-- 转存表中的数据 `rooms`
--

INSERT INTO `rooms` (`id`, `property_id`, `room_name`, `vacant`) VALUES
(1, 1, 'unit 1 room 1', 'TRUE'),
(13, 1, 'unit 1 room 2', 'TRUE');

-- --------------------------------------------------------

--
-- 表的结构 `students`
--

CREATE TABLE IF NOT EXISTS `students` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `expected_grad_date` date NOT NULL,
  `person_id` int(11) NOT NULL,
  `emergency_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `person_id` (`person_id`),
  KEY `emergency_id` (`emergency_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- 转存表中的数据 `students`
--

INSERT INTO `students` (`id`, `expected_grad_date`, `person_id`, `emergency_id`) VALUES
(4, '2015-04-27', 29, 1),
(5, '2015-04-27', 30, 1);

-- --------------------------------------------------------

--
-- 表的结构 `users`
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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=33 ;

--
-- 转存表中的数据 `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `role`, `created`, `modified`, `title`, `first_name`, `last_name`, `gender`, `phone`, `email`, `home_country`, `city`, `suburb`, `postcode`) VALUES
(1, 'admin', '$2y$10$ytpEvi6EvojZvBDYa18lDezDToFfQ9e64lD.gIo0r30z9uscH4xXy', 'admin', NULL, NULL, 'MR', 'Tony', 'Wise', 'M', 0, '', '', '', '', 0),
(28, 'tenant50', '$2y$10$rsTuv7CgtHwhyjtV4BqK9Om2W33vRJKlVs1SZpP/fxeImQt1YXJHK', 'tenant', '2015-04-22 10:38:52', '2015-04-27 03:32:15', 'MR', 'Jacob', 'Ben', 'M', 412345678, 'BenJacobs@gmail.com', 'America', 'New York', 'First Avenue', 190283),
(29, 'tenant51', '$2y$10$T2vn/qK4X/1r7h6QifMMyu229y5zDSSUAakejLXeB.Fhufop.rL5q', 'tenant', '2015-04-22 10:57:05', '2015-04-27 03:43:26', 'MR', 'Michael', 'Lai', 'M', 418273645, 'michael@gmail.com', 'France', 'Paris', 'hawhawhaw', 9123),
(30, 'tenant1', '$2y$10$9oL26vXvDX7JJsxH6JSTwOR/Ht75vkgoxzt1QFE.isPzZgURDQOTq', 'tenant', '2015-04-25 09:33:08', '2015-04-25 09:33:08', 'MISS', 'Jenny', 'Law', 'F', 48921783, 'jenny@gmail.com', 'China', 'Guang Zhou', 'Dong Shan', 1239081),
(31, 'tenant4', '$2y$10$G435ZwjIKY3iWF4Bz4mESO1ktRAOyGhSfQPaR9MHTcCtnvlfU1liu', 'tenant', '2015-04-28 08:55:16', '2015-04-28 08:55:16', 'MISS', 'Fiona', 'Lopez', 'F', 433646343, 'fiona@gmail.com', 'Atlanta', 'Submarine', 'Tank', 123123),
(32, 'tenant6', '$2y$10$UXBGmOHBT8kH3iOGT8CckuHD8DXR/ev8F9T4Vb.KmAyw2g00PTb0K', 'tenant', '2015-04-29 01:58:45', '2015-04-29 01:58:45', 'MR', 'Ben', 'Ten', 'M', 482818293, 'ben@gmail.com', 'Switz', 'cityname', 'suburbname', 31023);

--
-- 限制导出的表
--

--
-- 限制表 `emergency_student`
--
ALTER TABLE `emergency_student`
  ADD CONSTRAINT `emergency_student_ibfk_1` FOREIGN KEY (`emergency_id`) REFERENCES `emergency_contacts` (`id`),
  ADD CONSTRAINT `emergency_student_ibfk_2` FOREIGN KEY (`student_id`) REFERENCES `students` (`id`);

--
-- 限制表 `employees`
--
ALTER TABLE `employees`
  ADD CONSTRAINT `employees_ibfk_1` FOREIGN KEY (`employee_id`) REFERENCES `users` (`id`);

--
-- 限制表 `internet_connection`
--
ALTER TABLE `internet_connection`
  ADD CONSTRAINT `internet_connection_ibfk_1` FOREIGN KEY (`lease_id`) REFERENCES `leases` (`id`);

--
-- 限制表 `leases`
--
ALTER TABLE `leases`
  ADD CONSTRAINT `leases_ibfk_1` FOREIGN KEY (`room_id`) REFERENCES `rooms` (`id`),
  ADD CONSTRAINT `leases_ibfk_2` FOREIGN KEY (`student_id`) REFERENCES `students` (`id`);

--
-- 限制表 `payments`
--
ALTER TABLE `payments`
  ADD CONSTRAINT `payments_ibfk_1` FOREIGN KEY (`lease_id`) REFERENCES `leases` (`id`);

--
-- 限制表 `rooms`
--
ALTER TABLE `rooms`
  ADD CONSTRAINT `rooms_ibfk_1` FOREIGN KEY (`property_id`) REFERENCES `properties` (`id`);

--
-- 限制表 `students`
--
ALTER TABLE `students`
  ADD CONSTRAINT `students_ibfk_1` FOREIGN KEY (`person_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `students_ibfk_2` FOREIGN KEY (`emergency_id`) REFERENCES `emergencies` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
