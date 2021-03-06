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
-- Table structure for table `Semestres`
--

DROP TABLE IF EXISTS `Semestres`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Semestres` (
  `idSemestre` int(10) NOT NULL AUTO_INCREMENT,
  `Numero` int(2) NOT NULL,
  `CarrerasidCarrera` int(10) NOT NULL,
  `EstudiantesidEstudiante` int(10) NOT NULL,
  PRIMARY KEY (`idSemestre`),
  KEY `FKSemestres285862` (`CarrerasidCarrera`),
  KEY `FKSemestres571512` (`EstudiantesidEstudiante`),
  CONSTRAINT `FKSemestres285862` FOREIGN KEY (`CarrerasidCarrera`) REFERENCES `Carreras` (`idCarrera`),
  CONSTRAINT `FKSemestres571512` FOREIGN KEY (`EstudiantesidEstudiante`) REFERENCES `Persona` (`idPersona`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Semestres`
--

LOCK TABLES `Semestres` WRITE;
/*!40000 ALTER TABLE `Semestres` DISABLE KEYS */;
INSERT INTO `Semestres` VALUES (1,1,1,2014214005),(2,1,2,2014214006),(3,1,3,2014214007),(4,1,1,2014214008),(5,1,2,2014214009),(6,1,3,2014214000);
/*!40000 ALTER TABLE `Semestres` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2017-05-31  3:22:10
