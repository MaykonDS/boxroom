-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: 15-Nov-2019 às 00:21
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
-- Database: `boxroom`
--
CREATE DATABASE IF NOT EXISTS `boxroom` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `boxroom`;

-- --------------------------------------------------------

--
-- Estrutura da tabela `capcha`
--

DROP TABLE IF EXISTS `capcha`;
CREATE TABLE IF NOT EXISTS `capcha` (
  `cid` int(11) NOT NULL AUTO_INCREMENT,
  `source` varchar(60) NOT NULL,
  `resposta` varchar(40) NOT NULL,
  PRIMARY KEY (`cid`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `capcha`
--

INSERT INTO `capcha` (`cid`, `source`, `resposta`) VALUES
(1, 'audio/o_gat_ faz_miau_sim_ou_nao.mp3', 'SIM'),
(2, 'audio/qual_e_a_cor_do_gato_da_animacao.mp3', 'PRETO'),
(3, 'audio/qual_o_nome_do_animal.mp3', 'GATO'),
(4, 'audio/quantas_patas_tem_o_gato_da_animacao.mp3', 'QUATRO');

-- --------------------------------------------------------

--
-- Estrutura da tabela `comunicados`
--

DROP TABLE IF EXISTS `comunicados`;
CREATE TABLE IF NOT EXISTS `comunicados` (
  `comunicado_id` int(3) NOT NULL AUTO_INCREMENT,
  `descricao` text CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `data_finalizacao` date NOT NULL,
  `setor_sid` int(11) NOT NULL,
  PRIMARY KEY (`comunicado_id`),
  KEY `setor_sid` (`setor_sid`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `comunicados`
--

INSERT INTO `comunicados` (`comunicado_id`, `descricao`, `data_finalizacao`, `setor_sid`) VALUES
(1, 'Atenção! A BoxRoom virou uma empresa relativa a ela mesma. Não oferecemos mais serviços externos.', '2019-11-16', 2);

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
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

-- --------------------------------------------------------

--
-- Estrutura da tabela `estoque`
--

DROP TABLE IF EXISTS `estoque`;
CREATE TABLE IF NOT EXISTS `estoque` (
  `eid` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(45) COLLATE utf8mb4_bin NOT NULL,
  `desc` varchar(45) COLLATE utf8mb4_bin DEFAULT NULL,
  `endereco` text COLLATE utf8mb4_bin,
  `ativo` tinyint(1) DEFAULT '1',
  PRIMARY KEY (`eid`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- Extraindo dados da tabela `estoque`
--

INSERT INTO `estoque` (`eid`, `nome`, `desc`, `endereco`, `ativo`) VALUES
(1, 'Estoque', 'Um estoque legal', '', 0),
(2, 'Pizza', 'Just one', '', 0);

-- --------------------------------------------------------

--
-- Estrutura da tabela `estoque_fornecedor`
--

DROP TABLE IF EXISTS `estoque_fornecedor`;
CREATE TABLE IF NOT EXISTS `estoque_fornecedor` (
  `efid` int(11) NOT NULL,
  `estoque_id` int(11) NOT NULL,
  `fornecedor_id` int(11) NOT NULL,
  KEY `fornecedor_id` (`fornecedor_id`),
  KEY `estoque_id` (`estoque_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

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
  `contato_id` int(11) NOT NULL,
  PRIMARY KEY (`fid`),
  UNIQUE KEY `fid_UNIQUE` (`fid`),
  KEY `contato_id` (`contato_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

-- --------------------------------------------------------

--
-- Estrutura da tabela `localicazao`
--

DROP TABLE IF EXISTS `localicazao`;
CREATE TABLE IF NOT EXISTS `localicazao` (
  `localizacao_id` int(3) NOT NULL AUTO_INCREMENT,
  `nome` varchar(40) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`localizacao_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `movimentacao_estoque`
--

DROP TABLE IF EXISTS `movimentacao_estoque`;
CREATE TABLE IF NOT EXISTS `movimentacao_estoque` (
  `meid` int(11) NOT NULL AUTO_INCREMENT,
  `quant` int(11) DEFAULT NULL,
  `smid` int(11) DEFAULT NULL,
  `estoque_produto_id` int(11) NOT NULL,
  `data_mov` datetime DEFAULT NULL,
  `tipo` char(1) COLLATE utf8mb4_bin DEFAULT NULL,
  PRIMARY KEY (`meid`),
  KEY `smid` (`smid`),
  KEY `estoque_produto_id` (`estoque_produto_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

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
  `iid` int(11) DEFAULT '0',
  `desc_produto` varchar(45) COLLATE utf8mb4_bin DEFAULT NULL,
  `quant` int(11) DEFAULT '0',
  `status` char(1) COLLATE utf8mb4_bin DEFAULT 'S',
  `tid` int(11) NOT NULL,
  PRIMARY KEY (`pid`),
  UNIQUE KEY `pid_UNIQUE` (`pid`),
  KEY `iid` (`iid`),
  KEY `tid` (`tid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

-- --------------------------------------------------------

--
-- Estrutura da tabela `produto_unidade`
--

DROP TABLE IF EXISTS `produto_unidade`;
CREATE TABLE IF NOT EXISTS `produto_unidade` (
  `puid` int(11) NOT NULL AUTO_INCREMENT,
  `pid` int(11) DEFAULT '0',
  `uid` int(11) DEFAULT '0',
  `quant` int(11) DEFAULT '0',
  PRIMARY KEY (`puid`),
  KEY `pid` (`pid`),
  KEY `uid` (`uid`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

-- --------------------------------------------------------

--
-- Estrutura da tabela `setor`
--

DROP TABLE IF EXISTS `setor`;
CREATE TABLE IF NOT EXISTS `setor` (
  `sid` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(45) COLLATE utf8mb4_bin DEFAULT NULL,
  `privilegios_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`sid`),
  KEY `prid` (`privilegios_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- Extraindo dados da tabela `setor`
--

INSERT INTO `setor` (`sid`, `nome`, `privilegios_id`) VALUES
(1, 'development', 1),
(2, 'cliente', 2);

-- --------------------------------------------------------

--
-- Estrutura da tabela `status_movimentacao`
--

DROP TABLE IF EXISTS `status_movimentacao`;
CREATE TABLE IF NOT EXISTS `status_movimentacao` (
  `smid` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(45) COLLATE utf8mb4_bin DEFAULT NULL,
  PRIMARY KEY (`smid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tipo`
--

DROP TABLE IF EXISTS `tipo`;
CREATE TABLE IF NOT EXISTS `tipo` (
  `tid` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(25) COLLATE utf8mb4_bin NOT NULL,
  PRIMARY KEY (`tid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuario`
--

DROP TABLE IF EXISTS `usuario`;
CREATE TABLE IF NOT EXISTS `usuario` (
  `uid` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(45) COLLATE utf8mb4_bin DEFAULT NULL,
  `email` varchar(45) COLLATE utf8mb4_bin DEFAULT NULL,
  `senha` varchar(45) COLLATE utf8mb4_bin DEFAULT NULL,
  `sexo` char(1) COLLATE utf8mb4_bin DEFAULT NULL,
  `setor_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`uid`),
  KEY `sid` (`setor_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- Extraindo dados da tabela `usuario`
--

INSERT INTO `usuario` (`uid`, `nome`, `email`, `senha`, `sexo`, `setor_id`) VALUES
(1, 'dudu', '1', '9eb71ab7420eb452a22787ca4fab501b', 'm', 1),
(2, 'Maykon Douglas', 'maykon2000douglas@gmail.com', '303afa47adc42a3aa87fcfedbbdf2652', 'm', 2);

-- --------------------------------------------------------

--
-- Estrutura da tabela `venda`
--

DROP TABLE IF EXISTS `venda`;
CREATE TABLE IF NOT EXISTS `venda` (
  `vid` int(11) NOT NULL AUTO_INCREMENT,
  `pid` int(11) DEFAULT NULL,
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `comunicados`
--
ALTER TABLE `comunicados`
  ADD CONSTRAINT `comunicados_ibfk_1` FOREIGN KEY (`setor_sid`) REFERENCES `setor` (`sid`);

--
-- Limitadores para a tabela `estoque_fornecedor`
--
ALTER TABLE `estoque_fornecedor`
  ADD CONSTRAINT `estoque_fornecedor_ibfk_1` FOREIGN KEY (`fornecedor_id`) REFERENCES `fornecedor` (`fid`),
  ADD CONSTRAINT `estoque_fornecedor_ibfk_2` FOREIGN KEY (`estoque_id`) REFERENCES `estoque` (`eid`);

--
-- Limitadores para a tabela `estoque_produto`
--
ALTER TABLE `estoque_produto`
  ADD CONSTRAINT `estoque_produto_ibfk_1` FOREIGN KEY (`pid`) REFERENCES `produto` (`pid`),
  ADD CONSTRAINT `estoque_produto_ibfk_2` FOREIGN KEY (`eid`) REFERENCES `estoque` (`eid`),
  ADD CONSTRAINT `estoque_produto_ibfk_3` FOREIGN KEY (`uid`) REFERENCES `usuario` (`uid`);

--
-- Limitadores para a tabela `fornecedor`
--
ALTER TABLE `fornecedor`
  ADD CONSTRAINT `fornecedor_ibfk_1` FOREIGN KEY (`contato_id`) REFERENCES `contato` (`cid`);

--
-- Limitadores para a tabela `item_venda`
--
ALTER TABLE `item_venda`
  ADD CONSTRAINT `item_venda_ibfk_1` FOREIGN KEY (`epid`) REFERENCES `estoque_produto` (`epid`),
  ADD CONSTRAINT `item_venda_ibfk_2` FOREIGN KEY (`vid`) REFERENCES `venda` (`vid`);

--
-- Limitadores para a tabela `movimentacao_estoque`
--
ALTER TABLE `movimentacao_estoque`
  ADD CONSTRAINT `movimentacao_estoque_ibfk_1` FOREIGN KEY (`smid`) REFERENCES `status_movimentacao` (`smid`),
  ADD CONSTRAINT `movimentacao_estoque_ibfk_2` FOREIGN KEY (`estoque_produto_id`) REFERENCES `estoque_produto` (`epid`);

--
-- Limitadores para a tabela `produto`
--
ALTER TABLE `produto`
  ADD CONSTRAINT `produto_ibfk_1` FOREIGN KEY (`iid`) REFERENCES `ingredientes` (`iid`),
  ADD CONSTRAINT `produto_ibfk_2` FOREIGN KEY (`tid`) REFERENCES `tipo` (`tid`);

--
-- Limitadores para a tabela `produto_unidade`
--
ALTER TABLE `produto_unidade`
  ADD CONSTRAINT `produto_unidade_ibfk_1` FOREIGN KEY (`pid`) REFERENCES `produto` (`pid`),
  ADD CONSTRAINT `produto_unidade_ibfk_3` FOREIGN KEY (`uid`) REFERENCES `unidade_comercial` (`uid`);

--
-- Limitadores para a tabela `usuario`
--
ALTER TABLE `usuario`
  ADD CONSTRAINT `usuario_ibfk_1` FOREIGN KEY (`setor_id`) REFERENCES `setor` (`sid`);

--
-- Limitadores para a tabela `venda`
--
ALTER TABLE `venda`
  ADD CONSTRAINT `venda_ibfk_1` FOREIGN KEY (`pid`) REFERENCES `produto` (`pid`),
  ADD CONSTRAINT `venda_ibfk_2` FOREIGN KEY (`ivid`) REFERENCES `item_venda` (`ivid`),
  ADD CONSTRAINT `venda_ibfk_3` FOREIGN KEY (`uid`) REFERENCES `usuario` (`uid`),
  ADD CONSTRAINT `venda_ibfk_4` FOREIGN KEY (`fpid`) REFERENCES `forma_pagamento` (`fpid`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
