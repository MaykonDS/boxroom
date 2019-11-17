-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 17-Nov-2019 às 03:10
-- Versão do servidor: 10.4.8-MariaDB
-- versão do PHP: 7.3.11

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
(1, 'Atenção! A BoxRoom virou uma empresa relativa a ela mesma. Não oferecemos mais serviços externos.', '2019-11-16', 2);

-- --------------------------------------------------------

--
-- Estrutura da tabela `contato`
--

CREATE TABLE `contato` (
  `cid` int(11) NOT NULL,
  `email` varchar(45) COLLATE utf8mb4_bin DEFAULT NULL,
  `telefone` varchar(45) COLLATE utf8mb4_bin DEFAULT NULL,
  `responsavel` varchar(45) COLLATE utf8mb4_bin DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- Extraindo dados da tabela `contato`
--

INSERT INTO `contato` (`cid`, `email`, `telefone`, `responsavel`) VALUES
(2, 'maykon2109douglas@gmail.com', '41988239779', 'Pedrinho do Vale'),
(6, 'maykon@teste.com', '4195468795', 'Maykon Douglas');

-- --------------------------------------------------------

--
-- Estrutura da tabela `estoque`
--

CREATE TABLE `estoque` (
  `eid` int(11) NOT NULL,
  `nome` varchar(45) COLLATE utf8mb4_bin NOT NULL,
  `desc` varchar(45) COLLATE utf8mb4_bin DEFAULT NULL,
  `endereco` text COLLATE utf8mb4_bin DEFAULT NULL,
  `ativo` tinyint(1) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- Extraindo dados da tabela `estoque`
--

INSERT INTO `estoque` (`eid`, `nome`, `desc`, `endereco`, `ativo`) VALUES
(1, 'EstoqueA', 'Desc', 'Curitiba', 1),
(2, 'EstoqueB', 'Just one', 'Paraiba', 1),
(3, 'EstoqueC', 'Um estoque super legal', 'Casa do Maykon', 0);

-- --------------------------------------------------------

--
-- Estrutura da tabela `estoque_fornecedor`
--

CREATE TABLE `estoque_fornecedor` (
  `efid` int(11) NOT NULL,
  `estoque_id` int(11) NOT NULL,
  `fornecedor_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `estoque_fornecedor`
--

INSERT INTO `estoque_fornecedor` (`efid`, `estoque_id`, `fornecedor_id`) VALUES
(1, 1, 1),
(2, 2, 1),
(3, 1, 4),
(4, 3, 4);

-- --------------------------------------------------------

--
-- Estrutura da tabela `estoque_produto`
--

CREATE TABLE `estoque_produto` (
  `epid` int(11) NOT NULL,
  `produto_id` int(11) NOT NULL,
  `estoque_id` int(11) NOT NULL,
  `quant` int(11) NOT NULL,
  `quant_max` int(11) DEFAULT NULL,
  `quant_min` int(11) DEFAULT NULL,
  `quant_alert` int(11) DEFAULT NULL,
  `usuario_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- Extraindo dados da tabela `estoque_produto`
--

INSERT INTO `estoque_produto` (`epid`, `produto_id`, `estoque_id`, `quant`, `quant_max`, `quant_min`, `quant_alert`, `usuario_id`) VALUES
(1, 1, 1, 25, 40, 0, 5, 2),
(2, 12, 1, 6, 100, 0, 15, 2),
(3, 1, 2, 25, 20, 0, 4, 2),
(4, 13, 1, 45, 70, 0, 10, 2);

-- --------------------------------------------------------

--
-- Estrutura da tabela `forma_pagamento`
--

CREATE TABLE `forma_pagamento` (
  `fpid` int(11) NOT NULL,
  `nome` varchar(45) COLLATE utf8mb4_bin DEFAULT NULL,
  `quant_parcela` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

-- --------------------------------------------------------

--
-- Estrutura da tabela `fornecedor`
--

CREATE TABLE `fornecedor` (
  `fid` int(11) NOT NULL,
  `nome` varchar(45) COLLATE utf8mb4_bin DEFAULT NULL,
  `nome_fant` varchar(45) COLLATE utf8mb4_bin DEFAULT NULL,
  `cnpj-cpf` varchar(19) COLLATE utf8mb4_bin DEFAULT NULL,
  `tipo_pessoa` char(1) COLLATE utf8mb4_bin DEFAULT NULL,
  `contato_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- Extraindo dados da tabela `fornecedor`
--

INSERT INTO `fornecedor` (`fid`, `nome`, `nome_fant`, `cnpj-cpf`, `tipo_pessoa`, `contato_id`) VALUES
(1, 'BedRoom', 'Box Bedroom', '11457712490', 'F', 2),
(4, 'Exemplo', 'Fantastico', '11457894556', 'J', 6);

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
  `epid` int(11) DEFAULT NULL,
  `vid` int(11) DEFAULT NULL,
  `quant` int(11) DEFAULT NULL
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
  `quant` int(11) DEFAULT NULL,
  `smid` int(11) DEFAULT NULL,
  `estoque_produto_id` int(11) NOT NULL,
  `data_mov` datetime DEFAULT NULL,
  `tipo` char(1) COLLATE utf8mb4_bin DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- Extraindo dados da tabela `movimentacao_estoque`
--

INSERT INTO `movimentacao_estoque` (`meid`, `quant`, `smid`, `estoque_produto_id`, `data_mov`, `tipo`) VALUES
(1, 5, 3, 1, '0000-00-00 00:00:00', 'A'),
(2, 2, 3, 2, '2019-11-16 00:00:00', 'A'),
(3, 0, 1, 2, '2019-11-16 21:58:52', 'D'),
(4, 5, 3, 4, '2019-11-16 22:07:29', 'A'),
(5, 0, 3, 4, '2019-11-16 22:07:53', 'D'),
(6, 0, 3, 4, '2019-11-16 22:11:26', 'D'),
(7, 5, 1, 4, '2019-11-16 22:13:42', 'A'),
(8, 5, 1, 4, '2019-11-16 22:18:11', 'A'),
(9, 10, 3, 4, '2019-11-16 22:56:11', 'A'),
(10, 0, 3, 4, '2019-11-16 23:09:14', 'D');

-- --------------------------------------------------------

--
-- Estrutura da tabela `produto`
--

CREATE TABLE `produto` (
  `pid` int(11) NOT NULL,
  `nome` varchar(45) COLLATE utf8mb4_bin NOT NULL,
  `data_entrega` datetime DEFAULT NULL,
  `data_validade` datetime DEFAULT NULL,
  `ingredientes_id` int(11) DEFAULT NULL,
  `desc_produto` varchar(45) COLLATE utf8mb4_bin DEFAULT NULL,
  `quant` int(11) DEFAULT 0,
  `ativo` tinyint(1) NOT NULL DEFAULT 1,
  `tipo_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- Extraindo dados da tabela `produto`
--

INSERT INTO `produto` (`pid`, `nome`, `data_entrega`, `data_validade`, `ingredientes_id`, `desc_produto`, `quant`, `ativo`, `tipo_id`) VALUES
(1, 'Refrigerante Fanta', '0000-00-00 00:00:00', '2020-01-16 00:00:00', NULL, '1,5l', 40, 0, 2),
(2, 'Trento Amendoim', '0000-00-00 00:00:00', '2020-01-22 00:00:00', NULL, '35g', 35, 0, 4),
(12, 'Bis Branco', '0000-00-00 00:00:00', '2020-04-23 00:00:00', NULL, '', 4, 0, 4),
(13, 'Barra de Chocolate Lacta', '0000-00-00 00:00:00', '2020-05-21 00:00:00', NULL, '', 40, 1, 4);

-- --------------------------------------------------------

--
-- Estrutura da tabela `produto_unidade`
--

CREATE TABLE `produto_unidade` (
  `puid` int(11) NOT NULL,
  `produto_id` int(11) DEFAULT 0,
  `unidade_id` int(11) DEFAULT 0,
  `quant` int(11) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- Extraindo dados da tabela `produto_unidade`
--

INSERT INTO `produto_unidade` (`puid`, `produto_id`, `unidade_id`, `quant`) VALUES
(2, 1, 1, 20),
(7, 12, 2, 4),
(8, 13, 1, 40);

-- --------------------------------------------------------

--
-- Estrutura da tabela `setor`
--

CREATE TABLE `setor` (
  `sid` int(11) NOT NULL,
  `nome` varchar(45) COLLATE utf8mb4_bin DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- Extraindo dados da tabela `setor`
--

INSERT INTO `setor` (`sid`, `nome`) VALUES
(1, 'Suporte'),
(2, 'Desenvolvimento'),
(3, 'Telemarketing');

-- --------------------------------------------------------

--
-- Estrutura da tabela `status_movimentacao`
--

CREATE TABLE `status_movimentacao` (
  `smid` int(11) NOT NULL,
  `nome` varchar(45) COLLATE utf8mb4_bin DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- Extraindo dados da tabela `status_movimentacao`
--

INSERT INTO `status_movimentacao` (`smid`, `nome`) VALUES
(1, 'Cancelado'),
(2, 'Aguardando'),
(3, 'Finalizado');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tipo`
--

CREATE TABLE `tipo` (
  `tid` int(11) NOT NULL,
  `nome` varchar(25) COLLATE utf8mb4_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- Extraindo dados da tabela `tipo`
--

INSERT INTO `tipo` (`tid`, `nome`) VALUES
(1, 'Bebida Quente'),
(2, 'Bebida Gelada'),
(3, 'Salgado'),
(4, 'Doce'),
(5, 'Outros');

-- --------------------------------------------------------

--
-- Estrutura da tabela `unidade_comercial`
--

CREATE TABLE `unidade_comercial` (
  `uid` int(11) NOT NULL,
  `nome` varchar(45) COLLATE utf8mb4_bin DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- Extraindo dados da tabela `unidade_comercial`
--

INSERT INTO `unidade_comercial` (`uid`, `nome`) VALUES
(1, 'UN'),
(2, 'CX'),
(3, 'PL'),
(4, 'CT');

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuario`
--

CREATE TABLE `usuario` (
  `uid` int(11) NOT NULL,
  `nome` varchar(45) COLLATE utf8mb4_bin DEFAULT NULL,
  `email` varchar(45) COLLATE utf8mb4_bin DEFAULT NULL,
  `senha` varchar(45) COLLATE utf8mb4_bin DEFAULT NULL,
  `sexo` char(1) COLLATE utf8mb4_bin DEFAULT NULL,
  `is_admin` tinyint(1) NOT NULL DEFAULT 0,
  `setor_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- Extraindo dados da tabela `usuario`
--

INSERT INTO `usuario` (`uid`, `nome`, `email`, `senha`, `sexo`, `is_admin`, `setor_id`) VALUES
(2, 'Maykon Doglas', 'maykon2000douglas@gmail.com', '62026aaed5419a1ceaa229bf6886443e', 'm', 1, 2),
(3, 'Maykon Double', 'maykon2109douglas@gmail.com', '303afa47adc42a3aa87fcfedbbdf2652', 'm', 0, 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `venda`
--

CREATE TABLE `venda` (
  `vid` int(11) NOT NULL,
  `pid` int(11) DEFAULT NULL,
  `venda_status` varchar(45) COLLATE utf8mb4_bin DEFAULT NULL,
  `ivid` int(11) DEFAULT NULL,
  `data_venda` datetime DEFAULT NULL,
  `uid` int(11) DEFAULT NULL,
  `fpid` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `capcha`
--
ALTER TABLE `capcha`
  ADD PRIMARY KEY (`cid`);

--
-- Índices para tabela `comunicados`
--
ALTER TABLE `comunicados`
  ADD PRIMARY KEY (`comunicado_id`),
  ADD KEY `setor_sid` (`setor_sid`);

--
-- Índices para tabela `contato`
--
ALTER TABLE `contato`
  ADD PRIMARY KEY (`cid`);

--
-- Índices para tabela `estoque`
--
ALTER TABLE `estoque`
  ADD PRIMARY KEY (`eid`);

--
-- Índices para tabela `estoque_fornecedor`
--
ALTER TABLE `estoque_fornecedor`
  ADD PRIMARY KEY (`efid`),
  ADD KEY `fornecedor_id` (`fornecedor_id`),
  ADD KEY `estoque_id` (`estoque_id`);

--
-- Índices para tabela `estoque_produto`
--
ALTER TABLE `estoque_produto`
  ADD PRIMARY KEY (`epid`),
  ADD KEY `pid` (`produto_id`),
  ADD KEY `eid` (`estoque_id`),
  ADD KEY `uid` (`usuario_id`);

--
-- Índices para tabela `forma_pagamento`
--
ALTER TABLE `forma_pagamento`
  ADD PRIMARY KEY (`fpid`);

--
-- Índices para tabela `fornecedor`
--
ALTER TABLE `fornecedor`
  ADD PRIMARY KEY (`fid`),
  ADD KEY `contato_id` (`contato_id`);

--
-- Índices para tabela `ingredientes`
--
ALTER TABLE `ingredientes`
  ADD PRIMARY KEY (`iid`),
  ADD KEY `tid` (`tid`),
  ADD KEY `iuid` (`iuid`);

--
-- Índices para tabela `item_venda`
--
ALTER TABLE `item_venda`
  ADD PRIMARY KEY (`ivid`),
  ADD UNIQUE KEY `ivid_UNIQUE` (`ivid`),
  ADD KEY `epid` (`epid`),
  ADD KEY `vid` (`vid`);

--
-- Índices para tabela `localicazao`
--
ALTER TABLE `localicazao`
  ADD PRIMARY KEY (`localizacao_id`);

--
-- Índices para tabela `movimentacao_estoque`
--
ALTER TABLE `movimentacao_estoque`
  ADD PRIMARY KEY (`meid`),
  ADD KEY `smid` (`smid`),
  ADD KEY `estoque_produto_id` (`estoque_produto_id`);

--
-- Índices para tabela `produto`
--
ALTER TABLE `produto`
  ADD PRIMARY KEY (`pid`),
  ADD UNIQUE KEY `pid_UNIQUE` (`pid`),
  ADD KEY `iid` (`ingredientes_id`),
  ADD KEY `tid` (`tipo_id`);

--
-- Índices para tabela `produto_unidade`
--
ALTER TABLE `produto_unidade`
  ADD PRIMARY KEY (`puid`),
  ADD KEY `pid` (`produto_id`),
  ADD KEY `uid` (`unidade_id`);

--
-- Índices para tabela `setor`
--
ALTER TABLE `setor`
  ADD PRIMARY KEY (`sid`);

--
-- Índices para tabela `status_movimentacao`
--
ALTER TABLE `status_movimentacao`
  ADD PRIMARY KEY (`smid`);

--
-- Índices para tabela `tipo`
--
ALTER TABLE `tipo`
  ADD PRIMARY KEY (`tid`);

--
-- Índices para tabela `unidade_comercial`
--
ALTER TABLE `unidade_comercial`
  ADD PRIMARY KEY (`uid`),
  ADD UNIQUE KEY `uid_UNIQUE` (`uid`);

--
-- Índices para tabela `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`uid`),
  ADD KEY `sid` (`setor_id`);

--
-- Índices para tabela `venda`
--
ALTER TABLE `venda`
  ADD PRIMARY KEY (`vid`),
  ADD UNIQUE KEY `vid_UNIQUE` (`vid`),
  ADD KEY `pid` (`pid`),
  ADD KEY `ivid` (`ivid`),
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
  MODIFY `cid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de tabela `estoque`
--
ALTER TABLE `estoque`
  MODIFY `eid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de tabela `estoque_fornecedor`
--
ALTER TABLE `estoque_fornecedor`
  MODIFY `efid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de tabela `estoque_produto`
--
ALTER TABLE `estoque_produto`
  MODIFY `epid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de tabela `forma_pagamento`
--
ALTER TABLE `forma_pagamento`
  MODIFY `fpid` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `fornecedor`
--
ALTER TABLE `fornecedor`
  MODIFY `fid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

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
  MODIFY `meid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de tabela `produto`
--
ALTER TABLE `produto`
  MODIFY `pid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de tabela `produto_unidade`
--
ALTER TABLE `produto_unidade`
  MODIFY `puid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de tabela `setor`
--
ALTER TABLE `setor`
  MODIFY `sid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de tabela `status_movimentacao`
--
ALTER TABLE `status_movimentacao`
  MODIFY `smid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de tabela `tipo`
--
ALTER TABLE `tipo`
  MODIFY `tid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de tabela `unidade_comercial`
--
ALTER TABLE `unidade_comercial`
  MODIFY `uid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de tabela `usuario`
--
ALTER TABLE `usuario`
  MODIFY `uid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de tabela `venda`
--
ALTER TABLE `venda`
  MODIFY `vid` int(11) NOT NULL AUTO_INCREMENT;

--
-- Restrições para despejos de tabelas
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
  ADD CONSTRAINT `estoque_produto_ibfk_1` FOREIGN KEY (`produto_id`) REFERENCES `produto` (`pid`),
  ADD CONSTRAINT `estoque_produto_ibfk_2` FOREIGN KEY (`estoque_id`) REFERENCES `estoque` (`eid`),
  ADD CONSTRAINT `estoque_produto_ibfk_3` FOREIGN KEY (`usuario_id`) REFERENCES `usuario` (`uid`);

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
  ADD CONSTRAINT `produto_ibfk_1` FOREIGN KEY (`ingredientes_id`) REFERENCES `ingredientes` (`iid`),
  ADD CONSTRAINT `produto_ibfk_2` FOREIGN KEY (`tipo_id`) REFERENCES `tipo` (`tid`);

--
-- Limitadores para a tabela `produto_unidade`
--
ALTER TABLE `produto_unidade`
  ADD CONSTRAINT `produto_unidade_ibfk_1` FOREIGN KEY (`produto_id`) REFERENCES `produto` (`pid`),
  ADD CONSTRAINT `produto_unidade_ibfk_3` FOREIGN KEY (`unidade_id`) REFERENCES `unidade_comercial` (`uid`);

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
