-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 28, 2023 at 08:38 AM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 7.4.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `online_election`
--

-- --------------------------------------------------------

--
-- Table structure for table `candidete`
--

CREATE TABLE `candidete` (
  `id` int(11) NOT NULL,
  `number` varchar(20) NOT NULL,
  `fullname` varchar(100) NOT NULL,
  `intro` varchar(100) NOT NULL,
  `picture` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `candidete`
--

INSERT INTO `candidete` (`id`, `number`, `fullname`, `intro`, `picture`) VALUES
(1, '1001', 'นายกฤษณชัย อุบลทิพย์', 'Good', 'candidete/1674888913.jpg'),
(2, '1001', 'นายกฤษณชัย อุบลทิพย์', 'Good', 'candidete/1674889022.jpg'),
(3, '1001', 'นายกฤษณชัย อุบลทิพย์', 'Good', 'image/1674889047.jpg'),
(4, '1001', 'นายกฤษณชัย อุบลทิพย์', 'Good', 'images/1674889069.jpg'),
(5, '1001', 'นายกฤษณชัย อุบลทิพย์', 'Good', 'images/1674889182.jpg'),
(6, '1001', 'นายกฤษณชัย อุบลทิพย์', 'Good', 'images/1674889401.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE `events` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `detail` varchar(100) NOT NULL,
  `start` datetime NOT NULL,
  `end` datetime NOT NULL,
  `picture` varchar(100) NOT NULL,
  `status` enum('Close','Open') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`id`, `name`, `detail`, `start`, `end`, `picture`, `status`) VALUES
(1, 'Kritsanachai Ubonthip5555', 'tyjkdghjdh', '2023-01-25 17:23:00', '2023-01-27 17:23:00', '1674791507.jpg', 'Open'),
(3, 'Kritsanachai Ubonthip', 'zxvcz', '2023-01-26 10:00:00', '2023-01-26 10:05:00', '1674725616.jpg', 'Open'),
(4, 'Kritsanachai Ubonthip', 'asdfasdf', '2023-01-26 14:15:00', '2023-01-28 14:15:00', '1674717369.jpg', 'Open'),
(5, 'เลือกตั้งประธานนักเรียน', 'ฟหดฟหดหกดฟหกด', '2023-01-27 16:20:00', '2023-01-28 16:16:00', '1674811018.jpg', 'Close'),
(6, 'Kritsanachai Ubonthip55', 'dfgrsdfgadfs', '2023-01-28 11:31:00', '2023-01-28 11:36:00', '1674880310.jpg', 'Close');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(32) NOT NULL,
  `fullname` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `tel` varchar(10) NOT NULL,
  `access` enum('User','Admin') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `fullname`, `email`, `tel`, `access`) VALUES
(1, 'vip', 'b4b147bc522828731f1a016bfa72c073', 'Kritsanachai Ubonthip', 'mnkan48@gmail.com', '0663368153', 'Admin'),
(2, 'gg', 'b4b147bc522828731f1a016bfa72c073', 'Kritsanachai Ubonthip555', 'nantawatzr@gmail.com', 'dfg', 'User');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `candidete`
--
ALTER TABLE `candidete`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `events`
--
ALTER TABLE `events`
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
-- AUTO_INCREMENT for table `candidete`
--
ALTER TABLE `candidete`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
