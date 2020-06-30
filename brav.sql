-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 10, 2020 at 08:49 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `brav`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `names` varchar(100) NOT NULL,
  `profile` varchar(100) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `email`, `names`, `profile`, `password`) VALUES
(1, 'admin@gmail.com', '0', '', 'adminadmin');

-- --------------------------------------------------------

--
-- Table structure for table `borrowed_items`
--

CREATE TABLE `borrowed_items` (
  `id` int(11) NOT NULL,
  `department` varchar(100) NOT NULL,
  `adm_number` int(100) NOT NULL,
  `full_names` varchar(100) NOT NULL,
  `class` varchar(100) NOT NULL,
  `stream` varchar(100) NOT NULL,
  `serial_number` varchar(100) NOT NULL,
  `item_title` varchar(100) NOT NULL,
  `item_description` varchar(500) NOT NULL,
  `date_borrowed` varchar(100) NOT NULL,
  `status` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `borrowed_items`
--

INSERT INTO `borrowed_items` (`id`, `department`, `adm_number`, `full_names`, `class`, `stream`, `serial_number`, `item_title`, `item_description`, `date_borrowed`, `status`) VALUES
(1, 'mathematics', 567, 'evan skimeu musyki', 'Form 3', 'West', 'ct203/0013/16', 'made familiar ', '2020 edition', 'Friday, 22/05/2020 06:25:36 AM', 'CLEARED'),
(2, 'mathematics', 567, 'evan skimeu musyki', 'Form 3', 'West', 'ct203/0013/16', 'made familiar ', '2020 edition', 'Friday, 22/05/2020 10:25:52 PM', 'CLEARED'),
(3, 'SCIENCES', 78387, 'joy gakiii', 'Form 4', 'South', 'klb-gv/003/129', 'KLB BOOK 4', 'issued with the KLB books 5th edition delivered by the government', 'Wednesday, 10/06/2020 01:28:38 PM', 'CLEARED'),
(4, 'SCIENCES', 450, 'muthoki gakii', 'Form 4', 'South', 'eng-204/210', 'English Aid 2020', '2020 latest edition of English Aid', 'Wednesday, 10/06/2020 02:07:53 PM', 'CLEARED'),
(5, 'humanities', 555, 'new student', 'Form 4', 'West', 'hist-203/klb/300', 'high flyer history', '2020 3rd edition high flyer', 'Wednesday, 10/06/2020 08:21:52 PM', 'BORROWED');

-- --------------------------------------------------------

--
-- Table structure for table `clearance_status`
--

CREATE TABLE `clearance_status` (
  `id` int(11) NOT NULL,
  `adm` varchar(50) NOT NULL,
  `names` varchar(50) NOT NULL,
  `mathematics` varchar(50) NOT NULL,
  `languages` varchar(100) NOT NULL,
  `sciences` varchar(100) NOT NULL,
  `humanities` varchar(100) NOT NULL,
  `finance` varchar(100) NOT NULL,
  `library` varchar(100) NOT NULL,
  `others` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `clearance_status`
--

INSERT INTO `clearance_status` (`id`, `adm`, `names`, `mathematics`, `languages`, `sciences`, `humanities`, `finance`, `library`, `others`) VALUES
(1, '567', 'evans kimeu musyoki', 'CLEARED', 'WAITING', 'CLEARED', 'WAITING', 'WAITING', 'WAITING', 'WAITING'),
(2, '450', 'muthoki gakii', 'CLEARED', 'CLEARED', 'CLEARED', 'CLEARED', 'CLEARED', 'CLEARED', 'CLEARED'),
(3, '555', 'new student', 'CLEARED', 'WAITING', 'WAITING', 'WAITING', 'WAITING', 'WAITING', 'WAITING');

-- --------------------------------------------------------

--
-- Table structure for table `cleared_students`
--

CREATE TABLE `cleared_students` (
  `id` int(11) NOT NULL,
  `admnumber` varchar(100) NOT NULL,
  `fullnames` varchar(100) NOT NULL,
  `student_email` varchar(100) NOT NULL,
  `gender` varchar(100) NOT NULL,
  `class_admitted` varchar(100) NOT NULL,
  `receipt_number` varchar(100) NOT NULL,
  `phone` int(50) NOT NULL,
  `date_completed` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cleared_students`
--

INSERT INTO `cleared_students` (`id`, `admnumber`, `fullnames`, `student_email`, `gender`, `class_admitted`, `receipt_number`, `phone`, `date_completed`) VALUES
(2, '450', 'muthoki gakii', 'muthoni@gmail.com', 'Female', 'Form 3 East', '1590306609', 0, 'Sunday, 24/05/2020 09:50:09 AM');

-- --------------------------------------------------------

--
-- Table structure for table `departments`
--

CREATE TABLE `departments` (
  `id` int(11) NOT NULL,
  `department` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `headed_by` varchar(100) NOT NULL,
  `phone` int(50) NOT NULL,
  `date_registered` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `departments`
--

INSERT INTO `departments` (`id`, `department`, `email`, `password`, `headed_by`, `phone`, `date_registered`) VALUES
(3, 'mathematics', 'maths@gmail.com', 'password', 'evans kimeu musyoki', 720882594, 'Sunday, 24/05/2020 11:03:48 PM'),
(4, 'SCIENCES', 'science@gmail.com', 'science', 'jefferson edwin', 720202020, 'Wednesday, 10/06/2020 11:17:26 AM'),
(5, 'humanities', 'humanities@gmail.com', 'humanities', 'new humanities', 899999999, 'Wednesday, 10/06/2020 08:18:02 PM');

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `id` int(11) NOT NULL,
  `adm` int(50) NOT NULL,
  `fullnames` varchar(100) NOT NULL,
  `student_email` varchar(50) NOT NULL,
  `phone` int(100) NOT NULL,
  `student_picture` varchar(200) NOT NULL,
  `gender` varchar(100) NOT NULL,
  `student_class` varchar(100) NOT NULL,
  `security_quiz` varchar(100) NOT NULL,
  `security_ans` varchar(100) NOT NULL,
  `date_enrolled` varchar(100) NOT NULL,
  `password` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`id`, `adm`, `fullnames`, `student_email`, `phone`, `student_picture`, `gender`, `student_class`, `security_quiz`, `security_ans`, `date_enrolled`, `password`) VALUES
(1, 567, 'evans kimeu musyoki', 'intruder@gmail.com', 0, '1590189122.jpg', 'male', '4 North', 'My best Subject', 'Chemistry', '', 'intruder'),
(2, 120, 'onesmus muange kingoo', 'onesmus@gmail.com', 0, '', 'Male', 'Form 2 South', '', '', '', '12345678'),
(3, 300, 'james mutuku musyoki', 'mutuku@gmail.com', 0, '', 'Male', 'Form 2 South', '', '', '', '12345678'),
(4, 890, 'faith mutanu mwendwa', 'faith@gmail.com', 0, '1590197187.jpg', 'Female', 'Form 4 North', '', '', 'Saturday, 23/05/2020 03:23:06 AM', '12345678'),
(5, 450, 'muthoki gakii', 'muthoni@gmail.com', 0, '1590410279.jpg', 'Female', 'Form 3 East', 'My Best Teacher', 'deputy', 'Saturday, 23/05/2020 03:33:50 AM', '12345678'),
(6, 555, 'new student', 'newstudent@gmail.com', 0, '', 'Female', 'Form 4 West', 'My Best Subject', 'geography', 'Wednesday, 10/06/2020 07:31:48 PM', '12345678');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `borrowed_items`
--
ALTER TABLE `borrowed_items`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `clearance_status`
--
ALTER TABLE `clearance_status`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cleared_students`
--
ALTER TABLE `cleared_students`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `departments`
--
ALTER TABLE `departments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `borrowed_items`
--
ALTER TABLE `borrowed_items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `clearance_status`
--
ALTER TABLE `clearance_status`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `cleared_students`
--
ALTER TABLE `cleared_students`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `departments`
--
ALTER TABLE `departments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
