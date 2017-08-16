-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Aug 16, 2017 at 02:03 AM
-- Server version: 5.5.54-0ubuntu0.14.04.1
-- PHP Version: 5.5.9-1ubuntu4.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `pro300`
--

-- --------------------------------------------------------

--
-- Table structure for table `atividade`
--

CREATE TABLE IF NOT EXISTS `atividade` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(100) NOT NULL,
  `descricao` varchar(500) NOT NULL,
  `dt_registro` datetime NOT NULL,
  `dt_inicio` datetime NOT NULL,
  `dt_termino` datetime NOT NULL,
  `dt_inicio_avaliacao` datetime DEFAULT NULL,
  `dt_encerramento` datetime DEFAULT NULL,
  `professor_id` int(11) NOT NULL,
  `curso_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `atividade_i01` (`professor_id`),
  KEY `atividade_i02` (`nome`),
  KEY `atividade_i03` (`descricao`(255)),
  KEY `atividade_i04` (`dt_inicio`,`dt_termino`),
  KEY `atividade_i05` (`dt_encerramento`),
  KEY `atividade_i06` (`curso_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `atividade`
--

INSERT INTO `atividade` (`id`, `nome`, `descricao`, `dt_registro`, `dt_inicio`, `dt_termino`, `dt_inicio_avaliacao`, `dt_encerramento`, `professor_id`, `curso_id`) VALUES
(1, 'Projeto Web 2017_02', 'Programação de aplicações na Web.', '2017-07-21 00:00:00', '2017-07-03 00:00:00', '2017-12-31 00:00:00', NULL, NULL, 1, 2),
(2, 'Programação para dispositivos móveis 2017_2', 'alsdfjladfjlajdfklasdf\nasdf\nasdf\nas', '2017-07-21 00:00:00', '2017-07-02 00:00:00', '2017-07-31 00:00:00', NULL, NULL, 1, 2),
(3, 'Teste matemática', 'Testes descrição de matemática', '2017-07-21 00:00:00', '2017-07-02 00:00:00', '2017-12-31 00:00:00', NULL, NULL, 1, 1),
(4, 'Atividade 300 EE 2017 - 02', 'Teste', '2017-07-22 00:00:00', '2017-07-03 00:00:00', '2017-07-04 00:00:00', NULL, NULL, 1, 4),
(5, 'teste', 'teste', '2017-07-23 00:00:00', '2017-07-31 00:00:00', '2017-08-31 00:00:00', NULL, NULL, 1, 8),
(6, 'teste', 'tese', '2017-07-23 00:00:00', '2017-07-02 00:00:00', '2017-07-03 00:00:00', NULL, NULL, 1, 9);

-- --------------------------------------------------------

--
-- Table structure for table `avaliacao`
--

CREATE TABLE IF NOT EXISTS `avaliacao` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `avaliador_id` int(11) NOT NULL,
  `avaliado_id` int(11) NOT NULL,
  `nota` decimal(10,0) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `avaliacao_i01` (`avaliador_id`),
  KEY `avaliacao_i02` (`avaliado_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `curso`
--

CREATE TABLE IF NOT EXISTS `curso` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(100) NOT NULL,
  `ativo` bit(1) NOT NULL DEFAULT b'1',
  PRIMARY KEY (`id`),
  UNIQUE KEY `curso_i01` (`nome`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=12 ;

--
-- Dumping data for table `curso`
--

INSERT INTO `curso` (`id`, `nome`, `ativo`) VALUES
(1, 'Matemática', b'1'),
(2, 'Sistemas de Informação', b'1'),
(3, 'Arquitetura', b'1'),
(4, 'Engenharia Elétrica', b'1'),
(5, 'Engenharia de Produção', b'1'),
(6, 'Engenharia Ambiental e Sanitária', b'1'),
(7, 'Arquitetura e Urbanismo', b'1'),
(8, 'Engenharia Química', b'1'),
(9, 'Engenharia de Controle e Automação', b'1'),
(10, 'Engenharia Civil', b'1'),
(11, 'Engenharia Mecânica', b'1');

-- --------------------------------------------------------

--
-- Table structure for table `inscricao`
--

CREATE TABLE IF NOT EXISTS `inscricao` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nota1` decimal(10,0) DEFAULT NULL,
  `nota300` decimal(10,0) DEFAULT NULL,
  `nota_final` decimal(10,0) DEFAULT NULL,
  `acrescimo` decimal(10,0) DEFAULT NULL,
  `grupo` char(1) DEFAULT NULL,
  `dt_inscricao` datetime DEFAULT NULL,
  `lider` bit(1) DEFAULT NULL,
  `aluno_id` int(11) NOT NULL,
  `atividade_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `inscricao_i01` (`aluno_id`),
  KEY `inscricao_i02` (`atividade_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `inscricao`
--

INSERT INTO `inscricao` (`id`, `nota1`, `nota300`, `nota_final`, `acrescimo`, `grupo`, `dt_inscricao`, `lider`, `aluno_id`, `atividade_id`) VALUES
(1, '3', '3', NULL, NULL, 'B', '2017-08-01 00:00:00', b'1', 2, 1),
(2, '3', NULL, NULL, NULL, 'A', '2017-08-01 00:00:00', b'1', 3, 1),
(3, '3', NULL, NULL, NULL, 'C', '2017-08-16 00:00:00', b'1', 4, 1);

-- --------------------------------------------------------

--
-- Table structure for table `parametro_prova`
--

CREATE TABLE IF NOT EXISTS `parametro_prova` (
  `cod_parametro` int(11) NOT NULL AUTO_INCREMENT,
  `valor_media_min_melhoria` decimal(10,0) NOT NULL,
  `valor_media_max_melhoria` decimal(10,0) NOT NULL,
  `media1` decimal(10,0) NOT NULL,
  `media2` decimal(10,0) NOT NULL,
  `media3` decimal(10,0) NOT NULL,
  `media4` decimal(10,0) NOT NULL,
  `media5` decimal(10,0) NOT NULL,
  PRIMARY KEY (`cod_parametro`),
  UNIQUE KEY `tb_parametro_prova_i1` (`valor_media_min_melhoria`,`valor_media_max_melhoria`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `perfil`
--

CREATE TABLE IF NOT EXISTS `perfil` (
  `id` int(11) NOT NULL,
  `perfil` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `perfil`
--

INSERT INTO `perfil` (`id`, `perfil`) VALUES
(1, 'Administrador'),
(2, 'Coordenador'),
(3, 'Professor'),
(4, 'Aluno');

-- --------------------------------------------------------

--
-- Table structure for table `usuario`
--

CREATE TABLE IF NOT EXISTS `usuario` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(50) NOT NULL,
  `senha` varchar(100) NOT NULL,
  `ra` varchar(20) DEFAULT NULL,
  `nome` varchar(255) NOT NULL,
  `perfil_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `usuario_i01` (`email`),
  KEY `usuario_i02` (`perfil_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `usuario`
--

INSERT INTO `usuario` (`id`, `email`, `senha`, `ra`, `nome`, `perfil_id`) VALUES
(1, 'admin@newtonpaiva.br', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 'null', 'Administrador', 1),
(2, 'aluno@newtonpaiva.br', '8cb2237d0679ca88db6464eac60da96345513964', '123456', 'Aluno Teste', 4),
(3, 'aluno2@newtonpaiva.br', '8cb2237d0679ca88db6464eac60da96345513964', '444444', 'Aluno2', 4),
(4, 'aluno3@newtonpaiva.br', '8cb2237d0679ca88db6464eac60da96345513964', '998877', 'Aluno 3', 4);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `atividade`
--
ALTER TABLE `atividade`
  ADD CONSTRAINT `fk_atividade_curso_01` FOREIGN KEY (`curso_id`) REFERENCES `curso` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_atividade_usuario_01` FOREIGN KEY (`professor_id`) REFERENCES `usuario` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `avaliacao`
--
ALTER TABLE `avaliacao`
  ADD CONSTRAINT `fk_avaliacao_inscricao_01` FOREIGN KEY (`avaliador_id`) REFERENCES `inscricao` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_avaliacao_inscricao_02` FOREIGN KEY (`avaliado_id`) REFERENCES `inscricao` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `inscricao`
--
ALTER TABLE `inscricao`
  ADD CONSTRAINT `fk_inscricao_atividade_01` FOREIGN KEY (`atividade_id`) REFERENCES `atividade` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_inscricao_usuario_01` FOREIGN KEY (`aluno_id`) REFERENCES `usuario` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `usuario`
--
ALTER TABLE `usuario`
  ADD CONSTRAINT `fk_usuario_perfil_01` FOREIGN KEY (`perfil_id`) REFERENCES `perfil` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
