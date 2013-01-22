/*
SQLyog Enterprise - MySQL GUI v8.18 
MySQL - 5.1.37 : Database - pavan_dosti
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`pavan_dosti` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `pavan_dosti`;

/*Table structure for table `pavan_user` */

DROP TABLE IF EXISTS `pavan_user`;

CREATE TABLE `pavan_user` (
  `uid` bigint(20) NOT NULL AUTO_INCREMENT,
  `password` varchar(50) DEFAULT NULL,
  `email` varchar(70) DEFAULT NULL,
  `registertime` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`uid`),
  UNIQUE KEY `email` (`email`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

/*Data for the table `pavan_user` */

insert  into `pavan_user`(`uid`,`password`,`email`,`registertime`) values (1,'e10adc3949ba59abbe56e057f20f883e','pavanratnakar@gmail.com','2011-09-18 20:02:58');

/*Table structure for table `pavan_user_stats` */

DROP TABLE IF EXISTS `pavan_user_stats`;

CREATE TABLE `pavan_user_stats` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uid` bigint(20) NOT NULL,
  `login_time` datetime NOT NULL,
  `logoff_time` datetime NOT NULL,
  `userip` varchar(200) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

/*Data for the table `pavan_user_stats` */

insert  into `pavan_user_stats`(`id`,`uid`,`login_time`,`logoff_time`,`userip`) values (1,1,'2011-09-18 20:17:47','0000-00-00 00:00:00','2130706433'),(2,1,'2011-09-18 20:42:16','0000-00-00 00:00:00','2130706433'),(3,1,'2011-09-18 20:42:31','0000-00-00 00:00:00','2130706433');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
