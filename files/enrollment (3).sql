-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 02, 2021 at 12:33 AM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
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

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `Username`, `Password`) VALUES
(1, 'admin', 'YnKak4qw');

-- --------------------------------------------------------

--
-- Table structure for table `bsa_subject`
--

CREATE TABLE `bsa_subject` (
  `id` int(11) NOT NULL,
  `subjectcode` varchar(11) NOT NULL,
  `subjecttitle` varchar(100) NOT NULL,
  `units` varchar(11) NOT NULL,
  `lec` varchar(11) NOT NULL,
  `lab` varchar(11) NOT NULL,
  `prerequisite` varchar(100) NOT NULL,
  `year` varchar(11) NOT NULL,
  `sem` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `bsece_subject`
--

CREATE TABLE `bsece_subject` (
  `id` int(11) NOT NULL,
  `subjectcode` varchar(11) NOT NULL,
  `subjecttitle` varchar(100) NOT NULL,
  `units` varchar(11) NOT NULL,
  `lec` varchar(11) NOT NULL,
  `lab` varchar(11) NOT NULL,
  `prerequisite` varchar(100) NOT NULL,
  `year` varchar(11) NOT NULL,
  `sem` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `bsentrep_subject`
--

CREATE TABLE `bsentrep_subject` (
  `id` int(11) NOT NULL,
  `subjectcode` varchar(11) NOT NULL,
  `subjecttitle` varchar(100) NOT NULL,
  `units` varchar(11) NOT NULL,
  `lec` varchar(11) NOT NULL,
  `lab` varchar(11) NOT NULL,
  `prerequisite` varchar(100) NOT NULL,
  `year` varchar(11) NOT NULL,
  `sem` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `bsie_subject`
--

CREATE TABLE `bsie_subject` (
  `id` int(11) NOT NULL,
  `subjectcode` varchar(11) NOT NULL,
  `subjecttitle` varchar(100) NOT NULL,
  `units` varchar(11) NOT NULL,
  `lec` varchar(11) NOT NULL,
  `lab` varchar(11) NOT NULL,
  `prerequisite` varchar(100) NOT NULL,
  `year` varchar(11) NOT NULL,
  `sem` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `bsit_subject`
--

CREATE TABLE `bsit_subject` (
  `id` int(11) NOT NULL,
  `subjectcode` varchar(11) NOT NULL,
  `subjecttitle` varchar(100) NOT NULL,
  `units` varchar(11) NOT NULL,
  `lec` varchar(11) NOT NULL,
  `lab` varchar(11) NOT NULL,
  `prerequisite` varchar(100) NOT NULL,
  `year` varchar(11) NOT NULL,
  `sem` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `bsit_subject`
--

INSERT INTO `bsit_subject` (`id`, `subjectcode`, `subjecttitle`, `units`, `lec`, `lab`, `prerequisite`, `year`, `sem`) VALUES
(1, 'CC101', 'Introduction to Computing', '3', '2', '3', 'None', '1', '1'),
(2, 'CC102 ', 'Fundamentals of Programming ', '3', '2', '3', 'None', '1', '1'),
(3, 'WS101', 'Web Systems and Technologies 1 (Electives)', '3', '2', '3', 'None', '1', '1');

-- --------------------------------------------------------

--
-- Table structure for table `campus`
--

CREATE TABLE `campus` (
  `id` int(11) NOT NULL,
  `campus_name` varchar(100) NOT NULL,
  `campus_code` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `campus`
--

INSERT INTO `campus` (`id`, `campus_name`, `campus_code`) VALUES
(1, 'SAN BARTOLOME', 'SB'),
(2, 'BATASAN', 'BA'),
(3, 'SAN FRANCISCO', 'SF');

-- --------------------------------------------------------

--
-- Table structure for table `course`
--

CREATE TABLE `course` (
  `id` int(11) NOT NULL,
  `coursename` varchar(100) NOT NULL,
  `course_code` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `course`
--

INSERT INTO `course` (`id`, `coursename`, `course_code`) VALUES
(1, 'BACHELOR OF SCIENCE IN INFORMATION TECHNOLOGY', 'IT'),
(2, 'BACHELOR OF SCIENCE IN ENTREPRENEURSHIP', 'EN'),
(3, 'BACHELOR OF SCIENCE IN INDUSTRIAL ENGINEERING', 'IE'),
(4, 'BACHELOR OF SCIENCE IN ELECTRONICS ENGINEERING', 'EE'),
(5, 'BACHELOR OF SCIENCE IN ACCOUNTANCY', 'AC');

-- --------------------------------------------------------

--
-- Table structure for table `genacc_subject`
--

CREATE TABLE `genacc_subject` (
  `id` int(11) NOT NULL,
  `subjectcode` varchar(11) NOT NULL,
  `subjecttitle` varchar(100) NOT NULL,
  `units` varchar(11) NOT NULL,
  `lec` varchar(11) NOT NULL,
  `lab` varchar(11) NOT NULL,
  `prerequisite` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `genacc_subject`
--

INSERT INTO `genacc_subject` (`id`, `subjectcode`, `subjecttitle`, `units`, `lec`, `lab`, `prerequisite`) VALUES
(1, 'MATH 1', 'Mathematics in the Modern World', '3', '3', '0', 'None'),
(2, 'GEE 1 ', 'Philosophy of the Good Life', '3', '3', '0', 'None'),
(3, 'GEE 2', 'Fundamentals of Creativity and Innovation ', '3', '3', '0', 'None'),
(4, 'PE 1', 'Physical Fitness and Wellness', '2', '2', '0', 'None'),
(5, 'NSTP 1', 'National Service Training Program 1 ', '3', '3', '0', 'None');

-- --------------------------------------------------------

--
-- Table structure for table `important_key`
--

CREATE TABLE `important_key` (
  `ID` varchar(100) NOT NULL,
  `KEY_ENC_DEC` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `important_key`
--

INSERT INTO `important_key` (`ID`, `KEY_ENC_DEC`) VALUES
('this_shall_pass', 'siaprojectqcutempkeyforenc_20212022_YnKak4qw');

-- --------------------------------------------------------

--
-- Table structure for table `regulardocumentsneed`
--

CREATE TABLE `regulardocumentsneed` (
  `ID` int(11) NOT NULL,
  `enrollnumber` varchar(50) NOT NULL,
  `PSA` text NOT NULL,
  `Form137` text NOT NULL,
  `Form138` text NOT NULL,
  `Diploma` text NOT NULL,
  `GoodMoral` text NOT NULL,
  `BarangayClearance` text NOT NULL,
  `MedicalClearance` text NOT NULL,
  `IDPicture` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `returneesdocumentsneed`
--

CREATE TABLE `returneesdocumentsneed` (
  `ID` int(11) NOT NULL,
  `enrollnumber` varchar(50) NOT NULL,
  `GeneralClearance` text NOT NULL,
  `Form137` text NOT NULL,
  `TrueCopyofGrades` text NOT NULL,
  `BarangayClearance` text NOT NULL,
  `MedicalClearance` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `sections`
--

CREATE TABLE `sections` (
  `ID` int(11) NOT NULL,
  `campus_code` varchar(10) NOT NULL,
  `course_code` varchar(10) NOT NULL,
  `year` varchar(10) NOT NULL,
  `section_letter` char(2) NOT NULL,
  `studentcount` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sections`
--

INSERT INTO `sections` (`ID`, `campus_code`, `course_code`, `year`, `section_letter`, `studentcount`) VALUES
(1, 'SB', 'IT', '1', 'A', 1);

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
  `enrollnumber` varchar(50) NOT NULL,
  `StudentID` varchar(11) NOT NULL,
  `Approval` varchar(50) NOT NULL DEFAULT 'TO BE APPROVED',
  `remarks` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `studentapprovals`
--

INSERT INTO `studentapprovals` (`ID`, `enrollnumber`, `StudentID`, `Approval`, `remarks`) VALUES
(1, '2021-0000001', '21-0001', 'APPROVED', ' Information has been recorded');

-- --------------------------------------------------------

--
-- Table structure for table `studenteducationalinfo`
--

CREATE TABLE `studenteducationalinfo` (
  `ID` int(11) NOT NULL,
  `enrollnumber` varchar(50) NOT NULL,
  `StudentID` varchar(11) NOT NULL,
  `schoollastattended` varchar(100) NOT NULL,
  `schoollastattendedaddress` varchar(100) NOT NULL,
  `schoollastattendedlevel` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `studenteducationalinfo`
--

INSERT INTO `studenteducationalinfo` (`ID`, `enrollnumber`, `StudentID`, `schoollastattended`, `schoollastattendedaddress`, `schoollastattendedlevel`) VALUES
(1, '2021-0000001', '21-0001', 'QUEZON CITY UNIVERSITY', 'SAN BARTOLOME, NOVALICHES, Q. C.', 'GRADE 12 ');

-- --------------------------------------------------------

--
-- Table structure for table `studentenrollmentinfo`
--

CREATE TABLE `studentenrollmentinfo` (
  `ID` int(11) NOT NULL,
  `enrollnumber` varchar(50) NOT NULL,
  `StudentID` varchar(11) NOT NULL,
  `category` varchar(50) NOT NULL,
  `firstcourse` varchar(50) NOT NULL,
  `secondcourse` varchar(50) NOT NULL,
  `thirdcourse` varchar(50) NOT NULL,
  `campus` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `studentenrollmentinfo`
--

INSERT INTO `studentenrollmentinfo` (`ID`, `enrollnumber`, `StudentID`, `category`, `firstcourse`, `secondcourse`, `thirdcourse`, `campus`) VALUES
(1, '2021-0000001', '21-0001', 'TRANSFEREE', 'BACHELOR OF SCIENCE IN INFORMATION TECHNOLOGY', 'BACHELOR OF SCIENCE IN ENTREPRENEURSHIP', 'BACHELOR OF SCIENCE IN INDUSTRIAL ENGINEERING', 'SAN BARTOLOME');

-- --------------------------------------------------------

--
-- Table structure for table `studentexamresultstemp`
--

CREATE TABLE `studentexamresultstemp` (
  `ID` int(11) NOT NULL,
  `ExamNo` int(11) NOT NULL,
  `ExamDate` varchar(50) NOT NULL,
  `Last-Name` varchar(50) NOT NULL,
  `First-Name` varchar(50) NOT NULL,
  `Middle-Name` varchar(50) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `vcode` varchar(50) NOT NULL,
  `verify_at` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `studentexamresultstemp`
--

INSERT INTO `studentexamresultstemp` (`ID`, `ExamNo`, `ExamDate`, `Last-Name`, `First-Name`, `Middle-Name`, `Email`, `vcode`, `verify_at`) VALUES
(3, 211821, '11/28/2020', 'Rowy', 'Chedrick', 'Follero', 'chedrick.follero.rowy@gmail.com', '255354', '2021-10-21'),
(4, 211822, '11/28/2020', 'Rowy', 'Juanita', 'Follero', '8bougainvillea@gmail.com', '661482', '2021-10-21'),
(5, 211823, '11/28/2020', 'ROWY', 'CHEDRICK', 'FOLLERO', 'rowyched28@gmail.com', '293405', '2021-11-14'),
(7, 211824, '11/28/2020', 'Rowy', 'Ramil', 'Sace', 'rowyc.qcydoqcu@gmail.com', '210595', '2021-11-20'),
(8, 211825, '11/28/2020', 'Rowy', 'Chester', 'Follero', 'ramilphoto0816@gmail.com', '196577', '2021-12-02');

-- --------------------------------------------------------

--
-- Table structure for table `studentinfo`
--

CREATE TABLE `studentinfo` (
  `ID` int(11) NOT NULL,
  `enrollnumber` varchar(50) NOT NULL,
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

INSERT INTO `studentinfo` (`ID`, `enrollnumber`, `StudentID`, `FullName-Last`, `FullName-First`, `FullName-Middle`, `Age`, `birthday`, `birthplace`, `civilstatus`, `gender`, `contactno`, `email`, `address-name`, `zip_code`, `mothername`, `motherjob`, `fathername`, `fatherjob`, `guardianname`, `relationship`, `guardiancontactno`) VALUES
(1, '2021-0000001', '21-0001', 'ROWY', 'CHEDRICK', 'FOLLERO', '21', '2000-11-29', 'MANILA CITY', 'SINGLE', 'MALE', '09086689844', 'chedrick.follero.rowy@gmail.com', 'SAN BARTOLOME, NOVALICHES, Q. C.', '1117', 'JUANITA F. ROWY', 'HOUSE WIFE', 'RAMIL S. ROWY', 'PHOTOGRAPHER', 'RAMIL S. ROWY', 'FATHER', '09282298587');

-- --------------------------------------------------------

--
-- Table structure for table `student_examresult`
--

CREATE TABLE `student_examresult` (
  `ID` int(11) NOT NULL,
  `StudentID` varchar(11) NOT NULL,
  `ExamCode` varchar(50) NOT NULL,
  `enrollnumber` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `student_examresult`
--

INSERT INTO `student_examresult` (`ID`, `StudentID`, `ExamCode`, `enrollnumber`) VALUES
(1, '21-0001', '211821', '2021-0000001');

-- --------------------------------------------------------

--
-- Table structure for table `student_sections`
--

CREATE TABLE `student_sections` (
  `ID` int(11) NOT NULL,
  `StudentID` varchar(11) NOT NULL,
  `sectionname` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `student_sections`
--

INSERT INTO `student_sections` (`ID`, `StudentID`, `sectionname`) VALUES
(1, '21-0001', 'SBIT-1A');

-- --------------------------------------------------------

--
-- Table structure for table `transfeeesdocumentsneed`
--

CREATE TABLE `transfeeesdocumentsneed` (
  `ID` int(11) NOT NULL,
  `enrollnumber` varchar(50) NOT NULL,
  `PSA` text NOT NULL,
  `TOR` text NOT NULL,
  `CertificateofTransferCredential` text NOT NULL,
  `SubjectDescription` text NOT NULL,
  `GoodMoral` text NOT NULL,
  `BarangayClearance` text NOT NULL,
  `MedicalClearance` text NOT NULL,
  `IDPicture` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `transfeeesdocumentsneed`
--

INSERT INTO `transfeeesdocumentsneed` (`ID`, `enrollnumber`, `PSA`, `TOR`, `CertificateofTransferCredential`, `SubjectDescription`, `GoodMoral`, `BarangayClearance`, `MedicalClearance`, `IDPicture`) VALUES
(1, '2021-0000001', '', '', '', '', '', '', '', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bsa_subject`
--
ALTER TABLE `bsa_subject`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bsece_subject`
--
ALTER TABLE `bsece_subject`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bsentrep_subject`
--
ALTER TABLE `bsentrep_subject`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bsie_subject`
--
ALTER TABLE `bsie_subject`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bsit_subject`
--
ALTER TABLE `bsit_subject`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `campus`
--
ALTER TABLE `campus`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `course`
--
ALTER TABLE `course`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `genacc_subject`
--
ALTER TABLE `genacc_subject`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `important_key`
--
ALTER TABLE `important_key`
  ADD PRIMARY KEY (`ID`);

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
-- Indexes for table `sections`
--
ALTER TABLE `sections`
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
-- Indexes for table `student_examresult`
--
ALTER TABLE `student_examresult`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `student_sections`
--
ALTER TABLE `student_sections`
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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `bsa_subject`
--
ALTER TABLE `bsa_subject`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `bsece_subject`
--
ALTER TABLE `bsece_subject`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `bsentrep_subject`
--
ALTER TABLE `bsentrep_subject`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `bsie_subject`
--
ALTER TABLE `bsie_subject`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `bsit_subject`
--
ALTER TABLE `bsit_subject`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `campus`
--
ALTER TABLE `campus`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `course`
--
ALTER TABLE `course`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `genacc_subject`
--
ALTER TABLE `genacc_subject`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `regulardocumentsneed`
--
ALTER TABLE `regulardocumentsneed`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `returneesdocumentsneed`
--
ALTER TABLE `returneesdocumentsneed`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sections`
--
ALTER TABLE `sections`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `studentaccount`
--
ALTER TABLE `studentaccount`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `studentapprovals`
--
ALTER TABLE `studentapprovals`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `studenteducationalinfo`
--
ALTER TABLE `studenteducationalinfo`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `studentenrollmentinfo`
--
ALTER TABLE `studentenrollmentinfo`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `studentexamresultstemp`
--
ALTER TABLE `studentexamresultstemp`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `studentinfo`
--
ALTER TABLE `studentinfo`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `student_examresult`
--
ALTER TABLE `student_examresult`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `student_sections`
--
ALTER TABLE `student_sections`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `transfeeesdocumentsneed`
--
ALTER TABLE `transfeeesdocumentsneed`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
