-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS
, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS
, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE
, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';


-- -----------------------------------------------------
-- Schema mansheart
-- -----------------------------------------------------
CREATE SCHEMA
IF NOT EXISTS `mansheart` DEFAULT CHARACTER
SET utf8 ;
USE `mansheart`
;

-- -----------------------------------------------------
-- Table `mansheart`.`immobilien`
-- -----------------------------------------------------
CREATE TABLE
IF NOT EXISTS `mansheart`.`immobilien`
(
  `id` INT
(11) NOT NULL AUTO_INCREMENT,
  `userid` INT
(11) NOT NULL,
  `name` VARCHAR
(45) CHARACTER
SET 'utf8'
COLLATE 'utf8_bin' NOT NULL,
  `size` INT
(11) NOT NULL,
  `nr_rooms` INT
(11) NOT NULL,
  `nr_floors` INT
(11) NOT NULL,
  `yearofconstruction` INT
(11) NOT NULL,
  `date_posted` TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP,
  `description` TEXT CHARACTER
SET 'utf8'
COLLATE 'utf8_bin' NULL DEFAULT NULL,
  `photo` VARCHAR
(100) CHARACTER
SET 'utf8'
COLLATE 'utf8_bin' NULL DEFAULT '/default.png',
  PRIMARY KEY
(`id`))
ENGINE = InnoDB
AUTO_INCREMENT = 2
DEFAULT CHARACTER
SET = utf8;


-- -----------------------------------------------------
-- Table `mansheart`.`users`
-- -----------------------------------------------------
CREATE TABLE
IF NOT EXISTS `mansheart`.`users`
(
  `id` INT
(11) NOT NULL AUTO_INCREMENT,
  `username` VARCHAR
(45) NOT NULL,
  `email` VARCHAR
(45) NOT NULL,
  `password` VARCHAR
(250) NOT NULL,
  `datecreated` TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY
(`id`))
ENGINE = InnoDB
AUTO_INCREMENT = 3
DEFAULT CHARACTER
SET = utf8
COLLATE = utf8_bin;


SET SQL_MODE
=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS
=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS
=@OLD_UNIQUE_CHECKS;
