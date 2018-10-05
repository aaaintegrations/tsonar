-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jun 07, 2018 at 02:41 PM
-- Server version: 10.1.16-MariaDB
-- PHP Version: 5.6.20

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
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
-- Table structure for table `ts_users`
--

CREATE TABLE `ts_users` (
  `id` int(11) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `email` varchar(150) NOT NULL,
  `gender` enum('male','female') DEFAULT NULL,
  `state` varchar(100) DEFAULT NULL,
  `zipcode` varchar(20) DEFAULT NULL,
  `city` varchar(100) DEFAULT NULL,
  `country` varchar(100) DEFAULT NULL,
  `avatar` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL,
  `reset_password` varchar(250) DEFAULT NULL,
  `activation_token` varchar(255) NOT NULL,
  `activation_time` datetime(6) DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT '0',
  `user_type` varchar(100) NOT NULL DEFAULT 'tsonar',
  `role_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ts_users`
--

INSERT INTO `ts_users` (`id`, `firstname`, `lastname`, `email`, `gender`, `state`, `zipcode`, `city`, `country`, `avatar`, `password`, `reset_password`, `activation_token`, `activation_time`, `status`, `user_type`, `role_id`, `created_at`, `updated_at`) VALUES
(1, 'bILAL', 'Ahmad', 'bilal@leadconcept.com', NULL, NULL, NULL, NULL, 'v', '', '96e79218965eb72c92a549dd5a330112', NULL, '', NULL, 0, 'tsonar', 2, '2018-06-06 09:25:25', NULL),
(2, 'bILAL', 'Ahmad', 'bilal@leadconcept.com1', NULL, NULL, NULL, NULL, 'v', '', '96e79218965eb72c92a549dd5a330112', NULL, '', NULL, 0, 'tsonar', 2, '2018-06-06 09:26:26', NULL),
(3, 'BIl', 'sdfsdfs', 'admin@demo.com', NULL, NULL, NULL, NULL, 'United States', '', '96e79218965eb72c92a549dd5a330112', NULL, '', NULL, 0, 'tsonar', 2, '2018-06-06 09:27:16', NULL),
(4, 'BIl', 'sdfsdfs', 'admin@dem1o.com', NULL, NULL, NULL, NULL, 'United States', '', '96e79218965eb72c92a549dd5a330112', NULL, '', NULL, 0, 'tsonar', 2, '2018-06-06 09:27:40', NULL),
(5, 'BIl', 'sdfsdfs', 'admi1n@demo.com', NULL, NULL, NULL, NULL, 'United States', '', '96e79218965eb72c92a549dd5a330112', NULL, '', NULL, 0, 'tsonar', 2, '2018-06-06 09:30:03', NULL),
(6, 'Bhatto', 'aldkl', 'asdsad@tsonar.com', NULL, NULL, NULL, NULL, 'a', '', '96e79218965eb72c92a549dd5a330112', NULL, '', NULL, 0, 'tsonar', 3, '2018-06-06 11:32:50', NULL),
(7, 'BIl', 'sdfsdfs', 'adaamin@demo.com', NULL, NULL, NULL, NULL, 'United States', '', '96e79218965eb72c92a549dd5a330112', NULL, '', NULL, 0, 'tsonar', 2, '2018-06-06 11:36:31', NULL),
(8, 'BIl', 'sdfsdfs', 'adaamin@dsemo.com', NULL, NULL, NULL, NULL, 'United States', '', '96e79218965eb72c92a549dd5a330112', NULL, '', NULL, 0, 'tsonar', 2, '2018-06-06 11:36:53', NULL),
(9, 'BIl', 'sdfsdfs', 'adaamin@dasemo.com', NULL, NULL, NULL, NULL, 'United States', '', '96e79218965eb72c92a549dd5a330112', NULL, '', NULL, 0, 'tsonar', 2, '2018-06-06 11:37:20', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `ts_user_roles`
--

CREATE TABLE `ts_user_roles` (
  `id` int(11) NOT NULL,
  `role_name` varchar(250) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ts_user_roles`
--

INSERT INTO `ts_user_roles` (`id`, `role_name`, `created_at`) VALUES
(1, 'Agency', '2018-05-31 12:25:37'),
(2, 'Rpo', '2018-05-31 12:25:37'),
(3, 'In-house', '2018-05-31 12:25:37');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ts_users`
--
ALTER TABLE `ts_users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `role_id` (`role_id`);

--
-- Indexes for table `ts_user_roles`
--
ALTER TABLE `ts_user_roles`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `ts_users`
--
ALTER TABLE `ts_users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `ts_user_roles`
--
ALTER TABLE `ts_user_roles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
