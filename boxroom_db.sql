-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geraÃ§Ã£o: 16-Nov-2019 Ã s 15:47
-- VersÃ£o do servidor: 10.4.6-MariaDB
-- versÃ£o do PHP: 7.3.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `boxroom`
--
CREATE DATABASE IF NOT EXISTS `boxroom` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `boxroom`;

-- --------------------------------------------------------

--
-- Estrutura da tabela `capcha`
--

CREATE TABLE `capcha` (
  `cid` int(11) NOT NULL,
  `source` varchar(60) NOT NULL,
  `resposta` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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

CREATE TABLE `comunicados` (
  `comunicado_id` int(3) NOT NULL,
  `descricao` text CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `data_finalizacao` date NOT NULL,
  `setor_sid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `comunicados`
--

INSERT INTO `comunicados` (`comunicado_id`, `descricao`, `data_finalizacao`, `setor_sid`) VALUES
(1, 'AtenÃ§Ã£o! A BoxRoom virou uma empresa relativa a ela mesma. NÃ£o oferecemos mais serviÃ§os externos.', '2019-11-16', 2);

-- --------------------------------------------------------

--
-- Estrutura da tabela `contato`
--

CREATE TABLE `contato` (
  `cid` int(11) NOT NULL,
  `email` varchar(45) COLLATE utf8mb4_bin NOT NULL,
  `telefone` varchar(45) COLLATE utf8mb4_bin DEFAULT NULL,
  `responsavel` varchar(45) COLLATE utf8mb4_bin DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

-- --------------------------------------------------------

--
-- Estrutura da tabela `estoque`
--

CREATE TABLE `estoque` (
  `eid` int(11) NOT NULL,
  `nome` varchar(45) COLLATE utf8mb4_bin NOT NULL,
  `desc` varchar(45) COLLATE utf8mb4_bin DEFAULT NULL,
  `endereco` text COLLATE utf8mb4_bin NOT NULL,
  `ativo` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

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

CREATE TABLE `estoque_fornecedor` (
  `efid` int(11) NOT NULL,
  `estoque_id` int(11) NOT NULL,
  `fornecedor_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `estoque_produto`
--

CREATE TABLE `estoque_produto` (
  `epid` int(11) NOT NULL,
  `pid` int(11) DEFAULT NULL,
  `eid` int(11) NOT NULL,
  `quant` int(11) NOT NULL,
  `quant_max` int(11) NOT NULL,
  `quant_min` int(11) NOT NULL,
  `quant_alert` int(11) NOT NULL,
  `uid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

-- --------------------------------------------------------

--
-- Estrutura da tabela `forma_pagamento`
--

CREATE TABLE `forma_pagamento` (
  `fpid` int(11) NOT NULL,
  `nome` varchar(45) COLLATE utf8mb4_bin NOT NULL,
  `quant_parcela` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

-- --------------------------------------------------------

--
-- Estrutura da tabela `fornecedor`
--

CREATE TABLE `fornecedor` (
  `fid` int(11) NOT NULL,
  `nome` varchar(45) COLLATE utf8mb4_bin NOT NULL,
  `nome_fant` varchar(45) COLLATE utf8mb4_bin DEFAULT NULL,
  `cnpj-cpf` varchar(19) COLLATE utf8mb4_bin NOT NULL,
  `tipo_pessoa` char(1) COLLATE utf8mb4_bin NOT NULL,
  `contato_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

-- --------------------------------------------------------

--
-- Estrutura da tabela `ingredientes`
--

CREATE TABLE `ingredientes` (
  `iid` int(11) NOT NULL,
  `nome` varchar(50) COLLATE utf8mb4_bin NOT NULL,
  `validade` datetime NOT NULL,
  `tid` int(11) NOT NULL,
  `iuid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

-- --------------------------------------------------------

--
-- Estrutura da tabela `item_venda`
--

CREATE TABLE `item_venda` (
  `ivid` int(11) NOT NULL,
  `epid` int(11) NOT NULL,
  `vid` int(11) NOT NULL,
  `quant` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

-- --------------------------------------------------------

--
-- Estrutura da tabela `localicazao`
--

CREATE TABLE `localicazao` (
  `localizacao_id` int(3) NOT NULL,
  `nome` varchar(40) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `movimentacao_estoque`
--

CREATE TABLE `movimentacao_estoque` (
  `meid` int(11) NOT NULL,
  `quant` int(11) NOT NULL,
  `smid` int(11) NOT NULL,
  `estoque_produto_id` int(11) NOT NULL,
  `data_mov` datetime NOT NULL,
  `tipo` char(1) COLLATE utf8mb4_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

-- --------------------------------------------------------

--
-- Estrutura da tabela `produto`
--

CREATE TABLE `produto` (
  `pid` int(11) NOT NULL,
  `nome` varchar(45) COLLATE utf8mb4_bin NOT NULL,
  `data_entrega` datetime DEFAULT NULL,
  `data_validade` datetime DEFAULT NULL,
  `iid` int(11) DEFAULT 0,
  `desc_produto` varchar(45) COLLATE utf8mb4_bin DEFAULT NULL,
  `quant` int(11) NOT NULL DEFAULT 0,
  `status` char(1) COLLATE utf8mb4_bin DEFAULT 'S',
  `tid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

-- --------------------------------------------------------

--
-- Estrutura da tabela `produto_unidade`
--

CREATE TABLE `produto_unidade` (
  `puid` int(11) NOT NULL,
  `pid` int(11) NOT NULL DEFAULT 0,
  `uid` int(11) NOT NULL DEFAULT 0,
  `quant` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

-- --------------------------------------------------------

--
-- Estrutura da tabela `setor`
--

CREATE TABLE `setor` (
  `sid` int(11) NOT NULL,
  `nome` varchar(45) COLLATE utf8mb4_bin NOT NULL,
  `privilegios_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

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

CREATE TABLE `status_movimentacao` (
  `smid` int(11) NOT NULL,
  `nome` varchar(45) COLLATE utf8mb4_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tipo`
--

CREATE TABLE `tipo` (
  `tid` int(11) NOT NULL,
  `nome` varchar(25) COLLATE utf8mb4_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

-- --------------------------------------------------------

--
-- Estrutura da tabela `unidade_comercial`
--

CREATE TABLE `unidade_comercial` (
  `uid` int(11) NOT NULL,
  `nome` varchar(45) COLLATE utf8mb4_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuario`
--

CREATE TABLE `usuario` (
  `uid` int(11) NOT NULL,
  `nome` varchar(45) COLLATE utf8mb4_bin NOT NULL,
  `email` varchar(45) COLLATE utf8mb4_bin NOT NULL,
  `senha` varchar(45) COLLATE utf8mb4_bin NOT NULL,
  `sexo` char(1) COLLATE utf8mb4_bin DEFAULT NULL,
  `setor_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

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

CREATE TABLE `venda` (
  `vid` int(11) NOT NULL,
  `venda_status` varchar(45) COLLATE utf8mb4_bin NOT NULL,
  `data_venda` datetime NOT NULL,
  `uid` int(11) NOT NULL,
  `fpid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- Ãndices para tabelas despejadas
--

--
-- Ãndices para tabela `capcha`
--
ALTER TABLE `capcha`
  ADD PRIMARY KEY (`cid`);

--
-- Ãndices para tabela `comunicados`
--
ALTER TABLE `comunicados`
  ADD PRIMARY KEY (`comunicado_id`),
  ADD KEY `setor_sid` (`setor_sid`);

--
-- Ãndices para tabela `contato`
--
ALTER TABLE `contato`
  ADD PRIMARY KEY (`cid`);

--
-- Ãndices para tabela `estoque`
--
ALTER TABLE `estoque`
  ADD PRIMARY KEY (`eid`);

--
-- Ãndices para tabela `estoque_fornecedor`
--
ALTER TABLE `estoque_fornecedor`
  ADD KEY `fornecedor_id` (`fornecedor_id`),
  ADD KEY `estoque_id` (`estoque_id`);

--
-- Ãndices para tabela `estoque_produto`
--
ALTER TABLE `estoque_produto`
  ADD PRIMARY KEY (`epid`),
  ADD KEY `pid` (`pid`),
  ADD KEY `eid` (`eid`),
  ADD KEY `uid` (`uid`);

--
-- Ãndices para tabela `forma_pagamento`
--
ALTER TABLE `forma_pagamento`
  ADD PRIMARY KEY (`fpid`);

--
-- Ãndices para tabela `fornecedor`
--
ALTER TABLE `fornecedor`
  ADD PRIMARY KEY (`fid`),
  ADD UNIQUE KEY `fid_UNIQUE` (`fid`),
  ADD KEY `contato_id` (`contato_id`);

--
-- Ãndices para tabela `ingredientes`
--
ALTER TABLE `ingredientes`
  ADD PRIMARY KEY (`iid`),
  ADD KEY `tid` (`tid`),
  ADD KEY `iuid` (`iuid`);

--
-- Ãndices para tabela `item_venda`
--
ALTER TABLE `item_venda`
  ADD PRIMARY KEY (`ivid`),
  ADD UNIQUE KEY `ivid_UNIQUE` (`ivid`),
  ADD KEY `epid` (`epid`),
  ADD KEY `vid` (`vid`);

--
-- Ãndices para tabela `localicazao`
--
ALTER TABLE `localicazao`
  ADD PRIMARY KEY (`localizacao_id`);

--
-- Ãndices para tabela `movimentacao_estoque`
--
ALTER TABLE `movimentacao_estoque`
  ADD PRIMARY KEY (`meid`),
  ADD KEY `smid` (`smid`),
  ADD KEY `estoque_produto_id` (`estoque_produto_id`);

--
-- Ãndices para tabela `produto`
--
ALTER TABLE `produto`
  ADD PRIMARY KEY (`pid`),
  ADD UNIQUE KEY `pid_UNIQUE` (`pid`),
  ADD KEY `iid` (`iid`),
  ADD KEY `tid` (`tid`);

--
-- Ãndices para tabela `produto_unidade`
--
ALTER TABLE `produto_unidade`
  ADD PRIMARY KEY (`puid`),
  ADD KEY `pid` (`pid`),
  ADD KEY `uid` (`uid`);

--
-- Ãndices para tabela `setor`
--
ALTER TABLE `setor`
  ADD PRIMARY KEY (`sid`),
  ADD KEY `prid` (`privilegios_id`);

--
-- Ãndices para tabela `status_movimentacao`
--
ALTER TABLE `status_movimentacao`
  ADD PRIMARY KEY (`smid`);

--
-- Ãndices para tabela `tipo`
--
ALTER TABLE `tipo`
  ADD PRIMARY KEY (`tid`);

--
-- Ãndices para tabela `unidade_comercial`
--
ALTER TABLE `unidade_comercial`
  ADD PRIMARY KEY (`uid`),
  ADD UNIQUE KEY `uid_UNIQUE` (`uid`);

--
-- Ãndices para tabela `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`uid`),
  ADD KEY `sid` (`setor_id`);

--
-- Ãndices para tabela `venda`
--
ALTER TABLE `venda`
  ADD PRIMARY KEY (`vid`),
  ADD UNIQUE KEY `vid_UNIQUE` (`vid`),
  ADD KEY `uid` (`uid`),
  ADD KEY `fpid` (`fpid`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `capcha`
--
ALTER TABLE `capcha`
  MODIFY `cid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de tabela `comunicados`
--
ALTER TABLE `comunicados`
  MODIFY `comunicado_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `contato`
--
ALTER TABLE `contato`
  MODIFY `cid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `estoque`
--
ALTER TABLE `estoque`
  MODIFY `eid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `estoque_produto`
--
ALTER TABLE `estoque_produto`
  MODIFY `epid` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `forma_pagamento`
--
ALTER TABLE `forma_pagamento`
  MODIFY `fpid` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `fornecedor`
--
ALTER TABLE `fornecedor`
  MODIFY `fid` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `ingredientes`
--
ALTER TABLE `ingredientes`
  MODIFY `iid` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `item_venda`
--
ALTER TABLE `item_venda`
  MODIFY `ivid` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `localicazao`
--
ALTER TABLE `localicazao`
  MODIFY `localizacao_id` int(3) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `movimentacao_estoque`
--
ALTER TABLE `movimentacao_estoque`
  MODIFY `meid` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `produto`
--
ALTER TABLE `produto`
  MODIFY `pid` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `produto_unidade`
--
ALTER TABLE `produto_unidade`
  MODIFY `puid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `setor`
--
ALTER TABLE `setor`
  MODIFY `sid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `status_movimentacao`
--
ALTER TABLE `status_movimentacao`
  MODIFY `smid` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `tipo`
--
ALTER TABLE `tipo`
  MODIFY `tid` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `unidade_comercial`
--
ALTER TABLE `unidade_comercial`
  MODIFY `uid` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `usuario`
--
ALTER TABLE `usuario`
  MODIFY `uid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `venda`
--
ALTER TABLE `venda`
  MODIFY `vid` int(11) NOT NULL AUTO_INCREMENT;

--
-- RestriÃ§Ãµes para despejos de tabelas
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
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
