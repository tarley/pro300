-- -----------------------------------------------------
-- Table `pro300`.`inscricao_historico`
-- -----------------------------------------------------
DROP TABLE IF EXISTS inscricao_historico;

CREATE TABLE IF NOT EXISTS inscricao_historico (
  data TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
  id INT NOT NULL,
  nota1 DECIMAL(5,2) NULL,
  nota300 DECIMAL(5,2) NULL,
  grupo CHAR NULL,
  dt_inscricao DATETIME NULL,
  lider TINYINT NULL,
  aluno_id INT NOT NULL,
  atividade_id INT NOT NULL,
  tipo_acao CHAR(1) NOT NULL,
  PRIMARY KEY (data, id),
  INDEX inscricao_historico_i01 (aluno_id ASC),
  INDEX inscricao_historico_i02 (atividade_id ASC))
ENGINE = InnoDB;

