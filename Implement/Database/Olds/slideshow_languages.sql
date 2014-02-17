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


-- Dumping structure for table brand_tea_db.slideshow_languages
DROP TABLE IF EXISTS `slideshow_languages`;
CREATE TABLE IF NOT EXISTS `slideshow_languages` (
  `sll_id` int(10) NOT NULL AUTO_INCREMENT,
  `sli_id` int(10) DEFAULT NULL,
  `lang_id` int(10) DEFAULT NULL,
  `sli_description` text,
  PRIMARY KEY (`sll_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Data exporting was unselected.
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
