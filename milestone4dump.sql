-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 21, 2017 at 07:35 PM
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
-- Table structure for table `archive`
--

DROP TABLE IF EXISTS `archive`;
CREATE TABLE `archive` (
  `arch_id` int(100) NOT NULL,
  `archive_channel` varchar(200) DEFAULT NULL,
  `channels` varchar(500) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `archive`
--

INSERT INTO `archive` (`arch_id`, `archive_channel`, `channels`) VALUES
(1, 'unarchive', 'general'),
(2, 'archive', 'general'),
(3, 'unarchive', 'general'),
(4, 'archive', 'general'),
(5, 'unarchive', 'general'),
(6, 'archive', 'general'),
(7, 'unarchive', 'general'),
(8, 'archive', 'nutrition');

-- --------------------------------------------------------

--
-- Table structure for table `private_channel`
--

DROP TABLE IF EXISTS `private_channel`;
CREATE TABLE `private_channel` (
  `priv_id` int(200) NOT NULL,
  `channel_name` varchar(300) NOT NULL,
  `user_email` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `private_channel`
--

INSERT INTO `private_channel` (`priv_id`, `channel_name`, `user_email`) VALUES
(1, 'private', 'hornet@rsprings.gov'),
(2, 'privatetest', 'topsecret@agent.org');

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
(9, 'workouts', 'Admin'),
(8, 'nutrition', 'Admin');

-- --------------------------------------------------------

--
-- Table structure for table `reactions`
--

DROP TABLE IF EXISTS `reactions`;
CREATE TABLE `reactions` (
  `reac_id` int(20) NOT NULL,
  `mess_id` int(40) NOT NULL,
  `user_email` varchar(200) NOT NULL,
  `thumbsup` int(40) NOT NULL DEFAULT '0',
  `thumbsdown` int(40) NOT NULL DEFAULT '0',
  `reply_id` int(200) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `reactions`
--

INSERT INTO `reactions` (`reac_id`, `mess_id`, `user_email`, `thumbsup`, `thumbsdown`, `reply_id`) VALUES
(96, 63, 'hornet@rsprings.gov', 1, 0, 0),
(97, 64, 'hornet@rsprings.gov', 1, 0, 0),
(98, 68, 'hornet@rsprings.gov', 1, 0, 0),
(99, 76, 'hornet@rsprings.gov', 1, 0, 3),
(100, 78, 'hornet@rsprings.gov', 1, 0, 0),
(101, 69, 'hornet@rsprings.gov', 1, 0, 0),
(102, 70, 'hornet@rsprings.gov', 0, -1, 0),
(103, 76, 'Sbk@gmail.com', 0, -1, 5),
(104, 79, 'Sbk@gmail.com', 1, 0, 0),
(105, 87, 'porsche@rsprings.gov', 1, 0, 0),
(106, 90, 'porsche@rsprings.gov', 1, 0, 0),
(107, 92, 'kachow@rusteze.com', 1, 0, 0),
(108, 69, 'kachow@rusteze.com', 1, 0, 10),
(109, 70, 'kachow@rusteze.com', 1, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `reply_message`
--

DROP TABLE IF EXISTS `reply_message`;
CREATE TABLE `reply_message` (
  `reply_id` int(40) NOT NULL,
  `mess_id` int(40) NOT NULL,
  `channel_name` varchar(300) NOT NULL,
  `message` varchar(6000) NOT NULL,
  `user_email` varchar(200) NOT NULL,
  `user_name` varchar(300) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `reply_message`
--

INSERT INTO `reply_message` (`reply_id`, `mess_id`, `channel_name`, `message`, `user_email`, `user_name`, `date`) VALUES
(1, 63, 'general', 'inserted', 'hornet@rsprings.gov', 'Doc Hudson', '2017-11-09 06:05:24'),
(2, 64, 'general', 'heyya', 'hornet@rsprings.gov', 'Doc Hudson', '2017-11-13 00:51:59'),
(3, 76, 'general', 'align divs', 'hornet@rsprings.gov', 'Doc Hudson', '2017-11-13 01:18:09'),
(4, 63, 'general', 'great', 'hornet@rsprings.gov', 'Doc Hudson', '2017-11-13 01:28:43'),
(5, 76, 'general', 'cool', 'hornet@rsprings.gov', 'Doc Hudson', '2017-11-13 01:29:19'),
(6, 69, 'general', 'ok', 'hornet@rsprings.gov', 'Doc Hudson', '2017-11-13 01:58:17'),
(7, 70, 'general', 'redirect', 'hornet@rsprings.gov', 'Doc Hudson', '2017-11-13 02:06:05'),
(9, 68, 'general', 'yes', 'hornet@rsprings.gov', 'Doc Hudson', '2017-11-13 02:21:53'),
(10, 69, 'general', 'dive move', 'hornet@rsprings.gov', 'Doc Hudson', '2017-11-13 07:47:18'),
(12, 63, 'general', 'move', 'hornet@rsprings.gov', 'Doc Hudson', '2017-11-13 07:49:18');

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
(101, 'nutrition', 'andy@gmail.com', 'Admin'),
(102, 'nutrition', 'chinga@cars.com', 'Admin'),
(104, 'nutrition', 'hrishi.gadkari94@gmail.com', 'Admin'),
(106, 'nutrition', 'krish@gmail.com', 'Admin'),
(107, 'nutrition', 'mater@rsprings.gov', 'Admin'),
(108, 'nutrition', 'porsche@rsprings.gov', 'Admin'),
(109, 'nutrition', 'Sbk@gmail.com', 'Admin'),
(110, 'nutrition', 'topsecret@agent.org', 'Admin'),
(111, 'workouts', 'andy@gmail.com', 'Admin'),
(112, 'workouts', 'chinga@cars.com', 'Admin'),
(113, 'workouts', 'hornet@rsprings.gov', 'Admin'),
(114, 'workouts', 'hrishi.gadkari94@gmail.com', 'Admin'),
(116, 'workouts', 'krish@gmail.com', 'Admin'),
(117, 'workouts', 'mater@rsprings.gov', 'Admin'),
(118, 'workouts', 'porsche@rsprings.gov', 'Admin'),
(119, 'workouts', 'Sbk@gmail.com', 'Admin'),
(120, 'workouts', 'topsecret@agent.org', 'Admin'),
(121, 'private', 'porsche@rsprings.gov', 'Doc Hudson'),
(122, 'privatetest', 'mater@rsprings.gov', 'Finn McMissile'),
(123, 'privatetest', 'kachow@rusteze.com', 'Finn McMissile');

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
(1, 19, 'general', 'chinga@cars.com'),
(1, 20, 'general', 'hornet@rsprings.gov'),
(1, 21, 'general', 'hrishi.gadkari94@gmail.com'),
(1, 22, 'general', 'kachow@rusteze.com'),
(1, 23, 'general', 'porsche@rsprings.gov'),
(1, 24, 'general', 'topsecret@agent.org'),
(1, 63, 'general', 'krish@gmail.com'),
(1, 66, 'general', 'Sbk@gmail.com'),
(1, 67, 'general', 'admin@super.com'),
(1, 68, 'general', 'andy@gmail.com'),
(1, 69, 'nutrition', 'admin@super.com'),
(1, 70, 'workouts', 'admin@super.com'),
(1, 71, 'nutrition', 'hornet@rsprings.gov'),
(1, 72, 'private', 'hornet@rsprings.gov'),
(1, 73, 'privatetest', 'topsecret@agent.org'),
(1, 74, 'nutrition', 'kachow@rusteze.com'),
(1, 75, 'workouts', 'kachow@rusteze.com');

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
  `user_name` varchar(100) NOT NULL,
  `user_pic` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users_info`
--

INSERT INTO `users_info` (`user_id`, `id`, `user_email`, `user_pass`, `user_name`, `user_pic`) VALUES
(1, 1, 'mater@rsprings.gov', '@mater', 'Tom Mater', '681898.jpeg'),
(2, 1, 'porsche@rsprings.gov', '@sally', 'Sally Carrera', 'user-image.jpg'),
(3, 1, 'hornet@rsprings.gov', '@doc', 'Doc Hudson', 'user-image.jpg'),
(4, 1, 'topsecret@agent.org', '@mcmissile', 'Finn McMissile', 'user-image.jpg'),
(5, 1, 'kachow@rusteze.com', '@mcqueen', 'Lightning McQueen', 'user-image.jpg'),
(6, 1, 'chinga@cars.com', '@chick', 'Chick Hicks', 'user-image.jpg'),
(7, 1, 'hrishi.gadkari94@gmail.com', '123', 'Hrishi', 'user-image.jpg'),
(16, 1, 'krish@gmail.com', '123', 'krishi', 'user-image.jpg'),
(19, 1, 'Sbk@gmail.com', 'user123', 'Shahbaz Khan', '133740.jpg'),
(20, 1, 'admin@super.com', 'super', 'Admin', 'user-image.jpg'),
(21, 1, 'andy@gmail.com', 'user', 'Andy Murray', 'user-image.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `users_message`
--

DROP TABLE IF EXISTS `users_message`;
CREATE TABLE `users_message` (
  `mess_id` int(20) NOT NULL,
  `channel_name` varchar(100) NOT NULL,
  `messages` varchar(5000) DEFAULT NULL,
  `user_name` varchar(100) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `post_img` varchar(1000) DEFAULT NULL,
  `format_code` varchar(8000) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users_message`
--

INSERT INTO `users_message` (`mess_id`, `channel_name`, `messages`, `user_name`, `date`, `post_img`, `format_code`) VALUES
(63, 'general', 'hello', 'Tom Mater', '2017-10-31 10:13:30', NULL, NULL),
(64, 'general', 'yes', 'Tom Mater', '2017-10-31 10:13:30', NULL, NULL),
(68, 'general', 'hello guys!', 'krishi', '2017-10-31 19:46:34', NULL, NULL),
(69, 'general', 'hey', 'krishi', '2017-10-31 19:48:24', NULL, NULL),
(70, 'general', 'hey', 'krishi', '2017-10-31 19:50:37', NULL, NULL),
(76, 'general', 'its working', 'Doc Hudson', '2017-11-09 05:19:41', NULL, NULL),
(79, 'general', 'not working', 'Shahbaz Khan', '2017-11-14 19:36:16', NULL, NULL),
(87, 'general', NULL, 'Tom Mater', '2017-11-19 03:19:23', '47187.jpeg', NULL),
(90, 'general', NULL, 'Tom Mater', '2017-11-19 04:35:24', NULL, '&lt;!DOCTYPE html&gt;\r\n&lt;html lang=&quot;en&quot;&gt;\r\n&lt;head&gt;\r\n  &lt;title&gt;Bootstrap Example&lt;/title&gt;\r\n  &lt;meta charset=&quot;utf-8&quot;&gt;\r\n  &lt;meta name=&quot;viewport&quot; content=&quot;width=device-width, initial-scale=1&quot;&gt;\r\n  &lt;link rel=&quot;stylesheet&quot; href=&quot;https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css&quot;&gt;\r\n  &lt;script src=&quot;https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js&quot;&gt;&lt;/script&gt;\r\n  &lt;script src=&quot;https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js&quot;&gt;&lt;/script&gt;\r\n&lt;/head&gt;\r\n&lt;body&gt;\r\n\r\n&lt;div class=&quot;container&quot;&gt;\r\n  &lt;h2&gt;Form control: textarea&lt;/h2&gt;\r\n  &lt;p&gt;The form below contains a textarea for comments:&lt;/p&gt;\r\n  &lt;form&gt;\r\n    &lt;div class=&quot;form-group&quot;&gt;\r\n      &lt;label for=&quot;comment&quot;&gt;Comment:&lt;/label&gt;\r\n      &lt;textarea class=&quot;form-control&quot; rows=&quot;5&quot; id=&quot;comment&quot;&gt;&lt;/textarea&gt;\r\n    &lt;/div&gt;\r\n  &lt;/form&gt;\r\n&lt;/div&gt;\r\n\r\n&lt;/body&gt;\r\n&lt;/html&gt;'),
(92, 'nutrition', 'Hello Everybody!!', 'Lightning McQueen', '2017-11-21 16:05:51', NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `archive`
--
ALTER TABLE `archive`
  ADD PRIMARY KEY (`arch_id`);

--
-- Indexes for table `private_channel`
--
ALTER TABLE `private_channel`
  ADD PRIMARY KEY (`priv_id`);

--
-- Indexes for table `public_channels`
--
ALTER TABLE `public_channels`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reactions`
--
ALTER TABLE `reactions`
  ADD PRIMARY KEY (`reac_id`),
  ADD KEY `mess_id` (`mess_id`);

--
-- Indexes for table `reply_message`
--
ALTER TABLE `reply_message`
  ADD PRIMARY KEY (`reply_id`),
  ADD KEY `mess_id` (`mess_id`),
  ADD KEY `reply_id` (`reply_id`),
  ADD KEY `reply_id_2` (`reply_id`);

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
-- AUTO_INCREMENT for table `archive`
--
ALTER TABLE `archive`
  MODIFY `arch_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `private_channel`
--
ALTER TABLE `private_channel`
  MODIFY `priv_id` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `public_channels`
--
ALTER TABLE `public_channels`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `reactions`
--
ALTER TABLE `reactions`
  MODIFY `reac_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=110;
--
-- AUTO_INCREMENT for table `reply_message`
--
ALTER TABLE `reply_message`
  MODIFY `reply_id` int(40) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `unique_channel`
--
ALTER TABLE `unique_channel`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=124;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `users_channel`
--
ALTER TABLE `users_channel`
  MODIFY `ch_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=76;
--
-- AUTO_INCREMENT for table `users_info`
--
ALTER TABLE `users_info`
  MODIFY `user_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
--
-- AUTO_INCREMENT for table `users_message`
--
ALTER TABLE `users_message`
  MODIFY `mess_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=93;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `users_channel`
--
ALTER TABLE `users_channel`
  ADD CONSTRAINT `users_channel_ibfk_1` FOREIGN KEY (`id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `users_channel_ibfk_3` FOREIGN KEY (`user_email`) REFERENCES `users_info` (`user_email`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `users_info`
--
ALTER TABLE `users_info`
  ADD CONSTRAINT `users_info_ibfk_1` FOREIGN KEY (`id`) REFERENCES `users` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
