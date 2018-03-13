-- MySQL dump 10.13  Distrib 5.6.15, for Linux (x86_64)
--
-- Host: localhost    Database: timosoiu_sitedb
-- ------------------------------------------------------
-- Server version	5.6.15-cll-lve

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
-- Table structure for table `category`
--

DROP TABLE IF EXISTS `category`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `category` (
  `id_cat` int(11) NOT NULL AUTO_INCREMENT,
  `name_cat` varchar(50) NOT NULL,
  `descr_cat` varchar(150) NOT NULL,
  PRIMARY KEY (`id_cat`)
) ENGINE=InnoDB AUTO_INCREMENT=30 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `category`
--

LOCK TABLES `category` WRITE;
/*!40000 ALTER TABLE `category` DISABLE KEYS */;
INSERT INTO `category` (`id_cat`, `name_cat`, `descr_cat`) VALUES (1,'avatar','user avatars'),(2,'tribal','some tattoo designs'),(3,'port','portraits of people'),(4,'cars','pictures of some cars'),(5,'rosario','fanart of manga called Rosario to Vampire'),(6,'it','comments of it section'),(7,'art','comments of art section'),(8,'manga','characters from manga or anime or original'),(9,'ds2','all heroes from the game Dungeon Siege II'),(19,'program','program'),(20,'other','uncategorized'),(21,'slides','slider pictures'),(22,'cs','program in c sharp'),(23,'vk','database + website'),(24,'js','some simple javascript'),(25,'mvc','simple .net mvc'),(26,'weather','weather viewer in .net'),(27,'acc','ms access application'),(28,'html','simple htm site'),(29,'java','some java apps');
/*!40000 ALTER TABLE `category` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `comments`
--

DROP TABLE IF EXISTS `comments`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `comments` (
  `id_com` int(11) NOT NULL AUTO_INCREMENT,
  `user_by` varchar(30) NOT NULL DEFAULT 'anonymus',
  `txt_com` varchar(300) NOT NULL,
  `avatar` varchar(150) DEFAULT 'http://avatar.coolclip.ru/albums/Avatars/Avatars%20150x150/Avatars_150x150_26.gif',
  `date_c` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `cat_com` int(11) NOT NULL,
  PRIMARY KEY (`id_com`),
  KEY `cat_com` (`cat_com`),
  CONSTRAINT `comments_ibfk_1` FOREIGN KEY (`cat_com`) REFERENCES `category` (`id_cat`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `comments`
--

LOCK TABLES `comments` WRITE;
/*!40000 ALTER TABLE `comments` DISABLE KEYS */;
/*!40000 ALTER TABLE `comments` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `news`
--

DROP TABLE IF EXISTS `news`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `news` (
  `id_news` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(50) NOT NULL,
  `txt` varchar(300) NOT NULL,
  `date_w` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `news_by` int(11) NOT NULL DEFAULT '10',
  PRIMARY KEY (`id_news`),
  KEY `news_ibfk_1` (`news_by`),
  CONSTRAINT `news_ibfk_1` FOREIGN KEY (`news_by`) REFERENCES `users` (`id_user`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `news`
--

LOCK TABLES `news` WRITE;
/*!40000 ALTER TABLE `news` DISABLE KEYS */;
/*!40000 ALTER TABLE `news` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pic_prog`
--

DROP TABLE IF EXISTS `pic_prog`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pic_prog` (
  `id_pp` int(11) NOT NULL AUTO_INCREMENT,
  `id_prop` int(11) NOT NULL,
  `id_picp` int(11) NOT NULL,
  PRIMARY KEY (`id_pp`),
  KEY `id_prop` (`id_prop`),
  KEY `id_picp` (`id_picp`),
  CONSTRAINT `pic_prog_ibfk_1` FOREIGN KEY (`id_prop`) REFERENCES `programs` (`id_prog`),
  CONSTRAINT `pic_prog_ibfk_2` FOREIGN KEY (`id_picp`) REFERENCES `picture` (`id_pic`)
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pic_prog`
--

LOCK TABLES `pic_prog` WRITE;
/*!40000 ALTER TABLE `pic_prog` DISABLE KEYS */;
INSERT INTO `pic_prog` (`id_pp`, `id_prop`, `id_picp`) VALUES (1,1,83),(2,1,84),(5,1,85),(6,1,86),(7,2,87),(8,2,88),(9,2,89),(10,2,90),(11,3,91),(12,7,106),(13,7,107),(14,7,108),(15,7,109),(16,4,110),(17,4,111),(18,5,112),(19,5,113),(20,5,114),(21,5,115),(22,6,116),(23,6,117);
/*!40000 ALTER TABLE `pic_prog` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `picture`
--

DROP TABLE IF EXISTS `picture`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `picture` (
  `id_pic` int(11) NOT NULL AUTO_INCREMENT,
  `name_pic` varchar(30) NOT NULL,
  `descr_pic` varchar(150) NOT NULL,
  `pic_cat` int(11) NOT NULL,
  `t_link` varchar(150) NOT NULL DEFAULT 'http//:www.somethin.smth',
  `p_link` varchar(150) NOT NULL,
  PRIMARY KEY (`id_pic`),
  KEY `pic_cat` (`pic_cat`),
  CONSTRAINT `picture_ibfk_1` FOREIGN KEY (`pic_cat`) REFERENCES `category` (`id_cat`)
) ENGINE=InnoDB AUTO_INCREMENT=125 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `picture`
--

LOCK TABLES `picture` WRITE;
/*!40000 ALTER TABLE `picture` DISABLE KEYS */;
INSERT INTO `picture` (`id_pic`, `name_pic`, `descr_pic`, `pic_cat`, `t_link`, `p_link`) VALUES (1,'Ankh and scythes','Ankh and scythes',2,'http://th05.deviantart.net/fs70/PRE/i/2011/005/6/4/ankh_and_scythes_by_elandir-d36hk95.jpg','http://th05.deviantart.net/fs70/PRE/i/2011/005/6/4/ankh_and_scythes_by_elandir-d36hk95.jpg'),(2,'Hearts and Ankhs','Hearts and Ankhs',2,'http://fc06.deviantart.net/fs51/i/2009/315/7/8/Hearts_and_Ankhs_by_Elandir.jpg','http://fc06.deviantart.net/fs51/i/2009/315/7/8/Hearts_and_Ankhs_by_Elandir.jpg'),(3,'Killed Love','Killed Love',2,'http://th00.deviantart.net/fs51/PRE/i/2009/305/c/4/Killed_Love_by_Elandir.jpg','http://th00.deviantart.net/fs51/PRE/i/2009/305/c/4/Killed_Love_by_Elandir.jpg'),(4,'Heart','Heart',2,'http://fc04.deviantart.net/fs48/f/2009/230/8/c/Heart_by_Elandir.jpg','http://fc04.deviantart.net/fs48/f/2009/230/8/c/Heart_by_Elandir.jpg'),(5,'Ankh in tribal v4','Ankh in tribal v4',2,'http://fc05.deviantart.net/fs42/f/2009/077/8/b/Ankh_in_tribal_v4_by_Elandir.jpg','http://fc05.deviantart.net/fs42/f/2009/077/8/b/Ankh_in_tribal_v4_by_Elandir.jpg'),(6,'Ankh in tribal v3','Ankh in tribal v3',2,'http://fc05.deviantart.net/fs43/f/2009/059/a/5/Ankh_in_tribal_v3_by_Elandir.jpg','http://fc05.deviantart.net/fs43/f/2009/059/a/5/Ankh_in_tribal_v3_by_Elandir.jpg'),(7,'Ankh in tribal','Ankh in tribal',2,'http://fc06.deviantart.net/fs38/f/2008/338/e/5/Ankh_in_tribal_by_Elandir.jpg','http://fc06.deviantart.net/fs38/f/2008/338/e/5/Ankh_in_tribal_by_Elandir.jpg'),(8,'Ankh in tribal v2','Ankh in tribal v2',2,'http://fc00.deviantart.net/fs39/f/2008/356/e/c/ankh_in_tribal_v2_by_Elandir.jpg','http://fc00.deviantart.net/fs39/f/2008/356/e/c/ankh_in_tribal_v2_by_Elandir.jpg'),(9,'picture','picture',1,'http://upload.wikimedia.org/wikipedia/commons/a/ab/Caonima_word-150x150.jpg','http://upload.wikimedia.org/wikipedia/commons/a/ab/Caonima_word-150x150.jpg'),(12,'csharp11','charp11',19,'http://web.vk.edu.ee/~eiandir/me_site/pics/Picture1.png','http://web.vk.edu.ee/~eiandir/me_site/pics/Picture1.png'),(13,'csharp12','csharp12',19,'http://web.vk.edu.ee/~eiandir/me_site/pics/Picture2.png','http://web.vk.edu.ee/~eiandir/me_site/pics/Picture2.png'),(14,'Elandir','Elandir',9,'http://fc02.deviantart.net/fs49/i/2009/235/c/8/DS_II__Elandir_by_Elandir.jpg','http://fc02.deviantart.net/fs49/i/2009/235/c/8/DS_II__Elandir_by_Elandir.jpg'),(15,'Yorjen','Yorjen',9,'http://fc04.deviantart.net/fs46/i/2009/190/1/0/Yorjen_DSII_by_Elandir.jpg','http://fc04.deviantart.net/fs46/i/2009/190/1/0/Yorjen_DSII_by_Elandir.jpg'),(16,'Ressa','Ressa',9,'http://fc06.deviantart.net/fs45/i/2009/157/b/8/DS_II_Ressa_by_Elandir.jpg','http://fc06.deviantart.net/fs45/i/2009/157/b/8/DS_II_Ressa_by_Elandir.jpg'),(17,'Archmage of Valdis','Archmage of Valdis',9,'http://fc01.deviantart.net/fs42/i/2009/135/0/b/DS_II__Archmage_of_Valdis_by_Elandir.jpg','http://fc01.deviantart.net/fs42/i/2009/135/0/b/DS_II__Archmage_of_Valdis_by_Elandir.jpg'),(18,'Lothar','Lothar',9,'http://fc06.deviantart.net/fs45/i/2009/107/5/1/DS_II_Lothar_by_Elandir.jpg','http://fc06.deviantart.net/fs45/i/2009/107/5/1/DS_II_Lothar_by_Elandir.jpg'),(19,'Amren','Amren',9,'http://fc05.deviantart.net/fs45/i/2009/069/5/b/DS_II__Amren_by_Elandir.jpg','http://fc05.deviantart.net/fs45/i/2009/069/5/b/DS_II__Amren_by_Elandir.jpg'),(20,'Drewin','Drewin',9,'http://fc04.deviantart.net/fs28/i/2008/105/6/6/DS_II_Drewin_by_Elandir.jpg','http://fc04.deviantart.net/fs28/i/2008/105/6/6/DS_II_Drewin_by_Elandir.jpg'),(21,'Finala','Finala',9,'http://fc04.deviantart.net/fs25/i/2008/102/0/c/DS_II__Finala_by_Elandir.jpg','http://fc04.deviantart.net/fs25/i/2008/102/0/c/DS_II__Finala_by_Elandir.jpg'),(22,'Deru','Deru',9,'http://fc05.deviantart.net/fs26/i/2008/102/d/f/DS_II__Deru_by_Elandir.jpg','http://fc05.deviantart.net/fs26/i/2008/102/d/f/DS_II__Deru_by_Elandir.jpg'),(23,'Taar','Taar',9,'http://fc04.deviantart.net/fs30/i/2008/109/3/f/DS_II__Taar_by_Elandir.jpg','http://fc04.deviantart.net/fs30/i/2008/109/3/f/DS_II__Taar_by_Elandir.jpg'),(24,'Vix','Vix',9,'http://fc07.deviantart.net/fs27/i/2008/122/e/0/DS_II_Vix_by_Elandir.jpg','http://fc07.deviantart.net/fs27/i/2008/122/e/0/DS_II_Vix_by_Elandir.jpg'),(25,'Evangeline','Evangeline',9,'http://fc03.deviantart.net/fs28/i/2008/102/7/9/DS_II__Evangeline_by_Elandir.jpg','http://fc03.deviantart.net/fs28/i/2008/102/7/9/DS_II__Evangeline_by_Elandir.jpg'),(26,'Sartan','Sartan',9,'http://fc02.deviantart.net/fs26/i/2008/170/7/a/DS_II__Sartan_by_Elandir.jpg','http://fc02.deviantart.net/fs26/i/2008/170/7/a/DS_II__Sartan_by_Elandir.jpg'),(27,'Dodge Viper SRT10','Dodge Viper SRT10',4,'http://fc07.deviantart.net/fs44/f/2009/163/1/1/Dodge_Viper_SRT_10_by_Elandir.jpg','http://fc07.deviantart.net/fs44/f/2009/163/1/1/Dodge_Viper_SRT_10_by_Elandir.jpg'),(28,'Streetrace','Streetrace',4,'http://fc02.deviantart.net/fs42/f/2009/162/b/d/Streetrace_by_Elandir.jpg','http://fc02.deviantart.net/fs42/f/2009/162/b/d/Streetrace_by_Elandir.jpg'),(29,'Russian muscle','Russian muscle',4,'http://fc08.deviantart.net/fs40/f/2009/048/3/3/__Russian_muscle___by_Elandir.jpg','http://fc08.deviantart.net/fs40/f/2009/048/3/3/__Russian_muscle___by_Elandir.jpg'),(30,'Hippie-bus','Hippie-bus',4,'http://fc04.deviantart.net/fs37/f/2008/271/e/5/Hippie_bus_v_0_1_by_Elandir.jpg','http://fc04.deviantart.net/fs37/f/2008/271/e/5/Hippie_bus_v_0_1_by_Elandir.jpg'),(31,'1967 Shelby Ford Mustang','1967 Shelby Ford Mustang',4,'http://fc05.deviantart.net/fs36/f/2008/285/0/a/67_shelby_ford_mustang_by_Elandir.jpg','http://fc05.deviantart.net/fs36/f/2008/285/0/a/67_shelby_ford_mustang_by_Elandir.jpg'),(32,'Pillow','Pillow',8,'http://fc07.deviantart.net/fs71/f/2012/242/b/c/pillow_by_elandir-d5cxtck.jpg','http://fc07.deviantart.net/fs71/f/2012/242/b/c/pillow_by_elandir-d5cxtck.jpg'),(33,'Paint the sealing','Paint the sealing',8,'http://fc02.deviantart.net/fs70/f/2011/363/b/0/paint_the_sealing_by_elandir-d4klwjs.jpg','http://fc02.deviantart.net/fs70/f/2011/363/b/0/paint_the_sealing_by_elandir-d4klwjs.jpg'),(34,'Gone','Gone',8,'http://fc04.deviantart.net/fs71/f/2011/160/2/4/gone_by_elandir-d3ignmg.jpg','http://fc04.deviantart.net/fs71/f/2011/160/2/4/gone_by_elandir-d3ignmg.jpg'),(35,'Split','Split',8,'http://fc05.deviantart.net/fs70/f/2010/208/5/9/Split_by_Elandir.jpg','http://fc05.deviantart.net/fs70/f/2010/208/5/9/Split_by_Elandir.jpg'),(36,'Scared','Scared',8,'http://fc00.deviantart.net/fs71/f/2010/200/e/5/Scared_by_Elandir.jpg','http://fc00.deviantart.net/fs71/f/2010/200/e/5/Scared_by_Elandir.jpg'),(37,'Going crazy?','Going crazy?',8,'http://fc05.deviantart.net/fs71/f/2010/112/3/6/Goin_crazy___by_Elandir.jpg','http://fc05.deviantart.net/fs71/f/2010/112/3/6/Goin_crazy___by_Elandir.jpg'),(38,'Hug','Hug',8,'http://fc01.deviantart.net/fs71/f/2010/024/f/c/Hug_by_Elandir.jpg','http://fc01.deviantart.net/fs71/f/2010/024/f/c/Hug_by_Elandir.jpg'),(39,'Wink','Wink',8,'http://fc04.deviantart.net/fs49/f/2009/191/1/2/wink___XD_by_Elandir.jpg','http://fc04.deviantart.net/fs49/f/2009/191/1/2/wink___XD_by_Elandir.jpg'),(40,'Sunbathing','Sunbathing',8,'http://fc06.deviantart.net/fs49/f/2009/177/9/7/Sunbathing_by_Elandir.jpg','http://fc06.deviantart.net/fs49/f/2009/177/9/7/Sunbathing_by_Elandir.jpg'),(41,'Hiyoko-kun','Hiyoko-kun',8,'http://fc07.deviantart.net/fs45/f/2009/089/0/c/Hiyoko_kun_v1_by_Elandir.jpg','http://fc07.deviantart.net/fs45/f/2009/089/0/c/Hiyoko_kun_v1_by_Elandir.jpg'),(42,'Hiyoko-kun','Hiyoko-kun',8,'http://fc03.deviantart.net/fs44/f/2009/089/f/9/Hiyoko_kun_v2_by_Elandir.jpg','http://fc03.deviantart.net/fs44/f/2009/089/f/9/Hiyoko_kun_v2_by_Elandir.jpg'),(43,'Cant Be','Cant Be',8,'http://fc03.deviantart.net/fs37/f/2008/285/1/3/Cant_be____by_Elandir.jpg','http://fc03.deviantart.net/fs37/f/2008/285/1/3/Cant_be____by_Elandir.jpg'),(44,'Luwley','Luwley',8,'http://fc03.deviantart.net/fs34/f/2008/293/8/1/Luwley_by_Elandir.jpg','http://fc03.deviantart.net/fs34/f/2008/293/8/1/Luwley_by_Elandir.jpg'),(45,'No way','No way',8,'http://fc07.deviantart.net/fs39/f/2008/356/6/6/No_way____by_Elandir.jpg','http://fc07.deviantart.net/fs39/f/2008/356/6/6/No_way____by_Elandir.jpg'),(46,'Fading away','Fading away',8,'http://fc09.deviantart.net/fs40/f/2009/039/f/6/Fading_away_by_Elandir.jpg','http://fc09.deviantart.net/fs40/f/2009/039/f/6/Fading_away_by_Elandir.jpg'),(47,'Utamaru','Utamaru',8,'http://fc08.deviantart.net/fs41/f/2009/039/9/7/Utamaru_by_Elandir.jpg','http://fc08.deviantart.net/fs41/f/2009/039/9/7/Utamaru_by_Elandir.jpg'),(48,'Utamaru','Utamaru',8,'http://fc02.deviantart.net/fs41/f/2009/048/7/0/Utamaru_v2_by_Elandir.jpg','http://fc02.deviantart.net/fs41/f/2009/048/7/0/Utamaru_v2_by_Elandir.jpg'),(49,'My classmate','My classmate',3,'http://fc00.deviantart.net/fs51/f/2009/277/6/8/My_Classmate_by_Elandir.jpg','http://fc00.deviantart.net/fs51/f/2009/277/6/8/My_Classmate_by_Elandir.jpg'),(50,'Bounty hunter','Bounty hunter',3,'http://fc02.deviantart.net/fs71/f/2011/208/7/4/bounty_hunter_by_elandir-d41tli3.jpg','http://fc02.deviantart.net/fs71/f/2011/208/7/4/bounty_hunter_by_elandir-d41tli3.jpg'),(51,'A girl from Sweeden','A girl from Sweeden',3,'http://fc01.deviantart.net/fs70/f/2012/078/d/1/a_girl_from_sweeden_by_elandir-d4t9mpo.jpg','http://fc01.deviantart.net/fs70/f/2012/078/d/1/a_girl_from_sweeden_by_elandir-d4t9mpo.jpg'),(52,'Kati','Kati',3,'http://fc01.deviantart.net/fs70/f/2012/150/d/f/k_by_elandir-d51mn4n.jpg','http://fc01.deviantart.net/fs70/f/2012/150/d/f/k_by_elandir-d51mn4n.jpg'),(53,'Kati','Kati',3,'http://fc05.deviantart.net/fs71/f/2012/164/1/e/k2_by_elandir-d53b9r0.jpg','http://fc05.deviantart.net/fs71/f/2012/164/1/e/k2_by_elandir-d53b9r0.jpg'),(54,'Pretty girl','Pretty girl',3,'http://fc08.deviantart.net/fs71/f/2012/063/3/9/pretty_girl_by_elandir-d4ro1en.jpg','http://fc08.deviantart.net/fs71/f/2012/063/3/9/pretty_girl_by_elandir-d4ro1en.jpg'),(55,'Tsukune ghoul','Tsukune ghoul',5,'http://fc07.deviantart.net/fs30/f/2008/138/9/1/Tsukune_ghoul_by_Elandir.jpg','http://fc07.deviantart.net/fs30/f/2008/138/9/1/Tsukune_ghoul_by_Elandir.jpg'),(56,'Moka','Moka',5,'http://fc03.deviantart.net/fs25/f/2008/103/8/3/Rosario_to_vampire___Moka____by_Elandir.jpg','http://fc03.deviantart.net/fs25/f/2008/103/8/3/Rosario_to_vampire___Moka____by_Elandir.jpg'),(57,'Moka','Moka',5,'http://fc09.deviantart.net/fs26/f/2008/170/4/5/Rosario_to_Vampire_Moka_by_Elandir.jpg','http://fc09.deviantart.net/fs26/f/2008/170/4/5/Rosario_to_Vampire_Moka_by_Elandir.jpg'),(58,'Moka','Moka',5,'http://fc04.deviantart.net/fs39/f/2008/338/1/3/Rosario_to_Vampire___Moka___aw_by_Elandir.jpg','http://fc04.deviantart.net/fs39/f/2008/338/1/3/Rosario_to_Vampire___Moka___aw_by_Elandir.jpg'),(59,'Tats','Tats',20,'http://fc03.deviantart.net/fs71/f/2012/249/0/d/tattoos_by_elandir-d5dsex6.jpg','http://fc03.deviantart.net/fs71/f/2012/249/0/d/tattoos_by_elandir-d5dsex6.jpg'),(60,'Shadow thingy','Shadow thingy',20,'http://fc00.deviantart.net/fs70/f/2012/234/0/e/shadow_thingy_by_elandir-d5bzre2.jpg','http://fc00.deviantart.net/fs70/f/2012/234/0/e/shadow_thingy_by_elandir-d5bzre2.jpg'),(61,'Hello','Hello',20,'http://fc01.deviantart.net/fs71/f/2011/293/3/c/hello_by_elandir-d4de7w2.jpg','http://fc01.deviantart.net/fs71/f/2011/293/3/c/hello_by_elandir-d4de7w2.jpg'),(62,'Leaning','Leaning',20,'http://fc00.deviantart.net/fs71/f/2011/247/f/9/leaning_by_elandir-d48topj.jpg','http://fc00.deviantart.net/fs71/f/2011/247/f/9/leaning_by_elandir-d48topj.jpg'),(63,'Reegz','Reegz',20,'http://fc09.deviantart.net/fs71/f/2011/238/6/1/reegz_by_elandir-d47vp8b.jpg','http://fc09.deviantart.net/fs71/f/2011/238/6/1/reegz_by_elandir-d47vp8b.jpg'),(64,'Welcome','Welcome',20,'http://fc08.deviantart.net/fs71/f/2011/204/e/b/welcome_by_elandir-d41db5b.jpg','http://fc08.deviantart.net/fs71/f/2011/204/e/b/welcome_by_elandir-d41db5b.jpg'),(65,'Dark','Drak',20,'http://fc06.deviantart.net/fs70/f/2011/170/b/3/dark_by_elandir-d3jchxw.jpg','http://fc06.deviantart.net/fs70/f/2011/170/b/3/dark_by_elandir-d3jchxw.jpg'),(66,'Druid','Druid',20,'http://fc01.deviantart.net/fs71/f/2011/169/6/b/druid_by_elandir-d3j981j.jpg','http://fc01.deviantart.net/fs71/f/2011/169/6/b/druid_by_elandir-d3j981j.jpg'),(67,'Im a serb','Im a serb',20,'http://fc07.deviantart.net/fs71/f/2011/162/e/9/i__m_a_serb_by_elandir-d3imuyk.jpg','http://fc07.deviantart.net/fs71/f/2011/162/e/9/i__m_a_serb_by_elandir-d3imuyk.jpg'),(68,'Sod off','Sod off',20,'http://fc05.deviantart.net/fs71/f/2011/162/2/2/do_not_disturb_by_elandir-d3ils5y.jpg','http://fc05.deviantart.net/fs71/f/2011/162/2/2/do_not_disturb_by_elandir-d3ils5y.jpg'),(69,'Wrath','Wrath',20,'http://fc05.deviantart.net/fs70/f/2011/147/1/d/wrath_by_elandir-d3hd0w3.jpg','http://fc05.deviantart.net/fs70/f/2011/147/1/d/wrath_by_elandir-d3hd0w3.jpg'),(70,'Tower','Tower',20,'http://fc03.deviantart.net/fs71/f/2011/147/f/2/tower_by_elandir-d3hc6m4.jpg','http://fc03.deviantart.net/fs71/f/2011/147/f/2/tower_by_elandir-d3hc6m4.jpg'),(71,'Two guns','Two guns',20,'http://fc00.deviantart.net/fs71/f/2011/140/6/9/two_guns_by_elandir-d3gst82.jpg','http://fc00.deviantart.net/fs71/f/2011/140/6/9/two_guns_by_elandir-d3gst82.jpg'),(72,'Valentines','Valentines',20,'http://fc03.deviantart.net/fs70/f/2011/044/4/2/valentines_by_elandir-d39il4j.jpg','http://fc03.deviantart.net/fs70/f/2011/044/4/2/valentines_by_elandir-d39il4j.jpg'),(73,'Beer vs woman','Beer vs woman',20,'http://fc01.deviantart.net/fs71/f/2009/359/8/7/Beer_VS_Woman_by_Elandir.jpg','http://fc01.deviantart.net/fs71/f/2009/359/8/7/Beer_VS_Woman_by_Elandir.jpg'),(74,'Fox','Fox',20,'http://fc08.deviantart.net/fs30/f/2009/238/b/e/A_Fox_by_Elandir.jpg','http://fc08.deviantart.net/fs30/f/2009/238/b/e/A_Fox_by_Elandir.jpg'),(75,'Airship','Airship',20,'http://fc01.deviantart.net/fs51/f/2009/266/b/b/Airship_by_Elandir.jpg','http://fc01.deviantart.net/fs51/f/2009/266/b/b/Airship_by_Elandir.jpg'),(76,'Falling','Falling',20,'http://fc03.deviantart.net/fs48/f/2009/194/7/6/Falling_by_Elandir.jpg','http://fc03.deviantart.net/fs48/f/2009/194/7/6/Falling_by_Elandir.jpg'),(77,'Smile','Smile',20,'http://fc00.deviantart.net/fs44/f/2009/125/8/0/Smile_by_Elandir.jpg','http://fc00.deviantart.net/fs44/f/2009/125/8/0/Smile_by_Elandir.jpg'),(78,'Happy b-day','Happy b-day',20,'http://fc02.deviantart.net/fs42/f/2009/069/9/7/happy_birthday_by_Elandir.jpg','http://fc02.deviantart.net/fs42/f/2009/069/9/7/happy_birthday_by_Elandir.jpg'),(79,'From vice city','From vice city',20,'http://fc04.deviantart.net/fs31/f/2008/203/6/d/From_Vice_City_by_Elandir.jpg','http://fc04.deviantart.net/fs31/f/2008/203/6/d/From_Vice_City_by_Elandir.jpg'),(80,'Night elf','Night elf',20,'http://fc08.deviantart.net/fs38/f/2008/366/0/4/Night_Elf_by_Elandir.jpg','http://fc08.deviantart.net/fs38/f/2008/366/0/4/Night_Elf_by_Elandir.jpg'),(83,'csharp_p1','c sharp project',22,'/extra/pics/progs/cs/Picture1.png','/extra/pics/progs/cs/Picture1.png'),(84,'csharp_p2','c sharp project',22,'/extra/pics/progs/cs/Picture2.png','/extra/pics/progs/cs/Picture2.png'),(85,'csharp_p3','c sharp project',22,'/extra/pics/progs/cs/Picture3.png','/extra/pics/progs/cs/Picture3.png'),(86,'csharp_p4','c sharp project',22,'/extra/pics/progs/cs/Picture4.png','/extra/pics/progs/cs/Picture4.png'),(87,'vk:p1','vk project',23,'/extra/pics/progs/vk/vk1.png','/extra/pics/progs/vk/vk1.png'),(88,'vk_p2','vk project',23,'/extra/pics/progs/vk/vk2.png','/extra/pics/progs/vk/vk2.png'),(89,'vk_p3','vk project',23,'/extra/pics/progs/vk/vk3.png','/extra/pics/progs/vk/vk3.png'),(90,'vk_p4','vk project',23,'/extra/pics/progs/vk/vk3.png','/extra/pics/progs/vk/vk3.png'),(91,'js','simple js',24,'/extra/pics/progs/js/javascript.jpg','/extra/pics/progs/js/javascript.jpg'),(92,'F it','cute looking picture',3,'http://fc01.deviantart.net/fs71/i/2012/360/a/f/nice_looking_girl_by_elandir-d5p7ijz.jpg','http://fc01.deviantart.net/fs71/i/2012/360/a/f/nice_looking_girl_by_elandir-d5p7ijz.jpg'),(100,'Two guns','Two guns',21,'/extra/pics/slider/art.png','/extra/pics/slider/art.png'),(101,'C#','C sharp program',21,'/extra/pics/slider/cs.png','/extra/pics/slider/cs.png'),(102,'Gone','Gone',21,'/extra/pics/slider/manga1.jpg','/extra/pics/slider/manga1.jpg'),(103,'No way','No way',21,'/extra/pics/slider/manga2.jpg','/extra/pics/slider/manga2.jpg'),(104,'Beautiful girls','beautiful girls',21,'/extra/pics/slider/port.png','/extra/pics/slider/port.png'),(105,'VK','VK',21,'/extra/pics/slider/vk.gif','/extra/pics/slider/vk.gif'),(106,'acc1','access project',27,'/extra/pics/progs/access/acc1.png','/extra/pics/progs/access/acc1.png'),(107,'acc2','access project',27,'/extra/pics/progs/access/acc2.png','/extra/pics/progs/access/acc2.png'),(108,'acc3','access project',27,'/extra/pics/progs/access/acc3.png','/extra/pics/progs/access/acc3.png'),(109,'acc4','access project',27,'/extra/pics/progs/access/acc4.png','/extra/pics/progs/access/acc4.png'),(110,'html1','html project',28,'/extra/pics/progs/html/html1.png','/extra/pics/progs/html/html1.png'),(111,'html2','html project',28,'/extra/pics/progs/html/html2.png','/extra/pics/progs/html/html2.png'),(112,'mvc1','mvc project',25,'/extra/pics/progs/mvc/mvc1.png','/extra/pics/progs/mvc/mvc1.png'),(113,'mvc2','mvc project',25,'/extra/pics/progs/mvc/mvc2.png','/extra/pics/progs/mvc/mvc2.png'),(114,'mvc3','mvc project',25,'/extra/pics/progs/mvc/mvc3.png','/extra/pics/progs/mvc/mvc3.png'),(115,'mvc4','mvc project',25,'/extra/pics/progs/mvc/mvc4.png','/extra/pics/progs/mvc/mvc4.png'),(116,'weather','city info',26,'/extra/pics/progs/weather/w1.png','/extra/pics/progs/weather/w1.png'),(117,'weather','city info',26,'/extra/pics/progs/weather/w2.png','/extra/pics/progs/weather/w2.png'),(118,'Betrayal','Betrayal',8,'http://fc01.deviantart.net/fs70/i/2013/312/d/c/betrayal_by_elandir-d6thtyk.jpg','http://fc01.deviantart.net/fs70/i/2013/312/d/c/betrayal_by_elandir-d6thtyk.jpg'),(119,'Scythe','Scythe',8,'http://fc01.deviantart.net/fs70/i/2013/312/f/9/scythe_by_elandir-d6tht9o.jpg','http://fc01.deviantart.net/fs70/i/2013/312/f/9/scythe_by_elandir-d6tht9o.jpg'),(120,'Promise','Promise',8,'http://fc03.deviantart.net/fs71/i/2013/312/4/5/promise_by_elandir-d6thsu6.jpg','http://fc03.deviantart.net/fs71/i/2013/312/4/5/promise_by_elandir-d6thsu6.jpg'),(121,'The Saint','The Saint',20,'http://fc03.deviantart.net/fs70/f/2014/018/0/f/the_saint_by_elandir-d72no8o.jpg','http://fc03.deviantart.net/fs70/f/2014/018/0/f/the_saint_by_elandir-d72no8o.jpg'),(122,'Lollipop','Lollipop',8,'http://fc05.deviantart.net/fs70/i/2014/018/d/d/lollipop_by_elandir-d72notq.jpg','http://fc05.deviantart.net/fs70/i/2014/018/d/d/lollipop_by_elandir-d72notq.jpg'),(123,'Why','Why',8,'http://fc04.deviantart.net/fs71/i/2014/018/b/7/why____by_elandir-d72np9i.jpg','http://fc04.deviantart.net/fs71/i/2014/018/b/7/why____by_elandir-d72np9i.jpg'),(124,'It\'s unfair','It\'s unfair',1,'http://fc05.deviantart.net/fs71/i/2014/018/e/4/it_s_unfair____by_elandir-d72npif.jpg','http://fc05.deviantart.net/fs71/i/2014/018/e/4/it_s_unfair____by_elandir-d72npif.jpg');
/*!40000 ALTER TABLE `picture` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `programs`
--

DROP TABLE IF EXISTS `programs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `programs` (
  `id_prog` int(11) NOT NULL AUTO_INCREMENT,
  `name_prog` varchar(50) NOT NULL,
  `descr_prog` varchar(500) NOT NULL,
  `dl_link` varchar(150) NOT NULL,
  PRIMARY KEY (`id_prog`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `programs`
--

LOCK TABLES `programs` WRITE;
/*!40000 ALTER TABLE `programs` DISABLE KEYS */;
INSERT INTO `programs` (`id_prog`, `name_prog`, `descr_prog`, `dl_link`) VALUES (1,'C# games database','This program was made for school. In this program you can add, delete, view, change different games from Access database. Alseo theres a login and two level of user rights: admin and regular user.','http://www.4shared.com/rar/-uKOEdMb/cs_online.html'),(2,'PHP/PostgreSQL site','This site was to have quick access and overview of schools property.Theres a login system and basic CRUD for operating with data. Site is in estonian.','http://www.4shared.com/rar/xwyWy8hq/vk_online.html'),(3,'Simple JavaScript','This is just some simple JavaScrip, you can view the source code by downloading source.','http://www.4shared.com/rar/reyPxm2p/js_online.html'),(4,'Basic HTML and CSS','Project i had to make using only HTML and CSS. Basically its just a C++ ebook divided into chapters.','http://www.4shared.com/rar/1HKfEtTb/html.html'),(5,'MVC game database','Another database written using MVC technology in MS Visual Web Developer. In this program you have a simple CRUD and login.','http://www.4shared.com/rar/gGuBCVcb/mvc.html'),(6,'City info','In this program you can select a country, then its city and information is displayed. Written in MS Visual Web Developer, it should also display weather information using webservices but its outdated.','http://www.4shared.com/rar/7TbTUkN1/weather.html'),(7,'MS Access project','This one was made using only MS Access and its basically a video rental database with GUI.','http://www.4shared.com/rar/3QJjuto_/access.html');
/*!40000 ALTER TABLE `programs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id_user` int(11) NOT NULL AUTO_INCREMENT,
  `usern` varchar(30) NOT NULL,
  `pass` char(64) NOT NULL,
  `mail` varchar(30) NOT NULL,
  `name_user` varchar(30) DEFAULT NULL,
  `fname` varchar(30) DEFAULT NULL,
  `avatar` int(11) DEFAULT NULL,
  `quote` varchar(50) DEFAULT NULL,
  `likes` varchar(150) DEFAULT NULL,
  `date_join` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `is_admin` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id_user`),
  KEY `avatar` (`avatar`),
  CONSTRAINT `users_ibfk_1` FOREIGN KEY (`avatar`) REFERENCES `picture` (`id_pic`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` (`id_user`, `usern`, `pass`, `mail`, `name_user`, `fname`, `avatar`, `quote`, `likes`, `date_join`, `is_admin`) VALUES (10,'Elandir','b9176ac708e5b582cbbfc9f69d32f7b1446240a8be141c0c50708530a680c88c','timosoiunen@gmail.com','Timo','Soiunen',9,'Melike what me see, me take what me like','draving, programming, gaming','2013-04-28 12:46:29',1);
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping routines for database 'timosoiu_sitedb'
--
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2014-07-01 21:40:52
