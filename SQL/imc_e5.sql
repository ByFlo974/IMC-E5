-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : jeu. 20 avr. 2023 à 17:13
-- Version du serveur : 5.7.31
-- Version de PHP : 8.1.12



--
-- Base de données : `imc_e5`
--

DELIMITER $$
--
-- Procédures
--
DROP PROCEDURE IF EXISTS `modifier_mot_de_passe`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `modifier_mot_de_passe` (IN `p_nom` VARCHAR(50), IN `p_prenom` VARCHAR(50), IN `p_login` VARCHAR(50), IN `p_nouveau_mdp` VARCHAR(50))   BEGIN
  DECLARE nb_utilisateurs INT;
  
  -- Vérifier si l'utilisateur existe
  SELECT COUNT(*) INTO nb_utilisateurs
  FROM utilisateur
  WHERE nom = p_nom AND prenom = p_prenom AND login = p_login;
  
  -- Si l'utilisateur existe, modifier le mot de passe
  IF nb_utilisateurs = 1 THEN
    UPDATE utilisateur
    SET mdp = SHA2(p_nouveau_mdp, 256)
    WHERE nom = p_nom AND prenom = p_prenom AND login = p_login;
    SELECT 'Mot de passe modifié avec succès.' AS message;
  ELSE
    SELECT 'Utilisateur introuvable.' AS message;
  END IF;
END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Structure de la table `imc`
--

DROP TABLE IF EXISTS `imc`;
CREATE TABLE IF NOT EXISTS `imc` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `date` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `ip` varchar(15) DEFAULT NULL,
  `taille` float DEFAULT NULL,
  `poids` float DEFAULT NULL,
  `imc` float DEFAULT NULL,
  `idUtilisateur` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  FOREIGN KEY (`idUtilisateur`) REFERENCES `utilisateur` (`id`);
)ENGINE=InnoDB;


-- --------------------------------------------------------

--
-- Structure de la table `mdp_log`
--

DROP TABLE IF EXISTS `mdp_log`;
CREATE TABLE IF NOT EXISTS `mdp_log` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `mdp` varchar(255) DEFAULT NULL,
  `idUtilisateur` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  FOREIGN KEY (`idUtilisateur`) REFERENCES `utilisateur` (`id`);
)ENGINE=InnoDB;

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur`
--

DROP TABLE IF EXISTS `utilisateur`;
CREATE TABLE IF NOT EXISTS `utilisateur` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(255) DEFAULT NULL,
  `prenom` varchar(255) DEFAULT NULL,
  `age` int(11) DEFAULT NULL,
  `login` varchar(255) DEFAULT NULL,
  `mdp` varchar(255) DEFAULT NULL,
  `estAdmin` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`id`)
)ENGINE=InnoDB;


--
-- Déclencheurs `utilisateur`
--
DROP TRIGGER IF EXISTS `after_insert_utilisateur`;
DELIMITER $$
CREATE TRIGGER `after_insert_utilisateur` AFTER INSERT ON `utilisateur` FOR EACH ROW BEGIN
    INSERT INTO mdp_log (mdp, idUtilisateur)
    VALUES (NEW.mdp, NEW.id);
END
$$
DELIMITER ;
DROP TRIGGER IF EXISTS `after_update_utilisateur`;
DELIMITER $$
CREATE TRIGGER `after_update_utilisateur` AFTER UPDATE ON `utilisateur` FOR EACH ROW BEGIN
    INSERT INTO mdp_log (mdp, idUtilisateur)
    VALUES (NEW.mdp, NEW.id);
END
$$
DELIMITER ;
DROP TRIGGER IF EXISTS `before_update_utilisateur`;
DELIMITER $$
CREATE TRIGGER `before_update_utilisateur` BEFORE UPDATE ON `utilisateur` FOR EACH ROW BEGIN
    DECLARE mdp_existe INT;
    SET mdp_existe = (SELECT COUNT(*) FROM mdp_log WHERE idUtilisateur = NEW.id AND mdp = NEW.mdp);

    IF (mdp_existe > 0) THEN
        SIGNAL SQLSTATE '45000' SET MESSAGE_TEXT = 'Le mot de passe est déjà utilisé.';
    END IF;
END
$$
DELIMITER ;
DROP TRIGGER IF EXISTS `hash_password`;
DELIMITER $$
CREATE TRIGGER `hash_password` BEFORE INSERT ON `utilisateur` FOR EACH ROW BEGIN 
SET NEW.mdp = SHA2(NEW.mdp, 256);
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Structure de la table `visite`
--

DROP TABLE IF EXISTS `visite`;
CREATE TABLE IF NOT EXISTS `visite` (
  `annee` char(4) NOT NULL,
  `mois` char(2) NOT NULL,
  `nb_visites` int(11) DEFAULT NULL,
  PRIMARY KEY (`annee`,`mois`)
)ENGINE=InnoDB;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
