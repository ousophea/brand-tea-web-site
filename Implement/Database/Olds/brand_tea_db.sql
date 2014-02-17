-- phpMyAdmin SQL Dump
-- version 3.3.9
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Dec 24, 2013 at 04:18 PM
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

--
-- Dumping data for table `categories`
--


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
  `gro_description` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `cate_id` int(11) DEFAULT NULL,
  `lang_id` smallint(6) NOT NULL,
  PRIMARY KEY (`gro_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

--
-- Dumping data for table `groups`
--


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
  PRIMARY KEY (`pro_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

--
-- Dumping data for table `products`
--


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
