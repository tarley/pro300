-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 13-Out-2016 às 04:21
-- Versão do servidor: 10.1.10-MariaDB
-- PHP Version: 7.0.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_300`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `professor`
--

CREATE TABLE `professor` (
  `cod_professor` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_administrador`
--

CREATE TABLE `tb_administrador` (
  `cod_admim` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_aluno`
--

CREATE TABLE `tb_aluno` (
  `cod_aluno` int(11) NOT NULL,
  `telefone` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_atividade`
--

CREATE TABLE `tb_atividade` (
  `cod_atividade` int(11) NOT NULL,
  `desc_atividade` varchar(500) DEFAULT NULL,
  `token` varchar(100) DEFAULT NULL,
  `data_inicio` datetime DEFAULT NULL,
  `data_fim` datetime DEFAULT NULL,
  `data_encerramento_ativ` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_avaliacao`
--

CREATE TABLE `tb_avaliacao` (
  `cod_avaliacao` int(11) NOT NULL,
  `cod_inscricao_avaliador` int(11) DEFAULT NULL,
  `cod_inscricao_avaliado` int(11) DEFAULT NULL,
  `nota` decimal(10,0) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_grupo`
--

CREATE TABLE `tb_grupo` (
  `cod_grupo` int(11) NOT NULL,
  `num_grupo` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_inscricao`
--

CREATE TABLE `tb_inscricao` (
  `cod_inscricao` int(11) NOT NULL,
  `cod_aluno` int(11) DEFAULT NULL,
  `cod_atividade` int(11) DEFAULT NULL,
  `cod_prova` int(11) DEFAULT NULL,
  `cod_grupo` int(11) DEFAULT NULL,
  `data_inscricao` datetime DEFAULT NULL,
  `lider` varchar(50) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_parametro_prova`
--

CREATE TABLE `tb_parametro_prova` (
  `cod_parametro` int(11) NOT NULL,
  `valor_media_min_melhora` decimal(10,0) DEFAULT NULL,
  `valor_media_max_melhora` decimal(10,0) DEFAULT NULL,
  `media1` decimal(10,0) DEFAULT NULL,
  `media2` decimal(10,0) DEFAULT NULL,
  `media3` decimal(10,0) DEFAULT NULL,
  `media4` decimal(10,0) DEFAULT NULL,
  `media5` decimal(10,0) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_prova`
--

CREATE TABLE `tb_prova` (
  `cod_prova` int(11) NOT NULL,
  `p1` decimal(10,0) DEFAULT NULL,
  `p300` decimal(10,0) DEFAULT NULL,
  `nota_final` decimal(10,0) DEFAULT NULL,
  `acrescimo` decimal(10,0) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_usuario`
--

CREATE TABLE `tb_usuario` (
  `cod_usuario` int(11) NOT NULL,
  `email` varchar(50) DEFAULT NULL,
  `senha` varchar(20) DEFAULT NULL,
  `nome` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `professor`
--
ALTER TABLE `professor`
  ADD PRIMARY KEY (`cod_professor`);

--
-- Indexes for table `tb_administrador`
--
ALTER TABLE `tb_administrador`
  ADD PRIMARY KEY (`cod_admim`);

--
-- Indexes for table `tb_aluno`
--
ALTER TABLE `tb_aluno`
  ADD PRIMARY KEY (`cod_aluno`);

--
-- Indexes for table `tb_atividade`
--
ALTER TABLE `tb_atividade`
  ADD PRIMARY KEY (`cod_atividade`);

--
-- Indexes for table `tb_avaliacao`
--
ALTER TABLE `tb_avaliacao`
  ADD PRIMARY KEY (`cod_avaliacao`),
  ADD KEY `FK_AVALIACA_INSCRICAO_INSCRICA` (`cod_inscricao_avaliado`),
  ADD KEY `FK_AVALIACA_INSCRICAO_INSCRICA_AVALIADOR` (`cod_inscricao_avaliador`);

--
-- Indexes for table `tb_grupo`
--
ALTER TABLE `tb_grupo`
  ADD PRIMARY KEY (`cod_grupo`);

--
-- Indexes for table `tb_inscricao`
--
ALTER TABLE `tb_inscricao`
  ADD PRIMARY KEY (`cod_inscricao`),
  ADD KEY `FK_INSCRICA_GRUPO_INS_GRUPO` (`cod_grupo`),
  ADD KEY `FK_INSCRICA_IINSCRICA_ATIVIDAD` (`cod_atividade`),
  ADD KEY `FK_INSCRICA_INSCRICAO_ALUNO` (`cod_aluno`),
  ADD KEY `FK_INSCRICA_INSCRICAO_PROVA` (`cod_prova`);

--
-- Indexes for table `tb_parametro_prova`
--
ALTER TABLE `tb_parametro_prova`
  ADD PRIMARY KEY (`cod_parametro`);

--
-- Indexes for table `tb_prova`
--
ALTER TABLE `tb_prova`
  ADD PRIMARY KEY (`cod_prova`);

--
-- Indexes for table `tb_usuario`
--
ALTER TABLE `tb_usuario`
  ADD PRIMARY KEY (`cod_usuario`);

--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `professor`
--
ALTER TABLE `professor`
  ADD CONSTRAINT `professor_ibfk_1` FOREIGN KEY (`cod_professor`) REFERENCES `tb_usuario` (`cod_usuario`);

--
-- Limitadores para a tabela `tb_administrador`
--
ALTER TABLE `tb_administrador`
  ADD CONSTRAINT `tb_administrador_ibfk_1` FOREIGN KEY (`cod_admim`) REFERENCES `tb_usuario` (`cod_usuario`);

--
-- Limitadores para a tabela `tb_aluno`
--
ALTER TABLE `tb_aluno`
  ADD CONSTRAINT `tb_aluno_ibfk_1` FOREIGN KEY (`cod_aluno`) REFERENCES `tb_usuario` (`cod_usuario`);

--
-- Limitadores para a tabela `tb_avaliacao`
--
ALTER TABLE `tb_avaliacao`
  ADD CONSTRAINT `FK_AVALIACA_INSCRICAO_INSCRICA` FOREIGN KEY (`cod_inscricao_avaliado`) REFERENCES `tb_inscricao` (`cod_inscricao`),
  ADD CONSTRAINT `FK_AVALIACA_INSCRICAO_INSCRICA_AVALIADOR` FOREIGN KEY (`cod_inscricao_avaliador`) REFERENCES `tb_inscricao` (`cod_inscricao`);

--
-- Limitadores para a tabela `tb_inscricao`
--
ALTER TABLE `tb_inscricao`
  ADD CONSTRAINT `FK_INSCRICA_GRUPO_INS_GRUPO` FOREIGN KEY (`cod_grupo`) REFERENCES `tb_grupo` (`cod_grupo`),
  ADD CONSTRAINT `FK_INSCRICA_IINSCRICA_ATIVIDAD` FOREIGN KEY (`cod_atividade`) REFERENCES `tb_atividade` (`cod_atividade`),
  ADD CONSTRAINT `FK_INSCRICA_INSCRICAO_ALUNO` FOREIGN KEY (`cod_aluno`) REFERENCES `tb_aluno` (`cod_aluno`),
  ADD CONSTRAINT `FK_INSCRICA_INSCRICAO_PROVA` FOREIGN KEY (`cod_prova`) REFERENCES `tb_prova` (`cod_prova`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
