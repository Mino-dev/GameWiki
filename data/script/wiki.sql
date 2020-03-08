-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 08, 2020 at 09:23 AM
-- Server version: 10.4.10-MariaDB
-- PHP Version: 7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `wiki`
--

-- --------------------------------------------------------

--
-- Table structure for table `content`
--

CREATE TABLE `content` (
  `contentid` int(11) NOT NULL,
  `contentpath` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `content`
--

INSERT INTO `content` (`contentid`, `contentpath`) VALUES
(1, 'data/stat_content/content.json');

-- --------------------------------------------------------

--
-- Table structure for table `updates`
--

CREATE TABLE `updates` (
  `updateid` int(11) NOT NULL,
  `updatepath` varchar(100) NOT NULL,
  `updatetag` int(11) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `uid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `updates`
--

INSERT INTO `updates` (`updateid`, `updatepath`, `updatetag`, `timestamp`, `uid`) VALUES
(7, 'data/dyn_content/content1583653235copy.json', 0, '2020-03-08 07:55:57', 13),
(8, 'data/dyn_content/content1583654206copy.json', 0, '2020-03-08 07:57:11', 13),
(9, 'data/dyn_content/content1583654453copy.json', 0, '2020-03-08 08:01:13', 13),
(10, 'data/dyn_content/content1583654611copy.json', 0, '2020-03-08 08:03:54', 14),
(11, 'data/dyn_content/content1583655295copy.json', 1, '2020-03-08 08:14:55', 13),
(12, 'data/dyn_content/content1583655386copy.json', 1, '2020-03-08 08:16:26', 13);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `uid` int(11) NOT NULL,
  `username` varchar(25) NOT NULL,
  `upassword` varchar(100) NOT NULL,
  `uemail` varchar(100) NOT NULL,
  `utype` tinyint(1) NOT NULL,
  `upfp` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`uid`, `username`, `upassword`, `uemail`, `utype`, `upfp`) VALUES
(12, 'admin', '0192023a7bbd73250516f069df18b500', 'j.vinceeleazar@gmail.com', 0, 'img/profile_image/121583235974a5cc9baac6e007900de8f3a356f0ec28.jpg'),
(13, 'Mino', '5fd81d3d24e26610af25eb22e7565053', 'minotan.ggwp@gmail.com', 1, 'img/profile_image/131583585318eda5a547ebed6f19eff6f4e3689003e8.gif'),
(14, 'test', '098f6bcd4621d373cade4e832627b4f6', 'testing@gmail.com', 1, 'img/default.png');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `content`
--
ALTER TABLE `content`
  ADD PRIMARY KEY (`contentid`);

--
-- Indexes for table `updates`
--
ALTER TABLE `updates`
  ADD PRIMARY KEY (`updateid`),
  ADD KEY `fk_uid` (`uid`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`uid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `content`
--
ALTER TABLE `content`
  MODIFY `contentid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `updates`
--
ALTER TABLE `updates`
  MODIFY `updateid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `uid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `updates`
--
ALTER TABLE `updates`
  ADD CONSTRAINT `fk_uid` FOREIGN KEY (`uid`) REFERENCES `users` (`uid`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
