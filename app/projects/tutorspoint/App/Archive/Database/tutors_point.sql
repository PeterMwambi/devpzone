-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 10, 2023 at 04:18 PM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tutors_point`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_account_info`
--

CREATE TABLE `admin_account_info` (
  `id` int(11) NOT NULL,
  `ad_id` varchar(15) NOT NULL,
  `ad_username` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `ad_password` varchar(100) NOT NULL,
  `ad_date_created` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL CHECK (json_valid(`ad_date_created`)),
  `ad_last_login` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL CHECK (json_valid(`ad_last_login`))
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin_account_info`
--

INSERT INTO `admin_account_info` (`id`, `ad_id`, `ad_username`, `ad_password`, `ad_date_created`, `ad_last_login`) VALUES
(3, 'TPAD642B3B50915', 'pmwendwa', '$2y$10$ZNsCfzFNQgrPfXOnV.dngea.3Liaw6b8Z3S9zKLCf2ODUxUM38TeW', '{\"day\":\"Monday\",\"date\":\"03\\/04\\/2023\",\"time\":\"11:47PM\"}', '{\"day\":\"Saturday\",\"date\":\"08\\/04\\/2023\",\"time\":\"2:42PM\"}'),
(4, 'TPAD642EAA59D13', 'mwairimu', '$2y$10$JXvq8H7aDZ0Ist/lllsu9e8g/0QfAPvkWpywuMKgyQCwKWaNYpgH.', '{\"day\":\"Thursday\",\"date\":\"06\\/04\\/2023\",\"time\":\"2:17PM\"}', '{\"day\":\"Monday\",\"date\":\"10\\/04\\/2023\",\"time\":\"4:54PM\"}');

-- --------------------------------------------------------

--
-- Table structure for table `admin_personal_info`
--

CREATE TABLE `admin_personal_info` (
  `id` int(11) NOT NULL,
  `ad_id` varchar(15) NOT NULL,
  `ad_firstname` varchar(30) NOT NULL,
  `ad_lastname` varchar(30) NOT NULL,
  `ad_gender` varchar(30) NOT NULL,
  `ad_date_of_birth` varchar(30) NOT NULL,
  `ad_age` int(8) NOT NULL,
  `ad_nationality` varchar(30) NOT NULL,
  `ad_national_id` int(11) NOT NULL,
  `ad_phone_number` varchar(20) NOT NULL,
  `ad_email` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin_personal_info`
--

INSERT INTO `admin_personal_info` (`id`, `ad_id`, `ad_firstname`, `ad_lastname`, `ad_gender`, `ad_date_of_birth`, `ad_age`, `ad_nationality`, `ad_national_id`, `ad_phone_number`, `ad_email`) VALUES
(10, 'TPAD642B3B50915', 'Patrick', 'Mwendwa', 'Male', '12/02/1999', 23, 'Kenyan', 37992365, '+254712511998', 'calebmwambi@gmail.com'),
(11, 'TPAD642EAA59D13', 'Mercy', 'Wairimu', 'Female', '11/04/1999', 23, 'Kenyan', 34567898, '+254723551973', 'mercywairimu@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `classes`
--

CREATE TABLE `classes` (
  `id` int(11) NOT NULL,
  `cl_id` varchar(30) NOT NULL,
  `c_id` varchar(30) NOT NULL,
  `cn_id` varchar(30) NOT NULL,
  `t_id` varchar(30) NOT NULL,
  `cl_students` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL CHECK (json_valid(`cl_students`)),
  `cl_date_created` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL CHECK (json_valid(`cl_date_created`))
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `classes`
--

INSERT INTO `classes` (`id`, `cl_id`, `c_id`, `cn_id`, `t_id`, `cl_students`, `cl_date_created`) VALUES
(1, 'TPCL642EA6BA20226', 'TPC642C888C99C6A', 'TPCN642EA6BA1D4D9', 'TP642B211B89769', '[\"TPST6434137660A8B\"]', '{\"day\":\"Thursday\",\"date\":\"06\\/04\\/2023\",\"time\":\"1:38PM\"}'),
(2, 'TPCL642EA8F6ECEE7', 'TPC642C99DA29A0D', 'TPCN642EA8F6EA9E9', 'TP642B020A385F8', '[\"TPST6430885FEE991\",\"TPST642EABA622595\",\"TPST6434169E337AA\"]', '{\"day\":\"Thursday\",\"date\":\"06\\/04\\/2023\",\"time\":\"1:38PM\"}'),
(6, 'TPCL6430BF819C062', 'TPC642C888C99C6A', 'TPCN6430BF81992E1', 'TP642B020A385F8', '[\"TPST6434137660A8B\"]', '{\"day\":\"Saturday\",\"date\":\"08\\/04\\/2023\",\"time\":\"4:12AM\"}'),
(7, 'TPCL64314AC907EC7', 'TPC642EA9D292015', 'TPCN64314AC905488', 'TPT643148F699BBA', '[\"TPST6430885FEE991\"]', '{\"day\":\"Saturday\",\"date\":\"08\\/04\\/2023\",\"time\":\"2:06PM\"}'),
(8, 'TPCL64340F5872C58', 'TPC642C888C99C6A', 'TPCN64340F5870035', 'TPT64340DA812CE2', '[\"TPST6434137660A8B\"]', '{\"day\":\"Monday\",\"date\":\"10\\/04\\/2023\",\"time\":\"4:30PM\"}'),
(9, 'TPCL6434192B0F091', 'TPC642EA9D292015', 'TPCN6434192B0C81F', 'TPT6434187E6BF36', '[]', '{\"day\":\"Monday\",\"date\":\"10\\/04\\/2023\",\"time\":\"5:11PM\"}');

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

CREATE TABLE `courses` (
  `id` int(11) NOT NULL,
  `c_id` varchar(30) NOT NULL,
  `ct_id` varchar(30) NOT NULL,
  `c_name` varchar(100) NOT NULL,
  `c_fee` int(11) NOT NULL,
  `c_description` varchar(400) NOT NULL,
  `c_date_created` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL CHECK (json_valid(`c_date_created`))
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`id`, `c_id`, `ct_id`, `c_name`, `c_fee`, `c_description`, `c_date_created`) VALUES
(1, 'TPC642C888C99C6A', 'TPCT642BFB2D51F71', 'Introduction to digital literacy', 3500, 'Introducing fundamental concepts in digital literacy', '{\"day\":\"Tuesday\",\"date\":\"04\\/04\\/2023\",\"time\":\"11:29PM\"}'),
(3, 'TPC642C99DA29A0D', 'TPCT642BFB2D51F71', 'Fundamentals of digital literacy', 2000, 'Key concepts in digital literacy', '{\"day\":\"Wednesday\",\"date\":\"05\\/04\\/2023\",\"time\":\"12:42AM\"}'),
(4, 'TPC642EA9D292015', 'TPCT642EA9828BDAD', 'Financial Accounting 1', 5000, 'Introduction to financial accounting', '{\"day\":\"Thursday\",\"date\":\"06\\/04\\/2023\",\"time\":\"2:15PM\"}'),
(5, 'TPC643410D1E4614', 'TPCT642EA9828BDAD', 'business commerse', 2300, 'huioooojohu', '{\"day\":\"Monday\",\"date\":\"10\\/04\\/2023\",\"time\":\"4:36PM\"}');

-- --------------------------------------------------------

--
-- Table structure for table `course_category`
--

CREATE TABLE `course_category` (
  `id` int(11) NOT NULL,
  `ct_id` varchar(30) NOT NULL,
  `ct_name` varchar(100) NOT NULL,
  `ct_description` varchar(400) NOT NULL,
  `ct_date_created` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL CHECK (json_valid(`ct_date_created`))
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `course_category`
--

INSERT INTO `course_category` (`id`, `ct_id`, `ct_name`, `ct_description`, `ct_date_created`) VALUES
(1, 'TPCT642BFB2D51F71', 'Digital Essentials', 'Basic Computer literacy skills', '{\"day\":\"Tuesday\",\"date\":\"04\\/04\\/2023\",\"time\":\"1:25PM\"}'),
(2, 'TPCT642EA9828BDAD', 'Business finance', 'Consist of all business courses that handle finances and transactions', '{\"day\":\"Thursday\",\"date\":\"06\\/04\\/2023\",\"time\":\"2:14PM\"}'),
(3, 'TPCT6434126F953BB', 'marketing and marketing strategies', 'how to get people interested with your products and services.', '{\"day\":\"Monday\",\"date\":\"10\\/04\\/2023\",\"time\":\"4:43PM\"}');

-- --------------------------------------------------------

--
-- Table structure for table `course_content`
--

CREATE TABLE `course_content` (
  `id` int(11) NOT NULL,
  `cn_id` varchar(30) NOT NULL,
  `c_id` varchar(30) NOT NULL,
  `t_id` varchar(30) NOT NULL,
  `cn_description` varchar(400) NOT NULL,
  `cn_topics` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL CHECK (json_valid(`cn_topics`)),
  `cn_notes` varchar(30) NOT NULL,
  `cn_date_created` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL CHECK (json_valid(`cn_date_created`))
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `course_content`
--

INSERT INTO `course_content` (`id`, `cn_id`, `c_id`, `t_id`, `cn_description`, `cn_topics`, `cn_notes`, `cn_date_created`) VALUES
(4, 'TPCN642EA26D82460', 'TPC642C888C99C6A', 'TP642B211B89769', 'Digital literacy is a field in Information technology that deals with digital awareness, and basic computer skills. This course will equip you with the right information to enable you begin a career in technology.', '{\"topics\":\"What is digital literacy, What is data, What is information, Importance of data\"}', 'Motivation 003.pdf', '{\"day\":\"Thursday\",\"date\":\"06\\/04\\/2023\",\"time\":\"1:43PM\"}'),
(6, 'TPCN642EA8F6EA9E9', 'TPC642C99DA29A0D', 'TP642B020A385F8', 'Digital literacy is a field in Information technology that deals with digital awareness, and basic computer skills. This course will equip you with the fundamental skills to enable you kick start your career in Information Technology', '{\"topics\":\"What is digital literacy, Key concepts in digital literacy, Digital goals\"}', 'Motivation.pdf', '{\"day\":\"Thursday\",\"date\":\"06\\/04\\/2023\",\"time\":\"2:11PM\"}'),
(12, 'TPCN6430BF81992E1', 'TPC642C888C99C6A', 'TP642B020A385F8', 'Digital literacy is a significant aspect of our lives in the present day. Technological know how helps businesses thrive in the ever dynamic world', '{\"topics\":\"What is digital literacy, Information and data\"}', 'Effects of Cotton Gin on Slave', '{\"day\":\"Saturday\",\"date\":\"08\\/04\\/2023\",\"time\":\"4:12AM\"}'),
(13, 'TPCN64314AC905488', 'TPC642EA9D292015', 'TPT643148F699BBA', 'Accounting is a key aspect in progress record keeping in our lives today. Financial accounting is therefore a discipline in business studies that ensures the correct recording of business transactions as they occur.', '{\"topics\":\"Fundamentals of accounting, Financial statemants\"}', 'Motivation.pdf', '{\"day\":\"Saturday\",\"date\":\"08\\/04\\/2023\",\"time\":\"2:06PM\"}'),
(14, 'TPCN64340F5870035', 'TPC642C888C99C6A', 'TPT64340DA812CE2', 'This is the collective method technologies and processes that help to protect the confidentiality integrity and availability of computer systems networks and data against cyber attacks', '{\"topics\":\"cybersecurity\"}', 'Effects of Cotton Gin on Slave', '{\"day\":\"Monday\",\"date\":\"10\\/04\\/2023\",\"time\":\"4:30PM\"}'),
(15, 'TPCN6434192B0C81F', 'TPC642EA9D292015', 'TPT6434187E6BF36', 'production and operation', '{\"topics\":\"production management\"}', 'Motivation.pdf', '{\"day\":\"Monday\",\"date\":\"10\\/04\\/2023\",\"time\":\"5:11PM\"}');

-- --------------------------------------------------------

--
-- Table structure for table `online_classes`
--

CREATE TABLE `online_classes` (
  `id` int(11) NOT NULL,
  `clo_id` varchar(30) NOT NULL,
  `cl_id` varchar(30) NOT NULL,
  `clo_link` varchar(400) NOT NULL,
  `clo_date_created` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL CHECK (json_valid(`clo_date_created`)),
  `clo_status` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `id` int(11) NOT NULL,
  `pm_id` varchar(30) NOT NULL,
  `t_id` varchar(30) NOT NULL,
  `st_id` varchar(30) NOT NULL,
  `c_id` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `payments`
--

INSERT INTO `payments` (`id`, `pm_id`, `t_id`, `st_id`, `c_id`) VALUES
(21, 'TPPM6430B4C850F68', 'TP642B020A385F8', 'TPST6430885FEE991', 'TPC642C99DA29A0D'),
(22, 'TPPM6430B5190F143', 'TP642B020A385F8', 'TPST6430885FEE991', 'TPC642EA9D292015'),
(23, 'TPPM6430B568D6443', 'TP642B211B89769', 'TPST6430885FEE991', 'TPC642C888C99C6A'),
(24, 'TPPM6430C105E6306', 'TP642B020A385F8', 'TPST642EABA622595', 'TPC642C99DA29A0D'),
(25, 'TPPM6430C12CBAFD0', 'TP642B020A385F8', 'TPST642EABA622595', 'TPC642C888C99C6A'),
(26, 'TPPM64314B98808F5', 'TPT643148F699BBA', 'TPST6430885FEE991', 'TPC642EA9D292015'),
(27, 'TPPM64340CD686BC7', 'TP642B211B89769', 'TPST64340C6130A23', 'TPC642C888C99C6A'),
(28, 'TPPM6434142356CB4', 'TPT64340DA812CE2', 'TPST6434137660A8B', 'TPC642C888C99C6A'),
(29, 'TPPM643416E120746', 'TP642B020A385F8', 'TPST6434169E337AA', 'TPC642C99DA29A0D');

-- --------------------------------------------------------

--
-- Table structure for table `payment_details`
--

CREATE TABLE `payment_details` (
  `id` int(11) NOT NULL,
  `pm_id` varchar(30) NOT NULL,
  `pmd_amount` int(30) NOT NULL,
  `pmd_status` varchar(30) NOT NULL,
  `pmd_mode` varchar(30) NOT NULL,
  `pmd_transaction_code` varchar(30) NOT NULL,
  `pmd_date` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL CHECK (json_valid(`pmd_date`)),
  `pmd_balance` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `payment_details`
--

INSERT INTO `payment_details` (`id`, `pm_id`, `pmd_amount`, `pmd_status`, `pmd_mode`, `pmd_transaction_code`, `pmd_date`, `pmd_balance`) VALUES
(19, 'TPPM6430B4C850F68', 2000, 'verified', 'Mpesa', 'QC45678RDF', '{\"day\":\"Saturday\",\"date\":\"08\\/04\\/2023\",\"time\":\"3:26AM\"}', '0'),
(20, 'TPPM6430B5190F143', 5000, 'verified', 'Mpesa', 'QC45678DBA', '{\"day\":\"Saturday\",\"date\":\"08\\/04\\/2023\",\"time\":\"3:28AM\"}', '0'),
(21, 'TPPM6430B568D6443', 3500, 'verified', 'Mpesa', 'QC45674RDF', '{\"day\":\"Saturday\",\"date\":\"08\\/04\\/2023\",\"time\":\"3:29AM\"}', '0'),
(22, 'TPPM6430C105E6306', 2000, 'verified', 'Mpesa', 'QC45678RBA', '{\"day\":\"Saturday\",\"date\":\"08\\/04\\/2023\",\"time\":\"4:19AM\"}', '0'),
(23, 'TPPM6430C12CBAFD0', 3500, 'verified', 'Mpesa', 'QC45678RDP', '{\"day\":\"Saturday\",\"date\":\"08\\/04\\/2023\",\"time\":\"4:19AM\"}', '0'),
(24, 'TPPM64314B98808F5', 5000, 'verified', 'Mpesa', 'QC45678RQA', '{\"day\":\"Saturday\",\"date\":\"08\\/04\\/2023\",\"time\":\"2:10PM\"}', '0'),
(25, 'TPPM64340CD686BC7', 3500, 'verified', 'Mpesa', 'mn12345678', '{\"day\":\"Monday\",\"date\":\"10\\/04\\/2023\",\"time\":\"4:19PM\"}', '0'),
(26, 'TPPM6434142356CB4', 3500, 'verified', 'Mpesa', 'QW56789068', '{\"day\":\"Monday\",\"date\":\"10\\/04\\/2023\",\"time\":\"4:50PM\"}', '0'),
(27, 'TPPM643416E120746', 2000, 'verified', 'Mpesa', 'qw2345tu89', '{\"day\":\"Monday\",\"date\":\"10\\/04\\/2023\",\"time\":\"5:02PM\"}', '0');

-- --------------------------------------------------------

--
-- Table structure for table `student_account_info`
--

CREATE TABLE `student_account_info` (
  `id` int(11) NOT NULL,
  `st_id` varchar(30) NOT NULL,
  `st_username` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `st_password` varchar(100) NOT NULL,
  `st_date_created` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL CHECK (json_valid(`st_date_created`)),
  `st_last_login` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL CHECK (json_valid(`st_last_login`))
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `student_account_info`
--

INSERT INTO `student_account_info` (`id`, `st_id`, `st_username`, `st_password`, `st_date_created`, `st_last_login`) VALUES
(1, 'TPST642B1DD116609', 'pmwendwa', '$2y$10$g96gS1QjTTbZmETORPMfXOiQY/d/mrmH.1eeg7hrFKjTnKJ3S6ROe', '{\"day\":\"Monday\",\"date\":\"03\\/04\\/2023\",\"time\":\"9:41PM\"}', '{\"day\":\"Friday\",\"date\":\"07\\/04\\/2023\",\"time\":\"3:50PM\"}'),
(2, 'TPST642EABA622595', 'mwairimu', '$2y$10$N30Def/H900zqgb0s.9j0.Sz1xREiyroRT52j.E7q8OMss2LzMPea', '{\"day\":\"Thursday\",\"date\":\"06\\/04\\/2023\",\"time\":\"2:23PM\"}', '{\"day\":\"Saturday\",\"date\":\"08\\/04\\/2023\",\"time\":\"4:13AM\"}'),
(3, 'TPST642F12E48975D', 'mkamah', '$2y$10$sdUiSM5v0bg7R9dw/tyPd.IY8wGUZuDNxgzoi1mssO9sE37VkRGee', '{\"day\":\"Thursday\",\"date\":\"06\\/04\\/2023\",\"time\":\"9:43PM\"}', '{\"day\":\"Friday\",\"date\":\"07\\/04\\/2023\",\"time\":\"10:29AM\"}'),
(4, 'TPST64300A1F38B60', 'faithnjambi', '$2y$10$CA.havQ.T/EFKudyuIrv8ekZJyN.GloqTe.W3Nw5SUgVuMuriMTCy', '{\"day\":\"Friday\",\"date\":\"07\\/04\\/2023\",\"time\":\"3:18PM\"}', '{\"day\":\"Friday\",\"date\":\"07\\/04\\/2023\",\"time\":\"3:20PM\"}'),
(5, 'TPST6430885FEE991', 'marymwende', '$2y$10$UB2Y95cmpw2Pp0yyPXnRxeerm7C6WL5M5Hd/dWKTovf0NneU5k0qi', '{\"day\":\"Saturday\",\"date\":\"08\\/04\\/2023\",\"time\":\"12:17AM\"}', '{\"day\":\"Saturday\",\"date\":\"08\\/04\\/2023\",\"time\":\"6:14PM\"}'),
(6, 'TPST643147CE9FFF4', 'anthonyk225', '$2y$10$G4xA.LgGVmedWTr2ey47GOli/htZH/HIE0EtlBPxQk3Hufu6no3bq', '{\"day\":\"Saturday\",\"date\":\"08\\/04\\/2023\",\"time\":\"1:54PM\"}', '{\"day\":\"Saturday\",\"date\":\"08\\/04\\/2023\",\"time\":\"1:54PM\"}'),
(7, 'TPST64340C6130A23', 'tutu', '$2y$10$ugmhCFcZjuiKY.BeZpE5ieZXNbrWtvnFBCQ3.6Cx9/QBQYdM4Lkvm', '{\"day\":\"Monday\",\"date\":\"10\\/04\\/2023\",\"time\":\"4:17PM\"}', '{\"day\":\"Monday\",\"date\":\"10\\/04\\/2023\",\"time\":\"4:17PM\"}'),
(8, 'TPST6434137660A8B', 'justinwambua', '$2y$10$opA2CbENgNW9wD/o0iiG5Ok3ZZBaZM4zqOGDf1ojVv.oHgjG/Vqhq', '{\"day\":\"Monday\",\"date\":\"10\\/04\\/2023\",\"time\":\"4:47PM\"}', '{\"day\":\"Monday\",\"date\":\"10\\/04\\/2023\",\"time\":\"4:47PM\"}'),
(9, 'TPST6434169E337AA', 'chris', '$2y$10$ANWc39VnEJFjFtt9V7ZOaOH1EJYEWwDP5Vaw8jYY6x7kRELrEQDVu', '{\"day\":\"Monday\",\"date\":\"10\\/04\\/2023\",\"time\":\"5:01PM\"}', '{\"day\":\"Monday\",\"date\":\"10\\/04\\/2023\",\"time\":\"5:01PM\"}');

-- --------------------------------------------------------

--
-- Table structure for table `student_personal_info`
--

CREATE TABLE `student_personal_info` (
  `id` int(11) NOT NULL,
  `st_id` varchar(30) NOT NULL,
  `st_firstname` varchar(30) NOT NULL,
  `st_lastname` varchar(30) NOT NULL,
  `st_gender` varchar(30) NOT NULL,
  `st_date_of_birth` varchar(30) NOT NULL,
  `st_age` int(8) NOT NULL,
  `st_nationality` varchar(30) NOT NULL,
  `st_national_id` int(11) NOT NULL,
  `st_phone_number` varchar(20) NOT NULL,
  `st_email` varchar(50) NOT NULL,
  `st_profile_pic` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `student_personal_info`
--

INSERT INTO `student_personal_info` (`id`, `st_id`, `st_firstname`, `st_lastname`, `st_gender`, `st_date_of_birth`, `st_age`, `st_nationality`, `st_national_id`, `st_phone_number`, `st_email`, `st_profile_pic`) VALUES
(1, 'TPST642B1DD116609', 'Patrick', 'Mwendwa', 'Male', '12/02/1999', 23, 'Kenyan', 37999275, '+254700251998', 'pmwendwa@gmail.com', NULL),
(2, 'TPST642EABA622595', 'Mercy', 'Wairimu', 'Female', '12/10/1999', 23, 'Kenyan', 37456327, '+254723551973', 'mwairimu@gmail.com', NULL),
(3, 'TPST642F12E48975D', 'Martin', 'Kamau', 'Male', '12/11/1998', 24, 'Kenyan', 36262377, '+254724616317', 'mkamau@gmail.com', NULL),
(4, 'TPST64300A1F38B60', 'Faith', 'Njambi', 'Female', '12/02/1999', 23, 'Kenyan', 37776237, '+254711223577', 'njambifaith@gmail.com', NULL),
(5, 'TPST6430885FEE991', 'Mary', 'Mwende', 'Female', '12/03/2000', 22, 'Kenyan', 37962377, '+254721273247', 'marymwende305@gmail.com', NULL),
(6, 'TPST643147CE9FFF4', 'Anthony', 'Kimani', 'Male', '12/07/2000', 22, 'Kenyan', 37776257, '+254700223453', 'anthonyk@gmail.com', NULL),
(7, 'TPST64340C6130A23', 'Peter', 'Mwaura', 'Male', '01/06/2000', 22, 'Kenyan', 56778890, '+254723441789', 'petermwaura@gmail.com', NULL),
(8, 'TPST6434137660A8B', 'Justine', 'Wambua', 'Male', '21/09/2000', 27, 'Kenyan', 36852147, '+254723221973', 'justine@gmail.com', NULL),
(9, 'TPST6434169E337AA', 'Chris', 'Mwangi', 'Male', '23/02/2000', 22, 'Kenyan', 37801213, '+254725683914', 'chrismwangi@yahoo.com', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tutor_account_info`
--

CREATE TABLE `tutor_account_info` (
  `id` int(11) NOT NULL,
  `t_id` varchar(30) NOT NULL,
  `t_username` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `t_password` varchar(100) NOT NULL,
  `t_date_created` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL CHECK (json_valid(`t_date_created`)),
  `t_last_login` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL CHECK (json_valid(`t_last_login`)),
  `t_ratings` int(11) NOT NULL,
  `t_reviews` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL CHECK (json_valid(`t_reviews`))
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tutor_account_info`
--

INSERT INTO `tutor_account_info` (`id`, `t_id`, `t_username`, `t_password`, `t_date_created`, `t_last_login`, `t_ratings`, `t_reviews`) VALUES
(3, 'TP642B020A385F8', 'pmwendwa', '$2y$10$HrfC7EU8/uuAqWxIPYHKuOvvp1LsjiteQC6PWS2LZBOstQObaYYVG', '{\"day\":\"Monday\",\"date\":\"03\\/04\\/2023\",\"time\":\"7:42PM\"}', '{\"day\":\"Saturday\",\"date\":\"08\\/04\\/2023\",\"time\":\"3:57AM\"}', 2, '[]'),
(4, 'TP642B211B89769', 'mwairimu', '$2y$10$nNhHLKXi6SwFGTREkl1diOx/k/rjEwSEcgU2jqXjEPoxms2y6rocW', '{\"day\":\"Monday\",\"date\":\"03\\/04\\/2023\",\"time\":\"9:55PM\"}', '{\"day\":\"Friday\",\"date\":\"07\\/04\\/2023\",\"time\":\"2:51PM\"}', 2, '[]'),
(5, 'TPT643148F699BBA', 'mnyambura254', '$2y$10$jSbpDIy.Y6NG21utZGc7sOBNuHWpFMxGxvD7fFJq6h9lAPBj7V0jy', '{\"day\":\"Saturday\",\"date\":\"08\\/04\\/2023\",\"time\":\"1:59PM\"}', '{\"day\":\"Saturday\",\"date\":\"08\\/04\\/2023\",\"time\":\"1:59PM\"}', 0, '[]'),
(6, 'TPT64340DA812CE2', 'lehan', '$2y$10$DFqB0g4d5GvWcVMpuPta1.spFvtyJya/hPkWShyFPDMNfxlCsWCMy', '{\"day\":\"Monday\",\"date\":\"10\\/04\\/2023\",\"time\":\"4:22PM\"}', '{\"day\":\"Monday\",\"date\":\"10\\/04\\/2023\",\"time\":\"4:37PM\"}', 2, '[]'),
(7, 'TPT6434187E6BF36', 'allano', '$2y$10$pyYLWjxfJLhtGVvWMRs62.qGHmdV4cMS0.Lnp80Br5vWaL8aGZl5O', '{\"day\":\"Monday\",\"date\":\"10\\/04\\/2023\",\"time\":\"5:09PM\"}', '{\"day\":\"Monday\",\"date\":\"10\\/04\\/2023\",\"time\":\"5:09PM\"}', 2, '[]');

-- --------------------------------------------------------

--
-- Table structure for table `tutor_personal_info`
--

CREATE TABLE `tutor_personal_info` (
  `id` int(11) NOT NULL,
  `t_id` varchar(30) NOT NULL,
  `t_firstname` varchar(30) NOT NULL,
  `t_lastname` varchar(30) NOT NULL,
  `t_gender` varchar(30) NOT NULL,
  `t_date_of_birth` varchar(30) NOT NULL,
  `t_age` int(8) NOT NULL,
  `t_nationality` varchar(30) NOT NULL,
  `t_national_id` int(11) NOT NULL,
  `t_phone_number` varchar(20) NOT NULL,
  `t_email` varchar(50) NOT NULL,
  `t_profile_pic` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tutor_personal_info`
--

INSERT INTO `tutor_personal_info` (`id`, `t_id`, `t_firstname`, `t_lastname`, `t_gender`, `t_date_of_birth`, `t_age`, `t_nationality`, `t_national_id`, `t_phone_number`, `t_email`, `t_profile_pic`) VALUES
(7, 'TP642B020A385F8', 'Patrick', 'Mwendwa', 'Male', '12/02/1999', 23, 'Kenyan', 37992365, '+254701531998', 'patrickmwendwa@gmail.com', NULL),
(8, 'TP642B211B89769', 'Mercy', 'Wairimu', 'Female', '12/02/1999', 23, 'Kenyan', 37999273, '+254723577234', 'mercywairimu@gmail.com', NULL),
(9, 'TPT643148F699BBA', 'Mercyline', 'Nyambura', 'Female', '12/10/1994', 29, 'Kenyan', 36456377, '+254713463237', 'nyamburameryline254@gmail.com', NULL),
(10, 'TPT64340DA812CE2', 'Lehane', 'Pamen', 'Female', '23/01/1999', 23, 'Kenyan', 34345678, '+254723446789', 'lehane@gmail.com', NULL),
(11, 'TPT6434187E6BF36', 'Allan', 'Mugo', 'Male', '02/03/2000', 23, 'Kenyan', 38456312, '+254722370842', 'allanmugo@gmail.com', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_account_info`
--
ALTER TABLE `admin_account_info`
  ADD PRIMARY KEY (`id`,`ad_id`),
  ADD UNIQUE KEY `ad_id` (`ad_id`);

--
-- Indexes for table `admin_personal_info`
--
ALTER TABLE `admin_personal_info`
  ADD PRIMARY KEY (`id`,`ad_id`),
  ADD UNIQUE KEY `ad_id` (`ad_id`),
  ADD UNIQUE KEY `ad_national_id` (`ad_national_id`),
  ADD UNIQUE KEY `ad_phone_number` (`ad_phone_number`),
  ADD UNIQUE KEY `ad_email` (`ad_email`);

--
-- Indexes for table `classes`
--
ALTER TABLE `classes`
  ADD PRIMARY KEY (`id`,`cl_id`),
  ADD UNIQUE KEY `cl_id` (`cl_id`);

--
-- Indexes for table `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`id`,`c_id`),
  ADD UNIQUE KEY `c_id` (`c_id`),
  ADD UNIQUE KEY `c_name` (`c_name`);

--
-- Indexes for table `course_category`
--
ALTER TABLE `course_category`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `ct_id` (`ct_id`),
  ADD UNIQUE KEY `ct_name` (`ct_name`);

--
-- Indexes for table `course_content`
--
ALTER TABLE `course_content`
  ADD PRIMARY KEY (`id`,`cn_id`);

--
-- Indexes for table `online_classes`
--
ALTER TABLE `online_classes`
  ADD PRIMARY KEY (`id`,`clo_id`),
  ADD UNIQUE KEY `clo_id` (`clo_id`),
  ADD UNIQUE KEY `cl_id` (`cl_id`);

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`id`,`pm_id`),
  ADD UNIQUE KEY `pm_id` (`pm_id`);

--
-- Indexes for table `payment_details`
--
ALTER TABLE `payment_details`
  ADD PRIMARY KEY (`id`,`pm_id`),
  ADD UNIQUE KEY `pm_id` (`pm_id`);

--
-- Indexes for table `student_account_info`
--
ALTER TABLE `student_account_info`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `st_id` (`st_id`),
  ADD UNIQUE KEY `st_username` (`st_username`);

--
-- Indexes for table `student_personal_info`
--
ALTER TABLE `student_personal_info`
  ADD PRIMARY KEY (`id`,`st_id`),
  ADD UNIQUE KEY `st_id` (`st_id`),
  ADD UNIQUE KEY `st_national_id` (`st_national_id`),
  ADD UNIQUE KEY `st_phone_number` (`st_phone_number`),
  ADD UNIQUE KEY `st_email` (`st_email`);

--
-- Indexes for table `tutor_account_info`
--
ALTER TABLE `tutor_account_info`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `t_id` (`t_id`),
  ADD UNIQUE KEY `t_username` (`t_username`);

--
-- Indexes for table `tutor_personal_info`
--
ALTER TABLE `tutor_personal_info`
  ADD PRIMARY KEY (`id`,`t_id`),
  ADD UNIQUE KEY `t_id` (`t_id`),
  ADD UNIQUE KEY `t_national_id` (`t_national_id`),
  ADD UNIQUE KEY `t_phone_number` (`t_phone_number`),
  ADD UNIQUE KEY `t_email` (`t_email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_account_info`
--
ALTER TABLE `admin_account_info`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `admin_personal_info`
--
ALTER TABLE `admin_personal_info`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `classes`
--
ALTER TABLE `classes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `courses`
--
ALTER TABLE `courses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `course_category`
--
ALTER TABLE `course_category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `course_content`
--
ALTER TABLE `course_content`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `online_classes`
--
ALTER TABLE `online_classes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `payment_details`
--
ALTER TABLE `payment_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `student_account_info`
--
ALTER TABLE `student_account_info`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `student_personal_info`
--
ALTER TABLE `student_personal_info`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tutor_account_info`
--
ALTER TABLE `tutor_account_info`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tutor_personal_info`
--
ALTER TABLE `tutor_personal_info`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `admin_account_info`
--
ALTER TABLE `admin_account_info`
  ADD CONSTRAINT `admin_account_info_ibfk_1` FOREIGN KEY (`ad_id`) REFERENCES `admin_personal_info` (`ad_id`);

--
-- Constraints for table `classes`
--
ALTER TABLE `classes`
  ADD CONSTRAINT `classes_ibfk_1` FOREIGN KEY (`c_id`) REFERENCES `courses` (`c_id`);

--
-- Constraints for table `courses`
--
ALTER TABLE `courses`
  ADD CONSTRAINT `courses_ibfk_1` FOREIGN KEY (`ct_id`) REFERENCES `course_category` (`ct_id`);

--
-- Constraints for table `course_content`
--
ALTER TABLE `course_content`
  ADD CONSTRAINT `course_content_ibfk_1` FOREIGN KEY (`c_id`) REFERENCES `courses` (`c_id`),
  ADD CONSTRAINT `course_content_ibfk_2` FOREIGN KEY (`t_id`) REFERENCES `tutor_personal_info` (`t_id`);

--
-- Constraints for table `online_classes`
--
ALTER TABLE `online_classes`
  ADD CONSTRAINT `online_classes_ibfk_1` FOREIGN KEY (`cl_id`) REFERENCES `classes` (`cl_id`);

--
-- Constraints for table `payments`
--
ALTER TABLE `payments`
  ADD CONSTRAINT `payments_ibfk_1` FOREIGN KEY (`t_id`) REFERENCES `tutor_personal_info` (`t_id`),
  ADD CONSTRAINT `payments_ibfk_2` FOREIGN KEY (`st_id`) REFERENCES `student_personal_info` (`st_id`),
  ADD CONSTRAINT `payments_ibfk_3` FOREIGN KEY (`c_id`) REFERENCES `courses` (`c_id`);

--
-- Constraints for table `payment_details`
--
ALTER TABLE `payment_details`
  ADD CONSTRAINT `payment_details_ibfk_1` FOREIGN KEY (`pm_id`) REFERENCES `payments` (`pm_id`);

--
-- Constraints for table `student_account_info`
--
ALTER TABLE `student_account_info`
  ADD CONSTRAINT `student_account_info_ibfk_1` FOREIGN KEY (`st_id`) REFERENCES `student_personal_info` (`st_id`);

--
-- Constraints for table `tutor_account_info`
--
ALTER TABLE `tutor_account_info`
  ADD CONSTRAINT `tutor_account_info_ibfk_1` FOREIGN KEY (`t_id`) REFERENCES `tutor_personal_info` (`t_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
