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

-- Dumping structure for table brand_tea_db.contents
DROP TABLE IF EXISTS `contents`;
CREATE TABLE IF NOT EXISTS `contents` (
  `cont_id` int(11) NOT NULL AUTO_INCREMENT,
  `cont_name` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL,
  `cont_description` text COLLATE utf8_unicode_ci,
  `men_id` int(11) NOT NULL,
  `lang_id` smallint(11) NOT NULL,
  PRIMARY KEY (`cont_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table brand_tea_db.contents: ~4 rows (approximately)
DELETE FROM `contents`;
/*!40000 ALTER TABLE `contents` DISABLE KEYS */;
INSERT INTO `contents` (`cont_id`, `cont_name`, `cont_description`, `men_id`, `lang_id`) VALUES
	(1, 'Welcome', '<p>home content</p>', 1, 1),
	(2, 'About', '<p>About us</p>', 2, 1),
	(3, 'Contact', '<p>Catact ussdfjsdljf</p>', 3, 1),
	(4, 'Services', '<p>this is the sevices. En</p>', 4, 1);
/*!40000 ALTER TABLE `contents` ENABLE KEYS */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
