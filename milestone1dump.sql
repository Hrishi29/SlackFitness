-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 17, 2017 at 03:39 PM
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

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

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

CREATE TABLE `users_channel` (
  `id` int(20) NOT NULL DEFAULT '0',
  `channels` varchar(100) NOT NULL,
  `ch_id` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users_channel`
--

INSERT INTO `users_channel` (`id`, `channels`, `ch_id`) VALUES
(1, 'workouts', 1),
(1, 'nutrition', 2),
(1, 'crossfit', 3),
(1, 'general', 4);

-- --------------------------------------------------------

--
-- Table structure for table `users_info`
--

CREATE TABLE `users_info` (
  `id` int(20) NOT NULL DEFAULT '0',
  `user_email` varchar(100) NOT NULL DEFAULT '',
  `user_pass` varchar(100) NOT NULL,
  `user_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users_info`
--

INSERT INTO `users_info` (`id`, `user_email`, `user_pass`, `user_name`) VALUES
(1, 'mater@rsprings.gov', '@mater', 'Tom Mater'),
(1, 'porsche@rsprings.gov', '@sally', 'Sally Carrera'),
(1, 'hornet@rsprings.gov', '@doc', 'Doc Hudson'),
(1, 'topsecret@agent.org', '@mcmissile', 'Finn McMissile'),
(1, 'kachow@rusteze.com', '@mcqueen', 'Lightning McQueen'),
(1, 'chinga@cars.com', '@chick', 'Chick Hicks');

-- --------------------------------------------------------

--
-- Table structure for table `users_message`
--

CREATE TABLE `users_message` (
  `mess_id` int(20) NOT NULL,
  `ch_id` int(20) NOT NULL DEFAULT '0',
  `messages` varchar(100) NOT NULL,
  `user_name` varchar(100) NOT NULL,
  `date` timestamp(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users_message`
--

INSERT INTO `users_message` (`mess_id`, `ch_id`, `messages`, `user_name`, `date`) VALUES
(8, 1, 'hello guys!', 'Tom Mater', '2017-10-17 11:48:43.000000'),
(9, 1, 'hey how are you?', 'Tom Mater', '2017-10-17 12:09:32.000000'),
(17, 1, 'good', 'Tom Mater', '2017-10-17 12:42:01.000000'),
(18, 1, 'cool', 'Tom Mater', '2017-10-17 12:43:03.000000'),
(19, 1, 'can', 'Tom Mater', '2017-10-17 13:06:41.000000'),
(20, 4, 'hello', 'Tom Mater', '2017-10-17 13:07:40.000000'),
(21, 3, 'hey', 'Tom Mater', '2017-10-17 13:18:20.000000'),
(22, 2, 'good!', 'Tom Mater', '2017-10-17 13:23:28.000000'),
(23, 1, 'wassup', 'Finn McMissile', '2017-10-17 14:58:39.000000');

--
-- Indexes for dumped tables
--

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
  ADD KEY `id` (`id`);

--
-- Indexes for table `users_info`
--
ALTER TABLE `users_info`
  ADD KEY `id` (`id`);

--
-- Indexes for table `users_message`
--
ALTER TABLE `users_message`
  ADD PRIMARY KEY (`mess_id`),
  ADD KEY `ch_id` (`ch_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `users_channel`
--
ALTER TABLE `users_channel`
  MODIFY `ch_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `users_message`
--
ALTER TABLE `users_message`
  MODIFY `mess_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `users_channel`
--
ALTER TABLE `users_channel`
  ADD CONSTRAINT `users_channel_ibfk_1` FOREIGN KEY (`id`) REFERENCES `users` (`id`);

--
-- Constraints for table `users_info`
--
ALTER TABLE `users_info`
  ADD CONSTRAINT `users_info_ibfk_1` FOREIGN KEY (`id`) REFERENCES `users` (`id`);

--
-- Constraints for table `users_message`
--
ALTER TABLE `users_message`
  ADD CONSTRAINT `users_message_ibfk_1` FOREIGN KEY (`ch_id`) REFERENCES `users_channel` (`ch_id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
