SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

CREATE SCHEMA IF NOT EXISTS `somedb` DEFAULT CHARACTER SET latin1 ;
USE `somedb` ;

-- -----------------------------------------------------
-- Table `somedb`.`movements`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `somedb`.`movements` (
  `Datetime` VARCHAR(19) NULL DEFAULT NULL,
  `Code` VARCHAR(4) NULL DEFAULT NULL,
  `Action` VARCHAR(4) NULL DEFAULT NULL,
  `Amount` INT(2) NULL DEFAULT NULL)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `somedb`.`players`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `somedb`.`players` (
  `ID` INT(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `Player` CHAR(64) NOT NULL,
  `Cash` INT(4) NOT NULL,
  `Password` CHAR(64) NOT NULL,
  `Role` CHAR(32) NOT NULL,
  `Token` CHAR(32) NOT NULL,
  PRIMARY KEY (`ID`))
ENGINE = InnoDB
AUTO_INCREMENT = 5
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `somedb`.`stocks`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `somedb`.`stocks` (
  `Code` VARCHAR(4) NULL DEFAULT NULL,
  `Name` VARCHAR(10) NULL DEFAULT NULL,
  `Category` VARCHAR(1) NULL DEFAULT NULL,
  `Value` INT(3) NULL DEFAULT NULL)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `somedb`.`transactions`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `somedb`.`transactions` (
  `DateTime` VARCHAR(19) NULL DEFAULT NULL,
  `Player` VARCHAR(6) NULL DEFAULT NULL,
  `Stock` VARCHAR(4) NULL DEFAULT NULL,
  `Trans` VARCHAR(4) NULL DEFAULT NULL,
  `Quantity` INT(4) NULL DEFAULT NULL)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
