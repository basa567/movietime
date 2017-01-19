-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jan 19, 2017 at 06:47 PM
-- Server version: 10.1.19-MariaDB
-- PHP Version: 5.6.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `movietime`
--

-- --------------------------------------------------------

--
-- Table structure for table `movie_hall`
--

CREATE TABLE `movie_hall` (
  `id` int(6) UNSIGNED NOT NULL,
  `name` varchar(30) NOT NULL,
  `price` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `movie_hall`
--

INSERT INTO `movie_hall` (`id`, `name`, `price`) VALUES
(1, 'OuluPlaza', 9),
(2, 'Finniko', 12),
(3, 'Kinopalatsi', 11);

-- --------------------------------------------------------

--
-- Table structure for table `movie_time`
--

CREATE TABLE `movie_time` (
  `id` int(6) UNSIGNED NOT NULL,
  `hall_id` int(50) NOT NULL,
  `m_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `movie_time`
--

INSERT INTO `movie_time` (`id`, `hall_id`, `m_time`) VALUES
(1, 1, '0000-00-00 00:00:00'),
(2, 2, '0000-00-00 00:00:00'),
(3, 3, '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(6) UNSIGNED NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL,
  `price` int(50) DEFAULT NULL,
  `qty` int(50) DEFAULT NULL,
  `total_price` int(50) DEFAULT NULL,
  `movie` varchar(30) DEFAULT NULL,
  `m_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `price`, `qty`, `total_price`, `movie`, `m_time`) VALUES
(1, 'moviewatcher', 'moviewatcher', 0, 0, NULL, NULL, '2017-01-19 17:07:28');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `movie_hall`
--
ALTER TABLE `movie_hall`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `movie_time`
--
ALTER TABLE `movie_time`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `movie_hall`
--
ALTER TABLE `movie_hall`
  MODIFY `id` int(6) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `movie_time`
--
ALTER TABLE `movie_time`
  MODIFY `id` int(6) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(6) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
