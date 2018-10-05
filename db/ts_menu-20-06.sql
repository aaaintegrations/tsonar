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
-- Table structure for table `ts_menu`
--

CREATE TABLE `ts_menu` (
  `id` int(11) NOT NULL,
  `menu_name` varchar(100) NOT NULL,
  `menu_slug` varchar(100) NOT NULL,
  `menu_icon` varchar(100) NOT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ts_menu`
--

INSERT INTO `ts_menu` (`id`, `menu_name`, `menu_slug`, `menu_icon`, `created_at`) VALUES
(1, 'Jobs', 'jobs', 'fa fa-breifcase', '2018-06-20 09:19:11'),
(2, 'Interviews', 'interviews', 'fa fa-eye', '2018-06-20 09:19:11'),
(3, 'Users', 'users', 'fa fa-user', '2018-06-20 09:19:11'),
(4, 'Settings', 'settings', 'fa fa-gear', '0000-00-00 00:00:00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ts_menu`
--
ALTER TABLE `ts_menu`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `ts_menu`
--
ALTER TABLE `ts_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
