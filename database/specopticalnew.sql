-- phpMyAdmin SQL Dump
-- version 4.2.7
-- http://www.phpmyadmin.net
--
-- Host: localhost:8891
-- Generation Time: Feb 05, 2016 at 05:51 AM
-- Server version: 5.5.41-log
-- PHP Version: 7.0.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `specoptical`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE IF NOT EXISTS `cart` (
`id` int(11) NOT NULL,
  `state` varchar(30) NOT NULL,
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `total` decimal(15,2) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`id`, `state`, `time`, `total`) VALUES
(1, 'cancelled', '2016-02-05 05:39:33', 12.95);

-- --------------------------------------------------------

--
-- Table structure for table `cart_product`
--

CREATE TABLE IF NOT EXISTS `cart_product` (
`id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `cart_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `cart_product`
--

INSERT INTO `cart_product` (`id`, `product_id`, `cart_id`, `quantity`, `time`) VALUES
(1, 1, 1, 1, '2016-02-05 05:44:42');

-- --------------------------------------------------------

--
-- Table structure for table `glasses`
--

CREATE TABLE IF NOT EXISTS `glasses` (
`id` int(225) NOT NULL,
  `SKU` varchar(100) NOT NULL,
  `style` varchar(100) NOT NULL,
  `colour` varchar(100) NOT NULL,
  `type` varchar(100) NOT NULL,
  `unit_price` decimal(15,2) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `glasses`
--

INSERT INTO `glasses` (`id`, `SKU`, `style`, `colour`, `type`, `unit_price`) VALUES
(1, '12354653', 'classic', 'black', 'prescription', 12.95);

-- --------------------------------------------------------

--
-- Table structure for table `transactions`
--

CREATE TABLE IF NOT EXISTS `transactions` (
`id` int(225) NOT NULL,
  `user_id` int(225) NOT NULL,
  `glasses_id` int(225) NOT NULL,
  `status` varchar(500) NOT NULL,
  `total_price` int(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
`id` int(11) NOT NULL,
  `email` varchar(500) NOT NULL,
  `password` varchar(100) NOT NULL,
  `address1` varchar(100) NOT NULL,
  `address2` varchar(500) DEFAULT NULL,
  `country` varchar(500) NOT NULL,
  `staProv` varchar(500) NOT NULL,
  `city` varchar(500) NOT NULL,
  `zipPo` varchar(6) NOT NULL,
  `fname` text NOT NULL,
  `lname` text NOT NULL,
  `phoneNum` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

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
 ADD PRIMARY KEY (`id`), ADD KEY `product_id` (`product_id`), ADD KEY `cart_id` (`cart_id`);

--
-- Indexes for table `glasses`
--
ALTER TABLE `glasses`
 ADD PRIMARY KEY (`id`), ADD KEY `id` (`id`);

--
-- Indexes for table `transactions`
--
ALTER TABLE `transactions`
 ADD PRIMARY KEY (`user_id`,`glasses_id`,`id`), ADD KEY `id` (`id`), ADD KEY `glasses_id` (`glasses_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
 ADD PRIMARY KEY (`id`), ADD KEY `id` (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `cart_product`
--
ALTER TABLE `cart_product`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `glasses`
--
ALTER TABLE `glasses`
MODIFY `id` int(225) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
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
ADD CONSTRAINT `cart_product_ibfk_2` FOREIGN KEY (`cart_id`) REFERENCES `cart` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT `cart_product_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `glasses` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `transactions`
--
ALTER TABLE `transactions`
ADD CONSTRAINT `transactions_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT `transactions_ibfk_2` FOREIGN KEY (`glasses_id`) REFERENCES `glasses` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
