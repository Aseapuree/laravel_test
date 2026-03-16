-- MySQL dump 10.13  Distrib 8.4.8, for Linux (x86_64)
--
-- Host: localhost    Database: ecommerce
-- ------------------------------------------------------
-- Server version	8.4.8

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `books`
--

DROP TABLE IF EXISTS `books`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `books` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `last_name` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `document` varchar(20) COLLATE utf8mb4_general_ci NOT NULL,
  `city` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `phone` varchar(20) COLLATE utf8mb4_general_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `product_type` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `amount` decimal(10,2) NOT NULL,
  `order_number` varchar(20) COLLATE utf8mb4_general_ci NOT NULL,
  `claim` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `client_request` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `date` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `books`
--

LOCK TABLES `books` WRITE;
/*!40000 ALTER TABLE `books` DISABLE KEYS */;
/*!40000 ALTER TABLE `books` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `brands`
--

DROP TABLE IF EXISTS `brands`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `brands` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `deleted` int NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `brands`
--

LOCK TABLES `brands` WRITE;
/*!40000 ALTER TABLE `brands` DISABLE KEYS */;
INSERT INTO `brands` VALUES (1,'Maybelline',0),(2,'L\'Oral',0),(3,'NYX',0),(4,'MAC',0),(5,'Ruby Rose',0),(6,'Revlon',0),(7,'Rimmel',0),(8,'Eveline',0),(9,'Wet n Wild',0),(10,'Essence',0);
/*!40000 ALTER TABLE `brands` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `categories`
--

DROP TABLE IF EXISTS `categories`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `categories` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `deleted` int NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `categories`
--

LOCK TABLES `categories` WRITE;
/*!40000 ALTER TABLE `categories` DISABLE KEYS */;
INSERT INTO `categories` VALUES (1,'Labiales',0),(2,'Sombras',0),(3,'Bases',0),(4,'Correctores',0),(5,'Rubores',0),(6,'Delineadores',0),(7,'Mscaras de pestaas',0),(8,'Iluminadores',0);
/*!40000 ALTER TABLE `categories` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `clients`
--

DROP TABLE IF EXISTS `clients`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `clients` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `last_name` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `document` varchar(20) COLLATE utf8mb4_general_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `phone` varchar(20) COLLATE utf8mb4_general_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `deleted` int NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `clients`
--

LOCK TABLES `clients` WRITE;
/*!40000 ALTER TABLE `clients` DISABLE KEYS */;
/*!40000 ALTER TABLE `clients` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `deliveries`
--

DROP TABLE IF EXISTS `deliveries`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `deliveries` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `price` decimal(10,2) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `deliveries`
--

LOCK TABLES `deliveries` WRITE;
/*!40000 ALTER TABLE `deliveries` DISABLE KEYS */;
/*!40000 ALTER TABLE `deliveries` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `numbers`
--

DROP TABLE IF EXISTS `numbers`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `numbers` (
  `id` int NOT NULL AUTO_INCREMENT,
  `voucher` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `serie` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `number` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `numbers`
--

LOCK TABLES `numbers` WRITE;
/*!40000 ALTER TABLE `numbers` DISABLE KEYS */;
/*!40000 ALTER TABLE `numbers` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `payment_methods`
--

DROP TABLE IF EXISTS `payment_methods`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `payment_methods` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `payment_methods`
--

LOCK TABLES `payment_methods` WRITE;
/*!40000 ALTER TABLE `payment_methods` DISABLE KEYS */;
/*!40000 ALTER TABLE `payment_methods` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `products`
--

DROP TABLE IF EXISTS `products`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `products` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `code` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_general_ci,
  `category_id` int NOT NULL,
  `brand_id` int NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `stock` int NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `deleted` int NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `category_id` (`category_id`),
  KEY `brand_id` (`brand_id`),
  CONSTRAINT `products_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`),
  CONSTRAINT `products_ibfk_2` FOREIGN KEY (`brand_id`) REFERENCES `brands` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=96 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `products`
--

LOCK TABLES `products` WRITE;
/*!40000 ALTER TABLE `products` DISABLE KEYS */;
INSERT INTO `products` VALUES (1,'Labial Mate Rojo Intenso','LAB001','Labial mate de larga duracin',1,1,29.90,50,'labial1.jpg',0),(2,'Labial Mate Nude','LAB002','Labial nude cremoso',1,1,29.90,50,'labial2.jpg',0),(3,'Labial Lquido Matte Ink','LAB003','Alta duracin',1,1,35.00,40,'labial3.jpg',0),(4,'Labial Brillo Gloss','LAB004','Gloss hidratante',1,2,32.00,60,'labial4.jpg',0),(5,'Labial Rojo Clsico','LAB005','Color intenso',1,6,28.00,30,'labial5.jpg',0),(6,'Labial Rosa Mate','LAB006','Acabado suave',1,5,18.00,40,'labial6.jpg',0),(7,'Labial Coral Brillante','LAB007','Color veraniego',1,9,22.00,40,'labial7.jpg',0),(8,'Labial Vino Oscuro','LAB008','Perfecto para noche',1,4,55.00,20,'labial8.jpg',0),(9,'Labial Nude Natural','LAB009','Uso diario',1,10,15.00,60,'labial9.jpg',0),(10,'Labial Chocolate Mate','LAB010','Tono moderno',1,3,30.00,40,'labial10.jpg',0),(11,'Paleta Sombras 12 Colores','SOM001','Paleta profesional',2,3,60.00,30,'sombras1.jpg',0),(12,'Paleta Nude Natural','SOM002','Colores neutros',2,1,55.00,35,'sombras2.jpg',0),(13,'Paleta Glam','SOM003','Colores brillantes',2,4,120.00,20,'sombras3.jpg',0),(14,'Sombras Compactas','SOM004','Sombras individuales',2,9,20.00,60,'sombras4.jpg',0),(15,'Paleta Smokey','SOM005','Para maquillaje de noche',2,2,70.00,30,'sombras5.jpg',0),(16,'Sombras Glitter','SOM006','Acabado brillante',2,5,18.00,50,'sombras6.jpg',0),(17,'Paleta Pastel','SOM007','Colores suaves',2,10,22.00,50,'sombras7.jpg',0),(18,'Sombras Metallic','SOM008','Acabado metlico',2,8,28.00,40,'sombras8.jpg',0),(19,'Paleta Sunset','SOM009','Tonos clidos',2,3,58.00,35,'sombras9.jpg',0),(20,'Paleta Profesional','SOM010','Uso profesional',2,4,140.00,20,'sombras10.jpg',0),(21,'Base Fit Me Matte','BAS001','Base lquida mate',3,1,45.00,40,'base1.jpg',0),(22,'Base True Match','BAS002','Cobertura natural',3,2,50.00,40,'base2.jpg',0),(23,'Base HD Studio','BAS003','Alta definicin',3,3,48.00,30,'base3.jpg',0),(24,'Base Velvet','BAS004','Acabado aterciopelado',3,6,40.00,30,'base4.jpg',0),(25,'Base Hidratante','BAS005','Para piel seca',3,8,38.00,30,'base5.jpg',0),(26,'Base Natural Glow','BAS006','Acabado luminoso',3,10,30.00,50,'base6.jpg',0),(27,'Base Oil Control','BAS007','Control de grasa',3,9,35.00,40,'base7.jpg',0),(28,'Base Compacta','BAS008','Formato compacto',3,7,42.00,30,'base8.jpg',0),(29,'Base Profesional','BAS009','Cobertura completa',3,4,120.00,20,'base9.jpg',0),(30,'Base Cushion','BAS010','Aplicacin rpida',3,5,32.00,30,'base10.jpg',0),(31,'Corrector Fit Me','COR001','Corrector lquido',4,1,28.00,50,'cor1.jpg',0),(32,'Corrector True Match','COR002','Cobertura media',4,2,30.00,50,'cor2.jpg',0),(33,'Corrector HD','COR003','Alta cobertura',4,3,29.00,40,'cor3.jpg',0),(34,'Corrector Iluminador','COR004','Ilumina ojeras',4,5,20.00,40,'cor4.jpg',0),(35,'Corrector Compacto','COR005','Textura cremosa',4,6,25.00,40,'cor5.jpg',0),(36,'Rubor Rosa','RUB001','Rubor natural',5,1,32.00,40,'rub1.jpg',0),(37,'Rubor Durazno','RUB002','Tono suave',5,2,34.00,40,'rub2.jpg',0),(38,'Rubor Coral','RUB003','Color clido',5,9,25.00,40,'rub3.jpg',0),(39,'Rubor Compacto','RUB004','Formato polvo',5,10,20.00,50,'rub4.jpg',0),(40,'Rubor Profesional','RUB005','Alta pigmentacin',5,4,75.00,20,'rub5.jpg',0),(41,'Delineador Negro','DEL001','Alta precisin',6,1,25.00,50,'del1.jpg',0),(42,'Delineador Waterproof','DEL002','Resistente al agua',6,2,27.00,40,'del2.jpg',0),(43,'Delineador Plumn','DEL003','Aplicacin fcil',6,3,28.00,40,'del3.jpg',0),(44,'Delineador Gel','DEL004','Textura intensa',6,4,55.00,20,'del4.jpg',0),(45,'Delineador Marrn','DEL005','Color natural',6,7,24.00,40,'del5.jpg',0),(46,'Mascara Volumen','MAS001','Volumen extremo',7,1,29.00,60,'mas1.jpg',0),(47,'Mascara Waterproof','MAS002','Resistente al agua',7,2,31.00,50,'mas2.jpg',0),(48,'Mascara Alargadora','MAS003','Pestaas largas',7,3,28.00,50,'mas3.jpg',0),(49,'Mascara Curl','MAS004','Riza pestaas',7,6,25.00,50,'mas4.jpg',0),(50,'Mascara Profesional','MAS005','Alta definicin',7,4,85.00,20,'mas5.jpg',0),(51,'Iluminador Glow','ILU001','Brillo natural',8,1,35.00,40,'ilu1.jpg',0),(52,'Iluminador Polvo','ILU002','Efecto luminoso',8,2,38.00,40,'ilu2.jpg',0),(53,'Iluminador Stick','ILU003','Formato barra',8,3,33.00,40,'ilu3.jpg',0),(54,'Iluminador Gold','ILU004','Tono dorado',8,9,25.00,40,'ilu4.jpg',0),(55,'Iluminador Profesional','ILU005','Brillo intenso',8,4,90.00,20,'ilu5.jpg',0),(56,'Primer Facial Matte','PRI001','Primer para controlar brillo',3,1,42.00,40,'primer1.jpg',0),(57,'Primer Hidratante','PRI002','Prepara la piel antes del maquillaje',3,2,44.00,35,'primer2.jpg',0),(58,'Primer Iluminador','PRI003','Efecto glow en la piel',3,3,40.00,30,'primer3.jpg',0),(59,'Primer Profesional','PRI004','Base profesional para maquillaje',3,4,95.00,20,'primer4.jpg',0),(60,'Primer Oil Control','PRI005','Controla grasa facial',3,5,36.00,30,'primer5.jpg',0),(61,'Spray Fijador Matte','FIX001','Fijador de maquillaje efecto mate',8,1,38.00,40,'fix1.jpg',0),(62,'Spray Fijador Glow','FIX002','Fijador con efecto luminoso',8,2,40.00,35,'fix2.jpg',0),(63,'Spray Fijador Profesional','FIX003','Fijacin prolongada',8,4,95.00,20,'fix3.jpg',0),(64,'Spray Refrescante','FIX004','Refresca el maquillaje',8,9,30.00,30,'fix4.jpg',0),(65,'Spray Hidratante','FIX005','Hidrata y fija maquillaje',8,10,28.00,40,'fix5.jpg',0),(66,'Brocha para Base','BRO001','Brocha profesional para base',3,5,25.00,40,'brocha1.jpg',0),(67,'Brocha para Rubor','BRO002','Brocha suave para rubor',5,5,22.00,40,'brocha2.jpg',0),(68,'Brocha para Sombras','BRO003','Brocha pequea para sombras',2,5,18.00,50,'brocha3.jpg',0),(69,'Brocha para Iluminador','BRO004','Aplicacin precisa',8,5,20.00,40,'brocha4.jpg',0),(70,'Set de Brochas','BRO005','Set completo de maquillaje',2,5,55.00,30,'brocha5.jpg',0),(71,'Esponja de Maquillaje','ESP001','Esponja blender',3,5,15.00,60,'esponja1.jpg',0),(72,'Esponja Profesional','ESP002','Aplicacin uniforme',3,3,18.00,50,'esponja2.jpg',0),(73,'Esponja Latex Free','ESP003','Libre de ltex',3,10,12.00,60,'esponja3.jpg',0),(74,'Set Esponjas','ESP004','3 esponjas maquillaje',3,9,22.00,40,'esponja4.jpg',0),(75,'Mini Esponja Corrector','ESP005','Ideal para corrector',4,5,10.00,60,'esponja5.jpg',0),(76,'Polvo Compacto Matte','POL001','Control de brillo',3,1,32.00,40,'polvo1.jpg',0),(77,'Polvo Translcido','POL002','Sella maquillaje',3,2,35.00,40,'polvo2.jpg',0),(78,'Polvo Suelto HD','POL003','Acabado profesional',3,3,38.00,35,'polvo3.jpg',0),(79,'Polvo Compacto Natural','POL004','Efecto natural',3,6,28.00,40,'polvo4.jpg',0),(80,'Polvo Profesional','POL005','Alta duracin',3,4,85.00,20,'polvo5.jpg',0),(81,'Perfilador de Labios','PER001','Define labios',1,1,18.00,50,'perfilador1.jpg',0),(82,'Perfilador Nude','PER002','Color natural',1,2,20.00,50,'perfilador2.jpg',0),(83,'Perfilador Rojo','PER003','Labios intensos',1,3,18.00,50,'perfilador3.jpg',0),(84,'Perfilador Profesional','PER004','Alta precisin',1,4,45.00,30,'perfilador4.jpg',0),(85,'Perfilador Rosa','PER005','Tono suave',1,10,15.00,60,'perfilador5.jpg',0),(86,'Paleta Contorno','CON001','Contorno facial',5,3,55.00,30,'contorno1.jpg',0),(87,'Paleta Contorno Profesional','CON002','Define rostro',5,4,120.00,20,'contorno2.jpg',0),(88,'Contorno Stick','CON003','Formato barra',5,5,35.00,30,'contorno3.jpg',0),(89,'Contorno Compacto','CON004','Polvo compacto',5,9,28.00,40,'contorno4.jpg',0),(90,'Contorno Natural','CON005','Acabado natural',5,10,25.00,40,'contorno5.jpg',0),(91,'Glitter Maquillaje','GLI001','Brillo para ojos',2,3,18.00,50,'glitter1.jpg',0),(92,'Glitter Dorado','GLI002','Brillo intenso',2,5,20.00,40,'glitter2.jpg',0),(93,'Glitter Plateado','GLI003','Efecto brillante',2,9,18.00,40,'glitter3.jpg',0),(94,'Glitter Profesional','GLI004','Uso profesional',2,4,65.00,20,'glitter4.jpg',0),(95,'Glitter Rosa','GLI005','Color vibrante',2,10,16.00,50,'glitter5.jpg',0);
/*!40000 ALTER TABLE `products` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sale_details`
--

DROP TABLE IF EXISTS `sale_details`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `sale_details` (
  `id` int NOT NULL AUTO_INCREMENT,
  `sale_id` int NOT NULL,
  `product_id` int NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `quantity` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `product_id` (`product_id`),
  KEY `sale_id` (`sale_id`),
  CONSTRAINT `sale_details_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`),
  CONSTRAINT `sale_details_ibfk_2` FOREIGN KEY (`sale_id`) REFERENCES `sales` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sale_details`
--

LOCK TABLES `sale_details` WRITE;
/*!40000 ALTER TABLE `sale_details` DISABLE KEYS */;
/*!40000 ALTER TABLE `sale_details` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sales`
--

DROP TABLE IF EXISTS `sales`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `sales` (
  `id` int NOT NULL AUTO_INCREMENT,
  `bussiness_name` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `bussiness_document` varchar(20) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `voucher` enum('Boleta','Factura') COLLATE utf8mb4_general_ci NOT NULL,
  `city` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `number` varchar(20) COLLATE utf8mb4_general_ci NOT NULL,
  `client_id` int NOT NULL,
  `total` decimal(10,2) NOT NULL,
  `payment_method_id` int NOT NULL,
  `delivery_id` int NOT NULL,
  `date` datetime NOT NULL,
  `status` enum('Pendiente','En proceso','Completado','Rechazado') COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'Pendiente',
  `deleted` int NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `client_id` (`client_id`),
  CONSTRAINT `sales_ibfk_1` FOREIGN KEY (`client_id`) REFERENCES `clients` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sales`
--

LOCK TABLES `sales` WRITE;
/*!40000 ALTER TABLE `sales` DISABLE KEYS */;
/*!40000 ALTER TABLE `sales` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `users` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `last_name` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `user` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `deleted` int NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2026-03-16  1:23:06
