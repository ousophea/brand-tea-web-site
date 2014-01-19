/*
Navicat MySQL Data Transfer

Source Server         : localhost
Source Server Version : 50525
Source Host           : localhost:3306
Source Database       : brand_tea_db

Target Server Type    : MYSQL
Target Server Version : 50525
File Encoding         : 65001

Date: 2014-01-19 20:23:46
*/

SET FOREIGN_KEY_CHECKS=0;
-- ----------------------------
-- Table structure for `about`
-- ----------------------------
DROP TABLE IF EXISTS `about`;
CREATE TABLE `about` (
  `abo_id` int(10) NOT NULL AUTO_INCREMENT,
  `abo_description` text NOT NULL,
  `abo_status` smallint(6) NOT NULL,
  `lang_id` smallint(6) NOT NULL,
  PRIMARY KEY (`abo_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of about
-- ----------------------------
INSERT INTO about VALUES ('1', '<p>Hi! The summer comes with a new TEA. This release features a polished UI, more usable with netbooks and other small devices. Task-oriented menu keeps the space at minimum. The new main window tab, \"todo\" brings to you the built-in calendar/organizer with a new menu related - \"Calendar\".</p>\r\n<p>The Functions menu has a new submenu - \"Images\" full of screen-capture tools. Yes, TEA now can do the screenshots.</p>\r\n<p>The file manager UI was improved. The charset autodetection button is introduced. Some errors has been fixed, including the good old \"search backwards\" bug. Syntax hl module format is slightly modified. The new function \"Edit - Comment selection\" helps you to comment out any selected text depended on the current highlighting scheme.</p>\r\n<p>All files placed at the TEA config directory (snippets, templates, etc.) now will be saved automatically on close.</p>\r\n<p>The Functions menu has a new submenu - \"Images\" full of screen-capture tools. Yes, TEA now can do the screenshots.</p>\r\n<p>The file manager UI was improved. The charset autodetection button is introduced. Some errors has been fixed, including the good old \"search backwards\" bug. Syntax hl module format is slightly modified. The new function \"Edit - Comment selection\" helps you to comment out any selected text depended on the current highlighting scheme.</p>\r\n<p>All files placed at the TEA config directory (snippets, templates, etc.) now will be saved automatically on close.</p>', '1', '1');
