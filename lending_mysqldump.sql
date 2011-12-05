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
INSERT INTO `lend_admin` VALUES (1,'ambet','7ab14eb0555f896b51565a9324119084','2011-09-19 17:28:38');
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
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `lend_borrower`
--

LOCK TABLES `lend_borrower` WRITE;
/*!40000 ALTER TABLE `lend_borrower` DISABLE KEYS */;
INSERT INTO `lend_borrower` VALUES (1,'Northstar Solutions Inc.','San Pablo, Hagonoy bulacan','0015','seoblogger07@gmail.com','10000','Married',NULL,'25','Employed','Programmer','Awww','Ewww','Ramos','2011-09-22 19:43:46','March 23, 1986'),(2,'Northstar Solutions Inc.','San Pablo, Hagonoy Bulacan dfgdfgdf dff fgdgd dg  dfgdfgdfgddf-df','09153234710','','','',NULL,'2','Unemployed','','Ewww','Awww','Estrada','2011-09-22 20:13:10','Oct. 28, 2010'),(3,'','#20 San Pablo, Hagonoy, Bulacan','09153234710','lambert@outsource2northstar.com','','Married',NULL,'25','Employed','','Ambet','Guevarra','Ramos','2011-11-24 15:48:59','March 23, 1986'),(4,'','Address','09153234710','lambert@outsource2northstar.com','','',NULL,'25','Unemployed','','Lambert','Guevarra','Ramos','2011-11-24 15:53:22','March 23, 1986');
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
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `lend_borrower_loan_settings`
--

LOCK TABLES `lend_borrower_loan_settings` WRITE;
/*!40000 ALTER TABLE `lend_borrower_loan_settings` DISABLE KEYS */;
INSERT INTO `lend_borrower_loan_settings` VALUES (5,8,24,'2.5% Interest',2.5,'12','2 Weeks',NULL),(4,8,23,'2.5% Interest',2.5,'12','2 Weeks',NULL),(3,8,22,'2.5% Interest',2.5,'12','2 Weeks',NULL),(6,8,25,'2.5% Interest',2.5,'12','2 Weeks',NULL),(7,8,26,'2.5% Interest',2.5,'12','2 Weeks',NULL),(8,8,27,'2.5% Interest',2.5,'12','2 Weeks',NULL),(9,8,28,'2.5% Interest',2.5,'12','2 Weeks',NULL),(10,8,29,'2.5% Interest',2.5,'12','2 Weeks',NULL),(11,8,30,'2.5% Interest',2.5,'12','2 Weeks',NULL);
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
  `loan_date` date DEFAULT NULL,
  `loan_amount` float DEFAULT NULL,
  `loan_amount_interest` float DEFAULT NULL,
  `loan_amount_term` float DEFAULT NULL,
  `loan_amount_total` float DEFAULT NULL,
  `next_payment_id` int(11) DEFAULT NULL,
  `rdate` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=31 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `lend_borrower_loans`
--

LOCK TABLES `lend_borrower_loans` WRITE;
/*!40000 ALTER TABLE `lend_borrower_loans` DISABLE KEYS */;
INSERT INTO `lend_borrower_loans` VALUES (24,2,8,'CLOSED',NULL,20000,250,1916.67,23000,145,'2011-11-16 05:56:04'),(23,1,8,'CLOSED',NULL,25000,312.5,2395.83,28750,133,'2011-11-16 05:50:32'),(22,2,8,'CLOSED',NULL,30000,375,2875,34500,121,'2011-11-09 06:39:10'),(25,1,8,'CLOSED','0000-00-00',25000,312.5,2395.83,28750,157,'2011-11-18 05:33:51'),(26,1,8,'CLOSED','0000-00-00',20000,250,1916.67,23000,169,'2011-11-18 05:39:30'),(27,1,8,'CLOSED','0000-00-00',20000,250,1916.67,23000,181,'2011-11-18 06:14:24'),(28,2,8,'ACTIVE','0000-00-00',100000,1250,9583.33,115000,193,'2011-11-18 06:44:46'),(29,3,8,'ACTIVE','0000-00-00',10000,125,958.33,11500,205,'2011-11-24 09:37:14'),(30,3,8,'ACTIVE','0000-00-00',15000,187.5,1437.5,17250,217,'2011-11-24 09:38:23');
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
) ENGINE=MyISAM AUTO_INCREMENT=229 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `lend_payments`
--

LOCK TABLES `lend_payments` WRITE;
/*!40000 ALTER TABLE `lend_payments` DISABLE KEYS */;
INSERT INTO `lend_payments` VALUES (228,3,30,'2012-05-06',12,1437.5,'UNPAID','2011-11-24 09:38:24'),(227,3,30,'2012-04-21',11,1437.5,'UNPAID','2011-11-24 09:38:24'),(226,3,30,'2012-04-06',10,1437.5,'UNPAID','2011-11-24 09:38:24'),(225,3,30,'2012-03-22',9,1437.5,'UNPAID','2011-11-24 09:38:24'),(224,3,30,'2012-03-07',8,1437.5,'UNPAID','2011-11-24 09:38:24'),(223,3,30,'2012-02-21',7,1437.5,'UNPAID','2011-11-24 09:38:24'),(222,3,30,'2012-02-06',6,1437.5,'UNPAID','2011-11-24 09:38:24'),(221,3,30,'2012-01-22',5,1437.5,'UNPAID','2011-11-24 09:38:24'),(220,3,30,'2012-01-07',4,1437.5,'UNPAID','2011-11-24 09:38:24'),(219,3,30,'2011-12-23',3,1437.5,'UNPAID','2011-11-24 09:38:23'),(218,3,30,'2011-12-08',2,1437.5,'UNPAID','2011-11-24 09:38:23'),(217,3,30,'2011-11-23',1,1437.5,'UNPAID','2011-11-24 09:38:23'),(216,3,29,'2012-05-07',12,958.33,'UNPAID','2011-11-24 09:37:14'),(215,3,29,'2012-04-22',11,958.33,'UNPAID','2011-11-24 09:37:14'),(214,3,29,'2012-04-07',10,958.33,'UNPAID','2011-11-24 09:37:14'),(213,3,29,'2012-03-23',9,958.33,'UNPAID','2011-11-24 09:37:14'),(212,3,29,'2012-03-08',8,958.33,'UNPAID','2011-11-24 09:37:14'),(211,3,29,'2012-02-22',7,958.33,'UNPAID','2011-11-24 09:37:14'),(210,3,29,'2012-02-07',6,958.33,'UNPAID','2011-11-24 09:37:14'),(209,3,29,'2012-01-23',5,958.33,'UNPAID','2011-11-24 09:37:14'),(208,3,29,'2012-01-08',4,958.33,'UNPAID','2011-11-24 09:37:14'),(207,3,29,'2011-12-24',3,958.33,'UNPAID','2011-11-24 09:37:14'),(206,3,29,'2011-12-09',2,958.33,'UNPAID','2011-11-24 09:37:14'),(205,3,29,'2011-11-24',1,958.33,'UNPAID','2011-11-24 09:37:14'),(204,2,28,'2012-05-13',12,9583.33,'UNPAID','2011-11-18 06:44:46'),(203,2,28,'2012-04-28',11,9583.33,'UNPAID','2011-11-18 06:44:46'),(202,2,28,'2012-04-13',10,9583.33,'UNPAID','2011-11-18 06:44:46'),(201,2,28,'2012-03-29',9,9583.33,'UNPAID','2011-11-18 06:44:46'),(200,2,28,'2012-03-14',8,9583.33,'UNPAID','2011-11-18 06:44:46'),(199,2,28,'2012-02-28',7,9583.33,'UNPAID','2011-11-18 06:44:46'),(198,2,28,'2012-02-13',6,9583.33,'UNPAID','2011-11-18 06:44:46'),(197,2,28,'2012-01-29',5,9583.33,'UNPAID','2011-11-18 06:44:46'),(196,2,28,'2012-01-14',4,9583.33,'UNPAID','2011-11-18 06:44:46'),(195,2,28,'2011-12-30',3,9583.33,'UNPAID','2011-11-18 06:44:46'),(194,2,28,'2011-12-15',2,9583.33,'UNPAID','2011-11-18 06:44:46'),(193,2,28,'2011-11-30',1,9583.33,'UNPAID','2011-11-18 06:44:46'),(192,1,27,'2012-04-30',12,1916.67,'PAID','2011-11-18 06:14:24'),(191,1,27,'2012-04-15',11,1916.67,'PAID','2011-11-18 06:14:24'),(190,1,27,'2012-03-31',10,1916.67,'PAID','2011-11-18 06:14:24'),(189,1,27,'2012-03-16',9,1916.67,'PAID','2011-11-18 06:14:24'),(188,1,27,'2012-03-01',8,1916.67,'PAID','2011-11-18 06:14:24'),(187,1,27,'2012-02-15',7,1916.67,'PAID','2011-11-18 06:14:24'),(186,1,27,'2012-01-31',6,1916.67,'PAID','2011-11-18 06:14:24'),(185,1,27,'2012-01-16',5,1916.67,'PAID','2011-11-18 06:14:24'),(184,1,27,'2012-01-01',4,1916.67,'PAID','2011-11-18 06:14:24'),(183,1,27,'2011-12-17',3,1916.67,'PAID','2011-11-18 06:14:24'),(182,1,27,'2011-12-02',2,1916.67,'PAID','2011-11-18 06:14:24'),(181,1,27,'2011-11-17',1,1916.67,'PAID','2011-11-18 06:14:24'),(180,1,26,'2012-05-15',12,1916.67,'UNPAID','2011-11-18 05:39:30'),(179,1,26,'2012-04-30',11,1916.67,'UNPAID','2011-11-18 05:39:30'),(178,1,26,'2012-04-15',10,1916.67,'UNPAID','2011-11-18 05:39:30'),(177,1,26,'2012-03-31',9,1916.67,'UNPAID','2011-11-18 05:39:30'),(176,1,26,'2012-03-16',8,1916.67,'UNPAID','2011-11-18 05:39:30'),(175,1,26,'2012-03-01',7,1916.67,'UNPAID','2011-11-18 05:39:30'),(174,1,26,'2012-02-15',6,1916.67,'UNPAID','2011-11-18 05:39:30'),(173,1,26,'2012-01-31',5,1916.67,'UNPAID','2011-11-18 05:39:30'),(172,1,26,'2012-01-16',4,1916.67,'UNPAID','2011-11-18 05:39:30'),(171,1,26,'2012-01-01',3,1916.67,'UNPAID','2011-11-18 05:39:30'),(170,1,26,'2011-12-17',2,1916.67,'UNPAID','2011-11-18 05:39:30'),(169,1,26,'2011-12-02',1,1916.67,'PAID','2011-11-18 05:39:30'),(168,1,25,'2012-04-29',12,2395.83,'UNPAID','2011-11-18 05:33:51'),(167,1,25,'2012-04-14',11,2395.83,'UNPAID','2011-11-18 05:33:51'),(166,1,25,'2012-03-30',10,2395.83,'UNPAID','2011-11-18 05:33:51'),(165,1,25,'2012-03-15',9,2395.83,'UNPAID','2011-11-18 05:33:51'),(164,1,25,'2012-02-29',8,2395.83,'UNPAID','2011-11-18 05:33:51'),(163,1,25,'2012-02-14',7,2395.83,'UNPAID','2011-11-18 05:33:51'),(162,1,25,'2012-01-30',6,2395.83,'UNPAID','2011-11-18 05:33:51'),(161,1,25,'2012-01-15',5,2395.83,'UNPAID','2011-11-18 05:33:51'),(160,1,25,'2011-12-31',4,2395.83,'UNPAID','2011-11-18 05:33:51'),(159,1,25,'2011-12-16',3,2395.83,'UNPAID','2011-11-18 05:33:51'),(158,1,25,'2011-12-01',2,2395.83,'UNPAID','2011-11-18 05:33:51'),(157,1,25,'2011-11-16',1,2395.83,'PAID','2011-11-18 05:33:51'),(156,2,24,'2012-05-14',12,1916.67,'UNPAID','2011-11-16 05:56:04'),(155,2,24,'2012-04-29',11,1916.67,'UNPAID','2011-11-16 05:56:04'),(154,2,24,'2012-04-14',10,1916.67,'UNPAID','2011-11-16 05:56:04'),(153,2,24,'2012-03-30',9,1916.67,'UNPAID','2011-11-16 05:56:04'),(152,2,24,'2012-03-15',8,1916.67,'UNPAID','2011-11-16 05:56:04'),(151,2,24,'2012-02-29',7,1916.67,'UNPAID','2011-11-16 05:56:04'),(150,2,24,'2012-02-14',6,1916.67,'UNPAID','2011-11-16 05:56:04'),(149,2,24,'2012-01-30',5,1916.67,'UNPAID','2011-11-16 05:56:04'),(148,2,24,'2012-01-15',4,1916.67,'UNPAID','2011-11-16 05:56:04'),(147,2,24,'2011-12-31',3,1916.67,'UNPAID','2011-11-16 05:56:04'),(146,2,24,'2011-12-16',2,1916.67,'UNPAID','2011-11-16 05:56:04'),(145,2,24,'2011-12-01',1,1916.67,'PAID','2011-11-16 05:56:04'),(144,1,23,'2012-05-14',12,2395.83,'UNPAID','2011-11-16 05:50:32'),(143,1,23,'2012-04-29',11,2395.83,'UNPAID','2011-11-16 05:50:32'),(142,1,23,'2012-04-14',10,2395.83,'UNPAID','2011-11-16 05:50:32'),(141,1,23,'2012-03-30',9,2395.83,'UNPAID','2011-11-16 05:50:32'),(140,1,23,'2012-03-15',8,2395.83,'UNPAID','2011-11-16 05:50:32'),(139,1,23,'2012-02-29',7,2395.83,'UNPAID','2011-11-16 05:50:32'),(138,1,23,'2012-02-14',6,2395.83,'UNPAID','2011-11-16 05:50:32'),(137,1,23,'2012-01-30',5,2395.83,'UNPAID','2011-11-16 05:50:32'),(136,1,23,'2012-01-15',4,2395.83,'UNPAID','2011-11-16 05:50:32'),(135,1,23,'2011-12-31',3,2395.83,'UNPAID','2011-11-16 05:50:32'),(134,1,23,'2011-12-16',2,2395.83,'UNPAID','2011-11-16 05:50:32'),(133,1,23,'2011-12-01',1,2395.83,'PAID','2011-11-16 05:50:32'),(121,2,22,'2011-11-24',1,2875,'PAID','2011-11-09 06:39:10'),(122,2,22,'2011-12-09',2,2875,'PAID','2011-11-09 06:39:10'),(123,2,22,'2011-12-24',3,2875,'PAID','2011-11-09 06:39:10'),(124,2,22,'2012-01-08',4,2875,'PAID','2011-11-09 06:39:10'),(125,2,22,'2012-01-23',5,2875,'PAID','2011-11-09 06:39:10'),(126,2,22,'2012-02-07',6,2875,'PAID','2011-11-09 06:39:10'),(127,2,22,'2012-02-22',7,2875,'PAID','2011-11-09 06:39:10'),(128,2,22,'2012-03-08',8,2875,'PAID','2011-11-09 06:39:10'),(129,2,22,'2012-03-23',9,2875,'PAID','2011-11-09 06:39:10'),(130,2,22,'2012-04-07',10,2875,'PAID','2011-11-09 06:39:10'),(131,2,22,'2012-04-22',11,2875,'PAID','2011-11-09 06:39:10'),(132,2,22,'2012-05-07',12,2875,'PAID','2011-11-09 06:39:10');
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
  `rdate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=31 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `lend_transactions`
--

LOCK TABLES `lend_transactions` WRITE;
/*!40000 ALTER TABLE `lend_transactions` DISABLE KEYS */;
INSERT INTO `lend_transactions` VALUES (4,2,2875,'1',123,'2011-11-15 07:01:19'),(2,2,2875,'1',121,'2011-11-15 06:40:13'),(3,2,2875,'1',122,'2011-11-15 06:41:19'),(5,2,2875,'1',124,'2011-11-15 12:49:13'),(6,2,2875,'1',125,'2011-11-15 12:49:46'),(7,2,2875,'1',126,'2011-11-15 12:49:52'),(8,2,2875,'1',127,'2011-11-15 12:50:03'),(9,2,2875,'1',128,'2011-11-15 12:50:09'),(10,2,2875,'1',129,'2011-11-15 12:50:17'),(11,2,2875,'1',130,'2011-11-15 12:50:23'),(12,2,2875,'1',131,'2011-11-15 12:50:29'),(14,2,2875,'1',132,'2011-11-15 13:04:16'),(15,1,2396,'1',133,'2011-11-16 11:46:22'),(16,2,1917,'1',145,'2011-11-16 11:51:48'),(17,1,2396,'1',157,'2011-11-18 05:36:02'),(18,1,1917,'1',169,'2011-11-18 05:39:44'),(19,1,1917,'1',181,'2011-11-18 06:14:33'),(20,1,1917,'1',182,'2011-11-18 06:14:53'),(21,1,1917,'1',183,'2011-11-18 06:15:04'),(22,1,1917,'1',184,'2011-11-18 06:15:09'),(23,1,1917,'1',185,'2011-11-18 06:15:15'),(24,1,1917,'1',186,'2011-11-18 06:15:21'),(25,1,1917,'1',187,'2011-11-18 06:15:26'),(26,1,1917,'1',188,'2011-11-18 06:15:33'),(27,1,1917,'1',189,'2011-11-18 06:15:38'),(28,1,1917,'1',190,'2011-11-18 06:15:45'),(29,1,1917,'1',191,'2011-11-18 06:15:51'),(30,1,1917,'1',192,'2011-11-18 06:16:02');
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

-- Dump completed on 2011-12-05 13:52:35
