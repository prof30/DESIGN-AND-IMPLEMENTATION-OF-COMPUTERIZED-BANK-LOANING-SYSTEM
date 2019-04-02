-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 19, 2018 at 11:06 PM
-- Server version: 10.1.22-MariaDB
-- PHP Version: 7.1.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `onlinebankuba`
--

-- --------------------------------------------------------

--
-- Table structure for table `account`
--

CREATE TABLE `account` (
  `user_id` int(11) NOT NULL,
  `fullname` varchar(255) NOT NULL,
  `acctName` varchar(255) NOT NULL,
  `acctNumber` varchar(50) NOT NULL,
  `Address` varchar(255) NOT NULL,
  `Email` varchar(100) NOT NULL,
  `phone` varchar(50) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `status` varchar(10) NOT NULL,
  `dob` varchar(10) NOT NULL,
  `state` varchar(20) NOT NULL,
  `lga` varchar(50) NOT NULL,
  `photo` varchar(255) NOT NULL,
  `Amount` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `account`
--

INSERT INTO `account` (`user_id`, `fullname`, `acctName`, `acctNumber`, `Address`, `Email`, `phone`, `gender`, `status`, `dob`, `state`, `lga`, `photo`, `Amount`) VALUES
(1, 'Okoh Emmanuel', 'Okoh O. Emmanuel', '2305821', ' Mission Road', ' mine4christ@gmail.com', ' 2348164293279', 'Male', 'Single', '2018-11-12', 'Delta', 'Ughelli North', 'Alternative0003.jpg', ''),
(2, 'Okoh Emmanuel Oghenemine', 'Okoh Oghenemine Emma', '2305822', 'Mission Road', 'mine4christ@gmail.com', ' 2348019927283', 'Male', 'Single', '2018-11-12', 'Anambra', 'Awka South', 'Alternative0003.jpg', '2000');

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`) VALUES
(1, 'prof30', 'da39a3ee5e6b4b0d3255bfef95601890afd80709');

-- --------------------------------------------------------

--
-- Table structure for table `transaction`
--

CREATE TABLE `transaction` (
  `id` int(11) NOT NULL,
  `acctNumber` varchar(100) NOT NULL,
  `NameOfDep` varchar(100) NOT NULL,
  `credited` varchar(100) NOT NULL,
  `Debited` varchar(100) NOT NULL,
  `DateofDebit` datetime NOT NULL,
  `DateofCredit` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transaction`
--

INSERT INTO `transaction` (`id`, `acctNumber`, `NameOfDep`, `credited`, `Debited`, `DateofDebit`, `DateofCredit`) VALUES
(1, '2305822', 'Emmanuel Okoh', '12000', '', '0000-00-00 00:00:00', '2018-11-15 00:00:00'),
(2, '2305822', 'John Peter', '800', '', '0000-00-00 00:00:00', '2018-11-15 00:00:00'),
(3, '2305822', '', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(4, '2305822', '', '', '8000', '2018-11-15 00:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `title` varchar(50) NOT NULL,
  `surname` varchar(100) NOT NULL,
  `firstname` varchar(100) NOT NULL,
  `lastname` varchar(100) NOT NULL,
  `accountname` varchar(100) NOT NULL,
  `accountnumber` varchar(100) NOT NULL,
  `typeofacct` varchar(100) NOT NULL,
    `debitcard` varchar(100) NOT NULL,
     `validity` date NOT NULL,
  `dateofbirth` date NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `sex` varchar(10) NOT NULL,
  `status` varchar(20) NOT NULL,
  `Occupation` varchar(50) NOT NULL,
  `country` varchar(100) NOT NULL,
  `state` varchar(100) NOT NULL,
  `lga` varchar(150) NOT NULL,
  `town` varchar(20) NOT NULL,
  `address` varchar(200) NOT NULL,
  `address2` varchar(200) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `phone2` varchar(20) NOT NULL,
  `nextofkin` varchar(20) NOT NULL,
  `nextofkinphone` varchar(20) NOT NULL,
  `photo` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `title`, `surname`, `firstname`, `lastname`, `accountname`, `accountnumber`, `dateofbirth`, `email`, `password`, `sex`, `status`, `country`, `state`, `lga`, `address`, `address2`, `phone`, `phone2`, `photo`) VALUES
(1, 'Mr', 'Emmanuel', 'Emmanuel', 'Iwuchukwu', 'okoh Emmanuel', '2305821', '2018-11-25', 'mine2@gmail.com', '12345', 'male', 'single', 'Nigerria', 'Anambra', 'Ughelli', 'Atani/Akili road', 'Atani/akili', '2348164293279', '234081647747', 'OKOH EMMANUEL OGHENEMINE - Copy.jpg'),
(2, 'Mr', 'Emmanuel', 'Emmanuel', 'Iwuchukwu', 'okoh Emmanuel', '2305822', '2018-11-25', 'mine@gmail.com', '12345', 'male', 'single', 'Nigerria', 'Anambra', 'Ughelli', 'Atani/Akili road', 'Atani/akili', '2348164293279', '234081647747', 'OKOH EMMANUEL OGHENEMINE - Copy.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `account`
--
ALTER TABLE `account`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transaction`
--
ALTER TABLE `transaction`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `account`
--
ALTER TABLE `account`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `transaction`
--
ALTER TABLE `transaction`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
