-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: May 16, 2015 at 09:02 AM
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
  `person_id` int(11) NOT NULL,
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
  UNIQUE KEY `username` (`username`),
  KEY `person_id` (`person_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=33 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `person_id`, `username`, `password`, `role`, `created`, `modified`, `title`, `first_name`, `last_name`, `gender`, `phone`, `email`, `home_country`, `city`, `suburb`, `postcode`) VALUES
(1, 0, 'admin', '$2y$10$ytpEvi6EvojZvBDYa18lDezDToFfQ9e64lD.gIo0r30z9uscH4xXy', 'admin', NULL, NULL, 'MR', 'Tony', 'Wise', 'M', 0, '', '', '', '', 0),
(28, 0, 'tenant50', '$2y$10$rsTuv7CgtHwhyjtV4BqK9Om2W33vRJKlVs1SZpP/fxeImQt1YXJHK', 'tenant', '2015-04-22 10:38:52', '2015-04-27 03:32:15', 'MR', 'Jacob', 'Ben', 'M', 412345678, 'BenJacobs@gmail.com', 'America', 'New York', 'First Avenue', 190283),
(29, 0, 'tenant51', '$2y$10$T2vn/qK4X/1r7h6QifMMyu229y5zDSSUAakejLXeB.Fhufop.rL5q', 'tenant', '2015-04-22 10:57:05', '2015-04-27 03:43:26', 'MR', 'Michael', 'Lai', 'M', 418273645, 'michael@gmail.com', 'France', 'Paris', 'hawhawhaw', 9123),
(30, 0, 'tenant1', '$2y$10$9oL26vXvDX7JJsxH6JSTwOR/Ht75vkgoxzt1QFE.isPzZgURDQOTq', 'tenant', '2015-04-25 09:33:08', '2015-04-25 09:33:08', 'MISS', 'Jenny', 'Law', 'F', 48921783, 'jenny@gmail.com', 'China', 'Guang Zhou', 'Dong Shan', 1239081),
(31, 0, 'tenant4', '$2y$10$G435ZwjIKY3iWF4Bz4mESO1ktRAOyGhSfQPaR9MHTcCtnvlfU1liu', 'tenant', '2015-04-28 08:55:16', '2015-04-28 08:55:16', 'MISS', 'Fiona', 'Lopez', 'F', 433646343, 'fiona@gmail.com', 'Atlanta', 'Submarine', 'Tank', 123123),
(32, 0, 'tenant6', '$2y$10$UXBGmOHBT8kH3iOGT8CckuHD8DXR/ev8F9T4Vb.KmAyw2g00PTb0K', 'tenant', '2015-04-29 01:58:45', '2015-04-29 01:58:45', 'MR', 'Ben', 'Ten', 'M', 482818293, 'ben@gmail.com', 'Switz', 'cityname', 'suburbname', 31023);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
