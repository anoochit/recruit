-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Apr 06, 2017 at 05:06 PM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `recruit`
--
CREATE DATABASE IF NOT EXISTS `recruit` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `recruit`;

-- --------------------------------------------------------

--
-- Table structure for table `judge`
--

CREATE TABLE `judge` (
  `id` int(11) UNSIGNED NOT NULL,
  `login` text NOT NULL,
  `password` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `judge`
--

INSERT INTO `judge` (`id`, `login`, `password`) VALUES
(1, 'judge1', '81dc9bdb52d04dc20036dbd8313ed055'),
(2, 'judge2', '7e83cb1b4980caa9ba679e1256330fc0'),
(3, 'judge3', '35c229e052204ccf27b6ddb966944447');

-- --------------------------------------------------------

--
-- Table structure for table `member`
--

CREATE TABLE `member` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `member`
--

INSERT INTO `member` (`id`, `name`) VALUES
(1, 'นายสวีดัด สวัสดี'),
(2, 'name 2'),
(3, 'name 3'),
(4, 'name 4');

-- --------------------------------------------------------

--
-- Table structure for table `member_position`
--

CREATE TABLE `member_position` (
  `id` int(11) NOT NULL,
  `member_id` int(11) NOT NULL,
  `pos_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `member_position`
--

INSERT INTO `member_position` (`id`, `member_id`, `pos_id`) VALUES
(19, 1, 1),
(20, 1, 2),
(21, 1, 3),
(22, 2, 3),
(23, 2, 2),
(24, 2, 1);

-- --------------------------------------------------------

--
-- Table structure for table `member_position_score`
--

CREATE TABLE `member_position_score` (
  `judge_id` int(11) NOT NULL,
  `mem_id` int(11) NOT NULL,
  `mem_pos_id` int(11) NOT NULL,
  `score` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `position`
--

CREATE TABLE `position` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` text NOT NULL,
  `total` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `position`
--

INSERT INTO `position` (`id`, `name`, `total`) VALUES
(1, 'job position 1', 3),
(2, 'job position 2', 2),
(3, 'job position 3', 4);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `judge`
--
ALTER TABLE `judge`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `member`
--
ALTER TABLE `member`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `member_position`
--
ALTER TABLE `member_position`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `member_position_score`
--
ALTER TABLE `member_position_score`
  ADD PRIMARY KEY (`judge_id`,`mem_id`,`mem_pos_id`);

--
-- Indexes for table `position`
--
ALTER TABLE `position`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `judge`
--
ALTER TABLE `judge`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `member`
--
ALTER TABLE `member`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `member_position`
--
ALTER TABLE `member_position`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
--
-- AUTO_INCREMENT for table `position`
--
ALTER TABLE `position`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
