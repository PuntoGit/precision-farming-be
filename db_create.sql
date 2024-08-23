-- MySQL dump 10.13  Distrib 8.0.35, for Linux (x86_64)
--
-- Host: precision-farming-database.mysql.database.azure.com    Database: metasupplychain
-- ------------------------------------------------------
-- Server version	5.7.44-log

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
-- Table structure for table `alimentaziones`
--

DROP TABLE IF EXISTS `alimentaziones`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `alimentaziones` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) unsigned DEFAULT NULL,
  `farm_id` bigint(20) unsigned DEFAULT NULL,
  `alimenti_id` bigint(20) unsigned DEFAULT NULL,
  `stella_id` bigint(20) unsigned DEFAULT NULL,
  `data` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `quantita` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `motivazione` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `alimentaziones_alimenti_id_foreign` (`alimenti_id`),
  KEY `alimentaziones_stella_id_foreign` (`stella_id`),
  CONSTRAINT `alimentaziones_alimenti_id_foreign` FOREIGN KEY (`alimenti_id`) REFERENCES `alimentis` (`id`) ON DELETE CASCADE,
  CONSTRAINT `alimentaziones_stella_id_foreign` FOREIGN KEY (`stella_id`) REFERENCES `stellas` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `alimentaziones`
--

LOCK TABLES `alimentaziones` WRITE;
/*!40000 ALTER TABLE `alimentaziones` DISABLE KEYS */;
INSERT INTO `alimentaziones` VALUES (1,22,7,1,5,'10-11-2022','1','Ordinaria','2022-11-10 07:51:45','2022-11-10 07:51:45');
/*!40000 ALTER TABLE `alimentaziones` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `alimentis`
--

DROP TABLE IF EXISTS `alimentis`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `alimentis` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) unsigned DEFAULT NULL,
  `farm_id` bigint(20) unsigned DEFAULT NULL,
  `nome` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `provenienza` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `codice` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bio` tinyint(1) DEFAULT '0',
  `tipologia` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tipologia_mangime` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `alimentis`
--

LOCK TABLES `alimentis` WRITE;
/*!40000 ALTER TABLE `alimentis` DISABLE KEYS */;
INSERT INTO `alimentis` VALUES (1,22,7,'1-Fieno maggengo 1°taglio','Produzione agricola della stessa regione','1',0,'Fieno',NULL,'2022-11-10 07:48:24','2022-11-10 07:48:24'),(2,22,7,'2-Moretti CAV50','Produzione agricola fuori regione','2',0,'Mangime','ottenuti solo da vegetali, alghe, animali o lieviti bio','2022-11-10 07:49:20','2022-11-10 07:49:20'),(3,22,7,'3-Moretti CAV70','Produzione agricola fuori regione','3',0,'Mangime','ottenuti solo da vegetali, alghe, animali o lieviti bio','2022-11-10 07:49:39','2022-11-10 07:49:39'),(4,22,7,'4-Scandinavia Trotting','Produzione agricola fuori regione','4',0,'Integratori',NULL,'2022-11-10 07:50:06','2022-11-10 07:50:06'),(5,22,7,'5-Barbabietole pallettate','Produzione agricola della stessa regione','5',0,'Mangime','ottenuti solo da vegetali, alghe, animali o lieviti bio','2022-11-10 07:50:49','2022-11-10 07:50:49'),(6,22,7,'6-Orzo essiccato','Produzione agricola della stessa regione','6',0,'Mangime','ottenuti solo da vegetali, alghe, animali o lieviti bio','2022-11-10 07:51:09','2022-11-10 07:51:09');
/*!40000 ALTER TABLE `alimentis` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `anagraficas`
--

DROP TABLE IF EXISTS `anagraficas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `anagraficas` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `cognome` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nome` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `denominazione` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `indirizzo` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `citta` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cap` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `prov` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `paese` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cellulare` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `telefono` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tipologia_persona` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `attivita_lavorativa` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `codice_destinatario_sdi` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `partita_iva` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `c_f` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pec` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `note` longtext COLLATE utf8mb4_unicode_ci,
  `responsabile_del_trattamento` tinyint(1) DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `anagraficas`
--

LOCK TABLES `anagraficas` WRITE;
/*!40000 ALTER TABLE `anagraficas` DISABLE KEYS */;
INSERT INTO `anagraficas` VALUES (2,'2-test op',NULL,'2-test op','via milano','milano','12345','mi','Italy','+38 1234123413',NULL,'Persona fisica',NULL,NULL,NULL,'tdfg5w464356dfgdfsg',NULL,NULL,NULL,0,'2022-09-25 18:30:47','2022-09-25 18:30:47'),(3,'3-cognome operaio',NULL,'3-cognome operaio','via test','pavia','152345','pavia','Italy','+39 1234123412',NULL,'Persona fisica',NULL,NULL,NULL,'dfgsdfgd',NULL,NULL,NULL,0,'2022-09-25 19:53:39','2022-09-25 19:53:39'),(4,'4-rissone pelizza','lucetta','4-rissone pelizza lucetta','via san giacomo della vittoria 48','alessandria','15120','alessandria','Italy','+39 3477833494',NULL,'Persona fisica',NULL,NULL,NULL,'rssltt88dc627w','commerciale@chevre.eu',NULL,NULL,0,'2022-10-13 07:21:31','2022-10-13 07:21:31'),(5,'1-Farmcanapa società cooperativa agricola',NULL,'1-Farmcanapa società cooperativa agricola','Via Savonarola, 29','Alessandria','15121','AL','Italy','+39 3454529786',NULL,'Persona giuridica','Distributore',NULL,'02658200064','02658200064','amministrazione@farmcanapa.it','farmcanapa@cia.legalmail.it',NULL,0,'2022-10-20 08:39:39','2022-10-21 11:33:08'),(6,'5-Murru','Luciano','5-Murru Luciano','Via Madonna, 35','Mirabello Monferrato','15040','AL','Italy','+39 3339367633',NULL,'Persona fisica',NULL,NULL,NULL,'MRRLCN68M20D345N',NULL,NULL,NULL,0,'2022-10-20 08:43:28','2022-10-20 08:43:28'),(7,'2-CAP Nordovest Consorzio Agrario',NULL,'2-CAP Nordovest Consorzio Agrario','Via Bra, 97','Cuneo (Fraz. Ronchi)','12100','CN','Italy','+03 9142429133','+01 42429133','Persona giuridica','Dettagliente',NULL,NULL,NULL,'bsmartino@capnordovest.it',NULL,NULL,0,'2022-10-20 09:07:09','2022-10-20 09:07:09'),(9,'4-Cliente1','nome','4-Cliente1 nome','Via test,12','Milano','12345','MI','Italy','+39 1234123412',NULL,'Persona fisica','Trasformatore',NULL,NULL,'asdfasdfasdfasdfasdf',NULL,NULL,NULL,0,'2022-10-21 11:26:48','2022-10-21 11:26:48'),(10,'5-test','test','5-test test','via test','sadf','3214','df','Italy','+21 2343242342',NULL,'Persona fisica','Produttore industriale',NULL,NULL,'dfgs',NULL,NULL,NULL,0,'2022-10-21 11:34:41','2022-10-21 11:34:41'),(11,'6-Molino Airoldi',NULL,'6-Molino Airoldi','Via Como, 58','Brivio','23883','LC','Italy','+39 0395320185',NULL,'Persona giuridica','Distributore',NULL,'01955460132','01955460132','molinoairoldi@libero.it',NULL,NULL,0,'2022-11-10 08:14:18','2022-11-10 08:14:18'),(12,'7-Agrizoo di Moretti Cristian',NULL,'7-Agrizoo di Moretti Cristian','Via Cà del Vento, 338','Novafeltria','47863','RN','Italy','+39 3333482164','+39 0541922546','Persona giuridica','Distributore',NULL,'0000000',NULL,'info@ilgruppomoretti.it',NULL,NULL,0,'2022-11-10 08:19:01','2022-11-10 08:19:01'),(13,'8-Scandinavia Srl',NULL,'8-Scandinavia Srl','Via dell\'Artigiano, 8/6','San Giorgio di Piano','40016','BO','Italy','+39 0514980518',NULL,'Persona giuridica','Distributore',NULL,'0000000',NULL,'info@scandinavia.it',NULL,NULL,0,'2022-11-10 08:22:30','2022-11-10 08:22:30'),(14,'9-cliente test',NULL,'9-cliente test','via test','test','12345','TI','Italy','+39 1234512342',NULL,'Persona fisica','Produttore agricolo',NULL,NULL,'asdfsdf12435132asdf',NULL,NULL,NULL,0,'2022-11-10 09:49:16','2022-11-10 09:49:16'),(15,'10-fornitore test',NULL,'10-fornitore test','via sfdgfg','dsfds','345234','vt','Switzerland','+39 1234234112',NULL,'Persona fisica','Dettagliente',NULL,NULL,'fdgsdfg43253453453',NULL,NULL,NULL,0,'2022-11-10 09:49:49','2022-11-10 09:49:49'),(16,'6-operaio test',NULL,'6-operaio test','via operiaio','operaio','12345','OP','Italy','+39 2134213412',NULL,'Persona fisica',NULL,NULL,NULL,'sadfsd213412342342134',NULL,NULL,NULL,1,'2022-11-10 09:51:15','2022-11-10 09:51:34'),(17,'7-a',NULL,'7-a','a','a','11111','mi','Italy','+12 3456789013',NULL,'Persona fisica',NULL,NULL,NULL,'e',NULL,NULL,NULL,0,'2024-05-31 14:16:03','2024-05-31 14:16:03');
/*!40000 ALTER TABLE `anagraficas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `animalis`
--

DROP TABLE IF EXISTS `animalis`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `animalis` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `stella_id` bigint(20) unsigned DEFAULT NULL,
  `user_id` bigint(20) unsigned DEFAULT NULL,
  `farm_id` bigint(20) unsigned DEFAULT NULL,
  `codice` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tipologia` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `specie` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `razza` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `eta_gg` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `eta_all_acquisto` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `note` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nato_e_allevato` tinyint(1) DEFAULT '0',
  `allevato_modo` tinyint(1) DEFAULT '0',
  `razza_a_rischio` tinyint(1) DEFAULT '0',
  `riproduzione` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `causa_inserimento` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `sesso` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `animalis_stella_id_foreign` (`stella_id`),
  CONSTRAINT `animalis_stella_id_foreign` FOREIGN KEY (`stella_id`) REFERENCES `stellas` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `animalis`
--

LOCK TABLES `animalis` WRITE;
/*!40000 ALTER TABLE `animalis` DISABLE KEYS */;
INSERT INTO `animalis` VALUES (1,6,14,5,'123123','Bovino',NULL,NULL,'04-10-2022','23',NULL,0,0,0,'inseminazione artificiale','Rinnovo del patrimonio per fini riproduttivi','2022-11-08 08:25:32','2022-11-10 09:36:05','Femmina'),(2,3,22,7,'826040000147956','Equino','Equide','Shire','09-05-2002','8','Lady Jane\nPassaporto\n528210001346619\n011013010881',0,0,0,'metodi naturali','Prima costituzione del patrimonio','2022-11-08 08:37:53','2022-11-10 07:52:50',NULL),(3,4,22,7,'380011013010882','Equino','Equide','PRE','01-01-1993','17','Esteban Jerenzano \nPassaporto\n000011013010882\n011013010882',0,0,0,'metodi naturali','Prima costituzione del patrimonio','2022-11-10 07:55:40','2022-11-10 07:55:40',NULL),(4,2,22,7,'380011013010885','Equino','Equide','Haflinger','01-04-1998','12','Stella Dogna\nPassaporto\n000011013010885\n011013010885',0,0,0,'metodi naturali','Prima costituzione del patrimonio','2022-11-10 07:58:24','2022-11-10 08:01:50',NULL),(5,2,22,7,'380011013010886','Equino','Equide','Haflinger','01-01-1995','15','Stella\nPassaporto\n000011013010886\n011013010886',0,0,0,'metodi naturali','Prima costituzione del patrimonio','2022-11-10 07:59:50','2022-11-10 08:02:08',NULL),(6,2,22,7,'380011013010889','Equino','Equide','Haflinger','13-02-2006','4','Ettore\nPassaporto\n000011013010889\n011013010889',0,0,0,'metodi naturali','Prima costituzione del patrimonio','2022-11-10 08:01:09','2022-11-10 08:01:56',NULL),(7,5,22,7,'380011013010883','Equino','Equide','Pony Shetland','01-01-1998','12','Noel\nPassaporto\n000011013010883\n011013010883',0,0,0,'metodi naturali','Prima costituzione del patrimonio','2022-11-10 08:03:26','2022-11-10 08:03:26',NULL),(8,5,22,7,'380011013010884','Equino','Equide','Pony Shetland','01-11-2000','10','Pilu\nPassaporto\n000011013010884\n011013010884',0,0,0,'metodi naturali','Prima costituzione del patrimonio','2022-11-10 08:04:36','2022-11-10 08:04:36',NULL),(9,5,22,7,'380011013010887','Equino','Equide','Pony Shetland','01-01-2006','4','Minny\nPassaporto\n000011013010887\n011013010887',0,0,0,'metodi naturali','Prima costituzione del patrimonio','2022-11-10 08:06:19','2022-11-10 08:06:19',NULL),(10,5,22,7,'380011013010888','Equino','Equide','Pony Shetland','20-02-2005','5','Orietta\nPassaporto\n000011013010888\n011013010888',0,0,0,'metodi naturali','Prima costituzione del patrimonio','2022-11-10 08:07:33','2022-11-10 08:07:33',NULL),(11,5,22,7,'380011013010890','Equino','Equide','Pony Shetland','07-03-2005','5','Jan\nPassaporto\n000011013010890\n011013010890',0,0,0,'metodi naturali','Prima costituzione del patrimonio','2022-11-10 08:09:07','2022-11-10 08:09:07',NULL),(12,5,22,7,'0000000000','Equino','Equide','Pony Shetland','01-01-2007','3','Lucy\nPassaporto\n000011013010891',0,0,0,'metodi naturali','Prima costituzione del patrimonio','2022-11-10 08:10:43','2022-11-10 08:10:43',NULL),(13,6,14,5,'asdf1234a','Suino',NULL,NULL,'03-11-2021','12',NULL,0,0,0,'inseminazione artificiale','Rinnovo del patrimonio per estensione azienda','2022-11-10 09:36:36','2022-12-03 12:44:23','Femmina');
/*!40000 ALTER TABLE `animalis` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `assicuraziones`
--

DROP TABLE IF EXISTS `assicuraziones`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `assicuraziones` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `macchine_id` bigint(20) unsigned NOT NULL,
  `compagnia_assicurativa` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `data_di_scadenza` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `la_rinnovo_ogni` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `avvisami_alla_scadenza` tinyint(1) DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `assicuraziones_macchine_id_foreign` (`macchine_id`),
  CONSTRAINT `assicuraziones_macchine_id_foreign` FOREIGN KEY (`macchine_id`) REFERENCES `macchine_e_attrezzis` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=35 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `assicuraziones`
--

LOCK TABLES `assicuraziones` WRITE;
/*!40000 ALTER TABLE `assicuraziones` DISABLE KEYS */;
INSERT INTO `assicuraziones` VALUES (2,2,'',NULL,'',0,'2022-09-22 09:14:29','2022-09-22 09:14:29'),(3,3,'',NULL,'',0,'2022-09-22 09:20:08','2022-09-22 09:20:08'),(4,4,'',NULL,'',0,'2022-09-22 09:22:22','2022-09-22 09:22:22'),(5,5,'',NULL,'',0,'2022-09-22 09:23:14','2022-09-22 09:23:14'),(6,6,'',NULL,'',0,'2022-09-22 09:36:57','2022-09-22 09:36:57'),(7,7,'',NULL,'',0,'2022-09-22 09:37:48','2022-09-22 09:37:48'),(8,8,'',NULL,'',0,'2022-09-22 09:39:03','2022-09-22 09:39:03'),(9,9,'',NULL,'',0,'2022-09-22 09:40:25','2022-09-22 09:40:25'),(10,10,'',NULL,'',0,'2022-09-22 11:40:32','2022-09-22 11:55:22'),(11,11,'',NULL,'',0,'2022-09-22 11:42:27','2022-09-22 11:42:27'),(12,12,'',NULL,'',0,'2022-09-22 11:43:22','2022-09-22 11:43:22'),(13,13,'',NULL,'',0,'2022-09-22 11:44:14','2022-09-22 11:44:14'),(14,14,'',NULL,'',0,'2022-09-22 11:45:04','2022-09-22 11:45:04'),(15,15,'',NULL,'',0,'2022-09-22 11:47:21','2022-09-22 11:47:21'),(16,16,'',NULL,'',0,'2022-09-22 11:48:21','2022-09-22 11:48:21'),(17,17,'',NULL,'',0,'2022-09-22 11:51:06','2022-09-22 11:51:06'),(18,18,'',NULL,'',0,'2022-09-22 11:55:00','2024-06-25 10:10:33'),(19,19,'',NULL,'',0,'2022-09-22 11:58:27','2022-09-22 11:58:27'),(20,20,'',NULL,'',0,'2022-09-22 12:16:56','2022-09-22 12:16:56'),(25,25,'',NULL,'',0,'2022-09-25 18:32:29','2022-09-25 18:32:29'),(26,26,'',NULL,'',0,'2022-09-25 19:54:50','2022-10-24 07:18:06'),(27,27,'',NULL,'',0,'2022-10-01 10:12:41','2022-10-01 10:12:41'),(28,28,'',NULL,'',0,'2022-10-11 09:02:44','2022-10-11 09:02:44'),(29,29,'',NULL,'',0,'2022-10-11 09:10:09','2022-10-11 09:10:09'),(30,30,'',NULL,'',0,'2022-11-08 08:13:33','2022-11-08 08:13:33'),(31,31,'',NULL,'',0,'2022-11-10 07:34:42','2022-11-10 07:34:42'),(32,32,'',NULL,'',0,'2022-11-10 07:36:27','2022-11-10 07:36:27'),(33,33,'',NULL,'',0,'2022-11-10 07:38:40','2022-11-10 07:38:40'),(34,34,'',NULL,'',0,'2022-11-10 07:40:22','2022-11-10 07:40:22');
/*!40000 ALTER TABLE `assicuraziones` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `assistenza_sanitarias`
--

DROP TABLE IF EXISTS `assistenza_sanitarias`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `assistenza_sanitarias` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) unsigned DEFAULT NULL,
  `farm_id` bigint(20) unsigned DEFAULT NULL,
  `animali_id` bigint(20) unsigned DEFAULT NULL,
  `comprovata_necessita` tinyint(1) DEFAULT '0',
  `tipologia_trattamento` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `data` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `assistenza_sanitarias_animali_id_foreign` (`animali_id`),
  CONSTRAINT `assistenza_sanitarias_animali_id_foreign` FOREIGN KEY (`animali_id`) REFERENCES `animalis` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `assistenza_sanitarias`
--

LOCK TABLES `assistenza_sanitarias` WRITE;
/*!40000 ALTER TABLE `assistenza_sanitarias` DISABLE KEYS */;
/*!40000 ALTER TABLE `assistenza_sanitarias` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `attivita_colturalis`
--

DROP TABLE IF EXISTS `attivita_colturalis`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `attivita_colturalis` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) unsigned DEFAULT NULL,
  `farm_id` bigint(20) unsigned DEFAULT NULL,
  `codice` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `inizio` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fine` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `durata` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ora_di_inizio` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `stato` tinyint(1) DEFAULT '0',
  `nascondi` tinyint(1) DEFAULT '0',
  `descrizione` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `lotto_di_campo` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `area_lavorata` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `litri_per_ettaro` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `volume_acqua_utilizzata` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `aggiungi_i_prodotti` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `prodotto_utilizzato` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `quantià_utilizzata` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gg` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `h_gg` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `macchinari_utilizzati` longtext COLLATE utf8mb4_unicode_ci,
  `operai_o_addetti` longtext COLLATE utf8mb4_unicode_ci,
  `nome_processo` longtext COLLATE utf8mb4_unicode_ci,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `attivita_colturalis`
--

LOCK TABLES `attivita_colturalis` WRITE;
/*!40000 ALTER TABLE `attivita_colturalis` DISABLE KEYS */;
INSERT INTO `attivita_colturalis` VALUES (3,2,1,'3','24-09-2022','24-09-2022','2','2022-09-25T18:32:37.572Z',1,0,'02: Trattamento terreno aggiuntivo','2-test lotto di campo','2','2','4',NULL,NULL,NULL,'1','2','2022-09-25 18:32:51','2022-10-07 19:36:04','[25]','[2]',NULL),(17,6,5,'17','09-10-2022','10-10-2022','8.0','2022-10-09T06:30:00.000',1,1,'11: Manutenzione','3-lotto test 1','1.0','0.0','0.0','Concime','2','30.0','2','4','2022-10-11 08:44:09','2022-10-11 09:39:34','[26,27]','[3]','m test'),(18,6,5,'18','11-10-2022','11-10-2022','12.0','2022-10-11T11:15:00.000',0,1,'09: Semina','3-lotto test 1','1.0','0.0','0.0',NULL,NULL,NULL,'1','12','2022-10-11 09:01:33','2022-10-11 09:09:09','[28]','[3]',NULL),(19,6,5,'19','11-10-2022','11-10-2022','3.0','2022-10-11T11:01:00.000',1,1,'09: Semina','3-lotto test 1','1.0','150.0','150.0',NULL,NULL,NULL,'1','3','2022-10-11 09:02:05','2022-10-11 09:39:57','[28]','[3]',NULL),(22,6,5,'22','11-10-2022','11-10-2022','3.0','2022-10-11T11:30:00.000',0,1,'08: Raccolta / Mietitura','3-lotto test 1','1.0',NULL,NULL,NULL,NULL,NULL,'1','3','2022-10-11 09:18:34','2022-10-11 09:18:34','[29]','[3]',NULL),(23,4,3,'23','10-10-2022','10-10-2022','1','2022-10-10T06:00:00.000Z',1,0,'13: Irrigazione','5-bubble serra','0.01',NULL,NULL,NULL,NULL,NULL,'1','1','2022-10-13 08:48:21','2022-10-25 07:39:23','[]','[4,5]','irrigazione'),(24,6,5,'24','02-10-2022','03-10-2022','3.0','2022-10-02T06:00:00.000',1,1,'01: Trattamento terreno','8-test decimale','0.0','125.0','50.0','Piante e semi','6','25.0','2','1.5','2022-10-21 11:55:47','2022-10-21 12:04:27','[28,29]','[3]','test'),(25,6,5,'25','12-10-2022','13-10-2022','5.0','2022-10-12T14:00:00.000',1,1,'05: Lavorazione primaria','3-lotto test 1','0.5','0.0','0.0',NULL,NULL,NULL,'2','2.5','2022-10-21 12:07:01','2022-10-21 12:08:24','[29]','[3]','test l'),(26,6,5,'26','21-10-2022','22-10-2022','1.0','2022-10-21T14:34:00.000',1,1,'06: Lavorazione secondaria','3-lotto test 1','0.1','0.0','0.0',NULL,NULL,NULL,'2','0.5','2022-10-21 12:34:58','2022-10-21 12:35:07','[]','[3]',NULL),(27,14,5,'27','03-12-2022','03-12-2022','2','2022-12-03T09:00:13.269Z',1,0,'13: Irrigazione','3-lotto test 1','1','500','500',NULL,NULL,NULL,'1','2','2022-12-03 12:54:49','2022-12-03 12:54:49','[29]','[6]','Irrigazione'),(28,4,3,'28','06-12-2022','09-12-2022','16','2022-12-05T08:00:15.872Z',1,0,'14: Biofumigazione','7-bubble outdoor','0.04','4300','172',NULL,NULL,NULL,'4','4','2022-12-05 08:18:36','2022-12-05 08:18:36','[]','[5]',NULL);
/*!40000 ALTER TABLE `attivita_colturalis` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `capettis`
--

DROP TABLE IF EXISTS `capettis`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `capettis` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `farm_id` bigint(20) unsigned DEFAULT NULL,
  `nome` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `capetti_licence` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `capetti_mac_base` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `capetti_mac_sonda` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `temp_low` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `hum_low` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `temp_high` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `hum_high` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `capettis`
--

LOCK TABLES `capettis` WRITE;
/*!40000 ALTER TABLE `capettis` DISABLE KEYS */;
INSERT INTO `capettis` VALUES (5,5,'Magazzino','947bd98dee00a37b39a799a7102f6ffa','0000CB6C','0000C3F4','18','30.00','21.00','70'),(11,5,'Stalla','947bd98dee00a37b39a799a7102f6ffa','0000CB6C','0000C3F5','18.50','30','22.5','70');
/*!40000 ALTER TABLE `capettis` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `check_lists`
--

DROP TABLE IF EXISTS `check_lists`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `check_lists` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) unsigned DEFAULT NULL,
  `farm_id` bigint(20) unsigned DEFAULT NULL,
  `checklist` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `check_lists`
--

LOCK TABLES `check_lists` WRITE;
/*!40000 ALTER TABLE `check_lists` DISABLE KEYS */;
INSERT INTO `check_lists` VALUES (2,4,3,'{\"sezione_vegetale\":{\"caratteristiche1\":false,\"caratteristiche2\":false,\"origine1\":false,\"fertilizzazione1\":false,\"fertilizzazione2\":false,\"solo_nel_caso1\":false,\"solo_nel_caso2\":false,\"solo_nel_caso3\":false,\"solo_nel_caso4\":false,\"solo_nel_caso5\":false,\"lotta_contro1\":false,\"lotta_contro2\":false,\"lotta_contro3\":false,\"lotta_contro4\":false,\"lotta_contro5\":false,\"solo_nel_caso_in1\":false,\"rotazione_delle1\":false,\"rotazione_delle2\":false,\"registrazioni1\":false,\"registrazioni2\":false,\"registrazioni3\":false},\"sezione_animale\":{\"caratteristiche1\":false,\"conversione_della1\":false,\"conversione_della2\":false,\"origine_e_riproduzione1\":false,\"origine_e_riproduzione2\":false,\"origine_e_riproduzione3\":false,\"origine_e_riproduzione4\":false,\"origine_e_riproduzione5\":false,\"origine_e_riproduzione6\":false,\"uso_di_animali1\":false,\"uso_di_animali2\":false,\"uso_di_animali3\":false,\"uso_di_animali4\":false,\"uso_di_animali5\":false,\"uso_di_animali6\":false,\"alimentazione1\":false,\"alimentazione2\":false,\"alimentazione3\":false,\"alimentazione4\":false,\"alimentazione5\":false,\"alimentazione6\":false,\"alimentazione7\":false,\"alimentazione8\":false,\"alimentazione9\":false,\"alimentazione10\":false,\"alimentazione11\":false,\"alimentazione12\":false,\"alimentazione13\":false,\"alimentazione14\":false,\"alimentazione15\":false,\"alimentazione16\":false,\"alimentazione17\":false,\"alimentazione18\":false,\"alimentazione19\":false,\"solo_nel_caso1\":false,\"solo_nel_caso2\":false,\"solo_nel_caso3\":false,\"solo_nel_caso4\":false,\"solo_nel_caso5\":false,\"solo_nel_caso6\":false,\"assistenza1\":false,\"assistenza2\":false,\"assistenza3\":false,\"assistenza4\":false,\"assistenza5\":false,\"assistenza6\":false,\"assistenza7\":false,\"assistenza8\":false,\"assistenza9\":false,\"assistenza10\":false,\"assistenza11\":false,\"assistenza12\":false,\"stabulazione1\":false,\"stabulazione2\":false,\"stabulazione3\":false,\"stabulazione4\":false,\"stabulazione5\":false,\"stabulazione6\":false,\"stabulazione7\":false,\"stabulazione8\":false,\"stabulazione9\":false,\"stabulazione10\":false,\"stabulazione11\":false,\"stabulazione12\":false}}','2022-09-23 12:50:46','2022-09-23 14:06:02'),(4,2,1,'{\"sezione_vegetale\":{\"caratteristiche1\":true,\"caratteristiche2\":false,\"origine1\":false,\"fertilizzazione1\":false,\"fertilizzazione2\":false,\"solo_nel_caso1\":false,\"solo_nel_caso2\":false,\"solo_nel_caso3\":false,\"solo_nel_caso4\":false,\"solo_nel_caso5\":false,\"lotta_contro1\":false,\"lotta_contro2\":false,\"lotta_contro3\":false,\"lotta_contro4\":false,\"lotta_contro5\":false,\"solo_nel_caso_in1\":false,\"rotazione_delle1\":false,\"rotazione_delle2\":false,\"registrazioni1\":false,\"registrazioni2\":false,\"registrazioni3\":false},\"sezione_animale\":{\"caratteristiche1\":false,\"conversione_della1\":false,\"conversione_della2\":false,\"origine_e_riproduzione1\":false,\"origine_e_riproduzione2\":false,\"origine_e_riproduzione3\":false,\"origine_e_riproduzione4\":false,\"origine_e_riproduzione5\":false,\"origine_e_riproduzione6\":false,\"uso_di_animali1\":false,\"uso_di_animali2\":false,\"uso_di_animali3\":false,\"uso_di_animali4\":false,\"uso_di_animali5\":false,\"uso_di_animali6\":false,\"alimentazione1\":false,\"alimentazione2\":false,\"alimentazione3\":false,\"alimentazione4\":false,\"alimentazione5\":false,\"alimentazione6\":false,\"alimentazione7\":false,\"alimentazione8\":false,\"alimentazione9\":false,\"alimentazione10\":false,\"alimentazione11\":false,\"alimentazione12\":false,\"alimentazione13\":false,\"alimentazione14\":false,\"alimentazione15\":false,\"alimentazione16\":false,\"alimentazione17\":false,\"alimentazione18\":false,\"alimentazione19\":false,\"solo_nel_caso1\":false,\"solo_nel_caso2\":false,\"solo_nel_caso3\":false,\"solo_nel_caso4\":false,\"solo_nel_caso5\":false,\"solo_nel_caso6\":false,\"assistenza1\":false,\"assistenza2\":false,\"assistenza3\":false,\"assistenza4\":false,\"assistenza5\":false,\"assistenza6\":false,\"assistenza7\":false,\"assistenza8\":false,\"assistenza9\":false,\"assistenza10\":false,\"assistenza11\":false,\"assistenza12\":false,\"stabulazione1\":false,\"stabulazione2\":false,\"stabulazione3\":false,\"stabulazione4\":false,\"stabulazione5\":false,\"stabulazione6\":false,\"stabulazione7\":false,\"stabulazione8\":false,\"stabulazione9\":false,\"stabulazione10\":false,\"stabulazione11\":false,\"stabulazione12\":false}}','2022-09-26 21:04:46','2022-09-26 21:04:46');
/*!40000 ALTER TABLE `check_lists` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `clienti_fornitoris`
--

DROP TABLE IF EXISTS `clienti_fornitoris`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `clienti_fornitoris` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) unsigned DEFAULT NULL,
  `farm_id` bigint(20) unsigned DEFAULT NULL,
  `codice` int(11) DEFAULT NULL,
  `anagrafica_id` bigint(20) unsigned NOT NULL,
  `documento_id` bigint(20) unsigned NOT NULL,
  `referente_id` bigint(20) unsigned NOT NULL,
  `type` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `clienti_fornitoris_anagrafica_id_foreign` (`anagrafica_id`),
  KEY `clienti_fornitoris_documento_id_foreign` (`documento_id`),
  KEY `clienti_fornitoris_referente_id_foreign` (`referente_id`),
  CONSTRAINT `clienti_fornitoris_anagrafica_id_foreign` FOREIGN KEY (`anagrafica_id`) REFERENCES `anagraficas` (`id`) ON DELETE CASCADE,
  CONSTRAINT `clienti_fornitoris_documento_id_foreign` FOREIGN KEY (`documento_id`) REFERENCES `documentos` (`id`) ON DELETE CASCADE,
  CONSTRAINT `clienti_fornitoris_referente_id_foreign` FOREIGN KEY (`referente_id`) REFERENCES `referentes` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `clienti_fornitoris`
--

LOCK TABLES `clienti_fornitoris` WRITE;
/*!40000 ALTER TABLE `clienti_fornitoris` DISABLE KEYS */;
INSERT INTO `clienti_fornitoris` VALUES (1,4,3,1,5,5,1,'clienti','2022-10-20 08:39:39','2022-10-20 08:39:39'),(2,4,3,2,7,7,2,'fornitori','2022-10-20 09:07:09','2022-10-20 09:07:09'),(4,14,5,4,9,9,4,'clienti','2022-10-21 11:26:48','2022-10-21 11:26:48'),(5,14,5,5,10,10,5,'fornitori','2022-10-21 11:34:41','2022-10-21 11:34:41'),(6,22,7,6,11,11,6,'fornitori','2022-11-10 08:14:18','2022-11-10 08:14:18'),(7,22,7,7,12,12,7,'fornitori','2022-11-10 08:19:01','2022-11-10 08:19:01'),(8,22,7,8,13,13,8,'fornitori','2022-11-10 08:22:30','2022-11-10 08:22:30'),(9,14,5,9,14,14,9,'clienti','2022-11-10 09:49:16','2022-11-10 09:49:16'),(10,14,5,10,15,15,10,'fornitori','2022-11-10 09:49:49','2022-11-10 09:49:49');
/*!40000 ALTER TABLE `clienti_fornitoris` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `coltivaziones`
--

DROP TABLE IF EXISTS `coltivaziones`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `coltivaziones` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `lotti_id` bigint(20) unsigned NOT NULL,
  `coltivazione` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `data_di_impianto` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `certificazione` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `numero_anni_di_produzione` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `data_inizio_fioritura` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `data_fine_fioritura` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `data_prima_raccolta` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `produzione_prevista` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `lunghezza` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `larghezza` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `numero_di_piante` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `note` longtext COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `coltivaziones_lotti_id_foreign` (`lotti_id`),
  CONSTRAINT `coltivaziones_lotti_id_foreign` FOREIGN KEY (`lotti_id`) REFERENCES `lotti_di_campos` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `coltivaziones`
--

LOCK TABLES `coltivaziones` WRITE;
/*!40000 ALTER TABLE `coltivaziones` DISABLE KEYS */;
INSERT INTO `coltivaziones` VALUES (2,2,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2022-09-25 18:28:52','2022-09-25 18:28:52'),(3,3,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2022-09-25 19:54:04','2022-09-25 19:54:04'),(4,4,'Convenzionale','15-06-2022',NULL,NULL,'01-08-2022','07-10-2022','08-10-2022',NULL,'50','8','500',NULL,'2022-10-13 08:32:45','2022-10-13 08:32:45'),(5,5,'Convenzionale','15-06-2022',NULL,NULL,'01-08-2022','07-10-2022','08-10-2022',NULL,'50','8','1000',NULL,'2022-10-13 08:34:40','2022-10-13 08:34:40'),(6,6,'Convenzionale','25-06-2022',NULL,NULL,'05-08-2022','01-10-2022','05-10-2022',NULL,NULL,NULL,'70',NULL,'2022-10-13 08:37:17','2022-10-13 08:40:31'),(7,7,'Convenzionale','25-06-2022',NULL,NULL,'05-08-2022','01-10-2022','05-10-2022',NULL,NULL,NULL,'60',NULL,'2022-10-13 08:39:14','2022-10-13 08:40:08'),(8,8,NULL,NULL,'ISO 14001',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2022-10-13 13:06:58','2022-10-17 16:09:52'),(9,9,'Convenzionale',NULL,NULL,'1',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2024-05-28 08:08:10','2024-05-28 08:08:10');
/*!40000 ALTER TABLE `coltivaziones` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `colture_coltivates`
--

DROP TABLE IF EXISTS `colture_coltivates`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `colture_coltivates` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) unsigned DEFAULT NULL,
  `farm_id` bigint(20) unsigned DEFAULT NULL,
  `colore` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `prodotto_coltivato` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `udm` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `specie` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `descrizione` longtext COLLATE utf8mb4_unicode_ci,
  `note` longtext COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `portinnesto` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `consumo_animale` tinyint(1) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `colture_coltivates`
--

LOCK TABLES `colture_coltivates` WRITE;
/*!40000 ALTER TABLE `colture_coltivates` DISABLE KEYS */;
INSERT INTO `colture_coltivates` VALUES (2,2,1,'#00dc7e','Biennale','kg','test coltura',NULL,NULL,'2022-09-25 18:28:13','2022-09-25 18:28:13',NULL,0),(3,6,5,'#393e47','Da taglio','q','test coltura',NULL,NULL,'2022-09-25 19:52:59','2022-09-25 19:52:59',NULL,0),(4,4,3,'#a000ff','Da taglio','kg','grape fruit',NULL,NULL,'2022-10-13 08:23:29','2022-10-13 08:23:29',NULL,0),(5,4,3,'#ff66c2','Da taglio','kg','bubble gum',NULL,NULL,'2022-10-13 08:24:10','2022-10-13 08:24:10',NULL,0),(6,14,5,'#9da115','Da taglio','m^3','mais',NULL,NULL,'2022-12-01 17:13:38','2022-12-01 17:13:38',NULL,1),(7,25,9,'#f34c2a','Annuale','q','riso',NULL,NULL,'2024-05-28 08:06:48','2024-05-28 08:06:48',NULL,0);
/*!40000 ALTER TABLE `colture_coltivates` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `concime_extras`
--

DROP TABLE IF EXISTS `concime_extras`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `concime_extras` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `prodotti_id` int(10) unsigned NOT NULL,
  `ferro` tinyint(1) DEFAULT '0',
  `manganese` tinyint(1) DEFAULT '0',
  `molibdeno` tinyint(1) DEFAULT '0',
  `rame` tinyint(1) DEFAULT '0',
  `boro` tinyint(1) DEFAULT '0',
  `zinco` tinyint(1) DEFAULT '0',
  `nichel` tinyint(1) DEFAULT '0',
  `sodio` tinyint(1) DEFAULT '0',
  `selenio` tinyint(1) DEFAULT '0',
  `alluminio` tinyint(1) DEFAULT '0',
  `silicio` tinyint(1) DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `concime_extras`
--

LOCK TABLES `concime_extras` WRITE;
/*!40000 ALTER TABLE `concime_extras` DISABLE KEYS */;
INSERT INTO `concime_extras` VALUES (1,2,0,0,0,0,0,0,0,0,0,0,0,'2022-10-01 16:58:58','2022-10-01 16:58:58'),(2,19,0,0,0,0,0,0,0,0,0,0,0,'2022-10-20 08:22:40','2022-10-20 08:22:40'),(3,21,0,0,0,0,0,0,0,0,0,0,0,'2022-10-20 08:26:12','2022-10-20 08:26:12'),(4,22,0,0,0,0,0,0,0,0,0,0,0,'2022-10-20 08:27:35','2022-10-20 08:27:35'),(5,23,0,0,0,0,0,0,0,0,0,0,0,'2022-10-20 08:28:41','2022-10-20 08:28:41'),(6,24,0,0,0,0,0,0,0,0,0,0,0,'2022-10-20 08:29:27','2022-10-20 08:29:27');
/*!40000 ALTER TABLE `concime_extras` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `concime_percentages`
--

DROP TABLE IF EXISTS `concime_percentages`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `concime_percentages` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `prodotti_id` int(10) unsigned NOT NULL,
  `azoto` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fosforo` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `potassio` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `calcio` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `magnesio` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `zolfo` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `concime_percentages`
--

LOCK TABLES `concime_percentages` WRITE;
/*!40000 ALTER TABLE `concime_percentages` DISABLE KEYS */;
INSERT INTO `concime_percentages` VALUES (1,2,'0','0','0','0','0','0','2022-10-01 16:58:58','2022-10-01 16:58:58'),(2,19,'0','0','0','0','0','0','2022-10-20 08:22:40','2022-10-20 08:22:40'),(3,21,'0','0','0','0','0','0','2022-10-20 08:26:12','2022-10-20 08:26:12'),(4,22,'0','0','0','0','0','0','2022-10-20 08:27:35','2022-10-20 08:27:35'),(5,23,'0','0','0','0','0','0','2022-10-20 08:28:41','2022-10-20 08:28:41'),(6,24,'0','0','0','0','0','0','2022-10-20 08:29:27','2022-10-20 08:29:27');
/*!40000 ALTER TABLE `concime_percentages` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `documentos`
--

DROP TABLE IF EXISTS `documentos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `documentos` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `tipo_di_documento` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `numero` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ente_di_rilascio` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `data_rilascio` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `data_scadenza` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `data_di_nascita` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `comune_di_nascita` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `documentos`
--

LOCK TABLES `documentos` WRITE;
/*!40000 ALTER TABLE `documentos` DISABLE KEYS */;
INSERT INTO `documentos` VALUES (2,'CI - Carta d\'identità','asdfgds3453','milano','01-09-2022','30-09-2022','31-08-1994','milano','2022-09-25 18:30:47','2022-09-25 18:30:47'),(3,'PP - Passaporto','rgg','sdfgdfg','02-09-2022','11-09-2022','17-09-2022','dfgdfdg','2022-09-25 19:53:39','2022-09-25 19:53:39'),(4,'CI - Carta d\'identità','CA03987CS','comune di alessandria','22-11-2018','19-04-2029','19-04-1988','chieri','2022-10-13 07:21:31','2022-10-13 07:21:31'),(5,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2022-10-20 08:39:39','2022-10-20 08:39:39'),(6,'PG - Patente di guida','U12U21649J','Motorizzazione civile','04-07-2020','20-08-2025','20-08-1968','Dorgali (NU)','2022-10-20 08:43:28','2022-10-20 08:43:28'),(7,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2022-10-20 09:07:09','2022-10-20 09:07:09'),(9,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2022-10-21 11:26:48','2022-10-21 11:26:48'),(10,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2022-10-21 11:34:41','2022-10-21 11:34:41'),(11,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2022-11-10 08:14:18','2022-11-10 08:14:18'),(12,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2022-11-10 08:19:01','2022-11-10 08:19:01'),(13,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2022-11-10 08:22:30','2022-11-10 08:22:30'),(14,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2022-11-10 09:49:16','2022-11-10 09:49:16'),(15,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2022-11-10 09:49:49','2022-11-10 09:49:49'),(16,'CI - Carta d\'identità','sdfsd2q3234324','comune di operaio','05-11-2020','09-11-2025','19-11-1984','operaio','2022-11-10 09:51:15','2022-11-10 09:51:15'),(17,'CI - Carta d\'identità','1','a','10-05-2024','15-05-2024','24-05-2024','e','2024-05-31 14:16:03','2024-05-31 14:16:03');
/*!40000 ALTER TABLE `documentos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `documents`
--

DROP TABLE IF EXISTS `documents`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `documents` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) unsigned DEFAULT NULL,
  `farm_id` bigint(20) unsigned DEFAULT NULL,
  `nome` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pdf` longtext COLLATE utf8mb4_unicode_ci,
  `type` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `documents`
--

LOCK TABLES `documents` WRITE;
/*!40000 ALTER TABLE `documents` DISABLE KEYS */;
INSERT INTO `documents` VALUES (1,1,1,'Allegato 2 - Regolamento UE 889_2008.pdf','documents_pdf/1663940873-Allegato 2 - Regolamento UE 889_2008.pdf','normative','2022-09-23 13:47:53','2022-09-23 13:47:53'),(2,1,1,'Allegato 1 - Regolamento UE 1584_2018.pdf','documents_pdf/1663940880-Allegato 1 - Regolamento UE 1584_2018.pdf','normative','2022-09-23 13:48:00','2022-09-23 13:48:00'),(4,1,1,'Allegato 1 - Regolamento UE 848_2018.pdf','documents_pdf/1666251762-Allegato 1 - Regolamento UE 848_2018.pdf','normative','2022-10-20 07:42:42','2022-10-20 07:42:42'),(6,1,1,'Allegato 5 - Dichiarazione di impegno ai sensi del Reg. UE 848_2018 (ex relazione tecnica)-1 (2 files merged).pdf','documents_pdf/1666251978-Allegato 5 - Dichiarazione di impegno ai sensi del Reg. UE 848_2018 (ex relazione tecnica)-1 (2 files merged).pdf','allegati','2022-10-20 07:46:18','2022-10-20 07:46:18'),(7,1,1,'Allegato 6 - Produzione vegetale-1 (10 files merged).pdf','documents_pdf/1666251993-Allegato 6 - Produzione vegetale-1 (10 files merged).pdf','allegati','2022-10-20 07:46:33','2022-10-20 07:46:33'),(8,1,1,'Allegato 7 - Zootecnia-1 (6 files merged).pdf','documents_pdf/1666252002-Allegato 7 - Zootecnia-1 (6 files merged).pdf','allegati','2022-10-20 07:46:42','2022-10-20 07:46:42'),(9,1,1,'Allegato 8 - Preparazione e importazione-1 (6 files merged).pdf','documents_pdf/1666252012-Allegato 8 - Preparazione e importazione-1 (6 files merged).pdf','allegati','2022-10-20 07:46:52','2022-10-20 07:46:52'),(10,1,1,'Allegato 9 - Gruppo produttori-1 (3 files merged).pdf','documents_pdf/1666252020-Allegato 9 - Gruppo produttori-1 (3 files merged).pdf','allegati','2022-10-20 07:47:00','2022-10-20 07:47:00');
/*!40000 ALTER TABLE `documents` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `failed_jobs`
--

DROP TABLE IF EXISTS `failed_jobs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `failed_jobs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
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
-- Table structure for table `farms`
--

DROP TABLE IF EXISTS `farms`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `farms` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) unsigned DEFAULT NULL,
  `codice` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nome` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `checklist` tinyint(1) DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `farms`
--

LOCK TABLES `farms` WRITE;
/*!40000 ALTER TABLE `farms` DISABLE KEYS */;
INSERT INTO `farms` VALUES (1,NULL,'1','1-Company','2022-09-03 14:50:35','2022-09-03 14:50:35',1),(3,1,'3','3-Chevre S.S.','2022-09-22 07:55:07','2022-10-21 10:12:42',0),(5,2,'5','5-testAzienda','2022-09-25 19:50:46','2022-11-30 21:08:30',0),(7,1,'7','7-Chiara Valtolina','2022-11-04 13:04:38','2022-11-04 13:04:38',0),(8,1,'8','8-Azienda Agricola  Pian delle Fontane','2022-11-08 09:12:00','2022-11-08 09:12:00',1),(9,1,'9','9-Società agricola San Martino A.r.l.','2024-05-15 09:57:45','2024-05-15 09:57:54',1);
/*!40000 ALTER TABLE `farms` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `fattures`
--

DROP TABLE IF EXISTS `fattures`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `fattures` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) unsigned DEFAULT NULL,
  `farm_id` bigint(20) unsigned DEFAULT NULL,
  `nome` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pdf` longtext COLLATE utf8mb4_unicode_ci,
  `type` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `fattures`
--

LOCK TABLES `fattures` WRITE;
/*!40000 ALTER TABLE `fattures` DISABLE KEYS */;
/*!40000 ALTER TABLE `fattures` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `lotti_di_campos`
--

DROP TABLE IF EXISTS `lotti_di_campos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `lotti_di_campos` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) unsigned DEFAULT NULL,
  `farm_id` bigint(20) unsigned DEFAULT NULL,
  `codice` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nome` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `coltura` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `area_util_ha` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `terreno` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `particelle_catastali` longtext COLLATE utf8mb4_unicode_ci,
  `apertura` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `chiusura` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `stagione` tinyint(1) DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `lotti_di_campos`
--

LOCK TABLES `lotti_di_campos` WRITE;
/*!40000 ALTER TABLE `lotti_di_campos` DISABLE KEYS */;
INSERT INTO `lotti_di_campos` VALUES (2,2,1,'2','2-test lotto di campo','test coltura','8','3-test terreno','{\"subTerrenies\":[4,5],\"areaUtilized\":[{\"4\":5},{\"5\":3}]}','25-09-2022','14-06-2023',0,'2022-09-25 18:28:52','2022-09-25 18:28:52'),(3,6,5,'3','3-lotto test 1','test coltura','1','4-test terreno 1','{\"subTerrenies\":[6],\"areaUtilized\":[]}','01-09-2022','30-09-2022',1,'2022-09-25 19:54:04','2022-12-01 17:19:23'),(4,4,3,'4','4-grape serra','grape fruit','0.04','5-Serra','{\"subTerrenies\":[20],\"areaUtilized\":[{\"20\":0.04}]}','15-06-2022','10-10-2022',0,'2022-10-13 08:32:45','2022-10-13 08:32:45'),(5,4,3,'5','5-bubble serra','bubble gum','0.04','5-Serra','{\"subTerrenies\":[19],\"areaUtilized\":[{\"19\":0.04}]}','15-06-2022','10-10-2022',0,'2022-10-13 08:34:40','2022-10-13 08:34:40'),(6,4,3,'6','6-grape outdoor','grape fruit','0.4','7-Campo esterno','{\"subTerrenies\":[25],\"areaUtilized\":[{\"25\":0.4}]}','25-06-2022','05-10-2022',0,'2022-10-13 08:37:17','2022-10-13 08:40:31'),(7,4,3,'7','7-bubble outdoor','bubble gum','0.4','7-Campo esterno','{\"subTerrenies\":[25],\"areaUtilized\":[{\"25\":0.4}]}','25-06-2022','05-10-2022',0,'2022-10-13 08:39:14','2022-10-13 08:40:21'),(8,14,5,'8','8-test decimale','test coltura','0.4','8-test decimali','{\"subTerrenies\":[26],\"areaUtilized\":[]}','03-10-2022','16-08-2023',1,'2022-10-13 13:06:58','2022-12-01 17:13:07'),(9,25,9,'9','9-ACCORDO CIOCCHETTI','riso','0.07000','12-ACCORDO CIOCCHETTI','{\"subTerrenies\":[41],\"areaUtilized\":[]}','01-05-2024','30-11-2024',0,'2024-05-28 08:08:10','2024-06-03 11:17:18');
/*!40000 ALTER TABLE `lotti_di_campos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `macchine_e_attrezzis`
--

DROP TABLE IF EXISTS `macchine_e_attrezzis`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `macchine_e_attrezzis` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) unsigned DEFAULT NULL,
  `farm_id` bigint(20) unsigned DEFAULT NULL,
  `codice` int(11) DEFAULT NULL,
  `nome_macch_attr` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `marca_produttore` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `numero_di_matricola` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `data_acq` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ore_di_lavoro_alla_registrazione` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ore_di_lavoro_calcolate` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `km_di_lavoro_attuali` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tipologia` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `foto` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `modello` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `descrizione` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `utilizzo_di_carburante` tinyint(1) DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=35 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `macchine_e_attrezzis`
--

LOCK TABLES `macchine_e_attrezzis` WRITE;
/*!40000 ALTER TABLE `macchine_e_attrezzis` DISABLE KEYS */;
INSERT INTO `macchine_e_attrezzis` VALUES (2,4,3,2,'2-MT standard 50/75','master trimmers','2208',NULL,'0',NULL,'0','Attrezzi',NULL,'MT standard 50/75',NULL,0,'2022-09-22 09:14:29','2022-09-22 09:14:29'),(3,4,3,3,'3-MB bucker 500','master trimmers','284-313',NULL,'0',NULL,'0','Attrezzi',NULL,'MB bucker 500',NULL,0,'2022-09-22 09:20:08','2022-09-22 09:20:08'),(4,4,3,4,'4-MT tumbler 500/500 MED','master trimmers','2006',NULL,'0',NULL,'0','Attrezzi',NULL,'MT tumbler 500/500 MED',NULL,0,'2022-09-22 09:22:22','2022-09-22 09:22:22'),(5,4,3,5,'5-MT tumbler 500/500 MED','master trimmers','2007',NULL,'0',NULL,'0','Attrezzi',NULL,'MT tumbler 500/500 MED',NULL,0,'2022-09-22 09:23:14','2022-09-22 09:23:14'),(6,4,3,6,'6-trim filter 500','master trimmers','21177',NULL,'0',NULL,'0','Attrezzi',NULL,'trim filter 500',NULL,0,'2022-09-22 09:36:56','2022-09-22 09:36:56'),(7,4,3,7,'7-trim filter 500','master trimmers','21179',NULL,'0',NULL,'0','Attrezzi',NULL,'trim filter 500',NULL,0,'2022-09-22 09:37:48','2022-09-22 09:37:48'),(8,4,3,8,'8-nastro di entrata','master trimmers',NULL,NULL,'0',NULL,'0','Attrezzi',NULL,'nastro di entrata',NULL,0,'2022-09-22 09:39:03','2022-09-22 09:39:03'),(9,4,3,9,'9-nastro di uscita','master trimmers',NULL,NULL,'0',NULL,'0','Attrezzi',NULL,'nastro di uscita',NULL,0,'2022-09-22 09:40:25','2022-09-22 09:40:25'),(10,4,3,10,'10-deumidificatore industriale','fral','1140016501',NULL,'0',NULL,'0','Attrezzi',NULL,'fd160',NULL,0,'2022-09-22 11:40:32','2022-09-22 11:55:22'),(11,4,3,11,'11-condizionatore portatile','fral','1150002830',NULL,'0',NULL,'0','Attrezzi',NULL,'fdnp96s',NULL,0,'2022-09-22 11:42:27','2022-09-22 11:42:27'),(12,4,3,12,'12-condizionatore portatile','fral','1150002687',NULL,'0',NULL,'0','Attrezzi',NULL,'fdnp96s',NULL,0,'2022-09-22 11:43:22','2022-09-22 11:43:22'),(13,4,3,13,'13-condizionatore portatile','fral','1150002828',NULL,'0',NULL,'0','Attrezzi',NULL,'fdnp96s',NULL,0,'2022-09-22 11:44:14','2022-09-22 11:44:14'),(14,4,3,14,'14-condizionatore portatile','fral','1150003492',NULL,'0',NULL,'0','Attrezzi',NULL,'fdnp96s',NULL,0,'2022-09-22 11:45:04','2022-09-22 11:45:04'),(15,4,3,15,'15-circolatore aria','termotecnica pericoli','A182100001',NULL,'0',NULL,'0','Attrezzi',NULL,'ACF18',NULL,0,'2022-09-22 11:47:20','2022-09-22 11:47:20'),(16,4,3,16,'16-circolatore aria','termotecnica pericoli','182000215',NULL,'0',NULL,'0','Attrezzi',NULL,'ACF18',NULL,0,'2022-09-22 11:48:21','2022-09-22 11:48:21'),(17,4,3,17,'17-estrattore aria','termotecnica pericoli','WD262100397',NULL,'0',NULL,'0','Attrezzi',NULL,'EWD26',NULL,0,'2022-09-22 11:51:06','2022-09-22 11:51:06'),(18,4,3,18,'18-opticlimate','opticlimate','JFM00252102000318',NULL,'0',NULL,'0','Attrezzi',NULL,'L15000 pro4 inverter',NULL,0,'2022-09-22 11:55:00','2024-06-25 10:10:33'),(19,4,3,19,'19-water chiller','air supplies','2206190-1-2',NULL,'0',NULL,'0','Attrezzi',NULL,'OC water cooler 17Kw industrial',NULL,0,'2022-09-22 11:58:27','2022-09-22 11:58:27'),(20,4,3,20,'20-aspirapolvere','IPC cleaning','22-230067',NULL,'0',NULL,'0','Attrezzi',NULL,'Flash',NULL,0,'2022-09-22 12:16:56','2022-09-22 12:16:56'),(25,2,1,25,'25-test macchinario',NULL,NULL,NULL,'0','2','0','Attrezzi',NULL,NULL,NULL,0,'2022-09-25 18:32:29','2022-09-25 18:32:29'),(26,14,5,26,'26-test macchina 1','MarcaTest',NULL,NULL,'0','106.0','0','Motozappa','fotos/1666595886-motozzappa.jpeg','1z55',NULL,0,'2022-09-25 19:54:50','2022-10-24 07:18:06'),(27,6,5,27,'27-test attrezzo 2',NULL,NULL,NULL,'0','6.0','0','Attrezzi',NULL,NULL,NULL,0,'2022-10-01 10:12:41','2022-10-01 10:12:41'),(28,14,5,28,'28-test attrezzo 3',NULL,NULL,NULL,'0','17.0','0','Rimorchio',NULL,NULL,NULL,0,'2022-10-11 09:02:44','2022-10-11 09:02:44'),(29,14,5,29,'29-test trattore',NULL,NULL,NULL,'0','13','0','Mietitrebbia',NULL,NULL,NULL,0,'2022-10-11 09:10:09','2022-10-11 09:10:09'),(30,22,7,30,'30-Jeep Wrangler','Jeep','BGA10119',NULL,'0',NULL,'0','Altro',NULL,'Wrangler',NULL,1,'2022-11-08 08:13:33','2022-11-08 08:13:33'),(31,22,7,31,'31-Carro agricolo',NULL,NULL,'13-09-2018','0',NULL,'0','Rimorchio',NULL,NULL,'Carro per letame',0,'2022-11-10 07:34:42','2022-11-10 07:34:42'),(32,22,7,32,'32-Decespugliatore a scoppio','GGP','01','12-06-2014','0',NULL,'0','Tagliaerba',NULL,'Castor',NULL,1,'2022-11-10 07:36:27','2022-11-10 07:36:27'),(33,22,7,33,'33-Motosega a scoppio','Stihl','02','04-10-2017','0',NULL,'0','Altro',NULL,'MS170',NULL,0,'2022-11-10 07:38:40','2022-11-10 07:38:40'),(34,22,7,34,'34-Soffiatore elettrico','Bosch','03','30-09-2011','0',NULL,'0','Altro',NULL,'Universal Garden Tidy',NULL,0,'2022-11-10 07:40:22','2022-11-10 07:40:22');
/*!40000 ALTER TABLE `macchine_e_attrezzis` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `magazzinis`
--

DROP TABLE IF EXISTS `magazzinis`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `magazzinis` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) unsigned DEFAULT NULL,
  `farm_id` bigint(20) unsigned DEFAULT NULL,
  `codice` int(11) DEFAULT NULL,
  `nome` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `note` longtext COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `magazzinis`
--

LOCK TABLES `magazzinis` WRITE;
/*!40000 ALTER TABLE `magazzinis` DISABLE KEYS */;
INSERT INTO `magazzinis` VALUES (3,4,3,3,'3-cella 1',NULL,'2022-09-22 12:28:39','2022-10-20 07:52:48'),(4,4,3,4,'4-cella 2',NULL,'2022-09-22 12:29:09','2022-10-20 07:52:40'),(5,6,5,5,'5-magazzino test',NULL,'2022-10-01 17:22:53','2022-10-01 17:22:53'),(6,4,3,6,'6-Laboratorio',NULL,'2022-10-20 07:51:45','2022-10-20 07:51:45'),(7,4,3,7,'7-Magazzino fertilizzanti',NULL,'2022-10-20 08:20:23','2022-10-20 08:20:23'),(8,22,7,8,'8-Deposito fieno',NULL,'2022-11-08 07:50:39','2022-11-08 07:50:40'),(9,14,5,9,'9-prova',NULL,'2022-11-08 08:06:53','2022-11-08 08:06:53'),(10,22,7,10,'10-Magazzino mangimi',NULL,'2022-11-10 07:23:27','2022-11-10 07:23:27');
/*!40000 ALTER TABLE `magazzinis` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `manualis`
--

DROP TABLE IF EXISTS `manualis`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `manualis` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) unsigned DEFAULT NULL,
  `farm_id` bigint(20) unsigned DEFAULT NULL,
  `nome` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pdf` longtext COLLATE utf8mb4_unicode_ci,
  `type` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `manualis`
--

LOCK TABLES `manualis` WRITE;
/*!40000 ALTER TABLE `manualis` DISABLE KEYS */;
INSERT INTO `manualis` VALUES (6,4,3,'PROTOCOLLO CANAPA .pdf','documents_pdf/manuali/1666252131-PROTOCOLLO CANAPA .pdf','manuali','2022-10-20 07:48:51','2022-10-20 07:48:51'),(7,2,1,'Manuale utente.pdf','documents_pdf/manuali/1666595689-Manuale utente.pdf','manuali','2022-10-24 07:14:49','2022-10-24 07:14:49');
/*!40000 ALTER TABLE `manualis` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=56 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES (1,'2014_10_12_000000_create_users_table',1),(2,'2014_10_12_100000_create_password_resets_table',1),(3,'2019_08_19_000000_create_failed_jobs_table',1),(4,'2019_12_14_000001_create_personal_access_tokens_table',1),(5,'2022_06_13_181518_add_columns_in_users_table',1),(6,'2022_06_15_071847_create_terrenis_table',1),(7,'2022_06_15_072306_create_sub_terrenis_table',1),(8,'2022_06_17_200750_create_colture_coltivates_table',1),(9,'2022_06_21_062013_add_portinnesto_column_in_colture_coltivates_table',1),(10,'2022_06_21_062607_create_prodottis_table',1),(11,'2022_06_21_065202_create_concime_extras_table',1),(12,'2022_06_22_123549_create_concime_percentages_table',1),(13,'2022_06_29_134733_create_anagraficas_table',1),(14,'2022_06_29_135203_create_documentos_table',1),(15,'2022_06_29_135328_create_referentes_table',1),(16,'2022_06_29_135500_create_clienti_fornitoris_table',1),(17,'2022_06_30_054543_create_teams_table',1),(18,'2022_06_30_193804_create_magazzinis_table',1),(19,'2022_07_04_145514_add_columns_quantity_in_prodottis_table',1),(20,'2022_07_04_173734_create_movementis_table',1),(21,'2022_07_06_100218_create_macchine_e_attrezzis_table',1),(22,'2022_07_06_100544_create_assicuraziones_table',1),(23,'2022_07_07_225047_create_lotti_di_campos_table',1),(24,'2022_07_07_225344_create_coltivaziones_table',1),(25,'2022_07_09_171220_create_attivita_colturalis_table',1),(26,'2022_07_10_154201_add_column_in_attivita_colturalis_table',1),(27,'2022_07_15_125630_add_concime_tipologia_column_in_prodottis_table',1),(28,'2022_07_15_130314_add_consumo_animale_column_in_colture_coltivates_table',1),(29,'2022_07_15_130636_add_suolo_vivo_column_in_terrenis_table',1),(30,'2022_07_23_103756_create_stellas_table',1),(31,'2022_07_23_110820_create_animalis_table',1),(32,'2022_07_23_121641_create_alimentis_table',1),(33,'2022_07_23_123650_create_assistenza_sanitarias_table',1),(34,'2022_08_01_175954_create_alimentaziones_table',1),(35,'2022_08_01_191625_create_farms_table',1),(36,'2022_08_08_180115_add_farm_id_in_users_table',1),(37,'2022_08_19_180616_create_documents_table',1),(38,'2022_09_13_110754_create_check_lists_table',2),(39,'2022_09_26_163449_attivita_colturalis',3),(40,'2022_09_26_171628_attivita_colturalis',4),(41,'2022_09_26_202222_users',5),(42,'2022_09_26_202421_farms',5),(43,'2022_09_27_063012_create_fattures_table',6),(44,'2022_09_27_063212_create_manualis_table',6),(45,'2022_10_10_204245_users_operaioid_field',7),(46,'2022_11_10_102445_animalis_sesso_field',8),(47,'2022_11_10_192535_farms_capetti_field',9),(48,'2022_11_10_302135_farms_capetti_mac_field',10),(49,'2022_12_03_101235_create_capettis_table',11),(50,'2022_12_03_093832_farms_delete_capetti_field',12),(51,'2022_12_03_105922_reset_capettis_table',13),(52,'2022_12_03_110212_change_capettis_table',14),(53,'2022_12_03_205225_create_sondas_table',15),(54,'2022_12_03_205515_remove_sondas_table',16),(55,'2022_12_04_121114_create_capettis_table',17);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `movementis`
--

DROP TABLE IF EXISTS `movementis`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `movementis` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) unsigned DEFAULT NULL,
  `farm_id` bigint(20) unsigned DEFAULT NULL,
  `nome_prodotto` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `magazzino_di_stoccaggio` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `q_ta_scaricata` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `q_ta_caricata` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `data` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `rif_fattura` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `causale` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cliente_fornitore` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=43 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `movementis`
--

LOCK TABLES `movementis` WRITE;
/*!40000 ALTER TABLE `movementis` DISABLE KEYS */;
INSERT INTO `movementis` VALUES (1,1,1,'2-Gasolio agricolo','2-Serbatoio carburanti',NULL,'500','08-09-2022',NULL,'Inserimento iniziale',NULL,'2022-09-08 07:13:46','2022-09-08 07:13:46'),(2,1,1,'2-Gasolio agricolo','2-Serbatoio carburanti','100',NULL,'08-09-2022',NULL,'1-Rossi Claudio - Pieno',NULL,'2022-09-08 07:16:47','2022-09-08 07:16:47'),(3,1,1,'2-Gasolio agricolo','2-Serbatoio carburanti','300',NULL,'08-09-2022',NULL,'Operaz. colturale: 05: Raccolta / Mietitura',NULL,'2022-09-08 07:30:51','2022-09-08 07:30:51'),(4,1,1,'2-Gasolio agricolo','2-Serbatoio carburanti','3',NULL,'08-09-2022',NULL,'Operaz. colturale: 02: Trattamento terreno aggiuntivo',NULL,'2022-09-08 07:53:42','2022-09-08 07:53:42'),(5,6,5,'2-Fertilizzante test','5-magazzino test',NULL,'100','01-10-2022','asdf',NULL,NULL,'2022-10-01 17:23:05','2022-10-01 17:23:05'),(6,6,5,'2-Fertilizzante test','5-magazzino test','1',NULL,'01-10-2022',NULL,'Operaz. colturale: 07: Concimazione',NULL,'2022-10-01 17:23:17','2022-10-01 17:23:17'),(7,6,5,'2-Fertilizzante test','5-magazzino test','2',NULL,'06-10-2022',NULL,'Operaz. colturale: 04: Trattamento del raccolto',NULL,'2022-10-06 19:15:30','2022-10-06 19:15:30'),(8,6,5,'3-Seme test','5-magazzino test',NULL,'1000','10-10-2022','asdf',NULL,NULL,'2022-10-10 19:21:41','2022-10-10 19:21:41'),(9,14,5,'6-Seme test 2','5-magazzino test',NULL,'500','11-10-2022',NULL,'Inserimento iniziale',NULL,'2022-10-10 22:02:31','2022-10-10 22:02:31'),(10,6,5,'2-Fertilizzante test','5-magazzino test','27',NULL,'11-10-2022',NULL,'Operaz. colturale: 11: Manutenzione',NULL,'2022-10-11 08:49:56','2022-10-11 08:49:56'),(11,6,5,'2-Fertilizzante test','5-magazzino test','27.0',NULL,'11-10-2022',NULL,'Operaz. colturale: 11: Manutenzione',NULL,'2022-10-11 08:51:24','2022-10-11 08:51:24'),(12,6,5,'2-Fertilizzante test','5-magazzino test','30',NULL,'11-10-2022',NULL,'Operaz. colturale: 11: Manutenzione',NULL,'2022-10-11 08:58:34','2022-10-11 08:58:34'),(13,6,5,'2-Fertilizzante test','5-magazzino test','25',NULL,'11-10-2022',NULL,'Operaz. colturale: 11: Manutenzione',NULL,'2022-10-11 09:00:06','2022-10-11 09:00:06'),(14,6,5,'2-Fertilizzante test','5-magazzino test','30',NULL,'11-10-2022',NULL,'Operaz. colturale: 11: Manutenzione',NULL,'2022-10-11 09:00:28','2022-10-11 09:00:28'),(15,6,5,'2-Fertilizzante test','5-magazzino test','30.0',NULL,'11-10-2022',NULL,'Operaz. colturale: 11: Manutenzione',NULL,'2022-10-11 09:39:34','2022-10-11 09:39:34'),(16,4,3,'7-greenhouse grape fruit','6-Laboratorio',NULL,'8.2','20-10-2022',NULL,'Inserimento iniziale',NULL,'2022-10-20 07:56:57','2022-10-20 07:56:57'),(17,4,3,'8-Super (21) - Fiori grandi','6-Laboratorio',NULL,'1.3','20-10-2022',NULL,'Inserimento iniziale',NULL,'2022-10-20 07:56:59','2022-10-20 07:56:59'),(18,4,3,'9-Super 21 - Fiori piccoli','6-Laboratorio',NULL,'18.6','20-10-2022',NULL,'Inserimento iniziale',NULL,'2022-10-20 07:57:52','2022-10-20 07:57:52'),(19,4,3,'10-outdoor grape fruit','6-Laboratorio',NULL,'1.5','20-10-2022',NULL,'Inserimento iniziale',NULL,'2022-10-20 07:58:21','2022-10-20 07:58:21'),(20,4,3,'11-Blue Berry - Fiori piccoli','6-Laboratorio',NULL,'15','20-10-2022',NULL,'Inserimento iniziale',NULL,'2022-10-20 07:59:06','2022-10-20 07:59:06'),(21,4,3,'12-bio lemon','6-Laboratorio',NULL,'8','20-10-2022',NULL,'Inserimento iniziale',NULL,'2022-10-20 07:59:18','2022-10-20 07:59:18'),(22,4,3,'13-Repsol (21) - Fiori piccoli','6-Laboratorio',NULL,'7.48','20-10-2022',NULL,'Inserimento iniziale',NULL,'2022-10-20 08:00:19','2022-10-20 08:00:19'),(23,4,3,'14-G.','6-Laboratorio',NULL,'1.4','20-10-2022',NULL,'Inserimento iniziale',NULL,'2022-10-20 08:00:25','2022-10-20 08:00:25'),(24,4,3,'15-G','6-Laboratorio',NULL,'17.6','20-10-2022',NULL,'Inserimento iniziale',NULL,'2022-10-20 08:02:18','2022-10-20 08:02:18'),(25,4,3,'16-G (21)','6-Laboratorio',NULL,'1.4','20-10-2022',NULL,'Inserimento iniziale',NULL,'2022-10-20 08:11:24','2022-10-20 08:11:24'),(26,4,3,'17-super','6-Laboratorio',NULL,'1.3','20-10-2022',NULL,'Inserimento iniziale',NULL,'2022-10-20 08:13:25','2022-10-20 08:13:25'),(27,4,3,'18-super','6-Laboratorio',NULL,'18.6','20-10-2022',NULL,'Inserimento iniziale',NULL,'2022-10-20 08:14:53','2022-10-20 08:14:53'),(28,6,5,'6-Seme test 2','5-magazzino test','25',NULL,'21-10-2022',NULL,'Operaz. colturale: 01: Trattamento terreno',NULL,'2022-10-21 11:55:48','2022-10-21 11:55:48'),(29,6,5,'6-Seme test 2','5-magazzino test','25.0',NULL,'21-10-2022',NULL,'Operaz. colturale: 01: Trattamento terreno',NULL,'2022-10-21 12:04:28','2022-10-21 12:04:28'),(30,14,5,'25-test no costo','5-magazzino test',NULL,'1000','21-10-2022','1234','produzione interna',NULL,'2022-10-21 13:41:24','2022-10-21 13:41:24'),(31,22,7,'27-Fieno maggengo 1°taglio, formato da 250 Kg','8-Deposito fieno',NULL,'5','10-11-2022',NULL,'Inserimento iniziale',NULL,'2022-11-10 07:19:01','2022-11-10 07:19:01'),(32,22,7,'28-Moretti CAV50, sacco da 25 Kg','8-Deposito fieno',NULL,'15','10-11-2022',NULL,'Inserimento iniziale',NULL,'2022-11-10 07:23:13','2022-11-10 07:23:13'),(33,22,7,'29-Moretti CAV70, sacco da 25 Kg','10-Magazzino mangimi',NULL,'10','10-11-2022',NULL,'Inserimento iniziale',NULL,'2022-11-10 07:24:45','2022-11-10 07:24:45'),(34,22,7,'30-Scandinavia Trotting 13, sacco da 25 Kg','10-Magazzino mangimi',NULL,'10','10-11-2022',NULL,'Inserimento iniziale',NULL,'2022-11-10 07:26:42','2022-11-10 07:26:42'),(35,22,7,'31-Barbabietole pallettate Molino Airoldi, sacco da 40 Kg','10-Magazzino mangimi',NULL,'3','10-11-2022',NULL,'Inserimento iniziale',NULL,'2022-11-10 07:29:40','2022-11-10 07:29:40'),(36,22,7,'32-Orzo essiccato Molino Airoldi, sacco da 25 Kg','10-Magazzino mangimi',NULL,'5','10-11-2022',NULL,'Inserimento iniziale',NULL,'2022-11-10 07:31:33','2022-11-10 07:31:33'),(37,22,7,'33-Truciolo per lettiera Avipur San, sacco da 20 Kg','8-Deposito fieno',NULL,'8','10-11-2022',NULL,'Inserimento iniziale',NULL,'2022-11-10 07:33:16','2022-11-10 07:33:16'),(38,14,5,'6-Seme test 2','5-magazzino test','400',NULL,'01-12-2022',NULL,NULL,'9-cliente test','2022-12-01 20:54:51','2022-12-01 20:54:51'),(39,14,5,'5-Diesel','5-magazzino test',NULL,'1000','02-12-2022','asdf','test rifornimento',NULL,'2022-12-02 17:11:34','2022-12-02 17:11:34'),(40,14,5,'5-Diesel','5-magazzino test','915',NULL,'02-12-2022',NULL,NULL,'4-Cliente1 nome','2022-12-02 17:15:23','2022-12-02 17:15:23'),(41,14,5,'5-Diesel','5-magazzino test','55',NULL,'02-12-2022',NULL,NULL,'9-cliente test','2022-12-02 18:40:27','2022-12-02 18:40:27'),(42,4,3,'24-Hesi Boost','7-Magazzino fertilizzanti',NULL,'2','05-12-2022','0000000',NULL,NULL,'2022-12-05 08:15:11','2022-12-05 08:15:11');
/*!40000 ALTER TABLE `movementis` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
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
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) unsigned NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`)
) ENGINE=InnoDB AUTO_INCREMENT=403 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `personal_access_tokens`
--

LOCK TABLES `personal_access_tokens` WRITE;
/*!40000 ALTER TABLE `personal_access_tokens` DISABLE KEYS */;
INSERT INTO `personal_access_tokens` VALUES (19,'App\\Models\\User',3,'API Token','fbcce2fece7451741c389adbb267f140920b6574f0d2b2719b606237ca654a67','[\"*\"]','2022-09-22 08:02:52','2022-09-22 07:59:15','2022-09-22 08:02:52'),(35,'App\\Models\\User',5,'API Token','9bd6c719588cb96136aad223d638ce6da0999659efef0f346253d12462c3f5aa','[\"*\"]',NULL,'2022-09-25 13:17:15','2022-09-25 13:17:15'),(334,'App\\Models\\User',14,'API Token','4101085cfd00d019bf26701ac00f26005de0a7e6588d534bdcd1933e654f7d44','[\"*\"]','2022-12-03 18:37:45','2022-12-03 18:25:18','2022-12-03 18:37:45'),(335,'App\\Models\\User',14,'API Token','77ec060e1cfd3ca827452f7b5ba7561e35a06969e8cf35151ebadaf7c905b54b','[\"*\"]','2022-12-04 09:54:43','2022-12-03 18:47:03','2022-12-04 09:54:43'),(336,'App\\Models\\User',14,'API Token','0ba740cae61b76d1845fbc275703d6421fcdaa8f5f079a2b9fb21dc6619bbbd5','[\"*\"]','2022-12-09 10:58:23','2022-12-04 09:57:51','2022-12-09 10:58:23'),(337,'App\\Models\\User',14,'API Token','cf95e0a9a5a8f12cb313acef8ac357a1120fc7c10bada7dc9b17295c9e47540a','[\"*\"]','2022-12-04 10:46:43','2022-12-04 09:58:36','2022-12-04 10:46:43'),(338,'App\\Models\\User',14,'API Token','98ebad99d38a8947d3987879da33563ade3aefb5c1109198957173fa0bc50dbe','[\"*\"]','2023-04-12 08:02:23','2022-12-04 13:20:38','2023-04-12 08:02:23'),(349,'App\\Models\\User',6,'API Token','6bad93fd2d61516b0c5363997ba10ab93e52b1f841bf8e734f8305894e5c0f20','[\"*\"]','2023-03-01 19:11:05','2022-12-16 11:59:31','2023-03-01 19:11:05'),(373,'App\\Models\\User',24,'API Token','2a48c5db0d7226ddc4f746fa1e514234f3eeb5948b37e94e01d5336c253141a9','[\"*\"]','2023-03-22 11:12:00','2023-03-22 11:00:49','2023-03-22 11:12:00'),(391,'App\\Models\\User',25,'API Token','504164c9a82eca3c3cd5cd87755b25177f9412c9729dd4b5e12f30561b2002a1','[\"*\"]','2024-05-15 10:04:16','2024-05-15 10:02:23','2024-05-15 10:04:16'),(393,'App\\Models\\User',25,'API Token','29361964af86e5dbdad67695312b654b34e8f6296f543bb1f2938ed10395f2c6','[\"*\"]','2024-05-28 08:08:10','2024-05-28 07:33:31','2024-05-28 08:08:10'),(395,'App\\Models\\User',1,'API Token','e084905982b68c5557b1695be9b65ef83f8a21d72621404d4c94b36bcac18866','[\"*\"]','2024-06-26 12:59:36','2024-05-31 13:33:31','2024-06-26 12:59:36'),(396,'App\\Models\\User',25,'API Token','8e14ec06bff2f7bdf2774dcc32b0037d0652f890ae5c576d84fff2e4edda1bcf','[\"*\"]','2024-06-03 10:23:29','2024-06-03 10:08:08','2024-06-03 10:23:29'),(397,'App\\Models\\User',25,'API Token','62bbabc82b1bb2592686f677b9ebdc2d26e3f0c1150772f665fdbbee3555551a','[\"*\"]','2024-06-03 11:20:12','2024-06-03 10:25:06','2024-06-03 11:20:12'),(398,'App\\Models\\User',25,'API Token','9e45732bca2a4be456580c37a99af368951ad2e1575c3a846b285417a36591b6','[\"*\"]','2024-06-04 12:52:06','2024-06-04 09:06:01','2024-06-04 12:52:06'),(399,'App\\Models\\User',25,'API Token','8903276a4e3f191f3f215c9a029d9f409d61e4050022ed5fb0be766c9b429ebb','[\"*\"]','2024-06-11 09:35:06','2024-06-11 09:07:02','2024-06-11 09:35:06'),(400,'App\\Models\\User',4,'API Token','633b1cce14f2cba7c7d234b1d11573740508033ad7881baedf3d998e40354b18','[\"*\"]','2024-06-24 15:01:40','2024-06-19 08:22:18','2024-06-24 15:01:40'),(401,'App\\Models\\User',4,'API Token','573d3d2a19d9e987cb0b543c95501d6458161f48f4bdeeab3ef9206695403f17','[\"*\"]','2024-06-20 20:43:22','2024-06-20 20:42:47','2024-06-20 20:43:22'),(402,'App\\Models\\User',4,'API Token','dad250ea7c129cf660354c49e3bc22cf6e774130894f2d1004f8ad04a10ebfdb','[\"*\"]','2024-06-25 10:28:37','2024-06-25 10:09:39','2024-06-25 10:28:37');
/*!40000 ALTER TABLE `personal_access_tokens` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `prodottis`
--

DROP TABLE IF EXISTS `prodottis`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `prodottis` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) unsigned DEFAULT NULL,
  `farm_id` bigint(20) unsigned DEFAULT NULL,
  `codice` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nome_prodotto` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `descrizione` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tipologia` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `iva` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `categoria` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `udm` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `p_netto` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `p_lordo` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `note` longtext COLLATE utf8mb4_unicode_ci,
  `magazzino_di_stoccaggio` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `giacenza_iniziale` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `soglia_minima` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tipologia_prodotto` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `autorizzato_biologico` tinyint(1) DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `q_ta_scaricata` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `q_ta_caricata` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `data_ultimo_carico` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `data_ultimo_scarico` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `rif_fattura` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `causale` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cliente_fornitore` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `concime_tipologia` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=34 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `prodottis`
--

LOCK TABLES `prodottis` WRITE;
/*!40000 ALTER TABLE `prodottis` DISABLE KEYS */;
INSERT INTO `prodottis` VALUES (1,6,5,'1','1-Fitofarmaco test',NULL,'Fitofarmaco','10',NULL,'L','10.80','12',NULL,'Prodotti senza magazzino','0','0',NULL,0,'2022-10-01 16:58:39','2022-10-01 16:58:39',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(2,6,5,'2','2-Fertilizzante test',NULL,'Concime','0',NULL,'kg','2.00','2',NULL,'5-magazzino test','40','0',NULL,0,'2022-10-01 16:58:58','2022-10-11 09:39:34','117','100','01-10-2022','11-10-2022','asdf','Operaz. colturale: 11: Manutenzione',NULL,'Compost attivato con preparati diversi'),(3,6,5,'3','3-Seme test',NULL,'Piante e semi','22','Semi','m^2','9.36','12',NULL,'5-magazzino test','1000','0',NULL,0,'2022-10-01 17:03:42','2022-10-10 19:21:41',NULL,'1000','10-10-2022',NULL,'asdf',NULL,NULL,NULL),(4,6,5,'4','4-prodotto generico test',NULL,'Generico','0',NULL,'cad.','1.00','1',NULL,'Prodotti senza magazzino','0','0','Pezzi di ricambio',0,'2022-10-01 17:04:01','2022-10-01 17:04:01',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(5,6,5,'5','5-Diesel',NULL,'Generico','20',NULL,'L','1.59','1.99',NULL,'5-magazzino test','30','50',NULL,0,'2022-10-01 17:05:59','2022-12-02 18:40:27','970','1000','02-12-2022','02-12-2022','asdf','test rifornimento','9-cliente test',NULL),(6,14,5,'6','6-Seme test 2',NULL,'Piante e semi','10','Sovescio','kg','110.70','123',NULL,'5-magazzino test','75','100',NULL,1,'2022-10-10 22:02:30','2022-12-01 20:54:51','450','500','11-10-2022','01-12-2022',NULL,'Operaz. colturale: 01: Trattamento terreno','9-cliente test',NULL),(7,4,3,'7','7-greenhouse grape fruit',NULL,'Generico','0','prodotto per vendita','kg','0.00','000',NULL,'6-Laboratorio','8.2','0',NULL,0,'2022-10-20 07:56:57','2022-10-20 07:56:57',NULL,'8.2','20-10-2022',NULL,NULL,'Inserimento iniziale',NULL,NULL),(8,4,3,'8','8-Super (21)','fiori grandi','Generico','0','Prodotto per vendita','kg','0.00','0',NULL,'6-Laboratorio','1.3','0',NULL,0,'2022-10-20 07:56:59','2022-10-20 08:12:44',NULL,'1.3','20-10-2022',NULL,NULL,'Inserimento iniziale',NULL,NULL),(10,4,3,'10','10-outdoor grape fruit (22)',NULL,'Generico','0','prodotto per vendita','kg','0.00','0.00',NULL,'6-Laboratorio','1.5','0',NULL,0,'2022-10-20 07:58:21','2022-10-20 08:05:09',NULL,'1.5','20-10-2022',NULL,NULL,'Inserimento iniziale',NULL,NULL),(11,4,3,'11','11-Blue Berry (21) ',NULL,'Generico','0','Prodotto per vendita','kg','0.00','0',NULL,'6-Laboratorio','15','0',NULL,0,'2022-10-20 07:59:06','2022-10-20 07:59:32',NULL,'15','20-10-2022',NULL,NULL,'Inserimento iniziale',NULL,NULL),(12,4,3,'12','12-Bio lemon','Fiori grandi','Generico','0','Prodotto per vendita','kg','0.00','0.00',NULL,'6-Laboratorio','8','0',NULL,0,'2022-10-20 07:59:18','2022-10-20 08:09:56',NULL,'8','20-10-2022',NULL,NULL,'Inserimento iniziale',NULL,NULL),(13,4,3,'13','13-Repsol (21)',NULL,'Generico','0','Prodotto per vendita','kg','0.00','0',NULL,'6-Laboratorio','7.48','0',NULL,0,'2022-10-20 08:00:19','2022-10-20 08:07:19',NULL,'7.48','20-10-2022',NULL,NULL,'Inserimento iniziale',NULL,NULL),(15,4,3,'15','15-G (21)','Fiori piccoli','Generico','0','prodotto per vendita','kg','0.00','0.00',NULL,'6-Laboratorio','17.6','0',NULL,0,'2022-10-20 08:02:17','2022-10-20 08:08:26',NULL,'17.6','20-10-2022',NULL,NULL,'Inserimento iniziale',NULL,NULL),(16,4,3,'16','16-G (21)','Fiori grandi','Generico','0','Prodotto per vendita','kg','0.00','0',NULL,'6-Laboratorio','1.4','0',NULL,0,'2022-10-20 08:11:23','2022-10-20 08:13:01',NULL,'1.4','20-10-2022',NULL,NULL,'Inserimento iniziale',NULL,NULL),(18,4,3,'18','18-super','fiori piccoli','Generico','0','prodotto per vendita','kg','0.00','0.00',NULL,'6-Laboratorio','18.6','0',NULL,0,'2022-10-20 08:14:52','2022-10-20 08:14:53',NULL,'18.6','20-10-2022',NULL,NULL,'Inserimento iniziale',NULL,NULL),(19,4,3,'19','19-RED Radicale',NULL,'Concime','22','Fertilizzante campo','pz.','49.14','63',NULL,'7-Magazzino fertilizzanti','0','0',NULL,0,'2022-10-20 08:22:40','2022-10-20 08:22:40',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(20,4,3,'20','20-Bionova pH',NULL,'Generico','22','Acidificante acqua','pz.','31.19','39.99',NULL,'7-Magazzino fertilizzanti','0','0',NULL,0,'2022-10-20 08:24:07','2022-10-20 08:26:21',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(21,4,3,'21','21-Maior Nova',NULL,'Concime','22','Fertilizzante per fase vegetativa','pz.','37.36','47.90',NULL,'7-Magazzino fertilizzanti','0','0',NULL,0,'2022-10-20 08:26:12','2022-12-05 08:23:24',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'Minerali azotati'),(22,4,3,'22','22-MIcohemp WP',NULL,'Concime','22','Fertilizzante per fase vegetativa','pz.','18.18','23.31',NULL,'7-Magazzino fertilizzanti','0','0',NULL,0,'2022-10-20 08:27:35','2022-10-20 08:27:35',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'Microorganismi'),(23,4,3,'23','23-Microhemp Weed WP',NULL,'Concime','22','Fertilizzante fase vegetativa','pz.','16.19','20.75',NULL,'7-Magazzino fertilizzanti','0','0',NULL,0,'2022-10-20 08:28:41','2022-10-20 08:28:41',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'Microorganismi'),(24,4,3,'24','24-Hesi Boost',NULL,'Concime','22','Fertilizzante per fioritura','pz.','33.46','42.90',NULL,'7-Magazzino fertilizzanti','2','0',NULL,0,'2022-10-20 08:29:27','2022-12-05 08:23:16',NULL,'2','05-12-2022',NULL,'0000000',NULL,NULL,NULL),(25,14,5,'25','25-test no costo',NULL,'Fitofarmaco',NULL,NULL,'cad.','0','0',NULL,'5-magazzino test','1000','0',NULL,0,'2022-10-21 13:40:57','2022-10-21 13:41:24',NULL,'1000','21-10-2022',NULL,'1234','produzione interna',NULL,NULL),(27,22,7,'27','27-Fieno maggengo 1°taglio, formato da 250 Kg',NULL,'Generico','10','Alimento equini','pz.','225.00','250',NULL,'8-Deposito fieno','5','1','Alimento',0,'2022-11-10 07:19:01','2022-11-10 07:19:01',NULL,'5','10-11-2022',NULL,NULL,'Inserimento iniziale',NULL,NULL),(28,22,7,'28','28-Moretti CAV50, sacco da 25 Kg','Fieno melassato e sali minerali','Generico','10','Mangime per equini','pz.','13.50','15',NULL,'10-Magazzino mangimi','15','1','Alimento',0,'2022-11-10 07:23:12','2022-11-10 07:23:35',NULL,'15','10-11-2022',NULL,NULL,'Inserimento iniziale',NULL,NULL),(29,22,7,'29','29-Moretti CAV70, sacco da 25 Kg','Fieno melassato e sali minerali, specifico per cavalli anziani','Generico','10','Mangime per equini','pz.','13.50','15',NULL,'10-Magazzino mangimi','10','1','Alimento',0,'2022-11-10 07:24:45','2022-11-10 07:24:45',NULL,'10','10-11-2022',NULL,NULL,'Inserimento iniziale',NULL,NULL),(30,22,7,'30','30-Scandinavia Trotting 13, sacco da 25 Kg','Mangime con integratore','Generico','10','Mangime per equini','pz.','18.00','20',NULL,'10-Magazzino mangimi','10','1','Alimento',0,'2022-11-10 07:26:42','2022-11-10 07:26:42',NULL,'10','10-11-2022',NULL,NULL,'Inserimento iniziale',NULL,NULL),(31,22,7,'31','31-Barbabietole pallettate Molino Airoldi, sacco da 40 Kg',NULL,'Generico','10','Alimento per equini','pz.','45.00','50',NULL,'10-Magazzino mangimi','3','1','Alimento',0,'2022-11-10 07:29:39','2022-11-10 07:29:40',NULL,'3','10-11-2022',NULL,NULL,'Inserimento iniziale',NULL,NULL),(32,22,7,'32','32-Orzo essiccato Molino Airoldi, sacco da 25 Kg',NULL,'Generico','10','Alimento per equini','pz.','18.00','20',NULL,'10-Magazzino mangimi','5','1','Alimento',0,'2022-11-10 07:31:32','2022-11-10 07:31:33',NULL,'5','10-11-2022',NULL,NULL,'Inserimento iniziale',NULL,NULL),(33,22,7,'33','33-Truciolo per lettiera Avipur San, sacco da 20 Kg',NULL,'Generico','22','Lettiera','pz.','10.14','13',NULL,'8-Deposito fieno','8','1','Articolo / Prodotto',0,'2022-11-10 07:33:16','2022-11-10 07:33:16',NULL,'8','10-11-2022',NULL,NULL,'Inserimento iniziale',NULL,NULL);
/*!40000 ALTER TABLE `prodottis` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `referentes`
--

DROP TABLE IF EXISTS `referentes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `referentes` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `referente` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cellulare` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `telefono` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `referentes`
--

LOCK TABLES `referentes` WRITE;
/*!40000 ALTER TABLE `referentes` DISABLE KEYS */;
INSERT INTO `referentes` VALUES (1,'Lucetta Pelizza','commerciale@chevre.eu','+39 3477833494',NULL,'2022-10-20 08:39:39','2022-10-20 08:39:39'),(2,'Lucetta Pelizza','commerciale@chevre.eu','+39 3477833494',NULL,'2022-10-20 09:07:09','2022-10-20 09:07:09'),(4,NULL,NULL,NULL,NULL,'2022-10-21 11:26:48','2022-10-21 11:26:48'),(5,NULL,NULL,NULL,NULL,'2022-10-21 11:34:41','2022-10-21 11:34:41'),(6,'Chiara Valtolina',NULL,NULL,NULL,'2022-11-10 08:14:18','2022-11-10 08:14:18'),(7,'Chiara Valtolina',NULL,NULL,NULL,'2022-11-10 08:19:01','2022-11-10 08:19:01'),(8,'Chiara Valtolina',NULL,NULL,NULL,'2022-11-10 08:22:30','2022-11-10 08:22:30'),(9,NULL,NULL,NULL,NULL,'2022-11-10 09:49:16','2022-11-10 09:49:16'),(10,NULL,NULL,NULL,NULL,'2022-11-10 09:49:49','2022-11-10 09:49:49');
/*!40000 ALTER TABLE `referentes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `stellas`
--

DROP TABLE IF EXISTS `stellas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `stellas` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) unsigned DEFAULT NULL,
  `farm_id` bigint(20) unsigned DEFAULT NULL,
  `codice` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nome` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `area_coperta` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tenuta_pavimentazione` tinyint(1) DEFAULT '0',
  `areazione_adeguata` tinyint(1) DEFAULT '0',
  `la_sezione` tinyint(1) DEFAULT '0',
  `tecnica_alimentazione` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `illuminazione` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `vengono_utilizzati` tinyint(1) DEFAULT '0',
  `area_scoperta` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `terreno_salubre` tinyint(1) DEFAULT '0',
  `terreno_bio` tinyint(1) DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `stellas`
--

LOCK TABLES `stellas` WRITE;
/*!40000 ALTER TABLE `stellas` DISABLE KEYS */;
INSERT INTO `stellas` VALUES (1,22,7,'049LC134','Box 1 - Jan','10',1,1,1,'Libera','Prevalentemente naturale',0,'10',1,0,'2022-11-08 08:02:00','2022-11-10 07:43:03'),(2,22,7,'049LC134','Box 2 - Ettore, Marta, Luisa','18',1,0,0,'Libera','Prevalentemente naturale',0,'18',1,0,'2022-11-08 08:02:31','2022-11-10 07:45:17'),(3,22,7,'049LC134','Box 3 - Lady Jane','10',1,1,1,'Libera','Prevalentemente naturale',0,'10',1,0,'2022-11-08 08:03:10','2022-11-10 07:43:25'),(4,22,7,'049LC134','Box 4 - Esteban','10',1,1,1,'Libera','Prevalentemente naturale',0,'10',1,0,'2022-11-08 08:03:47','2022-11-10 07:44:43'),(5,22,7,'049LC134','Box 5 - Pony','15',1,1,1,'Libera','Prevalentemente naturale',0,'18',1,0,'2022-11-08 08:04:11','2022-11-10 07:46:51'),(6,14,5,'asdf','stalla1','4321',0,0,0,'Libera','Prevalentemente naturale',0,'433',1,1,'2022-11-08 08:24:48','2022-11-08 08:24:48'),(7,2,1,'asd1234','test stalla','1234',0,1,0,'Libera','Prevalentemente artificiale',0,'43',1,1,'2022-12-03 18:21:52','2022-12-03 18:22:02'),(8,14,5,'STN12435','Stalla Nord','450',1,0,0,'Razionata','Prevalentemente artificiale',0,'150',0,1,'2022-12-04 10:37:29','2022-12-04 10:37:29');
/*!40000 ALTER TABLE `stellas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sub_terrenis`
--

DROP TABLE IF EXISTS `sub_terrenis`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `sub_terrenis` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `terrenis_id` int(10) unsigned NOT NULL,
  `area_graf_ha` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `area_cat_ha` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sez` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `foglio` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `particelle` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sub` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `comune` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `proprietario` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=44 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sub_terrenis`
--

LOCK TABLES `sub_terrenis` WRITE;
/*!40000 ALTER TABLE `sub_terrenis` DISABLE KEYS */;
INSERT INTO `sub_terrenis` VALUES (4,3,'5','5',NULL,'a','1',NULL,'mi',NULL,'2022-09-25 18:27:44','2022-09-25 18:27:44'),(5,3,'3','3',NULL,'bg','2',NULL,'mi',NULL,'2022-09-25 18:27:44','2022-09-25 18:27:44'),(6,4,'1','1',NULL,'a','1',NULL,'pavia',NULL,'2022-09-25 19:52:43','2022-09-25 19:52:43'),(26,8,'0.4','0.4','1','2134','zfsd',NULL,'MIlano',NULL,'2022-10-13 13:06:34','2022-10-13 13:06:34'),(28,6,'0.07','0.07',NULL,'9','84',NULL,'Lu e Cuccaro Monferrato',NULL,'2022-10-20 07:08:40','2022-10-20 07:08:40'),(29,6,'0.07','0.07',NULL,'9','85',NULL,'Lu e Cuccaro Monferrato',NULL,'2022-10-20 07:08:40','2022-10-20 07:08:40'),(30,5,'0.06','0.06',NULL,'9','23',NULL,'Lu e Cuccaro Monferrato',NULL,'2022-10-20 07:08:57','2022-10-20 07:08:57'),(31,5,'0.06','0.06',NULL,'9','24',NULL,'Lu e Cuccaro Monferrato',NULL,'2022-10-20 07:08:57','2022-10-20 07:08:57'),(32,5,'0.06','0.06',NULL,'9','25',NULL,'Lu e Cuccaro Monferrato',NULL,'2022-10-20 07:08:57','2022-10-20 07:08:57'),(33,5,'0.06','0.06',NULL,'9','78',NULL,'Lu e Cuccaro Monferrato',NULL,'2022-10-20 07:08:57','2022-10-20 07:08:57'),(34,9,'0.02','0','LOM','7','626','702','Missaglia',NULL,'2022-11-08 07:34:48','2022-11-08 07:34:48'),(35,9,'0.1','0','LOM','7','626','702','Missaglia',NULL,'2022-11-08 07:34:48','2022-11-08 07:34:48'),(36,10,'1.31','1.31',NULL,'9','50',NULL,'Olgiate Molgora',NULL,'2022-11-08 07:49:39','2022-11-08 07:49:39'),(37,10,'0.99','0.99',NULL,'9','51',NULL,'Olgiate Molgora',NULL,'2022-11-08 07:49:39','2022-11-08 07:49:39'),(38,10,'0.25','0.25',NULL,'9','52',NULL,'Olgiate Molgora',NULL,'2022-11-08 07:49:39','2022-11-08 07:49:39'),(39,11,'0.02','0.02',NULL,'sdf','34',NULL,'test',NULL,'2022-11-08 08:12:28','2022-11-08 08:12:28'),(40,11,'0.1','0.1',NULL,'sdafg','34',NULL,'test',NULL,'2022-11-08 08:12:28','2022-11-08 08:12:28'),(41,12,'0.07','0.07',NULL,'7','167',NULL,'BORGO SAN MARTINO',NULL,'2024-05-28 07:52:24','2024-05-28 07:52:24'),(42,13,'0.08','0.08',NULL,'7','173',NULL,'BORGO SAN MARTINO',NULL,'2024-06-11 09:35:06','2024-06-11 09:35:06'),(43,7,'0.4','0',NULL,'1','1',NULL,'Lu e Cuccaro Monferrato',NULL,'2024-06-25 10:24:40','2024-06-25 10:24:40');
/*!40000 ALTER TABLE `sub_terrenis` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `teams`
--

DROP TABLE IF EXISTS `teams`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `teams` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) unsigned DEFAULT NULL,
  `farm_id` bigint(20) unsigned DEFAULT NULL,
  `anagrafica_id` bigint(20) unsigned NOT NULL,
  `documento_id` bigint(20) unsigned NOT NULL,
  `codice` int(11) DEFAULT NULL,
  `deactivate` tinyint(1) DEFAULT '0',
  `tipologia_di_contratto` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `qualifica` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `costo_orario` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `inizio_assunzione` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fine_assunzione` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `teams_anagrafica_id_foreign` (`anagrafica_id`),
  KEY `teams_documento_id_foreign` (`documento_id`),
  CONSTRAINT `teams_anagrafica_id_foreign` FOREIGN KEY (`anagrafica_id`) REFERENCES `anagraficas` (`id`) ON DELETE CASCADE,
  CONSTRAINT `teams_documento_id_foreign` FOREIGN KEY (`documento_id`) REFERENCES `documentos` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `teams`
--

LOCK TABLES `teams` WRITE;
/*!40000 ALTER TABLE `teams` DISABLE KEYS */;
INSERT INTO `teams` VALUES (2,2,1,2,2,2,0,NULL,NULL,NULL,NULL,NULL,'2022-09-25 18:30:47','2022-09-25 18:30:47'),(3,6,5,3,3,3,0,NULL,NULL,NULL,NULL,NULL,'2022-09-25 19:53:39','2022-09-25 19:53:40'),(4,4,3,4,4,4,0,NULL,NULL,NULL,NULL,NULL,'2022-10-13 07:21:31','2022-10-13 07:21:31'),(5,4,3,6,6,5,0,NULL,NULL,NULL,NULL,NULL,'2022-10-20 08:43:28','2022-10-20 08:43:28'),(6,14,5,16,16,6,0,NULL,NULL,NULL,NULL,NULL,'2022-11-10 09:51:15','2022-11-10 09:51:15'),(7,1,1,17,17,7,0,NULL,NULL,NULL,NULL,NULL,'2024-05-31 14:16:03','2024-05-31 14:16:03');
/*!40000 ALTER TABLE `teams` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `terrenis`
--

DROP TABLE IF EXISTS `terrenis`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `terrenis` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) unsigned DEFAULT NULL,
  `farm_id` bigint(20) unsigned DEFAULT NULL,
  `nome_terreno` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `codice` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `comune_di_appartenenza` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `costo_per_anno` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ricavo_per_anno` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tipo_di_gestione` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nome_del_proprietario` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `latitude` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `longitude` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `stato` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `area_graf_ha` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `suolo_vivo` tinyint(1) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `terrenis`
--

LOCK TABLES `terrenis` WRITE;
/*!40000 ALTER TABLE `terrenis` DISABLE KEYS */;
INSERT INTO `terrenis` VALUES (3,2,1,'3-test terreno','3','milano','0','0','proprietario',NULL,NULL,NULL,'Attivo','8','2022-09-25 18:27:44','2022-09-25 18:27:44',1),(4,6,5,'4-test terreno 1','4','pavia','0','0','proprietario',NULL,NULL,NULL,'Attivo','1','2022-09-25 19:52:43','2022-09-25 19:52:43',1),(5,4,3,'5-Serra','5','Lu e Cuccaro Monferrato','0','0','proprietario','UmbertoSignorini','45.0259590','8.4917710','Attivo','0.24','2022-10-12 07:07:39','2022-10-12 07:17:49',0),(6,4,3,'6-Capannone','6','Lu e Cuccaro Monferrato','0','0','proprietario','UmbertoSignorini','45.0259590','8.4917710','Attivo','0.14','2022-10-12 07:10:36','2022-10-12 07:10:36',0),(7,4,3,'7-Campo esterno','7','Lu e Cuccaro Monferrato','0','0','proprietario','UmbertoSignorini','45.0259590','8.4917710','8.4917710','0.4','2022-10-12 11:45:51','2024-06-25 10:24:40',1),(8,14,5,'8-test decimali','8','Milano','0','0','proprietario',NULL,NULL,NULL,'Attivo','0.4','2022-10-13 13:06:34','2022-10-13 13:06:34',1),(9,22,7,'9-Capannone ed area esterna via Kennedy','9','Missaglia','0','0','proprietario','ChiaraMariaValtolina','45.694733','9.365559','Attivo','0.12','2022-11-08 07:34:48','2022-11-08 07:34:48',1),(10,22,7,'10-Terreno Olgiate Molgora','10','Olgiate Molgora','0','0','affitto',NULL,NULL,NULL,'Attivo','2.55','2022-11-08 07:49:39','2022-11-08 07:49:39',1),(11,14,5,'11-testtest','11','test','0','0','proprietario',NULL,NULL,NULL,'Attivo','0.12000','2022-11-08 08:12:28','2022-11-08 08:12:28',1),(12,25,9,'12-ACCORDO CIOCCHETTI','12','BORGO SAN MARTINO','0','0','affitto','POZZIPIERO',NULL,NULL,'Attivo','0.07000','2024-05-28 07:52:24','2024-05-28 07:52:24',1),(13,25,9,'13-ACCORDO CIOCCHETTI','13','BORGO SAN MARTINO','0','0','affitto','POZZIPIERO',NULL,NULL,'Attivo','0.08000','2024-06-11 09:35:06','2024-06-11 09:35:06',1);
/*!40000 ALTER TABLE `terrenis` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `phone_number` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `role` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_by` int(11) DEFAULT NULL,
  `farm_id` bigint(20) unsigned DEFAULT NULL,
  `checklist` tinyint(1) DEFAULT '1',
  `operaio_id` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`),
  KEY `users_farm_id_foreign` (`farm_id`),
  CONSTRAINT `users_farm_id_foreign` FOREIGN KEY (`farm_id`) REFERENCES `farms` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'Francesco Merlino','francescomerlino01@gmail.com',NULL,'$2y$10$IumWR7hhpvrrw1rRSgYpuepmxFpWadTgDao62J/v7AGpVIbVoVDfy',NULL,'2022-09-03 14:50:35','2022-09-03 14:50:35',NULL,'Super Admin',NULL,1,1,''),(2,'Admin Test','precisionfarmingmanagement@gmail.com',NULL,'$2y$10$Y1jC5341ZSplTmFBKyWdcOP5y4yjn.eK4OJHKV6Cd6vgPGdP0fKUC',NULL,'2022-09-03 14:50:36','2022-09-03 14:50:36',NULL,'Super Admin',NULL,1,1,''),(4,'Umberto Signorini','commerciale@chevre.eu',NULL,'$2y$10$PIj/AI/cosvZLNxwDpHn/.Frb2Jxe6CElJ.OmCwOmoFZI0DB1GIp.',NULL,'2022-09-22 08:02:45','2022-09-22 08:02:45','+39 3477833494','Admin',3,3,0,''),(6,'Operaio Test','testop@mail.com',NULL,'$2y$10$/Tgo9hUh5GDnE6VkVPRUIemkMPxbztjQasIwXDJz7.V5JaZpIMszW',NULL,'2022-09-25 19:51:16','2024-05-31 14:18:10','+39 1234123412','Operaio',2,5,0,'3'),(14,'Admin test','mailwork08@gmail.com',NULL,'$2y$10$4ppa0/sxZ3vi.vv5ap5u.ub2fvvDYbGo9F6TZKtS1qzqYSCmq1vSe',NULL,'2022-10-10 20:56:17','2022-10-10 20:56:17','+12 3412341234','Admin',2,5,0,NULL),(15,'Lucetta Pelizza','lucettarpelizza@gmail.com',NULL,'$2y$10$ueBmfpqptfO5yDJzqcdOTujad69UcWGrROK1/WGmuFaIKX/OqEDfi',NULL,'2022-10-13 07:53:53','2022-10-13 07:53:53','+39 3477833494','Operaio',1,3,0,'4'),(16,'Giancarlo Visalli','giancarlovisalli@gmail.com',NULL,'$2y$10$QPdYJgXjpGedqi4OLTY8TezbUiLBsUxQDdMt8slqfPjD.1EZBY0HW',NULL,'2022-10-17 08:15:00','2022-10-17 08:15:00','+39 1234123412','Admin',2,5,0,NULL),(21,'Luciano Murru','fratellimurru@libero.it',NULL,'$2y$10$t2ImoelQ5ZnKKnjOZJfxhuQHX8jtHqNn4Y38GH2hnpqxZG89NG0Py',NULL,'2022-10-20 08:46:14','2022-10-20 08:46:14','+39 3339367633','Operaio',1,3,0,'5'),(22,'Chiara Valtolina','valtolina@tevassociati.it',NULL,'$2y$10$MCPPGolFxjHALyFgJ6NCXuDVQJCFnxlKEoGer3jHIHL/zIMhzRAGW',NULL,'2022-11-04 13:08:26','2022-11-04 13:08:26','+39 3356490575','Admin',1,7,1,NULL),(23,'Ida','info@piandellefontane.it',NULL,'$2y$10$A8gcQQ9Mnh9J4Hl.o1sLw.qVxxYgPikEFokP0hZVXeglZeYyYdOVW',NULL,'2022-11-08 09:13:06','2022-11-08 09:28:03','+39 0341590236','Admin',1,8,1,NULL),(24,'User test','precisionfarmingtest@gmail.com',NULL,'$2y$10$HUQCo8uMI3d36HrlVoFKpe895XP7/oGGx0iEckEQiNEisO.NvTvS2',NULL,'2022-12-05 07:58:31','2022-12-05 07:58:31','+39 2249582563','Admin',1,5,1,NULL),(25,'Emilia Pestarino','emilia.pestarino@ssasanmartino.it',NULL,'$2y$10$h3AO5Y4CPQQ6RKRyUPc3xOffVTNHUOZwf2dxHVyNVO1gaj13lzQH6',NULL,'2024-05-15 09:59:35','2024-05-15 09:59:35','+39 0142809999','Admin',1,9,1,NULL);
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

-- Dump completed on 2024-06-26 13:58:45
