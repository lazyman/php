# Host: localhost  (Version: 5.5.38)
# Date: 2014-11-08 16:42:52
# Generator: MySQL-Front 5.3  (Build 4.120)

/*!40101 SET NAMES utf8 */;

#
# Structure for table "filemanage"
#

CREATE TABLE `filemanage` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `filepath` varchar(255) DEFAULT NULL,
  `md5` varchar(255) DEFAULT NULL,
  `filesize` decimal(20,2) DEFAULT NULL,
  `usetime` decimal(10,2) DEFAULT NULL,
  `begintime` datetime DEFAULT NULL,
  `endtime` datetime DEFAULT NULL,
  `recordTime` datetime DEFAULT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=MyISAM AUTO_INCREMENT=16445 DEFAULT CHARSET=utf8;
