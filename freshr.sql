-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 23-Nov-2019 às 06:55
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

--
-- Extraindo dados da tabela `avaliacao`
--

INSERT INTO `avaliacao` (`cod_media`, `cod_usuario`, `cod_evento`) VALUES
(1, 2, 4),
(2, 3, 4),
(3, 3, 2),
(4, 3, 1),
(5, 2, 1),
(6, 2, 2),
(7, 4, 4),
(8, 4, 2),
(9, 4, 1),
(10, 5, 2),
(11, 5, 1),
(12, 6, 2),
(13, 6, 1),
(14, 7, 2),
(15, 7, 1),
(16, 7, 3),
(17, 8, 2),
(18, 8, 1),
(19, 9, 6),
(20, 10, 3),
(21, 10, 1),
(23, 11, 1),
(24, 11, 5),
(25, 12, 1),
(26, 12, 2),
(27, 13, 2),
(28, 13, 1),
(29, 14, 1),
(30, 14, 4),
(31, 15, 2),
(32, 15, 1),
(33, 16, 1),
(34, 17, 6),
(35, 18, 1),
(36, 18, 6),
(37, 19, 6);

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

--
-- Extraindo dados da tabela `comentario`
--

INSERT INTO `comentario` (`cod_comentario`, `cod_usuario`, `cod_evento`, `comentario`) VALUES
(1, 3, 4, 'Esse evento Ã© um dos melhores do Ã¢mbito da computaÃ§Ã£o. Vale a pena conferir!'),
(2, 4, 2, 'Ã‰ muito interessante apreciar os trabalhos realizados pelos alunos de uma maneira descontraÃ­da'),
(3, 5, 2, 'Realmente bom'),
(4, 6, 1, 'Gostei das apresentaÃ§Ãµes de InformÃ¡tica e ElÃ©trica'),
(5, 7, 2, 'Espero que esse ano seja bom!!!'),
(6, 13, 1, 'A Ãºltima ediÃ§Ã£o foi interessante'),
(7, 14, 4, 'Os melhores especialistas em um Ãºnico lugar, muito bom'),
(8, 17, 6, 'O domÃ­nio emocional Ã© um dos fatores mais necessÃ¡rios nos profissionais hoje. Ã“timo!'),
(9, 18, 6, 'Vale a pena cada momento desse aprendizado'),
(10, 19, 6, 'Apesar do preÃ§o, a estrutura e cronograma do evento sÃ£o agradÃ¡veis');

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
(1, 3, 3),
(2, 3, 1),
(3, 2, 4),
(4, 4, 4),
(5, 6, 1),
(6, 6, 2),
(7, 7, 2),
(8, 8, 3),
(9, 9, 6),
(10, 11, 1),
(11, 12, 1),
(12, 12, 6),
(13, 13, 1),
(14, 13, 5),
(15, 14, 4),
(16, 15, 6),
(17, 15, 5),
(18, 16, 3),
(19, 17, 6),
(20, 19, 3);

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

--
-- Extraindo dados da tabela `evento`
--

INSERT INTO `evento` (`cod_evento`, `nome_evento`, `banner_evento`, `data_inicio`, `data_termino`, `hora_inicio`, `hora_termino`, `endereco_evento`, `bairro_evento`, `cidade_evento`, `estado_evento`, `cep_evento`, `visibilidade_evento`, `descricao_evento`, `detalhes_evento`, `preco_evento`, `comp_qnt`, `interesse_qnt`, `avaliacoes_qnt`, `CNPJ`) VALUES
(1, 'Feira TecnolÃ³gica 2020 - ETEC da Zona Leste', '103a5231907b02a5c646eb460c2610fd.png', '2020-10-09', '2020-10-10', '08:00:00', '11:00:00', 'Avenida Ãguia de Haia, 2633', 'C.A.E Carvalho', 'SÃ£o Paulo', 'SP', '03694-000', 1, 'A Feira TecnolÃ³gica Ã© um evento oferecido anualmente pela comunidade da ETEC da Zona Leste com o objetivo de apresentar tecnologias Ã  comunidade.', 'A XI Feira TecnolÃ³gica ocorrerÃ¡ nos dias 09 e 10 de Outubro de 2020, respectivamente, sexta-feira e sÃ¡bado. No dia 09, as apresentaÃ§Ãµes iniciarÃ£o 08 horas e encerrarÃ£o 22 horas. No dias 10, as apresentaÃ§Ãµes terÃ£o inÃ­cio 08 horas e encerrarÃ£o a partir das 11 horas. A entrada Ã© gratuita e aberta Ã  comunidade. Venha, conheÃ§a nossa escola, profissionais, alunos e veja as diversas tecnologias sendo aplicadas na nossa sociedade! Aguardamos a sua presenÃ§a.', '0,00', 5, '5', 15, '62.823.257.0211-06'),
(2, 'Semana Paulo Freire - ETEC da Zona Leste', '5dd80c8cff589947ab3e9b9e1a32f4a9.png', '2020-05-15', '2020-05-16', '19:00:00', '16:00:00', 'Avenida Ãguia de Haia, 2633', 'Cidade A.E. Carvalho', 'SÃ£o Paulo', 'SP', '45757-678', 1, 'A Semana Paulo Freire da ETEC da Zona Leste Ã© o espaÃ§o onde nÃ£o sÃ³ os alunos aprendem, mas a comunidade aprende com os alunos sobre a sociedade.', 'A Semana Paulo Freire ocorrerÃ¡ nos dias 15 e 16 de maio. A entrada dos visitantes serÃ¡ pelo portÃ£o situado na Avenida Ãguia de Haia, 2633. No dia 15 de maio o evento terÃ¡ inÃ­cio a partir das 19 horas e encerrarÃ¡ a partir das 22 horas. No dia 16, o inÃ­cio serÃ¡ Ã s 9 horas e as apresentaÃ§Ãµes encerrarÃ£o Ã s 16 horas. O evento Ã© totalmente gratuito e aberto Ã  comunidade. Venha e aprenda com os nossos alunos sobre a sociedade atual!', '0,00', 2, '2', 10, '62.823.257.0211-06'),
(3, 'Workshop - Desenvolvimento de NegÃ³cios em Ambiente de TransformaÃ§Ã£o Digital', '2d7411f4e124e5ad1ed92cbc3cd67d8c.png', '2019-11-23', '2019-11-23', '18:00:00', '22:00:00', 'Rua da ConsolaÃ§Ã£o, 896', 'ConsolaÃ§Ã£o', 'SÃ£o Paulo', 'SP', '01302-907', 1, 'Os conceitos tecnolÃ³gicos podem influenciar cada vez mais na abordagem de marketing e estratÃ©gias. Venha conhecer as melhores prÃ¡ticas!', 'A tecnologia tem influenciado diversas Ã¡reas da sociedade, mas, tem avanÃ§ado cada vez mais a Ã¡rea de marketing e negÃ³cios. Nesse workshop vocÃª aprenderÃ¡ como alavancar o alcance do seu pÃºblico com o auxÃ­lio da tecnologia. OcorrerÃ¡ no auditÃ³rio MackGraphe, a partir das 18 horas. A entrada tem o valor de R$ 7,00.', '7,00', 4, '3', 2, '60.967.551.0001-50'),
(4, 'Brazilian Wolfram Technology Conference', '92cf64c91c9eb48841a24bddf5217746.png', '2019-11-23', '2019-11-23', '09:00:00', '16:00:00', 'Rua da COnsolaÃ§Ã£o, 930', 'ConsolaÃ§Ã£o', 'SÃ£o Paulo', 'SP', '01302-907', 1, 'A Brazilian Wolfram Technology Conference Ã© uma oportunidade imperdÃ­vel de aprender sobre as aplicaÃ§Ãµes da Tecnlogia Wolfram por especialistas.', 'ConheÃ§a as diversas aplicaÃ§Ãµes da tecnologia Wolfram por meio de palestras apresentadas por profissionais especializados na Ã¡rea. VocÃª ainda tem a oportunidade de trocar experiÃªncias com diversos profissionais da Ã¡rea. FaÃ§a sua inscriÃ§Ã£o em: https://www.wolfram.com/events/technology-conference-br/2019/registration/', '0,00', 3, '2', 4, '60.967.551.0001-50'),
(5, 'Workshop de EstratÃ©gias de OrganizaÃ§Ã£o Empresarial', 'bf71198b977f95cf63b1344e8b2ec451.png', '2019-11-27', '2019-11-27', '16:00:00', '20:00:00', 'Avenida Pedroso de Moraes, 251', 'Pinheiros', 'SÃ£o Paulo', 'SP', '05419-000', 1, 'O ambiente da sua corporaÃ§Ã£o pode ser um local propÃ­cio para o crescimento do aprendizado e conhecimento. Saiba como estimular esse aprendizado.', 'O Workshop de EstratÃ©gias de OrganizaÃ§Ã£o Empresarial ocorrerÃ¡ no dia 27 de Novembro, a partir das 18 horas atÃ© as 20 horas. O ingresso poderÃ¡ ser adquirido na entrada por R$ 12,00. Venha inovar a maneira em que sua corporaÃ§Ã£o se relaciona!', '12.00', 2, '1', 1, '05.264.816.9457-81'),
(6, 'FormaÃ§Ã£o InteligÃªncia Emocional SistÃªmica', 'beaabed58c4d17e3a6e85781ccb8f6b2.png', '2019-12-27', '2019-12-29', '09:10:00', '19:00:00', 'Avenida Pedroso de Moraes, 251', 'Pinheiros', 'SÃ£o Paulo', 'SP', '05419-000', 1, 'O momento imperdÃ­vel para que vocÃª se transforme em um lÃ­der com capacidade de gerenciamento emocional prÃ³prio e coletivo. NÃ£o perca!', 'A FormaÃ§Ã£o em InteligÃªncia Emocional SistÃªmica Ã© a qualificaÃ§Ã£o de indivÃ­duos para o gerenciamento de e entendimento profissional do comportamento humano. O evento ocorrerÃ¡ nos dias 27 a 29 de Dezembro. Para a inscriÃ§Ã£o, envie um e-mail para contato@adaptwork.com', '7.000,00', 4, '2', 4, '05.264.816.9457-81');

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

--
-- Extraindo dados da tabela `faculdade`
--

INSERT INTO `faculdade` (`CNPJ`, `login_inst`, `senha_inst`, `nome_inst`, `endereco_inst`, `bairro_inst`, `cidade_inst`, `estado_inst`, `cep_inst`, `email_inst`, `telefone_inst`, `seguidores_qnt`) VALUES
('60.967.551.0001-50', 'mackenzie', 'e807f1fcf82d132f9bb018ca6738a19f', 'Instituto Presbiteriano Mackenzie SÃ£o Paulo', 'Rua da ConsolaÃ§Ã£o, 930', 'ConsolaÃ§Ã£o', 'SÃ£o Paulo', 'SP', '01302-907', 'reitoria@mackenzie.br', '(11) 2114-8000', 0),
('62.596.408.0001-25', 'anhembimorumbimooca', 'e807f1fcf82d132f9bb018ca6738a19f', 'Universidade Anhembi Morumbi CÃ¢mpus Mooca', 'Rua Dr. Almeida Lima, 1134', 'Mooca', 'SÃ£o Paulo', 'SP', '03164-000', 'uam@email.com', '(11) 3293-1709', 0),
('62.823.257.0211-06', 'eteczl211', 'e807f1fcf82d132f9bb018ca6738a19f', 'ETEC da Zona Leste', 'Avenida Ãguia de Haia, 2633', 'C.A.E Carvalho', 'SÃ£o Paulo', 'SP', '03694-000', 'e211acad@cps.sp.gov.br', '(11) 2045-4000', 0),
('43.045.772.0001-52', 'saojudas', 'e807f1fcf82d132f9bb018ca6738a19f', 'Universidade SÃ£o Judas', 'Rua Taquari, 546', 'Mooca', 'SÃ£o Paulo', 'SP', '03166-000', 'saojudas@email.com', '(11) 8343-5353', 0),
('05.485.845.9479-82', 'giorgioairlines', 'e807f1fcf82d132f9bb018ca6738a19f', 'Giorgio Airlines', 'Rua Tucuruvi, 77', 'Santana', 'SÃ£o Paulo', 'SP', '05484-485', 'giorgioairlines@email.com', '(11) 9847-75412', 0),
('05.264.816.9457-81', 'adaptjob', 'e807f1fcf82d132f9bb018ca6738a19f', 'Adaptjobs', 'Avenida Pedroso de Moraes, 251', 'Pinheiros', 'SÃ£o Paulo', 'SP', '05419-000', 'contato@adaptwork.com', '(11) 2007-8795', 0);

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
(1, 3, 4),
(2, 2, 4),
(3, 5, 6),
(4, 7, 3),
(5, 8, 3),
(6, 10, 3),
(7, 10, 1),
(8, 11, 1),
(9, 12, 2),
(10, 13, 2),
(11, 14, 1),
(12, 15, 1),
(13, 16, 1),
(14, 16, 5),
(15, 18, 6);

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
(1, 'InformaÃ§Ã£o e Tecnologia', 'LogÃ­stica', 'AdministraÃ§Ã£o e NegÃ³cios', 'ComunicaÃ§Ã£o', 'Arte e Design', 'CiÃªncias Exatas e BiolÃ³gicas', 'CiÃªncias Sociais e Humanas', 'MÃºsica', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1),
(2, 'InformaÃ§Ã£o e Tecnologia', 'LogÃ­stica', 'AdministraÃ§Ã£o e NegÃ³cios', 'ComunicaÃ§Ã£o', 'Arte e Design', 'EducaÃ§Ã£o', 'CiÃªncias Exatas e BiolÃ³gicas', 'CiÃªncias Sociais e Humanas', 'MÃºsica', 'Recursos Humanos', NULL, NULL, NULL, NULL, NULL, 2),
(3, 'InformaÃ§Ã£o e Tecnologia', 'AdministraÃ§Ã£o e NegÃ³cios', 'ComunicaÃ§Ã£o', 'Marketing', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 3),
(4, 'InformaÃ§Ã£o e Tecnologia', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 4),
(5, 'AdministraÃ§Ã£o e NegÃ³cios', 'ComunicaÃ§Ã£o', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 5),
(6, 'SaÃºde', 'AdministraÃ§Ã£o e NegÃ³cios', 'Coaching', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 6);

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
(1, 'InformaÃ§Ã£o e Tecnologia', 'ComunicaÃ§Ã£o', 'Turismo', 'Gastronomia', 'MÃºsica', 1),
(2, 'InformaÃ§Ã£o e Tecnologia', 'CiÃªncias Exatas e BiolÃ³gicas', NULL, NULL, NULL, 2),
(3, 'InformaÃ§Ã£o e Tecnologia', 'ComunicaÃ§Ã£o', 'Arte e Design', 'MÃºsica', NULL, 3),
(4, 'InformaÃ§Ã£o e Tecnologia', 'SaÃºde', 'ComunicaÃ§Ã£o', 'CiÃªncias Sociais e Humanas', NULL, 4),
(5, 'Engenharia', 'CiÃªncias Exatas e BiolÃ³gicas', 'CiÃªncias Sociais e Humanas', 'Pedagogia', NULL, 5),
(6, 'InformaÃ§Ã£o e Tecnologia', 'ComunicaÃ§Ã£o', 'Arte e Design', 'Gastronomia', 'MÃºsica', 6),
(7, 'InformaÃ§Ã£o e Tecnologia', NULL, NULL, NULL, NULL, 7),
(8, 'InformaÃ§Ã£o e Tecnologia', NULL, NULL, NULL, NULL, 8),
(9, 'Turismo', 'AviaÃ§Ã£o', NULL, NULL, NULL, 9),
(10, 'InformaÃ§Ã£o e Tecnologia', 'AdministraÃ§Ã£o e NegÃ³cios', 'ComunicaÃ§Ã£o', 'Arte e Design', 'MÃºsica', 10),
(11, 'InformaÃ§Ã£o e Tecnologia', 'CiÃªncias Sociais e Humanas', 'MÃºsica', 'Jornalismo', NULL, 11),
(12, 'SaÃºde', 'Direito', 'CiÃªncias Exatas e BiolÃ³gicas', 'CiÃªncias Sociais e Humanas', NULL, 12),
(13, 'InformaÃ§Ã£o e Tecnologia', 'ComunicaÃ§Ã£o', 'Direito', 'CiÃªncias Sociais e Humanas', NULL, 13),
(14, 'InformaÃ§Ã£o e Tecnologia', 'Engenharia', 'CiÃªncias Exatas e BiolÃ³gicas', 'Engenharia ElÃ©trica', NULL, 14),
(15, 'SaÃºde', 'Fisioterapia', NULL, NULL, NULL, 15),
(16, 'InformaÃ§Ã£o e Tecnologia', 'ComunicaÃ§Ã£o', 'Arte e Design', NULL, NULL, 16),
(17, 'AdministraÃ§Ã£o e NegÃ³cios', NULL, NULL, NULL, NULL, 17),
(18, 'AdministraÃ§Ã£o e NegÃ³cios', 'ComunicaÃ§Ã£o', 'Marketing', NULL, NULL, 18),
(19, 'LogÃ­stica', NULL, NULL, NULL, NULL, 19);

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
(1, 5, '62.823.257.0211-06');

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
(1, 'admin', 'admin', 'admin@admin.com', '90d4772eafdcaa6bb5be935c32be3931', 'admin'),
(2, 'Willian', 'Ferreira', 'will@email.com', '25d55ad283aa400af464c76d713c07ad', 'willian'),
(3, 'Lucas', 'Campanelli', 'lucas.campanelli@outlook.com', '25d55ad283aa400af464c76d713c07ad', 'campa'),
(4, 'Iago', 'Pereira', 'iago.peneira@bol.com', '25d55ad283aa400af464c76d713c07ad', 'iago'),
(5, 'Renato', 'Melo', 'renato@email.com', '25d55ad283aa400af464c76d713c07ad', 'renato'),
(6, 'Nicholas', 'Campanelli', 'nicholas@hotmail.com', '25d55ad283aa400af464c76d713c07ad', 'Niccch'),
(7, 'Leonardo', 'Dutra Nascimento', 'leodn@email.com', '25d55ad283aa400af464c76d713c07ad', 'leodn'),
(8, 'Guilherme', 'Rodrigues', 'guilhermedata@email.com', '25d55ad283aa400af464c76d713c07ad', 'datashow'),
(9, 'Giorgio', 'Battaglia Taranto', 'giorgioeljanclo@email.com', '25d55ad283aa400af464c76d713c07ad', 'giorgio'),
(10, 'Gustavo', 'Tavares', 'gustatdomingues@email.com', '25d55ad283aa400af464c76d713c07ad', 'gustavinho'),
(11, 'Henrique', 'Araujo', 'henrique@email.com', '25d55ad283aa400af464c76d713c07ad', 'henrique'),
(12, 'Isabela', 'Nogueira', 'nogueirabela@email.com', 'cdff2ba907ba2de9c64b975f68cb316a', 'isanogueira'),
(13, 'Gabriel', 'GusmÃ£o', 'gabrielgusmao@email.com', '25d55ad283aa400af464c76d713c07ad', 'gabrielgusmao'),
(14, 'Jalmir', 'Iago', 'jalmir@email.com', '25d55ad283aa400af464c76d713c07ad', 'jalmir'),
(15, 'Isadora', 'Nogueira', 'dora@email.com', 'fb1650fec314e0dfdf75f44e6731ede8', 'dora'),
(16, 'Alex', 'Medeiros', 'alex@email.com', '25d55ad283aa400af464c76d713c07ad', 'alex'),
(17, 'Estevam', 'Hernandes', 'estevam@email.com', '218fb59b84729296f99c26304b87d084', 'estevam12'),
(18, 'Alessandro', 'Vilas Boas', 'ale@email.com', '25d55ad283aa400af464c76d713c07ad', 'alevilasboas'),
(19, 'JoÃ£o', 'Guerreiro', 'joao@email.com', '25d55ad283aa400af464c76d713c07ad', 'joaoguerreiro');

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
  MODIFY `cod_media` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;
--
-- AUTO_INCREMENT for table `comentario`
--
ALTER TABLE `comentario`
  MODIFY `cod_comentario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `comparecimento`
--
ALTER TABLE `comparecimento`
  MODIFY `cod_comp` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT for table `evento`
--
ALTER TABLE `evento`
  MODIFY `cod_evento` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `interessado`
--
ALTER TABLE `interessado`
  MODIFY `cod_interessado` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `interesses_evento`
--
ALTER TABLE `interesses_evento`
  MODIFY `cod_interesse_evento` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `interesses_usuario`
--
ALTER TABLE `interesses_usuario`
  MODIFY `cod_interesseusu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT for table `seguir`
--
ALTER TABLE `seguir`
  MODIFY `cod_seg` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `usuario`
--
ALTER TABLE `usuario`
  MODIFY `cod_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
