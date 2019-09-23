-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 22-Set-2019 às 22:48
-- Versão do servidor: 5.7.17
-- PHP Version: 7.1.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `freshr`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `evento`
--

CREATE TABLE `evento` (
  `cod_evento` int(11) NOT NULL,
  `nome_evento` varchar(30) CHARACTER SET latin1 COLLATE latin1_general_ci DEFAULT NULL,
  `banner_evento` varchar(30) DEFAULT NULL,
  `data_inicio` varchar(30) DEFAULT NULL,
  `data_termino` varchar(30) DEFAULT NULL,
  `hora_inicio` time DEFAULT NULL,
  `hora_termino` time DEFAULT NULL,
  `endereco_evento` varchar(30) DEFAULT NULL,
  `bairro_evento` varchar(30) DEFAULT NULL,
  `cidade_evento` varchar(30) DEFAULT NULL,
  `estado_evento` varchar(19) DEFAULT NULL,
  `cep_evento` varchar(9) DEFAULT NULL,
  `visibilidade_evento` tinyint(1) DEFAULT NULL,
  `descricao_evento` varchar(150) DEFAULT NULL,
  `preco_evento` float DEFAULT NULL,
  `comp_qnt` int(11) DEFAULT NULL,
  `interesse_qnt` varchar(30) DEFAULT NULL,
  `CNPJ` varchar(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `evento`
--

INSERT INTO `evento` (`cod_evento`, `nome_evento`, `banner_evento`, `data_inicio`, `data_termino`, `hora_inicio`, `hora_termino`, `endereco_evento`, `bairro_evento`, `cidade_evento`, `estado_evento`, `cep_evento`, `visibilidade_evento`, `descricao_evento`, `preco_evento`, `comp_qnt`, `interesse_qnt`, `CNPJ`) VALUES
(1, 'test', 'blabla', '2019-09-25', '2019-09-26', '11:01:00', '11:02:00', 'test', 'test', 'test', 'test', '03103-010', 1, 'dsada', NULL, NULL, NULL, '11111111111'),
(2, 'test2', 'blabla', '2019-09-04', '2019-09-26', '22:03:00', '22:02:00', 'test2', 'test2', 'test2', 'test2', '03103-010', 1, 'd', NULL, NULL, NULL, '11111111111'),
(3, 'test3', 'blabla', '2019-09-12', '2019-09-13', '11:01:00', '11:02:00', 'test3', 'test3', 'test3', 'test3', '03103-010', 1, 'dad', NULL, NULL, NULL, '11111111111');

-- --------------------------------------------------------

--
-- Estrutura da tabela `faculdade`
--

CREATE TABLE `faculdade` (
  `CNPJ` varchar(11) NOT NULL,
  `login_inst` varchar(30) DEFAULT NULL,
  `senha_inst` varchar(500) DEFAULT NULL,
  `nome_inst` varchar(30) DEFAULT NULL,
  `endereco_inst` varchar(80) DEFAULT NULL,
  `bairro_inst` varchar(30) DEFAULT NULL,
  `cidade_inst` varchar(30) DEFAULT NULL,
  `estado_inst` varchar(19) DEFAULT NULL,
  `cep_inst` varchar(9) DEFAULT NULL,
  `email_inst` varchar(80) DEFAULT NULL,
  `telefone_inst` varchar(15) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `faculdade`
--

INSERT INTO `faculdade` (`CNPJ`, `login_inst`, `senha_inst`, `nome_inst`, `endereco_inst`, `bairro_inst`, `cidade_inst`, `estado_inst`, `cep_inst`, `email_inst`, `telefone_inst`) VALUES
('11111111111', 'saojudas', 'e807f1fcf82d132f9bb018ca6738a19f', 'SÃ£o Judas', 'rua judas', 'bairro se', 'sao paulo', 'sao paulo', '12345678', 'saojudas@gmail.com', '111111111111111');

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

--
-- Extraindo dados da tabela `interesses_evento`
--

INSERT INTO `interesses_evento` (`cod_interesse_evento`, `interesseeve1`, `interesseeve2`, `interesseeve3`, `interesseeve4`, `interesseeve5`, `interesseeve6`, `interesseeve7`, `interesseeve8`, `interesseeve9`, `interesseeve10`, `interesseeve11`, `interesseeve12`, `interesseeve13`, `interesseeve14`, `interesseeve15`, `cod_evento`) VALUES
(1, 'InformaÃ§Ã£o e Tecnologia', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1),
(2, 'LogÃ­stica', 'SaÃºde', 'Engenharia', 'AdministraÃ§Ã£o e NegÃ³cios', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1),
(3, 'InformaÃ§Ã£o e Tecnologia', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1);

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

--
-- Extraindo dados da tabela `interesses_usuario`
--

INSERT INTO `interesses_usuario` (`cod_interesseusu`, `interesseusu1`, `interesseusu2`, `interesseusu3`, `interesseusu4`, `interesseusu5`, `cod_usuario`) VALUES
(1, 'InformaÃ§Ã£o e Tecnologia', 'Engenharia', 'Arte e Design', 'CiÃªncias Exatas e BiolÃ³gicas', 'MÃºsica', 2);

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuario`
--

CREATE TABLE `usuario` (
  `cod_usuario` int(11) NOT NULL,
  `nome_usuario` varchar(30) NOT NULL,
  `sobrenome_usuario` varchar(30) NOT NULL,
  `email_usuario` varchar(30) NOT NULL,
  `senha_usuario` varchar(500) NOT NULL,
  `login_usuario` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `usuario`
--

INSERT INTO `usuario` (`cod_usuario`, `nome_usuario`, `sobrenome_usuario`, `email_usuario`, `senha_usuario`, `login_usuario`) VALUES
(2, 'willian', 'ferreira', 'will@gmail.com', 'e807f1fcf82d132f9bb018ca6738a19f', 'willian');

--
-- Indexes for dumped tables
--

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
-- Indexes for table `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`cod_usuario`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `evento`
--
ALTER TABLE `evento`
  MODIFY `cod_evento` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `interesses_evento`
--
ALTER TABLE `interesses_evento`
  MODIFY `cod_interesse_evento` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `interesses_usuario`
--
ALTER TABLE `interesses_usuario`
  MODIFY `cod_interesseusu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `usuario`
--
ALTER TABLE `usuario`
  MODIFY `cod_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
