-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 12-Jul-2022 às 02:05
-- Versão do servidor: 10.4.22-MariaDB
-- versão do PHP: 8.1.2


--
-- Banco de dados: `academia`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `alunos`
--
create database academia;

CREATE TABLE `alunos` (
  `idAluno` int(11) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `sobrenome` varchar(255) NOT NULL,
  `rg` varchar(45) NOT NULL,
  `cpf` varchar(14) NOT NULL,
  `cep` varchar(9) NOT NULL,
  `cidade` varchar(45) NOT NULL,
  `bairro` varchar(45) NOT NULL,
  `rua` varchar(255) NOT NULL,
  `numero` int(11) NOT NULL,
  `sexo` tinyint(4) NOT NULL COMMENT '1- Masculino / 2- Feminino',
  `dataNascimento` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `alunos`
--

INSERT INTO `alunos` (`idAluno`, `nome`, `sobrenome`, `rg`, `cpf`, `cep`, `cidade`, `bairro`, `rua`, `numero`, `sexo`, `dataNascimento`) VALUES
(3, 'OTAVIO', 'VICENTE', '12154498', '081.633.809-42', '89237-376', 'Joinville', 'Vila Nova', 'Rua João Sancho Moreira', 131, 1, '2004-12-22'),
(4, 'MARCEL', 'LEITE DE FARIAS', '446391931', '132.847.059-88', '89225-676', 'Joinville', 'Aventureiro', 'Rua Expedicionário Aníbal dos Passos', 122, 1, '2003-11-10'),
(5, 'CLAUDINEI', 'JUNIOR', '473616968', '117.349.529-03', '89237-263', 'Joinville', 'Vila Nova', 'Rua Elário Gastão Baumer', 564, 1, '2004-08-20'),
(6, 'LUCAS', 'MIOTI', '860144521', '100.347.969-32', '89228-000', 'Joinville', 'Comasa', 'Rua Prefeito Baltazar Buschle', 1600, 1, '2004-08-19');

-- --------------------------------------------------------

--
-- Estrutura da tabela `funcionarios`
--

CREATE TABLE `funcionarios` (
  `idFuncionario` int(11) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `sobrenome` varchar(255) NOT NULL,
  `dataNascimento` date NOT NULL,
  `sexo` tinyint(4) NOT NULL COMMENT '1- Masculino / 2- Feminino',
  `rg` varchar(45) NOT NULL,
  `cpf` varchar(14) NOT NULL,
  `cep` varchar(9) NOT NULL,
  `cidade` varchar(45) NOT NULL,
  `bairro` varchar(45) NOT NULL,
  `rua` varchar(255) NOT NULL,
  `numero` int(11) NOT NULL,
  `estadoCivil` tinyint(4) NOT NULL COMMENT '1- Casado / 2- Solteiro / 3- Divorciado / 4- Viúvo',
  `salario` decimal(6,2) NOT NULL,
  `cargaHoraria` int(3) NOT NULL,
  `nacionalidade` varchar(45) NOT NULL,
  `descCargo` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `funcionarios`
--

INSERT INTO `funcionarios` (`idFuncionario`, `nome`, `sobrenome`, `dataNascimento`, `sexo`, `rg`, `cpf`, `cep`, `cidade`, `bairro`, `rua`, `numero`, `estadoCivil`, `salario`, `cargaHoraria`, `nacionalidade`, `descCargo`) VALUES
(8, 'Eduardo', 'Hermes', '2002-10-20', 1, '20.903.440-3', '081.633.809-42', '89237-376', 'Joinville', 'Vila Nova', 'Rua João Sancho Moreira', 200, 1, '4999.99', 60, 'europeu', 'atendente'),
(10, 'RAIUMUNDO', 'GOMES', '2003-12-17', 1, '20.903.440-3', '021.299.889-70', '89225-676', 'Joinville', 'Aventureiro', 'Rua Expedicionário Aníbal dos Passos', 122, 1, '1999.99', 80, 'brasileiro', 'personal'),
(11, 'JOAO', 'PAULO', '1986-05-04', 1, '392251474', '235.409.880-41', '08770-560', 'Mogi das Cruzes', 'Jardim Ponte Grande', 'Largo General Anésio de Oliveira', 569, 3, '2000.00', 30, 'brasileiro', 'PERSONAL');

-- --------------------------------------------------------

--
-- Estrutura da tabela `planos`
--

CREATE TABLE `planos` (
  `idPlano` int(11) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `preco` varchar(45) NOT NULL,
  `duracao` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `planos`
--

INSERT INTO `planos` (`idPlano`, `nome`, `preco`, `duracao`) VALUES
(2, 'SILVER', '60', 'mensal'),
(3, 'DIAMOND', '60', 'SEMANAL'),
(4, 'RUBY', '210', 'MENSAL'),
(5, 'GOLD', '400', 'SEMESTRAL');

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuarios`
--

CREATE TABLE `usuarios` (
  `idUsuario` int(11) NOT NULL,
  `nomeUsuario` varchar(100) NOT NULL,
  `senha` char(32) NOT NULL,
  `nivel` tinyint(4) NOT NULL COMMENT '1- Gerente / 2- Funcionário'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `usuarios`
--

INSERT INTO `usuarios` (`idUsuario`, `nomeUsuario`, `senha`, `nivel`) VALUES
(3, 'marcel', '202cb962ac59075b964b07152d234b70', 1),
(4, 'otavio', '202cb962ac59075b964b07152d234b70', 2);

-- --------------------------------------------------------

--
-- Estrutura da tabela `vendas`
--

CREATE TABLE `vendas` (
  `idVenda` int(11) NOT NULL,
  `planos_idPlano` int(11) NOT NULL,
  `alunos_idAluno` int(11) NOT NULL,
  `situacao` varchar(45) NOT NULL COMMENT '1- Ativo / 2- Não ativo',
  `formaPagamento` varchar(45) NOT NULL,
  `data` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `vendas`
--

INSERT INTO `vendas` (`idVenda`, `planos_idPlano`, `alunos_idAluno`, `situacao`, `formaPagamento`, `data`) VALUES
(2, 2, 3, 'Ativo', 'BOLETO', '2022-07-11'),
(3, 3, 4, 'Ativo', 'CREDITO', '2022-07-11'),
(4, 4, 5, 'Ativo', 'DEBITO', '2022-07-11');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `alunos`
--
ALTER TABLE `alunos`
  ADD PRIMARY KEY (`idAluno`);

--
-- Índices para tabela `funcionarios`
--
ALTER TABLE `funcionarios`
  ADD PRIMARY KEY (`idFuncionario`);

--
-- Índices para tabela `planos`
--
ALTER TABLE `planos`
  ADD PRIMARY KEY (`idPlano`);

--
-- Índices para tabela `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`idUsuario`);

--
-- Índices para tabela `vendas`
--
ALTER TABLE `vendas`
  ADD PRIMARY KEY (`idVenda`),
  ADD KEY `fk_vendas_planos_idx` (`planos_idPlano`),
  ADD KEY `fk_vendas_alunos1_idx` (`alunos_idAluno`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `alunos`
--
ALTER TABLE `alunos`
  MODIFY `idAluno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de tabela `funcionarios`
--
ALTER TABLE `funcionarios`
  MODIFY `idFuncionario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de tabela `planos`
--
ALTER TABLE `planos`
  MODIFY `idPlano` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de tabela `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `idUsuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de tabela `vendas`
--
ALTER TABLE `vendas`
  MODIFY `idVenda` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `vendas`
--
ALTER TABLE `vendas`
  ADD CONSTRAINT `fk_vendas_alunos1` FOREIGN KEY (`alunos_idAluno`) REFERENCES `alunos` (`idAluno`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_vendas_planos` FOREIGN KEY (`planos_idPlano`) REFERENCES `planos` (`idPlano`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;
