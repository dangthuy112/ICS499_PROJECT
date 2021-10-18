-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 18, 2021 at 10:27 AM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 7.4.23

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
-- Table structure for table `announcement`
--

CREATE TABLE `announcement` (
  `annid` int(11) NOT NULL,
  `teacher_ID` int(11) NOT NULL,
  `announcement` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `announcement`
--

INSERT INTO `announcement` (`annid`, `teacher_ID`, `announcement`) VALUES
(1, 1, 'hello1 '),
(2, 2, 'hello adams'),
(3, 3, 'hello wha'),
(4, 4, 'hello4');

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

CREATE TABLE `courses` (
  `courseID` int(10) UNSIGNED NOT NULL,
  `subject` varchar(100) NOT NULL,
  `coursenumber` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `instructorID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`courseID`, `subject`, `coursenumber`, `name`, `instructorID`) VALUES
(1, 'ICS', 462, 'Operating Systems', 0),
(3, 'ICS', 499, 'Software Engineering and Capstone Project', 0),
(4, 'MATH', 315, 'Linear Algebra and Applications', 1);

-- --------------------------------------------------------

--
-- Table structure for table `grades`
--

CREATE TABLE `grades` (
  `studentID` int(11) NOT NULL,
  `teacherID` int(11) NOT NULL,
  `subjectID` int(11) NOT NULL,
  `grade_item` char(100) NOT NULL,
  `score` char(10) NOT NULL,
  `feedback` char(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `grades`
--

INSERT INTO `grades` (`studentID`, `teacherID`, `subjectID`, `grade_item`, `score`, `feedback`) VALUES
(1, 1, 2, 'quiz', '100', 'good'),
(2, 2, 3, 'quiz', '33', 'good'),
(2, 3, 4, 'qsa', '87', 'good'),
(3, 3, 4, 'quiz', '89', 'good'),
(4, 4, 1, 'quiz', '99', 'good'),
(5, 1, 3, 'quiz', '78', 'good'),
(6, 2, 4, 'quiz', '98', 'good'),
(8, 4, 2, 'quiz', '77', 'good'),
(9, 1, 4, 'quiz', '88', 'good'),
(10, 2, 1, 'quiz', '55', 'good'),
(11, 3, 2, 'quiz', '66', 'good');

-- --------------------------------------------------------

--
-- Table structure for table `instructors`
--

CREATE TABLE `instructors` (
  `instructorID` int(10) UNSIGNED NOT NULL,
  `fullname` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `instructors`
--

INSERT INTO `instructors` (`instructorID`, `fullname`) VALUES
(1, 'Bob'),
(3, 'Dave'),
(10, 'Bob'),
(11, 'Bob'),
(12, 'Michael'),
(13, 'Prof .Instructor A '),
(14, 'Test Test');

-- --------------------------------------------------------

--
-- Table structure for table `ss`
--

CREATE TABLE `ss` (
  `studentID_ssid` int(11) NOT NULL,
  `subjectId_ssid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ss`
--

INSERT INTO `ss` (`studentID_ssid`, `subjectId_ssid`) VALUES
(2, 1),
(3, 1),
(4, 1),
(6, 1),
(8, 1),
(10, 1),
(11, 1),
(1, 2),
(3, 2),
(4, 2),
(5, 2),
(8, 2),
(9, 2),
(11, 2),
(1, 3),
(2, 3),
(4, 3),
(5, 3),
(6, 3),
(8, 3),
(9, 3),
(10, 3),
(1, 4),
(2, 4),
(3, 4),
(5, 4),
(6, 4),
(10, 4),
(11, 4);

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `sid` int(11) NOT NULL,
  `name` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`sid`, `name`) VALUES
(1, 'Simon'),
(2, 'Alvin'),
(3, 'Theo'),
(4, 'Brittany'),
(5, 'Jenette'),
(6, 'Elenor'),
(8, 'Thuy'),
(9, 'Trung'),
(10, 'Aziz'),
(11, 'Vincent');

-- --------------------------------------------------------

--
-- Table structure for table `subjects`
--

CREATE TABLE `subjects` (
  `subid` int(11) NOT NULL,
  `name` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `subjects`
--

INSERT INTO `subjects` (`subid`, `name`) VALUES
(1, 'History'),
(2, 'Biology'),
(3, 'SF'),
(4, 'Math');

-- --------------------------------------------------------

--
-- Table structure for table `teachers`
--

CREATE TABLE `teachers` (
  `tid` int(11) NOT NULL,
  `name` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `teachers`
--

INSERT INTO `teachers` (`tid`, `name`) VALUES
(1, 'Washington'),
(2, 'Adams'),
(3, 'Jefferson'),
(4, 'Lincoln');

-- --------------------------------------------------------

--
-- Table structure for table `ts`
--

CREATE TABLE `ts` (
  `teacherID_subid` int(11) NOT NULL,
  `subjectID_subid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ts`
--

INSERT INTO `ts` (`teacherID_subid`, `subjectID_subid`) VALUES
(1, 2),
(1, 3),
(1, 4),
(2, 1),
(2, 3),
(2, 4),
(3, 1),
(3, 2),
(3, 4),
(4, 1),
(4, 2),
(4, 3);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `role` int(11) NOT NULL,
  `fromable_id` int(11) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `role`, `fromable_id`) VALUES
(1, 'admin', 'password', 1, NULL),
(2, 'teacher', 'password', 2, NULL),
(3, 'student', 'password', 3, NULL),
(4, 'aziz', 'password', 1, NULL),
(5, 'bob', 'bobby', 2, 11),
(6, 'michael', 'michael69', 2, 12),
(7, 'Instructor A', '12345678', 2, 13),
(8, 'Test 1', '12345678', 2, 14);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `announcement`
--
ALTER TABLE `announcement`
  ADD PRIMARY KEY (`annid`),
  ADD KEY `teacher_ID_idx` (`teacher_ID`);

--
-- Indexes for table `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`courseID`);

--
-- Indexes for table `grades`
--
ALTER TABLE `grades`
  ADD PRIMARY KEY (`studentID`,`teacherID`,`subjectID`),
  ADD KEY `tid_idx` (`teacherID`),
  ADD KEY `subjectID_idx` (`subjectID`);

--
-- Indexes for table `instructors`
--
ALTER TABLE `instructors`
  ADD PRIMARY KEY (`instructorID`);

--
-- Indexes for table `ss`
--
ALTER TABLE `ss`
  ADD PRIMARY KEY (`subjectId_ssid`,`studentID_ssid`),
  ADD KEY `subjectID_idx` (`subjectId_ssid`),
  ADD KEY `studentID_subid_idx` (`studentID_ssid`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`sid`);

--
-- Indexes for table `subjects`
--
ALTER TABLE `subjects`
  ADD PRIMARY KEY (`subid`);

--
-- Indexes for table `teachers`
--
ALTER TABLE `teachers`
  ADD PRIMARY KEY (`tid`);

--
-- Indexes for table `ts`
--
ALTER TABLE `ts`
  ADD PRIMARY KEY (`teacherID_subid`,`subjectID_subid`),
  ADD KEY `subjectID_tsid_idx` (`subjectID_subid`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `courses`
--
ALTER TABLE `courses`
  MODIFY `courseID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `instructors`
--
ALTER TABLE `instructors`
  MODIFY `instructorID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `announcement`
--
ALTER TABLE `announcement`
  ADD CONSTRAINT `teacher_ID` FOREIGN KEY (`teacher_ID`) REFERENCES `teachers` (`tid`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `grades`
--
ALTER TABLE `grades`
  ADD CONSTRAINT `studentID` FOREIGN KEY (`studentID`) REFERENCES `students` (`sid`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `subjectID` FOREIGN KEY (`subjectID`) REFERENCES `subjects` (`subid`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `teacherID` FOREIGN KEY (`teacherID`) REFERENCES `teachers` (`tid`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `ss`
--
ALTER TABLE `ss`
  ADD CONSTRAINT `studentID_ssid` FOREIGN KEY (`studentID_ssid`) REFERENCES `students` (`sid`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `subjectID_ssid` FOREIGN KEY (`subjectId_ssid`) REFERENCES `subjects` (`subid`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `ts`
--
ALTER TABLE `ts`
  ADD CONSTRAINT `subjectID_tsid` FOREIGN KEY (`subjectID_subid`) REFERENCES `subjects` (`subid`),
  ADD CONSTRAINT `teacherID_tsid` FOREIGN KEY (`teacherID_subid`) REFERENCES `teachers` (`tid`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
