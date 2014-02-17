-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               5.6.12-log - MySQL Community Server (GPL)
-- Server OS:                    Win64
-- HeidiSQL Version:             8.0.0.4396
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

-- Dumping database structure for brand_tea_db
CREATE DATABASE IF NOT EXISTS `brand_tea_db` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `brand_tea_db`;


-- Dumping structure for table brand_tea_db.contents
DROP TABLE IF EXISTS `contents`;
CREATE TABLE IF NOT EXISTS `contents` (
  `cont_id` int(11) NOT NULL AUTO_INCREMENT,
  `cont_name` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `cont_description` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `men_id` int(11) NOT NULL,
  `lang_id` smallint(6) NOT NULL,
  PRIMARY KEY (`cont_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Data exporting was unselected.


-- Dumping structure for table brand_tea_db.con_slideshow
DROP TABLE IF EXISTS `con_slideshow`;
CREATE TABLE IF NOT EXISTS `con_slideshow` (
  `Id` int(10) NOT NULL AUTO_INCREMENT,
  `con_id` int(10) DEFAULT NULL,
  `sli_id` int(10) DEFAULT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Data exporting was unselected.


-- Dumping structure for table brand_tea_db.slideshow
DROP TABLE IF EXISTS `slideshow`;
CREATE TABLE IF NOT EXISTS `slideshow` (
  `sli_id` int(10) NOT NULL AUTO_INCREMENT,
  `sli_image` varchar(300) NOT NULL,
  `sli_description` tinytext,
  `sli_cat_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`sli_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Data exporting was unselected.


-- Dumping structure for table brand_tea_db.sli_categories
DROP TABLE IF EXISTS `sli_categories`;
CREATE TABLE IF NOT EXISTS `sli_categories` (
  `sli_cat_id` int(10) NOT NULL AUTO_INCREMENT,
  `sli_cat_name` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`sli_cat_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Data exporting was unselected.
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
