-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 28-Jun-2022 às 02:36
-- Versão do servidor: 10.4.22-MariaDB
-- versão do PHP: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `academia`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `alunos`
--

CREATE TABLE `alunos` (
  `idAluno` int(11) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `sobrenome` varchar(255) NOT NULL,
  `rg` varchar(45) NOT NULL,
  `cpf` bigint(11) NOT NULL,
  `cep` int(11) NOT NULL,
  `cidade` varchar(45) NOT NULL,
  `bairro` varchar(45) NOT NULL,
  `rua` varchar(255) NOT NULL,
  `numero` int(11) NOT NULL,
  `sexo` tinyint(4) NOT NULL COMMENT '1- Masculino / 2- Feminino',
  `dataNascimento` date NOT NULL,
  `foto` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `alunos`
--

INSERT INTO `alunos` (`idAluno`, `nome`, `sobrenome`, `rg`, `cpf`, `cep`, `cidade`, `bairro`, `rua`, `numero`, `sexo`, `dataNascimento`, `foto`) VALUES
(1, 'Marcel', 'Farias', '8989', 8989, 8989, 'joinville', 'aventureirpo', 'ruahdwuia', 122, 1, '2003-12-17', '');

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
  `cpf` bigint(11) NOT NULL,
  `cep` int(11) NOT NULL,
  `cidade` varchar(45) NOT NULL,
  `bairro` varchar(45) NOT NULL,
  `rua` varchar(255) NOT NULL,
  `numero` int(11) NOT NULL,
  `estadoCivil` tinyint(4) NOT NULL COMMENT '1- Casado / 2- Solteiro / 3- Divorciado / 4- Viúvo',
  `salario` decimal(6,2) NOT NULL,
  `cargaHoraria` int(3) NOT NULL,
  `nacionalidade` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
(1, 'Gold', '15', 'Mensal');

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
(1, 1, 1, 'Ativo', 'Boleto', '2003-12-17'),
(2, 1, 1, 'Ativo', 'Boleto', '1111-11-11'),
(3, 1, 1, 'Ativo', 'Boleto', '1111-11-11');

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
  MODIFY `idAluno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `funcionarios`
--
ALTER TABLE `funcionarios`
  MODIFY `idFuncionario` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `planos`
--
ALTER TABLE `planos`
  MODIFY `idPlano` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `idUsuario` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `vendas`
--
ALTER TABLE `vendas`
  MODIFY `idVenda` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

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

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
