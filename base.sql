-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 06/11/2023 às 04:09
-- Versão do servidor: 10.4.28-MariaDB
-- Versão do PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `base`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `agenda`
--

CREATE TABLE `agenda` (
  `id_agenda` int(10) NOT NULL,
  `nome_age` varchar(100) NOT NULL,
  `email_age` varchar(255) NOT NULL,
  `date_age` date NOT NULL,
  `time_age` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `agenda`
--

INSERT INTO `agenda` (`id_agenda`, `nome_age`, `email_age`, `date_age`, `time_age`) VALUES
(1, 'pedro', 'pedro@gmail.com', '2023-12-10', '10:00:00'),
(2, 'lucas', 'pedro@gmail.com', '2022-10-12', '12:00:00');

-- --------------------------------------------------------

--
-- Estrutura para tabela `login`
--

CREATE TABLE `login` (
  `id_log` int(10) NOT NULL,
  `nome_log` varchar(30) NOT NULL,
  `user_log` varchar(30) NOT NULL,
  `pw_log` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `login`
--

INSERT INTO `login` (`id_log`, `nome_log`, `user_log`, `pw_log`) VALUES
(1, 'Lucas', 'admin', '81dc9bdb52d04dc20036dbd8313ed055');

-- --------------------------------------------------------

--
-- Estrutura para tabela `pf_registro`
--

CREATE TABLE `pf_registro` (
  `id` int(11) NOT NULL,
  `user_log` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `cpf_registro` varchar(14) NOT NULL,
  `pw_log` varchar(45) NOT NULL,
  `telefone` varchar(14) NOT NULL,
  `genero` varchar(10) NOT NULL,
  `data_nascimento` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `pf_registro`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `pf_registro`
--

-- Adicionando tabela para Pessoa Jurídica (PJ)
CREATE TABLE `pj_registro` (
  `id_pj` int(11) NOT NULL AUTO_INCREMENT,
  `nome_empresa` varchar(100) NOT NULL,
  `cnpj` varchar(18) NOT NULL,
  `email` varchar(255) NOT NULL,
  `telefone` varchar(14) NOT NULL,
  `tipo_servico` varchar(100) NOT NULL,
  PRIMARY KEY (`id_pj`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;


INSERT INTO `pf_registro` (`id`, `user_log`, `email`, `cpf`, `pw_log`, `telefone`, `genero`, `data_nascimento`) VALUES
(1, 'lucas', 'pedro@gmail.com', '12312312312', '$2y$10$1YoP2iuaLtn7kEPRfsqhbuW8AO6FzdLUbS6UJv', '41-9 9999-9999', 'homem', '2000-12-10'),
(2, 'joao ', 'joao.contato@gmail.com', '00000000000', '$2y$10$3N1gx1SIhEqwp63yc5Imk.8XI3OaelpL5ev6tp', '41-9 9999-9999', 'homem', '2000-12-10'),
(3, 'lucas10', 'lucas.contato@gmail.com', '00000000000', '$2y$10$WaVCmRKEpoa6hmKv50kkHusYX7IAD2Us7BGU5E', '41-9 9999-9999', 'homem', '2000-12-10');

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `agenda`
--
ALTER TABLE `agenda`
  ADD PRIMARY KEY (`id_agenda`);

--
-- Índices de tabela `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`id_log`);

--
-- Índices de tabela `pf_registro`
--
ALTER TABLE `pf_registro`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `agenda`
--
ALTER TABLE `agenda`
  MODIFY `id_agenda` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `login`
--
ALTER TABLE `login`
  MODIFY `id_log` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `pf_registro`
--
ALTER TABLE `pf_registro`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
