-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Oct 03, 2021 at 08:25 AM
-- Server version: 5.7.24
-- PHP Version: 7.4.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `taladsod`
--

-- --------------------------------------------------------

--
-- Table structure for table `addresses`
--

CREATE TABLE `addresses` (
  `address_id` int(10) NOT NULL,
  `customer_id` int(10) NOT NULL,
  `address` varchar(255) DEFAULT NULL,
  `lat` varchar(255) DEFAULT NULL,
  `lng` varchar(255) DEFAULT NULL,
  `addr_status` varchar(255) DEFAULT NULL,
  `time_reg` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `addresses`
--

INSERT INTO `addresses` (`address_id`, `customer_id`, `address`, `lat`, `lng`, `addr_status`, `time_reg`) VALUES
(1, 1, 'หอพัก The Company ซอย 12', '16.232702721579496', '103.25578072631637', '0', '2021-09-08 10:35:36'),
(2, 1, 'สารรรรรร', '16.21549854', '103.15494131236', '0', '2021-09-08 11:33:19'),
(3, 5, 'Sdjlaskdj', '78.4684654645', '98.34654213213', '1', '2021-09-08 17:06:34'),
(4, 5, 'Sdjlaskdj', '78.4684654645', '98.34654213213', '0', '2021-09-08 17:15:42'),
(5, 5, 'Sdjlaskdj', '78.4684654645', '98.34654213213', '0', '2021-09-08 17:15:54'),
(6, 5, 'Sdjlaskdj', '78.4684654645', '98.34654213213', '0', '2021-09-08 17:18:52'),
(10, 5, 'Sdjlaskdj', '78.4684654645', '98.34654213213', '0', '2021-09-08 18:48:12'),
(11, 2, 'บ้านสวนสารคาม 2', '16', '103', '1', '2021-09-08 18:57:53'),
(12, 2, 'บ้านสวนสารคาม 2', '16', '103', '0', '2021-09-08 18:58:21'),
(13, 2, 'บ้านสวนสารคาม 2', '16', '103', '0', '2021-09-08 18:58:59'),
(14, 2, 'บ้านสวนสารคาม 2', '16', '103', '0', '2021-09-08 18:59:13'),
(15, 1, 'บ้านข่มเรียง', '16.241915553043878', '103.26042328029871', '1', '2021-09-15 18:33:00'),
(16, 1, 'บ้านข่มเรียงกรุ้วววววว', '16.241915553043878', '103.26042328029871', '0', '2021-09-15 18:34:20');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `category_id` int(10) NOT NULL,
  `category_name` varchar(255) NOT NULL,
  `time_reg` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`category_id`, `category_name`, `time_reg`) VALUES
(1, 'ผลไม้', '2021-09-17 15:31:36'),
(2, 'ผัก', '2021-09-17 15:32:09'),
(3, 'เนื้อสัตว์', '2021-09-17 15:32:35');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `customer_id` int(10) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `customer_name` varchar(255) NOT NULL,
  `customer_phone` varchar(255) DEFAULT NULL,
  `sex` varchar(255) DEFAULT NULL,
  `profile_image` text,
  `time_reg` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`customer_id`, `username`, `password`, `customer_name`, `customer_phone`, `sex`, `profile_image`, `time_reg`) VALUES
(1, 'pppoond', 'ed2b1f468c5f915f3f1cf75d7068baae', 'Park Seo Joon', '0615960771', '1', 'customer800176.jpg', '2021-08-15 17:36:51'),
(2, 'siwat_lao', '3e196dc7c8fb60c20ec9f4249c750be8', 'Siwat Laothong', '0615960771', '1', NULL, '2021-08-15 17:38:27'),
(3, 'hello1', '9a1996efc97181f0aee18321aa3b3b12', 'Hello World', '0615960741', '1', NULL, '2021-08-26 05:10:14'),
(4, 'test05', '16d7a4fca7442dda3ad93c9a726597e4', 'Sompond', '0615963341', '1', NULL, '2021-08-26 05:45:13'),
(5, 'sasina', 'ed2b1f468c5f915f3f1cf75d7068baae', 'Sasina', '0987654321', '2', NULL, '2021-08-26 06:37:44'),
(6, 'kumnit', 'b7b7894e0a27e11ba1adeb0b77dffc08', 'Kumnit', '123456789', '2', NULL, '2021-08-27 17:23:37'),
(7, 'test001', 'fa820cc1ad39a4e99283e9fa555035ec', 'Test001', '12345678', '3', NULL, '2021-08-27 17:28:21'),
(8, 'jjgreen', 'ed2b1f468c5f915f3f1cf75d7068baae', 'Lalisa', '12354687', '2', 'customer351856.jpg', '2021-09-08 17:52:05'),
(9, 'jennie', 'ed2b1f468c5f915f3f1cf75d7068baae', 'Jennie Rubyjen', '0615960771', NULL, NULL, '2021-09-08 18:41:09'),
(10, 'btsbts', 'btsbts1234', 'Bts', '01354642', '1', NULL, '2021-10-01 17:39:19'),
(11, 'Janmin', 'Janmin1234', 'Janmin', 'Janmin', '456897', NULL, '2021-10-01 17:41:58'),
(12, 'Momin', 'Momin1324', 'Momin', 'Momin', 'Momin', NULL, '2021-10-01 17:44:10');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `order_id` int(10) NOT NULL,
  `store_id` int(10) NOT NULL,
  `rider_id` int(10) NOT NULL,
  `customer_id` int(10) NOT NULL,
  `order_date` date DEFAULT NULL,
  `total` int(10) NOT NULL,
  `status` varchar(255) NOT NULL,
  `time_reg` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`order_id`, `store_id`, `rider_id`, `customer_id`, `order_date`, `total`, `status`, `time_reg`) VALUES
(1, 1, 1, 1, '2021-10-02', 0, '1', '2021-10-01 18:05:36');

-- --------------------------------------------------------

--
-- Table structure for table `order_details`
--

CREATE TABLE `order_details` (
  `order_detail_id` int(10) NOT NULL,
  `order_id` int(10) NOT NULL,
  `product_id` int(10) NOT NULL,
  `quantity` int(10) NOT NULL,
  `time_reg` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `payment_rider`
--

CREATE TABLE `payment_rider` (
  `pay_rider_id` int(11) NOT NULL,
  `rider_id` int(10) NOT NULL,
  `total` varchar(255) DEFAULT NULL,
  `slip` varchar(255) DEFAULT NULL,
  `pay_status` varchar(255) DEFAULT NULL,
  `time_reg` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `payment_rider`
--

INSERT INTO `payment_rider` (`pay_rider_id`, `rider_id`, `total`, `slip`, `pay_status`, `time_reg`) VALUES
(1, 1, '500', NULL, '0', '2021-10-02 13:49:11');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `product_id` int(10) NOT NULL,
  `store_id` int(10) NOT NULL,
  `category_id` int(10) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `product_detail` text,
  `status` int(10) DEFAULT '0',
  `price` varchar(255) NOT NULL DEFAULT '0',
  `unit` varchar(255) DEFAULT NULL,
  `time_reg` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `store_id`, `category_id`, `product_name`, `product_detail`, `status`, `price`, `unit`, `time_reg`) VALUES
(1, 1, 1, 'มะม่วงมัน', 'มะม่วงมันจากสวน ปลูกเองจ้า\r\nกรอบ เนื้อแน่น', 0, '25', 'กิโล', '2021-09-17 15:34:35'),
(2, 1, 1, 'ส้มเขียวหวาน', 'ส้มเขียวหวาน สดใหม่จากสวนooooooooooooooooooooooooooooooooo', 0, '30', 'กิโล', '2021-09-18 16:01:09'),
(4, 1, 1, 'maaaaa', 'lzjldkjlsdjsldkjflsdkjf\n', 1, '5', 'กิโล', '2021-09-25 15:45:31');

-- --------------------------------------------------------

--
-- Table structure for table `product_images`
--

CREATE TABLE `product_images` (
  `pro_img_id` int(10) NOT NULL,
  `product_id` int(10) NOT NULL,
  `pro_img_addr` text,
  `time_reg` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product_images`
--

INSERT INTO `product_images` (`pro_img_id`, `product_id`, `pro_img_addr`, `time_reg`) VALUES
(5, 1, 'product_store_1_001.jpg', '2021-09-21 19:49:52'),
(9, 2, 'product_store_1_003.jpg', '2021-09-21 20:06:43'),
(11, 2, 'product_image500222_09222021.jpg', '2021-09-22 14:42:45'),
(12, 2, 'product_image852091_09222021.jpg', '2021-09-22 15:10:11'),
(13, 2, 'product_image647639_09222021.jpg', '2021-09-22 15:10:56'),
(21, 1, 'product_image841451_09232021.jpg', '2021-09-23 09:50:17'),
(22, 1, 'product_image960474_09232021.jpg', '2021-09-23 09:50:17'),
(23, 4, 'product_image786133_09252021.jpg', '2021-09-25 15:45:31'),
(24, 4, 'product_image717261_09252021.jpg', '2021-09-25 15:45:31');

-- --------------------------------------------------------

--
-- Table structure for table `rider`
--

CREATE TABLE `rider` (
  `rider_id` int(10) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `rider_phone` varchar(255) DEFAULT NULL,
  `rider_name` varchar(255) NOT NULL,
  `sex` varchar(255) DEFAULT NULL,
  `rider_status` varchar(255) NOT NULL,
  `credit` varchar(255) DEFAULT NULL,
  `wallet` varchar(255) DEFAULT NULL,
  `profile_image` text,
  `time_reg` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `rider`
--

INSERT INTO `rider` (`rider_id`, `username`, `password`, `rider_phone`, `rider_name`, `sex`, `rider_status`, `credit`, `wallet`, `profile_image`, `time_reg`) VALUES
(1, 'rider', 'rider1234', '0987654321', 'สมปอนด์', 'ชาย', 'active', '2000', '2000', NULL, '2021-08-24 17:19:14');

-- --------------------------------------------------------

--
-- Table structure for table `store`
--

CREATE TABLE `store` (
  `store_id` int(10) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `store_phone` varchar(255) DEFAULT NULL,
  `store_name` varchar(255) NOT NULL,
  `profile_image` text,
  `wallet` varchar(255) DEFAULT NULL,
  `lat` varchar(255) DEFAULT NULL,
  `lng` varchar(255) DEFAULT NULL,
  `status` int(10) NOT NULL DEFAULT '0',
  `time_reg` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `store`
--

INSERT INTO `store` (`store_id`, `username`, `password`, `store_phone`, `store_name`, `profile_image`, `wallet`, `lat`, `lng`, `status`, `time_reg`) VALUES
(1, 'store', '65485271f79a6a823f61bcbfde5bda22', '0612345678', 'สมปอนด์ผลไม้', NULL, '500', '16.19282999495594', '103.27999553980597', 0, '2021-08-25 08:46:35');

-- --------------------------------------------------------

--
-- Table structure for table `withdraw_rider`
--

CREATE TABLE `withdraw_rider` (
  `wd_rider_id` int(11) NOT NULL,
  `rider_id` int(10) NOT NULL,
  `total` varchar(255) DEFAULT NULL,
  `pay_status` varchar(255) DEFAULT NULL,
  `time_reg` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `withdraw_rider`
--

INSERT INTO `withdraw_rider` (`wd_rider_id`, `rider_id`, `total`, `pay_status`, `time_reg`) VALUES
(1, 1, '200', '0', '2021-10-02 13:54:01');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `addresses`
--
ALTER TABLE `addresses`
  ADD PRIMARY KEY (`address_id`),
  ADD KEY `customer_id_addresses_fk` (`customer_id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`customer_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`),
  ADD KEY `store_id_order_fk` (`store_id`),
  ADD KEY `rider_id_order_fk` (`rider_id`),
  ADD KEY `customer_id_order_fk` (`customer_id`);

--
-- Indexes for table `order_details`
--
ALTER TABLE `order_details`
  ADD PRIMARY KEY (`order_detail_id`),
  ADD KEY `order_id_order_detail_fk` (`order_id`),
  ADD KEY `product_id_order_detail_fk` (`product_id`);

--
-- Indexes for table `payment_rider`
--
ALTER TABLE `payment_rider`
  ADD PRIMARY KEY (`pay_rider_id`),
  ADD KEY `rider_id_payment_rider_fk` (`rider_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`),
  ADD KEY `store_id_product_fk` (`store_id`),
  ADD KEY `category_id_product_fk` (`category_id`);

--
-- Indexes for table `product_images`
--
ALTER TABLE `product_images`
  ADD PRIMARY KEY (`pro_img_id`),
  ADD KEY `product_id_product_image_fk` (`product_id`);

--
-- Indexes for table `rider`
--
ALTER TABLE `rider`
  ADD PRIMARY KEY (`rider_id`);

--
-- Indexes for table `store`
--
ALTER TABLE `store`
  ADD PRIMARY KEY (`store_id`);

--
-- Indexes for table `withdraw_rider`
--
ALTER TABLE `withdraw_rider`
  ADD PRIMARY KEY (`wd_rider_id`),
  ADD KEY `rider_id_withdraw_rider_fk` (`rider_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `addresses`
--
ALTER TABLE `addresses`
  MODIFY `address_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `category_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `customer_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `order_details`
--
ALTER TABLE `order_details`
  MODIFY `order_detail_id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `payment_rider`
--
ALTER TABLE `payment_rider`
  MODIFY `pay_rider_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `product_images`
--
ALTER TABLE `product_images`
  MODIFY `pro_img_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `rider`
--
ALTER TABLE `rider`
  MODIFY `rider_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `store`
--
ALTER TABLE `store`
  MODIFY `store_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `withdraw_rider`
--
ALTER TABLE `withdraw_rider`
  MODIFY `wd_rider_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `addresses`
--
ALTER TABLE `addresses`
  ADD CONSTRAINT `customer_id_addresses_fk` FOREIGN KEY (`customer_id`) REFERENCES `customer` (`customer_id`);

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `customer_id_order_fk` FOREIGN KEY (`customer_id`) REFERENCES `customer` (`customer_id`),
  ADD CONSTRAINT `rider_id_order_fk` FOREIGN KEY (`rider_id`) REFERENCES `rider` (`rider_id`),
  ADD CONSTRAINT `store_id_order_fk` FOREIGN KEY (`store_id`) REFERENCES `store` (`store_id`);

--
-- Constraints for table `order_details`
--
ALTER TABLE `order_details`
  ADD CONSTRAINT `order_id_order_detail_fk` FOREIGN KEY (`order_id`) REFERENCES `orders` (`order_id`),
  ADD CONSTRAINT `product_id_order_detail_fk` FOREIGN KEY (`product_id`) REFERENCES `products` (`product_id`);

--
-- Constraints for table `payment_rider`
--
ALTER TABLE `payment_rider`
  ADD CONSTRAINT `rider_id_payment_rider_fk` FOREIGN KEY (`rider_id`) REFERENCES `rider` (`rider_id`);

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `category_id_product_fk` FOREIGN KEY (`category_id`) REFERENCES `category` (`category_id`),
  ADD CONSTRAINT `store_id_product_fk` FOREIGN KEY (`store_id`) REFERENCES `store` (`store_id`);

--
-- Constraints for table `product_images`
--
ALTER TABLE `product_images`
  ADD CONSTRAINT `product_id_product_image_fk` FOREIGN KEY (`product_id`) REFERENCES `products` (`product_id`);

--
-- Constraints for table `withdraw_rider`
--
ALTER TABLE `withdraw_rider`
  ADD CONSTRAINT `rider_id_withdraw_rider_fk` FOREIGN KEY (`rider_id`) REFERENCES `rider` (`rider_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
