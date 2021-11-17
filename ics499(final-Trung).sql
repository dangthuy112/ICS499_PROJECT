-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Nov 17, 2021 at 02:50 AM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.12

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
  `announcementID` int(11) NOT NULL,
  `courseID_ann` int(11) NOT NULL,
  `announcement` varchar(2000) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `announcement`
--

INSERT INTO `announcement` (`announcementID`, `courseID_ann`, `announcement`, `date`) VALUES
(1, 8, 'Hello every one', '2021-10-08'),
(2, 8, 'Today we have quizz', '2021-09-23'),
(3, 8, 'Today we have quizz', '2021-10-20'),
(4, 8, 'Today we have quizz', '2021-11-10'),
(5, 8, 'Final quizz ', '2021-12-08'),
(6, 9, 'Hello every one', '2021-10-08'),
(7, 9, 'Today we have quizz', '2021-09-23'),
(8, 9, 'Today we have quizz', '2021-10-20'),
(9, 9, 'Today we have quizz', '2021-11-10'),
(10, 9, 'Final quizz ', '2021-12-08'),
(11, 11, 'Hello every one', '2021-10-08'),
(12, 11, 'Today we have quizz', '2021-09-23'),
(13, 11, 'Today we have quizzzzz            ', '2021-10-20'),
(14, 11, 'Today we have quizz', '2021-11-10'),
(15, 11, 'Final quizz ', '2021-12-08');

-- --------------------------------------------------------

--
-- Table structure for table `assignment`
--

CREATE TABLE `assignment` (
  `assignmentID` int(11) NOT NULL,
  `assignmentname` varchar(100) NOT NULL,
  `courseID_ass` int(11) NOT NULL,
  `date` date NOT NULL,
  `content` varchar(2000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `assignment`
--

INSERT INTO `assignment` (`assignmentID`, `assignmentname`, `courseID_ass`, `date`, `content`) VALUES
(1, 'Assignment 1', 8, '2021-10-08', '>>>>>>CONTENT>>>>>>>>'),
(2, 'Assignment 2', 8, '2021-09-23', '>>>>>>CONTENT>>>>>>>>'),
(3, 'Project 1', 8, '2021-10-20', '>>>>>>CONTENT>>>>>>>>'),
(4, 'Project 2', 8, '2021-11-10', '>>>>>>CONTENT>>>>>>>>'),
(5, 'Final assigment', 8, '2021-12-08', '>>>>>>CONTENT>>>>>>>>'),
(6, 'Assignment 1', 9, '2021-10-08', '>>>>>>CONTENT>>>>>>>>'),
(7, 'Assignment 2', 9, '2021-09-23', '>>>>>>CONTENT>>>>>>>>'),
(8, 'Midterm Assignment', 9, '2021-10-20', '>>>>>>CONTENT>>>>>>>>'),
(9, 'Assignment 3', 9, '2021-11-10', '>>>>>>CONTENT>>>>>>>>'),
(10, 'Final assigment', 9, '2021-12-08', '>>>>>>CONTENT>>>>>>>>'),
(11, 'Assignment 1', 11, '2021-10-08', '>>>>>>CONTENT>>>>>>>>'),
(12, 'Assignment 2', 11, '2021-09-23', '>>>>>>CONTENT>>>>>>>>'),
(13, 'Midterm Assignment                                                ', 11, '2021-10-20', '100000'),
(14, 'Assignment 3', 11, '2021-11-10', '>>>>>>CONTENT>>>>>>>>'),
(15, 'Final assigment', 11, '2021-12-08', '>>>>>>CONTENT>>>>>>>>'),
(17, '1', 11, '2021-12-10', '1');

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
  `coursename` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`courseID`, `subject`, `coursenumber`, `semester`, `days`, `location`, `delivery method`, `time`, `coursename`) VALUES
(1, 'Math', 480, 'Current Semester', 'TH', 'Metro State  room1', 'In person', '6:30 pm', 'Algebra'),
(2, 'Math', 580, 'Current Semester', 'W', 'Metro State  room1', 'In person', '6:30 pm', 'Advance Algebra'),
(3, 'Math', 680, 'Current Semester', 'T', 'Metro State  room1', 'In person', '6:30 pm', 'Calculus 1'),
(4, 'Math', 1000, 'Current Semester', 'M', 'Metro State  room1', 'In person', '6:30 pm', 'Calculus 2'),
(5, 'ICS', 340, 'Current Semester', 'TH', 'Online studing', 'Online', '6:30 pm', 'Java Basic'),
(6, 'ICS', 380, 'Current Semester', 'W', 'Online studing', 'Online', '6:30 pm', 'Java 8'),
(7, 'ICS', 440, 'Current Semester', 'T', 'Online studing', 'Online', '6:30 pm', 'Mutiple Thread'),
(8, 'ICS', 449, 'Current Semester', 'M', 'Online studing', 'Online', '6:30 pm', 'Capston Project'),
(9, 'ESOL', 122, 'Current Semester', 'TH', 'Metro State  room 3', 'In person', '10.00 am', 'Level 1 '),
(10, 'ESOL', 124, 'Current Semester', 'W', 'Metro State  room 3', 'In person', '10.00 am', 'Level 2'),
(11, 'ESOL', 180, 'Current Semester', 'T', 'Metro State  room 3', 'In person', '10.00 am', 'Level 3'),
(12, 'ESOL', 200, 'Current Semester', 'M', 'Metro State  room 3', 'In person', '10.00 am', 'Level 4'),
(13, 'Math', 480, 'Next Semester', 'TH', 'Metro State  room1', 'In person', '6:30 pm', 'Algebra'),
(14, 'Math', 580, 'Next Semester', 'W', 'Metro State  room1', 'In person', '6:30 pm', 'Advance Algebra'),
(15, 'Math', 680, 'Next Semester', 'T', 'Metro State  room1', 'In person', '6:30 pm', 'Calculus 1'),
(16, 'Math', 1000, 'Next Semester', 'M', 'Metro State  room1', 'In person', '6:30 pm', 'Calculus 2'),
(17, 'ICS', 340, 'Next Semester', 'TH', 'Online studing', 'Online', '6:30 pm', 'Java Basic'),
(18, 'ICS', 380, 'Next Semester', 'W', 'Online studing', 'Online', '6:30 pm', 'Java 8'),
(19, 'ICS', 440, 'Next Semester', 'T', 'Online studing', 'Online', '6:30 pm', 'Mutiple Thread'),
(20, 'ICS', 449, 'Next Semester', 'M', 'Online studing', 'Online', '6:30 pm', 'Capston Project'),
(21, 'ESOL', 122, 'Next Semester', 'TH', 'Metro State  room 3', 'In person', '10.00 am', 'Level 1 '),
(22, 'ESOL', 124, 'Next Semester', 'W', 'Metro State  room 3', 'In person', '10.00 am', 'Level 2'),
(23, 'ESOL', 180, 'Next Semester', 'T', 'Metro State  room 3', 'In person', '10.00 am', 'Level 3'),
(24, 'ESOL', 200, 'Next Semester', 'M', 'Metro State  room 3', 'In person', '10.00 am', 'Level 4');

-- --------------------------------------------------------

--
-- Table structure for table `grades`
--

CREATE TABLE `grades` (
  `gradeID` int(11) NOT NULL,
  `studentID_grade` int(11) NOT NULL,
  `courseID_grade` int(11) NOT NULL,
  `grade_item` varchar(100) NOT NULL,
  `score` varchar(45) NOT NULL,
  `feedback` varchar(1000) DEFAULT NULL,
  `gradename` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `grades`
--

INSERT INTO `grades` (`gradeID`, `studentID_grade`, `courseID_grade`, `grade_item`, `score`, `feedback`, `gradename`) VALUES
(1, 9, 8, 'assignment', '100', 'good', 'Assignment 1'),
(2, 9, 8, 'quizz', '12', 'bad', 'Quizz 1'),
(3, 9, 8, 'activity', '87', 'good', 'Activity in class'),
(4, 9, 8, 'assignment', '96', 'good', 'Assignment 2'),
(5, 9, 8, 'quizz', '65', 'bad', 'Quizz 2'),
(6, 9, 11, 'activity', '76', 'bad', 'Activities in class'),
(7, 9, 9, 'assignment', '76', 'bad', 'Assignment 1'),
(8, 9, 9, 'quizz', '98', 'good', 'Quizz 1'),
(9, 9, 9, 'activity', '77', 'bad', 'Activities online'),
(10, 9, 9, 'assignment', '65', 'bad', 'Assignment 2'),
(11, 9, 9, 'quizz', '87', 'good', 'Quizz 2'),
(12, 9, 11, 'activity', '89', 'good', 'Activities online'),
(13, 9, 11, '', '1000', 'good', 'Assignment 10                '),
(14, 9, 11, 'quizz', '22', 'bad', 'Quizz10     '),
(15, 9, 11, 'activity', '67', 'bad', 'Activity in class'),
(16, 9, 11, 'assignment', '87', 'good', 'Assignment 2'),
(17, 9, 11, '', '10001', ' Good', 'Assignment 100        '),
(18, 9, 11, '1', '1', '1', 'assgnment'),
(20, 9, 11, 'activity', '1000', ' goog', 'class ativities');

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
(2, 'John,Bobby', 'male', 'sain john', '2'),
(3, 'bob bobby', 'male', '123', '2'),
(4, 'Lincoln,C', 'female', '445 apple', ''),
(12, 'test', 'Female', 'test', '');

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
(1, 3),
(1, 17),
(1, 21),
(2, 5),
(2, 6),
(2, 7),
(2, 8),
(2, 18),
(3, 2),
(3, 4),
(3, 11),
(3, 19),
(3, 24),
(4, 13),
(4, 14),
(4, 15),
(4, 16),
(4, 20);

-- --------------------------------------------------------

--
-- Table structure for table `note`
--

CREATE TABLE `note` (
  `noteID` int(100) NOT NULL,
  `studentID_note` int(11) NOT NULL,
  `courseID_note` int(11) NOT NULL,
  `badge` varchar(100) NOT NULL,
  `note_type` varchar(100) NOT NULL,
  `note` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `note`
--

INSERT INTO `note` (`noteID`, `studentID_note`, `courseID_note`, `badge`, `note_type`, `note`) VALUES
(1, 9, 11, 'Old', 'assignment', 'There is a new assignment '),
(2, 9, 11, 'Old', 'gradelist', 'A grade posted'),
(3, 1, 11, 'New', 'gradelist', 'A grade posted'),
(4, 9, 11, 'Old', 'gradelist', 'A grade posted'),
(5, 1, 11, 'New', 'assignment', 'There is an modification of assignment posted'),
(6, 9, 11, 'Old', 'assignment', 'There is an modification of assignment posted'),
(7, 1, 11, 'New', 'assignment', 'There is an modification of assignment posted'),
(8, 9, 11, 'Old', 'assignment', 'There is an modification of assignment posted'),
(9, 9, 11, 'Old', 'gradelist', 'The is a modification of grade posted'),
(10, 1, 11, 'New', 'assignment', 'There is an modification of assignment posted'),
(11, 9, 11, 'Old', 'assignment', 'There is an modification of assignment posted'),
(12, 1, 11, 'New', 'assignment', 'There is an modification of assignment posted'),
(13, 9, 11, 'Old', 'assignment', 'There is an modification of assignment posted'),
(14, 9, 11, 'Old', 'gradelist', 'The is a modification of grade posted'),
(15, 1, 11, 'New', 'assignment', 'There is an modification of assignment posted'),
(16, 9, 11, 'Old', 'assignment', 'There is an modification of assignment posted'),
(17, 9, 11, 'Old', 'gradelist', 'The is a modification of grade posted'),
(18, 9, 11, 'Old', 'gradelist', 'The is a modification of grade posted'),
(19, 9, 11, 'Old', 'gradelist', 'The is a modification of grade posted'),
(20, 1, 11, 'New', 'assignment', 'There is an modification of assignment posted'),
(21, 9, 11, 'Old', 'assignment', 'There is an modification of assignment posted'),
(22, 9, 11, 'Old', 'gradelist', 'A grade posted'),
(23, 1, 11, 'New', 'assignment', 'There is an modification of assignment posted'),
(24, 9, 11, 'Old', 'assignment', 'There is an modification of assignment posted');

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
(1, 3),
(1, 11),
(1, 12),
(2, 1),
(2, 2),
(2, 4),
(2, 12),
(3, 1),
(3, 2),
(3, 3),
(3, 5),
(4, 3),
(4, 4),
(4, 6),
(5, 4),
(5, 5),
(5, 7),
(6, 5),
(6, 6),
(6, 8),
(7, 6),
(7, 7),
(7, 9),
(8, 7),
(8, 8),
(8, 10),
(9, 8),
(9, 9),
(9, 11),
(9, 13),
(9, 14),
(9, 16),
(9, 19),
(10, 9),
(10, 12),
(11, 1),
(11, 10),
(11, 12);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `userID` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `userID_student` int(11) DEFAULT NULL,
  `userID_instructor` int(11) DEFAULT NULL,
  `userID_admin` int(11) DEFAULT NULL,
  `role` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`userID`, `username`, `password`, `userID_student`, `userID_instructor`, `userID_admin`, `role`) VALUES
(1, 'trungpham', 'trungpham', 9, NULL, NULL, 3),
(2, 'student', 'student', 1, NULL, NULL, 3),
(10, 'admin', 'admin', NULL, NULL, 1, 1),
(13, 'washingtonA', 'washintona69', NULL, 1, NULL, 2),
(25, 'test', 'test', NULL, 12, NULL, 2),
(28, 'bob', 'bobby420', NULL, 3, NULL, 2);

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
  ADD PRIMARY KEY (`announcementID`),
  ADD KEY `courseID_ann_idx` (`courseID_ann`);

--
-- Indexes for table `assignment`
--
ALTER TABLE `assignment`
  ADD PRIMARY KEY (`assignmentID`),
  ADD KEY `courseID_ass_idx` (`courseID_ass`);

--
-- Indexes for table `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`courseID`);

--
-- Indexes for table `grades`
--
ALTER TABLE `grades`
  ADD PRIMARY KEY (`gradeID`),
  ADD KEY `studentID_grade_idx` (`studentID_grade`),
  ADD KEY `courseID_grade_idx` (`courseID_grade`);

--
-- Indexes for table `instructors`
--
ALTER TABLE `instructors`
  ADD PRIMARY KEY (`instructorID`),
  ADD KEY `instructorID` (`instructorID`);

--
-- Indexes for table `instructor_enroll`
--
ALTER TABLE `instructor_enroll`
  ADD PRIMARY KEY (`instructorID_enroll`,`courseID_enroll`),
  ADD KEY `courseID_enroll_idx` (`courseID_enroll`);

--
-- Indexes for table `note`
--
ALTER TABLE `note`
  ADD PRIMARY KEY (`noteID`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`studentID`);

--
-- Indexes for table `student_enroll`
--
ALTER TABLE `student_enroll`
  ADD PRIMARY KEY (`studentID_enroll`,`courseID_enroll`),
  ADD KEY `courseID_enroll` (`courseID_enroll`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`userID`),
  ADD KEY `id_idx` (`userID`),
  ADD KEY `userID_admin_idx` (`userID_admin`),
  ADD KEY `userID_instructor` (`userID_instructor`),
  ADD KEY `userID_student` (`userID_student`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `adminID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `announcement`
--
ALTER TABLE `announcement`
  MODIFY `announcementID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `assignment`
--
ALTER TABLE `assignment`
  MODIFY `assignmentID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `courses`
--
ALTER TABLE `courses`
  MODIFY `courseID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `grades`
--
ALTER TABLE `grades`
  MODIFY `gradeID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `instructors`
--
ALTER TABLE `instructors`
  MODIFY `instructorID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `note`
--
ALTER TABLE `note`
  MODIFY `noteID` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `studentID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `userID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `announcement`
--
ALTER TABLE `announcement`
  ADD CONSTRAINT `courseID_ann` FOREIGN KEY (`courseID_ann`) REFERENCES `courses` (`courseID`);

--
-- Constraints for table `assignment`
--
ALTER TABLE `assignment`
  ADD CONSTRAINT `courseID_ass` FOREIGN KEY (`courseID_ass`) REFERENCES `courses` (`courseID`);

--
-- Constraints for table `grades`
--
ALTER TABLE `grades`
  ADD CONSTRAINT `courseID_grade` FOREIGN KEY (`courseID_grade`) REFERENCES `courses` (`courseID`),
  ADD CONSTRAINT `studentID_grade` FOREIGN KEY (`studentID_grade`) REFERENCES `students` (`studentID`);

--
-- Constraints for table `instructor_enroll`
--
ALTER TABLE `instructor_enroll`
  ADD CONSTRAINT `courseID_enroll` FOREIGN KEY (`courseID_enroll`) REFERENCES `courses` (`courseID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `instructorID_enroll` FOREIGN KEY (`instructorID_enroll`) REFERENCES `instructors` (`instructorID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `student_enroll`
--
ALTER TABLE `student_enroll`
  ADD CONSTRAINT `student_enroll_ibfk_1` FOREIGN KEY (`studentID_enroll`) REFERENCES `students` (`studentID`),
  ADD CONSTRAINT `student_enroll_ibfk_2` FOREIGN KEY (`courseID_enroll`) REFERENCES `courses` (`courseID`);

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`userID_admin`) REFERENCES `admin` (`adminID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `users_ibfk_2` FOREIGN KEY (`userID_instructor`) REFERENCES `instructors` (`instructorID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `users_ibfk_3` FOREIGN KEY (`userID_student`) REFERENCES `students` (`studentID`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
