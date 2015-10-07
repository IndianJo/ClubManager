-- MySQL dump 10.13  Distrib 5.6.17, for Win64 (x86_64)
--
-- Host: localhost    Database: ClubManager
-- ------------------------------------------------------
-- Server version	5.6.17

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
-- Dumping data for table `game_set`
--

LOCK TABLES `game_set` WRITE;
/*!40000 ALTER TABLE `game_set` DISABLE KEYS */;
INSERT INTO `game_set` VALUES (3,3,1,'M','Men'),(4,9,2,'M','Men'),(5,10,3,'M','Men'),(6,11,4,'M','Men'),(7,12,5,'M','Men'),(8,7,9,'M','Men'),(9,3,10,'M','Men'),(10,3,12,'M','Men'),(11,13,13,'M','Men'),(12,14,14,'M','Men'),(13,5,16,'M','Men'),(14,15,20,'M','Men'),(15,8,22,'XL','Men'),(16,16,26,'S','Women'),(17,17,30,'S','Women'),(18,18,33,'S','Women'),(19,19,42,'M','Women'),(20,20,45,'XL','Men'),(21,21,57,'S','Women'),(22,3,60,'M','Men'),(23,5,61,'M','Men'),(24,22,63,'L','Men'),(25,23,69,'M','Men'),(26,24,79,'M','Men'),(27,25,84,'M','Men'),(28,4,87,'M','Men'),(29,6,88,'S','Women'),(30,27,89,'L','Men'),(31,28,91,'M','Men'),(32,29,96,'M','Men');
/*!40000 ALTER TABLE `game_set` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `groups`
--

LOCK TABLES `groups` WRITE;
/*!40000 ALTER TABLE `groups` DISABLE KEYS */;
INSERT INTO `groups` VALUES (1,'Bureau','a:1:{i:0;s:11:\"ROLE_MEMBER\";}'),(2,'MembreUCV','a:1:{i:0;s:11:\"ROLE_PLAYER\";}'),(3,'Admin','a:1:{i:0;s:10:\"ROLE_ADMIN\";}');
/*!40000 ALTER TABLE `groups` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `player`
--

LOCK TABLES `player` WRITE;
/*!40000 ALTER TABLE `player` DISABLE KEYS */;
INSERT INTO `player` VALUES (3,'club','ucv','0606060606','ucv',0,'Besancon',25000,'ucv@ucv.com'),(4,'joseph','Mesny','0633644614','T rue des CRAS',33,'Besancon',25000,'joseph.mesny@gmail.com'),(5,'tommy','Quirico','0606060606','rue des grands cypres',10,'Besancon',25000,'tommy.quirico@ucv.com'),(6,'clementine','Gamonet','0606060606','T rue des CRAS',33,'Besancon',25000,'clementine.gamonet@ucv.com'),(7,'colin','Michoudet','0606060606','grande rue',78,'Besancon',25000,'colin.michoudet@ucv.com'),(8,'gaetan','Masson','0606060606','rue du poitout',0,'Besancon',25000,'gaetan.masson@ucv.com'),(9,'Thomas','Jeanin','0606060606','ucv',0,'Besancon',25000,'ucv@ucv.com'),(10,'Alexandre','Patrin','0606060606','ucv',0,'Besancon',25000,'ucv@ucv.com'),(11,'Alexandre','Vernotte','0606060606','ucv',0,'Besancon',25000,'ucv@ucv.com'),(12,'Frédéric','Christ','0606060606','ucv',0,'Besancon',25000,'ucv@ucv.com'),(13,'Valentin','Gasgne','0606060606','ucv',0,'Besancon',25000,'ucv@ucv.com'),(14,'Gautier','Mary','0606060606','ucv',0,'Besancon',25000,'ucv@ucv.com'),(15,'Danny','Poinsignon','0606060606','ucv',0,'Besancon',25000,'ucv@ucv.com'),(16,'Léa','Gisquet','0606060606','ucv',0,'Besancon',25000,'ucv@ucv.com'),(17,'Alexia','Bontempi','0606060606','ucv',0,'Besancon',25000,'ucv@ucv.com'),(18,'Annick','Barthod-Malat','0606060606','ucv',0,'Besancon',25000,'ucv@ucv.com'),(19,'Lucie','Cailleaux','0606060606','ucv',0,'Besancon',25000,'ucv@ucv.com'),(20,'Lois','Andrey','0606060606','ucv',0,'Besancon',25000,'ucv@ucv.com'),(21,'Lise','Martin Perceval','0606060606','ucv',0,'Besancon',25000,'ucv@ucv.com'),(22,'Tristant','Cailleaux','0606060606','ucv',0,'Besancon',25000,'ucv@ucv.com'),(23,'Florent','Bourquin','0606060606','ucv',0,'Besancon',25000,'ucv@ucv.com'),(24,'Jean Guillaume','Monet','0606060606','ucv',0,'Besancon',25000,'ucv@ucv.com'),(25,'Régis','Bect','0606060606','ucv',0,'Besancon',25000,'ucv@ucv.com'),(26,'Jean','Lambert','0606060606','ucv',0,'Besancon',25000,'ucv@ucv.com'),(27,'Romain','Terrier','0606060606','ucv',0,'Besancon',25000,'ucv@ucv.com'),(28,'Emeric','Elphege','0606060606','ucv',0,'Besancon',25000,'ucv@ucv.com'),(29,'Paul','Boillon','0606060606','ucv',0,'Besancon',25000,'ucv@ucv.com');
/*!40000 ALTER TABLE `player` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `season`
--

LOCK TABLES `season` WRITE;
/*!40000 ALTER TABLE `season` DISABLE KEYS */;
INSERT INTO `season` VALUES (3,'2015-2016','2015-09-01','2016-08-31');
/*!40000 ALTER TABLE `season` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `team`
--

LOCK TABLES `team` WRITE;
/*!40000 ALTER TABLE `team` DISABLE KEYS */;
INSERT INTO `team` VALUES (1,1,'UCV1'),(2,1,'UCV2'),(3,2,'DahuTeam'),(4,9,'UCV1'),(5,6,'UCVGagloo'),(6,6,'GaglooV2'),(7,7,'GaglooGirl');
/*!40000 ALTER TABLE `team` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `team_player`
--

LOCK TABLES `team_player` WRITE;
/*!40000 ALTER TABLE `team_player` DISABLE KEYS */;
INSERT INTO `team_player` VALUES (1,4),(1,5),(1,7),(1,8),(2,10),(2,12),(2,13),(3,4),(3,5),(3,6),(3,7),(5,4),(5,5),(5,6),(6,4),(6,5),(6,6),(7,6),(7,16),(7,17),(7,19);
/*!40000 ALTER TABLE `team_player` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `throw_stat`
--

LOCK TABLES `throw_stat` WRITE;
/*!40000 ALTER TABLE `throw_stat` DISABLE KEYS */;
/*!40000 ALTER TABLE `throw_stat` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `tournament`
--

LOCK TABLES `tournament` WRITE;
/*!40000 ALTER TABLE `tournament` DISABLE KEYS */;
INSERT INTO `tournament` VALUES (1,3,'Tournois de la patate','Gymnases Haberges et M.Roy','Vesoul','FR','2015-09-27','2015-09-27','Open','Amical','Indoor'),(2,3,'Flying Dahu','Le Landeron','canton de Neuchâtel','CH','2015-10-17','2015-10-18','Mixte','Amical','Indoor'),(3,3,'D2 Indoor','inconnu','inconnu','FR','2015-10-24','2015-10-25','Open','N2','Indoor'),(6,3,'Gaggloo Men','inconu','Bern','CH','2015-11-14','2015-11-15','Open','Amical','Indoor'),(7,3,'Gaggloo Women','inconu','Bern','CH','2015-11-14','2015-11-15','Feminin','Amical','Indoor'),(8,3,'KYF','inconnu','Erstein','FR','2015-10-31','2015-11-01','Feminin','Amical','Indoor'),(9,3,'Coupe de l\'EST','Axone','Montbéliard','FR','2015-11-14','2015-11-15','Open','DR1','Indoor');
/*!40000 ALTER TABLE `tournament` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `user`
--

LOCK TABLES `user` WRITE;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` VALUES (1,'admin','admin','admin@test.com','admin@test.com',1,'952y1gw7bxgkckcs0oooskwswscs808','uYiDuXgmQ7iY2O/JbKk27+MGOjUP1N2SGXkaVoQCq3ycwxBksYZ8LF9CRXLMD5JYe3dNa9gY8mPWOUZbcCUbdA==','2015-09-29 09:16:15',0,0,NULL,NULL,NULL,'a:1:{i:0;s:16:\"ROLE_SUPER_ADMIN\";}',0,NULL,'2015-09-08 16:11:04','2015-09-29 09:16:15',NULL,NULL,NULL,NULL,NULL,'u',NULL,NULL,NULL,NULL,NULL,'null',NULL,NULL,'null',NULL,NULL,'null',NULL,NULL),(2,'tommy','tq','tommy@ucv.fr','tommy@ucv.fr',1,'tcpux2gevvkk040ccckck4ow448o0kw','k2vF7GOD/dKMpUpTiM4OuZS06Lyi/KWolXt9913FLdio8+UQ3vUzxjBeGQGuKFYoNjVWj+ovQ2lbievQDCdLlQ==','2015-09-09 09:16:44',0,0,NULL,NULL,NULL,'a:1:{i:0;s:11:\"ROLE_MEMBER\";}',0,NULL,'2015-09-09 09:09:43','2015-09-09 10:39:08',NULL,NULL,NULL,NULL,NULL,'m',NULL,NULL,NULL,NULL,NULL,'null',NULL,NULL,'null',NULL,NULL,'null',NULL,NULL),(3,'joseph','joseph','joseph.mesny@gmail.com','joseph.mesny@gmail.com',1,'32e4n5vh4r6s84kswg4840g0c8ow00c','FdGTbeTH5ELj/7uPqZwtFmNUT8zs/DNONlUlph22yTeiTEGbazd8umHEs/wISuM6TrZ6oPTLusBc4mSSji9gHw==','2015-10-01 16:59:38',0,0,NULL,NULL,NULL,'a:0:{}',0,NULL,'2015-09-09 11:08:05','2015-10-01 16:59:38',NULL,NULL,NULL,NULL,NULL,'m','fr_FR','Europe/Paris',NULL,NULL,NULL,'null',NULL,NULL,'null',NULL,NULL,'null',NULL,NULL);
/*!40000 ALTER TABLE `user` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `users_groups`
--

LOCK TABLES `users_groups` WRITE;
/*!40000 ALTER TABLE `users_groups` DISABLE KEYS */;
INSERT INTO `users_groups` VALUES (1,3),(2,1),(3,3);
/*!40000 ALTER TABLE `users_groups` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2015-10-07 16:31:05
