-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Aug 30, 2016 at 03:58 PM
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
(8, 20, 'Ayam Goreng', 2, 'Ayam lampu', 'uploads/restaurant/mcd/dishes/bulb.jpg', 1),
(9, 16, 'kopi', 2, 'kopi', 'uploads/restaurant/c1espresso/dishes/minion_png_by_isammyt-d6fn0fj.png', 1),
(10, 16, 'test', 23.79, 'test', 'uploads/restaurant/c1espresso/dishes/th.jpg', 1),
(11, 21, 'salmon maki', 2, 'salmon maki', 'uploads/restaurant/sushitei/dishes/3993730-japanese-cuisine-salmon-maki-sushi.jpg', 1);

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
(3, 'john', 'd3623c77578eebdac371c5f82d23c3fb4376396cdb4c7045c933398105db60f9e56c7c3f3af8474ee155a0804ea6f193e66555d76362ecf2675802e4f1a2387d', 'Jonathan', 'Hosea', 'zonecaptain@gmail.com', '+812887688232', 'TPI', '09000', '0923712389120', 'Full License', 0, 'uploads/driver/john/photo.jpg', NULL, 1, '2016-08-15', 'driver'),
(4, 'irpan', 'd3623c77578eebdac371c5f82d23c3fb4376396cdb4c7045c933398105db60f9e56c7c3f3af8474ee155a0804ea6f193e66555d76362ecf2675802e4f1a2387d', 'Irvan', 'Winata', 'irvan@gethassee.com', '+812345678901', '8888', '123', '123123', 'Learner', 40.71, 'uploads/driver/irpan/photo.jpg', NULL, 1, '2016-08-22', 'driver');

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
(9, 4, 33, 'ff4500a', 5);

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
(104, 'ff4500a', 11, 6, 12);

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
(10, 33, 21, 4, 1, 6, 12, 6.62, 'ff4500a', 4, -6.152539300000001, 106.89408930000002, 'Jl. Raya Boulevard Barat, Plaza Pasifik, Blok B2 No 43-45, Klp. Gading Bar., Klp. Gading, Kota Jkt Utara, Daerah Khusus Ibukota Jakarta 14240, Indonesia', 24, 3.3, '2016-08-30 22:27:58');

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
(20, 'mcd', 'd3623c77578eebdac371c5f82d23c3fb4376396cdb4c7045c933398105db60f9e56c7c3f3af8474ee155a0804ea6f193e66555d76362ecf2675802e4f1a2387d', 'McDonalds', 'Jl. Boulevard Artha Gading Kav. D-01, Kelapa Gading, Klp. Gading Bar., Klp. Gading, Kota Jkt Utara, Daerah Khusus Ibukota Jakarta 14240, Indonesia', '18', 106.89637470000002, -6.146804099999999, 'uploads/restaurant/mcd/photo.jpg', '+081316361519', 'mmcd@mcd.xom', '2016-08-25', 1, 'client'),
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
(75, '20', 'Thursday', '07:00:00', '23:59:00'),
(76, '17', 'Monday', '08:00:00', '23:59:00'),
(77, '17', 'Tuesday', '07:00:00', '23:59:00'),
(78, '17', 'Wednesday', '07:00:00', '23:59:00'),
(79, '17', 'Thursday', '07:00:00', '23:59:00'),
(80, '17', 'Friday', '07:00:00', '23:59:00'),
(81, '17', 'Saturday', '00:00:00', '11:59:00'),
(82, '17', 'Sunday', '00:00:00', '11:59:00'),
(83, '21', 'Tuesday', '00:00:00', '23:59:00'),
(84, '21', 'Wednesday', '00:00:00', '23:59:00');

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
(9, '6a47ad6', 4, 4.38, 3.45),
(10, 'ff4500a', 4, 3.71, 2.91);

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
(33, 'irvan', 'd3623c77578eebdac371c5f82d23c3fb4376396cdb4c7045c933398105db60f9e56c7c3f3af8474ee155a0804ea6f193e66555d76362ecf2675802e4f1a2387d', 'Irvan', 'Winata', 'irpanwinata@gmail.com', -43.5309739, 172.6065565, '+628131687899', '1A Kipax Pl, Riccarton, Christchurch 8011, New Zealand', 'uploads/user/irvan/photo.jpg', 10109.685, NULL, 1, '2016-08-15', 'user'),
(37, 'felita', 'd3623c77578eebdac371c5f82d23c3fb4376396cdb4c7045c933398105db60f9e56c7c3f3af8474ee155a0804ea6f193e66555d76362ecf2675802e4f1a2387d', 'Felita', 'Setiawan', 'felita@gethassee.com', 0, 0, '+812345678901', '64 Riccarton Rd, Riccarton, Christchurch 8011, New Zealand', 'uploads/user/felita/photo.jpg', 0, NULL, 1, '2016-08-16', 'user'),
(38, 'Reyner', 'd3623c77578eebdac371c5f82d23c3fb4376396cdb4c7045c933398105db60f9e56c7c3f3af8474ee155a0804ea6f193e66555d76362ecf2675802e4f1a2387d', 'Gerald', 'Liando', 'reyner@gethassee.com', -43.52879890000001, 172.60820569999998, '+081288768823', '28 Riccarton Rd, Riccarton, Christchurch 8011, New Zealand', 'uploads/user/Reyner/photo.jpg', 1182.17, NULL, 1, '2016-08-16', 'user'),
(39, 'miki', 'd3623c77578eebdac371c5f82d23c3fb4376396cdb4c7045c933398105db60f9e56c7c3f3af8474ee155a0804ea6f193e66555d76362ecf2675802e4f1a2387d', 'Mickey', 'Jane', 'mickeyjane28@gmail.com', -43.5297406, 172.59807539999997, '+081288768823', '128 Riccarton Rd, Riccarton, Christchurch 8041, New Zealand', 'uploads/user/miki/photo.jpg', 0, NULL, 1, '2016-08-23', 'user'),
(40, 'setysa', 'd3623c77578eebdac371c5f82d23c3fb4376396cdb4c7045c933398105db60f9e56c7c3f3af8474ee155a0804ea6f193e66555d76362ecf2675802e4f1a2387d', 'sdd', 'dd', 'asdasd@awssdasd.cn', 0, 0, '+812887688232', '', 'uploads/user/setysa/photo.jpg', 0, NULL, 1, '2016-08-23', 'user'),
(41, 'setyawan', 'd3623c77578eebdac371c5f82d23c3fb4376396cdb4c7045c933398105db60f9e56c7c3f3af8474ee155a0804ea6f193e66555d76362ecf2675802e4f1a2387d', 'Setyawan', 'Susanto', 'setyawansusanto99@outlook.com', -43.5587004, 172.63786370000003, '+081316361519', '120 Colombo St, Sydenham, Christchurch 8023, New Zealand', 'uploads/user/setyawan/photo.jpg', 0, NULL, 1, '2016-08-24', 'user'),
(42, 'womble', 'd3623c77578eebdac371c5f82d23c3fb4376396cdb4c7045c933398105db60f9e56c7c3f3af8474ee155a0804ea6f193e66555d76362ecf2675802e4f1a2387d', 'soviet', 'womble', 'irpanwinata@live.com', -43.5442892, 172.63648890000002, '+812345678901', '423 Colombo St, Sydenham, Christchurch 8023, New Zealand', 'uploads/user/womble/photo.jpg', 0, NULL, 1, '2016-08-26', 'user'),
(43, 'hakuna', 'd3623c77578eebdac371c5f82d23c3fb4376396cdb4c7045c933398105db60f9e56c7c3f3af8474ee155a0804ea6f193e66555d76362ecf2675802e4f1a2387d', 'hakuna', 'matata', 'setyawan@gethassee.com', -43.53091149999999, 172.58764029999998, '+812345678901', '235 Riccarton Rd, Riccarton, Christchurch 8041, New Zealand', 'uploads/user/hakuna/photo.jpg', 0, NULL, 1, '2016-08-30', 'user'),
(44, 'reza', 'd3623c77578eebdac371c5f82d23c3fb4376396cdb4c7045c933398105db60f9e56c7c3f3af8474ee155a0804ea6f193e66555d76362ecf2675802e4f1a2387d', 'reza', 'asdf', 'reza@gma.com', -43.5526467, 172.63657280000007, '+812345678901', '237 Colombo St, Sydenham, Christchurch 8023, New Zealand', 'uploads/user/reza/photo.jpg', 0, NULL, 1, '2016-08-30', 'user'),
(45, 'holaho', 'd3623c77578eebdac371c5f82d23c3fb4376396cdb4c7045c933398105db60f9e56c7c3f3af8474ee155a0804ea6f193e66555d76362ecf2675802e4f1a2387d', 'asdf', 'asdf', 'www@ldsa.com', -43.5372671, 172.6368033, '+812345678901', '574 Colombo St, Christchurch Central, Christchurch 8011, New Zealand', 'uploads/user/holaho/photo.jpg', 0, NULL, 1, '2016-08-30', 'user');

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
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `drivers`
--
ALTER TABLE `drivers`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `driver_rating`
--
ALTER TABLE `driver_rating`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `order_detail`
--
ALTER TABLE `order_detail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=105;
--
-- AUTO_INCREMENT for table `order_history`
--
ALTER TABLE `order_history`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `restaurants`
--
ALTER TABLE `restaurants`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
--
-- AUTO_INCREMENT for table `restaurant_time`
--
ALTER TABLE `restaurant_time`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=85;
--
-- AUTO_INCREMENT for table `review`
--
ALTER TABLE `review`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT for table `transaction`
--
ALTER TABLE `transaction`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
