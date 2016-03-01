-- phpMyAdmin SQL Dump
-- version 4.4.10
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Mar 01, 2016 at 09:09 PM
-- Server version: 5.5.42
-- PHP Version: 5.6.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `specoptical`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` int(11) NOT NULL,
  `state` varchar(30) NOT NULL,
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `total` decimal(15,2) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`id`, `state`, `time`, `total`) VALUES
(1, 'cancelled', '2016-02-05 05:39:33', '12.95'),
(2, 'cancelled', '2016-02-19 00:13:05', '0.00'),
(3, 'cancelled', '2016-03-01 18:16:23', '0.00'),
(4, 'cancelled', '2016-03-01 18:17:55', '0.00'),
(5, 'cancelled', '2016-03-01 18:20:20', '0.00'),
(6, 'checked out', '2016-03-01 19:50:13', '0.00');

-- --------------------------------------------------------

--
-- Table structure for table `cart_product`
--

CREATE TABLE `cart_product` (
  `id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `cart_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cart_product`
--

INSERT INTO `cart_product` (`id`, `product_id`, `cart_id`, `quantity`, `time`) VALUES
(5, 2, 6, 1, '2016-03-01 19:57:43'),
(6, 2, 6, 1, '2016-03-01 19:57:43'),
(7, 3, 6, 1, '2016-03-01 19:57:46'),
(8, 3, 6, 1, '2016-03-01 19:57:46'),
(9, 4, 6, 1, '2016-03-01 19:57:48'),
(10, 4, 6, 1, '2016-03-01 19:57:48');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id` int(225) NOT NULL,
  `SKU` varchar(100) NOT NULL,
  `style` varchar(100) NOT NULL,
  `colour` varchar(100) NOT NULL,
  `type` varchar(100) NOT NULL,
  `unit_price` decimal(15,2) NOT NULL,
  `img` varchar(300) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `SKU`, `style`, `colour`, `type`, `unit_price`, `img`) VALUES
(1, '12354653', 'classic', 'black', 'prescription', '215.00', './images/Classic_Burberry_BE1156.jpg'),
(2, '08099988', 'classic', 'black', 'prescription', '107.00', './images/Classic_Burberry_BE1156.jpg'),
(3, '99934678', 'classic', 'black', 'prescription', '205.00', './images/Classic_Burberry_BE1156.jpg'),
(4, '77987399', 'trendy', 'black', 'prescription', '150.00', './images/Classic_Burberry_BE1156.jpg'),
(5, '77809099', 'trendy', 'black', 'prescription', '107.00', './images/Classic_Burberry_BE1156.jpg'),
(6, '76632199', 'trendy', 'black', 'prescription', '157.00', './images/Classic_Burberry_BE1156.jpg'),
(7, '11399823', 'nerdy', 'black', 'prescription', '300.00', './images/Classic_Burberry_BE1156.jpg'),
(8, '11299900', 'nerdy', 'black', 'prescription', '208.00', './images/Classic_Burberry_BE1156.jpg'),
(9, '00398922', 'nerdy', 'black', 'prescription', '285.00', './images/Classic_Burberry_BE1156.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `transactions`
--

CREATE TABLE `transactions` (
  `id` int(225) NOT NULL,
  `user_id` int(225) NOT NULL,
  `glasses_id` int(225) NOT NULL,
  `status` varchar(500) NOT NULL,
  `total_price` int(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `email` varchar(500) NOT NULL,
  `password` varchar(100) NOT NULL,
  `address1` varchar(100) DEFAULT NULL,
  `address2` varchar(500) DEFAULT NULL,
  `country` varchar(500) DEFAULT NULL,
  `staProv` varchar(500) DEFAULT NULL,
  `city` varchar(500) DEFAULT NULL,
  `zipPo` varchar(6) DEFAULT NULL,
  `fname` text NOT NULL,
  `lname` text NOT NULL,
  `phoneNum` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cart_product`
--
ALTER TABLE `cart_product`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_id` (`product_id`),
  ADD KEY `cart_id` (`cart_id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id` (`id`);

--
-- Indexes for table `transactions`
--
ALTER TABLE `transactions`
  ADD PRIMARY KEY (`user_id`,`glasses_id`,`id`),
  ADD KEY `id` (`id`),
  ADD KEY `glasses_id` (`glasses_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id` (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `cart_product`
--
ALTER TABLE `cart_product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` int(225) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `transactions`
--
ALTER TABLE `transactions`
  MODIFY `id` int(225) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `cart_product`
--
ALTER TABLE `cart_product`
  ADD CONSTRAINT `cart_product_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `cart_product_ibfk_2` FOREIGN KEY (`cart_id`) REFERENCES `cart` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `transactions`
--
ALTER TABLE `transactions`
  ADD CONSTRAINT `transactions_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `transactions_ibfk_2` FOREIGN KEY (`glasses_id`) REFERENCES `product` (`id`);
