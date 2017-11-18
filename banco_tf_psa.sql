-- MySQL Script generated by MySQL Workbench
-- Wed Nov  8 22:08:32 2017
-- Model: New Model    Version: 1.0
-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

-- -----------------------------------------------------
-- Schema tf-psa
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema tf-psa
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `tf-psa` DEFAULT CHARACTER SET utf8 ;
USE `tf-psa` ;

-- -----------------------------------------------------
-- Table `tf-psa`.`leilao`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `tf-psa`.`leilao` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `data_hora_inicio` DATETIME NULL,
  `data_hora_fim` DATETIME NULL,
  `valor_minimo` DECIMAL NULL,
  `tipo` INT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `tf-psa`.`user`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `tf-psa`.`users` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL DEFAULT '',
  `email` varchar(255) NOT NULL DEFAULT '',
  `password` varchar(255) NOT NULL DEFAULT '',
  `avatar` varchar(255) DEFAULT 'default.jpg',
  `created_at` datetime NOT NULL,
  `updated_at` datetime DEFAULT NULL,
  `is_admin` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `is_confirmed` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `is_deleted` tinyint(1) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
);
CREATE TABLE IF NOT EXISTS `tf-psa`.`ci_sessions` (
  `id` varchar(40) NOT NULL,
  `ip_address` varchar(45) NOT NULL,
  `timestamp` int(10) unsigned DEFAULT 0 NOT NULL,
  `data` blob NOT NULL,
  PRIMARY KEY (id),
  KEY `ci_sessions_timestamp` (`timestamp`)
);


-- -----------------------------------------------------
-- Table `tf-psa`.`lance`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `tf-psa`.`lance` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `data_hora` DATETIME NULL,
  `valor` DECIMAL NULL,
  `leilao_id` INT NOT NULL,
  `user_id` INT NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_lance_leilao1_idx` (`leilao_id` ASC),
  INDEX `fk_lance_user1_idx` (`user_id` ASC),
  CONSTRAINT `fk_lance_leilao1`
    FOREIGN KEY (`leilao_id`)
    REFERENCES `tf-psa`.`leilao` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_lance_user1`
    FOREIGN KEY (`user_id`)
    REFERENCES `tf-psa`.`user` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `tf-psa`.`lance_tipo`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `tf-psa`.`lance_tipo` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `nome` VARCHAR(45) NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `tf-psa`.`produto_categoria`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `tf-psa`.`produto_categoria` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `nome` VARCHAR(45) NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `tf-psa`.`lote`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `tf-psa`.`lote` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `nome` VARCHAR(45) NULL,
  `leilao_id` INT NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_lote_leilao1_idx` (`leilao_id` ASC),
  CONSTRAINT `fk_lote_leilao1`
    FOREIGN KEY (`leilao_id`)
    REFERENCES `tf-psa`.`leilao` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `tf-psa`.`produto`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `tf-psa`.`produto` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `descricao_breve` VARCHAR(45) NULL,
  `descricacao_completa` TEXT NULL,
  `produto_categoria_id` INT NOT NULL,
  `lote_id` INT NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_produto_produto_categoria_idx` (`produto_categoria_id` ASC),
  INDEX `fk_produto_lote1_idx` (`lote_id` ASC),
  CONSTRAINT `fk_produto_produto_categoria`
    FOREIGN KEY (`produto_categoria_id`)
    REFERENCES `tf-psa`.`produto_categoria` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_produto_lote1`
    FOREIGN KEY (`lote_id`)
    REFERENCES `tf-psa`.`lote` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;