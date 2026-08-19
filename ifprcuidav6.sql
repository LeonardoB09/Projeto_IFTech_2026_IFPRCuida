-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 19/08/2026 às 22:37
-- Versão do servidor: 8.4.8
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
  `id_agendamento` int NOT NULL,
  `id_usuario` int NOT NULL,
  `data_agendamento` date NOT NULL,
  `horario_agendamento` time NOT NULL,
  `motivo_agendamento` text COLLATE utf8mb4_general_ci,
  `status_agendamento` enum('pendente','concluido','cancelado') COLLATE utf8mb4_general_ci DEFAULT 'pendente'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `agendamento`
--

INSERT INTO `agendamento` (`id_agendamento`, `id_usuario`, `data_agendamento`, `horario_agendamento`, `motivo_agendamento`, `status_agendamento`) VALUES
(2, 1, '2026-08-19', '17:54:00', 'ADAADDDD', 'pendente'),
(3, 1, '2026-08-12', '20:30:00', 'DIABO', 'pendente'),
(4, 22, '2027-04-02', '20:34:00', 'Ansiedade', 'pendente'),
(5, 22, '2026-08-28', '18:30:00', 'aaaa', 'pendente'),
(6, 22, '4444-02-02', '23:39:00', 'ansiedade', 'pendente');

-- --------------------------------------------------------

--
-- Estrutura para tabela `sinais_risco`
--

CREATE TABLE `sinais_risco` (
  `id_sinalizacao` int NOT NULL,
  `id_usuario_notificante` int NOT NULL,
  `nome_colega` varchar(150) COLLATE utf8mb4_general_ci NOT NULL,
  `turma_matricula_colega` varchar(100) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `nivel_urgencia` enum('baixo','medio','alto','critico') COLLATE utf8mb4_general_ci DEFAULT 'medio',
  `descricao_sinal` text COLLATE utf8mb4_general_ci NOT NULL,
  `data_registro` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status_sinalizacao` enum('pendente','em_analise','atendido','arquivado') COLLATE utf8mb4_general_ci DEFAULT 'pendente'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `sinais_risco`
--

INSERT INTO `sinais_risco` (`id_sinalizacao`, `id_usuario_notificante`, `nome_colega`, `turma_matricula_colega`, `nivel_urgencia`, `descricao_sinal`, `data_registro`, `status_sinalizacao`) VALUES
(1, 1, 'Alon dos Santos Alves', '4 ano Informática', 'alto', 'sofre de pressão social devido ao baixo rendimento escolar tanto no instituto quanto na casa', '2026-08-11 17:15:34', 'pendente');

-- --------------------------------------------------------

--
-- Estrutura para tabela `usuarios`
--

CREATE TABLE `usuarios` (
  `id_usuario` int NOT NULL,
  `matricula_usuario` varchar(50) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `nome_usuario` varchar(150) COLLATE utf8mb4_general_ci NOT NULL,
  `email_usuario` varchar(150) COLLATE utf8mb4_general_ci NOT NULL,
  `senha_usuario` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `nivel_usuario` varchar(100) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `usuarios`
--

INSERT INTO `usuarios` (`id_usuario`, `matricula_usuario`, `nome_usuario`, `email_usuario`, `senha_usuario`, `nivel_usuario`) VALUES
(1, '123131', 'Miguel', 'miguel@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'Estudante'),
(2, '20241tbor0020042', 'miguel', '20241tbor0020042@estudantes.ifpr.edu.br', 'fb358d6d2688e84fc02fe175c197407e', 'Estudante'),
(3, '20241tbor0020042', 'miguel', '20241tbor0020042@estudantes.ifpr.edu.br', 'e10adc3949ba59abbe56e057f20f883e', 'Estudante'),
(4, '1234', 'Eduardo', 'eduardinho@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'Tecnico'),
(5, '12345', 'Leonardo', 'leonardo@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'Estudante'),
(6, '20241tbor0020042', 'Miguel', '20241tbor0020042@estudantes.ifpr.edu.br', '81dc9bdb52d04dc20036dbd8313ed055', 'Estudante'),
(7, '202313403', 'BlaBla', '20241tbor0020042@estudantes.ifpr.edu.br', '81dc9bdb52d04dc20036dbd8313ed055', 'Tecnico'),
(8, '202313403', 'BlaBla', '20241tbor0020042@estudantes.ifpr.edu.br', '81dc9bdb52d04dc20036dbd8313ed055', 'Tecnico'),
(9, '202313403', 'BlaBla', '20241tbor0020042@estudantes.ifpr.edu.br', '81dc9bdb52d04dc20036dbd8313ed055', 'Tecnico'),
(10, '202313403', 'BlaBla', '20241tbor0020042@estudantes.ifpr.edu.br', '81dc9bdb52d04dc20036dbd8313ed055', 'Tecnico'),
(11, '202313403', 'BlaBla', '20241tbor0020042@estudantes.ifpr.edu.br', '81dc9bdb52d04dc20036dbd8313ed055', 'Tecnico'),
(12, '202313403', 'BlaBla', '20241tbor0020042@estudantes.ifpr.edu.br', '81dc9bdb52d04dc20036dbd8313ed055', 'Tecnico'),
(13, '202313403', 'BlaBla', '20241tbor0020042@estudantes.ifpr.edu.br', '81dc9bdb52d04dc20036dbd8313ed055', 'Tecnico'),
(14, '202313403', 'BlaBla', '20241tbor0020042@estudantes.ifpr.edu.br', '81dc9bdb52d04dc20036dbd8313ed055', 'Tecnico'),
(15, '202313403', 'BlaBla', '20241tbor0020042@estudantes.ifpr.edu.br', '81dc9bdb52d04dc20036dbd8313ed055', 'Tecnico'),
(16, '202313403', 'BlaBla', '20241tbor0020042@estudantes.ifpr.edu.br', '81dc9bdb52d04dc20036dbd8313ed055', 'Tecnico'),
(17, '202313403', 'BlaBla', '20241tbor0020042@estudantes.ifpr.edu.br', '81dc9bdb52d04dc20036dbd8313ed055', 'Tecnico'),
(18, '202313403', 'BlaBla', '20241tbor0020042@estudantes.ifpr.edu.br', '81dc9bdb52d04dc20036dbd8313ed055', 'Tecnico'),
(19, '202313403', 'BlaBla', '20241tbor0020042@estudantes.ifpr.edu.br', '81dc9bdb52d04dc20036dbd8313ed055', 'Tecnico'),
(20, '20241tbor0020042', 'Miguel', '20241tbor0020042@estudantes.ifpr.edu.br', '81dc9bdb52d04dc20036dbd8313ed055', 'Estudante'),
(21, '111111111', 'BlaBla', '20241tbor0020022@estudantes.ifpr.edu.br', '81dc9bdb52d04dc20036dbd8313ed055', 'Tecnico'),
(22, '20241tbor0020022', 'Padilha Paes', 'maria@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', 'Estudante');

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
  MODIFY `id_agendamento` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de tabela `sinais_risco`
--
ALTER TABLE `sinais_risco`
  MODIFY `id_sinalizacao` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id_usuario` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

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
