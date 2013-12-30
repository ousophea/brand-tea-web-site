-- phpMyAdmin SQL Dump
-- version 3.3.9
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Dec 29, 2013 at 06:11 AM
-- Server version: 5.1.53
-- PHP Version: 5.3.4

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `brand_tea_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE IF NOT EXISTS `categories` (
  `cate_id` int(11) NOT NULL AUTO_INCREMENT,
  `cate_name` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `cate_description` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `cate_fields` text COLLATE utf8_unicode_ci,
  `lang_id` smallint(6) NOT NULL,
  PRIMARY KEY (`cate_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=4 ;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`cate_id`, `cate_name`, `cate_description`, `cate_fields`, `lang_id`) VALUES
(2, 'test', 'test', 'a:2:{s:5:"label";a:1:{i:0;s:4:"test";}s:5:"field";a:1:{i:0;s:4:"test";}}', 1),
(3, 'Nice', 'Nice', 'a:2:{s:5:"label";a:2:{i:0;s:4:"Free";i:1;s:7:"Benefit";}s:5:"field";a:2:{i:0;s:1:"1";i:1;s:4:"good";}}', 1);

-- --------------------------------------------------------

--
-- Table structure for table `contents`
--

CREATE TABLE IF NOT EXISTS `contents` (
  `cont_id` int(11) NOT NULL AUTO_INCREMENT,
  `cont_name` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `cont_description` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `men_id` int(11) NOT NULL,
  `lang_id` smallint(6) NOT NULL,
  PRIMARY KEY (`cont_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

--
-- Dumping data for table `contents`
--


-- --------------------------------------------------------

--
-- Table structure for table `groups`
--

CREATE TABLE IF NOT EXISTS `groups` (
  `gro_id` int(11) NOT NULL AUTO_INCREMENT,
  `gro_name` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `gro_description` varchar(500) COLLATE utf8_unicode_ci DEFAULT NULL,
  `cate_id` int(11) DEFAULT NULL,
  `lang_id` smallint(6) NOT NULL,
  PRIMARY KEY (`gro_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=6 ;

--
-- Dumping data for table `groups`
--

INSERT INTO `groups` (`gro_id`, `gro_name`, `gro_description`, `cate_id`, `lang_id`) VALUES
(4, 'test', 'richat', 2, 1),
(5, 'test1 sdfdsf', 'test1sdf sdfsdfdsf', 3, 1);

-- --------------------------------------------------------

--
-- Table structure for table `languages`
--

CREATE TABLE IF NOT EXISTS `languages` (
  `lang_id` smallint(6) NOT NULL AUTO_INCREMENT,
  `lang_name` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `lang_description` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`lang_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=2 ;

--
-- Dumping data for table `languages`
--

INSERT INTO `languages` (`lang_id`, `lang_name`, `lang_description`) VALUES
(1, 'English', 'en');

-- --------------------------------------------------------

--
-- Table structure for table `menus`
--

CREATE TABLE IF NOT EXISTS `menus` (
  `men_id` int(11) NOT NULL AUTO_INCREMENT,
  `men_name` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `men_order` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `lang_id` smallint(6) NOT NULL,
  PRIMARY KEY (`men_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

--
-- Dumping data for table `menus`
--


-- --------------------------------------------------------

--
-- Table structure for table `photos`
--

CREATE TABLE IF NOT EXISTS `photos` (
  `pho_id` int(11) NOT NULL AUTO_INCREMENT,
  `pho_url` text NOT NULL,
  `pho_des` text NOT NULL,
  `pro_id` int(11) NOT NULL,
  PRIMARY KEY (`pho_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=107 ;

--
-- Dumping data for table `photos`
--

INSERT INTO `photos` (`pho_id`, `pho_url`, `pho_des`, `pro_id`) VALUES
(96, 'Desert.jpg', '', 18),
(97, 'Hydrangeas.jpg', '', 18),
(98, 'Jellyfish.jpg', '', 18),
(99, 'Lighthouse.jpg', '', 18),
(100, 'Penguins.jpg', '', 18),
(101, 'Tulips.jpg', '', 18),
(102, 'Chrysanthemum.jpg', '', 19),
(103, 'Koala.jpg', '', 19),
(105, 'Penguins1.jpg', '', 20),
(106, 'Lighthouse1.jpg', '', 20);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE IF NOT EXISTS `products` (
  `pro_id` int(11) NOT NULL AUTO_INCREMENT,
  `pro_name` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `pro_price` int(11) DEFAULT NULL,
  `pro_qty` smallint(6) DEFAULT NULL,
  `pro_fields` text COLLATE utf8_unicode_ci,
  `gro_id` int(11) NOT NULL,
  `lang_id` smallint(6) NOT NULL,
  `pro_related` text COLLATE utf8_unicode_ci NOT NULL,
  `pro_des` text COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`pro_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=21 ;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`pro_id`, `pro_name`, `pro_price`, `pro_qty`, `pro_fields`, `gro_id`, `lang_id`, `pro_related`, `pro_des`) VALUES
(18, 'product 1', 2500, 2500, 'a:2:{s:5:"label";a:1:{i:0;s:4:"test";}s:5:"field";a:1:{i:0;s:16:"3333333333333333";}}', 4, 1, 'b:0;', 'sdfsdf'),
(19, 'product 2', 2, 2500, 'a:2:{s:5:"label";a:2:{i:0;s:4:"Free";i:1;s:7:"Benefit";}s:5:"field";a:2:{i:0;s:17:"33333333333333333";i:1;s:6:"33333q";}}', 5, 1, 'a:1:{i:0;s:2:"18";}', 'sdfsdfsdf'),
(20, 'product 3', 2221, 2500, 'a:2:{s:5:"label";a:2:{i:0;s:4:"Free";i:1;s:7:"Benefit";}s:5:"field";a:2:{i:0;s:1:"1";i:1;s:4:"good";}}', 5, 1, 'a:2:{i:0;s:2:"18";i:1;s:2:"19";}', 'sdfdsf3333');

-- --------------------------------------------------------

--
-- Table structure for table `usergroup`
--

CREATE TABLE IF NOT EXISTS `usergroup` (
  `usg_id` int(11) NOT NULL AUTO_INCREMENT,
  `usg_name` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `usg_description` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`usg_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=3 ;

--
-- Dumping data for table `usergroup`
--

INSERT INTO `usergroup` (`usg_id`, `usg_name`, `usg_description`) VALUES
(1, 'root', 'the supper administrator. this user can be no'),
(2, 'admin', 'this user can be deleted. the role is after  ');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `use_id` int(11) NOT NULL AUTO_INCREMENT,
  `use_name` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `use_password` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `use_date_create` datetime DEFAULT NULL,
  `usg_id` int(11) NOT NULL,
  PRIMARY KEY (`use_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=2 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`use_id`, `use_name`, `use_password`, `use_date_create`, `usg_id`) VALUES
(1, 'root', '838a0d72e5c565a35fb17bbf22c349538ff0bb11', '2013-12-18 11:54:43', 1);
