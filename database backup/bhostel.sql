-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Nov 28, 2016 at 07:38 PM
-- Server version: 10.1.16-MariaDB
-- PHP Version: 5.6.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bhostel`
--
CREATE DATABASE IF NOT EXISTS `bhostel` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `bhostel`;

-- --------------------------------------------------------

--
-- Table structure for table `fees_details`
--

CREATE TABLE `fees_details` (
  `month_code` int(11) NOT NULL,
  `per_day` int(11) NOT NULL,
  `days_in_month` int(11) NOT NULL,
  `total_fees` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `fees_details`
--

INSERT INTO `fees_details` (`month_code`, `per_day`, `days_in_month`, `total_fees`) VALUES
(201601, 50, 30, 1500),
(201603, 45, 30, 1350),
(201604, 50, 26, 1300),
(201605, 39, 25, 975),
(201606, 35, 30, 1050),
(201703, 50, 30, 1500);

-- --------------------------------------------------------

--
-- Table structure for table `leave_form`
--

CREATE TABLE `leave_form` (
  `sno` bigint(20) NOT NULL,
  `month` bigint(20) NOT NULL,
  `reg_no` bigint(20) NOT NULL,
  `from_date` varchar(15) NOT NULL,
  `to_date` varchar(15) NOT NULL,
  `no_of_days` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `leave_form`
--

INSERT INTO `leave_form` (`sno`, `month`, `reg_no`, `from_date`, `to_date`, `no_of_days`) VALUES
(1, 201609, 14322013, '19-09-2016', '21-09-2016', 3),
(2, 201609, 14322028, '2016-09-15', '2016-09-17', 172800),
(3, 201609, 14322013, '2016-09-22', '2016-09-25', 3),
(4, 201603, 14322013, '2016-03-16', '2016-03-21', 5);

-- --------------------------------------------------------

--
-- Table structure for table `paid_receipt`
--

CREATE TABLE `paid_receipt` (
  `sno` bigint(20) NOT NULL,
  `reg_no` bigint(20) NOT NULL,
  `receipt_date` varchar(30) NOT NULL,
  `amt` int(11) NOT NULL,
  `verification` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `staff`
--

CREATE TABLE `staff` (
  `staff_id` bigint(20) NOT NULL,
  `name` varchar(30) NOT NULL,
  `email` varchar(35) NOT NULL,
  `password` varchar(30) NOT NULL,
  `IsActive` int(11) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `staff`
--

INSERT INTO `staff` (`staff_id`, `name`, `email`, `password`, `IsActive`) VALUES
(1001, 'Dr.A.Ramanathan', 'ramanathan@gmail.com', '1111', 1),
(1002, 'manikandan', 'mani@gmail.com', '1111', 1),
(1003, 'dhevan', 'dhevan@gmail.com', '1111', 1);

-- --------------------------------------------------------

--
-- Table structure for table `student_details`
--

CREATE TABLE `student_details` (
  `reg_no` bigint(20) NOT NULL,
  `fname` varchar(30) NOT NULL,
  `lname` varchar(30) DEFAULT NULL,
  `father_name` varchar(30) NOT NULL,
  `address` varchar(50) DEFAULT NULL,
  `course` varchar(20) DEFAULT NULL,
  `phone` bigint(20) NOT NULL,
  `email` varchar(35) DEFAULT NULL,
  `password` varchar(30) DEFAULT NULL,
  `IsActive` int(11) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student_details`
--

INSERT INTO `student_details` (`reg_no`, `fname`, `lname`, `father_name`, `address`, `course`, `phone`, `email`, `password`, `IsActive`) VALUES
(14322013, 'Mathavaprakash', 'A', 'Amutharaj', 'Palani,Dindigul', 'MCA', 7871270230, 'madhhy@gmail.com', '1111', 1),
(14322014, 'ddd', 'Ddd', 'ramudd', 'Chennai', 'B.Sc(Maths)', 7878787874, 'raja@gmail.co', '1112', 1),
(15212102, 'Sivaguru', 'raji', 'Muht', 'mumbai', 'MA Hindhi', 7871270230, NULL, '1111', 1);

-- --------------------------------------------------------

--
-- Table structure for table `student_fees`
--

CREATE TABLE `student_fees` (
  `sno` bigint(20) NOT NULL,
  `reg_no` bigint(20) NOT NULL,
  `month_code` varchar(15) NOT NULL,
  `leave_days` int(11) NOT NULL,
  `reduction` int(11) NOT NULL,
  `bill_amt` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `leave_form`
--
ALTER TABLE `leave_form`
  ADD PRIMARY KEY (`sno`);

--
-- Indexes for table `paid_receipt`
--
ALTER TABLE `paid_receipt`
  ADD PRIMARY KEY (`sno`);

--
-- Indexes for table `staff`
--
ALTER TABLE `staff`
  ADD PRIMARY KEY (`staff_id`);

--
-- Indexes for table `student_details`
--
ALTER TABLE `student_details`
  ADD PRIMARY KEY (`reg_no`);

--
-- Indexes for table `student_fees`
--
ALTER TABLE `student_fees`
  ADD PRIMARY KEY (`sno`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `leave_form`
--
ALTER TABLE `leave_form`
  MODIFY `sno` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `paid_receipt`
--
ALTER TABLE `paid_receipt`
  MODIFY `sno` bigint(20) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `student_fees`
--
ALTER TABLE `student_fees`
  MODIFY `sno` bigint(20) NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
