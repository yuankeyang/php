/*
SQLyog Ultimate v11.24 (32 bit)
MySQL - 5.6.21 : Database - zysale
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`zysale` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `zysale`;

/*Table structure for table `zy_admin` */

DROP TABLE IF EXISTS `zy_admin`;

CREATE TABLE `zy_admin` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `loginname` varchar(100) NOT NULL,
  `loginpass` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

/*Data for the table `zy_admin` */

insert  into `zy_admin`(`id`,`loginname`,`loginpass`) values (1,'admin','admin');

/*Table structure for table `zy_jibenxinxi` */

DROP TABLE IF EXISTS `zy_jibenxinxi`;

CREATE TABLE `zy_jibenxinxi` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `mingcheng` varchar(1000) NOT NULL,
  `tel` varchar(1000) NOT NULL,
  `email` varchar(1000) NOT NULL,
  `url` varchar(1000) NOT NULL,
  `dizhi` varchar(1000) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

/*Data for the table `zy_jibenxinxi` */

insert  into `zy_jibenxinxi`(`id`,`mingcheng`,`tel`,`email`,`url`,`dizhi`) values (1,'xxx公司','xxxx-xxxxxxx','yangyuanke35@gmail.com','www.yuankeyang.wang','xxxxxxxxxxxxxxxxxxxxx');

/*Table structure for table `zy_spchuku` */

DROP TABLE IF EXISTS `zy_spchuku`;

CREATE TABLE `zy_spchuku` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `sp_id` int(10) NOT NULL,
  `jiage` int(10) NOT NULL,
  `shuliang` int(10) NOT NULL,
  `date` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

/*Data for the table `zy_spchuku` */

/*Table structure for table `zy_spfenlei` */

DROP TABLE IF EXISTS `zy_spfenlei`;

CREATE TABLE `zy_spfenlei` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `name` varchar(1000) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;

/*Data for the table `zy_spfenlei` */

insert  into `zy_spfenlei`(`id`,`name`) values (9,'日常'),(10,'goods');

/*Table structure for table `zy_spkucun` */

DROP TABLE IF EXISTS `zy_spkucun`;

CREATE TABLE `zy_spkucun` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `sp_id` int(10) NOT NULL,
  `kucun` int(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

/*Data for the table `zy_spkucun` */

/*Table structure for table `zy_spruku` */

DROP TABLE IF EXISTS `zy_spruku`;

CREATE TABLE `zy_spruku` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `sp_id` int(10) NOT NULL,
  `jiage` int(10) NOT NULL,
  `shuliang` int(10) NOT NULL,
  `date` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=14 DEFAULT CHARSET=utf8;

/*Data for the table `zy_spruku` */

/*Table structure for table `zy_spxinxi` */

DROP TABLE IF EXISTS `zy_spxinxi`;

CREATE TABLE `zy_spxinxi` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `spfenlei_id` int(10) NOT NULL,
  `name` varchar(1000) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

/*Data for the table `zy_spxinxi` */

insert  into `zy_spxinxi`(`id`,`spfenlei_id`,`name`) values (9,8,'ssssss'),(8,7,'ss');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
