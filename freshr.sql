-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 24-Out-2019 às 19:22
-- Versão do servidor: 5.7.17
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;
create database freshr;
--
-- Database: `freshr`
--

-- --------------------------------------------------------
use freshr;
--
-- Estrutura da tabela `evento`
--

CREATE TABLE `evento` (
  `cod_evento` int(11) NOT NULL,
  `nome_evento` varchar(30) CHARACTER SET latin1 COLLATE latin1_general_ci DEFAULT NULL,
  `banner_evento` varchar(250) DEFAULT NULL,
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
  `preco_evento` varchar(365) DEFAULT NULL,
  `comp_qnt` int(11) DEFAULT NULL,
  `interesse_qnt` varchar(30) DEFAULT NULL,
  `CNPJ` varchar(18) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `evento`
--

INSERT INTO `evento` (`cod_evento`, `nome_evento`, `banner_evento`, `data_inicio`, `data_termino`, `hora_inicio`, `hora_termino`, `endereco_evento`, `bairro_evento`, `cidade_evento`, `estado_evento`, `cep_evento`, `visibilidade_evento`, `descricao_evento`, `preco_evento`, `comp_qnt`, `interesse_qnt`, `CNPJ`) VALUES
(17, 'Encontro de Dev\'s', '556129ff2e9382a33c1f26e1c8947805.jpg', '2020-01-25', '2020-06-27', '13:25:00', '15:00:00', 'Av. Paulista, 265', 'Brigadeiro', 'SÃ£o Paulo', 'SP', '09385-353', 0, 'Palestra para aperfeiÃ§oamento em desenvolvimento e programaÃ§Ã£o.', '150.00', NULL, NULL, '11111111111'),
(16, 'Turismo no Brasil', '6364b2300950ccd4fe6b45299b9c4975.jpg', '2020-01-25', '2020-01-26', '13:00:00', '18:00:00', 'Avenida Ãguia de Haia, 174', 'Jd. SÃ£o Carlos', 'SÃ£o Paulo', 'SP', '14765-742', 1, 'Palestra dedicado para os profissionais de turismo.', '180.00', NULL, NULL, '11111111111'),
(15, 'Feira de Gastronomia', 'de9790580fc94fa69b7e7ed844447605.jpg', '2019-10-25', '2019-10-27', '14:00:00', '20:00:00', 'Avenida Ãguia de Haia, 2633', 'C.A.E Carvalho', 'SÃ£o Paulo', 'SP', '14765-742', 1, 'A maior feira de gastronomia da regiÃ£o', '50.00', NULL, NULL, '11111111111'),
(13, 'Desigualdade no Brasil', 'a986f9a4dd214189d11e2a2e063db966.jpg', '2019-10-26', '2019-10-27', '13:50:00', '14:30:00', 'Teste', 'teste', 'teste', 'SP', '00000-000', 1, 'Palestra sobre a desigualdade no Brasil', 'GrÃ¡tis', NULL, NULL, '11111111111'),
(14, 'Coaching', '44fc1f39999813dee0fd20de7a8e9795.jpg', '2019-10-30', '2020-01-24', '12:00:00', '18:30:00', 'Avenida Brasil, 70', 'BrÃ¡s', 'SÃ£o Paulo', 'SP', '00000-000', 1, 'Coaching daora', '15.00', NULL, NULL, '11111111111'),
(18, 'InteligÃªncias Artificiais', 'd234c3256c532101f63314c1c0b1e586.jpg', '2020-01-11', '2020-01-25', '13:20:00', '18:50:00', 'Av. Faria Lima', 'Jardins', 'SÃ£o Paulo', 'SP', '09385-353', 1, 'Palestra sobre o mundo das I.A\'s', 'GrÃ¡tis', NULL, NULL, '11111111111'),
(19, 'Tecnologias do Mercado', '04d4d9198237aab240f64b8da672a178.png', '2020-12-15', '2020-12-21', '13:00:00', '13:30:00', 'Rua SÃ£o Bento, 354', 'Centro', 'SÃ£o Paulo', 'SP', '05695-695', 1, 'Palestra sobre as diversas tecnologias do mercado hoje.', 'GrÃ¡tis', NULL, NULL, '12345678901');

-- --------------------------------------------------------

--
-- Estrutura da tabela `faculdade`
--

CREATE TABLE `faculdade` (
  `CNPJ` varchar(18) NOT NULL,
  `login_inst` varchar(30) DEFAULT NULL,
  `senha_inst` varchar(500) DEFAULT NULL,
  `nome_inst` varchar(255) DEFAULT NULL,
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
('11111111111', 'saojudas', 'e807f1fcf82d132f9bb018ca6738a19f', 'SÃ£o Judas', 'rua judas', 'bairro se', 'sao paulo', 'sao paulo', '12345678', 'saojudas@gmail.com', '111111111111111'),
('12345678901', 'mack', 'e807f1fcf82d132f9bb018ca6738a19f', 'Instituto Presbiteriano Mackenzie', 'Rua HigienÃ³polis, 78', 'HigienÃ³polis', 'SÃ£o Paulo', 'SÃ£o Paulo', '02554787', 'mackenzie@email.com', '11987554857215');

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
(13, 'CiÃªncias Sociais e Humanas', 'Atualidade', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 13),
(14, 'InformaÃ§Ã£o e Tecnologia', 'LogÃ­stica', 'SaÃºde', 'Engenharia', 'AdministraÃ§Ã£o e NegÃ³cios', 'ComunicaÃ§Ã£o', 'Arte e Design', 'Direito', 'EducaÃ§Ã£o', 'Gastronomia', 'CiÃªncias Exatas e BiolÃ³gicas', 'CiÃªncias Sociais e Humanas', 'MÃºsica', NULL, NULL, 14),
(15, 'Gastronomia', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 15),
(16, 'Turismo', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 16),
(17, 'InformaÃ§Ã£o e Tecnologia', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 17),
(18, 'InformaÃ§Ã£o e Tecnologia', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 18),
(19, 'InformaÃ§Ã£o e Tecnologia', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 19);

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
(1, 'InformaÃ§Ã£o e Tecnologia', 'Engenharia', 'Arte e Design', 'CiÃªncias Exatas e BiolÃ³gicas', 'MÃºsica', 2),
(2, 'InformaÃ§Ã£o e Tecnologia', 'ComunicaÃ§Ã£o', 'Arte e Design', NULL, NULL, 3);

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
(2, 'willian', 'ferreira', 'will@gmail.com', 'e807f1fcf82d132f9bb018ca6738a19f', 'willian'),
(3, 'Lucas', 'Campanelli', 'lucas.campanelli@outlook.com', '25d55ad283aa400af464c76d713c07ad', 'campa');

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
  MODIFY `cod_evento` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT for table `interesses_evento`
--
ALTER TABLE `interesses_evento`
  MODIFY `cod_interesse_evento` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT for table `interesses_usuario`
--
ALTER TABLE `interesses_usuario`
  MODIFY `cod_interesseusu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `usuario`
--
ALTER TABLE `usuario`
  MODIFY `cod_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
