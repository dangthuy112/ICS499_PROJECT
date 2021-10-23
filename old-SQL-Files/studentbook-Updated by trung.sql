-- MySQL dump 10.13  Distrib 8.0.26, for Win64 (x86_64)
--
-- Host: 127.0.0.1    Database: ics499
-- ------------------------------------------------------
-- Server version	8.0.26

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `admin`
--

DROP TABLE IF EXISTS `admin`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `admin` (
  `adminID` int NOT NULL,
  `name` varchar(45) NOT NULL,
  PRIMARY KEY (`adminID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `admin`
--

LOCK TABLES `admin` WRITE;
/*!40000 ALTER TABLE `admin` DISABLE KEYS */;
INSERT INTO `admin` VALUES (1,'thuy'),(2,'trung'),(3,'aziz'),(4,'vincent');
/*!40000 ALTER TABLE `admin` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `announcement`
--

DROP TABLE IF EXISTS `announcement`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `announcement` (
  `courseID` int NOT NULL,
  `instructorID` int NOT NULL,
  `announcement` varchar(200) NOT NULL,
  PRIMARY KEY (`courseID`,`instructorID`),
  KEY `instructorID_idx` (`instructorID`),
  CONSTRAINT `courseID` FOREIGN KEY (`courseID`) REFERENCES `courses` (`courseID`),
  CONSTRAINT `instructorID` FOREIGN KEY (`instructorID`) REFERENCES `instructors` (`instructorID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `announcement`
--

LOCK TABLES `announcement` WRITE;
/*!40000 ALTER TABLE `announcement` DISABLE KEYS */;
INSERT INTO `announcement` VALUES (1,1,'Hello every one');
/*!40000 ALTER TABLE `announcement` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `courses`
--

DROP TABLE IF EXISTS `courses`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `courses` (
  `courseID` int NOT NULL,
  `subject` varchar(100) NOT NULL,
  `coursenumber` int NOT NULL,
  `semester` varchar(100) NOT NULL,
  `days` varchar(45) NOT NULL,
  `location` varchar(45) NOT NULL,
  `delivery method` varchar(45) NOT NULL,
  `time` varchar(45) DEFAULT NULL,
  `Instructor` varchar(45) DEFAULT NULL,
  `coursename` varchar(100) NOT NULL,
  PRIMARY KEY (`courseID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `courses`
--

LOCK TABLES `courses` WRITE;
/*!40000 ALTER TABLE `courses` DISABLE KEYS */;
INSERT INTO `courses` VALUES (1,'Math',480,'Current Semester','TH','Metro State  room1','In person','6:30 pm','Washington,A','Algebra'),(2,'Math',580,'Current Semester','W','Metro State  room1','In person','6:30 pm','Washington,A','Advance Algebra'),(3,'Math',680,'Current Semester','T','Metro State  room1','In person','6:30 pm','Jefferson,B','Calculus 1'),(4,'Math',1000,'Current Semester','M','Metro State  room1','In person','6:30 pm','Jefferson,B','Calculus 2'),(5,'ICS',340,'Current Semester','TH','Online studing','Online','6:30 pm','Adams,T','Java Basic'),(6,'ICS',380,'Current Semester','W','Online studing','Online','6:30 pm','Adams,T','Java 8'),(7,'ICS',440,'Current Semester','T','Online studing','Online','6:30 pm','Adams,T','Mutiple Thread'),(8,'ICS',449,'Current Semester','M','Online studing','Online','6:30 pm','Adams,T','Capston Project'),(9,'ESOL',122,'Current Semester','TH','Metro State  room 3','In person','10.00 am','Lincoln,C','Level 1 '),(10,'ESOL',124,'Current Semester','W','Metro State  room 3','In person','10.00 am','Lincoln,C','Level 2'),(11,'ESOL',180,'Current Semester','T','Metro State  room 3','In person','10.00 am','Lincoln,C','Level 3'),(12,'ESOL',200,'Current Semester','M','Metro State  room 3','In person','10.00 am','Lincoln,C','Level 4'),(13,'Math',480,'Next Semester','TH','Metro State  room1','In person','6:30 pm','Washington,A','Algebra'),(14,'Math',580,'Next Semester','W','Metro State  room1','In person','6:30 pm','Washington,A','Advance Algebra'),(15,'Math',680,'Next Semester','T','Metro State  room1','In person','6:30 pm','Jefferson,B','Calculus 1'),(16,'Math',1000,'Next Semester','M','Metro State  room1','In person','6:30 pm','Jefferson,B','Calculus 2'),(17,'ICS',340,'Next Semester','TH','Online studing','Online','6:30 pm','Adams,T','Java Basic'),(18,'ICS',380,'Next Semester','W','Online studing','Online','6:30 pm','Adams,T','Java 8'),(19,'ICS',440,'Next Semester','T','Online studing','Online','6:30 pm','Adams,T','Mutiple Thread'),(20,'ICS',449,'Next Semester','M','Online studing','Online','6:30 pm','Adams,T','Capston Project'),(21,'ESOL',122,'Next Semester','TH','Metro State  room 3','In person','10.00 am','Lincoln,C','Level 1 '),(22,'ESOL',124,'Next Semester','W','Metro State  room 3','In person','10.00 am','Lincoln,C','Level 2'),(23,'ESOL',180,'Next Semester','T','Metro State  room 3','In person','10.00 am','Lincoln,C','Level 3'),(24,'ESOL',200,'Next Semester','M','Metro State  room 3','In person','10.00 am','Lincoln,C','Level 4');
/*!40000 ALTER TABLE `courses` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `grades`
--

DROP TABLE IF EXISTS `grades`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `grades` (
  `studentID_grade` int NOT NULL,
  `instructorID_grade` int NOT NULL,
  `courseID_grade` int NOT NULL,
  `grade_item` char(100) NOT NULL,
  `score` char(10) NOT NULL,
  `feedback` char(250) NOT NULL,
  PRIMARY KEY (`studentID_grade`,`instructorID_grade`,`courseID_grade`),
  KEY `tid_idx` (`instructorID_grade`),
  KEY `subjectID_idx` (`courseID_grade`),
  CONSTRAINT `courseID_grade` FOREIGN KEY (`courseID_grade`) REFERENCES `courses` (`courseID`),
  CONSTRAINT `instructorID_grade` FOREIGN KEY (`instructorID_grade`) REFERENCES `instructors` (`instructorID`),
  CONSTRAINT `studentID_grade` FOREIGN KEY (`studentID_grade`) REFERENCES `students` (`studentID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `grades`
--

LOCK TABLES `grades` WRITE;
/*!40000 ALTER TABLE `grades` DISABLE KEYS */;
/*!40000 ALTER TABLE `grades` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `instructor_enroll`
--

DROP TABLE IF EXISTS `instructor_enroll`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `instructor_enroll` (
  `instructorID_enroll` int NOT NULL,
  `courseID_enroll` int NOT NULL,
  PRIMARY KEY (`instructorID_enroll`,`courseID_enroll`),
  KEY `subjectID_tsid_idx` (`courseID_enroll`),
  CONSTRAINT `subjectID_tsid` FOREIGN KEY (`courseID_enroll`) REFERENCES `courses` (`courseID`),
  CONSTRAINT `teacherID_tsid` FOREIGN KEY (`instructorID_enroll`) REFERENCES `instructors` (`instructorID`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `instructor_enroll`
--

LOCK TABLES `instructor_enroll` WRITE;
/*!40000 ALTER TABLE `instructor_enroll` DISABLE KEYS */;
INSERT INTO `instructor_enroll` VALUES (1,1),(1,2),(3,3),(3,4),(2,5),(2,6),(2,7),(2,8),(4,9),(4,10),(4,11),(4,12),(1,13),(1,14),(3,15),(3,16),(2,17),(2,18),(2,19),(2,20),(4,21),(4,22),(4,23),(4,24);
/*!40000 ALTER TABLE `instructor_enroll` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `instructors`
--

DROP TABLE IF EXISTS `instructors`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `instructors` (
  `instructorID` int NOT NULL,
  `fullname` varchar(100) NOT NULL,
  `gender` varchar(45) NOT NULL,
  `address` varchar(45) NOT NULL,
  `role_instructor` varchar(45) NOT NULL,
  PRIMARY KEY (`instructorID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `instructors`
--

LOCK TABLES `instructors` WRITE;
/*!40000 ALTER TABLE `instructors` DISABLE KEYS */;
INSERT INTO `instructors` VALUES (1,'Washington,A','male','123 circle ',''),(2,'Adams,T','male','234 zircon',''),(3,'Jefferson,B','female','324 hollow',''),(4,'Lincoln,C','female','445 apple','');
/*!40000 ALTER TABLE `instructors` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `student_enroll`
--

DROP TABLE IF EXISTS `student_enroll`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `student_enroll` (
  `studentID_enroll` int NOT NULL,
  `courseID_enroll` int NOT NULL,
  PRIMARY KEY (`courseID_enroll`,`studentID_enroll`),
  KEY `subjectID_idx` (`courseID_enroll`),
  KEY `studentID_subid_idx` (`studentID_enroll`),
  CONSTRAINT `studentID_ssid` FOREIGN KEY (`studentID_enroll`) REFERENCES `students` (`studentID`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `subjectID_ssid` FOREIGN KEY (`courseID_enroll`) REFERENCES `courses` (`courseID`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `student_enroll`
--

LOCK TABLES `student_enroll` WRITE;
/*!40000 ALTER TABLE `student_enroll` DISABLE KEYS */;
INSERT INTO `student_enroll` VALUES (1,1),(2,1),(3,1),(11,1),(2,2),(3,2),(1,3),(3,3),(4,3),(2,4),(4,4),(5,4),(3,5),(5,5),(6,5),(4,6),(6,6),(7,6),(5,7),(7,7),(8,7),(6,8),(8,8),(9,8),(7,9),(9,9),(10,9),(8,10),(11,10),(1,11),(9,11),(1,12),(2,12),(10,12),(11,12);
/*!40000 ALTER TABLE `student_enroll` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `students`
--

DROP TABLE IF EXISTS `students`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `students` (
  `studentID` int NOT NULL,
  `fullname` text NOT NULL,
  `gender` varchar(45) NOT NULL,
  `address` varchar(45) DEFAULT NULL,
  `role_student` varchar(45) NOT NULL,
  PRIMARY KEY (`studentID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `students`
--

LOCK TABLES `students` WRITE;
/*!40000 ALTER TABLE `students` DISABLE KEYS */;
INSERT INTO `students` VALUES (1,'Simon','male','123 abc',''),(2,'Alvin','male','234 qwe',''),(3,'Theo','male','222 dddd',''),(4,'Brittany','female','789 abc',''),(5,'Jenette','female','987 all',''),(6,'Elenor','female','123 abc',''),(7,'Stu','male','123 abc',''),(8,'Thuy','male','123 abc',''),(9,'Trung','male','123 abc',''),(10,'Aziz','male','123 abc',''),(11,'Vincent','male','123 abc','');
/*!40000 ALTER TABLE `students` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `users` (
  `userID` int NOT NULL AUTO_INCREMENT,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `useID_student` int DEFAULT NULL,
  `userID_intructor` int DEFAULT NULL,
  `userID_admin` int DEFAULT NULL,
  PRIMARY KEY (`userID`),
  KEY `id_idx` (`userID`),
  KEY `userID_student_idx` (`useID_student`),
  KEY `userID_admin_idx` (`userID_admin`),
  KEY `userID_instructor_idx` (`userID_intructor`),
  CONSTRAINT `userID_admin` FOREIGN KEY (`userID_admin`) REFERENCES `admin` (`adminID`),
  CONSTRAINT `userID_instructor` FOREIGN KEY (`userID_intructor`) REFERENCES `instructors` (`instructorID`),
  CONSTRAINT `userID_student` FOREIGN KEY (`useID_student`) REFERENCES `students` (`studentID`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'trungpham','trungpham',9,NULL,NULL),(2,'student','student',1,NULL,NULL),(3,'instructor','instructor',NULL,1,NULL),(10,'admin','admin',NULL,NULL,1);
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2021-10-19 18:55:36
