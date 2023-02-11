-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3307
-- Generation Time: Feb 10, 2023 at 04:34 PM
-- Server version: 10.4.20-MariaDB
-- PHP Version: 8.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `vpmsdb_v2`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbladmin`
--

CREATE TABLE `tbladmin` (
  `ID` int(10) NOT NULL,
  `AdminName` varchar(120) DEFAULT NULL,
  `UserName` varchar(120) DEFAULT NULL,
  `MobileNumber` bigint(10) DEFAULT NULL,
  `Email` varchar(200) DEFAULT NULL,
  `Password` varchar(120) DEFAULT NULL,
  `AdminRegdate` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbladmin`
--

INSERT INTO `tbladmin` (`ID`, `AdminName`, `UserName`, `MobileNumber`, `Email`, `Password`, `AdminRegdate`) VALUES
(1, 'Admin', 'admin', 7898799798, 'tester1@gmail.com', '21232f297a57a5a743894a0e4a801fc3', '2019-07-05 05:38:23');

-- --------------------------------------------------------

--
-- Table structure for table `tblcategory`
--

CREATE TABLE `tblcategory` (
  `ID` int(10) NOT NULL,
  `VehicleCat` varchar(120) DEFAULT NULL,
  `CreationDate` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblcategory`
--

INSERT INTO `tblcategory` (`ID`, `VehicleCat`, `CreationDate`) VALUES
(1, '1 hour ', '2019-07-05 11:06:50'),
(2, '2 hour', '2019-07-05 11:07:09'),
(4, '3 hour ', '2019-07-07 11:31:17'),
(5, '4 hours ', '2022-12-04 09:41:59');

-- --------------------------------------------------------

--
-- Table structure for table `tblvehicle`
--

CREATE TABLE `tblvehicle` (
  `ID` int(10) NOT NULL,
  `ParkingNumber` varchar(120) DEFAULT NULL,
  `VehicleCategory` varchar(120) NOT NULL,
  `VehicleCompanyname` varchar(120) DEFAULT NULL,
  `RegistrationNumber` varchar(120) DEFAULT NULL,
  `OwnerName` varchar(120) DEFAULT NULL,
  `OwnerContactNumber` bigint(10) DEFAULT NULL,
  `InTime` timestamp NULL DEFAULT current_timestamp(),
  `OutTime` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp(),
  `ParkingCharge` varchar(120) NOT NULL,
  `Remark` mediumtext NOT NULL,
  `VehicleStatus` varchar(500) NOT NULL,
  `SlotNumber` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblvehicle`
--

INSERT INTO `tblvehicle` (`ID`, `ParkingNumber`, `VehicleCategory`, `VehicleCompanyname`, `RegistrationNumber`, `OwnerName`, `OwnerContactNumber`, `InTime`, `OutTime`, `ParkingCharge`, `Remark`, `VehicleStatus`, `SlotNumber`) VALUES
(31, '564716027', '4 hours ', 'Honda', 'SDS', 'Hello', 62131, '2022-12-04 10:00:24', '2022-12-04 10:00:37', '50', 'Hello ', 'Out', 0),
(32, '674494965', '4 hours ', 'Honda', '1234556', 'Daniel', 1234567, '2022-12-04 10:02:38', '2022-12-04 10:03:20', '50', 'Bye ', 'Out', 0),
(33, '557', '3 hour ', 'qweqw', 'qweqwe', 'qweqw', 935502628, '2023-02-10 04:37:32', '2023-02-10 13:45:13', '', '', 'IN', 0),
(34, '621', '1 hour ', 'honda', '12345678', 'Jim', 9123676863687123, '2023-02-10 09:25:28', '2023-02-10 14:48:56', '', '', 'Pending', 36),
(39, '371', '3 hour ', 'honday', '465465', 'Jim', 9123676863687123, '2023-02-10 13:16:06', '2023-02-10 13:44:56', '', '', 'OUT', 10),
(40, '704', '3 hour ', 'honday', '465465', 'Jim', 9123676863687123, '2023-02-10 13:20:12', '2023-02-10 13:45:02', '', '', 'IN', 12),
(41, '947', '3 hour ', 'honday', '465465', 'Jim', 9123676863687123, '2023-02-10 13:22:12', '2023-02-10 13:45:06', '', '', 'OUT', 10),
(79, '437', '3 hour ', 'honda', '5454465', 'Jim', 9123676863687123, '2023-02-10 14:27:04', NULL, '', '', 'IN', 17),
(80, '309', '2 hour', 'honda', '6546', 'Jim', 9123676863687123, '2023-02-10 14:29:26', NULL, '', '', 'IN', 7);

-- --------------------------------------------------------

--
-- Table structure for table `tbuser`
--

CREATE TABLE `tbuser` (
  `UserID` int(11) NOT NULL,
  `UserName` varchar(255) DEFAULT NULL,
  `MobileNumber` varchar(255) DEFAULT NULL,
  `Email` varchar(255) DEFAULT NULL,
  `UserPassword` varchar(255) DEFAULT NULL,
  `RegDate` varchar(255) DEFAULT NULL,
  `OnlineStatus` varchar(255) DEFAULT NULL,
  `LastOnline` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbuser`
--

INSERT INTO `tbuser` (`UserID`, `UserName`, `MobileNumber`, `Email`, `UserPassword`, `RegDate`, `OnlineStatus`, `LastOnline`) VALUES
(9, 'cambodia', '09123676863687123', 'juliusdelosreyes89@gmail.com', 'qwe', '2023-02-10', 'Email Verification', '2023-02-10'),
(14, 'cambodiaasd', '123123', 'juliusdelosreasdasyes89@gmail.com', 'qwe', '2023-02-10', 'Email Verification', '2023-02-10'),
(15, 'asdasdvcbvcb', '09123676863687123', 'juliusdelossadreyes89@gmail.com', 'qwe', '2023-02-10', 'Email Verification', '2023-02-10'),
(16, 'Jim', '09123676863687123', 'jimmanrique12@gmail.com', 'qwe', '2023-02-10', 'Email Verification', '2023-02-10');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbladmin`
--
ALTER TABLE `tbladmin`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tblcategory`
--
ALTER TABLE `tblcategory`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tblvehicle`
--
ALTER TABLE `tblvehicle`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tbuser`
--
ALTER TABLE `tbuser`
  ADD PRIMARY KEY (`UserID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbladmin`
--
ALTER TABLE `tbladmin`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tblcategory`
--
ALTER TABLE `tblcategory`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tblvehicle`
--
ALTER TABLE `tblvehicle`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=81;

--
-- AUTO_INCREMENT for table `tbuser`
--
ALTER TABLE `tbuser`
  MODIFY `UserID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
