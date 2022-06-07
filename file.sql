-- MySQL dump 10.13  Distrib 8.0.29, for Linux (x86_64)
--
-- Host: localhost    Database: api
-- ------------------------------------------------------
-- Server version	8.0.29-0ubuntu0.20.04.3

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
-- Table structure for table `failed_jobs`
--

DROP TABLE IF EXISTS `failed_jobs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `failed_jobs` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `failed_jobs`
--

LOCK TABLES `failed_jobs` WRITE;
/*!40000 ALTER TABLE `failed_jobs` DISABLE KEYS */;
/*!40000 ALTER TABLE `failed_jobs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `galleries`
--

DROP TABLE IF EXISTS `galleries`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `galleries` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `userid` int NOT NULL,
  `imageUrl` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `galleries`
--

LOCK TABLES `galleries` WRITE;
/*!40000 ALTER TABLE `galleries` DISABLE KEYS */;
/*!40000 ALTER TABLE `galleries` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `migrations` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES (1,'2014_10_12_000000_create_users_table',1),(2,'2014_10_12_100000_create_password_resets_table',1),(3,'2019_08_19_000000_create_failed_jobs_table',1),(4,'2019_12_14_000001_create_personal_access_tokens_table',1),(5,'2022_05_09_020356_create_notes_table',1),(6,'2022_05_16_051153_create_galleries_table',1),(7,'2022_05_24_040954_create_user_logs_table',1);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `notes`
--

DROP TABLE IF EXISTS `notes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `notes` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `userId` int NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `body` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `notes`
--

LOCK TABLES `notes` WRITE;
/*!40000 ALTER TABLE `notes` DISABLE KEYS */;
INSERT INTO `notes` VALUES (1,2,'To my Son.','Slevin,','2022-05-25 11:00:36','2022-05-25 11:00:36'),(2,2,'to my love','Catherine','2022-05-25 11:00:51','2022-05-25 11:00:51'),(4,1,'Daily Scrum','Update gallery settings','2022-05-25 14:07:52','2022-05-25 14:07:52'),(6,1,'Mylastwords','Dear Batman,\nGahajjahssnjss\nbsnshsjsbsb','2022-05-27 08:25:52','2022-05-27 08:25:52'),(7,1,'Test','test','2022-05-27 09:29:37','2022-05-27 09:29:37'),(8,1,'t','t','2022-05-27 09:32:02','2022-05-27 09:32:02'),(9,3,'Ako to','test note','2022-05-27 10:33:20','2022-05-27 10:33:20'),(10,3,'anada ah','hahsha','2022-05-27 10:34:50','2022-05-27 10:34:50'),(11,3,'waaaaaa','hebsksisgbsnqkwodidhdjwjkw','2022-05-27 10:36:12','2022-05-27 10:36:12'),(12,3,'test','test','2022-06-01 08:59:15','2022-06-01 08:59:15'),(13,3,'test','test','2022-06-01 08:59:16','2022-06-01 08:59:16'),(14,3,'test','resh','2022-06-03 10:33:39','2022-06-03 10:33:39'),(15,3,'June 03','test','2022-06-03 10:33:51','2022-06-03 10:33:51');
/*!40000 ALTER TABLE `notes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `password_resets`
--

LOCK TABLES `password_resets` WRITE;
/*!40000 ALTER TABLE `password_resets` DISABLE KEYS */;
/*!40000 ALTER TABLE `password_resets` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `personal_access_tokens`
--

DROP TABLE IF EXISTS `personal_access_tokens`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `personal_access_tokens` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`)
) ENGINE=InnoDB AUTO_INCREMENT=41 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `personal_access_tokens`
--

LOCK TABLES `personal_access_tokens` WRITE;
/*!40000 ALTER TABLE `personal_access_tokens` DISABLE KEYS */;
INSERT INTO `personal_access_tokens` VALUES (1,'App\\Models\\User',1,'secret','393dad0c260d3f803efa22a240b56e91e6c5820bdfea00df12021e11af7c886e','[\"*\"]',NULL,'2022-05-24 07:53:09','2022-05-24 07:53:09'),(2,'App\\Models\\User',1,'secret','1aefc7d90e6e2f89f52f5ac22fa23216b686d7faff12ab4cb76d4c8b89a69d90','[\"*\"]','2022-05-24 10:09:30','2022-05-24 07:53:26','2022-05-24 10:09:30'),(3,'App\\Models\\User',2,'secret','d270ab8eadff5e85375d7ad3fc9d4b40c974f7e07760c797de5944c672976cf6','[\"*\"]',NULL,'2022-05-25 01:50:52','2022-05-25 01:50:52'),(4,'App\\Models\\User',2,'secret','faef2202a3332bd773d84fc33998866195bc3e3e03fadcbbf8538fa140a981e5','[\"*\"]','2022-05-25 02:20:21','2022-05-25 01:50:59','2022-05-25 02:20:21'),(5,'App\\Models\\User',1,'secret','dd579cb6544555272dce480241208c14934dc29eb99a6eb1cf6f9a92801b0cd2','[\"*\"]','2022-05-25 15:27:45','2022-05-25 08:29:21','2022-05-25 15:27:45'),(6,'App\\Models\\User',2,'secret','9efbe44b4cfca8fae4d848908c74e776e0c14dd6cd592183da442e8993ad0642','[\"*\"]','2022-05-25 11:00:52','2022-05-25 11:00:02','2022-05-25 11:00:52'),(7,'App\\Models\\User',2,'secret','6f73d02472b33959fe768efca0ade0a6087f9ceea20137cdda24b1ad4cd72d3a','[\"*\"]',NULL,'2022-05-25 11:41:13','2022-05-25 11:41:13'),(8,'App\\Models\\User',2,'secret','f3b49ec6ff613d22c0ddb8b2d818b131541b65af1540d36921626288c7b05e2f','[\"*\"]','2022-05-25 11:44:41','2022-05-25 11:41:51','2022-05-25 11:44:41'),(9,'App\\Models\\User',1,'secret','0525f5c3a2484fadec3091a9cab7cf82db3839284a1474f146b0f5c0c5643f5c','[\"*\"]','2022-05-26 06:31:09','2022-05-26 05:58:08','2022-05-26 06:31:09'),(10,'App\\Models\\User',1,'secret','fa6b3dd0cf61590e42c29b0a3065190cd56c861fe4663d5ffefd1d8be3226cc6','[\"*\"]','2022-05-26 08:39:25','2022-05-26 06:39:08','2022-05-26 08:39:25'),(11,'App\\Models\\User',1,'secret','ea0e81ce460a5ea25f3a941a577b02c35b9d7ee0354afe8b13523c0c5938b933','[\"*\"]','2022-05-26 08:41:41','2022-05-26 08:41:19','2022-05-26 08:41:41'),(12,'App\\Models\\User',2,'secret','15505dd44754f9722453778c96919e9f279965855e2d9c00820d5b7014d91ecc','[\"*\"]','2022-05-27 04:17:01','2022-05-27 04:16:59','2022-05-27 04:17:01'),(13,'App\\Models\\User',2,'secret','6f20a341e803c01b3c38d6cbc6777bafe86ecc0faf9f0485d0e81a8c48920320','[\"*\"]','2022-05-28 12:46:33','2022-05-27 04:20:38','2022-05-28 12:46:33'),(14,'App\\Models\\User',1,'secret','cc1662a07157ecc7ea9af311d9fe9bebcffad18e2ed7ebfa089bfa1bf7887e42','[\"*\"]','2022-05-27 09:40:08','2022-05-27 07:37:06','2022-05-27 09:40:08'),(15,'App\\Models\\User',1,'secret','841f14eb0442c492274b93639d8f5ea31f64d7e5eae9199150331733ef593156','[\"*\"]','2022-05-30 09:10:58','2022-05-27 10:10:03','2022-05-30 09:10:58'),(16,'App\\Models\\User',4,'secret','66d5bdb30a97e6905bc2daf5e1c143f4a3087e6ecf4cb510c100f28d456a90a4','[\"*\"]',NULL,'2022-05-27 10:13:32','2022-05-27 10:13:32'),(17,'App\\Models\\User',4,'secret','b83a520a3c0c47665a070e87f5d68ba5d35c5922545a3e6b305b163125c1784d','[\"*\"]','2022-05-27 10:14:01','2022-05-27 10:13:43','2022-05-27 10:14:01'),(18,'App\\Models\\User',4,'secret','d3d41eefd2758f628396fad24b0a066c8944419e6d561cff7b0b9db2d03848cb','[\"*\"]','2022-05-28 05:18:21','2022-05-27 10:14:19','2022-05-28 05:18:21'),(19,'App\\Models\\User',5,'secret','2d191aab21341af4b97b64d425b1c4c0c3a6676d9357a7d54dd80f9a4d345a21','[\"*\"]',NULL,'2022-05-27 10:17:02','2022-05-27 10:17:02'),(20,'App\\Models\\User',3,'secret','322492d644cac103717b7166eecc8a92f5468a2d7c301a71077730f095dc41f0','[\"*\"]','2022-05-31 02:44:25','2022-05-27 10:17:11','2022-05-31 02:44:25'),(21,'App\\Models\\User',2,'secret','c44485465946e2d22ea46a756ef40a872a0242e2c77d5b5be5e9eb967baa6e14','[\"*\"]','2022-05-31 07:13:38','2022-05-28 12:47:16','2022-05-31 07:13:38'),(22,'App\\Models\\User',1,'secret','78363d52302fd78a25de6c53e8bc849d8e77189f90babd35543cc4a345840437','[\"*\"]','2022-05-31 08:19:32','2022-05-31 08:17:36','2022-05-31 08:19:32'),(23,'App\\Models\\User',2,'secret','5235f92261359d0624b15e0079735e2bbca00361d8b77034a46718c3f8fa7127','[\"*\"]','2022-06-06 09:35:34','2022-05-31 09:10:02','2022-06-06 09:35:34'),(24,'App\\Models\\User',1,'secret','5c21c31399f785de2f1921e96893d897524a62f9dd0b719aae8f476df4834bf7','[\"*\"]','2022-06-01 10:00:16','2022-05-31 09:47:44','2022-06-01 10:00:16'),(25,'App\\Models\\User',3,'secret','8fb8efeb2797aee95196d5437c70c29ac06013af69e63908a3c125215c0c9aa9','[\"*\"]','2022-06-01 08:59:18','2022-06-01 07:41:00','2022-06-01 08:59:18'),(26,'App\\Models\\User',3,'secret','bd78bc121e5cac466791354a43c10661640966332b4f92db944e585ccdc2721e','[\"*\"]','2022-06-01 09:17:24','2022-06-01 09:13:04','2022-06-01 09:17:24'),(27,'App\\Models\\User',1,'secret','d37076ffd7fb4f3bf0975f0d561301475f2de59f5acaece1dc9298d54f5cd41c','[\"*\"]','2022-06-02 10:00:10','2022-06-01 09:46:46','2022-06-02 10:00:10'),(28,'App\\Models\\User',1,'secret','ada0bfdd53fea3adca9606e25709b9754af53507b6a74ef6c8da62539ad716af','[\"*\"]','2022-06-02 10:02:56','2022-06-02 10:02:55','2022-06-02 10:02:56'),(29,'App\\Models\\User',1,'secret','33ba80c5af4ad10aab9e8c5440f08d9acf793efc0d21068949cc9e25ddc6e831','[\"*\"]','2022-06-02 10:03:55','2022-06-02 10:03:55','2022-06-02 10:03:55'),(30,'App\\Models\\User',1,'secret','245fcf6a28b6d7d5edc4419508edd33fed1fa489c7fd5370315ccf6d93c4d90e','[\"*\"]','2022-06-02 10:08:03','2022-06-02 10:04:42','2022-06-02 10:08:03'),(31,'App\\Models\\User',7,'secret','6fe4dfe6e348563aa6720731ea9a8900a15fde9eb543af1eba482b9d2e9619b6','[\"*\"]',NULL,'2022-06-02 10:09:24','2022-06-02 10:09:24'),(32,'App\\Models\\User',1,'secret','c970c94204ec3d8999db9e77c2b960525a53d4af94a4a6dde0afd3e19655948f','[\"*\"]','2022-06-03 05:46:02','2022-06-03 05:27:58','2022-06-03 05:46:02'),(33,'App\\Models\\User',8,'secret','d00cf41897c4c99e6d6bc9872df969c6b7ea698c3dec23d1bbf4275d97f7fe35','[\"*\"]',NULL,'2022-06-03 10:24:50','2022-06-03 10:24:50'),(34,'App\\Models\\User',3,'secret','699cdb25b7a1eb982ae2a097fe6040fc0815d6cd8676da65c6c21c94897e49b4','[\"*\"]','2022-06-03 10:33:51','2022-06-03 10:27:18','2022-06-03 10:33:51'),(35,'App\\Models\\User',3,'secret','f36175ed279cfa130fae735a613f2fc94776708776618b2667d312b9b9cea88f','[\"*\"]','2022-06-03 10:34:23','2022-06-03 10:34:21','2022-06-03 10:34:23'),(36,'App\\Models\\User',1,'secret','3ce0568cf2bd5c40ec34b9515afd2abeab3b678ff4f676199299309047d63e7b','[\"*\"]','2022-06-07 01:47:26','2022-06-06 06:36:53','2022-06-07 01:47:26'),(37,'App\\Models\\User',1,'secret','e3f3eded13276f472d1c7d65d993d7bd17a7e197791e1adea81d16307ff0a1ae','[\"*\"]','2022-06-06 06:50:26','2022-06-06 06:49:53','2022-06-06 06:50:26'),(38,'App\\Models\\User',1,'secret','769a1bac3e23952d04d8f36f161f4a9ee448ad1070b2029e170d0d3b25dbf630','[\"*\"]',NULL,'2022-06-06 07:02:19','2022-06-06 07:02:19'),(39,'App\\Models\\User',1,'secret','cdf9fd86029161bd64468df87e03a6b943df0fb4ffe09bb2925df3adc54375ca','[\"*\"]','2022-06-06 07:06:13','2022-06-06 07:04:13','2022-06-06 07:06:13'),(40,'App\\Models\\User',1,'secret','17527e2e87e84a694ab218588fd97a891f31d2e7ec60a2e2abb895881c77a3b1','[\"*\"]','2022-06-06 07:16:45','2022-06-06 07:15:37','2022-06-06 07:16:45');
/*!40000 ALTER TABLE `personal_access_tokens` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user_logs`
--

DROP TABLE IF EXISTS `user_logs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `user_logs` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int NOT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL,
  `location` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk1_idx` (`user_id`),
  CONSTRAINT `fk1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user_logs`
--

LOCK TABLES `user_logs` WRITE;
/*!40000 ALTER TABLE `user_logs` DISABLE KEYS */;
INSERT INTO `user_logs` VALUES (3,3,'2022-06-03','08:04:10','asdasd','2022-06-03 00:24:07','2022-06-03 00:24:07'),(4,1,'2022-06-02','07:19:10','awdawd','2022-06-03 05:28:28','2022-06-03 05:28:28'),(5,1,'2022-06-03','01:34:22','40.741895,-73.989308','2022-06-03 05:34:23','2022-06-03 05:34:23'),(6,1,'2022-06-03','01:34:53','40.741895,-73.989308','2022-06-03 05:34:54','2022-06-03 05:34:54'),(7,1,'2022-06-03','01:35:39','40.741895,-73.989308','2022-06-03 05:35:40','2022-06-03 05:35:40'),(8,1,'2022-06-06','02:36:53','40.741895,-73.989308','2022-06-06 06:36:54','2022-06-06 06:36:54'),(9,1,'2022-06-06','02:49:53','40.741895,-73.989308','2022-06-06 06:49:53','2022-06-06 06:49:53'),(10,1,'2022-06-06','03:02:19','40.741895,-73.989308','2022-06-06 07:02:20','2022-06-06 07:02:20'),(11,1,'2022-06-06','03:04:14','40.741895,-73.989308','2022-06-06 07:04:34','2022-06-06 07:04:34'),(12,1,'2022-06-06','03:15:37','40.741895,-73.989308','2022-06-06 07:15:38','2022-06-06 07:15:38'),(13,1,'2022-06-06','03:45:57','40.741895,-73.989308','2022-06-06 07:45:58','2022-06-06 07:45:58'),(14,1,'2022-06-06','04:43:47','40.741895,-73.989308','2022-06-06 08:43:48','2022-06-06 08:43:48'),(15,2,'2022-06-06','05:24:56','40.741895,-73.989308','2022-06-06 09:24:56','2022-06-06 09:24:56'),(16,1,'2022-06-06','05:48:10','40.741895,-73.989308','2022-06-06 09:48:11','2022-06-06 09:48:11'),(17,1,'2022-06-07','09:46:55','40.741895,-73.989308','2022-06-07 01:46:57','2022-06-07 01:46:57'),(18,1,'2022-06-07','10:26:01','40.741895,-73.989308','2022-06-07 02:26:02','2022-06-07 02:26:02'),(19,1,'2022-06-07','10:30:47','40.741895,-73.989308','2022-06-07 02:30:48','2022-06-07 02:30:48'),(20,1,'2022-06-07','10:35:10','40.741895,-73.989308','2022-06-07 02:35:11','2022-06-07 02:35:11'),(21,1,'2022-06-07','10:41:57','40.741895,-73.989308','2022-06-07 02:41:58','2022-06-07 02:41:58'),(22,1,'2022-06-07','10:45:27','40.741895,-73.989308','2022-06-07 02:45:28','2022-06-07 02:45:28');
/*!40000 ALTER TABLE `user_logs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `users` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `subcription` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'New User','superman@gmail.com',NULL,'$2y$10$dcPbyMmVYSj3BLIy2qtypuvk07fAPQ24JokwjdY/MaqrOzkUGYNru','user','free',1,NULL,'2022-05-24 07:53:09','2022-05-24 07:53:09'),(2,'Eugene Tan','whats@mylastwords.life',NULL,'$2y$10$X7SOleYqlXYNVKjhcC8W.eyhB4mOhLY/zsXx1j2.uqDzmgSZuXcua','admin','free',1,'28If6rt8hXjVolCReCMx7sM3cZyQ1g6Dn6eGcgD78PTp6In2LDxsqjAmajC0','2022-05-25 01:50:52','2022-05-25 01:50:52'),(3,'carlo','johncarlocasipit@gmail.com',NULL,'$2y$10$o0AZaAg4rvdjSm4RxFjKSuaih2EcNzher0ZdDxjwcVAkP1EHzP6My','admin','0',1,NULL,'2022-05-27 03:54:11','2022-05-27 03:54:11'),(4,'New User','jameslouietorresqt@gmail.com',NULL,'$2y$10$fjDUGoxt0uLXNbMmR92XieXGUFQedCmFEE/1LHz/RKT1n0EKmdW0S','user','free',1,NULL,'2022-05-27 10:13:32','2022-05-27 10:13:32'),(5,'New User','johncarlocasipit1@gmail.com',NULL,'$2y$10$NdsKAfXJr5ea8YM0YHKZY.1X9tG3Wh6xqD8o/vVzoVSpka8jyNLvu','user','free',1,NULL,'2022-05-27 10:17:02','2022-05-27 10:17:02'),(6,'Eugenetsw','eugenetsw@gmail.com',NULL,'$2y$10$dO20xMF3D3PX419lgo5ZZ.cPC67Mvb9TtO0p362zsNZd/rkDHqGUe','admin','0',1,NULL,'2022-06-01 11:46:05','2022-06-01 11:46:05'),(7,'New User','awdawd@gmail.com',NULL,'$2y$10$ZQHyq7L5RioWS.u4O1VDuu/JDUts0ZL4jGKygk4o.OJRh95rbri5y','user','free',1,NULL,'2022-06-02 10:09:24','2022-06-02 10:09:24'),(8,'New User','fj@gmail.com',NULL,'$2y$10$Os8bwUwt1l8su6g9O0ypq.AWxaUQDur23c91IR5VW3oFPr1qgofrG','user','free',1,NULL,'2022-06-03 10:24:50','2022-06-03 10:24:50');
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

-- Dump completed on 2022-06-07  3:54:06
