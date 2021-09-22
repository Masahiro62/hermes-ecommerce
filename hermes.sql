-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Aug 27, 2021 at 05:00 AM
-- Server version: 5.7.32
-- PHP Version: 7.4.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `hermes`
--

-- --------------------------------------------------------

--
-- Table structure for table `accounts`
--

CREATE TABLE `accounts` (
  `account_id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `accounts`
--

INSERT INTO `accounts` (`account_id`, `username`, `password`) VALUES
(2, 'user', '$2y$10$JiDc9IkCuVQTxdEh1kmmG.KWgWFov9oCLWtBCFdIgHEDDHZMk.PWS'),
(5, 'test', '$2y$10$JiDc9IkCuVQTxdEh1kmmG.KWgWFov9oCLWtBCFdIgHEDDHZMk.PWS'),
(7, 'masahiro', '$2y$10$imcecd1i0SxfRpQErii66esojbpnhJXu9GBOZQUB9Y/Od.Njj.Bze'),
(8, 'user1', '$2y$10$ZZ.ybQzEwzJvHs/67Z26k.JlQwk60gxBp4T13gqVW0nEVBpveJKLG'),
(10, 'masahiro1', '$2y$10$7c5Q2AQApZGb/.ZK8pmIs.vxhQMwfCC.AuUSWEDksLxkMrGuDbp5K');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `cart_id` int(11) NOT NULL,
  `total_price` float(10,2) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `cart_items`
--

CREATE TABLE `cart_items` (
  `cart_item_id` int(11) NOT NULL,
  `item_id` int(11) NOT NULL,
  `item_price` float(10,2) NOT NULL,
  `quantity` int(11) NOT NULL,
  `cart_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `category_id` int(11) NOT NULL,
  `category_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`category_id`, `category_name`) VALUES
(24, 'bag'),
(22, 'book'),
(11, 'drink'),
(18, 'fish'),
(20, 'flower'),
(21, 'paper'),
(25, 'snack');

-- --------------------------------------------------------

--
-- Table structure for table `deliveries`
--

CREATE TABLE `deliveries` (
  `delivery_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `delivery_status` varchar(255) NOT NULL DEFAULT 'pending'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `deliveries`
--

INSERT INTO `deliveries` (`delivery_id`, `user_id`, `delivery_status`) VALUES
(1, 1, 'delivered'),
(2, 1, 'delivered'),
(3, 1, 'deliverying'),
(4, 1, 'pending'),
(5, 1, 'pending'),
(6, 1, 'pending'),
(7, 1, 'pending'),
(8, 1, 'pending'),
(9, 1, 'pending'),
(10, 2, 'pending'),
(11, 1, 'pending'),
(12, 1, 'pending'),
(13, 1, 'pending'),
(14, 1, 'pending'),
(15, 4, 'pending'),
(16, 4, 'pending'),
(17, 4, 'pending'),
(18, 8, 'pending'),
(19, 9, 'pending');

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE `events` (
  `event_id` int(11) NOT NULL,
  `event_title` varchar(100) NOT NULL,
  `event_detail` varchar(255) NOT NULL,
  `event_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`event_id`, `event_title`, `event_detail`, `event_date`) VALUES
(4, 'new arrival items ', 'We are going to sell new product such as Japanese sake. Please try it the tase. you would love it. thank you for readying our message. have a nice day', '2021-08-30'),
(6, 'Summer Sale ', 'we are going to discount some products', '2021-08-28'),
(8, 'xxx', 'yyyyy', '2021-08-26'),
(9, 'asdfg', 'qwertyu', '2021-08-27');

-- --------------------------------------------------------

--
-- Table structure for table `items`
--

CREATE TABLE `items` (
  `item_id` int(11) NOT NULL,
  `item_name` varchar(50) NOT NULL,
  `item_description` varchar(255) NOT NULL,
  `item_stocks` int(11) NOT NULL,
  `item_price` float(50,2) NOT NULL,
  `publish_date` date NOT NULL,
  `category_id` int(11) NOT NULL,
  `item_image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `items`
--

INSERT INTO `items` (`item_id`, `item_name`, `item_description`, `item_stocks`, `item_price`, `publish_date`, `category_id`, `item_image`) VALUES
(5, 'milk', '', 81, 3.00, '2021-08-23', 11, '08-27-21 04:20:17 am.jpg'),
(6, 'cheese', 'delicious!', 499, 2.00, '2021-08-30', 4, '08-19-21 02:47:19 pm.jpeg'),
(8, 'sushi', 'Jpanese shushi. Those fish is row. ', 19, 10.00, '2021-08-31', 4, '08-20-21 07:22:35 am.jpg'),
(9, 'BARA', 'It is a Rose.  The colour is quite cool and beautiful. We have been selling one by one.If you would like to get like the bouquet, please order more than 15 pieces.', 979, 2.00, '2021-08-20', 20, '08-20-21 07:27:54 am.png'),
(10, 'takoyaki', 'It was made in Osaka. The condition is frozen although the taste is pretty good !', 9, 5.00, '2021-08-01', 4, '08-20-21 07:30:52 am.jpg'),
(11, 'NARUTO', 'This book is popular in Japan. You would like this comics.', 25, 5.00, '2021-08-12', 22, '08-20-21 07:32:36 am.jpg'),
(12, 'koi', 'fish', 7, 30.50, '2021-08-27', 18, '08-22-21 12:35:44 pm.jpeg'),
(13, 'origami', 'xxxxxxxxx', 1998, 1.21, '2021-08-17', 21, '08-22-21 12:40:40 pm.jpeg'),
(14, 'soju', '', 99, 3.00, '2021-08-24', 11, '08-23-21 04:30:32 am.jpeg'),
(17, 'aaaaa', '', 109, 12.00, '2021-08-02', 24, 'no_image.jpg'),
(18, '123', '', 30, 12.00, '2021-08-01', 25, '08-27-21 12:24:20 am.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `order_id` int(11) NOT NULL,
  `item_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `delivery_id` int(11) NOT NULL,
  `gross` float(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`order_id`, `item_id`, `user_id`, `delivery_id`, `gross`) VALUES
(1, 17, 1, 6, 36.00),
(2, 17, 1, 7, 276.00),
(3, 17, 1, 8, 276.00),
(4, 11, 1, 9, 10.00),
(5, 12, 2, 10, 61.00),
(6, 9, 1, 11, 40.00),
(7, 11, 1, 12, 60.00),
(8, 17, 1, 13, 252.00),
(9, 17, 1, 14, 252.00),
(10, 5, 4, 15, 3.00),
(11, 5, 4, 16, 3.00),
(12, 13, 4, 17, 1.21),
(13, 5, 8, 18, 9.00),
(14, 5, 9, 19, 9.00);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `fullname` varchar(100) NOT NULL,
  `address` varchar(255) NOT NULL,
  `contact_number` int(50) NOT NULL,
  `email` varchar(255) NOT NULL,
  `status` varchar(1) NOT NULL DEFAULT 'U',
  `account_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `fullname`, `address`, `contact_number`, `email`, `status`, `account_id`) VALUES
(1, 'admin', 'shiga', 123456, 'admin@example.com', 'A', 1),
(2, 'user', 'Japan', 98765, 'user@gmail.com', 'U', 2),
(6, 'masahiro fuchigami', 'Shiga, Japan', 123456, 'hmrpdh@gmail.com', 'A', 7),
(7, 'user1', 'a', 123456, 'hmrpdh@gmail.com', 'U', 8),
(9, 'masahiro fuchigami', 'Shiga, Japan', 123456, 'hmrpdh@gmail.com', 'A', 10);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `accounts`
--
ALTER TABLE `accounts`
  ADD PRIMARY KEY (`account_id`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`cart_id`);

--
-- Indexes for table `cart_items`
--
ALTER TABLE `cart_items`
  ADD PRIMARY KEY (`cart_item_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`category_id`),
  ADD UNIQUE KEY `category_name` (`category_name`),
  ADD UNIQUE KEY `category_name_2` (`category_name`);

--
-- Indexes for table `deliveries`
--
ALTER TABLE `deliveries`
  ADD PRIMARY KEY (`delivery_id`);

--
-- Indexes for table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`event_id`);

--
-- Indexes for table `items`
--
ALTER TABLE `items`
  ADD PRIMARY KEY (`item_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `accounts`
--
ALTER TABLE `accounts`
  MODIFY `account_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `cart_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `cart_items`
--
ALTER TABLE `cart_items`
  MODIFY `cart_item_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `deliveries`
--
ALTER TABLE `deliveries`
  MODIFY `delivery_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `event_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `items`
--
ALTER TABLE `items`
  MODIFY `item_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
