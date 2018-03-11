-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: 11-Mar-2018 às 21:06
-- Versão do servidor: 5.7.19
-- PHP Version: 5.6.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `geoplan`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `assunto`
--

DROP TABLE IF EXISTS `assunto`;
CREATE TABLE IF NOT EXISTS `assunto` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `assunto` varchar(255) NOT NULL,
  `titulo` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `assunto`
--

INSERT INTO `assunto` (`id`, `assunto`, `titulo`) VALUES
(1, 'triangulo', 'Triângulo'),
(2, 'circulo', 'Círculo'),
(3, 'losango', 'Losango'),
(5, 'retangulo', 'Retângulo'),
(6, 'trapezio', 'Trapézio'),
(7, 'paralelo', 'Paralelogramo'),
(8, 'definicao', 'Definição'),
(9, 'historia', 'História'),
(10, 'perimetro', 'Perímetro e Área');

-- --------------------------------------------------------

--
-- Estrutura da tabela `comentario`
--

DROP TABLE IF EXISTS `comentario`;
CREATE TABLE IF NOT EXISTS `comentario` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `id_usuario` int(10) NOT NULL,
  `texto` text NOT NULL,
  `pagina` varchar(48) NOT NULL,
  `feito_em` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=38 DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `comentario`
--

INSERT INTO `comentario` (`id`, `id_usuario`, `texto`, `pagina`, `feito_em`) VALUES
(26, 6, 'Vivamus in urna eu enim porttitor consequat. Proin vitae pulvinar libero. Proin ut hendrerit metus. Aliquam erat volutpat. Donec fermen tum convallis ante.', 'paralelogramo', '2018-03-09 18:47:27'),
(27, 9, 'Vivamus in urna eu enim porttitor consequat. Proin vitae pulvinar libero. Proin ut hendrerit metus. Aliquam erat volutpat. Donec fermen tum convallis ante.', 'triangulo', '2018-03-09 18:47:27'),
(31, 9990, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur leo est, feugiat nec elementum id, suscipit id nulla. Nulla sit amet luctus dolor. ', 'triangulo', '2018-03-09 18:47:27'),
(32, 9992, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur leo est, feugiat nec elementum id, suscipit id nulla. Nulla sit amet luctus dolor. ', 'circulo', '2018-03-09 18:47:27'),
(33, 6, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur leo est, feugiat nec elementum id, suscipit id nulla. Nulla sit amet luctus dolor. ', 'paralelo', '2018-03-09 18:47:27'),
(34, 7, 'Vivamus in urna eu enim porttitor consequat. Proin vitae pulvinar libero. Proin ut hendrerit metus. Aliquam erat volutpat. Donec fermen tum convallis ante eget tristique.', 'triangulo', '2018-03-09 18:45:55'),
(37, 7, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur leo est, feugiat nec elementum id, suscipit id nulla. Nulla sit amet luctus dolor.', 'retangulo', '2018-03-09 18:55:11');

-- --------------------------------------------------------

--
-- Estrutura da tabela `contato`
--

DROP TABLE IF EXISTS `contato`;
CREATE TABLE IF NOT EXISTS `contato` (
  `id` int(10) UNSIGNED ZEROFILL NOT NULL,
  `email` varchar(25) NOT NULL,
  `texto` text NOT NULL,
  `nome` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `exercicio`
--

DROP TABLE IF EXISTS `exercicio`;
CREATE TABLE IF NOT EXISTS `exercicio` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pergunta` text NOT NULL,
  `opcao1` varchar(255) NOT NULL,
  `opcao2` varchar(255) NOT NULL,
  `opcao3` varchar(255) NOT NULL,
  `opcao4` varchar(255) NOT NULL,
  `resposta` varchar(255) NOT NULL,
  `tipo` varchar(255) NOT NULL,
  `slug_img` varchar(255) NOT NULL,
  `id_assunto` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=39 DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `exercicio`
--

INSERT INTO `exercicio` (`id`, `pergunta`, `opcao1`, `opcao2`, `opcao3`, `opcao4`, `resposta`, `tipo`, `slug_img`, `id_assunto`) VALUES
(19, 'Classifique o triÃ¢ngulo â–³DEF quanto aos lados.', 'EquilÃ¡tero', 'IsÃ³sceles', 'Escaleno', 'Nenhum', '2', 'objetiva', 'triangulo2.png', 1),
(20, 'Classifique â–³DEF de acordo com seus Ã¢ngulos.', 'AcutÃ¢ngulo', 'ObtusÃ¢ngulo', 'Direita', 'EquilÃ¡tero', '3', 'objetiva', 'triangulo1.png', 1),
(21, 'Calcule o valor de <strong>x</strong> no triÃ¢ngulo abaixo.', '31', '41', '32', '42', '2', 'objetiva', 'triangulo3.png', 1),
(22, 'Calcule o valor de <strong>x</strong> no triÃ¢ngulo abaixo.', '56', '62', '72', '124', '2', 'objetiva', 'triangulo4.png', 1),
(23, 'Classifique â–³PQR de acordo com seus Ã¢ngulos.', 'AcutÃ¢ngulo', 'ObtusÃ¢ngulo', 'Direita', 'Nenhum', '2', 'objetiva', 'triangulo5.png', 1),
(24, 'Encontre o valor de <strong>x</strong> no triÃ¢ngulo abaixo.', '29', '44', '88', '107', '4', 'objetiva', 'triangulo6.png', 1),
(25, 'Calcule o valor de <strong>x</strong> no triÃ¢ngulo abaixo.', '33', '42', '56', '62', '3', 'objetiva', 'triangulo7.png', 1),
(26, 'Classifique o triÃ¢ngulo â–³ABC quanto aos lados.', 'EquilÃ¡tero', 'IsÃ³sceles', 'Escaleno', 'Nenhuma das alternativas', '2', 'objetiva', 'triangulo8.png', 1),
(27, 'Calcule a Ã¡rea de um cÃ­rculo de raio 7 cm.\r\n', '141,72 cmÂ²', '143,86 cmÂ²', '151,72 cmÂ²', '153,86 cmÂ²', '4', 'objetiva', '', 2),
(28, 'Determine a medida do raio de uma praÃ§a circular que possui 9420 m de comprimento (Use Ï€ = 3,14). ', '1200 m', '1300 m', '1400 m', '1500 m', '4', 'objetiva', '', 2),
(29, 'Se o raio de um cÃ­rculo mede 20cm, entÃ£o sua Ã¡rea mede quantos cmÂ²?', '12,56cmÂ²', '13,56cmÂ²', '14,56cmÂ²', '15,56cmÂ²', '1', 'objetiva', '', 2),
(30, 'Usando as medidas dadas na figura abaixo, calcule a Ã¡rea da regiÃ£o pintada.', '121,2 cmÂ²', '122,6 cmÂ²', '124,2 cmÂ²', '125,6 cmÂ²', '4', 'objetiva', 'circulo1.png', 2),
(31, 'Uma praÃ§a circular tem raio de 40 m. Quantos metros anda uma pessoa quando dÃ¡ 3 voltas na praÃ§a? ', '653,6 m', '753,6 m', '873,5 m', '932,5 m', '2', 'objetiva', '', 2),
(32, 'Calcule a Ã¡rea e o perÃ­metro do losango de diagonal maior 8 cm e diagonal menor 4 cm.', 'A=16 cmÂ² e P=17,88 cm', 'A=17,88 cmÂ² e P=16 cm', 'A=17 cmÂ² e P=16,88 cm', 'A=16,88 cmÂ² e P=17 cm', '1', 'objetiva', '', 3),
(33, 'Calcule o perÃ­metro da figura plana a seguir:', 'P = 36 cm', 'P = 37 cm', 'P = 38 cm', 'P = 39 cm', '1', 'objetiva', 'retangulo1.jpg', 5),
(34, 'Qual a Ã¡rea e o perÃ­metro de um campo de futebol, de base 25 m e altura 5 m?', 'A = 100mÂ² e P = 50m', 'A = 150mÂ² e P = 60m', 'A = 125mÂ² e P = 60m', 'A = 120mÂ² e P = 50m', '3', 'objetiva', '', 5),
(35, 'Calcule a Ã¡rea e o perÃ­metro da figura a baixo:', 'A= 45cmÂ² e P= 39cm', 'A= 39cmÂ² e P= 45cm', 'A= 35cmÂ² e P= 43cm', 'A= 43cmÂ² e P= 35cm', '1', 'objetiva', 'trapezio1.jpg', 6),
(36, '<strong>(UFAM/2015)</strong> O piso de uma sala possui a forma de um paralelogramo como na figura a seguir. A Ã¡rea desse piso, em metros quadrados, mede: <p>OBS.: Considere âˆš2 = 1,41</p>', '0,141', '1,41', '14,1', '141', '4', 'objetiva', 'paralelogramo1.jpg', 7),
(38, 'Calcule a Ã¡rea de um paralelogramo que possui base igual a 15 centÃ­metros e altura igual a 25 centÃ­metros.', '375 cmÂ²', '400 cmÂ²', '425 cmÂ²', '450 cmÂ²', '1', 'objetiva', '', 7);

-- --------------------------------------------------------

--
-- Estrutura da tabela `exercicios_feitos`
--

DROP TABLE IF EXISTS `exercicios_feitos`;
CREATE TABLE IF NOT EXISTS `exercicios_feitos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `feito` tinyint(4) NOT NULL DEFAULT '0',
  `id_exercicio` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=322 DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `exercicios_feitos`
--

INSERT INTO `exercicios_feitos` (`id`, `feito`, `id_exercicio`, `id_usuario`) VALUES
(142, 0, 19, 1),
(143, 0, 19, 3),
(144, 1, 19, 6),
(145, 1, 19, 7),
(146, 0, 19, 9),
(147, 1, 19, 9990),
(148, 0, 19, 9992),
(149, 0, 19, 9993),
(150, 0, 19, 9994),
(151, 0, 20, 1),
(152, 0, 20, 3),
(153, 1, 20, 6),
(154, 1, 20, 7),
(155, 0, 20, 9),
(156, 1, 20, 9990),
(157, 0, 20, 9992),
(158, 0, 20, 9993),
(159, 0, 20, 9994),
(160, 0, 21, 1),
(161, 0, 21, 3),
(162, 1, 21, 6),
(163, 1, 21, 7),
(164, 0, 21, 9),
(165, 1, 21, 9990),
(166, 0, 21, 9992),
(167, 0, 21, 9993),
(168, 0, 21, 9994),
(169, 0, 22, 1),
(170, 0, 22, 3),
(171, 0, 22, 6),
(172, 1, 22, 7),
(173, 0, 22, 9),
(174, 1, 22, 9990),
(175, 0, 22, 9992),
(176, 0, 22, 9993),
(177, 0, 22, 9994),
(178, 0, 23, 1),
(179, 0, 23, 3),
(180, 0, 23, 6),
(181, 0, 23, 7),
(182, 0, 23, 9),
(183, 1, 23, 9990),
(184, 0, 23, 9992),
(185, 0, 23, 9993),
(186, 0, 23, 9994),
(187, 0, 24, 1),
(188, 0, 24, 3),
(189, 0, 24, 6),
(190, 0, 24, 7),
(191, 0, 24, 9),
(192, 1, 24, 9990),
(193, 0, 24, 9992),
(194, 0, 24, 9993),
(195, 0, 24, 9994),
(196, 0, 25, 1),
(197, 0, 25, 3),
(198, 0, 25, 6),
(199, 0, 25, 7),
(200, 0, 25, 9),
(201, 1, 25, 9990),
(202, 0, 25, 9992),
(203, 0, 25, 9993),
(204, 0, 25, 9994),
(205, 0, 26, 1),
(206, 0, 26, 3),
(207, 0, 26, 6),
(208, 0, 26, 7),
(209, 0, 26, 9),
(210, 1, 26, 9990),
(211, 0, 26, 9992),
(212, 0, 26, 9993),
(213, 0, 26, 9994),
(214, 0, 27, 1),
(215, 0, 27, 3),
(216, 0, 27, 6),
(217, 1, 27, 7),
(218, 0, 27, 9),
(219, 0, 27, 9990),
(220, 0, 27, 9992),
(221, 0, 27, 9993),
(222, 0, 27, 9994),
(223, 0, 28, 1),
(224, 0, 28, 3),
(225, 0, 28, 6),
(226, 1, 28, 7),
(227, 0, 28, 9),
(228, 0, 28, 9990),
(229, 0, 28, 9992),
(230, 0, 28, 9993),
(231, 0, 28, 9994),
(232, 0, 29, 1),
(233, 0, 29, 3),
(234, 0, 29, 6),
(235, 1, 29, 7),
(236, 0, 29, 9),
(237, 0, 29, 9990),
(238, 0, 29, 9992),
(239, 0, 29, 9993),
(240, 0, 29, 9994),
(241, 0, 30, 1),
(242, 0, 30, 3),
(243, 0, 30, 6),
(244, 0, 30, 7),
(245, 0, 30, 9),
(246, 0, 30, 9990),
(247, 0, 30, 9992),
(248, 0, 30, 9993),
(249, 0, 30, 9994),
(250, 0, 31, 1),
(251, 0, 31, 3),
(252, 0, 31, 6),
(253, 0, 31, 7),
(254, 0, 31, 9),
(255, 0, 31, 9990),
(256, 0, 31, 9992),
(257, 0, 31, 9993),
(258, 0, 31, 9994),
(259, 0, 32, 1),
(260, 0, 32, 3),
(261, 0, 32, 6),
(262, 1, 32, 7),
(263, 0, 32, 9),
(264, 0, 32, 9990),
(265, 0, 32, 9992),
(266, 0, 32, 9993),
(267, 0, 32, 9994),
(268, 0, 33, 1),
(269, 0, 33, 3),
(270, 0, 33, 6),
(271, 0, 33, 7),
(272, 0, 33, 9),
(273, 0, 33, 9990),
(274, 0, 33, 9992),
(275, 0, 33, 9993),
(276, 0, 33, 9994),
(277, 0, 34, 1),
(278, 0, 34, 3),
(279, 0, 34, 6),
(280, 0, 34, 7),
(281, 0, 34, 9),
(282, 0, 34, 9990),
(283, 0, 34, 9992),
(284, 0, 34, 9993),
(285, 0, 34, 9994),
(286, 0, 35, 1),
(287, 0, 35, 3),
(288, 0, 35, 6),
(289, 1, 35, 7),
(290, 0, 35, 9),
(291, 0, 35, 9990),
(292, 0, 35, 9992),
(293, 0, 35, 9993),
(294, 0, 35, 9994),
(295, 0, 36, 1),
(296, 0, 36, 3),
(297, 1, 36, 6),
(298, 1, 36, 7),
(299, 0, 36, 9),
(300, 0, 36, 9990),
(301, 0, 36, 9992),
(302, 0, 36, 9993),
(303, 0, 36, 9994),
(313, 0, 38, 1),
(314, 0, 38, 3),
(315, 0, 38, 6),
(316, 0, 38, 7),
(317, 0, 38, 9),
(318, 0, 38, 9990),
(319, 0, 38, 9992),
(320, 0, 38, 9993),
(321, 0, 38, 9994);

-- --------------------------------------------------------

--
-- Estrutura da tabela `historico`
--

DROP TABLE IF EXISTS `historico`;
CREATE TABLE IF NOT EXISTS `historico` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_usuario` int(11) NOT NULL,
  `datetime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `acao` varchar(128) NOT NULL,
  `id_acao` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=38 DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `historico`
--

INSERT INTO `historico` (`id`, `id_usuario`, `datetime`, `acao`, `id_acao`) VALUES
(9, 6, '2018-02-23 17:42:19', 'comentario', 26),
(10, 6, '2018-02-23 17:42:26', 'salvar_pagina', 53),
(11, 9, '2018-02-23 18:51:38', 'comentario', 27),
(12, 9, '2018-02-23 18:51:46', 'salvar_pagina', 54),
(13, 9, '2018-02-23 19:00:38', 'comentario', 28),
(14, 9, '2018-02-23 19:01:06', 'salvar_pagina', 55),
(15, 9, '2018-02-23 19:01:16', 'comentario', 29),
(16, 9, '2018-02-23 19:02:48', 'salvar_pagina', 56),
(17, 9, '2018-02-23 19:02:58', 'salvar_pagina', 57),
(18, 9, '2018-02-23 19:03:25', 'comentario', 30),
(19, 9990, '2018-02-24 14:26:42', 'salvar_pagina', 58),
(20, 9990, '2018-02-24 14:26:49', 'comentario', 31),
(21, 9992, '2018-02-26 14:34:18', 'salvar_pagina', 59),
(22, 9992, '2018-02-26 14:34:27', 'comentario', 32),
(23, 9994, '2018-02-26 16:06:05', 'salvar_pagina', 60),
(24, 9994, '2018-02-26 16:06:10', 'salvar_pagina', 61),
(25, 9994, '2018-02-26 16:06:12', 'salvar_pagina', 62),
(26, 6, '2018-02-27 23:00:59', 'salvar_pagina', 63),
(27, 6, '2018-02-27 23:26:30', 'salvar_pagina', 64),
(28, 6, '2018-02-27 23:27:03', 'comentario', 33),
(29, 6, '2018-03-04 16:34:21', 'salvar_pagina', 65),
(30, 9990, '2018-03-04 23:26:57', 'salvar_pagina', 66),
(31, 7, '2018-03-09 18:45:55', 'comentario', 34),
(32, 7, '2018-03-09 18:47:31', 'comentario', 35),
(33, 7, '2018-03-09 18:48:16', 'comentario', 36),
(34, 7, '2018-03-09 18:52:07', 'salvar_pagina', 67),
(35, 7, '2018-03-09 18:52:10', 'salvar_pagina', 68),
(36, 7, '2018-03-09 18:52:24', 'salvar_pagina', 69),
(37, 7, '2018-03-09 18:55:12', 'comentario', 37);

-- --------------------------------------------------------

--
-- Estrutura da tabela `perfil`
--

DROP TABLE IF EXISTS `perfil`;
CREATE TABLE IF NOT EXISTS `perfil` (
  `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `id_usuario` int(11) UNSIGNED NOT NULL,
  `perfil` varchar(20) NOT NULL,
  `criado_em` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `id_usuario` (`id_usuario`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `perfil`
--

INSERT INTO `perfil` (`id`, `id_usuario`, `perfil`, `criado_em`) VALUES
(1, 1, 'comum', '2017-12-28 15:47:17'),
(2, 3, 'comum', '2018-02-01 07:25:34'),
(4, 6, 'comum', '2018-02-12 07:45:31'),
(5, 7, 'comum', '2018-02-22 12:57:47'),
(7, 9, 'comum', '2018-02-23 18:10:03'),
(13, 9990, 'comum', '2018-02-24 13:50:34'),
(14, 9992, 'comum', '2018-02-24 16:37:24'),
(15, 9993, 'comum', '2018-02-26 15:10:28'),
(16, 9994, 'comum', '2018-02-26 15:39:01');

-- --------------------------------------------------------

--
-- Estrutura da tabela `progresso`
--

DROP TABLE IF EXISTS `progresso`;
CREATE TABLE IF NOT EXISTS `progresso` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `progresso` float NOT NULL DEFAULT '0',
  `id_usuario` int(11) NOT NULL,
  `id_assunto` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=63 DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `progresso`
--

INSERT INTO `progresso` (`id`, `progresso`, `id_usuario`, `id_assunto`) VALUES
(3, 0, 9994, 1),
(4, 0, 9994, 2),
(5, 0, 9994, 3),
(6, 0, 9994, 7),
(7, 0, 9994, 5),
(8, 0, 9994, 6),
(9, 0, 1, 1),
(10, 0, 1, 2),
(11, 0, 1, 3),
(12, 0, 1, 7),
(13, 0, 1, 5),
(14, 0, 1, 6),
(15, 0, 3, 1),
(16, 0, 3, 2),
(17, 0, 3, 3),
(18, 0, 3, 7),
(19, 0, 3, 5),
(20, 0, 3, 6),
(21, 0.375, 6, 1),
(22, 0, 6, 2),
(23, 0, 6, 3),
(24, 0.5, 6, 7),
(25, 0, 6, 5),
(26, 0, 6, 6),
(27, 0.5, 7, 1),
(28, 0.6, 7, 2),
(29, 1, 7, 3),
(30, 0.5, 7, 7),
(31, 0, 7, 5),
(32, 1, 7, 6),
(33, 0, 9, 1),
(34, 0, 9, 2),
(35, 0, 9, 3),
(36, 0, 9, 7),
(37, 0, 9, 5),
(38, 0, 9, 6),
(39, 1, 9990, 1),
(40, 0, 9990, 2),
(41, 0, 9990, 3),
(42, 0, 9990, 7),
(43, 0, 9990, 5),
(44, 0, 9990, 6),
(45, 0, 9992, 1),
(46, 0, 9992, 2),
(47, 0, 9992, 3),
(48, 0, 9992, 7),
(49, 0, 9992, 5),
(50, 0, 9992, 6),
(51, 0, 9993, 1),
(52, 0, 9993, 2),
(53, 0, 9993, 3),
(54, 0, 9993, 7),
(55, 0, 9993, 5),
(56, 0, 9993, 6),
(57, 0, 9994, 1),
(58, 0, 9994, 2),
(59, 0, 9994, 3),
(60, 0, 9994, 7),
(61, 0, 9994, 5),
(62, 0, 9994, 6);

-- --------------------------------------------------------

--
-- Estrutura da tabela `salva_pagina`
--

DROP TABLE IF EXISTS `salva_pagina`;
CREATE TABLE IF NOT EXISTS `salva_pagina` (
  `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `id_usuario` int(11) UNSIGNED NOT NULL,
  `pagina` varchar(48) NOT NULL,
  `salva_em` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `id_usuario` (`id_usuario`)
) ENGINE=InnoDB AUTO_INCREMENT=70 DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `salva_pagina`
--

INSERT INTO `salva_pagina` (`id`, `id_usuario`, `pagina`, `salva_em`) VALUES
(57, 9, 'triangulo', '2018-02-23 19:02:58'),
(58, 9990, 'triangulo', '2018-02-24 14:26:42'),
(59, 9992, 'triangulo', '2018-02-26 14:34:18'),
(60, 9994, 'triangulo', '2018-02-26 16:06:05'),
(61, 9994, 'circulo', '2018-02-26 16:06:09'),
(62, 9994, 'paralelogramo', '2018-02-26 16:06:12'),
(64, 6, 'paralelo', '2018-02-27 23:26:30'),
(65, 6, 'circulo', '2018-03-04 16:34:21'),
(66, 9990, 'perimetro', '2018-03-04 23:26:57'),
(67, 7, 'triangulo', '2018-03-09 18:52:07'),
(68, 7, 'paralelo', '2018-03-09 18:52:10'),
(69, 7, 'retangulo', '2018-03-09 18:52:24');

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuario`
--

DROP TABLE IF EXISTS `usuario`;
CREATE TABLE IF NOT EXISTS `usuario` (
  `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `email` varchar(128) NOT NULL,
  `usuario` varchar(128) DEFAULT NULL,
  `nome` varchar(128) NOT NULL,
  `senha` varchar(128) NOT NULL,
  `biografia` varchar(140) DEFAULT NULL,
  `slug_foto` varchar(128) DEFAULT 'default.jpg',
  `local` varchar(128) DEFAULT NULL,
  `criado_em` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `user_email` (`email`),
  UNIQUE KEY `usuario` (`usuario`)
) ENGINE=InnoDB AUTO_INCREMENT=9995 DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `usuario`
--

INSERT INTO `usuario` (`id`, `email`, `usuario`, `nome`, `senha`, `biografia`, `slug_foto`, `local`, `criado_em`) VALUES
(1, 'eli.embits@gmail.com', 'eli.embits', 'Elionai Moura Cordeiro', '123456', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.', 'default.jpg', 'Ceará-Mirim', '2018-03-04 23:32:30'),
(3, 'rosangelarafaela61@gmail.com', 'rosangelarafaela61', 'Rosângela Rafaela', '123456', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.', 'default.jpg', 'Ceará-Mirim', '2018-03-04 23:32:30'),
(6, 'admin@admin.com', 'admin', 'Administrador', 'admin', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.', 'default.jpg', 'Ceará-Mirim', '2018-03-04 23:32:30'),
(7, 'julie@gmail.com', 'julie', 'Julie Alma', '123456', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.', 'avatar1.jpg', 'Ceará-Mirim', '2018-03-04 23:32:30'),
(9, 'louise@gmail.com', 'louise', 'Louise Armero', '123456', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.', 'avatar2.jpg', 'Ceará-Mirim', '2018-03-04 23:32:30'),
(9990, 'maycon@hotmail.com', 'maycon', 'Maycon Lorence', '123465', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.', 'avatar3.jpg', 'Ceará-Mirim', '2018-03-04 23:32:30'),
(9992, 'bwbr2@gmail.com', 'bwbruno', 'Bruno', '123456', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.', 'default.jpg', NULL, '2018-03-04 23:32:30'),
(9993, 'loren@gmail.com', 'loren', 'Lore Williams', '123456', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.', 'avatar4.jpg', 'Ceará-Mirim', '2018-03-04 23:32:30'),
(9994, 'carol@gmail.com', 'carol', 'Carol Moreira', '123456', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.', 'avatar5.jpg', 'Ceará-Mirim', '2018-03-04 23:32:30');

--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `perfil`
--
ALTER TABLE `perfil`
  ADD CONSTRAINT `id_usuario` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
