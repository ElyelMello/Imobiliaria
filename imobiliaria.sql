-- phpMyAdmin SQL Dump
-- version 4.2.7.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 15-Set-2022 às 07:14
-- Versão do servidor: 5.6.20
-- PHP Version: 5.5.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `imobiliaria`
--
CREATE DATABASE IF NOT EXISTS `imobiliaria` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `imobiliaria`;

-- --------------------------------------------------------

--
-- Estrutura da tabela `clientes`
--

CREATE TABLE IF NOT EXISTS `clientes` (
`id` int(11) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `telefone` varchar(14) NOT NULL,
  `cpf` varchar(14) NOT NULL,
  `numero_compras` int(11) DEFAULT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=9 ;

--
-- Extraindo dados da tabela `clientes`
--

INSERT INTO `clientes` (`id`, `nome`, `email`, `telefone`, `cpf`, `numero_compras`) VALUES
(6, 'Valnei Junior', 'junior@teste.com', '998443323', '038.015.200-21', 5),
(7, 'Marilene Fernandes de Mello', 'marimello1807@hotmail.com', '51998443323', '038.015.200-21', 0),
(8, 'Luis Fernando', 'melloelyel@gmail.com', '51998443323', '038.015.200-21', 0);

-- --------------------------------------------------------

--
-- Estrutura da tabela `imoveis`
--

CREATE TABLE IF NOT EXISTS `imoveis` (
`id` int(11) NOT NULL,
  `endereco` varchar(255) NOT NULL,
  `dimensoes` varchar(255) NOT NULL,
  `observacoes` varchar(255) NOT NULL,
  `valor` float NOT NULL,
  `situacaoimovel` int(11) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=9 ;

--
-- Extraindo dados da tabela `imoveis`
--

INSERT INTO `imoveis` (`id`, `endereco`, `dimensoes`, `observacoes`, `valor`, `situacaoimovel`) VALUES
(7, 'Av. Imperatriz Leopoldina, 2583', '25x18', 'Ao lado do mercado', 120000, 0),
(8, 'Caxias do Sul', '20x17', 'Na subida', 100000, 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `niveis`
--

CREATE TABLE IF NOT EXISTS `niveis` (
`idnivel` int(11) NOT NULL,
  `nivel` varchar(100) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Extraindo dados da tabela `niveis`
--

INSERT INTO `niveis` (`idnivel`, `nivel`) VALUES
(1, 'administrador'),
(2, 'comercial'),
(3, 'financeiro'),
(4, 'ceo');

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuarios`
--

CREATE TABLE IF NOT EXISTS `usuarios` (
`id` int(11) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `senha` varchar(255) NOT NULL,
  `data_nasc` date NOT NULL,
  `nivel` int(11) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=20 ;

--
-- Extraindo dados da tabela `usuarios`
--

INSERT INTO `usuarios` (`id`, `nome`, `email`, `senha`, `data_nasc`, `nivel`) VALUES
(13, 'Elyel Teste Senha cripto', 'comercial@teste.com', '$2y$10$ncMJZiZsyCqz1rccQXbL2uRfNF0.i3rm6KgX7R5iJAHooEtTN2Bom', '1996-12-30', 2),
(15, 'Elyel Mello Da Costa', 'administrador@teste.com', '$2y$10$dCso6WJQvUCuPEx13awufeLGy2b0wIshn9ZA83gN0RHfa1gmHee9y', '1996-12-30', 1),
(16, 'ceo', 'ceo@teste.com', '$2y$10$yy9VTWz969EgKNUbc5Y4gOWfHaAhEpPCk1TJ5THF968aeUTwQUsO6', '1996-12-30', 4),
(17, 'financeiro', 'financeiro@teste.com', '$2y$10$g1zqzP1OMUDeIU4ImuDbz.IBAZMoJxRcT0kAoepdEZ7cEpsJ7T94a', '1996-12-30', 3),
(19, 'testefinanceiro', 'testef@teste.com', '$2y$10$EStNUL7adZa943y.Gws0nehPWqlPjztgIJ8hIofa1xIpppUbfCAZ6', '1996-12-30', 3);

-- --------------------------------------------------------

--
-- Estrutura da tabela `vendas`
--

CREATE TABLE IF NOT EXISTS `vendas` (
`id` int(11) NOT NULL,
  `idimovel` int(11) NOT NULL,
  `idcliente` int(11) NOT NULL,
  `idvendedor` int(11) NOT NULL,
  `situacaovenda` int(3) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=16 ;

--
-- Extraindo dados da tabela `vendas`
--

INSERT INTO `vendas` (`id`, `idimovel`, `idcliente`, `idvendedor`, `situacaovenda`) VALUES
(11, 8, 6, 13, 0),
(12, 8, 6, 13, 0),
(13, 7, 6, 13, 0),
(14, 8, 6, 13, 0),
(15, 7, 6, 13, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `clientes`
--
ALTER TABLE `clientes`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `imoveis`
--
ALTER TABLE `imoveis`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `niveis`
--
ALTER TABLE `niveis`
 ADD PRIMARY KEY (`idnivel`);

--
-- Indexes for table `usuarios`
--
ALTER TABLE `usuarios`
 ADD PRIMARY KEY (`id`), ADD KEY `nivel` (`nivel`);

--
-- Indexes for table `vendas`
--
ALTER TABLE `vendas`
 ADD PRIMARY KEY (`id`), ADD KEY `idimovel` (`idimovel`), ADD KEY `idcliente` (`idcliente`), ADD KEY `idvendedor` (`idvendedor`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `clientes`
--
ALTER TABLE `clientes`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `imoveis`
--
ALTER TABLE `imoveis`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `niveis`
--
ALTER TABLE `niveis`
MODIFY `idnivel` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `usuarios`
--
ALTER TABLE `usuarios`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT for table `vendas`
--
ALTER TABLE `vendas`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=16;
--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `usuarios`
--
ALTER TABLE `usuarios`
ADD CONSTRAINT `usuarios_ibfk_1` FOREIGN KEY (`nivel`) REFERENCES `niveis` (`idnivel`);

--
-- Limitadores para a tabela `vendas`
--
ALTER TABLE `vendas`
ADD CONSTRAINT `vendas_ibfk_1` FOREIGN KEY (`idimovel`) REFERENCES `imoveis` (`id`),
ADD CONSTRAINT `vendas_ibfk_2` FOREIGN KEY (`idcliente`) REFERENCES `clientes` (`id`),
ADD CONSTRAINT `vendas_ibfk_3` FOREIGN KEY (`idvendedor`) REFERENCES `usuarios` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
