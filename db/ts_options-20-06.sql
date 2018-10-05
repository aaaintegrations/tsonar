-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 20, 2018 at 07:28 PM
-- Server version: 10.1.32-MariaDB
-- PHP Version: 5.6.36

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tsonar`
--

-- --------------------------------------------------------

--
-- Table structure for table `ts_options`
--

CREATE TABLE `ts_options` (
  `id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL,
  `menu_permissions` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ts_options`
--

INSERT INTO `ts_options` (`id`, `role_id`, `menu_permissions`) VALUES
(1, 1, 'a:3:{s:4:\"view\";a:3:{i:1;a:1:{i:0;s:2:\"on\";}i:2;a:1:{i:0;s:2:\"on\";}i:3;a:1:{i:0;s:2:\"on\";}}s:4:\"edit\";a:2:{i:1;a:1:{i:0;s:2:\"on\";}i:3;a:1:{i:0;s:2:\"on\";}}s:6:\"delete\";a:3:{i:2;a:1:{i:0;s:2:\"on\";}i:3;a:1:{i:0;s:2:\"on\";}i:4;a:1:{i:0;s:2:\"on\";}}}'),
(2, 2, 'a:3:{s:4:\"view\";a:3:{i:1;a:1:{i:0;s:2:\"on\";}i:3;a:1:{i:0;s:2:\"on\";}i:4;a:1:{i:0;s:2:\"on\";}}s:6:\"delete\";a:2:{i:1;a:1:{i:0;s:2:\"on\";}i:4;a:1:{i:0;s:2:\"on\";}}s:4:\"edit\";a:1:{i:4;a:1:{i:0;s:2:\"on\";}}}');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ts_options`
--
ALTER TABLE `ts_options`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `ts_options`
--
ALTER TABLE `ts_options`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
