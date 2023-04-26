-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 22, 2022 at 06:20 AM
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
-- Database: `everready`
--

-- --------------------------------------------------------

--
-- Table structure for table `administrators`
--

CREATE TABLE `administrators` (
  `counter` int(11) NOT NULL,
  `admin_id` varchar(500) NOT NULL,
  `adm_username` varchar(500) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `adm_firstname` varchar(500) NOT NULL,
  `adm_lastname` varchar(500) NOT NULL,
  `adm_phone_number` varchar(500) NOT NULL,
  `adm_email` varchar(500) NOT NULL,
  `adm_password` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `administrators`
--

INSERT INTO `administrators` (`counter`, `admin_id`, `adm_username`, `adm_firstname`, `adm_lastname`, `adm_phone_number`, `adm_email`, `adm_password`) VALUES
(6, '625E8C094B04B', 'Admin', 'Anonymous', 'Admin', '072345176', 'anonymous@gmail.com', '$2y$10$v4/rqReScqrs7UypBNNnk.8/cBf0T9JFpmU0zlyyx1wfeSfPLEMam');

-- --------------------------------------------------------

--
-- Table structure for table `areas`
--

CREATE TABLE `areas` (
  `counter` int(11) NOT NULL,
  `area_id` varchar(500) NOT NULL,
  `location_id` varchar(500) NOT NULL,
  `name` varchar(500) NOT NULL,
  `date_added` varchar(500) NOT NULL,
  `day_added` varchar(500) NOT NULL,
  `time_added` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `areas`
--

INSERT INTO `areas` (`counter`, `area_id`, `location_id`, `name`, `date_added`, `day_added`, `time_added`) VALUES
(1, '6258EBBA0E403', '6258B6BC42409', 'Afya Center', '15/Apr/2022', 'Friday', '6:51AM'),
(2, '6258EBD6CD7C7', '6258B6BC42409', 'Agip Business Center', '15/Apr/2022', 'Friday', '6:51AM'),
(5, '625C60618637B', '625901300E6FD', 'Ngara', '17/Apr/2022', 'Sunday', '9:45PM'),
(6, '625C60A6DE222', '6258B6BC42409', 'Pangani', '17/Apr/2022', 'Sunday', '9:47PM'),
(7, '625C616C6A578', '6258B6BC42409', 'Muthaiga', '17/Apr/2022', 'Sunday', '9:50PM');

-- --------------------------------------------------------

--
-- Table structure for table `clients`
--

CREATE TABLE `clients` (
  `counter` int(11) NOT NULL,
  `client_id` varchar(500) NOT NULL,
  `cl_username` varchar(500) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `cl_firstname` varchar(500) NOT NULL,
  `cl_lastname` varchar(500) NOT NULL,
  `cl_email` varchar(500) NOT NULL,
  `cl_phone_number` varchar(500) NOT NULL,
  `cl_password` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `clients`
--

INSERT INTO `clients` (`counter`, `client_id`, `cl_username`, `cl_firstname`, `cl_lastname`, `cl_email`, `cl_phone_number`, `cl_password`) VALUES
(10, '625E8A13CE804', 'Anonymous', 'Anonymous', 'User', 'anonymous@gmail.com', '0114328117', '$2y$10$dfr80S8LXOKorKzt8/.LTeD51ciPMy5u3QJiFER1u/H1sr5r5229C');

-- --------------------------------------------------------

--
-- Table structure for table `contracts`
--

CREATE TABLE `contracts` (
  `counter` int(11) NOT NULL,
  `contract_id` varchar(500) NOT NULL,
  `driver_id` varchar(500) NOT NULL,
  `passenger_id` varchar(500) NOT NULL,
  `request_status` varchar(500) NOT NULL,
  `payment_status` varchar(500) NOT NULL,
  `amount` varchar(500) NOT NULL,
  `date_added` varchar(500) NOT NULL,
  `day_added` varchar(500) NOT NULL,
  `time_added` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `contracts`
--

INSERT INTO `contracts` (`counter`, `contract_id`, `driver_id`, `passenger_id`, `request_status`, `payment_status`, `amount`, `date_added`, `day_added`, `time_added`) VALUES
(45, '626203BAB3EC8', '625FA6A7ECB6E', '626203BAB3ECD', 'complete', 'verified', '70', '22/Apr/2022', 'Friday', '4:24AM');

-- --------------------------------------------------------

--
-- Table structure for table `drivers`
--

CREATE TABLE `drivers` (
  `counter` int(11) NOT NULL,
  `driver_id` varchar(500) NOT NULL,
  `vehicle_id` varchar(500) DEFAULT NULL,
  `location_id` varchar(500) NOT NULL,
  `dr_username` varchar(500) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `dr_firstname` varchar(500) NOT NULL,
  `dr_lastname` varchar(500) NOT NULL,
  `dr_phone_number` varchar(500) NOT NULL,
  `dr_email` varchar(500) NOT NULL,
  `dr_password` varchar(500) NOT NULL,
  `status` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `drivers`
--

INSERT INTO `drivers` (`counter`, `driver_id`, `vehicle_id`, `location_id`, `dr_username`, `dr_firstname`, `dr_lastname`, `dr_phone_number`, `dr_email`, `dr_password`, `status`) VALUES
(4, '625FA6A7ECB6E', '626079B3F014E', '6258B6BC42409', 'Anonymous', 'Anonymous', 'Driver', '0114258354', 'anonymous.driver@gmail.com', '$2y$10$9FOYGH6YOMjh0ByePkWE.O6STdF0SDOcWCEI8QmQ7gnJ96uczYxNm', 'avilable'),
(6, '6260F7226B666', '6260F78B4A21B', '6258B6BC42409', 'JoeAnthony', 'Joe', 'Kamau', '0114328117', 'joeanthony@gmail.com', '$2y$10$juHNsoSaUdwT0d3nA0dp1.2MLL6WcCHVs45diIzZ/QXLAgR2RXpUW', 'avilable'),
(7, '6260F84696695', '6260F8DA5898E', '6258B6BC42409', 'JohnMwangi', 'John', 'Mwangi', '0723216459', 'johnmwangi736@gmail.com', '$2y$10$xD0KzGKHXxdfbwxR1cerO.FBIXLyzot9Pb/W4sprENXVJicUFCCmS', 'avilable');

-- --------------------------------------------------------

--
-- Table structure for table `locations`
--

CREATE TABLE `locations` (
  `counter` int(11) NOT NULL,
  `location_id` varchar(500) NOT NULL,
  `name` varchar(500) NOT NULL,
  `date_added` varchar(500) NOT NULL,
  `time_added` varchar(500) NOT NULL,
  `day_added` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `locations`
--

INSERT INTO `locations` (`counter`, `location_id`, `name`, `date_added`, `time_added`, `day_added`) VALUES
(2, '6258B6BC42409', 'Nairobi', '15/Apr/2022', '3:05AM', 'Friday'),
(5, '625900D57FE31', 'Juja', '15/Apr/2022', '8:21AM', 'Friday'),
(6, '625901300E6FD', 'Thika Super Highway', '15/Apr/2022', '8:22AM', 'Friday');

-- --------------------------------------------------------

--
-- Table structure for table `passengers`
--

CREATE TABLE `passengers` (
  `counter` int(11) NOT NULL,
  `passenger_id` varchar(500) NOT NULL,
  `client_id` varchar(500) NOT NULL,
  `contract_id` varchar(500) NOT NULL,
  `payment_id` varchar(500) NOT NULL,
  `pickup_point` varchar(500) NOT NULL,
  `destination` varchar(500) NOT NULL,
  `date_added` varchar(500) NOT NULL,
  `day_added` varchar(500) NOT NULL,
  `time_added` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `passengers`
--

INSERT INTO `passengers` (`counter`, `passenger_id`, `client_id`, `contract_id`, `payment_id`, `pickup_point`, `destination`, `date_added`, `day_added`, `time_added`) VALUES
(45, '626203BAB3ECD', '625E8A13CE804', '626203BAB3EC8', '626203EB3DAB1', 'Agip Business Center', 'Muthaiga', '22/Apr/2022', 'Friday', '4:24AM');

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `counter` int(11) NOT NULL,
  `payment_id` varchar(500) NOT NULL,
  `contract_id` varchar(500) NOT NULL,
  `amount` varchar(500) NOT NULL,
  `payment_status` varchar(500) NOT NULL,
  `payment_method` varchar(500) NOT NULL,
  `date_added` varchar(500) NOT NULL,
  `day_added` varchar(500) NOT NULL,
  `time_added` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `payments`
--

INSERT INTO `payments` (`counter`, `payment_id`, `contract_id`, `amount`, `payment_status`, `payment_method`, `date_added`, `day_added`, `time_added`) VALUES
(18, '626203EB3DAB1', '626203BAB3EC8', '70', 'verified', 'mpesa', '22/04/2022', 'Friday', '4:24AM');

-- --------------------------------------------------------

--
-- Table structure for table `receipts`
--

CREATE TABLE `receipts` (
  `counter` int(11) NOT NULL,
  `receipt_id` varchar(500) NOT NULL,
  `driver_id` varchar(500) NOT NULL,
  `passenger_id` varchar(500) NOT NULL,
  `contract_id` varchar(500) NOT NULL,
  `payment_id` varchar(500) NOT NULL,
  `date_added` varchar(500) NOT NULL,
  `day_added` varchar(500) NOT NULL,
  `time_added` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `receipts`
--

INSERT INTO `receipts` (`counter`, `receipt_id`, `driver_id`, `passenger_id`, `contract_id`, `payment_id`, `date_added`, `day_added`, `time_added`) VALUES
(1, '626203EB3DAB9', '625FA6A7ECB6E', '626203BAB3ECD', '626203BAB3EC8', '626203EB3DAB1', '22/04/2022', 'Friday', '4:24AM');

-- --------------------------------------------------------

--
-- Table structure for table `routes`
--

CREATE TABLE `routes` (
  `counter` int(11) NOT NULL,
  `route_id` varchar(500) NOT NULL,
  `start_location` varchar(500) NOT NULL,
  `destination_location` varchar(500) NOT NULL,
  `start_point` varchar(500) NOT NULL COMMENT 'Current Location',
  `destination_point` varchar(500) NOT NULL COMMENT 'Destination',
  `fare` varchar(500) NOT NULL,
  `date_added` varchar(500) NOT NULL,
  `day_added` varchar(500) NOT NULL,
  `time_added` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `routes`
--

INSERT INTO `routes` (`counter`, `route_id`, `start_location`, `destination_location`, `start_point`, `destination_point`, `fare`, `date_added`, `day_added`, `time_added`) VALUES
(2, '6258DCB8A2CC7', 'Nairobi', 'Thika', 'National Archives', 'Makongeni', '200', '15/Apr/2022', 'Friday', '5:47AM'),
(3, '6258DD1DC9BEB', 'Nairobi', 'Juja', 'Afya Center', 'Gate A', '150', '15/Apr/2022', 'Friday', '5:49AM'),
(6, '6258EC11D78B8', 'Nairobi', 'Thika', 'Afya Center', 'Absa', '450', '15/Apr/2022', 'Friday', '6:52AM');

-- --------------------------------------------------------

--
-- Table structure for table `tickets`
--

CREATE TABLE `tickets` (
  `counter` int(11) NOT NULL,
  `ticket_id` varchar(500) NOT NULL,
  `driver_id` varchar(500) NOT NULL,
  `passenger_id` varchar(500) NOT NULL,
  `contract_id` varchar(500) NOT NULL,
  `date_added` varchar(500) NOT NULL,
  `day_added` varchar(500) NOT NULL,
  `time_added` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tickets`
--

INSERT INTO `tickets` (`counter`, `ticket_id`, `driver_id`, `passenger_id`, `contract_id`, `date_added`, `day_added`, `time_added`) VALUES
(6, '626203BAB3ECE', '625FA6A7ECB6E', '626203BAB3ECD', '626203BAB3EC8', '22/Apr/2022', 'Friday', '4:24AM');

-- --------------------------------------------------------

--
-- Table structure for table `vehicles`
--

CREATE TABLE `vehicles` (
  `counter` int(11) NOT NULL,
  `vehicle_id` varchar(500) NOT NULL,
  `driver_id` varchar(500) NOT NULL,
  `pictures` varchar(500) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL,
  `number_plate` varchar(500) NOT NULL,
  `model` varchar(500) NOT NULL,
  `make` varchar(500) NOT NULL,
  `date_added` varchar(500) NOT NULL,
  `day_added` varchar(500) NOT NULL,
  `time_added` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `vehicles`
--

INSERT INTO `vehicles` (`counter`, `vehicle_id`, `driver_id`, `pictures`, `number_plate`, `model`, `make`, `date_added`, `day_added`, `time_added`) VALUES
(73, '626079B3F014E', '625FA6A7ECB6E', 'toyotaMarkX.jpg', 'KCN247A', 'Mark X 2014 model', 'Toyota', '21/Apr/2022', 'Thursday', '12:22AM'),
(76, '6260F78B4A21B', '6260F7226B666', 'toyotaWish.jpg', 'KCB235A', 'Wish 2010 model', 'Toyota', '21/Apr/2022', 'Thursday', '9:19AM'),
(78, '6260F8DA5898E', '6260F84696695', 'nissanXtrail.jpg', 'KCJ324A', 'Xtrail 2020 model', 'Nissan', '21/Apr/2022', 'Thursday', '9:25AM'),
(79, '6260FD6A69A6F', '6258CD0D266A0', 'mazdaDemio.jpg', 'KCT734N', 'Demio 2016 model', 'Mazda', '21/Apr/2022', 'Thursday', '9:44AM'),
(80, '62620BA5A6975', '6261F9306EE4D', 'mitsubishiOutlander.jpg', 'KCJ117A', 'Outlander 2017 model', 'Mitsubishi', '22/Apr/2022', 'Friday', '4:57AM');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `administrators`
--
ALTER TABLE `administrators`
  ADD PRIMARY KEY (`counter`,`admin_id`),
  ADD UNIQUE KEY `username` (`adm_username`),
  ADD UNIQUE KEY `email` (`adm_email`);

--
-- Indexes for table `areas`
--
ALTER TABLE `areas`
  ADD PRIMARY KEY (`counter`,`area_id`);

--
-- Indexes for table `clients`
--
ALTER TABLE `clients`
  ADD PRIMARY KEY (`counter`,`client_id`),
  ADD UNIQUE KEY `username` (`cl_username`);

--
-- Indexes for table `contracts`
--
ALTER TABLE `contracts`
  ADD PRIMARY KEY (`counter`,`contract_id`),
  ADD UNIQUE KEY `passenger_id` (`passenger_id`);

--
-- Indexes for table `drivers`
--
ALTER TABLE `drivers`
  ADD PRIMARY KEY (`counter`,`driver_id`),
  ADD UNIQUE KEY `username` (`dr_username`),
  ADD UNIQUE KEY `vehicle_id` (`vehicle_id`);

--
-- Indexes for table `locations`
--
ALTER TABLE `locations`
  ADD PRIMARY KEY (`counter`,`location_id`);

--
-- Indexes for table `passengers`
--
ALTER TABLE `passengers`
  ADD PRIMARY KEY (`counter`,`passenger_id`),
  ADD UNIQUE KEY `passenger_id` (`passenger_id`);

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`counter`,`payment_id`);

--
-- Indexes for table `receipts`
--
ALTER TABLE `receipts`
  ADD PRIMARY KEY (`counter`,`receipt_id`);

--
-- Indexes for table `routes`
--
ALTER TABLE `routes`
  ADD PRIMARY KEY (`counter`,`route_id`);

--
-- Indexes for table `tickets`
--
ALTER TABLE `tickets`
  ADD PRIMARY KEY (`counter`,`ticket_id`),
  ADD UNIQUE KEY `passenger_id` (`passenger_id`),
  ADD UNIQUE KEY `contract_id` (`contract_id`);

--
-- Indexes for table `vehicles`
--
ALTER TABLE `vehicles`
  ADD PRIMARY KEY (`counter`,`vehicle_id`),
  ADD UNIQUE KEY `driver_id` (`driver_id`),
  ADD UNIQUE KEY `pictures` (`pictures`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `administrators`
--
ALTER TABLE `administrators`
  MODIFY `counter` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `areas`
--
ALTER TABLE `areas`
  MODIFY `counter` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `clients`
--
ALTER TABLE `clients`
  MODIFY `counter` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `contracts`
--
ALTER TABLE `contracts`
  MODIFY `counter` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT for table `drivers`
--
ALTER TABLE `drivers`
  MODIFY `counter` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `locations`
--
ALTER TABLE `locations`
  MODIFY `counter` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `passengers`
--
ALTER TABLE `passengers`
  MODIFY `counter` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `counter` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `receipts`
--
ALTER TABLE `receipts`
  MODIFY `counter` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `routes`
--
ALTER TABLE `routes`
  MODIFY `counter` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tickets`
--
ALTER TABLE `tickets`
  MODIFY `counter` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `vehicles`
--
ALTER TABLE `vehicles`
  MODIFY `counter` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=81;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
