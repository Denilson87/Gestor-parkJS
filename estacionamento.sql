-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: 29-Maio-2020 às 00:47
-- Versão do servidor: 5.7.19
-- PHP Version: 7.0.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `estacionamento`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `carro`
--

DROP TABLE IF EXISTS `carro`;
CREATE TABLE IF NOT EXISTS `carro` (
  `id_carro` int(11) NOT NULL AUTO_INCREMENT,
  `matricula` varchar(12) DEFAULT NULL,
  `marca` varchar(50) DEFAULT NULL,
  `modelo` varchar(50) DEFAULT NULL,
  `cor` varchar(20) DEFAULT NULL,
  `id_cliente` int(11) DEFAULT NULL,
  `id_categoria` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_carro`),
  KEY `id_cliente` (`id_cliente`),
  KEY `id_categoria` (`id_categoria`)
) ENGINE=MyISAM AUTO_INCREMENT=24 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `carro`
--

INSERT INTO `carro` (`id_carro`, `matricula`, `marca`, `modelo`, `cor`, `id_cliente`, `id_categoria`) VALUES
(1, 'ACI109MP', 'Mitsubitshi', 'challenger', 'Preto', 1, 2),
(2, 'ADY100MP', 'Toyota', 'corolla', 'verde', 1, 2),
(3, 'ADI101MP', 'mercedes', 'c200', 'preta', 1, 2),
(9, 'aff111sf', 'Hyunday', 'Sonata', 'vinho', 1, 1),
(14, 'agg144ib', 'mazda', 'bt 50', 'vermelho', 1, 1),
(15, 'aaa100mp', 'lambo', 'Gallardo', 'laranja', 1, 1),
(16, 'Adr874mc', 'Ford', 'Raptor', 'vermelho', 1, 1),
(18, 'abq561mp', 'Toyota', 'Supra', 'creme', 1, 1),
(19, 'Add154mc', 'Nissan', 'Skyline', 'branco', 1, 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `categoria`
--

DROP TABLE IF EXISTS `categoria`;
CREATE TABLE IF NOT EXISTS `categoria` (
  `id_categoria` int(11) NOT NULL AUTO_INCREMENT,
  `categoria` varchar(1) DEFAULT NULL,
  `preco` decimal(10,0) DEFAULT NULL,
  PRIMARY KEY (`id_categoria`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `categoria`
--

INSERT INTO `categoria` (`id_categoria`, `categoria`, `preco`) VALUES
(1, 'A', '500'),
(2, 'B', '750'),
(3, 'C', '1000');

-- --------------------------------------------------------

--
-- Estrutura da tabela `cliente`
--

DROP TABLE IF EXISTS `cliente`;
CREATE TABLE IF NOT EXISTS `cliente` (
  `id_cliente` int(11) NOT NULL AUTO_INCREMENT,
  `nome_cliente` varchar(100) DEFAULT NULL,
  `numeTel` varchar(12) DEFAULT NULL,
  `numeroAlternativo` varchar(12) DEFAULT NULL,
  `bairro` varchar(50) DEFAULT NULL,
  `avenida` varchar(40) DEFAULT NULL,
  `numeroCasa` int(11) DEFAULT NULL,
  `regId_user` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_cliente`),
  KEY `regId_user` (`regId_user`)
) ENGINE=MyISAM AUTO_INCREMENT=38 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `cliente`
--

INSERT INTO `cliente` (`id_cliente`, `nome_cliente`, `numeTel`, `numeroAlternativo`, `bairro`, `avenida`, `numeroCasa`, `regId_user`) VALUES
(1, 'Virgilio Mulungo', '856545113', '856545121', 'Patrice', 'P.Sam.Nkanko', 5, 1),
(37, 'Mathlombe', '878455899', '878455879', 'Texlom', 'Machava', 2, 1),
(32, 'Tomas', '856545113', '856545121', 'dddddd', 'dddddd', 5, 1),
(18, 'joao', '856545113', '856545121', 'jardim', 'ssss', 5, 1),
(19, 'stelio', '856545113', '856545121', 'piloto', 'machava', 5, 1),
(33, 'van damme', '874545123', '874545119', 'choupal', 'Mocambique', 2, 1),
(34, 'leonel', '847808658', '847808644', 'mahotas', '25 de junho', 5, 1),
(35, ' Zulfa', '854512369', '854512367', 'jardim', '25 de junho', 3, 1),
(36, 'cccccc', '878789947', '878789946', 'ffffffffffff', 'ffffffff', 6, 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `entrada`
--

DROP TABLE IF EXISTS `entrada`;
CREATE TABLE IF NOT EXISTS `entrada` (
  `id_entrada` int(11) NOT NULL AUTO_INCREMENT,
  `id_carro` int(11) DEFAULT NULL,
  `id_cliente` int(11) DEFAULT NULL,
  `nome_donoOcasional` varchar(100) DEFAULT NULL,
  `matricula` varchar(20) DEFAULT NULL,
  `email` varchar(120) DEFAULT NULL,
  `hora_entrada` datetime DEFAULT NULL,
  `entrou` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`id_entrada`),
  KEY `id_carro` (`id_carro`),
  KEY `id_cliente` (`id_cliente`)
) ENGINE=MyISAM AUTO_INCREMENT=263 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `entrada`
--

INSERT INTO `entrada` (`id_entrada`, `id_carro`, `id_cliente`, `nome_donoOcasional`, `matricula`, `email`, `hora_entrada`, `entrou`) VALUES
(254, 1, 1, '', 'ACI109MP', 'aaa@ggjmmsss', '2020-05-12 21:34:16', 0),
(255, 2, 1, '', 'aci100mc', 'Th@fffhh', '2020-05-12 21:35:08', 0),
(256, 1, 1, '', 'ACI109MP', 'aaaaaa@feee', '2020-05-12 23:16:34', 0),
(257, 1, 1, '', 'ACI109MP', 'aaaaaaa@ggg', '2020-05-13 00:19:42', 1),
(258, 2, 1, '', 'aci100mc', 'aaaaa@rrrr', '2020-05-13 01:38:55', 0),
(259, 3, 1, '', 'ACI101MP', 'aaw@eer', '2020-05-13 14:16:07', 0),
(260, 1, 1, '', 'ACI109MP', 'aaa@sssffddfdf', '2020-05-14 12:45:42', 1),
(261, 1, 1, '', 'ACI109MP', 'aaa@sssffddfdf', '2020-05-14 12:45:42', 0),
(262, 1, 1, '', 'ACI109MP', 'virgiliojmulungo@gmail.com', '2020-05-27 01:01:19', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `login`
--

DROP TABLE IF EXISTS `login`;
CREATE TABLE IF NOT EXISTS `login` (
  `id_login` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) DEFAULT NULL,
  `senha` varchar(20) DEFAULT NULL,
  `id_user` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_login`),
  KEY `id_user` (`id_user`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `login`
--

INSERT INTO `login` (`id_login`, `username`, `senha`, `id_user`) VALUES
(1, 'vjm', '01234567', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `saida`
--

DROP TABLE IF EXISTS `saida`;
CREATE TABLE IF NOT EXISTS `saida` (
  `id_saida` int(11) NOT NULL AUTO_INCREMENT,
  `id_entrada` int(11) DEFAULT NULL,
  `saiu` enum('sim','nao') DEFAULT NULL,
  `data_saida` datetime DEFAULT NULL,
  `matricula` varchar(15) DEFAULT NULL,
  `id_carro` int(11) DEFAULT NULL,
  `valorPago` decimal(10,0) DEFAULT NULL,
  `categoria` char(2) DEFAULT NULL,
  PRIMARY KEY (`id_saida`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `saida`
--

INSERT INTO `saida` (`id_saida`, `id_entrada`, `saiu`, `data_saida`, `matricula`, `id_carro`, `valorPago`, `categoria`) VALUES
(1, 241, 'sim', '2020-05-12 00:51:31', 'ACI109MP', 1, '750', 'B'),
(2, 244, 'sim', '2020-05-12 01:07:26', 'ACI101MP', 3, '500', 'A'),
(3, 245, 'sim', '2020-05-12 01:20:51', 'aci100mc', 2, '750', 'B'),
(4, 255, 'sim', '2020-05-12 21:58:52', 'aci100mc', 2, '750', 'B'),
(5, 254, 'sim', '2020-05-12 22:44:11', 'ACI109MP', 1, '750', 'B'),
(6, 256, 'sim', '2020-05-12 23:17:56', 'ACI109MP', 1, '750', 'B'),
(7, 258, 'sim', '2020-05-13 02:43:47', 'aci100mc', 2, '750', 'B'),
(8, 259, 'sim', '2020-05-13 14:17:33', 'ACI101MP', 3, '500', 'A'),
(9, 261, 'sim', '2020-05-14 12:48:17', 'ACI109MP', 1, '750', 'B');

-- --------------------------------------------------------

--
-- Estrutura da tabela `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `id_user` int(11) NOT NULL AUTO_INCREMENT,
  `nome_completo` varchar(50) DEFAULT NULL,
  `telefone` varchar(12) DEFAULT NULL,
  `numCasa` int(11) DEFAULT NULL,
  `bairro` varchar(70) DEFAULT NULL,
  `avenida` varchar(50) DEFAULT NULL,
  `activo` tinyint(3) DEFAULT NULL,
  `id_login` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_user`),
  KEY `id_login` (`id_login`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `user`
--

INSERT INTO `user` (`id_user`, `nome_completo`, `telefone`, `numCasa`, `bairro`, `avenida`, `activo`, `id_login`) VALUES
(1, 'Virgilio Mulungo', '847808658', 120, 'patrice', '24 julho', 0, 1);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
