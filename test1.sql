-- MySQL dump 10.13  Distrib 8.0.28, for macos11.6 (x86_64)
--
-- Host: localhost    Database: test1
-- ------------------------------------------------------
-- Server version	8.0.28

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
-- Table structure for table `category`
--

DROP TABLE IF EXISTS `category`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `category` (
  `id` int NOT NULL AUTO_INCREMENT,
  `category` varchar(200) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `category_id_uindex` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `category`
--

LOCK TABLES `category` WRITE;
/*!40000 ALTER TABLE `category` DISABLE KEYS */;
INSERT INTO `category` VALUES (1,'Деловые/Бизнес-процессы'),(2,'Деловые/Найм'),(3,'Деловые/Реклама'),(4,'Деловые/Управление бизнесом'),(5,'Деловые/Управление людьми'),(6,'Деловые/Управление проектами'),(7,'Детские/Воспитание'),(8,'Дизайн/Общее'),(9,'Дизайн/Logo'),(10,'Дизайн/Web дизайн'),(11,'Разработка/PHP'),(12,'Разработка/HTML и CSS'),(13,'Разработка/Проектирование');
/*!40000 ALTER TABLE `category` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `materials`
--

DROP TABLE IF EXISTS `materials`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `materials` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(200) NOT NULL,
  `author` varchar(200) NOT NULL,
  `type` varchar(45) NOT NULL,
  `category` varchar(200) NOT NULL,
  `description` text NOT NULL,
  `tag` varchar(100) DEFAULT NULL,
  `url_id` int DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id_UNIQUE` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=77 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `materials`
--

LOCK TABLES `materials` WRITE;
/*!40000 ALTER TABLE `materials` DISABLE KEYS */;
INSERT INTO `materials` VALUES (54,'asdasd','asdasda','Статья','Деловые/Реклама','asdasdas','здоровье',NULL),(57,'asd','ads','Подборка','Деловые/Управление бизнесом','asdasd',NULL,NULL),(59,'qweqe/qeqe','qewqeq/qqwe','Выберите тип','Выберите категорию','qeqe',NULL,NULL),(60,'asd','asd','Книга','Деловые/Найм','asdsa',NULL,NULL),(61,'re','erf','Статья','Деловые/Найм','ref',NULL,NULL),(75,'4','4','Книга','Деловые/Бизнес-процессы','4',NULL,44);
/*!40000 ALTER TABLE `materials` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tag`
--

DROP TABLE IF EXISTS `tag`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tag` (
  `id` int NOT NULL AUTO_INCREMENT,
  `tag` varchar(100) DEFAULT NULL,
  UNIQUE KEY `tag_id_uindex` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=30 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tag`
--

LOCK TABLES `tag` WRITE;
/*!40000 ALTER TABLE `tag` DISABLE KEYS */;
INSERT INTO `tag` VALUES (2,'Личная эффективность'),(20,'здоровье'),(26,'ew'),(27,'wewe'),(28,'3'),(29,'  ');
/*!40000 ALTER TABLE `tag` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `type`
--

DROP TABLE IF EXISTS `type`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `type` (
  `id` int NOT NULL AUTO_INCREMENT,
  `type` varchar(200) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `type_id_uindex` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `type`
--

LOCK TABLES `type` WRITE;
/*!40000 ALTER TABLE `type` DISABLE KEYS */;
INSERT INTO `type` VALUES (1,'Книга'),(2,'Статья'),(3,'Видео'),(4,'Сайт/Блог'),(5,'Подборка'),(6,'Ключевые идеи книги');
/*!40000 ALTER TABLE `type` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `url`
--

DROP TABLE IF EXISTS `url`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `url` (
  `id` int NOT NULL AUTO_INCREMENT,
  `url` text NOT NULL,
  `description` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `url_id_uindex` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=45 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `url`
--

LOCK TABLES `url` WRITE;
/*!40000 ALTER TABLE `url` DISABLE KEYS */;
INSERT INTO `url` VALUES (1,'ya.ru','сайт YANDEX'),(2,'vl.ru',''),(3,'asdasd','сказки3'),(4,'qwd','qd'),(5,'aaaaaa','сказки4'),(6,'asdas','sdaad'),(7,'asdasd','asdasd'),(8,'1asdasd','asdasd1'),(9,'asdasd','сказки3'),(10,'asdasd','сказки3'),(11,'qwd','сказки4'),(12,'asdasd','сказки3'),(13,'qwd','сказки4'),(14,'asdasd','asdasd'),(15,'asdasd','asdasd'),(16,'qwe','qwd'),(17,'asdasd','сказки3'),(18,'asdasd','сказки3'),(19,'asdasd','asd'),(20,'asdasd','сказки3'),(21,'asdasd','сказки3'),(22,'asdasd','сказки4'),(23,'asdasd','сказки3'),(24,'asdasd','сказки4'),(25,'asd','asd'),(26,'kk','kk'),(27,'mmmmm','nnnnn'),(28,'22222','22222'),(29,'33333','33333'),(30,'4444','4444'),(31,'555','555'),(32,'11111','555555555'),(33,'5','5'),(34,'23','23'),(35,'rww','rwr'),(36,'333','33'),(37,'',''),(38,'asd','asd'),(39,'asd','sad'),(40,'qweqwe','qwwq'),(41,'asd','sad'),(42,'qeweqwe','qeqwe'),(43,'lll','ll'),(44,'1','1');
/*!40000 ALTER TABLE `url` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2022-07-08 19:19:44
