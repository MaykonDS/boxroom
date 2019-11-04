-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3307
-- Generation Time: 29-Out-2019 às 22:46
-- Versão do servidor: 10.2.8-MariaDB
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
-- Database: `boxroom`
--
CREATE DATABASE IF NOT EXISTS `boxroom` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `boxroom`;

-- --------------------------------------------------------

--
-- Estrutura da tabela `contato`
--

DROP TABLE IF EXISTS `contato`;
CREATE TABLE IF NOT EXISTS `contato` (
  `cid` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(45) COLLATE utf8mb4_bin DEFAULT NULL,
  `telefone` varchar(45) COLLATE utf8mb4_bin DEFAULT NULL,
  `responsavel` varchar(45) COLLATE utf8mb4_bin DEFAULT NULL,
  PRIMARY KEY (`cid`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- Extraindo dados da tabela `contato`
--

INSERT INTO `contato` (`cid`, `email`, `telefone`, `responsavel`) VALUES
(1, 'batata@gmail.com', '41993304765', NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `estoque`
--

DROP TABLE IF EXISTS `estoque`;
CREATE TABLE IF NOT EXISTS `estoque` (
  `eid` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(45) COLLATE utf8mb4_bin DEFAULT NULL,
  `desc` varchar(45) COLLATE utf8mb4_bin DEFAULT NULL,
  `endereco` varchar(45) COLLATE utf8mb4_bin DEFAULT NULL,
  `status` char(1) COLLATE utf8mb4_bin DEFAULT 'S',
  PRIMARY KEY (`eid`),
  UNIQUE KEY `eid_UNIQUE` (`eid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

-- --------------------------------------------------------

--
-- Estrutura da tabela `estoque_produto`
--

DROP TABLE IF EXISTS `estoque_produto`;
CREATE TABLE IF NOT EXISTS `estoque_produto` (
  `epid` int(11) NOT NULL AUTO_INCREMENT,
  `pid` int(11) DEFAULT NULL,
  `eid` int(11) DEFAULT NULL,
  `quant` int(11) DEFAULT NULL,
  `quant_max` int(11) DEFAULT NULL,
  `quant_min` int(11) DEFAULT NULL,
  `quant_alert` int(11) DEFAULT NULL,
  `uid` int(11) DEFAULT NULL,
  PRIMARY KEY (`epid`),
  KEY `pid` (`pid`),
  KEY `eid` (`eid`),
  KEY `uid` (`uid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

-- --------------------------------------------------------

--
-- Estrutura da tabela `forma_pagamento`
--

DROP TABLE IF EXISTS `forma_pagamento`;
CREATE TABLE IF NOT EXISTS `forma_pagamento` (
  `fpid` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(45) COLLATE utf8mb4_bin DEFAULT NULL,
  `quant_parcela` int(11) DEFAULT NULL,
  PRIMARY KEY (`fpid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

-- --------------------------------------------------------

--
-- Estrutura da tabela `fornecedor`
--

DROP TABLE IF EXISTS `fornecedor`;
CREATE TABLE IF NOT EXISTS `fornecedor` (
  `fid` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(45) COLLATE utf8mb4_bin DEFAULT NULL,
  `nome_fant` varchar(45) COLLATE utf8mb4_bin DEFAULT NULL,
  `cnpj-cpf` varchar(19) COLLATE utf8mb4_bin DEFAULT NULL,
  `tipo_pessoa` char(1) COLLATE utf8mb4_bin DEFAULT NULL,
  PRIMARY KEY (`fid`),
  UNIQUE KEY `fid_UNIQUE` (`fid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

-- --------------------------------------------------------

--
-- Estrutura da tabela `ingredientes`
--

DROP TABLE IF EXISTS `ingredientes`;
CREATE TABLE IF NOT EXISTS `ingredientes` (
  `iid` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(50) COLLATE utf8mb4_bin NOT NULL,
  `validade` datetime NOT NULL,
  `tid` int(11) NOT NULL,
  `iuid` int(11) NOT NULL,
  PRIMARY KEY (`iid`),
  KEY `tid` (`tid`),
  KEY `iuid` (`iuid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

-- --------------------------------------------------------

--
-- Estrutura da tabela `ingredientes_unidade`
--

DROP TABLE IF EXISTS `ingredientes_unidade`;
CREATE TABLE IF NOT EXISTS `ingredientes_unidade` (
  `iuid` int(11) NOT NULL AUTO_INCREMENT,
  `iid` int(11) NOT NULL,
  `uid` int(11) NOT NULL,
  PRIMARY KEY (`iuid`),
  KEY `iid` (`iid`),
  KEY `uid` (`uid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

-- --------------------------------------------------------

--
-- Estrutura da tabela `ip_usuario`
--

DROP TABLE IF EXISTS `ip_usuario`;
CREATE TABLE IF NOT EXISTS `ip_usuario` (
  `ipid` int(11) NOT NULL,
  `end` varchar(250) COLLATE utf8mb4_bin NOT NULL,
  `uid` int(11) NOT NULL,
  KEY `uid` (`uid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

-- --------------------------------------------------------

--
-- Estrutura da tabela `item_venda`
--

DROP TABLE IF EXISTS `item_venda`;
CREATE TABLE IF NOT EXISTS `item_venda` (
  `ivid` int(11) NOT NULL AUTO_INCREMENT,
  `epid` int(11) DEFAULT NULL,
  `vid` int(11) DEFAULT NULL,
  `quant` int(11) DEFAULT NULL,
  PRIMARY KEY (`ivid`),
  UNIQUE KEY `ivid_UNIQUE` (`ivid`),
  KEY `epid` (`epid`),
  KEY `vid` (`vid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

-- --------------------------------------------------------

--
-- Estrutura da tabela `movimentacao_estoque`
--

DROP TABLE IF EXISTS `movimentacao_estoque`;
CREATE TABLE IF NOT EXISTS `movimentacao_estoque` (
  `meid` int(11) NOT NULL AUTO_INCREMENT,
  `quant` int(11) DEFAULT NULL,
  `smid` int(11) DEFAULT NULL,
  `data_mov` datetime DEFAULT NULL,
  `tipo` char(1) COLLATE utf8mb4_bin DEFAULT NULL,
  PRIMARY KEY (`meid`),
  KEY `smid` (`smid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

-- --------------------------------------------------------

--
-- Estrutura da tabela `privilegios`
--

DROP TABLE IF EXISTS `privilegios`;
CREATE TABLE IF NOT EXISTS `privilegios` (
  `prid` int(11) NOT NULL AUTO_INCREMENT,
  `nivel_acesso` int(11) DEFAULT NULL,
  `nome` varchar(45) COLLATE utf8mb4_bin DEFAULT NULL,
  PRIMARY KEY (`prid`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- Extraindo dados da tabela `privilegios`
--

INSERT INTO `privilegios` (`prid`, `nivel_acesso`, `nome`) VALUES
(1, 1, 'admin');

-- --------------------------------------------------------

--
-- Estrutura da tabela `produto`
--

DROP TABLE IF EXISTS `produto`;
CREATE TABLE IF NOT EXISTS `produto` (
  `pid` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(45) COLLATE utf8mb4_bin DEFAULT NULL,
  `data_entrega` datetime DEFAULT NULL,
  `data_validade` datetime DEFAULT NULL,
  `iid` int(11) DEFAULT 0,
  `desc_produto` varchar(45) COLLATE utf8mb4_bin DEFAULT NULL,
  `quant` int(11) DEFAULT 0,
  `status` char(1) COLLATE utf8mb4_bin DEFAULT 'S',
  `tid` int(11) NOT NULL,
  PRIMARY KEY (`pid`),
  UNIQUE KEY `pid_UNIQUE` (`pid`),
  KEY `iid` (`iid`),
  KEY `tid` (`tid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

-- --------------------------------------------------------

--
-- Estrutura da tabela `produto_unidade`
--

DROP TABLE IF EXISTS `produto_unidade`;
CREATE TABLE IF NOT EXISTS `produto_unidade` (
  `puid` int(11) NOT NULL AUTO_INCREMENT,
  `pid` int(11) DEFAULT 0,
  `uid` int(11) DEFAULT 0,
  `quant` int(11) DEFAULT 0,
  PRIMARY KEY (`puid`),
  KEY `pid` (`pid`),
  KEY `uid` (`uid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

-- --------------------------------------------------------

--
-- Estrutura da tabela `setor`
--

DROP TABLE IF EXISTS `setor`;
CREATE TABLE IF NOT EXISTS `setor` (
  `sid` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(45) COLLATE utf8mb4_bin DEFAULT NULL,
  `prid` int(11) DEFAULT NULL,
  PRIMARY KEY (`sid`),
  KEY `prid` (`prid`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- Extraindo dados da tabela `setor`
--

INSERT INTO `setor` (`sid`, `nome`, `prid`) VALUES
(1, 'admin', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `status_movimentacao`
--

DROP TABLE IF EXISTS `status_movimentacao`;
CREATE TABLE IF NOT EXISTS `status_movimentacao` (
  `smid` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(45) COLLATE utf8mb4_bin DEFAULT NULL,
  PRIMARY KEY (`smid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tipo`
--

DROP TABLE IF EXISTS `tipo`;
CREATE TABLE IF NOT EXISTS `tipo` (
  `tid` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(25) COLLATE utf8mb4_bin NOT NULL,
  PRIMARY KEY (`tid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

-- --------------------------------------------------------

--
-- Estrutura da tabela `unidade_comercial`
--

DROP TABLE IF EXISTS `unidade_comercial`;
CREATE TABLE IF NOT EXISTS `unidade_comercial` (
  `uid` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(45) COLLATE utf8mb4_bin DEFAULT NULL,
  PRIMARY KEY (`uid`),
  UNIQUE KEY `uid_UNIQUE` (`uid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuario`
--

DROP TABLE IF EXISTS `usuario`;
CREATE TABLE IF NOT EXISTS `usuario` (
  `uid` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(45) COLLATE utf8mb4_bin DEFAULT NULL,
  `cid` int(11) DEFAULT NULL,
  `senha` varchar(45) COLLATE utf8mb4_bin DEFAULT NULL,
  `sexo` char(1) COLLATE utf8mb4_bin DEFAULT NULL,
  `sid` int(11) DEFAULT NULL,
  PRIMARY KEY (`uid`),
  UNIQUE KEY `uid_UNIQUE` (`uid`),
  KEY `sid` (`sid`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- Extraindo dados da tabela `usuario`
--

INSERT INTO `usuario` (`uid`, `nome`, `cid`, `senha`, `sexo`, `sid`) VALUES
(1, 'dudu', 1, '9eb71ab7420eb452a22787ca4fab501b', 'm', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `venda`
--

DROP TABLE IF EXISTS `venda`;
CREATE TABLE IF NOT EXISTS `venda` (
  `vid` int(11) NOT NULL AUTO_INCREMENT,
  `pid` varchar(45) COLLATE utf8mb4_bin DEFAULT NULL,
  `venda_status` varchar(45) COLLATE utf8mb4_bin DEFAULT NULL,
  `ivid` int(11) DEFAULT NULL,
  `data_venda` datetime DEFAULT NULL,
  `uid` int(11) DEFAULT NULL,
  `fpid` int(11) DEFAULT NULL,
  PRIMARY KEY (`vid`),
  UNIQUE KEY `vid_UNIQUE` (`vid`),
  KEY `pid` (`pid`),
  KEY `ivid` (`ivid`),
  KEY `uid` (`uid`),
  KEY `fpid` (`fpid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
