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
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `lend_borrower_loan_settings`
--

LOCK TABLES `lend_borrower_loan_settings` WRITE;
/*!40000 ALTER TABLE `lend_borrower_loan_settings` DISABLE KEYS */;
INSERT INTO `lend_borrower_loan_settings` VALUES (3,8,22,'2.5% Interest',2.5,'12','2 Weeks',NULL);
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
  `next_payment_id` int(11) DEFAULT NULL,
  `rdate` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=23 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `lend_borrower_loans`
--

LOCK TABLES `lend_borrower_loans` WRITE;
/*!40000 ALTER TABLE `lend_borrower_loans` DISABLE KEYS */;
INSERT INTO `lend_borrower_loans` VALUES (22,2,8,'ACTIVE',30000,375,2875,34500,121,'2011-11-09 06:39:10');
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
) ENGINE=MyISAM AUTO_INCREMENT=133 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `lend_payments`
--

LOCK TABLES `lend_payments` WRITE;
/*!40000 ALTER TABLE `lend_payments` DISABLE KEYS */;
INSERT INTO `lend_payments` VALUES (121,2,22,'2011-11-24',1,2875,'UNPAID','2011-11-09 06:39:10'),(122,2,22,'2011-12-09',2,2875,'UNPAID','2011-11-09 06:39:10'),(123,2,22,'2011-12-24',3,2875,'UNPAID','2011-11-09 06:39:10'),(124,2,22,'2012-01-08',4,2875,'UNPAID','2011-11-09 06:39:10'),(125,2,22,'2012-01-23',5,2875,'UNPAID','2011-11-09 06:39:10'),(126,2,22,'2012-02-07',6,2875,'UNPAID','2011-11-09 06:39:10'),(127,2,22,'2012-02-22',7,2875,'UNPAID','2011-11-09 06:39:10'),(128,2,22,'2012-03-08',8,2875,'UNPAID','2011-11-09 06:39:10'),(129,2,22,'2012-03-23',9,2875,'UNPAID','2011-11-09 06:39:10'),(130,2,22,'2012-04-07',10,2875,'UNPAID','2011-11-09 06:39:10'),(131,2,22,'2012-04-22',11,2875,'UNPAID','2011-11-09 06:39:10'),(132,2,22,'2012-05-07',12,2875,'UNPAID','2011-11-09 06:39:10');
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

-- Dump completed on 2011-11-09 16:45:51
