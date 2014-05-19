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


-- Dumping structure for table brand_tea_db.categories
DROP TABLE IF EXISTS `categories`;
CREATE TABLE IF NOT EXISTS `categories` (
  `cate_id` int(11) NOT NULL AUTO_INCREMENT,
  `cate_name` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `cate_description` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `cate_fields` text COLLATE utf8_unicode_ci,
  `lang_id` smallint(6) NOT NULL,
  PRIMARY KEY (`cate_id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table brand_tea_db.categories: ~4 rows (approximately)
DELETE FROM `categories`;
/*!40000 ALTER TABLE `categories` DISABLE KEYS */;
INSERT INTO `categories` (`cate_id`, `cate_name`, `cate_description`, `cate_fields`, `lang_id`) VALUES
	(2, 'test', 'test', 'a:2:{s:5:"label";a:1:{i:0;s:17:"Short Description";}s:5:"field";a:1:{i:0;s:7:"Product";}}', 1),
	(3, 'Nice', 'Nice', 'a:2:{s:5:"label";a:3:{i:0;s:4:"Free";i:1;s:7:"Benefit";i:2;s:7:"number3";}s:5:"field";a:3:{i:0;s:1:"1";i:1;s:4:"good";i:2;s:1:"3";}}', 1),
	(5, 'yellow tea', 'yellow tea', 'a:2:{s:5:"label";a:1:{i:0;s:1:"s";}s:5:"field";a:1:{i:0;s:1:"s";}}', 1),
	(7, 'tesssssssssssssssss', 'test', 'a:2:{s:5:"label";b:0;s:5:"field";b:0;}', 1);
/*!40000 ALTER TABLE `categories` ENABLE KEYS */;


-- Dumping structure for table brand_tea_db.category_languages
DROP TABLE IF EXISTS `category_languages`;
CREATE TABLE IF NOT EXISTS `category_languages` (
  `cal_id` int(11) NOT NULL AUTO_INCREMENT,
  `cate_id` int(11) NOT NULL,
  `lang_id` int(11) NOT NULL,
  `cate_name` varchar(250) NOT NULL,
  `cate_description` text NOT NULL,
  `cate_fields` text NOT NULL,
  PRIMARY KEY (`cal_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- Dumping data for table brand_tea_db.category_languages: ~2 rows (approximately)
DELETE FROM `category_languages`;
/*!40000 ALTER TABLE `category_languages` DISABLE KEYS */;
INSERT INTO `category_languages` (`cal_id`, `cate_id`, `lang_id`, `cate_name`, `cate_description`, `cate_fields`) VALUES
	(1, 2, 2, 'ក្រុមតែបៃតង', 'នេះជាក្រុមតែបៃតង', 'a:2:{s:5:"label";a:1:{i:0;s:39:"ព័ត៌មានសង្ខេប";}s:5:"field";a:1:{i:0;s:48:"នេះជាក្រុមតែបៃតង";}}'),
	(2, 3, 2, 'ផលិតផលល្អ', 'នេះជាផលិតផលល្អ', 'a:2:{s:5:"label";a:3:{i:0;s:4:"Free";i:1;s:7:"Benefit";i:2;s:7:"number3";}s:5:"field";a:3:{i:0;s:1:"1";i:1;s:4:"good";i:2;s:1:"3";}}');
/*!40000 ALTER TABLE `category_languages` ENABLE KEYS */;


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


-- Dumping structure for table brand_tea_db.content_languages
DROP TABLE IF EXISTS `content_languages`;
CREATE TABLE IF NOT EXISTS `content_languages` (
  `col_id` int(11) NOT NULL AUTO_INCREMENT,
  `lang_id` int(11) NOT NULL,
  `cont_id` int(11) NOT NULL,
  `cont_name` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `cont_description` text COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`col_id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table brand_tea_db.content_languages: 5 rows
DELETE FROM `content_languages`;
/*!40000 ALTER TABLE `content_languages` DISABLE KEYS */;
INSERT INTO `content_languages` (`col_id`, `lang_id`, `cont_id`, `cont_name`, `cont_description`) VALUES
	(1, 3, 4, 'Services ch', '<p>this is the sevices. ch</p>'),
	(2, 2, 4, 'សេវាកម្ម', '<p>គេហទំព័រសេវាកម្ម</p>'),
	(3, 2, 1, 'ទំព័រដើម', '<p>គេហទំព័រដើម</p>'),
	(4, 3, 1, 'Welcome CH', '<p>home content​ CH</p>'),
	(5, 2, 2, 'about use khmer', 'សដថដសលថ្សោេ្ោេឹរោឹេរឹ');
/*!40000 ALTER TABLE `content_languages` ENABLE KEYS */;


-- Dumping structure for table brand_tea_db.con_slideshow
DROP TABLE IF EXISTS `con_slideshow`;
CREATE TABLE IF NOT EXISTS `con_slideshow` (
  `Id` int(10) NOT NULL AUTO_INCREMENT,
  `con_id` int(10) DEFAULT NULL,
  `sli_id` int(10) DEFAULT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table brand_tea_db.con_slideshow: ~0 rows (approximately)
DELETE FROM `con_slideshow`;
/*!40000 ALTER TABLE `con_slideshow` DISABLE KEYS */;
/*!40000 ALTER TABLE `con_slideshow` ENABLE KEYS */;


-- Dumping structure for table brand_tea_db.groups
DROP TABLE IF EXISTS `groups`;
CREATE TABLE IF NOT EXISTS `groups` (
  `gro_id` int(11) NOT NULL AUTO_INCREMENT,
  `gro_name` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `gro_description` varchar(500) COLLATE utf8_unicode_ci DEFAULT NULL,
  `cate_id` int(11) DEFAULT NULL,
  `lang_id` smallint(6) NOT NULL,
  PRIMARY KEY (`gro_id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table brand_tea_db.groups: ~3 rows (approximately)
DELETE FROM `groups`;
/*!40000 ALTER TABLE `groups` DISABLE KEYS */;
INSERT INTO `groups` (`gro_id`, `gro_name`, `gro_description`, `cate_id`, `lang_id`) VALUES
	(4, 'tea', 'tea', 2, 1),
	(5, 'green tea', 'green tea', 3, 1),
	(6, 'testssssssssssssssssss', 'test test test', 7, 1);
/*!40000 ALTER TABLE `groups` ENABLE KEYS */;


-- Dumping structure for table brand_tea_db.group_languages
DROP TABLE IF EXISTS `group_languages`;
CREATE TABLE IF NOT EXISTS `group_languages` (
  `grl_id` int(11) NOT NULL AUTO_INCREMENT,
  `lang_id` int(11) NOT NULL,
  `gro_id` int(11) NOT NULL,
  `gro_name` varchar(255) CHARACTER SET utf8 NOT NULL,
  `gro_description` text CHARACTER SET utf8 NOT NULL,
  PRIMARY KEY (`grl_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=gb2312 COLLATE=gb2312_bin;

-- Dumping data for table brand_tea_db.group_languages: ~2 rows (approximately)
DELETE FROM `group_languages`;
/*!40000 ALTER TABLE `group_languages` DISABLE KEYS */;
INSERT INTO `group_languages` (`grl_id`, `lang_id`, `gro_id`, `gro_name`, `gro_description`) VALUES
	(2, 2, 5, 'តែបៃតង', 'តែបៃតង'),
	(3, 2, 4, 'តែ', 'តែ');
/*!40000 ALTER TABLE `group_languages` ENABLE KEYS */;


-- Dumping structure for table brand_tea_db.languages
DROP TABLE IF EXISTS `languages`;
CREATE TABLE IF NOT EXISTS `languages` (
  `lang_id` smallint(6) NOT NULL AUTO_INCREMENT,
  `lang_name` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `lang_description` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`lang_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table brand_tea_db.languages: ~3 rows (approximately)
DELETE FROM `languages`;
/*!40000 ALTER TABLE `languages` DISABLE KEYS */;
INSERT INTO `languages` (`lang_id`, `lang_name`, `lang_description`) VALUES
	(1, 'English', 'en'),
	(2, 'Khmer', 'kh'),
	(3, 'Chiness', 'ch');
/*!40000 ALTER TABLE `languages` ENABLE KEYS */;


-- Dumping structure for table brand_tea_db.menus
DROP TABLE IF EXISTS `menus`;
CREATE TABLE IF NOT EXISTS `menus` (
  `men_id` int(11) NOT NULL AUTO_INCREMENT,
  `men_name` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `men_order` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `lang_id` smallint(6) NOT NULL,
  PRIMARY KEY (`men_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table brand_tea_db.menus: ~0 rows (approximately)
DELETE FROM `menus`;
/*!40000 ALTER TABLE `menus` DISABLE KEYS */;
/*!40000 ALTER TABLE `menus` ENABLE KEYS */;


-- Dumping structure for table brand_tea_db.photos
DROP TABLE IF EXISTS `photos`;
CREATE TABLE IF NOT EXISTS `photos` (
  `pho_id` int(11) NOT NULL AUTO_INCREMENT,
  `pho_url` text NOT NULL,
  `pho_des` text NOT NULL,
  `pro_id` int(11) NOT NULL,
  `pho_is_main_photo` int(11) NOT NULL,
  PRIMARY KEY (`pho_id`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8;

-- Dumping data for table brand_tea_db.photos: ~16 rows (approximately)
DELETE FROM `photos`;
/*!40000 ALTER TABLE `photos` DISABLE KEYS */;
INSERT INTO `photos` (`pho_id`, `pho_url`, `pho_des`, `pro_id`, `pho_is_main_photo`) VALUES
	(1, 'Penguins.jpg', '', 1, 1),
	(2, 'Koala.jpg', '', 1, 0),
	(3, 'Chrysanthemum.jpg', '', 2, 1),
	(4, 'Desert.jpg', '', 2, 0),
	(8, 'Koala1.jpg', '', 4, 1),
	(9, 'Jellyfish.jpg', '', 4, 0),
	(10, 'Tulips.jpg', '', 4, 0),
	(11, 'Koala2.jpg', '', 5, 1),
	(12, 'Penguins1.jpg', '', 5, 0),
	(13, 'Lighthouse.jpg', '', 6, 1),
	(14, 'Chrysanthemum1.jpg', '', 6, 0),
	(15, 'Desert1.jpg', '', 6, 0),
	(16, 'Hydrangeas.jpg', '', 6, 0),
	(17, 'Koala3.jpg', '', 6, 0),
	(18, 'Lighthouse1.jpg', '', 6, 0),
	(19, 'Penguins2.jpg', '', 6, 0);
/*!40000 ALTER TABLE `photos` ENABLE KEYS */;


-- Dumping structure for table brand_tea_db.products
DROP TABLE IF EXISTS `products`;
CREATE TABLE IF NOT EXISTS `products` (
  `pro_id` int(11) NOT NULL AUTO_INCREMENT,
  `pro_name` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `pro_price` text COLLATE utf8_unicode_ci,
  `pro_qty` text COLLATE utf8_unicode_ci,
  `pro_fields` text COLLATE utf8_unicode_ci,
  `gro_id` int(11) NOT NULL,
  `lang_id` int(11) NOT NULL,
  `pro_related` text COLLATE utf8_unicode_ci NOT NULL,
  `pro_des` text COLLATE utf8_unicode_ci NOT NULL,
  `pro_knowledge_related` text COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`pro_id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table brand_tea_db.products: ~5 rows (approximately)
DELETE FROM `products`;
/*!40000 ALTER TABLE `products` DISABLE KEYS */;
INSERT INTO `products` (`pro_id`, `pro_name`, `pro_price`, `pro_qty`, `pro_fields`, `gro_id`, `lang_id`, `pro_related`, `pro_des`, `pro_knowledge_related`) VALUES
	(1, 'Green Tea', 'a:2:{s:5:"price";s:4:"2500";s:9:"hide_show";s:4:"show";}', 'a:2:{s:3:"qty";s:4:"2500";s:9:"hide_show";s:4:"show";}', 'a:3:{s:5:"label";a:1:{i:0;s:17:"Short Description";}s:5:"field";a:1:{i:0;s:7:"Product";}s:9:"hide_show";a:1:{i:0;s:4:"show";}}', 4, 1, 'b:0;', '<p>sdfdf</p>', 'b:0;'),
	(2, 'test', 'a:2:{s:5:"price";s:3:"111";s:9:"hide_show";s:4:"show";}', 'a:2:{s:3:"qty";s:3:"111";s:9:"hide_show";s:4:"show";}', 'a:3:{s:5:"label";a:1:{i:0;s:17:"Short Description";}s:5:"field";a:1:{i:0;s:7:"Product";}s:9:"hide_show";a:1:{i:0;s:4:"show";}}', 4, 1, 'a:1:{i:0;s:1:"1";}', '<p>test</p>', 'b:0;'),
	(4, 'hello', 'a:2:{s:5:"price";s:4:"1200";s:9:"hide_show";s:4:"show";}', 'a:2:{s:3:"qty";s:4:"1200";s:9:"hide_show";s:4:"show";}', 'a:3:{s:5:"label";a:3:{i:0;s:4:"Free";i:1;s:7:"Benefit";i:2;s:7:"number3";}s:5:"field";a:3:{i:0;s:1:"1";i:1;s:4:"good";i:2;s:1:"3";}s:9:"hide_show";a:3:{i:0;s:4:"show";i:1;s:4:"hide";i:2;s:4:"show";}}', 5, 1, 'a:2:{i:0;s:1:"1";i:1;s:1:"2";}', '<p>test</p>', 'b:0;'),
	(5, 'dddddddddddddd', 'a:2:{s:5:"price";s:1:"2";s:9:"hide_show";s:4:"show";}', 'a:2:{s:3:"qty";s:1:"2";s:9:"hide_show";s:4:"show";}', 'a:3:{s:5:"label";b:0;s:5:"field";b:0;s:9:"hide_show";b:0;}', 6, 1, 'a:2:{i:0;s:1:"1";i:1;s:1:"2";}', '<p>2</p>', 'b:0;'),
	(6, 'test2', 'a:2:{s:5:"price";s:2:"33";s:9:"hide_show";s:4:"show";}', 'a:2:{s:3:"qty";s:2:"33";s:9:"hide_show";s:4:"show";}', 'a:3:{s:5:"label";a:3:{i:0;s:4:"Free";i:1;s:7:"Benefit";i:2;s:7:"number3";}s:5:"field";a:3:{i:0;s:4:"ssss";i:1;s:3:"sss";i:2;s:1:"3";}s:9:"hide_show";a:3:{i:0;s:4:"show";i:1;s:4:"hide";i:2;s:4:"show";}}', 5, 1, 'a:2:{i:0;s:1:"1";i:1;s:1:"2";}', '<p>test</p>', 'a:1:{i:0;s:1:"4";}');
/*!40000 ALTER TABLE `products` ENABLE KEYS */;


-- Dumping structure for table brand_tea_db.product_languages
DROP TABLE IF EXISTS `product_languages`;
CREATE TABLE IF NOT EXISTS `product_languages` (
  `prl_id` int(11) NOT NULL AUTO_INCREMENT,
  `lang_id` int(11) NOT NULL,
  `pro_id` int(11) NOT NULL,
  `pro_name` varchar(250) NOT NULL,
  `pro_des` text NOT NULL,
  `pro_fields` text NOT NULL,
  PRIMARY KEY (`prl_id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

-- Dumping data for table brand_tea_db.product_languages: ~4 rows (approximately)
DELETE FROM `product_languages`;
/*!40000 ALTER TABLE `product_languages` DISABLE KEYS */;
INSERT INTO `product_languages` (`prl_id`, `lang_id`, `pro_id`, `pro_name`, `pro_des`, `pro_fields`) VALUES
	(3, 2, 25, 'តែបៃតង', '<p>តែបៃតង</p>', 'a:3:{s:5:"label";a:3:{i:0;s:4:"Free";i:1;s:7:"Benefit";i:2;s:7:"number3";}s:5:"field";a:3:{i:0;s:1:"1";i:1;s:4:"good";i:2;s:1:"3";}s:9:"hide_show";a:3:{i:0;s:4:"hide";i:1;s:4:"show";i:2;s:4:"hide";}}'),
	(4, 2, 1, 'តែបៃតង', '<p>តែបៃតង</p>', 'a:3:{s:5:"label";a:1:{i:0;s:17:"Short Description";}s:5:"field";a:1:{i:0;s:18:"ផលិតផល";}s:9:"hide_show";a:1:{i:0;s:4:"show";}}'),
	(5, 2, 2, 'សាក', '<p>test</p>', 'a:3:{s:5:"label";a:1:{i:0;s:17:"Short Description";}s:5:"field";a:1:{i:0;s:9:"សាក";}s:9:"hide_show";a:1:{i:0;s:4:"show";}}'),
	(6, 2, 4, 'សាក', '<p>សាក</p>\r\n<p><img src="http://localhost/tea/Implement/qnbrandtea.com/uploads/tinymce/uploads/green-tea.jpg" alt="" width="448" height="327" /></p>', 'a:3:{s:5:"label";a:3:{i:0;s:4:"Free";i:1;s:7:"Benefit";i:2;s:7:"number3";}s:5:"field";a:3:{i:0;s:1:"1";i:1;s:4:"good";i:2;s:1:"3";}s:9:"hide_show";a:3:{i:0;s:4:"show";i:1;s:4:"hide";i:2;s:4:"show";}}');
/*!40000 ALTER TABLE `product_languages` ENABLE KEYS */;


-- Dumping structure for table brand_tea_db.slideshow
DROP TABLE IF EXISTS `slideshow`;
CREATE TABLE IF NOT EXISTS `slideshow` (
  `sli_id` int(10) NOT NULL AUTO_INCREMENT,
  `sli_image` varchar(300) NOT NULL,
  `sli_description` tinytext,
  `sli_cat_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`sli_id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

-- Dumping data for table brand_tea_db.slideshow: ~6 rows (approximately)
DELETE FROM `slideshow`;
/*!40000 ALTER TABLE `slideshow` DISABLE KEYS */;
INSERT INTO `slideshow` (`sli_id`, `sli_image`, `sli_description`, `sli_cat_id`) VALUES
	(1, 'Desert_950x267.jpg', '<p>ttt</p>', 3),
	(2, 'Tulips_950x267.jpg', '', 3),
	(3, 'Tulips_950x267.jpg', '<p>home</p>', 1),
	(4, 'Chrysanthemum_950x267.jpg', '<p>lksdfjdslkjf</p>', 2),
	(5, 'Penguins_950x267.jpg', '<p>lsdjfdslafj sldjfdls fjsdlfj ljsdlkfjaldfjkads</p>', 5),
	(6, 'Hydrangeas_950x267.jpg', '<p>lsdjfdslfjj sdlfjdslfjsdl lsdjfldskjlsdk</p>', 6);
/*!40000 ALTER TABLE `slideshow` ENABLE KEYS */;


-- Dumping structure for table brand_tea_db.slideshow_languages
DROP TABLE IF EXISTS `slideshow_languages`;
CREATE TABLE IF NOT EXISTS `slideshow_languages` (
  `sll_id` int(10) NOT NULL AUTO_INCREMENT,
  `sli_id` int(10) DEFAULT NULL,
  `lang_id` int(10) DEFAULT NULL,
  `sli_description` text,
  PRIMARY KEY (`sll_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- Dumping data for table brand_tea_db.slideshow_languages: ~0 rows (approximately)
DELETE FROM `slideshow_languages`;
/*!40000 ALTER TABLE `slideshow_languages` DISABLE KEYS */;
INSERT INTO `slideshow_languages` (`sll_id`, `sli_id`, `lang_id`, `sli_description`) VALUES
	(1, 3, 2, '<p>គេហទំព័រដើម</p>'),
	(2, 1, 3, '<p>ttt</p>');
/*!40000 ALTER TABLE `slideshow_languages` ENABLE KEYS */;


-- Dumping structure for table brand_tea_db.sli_categories
DROP TABLE IF EXISTS `sli_categories`;
CREATE TABLE IF NOT EXISTS `sli_categories` (
  `sli_cat_id` int(10) NOT NULL AUTO_INCREMENT,
  `sli_cat_name` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`sli_cat_id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

-- Dumping data for table brand_tea_db.sli_categories: ~5 rows (approximately)
DELETE FROM `sli_categories`;
/*!40000 ALTER TABLE `sli_categories` DISABLE KEYS */;
INSERT INTO `sli_categories` (`sli_cat_id`, `sli_cat_name`) VALUES
	(1, 'home'),
	(2, 'About'),
	(3, 'product'),
	(4, 'Service'),
	(5, 'Tea Related'),
	(6, 'Contact');
/*!40000 ALTER TABLE `sli_categories` ENABLE KEYS */;


-- Dumping structure for table brand_tea_db.tearelated
DROP TABLE IF EXISTS `tearelated`;
CREATE TABLE IF NOT EXISTS `tearelated` (
  `tea_id` int(11) NOT NULL AUTO_INCREMENT,
  `tea_title` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `tea_description` text COLLATE utf8_unicode_ci,
  `lang_id` smallint(6) NOT NULL,
  `tea_status` smallint(11) NOT NULL,
  PRIMARY KEY (`tea_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table brand_tea_db.tearelated: ~3 rows (approximately)
DELETE FROM `tearelated`;
/*!40000 ALTER TABLE `tearelated` DISABLE KEYS */;
INSERT INTO `tearelated` (`tea_id`, `tea_title`, `tea_description`, `lang_id`, `tea_status`) VALUES
	(3, 'Herbal tea', '<p><span style="font-size: 14px; font-family: Arial;">Herbal tea has been widely-used in China from ancient time to till, for its good health benefits and balance the whole body system in traditional Chinese medicine.&nbsp;</span></p>\r\n<p><span style="font-size: 14px; font-family: Arial;">JK offers different types of <strong>traditional, natural-growing herbal teas</strong>, which has been long used in China, and frequently consumed by domestic people. Herbal tea is made from best ingredients that&rsquo;s why it has many health benefits.</span></p>\r\n<p><span style="font-size: 14px; font-family: Arial;">Our Herbal Tea Benefits:</span></p>\r\n<ul style="font-size: 16px; font-family: Arial;">\r\n<li><span style="font-family: Arial; font-size: 14px;">&bull; Best source of antioxidants and vitamins.</span></li>\r\n<li><span style="font-family: Arial; font-size: 14px;">&bull; Caffeine-free</span></li>\r\n<li><span style="font-family: Arial; font-size: 14px;">&bull; Herbal infusions combine with different teas for advanced flavor and benefits</span></li>\r\n</ul>', 1, 1),
	(4, 'How to boil in a good?', '<p><span style="font-family: Arial; font-size: 14px;"><span style="color: #006600;">Our Huo Shan</span> Huang Ya is from the Bai Ma Jiang peak in Da Bie Shan mountain in Huoshan county, Anhui province, which its peak elevation is 1774 meters high. Well-selectly one bud with one leaf/two leaves picking standard, our traditional Huo Shan Huang Ya enjoys very sweet and thick taste with good floral aroma. Unlike green tea, yellow tea focuses more on the tea taste; that is why <strong>yellow tea</strong> has sweeter &amp; thicker taste than green tea, but not its aroma. </span></p>\r\n<p><span style="font-family: Arial; font-size: 14px;">Huo Shan Huang Ya green tea is one of the famous yellow tea from Anhui province, China.&nbsp; Thought its traditional making process in ancient time is lost, it is re-discovered by the Chinese tea experts based on the records in tea books &amp; history books in 1970s. </span></p>\r\n<p><span style="font-family: Arial; font-size: 14px;">Also unlike the other several types of yellow tea, such as Jun Shan Yin Zhen &amp; Meng Ding Hua Ya, Huo Shan Huang Ya has its own unique &amp; special oxidated(yellowed process), whose yellowed process must be conducted three times during the whole making process.&nbsp; So that is why Huo Shan Huang Ya\'s taste &amp; apperance also different from Jun Shan Yin Zhen &amp; Meng Ding Hua Ya. </span></p>', 1, 1),
	(5, 'Wholesale Tea Shop', '<p><span style="font-family: \'times new roman\',times;"><span style="font-size: small;"><span style="font-size: 14px; font-family: Arial;">1.Thank you for your interest in being our wholesale partners in overseas. JK tea Co is able to offer you all different grades Chinese tea and tea wares at the most competitive price directly from tea farmers or teaware factories. We would like to cooperate with overseas tea distributors, retailers to promote Chinese teas, tea cultures, and healthy life-styles. We welcome the opportunity to work with you and enjoy the fun of tea business.</span></span></span></p>\r\n<p><span style="font-size: small; font-family: \'times new roman\',times;"><span style="font-size: small;"><span style="font-size: 14px; font-family: Arial;">If you are interested in our tea wholesale business, pls send us an email with your full company\'s introduction, including company\'s name, website and so on. Our sales representative will contact you upon receiving your application within one working. Our email a</span></span></span></p>\r\n<p><span style="font-size: small;"><span style="font-family: arial,helvetica,sans-serif;">Currently we are looking the exclusive agents in North America, Russian areas. Pls feel free to contact us if you are interested. Then we will send our exclusive agreement for you to check &amp; discuss. ss<br /></span></span></p>', 1, 1);
/*!40000 ALTER TABLE `tearelated` ENABLE KEYS */;


-- Dumping structure for table brand_tea_db.tearelated_languages
DROP TABLE IF EXISTS `tearelated_languages`;
CREATE TABLE IF NOT EXISTS `tearelated_languages` (
  `teal_id` int(11) NOT NULL AUTO_INCREMENT,
  `tea_id` int(11) NOT NULL,
  `tea_title` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `tea_description` text COLLATE utf8_unicode_ci NOT NULL,
  `lang_id` int(11) NOT NULL,
  `tea_status` smallint(6) NOT NULL,
  PRIMARY KEY (`teal_id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table brand_tea_db.tearelated_languages: 4 rows
DELETE FROM `tearelated_languages`;
/*!40000 ALTER TABLE `tearelated_languages` DISABLE KEYS */;
INSERT INTO `tearelated_languages` (`teal_id`, `tea_id`, `tea_title`, `tea_description`, `lang_id`, `tea_status`) VALUES
	(3, 2, '信阳毛尖 Xin Yang Mao Jian', '<p><strong>景宁惠明茶</strong><strong>​ 景宁惠明茶 </strong><strong>景宁惠明茶<strong>景宁惠明茶</strong><strong>景宁惠明茶</strong><strong>景宁惠明茶</strong><strong>景宁惠明茶</strong></strong></p>\r\n<p style="text-align: justify;">牛奶绿茶是NOR SAR PY ROR的特色饮料，同时也最受到我们顾客的喜爱。</p>\r\n<p style="text-align: justify;">配有精致的装饰、宽敞的环境、免费使用无线网络、超过50多种的烘焙食品，特别是清爽的牛奶绿茶把NOR SAR PY ROR牛奶绿茶店推到顶部；目前我们在金边有5个分店。</p>\r\n<p style="text-align: justify;">牛奶绿茶是NOR SAR PY ROR的特色饮料，同时也最受到我们顾客的喜爱。</p>\r\n<p style="text-align: justify;">配有精致的装饰、宽敞的环境、免费使用无线网络、超过50多种的烘焙食品，特别是清爽的牛奶绿茶把NOR SAR PY ROR牛奶绿茶店推到顶部；目前我们在金边有5个分店。</p>\r\n<p style="text-align: justify;">牛奶绿茶是NOR SAR PY ROR的特色饮料，同时也最受到我们顾客的喜爱。</p>\r\n<p style="text-align: justify;">配有精致的装饰、宽敞的环境、免费使用无线网络、超过50多种的烘焙食品，特别是清爽的牛奶绿茶把NOR SAR PY ROR牛奶绿茶店推到顶部；目前我们在金边有5个分店。</p>\r\n<p style="text-align: justify;">牛奶绿茶是NOR SAR PY ROR的特色饮料，同时也最受到我们顾客的喜爱。</p>\r\n<p style="text-align: justify;">配有精致的装饰、宽敞的环境、免费使用无线网络、超过50多种的烘焙食品，特别是清爽的牛奶绿茶把NOR SAR PY ROR牛奶绿茶店推到顶部；目前我们在金边有5个分店。</p>', 3, 1),
	(4, 2, 'ពិធីសាស្រ្ដស្ងោរតែ', '<p>តែ​បៃតង​ទឹកដោះគោ គឺជា​ភេសជ្ជៈ​មួយ​មុខ​ដែល​ទទួល​ការគាំទ្រ​យ៉ាងច្រើន​ពី​សំណាក់​អតិថិជន និង ជា​ភេសជ្ជៈ​ប្រចាំត្រកូល​របស់​ហាង <strong><span class="medium">ន</span>ស​២​រ</strong> - ហាង​តែ​បៃតង​ទឹកដោះគោ​។​</p>\r\n<p>​គួប​ផ្សំ និង ការតុបតែង​ហាង​យ៉ាង​ល្អ​ប្រណិត មាន​ទីធ្លា​ធំ​ទូលាយ​, មាន​នំ​ប្រមាណ​ជាង ៥០​ប្រភេទ​, ប្រើប្រាស់​អ៊ិន​ធឺ​ណែ​ត ដោយ​ឥតគិតថ្លៃ និង ជាពិសេស​គឺ ភេសជ្ជៈ​តែ​បៃតង​ដែល​មានឱជារស ឈ្ងុយឆ្ងាញ់ ពុំ​អាច​បំភ្លេចបាន ទើបបានជា <strong><span class="medium">ន</span>ស​២​រ</strong> - ហាង​តែ​បៃតង​ទឹកដោះគោ គឺជា​ហាង​ដែល​ឈានមុខ និង មានឈ្មោះ​ល្បី​តែមួយគត់ ព្រមទាំង​មាន​សាខា ៥ កន្លែង សុទ្ធតែ​ស្ថិត​នៅក្នុង​តំបន់​ទីប្រជុំជន នៃ​រាជធានី​ភ្នំពេញ​។​</p>\r\n<p>តែ​បៃតង​ទឹកដោះគោ គឺជា​ភេសជ្ជៈ​មួយ​មុខ​ដែល​ទទួល​ការគាំទ្រ​យ៉ាងច្រើន​ពី​សំណាក់​អតិថិជន និង ជា​ភេសជ្ជៈ​ប្រចាំត្រកូល​របស់​ហាង <strong><span class="medium">ន</span>ស​២​រ</strong> - ហាង​តែ​បៃតង​ទឹកដោះគោ​។​</p>\r\n<p>​គួប​ផ្សំ និង ការតុបតែង​ហាង​យ៉ាង​ល្អ​ប្រណិត មាន​ទីធ្លា​ធំ​ទូលាយ​, មាន​នំ​ប្រមាណ​ជាង ៥០​ប្រភេទ​, ប្រើប្រាស់​អ៊ិន​ធឺ​ណែ​ត ដោយ​ឥតគិតថ្លៃ និង ជាពិសេស​គឺ ភេសជ្ជៈ​តែ​បៃតង​ដែល​មានឱជារស ឈ្ងុយឆ្ងាញ់ ពុំ​អាច​បំភ្លេចបាន ទើបបានជា <strong><span class="medium">ន</span>ស​២​រ</strong> - ហាង​តែ​បៃតង​ទឹកដោះគោ គឺជា​ហាង​ដែល​ឈានមុខ និង មានឈ្មោះ​ល្បី​តែមួយគត់ ព្រមទាំង​មាន​សាខា ៥ កន្លែង សុទ្ធតែ​ស្ថិត​នៅក្នុង​តំបន់​ទីប្រជុំជន នៃ​រាជធានី​ភ្នំពេញ​។​</p>\r\n<p>តែ​បៃតង​ទឹកដោះគោ គឺជា​ភេសជ្ជៈ​មួយ​មុខ​ដែល​ទទួល​ការគាំទ្រ​យ៉ាងច្រើន​ពី​សំណាក់​អតិថិជន និង ជា​ភេសជ្ជៈ​ប្រចាំត្រកូល​របស់​ហាង <strong><span class="medium">ន</span>ស​២​រ</strong> - ហាង​តែ​បៃតង​ទឹកដោះគោ​។​</p>\r\n<p>​គួប​ផ្សំ និង ការតុបតែង​ហាង​យ៉ាង​ល្អ​ប្រណិត មាន​ទីធ្លា​ធំ​ទូលាយ​, មាន​នំ​ប្រមាណ​ជាង ៥០​ប្រភេទ​, ប្រើប្រាស់​អ៊ិន​ធឺ​ណែ​ត ដោយ​ឥតគិតថ្លៃ និង ជាពិសេស​គឺ ភេសជ្ជៈ​តែ​បៃតង​ដែល​មានឱជារស ឈ្ងុយឆ្ងាញ់ ពុំ​អាច​បំភ្លេចបាន ទើបបានជា <strong><span class="medium">ន</span>ស​២​រ</strong> - ហាង​តែ​បៃតង​ទឹកដោះគោ គឺជា​ហាង​ដែល​ឈានមុខ និង មានឈ្មោះ​ល្បី​តែមួយគត់ ព្រមទាំង​មាន​សាខា ៥ កន្លែង សុទ្ធតែ​ស្ថិត​នៅក្នុង​តំបន់​ទីប្រជុំជន នៃ​រាជធានី​ភ្នំពេញ​។​</p>\r\n<p>តែ​បៃតង​ទឹកដោះគោ គឺជា​ភេសជ្ជៈ​មួយ​មុខ​ដែល​ទទួល​ការគាំទ្រ​យ៉ាងច្រើន​ពី​សំណាក់​អតិថិជន និង ជា​ភេសជ្ជៈ​ប្រចាំត្រកូល​របស់​ហាង <strong><span class="medium">ន</span>ស​២​រ</strong> - ហាង​តែ​បៃតង​ទឹកដោះគោ​។​</p>\r\n<p>​គួប​ផ្សំ និង ការតុបតែង​ហាង​យ៉ាង​ល្អ​ប្រណិត មាន​ទីធ្លា​ធំ​ទូលាយ​, មាន​នំ​ប្រមាណ​ជាង ៥០​ប្រភេទ​, ប្រើប្រាស់​អ៊ិន​ធឺ​ណែ​ត ដោយ​ឥតគិតថ្លៃ និង ជាពិសេស​គឺ ភេសជ្ជៈ​តែ​បៃតង​ដែល​មានឱជារស ឈ្ងុយឆ្ងាញ់ ពុំ​អាច​បំភ្លេចបាន ទើបបានជា <strong><span class="medium">ន</span>ស​២​រ</strong> - ហាង​តែ​បៃតង​ទឹកដោះគោ គឺជា​ហាង​ដែល​ឈានមុខ និង មានឈ្មោះ​ល្បី​តែមួយគត់ ព្រមទាំង​មាន​សាខា ៥ កន្លែង សុទ្ធតែ​ស្ថិត​នៅក្នុង​តំបន់​ទីប្រជុំជន នៃ​រាជធានី​ភ្នំពេញ​។​</p>\r\n<p>តែ​បៃតង​ទឹកដោះគោ គឺជា​ភេសជ្ជៈ​មួយ​មុខ​ដែល​ទទួល​ការគាំទ្រ​យ៉ាងច្រើន​ពី​សំណាក់​អតិថិជន និង ជា​ភេសជ្ជៈ​ប្រចាំត្រកូល​របស់​ហាង <strong><span class="medium">ន</span>ស​២​រ</strong> - ហាង​តែ​បៃតង​ទឹកដោះគោ​។​</p>\r\n<p>​គួប​ផ្សំ និង ការតុបតែង​ហាង​យ៉ាង​ល្អ​ប្រណិត មាន​ទីធ្លា​ធំ​ទូលាយ​, មាន​នំ​ប្រមាណ​ជាង ៥០​ប្រភេទ​, ប្រើប្រាស់​អ៊ិន​ធឺ​ណែ​ត ដោយ​ឥតគិតថ្លៃ និង ជាពិសេស​គឺ ភេសជ្ជៈ​តែ​បៃតង​ដែល​មានឱជារស ឈ្ងុយឆ្ងាញ់ ពុំ​អាច​បំភ្លេចបាន ទើបបានជា <strong><span class="medium">ន</span>ស​២​រ</strong> - ហាង​តែ​បៃតង​ទឹកដោះគោ គឺជា​ហាង​ដែល​ឈានមុខ និង មានឈ្មោះ​ល្បី​តែមួយគត់ ព្រមទាំង​មាន​សាខា ៥ កន្លែង សុទ្ធតែ​ស្ថិត​នៅក្នុង​តំបន់​ទីប្រជុំជន <strong><em>នៃ​រាជធានី​ភ្នំពេញ​។​</em></strong></p>', 2, 1),
	(5, 3, 'តែល្អដើម្បីសុខភាព', '<p>តែ​បៃតង​ទឹកដោះគោ គឺជា​ភេសជ្ជៈ​មួយ​មុខ​ដែល​ទទួល​ការគាំទ្រ​យ៉ាងច្រើន​ពី​សំណាក់​អតិថិជន និង ជា​ភេសជ្ជៈ​ប្រចាំត្រកូល​របស់​ហាង <strong><span class="medium">ន</span>ស​២​រ</strong> - ហាង​តែ​បៃតង​ទឹកដោះគោ​។​</p>\r\n<p>​ គួប​ផ្សំ និង ការតុបតែង​ហាង​យ៉ាង​ល្អ​ប្រណិត មាន​ទីធ្លា​ធំ​ទូលាយ​, មាន​នំ​ប្រមាណ​ជាង ៥០​ប្រភេទ​, ប្រើប្រាស់​អ៊ិន​ធឺ​ណែ​ត ដោយ​ឥតគិតថ្លៃ និង ជាពិសេស​គឺ ភេសជ្ជៈ​តែ​បៃតង​ដែល​មានឱជារស ឈ្ងុយឆ្ងាញ់ ពុំ​អាច​បំភ្លេចបាន ទើបបានជា <strong><span class="medium">ន</span>ស​២​រ</strong> - ហាង​តែ​បៃតង​ទឹកដោះគោ គឺជា​ហាង​ដែល​ឈានមុខ និង មានឈ្មោះ​ល្បី​តែមួយគត់ ព្រមទាំង​មាន​សាខា ៥ កន្លែង សុទ្ធតែ​ស្ថិត​នៅក្នុង​តំបន់​ទីប្រជុំជន នៃ​រាជធានី​ភ្នំពេញ​។​</p>\r\n<p>តែ​បៃតង​ទឹកដោះគោ គឺជា​ភេសជ្ជៈ​មួយ​មុខ​ដែល​ទទួល​ការគាំទ្រ​យ៉ាងច្រើន​ពី​សំណាក់​អតិថិជន និង ជា​ភេសជ្ជៈ​ប្រចាំត្រកូល​របស់​ហាង <strong><span class="medium">ន</span>ស​២​រ</strong> - ហាង​តែ​បៃតង​ទឹកដោះគោ​។​</p>\r\n<p>​ គួប​ផ្សំ និង ការតុបតែង​ហាង​យ៉ាង​ល្អ​ប្រណិត មាន​ទីធ្លា​ធំ​ទូលាយ​, មាន​នំ​ប្រមាណ​ជាង ៥០​ប្រភេទ​, ប្រើប្រាស់​អ៊ិន​ធឺ​ណែ​ត ដោយ​ឥតគិតថ្លៃ និង ជាពិសេស​គឺ ភេសជ្ជៈ​តែ​បៃតង​ដែល​មានឱជារស ឈ្ងុយឆ្ងាញ់ ពុំ​អាច​បំភ្លេចបាន ទើបបានជា <strong><span class="medium">ន</span>ស​២​រ</strong> - ហាង​តែ​បៃតង​ទឹកដោះគោ គឺជា​ហាង​ដែល​ឈានមុខ និង មានឈ្មោះ​ល្បី​តែមួយគត់ ព្រមទាំង​មាន​សាខា ៥ កន្លែង សុទ្ធតែ​ស្ថិត​នៅក្នុង​តំបន់​ទីប្រជុំជន នៃ​រាជធានី​ភ្នំពេញ​។​</p>\r\n<p>តែ​បៃតង​ទឹកដោះគោ គឺជា​ភេសជ្ជៈ​មួយ​មុខ​ដែល​ទទួល​ការគាំទ្រ​យ៉ាងច្រើន​ពី​សំណាក់​អតិថិជន និង ជា​ភេសជ្ជៈ​ប្រចាំត្រកូល​របស់​ហាង <strong><span class="medium">ន</span>ស​២​រ</strong> - ហាង​តែ​បៃតង​ទឹកដោះគោ​។​</p>\r\n<p>​ គួប​ផ្សំ និង ការតុបតែង​ហាង​យ៉ាង​ល្អ​ប្រណិត មាន​ទីធ្លា​ធំ​ទូលាយ​, មាន​នំ​ប្រមាណ​ជាង ៥០​ប្រភេទ​, ប្រើប្រាស់​អ៊ិន​ធឺ​ណែ​ត ដោយ​ឥតគិតថ្លៃ និង ជាពិសេស​គឺ ភេសជ្ជៈ​តែ​បៃតង​ដែល​មានឱជារស ឈ្ងុយឆ្ងាញ់ ពុំ​អាច​បំភ្លេចបាន ទើបបានជា <strong><span class="medium">ន</span>ស​២​រ</strong> - ហាង​តែ​បៃតង​ទឹកដោះគោ គឺជា​ហាង​ដែល​ឈានមុខ និង មានឈ្មោះ​ល្បី​តែមួយគត់ ព្រមទាំង​មាន​សាខា ៥ កន្លែង សុទ្ធតែ​ស្ថិត​នៅក្នុង​តំបន់​ទីប្រជុំជន នៃ​រាជធានី​ភ្នំពេញ​។​</p>\r\n<p>តែ​បៃតង​ទឹកដោះគោ គឺជា​ភេសជ្ជៈ​មួយ​មុខ​ដែល​ទទួល​ការគាំទ្រ​យ៉ាងច្រើន​ពី​សំណាក់​អតិថិជន និង ជា​ភេសជ្ជៈ​ប្រចាំត្រកូល​របស់​ហាង <strong><span class="medium">ន</span>ស​២​រ</strong> - ហាង​តែ​បៃតង​ទឹកដោះគោ​។​</p>\r\n<p>​ គួប​ផ្សំ និង ការតុបតែង​ហាង​យ៉ាង​ល្អ​ប្រណិត មាន​ទីធ្លា​ធំ​ទូលាយ​, មាន​នំ​ប្រមាណ​ជាង ៥០​ប្រភេទ​, ប្រើប្រាស់​អ៊ិន​ធឺ​ណែ​ត ដោយ​ឥតគិតថ្លៃ និង ជាពិសេស​គឺ ភេសជ្ជៈ​តែ​បៃតង​ដែល​មានឱជារស ឈ្ងុយឆ្ងាញ់ ពុំ​អាច​បំភ្លេចបាន ទើបបានជា <strong><span class="medium">ន</span>ស​២​រ</strong> - ហាង​តែ​បៃតង​ទឹកដោះគោ គឺជា​ហាង​ដែល​ឈានមុខ និង មានឈ្មោះ​ល្បី​តែមួយគត់ ព្រមទាំង​មាន​សាខា ៥ កន្លែង សុទ្ធតែ​ស្ថិត​នៅក្នុង​តំបន់​ទីប្រជុំជន នៃ​រាជធានី​ភ្នំពេញ​។​</p>\r\n<p>តែ​បៃតង​ទឹកដោះគោ គឺជា​ភេសជ្ជៈ​មួយ​មុខ​ដែល​ទទួល​ការគាំទ្រ​យ៉ាងច្រើន​ពី​សំណាក់​អតិថិជន និង ជា​ភេសជ្ជៈ​ប្រចាំត្រកូល​របស់​ហាង <strong><span class="medium">ន</span>ស​២​រ</strong> - ហាង​តែ​បៃតង​ទឹកដោះគោ​។​</p>\r\n<p>​ គួប​ផ្សំ និង ការតុបតែង​ហាង​យ៉ាង​ល្អ​ប្រណិត មាន​ទីធ្លា​ធំ​ទូលាយ​, មាន​នំ​ប្រមាណ​ជាង ៥០​ប្រភេទ​, ប្រើប្រាស់​អ៊ិន​ធឺ​ណែ​ត ដោយ​ឥតគិតថ្លៃ និង ជាពិសេស​គឺ ភេសជ្ជៈ​តែ​បៃតង​ដែល​មានឱជារស ឈ្ងុយឆ្ងាញ់ ពុំ​អាច​បំភ្លេចបាន ទើបបានជា <strong><span class="medium">ន</span>ស​២​រ</strong> - ហាង​តែ​បៃតង​ទឹកដោះគោ គឺជា​ហាង​ដែល​ឈានមុខ និង មានឈ្មោះ​ល្បី​តែមួយគត់ ព្រមទាំង​មាន​សាខា ៥ កន្លែង សុទ្ធតែ​ស្ថិត​នៅក្នុង​តំបន់​ទីប្រជុំជន <strong><em>នៃ​រាជធានី​ភ្នំពេញ​។​</em></strong></p>', 2, 1),
	(6, 3, '景宁惠明茶景宁惠明茶景宁惠明茶景宁惠明茶', '<p><strong>景宁惠明茶</strong><strong>​ 景宁惠明茶 </strong><strong>景宁惠明茶<strong>景宁惠明茶</strong><strong>景宁惠明茶</strong><strong>景宁惠明茶</strong><strong>景宁惠明茶</strong></strong></p>\r\n<p style="text-align: justify;">牛奶绿茶是NOR SAR PY ROR的特色饮料，同时也最受到我们顾客的喜爱。</p>\r\n<p style="text-align: justify;">配有精致的装饰、宽敞的环境、免费使用无线网络、超过50多种的烘焙食品，特别是清爽的牛奶绿茶把NOR SAR PY ROR牛奶绿茶店推到顶部；目前我们在金边有5个分店。</p>\r\n<p style="text-align: justify;">牛奶绿茶是NOR SAR PY ROR的特色饮料，同时也最受到我们顾客的喜爱。</p>\r\n<p style="text-align: justify;">配有精致的装饰、宽敞的环境、免费使用无线网络、超过50多种的烘焙食品，特别是清爽的牛奶绿茶把NOR SAR PY ROR牛奶绿茶店推到顶部；目前我们在金边有5个分店。</p>\r\n<p style="text-align: justify;">牛奶绿茶是NOR SAR PY ROR的特色饮料，同时也最受到我们顾客的喜爱。</p>\r\n<p style="text-align: justify;">配有精致的装饰、宽敞的环境、免费使用无线网络、超过50多种的烘焙食品，特别是清爽的牛奶绿茶把NOR SAR PY ROR牛奶绿茶店推到顶部；目前我们在金边有5个分店。</p>\r\n<p style="text-align: justify;">牛奶绿茶是NOR SAR PY ROR的特色饮料，同时也最受到我们顾客的喜爱。</p>\r\n<p style="text-align: justify;">配有精致的装饰、宽敞的环境、免费使用无线网络、超过50多种的烘焙食品，特别是清爽的牛奶绿茶把NOR SAR PY ROR牛奶绿茶店推到顶部；目前我们在金边有5个分店。</p>\r\n<p><strong>景宁惠明茶</strong><strong>​ 景宁惠明茶 </strong><strong>景宁惠明茶<strong>景宁惠明茶</strong><strong>景宁惠明茶</strong><strong>景宁惠明茶</strong><strong>景宁惠明茶</strong></strong></p>\r\n<p style="text-align: justify;">牛奶绿茶是NOR SAR PY ROR的特色饮料，同时也最受到我们顾客的喜爱。</p>\r\n<p style="text-align: justify;">配有精致的装饰、宽敞的环境、免费使用无线网络、超过50多种的烘焙食品，特别是清爽的牛奶绿茶把NOR SAR PY ROR牛奶绿茶店推到顶部；目前我们在金边有5个分店。</p>\r\n<p style="text-align: justify;">牛奶绿茶是NOR SAR PY ROR的特色饮料，同时也最受到我们顾客的喜爱。</p>\r\n<p style="text-align: justify;">配有精致的装饰、宽敞的环境、免费使用无线网络、超过50多种的烘焙食品，特别是清爽的牛奶绿茶把NOR SAR PY ROR牛奶绿茶店推到顶部；目前我们在金边有5个分店。</p>\r\n<p style="text-align: justify;">牛奶绿茶是NOR SAR PY ROR的特色饮料，同时也最受到我们顾客的喜爱。</p>\r\n<p style="text-align: justify;">配有精致的装饰、宽敞的环境、免费使用无线网络、超过50多种的烘焙食品，特别是清爽的牛奶绿茶把NOR SAR PY ROR牛奶绿茶店推到顶部；目前我们在金边有5个分店。</p>\r\n<p style="text-align: justify;">牛奶绿茶是NOR SAR PY ROR的特色饮料，同时也最受到我们顾客的喜爱。</p>\r\n<p style="text-align: justify;">配有精致的装饰、宽敞的环境、免费使用无线网络、超过50多种的烘焙食品，特别是清爽的牛奶绿茶把NOR SAR PY ROR牛奶绿茶店推到顶部；目前我们在金边有5个分店。</p>', 3, 1);
/*!40000 ALTER TABLE `tearelated_languages` ENABLE KEYS */;


-- Dumping structure for table brand_tea_db.usergroup
DROP TABLE IF EXISTS `usergroup`;
CREATE TABLE IF NOT EXISTS `usergroup` (
  `usg_id` int(11) NOT NULL AUTO_INCREMENT,
  `usg_name` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `usg_description` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`usg_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table brand_tea_db.usergroup: ~2 rows (approximately)
DELETE FROM `usergroup`;
/*!40000 ALTER TABLE `usergroup` DISABLE KEYS */;
INSERT INTO `usergroup` (`usg_id`, `usg_name`, `usg_description`) VALUES
	(1, 'root', 'the supper administrator. this user can be no'),
	(2, 'admin', 'this user can be deleted. the role is after  ');
/*!40000 ALTER TABLE `usergroup` ENABLE KEYS */;


-- Dumping structure for table brand_tea_db.users
DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `use_id` int(11) NOT NULL AUTO_INCREMENT,
  `use_name` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `use_password` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `use_date_create` datetime DEFAULT NULL,
  `usg_id` int(11) NOT NULL,
  PRIMARY KEY (`use_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table brand_tea_db.users: ~0 rows (approximately)
DELETE FROM `users`;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` (`use_id`, `use_name`, `use_password`, `use_date_create`, `usg_id`) VALUES
	(1, 'root', '838a0d72e5c565a35fb17bbf22c349538ff0bb11', '2013-12-18 11:54:43', 1);
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
