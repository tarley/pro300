
INSERT INTO usuario(email, senha, ra, nome, telefone, perfil_id) 
VALUES 
('a01@a.br',sha1('123'),'100001', 'Aluno 01','(31) 3333-0001', 4),
('a02@a.br',sha1('123'),'100002', 'Aluno 02','(31) 3333-0002', 4),
('a03@a.br',sha1('123'),'100003', 'Aluno 03','(31) 3333-0003', 4),
('a04@a.br',sha1('123'),'100004', 'Aluno 04','(31) 3333-0004', 4),
('a05@a.br',sha1('123'),'100005', 'Aluno 05','(31) 3333-0005', 4),
('a06@a.br',sha1('123'),'100006', 'Aluno 06','(31) 3333-0006', 4),
('a07@a.br',sha1('123'),'100007', 'Aluno 07','(31) 3333-0007', 4),
('a08@a.br',sha1('123'),'100008', 'Aluno 08','(31) 3333-0008', 4),
('a09@a.br',sha1('123'),'100009', 'Aluno 09','(31) 3333-0009', 4),
('a10@a.br',sha1('123'),'100010', 'Aluno 10','(31) 3333-0010', 4),
('a11@a.br',sha1('123'),'100011', 'Aluno 11','(31) 3333-0011', 4),
('a12@a.br',sha1('123'),'100012', 'Aluno 12','(31) 3333-0012', 4),
('a13@a.br',sha1('123'),'100013', 'Aluno 13','(31) 3333-0013', 4),
('a14@a.br',sha1('123'),'100014', 'Aluno 14','(31) 3333-0014', 4),
('a15@a.br',sha1('123'),'100015', 'Aluno 15','(31) 3333-0015', 4),
('a16@a.br',sha1('123'),'100016', 'Aluno 16','(31) 3333-0016', 4),
('a17@a.br',sha1('123'),'100017', 'Aluno 17','(31) 3333-0017', 4),
('a18@a.br',sha1('123'),'100018', 'Aluno 18','(31) 3333-0018', 4),
('a19@a.br',sha1('123'),'100019', 'Aluno 19','(31) 3333-0019', 4),
('a20@a.br',sha1('123'),'100020', 'Aluno 20','(31) 3333-0020', 4);

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