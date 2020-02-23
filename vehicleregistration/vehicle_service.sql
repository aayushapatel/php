-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 23, 2020 at 06:23 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.2.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `vehicle_service`
--

-- --------------------------------------------------------

--
-- Table structure for table `service_registrations`
--

CREATE TABLE `service_registrations` (
  `serviceId` int(11) NOT NULL,
  `userId` int(11) NOT NULL,
  `title` varchar(20) NOT NULL,
  `vehicleNumber` varchar(11) NOT NULL,
  `licenseNumber` varchar(20) NOT NULL,
  `date` date NOT NULL,
  `timeSlot` varchar(6) NOT NULL,
  `vehicleIssue` varchar(50) NOT NULL,
  `serviceCenter` varchar(10) NOT NULL,
  `status` varchar(10) NOT NULL DEFAULT 'pending',
  `createdDate` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `service_registrations`
--

INSERT INTO `service_registrations` (`serviceId`, `userId`, `title`, `vehicleNumber`, `licenseNumber`, `date`, `timeSlot`, `vehicleIssue`, `serviceCenter`, `status`, `createdDate`) VALUES
(19, 18, 'repair', 'gj 01 fb 71', 'gj 258532566', '2022-06-02', '3-4', 'aa', 'Service2', 'pending', '2020-02-21'),
(20, 18, 'repair', 'gj 01 fb 88', 'gj 25853256ss', '2021-06-02', '10-11', 'aa', 'Service3', 'pending', '2020-02-21'),
(21, 19, 'repair', 'gj 01 fbskk', 'gj 258556s', '2020-12-02', '11-12', 'aa', 'Service3', 'approved', '2020-02-21'),
(22, 19, 'repair', 'gj 01 fbaa', 'gj 925633596', '2020-09-06', '9-10', 'aa', 'Service2', 'pending', '2020-02-21'),
(24, 19, 'repair', 'gj 01 fbskk', 'gj 258556s', '2020-12-02', '11-12', 'aa', 'Service3', 'approved', '2020-02-21'),
(25, 19, 'repair', 'gj 01 fbaa', 'gj 925633596', '2020-09-06', '9-10', 'aa', 'Service2', 'pending', '2020-02-21'),
(26, 19, 'repair', 'gj 01 fbskk', 'gj 258556s', '2020-12-02', '12-1', 'aa', 'Service3', 'approved', '2020-02-21'),
(27, 19, 'repair', 'gj 01 fbskk', 'gj 258556s', '2020-12-02', '11-12', 'aa', 'Service3', 'approved', '2020-02-21');

-- --------------------------------------------------------

--
-- Table structure for table `timeslot`
--

CREATE TABLE `timeslot` (
  `timeSlot` varchar(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `timeslot`
--

INSERT INTO `timeslot` (`timeSlot`) VALUES
('9-10'),
('10-11'),
('11-12'),
('12-1'),
('1-2'),
('2-3'),
('3-4'),
('4-5'),
('5-6');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `userId` int(11) NOT NULL,
  `firstName` varchar(20) NOT NULL,
  `lastName` varchar(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(40) NOT NULL,
  `phoneNumber` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`userId`, `firstName`, `lastName`, `email`, `password`, `phoneNumber`) VALUES
(18, 'aayusha', 'patel', 'imaayushapatel@gmail.com', '4124bc0a9335c27f086f24ba207a4912', 1234567890),
(19, 'aayusha', 'patel', 'aayusha@gmail.com', '4124bc0a9335c27f086f24ba207a4912', 1234567890);

-- --------------------------------------------------------

--
-- Table structure for table `user_addresses`
--

CREATE TABLE `user_addresses` (
  `addressId` int(11) NOT NULL,
  `userId` int(11) NOT NULL,
  `street` varchar(20) NOT NULL,
  `city` varchar(20) NOT NULL,
  `state` varchar(20) NOT NULL,
  `zipCode` int(6) NOT NULL,
  `country` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_addresses`
--

INSERT INTO `user_addresses` (`addressId`, `userId`, `street`, `city`, `state`, `zipCode`, `country`) VALUES
(15, 18, 'aa', 'aa', 'aa', 202020, 'aa'),
(16, 19, 'aa', 'aa', 'aa', 202020, 'aa');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `service_registrations`
--
ALTER TABLE `service_registrations`
  ADD PRIMARY KEY (`serviceId`),
  ADD KEY `userId` (`userId`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`userId`);

--
-- Indexes for table `user_addresses`
--
ALTER TABLE `user_addresses`
  ADD PRIMARY KEY (`addressId`),
  ADD KEY `user_addresses_ibfk_1` (`userId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `service_registrations`
--
ALTER TABLE `service_registrations`
  MODIFY `serviceId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `userId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `user_addresses`
--
ALTER TABLE `user_addresses`
  MODIFY `addressId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `service_registrations`
--
ALTER TABLE `service_registrations`
  ADD CONSTRAINT `service_registrations_ibfk_1` FOREIGN KEY (`userId`) REFERENCES `users` (`userId`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `user_addresses`
--
ALTER TABLE `user_addresses`
  ADD CONSTRAINT `user_addresses_ibfk_1` FOREIGN KEY (`userId`) REFERENCES `users` (`userId`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
