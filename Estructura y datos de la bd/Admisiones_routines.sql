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
-- Dumping routines for database 'Admisiones'
--
/*!50003 DROP PROCEDURE IF EXISTS `actualizar` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `actualizar`(in nombre varchar(45), in apellido varchar(45),
in estrato int(1), in docummento varchar(25), in celular varchar(25),
in fechaN date, in email varchar(255), in edad varchar(3), in sexo varchar(1),
in direccion varchar(255), in colegio varchar(255),in telefono varchar(15),
in ciudadR varchar(255),in ciudadO varchar(255), in codigo varchar(25))
BEGIN
	UPDATE `Admisiones`.`Persona` SET `Nombre`=nombre,
    `Apellido`=apellido, `Estrato`=estrato, `Documento`=documento,
    `Celular`=celular, `FechaNacimiento`=fechaN,
    `Email`=email, `Edad`=edad, `Sexo`=sexo,
    `Direccion`=direccion, `Colegio`=colegio,
    `Telefono`=telefono, `CiudadOrigen`=ciudadO, `CiudadResidencia`=ciudadR
    WHERE `idPersona`=codigo;
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `buscar` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `buscar`(in codigo int(10))
BEGIN
	IF EXISTS(select 1 from Persona where Persona.idPersona=codigo) THEN
		SELECT Persona.idPersona as codigo, Persona.Nombre as nombre,
		Persona.Apellido as apellido, Persona.Estrato as estrato,
		Persona.Documento as documento, Persona.Celular as celular,
		Persona.FechaNacimiento as fechaNac, Persona.Edad as edad,
		Persona.Email as email, Persona.Sexo as sexo, Persona.Direccion as dir, Persona.Colegio as colegio,
		Persona.Telefono as tel, Persona.Contraseña as pass,
		Persona.CiudadOrigen as ciudadOA, Persona.CiudadResidencia as ciudadRA FROM Admisiones.Persona 
		inner join Roles on Persona.Roles_idRoles=Roles.idRoles
		where Persona.idPersona=codigo and Persona.Roles_idRoles="2";
	end if;
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `eliminarEstudiante` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `eliminarEstudiante`(in codigo int(20))
BEGIN
	DELETE FROM `Admisiones`.`Semestres` WHERE `EstudiantesidEstudiante`=codigo;
	DELETE FROM `Admisiones`.`Persona` WHERE `idPersona`=codigo;
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `login` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `login`(in codigo varchar(10), in pass varchar(255))
BEGIN
	SELECT Persona.idPersona as codigo, Persona.Nombre as nombre,
	Persona.Apellido as apellido, Persona.Estrato as estrato,
	Persona.Documento as documento, Persona.Celular as celular,
	Persona.FechaNacimiento as fechaNac, Persona.Edad as edad,
    Persona.Email as email, Persona.Sexo as sexo, Persona.Direccion as dir, Persona.Colegio as colegio,
	Persona.Telefono as tel, Persona.Imagen as imagen, Persona.Contraseña as pass, 
    Persona.CiudadOrigen as ciudadO, Persona.CiudadResidencia as ciudadR,
	Roles.descripcion as rol FROM Admisiones.Persona 
	inner join Roles on Persona.Roles_idRoles=Roles.idRoles
	where Persona.idPersona=codigo and Persona.Contraseña=pass;
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `nuevoEstudiante` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `nuevoEstudiante`(in codigo int(10), in nombre varchar(255),
in apellido varchar(255), in estrato int(1), in documento varchar(255),
in celular varchar(255), in fechaN date, in email varchar(255),
in edad int(10), in sexo varchar(1), in direccion varchar(255),
in colegio varchar(255), in telefono varchar(255), in imagen varchar(255),
in contraseña varchar(255), in ciudadO varchar(45), in ciudadR varchar(45),
in rol int(10))
BEGIN
	IF NOT EXISTS (SELECT 1 FROM `Admisiones`.`Persona` WHERE `Persona`.`idPersona` = codigo) THEN
		INSERT INTO `Admisiones`.`Persona` (`idPersona`, `Nombre`, 
		`Apellido`, `Estrato`, `Documento`, `Celular`, `FechaNacimiento`, 
		`Email`, `Edad`, `Sexo`, `Direccion`, `Colegio`, `Telefono`, `Imagen`, 
		`Contraseña`, `Roles_idRoles`, `ciudadOrigen`, `ciudadResidencia`) 
		VALUES (codigo, nombre, apellido, estrato, documento,
		celular, fechaN, email, edad, sexo, direccion, colegio,
		telefono, imagen, contraseña, rol, ciudadO, ciudadR);
	ELSE
    SELECT 0 AS ECHO;
    END IF;
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `verTodos` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `verTodos`()
BEGIN
	SELECT idPersona as codigo, Persona.Nombre as nombre, Apellido as apellido, Carreras.Nombre as carrera
	FROM Admisiones.Semestres
	inner join Persona on EstudiantesidEstudiante = Persona.idPersona
	inner join Carreras on CarrerasidCarrera = Carreras.idCarrera;
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2017-05-27 11:51:23
