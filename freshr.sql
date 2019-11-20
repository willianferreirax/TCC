-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 19-Nov-2019 às 05:44
-- Versão do servidor: 5.7.17
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";
create database freshr;

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `freshr`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `avaliacao`
--

use freshr;
CREATE TABLE `avaliacao` (
  `cod_media` int(11) NOT NULL,
  `cod_usuario` int(11) NOT NULL,
  `cod_evento` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `comentario`
--

CREATE TABLE `comentario` (
  `cod_comentario` int(11) NOT NULL,
  `cod_usuario` int(11) NOT NULL,
  `cod_evento` int(11) NOT NULL,
  `comentario` varchar(1024) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `comparecimento`
--

CREATE TABLE `comparecimento` (
  `cod_comp` int(11) NOT NULL,
  `cod_usuario` int(11) NOT NULL,
  `cod_evento` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `evento`
--

CREATE TABLE `evento` (
  `cod_evento` int(11) NOT NULL,
  `nome_evento` varchar(500) CHARACTER SET latin1 COLLATE latin1_general_ci DEFAULT NULL,
  `banner_evento` varchar(250) DEFAULT NULL,
  `data_inicio` varchar(30) DEFAULT NULL,
  `data_termino` varchar(30) DEFAULT NULL,
  `hora_inicio` time DEFAULT NULL,
  `hora_termino` time DEFAULT NULL,
  `endereco_evento` varchar(200) DEFAULT NULL,
  `bairro_evento` varchar(100) DEFAULT NULL,
  `cidade_evento` varchar(150) DEFAULT NULL,
  `estado_evento` varchar(150) DEFAULT NULL,
  `cep_evento` varchar(9) DEFAULT NULL,
  `visibilidade_evento` tinyint(1) DEFAULT NULL,
  `descricao_evento` varchar(500) DEFAULT NULL,
  `detalhes_evento` varchar(1024) NOT NULL,
  `preco_evento` varchar(500) DEFAULT NULL,
  `comp_qnt` int(11) DEFAULT NULL,
  `interesse_qnt` varchar(30) DEFAULT NULL,
  `avaliacoes_qnt` int(11) NOT NULL,
  `CNPJ` varchar(100) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `faculdade`
--

CREATE TABLE `faculdade` (
  `CNPJ` varchar(100) NOT NULL,
  `login_inst` varchar(100) DEFAULT NULL,
  `senha_inst` varchar(500) DEFAULT NULL,
  `nome_inst` varchar(255) DEFAULT NULL,
  `endereco_inst` varchar(200) DEFAULT NULL,
  `bairro_inst` varchar(150) DEFAULT NULL,
  `cidade_inst` varchar(100) DEFAULT NULL,
  `estado_inst` varchar(200) DEFAULT NULL,
  `cep_inst` varchar(10) DEFAULT NULL,
  `email_inst` varchar(300) DEFAULT NULL,
  `telefone_inst` varchar(50) DEFAULT NULL,
  `seguidores_qnt` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `interessado`
--

CREATE TABLE `interessado` (
  `cod_interessado` int(11) NOT NULL,
  `cod_usuario` int(11) NOT NULL,
  `cod_evento` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `interesses_evento`
--

CREATE TABLE `interesses_evento` (
  `cod_interesse_evento` int(11) NOT NULL,
  `interesseeve1` varchar(30) CHARACTER SET latin1 COLLATE latin1_general_ci DEFAULT NULL,
  `interesseeve2` varchar(30) DEFAULT NULL,
  `interesseeve3` varchar(30) DEFAULT NULL,
  `interesseeve4` varchar(30) DEFAULT NULL,
  `interesseeve5` varchar(30) DEFAULT NULL,
  `interesseeve6` varchar(30) DEFAULT NULL,
  `interesseeve7` varchar(30) DEFAULT NULL,
  `interesseeve8` varchar(30) DEFAULT NULL,
  `interesseeve9` varchar(30) DEFAULT NULL,
  `interesseeve10` varchar(30) DEFAULT NULL,
  `interesseeve11` varchar(30) DEFAULT NULL,
  `interesseeve12` varchar(30) DEFAULT NULL,
  `interesseeve13` varchar(30) DEFAULT NULL,
  `interesseeve14` varchar(30) DEFAULT NULL,
  `interesseeve15` varchar(30) DEFAULT NULL,
  `cod_evento` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `interesses_usuario`
--

CREATE TABLE `interesses_usuario` (
  `cod_interesseusu` int(11) NOT NULL,
  `interesseusu1` varchar(30) DEFAULT NULL,
  `interesseusu2` varchar(30) DEFAULT NULL,
  `interesseusu3` varchar(30) DEFAULT NULL,
  `interesseusu4` varchar(30) DEFAULT NULL,
  `interesseusu5` varchar(30) DEFAULT NULL,
  `cod_usuario` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `seguir`
--

CREATE TABLE `seguir` (
  `cod_seg` int(11) NOT NULL,
  `cod_usuario` int(11) NOT NULL,
  `CNPJ` varchar(500) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuario`
--

CREATE TABLE `usuario` (
  `cod_usuario` int(11) NOT NULL,
  `nome_usuario` varchar(100) NOT NULL,
  `sobrenome_usuario` varchar(100) NOT NULL,
  `email_usuario` varchar(100) NOT NULL,
  `senha_usuario` varchar(500) NOT NULL,
  `login_usuario` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `avaliacao`
--
ALTER TABLE `avaliacao`
  ADD PRIMARY KEY (`cod_media`),
  ADD KEY `cod_usuario` (`cod_usuario`),
  ADD KEY `cod_evento` (`cod_evento`);

--
-- Indexes for table `comentario`
--
ALTER TABLE `comentario`
  ADD PRIMARY KEY (`cod_comentario`),
  ADD KEY `cod_usuario` (`cod_usuario`),
  ADD KEY `cod_evento` (`cod_evento`);

--
-- Indexes for table `comparecimento`
--
ALTER TABLE `comparecimento`
  ADD PRIMARY KEY (`cod_comp`),
  ADD KEY `cod_usuario` (`cod_usuario`),
  ADD KEY `cod_evento` (`cod_evento`);

--
-- Indexes for table `evento`
--
ALTER TABLE `evento`
  ADD PRIMARY KEY (`cod_evento`),
  ADD KEY `CNPJ` (`CNPJ`);

--
-- Indexes for table `faculdade`
--
ALTER TABLE `faculdade`
  ADD PRIMARY KEY (`CNPJ`);

--
-- Indexes for table `interessado`
--
ALTER TABLE `interessado`
  ADD PRIMARY KEY (`cod_interessado`),
  ADD KEY `cod_usuario` (`cod_usuario`),
  ADD KEY `cod_evento` (`cod_evento`);

--
-- Indexes for table `interesses_evento`
--
ALTER TABLE `interesses_evento`
  ADD PRIMARY KEY (`cod_interesse_evento`),
  ADD KEY `cod_evento` (`cod_evento`);

--
-- Indexes for table `interesses_usuario`
--
ALTER TABLE `interesses_usuario`
  ADD PRIMARY KEY (`cod_interesseusu`),
  ADD KEY `cod_usuario` (`cod_usuario`);

--
-- Indexes for table `seguir`
--
ALTER TABLE `seguir`
  ADD PRIMARY KEY (`cod_seg`),
  ADD KEY `cod_usuario` (`cod_usuario`),
  ADD KEY `CNPJ` (`CNPJ`);

--
-- Indexes for table `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`cod_usuario`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `avaliacao`
--
ALTER TABLE `avaliacao`
  MODIFY `cod_media` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `comentario`
--
ALTER TABLE `comentario`
  MODIFY `cod_comentario` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `comparecimento`
--
ALTER TABLE `comparecimento`
  MODIFY `cod_comp` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `evento`
--
ALTER TABLE `evento`
  MODIFY `cod_evento` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `interessado`
--
ALTER TABLE `interessado`
  MODIFY `cod_interessado` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `interesses_evento`
--
ALTER TABLE `interesses_evento`
  MODIFY `cod_interesse_evento` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `interesses_usuario`
--
ALTER TABLE `interesses_usuario`
  MODIFY `cod_interesseusu` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `seguir`
--
ALTER TABLE `seguir`
  MODIFY `cod_seg` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `usuario`
--
ALTER TABLE `usuario`
  MODIFY `cod_usuario` int(11) NOT NULL AUTO_INCREMENT;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
