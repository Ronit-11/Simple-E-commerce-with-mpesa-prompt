-- phpMyAdmin SQL Dump
-- version 5.3.0-dev+20220913.344981d57d
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3308
-- Generation Time: Nov 17, 2023 at 02:58 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ecommerce`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `customer_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`customer_id`, `product_id`, `quantity`) VALUES
(9, 45, 1),
(9, 48, 1);

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `category_id` int(11) NOT NULL,
  `category_name` varchar(25) NOT NULL,
  `is_deleted` enum('0','1') NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`category_id`, `category_name`, `is_deleted`) VALUES
(101, 'Men', '0'),
(102, 'Women', '0'),
(103, 'Children', '0');

-- --------------------------------------------------------

--
-- Table structure for table `order`
--

CREATE TABLE `order` (
  `order_id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `order_amount` double NOT NULL DEFAULT 0,
  `order_status` enum('pending','pending payment','paid') NOT NULL,
  `created_at` datetime NOT NULL,
  `payment_type` int(11) NOT NULL,
  `updated_at` datetime NOT NULL,
  `is_deleted` enum('0','1') NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `order`
--

INSERT INTO `order` (`order_id`, `customer_id`, `order_amount`, `order_status`, `created_at`, `payment_type`, `updated_at`, `is_deleted`) VALUES
(5, 7, 40.5, 'paid', '2022-07-12 16:31:26', 156235, '2022-07-12 16:31:26', '0'),
(6, 7, 7, 'paid', '2022-07-13 08:51:42', 156235, '2022-07-13 08:51:42', '0'),
(7, 7, 2.6, 'paid', '2022-07-13 09:01:03', 156235, '2022-07-13 09:01:03', '0'),
(8, 9, 37.85, 'paid', '2022-07-13 09:04:53', 156235, '2022-07-13 09:04:53', '0'),
(9, 9, 2.6, 'paid', '2022-07-13 09:40:01', 156235, '2022-07-13 09:40:01', '0'),
(10, 20, 10006, 'paid', '2022-07-13 10:16:55', 156235, '2022-07-13 10:16:55', '0'),
(11, 21, 6, 'paid', '2022-07-13 10:20:31', 156235, '2022-07-13 10:20:31', '0'),
(12, 21, 6, 'paid', '2022-07-13 10:20:33', 156235, '2022-07-13 10:20:33', '0'),
(13, 21, 11.9, 'paid', '2022-07-13 10:28:44', 156235, '2022-07-13 10:28:44', '0');

-- --------------------------------------------------------

--
-- Table structure for table `orderdetails`
--

CREATE TABLE `orderdetails` (
  `orderdetails_id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `product_price` double NOT NULL,
  `order_quantity` int(11) NOT NULL,
  `orderdetails_total` double NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `is_deleted` enum('0','1') NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orderdetails`
--

INSERT INTO `orderdetails` (`orderdetails_id`, `order_id`, `product_id`, `product_price`, `order_quantity`, `orderdetails_total`, `created_at`, `updated_at`, `is_deleted`) VALUES
(3, 5, 47, 5, 4, 20, '2022-07-12 16:31:26', '2022-07-12 16:31:26', '0'),
(4, 5, 50, 2.5, 3, 7.5, '2022-07-12 16:31:26', '2022-07-12 16:31:26', '0'),
(5, 5, 51, 6.5, 2, 13, '2022-07-12 16:31:26', '2022-07-12 16:31:26', '0'),
(6, 6, 52, 7, 1, 7, '2022-07-13 08:51:42', '2022-07-13 08:51:42', '0'),
(7, 7, 49, 2.6, 1, 2.6, '2022-07-13 09:01:03', '2022-07-13 09:01:03', '0'),
(8, 8, 45, 2.75, 3, 8.25, '2022-07-13 09:04:53', '2022-07-13 09:04:53', '0'),
(9, 8, 47, 5, 2, 10, '2022-07-13 09:04:53', '2022-07-13 09:04:53', '0'),
(10, 8, 48, 4.9, 4, 19.6, '2022-07-13 09:04:53', '2022-07-13 09:04:53', '0'),
(11, 9, 49, 2.6, 1, 2.6, '2022-07-13 09:40:01', '2022-07-13 09:40:01', '0'),
(12, 10, 43, 6, 1, 6, '2022-07-13 10:16:55', '2022-07-13 10:16:55', '0'),
(13, 10, 154, 10000, 1, 10, '2022-07-13 10:16:55', '2022-07-13 10:16:55', '0'),
(14, 11, 43, 6, 1, 6, '2022-07-13 10:20:31', '2022-07-13 10:20:31', '0'),
(15, 13, 48, 4.9, 1, 4.9, '2022-07-13 10:28:44', '2022-07-13 10:28:44', '0'),
(16, 13, 52, 7, 1, 7, '2022-07-13 10:28:44', '2022-07-13 10:28:44', '0');

-- --------------------------------------------------------

--
-- Table structure for table `paymenttypes`
--

CREATE TABLE `paymenttypes` (
  `paymenttype_id` int(11) NOT NULL,
  `paymenttype_name` varchar(20) NOT NULL,
  `description` varchar(40) NOT NULL,
  `is_deleted` enum('0','1') NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `paymenttypes`
--

INSERT INTO `paymenttypes` (`paymenttype_id`, `paymenttype_name`, `description`, `is_deleted`) VALUES
(156235, 'Mpesa', 'Daraja API popup', '0');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `product_id` int(11) NOT NULL,
  `product_name` varchar(25) NOT NULL,
  `product_description` text NOT NULL,
  `unit_price` double NOT NULL,
  `available_quantity` int(11) NOT NULL,
  `subcategory_id` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `added_by` int(11) NOT NULL,
  `is_deleted` enum('0','1') NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`product_id`, `product_name`, `product_description`, `unit_price`, `available_quantity`, `subcategory_id`, `created_at`, `updated_at`, `added_by`, `is_deleted`) VALUES
(39, 'Light Blue Jeans', 'Men , size 45', 5.5, 50, 1001, '2022-06-22 07:52:55', '2022-06-22 07:52:55', 9, '0'),
(40, 'Dark Blue Jeans', 'Women , size 40', 4.5, 60, 1002, '2022-06-22 07:56:03', '2022-06-22 07:56:03', 9, '0'),
(41, 'White Jeans', 'Boy , size 25', 3, 40, 1003, '2022-06-22 07:56:51', '2022-06-22 07:56:51', 9, '0'),
(42, 'Light Blue Jeans', 'Girl(with white spots) , size 25', 3, 40, 1003, '2022-06-22 08:03:08', '2022-06-22 08:03:08', 9, '0'),
(43, 'Yellow T-shirt', 'Men(plain HRX) ,size 46', 6, 40, 3001, '2022-06-22 08:04:26', '2022-06-22 08:04:26', 9, '0'),
(44, 'Black T-shirt', 'Women(Hop on image) ,size 37', 5, 40, 3002, '2022-06-22 08:05:25', '2022-06-22 08:05:25', 9, '0'),
(45, 'Light blue T-shirt', 'Boy(Spiderman) ,size 20', 2.75, 50, 3003, '2022-06-22 08:06:18', '2022-06-22 08:06:18', 9, '0'),
(46, 'brown T-shirt', 'Girl(flowers written) ,size 20', 2.75, 50, 3003, '2022-06-22 08:07:08', '2022-06-22 08:07:08', 9, '0'),
(47, 'White Shirt', 'Men(blue leaf pattern) ,size 48', 5, 35, 2001, '2022-06-22 08:08:03', '2022-06-22 08:08:03', 9, '0'),
(48, 'Green Shirt', 'Women(plain) ,size 40', 4.9, 40, 2002, '2022-06-22 08:08:51', '2022-06-22 08:08:51', 9, '0'),
(49, 'Navy blue Shirt', 'Boy(white dots, brown box) ,size 20', 2.6, 40, 2003, '2022-06-22 08:10:08', '2022-06-22 08:10:08', 9, '0'),
(50, 'Light pink Shirt', 'Girl(dark pink square formation) ,size 20', 2.5, 20, 2003, '2022-06-22 08:11:25', '2022-06-22 08:11:25', 9, '0'),
(51, 'White Jacket', 'Men(black strip till chest) ,size 50', 6.5, 28, 4001, '2022-06-22 08:12:35', '2022-06-22 08:12:35', 9, '0'),
(52, 'Marron Jacket', 'Women(plain thick cloth) ,size 42', 7, 34, 4002, '2022-06-22 08:13:49', '2022-06-22 08:13:49', 9, '0'),
(53, 'Sky blue Jacket', 'Boy(light blue strokes) ,size 25', 5, 44, 4003, '2022-06-22 08:14:49', '2022-06-22 08:14:49', 9, '0'),
(154, 'Vitz', 'CAR', 10000, 2, 1001, '2022-07-13 09:56:05', '2022-07-13 10:01:08', 8, '0');

-- --------------------------------------------------------

--
-- Table structure for table `productimages`
--

CREATE TABLE `productimages` (
  `productimage_id` int(11) NOT NULL,
  `product_image` varchar(50) NOT NULL,
  `product_id` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `added_by` int(11) NOT NULL,
  `is_deleted` enum('0','1') NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `productimages`
--

INSERT INTO `productimages` (`productimage_id`, `product_image`, `product_id`, `created_at`, `updated_at`, `added_by`, `is_deleted`) VALUES
(3, 'Images/men 1.jpg', 39, '2022-06-22 07:52:55', '2022-06-22 07:52:55', 9, '0'),
(4, 'Images/women 1.jpg', 40, '2022-06-22 07:56:03', '2022-06-22 07:56:03', 9, '0'),
(6, 'Images/children 1.2.jpg', 42, '2022-06-22 08:03:08', '2022-06-22 08:03:08', 9, '0'),
(7, 'Images/men 2.jpg', 43, '2022-06-22 08:04:26', '2022-06-22 08:04:26', 9, '0'),
(8, 'Images/women 2.jpg', 44, '2022-06-22 08:05:25', '2022-06-22 08:05:25', 9, '0'),
(9, 'Images/children 2.1.jpg', 45, '2022-06-22 08:06:18', '2022-06-22 08:06:18', 9, '0'),
(10, 'Images/children 2.2.jpg', 46, '2022-06-22 08:07:08', '2022-06-22 08:07:08', 9, '0'),
(11, 'Images/men 3.jpg', 47, '2022-06-22 08:08:03', '2022-06-22 08:08:03', 9, '0'),
(12, 'Images/women 3.jpg', 48, '2022-06-22 08:08:51', '2022-06-22 08:08:51', 9, '0'),
(13, 'Images/children 3.1.jpg', 49, '2022-06-22 08:10:08', '2022-06-22 08:10:08', 9, '0'),
(14, 'Images/children 3.2.jpg', 50, '2022-06-22 08:11:25', '2022-06-22 08:11:25', 9, '0'),
(15, 'Images/men 4.jpg', 51, '2022-06-22 08:12:35', '2022-06-22 08:12:35', 9, '0'),
(16, 'Images/women 4.jpg', 52, '2022-06-22 08:13:49', '2022-06-22 08:13:49', 9, '0'),
(17, 'Images/children 4.1.jpg', 53, '2022-06-22 08:14:49', '2022-06-22 08:14:49', 9, '0'),
(8958, 'Images/OIP.jpg', 154, '2022-07-13 09:56:05', '2022-07-13 10:01:08', 8, '0');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `role_id` int(11) NOT NULL,
  `role_name` varchar(15) NOT NULL,
  `is_deleted` enum('0','1') NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`role_id`, `role_name`, `is_deleted`) VALUES
(1, 'admin', '0'),
(3, 'Customer', '0');

-- --------------------------------------------------------

--
-- Table structure for table `subcategories`
--

CREATE TABLE `subcategories` (
  `subcategory_id` int(11) NOT NULL,
  `subcategory_name` varchar(25) NOT NULL,
  `category` int(11) NOT NULL,
  `is_deleted` enum('0','1') NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `subcategories`
--

INSERT INTO `subcategories` (`subcategory_id`, `subcategory_name`, `category`, `is_deleted`) VALUES
(1001, 'Men Jeans', 101, '0'),
(1002, 'Women Jeans', 102, '0'),
(1003, 'Children Jeans', 103, '0'),
(2001, 'Men Shirts', 101, '0'),
(2002, 'Women Shirts', 102, '0'),
(2003, 'Children Shirts', 103, '0'),
(3001, 'Men T-shirts', 101, '0'),
(3002, 'Women T-Shirts', 102, '0'),
(3003, 'Children T-shirts', 103, '0'),
(4001, 'Men Jacket', 101, '0'),
(4002, 'Women Jacket', 102, '0'),
(4003, 'Children Jacket', 103, '0');

-- --------------------------------------------------------

--
-- Table structure for table `userlogins`
--

CREATE TABLE `userlogins` (
  `userlogin_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `user_ip` varchar(25) NOT NULL,
  `login_time` datetime NOT NULL,
  `logout_time` datetime NOT NULL,
  `is_deleted` enum('0','1') NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `User_ID` int(11) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `User_FName` varchar(50) NOT NULL,
  `User_LName` varchar(50) NOT NULL,
  `Gender` enum('Male','Female') NOT NULL,
  `Password` varchar(50) NOT NULL,
  `role` int(11) NOT NULL,
  `is_deleted` enum('0','1') NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`User_ID`, `Email`, `User_FName`, `User_LName`, `Gender`, `Password`, `role`, `is_deleted`) VALUES
(6, 'User1@gmail.com', 'User', '1', 'Male', 'user1', 3, '0'),
(7, 'User2@gmail.com', 'User', '2', 'Male', 'user2', 3, '0'),
(8, 'Admin1@gmail.com', 'Admin', '1', 'Male', 'admin1', 1, '0'),
(9, 'User3@gmail.com', 'User', '3', 'Male', 'user3', 3, '0'),
(15, 'Admin2@gmail.com', 'Admin', '2', 'Female', 'admin2', 1, '0'),
(20, 'AB@gmail.com', 'Arol6ye', 'Beru', 'Male', 'ab', 3, '0'),
(21, 'test@gmail.com', 'test1', 'test2', 'Male', '12345', 3, '0');

-- --------------------------------------------------------

--
-- Table structure for table `wallet`
--

CREATE TABLE `wallet` (
  `wallet_id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `amount_available` double NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `is_deleted` enum('0','1') NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`customer_id`,`product_id`),
  ADD KEY `product_id__FK` (`product_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `order`
--
ALTER TABLE `order`
  ADD PRIMARY KEY (`order_id`),
  ADD KEY `customer_id_FK` (`customer_id`),
  ADD KEY `payment_type_FK` (`payment_type`);

--
-- Indexes for table `orderdetails`
--
ALTER TABLE `orderdetails`
  ADD PRIMARY KEY (`orderdetails_id`),
  ADD KEY `product_id_FK` (`product_id`),
  ADD KEY `order_id_FK` (`order_id`);

--
-- Indexes for table `paymenttypes`
--
ALTER TABLE `paymenttypes`
  ADD PRIMARY KEY (`paymenttype_id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`product_id`),
  ADD KEY `USER_FK` (`added_by`),
  ADD KEY `subcategory_FK` (`subcategory_id`);

--
-- Indexes for table `productimages`
--
ALTER TABLE `productimages`
  ADD PRIMARY KEY (`productimage_id`),
  ADD KEY `USE_FK` (`added_by`),
  ADD KEY `product_idFK` (`product_id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`role_id`);

--
-- Indexes for table `subcategories`
--
ALTER TABLE `subcategories`
  ADD PRIMARY KEY (`subcategory_id`),
  ADD KEY `category_FK` (`category`);

--
-- Indexes for table `userlogins`
--
ALTER TABLE `userlogins`
  ADD PRIMARY KEY (`userlogin_id`),
  ADD KEY `user_id_FK` (`user_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`User_ID`),
  ADD UNIQUE KEY `Email` (`Email`),
  ADD KEY `roles` (`role`);

--
-- Indexes for table `wallet`
--
ALTER TABLE `wallet`
  ADD PRIMARY KEY (`wallet_id`),
  ADD KEY `customer_idFK` (`customer_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=104;

--
-- AUTO_INCREMENT for table `order`
--
ALTER TABLE `order`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `orderdetails`
--
ALTER TABLE `orderdetails`
  MODIFY `orderdetails_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=155;

--
-- AUTO_INCREMENT for table `productimages`
--
ALTER TABLE `productimages`
  MODIFY `productimage_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8959;

--
-- AUTO_INCREMENT for table `subcategories`
--
ALTER TABLE `subcategories`
  MODIFY `subcategory_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30003;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `User_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `customer_id__FK` FOREIGN KEY (`customer_id`) REFERENCES `users` (`User_ID`),
  ADD CONSTRAINT `product_id__FK` FOREIGN KEY (`product_id`) REFERENCES `product` (`product_id`);

--
-- Constraints for table `order`
--
ALTER TABLE `order`
  ADD CONSTRAINT `customer_id_FK` FOREIGN KEY (`customer_id`) REFERENCES `users` (`User_ID`),
  ADD CONSTRAINT `payment_type_FK` FOREIGN KEY (`payment_type`) REFERENCES `paymenttypes` (`paymenttype_id`);

--
-- Constraints for table `orderdetails`
--
ALTER TABLE `orderdetails`
  ADD CONSTRAINT `order_id_FK` FOREIGN KEY (`order_id`) REFERENCES `order` (`order_id`),
  ADD CONSTRAINT `product_id_FK` FOREIGN KEY (`product_id`) REFERENCES `product` (`product_id`);

--
-- Constraints for table `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `USER_FK` FOREIGN KEY (`added_by`) REFERENCES `users` (`User_ID`),
  ADD CONSTRAINT `subcategory_FK` FOREIGN KEY (`subcategory_id`) REFERENCES `subcategories` (`subcategory_id`);

--
-- Constraints for table `productimages`
--
ALTER TABLE `productimages`
  ADD CONSTRAINT `USE_FK` FOREIGN KEY (`added_by`) REFERENCES `users` (`User_ID`),
  ADD CONSTRAINT `product_idFK` FOREIGN KEY (`product_id`) REFERENCES `product` (`product_id`);

--
-- Constraints for table `subcategories`
--
ALTER TABLE `subcategories`
  ADD CONSTRAINT `category_FK` FOREIGN KEY (`category`) REFERENCES `categories` (`category_id`);

--
-- Constraints for table `userlogins`
--
ALTER TABLE `userlogins`
  ADD CONSTRAINT `user_id_FK` FOREIGN KEY (`user_id`) REFERENCES `users` (`User_ID`);

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `roles` FOREIGN KEY (`role`) REFERENCES `roles` (`role_id`);

--
-- Constraints for table `wallet`
--
ALTER TABLE `wallet`
  ADD CONSTRAINT `customer_idFK` FOREIGN KEY (`customer_id`) REFERENCES `users` (`User_ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
