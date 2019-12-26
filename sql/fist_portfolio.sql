-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Dec 26, 2019 at 02:57 PM
-- Server version: 5.7.26
-- PHP Version: 7.3.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `fist_portfolio`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `cart_id` int(100) NOT NULL,
  `user_id` int(100) NOT NULL,
  `trainer_id` int(100) NOT NULL,
  `quantity` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`cart_id`, `user_id`, `trainer_id`, `quantity`) VALUES
(1, 3, 1, 4);

-- --------------------------------------------------------

--
-- Table structure for table `confirm`
--

CREATE TABLE `confirm` (
  `cart_id` int(100) NOT NULL,
  `user_id` int(100) NOT NULL,
  `trainer_id` int(100) NOT NULL,
  `quantity` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `coupon`
--

CREATE TABLE `coupon` (
  `coupon_id` int(100) NOT NULL,
  `coupon_number` int(100) NOT NULL,
  `coupon_discount` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `coupon`
--

INSERT INTO `coupon` (`coupon_id`, `coupon_number`, `coupon_discount`) VALUES
(1, 623, 30),
(2, 708, 20),
(3, 115, 10);

-- --------------------------------------------------------

--
-- Table structure for table `favorite`
--

CREATE TABLE `favorite` (
  `cart_id` int(100) NOT NULL,
  `user_id` int(100) NOT NULL,
  `trainer_id` int(100) NOT NULL,
  `quantity` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `login_id` int(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`login_id`, `username`, `password`) VALUES
(1, 'hotaka', 'f6d7d2f0aed2250bf0a2492292ab9a40'),
(2, 'shotaro', 'fd61ea85b7bb3a71d4889cf64b37f80d'),
(3, 'cart', '54013ba69c196820e56801f1ef5aad54');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `trainer_id` int(100) NOT NULL,
  `trainer_fname` varchar(100) NOT NULL,
  `trainer_lname` varchar(100) NOT NULL,
  `trainer_uname` varchar(100) NOT NULL,
  `trainer_email` varchar(100) NOT NULL,
  `trainer_description` varchar(100) NOT NULL,
  `trainer_phone` varchar(100) NOT NULL,
  `trainer_address` varchar(100) NOT NULL,
  `trainer_gender` varchar(100) NOT NULL,
  `trainer_image` varchar(100) DEFAULT NULL,
  `trainer_price` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`trainer_id`, `trainer_fname`, `trainer_lname`, `trainer_uname`, `trainer_email`, `trainer_description`, `trainer_phone`, `trainer_address`, `trainer_gender`, `trainer_image`, `trainer_price`) VALUES
(1, 'shotaro', 'ueda', 'shotaro', 'shotaro@gmail.com', 'shotaro', '09098765432', 'Avida, IT Park', 'Male', 'shotro.jpg', 500),
(2, 'hitomi', 'hanashiro', 'hitomi', 'hitomi@gmail.com', 'hitomi', '09059238328', 'share house, El Dorado', 'Female', 'hitomi.png', 200),
(3, 'seiya', 'hirano', 'seiya', 'seiya@gmail.com', 'plase call me, all girls!!!', '09021928324', 'share house, El Dorado', 'Female', 'seiya.png', 350),
(4, 'shodai', 'inoue', 'shodai', 'shotaro@gmail.com', 'shodai', '09042328593', 'Avida, IT Park', 'Male', 'shodai.png', 380),
(5, 'tomo', 'tanaka', 'tomo', 'tomo@gmail.com', 'I&#039;m so kind, that&#039;s why I can teach well.', '09084298421', 'Avida, IT Park', 'Male', 'tomo.png', 390),
(13, 'sho', 'ishihara', 'sho', 'sho@gmail.com', 'I&#039;m do handsome, don&#039;t be courting me!', '09057329458', 'Osaka, Japan', 'Female', 'sho.png', 180);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(100) NOT NULL,
  `user_fname` varchar(100) NOT NULL,
  `user_lname` varchar(100) NOT NULL,
  `user_email` varchar(100) NOT NULL,
  `user_status` varchar(100) DEFAULT NULL,
  `user_image` varchar(100) DEFAULT NULL,
  `login_id` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `user_fname`, `user_lname`, `user_email`, `user_status`, `user_image`, `login_id`) VALUES
(1, 'hotaka', 'tajima', 'hotaka120623@gmail.com', 'admin', NULL, 1),
(3, 'cart', 'john', 'cart@gmail.com', 'user', 'cart.png', 3);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`cart_id`);

--
-- Indexes for table `confirm`
--
ALTER TABLE `confirm`
  ADD PRIMARY KEY (`cart_id`);

--
-- Indexes for table `coupon`
--
ALTER TABLE `coupon`
  ADD PRIMARY KEY (`coupon_id`);

--
-- Indexes for table `favorite`
--
ALTER TABLE `favorite`
  ADD PRIMARY KEY (`cart_id`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`login_id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`trainer_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `cart_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `confirm`
--
ALTER TABLE `confirm`
  MODIFY `cart_id` int(100) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `coupon`
--
ALTER TABLE `coupon`
  MODIFY `coupon_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `favorite`
--
ALTER TABLE `favorite`
  MODIFY `cart_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `login_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `trainer_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
