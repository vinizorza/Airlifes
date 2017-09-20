-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

-- -----------------------------------------------------
-- Schema airlifes
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema airlifes
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `airlifes` DEFAULT CHARACTER SET utf8 ;
USE `airlifes` ;

-- -----------------------------------------------------
-- Table `airlifes`.`PASSAGEIRO`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `airlifes`.`PASSAGEIRO` (
  `idPASSAGEIRO` INT NOT NULL AUTO_INCREMENT,
  `CPF` VARCHAR(45) NOT NULL,
  `NOME` VARCHAR(45) NOT NULL,
  `DATA_NASCIMENTO` DATE NOT NULL,
  `EMAIL` VARCHAR(45) NULL,
  `TELEFONE` VARCHAR(45) NULL,
  PRIMARY KEY (`idPASSAGEIRO`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `airlifes`.`AVIAO`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `airlifes`.`AVIAO` (
  `idAVIAO` INT NOT NULL AUTO_INCREMENT,
  `MODELO` VARCHAR(45) NOT NULL,
  `CAPACIDADE` INT NOT NULL,
  `FABRICANTE` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`idAVIAO`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `airlifes`.`AEROPORTO`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `airlifes`.`AEROPORTO` (
  `idAEROPORTO` INT NOT NULL AUTO_INCREMENT,
  `NOME` VARCHAR(45) NULL,
  `CIDADE` VARCHAR(45) NULL,
  `ESTADO` VARCHAR(45) NULL,
  `PAIS` VARCHAR(45) NULL,
  `SIGLA` VARCHAR(45) NULL,
  PRIMARY KEY (`idAEROPORTO`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `airlifes`.`VOO`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `airlifes`.`VOO` (
  `idVOO` INT NOT NULL AUTO_INCREMENT,
  `CODIGO` VARCHAR(45) NOT NULL,
  `HORARIO_PARTIDA` DATETIME NOT NULL,
  `HORARIO_CHEGADA` DATETIME NOT NULL,
  `AVIAO_idAVIAO` INT NOT NULL,
  `idAEROPORTO_ORIGEM` INT NOT NULL,
  `idAEROPORTO_DESTINO` INT NOT NULL,
  PRIMARY KEY (`idVOO`),
  INDEX `fk_VOO_AVIAO1_idx` (`AVIAO_idAVIAO` ASC),
  INDEX `fk_VOO_AEROPORTO1_idx` (`idAEROPORTO_ORIGEM` ASC),
  INDEX `fk_VOO_AEROPORTO2_idx` (`idAEROPORTO_DESTINO` ASC),
  CONSTRAINT `fk_VOO_AVIAO1`
    FOREIGN KEY (`AVIAO_idAVIAO`)
    REFERENCES `airlifes`.`AVIAO` (`idAVIAO`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_VOO_AEROPORTO1`
    FOREIGN KEY (`idAEROPORTO_ORIGEM`)
    REFERENCES `airlifes`.`AEROPORTO` (`idAEROPORTO`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_VOO_AEROPORTO2`
    FOREIGN KEY (`idAEROPORTO_DESTINO`)
    REFERENCES `airlifes`.`AEROPORTO` (`idAEROPORTO`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `airlifes`.`CLIENTE`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `airlifes`.`CLIENTE` (
  `idCLIENTE` INT NOT NULL AUTO_INCREMENT,
  `NOME` VARCHAR(45) NOT NULL,
  `TIPO` VARCHAR(45) NOT NULL,
  `CPF` VARCHAR(45) NULL,
  `CNPJ` VARCHAR(45) NULL,
  `TELEFONE` VARCHAR(45) NULL,
  `EMAIL` VARCHAR(45) NULL,
  PRIMARY KEY (`idCLIENTE`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `airlifes`.`COMPRA`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `airlifes`.`COMPRA` (
  `idCOMPRA` INT NOT NULL AUTO_INCREMENT,
  `HORARIO` TIMESTAMP NOT NULL,
  `NUMERO_CARTAO` VARCHAR(45) NOT NULL,
  `CLIENTE_idCLIENTE` INT NOT NULL,
  `idHOSPEDAGEM` INT NULL,
  PRIMARY KEY (`idCOMPRA`),
  INDEX `fk_COMPRA_CLIENTE1_idx` (`CLIENTE_idCLIENTE` ASC),
  CONSTRAINT `fk_COMPRA_CLIENTE1`
    FOREIGN KEY (`CLIENTE_idCLIENTE`)
    REFERENCES `airlifes`.`CLIENTE` (`idCLIENTE`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `airlifes`.`TICKET`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `airlifes`.`TICKET` (
  `idTICKET` INT NOT NULL AUTO_INCREMENT,
  `VOO_idVOO` INT NOT NULL,
  `CODIGO_ASSENTO` INT NOT NULL,
  `DESCONTO` FLOAT NULL,
  `COMPRA_idCOMPRA` INT NOT NULL,
  `PASSAGEIRO_idPASSAGEIRO` INT NOT NULL,
  PRIMARY KEY (`idTICKET`),
  INDEX `fk_RESERVA_VOO1_idx` (`VOO_idVOO` ASC),
  INDEX `fk_TICKET_COMPRA1_idx` (`COMPRA_idCOMPRA` ASC),
  INDEX `fk_TICKET_PASSAGEIRO1_idx` (`PASSAGEIRO_idPASSAGEIRO` ASC),
  CONSTRAINT `fk_RESERVA_VOO1`
    FOREIGN KEY (`VOO_idVOO`)
    REFERENCES `airlifes`.`VOO` (`idVOO`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_TICKET_COMPRA1`
    FOREIGN KEY (`COMPRA_idCOMPRA`)
    REFERENCES `airlifes`.`COMPRA` (`idCOMPRA`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_TICKET_PASSAGEIRO1`
    FOREIGN KEY (`PASSAGEIRO_idPASSAGEIRO`)
    REFERENCES `airlifes`.`PASSAGEIRO` (`idPASSAGEIRO`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
