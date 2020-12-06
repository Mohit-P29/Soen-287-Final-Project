-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 29, 2020 at 05:33 PM
-- Server version: 10.4.16-MariaDB
-- PHP Version: 7.4.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `covaid_store`
--

-- --------------------------------------------------------

--
-- Table structure for table `colors`
--

CREATE TABLE `colors` (
  `colorId` int(11) NOT NULL,
  `color_name` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `colors`
--

INSERT INTO `colors` (`colorId`, `color_name`) VALUES
(1, 'red'),
(2, 'blue'),
(3, 'green'),
(4, 'pink'),
(5, 'yellow'),
(6, 'purple'),
(7, 'orange'),
(8, 'black');

-- --------------------------------------------------------

--
-- Table structure for table `images`
--

CREATE TABLE `images` (
  `image_id` int(11) NOT NULL,
  `image_name` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `images`
--

INSERT INTO `images` (`image_id`, `image_name`) VALUES
(1, 'elephant.png'),
(2, 'fox.png'),
(3, 'gecko.png'),
(4, 'polarbear.png'),
(5, 'rabbit.png');

-- --------------------------------------------------------

--
-- Table structure for table `masks`
--

CREATE TABLE `masks` (
  `maskId` int(11) NOT NULL,
  `primary_color_Id` int(11) NOT NULL,
  `secondary_color_Id` int(11) NOT NULL,
  `image_Id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `masks`
--

INSERT INTO `masks` (`maskId`, `primary_color_Id`, `secondary_color_Id`, `image_Id`) VALUES
(1, 1, 5, 1);

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `firstname` varchar(256) NOT NULL,
  `lastname` varchar(256) NOT NULL,
  `cardnumber` int(16) NOT NULL,
  `cvc` varchar(3) NOT NULL,
  `id` int(11) NOT NULL,
  `userid` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `name` varchar(512) NOT NULL,
  `description` text NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `specialPrice` int(11) DEFAULT NULL,
  `sales` int(11) NOT NULL DEFAULT 0,
  `inventory` int(11) NOT NULL DEFAULT 0,
  `webpageLink` text NOT NULL,
  `adminpageLink` text NOT NULL,
  `image1` text DEFAULT NULL,
  `image2` text DEFAULT NULL,
  `image3` text DEFAULT NULL,
  `created` datetime NOT NULL,
  `modified` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COMMENT='products that can be added to cart';

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `description`, `price`, `specialPrice`, `sales`, `inventory`, `webpageLink`, `adminpageLink`, `image1`, `image2`, `image3`, `created`, `modified`) VALUES
(61, 'Mask', 'Customizable face masks. Create your own design and express your unique style\r\nPremium quality face masks. \r\nReusable, washable, breathable soft cotton fabric.', '20.00', 15, 50, 100, '/Soen-287-Final-Project/dummy_product_mask.php', '/Soen-287-Final-Project/admin_product_mask.php', '', NULL, NULL, '2020-11-27 05:29:31', '2020-11-28 14:54:53'),
(68, 'Disposable gloves', 'Vinyl disposable gloves. Multi-purpose gloves. \r\nPack 100.', '22.99', NULL, 30, 100, '/Soen-287-Final-Project/dummy_product_Disposablegloves.php', '/Soen-287-Final-Project/admin_product_Disposablegloves.php', NULL, NULL, NULL, '2020-11-27 06:39:59', '2020-11-27 11:39:59'),
(67, 'Disposable mask', 'Disposable face masks (50 pack).\r\nComfortable earloops & adjustable metal nose strip. Ideal for indoor, and outdoor use. ', '28.95', NULL, 10, 30, '/Soen-287-Final-Project/dummy_product_Disposablemask.php', '/Soen-287-Final-Project/admin_product_Disposablemask.php', '/Soen-287-Final-Project/images/mask.jpg', NULL, NULL, '2020-11-27 06:34:33', '2020-11-27 11:34:33'),
(69, 'Faceshield', '10 pack unisex face shield reusable.', '25.00', NULL, 5, 100, '/Soen-287-Final-Project/dummy_product_Faceshield.php', '/Soen-287-Final-Project/admin_product_Faceshield.php', '/Soen-287-Final-Project/images/faceshield.jpg', NULL, NULL, '2020-11-27 06:41:18', '2020-11-27 11:41:18'),
(74, 'Test - Lysol', 'Best lysol product', '10.00', NULL, 0, 40, '/Soen-287-Final-Project/dummy_product_TestLysol.php', '/Soen-287-Final-Project/admin_product_TestLysol.php', NULL, NULL, NULL, '2020-11-29 11:00:49', '2020-11-29 16:01:55'),
(73, 'Test', 'TEST TEST TEST', '10.00', NULL, 0, 100, '/Soen-287-Final-Project/dummy_product_Test.php', '/Soen-287-Final-Project/admin_product_Test.php', NULL, NULL, NULL, '2020-11-28 09:58:09', '2020-11-28 14:58:09');

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

CREATE TABLE `reviews` (
  `review_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `num_star` int(1) NOT NULL COMMENT 'Max: 5 stars',
  `username` text NOT NULL,
  `user_review` text DEFAULT NULL,
  `review_date` datetime NOT NULL,
  `admin_reply` text DEFAULT NULL,
  `reply_date` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `reviews`
--

INSERT INTO `reviews` (`review_id`, `product_id`, `num_star`, `username`, `user_review`, `review_date`, `admin_reply`, `reply_date`) VALUES
(1, 69, 5, 'Rachel', 'I liked and preferred this style of face shield compared to the ones where you wear them like a hat which ruins your hairstyle for the day. Fits just right on my face and does not fog up as advertised. I\'ve had positive comments wearing it at the office. Thank you very much and keep advertising good quality products so customers buy more often from your site', '2020-11-27 22:06:44', 'Thank you for your review Rachel!', '2020-11-28 02:30:18'),
(2, 69, 4, 'Adam', 'It\'s a breathable shield, quiet comfortable but if worn for more than an hour, the ridge of my nose feels funny and aches a little. It is light weight no doubt, great sheerness , doesn\'t get foggy.', '2020-11-17 22:06:44', NULL, NULL),
(3, 69, 3, 'Karen', 'It’s not clear. It is a foggy screen', '2020-11-24 22:10:08', 'We are sorry that our product did not meet your expectation. Email us at so we can assist you.', '2020-11-28 01:44:39'),
(4, 69, 5, 'Paul', NULL, '2020-11-25 22:11:09', NULL, NULL),
(5, 69, 5, 'Sam', NULL, '2020-11-08 22:11:42', NULL, NULL),
(6, 61, 5, 'John', 'So very happy with the quality of my masks graphic design, fabric, and construction', '2020-11-24 22:12:25', 'We are glad that you liked our product! Hope to see you soon again!', '2020-11-28 09:56:39'),
(7, 61, 5, 'Ranj', 'I love this mask! It’s become a compulsory clothing item; might as well be stylish!', '2020-11-24 22:14:43', 'Great. Thanks for shopping here.', '2020-11-29 11:03:46'),
(8, 61, 5, 'Anonymous', 'Great mask! Love it!', '2020-11-25 22:15:19', 'Glad you loved it!', '2020-11-28 09:40:00'),
(9, 61, 4, 'Anonymous', NULL, '2020-11-17 22:16:10', NULL, NULL),
(10, 61, 5, 'Sidney', NULL, '2020-11-26 22:16:10', NULL, NULL),
(11, 61, 1, 'Anonymous', NULL, '0000-00-00 00:00:00', NULL, NULL),
(12, 61, 1, 'Anonymous', NULL, '2020-11-23 11:19:16', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `useraddress`
--

CREATE TABLE `useraddress` (
  `first` varchar(256) NOT NULL,
  `last` varchar(256) NOT NULL,
  `company` varchar(256) NOT NULL,
  `address` varchar(256) NOT NULL,
  `address2` varchar(256) NOT NULL,
  `city` varchar(256) NOT NULL,
  `country` varchar(256) NOT NULL,
  `province` varchar(256) NOT NULL,
  `post` varchar(256) NOT NULL,
  `phone` varchar(256) NOT NULL,
  `id` int(11) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `user_info`
--

CREATE TABLE `user_info` (
  `id` int(11) NOT NULL,
  `user_first` varchar(256) NOT NULL,
  `user_last` varchar(256) NOT NULL,
  `user_email1` varchar(256) NOT NULL,
  `user_email2` varchar(256) NOT NULL,
  `phone1` varchar(256) NOT NULL,
  `phone2` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `colors`
--
ALTER TABLE `colors`
  ADD PRIMARY KEY (`colorId`);

--
-- Indexes for table `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`image_id`);

--
-- Indexes for table `masks`
--
ALTER TABLE `masks`
  ADD PRIMARY KEY (`maskId`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`review_id`);

--
-- Indexes for table `useraddress`
--
ALTER TABLE `useraddress`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_info`
--
ALTER TABLE `user_info`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `colors`
--
ALTER TABLE `colors`
  MODIFY `colorId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `images`
--
ALTER TABLE `images`
  MODIFY `image_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `masks`
--
ALTER TABLE `masks`
  MODIFY `maskId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=75;

--
-- AUTO_INCREMENT for table `reviews`
--
ALTER TABLE `reviews`
  MODIFY `review_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `useraddress`
--
ALTER TABLE `useraddress`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `user_info`
--
ALTER TABLE `user_info`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
