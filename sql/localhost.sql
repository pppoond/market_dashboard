-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Oct 03, 2021 at 08:18 AM
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
-- Database: `api_hellogram`
--
CREATE DATABASE IF NOT EXISTS `api_hellogram` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `api_hellogram`;

-- --------------------------------------------------------

--
-- Table structure for table `images`
--

CREATE TABLE `images` (
  `img_id` int(10) NOT NULL,
  `user_id` int(10) NOT NULL,
  `post_id` int(10) NOT NULL,
  `img_descript` varchar(255) DEFAULT NULL,
  `img_address` varchar(255) DEFAULT NULL,
  `time_reg` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `images`
--

INSERT INTO `images` (`img_id`, `user_id`, `post_id`, `img_descript`, `img_address`, `time_reg`) VALUES
(1, 2, 4, NULL, 'uploads/post1.png', '2021-02-02 03:35:42'),
(2, 2, 5, NULL, 'uploads/post2.jpg', '2021-02-02 03:36:18'),
(3, 2, 6, NULL, 'uploads/post3.jpg', '2021-02-02 03:36:40'),
(4, 2, 4, NULL, 'uploads/post1.png', '2021-02-02 12:24:59'),
(5, 2, 5, NULL, 'uploads/post1.png', '2021-02-06 04:18:06'),
(6, 2, 5, NULL, 'uploads/post3.jpg', '2021-02-06 04:18:27'),
(7, 1, 1, NULL, 'uploads/khaoyai1.jpg', '2021-02-07 08:54:56');

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `post_id` int(10) NOT NULL,
  `user_id` int(10) NOT NULL,
  `post_title` varchar(255) DEFAULT NULL,
  `post_descript` varchar(255) DEFAULT NULL,
  `time_reg` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`post_id`, `user_id`, `post_title`, `post_descript`, `time_reg`) VALUES
(1, 1, NULL, 'Hello today in stay in Khaoyai.', '2021-02-01 09:59:20'),
(2, 1, NULL, 'สวัสดีวันนี้ฉันอยู่ที่เกาะล้านนนนนนนน', '2021-02-01 10:01:46'),
(3, 1, NULL, 'วันนี้รู้สึกไม่ค่อยสบายเลย สงสัยทำงานหนักไปหน่อย', '2021-02-01 10:20:50'),
(4, 2, NULL, 'Hi today i stay in Thailand.', '2021-02-02 03:32:47'),
(5, 2, NULL, 'Wowwwwwww it so beautyful.', '2021-02-02 03:33:41'),
(6, 2, NULL, 'Thakyou my fans <3', '2021-02-02 03:34:12'),
(7, 4, '', 'sdfsdf', '2021-02-17 17:51:46'),
(8, 1, '', 'สวัสดีชาวโซเชียลลบลล', '2021-02-18 12:59:36');

-- --------------------------------------------------------

--
-- Table structure for table `post_comments`
--

CREATE TABLE `post_comments` (
  `pcm_id` int(10) NOT NULL,
  `user_id` int(10) NOT NULL,
  `post_id` int(10) NOT NULL,
  `pcm_comment` varchar(255) DEFAULT NULL,
  `time_reg` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `post_comments`
--

INSERT INTO `post_comments` (`pcm_id`, `user_id`, `post_id`, `pcm_comment`, `time_reg`) VALUES
(1, 1, 2, '<3 <3 <3', '2021-02-13 07:58:52'),
(2, 4, 2, 'ไปเที่ยวเก่งนะ อีศิวัช', '2021-02-13 07:59:17'),
(5, 1, 2, 'อารายยยยยยยยยยยย', '2021-02-17 17:48:29'),
(6, 1, 7, 'หลอนนนนนนแหละ ดูแล้ว', '2021-02-18 06:31:02'),
(7, 4, 7, 'ไม่ได้บ้อออออออ', '2021-02-18 06:32:33'),
(8, 1, 4, 'Test comment', '2021-02-18 16:55:34'),
(9, 1, 1, 'hoooooooooooooooooooooooooooooooooooooooooooooooooooooooooooo', '2021-03-03 06:37:59');

-- --------------------------------------------------------

--
-- Table structure for table `post_likes`
--

CREATE TABLE `post_likes` (
  `like_id` int(10) NOT NULL,
  `post_id` int(10) NOT NULL,
  `user_id` int(10) NOT NULL,
  `like_status` varchar(255) DEFAULT NULL,
  `time_reg` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `post_likes`
--

INSERT INTO `post_likes` (`like_id`, `post_id`, `user_id`, `like_status`, `time_reg`) VALUES
(1, 5, 1, 'liked', '2021-02-07 06:13:29'),
(7, 4, 2, 'liked', '2021-02-07 08:21:47'),
(16, 6, 2, 'liked', '2021-02-07 09:59:19'),
(17, 5, 2, 'liked', '2021-02-07 10:00:42'),
(25, 1, 2, 'liked', '2021-02-07 10:18:47'),
(27, 4, 1, 'liked', '2021-02-09 03:37:43'),
(28, 2, 1, 'liked', '2021-02-09 03:37:47'),
(29, 6, 3, 'liked', '2021-02-09 03:43:11'),
(30, 5, 3, 'liked', '2021-02-09 03:43:15'),
(31, 4, 3, 'liked', '2021-02-09 03:43:20'),
(32, 2, 3, 'liked', '2021-02-09 03:43:28'),
(33, 3, 3, 'liked', '2021-02-09 04:13:14'),
(34, 5, 4, 'liked', '2021-02-09 06:14:17'),
(35, 6, 4, 'liked', '2021-02-09 06:14:20'),
(36, 4, 4, 'liked', '2021-02-09 06:14:25'),
(37, 3, 4, 'liked', '2021-02-09 06:14:27'),
(38, 2, 4, 'liked', '2021-02-09 06:14:29'),
(39, 1, 4, 'liked', '2021-02-09 06:14:32'),
(45, 43, 1, 'liked', '2021-02-12 14:34:56'),
(46, 42, 1, 'liked', '2021-02-12 14:34:58'),
(47, 41, 1, 'liked', '2021-02-12 14:34:59'),
(48, 6, 1, 'liked', '2021-02-12 14:56:49'),
(49, 7, 4, 'liked', '2021-02-17 17:53:48'),
(50, 7, 1, 'liked', '2021-02-18 06:30:29'),
(51, 7, 5, 'liked', '2021-02-18 12:57:37'),
(52, 6, 5, 'liked', '2021-02-18 12:57:42'),
(53, 5, 5, 'liked', '2021-02-18 12:57:45'),
(54, 4, 5, 'liked', '2021-02-18 12:57:47'),
(55, 3, 5, 'liked', '2021-02-18 12:57:49'),
(56, 2, 5, 'liked', '2021-02-18 12:57:51'),
(57, 1, 5, 'liked', '2021-02-18 12:57:54'),
(58, 8, 1, 'liked', '2021-02-18 13:04:26'),
(60, 3, 1, 'liked', '2021-02-18 13:21:09');

-- --------------------------------------------------------

--
-- Table structure for table `profile_images`
--

CREATE TABLE `profile_images` (
  `pro_id` int(10) NOT NULL,
  `user_id` int(10) NOT NULL,
  `pro_img_addr` varchar(255) DEFAULT NULL,
  `pro_img_status` varchar(255) NOT NULL,
  `time_reg` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `profile_images`
--

INSERT INTO `profile_images` (`pro_id`, `user_id`, `pro_img_addr`, `pro_img_status`, `time_reg`) VALUES
(1, 2, 'uploads/profile/jennie.jpg', 'current', '2021-02-06 10:09:03'),
(2, 1, 'uploads/profile/pondwick.jpg', 'current', '2021-02-06 10:34:00'),
(3, 4, 'uploads/profile/kumnit.jpg', 'current', '2021-02-17 16:44:35');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(10) NOT NULL,
  `user_name` varchar(255) NOT NULL,
  `user_phone` varchar(255) DEFAULT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `time_reg` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `user_name`, `user_phone`, `username`, `password`, `time_reg`) VALUES
(1, 'Siwat Laothong', '0615960771', 'pondwick', 'pond1234', '2021-02-01 09:58:19'),
(2, 'Jennie Kim', NULL, 'jennie_rubyjen', 'jennie1234', '2021-02-02 03:31:57'),
(3, 'Kumnit', NULL, 'kumnit', '12341234', '2021-02-07 06:26:45'),
(4, 'Nittaya Phomhom', NULL, 'nittaya', '12341234', '2021-02-09 06:13:38'),
(5, 'Pond Nittaya', NULL, 'pondpondzzz', '12341234', '2021-02-18 12:55:57');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`img_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `post_id` (`post_id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`post_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `post_comments`
--
ALTER TABLE `post_comments`
  ADD PRIMARY KEY (`pcm_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `post_id` (`post_id`);

--
-- Indexes for table `post_likes`
--
ALTER TABLE `post_likes`
  ADD PRIMARY KEY (`like_id`),
  ADD KEY `post_id` (`post_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `profile_images`
--
ALTER TABLE `profile_images`
  ADD PRIMARY KEY (`pro_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `images`
--
ALTER TABLE `images`
  MODIFY `img_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `post_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `post_comments`
--
ALTER TABLE `post_comments`
  MODIFY `pcm_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `post_likes`
--
ALTER TABLE `post_likes`
  MODIFY `like_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- AUTO_INCREMENT for table `profile_images`
--
ALTER TABLE `profile_images`
  MODIFY `pro_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `images`
--
ALTER TABLE `images`
  ADD CONSTRAINT `images_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`),
  ADD CONSTRAINT `images_ibfk_2` FOREIGN KEY (`post_id`) REFERENCES `posts` (`post_id`);

--
-- Constraints for table `posts`
--
ALTER TABLE `posts`
  ADD CONSTRAINT `posts_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`);

--
-- Constraints for table `post_comments`
--
ALTER TABLE `post_comments`
  ADD CONSTRAINT `post_comments_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`),
  ADD CONSTRAINT `post_comments_ibfk_2` FOREIGN KEY (`post_id`) REFERENCES `posts` (`post_id`);

--
-- Constraints for table `post_likes`
--
ALTER TABLE `post_likes`
  ADD CONSTRAINT `post_likes_ibfk_1` FOREIGN KEY (`post_id`) REFERENCES `posts` (`post_id`),
  ADD CONSTRAINT `post_likes_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`);

--
-- Constraints for table `profile_images`
--
ALTER TABLE `profile_images`
  ADD CONSTRAINT `profile_images_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`);
--
-- Database: `api_test`
--
CREATE DATABASE IF NOT EXISTS `api_test` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `api_test`;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `Name` varchar(150) NOT NULL,
  `Email` varchar(150) NOT NULL,
  `Mobile` varchar(100) NOT NULL,
  `Password` varchar(150) NOT NULL,
  `fcm_token` varchar(200) NOT NULL,
  `status` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `Name`, `Email`, `Mobile`, `Password`, `fcm_token`, `status`) VALUES
(1, 'Siwat Laothong', 'siwat@gmail.com', '0615960771', '8a5a3ea975b3c49120976f53f2a59ba0', 'test_fcm_token', 1),
(2, 'Nittaya Phomhom', 'nittaya@gmail.com', '061000000', '25d55ad283aa400af464c76d713c07ad', 'test_fcm_token', 1);
--
-- Database: `api_upload`
--
CREATE DATABASE IF NOT EXISTS `api_upload` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `api_upload`;

-- --------------------------------------------------------

--
-- Table structure for table `person`
--

CREATE TABLE `person` (
  `id` int(10) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `person`
--

INSERT INTO `person` (`id`, `name`, `image`) VALUES
(1, '', 'image_picker7775312539711921584.jpg'),
(2, '', 'image_picker7775312539711921584.jpg'),
(3, '', 'image_picker4000339517816969909.jpg'),
(4, '', 'image_picker348093040498615638.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `person`
--
ALTER TABLE `person`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `person`
--
ALTER TABLE `person`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- Database: `emoji_test`
--
CREATE DATABASE IF NOT EXISTS `emoji_test` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `emoji_test`;

-- --------------------------------------------------------

--
-- Table structure for table `members`
--

CREATE TABLE `members` (
  `mem_id` int(10) NOT NULL,
  `mem_name` varchar(255) NOT NULL,
  `user_phone` varchar(255) DEFAULT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `time_reg` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `members`
--

INSERT INTO `members` (`mem_id`, `mem_name`, `user_phone`, `username`, `password`, `time_reg`) VALUES
(1, 'ศิวัช เหลาทอง', '0615960771', 'pppoond', 'pond0615960771', '2021-03-10 12:18:31');

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `post_id` int(10) NOT NULL,
  `mem_id` int(10) NOT NULL,
  `post_title` varchar(255) DEFAULT NULL,
  `post_descript` varchar(255) DEFAULT NULL,
  `time_reg` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `product_id` int(10) NOT NULL,
  `mem_id` int(10) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `product_detail` text,
  `time_reg` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `mem_id`, `product_name`, `product_detail`, `time_reg`) VALUES
(1, 1, 'ผักชี', 'ผักชี มีชื่อท้องถิ่นอื่น ๆ ว่า ผักชีไทย (ความหมายที่เข้าใจโดยทั่วไป), ผักหอม (นครพนม), ยำแย้ (กระบี่), ผักหอมป้อม ผักหอมผอม (ภาคเหนือ), ผักหอมน้อย (ภาคตะวันออกเฉียงเหนือ) เป็นต้น\r\n\r\nผักชี มีถิ่นกำเนิดในแถบเมดิเตอร์เรเนียน สำหรับแหล่งเพาะปลูกสำคัญ ๆ ในประเทศไทย ได้แก่ จังหวัดราชบุรี จังหวัดนครปฐม และกรุงเทพมหานคร ถ้าเป็นต่างประเทศจะเพาะปลูกในแถบทวีปยุโรป ทวีปอเมริกาใต้ ในประเทศอินเดีย เป็นพืชผักที่สามารถปลูกได้ตลอดปี แต่ช่วงที่เหมาะที่สุดคือฤดูหนาว เพราะจะทำให้ผักชีโตเร็วมาก\r\n\r\nผักชีไทย เป็นผักที่มีกลิ่นหอมเฉพาะตัว จึงเป็นที่นิยมอย่างมากในการนำมาใช้ประกอบอาหารต่าง ๆ เพื่อทำให้อาหารมีกลิ่นหอมน่ารับประทานมากยิ่งขึ้น แถมยังมีคุณประโยชน์ต่อร่างกายหลากหลายประการอีกด้วย และด้วยสีเขียวสดของผักชีและรูปร่างของใบที่มีความเป็นเอกลักษณ์ ผักชีไทยจึงเป็นที่นิยมในการนำมาทำเป็นผักแต่งจานอาหารให้น่ารับประทานอีกด้วย ซึ่งเป็นที่มาของคำว่า \"ผักชีโรยหน้า\" ซึ่งมีความหมายว่า ทำอะไรให้ดูดีแค่ภายนอกหรือการทำความดีอย่างผิวเผิน เรื่องอื่นค่อยว่ากันทีหลัง !\r\n\r\nการรับประทานผักชีควรรับประทานในปริมาณที่เหมาะสม หากรับประทานมากจนเกินไปอาจจะทำให้มีกลิ่นตัวแรง มีอาการตาลาย ลืมง่ายได้\r\n\r\nสรรพคุณของผักชี\r\nผักชีช่วยบำรุงและรักษาสายตา\r\nช่วยให้เจริญอาหารมากยิ่งขึ้น ด้วยการใช้ผลแห้งนำมาบดเป็นผงรับประทานหรือนำมาต้มกับน้ำดื่ม (ผล, ใบ)\r\nช่วยบำรุงธาตุในร่างกาย (ใบ)\r\nช่วยแก้อาการกระหายน้ำ (ใบ)\r\nช่วยลดระดับน้ำตาลในเลือด (ใบ)\r\nช่วยกระตุ้นการทำงานของเลือดพลาสมาและกล้ามเนื้อ (ใบ)\r\nช่วยลดความเสี่ยงของการเกิดโรคมะเร็ง (ใบ)\r\nช่วยขับเหงื่อ ด้วยการใช้ต้นสดประมาณ 60 กรัมนำไปต้มกับน้ำดื่ม หรือจะคั้นเอาเฉพาะน้ำมาดื่มแก้อาการก็ได้ (ทั้งต้น)\r\nใช้เป็นน้ำกระสายยา ช่วยกระทุ้งพิษไข้หัว ไข้อีดำอีแดง (ราก)\r\nช่วยแก้อาการหวัด (ใบ)\r\nช่วยแก้ไอ (ใบ)\r\nช่วยละลายเสมหะ ด้วยการใช้ต้นสดประมาณ 60 กรัมนำไปต้มกับน้ำดื่ม หรือจะคั้นเอาเฉพาะน้ำมาดื่มแก้อาการก็ได้ (ทั้งต้น)\r\nช่วยแก้อาการสะอึก (ใบ)\r\nช่วยแก้อาการคลื่นไส้อาเจียน (ใบ)\r\nช่วยแก้อาการวิงเวียนศีรษะ (ใบ)\r\n\r\n \r\nช่วยแก้อาการอาหารเป็นพิษ (ใบ)\r\nใช้แก้อาการปวดฟัน เจ็บปาก ด้วยการใช้ผลนำมาต้มน้ำ แล้วนำมาอมบ้วนปากบ่อย ๆ (ผล)\r\nช่วยบำรุงกระเพาะอาหาร ด้วยการใช้ผลแห้งนำมาบดเป็นผงรับประทานหรือนำมาต้มกับน้ำดื่ม (ผล)\r\nผลแก่ใช้เป็นเครื่องเทศ มีกลิ่นหอม เมื่อใช้ผสมกับตัวยาอื่น จะช่วยกระตุ้นต่อมในกระเพาะอาหารและลำไส้ เพิ่มน้ำดีให้มากขึ้น (ผลแก่)\r\nช่วยรักษาอาการปวดท้อง (ผล)\r\nช่วยแก้อาการบิด ถ่ายเป็นเลือด ด้วยการใช้ผลประมาณ 1 ถ้วยชา นำมาตำผสมกับน้ำตาลทรายแล้วนำมาผสมน้ำดื่ม (ผล)\r\nช่วยแก้อาการท้องอืด ท้องเฟ้อ ด้วยการใช้ผลประมาณ 2 ช้อนชานำมาต้มกับน้ำดื่ม (ผล)\r\nช่วยย่อยอาหาร (ผล, ใบ)\r\nช่วยขับลมในกระเพาะ (ใบ)\r\nช่วยรักษาโรคริดสีดวงทวาร มีเลือดออก ด้วยการใช้ผลสดนำมาบดให้แตกผสมกับเหล้า ดื่มวันละ 5 ครั้ง หรือจะใช้ต้นสดประมาณ 120 กรัม นำมาใส่นม 2 แก้วผสมน้ำตาลดื่ม (ผล, ต้นสด)\r\nช่วยแก้พิษตานซาง (ใบ)\r\nช่วยแก้ตับอักเสบ (ใบ)\r\nช่วยขับลมพิษ (ใบ)\r\nช่วยแก้โรคหัด (ใบ)\r\nใช้รักษาเหือด หิด อีสุกอีใส (ราก)\r\nช่วยต่อต้านเชื้อรา เชื้อแบคทีเรีย และไข่ของแมลง (ใบ)\r\nช่วยแก้เด็กเป็นผื่นแดง ไฟลามทุ่ง ด้วยการใช้ต้นสด นำมาหั่นเป็นฝอย ๆ ใส่ลงไปในเหล้าแล้วต้มให้เดือด นำมาใช้ทา (ต้นสด)\r\nช่วยให้ผื่นหัดออกเร็วขึ้น โดยใช้ต้นสดนำมาหั่นเป็นฝอย ๆ ใส่ลงไปในเหล้า ต้มให้เดือด นำมาใช้ทา (ต้นสด)\r\nช่วยลดอาการปวดบวมตามข้อ (ใบ)\r\nประโยชน์ของผักชี\r\nใบนำมารับประทานเป็นผักแนม รับประทานกับอาหารอื่น หรือนำมาใช้ปรับแต่งหน้าอาหาร (ใบ)\r\nช่วยถนอมอาหาร (ใบ)\r\nช่วยดับกลิ่นเนื้อและกลิ่นคาวต่าง ๆ (ผล)\r\nคุณค่าทางโภชนาการของผักชีสดต่อ 100 กรัม\r\nพลังงาน 23 กิโลแคลอรี\r\nประโยชน์ของผักชี\r\nรากผักชี\r\nคาร์โบไฮเดรต 3.67 กรัม\r\nน้ำตาล 0.87 กรัม\r\nเส้นใย 2.8 กรัม\r\nไขมัน 0.52 กรัม\r\nโปรตีน 2.13 กรัม\r\nน้ำ 92.21 กรัม\r\nวิตามินเอ 337 ไมโครกรัม (42%)\r\nเบตาแคโรทีน 3,930 ไมโครกรัม (36%)\r\nลูทีนและซีแซนทีน 865 ไมโครกรัม\r\nวิตามินบี 1 0.067 มิลลิกรัม 6%\r\nวิตามินบี 2 0.162 มิลลิกรัม 14%\r\nวิตามินบี 3 1.114 มิลลิกรัม 7%\r\nวิตามินบี 5 0.57 มิลลิกรัม 11%\r\nสรรพคุณของผักชี\r\nเมล็ด หรือ ผลของผักชี\r\nวิตามินบี 6 0.149 มิลลิกรัม 11%\r\nวิตามินบี 9 62 ไมโครกรัม 16%\r\nวิตามินบี 12 0 ไมโครกรัม 0%\r\nวิตามินซี 27 มิลลิกรัม 33%\r\nวิตามินอี 2.5 มิลลิกรัม 17%\r\nวิตามินเค 310 ไมโครกรัม 295%\r\nธาตุแคลเซียม 67 มิลลิกรัม 7%\r\nธาตุเหล็ก 1.77 มิลลิกรัม 14%\r\nธาตุแมกนีเซียม 26 มิลลิกรัม 7%\r\nธาตุแมงกานีส 0.426 มิลลิกรัม 20%\r\nธาตุฟอสฟอรัส 48 มิลลิกรัม 7%\r\nธาตุโพแทสเซียม 521 มิลลิกรัม 11%\r\nธาตุโซเดียม 46 มิลลิกรัม 3%\r\nธาตุสังกะสี 0.5 มิลลิกรัม 5%\r\n% ร้อยละของปริมาณแนะนำที่ร่างกายต้องการในแต่ละวันสำหรับผู้ใหญ่ (ข้อมูลจาก : USDA Nutrient database)', '2021-03-10 12:20:08');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `members`
--
ALTER TABLE `members`
  ADD PRIMARY KEY (`mem_id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`post_id`),
  ADD KEY `mem_id` (`mem_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`),
  ADD KEY `mem_id` (`mem_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `members`
--
ALTER TABLE `members`
  MODIFY `mem_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `post_id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `posts`
--
ALTER TABLE `posts`
  ADD CONSTRAINT `posts_ibfk_1` FOREIGN KEY (`mem_id`) REFERENCES `members` (`mem_id`);

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `mem_id` FOREIGN KEY (`mem_id`) REFERENCES `members` (`mem_id`);
--
-- Database: `hellogram`
--
CREATE DATABASE IF NOT EXISTS `hellogram` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `hellogram`;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(10) NOT NULL,
  `user_name` varchar(255) NOT NULL,
  `user_username` varchar(255) NOT NULL,
  `user_password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `user_name`, `user_username`, `user_password`) VALUES
(1, 'Siwat Laothong', 'pondwick', 'pond1234'),
(2, 'Nittaya Phomhom', 'nittaya1234', '1234'),
(3, 'Nittaya Phomhom', 'nittaya', '1234'),
(4, 'Nittaya Phomhom', 'nittaya854', '1234'),
(5, 'Siwat Laothong', 'pondkarakat', '1234'),
(6, 'Siwat Laothong', 'pondkarakat2', '1234'),
(7, 'Siwat Laothong', 'pondkarakat3', '1234'),
(8, 'Siwat Laothong', 'ggzz', '1234'),
(9, 'asdasd', 'podssdasd', 'asdfadf'),
(10, ';alsd;alskd;alksd', 'askdlaksd', ';sl;alskd46546ar'),
(11, 'sdfsdf', 'p;lk;lk', 'sdfsdf'),
(12, ';laksdasd', ';lk;lk;l', ';laksd'),
(13, 'eytr', 'jhgjhgjhg', '5681219565'),
(14, 'bbvcxcz', 'zxcvbn', '4563123'),
(15, 'bbvcxczyiuyiuy', 'zxcvbntrytrytr', '4563123'),
(16, 'cxzewqsa', 'p45682', '4688795'),
(17, 'zxczxcqwe', 'qweqwr', 'asd865465'),
(18, 'Kumnittaya', 'kumnit', '12341234');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
--
-- Database: `movie_db`
--
CREATE DATABASE IF NOT EXISTS `movie_db` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `movie_db`;

-- --------------------------------------------------------

--
-- Table structure for table `movies`
--

CREATE TABLE `movies` (
  `id` int(3) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `category` int(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `movies`
--

INSERT INTO `movies` (`id`, `name`, `category`) VALUES
(1, 'Loki', 1),
(2, 'LOKI', 1),
(3, 'Thor', 1),
(4, 'Doramon', 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `movies`
--
ALTER TABLE `movies`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `movies`
--
ALTER TABLE `movies`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- Database: `msucafes`
--
CREATE DATABASE IF NOT EXISTS `msucafes` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `msucafes`;

-- --------------------------------------------------------

--
-- Table structure for table `cafes`
--

CREATE TABLE `cafes` (
  `cafe_id` int(10) NOT NULL,
  `mem_id` int(10) NOT NULL,
  `cafe_name` varchar(255) NOT NULL,
  `cafe_detail` text NOT NULL,
  `address` text,
  `lat` varchar(255) DEFAULT NULL,
  `lng` varchar(255) DEFAULT NULL,
  `status` int(11) NOT NULL,
  `time_reg` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cafes`
--

INSERT INTO `cafes` (`cafe_id`, `mem_id`, `cafe_name`, `cafe_detail`, `address`, `lat`, `lng`, `status`, `time_reg`) VALUES
(1, 1, 'Garden House : Cafe & Restaurant', 'ร้านนม บรรยากาศชิวๆในสวน การบริการทุกระดับประทับใจ', '568 หมู่ 3 ตำบลท่าขอนยาง อำเภอกันทรวิชัย 44150', '16.234216708311003', '103.25820025922876', 0, '2021-03-16 04:39:57'),
(2, 1, 'อาฟเตอร์ เดย์ คาเฟ่ x ส.บ.ร. หม่าล่า', 'อาฟเตอร์ เดย์ คาเฟ่ x ส.บ.ร. หม่าล่า เชิญชวนคนเหงาที่ไม่มีแรงอ่านหนัง\r\nสือสอบ แวะมาเติมพลังกับพวกเราได้นะ พิกัดร้านอยู่ตรงข้ามเอ็กโปร ม.ใหม่', '2202, Tambon Kham Riang, Amphoe Kantharawichai, Chang Wat Maha Sarakham 44150', '16.23993401513279', '103.25590662256838', 0, '2021-03-17 17:59:16'),
(3, 2, 'ร้านคาเฟ่แมวมหาสารคาม (นมแมว)', 'ยินดีต้อนรับลูกค้าทุกๆท่านคะ 🙏🏻🙏🏻\r\n😻มีน้องแมวมากกว่า 20 ชีวิต\r\nหลากหลายสายพันธุ์ เปอร์เซีย เมนคูน วิเชียรมาศ\r\nสก็อตติชโฟลด์ อเมริกันชอตแฮร์ เบงกอล มัชกิ้นขาสั้น\r\nพันธุ์ไทย บริทิชสก็อตติช \r\n📶Free WIFI   🥰ลูกค้าที่มีแมว นำแมวมาเล่นที่ร้านได้จ้า\r\n🥛🍞นม ขนมปัง ราคาถูกแสนถูก \r\n😽ค่าเข้า 30 บาทต่อท่านจ้า\r\n📍พิกัด ริมคลองสมถวิล ข้างหมอ', 'ริมคลองสมถวิล ข้างหมอฟันต้นกล้า \r\nตรงข้ามรินดาการ์เด้น', '16.190638678702737', '103.2869013956227', 0, '2021-03-30 08:06:59'),
(4, 1, 'ท่าพระจันทร์', 'Ep.1วันนี้จะมารีวิวคาเฟ่น่านั่ง+อาหารอร่อย 🥤🥗🍻🧁\r\nใกล้ มใหม่ 👉🏻 ท่าพระจันทร์ มหาสารคาม ✨ จ.มหาสารคาม\r\nข้างในร้าน โซนแรกจะเป็นคาเฟ่ ใกล้ๆกันเป็นโซนอาหาร ตอนเย็นๆมีดนตรีให้นั่งฟังชิวๆ ติดกับทุ่งนาบรรยากาศดีมากค่ะ เวลาเปิดปิดร้าน 👇🏼🙏🏻  *เอินไปตอนบ่าย15.40 ไม่ร้อนมากค่ะ \r\nคาเฟ่ เปิด 11.00-20.00\r\nโซนอาหารเปิด 16.00-23.00\r\n*โต๊ะข้างในร้านมีไม่เยอะนะคะ นั่งข้างนอกได้ค่ะ', 'ใกล้ มใหม่ 👉🏻 ท่าพระจันทร์ มหาสารคาม ✨ จ.มหาสารคาม', '16.2334160182943', '103.27518619530923', 0, '2021-03-30 08:30:48'),
(9, 2, 'T’taste. Khamriang', 'ร้านกาแฟ คาเฟ่สำหรับคนที่ชอบร้านเหมือนอยู่บ้าน\r\nมีมุมถ่ายรูปสวยๆหลายที่ บรรยากาศดี มีเครื่องดื่มและอาหารอร่อยๆมากมาย free wifi. เป็นกันเองสุดๆ แถมยังอยู่ไกล้มออีกด้วย', ' แถมยังอยู่ไกล้มออีกด้วย', '16.25506478780219', '103.23153019747994', 0, '2021-04-03 03:51:09'),
(10, 2, 'บิ๊กมัมเดริเวอร์รี่ ซีฟู๊ดจ้า', 'ราคาอาหาร 20 ทุกเมนู สะดวกกินเมนูไหนมาจ้า\r\nทางร้านเข้าร่วมโครงการคนละครึ่งนะคะ🙏🙏\r\nส้มตำ ยำ ตามสั่ง(ของทะเลสดใหม่)คาเฟ่น้ำ❤\r\nพร้อมให้บริการทุกวันร้านเปิด12.00-23.00 น😄\r\nพิกัดร้านเเถวปั้มพีทีท่าขอนยางติดร้านเสื้อเเอบเท่\r\nเลยนะคะ❤❤🙏\r\nขออนุญาตเเอดมินนะคะ🙏\r\nโปรเช็คอินฟรียำ เเซลม่อนนะคะ🙏🙏🙏😊😊', 'พิกัดร้านเเถวปั้มพีทีท่าขอนยางติดร้านเสื้อเเอบเท่', '16.235558265921064', '103.26848547038341', 0, '2021-04-03 03:58:14'),
(11, 2, 'A : Tom cafe', 'ลูกค้าท่านไหนมองหาร้านคาเฟ่นั่งเล่น นั่งอ่านหนังสือ แอร์เย็นๆ เครื่องดื่มอร่อยๆ 🍵🍸☕ \r\n#แวะมาชิมได้ ที่ ร้าน A : Tom cafe ได้นะคะ 🤗\r\n#สามารถสั่งออนไลน์ผ่านทางร้านได้ด้วยน้า Inbox ได้เลยจ้า \r\n📌 ค่าส่งทั่ว มมส. 10฿ ทั้งนั้น ☕️🍵🥛🛵 \r\n#พิกัดหน้าร้านอยู่ม.ใหม่ฝั่งขามเรียงตรงข้ามหอพักทองแมนชั่น', 'ม.ใหม่ฝั่งขามเรียงตรงข้ามหอพักทองแมนชั่น', '16.237317906312487', '103.2625365021879', 0, '2021-04-03 04:01:41'),
(12, 1, 'Peaberry Per Se พีเบอร์รี เพอร์ เซ', '( ☕️🥖 รีวิวร้าน Peaberry Per Se พีเบอร์รี เพอร์ เซ )  มุมถ่ายรูปสวย ชิคๆ ทั้งมินิมอล มีงานศิลป์สวยๆที่ตกแต่งให้ชมและถ่ายภาพ\r\n🕐 เวลาเปิด - ปิด 09.00 - 18.00 น. \r\n🛻 : พิกัดร้านอยู่เส้นหน้ามอ \r\nบรรยากาศร้านดี ร่มรื่นสุดๆ เหมาะสำหรับมากับเพื่อนได้  สามารถมาอ่านหนังสือได้ด้วย\r\n🫖 : เด่นๆจะเป็นในเรื่องกาแฟ (ทางร้านทำกาแฟเป็นหลัก)\r\nเครื่องดื่มที่จะรีวิวคือ \r\nน้ำลิ้นจี่โซดาราคา 70 ฿ คนที่ชอบทานเปรี้ยวหวานๆ \r\nชานมไทยหรือชาไทยเย็น กลมกล่อมมากๆ 55 ฿\r\nโกโก้เย็น เข้มหวานมัน \r\nสุดท้ายย แนะนำคุกกี้อัลมอนด์ในราคา 55 ฿ หวานพอดี ทานยังไงก็ไม่เลี่ยนอีกด้วย เบเกอร์รี่อื่นๆก็อร่อยมากกก 🍪 \r\n🕯 เจ้าของร้านน่ารักมากๆ เจ้าของร้านแนะนำเป็นกาแฟนะคะซึ่งกาแฟมีหลายแบบมากๆเหมาะสำหรับผู้ที่ชอบดื่มกาแฟแต่เครื่องดื่มอื่นๆก็อร่อยเหมือนกันค่ะ : ——  )\r\nสั่งได้2ช่องทาง ทั้ง GrabFood และ FoodPanda', '🛻 : พิกัดร้านอยู่เส้นหน้ามอ ', '16.250411883169622', '103.25868244971002', 0, '2021-04-03 04:05:09'),
(13, 1, 'Bamboo Garden Coffee&cake', '🌞 Bamboo Garden Coffee&cake มารีวิวคาเฟ่สุดแสนจะธรรมชาติ เต็มไปด้วยต้นไม้ เหมาะกับการมาอ่านหนังสือมากกก เงียบสงบ มีเปลให้นอนด้วยยย เป็นร้านที่มีทั้งเครื่องดื่มขนมปังปิ้งอาหารอีกเยอะเลยค่ะ  ✨\r\nเวลาปิด-เปิด 10.00-19.00 am \r\n🕯 พิกัด Bamboo gaden cafe\r\nhttps://goo.gl/maps/RU7c9TFkNgk8xDro9 ( ซอยเดียวกันกับร้านแตกซวด ตรงเข้ามาเรื่อยๆ ) \r\nเครื่องดื่มที่มารีวิว ทาดา\r\nชาเขียวปั่น , นมสดเย็น , ขนมปังปิ้งเนยนม - กล้วย\r\nเหมาะสำหรับผู้ที่ชอบนมหมี รสชาติประมาณนั้นค่า หวานหอมมากกกก ราคาดีมากไม่แพงเลย 😗\r\n🛖 เจ้าของร้านน่ารัก เทคแคร์ดีมากก ที่นั่งเป็น outdoor ซะส่วนใหญ่ แวะมากันเยอะๆนะคะ : ——— )', 'พิกัด Bamboo gaden cafe\r\nhttps://goo.gl/maps/RU7c9TFkNgk8xDro9 ( ซอยเดียวกันกับร้านแตกซวด ตรงเข้ามาเรื่อยๆ ) ', '16.243081802250366', '103.26661613976496', 0, '2021-04-03 04:10:08'),
(14, 2, 'Miso home cafe 미소 홈 카페 ✨', '🕯 tadaa วันนี้มารีวิวคาเฟ่ที่มินิมอลแบบเวรี่เวรี่ Miso home cafe 미소 홈 카페 ✨\r\nเป็นคาเฟ่ที่เปิดในบริเวณบ้าน มุมถ่ายรูปดีทุกรูปจริงๆ \r\nเวลาเปิด-ปิด 10.00 -19.00 am\r\nพิกัด https://goo.gl/maps/2YCPrY2FW2nrt7x19\r\nเครื่องดื่มที่มารีวิว 🖖🏻\r\nchocolate , strawberry milk (จำไม่ค่อยได้)\r\n( มีมากาลองที่น่าอร่อยมาก ลองไปทานกันได้นะคะ )\r\nอาจจะใกล้ออกจากในมอแต่ไปแล้วไม่ผิดหวังแน่นอนนะคะ เหมาะสำหรับผู้ที่ชอบเซลฟี่ พื้นหลังมินิมอลสีขาว ซึ่งเป็นฟีลบ้าน ดูอบอุ่นมากกก พนักงานก็น่ารักมากๆเลยค่ะ ✨🌷 ดูบรรยากาศใต้เม้นได้นะคะแต่อาจถ่ายมาไม่ครบ 🤏🏻', 'พิกัด https://goo.gl/maps/2YCPrY2FW2nrt7x19\r\nเครื่องดื่มที่มารีวิว 🖖🏻', '16.162653655826578', '103.29275249558306', 0, '2021-04-03 05:08:30');

-- --------------------------------------------------------

--
-- Table structure for table `cafe_images`
--

CREATE TABLE `cafe_images` (
  `cafe_img_id` int(10) NOT NULL,
  `cafe_id` int(10) NOT NULL,
  `img_addr` text,
  `time_reg` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cafe_images`
--

INSERT INTO `cafe_images` (`cafe_img_id`, `cafe_id`, `img_addr`, `time_reg`) VALUES
(1, 1, 'garden_house_cafe.jpg', '2021-03-16 13:20:48'),
(2, 1, 'garden2.jpg', '2021-03-17 16:48:31'),
(3, 1, 'garden3.jpg', '2021-03-17 16:50:13'),
(4, 2, 'afterday1.jpg', '2021-03-17 18:00:53'),
(5, 3, 'catmilk1.jpg', '2021-03-30 08:10:11'),
(6, 3, 'catmilk2.jpg', '2021-03-30 08:10:35'),
(7, 3, 'catmilk3.jpg', '2021-03-30 08:10:46'),
(8, 3, 'catmilk4.jpg', '2021-03-30 08:10:53'),
(9, 4, 'thapra1.jpg', '2021-03-30 08:33:27'),
(10, 4, 'thapra2.jpg', '2021-03-30 08:33:34'),
(11, 4, 'thapra3.jpg', '2021-03-30 08:33:42'),
(12, 4, 'thapra4.jpg', '2021-03-30 08:33:48'),
(13, 4, 'thapra5.jpg', '2021-03-30 08:33:54'),
(14, 4, 'thapra6.jpg', '2021-03-30 08:34:01'),
(15, 4, 'thapra7.jpg', '2021-03-30 08:34:07'),
(16, 4, 'thapra8.jpg', '2021-03-30 08:34:13'),
(21, 4, '20210331_1617168840images.jpeg', '2021-03-31 05:34:00'),
(26, 9, 'ttaste1.jpg', '2021-04-03 03:52:46'),
(27, 9, 'ttaste2.jpg', '2021-04-03 03:52:52'),
(28, 9, 'ttaste3.jpg', '2021-04-03 03:52:58'),
(29, 9, 'ttaste4.jpg', '2021-04-03 03:53:03'),
(30, 10, 'bigmum1.jpg', '2021-04-03 03:59:17'),
(31, 10, 'bigmum2.jpg', '2021-04-03 03:59:26'),
(32, 10, 'bigmum3.jpg', '2021-04-03 03:59:34'),
(33, 11, 'atom1.jpg', '2021-04-03 04:02:28'),
(34, 11, 'atom2.jpg', '2021-04-03 04:02:36'),
(35, 12, 'pea1.jpg', '2021-04-03 04:06:39'),
(36, 12, 'pea2.jpg', '2021-04-03 04:06:45'),
(37, 12, 'pea3.jpg', '2021-04-03 04:06:52'),
(38, 12, 'pea4.jpg', '2021-04-03 04:06:57'),
(39, 13, 'bamboo1.jpg', '2021-04-03 04:11:13'),
(40, 13, 'bamboo2.jpg', '2021-04-03 04:11:18'),
(41, 13, 'bamboo3.jpg', '2021-04-03 04:11:24'),
(42, 13, 'bamboo4.jpg', '2021-04-03 04:11:30'),
(43, 13, 'bamboo5.jpg', '2021-04-03 04:11:35'),
(44, 14, 'tedaa1.jpg', '2021-04-03 05:09:38'),
(45, 14, 'tedaa2.jpg', '2021-04-03 05:09:42'),
(46, 14, 'tedaa3.jpg', '2021-04-03 05:09:48'),
(47, 14, 'tedaa4.jpg', '2021-04-03 05:09:53');

-- --------------------------------------------------------

--
-- Table structure for table `members`
--

CREATE TABLE `members` (
  `mem_id` int(10) NOT NULL,
  `mem_name` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `mem_status` varchar(255) NOT NULL,
  `time_reg` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `members`
--

INSERT INTO `members` (`mem_id`, `mem_name`, `username`, `password`, `mem_status`, `time_reg`) VALUES
(1, 'Siwat Laothong', 'pondwick', 'pond1234', 'admin', '2021-03-16 04:34:08'),
(2, 'ศิวัช เหลาทอง', 'pppoond', 'pond0615960771', 'user', '2021-03-18 04:17:57'),
(3, 'Kumnit Kumnit', 'kumnit', '12341234', 'user', '2021-03-18 08:03:32'),
(4, 'Nitnit Nitnit', 'nitnit', '12341234', 'user', '2021-03-18 08:18:53'),
(5, 'Pond Pond', 'pondpond', 'pondpond', 'user', '2021-03-18 08:25:44'),
(6, 'Pond Pond', 'pondpond333', 'pondpond', 'user', '2021-03-18 08:28:07'),
(7, 'GreenGreen', 'green1234', '12341234', 'user', '2021-04-02 18:41:50');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cafes`
--
ALTER TABLE `cafes`
  ADD PRIMARY KEY (`cafe_id`),
  ADD KEY `mem_id_OF_cafes_table_FK` (`mem_id`);

--
-- Indexes for table `cafe_images`
--
ALTER TABLE `cafe_images`
  ADD PRIMARY KEY (`cafe_img_id`),
  ADD KEY `cafe_id_OF_cafe_images_table_FK` (`cafe_id`);

--
-- Indexes for table `members`
--
ALTER TABLE `members`
  ADD PRIMARY KEY (`mem_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cafes`
--
ALTER TABLE `cafes`
  MODIFY `cafe_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `cafe_images`
--
ALTER TABLE `cafe_images`
  MODIFY `cafe_img_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT for table `members`
--
ALTER TABLE `members`
  MODIFY `mem_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `cafes`
--
ALTER TABLE `cafes`
  ADD CONSTRAINT `mem_id_OF_cafes_table_FK` FOREIGN KEY (`mem_id`) REFERENCES `members` (`mem_id`);

--
-- Constraints for table `cafe_images`
--
ALTER TABLE `cafe_images`
  ADD CONSTRAINT `cafe_id_OF_cafe_images_table_FK` FOREIGN KEY (`cafe_id`) REFERENCES `cafes` (`cafe_id`);
--
-- Database: `taladsod`
--
CREATE DATABASE IF NOT EXISTS `taladsod` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `taladsod`;

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
--
-- Database: `ungfood`
--
CREATE DATABASE IF NOT EXISTS `ungfood` DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci;
USE `ungfood`;

-- --------------------------------------------------------

--
-- Table structure for table `foodtable`
--

CREATE TABLE `foodtable` (
  `id` int(11) NOT NULL,
  `idShop` text COLLATE utf8_unicode_ci NOT NULL,
  `NameFood` text COLLATE utf8_unicode_ci NOT NULL,
  `PathImage` text COLLATE utf8_unicode_ci NOT NULL,
  `Price` text COLLATE utf8_unicode_ci NOT NULL,
  `Detail` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `foodtable`
--

INSERT INTO `foodtable` (`id`, `idShop`, `NameFood`, `PathImage`, `Price`, `Detail`) VALUES
(1, '15', 'ลูกชิ้นหมู', '/UngFood/Food/food505877.jpg', '10', 'อร่อย มากๆๆ'),
(2, '15', 'ต้มเลือดหมู', '/UngFood/Food/food437263.jpg', '50', 'ซดๆๆๆ ร้อนๆ อร่อยมาก'),
(3, '15', 'ขนมจีนแกงไก่', '/UngFood/Food/food41565.jpg', '60', 'เผ็ด แต่ อร่อย'),
(4, '15', 'สุกี่แห้ง', '/UngFood/Food/food476330.jpg', '60', 'อร่อย มากๆๆๆ'),
(5, '15', 'กระเพราไข่ดาว', '/UngFood/Food/food486662.jpg', '50', 'เผ็ด แต่ อร่อยมาก'),
(6, '15', 'สลัดไข่', '/UngFood/Food/food81236.jpg', '60', 'ผัดสด กับ ไข่ต้ม'),
(7, '15', 'หมูผัดเผ็ด', '/UngFood/Food/food770077.jpg', '80', 'เผ็ดมากนะ'),
(12, '2', 'เลือดหมู ข้าวเปล่า', '/UngFood/Food/food698689.jpg', '80', 'อร่อย มากๆๆ'),
(16, '2', 'เค้กช้อกโกเล็ด', '/UngFood/Food/food682557.jpg', '300', 'ช้อคโกแล้ค'),
(17, '2', 'สุกี่แห้ง', '/UngFood/Food/food611185.jpg', '50', 'อร่อย สะอาด ทะเลเพียบๆๆๆ อร่อย สะอาด ทะเลเพียบๆๆๆ อร่อย สะอาด ทะเลเพียบๆๆๆ'),
(19, '16', 'เกาเหลา ข้าวเปล่า', '/UngFood/Food/food933585.jpg', '60', 'อิ่มอร่อย');

-- --------------------------------------------------------

--
-- Table structure for table `ordertable`
--

CREATE TABLE `ordertable` (
  `id` int(11) NOT NULL,
  `OrderDateTime` text COLLATE utf8_unicode_ci NOT NULL,
  `idUser` text COLLATE utf8_unicode_ci NOT NULL,
  `NameUser` text COLLATE utf8_unicode_ci NOT NULL,
  `idShop` text COLLATE utf8_unicode_ci NOT NULL,
  `NameShop` text COLLATE utf8_unicode_ci NOT NULL,
  `Distance` text COLLATE utf8_unicode_ci NOT NULL,
  `Transport` text COLLATE utf8_unicode_ci NOT NULL,
  `idFood` text COLLATE utf8_unicode_ci NOT NULL,
  `NameFood` text COLLATE utf8_unicode_ci NOT NULL,
  `Price` text COLLATE utf8_unicode_ci NOT NULL,
  `Amount` text COLLATE utf8_unicode_ci NOT NULL,
  `Sum` text COLLATE utf8_unicode_ci NOT NULL,
  `idRider` text COLLATE utf8_unicode_ci NOT NULL,
  `Status` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `ordertable`
--

INSERT INTO `ordertable` (`id`, `OrderDateTime`, `idUser`, `NameUser`, `idShop`, `NameShop`, `Distance`, `Transport`, `idFood`, `NameFood`, `Price`, `Amount`, `Sum`, `idRider`, `Status`) VALUES
(1, '2020-08-04 05:05', '1', 'มาสเตอร์ ผู้ซื้อ', '2', 'อึ่ง อร่อยโครต จริงๆ', '1.72', '45', '[12, 17]', '[เลือดหมู ข้าวเปล่า, สุกี่แห้ง]', '[80, 50]', '[3, 2]', '[240, 100]', 'none', 'UserOrder'),
(2, '2020-08-04 05:06', '1', 'มาสเตอร์ ผู้ซื้อ', '15', 'โนบิตะ อร่อย มาก', '2.48', '45', '[1, 3, 6, 7]', '[ลูกชิ้นหมู, ขนมจีนแกงไก่, สลัดไข่, หมูผัดเผ็ด]', '[10, 60, 60, 80]', '[5, 1, 2, 2]', '[50, 60, 120, 160]', 'none', 'UserOrder');

-- --------------------------------------------------------

--
-- Table structure for table `usertable`
--

CREATE TABLE `usertable` (
  `id` int(11) NOT NULL,
  `ChooseType` text COLLATE utf8_unicode_ci NOT NULL,
  `Name` text COLLATE utf8_unicode_ci NOT NULL,
  `User` text COLLATE utf8_unicode_ci NOT NULL,
  `Password` text COLLATE utf8_unicode_ci NOT NULL,
  `NameShop` text COLLATE utf8_unicode_ci NOT NULL,
  `Address` text COLLATE utf8_unicode_ci NOT NULL,
  `Phone` text COLLATE utf8_unicode_ci NOT NULL,
  `UrlPicture` text COLLATE utf8_unicode_ci NOT NULL,
  `Lat` text COLLATE utf8_unicode_ci NOT NULL,
  `Lng` text COLLATE utf8_unicode_ci NOT NULL,
  `Token` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `usertable`
--

INSERT INTO `usertable` (`id`, `ChooseType`, `Name`, `User`, `Password`, `NameShop`, `Address`, `Phone`, `UrlPicture`, `Lat`, `Lng`, `Token`) VALUES
(1, 'User', 'มาสเตอร์ ผู้ซื้อ', 'masteruser', '123456', '', '', '', '', '', '', ''),
(2, 'Shop', 'ร้านมาสเตอร์ อึ่ง', 'mastershop', '123456', 'อึ่ง อร่อยโครต จริงๆ', '53 หมู่บ้านถาวรนิเวศน์1\r\nซอย บางนา-ตราด14\r\nบางนา กรุงเทพ 10260', '0818595309', '/UngFood/Shop/editShop66320.jpg', '13.673455', '100.606933', ''),
(3, 'Rider', 'มาสเตอร์อึ่ง ส่งของ', 'masterrider', '123456', '', '', '', '', '', '', ''),
(11, 'Shop', 'Apple Shop', 'appleShop', '123456', '', '', '', '', '', '', ''),
(14, 'User', 'โดรามอน', 'dora', '123456', '', '', '', '', '', '', ''),
(15, 'Shop', 'โนบิตะ', 'nopi', '123456', 'โนบิตะ อร่อย มาก', '1234 บางนา กรุงเทพ', '123456', '/UngFood/Shop/editShop35981.jpg', '13.665762', '100.644516', ''),
(16, 'Shop', 'TestShop1', 'shop1', '123456', 'ก้วยเตียว อึ่ง', '123/456 กทม', '123456', '/UngFood/Shop/shop793822.jpg', '13.670370', '100.622812', ''),
(17, 'User', 'apple User', 'appleuser', '123456', '', '', '', '', '', '', ''),
(18, '', 'Pondwick', 'pondwick', 'pond1234', '', '', '', '', '', '', ''),
(19, '', 'Siwat Laothong', 'pondwick2', 'pond1234', '', '', '', '', '', '', ''),
(20, 'User', 'Nittaya', 'nittaya1234', '12341234', '', '', '', '', '', '', ''),
(21, 'User', 'UserTest3', 'usertest_3', '12341234', '', '', '', '', '', '', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `foodtable`
--
ALTER TABLE `foodtable`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ordertable`
--
ALTER TABLE `ordertable`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `usertable`
--
ALTER TABLE `usertable`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `foodtable`
--
ALTER TABLE `foodtable`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `ordertable`
--
ALTER TABLE `ordertable`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `usertable`
--
ALTER TABLE `usertable`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
--
-- Database: `vega_app`
--
CREATE DATABASE IF NOT EXISTS `vega_app` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `vega_app`;

-- --------------------------------------------------------

--
-- Table structure for table `addresses`
--

CREATE TABLE `addresses` (
  `address_id` int(10) NOT NULL,
  `member_id` int(10) NOT NULL,
  `address` text,
  `lat` varchar(255) DEFAULT NULL,
  `lng` varchar(255) DEFAULT NULL,
  `addr_status` varchar(255) NOT NULL,
  `time_reg` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `bank_account`
--

CREATE TABLE `bank_account` (
  `bank_id` int(10) NOT NULL,
  `seller_id` int(10) NOT NULL,
  `bank_name` varchar(255) NOT NULL,
  `bank_account` varchar(255) NOT NULL,
  `time_reg` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `category_id` int(10) NOT NULL,
  `category_name` varchar(255) NOT NULL,
  `time_reg` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `driver_license`
--

CREATE TABLE `driver_license` (
  `dri_lic_id` int(10) NOT NULL,
  `rider_id` int(10) NOT NULL,
  `card_id` varchar(255) NOT NULL,
  `card_image` text NOT NULL,
  `time_reg` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `members`
--

CREATE TABLE `members` (
  `member_id` int(10) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `member_status` varchar(255) NOT NULL,
  `time_reg` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `mem_customers`
--

CREATE TABLE `mem_customers` (
  `customer_id` int(10) NOT NULL,
  `member_id` int(10) NOT NULL,
  `customer_name` varchar(255) NOT NULL,
  `customer_phone` varchar(255) DEFAULT NULL,
  `sex` varchar(255) DEFAULT NULL,
  `profile_image` text,
  `time_reg` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `mem_riders`
--

CREATE TABLE `mem_riders` (
  `rider_id` int(10) NOT NULL,
  `member_id` int(10) NOT NULL,
  `rider_phone` varchar(255) DEFAULT NULL,
  `rider_name` varchar(255) NOT NULL,
  `sex` varchar(255) DEFAULT NULL,
  `rider_status` varchar(255) NOT NULL,
  `profile_image` text,
  `time_reg` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `mem_sellers`
--

CREATE TABLE `mem_sellers` (
  `seller_id` int(10) NOT NULL,
  `member_id` int(10) NOT NULL,
  `seller_phone` varchar(255) DEFAULT NULL,
  `seller_name` varchar(255) NOT NULL,
  `profile_image` text,
  `time_reg` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `order_id` int(10) NOT NULL,
  `purc_id` int(10) NOT NULL,
  `trans_id` int(10) NOT NULL,
  `seller_id` int(10) NOT NULL,
  `rider_id` int(10) NOT NULL,
  `customer_id` int(10) NOT NULL,
  `order_date` date DEFAULT NULL,
  `total` int(10) NOT NULL,
  `status` varchar(255) NOT NULL,
  `time_reg` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `product_id` int(10) NOT NULL,
  `seller_id` int(10) NOT NULL,
  `category_id` int(10) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `product_detail` text,
  `pro_date` date DEFAULT NULL,
  `pro_price` float DEFAULT NULL,
  `time_reg` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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

-- --------------------------------------------------------

--
-- Table structure for table `purchase_tb`
--

CREATE TABLE `purchase_tb` (
  `purc_id` int(10) NOT NULL,
  `rider_id` int(10) NOT NULL,
  `total` float NOT NULL,
  `purc_date` date DEFAULT NULL,
  `status` int(10) DEFAULT NULL,
  `time_reg` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `transfer_tb`
--

CREATE TABLE `transfer_tb` (
  `trans_id` int(10) NOT NULL,
  `seller_id` int(10) NOT NULL,
  `total` float NOT NULL,
  `status` int(10) DEFAULT NULL,
  `trans_date` date DEFAULT NULL,
  `time_reg` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `addresses`
--
ALTER TABLE `addresses`
  ADD PRIMARY KEY (`address_id`),
  ADD KEY `member_id_addresses_fk` (`member_id`);

--
-- Indexes for table `bank_account`
--
ALTER TABLE `bank_account`
  ADD PRIMARY KEY (`bank_id`),
  ADD KEY `seller_id_bank_account_fk` (`seller_id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `driver_license`
--
ALTER TABLE `driver_license`
  ADD PRIMARY KEY (`dri_lic_id`),
  ADD KEY `rider_id_driver_license_fk` (`rider_id`);

--
-- Indexes for table `members`
--
ALTER TABLE `members`
  ADD PRIMARY KEY (`member_id`);

--
-- Indexes for table `mem_customers`
--
ALTER TABLE `mem_customers`
  ADD PRIMARY KEY (`customer_id`),
  ADD KEY `member_id_mem_customers_fk` (`member_id`);

--
-- Indexes for table `mem_riders`
--
ALTER TABLE `mem_riders`
  ADD PRIMARY KEY (`rider_id`),
  ADD KEY `member_id_rider_fk` (`member_id`);

--
-- Indexes for table `mem_sellers`
--
ALTER TABLE `mem_sellers`
  ADD PRIMARY KEY (`seller_id`),
  ADD KEY `member_id_mem_sellers_fk` (`member_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`),
  ADD KEY `purc_id_order_fk` (`purc_id`),
  ADD KEY `trans_id_order_fk` (`trans_id`),
  ADD KEY `seller_id_order_fk` (`seller_id`),
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
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`),
  ADD KEY `seller_id_product_fk` (`seller_id`),
  ADD KEY `category_id_product_fk` (`category_id`);

--
-- Indexes for table `product_images`
--
ALTER TABLE `product_images`
  ADD PRIMARY KEY (`pro_img_id`),
  ADD KEY `product_id_product_image_fk` (`product_id`);

--
-- Indexes for table `purchase_tb`
--
ALTER TABLE `purchase_tb`
  ADD PRIMARY KEY (`purc_id`),
  ADD KEY `rider_id_purchase_tb_fk` (`rider_id`);

--
-- Indexes for table `transfer_tb`
--
ALTER TABLE `transfer_tb`
  ADD PRIMARY KEY (`trans_id`),
  ADD KEY `seller_id_transfer_tb_fk` (`seller_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `addresses`
--
ALTER TABLE `addresses`
  MODIFY `address_id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `bank_account`
--
ALTER TABLE `bank_account`
  MODIFY `bank_id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `category_id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `driver_license`
--
ALTER TABLE `driver_license`
  MODIFY `dri_lic_id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `members`
--
ALTER TABLE `members`
  MODIFY `member_id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `mem_customers`
--
ALTER TABLE `mem_customers`
  MODIFY `customer_id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `mem_riders`
--
ALTER TABLE `mem_riders`
  MODIFY `rider_id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `mem_sellers`
--
ALTER TABLE `mem_sellers`
  MODIFY `seller_id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `order_details`
--
ALTER TABLE `order_details`
  MODIFY `order_detail_id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `product_images`
--
ALTER TABLE `product_images`
  MODIFY `pro_img_id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `purchase_tb`
--
ALTER TABLE `purchase_tb`
  MODIFY `purc_id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `transfer_tb`
--
ALTER TABLE `transfer_tb`
  MODIFY `trans_id` int(10) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `addresses`
--
ALTER TABLE `addresses`
  ADD CONSTRAINT `member_id_addresses_fk` FOREIGN KEY (`member_id`) REFERENCES `members` (`member_id`);

--
-- Constraints for table `bank_account`
--
ALTER TABLE `bank_account`
  ADD CONSTRAINT `seller_id_bank_account_fk` FOREIGN KEY (`seller_id`) REFERENCES `mem_sellers` (`seller_id`);

--
-- Constraints for table `driver_license`
--
ALTER TABLE `driver_license`
  ADD CONSTRAINT `rider_id_driver_license_fk` FOREIGN KEY (`rider_id`) REFERENCES `mem_riders` (`rider_id`);

--
-- Constraints for table `mem_customers`
--
ALTER TABLE `mem_customers`
  ADD CONSTRAINT `member_id_mem_customers_fk` FOREIGN KEY (`member_id`) REFERENCES `members` (`member_id`);

--
-- Constraints for table `mem_riders`
--
ALTER TABLE `mem_riders`
  ADD CONSTRAINT `member_id_rider_fk` FOREIGN KEY (`member_id`) REFERENCES `members` (`member_id`);

--
-- Constraints for table `mem_sellers`
--
ALTER TABLE `mem_sellers`
  ADD CONSTRAINT `member_id_mem_sellers_fk` FOREIGN KEY (`member_id`) REFERENCES `members` (`member_id`);

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `customer_id_order_fk` FOREIGN KEY (`customer_id`) REFERENCES `mem_customers` (`customer_id`),
  ADD CONSTRAINT `purc_id_order_fk` FOREIGN KEY (`purc_id`) REFERENCES `purchase_tb` (`purc_id`),
  ADD CONSTRAINT `rider_id_order_fk` FOREIGN KEY (`rider_id`) REFERENCES `mem_riders` (`rider_id`),
  ADD CONSTRAINT `seller_id_order_fk` FOREIGN KEY (`seller_id`) REFERENCES `mem_sellers` (`seller_id`),
  ADD CONSTRAINT `trans_id_order_fk` FOREIGN KEY (`trans_id`) REFERENCES `transfer_tb` (`trans_id`);

--
-- Constraints for table `order_details`
--
ALTER TABLE `order_details`
  ADD CONSTRAINT `order_id_order_detail_fk` FOREIGN KEY (`order_id`) REFERENCES `orders` (`order_id`),
  ADD CONSTRAINT `product_id_order_detail_fk` FOREIGN KEY (`product_id`) REFERENCES `products` (`product_id`);

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `category_id_product_fk` FOREIGN KEY (`category_id`) REFERENCES `category` (`category_id`),
  ADD CONSTRAINT `seller_id_product_fk` FOREIGN KEY (`seller_id`) REFERENCES `mem_sellers` (`seller_id`);

--
-- Constraints for table `product_images`
--
ALTER TABLE `product_images`
  ADD CONSTRAINT `product_id_product_image_fk` FOREIGN KEY (`product_id`) REFERENCES `products` (`product_id`);

--
-- Constraints for table `purchase_tb`
--
ALTER TABLE `purchase_tb`
  ADD CONSTRAINT `rider_id_purchase_tb_fk` FOREIGN KEY (`rider_id`) REFERENCES `mem_riders` (`rider_id`);

--
-- Constraints for table `transfer_tb`
--
ALTER TABLE `transfer_tb`
  ADD CONSTRAINT `seller_id_transfer_tb_fk` FOREIGN KEY (`seller_id`) REFERENCES `mem_sellers` (`seller_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
