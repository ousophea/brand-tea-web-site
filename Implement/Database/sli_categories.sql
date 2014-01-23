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

-- Dumping structure for table brand_tea_db.sli_categories
DROP TABLE IF EXISTS `sli_categories`;
CREATE TABLE IF NOT EXISTS `sli_categories` (
  `sli_cat_id` int(10) NOT NULL AUTO_INCREMENT,
  `sli_cat_name` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`sli_cat_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- Dumping data for table brand_tea_db.sli_categories: ~2 rows (approximately)
DELETE FROM `sli_categories`;
/*!40000 ALTER TABLE `sli_categories` DISABLE KEYS */;
INSERT INTO `sli_categories` (`sli_cat_id`, `sli_cat_name`) VALUES
	(1, 'Home');
/*!40000 ALTER TABLE `sli_categories` ENABLE KEYS */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
