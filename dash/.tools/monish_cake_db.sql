-- phpMyAdmin SQL Dump
-- version 4.4.1.1
-- http://www.phpmyadmin.net
--
-- Host: localhost:3306
-- Generation Time: Oct 26, 2015 at 03:31 AM
-- Server version: 5.5.42
-- PHP Version: 5.6.7

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

CREATE TABLE `emergencies` (
  `id` int(11) NOT NULL,
  `person_id` int(11) DEFAULT NULL,
  `first_name` varchar(25) NOT NULL,
  `last_name` varchar(25) NOT NULL,
  `phone` varchar(11) NOT NULL,
  `email` varchar(50) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `emergencies`
--

INSERT INTO `emergencies` (`id`, `person_id`, `first_name`, `last_name`, `phone`, `email`) VALUES
(20, 22, 'Sherry', 'Smith', '0492719232', 'Sherry@hotmail.com'),
(21, 22, 'Peter', 'Smith', '0428192831', 'peter@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `lastroomupdate`
--

CREATE TABLE `lastroomupdate` (
  `id` int(11) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `lastroomupdate`
--

INSERT INTO `lastroomupdate` (`id`, `date`) VALUES
(1, '2015-10-26');

-- --------------------------------------------------------

--
-- Table structure for table `leases`
--

CREATE TABLE `leases` (
  `id` int(11) NOT NULL,
  `room_id` int(11) NOT NULL,
  `property_id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `date_start` date NOT NULL,
  `date_end` date NOT NULL,
  `weekly_price` int(11) NOT NULL,
  `archived` enum('NO','YES') NOT NULL DEFAULT 'NO'
) ENGINE=InnoDB AUTO_INCREMENT=36 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `leases`
--

INSERT INTO `leases` (`id`, `room_id`, `property_id`, `student_id`, `date_start`, `date_end`, `weekly_price`, `archived`) VALUES
(31, 30, 13, 22, '2015-10-21', '2015-10-29', 200, 'NO'),
(32, 31, 13, 23, '2015-10-01', '2015-11-11', 300, 'NO'),
(33, 32, 13, 24, '2015-10-09', '2016-02-19', 150, 'NO'),
(34, 33, 14, 25, '2015-08-06', '2016-07-14', 500, 'NO'),
(35, 34, 14, 26, '2015-10-31', '2016-01-22', 900, 'NO');

-- --------------------------------------------------------

--
-- Table structure for table `macaddresses`
--

CREATE TABLE `macaddresses` (
  `id` int(11) NOT NULL,
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
  `mac_address_ten` varchar(25) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `macaddresses`
--

INSERT INTO `macaddresses` (`id`, `person_id`, `device_name_one`, `device_name_two`, `device_name_three`, `device_name_four`, `device_name_five`, `device_name_six`, `device_name_seven`, `device_name_eight`, `device_name_nine`, `device_name_ten`, `mac_address_one`, `mac_address_two`, `mac_address_three`, `mac_address_four`, `mac_address_five`, `mac_address_six`, `mac_address_seven`, `mac_address_eight`, `mac_address_nine`, `mac_address_ten`) VALUES
(11, 22, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(12, 23, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(13, 24, 'iPhone', 'Laptop', '', '', '', '', '', '', '', '', '34:45:56:ed:34:23', '34-45-56-ed-34-23', '', '', '', '', '', '', '', ''),
(14, 25, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(15, 26, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `people`
--

CREATE TABLE `people` (
  `id` int(11) NOT NULL,
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
  `account_number` varchar(255) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `people`
--

INSERT INTO `people` (`id`, `first_name`, `last_name`, `common_name`, `gender`, `phone`, `email`, `visa`, `parent_address`, `account_name`, `bsb_number`, `account_number`) VALUES
(1, 'Tony', 'Wise', 'Tony', 'M', '04828192832', 'tonywise@monish.com', '123', 'China', 'Mr Mang', '123', '123'),
(22, 'Ben', 'Smith', 'Ben', 'M', '0483729128', 'ben@ben.com', '198237328', '52 Wood Avenue', 'Ben Smith', '828233', '91283829'),
(23, 'Yeeboon', 'Tan', 'Yee', 'F', '0429284829', 'yeeboon23@hotmail.com', '2917398127', '610/300 Swanston Street', 'Yeeboon Tan', '9817238', '28399291'),
(24, 'Tristan', 'Marsh', 'Tristan', 'M', '0482819232', 'tmar41@student.monash.edu', '9171497491', '87 Pan Street', 'Tristan', '201938', '987198723'),
(25, 'Ethan', 'Chen', 'Ethan', 'M', '0483281928', 'echen@echen.com', '1729387198', '50 Dot Street', 'Ethan Chen', '1230981', '120398120938'),
(26, 'Michael', 'Lai', 'Michael', 'M', '04892912839', 'mlai@hotmail.com', '923874928374', '09 Retreat Avenue', 'Michael Lai', '198273192873', '1923789812');

-- --------------------------------------------------------

--
-- Table structure for table `properties`
--

CREATE TABLE `properties` (
  `id` int(11) NOT NULL,
  `address` varchar(50) NOT NULL,
  `archived` enum('NO','YES') NOT NULL DEFAULT 'NO',
  `avatar` varchar(255) DEFAULT NULL,
  `avatar_directory` varchar(255) DEFAULT NULL,
  `avatar_url` varchar(255) DEFAULT NULL,
  `avatar_type` varchar(255) DEFAULT NULL,
  `avatar_size` varchar(255) DEFAULT NULL,
  `avatar_name` varchar(255) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `properties`
--

INSERT INTO `properties` (`id`, `address`, `archived`, `avatar`, `avatar_directory`, `avatar_url`, `avatar_type`, `avatar_size`, `avatar_name`) VALUES
(13, '24 Grant Street', 'NO', NULL, NULL, NULL, NULL, NULL, NULL),
(14, '78 Pine Road', 'NO', NULL, NULL, NULL, NULL, NULL, NULL),
(15, '100 Mansion Street', 'NO', NULL, NULL, NULL, NULL, NULL, NULL),
(16, '80 Botan Avenue', 'NO', NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `requests`
--

CREATE TABLE `requests` (
  `id` int(10) unsigned NOT NULL,
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
  `avatar_name` varchar(255) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=71 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `requests`
--

INSERT INTO `requests` (`id`, `title`, `description`, `created`, `modified`, `person_id`, `category`, `property_address`, `status`, `entry_time`, `avatar`, `avatar_directory`, `avatar_url`, `avatar_type`, `avatar_size`, `avatar_name`) VALUES
(66, 'Broken TV', 'Please fix it!', '2015-10-26 02:26:48', '2015-10-26 02:26:48', 24, 'General', '24 Grant Street', 'Unread', 'Anytime', NULL, NULL, NULL, NULL, NULL, NULL),
(67, 'Broken Sink', 'I cannot use it!', '2015-10-26 02:27:07', '2015-10-26 02:27:07', 24, 'Maintenance', '24 Grant Street', 'Unread', 'N/A', NULL, NULL, NULL, NULL, NULL, NULL),
(68, 'Broken Door', 'My lock doesn''t work', '2015-10-26 02:28:03', '2015-10-26 02:28:03', 24, 'Maintenance', '24 Grant Street', 'Unread', 'Anytime', NULL, NULL, NULL, NULL, NULL, NULL),
(69, 'Noise Levels', 'Other rooms are too noisy!', '2015-10-26 02:29:24', '2015-10-26 02:29:24', 22, 'Noisy Tenant', '24 Grant Street', 'Unread', 'Anytime', NULL, NULL, NULL, NULL, NULL, NULL),
(70, 'Light is broken', 'I cannot see anything', '2015-10-26 02:29:45', '2015-10-26 02:29:45', 22, 'Bathroom Light Broken', '24 Grant Street', 'Unread', 'Anytime', NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `rooms`
--

CREATE TABLE `rooms` (
  `id` int(11) NOT NULL,
  `property_id` int(11) NOT NULL,
  `room_name` varchar(50) NOT NULL,
  `vacant` enum('TRUE','FALSE') NOT NULL,
  `room_archived` enum('NO','YES') NOT NULL DEFAULT 'NO'
) ENGINE=InnoDB AUTO_INCREMENT=41 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rooms`
--

INSERT INTO `rooms` (`id`, `property_id`, `room_name`, `vacant`, `room_archived`) VALUES
(30, 13, 'Room 1', 'FALSE', 'NO'),
(31, 13, 'Room 2', 'FALSE', 'NO'),
(32, 13, 'Room 3', 'FALSE', 'NO'),
(33, 14, 'Room 1', 'FALSE', 'NO'),
(34, 14, 'Room 2', 'FALSE', 'NO'),
(36, 15, 'Room 1', 'TRUE', 'NO'),
(37, 15, 'Room 2', 'TRUE', 'NO'),
(38, 15, 'Room 3', 'TRUE', 'NO'),
(39, 16, 'Room 1', 'TRUE', 'NO'),
(40, 16, 'Room 2', 'TRUE', 'NO');

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `id` int(11) NOT NULL,
  `person_id` int(11) NOT NULL,
  `emergency_id` int(11) DEFAULT NULL,
  `internet_plan` enum('Free','Basic','Standard','Premium') DEFAULT NULL,
  `archived` enum('NO','YES') NOT NULL DEFAULT 'NO'
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`id`, `person_id`, `emergency_id`, `internet_plan`, `archived`) VALUES
(22, 22, NULL, 'Free', 'NO'),
(23, 23, NULL, 'Standard', 'NO'),
(24, 24, NULL, 'Premium', 'NO'),
(25, 25, NULL, 'Basic', 'NO'),
(26, 26, NULL, 'Basic', 'NO');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) NOT NULL,
  `person_id` int(11) NOT NULL,
  `username` varchar(50) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `role` varchar(20) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `tokenhash` varchar(512) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=58 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `person_id`, `username`, `password`, `role`, `created`, `modified`, `tokenhash`) VALUES
(35, 1, 'admin', '$2y$10$W4EJplARM6UTAznYCvS50O37iSU.eyc1IUDFPuyxu0kju27md8G6e', 'admin', '2015-05-16 08:08:00', '2015-05-16 08:08:00', ''),
(53, 22, 'ben@ben.com', '$2y$10$6f0RzIJuBtgjLPAWio8u1up5g0Q5.uEeXqEaGkAvdlW/554.NwE6O', 'tenant', '2015-10-26 02:20:17', '2015-10-26 02:20:17', ''),
(54, 23, 'yeeboon23@hotmail.com', '$2y$10$IAgRBSKwFu9QKfOpJOjVzegyWPd8RvXWeNSPS71VZi4io4QHLqRMa', 'tenant', '2015-10-26 02:21:00', '2015-10-26 02:21:00', ''),
(55, 24, 'tmar41@student.monash.edu', '$2y$10$KBrKg3vsxqOGkgLaGURFneFyuKlk6ejd3svsVgrURawvPsZnwn8We', 'tenant', '2015-10-26 02:22:01', '2015-10-26 02:22:01', ''),
(56, 25, 'echen@echen.com', '$2y$10$AikUHRPXkWE3TxxHOeXLTuHW/WpaHQ1s89nm1nMlgr8iPZDTd3lCy', 'tenant', '2015-10-26 02:23:16', '2015-10-26 02:23:16', ''),
(57, 26, 'mlai@hotmail.com', '$2y$10$3Ywat3.6OHsKcH5D3QKYLu9J1NkfprXLYejlJb1gyieAIGC49VXjm', 'tenant', '2015-10-26 02:25:40', '2015-10-26 02:25:40', '');

--
-- Triggers `users`
--
DELIMITER $$
CREATE TRIGGER `updateEmail` AFTER UPDATE ON `users`
 FOR EACH ROW UPDATE people SET email = NEW.username WHERE people.id = NEW.person_id
$$
DELIMITER ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `emergencies`
--
ALTER TABLE `emergencies`
  ADD PRIMARY KEY (`id`),
  ADD KEY `person_id` (`person_id`);

--
-- Indexes for table `lastroomupdate`
--
ALTER TABLE `lastroomupdate`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `leases`
--
ALTER TABLE `leases`
  ADD PRIMARY KEY (`id`),
  ADD KEY `room_id` (`room_id`),
  ADD KEY `student_id` (`student_id`),
  ADD KEY `property_id` (`property_id`),
  ADD KEY `property_id_2` (`property_id`);

--
-- Indexes for table `macaddresses`
--
ALTER TABLE `macaddresses`
  ADD PRIMARY KEY (`id`),
  ADD KEY `person_id` (`person_id`);

--
-- Indexes for table `people`
--
ALTER TABLE `people`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `properties`
--
ALTER TABLE `properties`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `requests`
--
ALTER TABLE `requests`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`person_id`);

--
-- Indexes for table `rooms`
--
ALTER TABLE `rooms`
  ADD PRIMARY KEY (`id`),
  ADD KEY `property_id` (`property_id`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`id`),
  ADD KEY `person_id` (`person_id`),
  ADD KEY `emergency_id` (`emergency_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD KEY `person_id` (`person_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `emergencies`
--
ALTER TABLE `emergencies`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=22;
--
-- AUTO_INCREMENT for table `lastroomupdate`
--
ALTER TABLE `lastroomupdate`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `leases`
--
ALTER TABLE `leases`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=36;
--
-- AUTO_INCREMENT for table `macaddresses`
--
ALTER TABLE `macaddresses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `people`
--
ALTER TABLE `people`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=27;
--
-- AUTO_INCREMENT for table `properties`
--
ALTER TABLE `properties`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `requests`
--
ALTER TABLE `requests`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=71;
--
-- AUTO_INCREMENT for table `rooms`
--
ALTER TABLE `rooms`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=41;
--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=27;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=58;
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
