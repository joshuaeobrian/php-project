CREATE DATABASE  IF NOT EXISTS `etailinsights` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `etailinsights`;
-- MySQL dump 10.13  Distrib 5.7.9, for Win64 (x86_64)
--
-- Host: localhost    Database: etailinsights
--   ------------------------------------------------------
-- Server version	5.7.9-log

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
-- Table structure for table `geo_ip`
--

DROP TABLE IF EXISTS `geo_ip`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `geo_ip` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ip` varchar(45) DEFAULT NULL,
  `country_code` varchar(100) DEFAULT NULL,
  `country_name` varchar(45) DEFAULT NULL,
  `region_code` varchar(45) DEFAULT NULL,
  `region_name` varchar(45) DEFAULT NULL,
  `city` varchar(45) DEFAULT NULL,
  `zip_code` varchar(45) DEFAULT NULL,
  `time_zone` varchar(45) DEFAULT NULL,
  `latitude` varchar(45) DEFAULT NULL,
  `longitude` varchar(45) DEFAULT NULL,
  `metro_code` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `geo_ip`
--

LOCK TABLES `geo_ip` WRITE;
/*!40000 ALTER TABLE `geo_ip` DISABLE KEYS */;
INSERT INTO `geo_ip` VALUES (1,'222.221.244.138','ZI','Zimbabwe',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(2,'116.236.227.50','US','United States','NY','New York',NULL,NULL,NULL,NULL,NULL,NULL),(3,'123.125.66.*','US','United States','NC','North Carolina',NULL,NULL,NULL,NULL,NULL,NULL),(4,'58.248.98.185','Uk','unknown',NULL,'unknown',NULL,NULL,NULL,NULL,NULL,NULL),(5,'92.83.167.207','FR','France',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(6,'124.*.*.*','DE','Germany','DE-BW','Baden-Württemberg',NULL,NULL,NULL,NULL,NULL,NULL);
/*!40000 ALTER TABLE `geo_ip` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2017-06-05  3:48:24
