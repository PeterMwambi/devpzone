-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 07, 2022 at 06:15 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 7.4.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `adeptdesigners.co.ke`
--

-- --------------------------------------------------------

--
-- Table structure for table `administrators`
--

CREATE TABLE `administrators` (
  `counter` int(11) NOT NULL,
  `admin_id` varchar(500) NOT NULL,
  `employee_id` varchar(500) NOT NULL,
  `username` varchar(500) NOT NULL,
  `profile_image` varchar(500) NOT NULL,
  `admin_email` varchar(500) NOT NULL,
  `password` varchar(500) NOT NULL,
  `date_added` varchar(500) NOT NULL,
  `day_added` varchar(500) NOT NULL,
  `time_added` varchar(500) NOT NULL,
  `last_seen` varchar(500) NOT NULL,
  `activity` varchar(500) NOT NULL,
  `status` varchar(500) NOT NULL,
  `last_updated` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `administrators`
--

INSERT INTO `administrators` (`counter`, `admin_id`, `employee_id`, `username`, `profile_image`, `admin_email`, `password`, `date_added`, `day_added`, `time_added`, `last_seen`, `activity`, `status`, `last_updated`) VALUES
(1, '6CFB9CAD3FE', '62863BECD0628', 'Admin', '', 'admin@adeptdesigners.co.ke', '$2y$10$2UNH5cEcaKLU9oozboH7ku6oWZ.gdm8WrKDQNcbfLfQnYVPWS1l.a', '07/06/2022', 'Tuesday', '9:09AM', 'Tuesday, 07/06/2022 at 9:14AM', '{\"date\":\"Tuesday, 07\\/06\\/2022\",\"time\":\"9:14AM\"}', 'active', '');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `counter` int(11) NOT NULL,
  `category_id` varchar(500) NOT NULL,
  `category_icon` varchar(500) NOT NULL,
  `category_name` varchar(500) NOT NULL,
  `gender` varchar(500) NOT NULL,
  `category_description` varchar(500) NOT NULL,
  `date_added` varchar(500) NOT NULL,
  `time_added` varchar(500) NOT NULL,
  `day_added` varchar(500) NOT NULL,
  `date_updated` varchar(500) NOT NULL,
  `time_updated` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`counter`, `category_id`, `category_icon`, `category_name`, `gender`, `category_description`, `date_added`, `time_added`, `day_added`, `date_updated`, `time_updated`) VALUES
(31, '6283FE4E3CCCF', 'pants.png', 'Men Trousers and Jeans', 'Male', ' Consist of men trousers and jeans', '17/05/2022', '10:58PM', 'Tuesday', '07/06/2022', '9:22AM'),
(32, '6284A5EF78CA1', 'denim-jacket.png', 'Men Coats and Jackets', 'Male', ' Consist of men coats suits and jackets. The perfect wear for cold weather', '18/05/2022', '10:53AM', 'Wednesday', '07/06/2022', '9:28AM'),
(33, '6284A688CB50A', 'suit.png', 'Men Executive Wear', 'Male', 'Consist of men executive wear', '18/05/2022', '10:55AM', 'Wednesday', '', ''),
(34, '629EF0673A036', 'shirt(1).png', 'Men Shirts, Tshirts, Vests', 'Male', ' Consist of men shirts t-shirts and vests', '07/06/2022', '9:29AM', 'Tuesday', '', ''),
(35, '629EF0A92CE58', 'shorts.png', 'Men Shorts and Sweat Pants', 'Male', ' Consist of men shorts and sweatpants', '07/06/2022', '9:31AM', 'Tuesday', '', ''),
(36, '629EF0E1C683F', 'sweater.png', 'Men Sweaters, Pullovers and Cardigans', 'Male', ' Consist of men sweaters pullovers and cardigans', '07/06/2022', '9:32AM', 'Tuesday', '', ''),
(37, '629EF118593D8', 'hoodie.png', 'Men Jumpers, Hoodie', 'Male', ' Consist of men jumpers and hoodie', '07/06/2022', '9:32AM', 'Tuesday', '', ''),
(38, '629EF15358840', 'diamond.png', 'Men Jewellery', 'Male', ' Consist of men jewellery', '07/06/2022', '9:33AM', 'Tuesday', '', ''),
(39, '629EF196C2D89', 'belt.png', 'Men Accessories and Costume', 'Male', ' Consist of men accessories and costumes', '07/06/2022', '9:35AM', 'Tuesday', '', ''),
(40, '629EF1CAD7E16', 'boxers.png', 'Men Underpants and Underwear', 'Male', ' Consist of men underpants and underwear', '07/06/2022', '9:35AM', 'Tuesday', '', ''),
(41, '629EF2AFEEC46', 'dress.png', 'Women Dresses, Skirts', 'Female', ' Consist of women dresses and skirts', '07/06/2022', '9:39AM', 'Tuesday', '', ''),
(42, '629EF312C8EEE', 'pants(2).png', 'Women Trousers and Jeans', 'Female', ' Consist of women trousers and ', '07/06/2022', '9:41AM', 'Tuesday', '', ''),
(43, '629EF3CDD4B8F', 'trench-coat(1).png', 'Women coats, blazers and suits', 'Female', ' Consist of women coats, blazers and suits', '07/06/2022', '9:44AM', 'Tuesday', '', ''),
(44, '629EF40988C42', 'crop-top.png', 'Women T-shirts, Tanktops', 'Female', ' Consist of women t-shirts and tank tops', '07/06/2022', '9:45AM', 'Tuesday', '', ''),
(45, '629EF4461A402', 'bra.png', 'Women Bra, Innerwear', 'Female', ' Consist of women bra and innerwear', '07/06/2022', '9:46AM', 'Tuesday', '', ''),
(46, '629EF48FB422F', 'handbag.png', 'Women bags, handbags', 'Female', ' Consist of women bags and handbags', '07/06/2022', '9:47AM', 'Tuesday', '', ''),
(47, '629EF4D86C97C', 'swimming-suit.png', 'Women Costume and Accessories', 'Female', ' Consist of women costume and accessories', '07/06/2022', '9:48AM', 'Tuesday', '', ''),
(48, '629EF5262380C', 'jumper(1).png', 'Women Jumpers and Hoodie', 'Female', ' Consist of women jumpers and hoodie', '07/06/2022', '9:50AM', 'Tuesday', '', ''),
(49, '629EF562DA4AF', 'woman-clothes.png', 'Women Blouse, Shirts', 'Female', ' Consist of women blouse and shirts', '07/06/2022', '9:51AM', 'Tuesday', '', ''),
(50, '629EF73039EFD', 'necklace.png', 'Women Jewellery', 'Female', ' Consist of women Jewellery', '07/06/2022', '9:58AM', 'Tuesday', '', ''),
(51, '629EF7741CDC9', 'shorts(1).png', 'Women Shorts, Pants', 'Female', ' Consist of women shorts and pants', '07/06/2022', '10:00AM', 'Tuesday', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `counter` int(11) NOT NULL,
  `comment_id` varchar(500) NOT NULL,
  `name` varchar(50) NOT NULL,
  `message` varchar(500) NOT NULL,
  `stars` varchar(11) DEFAULT NULL,
  `date_posted` varchar(50) DEFAULT NULL,
  `day_posted` varchar(50) NOT NULL,
  `time_posted` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `counter` int(11) NOT NULL,
  `customer_id` varchar(500) NOT NULL,
  `customer_name` varchar(50) NOT NULL,
  `phone_number` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `county_id` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `employees`
--

CREATE TABLE `employees` (
  `counter` int(11) NOT NULL,
  `employee_id` varchar(500) NOT NULL,
  `firstname` varchar(500) NOT NULL,
  `middlename` varchar(500) NOT NULL COMMENT 'surname',
  `lastname` varchar(500) NOT NULL,
  `selected_name` varchar(500) NOT NULL,
  `gender` varchar(500) NOT NULL,
  `date_of_birth` varchar(500) NOT NULL,
  `nationality` varchar(500) NOT NULL,
  `national_id` varchar(500) NOT NULL,
  `city` varchar(500) NOT NULL,
  `county` varchar(500) NOT NULL,
  `residence` varchar(500) NOT NULL,
  `phone_number` varchar(500) NOT NULL,
  `current_email` varchar(500) NOT NULL,
  `marital_status` varchar(500) NOT NULL,
  `role` varchar(500) NOT NULL,
  `salary` varchar(500) NOT NULL,
  `date_added` varchar(500) NOT NULL,
  `day_added` varchar(500) NOT NULL,
  `time_added` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `employees`
--

INSERT INTO `employees` (`counter`, `employee_id`, `firstname`, `middlename`, `lastname`, `selected_name`, `gender`, `date_of_birth`, `nationality`, `national_id`, `city`, `county`, `residence`, `phone_number`, `current_email`, `marital_status`, `role`, `salary`, `date_added`, `day_added`, `time_added`) VALUES
(13, '626E705512049', 'Peter', 'Mwasagua', 'Mwambi', 'lastname', 'Male', '11/05/1997', 'Kenyan', '44352336', '', '', '', '0700521889', 'calebmwambi@gmail.com', 'Single', 'System Administrator', '50000', '01/May/2022', 'Sunday', '2:34PM'),
(14, '62714B75ED3B3', 'Anonymous', 'Employee', 'Employee', 'lastname', 'Male', '12/05/1997', 'Kenyan', '37458912', '', '', '', '0702123456', 'mail@anonymous.com', 'Single', 'Cashier', '20000', '03/May/2022', 'Tuesday', '6:34PM'),
(30, '62863BECD0628', 'Peter', 'Mwasagua', 'Mwambi', 'lastname', 'Male', '20/05/1997', 'Kenyan', '37999565', 'Nairobi', 'Nairobi', 'Juja', '0114958431', 'mwambi@gmail.com', 'Single', 'System Administrator', '50000', '19/May/2022', 'Thursday', '3:54PM');

-- --------------------------------------------------------

--
-- Table structure for table `employee_account`
--

CREATE TABLE `employee_account` (
  `counter` int(11) NOT NULL,
  `employee_id` varchar(500) NOT NULL,
  `username` varchar(500) NOT NULL,
  `profile_image` varchar(500) NOT NULL,
  `work_email` varchar(500) NOT NULL,
  `bank_account_no` varchar(500) NOT NULL,
  `bank` varchar(500) NOT NULL,
  `salary_paid` varchar(500) NOT NULL,
  `payment_method` varchar(500) NOT NULL,
  `postal_address` varchar(500) NOT NULL,
  `password` varchar(500) NOT NULL,
  `status` varchar(500) NOT NULL,
  `date_added` varchar(500) NOT NULL,
  `day_added` varchar(500) NOT NULL,
  `time_added` varchar(500) NOT NULL,
  `last_seen` varchar(500) NOT NULL,
  `date_activated` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `employee_account`
--

INSERT INTO `employee_account` (`counter`, `employee_id`, `username`, `profile_image`, `work_email`, `bank_account_no`, `bank`, `salary_paid`, `payment_method`, `postal_address`, `password`, `status`, `date_added`, `day_added`, `time_added`, `last_seen`, `date_activated`) VALUES
(10, '626E705512049', 'Peter Mwambi', '', 'mwambi@adeptdesigners.co.ke', '', '', '', '', '', '$2y$10$M5jhpXIUTj6stZ008fwjJOJxSJ8Eh37mPYyDcby2EKAWZsI4GoHum', 'not active', '', '', '', 'Sunday, 01/05/2022 2:34PM', 'Not yet activated'),
(11, '62714B75ED3B3', 'Anonymous Employee', '', 'employee@adeptdesigners.co.ke', '', '', '', '', '', '$2y$10$U.uoIPKZTHl0rj8mh8NxBOtbmoO8JY3PDJqiDr9AETieBXR3FU1ce', 'not active', '', '', '', 'Tuesday, 03/05/2022 6:34PM', 'Not yet activated'),
(18, '62863BECD0628', 'Admin', 'yogendra-singh-HrpYHchKb5Y-unsplash.jpg', '', '974312277531', 'KCB', '30,000', 'Mpesa Paybill to Employees Phone Number', '', '$2y$10$uJice/6d/VGMjjt2/Xh1QeZwhPQUm7zOsgykafeQMPmb0vudVIV9i', 'not active', '19/May/2022', 'Thursday', '3:54PM', 'Thursday, 19/05/2022 3:54PM', 'Not yet activated');

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `counter` int(11) NOT NULL,
  `message_id` varchar(500) NOT NULL,
  `sender` varchar(100) NOT NULL,
  `email` varchar(50) NOT NULL,
  `message` varchar(500) NOT NULL,
  `date_posted` varchar(50) NOT NULL,
  `time_posted` varchar(50) NOT NULL,
  `day_posted` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `counter` int(11) NOT NULL,
  `order_id` varchar(500) NOT NULL,
  `customer_id` varchar(50) NOT NULL,
  `order_date` varchar(50) NOT NULL,
  `order_day` varchar(50) NOT NULL,
  `order_time` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `order_details`
--

CREATE TABLE `order_details` (
  `counter` int(11) NOT NULL,
  `order_details_id` varchar(500) NOT NULL,
  `order_id` varchar(500) NOT NULL,
  `product_id` varchar(500) NOT NULL,
  `quantity` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `counter` int(11) NOT NULL,
  `product_id` varchar(500) NOT NULL,
  `supplier_id` varchar(500) NOT NULL,
  `purchase_id` varchar(500) NOT NULL,
  `product_name` varchar(500) NOT NULL,
  `category_id` varchar(500) NOT NULL,
  `sub_category_id` varchar(500) NOT NULL,
  `date_added` varchar(500) NOT NULL,
  `time_added` varchar(500) NOT NULL,
  `day_added` varchar(500) NOT NULL,
  `date_updated` varchar(500) NOT NULL,
  `time_updated` varchar(500) NOT NULL,
  `field_status` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`counter`, `product_id`, `supplier_id`, `purchase_id`, `product_name`, `category_id`, `sub_category_id`, `date_added`, `time_added`, `day_added`, `date_updated`, `time_updated`, `field_status`) VALUES
(31, '628494B77E505', '6278AD1157947', '628494CE38529', 'Men Brown Khaki Trousers', '6283FE4E3CCCF', '6283FF7E59562', '07/06/2022', '2:47PM', 'Tuesday', 'Tuesday, 07/06/2022', '2:47PM', '');

-- --------------------------------------------------------

--
-- Table structure for table `product_details`
--

CREATE TABLE `product_details` (
  `counter` int(11) NOT NULL,
  `product_id` varchar(500) NOT NULL,
  `product_image` varchar(50) NOT NULL,
  `product_description` varchar(500) NOT NULL,
  `market_price` varchar(500) NOT NULL,
  `discounted_price` varchar(500) NOT NULL,
  `status` varchar(50) NOT NULL,
  `field_status` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product_details`
--

INSERT INTO `product_details` (`counter`, `product_id`, `product_image`, `product_description`, `market_price`, `discounted_price`, `status`, `field_status`) VALUES
(9, '628494B77E505', 'brownKhaki.png', '{\"product-description\":\"Consist of men khaki trousers\",\"product-features\":\"Main Material:cotton\\r\\nSize:42, 43, 44, 45\"}', '2500', '1500', 'Avilable', '');

-- --------------------------------------------------------

--
-- Table structure for table `purchases`
--

CREATE TABLE `purchases` (
  `counter` int(11) NOT NULL,
  `purchase_id` varchar(500) NOT NULL,
  `supplier_id` varchar(500) NOT NULL,
  `product_id` varchar(500) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `amount_paid` varchar(500) NOT NULL,
  `balance` varchar(500) NOT NULL,
  `payment_method` varchar(500) NOT NULL,
  `transaction_id` varchar(500) NOT NULL,
  `payment_status` varchar(500) NOT NULL,
  `date_added` varchar(500) NOT NULL,
  `day_added` varchar(500) NOT NULL,
  `time_added` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `purchases`
--

INSERT INTO `purchases` (`counter`, `purchase_id`, `supplier_id`, `product_id`, `amount_paid`, `balance`, `payment_method`, `transaction_id`, `payment_status`, `date_added`, `day_added`, `time_added`) VALUES
(25, '62825C16D2736', '6278AD1157947', '628246F4B3EF7', '600', 'nill', 'Cash', 'n/a', 'Verified', '16/05/2022', 'Monday', '5:13PM'),
(26, '62829DB796594', '6278AD1157947', '62828CC0DD449', '600', 'nill', 'Cash', 'n/a', 'Verified', '16/05/2022', 'Monday', '9:53PM'),
(30, '6283E4AFF3A8B', '6278AD1157947', '62839988E0679', '600', 'nill', 'Cash', 'n/a', 'Pending', '17/05/2022', 'Tuesday', '9:08PM'),
(31, '628494CE38529', '6278AD1157947', '628494B77E505', '600', 'nill', 'Cash', 'n/a', 'Verified', '18/05/2022', 'Wednesday', '9:40AM');

-- --------------------------------------------------------

--
-- Table structure for table `replies`
--

CREATE TABLE `replies` (
  `counter` int(11) NOT NULL,
  `reply_id` varchar(500) NOT NULL,
  `message_id` varchar(500) NOT NULL,
  `message` varchar(1000) NOT NULL,
  `replied_by` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `date_posted` varchar(50) NOT NULL,
  `day_posted` varchar(50) NOT NULL,
  `time_posted` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `sales`
--

CREATE TABLE `sales` (
  `counter` int(11) NOT NULL,
  `sales_id` varchar(500) NOT NULL,
  `customer_id` varchar(500) NOT NULL,
  `product_id` varchar(500) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `total_price` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `subscriptions`
--

CREATE TABLE `subscriptions` (
  `id` int(11) NOT NULL,
  `date_created` date NOT NULL DEFAULT current_timestamp(),
  `time` time NOT NULL DEFAULT current_timestamp(),
  `email` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `sub_category`
--

CREATE TABLE `sub_category` (
  `counter` int(11) NOT NULL,
  `sub_category_id` varchar(500) NOT NULL,
  `category_id` varchar(500) NOT NULL,
  `sub_category_name` varchar(500) NOT NULL,
  `sub_category_icon` varchar(500) NOT NULL,
  `sub_category_description` varchar(500) NOT NULL,
  `date_added` varchar(500) NOT NULL,
  `time_added` varchar(500) NOT NULL,
  `day_added` varchar(500) NOT NULL,
  `date_updated` varchar(500) NOT NULL,
  `time_updated` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sub_category`
--

INSERT INTO `sub_category` (`counter`, `sub_category_id`, `category_id`, `sub_category_name`, `sub_category_icon`, `sub_category_description`, `date_added`, `time_added`, `day_added`, `date_updated`, `time_updated`) VALUES
(26, '6283FF7E59562', '6283FE4E3CCCF', 'Men Trousers', 'trousers.png', 'Consist of men trousers', '17/05/2022', '11:03PM', 'Tuesday', '', ''),
(27, '6284A70827953', '6284A688CB50A', 'Men Suits', 'suit.png', 'Consist of men suits', '18/05/2022', '10:58AM', 'Wednesday', '', ''),
(28, '6284A74029A40', '629EF0673A036', 'Men Long Sleeved Shirts', 'shirt(1).png', '   Consist of men long sleeved shirts', '18/05/2022', '10:58AM', 'Wednesday', '07/06/2022', '10:05AM'),
(29, '6284A8BE7D2AC', '6283FE4E3CCCF', 'Men Denim Jeans', 'pants.png', 'Consist of men denim jeans', '18/05/2022', '11:05AM', 'Wednesday', '', ''),
(30, '629EFBDC73DA4', '629EF0673A036', 'Men Short Sleeved Shirts', 'short-sleeves.png', ' Consist of men short sleeved shirts', '07/06/2022', '10:18AM', 'Tuesday', '', ''),
(31, '629EFCE5E258A', '629EF0673A036', 'Men Long Sleeved Tshirt', 'sleeves.png', 'Consist of men long sleeved tshirts', '07/06/2022', '10:23AM', 'Tuesday', '', ''),
(32, '629EFD24BD828', '629EF0673A036', 'Men Short Sleeved Tshirts', 't-shirt.png', ' Consist of men short sleeved tshirts', '07/06/2022', '10:24AM', 'Tuesday', '', ''),
(33, '629F1ABA88CC6', '629EF0673A036', 'Men Hawaaian Shirts', 'shirt.png', ' Consist of men hawaaian shirts', '07/06/2022', '12:30PM', 'Tuesday', '', ''),
(34, '629F2E5B099B9', '629EF0673A036', 'Men Sport Tshirts', 'tshirt2.png', ' Consist of men sport tshirts', '07/06/2022', '1:54PM', 'Tuesday', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `suppliers`
--

CREATE TABLE `suppliers` (
  `counter` int(11) NOT NULL,
  `supplier_id` varchar(500) NOT NULL,
  `profile_image` varchar(500) NOT NULL,
  `supplier_name` varchar(500) NOT NULL,
  `company` varchar(500) NOT NULL,
  `phone_number` varchar(500) NOT NULL,
  `suppliers_email` varchar(500) NOT NULL,
  `website` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `suppliers`
--

INSERT INTO `suppliers` (`counter`, `supplier_id`, `profile_image`, `supplier_name`, `company`, `phone_number`, `suppliers_email`, `website`) VALUES
(13, '6278ACEF0EF3F', '', 'Nairobi Fashion House', 'Nairobi Fashion House', '0745634234', 'info@nairobifashionhouse.co.ke', 'https://nairobifashionhouse.co.ke'),
(14, '6278AD1157947', '', 'Jinnel Collections', 'Jinnel Collections', '0724555445', 'info@jinnelcollections.co.ke', 'https://jinnelcollections.co.ke'),
(20, '6284A36A1FF62', '', 'Nike Kenya', 'Nike', '0702123456', '', 'https://nike.com'),
(21, '6284A56B682A9', 'adidas.png', 'Adidas Kenya', 'Addidas', '0720521998', 'info@addidas.co.ke', 'https://addidas.com');

-- --------------------------------------------------------

--
-- Table structure for table `supplier_activity`
--

CREATE TABLE `supplier_activity` (
  `counter` int(11) NOT NULL,
  `supplier_activity_id` varchar(500) NOT NULL,
  `supplier_id` varchar(500) NOT NULL,
  `product_id` varchar(500) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `purchase_id` varchar(500) NOT NULL,
  `payment_status` varchar(500) NOT NULL,
  `date_added` varchar(500) NOT NULL,
  `day_added` varchar(500) NOT NULL,
  `time_added` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `supplier_activity`
--

INSERT INTO `supplier_activity` (`counter`, `supplier_activity_id`, `supplier_id`, `product_id`, `purchase_id`, `payment_status`, `date_added`, `day_added`, `time_added`) VALUES
(12, '62825C16D273D', '6278AD1157947', '628246F4B3EF7', '62825C16D2736', 'Verified', '16/05/2022', 'Monday', '5:13PM'),
(13, '62828CC0DD442', '6278AD1157947', '62828CC0DD449', '62828CC0DD437', 'Verified', '16/05/2022', 'Monday', '8:41PM'),
(14, '628291857E127', '6278AD1157947', '62828CC0DD449', '628291857E115', 'Verified', '16/05/2022', 'Monday', '9:01PM'),
(15, '6282918E9C94E', '6278AD1157947', '62828CC0DD449', '6282918E9C944', 'Verified', '16/05/2022', 'Monday', '9:01PM'),
(16, '628291C377AC7', '6278AD1157947', '62828CC0DD449', '628291C377ABF', 'Verified', '16/05/2022', 'Monday', '9:02PM'),
(17, '628292150162C', '6278AD1157947', '62828CC0DD449', '6282921501626', 'Verified', '16/05/2022', 'Monday', '9:04PM'),
(18, '6282923C8DBB7', '6278AD1157947', '62828CC0DD449', '6282923C8DBAB', 'Verified', '16/05/2022', 'Monday', '9:04PM'),
(19, '628292C6C72B3', '6278AD1157947', '62828CC0DD449', '628292C6C72A9', 'Verified', '16/05/2022', 'Monday', '9:07PM'),
(20, '628293558D185', '6278AD1157947', '62828CC0DD449', '628293558D17F', 'Verified', '16/05/2022', 'Monday', '9:09PM'),
(21, '628297B448F62', '6278AD1157947', '62828CC0DD449', '628297B448F54', 'Verified', '16/05/2022', 'Monday', '9:28PM'),
(22, '62829DB7965A0', '6278AD1157947', '62828CC0DD449', '62829DB796594', 'Verified', '16/05/2022', 'Monday', '9:53PM'),
(23, '6283998BC9F1C', '6278AD1157947', '62839988E0679', '6283998BC9F16', 'Verified', '17/05/2022', 'Tuesday', '3:48PM'),
(24, '6283E4AE90EA2', '6278AD1157947', '62839988E0679', '6283E4AE90E93', 'Pending', '17/05/2022', 'Tuesday', '9:08PM'),
(25, '6283E4AFF3A9C', '6278AD1157947', '62839988E0679', '6283E4AFF3A8B', 'Pending', '17/05/2022', 'Tuesday', '9:08PM'),
(26, '628494CE38530', '6278AD1157947', '628494B77E505', '628494CE38529', 'Verified', '18/05/2022', 'Wednesday', '9:40AM');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `counter` int(11) NOT NULL,
  `user_id` varchar(500) NOT NULL,
  `username` varchar(500) NOT NULL,
  `firstname` varchar(500) NOT NULL,
  `lastname` varchar(500) NOT NULL,
  `email` varchar(500) NOT NULL,
  `phone_number` varchar(500) NOT NULL,
  `password` varchar(500) NOT NULL,
  `date_added` varchar(500) NOT NULL,
  `day_added` varchar(500) NOT NULL,
  `time_added` varchar(500) NOT NULL,
  `activity` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL CHECK (json_valid(`activity`))
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `administrators`
--
ALTER TABLE `administrators`
  ADD PRIMARY KEY (`counter`,`admin_id`),
  ADD UNIQUE KEY `employee_id` (`employee_id`),
  ADD UNIQUE KEY `admin_email` (`admin_email`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`counter`,`category_id`),
  ADD UNIQUE KEY `Category Name` (`category_name`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`counter`,`comment_id`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`counter`,`customer_id`);

--
-- Indexes for table `employees`
--
ALTER TABLE `employees`
  ADD PRIMARY KEY (`counter`,`employee_id`);

--
-- Indexes for table `employee_account`
--
ALTER TABLE `employee_account`
  ADD PRIMARY KEY (`counter`,`employee_id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`counter`,`message_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`counter`,`order_id`),
  ADD UNIQUE KEY `customer_id` (`customer_id`);

--
-- Indexes for table `order_details`
--
ALTER TABLE `order_details`
  ADD PRIMARY KEY (`counter`,`order_details_id`),
  ADD UNIQUE KEY `order_id` (`order_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`counter`,`product_id`);

--
-- Indexes for table `product_details`
--
ALTER TABLE `product_details`
  ADD PRIMARY KEY (`counter`,`product_id`),
  ADD UNIQUE KEY `product_id` (`product_id`);

--
-- Indexes for table `purchases`
--
ALTER TABLE `purchases`
  ADD PRIMARY KEY (`counter`,`purchase_id`),
  ADD UNIQUE KEY `product_id` (`product_id`);

--
-- Indexes for table `replies`
--
ALTER TABLE `replies`
  ADD PRIMARY KEY (`counter`,`reply_id`),
  ADD UNIQUE KEY `message_id` (`message_id`);

--
-- Indexes for table `sales`
--
ALTER TABLE `sales`
  ADD PRIMARY KEY (`counter`,`sales_id`),
  ADD UNIQUE KEY `customer_id` (`customer_id`);

--
-- Indexes for table `subscriptions`
--
ALTER TABLE `subscriptions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email_address` (`email`);

--
-- Indexes for table `sub_category`
--
ALTER TABLE `sub_category`
  ADD PRIMARY KEY (`counter`,`sub_category_id`),
  ADD UNIQUE KEY `Sub Category Name` (`sub_category_name`);

--
-- Indexes for table `suppliers`
--
ALTER TABLE `suppliers`
  ADD PRIMARY KEY (`counter`,`supplier_id`);

--
-- Indexes for table `supplier_activity`
--
ALTER TABLE `supplier_activity`
  ADD PRIMARY KEY (`counter`,`supplier_activity_id`),
  ADD UNIQUE KEY `purchase_id` (`purchase_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`counter`,`user_id`),
  ADD UNIQUE KEY `username` (`username`,`email`,`phone_number`) USING HASH;

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `administrators`
--
ALTER TABLE `administrators`
  MODIFY `counter` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `counter` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `counter` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `employees`
--
ALTER TABLE `employees`
  MODIFY `counter` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `employee_account`
--
ALTER TABLE `employee_account`
  MODIFY `counter` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `counter` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `counter` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `order_details`
--
ALTER TABLE `order_details`
  MODIFY `counter` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `counter` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `product_details`
--
ALTER TABLE `product_details`
  MODIFY `counter` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `purchases`
--
ALTER TABLE `purchases`
  MODIFY `counter` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `sales`
--
ALTER TABLE `sales`
  MODIFY `counter` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `subscriptions`
--
ALTER TABLE `subscriptions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `sub_category`
--
ALTER TABLE `sub_category`
  MODIFY `counter` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `suppliers`
--
ALTER TABLE `suppliers`
  MODIFY `counter` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `supplier_activity`
--
ALTER TABLE `supplier_activity`
  MODIFY `counter` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `counter` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
