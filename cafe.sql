-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Tempo de geração: 12-Nov-2020 às 23:23
-- Versão do servidor: 8.0.21
-- versão do PHP: 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `cafe`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `logs`
--

CREATE DATABASE cafe;
USE cafe;

DROP TABLE IF EXISTS `logs`;
CREATE TABLE IF NOT EXISTS `logs` (
  `id` int NOT NULL AUTO_INCREMENT,
  `data` date NOT NULL,
  `valor_max` decimal(65,30) NOT NULL,
  `qtd_produto` int NOT NULL,
  `operacao` varchar(255) NOT NULL,
  `prod_id` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `pedidos`
--

DROP TABLE IF EXISTS `pedidos`;
CREATE TABLE IF NOT EXISTS `pedidos` (
  `id` int NOT NULL AUTO_INCREMENT,
  `user_id` int NOT NULL,
  `prod_id` int NOT NULL,
  `situacao` bit(1) NOT NULL DEFAULT b'0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `pedidos`
--

INSERT INTO `pedidos` (`id`, `user_id`, `prod_id`, `situacao`) VALUES
(11, 1, 7, b'0');

-- --------------------------------------------------------

--
-- Estrutura da tabela `produtos`
--

DROP TABLE IF EXISTS `produtos`;
CREATE TABLE IF NOT EXISTS `produtos` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nome` varchar(255) NOT NULL,
  `valor` varchar(255) NOT NULL,
  `quantidade` int NOT NULL,
  `imagem` varchar(255) NOT NULL,
  `categoria` varchar(255) NOT NULL,
  `descricao` varchar(255) DEFAULT NULL,
  `small` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=18 DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `produtos`
--

INSERT INTO `produtos` (`id`, `nome`, `valor`, `quantidade`, `imagem`, `categoria`, `descricao`, `small`) VALUES
(1, 'Café Preto', '1,00', 7, '5f6a294b5b0b0.jpg', 'Bebida', 'O tradicional café preto', '100ml'),
(3, 'Schweppes', '2,50', 18, '5f6b78e9e6590.jpg', 'Bebida', 'Tradicional Schweppes gelada', '350ml'),
(4, 'Sonho', '3,00', 9, '5f6b8069e4bbe.jpg', 'Doce', 'Sonho de doce de leite', 'R$:4,00'),
(5, 'Carolina', '2,00', 49, '5f6bd35404721.jpg', 'Doce', 'Carolinas de doce de leite', '200g'),
(6, 'Bolo de Chocolate', '3,00', 12, '5f6bd408b720e.jpg', 'Doce', 'Pedaço de bolo de chocolate com cobertura', 'R$:4,00'),
(7, 'Pudim', '2,00', 10, '5f6bd4d0251ef.jpg', 'Doce', 'Pedaço de pudim de doce de leite', 'R$:3,00'),
(8, 'Churros', '7,00', 30, '5f6bd59bed011.jpg', 'Doce', 'Churros recheados com doce de leite ou chocolate', '1 Unit.'),
(9, 'Alfajor', '3,00', 20, '5f6bde317f457.jpg', 'Doce', 'Alfajor com recheio de doce de leite e coberto com chocolate', '1 Unit.'),
(10, 'Brigadeiro', '5,00', 20, '5f6bdef64ff5a.png', 'Doce', 'Brigadeiro de chocolate com granulado', '150g'),
(11, 'Torta de Maçã', '5,00', 15, '5f6bdffa4ceac.jpg', 'Doce', 'Pedaço de torta de maçã doce', '1 Unit.'),
(12, 'Twix', '3,50', 29, '5f6be087e7fbd.png', 'Doce', 'Barrinha doce Twix', '1 Unit.'),
(13, 'Sonho de Valsa', '1,50', 30, '5f6be0ea7a774.png', 'Doce', 'Bom bom Sonho de Valsa', 'R$:2,00'),
(14, 'Geladinho', '1,00', 30, '5f6be203bd82d.jpeg', 'Doce', 'Geladinho caseiro sabor chocolate, maracujá, morango e açaí', '1 Unit.'),
(15, 'Bolo de Cenoura', '3,00', 30, '5f6be2594ef89.jpg', 'Doce', 'Pedaço de bolo de cenoura com cobertura de chocolate', 'R$:4,00'),
(16, 'Fanta', '5,00', 0, '5f6ca71228fd8.jpg', 'Bebida', 'Fanta gelada', '2L');

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuarios`
--

DROP TABLE IF EXISTS `usuarios`;
CREATE TABLE IF NOT EXISTS `usuarios` (
  `id` int NOT NULL AUTO_INCREMENT,
  `login` varchar(255) NOT NULL,
  `senha` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `telefone` varchar(255) DEFAULT NULL,
  `adm` bit(1) NOT NULL DEFAULT b'0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`),
  UNIQUE KEY `login` (`login`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `usuarios`
--

INSERT INTO `usuarios` (`id`, `login`, `senha`, `email`, `nome`, `telefone`, `adm`) VALUES
(1, 'LinuxMen', '245a356c822aac70d62a9732d90562f8', 'viniaraujo417@gmail.com', 'Vinícius Araújo Batista', '+55 (11) 97618-7378', b'1'),
(3, 'Linux', '245a356c822aac70d62a9732d90562f8', 'vini@gmail.com', 'Vinícius Araújo Batista', '+55 (11) 92323-4234', b'0'),
(4, 'Julia', '8f3af6dd20c51a8aea355f8c97b53415', 'julia@gmail.com', 'Julia Ribeiro Campos', '+55 (11) 3242-3423', b'0');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
