-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: May 13, 2015 at 01:31 PM
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
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `role` varchar(20) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `first_name` varchar(50) DEFAULT NULL,
  `last_name` varchar(25) NOT NULL,
  `gender` enum('M','F') NOT NULL,
  `phone` int(20) NOT NULL,
  `email` varchar(30) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=33 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `role`, `created`, `modified`, `first_name`, `last_name`, `gender`, `phone`, `email`) VALUES
(1, 'admin', '$2y$10$ytpEvi6EvojZvBDYa18lDezDToFfQ9e64lD.gIo0r30z9uscH4xXy', 'admin', NULL, NULL, 'Tony', 'Wise', 'M', 0, ''),
(28, 'tenant50', '$2y$10$rsTuv7CgtHwhyjtV4BqK9Om2W33vRJKlVs1SZpP/fxeImQt1YXJHK', 'tenant', '2015-04-22 10:38:52', '2015-04-27 03:32:15', 'Jacob', 'Ben', 'M', 412345678, 'BenJacobs@gmail.com'),
(29, 'tenant51', '$2y$10$T2vn/qK4X/1r7h6QifMMyu229y5zDSSUAakejLXeB.Fhufop.rL5q', 'tenant', '2015-04-22 10:57:05', '2015-04-27 03:43:26', 'Michael', 'Lai', 'M', 418273645, 'michael@gmail.com'),
(30, 'tenant1', '$2y$10$9oL26vXvDX7JJsxH6JSTwOR/Ht75vkgoxzt1QFE.isPzZgURDQOTq', 'tenant', '2015-04-25 09:33:08', '2015-04-25 09:33:08', 'Jenny', 'Law', 'F', 48921783, 'jenny@gmail.com'),
(31, 'tenant4', '$2y$10$G435ZwjIKY3iWF4Bz4mESO1ktRAOyGhSfQPaR9MHTcCtnvlfU1liu', 'tenant', '2015-04-28 08:55:16', '2015-04-28 08:55:16', 'Fiona', 'Lopez', 'F', 433646343, 'fiona@gmail.com'),
(32, 'tenant6', '$2y$10$UXBGmOHBT8kH3iOGT8CckuHD8DXR/ev8F9T4Vb.KmAyw2g00PTb0K', 'tenant', '2015-04-29 01:58:45', '2015-04-29 01:58:45', 'Ben', 'Ten', 'M', 482818293, 'ben@gmail.com');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
