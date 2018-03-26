-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 26, 2018 at 09:10 PM
-- Server version: 10.1.31-MariaDB
-- PHP Version: 7.2.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `alumni`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` int(15) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `pass` varchar(100) NOT NULL,
  `image` varchar(100) NOT NULL DEFAULT 'default1.png'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `name`, `email`, `pass`, `image`) VALUES
(1, 'Admin Demo', 'admin@gmail.com', 'e020590f0e18cd6053d7ae0e0a507609', '1522035200.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` int(15) NOT NULL,
  `title` varchar(250) NOT NULL,
  `body` text NOT NULL,
  `image` varchar(100) NOT NULL,
  `status` varchar(100) NOT NULL,
  `user_id` int(15) NOT NULL,
  `created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `title`, `body`, `image`, `status`, `user_id`, `created_date`) VALUES
(1, 'Demo', '<p><b><i><u>Demo Post Data</u></i></b></p>', '1522082236.jpg', 'pending', 1, '2018-03-26 16:38:18'),
(3, 'Demo3', '<p><b><i><u>Demo 3 Body</u></i></b></p>', '1522082536.jpg', 'pending', 1, '2018-03-26 16:42:15');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(15) NOT NULL,
  `name` varchar(150) NOT NULL,
  `email` varchar(150) NOT NULL,
  `pass` varchar(150) NOT NULL,
  `image` varchar(15) NOT NULL DEFAULT 'default1.png',
  `user_type` varchar(100) NOT NULL DEFAULT 'alumni',
  `branch` varchar(100) NOT NULL,
  `roll_no` int(15) DEFAULT NULL,
  `dob` date NOT NULL,
  `gender` varchar(15) NOT NULL,
  `address` text NOT NULL,
  `city` varchar(15) NOT NULL,
  `contact_no` bigint(150) NOT NULL,
  `session_start` year(4) NOT NULL,
  `session_end` year(4) NOT NULL,
  `user_current_status` enum('employed','unemployed','selfemployed') NOT NULL,
  `cource` varchar(15) NOT NULL,
  `designation` varchar(20) NOT NULL,
  `organisation` varchar(100) NOT NULL,
  `created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `pass`, `image`, `user_type`, `branch`, `roll_no`, `dob`, `gender`, `address`, `city`, `contact_no`, `session_start`, `session_end`, `user_current_status`, `cource`, `designation`, `organisation`, `created_date`) VALUES
(1, 'Demo Alumni', 'demo@gmail.com', 'e020590f0e18cd6053d7ae0e0a507609', '1521640057.jpg', 'alumni', 'CSE', 11, '1998-03-03', 'Male', 'Samata Colony', 'Amravti', 9999999999, 2009, 2016, 'selfemployed', 'CSE', 'CEO', 'XYZ Company', '2018-03-26 18:04:15'),
(3, 'Demo New', 'alumni@gmail.com', 'e020590f0e18cd6053d7ae0e0a507609', '73.jpg', 'alumni', 'CSE', 13, '2018-03-21', 'Male', 'Samata Colony', 'Amravati', 9545686434, 2013, 2016, 'employed', 'CSE', 'CEO', 'ELETECH', '2018-03-26 17:58:39'),
(6, 'Demo User', 'demo2@gmail.com', 'e020590f0e18cd6053d7ae0e0a507609', 'default1.png', 'alumni', 'CSE', 14, '2018-03-20', 'Male', 'ssss', 'amt', 999999999, 0000, 0000, 'unemployed', '', '', '', '2018-03-26 17:58:45');

-- --------------------------------------------------------

--
-- Table structure for table `vacancies`
--

CREATE TABLE `vacancies` (
  `id` int(15) NOT NULL,
  `title` varchar(250) NOT NULL,
  `body` text NOT NULL,
  `branch` varchar(100) NOT NULL,
  `image` varchar(100) NOT NULL,
  `status` varchar(10) NOT NULL,
  `user_id` int(15) NOT NULL,
  `user_type` varchar(100) NOT NULL,
  `created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `vacancies`
--

INSERT INTO `vacancies` (`id`, `title`, `body`, `branch`, `image`, `status`, `user_id`, `user_type`, `created_date`) VALUES
(8, 'vacancy', '<p><b><i><u>lalllalallalallalll</u></i></b></p>', 'CSE', '1522082236.jpg', 'pending', 3, 'alumni', '2018-03-26 17:28:32'),
(9, 'llll', '<p><b><i><u>lalallall</u></i></b></p>', 'CSE', '1522082236.jpg', 'pending', 3, 'alumni', '2018-03-26 17:28:39'),
(13, 'IT Vacancy', '<p>It Vacancy</p>', 'IT', '1522082236.jpg', 'pending', 3, 'alumni', '2018-03-26 17:28:50'),
(14, 'Mech Vacancy', '<p>Mech</p>', 'MECH', '1522082236.jpg', 'pending', 3, 'alumni', '2018-03-26 17:28:55'),
(15, 'Civil Vacancy', '<p><b><i><u>Mech Vacancy</u></i></b></p>', 'CIVIL', '1522082236.jpg', 'pending', 3, 'alumni', '2018-03-26 17:29:00'),
(16, 'EXTC Vacancy', '<p><b><i><u>Civil Vacancy</u></i></b></p>', 'EXTC', '1522082236.jpg', 'pending', 3, 'alumni', '2018-03-26 17:29:04'),
(18, 'Electrical Vacancy', '<p><b><i><u>Electrical Vacancy</u></i></b><br></p>', 'EE', '1522085676.jpg', 'pending', 1, 'alumni', '2018-03-26 17:34:36');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roll_no` (`roll_no`);

--
-- Indexes for table `vacancies`
--
ALTER TABLE `vacancies`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `vacancies`
--
ALTER TABLE `vacancies`
  MODIFY `id` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
