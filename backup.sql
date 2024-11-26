-- MySQL dump 10.13  Distrib 5.5.27, for Win32 (x86)
--
-- Host: localhost    Database: tccdois
-- ------------------------------------------------------
-- Server version	5.5.27

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
-- Table structure for table `cidades`
--

DROP TABLE IF EXISTS `cidades`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cidades` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(100) NOT NULL,
  `estado_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `estado_id` (`estado_id`),
  CONSTRAINT `cidades_ibfk_1` FOREIGN KEY (`estado_id`) REFERENCES `estados` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cidades`
--

LOCK TABLES `cidades` WRITE;
/*!40000 ALTER TABLE `cidades` DISABLE KEYS */;
INSERT INTO `cidades` VALUES (1,'Acrelândia',1),(2,'Delmiro Gouveia',2),(3,'Santana',3),(4,'Itacoatiara',4),(5,'Feira de Santana',5),(6,'Sobral',6),(7,'Taguatinga',7),(8,'Cariacica',8),(9,'Aparecida de Goiânia',9),(10,'Imperatriz',10),(11,'Várzea Grande',11),(12,'Dourados',12),(13,'Contagem',13),(14,'Ananindeua',14),(15,'Campina Grande',15),(16,'Ponta Grossa',16),(17,'Olinda',17),(18,'Parnaíba',18),(19,'Duque de Caxias',19),(20,'Mossoró',20),(21,'Canoas',21),(22,'Jaru',22),(23,'Rorainópolis',23),(24,'São José',24),(25,'Guarulhos',25),(26,'Lagarto',26),(27,'Tocantinópolis',27),(28,'Cidade Teste',1);
/*!40000 ALTER TABLE `cidades` ENABLE KEYS */;
UNLOCK TABLES;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = cp850 */ ;
/*!50003 SET character_set_results = cp850 */ ;
/*!50003 SET collation_connection  = cp850_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = '' */ ;
DELIMITER ;;
/*!50003 CREATE*/ /*!50017 DEFINER=`root`@`localhost`*/ /*!50003 TRIGGER after_cidades_insert
AFTER INSERT ON cidades
FOR EACH ROW
BEGIN
    INSERT INTO historico (data, hora, tipo, tabela, registro_id, descricao)
    VALUES (CURDATE(), CURTIME(), 'Adi��o', 'cidades', NEW.id, CONCAT('Cidade adicionada: ', NEW.nome));
END */;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = cp850 */ ;
/*!50003 SET character_set_results = cp850 */ ;
/*!50003 SET collation_connection  = cp850_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = '' */ ;
DELIMITER ;;
/*!50003 CREATE*/ /*!50017 DEFINER=`root`@`localhost`*/ /*!50003 TRIGGER after_cidades_update
AFTER UPDATE ON cidades
FOR EACH ROW
BEGIN
    INSERT INTO historico (data, hora, tipo, tabela, registro_id, descricao)
    VALUES (CURDATE(), CURTIME(), 'Altera��o', 'cidades', NEW.id, CONCAT('Cidade alterada: ', NEW.nome));
END */;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = cp850 */ ;
/*!50003 SET character_set_results = cp850 */ ;
/*!50003 SET collation_connection  = cp850_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = '' */ ;
DELIMITER ;;
/*!50003 CREATE*/ /*!50017 DEFINER=`root`@`localhost`*/ /*!50003 TRIGGER after_cidades_delete
AFTER DELETE ON cidades
FOR EACH ROW
BEGIN
    INSERT INTO historico (data, hora, tipo, tabela, registro_id, descricao)
    VALUES (CURDATE(), CURTIME(), 'Dele��o', 'cidades', OLD.id, CONCAT('Cidade deletada: ', OLD.nome));
END */;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;

--
-- Table structure for table `clientes`
--

DROP TABLE IF EXISTS `clientes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `clientes` (
  `idCliente` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `telefone` varchar(15) DEFAULT NULL,
  `endereco` varchar(255) DEFAULT NULL,
  `cidade` varchar(100) DEFAULT NULL,
  `estado` varchar(50) DEFAULT NULL,
  `cep` varchar(10) DEFAULT NULL,
  `clinica_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`idCliente`),
  UNIQUE KEY `email` (`email`),
  KEY `clinica_id` (`clinica_id`),
  CONSTRAINT `clientes_ibfk_1` FOREIGN KEY (`clinica_id`) REFERENCES `clinicas` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=30 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `clientes`
--

LOCK TABLES `clientes` WRITE;
/*!40000 ALTER TABLE `clientes` DISABLE KEYS */;
INSERT INTO `clientes` VALUES (27,'Tutor','tutor@gmail.com','3131631671','tal tal tal ','1','1','1436155265',7),(28,'Eric','ebr876022@gmail.com','414118481','taltal tal ','1','1','1415151331',7),(29,'Teste novo tutor','testeeee@gmail.com','34567845678','qeqweqeqeqe','1','17','1244131241',7);
/*!40000 ALTER TABLE `clientes` ENABLE KEYS */;
UNLOCK TABLES;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = cp850 */ ;
/*!50003 SET character_set_results = cp850 */ ;
/*!50003 SET collation_connection  = cp850_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = '' */ ;
DELIMITER ;;
/*!50003 CREATE*/ /*!50017 DEFINER=`root`@`localhost`*/ /*!50003 TRIGGER after_clientes_insert
AFTER INSERT ON clientes
FOR EACH ROW
BEGIN
    INSERT INTO historico (data, hora, tipo, tabela, registro_id, descricao)
    VALUES (CURDATE(), CURTIME(), 'Adi��o', 'clientes', NEW.idCliente, CONCAT('Cliente adicionado: ', NEW.nome));
END */;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = cp850 */ ;
/*!50003 SET character_set_results = cp850 */ ;
/*!50003 SET collation_connection  = cp850_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = '' */ ;
DELIMITER ;;
/*!50003 CREATE*/ /*!50017 DEFINER=`root`@`localhost`*/ /*!50003 TRIGGER after_clientes_update
AFTER UPDATE ON clientes
FOR EACH ROW
BEGIN
    INSERT INTO historico (data, hora, tipo, tabela, registro_id, descricao)
    VALUES (CURDATE(), CURTIME(), 'Altera��o', 'clientes', NEW.idCliente, CONCAT('Cliente alterado: ', NEW.nome));
END */;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = cp850 */ ;
/*!50003 SET character_set_results = cp850 */ ;
/*!50003 SET collation_connection  = cp850_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = '' */ ;
DELIMITER ;;
/*!50003 CREATE*/ /*!50017 DEFINER=`root`@`localhost`*/ /*!50003 TRIGGER after_clientes_delete
AFTER DELETE ON clientes
FOR EACH ROW
BEGIN
    INSERT INTO historico (data, hora, tipo, tabela, registro_id, descricao)
    VALUES (CURDATE(), CURTIME(), 'Dele��o', 'clientes', OLD.idCliente, CONCAT('Cliente deletado: ', OLD.nome));
END */;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;

--
-- Table structure for table `clinicas`
--

DROP TABLE IF EXISTS `clinicas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `clinicas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(255) NOT NULL,
  `endereco` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `clinicas`
--

LOCK TABLES `clinicas` WRITE;
/*!40000 ALTER TABLE `clinicas` DISABLE KEYS */;
INSERT INTO `clinicas` VALUES (7,'VetEtec','tal tal tal');
/*!40000 ALTER TABLE `clinicas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `consultas_marcadas`
--

DROP TABLE IF EXISTS `consultas_marcadas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `consultas_marcadas` (
  `idConsulta` int(11) NOT NULL AUTO_INCREMENT,
  `nome_animal` varchar(100) NOT NULL,
  `raca` varchar(50) DEFAULT NULL,
  `proprietario` varchar(100) DEFAULT NULL,
  `data_consulta` date NOT NULL,
  `hora_consulta` time NOT NULL,
  `descricao` text,
  `status` varchar(20) DEFAULT NULL,
  `pet_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`idConsulta`),
  KEY `pet_id` (`pet_id`),
  CONSTRAINT `consultas_marcadas_ibfk_1` FOREIGN KEY (`pet_id`) REFERENCES `pets` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `consultas_marcadas`
--

LOCK TABLES `consultas_marcadas` WRITE;
/*!40000 ALTER TABLE `consultas_marcadas` DISABLE KEYS */;
INSERT INTO `consultas_marcadas` VALUES (1,'Victor','beta','1','2024-09-23','12:06:00','cancer','Agendada',NULL),(2,'Rex','Labrador','Tutor','2024-10-05','09:00:00','Consulta para avaliação geral.','Agendada',8),(3,'Mimi','Siamês','Tutor','2024-10-06','10:00:00','Consulta de rotina para vacina.','Agendada',9),(7,'Rex','Labrador','Tutor','2024-10-05','09:00:00','Consulta para avaliação geral.','Agendada',8),(8,'Mimi','Siamês','Tutor','2024-10-06','10:00:00','Consulta de rotina para vacina.','Agendada',9),(17,'Rex','Labrador','Tutor','2024-10-05','09:00:00','Consulta para avaliação geral.','Agendada',8),(18,'Mimi','Siamês','Tutor','2024-10-06','10:00:00','Consulta de rotina para vacina.','Agendada',9),(22,'Rex','Labrador','Tutor','2024-10-05','09:00:00','Consulta para avaliação geral.','Agendada',8),(23,'Mimi','Siamês','Tutor','2024-10-06','10:00:00','Consulta de rotina para vacina.','Agendada',9),(27,'Bobby','Poodle','Tutor','2024-10-07','11:00:00','Consulta para avaliação comportamental.','Agendada',13),(28,'Luna','Beagle','Tutor','2024-10-08','14:00:00','Consulta para verificação de peso e dieta.','Agendada',14),(29,'Zeca','Persa','Tutor','2024-10-09','16:00:00','Consulta para verificar alergias.','Agendada',15),(30,'Teste Animal','Teste Raça','Eric','2024-11-30','12:32:00','Teste descrição','Reservado',NULL);
/*!40000 ALTER TABLE `consultas_marcadas` ENABLE KEYS */;
UNLOCK TABLES;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = cp850 */ ;
/*!50003 SET character_set_results = cp850 */ ;
/*!50003 SET collation_connection  = cp850_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = '' */ ;
DELIMITER ;;
/*!50003 CREATE*/ /*!50017 DEFINER=`root`@`localhost`*/ /*!50003 TRIGGER after_consultas_marcadas_insert
AFTER INSERT ON consultas_marcadas
FOR EACH ROW
BEGIN
    INSERT INTO historico (data, hora, tipo, tabela, registro_id, descricao)
    VALUES (CURDATE(), CURTIME(), 'Adi��o', 'consultas_marcadas', NEW.idConsulta, CONCAT('Consulta marcada: ', NEW.nome_animal));
END */;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = cp850 */ ;
/*!50003 SET character_set_results = cp850 */ ;
/*!50003 SET collation_connection  = cp850_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = '' */ ;
DELIMITER ;;
/*!50003 CREATE*/ /*!50017 DEFINER=`root`@`localhost`*/ /*!50003 TRIGGER after_consultas_marcadas_update
AFTER UPDATE ON consultas_marcadas
FOR EACH ROW
BEGIN
    INSERT INTO historico (data, hora, tipo, tabela, registro_id, descricao)
    VALUES (CURDATE(), CURTIME(), 'Altera��o', 'consultas_marcadas', NEW.idConsulta, CONCAT('Consulta alterada: ', NEW.nome_animal));
END */;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = cp850 */ ;
/*!50003 SET character_set_results = cp850 */ ;
/*!50003 SET collation_connection  = cp850_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = '' */ ;
DELIMITER ;;
/*!50003 CREATE*/ /*!50017 DEFINER=`root`@`localhost`*/ /*!50003 TRIGGER after_consultas_marcadas_delete
AFTER DELETE ON consultas_marcadas
FOR EACH ROW
BEGIN
    INSERT INTO historico (data, hora, tipo, tabela, registro_id, descricao)
    VALUES (CURDATE(), CURTIME(), 'Dele��o', 'consultas_marcadas', OLD.idConsulta, CONCAT('Consulta deletada: ', OLD.nome_animal));
END */;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;

--
-- Table structure for table `consultas_tutores`
--

DROP TABLE IF EXISTS `consultas_tutores`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `consultas_tutores` (
  `idConsultaTutor` int(11) NOT NULL AUTO_INCREMENT,
  `nome_tutor` varchar(100) NOT NULL,
  `contato_tutor` varchar(100) NOT NULL,
  `data_consulta` date NOT NULL,
  `hora_consulta` time NOT NULL,
  `descricao` text,
  `status` varchar(20) DEFAULT NULL,
  `tutor_id` int(11) NOT NULL,
  `clinica_id` int(11) NOT NULL,
  PRIMARY KEY (`idConsultaTutor`),
  KEY `tutor_id` (`tutor_id`),
  CONSTRAINT `consultas_tutores_ibfk_1` FOREIGN KEY (`tutor_id`) REFERENCES `tutores` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `consultas_tutores`
--

LOCK TABLES `consultas_tutores` WRITE;
/*!40000 ALTER TABLE `consultas_tutores` DISABLE KEYS */;
INSERT INTO `consultas_tutores` VALUES (1,'Tutor','(11) 98765-4321','2024-10-05','09:00:00','Consulta para avaliação geral do animal Rex.','Agendada',13,7),(2,'Tutor','(11) 98765-4321','2024-10-06','10:00:00','Consulta de rotina para vacina de Mimi.','Agendada',13,7),(3,'Tutor','(11) 98765-4321','2024-10-07','11:00:00','Consulta para avaliação comportamental de Bobby.','Agendada',13,7),(4,'Tutor','(11) 98765-4321','2024-10-08','14:00:00','Consulta para verificação de peso e dieta de Luna.','Agendada',13,7),(5,'Tutor','(11) 98765-4321','2024-10-09','16:00:00','Consulta para verificar alergias de Zeca.','Agendada',13,7),(7,'Nome do Tutor','1234-5678','2024-11-25','10:00:00','Consulta de rotina','Disponível',15,1);
/*!40000 ALTER TABLE `consultas_tutores` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `disponibilidades`
--

DROP TABLE IF EXISTS `disponibilidades`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `disponibilidades` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `veterinario_id` int(11) DEFAULT NULL,
  `data_hora` datetime DEFAULT NULL,
  `status` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `veterinario_id` (`veterinario_id`),
  CONSTRAINT `disponibilidades_ibfk_1` FOREIGN KEY (`veterinario_id`) REFERENCES `veterinarios` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `disponibilidades`
--

LOCK TABLES `disponibilidades` WRITE;
/*!40000 ALTER TABLE `disponibilidades` DISABLE KEYS */;
INSERT INTO `disponibilidades` VALUES (4,1,'2024-11-25 10:00:00','Disponível');
/*!40000 ALTER TABLE `disponibilidades` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `estados`
--

DROP TABLE IF EXISTS `estados`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `estados` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(100) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `nome` (`nome`)
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `estados`
--

LOCK TABLES `estados` WRITE;
/*!40000 ALTER TABLE `estados` DISABLE KEYS */;
INSERT INTO `estados` VALUES (1,'Acre'),(2,'Alagoas'),(3,'Amapá'),(4,'Amazonas'),(5,'Bahia'),(6,'Ceará'),(7,'Distrito Federal'),(8,'Espírito Santo'),(9,'Goiás'),(10,'Maranhão'),(11,'Mato Grosso'),(12,'Mato Grosso do Sul'),(13,'Minas Gerais'),(14,'Pará'),(15,'Paraíba'),(16,'Paraná'),(17,'Pernambuco'),(18,'Piauí'),(19,'Rio de Janeiro'),(20,'Rio Grande do Norte'),(21,'Rio Grande do Sul'),(22,'Rondônia'),(23,'Roraima'),(24,'Santa Catarina'),(25,'São Paulo'),(26,'Sergipe'),(27,'Tocantins');
/*!40000 ALTER TABLE `estados` ENABLE KEYS */;
UNLOCK TABLES;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = cp850 */ ;
/*!50003 SET character_set_results = cp850 */ ;
/*!50003 SET collation_connection  = cp850_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = '' */ ;
DELIMITER ;;
/*!50003 CREATE*/ /*!50017 DEFINER=`root`@`localhost`*/ /*!50003 TRIGGER after_estados_insert
AFTER INSERT ON estados
FOR EACH ROW
BEGIN
    INSERT INTO historico (data, hora, tipo, tabela, registro_id, descricao)
    VALUES (CURDATE(), CURTIME(), 'Adi��o', 'estados', NEW.id, CONCAT('Estado adicionado: ', NEW.nome));
END */;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = cp850 */ ;
/*!50003 SET character_set_results = cp850 */ ;
/*!50003 SET collation_connection  = cp850_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = '' */ ;
DELIMITER ;;
/*!50003 CREATE*/ /*!50017 DEFINER=`root`@`localhost`*/ /*!50003 TRIGGER after_estados_update
AFTER UPDATE ON estados
FOR EACH ROW
BEGIN
    INSERT INTO historico (data, hora, tipo, tabela, registro_id, descricao)
    VALUES (CURDATE(), CURTIME(), 'Altera��o', 'estados', OLD.id, CONCAT('Estado alterado de ', OLD.nome, ' para ', NEW.nome));
END */;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = cp850 */ ;
/*!50003 SET character_set_results = cp850 */ ;
/*!50003 SET collation_connection  = cp850_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = '' */ ;
DELIMITER ;;
/*!50003 CREATE*/ /*!50017 DEFINER=`root`@`localhost`*/ /*!50003 TRIGGER after_estados_delete
AFTER DELETE ON estados
FOR EACH ROW
BEGIN
    INSERT INTO historico (data, hora, tipo, tabela, registro_id, descricao)
    VALUES (CURDATE(), CURTIME(), 'Dele��o', 'estados', OLD.id, CONCAT('Estado deletado: ', OLD.nome));
END */;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;

--
-- Table structure for table `exames_realizados`
--

DROP TABLE IF EXISTS `exames_realizados`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `exames_realizados` (
  `idExame` int(11) NOT NULL AUTO_INCREMENT,
  `tipoExame` varchar(100) DEFAULT NULL,
  `dataExame` date DEFAULT NULL,
  `resultado` text,
  `idPaciente` int(11) DEFAULT NULL,
  PRIMARY KEY (`idExame`),
  KEY `fk_idPaciente` (`idPaciente`),
  CONSTRAINT `fk_idPaciente` FOREIGN KEY (`idPaciente`) REFERENCES `pacientes` (`idPaciente`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `exames_realizados`
--

LOCK TABLES `exames_realizados` WRITE;
/*!40000 ALTER TABLE `exames_realizados` DISABLE KEYS */;
INSERT INTO `exames_realizados` VALUES (1,'Hemograma','2024-10-01','Normal',8),(2,'Ultrassom','2024-10-02','Exame inconclusivo',9),(3,'Raio-X','2024-10-03','Fratura confirmada',10),(4,'Exame de fezes','2024-10-04','Parasitose detectada',11),(5,'Exame de urina','2024-10-05','Sem anormalidades',12),(6,'Exame cardíaco','2024-10-06','Saudável',8),(7,'Exame de pele','2024-10-07','Sem anormalidades',9),(8,'Análise de sangue','2024-10-08','Níveis de glicose normais',10),(9,'Teste de alergia','2024-10-09','Sem reações',11),(10,'Exame oftalmológico','2024-10-10','Visão saudável',12);
/*!40000 ALTER TABLE `exames_realizados` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `historico`
--

DROP TABLE IF EXISTS `historico`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `historico` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `data` date NOT NULL,
  `hora` time NOT NULL,
  `tipo` enum('Adição','Alteração','Deleção') NOT NULL,
  `tabela` varchar(255) NOT NULL,
  `registro_id` int(11) NOT NULL,
  `descricao` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=243 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `historico`
--

LOCK TABLES `historico` WRITE;
/*!40000 ALTER TABLE `historico` DISABLE KEYS */;
INSERT INTO `historico` VALUES (1,'2024-09-23','11:29:58','Adição','cidades',28,'Cidade adicionada: Cidade Teste'),(2,'2024-09-23','12:06:35','Adição','consultas_marcadas',1,'Consulta marcada: Victor'),(3,'2024-09-25','08:45:40','Adição','pacientes',1,'Paciente adicionado: Bobby'),(4,'2024-09-25','08:45:40','Adição','pacientes',2,'Paciente adicionado: Mimi'),(5,'2024-09-25','08:45:40','Adição','pacientes',3,'Paciente adicionado: Max'),(6,'2024-09-25','08:45:40','Adição','pacientes',4,'Paciente adicionado: Luna'),(7,'2024-09-25','08:45:40','Adição','pacientes',5,'Paciente adicionado: Rex'),(8,'2024-09-25','08:45:40','Adição','pacientes',6,'Paciente adicionado: Nina'),(9,'2024-09-25','08:45:40','Adição','pacientes',7,'Paciente adicionado: Thor'),(10,'2024-09-25','08:45:53','Adição','medicamentos_prescritos',1,'Medicamento prescrito: Bobby'),(11,'2024-09-25','08:45:53','Adição','medicamentos_prescritos',2,'Medicamento prescrito: Mimi'),(12,'2024-09-25','08:45:53','Adição','medicamentos_prescritos',3,'Medicamento prescrito: Max'),(13,'2024-09-25','08:45:53','Adição','medicamentos_prescritos',4,'Medicamento prescrito: Luna'),(14,'2024-09-25','08:45:53','Adição','medicamentos_prescritos',5,'Medicamento prescrito: Rex'),(15,'2024-09-25','08:45:53','Adição','medicamentos_prescritos',6,'Medicamento prescrito: Nina'),(16,'2024-09-25','08:45:53','Adição','medicamentos_prescritos',7,'Medicamento prescrito: Thor'),(17,'2024-09-25','08:45:57','Adição','tutores',2,'Tutor adicionado: Carlos Silva'),(18,'2024-09-25','08:45:57','Adição','tutores',3,'Tutor adicionado: Ana Souza'),(19,'2024-09-25','08:45:57','Adição','tutores',4,'Tutor adicionado: João Ferreira'),(20,'2024-09-25','08:45:57','Adição','tutores',5,'Tutor adicionado: Mariana Oliveira'),(21,'2024-09-25','08:45:57','Adição','tutores',6,'Tutor adicionado: Pedro Santos'),(22,'2024-09-25','08:45:57','Adição','tutores',7,'Tutor adicionado: Camila Mendes'),(23,'2024-09-25','08:45:57','Adição','tutores',8,'Tutor adicionado: Lucas Andrade'),(24,'2024-09-25','09:09:27','Adição','horarios',1,'Horário adicionado: 2024-09-25 09:30:00'),(25,'2024-09-25','09:11:38','Adição','horarios',2,'Horário adicionado: 2024-09-25 08:00:00'),(26,'2024-09-25','09:11:38','Adição','horarios',3,'Horário adicionado: 2024-09-25 09:00:00'),(27,'2024-09-25','09:11:38','Adição','horarios',4,'Horário adicionado: 2024-09-25 10:00:00'),(28,'2024-09-25','09:11:38','Adição','horarios',5,'Horário adicionado: 2024-09-25 11:00:00'),(29,'2024-09-25','09:11:38','Adição','horarios',6,'Horário adicionado: 2024-09-25 12:00:00'),(30,'2024-09-25','09:11:38','Adição','horarios',7,'Horário adicionado: 2024-09-25 13:00:00'),(31,'2024-09-25','09:11:38','Adição','horarios',8,'Horário adicionado: 2024-09-25 14:00:00'),(32,'2024-09-25','09:11:38','Adição','horarios',9,'Horário adicionado: 2024-09-25 15:00:00'),(33,'2024-09-25','09:11:38','Adição','horarios',10,'Horário adicionado: 2024-09-25 16:00:00'),(34,'2024-09-25','09:11:38','Adição','horarios',11,'Horário adicionado: 2024-09-25 17:00:00'),(35,'2024-09-25','09:11:38','Adição','horarios',12,'Horário adicionado: 2024-09-26 08:00:00'),(36,'2024-09-25','09:11:38','Adição','horarios',13,'Horário adicionado: 2024-09-26 09:00:00'),(37,'2024-09-25','09:11:38','Adição','horarios',14,'Horário adicionado: 2024-09-26 10:00:00'),(38,'2024-09-25','09:11:38','Adição','horarios',15,'Horário adicionado: 2024-09-26 11:00:00'),(39,'2024-09-25','09:11:38','Adição','horarios',16,'Horário adicionado: 2024-09-26 12:00:00'),(40,'2024-09-25','09:17:35','Deleção','clientes',11,'Cliente deletado: wqeqweqeqeqeqdad'),(41,'2024-09-25','09:18:04','Alteração','clientes',2,'Cliente alterado: dahdadad'),(42,'2024-09-25','10:29:04','Adição','clientes',13,'Cliente adicionado: Ana Oliveira'),(43,'2024-09-25','10:29:04','Adição','clientes',14,'Cliente adicionado: Carlos Silva'),(44,'2024-09-25','10:29:04','Adição','clientes',15,'Cliente adicionado: Mariana Santos'),(45,'2024-09-25','10:29:04','Adição','clientes',16,'Cliente adicionado: Roberto Lima'),(46,'2024-09-25','10:29:04','Adição','clientes',17,'Cliente adicionado: Juliana Costa'),(47,'2024-09-25','10:29:04','Adição','clientes',18,'Cliente adicionado: Paulo Henrique'),(48,'2024-09-25','10:29:04','Adição','clientes',19,'Cliente adicionado: Clara Almeida'),(49,'2024-09-25','10:29:04','Adição','clientes',20,'Cliente adicionado: Rafael Mendes'),(50,'2024-09-25','10:29:04','Adição','clientes',21,'Cliente adicionado: Luciana Ferreira'),(51,'2024-09-25','10:29:04','Adição','clientes',22,'Cliente adicionado: Fernanda Martins'),(52,'2024-09-25','10:34:09','Deleção','clientes',1,'Cliente deletado: Eric'),(53,'2024-09-25','10:34:09','Deleção','clientes',2,'Cliente deletado: dahdadad'),(54,'2024-09-25','10:34:09','Deleção','clientes',4,'Cliente deletado: dahdadaddad'),(55,'2024-09-25','10:34:09','Deleção','clientes',5,'Cliente deletado: gggasgafafa'),(56,'2024-09-25','10:34:09','Deleção','clientes',6,'Cliente deletado: fgfgfgfgfg'),(57,'2024-09-25','10:34:09','Deleção','clientes',7,'Cliente deletado: dfsfsfdf'),(58,'2024-09-25','10:34:09','Deleção','clientes',8,'Cliente deletado: ggggggg'),(59,'2024-09-25','10:34:09','Deleção','clientes',9,'Cliente deletado: jidgasdsadya'),(60,'2024-09-25','10:34:09','Deleção','clientes',10,'Cliente deletado: wqeqweqeqeqeq'),(61,'2024-09-25','10:34:09','Deleção','clientes',12,'Cliente deletado: qdadadadad'),(62,'2024-09-25','10:34:09','Deleção','clientes',13,'Cliente deletado: Ana Oliveira'),(63,'2024-09-25','10:34:09','Deleção','clientes',14,'Cliente deletado: Carlos Silva'),(64,'2024-09-25','10:34:09','Deleção','clientes',15,'Cliente deletado: Mariana Santos'),(65,'2024-09-25','10:34:09','Deleção','clientes',16,'Cliente deletado: Roberto Lima'),(66,'2024-09-25','10:34:09','Deleção','clientes',17,'Cliente deletado: Juliana Costa'),(67,'2024-09-25','10:34:09','Deleção','clientes',18,'Cliente deletado: Paulo Henrique'),(68,'2024-09-25','10:34:09','Deleção','clientes',19,'Cliente deletado: Clara Almeida'),(69,'2024-09-25','10:34:09','Deleção','clientes',20,'Cliente deletado: Rafael Mendes'),(70,'2024-09-25','10:34:09','Deleção','clientes',21,'Cliente deletado: Luciana Ferreira'),(71,'2024-09-25','10:34:09','Deleção','clientes',22,'Cliente deletado: Fernanda Martins'),(72,'2024-09-25','10:52:03','Adição','clientes',23,'Cliente adicionado: Tutor'),(73,'2024-09-25','10:52:03','Adição','tutores',9,'Tutor adicionado: Tutor'),(74,'2024-09-25','10:59:50','Adição','clientes',24,'Cliente adicionado: Victor'),(75,'2024-09-25','10:59:50','Adição','tutores',10,'Tutor adicionado: Victor'),(76,'2024-09-26','09:49:01','Adição','horarios',17,'Horário adicionado: 2024-09-09 09:51:00'),(77,'2024-09-26','10:56:26','Adição','pets',1,'Pet adicionado: dadasd'),(78,'2024-09-26','10:56:27','Adição','pets',2,'Pet adicionado: dadasd'),(79,'2024-09-26','10:56:28','Adição','pets',3,'Pet adicionado: dadasd'),(80,'2024-09-26','10:56:28','Adição','pets',4,'Pet adicionado: dadasd'),(81,'2024-09-26','10:56:28','Adição','pets',5,'Pet adicionado: dadasd'),(82,'2024-09-26','10:57:15','Adição','pets',6,'Pet adicionado: test'),(83,'2024-09-26','10:59:48','Adição','pets',7,'Pet adicionado: test'),(84,'2024-09-26','11:03:44','Adição','pets',8,'Pet adicionado: test'),(85,'2024-09-26','11:09:30','Adição','clientes',25,'Cliente adicionado: testeeee'),(86,'2024-09-26','11:09:30','Adição','tutores',11,'Tutor adicionado: testeeee'),(87,'2024-09-26','11:13:46','Adição','clientes',26,'Cliente adicionado: testeeeeeee'),(88,'2024-09-26','11:13:46','Adição','tutores',12,'Tutor adicionado: testeeeeeee'),(89,'2024-09-26','11:34:56','Adição','pets',9,'Pet adicionado: dada'),(90,'2024-09-30','08:42:56','Deleção','tutores',1,'Tutor deletado: Eric'),(91,'2024-09-30','08:42:56','Deleção','tutores',2,'Tutor deletado: Carlos Silva'),(92,'2024-09-30','08:42:56','Deleção','tutores',3,'Tutor deletado: Ana Souza'),(93,'2024-09-30','08:42:56','Deleção','tutores',4,'Tutor deletado: João Ferreira'),(94,'2024-09-30','08:42:56','Deleção','tutores',5,'Tutor deletado: Mariana Oliveira'),(95,'2024-09-30','08:42:56','Deleção','tutores',6,'Tutor deletado: Pedro Santos'),(96,'2024-09-30','08:42:56','Deleção','tutores',7,'Tutor deletado: Camila Mendes'),(97,'2024-09-30','08:42:56','Deleção','tutores',8,'Tutor deletado: Lucas Andrade'),(98,'2024-09-30','08:42:56','Deleção','tutores',9,'Tutor deletado: Tutor'),(99,'2024-09-30','08:42:56','Deleção','tutores',10,'Tutor deletado: Victor'),(100,'2024-09-30','08:42:56','Deleção','tutores',11,'Tutor deletado: testeeee'),(101,'2024-09-30','08:42:56','Deleção','tutores',12,'Tutor deletado: testeeeeeee'),(102,'2024-09-30','08:43:35','Deleção','clientes',23,'Cliente deletado: Tutor'),(103,'2024-09-30','08:43:35','Deleção','clientes',24,'Cliente deletado: Victor'),(104,'2024-09-30','08:43:35','Deleção','clientes',25,'Cliente deletado: testeeee'),(105,'2024-09-30','08:43:35','Deleção','clientes',26,'Cliente deletado: testeeeeeee'),(106,'2024-09-30','08:47:43','Adição','clientes',27,'Cliente adicionado: Tutor'),(107,'2024-09-30','08:47:43','Adição','tutores',13,'Tutor adicionado: Tutor'),(108,'2024-09-30','09:20:33','Adição','horarios',18,'Horário adicionado: 2024-09-30 09:30:00'),(109,'2024-09-30','09:21:46','Adição','horarios',19,'Horário adicionado: 2024-09-30 10:24:00'),(110,'2024-09-30','09:22:15','Adição','horarios',20,'Horário adicionado: 2024-09-22 09:24:00'),(111,'2024-09-30','09:27:26','Deleção','horarios',19,'Horário deletado: 2024-09-30 10:24:00'),(112,'2024-09-30','09:27:26','Deleção','horarios',20,'Horário deletado: 2024-09-22 09:24:00'),(113,'2024-09-30','09:31:24','Adição','horarios',21,'Horário adicionado: 2024-10-01 14:00:00'),(114,'2024-09-30','09:37:13','Alteração','horarios',21,'Horário alterado: 2024-10-01 14:00:00 para 2024-10-01 14:00:00'),(115,'2024-09-30','09:51:37','Alteração','horarios',21,'Horário alterado: 2024-10-01 14:00:00 para 2024-10-01 14:00:00'),(116,'2024-09-30','10:42:30','Deleção','horarios',21,'Horário deletado: 2024-10-01 14:00:00'),(117,'2024-10-01','11:16:55','Adição','pacientes',8,'Paciente adicionado: Rex'),(118,'2024-10-01','11:16:55','Adição','pacientes',9,'Paciente adicionado: Mimi'),(119,'2024-10-01','11:16:55','Adição','pacientes',10,'Paciente adicionado: Bobby'),(120,'2024-10-01','11:16:55','Adição','pacientes',11,'Paciente adicionado: Luna'),(121,'2024-10-01','11:16:55','Adição','pacientes',12,'Paciente adicionado: Zeca'),(122,'2024-10-01','11:28:21','Deleção','pacientes',1,'Paciente deletado: Bobby'),(123,'2024-10-01','11:28:21','Deleção','pacientes',2,'Paciente deletado: Mimi'),(124,'2024-10-01','11:28:21','Deleção','pacientes',3,'Paciente deletado: Max'),(125,'2024-10-01','11:28:21','Deleção','pacientes',4,'Paciente deletado: Luna'),(126,'2024-10-01','11:28:21','Deleção','pacientes',5,'Paciente deletado: Rex'),(127,'2024-10-01','11:28:21','Deleção','pacientes',6,'Paciente deletado: Nina'),(128,'2024-10-01','11:28:21','Deleção','pacientes',7,'Paciente deletado: Thor'),(129,'2024-10-01','12:04:05','Alteração','tutores',13,'Tutor alterado de Tutor para Tutor'),(130,'2024-10-02','09:48:51','Adição','consultas_marcadas',2,'Consulta marcada: Rex'),(131,'2024-10-02','09:48:51','Adição','consultas_marcadas',3,'Consulta marcada: Mimi'),(132,'2024-10-02','09:49:12','Adição','consultas_marcadas',7,'Consulta marcada: Rex'),(133,'2024-10-02','09:49:12','Adição','consultas_marcadas',8,'Consulta marcada: Mimi'),(136,'2024-10-02','09:52:53','Adição','horarios',19,'Horário adicionado: 2024-10-05 09:00:00'),(137,'2024-10-02','09:52:53','Adição','horarios',20,'Horário adicionado: 2024-10-06 10:00:00'),(138,'2024-10-02','09:52:54','Adição','horarios',21,'Horário adicionado: 2024-10-07 11:00:00'),(139,'2024-10-02','09:52:54','Adição','horarios',22,'Horário adicionado: 2024-10-08 14:00:00'),(140,'2024-10-02','09:52:54','Adição','horarios',23,'Horário adicionado: 2024-10-09 16:00:00'),(141,'2024-10-02','09:53:13','Adição','consultas_marcadas',17,'Consulta marcada: Rex'),(142,'2024-10-02','09:53:13','Adição','consultas_marcadas',18,'Consulta marcada: Mimi'),(143,'2024-10-02','09:54:45','Adição','pets',13,'Pet adicionado: Bobby'),(144,'2024-10-02','09:54:45','Adição','pets',14,'Pet adicionado: Luna'),(145,'2024-10-02','09:54:45','Adição','pets',15,'Pet adicionado: Zeca'),(146,'2024-10-02','09:54:58','Alteração','horarios',19,'Horário alterado: 2024-10-05 09:00:00 para 2024-10-05 09:00:00'),(147,'2024-10-02','09:54:58','Alteração','horarios',20,'Horário alterado: 2024-10-06 10:00:00 para 2024-10-06 10:00:00'),(148,'2024-10-02','09:54:58','Alteração','horarios',21,'Horário alterado: 2024-10-07 11:00:00 para 2024-10-07 11:00:00'),(149,'2024-10-02','09:54:58','Alteração','horarios',22,'Horário alterado: 2024-10-08 14:00:00 para 2024-10-08 14:00:00'),(150,'2024-10-02','09:54:58','Alteração','horarios',23,'Horário alterado: 2024-10-09 16:00:00 para 2024-10-09 16:00:00'),(151,'2024-10-02','09:55:07','Adição','consultas_marcadas',22,'Consulta marcada: Rex'),(152,'2024-10-02','09:55:07','Adição','consultas_marcadas',23,'Consulta marcada: Mimi'),(153,'2024-10-02','09:56:24','Adição','consultas_marcadas',27,'Consulta marcada: Bobby'),(154,'2024-10-02','09:56:24','Adição','consultas_marcadas',28,'Consulta marcada: Luna'),(155,'2024-10-02','09:56:24','Adição','consultas_marcadas',29,'Consulta marcada: Zeca'),(156,'2024-10-02','10:20:00','Adição','horarios',24,'Horário adicionado: 2024-10-02 10:30:00'),(157,'2024-10-02','10:59:30','Adição','clientes',28,'Cliente adicionado: Eric'),(158,'2024-10-02','10:59:30','Adição','tutores',14,'Tutor adicionado: Eric'),(159,'2024-10-16','09:54:32','Adição','pets',16,'Pet adicionado: Victor'),(160,'2024-10-17','10:40:45','Adição','pets',17,'Pet adicionado: teste'),(161,'2024-11-19','09:12:34','Adição','horarios',25,'Horário adicionado: 2024-11-19 09:12:00'),(162,'2024-11-25','11:28:28','Adição','clientes',29,'Cliente adicionado: Teste novo tutor'),(163,'2024-11-25','11:28:28','Adição','tutores',15,'Tutor adicionado: Teste novo tutor'),(164,'2024-11-26','09:10:43','Adição','horarios',26,'Horário adicionado: 2024-11-26 09:10:00'),(165,'2024-11-26','09:11:39','Adição','horarios',27,'Horário adicionado: 2024-11-26 09:11:00'),(166,'2024-11-26','09:12:19','Adição','horarios',28,'Horário adicionado: 2024-11-26 09:20:00'),(167,'2024-11-26','09:17:35','Adição','horarios',29,'Horário adicionado: 2024-12-01 09:00:00'),(168,'2024-11-26','09:22:45','Adição','horarios',30,'Horário adicionado: 2024-11-27 10:24:00'),(169,'2024-11-26','09:23:42','Adição','horarios',31,'Horário adicionado: 2024-11-26 09:25:00'),(170,'2024-11-26','09:25:33','Adição','horarios',32,'Horário adicionado: 2024-11-06 10:26:00'),(171,'2024-11-26','09:31:51','Adição','horarios',33,'Horário adicionado: 2024-11-06 10:26:00'),(172,'2024-11-26','09:34:33','Adição','horarios',34,'Horário adicionado: 0000-00-00 10:27:00'),(173,'2024-11-26','09:35:00','Adição','horarios',35,'Horário adicionado: 0000-00-00 10:26:00'),(174,'2024-11-26','09:35:34','Adição','horarios',36,'Horário adicionado: 0000-00-00 10:26:00'),(175,'2024-11-26','09:35:59','Adição','horarios',37,'Horário adicionado: 2024-11-06 10:26:00'),(176,'2024-11-26','09:36:33','Adição','horarios',38,'Horário adicionado: 2024-11-06 10:26:00'),(177,'2024-11-26','09:36:44','Adição','horarios',39,'Horário adicionado: 0000-00-00 10:27:00'),(178,'2024-11-26','09:36:52','Adição','horarios',40,'Horário adicionado: 2024-11-06 10:26:00'),(179,'2024-11-26','09:37:48','Adição','horarios',41,'Horário adicionado: 0000-00-00 10:27:00'),(180,'2024-11-26','09:38:04','Adição','horarios',42,'Horário adicionado: 2024-11-06 10:26:00'),(181,'2024-11-26','09:38:45','Adição','horarios',43,'Horário adicionado: 2024-11-06 10:26:00'),(182,'2024-11-26','09:44:34','Adição','horarios',44,'Horário adicionado: 2024-11-30 09:48:00'),(183,'2024-11-26','09:46:34','Deleção','horarios',1,'Horário deletado: 2024-09-25 09:30:00'),(184,'2024-11-26','09:46:34','Deleção','horarios',2,'Horário deletado: 2024-09-25 08:00:00'),(185,'2024-11-26','09:46:34','Deleção','horarios',3,'Horário deletado: 2024-09-25 09:00:00'),(186,'2024-11-26','09:46:34','Deleção','horarios',4,'Horário deletado: 2024-09-25 10:00:00'),(187,'2024-11-26','09:46:34','Deleção','horarios',5,'Horário deletado: 2024-09-25 11:00:00'),(188,'2024-11-26','09:46:34','Deleção','horarios',6,'Horário deletado: 2024-09-25 12:00:00'),(189,'2024-11-26','09:46:34','Deleção','horarios',7,'Horário deletado: 2024-09-25 13:00:00'),(190,'2024-11-26','09:46:34','Deleção','horarios',8,'Horário deletado: 2024-09-25 14:00:00'),(191,'2024-11-26','09:46:34','Deleção','horarios',9,'Horário deletado: 2024-09-25 15:00:00'),(192,'2024-11-26','09:46:34','Deleção','horarios',10,'Horário deletado: 2024-09-25 16:00:00'),(193,'2024-11-26','09:46:34','Deleção','horarios',11,'Horário deletado: 2024-09-25 17:00:00'),(194,'2024-11-26','09:46:34','Deleção','horarios',12,'Horário deletado: 2024-09-26 08:00:00'),(195,'2024-11-26','09:46:34','Deleção','horarios',13,'Horário deletado: 2024-09-26 09:00:00'),(196,'2024-11-26','09:46:34','Deleção','horarios',14,'Horário deletado: 2024-09-26 10:00:00'),(197,'2024-11-26','09:46:34','Deleção','horarios',15,'Horário deletado: 2024-09-26 11:00:00'),(198,'2024-11-26','09:46:34','Deleção','horarios',16,'Horário deletado: 2024-09-26 12:00:00'),(199,'2024-11-26','09:46:34','Deleção','horarios',17,'Horário deletado: 2024-09-09 09:51:00'),(200,'2024-11-26','09:46:34','Deleção','horarios',18,'Horário deletado: 2024-09-30 09:30:00'),(201,'2024-11-26','09:46:34','Deleção','horarios',19,'Horário deletado: 2024-10-05 09:00:00'),(202,'2024-11-26','09:46:34','Deleção','horarios',20,'Horário deletado: 2024-10-06 10:00:00'),(203,'2024-11-26','09:46:34','Deleção','horarios',21,'Horário deletado: 2024-10-07 11:00:00'),(204,'2024-11-26','09:46:34','Deleção','horarios',22,'Horário deletado: 2024-10-08 14:00:00'),(205,'2024-11-26','09:46:34','Deleção','horarios',23,'Horário deletado: 2024-10-09 16:00:00'),(206,'2024-11-26','09:46:34','Deleção','horarios',24,'Horário deletado: 2024-10-02 10:30:00'),(207,'2024-11-26','09:46:34','Deleção','horarios',25,'Horário deletado: 2024-11-19 09:12:00'),(208,'2024-11-26','09:46:34','Deleção','horarios',26,'Horário deletado: 2024-11-26 09:10:00'),(209,'2024-11-26','09:46:34','Deleção','horarios',27,'Horário deletado: 2024-11-26 09:11:00'),(210,'2024-11-26','09:46:34','Deleção','horarios',28,'Horário deletado: 2024-11-26 09:20:00'),(211,'2024-11-26','09:46:34','Deleção','horarios',29,'Horário deletado: 2024-12-01 09:00:00'),(212,'2024-11-26','09:46:34','Deleção','horarios',30,'Horário deletado: 2024-11-27 10:24:00'),(213,'2024-11-26','09:46:34','Deleção','horarios',31,'Horário deletado: 2024-11-26 09:25:00'),(214,'2024-11-26','09:46:34','Deleção','horarios',32,'Horário deletado: 2024-11-06 10:26:00'),(215,'2024-11-26','09:46:34','Deleção','horarios',33,'Horário deletado: 2024-11-06 10:26:00'),(216,'2024-11-26','09:46:34','Deleção','horarios',34,'Horário deletado: 0000-00-00 10:27:00'),(217,'2024-11-26','09:46:34','Deleção','horarios',35,'Horário deletado: 0000-00-00 10:26:00'),(218,'2024-11-26','09:46:34','Deleção','horarios',36,'Horário deletado: 0000-00-00 10:26:00'),(219,'2024-11-26','09:46:34','Deleção','horarios',37,'Horário deletado: 2024-11-06 10:26:00'),(220,'2024-11-26','09:46:34','Deleção','horarios',38,'Horário deletado: 2024-11-06 10:26:00'),(221,'2024-11-26','09:46:34','Deleção','horarios',39,'Horário deletado: 0000-00-00 10:27:00'),(222,'2024-11-26','09:46:34','Deleção','horarios',40,'Horário deletado: 2024-11-06 10:26:00'),(223,'2024-11-26','09:46:34','Deleção','horarios',41,'Horário deletado: 0000-00-00 10:27:00'),(224,'2024-11-26','09:46:34','Deleção','horarios',42,'Horário deletado: 2024-11-06 10:26:00'),(225,'2024-11-26','09:46:34','Deleção','horarios',43,'Horário deletado: 2024-11-06 10:26:00'),(226,'2024-11-26','09:46:34','Deleção','horarios',44,'Horário deletado: 2024-11-30 09:48:00'),(227,'2024-11-26','09:51:44','Adição','horarios',45,'Horário adicionado: 2024-11-26 09:51:00'),(228,'2024-11-26','09:53:19','Adição','horarios',46,'Horário adicionado: 2024-11-07 14:55:00'),(229,'2024-11-26','09:55:04','Adição','horarios',47,'Horário adicionado: 2024-11-30 09:59:00'),(230,'2024-11-26','09:56:43','Adição','horarios',48,'Horário adicionado: 2024-11-06 10:26:00'),(231,'2024-11-26','10:24:47','Adição','horarios',49,'Horário adicionado: 2024-11-13 14:27:00'),(232,'2024-11-26','10:28:22','Adição','horarios',50,'Horário adicionado: 2024-11-29 15:32:00'),(233,'2024-11-26','10:29:11','Adição','horarios',51,'Horário adicionado: 2024-11-09 10:33:00'),(234,'2024-11-26','10:30:16','Deleção','horarios',45,'Horário deletado: 2024-11-26 09:51:00'),(235,'2024-11-26','10:30:16','Deleção','horarios',46,'Horário deletado: 2024-11-07 14:55:00'),(236,'2024-11-26','10:30:16','Deleção','horarios',47,'Horário deletado: 2024-11-30 09:59:00'),(237,'2024-11-26','10:30:16','Deleção','horarios',48,'Horário deletado: 2024-11-06 10:26:00'),(238,'2024-11-26','10:30:16','Deleção','horarios',49,'Horário deletado: 2024-11-13 14:27:00'),(239,'2024-11-26','10:30:16','Deleção','horarios',50,'Horário deletado: 2024-11-29 15:32:00'),(240,'2024-11-26','10:30:16','Deleção','horarios',51,'Horário deletado: 2024-11-09 10:33:00'),(241,'2024-11-26','10:30:46','Adição','horarios',52,'Horário adicionado: 2024-11-18 12:32:00'),(242,'2024-11-26','10:45:24','Adição','consultas_marcadas',30,'Consulta marcada: Teste Animal');
/*!40000 ALTER TABLE `historico` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `historico_vacinas`
--

DROP TABLE IF EXISTS `historico_vacinas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `historico_vacinas` (
  `idHistorico` int(11) NOT NULL AUTO_INCREMENT,
  `idAnimal` int(11) DEFAULT NULL,
  `dataVacina` date DEFAULT NULL,
  `tipoVacina` varchar(100) DEFAULT NULL,
  `observacao` text,
  `dataAplicacao` date DEFAULT NULL,
  `idVacina` int(11) DEFAULT NULL,
  `idVeterinario` int(11) DEFAULT NULL,
  `clinica_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`idHistorico`),
  KEY `fk_veterinario` (`idVeterinario`),
  KEY `fk_clinica` (`clinica_id`),
  CONSTRAINT `fk_clinica` FOREIGN KEY (`clinica_id`) REFERENCES `clinicas` (`id`),
  CONSTRAINT `fk_veterinario` FOREIGN KEY (`idVeterinario`) REFERENCES `veterinarios` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=33 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `historico_vacinas`
--

LOCK TABLES `historico_vacinas` WRITE;
/*!40000 ALTER TABLE `historico_vacinas` DISABLE KEYS */;
INSERT INTO `historico_vacinas` VALUES (1,1,'2023-08-01','Antirrábica','Sem complicações','2023-08-01',1,1,7),(2,2,'2023-07-15','V8','Animal apresentou febre','2023-07-15',2,1,7),(3,3,'2023-06-20','Antirrábica','Vacina administrada com sucesso','2023-06-20',1,1,7),(4,4,'2023-05-10','V10','Reação alérgica leve','2023-05-10',3,1,7),(5,5,'2023-04-25','Antirrábica','Animal em boas condições','2023-04-25',1,1,7),(6,6,'2023-03-18','V8','Sem complicações','2023-03-18',2,1,7),(7,7,'2023-02-12','Antirrábica','Animal tranquilo','2023-02-12',1,1,7),(8,8,'2024-09-15','Vacina Antirrábica','Aplicada anualmente.','2024-09-15',1,1,7),(9,9,'2024-09-20','Vacina Polivalente','Primeira aplicação.','2024-09-20',2,1,7),(10,10,'2024-09-25','Vacina Contra Giardíase','Vacina aplicada com sucesso.','2024-09-25',3,1,7),(11,11,'2024-09-30','Vacina Anti-Leptospira','Vacina de reforço.','2024-09-30',4,1,7),(12,12,'2024-10-01','Vacina Contra a Tosse dos Canis','Primeira aplicação.','2024-10-01',5,1,7),(13,8,'2024-09-15','Vacina Antirrábica','Aplicada anualmente.','2024-09-15',1,1,7),(14,9,'2024-09-20','Vacina Polivalente','Primeira aplicação.','2024-09-20',2,1,7),(15,10,'2024-09-25','Vacina Contra Giardíase','Vacina aplicada com sucesso.','2024-09-25',3,1,7),(16,11,'2024-09-30','Vacina Anti-Leptospira','Vacina de reforço.','2024-09-30',4,1,7),(17,12,'2024-10-01','Vacina Contra a Tosse dos Canis','Primeira aplicação.','2024-10-01',5,1,7),(18,8,'2024-09-15','Vacina Antirrábica','Aplicada anualmente.','2024-09-15',1,1,7),(19,9,'2024-09-20','Vacina Polivalente','Primeira aplicação.','2024-09-20',2,1,7),(20,10,'2024-09-25','Vacina Contra Giardíase','Vacina aplicada com sucesso.','2024-09-25',3,1,7),(21,11,'2024-09-30','Vacina Anti-Leptospira','Vacina de reforço.','2024-09-30',4,1,7),(22,12,'2024-10-01','Vacina Contra a Tosse dos Canis','Primeira aplicação.','2024-10-01',5,1,7),(23,8,'2024-09-15','Vacina Antirrábica','Aplicada anualmente.','2024-09-15',1,1,7),(24,9,'2024-09-20','Vacina Polivalente','Primeira aplicação.','2024-09-20',2,1,7),(25,10,'2024-09-25','Vacina Contra Giardíase','Vacina aplicada com sucesso.','2024-09-25',3,1,7),(26,11,'2024-09-30','Vacina Anti-Leptospira','Vacina de reforço.','2024-09-30',4,1,7),(27,12,'2024-10-01','Vacina Contra a Tosse dos Canis','Primeira aplicação.','2024-10-01',5,1,7),(28,8,'2023-08-01','Vacina Antirrábica','Aplicação em dia','2023-08-01',NULL,1,7),(29,9,'2023-07-15','Vacina V8','Primeira dose','2023-07-15',NULL,1,7),(30,10,'2023-06-10','Vacina V10','Atualização de vacinas','2023-06-10',NULL,1,7),(31,11,'2023-05-05','Vacina Leptospirose','Sem reações adversas','2023-05-05',NULL,1,7),(32,12,'2023-04-20','Vacina Antirrábica','Reação leve, monitorar','2023-04-20',NULL,1,7);
/*!40000 ALTER TABLE `historico_vacinas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `horarios`
--

DROP TABLE IF EXISTS `horarios`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `horarios` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `data` date NOT NULL,
  `horario` time NOT NULL,
  `disponibilidade` enum('Disponivel','Reservado') NOT NULL,
  `clinica_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=53 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `horarios`
--

LOCK TABLES `horarios` WRITE;
/*!40000 ALTER TABLE `horarios` DISABLE KEYS */;
INSERT INTO `horarios` VALUES (52,'2024-11-18','12:32:00','Disponivel',7);
/*!40000 ALTER TABLE `horarios` ENABLE KEYS */;
UNLOCK TABLES;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = cp850 */ ;
/*!50003 SET character_set_results = cp850 */ ;
/*!50003 SET collation_connection  = cp850_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = '' */ ;
DELIMITER ;;
/*!50003 CREATE*/ /*!50017 DEFINER=`root`@`localhost`*/ /*!50003 TRIGGER after_horarios_insert
AFTER INSERT ON horarios
FOR EACH ROW
BEGIN
    INSERT INTO historico (data, hora, tipo, tabela, registro_id, descricao)
    VALUES (CURDATE(), CURTIME(), 'Adi��o', 'horarios', NEW.id, CONCAT('Hor�rio adicionado: ', NEW.data, ' ', NEW.horario));
END */;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = cp850 */ ;
/*!50003 SET character_set_results = cp850 */ ;
/*!50003 SET collation_connection  = cp850_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = '' */ ;
DELIMITER ;;
/*!50003 CREATE*/ /*!50017 DEFINER=`root`@`localhost`*/ /*!50003 TRIGGER after_horarios_update
AFTER UPDATE ON horarios
FOR EACH ROW
BEGIN
    INSERT INTO historico (data, hora, tipo, tabela, registro_id, descricao)
    VALUES (CURDATE(), CURTIME(), 'Altera��o', 'horarios', OLD.id, CONCAT('Hor�rio alterado: ', OLD.data, ' ', OLD.horario, ' para ', NEW.data, ' ', NEW.horario));
END */;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = cp850 */ ;
/*!50003 SET character_set_results = cp850 */ ;
/*!50003 SET collation_connection  = cp850_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = '' */ ;
DELIMITER ;;
/*!50003 CREATE*/ /*!50017 DEFINER=`root`@`localhost`*/ /*!50003 TRIGGER after_horarios_delete
AFTER DELETE ON horarios
FOR EACH ROW
BEGIN
    INSERT INTO historico (data, hora, tipo, tabela, registro_id, descricao)
    VALUES (CURDATE(), CURTIME(), 'Dele��o', 'horarios', OLD.id, CONCAT('Hor�rio deletado: ', OLD.data, ' ', OLD.horario));
END */;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;

--
-- Table structure for table `medicamentos_prescritos`
--

DROP TABLE IF EXISTS `medicamentos_prescritos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `medicamentos_prescritos` (
  `idPrescricao` int(11) NOT NULL AUTO_INCREMENT,
  `nomeAnimal` varchar(255) NOT NULL,
  `medicamento` varchar(255) NOT NULL,
  `dataPrescricao` date NOT NULL,
  `dosagem` varchar(255) NOT NULL,
  PRIMARY KEY (`idPrescricao`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `medicamentos_prescritos`
--

LOCK TABLES `medicamentos_prescritos` WRITE;
/*!40000 ALTER TABLE `medicamentos_prescritos` DISABLE KEYS */;
INSERT INTO `medicamentos_prescritos` VALUES (1,'Bobby','Cefalexina','2023-08-11','500mg, 2x ao dia por 7 dias'),(2,'Mimi','Amoxicilina','2023-07-21','250mg, 2x ao dia por 10 dias'),(3,'Max','Meloxicam','2023-06-06','0.1mg/kg, 1x ao dia por 5 dias'),(4,'Luna','Prednisolona','2023-05-13','5mg, 1x ao dia por 7 dias'),(5,'Rex','Metronidazol','2023-04-23','20mg/kg, 2x ao dia por 7 dias'),(6,'Nina','Ciprofloxacina','2023-03-31','250mg, 2x ao dia por 5 dias'),(7,'Thor','Ranitidina','2023-02-19','2mg/kg, 2x ao dia por 5 dias');
/*!40000 ALTER TABLE `medicamentos_prescritos` ENABLE KEYS */;
UNLOCK TABLES;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = cp850 */ ;
/*!50003 SET character_set_results = cp850 */ ;
/*!50003 SET collation_connection  = cp850_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = '' */ ;
DELIMITER ;;
/*!50003 CREATE*/ /*!50017 DEFINER=`root`@`localhost`*/ /*!50003 TRIGGER after_medicamentos_prescritos_insert
AFTER INSERT ON medicamentos_prescritos
FOR EACH ROW
BEGIN
    INSERT INTO historico (data, hora, tipo, tabela, registro_id, descricao)
    VALUES (CURDATE(), CURTIME(), 'Adi��o', 'medicamentos_prescritos', NEW.idPrescricao, CONCAT('Medicamento prescrito: ', NEW.nomeAnimal));
END */;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = cp850 */ ;
/*!50003 SET character_set_results = cp850 */ ;
/*!50003 SET collation_connection  = cp850_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = '' */ ;
DELIMITER ;;
/*!50003 CREATE*/ /*!50017 DEFINER=`root`@`localhost`*/ /*!50003 TRIGGER after_medicamentos_prescritos_update
AFTER UPDATE ON medicamentos_prescritos
FOR EACH ROW
BEGIN
    INSERT INTO historico (data, hora, tipo, tabela, registro_id, descricao)
    VALUES (CURDATE(), CURTIME(), 'Altera��o', 'medicamentos_prescritos', OLD.idPrescricao, CONCAT('Medicamento alterado: ', OLD.nomeAnimal));
END */;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = cp850 */ ;
/*!50003 SET character_set_results = cp850 */ ;
/*!50003 SET collation_connection  = cp850_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = '' */ ;
DELIMITER ;;
/*!50003 CREATE*/ /*!50017 DEFINER=`root`@`localhost`*/ /*!50003 TRIGGER after_medicamentos_prescritos_delete
AFTER DELETE ON medicamentos_prescritos
FOR EACH ROW
BEGIN
    INSERT INTO historico (data, hora, tipo, tabela, registro_id, descricao)
    VALUES (CURDATE(), CURTIME(), 'Dele��o', 'medicamentos_prescritos', OLD.idPrescricao, CONCAT('Medicamento deletado: ', OLD.nomeAnimal));
END */;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;

--
-- Table structure for table `pacientes`
--

DROP TABLE IF EXISTS `pacientes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pacientes` (
  `idPaciente` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(100) NOT NULL,
  `especie` varchar(50) NOT NULL,
  `raca` varchar(50) NOT NULL,
  `idade` int(11) NOT NULL,
  `sexo` enum('Macho','Fêmea') NOT NULL,
  `proprietario` varchar(100) NOT NULL,
  `tutor_id` int(11) DEFAULT NULL,
  `idTutor` int(11) DEFAULT NULL,
  PRIMARY KEY (`idPaciente`),
  KEY `fk_tutor` (`tutor_id`),
  CONSTRAINT `fk_tutor` FOREIGN KEY (`tutor_id`) REFERENCES `tutores` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pacientes`
--

LOCK TABLES `pacientes` WRITE;
/*!40000 ALTER TABLE `pacientes` DISABLE KEYS */;
INSERT INTO `pacientes` VALUES (8,'Rex','Cão','Labrador',5,'Macho','Tutor',13,13),(9,'Mimi','Gato','Siamês',3,'Fêmea','Tutor',13,13),(10,'Bobby','Cão','Poodle',2,'Macho','Tutor',13,13),(11,'Luna','Cão','Beagle',4,'Fêmea','Tutor',13,13),(12,'Zeca','Gato','Persa',6,'Macho','Tutor',13,13);
/*!40000 ALTER TABLE `pacientes` ENABLE KEYS */;
UNLOCK TABLES;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = cp850 */ ;
/*!50003 SET character_set_results = cp850 */ ;
/*!50003 SET collation_connection  = cp850_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = '' */ ;
DELIMITER ;;
/*!50003 CREATE*/ /*!50017 DEFINER=`root`@`localhost`*/ /*!50003 TRIGGER after_pacientes_insert
AFTER INSERT ON pacientes
FOR EACH ROW
BEGIN
    INSERT INTO historico (data, hora, tipo, tabela, registro_id, descricao)
    VALUES (CURDATE(), CURTIME(), 'Adi��o', 'pacientes', NEW.idPaciente, CONCAT('Paciente adicionado: ', NEW.nome));
END */;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = cp850 */ ;
/*!50003 SET character_set_results = cp850 */ ;
/*!50003 SET collation_connection  = cp850_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = '' */ ;
DELIMITER ;;
/*!50003 CREATE*/ /*!50017 DEFINER=`root`@`localhost`*/ /*!50003 TRIGGER after_pacientes_update
AFTER UPDATE ON pacientes
FOR EACH ROW
BEGIN
    INSERT INTO historico (data, hora, tipo, tabela, registro_id, descricao)
    VALUES (CURDATE(), CURTIME(), 'Altera��o', 'pacientes', OLD.idPaciente, CONCAT('Paciente alterado de ', OLD.nome, ' para ', NEW.nome));
END */;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = cp850 */ ;
/*!50003 SET character_set_results = cp850 */ ;
/*!50003 SET collation_connection  = cp850_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = '' */ ;
DELIMITER ;;
/*!50003 CREATE*/ /*!50017 DEFINER=`root`@`localhost`*/ /*!50003 TRIGGER after_pacientes_delete
AFTER DELETE ON pacientes
FOR EACH ROW
BEGIN
    INSERT INTO historico (data, hora, tipo, tabela, registro_id, descricao)
    VALUES (CURDATE(), CURTIME(), 'Dele��o', 'pacientes', OLD.idPaciente, CONCAT('Paciente deletado: ', OLD.nome));
END */;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;

--
-- Table structure for table `pets`
--

DROP TABLE IF EXISTS `pets`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pets` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(100) NOT NULL,
  `especie` varchar(50) DEFAULT NULL,
  `tutor_id` int(11) DEFAULT NULL,
  `raca` varchar(100) DEFAULT NULL,
  `idade` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `tutor_id` (`tutor_id`),
  CONSTRAINT `pets_ibfk_1` FOREIGN KEY (`tutor_id`) REFERENCES `tutores` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pets`
--

LOCK TABLES `pets` WRITE;
/*!40000 ALTER TABLE `pets` DISABLE KEYS */;
INSERT INTO `pets` VALUES (1,'dadasd','adadsda',NULL,'beta',5),(4,'Bolota','Coelho',NULL,'teste',5),(5,'dadasd','adadsda',NULL,NULL,NULL),(7,'test','teste',NULL,NULL,NULL),(8,'test','teste',NULL,NULL,NULL),(9,'dada','dadad',NULL,NULL,NULL),(13,'Bobby','Cachorro',13,'Poodle',5),(14,'Luna','Cachorro',13,'Beagle',4),(15,'Zeca','Gato',13,'Persa',3),(16,'Victor','gay',NULL,'beta',5),(17,'teste','teste',NULL,'teste',7);
/*!40000 ALTER TABLE `pets` ENABLE KEYS */;
UNLOCK TABLES;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = cp850 */ ;
/*!50003 SET character_set_results = cp850 */ ;
/*!50003 SET collation_connection  = cp850_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = '' */ ;
DELIMITER ;;
/*!50003 CREATE*/ /*!50017 DEFINER=`root`@`localhost`*/ /*!50003 TRIGGER after_pet_insert
AFTER INSERT ON pets
FOR EACH ROW
BEGIN
    INSERT INTO historico (data, hora, tipo, tabela, registro_id, descricao)
    VALUES (CURDATE(), CURTIME(), 'Adi��o', 'pets', NEW.id, CONCAT('Pet adicionado: ', NEW.nome));
END */;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;

--
-- Table structure for table `tratamentos`
--

DROP TABLE IF EXISTS `tratamentos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tratamentos` (
  `idTratamento` int(11) NOT NULL AUTO_INCREMENT,
  `idPaciente` int(11) NOT NULL,
  `descricao` text NOT NULL,
  `data_inicio` date NOT NULL,
  `data_fim` date DEFAULT NULL,
  `status` enum('Em andamento','Concluído','Cancelado') NOT NULL,
  PRIMARY KEY (`idTratamento`),
  KEY `idPaciente` (`idPaciente`),
  CONSTRAINT `tratamentos_ibfk_1` FOREIGN KEY (`idPaciente`) REFERENCES `pacientes` (`idPaciente`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tratamentos`
--

LOCK TABLES `tratamentos` WRITE;
/*!40000 ALTER TABLE `tratamentos` DISABLE KEYS */;
INSERT INTO `tratamentos` VALUES (8,8,'Tratamento para alergia','2024-09-01',NULL,'Em andamento'),(9,9,'Vacinação contra raiva','2024-09-15','2024-09-20','Concluído'),(10,10,'Tratamento dental','2024-09-05','2024-09-10','Concluído'),(11,11,'Tratamento de pulgas','2024-09-12',NULL,'Em andamento'),(12,12,'Consulta veterinária geral','2024-09-20',NULL,'Em andamento');
/*!40000 ALTER TABLE `tratamentos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tutores`
--

DROP TABLE IF EXISTS `tutores`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tutores` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `clinica_id` int(11) DEFAULT NULL,
  `telefone` varchar(255) DEFAULT NULL,
  `endereco` varchar(255) DEFAULT NULL,
  `cidade` varchar(255) DEFAULT NULL,
  `estado` varchar(255) DEFAULT NULL,
  `cep` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`),
  KEY `clinica_id` (`clinica_id`),
  CONSTRAINT `tutores_ibfk_1` FOREIGN KEY (`clinica_id`) REFERENCES `clinicas` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tutores`
--

LOCK TABLES `tutores` WRITE;
/*!40000 ALTER TABLE `tutores` DISABLE KEYS */;
INSERT INTO `tutores` VALUES (13,'Tutor','tutor@gmail.com',7,'(11) 98765-4321','Rua dos Tutores, 123','São Paulo','SP','01234-567'),(14,'Eric','ebr876022@gmail.com',7,NULL,NULL,NULL,NULL,NULL),(15,'Teste novo tutor','testeeee@gmail.com',7,NULL,NULL,NULL,NULL,NULL);
/*!40000 ALTER TABLE `tutores` ENABLE KEYS */;
UNLOCK TABLES;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = cp850 */ ;
/*!50003 SET character_set_results = cp850 */ ;
/*!50003 SET collation_connection  = cp850_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = '' */ ;
DELIMITER ;;
/*!50003 CREATE*/ /*!50017 DEFINER=`root`@`localhost`*/ /*!50003 TRIGGER after_tutores_insert
AFTER INSERT ON tutores
FOR EACH ROW
BEGIN
    INSERT INTO historico (data, hora, tipo, tabela, registro_id, descricao)
    VALUES (CURDATE(), CURTIME(), 'Adi��o', 'tutores', NEW.id, CONCAT('Tutor adicionado: ', NEW.nome));
END */;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = cp850 */ ;
/*!50003 SET character_set_results = cp850 */ ;
/*!50003 SET collation_connection  = cp850_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = '' */ ;
DELIMITER ;;
/*!50003 CREATE*/ /*!50017 DEFINER=`root`@`localhost`*/ /*!50003 TRIGGER after_tutores_update
AFTER UPDATE ON tutores
FOR EACH ROW
BEGIN
    INSERT INTO historico (data, hora, tipo, tabela, registro_id, descricao)
    VALUES (CURDATE(), CURTIME(), 'Altera��o', 'tutores', OLD.id, CONCAT('Tutor alterado de ', OLD.nome, ' para ', NEW.nome));
END */;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = cp850 */ ;
/*!50003 SET character_set_results = cp850 */ ;
/*!50003 SET collation_connection  = cp850_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = '' */ ;
DELIMITER ;;
/*!50003 CREATE*/ /*!50017 DEFINER=`root`@`localhost`*/ /*!50003 TRIGGER after_tutores_delete
AFTER DELETE ON tutores
FOR EACH ROW
BEGIN
    INSERT INTO historico (data, hora, tipo, tabela, registro_id, descricao)
    VALUES (CURDATE(), CURTIME(), 'Dele��o', 'tutores', OLD.id, CONCAT('Tutor deletado: ', OLD.nome));
END */;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;

--
-- Table structure for table `usuarios`
--

DROP TABLE IF EXISTS `usuarios`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `senha` varchar(255) NOT NULL,
  `tipo` enum('tutor','veterinario') NOT NULL,
  `clinica_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`),
  KEY `clinica_id` (`clinica_id`),
  CONSTRAINT `usuarios_ibfk_1` FOREIGN KEY (`clinica_id`) REFERENCES `clinicas` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usuarios`
--

LOCK TABLES `usuarios` WRITE;
/*!40000 ALTER TABLE `usuarios` DISABLE KEYS */;
INSERT INTO `usuarios` VALUES (11,'Veterinario','veterinario@gmail.com','aaffc4b160630b68bcf9cee3ba63839e','veterinario',7),(12,'Tutor','tutor@gmail.com','aaffc4b160630b68bcf9cee3ba63839e','tutor',7),(13,'Eric','ebr876022@gmail.com','aaffc4b160630b68bcf9cee3ba63839e','tutor',7),(15,'ggmax','ggmax44@gmail.com','$2y$10$eW5uxJXlGg/WiRmlPc.O3u/RBBZGB7r9c1hTkG43xFkV2h5udCn7i','tutor',7),(17,'gay','novousuario@exemplo.com','e10adc3949ba59abbe56e057f20f883e','tutor',7),(18,'Teste novo tutor','testeeee@gmail.com','aaffc4b160630b68bcf9cee3ba63839e','tutor',7);
/*!40000 ALTER TABLE `usuarios` ENABLE KEYS */;
UNLOCK TABLES;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = cp850 */ ;
/*!50003 SET character_set_results = cp850 */ ;
/*!50003 SET collation_connection  = cp850_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = '' */ ;
DELIMITER ;;
/*!50003 CREATE*/ /*!50017 DEFINER=`root`@`localhost`*/ /*!50003 TRIGGER after_usuario_insert
AFTER INSERT ON usuarios
FOR EACH ROW
BEGIN
    INSERT INTO usuarios_perfil (id) VALUES (NEW.id);
END */;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = cp850 */ ;
/*!50003 SET character_set_results = cp850 */ ;
/*!50003 SET collation_connection  = cp850_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = '' */ ;
DELIMITER ;;
/*!50003 CREATE*/ /*!50017 DEFINER=`root`@`localhost`*/ /*!50003 TRIGGER after_usuario_delete
AFTER DELETE ON usuarios
FOR EACH ROW
BEGIN
    DELETE FROM usuarios_perfil WHERE id = OLD.id;
END */;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;

--
-- Table structure for table `usuarios_perfil`
--

DROP TABLE IF EXISTS `usuarios_perfil`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `usuarios_perfil` (
  `id` int(11) NOT NULL,
  `foto` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  CONSTRAINT `usuarios_perfil_ibfk_1` FOREIGN KEY (`id`) REFERENCES `usuarios` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usuarios_perfil`
--

LOCK TABLES `usuarios_perfil` WRITE;
/*!40000 ALTER TABLE `usuarios_perfil` DISABLE KEYS */;
INSERT INTO `usuarios_perfil` VALUES (15,NULL),(17,'uploads/download (4).jfif'),(18,NULL);
/*!40000 ALTER TABLE `usuarios_perfil` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `vacinas`
--

DROP TABLE IF EXISTS `vacinas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `vacinas` (
  `idVacina` int(11) NOT NULL AUTO_INCREMENT,
  `nomeVacina` varchar(255) NOT NULL,
  PRIMARY KEY (`idVacina`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `vacinas`
--

LOCK TABLES `vacinas` WRITE;
/*!40000 ALTER TABLE `vacinas` DISABLE KEYS */;
/*!40000 ALTER TABLE `vacinas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `veterinarios`
--

DROP TABLE IF EXISTS `veterinarios`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `veterinarios` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(100) DEFAULT NULL,
  `clinica_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `veterinarios`
--

LOCK TABLES `veterinarios` WRITE;
/*!40000 ALTER TABLE `veterinarios` DISABLE KEYS */;
INSERT INTO `veterinarios` VALUES (1,'Veterinario',7);
/*!40000 ALTER TABLE `veterinarios` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2024-11-26 11:16:17
