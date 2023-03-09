CREATE SCHEMA IF NOT EXISTS `codemy` ;

USE codemy;

CREATE TABLE IF NOT EXISTS `codemy`.`course` (
  `idcourse` INT NOT NULL AUTO_INCREMENT,
  `imglink` LONGTEXT NOT NULL,
  `title` VARCHAR(255) NOT NULL,
  `description` LONGTEXT NOT NULL,
  PRIMARY KEY (`idcourse`));

  INSERT INTO `codemy`.`course` (
    `imglink`, 
    `title`, 
    `description`) 
  VALUES (
    'https://picsum.photos/seed/1/1600/900', 
    'The Complete Python Bootcamp', 
    'Learn Python like a Professional'
  );

  INSERT INTO `codemy`.`course` (
    `imglink`, 
    `title`, 
    `description`) 
  VALUES (
    'https://picsum.photos/seed/2/1600/900', 
    'Web Developer Bootcamp 2023', 
    'The only course you need to learn web development'
  );

  INSERT INTO `codemy`.`course` (
    `imglink`, 
    `title`, 
    `description`) 
  VALUES (
    'https://picsum.photos/seed/3/1600/900', 
    'Java Programming Masterclass', 
    'Obtain valuable Core Java Skills'
  );

  INSERT INTO `codemy`.`course` (
    `imglink`, 
    `title`, 
    `description`) 
  VALUES (
    'https://picsum.photos/seed/4/1600/900', 
    'The Complete iOS App Development Bootcamp', 
    'Master the SwiftUI in just one Course'
  );

CREATE TABLE IF NOT EXISTS `codemy`.`user` (
  `iduser` INT NOT NULL AUTO_INCREMENT,
  `email` VARCHAR(255) NOT NULL,
  `password` VARCHAR(255) NOT NULL,
  PRIMARY KEY (`iduser`),
  UNIQUE INDEX `email_UNIQUE` (`email` ASC) VISIBLE);

CREATE TABLE IF NOT EXISTS `codemy`.`learning` (
  `idlearning` INT NOT NULL AUTO_INCREMENT,
  `iduser` INT NOT NULL,
  `idcourse` INT NOT NULL,
  PRIMARY KEY (`idlearning`),
  INDEX `iduser_idx` (`iduser` ASC) VISIBLE,
  INDEX `idcourse_idx` (`idcourse` ASC) VISIBLE,
  CONSTRAINT `iduser`
    FOREIGN KEY (`iduser`)
    REFERENCES `codemy`.`user` (`iduser`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `idcourse`
    FOREIGN KEY (`idcourse`)
    REFERENCES `codemy`.`course` (`idcourse`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION);
