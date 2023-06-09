-- MySQL dump 10.13  Distrib 8.0.32, for Win64 (x86_64)
--
-- Host: 127.0.0.1    Database: braceletsmazahua
-- ------------------------------------------------------
-- Server version	8.0.31

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Dumping data for table `categoriaproducto`
--

LOCK TABLES `categoriaproducto` WRITE;
/*!40000 ALTER TABLE `categoriaproducto` DISABLE KEYS */;
INSERT INTO `categoriaproducto` VALUES (3,'Anillos'),(10,'Brazaletes'),(6,'Broches'),(9,'Broches para el Cabello'),(2,'Collares'),(7,'Gargantillas'),(4,'Pendientes'),(1,'Pulseras'),(5,'Relojes'),(8,'Tobilleras');
/*!40000 ALTER TABLE `categoriaproducto` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `cliente`
--

LOCK TABLES `cliente` WRITE;
/*!40000 ALTER TABLE `cliente` DISABLE KEYS */;
INSERT INTO `cliente` VALUES (1,'John Doe','Smith',25,'1234567890','johndoe@example.com',3,2),(2,'Jane Smith','Johnson',30,'2345678901',NULL,3,2),(3,'Michael Johnson','Brown',35,'3456789012','michaeljohnson@example.com',5,5),(4,'Emily Davis','Miller',40,'4567890123','emilydavis@example.com',1,1),(5,'Daniel Wilson','Jones',45,'5678901234',NULL,2,2),(6,'Olivia Taylor','Clark',50,'6789012345','oliviataylor@example.com',3,3),(7,'William Anderson','White',55,'7890123456',NULL,2,2),(8,'Sophia Jackson','Smith',60,'8901234567','sophiajackson@example.com',1,1),(9,'James Harris','Thompson',65,'9012345678',NULL,5,1),(10,'Mia Lee','Davis',70,'0123456789','miale@example.com',1,1);
/*!40000 ALTER TABLE `cliente` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `entrega`
--

LOCK TABLES `entrega` WRITE;
/*!40000 ALTER TABLE `entrega` DISABLE KEYS */;
INSERT INTO `entrega` VALUES (1,'Pick up',NULL,'Brown Michael Johnson','3456789012','2023-06-22','22:35:00',NULL);
/*!40000 ALTER TABLE `entrega` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `metodopagoutilizado`
--

LOCK TABLES `metodopagoutilizado` WRITE;
/*!40000 ALTER TABLE `metodopagoutilizado` DISABLE KEYS */;
INSERT INTO `metodopagoutilizado` VALUES (1,'Efectivo',24),(2,'Depósito',0),(3,'Tarjeta',2);
/*!40000 ALTER TABLE `metodopagoutilizado` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `pedido`
--

LOCK TABLES `pedido` WRITE;
/*!40000 ALTER TABLE `pedido` DISABLE KEYS */;
/*!40000 ALTER TABLE `pedido` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `pedidocompletado`
--

LOCK TABLES `pedidocompletado` WRITE;
/*!40000 ALTER TABLE `pedidocompletado` DISABLE KEYS */;
INSERT INTO `pedidocompletado` VALUES (2,'Brown Michael Johnson','Brown Michael Johnson','3456789012','Domicilio',NULL,'Efectivo',NULL,'Calle del Parque',NULL,'Colonia Jardín','678','105','78901','2023-06-04','19:33:00',12,939.88,469.94,'2023-06-04 19:31:47'),(3,'Brown Michael Johnson','Brown Michael Johnson','3456789012','Pick up',NULL,'Tarjeta','Tarjeta que termina en 63','',NULL,'',NULL,NULL,'','2023-06-04','19:33:00',3,137.97,68.99,'2023-06-04 19:37:52'),(4,'Brown Michael Johnson','Brown Michael Johnson','3456789012','Domicilio',NULL,'Tarjeta','Tarjeta que termina en 63','Calle del Puente','Calle del Bosque','Colonia Cascada','901','106','90123','2023-06-04','19:33:00',5,75.95,37.98,'2023-06-04 19:37:57'),(5,'Brown Michael Johnson','Brown Michael Johnson','3456789012','Pick up',NULL,'Efectivo',NULL,'',NULL,'',NULL,NULL,'','2023-06-04','19:34:00',1,49.99,25.00,'2023-05-01 00:00:00'),(6,'Brown Michael Johnson','Brown Michael Johnson','3456789012','Pick up',NULL,'Efectivo',NULL,'',NULL,'',NULL,NULL,'','2023-06-04','19:34:00',3,159.97,79.99,'2023-05-01 00:00:00'),(7,'Clark Olivia Taylor','Clark Olivia Taylor','6789012345','Pick up',NULL,'Efectivo',NULL,'',NULL,'',NULL,NULL,'','2023-06-04','19:36:00',7,127.93,63.97,'2023-05-01 00:00:00'),(8,'Clark Olivia Taylor','Clark Olivia Taylor','6789012345','Pick up',NULL,'Efectivo',NULL,'',NULL,'',NULL,NULL,'','2023-06-04','19:37:00',7,389.93,194.97,'2023-04-01 00:00:00'),(9,'Clark Olivia Taylor','Clark Olivia Taylor','6789012345','Domicilio',NULL,'Efectivo',NULL,'Avenida del Mar',NULL,'Colonia Océano',NULL,NULL,'67890','2023-06-04','19:37:00',1,79.99,40.00,'2023-04-01 00:00:00'),(10,'Thompson James Harris','Thompson James Harris','9012345678','Pick up',NULL,'Efectivo',NULL,'',NULL,'',NULL,NULL,'','2023-06-04','19:42:00',8,372.92,186.46,'2023-04-01 00:00:00'),(11,'Smith John Doe','Smith John Doe','1234567890','Pick up',NULL,'Efectivo',NULL,'',NULL,'',NULL,NULL,'','2023-06-04','19:42:00',7,492.93,246.47,'2023-03-01 00:00:00'),(12,'Jones Daniel Wilson','Jones Daniel Wilson','5678901234','Pick up',NULL,'Efectivo',NULL,'',NULL,'',NULL,NULL,'','2023-06-04','19:44:00',9,110.91,55.46,'2023-03-01 00:00:00'),(13,'Smith Sophia Jackson','Smith Sophia Jackson','8901234567','Pick up',NULL,'Efectivo',NULL,'',NULL,'',NULL,NULL,'','2023-06-04','19:44:00',12,709.88,354.94,'2023-03-01 00:00:00'),(14,'Davis Mia Lee','Davis Mia Lee','0123456789','Pick up',NULL,'Efectivo',NULL,'',NULL,'',NULL,NULL,'','2023-06-04','19:44:00',10,129.90,64.95,'2023-02-01 00:00:00'),(15,'White William Anderson','White William Anderson','7890123456','Domicilio',NULL,'Efectivo',NULL,'Avenida del Puente','Calle de la Fuente, Calle del Parque','Colonia Río',NULL,NULL,'01234','2023-06-04','19:45:00',13,1034.87,517.44,'2023-02-01 00:00:00'),(16,'Miller Emily Davis','Miller Emily Davis','4567890123','Pick up',NULL,'Efectivo',NULL,'',NULL,'',NULL,NULL,'','2023-06-04','19:45:00',18,1410.82,705.41,'2023-02-01 00:00:00'),(17,'Johnson Jane Smith','Johnson Jane Smith','2345678901','Aplicación','Uber','Efectivo',NULL,'Calle del Río','Calle del Puente, Calle del Camino','Colonia Invierno','789','102','45678','2023-06-04','19:47:00',28,1708.72,854.36,'2023-02-01 00:00:00'),(18,'Smith John Doe','Smith John Doe','1234567890','Pick up',NULL,'Efectivo',NULL,'',NULL,'',NULL,NULL,'','2023-06-04','19:49:00',1,69.99,35.00,'2023-01-01 00:00:00'),(19,'White William Anderson','White William Anderson','7890123456','Aplicación','Didi','Efectivo',NULL,'Calle del Lago',NULL,'Colonia Puerto','345','115','90123','2023-06-04','19:49:00',6,122.94,61.47,'2023-01-01 00:00:00'),(20,'Johnson Jane Smith','Johnson Jane Smith','2345678901','Pick up',NULL,'Efectivo',NULL,'',NULL,'',NULL,NULL,'','2023-06-04','19:50:00',1,69.99,35.00,'2023-01-01 00:00:00'),(27,'Jones Daniel Wilson','Jones Daniel Wilson','5678901234','Domicilio',NULL,'Efectivo',NULL,'Calle del Mirador',NULL,'Colonia Montaña','123','110','34567','2023-06-04','19:52:00',29,3349.71,1674.86,'2022-12-01 00:00:00');
/*!40000 ALTER TABLE `pedidocompletado` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `pedidoproducto`
--

LOCK TABLES `pedidoproducto` WRITE;
/*!40000 ALTER TABLE `pedidoproducto` DISABLE KEYS */;
/*!40000 ALTER TABLE `pedidoproducto` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `pedidosrelacion`
--

LOCK TABLES `pedidosrelacion` WRITE;
/*!40000 ALTER TABLE `pedidosrelacion` DISABLE KEYS */;
INSERT INTO `pedidosrelacion` VALUES (1,26,20);
/*!40000 ALTER TABLE `pedidosrelacion` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `producto`
--

LOCK TABLES `producto` WRITE;
/*!40000 ALTER TABLE `producto` DISABLE KEYS */;
INSERT INTO `producto` VALUES (1,'Pulsera de Cuero',1,29.99,23),(2,'Pulsera de Perlas',1,39.99,8),(3,'Pulsera de Plata',1,49.99,42),(4,'Collar de Plata',2,79.99,36),(5,'Collar de Cuentas',2,59.99,14),(6,'Collar de Piedras Naturales',2,89.99,21),(7,'Collar de Oro',2,99.99,3),(8,'Anillo de Plata',3,69.99,17),(9,'Anillo de Oro',3,99.99,50),(10,'Anillo con Diamante',3,199.99,1),(11,'Anillo de Compromiso',3,149.99,9),(12,'Anillo de Acero',3,49.99,27),(13,'Pendientes de Plata',4,39.99,19),(14,'Pendientes de Perlas',4,49.99,5),(15,'Pendientes de Diamantes',4,299.99,2),(16,'Reloj Analógico',5,89.99,11),(17,'Reloj Digital',5,49.99,28),(18,'Reloj Deportivo',5,99.99,5),(19,'Reloj de Lujo',5,199.99,50),(20,'Reloj Inteligente',5,149.99,33),(21,'Broche de Mariposa',6,19.99,50),(22,'Broche de Flor',6,14.99,37),(23,'Broche de Hoja',6,12.99,15),(24,'Broche de Corazón',6,24.99,2),(25,'Broche de Perla',6,17.99,6),(26,'Gargantilla de Plata',7,69.99,4),(27,'Gargantilla de Oro',7,99.99,2),(28,'Gargantilla con Colgante',7,79.99,6),(29,'Gargantilla de Cuentas',7,49.99,5),(30,'Tobillera de Plata',8,29.99,7),(31,'Tobillera de Cuentas',8,24.99,5),(32,'Tobillera de Perlas',8,34.99,3),(33,'Tobillera de Acero',8,19.99,4),(34,'Tobillera de Oro',8,39.99,2),(35,'Broche de Fresa',9,9.99,10),(36,'Broche de Margarita',9,7.99,8),(37,'Broche de Lazo',9,6.99,5),(38,'Broche de Estrella',9,12.99,3),(39,'Broche de Diamante',9,11.99,6),(40,'Brazalete de Plata',10,49.99,6),(41,'Brazalete de Oro',10,79.99,3),(42,'Brazalete de Piedras Naturales',10,59.99,5),(43,'Brazalete de Acero',10,34.99,4),(44,'Brazalete de Diamantes',10,199.99,2);
/*!40000 ALTER TABLE `producto` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `productocomprado`
--

LOCK TABLES `productocomprado` WRITE;
/*!40000 ALTER TABLE `productocomprado` DISABLE KEYS */;
INSERT INTO `productocomprado` VALUES (1,2,'Anillo de Plata','Anillos',2,139.98),(2,2,'Anillo de Oro','Anillos',3,299.97),(3,2,'Anillo con Diamante','Anillos',1,199.99),(4,2,'Anillo de Acero','Anillos',6,299.94),(8,5,'Pulsera de Plata','Pulseras',1,49.99),(9,7,'Gargantilla con Colgante','Gargantillas',1,79.99),(10,7,'Broche de Lazo','Broches para el Cabello',5,34.95),(11,7,'Broche de Estrella','Broches para el Cabello',1,12.99),(12,3,'Anillo de Oro','Anillos',1,99.99),(13,3,'Broche de Mariposa','Broches',1,19.99),(14,3,'Broche de Perla','Broches',1,17.99),(15,4,'Broche de Mariposa','Broches',2,39.98),(16,4,'Broche de Diamante','Broches para el Cabello',3,35.97),(18,6,'Reloj Deportivo','Relojes',1,99.99),(19,6,'Tobillera de Acero','Tobilleras',1,19.99),(20,6,'Tobillera de Oro','Tobilleras',1,39.99),(21,11,'Gargantilla con Colgante','Gargantillas',6,479.94),(22,11,'Broche de Estrella','Broches para el Cabello',1,12.99),(24,8,'Reloj Analógico','Relojes',3,269.97),(25,8,'Tobillera de Plata','Tobilleras',1,29.99),(26,8,'Tobillera de Perlas','Tobilleras',2,69.98),(27,8,'Tobillera de Acero','Tobilleras',1,19.99),(31,9,'Collar de Plata','Collares',1,79.99),(32,10,'Collar de Oro','Collares',3,299.97),(33,10,'Broche de Flor','Broches',4,59.96),(34,10,'Broche de Hoja','Broches',1,12.99),(35,14,'Broche de Hoja','Broches',10,129.90),(36,12,'Broche de Hoja','Broches',4,51.96),(37,12,'Broche de Fresa','Broches para el Cabello',2,19.98),(38,12,'Broche de Estrella','Broches',3,38.97),(39,13,'Pulsera de Perlas','Pulseras',4,159.96),(40,13,'Collar de Cuentas','Collares',5,299.95),(41,13,'Reloj de Lujo','Relojes',1,199.99),(42,13,'Broche de Corazón','Broches',2,49.98),(46,16,'Anillo con Diamante','Anillos',1,199.99),(47,16,'Reloj Deportivo','Relojes',4,399.96),(48,16,'Broche de Hoja','Broches para el Cabello',4,51.96),(49,16,'Gargantilla con Colgante','Gargantillas',4,319.96),(50,16,'Broche de Estrella','Broches para el Cabello',3,38.97),(51,16,'Brazalete de Diamantes','Brazaletes',2,399.98),(53,15,'Anillo de Compromiso','Anillos',1,149.99),(54,15,'Pendientes de Diamantes','Pendientes',2,599.98),(55,15,'Reloj Digital','Relojes',5,249.95),(56,15,'Broche de Lazo','Broches para el Cabello',5,34.95),(60,17,'Pulsera de Plata','Pulseras',7,349.93),(61,17,'Anillo de Oro','Anillos',5,499.95),(62,17,'Gargantilla con Colgante','Gargantillas',6,479.94),(63,17,'Tobillera de Cuentas','Tobilleras',4,99.96),(64,17,'Broche de Estrella','Broches para el Cabello',3,38.97),(65,17,'Brazalete de Oro','Brazaletes',3,239.97),(67,18,'Anillo de Plata','Anillos',1,69.99),(68,19,'Anillo de Plata','Anillos',1,69.99),(69,19,'Broche de Lazo','Broches para el Cabello',2,13.98),(70,19,'Broche de Estrella','Broches para el Cabello',3,38.97),(71,20,'Anillo de Plata','Anillos',1,69.99),(72,27,'Anillo de Oro','Anillos',20,1999.80),(73,27,'Anillo de Compromiso','Anillos',9,1349.91);
/*!40000 ALTER TABLE `productocomprado` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `ubicacioncliente`
--

LOCK TABLES `ubicacioncliente` WRITE;
/*!40000 ALTER TABLE `ubicacioncliente` DISABLE KEYS */;
INSERT INTO `ubicacioncliente` VALUES (1,'Avenida del Sol',NULL,'Colonia Primavera','123','100','12345',1),(2,'Calle de la Luna','Calle del Bosque, Calle de las Flores','Colonia Otoño','456','101','23456',1),(3,'Avenida de los Pinos','Calle del Arroyo','Colonia Verano',NULL,NULL,'34567',1),(4,'Calle del Río','Calle del Puente, Calle del Camino','Colonia Invierno','789','102','45678',2),(5,'Calle del Mar',NULL,'Colonia Montaña','012','103','56789',2),(6,'Avenida de las Estrellas','Calle del Mirador','Colonia Playa','345','104','67890',2),(7,'Calle del Parque',NULL,'Colonia Jardín','678','105','78901',3),(8,'Avenida de las Flores','Calle del Lago, Calle de la Fuente','Colonia Villa',NULL,NULL,'89012',3),(9,'Calle del Puente','Calle del Bosque','Colonia Cascada','901','106','90123',3),(10,'Avenida del Bosque',NULL,'Colonia Residencial','234','107','01234',4),(11,'Calle del Arroyo','Calle del Lago, Calle del Puente','Colonia Bosque','567','108','12345',4),(12,'Avenida del Camino','Calle de las Flores','Colonia Río','890','109','23456',4),(13,'Calle del Mirador',NULL,'Colonia Montaña','123','110','34567',5),(14,'Avenida del Lago','Calle de la Fuente, Calle del Parque','Colonia Playa','456','111','45678',5),(15,'Calle del Jardín','Calle del Bosque','Colonia Villa','789','112','56789',5),(16,'Avenida del Mar',NULL,'Colonia Océano',NULL,NULL,'67890',6),(17,'Calle del Río','Calle del Puente, Calle del Camino','Colonia Isla','901','113','78901',6),(18,'Avenida de la Playa','Calle del Mirador','Colonia Costa','012','114','89012',6),(19,'Calle del Lago',NULL,'Colonia Puerto','345','115','90123',7),(20,'Avenida del Puente','Calle de la Fuente, Calle del Parque','Colonia Río',NULL,NULL,'01234',7),(21,'Calle del Bosque','Calle del Arroyo','Colonia Sierra','678','116','12345',7),(22,'Avenida del Arroyo',NULL,'Colonia Valle','901','117','23456',8),(23,'Calle del Camino','Calle del Puente, Calle del Río','Colonia Montaña','234',NULL,'34567',8),(24,'Avenida del Mirador','Calle de las Flores','Colonia Vista','567','118','45678',8),(25,'Calle de la Fuente',NULL,'Colonia Jardín','890','119','56789',9),(26,'Avenida del Bosque','Calle del Arroyo, Calle del Puente','Colonia Naturaleza','123','120','67890',9),(27,'Calle del Lago','Calle del Mirador','Colonia Costa',NULL,NULL,'78901',9),(28,'Avenida del Parque',NULL,'Colonia Residencial','456','121','89012',10),(29,'Calle del Jardín','Calle del Bosque, Calle del Arroyo','Colonia Villa','789','122','90123',10),(30,'Avenida del Lago','Calle de la Fuente','Colonia Bosque','012','123','01234',10);
/*!40000 ALTER TABLE `ubicacioncliente` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `usuario`
--

LOCK TABLES `usuario` WRITE;
/*!40000 ALTER TABLE `usuario` DISABLE KEYS */;
INSERT INTO `usuario` VALUES (1,'miguel','dominguezmiguel715@gmail.com','$2y$10$.h.QJde2so6IE9wX8ko/.uTwBrZdVzcQFx5hO65JyRvjVoK/Q3NlK');
/*!40000 ALTER TABLE `usuario` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2023-06-07 16:15:51

ALTER TABLE pedido AUTO_INCREMENT = 28;
