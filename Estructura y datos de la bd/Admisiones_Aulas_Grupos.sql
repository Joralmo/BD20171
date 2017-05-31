-- MySQL dump 10.13  Distrib 5.7.18, for Linux (x86_64)
--
-- Host: localhost    Database: Admisiones
-- ------------------------------------------------------
-- Server version	5.7.18-0ubuntu0.16.04.1

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
-- Table structure for table `Aulas_Grupos`
--

DROP TABLE IF EXISTS `Aulas_Grupos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Aulas_Grupos` (
  `AulasidAula` int(10) NOT NULL,
  `GruposidGrupos` int(10) NOT NULL,
  `horaInicio` time NOT NULL,
  `horaFin` time NOT NULL,
  `Dias` int(10) NOT NULL,
  PRIMARY KEY (`AulasidAula`,`GruposidGrupos`),
  KEY `FKAulas_Grup87530` (`AulasidAula`),
  KEY `FKAulas_Grup561618` (`GruposidGrupos`),
  CONSTRAINT `FKAulas_Grup561618` FOREIGN KEY (`GruposidGrupos`) REFERENCES `Grupos` (`idGrupos`),
  CONSTRAINT `FKAulas_Grup87530` FOREIGN KEY (`AulasidAula`) REFERENCES `Aulas` (`idAula`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Aulas_Grupos`
--

LOCK TABLES `Aulas_Grupos` WRITE;
/*!40000 ALTER TABLE `Aulas_Grupos` DISABLE KEYS */;
INSERT INTO `Aulas_Grupos` VALUES (1,1,'08:00:00','10:00:00',1),(2,2,'12:00:00','16:00:00',3);
/*!40000 ALTER TABLE `Aulas_Grupos` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2017-05-31  3:22:11
