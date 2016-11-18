--=======
--Usuario
--=======

INSERT INTO tb_usuario (`email`, `senha`, `ra`, `nome`, `telefone`, `perfil`)
VALUES ('rodrigorodrigues@gmail.com', '123', '222', 'Rodrigo', '3155', 'P');

INSERT INTO tb_usuario (`email`, `senha`, `ra`, `nome`, `telefone`, `perfil`)
VALUES ('katernetz@gmail.com', '123', '111', 'Ater', '3155', 'P');

INSERT INTO tb_usuario (`email`, `senha`, `ra`, `nome`, `telefone`, `perfil`)
VALUES ('brunomonteiro@gmail.com', '123', '333', 'Bruno', '3155', 'P');

INSERT INTO tb_usuario (`email`, `senha`, `ra`, `nome`, `telefone`, `perfil`)
VALUES ('manuelsilva@gmail.com', '123', '444', 'Manoel', '3155', 'A');

INSERT INTO tb_usuario (`email`, `senha`, `ra`, `nome`, `telefone`, `perfil`)
VALUES ('carloshenrique@gmail.com', '123', '555', 'Carlos', '3155', 'A')

--====================
--Criptografar a senha
--====================

UPDATE tb_usuario set senha = sha1(123)
WHERE cod_usuario = 1;

UPDATE tb_usuario set senha = sha1(123)
WHERE cod_usuario = 2;

UPDATE tb_usuario set senha = sha1(123)
WHERE cod_usuario = 3;

UPDATE tb_usuario set senha = sha1(123)
WHERE cod_usuario = 4;

UPDATE tb_usuario set senha = sha1(123)
WHERE cod_usuario = 5

--===========
--Atividades
--===========

INSERT INTO tb_atividade (`desc_atividade`, `token`, `data_inicio`, `data_fim`, `data_encerramento_atv`, `cod_professor`) 
VALUES ('Álgebra Linear', '456', '2016/1/10', '2016/1/11', NULL, '1'); 

INSERT INTO tb_atividade (`desc_atividade`, `token`, `data_inicio`, `data_fim`, `data_encerramento_atv`, `cod_professor`) 
VALUES ('Probabilidade', '433', '2016/5/12', '2016/5/13', NULL, '1'); 

INSERT INTO tb_atividade (`desc_atividade`, `token`, `data_inicio`, `data_fim`, `data_encerramento_atv`, `cod_professor`) 
VALUES ('Instalações Hidráulicas', '422', '2016/6/15', '2016/6/16', NULL, '1'); 

INSERT INTO tb_atividade (`desc_atividade`, `token`, `data_inicio`, `data_fim`, `data_encerramento_atv`, `cod_professor`) 
VALUES ('Cálculo Vetorial', '566', '2016/3/11', '2016/3/12', 'NuLL', '2'); 

INSERT INTO tb_atividade (`desc_atividade`, `token`, `data_inicio`, `data_fim`, `data_encerramento_atv`, `cod_professor`) 
VALUES ('Estatística', '454', '2016/2/11', '2016/2/12', 'NULL', '3') 

--=========
--Inscrição
--=========

INSERT INTO tb_inscricao (`p1`, `p300`, `nota_final`, `acrescimo`, `grupo`, `data_inscricao`, `lider`, `situacao`, `cod_aluno`, `cod_atividade`) 
VALUES ('21', NULL, NULL, NULL, 1, '2016/10/25', '1', '1', '1', '1'); 

INSERT INTO tb_inscricao (`p1`, `p300`, `nota_final`, `acrescimo`, `grupo`, `data_inscricao`, `lider`, `situacao`, `cod_aluno`, `cod_atividade`) 
VALUES ('15', NULL, NULL, NULL, 1, '2016/09/15', '0', '1', '2', '1');

INSERT INTO tb_inscricao (`p1`, `p300`, `nota_final`, `acrescimo`, `grupo`, `data_inscricao`, `lider`, `situacao`, `cod_aluno`, `cod_atividade`) 
VALUES ('11', NULL, NULL, NULL, 1, '2016/09/20', '0', '1', '3', '1');

INSERT INTO tb_inscricao (`p1`, `p300`, `nota_final`, `acrescimo`, `grupo`, `data_inscricao`, `lider`, `situacao`, `cod_aluno`, `cod_atividade`) 
VALUES ('17', NULL, NULL, NULL, 1, '2016/10/02', '0', '1', '4', '1');

INSERT INTO tb_inscricao (`p1`, `p300`, `nota_final`, `acrescimo`, `grupo`, `data_inscricao`, `lider`, `situacao`, `cod_aluno`, `cod_atividade`) 
VALUES ('12', NULL, NULL, NULL, 1, '2016/10/03', '0', '1', '5', '1')


