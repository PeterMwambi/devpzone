-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 28, 2022 at 07:14 PM
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
(1, '6CFB9CAD3FE', '62863BECD0628', 'Admin', 'menBlackMonclerJacket.jpg', 'admin@adeptdesigners.co.ke', '$2y$10$2UNH5cEcaKLU9oozboH7ku6oWZ.gdm8WrKDQNcbfLfQnYVPWS1l.a', '07/06/2022', 'Tuesday', '9:09AM', 'Tuesday, 28/06/2022 at 5:21AM', '{\"date\":\"Tuesday, 28\\/06\\/2022\",\"time\":\"5:21AM\"}', 'active', '');

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
(35, '629EF0A92CE58', 'shorts.png', 'Men Shorts, Sweat Pants', 'Male', '  Consist of men shorts and sweatpants', '07/06/2022', '9:31AM', 'Tuesday', '27/06/2022', '9:13AM'),
(36, '629EF0E1C683F', 'sweater.png', 'Men Sweaters and Cardigans', 'Male', '  Consist of men sweaters pullovers and cardigans', '07/06/2022', '9:32AM', 'Tuesday', '14/06/2022', '10:04PM'),
(37, '629EF118593D8', 'hoodie.png', 'Men Jumpers, Hoodie', 'Male', ' Consist of men jumpers and hoodie', '07/06/2022', '9:32AM', 'Tuesday', '', ''),
(38, '629EF15358840', 'diamond.png', 'Men Jewellery', 'Male', ' Consist of men jewellery', '07/06/2022', '9:33AM', 'Tuesday', '', ''),
(39, '629EF196C2D89', 'belt.png', 'Men Accessories, Costume', 'Male', '  Consist of men accessories and costumes', '07/06/2022', '9:35AM', 'Tuesday', '14/06/2022', '10:08PM'),
(40, '629EF1CAD7E16', 'boxers.png', 'Men Underpants, Underwear', 'Male', '  Consist of men underpants and underwear', '07/06/2022', '9:35AM', 'Tuesday', '14/06/2022', '10:06PM'),
(41, '629EF2AFEEC46', 'dress.png', 'Women Dresses, Skirts', 'Female', ' Consist of women dresses and skirts', '07/06/2022', '9:39AM', 'Tuesday', '', ''),
(42, '629EF312C8EEE', 'pants(2).png', 'Women Trousers and Jeans', 'Female', ' Consist of women trousers and ', '07/06/2022', '9:41AM', 'Tuesday', '', ''),
(43, '629EF3CDD4B8F', 'trench-coat(1).png', 'Women Coats, Blazers, Suits', 'Female', '  Consist of women coats, blazers and suits', '07/06/2022', '9:44AM', 'Tuesday', '14/06/2022', '10:07PM'),
(44, '629EF40988C42', 'crop-top.png', 'Women T-shirts, Tanktops', 'Female', ' Consist of women t-shirts and tank tops', '07/06/2022', '9:45AM', 'Tuesday', '', ''),
(45, '629EF4461A402', 'bra.png', 'Women Bra, Innerwear', 'Female', ' Consist of women bra and innerwear', '07/06/2022', '9:46AM', 'Tuesday', '', ''),
(46, '629EF48FB422F', 'handbag.png', 'Women bags, handbags', 'Female', ' Consist of women bags and handbags', '07/06/2022', '9:47AM', 'Tuesday', '', ''),
(47, '629EF4D86C97C', 'swimming-suit.png', 'Women Accessories, Costume', 'Female', '   Consist of women costume and accessories', '07/06/2022', '9:48AM', 'Tuesday', '14/06/2022', '10:08PM'),
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
  `user_id` varchar(500) NOT NULL,
  `customer_name` varchar(500) NOT NULL,
  `national_id` varchar(500) NOT NULL,
  `phone_number` varchar(500) NOT NULL,
  `customer_email` varchar(500) NOT NULL,
  `residence` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`counter`, `customer_id`, `user_id`, `customer_name`, `national_id`, `phone_number`, `customer_email`, `residence`) VALUES
(51, '62B619A1A039C', '62B05B8CE5EAB', 'Peter Mwasagua', '37999565', '0700521998', 'pmwambi@gmail.com', 'Nairobi CBD'),
(53, '62B6DBCBD20EE', '62B05B8CE5EAB', 'Peter Mwasagua', '37999565', '0700521998', 'pmwambi@gmail.com', 'Nairobi CBD'),
(55, '62B6DDE75A22A', '62A85D2D1848B', 'Anonymous User', '36554673', '0114328117', 'anonymous@gmail.com', 'Nairobi CBD'),
(56, '62B6DDFFEF0EB', '62A86BB33A410', 'Caleb Mwambi', '38965477', '0114258354', 'calebmwambi@gmail.com', 'Nairobi CBD');

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
(18, '62863BECD0628', 'Admin', 'app.png', '', '974312277531', 'KCB', '30,000', 'Mpesa Paybill to Employees Phone Number', '', '$2y$10$uJice/6d/VGMjjt2/Xh1QeZwhPQUm7zOsgykafeQMPmb0vudVIV9i', 'not active', '19/May/2022', 'Thursday', '3:54PM', 'Thursday, 19/05/2022 3:54PM', 'Not yet activated');

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
  `customer_id` varchar(500) NOT NULL,
  `user_id` varchar(500) NOT NULL,
  `date_added` varchar(500) NOT NULL,
  `day_added` varchar(500) NOT NULL,
  `time_added` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`counter`, `order_id`, `customer_id`, `user_id`, `date_added`, `day_added`, `time_added`) VALUES
(49, '62B619A1A03A0', '62B619A1A039C', '62B05B8CE5EAB', '24/Jun/2022', 'Friday', '11:08PM'),
(51, '62B6DBCBD20F6', '62B6DBCBD20EE', '62B05B8CE5EAB', '25/Jun/2022', 'Saturday', '12:56PM'),
(53, '62B6DDE75A22D', '62B6DDE75A22A', '62A85D2D1848B', '25/Jun/2022', 'Saturday', '1:05PM'),
(54, '62B6DDFFEF0F1', '62B6DDFFEF0EB', '62A86BB33A410', '25/Jun/2022', 'Saturday', '1:05PM');

-- --------------------------------------------------------

--
-- Table structure for table `order_details`
--

CREATE TABLE `order_details` (
  `counter` int(11) NOT NULL,
  `order_id` varchar(500) NOT NULL,
  `order_details` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL CHECK (json_valid(`order_details`)),
  `pickup_station` varchar(500) NOT NULL,
  `payment_status` varchar(500) NOT NULL,
  `amount_due` varchar(500) NOT NULL,
  `amount_paid` varchar(500) NOT NULL,
  `balance` varchar(500) NOT NULL,
  `payment_method` varchar(500) NOT NULL,
  `transaction_id` varchar(500) NOT NULL,
  `date_paid` varchar(500) NOT NULL,
  `day_paid` varchar(500) NOT NULL,
  `time_paid` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `order_details`
--

INSERT INTO `order_details` (`counter`, `order_id`, `order_details`, `pickup_station`, `payment_status`, `amount_due`, `amount_paid`, `balance`, `payment_method`, `transaction_id`, `date_paid`, `day_paid`, `time_paid`) VALUES
(49, '62B619A1A03A0', '[{\"id\":\"62A3488CDE695\",\"name\":\"Men Official Trousers - Brown\",\"price\":1000,\"quantity\":1,\"total_price\":1000},{\"id\":\"62A1FB52B8E14\",\"name\":\"Men Black Tshirts\",\"price\":600,\"quantity\":1,\"total_price\":600},{\"id\":\"62A34D30ED278\",\"name\":\"Men Black Outdoor Pants\",\"price\":1000,\"quantity\":1,\"total_price\":1000},{\"id\":\"628494B77E505\",\"name\":\"Men Brown Khaki Trousers\",\"price\":1500,\"quantity\":1,\"total_price\":1500}]', 'Nairobi CBD, Gill House', 'pending', '4100', '0', '4100', 'pending', 'pending', '', '', ''),
(51, '62B6DBCBD20F6', '[{\"id\":\"62A1FB52B8E14\",\"name\":\"Men Black Tshirts\",\"price\":600,\"quantity\":1,\"total_price\":600},{\"id\":\"62A34D30ED278\",\"name\":\"Men Black Outdoor Pants\",\"price\":1000,\"quantity\":1,\"total_price\":1000}]', 'Nairobi CBD, Gill House', 'pending', '1600', '0', '1600', 'pending', 'pending', '', '', ''),
(53, '62B6DDE75A22D', '[{\"id\":\"62A34D30ED278\",\"name\":\"Men Black Outdoor Pants\",\"price\":1000,\"quantity\":1,\"total_price\":1000}]', 'Nairobi CBD, Gill House', 'Verified', '1000', '1000', '0', 'Mpesa', 'QFQ9E6T5AF', '26/Jun/2022', 'Sunday', '4:15PM'),
(54, '62B6DDFFEF0F1', '[{\"id\":\"62A3488CDE695\",\"name\":\"Men Official Trousers - Brown\",\"price\":1000,\"quantity\":1,\"total_price\":1000}]', 'Nairobi CBD, Gill House', 'pending', '1000', '0', '1000', 'pending', 'pending', '', '', '');

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
(31, '628494B77E505', '6278AD1157947', '628494CE38529', 'Men Brown Khaki Trousers', '6283FE4E3CCCF', '6283FF7E59562', '07/06/2022', '2:47PM', 'Tuesday', 'Tuesday, 28/06/2022', '1:14PM', ''),
(32, '62A1FB52B8E14', '6278ACEF0EF3F', '62A1FB58EBD3C', 'Men Black Tshirts', '629EF0673A036', '629EFD24BD828', '24/06/2022', '9:21AM', 'Friday', 'Friday, 24/06/2022', '9:21AM', ''),
(33, '62A3488CDE695', '6278AD1157947', '62A34892A1ECC', 'Men Official Trousers - Brown', '6284A688CB50A', '6283FF7E59562', '27/06/2022', '9:21AM', 'Monday', 'Monday, 27/06/2022', '9:22AM', ''),
(34, '62A34D30ED278', '6278ACEF0EF3F', '62A34D3462A8A', 'Men Black Outdoor Pants', '6283FE4E3CCCF', '6283FF7E59562', '10/06/2022', '4:54PM', 'Friday', 'Tuesday, 28/06/2022', '2:05PM', ''),
(35, '62B93B74D88C6', '6278ACEF0EF3F', '62B93B9894DC5', 'Men Grey Shirt', '6284A688CB50A', '6284A74029A40', '28/06/2022', '5:24AM', 'Tuesday', 'Tuesday, 28/06/2022', '5:24AM', ''),
(36, '62B93C7FCFA78', '6278ACEF0EF3F', '62B93C7FCFA5F', 'Addidas Grey White Karate Tshirt', '629EF0673A036', '629EFD24BD828', '27/06/2022', '8:13AM', 'Monday', '', '', ''),
(37, '62B93D155E035', '6278ACEF0EF3F', '62B93D439CC95', 'Addidas Blue Karate Tshirt', '629EF0673A036', '629EFD24BD828', '27/06/2022', '8:16AM', 'Monday', '', '', ''),
(38, '62B93E0D04756', '6278ACEF0EF3F', '62B93E39F290B', 'Adiddas Grey Sport Tshirt', '629EF0673A036', '629EFD24BD828', '27/06/2022', '8:20AM', 'Monday', '', '', ''),
(39, '62B93F31278AE', '6278ACEF0EF3F', '62B93F58DD646', 'Addidas White Karate Tshirt', '629EF0673A036', '629EFD24BD828', '27/06/2022', '8:25AM', 'Monday', '', '', ''),
(40, '62B941F05559B', '6278ACEF0EF3F', '62B941F05558C', 'Men Green Cargo Pants', '6283FE4E3CCCF', '6283FF7E59562', '27/06/2022', '8:41AM', 'Monday', 'Monday, 27/06/2022', '8:41AM', ''),
(41, '62B94354B9A70', '6278ACEF0EF3F', '62B9436A77591', 'Men Jungle Green Pants', '6283FE4E3CCCF', '6283FF7E59562', '27/06/2022', '8:42AM', 'Monday', '', '', ''),
(42, '62B9465A580FD', '6278ACEF0EF3F', '62B94667998A0', 'Men Nike Grey Sweat Pants', '629EF0A92CE58', '62B9459B7D737', '27/06/2022', '8:55AM', 'Monday', '', '', ''),
(43, '62B94712DE390', '6278ACEF0EF3F', '62B9471D5C495', 'Men Addidas Black Sweat Pants', '629EF0A92CE58', '62B9459B7D737', '27/06/2022', '8:58AM', 'Monday', '', '', ''),
(44, '62B947F182BBD', '6278ACEF0EF3F', '62B947F182BAE', 'Diadora Men Black Sweat Pants', '629EF0A92CE58', '62B9459B7D737', '27/06/2022', '9:02AM', 'Monday', '', '', ''),
(45, '62B9486C6C376', '6278ACEF0EF3F', '62B94871D7F53', 'Navy Blue Ellese Track Pants', '629EF0A92CE58', '62B9459B7D737', '27/06/2022', '9:04AM', 'Monday', '', '', ''),
(46, '62B94B412DAA0', '6278ACEF0EF3F', '62B94B56A5C50', 'Men Executive Trouser- Black', '6284A688CB50A', '6283FF7E59562', '27/06/2022', '9:18AM', 'Monday', 'Monday, 27/06/2022', '9:18AM', ''),
(48, '62B94DE6323B2', '6278ACEF0EF3F', '62B94E0CCC410', 'Men Executive Full body Suits', '6284A688CB50A', '6284A70827953', '27/06/2022', '9:27AM', 'Monday', '', '', ''),
(49, '62B94ED316BBD', '6278ACEF0EF3F', '62B94ED776CD2', 'Men Black Khaki Pants', '6283FE4E3CCCF', '6284A8BE7D2AC', '27/06/2022', '9:31AM', 'Monday', '', '', ''),
(50, '62B94F59A2497', '6278ACEF0EF3F', '62B94F88C4768', 'Men Grey Cargo Pants', '6283FE4E3CCCF', '6283FF7E59562', '27/06/2022', '9:34AM', 'Monday', '', '', ''),
(51, '62B9504EB1C4D', '6278ACEF0EF3F', '62B9507F1C285', 'Men Navy Green Cargo Pants', '6283FE4E3CCCF', '6283FF7E59562', '27/06/2022', '9:38AM', 'Monday', '', '', ''),
(52, '62B952341087C', '6278ACEF0EF3F', '62B95256D5078', 'Men Cargo Pants - Green', '6283FE4E3CCCF', '6283FF7E59562', '27/06/2022', '9:46AM', 'Monday', '', '', ''),
(54, '62B9551EF09F0', '6278ACEF0EF3F', '62B9551EF09DA', 'North Face Men Black Freedom Pants', '6283FE4E3CCCF', '6283FF7E59562', '27/06/2022', '9:58AM', 'Monday', '', '', ''),
(56, '62B96C515D2AF', '6278ACEF0EF3F', '62B96C8C4E83B', 'Men Black Official Wear Trouser', '6284A688CB50A', '6283FF7E59562', '27/06/2022', '11:37AM', 'Monday', '', '', ''),
(57, '62B96D2EC1246', '6278ACEF0EF3F', '62B96D502DEFC', 'Men Vintage Mahogany Full Body Suit', '6284A688CB50A', '6284A70827953', '27/06/2022', '11:41AM', 'Monday', '', '', ''),
(58, '62B96E7681D8C', '6278ACEF0EF3F', '62B96E7681D7D', 'Men Black and White Checked Shirt ', '629EF0673A036', '629EFBDC73DA4', '27/06/2022', '11:46AM', 'Monday', '', '', ''),
(60, '62B974FEA330D', '6278ACEF0EF3F', '62B97522355C0', 'Men Black Bomber Jacket', '6284A5EF78CA1', '62B974955BFBE', '27/06/2022', '12:14PM', 'Monday', '', '', ''),
(61, '62B9761295D2E', '6278ACEF0EF3F', '62B9761295D24', '', '', '', '', '', '', '', '', ''),
(63, '62B9777456409', '6278ACEF0EF3F', '62B97774563FC', 'Hoodless Men Warm Puffer Jacket', '6284A5EF78CA1', '62B9714D4283F', '27/06/2022', '12:25PM', 'Monday', '', '', ''),
(64, '62B9780EE8DD3', '6278ACEF0EF3F', '62B9783874025', 'Men Grey Warm Bomber Jacket', '6284A5EF78CA1', '62B974955BFBE', '27/06/2022', '12:27PM', 'Monday', '', '', ''),
(65, '62B978CBE7A04', '6278ACEF0EF3F', '62B978F634FFB', 'Men Green Bomber Trench Jacket', '6284A5EF78CA1', '62B974955BFBE', '27/06/2022', '12:30PM', 'Monday', '', '', ''),
(66, '62B97AC02333D', '6278ACEF0EF3F', '62B97AC023330', 'Men Black Fitting Warm Jacket', '6284A5EF78CA1', '62B97321C2689', '27/06/2022', '12:39PM', 'Monday', '', '', ''),
(67, '62B9CF0641859', '6278ACEF0EF3F', '62B9D20039A59', 'Men Navy Blue Warm Jacket', '6284A5EF78CA1', '62B97321C2689', '27/06/2022', '6:38PM', 'Monday', '', '', ''),
(68, '62BA675128F97', '6278ACEF0EF3F', '62BA677D75403', 'Men Black Heavy Puffer Jacket', '6284A5EF78CA1', '62B9714D4283F', '28/06/2022', '5:28AM', 'Tuesday', '', '', ''),
(69, '62BA6863254BD', '6278ACEF0EF3F', '62BA6883A35A4', 'Addidas Men Brown Cotton Jacket', '6284A5EF78CA1', '62B97321C2689', '28/06/2022', '5:33AM', 'Tuesday', '', '', ''),
(70, '62BA69367B5FC', '6278ACEF0EF3F', '62BA695F5125E', 'Men Brown Warm Fitting Jacket', '6284A5EF78CA1', '62B97321C2689', '28/06/2022', '5:36AM', 'Tuesday', 'Tuesday, 28/06/2022', '6:00AM', ''),
(71, '62BA6BDECC906', '6278ACEF0EF3F', '62BA6C0382574', 'Men Green Heavy Puffer Jacket', '6284A5EF78CA1', '62B9714D4283F', '28/06/2022', '5:47AM', 'Tuesday', '', '', ''),
(72, '62BA6F7FEA130', '6278ACEF0EF3F', '62BA6FB20F444', 'Men Black Puffer Vest', '6284A5EF78CA1', '62B9714D4283F', '28/06/2022', '6:03AM', 'Tuesday', '', '', ''),
(73, '62BA97B2B7273', '6278ACEF0EF3F', '62BA97B2B7261', '', '', '', '', '', '', '', '', ''),
(74, '62BA97F8927FD', '', '', 'Men Short Sleeved Bomber Jacket', '6284A5EF78CA1', '62B974955BFBE', '28/06/2022', '8:56AM', 'Tuesday', '', '', ''),
(75, '62BAEA35DC4E1', '6278ACEF0EF3F', '62BAEA35DC4D2', 'Under Armour Men Black Sport Jacket', '6284A5EF78CA1', '62B97321C2689', '28/06/2022', '2:47PM', 'Tuesday', 'Tuesday, 28/06/2022', '2:49PM', '');

-- --------------------------------------------------------

--
-- Table structure for table `product_details`
--

CREATE TABLE `product_details` (
  `counter` int(11) NOT NULL,
  `product_id` varchar(500) NOT NULL,
  `product_image` varchar(50) NOT NULL,
  `market_price` varchar(500) NOT NULL,
  `discounted_price` varchar(500) NOT NULL,
  `product_description` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL CHECK (json_valid(`product_description`)),
  `reviews` varchar(500) NOT NULL,
  `status` varchar(50) NOT NULL,
  `field_status` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product_details`
--

INSERT INTO `product_details` (`counter`, `product_id`, `product_image`, `market_price`, `discounted_price`, `product_description`, `reviews`, `status`, `field_status`) VALUES
(9, '628494B77E505', 'brownKhaki.png', '2500', '1500', '{\"product-description\":\" Consist of men brown khaki trousers\",\"product-features\":\" Material: Cotton&#38;#13;&#38;#10;Color: Brown\"}', '28', 'Avilable', ''),
(10, '62A1FB52B8E14', 'ian-dooley-rBkihK3n_YI-unsplash.jpg', '900', '600', '{\"product-description\":\" Consist of men black tshirts\",\"product-features\":\" Color: Black&#38;#13;&#38;#10;Material: Cotton\"}', '34', 'Avilable', ''),
(11, '62A3488CDE695', 'brownKhakiTrousers.jpg', '1500', '1000', '{\"product-description\":\" Consist of men brown executive wear\",\"product-features\":\" Material: Wool + Cotton&#38;#13;&#38;#10;Color: Brown\"}', '1', 'Avilable', ''),
(12, '62A34D30ED278', 'menBlackOutdoorPants.jpeg', '1500', '1000', '{\"product-description\":\" Consist of men black outdoor pants\",\"product-features\":\" Material: Polyester&#38;#13;&#38;#10;Color: Black\"}', '3', 'Avilable', ''),
(13, '62B93B74D88C6', 'greyShirt.jpg', '2000', '850', '{\"product-description\":\"Made of pure 100% cotton, this elegant men grey tshirts guarantee you with comfort and versatility when fitted in any kind of weather. \",\"product-features\":\" Material: Cotton&#38;#13;&#38;#10;Color: Grey\"}', '', 'Avilable', ''),
(14, '62B93C7FCFA78', 'addidasGreyKarateTshirt.jpg', '1000', '700', '{\"product-description\":\"Awesome addidas men grey tshirts made of 50% cotton and 50% wool. \",\"product-features\":\" Material: Cotton + Wool&#38;#13;&#38;#10;Color: Grey\"}', '', 'Avilable', ''),
(15, '62B93D155E035', 'addidasBlueKarateTshirt.jpg', '1000', '700', '{\"product-description\":\" Made of 50% cotton and 50% wool. This elegant addidas tshirt is meant to provide you with extra comfort in any event. It is best suited for sport and outdoor activity\",\"product-features\":\" Material: Cotton + Wool&#38;#13;&#38;#10;Color: Blue\"}', '', 'Avilable', ''),
(16, '62B93E0D04756', 'addidasGreyBlackKarateTshirt.jpg', '1000', '700', '{\"product-description\":\"\",\"product-features\":\"\"}', '', 'Avilable', ''),
(17, '62B93F31278AE', 'addidasWhiteKarateTshirt.jpg', '1000', '700', '{\"product-description\":\"Made of 50% cotton and 50% wool.\",\"product-features\":\" Material: Cotton + Wool&#38;#13;&#38;#10;Color: White\"}', '', 'Avilable', ''),
(18, '62B941F05559B', 'MenGreenCargoPants.jpg', '1500', '1000', '{\"product-description\":\" Consist of men beige pants\",\"product-features\":\" Material: Cotton&#38;#13;&#38;#10;Color: Beige\"}', '84', 'Avilable', ''),
(19, '62B942D8679BC', 'GreenCargoPant.jpg', '', '', '{\"product-description\":\"Consist of men jungle green pants\",\"product-features\":\" Material: Cotton&#38;#13;&#38;#10;Color: Green\"}', '', '', ''),
(20, '62B94354B9A70', 'GreenCargoPant.jpg', '1500', '1000', '{\"product-description\":\"Consist of men jungle green  pants\",\"product-features\":\" Material: Cotton&#38;#13;&#38;#10;Color: Green\"}', '4', 'Avilable', ''),
(21, '62B9465A580FD', 'menGreySweatPants.jpg', '1000', '700', '{\"product-description\":\" Consist of nike grey fashion sweat pants\",\"product-features\":\" Material:Cotton&#38;#13;&#38;#10;Color: Grey\"}', '2', 'Avilable', ''),
(22, '62B94712DE390', 'BlackSweatPantsjpg.jpg', '1500', '950', '{\"product-description\":\" Consist of men Nike sweat pants\",\"product-features\":\" Material: Cotton&#38;#13;&#38;#10;Color: Black\"}', '3', 'Avilable', ''),
(23, '62B947F182BBD', 'blackSweatPants.jpg', '1500', '1000', '{\"product-description\":\" Consist of Diadora men Black Sweat Pants\",\"product-features\":\" Material: Cotton&#38;#13;&#38;#10;Color: Black\"}', '2', 'Avilable', ''),
(24, '62B9486C6C376', 'elleseTrackPant.jpg', '1500', '1000', '{\"product-description\":\" Consist of men navy blue ellese track pants\",\"product-features\":\" Material: Cotton&#38;#13;&#38;#10;Color: Navy Blue\"}', '3', 'Avilable', ''),
(25, '62B94B412DAA0', 'BlackOfficialTrouser.jpg', '2500', '1500', '{\"product-description\":\" Consist of men executive black trouser\",\"product-features\":\" Material: Cotton&#38;#13;&#38;#10;Color: Black\"}', '', 'Avilable', ''),
(27, '62B94DE6323B2', 'business-casual-suits-2037021379.jpg', '4500', '3500', '{\"product-description\":\" Consist of men executive full body suits\",\"product-features\":\" Material: Cotton&#38;#13;&#38;#10;Color: Brown, Blue, Black, Grey, White\"}', '', 'Avilable', ''),
(28, '62B94ED316BBD', 'OfficialBlackTrouser.jpg', '1500', '1000', '{\"product-description\":\" Consist of men black khaki pants\",\"product-features\":\" Material: Cotton&#38;#13;&#38;#10;Color: Black\"}', '2', 'Avilable', ''),
(29, '62B94F59A2497', 'MenGreyCargoPants.jpg', '1500', '1000', '{\"product-description\":\"Consist of men grey cargo pants\",\"product-features\":\" Material: Cotton&#38;#13;&#38;#10;Color: Grey\"}', '1', 'Avilable', ''),
(30, '62B9504EB1C4D', 'navy-green-cargo-pants.jpg', '1500', '1000', '{\"product-description\":\" Consist of men grey cargo pants\",\"product-features\":\" Material: Cotton&#38;#13;&#38;#10;Color: Navy Green\"}', '10', 'Avilable', ''),
(31, '62B952341087C', 'MenJungleGreenPants.jpg', '1500', '1000', '{\"product-description\":\" Consist of men green cargo pants\",\"product-features\":\" Material: Cotton&#38;#13;&#38;#10;Color: Green\"}', '29', 'Avilable', ''),
(33, '62B9551EF09F0', 'northFaceFreedomPants.jpg', '1800', '1300', '{\"product-description\":\" Consist of men black freedom pants\",\"product-features\":\" Material: Nylon + Polyester + Cotton&#38;#13;&#38;#10;Color: Black\"}', '18', 'Avilable', ''),
(35, '62B96C515D2AF', 'menBlackExecutiveWear.png', '2500', '1500', '{\"product-description\":\" Consist of men black official trouser\",\"product-features\":\" Material: Cotton&#38;#13;&#38;#10;Color: Black\"}', '', 'Avilable', ''),
(36, '62B96D2EC1246', 'vintageMahoganyFullBodySuit.jpg', '4500', '3500', '{\"product-description\":\" Consist of men mahogany full body suit\",\"product-features\":\"Material: Cotton&#38;#13;&#38;#10;Color: Mahogany\"}', '', 'Avilable', ''),
(37, '62B96E7681D8C', 'menBlackAndWhiteCheckedTshirt.jpg', '1500', '800', '{\"product-description\":\" Consist of men black and white checked shirt\",\"product-features\":\" Material: Cotton&#38;#13;&#38;#10;Color: Black and White\"}', '', 'Avilable', ''),
(39, '62B974FEA330D', 'menBlackMonclerJacket.jpg', '3500', '2000', '{\"product-description\":\" Consist of men black bomber jackets\",\"product-features\":\" Material: Cotton&#38;#13;&#38;#10;Color: Black\"}', '2', 'Avilable', ''),
(40, '62B9761295D2E', 'menBlackPufferJacket.jpg', '', '', '{\"product-description\":\" Consist of men heavy black puffer jacket\",\"product-features\":\" Material: Cotton&#38;#13;&#38;#10;Color: Black\"}', '', '', ''),
(42, '62B9777456409', 'menBlackWarmWearPufferJacket.jpg', '4500', '2500', '{\"product-description\":\" Consist of men hoodless warm puffer jacket\",\"product-features\":\"Material: Cotton &#38;#13;&#38;#10;Color: Black\"}', '', 'Avilable', ''),
(43, '62B9780EE8DD3', 'menDarkGreyWarmJacket.jpg', '4500', '3000', '{\"product-description\":\" Consist of men grey bomber jackets\",\"product-features\":\" Material: Cotton&#38;#13;&#38;#10;Color: Grey\"}', '3', 'Avilable', ''),
(44, '62B978CBE7A04', 'burtonGreenWarmJacket.jpg', '4500', '3000', '{\"product-description\":\"Consist of men green hooded bomber trench coat\",\"product-features\":\" Material: Cotton&#38;#13;&#38;#10;Color: Green\"}', '3', 'Avilable', ''),
(45, '62B97AC02333D', 'menBlackFittingWarmJacket.jpg', '3500', '1800', '{\"product-description\":\" Consist of men black fitting warm jacket\",\"product-features\":\" Material: Cotton&#38;#13;&#38;#10;Color: Black\"}', '', 'Avilable', ''),
(46, '62B9CF0641859', 'menNavyBluePufferJacket.jpg', '4500', '3000', '{\"product-description\":\" Consist of men navy blue warm jacket\",\"product-features\":\" Material: Cotton&#38;#13;&#38;#10;Colour: Navy Blue\"}', '1', 'Avilable', ''),
(47, '62BA675128F97', 'menBlackHeavyPufferJacket.jpg', '4500', '3000', '{\"product-description\":\" Consist of men heavy black puffer jacket\",\"product-features\":\" Material: Cotton&#38;#13;&#38;#10;Color: Black\"}', '2', 'Avilable', ''),
(48, '62BA6863254BD', 'Brown Cotton Jacket.jpg', '3500', '2350', '{\"product-description\":\" Consist of men warm cotton jacket. The best for cold seasons\",\"product-features\":\"Material: Cotton&#38;#13;&#38;#10;Color: Brown\"}', '', 'Avilable', ''),
(49, '62BA69367B5FC', 'brown-jacket-men.jpg', '3500', '2450', '{\"product-description\":\" Consist of men warm fitting brown jacket.\",\"product-features\":\" Material: Cotton + Wool + Polyester&#38;#13;&#38;#10;Color: Brown\"}', '', 'Avilable', ''),
(50, '62BA6BDECC906', 'menDarkGreenWarmJacket.jpg', '5000', '3250', '{\"product-description\":\" Consist of men green heavy puffer jacket\",\"product-features\":\" Material: Cotton&#38;#13;&#38;#10;Color: Dark Green\"}', '2', 'Avilable', ''),
(51, '62BA6F7FEA130', 'menPufferArmlessJacket.jpg', '3000', '1500', '{\"product-description\":\" Consist of men black puffer vest\",\"product-features\":\" Material: Cotton&#38;#13;&#38;#10;Color: Black\"}', '', 'Avilable', ''),
(52, '62BA97B2B7273', 'menBlackShortSleevedJacket.jpg', '', '', '{\"product-description\":\" Consist of men short sleeved black bomber jacket\",\"product-features\":\" Material: Cotton&#38;#13;&#38;#10;Color: Black\"}', '', '', ''),
(53, '62BA97F8927FD', 'menBlackShortSleevedJacket.jpg', '4600', '3450', '{\"product-description\":\"\",\"product-features\":\"\"}', '0', 'Avilable', ''),
(54, '62BAEA35DC4E1', 'underArmourBlackWarmJacket.jpg', '3800', '2550', '{\"product-description\":\" Consist of men black under amour sport jacket\",\"product-features\":\" Material: Polyester&#38;#13;&#38;#10;Color: Black\"}', '2', 'Avilable', '');

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
(31, '628494CE38529', '6278AD1157947', '628494B77E505', '600', 'nill', 'Cash', 'n/a', 'Verified', '18/05/2022', 'Wednesday', '9:40AM'),
(32, '62A1FB58EBD3C', '6278ACEF0EF3F', '62A1FB52B8E14', '400', '0', 'Cash', 'n/a', 'Pending', '09/06/2022', 'Thursday', '4:53PM'),
(33, '62A34892A1ECC', '6278AD1157947', '62A3488CDE695', '800', 'nill', 'Cash', 'n/a', 'Verified', '10/06/2022', 'Friday', '4:35PM'),
(34, '62A34D3462A8A', '6278ACEF0EF3F', '62A34D30ED278', '700', 'nill', 'Cash', 'n/a', 'Verified', '10/06/2022', 'Friday', '4:55PM'),
(35, '62B93B9894DC5', '6278ACEF0EF3F', '62B93B74D88C6', '500', 'nill', 'Mpesa', 'QFQ9E6T5AF', 'Verified', '27/06/2022', 'Monday', '8:09AM'),
(36, '62B93C7FCFA5F', '6278ACEF0EF3F', '62B93C7FCFA78', '450', 'nill', 'Mpesa', 'Q9C45DA325', 'Verified', '27/06/2022', 'Monday', '8:13AM'),
(37, '62B93D439CC95', '6278ACEF0EF3F', '62B93D155E035', '450', 'nill', 'Mpesa', 'Q94Z5B347A', 'Verified', '27/06/2022', 'Monday', '8:16AM'),
(38, '62B93E39F290B', '6278ACEF0EF3F', '62B93E0D04756', '450', 'nill', 'Mpesa', 'QA9B7ZAB4S', 'Verified', '27/06/2022', 'Monday', '8:20AM'),
(39, '62B93F58DD646', '6278ACEF0EF3F', '62B93F31278AE', '450', 'nill', 'Mpesa', 'QAWZ7B4S3A', 'Verified', '27/06/2022', 'Monday', '8:25AM'),
(40, '62B941F05558C', '6278ACEF0EF3F', '62B941F05559B', '750', 'nill', 'Cash', 'n/a', 'Verified', '27/06/2022', 'Monday', '8:36AM'),
(41, '62B9436A77591', '6278ACEF0EF3F', '62B94354B9A70', '700', 'nill', 'Cash', 'n/a', 'Verified', '27/06/2022', 'Monday', '8:43AM'),
(42, '62B94667998A0', '6278ACEF0EF3F', '62B9465A580FD', '500', 'nill', 'Cash', 'n/a', 'Verified', '27/06/2022', 'Monday', '8:55AM'),
(43, '62B9471D5C495', '6278ACEF0EF3F', '62B94712DE390', '500', 'nill', 'Cash', 'n/a', 'Verified', '27/06/2022', 'Monday', '8:58AM'),
(44, '62B947F182BAE', '6278ACEF0EF3F', '62B947F182BBD', '700', 'nill', 'Cash', 'n/a', 'Verified', '27/06/2022', 'Monday', '9:02AM'),
(45, '62B94871D7F53', '6278ACEF0EF3F', '62B9486C6C376', '500', 'nill', 'Cash', 'n/a', 'Verified', '27/06/2022', 'Monday', '9:04AM'),
(46, '62B94B56A5C50', '6278ACEF0EF3F', '62B94B412DAA0', '1200', 'nill', 'Cash', 'n/a', 'Verified', '27/06/2022', 'Monday', '9:16AM'),
(48, '62B94E0CCC410', '6278ACEF0EF3F', '62B94DE6323B2', '3000', 'nill', 'Mpesa', 'QBN34Z275A', 'Verified', '27/06/2022', 'Monday', '9:28AM'),
(49, '62B94ED776CD2', '6278ACEF0EF3F', '62B94ED316BBD', '750', 'nill', 'Cash', 'n/a', 'Verified', '27/06/2022', 'Monday', '9:31AM'),
(50, '62B94F88C4768', '6278ACEF0EF3F', '62B94F59A2497', '700', 'nill', 'Mpesa', 'QWE345X7B2', 'Verified', '27/06/2022', 'Monday', '9:34AM'),
(51, '62B9507F1C285', '6278ACEF0EF3F', '62B9504EB1C4D', '700', 'nill', 'Mpesa', 'QD34A6B9C2', 'Verified', '27/06/2022', 'Monday', '9:38AM'),
(52, '62B95256D5078', '6278ACEF0EF3F', '62B952341087C', '750', 'nill', 'Mpesa', 'QW4EZ673AS', 'Verified', '27/06/2022', 'Monday', '9:46AM'),
(54, '62B9551EF09DA', '6278ACEF0EF3F', '62B9551EF09F0', '950', 'nill', 'Mpesa', 'ASQW45X3Z8', 'Verified', '27/06/2022', 'Monday', '9:58AM'),
(55, '62B96B3446EB7', '6278ACEF0EF3F', '62B96B3446EC3', '1200', 'nill', 'Mpesa', 'QXX34B962A', 'Verified', '27/06/2022', 'Monday', '11:32AM'),
(56, '62B96C8C4E83B', '6278ACEF0EF3F', '62B96C515D2AF', '1200', 'nill', 'Mpesa', 'QW8X4SWD3A', 'Verified', '27/06/2022', 'Monday', '11:38AM'),
(57, '62B96D502DEFC', '6278ACEF0EF3F', '62B96D2EC1246', '3000', 'nill', 'Mpesa', 'QDE476B34Z', 'Verified', '27/06/2022', 'Monday', '11:41AM'),
(58, '62B96E7681D7D', '6278ACEF0EF3F', '62B96E7681D8C', '500', 'nill', 'Mpesa', 'QDW35XC27B', 'Verified', '27/06/2022', 'Monday', '11:46AM'),
(60, '62B97522355C0', '6278ACEF0EF3F', '62B974FEA330D', '1500', 'nill', 'Mpesa', 'QZX64D5A9B', 'Verified', '27/06/2022', 'Monday', '12:15PM'),
(61, '62B9761295D24', '6278ACEF0EF3F', '62B9761295D2E', '1500', 'nill', 'Mpesa', 'QAW34R5ZDA', 'Verified', '27/06/2022', 'Monday', '12:19PM'),
(62, '62B97774563FC', '6278ACEF0EF3F', '62B9777456409', '1800', 'nill', 'Mpesa', 'QD3B74Z3WQ', 'Verified', '27/06/2022', 'Monday', '12:25PM'),
(63, '62B9783874025', '6278ACEF0EF3F', '62B9780EE8DD3', '2500', 'nill', 'Mpesa', 'QWEF275CGA', 'Verified', '27/06/2022', 'Monday', '12:28PM'),
(64, '62B978F634FFB', '6278ACEF0EF3F', '62B978CBE7A04', '2500', 'nill', 'Mpesa', 'QV3AB47ZAT', 'Verified', '27/06/2022', 'Monday', '12:31PM'),
(65, '62B97AC023330', '6278ACEF0EF3F', '62B97AC02333D', '1500', 'nill', 'Mpesa', 'QVBN45627Z', 'Verified', '27/06/2022', 'Monday', '12:39PM'),
(66, '62B9D20039A59', '6278ACEF0EF3F', '62B9CF0641859', '2500', 'nill', 'Mpesa', 'QNF45XC37D', 'Verified', '27/06/2022', 'Monday', '6:51PM'),
(67, '62BA677D75403', '6278ACEF0EF3F', '62BA675128F97', '2500', 'nill', 'Mpesa', 'QAZDE347X1', 'Verified', '28/06/2022', 'Tuesday', '5:29AM'),
(68, '62BA6883A35A4', '6278ACEF0EF3F', '62BA6863254BD', '1800', 'nill', 'Mpesa', 'QDF3GB476A', 'Verified', '28/06/2022', 'Tuesday', '5:33AM'),
(69, '62BA695F5125E', '6278ACEF0EF3F', '62BA69367B5FC', '1850', '0', 'Mpesa', 'QNRS23Y67Z', 'Verified', '28/06/2022', 'Tuesday', '5:37AM'),
(70, '62BA6C0382574', '6278ACEF0EF3F', '62BA6BDECC906', '2500', 'nill', 'Mpesa', 'QJ2RFD34SA', 'Verified', '28/06/2022', 'Tuesday', '5:48AM'),
(71, '62BA6FB20F444', '6278ACEF0EF3F', '62BA6F7FEA130', '1000', 'nill', 'Mpesa', 'QH34ZA24C9', 'Verified', '28/06/2022', 'Tuesday', '6:04AM'),
(72, '62BA97B2B7261', '6278ACEF0EF3F', '62BA97B2B7273', '2500', 'nill', 'Mpesa', 'QT347BN90W', 'Verified', '28/06/2022', 'Tuesday', '8:54AM'),
(73, '62BAEA35DC4D2', '6278ACEF0EF3F', '62BAEA35DC4E1', '2000', 'nill', 'Mpesa', 'QH345D876T', 'Verified', '28/06/2022', 'Tuesday', '2:47PM');

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
(34, '629F2E5B099B9', '629EF0673A036', 'Men Sport Tshirts', 'tshirt2.png', ' Consist of men sport tshirts', '07/06/2022', '1:54PM', 'Tuesday', '', ''),
(35, '62B9459B7D737', '629EF0A92CE58', 'Men Sweat Pants', 'menSweatPants.png', ' Consist of men shorts and sweat pants', '27/06/2022', '8:52AM', 'Monday', '', ''),
(36, '62B970060FBE9', '629EF0A92CE58', 'Men Shorts', 'shorts.png', ' Consist of men shorts', '27/06/2022', '11:53AM', 'Monday', '', ''),
(37, '62B9714D4283F', '6284A5EF78CA1', 'Men Puffer Jacket', 'jacket (2).png', ' Consist of men puffer jackets', '27/06/2022', '11:58AM', 'Monday', '', ''),
(38, '62B9717536856', '6284A5EF78CA1', 'Men Denim Jackets', 'denim-jacket.png', '  Consist of men denim jackets', '27/06/2022', '11:59AM', 'Monday', '27/06/2022', '12:09PM'),
(39, '62B97321C2689', '6284A5EF78CA1', 'Men Warm Jackets', 'jacket (3).png', '  Consist of men warm jackets', '27/06/2022', '12:06PM', 'Monday', '27/06/2022', '12:08PM'),
(40, '62B97360C0447', '6284A5EF78CA1', 'Men Light Jackets', 'jacket(2).png', '  Consist of men light wear jackets', '27/06/2022', '12:07PM', 'Monday', '27/06/2022', '12:09PM'),
(41, '62B974955BFBE', '6284A5EF78CA1', 'Men Bomber Jacket', 'jacket(1).png', ' Consist of men bomber jackets', '27/06/2022', '12:12PM', 'Monday', '', '');

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
  `website` varchar(500) NOT NULL,
  `date_added` varchar(500) NOT NULL,
  `day_added` varchar(500) NOT NULL,
  `time_added` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `suppliers`
--

INSERT INTO `suppliers` (`counter`, `supplier_id`, `profile_image`, `supplier_name`, `company`, `phone_number`, `suppliers_email`, `website`, `date_added`, `day_added`, `time_added`) VALUES
(13, '6278ACEF0EF3F', '', 'Nairobi Fashion House', 'Nairobi Fashion House', '0745634234', 'info@nairobifashionhouse.co.ke', 'https://nairobifashionhouse.co.ke', '', '', ''),
(14, '6278AD1157947', '', 'Jinnel Collections', 'Jinnel Collections', '0724555445', 'info@jinnelcollections.co.ke', 'https://jinnelcollections.co.ke', '', '', ''),
(20, '6284A36A1FF62', '', 'Nike Kenya', 'Nike', '0702123456', '', 'https://nike.com', '', '', ''),
(21, '6284A56B682A9', 'adidas.png', 'Adidas Kenya', 'Addidas', '0720521998', 'info@addidas.co.ke', 'https://addidas.com', '', '', '');

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
(26, '628494CE38530', '6278AD1157947', '628494B77E505', '628494CE38529', 'Verified', '18/05/2022', 'Wednesday', '9:40AM'),
(27, '62A1FB58EBD4D', '6278ACEF0EF3F', '62A1FB52B8E14', '62A1FB58EBD3C', 'Pending', '24/06/2022', 'Friday', '9:19AM'),
(28, '62A34892A1ECF', '6278AD1157947', '62A3488CDE695', '62A34892A1ECC', 'Verified', '10/06/2022', 'Friday', '4:35PM'),
(29, '62A34D3462A8E', '6278ACEF0EF3F', '62A34D30ED278', '62A34D3462A8A', 'Verified', '10/06/2022', 'Friday', '4:55PM'),
(30, '62B93B9894DCF', '6278ACEF0EF3F', '62B93B74D88C6', '62B93B9894DC5', 'Verified', '27/06/2022', 'Monday', '8:09AM'),
(31, '62B93C7FCFA6C', '6278ACEF0EF3F', '62B93C7FCFA78', '62B93C7FCFA5F', 'Verified', '27/06/2022', 'Monday', '8:13AM'),
(32, '62B93D439CC9E', '6278ACEF0EF3F', '62B93D155E035', '62B93D439CC95', 'Verified', '27/06/2022', 'Monday', '8:16AM'),
(33, '62B93E39F291A', '6278ACEF0EF3F', '62B93E0D04756', '62B93E39F290B', 'Verified', '27/06/2022', 'Monday', '8:20AM'),
(34, '62B93F58DD652', '6278ACEF0EF3F', '62B93F31278AE', '62B93F58DD646', 'Verified', '27/06/2022', 'Monday', '8:25AM'),
(35, '62B941F055594', '6278ACEF0EF3F', '62B941F05559B', '62B941F05558C', 'Verified', '27/06/2022', 'Monday', '8:36AM'),
(36, '62B9436A775A1', '6278ACEF0EF3F', '62B94354B9A70', '62B9436A77591', 'Verified', '27/06/2022', 'Monday', '8:43AM'),
(37, '62B94667998A6', '6278ACEF0EF3F', '62B9465A580FD', '62B94667998A0', 'Verified', '27/06/2022', 'Monday', '8:55AM'),
(38, '62B9471D5C4A0', '6278ACEF0EF3F', '62B94712DE390', '62B9471D5C495', 'Verified', '27/06/2022', 'Monday', '8:58AM'),
(39, '62B947F182BB5', '6278ACEF0EF3F', '62B947F182BBD', '62B947F182BAE', 'Verified', '27/06/2022', 'Monday', '9:02AM'),
(40, '62B94871D7F67', '6278ACEF0EF3F', '62B9486C6C376', '62B94871D7F53', 'Verified', '27/06/2022', 'Monday', '9:04AM'),
(41, '62B94B56A5C5C', '6278ACEF0EF3F', '62B94B412DAA0', '62B94B56A5C50', 'Verified', '27/06/2022', 'Monday', '9:16AM'),
(43, '62B94E0CCC41C', '6278ACEF0EF3F', '62B94DE6323B2', '62B94E0CCC410', 'Verified', '27/06/2022', 'Monday', '9:28AM'),
(44, '62B94ED776CDA', '6278ACEF0EF3F', '62B94ED316BBD', '62B94ED776CD2', 'Verified', '27/06/2022', 'Monday', '9:31AM'),
(45, '62B94F88C4773', '6278ACEF0EF3F', '62B94F59A2497', '62B94F88C4768', 'Verified', '27/06/2022', 'Monday', '9:34AM'),
(46, '62B9507F1C291', '6278ACEF0EF3F', '62B9504EB1C4D', '62B9507F1C285', 'Verified', '27/06/2022', 'Monday', '9:38AM'),
(47, '62B95256D5082', '6278ACEF0EF3F', '62B952341087C', '62B95256D5078', 'Verified', '27/06/2022', 'Monday', '9:46AM'),
(48, '62B9538FA7D0C', '6278ACEF0EF3F', '62B9538FA7D14', '62B9538FA7D01', 'Verified', '27/06/2022', 'Monday', '9:51AM'),
(49, '62B9551EF09E8', '6278ACEF0EF3F', '62B9551EF09F0', '62B9551EF09DA', 'Verified', '27/06/2022', 'Monday', '9:58AM'),
(50, '62B96B3446EBF', '6278ACEF0EF3F', '62B96B3446EC3', '62B96B3446EB7', 'Verified', '27/06/2022', 'Monday', '11:32AM'),
(51, '62B96C8C4E841', '6278ACEF0EF3F', '62B96C515D2AF', '62B96C8C4E83B', 'Verified', '27/06/2022', 'Monday', '11:38AM'),
(52, '62B96D502DF02', '6278ACEF0EF3F', '62B96D2EC1246', '62B96D502DEFC', 'Verified', '27/06/2022', 'Monday', '11:41AM'),
(53, '62B96E7681D86', '6278ACEF0EF3F', '62B96E7681D8C', '62B96E7681D7D', 'Verified', '27/06/2022', 'Monday', '11:46AM'),
(55, '62B97522355CA', '6278ACEF0EF3F', '62B974FEA330D', '62B97522355C0', 'Verified', '27/06/2022', 'Monday', '12:15PM'),
(56, '62B9761295D2A', '6278ACEF0EF3F', '62B9761295D2E', '62B9761295D24', 'Verified', '27/06/2022', 'Monday', '12:19PM'),
(57, '62B9777456404', '6278ACEF0EF3F', '62B9777456409', '62B97774563FC', 'Verified', '27/06/2022', 'Monday', '12:25PM'),
(58, '62B978387402C', '6278ACEF0EF3F', '62B9780EE8DD3', '62B9783874025', 'Verified', '27/06/2022', 'Monday', '12:28PM'),
(59, '62B978F635002', '6278ACEF0EF3F', '62B978CBE7A04', '62B978F634FFB', 'Verified', '27/06/2022', 'Monday', '12:31PM'),
(60, '62B97AC023338', '6278ACEF0EF3F', '62B97AC02333D', '62B97AC023330', 'Verified', '27/06/2022', 'Monday', '12:39PM'),
(61, '62B9D20039A64', '6278ACEF0EF3F', '62B9CF0641859', '62B9D20039A59', 'Verified', '27/06/2022', 'Monday', '6:51PM'),
(62, '62BA677D7540A', '6278ACEF0EF3F', '62BA675128F97', '62BA677D75403', 'Verified', '28/06/2022', 'Tuesday', '5:29AM'),
(63, '62BA6883A35AD', '6278ACEF0EF3F', '62BA6863254BD', '62BA6883A35A4', 'Verified', '28/06/2022', 'Tuesday', '5:33AM'),
(64, '62BA695F51262', '6278ACEF0EF3F', '62BA69367B5FC', '62BA695F5125E', 'Verified', '28/06/2022', 'Tuesday', '6:00AM'),
(65, '62BA6C0382580', '6278ACEF0EF3F', '62BA6BDECC906', '62BA6C0382574', 'Verified', '28/06/2022', 'Tuesday', '5:48AM'),
(66, '62BA6FB20F44B', '6278ACEF0EF3F', '62BA6F7FEA130', '62BA6FB20F444', 'Verified', '28/06/2022', 'Tuesday', '6:04AM'),
(67, '62BA97B2B726C', '6278ACEF0EF3F', '62BA97B2B7273', '62BA97B2B7261', 'Verified', '28/06/2022', 'Tuesday', '8:54AM'),
(68, '62BAEA35DC4D9', '6278ACEF0EF3F', '62BAEA35DC4E1', '62BAEA35DC4D2', 'Verified', '28/06/2022', 'Tuesday', '2:47PM');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `counter` int(11) NOT NULL,
  `user_id` varchar(500) NOT NULL,
  `username` varchar(500) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `firstname` varchar(500) NOT NULL,
  `lastname` varchar(500) NOT NULL,
  `user_email` varchar(500) NOT NULL,
  `phone_number` varchar(500) NOT NULL,
  `national_id` varchar(500) NOT NULL,
  `password` varchar(500) NOT NULL,
  `date_added` varchar(500) NOT NULL,
  `day_added` varchar(500) NOT NULL,
  `time_added` varchar(500) NOT NULL,
  `activity` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL CHECK (json_valid(`activity`))
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`counter`, `user_id`, `username`, `firstname`, `lastname`, `user_email`, `phone_number`, `national_id`, `password`, `date_added`, `day_added`, `time_added`, `activity`) VALUES
(12, '62A85D2D1848B', 'anonymous', 'Anonymous', 'User', 'anonymous@gmail.com', '0114328117', '', '$2y$10$HbffmantgtGzOkxA/lZBVeCD/ejZVwsQzZS8WxKWWYAVecDqQ1KcG', '14/Jun/2022', 'Tuesday', '1:04PM', '{\"date_added\":\"14\\/Jun\\/2022\",\"day_added\":\"Tuesday\",\"time_added\":\"1:04PM\"}'),
(13, '62A86BB33A410', 'cmwambi', 'Caleb', 'Mwambi', 'calebmwambi@gmail.com', '0114258354', '', '$2y$10$F46WG8eZ5FBB17o1USUijenmajc.Uuy4l1ztjulDVCAV1pxKvo.hG', '14/Jun/2022', 'Tuesday', '2:06PM', '{\"date_added\":\"14\\/Jun\\/2022\",\"day_added\":\"Tuesday\",\"time_added\":\"2:06PM\"}'),
(14, '62A8CD8412F91', 'AnonymousUser', 'anonymous', '', 'anonymoususer@gmail.com', '0114956785', '', '$2y$10$wef93b0slYyR1XeCe9Okd.vNSPykIQ0WlnO0KddgDh9nndeHb/3m.', '14/Jun/2022', 'Tuesday', '9:03PM', '{\"date_added\":\"14\\/Jun\\/2022\",\"day_added\":\"Tuesday\",\"time_added\":\"9:03PM\"}'),
(15, '62B05B8CE5EAB', 'pmwambi', 'Peter', 'Mwasagua', 'pmwambi@gmail.com', '0700521998', '', '$2y$10$O0vkmx5DXwFs5KlzRaXfIun3gtFwY1v/qcfvK891ImpqrdVvUMhza', '20/Jun/2022', 'Monday', '2:35PM', '{\"date_added\":\"20\\/Jun\\/2022\",\"day_added\":\"Monday\",\"time_added\":\"2:35PM\"}'),
(16, '62B2A7F01AA8A', 'jkamah', 'John', 'Kamau', 'jkamau@gmail.com', '0114258031', '', '$2y$10$6mLbdq152DibwVkkriypbu4iblbMoJgGpdOLhTNNizPNbX/CgkZ0q', '22/Jun/2022', 'Wednesday', '8:26AM', '{\"date_added\":\"22\\/Jun\\/2022\",\"day_added\":\"Wednesday\",\"time_added\":\"8:26AM\"}');

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
  ADD PRIMARY KEY (`counter`,`order_id`);

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
  ADD UNIQUE KEY `username` (`username`,`user_email`,`phone_number`) USING HASH;

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
  MODIFY `counter` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;

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
  MODIFY `counter` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- AUTO_INCREMENT for table `order_details`
--
ALTER TABLE `order_details`
  MODIFY `counter` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `counter` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=76;

--
-- AUTO_INCREMENT for table `product_details`
--
ALTER TABLE `product_details`
  MODIFY `counter` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT for table `purchases`
--
ALTER TABLE `purchases`
  MODIFY `counter` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=74;

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
  MODIFY `counter` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `suppliers`
--
ALTER TABLE `suppliers`
  MODIFY `counter` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `supplier_activity`
--
ALTER TABLE `supplier_activity`
  MODIFY `counter` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=69;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `counter` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
