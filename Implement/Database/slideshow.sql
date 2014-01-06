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

-- Dumping structure for table brand_tea_db.slideshow
DROP TABLE IF EXISTS `slideshow`;
CREATE TABLE IF NOT EXISTS `slideshow` (
  `sli_id` int(10) NOT NULL AUTO_INCREMENT,
  `sli_image` varchar(300) NOT NULL,
  `sli_cat_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`sli_id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

-- Dumping data for table brand_tea_db.slideshow: ~3 rows (approximately)
DELETE FROM `slideshow`;
/*!40000 ALTER TABLE `slideshow` DISABLE KEYS */;
INSERT INTO `slideshow` (`sli_id`, `sli_image`, `sli_cat_id`) VALUES
	(4, '2.jpg', 1),
	(5, '1.jpg', 1),
	(8, '3.jpg', 1);
/*!40000 ALTER TABLE `slideshow` ENABLE KEYS */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
