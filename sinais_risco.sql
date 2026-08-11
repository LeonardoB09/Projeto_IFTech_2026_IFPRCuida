-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 11-Ago-2026 às 22:30
-- Versão do servidor: 8.0.29
-- versão do PHP: 8.1.6

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
-- Estrutura da tabela `sinais_risco`
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
-- Extraindo dados da tabela `sinais_risco`
--

INSERT INTO `sinais_risco` (`id_sinalizacao`, `id_usuario_notificante`, `nome_colega`, `turma_matricula_colega`, `nivel_urgencia`, `descricao_sinal`, `data_registro`, `status_sinalizacao`) VALUES
(1, 1, 'Alon dos Santos Alves', '4 ano Informática', 'alto', 'sofre de pressão social devido ao baixo rendimento escolar tanto no instituto quanto na casa', '2026-08-11 17:15:34', 'pendente');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `sinais_risco`
--
ALTER TABLE `sinais_risco`
  ADD PRIMARY KEY (`id_sinalizacao`),
  ADD KEY `id_usuario_notificante` (`id_usuario_notificante`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `sinais_risco`
--
ALTER TABLE `sinais_risco`
  MODIFY `id_sinalizacao` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `sinais_risco`
--
ALTER TABLE `sinais_risco`
  ADD CONSTRAINT `fk_sinais_usuario` FOREIGN KEY (`id_usuario_notificante`) REFERENCES `usuarios` (`id_usuario`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
