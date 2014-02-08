/*
Navicat MySQL Data Transfer

Source Server         : localhost
Source Server Version : 50525
Source Host           : localhost:3306
Source Database       : brand_tea_db

Target Server Type    : MYSQL
Target Server Version : 50525
File Encoding         : 65001

Date: 2014-02-08 15:51:23
*/

SET FOREIGN_KEY_CHECKS=0;
-- ----------------------------
-- Table structure for `contact`
-- ----------------------------
DROP TABLE IF EXISTS `contact`;
CREATE TABLE `contact` (
  `con_id` int(10) NOT NULL AUTO_INCREMENT,
  `con_description` text NOT NULL,
  `con_status` smallint(6) NOT NULL,
  `lang_id` smallint(6) NOT NULL,
  PRIMARY KEY (`con_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of contact
-- ----------------------------
INSERT INTO contact VALUES ('1', '<h4 style=\"text-align: left;\">To understand well with our products contain Tea and others <br /> Please kindly contact to Mr. Huot Vong Botra via.</h4>\r\n<p>&nbsp;</p>\r\n<h4>Hi! The summer comes with a new TEA. This release features a polished UI, more usable with netbooks and other small devices. Task-oriented menu keeps the space at minimum. The new main window tab, \"todo\" brings to you the built-in calendar/organizer with a new menu related - \"Calendar\".</h4>\r\n<p>&nbsp;</p>\r\n<h4>Tel: 011/012/013 - 699 399</h4>\r\n<h4>Email: <a href=\"mailto:botra@qnbrandtea.com\">botra@qnbrandtea.com</a> / <a href=\"mailto:sale@qnbrandtea.com\">sale@qnbrandtea.com</a><br /> Website: <a href=\"http://www.qnbrandtea.com\">www.qnbrandtea.com</a></h4>', '1', '1');
