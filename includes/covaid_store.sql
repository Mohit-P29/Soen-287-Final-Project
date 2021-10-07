-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 16, 2020 at 10:42 PM
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
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` int(11) NOT NULL,
  `productName` varchar(30) NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `image` varchar(255) NOT NULL,
  `maskPColor` varchar(255) NOT NULL,
  `MaskSColor` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`id`, `productName`, `quantity`, `price`, `image`, `maskPColor`, `MaskSColor`) VALUES
(92, 'Purell ES8 disinfectant dispen', 9, 39, 'image/products/p10m.jpg', '', ''),
(93, 'Octenisan Face Cloth', 5, 5, 'image/products/p11m.png', '', '');

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
(9, 1, 1, 1),
(10, 0, 0, 0),
(11, 0, 0, 0),
(12, 0, 0, 0),
(13, 1, 1, 4),
(14, 1, 1, 4),
(15, 1, 1, 1),
(16, 1, 1, 1),
(17, 1, 1, 1),
(18, 1, 1, 4),
(19, 1, 1, 4);

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `cardnumber` varchar(256) NOT NULL,
  `pay_first` varchar(256) NOT NULL,
  `pay_last` varchar(256) NOT NULL,
  `pay_address` varchar(256) NOT NULL,
  `pay_city` varchar(256) NOT NULL,
  `pay_country` varchar(256) NOT NULL,
  `pay_province` varchar(256) NOT NULL,
  `pay_post` varchar(256) NOT NULL,
  `pay_phone` varchar(256) NOT NULL,
  `pay_cvc` int(3) NOT NULL,
  `id` int(11) NOT NULL,
  `user_id` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`cardnumber`, `pay_first`, `pay_last`, `pay_address`, `pay_city`, `pay_country`, `pay_province`, `pay_post`, `pay_phone`, `pay_cvc`, `id`, `user_id`) VALUES
('1234 5678 7890 1111', 'Jiawei', 'Yao', '1234 Rue Goodie', 'Montreal', 'canada', 'Quebec', 'H4K3J9', '001-438-123-4567', 112, 19, 'Jiawyao@hotmail.com'),
('1234 5678 7890 1111', '', '', '', '', '', '', '', '', 0, 37, 'samuel@hotmail.com'),
('1234 1234 1234 1234', 'Sam', 'qwe', '1234 Rue what', 'Montreak', 'canada', 'Quebec', 'A1C1V2', '001-123-123-1234', 123, 38, 'samuel123@hotmail.com'),
('', '', '', '', '', '', '', '', '', 0, 39, '1233@hotmail.com'),
('1234 1234 1234 1234', 'Mohit', 'Patel', '1234 Sherbrooke', 'Montreal', 'canada', 'Quebec', 'H3B4H3', '123-123-123-1234', 123, 41, 'Mohit_Patel299@hotmail.com'),
('1234 1234 1234 1234', 'John', 'Smith', '1234 sherbrooke', 'Montreal', 'canada', 'Quebec', 'H3N4H2', '123-123-123-1234', 342, 42, '123@hotmail.com'),
('1234 1234 1234 1234', 'John', 'Smith', '1234 Sherbrooke', 'Montreal', 'canada', 'Quebec', 'H3N4H2', '123-123-123-1234', 123, 43, '1234@mail.com'),
('1234 1234 1234 1234', 'Xinyi ', 'Deng', '1234 sherbrooke', 'Montreal', 'canada', 'Quebec', 'H3K2J3', '123-123-123-1234', 432, 44, 'xinyideng10@hotmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `name` varchar(512) NOT NULL,
  `description` text NOT NULL,
  `type` varchar(256) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `specialPrice` decimal(10,2) DEFAULT NULL,
  `sales` int(11) NOT NULL DEFAULT 0,
  `inventory` int(11) NOT NULL DEFAULT 0,
  `webpageLink` text NOT NULL,
  `adminpageLink` text NOT NULL,
  `image1` text DEFAULT NULL,
  `image2` text DEFAULT NULL,
  `image3` text DEFAULT NULL,
  `image4` text DEFAULT NULL,
  `image5` text DEFAULT NULL,
  `created` datetime NOT NULL,
  `modified` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COMMENT='products that can be added to cart';

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `description`, `type`, `price`, `specialPrice`, `sales`, `inventory`, `webpageLink`, `adminpageLink`, `image1`, `image2`, `image3`, `image4`, `image5`, `created`, `modified`) VALUES
(61, 'DIY Mask', 'Customizable face masks. Create your own design and express your unique style\r\nPremium quality face masks. \r\nReusable, washable, breathable soft cotton fabric.', 'Mask', '20.00', '15.00', 50, 100, 'diy_mask_product_page.php', 'admin_product_mask.php', 'images/Product Images/5fced03ba9b141.50458938.jpg', NULL, NULL, NULL, NULL, '2020-11-27 05:29:31', '2020-12-08 15:09:43'),
(68, 'Disposable gloves', 'Vinyl disposable gloves. Multi-purpose gloves. \r\nPack 100.', 'Other', '22.99', NULL, 30, 100, 'productpage_Disposablegloves.php', 'admin_product_Disposablegloves.php', 'image/products/disposableGlove1.jpg', 'image/products/disposableGlove2.jpg', 'image/products/disposableGlove3.jpg', 'image/products/disposableGlove4.jpg', 'image/products/disposableGlove5.jpg', '2020-11-27 06:39:59', '2020-12-07 14:44:30'),
(67, 'Disposable mask', 'Disposable face masks (50 pack).\r\nComfortable earloops & adjustable metal nose strip. Ideal for indoor, and outdoor use. ', 'Other', '28.95', '15.00', 10, 20, 'productpage_Disposablemask.php', 'admin_product_Disposablemask.php', 'images/mask.jpg', NULL, NULL, NULL, NULL, '2020-11-27 06:34:33', '2020-12-07 15:44:01'),
(69, 'Faceshield', '10 pack unisex face shield reusable.', 'Other', '25.00', NULL, 5, 100, 'productpage_Faceshield.php', 'admin_product_Faceshield.php', 'images/faceshield.jpg', NULL, NULL, NULL, NULL, '2020-11-27 06:41:18', '2020-12-07 16:40:11'),
(83, 'Jermee Moisturizing Hand Sanitizer Gel', 'Gentle & Moisturizing - Enhanced with moisturizers, Vitamin E, and Aloe Vera to deeply \r\nnourish the skin, keeping your hands soft and moisturized even after many uses. ', 'Other', '29.95', NULL, 0, 100, 'productpage_JermeeMoisturizingHandSanitizerGel.php', 'admin_product_JermeeMoisturizingHandSanitizerGel.php', 'image/products/p1m.jpg', 'image/products/p1a.jpg', 'image/products/p1b.jpg', 'image/products/p1c.jpg', 'image/products/p1d.jpg', '2020-12-07 06:44:17', '2020-12-07 11:47:39'),
(84, 'Travel Clean KIT (2-Pack)', 'EASY TO USE & RECYCLE: Each Travel Clean Pack gives you the personal protection you need to\r\n get to your destination as healthy as when you left. There are currently no government sanitization standards for travel, it is your duty to protect yourself.', 'Other', '34.95', NULL, 0, 50, 'productpage_TravelCleanKIT2Pack1.php', 'admin_product_TravelCleanKIT2Pack1.php', 'image/products/p2m.jpg', 'image/products/p2a.jpg', 'image/products/p2b.jpg', 'image/products/p2c.jpg', 'image/products/p2d.jpg', '2020-12-07 07:00:50', '2020-12-07 12:00:50'),
(85, 'Sterillium Hand Sanitizer  (100ml)', 'Sterillium from Bode is the classic amongst all hand sanitizers.\r\n Sterillium hand sanitizer has a very high skin tolerance, a wide spectrum of efficacy and,\r\n thanks to its moisturising and hydrating ingredients, is ideal for long-term use in users with dry skin.', 'Other', '2.89', NULL, 0, 50, 'productpage_SterilliumHandSanitizer100ml.php', 'admin_product_SterilliumHandSanitizer100ml.php', 'image/products/p3m.jpg', 'image/products/p3a.jpg', 'image/products/p3b.jpg', 'image/products/p3c.jpg', 'image/products/p3d.jpg', '2020-12-07 07:07:11', '2020-12-07 12:07:11'),
(86, 'FFP2 Mask without Valve', 'The FFP2 respiratory mask complies with DIN EN149:2001+A1:2009 and offers a filter performance of 94%.', 'Other', '7.50', NULL, 0, 50, 'productpage_FFP2MaskwithoutValve.php', 'admin_product_FFP2MaskwithoutValve.php', 'image/products/p4m.jpg', 'image/products/p4a.jpg', 'image/products/p4b.jpg', 'image/products/p4c.jpg', 'image/products/p4d.jpg', '2020-12-07 07:08:59', '2020-12-07 16:39:41'),
(87, 'Teqler Surgical Mask, black', 'The black surgical mask from Teqler is well suited for tattoo artists and piercers.', 'Other', '29.99', '19.99', 0, 25, 'productpage_TeqlerSurgicalMaskblack.php', 'admin_product_TeqlerSurgicalMaskblack.php', 'image/products/p5m.jpg', 'image/products/p5a.jpg', 'image/products/p5b.jpg', 'image/products/p5c.jpg', 'image/products/p5d.jpg', '2020-12-07 07:11:58', '2020-12-07 12:14:14'),
(88, 'Disposable Polyethylene Gloves', 'The Ampri PE gloves are available in various models for men and women. These disposable gloves are non-sterile, transparent and wearable on both hands.', 'Other', '4.30', NULL, 0, 30, 'productpage_DisposablePolyethyleneGloves.php', 'admin_product_DisposablePolyethyleneGloves.php', 'image/products/p6m.jpg', 'image/products/p6a.jpg', 'image/products/p6b.jpg', 'image/products/p6c.jpg', 'image/products/p6d.jpg', '2020-12-07 07:15:07', '2020-12-07 12:15:07'),
(89, 'Disposable Overall', 'The Lioncare® disposable overall is suitable for all areas where extensive protective clothing is required, such as in decontamination or when handling hazardous chemicals, particular matter or infectious agents.', 'Other', '18.99', NULL, 0, 50, 'productpage_DisposableOverall.php', 'admin_product_DisposableOverall.php', 'image/products/p7m.jpg', 'image/products/p7a.jpg', 'image/products/p7b.jpg', 'image/products/p7c.jpg', 'image/products/p7d.jpg', '2020-12-07 07:20:03', '2020-12-07 12:20:03'),
(90, 'Disposable Gown made from PP Fleece', 'These disposable gowns made are made of high-quality virgin PP fleece to use as protective gowns in the hospital. The protective gowns can be worn by visitors and employees during patient care.', '', '14.99', NULL, 0, 90, 'productpage_DisposableGownmadefromPPFleece.php', 'admin_product_DisposableGownmadefromPPFleece.php', 'image/products/p8m.jpg', 'image/products/p8a.jpg', 'image/products/p8b.jpg', 'image/products/p8c.jpg', 'image/products/p8d.jpg', '2020-12-07 07:23:02', '2020-12-07 12:23:02'),
(91, 'Clorox Disinfecting Wipes & Pro Wipes', 'Clorox Disinfecting Wipes is an all-purpose wipe that cleans and disinfects with antibacterial power killing 99.9% of viruses and bacteria in a Fresh Scent. These disposable wipes remove common allergens, germs and messes on kitchen counters, bathroom surfaces and more.', '', '7.99', NULL, 0, 100, 'productpage_CloroxDisinfectingWipesProWipes.php', 'admin_product_CloroxDisinfectingWipesProWipes.php', 'image/products/p9m.jpg', 'image/products/p9a.png', 'image/products/p9b.jpg', 'image/products/p9c.jpg', 'image/products/p9d.jpg', '2020-12-07 07:26:03', '2020-12-07 12:26:03'),
(92, 'Purell ES8 disinfectant dispense', 'The Purell ES8 preparation dispenser is available in two versions – as a disinfectant dispenser to be filled with Purell Advanced and as a soap dispenser to be filled with Purell Healthy Soap.', '', '38.85', NULL, 0, 40, 'productpage_PurellES8disinfectantdispense.php', 'admin_product_PurellES8disinfectantdispense.php', 'image/products/p10m.jpg', 'image/products/p10a.jpg', 'image/products/p10b.jpg', 'image/products/p10c.jpg', 'image/products/p10d.jpg', '2020-12-07 07:29:50', '2020-12-07 12:29:50'),
(93, 'Octenisan Face Cloth', 'Thanks to their rapid effectiveness against MRSA, these antimicrobial octenisan face cloths from schülke are ideal for washing MRSA patients in hospitals and nursing facilities.', '', '4.99', NULL, 0, 60, 'productpage_OctenisanFaceCloth.php', 'admin_product_OctenisanFaceCloth.php', 'image/products/p11m.png', 'image/products/p11a.png', 'image/products/p11b.jpg', 'image/products/p11c.jpg', 'image/products/p11d.jpg', '2020-12-07 07:31:21', '2020-12-07 12:31:21'),
(94, 'Wellisair Air Disinfection Purifier', 'he Wellisair Air Disinfection Purifier follows nature’s example and guarantees safe disinfection of the ambient air and surfaces, thanks to its innovative technology. ', '', '782.00', NULL, 0, 10, 'productpage_WellisairAirDisinfectionPurifier.php', 'admin_product_WellisairAirDisinfectionPurifier.php', 'image/products/p12m.jpg', 'image/products/p12a.jpg', 'image/products/p12b.jpg', 'image/products/p12c.jpg', 'image/products/p12d.jpg', '2020-12-07 07:35:51', '2020-12-07 12:35:51'),
(102, 'Lysol', 'Desinfectant wipes', '', '10.00', '5.00', 0, 50, 'productpage_Lysol.php', 'admin_product_Lysol.php', 'images/Product Images/5fcfb9799db3f7.17803239.jpg', NULL, NULL, NULL, NULL, '2020-12-08 12:35:23', '2020-12-08 17:35:53');

-- --------------------------------------------------------

--
-- Table structure for table `profile`
--

CREATE TABLE `profile` (
  `id` int(11) NOT NULL,
  `picture` blob NOT NULL,
  `user_name` varchar(256) NOT NULL,
  `user_id` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `profile`
--

INSERT INTO `profile` (`id`, `picture`, `user_name`, `user_id`) VALUES
(5, '', 'Cayi123', 'Jiawyao@hotmail.com'),
(6, 0x23666666666666, 'SC', 'samuel@hotmail.com'),
(7, '', 'No name yet', 'samuel123@hotmail.com'),
(8, '', 'No name yet', '1233@hotmail.com'),
(10, 0x23616433343334, 'Mohit', 'Mohit_Patel299@hotmail.com'),
(11, 0x23353232383238, '123', '123@hotmail.com'),
(12, 0x23383232373237, 'John', '1234@mail.com'),
(13, 0x23373633373337, 'xinyi', 'xinyideng10@hotmail.com');

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
(1, 69, 5, 'Rachel', 'I liked and preferred this style of face shield compared to the ones where you wear them like a hat which ruins your hairstyle for the day. Fits just right on my face and does not fog up as advertised. I\'ve had positive comments wearing it at the office. Thank you very much and keep advertising good quality products so customers buy more often from your site', '2020-11-27 22:06:44', 'Thank you for your review!', '2020-12-06 11:53:02'),
(2, 69, 4, 'Adam', 'It\'s a breathable shield, quiet comfortable but if worn for more than an hour, the ridge of my nose feels funny and aches a little. It is light weight no doubt, great sheerness , doesn\'t get foggy.', '2020-11-17 22:06:44', 'We are happy that you are satisfied with our product!', '2020-12-07 04:05:45'),
(3, 69, 3, 'Karen', 'It’s not clear. It is a foggy screen', '2020-11-24 22:10:08', 'We are sorry that our product did not meet your expectation. Email us at so we can assist you.', '2020-11-28 01:44:39'),
(4, 69, 5, 'Paul', NULL, '2020-11-25 22:11:09', NULL, NULL),
(5, 69, 5, 'Sam', NULL, '2020-11-08 22:11:42', NULL, NULL),
(6, 61, 5, 'John', 'So very happy with the quality of my masks graphic design, fabric, and construction', '2020-11-24 22:12:25', 'We are glad that you liked our product! Hope to see you soon again!', '2020-11-28 09:56:39'),
(7, 61, 5, 'Ranj', 'I love this mask! It’s become a compulsory clothing item; might as well be stylish!', '2020-11-24 22:14:43', 'Great. Thanks for shopping here.', '2020-11-29 11:03:46'),
(8, 61, 5, 'Anonymous', 'Great mask! Love it!', '2020-11-25 22:15:19', 'Glad you loved it!', '2020-11-28 09:40:00'),
(9, 61, 4, 'Anonymous', NULL, '2020-11-17 22:16:10', NULL, NULL),
(10, 61, 5, 'Sidney', NULL, '2020-11-26 22:16:10', NULL, NULL),
(11, 61, 1, 'Anonymous', NULL, '0000-00-00 00:00:00', NULL, NULL),
(12, 61, 1, 'Anonymous', NULL, '2020-11-23 11:19:16', NULL, NULL),
(13, 69, 4, 'John', 'AWESOME!', '2020-12-07 02:49:34', 'Great!', '2020-12-07 11:41:18'),
(16, 69, 4, 'Anonymous', 'NULL', '2020-12-07 02:59:41', NULL, NULL),
(20, 69, 3, 'Anonymous', 'NULL', '2020-12-07 03:12:19', NULL, NULL),
(21, 69, 3, 'Sabrina', 'It was okay', '2020-12-07 03:13:34', NULL, NULL),
(22, 81, 4, 'Anonymous', 'NULL', '2020-12-07 05:07:18', NULL, NULL),
(23, 81, 3, 'John', 'Yes', '2020-12-07 05:07:28', NULL, NULL),
(24, 67, 4, 'John', 'GREAT PRODUCT', '2020-12-07 05:16:15', NULL, NULL),
(25, 68, 4, 'Anonymous', 'NULL', '2020-12-07 05:50:09', NULL, NULL),
(26, 83, 4, 'Anonymous', 'Love this hand sanitizer!', '2020-12-07 06:58:26', NULL, NULL),
(27, 84, 5, 'Anonymous', 'NULL', '2020-12-07 07:41:14', NULL, NULL),
(28, 68, 5, 'Anonymous', 'good', '2020-12-07 09:40:04', NULL, NULL),
(30, 67, 5, 'Anonymous', 'NULL', '2020-12-08 10:40:03', NULL, NULL),
(31, 67, 4, 'Sara', 'Nice product', '2020-12-08 10:40:21', NULL, NULL),
(32, 83, 5, 'John', 'Good product!', '2020-12-08 11:31:09', NULL, NULL),
(33, 100, 5, 'John', 'Awesome', '2020-12-08 11:33:56', 'Glad you like it!', '2020-12-08 11:34:14'),
(34, 61, 5, 'Anonymous', 'Love it!', '2020-12-08 11:36:38', NULL, NULL),
(35, 93, 5, 'Anonymous', 'NULL', '2020-12-08 12:33:35', NULL, NULL),
(36, 93, 4, 'John', 'Great product!', '2020-12-08 12:33:50', NULL, NULL),
(37, 102, 5, 'John', 'Awesome', '2020-12-08 12:36:06', 'Glad you like it!', '2020-12-08 12:36:26');

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
  `id` int(11) UNSIGNED NOT NULL,
  `user_id` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `useraddress`
--

INSERT INTO `useraddress` (`first`, `last`, `company`, `address`, `address2`, `city`, `country`, `province`, `post`, `phone`, `id`, `user_id`) VALUES
('Samuel', 'Chuang', '', '62 Rue Du Rocher', '', 'Pincourt', 'canada', 'Quebec', 'J7W 9W5', '5146417889', 33, 'samuel@hotmail.com'),
('Samuel', 'Chuang', '', '62 Rue Du Rocher', '', 'Pincourt', 'canada', 'Quebec', 'J7W 9W5', '5146417889', 34, 'samuel123@hotmail.com'),
('Samuel', 'Chuang', '', '62 Rue Du Rocher', '', 'Pincourt', 'canada', 'Quebec', 'J7W 9W5', '5146417889', 35, '1233@hotmail.com'),
('Mohit', 'Patel', '', '1234 sherbrooke', '', 'Montreal', 'Canada', 'Quebec', 'H4N2K3', '1231231234', 37, 'Mohit_Patel299@hotmail.com'),
('John', 'Smith', '', '123 sherbrooke', '', 'Montreal', 'Canada', 'Quebec', 'H4N3H2', '123-123-1234', 38, '123@hotmail.com'),
('John', 'Smith', '', '1234 sherbrooke', '', 'Montreal', 'Canada', 'Quebec', 'H3N', '123-123-1234', 39, '1234@mail.com'),
('Xinyi', 'Deng', '', '1234 Sherbrooke', '', 'Montreal', 'Canada', 'Quebec', 'H3K2J3', '123-123-1234', 40, 'xinyideng10@hotmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `user_info`
--

CREATE TABLE `user_info` (
  `user_id` varchar(256) NOT NULL,
  `password` varchar(256) NOT NULL,
  `id` int(11) NOT NULL,
  `user_first` varchar(256) NOT NULL,
  `user_last` varchar(256) NOT NULL,
  `user_email1` varchar(256) NOT NULL,
  `user_email2` varchar(256) NOT NULL,
  `phone1` varchar(256) NOT NULL,
  `phone2` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_info`
--

INSERT INTO `user_info` (`user_id`, `password`, `id`, `user_first`, `user_last`, `user_email1`, `user_email2`, `phone1`, `phone2`) VALUES
('Admin', '123456', 39, '', '', '', '', '', ''),
('samuel@hotmail.com', '123SAm', 41, 'Samuel', 'Chuang', 'samuelc1998@hotmail.com', '', '123-123-123-1234', ''),
('samuel123@hotmail.com', 'qwe123Q', 42, 'Samuel', 'Chuang', 'samuel123@hotmail.com', '', '', ''),
('1233@hotmail.com', '123qweQ', 43, '', '', '1233@hotmail.com', '', '', ''),
('Mohit_Patel299@hotmail.com', 'abcABC123', 45, 'Mohit', 'Patel', 'Mohit_Patel299@hotmail.com', '', '123-123-123-1234', ''),
('123@hotmail.com', 'Abc123', 46, '', '', '123@hotmail.com', '', '', ''),
('1234@mail.com', 'ABCabc123', 47, 'John', 'Smith', '1234@mail.com', '', '123-123-123-1234', ''),
('xinyideng10@hotmail.com', 'abcABC123', 48, 'Xinyi', 'Deng', 'xinyideng10@hotmail.com', '', '123-123-123-1234', '');

-- --------------------------------------------------------

--
-- Table structure for table `user_order`
--

CREATE TABLE `user_order` (
  `id` int(11) NOT NULL,
  `userID` varchar(255) NOT NULL,
  `productName` varchar(30) NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `image` varchar(255) NOT NULL,
  `maskPColor` varchar(255) NOT NULL,
  `MaskSColor` varchar(255) NOT NULL,
  `oDay` int(11) NOT NULL,
  `oMonth` varchar(255) NOT NULL,
  `oYear` int(11) NOT NULL,
  `aDay` int(11) NOT NULL,
  `aMonth` varchar(255) NOT NULL,
  `aYear` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_order`
--

INSERT INTO `user_order` (`id`, `userID`, `productName`, `quantity`, `price`, `image`, `maskPColor`, `MaskSColor`, `oDay`, `oMonth`, `oYear`, `aDay`, `aMonth`, `aYear`) VALUES
(87, 'samuel@hotmail.com', 'Disposable gloves', 4, 23, '', '', '', 0, '', 0, 0, '', 0),
(88, 'samuel@hotmail.com', 'Custom Mask', 1, 20, 'animal/fox.png', 'purple', 'blue', 0, '', 0, 0, '', 0),
(89, 'samuel@hotmail.com', 'Disposable gloves', 4, 23, '', '', '', 0, '', 0, 0, '', 0),
(90, 'samuel@hotmail.com', 'Custom Mask', 1, 20, 'animal/polarbear.png', 'green', 'blue', 0, '', 0, 0, '', 0),
(91, 'samuel@hotmail.com', 'Disposable gloves', 1, 23, '', '', '', 0, '', 0, 0, '', 0),
(92, 'samuel@hotmail.com', 'Custom Mask', 1, 20, '6', 'green', 'blue', 0, '', 0, 0, '', 0),
(93, 'samuel@hotmail.com', 'Custom Mask', 1, 20, 'animal/polarbear.png', '9', 'white', 0, '', 0, 0, '', 0),
(94, 'samuel@hotmail.com', 'Custom Mask', 1, 20, '6', 'yellow', 'blue', 7, 'December', 2020, 14, 'December', 2020),
(95, 'samuel@hotmail.com', 'Custom Mask', 1, 20, 'images/animal/gecko.png', 'blue', 'blue', 7, 'December', 2020, 9, 'December', 2020),
(96, 'samuel123@hotmail.com', 'Custom Mask', 4, 20, '6', 'pink', 'black', 7, 'December', 2020, 14, 'December', 2020),
(97, 'samuel123@hotmail.com', 'Custom Mask', 5, 20, 'images/animal/no_image_selected.png', '9', 'white', 7, 'December', 2020, 14, 'December', 2020),
(98, 'samuel123@hotmail.com', 'Custom Mask', 1, 20, 'images/animal/fox.png', 'green', 'black', 7, 'December', 2020, 14, 'December', 2020),
(99, 'samuel123@hotmail.com', 'Custom Mask', 1, 20, 'images/animal/elephant.png', '9', 'white', 7, 'December', 2020, 14, 'December', 2020),
(100, 'samuel123@hotmail.com', 'Custom Mask', 1, 15, 'images/animal/no_image_selected.png', '9', 'white', 7, 'December', 2020, 14, 'December', 2020),
(101, 'samuel123@hotmail.com', 'Custom Mask', 1, 15, 'images/animal/gecko.png', 'green', 'pink', 7, 'December', 2020, 14, 'December', 2020),
(102, 'samuel123@hotmail.com', 'Custom Mask', 1, 15, 'images/animal/no_image_selected.png', 'blue', 'green', 7, 'December', 2020, 14, 'December', 2020),
(103, 'samuel123@hotmail.com', 'Custom Mask', 1, 15, 'images/animal/no_image_selected.png', '9', 'white', 7, 'December', 2020, 14, 'December', 2020),
(104, 'samuel123@hotmail.com', 'Custom Mask', 1, 15, 'images/animal/no_image_selected.png', 'pink', 'black', 7, 'December', 2020, 14, 'December', 2020),
(105, 'samuel123@hotmail.com', 'Custom Mask', 1, 15, 'images/animal/polarbear.png', 'pink', 'pink', 7, 'December', 2020, 14, 'December', 2020),
(106, 'samuel123@hotmail.com', 'Custom Mask', 1, 15, 'images/animal/no_image_selected.png', 'yellow', 'black', 7, 'December', 2020, 14, 'December', 2020),
(107, 'samuel@hotmail.com', 'Disposable mask', 15, 15, 'images/mask.jpg', '', '', 7, 'December', 2020, 14, 'December', 2020),
(108, 'samuel@hotmail.com', 'Faceshield', 14, 25, 'images/faceshield.jpg', '', '', 7, 'December', 2020, 14, 'December', 2020),
(109, 'samuel@hotmail.com', 'Faceshield', 8, 25, 'images/faceshield.jpg', '', '', 7, 'December', 2020, 14, 'December', 2020),
(110, 'samuel@hotmail.com', 'Disposable gloves', 2, 10, 'image/products/noimage.jpg', '', '', 7, 'December', 2020, 14, 'December', 2020),
(111, 'samuel@hotmail.com', 'Disposable Gown made from PP F', 3, 15, 'image/products/p8m.jpg', '', '', 7, 'December', 2020, 14, 'December', 2020),
(112, 'xinyideng10@hotmail.com', 'Octenisan Face Cloth', 4, 5, 'image/products/p11m.png', '', '', 7, 'December', 2020, 14, 'December', 2020),
(113, 'xinyideng10@hotmail.com', 'Wellisair Air Disinfection Pur', 1, 782, 'image/products/p12m.jpg', '', '', 7, 'December', 2020, 14, 'December', 2020),
(114, 'xinyideng10@hotmail.com', 'Octenisan Face Cloth', 3, 5, 'image/products/p11m.png', '', '', 7, 'December', 2020, 14, 'December', 2020),
(115, 'xinyideng10@hotmail.com', 'Custom Mask', 1, 15, 'images/animal/elephant.png', 'pink', 'green', 7, 'December', 2020, 14, 'December', 2020),
(116, 'xinyideng10@hotmail.com', 'Octenisan Face Cloth', 1, 5, 'image/products/p11m.png', '', '', 8, 'December', 2020, 15, 'December', 2020),
(117, 'Mohit_Patel299@hotmail.com', 'Disposable mask', 3, 15, 'images/mask.jpg', '', '', 8, 'December', 2020, 15, 'December', 2020),
(118, 'Mohit_Patel299@hotmail.com', 'Custom Mask', 1, 15, 'images/animal/fox.png', 'green', 'blue', 8, 'December', 2020, 15, 'December', 2020),
(119, '123@hotmail.com', 'Wellisair Air Disinfection Pur', 1, 782, 'image/products/p12m.jpg', '', '', 8, 'December', 2020, 15, 'December', 2020),
(120, '123@hotmail.com', 'Custom Mask', 3, 15, 'images/animal/elephant.png', 'blue', 'green', 8, 'December', 2020, 15, 'December', 2020),
(121, '1234@mail.com', 'Octenisan Face Cloth', 4, 5, 'image/products/p11m.png', '', '', 8, 'December', 2020, 15, 'December', 2020),
(122, 'xinyideng10@hotmail.com', 'Disposable Overall', 2, 19, 'image/products/p7m.jpg', '', '', 8, 'December', 2020, 15, 'December', 2020),
(123, 'xinyideng10@hotmail.com', 'Custom Mask', 1, 15, 'images/animal/elephant.png', 'green', 'purple', 8, 'December', 2020, 15, 'December', 2020);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `profile`
--
ALTER TABLE `profile`
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
-- Indexes for table `user_order`
--
ALTER TABLE `user_order`
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
  MODIFY `maskId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=104;

--
-- AUTO_INCREMENT for table `profile`
--
ALTER TABLE `profile`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `reviews`
--
ALTER TABLE `reviews`
  MODIFY `review_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `useraddress`
--
ALTER TABLE `useraddress`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `user_info`
--
ALTER TABLE `user_info`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT for table `user_order`
--
ALTER TABLE `user_order`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=124;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
