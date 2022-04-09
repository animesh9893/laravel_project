-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 09, 2022 at 07:34 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 7.4.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `gym_management`
--

-- --------------------------------------------------------

--
-- Table structure for table `device`
--

CREATE TABLE `device` (
  `user_id` int(11) NOT NULL,
  `device_id` int(11) NOT NULL,
  `device_auth_token` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `last_logged` timestamp NULL DEFAULT NULL,
  `name` text DEFAULT NULL,
  `description` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `device`
--

INSERT INTO `device` (`user_id`, `device_id`, `device_auth_token`, `created_at`, `last_logged`, `name`, `description`) VALUES
(1, 5, '5EJjt5UUhGOQ072U5wVKLjDzinpMUzTbi3nA93As', '2022-04-09 07:44:19', '2022-04-09 07:44:19', 'web', 'web device'),
(1, 6, 'OFPXOBpbME2q7pDUKDEo3yu4fZx77qcaG3rWvtrp', '2022-04-09 07:44:31', '2022-04-09 07:44:31', 'mobile', 'phone'),
(1, 7, 'bOYg6Gdy4EVZo8cMPqv9kDuD61zmMshncpSIAOOa', '2022-04-09 07:44:39', '2022-04-09 07:44:39', 'watch', 'watch');

-- --------------------------------------------------------

--
-- Table structure for table `exercise`
--

CREATE TABLE `exercise` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL,
  `device_id` int(11) DEFAULT NULL,
  `user_id` int(11) NOT NULL,
  `started` timestamp NULL DEFAULT NULL,
  `ended` timestamp NULL DEFAULT NULL,
  `count` int(11) DEFAULT NULL,
  `reps` int(11) DEFAULT NULL,
  `weight` text DEFAULT NULL,
  `calorie` int(11) DEFAULT NULL,
  `note` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `exercise`
--

INSERT INTO `exercise` (`id`, `name`, `device_id`, `user_id`, `started`, `ended`, `count`, `reps`, `weight`, `calorie`, `note`) VALUES
(6, 'push ups', 5, 1, '2022-04-09 08:24:12', '2022-04-09 08:24:12', 199, 1, '199', 91238912, 'ladnssldna'),
(7, 'butterfly', 5, 1, '2022-04-09 11:03:59', '2022-04-09 11:03:59', 10, 1001, '120901', 10, 'good workout');

-- --------------------------------------------------------

--
-- Table structure for table `exercise_list`
--

CREATE TABLE `exercise_list` (
  `name` text NOT NULL,
  `description` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `exercise_list`
--

INSERT INTO `exercise_list` (`name`, `description`) VALUES
('butterfly', 'for shoulder'),
('push ups', 'for chest');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `name` text DEFAULT NULL,
  `email` text DEFAULT NULL,
  `mobile` text DEFAULT NULL,
  `password` text NOT NULL,
  `auth_token` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `last_logged` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `name`, `email`, `mobile`, `password`, `auth_token`, `created_at`, `last_logged`) VALUES
(1, 'Animesh Shrivatri', 'animesh.shrivatri2002@gmail.com', '9893295857', 'eyJpdiI6IjJmdC9EVFJETkdHeGorcmN1ZXNmL0E9PSIsInZhbHVlIjoiekhCNTRxalpPMmVDencyb1dXZjV5Zz09IiwibWFjIjoiMWQ1MGYxNjFmMjlmY2I3OGE4ZDU1OTNlYWYxZjkxMWM4NmI2ZmU0YjA0OTUwN2MyNDAyNzY4OTYxZTY2NTM2NCIsInRhZyI6IiJ9', 'eRcSCoIw9BsQae0GO3fQyW25V8MyKPinbjaBvya0', '2022-04-08 11:21:52', '2022-04-09 11:11:08'),
(2, 'Anuj Shrivatri', 'ashok.shrivatri90@gmail.com', '9009039267', 'eyJpdiI6IjY4cE5tMDRvODh3REFVZDY1T3ZXSEE9PSIsInZhbHVlIjoic1Z2SlZjMjN0QkdpV0hvbFpnUUdwUT09IiwibWFjIjoiYTdhMTE2NjYwYjRhNDhmMTg4YTk5MDFiZGQ0NDVkNGNkODk2NWI4MGM1NTk0MmZiYTEyMTM5ZGEyODAwYWM4OCIsInRhZyI6IiJ9', '0EJstEBwRQNTEIvcImFBdpmA1E2ZUt3eBuCR7kYR', '2022-04-09 11:08:56', '2022-04-09 11:08:56');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `device`
--
ALTER TABLE `device`
  ADD PRIMARY KEY (`device_id`),
  ADD UNIQUE KEY `device_auth_token` (`device_auth_token`) USING HASH;

--
-- Indexes for table `exercise`
--
ALTER TABLE `exercise`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `exercise_list`
--
ALTER TABLE `exercise_list`
  ADD PRIMARY KEY (`name`(100));

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`) USING HASH;

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `device`
--
ALTER TABLE `device`
  MODIFY `device_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `exercise`
--
ALTER TABLE `exercise`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
