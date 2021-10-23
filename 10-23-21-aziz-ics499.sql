-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 23, 2021 at 09:46 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 7.3.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ics499`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `adminID` int(11) NOT NULL,
  `name` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`adminID`, `name`) VALUES
(1, 'thuy'),
(2, 'trung'),
(3, 'aziz'),
(4, 'vincent');

-- --------------------------------------------------------

--
-- Table structure for table `announcement`
--

CREATE TABLE `announcement` (
  `courseID` int(11) NOT NULL,
  `instructorID` int(11) NOT NULL,
  `announcement` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `announcement`
--

INSERT INTO `announcement` (`courseID`, `instructorID`, `announcement`) VALUES
(1, 1, 'Hello every one');

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

CREATE TABLE `courses` (
  `courseID` int(11) NOT NULL,
  `subject` varchar(100) NOT NULL,
  `coursenumber` int(11) NOT NULL,
  `semester` varchar(100) NOT NULL,
  `days` varchar(45) NOT NULL,
  `location` varchar(45) NOT NULL,
  `delivery method` varchar(45) NOT NULL,
  `time` varchar(45) DEFAULT NULL,
  `Instructor` varchar(45) DEFAULT NULL,
  `coursename` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`courseID`, `subject`, `coursenumber`, `semester`, `days`, `location`, `delivery method`, `time`, `Instructor`, `coursename`) VALUES
(1, 'Math', 480, 'Current Semester', 'TH', 'Metro State  room1', 'In person', '6:30 pm', 'Washington,A', 'Algebra'),
(2, 'Math', 580, 'Current Semester', 'W', 'Metro State  room1', 'In person', '6:30 pm', 'Washington,A', 'Advance Algebra'),
(3, 'Math', 680, 'Current Semester', 'T', 'Metro State  room1', 'In person', '6:30 pm', 'Jefferson,B', 'Calculus 1'),
(4, 'Math', 1000, 'Current Semester', 'M', 'Metro State  room1', 'In person', '6:30 pm', 'Jefferson,B', 'Calculus 2'),
(5, 'ICS', 340, 'Current Semester', 'TH', 'Online studing', 'Online', '6:30 pm', 'Adams,T', 'Java Basic'),
(6, 'ICS', 380, 'Current Semester', 'W', 'Online studing', 'Online', '6:30 pm', 'Adams,T', 'Java 8'),
(7, 'ICS', 440, 'Current Semester', 'T', 'Online studing', 'Online', '6:30 pm', 'Adams,T', 'Mutiple Thread'),
(8, 'ICS', 449, 'Current Semester', 'M', 'Online studing', 'Online', '6:30 pm', 'Adams,T', 'Capston Project'),
(9, 'ESOL', 122, 'Current Semester', 'TH', 'Metro State  room 3', 'In person', '10.00 am', 'Lincoln,C', 'Level 1 '),
(10, 'ESOL', 124, 'Current Semester', 'W', 'Metro State  room 3', 'In person', '10.00 am', 'Lincoln,C', 'Level 2'),
(11, 'ESOL', 180, 'Current Semester', 'T', 'Metro State  room 3', 'In person', '10.00 am', 'Lincoln,C', 'Level 3'),
(12, 'ESOL', 200, 'Current Semester', 'M', 'Metro State  room 3', 'In person', '10.00 am', 'Lincoln,C', 'Level 4'),
(13, 'Math', 480, 'Next Semester', 'TH', 'Metro State  room1', 'In person', '6:30 pm', 'Washington,A', 'Algebra'),
(14, 'Math', 580, 'Next Semester', 'W', 'Metro State  room1', 'In person', '6:30 pm', 'Washington,A', 'Advance Algebra'),
(15, 'Math', 680, 'Next Semester', 'T', 'Metro State  room1', 'In person', '6:30 pm', 'Jefferson,B', 'Calculus 1'),
(16, 'Math', 1000, 'Next Semester', 'M', 'Metro State  room1', 'In person', '6:30 pm', 'Jefferson,B', 'Calculus 2'),
(17, 'ICS', 340, 'Next Semester', 'TH', 'Online studing', 'Online', '6:30 pm', 'Adams,T', 'Java Basic'),
(18, 'ICS', 380, 'Next Semester', 'W', 'Online studing', 'Online', '6:30 pm', 'Adams,T', 'Java 8'),
(19, 'ICS', 440, 'Next Semester', 'T', 'Online studing', 'Online', '6:30 pm', 'Adams,T', 'Mutiple Thread'),
(20, 'ICS', 449, 'Next Semester', 'M', 'Online studing', 'Online', '6:30 pm', 'Adams,T', 'Capston Project'),
(21, 'ESOL', 122, 'Next Semester', 'TH', 'Metro State  room 3', 'In person', '10.00 am', 'Lincoln,C', 'Level 1 '),
(22, 'ESOL', 124, 'Next Semester', 'W', 'Metro State  room 3', 'In person', '10.00 am', 'Lincoln,C', 'Level 2'),
(23, 'ESOL', 180, 'Next Semester', 'T', 'Metro State  room 3', 'In person', '10.00 am', 'Lincoln,C', 'Level 3'),
(24, 'ESOL', 200, 'Next Semester', 'M', 'Metro State  room 3', 'In person', '10.00 am', 'Lincoln,C', 'Level 4');

-- --------------------------------------------------------

--
-- Table structure for table `grades`
--

CREATE TABLE `grades` (
  `studentID_grade` int(11) NOT NULL,
  `instructorID_grade` int(11) NOT NULL,
  `courseID_grade` int(11) NOT NULL,
  `grade_item` char(100) NOT NULL,
  `score` char(10) NOT NULL,
  `feedback` char(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `instructors`
--

CREATE TABLE `instructors` (
  `instructorID` int(11) NOT NULL,
  `fullname` varchar(100) NOT NULL,
  `gender` varchar(45) NOT NULL,
  `address` varchar(45) NOT NULL,
  `role_instructor` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `instructors`
--

INSERT INTO `instructors` (`instructorID`, `fullname`, `gender`, `address`, `role_instructor`) VALUES
(1, 'Washington,A', 'male', '123 circle ', ''),
(2, 'Adams,T', 'male', '234 zircon', ''),
(3, 'Jefferson,B', 'female', '324 hollow', ''),
(4, 'Lincoln,C', 'female', '445 apple', '');

-- --------------------------------------------------------

--
-- Table structure for table `instructor_enroll`
--

CREATE TABLE `instructor_enroll` (
  `instructorID_enroll` int(11) NOT NULL,
  `courseID_enroll` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `instructor_enroll`
--

INSERT INTO `instructor_enroll` (`instructorID_enroll`, `courseID_enroll`) VALUES
(1, 1),
(1, 2),
(1, 13),
(1, 14),
(2, 5),
(2, 6),
(2, 7),
(2, 8),
(2, 17),
(2, 18),
(2, 19),
(2, 20),
(3, 3),
(3, 4),
(3, 15),
(3, 16),
(4, 9),
(4, 10),
(4, 11),
(4, 12),
(4, 21),
(4, 22),
(4, 23),
(4, 24);

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `studentID` int(11) NOT NULL,
  `fullname` text NOT NULL,
  `gender` varchar(45) NOT NULL,
  `address` varchar(45) DEFAULT NULL,
  `role_student` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`studentID`, `fullname`, `gender`, `address`, `role_student`) VALUES
(1, 'Simon', 'male', '123 abc', ''),
(2, 'Alvin', 'male', '234 qwe', ''),
(3, 'Theo', 'male', '222 dddd', ''),
(4, 'Brittany', 'female', '789 abc', ''),
(5, 'Jenette', 'female', '987 all', ''),
(6, 'Elenor', 'female', '123 abc', ''),
(7, 'Stu', 'male', '123 abc', ''),
(8, 'Thuy', 'male', '123 abc', ''),
(9, 'Trung', 'male', '123 abc', ''),
(10, 'Aziz', 'male', '123 abc', ''),
(11, 'Vincent', 'male', '123 abc', '');

-- --------------------------------------------------------

--
-- Table structure for table `student_enroll`
--

CREATE TABLE `student_enroll` (
  `studentID_enroll` int(11) NOT NULL,
  `courseID_enroll` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `student_enroll`
--

INSERT INTO `student_enroll` (`studentID_enroll`, `courseID_enroll`) VALUES
(1, 1),
(2, 1),
(3, 1),
(11, 1),
(2, 2),
(3, 2),
(1, 3),
(3, 3),
(4, 3),
(2, 4),
(4, 4),
(5, 4),
(3, 5),
(5, 5),
(6, 5),
(4, 6),
(6, 6),
(7, 6),
(5, 7),
(7, 7),
(8, 7),
(6, 8),
(8, 8),
(9, 8),
(7, 9),
(9, 9),
(10, 9),
(8, 10),
(11, 10),
(1, 11),
(9, 11),
(1, 12),
(2, 12),
(10, 12),
(11, 12);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `userID` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `useID_student` int(11) DEFAULT NULL,
  `userID_intructor` int(11) DEFAULT NULL,
  `userID_admin` int(11) DEFAULT NULL,
  `role` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`userID`, `username`, `password`, `useID_student`, `userID_intructor`, `userID_admin`, `role`) VALUES
(1, 'trungpham', 'trungpham', 9, NULL, NULL, 1),
(2, 'student', 'student', 1, NULL, NULL, 3),
(3, 'instructor', 'instructor', NULL, 1, NULL, 2),
(10, 'admin', 'admin', NULL, NULL, 1, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`adminID`);

--
-- Indexes for table `announcement`
--
ALTER TABLE `announcement`
  ADD PRIMARY KEY (`courseID`,`instructorID`),
  ADD KEY `instructorID_idx` (`instructorID`);

--
-- Indexes for table `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`courseID`);

--
-- Indexes for table `grades`
--
ALTER TABLE `grades`
  ADD PRIMARY KEY (`studentID_grade`,`instructorID_grade`,`courseID_grade`),
  ADD KEY `tid_idx` (`instructorID_grade`),
  ADD KEY `subjectID_idx` (`courseID_grade`);

--
-- Indexes for table `instructors`
--
ALTER TABLE `instructors`
  ADD PRIMARY KEY (`instructorID`);

--
-- Indexes for table `instructor_enroll`
--
ALTER TABLE `instructor_enroll`
  ADD PRIMARY KEY (`instructorID_enroll`,`courseID_enroll`),
  ADD KEY `subjectID_tsid_idx` (`courseID_enroll`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`studentID`);

--
-- Indexes for table `student_enroll`
--
ALTER TABLE `student_enroll`
  ADD PRIMARY KEY (`courseID_enroll`,`studentID_enroll`),
  ADD KEY `subjectID_idx` (`courseID_enroll`),
  ADD KEY `studentID_subid_idx` (`studentID_enroll`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`userID`),
  ADD KEY `id_idx` (`userID`),
  ADD KEY `userID_student_idx` (`useID_student`),
  ADD KEY `userID_admin_idx` (`userID_admin`),
  ADD KEY `userID_instructor_idx` (`userID_intructor`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `userID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `announcement`
--
ALTER TABLE `announcement`
  ADD CONSTRAINT `courseID` FOREIGN KEY (`courseID`) REFERENCES `courses` (`courseID`),
  ADD CONSTRAINT `instructorID` FOREIGN KEY (`instructorID`) REFERENCES `instructors` (`instructorID`);

--
-- Constraints for table `grades`
--
ALTER TABLE `grades`
  ADD CONSTRAINT `courseID_grade` FOREIGN KEY (`courseID_grade`) REFERENCES `courses` (`courseID`),
  ADD CONSTRAINT `instructorID_grade` FOREIGN KEY (`instructorID_grade`) REFERENCES `instructors` (`instructorID`),
  ADD CONSTRAINT `studentID_grade` FOREIGN KEY (`studentID_grade`) REFERENCES `students` (`studentID`);

--
-- Constraints for table `instructor_enroll`
--
ALTER TABLE `instructor_enroll`
  ADD CONSTRAINT `subjectID_tsid` FOREIGN KEY (`courseID_enroll`) REFERENCES `courses` (`courseID`),
  ADD CONSTRAINT `teacherID_tsid` FOREIGN KEY (`instructorID_enroll`) REFERENCES `instructors` (`instructorID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `student_enroll`
--
ALTER TABLE `student_enroll`
  ADD CONSTRAINT `studentID_ssid` FOREIGN KEY (`studentID_enroll`) REFERENCES `students` (`studentID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `subjectID_ssid` FOREIGN KEY (`courseID_enroll`) REFERENCES `courses` (`courseID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `userID_admin` FOREIGN KEY (`userID_admin`) REFERENCES `admin` (`adminID`),
  ADD CONSTRAINT `userID_instructor` FOREIGN KEY (`userID_intructor`) REFERENCES `instructors` (`instructorID`),
  ADD CONSTRAINT `userID_student` FOREIGN KEY (`useID_student`) REFERENCES `students` (`studentID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
