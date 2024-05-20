-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Apr 21, 2024 at 11:21 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cassava_project`
--

-- --------------------------------------------------------

--
-- Table structure for table `Employee`
--

CREATE TABLE `Employee` (
  `EmpID` int(11) NOT NULL,
  `image` mediumblob DEFAULT NULL,
  `FirstName` varchar(255) NOT NULL,
  `LastName` varchar(255) NOT NULL,
  `Job` varchar(255) DEFAULT NULL,
  `Email` varchar(255) DEFAULT NULL,
  `Mobile` varchar(20) DEFAULT NULL,
  `Address` varchar(255) DEFAULT NULL,
  `DOB` date DEFAULT NULL,
  `gender` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `Employee`
--

INSERT INTO `Employee` (`EmpID`, `image`, `FirstName`, `LastName`, `Job`, `Email`, `Mobile`, `Address`, `DOB`, `gender`) VALUES
(17, 0x456d706c6f7965653331352e6a706567, 'lipong', 'yang', 'digital', 'jasonyang9876@gmail.com', '08095832312', 'bangaluru', '2024-04-01', 'MALE'),
(18, 0x456d706c6f7965653234352e6a706567, 'Tom', 'selemi', 'bca', 'selemi@gmail.com', '08095832312', 'afgan', '2024-05-10', 'MALE'),
(19, 0x456d706c6f7965653336312e6a7067, 'pui', 'Manychan', 'Mg Assistant', 'lee@gmail.com', '08095832312', 'Vientiane', '2024-04-15', 'MALE'),
(21, 0x456d706c6f79656537342e6a706567, 'Thannsiri', 'WADI', 'Project Consultant', 'Thannsiri@gmail.com', '1234567890', 'Thai,Chaing Mai', '1986-04-11', 'MALE');

-- --------------------------------------------------------

--
-- Table structure for table `Shift`
--

CREATE TABLE `Shift` (
  `ShiftID` int(11) NOT NULL,
  `ShiftName` varchar(255) NOT NULL,
  `StartTime` time DEFAULT NULL,
  `EndTime` time DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `Shift`
--

INSERT INTO `Shift` (`ShiftID`, `ShiftName`, `StartTime`, `EndTime`) VALUES
(1, 'First Period', '08:00:00', '10:00:00'),
(2, 'Second Period', '10:00:00', '12:00:00'),
(3, 'Third Period', '12:00:00', '01:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `Spraying`
--

CREATE TABLE `Spraying` (
  `SprayID` int(11) NOT NULL,
  `EmpID` int(11) DEFAULT NULL,
  `Nutrients` varchar(255) NOT NULL,
  `ZoneID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `stocks`
--

CREATE TABLE `stocks` (
  `st_id` int(11) NOT NULL,
  `image` blob NOT NULL,
  `pd_name` text NOT NULL,
  `pd_usage` text NOT NULL,
  `instock` int(11) NOT NULL,
  `used` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `stocks`
--

INSERT INTO `stocks` (`st_id`, `image`, `pd_name`, `pd_usage`, `instock`, `used`) VALUES
(6, 0x50726f647563743234322e6a706567, 'Lao tec logo', 'tryLorem ipsum dolor sit, amet consectetur adipisicing elit. Consequuntur praesentium voluptas sint sapiente facilis eos at consequatur, iste necessitatibus qui illo, ad corporis, incidunt maxime cum? Omnis necessitatibus ratione voluptatem!', 44, 8);

-- --------------------------------------------------------

--
-- Table structure for table `tasklist`
--

CREATE TABLE `tasklist` (
  `taskid` int(255) NOT NULL,
  `taskname` text NOT NULL,
  `assignedto` text NOT NULL,
  `stdate` date NOT NULL,
  `estimateday` int(255) NOT NULL,
  `expectclosuredate` date NOT NULL,
  `actualtildate` date NOT NULL,
  `progress` int(255) NOT NULL,
  `status` text NOT NULL,
  `featured` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tasklist`
--

INSERT INTO `tasklist` (`taskid`, `taskname`, `assignedto`, `stdate`, `estimateday`, `expectclosuredate`, `actualtildate`, `progress`, `status`, `featured`) VALUES
(7, 'test', 'lipong', '2024-03-29', 30, '2024-03-29', '2024-04-29', 100, 'Completed', 'no'),
(9, 'try', 'pui', '2024-03-29', 30, '2024-03-29', '2024-04-29', 100, 'Completed', 'no'),
(10, 'Plowing', 'pui', '2024-03-29', 27, '2024-03-29', '2024-04-29', 100, 'Not Start', 'no'),
(11, 'ການຕຽມດີນ', 'Pui', '2024-03-29', 7, '2024-03-29', '2024-04-05', 40, 'Not Start', 'yes'),
(12, 'ການສີດພົ່ນ ແລະ ການດູແລຮັກສາ', 'Tom', '2024-04-02', 100, '2024-04-02', '2024-05-03', 20, 'Completed', 'yes'),
(13, 'Maintaining', 'Tom', '2024-04-21', 12, '2024-04-21', '2024-04-30', 0, 'In Progress', 'yes'),
(14, 'Project management', 'Thannsiri', '2024-04-01', 500, '2024-04-01', '2025-08-21', 20, 'In Progress', 'yes');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `image` blob NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `image`, `username`, `password`, `role`) VALUES
(13, 0x41646d696e733837322e6a706567, 'admin', 'Lipongyang', 'pm'),
(14, 0x41646d696e3736312e6a706567, 'Lipong', 'Lipong@1999', 'ma');

-- --------------------------------------------------------

--
-- Table structure for table `Working_Schedule`
--

CREATE TABLE `Working_Schedule` (
  `ScheduleID` int(11) NOT NULL,
  `EmpID` int(11) DEFAULT NULL,
  `ShiftID` int(11) DEFAULT NULL,
  `Date` date DEFAULT NULL,
  `Time` time DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `Zone`
--

CREATE TABLE `Zone` (
  `ZoneID` int(11) NOT NULL,
  `ZoneName` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `Employee`
--
ALTER TABLE `Employee`
  ADD PRIMARY KEY (`EmpID`);

--
-- Indexes for table `Shift`
--
ALTER TABLE `Shift`
  ADD PRIMARY KEY (`ShiftID`);

--
-- Indexes for table `Spraying`
--
ALTER TABLE `Spraying`
  ADD PRIMARY KEY (`SprayID`),
  ADD KEY `EmpID` (`EmpID`),
  ADD KEY `ZoneID` (`ZoneID`);

--
-- Indexes for table `stocks`
--
ALTER TABLE `stocks`
  ADD PRIMARY KEY (`st_id`);

--
-- Indexes for table `tasklist`
--
ALTER TABLE `tasklist`
  ADD PRIMARY KEY (`taskid`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `Working_Schedule`
--
ALTER TABLE `Working_Schedule`
  ADD PRIMARY KEY (`ScheduleID`),
  ADD KEY `EmpID` (`EmpID`),
  ADD KEY `ShiftID` (`ShiftID`);

--
-- Indexes for table `Zone`
--
ALTER TABLE `Zone`
  ADD PRIMARY KEY (`ZoneID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `Employee`
--
ALTER TABLE `Employee`
  MODIFY `EmpID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `stocks`
--
ALTER TABLE `stocks`
  MODIFY `st_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tasklist`
--
ALTER TABLE `tasklist`
  MODIFY `taskid` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `Spraying`
--
ALTER TABLE `Spraying`
  ADD CONSTRAINT `spraying_ibfk_1` FOREIGN KEY (`EmpID`) REFERENCES `employee` (`EmpID`),
  ADD CONSTRAINT `spraying_ibfk_2` FOREIGN KEY (`ZoneID`) REFERENCES `zone` (`ZoneID`);

--
-- Constraints for table `Working_Schedule`
--
ALTER TABLE `Working_Schedule`
  ADD CONSTRAINT `working_schedule_ibfk_1` FOREIGN KEY (`EmpID`) REFERENCES `employee` (`EmpID`),
  ADD CONSTRAINT `working_schedule_ibfk_2` FOREIGN KEY (`ShiftID`) REFERENCES `shift` (`ShiftID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
