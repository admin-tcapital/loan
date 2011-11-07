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
) ENGINE=MyISAM AUTO_INCREMENT=17 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `lend_borrower_loans`
--

LOCK TABLES `lend_borrower_loans` WRITE;
/*!40000 ALTER TABLE `lend_borrower_loans` DISABLE KEYS */;
INSERT INTO `lend_borrower_loans` VALUES (16,2,8,'ACTIVE',50000,1250,9583.33,57500,'2011-09-26 14:01:01'),(15,1,8,'ACTIVE',15000,375,2875,17250,'2011-09-26 09:50:24'),(14,1,8,'ACTIVE',15000,375,2875,17250,'2011-09-26 09:49:46'),(13,1,8,'ACTIVE',10000,250,1916.67,11500,'2011-09-23 14:14:36');
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
  `frequency` smallint(6) DEFAULT NULL,
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
INSERT INTO `lend_loan` VALUES (8,'2.5% Interest',1.25,'12',15,NULL,'2011-09-22 14:59:48');
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
) ENGINE=MyISAM AUTO_INCREMENT=37 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `lend_payments`
--

LOCK TABLES `lend_payments` WRITE;
/*!40000 ALTER TABLE `lend_payments` DISABLE KEYS */;
INSERT INTO `lend_payments` VALUES (15,1,13,'2011-12-22',3,1916.67,'UNPAID','2011-09-23 14:14:36'),(14,1,13,'2011-11-22',2,1916.67,'UNPAID','2011-09-23 14:14:36'),(13,1,13,'2011-10-23',1,1916.67,'UNPAID','2011-09-23 14:14:36'),(16,1,13,'2012-01-21',4,1916.67,'UNPAID','2011-09-23 14:14:36'),(17,1,13,'2012-02-20',5,1916.67,'UNPAID','2011-09-23 14:14:36'),(18,1,13,'2012-03-21',6,1916.67,'UNPAID','2011-09-23 14:14:36'),(19,1,14,'2011-10-26',1,2875,'UNPAID','2011-09-26 09:49:46'),(20,1,14,'2011-11-25',2,2875,'UNPAID','2011-09-26 09:49:47'),(21,1,14,'2011-12-25',3,2875,'UNPAID','2011-09-26 09:49:47'),(22,1,14,'2012-01-24',4,2875,'UNPAID','2011-09-26 09:49:47'),(23,1,14,'2012-02-23',5,2875,'UNPAID','2011-09-26 09:49:47'),(24,1,14,'2012-03-24',6,2875,'UNPAID','2011-09-26 09:49:47'),(25,1,15,'2011-10-26',1,2875,'UNPAID','2011-09-26 09:50:24'),(26,1,15,'2011-11-25',2,2875,'UNPAID','2011-09-26 09:50:24'),(27,1,15,'2011-12-25',3,2875,'UNPAID','2011-09-26 09:50:24'),(28,1,15,'2012-01-24',4,2875,'UNPAID','2011-09-26 09:50:24'),(29,1,15,'2012-02-23',5,2875,'UNPAID','2011-09-26 09:50:24'),(30,1,15,'2012-03-24',6,2875,'UNPAID','2011-09-26 09:50:24'),(31,2,16,'2011-10-26',1,9583.33,'UNPAID','2011-09-26 14:01:01'),(32,2,16,'2011-11-25',2,9583.33,'UNPAID','2011-09-26 14:01:01'),(33,2,16,'2011-12-25',3,9583.33,'UNPAID','2011-09-26 14:01:01'),(34,2,16,'2012-01-24',4,9583.33,'UNPAID','2011-09-26 14:01:01'),(35,2,16,'2012-02-23',5,9583.33,'UNPAID','2011-09-26 14:01:01'),(36,2,16,'2012-03-24',6,9583.33,'UNPAID','2011-09-26 14:01:01');
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

-- Dump completed on 2011-11-07 16:22:44