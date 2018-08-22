ALTER TABLE `usuario` ADD `telefone` VARCHAR( 20 ) NULL AFTER `nome` ;

ALTER TABLE `inscricao` DROP `acrescimo`;
ALTER TABLE `inscricao` DROP `nota_final`;
ALTER TABLE `inscricao` CHANGE `lider` `lider` TINYINT(1) NULL DEFAULT NULL;