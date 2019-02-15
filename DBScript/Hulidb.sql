-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';

-- -----------------------------------------------------
-- Schema mydb
-- -----------------------------------------------------
-- -----------------------------------------------------
-- Schema hulidb
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema hulidb
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `hulidb` DEFAULT CHARACTER SET latin1 ;
USE `hulidb` ;

-- -----------------------------------------------------
-- Table `hulidb`.`client`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `hulidb`.`client` (
  `idclient` INT(11) NOT NULL,
  `name` VARCHAR(45) NULL DEFAULT NULL,
  PRIMARY KEY (`idclient`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = latin1;


-- -----------------------------------------------------
-- Table `hulidb`.`product`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `hulidb`.`product` (
  `idproduct` INT(11) NOT NULL AUTO_INCREMENT,
  `product_name` VARCHAR(45) NULL DEFAULT NULL,
  PRIMARY KEY (`idproduct`))
ENGINE = InnoDB
AUTO_INCREMENT = 7
DEFAULT CHARACTER SET = latin1;


-- -----------------------------------------------------
-- Table `hulidb`.`line`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `hulidb`.`line` (
  `idline` INT(11) NOT NULL AUTO_INCREMENT,
  `quantity` DECIMAL(4,2) NULL DEFAULT NULL,
  `price` DECIMAL(6,2) NULL DEFAULT NULL,
  `tax_rate` DECIMAL(3,2) NULL DEFAULT NULL,
  `discount_rate` DECIMAL(3,2) NULL DEFAULT NULL,
  `currency` VARCHAR(45) NULL DEFAULT NULL,
  `idproduct` INT(11) NULL DEFAULT NULL,
  PRIMARY KEY (`idline`),
  INDEX `idproduct` (`idproduct` ASC) VISIBLE,
  CONSTRAINT `line_ibfk_1`
    FOREIGN KEY (`idproduct`)
    REFERENCES `hulidb`.`product` (`idproduct`))
ENGINE = InnoDB
AUTO_INCREMENT = 15
DEFAULT CHARACTER SET = latin1;


-- -----------------------------------------------------
-- Table `hulidb`.`invoice`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `hulidb`.`invoice` (
  `idinvoice` INT(11) NOT NULL AUTO_INCREMENT,
  `idclient` INT(11) NOT NULL,
  `idline` INT(11) NOT NULL,
  PRIMARY KEY (`idinvoice`),
  INDEX `idclient` (`idclient` ASC) VISIBLE,
  INDEX `idline` (`idline` ASC) VISIBLE,
  CONSTRAINT `invoice_ibfk_1`
    FOREIGN KEY (`idclient`)
    REFERENCES `hulidb`.`client` (`idclient`),
  CONSTRAINT `invoice_ibfk_2`
    FOREIGN KEY (`idline`)
    REFERENCES `hulidb`.`line` (`idline`))
ENGINE = InnoDB
AUTO_INCREMENT = 15
DEFAULT CHARACTER SET = latin1;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
