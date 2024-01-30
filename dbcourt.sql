-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 30, 2024 at 03:11 PM
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
-- Table structure for table `tbl_receipt`
--

CREATE TABLE `tbl_receipt` (
  `receiptId` int(25) NOT NULL,
  `userId` int(25) NOT NULL,
  `courtReservationId` int(25) NOT NULL,
  `file` varchar(500) NOT NULL,
  `gcashName` varchar(255) NOT NULL,
  `gcashNumber` varchar(55) NOT NULL,
  `isActive` int(11) NOT NULL DEFAULT 1,
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
  `filename` varchar(500) NOT NULL,
  `isVerified` tinyint(1) NOT NULL DEFAULT 0,
  `isActive` tinyint(1) NOT NULL DEFAULT 1,
  `dateAdded` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
-- Indexes for table `tbl_receipt`
--
ALTER TABLE `tbl_receipt`
  ADD PRIMARY KEY (`receiptId`);

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
  MODIFY `courtId` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_court_reservation`
--
ALTER TABLE `tbl_court_reservation`
  MODIFY `courtReservationId` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_date_and_time`
--
ALTER TABLE `tbl_date_and_time`
  MODIFY `dateAndTimeId` int(12) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_feedback`
--
ALTER TABLE `tbl_feedback`
  MODIFY `feedbackId` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_image_uploaded`
--
ALTER TABLE `tbl_image_uploaded`
  MODIFY `imageUploadedId` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_notification`
--
ALTER TABLE `tbl_notification`
  MODIFY `notificationId` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_otp`
--
ALTER TABLE `tbl_otp`
  MODIFY `otpId` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_receipt`
--
ALTER TABLE `tbl_receipt`
  MODIFY `receiptId` int(25) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `userId` int(15) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_user_details`
--
ALTER TABLE `tbl_user_details`
  MODIFY `userDetailId` int(10) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
