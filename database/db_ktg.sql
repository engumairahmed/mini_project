-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 03, 2023 at 10:58 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_ktg`
--

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `cat_id` int(255) NOT NULL,
  `cat_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`cat_id`, `cat_name`) VALUES
(1, 'Hotel'),
(2, 'Resort'),
(3, 'Restaurant'),
(4, 'Tour');

-- --------------------------------------------------------

--
-- Table structure for table `classes`
--

CREATE TABLE `classes` (
  `class_id` int(255) NOT NULL,
  `class` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `classes`
--

INSERT INTO `classes` (`class_id`, `class`) VALUES
(1, 'Single'),
(2, 'Double'),
(3, 'Triple'),
(4, 'Quad'),
(5, 'King'),
(6, 'Queen'),
(7, 'Twin'),
(8, 'Studio'),
(9, 'Suite'),
(10, 'Mini Suite'),
(11, 'President Suite'),
(12, 'Double'),
(13, 'Villa'),
(14, 'Cabana');

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `cont_id` int(255) NOT NULL,
  `cont_address` varchar(255) NOT NULL,
  `cont_email` varchar(255) NOT NULL,
  `cont_number` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`cont_id`, `cont_address`, `cont_email`, `cont_number`) VALUES
(1, 'ABC Building, XYZ Floor, City, Country.', 'info@gmail.com', '03211234567');

-- --------------------------------------------------------

--
-- Table structure for table `hotels`
--

CREATE TABLE `hotels` (
  `htl_id` int(11) NOT NULL,
  `htl_name` varchar(255) NOT NULL,
  `htl_city` varchar(255) NOT NULL,
  `htl_rating` int(255) NOT NULL,
  `htl_rooms` int(255) NOT NULL,
  `htl_vacant_rooms` int(11) NOT NULL,
  `htl_room_type` int(11) NOT NULL,
  `htl_room_charges` int(11) NOT NULL,
  `htl_image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `hotels`
--

INSERT INTO `hotels` (`htl_id`, `htl_name`, `htl_city`, `htl_rating`, `htl_rooms`, `htl_vacant_rooms`, `htl_room_type`, `htl_room_charges`, `htl_image`) VALUES
(11, 'Regent Plaza', 'Karachi', 2, 300, 100, 5, 25000, 'assets/img/1682965401regent-plaza.jpg'),
(12, 'Movenpick', 'Karachi', 2, 300, 100, 5, 30000, 'assets/img/1683061112movenpick.jpg'),
(13, 'Avari Tower', 'Karachi', 2, 200, 100, 1, 15000, 'assets/img/1683061492avari-tower.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `ord_id` int(255) NOT NULL,
  `ord_user` int(255) NOT NULL,
  `ord_start_date` varchar(255) NOT NULL,
  `ord_end_date` varchar(255) NOT NULL,
  `ord_product` varchar(255) NOT NULL,
  `ord_room_class` int(255) NOT NULL,
  `ord_persons` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`ord_id`, `ord_user`, `ord_start_date`, `ord_end_date`, `ord_product`, `ord_room_class`, `ord_persons`) VALUES
(2, 15, '2023-05-04', '2023-05-05', 'Avari Tower', 14, 5),
(3, 17, '2023-05-06', '2023-05-10', 'Regent Plaza', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `queries`
--

CREATE TABLE `queries` (
  `qry_id` int(255) NOT NULL,
  `qry_user_name` varchar(255) NOT NULL,
  `qry_user_email` varchar(255) NOT NULL,
  `qry_subject` varchar(255) NOT NULL,
  `qry_message` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `queries`
--

INSERT INTO `queries` (`qry_id`, `qry_user_name`, `qry_user_email`, `qry_subject`, `qry_message`) VALUES
(1, '$name', '$email', '$subj', '0'),
(2, '$name', '$email', '$subj', '$message'),
(3, 'Umair', 'umair@gmail.com', 'Test', 'Test'),
(4, 'Umair', 'umair@gmail.com', 'Test', 'Test');

-- --------------------------------------------------------

--
-- Table structure for table `rating`
--

CREATE TABLE `rating` (
  `rt_id` int(11) NOT NULL,
  `rt_rating` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `rating`
--

INSERT INTO `rating` (`rt_id`, `rt_rating`) VALUES
(1, '3 Star'),
(2, '5 Star'),
(3, '7 Star');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` int(11) NOT NULL,
  `role` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `role`) VALUES
(1, 'User'),
(2, 'Admin'),
(3, 'HR');

-- --------------------------------------------------------

--
-- Table structure for table `slider`
--

CREATE TABLE `slider` (
  `sli_id` int(255) NOT NULL,
  `sli_name` varchar(255) NOT NULL,
  `sli_image` varchar(255) NOT NULL,
  `sli_heading` varchar(255) NOT NULL,
  `sli_parag` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `slider`
--

INSERT INTO `slider` (`sli_id`, `sli_name`, `sli_image`, `sli_heading`, `sli_parag`) VALUES
(0, 'Movenpick', 'assets/img/1682665592movenpick.jpg', 'Movenpick Luxury Hotel', 'Location Test');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` int(11) NOT NULL,
  `status` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `role`, `status`) VALUES
(14, 'HR', 'hr@gmail.com', '$2y$10$JGzXL0W5QDTl.AoWXyEwG./FD52XwoiI1f5XxkFkC3m77hL/rfdeC', 3, 2),
(15, 'Umair', 'umair@gmail.com', '$2y$10$jOCEK2seFd4Ew2K/5pflOep5656xRmZYf66YmUN6St84S0k.ZM0GS', 2, 4),
(16, 'admin', 'admin@gmail.com', '$2y$10$bd6mb65lqWwH2edPRgkJmuv.fOJBsqzjxf4RwMpO8R7WFLoZSD8jO', 2, 3),
(17, 'Khizar', 'khizar@gmail.com', '$2y$10$Eny4ynuUinsvXljqeQAg7eJOQiGcS.xOsyBPXE/tlgfKTe8g.X5hS', 1, 3);

-- --------------------------------------------------------

--
-- Table structure for table `user_status`
--

CREATE TABLE `user_status` (
  `status_id` int(255) NOT NULL,
  `status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_status`
--

INSERT INTO `user_status` (`status_id`, `status`) VALUES
(1, 'logged-in'),
(2, 'logged-out'),
(3, 'Active'),
(4, 'Disabled');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`cat_id`);

--
-- Indexes for table `classes`
--
ALTER TABLE `classes`
  ADD PRIMARY KEY (`class_id`);

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`cont_id`);

--
-- Indexes for table `hotels`
--
ALTER TABLE `hotels`
  ADD PRIMARY KEY (`htl_id`),
  ADD KEY `FK_HOTEL_RATING` (`htl_rating`),
  ADD KEY `FK_HOTEL_CLASS` (`htl_room_type`),
  ADD KEY `FK_Hotel_Image` (`htl_image`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`ord_id`),
  ADD KEY `FK-Order_User` (`ord_user`),
  ADD KEY `FK_Order_Room` (`ord_room_class`);

--
-- Indexes for table `queries`
--
ALTER TABLE `queries`
  ADD PRIMARY KEY (`qry_id`);

--
-- Indexes for table `rating`
--
ALTER TABLE `rating`
  ADD PRIMARY KEY (`rt_id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `slider`
--
ALTER TABLE `slider`
  ADD PRIMARY KEY (`sli_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_USERS_ROLE` (`role`),
  ADD KEY `FK_USR_STAT` (`status`);

--
-- Indexes for table `user_status`
--
ALTER TABLE `user_status`
  ADD PRIMARY KEY (`status_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `cat_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `classes`
--
ALTER TABLE `classes`
  MODIFY `class_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `cont_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `hotels`
--
ALTER TABLE `hotels`
  MODIFY `htl_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `ord_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `queries`
--
ALTER TABLE `queries`
  MODIFY `qry_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `rating`
--
ALTER TABLE `rating`
  MODIFY `rt_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `slider`
--
ALTER TABLE `slider`
  MODIFY `sli_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `user_status`
--
ALTER TABLE `user_status`
  MODIFY `status_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `hotels`
--
ALTER TABLE `hotels`
  ADD CONSTRAINT `FK_HOTEL_CLASS` FOREIGN KEY (`htl_room_type`) REFERENCES `classes` (`class_id`),
  ADD CONSTRAINT `FK_HOTEL_RATING` FOREIGN KEY (`htl_rating`) REFERENCES `rating` (`rt_id`);

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `FK-Order_User` FOREIGN KEY (`ord_user`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `FK_Order_Room` FOREIGN KEY (`ord_room_class`) REFERENCES `classes` (`class_id`);

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `FK_USERS_ROLE` FOREIGN KEY (`role`) REFERENCES `roles` (`id`),
  ADD CONSTRAINT `FK_USR_STAT` FOREIGN KEY (`status`) REFERENCES `user_status` (`status_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
