-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 31, 2017 at 06:13 PM
-- Server version: 5.7.14
-- PHP Version: 5.6.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `slack`
--
CREATE DATABASE IF NOT EXISTS `slack` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `slack`;

-- --------------------------------------------------------

--
-- Table structure for table `public_channels`
--

DROP TABLE IF EXISTS `public_channels`;
CREATE TABLE `public_channels` (
  `id` int(20) NOT NULL,
  `p_channel` varchar(100) NOT NULL,
  `invitor` varchar(100) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `public_channels`
--

INSERT INTO `public_channels` (`id`, `p_channel`, `invitor`) VALUES
(1, 'workout', 'Tom Mater'),
(2, 'crossfit', 'Tom Mater'),
(3, 'test2', 'Akshay'),
(4, 'nutrition', 'Tom Mater'),
(5, 'test4', 'Doc Hudson');

-- --------------------------------------------------------

--
-- Table structure for table `reactions`
--

DROP TABLE IF EXISTS `reactions`;
CREATE TABLE `reactions` (
  `mess_id` int(40) NOT NULL,
  `user_email` varchar(200) NOT NULL,
  `thumbsup` int(40) NOT NULL DEFAULT '0',
  `thumbsdown` int(40) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `reactions`
--

INSERT INTO `reactions` (`mess_id`, `user_email`, `thumbsup`, `thumbsdown`) VALUES
(63, '', 0, 0),
(64, '', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `unique_channel`
--

DROP TABLE IF EXISTS `unique_channel`;
CREATE TABLE `unique_channel` (
  `id` int(20) NOT NULL,
  `channels1` varchar(200) NOT NULL,
  `users_email` varchar(200) NOT NULL,
  `invitor` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `unique_channel`
--

INSERT INTO `unique_channel` (`id`, `channels1`, `users_email`, `invitor`) VALUES
(7, 'test3', 'chinga@cars.com', 'Finn McMissile'),
(8, 'test3', 'hornet@rsprings.gov', 'Finn McMissile'),
(9, 'test3', 'hrishi.gadkari94@gmail.com', 'Finn McMissile'),
(10, 'test3', 'kachow@rusteze.com', 'Finn McMissile'),
(11, 'test3', 'mater@rsprings.gov', 'Finn McMissile'),
(24, 'nutrition', 'a@1.com', 'Tom Mater'),
(25, 'test4', 'a@1.com', 'Doc Hudson'),
(26, 'test4', 'chinga@cars.com', 'Doc Hudson'),
(27, 'test4', 'hrishi.gadkari94@gmail.com', 'Doc Hudson'),
(28, 'test4', 'kachow@rusteze.com', 'Doc Hudson'),
(29, 'test4', 'm@gmail.com', 'Doc Hudson'),
(30, 'test4', 'mater@rsprings.gov', 'Doc Hudson'),
(32, 'test4', 'topsecret@agent.org', 'Doc Hudson'),
(34, 'privatechannel', 'topsecret@agent.org', 'Doc Hudson');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` int(20) NOT NULL,
  `workspace` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `workspace`) VALUES
(1, 'oducs518f17');

-- --------------------------------------------------------

--
-- Table structure for table `users_channel`
--

DROP TABLE IF EXISTS `users_channel`;
CREATE TABLE `users_channel` (
  `id` int(20) NOT NULL DEFAULT '0',
  `ch_id` int(20) NOT NULL,
  `channels` varchar(100) NOT NULL,
  `user_email` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users_channel`
--

INSERT INTO `users_channel` (`id`, `ch_id`, `channels`, `user_email`) VALUES
(1, 1, 'general', 'mater@rsprings.gov'),
(1, 2, 'workout', 'mater@rsprings.gov'),
(1, 3, 'nutrition', 'mater@rsprings.gov'),
(1, 4, 'crossfit', 'mater@rsprings.gov'),
(1, 19, 'general', 'chinga@cars.com'),
(1, 20, 'general', 'hornet@rsprings.gov'),
(1, 21, 'general', 'hrishi.gadkari94@gmail.com'),
(1, 22, 'general', 'kachow@rusteze.com'),
(1, 23, 'general', 'porsche@rsprings.gov'),
(1, 24, 'general', 'topsecret@agent.org'),
(1, 25, 'test3', 'topsecret@agent.org'),
(1, 28, 'general', 'm@gmail.com'),
(1, 29, 'workout', 'chinga@cars.com'),
(1, 30, 'workout', 'hornet@rsprings.gov'),
(1, 31, 'workout', 'hrishi.gadkari94@gmail.com'),
(1, 32, 'workout', 'kachow@rusteze.com'),
(1, 33, 'workout', 'porsche@rsprings.gov'),
(1, 34, 'workout', 'topsecret@agent.org'),
(1, 35, 'nutrition', 'chinga@cars.com'),
(1, 36, 'nutrition', 'hornet@rsprings.gov'),
(1, 37, 'nutrition', 'hrishi.gadkari94@gmail.com'),
(1, 38, 'nutrition', 'kachow@rusteze.com'),
(1, 39, 'nutrition', 'porsche@rsprings.gov'),
(1, 40, 'nutrition', 'topsecret@agent.org'),
(1, 41, 'crossfit', 'chinga@cars.com'),
(1, 42, 'crossfit', 'hornet@rsprings.gov'),
(1, 43, 'crossfit', 'hrishi.gadkari94@gmail.com'),
(1, 44, 'crossfit', 'kachow@rusteze.com'),
(1, 45, 'crossfit', 'topsecret@agent.org'),
(1, 46, 'crossfit', 'porsche@rsprings.gov'),
(1, 47, 'workout', 'm@gmail.com'),
(1, 48, 'test3', 'porsche@rsprings.gov'),
(1, 49, 'general', 'a@1.com'),
(1, 50, 'workout', 'a@1.com'),
(1, 51, 'crossfit', 'a@1.com'),
(1, 52, 'test2', 'a@1.com'),
(1, 53, 'test4', 'hornet@rsprings.gov'),
(1, 54, 'privatechannel', 'hornet@rsprings.gov'),
(1, 55, 'privatechannel', 'porsche@rsprings.gov'),
(1, 58, 'test4', 'porsche@rsprings.gov');

-- --------------------------------------------------------

--
-- Table structure for table `users_info`
--

DROP TABLE IF EXISTS `users_info`;
CREATE TABLE `users_info` (
  `user_id` int(20) NOT NULL,
  `id` int(20) NOT NULL DEFAULT '0',
  `user_email` varchar(100) NOT NULL DEFAULT '',
  `user_pass` varchar(100) NOT NULL,
  `user_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users_info`
--

INSERT INTO `users_info` (`user_id`, `id`, `user_email`, `user_pass`, `user_name`) VALUES
(1, 1, 'mater@rsprings.gov', '@mater', 'Tom Mater'),
(2, 1, 'porsche@rsprings.gov', '@sally', 'Sally Carrera'),
(3, 1, 'hornet@rsprings.gov', '@doc', 'Doc Hudson'),
(4, 1, 'topsecret@agent.org', '@mcmissile', 'Finn McMissile'),
(5, 1, 'kachow@rusteze.com', '@mcqueen', 'Lightning McQueen'),
(6, 1, 'chinga@cars.com', '@chick', 'Chick Hicks'),
(7, 1, 'hrishi.gadkari94@gmail.com', '123', 'Hrishi'),
(10, 1, 'm@gmail.com', '123', 'Mehek Bhagat'),
(11, 1, 'a@1.com', '1', 'Akshay');

-- --------------------------------------------------------

--
-- Table structure for table `users_message`
--

DROP TABLE IF EXISTS `users_message`;
CREATE TABLE `users_message` (
  `mess_id` int(20) NOT NULL,
  `channel_name` varchar(100) NOT NULL,
  `messages` varchar(5000) NOT NULL,
  `user_name` varchar(100) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users_message`
--

INSERT INTO `users_message` (`mess_id`, `channel_name`, `messages`, `user_name`, `date`) VALUES
(63, 'general', 'hello', 'Tom Mater', '2017-10-31 10:13:30'),
(64, 'general', 'yes', 'Tom Mater', '2017-10-31 10:13:30'),
(65, 'test4', 'hello', 'Doc Hudson', '2017-10-31 14:19:31'),
(66, 'privatechannel', 'hello', 'Sally Carrera', '2017-10-31 16:07:50'),
(67, 'test4', '', 'Sally Carrera', '2017-10-31 17:14:21');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `public_channels`
--
ALTER TABLE `public_channels`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reactions`
--
ALTER TABLE `reactions`
  ADD KEY `mess_id` (`mess_id`);

--
-- Indexes for table `unique_channel`
--
ALTER TABLE `unique_channel`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users_channel`
--
ALTER TABLE `users_channel`
  ADD PRIMARY KEY (`ch_id`),
  ADD KEY `id` (`id`),
  ADD KEY `user_email` (`user_email`);

--
-- Indexes for table `users_info`
--
ALTER TABLE `users_info`
  ADD PRIMARY KEY (`user_id`),
  ADD KEY `id` (`id`),
  ADD KEY `user_email` (`user_email`);

--
-- Indexes for table `users_message`
--
ALTER TABLE `users_message`
  ADD PRIMARY KEY (`mess_id`),
  ADD KEY `mess_id` (`mess_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `public_channels`
--
ALTER TABLE `public_channels`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `unique_channel`
--
ALTER TABLE `unique_channel`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `users_channel`
--
ALTER TABLE `users_channel`
  MODIFY `ch_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;
--
-- AUTO_INCREMENT for table `users_info`
--
ALTER TABLE `users_info`
  MODIFY `user_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `users_message`
--
ALTER TABLE `users_message`
  MODIFY `mess_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=68;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `reactions`
--
ALTER TABLE `reactions`
  ADD CONSTRAINT `reactions_ibfk_1` FOREIGN KEY (`mess_id`) REFERENCES `users_message` (`mess_id`);

--
-- Constraints for table `users_channel`
--
ALTER TABLE `users_channel`
  ADD CONSTRAINT `users_channel_ibfk_1` FOREIGN KEY (`id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `users_channel_ibfk_3` FOREIGN KEY (`user_email`) REFERENCES `users_info` (`user_email`);

--
-- Constraints for table `users_info`
--
ALTER TABLE `users_info`
  ADD CONSTRAINT `users_info_ibfk_1` FOREIGN KEY (`id`) REFERENCES `users` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
