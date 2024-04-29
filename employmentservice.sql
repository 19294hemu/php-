-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 29, 2021 at 06:57 AM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `employmentservice`
--

-- --------------------------------------------------------

--
-- Table structure for table `booking`
--

CREATE TABLE `booking` (
  `id` int(20) NOT NULL,
  `bookingon` date NOT NULL DEFAULT current_timestamp(),
  `requiredpersonname` varchar(30) NOT NULL,
  `startdate` date NOT NULL,
  `enddate` date NOT NULL,
  `applicantname` varchar(30) NOT NULL,
  `requirment` varchar(50) NOT NULL,
  `status` varchar(20) NOT NULL,
  `workstatus` varchar(30) NOT NULL DEFAULT 'Work_in_progress',
  `token` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `booking`
--

INSERT INTO `booking` (`id`, `bookingon`, `requiredpersonname`, `startdate`, `enddate`, `applicantname`, `requirment`, `status`, `workstatus`, `token`) VALUES
(1, '2021-05-28', 'Ayyappa', '2021-05-27', '2021-05-29', 'kumar', 'software development', 'approved', 'Work_in_progress', ''),
(2, '2021-05-28', 'Sushma', '2021-05-25', '2021-05-27', 'rani', 'Marketing', 'approved', 'Work_in_progress', ''),
(4, '2021-05-29', 'Ramadevi', '2021-05-29', '2021-05-30', 'Latha', 'Training', 'approved', 'Work_Completed', '');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `fullname` varchar(30) NOT NULL,
  `fathername` varchar(30) NOT NULL,
  `dateofbirth` date NOT NULL,
  `registredon` date NOT NULL,
  `role` varchar(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  `phoneno` int(12) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL,
  `gender` varchar(20) NOT NULL,
  `education` varchar(255) NOT NULL,
  `skills` varchar(255) NOT NULL,
  `experience` varchar(30) NOT NULL,
  `projects` varchar(30) NOT NULL,
  `address` varchar(255) NOT NULL,
  `requirment` varchar(100) NOT NULL,
  `token` varchar(255) NOT NULL,
  `status` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `fullname`, `fathername`, `dateofbirth`, `registredon`, `role`, `email`, `phoneno`, `username`, `password`, `gender`, `education`, `skills`, `experience`, `projects`, `address`, `requirment`, `token`, `status`) VALUES
(1, 'Ayyappa', 'shiva', '2002-01-30', '2021-05-26', 'skilledperson', 'gg@gmail.com', 1231231234, 'ayyappa', 'ayyappa', 'Male', 'PG', 'All computer programming\'s', '7 years', '7', 'hyd \r\nhyd\r\nTS\r\nindia', 'software development', '', 'approved'),
(2, 'Admin', 'Admin', '1998-03-26', '2021-05-25', 'Admin', 'admin@gmail.com', 2147483647, 'admin', 'admin', 'Male', 'Masters', 'Master at all languages', '10 years', '7', 'USA\r\nUSA\r\nUSA', 'software development', '', ''),
(3, 'kumar', 'kumar', '2009-07-06', '2021-05-25', 'user', 'ku@gmail.com', 2147483647, 'kumar', 'kumar', 'Male', '', '', '', '', 'Hyd\r\nHyd\r\nTS', 'course required', '', 'approved'),
(4, 'Sushma', 'ram', '2017-08-12', '2021-05-25', 'skilledperson', 'sushma@gmail.com', 1231231234, 'sushma', 'sushma', 'Female', 'MBA', 'Marketing', '2 years', '2', 'HYD\r\nHYD\r\nTS', 'Marketing', '', 'approved'),
(5, 'Ramadevi', 'ramu', '2016-06-26', '2021-05-25', 'skilledperson', 'devi@gmail.com', 1231231234, 'ramadevi', 'ramadevi', 'Female', 'Degree', 'C, Cpp,java programming', '2 years', '2', 'HYD\r\nHYD\r\nTS', 'Training', '', 'approved'),
(6, 'Rani', 'Babu', '2011-10-26', '2021-05-25', 'user', 'rani@gmail.com', 1231231234, 'rani', 'rani', 'Female', '', '', '', '', 'HYD\r\nHYD\r\nTS', 'building construction ', '', 'approved'),
(7, 'Latha', 'Narayana', '2016-06-26', '2021-05-25', 'user', 'latha@gmail.com', 1231231234, 'latha', 'latha', 'Female', '', '', '', '', 'WGL\r\nWGL\r\nTS', 'health support', '', 'approved'),
(8, 'Manikanta', 'Shiva', '2012-06-27', '2021-05-27', 'skilledperson', 'g.kumar6789@gmail.com', 1231231234, 'mani', 'mani', 'Male', 'MBA', 'Marketing \r\nbusiness dev', '3 years', '3', 'HYd \r\nHyd \r\nTS', 'Marketing', '', 'approved');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `booking`
--
ALTER TABLE `booking`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `booking`
--
ALTER TABLE `booking`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
