set charset utf8;
CREATE TABLE `zy_admin` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `loginname` varchar(100) NOT NULL,
  `loginpass` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;
insert into `zy_admin`(`id`,`loginname`,`loginpass`) values('1','admin','admin');
CREATE TABLE `zy_jibenxinxi` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `mingcheng` varchar(1000) NOT NULL,
  `tel` varchar(1000) NOT NULL,
  `email` varchar(1000) NOT NULL,
  `url` varchar(1000) NOT NULL,
  `dizhi` varchar(1000) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
insert into `zy_jibenxinxi`(`id`,`mingcheng`,`tel`,`email`,`url`,`dizhi`) values('1','软件有限公司','0731-8888888','207069934@qq.com','www.xxx.com','安康市汉滨区育才西路平安大厦6-A-01室');
CREATE TABLE `zy_spchuku` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `sp_id` int(10) NOT NULL,
  `jiage` int(10) NOT NULL,
  `shuliang` int(10) NOT NULL,
  `date` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;
CREATE TABLE `zy_spfenlei` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `name` varchar(1000) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;
CREATE TABLE `zy_spkucun` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `sp_id` int(10) NOT NULL,
  `kucun` int(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;
CREATE TABLE `zy_spruku` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `sp_id` int(10) NOT NULL,
  `jiage` int(10) NOT NULL,
  `shuliang` int(10) NOT NULL,
  `date` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=14 DEFAULT CHARSET=utf8;
CREATE TABLE `zy_spxinxi` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `spfenlei_id` int(10) NOT NULL,
  `name` varchar(1000) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;
insert into `zy_spxinxi`(`id`,`spfenlei_id`,`name`) values('9','8','ssssss');
insert into `zy_spxinxi`(`id`,`spfenlei_id`,`name`) values('8','7','ss');
CREATE TABLE `zy_zhuce` (
  `date` date NOT NULL,
  `number` int(10) NOT NULL,
  `code` int(10) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
insert into `zy_zhuce`(`date`,`number`,`code`) values('2015-06-08','177365723','177365723');
