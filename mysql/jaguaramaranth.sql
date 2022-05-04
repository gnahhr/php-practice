-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 04, 2022 at 09:34 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `jaguaramaranth`
--

-- --------------------------------------------------------

--
-- Table structure for table `account`
--

CREATE TABLE `account` (
  `id` int(11) NOT NULL,
  `firstName` varchar(50) NOT NULL,
  `lastName` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `clearanceLevel` varchar(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `account`
--

INSERT INTO `account` (`id`, `firstName`, `lastName`, `email`, `password`, `clearanceLevel`) VALUES
(1, 'super', 'admin', 'superadmin@test.com', 'superadmin', 'superadmin'),
(2, 'Employee1', '1', 'Employee1@test.com', 'Employee1', 'Employee'),
(3, 'Employee', '2', 'Employee2@test.com', 'Employee2', 'Employee'),
(4, 'Student', '1', 'Student1@test.com', 'Student1', 'Student'),
(5, 'Student', '2', 'Student1@test.com', 'Student2', 'Student'),
(6, 'Student', '3', 'Student3@test.com', 'Student3', 'Student'),
(7, 'Visitor', '1', 'Visitor1@test.com', 'Visitor1', 'Visitor'),
(8, 'Visitor', '2', 'Visitor2@test.com', 'Visitor2', 'Visitor'),
(9, 'Visitor', '3', 'Visitor3@test.com', 'Visitor3', 'Visitor'),
(10, 'Test', 'Jer', 'testjer@email.com', 'testjer', 'Student'),
(11, 'testjer1@email.com', 'testjer1@email.com', 'testjer1@email.com', 'testjer1@email.com', 'Employee'),
(12, 'testjer2@email.com', 'testjer2@email.com', 'testjer2@email.com', 'testjer2@email.com', 'superadmin'),
(13, 'Riel', 'Something', '123@gmail.com', '123', 'superadmin');

-- --------------------------------------------------------

--
-- Table structure for table `audit`
--

CREATE TABLE `audit` (
  `id` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `name` varchar(120) NOT NULL,
  `date` date NOT NULL,
  `timeIn` time NOT NULL,
  `timeOut` time DEFAULT NULL,
  `office` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `audit`
--

INSERT INTO `audit` (`id`, `userid`, `name`, `date`, `timeIn`, `timeOut`, `office`) VALUES
(3, 1, 'super admin', '2022-05-04', '03:25:02', '03:30:52', '1');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `account`
--
ALTER TABLE `account`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `audit`
--
ALTER TABLE `audit`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `account`
--
ALTER TABLE `account`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `audit`
--
ALTER TABLE `audit`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
