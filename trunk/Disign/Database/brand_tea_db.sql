SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL';

SHOW WARNINGS;
DROP SCHEMA IF EXISTS `brand_tea_db` ;
CREATE SCHEMA IF NOT EXISTS `brand_tea_db` DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ;
SHOW WARNINGS;
USE `brand_tea_db` ;

-- -----------------------------------------------------
-- Table `usergroup`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `usergroup` ;

SHOW WARNINGS;
CREATE  TABLE IF NOT EXISTS `usergroup` (
  `usg_id` INT NULL AUTO_INCREMENT ,
  `usg_name` VARCHAR(45) NULL ,
  `usg_description` VARCHAR(45) NULL ,
  PRIMARY KEY (`usg_id`) )
ENGINE = InnoDB;

SHOW WARNINGS;

-- -----------------------------------------------------
-- Table `users`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `users` ;

SHOW WARNINGS;
CREATE  TABLE IF NOT EXISTS `users` (
  `use_id` INT NOT NULL ,
  `use_name` VARCHAR(45) NULL ,
  `use_password` VARCHAR(45) NULL ,
  `use_date_create` DATETIME NULL ,
  `usg_id` INT NOT NULL ,
  PRIMARY KEY (`use_id`) )
ENGINE = InnoDB;

SHOW WARNINGS;

-- -----------------------------------------------------
-- Table `languages`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `languages` ;

SHOW WARNINGS;
CREATE  TABLE IF NOT EXISTS `languages` (
  `lang_id` SMALLINT NULL AUTO_INCREMENT ,
  `lang_name` VARCHAR(45) NULL ,
  `lang_description` VARCHAR(45) NULL ,
  PRIMARY KEY (`lang_id`) )
ENGINE = InnoDB;

SHOW WARNINGS;

-- -----------------------------------------------------
-- Table `groups`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `groups` ;

SHOW WARNINGS;
CREATE  TABLE IF NOT EXISTS `groups` (
  `gro_id` INT NULL AUTO_INCREMENT ,
  `gro_name` VARCHAR(45) NULL ,
  `gro_description` VARCHAR(45) NULL ,
  `cate_id` INT NULL ,
  `lang_id` SMALLINT NOT NULL ,
  PRIMARY KEY (`gro_id`) )
ENGINE = InnoDB;

SHOW WARNINGS;

-- -----------------------------------------------------
-- Table `products`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `products` ;

SHOW WARNINGS;
CREATE  TABLE IF NOT EXISTS `products` (
  `pro_id` INT NULL AUTO_INCREMENT ,
  `pro_name` VARCHAR(45) NULL ,
  `pro_price` INT NULL ,
  `pro_qty` SMALLINT NULL ,
  `fields` TEXT NULL ,
  `gro_id` INT NOT NULL ,
  `lang_id` SMALLINT NOT NULL ,
  PRIMARY KEY (`pro_id`) )
ENGINE = InnoDB;

SHOW WARNINGS;

-- -----------------------------------------------------
-- Table `menus`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `menus` ;

SHOW WARNINGS;
CREATE  TABLE IF NOT EXISTS `menus` (
  `men_id` INT NOT NULL ,
  `men_name` VARCHAR(45) NULL ,
  `men_order` VARCHAR(45) NULL ,
  `lang_id` SMALLINT NOT NULL ,
  PRIMARY KEY (`men_id`) )
ENGINE = InnoDB;

SHOW WARNINGS;

-- -----------------------------------------------------
-- Table `contents`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `contents` ;

SHOW WARNINGS;
CREATE  TABLE IF NOT EXISTS `contents` (
  `cont_id` INT NULL AUTO_INCREMENT ,
  `cont_name` VARCHAR(45) NULL ,
  `cont_description` VARCHAR(45) NULL ,
  `men_id` INT NOT NULL ,
  `lang_id` SMALLINT NOT NULL ,
  PRIMARY KEY (`cont_id`) )
ENGINE = InnoDB;

SHOW WARNINGS;

-- -----------------------------------------------------
-- Table `categories`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `categories` ;

SHOW WARNINGS;
CREATE  TABLE IF NOT EXISTS `categories` (
  `cate_id` INT NULL AUTO_INCREMENT ,
  `cate_name` VARCHAR(45) NULL ,
  `cate_description` VARCHAR(45) NULL ,
  `field` TEXT NULL ,
  `lang_id` SMALLINT NOT NULL ,
  PRIMARY KEY (`cate_id`) )
ENGINE = InnoDB;

SHOW WARNINGS;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
