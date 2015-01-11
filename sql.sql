/*
SQLyog Ultimate v11.11 (64 bit)
MySQL - 5.5.40-0ubuntu0.14.04.1 : Database - webapp
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`webapp` /*!40100 DEFAULT CHARACTER SET utf8 */;

USE `webapp`;

/*Table structure for table `app_admin_users` */

DROP TABLE IF EXISTS `app_admin_users`;

CREATE TABLE `app_admin_users` (
  `admin_idPK` bigint(20) NOT NULL AUTO_INCREMENT,
  `admin_email` varchar(100) DEFAULT NULL,
  `admin_fname` varchar(50) DEFAULT NULL,
  `admin_lname` varchar(50) DEFAULT NULL,
  `admin_password` varchar(100) DEFAULT NULL,
  `admin_date_added` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_by` bigint(20) DEFAULT NULL,
  PRIMARY KEY (`admin_idPK`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8;

/*Data for the table `app_admin_users` */

insert  into `app_admin_users`(`admin_idPK`,`admin_email`,`admin_fname`,`admin_lname`,`admin_password`,`admin_date_added`,`created_by`) values (4,'test@test.email','owen','owen','1','2014-06-04 10:55:12',1),(6,'test@test.email11','asdf','asdf','asdffasdf','2014-06-04 10:59:12',4),(7,'test@test.email333','sadfdsaf','asdfdsaf','sadfsaf','2014-06-04 11:00:49',1),(8,'test@test.email22222','sadfsadfasf','asfsadasdf','sdafsaf','2014-06-04 11:01:23',4),(9,'test@test.comsadfs','fsadfdsaf','asfdsfsad','asdfsafasd','2014-06-04 11:17:24',4),(10,'test@test.email31','safsadfsasateste','asdfsaftestest','dsafsaf','2014-06-04 11:24:55',4),(11,'test@test.email1233','fsadfasf','safasdfsafsaf','sdafdsasaf','2014-06-04 11:25:32',1),(12,'test@test.email123322','asfsdafsa','fasdfasfadf','sfsadfdsaf','2014-06-04 11:26:22',4),(14,'test@test.email243asdf','safdfs','adfsadfsaf','sadfsadf','2014-06-04 11:30:36',1),(15,'test@test.email','mark','arias','sadfsdaf','2014-06-04 11:31:01',1),(16,'test@test.email123422','sadfsaf','asfsadfs','tefsadfsadf','2014-06-04 11:49:34',1),(17,'test@test.email32sdafsad','fsadfdsaasf','dfasfsas','asdfsaf','2014-06-04 13:19:13',1),(18,'test@test.email6432','asdfasf','asfdasfasf','sadfasf','2014-06-04 14:41:25',4),(19,'test@test.emailassadf3422','asdfdsaf','asfdsfasdf','sadfsafasdf','2014-06-04 15:57:17',1),(20,'test@test2.email','<\"aasdf','asdfsadf\">','12345','2014-10-15 11:10:52',4),(21,'test@test3.email','<\"aasdf','asdfsadf\">','12345','2014-10-15 11:16:20',4),(22,'test@testsfsdaf.com','sadfds','fasdfasdf','12345','2014-10-30 14:02:18',4);

/*Table structure for table `app_countries` */

DROP TABLE IF EXISTS `app_countries`;

CREATE TABLE `app_countries` (
  `country_id` int(11) DEFAULT NULL,
  `country_name` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `app_countries` */

insert  into `app_countries`(`country_id`,`country_name`) values (1,'Afghanistan'),(2,'Albania'),(3,'Algeria'),(4,'American Samoa'),(5,'Andorra'),(6,'Angola'),(7,'Anguilla'),(8,'Antarctica'),(9,'Antigua and Barbuda'),(10,'Argentina'),(11,'Armenia'),(12,'Armenia'),(13,'Aruba'),(14,'Australia'),(15,'Austria'),(16,'Azerbaijan'),(17,'Azerbaijan'),(18,'Bahamas'),(19,'Bahrain'),(20,'Bangladesh'),(21,'Barbados'),(22,'Belarus'),(23,'Belgium'),(24,'Belize'),(25,'Benin'),(26,'Bermuda'),(27,'Bhutan'),(28,'Bolivia'),(29,'Bosnia and Herzegovina'),(30,'Botswana'),(31,'Bouvet Island'),(32,'Brazil'),(33,'British Indian Ocean Territory'),(34,'Brunei Darussalam'),(35,'Bulgaria'),(36,'Burkina Faso'),(37,'Burundi'),(38,'Cambodia'),(39,'Cameroon'),(40,'Canada'),(41,'Cape Verde'),(42,'Cayman Islands'),(43,'Central African Republic'),(44,'Chad'),(45,'Chile'),(46,'China'),(47,'Christmas Island'),(48,'Cocos (Keeling) Islands'),(49,'Colombia'),(50,'Comoros'),(51,'Congo'),(52,'Congo, The Democratic Republic of The'),(53,'Cook Islands'),(54,'Costa Rica'),(55,'Cote D\'ivoire'),(56,'Croatia'),(57,'Cuba'),(58,'Cyprus'),(60,'Czech Republic'),(61,'Denmark'),(62,'Djibouti'),(63,'Dominica'),(64,'Dominican Republic'),(65,'Easter Island'),(66,'Ecuador'),(67,'Egypt'),(68,'El Salvador'),(69,'Equatorial Guinea'),(70,'Eritrea'),(71,'Estonia'),(72,'Ethiopia'),(73,'Falkland Islands (Malvinas)'),(74,'Faroe Islands'),(75,'Fiji'),(76,'Finland'),(77,'France'),(78,'French Guiana'),(79,'French Polynesia'),(80,'French Southern Territories'),(81,'Gabon'),(82,'Gambia'),(83,'Georgia'),(85,'Germany'),(86,'Ghana'),(87,'Gibraltar'),(88,'Greece'),(89,'Greenland'),(91,'Grenada'),(92,'Guadeloupe'),(93,'Guam'),(94,'Guatemala'),(95,'Guinea'),(96,'Guinea-bissau'),(97,'Guyana'),(98,'Haiti'),(99,'Heard Island and Mcdonald Islands'),(100,'Honduras'),(101,'Hong Kong'),(102,'Hungary'),(103,'Iceland'),(104,'India'),(105,'Indonesia'),(106,'Indonesia'),(107,'Iran'),(108,'Iraq'),(109,'Ireland'),(110,'Israel'),(111,'Italy'),(112,'Jamaica'),(113,'Japan'),(114,'Jordan'),(115,'Kazakhstan'),(116,'Kazakhstan'),(117,'Kenya'),(118,'Kiribati'),(119,'Korea, North'),(120,'Korea, South'),(121,'Kosovo'),(122,'Kuwait'),(123,'Kyrgyzstan'),(124,'Laos'),(125,'Latvia'),(126,'Lebanon'),(127,'Lesotho'),(128,'Liberia'),(129,'Libyan Arab Jamahiriya'),(130,'Liechtenstein'),(131,'Lithuania'),(132,'Luxembourg'),(133,'Macau'),(134,'Macedonia'),(135,'Madagascar'),(136,'Malawi'),(137,'Malaysia'),(138,'Maldives'),(139,'Mali'),(140,'Malta'),(141,'Marshall Islands'),(142,'Martinique'),(143,'Mauritania'),(144,'Mauritius'),(145,'Mayotte'),(146,'Mexico'),(147,'Micronesia, Federated States of'),(148,'Moldova, Republic of'),(149,'Monaco'),(150,'Mongolia'),(151,'Montenegro'),(152,'Montserrat'),(153,'Morocco'),(154,'Mozambique'),(155,'Myanmar'),(156,'Namibia'),(157,'Nauru'),(158,'Nepal'),(159,'Netherlands'),(160,'Netherlands Antilles'),(161,'New Caledonia'),(162,'New Zealand'),(163,'Nicaragua'),(164,'Niger'),(165,'Nigeria'),(166,'Niue'),(167,'Norfolk Island'),(168,'Northern Mariana Islands'),(169,'Norway'),(170,'Oman'),(171,'Pakistan'),(172,'Palau'),(173,'Palestinian Territory'),(174,'Panama'),(175,'Papua New Guinea'),(176,'Paraguay'),(177,'Peru'),(178,'Philippines'),(179,'Pitcairn'),(180,'Poland'),(181,'Portugal'),(182,'Puerto Rico'),(183,'Qatar'),(184,'Reunion'),(185,'Romania'),(186,'Russia'),(187,'Russia'),(188,'Rwanda'),(189,'Saint Helena'),(190,'Saint Kitts and Nevis'),(191,'Saint Lucia'),(192,'Saint Pierre and Miquelon'),(193,'Saint Vincent and The Grenadines'),(194,'Samoa'),(195,'San Marino'),(196,'Sao Tome and Principe'),(197,'Saudi Arabia'),(198,'Senegal'),(199,'Serbia and Montenegro'),(200,'Seychelles'),(201,'Sierra Leone'),(202,'Singapore'),(203,'Slovakia'),(204,'Slovenia'),(205,'Solomon Islands'),(206,'Somalia'),(207,'South Africa'),(208,'South Georgia and The South Sandwich Islands'),(209,'Spain'),(210,'Sri Lanka'),(211,'Sudan'),(212,'Suriname'),(213,'Svalbard and Jan Mayen'),(214,'Swaziland'),(215,'Sweden'),(216,'Switzerland'),(217,'Syria'),(218,'Taiwan'),(219,'Tajikistan'),(220,'Tanzania, United Republic of'),(221,'Thailand'),(222,'Timor-leste'),(223,'Togo'),(224,'Tokelau'),(225,'Tonga'),(226,'Trinidad and Tobago'),(227,'Tunisia'),(228,'Turkey'),(229,'Turkey'),(230,'Turkmenistan'),(231,'Turks and Caicos Islands'),(232,'Tuvalu'),(233,'Uganda'),(234,'Ukraine'),(235,'United Arab Emirates'),(236,'United Kingdom'),(237,'United States'),(238,'United States Minor Outlying Islands'),(239,'Uruguay'),(240,'Uzbekistan'),(241,'Vanuatu'),(242,'Vatican City'),(243,'Venezuela'),(244,'Vietnam'),(245,'Virgin Islands, British'),(246,'Virgin Islands, U.S.'),(247,'Wallis and Futuna'),(248,'Western Sahara'),(249,'Yemen'),(250,'Yemen'),(251,'Zambia'),(252,'Zimbabwe');

/*Table structure for table `app_gallery` */

DROP TABLE IF EXISTS `app_gallery`;

CREATE TABLE `app_gallery` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `size` varchar(255) DEFAULT NULL,
  `type` varchar(100) DEFAULT NULL,
  `url` text,
  `medium` text,
  `thumbnail` text,
  `title` varchar(255) DEFAULT NULL,
  `description` text,
  `date_created` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `user_idFK` bigint(20) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=64 DEFAULT CHARSET=utf8;

/*Data for the table `app_gallery` */

insert  into `app_gallery`(`id`,`name`,`size`,`type`,`url`,`medium`,`thumbnail`,`title`,`description`,`date_created`,`user_idFK`) values (33,'cat_wild-wallpaper-1920x1080.jpg','494737','image/jpeg','http://webapp.loc/admin/assets/files/cat_wild-wallpaper-1920x1080.jpg','http://webapp.loc/admin/assets/files/medium/cat_wild-wallpaper-1920x1080.jpg','http://webapp.loc/admin/assets/files/thumbnail/cat_wild-wallpaper-1920x1080.jpg',NULL,NULL,'2014-09-30 17:15:11',NULL),(34,'abstract_3-wallpaper-1920x1080.jpg','349312','image/jpeg','http://webapp.loc/admin/assets/files/abstract_3-wallpaper-1920x1080.jpg','http://webapp.loc/admin/assets/files/medium/abstract_3-wallpaper-1920x1080.jpg','http://webapp.loc/admin/assets/files/thumbnail/abstract_3-wallpaper-1920x1080.jpg',NULL,NULL,'2014-10-09 14:23:10',NULL),(35,'liquid-wallpaper-1920x1080.jpg','226833','image/jpeg','http://webapp.loc/admin/assets/files/liquid-wallpaper-1920x1080.jpg','http://webapp.loc/admin/assets/files/medium/liquid-wallpaper-1920x1080.jpg','http://webapp.loc/admin/assets/files/thumbnail/liquid-wallpaper-1920x1080.jpg',NULL,NULL,'2014-10-15 10:38:52',NULL),(39,'dirtbike-wallpaper-1920x1080.jpg','506180','image/jpeg','http://webapp.loc/admin/assets/files/dirtbike-wallpaper-1920x1080.jpg','http://webapp.loc/admin/assets/files/medium/dirtbike-wallpaper-1920x1080.jpg','http://webapp.loc/admin/assets/files/thumbnail/dirtbike-wallpaper-1920x1080.jpg',NULL,NULL,'2014-10-15 10:43:25',NULL),(41,'abstract_art_ii-wallpaper-1920x1080 (1).jpg','555174','image/jpeg','http://webapp.loc/admin/assets/files/abstract_art_ii-wallpaper-1920x1080%20%281%29.jpg','http://webapp.loc/admin/assets/files/medium/abstract_art_ii-wallpaper-1920x1080%20%281%29.jpg','http://webapp.loc/admin/assets/files/thumbnail/abstract_art_ii-wallpaper-1920x1080%20%281%29.jpg',NULL,NULL,'2014-10-15 10:44:51',NULL),(44,'MeControlXXLUserTile.jpg','32308','image/jpeg','http://webapp.loc/admin/assets/files/MeControlXXLUserTile.jpg','http://webapp.loc/admin/assets/files/medium/MeControlXXLUserTile.jpg','http://webapp.loc/admin/assets/files/thumbnail/MeControlXXLUserTile.jpg',NULL,NULL,'2014-10-15 10:53:33',NULL),(45,'MeControlXXLUserTile (1).jpg','32308','image/jpeg','http://webapp.loc/admin/assets/files/MeControlXXLUserTile%20%281%29.jpg','http://webapp.loc/admin/assets/files/medium/MeControlXXLUserTile%20%281%29.jpg','http://webapp.loc/admin/assets/files/thumbnail/MeControlXXLUserTile%20%281%29.jpg',NULL,NULL,'2014-10-15 10:57:18',NULL),(46,'feathered-wallpaper-1920x1080.jpg','656151','image/jpeg','http://webapp.loc/admin/assets/files/feathered-wallpaper-1920x1080.jpg','http://webapp.loc/admin/assets/files/medium/feathered-wallpaper-1920x1080.jpg','http://webapp.loc/admin/assets/files/thumbnail/feathered-wallpaper-1920x1080.jpg',NULL,NULL,'2014-10-15 10:57:18',NULL),(47,'liquid-wallpaper-1920x1080 (1).jpg','226833','image/jpeg','http://webapp.loc/admin/assets/files/liquid-wallpaper-1920x1080%20%281%29.jpg','http://webapp.loc/admin/assets/files/medium/liquid-wallpaper-1920x1080%20%281%29.jpg','http://webapp.loc/admin/assets/files/thumbnail/liquid-wallpaper-1920x1080%20%281%29.jpg',NULL,NULL,'2014-10-15 10:57:18',NULL),(48,'dirtbike-wallpaper-1920x1080 (1).jpg','506180','image/jpeg','http://webapp.loc/admin/assets/files/dirtbike-wallpaper-1920x1080%20%281%29.jpg','http://webapp.loc/admin/assets/files/medium/dirtbike-wallpaper-1920x1080%20%281%29.jpg','http://webapp.loc/admin/assets/files/thumbnail/dirtbike-wallpaper-1920x1080%20%281%29.jpg',NULL,NULL,'2014-10-15 10:57:18',NULL),(50,'cat_wild-wallpaper-1920x1080 (1).jpg','494737','image/jpeg','http://webapp.loc/admin/assets/files/cat_wild-wallpaper-1920x1080%20%281%29.jpg','http://webapp.loc/admin/assets/files/medium/cat_wild-wallpaper-1920x1080%20%281%29.jpg','http://webapp.loc/admin/assets/files/thumbnail/cat_wild-wallpaper-1920x1080%20%281%29.jpg',NULL,NULL,'2014-10-15 10:57:18',NULL),(51,'abstract_art_ii-wallpaper-1920x1080 (2).jpg','555174','image/jpeg','http://webapp.loc/admin/assets/files/abstract_art_ii-wallpaper-1920x1080%20%282%29.jpg','http://webapp.loc/admin/assets/files/medium/abstract_art_ii-wallpaper-1920x1080%20%282%29.jpg','http://webapp.loc/admin/assets/files/thumbnail/abstract_art_ii-wallpaper-1920x1080%20%282%29.jpg',NULL,NULL,'2014-10-15 10:57:18',NULL),(52,'abstract_3-wallpaper-1920x1080 (1).jpg','349312','image/jpeg','http://webapp.loc/admin/assets/files/abstract_3-wallpaper-1920x1080%20%281%29.jpg','http://webapp.loc/admin/assets/files/medium/abstract_3-wallpaper-1920x1080%20%281%29.jpg','http://webapp.loc/admin/assets/files/thumbnail/abstract_3-wallpaper-1920x1080%20%281%29.jpg',NULL,NULL,'2014-10-15 10:57:18',NULL),(53,'abstract_art_ii-wallpaper-1920x1080 (3).jpg','555174','image/jpeg','http://webapp.loc/admin/assets/files/abstract_art_ii-wallpaper-1920x1080%20%283%29.jpg','http://webapp.loc/admin/assets/files/medium/abstract_art_ii-wallpaper-1920x1080%20%283%29.jpg','http://webapp.loc/admin/assets/files/thumbnail/abstract_art_ii-wallpaper-1920x1080%20%283%29.jpg',NULL,NULL,'2014-10-16 11:00:54',NULL),(54,'MeControlXXLUserTile (2).jpg','32308','image/jpeg','http://webapp.loc/admin/assets/files/MeControlXXLUserTile%20%282%29.jpg','http://webapp.loc/admin/assets/files/medium/MeControlXXLUserTile%20%282%29.jpg','http://webapp.loc/admin/assets/files/thumbnail/MeControlXXLUserTile%20%282%29.jpg',NULL,NULL,'2014-10-16 11:07:40',NULL),(55,'liquid-wallpaper-1920x1080 (2).jpg','226833','image/jpeg','http://webapp.loc/admin/assets/files/liquid-wallpaper-1920x1080%20%282%29.jpg','http://webapp.loc/admin/assets/files/medium/liquid-wallpaper-1920x1080%20%282%29.jpg','http://webapp.loc/admin/assets/files/thumbnail/liquid-wallpaper-1920x1080%20%282%29.jpg',NULL,NULL,'2014-10-16 11:07:40',NULL),(56,'feathered-wallpaper-1920x1080 (1).jpg','656151','image/jpeg','http://webapp.loc/admin/assets/files/feathered-wallpaper-1920x1080%20%281%29.jpg','http://webapp.loc/admin/assets/files/medium/feathered-wallpaper-1920x1080%20%281%29.jpg','http://webapp.loc/admin/assets/files/thumbnail/feathered-wallpaper-1920x1080%20%281%29.jpg',NULL,NULL,'2014-10-16 11:07:40',NULL),(58,'dirtbike-wallpaper-1920x1080 (2).jpg','506180','image/jpeg','http://webapp.loc/admin/assets/files/dirtbike-wallpaper-1920x1080%20%282%29.jpg','http://webapp.loc/admin/assets/files/medium/dirtbike-wallpaper-1920x1080%20%282%29.jpg','http://webapp.loc/admin/assets/files/thumbnail/dirtbike-wallpaper-1920x1080%20%282%29.jpg',NULL,NULL,'2014-10-16 11:07:40',NULL),(59,'cat_wild-wallpaper-1920x1080 (2).jpg','494737','image/jpeg','http://webapp.loc/admin/assets/files/cat_wild-wallpaper-1920x1080%20%282%29.jpg','http://webapp.loc/admin/assets/files/medium/cat_wild-wallpaper-1920x1080%20%282%29.jpg','http://webapp.loc/admin/assets/files/thumbnail/cat_wild-wallpaper-1920x1080%20%282%29.jpg',NULL,NULL,'2014-10-16 11:07:40',NULL),(60,'abstract_art_ii-wallpaper-1920x1080 (4).jpg','555174','image/jpeg','http://webapp.loc/admin/assets/files/abstract_art_ii-wallpaper-1920x1080%20%284%29.jpg','http://webapp.loc/admin/assets/files/medium/abstract_art_ii-wallpaper-1920x1080%20%284%29.jpg','http://webapp.loc/admin/assets/files/thumbnail/abstract_art_ii-wallpaper-1920x1080%20%284%29.jpg',NULL,NULL,'2014-10-16 11:07:40',NULL),(61,'abstract_3-wallpaper-1920x1080 (2).jpg','349312','image/jpeg','http://webapp.loc/admin/assets/files/abstract_3-wallpaper-1920x1080%20%282%29.jpg','http://webapp.loc/admin/assets/files/medium/abstract_3-wallpaper-1920x1080%20%282%29.jpg','http://webapp.loc/admin/assets/files/thumbnail/abstract_3-wallpaper-1920x1080%20%282%29.jpg',NULL,NULL,'2014-10-16 11:07:41',NULL),(62,'abstract_art_ii-wallpaper-1920x1080 (5).jpg','555174','image/jpeg','http://webapp.loc/admin/assets/files/abstract_art_ii-wallpaper-1920x1080%20%285%29.jpg','http://webapp.loc/admin/assets/files/medium/abstract_art_ii-wallpaper-1920x1080%20%285%29.jpg','http://webapp.loc/admin/assets/files/thumbnail/abstract_art_ii-wallpaper-1920x1080%20%285%29.jpg',NULL,NULL,'2014-10-20 12:56:09',NULL),(63,'cat_wild-wallpaper-1920x1080 (3).jpg','494737','image/jpeg','http://webapp.loc/admin/assets/files/cat_wild-wallpaper-1920x1080%20%283%29.jpg','http://webapp.loc/admin/assets/files/medium/cat_wild-wallpaper-1920x1080%20%283%29.jpg','http://webapp.loc/admin/assets/files/thumbnail/cat_wild-wallpaper-1920x1080%20%283%29.jpg',NULL,NULL,'2014-10-30 16:14:12',NULL);

/*Table structure for table `app_navigations` */

DROP TABLE IF EXISTS `app_navigations`;

CREATE TABLE `app_navigations` (
  `nav_idPK` int(11) NOT NULL AUTO_INCREMENT,
  `nav_slug` varchar(100) DEFAULT NULL,
  `nav_title` varchar(100) DEFAULT NULL,
  `page_idFK` int(11) DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `date_creatd` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `nav_active` int(11) DEFAULT NULL,
  PRIMARY KEY (`nav_idPK`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8;

/*Data for the table `app_navigations` */

insert  into `app_navigations`(`nav_idPK`,`nav_slug`,`nav_title`,`page_idFK`,`created_by`,`date_creatd`,`nav_active`) values (1,'test-1','Home',10,4,'2014-06-23 21:42:36',1),(3,'productssss','Products',4,4,'2014-06-23 21:46:03',1),(4,'servicesssssss','Servicesssss',12,4,'2014-06-23 21:48:05',1),(5,'blog','Blog',5,4,'2014-06-25 14:59:29',1),(6,'Page-2','Page-1',4,4,'2014-06-25 15:08:46',1),(7,'Page-2','Page 2',5,4,'2014-06-25 15:08:59',0),(9,'subscribe','Subscribe',4,4,'2014-06-25 15:11:20',1),(10,'form','Form',6,4,'2014-06-25 15:11:27',0),(13,'asdf','asdf',5,4,'2014-10-17 15:30:08',1),(18,'asdfasdf','afdsafasdf',6,4,'2014-10-17 15:35:08',1),(19,'new-menu','New menu',4,4,'2014-11-03 11:59:47',1);

/*Table structure for table `app_navigations_order` */

DROP TABLE IF EXISTS `app_navigations_order`;

CREATE TABLE `app_navigations_order` (
  `order_idPK` int(11) NOT NULL AUTO_INCREMENT,
  `nav_order` text,
  `nav_date_modified` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `user_idFK` bigint(20) DEFAULT NULL,
  PRIMARY KEY (`order_idPK`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

/*Data for the table `app_navigations_order` */

insert  into `app_navigations_order`(`order_idPK`,`nav_order`,`nav_date_modified`,`user_idFK`) values (1,'[{\"id\":1,\"info\":\"\"},{\"id\":3,\"info\":\"\",\"children\":[{\"id\":4,\"info\":\"\"}]},{\"id\":5,\"info\":\"\",\"children\":[{\"id\":6,\"info\":\"\"},{\"id\":7,\"info\":\"\"}]},{\"id\":9,\"info\":\"\"},{\"id\":10,\"info\":\"\",\"children\":[{\"id\":13,\"info\":\"\"},{\"id\":18,\"info\":\"\"}]},{\"id\":19,\"info\":\"\"}]','2014-07-15 10:07:59',NULL);

/*Table structure for table `app_pages` */

DROP TABLE IF EXISTS `app_pages`;

CREATE TABLE `app_pages` (
  `page_idPK` int(11) NOT NULL AUTO_INCREMENT,
  `page_title` varchar(200) DEFAULT NULL,
  `page_content` text,
  `page_slug` varchar(50) DEFAULT NULL,
  `page_meta_title` varchar(255) DEFAULT NULL,
  `page_meta_keyword` text,
  `page_meta_desc` text,
  `date_created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_by` bigint(20) DEFAULT NULL,
  `page_active` int(11) DEFAULT NULL,
  PRIMARY KEY (`page_idPK`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8;

/*Data for the table `app_pages` */

insert  into `app_pages`(`page_idPK`,`page_title`,`page_content`,`page_slug`,`page_meta_title`,`page_meta_keyword`,`page_meta_desc`,`date_created`,`created_by`,`page_active`) values (3,'Products','<ul class=\"nav nav-tabs\" id=\"myTab\">\n	<li class=\"active\"><a data-toggle=\"tab\" href=\"#info\">Info &amp; Care</a></li>\n	<li><a data-toggle=\"tab\" href=\"#delivery\">Delivery</a></li>\n	<li><a data-toggle=\"tab\" href=\"#returns\">Returns</a></li>\n</ul>\n\n<div class=\"tab-content\">\n<div class=\"tab-pane active\" id=\"info\">Info &amp; Care content...</div>\n\n<div class=\"tab-pane\" id=\"delivery\">Delivery content...</div>\n\n<div class=\"tab-pane\" id=\"returns\">Returns content...</div>\n</div>\n','slugssssss','meta title1','meta keywords1','meta desc1','2014-06-19 11:28:56',4,0),(4,'Events','<p>content</p>\r\n','slug','meta title','meta keywords','meta desc','2014-06-19 11:28:56',4,1),(5,'Contact Us','<p>content</p>\r\n','slug2fsadfsdf','meta title','meta keywords','meta desc','2014-06-19 11:28:56',4,1),(6,'About Us','<p>content</p>\r\n','slug','meta title','meta keywords','meta desc','2014-06-19 11:28:56',4,1),(10,'Home','<div class=\"carousel slide\" id=\"myCarousel\"><!-- Indicators -->\r\n<ol class=\"carousel-indicators\">\r\n	<li class=\"active\" data-slide-to=\"0\" data-target=\"#myCarousel\">&nbsp;</li>\r\n	<li data-slide-to=\"1\" data-target=\"#myCarousel\">&nbsp;</li>\r\n	<li data-slide-to=\"2\" data-target=\"#myCarousel\">&nbsp;</li>\r\n</ol>\r\n<!-- Wrapper for slides -->\r\n\r\n<div class=\"carousel-inner\">\r\n<div class=\"item active\">\r\n<div class=\"fill\" style=\"background-image:url(\'http://placehold.it/1900x1080&amp;text=Slide One\');\">&nbsp;</div>\r\n\r\n<div class=\"carousel-caption\">\r\n<h1>Modern Business - A Bootstrap 3 Template</h1>\r\n</div>\r\n</div>\r\n\r\n<div class=\"item\">\r\n<div class=\"fill\" style=\"background-image:url(\'http://placehold.it/1900x1080&amp;text=Slide Two\');\">&nbsp;</div>\r\n\r\n<div class=\"carousel-caption\">\r\n<h1>Ready to Style &amp; Add Content</h1>\r\n</div>\r\n</div>\r\n\r\n<div class=\"item\">\r\n<div class=\"fill\" style=\"background-image:url(\'http://placehold.it/1900x1080&amp;text=Slide Three\');\">&nbsp;</div>\r\n\r\n<div class=\"carousel-caption\">\r\n<h1>Additional Layout Options at <a href=\"http://startbootstrap.com\">http://startbootstrap.com</a></h1>\r\n</div>\r\n</div>\r\n</div>\r\n<!-- Controls --></div>\r\n\r\n<div class=\"section\">\r\n<div class=\"container\">\r\n<div class=\"row\">\r\n<div class=\"col-lg-4 col-md-4\">\r\n<h3>Bootstrap 3 Built</h3>\r\n\r\n<p>The &#39;Modern Business&#39; website template by <a href=\"http://startbootstrap.com\">Start Bootstrap</a> is built with <a href=\"http://getbootstrap.com\">Bootstrap 3</a>. Make sure you&#39;re up to date with latest Bootstrap documentation!</p>\r\n</div>\r\n\r\n<div class=\"col-lg-4 col-md-4\">\r\n<h3>Ready to Style &amp; Edit</h3>\r\n\r\n<p>You&#39;re ready to go with this pre-built page structure, now all you need to do is add your own custom stylings! You can see some free themes over at <a href=\"http://bootswatch.com\">Bootswatch</a>, or come up with your own using <a href=\"http://getbootstrap.com/customize/\">the Bootstrap customizer</a>!</p>\r\n</div>\r\n\r\n<div class=\"col-lg-4 col-md-4\">\r\n<h3>Many Page Options</h3>\r\n\r\n<p>This template features many common pages that you might see on a business website. Pages include: about, contact, portfolio variations, blog, pricing, FAQ, 404, services, and general multi-purpose pages.</p>\r\n</div>\r\n</div>\r\n<!-- /.row --></div>\r\n<!-- /.container --></div>\r\n<!-- /.section -->\r\n\r\n<div class=\"section-colored text-center\">\r\n<div class=\"container\">\r\n<div class=\"row\">\r\n<div class=\"col-lg-12\">\r\n<h2>Modern Business: A Clean &amp; Simple Full Website Template by Start Bootstrap</h2>\r\n\r\n<p>A complete website design featuring various single page templates from Start Bootstraps library of free HTML starter templates.</p>\r\n\r\n<hr /></div>\r\n</div>\r\n<!-- /.row --></div>\r\n<!-- /.container --></div>\r\n<!-- /.section-colored -->\r\n\r\n<div class=\"section\">\r\n<div class=\"container\">\r\n<div class=\"row\">\r\n<div class=\"col-lg-12 text-center\">\r\n<h2>Display Some Work on the Home Page Portfolio</h2>\r\n\r\n<hr /></div>\r\n\r\n<div class=\"col-lg-4 col-md-4 col-sm-6\"><a href=\"portfolio-item.html\"><img class=\"img-responsive img-home-portfolio\" src=\"http://placehold.it/700x450\" /> </a></div>\r\n\r\n<div class=\"col-lg-4 col-md-4 col-sm-6\"><a href=\"portfolio-item.html\"><img class=\"img-responsive img-home-portfolio\" src=\"http://placehold.it/700x450\" /> </a></div>\r\n\r\n<div class=\"col-lg-4 col-md-4 col-sm-6\"><a href=\"portfolio-item.html\"><img class=\"img-responsive img-home-portfolio\" src=\"http://placehold.it/700x450\" /> </a></div>\r\n\r\n<div class=\"col-lg-4 col-md-4 col-sm-6\"><a href=\"portfolio-item.html\"><img class=\"img-responsive img-home-portfolio\" src=\"http://placehold.it/700x450\" /> </a></div>\r\n\r\n<div class=\"col-lg-4 col-md-4 col-sm-6\"><a href=\"portfolio-item.html\"><img class=\"img-responsive img-home-portfolio\" src=\"http://placehold.it/700x450\" /> </a></div>\r\n\r\n<div class=\"col-lg-4 col-md-4 col-sm-6\"><a href=\"portfolio-item.html\"><img class=\"img-responsive img-home-portfolio\" src=\"http://placehold.it/700x450\" /> </a></div>\r\n</div>\r\n<!-- /.row --></div>\r\n<!-- /.container --></div>\r\n<!-- /.section -->\r\n\r\n<div class=\"section-colored\">\r\n<div class=\"container\">\r\n<div class=\"row\">\r\n<div class=\"col-lg-6 col-md-6 col-sm-6\">\r\n<h2>Modern Business Features Include:</h2>\r\n\r\n<ul>\r\n	<li>Bootstrap 3 Framework</li>\r\n	<li>Mobile Responsive Design</li>\r\n	<li>Predefined File Paths</li>\r\n	<li>Working PHP Contact Page</li>\r\n	<li>Minimal Custom CSS Styles</li>\r\n	<li>Unstyled: Add Your Own Style and Content!</li>\r\n	<li>Font-Awesome fonts come pre-installed!</li>\r\n	<li>100% <strong>Free</strong> to Use</li>\r\n	<li>Open Source: Use for any project, private or commercial!</li>\r\n</ul>\r\n</div>\r\n\r\n<div class=\"col-lg-6 col-md-6 col-sm-6\"><img class=\"img-responsive\" src=\"http://placehold.it/700x450/ffffff/cccccc\" /></div>\r\n</div>\r\n<!-- /.row --></div>\r\n<!-- /.container --></div>\r\n<!-- /.section-colored -->\r\n\r\n<div class=\"section\">\r\n<div class=\"container\">\r\n<div class=\"row\">\r\n<div class=\"col-lg-6 col-md-6 col-sm-6\"><img class=\"img-responsive\" src=\"http://placehold.it/700x450\" /></div>\r\n\r\n<div class=\"col-lg-6 col-md-6 col-sm-6\">\r\n<h2>Modern Business Features Include:</h2>\r\n\r\n<ul>\r\n	<li>Bootstrap 3 Framework</li>\r\n	<li>Mobile Responsive Design</li>\r\n	<li>Predefined File Paths</li>\r\n	<li>Working PHP Contact Page</li>\r\n	<li>Minimal Custom CSS Styles</li>\r\n	<li>Unstyled: Add Your Own Style and Content!</li>\r\n	<li>Font-Awesome fonts come pre-installed!</li>\r\n	<li>100% <strong>Free</strong> to Use</li>\r\n	<li>Open Source: Use for any project, private or commercial!</li>\r\n</ul>\r\n</div>\r\n</div>\r\n<!-- /.row --></div>\r\n<!-- /.container --></div>\r\n<!-- /.section -->\r\n\r\n<div class=\"container\">\r\n<div class=\"row well\">\r\n<div class=\"col-lg-8 col-md-8\">\r\n<h4>&#39;Modern Business&#39; is a ready-to-use, Bootstrap 3 updated, multi-purpose HTML theme!</h4>\r\n\r\n<p>For more templates and more page options that you can integrate into this website template, visit Start Bootstrap!</p>\r\n</div>\r\n\r\n<div class=\"col-lg-4 col-md-4\"><a class=\"btn btn-lg btn-primary pull-right\" href=\"http://startbootstrap.com\">See More Templates!</a></div>\r\n</div>\r\n<!-- /.row --></div>\r\n<!-- /.container -->','slug','meta title','meta keywords','meta desc','2014-06-19 11:28:56',4,1),(11,'test','<p>test</p>\r\n','test','test','test','test','2014-06-19 11:56:09',4,0),(12,'asdf','<p>fsaf</p>\r\n','sadfs','','','','2014-06-19 11:56:27',4,1),(13,'testsafsadfsadf','<p>test</p>\n','testtestsasdfsf asdf dasf asdf asdf sadfa sdf sdas','test','test','test','2014-08-14 09:30:47',4,1);

/*Table structure for table `app_themes` */

DROP TABLE IF EXISTS `app_themes`;

CREATE TABLE `app_themes` (
  `theme_idPK` int(11) NOT NULL AUTO_INCREMENT,
  `theme_name` varchar(100) DEFAULT NULL,
  `theme_active` int(1) DEFAULT '0',
  PRIMARY KEY (`theme_idPK`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

/*Data for the table `app_themes` */

insert  into `app_themes`(`theme_idPK`,`theme_name`,`theme_active`) values (1,'default',1);

/*Table structure for table `app_users` */

DROP TABLE IF EXISTS `app_users`;

CREATE TABLE `app_users` (
  `user_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `user_email` varchar(100) DEFAULT NULL,
  `user_fname` varchar(50) DEFAULT NULL,
  `user_lname` varchar(50) DEFAULT NULL,
  `user_password` varchar(100) DEFAULT NULL,
  `user_date_added` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_by` bigint(20) DEFAULT NULL,
  `user_bdate` date DEFAULT NULL,
  `user_phone` varchar(100) DEFAULT NULL,
  `user_address` text,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8;

/*Data for the table `app_users` */

insert  into `app_users`(`user_id`,`user_email`,`user_fname`,`user_lname`,`user_password`,`user_date_added`,`created_by`,`user_bdate`,`user_phone`,`user_address`) values (1,'test@test.email','asdf','asdf','asdfsdaf','2014-06-04 20:41:34',4,'2014-06-05','111111','address'),(2,'test@test.email11','sdfsafsf','sadfsadsadfdsf','1sadfsafsfad','2014-06-05 09:16:56',4,'0000-00-00','',''),(3,'test@test.email23456','asdfdsaf','asdfsaf','1sdfsdf','2014-06-05 09:18:09',4,'2014-08-14','test',''),(4,'test@test.email23424','asdfsaf','asdfadfdasf','sadfsa','2014-06-05 09:18:38',4,'2014-09-30','',''),(5,'test@test.email1sdafsadfsaf','asdfasf','asdfasf','sadfsadf','2014-06-05 13:48:32',4,'0000-00-00','asfasdf','asdfsadfsaf'),(6,'test@test.email1sdafsadfsafasd234','asdfasf','asdfasf','sadfsadf','2014-06-05 13:48:43',4,'0000-00-00','asfasdf','asdfsadfsaf'),(7,'test@test.email234vdsg324','asdfsaf','asdfasdf','asdfsadf','2014-06-05 13:50:36',4,'2014-06-05','111111','address'),(8,'test@test.email234vdsg324','asdfsaf','asdfasdf','asdfsadf','2014-06-05 13:50:36',4,'1986-06-18','111111','address'),(9,'test@test.email234vdsg324','asdfsaf','asdfasdf','asdfsadf','2014-06-05 13:50:36',4,'2014-06-05','111111','address'),(10,'test@test.email234vdsg324','asdfsaf','asdfasdf','asdfsadf','2014-06-05 13:50:36',4,'2014-06-05','111111','address'),(11,'test@test.email234vdsg324','asdfsaf','asdfasdf','asdfsadf','2014-06-05 13:50:36',4,'2014-06-05','111111','address'),(12,'test@test.email234vdsg324','asdfsaf','asdfasdf','asdfsadf','2014-06-05 13:50:36',4,'2014-06-05','111111','address'),(13,'test@test.email234vdsg324','asdfsaf','asdfasdf','asdfsadf','2014-06-05 13:50:36',4,'2014-06-05','111111','address'),(14,'test@test.email234vdsg324','asdfsaf','asdfasdf','asdfsadf','2014-06-05 13:50:36',4,'2014-06-05','111111','address'),(15,'test@test.email234vdsg324','asdfsaf','asdfasdf','asdfsadf','2014-06-05 13:50:36',4,'2014-06-05','111111','address'),(16,'test@testsdf.email','<!sadfsa ','sadfdfasf\">','12345','2014-10-30 14:18:16',4,'2014-10-30','sadfsdf\">','asdfsdasdaf, \">'),(17,'test@test234sfd.email','sadfdsaf','asdfsadf','12345\">','2014-10-30 14:21:06',4,'2014-10-30','asdfdsafa \">','asdfsdasdafsaf\"> <\"'),(18,'<\"test@test.email','asdfa','sasdfas','12345','2014-10-30 14:21:55',4,'0000-00-00','dfasdf','sadfasdf');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
