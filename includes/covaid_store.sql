-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 28, 2020 at 08:29 AM
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
(61, 'Mask', 'Customizable face masks. Create your own design and express your unique style\r\nPremium quality face masks. \r\nReusable, washable, breathable soft cotton fabric.', '25.00', 15, 50, 50, '/Soen-287-Final-Project/dummy_product_mask.php', '/Soen-287-Final-Project/admin_product_mask.php', NULL, NULL, NULL, '2020-11-27 05:29:31', '2020-11-28 06:08:43'),
(68, 'Disposable gloves', 'Vinyl disposable gloves. Multi-purpose gloves. \r\nPack 100.', '22.99', NULL, 20, 100, '/Soen-287-Final-Project/dummy_product_Disposablegloves.php', '/Soen-287-Final-Project/admin_product_Disposablegloves.php', NULL, NULL, NULL, '2020-11-27 06:39:59', '2020-11-27 11:39:59'),
(67, 'Disposable mask', 'Disposable face masks (50 pack).\r\nComfortable earloops & adjustable metal nose strip. Ideal for indoor, and outdoor use. ', '28.95', NULL, 10, 30, '/Soen-287-Final-Project/dummy_product_Disposablemask.php', '/Soen-287-Final-Project/admin_product_Disposablemask.php', '/Soen-287-Final-Project/images/mask.jpg', NULL, NULL, '2020-11-27 06:34:33', '2020-11-27 11:34:33'),
(69, 'Faceshield', '10 pack unisex face shield reusable.', '25.00', NULL, 5, 100, '/Soen-287-Final-Project/dummy_product_Faceshield.php', '/Soen-287-Final-Project/admin_product_Faceshield.php', '/Soen-287-Final-Project/images/faceshield.jpg', NULL, NULL, '2020-11-27 06:41:18', '2020-11-27 11:41:18');

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
(1, 69, 5, 'Rachel', 'I liked and preferred this style of face shield compared to the ones where you wear them like a hat which ruins your hairstyle for the day. Fits just right on my face and does not fog up as advertised. I\'ve had positive comments wearing it at the office. Thank you very much and keep advertising good quality products so customers buy more often from your site', '2020-11-27 22:06:44', NULL, NULL),
(2, 69, 4, 'Adam', 'It\'s a breathable shield, quiet comfortable but if worn for more than an hour, the ridge of my nose feels funny and aches a little. It is light weight no doubt, great sheerness , doesn\'t get foggy.', '2020-11-17 22:06:44', NULL, NULL),
(3, 69, 3, 'Karen', 'It’s not clear. It is a foggy screen', '2020-11-24 22:10:08', 'We are sorry that our product did not meet your expectation. Email us at so we can assist you.', '2020-11-28 01:44:39'),
(4, 69, 5, 'Paul', NULL, '2020-11-25 22:11:09', NULL, NULL),
(5, 69, 5, 'Sam', NULL, '2020-11-08 22:11:42', NULL, NULL),
(6, 61, 5, 'John', 'So very happy with the quality of my masks graphic design, fabric, and construction', '2020-11-24 22:12:25', 'We are glad that you liked our product!', '2020-11-28 01:37:30'),
(7, 61, 5, 'Ranj', 'I love this mask! It’s become a compulsory clothing item; might as well be stylish!', '2020-11-24 22:14:43', NULL, NULL),
(8, 61, 5, 'Anonymous', 'Great mask! Love it!', '2020-11-25 22:15:19', NULL, NULL),
(9, 61, 4, 'Anonymous', NULL, '2020-11-17 22:16:10', NULL, NULL),
(10, 61, 5, 'Sidney', NULL, '2020-11-26 22:16:10', NULL, NULL);

--
-- Indexes for dumped tables
--

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
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=70;

--
-- AUTO_INCREMENT for table `reviews`
--
ALTER TABLE `reviews`
  MODIFY `review_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
