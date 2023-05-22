-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: May 22, 2023 at 06:06 AM
-- Server version: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `moderncart`
--

-- --------------------------------------------------------

--
-- Table structure for table `category_info`
--

CREATE TABLE IF NOT EXISTS `category_info` (
  `cat_id` int(11) NOT NULL AUTO_INCREMENT,
  `cat_name` varchar(40) NOT NULL,
  `cat_dname` varchar(40) NOT NULL,
  `image_path` text NOT NULL,
  `cat_type` varchar(10) NOT NULL,
  `cat_parent_id` int(11) NOT NULL,
  `reg_date` date NOT NULL,
  PRIMARY KEY (`cat_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `category_info`
--

INSERT INTO `category_info` (`cat_id`, `cat_name`, `cat_dname`, `image_path`, `cat_type`, `cat_parent_id`, `reg_date`) VALUES
(2, 'Electronics', 'Electronics', 'download_1684555455.jpg', 'Primary', 0, '2023-05-20'),
(3, 'Furniture', 'Furniture', '1681103064_images (76).jpeg', 'Primary', 0, '2023-05-20'),
(4, 'Shoes', 'Shoes', '1681191317_shoe 3_1684555536.jpg', 'Primary', 0, '2023-05-20'),
(5, 'Mobile', 'Mobile', '1681188323_iphone_1684555792.jpg', 'Secondary', 2, '2023-05-20'),
(6, 'Airdopes', 'Airdopes', '1681191196_earphone_1684724858.jpg', 'Secondary', 2, '2023-05-22'),
(7, 'Watch', 'Watch', 'watch_1684724978.jpg', 'Secondary', 2, '2023-05-22'),
(8, 'Ornaments', 'Ornaments', 'diamond3_1684725054.jpg', 'Primary', 0, '2023-05-22'),
(9, 'Samsung Mobile', 'Samsung', 'mobile 2_1684725957.jpg', 'Secondary', 5, '2023-05-22');

-- --------------------------------------------------------

--
-- Table structure for table `customer_info`
--

CREATE TABLE IF NOT EXISTS `customer_info` (
  `cust_id` int(11) NOT NULL AUTO_INCREMENT,
  `cust_name` varchar(30) NOT NULL,
  `cust_email` varchar(40) NOT NULL,
  `cust_mobile` varchar(22) NOT NULL,
  `user_name` varchar(20) NOT NULL,
  `user_pass` varchar(20) NOT NULL,
  `user_type` varchar(5) NOT NULL,
  `reg_date` date NOT NULL,
  PRIMARY KEY (`cust_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `customer_info`
--

INSERT INTO `customer_info` (`cust_id`, `cust_name`, `cust_email`, `cust_mobile`, `user_name`, `user_pass`, `user_type`, `reg_date`) VALUES
(1, 'ram kumar sharma', 'ram@gmail.com', '78788789', 'ram', 'r', 'user', '2023-05-19'),
(2, 'Soyab', 'soyab@gmail.com', '998983487', 'a', 'a', 'admin', '2023-05-01');

-- --------------------------------------------------------

--
-- Table structure for table `item_info`
--

CREATE TABLE IF NOT EXISTS `item_info` (
  `item_id` int(11) NOT NULL AUTO_INCREMENT,
  `item_name` varchar(40) NOT NULL,
  `image_path` text NOT NULL,
  `cat_parent_id` int(11) NOT NULL,
  `item_rate` float NOT NULL,
  `item_discount` float NOT NULL,
  `item_detail` text NOT NULL,
  `reg_date` date NOT NULL,
  PRIMARY KEY (`item_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `item_info`
--

INSERT INTO `item_info` (`item_id`, `item_name`, `image_path`, `cat_parent_id`, `item_rate`, `item_discount`, `item_detail`, `reg_date`) VALUES
(1, 'Adidas 56', '1681191354_nike 1_1684724650.jpg', 4, 2000, 10, 'Sports Shoes , Soft, Power ', '2023-05-22'),
(2, 'IPhone 13', 'iphone_1684725294.jpg', 5, 200000, 10, 'Premium Quality phone with high security', '2023-05-22'),
(3, 'Titan Watch', 'Watch2_1684725343.jpg', 7, 5000, 5, 'Reliable and water resistant', '2023-05-22'),
(4, 'DELL Laptop Charger 65W', 'laptop_charger__1684725428.jpg', 2, 1000, 0, 'Fast Charging', '2023-05-22'),
(5, 'Samsung Note 2', 'iphone_1684725294.jpg', 9, 40000, 10, '64MP Back, 32MP Front, 128 GB Internal,6 inch display', '2023-05-22');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
