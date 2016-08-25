-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Aug 24, 2016 at 05:48 AM
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
(6, 16, 'Espresso', 3, 'Best Espresso in the world askldjsad alsdkaklsjd alkdjalksjd  aslkdjaslkd akldaskljd akljdalskjd askldjasljdnaklsjdaslkjd asdkljaskldjajasdjasd asdasdj sadasjd alksdjalksd aslkdjaklsjd aslkdjasd aslkdjaklsjd klasdjalskjd alskjdaklsjd alskdjaklsjd klasjdlksajd ..asdjlalskd aslkdjaslkjd ', 'uploads/restaurant/c1espresso/dishes/Base-Espresso-Cappuccino.jpg', 1),
(7, 16, 'Caffe Latte', 5, 'Best latte ever', 'uploads/restaurant/c1espresso/dishes/slider.jpg', 1);

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
  `photo` varchar(255) DEFAULT NULL,
  `verification_code` varchar(255) DEFAULT NULL,
  `is_verified` int(20) NOT NULL DEFAULT '0',
  `created` date NOT NULL,
  `type` varchar(255) NOT NULL DEFAULT 'driver'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `drivers`
--

INSERT INTO `drivers` (`id`, `username`, `password`, `firstname`, `lastname`, `email`, `telephone`, `address`, `ird`, `driver_license`, `license_type`, `photo`, `verification_code`, `is_verified`, `created`, `type`) VALUES
(3, 'john', 'd3623c77578eebdac371c5f82d23c3fb4376396cdb4c7045c933398105db60f9e56c7c3f3af8474ee155a0804ea6f193e66555d76362ecf2675802e4f1a2387d', 'Jonathan', 'Hosea', 'zonecaptain@gmail.com', '+812887688232', 'TPI', '09000', '0923712389120', 'Full License', 'uploads/driver/john/photo.jpg', NULL, 1, '2016-08-15', 'driver'),
(4, 'irpan', 'd3623c77578eebdac371c5f82d23c3fb4376396cdb4c7045c933398105db60f9e56c7c3f3af8474ee155a0804ea6f193e66555d76362ecf2675802e4f1a2387d', 'Irvan', 'Winata', 'irvan@gethassee.com', '+812345678901', '8888', '123', '123123', 'Learner', 'uploads/driver/irpan/photo.jpg', NULL, 1, '2016-08-22', 'driver');

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
  `distance` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `restaurant_id`, `driver_id`, `total_product`, `total_qty`, `total_price`, `delivery_cost`, `code`, `status`, `latitude`, `longitude`, `address`, `estimation_time`, `distance`) VALUES
(41, 33, 17, 0, 1, 4, 24, 0, '8f1e6', 0, -43.531877, 172.57474860000002, '355 Riccarton Rd, Upper Riccarton, Christchurch 8041, New Zealand', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `order_detail`
--

CREATE TABLE `order_detail` (
  `id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `sub_total` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `order_detail`
--

INSERT INTO `order_detail` (`id`, `order_id`, `product_id`, `qty`, `sub_total`) VALUES
(21, 8, 6, 1, 3),
(22, 9, 6, 2, 6),
(23, 10, 6, 2, 6),
(24, 11, 5, 2, 12),
(25, 12, 5, 1, 6),
(26, 13, 5, 2, 12),
(27, 14, 5, 123, 738),
(28, 15, 5, 55, 330),
(29, 16, 5, 23, 138),
(30, 17, 5, 12, 72),
(31, 18, 7, 1, 5),
(32, 18, 6, 4, 12),
(33, 19, 5, 30, 180),
(34, 20, 5, 28, 168),
(35, 21, 5, 20, 120),
(36, 22, 5, 18, 108),
(37, 23, 7, 22, 110),
(38, 24, 6, 2, 6),
(39, 25, 5, 2, 12),
(40, 26, 6, 3, 9),
(41, 27, 6, 2, 6),
(42, 28, 6, 2, 6),
(43, 29, 6, 2, 6),
(44, 30, 6, 2, 6),
(45, 31, 6, 3, 9),
(46, 32, 6, 4, 12),
(47, 33, 6, 3, 9),
(48, 34, 6, 2, 6),
(49, 35, 6, 4, 12),
(50, 36, 6, 2, 6),
(51, 37, 5, 2, 12),
(52, 38, 5, 7, 42),
(53, 39, 5, 3, 18),
(54, 40, 5, 6, 36),
(55, 41, 5, 4, 24);

-- --------------------------------------------------------

--
-- Table structure for table `order_history`
--

CREATE TABLE `order_history` (
  `id` int(11) NOT NULL,
  `total_product` int(11) NOT NULL,
  `total_qty` int(11) NOT NULL,
  `total_price` double NOT NULL,
  `user_id` int(50) NOT NULL,
  `code` varchar(255) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
(17, 'subwayaddington', 'd3623c77578eebdac371c5f82d23c3fb4376396cdb4c7045c933398105db60f9e56c7c3f3af8474ee155a0804ea6f193e66555d76362ecf2675802e4f1a2387d', 'Subway Addington', '359 Lincoln Rd, Addington, Christchurch 8024, New Zealand', '15, 16', 172.61484180000002, -43.54124820000001, 'uploads/restaurant/subwayaddington/photo.jpg', '+628131687899', 'subway@addington.com', '2016-08-23', 1, 'client'),
(19, 'topkapi', 'd3623c77578eebdac371c5f82d23c3fb4376396cdb4c7045c933398105db60f9e56c7c3f3af8474ee155a0804ea6f193e66555d76362ecf2675802e4f1a2387d', 'Topkapi Restaurant', '64 Manchester St, Christchurch Central, Christchurch 8011, New Zealand', '17, 18', 172.63983099999996, -43.5368573, 'uploads/restaurant/topkapi/photo.jpg', '+812345678901', 'topkapi@gmail.com', '2016-08-18', 1, 'client');

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
(70, '17', 'Monday', '08:00:00', '23:59:00'),
(71, '17', 'Tuesday', '07:00:00', '23:59:00'),
(72, '17', 'Wednesday', '07:00:00', '23:59:00'),
(73, '17', 'Thursday', '07:00:00', '23:59:00'),
(74, '17', 'Friday', '07:00:00', '23:59:00');

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
(13, 16, 33, 'josua tai', 5, '2016-08-16 03:26:49');

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
(33, 'irvan', 'd3623c77578eebdac371c5f82d23c3fb4376396cdb4c7045c933398105db60f9e56c7c3f3af8474ee155a0804ea6f193e66555d76362ecf2675802e4f1a2387d', 'Irvan', 'Winata', 'irpanwinata@gmail.com', -43.5309739, 172.6065565, '+628131687899', '1A Kipax Pl, Riccarton, Christchurch 8011, New Zealand', 'uploads/user/irvan/photo.jpg', 862.97, NULL, 1, '2016-08-15', 'user'),
(34, 'setyawan9', 'd3623c77578eebdac371c5f82d23c3fb4376396cdb4c7045c933398105db60f9e56c7c3f3af8474ee155a0804ea6f193e66555d76362ecf2675802e4f1a2387d', 'Setyawan', 'Susanto', 'setyawan@gethassee.com', 0, 0, '+812345678901', 'Puri Duyung', 'uploads/user/setyawan9/photo.jpg', 0, '49f00aed72ab3af3636beff82378ea2cca20cf83928dd2a6ba848bef80e22006', 0, '2016-08-15', 'user'),
(37, 'felita', 'd3623c77578eebdac371c5f82d23c3fb4376396cdb4c7045c933398105db60f9e56c7c3f3af8474ee155a0804ea6f193e66555d76362ecf2675802e4f1a2387d', 'Felita', 'Setiawan', 'felita@gethassee.com', 0, 0, '+812345678901', '64 Riccarton Rd, Riccarton, Christchurch 8011, New Zealand', 'uploads/user/felita/photo.jpg', 0, NULL, 1, '2016-08-16', 'user'),
(38, 'Reyner', 'd3623c77578eebdac371c5f82d23c3fb4376396cdb4c7045c933398105db60f9e56c7c3f3af8474ee155a0804ea6f193e66555d76362ecf2675802e4f1a2387d', 'Gerald', 'Liando', 'reyner@gethassee.com', -43.52879890000001, 172.60820569999998, '+081288768823', '28 Riccarton Rd, Riccarton, Christchurch 8011, New Zealand', 'uploads/user/Reyner/photo.jpg', 1182.17, NULL, 1, '2016-08-16', 'user'),
(39, 'miki', 'd3623c77578eebdac371c5f82d23c3fb4376396cdb4c7045c933398105db60f9e56c7c3f3af8474ee155a0804ea6f193e66555d76362ecf2675802e4f1a2387d', 'Mickey', 'Jane', 'mickeyjane28@gmail.com', -43.5297406, 172.59807539999997, '+081288768823', '128 Riccarton Rd, Riccarton, Christchurch 8041, New Zealand', 'uploads/user/miki/photo.jpg', 0, '26ca21b62b3fbde2c977f5dd8a387cf340e8fc8f961797ee0df83547f80516bb', 0, '2016-08-23', 'user'),
(40, 'setysa', 'd3623c77578eebdac371c5f82d23c3fb4376396cdb4c7045c933398105db60f9e56c7c3f3af8474ee155a0804ea6f193e66555d76362ecf2675802e4f1a2387d', 'sdd', 'dd', 'asdasd@awssdasd.cn', 0, 0, '+812887688232', '', 'uploads/user/setysa/photo.jpg', 0, '113d100089fcabb9dd72efb7afc6bab5972e0bb7f5c388f420c41ba75cac6660', 0, '2016-08-23', 'user');

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
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `drivers`
--
ALTER TABLE `drivers`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;
--
-- AUTO_INCREMENT for table `order_detail`
--
ALTER TABLE `order_detail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;
--
-- AUTO_INCREMENT for table `order_history`
--
ALTER TABLE `order_history`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `restaurants`
--
ALTER TABLE `restaurants`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT for table `restaurant_time`
--
ALTER TABLE `restaurant_time`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=75;
--
-- AUTO_INCREMENT for table `review`
--
ALTER TABLE `review`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
