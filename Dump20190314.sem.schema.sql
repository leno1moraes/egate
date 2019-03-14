-- MySQL dump 10.16  Distrib 10.1.36-MariaDB, for Win32 (AMD64)
--
-- Host: 127.0.0.1    Database: egatedatabase
-- ------------------------------------------------------
-- Server version	10.1.36-MariaDB

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
-- Table structure for table `tb_class`
--

DROP TABLE IF EXISTS `tb_class`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tb_class` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `desname` varchar(45) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_class`
--

LOCK TABLES `tb_class` WRITE;
/*!40000 ALTER TABLE `tb_class` DISABLE KEYS */;
INSERT INTO `tb_class` VALUES (1,'1º A'),(2,'1º B'),(3,'2º A'),(4,'2º B'),(5,'3º A'),(6,'3º B');
/*!40000 ALTER TABLE `tb_class` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tb_student`
--

DROP TABLE IF EXISTS `tb_student`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tb_student` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `desname` varchar(45) NOT NULL,
  `desregistr` varchar(45) NOT NULL,
  `desid1` varchar(45) NOT NULL,
  `desid2` varchar(45) DEFAULT NULL,
  `desphonotice` varchar(45) NOT NULL,
  `desemailnotice` varchar(45) NOT NULL,
  `desperiodo` int(11) NOT NULL,
  `desstatus` int(11) NOT NULL,
  `dephoto` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_class_student` (`desperiodo`),
  CONSTRAINT `fk_class_student` FOREIGN KEY (`desperiodo`) REFERENCES `tb_class` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_student`
--

LOCK TABLES `tb_student` WRITE;
/*!40000 ALTER TABLE `tb_student` DISABLE KEYS */;
INSERT INTO `tb_student` VALUES (1,'Luana Glaucia','201913032222','03670726101',NULL,'6599986763','lenomoraes12@gmail.com',2,1,0);
/*!40000 ALTER TABLE `tb_student` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tb_teste`
--

DROP TABLE IF EXISTS `tb_teste`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tb_teste` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `destexto` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_teste`
--

LOCK TABLES `tb_teste` WRITE;
/*!40000 ALTER TABLE `tb_teste` DISABLE KEYS */;
INSERT INTO `tb_teste` VALUES (1,'Não aceito'),(2,'Não Criança'),(3,'liberdade');
/*!40000 ALTER TABLE `tb_teste` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tb_user`
--

DROP TABLE IF EXISTS `tb_user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tb_user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `deslogin` varchar(45) NOT NULL,
  `desstatus` int(11) NOT NULL,
  `dtcadastro` datetime NOT NULL,
  `desnome` varchar(45) NOT NULL,
  `desurl` int(11) DEFAULT NULL,
  `desemail` varchar(45) NOT NULL,
  `despassword` varchar(45) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_user`
--

LOCK TABLES `tb_user` WRITE;
/*!40000 ALTER TABLE `tb_user` DISABLE KEYS */;
INSERT INTO `tb_user` VALUES (2,'leno',1,'2019-03-12 00:00:00','Leno Grazianny',0,'lenomoraes12@gmail.com','123'),(8,'admin',1,'2019-03-13 03:01:44','Administrador 3',1,'adm@gmail.com','admin');
/*!40000 ALTER TABLE `tb_user` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping events for database 'egatedatabase'
--

--
-- Dumping routines for database 'egatedatabase'
--
/*!50003 DROP PROCEDURE IF EXISTS `sp_student_save` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_student_save`(
	pid int(11),
	pdesname varchar(45) ,
	pdesregistr varchar(45) ,
	pdesid1 varchar(45),
	pdesid2 varchar(45),
	pdesphonotice varchar(45),
	pdesemailnotice varchar(45),
	pdesperiodo int(11),
	pdesstatus int(11),
	pdephoto int(11)
)
BEGIN

	IF (pid > 0) THEN    
    
		UPDATE tb_student
		SET desname = pdesname,
			desregistr = pdesregistr,
			desid1 = pdesid1,
			desid2 = pdesid2,
			desphonotice = pdesphonotice,
			desemailnotice = pdesemailnotice,
			desperiodo = pdesperiodo,
			desstatus = pdesstatus,
			dephoto = pdephoto
		WHERE id = pid;
        
    ELSE    
		INSERT INTO tb_student
		(desname, desregistr, desid1, desid2, desphonotice, desemailnotice, desperiodo, desstatus, dephoto)
		VALUES (pdesname, pdesregistr, pdesid1, pdesid2, pdesphonotice, pdesemailnotice, pdesperiodo, pdesstatus, pdephoto);
        
		SET pid = LAST_INSERT_ID(); 
	
    END IF;
    
    SELECT * FROM tb_student WHERE id = pid;
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `sp_users_save` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_users_save`(
pid int(11),
pdeslogin varchar(45),
pdesstatus int(11), 
pdtcadastro datetime, 
pdesnome varchar(45), 
pdesurl int(11),
pdesemail varchar(45),
pdespassword varchar(45)
)
BEGIN
	
    IF (pid > 0 ) THEN 
		
		UPDATE tb_user
		SET deslogin = pdeslogin,
			desstatus = pdesstatus,
			desnome = pdesnome,
			desurl = pdesurl,
            desemail = pdesemail
		WHERE id = pid;
		
    ELSE 
		INSERT INTO tb_user (deslogin, desstatus, dtcadastro, desnome, desurl, desemail, despassword) 
		VALUES (pdeslogin, pdesstatus, pdtcadastro, pdesnome, pdesurl, pdesemail, pdespassword);
        
        SET pid = LAST_INSERT_ID();
    
    END IF;
    
    SELECT * FROM tb_user WHERE id = pid;
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

-- Dump completed on 2019-03-14  0:48:14
