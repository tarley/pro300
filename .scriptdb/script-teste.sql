DELETE FROM avaliacao;
DELETE FROM inscricao;
DELETE FROM atividade;

DELETE FROM usuario 
 WHERE email LIKE 'a0%'
    OR email LIKE 'a1%'
    OR email LIKE 'a2%';

DELETE FROM inscricao_historico;

INSERT INTO usuario(email, senha, ra, nome, telefone, perfil_id) 
VALUES 
('a01@a.br',sha1('123'),'100001', 'Aluno 01','3133330001', 4),
('a02@a.br',sha1('123'),'100002', 'Aluno 02','3133330002', 4),
('a03@a.br',sha1('123'),'100003', 'Aluno 03','3133330003', 4),
('a04@a.br',sha1('123'),'100004', 'Aluno 04','3133330004', 4),
('a05@a.br',sha1('123'),'100005', 'Aluno 05','3133330005', 4),
('a06@a.br',sha1('123'),'100006', 'Aluno 06','3133330006', 4),
('a07@a.br',sha1('123'),'100007', 'Aluno 07','3133330007', 4),
('a08@a.br',sha1('123'),'100008', 'Aluno 08','3133330008', 4),
('a09@a.br',sha1('123'),'100009', 'Aluno 09','3133330009', 4),
('a10@a.br',sha1('123'),'100010', 'Aluno 10','3133330010', 4),
('a11@a.br',sha1('123'),'100011', 'Aluno 11','3133330011', 4),
('a12@a.br',sha1('123'),'100012', 'Aluno 12','3133330012', 4),
('a13@a.br',sha1('123'),'100013', 'Aluno 13','3133330013', 4),
('a14@a.br',sha1('123'),'100014', 'Aluno 14','3133330014', 4),
('a15@a.br',sha1('123'),'100015', 'Aluno 15','3133330015', 4),
('a16@a.br',sha1('123'),'100016', 'Aluno 16','3133330016', 4),
('a17@a.br',sha1('123'),'100017', 'Aluno 17','3133330017', 4),
('a18@a.br',sha1('123'),'100018', 'Aluno 18','3133330018', 4),
('a19@a.br',sha1('123'),'100019', 'Aluno 19','3133330019', 4),
('a20@a.br',sha1('123'),'100020', 'Aluno 20','3133330020', 4);

INSERT INTO atividade(nome, descricao, 
dt_registro, dt_inicio, dt_termino, 
professor_id, curso_id) 
VALUES ('Atividade de teste', 'Atividade criada para testes da solução',
now(), now(), DATE_ADD(now(), INTERVAL 6 MONTH), 
(SELECT id FROM usuario WHERE email = 'allan.ferreira@newtonpaiva.br'), 
(SELECT id FROM curso WHERE nome = 'Sistemas de Informação'))


INSERT INTO inscricao(dt_inscricao, aluno_id, atividade_id) 
SELECT now(), id, (SELECT id FROM atividade WHERE nome =  'Atividade de teste')
  FROM usuario
 WHERE email LIKE 'a%@a.br'
 
 
 
 
