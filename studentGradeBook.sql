-- MySQL dump 10.13  Distrib 8.0.26, for Win64 (x86_64)
--
-- Host: 127.0.0.1    Database: grade
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
-- Table structure for table `announcement`
--

DROP TABLE IF EXISTS `announcement`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `announcement` (
  `annid` int NOT NULL,
  `teacher_ID` int NOT NULL,
  `announcement` varchar(200) NOT NULL,
  PRIMARY KEY (`annid`),
  KEY `teacher_ID_idx` (`teacher_ID`),
  CONSTRAINT `teacher_ID` FOREIGN KEY (`teacher_ID`) REFERENCES `teachers` (`tid`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `announcement`
--

LOCK TABLES `announcement` WRITE;
/*!40000 ALTER TABLE `announcement` DISABLE KEYS */;
INSERT INTO `announcement` VALUES (1,1,'hello1 '),(2,2,'hello adams'),(3,3,'hello wha'),(4,4,'hello4');
/*!40000 ALTER TABLE `announcement` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `grades`
--

DROP TABLE IF EXISTS `grades`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `grades` (
  `studentID` int NOT NULL,
  `teacherID` int NOT NULL,
  `subjectID` int NOT NULL,
  `grade_item` char(100) NOT NULL,
  `score` char(10) NOT NULL,
  `feedback` char(250) NOT NULL,
  PRIMARY KEY (`studentID`,`teacherID`,`subjectID`),
  KEY `tid_idx` (`teacherID`),
  KEY `subjectID_idx` (`subjectID`),
  CONSTRAINT `studentID` FOREIGN KEY (`studentID`) REFERENCES `students` (`sid`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `subjectID` FOREIGN KEY (`subjectID`) REFERENCES `subjects` (`subid`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `teacherID` FOREIGN KEY (`teacherID`) REFERENCES `teachers` (`tid`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `grades`
--

LOCK TABLES `grades` WRITE;
/*!40000 ALTER TABLE `grades` DISABLE KEYS */;
INSERT INTO `grades` VALUES (1,1,2,'quiz','100','good'),(2,2,3,'quiz','33','good'),(2,3,4,'qsa','87','good'),(3,3,4,'quiz','89','good'),(4,4,1,'quiz','99','good'),(5,1,3,'quiz','78','good'),(6,2,4,'quiz','98','good'),(7,3,1,'quiz','76','good'),(8,4,2,'quiz','77','good'),(9,1,4,'quiz','88','good'),(10,2,1,'quiz','55','good'),(11,3,2,'quiz','66','good');
/*!40000 ALTER TABLE `grades` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ss`
--

DROP TABLE IF EXISTS `ss`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `ss` (
  `studentID_ssid` int NOT NULL,
  `subjectId_ssid` int NOT NULL,
  PRIMARY KEY (`subjectId_ssid`,`studentID_ssid`),
  KEY `subjectID_idx` (`subjectId_ssid`),
  KEY `studentID_subid_idx` (`studentID_ssid`),
  CONSTRAINT `studentID_ssid` FOREIGN KEY (`studentID_ssid`) REFERENCES `students` (`sid`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `subjectID_ssid` FOREIGN KEY (`subjectId_ssid`) REFERENCES `subjects` (`subid`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ss`
--

LOCK TABLES `ss` WRITE;
/*!40000 ALTER TABLE `ss` DISABLE KEYS */;
INSERT INTO `ss` VALUES (2,1),(3,1),(4,1),(6,1),(7,1),(8,1),(10,1),(11,1),(1,2),(3,2),(4,2),(5,2),(7,2),(8,2),(9,2),(11,2),(1,3),(2,3),(4,3),(5,3),(6,3),(8,3),(9,3),(10,3),(1,4),(2,4),(3,4),(5,4),(6,4),(7,4),(10,4),(11,4);
/*!40000 ALTER TABLE `ss` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `students`
--

DROP TABLE IF EXISTS `students`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `students` (
  `sid` int NOT NULL,
  `name` text NOT NULL,
  PRIMARY KEY (`sid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `students`
--

LOCK TABLES `students` WRITE;
/*!40000 ALTER TABLE `students` DISABLE KEYS */;
INSERT INTO `students` VALUES (1,'Simon'),(2,'Alvin'),(3,'Theo'),(4,'Brittany'),(5,'Jenette'),(6,'Elenor'),(7,'Stu'),(8,'Thuy'),(9,'Trung'),(10,'Aziz'),(11,'Vincent');
/*!40000 ALTER TABLE `students` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `subjects`
--

DROP TABLE IF EXISTS `subjects`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `subjects` (
  `subid` int NOT NULL,
  `name` text NOT NULL,
  PRIMARY KEY (`subid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `subjects`
--

LOCK TABLES `subjects` WRITE;
/*!40000 ALTER TABLE `subjects` DISABLE KEYS */;
INSERT INTO `subjects` VALUES (1,'History'),(2,'Biology'),(3,'SF'),(4,'Math');
/*!40000 ALTER TABLE `subjects` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `teachers`
--

DROP TABLE IF EXISTS `teachers`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `teachers` (
  `tid` int NOT NULL,
  `name` text NOT NULL,
  PRIMARY KEY (`tid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `teachers`
--

LOCK TABLES `teachers` WRITE;
/*!40000 ALTER TABLE `teachers` DISABLE KEYS */;
INSERT INTO `teachers` VALUES (1,'Washington'),(2,'Adams'),(3,'Jefferson'),(4,'Lincoln');
/*!40000 ALTER TABLE `teachers` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ts`
--

DROP TABLE IF EXISTS `ts`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `ts` (
  `teacherID_subid` int NOT NULL,
  `subjectID_subid` int NOT NULL,
  PRIMARY KEY (`teacherID_subid`,`subjectID_subid`),
  KEY `subjectID_tsid_idx` (`subjectID_subid`),
  CONSTRAINT `subjectID_tsid` FOREIGN KEY (`subjectID_subid`) REFERENCES `subjects` (`subid`),
  CONSTRAINT `teacherID_tsid` FOREIGN KEY (`teacherID_subid`) REFERENCES `teachers` (`tid`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ts`
--

LOCK TABLES `ts` WRITE;
/*!40000 ALTER TABLE `ts` DISABLE KEYS */;
INSERT INTO `ts` VALUES (2,1),(3,1),(4,1),(1,2),(3,2),(4,2),(1,3),(2,3),(4,3),(1,4),(2,4),(3,4);
/*!40000 ALTER TABLE `ts` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2021-09-27 20:28:50
