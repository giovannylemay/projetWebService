-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

-- -----------------------------------------------------
-- Schema WebServices
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema WebServices
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `WebServices` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci ;
USE `WebServices` ;

-- -----------------------------------------------------
-- Table `WebServices`.`Livre`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `WebServices`.`Livre` (
  `idLivre` INT NOT NULL AUTO_INCREMENT,
  `nomLivre` VARCHAR(45) NULL,
  `Au` VARCHAR(45) NULL,
  PRIMARY KEY (`idLivre`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `WebServices`.`Kind`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `WebServices`.`Kind` (
  `idKind` INT NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(45) NULL,
  `definition` VARCHAR(100) NULL,
  PRIMARY KEY (`idKind`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `WebServices`.`Series`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `WebServices`.`Series` (
  `idSeries` INT NOT NUL AUTO_INCREMENTL,
  `name` VARCHAR(45) NULL,
  `detail` VARCHAR(45) NULL,
  PRIMARY KEY (`idSeries`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `WebServices`.`Author`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `WebServices`.`Author` (
  `idAuthor` INT NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(45) NULL,
  `firstname` VARCHAR(45) NULL,
  PRIMARY KEY (`idAuthor`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `WebServices`.`Book`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `WebServices`.`Book` (
  `idBook` INT NOT NULL AUTO_INCREMENT,
  `title` VARCHAR(45) NULL,
  `size` VARCHAR(45) NULL,
  `duration` VARCHAR(45) NULL,
  `idKind` INT NOT NULL,
  `idSeries` INT NOT NULL,
  `idAuthor` INT NOT NULL,
  PRIMARY KEY (`idBook`, `idKind`, `idSeries`, `idAuthor`),
  INDEX `fk_Book_Kind_idx` (`idKind` ASC),
  INDEX `fk_Book_Series1_idx` (`idSeries` ASC),
  INDEX `fk_Book_Author1_idx` (`idAuthor` ASC),
  CONSTRAINT `fk_Book_Kind`
    FOREIGN KEY (`idKind`)
    REFERENCES `WebServices`.`Kind` (`idKind`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Book_Series1`
    FOREIGN KEY (`idSeries`)
    REFERENCES `WebServices`.`Series` (`idSeries`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Book_Author1`
    FOREIGN KEY (`idAuthor`)
    REFERENCES `WebServices`.`Author` (`idAuthor`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `WebServices`.`User`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `WebServices`.`User` (
  `idUser` INT NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(45) NULL,
  `firstname` VARCHAR(45) NULL,
  `email` VARCHAR(45) NULL,
  `password` VARCHAR(45) NULL,
  `isAdmin` TINYINT(1) NULL,
  PRIMARY KEY (`idUser`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `WebServices`.`Comment`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `WebServices`.`Comment` (
  `idUser` INT NOT NULL,
  `idBook` INT NOT NULL,
  `comment` VARCHAR(100) NULL,
  PRIMARY KEY (`idUser`, `idBook`),
  INDEX `fk_User_has_Book_Book1_idx` (`idBook` ASC),
  INDEX `fk_User_has_Book_User1_idx` (`idUser` ASC),
  CONSTRAINT `fk_User_has_Book_User1`
    FOREIGN KEY (`idUser`)
    REFERENCES `WebServices`.`User` (`idUser`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_User_has_Book_Book1`
    FOREIGN KEY (`idBook`)
    REFERENCES `WebServices`.`Book` (`idBook`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `WebServices`.`Playlist`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `WebServices`.`Playlist` (
  `idPlaylist` INT NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(45) NULL,
  `dateCreation` DATE NULL,
  `idUser` INT NOT NULL,
  `idCreator` INT NULL,
  PRIMARY KEY (`idPlaylist`, `idUser`),
  INDEX `fk_Playlist_User1_idx` (`idUser` ASC),
  CONSTRAINT `fk_Playlist_User1`
    FOREIGN KEY (`idUser`)
    REFERENCES `WebServices`.`User` (`idUser`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `WebServices`.`Belong`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `WebServices`.`Belong` (
  `idBook` INT NOT NULL,
  `idPlaylist` INT NOT NULL,
  PRIMARY KEY (`idBook`, `idPlaylist`),
  INDEX `fk_Book_has_Playlist_Playlist1_idx` (`idPlaylist` ASC),
  INDEX `fk_Book_has_Playlist_Book1_idx` (`idBook` ASC),
  CONSTRAINT `fk_Book_has_Playlist_Book1`
    FOREIGN KEY (`idBook`)
    REFERENCES `WebServices`.`Book` (`idBook`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Book_has_Playlist_Playlist1`
    FOREIGN KEY (`idPlaylist`)
    REFERENCES `WebServices`.`Playlist` (`idPlaylist`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `WebServices`.`LastTime`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `WebServices`.`LastTime` (
  `idLast` INT NOT NULL AUTO_INCREMENT,
  `time` VARCHAR(45) NULL,
  `idUser` INT NOT NULL,
  `idBook` INT NOT NULL,
  PRIMARY KEY (`idLast`, `idUser`, `idBook`),
  INDEX `fk_lastTime_User1_idx` (`idUser` ASC),
  INDEX `fk_lastTime_Book1_idx` (`idBook` ASC),
  CONSTRAINT `fk_lastTime_User1`
    FOREIGN KEY (`idUser`)
    REFERENCES `WebServices`.`User` (`idUser`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_lastTime_Book1`
    FOREIGN KEY (`idBook`)
    REFERENCES `WebServices`.`Book` (`idBook`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
