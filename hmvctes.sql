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

-- Dumping structure for table iontest.mona_blog
DROP TABLE IF EXISTS `mona_blog`;
CREATE TABLE IF NOT EXISTS `mona_blog` (
  `BLOG_ID` int(11) NOT NULL AUTO_INCREMENT,
  `BLOGCTG_ID` int(11) NOT NULL DEFAULT '0',
  `BLOG_TITLE` varchar(1024) DEFAULT NULL,
  `BLOG_SLUG` varchar(1024) DEFAULT NULL,
  `BLOG_DATE` date DEFAULT NULL,
  `BLOG_UPDATE` datetime DEFAULT NULL,
  `BLOG_CONTENT` longtext,
  `BLOG_PICTURE` varchar(2048) DEFAULT NULL,
  `BLOG_STS` char(1) DEFAULT NULL,
  `BLOG_DTSTS` char(1) DEFAULT NULL,
  PRIMARY KEY (`BLOG_ID`),
  KEY `FK_mona_blog_mona_blogcategories` (`BLOGCTG_ID`),
  CONSTRAINT `FK_mona_blog_mona_blogcategories` FOREIGN KEY (`BLOGCTG_ID`) REFERENCES `mona_blogcategories` (`BLOGCTG_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table iontest.mona_blog: ~0 rows (approximately)
/*!40000 ALTER TABLE `mona_blog` DISABLE KEYS */;
/*!40000 ALTER TABLE `mona_blog` ENABLE KEYS */;

-- Dumping structure for table iontest.mona_blogcategories
DROP TABLE IF EXISTS `mona_blogcategories`;
CREATE TABLE IF NOT EXISTS `mona_blogcategories` (
  `BLOGCTG_ID` int(11) NOT NULL AUTO_INCREMENT,
  `BLOGCTG_NAME` varchar(1024) DEFAULT NULL,
  `BLOGCTG_DTSTS` char(1) DEFAULT NULL,
  PRIMARY KEY (`BLOGCTG_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table iontest.mona_blogcategories: ~0 rows (approximately)
/*!40000 ALTER TABLE `mona_blogcategories` DISABLE KEYS */;
/*!40000 ALTER TABLE `mona_blogcategories` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
