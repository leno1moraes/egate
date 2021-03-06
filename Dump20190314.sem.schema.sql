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
-- Table structure for table `tb_action`
--

DROP TABLE IF EXISTS `tb_action`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tb_action` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `desname` varchar(45) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_action`
--

LOCK TABLES `tb_action` WRITE;
/*!40000 ALTER TABLE `tb_action` DISABLE KEYS */;
INSERT INTO `tb_action` VALUES (1,'ENTRAR'),(3,'SAIR'),(4,'BLOQUEAR');
/*!40000 ALTER TABLE `tb_action` ENABLE KEYS */;
UNLOCK TABLES;

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
-- Table structure for table `tb_gate`
--

DROP TABLE IF EXISTS `tb_gate`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tb_gate` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `descode` varchar(45) NOT NULL,
  `iaction` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_action_gate` (`iaction`),
  CONSTRAINT `fk_action_gate` FOREIGN KEY (`iaction`) REFERENCES `tb_action` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_gate`
--

LOCK TABLES `tb_gate` WRITE;
/*!40000 ALTER TABLE `tb_gate` DISABLE KEYS */;
INSERT INTO `tb_gate` VALUES (1,'FR69TGA55',1),(2,'YU70YHS60',3);
/*!40000 ALTER TABLE `tb_gate` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tb_registrygate`
--

DROP TABLE IF EXISTS `tb_registrygate`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tb_registrygate` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `student` int(11) NOT NULL,
  `data` datetime NOT NULL,
  `iaction` int(11) NOT NULL,
  `gate` int(11) NOT NULL,
  `desmessage` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_student` (`student`),
  KEY `fk_action` (`iaction`),
  KEY `fk_gate` (`gate`),
  CONSTRAINT `fk_action` FOREIGN KEY (`iaction`) REFERENCES `tb_action` (`id`),
  CONSTRAINT `fk_gate` FOREIGN KEY (`gate`) REFERENCES `tb_gate` (`id`),
  CONSTRAINT `fk_student` FOREIGN KEY (`student`) REFERENCES `tb_student` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=91 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_registrygate`
--

LOCK TABLES `tb_registrygate` WRITE;
/*!40000 ALTER TABLE `tb_registrygate` DISABLE KEYS */;
INSERT INTO `tb_registrygate` VALUES (1,1,'2019-03-14 17:28:11',1,1,'LIBERAR_ENTRADA'),(58,1,'2019-04-24 09:04:16',3,1,'SAINDO/Nivalda Lemos'),(59,4,'2019-04-24 09:11:12',1,1,'ENTRANDO/Roberto Campus 3'),(60,4,'2019-04-24 09:12:39',3,1,'SAINDO/Roberto Campus 3'),(61,4,'2019-04-24 09:16:50',1,1,'ENTRANDO/Roberto Campus 3'),(62,1,'2019-04-24 09:36:04',1,1,'ENTRANDO/Nivalda Lemos'),(63,1,'2019-04-24 09:48:03',3,1,'SAINDO/Nivalda Lemos'),(64,1,'2019-04-24 09:48:15',1,1,'ENTRANDO/Nivalda Lemos'),(65,4,'2019-04-24 09:50:16',3,1,'SAINDO/Roberto Campus 3'),(66,4,'2019-04-24 09:50:59',1,1,'ENTRANDO/Roberto Campus 3'),(67,1,'2019-04-24 09:51:12',3,1,'SAINDO/Nivalda Lemos'),(68,1,'2019-04-24 09:51:38',1,1,'ENTRANDO/Nivalda Lemos'),(69,1,'2019-04-24 09:52:45',3,1,'SAINDO/Nivalda Lemos'),(70,4,'2019-04-24 09:52:56',3,1,'SAINDO/Roberto Campus 3'),(71,4,'2019-04-24 09:53:06',1,1,'ENTRANDO/Roberto Campus 3'),(72,1,'2019-04-24 09:53:21',1,1,'ENTRANDO/Nivalda Lemos'),(75,1,'2019-04-24 10:09:22',3,1,'SAINDO/Nivalda Lemos'),(76,1,'2019-04-24 10:15:12',1,1,'ENTRANDO/Nivalda Lemos'),(77,4,'2019-04-24 10:38:26',3,1,'SAINDO/Roberto Campus 3'),(78,4,'2019-04-24 10:38:37',1,1,'ENTRANDO/Roberto Campus 3'),(79,1,'2019-04-24 10:38:45',3,1,'SAINDO/Nivalda Lemos'),(80,4,'2019-04-24 10:39:12',3,1,'SAINDO/Roberto Campus 3'),(81,1,'2019-04-24 10:39:29',1,1,'ENTRANDO/Nivalda Lemos'),(82,1,'2019-04-24 10:39:59',3,1,'SAINDO/Nivalda Lemos'),(83,1,'2019-04-24 10:40:15',1,1,'ENTRANDO/Nivalda Lemos'),(84,4,'2019-04-24 10:42:54',1,1,'ENTRANDO/Roberto Campus 3'),(85,1,'2019-04-24 10:44:16',3,1,'SAINDO/Nivalda Lemos'),(86,1,'2019-04-24 11:07:37',1,1,'ENTRANDO/Nivalda Lemos'),(87,4,'2019-04-24 11:12:35',3,1,'SAINDO/Roberto Campus 3'),(88,4,'2019-04-24 11:32:25',1,1,'ENTRANDO/Roberto Campus 3'),(89,3,'2019-04-24 11:54:29',1,1,'ENTRANDO/Angelica Maria'),(90,3,'2019-04-24 11:54:38',3,1,'SAINDO/Angelica Maria');
/*!40000 ALTER TABLE `tb_registrygate` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tb_regtickets`
--

DROP TABLE IF EXISTS `tb_regtickets`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tb_regtickets` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ticket` varchar(45) NOT NULL,
  `flag` int(11) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_regtickets`
--

LOCK TABLES `tb_regtickets` WRITE;
/*!40000 ALTER TABLE `tb_regtickets` DISABLE KEYS */;
INSERT INTO `tb_regtickets` VALUES (9,'e2f9ed39',1),(10,'811f5adc',1),(18,'316218dc',1);
/*!40000 ALTER TABLE `tb_regtickets` ENABLE KEYS */;
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
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_student`
--

LOCK TABLES `tb_student` WRITE;
/*!40000 ALTER TABLE `tb_student` DISABLE KEYS */;
INSERT INTO `tb_student` VALUES (1,'Nivalda Lemos','201913032222','03670726101','e2f9ed39','6599986763','leno.moraes@lrv.ifmt.edu.br',2,1,1),(3,'Angelica Maria','201913033444','03670726101','316218dc','6599986763','roberto@gmail.com',1,1,0),(4,'Roberto Campus 3','201913033333','03670726101','811f5adc','6599986763','roberto@gmail.com',2,1,1);
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
INSERT INTO `tb_user` VALUES (2,'leno',1,'2019-03-12 00:00:00','Leno Grazianny',1,'lenomoraes12@gmail.com','123'),(8,'admin',1,'2019-03-13 03:01:44','Administrador 3',1,'adm@gmail.com','admin');
/*!40000 ALTER TABLE `tb_user` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_messages`
--

DROP TABLE IF EXISTS `tbl_messages`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_messages` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `clientID` varchar(45) DEFAULT NULL,
  `topic` varchar(45) DEFAULT NULL,
  `message` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=320 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_messages`
--

LOCK TABLES `tbl_messages` WRITE;
/*!40000 ALTER TABLE `tbl_messages` DISABLE KEYS */;
INSERT INTO `tbl_messages` VALUES (1,'ID1','enviarTicket','teste'),(318,'client002','acessoEntrada','e2f9ed39'),(319,'client002','retornoEntrada','ENTRANDO/Leno');
/*!40000 ALTER TABLE `tbl_messages` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping events for database 'egatedatabase'
--

--
-- Dumping routines for database 'egatedatabase'
--
/*!50003 DROP PROCEDURE IF EXISTS `sp_insertticket_save` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_insertticket_save`(
	pdesname varchar(45)
)
BEGIN
	DECLARE RET_ID INT;    
    
    IF NOT EXISTS (select id from tb_regtickets where ticket = pdesname) THEN    
		INSERT INTO tb_regtickets (ticket)
		VALUES (pdesname);    
    END IF;	    
        
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `sp_registrygate_save` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_registrygate_save`(
pidgate VARCHAR(45),
pidticket VARCHAR(45)
)
BEGIN
    DECLARE RET_INT INT;
    DECLARE ANSWER VARCHAR(45);
    DECLARE IDSTUDENT INT;
    DECLARE IDGATE INT;
    DECLARE ASTATUS INT;
    DECLARE FUNCTIONGATE VARCHAR(45);
    DECLARE ACCESS INT;
    
	/*VERIFICAR SE O TICKET ESTÁ VINCULADO A UM ESTUDANTE*/
    IF EXISTS (SELECT id FROM tb_student WHERE desid2 = pidticket) THEN
		SET RET_INT = 1;        
    ELSE
		SET RET_INT = 0;        
    END IF;	
    
    IF (RET_INT = 0) THEN
		SET ANSWER = 'BLOQUEADO';
        
	ELSE
		
        SET IDSTUDENT = (SELECT id FROM tb_student WHERE desid2 = pidticket);
        /*SET IDGATE = (SELECT id FROM tb_gate WHERE descode = pidgate);
		SET FUNCTIONGATE = (SELECT iaction FROM tb_gate WHERE id = IDGATE);*/
        SET ACCESS = (SELECT desstatus FROM tb_student WHERE id = IDSTUDENT);
        
		SET ASTATUS = ( SELECT c.iaction 
						FROM tb_registrygate c
						WHERE c.id = (SELECT MAX(a.id)
									  FROM tb_registrygate a 
									  INNER JOIN tb_action b ON a.iaction = b.id
									  WHERE a.student = IDSTUDENT ));        
        /*
        1 - ENTRAR
        3 - SAIR
        */	
        
        
        IF (ASTATUS = 3) THEN 
            
            IF (ACCESS = 1) THEN
				SET ANSWER = 'ENTRANDO';
                
				INSERT INTO tb_registrygate (student, data, iaction, gate, desmessage)
				VALUES (IDSTUDENT, NOW(), 1, 1, ANSWER);                
                
            ELSE
				SET ANSWER = 'BLOQUEADO';
                
				/*INSERT INTO tb_registrygate (student, data, iaction, gate, desmessage)
				VALUES (IDSTUDENT, NOW(), FUNCTIONGATE, 1, ANSWER);*/  
                
            END IF;
            
        ELSEIF (ASTATUS = 1) THEN 
            
            SET ANSWER = 'SAINDO';
            
			INSERT INTO tb_registrygate (student, data, iaction, gate, desmessage)
			VALUES (IDSTUDENT, NOW(), 3, 1, ANSWER);  
                
        ELSE
			SET ANSWER = 'BLOQUEADO';
            
			/*INSERT INTO tb_registrygate (student, data, iaction, gate, desmessage)
			VALUES (IDSTUDENT, NOW(), FUNCTIONGATE, IDGATE, ANSWER);*/              
            
        END IF;
        
    END IF;
    
    SELECT ANSWER AS ANSWER;
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `sp_registrygate_save2` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_registrygate_save2`(
pidticket VARCHAR(45)
)
BEGIN
	DECLARE answer VARCHAR(45);
    DECLARE ID_ESTUDANTE INT;
	DECLARE STATUS_ENTRADA_SAIDA INT;
    DECLARE NAME_ESTUDANTE VARCHAR(45);
    
    IF EXISTS (SELECT id FROM tb_student WHERE desid2 = pidticket) THEN
    
		SET ID_ESTUDANTE = (SELECT id FROM tb_student WHERE desid2 = pidticket);
        SET NAME_ESTUDANTE = (SELECT desname FROM tb_student WHERE id = ID_ESTUDANTE);
        SET STATUS_ENTRADA_SAIDA = ( SELECT c.iaction 
									FROM tb_registrygate c
									WHERE c.id = (SELECT MAX(a.id)
												  FROM tb_registrygate a 
												  INNER JOIN tb_action b ON a.iaction = b.id
												  WHERE a.student = ID_ESTUDANTE ));        
        /*
        1 - ENTROU
        3 - SAIU
        */ 
        
        
        
        IF (STATUS_ENTRADA_SAIDA = 1) THEN
			
            SET answer = (SELECT CONCAT('SAINDO', '/', NAME_ESTUDANTE));
            
			INSERT INTO tb_registrygate (student, data, iaction, gate, desmessage)
			VALUES (ID_ESTUDANTE, NOW(), 3, 1, answer);               
        
        ELSEIF (STATUS_ENTRADA_SAIDA = 3) THEN
			
			SET answer = (SELECT CONCAT('ENTRANDO', '/', NAME_ESTUDANTE));
             
			INSERT INTO tb_registrygate (student, data, iaction, gate, desmessage)
			VALUES (ID_ESTUDANTE, NOW(), 1, 1, answer);            
            
		ELSE
        
			SET answer = (SELECT CONCAT('ENTRANDO', '/', NAME_ESTUDANTE));
             
			INSERT INTO tb_registrygate (student, data, iaction, gate, desmessage)
			VALUES (ID_ESTUDANTE, NOW(), 1, 1, answer);   
            
        END IF;        
        
    ELSE
		
        SET answer = "ACESSONEGADO/Nao_Vinculado";
        
		/*INSERT INTO tb_registrygate (student, data, iaction, gate, desmessage)
		VALUES (0, NOW(), 0, 0, answer);        */
		        
    END IF;
    
    SELECT answer AS answer;
    
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
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
    
    UPDATE tb_regtickets SET flag = 1 WHERE ticket = pdesid2;
    
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
/*!50003 DROP PROCEDURE IF EXISTS `teste_aquivo_php` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `teste_aquivo_php`()
BEGIN

 DECLARE cmd CHAR(255);
 DECLARE result CHAR(255);
 SET cmd = CONCAT('C:/xampp/php/php.exe -f "C:/egate/emailteste.php" ');
 SET result = sys_eval(cmd);

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

-- Dump completed on 2019-04-24 12:03:52
