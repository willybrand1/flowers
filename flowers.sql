-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 03-Fev-2021 às 18:57
-- Versão do servidor: 10.4.17-MariaDB
-- versão do PHP: 8.0.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `flowers`
--
CREATE DATABASE IF NOT EXISTS `flowers` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `flowers`;

-- --------------------------------------------------------

--
-- Estrutura da tabela `abelhas`
--

DROP TABLE IF EXISTS `abelhas`;
CREATE TABLE `abelhas` (
  `cod_abl` bigint(20) UNSIGNED NOT NULL,
  `abl_nome` varchar(100) NOT NULL,
  `abl_especie` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `abelhas`
--

INSERT INTO `abelhas` (`cod_abl`, `abl_nome`, `abl_especie`) VALUES
(1, 'Uruçu', 'Melipona scutellaris'),
(2, 'Uruçu-Amarela', 'Melipona rufiventris'),
(8, 'Guarupu', 'Melipona bicolor');

-- --------------------------------------------------------

--
-- Estrutura da tabela `flores`
--

DROP TABLE IF EXISTS `flores`;
CREATE TABLE `flores` (
  `cod_flw` bigint(20) UNSIGNED NOT NULL,
  `flw_nome` varchar(100) NOT NULL,
  `flw_especie` varchar(100) NOT NULL,
  `flw_descricao` text NOT NULL,
  `flw_imagem` varchar(255) NOT NULL,
  `flw_abelhas` varchar(200) NOT NULL,
  `flw_meses` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `flores`
--

INSERT INTO `flores` (`cod_flw`, `flw_nome`, `flw_especie`, `flw_descricao`, `flw_imagem`, `flw_abelhas`, `flw_meses`) VALUES
(1, 'Azaleia', 'Rododendros', 'A azálea ou azaleia é um arbusto de flores classificadas no gênero dos rododendros, existem azaleias de folhas caducas e azaleias perenes. É um dos símbolos da cidade de São Paulo, assim declarado pelo prefeito Jânio Quadros.', 'azaleia.jpg', 'Guarupu,Uruçu-Amarela', 'MAI,JUN,JUL'),
(3, 'Tulipa', 'Angiosperma', 'Tulipa é um género de plantas angiospermas da família das liláceas. Com cerca de cem folhagens surge uma haste ereta, com flor solitária formada por seis pétalas. Suas cores e formas são bem variadas. Existem muitas variedades cultivadas e milhares de híbridos em diversas cores, tons matizados, pontas picotadas, etc.', 'tulipas3.jpeg', 'Guarupu,Uruçu-Amarela', 'JAN,JUN'),
(5, 'Margarida', 'Chrysanthemum leucanthemum ou Leucanthemum vulgare', 'A espécie designada por Chrysanthemum leucanthemum ou Leucanthemum vulgare, designada pelos termos populares, pouco precisos, bem-me-quer, bonina, margarida, margarita, margarita-maior, malmequer, malmequer-maior, malmequer-bravo ou olho-de-boi, é uma planta herbácea e perene, originária da Europa.', '', 'Guarupu,Uruçu', 'SET,OUT,NOV,DEZ'),
(6, 'Crisântemo', 'Asteraceae', 'Chrysanthemum, de nome vulgar crisântemo, é um género botânico pertencente à família Asteraceae. É uma planta de tradição de cultivo milenar nos países asiáticos. É considerada uma planta de dia curto. Em grego, crisântemo significa \"flor de ouro\"', 'unnamed.jpg', 'Guarupu', 'ABR,MAI');

-- --------------------------------------------------------

--
-- Estrutura da tabela `meses`
--

DROP TABLE IF EXISTS `meses`;
CREATE TABLE `meses` (
  `cod_mes` bigint(20) UNSIGNED NOT NULL,
  `mes` varchar(10) NOT NULL,
  `mes_abrev` varchar(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `meses`
--

INSERT INTO `meses` (`cod_mes`, `mes`, `mes_abrev`) VALUES
(1, 'Janeiro', 'JAN'),
(2, 'Fevereiro', 'FEV'),
(3, 'Março', 'MAR'),
(4, 'Abril', 'ABR'),
(5, 'Maio', 'MAI'),
(6, 'Junho', 'JUN'),
(7, 'Julho', 'JUL'),
(8, 'Agosto', 'AGO'),
(9, 'Setembro', 'SET'),
(10, 'Outubro', 'OUT'),
(11, 'Novembro', 'NOV'),
(12, 'Dezembro', 'DEZ');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `abelhas`
--
ALTER TABLE `abelhas`
  ADD PRIMARY KEY (`cod_abl`),
  ADD UNIQUE KEY `cod_abl` (`cod_abl`);

--
-- Índices para tabela `flores`
--
ALTER TABLE `flores`
  ADD PRIMARY KEY (`cod_flw`),
  ADD UNIQUE KEY `cod_flw` (`cod_flw`);

--
-- Índices para tabela `meses`
--
ALTER TABLE `meses`
  ADD PRIMARY KEY (`cod_mes`),
  ADD UNIQUE KEY `cod_mes` (`cod_mes`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `abelhas`
--
ALTER TABLE `abelhas`
  MODIFY `cod_abl` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de tabela `flores`
--
ALTER TABLE `flores`
  MODIFY `cod_flw` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de tabela `meses`
--
ALTER TABLE `meses`
  MODIFY `cod_mes` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
