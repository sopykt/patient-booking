-- phpMyAdmin SQL Dump
-- version 4.3.12
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Apr 05, 2015 at 04:09 PM
-- Server version: 5.5.42-MariaDB-log
-- PHP Version: 5.5.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `a6`
--

-- --------------------------------------------------------

--
-- Table structure for table `a6-employee`
--

CREATE TABLE IF NOT EXISTS `a6-employee` (
  `id` int(11) NOT NULL,
  `username` varchar(32) CHARACTER SET utf16 COLLATE utf16_unicode_ci NOT NULL,
  `password` varchar(64) CHARACTER SET utf16 COLLATE utf16_unicode_ci NOT NULL,
  `first` varchar(32) CHARACTER SET utf16 COLLATE utf16_unicode_ci NOT NULL,
  `last` varchar(64) CHARACTER SET utf16 COLLATE utf16_unicode_ci NOT NULL,
  `addr` varchar(128) CHARACTER SET utf16 COLLATE utf16_unicode_ci NOT NULL,
  `phone` varchar(16) CHARACTER SET utf16 COLLATE utf16_unicode_ci NOT NULL,
  `rate` float NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `a6-employee`
--

INSERT INTO `a6-employee` (`id`, `username`, `password`, `first`, `last`, `addr`, `phone`, `rate`) VALUES
(1, 'johnny', 'john123', 'Johnny', 'Beegood', '123 Goodenough Way Truro NS', '902-543-5432', 60),
(2, 'teri', 'teri123', 'Teri', 'Broadstreet', 'Apt 32 Carebear Ave Sackville NB', '506-333-2222', 35),
(3, 'suzanne', 'suzanne123', 'Suzanne', 'Almighty', '2143 Shakey Lane Kentville NS', '902-678-4321', 50),
(6, 'tom', 't1234', 'Danny', 'Silver', 'Localhost', '110', 110);

-- --------------------------------------------------------

--
-- Table structure for table `a6-puser`
--

CREATE TABLE IF NOT EXISTS `a6-puser` (
  `id` int(11) NOT NULL COMMENT 'PID(Patient ID)',
  `username` varchar(32) CHARACTER SET utf16 COLLATE utf16_unicode_ci NOT NULL,
  `password` varchar(64) CHARACTER SET utf16 COLLATE utf16_unicode_ci NOT NULL,
  `first` varchar(64) CHARACTER SET utf16 COLLATE utf16_unicode_ci NOT NULL,
  `last` varchar(64) CHARACTER SET utf16 COLLATE utf16_unicode_ci NOT NULL,
  `addr` varchar(128) CHARACTER SET utf16 COLLATE utf16_unicode_ci NOT NULL,
  `phone` varchar(15) CHARACTER SET utf16 COLLATE utf16_unicode_ci NOT NULL,
  `healthid` varchar(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `a6-puser`
--

INSERT INTO `a6-puser` (`id`, `username`, `password`, `first`, `last`, `addr`, `phone`, `healthid`) VALUES
(1, 'rogers', 'rogers123', 'Rogers', 'Moores', '14 King St Fredericton NB.', '506-901-2534', '234 567 890'),
(2, 'carol', 'carol123', 'Carol', 'Ling', 'Apt 3 1823 Gottingen St Halifax NS', '902-465-3291', '012 345 678'),
(3, 'orin', 'orin123', 'Orin', 'Snorkel', 'RR#6 Antigonish Co NS', '902-324-2221', '987 654 321');

-- --------------------------------------------------------

--
-- Table structure for table `a6-schedule`
--

CREATE TABLE IF NOT EXISTS `a6-schedule` (
  `id` int(11) NOT NULL COMMENT 'calendar id',
  `pid` int(11) NOT NULL,
  `eid` int(11) NOT NULL,
  `type` varchar(64) CHARACTER SET utf16 COLLATE utf16_unicode_ci NOT NULL,
  `duration` int(6) NOT NULL COMMENT 'in minutes',
  `unixtime` int(10) NOT NULL,
  `added` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `a6-schedule`
--

INSERT INTO `a6-schedule` (`id`, `pid`, `eid`, `type`, `duration`, `unixtime`, `added`) VALUES
(1, 2, 3, 'foot massage', 60, 1424872800, 0),
(2, 1, 2, 'hip acupuncture', 90, 1432404000, 0),
(3, 2, 1, 'leg massage', 60, 1431000000, 0),
(4, 3, 3, 'back massage', 120, 1434988800, 0),
(5, 2, 2, 'foot massage', 60, 1432402200, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `a6-employee`
--
ALTER TABLE `a6-employee`
  ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `a6-puser`
--
ALTER TABLE `a6-puser`
  ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `a6-schedule`
--
ALTER TABLE `a6-schedule`
  ADD PRIMARY KEY (`id`), ADD KEY `pid` (`pid`), ADD KEY `eid` (`eid`), ADD KEY `cid` (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `a6-employee`
--
ALTER TABLE `a6-employee`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `a6-puser`
--
ALTER TABLE `a6-puser`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'PID(Patient ID)',AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `a6-schedule`
--
ALTER TABLE `a6-schedule`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'calendar id',AUTO_INCREMENT=9;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `a6-schedule`
--
ALTER TABLE `a6-schedule`
ADD CONSTRAINT `link_to_employee_table` FOREIGN KEY (`eid`) REFERENCES `a6-employee` (`id`),
ADD CONSTRAINT `link_to_patient_table` FOREIGN KEY (`pid`) REFERENCES `a6-puser` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
