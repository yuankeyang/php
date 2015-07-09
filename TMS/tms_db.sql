/*
SQLyog Ultimate v11.24 (32 bit)
MySQL - 5.6.21 : Database - tms_db
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`tms_db` /*!40100 DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci */;

USE `tms_db`;

/*Table structure for table `admin` */

DROP TABLE IF EXISTS `admin`;

CREATE TABLE `admin` (
  `username` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(16) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `admin` */

insert  into `admin`(`username`,`password`) values ('admin','admin');

/*Table structure for table `course` */

DROP TABLE IF EXISTS `course`;

CREATE TABLE `course` (
  `Cno` varchar(5) NOT NULL,
  `Cname` varchar(20) NOT NULL,
  `Ccredit` float NOT NULL,
  PRIMARY KEY (`Cno`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `course` */

insert  into `course`(`Cno`,`Cname`,`Ccredit`) values ('1001','数据库原理',4),('1002','编译原理',4),('1003','计算机网络',4);

/*Table structure for table `coursetable` */

DROP TABLE IF EXISTS `coursetable`;

CREATE TABLE `coursetable` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `Cno` varchar(5) NOT NULL,
  `timex` smallint(1) NOT NULL,
  `timey` smallint(1) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `Cno` (`Cno`),
  CONSTRAINT `coursetable_ibfk_1` FOREIGN KEY (`Cno`) REFERENCES `course` (`Cno`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

/*Data for the table `coursetable` */

insert  into `coursetable`(`id`,`Cno`,`timex`,`timey`) values (1,'1001',1,1),(2,'1001',4,5),(3,'1002',2,3),(4,'1003',5,3);

/*Table structure for table `cs` */

DROP TABLE IF EXISTS `cs`;

CREATE TABLE `cs` (
  `Sno` varchar(15) NOT NULL,
  `Cno` varchar(5) NOT NULL,
  `Rgrade` varchar(10) DEFAULT '0',
  `Mgrade` varchar(10) DEFAULT '0',
  `Egrade` varchar(10) DEFAULT '0',
  PRIMARY KEY (`Sno`,`Cno`),
  KEY `Cno` (`Cno`),
  CONSTRAINT `cs_ibfk_1` FOREIGN KEY (`Cno`) REFERENCES `course` (`Cno`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `cs` */

insert  into `cs`(`Sno`,`Cno`,`Rgrade`,`Mgrade`,`Egrade`) values ('201208010101','1001','100','90','80'),('201208010101','1002','60','95','85'),('201208010101','1003','70','100','85'),('201208010102','1001','100','80','80'),('201208010102','1002','100','85','74'),('201208010102','1003','90','70','75'),('201208010103','1001','90','60','76'),('201208010103','1002','90','75','73'),('201208010103','1003','85','90','80'),('201208010104','1001','85','92','84'),('201208010105','1001','98','85','56'),('201208010106','1001','80','85','46'),('201208010127','1003','89','65','56'),('201208010201','1001','70','76','82'),('201208010201','1002','85','75','83'),('201208010201','1003','85','87','84'),('201208010202','1001','90','91','85'),('201208010202','1002','90','86','86'),('201208010202','1003','100','100','90'),('201208010203','1001','90','90','85'),('201208010203','1002','89','84','74'),('201208010203','1003','90','86','89');

/*Table structure for table `faculty` */

DROP TABLE IF EXISTS `faculty`;

CREATE TABLE `faculty` (
  `Fno` varchar(10) NOT NULL,
  `Fname` varchar(10) NOT NULL,
  `Fphone` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`Fno`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `faculty` */

insert  into `faculty`(`Fno`,`Fname`,`Fphone`) values ('0001','计科','58089892');

/*Table structure for table `student` */

DROP TABLE IF EXISTS `student`;

CREATE TABLE `student` (
  `Sno` varchar(15) NOT NULL,
  `Sname` varchar(10) NOT NULL,
  `Ssex` enum('男','女') DEFAULT NULL,
  `Sage` int(11) DEFAULT NULL,
  `Sclass` varchar(10) DEFAULT NULL,
  `Fno` varchar(10) DEFAULT NULL,
  `password` varchar(16) NOT NULL,
  PRIMARY KEY (`Sno`),
  KEY `Fno` (`Fno`),
  CONSTRAINT `student_ibfk_1` FOREIGN KEY (`Fno`) REFERENCES `faculty` (`Fno`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `student` */

insert  into `student`(`Sno`,`Sname`,`Ssex`,`Sage`,`Sclass`,`Fno`,`password`) values ('201208010101','白宇','男',21,'1201','0001','123456'),('201208010102','陈午杰','男',21,'1201','0001','123456'),('201208010103','陈泽瑾','女',21,'1201','0001','123456'),('201208010127','杨元科','男',21,'1201','0001','123456'),('201208010201','曹原','男',21,'1202','0001','123456'),('201208010202','雷攀','男',21,'1202','0001','123456'),('201208010203','孔令莹','女',21,'1202','0001','123456');

/*Table structure for table `tc` */

DROP TABLE IF EXISTS `tc`;

CREATE TABLE `tc` (
  `Tno` varchar(15) NOT NULL,
  `Cno` varchar(5) NOT NULL,
  PRIMARY KEY (`Tno`,`Cno`),
  KEY `Cno` (`Cno`),
  CONSTRAINT `tc_ibfk_1` FOREIGN KEY (`Tno`) REFERENCES `teacher` (`Tno`),
  CONSTRAINT `tc_ibfk_2` FOREIGN KEY (`Cno`) REFERENCES `course` (`Cno`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `tc` */

insert  into `tc`(`Tno`,`Cno`) values ('0001001','1001'),('0001002','1002'),('0001003','1003');

/*Table structure for table `teacher` */

DROP TABLE IF EXISTS `teacher`;

CREATE TABLE `teacher` (
  `Tno` varchar(15) NOT NULL,
  `Tname` varchar(10) NOT NULL,
  `Tphone` varchar(20) DEFAULT NULL,
  `Tmail` varchar(30) DEFAULT NULL,
  `Fno` varchar(10) DEFAULT NULL,
  `password` varchar(16) NOT NULL,
  PRIMARY KEY (`Tno`),
  KEY `Fno` (`Fno`),
  CONSTRAINT `teacher_ibfk_1` FOREIGN KEY (`Fno`) REFERENCES `faculty` (`Fno`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `teacher` */

insert  into `teacher`(`Tno`,`Tname`,`Tphone`,`Tmail`,`Fno`,`password`) values ('0001001','王永恒','18399996666','12345@qq.com','0001','123456'),('0001002','杨晓波','18312345678','35467@163.com','0001','123456'),('0001003','王东','13398765432','2644@qq.com','0001','123456');

/* Procedure structure for procedure `B` */

/*!50003 DROP PROCEDURE IF EXISTS  `B` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `B`()
Begin
DECLARE num INT;
select count(*) Into num from cs where Cno='1001';
Select avg(Egrade) as '平均分数' from cs where Cno='1001';
END */$$
DELIMITER ;

/*Table structure for table `course_table` */

DROP TABLE IF EXISTS `course_table`;

/*!50001 DROP VIEW IF EXISTS `course_table` */;
/*!50001 DROP TABLE IF EXISTS `course_table` */;

/*!50001 CREATE TABLE  `course_table`(
 `Sno` varchar(15) ,
 `id` int(5) ,
 `Cno` varchar(5) ,
 `Cname` varchar(20) ,
 `Tname` varchar(10) ,
 `timex` smallint(1) ,
 `timey` smallint(1) 
)*/;

/*Table structure for table `courseview` */

DROP TABLE IF EXISTS `courseview`;

/*!50001 DROP VIEW IF EXISTS `courseview` */;
/*!50001 DROP TABLE IF EXISTS `courseview` */;

/*!50001 CREATE TABLE  `courseview`(
 `Sno` varchar(15) ,
 `id` int(5) ,
 `Cno` varchar(5) ,
 `Cname` varchar(20) ,
 `Tname` varchar(10) ,
 `timex` smallint(1) ,
 `timey` smallint(1) 
)*/;

/*Table structure for table `view1` */

DROP TABLE IF EXISTS `view1`;

/*!50001 DROP VIEW IF EXISTS `view1` */;
/*!50001 DROP TABLE IF EXISTS `view1` */;

/*!50001 CREATE TABLE  `view1`(
 `Sno` varchar(15) ,
 `Cno` varchar(5) ,
 `Sname` varchar(10) 
)*/;

/*Table structure for table `view2` */

DROP TABLE IF EXISTS `view2`;

/*!50001 DROP VIEW IF EXISTS `view2` */;
/*!50001 DROP TABLE IF EXISTS `view2` */;

/*!50001 CREATE TABLE  `view2`(
 `cno` varchar(5) ,
 `cname` varchar(20) 
)*/;

/*View structure for view course_table */

/*!50001 DROP TABLE IF EXISTS `course_table` */;
/*!50001 DROP VIEW IF EXISTS `course_table` */;

/*!50001 CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `course_table` AS select `cs`.`Sno` AS `Sno`,`coursetable`.`id` AS `id`,`cs`.`Cno` AS `Cno`,`course`.`Cname` AS `Cname`,`teacher`.`Tname` AS `Tname`,`coursetable`.`timex` AS `timex`,`coursetable`.`timey` AS `timey` from ((((`cs` left join `course` on((`cs`.`Cno` = `course`.`Cno`))) left join `tc` on((`cs`.`Cno` = `tc`.`Cno`))) left join `teacher` on((`tc`.`Tno` = `teacher`.`Tno`))) left join `coursetable` on((`cs`.`Cno` = `coursetable`.`Cno`))) */;

/*View structure for view courseview */

/*!50001 DROP TABLE IF EXISTS `courseview` */;
/*!50001 DROP VIEW IF EXISTS `courseview` */;

/*!50001 CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `courseview` AS select `cs`.`Sno` AS `Sno`,`coursetable`.`id` AS `id`,`cs`.`Cno` AS `Cno`,`course`.`Cname` AS `Cname`,`teacher`.`Tname` AS `Tname`,`coursetable`.`timex` AS `timex`,`coursetable`.`timey` AS `timey` from ((((`cs` left join `course` on((`cs`.`Cno` = `course`.`Cno`))) left join `tc` on((`cs`.`Cno` = `tc`.`Cno`))) left join `teacher` on((`tc`.`Tno` = `teacher`.`Tno`))) left join `coursetable` on((`cs`.`Cno` = `coursetable`.`Cno`))) */;

/*View structure for view view1 */

/*!50001 DROP TABLE IF EXISTS `view1` */;
/*!50001 DROP VIEW IF EXISTS `view1` */;

/*!50001 CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view1` AS select `cs`.`Sno` AS `Sno`,`cs`.`Cno` AS `Cno`,`student`.`Sname` AS `Sname` from (`cs` left join `student` on((`cs`.`Sno` = `student`.`Sno`))) */;

/*View structure for view view2 */

/*!50001 DROP TABLE IF EXISTS `view2` */;
/*!50001 DROP VIEW IF EXISTS `view2` */;

/*!50001 CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view2` AS select distinct `cs`.`Cno` AS `cno`,`course`.`Cname` AS `cname` from (`cs` left join `course` on((`cs`.`Cno` = `course`.`Cno`))) */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
