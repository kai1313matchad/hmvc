-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               10.1.19-MariaDB - mariadb.org binary distribution
-- Server OS:                    Win32
-- HeidiSQL Version:             9.4.0.5125
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

-- Dumping structure for table iontest.groups
DROP TABLE IF EXISTS `groups`;
CREATE TABLE IF NOT EXISTS `groups` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(20) NOT NULL,
  `description` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- Dumping data for table iontest.groups: ~2 rows (approximately)
/*!40000 ALTER TABLE `groups` DISABLE KEYS */;
INSERT INTO `groups` (`id`, `name`, `description`) VALUES
	(1, 'admin', 'Administrator'),
	(2, 'members', 'General User'),
	(3, 'Tes', 'Tes');
/*!40000 ALTER TABLE `groups` ENABLE KEYS */;

-- Dumping structure for table iontest.login_attempts
DROP TABLE IF EXISTS `login_attempts`;
CREATE TABLE IF NOT EXISTS `login_attempts` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `ip_address` varchar(45) NOT NULL,
  `login` varchar(100) NOT NULL,
  `time` int(11) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8;

-- Dumping data for table iontest.login_attempts: ~9 rows (approximately)
/*!40000 ALTER TABLE `login_attempts` DISABLE KEYS */;
INSERT INTO `login_attempts` (`id`, `ip_address`, `login`, `time`) VALUES
	(6, '127.0.0.1', 'aaa', 1532932036),
	(7, '127.0.0.1', 'aaaa', 1532932075),
	(8, '127.0.0.1', 'aaa', 1532932093),
	(10, '127.0.0.1', 'aa', 1532934974),
	(11, '127.0.0.1', 'aaa', 1532936900),
	(12, '127.0.0.1', 'aa', 1532936919),
	(13, '127.0.0.1', 'aaa', 1532937056),
	(14, '127.0.0.1', 'aa', 1532937210),
	(15, '127.0.0.1', 'aa', 1532937261);
/*!40000 ALTER TABLE `login_attempts` ENABLE KEYS */;

-- Dumping structure for table iontest.mona_aucgame
DROP TABLE IF EXISTS `mona_aucgame`;
CREATE TABLE IF NOT EXISTS `mona_aucgame` (
  `AUCG_ID` char(20) NOT NULL,
  `PROD_ID` char(20) DEFAULT NULL,
  `AUCG_DATE` date DEFAULT NULL,
  `AUCG_OPENPRICE` bigint(20) DEFAULT NULL,
  `AUCG_BUYOUT` bigint(20) DEFAULT NULL,
  `AUCG_BID` bigint(20) DEFAULT NULL,
  `AUCG_LASTBID` bigint(20) DEFAULT NULL,
  `AUCG_DTSTS` char(1) DEFAULT '0',
  PRIMARY KEY (`AUCG_ID`),
  KEY `FK_AUCG1` (`PROD_ID`),
  CONSTRAINT `FK_AUC_1` FOREIGN KEY (`PROD_ID`) REFERENCES `mona_product` (`PROD_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table iontest.mona_aucgame: ~4 rows (approximately)
/*!40000 ALTER TABLE `mona_aucgame` DISABLE KEYS */;
INSERT INTO `mona_aucgame` (`AUCG_ID`, `PROD_ID`, `AUCG_DATE`, `AUCG_OPENPRICE`, `AUCG_BUYOUT`, `AUCG_BID`, `AUCG_LASTBID`, `AUCG_DTSTS`) VALUES
	('AUC-00001', 'BB0618PROBO', '2018-07-16', 100000000, 200000000, 10000000, 100000000, '0'),
	('AUC-00002', 'BB0618PROBO', '2018-07-16', 150000000, 350000000, 10000000, 0, '0'),
	('AUC-00003', 'BB0718ADITY', '2018-07-17', 100000000, 120000000, 10000000, 120000000, '1'),
	('AUC-00004', 'BB0618PROBO', '2018-07-31', 100000000, 200000000, 10000000, 0, '0');
/*!40000 ALTER TABLE `mona_aucgame` ENABLE KEYS */;

-- Dumping structure for table iontest.mona_aucmember
DROP TABLE IF EXISTS `mona_aucmember`;
CREATE TABLE IF NOT EXISTS `mona_aucmember` (
  `USER_ID` char(10) NOT NULL,
  `AUCG_ID` char(20) NOT NULL,
  PRIMARY KEY (`USER_ID`,`AUCG_ID`),
  KEY `FK_AUCMBR2` (`AUCG_ID`),
  CONSTRAINT `FK_AUCMBR1` FOREIGN KEY (`USER_ID`) REFERENCES `mona_user` (`USER_ID`),
  CONSTRAINT `FK_AUCMBR2` FOREIGN KEY (`AUCG_ID`) REFERENCES `mona_aucgame` (`AUCG_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table iontest.mona_aucmember: ~4 rows (approximately)
/*!40000 ALTER TABLE `mona_aucmember` DISABLE KEYS */;
INSERT INTO `mona_aucmember` (`USER_ID`, `AUCG_ID`) VALUES
	('USR-00001', 'AUC-00003'),
	('USR-00001', 'AUC-00004'),
	('USR-00002', 'AUC-00004'),
	('USR-00003', 'AUC-00003');
/*!40000 ALTER TABLE `mona_aucmember` ENABLE KEYS */;

-- Dumping structure for table iontest.mona_bidhistory
DROP TABLE IF EXISTS `mona_bidhistory`;
CREATE TABLE IF NOT EXISTS `mona_bidhistory` (
  `BIDH_ID` int(11) NOT NULL AUTO_INCREMENT,
  `USER_ID` char(10) DEFAULT NULL,
  `AUCG_ID` char(20) DEFAULT NULL,
  `BIDH_NOM` bigint(20) NOT NULL,
  `BIDH_TIME` time NOT NULL,
  `BIDH_STS` char(1) NOT NULL,
  PRIMARY KEY (`BIDH_ID`),
  KEY `FK_BIDH1` (`USER_ID`),
  KEY `FK_BIDH2` (`AUCG_ID`),
  CONSTRAINT `FK_BIDH1` FOREIGN KEY (`USER_ID`) REFERENCES `mona_user` (`USER_ID`),
  CONSTRAINT `FK_BIDH2` FOREIGN KEY (`AUCG_ID`) REFERENCES `mona_aucgame` (`AUCG_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table iontest.mona_bidhistory: ~0 rows (approximately)
/*!40000 ALTER TABLE `mona_bidhistory` DISABLE KEYS */;
/*!40000 ALTER TABLE `mona_bidhistory` ENABLE KEYS */;

-- Dumping structure for table iontest.mona_mainbanners
DROP TABLE IF EXISTS `mona_mainbanners`;
CREATE TABLE IF NOT EXISTS `mona_mainbanners` (
  `MBANN_ID` int(11) NOT NULL AUTO_INCREMENT,
  `MBANN_NAME` varchar(1024) DEFAULT NULL,
  `MBANN_LINK` varchar(1024) DEFAULT NULL,
  `MBANN_IMGPATH` varchar(1024) DEFAULT NULL,
  PRIMARY KEY (`MBANN_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table iontest.mona_mainbanners: ~0 rows (approximately)
/*!40000 ALTER TABLE `mona_mainbanners` DISABLE KEYS */;
/*!40000 ALTER TABLE `mona_mainbanners` ENABLE KEYS */;

-- Dumping structure for table iontest.mona_product
DROP TABLE IF EXISTS `mona_product`;
CREATE TABLE IF NOT EXISTS `mona_product` (
  `PROD_ID` char(20) NOT NULL,
  `PROD_NAME` char(20) NOT NULL,
  `PROD_PRICE` bigint(20) NOT NULL,
  `PROD_OPENPRICE` char(20) NOT NULL,
  `PROD_BUYOUT` char(20) NOT NULL,
  `PROD_PIC` varchar(1024) DEFAULT NULL,
  `PROD_DTSTS` char(1) DEFAULT '0',
  PRIMARY KEY (`PROD_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table iontest.mona_product: ~4 rows (approximately)
/*!40000 ALTER TABLE `mona_product` DISABLE KEYS */;
INSERT INTO `mona_product` (`PROD_ID`, `PROD_NAME`, `PROD_PRICE`, `PROD_OPENPRICE`, `PROD_BUYOUT`, `PROD_PIC`, `PROD_DTSTS`) VALUES
	('BB0618PROBO', 'Probolinggo', 400000000, '100000000', '300000000', '/assets/img/product/img_1531656005.jpeg', '1'),
	('BB0718ADIT', 'Adityawarmana', 0, '100000000', '300000000', NULL, '0'),
	('BB0718ADITY', 'Adityawarman', 350000000, '', '', '/assets/img/product/img_1531811329.jpeg', '1'),
	('BB0718HRMUH', 'HR Muhammad', 275000000, '100000000', '200000000', '/assets/img/product/img_1531653033.jpeg', '1');
/*!40000 ALTER TABLE `mona_product` ENABLE KEYS */;

-- Dumping structure for table iontest.mona_user
DROP TABLE IF EXISTS `mona_user`;
CREATE TABLE IF NOT EXISTS `mona_user` (
  `USER_ID` char(10) NOT NULL,
  `USER_NAME` char(10) NOT NULL,
  `USER_PASS` char(10) NOT NULL,
  `USER_COMPANY` char(200) DEFAULT NULL,
  `USER_ADDRESS` varchar(2048) DEFAULT NULL,
  `USER_DTSTS` char(1) DEFAULT '0',
  PRIMARY KEY (`USER_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table iontest.mona_user: ~4 rows (approximately)
/*!40000 ALTER TABLE `mona_user` DISABLE KEYS */;
INSERT INTO `mona_user` (`USER_ID`, `USER_NAME`, `USER_PASS`, `USER_COMPANY`, `USER_ADDRESS`, `USER_DTSTS`) VALUES
	('USR-00001', 'Kaisha', '12345', 'Match Ad', 'Lesti 42A', '1'),
	('USR-00002', 'Indra', '12345', 'KCT', 'Raya Taman', '1'),
	('USR-00003', 'Dini', '12345', 'WPI', 'HR Muhammad', '1'),
	('USR-00004', 'Zamroni', '12345', 'WIKLAN', 'Lesti 42B', '1');
/*!40000 ALTER TABLE `mona_user` ENABLE KEYS */;

-- Dumping structure for table iontest.users
DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `ip_address` varchar(45) NOT NULL,
  `username` varchar(100) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `salt` varchar(255) DEFAULT NULL,
  `email` varchar(254) NOT NULL,
  `activation_code` varchar(40) DEFAULT NULL,
  `forgotten_password_code` varchar(40) DEFAULT NULL,
  `forgotten_password_time` int(11) unsigned DEFAULT NULL,
  `remember_code` varchar(40) DEFAULT NULL,
  `created_on` int(11) unsigned NOT NULL,
  `last_login` int(11) unsigned DEFAULT NULL,
  `active` tinyint(1) unsigned DEFAULT NULL,
  `first_name` varchar(50) DEFAULT NULL,
  `last_name` varchar(50) DEFAULT NULL,
  `company` varchar(100) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- Dumping data for table iontest.users: ~2 rows (approximately)
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` (`id`, `ip_address`, `username`, `password`, `salt`, `email`, `activation_code`, `forgotten_password_code`, `forgotten_password_time`, `remember_code`, `created_on`, `last_login`, `active`, `first_name`, `last_name`, `company`, `phone`) VALUES
	(1, '127.0.0.1', 'administrator', '$2a$07$SeBknntpZror9uyftVopmu61qg0ms8Qv1yV6FG.kQOSM.9QhmTo36', '', 'admin@admin.com', '', NULL, NULL, NULL, 1268889823, 1532940118, 1, 'Admin', 'istrator', 'ADMIN', '0'),
	(2, '127.0.0.1', 'tes1', '$2a$07$SeBknntpZror9uyftVopmu61qg0ms8Qv1yV6FG.kQOSM.9QhmTo36', NULL, 'tes@mail.com', NULL, NULL, NULL, NULL, 1532591726, 1532940104, 1, 'tes', 'tes', 'tes', '123415'),
	(3, '127.0.0.1', 'tes2@mail.com', '$2y$08$N/k5kV1vMgglz/olhGc0OuOYMdqHfyXFiN2LFPwnyRM1Tt5WwsqKu', NULL, 'tes2@mail.com', NULL, NULL, NULL, NULL, 1532591825, NULL, 1, 'tes2', 'tes2', 'tes2', '987654');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;

-- Dumping structure for table iontest.users_groups
DROP TABLE IF EXISTS `users_groups`;
CREATE TABLE IF NOT EXISTS `users_groups` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) unsigned NOT NULL,
  `group_id` mediumint(8) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `uc_users_groups` (`user_id`,`group_id`),
  KEY `fk_users_groups_users1_idx` (`user_id`),
  KEY `fk_users_groups_groups1_idx` (`group_id`),
  CONSTRAINT `fk_users_groups_groups1` FOREIGN KEY (`group_id`) REFERENCES `groups` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION,
  CONSTRAINT `fk_users_groups_users1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;

-- Dumping data for table iontest.users_groups: ~4 rows (approximately)
/*!40000 ALTER TABLE `users_groups` DISABLE KEYS */;
INSERT INTO `users_groups` (`id`, `user_id`, `group_id`) VALUES
	(7, 1, 1),
	(8, 1, 2),
	(11, 2, 2),
	(12, 2, 3),
	(10, 3, 2);
/*!40000 ALTER TABLE `users_groups` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
