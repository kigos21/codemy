CREATE SCHEMA IF NOT EXISTS `sample2` ;

USE sample2;

CREATE TABLE IF NOT EXISTS `sample2`.`course` (
  `idcourse` INT NOT NULL AUTO_INCREMENT,
  `imglink` LONGTEXT NOT NULL,
  `title` VARCHAR(255) NOT NULL,
  `description` LONGTEXT NOT NULL,
  PRIMARY KEY (`idcourse`));

CREATE TABLE IF NOT EXISTS `sample2`.`user` (
  `iduser` INT NOT NULL AUTO_INCREMENT,
  `email` VARCHAR(255) NOT NULL,
  `password` VARCHAR(255) NOT NULL,
  PRIMARY KEY (`iduser`),
  UNIQUE INDEX `email_UNIQUE` (`email` ASC) VISIBLE);

CREATE TABLE IF NOT EXISTS `sample2`.`learning` (
  `idlearning` INT NOT NULL AUTO_INCREMENT,
  `iduser` INT NOT NULL,
  `idcourse` INT NOT NULL,
  PRIMARY KEY (`idlearning`),
  INDEX `iduser_idx` (`iduser` ASC) VISIBLE,
  INDEX `idcourse_idx` (`idcourse` ASC) VISIBLE,
  CONSTRAINT `iduser`
    FOREIGN KEY (`iduser`)
    REFERENCES `sample2`.`user` (`iduser`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `idcourse`
    FOREIGN KEY (`idcourse`)
    REFERENCES `sample2`.`course` (`idcourse`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION);
