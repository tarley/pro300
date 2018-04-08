DELIMITER $$
BEGIN
/**************************************************************/
/* Criar 20 inscrições */
/**************************************************************/
INSERT INTO usuario(email, senha, ra, nome, telefone, perfil_id) 
VALUES 
('a01@a.br',sha1('123'),'100001', 'Aluno 01','3333-0001', 3),
('a02@a.br',sha1('123'),'100002', 'Aluno 02','3333-0002', 3),
('a03@a.br',sha1('123'),'100003', 'Aluno 03','3333-0003', 3),
('a04@a.br',sha1('123'),'100004', 'Aluno 04','3333-0004', 3),
('a05@a.br',sha1('123'),'100005', 'Aluno 05','3333-0005', 3),
('a06@a.br',sha1('123'),'100006', 'Aluno 06','3333-0006', 3),
('a07@a.br',sha1('123'),'100007', 'Aluno 07','3333-0007', 3),
('a08@a.br',sha1('123'),'100008', 'Aluno 08','3333-0008', 3),
('a09@a.br',sha1('123'),'100009', 'Aluno 09','3333-0009', 3),
('a10@a.br',sha1('123'),'100010', 'Aluno 10','3333-0010', 3),
('a11@a.br',sha1('123'),'100011', 'Aluno 11','3333-0011', 3),
('a12@a.br',sha1('123'),'100012', 'Aluno 12','3333-0012', 3),
('a13@a.br',sha1('123'),'100013', 'Aluno 13','3333-0013', 3),
('a14@a.br',sha1('123'),'100014', 'Aluno 14','3333-0014', 3),
('a15@a.br',sha1('123'),'100015', 'Aluno 15','3333-0015', 3),
('a16@a.br',sha1('123'),'100016', 'Aluno 16','3333-0016', 3),
('a17@a.br',sha1('123'),'100017', 'Aluno 17','3333-0017', 3),
('a18@a.br',sha1('123'),'100018', 'Aluno 18','3333-0018', 3),
('a19@a.br',sha1('123'),'100019', 'Aluno 19','3333-0019', 3),
('a20@a.br',sha1('123'),'100020', 'Aluno 20','3333-0020', 3);

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

 
 

END $$
DELIMITER ;
