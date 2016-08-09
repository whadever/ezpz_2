-- phpMyAdmin SQL Dump
-- version 4.5.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Aug 05, 2016 at 03:52 AM
-- Server version: 10.1.10-MariaDB
-- PHP Version: 5.6.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ezpz`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `created` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`, `email`, `created`) VALUES
(1, 'admin', '$2y$10$sLZhC2U0LIH963dH8iYcx.88S9Hii5PdV3pPkzfp4NucN507QqLlm', 'zonecaptain@gmail.com', '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `dishes`
--

CREATE TABLE `dishes` (
  `id` int(20) NOT NULL,
  `restaurant_id` int(20) NOT NULL,
  `name` varchar(255) NOT NULL,
  `price` varchar(255) NOT NULL,
  `available` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `driver`
--

CREATE TABLE `driver` (
  `id` int(20) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `firstname` varchar(255) DEFAULT NULL,
  `lastname` varchar(255) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `ird` varchar(255) NOT NULL,
  `driver_licence` varchar(255) NOT NULL,
  `licence_type` varchar(255) NOT NULL,
  `photo_front` varchar(255) DEFAULT NULL,
  `photo_back` varchar(255) DEFAULT NULL,
  `photo` varchar(255) DEFAULT NULL,
  `verification_code` varchar(255) DEFAULT NULL,
  `is_verified` int(20) DEFAULT NULL,
  `created` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `driver`
--

INSERT INTO `driver` (`id`, `username`, `password`, `firstname`, `lastname`, `email`, `phone`, `address`, `ird`, `driver_licence`, `licence_type`, `photo_front`, `photo_back`, `photo`, `verification_code`, `is_verified`, `created`) VALUES
(1, 'John', '$2y$10$hNkkC6r9zHReO7psbs0UD.n3/1XprIbpqdiEcVD6RkeOJ60taQkty', NULL, NULL, 'jonathan.hosea@me.com', '+087884514310', 'Taman Pegangsaan Ind0ah Blok D no 11, kelapa gading', 'u3hekahbmdfbasf', 'sdkjhfkjsbdfsjdfsf', 'learner', NULL, NULL, NULL, '80cde59ca19c731a8838bcb70a80a64664e3fde1bd8b227317a8bd5658d4ad35', 0, '2016-08-05');

-- --------------------------------------------------------

--
-- Table structure for table `restaurants`
--

CREATE TABLE `restaurants` (
  `id` int(20) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `cuisine` varchar(255) DEFAULT NULL,
  `opentime` time DEFAULT NULL,
  `closetime` time DEFAULT NULL,
  `opendays` varchar(255) DEFAULT NULL,
  `longitude` double DEFAULT NULL,
  `latitude` double DEFAULT NULL,
  `photo` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `created` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `restaurants`
--

INSERT INTO `restaurants` (`id`, `username`, `password`, `name`, `address`, `cuisine`, `opentime`, `closetime`, `opendays`, `longitude`, `latitude`, `photo`, `phone`, `email`, `created`) VALUES
(1, 'Padang Sederhana', '$2y$10$4CiIkcriivrLXG4NITy8kOOoDHyB1qFaxTaJo5jNT5mtAK.ZJRiZW', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'zonecaptain@gmail.com', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `firstname` varchar(255) DEFAULT NULL,
  `lastname` varchar(255) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `telephone` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `photo` varchar(255) DEFAULT NULL,
  `verification_code` varchar(255) DEFAULT NULL,
  `is_verified` int(20) DEFAULT NULL,
  `created` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `firstname`, `lastname`, `email`, `telephone`, `address`, `photo`, `verification_code`, `is_verified`, `created`) VALUES
(27, 'admin', '$2y$10$6831VbJjQQbz7hrkrp.UfuhgraZFZS3ANv26utgZNs9wC1TkYoHZW', NULL, NULL, 'zonecaptain@gmail.com', '+081619638800', 'TPI D 11\r\nTaman Pegangsaan Indah', NULL, NULL, 1, '0000-00-00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dishes`
--
ALTER TABLE `dishes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `driver`
--
ALTER TABLE `driver`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `restaurants`
--
ALTER TABLE `restaurants`
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
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `dishes`
--
ALTER TABLE `dishes`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `driver`
--
ALTER TABLE `driver`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `restaurants`
--
ALTER TABLE `restaurants`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
