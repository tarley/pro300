DELIMITER $

DROP TRIGGER IF EXISTS TG_UPDATE_INSCRICAO $

CREATE TRIGGER TG_UPDATE_INSCRICAO BEFORE UPDATE 
ON inscricao
FOR EACH ROW
BEGIN
    INSERT INTO inscricao_historico (
        id, nota1, nota300, grupo, 
        dt_inscricao, lider, aluno_id, 
        atividade_id, tipo_acao)
     VALUES(
        OLD.id, OLD.nota1, OLD.nota300, OLD.grupo, 
        OLD.dt_inscricao, OLD.lider, OLD.aluno_id, 
        OLD.atividade_id, 'U');
END $

DROP TRIGGER IF EXISTS TG_DELETE_INSCRICAO $

CREATE TRIGGER TG_DELETE_INSCRICAO BEFORE DELETE 
ON inscricao
FOR EACH ROW
BEGIN
    INSERT INTO inscricao_historico (
        id, nota1, nota300, grupo, 
        dt_inscricao, lider, aluno_id, 
        atividade_id, tipo_acao)
    VALUES(
        OLD.id, OLD.nota1, OLD.nota300, OLD.grupo, 
        OLD.dt_inscricao, OLD.lider, OLD.aluno_id, 
        OLD.atividade_id, 'D');
END $

DELIMITER ;