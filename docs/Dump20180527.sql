-- MySQL dump 10.13  Distrib 5.7.22, for Linux (x86_64)
--
-- Host: localhost    Database: esmalteria_estrela
-- ------------------------------------------------------
-- Server version	5.7.22-0ubuntu0.16.04.1

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
-- Table structure for table `administrator`
--

DROP TABLE IF EXISTS `administrator`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `administrator` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `senha` text CHARACTER SET latin1 NOT NULL,
  `email` varchar(100) CHARACTER SET latin1 NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `index2` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `administrator`
--

LOCK TABLES `administrator` WRITE;
/*!40000 ALTER TABLE `administrator` DISABLE KEYS */;
INSERT INTO `administrator` VALUES (1,'e10adc3949ba59abbe56e057f20f883e','admin@gmail.com');
/*!40000 ALTER TABLE `administrator` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `agendamento`
--

DROP TABLE IF EXISTS `agendamento`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `agendamento` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `id_cliente` int(11) unsigned NOT NULL,
  `atendente_servico_id` int(10) unsigned DEFAULT NULL,
  `status_id` int(10) unsigned DEFAULT NULL,
  `data` date NOT NULL,
  `turno` mediumtext CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `horario` time DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id_UNIQUE` (`id`),
  KEY `fk_agendamento_1_idx` (`id_cliente`),
  KEY `fk_agendamento_1_idx1` (`status_id`),
  KEY `fk_agendamento_3_idx` (`atendente_servico_id`),
  KEY `index6` (`atendente_servico_id`,`data`,`horario`),
  CONSTRAINT `fk_agendamento_1` FOREIGN KEY (`status_id`) REFERENCES `status` (`id`),
  CONSTRAINT `fk_agendamento_2` FOREIGN KEY (`id_cliente`) REFERENCES `customers` (`id`),
  CONSTRAINT `fk_agendamento_3` FOREIGN KEY (`atendente_servico_id`) REFERENCES `atendentes_servicos` (`id`) ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `agendamento`
--

LOCK TABLES `agendamento` WRITE;
/*!40000 ALTER TABLE `agendamento` DISABLE KEYS */;
INSERT INTO `agendamento` VALUES (1,1,2,3,'2018-05-26','V','16:18:05'),(2,3,2,3,'2018-01-06','V','17:03:00'),(3,4,2,2,'2018-02-14','V','17:30:00'),(4,3,2,1,'2018-05-27','M','08:00:00');
/*!40000 ALTER TABLE `agendamento` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `atendentes`
--

DROP TABLE IF EXISTS `atendentes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `atendentes` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `nome` varchar(100) CHARACTER SET latin1 NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `index2` (`nome`),
  UNIQUE KEY `id_UNIQUE` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `atendentes`
--

LOCK TABLES `atendentes` WRITE;
/*!40000 ALTER TABLE `atendentes` DISABLE KEYS */;
INSERT INTO `atendentes` VALUES (5,'Felipe Macedo'),(6,'Ingrid Moreira'),(3,'Kátia Dourado'),(1,'Mariana Lacerda'),(7,'Mariana Rodrigues'),(4,'Paula Ribeiro'),(2,'Yasmin Brasil');
/*!40000 ALTER TABLE `atendentes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `atendentes_servicos`
--

DROP TABLE IF EXISTS `atendentes_servicos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `atendentes_servicos` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `atendente_id` int(10) unsigned NOT NULL,
  `servico_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `index4` (`atendente_id`,`servico_id`) USING BTREE,
  KEY `fk_atendentes_servicos_1_idx` (`atendente_id`),
  KEY `fk_atendentes_servicos_2_idx` (`servico_id`),
  CONSTRAINT `fk_atendentes_servicos_1` FOREIGN KEY (`atendente_id`) REFERENCES `atendentes` (`id`) ON UPDATE NO ACTION,
  CONSTRAINT `fk_atendentes_servicos_2` FOREIGN KEY (`servico_id`) REFERENCES `servicos` (`id`) ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `atendentes_servicos`
--

LOCK TABLES `atendentes_servicos` WRITE;
/*!40000 ALTER TABLE `atendentes_servicos` DISABLE KEYS */;
INSERT INTO `atendentes_servicos` VALUES (1,1,1),(2,1,2),(3,1,3),(4,2,1),(5,2,2),(6,2,3),(12,7,1),(10,7,2),(13,7,3),(15,7,4),(8,7,5),(9,7,6),(14,7,7),(11,7,8),(7,7,9);
/*!40000 ALTER TABLE `atendentes_servicos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `customers`
--

DROP TABLE IF EXISTS `customers`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `customers` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `nome` varchar(45) CHARACTER SET latin1 NOT NULL,
  `sobrenome` varchar(45) CHARACTER SET latin1 NOT NULL,
  `telefone` varchar(15) CHARACTER SET latin1 NOT NULL,
  `nascimento` date NOT NULL,
  `senha` varchar(32) CHARACTER SET latin1 NOT NULL,
  `email` varchar(45) CHARACTER SET latin1 NOT NULL,
  `cep` varchar(8) CHARACTER SET latin1 NOT NULL,
  `rua` varchar(45) CHARACTER SET latin1 NOT NULL,
  `bairro` varchar(45) CHARACTER SET latin1 NOT NULL,
  `cidade` varchar(45) CHARACTER SET latin1 NOT NULL,
  `uf` varchar(2) CHARACTER SET latin1 NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `index2` (`email`),
  UNIQUE KEY `id_UNIQUE` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `customers`
--

LOCK TABLES `customers` WRITE;
/*!40000 ALTER TABLE `customers` DISABLE KEYS */;
INSERT INTO `customers` VALUES (1,'Rodrigo','Garrido','71993916524','1996-09-22','1234','rodrigogarrido72@gmail.com','41213000','Avenida Ulysses Guimarães','Sussuarana','Salvador','BA'),(3,'Joelson','Braga','71996798796','1985-02-01','123456','joelsonbraga@gmail.com','41207205','Rua Tauane Freitas','Tancredo Neves','Salvador','BA'),(4,'Pedro','Carlos','71999990390','2018-12-05','1234','igor@igor.com','40285000','Avenida Dom João VI','Brotas','Salvador','BA');
/*!40000 ALTER TABLE `customers` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `servicos`
--

DROP TABLE IF EXISTS `servicos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `servicos` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `nome` varchar(100) CHARACTER SET latin1 NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `index2` (`nome`),
  UNIQUE KEY `id_UNIQUE` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `servicos`
--

LOCK TABLES `servicos` WRITE;
/*!40000 ALTER TABLE `servicos` DISABLE KEYS */;
INSERT INTO `servicos` VALUES (9,'Alongamento de Unhas'),(5,'Depilação com cera'),(6,'Depilação com Linha'),(2,'Mão'),(8,'Massagens'),(1,'Pé'),(3,'Pé e Mão'),(7,'Podologia'),(4,'Spa dos Pés');
/*!40000 ALTER TABLE `servicos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `status`
--

DROP TABLE IF EXISTS `status`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `status` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `nome` varchar(100) CHARACTER SET latin1 NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `index2` (`nome`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `status`
--

LOCK TABLES `status` WRITE;
/*!40000 ALTER TABLE `status` DISABLE KEYS */;
INSERT INTO `status` VALUES (3,'Cancelado'),(2,'Confirmado'),(1,'Pendente');
/*!40000 ALTER TABLE `status` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2018-05-27 18:06:26
