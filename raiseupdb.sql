-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3308
-- Generation Time: Apr 09, 2023 at 06:43 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `raiseupdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `campaign`
--

CREATE TABLE `campaign` (
  `campaignID` int(11) NOT NULL,
  `userID` int(11) NOT NULL,
  `title` varchar(45) NOT NULL,
  `description` text DEFAULT NULL,
  `goalAmount` double DEFAULT NULL,
  `currentAmount` double DEFAULT NULL,
  `statusID` int(11) NOT NULL,
  `createdAt` timestamp NULL DEFAULT current_timestamp(),
  `updatedAt` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `categoryID` int(20) NOT NULL,
  `currency` char(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `campaign`
--

INSERT INTO `campaign` (`campaignID`, `userID`, `title`, `description`, `goalAmount`, `currentAmount`, `statusID`, `createdAt`, `updatedAt`, `categoryID`, `currency`) VALUES
(3, 7, 'Raising Money for Saving Koalas', 'This is a critical effort to preserve one of the world\'s most iconic and beloved animals. These adorable creatures are facing extinction due to habitat loss, bushfires, and climate change. The funds raised will go towards the rescue, rehabilitation, and long-term conservation of koalas and their habitats. By supporting this cause, we can help provide essential medical care, support wildlife sanctuaries, and fund scientific research to better understand and protect these fascinating animals. Every donation can make a difference and help ensure that future generations will have the chance to appreciate the unique and valuable contributions of koalas to our planet.', 1000000, 0, 1, '2023-04-06 20:07:43', '2023-04-06 20:07:43', 1, '$'),
(4, 12, 'testing', 'this is a test', 50000, 0, 1, '2023-04-06 23:33:40', '2023-04-06 23:33:40', 1, '$'),
(5, 8, 'another one', 'lorem ipsim', 52000, 0, 1, '2023-04-07 01:31:19', '2023-04-07 01:31:19', 2, '$'),
(6, 10, 'Raising Money for Saving tigers', 'adasdasdasdasda', 500000, 0, 1, '2023-04-07 01:38:51', '2023-04-07 01:38:51', 1, '$'),
(7, 7, 'testing 2', 'afasdfsdfasdfads', 457865, 0, 1, '2023-04-07 01:48:07', '2023-04-07 01:48:07', 3, '$'),
(8, 7, 'testing 2', 'afasdfsdfasdfads', 457865, 0, 1, '2023-04-07 01:48:56', '2023-04-07 01:48:56', 3, '$'),
(9, 7, 'testing 2', 'afasdfsdfasdfads', 457865, 0, 1, '2023-04-07 01:48:56', '2023-04-07 01:48:56', 3, '$'),
(10, 7, 'testing 2', 'afasdfsdfasdfads', 457865, 0, 1, '2023-04-07 01:48:56', '2023-04-07 01:48:56', 3, '$');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `categoryID` int(11) NOT NULL,
  `categoryName` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`categoryID`, `categoryName`) VALUES
(1, 'Charity Fundraising'),
(2, 'Creative Projects'),
(3, 'Content Creator and Artists');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `roleID` int(1) NOT NULL,
  `roleName` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`roleID`, `roleName`) VALUES
(1, 'Donor'),
(2, 'Fundraiser'),
(3, 'Admin');

-- --------------------------------------------------------

--
-- Table structure for table `status`
--

CREATE TABLE `status` (
  `statusID` int(11) NOT NULL,
  `status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `status`
--

INSERT INTO `status` (`statusID`, `status`) VALUES
(1, 'Active'),
(2, 'Completed'),
(3, 'Suspended'),
(4, 'Cancelled');

-- --------------------------------------------------------

--
-- Table structure for table `user_info`
--

CREATE TABLE `user_info` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `username` varchar(25) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(20) NOT NULL,
  `roleID` int(1) NOT NULL,
  `organization` varchar(50) DEFAULT NULL,
  `address` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_info`
--

INSERT INTO `user_info` (`id`, `name`, `username`, `email`, `password`, `roleID`, `organization`, `address`) VALUES
(1, 'saad', 'saad123', 'saad@gmail.com', '1234', 1, NULL, NULL),
(2, 'sakib', 'sakib75', 'sakib@gmail.com', '7575', 1, NULL, NULL),
(3, 'NGolo Kante', 'Kante', 'kante@chelsea.com', 'chelsea123', 2, NULL, NULL),
(5, 'NRG Ardiis', 'ardiis', 'ardiis@nrg.com', 'ardiis123', 1, NULL, NULL),
(7, 'Drich', 'admin', 'admin@raiseup.com', 'admin123', 3, '', ''),
(8, 'johnathon trott', 'john', 'john@testing.com', 'john123', 1, NULL, NULL),
(9, 'Nrg Som', 'som', 'som@nrg.com', 'som123', 3, NULL, NULL),
(10, 'Sen Tenz', 'tenz', 'tenz@sentinels.com', 'tenz123', 1, NULL, NULL),
(12, 'Loud Aspas', 'aspas', 'aspas@loud.com', 'aspas123', 2, NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `campaign`
--
ALTER TABLE `campaign`
  ADD PRIMARY KEY (`campaignID`),
  ADD KEY `userID` (`userID`),
  ADD KEY `fk_category` (`categoryID`),
  ADD KEY `statusfk` (`statusID`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`categoryID`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`roleID`);

--
-- Indexes for table `status`
--
ALTER TABLE `status`
  ADD PRIMARY KEY (`statusID`);

--
-- Indexes for table `user_info`
--
ALTER TABLE `user_info`
  ADD PRIMARY KEY (`id`),
  ADD KEY `roleID` (`roleID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `campaign`
--
ALTER TABLE `campaign`
  MODIFY `campaignID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `categoryID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `status`
--
ALTER TABLE `status`
  MODIFY `statusID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `user_info`
--
ALTER TABLE `user_info`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `campaign`
--
ALTER TABLE `campaign`
  ADD CONSTRAINT `campaign_ibfk_1` FOREIGN KEY (`userID`) REFERENCES `user_info` (`id`),
  ADD CONSTRAINT `fk_category` FOREIGN KEY (`categoryID`) REFERENCES `category` (`categoryID`),
  ADD CONSTRAINT `statusfk` FOREIGN KEY (`statusID`) REFERENCES `status` (`statusID`);

--
-- Constraints for table `user_info`
--
ALTER TABLE `user_info`
  ADD CONSTRAINT `user_info_ibfk_1` FOREIGN KEY (`roleID`) REFERENCES `roles` (`roleID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
