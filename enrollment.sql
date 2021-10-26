-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 26, 2021 at 12:01 PM
-- Server version: 10.4.8-MariaDB
-- PHP Version: 7.1.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `enrollment`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `Username` varchar(50) NOT NULL,
  `Password` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `regulardocumentsneed`
--

CREATE TABLE `regulardocumentsneed` (
  `ID` int(11) NOT NULL,
  `StudentID` varchar(11) NOT NULL,
  `PSA` text NOT NULL,
  `Form137` text NOT NULL,
  `Form138` text NOT NULL,
  `Diploma` text NOT NULL,
  `GoodMoral` text NOT NULL,
  `BarangayClearance` text NOT NULL,
  `MedicalClearance` text NOT NULL,
  `IDPicture` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `regulardocumentsneed`
--

INSERT INTO `regulardocumentsneed` (`ID`, `StudentID`, `PSA`, `Form137`, `Form138`, `Diploma`, `GoodMoral`, `BarangayClearance`, `MedicalClearance`, `IDPicture`) VALUES
(1, '21-0001', '', '', '', '', '', '', '', ''),
(2, '21-0002', '', '', '', '', '', '', '', ''),
(3, '21-0003', '', '', '', '', '', '', '', ''),
(4, '21-0004', '', '', '', '', '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `returneesdocumentsneed`
--

CREATE TABLE `returneesdocumentsneed` (
  `ID` int(11) NOT NULL,
  `StudentID` varchar(11) NOT NULL,
  `GeneralClearance` text NOT NULL,
  `Form137` text NOT NULL,
  `TrueCopyofGrades` text NOT NULL,
  `BarangayClearance` text NOT NULL,
  `MedicalClearance` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `studentaccount`
--

CREATE TABLE `studentaccount` (
  `ID` int(11) NOT NULL,
  `StudentID` varchar(11) NOT NULL,
  `Username` varchar(50) NOT NULL,
  `Password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `studentapprovals`
--

CREATE TABLE `studentapprovals` (
  `ID` int(11) NOT NULL,
  `StudentID` varchar(11) NOT NULL,
  `Approval` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `studenteducationalinfo`
--

CREATE TABLE `studenteducationalinfo` (
  `ID` int(11) NOT NULL,
  `StudentID` varchar(11) NOT NULL,
  `schoollastattended` varchar(100) NOT NULL,
  `schoollastattendedaddress` varchar(100) NOT NULL,
  `schoollastattendedlevel` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `studenteducationalinfo`
--

INSERT INTO `studenteducationalinfo` (`ID`, `StudentID`, `schoollastattended`, `schoollastattendedaddress`, `schoollastattendedlevel`) VALUES
(1, '21-0001', 'JUANITA FOLLERO ROWY', 'RAJAH SOLIMAN ST.', 'Grade 12 '),
(2, '21-0002', 'JUANITA FOLLERO ROWY', 'RAJAH SOLIMAN ST.', 'Grade 12 '),
(3, '21-0003', 'JUANITA FOLLERO ROWY', 'RAJAH SOLIMAN ST.', 'Grade 12 '),
(4, '21-0004', 'JUANITA FOLLERO ROWY', 'RAJAH SOLIMAN ST.', 'Grade 12 ');

-- --------------------------------------------------------

--
-- Table structure for table `studentenrollmentinfo`
--

CREATE TABLE `studentenrollmentinfo` (
  `ID` int(11) NOT NULL,
  `StudentID` varchar(11) NOT NULL,
  `category` varchar(50) NOT NULL,
  `firstcourse` varchar(50) NOT NULL,
  `secondcourse` varchar(50) NOT NULL,
  `thirdcourse` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `studentenrollmentinfo`
--

INSERT INTO `studentenrollmentinfo` (`ID`, `StudentID`, `category`, `firstcourse`, `secondcourse`, `thirdcourse`) VALUES
(1, '21-0001', 'Regular', 'Bachelor of Science in Entrepreneurship', 'Bachelor of Science in Industrial Engineering', 'Bachelor of Science in Accountancy'),
(2, '21-0002', 'Regular', 'Bachelor of Science in Entrepreneurship', 'Bachelor of Science in Industrial Engineering', 'Bachelor of Science in Accountancy'),
(3, '21-0003', 'Regular', 'Bachelor of Science in Entrepreneurship', 'Bachelor of Science in Industrial Engineering', 'Bachelor of Science in Accountancy'),
(4, '21-0004', 'Regular', 'Bachelor of Science in Entrepreneurship', 'Bachelor of Science in Industrial Engineering', 'Bachelor of Science in Accountancy');

-- --------------------------------------------------------

--
-- Table structure for table `studentexamresultstemp`
--

CREATE TABLE `studentexamresultstemp` (
  `ID` int(11) NOT NULL,
  `ExamNo` int(11) NOT NULL,
  `ExamDate` varchar(50) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `vcode` varchar(50) NOT NULL,
  `verify_at` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `studentexamresultstemp`
--

INSERT INTO `studentexamresultstemp` (`ID`, `ExamNo`, `ExamDate`, `Email`, `vcode`, `verify_at`) VALUES
(3, 211821, '11/28/2020', 'chedrick.follero.rowy@gmail.com', '287545', '2021-10-21'),
(4, 211822, '11/28/2020', '8bougainvillea@gmail.com', '345730', '2021-10-21');

-- --------------------------------------------------------

--
-- Table structure for table `studentinfo`
--

CREATE TABLE `studentinfo` (
  `ID` int(11) NOT NULL,
  `StudentID` varchar(11) NOT NULL,
  `FullName-Last` varchar(50) NOT NULL,
  `FullName-First` varchar(50) NOT NULL,
  `FullName-Middle` varchar(50) NOT NULL,
  `Age` varchar(11) NOT NULL,
  `birthday` varchar(50) NOT NULL,
  `birthplace` varchar(50) NOT NULL,
  `civilstatus` varchar(25) NOT NULL,
  `gender` varchar(25) NOT NULL,
  `contactno` varchar(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  `address-name` varchar(100) NOT NULL,
  `zip_code` varchar(10) NOT NULL,
  `mothername` varchar(50) NOT NULL,
  `motherjob` varchar(50) NOT NULL,
  `fathername` varchar(50) NOT NULL,
  `fatherjob` varchar(50) NOT NULL,
  `guardianname` varchar(50) NOT NULL,
  `relationship` varchar(50) NOT NULL,
  `guardiancontactno` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `studentinfo`
--

INSERT INTO `studentinfo` (`ID`, `StudentID`, `FullName-Last`, `FullName-First`, `FullName-Middle`, `Age`, `birthday`, `birthplace`, `civilstatus`, `gender`, `contactno`, `email`, `address-name`, `zip_code`, `mothername`, `motherjob`, `fathername`, `fatherjob`, `guardianname`, `relationship`, `guardiancontactno`) VALUES
(1, '21-0001', 'ROWY', 'JUANITA', 'FOLLERO', '20', '2000-11-28', 'Manila', 'Single', 'Male', '09086689844', '8bougainvillea@gmail.com', 'RAJAH SOLIMAN ST.', '1117', 'Juanita F. Rowy', 'House Wife', 'Ramil S. Rowy', 'Photographer', 'Ramil S. Rowy', 'Father', '09282298587'),
(2, '21-0002', 'ROWY', 'JUANITA', 'FOLLERO', '20', '2000-11-28', 'Manila', 'Single', 'Male', '09086689844', '8bougainvillea@gmail.com', 'RAJAH SOLIMAN ST.', '1117', 'Juanita F. Rowy', 'House Wife', 'Ramil S. Rowy', 'Photographer', 'Ramil S. Rowy', 'Father', '09282298587'),
(3, '21-0003', 'ROWY', 'JUANITA', 'FOLLERO', '20', '2000-11-28', 'Manila', 'Single', 'Male', '09086689844', '8bougainvillea@gmail.com', 'RAJAH SOLIMAN ST.', '1117', 'Juanita F. Rowy', 'House Wife', 'Ramil S. Rowy', 'Photographer', 'Ramil S. Rowy', 'Father', '09282298587'),
(4, '21-0004', 'ROWY', 'JUANITA', 'FOLLERO', '20', '2000-11-28', 'Manila', 'Single', 'Male', '09086689844', '8bougainvillea@gmail.com', 'RAJAH SOLIMAN ST.', '1117', 'Juanita F. Rowy', 'House Wife', 'Ramil S. Rowy', 'Photographer', 'Ramil S. Rowy', 'Father', '09282298587');

-- --------------------------------------------------------

--
-- Table structure for table `transfeeesdocumentsneed`
--

CREATE TABLE `transfeeesdocumentsneed` (
  `ID` int(11) NOT NULL,
  `StudentID` varchar(11) NOT NULL,
  `PSA` text NOT NULL,
  `TOR` text NOT NULL,
  `CertificateofTransferCredential` text NOT NULL,
  `SubjectDescription` text NOT NULL,
  `BarangayClearance` text NOT NULL,
  `MedicalClearance` text NOT NULL,
  `IDPicture` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `regulardocumentsneed`
--
ALTER TABLE `regulardocumentsneed`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `returneesdocumentsneed`
--
ALTER TABLE `returneesdocumentsneed`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `studentaccount`
--
ALTER TABLE `studentaccount`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `studentapprovals`
--
ALTER TABLE `studentapprovals`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `studenteducationalinfo`
--
ALTER TABLE `studenteducationalinfo`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `studentenrollmentinfo`
--
ALTER TABLE `studentenrollmentinfo`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `studentexamresultstemp`
--
ALTER TABLE `studentexamresultstemp`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `studentinfo`
--
ALTER TABLE `studentinfo`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `transfeeesdocumentsneed`
--
ALTER TABLE `transfeeesdocumentsneed`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `regulardocumentsneed`
--
ALTER TABLE `regulardocumentsneed`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `returneesdocumentsneed`
--
ALTER TABLE `returneesdocumentsneed`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `studentaccount`
--
ALTER TABLE `studentaccount`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `studentapprovals`
--
ALTER TABLE `studentapprovals`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `studenteducationalinfo`
--
ALTER TABLE `studenteducationalinfo`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `studentenrollmentinfo`
--
ALTER TABLE `studentenrollmentinfo`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `studentexamresultstemp`
--
ALTER TABLE `studentexamresultstemp`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `studentinfo`
--
ALTER TABLE `studentinfo`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `transfeeesdocumentsneed`
--
ALTER TABLE `transfeeesdocumentsneed`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
