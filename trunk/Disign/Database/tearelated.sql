/*
Navicat MySQL Data Transfer

Source Server         : localhost
Source Server Version : 50525
Source Host           : localhost:3306
Source Database       : brand_tea_db

Target Server Type    : MYSQL
Target Server Version : 50525
File Encoding         : 65001

Date: 2014-01-05 10:41:36
*/

SET FOREIGN_KEY_CHECKS=0;
-- ----------------------------
-- Table structure for `tearelated`
-- ----------------------------
DROP TABLE IF EXISTS `tearelated`;
CREATE TABLE `tearelated` (
  `tea_id` int(11) NOT NULL AUTO_INCREMENT,
  `tea_title` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `tea_description` text COLLATE utf8_unicode_ci,
  `lang_id` smallint(6) NOT NULL,
  `tea_status` smallint(11) NOT NULL,
  PRIMARY KEY (`tea_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of tearelated
-- ----------------------------
INSERT INTO tearelated VALUES ('3', 'Herbal tea', '<p><span style=\"font-size: 14px; font-family: Arial;\">Herbal tea has been widely-used in China from ancient time to till, for its good health benefits and balance the whole body system in traditional Chinese medicine.&nbsp;</span></p>\r\n<p><span style=\"font-size: 14px; font-family: Arial;\">JK offers different types of <strong>traditional, natural-growing herbal teas</strong>, which has been long used in China, and frequently consumed by domestic people. Herbal tea is made from best ingredients that&rsquo;s why it has many health benefits.</span></p>\r\n<p><span style=\"font-size: 14px; font-family: Arial;\">Our Herbal Tea Benefits:</span></p>\r\n<ul style=\"font-size: 16px; font-family: Arial;\">\r\n<li><span style=\"font-family: Arial; font-size: 14px;\">&bull; Best source of antioxidants and vitamins.</span></li>\r\n<li><span style=\"font-family: Arial; font-size: 14px;\">&bull; Caffeine-free</span></li>\r\n<li><span style=\"font-family: Arial; font-size: 14px;\">&bull; Herbal infusions combine with different teas for advanced flavor and benefits</span></li>\r\n</ul>', '2', '1');
INSERT INTO tearelated VALUES ('4', 'How to boil in a good?', '<p><span style=\"font-family: Arial; font-size: 14px;\"><span style=\"color: #006600;\">Our Huo Shan</span> Huang Ya is from the Bai Ma Jiang peak in Da Bie Shan mountain in Huoshan county, Anhui province, which its peak elevation is 1774 meters high. Well-selectly one bud with one leaf/two leaves picking standard, our traditional Huo Shan Huang Ya enjoys very sweet and thick taste with good floral aroma. Unlike green tea, yellow tea focuses more on the tea taste; that is why <strong>yellow tea</strong> has sweeter &amp; thicker taste than green tea, but not its aroma. </span></p>\r\n<p><span style=\"font-family: Arial; font-size: 14px;\">Huo Shan Huang Ya green tea is one of the famous yellow tea from Anhui province, China.&nbsp; Thought its traditional making process in ancient time is lost, it is re-discovered by the Chinese tea experts based on the records in tea books &amp; history books in 1970s. </span></p>\r\n<p><span style=\"font-family: Arial; font-size: 14px;\">Also unlike the other several types of yellow tea, such as Jun Shan Yin Zhen &amp; Meng Ding Hua Ya, Huo Shan Huang Ya has its own unique &amp; special oxidated(yellowed process), whose yellowed process must be conducted three times during the whole making process.&nbsp; So that is why Huo Shan Huang Ya\'s taste &amp; apperance also different from Jun Shan Yin Zhen &amp; Meng Ding Hua Ya. </span></p>', '2', '1');
INSERT INTO tearelated VALUES ('5', 'Wholesale Tea Shop', '<p><span style=\"font-family: \'times new roman\',times;\"><span style=\"font-size: small;\"><span style=\"font-size: 14px; font-family: Arial;\">1.Thank you for your interest in being our wholesale partners in overseas. JK tea Co is able to offer you all different grades Chinese tea and tea wares at the most competitive price directly from tea farmers or teaware factories. We would like to cooperate with overseas tea distributors, retailers to promote Chinese teas, tea cultures, and healthy life-styles. We welcome the opportunity to work with you and enjoy the fun of tea business.</span></span></span></p>\r\n<p><span style=\"font-size: small; font-family: \'times new roman\',times;\"><span style=\"font-size: small;\"><span style=\"font-size: 14px; font-family: Arial;\">If you are interested in our tea wholesale business, pls send us an email with your full company\'s introduction, including company\'s name, website and so on. Our sales representative will contact you upon receiving your application within one working. Our email a</span></span></span></p>\r\n<p><span style=\"font-size: small;\"><span style=\"font-family: arial,helvetica,sans-serif;\">Currently we are looking the exclusive agents in North America, Russian areas. Pls feel free to contact us if you are interested. Then we will send our exclusive agreement for you to check &amp; discuss. <br /></span></span></p>', '2', '1');
