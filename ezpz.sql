-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jan 18, 2017 at 07:22 AM
-- Server version: 10.1.19-MariaDB
-- PHP Version: 5.5.38

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
(1, 'Reyner', 'd3623c77578eebdac371c5f82d23c3fb4376396cdb4c7045c933398105db60f9e56c7c3f3af8474ee155a0804ea6f193e66555d76362ecf2675802e4f1a2387d', 'reyner@gethassee.com', '0000-00-00'),
(2, 'TEST', 'cc72358414bc151fd009a94f49cfd1dd3cb0f14ed46965430eb57aead7704feac5e8eefc27786085916643add28f194187206aa8bf7242316d7a72afe3ad8820', '22@gmail.com', '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `configuration`
--

CREATE TABLE `configuration` (
  `id` int(11) NOT NULL,
  `background` varchar(255) DEFAULT NULL,
  `primary_color` varchar(255) DEFAULT NULL,
  `service_fare` double DEFAULT NULL,
  `secondary_color` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `configuration`
--

INSERT INTO `configuration` (`id`, `background`, `primary_color`, `service_fare`, `secondary_color`) VALUES
(1, 'uploads/config/wallpaper.jpg', '#2E3E50', 2, '#FFFFFF');

-- --------------------------------------------------------

--
-- Table structure for table `cuisines`
--

CREATE TABLE `cuisines` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `photo` varchar(255) NOT NULL,
  `thumb` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cuisines`
--

INSERT INTO `cuisines` (`id`, `name`, `photo`, `thumb`) VALUES
(15, 'Japanese', 'images/cuisines/Japan.jpg', 'images/cuisines/Japan_thumb.jpg'),
(16, 'Chinese', 'images/cuisines/Tasty-Chinese-Dumplings-Food-Photo-Wallpaper-Desktop-Free-HD-2993493945.jpg', 'images/cuisines/Tasty-Chinese-Dumplings-Food-Photo-Wallpaper-Desktop-Free-HD-2993493945_thumb.jpg'),
(17, 'Italian', 'images/cuisines/Supreme_pizza.jpg', 'images/cuisines/Supreme_pizza_thumb.jpg'),
(18, 'American', 'images/cuisines/american.jpg', 'images/cuisines/american_thumb.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `dishes`
--

CREATE TABLE `dishes` (
  `id` int(20) NOT NULL,
  `restaurant_id` int(20) NOT NULL,
  `name` varchar(255) NOT NULL,
  `price` double NOT NULL,
  `description` text NOT NULL,
  `photo` varchar(255) NOT NULL,
  `available` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dishes`
--

INSERT INTO `dishes` (`id`, `restaurant_id`, `name`, `price`, `description`, `photo`, `available`) VALUES
(6, 16, 'Espresso', 3.75, 'Best Espresso in the world askldjsad alsdkaklsjd alkdjalksjd  aslkdjaslkd akldaskljd akljdalskjd askldjasljdnaklsjdaslkjd asdkljaskldjajasdjasd asdasdj sadasjd alksdjalksd aslkdjaklsjd aslkdjasd aslkdjaklsjd klasdjalskjd alskjdaklsjd alskdjaklsjd klasjdlksajd ..asdjlalskd aslkdjaslkjd ', 'uploads/restaurant/c1espresso/dishes/Base-Espresso-Cappuccino.jpg', 1),
(7, 16, 'Caffe Latte', 5, 'Best latte ever', 'uploads/restaurant/c1espresso/dishes/slider.jpg', 1),
(9, 16, 'kopi', 2, 'kopi', 'uploads/restaurant/c1espresso/dishes/minion_png_by_isammyt-d6fn0fj.png', 1),
(10, 16, 'test', 23.79, 'test', 'uploads/restaurant/c1espresso/dishes/th.jpg', 1),
(17, 23, 'ayam', 3, 'd', 'uploads/restaurant/bukris/dishes/ayam-penyet-lezat-tokomesin.jpg', 1),
(18, 23, 'cheese', 6, 'tty', 'uploads/restaurant/bukris/dishes/gambar-artikel-10-3.jpg', 1),
(19, 20, 'fried chicken', 5, 'ayam\r\n', 'uploads/restaurant/mcd/dishes/Ayam-Kentucky.jpg', 1),
(20, 19, 'espresso', 2, 'test', 'uploads/restaurant/topkapi/dishes/coffee2.jpg', 1),
(21, 17, 'Spicy Italian Sandwich', 6, 'test', 'uploads/restaurant/subwayaddington/dishes/20131216-1-a-sandwich-a-day-chop-shop-spicy-italian-edit-thumb-610x457-375814.jpg', 1),
(22, 21, 'tuna mentaia', 9, 'tuna mentai', 'uploads/restaurant/sushitei/dishes/package-of-tuna-salad-crispy-mentai-and-many-more-at-sushi-tei-diskon.jpg', 1),
(23, 17, 'Italian Sandwich', 5, 'best sandwich ever', 'uploads/restaurant/subwayaddington/dishes/20131216-1-a-sandwich-a-day-chop-shop-spicy-italian-edit-thumb-610x457-375814.jpg', 1);

-- --------------------------------------------------------

--
-- Table structure for table `drivers`
--

CREATE TABLE `drivers` (
  `id` int(20) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `firstname` varchar(255) DEFAULT NULL,
  `lastname` varchar(255) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `telephone` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `ird` varchar(255) NOT NULL,
  `driver_license` varchar(255) NOT NULL,
  `license_type` varchar(255) NOT NULL,
  `credits` double NOT NULL DEFAULT '0',
  `photo` varchar(255) DEFAULT NULL,
  `latitude` double NOT NULL,
  `longitude` double NOT NULL,
  `verification_code` varchar(255) DEFAULT NULL,
  `is_verified` int(20) NOT NULL DEFAULT '0',
  `created` date NOT NULL,
  `type` varchar(255) NOT NULL DEFAULT 'driver',
  `is_available` tinyint(1) DEFAULT NULL,
  `id_order` int(11) DEFAULT NULL,
  `last_active` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `drivers`
--

INSERT INTO `drivers` (`id`, `username`, `password`, `firstname`, `lastname`, `email`, `telephone`, `address`, `ird`, `driver_license`, `license_type`, `credits`, `photo`, `latitude`, `longitude`, `verification_code`, `is_verified`, `created`, `type`, `is_available`, `id_order`, `last_active`) VALUES
(3, 'john', '73fcdc607c2bab87bb5293e09a0b3adc2f3499d45266b67f409225bf83e99141e96b9211d9e18b43649123df5a5277751220aabf43a03780943c9178aad80009', 'Jonathan', 'Hosea', 'amu_tsukiyomi@hotmail.com', '+812887688232', 'TPI', '09000', '0923712389120', 'Full License', 14.97, 'uploads/driver/john/photo.jpg', -6.1753871, 106.8249641, NULL, 1, '2016-08-15', 'driver', NULL, NULL, NULL),
(4, 'irpan', 'd3623c77578eebdac371c5f82d23c3fb4376396cdb4c7045c933398105db60f9e56c7c3f3af8474ee155a0804ea6f193e66555d76362ecf2675802e4f1a2387d', 'Irvan', 'Winata', 'irvan@gethassee.com', '+812345678901', '8888', '123', '123123', 'Learner', 541.88, 'uploads/driver/irpan/photo.jpg', -6.1753871, 106.8249641, NULL, 1, '2016-08-22', 'driver', NULL, NULL, NULL),
(6, 'driver', 'cc72358414bc151fd009a94f49cfd1dd3cb0f14ed46965430eb57aead7704feac5e8eefc27786085916643add28f194187206aa8bf7242316d7a72afe3ad8820', 'Yong', 'Li', 'abc@gmil.com', 'aaaa', 'aaa', '09111', '12121212', 'Learner', 123, 'uploads/driver/baboon/photo.jpg', -6.3572276, 106.87398630000007, NULL, 1, '2016-09-08', 'driver', 1, 48, '2016-10-20 11:34:46'),
(7, 'josua', '', 'Josua', 'Reynaldo', 'josuareynaldo@gmail.com', '+6400000000', '21 Colombo St, Cashmere, Christchurch 8022, New Zealand', '11111', '11111', 'Learner', 0, 'uploads/driver/josua/photo.jpg', -43.56565610000001, 172.6365009, NULL, 0, '2017-01-16', 'driver', NULL, NULL, NULL),
(12, 'William', 'ecfbfe5ce8813c6dc15eb09d5d7d161b7cac1c911d00391e7cd87f2210ee05f2cf65cf0b6a782643c77c2b17667f8a0e77e8d7d29b1bfae9311bc18ad2777e05', 'Reinardo', 'William', 'reinardowill@gmail.com', '+648123747281', '347 Hereford St, Linwood, Christchurch 8011, New Zealand', '999900', '9999999999', 'Full License', 0, 'uploads/driver/William/photo.jpg', -43.5317193, 172.65181619999998, NULL, 1, '2017-01-18', 'driver', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `driver_rating`
--

CREATE TABLE `driver_rating` (
  `id` int(11) NOT NULL,
  `driver_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `code` varchar(255) NOT NULL,
  `rating` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `driver_rating`
--

INSERT INTO `driver_rating` (`id`, `driver_id`, `user_id`, `code`, `rating`) VALUES
(1, 4, 33, '9abb2', 5),
(2, 4, 33, 'd1c9a2c', 5),
(3, 4, 33, '102da3c', 5),
(4, 4, 33, '8180ed3', 5),
(5, 4, 33, '5c2eb8f', 5),
(6, 4, 33, 'e5ad2f', 5),
(7, 4, 33, '6a47ad6', 5),
(8, 4, 33, '6a47ad6', 5),
(9, 4, 33, 'ff4500a', 5),
(10, 4, 33, '7b37f88', 5),
(11, 3, 33, '3a685df', 5),
(12, 4, 33, '6bcaeeb', 5),
(13, 4, NULL, '6bcaeeb', 0),
(14, 4, NULL, '6bcaeeb', 0),
(15, 4, 33, '6bcaeeb', 0),
(16, 4, 33, '6bcaeeb', 0),
(17, 4, NULL, '4b2d1e0', 5),
(18, 4, 33, '4b2d1e0', 0),
(19, 4, 33, '278a2b7', 5),
(20, 4, 33, '3a7c219', 5),
(21, 4, 33, '3d19af4', 5),
(22, 4, 33, '916b019', 5),
(23, 4, 33, 'a627db4', 5),
(24, 4, 33, '88567d8', 5),
(25, 4, 33, '503455b', 5),
(26, 4, 33, '503455b', 5),
(27, 4, 33, '8268d95', 5),
(28, 4, 33, '8268d95', 5),
(29, 4, 33, '965c4f7', 5),
(30, 4, 33, 'ed66add', 5),
(31, 4, 33, 'bc298cb', 5),
(32, 4, 33, '489bc4f', 5),
(33, 4, 48, '4339aa', 5),
(34, 4, 33, '1d0260c', 5),
(35, 4, 33, '5b98739', 5),
(36, 4, 33, '880864a', 5),
(37, 4, 33, 'b26a4a5', 5),
(38, 4, 33, '2bbfc64', 5),
(39, 4, 33, 'be21126', 5),
(40, 6, 53, 'BCE4272', 3),
(41, 6, 53, 'BCE4272', 3),
(42, 6, 53, 'BCE4272', 3),
(43, 4, 53, '12119DE', 3),
(44, 4, 53, '77B55A3', 0),
(45, 4, 33, '6de20a5', 5),
(46, 4, 33, '224b441', 5),
(47, 4, 33, '5f107d4', 5),
(48, 4, 53, '2A7AFB9', 0);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `restaurant_id` int(11) NOT NULL,
  `driver_id` int(11) NOT NULL,
  `total_product` int(11) NOT NULL,
  `total_qty` int(11) NOT NULL,
  `total_price` double NOT NULL,
  `delivery_cost` double NOT NULL,
  `code` varchar(255) NOT NULL,
  `status` int(11) NOT NULL,
  `latitude` double NOT NULL,
  `longitude` double NOT NULL,
  `address` varchar(255) NOT NULL,
  `estimation_time` int(11) NOT NULL,
  `distance` double NOT NULL,
  `date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `restaurant_id`, `driver_id`, `total_product`, `total_qty`, `total_price`, `delivery_cost`, `code`, `status`, `latitude`, `longitude`, `address`, `estimation_time`, `distance`, `date`) VALUES
(1, 53, 20, 5, 1, 1, 7.76, 1.76, '059390F', 99, -43.543637, 172.61146299999996, '297 Lincoln Rd, Addington, Christchurch 8024, New Zealand', 4, 1, '2016-10-05 22:28:18'),
(2, 53, 20, 0, 2, 3, 19.94, 2.94, '3A0633B', 0, -43.5432012, 172.6010642, 'Addington, Christchurch 8024, New Zealand', 5, 1, '2016-10-05 22:29:29'),
(3, 53, 20, 0, 1, 1, 7.76, 1.76, 'C316105', 0, -43.543637, 172.61146299999996, '297 Lincoln Rd, Addington, Christchurch 8024, New Zealand', 4, 0.88, '2016-10-05 22:31:08'),
(4, 53, 20, 0, 2, 3, 17.76, 1.76, 'DC42E31', 0, -43.543637, 172.61146299999996, '297 Lincoln Rd, Addington, Christchurch 8024, New Zealand', 4, 0.88, '2016-10-05 22:36:00'),
(5, 53, 20, 0, 2, 3, 17.76, 1.76, 'C84F1F1', 0, -43.543637, 172.61146299999996, '297 Lincoln Rd, Addington, Christchurch 8024, New Zealand', 4, 0.88, '2016-10-05 22:36:05'),
(6, 53, 20, 0, 2, 3, 17.76, 1.76, '637785A', 0, -43.543637, 172.61146299999996, '297 Lincoln Rd, Addington, Christchurch 8024, New Zealand', 4, 0.88, '2016-10-05 22:36:07'),
(7, 53, 20, 0, 2, 3, 17.76, 1.76, '32936A4', 0, -43.543637, 172.61146299999996, '297 Lincoln Rd, Addington, Christchurch 8024, New Zealand', 4, 0.88, '2016-10-05 22:36:09'),
(8, 53, 20, 0, 2, 3, 17.76, 1.76, '8AA8A74', 0, -43.543637, 172.61146299999996, '297 Lincoln Rd, Addington, Christchurch 8024, New Zealand', 4, 0.88, '2016-10-05 22:41:01'),
(9, 53, 20, 0, 2, 3, 17.76, 1.76, '64C307E', 0, -43.543637, 172.61146299999996, '297 Lincoln Rd, Addington, Christchurch 8024, New Zealand', 4, 0.88, '2016-10-05 22:41:26'),
(10, 53, 20, 0, 1, 1, 13.76, 1.76, '4CC4807', 0, -43.543637, 172.61146299999996, '297 Lincoln Rd, Addington, Christchurch 8024, New Zealand', 4, 0.88, '2016-10-05 22:44:43'),
(11, 53, 20, 0, 1, 2, 13.76, 1.76, '930627A', 0, -43.543637, 172.61146299999996, '297 Lincoln Rd, Addington, Christchurch 8024, New Zealand', 4, 0.88, '2016-10-06 08:12:12'),
(12, 53, 20, 0, 1, 1, 6.9399999999999995, 0.94, '4B68A5D', 0, -43.54409889999999, 172.6107134, 'Addington, Christchurch, New Zealand', 1, 0.47, '2016-10-06 08:14:13'),
(14, 53, 20, 4, 1, 1, 7.76, 1.76, '77B55A3', 4, -43.543637, 172.61146299999996, '297 Lincoln Rd, Addington, Christchurch 8024, New Zealand', 4, 0.88, '2016-10-09 16:26:38'),
(15, 53, 20, 0, 1, 1, 6.18, 1.18, 'BA4EDAF', 1, -6.3660711, 106.88874009999995, 'Jl. Jambore, Cibubur, Kota Jakarta Timur, Daerah Khusus Ibukota Jakarta, Indonesia', 2, 0.59, '2016-10-09 16:32:51'),
(16, 53, 20, 0, 1, 1, 6.18, 1.18, '927D01E', 1, -6.3660711, 106.88874009999995, 'Jl. Jambore, Cibubur, Kota Jakarta Timur, Daerah Khusus Ibukota Jakarta, Indonesia', 2, 0.59, '2016-10-09 16:35:05'),
(17, 53, 20, 0, 1, 1, 6.18, 1.18, '4A854AB', 1, -6.3660711, 106.88874009999995, 'Jl. Jambore, Cibubur, Kota Jakarta Timur, Daerah Khusus Ibukota Jakarta, Indonesia', 2, 0.59, '2016-10-09 16:37:49'),
(18, 53, 20, 5, 1, 4, 21.18, 1.18, '3C06C9A', 99, -6.3660711, 106.88874009999995, 'Jl. Jambore, Cibubur, Kota Jakarta Timur, Daerah Khusus Ibukota Jakarta, Indonesia', 2, 0.59, '2016-10-09 16:39:58'),
(19, 53, 20, 5, 1, 1, 6.18, 1.18, '71044DC', 99, -6.3660711, 106.88874009999995, 'Jl. Jambore, Cibubur, Kota Jakarta Timur, Daerah Khusus Ibukota Jakarta, Indonesia', 2, 0.59, '2016-10-09 16:48:08'),
(20, 53, 20, 5, 1, 1, 6.18, 1.18, 'D04B056', 99, -6.3660711, 106.88874009999995, 'Jl. Jambore, Cibubur, Kota Jakarta Timur, Daerah Khusus Ibukota Jakarta, Indonesia', 2, 0.59, '2016-10-09 16:49:07'),
(21, 53, 20, 4, 1, 1, 6.18, 1.18, '0D16A60', 4, -6.3660711, 106.88874009999995, 'Jl. Jambore, Cibubur, Kota Jakarta Timur, Daerah Khusus Ibukota Jakarta, Indonesia', 2, 0.59, '2016-10-09 16:50:35'),
(22, 53, 20, 6, 1, 1, 6.18, 1.18, 'B7353A2', 1, -6.3660711, 106.88874009999995, 'Jl. Jambore, Cibubur, Kota Jakarta Timur, Daerah Khusus Ibukota Jakarta, Indonesia', 2, 0.59, '2016-10-09 16:52:53'),
(23, 6, 20, 0, 1, 1, 7.76, 1.76, '2860348', 0, -43.543637, 172.61146299999996, '297 Lincoln Rd, Addington, Christchurch 8024, New Zealand', 4, 0.88, '2016-10-09 20:30:12'),
(24, 53, 20, 0, 1, 1, 6.18, 1.18, '2BFC201', 1, -6.3660711, 106.88874009999995, 'Jl. Jambore, Cibubur, Kota Jakarta Timur, Daerah Khusus Ibukota Jakarta, Indonesia', 2, 0.59, '2016-10-10 13:19:36'),
(26, 53, 20, 4, 1, 1, 12.54, 7.54, '2A7AFB9', 3, -6.3473802, 106.87432160000003, 'Jl. Cibubur, Cibubur, Ciracas, Kota Jakarta Timur, Daerah Khusus Ibukota Jakarta 13720, Indonesia', 12, 3.77, '2016-10-10 16:30:49'),
(27, 53, 20, 0, 1, 1, 6.18, 1.18, 'B8EDEE3', 1, -6.3660711, 106.88874009999995, 'Jl. Jambore, Cibubur, Kota Jakarta Timur, Daerah Khusus Ibukota Jakarta, Indonesia', 2, 0.59, '2016-10-10 16:35:37'),
(28, 53, 20, 4, 1, 1, 6.18, 1.18, '4EEA16F', 99, -6.3660711, 106.88874009999995, 'Jl. Jambore, Cibubur, Kota Jakarta Timur, Daerah Khusus Ibukota Jakarta, Indonesia', 2, 0.59, '2016-10-10 16:38:46'),
(29, 53, 20, 4, 1, 1, 6.18, 1.18, 'B185DC0', 99, -6.3660711, 106.88874009999995, 'Jl. Jambore, Cibubur, Kota Jakarta Timur, Daerah Khusus Ibukota Jakarta, Indonesia', 2, 0.59, '2016-10-10 16:42:49'),
(30, 53, 20, 4, 1, 1, 6.18, 1.18, 'E6E6C7F', 99, -6.3660711, 106.88874009999995, 'Jl. Jambore, Cibubur, Kota Jakarta Timur, Daerah Khusus Ibukota Jakarta, Indonesia', 2, 0.59, '2016-10-10 16:44:59'),
(31, 53, 20, 0, 1, 1, 6.18, 1.18, '96ECDA3', 1, -6.3660711, 106.88874009999995, 'Jl. Jambore, Cibubur, Kota Jakarta Timur, Daerah Khusus Ibukota Jakarta, Indonesia', 2, 0.59, '2016-10-10 16:55:30'),
(32, 53, 20, 0, 1, 1, 5.4, 0.4, '454D59D', 1, -6.190864599999999, 106.76350330000002, 'Jalan Raya Perjuangan Kav. 8, Kebon Jeruk, Kb. Jeruk, Kota Jakarta Barat, Daerah Khusus Ibukota Jakarta 11530, Indonesia', 1, 0.2, '2016-10-10 16:58:14'),
(33, 53, 20, 0, 1, 1, 15.68, 10.68, 'D55939F', 1, -6.1777726, 106.79008859999999, 'Jalan Letjen. S. Parman Kav.28, Tanjung Duren Selatan, Grogol Petamburan, Tj. Duren Sel., Grogol petamburan, Jakarta Barat, Daerah Khusus Ibukota Jakarta 11470, Indonesia', 15, 5.34, '2016-10-10 17:05:43'),
(34, 53, 20, 0, 1, 1, 15.94, 10.94, 'C238E7E', 1, -6.1785643, 106.78993439999999, 'Jl. S. Parman Kav. 93 - 94, Slipi, Palmerah, Tj. Duren Sel., Grogol petamburan, Kota Jakarta Barat, Daerah Khusus Ibukota Jakarta 11420, Indonesia', 15, 5.47, '2016-10-10 17:06:57'),
(37, 53, 20, 0, 1, 1, 9, 4, '9B5A8B8', 1, -6.1927679, 106.76696700000002, 'Jl. Raya Perjuangan No.1, RT.11/RW.10, Kb. Jeruk, Kota Jakarta Barat, Daerah Khusus Ibukota Jakarta 12780, Indonesia', 7, 2, '2016-10-10 17:54:42'),
(38, 53, 20, 0, 1, 1, 9, 4, '75C9037', 1, -6.1927679, 106.76696700000002, 'Jl. Raya Perjuangan No.1, RT.11/RW.10, Kb. Jeruk, Kota Jakarta Barat, Daerah Khusus Ibukota Jakarta 12780, Indonesia', 7, 2, '2016-10-10 17:56:28'),
(39, 53, 20, 0, 1, 1, 9, 4, 'F1E6B30', 1, -6.1927679, 106.76696700000002, 'Jl. Raya Perjuangan No.1, RT.11/RW.10, Kb. Jeruk, Kota Jakarta Barat, Daerah Khusus Ibukota Jakarta 12780, Indonesia', 7, 2, '2016-10-10 18:03:05'),
(40, 53, 20, 0, 1, 1, 9, 4, '7C308BC', 1, -6.1927679, 106.76696700000002, 'Jl. Raya Perjuangan No.1, RT.11/RW.10, Kb. Jeruk, Kota Jakarta Barat, Daerah Khusus Ibukota Jakarta 12780, Indonesia', 7, 2, '2016-10-10 18:04:22'),
(41, 53, 20, 0, 1, 1, 9, 4, 'BBEEE65', 1, -6.1927679, 106.76696700000002, 'Jl. Raya Perjuangan No.1, RT.11/RW.10, Kb. Jeruk, Kota Jakarta Barat, Daerah Khusus Ibukota Jakarta 12780, Indonesia', 7, 2, '2016-10-10 18:08:12'),
(42, 53, 20, 0, 1, 1, 9, 4, 'E7F0DE4', 1, -6.1927679, 106.76696700000002, 'Jl. Raya Perjuangan No.1, RT.11/RW.10, Kb. Jeruk, Kota Jakarta Barat, Daerah Khusus Ibukota Jakarta 12780, Indonesia', 7, 2, '2016-10-10 18:09:22'),
(43, 53, 20, 0, 1, 1, 9, 4, 'DD4E172', 1, -6.1927679, 106.76696700000002, 'Jl. Raya Perjuangan No.1, RT.11/RW.10, Kb. Jeruk, Kota Jakarta Barat, Daerah Khusus Ibukota Jakarta 12780, Indonesia', 7, 2, '2016-10-10 18:10:49'),
(44, 53, 20, 0, 1, 1, 9, 4, '001F10A', 1, -6.1927679, 106.76696700000002, 'Jl. Raya Perjuangan No.1, RT.11/RW.10, Kb. Jeruk, Kota Jakarta Barat, Daerah Khusus Ibukota Jakarta 12780, Indonesia', 7, 2, '2016-10-10 18:12:25'),
(45, 53, 20, 0, 1, 1, 9, 4, '173F02D', 1, -6.1927679, 106.76696700000002, 'Jl. Raya Perjuangan No.1, RT.11/RW.10, Kb. Jeruk, Kota Jakarta Barat, Daerah Khusus Ibukota Jakarta 12780, Indonesia', 7, 2, '2016-10-10 18:13:34'),
(46, 53, 20, 4, 1, 1, 9, 4, '12119DE', 1, -6.1927679, 106.76696700000002, 'Jl. Raya Perjuangan No.1, RT.11/RW.10, Kb. Jeruk, Kota Jakarta Barat, Daerah Khusus Ibukota Jakarta 12780, Indonesia', 7, 2, '2016-10-10 18:15:47'),
(48, 53, 20, 6, 1, 2, 14, 4, 'BCE4272', 3, -6.1927679, 106.76696700000002, 'Jl. Raya Perjuangan No.1, RT.11/RW.10, Kb. Jeruk, Kota Jakarta Barat, Daerah Khusus Ibukota Jakarta 12780, Indonesia', 7, 2, '2016-10-12 02:04:06'),
(49, 53, 20, 0, 1, 3, 19, 4, '01E4963', 1, -6.1927679, 106.76696700000002, 'Jl. Raya Perjuangan No.1, RT.11/RW.10, Kb. Jeruk, Kota Jakarta Barat, Daerah Khusus Ibukota Jakarta 12780, Indonesia', 7, 2, '2016-10-13 09:56:49'),
(50, 53, 20, 0, 1, 1, 71.84, 66.84, '9921C58', 1, -6.3747299, 106.87563509999995, 'Cibubur, Cisalak Ps., Cimanggis, Kota Depok, Jawa Barat, Indonesia', 83, 33.42, '2016-10-20 11:35:35'),
(51, 53, 20, 0, 1, 1, 71.84, 66.84, 'B62C208', 1, -6.3747299, 106.87563509999995, 'Cibubur, Cisalak Ps., Cimanggis, Kota Depok, Jawa Barat, Indonesia', 83, 33.42, '2016-10-20 11:44:03'),
(52, 53, 20, 0, 1, 1, 64.3, 59.3, 'A68FC08', 1, -6.3572276, 106.87398630000007, 'Jalan Cibubur II, RT.6/RW.10, Cibubur, Ciracas, Kota Jakarta Timur, Daerah Khusus Ibukota Jakarta 13720, Indonesia', 77, 29.65, '2016-10-20 11:47:14'),
(53, 53, 20, 6, 1, 1, 13.26, 8.26, 'F433A44', 99, -6.3696207, 106.89414299999999, 'Jalan Jambore Raya No. 1, Cibubur, Ciracas, Cibubur, Ciracas, Jakarta Timur, Daerah Khusus Ibukota Jakarta 13720, Indonesia', 15, 4.13, '2016-10-20 11:49:03'),
(54, 53, 20, 6, 1, 1, 13.26, 8.26, 'CDE7FB2', 99, -6.3696207, 106.89414299999999, 'Jalan Jambore Raya No. 1, Cibubur, Ciracas, Cibubur, Ciracas, Jakarta Timur, Daerah Khusus Ibukota Jakarta 13720, Indonesia', 15, 4.13, '2016-10-20 11:50:23'),
(55, 53, 20, 6, 1, 1, 13.26, 8.26, 'D9487C4', 99, -6.3696207, 106.89414299999999, 'Jalan Jambore Raya No. 1, Cibubur, Ciracas, Cibubur, Ciracas, Jakarta Timur, Daerah Khusus Ibukota Jakarta 13720, Indonesia', 15, 4.13, '2016-10-20 11:51:30'),
(56, 53, 20, 6, 1, 1, 13.26, 8.26, '1AB87C0', 2, -6.3696207, 106.89414299999999, 'Jalan Jambore Raya No. 1, Cibubur, Ciracas, Cibubur, Ciracas, Jakarta Timur, Daerah Khusus Ibukota Jakarta 13720, Indonesia', 15, 4.13, '2016-10-20 11:53:06'),
(57, 53, 20, 6, 1, 1, 13.26, 8.26, '0385846', 1, -6.3696207, 106.89414299999999, 'Jalan Jambore Raya No. 1, Cibubur, Ciracas, Cibubur, Ciracas, Jakarta Timur, Daerah Khusus Ibukota Jakarta 13720, Indonesia', 15, 4.13, '2016-10-20 11:54:53'),
(58, 53, 20, 6, 1, 1, 13.26, 8.26, 'DB1CC67', 99, -6.3696207, 106.89414299999999, 'Jalan Jambore Raya No. 1, Cibubur, Ciracas, Cibubur, Ciracas, Jakarta Timur, Daerah Khusus Ibukota Jakarta 13720, Indonesia', 15, 4.13, '2016-10-20 11:57:02'),
(59, 53, 20, 6, 1, 1, 13.26, 8.26, '1968EFC', 1, -6.3696207, 106.89414299999999, 'Jalan Jambore Raya No. 1, Cibubur, Ciracas, Cibubur, Ciracas, Jakarta Timur, Daerah Khusus Ibukota Jakarta 13720, Indonesia', 15, 4.13, '2016-10-20 11:59:13'),
(60, 53, 20, 6, 1, 1, 13.26, 8.26, '99BC810', 1, -6.3696207, 106.89414299999999, 'Jalan Jambore Raya No. 1, Cibubur, Ciracas, Cibubur, Ciracas, Jakarta Timur, Daerah Khusus Ibukota Jakarta 13720, Indonesia', 15, 4.13, '2016-10-20 12:02:25'),
(61, 53, 20, 6, 1, 1, 13.26, 8.26, 'A27E904', 99, -6.3696207, 106.89414299999999, 'Jalan Jambore Raya No. 1, Cibubur, Ciracas, Cibubur, Ciracas, Jakarta Timur, Daerah Khusus Ibukota Jakarta 13720, Indonesia', 15, 4.13, '2016-10-20 12:13:39'),
(62, 53, 20, 6, 1, 1, 13.26, 8.26, '0517662', 99, -6.3696207, 106.89414299999999, 'Jalan Jambore Raya No. 1, Cibubur, Ciracas, Cibubur, Ciracas, Jakarta Timur, Daerah Khusus Ibukota Jakarta 13720, Indonesia', 15, 4.13, '2016-10-20 12:15:26'),
(63, 53, 20, 6, 1, 1, 13.26, 8.26, 'E23BAD4', 2, -6.3696207, 106.89414299999999, 'Jalan Jambore Raya No. 1, Cibubur, Ciracas, Cibubur, Ciracas, Jakarta Timur, Daerah Khusus Ibukota Jakarta 13720, Indonesia', 15, 4.13, '2016-10-20 12:19:05'),
(64, 53, 20, 6, 1, 1, 13.26, 8.26, '8DC8234', 2, -6.3696207, 106.89414299999999, 'Jalan Jambore Raya No. 1, Cibubur, Ciracas, Cibubur, Ciracas, Jakarta Timur, Daerah Khusus Ibukota Jakarta 13720, Indonesia', 15, 4.13, '2016-10-20 12:25:19'),
(65, 53, 20, 6, 1, 1, 13.26, 8.26, 'C5B1A01', 2, -6.3696207, 106.89414299999999, 'Jalan Jambore Raya No. 1, Cibubur, Ciracas, Cibubur, Ciracas, Jakarta Timur, Daerah Khusus Ibukota Jakarta 13720, Indonesia', 15, 4.13, '2016-10-20 12:27:06'),
(66, 53, 20, 6, 1, 1, 13.26, 8.26, '8602FDD', 2, -6.3696207, 106.89414299999999, 'Jalan Jambore Raya No. 1, Cibubur, Ciracas, Cibubur, Ciracas, Jakarta Timur, Daerah Khusus Ibukota Jakarta 13720, Indonesia', 15, 4.13, '2016-10-20 12:28:27'),
(67, 53, 20, 6, 1, 1, 13.26, 8.26, '7300BB6', 99, -6.3696207, 106.89414299999999, 'Jalan Jambore Raya No. 1, Cibubur, Ciracas, Cibubur, Ciracas, Jakarta Timur, Daerah Khusus Ibukota Jakarta 13720, Indonesia', 15, 4.13, '2016-10-20 12:32:23');

-- --------------------------------------------------------

--
-- Table structure for table `order_detail`
--

CREATE TABLE `order_detail` (
  `id` int(11) NOT NULL,
  `code` varchar(255) NOT NULL,
  `product_id` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `sub_total` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `order_detail`
--

INSERT INTO `order_detail` (`id`, `code`, `product_id`, `qty`, `sub_total`) VALUES
(77, '9abb2', 8, 2, 4),
(79, '0e606', 8, 4, 8),
(80, 'ffc4fed', 6, 1, 3.75),
(81, 'd1c9a2c', 7, 2, 10),
(82, 'd1c9a2c', 6, 1, 3.75),
(83, '102da3c', 5, 1, 6),
(84, '8180ed3', 5, 1, 6),
(85, '5c2eb8f', 5, 1, 6),
(89, '0c9d16e', 5, 7, 42),
(90, 'efd36b9', 5, 26, 156),
(91, '2093ce9', 5, 7, 42),
(92, 'e5ad2f', 5, 3, 18),
(93, '24e9298', 6, 3, 11.25),
(94, '24e9298', 7, 3, 15),
(95, '24e9298', 9, 5, 10),
(96, '24e9298', 10, 3, 71.37),
(97, 'da3e850', 6, 2, 7.5),
(98, 'da3e850', 7, 2, 10),
(99, 'da3e850', 9, 3, 6),
(100, 'da3e850', 10, 1, 23.79),
(101, '6a47ad6', 6, 1, 3.75),
(102, '6a47ad6', 7, 2, 10),
(103, '6a47ad6', 9, 1, 2),
(104, 'ff4500a', 11, 6, 12),
(105, '7b37f88', 11, 6, 12),
(106, '3a685df', 11, 5, 10),
(107, '6bcaeeb', 11, 1, 2),
(108, '4b2d1e0', 11, 1, 2),
(109, '278a2b7', 11, 3, 6),
(110, '3a7c219', 5, 1, 6),
(111, '3d19af4', 11, 7, 14),
(112, '916b019', 11, 4, 8),
(113, 'a627db4', 11, 1, 2),
(114, '88567d8', 6, 2, 7.5),
(115, 'f14e82d', 6, 1, 3.75),
(116, '503455b', 7, 1, 5),
(117, '8268d95', 8, 1, 2),
(118, '965c4f7', 5, 9, 54),
(119, 'ed66add', 11, 5, 10),
(120, 'bf5dfc7', 5, 2, 12),
(121, 'bc298cb', 5, 1, 6),
(122, '489bc4f', 5, 1, 6),
(123, 'fa29e1c', 5, 1, 6),
(124, '4339aa', 5, 3, 18),
(125, '7df21a3', 5, 1, 6),
(127, '884e49c', 11, 1, 2),
(128, 'd0f15a0', 11, 1, 2),
(130, '6386e8b', 11, 5, 10),
(131, 'a1896e5', 11, 1, 2),
(134, 'ef88486', 13, 1, 20),
(135, 'ef837d9', 11, 2, 4),
(136, '1d0260c', 13, 1, 20),
(138, 'bdbd62d', 8, 1, 4),
(139, '5b98739', 8, 1, 4),
(140, '880864a', 13, 1, 20),
(141, '5074fa4', 6, 5, 18.75),
(142, '678a788', 19, 1, 5),
(143, 'a8ebe9', 19, 1, 5),
(144, 'b26a4a5', 19, 1, 5),
(145, '2bbfc64', 19, 1, 5),
(146, 'be21126', 19, 2, 10),
(147, 'BCE4272', 19, 2, 10),
(148, '01E4963', 19, 3, 15),
(149, '9921C58', 19, 1, 5),
(150, 'B62C208', 19, 1, 5),
(151, 'A68FC08', 19, 1, 5),
(152, 'F433A44', 19, 1, 5),
(153, 'CDE7FB2', 19, 1, 5),
(154, 'D9487C4', 19, 1, 5),
(155, '1AB87C0', 19, 1, 5),
(156, '0385846', 19, 1, 5),
(157, 'DB1CC67', 19, 1, 5),
(158, '1968EFC', 19, 1, 5),
(159, '99BC810', 19, 1, 5),
(160, 'A27E904', 19, 1, 5),
(161, '0517662', 19, 1, 5),
(162, 'E23BAD4', 19, 1, 5),
(163, '8DC8234', 19, 1, 5),
(164, 'C5B1A01', 19, 1, 5),
(165, '8602FDD', 19, 1, 5),
(166, '7300BB6', 19, 1, 5),
(168, '61efc3d', 19, 1, 5),
(169, 'ed01e8c', 19, 1, 5),
(170, '6de20a5', 19, 2, 10),
(171, '224b441', 22, 1, 9),
(172, 'e64fa26', 21, 1, 6),
(175, '9516782', 19, 1, 5),
(176, '5f107d4', 19, 6, 30);

-- --------------------------------------------------------

--
-- Table structure for table `order_history`
--

CREATE TABLE `order_history` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `restaurant_id` int(11) NOT NULL,
  `driver_id` int(11) NOT NULL,
  `total_product` int(11) NOT NULL,
  `total_qty` int(11) NOT NULL,
  `total_price` double NOT NULL,
  `delivery_cost` double NOT NULL,
  `code` varchar(255) NOT NULL,
  `status` int(11) NOT NULL,
  `latitude` double NOT NULL,
  `longitude` double NOT NULL,
  `address` varchar(255) NOT NULL,
  `estimation_time` int(11) NOT NULL,
  `distance` double NOT NULL,
  `date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `order_history`
--

INSERT INTO `order_history` (`id`, `user_id`, `restaurant_id`, `driver_id`, `total_product`, `total_qty`, `total_price`, `delivery_cost`, `code`, `status`, `latitude`, `longitude`, `address`, `estimation_time`, `distance`, `date`) VALUES
(1, 33, 20, 4, 1, 2, 4, 9.12, '9abb2', 4, -6.151565799999999, 106.91413499999999, 'Gading Nirwana VIII, Pegangsaan Dua, Klp. Gading, Kota Jkt Utara, Daerah Khusus Ibukota Jakarta 14250, Indonesia', 27, 4.6, '2016-08-25 22:23:38'),
(2, 33, 16, 4, 2, 3, 13.75, 7.83, 'd1c9a2c', 4, -43.5309739, 172.6065565, '1A Kipax Pl, Riccarton, Christchurch 8011, New Zealand', 24, 3.9, '2016-08-27 15:00:49'),
(3, 33, 17, 4, 1, 1, 6, 3.94, '102da3c', 4, -43.5309739, 172.6065565, '1A Kipax Pl, Riccarton, Christchurch 8011, New Zealand', 19, 2, '2016-08-29 20:30:57'),
(4, 33, 17, 4, 1, 1, 6, 3.94, '8180ed3', 4, -43.5309739, 172.6065565, '1A Kipax Pl, Riccarton, Christchurch 8011, New Zealand', 19, 2, '2016-08-29 22:40:24'),
(5, 33, 17, 4, 1, 1, 6, 5, '5c2eb8f', 4, -43.5309739, 172.6065565, '1A Kipax Pl, Riccarton, Christchurch 8011, New Zealand', 19, 2, '2016-08-29 22:47:16'),
(6, 33, 17, 4, 1, 7, 42, 5, '2093ce9', 2, -43.5309739, 172.6065565, '1A Kipax Pl, Riccarton, Christchurch 8011, New Zealand', 19, 2, '2016-08-29 23:24:11'),
(7, 33, 17, 4, 1, 3, 18, 5, 'e5ad2f', 4, -43.5309739, 172.6065565, '1A Kipax Pl, Riccarton, Christchurch 8011, New Zealand', 19, 2, '2016-08-29 23:27:53'),
(8, 33, 16, 4, 4, 8, 47.29, 7.83, 'da3e850', 2, -43.5309739, 172.6065565, '1A Kipax Pl, Riccarton, Christchurch 8011, New Zealand', 24, 3.9, '2016-08-30 14:06:13'),
(9, 33, 16, 4, 3, 4, 15.75, 7.83, '6a47ad6', 4, -43.5309739, 172.6065565, '1A Kipax Pl, Riccarton, Christchurch 8011, New Zealand', 24, 3.9, '2016-08-30 14:07:17'),
(10, 33, 21, 4, 1, 6, 12, 6.62, 'ff4500a', 4, -6.152539300000001, 106.89408930000002, 'Jl. Raya Boulevard Barat, Plaza Pasifik, Blok B2 No 43-45, Klp. Gading Bar., Klp. Gading, Kota Jkt Utara, Daerah Khusus Ibukota Jakarta 14240, Indonesia', 24, 3.3, '2016-08-31 22:27:58'),
(11, 33, 21, 4, 1, 6, 12, 7.55, '7b37f88', 4, -6.1508029, 106.89211620000003, 'Kelapa Gading Square, Jl. Raya Boulevard Barat, Kelapa Gading, Klp. Gading Bar., Klp. Gading, Jakarta Utara, Daerah Khusus Ibukota Jakarta 14240, Indonesia', 27, 3.8, '2016-08-31 15:43:17'),
(12, 33, 21, 3, 1, 5, 10, 8.88, '3a685df', 4, -6.141126699999999, 106.89796339999998, 'Gading Kirana Utara, Klp. Gading Bar., Klp. Gading, Kota Jkt Utara, Daerah Khusus Ibukota Jakarta 14240, Indonesia', 34, 4.4, '2016-08-31 15:45:51'),
(13, 33, 21, 4, 1, 1, 2, 5.42, '6bcaeeb', 4, -6.1654778, 106.90046710000001, 'Jl. Janur Hijau XIII, Klp. Gading Tim., Klp. Gading, Kota Jkt Utara, Daerah Khusus Ibukota Jakarta 14240, Indonesia', 24, 2.7, '2016-08-31 22:57:54'),
(14, 33, 21, 4, 1, 1, 2, 5, '4b2d1e0', 4, -6.167393399999999, 106.9066785, 'Jl. KLP. Cengkir Timur III, Klp. Gading Tim., Klp. Gading, Kota Jkt Utara, Daerah Khusus Ibukota Jakarta 14240, Indonesia', 22, 1.5, '2016-08-31 23:13:22'),
(15, 33, 21, 4, 1, 3, 6, 6.78, '278a2b7', 4, -6.162092299999999, 106.9216877, 'RW.3, Pegangsaan Dua, Klp. Gading, Kota Jkt Utara, Daerah Khusus Ibukota Jakarta 14250, Indonesia', 26, 3.4, '2016-08-31 23:15:28'),
(16, 33, 17, 4, 1, 1, 6, 5, '3a7c219', 4, -6.1545614, 106.90407679999998, 'Jalan Kintamani No. 22, Kelapa Gading, Klp. Gading Bar., Klp. Gading, Jakarta Utara, Daerah Khusus Ibukota Jakarta 14240, Indonesia', 15, 0, '2016-08-31 23:22:01'),
(17, 33, 21, 4, 1, 7, 14, 5, '3d19af4', 4, -6.141436499999999, 106.91140129999997, 'Jalan Permata Indah, RT 09 / RW 04, Tugu Selatan, Koja, Tugu Sel., Koja, Kota Jkt Utara, Daerah Khusus Ibukota Jakarta 14260, Indonesia', 23, 2.3, '2016-08-31 23:30:39'),
(18, 33, 21, 4, 1, 4, 8, 5, '916b019', 4, -6.1604549, 106.90546180000001, 'Kelapa Gading, North Jakarta City, Special Capital Region of Jakarta, Indonesia', 19, 1.1, '2016-09-01 03:43:36'),
(19, 33, 21, 4, 1, 1, 2, 9.9, 'a627db4', 4, -6.142641999999999, 106.89111700000001, 'RT.10/RW.11, Klp. Gading Bar., Klp. Gading, Kota Jkt Utara, Daerah Khusus Ibukota Jakarta 14240, Indonesia', 28, 5, '2016-09-01 03:59:41'),
(20, 33, 16, 4, 1, 2, 7.5, 7.83, '88567d8', 4, -43.5309739, 172.6065565, '1A Kipax Pl, Riccarton, Christchurch 8011, New Zealand', 24, 3.9, '2016-09-01 16:01:04'),
(21, 33, 16, 4, 1, 1, 5, 7.83, '503455b', 4, -43.5309739, 172.6065565, '1A Kipax Pl, Riccarton, Christchurch 8011, New Zealand', 24, 3.9, '2016-09-01 16:57:24'),
(22, 33, 20, 4, 1, 1, 2, 5, '8268d95', 4, -43.5309739, 172.6065565, '1A Kipax Pl, Riccarton, Christchurch 8011, New Zealand', 15, 0, '2016-09-01 17:17:49'),
(23, 33, 17, 4, 1, 9, 54, 5, '965c4f7', 4, -43.5309739, 172.6065565, '1A Kipax Pl, Riccarton, Christchurch 8011, New Zealand', 15, 0, '2016-09-01 17:29:31'),
(24, 33, 21, 4, 1, 5, 10, 9.9, 'ed66add', 4, -6.142641999999999, 106.89111700000001, 'RT.10/RW.11, Klp. Gading Bar., Klp. Gading, Kota Jkt Utara, Daerah Khusus Ibukota Jakarta 14240, Indonesia', 28, 5, '2016-09-01 17:31:57'),
(25, 33, 17, 4, 1, 1, 6, 5, 'bc298cb', 4, -43.5309739, 172.6065565, '1A Kipax Pl, Riccarton, Christchurch 8011, New Zealand', 19, 2, '2016-09-02 16:53:28'),
(26, 33, 17, 4, 1, 1, 6, 5, '489bc4f', 4, -43.5309739, 172.6065565, '1A Kipax Pl, Riccarton, Christchurch 8011, New Zealand', 19, 2, '2016-09-02 22:15:52'),
(27, 48, 17, 4, 1, 3, 18, 14.53, '4339aa', 4, -43.529533, 172.55565720000004, '20 Bucknell St, Sockburn, Christchurch 8042, New Zealand', 26, 7.3, '2016-09-05 20:57:44'),
(28, 33, 20, 4, 1, 1, 20, 199.93, '1d0260c', 4, -6.2017374, 106.78152709999995, 'Jl. Kebon Jeruk Raya No. 27, Kebon Jeruk, Kb. Jeruk, Jakarta Barat, Daerah Khusus Ibukota Jakarta 11530, Indonesia', 51, 28.2, '2016-09-19 14:13:33'),
(29, 33, 20, 4, 1, 1, 4, 18.14, '5b98739', 4, -6.1554382, 106.89667439999994, 'Jl. Boulevard Bar. Raya, Klp. Gading, Kota Jkt Utara, Daerah Khusus Ibukota Jakarta, Indonesia', 22, 2.6, '2016-09-19 14:33:37'),
(30, 33, 20, 4, 1, 1, 20, 35.32, '880864a', 4, -6.1649888, 106.91425430000004, 'Jl. Boulevard Timur No. 88, Kelapa Gading, Pegangsaan Dua, Klp. Gading, Jakarta Utara, Daerah Khusus Ibukota Jakarta, Indonesia', 29, 5, '2016-09-19 15:02:09'),
(31, 33, 20, 4, 1, 1, 5, 35.17, 'b26a4a5', 4, -6.142641999999999, 106.89111700000001, 'RT.10/RW.11, Klp. Gading Bar., Klp. Gading, Kota Jkt Utara, Daerah Khusus Ibukota Jakarta 14240, Indonesia', 53, 17.6, '2016-10-10 22:09:54'),
(32, 33, 20, 4, 1, 1, 5, 41.56, '2bbfc64', 4, -6.1649888, 106.91425430000004, 'Jl. Boulevard Timur No. 88, Kelapa Gading, Pegangsaan Dua, Klp. Gading, Kota Jkt Utara, Daerah Khusus Ibukota Jakarta, Indonesia', 63, 20.8, '2016-10-10 22:13:52'),
(33, 33, 20, 4, 1, 2, 10, 38.62, 'be21126', 4, -6.164619299999999, 106.9032813, 'JL. Boulevard Raya, Blok QA-5/2, Jakarta, East Kelapa Gading, Kelapa Gading, North Jakarta City, Special Capital Region of Jakarta, Indonesia', 59, 19.3, '2016-10-10 23:18:25'),
(34, 33, 20, 4, 1, 2, 10, 62.2, '6de20a5', 4, -6.1510498, 106.89208269999995, 'Jl. Boulevard Barat Raya, Kelapa Gading Barat, Kelapa Gading, RT. 18 / RW. 8, Kelapa Gading Barat, Klp. Gading Bar., Klp. Gading, Jakarta Utara, Daerah Khusus Ibukota Jakarta 14240, Indonesia', 61, 31.1, '2016-12-02 18:00:09'),
(35, 33, 21, 4, 1, 1, 9, 5, '224b441', 4, -43.5309739, 172.6065565, '1A Kipax Pl, Riccarton, Christchurch 8011, New Zealand', 15, 0, '2016-12-21 01:28:08'),
(36, 33, 20, 4, 1, 6, 30, 65.33, '5f107d4', 4, -6.157350600000001, 106.90868909999995, 'Mall Klp. Gading, Jl. Boulevard Raya, Klp. Gading Tim., Klp. Gading, Kota Jkt Utara, Daerah Khusus Ibukota Jakarta 14240, Indonesia', 65, 32.7, '2017-01-16 16:44:17');

-- --------------------------------------------------------

--
-- Table structure for table `restaurants`
--

CREATE TABLE `restaurants` (
  `id` int(20) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `cuisine_id` varchar(255) DEFAULT NULL,
  `longitude` double DEFAULT NULL,
  `latitude` double DEFAULT NULL,
  `photo` varchar(255) DEFAULT NULL,
  `thumb` varchar(255) NOT NULL,
  `telephone` varchar(255) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `created` date DEFAULT NULL,
  `is_verified` int(11) NOT NULL DEFAULT '0',
  `type` varchar(255) NOT NULL DEFAULT 'client'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `restaurants`
--

INSERT INTO `restaurants` (`id`, `username`, `password`, `name`, `address`, `cuisine_id`, `longitude`, `latitude`, `photo`, `thumb`, `telephone`, `email`, `created`, `is_verified`, `type`) VALUES
(17, 'subwayaddington', 'd3623c77578eebdac371c5f82d23c3fb4376396cdb4c7045c933398105db60f9e56c7c3f3af8474ee155a0804ea6f193e66555d76362ecf2675802e4f1a2387d', 'Subway Addington', '359 Lincoln Rd, Addington, Christchurch 8024, New Zealand', '15, 16', 172.61484180000002, -43.54124820000001, 'uploads/restaurant/subwayaddington/photo.jpg', 'uploads/restaurant/subwayaddington/photo_thumb.jpg', '+628131687899', 'subway@addington.com', '2016-12-20', 1, 'client'),
(19, 'topkapi', 'd3623c77578eebdac371c5f82d23c3fb4376396cdb4c7045c933398105db60f9e56c7c3f3af8474ee155a0804ea6f193e66555d76362ecf2675802e4f1a2387d', 'Topkapi Restaurant', '64 Manchester St, Christchurch Central, Christchurch 8011, New Zealand', '17, 18', 172.63983099999996, -43.5368573, 'uploads/restaurant/topkapi/photo.jpg', 'uploads/restaurant/topkapi/photo_thumb.jpg', '+812345678901', 'topkapi@gmail.com', '2016-10-05', 1, 'client'),
(20, 'mcd', 'd3623c77578eebdac371c5f82d23c3fb4376396cdb4c7045c933398105db60f9e56c7c3f3af8474ee155a0804ea6f193e66555d76362ecf2675802e4f1a2387d', 'McDonalds', 'Jl. Boulevard Artha Gading Kav. D-01, Kelapa Gading, Klp. Gading Bar., Klp. Gading, Kota Jkt Utara, Daerah Khusus Ibukota Jakarta 14240, Indonesia', '18', 106.87398630000007, -6.3572276, 'uploads/restaurant/mcd/photo.jpg', 'uploads/restaurant/mcd/photo_thumb.jpg', '+081316361519', 'mmcd@mcd.xom', '2016-10-05', 1, 'client'),
(21, 'sushitei', 'd3623c77578eebdac371c5f82d23c3fb4376396cdb4c7045c933398105db60f9e56c7c3f3af8474ee155a0804ea6f193e66555d76362ecf2675802e4f1a2387d', 'Sushi Tei', 'Mall Kelapa Gading 5 Lantai 1 Unit 47, JL Boulevard Kelapa Gading Utara, Klp. Gading Tim., Klp. Gading, Kota Jkt Utara, Daerah Khusus Ibukota Jakarta 14240, Indonesia', '16, 17, 18', 106.91012309999996, -6.156939299999998, 'uploads/restaurant/sushitei/photo.jpg', 'uploads/restaurant/sushitei/photo_thumb.jpg', '+812345678901', 'sushitei@gethassee.com', '2016-10-05', 1, 'client'),
(23, 'bukris', 'd3623c77578eebdac371c5f82d23c3fb4376396cdb4c7045c933398105db60f9e56c7c3f3af8474ee155a0804ea6f193e66555d76362ecf2675802e4f1a2387d', 'Warung Bu Kris', 'Komplek Graha Parkview Blok ZD 01, Jl. Raya Boulevar Timur, Kelapa Gading, Pegangsaan Dua, Klp. Gading, Kota Jkt Utara, Daerah Khusus Ibukota Jakarta 14240, Indonesia', '15', 106.913007, -6.165606199999999, 'uploads/restaurant/bukris/photo.jpg', 'uploads/restaurant/bukris/photo_thumb.jpg', '+6429379139840', 'bukris@gethassee.com', '2016-10-05', 1, 'client'),
(25, 'chicken', NULL, 'Chicken Cheese', 'Jl. Darmo Raya No.123-125, Darmo, Wonokromo, Kota SBY, Jawa Timur 60241, Indonesia', '16, 18', 112.739462, -7.2932499, 'uploads/restaurant/chicken/photo.jpg', 'uploads/restaurant/chicken/photo_thumb.jpg', '+6490909090', 'setyawansusanto@icloud.com', '2017-01-16', 0, 'client'),
(26, 'pan', NULL, 'irpan resto', 'Plaza Senayan, Gelora, Tanah Abang, Central Jakarta City, Special Capital Region of Jakarta 10270, Indonesia', '16', 106.7999552, -6.225580899999999, 'uploads/restaurant/pan/photo.jpg', 'uploads/restaurant/pan/photo_thumb.jpg', '+648238183', 'irvan.winata@yahoo.com', '2017-01-18', 0, 'client');

-- --------------------------------------------------------

--
-- Table structure for table `restaurant_time`
--

CREATE TABLE `restaurant_time` (
  `id` int(11) NOT NULL,
  `restaurant_id` varchar(255) DEFAULT NULL,
  `day` varchar(255) DEFAULT NULL,
  `opentime` time DEFAULT NULL,
  `closetime` time DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `restaurant_time`
--

INSERT INTO `restaurant_time` (`id`, `restaurant_id`, `day`, `opentime`, `closetime`) VALUES
(12, '18', 'Tuesday', '01:01:00', '12:59:00'),
(66, '16', 'Tuesday', '00:00:00', '23:59:00'),
(67, '16', 'Thursday', '10:00:00', '22:00:00'),
(68, '16', 'Friday', '00:00:00', '23:00:00'),
(69, '16', 'Sunday', '10:00:00', '22:00:00'),
(93, '22', 'Wednesday', '00:00:00', '23:59:00'),
(94, '23', 'Wednesday', '08:00:00', '23:59:00'),
(102, '21', 'Tuesday', '00:00:00', '23:59:00'),
(103, '21', 'Wednesday', '00:00:00', '23:59:00'),
(104, '21', 'Thursday', '00:00:00', '23:59:00'),
(105, '19', 'Tuesday', '10:00:00', '23:59:00'),
(106, '20', 'Monday', '00:00:00', '23:59:00'),
(107, '20', 'Tuesday', '00:00:00', '23:59:00'),
(108, '20', 'Wednesday', '00:00:00', '23:59:00'),
(109, '20', 'Thursday', '00:00:00', '23:59:00'),
(110, '20', 'Friday', '00:00:00', '23:59:00'),
(111, '20', 'Saturday', '00:00:00', '23:59:00'),
(112, '20', 'Sunday', '00:00:00', '23:59:00'),
(127, '17', 'Monday', '08:00:00', '23:59:00'),
(128, '17', 'Tuesday', '07:00:00', '23:59:00'),
(129, '17', 'Wednesday', '07:00:00', '23:59:00'),
(130, '17', 'Thursday', '07:00:00', '23:59:00'),
(131, '17', 'Friday', '07:00:00', '23:59:00'),
(132, '17', 'Saturday', '00:00:00', '11:59:00'),
(133, '17', 'Sunday', '00:00:00', '11:59:00'),
(134, '25', 'Monday', '00:12:00', '00:12:00'),
(135, '25', 'Tuesday', '14:11:00', '02:12:00'),
(136, '26', 'Monday', '00:00:00', '22:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `review`
--

CREATE TABLE `review` (
  `id` int(11) NOT NULL,
  `restaurant_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `review` varchar(255) NOT NULL,
  `rating` int(11) NOT NULL DEFAULT '0',
  `date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `review`
--

INSERT INTO `review` (`id`, `restaurant_id`, `user_id`, `review`, `rating`, `date`) VALUES
(12, 16, 33, 'This is too good\r<br />\r<br />hehe', 5, '2016-08-15 21:03:25'),
(13, 16, 33, 'josua tai', 5, '2016-08-16 03:26:49'),
(14, 20, 33, 'Bla bla bla\r<br />\r<br />', 5, '2016-08-26 19:06:22'),
(15, 20, 33, 'BNNla bla bla', 5, '2016-08-26 19:07:40'),
(16, 20, 33, 'BNNla bla bla', 5, '2016-08-26 19:19:41'),
(17, 20, 33, 'res', 5, '2016-08-26 19:20:08'),
(18, 20, 33, 'ressat', 5, '2016-08-26 19:20:29'),
(19, 23, 33, 'apa kabar', 5, '2016-10-05 15:55:53'),
(20, 20, 33, 'test\r<br />', 5, '2016-11-05 20:20:20'),
(21, 17, 33, 'test', 5, '2016-11-21 21:25:41'),
(22, 19, 33, 'Very well\r<br />', 5, '2017-01-16 22:10:22');

-- --------------------------------------------------------

--
-- Table structure for table `transaction`
--

CREATE TABLE `transaction` (
  `id` int(11) NOT NULL,
  `code` varchar(255) NOT NULL,
  `driver_id` int(11) NOT NULL,
  `driver_earnings` double NOT NULL,
  `ezpz_earnings` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transaction`
--

INSERT INTO `transaction` (`id`, `code`, `driver_id`, `driver_earnings`, `ezpz_earnings`) VALUES
(1, 'd1c9a2c', 4, 4.3848, 3.4452),
(2, '102da3c', 4, 2.2064, 1.7336),
(3, '8180ed3', 4, 2.2064, 1.7336),
(4, '5c2eb8f', 4, 2.8, 2.2),
(5, '2093ce9', 4, 1.4, 1.1),
(6, 'e5ad2f', 4, 2.8, 2.2),
(7, 'da3e850', 4, 2.19, 1.72),
(8, '6a47ad6', 4, 4.38, 3.45),
(10, 'ff4500a', 4, 3.71, 2.91),
(11, '7b37f88', 4, 4.23, 3.32),
(12, '3a685df', 3, 4.97, 3.91),
(13, '6bcaeeb', 4, 0, 0),
(14, '4b2d1e0', 4, 0, 0),
(15, '278a2b7', 4, 0, 0),
(16, '3a7c219', 4, 2.8, 2.2),
(17, '3d19af4', 4, 2.8, 2.2),
(18, '916b019', 4, 2.8, 2.2),
(19, 'a627db4', 4, 5.54, 4.36),
(20, '88567d8', 4, 4.38, 3.45),
(21, '503455b', 4, 4.38, 3.45),
(22, '8268d95', 4, 2.8, 2.2),
(23, '965c4f7', 4, 2.8, 2.2),
(24, 'ed66add', 4, 5.54, 4.36),
(25, 'bc298cb', 4, 2.8, 2.2),
(26, '489bc4f', 4, 2.8, 2.2),
(27, '4339aa', 4, 8.14, 6.39),
(28, '1d0260c', 4, 111.96, 87.97),
(29, '5b98739', 4, 10.16, 7.98),
(30, '880864a', 4, 19.78, 15.54),
(31, 'b26a4a5', 4, 19.7, 15.47),
(32, 'be21126', 4, 21.63, 16.99),
(33, '6de20a5', 4, 34.83, 27.37),
(34, '224b441', 4, 2.8, 2.2);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `firstname` varchar(255) DEFAULT NULL,
  `lastname` varchar(255) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `latitude` double NOT NULL,
  `longitude` double NOT NULL,
  `telephone` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `photo` varchar(255) DEFAULT NULL,
  `credits` double NOT NULL DEFAULT '0',
  `verification_code` varchar(255) DEFAULT NULL,
  `is_verified` int(20) DEFAULT '0',
  `created` date NOT NULL,
  `type` varchar(255) NOT NULL DEFAULT 'user'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `firstname`, `lastname`, `email`, `latitude`, `longitude`, `telephone`, `address`, `photo`, `credits`, `verification_code`, `is_verified`, `created`, `type`) VALUES
(33, 'irvan', 'adf6ca811c261903648252517331bb1260a8bfc5601d853bc86d7083066b3eaaceab68b38b52ce15039e2d050441290b871294f8ea50ea1f34b8041a8c84b8fd', 'Irvan', 'Winata', 'irpanwinata@gmail.com', -43.5309739, 172.6065565, '+628131687897', '1A Kipax Pl, Riccarton, Christchurch 8011, New Zealand', 'uploads/user/irvan/photo.jpg', 400465.575, NULL, 1, '2016-08-15', 'user'),
(38, 'Reyner', 'd3623c77578eebdac371c5f82d23c3fb4376396cdb4c7045c933398105db60f9e56c7c3f3af8474ee155a0804ea6f193e66555d76362ecf2675802e4f1a2387d', 'Gerald', 'Liando', 'reyner@gethassee.com', -43.52879890000001, 172.60820569999998, '+081288768823', '28 Riccarton Rd, Riccarton, Christchurch 8011, New Zealand', 'uploads/user/Reyner/photo.jpg', 1182.17, NULL, 1, '2016-08-16', 'user'),
(39, 'miki', 'd3623c77578eebdac371c5f82d23c3fb4376396cdb4c7045c933398105db60f9e56c7c3f3af8474ee155a0804ea6f193e66555d76362ecf2675802e4f1a2387d', 'Mickey', 'Jane', 'mickeyjane28@gmail.com', -43.5297406, 172.59807539999997, '+081288768823', '128 Riccarton Rd, Riccarton, Christchurch 8041, New Zealand', 'uploads/user/miki/photo.jpg', 2000, NULL, 1, '2016-08-23', 'user'),
(47, 'setyawan9', 'd3623c77578eebdac371c5f82d23c3fb4376396cdb4c7045c933398105db60f9e56c7c3f3af8474ee155a0804ea6f193e66555d76362ecf2675802e4f1a2387d', 'Setyawan', 'Susanto', 'setyawan@gethassee.com', -43.5396236, 172.6255175, '+081288768823', '111 Moorhouse Ave, Addington, Christchurch 8011, New Zealand', 'uploads/user/setyawan9/photo.jpg', 0, '20eab13a2a24000e59ed6bc924f8ab9238078957ef0922b58afdda1c0f3686ea', 0, '2016-09-02', 'user'),
(48, 'irpans', 'd3623c77578eebdac371c5f82d23c3fb4376396cdb4c7045c933398105db60f9e56c7c3f3af8474ee155a0804ea6f193e66555d76362ecf2675802e4f1a2387d', 'irvan', 'winata', 'irpanwinata@live.com', -43.529533, 172.55565720000004, '+644324231231', '20 Bucknell St, Sockburn, Christchurch 8042, New Zealand', '', 811.94, NULL, 1, '2016-09-05', 'user'),
(54, 'Reynerliando', '79e0eee7891ba3e55a79a6a55404d912db8b231dabae24b6cd3eda1ff0a99369fb397693e1d036186ff02b0c9bd27728251090564fe72b9c01569dfb6954fbb3', 'Reyner', 'Liando', 'Reyner@lrmcorporation.com', -43.531877, 172.57474860000002, '0221940693', '355 Riccarton Rd, Upper Riccarton, Christchurch 8041, New Zealand', '', 0, NULL, 1, '2016-10-05', 'user'),
(79, 'michelle', 'd3623c77578eebdac371c5f82d23c3fb4376396cdb4c7045c933398105db60f9e56c7c3f3af8474ee155a0804ea6f193e66555d76362ecf2675802e4f1a2387d', 'mich', 'reyner', 'felita.31895@gmail.com', -43.53325170000001, 172.63430330000006, '+64813125523942', '88 Cashel St, Christchurch Central, Christchurch 8011, New Zealand', '', 0, NULL, 1, '2016-11-21', 'user'),
(81, 'ek250796', '21732d3ec1a3ce744a66a3a4650a803c57606a064334cdb911fdb278c9a28883f10bb59d3f200c9de71dbba833d4fff2b6506ce9f1355cad9c64354e940b5859', 'eric', 'kurnia', 'eric.kurnia@hotmail.com', 0, 0, '0273106551', 'undefined', '', 0, 'BA5DD59D57C72C02B96DEF351DBD1BA1123F9A53FA40EE7F49E328BBE3156423', 0, '2016-12-05', 'user'),
(82, 'felitai', 'd3623c77578eebdac371c5f82d23c3fb4376396cdb4c7045c933398105db60f9e56c7c3f3af8474ee155a0804ea6f193e66555d76362ecf2675802e4f1a2387d', 'Felita', 'I', 'setyawansusanto99@icloud.com', -43.53042689999999, 172.59181920000003, '+640000000', 'Riccarton Rd, Christchurch, New Zealand', '', 0, NULL, 1, '2017-01-14', 'user');

-- --------------------------------------------------------

--
-- Table structure for table `user_deposit`
--

CREATE TABLE `user_deposit` (
  `user_detail_id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `transaction_id` varchar(255) DEFAULT NULL,
  `amount` double DEFAULT NULL,
  `create_date` datetime DEFAULT NULL,
  `payment_method` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_deposit`
--

INSERT INTO `user_deposit` (`user_detail_id`, `user_id`, `transaction_id`, `amount`, `create_date`, `payment_method`) VALUES
(1, 51, 'T1', 10.2, '2016-10-01 16:08:41', 'paypal'),
(2, 51, '91E41467Y9426520D', 10, '2016-10-01 16:26:36', 'paypal'),
(3, 51, '79400044B48124611', 10, '2016-10-01 16:28:32', 'paypal'),
(4, 51, '1P580784HP119634D', 10, '2016-10-03 19:16:37', 'paypal'),
(5, 51, '9GL79248HV879580X', 10, '2016-10-03 19:19:42', 'paypal'),
(6, 51, '5LT61051K3567441L', 10, '2016-10-03 19:37:57', 'paypal'),
(7, 51, '8NR28588CX674900L', 10, '2016-10-03 19:38:42', 'paypal'),
(8, 11, '3HB71290452742403', 10, '2016-10-03 19:40:45', 'paypal'),
(9, 11, '1CL61140NR961541F', 10, '2016-10-03 20:10:49', 'paypal'),
(10, 11, '7UK51633TY0960738', 10, '2016-10-03 20:11:59', 'paypal'),
(11, 60, '3JD53881EX578494D', 10, '2016-10-04 00:01:01', 'paypal'),
(12, 77, '8FV39828N5361090U', 10, '2016-10-04 00:15:18', 'paypal'),
(13, 0, '3CG32540UJ8830443', 10, '2016-10-04 00:24:14', 'paypal'),
(14, 77, '11279335AS709502P', 10, '2016-10-04 00:28:11', 'paypal'),
(15, 77, '94070226KK2622305', 10, '2016-10-04 00:29:48', 'paypal'),
(16, 77, '3B565998SC790990H', 10, '2016-10-04 00:30:32', 'paypal'),
(17, 77, '7LE73160872832219', 102, '2016-10-04 00:33:05', 'paypal'),
(18, 77, '1TM45524TB914820G', 104, '2016-10-04 00:35:23', 'paypal'),
(19, 77, '63F51776M9261401E', 10, '2016-10-04 00:38:04', 'paypal'),
(20, 77, '2N00657841833273G', 12, '2016-10-04 00:41:29', 'paypal'),
(21, 53, '7NM93925DH2117747', 102, '2016-10-05 12:23:57', 'paypal'),
(22, 53, '9CX11193XP473393A', 10, '2016-10-05 22:52:03', 'paypal');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `configuration`
--
ALTER TABLE `configuration`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cuisines`
--
ALTER TABLE `cuisines`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dishes`
--
ALTER TABLE `dishes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `drivers`
--
ALTER TABLE `drivers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `driver_rating`
--
ALTER TABLE `driver_rating`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_detail`
--
ALTER TABLE `order_detail`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_history`
--
ALTER TABLE `order_history`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `restaurants`
--
ALTER TABLE `restaurants`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `restaurant_time`
--
ALTER TABLE `restaurant_time`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `review`
--
ALTER TABLE `review`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transaction`
--
ALTER TABLE `transaction`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_deposit`
--
ALTER TABLE `user_deposit`
  ADD PRIMARY KEY (`user_detail_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `configuration`
--
ALTER TABLE `configuration`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `cuisines`
--
ALTER TABLE `cuisines`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT for table `dishes`
--
ALTER TABLE `dishes`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
--
-- AUTO_INCREMENT for table `drivers`
--
ALTER TABLE `drivers`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT for table `driver_rating`
--
ALTER TABLE `driver_rating`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;
--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=74;
--
-- AUTO_INCREMENT for table `order_detail`
--
ALTER TABLE `order_detail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=177;
--
-- AUTO_INCREMENT for table `order_history`
--
ALTER TABLE `order_history`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;
--
-- AUTO_INCREMENT for table `restaurants`
--
ALTER TABLE `restaurants`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;
--
-- AUTO_INCREMENT for table `restaurant_time`
--
ALTER TABLE `restaurant_time`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=137;
--
-- AUTO_INCREMENT for table `review`
--
ALTER TABLE `review`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
--
-- AUTO_INCREMENT for table `transaction`
--
ALTER TABLE `transaction`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=84;
--
-- AUTO_INCREMENT for table `user_deposit`
--
ALTER TABLE `user_deposit`
  MODIFY `user_detail_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
