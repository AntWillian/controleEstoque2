-- MySQL dump 10.13  Distrib 5.7.17, for Win64 (x86_64)
--
-- Host: localhost    Database: db_estoque
-- ------------------------------------------------------
-- Server version	5.0.67-community-nt

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
-- Not dumping tablespaces as no INFORMATION_SCHEMA.FILES table on this server
--

--
-- Table structure for table `tbl_categoria`
--

DROP TABLE IF EXISTS `tbl_categoria`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_categoria` (
  `idCategoria` int(11) NOT NULL auto_increment,
  `nome` varchar(45) default NULL,
  `descricao` varchar(45) default NULL,
  PRIMARY KEY  (`idCategoria`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_categoria`
--

LOCK TABLES `tbl_categoria` WRITE;
/*!40000 ALTER TABLE `tbl_categoria` DISABLE KEYS */;
INSERT INTO `tbl_categoria` VALUES (1,'Bebida','produtos liquidos'),(2,'comidas','produtos nao liquidos');
/*!40000 ALTER TABLE `tbl_categoria` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_movimentacao`
--

DROP TABLE IF EXISTS `tbl_movimentacao`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_movimentacao` (
  `idMovimentacao` int(11) NOT NULL auto_increment,
  `idProduto` int(11) default NULL,
  `idTipoMovimentacao` int(11) default NULL,
  `idUsuario` int(11) default NULL,
  `descricao` varchar(255) default NULL,
  `quantidade` varchar(45) default NULL,
  `data` date default NULL,
  `mes` int(11) default NULL,
  PRIMARY KEY  (`idMovimentacao`),
  KEY `fk_movimentacao_produto_idx` (`idProduto`),
  KEY `fk_movimentacao_usuario_idx` (`idUsuario`),
  KEY `fk_movimentacao_tipo_idx` (`idTipoMovimentacao`),
  CONSTRAINT `fk_movimentacao_produto` FOREIGN KEY (`idProduto`) REFERENCES `tbl_produto` (`idProduto`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_movimentacao_tipo` FOREIGN KEY (`idTipoMovimentacao`) REFERENCES `tbl_tipomovimentacao` (`idTipoMovimentacao`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_movimentacao_usuario` FOREIGN KEY (`idUsuario`) REFERENCES `tbl_usuario` (`idUsuario`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_movimentacao`
--

LOCK TABLES `tbl_movimentacao` WRITE;
/*!40000 ALTER TABLE `tbl_movimentacao` DISABLE KEYS */;
INSERT INTO `tbl_movimentacao` VALUES (23,7,1,1,'venda para fornecedor','10','2018-06-29',6);
/*!40000 ALTER TABLE `tbl_movimentacao` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_nivel`
--

DROP TABLE IF EXISTS `tbl_nivel`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_nivel` (
  `idNivel` int(11) NOT NULL auto_increment,
  `nome` varchar(45) default NULL,
  PRIMARY KEY  (`idNivel`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_nivel`
--

LOCK TABLES `tbl_nivel` WRITE;
/*!40000 ALTER TABLE `tbl_nivel` DISABLE KEYS */;
INSERT INTO `tbl_nivel` VALUES (1,'Admim'),(2,'cataloguista');
/*!40000 ALTER TABLE `tbl_nivel` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_produto`
--

DROP TABLE IF EXISTS `tbl_produto`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_produto` (
  `idProduto` int(11) NOT NULL auto_increment,
  `codigo` varchar(45) default NULL,
  `descricao` varchar(255) default NULL,
  `preco` float(8,2) default NULL,
  `quantidade` varchar(45) default NULL,
  `idCategoria` int(11) default NULL,
  `imagen` varchar(255) default NULL,
  PRIMARY KEY  (`idProduto`),
  KEY `fk_produto_categoria_idx` (`idCategoria`),
  CONSTRAINT `fk_produto_categoria` FOREIGN KEY (`idCategoria`) REFERENCES `tbl_categoria` (`idCategoria`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_produto`
--

LOCK TABLES `tbl_produto` WRITE;
/*!40000 ALTER TABLE `tbl_produto` DISABLE KEYS */;
INSERT INTO `tbl_produto` VALUES (6,'45','Kit Fraldas Pampers Confort Sec Jumbo Tamanho G 152 Unidades',159.90,'65',1,'nada'),(7,'46','Smartphone Samsung Galaxy J7 Pro SM-J730 Preto Dual Chip Android 7.0 4G Wi-Fi 64GB',1249.00,'24',1,'nada');
/*!40000 ALTER TABLE `tbl_produto` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_tipomovimentacao`
--

DROP TABLE IF EXISTS `tbl_tipomovimentacao`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_tipomovimentacao` (
  `idTipoMovimentacao` int(11) NOT NULL auto_increment,
  `nome` varchar(45) default NULL,
  PRIMARY KEY  (`idTipoMovimentacao`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_tipomovimentacao`
--

LOCK TABLES `tbl_tipomovimentacao` WRITE;
/*!40000 ALTER TABLE `tbl_tipomovimentacao` DISABLE KEYS */;
INSERT INTO `tbl_tipomovimentacao` VALUES (1,'Saida'),(2,'Entrada');
/*!40000 ALTER TABLE `tbl_tipomovimentacao` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_usuario`
--

DROP TABLE IF EXISTS `tbl_usuario`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_usuario` (
  `idUsuario` int(11) NOT NULL auto_increment,
  `nome` varchar(255) default NULL,
  `cpf` varchar(45) default NULL,
  `senha` varchar(45) default NULL,
  `dtnasc` varchar(45) default NULL,
  `idNivel` int(11) default NULL,
  `usuario` varchar(45) default NULL,
  PRIMARY KEY  (`idUsuario`),
  KEY `fk_usuario_nivel_idx` (`idNivel`),
  CONSTRAINT `fk_usuario_nivel` FOREIGN KEY (`idNivel`) REFERENCES `tbl_nivel` (`idNivel`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_usuario`
--

LOCK TABLES `tbl_usuario` WRITE;
/*!40000 ALTER TABLE `tbl_usuario` DISABLE KEYS */;
INSERT INTO `tbl_usuario` VALUES (1,'antonio','46474926805','12345','2018-06-13',NULL,'ttt'),(2,'Henrique otremba dos santo','888.888.888-88','1234','2018-06-14',1,'hhh'),(3,'Henrique otremba dos santo','46474926805','12345','',1,'Henrique');
/*!40000 ALTER TABLE `tbl_usuario` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Temporary view structure for view `view_movimentacoes`
--

DROP TABLE IF EXISTS `view_movimentacoes`;
/*!50001 DROP VIEW IF EXISTS `view_movimentacoes`*/;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
/*!50001 CREATE 
 
VIEW `view_movimentacoes` AS
    SELECT 
        `m`.`idMovimentacao` AS `idMovimentacao`,
        `m`.`descricao` AS `descricao`,
        `m`.`quantidade` AS `quantidadeMovimentacao`,
        `m`.`data` AS `data`,
        `m`.`mes` AS `mes`,
        `u`.`idUsuario` AS `idUsuario`,
        `u`.`nome` AS `nome`,
        `p`.`idProduto` AS `idProduto`,
        `p`.`codigo` AS `codigo`,
        `p`.`descricao` AS `descricaoProduto`,
        `p`.`preco` AS `preco`,
        `p`.`quantidade` AS `quantidade`,
        `p`.`idCategoria` AS `idCategoria`,
        `p`.`imagen` AS `imagen`,
        `tm`.`idTipoMovimentacao` AS `idTipoMovimentacao`,
        `tm`.`nome` AS `tipo`
    FROM
        (((`db_estoque`.`tbl_movimentacao` `m`
        JOIN `db_estoque`.`tbl_usuario` `u` ON ((`m`.`idUsuario` = `u`.`idUsuario`)))
        JOIN `db_estoque`.`tbl_produto` `p` ON ((`p`.`idProduto` = `m`.`idProduto`)))
        JOIN `db_estoque`.`tbl_tipomovimentacao` `tm` ON ((`tm`.`idTipoMovimentacao` = `m`.`idTipoMovimentacao`)))*/;
SET character_set_client = @saved_cs_client;

--
-- Final view structure for view `view_movimentacoes`
--

/*!50001 DROP VIEW IF EXISTS `view_movimentacoes`*/;
/*!50001 CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_movimentacoes` AS select `m`.`idMovimentacao` AS `idMovimentacao`,`m`.`descricao` AS `descricao`,`m`.`quantidade` AS `quantidadeMovimentacao`,`m`.`data` AS `data`,`m`.`mes` AS `mes`,`u`.`idUsuario` AS `idUsuario`,`u`.`nome` AS `nome`,`p`.`idProduto` AS `idProduto`,`p`.`codigo` AS `codigo`,`p`.`descricao` AS `descricaoProduto`,`p`.`preco` AS `preco`,`p`.`quantidade` AS `quantidade`,`p`.`idCategoria` AS `idCategoria`,`p`.`imagen` AS `imagen`,`tm`.`idTipoMovimentacao` AS `idTipoMovimentacao`,`tm`.`nome` AS `tipo` from (((`tbl_movimentacao` `m` join `tbl_usuario` `u` on((`m`.`idUsuario` = `u`.`idUsuario`))) join `tbl_produto` `p` on((`p`.`idProduto` = `m`.`idProduto`))) join `tbl_tipomovimentacao` `tm` on((`tm`.`idTipoMovimentacao` = `m`.`idTipoMovimentacao`))) */;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2018-06-29  1:22:25
