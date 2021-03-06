-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

-- -----------------------------------------------------
-- Schema asistencia2
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema asistencia2
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `asistencia2` DEFAULT CHARACTER SET utf8 ;
USE `asistencia2` ;

-- -----------------------------------------------------
-- Table `asistencia2`.`alumnos`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `asistencia2`.`alumnos` (
  `idalumnos` INT NOT NULL AUTO_INCREMENT,
  `nombre` VARCHAR(100) NULL,
  PRIMARY KEY (`idalumnos`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `asistencia2`.`usuarios`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `asistencia2`.`usuarios` (
  `idusuarios` INT NOT NULL AUTO_INCREMENT,
  `nombre` VARCHAR(100) NULL,
  `correo` VARCHAR(100) NULL,
  `password` VARCHAR(512) NULL,
  PRIMARY KEY (`idusuarios`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `asistencia2`.`materia`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `asistencia2`.`materia` (
  `idmateria` INT NOT NULL AUTO_INCREMENT,
  `nombre` VARCHAR(100) NULL,
  PRIMARY KEY (`idmateria`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `asistencia2`.`asistencia`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `asistencia2`.`asistencia` (
  `idasistencia` INT NOT NULL,
  `fecha` DATE NULL,
  PRIMARY KEY (`idasistencia`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `asistencia2`.`alumnos_has_asistencia`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `asistencia2`.`alumnos_has_asistencia` (
  `alumnos_idalumnos` INT NOT NULL,
  `asistencia_idasistencia` INT NOT NULL,
  PRIMARY KEY (`alumnos_idalumnos`, `asistencia_idasistencia`),
  INDEX `fk_alumnos_has_asistencia_asistencia1_idx` (`asistencia_idasistencia` ASC),
  INDEX `fk_alumnos_has_asistencia_alumnos_idx` (`alumnos_idalumnos` ASC),
  CONSTRAINT `fk_alumnos_has_asistencia_alumnos`
    FOREIGN KEY (`alumnos_idalumnos`)
    REFERENCES `asistencia2`.`alumnos` (`idalumnos`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_alumnos_has_asistencia_asistencia1`
    FOREIGN KEY (`asistencia_idasistencia`)
    REFERENCES `asistencia2`.`asistencia` (`idasistencia`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `asistencia2`.`materia_has_alumnos`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `asistencia2`.`materia_has_alumnos` (
  `materia_idmateria` INT NOT NULL,
  `alumnos_idalumnos` INT NOT NULL,
  PRIMARY KEY (`materia_idmateria`, `alumnos_idalumnos`),
  INDEX `fk_materia_has_alumnos_alumnos1_idx` (`alumnos_idalumnos` ASC),
  INDEX `fk_materia_has_alumnos_materia1_idx` (`materia_idmateria` ASC),
  CONSTRAINT `fk_materia_has_alumnos_materia1`
    FOREIGN KEY (`materia_idmateria`)
    REFERENCES `asistencia2`.`materia` (`idmateria`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_materia_has_alumnos_alumnos1`
    FOREIGN KEY (`alumnos_idalumnos`)
    REFERENCES `asistencia2`.`alumnos` (`idalumnos`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `asistencia2`.`materia_has_usuarios`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `asistencia2`.`materia_has_usuarios` (
  `materia_idmateria` INT NOT NULL,
  `usuarios_idusuarios` INT NOT NULL,
  PRIMARY KEY (`materia_idmateria`, `usuarios_idusuarios`),
  INDEX `fk_materia_has_usuarios_usuarios1_idx` (`usuarios_idusuarios` ASC),
  INDEX `fk_materia_has_usuarios_materia1_idx` (`materia_idmateria` ASC),
  CONSTRAINT `fk_materia_has_usuarios_materia1`
    FOREIGN KEY (`materia_idmateria`)
    REFERENCES `asistencia2`.`materia` (`idmateria`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_materia_has_usuarios_usuarios1`
    FOREIGN KEY (`usuarios_idusuarios`)
    REFERENCES `asistencia2`.`usuarios` (`idusuarios`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
