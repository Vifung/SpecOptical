-- phpMyAdmin SQL Dump
-- version 4.4.10
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Feb 05, 2016 at 02:15 AM
-- Server version: 5.5.42
-- PHP Version: 5.6.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `specoptical`
--

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
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
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

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
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;