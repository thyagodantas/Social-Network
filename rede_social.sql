-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 05-Abr-2023 às 08:05
-- Versão do servidor: 10.4.27-MariaDB
-- versão do PHP: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `rede_social`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `amizades`
--

CREATE TABLE `amizades` (
  `id` int(11) NOT NULL,
  `enviou` int(11) NOT NULL,
  `recebeu` int(11) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `amizades`
--

INSERT INTO `amizades` (`id`, `enviou`, `recebeu`, `status`) VALUES
(23, 21, 23, 1),
(26, 25, 21, 1),
(27, 25, 23, 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `posts`
--

CREATE TABLE `posts` (
  `id` int(11) NOT NULL,
  `usuario_id` int(11) NOT NULL,
  `post` text NOT NULL,
  `data` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `posts`
--

INSERT INTO `posts` (`id`, `usuario_id`, `post`, `data`) VALUES
(70, 23, '<p>POST NA POSIÇÃO 1</p>', '2023-04-04 20:56:53'),
(73, 23, '<p>POST NA POSIÇÃO 2</p>', '2023-04-04 21:06:43'),
(74, 23, '<p>NA POSIÇÃO 3</p>', '2023-04-04 21:06:50'),
(78, 23, '<p>AOBA MEUS AMIGOS</p>', '2023-04-04 21:12:05'),
(79, 21, '<p>AOBA CARLOS</p>', '2023-04-04 21:12:16'),
(80, 23, '<p>OPA DANTAS</p>', '2023-04-04 21:12:25'),
(81, 21, '<p>Opa carlos dnv</p>', '2023-04-04 21:13:42');

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `senha` text NOT NULL,
  `nascimento` date NOT NULL,
  `genero` text NOT NULL,
  `ip` text NOT NULL,
  `criado` date NOT NULL,
  `ultimo_post` datetime NOT NULL DEFAULT current_timestamp(),
  `img` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `usuarios`
--

INSERT INTO `usuarios` (`id`, `nome`, `email`, `senha`, `nascimento`, `genero`, `ip`, `criado`, `ultimo_post`, `img`) VALUES
(21, 'Thyago Dantas Costa', 'thyago.dantas2017@gmail.com', '$2a$08$MTE2MjczNTE5NDY0MmQwNO3FviIRhyxJ2sTvRwhQeI0/TA/5U31pK', '2003-05-28', 'Masculino', '::1', '2023-04-03', '2023-04-04 21:13:42', '642d0a1f71a41.jpg'),
(23, 'Carlos Silva', 'mateus@email.com', '$2a$08$MTE2NTYyMzEzNjQyYjEyOOHx6udehFK7YJbNXEikT4itlST326zFi', '1999-12-15', 'Masculino', '::1', '2023-04-03', '2023-04-04 21:12:25', '642d0db842923.png'),
(25, 'Luana Moraes', 'silviopereira@gmail.com', '$2a$08$Njg5NTkzNjk5NjQyYzViO..8wlFsrP21bgr4HFKS5.cJg0RFJ.kbm', '1960-11-11', 'Feminino', '::1', '2023-04-04', '2023-04-04 19:53:06', '642d0dd0e4a6e.jpeg');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `amizades`
--
ALTER TABLE `amizades`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `amizades`
--
ALTER TABLE `amizades`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT de tabela `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=82;

--
-- AUTO_INCREMENT de tabela `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
