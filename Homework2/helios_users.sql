-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 07, 2021 at 06:10 PM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 8.0.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `helios_users`
--

-- --------------------------------------------------------

--
-- Table structure for table `helios_users`
--

CREATE TABLE `helios_users` (
  `id` int(255) UNSIGNED NOT NULL,
  `Fname` varchar(32) NOT NULL,
  `Lname` varchar(32) NOT NULL,
  `Email` varchar(256) NOT NULL,
  `Username` varchar(32) NOT NULL,
  `Password` varchar(255) NOT NULL,
  `Gender` varchar(8) NOT NULL,
  `Date` date NOT NULL,
  `Photo` varchar(500) NOT NULL,
  `Role` varchar(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `helios_users`
--

INSERT INTO `helios_users` (`id`, `Fname`, `Lname`, `Email`, `Username`, `Password`, `Gender`, `Date`, `Photo`, `Role`) VALUES
(1, 'admin', 'admin', 'admin@email.com', 'admin', '$2y$10$cRXryp5NzhusEUvANlJimuD7jsXVpuwfS56Aq.krlmBsXZDf68OKm', 'other', '1999-11-09', '../UserPhoto/admin.png', 'admin'),
(2, 'mod', 'mod', 'mod@email.com', 'mod', '$2y$10$GK8oM/2zQgtU6oduho9/XOSV0s5OruV/2YVEi.Nh19b2lr48vkEJS', 'other', '2000-08-04', '../UserPhoto/mod.png', 'mod'),
(3, 'user', 'user', 'user@email.com', 'user', '$2y$10$ful/RngLGQi3waMLYJRDOesMBBA/JipRoD9BJgTwOqbYpiy1qQzIK', 'other', '2000-09-12', '../UserPhoto/user.png', 'user');

-- --------------------------------------------------------

--
-- Table structure for table `user_answers`
--

CREATE TABLE `user_answers` (
  `Username` varchar(80) NOT NULL,
  `Datetime` datetime NOT NULL,
  `Difficulty` varchar(8) NOT NULL,
  `Result` tinyint(4) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_answers`
--

INSERT INTO `user_answers` (`Username`, `Datetime`, `Difficulty`, `Result`) VALUES
('user', '2021-07-07 19:02:29', 'easy', 5),
('user', '2021-07-07 19:03:24', 'medium', 3),
('user', '2021-07-07 19:04:33', 'hard', 3),
('admin', '2021-07-07 19:05:44', 'hard', 5),
('mod', '2021-07-07 19:06:54', 'medium', 5);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `helios_users`
--
ALTER TABLE `helios_users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `Email` (`Email`),
  ADD UNIQUE KEY `Username` (`Username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `helios_users`
--
ALTER TABLE `helios_users`
  MODIFY `id` int(255) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
