-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 12, 2022 at 07:43 AM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `school_management`
--

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `contactid` int(11) NOT NULL,
  `contactfirstName` varchar(100) NOT NULL,
  `contactlastName` varchar(100) NOT NULL,
  `contactemail` varchar(100) NOT NULL,
  `contactphone` int(100) NOT NULL,
  `contactgender` enum('male','female') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`contactid`, `contactfirstName`, `contactlastName`, `contactemail`, `contactphone`, `contactgender`) VALUES
(21, 'Waseem', 'Akhter', 's@gmail.com', 212121, 'male'),
(22, 'Khalid', 'Akhter', 's@gmail.com', 2121, 'male'),
(23, 'Waseem', 'Akhter', 's@gmail.com', 212121, 'male'),
(24, 'Waseem', 'Akhter', 's@gmail.com', 2121, 'male');

-- --------------------------------------------------------

--
-- Table structure for table `login_tbl`
--

CREATE TABLE `login_tbl` (
  `id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `usertype` int(11) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `login_tbl`
--

INSERT INTO `login_tbl` (`id`, `username`, `password`, `usertype`, `status`) VALUES
(1, 'admin', 'admin', 1, 1),
(2, 'ahsan', 'ahsan', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `parent`
--

CREATE TABLE `parent` (
  `parentid` int(11) NOT NULL,
  `parentfirstName` varchar(100) NOT NULL,
  `parentlastName` varchar(100) NOT NULL,
  `parentemail` varchar(100) NOT NULL,
  `parentphone` int(100) NOT NULL,
  `parentgender` enum('male','female') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `parent`
--

INSERT INTO `parent` (`parentid`, `parentfirstName`, `parentlastName`, `parentemail`, `parentphone`, `parentgender`) VALUES
(27, 'Muhammad', 'Naseem', 'a@gmail.com', 212121, 'male'),
(28, 'Adad', 'Naseem', 'a@gmail.com', 212121, 'male'),
(29, 'Muhammad', 'Naseem', 'a@gmail.com', 212121, 'male'),
(30, 'Muhammad', 'Akhter', 'a@gmail.com', 212121, 'male');

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `id` int(11) NOT NULL,
  `stdid` int(50) DEFAULT NULL,
  `firstName` varchar(100) NOT NULL,
  `lastName` varchar(100) NOT NULL,
  `email` varchar(100) DEFAULT NULL,
  `phone` int(50) NOT NULL,
  `gender` enum('male','female') NOT NULL,
  `address` varchar(200) NOT NULL,
  `dob` date NOT NULL,
  `subject` varchar(100) NOT NULL,
  `campus` varchar(100) NOT NULL,
  `parentid` int(11) NOT NULL,
  `contactid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`id`, `stdid`, `firstName`, `lastName`, `email`, `phone`, `gender`, `address`, `dob`, `subject`, `campus`, `parentid`, `contactid`) VALUES
(35, 3333, 'Muhammad', 'Ahsan', 'ahan.muh123@gmail.com', 2147483647, 'male', 'karachi', '2022-03-31', 'English', 'gulshan', 29, 23),
(36, 1234, 'Sharjeel', 'Mukhtar', 'admin@techlozi.com', 2147483647, 'male', 'asasa', '2022-03-02', 'English', 'PECHS', 30, 24);

-- --------------------------------------------------------

--
-- Table structure for table `subject`
--

CREATE TABLE `subject` (
  `subj_id` int(11) NOT NULL,
  `subject` varchar(100) NOT NULL,
  `add_on` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `subject`
--

INSERT INTO `subject` (`subj_id`, `subject`, `add_on`) VALUES
(3, 'Islamiat', '2022-03-10'),
(4, 'English', '2022-03-10'),
(5, 'Urdu', '2022-03-10'),
(6, 'chemistry', '2022-03-10'),
(7, 'Physics', '2022-03-10'),
(8, 'ICT', '2022-03-10'),
(9, 'Arts', '2022-03-10'),
(10, 'PST', '2022-03-10'),
(11, 'Photography', '2022-03-10'),
(12, 'Music', '2022-03-10'),
(13, 'Business', '2022-03-10');

-- --------------------------------------------------------

--
-- Table structure for table `teacher`
--

CREATE TABLE `teacher` (
  `id` int(11) NOT NULL,
  `firstName` varchar(100) DEFAULT NULL,
  `lastName` varchar(100) DEFAULT NULL,
  `gender` enum('male','female') DEFAULT NULL,
  `address` varchar(200) DEFAULT NULL,
  `dob` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `teacher`
--

INSERT INTO `teacher` (`id`, `firstName`, `lastName`, `gender`, `address`, `dob`) VALUES
(1, 'Muhammad', 'Ahsan', 'male', 'karachi', '2019-07-21'),
(2, 'Asad', 'Zulfiqar', 'male', 'karachi', '1919-08-09'),
(3, 'Waseem', 'Akher', 'male', 'karachi', '2022-02-20');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`contactid`);

--
-- Indexes for table `login_tbl`
--
ALTER TABLE `login_tbl`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `parent`
--
ALTER TABLE `parent`
  ADD PRIMARY KEY (`parentid`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sub_id` (`subject`),
  ADD KEY `c_id` (`campus`),
  ADD KEY `parentid` (`parentid`),
  ADD KEY `contactid` (`contactid`);

--
-- Indexes for table `subject`
--
ALTER TABLE `subject`
  ADD PRIMARY KEY (`subj_id`);

--
-- Indexes for table `teacher`
--
ALTER TABLE `teacher`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `contactid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `login_tbl`
--
ALTER TABLE `login_tbl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `parent`
--
ALTER TABLE `parent`
  MODIFY `parentid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `subject`
--
ALTER TABLE `subject`
  MODIFY `subj_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `teacher`
--
ALTER TABLE `teacher`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
