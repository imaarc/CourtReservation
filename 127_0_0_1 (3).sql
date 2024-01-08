-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 06, 2024 at 06:18 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dbcourtreservation`
--
CREATE DATABASE IF NOT EXISTS `dbcourtreservation` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `dbcourtreservation`;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_court`
--

CREATE TABLE `tbl_court` (
  `courtId` int(10) NOT NULL,
  `userId` int(10) NOT NULL,
  `courtName` varchar(50) NOT NULL,
  `courtDetails` varchar(500) NOT NULL,
  `courtRates` varchar(500) NOT NULL,
  `courtType` varchar(55) NOT NULL,
  `courtLocation` varchar(50) NOT NULL,
  `courtContact` varchar(20) NOT NULL,
  `courtEmail` varchar(50) NOT NULL,
  `isActive` tinyint(1) NOT NULL DEFAULT 1,
  `dateAdded` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_court`
--

INSERT INTO `tbl_court` (`courtId`, `userId`, `courtName`, `courtDetails`, `courtRates`, `courtType`, `courtLocation`, `courtContact`, `courtEmail`, `isActive`, `dateAdded`) VALUES
(2, 6, 'Sharks Venue 2', 'Covered Court\r\n', '200', 'Basketball', 'Brgy.Estefania', '09123456789', 'sharks2@gmail.com', 1, '2023-12-26 17:07:21'),
(3, 6, 'Sharks Venue', 'Covered Court', '350', 'Basketball', 'Brgy. Estefania', '09569084621', 'sharks@gmail.com', 1, '2023-12-27 12:55:29'),
(4, 8, 'Villamonte Court', 'test', '150', 'Tennis', 'bcd', '09123456789', 'venue2@gmail.com', 1, '2024-01-06 13:06:02');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_court_reservation`
--

CREATE TABLE `tbl_court_reservation` (
  `courtReservationId` int(10) NOT NULL,
  `courtId` int(10) NOT NULL,
  `userId` int(10) NOT NULL,
  `payment` varchar(55) NOT NULL DEFAULT '0',
  `totalPayment` varchar(255) NOT NULL,
  `status` varchar(555) NOT NULL,
  `isActive` tinyint(1) NOT NULL DEFAULT 1,
  `dateAdded` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_court_reservation`
--

INSERT INTO `tbl_court_reservation` (`courtReservationId`, `courtId`, `userId`, `payment`, `totalPayment`, `status`, `isActive`, `dateAdded`) VALUES
(13, 2, 4, '1000', '2100', 'Pending Payment', 1, '2023-12-31 17:08:42'),
(14, 3, 4, '3500', '3500', 'Pending Payment', 1, '2023-12-31 17:08:57'),
(16, 4, 4, '0', '600', 'Pending Reservation', 1, '2024-01-06 13:16:36');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_date_and_time`
--

CREATE TABLE `tbl_date_and_time` (
  `dateAndTimeId` int(12) NOT NULL,
  `courtId` int(12) NOT NULL,
  `courtReservationId` int(12) NOT NULL,
  `date` date NOT NULL,
  `time` varchar(500) NOT NULL,
  `isActive` int(11) NOT NULL DEFAULT 1,
  `dateAdded` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_date_and_time`
--

INSERT INTO `tbl_date_and_time` (`dateAndTimeId`, `courtId`, `courtReservationId`, `date`, `time`, `isActive`, `dateAdded`) VALUES
(30, 2, 13, '2024-01-01', '9:00AM-10:00AM', 1, '2023-12-31 17:08:42'),
(31, 2, 13, '2024-01-01', '10:00AM-11:00AM', 1, '2023-12-31 17:08:42'),
(32, 2, 13, '2024-01-01', '11:00AM-12:00PM', 1, '2023-12-31 17:08:42'),
(33, 2, 13, '2024-01-01', '12:00PM-1:00PM', 1, '2023-12-31 17:08:42'),
(34, 2, 13, '2024-01-01', '1:00PM-2:00PM', 1, '2023-12-31 17:08:42'),
(35, 2, 13, '2024-01-01', '2:00PM-3:00PM', 1, '2023-12-31 17:08:42'),
(36, 2, 13, '2024-01-01', '3:00PM-4:00PM', 1, '2023-12-31 17:08:42'),
(37, 2, 13, '2024-01-01', '4:00PM-5:00PM', 1, '2023-12-31 17:08:42'),
(38, 2, 13, '2024-01-01', '5:00PM-6:00PM', 1, '2023-12-31 17:08:42'),
(39, 2, 13, '2024-01-01', '6:00PM-7:00PM', 1, '2023-12-31 17:08:42'),
(40, 2, 13, '2024-01-01', '7:00PM-8:00PM', 1, '2023-12-31 17:08:42'),
(41, 2, 13, '2024-01-01', '8:00PM-9:00PM', 1, '2023-12-31 17:08:42'),
(42, 3, 14, '2024-01-01', '9:00AM-10:00AM', 1, '2023-12-31 17:08:57'),
(43, 3, 14, '2024-01-01', '10:00AM-11:00AM', 1, '2023-12-31 17:08:57'),
(44, 3, 14, '2024-01-01', '11:00AM-12:00PM', 1, '2023-12-31 17:08:57'),
(45, 3, 14, '2024-01-01', '12:00PM-1:00PM', 1, '2023-12-31 17:08:57'),
(46, 3, 14, '2024-01-01', '1:00PM-2:00PM', 1, '2023-12-31 17:08:57'),
(47, 3, 14, '2024-01-01', '2:00PM-3:00PM', 1, '2023-12-31 17:08:57'),
(51, 4, 16, '2024-01-07', '5:00PM-6:00PM', 1, '2024-01-06 13:16:36'),
(52, 4, 16, '2024-01-07', '6:00PM-7:00PM', 1, '2024-01-06 13:16:36'),
(53, 4, 16, '2024-01-07', '7:00PM-8:00PM', 1, '2024-01-06 13:16:36'),
(54, 4, 16, '2024-01-07', '8:00PM-9:00PM', 1, '2024-01-06 13:16:36');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_feedback`
--

CREATE TABLE `tbl_feedback` (
  `feedbackId` int(10) NOT NULL,
  `userId` int(10) NOT NULL,
  `courtId` int(10) NOT NULL,
  `feedback` varchar(555) NOT NULL,
  `isActive` tinyint(1) NOT NULL DEFAULT 1,
  `dateAdded` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_image_uploaded`
--

CREATE TABLE `tbl_image_uploaded` (
  `imageUploadedId` int(10) NOT NULL,
  `userId` int(10) NOT NULL,
  `id` int(10) NOT NULL,
  `filename` varchar(555) NOT NULL,
  `isActive` tinyint(1) NOT NULL DEFAULT 1,
  `dateAdded` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_image_uploaded`
--

INSERT INTO `tbl_image_uploaded` (`imageUploadedId`, `userId`, `id`, `filename`, `isActive`, `dateAdded`) VALUES
(30, 6, 2, '+639483693865.jpg', 1, '2023-12-28 15:39:51'),
(31, 6, 2, '+639483693869.jpg', 1, '2023-12-28 15:39:51'),
(32, 6, 3, 'FB_IMG_1654020722654.jpg', 1, '2023-12-28 15:42:37'),
(33, 6, 3, 'FB_IMG_1657630735344.jpg', 1, '2023-12-28 15:42:37'),
(45, 8, 4, 'FB_IMG_1654020722654.jpg', 1, '2024-01-06 13:13:55'),
(46, 8, 4, 'FB_IMG_1657630735344.jpg', 1, '2024-01-06 13:13:55');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_notification`
--

CREATE TABLE `tbl_notification` (
  `notificationId` int(10) NOT NULL,
  `userId` int(10) NOT NULL,
  `id` int(10) NOT NULL,
  `description` varchar(555) NOT NULL,
  `isActive` tinyint(1) NOT NULL DEFAULT 1,
  `dateAdded` datetime NOT NULL DEFAULT current_timestamp(),
  `NotificationStatus` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_notification`
--

INSERT INTO `tbl_notification` (`notificationId`, `userId`, `id`, `description`, `isActive`, `dateAdded`, `NotificationStatus`) VALUES
(1, 6, 4, 'Your reservation has been approved!', 1, '2024-01-03 15:00:44', 1),
(2, 6, 4, 'Your reservation has been declined!', 1, '2024-01-05 13:52:03', 1),
(3, 6, 4, 'Your reservation has been approved!', 1, '2024-01-05 13:52:19', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_otp`
--

CREATE TABLE `tbl_otp` (
  `otpId` int(10) NOT NULL,
  `userId` int(10) NOT NULL,
  `contactNumber` varchar(55) NOT NULL,
  `otp` varchar(55) NOT NULL,
  `isActive` tinyint(1) NOT NULL DEFAULT 1,
  `dateAdded` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE `tbl_user` (
  `userId` int(15) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `role` varchar(50) NOT NULL,
  `isVerified` tinyint(1) NOT NULL DEFAULT 0,
  `isActive` tinyint(1) NOT NULL DEFAULT 1,
  `dateAdded` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`userId`, `username`, `password`, `role`, `isVerified`, `isActive`, `dateAdded`) VALUES
(1, 'user', 'user', 'customer', 1, 1, '2023-12-23 13:37:52'),
(4, 'usertest', '123', 'user', 0, 1, '2023-12-25 15:33:47'),
(6, 'venue1', '123', 'venue', 0, 1, '2023-12-26 17:07:21'),
(7, 'admin', 'admin', 'superadmin', 1, 1, '2024-01-04 18:16:34'),
(8, 'venue2', '123', 'venue', 0, 1, '2024-01-06 13:06:02');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user_details`
--

CREATE TABLE `tbl_user_details` (
  `userDetailId` int(10) NOT NULL,
  `userId` int(10) NOT NULL,
  `fullName` varchar(255) NOT NULL,
  `address` varchar(555) NOT NULL,
  `contactNumber` varchar(20) NOT NULL,
  `emailAddress` varchar(55) NOT NULL,
  `isActive` tinyint(1) NOT NULL DEFAULT 1,
  `dateAdded` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_user_details`
--

INSERT INTO `tbl_user_details` (`userDetailId`, `userId`, `fullName`, `address`, `contactNumber`, `emailAddress`, `isActive`, `dateAdded`) VALUES
(3, 4, 'user', 'bcd', '09123456789', 'user@gmail.com', 1, '2023-12-25 15:33:47'),
(4, 6, 'Sharks', 'Celine Homes', '09596168516', 'Sharks@gmail.com', 1, '2024-01-04 18:59:56');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_court`
--
ALTER TABLE `tbl_court`
  ADD PRIMARY KEY (`courtId`);

--
-- Indexes for table `tbl_court_reservation`
--
ALTER TABLE `tbl_court_reservation`
  ADD PRIMARY KEY (`courtReservationId`);

--
-- Indexes for table `tbl_date_and_time`
--
ALTER TABLE `tbl_date_and_time`
  ADD PRIMARY KEY (`dateAndTimeId`);

--
-- Indexes for table `tbl_feedback`
--
ALTER TABLE `tbl_feedback`
  ADD PRIMARY KEY (`feedbackId`);

--
-- Indexes for table `tbl_image_uploaded`
--
ALTER TABLE `tbl_image_uploaded`
  ADD PRIMARY KEY (`imageUploadedId`);

--
-- Indexes for table `tbl_notification`
--
ALTER TABLE `tbl_notification`
  ADD PRIMARY KEY (`notificationId`);

--
-- Indexes for table `tbl_otp`
--
ALTER TABLE `tbl_otp`
  ADD PRIMARY KEY (`otpId`);

--
-- Indexes for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`userId`);

--
-- Indexes for table `tbl_user_details`
--
ALTER TABLE `tbl_user_details`
  ADD PRIMARY KEY (`userDetailId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_court`
--
ALTER TABLE `tbl_court`
  MODIFY `courtId` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_court_reservation`
--
ALTER TABLE `tbl_court_reservation`
  MODIFY `courtReservationId` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `tbl_date_and_time`
--
ALTER TABLE `tbl_date_and_time`
  MODIFY `dateAndTimeId` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT for table `tbl_feedback`
--
ALTER TABLE `tbl_feedback`
  MODIFY `feedbackId` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_image_uploaded`
--
ALTER TABLE `tbl_image_uploaded`
  MODIFY `imageUploadedId` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT for table `tbl_notification`
--
ALTER TABLE `tbl_notification`
  MODIFY `notificationId` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_otp`
--
ALTER TABLE `tbl_otp`
  MODIFY `otpId` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `userId` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tbl_user_details`
--
ALTER TABLE `tbl_user_details`
  MODIFY `userDetailId` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
