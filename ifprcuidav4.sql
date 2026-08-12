-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 12/08/2026 às 16:47
-- Versão do servidor: 10.4.32-MariaDB
-- Versão do PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `ifprcuida`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `agendamento`
--

CREATE TABLE `agendamento` (
  `id_agendamento` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `data_agendamento` date NOT NULL,
  `horario_agendamento` time NOT NULL,
  `motivo_agendamento` text DEFAULT NULL,
  `status_agendamento` enum('pendente','concluido','cancelado') DEFAULT 'pendente'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `agendamento`
--

INSERT INTO `agendamento` (`id_agendamento`, `id_usuario`, `data_agendamento`, `horario_agendamento`, `motivo_agendamento`, `status_agendamento`) VALUES
(2, 1, '2026-08-19', '17:54:00', 'ADAADDDD', 'pendente'),
(3, 1, '2026-08-12', '20:30:00', 'DIABO', 'pendente');

-- --------------------------------------------------------

--
-- Estrutura para tabela `sinais_risco`
--

CREATE TABLE `sinais_risco` (
  `id_sinalizacao` int(11) NOT NULL,
  `id_usuario_notificante` int(11) NOT NULL,
  `nome_colega` varchar(150) NOT NULL,
  `turma_matricula_colega` varchar(100) DEFAULT NULL,
  `nivel_urgencia` enum('baixo','medio','alto','critico') DEFAULT 'medio',
  `descricao_sinal` text NOT NULL,
  `data_registro` datetime NOT NULL DEFAULT current_timestamp(),
  `status_sinalizacao` enum('pendente','em_analise','atendido','arquivado') DEFAULT 'pendente'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `sinais_risco`
--

INSERT INTO `sinais_risco` (`id_sinalizacao`, `id_usuario_notificante`, `nome_colega`, `turma_matricula_colega`, `nivel_urgencia`, `descricao_sinal`, `data_registro`, `status_sinalizacao`) VALUES
(1, 1, 'Alon dos Santos Alves', '4 ano Informática', 'alto', 'sofre de pressão social devido ao baixo rendimento escolar tanto no instituto quanto na casa', '2026-08-11 17:15:34', 'pendente');

-- --------------------------------------------------------

--
-- Estrutura para tabela `tecnico`
--

CREATE TABLE `tecnico` (
  `idTecnico` int(11) NOT NULL,
  `id_siape` varchar(20) NOT NULL,
  `nome_tecnico` varchar(100) NOT NULL,
  `cargo_tecnico` varchar(50) NOT NULL,
  `email_tecnico` varchar(100) NOT NULL,
  `senha_tecnico` varchar(255) NOT NULL,
  `nivel_usuario` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `tecnico`
--

INSERT INTO `tecnico` (`idTecnico`, `id_siape`, `nome_tecnico`, `cargo_tecnico`, `email_tecnico`, `senha_tecnico`, `nivel_usuario`) VALUES
(1, '2029920', 'Aanbihs', 'Pedagoga', '20241tbor0020042@estudantes.ifpr.edu.br', 'e10adc3949ba59abbe56e057f20f883e', ''),
(2, '2029920', 'Larissa Diniz Ribeiro', 'Pedagoga', '20241tbor0020042@estudantes.ifpr.edu.br', 'a28f05f5f45fe2d8a900736c8935fe44', ''),
(3, '2029920', 'Larissa Diniz Ribeiro', 'Pedagoga', '20241tbor0020042@estudantes.ifpr.edu.br', '$2y$10$GGgUc/Kt3k.oUjVMzi/Sje0JCjyy.wKe14bnn37N9f64rgNKNZQ/O', ''),
(4, '2029920', 'Larissa Diniz Ribeiro', 'Pedagoga', '20241tbor0020042@estudantes.ifpr.edu.br', '$2y$10$VUeVTM.Pb0DcCUzv2fVVk.2ZL0FBKO4r4CNuHPBQvGwvC7v95pGgi', ''),
(5, '2029920', 'Larissa Diniz Ribeiro', 'Pedagoga', '20241tbor0020042@estudantes.ifpr.edu.br', '$2y$10$KQfbJH4qScviQTI9W8i/vuojTeFTMTIBfBFvJ7CtyaFcrisP9l1Eq', ''),
(6, '2029920', 'Larissa Diniz Ribeiro', 'Pedagoga', '20241tbor0020042@estudantes.ifpr.edu.br', '$2y$10$YGKGqMI8jklL5QEtfulPZueBpAt9kUokpGOhYZj857WU.OcB0eivC', ''),
(7, '2029920', 'Larissa Diniz Ribeiro', 'Pedagoga', '20241tbor0020042@estudantes.ifpr.edu.br', '$2y$10$im3qNWp6m96KsjHzFv/Q5OTe1eqjOvQ5vWlmZrRLLLTzuLKeKLF4i', ''),
(8, '2029920', 'Larissa Diniz Ribeiro', 'Pedagoga', '20241tbor0020042@estudantes.ifpr.edu.br', '$2y$10$uv2RN3wlBWiBHsPZnbJAK.SD09vmSusvuEfk5etN9Gd8rC4DwRYNe', ''),
(9, '2029920', 'Larissa Diniz Ribeiro', 'Pedagoga', '20241tbor0020042@estudantes.ifpr.edu.br', '$2y$10$elgIYVzbzCbUoGcLunxXTuGA6wQ56K3mU3azXenbtXZgrlfrdOPR.', '');

-- --------------------------------------------------------

--
-- Estrutura para tabela `usuarios`
--

CREATE TABLE `usuarios` (
  `id_usuario` int(11) NOT NULL,
  `matricula_usuario` varchar(50) DEFAULT NULL,
  `nome_usuario` varchar(150) NOT NULL,
  `email_usuario` varchar(150) NOT NULL,
  `senha_usuario` varchar(100) NOT NULL,
  `nivel_usuario` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `usuarios`
--

INSERT INTO `usuarios` (`id_usuario`, `matricula_usuario`, `nome_usuario`, `email_usuario`, `senha_usuario`, `nivel_usuario`) VALUES
(1, '123131', 'Miguel', 'miguel@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'Estudante'),
(2, '20241tbor0020042', 'miguel', '20241tbor0020042@estudantes.ifpr.edu.br', 'fb358d6d2688e84fc02fe175c197407e', 'Estudante'),
(3, '20241tbor0020042', 'miguel', '20241tbor0020042@estudantes.ifpr.edu.br', 'e10adc3949ba59abbe56e057f20f883e', 'Estudante');

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `agendamento`
--
ALTER TABLE `agendamento`
  ADD PRIMARY KEY (`id_agendamento`),
  ADD KEY `id_usuario` (`id_usuario`);

--
-- Índices de tabela `sinais_risco`
--
ALTER TABLE `sinais_risco`
  ADD PRIMARY KEY (`id_sinalizacao`),
  ADD KEY `id_usuario_notificante` (`id_usuario_notificante`);

--
-- Índices de tabela `tecnico`
--
ALTER TABLE `tecnico`
  ADD PRIMARY KEY (`idTecnico`);

--
-- Índices de tabela `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id_usuario`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `agendamento`
--
ALTER TABLE `agendamento`
  MODIFY `id_agendamento` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de tabela `sinais_risco`
--
ALTER TABLE `sinais_risco`
  MODIFY `id_sinalizacao` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `tecnico`
--
ALTER TABLE `tecnico`
  MODIFY `idTecnico` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de tabela `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Restrições para tabelas despejadas
--

--
-- Restrições para tabelas `agendamento`
--
ALTER TABLE `agendamento`
  ADD CONSTRAINT `fk_agendamento_usuario` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id_usuario`);

--
-- Restrições para tabelas `sinais_risco`
--
ALTER TABLE `sinais_risco`
  ADD CONSTRAINT `fk_sinais_usuario` FOREIGN KEY (`id_usuario_notificante`) REFERENCES `usuarios` (`id_usuario`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
