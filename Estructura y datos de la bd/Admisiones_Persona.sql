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
-- Table structure for table `Persona`
--

DROP TABLE IF EXISTS `Persona`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Persona` (
  `idPersona` int(10) NOT NULL AUTO_INCREMENT,
  `Nombre` varchar(255) NOT NULL,
  `Apellido` varchar(255) NOT NULL,
  `Estrato` int(1) NOT NULL,
  `Documento` varchar(255) NOT NULL,
  `Celular` varchar(20) NOT NULL,
  `FechaNacimiento` date NOT NULL,
  `Email` varchar(255) NOT NULL,
  `Edad` int(10) NOT NULL,
  `Sexo` varchar(1) NOT NULL,
  `Direccion` varchar(255) NOT NULL,
  `Colegio` varchar(255) DEFAULT NULL,
  `Telefono` varchar(255) NOT NULL,
  `Imagen` varchar(255) NOT NULL,
  `Contraseña` varchar(255) NOT NULL,
  `Roles_idRoles` int(11) NOT NULL,
  `CiudadOrigen` varchar(45) NOT NULL,
  `CiudadResidencia` varchar(45) NOT NULL,
  PRIMARY KEY (`idPersona`),
  UNIQUE KEY `Documento` (`Documento`),
  UNIQUE KEY `idEstudiante_UNIQUE` (`idPersona`),
  KEY `fk_Estudiantes_Roles1_idx` (`Roles_idRoles`),
  CONSTRAINT `fk_Roles` FOREIGN KEY (`Roles_idRoles`) REFERENCES `Roles` (`idRoles`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=2014214010 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Persona`
--

LOCK TABLES `Persona` WRITE;
/*!40000 ALTER TABLE `Persona` DISABLE KEYS */;
INSERT INTO `Persona` VALUES (967264,'Nombre','Apellido Nuevo',1,'963627','3000','1997-05-27','correo@correo.com',28,'M','Por aca','San juan del cordoba','41023','admin/estudiante/imagenes/967264.jpg','1d72310edc006dadf2190caad5802983',2,'Barranquilla','CiÃ©naga'),(2849032,'Srcode','Plantilla',1,'123','1','2017-12-31','asd@asd',21,'M','Alla','San juan','3245','admin/estudiante/imagenes/2849032.jpg','e10adc3949ba59abbe56e057f20f883e',2,'Santander','CÃºcuta'),(2014214000,'Jose Rafael','Altamar Molina',1,'1221967520','3002892012','1995-12-07','JoralmoPro@Gmail.com',21,'M','Mzna 33 casa 18 el parque','San juan del cordoba','4102100','admin/estudiante/imagenes/2014214004.jpg','e10adc3949ba59abbe56e057f20f883e',2,'Cienaga','Santa Marta'),(2014214004,'Jose Rafael','Altamar Molina',1,'1221967524','3002892012','1995-12-07','JoralmoPro@Gmail.com',21,'M','Mzna 33 casa 18 el parque','San juan del cordoba','4102100','admin/estudiante/imagenes/2014214004.jpg','e10adc3949ba59abbe56e057f20f883e',1,'Cienaga','Santa Marta'),(2014214005,'Jose Rafael','Altamar Molina',1,'1221967525','3002892012','1995-12-07','JoralmoPro@Gmail.com',21,'S','Mzna 33 casa 18 el parque','San juan del cordoba','4102100','admin/estudiante/imagenes/2014214004.jpg','e10adc3949ba59abbe56e057f20f883e',2,'Cienaga','Santa Marta'),(2014214006,'Jose Rafael','Altamar Molina',1,'1221967526','3002892012','1995-12-07','JoralmoPro@Gmail.com',21,'M','Mzna 33 casa 18 el parque','San juan del cordoba','4102100','admin/estudiante/imagenes/2014214004.jpg','e10adc3949ba59abbe56e057f20f883e',2,'Cienaga','Santa Marta'),(2014214007,'Jose Rafael','Altamar Molina',1,'1221967527','3002892012','1995-12-07','JoralmoPro@Gmail.com',21,'M','Mzna 33 casa 18 el parque','San juan del cordoba','4102100','admin/estudiante/imagenes/2014214004.jpg','e10adc3949ba59abbe56e057f20f883e',2,'Cienaga','Santa Marta'),(2014214008,'Jose Rafael','Altamar Molina',1,'1221967528','3002892012','1995-12-07','JoralmoPro@Gmail.com',21,'M','Mzna 33 casa 18 el parque','San juan del cordoba','4102100','admin/estudiante/imagenes/2014214004.jpg','e10adc3949ba59abbe56e057f20f883e',2,'Cienaga','Santa Marta'),(2014214009,'Jose Rafael','Altamar Molina',1,'1221967529','3002892012','1995-12-07','JoralmoPro@Gmail.com',21,'M','Mzna 33 casa 18 el parque','San juan del cordoba','4102100','admin/estudiante/imagenes/2014214004.jpg','e10adc3949ba59abbe56e057f20f883e',2,'Cienaga','Santa Marta');
/*!40000 ALTER TABLE `Persona` ENABLE KEYS */;
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
