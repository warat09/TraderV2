-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 23, 2022 at 03:57 AM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 8.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `beebacop`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` int(100) NOT NULL,
  `name` varchar(200) NOT NULL,
  `surname` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL,
  `money` double NOT NULL,
  `YOUTUBE` varchar(50) DEFAULT NULL,
  `STATUSBOT` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `name`, `surname`, `email`, `password`, `money`, `YOUTUBE`, `STATUSBOT`) VALUES
(1, 'วรัศฐ์', 'เย็นใจประเสริฐ', 'beebacorporation@gmail.com', 'masterbeeba', 0, 'ejRJmclT0KQ', 'OFF'),
(2, 'นโรดม\r\n', 'ญาตินิมิตร', 'afterlevisp@hotmail.com', 'masterleaf', 0, 'wdgJsAN3OpU', 'OFF'),
(3, 'Mrsilent', 'SiGz', 'mrsilent7797@gmail.com', 'mastersigz', 0, 'StIDac2-keA', 'OFF');

-- --------------------------------------------------------

--
-- Table structure for table `billing_information`
--

CREATE TABLE `billing_information` (
  `DATEANDHR` varchar(200) NOT NULL,
  `EMAIL` varchar(200) NOT NULL,
  `MONEY` double NOT NULL,
  `DATE` varchar(200) NOT NULL,
  `HM` varchar(200) NOT NULL,
  `IMAGE` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `oldbilling_information`
--

CREATE TABLE `oldbilling_information` (
  `DATEANDHR` varchar(200) NOT NULL,
  `EMAIL` varchar(200) NOT NULL,
  `MONEY` double NOT NULL,
  `DATE` varchar(200) NOT NULL,
  `HM` varchar(200) NOT NULL,
  `IMAGE` varchar(200) NOT NULL,
  `STATUS` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `oldwithdrawn_information`
--

CREATE TABLE `oldwithdrawn_information` (
  `DATEANDHR` varchar(200) NOT NULL,
  `EMAIL` varchar(200) NOT NULL,
  `BANK` varchar(200) NOT NULL,
  `IDBANK` varchar(200) NOT NULL,
  `MONEY` double NOT NULL,
  `STATUS` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `ID` int(100) NOT NULL,
  `NAME` varchar(200) NOT NULL,
  `SURNAME` varchar(200) NOT NULL,
  `EMAIL` varchar(200) NOT NULL,
  `PASSWORD` varchar(200) NOT NULL,
  `PHONE` int(100) NOT NULL,
  `MONEY` double NOT NULL,
  `INVESTMONEY` double NOT NULL,
  `INVESTDATE` varchar(200) NOT NULL,
  `profile_image` varchar(200) NOT NULL,
  `TOKEN` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`ID`, `NAME`, `SURNAME`, `EMAIL`, `PASSWORD`, `PHONE`, `MONEY`, `INVESTMONEY`, `INVESTDATE`, `profile_image`, `TOKEN`) VALUES
(1, 'วรัศฐ์', 'เย็นใจประเสริฐ', 'ytitle7797@gmail.com', '55', 1515355, 0, 0, '', 'firstbegin.png', '70e7d7b90c25987a21cb52f636f0007a2f8227e341af5ccd33bdd037a3eefef9a86938543ff2430199eae730d6f9c8887aac');

-- --------------------------------------------------------

--
-- Table structure for table `withdrawn_information`
--

CREATE TABLE `withdrawn_information` (
  `DATEANDHR` varchar(200) NOT NULL,
  `EMAIL` varchar(200) NOT NULL,
  `BANK` varchar(200) NOT NULL,
  `IDBANK` varchar(200) NOT NULL,
  `MONEY` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `ID` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
