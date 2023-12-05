SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

CREATE SCHEMA IF NOT EXISTS `dbcontroladorfrontalmvc` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci ;
USE `dbcontroladorfrontalmvc` ;

-- -----------------------------------------------------
-- Table `dbcontroladorfrontalmvc`.`usuario`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `dbcontroladorfrontalmvc`.`usuario` (
  `rut` VARCHAR(45) NOT NULL ,
  `nombre` VARCHAR(45) NOT NULL ,
  `apellido` VARCHAR(45) NOT NULL ,
  `email` VARCHAR(45) NOT NULL ,
  `clave` VARCHAR(255) NOT NULL ,
  `tipo` VARCHAR(45) NOT NULL ,
  PRIMARY KEY (`rut`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `dbcontroladorfrontalmvc`.`categoria`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `dbcontroladorfrontalmvc`.`categoria` (
  `id` INT AUTO_INCREMENT NOT NULL ,
  `nombre` VARCHAR(45) NOT NULL ,
  PRIMARY KEY (`id`) ,
  UNIQUE INDEX `nombre_UNIQUE` (`nombre` ASC) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `dbcontroladorfrontalmvc`.`producto`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `dbcontroladorfrontalmvc`.`producto` (
  `codigo` VARCHAR(45) NOT NULL ,
  `nombre` VARCHAR(45) NOT NULL ,
  `precio` DOUBLE NOT NULL ,
  `categoria_id` INT NOT NULL ,
  PRIMARY KEY (`codigo`, `categoria_id`) ,
  INDEX `fk_producto_categoria_idx` (`categoria_id` ASC) ,
  CONSTRAINT `fk_producto_categoria`
    FOREIGN KEY (`categoria_id` )
    REFERENCES `dbcontroladorfrontalmvc`.`categoria` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;

USE `dbcontroladorfrontalmvc` ;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;