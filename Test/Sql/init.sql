CREATE DATABASE  IF NOT EXISTS `cake-test` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `cake-test`;
-- MySQL dump 10.13  Distrib 5.5.35, for debian-linux-gnu (x86_64)
--
-- Host: localhost    Database: cake-test
-- ------------------------------------------------------
-- Server version	5.5.35-0ubuntu0.13.10.2

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
-- Table structure for table `aros`
--

DROP TABLE IF EXISTS `aros`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `aros` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `parent_id` int(10) DEFAULT NULL,
  `model` varchar(255) DEFAULT NULL,
  `foreign_key` int(10) DEFAULT NULL,
  `alias` varchar(255) DEFAULT NULL,
  `lft` int(10) DEFAULT NULL,
  `rght` int(10) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `aros`
--

LOCK TABLES `aros` WRITE;
/*!40000 ALTER TABLE `aros` DISABLE KEYS */;
INSERT INTO `aros` VALUES (1,NULL,'Group',4,NULL,1,4),(2,1,'User',4,NULL,2,3);
/*!40000 ALTER TABLE `aros` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `aros_acos`
--

DROP TABLE IF EXISTS `aros_acos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `aros_acos` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `aro_id` int(10) NOT NULL,
  `aco_id` int(10) NOT NULL,
  `_create` varchar(2) NOT NULL DEFAULT '0',
  `_read` varchar(2) NOT NULL DEFAULT '0',
  `_update` varchar(2) NOT NULL DEFAULT '0',
  `_delete` varchar(2) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `ARO_ACO_KEY` (`aro_id`,`aco_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `aros_acos`
--

LOCK TABLES `aros_acos` WRITE;
/*!40000 ALTER TABLE `aros_acos` DISABLE KEYS */;
INSERT INTO `aros_acos` VALUES (1,1,89,'1','1','1','1');
/*!40000 ALTER TABLE `aros_acos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `acos`
--

DROP TABLE IF EXISTS `acos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `acos` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `parent_id` int(10) DEFAULT NULL,
  `model` varchar(255) DEFAULT NULL,
  `foreign_key` int(10) DEFAULT NULL,
  `alias` varchar(255) DEFAULT NULL,
  `lft` int(10) DEFAULT NULL,
  `rght` int(10) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=176 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `acos`
--

LOCK TABLES `acos` WRITE;
/*!40000 ALTER TABLE `acos` DISABLE KEYS */;
INSERT INTO `acos` VALUES (89,NULL,NULL,NULL,'controllers',1,174),(90,89,NULL,NULL,'Customers',2,13),(91,90,NULL,NULL,'index',3,4),(92,90,NULL,NULL,'view',5,6),(93,90,NULL,NULL,'add',7,8),(94,90,NULL,NULL,'edit',9,10),(95,90,NULL,NULL,'delete',11,12),(96,89,NULL,NULL,'Docs',14,25),(97,96,NULL,NULL,'index',15,16),(98,96,NULL,NULL,'view',17,18),(99,96,NULL,NULL,'add',19,20),(100,96,NULL,NULL,'edit',21,22),(101,96,NULL,NULL,'delete',23,24),(102,89,NULL,NULL,'Documents',26,37),(103,102,NULL,NULL,'index',27,28),(104,102,NULL,NULL,'view',29,30),(105,102,NULL,NULL,'add',31,32),(106,102,NULL,NULL,'edit',33,34),(107,102,NULL,NULL,'delete',35,36),(108,89,NULL,NULL,'Groups',38,51),(109,108,NULL,NULL,'index',39,40),(110,108,NULL,NULL,'view',41,42),(111,108,NULL,NULL,'add',43,44),(112,108,NULL,NULL,'edit',45,46),(113,108,NULL,NULL,'delete',47,48),(114,108,NULL,NULL,'initDB',49,50),(115,89,NULL,NULL,'Home',52,57),(116,115,NULL,NULL,'index',53,54),(117,115,NULL,NULL,'adminhome',55,56),(118,89,NULL,NULL,'Offers',58,69),(119,118,NULL,NULL,'index',59,60),(120,118,NULL,NULL,'view',61,62),(121,118,NULL,NULL,'add',63,64),(122,118,NULL,NULL,'edit',65,66),(123,118,NULL,NULL,'delete',67,68),(124,89,NULL,NULL,'Pages',70,73),(125,124,NULL,NULL,'display',71,72),(126,89,NULL,NULL,'Photos',74,87),(127,126,NULL,NULL,'index',75,76),(128,126,NULL,NULL,'view',77,78),(129,126,NULL,NULL,'add',79,80),(130,126,NULL,NULL,'create',81,82),(131,126,NULL,NULL,'edit',83,84),(132,126,NULL,NULL,'delete',85,86),(133,89,NULL,NULL,'Properties',88,117),(134,133,NULL,NULL,'saleprices',89,90),(135,133,NULL,NULL,'letprices',91,92),(136,133,NULL,NULL,'buildquery',93,94),(137,133,NULL,NULL,'featureds',95,96),(138,133,NULL,NULL,'tolet',97,98),(139,133,NULL,NULL,'forsell',99,100),(140,133,NULL,NULL,'index',101,102),(141,133,NULL,NULL,'lists',103,104),(142,133,NULL,NULL,'view',105,106),(143,133,NULL,NULL,'add',107,108),(144,133,NULL,NULL,'edit',109,110),(145,133,NULL,NULL,'manage',111,112),(146,133,NULL,NULL,'update_description',113,114),(147,133,NULL,NULL,'delete',115,116),(148,89,NULL,NULL,'Requestdetails',118,127),(149,148,NULL,NULL,'view',119,120),(150,148,NULL,NULL,'add',121,122),(151,148,NULL,NULL,'edit',123,124),(152,148,NULL,NULL,'delete',125,126),(153,89,NULL,NULL,'Requests',128,141),(154,153,NULL,NULL,'index',129,130),(155,153,NULL,NULL,'view',131,132),(156,153,NULL,NULL,'applyStatus',133,134),(157,153,NULL,NULL,'add',135,136),(158,153,NULL,NULL,'edit',137,138),(159,153,NULL,NULL,'delete',139,140),(160,89,NULL,NULL,'Users',142,159),(161,160,NULL,NULL,'index',143,144),(162,160,NULL,NULL,'view',145,146),(163,160,NULL,NULL,'add',147,148),(164,160,NULL,NULL,'edit',149,150),(165,160,NULL,NULL,'delete',151,152),(166,160,NULL,NULL,'login',153,154),(167,160,NULL,NULL,'logout',155,156),(168,160,NULL,NULL,'initDB',157,158),(169,89,NULL,NULL,'Viewings',160,171),(170,169,NULL,NULL,'index',161,162),(171,169,NULL,NULL,'view',163,164),(172,169,NULL,NULL,'add',165,166),(173,169,NULL,NULL,'edit',167,168),(174,169,NULL,NULL,'delete',169,170),(175,89,NULL,NULL,'AclExtras',172,173);
/*!40000 ALTER TABLE `acos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `groups`
--

DROP TABLE IF EXISTS `groups`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `groups` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `groups`
--

LOCK TABLES `groups` WRITE;
/*!40000 ALTER TABLE `groups` DISABLE KEYS */;
INSERT INTO `groups` VALUES (4,'admin','2014-03-06 19:28:54','2014-03-06 19:28:54');
/*!40000 ALTER TABLE `groups` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `password` char(40) NOT NULL,
  `group_id` int(11) NOT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (4,'admin','b682ff05a69e817a747c86fea8626124e6c6277a',4,'2014-03-06 19:29:28','2014-03-06 19:29:28');
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

-- Dump completed on 2014-03-31 18:53:15
