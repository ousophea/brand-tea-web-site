# --------------------------------------------------------
# Host:                         127.0.0.1
# Server version:               5.1.53-community-log
# Server OS:                    Win64
# HeidiSQL version:             6.0.0.3603
# Date/time:                    2014-05-19 14:19:57
# --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

# Dumping database structure for brand_tea_db
DROP DATABASE IF EXISTS `brand_tea_db`;
CREATE DATABASE IF NOT EXISTS `brand_tea_db` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `brand_tea_db`;


# Dumping structure for table brand_tea_db.categories
DROP TABLE IF EXISTS `categories`;
CREATE TABLE IF NOT EXISTS `categories` (
  `cate_id` int(11) NOT NULL AUTO_INCREMENT,
  `cate_name` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `cate_description` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `cate_fields` text COLLATE utf8_unicode_ci,
  `lang_id` smallint(6) NOT NULL,
  PRIMARY KEY (`cate_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

# Dumping data for table brand_tea_db.categories: ~4 rows (approximately)
/*!40000 ALTER TABLE `categories` DISABLE KEYS */;
INSERT INTO `categories` (`cate_id`, `cate_name`, `cate_description`, `cate_fields`, `lang_id`) VALUES
	(1, 'Tea', '', 'a:2:{s:5:"label";b:0;s:5:"field";b:0;}', 1),
	(2, 'Chai Tea', '', 'a:2:{s:5:"label";b:0;s:5:"field";b:0;}', 1),
	(3, 'Teaware', '', 'a:2:{s:5:"label";b:0;s:5:"field";b:0;}', 1),
	(4, 'Tea Caddies', '', 'a:2:{s:5:"label";b:0;s:5:"field";b:0;}', 1);
/*!40000 ALTER TABLE `categories` ENABLE KEYS */;


# Dumping structure for table brand_tea_db.category_languages
DROP TABLE IF EXISTS `category_languages`;
CREATE TABLE IF NOT EXISTS `category_languages` (
  `cal_id` int(11) NOT NULL AUTO_INCREMENT,
  `cate_id` int(11) NOT NULL,
  `lang_id` int(11) NOT NULL,
  `cate_name` varchar(250) NOT NULL,
  `cate_description` text NOT NULL,
  `cate_fields` text NOT NULL,
  PRIMARY KEY (`cal_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

# Dumping data for table brand_tea_db.category_languages: ~0 rows (approximately)
/*!40000 ALTER TABLE `category_languages` DISABLE KEYS */;
/*!40000 ALTER TABLE `category_languages` ENABLE KEYS */;


# Dumping structure for table brand_tea_db.contents
DROP TABLE IF EXISTS `contents`;
CREATE TABLE IF NOT EXISTS `contents` (
  `cont_id` int(11) NOT NULL AUTO_INCREMENT,
  `cont_name` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL,
  `cont_description` text COLLATE utf8_unicode_ci,
  `men_id` int(11) NOT NULL,
  `lang_id` smallint(11) NOT NULL,
  PRIMARY KEY (`cont_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

# Dumping data for table brand_tea_db.contents: ~4 rows (approximately)
/*!40000 ALTER TABLE `contents` DISABLE KEYS */;
INSERT INTO `contents` (`cont_id`, `cont_name`, `cont_description`, `men_id`, `lang_id`) VALUES
	(1, 'Welcome', '<h4>When looking to buy tea online, quality is going to be at the top of your list of priorities.</h4>\r\n<p>That is why we make it our priority, too. Drawing on several decades&rsquo; experience in the industry, we source exquisite, orthodox-produced teas from around the world.</p>\r\n<p>Our range includes green, black and white teas, oolong and infusions. Not to mention our selection of stylish caddies, and practical accessories.</p>', 1, 1),
	(2, 'About', '<p>About us</p>', 2, 1),
	(3, 'Contact', '<p>Catact ussdfjsdljf</p>', 3, 1),
	(4, 'Services', '<p>this is the sevices. En</p>', 4, 1);
/*!40000 ALTER TABLE `contents` ENABLE KEYS */;


# Dumping structure for table brand_tea_db.content_languages
DROP TABLE IF EXISTS `content_languages`;
CREATE TABLE IF NOT EXISTS `content_languages` (
  `col_id` int(11) NOT NULL AUTO_INCREMENT,
  `lang_id` int(11) NOT NULL,
  `cont_id` int(11) NOT NULL,
  `cont_name` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `cont_description` text COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`col_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

# Dumping data for table brand_tea_db.content_languages: 0 rows
/*!40000 ALTER TABLE `content_languages` DISABLE KEYS */;
/*!40000 ALTER TABLE `content_languages` ENABLE KEYS */;


# Dumping structure for table brand_tea_db.con_slideshow
DROP TABLE IF EXISTS `con_slideshow`;
CREATE TABLE IF NOT EXISTS `con_slideshow` (
  `Id` int(10) NOT NULL AUTO_INCREMENT,
  `con_id` int(10) DEFAULT NULL,
  `sli_id` int(10) DEFAULT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

# Dumping data for table brand_tea_db.con_slideshow: ~0 rows (approximately)
/*!40000 ALTER TABLE `con_slideshow` DISABLE KEYS */;
/*!40000 ALTER TABLE `con_slideshow` ENABLE KEYS */;


# Dumping structure for table brand_tea_db.groups
DROP TABLE IF EXISTS `groups`;
CREATE TABLE IF NOT EXISTS `groups` (
  `gro_id` int(11) NOT NULL AUTO_INCREMENT,
  `gro_name` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `gro_description` varchar(500) COLLATE utf8_unicode_ci DEFAULT NULL,
  `cate_id` int(11) DEFAULT NULL,
  `lang_id` smallint(6) NOT NULL,
  PRIMARY KEY (`gro_id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

# Dumping data for table brand_tea_db.groups: ~9 rows (approximately)
/*!40000 ALTER TABLE `groups` DISABLE KEYS */;
INSERT INTO `groups` (`gro_id`, `gro_name`, `gro_description`, `cate_id`, `lang_id`) VALUES
	(6, 'Black Tea', '', 1, 1),
	(7, 'White Tea', '', 1, 1),
	(8, 'Green Tea', '', 1, 1),
	(9, 'Glass Teapots', '', 3, 1),
	(10, 'Teapots', '', 3, 1),
	(11, 'Cast Iron Teapots', '', 3, 1),
	(12, 'Caddy plain - silver, blue, red ..', '', 4, 1),
	(13, 'Caddies with colours, patterns and embossing', '', 4, 1),
	(14, 'Seasonal Caddies', '', 4, 1);
/*!40000 ALTER TABLE `groups` ENABLE KEYS */;


# Dumping structure for table brand_tea_db.group_languages
DROP TABLE IF EXISTS `group_languages`;
CREATE TABLE IF NOT EXISTS `group_languages` (
  `grl_id` int(11) NOT NULL AUTO_INCREMENT,
  `lang_id` int(11) NOT NULL,
  `gro_id` int(11) NOT NULL,
  `gro_name` varchar(255) CHARACTER SET utf8 NOT NULL,
  `gro_description` text CHARACTER SET utf8 NOT NULL,
  PRIMARY KEY (`grl_id`)
) ENGINE=InnoDB DEFAULT CHARSET=gb2312 COLLATE=gb2312_bin;

# Dumping data for table brand_tea_db.group_languages: ~0 rows (approximately)
/*!40000 ALTER TABLE `group_languages` DISABLE KEYS */;
/*!40000 ALTER TABLE `group_languages` ENABLE KEYS */;


# Dumping structure for table brand_tea_db.languages
DROP TABLE IF EXISTS `languages`;
CREATE TABLE IF NOT EXISTS `languages` (
  `lang_id` smallint(6) NOT NULL AUTO_INCREMENT,
  `lang_name` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `lang_description` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`lang_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

# Dumping data for table brand_tea_db.languages: ~1 rows (approximately)
/*!40000 ALTER TABLE `languages` DISABLE KEYS */;
INSERT INTO `languages` (`lang_id`, `lang_name`, `lang_description`) VALUES
	(1, 'English', 'en');
/*!40000 ALTER TABLE `languages` ENABLE KEYS */;


# Dumping structure for table brand_tea_db.menus
DROP TABLE IF EXISTS `menus`;
CREATE TABLE IF NOT EXISTS `menus` (
  `men_id` int(11) NOT NULL AUTO_INCREMENT,
  `men_name` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `men_order` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `lang_id` smallint(6) NOT NULL,
  PRIMARY KEY (`men_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

# Dumping data for table brand_tea_db.menus: ~0 rows (approximately)
/*!40000 ALTER TABLE `menus` DISABLE KEYS */;
/*!40000 ALTER TABLE `menus` ENABLE KEYS */;


# Dumping structure for table brand_tea_db.photos
DROP TABLE IF EXISTS `photos`;
CREATE TABLE IF NOT EXISTS `photos` (
  `pho_id` int(11) NOT NULL AUTO_INCREMENT,
  `pho_url` text NOT NULL,
  `pho_des` text NOT NULL,
  `pro_id` int(11) NOT NULL,
  `pho_is_main_photo` int(11) NOT NULL,
  PRIMARY KEY (`pho_id`)
) ENGINE=InnoDB AUTO_INCREMENT=111 DEFAULT CHARSET=utf8;

# Dumping data for table brand_tea_db.photos: ~6 rows (approximately)
/*!40000 ALTER TABLE `photos` DISABLE KEYS */;
INSERT INTO `photos` (`pho_id`, `pho_url`, `pho_des`, `pro_id`, `pho_is_main_photo`) VALUES
	(105, 'Penguins1.jpg', '', 20, 0),
	(106, 'Lighthouse1.jpg', '', 20, 0),
	(107, 'chinese_sage_1.jpg', '', 21, 1),
	(108, 'chinese_sage_1_21.jpg', '', 21, 0),
	(109, '1386_2.jpg', '', 22, 1),
	(110, '3481.jpg', '', 22, 0);
/*!40000 ALTER TABLE `photos` ENABLE KEYS */;


# Dumping structure for table brand_tea_db.products
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
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

# Dumping data for table brand_tea_db.products: ~3 rows (approximately)
/*!40000 ALTER TABLE `products` DISABLE KEYS */;
INSERT INTO `products` (`pro_id`, `pro_name`, `pro_price`, `pro_qty`, `pro_fields`, `gro_id`, `lang_id`, `pro_related`, `pro_des`, `pro_knowledge_related`) VALUES
	(20, 'product 3', '2221', '2500', 'a:2:{s:5:"label";a:2:{i:0;s:4:"Free";i:1;s:7:"Benefit";}s:5:"field";a:2:{i:0;s:1:"1";i:1;s:4:"good";}}', 5, 1, 'a:2:{i:0;s:2:"18";i:1;s:2:"19";}', 'sdfdsf3333', ''),
	(21, 'Ronnefeldt Darjeeling 2013 First Flush Phugur', 'a:2:{s:5:"price";s:2:"10";s:9:"hide_show";s:4:"show";}', 'a:2:{s:3:"qty";s:3:"100";s:9:"hide_show";s:4:"show";}', 'a:3:{s:5:"label";b:0;s:5:"field";b:0;s:9:"hide_show";b:0;}', 6, 1, 'b:0;', '<div id="tabid1" style="display: block;">\r\n<div class="undertabs2">\r\n<div class="scroll">\r\n<div>\r\n<div>\r\n<p>Another perfect picking from the Organic Darjeeling garden Phuguri &ndash; wonderful flowery and fresh first flush with a golden cup.</p>\r\n<p>Just as you imagine a typical first spring harvest with a&nbsp;lovely sparkling with a highly aromatic scent.</p>\r\n<p>Amount of tea per cup : one level teaspoon.</p>\r\n<p>Brewing Time: 2 -3 min</p>\r\n</div>\r\n</div>\r\n</div>\r\n</div>\r\n</div>', 'b:0;'),
	(22, 'Ronnefeldt Assam Nahorhabi', 'a:2:{s:5:"price";s:2:"10";s:9:"hide_show";s:4:"show";}', 'a:2:{s:3:"qty";s:3:"100";s:9:"hide_show";s:4:"show";}', 'a:3:{s:5:"label";b:0;s:5:"field";b:0;s:9:"hide_show";b:0;}', 6, 1, 'b:0;', '<div id="tabid1" style="display: block;">\r\n<div class="undertabs2">\r\n<div class="scroll">\r\n<p>From one of the oldest tea gardens of India comes this soft, highly aromatic Assam, with pronounced malty caramel flavour. Fine dark leaf with golden tips; bright golden-brown cup colour.</p>\r\n<p>Brew one rounded teaspoonful per cup using boiling water for 3 - 4 minutes</p>\r\n</div>\r\n</div>\r\n</div>', 'b:0;');
/*!40000 ALTER TABLE `products` ENABLE KEYS */;


# Dumping structure for table brand_tea_db.product_languages
DROP TABLE IF EXISTS `product_languages`;
CREATE TABLE IF NOT EXISTS `product_languages` (
  `prl_id` int(11) NOT NULL AUTO_INCREMENT,
  `lang_id` int(11) NOT NULL,
  `pro_id` int(11) NOT NULL,
  `pro_name` varchar(250) NOT NULL,
  `pro_des` text NOT NULL,
  `pro_fields` text NOT NULL,
  PRIMARY KEY (`prl_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

# Dumping data for table brand_tea_db.product_languages: ~0 rows (approximately)
/*!40000 ALTER TABLE `product_languages` DISABLE KEYS */;
/*!40000 ALTER TABLE `product_languages` ENABLE KEYS */;


# Dumping structure for table brand_tea_db.services
DROP TABLE IF EXISTS `services`;
CREATE TABLE IF NOT EXISTS `services` (
  `ser_id` int(11) NOT NULL AUTO_INCREMENT,
  `ser_title` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ser_description` text COLLATE utf8_unicode_ci,
  `lang_id` smallint(6) NOT NULL,
  `ser_status` tinyint(1) NOT NULL,
  PRIMARY KEY (`ser_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=COMPACT;

# Dumping data for table brand_tea_db.services: ~1 rows (approximately)
/*!40000 ALTER TABLE `services` DISABLE KEYS */;
INSERT INTO `services` (`ser_id`, `ser_title`, `ser_description`, `lang_id`, `ser_status`) VALUES
	(3, 'service 1', '<p>this description ddd</p>', 1, 1);
/*!40000 ALTER TABLE `services` ENABLE KEYS */;


# Dumping structure for table brand_tea_db.services_languages
DROP TABLE IF EXISTS `services_languages`;
CREATE TABLE IF NOT EXISTS `services_languages` (
  `sel_id` int(11) NOT NULL AUTO_INCREMENT,
  `ser_id` int(11) NOT NULL,
  `ser_title` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `ser_description` text COLLATE utf8_unicode_ci NOT NULL,
  `lang_id` int(11) NOT NULL,
  `ser_status` tinyint(1) NOT NULL,
  PRIMARY KEY (`sel_id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=DYNAMIC;

# Dumping data for table brand_tea_db.services_languages: 0 rows
/*!40000 ALTER TABLE `services_languages` DISABLE KEYS */;
/*!40000 ALTER TABLE `services_languages` ENABLE KEYS */;


# Dumping structure for table brand_tea_db.slideshow
DROP TABLE IF EXISTS `slideshow`;
CREATE TABLE IF NOT EXISTS `slideshow` (
  `sli_id` int(10) NOT NULL AUTO_INCREMENT,
  `sli_image` varchar(300) NOT NULL,
  `sli_description` tinytext,
  `sli_cat_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`sli_id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

# Dumping data for table brand_tea_db.slideshow: ~8 rows (approximately)
/*!40000 ALTER TABLE `slideshow` DISABLE KEYS */;
INSERT INTO `slideshow` (`sli_id`, `sli_image`, `sli_description`, `sli_cat_id`) VALUES
	(1, 'slide1_green_teas_2014_spring_950x267.jpg', '', 1),
	(3, 'loose_leaf_oolong_teas_4_950x267.jpg', '', 1),
	(4, 'loose_leaf_green_teas_4_950x267.jpg', '', 2),
	(5, 'coupons_950x267.jpg', '', 4),
	(6, 'loose_leaf_pu_er_teas_4_950x267.jpg', '', 3),
	(7, 'loose_leaf_flower_teas_3_950x267.jpg', '', 2),
	(8, 'slide1_green_teas_2014_spring_950x267.jpg', '', 4),
	(9, '20140104030927_60822_950x267.jpg', '', 3);
/*!40000 ALTER TABLE `slideshow` ENABLE KEYS */;


# Dumping structure for table brand_tea_db.slideshow_languages
DROP TABLE IF EXISTS `slideshow_languages`;
CREATE TABLE IF NOT EXISTS `slideshow_languages` (
  `sll_id` int(10) NOT NULL AUTO_INCREMENT,
  `sli_id` int(10) DEFAULT NULL,
  `lang_id` int(10) DEFAULT NULL,
  `sli_description` text,
  PRIMARY KEY (`sll_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

# Dumping data for table brand_tea_db.slideshow_languages: ~0 rows (approximately)
/*!40000 ALTER TABLE `slideshow_languages` DISABLE KEYS */;
/*!40000 ALTER TABLE `slideshow_languages` ENABLE KEYS */;


# Dumping structure for table brand_tea_db.sli_categories
DROP TABLE IF EXISTS `sli_categories`;
CREATE TABLE IF NOT EXISTS `sli_categories` (
  `sli_cat_id` int(10) NOT NULL AUTO_INCREMENT,
  `sli_cat_name` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`sli_cat_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

# Dumping data for table brand_tea_db.sli_categories: ~5 rows (approximately)
/*!40000 ALTER TABLE `sli_categories` DISABLE KEYS */;
INSERT INTO `sli_categories` (`sli_cat_id`, `sli_cat_name`) VALUES
	(1, 'Home'),
	(2, 'About'),
	(3, 'Contact'),
	(4, 'Product'),
	(5, 'Service');
/*!40000 ALTER TABLE `sli_categories` ENABLE KEYS */;


# Dumping structure for table brand_tea_db.tearelated
DROP TABLE IF EXISTS `tearelated`;
CREATE TABLE IF NOT EXISTS `tearelated` (
  `tea_id` int(11) NOT NULL AUTO_INCREMENT,
  `tea_title` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `tea_description` text COLLATE utf8_unicode_ci,
  `lang_id` smallint(6) NOT NULL,
  `tea_status` smallint(11) NOT NULL,
  PRIMARY KEY (`tea_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

# Dumping data for table brand_tea_db.tearelated: ~2 rows (approximately)
/*!40000 ALTER TABLE `tearelated` DISABLE KEYS */;
INSERT INTO `tearelated` (`tea_id`, `tea_title`, `tea_description`, `lang_id`, `tea_status`) VALUES
	(2, 'Nutritional breakdown of green tea', '<p style="text-align: justify;">Green tea steeping time and temperature varies with different tea. The hottest steeping temperatures are 81 to 87&nbsp;&deg;C (178 to 189&nbsp;&deg;F) water and the longest steeping times two to three minutes. The coolest brewing temperatures are 61 to 69&nbsp;&deg;C (142 to 156&nbsp;&deg;F) and the shortest times about 30 seconds. In general, lower-quality green teas are steeped hotter and longer, whereas higher-quality teas are steeped cooler and shorter. Steeping green tea too hot or too long will result in a bitter, astringent brew, regardless of the initial quality. It is thought<sup class="noprint Inline-Template" style="white-space: nowrap;">[<em><a title="Wikipedia:Manual of Style/Words to watch" href="http://en.wikipedia.org/wiki/Wikipedia:Manual_of_Style/Words_to_watch#Unsupported_attributions"><span title="The material near this tag may use weasel words or too-vague attribution. (March 2013)">by whom?</span></a></em>]</sup> that excessively hot water results in <a class="mw-redirect" title="Tannins in tea" href="http://en.wikipedia.org/wiki/Tannins_in_tea">tannin</a> chemical release, which is especially problematic in green teas, as they have higher contents of these. High-quality green teas can be and usually are steeped multiple times; two or three steepings is typical. The steeping technique also plays a very important role in avoiding the tea developing an overcooked taste. The container in which the tea is steeped or teapot should also be warmed beforehand so that the tea does not immediately cool down. It is common practice for tea leaf to be left in the cup or pot and for hot water to be added as the tea is drunk until the flavor degrades.</p>\r\n<p style="text-align: justify;">Green tea steeping time and temperature varies with different tea. The hottest steeping temperatures are 81 to 87&nbsp;&deg;C (178 to 189&nbsp;&deg;F) water and the longest steeping times two to three minutes. The coolest brewing temperatures are 61 to 69&nbsp;&deg;C (142 to 156&nbsp;&deg;F) and the shortest times about 30 seconds. In general, lower-quality green teas are steeped hotter and longer, whereas higher-quality teas are steeped cooler and shorter. Steeping green tea too hot or too long will result in a bitter, astringent brew, regardless of the initial quality. It is thought<sup class="noprint Inline-Template" style="white-space: nowrap;">[<em><a title="Wikipedia:Manual of Style/Words to watch" href="http://en.wikipedia.org/wiki/Wikipedia:Manual_of_Style/Words_to_watch#Unsupported_attributions"><span title="The material near this tag may use weasel words or too-vague attribution. (March 2013)">by whom?</span></a></em>]</sup> that excessively hot water results in <a class="mw-redirect" title="Tannins in tea" href="http://en.wikipedia.org/wiki/Tannins_in_tea">tannin</a> chemical release, which is especially problematic in green teas, as they have higher contents of these. High-quality green teas can be and usually are steeped multiple times; two or three steepings is typical. The steeping technique also plays a very important role in avoiding the tea developing an overcooked taste. The container in which the tea is steeped or teapot should also be warmed beforehand so that the tea does not immediately cool down. It is common practice for tea leaf to be left in the cup or pot and for hot water to be added as the tea is drunk until the flavor degrades.</p>\r\n<p style="text-align: justify;">Green tea steeping time and temperature varies with different tea. The hottest steeping temperatures are 81 to 87&nbsp;&deg;C (178 to 189&nbsp;&deg;F) water and the longest steeping times two to three minutes. The coolest brewing temperatures are 61 to 69&nbsp;&deg;C (142 to 156&nbsp;&deg;F) and the shortest times about 30 seconds. In general, lower-quality green teas are steeped hotter and longer, whereas higher-quality teas are steeped cooler and shorter. Steeping green tea too hot or too long will result in a bitter, astringent brew, regardless of the initial quality. It is thought<sup class="noprint Inline-Template" style="white-space: nowrap;">[<em><a title="Wikipedia:Manual of Style/Words to watch" href="http://en.wikipedia.org/wiki/Wikipedia:Manual_of_Style/Words_to_watch#Unsupported_attributions"><span title="The material near this tag may use weasel words or too-vague attribution. (March 2013)">by whom?</span></a></em>]</sup> that excessively hot water results in <a class="mw-redirect" title="Tannins in tea" href="http://en.wikipedia.org/wiki/Tannins_in_tea">tannin</a> chemical release, which is especially problematic in green teas, as they have higher contents of these. High-quality green teas can be and usually are steeped multiple times; two or three steepings is typical. The steeping technique also plays a very important role in avoiding the tea developing an overcooked taste. The container in which the tea is steeped or teapot should also be warmed beforehand so that the tea does not immediately cool down. It is common practice for tea leaf to be left in the cup or pot and for hot water to be added as the tea is drunk until the flavor degrades.</p>', 1, 1),
	(3, 'How to boil in a good?', '<p>The antioxidants and other properties of green tea appear to protect against cellular damage and cancerous tumour growth. In one study at the University of Texas, green-tea extract was given to patients with precancerous lesions in their mouths, and <strong>it slowed the progression to oral cancer</strong>. Animal studies have also found that tea compounds can inhibit cancer growth.</p>\r\n<h3><span style="color: #33cccc;">5. Better breath</span></h3>\r\n<p>Green tea has been associated with better-smelling breath. Why? Likely because it <strong>kills the microbes that make our mouths stinky.</strong> The University of British Columbia&rsquo;s <a href="http://www.dentistry.ubc.ca/" target="_blank">Faculty of Dentistry</a> measured the level of smelly compounds in people&rsquo;s mouths after they were given green-tea powder or another substance that supposedly helps with <a href="http://www.besthealthmag.ca/get-healthy/oral-health/top-10-causes-of-bad-breath">bad breath</a>. <strong>Green tea outperformed mints, chewing gum and even parsley-seed oil in this study.</strong></p>\r\n<h3><span style="color: #33cccc;">Tips for drinking green tea</span></h3>\r\n<p>Want your daily diet to include more greens &ndash; green tea, that is? It&rsquo;s likely safe to consume up to five cups a day of the stuff. But to get the maximum health and flavour benefits, make sure you <strong>prep your tea properly</strong>. Prepare a ceramic teapot by warming it with hot water. For the tea, use fresh, cold water, filtered or from a spring, if possible, instead of the tap. After bringing the water to a boil, let it cool for three minutes. Then pour it over tea leaves or a teabag and let it steep, covered, for three more minutes.</p>\r\n<p>Think your teeth are set because you&rsquo;re already drinking black tea? Keep in mind that since black tea is more processed, it contains less antioxidants and beneficial plant chemical compounds than green tea. Black tea is also two to three times higher in caffeine, so it&rsquo;s more likely to cause side effects such as nervousness and sleep disturbances. Caffeine can also interfere with some medications &ndash; ask your doctor or pharmacist.</p>\r\n<p>If you&rsquo;re not a tea drinker, <strong>try oral care products that contain green tea</strong>, such as toothpaste and mouthwash (look for these at natural health stores). You can even chew gum or suck on candies made with green tea (as long as they&rsquo;re sugarless!). But if you do enjoy tea, it makes sense to reach for green the next time you&rsquo;re turning on the kettle</p>', 1, 1);
/*!40000 ALTER TABLE `tearelated` ENABLE KEYS */;


# Dumping structure for table brand_tea_db.tearelated_languages
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

# Dumping data for table brand_tea_db.tearelated_languages: 4 rows
/*!40000 ALTER TABLE `tearelated_languages` DISABLE KEYS */;
INSERT INTO `tearelated_languages` (`teal_id`, `tea_id`, `tea_title`, `tea_description`, `lang_id`, `tea_status`) VALUES
	(3, 2, '信阳毛尖 Xin Yang Mao Jian', '<p><strong>景宁惠明茶</strong><strong>​ 景宁惠明茶 </strong><strong>景宁惠明茶<strong>景宁惠明茶</strong><strong>景宁惠明茶</strong><strong>景宁惠明茶</strong><strong>景宁惠明茶</strong></strong></p>\r\n<p style="text-align: justify;">牛奶绿茶是NOR SAR PY ROR的特色饮料，同时也最受到我们顾客的喜爱。</p>\r\n<p style="text-align: justify;">配有精致的装饰、宽敞的环境、免费使用无线网络、超过50多种的烘焙食品，特别是清爽的牛奶绿茶把NOR SAR PY ROR牛奶绿茶店推到顶部；目前我们在金边有5个分店。</p>\r\n<p style="text-align: justify;">牛奶绿茶是NOR SAR PY ROR的特色饮料，同时也最受到我们顾客的喜爱。</p>\r\n<p style="text-align: justify;">配有精致的装饰、宽敞的环境、免费使用无线网络、超过50多种的烘焙食品，特别是清爽的牛奶绿茶把NOR SAR PY ROR牛奶绿茶店推到顶部；目前我们在金边有5个分店。</p>\r\n<p style="text-align: justify;">牛奶绿茶是NOR SAR PY ROR的特色饮料，同时也最受到我们顾客的喜爱。</p>\r\n<p style="text-align: justify;">配有精致的装饰、宽敞的环境、免费使用无线网络、超过50多种的烘焙食品，特别是清爽的牛奶绿茶把NOR SAR PY ROR牛奶绿茶店推到顶部；目前我们在金边有5个分店。</p>\r\n<p style="text-align: justify;">牛奶绿茶是NOR SAR PY ROR的特色饮料，同时也最受到我们顾客的喜爱。</p>\r\n<p style="text-align: justify;">配有精致的装饰、宽敞的环境、免费使用无线网络、超过50多种的烘焙食品，特别是清爽的牛奶绿茶把NOR SAR PY ROR牛奶绿茶店推到顶部；目前我们在金边有5个分店。</p>', 3, 1),
	(4, 2, 'ពិធីសាស្រ្ដស្ងោរតែ', '<p>តែ​បៃតង​ទឹកដោះគោ គឺជា​ភេសជ្ជៈ​មួយ​មុខ​ដែល​ទទួល​ការគាំទ្រ​យ៉ាងច្រើន​ពី​សំណាក់​អតិថិជន និង ជា​ភេសជ្ជៈ​ប្រចាំត្រកូល​របស់​ហាង <strong><span class="medium">ន</span>ស​២​រ</strong> - ហាង​តែ​បៃតង​ទឹកដោះគោ​។​</p>\r\n<p>​គួប​ផ្សំ និង ការតុបតែង​ហាង​យ៉ាង​ល្អ​ប្រណិត មាន​ទីធ្លា​ធំ​ទូលាយ​, មាន​នំ​ប្រមាណ​ជាង ៥០​ប្រភេទ​, ប្រើប្រាស់​អ៊ិន​ធឺ​ណែ​ត ដោយ​ឥតគិតថ្លៃ និង ជាពិសេស​គឺ ភេសជ្ជៈ​តែ​បៃតង​ដែល​មានឱជារស ឈ្ងុយឆ្ងាញ់ ពុំ​អាច​បំភ្លេចបាន ទើបបានជា <strong><span class="medium">ន</span>ស​២​រ</strong> - ហាង​តែ​បៃតង​ទឹកដោះគោ គឺជា​ហាង​ដែល​ឈានមុខ និង មានឈ្មោះ​ល្បី​តែមួយគត់ ព្រមទាំង​មាន​សាខា ៥ កន្លែង សុទ្ធតែ​ស្ថិត​នៅក្នុង​តំបន់​ទីប្រជុំជន នៃ​រាជធានី​ភ្នំពេញ​។​</p>\r\n<p>តែ​បៃតង​ទឹកដោះគោ គឺជា​ភេសជ្ជៈ​មួយ​មុខ​ដែល​ទទួល​ការគាំទ្រ​យ៉ាងច្រើន​ពី​សំណាក់​អតិថិជន និង ជា​ភេសជ្ជៈ​ប្រចាំត្រកូល​របស់​ហាង <strong><span class="medium">ន</span>ស​២​រ</strong> - ហាង​តែ​បៃតង​ទឹកដោះគោ​។​</p>\r\n<p>​គួប​ផ្សំ និង ការតុបតែង​ហាង​យ៉ាង​ល្អ​ប្រណិត មាន​ទីធ្លា​ធំ​ទូលាយ​, មាន​នំ​ប្រមាណ​ជាង ៥០​ប្រភេទ​, ប្រើប្រាស់​អ៊ិន​ធឺ​ណែ​ត ដោយ​ឥតគិតថ្លៃ និង ជាពិសេស​គឺ ភេសជ្ជៈ​តែ​បៃតង​ដែល​មានឱជារស ឈ្ងុយឆ្ងាញ់ ពុំ​អាច​បំភ្លេចបាន ទើបបានជា <strong><span class="medium">ន</span>ស​២​រ</strong> - ហាង​តែ​បៃតង​ទឹកដោះគោ គឺជា​ហាង​ដែល​ឈានមុខ និង មានឈ្មោះ​ល្បី​តែមួយគត់ ព្រមទាំង​មាន​សាខា ៥ កន្លែង សុទ្ធតែ​ស្ថិត​នៅក្នុង​តំបន់​ទីប្រជុំជន នៃ​រាជធានី​ភ្នំពេញ​។​</p>\r\n<p>តែ​បៃតង​ទឹកដោះគោ គឺជា​ភេសជ្ជៈ​មួយ​មុខ​ដែល​ទទួល​ការគាំទ្រ​យ៉ាងច្រើន​ពី​សំណាក់​អតិថិជន និង ជា​ភេសជ្ជៈ​ប្រចាំត្រកូល​របស់​ហាង <strong><span class="medium">ន</span>ស​២​រ</strong> - ហាង​តែ​បៃតង​ទឹកដោះគោ​។​</p>\r\n<p>​គួប​ផ្សំ និង ការតុបតែង​ហាង​យ៉ាង​ល្អ​ប្រណិត មាន​ទីធ្លា​ធំ​ទូលាយ​, មាន​នំ​ប្រមាណ​ជាង ៥០​ប្រភេទ​, ប្រើប្រាស់​អ៊ិន​ធឺ​ណែ​ត ដោយ​ឥតគិតថ្លៃ និង ជាពិសេស​គឺ ភេសជ្ជៈ​តែ​បៃតង​ដែល​មានឱជារស ឈ្ងុយឆ្ងាញ់ ពុំ​អាច​បំភ្លេចបាន ទើបបានជា <strong><span class="medium">ន</span>ស​២​រ</strong> - ហាង​តែ​បៃតង​ទឹកដោះគោ គឺជា​ហាង​ដែល​ឈានមុខ និង មានឈ្មោះ​ល្បី​តែមួយគត់ ព្រមទាំង​មាន​សាខា ៥ កន្លែង សុទ្ធតែ​ស្ថិត​នៅក្នុង​តំបន់​ទីប្រជុំជន នៃ​រាជធានី​ភ្នំពេញ​។​</p>\r\n<p>តែ​បៃតង​ទឹកដោះគោ គឺជា​ភេសជ្ជៈ​មួយ​មុខ​ដែល​ទទួល​ការគាំទ្រ​យ៉ាងច្រើន​ពី​សំណាក់​អតិថិជន និង ជា​ភេសជ្ជៈ​ប្រចាំត្រកូល​របស់​ហាង <strong><span class="medium">ន</span>ស​២​រ</strong> - ហាង​តែ​បៃតង​ទឹកដោះគោ​។​</p>\r\n<p>​គួប​ផ្សំ និង ការតុបតែង​ហាង​យ៉ាង​ល្អ​ប្រណិត មាន​ទីធ្លា​ធំ​ទូលាយ​, មាន​នំ​ប្រមាណ​ជាង ៥០​ប្រភេទ​, ប្រើប្រាស់​អ៊ិន​ធឺ​ណែ​ត ដោយ​ឥតគិតថ្លៃ និង ជាពិសេស​គឺ ភេសជ្ជៈ​តែ​បៃតង​ដែល​មានឱជារស ឈ្ងុយឆ្ងាញ់ ពុំ​អាច​បំភ្លេចបាន ទើបបានជា <strong><span class="medium">ន</span>ស​២​រ</strong> - ហាង​តែ​បៃតង​ទឹកដោះគោ គឺជា​ហាង​ដែល​ឈានមុខ និង មានឈ្មោះ​ល្បី​តែមួយគត់ ព្រមទាំង​មាន​សាខា ៥ កន្លែង សុទ្ធតែ​ស្ថិត​នៅក្នុង​តំបន់​ទីប្រជុំជន នៃ​រាជធានី​ភ្នំពេញ​។​</p>\r\n<p>តែ​បៃតង​ទឹកដោះគោ គឺជា​ភេសជ្ជៈ​មួយ​មុខ​ដែល​ទទួល​ការគាំទ្រ​យ៉ាងច្រើន​ពី​សំណាក់​អតិថិជន និង ជា​ភេសជ្ជៈ​ប្រចាំត្រកូល​របស់​ហាង <strong><span class="medium">ន</span>ស​២​រ</strong> - ហាង​តែ​បៃតង​ទឹកដោះគោ​។​</p>\r\n<p>​គួប​ផ្សំ និង ការតុបតែង​ហាង​យ៉ាង​ល្អ​ប្រណិត មាន​ទីធ្លា​ធំ​ទូលាយ​, មាន​នំ​ប្រមាណ​ជាង ៥០​ប្រភេទ​, ប្រើប្រាស់​អ៊ិន​ធឺ​ណែ​ត ដោយ​ឥតគិតថ្លៃ និង ជាពិសេស​គឺ ភេសជ្ជៈ​តែ​បៃតង​ដែល​មានឱជារស ឈ្ងុយឆ្ងាញ់ ពុំ​អាច​បំភ្លេចបាន ទើបបានជា <strong><span class="medium">ន</span>ស​២​រ</strong> - ហាង​តែ​បៃតង​ទឹកដោះគោ គឺជា​ហាង​ដែល​ឈានមុខ និង មានឈ្មោះ​ល្បី​តែមួយគត់ ព្រមទាំង​មាន​សាខា ៥ កន្លែង សុទ្ធតែ​ស្ថិត​នៅក្នុង​តំបន់​ទីប្រជុំជន <strong><em>នៃ​រាជធានី​ភ្នំពេញ​។​</em></strong></p>', 2, 1),
	(5, 3, 'តែល្អដើម្បីសុខភាព', '<p>តែ​បៃតង​ទឹកដោះគោ គឺជា​ភេសជ្ជៈ​មួយ​មុខ​ដែល​ទទួល​ការគាំទ្រ​យ៉ាងច្រើន​ពី​សំណាក់​អតិថិជន និង ជា​ភេសជ្ជៈ​ប្រចាំត្រកូល​របស់​ហាង <strong><span class="medium">ន</span>ស​២​រ</strong> - ហាង​តែ​បៃតង​ទឹកដោះគោ​។​</p>\r\n<p>​ គួប​ផ្សំ និង ការតុបតែង​ហាង​យ៉ាង​ល្អ​ប្រណិត មាន​ទីធ្លា​ធំ​ទូលាយ​, មាន​នំ​ប្រមាណ​ជាង ៥០​ប្រភេទ​, ប្រើប្រាស់​អ៊ិន​ធឺ​ណែ​ត ដោយ​ឥតគិតថ្លៃ និង ជាពិសេស​គឺ ភេសជ្ជៈ​តែ​បៃតង​ដែល​មានឱជារស ឈ្ងុយឆ្ងាញ់ ពុំ​អាច​បំភ្លេចបាន ទើបបានជា <strong><span class="medium">ន</span>ស​២​រ</strong> - ហាង​តែ​បៃតង​ទឹកដោះគោ គឺជា​ហាង​ដែល​ឈានមុខ និង មានឈ្មោះ​ល្បី​តែមួយគត់ ព្រមទាំង​មាន​សាខា ៥ កន្លែង សុទ្ធតែ​ស្ថិត​នៅក្នុង​តំបន់​ទីប្រជុំជន នៃ​រាជធានី​ភ្នំពេញ​។​</p>\r\n<p>តែ​បៃតង​ទឹកដោះគោ គឺជា​ភេសជ្ជៈ​មួយ​មុខ​ដែល​ទទួល​ការគាំទ្រ​យ៉ាងច្រើន​ពី​សំណាក់​អតិថិជន និង ជា​ភេសជ្ជៈ​ប្រចាំត្រកូល​របស់​ហាង <strong><span class="medium">ន</span>ស​២​រ</strong> - ហាង​តែ​បៃតង​ទឹកដោះគោ​។​</p>\r\n<p>​ គួប​ផ្សំ និង ការតុបតែង​ហាង​យ៉ាង​ល្អ​ប្រណិត មាន​ទីធ្លា​ធំ​ទូលាយ​, មាន​នំ​ប្រមាណ​ជាង ៥០​ប្រភេទ​, ប្រើប្រាស់​អ៊ិន​ធឺ​ណែ​ត ដោយ​ឥតគិតថ្លៃ និង ជាពិសេស​គឺ ភេសជ្ជៈ​តែ​បៃតង​ដែល​មានឱជារស ឈ្ងុយឆ្ងាញ់ ពុំ​អាច​បំភ្លេចបាន ទើបបានជា <strong><span class="medium">ន</span>ស​២​រ</strong> - ហាង​តែ​បៃតង​ទឹកដោះគោ គឺជា​ហាង​ដែល​ឈានមុខ និង មានឈ្មោះ​ល្បី​តែមួយគត់ ព្រមទាំង​មាន​សាខា ៥ កន្លែង សុទ្ធតែ​ស្ថិត​នៅក្នុង​តំបន់​ទីប្រជុំជន នៃ​រាជធានី​ភ្នំពេញ​។​</p>\r\n<p>តែ​បៃតង​ទឹកដោះគោ គឺជា​ភេសជ្ជៈ​មួយ​មុខ​ដែល​ទទួល​ការគាំទ្រ​យ៉ាងច្រើន​ពី​សំណាក់​អតិថិជន និង ជា​ភេសជ្ជៈ​ប្រចាំត្រកូល​របស់​ហាង <strong><span class="medium">ន</span>ស​២​រ</strong> - ហាង​តែ​បៃតង​ទឹកដោះគោ​។​</p>\r\n<p>​ គួប​ផ្សំ និង ការតុបតែង​ហាង​យ៉ាង​ល្អ​ប្រណិត មាន​ទីធ្លា​ធំ​ទូលាយ​, មាន​នំ​ប្រមាណ​ជាង ៥០​ប្រភេទ​, ប្រើប្រាស់​អ៊ិន​ធឺ​ណែ​ត ដោយ​ឥតគិតថ្លៃ និង ជាពិសេស​គឺ ភេសជ្ជៈ​តែ​បៃតង​ដែល​មានឱជារស ឈ្ងុយឆ្ងាញ់ ពុំ​អាច​បំភ្លេចបាន ទើបបានជា <strong><span class="medium">ន</span>ស​២​រ</strong> - ហាង​តែ​បៃតង​ទឹកដោះគោ គឺជា​ហាង​ដែល​ឈានមុខ និង មានឈ្មោះ​ល្បី​តែមួយគត់ ព្រមទាំង​មាន​សាខា ៥ កន្លែង សុទ្ធតែ​ស្ថិត​នៅក្នុង​តំបន់​ទីប្រជុំជន នៃ​រាជធានី​ភ្នំពេញ​។​</p>\r\n<p>តែ​បៃតង​ទឹកដោះគោ គឺជា​ភេសជ្ជៈ​មួយ​មុខ​ដែល​ទទួល​ការគាំទ្រ​យ៉ាងច្រើន​ពី​សំណាក់​អតិថិជន និង ជា​ភេសជ្ជៈ​ប្រចាំត្រកូល​របស់​ហាង <strong><span class="medium">ន</span>ស​២​រ</strong> - ហាង​តែ​បៃតង​ទឹកដោះគោ​។​</p>\r\n<p>​ គួប​ផ្សំ និង ការតុបតែង​ហាង​យ៉ាង​ល្អ​ប្រណិត មាន​ទីធ្លា​ធំ​ទូលាយ​, មាន​នំ​ប្រមាណ​ជាង ៥០​ប្រភេទ​, ប្រើប្រាស់​អ៊ិន​ធឺ​ណែ​ត ដោយ​ឥតគិតថ្លៃ និង ជាពិសេស​គឺ ភេសជ្ជៈ​តែ​បៃតង​ដែល​មានឱជារស ឈ្ងុយឆ្ងាញ់ ពុំ​អាច​បំភ្លេចបាន ទើបបានជា <strong><span class="medium">ន</span>ស​២​រ</strong> - ហាង​តែ​បៃតង​ទឹកដោះគោ គឺជា​ហាង​ដែល​ឈានមុខ និង មានឈ្មោះ​ល្បី​តែមួយគត់ ព្រមទាំង​មាន​សាខា ៥ កន្លែង សុទ្ធតែ​ស្ថិត​នៅក្នុង​តំបន់​ទីប្រជុំជន នៃ​រាជធានី​ភ្នំពេញ​។​</p>\r\n<p>តែ​បៃតង​ទឹកដោះគោ គឺជា​ភេសជ្ជៈ​មួយ​មុខ​ដែល​ទទួល​ការគាំទ្រ​យ៉ាងច្រើន​ពី​សំណាក់​អតិថិជន និង ជា​ភេសជ្ជៈ​ប្រចាំត្រកូល​របស់​ហាង <strong><span class="medium">ន</span>ស​២​រ</strong> - ហាង​តែ​បៃតង​ទឹកដោះគោ​។​</p>\r\n<p>​ គួប​ផ្សំ និង ការតុបតែង​ហាង​យ៉ាង​ល្អ​ប្រណិត មាន​ទីធ្លា​ធំ​ទូលាយ​, មាន​នំ​ប្រមាណ​ជាង ៥០​ប្រភេទ​, ប្រើប្រាស់​អ៊ិន​ធឺ​ណែ​ត ដោយ​ឥតគិតថ្លៃ និង ជាពិសេស​គឺ ភេសជ្ជៈ​តែ​បៃតង​ដែល​មានឱជារស ឈ្ងុយឆ្ងាញ់ ពុំ​អាច​បំភ្លេចបាន ទើបបានជា <strong><span class="medium">ន</span>ស​២​រ</strong> - ហាង​តែ​បៃតង​ទឹកដោះគោ គឺជា​ហាង​ដែល​ឈានមុខ និង មានឈ្មោះ​ល្បី​តែមួយគត់ ព្រមទាំង​មាន​សាខា ៥ កន្លែង សុទ្ធតែ​ស្ថិត​នៅក្នុង​តំបន់​ទីប្រជុំជន <strong><em>នៃ​រាជធានី​ភ្នំពេញ​។​</em></strong></p>', 2, 1),
	(6, 3, '景宁惠明茶景宁惠明茶景宁惠明茶景宁惠明茶', '<p><strong>景宁惠明茶</strong><strong>​ 景宁惠明茶 </strong><strong>景宁惠明茶<strong>景宁惠明茶</strong><strong>景宁惠明茶</strong><strong>景宁惠明茶</strong><strong>景宁惠明茶</strong></strong></p>\r\n<p style="text-align: justify;">牛奶绿茶是NOR SAR PY ROR的特色饮料，同时也最受到我们顾客的喜爱。</p>\r\n<p style="text-align: justify;">配有精致的装饰、宽敞的环境、免费使用无线网络、超过50多种的烘焙食品，特别是清爽的牛奶绿茶把NOR SAR PY ROR牛奶绿茶店推到顶部；目前我们在金边有5个分店。</p>\r\n<p style="text-align: justify;">牛奶绿茶是NOR SAR PY ROR的特色饮料，同时也最受到我们顾客的喜爱。</p>\r\n<p style="text-align: justify;">配有精致的装饰、宽敞的环境、免费使用无线网络、超过50多种的烘焙食品，特别是清爽的牛奶绿茶把NOR SAR PY ROR牛奶绿茶店推到顶部；目前我们在金边有5个分店。</p>\r\n<p style="text-align: justify;">牛奶绿茶是NOR SAR PY ROR的特色饮料，同时也最受到我们顾客的喜爱。</p>\r\n<p style="text-align: justify;">配有精致的装饰、宽敞的环境、免费使用无线网络、超过50多种的烘焙食品，特别是清爽的牛奶绿茶把NOR SAR PY ROR牛奶绿茶店推到顶部；目前我们在金边有5个分店。</p>\r\n<p style="text-align: justify;">牛奶绿茶是NOR SAR PY ROR的特色饮料，同时也最受到我们顾客的喜爱。</p>\r\n<p style="text-align: justify;">配有精致的装饰、宽敞的环境、免费使用无线网络、超过50多种的烘焙食品，特别是清爽的牛奶绿茶把NOR SAR PY ROR牛奶绿茶店推到顶部；目前我们在金边有5个分店。</p>\r\n<p><strong>景宁惠明茶</strong><strong>​ 景宁惠明茶 </strong><strong>景宁惠明茶<strong>景宁惠明茶</strong><strong>景宁惠明茶</strong><strong>景宁惠明茶</strong><strong>景宁惠明茶</strong></strong></p>\r\n<p style="text-align: justify;">牛奶绿茶是NOR SAR PY ROR的特色饮料，同时也最受到我们顾客的喜爱。</p>\r\n<p style="text-align: justify;">配有精致的装饰、宽敞的环境、免费使用无线网络、超过50多种的烘焙食品，特别是清爽的牛奶绿茶把NOR SAR PY ROR牛奶绿茶店推到顶部；目前我们在金边有5个分店。</p>\r\n<p style="text-align: justify;">牛奶绿茶是NOR SAR PY ROR的特色饮料，同时也最受到我们顾客的喜爱。</p>\r\n<p style="text-align: justify;">配有精致的装饰、宽敞的环境、免费使用无线网络、超过50多种的烘焙食品，特别是清爽的牛奶绿茶把NOR SAR PY ROR牛奶绿茶店推到顶部；目前我们在金边有5个分店。</p>\r\n<p style="text-align: justify;">牛奶绿茶是NOR SAR PY ROR的特色饮料，同时也最受到我们顾客的喜爱。</p>\r\n<p style="text-align: justify;">配有精致的装饰、宽敞的环境、免费使用无线网络、超过50多种的烘焙食品，特别是清爽的牛奶绿茶把NOR SAR PY ROR牛奶绿茶店推到顶部；目前我们在金边有5个分店。</p>\r\n<p style="text-align: justify;">牛奶绿茶是NOR SAR PY ROR的特色饮料，同时也最受到我们顾客的喜爱。</p>\r\n<p style="text-align: justify;">配有精致的装饰、宽敞的环境、免费使用无线网络、超过50多种的烘焙食品，特别是清爽的牛奶绿茶把NOR SAR PY ROR牛奶绿茶店推到顶部；目前我们在金边有5个分店。</p>', 3, 1);
/*!40000 ALTER TABLE `tearelated_languages` ENABLE KEYS */;


# Dumping structure for table brand_tea_db.usergroup
DROP TABLE IF EXISTS `usergroup`;
CREATE TABLE IF NOT EXISTS `usergroup` (
  `usg_id` int(11) NOT NULL AUTO_INCREMENT,
  `usg_name` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `usg_description` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`usg_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

# Dumping data for table brand_tea_db.usergroup: ~2 rows (approximately)
/*!40000 ALTER TABLE `usergroup` DISABLE KEYS */;
INSERT INTO `usergroup` (`usg_id`, `usg_name`, `usg_description`) VALUES
	(1, 'root', 'the supper administrator. this user can be no'),
	(2, 'admin', 'this user can be deleted. the role is after  ');
/*!40000 ALTER TABLE `usergroup` ENABLE KEYS */;


# Dumping structure for table brand_tea_db.users
DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `use_id` int(11) NOT NULL AUTO_INCREMENT,
  `use_name` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `use_password` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `use_date_create` datetime DEFAULT NULL,
  `usg_id` int(11) NOT NULL,
  PRIMARY KEY (`use_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

# Dumping data for table brand_tea_db.users: ~1 rows (approximately)
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` (`use_id`, `use_name`, `use_password`, `use_date_create`, `usg_id`) VALUES
	(1, 'root', '838a0d72e5c565a35fb17bbf22c349538ff0bb11', '2013-12-18 11:54:43', 1);
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
