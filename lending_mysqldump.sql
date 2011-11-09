-- MySQL dump 10.13  Distrib 5.5.9, for Win32 (x86)
--
-- Host: localhost    Database: lending
-- ------------------------------------------------------
-- Server version	5.1.36-community-log

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
-- Current Database: `lending`
--

CREATE DATABASE /*!32312 IF NOT EXISTS*/ `lending` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `lending`;

--
-- Table structure for table `lend_admin`
--

DROP TABLE IF EXISTS `lend_admin`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `lend_admin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(45) DEFAULT NULL,
  `password` varchar(45) DEFAULT NULL,
  `rdate` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `lend_admin`
--

LOCK TABLES `lend_admin` WRITE;
/*!40000 ALTER TABLE `lend_admin` DISABLE KEYS */;
INSERT INTO `lend_admin` VALUES (1,'ambet','7ab14eb0555f896b51565a9324119084','2011-09-19 17:28:38'),(2,'ambet2','180a15a4ccb581bc489a94d1ab25a976','2011-09-19 21:03:06');
/*!40000 ALTER TABLE `lend_admin` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `lend_borrower`
--

DROP TABLE IF EXISTS `lend_borrower`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `lend_borrower` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `company` varchar(100) DEFAULT NULL,
  `address` varchar(100) DEFAULT NULL,
  `phone_cell` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `income` varchar(45) DEFAULT NULL,
  `civil_status` varchar(45) DEFAULT NULL,
  `sex` varchar(45) DEFAULT NULL,
  `age` varchar(45) DEFAULT NULL,
  `employment_status` varchar(45) DEFAULT NULL,
  `job_title` varchar(45) DEFAULT NULL,
  `fname` varchar(45) DEFAULT NULL,
  `lname` varchar(45) DEFAULT NULL,
  `mi` varchar(45) DEFAULT NULL,
  `rdate` datetime DEFAULT NULL,
  `birth_date` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `lend_borrower`
--

LOCK TABLES `lend_borrower` WRITE;
/*!40000 ALTER TABLE `lend_borrower` DISABLE KEYS */;
INSERT INTO `lend_borrower` VALUES (1,'Northstar Solutions Inc.','San Pablo, Hagonoy bulacan','0015','seoblogger07@gmail.com','10000','Married',NULL,'25','Employed','Programmer','Lamberto','Guevarra','Ramos','2011-09-22 19:43:46','March 23, 1986'),(2,'Northstar Solutions Inc.','San Pablo, Hagonoy Bulacan dfgdfgdf dff fgdgd dg  dfgdfgdfgddf-df','09153234710','','','',NULL,'2','Unemployed','','Chino Julian','Guevarra','Estrada','2011-09-22 20:13:10','Oct. 28, 2010');
/*!40000 ALTER TABLE `lend_borrower` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `lend_borrower_loan_settings`
--

DROP TABLE IF EXISTS `lend_borrower_loan_settings`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `lend_borrower_loan_settings` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `loan_id` int(11) DEFAULT NULL,
  `borrower_loan_id` int(11) DEFAULT NULL,
  `lname` varchar(90) DEFAULT NULL,
  `interest` float DEFAULT NULL,
  `terms` varchar(45) DEFAULT NULL,
  `frequency` varchar(45) DEFAULT NULL,
  `late_fee` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `lend_borrower_loan_settings`
--

LOCK TABLES `lend_borrower_loan_settings` WRITE;
/*!40000 ALTER TABLE `lend_borrower_loan_settings` DISABLE KEYS */;
INSERT INTO `lend_borrower_loan_settings` VALUES (1,8,20,'2.5% Interest',2.5,'12','2 Weeks',NULL),(2,8,21,'2.5% Interest',2.5,'12','2 Weeks',NULL);
/*!40000 ALTER TABLE `lend_borrower_loan_settings` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `lend_borrower_loans`
--

DROP TABLE IF EXISTS `lend_borrower_loans`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `lend_borrower_loans` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `borrower_id` int(11) DEFAULT NULL,
  `loan_id` int(11) DEFAULT NULL,
  `status` varchar(45) DEFAULT 'ACTIVE',
  `loan_amount` float DEFAULT NULL,
  `loan_amount_interest` float DEFAULT NULL,
  `loan_amount_term` float DEFAULT NULL,
  `loan_amount_total` float DEFAULT NULL,
  `rdate` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=22 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `lend_borrower_loans`
--

LOCK TABLES `lend_borrower_loans` WRITE;
/*!40000 ALTER TABLE `lend_borrower_loans` DISABLE KEYS */;
INSERT INTO `lend_borrower_loans` VALUES (16,2,8,'ACTIVE',50000,1250,9583.33,57500,'2011-09-26 14:01:01'),(15,1,8,'ACTIVE',15000,375,2875,17250,'2011-09-26 09:50:24'),(14,1,8,'ACTIVE',15000,375,2875,17250,'2011-09-26 09:49:46'),(13,1,8,'ACTIVE',10000,250,1916.67,11500,'2011-09-23 14:14:36'),(17,2,8,'ACTIVE',20000,125,958.33,23000,'2011-11-07 09:36:57'),(18,2,8,'ACTIVE',20000,125,958.33,23000,'2011-11-07 09:39:49'),(19,2,8,'ACTIVE',20000,250,1916.67,23000,'2011-11-07 10:34:16'),(20,2,8,'ACTIVE',25000,312.5,2395.83,28750,'2011-11-07 12:55:18'),(21,2,8,'ACTIVE',20000,250,1916.67,23000,'2011-11-07 20:27:32');
/*!40000 ALTER TABLE `lend_borrower_loans` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `lend_loan`
--

DROP TABLE IF EXISTS `lend_loan`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `lend_loan` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `lname` varchar(90) DEFAULT NULL,
  `interest` float DEFAULT NULL,
  `terms` varchar(45) DEFAULT NULL,
  `frequency` varchar(45) DEFAULT NULL,
  `late_fee` int(11) DEFAULT NULL,
  `rdate` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `lend_loan`
--

LOCK TABLES `lend_loan` WRITE;
/*!40000 ALTER TABLE `lend_loan` DISABLE KEYS */;
INSERT INTO `lend_loan` VALUES (8,'2.5% Interest',2.5,'12','2 Weeks',NULL,'2011-09-22 14:59:48');
/*!40000 ALTER TABLE `lend_loan` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `lend_logs`
--

DROP TABLE IF EXISTS `lend_logs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `lend_logs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `admin_id` int(11) DEFAULT NULL,
  `action` varchar(45) DEFAULT NULL,
  `rdate` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `lend_logs`
--

LOCK TABLES `lend_logs` WRITE;
/*!40000 ALTER TABLE `lend_logs` DISABLE KEYS */;
/*!40000 ALTER TABLE `lend_logs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `lend_payments`
--

DROP TABLE IF EXISTS `lend_payments`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `lend_payments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `borrower_id` int(11) DEFAULT NULL,
  `borrower_loan_id` int(11) DEFAULT NULL,
  `payment_sched` date DEFAULT NULL,
  `payment_number` int(11) DEFAULT NULL,
  `amount` float DEFAULT NULL,
  `status` varchar(45) DEFAULT 'UNPAID',
  `rdate` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=121 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `lend_payments`
--

LOCK TABLES `lend_payments` WRITE;
/*!40000 ALTER TABLE `lend_payments` DISABLE KEYS */;
INSERT INTO `lend_payments` VALUES (15,1,13,'2011-12-22',3,1916.67,'UNPAID','2011-09-23 14:14:36'),(14,1,13,'2011-11-22',2,1916.67,'UNPAID','2011-09-23 14:14:36'),(13,1,13,'2011-10-23',1,1916.67,'UNPAID','2011-09-23 14:14:36'),(16,1,13,'2012-01-21',4,1916.67,'UNPAID','2011-09-23 14:14:36'),(17,1,13,'2012-02-20',5,1916.67,'UNPAID','2011-09-23 14:14:36'),(18,1,13,'2012-03-21',6,1916.67,'UNPAID','2011-09-23 14:14:36'),(19,1,14,'2011-10-26',1,2875,'UNPAID','2011-09-26 09:49:46'),(20,1,14,'2011-11-25',2,2875,'UNPAID','2011-09-26 09:49:47'),(21,1,14,'2011-12-25',3,2875,'UNPAID','2011-09-26 09:49:47'),(22,1,14,'2012-01-24',4,2875,'UNPAID','2011-09-26 09:49:47'),(23,1,14,'2012-02-23',5,2875,'UNPAID','2011-09-26 09:49:47'),(24,1,14,'2012-03-24',6,2875,'UNPAID','2011-09-26 09:49:47'),(25,1,15,'2011-10-26',1,2875,'UNPAID','2011-09-26 09:50:24'),(26,1,15,'2011-11-25',2,2875,'UNPAID','2011-09-26 09:50:24'),(27,1,15,'2011-12-25',3,2875,'UNPAID','2011-09-26 09:50:24'),(28,1,15,'2012-01-24',4,2875,'UNPAID','2011-09-26 09:50:24'),(29,1,15,'2012-02-23',5,2875,'UNPAID','2011-09-26 09:50:24'),(30,1,15,'2012-03-24',6,2875,'UNPAID','2011-09-26 09:50:24'),(31,2,16,'2011-10-26',1,9583.33,'UNPAID','2011-09-26 14:01:01'),(32,2,16,'2011-11-25',2,9583.33,'UNPAID','2011-09-26 14:01:01'),(33,2,16,'2011-12-25',3,9583.33,'UNPAID','2011-09-26 14:01:01'),(34,2,16,'2012-01-24',4,9583.33,'UNPAID','2011-09-26 14:01:01'),(35,2,16,'2012-02-23',5,9583.33,'UNPAID','2011-09-26 14:01:01'),(36,2,16,'2012-03-24',6,9583.33,'UNPAID','2011-09-26 14:01:01'),(37,2,17,'2011-11-14',1,958.33,'UNPAID','2011-11-07 09:36:57'),(38,2,17,'2011-11-21',2,958.33,'UNPAID','2011-11-07 09:36:57'),(39,2,17,'2011-11-28',3,958.33,'UNPAID','2011-11-07 09:36:57'),(40,2,17,'2011-12-05',4,958.33,'UNPAID','2011-11-07 09:36:57'),(41,2,17,'2011-12-12',5,958.33,'UNPAID','2011-11-07 09:36:57'),(42,2,17,'2011-12-19',6,958.33,'UNPAID','2011-11-07 09:36:57'),(43,2,17,'2011-12-26',7,958.33,'UNPAID','2011-11-07 09:36:57'),(44,2,17,'2012-01-02',8,958.33,'UNPAID','2011-11-07 09:36:57'),(45,2,17,'2012-01-09',9,958.33,'UNPAID','2011-11-07 09:36:57'),(46,2,17,'2012-01-16',10,958.33,'UNPAID','2011-11-07 09:36:57'),(47,2,17,'2012-01-23',11,958.33,'UNPAID','2011-11-07 09:36:57'),(48,2,17,'2012-01-30',12,958.33,'UNPAID','2011-11-07 09:36:57'),(49,2,17,'2012-02-06',13,958.33,'UNPAID','2011-11-07 09:36:57'),(50,2,17,'2012-02-13',14,958.33,'UNPAID','2011-11-07 09:36:57'),(51,2,17,'2012-02-20',15,958.33,'UNPAID','2011-11-07 09:36:57'),(52,2,17,'2012-02-27',16,958.33,'UNPAID','2011-11-07 09:36:57'),(53,2,17,'2012-03-05',17,958.33,'UNPAID','2011-11-07 09:36:57'),(54,2,17,'2012-03-12',18,958.33,'UNPAID','2011-11-07 09:36:57'),(55,2,17,'2012-03-19',19,958.33,'UNPAID','2011-11-07 09:36:57'),(56,2,17,'2012-03-26',20,958.33,'UNPAID','2011-11-07 09:36:57'),(57,2,17,'2012-04-02',21,958.33,'UNPAID','2011-11-07 09:36:57'),(58,2,17,'2012-04-09',22,958.33,'UNPAID','2011-11-07 09:36:57'),(59,2,17,'2012-04-16',23,958.33,'UNPAID','2011-11-07 09:36:57'),(60,2,17,'2012-04-23',24,958.33,'UNPAID','2011-11-07 09:36:57'),(61,2,18,'2011-11-14',1,958.33,'UNPAID','2011-11-07 09:39:49'),(62,2,18,'2011-11-21',2,958.33,'UNPAID','2011-11-07 09:39:49'),(63,2,18,'2011-11-28',3,958.33,'UNPAID','2011-11-07 09:39:49'),(64,2,18,'2011-12-05',4,958.33,'UNPAID','2011-11-07 09:39:49'),(65,2,18,'2011-12-12',5,958.33,'UNPAID','2011-11-07 09:39:49'),(66,2,18,'2011-12-19',6,958.33,'UNPAID','2011-11-07 09:39:49'),(67,2,18,'2011-12-26',7,958.33,'UNPAID','2011-11-07 09:39:49'),(68,2,18,'2012-01-02',8,958.33,'UNPAID','2011-11-07 09:39:49'),(69,2,18,'2012-01-09',9,958.33,'UNPAID','2011-11-07 09:39:49'),(70,2,18,'2012-01-16',10,958.33,'UNPAID','2011-11-07 09:39:49'),(71,2,18,'2012-01-23',11,958.33,'UNPAID','2011-11-07 09:39:49'),(72,2,18,'2012-01-30',12,958.33,'UNPAID','2011-11-07 09:39:49'),(73,2,18,'2012-02-06',13,958.33,'UNPAID','2011-11-07 09:39:49'),(74,2,18,'2012-02-13',14,958.33,'UNPAID','2011-11-07 09:39:49'),(75,2,18,'2012-02-20',15,958.33,'UNPAID','2011-11-07 09:39:49'),(76,2,18,'2012-02-27',16,958.33,'UNPAID','2011-11-07 09:39:49'),(77,2,18,'2012-03-05',17,958.33,'UNPAID','2011-11-07 09:39:49'),(78,2,18,'2012-03-12',18,958.33,'UNPAID','2011-11-07 09:39:49'),(79,2,18,'2012-03-19',19,958.33,'UNPAID','2011-11-07 09:39:49'),(80,2,18,'2012-03-26',20,958.33,'UNPAID','2011-11-07 09:39:49'),(81,2,18,'2012-04-02',21,958.33,'UNPAID','2011-11-07 09:39:49'),(82,2,18,'2012-04-09',22,958.33,'UNPAID','2011-11-07 09:39:49'),(83,2,18,'2012-04-16',23,958.33,'UNPAID','2011-11-07 09:39:49'),(84,2,18,'2012-04-23',24,958.33,'UNPAID','2011-11-07 09:39:49'),(85,2,19,'2011-11-22',1,1916.67,'UNPAID','2011-11-07 10:34:16'),(86,2,19,'2011-12-07',2,1916.67,'UNPAID','2011-11-07 10:34:16'),(87,2,19,'2011-12-22',3,1916.67,'UNPAID','2011-11-07 10:34:16'),(88,2,19,'2012-01-06',4,1916.67,'UNPAID','2011-11-07 10:34:16'),(89,2,19,'2012-01-21',5,1916.67,'UNPAID','2011-11-07 10:34:16'),(90,2,19,'2012-02-05',6,1916.67,'UNPAID','2011-11-07 10:34:16'),(91,2,19,'2012-02-20',7,1916.67,'UNPAID','2011-11-07 10:34:16'),(92,2,19,'2012-03-06',8,1916.67,'UNPAID','2011-11-07 10:34:16'),(93,2,19,'2012-03-21',9,1916.67,'UNPAID','2011-11-07 10:34:16'),(94,2,19,'2012-04-05',10,1916.67,'UNPAID','2011-11-07 10:34:16'),(95,2,19,'2012-04-20',11,1916.67,'UNPAID','2011-11-07 10:34:16'),(96,2,19,'2012-05-05',12,1916.67,'UNPAID','2011-11-07 10:34:16'),(97,2,20,'2011-11-22',1,2395.83,'UNPAID','2011-11-07 12:55:19'),(98,2,20,'2011-12-07',2,2395.83,'UNPAID','2011-11-07 12:55:19'),(99,2,20,'2011-12-22',3,2395.83,'UNPAID','2011-11-07 12:55:19'),(100,2,20,'2012-01-06',4,2395.83,'UNPAID','2011-11-07 12:55:19'),(101,2,20,'2012-01-21',5,2395.83,'UNPAID','2011-11-07 12:55:19'),(102,2,20,'2012-02-05',6,2395.83,'UNPAID','2011-11-07 12:55:19'),(103,2,20,'2012-02-20',7,2395.83,'UNPAID','2011-11-07 12:55:19'),(104,2,20,'2012-03-06',8,2395.83,'UNPAID','2011-11-07 12:55:19'),(105,2,20,'2012-03-21',9,2395.83,'UNPAID','2011-11-07 12:55:19'),(106,2,20,'2012-04-05',10,2395.83,'UNPAID','2011-11-07 12:55:19'),(107,2,20,'2012-04-20',11,2395.83,'UNPAID','2011-11-07 12:55:19'),(108,2,20,'2012-05-05',12,2395.83,'UNPAID','2011-11-07 12:55:19'),(109,2,21,'2011-11-23',1,1916.67,'UNPAID','2011-11-07 20:27:33'),(110,2,21,'2011-12-08',2,1916.67,'UNPAID','2011-11-07 20:27:33'),(111,2,21,'2011-12-23',3,1916.67,'UNPAID','2011-11-07 20:27:33'),(112,2,21,'2012-01-07',4,1916.67,'UNPAID','2011-11-07 20:27:33'),(113,2,21,'2012-01-22',5,1916.67,'UNPAID','2011-11-07 20:27:33'),(114,2,21,'2012-02-06',6,1916.67,'UNPAID','2011-11-07 20:27:33'),(115,2,21,'2012-02-21',7,1916.67,'UNPAID','2011-11-07 20:27:33'),(116,2,21,'2012-03-07',8,1916.67,'UNPAID','2011-11-07 20:27:33'),(117,2,21,'2012-03-22',9,1916.67,'UNPAID','2011-11-07 20:27:33'),(118,2,21,'2012-04-06',10,1916.67,'UNPAID','2011-11-07 20:27:33'),(119,2,21,'2012-04-21',11,1916.67,'UNPAID','2011-11-07 20:27:33'),(120,2,21,'2012-05-06',12,1916.67,'UNPAID','2011-11-07 20:27:33');
/*!40000 ALTER TABLE `lend_payments` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `lend_transactions`
--

DROP TABLE IF EXISTS `lend_transactions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `lend_transactions` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `borrower_id` int(11) DEFAULT NULL,
  `payment` int(11) DEFAULT NULL,
  `admin_id` varchar(45) DEFAULT NULL,
  `payment_id` int(11) DEFAULT NULL,
  `rdate` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `lend_transactions`
--

LOCK TABLES `lend_transactions` WRITE;
/*!40000 ALTER TABLE `lend_transactions` DISABLE KEYS */;
/*!40000 ALTER TABLE `lend_transactions` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2011-11-09 14:21:21
