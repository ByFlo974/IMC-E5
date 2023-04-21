-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : mar. 04 oct. 2022 à 03:43
-- Version du serveur : 10.6.5-MariaDB
-- Version de PHP : 7.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `2022_imc`
--

-- --------------------------------------------------------

--
-- Structure de la table `imc_log`
--

DROP TABLE IF EXISTS `imc_log`;
CREATE TABLE IF NOT EXISTS `imc_log` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `date` timestamp NOT NULL DEFAULT current_timestamp(),
  `ip` varchar(15) NOT NULL,
  `pseudo` varchar(15) NOT NULL,
  `taille` float NOT NULL,
  `poids` float NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=30 DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `imc_log`
--

INSERT INTO `imc_log` (`id`, `date`, `ip`, `pseudo`, `taille`, `poids`) VALUES
(2, '2022-09-17 11:58:48', '172.27.17.10', 'ndefay', 170, 80),
(3, '2022-09-17 12:05:51', '172.27.17.10', 'ndefay', 180, 90),
(4, '2022-09-17 12:06:14', '172.27.17.10', 'ndefay', 171, 69),
(5, '2022-09-20 05:53:25', '172.18.159.19', 'ndefay', 180, 78),
(6, '2022-09-20 04:44:02', '172.18.159.4', 'ndefay', 180, 90),
(8, '2022-09-20 05:50:47', '172.18.152.254', 'Sameer', 99, 99),
(10, '2022-09-20 05:57:28', '172.18.159.13', 'Steph', 999, 99),
(12, '2022-09-20 06:18:31', '172.18.159.4', 'Florian', 999, 99),
(13, '2022-09-20 06:19:15', '172.18.152.254', 'heatitachi', 99, 99),
(14, '2022-09-20 06:21:15', '127.0.0.1', 'victor', 175, 65),
(15, '2022-09-20 06:21:32', '172.18.159.5', 'TriCorN', 999, 999),
(17, '2022-09-20 06:25:33', '172.18.159.7', 'bryce', 99, 99),
(18, '2022-09-20 06:26:18', ' 172.18.159.14', 'Damien', 120, 55),
(21, '2022-09-20 06:35:26', '172.18.159.6', 'Victor', 180, 65),
(22, '2022-09-20 06:39:15', '172.18.159.13', 'Steph', 999, 999),
(23, '2022-09-20 06:40:20', '172.18.159.123', 'DavidMichigan', 999, 99999),
(25, '2022-09-20 06:59:36', '172.18.159.7', 'bryce', 170200, 200),
(26, '2022-09-29 10:44:22', '::1', 'Florian', 172, 80),
(27, '2022-09-29 10:45:09', '::1', 'Florian', 172, 80),
(28, '2022-09-29 10:47:15', '::1', 'Florian', 180, 80),
(29, '2022-09-29 10:50:06', '::1', 'Florian', 180, 70);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
