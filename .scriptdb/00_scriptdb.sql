-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

-- -----------------------------------------------------
-- Schema pro300
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema pro300
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `pro300` DEFAULT CHARACTER SET utf8 ;
USE `pro300` ;

-- -----------------------------------------------------
-- Table `pro300`.`perfil`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `pro300`.`perfil` ;

CREATE TABLE IF NOT EXISTS `pro300`.`perfil` (
  `id` INT NOT NULL,
  `perfil` VARCHAR(50) NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `pro300`.`usuario`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `pro300`.`usuario` ;

CREATE TABLE IF NOT EXISTS `pro300`.`usuario` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `email` VARCHAR(50) NOT NULL,
  `senha` VARCHAR(100) NOT NULL,
  `ra` VARCHAR(20) NULL,
  `nome` VARCHAR(255) NOT NULL,
  `telefone` CHAR(20) NULL,
  `perfil_id` INT NOT NULL,
  UNIQUE INDEX `usuario_i01` (`email` ASC),
  PRIMARY KEY (`id`),
  INDEX `usuario_i02` (`perfil_id` ASC),
  CONSTRAINT `fk_usuario_perfil_01`
    FOREIGN KEY (`perfil_id`)
    REFERENCES `pro300`.`perfil` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `pro300`.`curso`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `pro300`.`curso` ;

CREATE TABLE IF NOT EXISTS `pro300`.`curso` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `nome` VARCHAR(100) NOT NULL,
  `ativo` BIT NOT NULL DEFAULT 1,
  PRIMARY KEY (`id`),
  UNIQUE INDEX `curso_i01` (`nome` ASC))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `pro300`.`atividade`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `pro300`.`atividade` ;

CREATE TABLE IF NOT EXISTS `pro300`.`atividade` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `nome` VARCHAR(100) NOT NULL,
  `descricao` VARCHAR(500) NOT NULL,
  `dt_registro` DATETIME NOT NULL,
  `dt_inicio` DATETIME NOT NULL,
  `dt_termino` DATETIME NOT NULL,
  `dt_encerramento` DATETIME NULL,
  `professor_id` INT NOT NULL,
  `curso_id` INT NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `atividade_i01` (`professor_id` ASC),
  INDEX `atividade_i02` (`nome` ASC),
  INDEX `atividade_i03` (`descricao` ASC),
  INDEX `atividade_i04` (`dt_inicio` ASC, `dt_termino` ASC),
  INDEX `atividade_i05` (`dt_encerramento` ASC),
  INDEX `atividade_i06` (`curso_id` ASC),
  CONSTRAINT `fk_atividade_usuario_01`
    FOREIGN KEY (`professor_id`)
    REFERENCES `pro300`.`usuario` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_atividade_curso_01`
    FOREIGN KEY (`curso_id`)
    REFERENCES `pro300`.`curso` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `pro300`.`inscricao`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `pro300`.`inscricao` ;

CREATE TABLE IF NOT EXISTS `pro300`.`inscricao` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `nota1` DECIMAL NULL,
  `nota300` DECIMAL NULL,
  `nota_final` DECIMAL NULL,
  `acrescimo` DECIMAL NULL,
  `grupo` CHAR NULL,
  `dt_inscricao` DATETIME NULL,
  `lider` BIT NULL,
  `situacao` INT NULL,
  `aluno_id` INT NOT NULL,
  `atividade_id` INT NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `inscricao_i01` (`aluno_id` ASC),
  INDEX `inscricao_i02` (`atividade_id` ASC),
  CONSTRAINT `fk_inscricao_usuario_01`
    FOREIGN KEY (`aluno_id`)
    REFERENCES `pro300`.`usuario` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_inscricao_atividade_01`
    FOREIGN KEY (`atividade_id`)
    REFERENCES `pro300`.`atividade` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `pro300`.`avaliacao`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `pro300`.`avaliacao` ;

CREATE TABLE IF NOT EXISTS `pro300`.`avaliacao` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `avaliador_id` INT NOT NULL,
  `avaliado_id` INT NOT NULL,
  `nota` DECIMAL NULL,
  PRIMARY KEY (`id`),
  UNIQUE INDEX `avaliacao_i01` (`avaliador_id` ASC),
  INDEX `avaliacao_i02` (`avaliado_id` ASC),
  CONSTRAINT `fk_avaliacao_inscricao_01`
    FOREIGN KEY (`avaliador_id`)
    REFERENCES `pro300`.`inscricao` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_avaliacao_inscricao_02`
    FOREIGN KEY (`avaliado_id`)
    REFERENCES `pro300`.`inscricao` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `pro300`.`parametro_prova`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `pro300`.`parametro_prova` ;

CREATE TABLE IF NOT EXISTS `pro300`.`parametro_prova` (
  `cod_parametro` INT NOT NULL AUTO_INCREMENT,
  `valor_media_min_melhoria` DECIMAL NOT NULL,
  `valor_media_max_melhoria` DECIMAL NOT NULL,
  `media1` DECIMAL NOT NULL,
  `media2` DECIMAL NOT NULL,
  `media3` DECIMAL NOT NULL,
  `media4` DECIMAL NOT NULL,
  `media5` DECIMAL NOT NULL,
  PRIMARY KEY (`cod_parametro`),
  UNIQUE INDEX `tb_parametro_prova_i1` (`valor_media_min_melhoria` ASC, `valor_media_max_melhoria` ASC))
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;

-- -----------------------------------------------------
-- Data for table `pro300`.`perfil`
-- -----------------------------------------------------
START TRANSACTION;
USE `pro300`;
INSERT INTO `pro300`.`perfil` (`id`, `perfil`) VALUES (1, 'Administrador');
INSERT INTO `pro300`.`perfil` (`id`, `perfil`) VALUES (2, 'Coordenador');
INSERT INTO `pro300`.`perfil` (`id`, `perfil`) VALUES (3, 'Professor');
INSERT INTO `pro300`.`perfil` (`id`, `perfil`) VALUES (4, 'Aluno');

COMMIT;


-- -----------------------------------------------------
-- Data for table `pro300`.`usuario`
-- -----------------------------------------------------
START TRANSACTION;
USE `pro300`;
INSERT INTO `pro300`.`usuario` (`id`, `email`, `senha`, `ra`, `nome`, `telefone`, `perfil_id`) VALUES (DEFAULT, 'admin@newtonpaiva.br', sha1('123'), 'null', 'Administrador', '9 0000-0000', 1);

COMMIT;


-- -----------------------------------------------------
-- Data for table `pro300`.`curso`
-- -----------------------------------------------------
START TRANSACTION;
USE `pro300`;
INSERT INTO `pro300`.`curso` (`id`, `nome`, `ativo`) VALUES (DEFAULT, 'Matemática', DEFAULT);
INSERT INTO `pro300`.`curso` (`id`, `nome`, `ativo`) VALUES (DEFAULT, 'Sistemas de Informação', DEFAULT);
INSERT INTO `pro300`.`curso` (`id`, `nome`, `ativo`) VALUES (DEFAULT, 'Arquitetura', DEFAULT);
INSERT INTO `pro300`.`curso` (`id`, `nome`, `ativo`) VALUES (DEFAULT, 'Engenharia Elétrica', DEFAULT);
INSERT INTO `pro300`.`curso` (`id`, `nome`, `ativo`) VALUES (DEFAULT, 'Engenharia de Produção', DEFAULT);
INSERT INTO `pro300`.`curso` (`id`, `nome`, `ativo`) VALUES (DEFAULT, 'Engenharia Ambiental e Sanitária', DEFAULT);
INSERT INTO `pro300`.`curso` (`id`, `nome`, `ativo`) VALUES (DEFAULT, 'Arquitetura e Urbanismo', DEFAULT);
INSERT INTO `pro300`.`curso` (`id`, `nome`, `ativo`) VALUES (DEFAULT, 'Engenharia Química', DEFAULT);
INSERT INTO `pro300`.`curso` (`id`, `nome`, `ativo`) VALUES (DEFAULT, 'Engenharia de Controle e Automação', DEFAULT);
INSERT INTO `pro300`.`curso` (`id`, `nome`, `ativo`) VALUES (DEFAULT, 'Engenharia Civil', DEFAULT);
INSERT INTO `pro300`.`curso` (`id`, `nome`, `ativo`) VALUES (DEFAULT, 'Engenharia Mecânica', DEFAULT);

COMMIT;

