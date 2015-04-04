<?php
$host = "db.luxing.im";
$dbusername = "a6";
$dbpassword = "JtsTuDe6SFKVxUvF";
$dbname = "a6";
$prefix = "a6-";

$db = mysqli_connect($host, $dbusername, $dbpassword, $dbname);
if ($db->connect_error) {
    die("Connection Failed". $db->connect_error);
}

function install() {
    # Import SQL into the database.
    global $db, $prefix, $dbname;
    $sql = "
-- phpMyAdmin SQL Dump
-- version 4.3.12
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Apr 04, 2015 at 08:06 PM
-- Server version: 5.5.42-MariaDB-log
-- PHP Version: 5.5.23

SET SQL_MODE = 'NO_AUTO_VALUE_ON_ZERO';
SET time_zone = '+00:00';


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `$dbname`
--

-- --------------------------------------------------------

--
-- Table structure for table `" . $prefix . "puser`
--

CREATE TABLE IF NOT EXISTS `" . $prefix . "puser` (
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
-- Dumping data for table `" . $prefix . "puser`
--

INSERT INTO `" . $prefix . "puser` (`id`, `username`, `password`, `first`, `last`, `addr`, `phone`, `healthid`) VALUES
(1, 'rogers', 'rogers123', 'Rogers', 'Moores', '14 King St Fredericton NB.', '506-901-2534', '234 567 890'),
(2, 'carol', 'carol123', 'Carol', 'Ling', 'Apt 3 1823 Gottingen St Halifax NS', '902-465-3291', '012 345 678'),
(3, 'orin', 'orin123', 'Orin', 'Snorkel', 'RR#6 Antigonish Co NS', '902-324-2221', '987 654 321'),
(4, 'tom', 't1234', 'Tom', 'The User', 'Localhost', '999', '000');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `" . $prefix . "puser`
--
ALTER TABLE `" . $prefix . "puser`
  ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `" . $prefix . "puser`
--
ALTER TABLE `" . $prefix . "puser`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'PID(Patient ID)',AUTO_INCREMENT=5;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
";
    $db->query($sql);
}

function isInstalled() {
    global $db, $prefix;
    $sql = "SELECT * FROM `" . $prefix . "puser`";
    $test = $db->query($sql);
    if ($test === false) {
        install();
    }
}

isInstalled();

?>
