-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 28, 2021 at 01:38 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ntpws_vjezbe`
--

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `full_name` varchar(255) NOT NULL DEFAULT '',
  `username` varchar(255) NOT NULL DEFAULT '',
  `password` varchar(255) NOT NULL DEFAULT '',
  `email` varchar(255) NOT NULL DEFAULT '',
  `country_id` varchar(2) NOT NULL DEFAULT '',
  `birth_date` date NOT NULL DEFAULT current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `full_name`, `username`, `password`, `email`, `country_id`, `birth_date`) VALUES
(6, 'Matija Janjecic', '123', '123', 'matijaj14@gmail.com', 'Af', '0000-00-00'),
(8, 'Matija Janjecic', '343', '123', 'matijaj14@gmail.com3', 'Af', '0000-00-00'),
(9, 'Matija Janjecic', '345456', '123', 'matijaj14@gmail.com456456', 'Af', '2021-11-10'),
(10, 'Matija Janjecic', '678678678', '123', 'matijaj14@gmail.com77897', 'Af', '2021-11-10'),
(11, 'qqqqq', 'qqq', '*0', 'qqq@qqq.com', 'Af', '2011-01-11'),
(12, 'ttt', 'ttt', '$2y$10$dPrgrwQkyU.RFQ/SBTTxluTLa5kfmU8o8yr1t9JHWTsY/vhrHlOh6', 'ttt@t.t', 'Af', '2011-01-11');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
