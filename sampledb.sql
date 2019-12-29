-- MySQL dump 10.13  Distrib 5.7.28, for Linux (x86_64)
--
-- Host: 192.168.0.174    Database: easyquiz
-- ------------------------------------------------------
-- Server version	5.7.28-0ubuntu0.18.04.4

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
-- Table structure for table `participants`
--

DROP TABLE IF EXISTS `participants`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `participants` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) NOT NULL,
  `last_name` varchar(45) NOT NULL,
  `nick` varchar(45) NOT NULL,
  `mail` varchar(45) NOT NULL,
  `timestamp` varchar(45) DEFAULT NULL,
  `score` varchar(45) DEFAULT NULL,
  `time60` varchar(45) DEFAULT NULL,
  `qid` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id_UNIQUE` (`id`),
  UNIQUE KEY `mail_UNIQUE` (`mail`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `participants`
--

LOCK TABLES `participants` WRITE;
/*!40000 ALTER TABLE `participants` DISABLE KEYS */;
INSERT INTO `participants` VALUES (1,'j','a','ja','j@j.com','1571959429',NULL,'1571959789',NULL),(2,'j2','a2','sarasa','j2@j.com',NULL,NULL,NULL,NULL),(3,'j3','a3','j3','j3@j.com',NULL,NULL,NULL,NULL),(4,'j3','a3','j3','j4@j.com',NULL,NULL,NULL,NULL),(5,'j4','a4','j4','j5@j.com',NULL,NULL,NULL,NULL),(6,'a','a','a','j6@j.com',NULL,NULL,NULL,NULL),(7,'j7','a','a','j7@j.com','1571962940',NULL,'1571963300',NULL),(8,'a','a','a','j8@j.com','1571963710',NULL,'1571963770',NULL),(9,'Jorge','A','Jorge1987','j9@j.com','1571964427',NULL,'1571964487',NULL),(10,'j','a','j10','j10@j.com','1572481783',NULL,'1572481843',NULL),(11,'j','j','j11','j11@j.com','1572482938','45','1572482998',NULL),(12,'j12','q','j12','j12@j.com','1572710490','40','1572710550',10),(13,'j13','a','j13','j13@j.com','1572710960','15','1572711020',12),(14,'j14','a','j14','j14@j.com','1572711088','65','1572711148',8),(15,'j15','a','j15','j15@j.com','1572746376','30','1572746436',11),(16,'j','j','j16','j16@j.com','1572746510','55','1572746570',1),(17,'j','j','j17','j17@j.com','1572746728','10','1572746788',3),(18,'j','j','j18','j18@j.com','1572746821','20','1572746881',4),(19,'j','j','j19','j19@j.com','1572746975','15','1572747035',12),(20,'j20','j','j20','j20@j.com','1572747081','15','1572747141',4);
/*!40000 ALTER TABLE `participants` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `quizes`
--

DROP TABLE IF EXISTS `quizes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `quizes` (
  `idquizes` int(11) NOT NULL AUTO_INCREMENT,
  `question` varchar(255) NOT NULL,
  `answer` varchar(100) NOT NULL,
  PRIMARY KEY (`idquizes`),
  UNIQUE KEY `idquizes_UNIQUE` (`idquizes`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `quizes`
--

LOCK TABLES `quizes` WRITE;
/*!40000 ALTER TABLE `quizes` DISABLE KEYS */;
INSERT INTO `quizes` VALUES (1,'Cual es el nombre del sexto planeta del sistema solar?','Saturno'),(2,'Cual es el planeta mas grande en tamaño y masa en el Sistema Solar?','Júpiter'),(3,'Quien fue el primero en observar los anillos de Saturno?','Galileo'),(4,'Quien fue el primero en observar con claridad los anillos de Saturno?','Huygens'),(5,'Quien demostró matimaticamente que los anillos de Saturno no podian ser un objeto unico y sólido?','Maxwell'),(6,'Saturno era el equivalente a qué antiguo titán griego?','Crono'),(7,'Es probable que las nubes superiores de Saturno estén formadas por cristales de?','Amoníaco'),(8,'Qué telescopio espacial descubre en 2009 un nuevo enorme anillo alrededor de Saturno?','Spitzer'),(9,'Por quien son descubiertas las lunas Mimas y Encélado de Saturno?','Herschel'),(10,'Que sonda sobrevoló Saturno en 1979?','Pioneer 11'),(11,'Qué sonda se acerca a Saturno en 1982?','Voyager 2'),(12,'Cual es el nombre del satélite más grande de Saturno?','Titán');
/*!40000 ALTER TABLE `quizes` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2019-12-28 22:11:48
