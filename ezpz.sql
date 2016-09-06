-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Sep 06, 2016 at 02:27 AM
-- Server version: 10.1.13-MariaDB
-- PHP Version: 7.0.6

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
(1, 'Reyner', 'd3623c77578eebdac371c5f82d23c3fb4376396cdb4c7045c933398105db60f9e56c7c3f3af8474ee155a0804ea6f193e66555d76362ecf2675802e4f1a2387d', 'reyner@gethassee.com', '0000-00-00');

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
(5, 17, 'Spicy Italian Sandwich', 6, 'Best Sandwich', 'uploads/restaurant/subwayaddington/dishes/spicyitalian__1365688541.jpg', 1),
(6, 16, 'Espresso', 3.75, 'Best Espresso in the world askldjsad alsdkaklsjd alkdjalksjd  aslkdjaslkd akldaskljd akljdalskjd askldjasljdnaklsjdaslkjd asdkljaskldjajasdjasd asdasdj sadasjd alksdjalksd aslkdjaklsjd aslkdjasd aslkdjaklsjd klasdjalskjd alskjdaklsjd alskdjaklsjd klasjdlksajd ..asdjlalskd aslkdjaslkjd ', 'uploads/restaurant/c1espresso/dishes/Base-Espresso-Cappuccino.jpg', 1),
(7, 16, 'Caffe Latte', 5, 'Best latte ever', 'uploads/restaurant/c1espresso/dishes/slider.jpg', 1),
(8, 20, 'Ayam Goreng', 4, 'Ayam lampu', 'uploads/restaurant/mcd/dishes/bulb.jpg', 1),
(9, 16, 'kopi', 2, 'kopi', 'uploads/restaurant/c1espresso/dishes/minion_png_by_isammyt-d6fn0fj.png', 1),
(10, 16, 'test', 23.79, 'test', 'uploads/restaurant/c1espresso/dishes/th.jpg', 1),
(11, 21, 'salmon maki', 2, 'salmon maki', 'uploads/restaurant/sushitei/dishes/3993730-japanese-cuisine-salmon-maki-sushi.jpg', 1),
(13, 20, 'sad', 20, 'asd', 'uploads/restaurant/mcd/dishes/i8bWneLrPgJG7.png', 1);

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
  `verification_code` varchar(255) DEFAULT NULL,
  `is_verified` int(20) NOT NULL DEFAULT '0',
  `created` date NOT NULL,
  `type` varchar(255) NOT NULL DEFAULT 'driver'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `drivers`
--

INSERT INTO `drivers` (`id`, `username`, `password`, `firstname`, `lastname`, `email`, `telephone`, `address`, `ird`, `driver_license`, `license_type`, `credits`, `photo`, `verification_code`, `is_verified`, `created`, `type`) VALUES
(3, 'john', 'd3623c77578eebdac371c5f82d23c3fb4376396cdb4c7045c933398105db60f9e56c7c3f3af8474ee155a0804ea6f193e66555d76362ecf2675802e4f1a2387d', 'Jonathan', 'Hosea', 'zonecaptain@gmail.com', '+812887688232', 'TPI', '09000', '0923712389120', 'Full License', 14.97, 'uploads/driver/john/photo.jpg', NULL, 1, '2016-08-15', 'driver'),
(4, 'irpan', 'd3623c77578eebdac371c5f82d23c3fb4376396cdb4c7045c933398105db60f9e56c7c3f3af8474ee155a0804ea6f193e66555d76362ecf2675802e4f1a2387d', 'Irvan', 'Winata', 'irvan@gethassee.com', '+812345678901', '8888', '123', '123123', 'Learner', 243.02, 'uploads/driver/irpan/photo.jpg', NULL, 1, '2016-08-22', 'driver');

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
(33, 4, 48, '4339aa', 5);

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
(124, '4339aa', 5, 3, 18);

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
(27, 48, 17, 4, 1, 3, 18, 14.53, '4339aa', 4, -43.529533, 172.55565720000004, '20 Bucknell St, Sockburn, Christchurch 8042, New Zealand', 26, 7.3, '2016-09-05 20:57:44');

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
  `telephone` varchar(255) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `created` date DEFAULT NULL,
  `is_verified` int(11) NOT NULL DEFAULT '0',
  `type` varchar(255) NOT NULL DEFAULT 'client'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `restaurants`
--

INSERT INTO `restaurants` (`id`, `username`, `password`, `name`, `address`, `cuisine_id`, `longitude`, `latitude`, `photo`, `telephone`, `email`, `created`, `is_verified`, `type`) VALUES
(16, 'c1espresso', 'd3623c77578eebdac371c5f82d23c3fb4376396cdb4c7045c933398105db60f9e56c7c3f3af8474ee155a0804ea6f193e66555d76362ecf2675802e4f1a2387d', 'C1 Espresso', '185 High St, Christchurch Central, Christchurch 8142, New Zealand', '15, 17', 172.64046280000002, -43.535125, 'uploads/restaurant/c1espresso/photo.jpg', '+812345678901', 'c1espresso@gethassee.com', '2016-08-22', 1, 'client'),
(17, 'subwayaddington', 'd3623c77578eebdac371c5f82d23c3fb4376396cdb4c7045c933398105db60f9e56c7c3f3af8474ee155a0804ea6f193e66555d76362ecf2675802e4f1a2387d', 'Subway Addington', '359 Lincoln Rd, Addington, Christchurch 8024, New Zealand', '15, 16', 172.61484180000002, -43.54124820000001, 'uploads/restaurant/subwayaddington/photo.jpg', '+628131687899', 'subway@addington.com', '2016-08-27', 1, 'client'),
(19, 'topkapi', 'd3623c77578eebdac371c5f82d23c3fb4376396cdb4c7045c933398105db60f9e56c7c3f3af8474ee155a0804ea6f193e66555d76362ecf2675802e4f1a2387d', 'Topkapi Restaurant', '64 Manchester St, Christchurch Central, Christchurch 8011, New Zealand', '17, 18', 172.63983099999996, -43.5368573, 'uploads/restaurant/topkapi/photo.jpg', '+812345678901', 'topkapi@gmail.com', '2016-08-18', 1, 'client'),
(20, 'mcd', 'd3623c77578eebdac371c5f82d23c3fb4376396cdb4c7045c933398105db60f9e56c7c3f3af8474ee155a0804ea6f193e66555d76362ecf2675802e4f1a2387d', 'McDonalds', 'Jl. Boulevard Artha Gading Kav. D-01, Kelapa Gading, Klp. Gading Bar., Klp. Gading, Kota Jkt Utara, Daerah Khusus Ibukota Jakarta 14240, Indonesia', '18', 106.89637470000002, -6.146804099999999, 'uploads/restaurant/mcd/photo.jpg', '+081316361519', 'mmcd@mcd.xom', '2016-09-05', 1, 'client'),
(21, 'sushitei', '6f0b8408d75f70d6791de8c428acf065636bfd8943d1f38b1cdd7bdf48b9bc73422f3f42d86faece2d313aff8f62e2d83e06c9b42c3149cdaed285101cd7334f', 'Sushi Tei', 'Mall Kelapa Gading 5 Lantai 1 Unit 47, JL Boulevard Kelapa Gading Utara, Klp. Gading Tim., Klp. Gading, Kota Jkt Utara, Daerah Khusus Ibukota Jakarta 14240, Indonesia', '16, 17, 18', 106.91012309999996, -6.156939299999998, 'uploads/restaurant/sushitei/photo.jpg', '+812345678901', 'sushitei@gethassee.com', '2016-08-30', 1, 'client');

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
(49, '19', 'Tuesday', '10:00:00', '23:59:00'),
(66, '16', 'Tuesday', '00:00:00', '23:59:00'),
(67, '16', 'Thursday', '10:00:00', '22:00:00'),
(68, '16', 'Friday', '00:00:00', '23:00:00'),
(69, '16', 'Sunday', '10:00:00', '22:00:00'),
(76, '17', 'Monday', '08:00:00', '23:59:00'),
(77, '17', 'Tuesday', '07:00:00', '23:59:00'),
(78, '17', 'Wednesday', '07:00:00', '23:59:00'),
(79, '17', 'Thursday', '07:00:00', '23:59:00'),
(80, '17', 'Friday', '07:00:00', '23:59:00'),
(81, '17', 'Saturday', '00:00:00', '11:59:00'),
(82, '17', 'Sunday', '00:00:00', '11:59:00'),
(83, '21', 'Tuesday', '00:00:00', '23:59:00'),
(84, '21', 'Wednesday', '00:00:00', '23:59:00'),
(85, '21', 'Thursday', '00:00:00', '23:59:00'),
(86, '20', 'Monday', '00:00:00', '23:59:00'),
(87, '20', 'Tuesday', '00:00:00', '23:59:00'),
(88, '20', 'Wednesday', '00:00:00', '23:59:00'),
(89, '20', 'Thursday', '00:00:00', '23:59:00'),
(90, '20', 'Friday', '00:00:00', '23:59:00'),
(91, '20', 'Saturday', '00:00:00', '23:59:00'),
(92, '20', 'Sunday', '00:00:00', '23:59:00');

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
(18, 20, 33, 'ressat', 5, '2016-08-26 19:20:29');

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
(27, '4339aa', 4, 8.14, 6.39);

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
(33, 'irvan', 'cb5478c9e7c13583f301752dabdc3704e136b8ce31ebdddf23efdb40c33aac1a9b605fcf538edfe6d03ecfa52c17d9f4d3d687ac3effdfddd34e8b0b3450c8b4', 'Irvan', 'Winata', 'irpanwinata@gmail.com', -43.5309739, 172.6065565, '+628131687899', '1A Kipax Pl, Riccarton, Christchurch 8011, New Zealand', 'uploads/user/irvan/photo.jpg', 401000.095, NULL, 1, '2016-08-15', 'user'),
(38, 'Reyner', 'd3623c77578eebdac371c5f82d23c3fb4376396cdb4c7045c933398105db60f9e56c7c3f3af8474ee155a0804ea6f193e66555d76362ecf2675802e4f1a2387d', 'Gerald', 'Liando', 'reyner@gethassee.com', -43.52879890000001, 172.60820569999998, '+081288768823', '28 Riccarton Rd, Riccarton, Christchurch 8011, New Zealand', 'uploads/user/Reyner/photo.jpg', 1182.17, NULL, 1, '2016-08-16', 'user'),
(39, 'miki', 'd3623c77578eebdac371c5f82d23c3fb4376396cdb4c7045c933398105db60f9e56c7c3f3af8474ee155a0804ea6f193e66555d76362ecf2675802e4f1a2387d', 'Mickey', 'Jane', 'mickeyjane28@gmail.com', -43.5297406, 172.59807539999997, '+081288768823', '128 Riccarton Rd, Riccarton, Christchurch 8041, New Zealand', 'uploads/user/miki/photo.jpg', 0, NULL, 1, '2016-08-23', 'user'),
(46, 'setyawan', 'd3623c77578eebdac371c5f82d23c3fb4376396cdb4c7045c933398105db60f9e56c7c3f3af8474ee155a0804ea6f193e66555d76362ecf2675802e4f1a2387d', 'Setyawan', 'Susanto', 'setyawansusanto99@outlook.com', -43.3002693, 172.1744301, '+812345678901', '1231 Depot Rd, Oxford 7430, New Zealand', 'uploads/user/setyawan/photo.jpg', 0, '832bf129c187573a9883e034259c16593e4bb2ac22ef7e500c585edeafd949b5', 0, '2016-09-02', 'user'),
(47, 'setyawan9', 'd3623c77578eebdac371c5f82d23c3fb4376396cdb4c7045c933398105db60f9e56c7c3f3af8474ee155a0804ea6f193e66555d76362ecf2675802e4f1a2387d', 'Setyawan', 'Susanto', 'setyawan@gethassee.com', -43.5396236, 172.6255175, '+081288768823', '111 Moorhouse Ave, Addington, Christchurch 8011, New Zealand', 'uploads/user/setyawan9/photo.jpg', 0, '20eab13a2a24000e59ed6bc924f8ab9238078957ef0922b58afdda1c0f3686ea', 0, '2016-09-02', 'user'),
(48, 'irpans', 'd3623c77578eebdac371c5f82d23c3fb4376396cdb4c7045c933398105db60f9e56c7c3f3af8474ee155a0804ea6f193e66555d76362ecf2675802e4f1a2387d', 'irvan', 'winata', 'irpanwinata@live.com', -43.529533, 172.55565720000004, '+644324231231', '20 Bucknell St, Sockburn, Christchurch 8042, New Zealand', '', 811.94, NULL, 1, '2016-09-05', 'user'),
(49, 'babi', 'fb03dfeacd5212a4762351e08271a6204126d30933dc9af4facc0e2f31c5a13f9db15a0abba07d1d1c673e8844127a1c050932e1db69e83dbe0a3a957cd071f5', 'peler', 'item', 'setyawansusanto99@gmail.com', -43.5299778, 172.59848599999998, '+6423451124234', '123 Riccarton Rd, Riccarton, Christchurch 8041, New Zealand', '', 0, 'f3366153164fee5230c7afb7acad4cba829908f059c6faaa5a63af25d953b184', 0, '2016-09-05', 'user');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
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
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
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
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `drivers`
--
ALTER TABLE `drivers`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `driver_rating`
--
ALTER TABLE `driver_rating`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;
--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `order_detail`
--
ALTER TABLE `order_detail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=125;
--
-- AUTO_INCREMENT for table `order_history`
--
ALTER TABLE `order_history`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;
--
-- AUTO_INCREMENT for table `restaurants`
--
ALTER TABLE `restaurants`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
--
-- AUTO_INCREMENT for table `restaurant_time`
--
ALTER TABLE `restaurant_time`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=93;
--
-- AUTO_INCREMENT for table `review`
--
ALTER TABLE `review`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT for table `transaction`
--
ALTER TABLE `transaction`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
