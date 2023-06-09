-- MySQL Script generated by MySQL Workbench
-- Sat May  6 20:21:01 2023
-- Model: New Model    Version: 1.0
-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';

-- -----------------------------------------------------
-- Schema mydb
-- -----------------------------------------------------
-- -----------------------------------------------------
-- Schema books_eshop
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema books_eshop
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `books_eshop` DEFAULT CHARACTER SET utf8 ;
USE `books_eshop` ;

-- -----------------------------------------------------
-- Table `books_eshop`.`books`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `books_eshop`.`books` (
  `idbooks` INT NOT NULL AUTO_INCREMENT,
  `title` VARCHAR(300) NOT NULL,
  `price` DECIMAL(10) NOT NULL,
  `description` VARCHAR(300) NOT NULL,
  `urlimage` VARCHAR(255) NOT NULL,
  PRIMARY KEY (`idbooks`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `books_eshop`.`users`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `books_eshop`.`users` (
  `idusers` INT NOT NULL AUTO_INCREMENT,
  `email` VARCHAR(45) NOT NULL,
  `name` VARCHAR(45) NOT NULL,
  `password` VARCHAR(255) NOT NULL,
  `isadmin` TINYINT(1) NOT NULL,
  PRIMARY KEY (`idusers`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `books_eshop`.`cart`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `books_eshop`.`cart` (
  `idcart` INT NOT NULL AUTO_INCREMENT,
  `users_idusers` INT NOT NULL,
  PRIMARY KEY (`idcart`),
  INDEX `fk_cart_users1_idx` (`users_idusers` ASC) VISIBLE,
  CONSTRAINT ``
    FOREIGN KEY (`users_idusers`)
    REFERENCES `books_eshop`.`users` (`idusers`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `books_eshop`.`orders`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `books_eshop`.`orders` (
  `idorders` INT NOT NULL AUTO_INCREMENT,
  `users_idusers` INT NOT NULL,
  `cart_idcart` INT NOT NULL,
  PRIMARY KEY (`idorders`),
  INDEX `fk_orders_users1_idx` (`users_idusers` ASC) VISIBLE,
  INDEX `fk_orders_cart1_idx` (`cart_idcart` ASC) VISIBLE,
  CONSTRAINT ``
    FOREIGN KEY (`users_idusers`)
    REFERENCES `books_eshop`.`users` (`idusers`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT ``
    FOREIGN KEY (`cart_idcart`)
    REFERENCES `books_eshop`.`cart` (`idcart`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `books_eshop`.`authors`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `books_eshop`.`authors` (
  `idauthors` INT NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`idauthors`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `books_eshop`.`books_has_authors`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `books_eshop`.`books_has_authors` (
  `books_idbooks` INT NOT NULL,
  `authors_idauthors` INT NOT NULL,
  PRIMARY KEY (`books_idbooks`, `authors_idauthors`),
  INDEX `fk_books_has_authors_authors1_idx` (`authors_idauthors` ASC) VISIBLE,
  INDEX `fk_books_has_authors_books1_idx` (`books_idbooks` ASC) VISIBLE,
  CONSTRAINT ``
    FOREIGN KEY (`books_idbooks`)
    REFERENCES `books_eshop`.`books` (`idbooks`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT ``
    FOREIGN KEY (`authors_idauthors`)
    REFERENCES `books_eshop`.`authors` (`idauthors`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `books_eshop`.`books_has_cart`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `books_eshop`.`books_has_cart` (
  `books_idbooks` INT NOT NULL,
  `cart_idcart` INT NOT NULL,
  `id` INT NOT NULL AUTO_INCREMENT,
  INDEX `fk_books_has_cart_cart1_idx` (`cart_idcart` ASC) VISIBLE,
  INDEX `fk_books_has_cart_books1_idx` (`books_idbooks` ASC) VISIBLE,
  PRIMARY KEY (`id`),
  CONSTRAINT `fk_books_has_cart_books1`
    FOREIGN KEY (`books_idbooks`)
    REFERENCES `books_eshop`.`books` (`idbooks`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_books_has_cart_cart1`
    FOREIGN KEY (`cart_idcart`)
    REFERENCES `books_eshop`.`cart` (`idcart`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
