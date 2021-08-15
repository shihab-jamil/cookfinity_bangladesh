-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 15, 2021 at 09:47 AM
-- Server version: 10.3.16-MariaDB
-- PHP Version: 7.3.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cookfinity`
--
CREATE DATABASE IF NOT EXISTS `cookfinity` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `cookfinity`;

-- --------------------------------------------------------

--
-- Table structure for table `approval`
--

CREATE TABLE `approval` (
  `id` int(11) NOT NULL,
  `uid` int(11) NOT NULL,
  `status` varchar(255) NOT NULL,
  `approved_by_uid` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `approval`
--

INSERT INTO `approval` (`id`, `uid`, `status`, `approved_by_uid`) VALUES
(1, 2, 'Approved', 1),
(2, 3, 'Approved', 1),
(3, 4, 'Approved', 1),
(4, 7, 'Approved', 1),
(5, 8, 'Approved', 1);

-- --------------------------------------------------------

--
-- Table structure for table `balance`
--

CREATE TABLE `balance` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `balance` double NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `balance`
--

INSERT INTO `balance` (`id`, `user_id`, `balance`) VALUES
(1, 1, 0),
(2, 2, 0),
(3, 3, 0),
(4, 4, 0),
(5, 5, 0),
(6, 6, 0),
(7, 9, 0);

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `image_link` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `title`, `image_link`) VALUES
(1, 'Breakfast', 'https://images.unsplash.com/photo-1525351484163-7529414344d8?ixid=MnwxMjA3fDB8MHxzZWFyY2h8Mnx8YnJlYWtmYXN0fGVufDB8fDB8fA%3D%3D&ixlib=rb-1.2.1&w=1000&q=80'),
(2, 'Snacks', 'https://media.istockphoto.com/photos/group-of-sweet-and-salty-snacks-perfect-for-binge-watching-picture-id1149135424'),
(3, 'Lunch', 'https://d4t7t8y8xqo0t.cloudfront.net/resized/750X436/eazytrendz%2F2083%2Ftrend20181105100605.jpg'),
(4, 'Dinner', 'https://c.ndtvimg.com/2020-09/if4pp5j8_vegetarian_625x300_30_September_20.jpg'),
(5, 'Desert', 'https://images.unsplash.com/photo-1551024601-bec78aea704b?ixid=MnwxMjA3fDB8MHxzZWFyY2h8M3x8ZGVzc2VydHxlbnwwfHwwfHw%3D&ixlib=rb-1.2.1&w=1000&q=80');

-- --------------------------------------------------------

--
-- Table structure for table `ingredient`
--

CREATE TABLE `ingredient` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `price_per_kg` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `meal`
--

CREATE TABLE `meal` (
  `id` int(11) NOT NULL,
  `uid` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `category_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `image` varchar(255) NOT NULL,
  `expire_date` varchar(255) NOT NULL,
  `available_from` varchar(255) NOT NULL,
  `available_till` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `meal`
--

INSERT INTO `meal` (`id`, `uid`, `title`, `description`, `category_id`, `quantity`, `price`, `image`, `expire_date`, `available_from`, `available_till`) VALUES
(1, 2, 'Chicken Fry', 'yumm', 4, 13, 244, 'noImage.png', '2021-03-26', '20:00', '20:00'),
(2, 2, 'Vegetable', 'safddas', 3, 12, 25, 'noImage.png', '2021-03-26', '22:20', '20:21'),
(3, 1, 'juice', 'sadasd', 2, 190, 25, 'noImage.png', '2021-03-26', '20:22', '20:22'),
(4, 2, 'French Fry', 'werwef', 1, 5, 234, 'noImage.png', '2021-03-27', '22:20', '22:20'),
(5, 8, 'Where can I get some?', 'gvuvyghjkgvhj', 3, 23, 17, 'noImage.png', '2021-05-07', '04:08', '00:10'),
(6, 2, 'French Fry', 'fgsdfgd fdgdgf', 1, 5, 453453, 'noImage.png', '2021-06-05', '22:53', '22:56'),
(7, 2, 'pasta', 'wqd', 1, 23, 25, 'noImage.png', '2021-06-24', '00:57', '04:55'),
(8, 2, 'pasta', 'asdsadasdasdasdasd', 1, 190, 2500, 'noImage.png', '2021-06-09', '00:01', '00:01'),
(9, 2, 'moly', 'asdasdsda', 1, 1903, 700, 'noImage.png', '2021-06-10', '01:06', '03:02'),
(10, 2, 'Pizza', 'Delicious Food', 2, 23, 500, 'noImage.png', '2021-06-04', '03:13', '01:16'),
(11, 2, ' What is Lorem Ipsum?', 'sdfsdfsdf', 3, 12, 250, 'noImage.png', '2021-06-05', '03:29', '01:31'),
(12, 2, 'Biriyani', 'xjhhvzjcvjadasd', 1, 11, 250, 'noImage.png', '2021-06-03', '01:34', '04:32');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `ordered_by_uid` int(11) NOT NULL,
  `meal_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `status` varchar(255) NOT NULL DEFAULT 'Pending',
  `address` varchar(255) NOT NULL,
  `delivery_date` varchar(255) NOT NULL,
  `delivery_time` varchar(255) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `ordered_by_uid`, `meal_id`, `quantity`, `price`, `status`, `address`, `delivery_date`, `delivery_time`, `timestamp`) VALUES
(1, 6, 1, 5, 400, 'Canceled', 'Baridhara DOHS', '2021-03-26', '17:25', '0000-00-00 00:00:00'),
(2, 3, 7, 1903, 500, 'confirmed', 'sadsadasdasd', '2021-07-01', '01:03', '2021-05-31 19:02:56'),
(4, 3, 12, 11, 500, 'confirmed', 'asdasgxcZqweqweqwer', '2021-06-09', '01:34', '2021-05-31 19:34:38');

-- --------------------------------------------------------

--
-- Table structure for table `requests`
--

CREATE TABLE `requests` (
  `id` int(11) NOT NULL,
  `requested_by_uid` int(11) NOT NULL,
  `meal_title` varchar(255) NOT NULL,
  `quantity` int(11) NOT NULL,
  `address` varchar(255) NOT NULL,
  `delivery_date` varchar(255) NOT NULL,
  `delivery_time` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL DEFAULT 'Opened'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `response`
--

CREATE TABLE `response` (
  `id` int(11) NOT NULL,
  `request_id` int(11) NOT NULL,
  `responsed_by_uid` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `status` varchar(255) NOT NULL DEFAULT 'reviewing'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `review`
--

CREATE TABLE `review` (
  `id` int(11) NOT NULL,
  `uid` int(11) NOT NULL,
  `reviewed_by` int(11) NOT NULL,
  `score` varchar(255) NOT NULL,
  `comment` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` int(11) NOT NULL,
  `role_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `role_name`) VALUES
(1, 'Super Admin'),
(2, 'Admin'),
(3, 'Home Cook'),
(4, 'Supplier'),
(5, 'Consumer');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `platform_role_id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `phone_number` varchar(255) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `added_by` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name`, `platform_role_id`, `email`, `password`, `phone_number`, `image`, `added_by`) VALUES
(1, 'Shihab', 'Jamil', 1, 's@gmail.com', 'd534e5240c1eed89c83d01a8fe806033', '123456789', '25032021_040354879a6557b65e9c4bfbffd91129821d4eresNet9_n1.jpg', 1),
(2, 'Saidul', 'Islam', 3, 'saidul@gmail.com', 'd534e5240c1eed89c83d01a8fe806033', '21456232145', NULL, 1),
(3, 'Rezwanor Haque', 'Ridoy', 5, 'r@gmail.com', 'd534e5240c1eed89c83d01a8fe806033', '1706822418', NULL, 1),
(4, 'Samiul', 'Islam', 3, 'samiul@gmail.com', 'd534e5240c1eed89c83d01a8fe806033', '21456232145', NULL, 1),
(5, 'Md', 'Emon', 4, 'e@gmail.com', 'd534e5240c1eed89c83d01a8fe806033', '12312323', '23032021_100313reyna.jpg', 1),
(6, 'xxx', 'yyy', 5, 'st@gmail.com', 'd534e5240c1eed89c83d01a8fe806033', '21456232145', '24032021_03032320170604_191756.jpg', 2),
(7, 'Sam', 'Zone', 3, 'sam@gmail.com', 'd534e5240c1eed89c83d01a8fe806033', '21456232145', '03052021_070543st,small,507x507-pad,600x600,f8f8f8.jpg', NULL),
(8, 'Johm', 'Doe', 3, 'j@gmail.com', 'd534e5240c1eed89c83d01a8fe806033', '21456232145', '03052021_080533Screenshot 2021-04-12 224224.png', NULL),
(9, 'asd', 'asd', 1, 'mn@gmail.com', 'd534e5240c1eed89c83d01a8fe806033', '21456232145', 'noImage.png', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `approval`
--
ALTER TABLE `approval`
  ADD PRIMARY KEY (`id`),
  ADD KEY `uid` (`uid`),
  ADD KEY `approved_by_uid` (`approved_by_uid`);

--
-- Indexes for table `balance`
--
ALTER TABLE `balance`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ingredient`
--
ALTER TABLE `ingredient`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `meal`
--
ALTER TABLE `meal`
  ADD PRIMARY KEY (`id`),
  ADD KEY `uid` (`uid`),
  ADD KEY `category` (`category_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ordered_by_uid` (`ordered_by_uid`),
  ADD KEY `meal_id` (`meal_id`);

--
-- Indexes for table `requests`
--
ALTER TABLE `requests`
  ADD PRIMARY KEY (`id`),
  ADD KEY `requested_by_uid` (`requested_by_uid`);

--
-- Indexes for table `response`
--
ALTER TABLE `response`
  ADD PRIMARY KEY (`id`),
  ADD KEY `request_id` (`request_id`),
  ADD KEY `responsed_by_uid` (`responsed_by_uid`);

--
-- Indexes for table `review`
--
ALTER TABLE `review`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`uid`),
  ADD KEY `reviewed_by` (`reviewed_by`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `platform_role` (`platform_role_id`),
  ADD KEY `added_by` (`added_by`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `approval`
--
ALTER TABLE `approval`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `balance`
--
ALTER TABLE `balance`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `ingredient`
--
ALTER TABLE `ingredient`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `meal`
--
ALTER TABLE `meal`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `requests`
--
ALTER TABLE `requests`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `response`
--
ALTER TABLE `response`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `review`
--
ALTER TABLE `review`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `approval`
--
ALTER TABLE `approval`
  ADD CONSTRAINT `approval_ibfk_1` FOREIGN KEY (`uid`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `approval_ibfk_2` FOREIGN KEY (`approved_by_uid`) REFERENCES `users` (`id`);

--
-- Constraints for table `balance`
--
ALTER TABLE `balance`
  ADD CONSTRAINT `balance_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `meal`
--
ALTER TABLE `meal`
  ADD CONSTRAINT `meal_ibfk_1` FOREIGN KEY (`uid`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `meal_ibfk_2` FOREIGN KEY (`category_id`) REFERENCES `category` (`id`);

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`ordered_by_uid`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `orders_ibfk_2` FOREIGN KEY (`meal_id`) REFERENCES `meal` (`id`);

--
-- Constraints for table `requests`
--
ALTER TABLE `requests`
  ADD CONSTRAINT `requests_ibfk_1` FOREIGN KEY (`requested_by_uid`) REFERENCES `users` (`id`);

--
-- Constraints for table `response`
--
ALTER TABLE `response`
  ADD CONSTRAINT `response_ibfk_1` FOREIGN KEY (`request_id`) REFERENCES `requests` (`id`),
  ADD CONSTRAINT `response_ibfk_2` FOREIGN KEY (`responsed_by_uid`) REFERENCES `users` (`id`);

--
-- Constraints for table `review`
--
ALTER TABLE `review`
  ADD CONSTRAINT `review_ibfk_1` FOREIGN KEY (`uid`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `review_ibfk_2` FOREIGN KEY (`reviewed_by`) REFERENCES `users` (`id`);

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`platform_role_id`) REFERENCES `roles` (`id`),
  ADD CONSTRAINT `users_ibfk_2` FOREIGN KEY (`added_by`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
