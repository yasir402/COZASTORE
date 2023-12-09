-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Dec 09, 2023 at 08:40 AM
-- Server version: 8.0.31
-- PHP Version: 8.0.26

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
-- Table structure for table `admin`
--

DROP TABLE IF EXISTS `admin`;
CREATE TABLE IF NOT EXISTS `admin` (
  `admin_id` int NOT NULL AUTO_INCREMENT,
  `admin_name` varchar(100) NOT NULL,
  `admin_email` varchar(250) NOT NULL,
  `admin_password` varchar(100) NOT NULL,
  `admin_img` varchar(500) NOT NULL,
  PRIMARY KEY (`admin_id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `admin_name`, `admin_email`, `admin_password`, `admin_img`) VALUES
(1, 'yasir', 'YASIR@gmail.com', '123', ' upload/WhatsApp Image 2023-09-05 at 9.30.33 PM.jpeg');

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

DROP TABLE IF EXISTS `brands`;
CREATE TABLE IF NOT EXISTS `brands` (
  `brand_id` int NOT NULL AUTO_INCREMENT,
  `brand_name` varchar(100) NOT NULL,
  PRIMARY KEY (`brand_id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `brands`
--

INSERT INTO `brands` (`brand_id`, `brand_name`) VALUES
(1, 'Nike'),
(2, 'Zara');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

DROP TABLE IF EXISTS `cart`;
CREATE TABLE IF NOT EXISTS `cart` (
  `id` int NOT NULL AUTO_INCREMENT,
  `pro_id` varchar(100) NOT NULL,
  `ip` varchar(100) NOT NULL,
  `quantity` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=30 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

DROP TABLE IF EXISTS `categories`;
CREATE TABLE IF NOT EXISTS `categories` (
  `cat_id` int NOT NULL AUTO_INCREMENT,
  `cat_name` varchar(100) NOT NULL,
  PRIMARY KEY (`cat_id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`cat_id`, `cat_name`) VALUES
(1, 'Men');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

DROP TABLE IF EXISTS `orders`;
CREATE TABLE IF NOT EXISTS `orders` (
  `order_id` int NOT NULL AUTO_INCREMENT,
  `user_id` int NOT NULL,
  `due_amount` int NOT NULL,
  `invoice` int NOT NULL,
  `total_products` int NOT NULL,
  `order_date` timestamp NOT NULL,
  `order_state` varchar(500) NOT NULL,
  PRIMARY KEY (`order_id`)
) ENGINE=MyISAM AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`order_id`, `user_id`, `due_amount`, `invoice`, `total_products`, `order_date`, `order_state`) VALUES
(14, 11, 30000, 1693211171, 1, '2023-09-24 13:52:57', 'complete'),
(13, 10, 500, 2034642899, 1, '2023-09-21 15:18:03', 'complete'),
(15, 12, 20000, 1729969307, 1, '2023-10-08 16:23:05', 'complete'),
(11, 5, 50000, 504128776, 1, '2023-09-19 15:28:15', 'complete'),
(10, 5, 20000, 1506772736, 2, '2023-09-19 11:28:28', 'pending'),
(16, 14, 22000, 1936659888, 3, '2023-11-18 13:16:30', 'complete');

-- --------------------------------------------------------

--
-- Table structure for table `orders_pending`
--

DROP TABLE IF EXISTS `orders_pending`;
CREATE TABLE IF NOT EXISTS `orders_pending` (
  `order_id` int NOT NULL AUTO_INCREMENT,
  `user_id` int NOT NULL,
  `invoice` int NOT NULL,
  `product_id` int NOT NULL,
  `quantity` int NOT NULL,
  `order_status` varchar(500) NOT NULL,
  PRIMARY KEY (`order_id`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `orders_pending`
--

INSERT INTO `orders_pending` (`order_id`, `user_id`, `invoice`, `product_id`, `quantity`, `order_status`) VALUES
(3, 5, 1506772736, 2, 1, 'pending'),
(4, 5, 504128776, 2, 5, 'pending'),
(5, 5, 445467390, 2, 1, 'pending'),
(6, 10, 2034642899, 8, 1, 'pending'),
(7, 11, 1693211171, 3, 3, 'pending'),
(8, 12, 1729969307, 2, 2, 'pending'),
(9, 14, 1936659888, 3, 2, 'pending');

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

DROP TABLE IF EXISTS `payments`;
CREATE TABLE IF NOT EXISTS `payments` (
  `pay_id` int NOT NULL AUTO_INCREMENT,
  `order_id` int NOT NULL,
  `invoice` int NOT NULL,
  `pay_mode` varchar(250) NOT NULL,
  `pay_date` timestamp NOT NULL,
  PRIMARY KEY (`pay_id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `payments`
--

INSERT INTO `payments` (`pay_id`, `order_id`, `invoice`, `pay_mode`, `pay_date`) VALUES
(4, 13, 2034642899, 'JAZZ CASH', '2023-09-21 15:18:19'),
(3, 11, 504128776, 'JAZZ CASH', '2023-09-21 09:02:33'),
(5, 14, 1693211171, 'EASYPAISA', '2023-09-24 13:53:30'),
(6, 15, 1729969307, 'JAZZ CASH', '2023-10-08 16:23:28'),
(7, 16, 1936659888, 'EASYPAISA', '2023-11-18 13:16:53');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

DROP TABLE IF EXISTS `products`;
CREATE TABLE IF NOT EXISTS `products` (
  `pro_id` int NOT NULL AUTO_INCREMENT,
  `pro_name` varchar(100) NOT NULL,
  `pro_description` varchar(250) NOT NULL,
  `pro_keyword` varchar(250) NOT NULL,
  `cat_id` int NOT NULL,
  `brand_id` int NOT NULL,
  `pro_image1` varchar(500) NOT NULL,
  `pro_image2` varchar(500) NOT NULL,
  `pro_image3` varchar(500) NOT NULL,
  `pro_price` varchar(200) NOT NULL,
  `date` timestamp NOT NULL,
  `stutus` varchar(100) NOT NULL,
  PRIMARY KEY (`pro_id`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`pro_id`, `pro_name`, `pro_description`, `pro_keyword`, `cat_id`, `brand_id`, `pro_image1`, `pro_image2`, `pro_image3`, `pro_price`, `date`, `stutus`) VALUES
(3, 'shirts', 'long lasting shirts', 'very good shirts', 1, 1, 'upload/6507356006a56_hero.jpg', 'upload/6507356006a5b_led light2.jpeg', 'upload/6507356006a5d_led light3.jpeg', '10000', '2023-09-17 17:20:32', 'true'),
(2, 'neckless', 'long lasting shirts', 'shoes', 1, 1, 'upload/65071681545c3_lamp1.jpeg', 'upload/65071681545c7_led light2.jpeg', 'upload/65071681545c9_card1.jpg', '10000', '2023-09-17 15:08:49', 'true'),
(5, 'Mango', 'very tasty mangoes ', 'mangoes , fresh mangoes, fruit', 1, 1, 'upload/650bfb5cbfdc1_images (1).jpeg', 'upload/650bfb5cbfdc6_images.jpeg', 'upload/650bfb5cbfdc8_images.jpeg', '232', '2023-09-21 08:14:20', 'true'),
(6, 'shirts', 'long lasting shirts', 'very good shirts', 2, 2, 'upload/650bfb8d142d4_Slider1.jpg', 'upload/650bfb8d142da_welcome1.jpg', 'upload/650bfb8d142dc_Slider2.jpg', '500', '2023-09-21 08:15:09', 'true'),
(7, 'shirts', 'long lasting shirts', 'shoes', 2, 1, 'upload/650bffc5a07ac_Online Study.jpg', 'upload/650bffc5a07b0_Slider3.jpg', 'upload/650bffc5a07b2_Slider2.jpg', '500', '2023-09-21 08:33:09', 'true'),
(8, 'shoes', 'very nice', 'shoes', 1, 1, 'upload/650bffe0db6b0_Online Study.jpg', 'upload/650bffe0db6b4_third.1.jpg', 'upload/650bffe0db6b5_welcome.jpg', '500', '2023-09-21 08:33:36', 'true');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `user_id` int NOT NULL AUTO_INCREMENT,
  `user_name` varchar(100) NOT NULL,
  `user_email` varchar(250) NOT NULL,
  `user_address` varchar(250) NOT NULL,
  `user_password` varchar(500) NOT NULL,
  `user_contact` varchar(500) NOT NULL,
  `user_ip` varchar(500) NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=MyISAM AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `user_name`, `user_email`, `user_address`, `user_password`, `user_contact`, `user_ip`) VALUES
(14, 'yasir ali', 'yasir@gmail.com', 'orangi', '$2y$10$0OD.RZ8LJ.jjSMSe4tiKv.Kzm51EtdgF/9a4oUAWXaEZvrCs/PDSS', '03162668601', '::1'),
(13, '', '', '', '$2y$10$ThCBNFQKgoZ.WdGI5EqJx.JLzT79Ndj9dQQib3bTBeU3PbTdwN/Z2', '', '::1'),
(12, 'shahid', 'shahid@gmail.com', 'karachi', '$2y$10$Swt2AySh5wPyd2o3kY3xZudpyi3n6oyb9y8vSKwItEw/xw8lzRhsi', '00420524525', '::1'),
(11, 'yasir', 'admin@gmail.com', 'banaras', '$2y$10$AFVdGSEkZTXxOOszbWlnh.qxtrYEnngaXlpfCnxCTI4OllNEAtZWq', '03124567891', '::1');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
