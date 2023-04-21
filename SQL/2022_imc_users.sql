-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : mar. 04 oct. 2022 à 03:44
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
-- Base de données : `2022_imc_users`
--

-- --------------------------------------------------------

--
-- Structure de la table `starnortf_imc_log`
--

DROP TABLE IF EXISTS `starnortf_imc_log`;
CREATE TABLE IF NOT EXISTS `starnortf_imc_log` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `date` timestamp NOT NULL DEFAULT current_timestamp(),
  `ip` varchar(15) NOT NULL,
  `taille` float NOT NULL,
  `poids` float NOT NULL,
  `imc` float NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `starnortf_imc_log`
--

INSERT INTO `starnortf_imc_log` (`id`, `date`, `ip`, `taille`, `poids`, `imc`) VALUES
(1, '2022-09-29 10:50:06', '::1', 180, 70, 21.6);

-- --------------------------------------------------------

--
-- Structure de la table `starnortf_imc_visites`
--

DROP TABLE IF EXISTS `starnortf_imc_visites`;
CREATE TABLE IF NOT EXISTS `starnortf_imc_visites` (
  `annee` char(10) NOT NULL,
  `mois` char(10) NOT NULL,
  `nb_visites` int(11) NOT NULL,
  PRIMARY KEY (`annee`,`mois`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `starnortf_imc_visites`
--

INSERT INTO `starnortf_imc_visites` (`annee`, `mois`, `nb_visites`) VALUES
('2022', '9', 40),
('2022', '8', 50),
('2022', '10', 41);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
