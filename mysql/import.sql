-- mysqldump-php https://github.com/ifsnop/mysqldump-php
--
-- Host: localhost	Database: material_db
-- ------------------------------------------------------
-- Server version 	5.5.5-10.1.32-MariaDB
-- Date: Wed, 23 May 2018 08:13:05 +0200

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `equipment`
--

/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `equipment` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `barcode` varchar(13) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `detail` text,
  `image` varchar(50) NOT NULL DEFAULT 'default.pbg',
  PRIMARY KEY (`id`),
  KEY `barcode` (`barcode`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `equipment`
--

LOCK TABLES `equipment` WRITE;
/*!40000 ALTER TABLE `equipment` DISABLE KEYS */;
SET autocommit=0;
INSERT INTO `equipment` VALUES (3,'2343234','sdfsdfsdfsd','fsdfdsfsdf','default.pbg');
/*!40000 ALTER TABLE `equipment` ENABLE KEYS */;
UNLOCK TABLES;
COMMIT;

--
-- Table structure for table `equipment_history`
--

/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `equipment_history` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `datetime` datetime DEFAULT CURRENT_TIMESTAMP COMMENT 'วันที่ส่งคำขอ',
  `equipment_id` int(11) NOT NULL,
  `amount` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `student_id` varchar(13) DEFAULT NULL,
  `status` enum('รับอุปกรณ์แล้ว','คืนอุปกรณ์แล้ว') NOT NULL DEFAULT 'รับอุปกรณ์แล้ว',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `equipment_history`
--

LOCK TABLES `equipment_history` WRITE;
/*!40000 ALTER TABLE `equipment_history` DISABLE KEYS */;
SET autocommit=0;
/*!40000 ALTER TABLE `equipment_history` ENABLE KEYS */;
UNLOCK TABLES;
COMMIT;

--
-- Table structure for table `equipment_inventory`
--

/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `equipment_inventory` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `amount` int(50) DEFAULT NULL,
  `equipment_id` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `equipment_inventory`
--

LOCK TABLES `equipment_inventory` WRITE;
/*!40000 ALTER TABLE `equipment_inventory` DISABLE KEYS */;
SET autocommit=0;
/*!40000 ALTER TABLE `equipment_inventory` ENABLE KEYS */;
UNLOCK TABLES;
COMMIT;

--
-- Table structure for table `material`
--

/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `material` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `barcode` varchar(13) DEFAULT NULL,
  `name` varchar(100) NOT NULL,
  `detail` text NOT NULL,
  `type_id` int(10) NOT NULL,
  `unit_id` int(11) NOT NULL,
  `image` varchar(100) NOT NULL DEFAULT 'defa',
  PRIMARY KEY (`id`),
  UNIQUE KEY `barcode` (`barcode`),
  KEY `barcode_2` (`barcode`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `material`
--

LOCK TABLES `material` WRITE;
/*!40000 ALTER TABLE `material` DISABLE KEYS */;
SET autocommit=0;
INSERT INTO `material` VALUES (1,'1111','dd','aaaa',0,0,'defa');
/*!40000 ALTER TABLE `material` ENABLE KEYS */;
UNLOCK TABLES;
COMMIT;

--
-- Table structure for table `material_inventory`
--

/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `material_inventory` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `datetime` datetime DEFAULT CURRENT_TIMESTAMP,
  `user_id` int(11) NOT NULL,
  `material_id` int(11) NOT NULL,
  `amount` int(11) NOT NULL,
  `student_id` varchar(13) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `material_inventory`
--

LOCK TABLES `material_inventory` WRITE;
/*!40000 ALTER TABLE `material_inventory` DISABLE KEYS */;
SET autocommit=0;
/*!40000 ALTER TABLE `material_inventory` ENABLE KEYS */;
UNLOCK TABLES;
COMMIT;

--
-- Table structure for table `material_stock`
--

/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `material_stock` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `material_id` varchar(100) DEFAULT NULL,
  `amount` int(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `material_stock`
--

LOCK TABLES `material_stock` WRITE;
/*!40000 ALTER TABLE `material_stock` DISABLE KEYS */;
SET autocommit=0;
/*!40000 ALTER TABLE `material_stock` ENABLE KEYS */;
UNLOCK TABLES;
COMMIT;

--
-- Table structure for table `material_type`
--

/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `material_type` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `material_type`
--

LOCK TABLES `material_type` WRITE;
/*!40000 ALTER TABLE `material_type` DISABLE KEYS */;
SET autocommit=0;
INSERT INTO `material_type` VALUES (10,'111'),(11,'222');
/*!40000 ALTER TABLE `material_type` ENABLE KEYS */;
UNLOCK TABLES;
COMMIT;

--
-- Table structure for table `report_no`
--

/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `report_no` (
  `id` int(5) unsigned zerofill NOT NULL AUTO_INCREMENT,
  `datetime` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `user_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `report_no`
--

LOCK TABLES `report_no` WRITE;
/*!40000 ALTER TABLE `report_no` DISABLE KEYS */;
SET autocommit=0;
/*!40000 ALTER TABLE `report_no` ENABLE KEYS */;
UNLOCK TABLES;
COMMIT;

--
-- Table structure for table `student`
--

/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `student` (
  `id` varchar(13) NOT NULL COMMENT 'รหัสนักศึกษา',
  `full_name` varchar(50) NOT NULL,
  `section` varchar(50) NOT NULL,
  `last_login` datetime DEFAULT NULL COMMENT 'ใช้งานครั้งล่าสุด',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `student`
--

LOCK TABLES `student` WRITE;
/*!40000 ALTER TABLE `student` DISABLE KEYS */;
SET autocommit=0;
/*!40000 ALTER TABLE `student` ENABLE KEYS */;
UNLOCK TABLES;
COMMIT;

--
-- Table structure for table `unit`
--

/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `unit` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=45 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `unit`
--

LOCK TABLES `unit` WRITE;
/*!40000 ALTER TABLE `unit` DISABLE KEYS */;
SET autocommit=0;
INSERT INTO `unit` VALUES (18,'asds'),(19,'dd'),(20,'dcd'),(21,'ede'),(22,'ede'),(23,'dd'),(24,'dffd'),(25,'asd'),(26,'ersdf'),(27,'dd'),(28,'dd'),(29,'dd'),(30,'4'),(31,'r'),(32,'3'),(33,'dd'),(34,'d'),(35,'df'),(36,'e'),(37,'dfgdf'),(38,'df'),(39,''),(40,'asds'),(41,'4'),(42,'sdd'),(43,'2w33'),(44,'rt');
/*!40000 ALTER TABLE `unit` ENABLE KEYS */;
UNLOCK TABLES;
COMMIT;

--
-- Table structure for table `user`
--

/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `fullname` varchar(50) DEFAULT NULL,
  `address` varchar(200) DEFAULT NULL,
  `tel` varchar(10) DEFAULT NULL,
  `login` varchar(20) DEFAULT NULL,
  `password` varchar(10) DEFAULT NULL,
  `status` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `user_login` (`login`)
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user`
--

LOCK TABLES `user` WRITE;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
SET autocommit=0;
INSERT INTO `user` VALUES (1,'suthathip suksawat','42/3 m6 tkhonoi asichon jnakhonsitammarat 80120','0936970259','admin','1234','admin'),(2,'user1','42/3 m6 tkhonoi asichon jnakhonsitammarat 80120','0936970259','user','1234','user'),(6,'ccc','ccc','ccc','ccc','ccc','ccc'),(8,'111','111','111','111','111','111'),(9,'aaa','aaa','aaa','aaa','aaa','aaa'),(10,'ccccc','ccccc','ccccc','ccccc','ccccc','ccccc'),(11,'keya','keya','keya','keya','keya','keya'),(12,'xxcc','xxcc','xxcc','xxcc','xxcc','xxcc'),(13,'xaxaxa','xaxaxa','xaxaxa','xaxaxa','xaxaxa','xaxaxa'),(14,'asdas','asdas','asdas','asdas','asdas','asdas'),(15,'aasasas','aasasas','aasasas','aasasas','aasasas','aasasas'),(16,'sdasas','sdasas','sdasas','sdasas','sdasas','sdasas'),(17,'a','a','a','a','a','a'),(18,'aaaa','aaaa','aaaa','aaaa','aaaa','aaaa'),(19,'aac','aac','aac','aac','aac','aac'),(20,'aaaxxx','aaaxxx','aaaxxx','aaaxxx','aaaxxx','aaaxxx'),(21,NULL,NULL,NULL,NULL,NULL,NULL),(22,NULL,NULL,NULL,NULL,NULL,NULL),(23,NULL,NULL,NULL,NULL,NULL,NULL),(24,NULL,NULL,NULL,NULL,NULL,NULL),(25,NULL,NULL,NULL,NULL,NULL,NULL),(26,NULL,NULL,NULL,NULL,NULL,NULL),(27,'aa','aa','aa','aa','aa',NULL),(28,'33','','','','',NULL);
/*!40000 ALTER TABLE `user` ENABLE KEYS */;
UNLOCK TABLES;
COMMIT;

/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on: Wed, 23 May 2018 08:13:05 +0200
