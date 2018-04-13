USE PRO300;

-----------------------------
-- 	 Triggers 	 ----
----------------------------- 
DELIMITER $
CREATE TRIGGER TG_UPDATE_INSCRICAO BEFORE UPDATE 
ON inscricao
FOR EACH ROW
BEGIN
IF OLD.nota1 <> NEW.nota1 OR OLD.nota300 <> new.nota300 OR OLD.grupo <> NEW.grupo OR OLD.lider <> NEW.lider THEN
INSERT INTO inscricao_historico (id, nota1, nota300, grupo, dt_inscricao, lider, aluno_id, atividade_id, tipo_acao)
VALUES(OLD.id, OLD.nota1, OLD.nota300, OLD.grupo, OLD.dt_inscricao, OLD.lider, OLD.aluno_id, OLD.atividade_id, 'U');
END IF;
END $

DELIMITER ;

DELIMITER $

CREATE TRIGGER TG_DELETE_INSCRICAO BEFORE DELETE 
ON inscricao
FOR EACH ROW
BEGIN
INSERT INTO inscricao_historico (id, nota1, nota300, grupo, dt_inscricao, lider, aluno_id, atividade_id, tipo_acao)
VALUES(OLD.id, OLD.nota1, OLD.nota300, OLD.grupo, OLD.dt_inscricao, OLD.lider, OLD.aluno_id, OLD.atividade_id, 'D');
END $

DELIMITER ;

-- ---------------------------
--  Primeiros Inserts --------
-- ---------------------------

-- Insert Cursos
INSERT INTO `pro300`.`curso` (`id`, `nome`, `ativo`) VALUES (1, 'Matemática', DEFAULT);
INSERT INTO `pro300`.`curso` (`id`, `nome`, `ativo`) VALUES (2, 'Sistemas de Informação', DEFAULT);
INSERT INTO `pro300`.`curso` (`id`, `nome`, `ativo`) VALUES (3, 'Arquitetura', DEFAULT);
INSERT INTO `pro300`.`curso` (`id`, `nome`, `ativo`) VALUES (4, 'Engenharia Elétrica', DEFAULT);
INSERT INTO `pro300`.`curso` (`id`, `nome`, `ativo`) VALUES (5, 'Engenharia de Produção', DEFAULT);
INSERT INTO `pro300`.`curso` (`id`, `nome`, `ativo`) VALUES (6, 'Engenharia Ambiental e Sanitária', DEFAULT);
INSERT INTO `pro300`.`curso` (`id`, `nome`, `ativo`) VALUES (7, 'Arquitetura e Urbanismo', DEFAULT);
INSERT INTO `pro300`.`curso` (`id`, `nome`, `ativo`) VALUES (8, 'Engenharia Química', DEFAULT);
INSERT INTO `pro300`.`curso` (`id`, `nome`, `ativo`) VALUES (9, 'Engenharia de Controle e Automação', DEFAULT);
INSERT INTO `pro300`.`curso` (`id`, `nome`, `ativo`) VALUES (10, 'Engenharia Civil', DEFAULT);
INSERT INTO `pro300`.`curso` (`id`, `nome`, `ativo`) VALUES (11, 'Engenharia Mecânica', DEFAULT);

-- Insert Perfil
INSERT INTO perfil VALUES (1, 'TESTE');
INSERT INTO perfil VALUES (2, 'TESTE2');

-- Insert Usuario
INSERT INTO usuario VALUES(1, 'carlos@teste.com', '123', '11520960', 'carlos', '33975486', 1);
INSERT INTO usuario VALUES(2, 'jose@teste.com', '123', '18520650', 'jose', '33874586', 1);
INSERT INTO usuario VALUES(3, 'eduardo@teste.com', '123', '1254660', 'eduardo', '36589786', 1);
INSERT INTO usuario VALUES(4, 'lucas@teste.com', '123', '11451368', 'lucas', '99875486', 1);
INSERT INTO usuario VALUES(5, 'laura@teste.com', '123', '11545660', 'laura', '33975486', 2);
INSERT INTO usuario VALUES(6, 'maria@teste.com', '123', '18789650', 'maria', '33874586', 2);
INSERT INTO usuario VALUES(7, 'julia@teste.com', '123', '1254523', 'julia', '36589786', 2);
INSERT INTO usuario VALUES(8, 'thais@teste.com', '123', '11478168', 'thais', '99875486', 2);

-- Insert Atv
INSERT INTO atividade VALUES(1, 'AtvTeste', 'teste', NOW(), NOW(), '2018-04-11', NOW(), NULL, 6, 1);
INSERT INTO atividade VALUES(2, 'AtvTeste2', 'teste2', NOW(), NOW(), '2018-04-12', NOW(), NULL, 5, 2);

-- insert Teste Trigger
INSERT INTO inscricao (nota1, nota300, grupo, dt_inscricao, lider, aluno_id, atividade_id)
VALUES (5.00, 8.00, 'B', NOW(), 1, 3, 2);

INSERT INTO inscricao (nota1, nota300, grupo, dt_inscricao, lider, aluno_id, atividade_id)
VALUES (6.00, 9.00, 'C', NOW(), 1, 4, 2);

INSERT INTO inscricao (nota1, nota300, grupo, dt_inscricao, lider, aluno_id, atividade_id)
VALUES (4.00, 7.00, 'A', NOW(), 2, 5, 1);

INSERT INTO inscricao (nota1, nota300, grupo, dt_inscricao, lider, aluno_id, atividade_id)
VALUES (6.00, 6.00, 'D', NOW(), 2, 6, 1);

INSERT INTO inscricao (nota1, nota300, grupo, dt_inscricao, lider, aluno_id, atividade_id)
VALUES (5.00, 8.00, 'B', NOW(), 2, 7, 1);

-- TESTE TRIGGER UPDATE
UPDATE inscricao 
SET nota300 = 8.50 
WHERE aluno_id = 3;

SELECT * FROM inscricao_historico;

-- TESTE TRIGGER DELETE
DELETE FROM inscricao 
WHERE aluno_id = 7;

SELECT *FROM inscricao_historico;