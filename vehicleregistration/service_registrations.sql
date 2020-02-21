-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 21, 2020 at 12:56 PM
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
  `timeSlot` varchar(5) NOT NULL,
  `vehicleIssue` varchar(50) NOT NULL,
  `serviceCenter` varchar(10) NOT NULL,
  `status` varchar(10) NOT NULL DEFAULT 'pending',
  `createdDate` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `service_registrations`
--

INSERT INTO `service_registrations` (`serviceId`, `userId`, `title`, `vehicleNumber`, `licenseNumber`, `date`, `timeSlot`, `vehicleIssue`, `serviceCenter`, `status`, `createdDate`) VALUES
(10, 16, 'repair', 'gj 01 fb 71', 'gj 258532566', '2022-05-02', '10-11', 'repair', 'Service2', 'pending', '2020-02-21'),
(11, 16, 'repairs', 'gj 01 fb 71', 'gj 258532566s', '2022-05-02', '10-11', 'repair', 'Service2', 'pending', '2020-02-21'),
(12, 17, 'repair', 'gj 01 fb 75', 'gj 2585325656', '2022-05-02', '10-11', 'repairss', 'Service3', 'pending', '2020-02-21'),
(13, 17, 'repair', 'gj 02 fb 79', 'gj 2585656', '2022-05-02', '10-11', 'wheels repair', 'Service3', 'pending', '2020-02-21');

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
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `service_registrations`
--
ALTER TABLE `service_registrations`
  MODIFY `serviceId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `service_registrations`
--
ALTER TABLE `service_registrations`
  ADD CONSTRAINT `service_registrations_ibfk_1` FOREIGN KEY (`userId`) REFERENCES `users` (`userId`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
