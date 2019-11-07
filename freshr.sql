-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 08-Nov-2019 às 07:00
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

--
-- Estrutura da tabela `avaliacao`
--

use freshr;

CREATE TABLE `avaliacao` (
  `cod_media` int(11) NOT NULL,
  `cod_usuario` int(11) NOT NULL,
  `cod_evento` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `avaliacao`
--

INSERT INTO `avaliacao` (`cod_media`, `cod_usuario`, `cod_evento`) VALUES
(8, 3, 16),
(10, 7, 8);

-- --------------------------------------------------------

--
-- Estrutura da tabela `comparecimento`
--

CREATE TABLE `comparecimento` (
  `cod_comp` int(11) NOT NULL,
  `cod_usuario` int(11) NOT NULL,
  `cod_evento` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `comparecimento`
--

INSERT INTO `comparecimento` (`cod_comp`, `cod_usuario`, `cod_evento`) VALUES
(19, 3, 4),
(15, 3, 6),
(17, 3, 14),
(20, 4, 5);

-- --------------------------------------------------------

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
  `preco_evento` varchar(500) DEFAULT NULL,
  `comp_qnt` int(11) DEFAULT NULL,
  `interesse_qnt` varchar(30) DEFAULT NULL,
  `avaliacoes_qnt` int(11) NOT NULL,
  `CNPJ` varchar(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `evento`
--

INSERT INTO `evento` (`cod_evento`, `nome_evento`, `banner_evento`, `data_inicio`, `data_termino`, `hora_inicio`, `hora_termino`, `endereco_evento`, `bairro_evento`, `cidade_evento`, `estado_evento`, `cep_evento`, `visibilidade_evento`, `descricao_evento`, `preco_evento`, `comp_qnt`, `interesse_qnt`, `avaliacoes_qnt`, `CNPJ`) VALUES
(4, 'Feira TecnolÃ³gica 2019', '09dd3bf35a28acfa233def75b252875f.jpg', '2019-10-17', '2019-10-19', '07:50:00', '15:30:00', 'Avenida Ãguia de Haia, 2366', 'C.A.E Carvalho', 'SÃ£o Paulo', 'SP', '08220-010', 1, 'A Feira TecnolÃ³gica da ETEC Zona Leste apresenta as mais diversas tecnologias presentes no mercado de trabalho hoje. Venha e conheÃ§a!', '0', 1003, '124', 123, '11111111111'),
(5, 'Coaching C.R.Flamengo', '6d0350bcd5f87cbeeab7497ff90c5fd5.jpg', '2019-10-25', '2019-10-25', '08:00:00', '18:00:00', 'Rua Central, 2017', 'Morumbi', 'SÃ£o Paulo', 'SP', '02554-410', 1, 'Mude a sua maneira de pensar, venÃ§a como o MengÃ£o!', '50', 42, '49', 0, '11111111111'),
(6, 'Feira de ProfissÃµes da USP', '6b143a0f286207bf5989fdb1cd9607e1.jpg', '2019-10-03', '2019-10-31', '12:00:00', '22:00:00', 'Avenida Ayrton Senna, 88', 'Ermelino Matarazzo', 'SÃ£o Paulo', 'SP', '05420-012', 1, 'A Feira de ProfissÃµes da USP-Leste te informarÃ¡ sobre as mais diversas profissÃµes da sociedade atual. Venha e conheÃ§a mais.', '0', NULL, NULL, 0, '11111111111'),
(7, 'Mackenzie Day 2019', 'da8f24a1559759eb1eb894780809ff24.jpg', '2019-10-17', '2019-10-25', '09:05:00', '14:00:00', 'Rua HigienÃ³polis, 78', 'HigienÃ³polis', 'SÃ£o Paulo', 'SP', '05445-454', 1, 'Um dia para conhecer o cÃ¢mpus e os cursos antes do vestibular. Venha!', '5', NULL, NULL, 0, '11111111111'),
(8, 'SeguranÃ§a na Internet - TED', '3cd2c6a895dea2561a6e37fd7903f376.jpg', '2019-10-12', '2019-10-12', '12:00:00', '18:00:00', 'Rua Conselheiro Laurindo, 26', 'Pompeia', 'SÃ£o Paulo', 'SP', '04545-787', 1, 'Palestra sobre a seguranÃ§a digital. Entrada Franca.', '0', NULL, NULL, 1, '11111111111');

-- --------------------------------------------------------

--
-- Estrutura da tabela `faculdade`
--

CREATE TABLE `faculdade` (
  `CNPJ` varchar(100) NOT NULL,
  `login_inst` varchar(30) DEFAULT NULL,
  `senha_inst` varchar(500) DEFAULT NULL,
  `nome_inst` varchar(255) DEFAULT NULL,
  `endereco_inst` varchar(200) DEFAULT NULL,
  `bairro_inst` varchar(30) DEFAULT NULL,
  `cidade_inst` varchar(100) DEFAULT NULL,
  `estado_inst` varchar(200) DEFAULT NULL,
  `cep_inst` varchar(10) DEFAULT NULL,
  `email_inst` varchar(300) DEFAULT NULL,
  `telefone_inst` varchar(50) DEFAULT NULL,
  `seguidores_qnt` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `faculdade`
--

INSERT INTO `faculdade` (`CNPJ`, `login_inst`, `senha_inst`, `nome_inst`, `endereco_inst`, `bairro_inst`, `cidade_inst`, `estado_inst`, `cep_inst`, `email_inst`, `telefone_inst`, `seguidores_qnt`) VALUES
('11111111111', 'saojudas', 'e807f1fcf82d132f9bb018ca6738a19f', 'SÃ£o Judas', 'rua judas', 'bairro se', 'sao paulo', 'sao paulo', '12345678', 'saojudas@gmail.com', '111111111111111', 22),
('12345678901', 'mack', 'e807f1fcf82d132f9bb018ca6738a19f', 'Instituto Presbiteriano Mackenzie', 'Rua HigienÃ³polis, 78', 'HigienÃ³polis', 'SÃ£o Paulo', 'SÃ£o Paulo', '02554787', 'mackenzie@email.com', '11987554857215', 5),
('12354678901', 'uninovebf', 'e807f1fcf82d132f9bb018ca6738a19f', 'UNINOVE Barra Funda', 'Rua Memorial, 88', 'Barra Funda', 'SÃ£o Paulo', 'SP', '05774254', 'uninove@contato.com', '(11) 934556787', 1),
('12346578901', 'unicampfreshrlogin', 'e807f1fcf82d132f9bb018ca6738a19f', 'UNICAMP', 'Rua da UNICAMP, 88', 'Vila Progresso', 'Campinas', 'SP', '05874478', 'unicamp@email.com', '(11) 987665634', 0);

-- --------------------------------------------------------

--
-- Estrutura da tabela `interessado`
--

CREATE TABLE `interessado` (
  `cod_interessado` int(11) NOT NULL,
  `cod_usuario` int(11) NOT NULL,
  `cod_evento` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `interessado`
--

INSERT INTO `interessado` (`cod_interessado`, `cod_usuario`, `cod_evento`) VALUES
(4, 3, 5),
(5, 3, 6),
(10, 3, 4),
(7, 3, 14),
(11, 4, 5);

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
(4, 'InformaÃ§Ã£o e Tecnologia', 'AdministraÃ§Ã£o e NegÃ³cios', 'ComunicaÃ§Ã£o', 'Turismo', 'MÃºsica', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 4),
(5, 'Coaching', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 5),
(6, 'InformaÃ§Ã£o e Tecnologia', 'LogÃ­stica', 'SaÃºde', 'Engenharia', 'AdministraÃ§Ã£o e NegÃ³cios', 'ComunicaÃ§Ã£o', 'Arte e Design', 'Direito', 'EducaÃ§Ã£o', 'Turismo', 'Gastronomia', 'CiÃªncias Exatas e BiolÃ³gicas', 'CiÃªncias Sociais e Humanas', 'MÃºsica', 'ProfissÃµes', 6),
(7, 'InformaÃ§Ã£o e Tecnologia', 'LogÃ­stica', 'SaÃºde', 'Engenharia', 'AdministraÃ§Ã£o e NegÃ³cios', 'ComunicaÃ§Ã£o', 'Arte e Design', 'Direito', 'EducaÃ§Ã£o', 'Gastronomia', 'CiÃªncias Exatas e BiolÃ³gicas', 'CiÃªncias Sociais e Humanas', NULL, NULL, NULL, 7),
(8, 'InformaÃ§Ã£o e Tecnologia', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 8),
(9, 'CiÃªncias Exatas e BiolÃ³gicas', 'BotÃ¢nica', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 9),
(10, 'abacaxi', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 10),
(11, 'Morango', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 11),
(12, 'InformaÃ§Ã£o e Tecnologia', 'ComunicaÃ§Ã£o', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 12),
(14, 'InformaÃ§Ã£o e Tecnologia', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 14);

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
(1, 'InformaÃ§Ã£o e Tecnologia', 'LogÃ­stica', 'SaÃºde', 'ComunicaÃ§Ã£o', 'Arte e Design', 3),
(4, 'ComunicaÃ§Ã£o', 'CiÃªncias Sociais e Humanas', NULL, NULL, NULL, 7);

-- --------------------------------------------------------

--
-- Estrutura da tabela `seguir`
--

CREATE TABLE `seguir` (
  `cod_seg` int(11) NOT NULL,
  `cod_usuario` int(11) NOT NULL,
  `CNPJ` varchar(500) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `seguir`
--

INSERT INTO `seguir` (`cod_seg`, `cod_usuario`, `CNPJ`) VALUES
(5, 3, '11111111111'),
(6, 4, ' 12345678901');

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
-- Extraindo dados da tabela `usuario`
--

INSERT INTO `usuario` (`cod_usuario`, `nome_usuario`, `sobrenome_usuario`, `email_usuario`, `senha_usuario`, `login_usuario`) VALUES
(2, 'willian', 'ferreira', 'will@gmail.com', 'e807f1fcf82d132f9bb018ca6738a19f', 'willian'),
(3, 'Lucas', 'Campanelli', 'lucas.campanelli@outlook.com', '25d55ad283aa400af464c76d713c07ad', 'campa'),
(6, 'Gustavo', 'Tavares', 'kingmaster@email.com', '7beb04f055ae4ec109e74162520c11b1', 'kingmaster'),
(7, 'Gabriel', 'GusmÃ£o', 'gabriel-gusmao@email.com', 'a45b78a9ec70d8526472c601e5446166', 'gusmao'),
(8, 'Giorgio Battaglia', 'Taranto', 'giorgio@email.com', '5a0f035db329cea241ae3509ad2b824f', 'giorgioeljanclo');

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
  MODIFY `cod_media` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `comparecimento`
--
ALTER TABLE `comparecimento`
  MODIFY `cod_comp` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
--
-- AUTO_INCREMENT for table `evento`
--
ALTER TABLE `evento`
  MODIFY `cod_evento` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `interessado`
--
ALTER TABLE `interessado`
  MODIFY `cod_interessado` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `interesses_evento`
--
ALTER TABLE `interesses_evento`
  MODIFY `cod_interesse_evento` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `interesses_usuario`
--
ALTER TABLE `interesses_usuario`
  MODIFY `cod_interesseusu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `seguir`
--
ALTER TABLE `seguir`
  MODIFY `cod_seg` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `usuario`
--
ALTER TABLE `usuario`
  MODIFY `cod_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
