-- MySQL dump 10.13  Distrib 5.5.28, for debian-linux-gnu (i686)
--
-- Host: localhost    Database: dropmovi
-- ------------------------------------------------------
-- Server version	5.5.28-0ubuntu0.12.04.2

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
-- Table structure for table `categories`
--

DROP TABLE IF EXISTS `categories`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `categories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `categories`
--

LOCK TABLES `categories` WRITE;
/*!40000 ALTER TABLE `categories` DISABLE KEYS */;
INSERT INTO `categories` VALUES (1,'Musica','musica'),(2,'Programación','programacion'),(3,'Literatura','literatura'),(4,'Bomberos','bombero'),(5,'Cine','cine');
/*!40000 ALTER TABLE `categories` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `comments`
--

DROP TABLE IF EXISTS `comments`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `comments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `publication_id` int(11) DEFAULT NULL,
  `content` varchar(5000) COLLATE utf8_unicode_ci NOT NULL,
  `date_of_create` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_5F9E962AA76ED395` (`user_id`),
  KEY `IDX_5F9E962A38B217A7` (`publication_id`),
  CONSTRAINT `FK_5F9E962A38B217A7` FOREIGN KEY (`publication_id`) REFERENCES `publications` (`id`),
  CONSTRAINT `FK_5F9E962AA76ED395` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `comments`
--

LOCK TABLES `comments` WRITE;
/*!40000 ALTER TABLE `comments` DISABLE KEYS */;
INSERT INTO `comments` VALUES (1,1,7,'Hola man!!','2012-11-26 01:36:17'),(2,2,8,'Excelente video =)','2012-11-26 01:44:45'),(3,1,8,'a mi tambien me gusta jejej','2012-11-26 02:06:38'),(4,1,3,'hola','2012-11-26 14:51:57'),(5,25,3,'halo!','2012-11-26 23:29:56'),(6,1,18,'Me gustan los caballos je','2012-11-27 03:08:56'),(7,1,8,'Si que me gusta daft punk','2012-11-27 03:09:16'),(8,25,8,'excelente','2012-11-27 03:10:53'),(9,38,11,'hola','2012-11-29 23:51:19');
/*!40000 ALTER TABLE `comments` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `feedbacks`
--

DROP TABLE IF EXISTS `feedbacks`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `feedbacks` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `date_of_create` datetime NOT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `url` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_7E6C3F89A76ED395` (`user_id`),
  CONSTRAINT `FK_7E6C3F89A76ED395` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `feedbacks`
--

LOCK TABLES `feedbacks` WRITE;
/*!40000 ALTER TABLE `feedbacks` DISABLE KEYS */;
/*!40000 ALTER TABLE `feedbacks` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `guests`
--

DROP TABLE IF EXISTS `guests`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `guests` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `inviting` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `date_of_create` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_4D11BCB2A76ED395` (`user_id`),
  CONSTRAINT `FK_4D11BCB2A76ED395` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=69 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `guests`
--

LOCK TABLES `guests` WRITE;
/*!40000 ALTER TABLE `guests` DISABLE KEYS */;
INSERT INTO `guests` VALUES (48,1,'jesus.diaz@agilecode.com.ar','2012-11-28 21:30:57'),(49,1,'jesus.diaz@agilecode.com.ar','2012-11-28 21:32:42'),(50,1,'jesus.diaz@agilecode.com.ar','2012-11-28 21:32:50'),(51,1,'jesus.diaz@agilecode.com.ar','2012-11-28 21:33:40'),(52,1,'jesus.diaz@agilecode.com.ar','2012-11-28 21:51:19'),(53,1,'jesus.diaz@agilecode.com.ar','2012-11-28 21:52:13'),(54,1,'jesus.diaz@agilecode.com.ar','2012-11-28 22:13:32'),(55,1,'gbuuss@gmail.com','2012-11-28 22:15:18'),(56,1,'gbuuss@gmail.com','2012-11-28 22:19:55'),(57,1,'gbuuss@gmail.com','2012-11-28 22:20:49'),(58,1,'gbuuss@gmail.com','2012-11-28 22:21:58'),(59,1,'jesus.diaz@agilecode.com.ar','2012-11-29 00:57:55'),(60,1,'gbuuss@gmail.com','2012-11-29 01:03:34'),(61,1,'gbuuss@gmail.com','2012-11-29 01:06:47'),(62,38,'gbuuss@gmail.com','2012-11-29 23:54:28'),(63,38,'gbuuss@gmail.com','2012-11-29 23:58:26'),(64,38,'gbuuss@gmail.com','2012-11-30 00:00:29'),(65,38,'not-replay@dropmovi.com','2012-11-30 00:04:37'),(66,38,'gbuuss@gmail.com','2012-11-30 00:05:28'),(67,38,'gbuuss@gmail.com','2012-11-30 00:07:40'),(68,38,'gbuuss@gmail.com','2012-11-30 00:11:21');
/*!40000 ALTER TABLE `guests` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `interests`
--

DROP TABLE IF EXISTS `interests`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `interests` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `interests`
--

LOCK TABLES `interests` WRITE;
/*!40000 ALTER TABLE `interests` DISABLE KEYS */;
/*!40000 ALTER TABLE `interests` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `publications`
--

DROP TABLE IF EXISTS `publications`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `publications` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `category_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `content` varchar(10000) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `date_of_create` datetime NOT NULL,
  `tags` varchar(4000) COLLATE utf8_unicode_ci NOT NULL,
  `path` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `visits` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_32783AF412469DE2` (`category_id`),
  KEY `IDX_32783AF4A76ED395` (`user_id`),
  CONSTRAINT `FK_32783AF412469DE2` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`),
  CONSTRAINT `FK_32783AF4A76ED395` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `publications`
--

LOCK TABLES `publications` WRITE;
/*!40000 ALTER TABLE `publications` DISABLE KEYS */;
INSERT INTO `publications` VALUES (1,1,1,'Marcos Brunet en vivo mas vivo que nunca de los nunca','marcos-brunet-en-vivo-mas-vivo-que-nunca-de-los-nunca','<p>dasdas</p>','dasdas','2012-11-25 22:40:11','disco publicacion cosas otro bat','d04f0ac3a577bc0f777137c1bd4d36765741d4af.jpeg',58),(2,1,1,'Batman el caballero de la noche asciende','batman-el-caballero-de-la-noche-asciende','<p>dadas</p>','dadas','2012-11-25 22:44:44','batman','50a1d57c92eec7b617204d253c28277526150c58.jpeg',40),(3,1,1,'Start Wars - Guerras Clonicas','start-wars-guerras-clonicas','<p><span>Cronol&oacute;gicamente, los sucesos de la serie ocurren en el per&iacute;odo de tres a&ntilde;os que existe entre&nbsp;</span><em><a class=\"mw-redirect\" title=\"El ataque de los clones\" href=\"http://es.wikipedia.org/wiki/El_ataque_de_los_clones\">El ataque de los clones</a></em><span>&nbsp;y&nbsp;</span><em><a class=\"mw-redirect\" title=\"La venganza de los Sith\" href=\"http://es.wikipedia.org/wiki/La_venganza_de_los_Sith\">La venganza de los Sith</a></em><span>. Esta serie fue producida por&nbsp;</span><a title=\"Cartoon Network Studios\" href=\"http://es.wikipedia.org/wiki/Cartoon_Network_Studios\">Cartoon Network Studios</a><span>&nbsp;en asociacion con&nbsp;</span><a title=\"Lucasfilm\" href=\"http://es.wikipedia.org/wiki/Lucasfilm\">Lucasfilm</a><span>, y tuvo 25 episodios los cuales fueron emitidos desde el a&ntilde;o</span><a title=\"2003\" href=\"http://es.wikipedia.org/wiki/2003\">2003</a><span>&nbsp;hasta el a&ntilde;o&nbsp;</span><a title=\"2005\" href=\"http://es.wikipedia.org/wiki/2005\">2005</a><span>. Una serie animada en&nbsp;</span><a class=\"mw-redirect\" title=\"Computer Generated Imagery\" href=\"http://es.wikipedia.org/wiki/Computer_Generated_Imagery\">CGI</a><span>&nbsp;</span><a class=\"mw-redirect\" title=\"3D\" href=\"http://es.wikipedia.org/wiki/3D\">3D</a><span>&nbsp;llamada&nbsp;</span><em><a title=\"Star Wars: The Clone Wars (serie de televisi&oacute;n de 2008)\" href=\"http://es.wikipedia.org/wiki/Star_Wars:_The_Clone_Wars_(serie_de_televisi%C3%B3n_de_2008)\">Star Wars: The Clone Wars</a></em><span>&nbsp;se sit&uacute;a en el mismo per&iacute;odo. Esta serie fue producida por&nbsp;</span><a title=\"Lucasfilm Animation\" href=\"http://es.wikipedia.org/wiki/Lucasfilm_Animation\">Lucasfilm Animation</a><span>, una divisi&oacute;n de&nbsp;</span><a title=\"Lucasfilm\" href=\"http://es.wikipedia.org/wiki/Lucasfilm\">Lucasfilm</a><span>; y estrenada el&nbsp;</span><a title=\"3 de octubre\" href=\"http://es.wikipedia.org/wiki/3_de_octubre\">3 de octubre</a><span>&nbsp;de&nbsp;</span><a title=\"2008\" href=\"http://es.wikipedia.org/wiki/2008\">2008</a><span>.</span><sup id=\"cite_ref-1\" class=\"reference\"><a href=\"http://es.wikipedia.org/wiki/Star_Wars:_Clone_Wars_(serie_de_televisi%C3%B3n_de_2003)#cite_note-1\">1</a></sup></p>','Cronol&oacute;gicamente, los sucesos de la serie ocurren en el per&iacute;odo de tres a&ntilde;os que existe entre&nbsp;El ataque de los clones&nbsp;y&nbsp;La venganza de los Sith. Esta serie fue producida por&nbsp;Cartoon Network Studios&nbsp;en asociaci','2012-11-26 01:25:13','start wars guerras clonicas batman','05513b23ec6fed437c5aeff293e4a5a6db7b7497.jpeg',104),(4,1,1,'The big bang Theory Temporada 1','the-big-bang-theory-temporada-1','<p><span>La serie original se compone de 20 miniepisodios de 3 minutos para las primeras dos temporadas (que componen el volumen uno de la serie) y cinco episodios de doce a quince minutos de duraci&oacute;n para la tercera temporada (que componen el volumen dos de la serie). Los 25 episodios se componen principalmente de batallas internas ya que su &eacute;nfasis est&aacute; centrado en la acci&oacute;n, por este motivo la historia no est&aacute; tan desarrollada como en las pel&iacute;culas. A pesar de esto, se puede ver en la tercera temporada que la historia se centra a las acciones de&nbsp;</span><a title=\"Anakin Skywalker\" href=\"http://es.wikipedia.org/wiki/Anakin_Skywalker\">Anakin Skywalker</a><span>.</span></p>','La serie original se compone de 20 miniepisodios de 3 minutos para las primeras dos temporadas (que componen el volumen uno de la serie) y cinco episodios de doce a quince minutos de duraci&oacute;n para la tercera temporada (que componen el volumen dos d','2012-11-26 01:26:04','anakin skywalker batman serie television','5bc9a92967b11b684d5328490fea248114895f85.jpeg',10),(6,1,1,'Google Ataca','google-ataca','<h3>Glyphicons attribution</h3>\r\n<p><a href=\"http://glyphicons.com/\">Glyphicons</a>&nbsp;Halflings are normally not available for free, but an arrangement between Bootstrap and the Glyphicons creators have made this possible at no cost to you as developers. As a thank you, we ask you to include an optional link back to&nbsp;<a href=\"http://glyphicons.com/\">Glyphicons</a>&nbsp;whenever practical.</p>','Glyphicons attribution\r\nGlyphicons&nbsp;Halflings are normally not available for free, but an arrangement between Bootstrap and the Glyphicons creators have made this possible at no cost to you as developers. As a thank you, we ask you to include an optio','2012-11-26 01:31:17','batman ataca musica google dodle','ed2f27b28a29270d329cfa70d3f308603d997629.jpeg',10),(7,1,1,'Nirvana Unplugged','nirvana-unplugged','<p>&nbsp;</p>\r\n<p><em><strong>MTV Unplugged in New York</strong></em>&nbsp;es un &aacute;lbum en vivo de la banda&nbsp;<a title=\"Estados Unidos\" href=\"http://es.wikipedia.org/wiki/Estados_Unidos\">estadounidense</a>&nbsp;de&nbsp;<a title=\"Grunge\" href=\"http://es.wikipedia.org/wiki/Grunge\">grunge</a>,&nbsp;<a title=\"Nirvana (banda)\" href=\"http://es.wikipedia.org/wiki/Nirvana_(banda)\">Nirvana</a>, lanzado en noviembre de 1994. El &aacute;lbum muestra el concierto&nbsp;<a title=\"Guitarra ac&uacute;stica\" href=\"http://es.wikipedia.org/wiki/Guitarra_ac%C3%BAstica\">ac&uacute;stico</a>&nbsp;que la banda hizo en los estudios&nbsp;<a title=\"Sony\" href=\"http://es.wikipedia.org/wiki/Sony\">Sony Music</a>&nbsp;en&nbsp;<a title=\"Nueva York\" href=\"http://es.wikipedia.org/wiki/Nueva_York\">Nueva York</a>&nbsp;el&nbsp;<a title=\"18 de noviembre\" href=\"http://es.wikipedia.org/wiki/18_de_noviembre\">18 de noviembre</a>&nbsp;de&nbsp;<a title=\"1993\" href=\"http://es.wikipedia.org/wiki/1993\">1993</a>. El &aacute;lbum gan&oacute; un premio<a class=\"mw-redirect\" title=\"Grammy\" href=\"http://es.wikipedia.org/wiki/Grammy\">Grammy</a>&nbsp;por Mejor &Aacute;lbum de M&uacute;sica&nbsp;<a title=\"Rock alternativo\" href=\"http://es.wikipedia.org/wiki/Rock_alternativo\">Alternativa</a>&nbsp;en&nbsp;<a title=\"1996\" href=\"http://es.wikipedia.org/wiki/1996\">1996</a>. Una versi&oacute;n en DVD fue lanzada en 2007.</p>\r\n<p>&nbsp;</p>\r\n<p><iframe style=\"display: block; margin-left: auto; margin-right: auto;\" src=\"http://www.youtube.com/embed/mDVCCK6n7TQ\" frameborder=\"0\" width=\"425\" height=\"350\"></iframe></p>','&nbsp;\r\nMTV Unplugged in New York&nbsp;es un &aacute;lbum en vivo de la banda&nbsp;estadounidense&nbsp;de&nbsp;grunge,&nbsp;Nirvana, lanzado en noviembre de 1994. El &aacute;lbum muestra el concierto&nbsp;ac&uacute;stico&nbsp;que la banda hizo en los estu','2012-11-26 01:35:38','nirvana musica batman taringa','58944c5007ea85d774a365c6c6dbab9b5c1fd0e7.jpeg',9),(8,1,2,'Daft Punk en vivo','daft-punk-en-vivo','<p><strong>Daft Punk</strong>&nbsp;es un d&uacute;o de&nbsp;<a title=\"M&uacute;sica electr&oacute;nica\" href=\"http://es.wikipedia.org/wiki/M%C3%BAsica_electr%C3%B3nica\">m&uacute;sica electr&oacute;nica</a>&nbsp;formado por los m&uacute;sicos franceses&nbsp;<a class=\"mw-redirect\" title=\"Guy Manuel de Homem-Christo\" href=\"http://es.wikipedia.org/wiki/Guy_Manuel_de_Homem-Christo\">Guy Manuel de Homem-Christo</a>&nbsp;(nacido el 8 de febrero de 1974) y&nbsp;<a title=\"Thomas Bangalter\" href=\"http://es.wikipedia.org/wiki/Thomas_Bangalter\">Thomas Bangalter</a>&nbsp;(nacido el 3 de enero de 1975)<sup id=\"cite_ref-mascaras_1-0\" class=\"reference\"><a href=\"http://es.wikipedia.org/wiki/Daft_Punk#cite_note-mascaras-1\">1</a></sup>&nbsp;<sup id=\"cite_ref-allmusic_2-0\" class=\"reference\"><a href=\"http://es.wikipedia.org/wiki/Daft_Punk#cite_note-allmusic-2\">2</a></sup>&nbsp;<sup id=\"cite_ref-musique_3-0\" class=\"reference\"><a href=\"http://es.wikipedia.org/wiki/Daft_Punk#cite_note-musique-3\">3</a></sup>&nbsp;Daft Punk alcanz&oacute; una gran popularidad en el estilo&nbsp;<a title=\"House (m&uacute;sica)\" href=\"http://es.wikipedia.org/wiki/House_(m%C3%BAsica)\">House</a>&nbsp;a finales de la d&eacute;cada de los \'90, en Francia y continu&oacute; con su &eacute;xito los a&ntilde;os siguientes, usando el estilo&nbsp;<a class=\"mw-redirect\" title=\"Synthpop\" href=\"http://es.wikipedia.org/wiki/Synthpop\">synthpop</a>.<sup id=\"cite_ref-mascaras_1-1\" class=\"reference\"><a href=\"http://es.wikipedia.org/wiki/Daft_Punk#cite_note-mascaras-1\">1</a></sup>&nbsp;<sup id=\"cite_ref-allmusic_2-1\" class=\"reference\"><a href=\"http://es.wikipedia.org/wiki/Daft_Punk#cite_note-allmusic-2\">2</a></sup>&nbsp;<sup id=\"cite_ref-return_4-0\" class=\"reference\"><a href=\"http://es.wikipedia.org/wiki/Daft_Punk#cite_note-return-4\">4</a></sup>&nbsp;El d&uacute;o tambi&eacute;n es acreditado por la producci&oacute;n de canciones que se consideran esenciales en el estilo&nbsp;<a title=\"French house\" href=\"http://es.wikipedia.org/wiki/French_house\">french house</a>. Ellos fueron representados desde 1996 hasta el 2008 por Pedro Winter (Busy P) el jefe de&nbsp;<a title=\"Ed Banger Records\" href=\"http://es.wikipedia.org/wiki/Ed_Banger_Records\">Ed Banger Records</a>.<sup id=\"cite_ref-5\" class=\"reference\"><a href=\"http://es.wikipedia.org/wiki/Daft_Punk#cite_note-5\">5</a></sup></p>\r\n<p>A principios de la carrera del grupo, los miembros de la banda estaban influidos por bandas como&nbsp;<a title=\"The Beach Boys\" href=\"http://es.wikipedia.org/wiki/The_Beach_Boys\">The Beach Boys</a>&nbsp;y&nbsp;<a title=\"The Rolling Stones\" href=\"http://es.wikipedia.org/wiki/The_Rolling_Stones\">The Rolling Stones</a>. Bangalter y de Homem-Christo se encontraban originalmente en una banda llamada Darlin\', que se disolvi&oacute; despu&eacute;s de un corto per&iacute;odo de tiempo, dejando a los dos experimentar con m&uacute;sica por su cuenta. El d&uacute;o se convirti&oacute; en Daft Punk, y lanzaron su aclamado &aacute;lbum debut<em><a title=\"Homework\" href=\"http://es.wikipedia.org/wiki/Homework\">Homework</a></em>&nbsp;en 1997. El segundo &aacute;lbum,&nbsp;<em><a title=\"Discovery (&aacute;lbum de Daft Punk)\" href=\"http://es.wikipedia.org/wiki/Discovery_(%C3%A1lbum_de_Daft_Punk)\">Discovery</a></em>, lanzado en el 2001, fue a&uacute;n m&aacute;s exitoso, impulsado por los sencillos &laquo;<a title=\"One More Time (canci&oacute;n de Daft Punk)\" href=\"http://es.wikipedia.org/wiki/One_More_Time_(canci%C3%B3n_de_Daft_Punk)\">One More Time</a>&raquo;, &laquo;<a title=\"Digital Love\" href=\"http://es.wikipedia.org/wiki/Digital_Love\">Digital Love</a>&raquo; y &laquo;<a title=\"Harder, Better, Faster, Stronger\" href=\"http://es.wikipedia.org/wiki/Harder,_Better,_Faster,_Stronger\">Harder, Better, Faster, Stronger</a>&raquo;. En marzo de 2005, el d&uacute;o lanz&oacute; el &aacute;lbum&nbsp;<em><a title=\"Human After All\" href=\"http://es.wikipedia.org/wiki/Human_After_All\">Human After All</a></em>, recibiendo cr&iacute;ticas mixtas. Sin embargo, &laquo;<a title=\"Robot Rock\" href=\"http://es.wikipedia.org/wiki/Robot_Rock\">Robot Rock</a>&raquo; y &laquo;<a class=\"mw-redirect\" title=\"Technologic\" href=\"http://es.wikipedia.org/wiki/Technologic\">Technologic</a>&raquo; tuvieron &eacute;xito en el Reino Unido. Daft Punk&nbsp;<a title=\"Alive 2006/2007\" href=\"http://es.wikipedia.org/wiki/Alive_2006/2007\">hizo una gira a lo largo del 2006 y 2007</a>&nbsp;y lanz&oacute; su &aacute;lbum en vivo&nbsp;<em><a title=\"Alive 2007\" href=\"http://es.wikipedia.org/wiki/Alive_2007\">Alive 2007</a></em>, el cu&aacute;l gan&oacute; un&nbsp;<a class=\"mw-redirect\" title=\"Grammy\" href=\"http://es.wikipedia.org/wiki/Grammy\">Grammy</a>&nbsp;por Mejor &Aacute;lbum de Electr&oacute;nica/Dance. El d&uacute;o compuso la m&uacute;sica para la pel&iacute;cula&nbsp;<em><a title=\"Tron: Legacy\" href=\"http://es.wikipedia.org/wiki/Tron:_Legacy\">Tron: Legacy</a></em>&nbsp;y en el 2010 lanz&oacute;&nbsp;<a title=\"Tron: Legacy (banda sonora)\" href=\"http://es.wikipedia.org/wiki/Tron:_Legacy_(banda_sonora)\">el &aacute;lbum de la banda sonora de la pel&iacute;cula</a>.</p>\r\n<p>&nbsp;</p>\r\n<p><iframe style=\"display: block; margin-left: auto; margin-right: auto;\" src=\"http://www.youtube.com/embed/s9MszVE7aR4\" frameborder=\"0\" width=\"630\" height=\"434\"></iframe></p>','Daft Punk&nbsp;es un d&uacute;o de&nbsp;m&uacute;sica electr&oacute;nica&nbsp;formado por los m&uacute;sicos franceses&nbsp;Guy Manuel de Homem-Christo&nbsp;(nacido el 8 de febrero de 1974) y&nbsp;Thomas Bangalter&nbsp;(nacido el 3 de enero de 1975)1&nbsp','2012-11-26 01:43:39','daft punk vivo tema video bat goo','796ed620457b3d819dcc5fb47bdad77f2aa6943c.jpeg',142),(10,1,1,'Super moto Kawasaki','super-moto-kawasaki','<p>Create and share with groups of people</p>\r\n<p>Along with familiar features like group creation and search, Google Groups has a new look and exciting new features. Now you can:</p>\r\n<p>Create rich custom group web pages<br />Customize your group\'s look and graphics<br />Upload files for your members to share<br />Share member profiles<br />And more...</p>','Create and share with groups of people\r\nAlong with familiar features like group creation and search, Google Groups has a new look and exciting new features. Now you can:\r\nCreate rich custom group web pagesCustomize your group\'s look and graphicsUpload fil','2012-11-26 02:11:37','musica moto kawasaki super talon','93609d8261e19e32002935f164982eaf1da3a6b7.jpeg',16),(11,1,1,'El mejor equipo de musica','el-mejor-equipo-de-musica','<p><span>Habla, chatea, comparte, planifica, almacena, organiza, colabora, descubre y crea. Usa los productos de Google, desde Gmail hasta Google+ o YouTube, y consulta tu historial de b&uacute;squeda, todo con un solo nombre de usuario y contrase&ntilde;a, mientras se hacen copias de seguridad permanentes. Puedes encontrar todo esto en (s&iacute;, adivinaste) Google.com.</span></p>','Habla, chatea, comparte, planifica, almacena, organiza, colabora, descubre y crea. Usa los productos de Google, desde Gmail hasta Google+ o YouTube, y consulta tu historial de b&uacute;squeda, todo con un solo nombre de usuario y contrase&ntilde;a, mientr','2012-11-26 18:32:46','musica otra cosa que no puede faltar bat man','1cc42040acd859c8e4652879daa41c198faee6af.jpeg',16),(15,2,1,'dadas','dadas','<p>ddasdasdsa</p>','ddasdasdsa','2012-11-26 19:08:10','symfony2','b00edb1b9c230d7c996b2b65413b894f06a28718.jpeg',9),(16,2,25,'El paraguas soliario','el-paraguas-soliario','<p><span>In all the examples of many-valued associations in this manual we will make use of a&nbsp;</span><tt class=\"docutils literal\"><span class=\"pre\">Collection</span></tt><span>&nbsp;interface and a corresponding default implementation&nbsp;</span><tt class=\"docutils literal\"><span class=\"pre\">ArrayCollection</span></tt><span>&nbsp;that are defined in the&nbsp;</span><tt class=\"docutils literal\"><span class=\"pre\">Doctrine\\Common\\Collections</span></tt><span>&nbsp;namespace. Why do we need that? Doesn&rsquo;t that couple my domain model to Doctrine? Unfortunately, PHP arrays, while being great for many things, do not make up for good collections of business objects, especially not in the context of an ORM. The reason is that plain PHP arrays can not be transparently extended / instrumented in PHP code, which is necessary for a lot of advanced ORM features. The classes / interfaces that come closest to an OO collection are ArrayAccess and ArrayObject but until instances of these types can be used in all places where a plain array can be used (something that may happen in PHP6) their usability is fairly limited. You &ldquo;can&rdquo; type-hint on&nbsp;</span><tt class=\"docutils literal\"><span class=\"pre\">ArrayAccess</span></tt><span>&nbsp;instead of&nbsp;</span><tt class=\"docutils literal\"><span class=\"pre\">Collection</span></tt><span>, since the Collection interface extends</span><tt class=\"docutils literal\"><span class=\"pre\">ArrayAccess</span></tt><span>, but this will severely limit you in the way you can work with the collection, because the&nbsp;</span><tt class=\"docutils literal\"><span class=\"pre\">ArrayAccess</span></tt><span>&nbsp;API is (intentionally) very primitive and more importantly because you can not pass this collection to all the useful PHP array functions, which makes it very hard to work with.</span></p>','In all the examples of many-valued associations in this manual we will make use of a&nbsp;Collection&nbsp;interface and a corresponding default implementation&nbsp;ArrayCollection&nbsp;that are defined in the&nbsp;Doctrine\\Common\\Collections&nbsp;namespac','2012-11-27 02:48:22','doctrine,paraguas,prueba,bat','1fcdbf94abded3ac2e2c70b4808986bd7e12f090.jpeg',10),(17,4,25,'La Guerra de Mac comenzó','la-guerra-de-mac-comenz','<p>Sometido a presiones por parte del gobierno, la prensa y la opini&oacute;n p&uacute;blica para que comparta su tecnolog&iacute;a con el ej&eacute;rcito, Tony es reacio a desvelar los secretos de la armadura de Iron Man porque teme que esa informaci&oacute;n pueda caer en manos indeseables.</p>','Sometido a presiones por parte del gobierno, la prensa y la opini&oacute;n p&uacute;blica para que comparta su tecnolog&iacute;a con el ej&eacute;rcito, Tony es reacio a desvelar los secretos de la armadura de Iron Man porque teme que esa informaci&oacute','2012-11-27 02:55:21','mac,geurra,comenzo,nada,importante,ipod,imac','7784d5e5bb48998f2a66c2d4782194ae3d056511.jpeg',10),(18,5,1,'Super caballos','super-caballos','<p><span>Tras sufrir algunas desgracias familiares, Ben (McDermott) y su esposa Vivien (Britton) dejan Boston y se trasladan a una casa de San Francisco con la esperanza de reconstruir su vida. Moira O&rsquo;Hara, una chica que trabaj&oacute; en esa casa, aparece a los ojos de Vivien como una sexagenaria (Conroy); Ben, en cambio, la percibe como una mujer joven (Breckenridge).</span></p>','Tras sufrir algunas desgracias familiares, Ben (McDermott) y su esposa Vivien (Britton) dejan Boston y se trasladan a una casa de San Francisco con la esperanza de reconstruir su vida. Moira O&rsquo;Hara, una chica que trabaj&oacute; en esa casa, aparece ','2012-11-27 03:07:55','caballos,cine,animales,cosas,varias','33a78c64ba7c54be768a35a8070794ee1f3aaf63.jpeg',15);
/*!40000 ALTER TABLE `publications` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `last_name` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `username` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `date_of_create` datetime NOT NULL,
  `email` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `biography` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `website` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `location` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `path` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNIQ_1483A5E9F85E0677` (`username`),
  UNIQUE KEY `UNIQ_1483A5E9E7927C74` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=39 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'Lee Suan','Byron','mocochin','cha24diosea','2012-11-25 22:34:32','gbuuss@gmail.com.ar','Viste cuando vas, y no tenes ni idea con lo que te vas a encontrar.','http://www.agilecode.com.ar','Pasadena, EEUU','f35612bb0f9ea3654e7b1d232df110cb59feef93.jpeg'),(2,'Juana Dalila','Dominguez','juana','juana','2012-11-26 01:39:04','juana@juana.com','MTV Unplugged in New York es un álbum en vivo de la banda estadounidense de grunge, Nirvana, lanzado en noviembre de 1994. El álbum muestra el concierto acústico que la banda hizo en los estudios Sony Music en Nueva York el 18 de noviembre de 1993. El álbum ganó un premio Grammy por Mejor Álbum de Música Alternativa en 1996. Una versión en DVD fue lanzada en 2007.','www.agilecode.com.ar','Córdoba, Argentina','b73a85541aec926a0b44e4267f104ce5827c5d6e.jpeg'),(25,'Jesus','Diaz','mocochin2','cha24diosea','2012-11-26 23:27:10','gbuuss@gmaidasdasl.com','Puedes cambiar la información que se mostrara en tu perfil publico. Actualmente tu perfil publico esta en http://www.dropmovi.com/mocochin2, recorda que lo puedes modificar en las configuraciones de la cuenta.','http://www.agilecode.com.ar','Córdoba, Argentina','cdb2733b2764f4cd80d4700044b9c2af5bec54e6.jpeg'),(38,'Jesus','Diaz','das','dsadsa','2012-11-29 23:37:12','gbuuss@gmail.com','','','','82c117eec8ba05b8c0aee4fe262245efbaa09e09.png');
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

-- Dump completed on 2012-11-30  0:22:39
