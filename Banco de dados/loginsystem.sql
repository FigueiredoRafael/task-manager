-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 28-Nov-2020 às 00:07
-- Versão do servidor: 10.4.11-MariaDB
-- versão do PHP: 7.4.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `loginsystem`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `profileimg`
--

CREATE TABLE `profileimg` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `img_dir` varchar(255) NOT NULL,
  `profilePic` blob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `profileimg`
--

INSERT INTO `profileimg` (`id`, `name`, `img_dir`, `profilePic`) VALUES
(31, '31.jpeg', 'img/31.jpeg', ''),
(33, '33.jpeg', 'img/33.jpeg', ''),
(36, '36.jpg', 'img/36.jpg', ''),
(37, '37.jpeg', 'img/37.jpeg', ''),
(83, '83.png', 'img/83.png', ''),
(85, '85.png', 'img/85.png', ''),
(86, '86.png', 'img/86.png', ''),
(87, '87.png', 'img/87.png', ''),
(94, '94.jpeg', 'img/94.jpeg', ''),
(95, '95.png', 'img/95.png', '');

-- --------------------------------------------------------

--
-- Estrutura da tabela `pwdreset`
--

CREATE TABLE `pwdreset` (
  `pwdResetId` int(11) NOT NULL,
  `pwdResetEmail` text NOT NULL,
  `pwdResetSelector` text NOT NULL,
  `pwdResetToken` longtext NOT NULL,
  `pwdResetExpires` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `pwdreset`
--

INSERT INTO `pwdreset` (`pwdResetId`, `pwdResetEmail`, `pwdResetSelector`, `pwdResetToken`, `pwdResetExpires`) VALUES
(30, '123456@asd.com', '1c1f69282249f1b5', '$2y$10$rKWSHvmTVog2q0DCJX1M.ujP6JRRLi6guUhNKIyRGBsuaV13WALga', '1602615729'),
(31, 'rafaelnegreirosfigueiredo@gmail.com', '2bae3f11e92e589d', '$2y$10$9hBs48m3I4SdUVXyFoxVKec9X6sAW.wUliBExsfkRfuhDd3M6EEXy', '1602615856'),
(33, 'hectorlutero@hotmail.com', '09e9f24fc8b497b7', '$2y$10$C0TNYArCbH3TeON88/YKqu7hT8bMl5xGlrVWffpun8irghLXDz3Iu', '1602616827');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tasks`
--

CREATE TABLE `tasks` (
  `taskId` int(11) NOT NULL,
  `tasks_title` varchar(100) NOT NULL,
  `tasks_resp` varchar(100) NOT NULL,
  `tasks_concl` date NOT NULL,
  `tasks_descr` longtext NOT NULL,
  `tasks_stat` enum('Aberto','Em Progresso','Concluido','Atrasado') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `tasks`
--

INSERT INTO `tasks` (`taskId`, `tasks_title`, `tasks_resp`, `tasks_concl`, `tasks_descr`, `tasks_stat`) VALUES
(4, 'tarefa do Rafito', '33', '2020-11-25', 'colocar o lixo pra fora', 'Concluido'),
(14, 'Tarefa 1', '31', '2020-11-16', 'Tarefas para o dia 12, fazer varias coisas', 'Concluido'),
(15, 'Tarefa 2', '31', '2020-11-19', 'Tarefa para o dia 20', 'Concluido'),
(18, 'tarefa 3', '31', '2020-11-17', 'tarefa 3', 'Concluido'),
(20, 'tarefa 4', '31', '2020-11-18', 'tarefa numero 4\r\n', 'Concluido'),
(21, 'tarefa aleatoria', '31', '2020-11-19', 'tarefas asdasdasd', 'Concluido'),
(22, 'asd', '31', '2020-11-18', '123', 'Concluido'),
(23, 'Jogar dota com o Lute', '33', '2020-11-19', 'Ta atrasadão', 'Em Progresso'),
(25, 'asdasd', '37', '2020-12-12', 'asdasd', 'Aberto'),
(28, 'asdasd', '48', '2021-02-23', '*Comprar pao\r\n* Lavar o chão', 'Em Progresso'),
(29, 'Lista de compras na Padaria', '48', '2020-03-12', 'asdadasdasdas\r\n\r\nasdasdasd', 'Concluido'),
(30, 'Casar com a Ingrid', '48', '2020-12-12', 'Não esquecer alianças', 'Aberto'),
(31, 'Comprar pão', '94', '2020-11-24', 'Lembrar de comprar manteiga', 'Concluido'),
(32, 'Conversar com a Mari', '94', '2020-11-25', 'Mostrar os meus projetos', 'Concluido');

-- --------------------------------------------------------

--
-- Estrutura da tabela `users`
--

CREATE TABLE `users` (
  `idUsers` int(11) NOT NULL,
  `uidUsers` tinytext NOT NULL,
  `userType` enum('admin','user') NOT NULL,
  `emailUsers` tinytext NOT NULL,
  `pwdUsers` longtext NOT NULL,
  `cpfUsers` tinytext NOT NULL,
  `genderUsers` tinytext NOT NULL,
  `addressUsers` text NOT NULL,
  `fnameUsers` text NOT NULL,
  `lnameUsers` text NOT NULL,
  `celularUsers` tinytext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `users`
--

INSERT INTO `users` (`idUsers`, `uidUsers`, `userType`, `emailUsers`, `pwdUsers`, `cpfUsers`, `genderUsers`, `addressUsers`, `fnameUsers`, `lnameUsers`, `celularUsers`) VALUES
(83, 'lute', 'user', 'lute@gmail.com', '$2y$10$LSjQZ0nl2DXtd8ULAZjp8.Oj2ZHMZSt0bkBH8uzbv2u07VHaenX7q', '11701584638', 'masculino', 'a:1:{i:0;a:7:{i:0;s:9:\"30882-660\";i:1;s:31:\"Rua Deputado Augusto Gonçalves\";i:2;s:3:\"185\";i:3;s:3:\"104\";i:4;s:7:\"Serrano\";i:5;s:14:\"Belo Horizonte\";i:6;s:2:\"MG\";}}', 'Lutero', 'Legal', '31992911684'),
(86, 'domi', 'user', 'Domi@gmail.com', '$2y$10$HPbg14E14FEesDbS/aRAMOT9VlC0xk6wgoZkL4JbOGkAc1mo/nHpi', '11701585600', 'feminino', 'a:1:{i:0;a:7:{i:0;s:9:\"30882-620\";i:1;s:17:\"Rua Maria de Deus\";i:2;s:0:\"\";i:3;s:0:\"\";i:4;s:7:\"Serrano\";i:5;s:14:\"Belo Horizonte\";i:6;s:2:\"MG\";}}', 'Domi', 'Alexandra', '31994248248'),
(87, 'rafa3', 'admin', 'rafaelf@gmail.com', '$2y$10$RIVyaTa1t/R9ZWWJRddErOclVaWPdW/boOWFHHAnNSTaqKuQptbgO', '10361969686', 'masculino', 'a:1:{i:0;a:7:{i:0;s:9:\"30882-620\";i:1;s:17:\"Rua Maria de Deus\";i:2;s:3:\"135\";i:3;s:3:\"153\";i:4;s:7:\"Serrano\";i:5;s:14:\"Belo Horizonte\";i:6;s:2:\"MG\";}}', 'joao3', 'Carioca', '3194248248'),
(94, 'Rafael', 'admin', 'rafaelnegreirosfigueiredo@gmail.com', '$2y$10$NtOjUMXz156wZ68ULOyZU.dqhDmuuccaeu0qBAJS88r2Fdhno4LU.', '81816942014', 'masculino', 'a:1:{i:0;a:7:{i:0;s:9:\"30882-660\";i:1;s:31:\"Rua Deputado Augusto Gonçalves\";i:2;s:3:\"185\";i:3;s:3:\"104\";i:4;s:7:\"Serrano\";i:5;s:14:\"Belo Horizonte\";i:6;s:2:\"MG\";}}', 'Rafael', 'Negreiros Figueiredo', '31994248248'),
(95, 'Mari', 'admin', 'mari@gmail.com', '$2y$10$IScy8QC7nztSJkBW8fynjuG.68uwe3sYdLUV1aBQ34pcSOI4ZOfOu', '390.465.836-00', 'feminino', 'a:1:{i:0;a:7:{i:0;s:9:\"88140-000\";i:1;s:23:\"Batista Manoel Rachadel\";i:2;s:2:\"49\";i:3;s:6:\"Casa B\";i:4;s:8:\"Fabricio\";i:5;s:25:\"Santo Amaro da Imperatriz\";i:6;s:2:\"SC\";}}', 'Mari', 'Ana', '11 94797-6204');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `profileimg`
--
ALTER TABLE `profileimg`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `pwdreset`
--
ALTER TABLE `pwdreset`
  ADD PRIMARY KEY (`pwdResetId`);

--
-- Índices para tabela `tasks`
--
ALTER TABLE `tasks`
  ADD PRIMARY KEY (`taskId`);

--
-- Índices para tabela `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`idUsers`);
ALTER TABLE `users` ADD FULLTEXT KEY `cpfUsers` (`cpfUsers`);
ALTER TABLE `users` ADD FULLTEXT KEY `genderUsers` (`genderUsers`);
ALTER TABLE `users` ADD FULLTEXT KEY `addressUsers` (`addressUsers`);
ALTER TABLE `users` ADD FULLTEXT KEY `nameUsers` (`fnameUsers`);
ALTER TABLE `users` ADD FULLTEXT KEY `lnameUsers` (`lnameUsers`);
ALTER TABLE `users` ADD FULLTEXT KEY `celularUsers` (`celularUsers`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `profileimg`
--
ALTER TABLE `profileimg`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=96;

--
-- AUTO_INCREMENT de tabela `pwdreset`
--
ALTER TABLE `pwdreset`
  MODIFY `pwdResetId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT de tabela `tasks`
--
ALTER TABLE `tasks`
  MODIFY `taskId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT de tabela `users`
--
ALTER TABLE `users`
  MODIFY `idUsers` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=96;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
