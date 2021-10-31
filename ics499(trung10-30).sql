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
  `adminID` int NOT NULL AUTO_INCREMENT,
  `name` varchar(45) NOT NULL,
  PRIMARY KEY (`adminID`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
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
  `announcementID` int NOT NULL,
  `courseID_ann` int NOT NULL,
  `instructorID_ann` int NOT NULL,
  `announcement` varchar(2000) NOT NULL,
  `date` date NOT NULL,
  PRIMARY KEY (`announcementID`),
  KEY `courseID_ann_idx` (`courseID_ann`),
  KEY `instructorID_ann_idx` (`instructorID_ann`),
  CONSTRAINT `courseID_ann` FOREIGN KEY (`courseID_ann`) REFERENCES `courses` (`courseID`),
  CONSTRAINT `instructorID_ann` FOREIGN KEY (`instructorID_ann`) REFERENCES `instructors` (`instructorID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `announcement`
--

LOCK TABLES `announcement` WRITE;
/*!40000 ALTER TABLE `announcement` DISABLE KEYS */;
INSERT INTO `announcement` VALUES (1,8,2,'Hello every one','2021-10-08'),(2,8,2,'Today we have quizz','2021-09-23'),(3,8,2,'Today we have quizz','2021-10-20'),(4,8,2,'Today we have quizz','2021-11-10'),(5,8,2,'Final quizz ','2021-12-08'),(6,9,3,'Hello every one','2021-10-08'),(7,9,3,'Today we have quizz','2021-09-23'),(8,9,3,'Today we have quizz','2021-10-20'),(9,9,3,'Today we have quizz','2021-11-10'),(10,9,3,'Final quizz ','2021-12-08'),(11,11,3,'Hello every one','2021-10-08'),(12,11,3,'Today we have quizz','2021-09-23'),(13,11,3,'Today we have quizz','2021-10-20'),(14,11,3,'Today we have quizz','2021-11-10'),(15,11,3,'Final quizz ','2021-12-08');
/*!40000 ALTER TABLE `announcement` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `assignment`
--

DROP TABLE IF EXISTS `assignment`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `assignment` (
  `assignmentID` int NOT NULL,
  `assignmentname` varchar(100) NOT NULL,
  `courseID_ass` int NOT NULL,
  `instructorID_ass` int NOT NULL,
  `date` date NOT NULL,
  `content` varchar(2000) NOT NULL,
  PRIMARY KEY (`assignmentID`),
  KEY `courseID_ass_idx` (`courseID_ass`),
  KEY `instructorID_ass_idx` (`instructorID_ass`),
  CONSTRAINT `courseID_ass` FOREIGN KEY (`courseID_ass`) REFERENCES `courses` (`courseID`),
  CONSTRAINT `instructorID_ass` FOREIGN KEY (`instructorID_ass`) REFERENCES `instructors` (`instructorID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `assignment`
--

LOCK TABLES `assignment` WRITE;
/*!40000 ALTER TABLE `assignment` DISABLE KEYS */;
INSERT INTO `assignment` VALUES (1,'Assignment 1',8,2,'2021-10-08','>>>>>>CONTENT>>>>>>>>'),(2,'Assignment 2',8,2,'2021-09-23','>>>>>>CONTENT>>>>>>>>'),(3,'Project 1',8,2,'2021-10-20','>>>>>>CONTENT>>>>>>>>'),(4,'Project 2',8,2,'2021-11-10','>>>>>>CONTENT>>>>>>>>'),(5,'Final assigment',8,2,'2021-12-08','>>>>>>CONTENT>>>>>>>>'),(6,'Assignment 1',9,3,'2021-10-08','>>>>>>CONTENT>>>>>>>>'),(7,'Assignment 2',9,3,'2021-09-23','>>>>>>CONTENT>>>>>>>>'),(8,'Midterm Assignment',9,3,'2021-10-20','>>>>>>CONTENT>>>>>>>>'),(9,'Assignment 3',9,3,'2021-11-10','>>>>>>CONTENT>>>>>>>>'),(10,'Final assigment',9,3,'2021-12-08','>>>>>>CONTENT>>>>>>>>'),(11,'Assignment 1',11,3,'2021-10-08','>>>>>>CONTENT>>>>>>>>'),(12,'Assignment 2',11,3,'2021-09-23','>>>>>>CONTENT>>>>>>>>'),(13,'Midterm Assignment',11,3,'2021-10-20','>>>>>>CONTENT>>>>>>>>'),(14,'Assignment 3',11,3,'2021-11-10','>>>>>>CONTENT>>>>>>>>'),(15,'Final assigment',11,3,'2021-12-08','>>>>>>CONTENT>>>>>>>>');
/*!40000 ALTER TABLE `assignment` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `courses`
--

DROP TABLE IF EXISTS `courses`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `courses` (
  `courseID` int NOT NULL AUTO_INCREMENT,
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
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
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
  `gradeID` int NOT NULL,
  `studentID_grade` int NOT NULL,
  `instructorID_grade` int NOT NULL,
  `courseID_grade` int NOT NULL,
  `grade_item` varchar(100) NOT NULL,
  `score` varchar(45) NOT NULL,
  `feedback` varchar(1000) DEFAULT NULL,
  `gradename` varchar(100) NOT NULL,
  PRIMARY KEY (`gradeID`),
  KEY `instructorID_grade_idx` (`instructorID_grade`),
  KEY `studentID_grade_idx` (`studentID_grade`),
  KEY `courseID_grade_idx` (`courseID_grade`),
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
INSERT INTO `grades` VALUES (1,9,2,8,'assignment','100','good','Assignment 1'),(2,9,2,8,'quizz','12','bad','Quizz 1'),(3,9,2,8,'activity','87','good','Activity in class'),(4,9,2,8,'assignment','96','good','Assignment 2'),(5,9,2,8,'quizz','65','bad','Quizz 2'),(6,9,3,11,'activity','76','bad','Activities in class'),(7,9,3,9,'assignment','76','bad','Assignment 1'),(8,9,3,9,'quizz','98','good','Quizz 1'),(9,9,3,9,'activity','77','bad','Activities online'),(10,9,3,9,'assignment','65','bad','Assignment 2'),(11,9,3,9,'quizz','87','good','Quizz 2'),(12,9,3,11,'activity','89','good','Activities online'),(13,9,3,11,'assignment','100','good','Assignment 1'),(14,9,3,11,'quizz','22','bad','Quizz1'),(15,9,3,11,'activity','67','bad','Activity in class'),(16,9,3,11,'assignment','87','good','Assignment 2');
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
  KEY `courseID_enroll_idx` (`courseID_enroll`),
  CONSTRAINT `courseID_enroll` FOREIGN KEY (`courseID_enroll`) REFERENCES `courses` (`courseID`),
  CONSTRAINT `instructorID_enroll` FOREIGN KEY (`instructorID_enroll`) REFERENCES `instructors` (`instructorID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `instructor_enroll`
--

LOCK TABLES `instructor_enroll` WRITE;
/*!40000 ALTER TABLE `instructor_enroll` DISABLE KEYS */;
INSERT INTO `instructor_enroll` VALUES (1,1),(1,2),(1,3),(1,4),(2,5),(2,6),(2,7),(2,8),(3,9),(3,10),(3,11),(3,12),(4,13),(4,14),(4,15),(4,16),(1,17),(2,18),(3,19),(4,20),(1,21),(3,22);
/*!40000 ALTER TABLE `instructor_enroll` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `instructors`
--

DROP TABLE IF EXISTS `instructors`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `instructors` (
  `instructorID` int NOT NULL AUTO_INCREMENT,
  `fullname` varchar(100) NOT NULL,
  `gender` varchar(45) NOT NULL,
  `address` varchar(45) NOT NULL,
  `role_instructor` varchar(45) NOT NULL,
  PRIMARY KEY (`instructorID`),
  KEY `instructorID` (`instructorID`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `instructors`
--

LOCK TABLES `instructors` WRITE;
/*!40000 ALTER TABLE `instructors` DISABLE KEYS */;
INSERT INTO `instructors` VALUES (1,'Washington,A','male','123 circle ',''),(2,'John,Bobby','male','sain john','2'),(3,'new name','male','new address',''),(4,'Lincoln,C','female','445 apple',''),(5,'sadfsadf','asdfa','asdfasdf',''),(6,'Anderson, Douglas','male','123 myhouse',''),(7,'Bob','male','123 myhouseee','');
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
  PRIMARY KEY (`studentID_enroll`,`courseID_enroll`),
  KEY `courseID_enroll` (`courseID_enroll`),
  CONSTRAINT `student_enroll_ibfk_1` FOREIGN KEY (`studentID_enroll`) REFERENCES `students` (`studentID`),
  CONSTRAINT `student_enroll_ibfk_2` FOREIGN KEY (`courseID_enroll`) REFERENCES `courses` (`courseID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `student_enroll`
--

LOCK TABLES `student_enroll` WRITE;
/*!40000 ALTER TABLE `student_enroll` DISABLE KEYS */;
INSERT INTO `student_enroll` VALUES (1,1),(2,1),(3,1),(11,1),(2,2),(3,2),(1,3),(3,3),(4,3),(2,4),(4,4),(5,4),(3,5),(5,5),(6,5),(4,6),(6,6),(7,6),(5,7),(7,7),(8,7),(6,8),(8,8),(9,8),(7,9),(9,9),(10,9),(8,10),(11,10),(1,11),(9,11),(1,12),(2,12),(10,12),(11,12),(9,13),(9,14),(9,16),(9,19);
/*!40000 ALTER TABLE `student_enroll` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `students`
--

DROP TABLE IF EXISTS `students`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `students` (
  `studentID` int NOT NULL AUTO_INCREMENT,
  `fullname` text NOT NULL,
  `gender` varchar(45) NOT NULL,
  `address` varchar(45) DEFAULT NULL,
  `role_student` varchar(45) NOT NULL,
  PRIMARY KEY (`studentID`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `students`
--

LOCK TABLES `students` WRITE;
/*!40000 ALTER TABLE `students` DISABLE KEYS */;
INSERT INTO `students` VALUES (1,'Simon','male','123 abc',''),(2,'Alvin','male','234 qwe',''),(3,'Theo','male','222 dddd',''),(4,'Brittany','female','789 abc',''),(5,'Jenette','female','987 all',''),(6,'Elenor','female','123 abc',''),(7,'Stu','male','123 abc',''),(8,'Thuy','male','123 abc',''),(9,'Trung','male','123 abc',''),(10,'Aziz','male','123 abc',''),(11,'Vincent','male','123 abc',''),(12,'Dang Thuy Vo','male','12345 dtvhouse','');
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
  `userID_student` int DEFAULT NULL,
  `userID_instructor` int DEFAULT NULL,
  `userID_admin` int DEFAULT NULL,
  `role` int NOT NULL,
  PRIMARY KEY (`userID`),
  KEY `id_idx` (`userID`),
  KEY `userID_admin_idx` (`userID_admin`),
  KEY `userID_instructor` (`userID_instructor`),
  KEY `userID_student` (`userID_student`),
  CONSTRAINT `users_ibfk_1` FOREIGN KEY (`userID_admin`) REFERENCES `admin` (`adminID`),
  CONSTRAINT `users_ibfk_2` FOREIGN KEY (`userID_instructor`) REFERENCES `instructors` (`instructorID`),
  CONSTRAINT `users_ibfk_3` FOREIGN KEY (`userID_student`) REFERENCES `students` (`studentID`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'trungpham','trungpham',9,NULL,NULL,3),(2,'student','student',1,NULL,NULL,3),(10,'admin','admin',NULL,NULL,1,1),(13,'washingtonA','washintona69',NULL,1,NULL,2),(14,'jeffersonB','jefferson34',NULL,3,NULL,2),(15,'lincolnC','lincolnc69',NULL,4,NULL,2),(16,'asdfsadf','asdfsadf',NULL,5,NULL,2),(17,'andersonD','andersond69',NULL,6,NULL,2),(18,'bob','bobby420',NULL,7,NULL,2),(21,'dtvv','dtv69',12,NULL,NULL,3);
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

-- Dump completed on 2021-10-30  9:25:01
