-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 06/05/2024 às 00:33
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
-- Estrutura para tabela `avaliacoes`
--

CREATE TABLE `avaliacoes` (
  `id_avaliacao` int(11) NOT NULL,
  `id_pj` int(11) DEFAULT NULL,
  `avaliacao` int(11) DEFAULT NULL,
  `comentario` text DEFAULT NULL,
  `data_avaliacao` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `avaliacoes`
--

INSERT INTO `avaliacoes` (`id_avaliacao`, `id_pj`, `avaliacao`, `comentario`, `data_avaliacao`) VALUES
(1, 1, 1, 'Muito bom', '2024-05-04 22:17:05'),
(2, 1, 1, 'Muito bom', '2024-05-04 22:18:31'),
(3, 1, 1, 'Muito bom', '2024-05-04 22:19:51');

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

INSERT INTO `pf_registro` (`id`, `user_log`, `email`, `cpf_registro`, `pw_log`, `telefone`, `genero`, `data_nascimento`) VALUES
(1, 'lucas', 'pedro@gmail.com', '12312312312', '$2y$10$1YoP2iuaLtn7kEPRfsqhbuW8AO6FzdLUbS6UJv', '41-9 9999-9999', 'homem', '2000-12-10'),
(2, 'joao ', 'joao.contato@gmail.com', '00000000000', '$2y$10$3N1gx1SIhEqwp63yc5Imk.8XI3OaelpL5ev6tp', '41-9 9999-9999', 'homem', '2000-12-10'),
(3, 'lucas10', 'lucas.contato@gmail.com', '00000000000', '$2y$10$WaVCmRKEpoa6hmKv50kkHusYX7IAD2Us7BGU5E', '41-9 9999-9999', 'homem', '2000-12-10');

-- --------------------------------------------------------

--
-- Estrutura para tabela `pj_registro`
--

CREATE TABLE `pj_registro` (
  `id_pj` int(11) NOT NULL,
  `nome_empresa` varchar(255) NOT NULL,
  `cnpj` varchar(14) NOT NULL,
  `endereco` varchar(255) NOT NULL,
  `telefone` varchar(20) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `horario_funcionamento` varchar(100) DEFAULT NULL,
  `data_cadastro` date NOT NULL DEFAULT curdate(),
  `caminho_imagem` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `pj_registro`
--

INSERT INTO `pj_registro` (`id_pj`, `nome_empresa`, `cnpj`, `endereco`, `telefone`, `email`, `horario_funcionamento`, `data_cadastro`, `caminho_imagem`) VALUES
(1, 'Hospital', '', 'Rua Abc 123', '11 1111 1111', NULL, 'Seg - Sex: 09:00 - 20:00', '2024-05-04', NULL),
(2, 'Barbearia', '', 'Rua Def 456', '11 1111 1111', NULL, 'Seg - Sex: 08:00 - 19:00', '2024-05-04', '');

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `avaliacoes`
--
ALTER TABLE `avaliacoes`
  ADD PRIMARY KEY (`id_avaliacao`),
  ADD KEY `id_pj` (`id_pj`);

--
-- Índices de tabela `pj_registro`
--
ALTER TABLE `pj_registro`
  ADD PRIMARY KEY (`id_pj`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `avaliacoes`
--
ALTER TABLE `avaliacoes`
  MODIFY `id_avaliacao` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de tabela `pj_registro`
--
ALTER TABLE `pj_registro`
  MODIFY `id_pj` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Restrições para tabelas despejadas
--

--
-- Restrições para tabelas `avaliacoes`
--
ALTER TABLE `avaliacoes`
  ADD CONSTRAINT `avaliacoes_ibfk_1` FOREIGN KEY (`id_pj`) REFERENCES `pj_registro` (`id_pj`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
