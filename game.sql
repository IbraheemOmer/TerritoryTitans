-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 09, 2023 at 04:25 PM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `game`
--

-- --------------------------------------------------------

--
-- Table structure for table `board`
--

CREATE TABLE `board` (
  `cell` int(11) NOT NULL,
  `title` varchar(128) NOT NULL,
  `color` varchar(128) NOT NULL,
  `red` int(11) NOT NULL,
  `green` int(11) NOT NULL,
  `yellow` int(11) NOT NULL,
  `occupied` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `board`
--

INSERT INTO `board` (`cell`, `title`, `color`, `red`, `green`, `yellow`, `occupied`) VALUES
(0, '', 'skyblue', 0, 0, 0, 'no'),
(1, '', 'skyblue', 0, 0, 0, 'no'),
(2, '', 'skyblue', 0, 0, 0, 'no'),
(3, '', 'skyblue', 0, 0, 0, 'no'),
(4, '', 'skyblue', 0, 0, 0, 'no'),
(5, '', 'skyblue', 0, 0, 0, 'no'),
(6, '', 'skyblue', 0, 0, 0, 'no'),
(7, '', 'skyblue', 0, 0, 0, 'no'),
(8, '', 'skyblue', 0, 0, 0, 'no'),
(9, '', 'skyblue', 0, 0, 0, 'no'),
(10, '', 'skyblue', 0, 0, 0, 'no'),
(11, '', 'skyblue', 0, 0, 0, 'no'),
(12, '', 'skyblue', 0, 0, 0, 'no'),
(13, '', 'skyblue', 0, 0, 0, 'no'),
(14, '', 'skyblue', 0, 0, 0, 'no'),
(15, '', 'skyblue', 0, 0, 0, 'no'),
(16, '', 'skyblue', 0, 0, 0, 'no'),
(17, '', 'skyblue', 0, 0, 0, 'no'),
(18, '', 'skyblue', 0, 0, 0, 'no'),
(19, '', 'skyblue', 0, 0, 0, 'no'),
(20, '', 'skyblue', 0, 0, 0, 'no'),
(21, '', 'skyblue', 0, 0, 0, 'no'),
(22, '', 'skyblue', 0, 0, 0, 'no'),
(23, '', 'skyblue', 0, 0, 0, 'no'),
(24, '', 'skyblue', 0, 0, 0, 'no'),
(25, '', 'skyblue', 0, 0, 0, 'no'),
(26, '', 'skyblue', 0, 0, 0, 'no'),
(27, '', 'skyblue', 0, 0, 0, 'no'),
(28, '', 'skyblue', 0, 0, 0, 'no'),
(29, '', 'skyblue', 0, 0, 0, 'no'),
(30, '', 'skyblue', 0, 0, 0, 'no'),
(31, 'ibraheem', 'Yellow', 0, 0, 1, 'no'),
(32, '', 'skyblue', 0, 0, 0, 'no'),
(33, 'huziafa', 'Red', 1, 0, 0, 'no'),
(34, '', 'skyblue', 0, 0, 0, 'no'),
(35, 'ibraheem', 'Yellow', 0, 0, 1, 'no'),
(36, '', 'skyblue', 0, 0, 0, 'no'),
(37, '', 'skyblue', 0, 0, 0, 'no'),
(38, '', 'skyblue', 0, 0, 0, 'no'),
(39, '', 'skyblue', 0, 0, 0, 'no'),
(40, '', 'skyblue', 0, 0, 0, 'no'),
(41, '', 'skyblue', 0, 0, 0, 'no'),
(42, '', 'skyblue', 0, 0, 0, 'no'),
(43, '', 'skyblue', 0, 0, 0, 'no'),
(44, '', 'skyblue', 0, 0, 0, 'no'),
(45, '', 'skyblue', 0, 0, 0, 'no'),
(46, '', 'skyblue', 0, 0, 0, 'no'),
(47, '', 'skyblue', 0, 0, 0, 'no'),
(48, '', 'skyblue', 0, 0, 0, 'no'),
(49, '', 'skyblue', 0, 0, 0, 'no'),
(50, '', 'skyblue', 0, 0, 0, 'no'),
(51, 'huziafa', 'Red', 1, 0, 0, 'no'),
(52, '', 'skyblue', 0, 0, 0, 'no'),
(53, 'huziafa', 'Red', 1, 0, 0, 'no'),
(54, '', 'skyblue', 0, 0, 0, 'no'),
(55, 'huziafa', 'Red', 1, 0, 0, 'no'),
(56, '', 'skyblue', 0, 0, 0, 'no'),
(57, '', 'skyblue', 0, 0, 0, 'no'),
(58, '', 'skyblue', 0, 0, 0, 'no'),
(59, '', 'skyblue', 0, 0, 0, 'no'),
(60, '', 'skyblue', 0, 0, 0, 'no'),
(61, '', 'skyblue', 0, 0, 0, 'no'),
(62, '', 'skyblue', 0, 0, 0, 'no'),
(63, '', 'skyblue', 0, 0, 0, 'no'),
(64, '', 'skyblue', 0, 0, 0, 'no'),
(65, '', 'skyblue', 0, 0, 0, 'no'),
(66, '', 'skyblue', 0, 0, 0, 'no'),
(67, '', 'skyblue', 0, 0, 0, 'no'),
(68, '', 'skyblue', 0, 0, 0, 'no'),
(69, '', 'skyblue', 0, 0, 0, 'no'),
(70, '', 'skyblue', 0, 0, 0, 'no'),
(71, 'ibraheem', 'Yellow', 0, 0, 1, 'no'),
(72, '', 'skyblue', 0, 0, 0, 'no'),
(73, 'huziafa', 'Red', 1, 0, 0, 'no'),
(74, '', 'skyblue', 0, 0, 0, 'no'),
(75, 'ibraheem', 'Yellow', 0, 0, 1, 'no'),
(76, '', 'skyblue', 0, 0, 0, 'no'),
(77, '', 'skyblue', 0, 0, 0, 'no'),
(78, '', 'skyblue', 0, 0, 0, 'no'),
(79, '', 'skyblue', 0, 0, 0, 'no'),
(80, '', 'skyblue', 0, 0, 0, 'no'),
(81, '', 'skyblue', 0, 0, 0, 'no'),
(82, '', 'skyblue', 0, 0, 0, 'no'),
(83, '', 'skyblue', 0, 0, 0, 'no'),
(84, '', 'skyblue', 0, 0, 0, 'no'),
(85, '', 'skyblue', 0, 0, 0, 'no'),
(86, '', 'skyblue', 0, 0, 0, 'no'),
(87, '', 'skyblue', 0, 0, 0, 'no'),
(88, '', 'skyblue', 0, 0, 0, 'no'),
(89, '', 'skyblue', 0, 0, 0, 'no'),
(90, '', 'skyblue', 0, 0, 0, 'no'),
(91, '', 'skyblue', 0, 0, 0, 'no'),
(92, '', 'skyblue', 0, 0, 0, 'no'),
(93, '', 'skyblue', 0, 0, 0, 'no'),
(94, '', 'skyblue', 0, 0, 0, 'no'),
(95, '', 'skyblue', 0, 0, 0, 'no'),
(96, '', 'skyblue', 0, 0, 0, 'no'),
(97, '', 'skyblue', 0, 0, 0, 'no'),
(98, '', 'skyblue', 0, 0, 0, 'no'),
(99, '', 'skyblue', 0, 0, 0, 'no');

-- --------------------------------------------------------

--
-- Table structure for table `chat`
--

CREATE TABLE `chat` (
  `username` varchar(128) NOT NULL,
  `team` varchar(128) NOT NULL,
  `message` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `chat`
--

INSERT INTO `chat` (`username`, `team`, `message`) VALUES
('ibraheem', 'Yellow', 'hello everyone!'),
('huziafa', 'Red', 'hey ibraheem!'),
('ibraheem', 'Yellow', 'I WON!'),
('huziafa', 'Red', 'im going offline');

-- --------------------------------------------------------

--
-- Table structure for table `user_details`
--

CREATE TABLE `user_details` (
  `username` varchar(128) NOT NULL,
  `password` varchar(128) NOT NULL,
  `team` varchar(128) NOT NULL,
  `location` int(11) NOT NULL,
  `status` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_details`
--

INSERT INTO `user_details` (`username`, `password`, `team`, `location`, `status`) VALUES
('ibraheem', 'omer', 'Yellow', 35, 'online'),
('huziafa', 'ejaz', 'Red', 73, 'offline');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
