ALTER TABLE `inscricao` ADD UNIQUE `inscricao_i03` (
`aluno_id` ,
`atividade_id`
);


--ALTER TABLE `inscricao` DROP INDEX `aluno_id` ,
--ADD UNIQUE `inscricao_i03` ( `aluno_id` , `atividade_id` ) COMMENT '';