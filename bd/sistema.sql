-- MySQL dump 10.13  Distrib 5.7.10, for Win64 (x86_64)
--
-- Host: 127.0.0.1    Database: ventas
-- ------------------------------------------------------
-- Server version	5.5.5-10.4.20-MariaDB

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
-- Table structure for table `articulo`
--

DROP TABLE IF EXISTS `articulo`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `articulo` (
  `idarticulo` int(11) NOT NULL AUTO_INCREMENT,
  `id_categoria` int(11) NOT NULL,
  `codigo` varchar(50) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `precio_venta` decimal(11,2) NOT NULL,
  `stock` int(11) NOT NULL,
  `descripcion` varchar(255) NOT NULL,
  `imagen` varchar(20) DEFAULT NULL,
  `estado` bit(1) DEFAULT NULL,
  PRIMARY KEY (`idarticulo`),
  KEY `id_categoria` (`id_categoria`),
  CONSTRAINT `articulo_ibfk_1` FOREIGN KEY (`id_categoria`) REFERENCES `categoria` (`idcategoria`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `articulo`
--

LOCK TABLES `articulo` WRITE;
/*!40000 ALTER TABLE `articulo` DISABLE KEYS */;
INSERT INTO `articulo` VALUES (1,1,'1212','Asus',14000.00,5,'Asus Rog Strix G15','no',''),(2,2,'3434','DELL',9000.00,5,'DELL curvo 120 HZ','no',''),(17,1,'01001','Teclado Logitech ',900.00,7,'Teclados para computadoras','no',''),(20,3,'01001','Bocina JBL',900.00,3,'Bocina','no','');
/*!40000 ALTER TABLE `articulo` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `categoria`
--

DROP TABLE IF EXISTS `categoria`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `categoria` (
  `idcategoria` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) NOT NULL,
  `descripcion` varchar(255) NOT NULL,
  `estado` bit(1) DEFAULT NULL,
  PRIMARY KEY (`idcategoria`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `categoria`
--

LOCK TABLES `categoria` WRITE;
/*!40000 ALTER TABLE `categoria` DISABLE KEYS */;
INSERT INTO `categoria` VALUES (1,'Laptops','Computadoras portatiles',''),(2,'Monitores','Pantallas',''),(3,'Audio','Bocinas y audifonos',''),(7,'Laptos Pro ','Laptos orientada a profesionales','');
/*!40000 ALTER TABLE `categoria` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `contenedor`
--

DROP TABLE IF EXISTS `contenedor`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `contenedor` (
  `idcontenedor` int(11) NOT NULL AUTO_INCREMENT,
  `fecha_arrivo` datetime DEFAULT NULL,
  `aereopuerto_destino` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`idcontenedor`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `contenedor`
--

LOCK TABLES `contenedor` WRITE;
/*!40000 ALTER TABLE `contenedor` DISABLE KEYS */;
/*!40000 ALTER TABLE `contenedor` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `detalle_ingreso`
--

DROP TABLE IF EXISTS `detalle_ingreso`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `detalle_ingreso` (
  `iddetalle_ingreso` int(11) NOT NULL AUTO_INCREMENT,
  `id_ingreso` int(11) NOT NULL,
  `id_articulo` int(11) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `precio` decimal(11,2) DEFAULT NULL,
  `caja` int(11) DEFAULT NULL,
  `total_c` int(11) DEFAULT NULL,
  PRIMARY KEY (`iddetalle_ingreso`),
  KEY `id_articulo` (`id_articulo`),
  KEY `id_ingreso` (`id_ingreso`),
  CONSTRAINT `detalle_ingreso_ibfk_1` FOREIGN KEY (`id_articulo`) REFERENCES `articulo` (`idarticulo`),
  CONSTRAINT `detalle_ingreso_ibfk_2` FOREIGN KEY (`id_ingreso`) REFERENCES `ingreso` (`idingreso`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `detalle_ingreso`
--

LOCK TABLES `detalle_ingreso` WRITE;
/*!40000 ALTER TABLE `detalle_ingreso` DISABLE KEYS */;
INSERT INTO `detalle_ingreso` VALUES (1,1,1,5,1200.00,0,5),(2,2,2,5,7000.00,0,5),(3,1,1,2,50.00,2,4),(4,6,1,2,50.00,2,4);
/*!40000 ALTER TABLE `detalle_ingreso` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `detalle_venta`
--

DROP TABLE IF EXISTS `detalle_venta`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `detalle_venta` (
  `iddetalle_venta` int(11) NOT NULL AUTO_INCREMENT,
  `id_venta` int(11) NOT NULL,
  `id_articulo` int(11) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `precio` decimal(11,2) NOT NULL,
  `descuento` decimal(11,2) NOT NULL,
  PRIMARY KEY (`iddetalle_venta`),
  KEY `id_articulo` (`id_articulo`),
  KEY `id_venta` (`id_venta`),
  CONSTRAINT `detalle_venta_ibfk_1` FOREIGN KEY (`id_articulo`) REFERENCES `articulo` (`idarticulo`),
  CONSTRAINT `detalle_venta_ibfk_2` FOREIGN KEY (`id_venta`) REFERENCES `venta` (`idventa`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `detalle_venta`
--

LOCK TABLES `detalle_venta` WRITE;
/*!40000 ALTER TABLE `detalle_venta` DISABLE KEYS */;
/*!40000 ALTER TABLE `detalle_venta` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ingreso`
--

DROP TABLE IF EXISTS `ingreso`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ingreso` (
  `idingreso` int(11) NOT NULL AUTO_INCREMENT,
  `idproveedor` int(11) NOT NULL,
  `idusuario` int(11) NOT NULL,
  `tipo_comprobante` varchar(20) DEFAULT NULL,
  `serie_comprobante` varchar(7) DEFAULT NULL,
  `num_comprobante` varchar(10) DEFAULT NULL,
  `fecha` datetime NOT NULL,
  `impuesto` decimal(4,2) DEFAULT NULL,
  `total` decimal(11,2) DEFAULT NULL,
  `estado` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`idingreso`),
  KEY `idproveedor` (`idproveedor`),
  KEY `idusuario` (`idusuario`),
  CONSTRAINT `ingreso_ibfk_1` FOREIGN KEY (`idproveedor`) REFERENCES `persona` (`idpersona`),
  CONSTRAINT `ingreso_ibfk_2` FOREIGN KEY (`idusuario`) REFERENCES `usuarios` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ingreso`
--

LOCK TABLES `ingreso` WRITE;
/*!40000 ALTER TABLE `ingreso` DISABLE KEYS */;
INSERT INTO `ingreso` VALUES (1,1,9,'Factura','3130141','3130141081','2022-11-11 00:00:00',0.12,60000.00,'Recibido'),(2,1,9,'Vale','3130141','3130141081','2022-12-11 00:00:00',0.12,35000.00,'Recibido'),(6,1,9,'Factura','1234','1234','2022-11-11 12:00:00',0.12,200.00,NULL),(7,1,9,'Factura','1234','1234','2022-11-11 12:00:00',0.12,200.00,NULL);
/*!40000 ALTER TABLE `ingreso` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `persona`
--

DROP TABLE IF EXISTS `persona`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `persona` (
  `idpersona` int(11) NOT NULL AUTO_INCREMENT,
  `tipo_persona` varchar(20) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `tipo_documento` varchar(20) NOT NULL,
  `num_documento` varchar(20) NOT NULL,
  `direccion` varchar(70) NOT NULL,
  `telefono` varchar(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  PRIMARY KEY (`idpersona`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `persona`
--

LOCK TABLES `persona` WRITE;
/*!40000 ALTER TABLE `persona` DISABLE KEYS */;
INSERT INTO `persona` VALUES (1,'Proveedor','Manuel','DPI','3130141081410','2 AV','4807-0052','Manuel@gmail.com'),(3,'Cliente','Oliver','DPI','3130141081411','4 AV','6029-2274','Oliver@gmailc.om'),(5,'Proveedor','Jose','DPI','3130141081410','3 AV','5918-1170','Jose@gmail.com'),(6,'Cliente','Fernando','DPI','3130141081411','4 AV','6029-2274','Oliver@gmailc.om'),(11,'Proveedor','santiago','DPI','12345678','3AV',' 50233811762','pu201497@uvg.edu.gt'),(12,'Cliente','santiago','DPI','12345678','3AV',' 50233811762','pu201497@uvg.edu.gt');
/*!40000 ALTER TABLE `persona` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `role`
--

DROP TABLE IF EXISTS `role`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `role` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) NOT NULL,
  `estado` char(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `role`
--

LOCK TABLES `role` WRITE;
/*!40000 ALTER TABLE `role` DISABLE KEYS */;
INSERT INTO `role` VALUES (1,'ADMIN','A'),(2,'SUPERVISOR','A'),(3,'GERENTE DE TIENDA','A'),(4,'ASESOR DE VENTAS','A');
/*!40000 ALTER TABLE `role` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `usuarios`
--

DROP TABLE IF EXISTS `usuarios`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(150) NOT NULL,
  `apellido` varchar(150) NOT NULL,
  `edad` int(11) DEFAULT NULL,
  `usuario` varchar(20) NOT NULL,
  `clave` varchar(200) NOT NULL,
  `dpi` varchar(13) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `telefono` varchar(25) DEFAULT NULL,
  `estado` char(1) DEFAULT NULL,
  `role_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_role` (`role_id`),
  CONSTRAINT `fk_role` FOREIGN KEY (`role_id`) REFERENCES `role` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usuarios`
--

LOCK TABLES `usuarios` WRITE;
/*!40000 ALTER TABLE `usuarios` DISABLE KEYS */;
INSERT INTO `usuarios` VALUES (9,'Santiago','Pu',20,'Admin','123456','3130141081409','selvin.san90@gmail.com','4807-0052','A',1),(10,'Selvin Santiago ','chiguil',22,'Santiago','12345','3130141081409','Pu201497@uvg.edu.gt','4807-0052','A',3);
/*!40000 ALTER TABLE `usuarios` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `venta`
--

DROP TABLE IF EXISTS `venta`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `venta` (
  `idventa` int(11) NOT NULL AUTO_INCREMENT,
  `id_cliente` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `tipo_comprobante` varchar(20) NOT NULL,
  `serie_comprobante` varchar(7) NOT NULL,
  `num_comprobante` varchar(10) NOT NULL,
  `impuesto` decimal(4,2) DEFAULT NULL,
  `total` decimal(11,2) DEFAULT NULL,
  `estado` varchar(20) DEFAULT NULL,
  `id_contenedor` int(11) NOT NULL,
  PRIMARY KEY (`idventa`),
  KEY `id_cliente` (`id_cliente`),
  KEY `id_usuario` (`id_usuario`),
  KEY `id_contenedor` (`id_contenedor`),
  CONSTRAINT `venta_ibfk_1` FOREIGN KEY (`id_cliente`) REFERENCES `persona` (`idpersona`),
  CONSTRAINT `venta_ibfk_2` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`role_id`),
  CONSTRAINT `venta_ibfk_3` FOREIGN KEY (`id_contenedor`) REFERENCES `contenedor` (`idcontenedor`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `venta`
--

LOCK TABLES `venta` WRITE;
/*!40000 ALTER TABLE `venta` DISABLE KEYS */;
/*!40000 ALTER TABLE `venta` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2022-02-11 12:48:13
