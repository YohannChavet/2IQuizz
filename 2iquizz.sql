-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : jeu. 03 juin 2021 à 18:38
-- Version du serveur :  5.7.31
-- Version de PHP : 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `2iquizz`
--

-- --------------------------------------------------------

--
-- Structure de la table `catégorie`
--

DROP TABLE IF EXISTS `catégorie`;
CREATE TABLE IF NOT EXISTS `catégorie` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `Catégorie` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf16;

--
-- Déchargement des données de la table `catégorie`
--

INSERT INTO `catégorie` (`ID`, `Catégorie`) VALUES
(1, 'Mathématiques'),
(2, 'Français'),
(3, 'Sports');

-- --------------------------------------------------------

--
-- Structure de la table `qcm`
--

DROP TABLE IF EXISTS `qcm`;
CREATE TABLE IF NOT EXISTS `qcm` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `ID_Quizz` int(11) DEFAULT NULL,
  `N_Question` int(11) DEFAULT NULL,
  `Question` varchar(200) DEFAULT NULL,
  `Reponse` varchar(200) DEFAULT NULL,
  `CHOIX1` varchar(200) DEFAULT NULL,
  `CHOIX2` varchar(200) DEFAULT NULL,
  `CHOIX3` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`ID`),
  KEY `ID_Quizz` (`ID_Quizz`)
) ENGINE=MyISAM AUTO_INCREMENT=24 DEFAULT CHARSET=utf16;

--
-- Déchargement des données de la table `qcm`
--

INSERT INTO `qcm` (`ID`, `ID_Quizz`, `N_Question`, `Question`, `Reponse`, `CHOIX1`, `CHOIX2`, `CHOIX3`) VALUES
(23, 26, 1, 'ds', 'dss', 'yimuim', ',f,', ' bv '),
(19, 25, 1, '2 + 2 ?', '4', '2', '1', '16'),
(20, 25, 2, '4*2 ?', '8', '12', '16', '3'),
(18, 24, 1, 'Qu\'est ce que je préfère ?', 'Pâtes ', 'Jambon', 'Eau', 'Fruit');

-- --------------------------------------------------------

--
-- Structure de la table `quizz`
--

DROP TABLE IF EXISTS `quizz`;
CREATE TABLE IF NOT EXISTS `quizz` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `Nom_Quizz` varchar(50) DEFAULT NULL,
  `Cat_Quizz` int(50) DEFAULT NULL,
  `Date_Quizz` date DEFAULT NULL,
  `Créa_Quizz` int(11) DEFAULT NULL,
  `Type` int(11) NOT NULL,
  PRIMARY KEY (`ID`),
  KEY `Créa_Quizz` (`Créa_Quizz`),
  KEY `Cat_Quizz` (`Cat_Quizz`),
  KEY `Type` (`Type`)
) ENGINE=MyISAM AUTO_INCREMENT=30 DEFAULT CHARSET=utf16;

--
-- Déchargement des données de la table `quizz`
--

INSERT INTO `quizz` (`ID`, `Nom_Quizz`, `Cat_Quizz`, `Date_Quizz`, `Créa_Quizz`, `Type`) VALUES
(27, 'je try des trucs', 1, '2021-06-03', 1, 1),
(26, 'rgzzgzez', 1, '2021-06-03', 2, 1),
(25, 'Encore un ', 1, '2021-06-02', 1, 1),
(24, 'Fleurs', 3, '2021-06-02', 28, 1),
(23, 'Livres', 2, '2021-06-02', 23, 1),
(22, 'Foot', 3, '2021-06-02', 23, 1),
(28, 'on try ça aussi', 1, '2021-06-03', 1, 2),
(29, 'Un de plus', 1, '2021-06-03', 2, 2);

-- --------------------------------------------------------

--
-- Structure de la table `quizz_participé`
--

DROP TABLE IF EXISTS `quizz_participé`;
CREATE TABLE IF NOT EXISTS `quizz_participé` (
  `ID_USER` int(11) NOT NULL,
  `ID_QUIZZ` int(11) NOT NULL,
  `Points` int(11) DEFAULT NULL,
  `Note` int(11) DEFAULT NULL,
  PRIMARY KEY (`ID_USER`,`ID_QUIZZ`),
  KEY `ID_QUIZZ` (`ID_QUIZZ`)
) ENGINE=MyISAM DEFAULT CHARSET=utf16;

-- --------------------------------------------------------

--
-- Structure de la table `type_quizz`
--

DROP TABLE IF EXISTS `type_quizz`;
CREATE TABLE IF NOT EXISTS `type_quizz` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `Type` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf16;

--
-- Déchargement des données de la table `type_quizz`
--

INSERT INTO `type_quizz` (`ID`, `Type`) VALUES
(1, 'QCM'),
(2, 'Vrai/Faux');

-- --------------------------------------------------------

--
-- Structure de la table `utilisateurs`
--

DROP TABLE IF EXISTS `utilisateurs`;
CREATE TABLE IF NOT EXISTS `utilisateurs` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `Pseudo` varchar(20) DEFAULT NULL,
  `username` varchar(50) NOT NULL,
  `mdp` varchar(25) NOT NULL,
  `IsAdmin` int(11) NOT NULL DEFAULT '0',
  `blacklist` int(11) NOT NULL DEFAULT '0',
  `connecte` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM AUTO_INCREMENT=31 DEFAULT CHARSET=utf16;

--
-- Déchargement des données de la table `utilisateurs`
--

INSERT INTO `utilisateurs` (`ID`, `Pseudo`, `username`, `mdp`, `IsAdmin`, `blacklist`, `connecte`) VALUES
(1, 'Admin', 'Admin', '2IAdmin', 1, 0, 0),
(2, 'Paul', 'Thomas', 'mdp', 0, 0, 1),
(28, 'Jeamie', 'Oui', 'mdp', 0, 0, 0),
(22, 'Anonyme', 'Anon', 'easy', 0, 0, 0),
(23, 'Patou', 'Patou', 'mdp', 0, 0, 0);

-- --------------------------------------------------------

--
-- Structure de la table `vrai_faux`
--

DROP TABLE IF EXISTS `vrai_faux`;
CREATE TABLE IF NOT EXISTS `vrai_faux` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `ID_Quizz` int(11) DEFAULT NULL,
  `N_Question` int(11) NOT NULL,
  `Question` varchar(240) DEFAULT NULL,
  `VraiFaux` int(11) DEFAULT NULL,
  PRIMARY KEY (`ID`),
  KEY `ID_Quizz` (`ID_Quizz`),
  KEY `N_Question_2` (`N_Question`),
  KEY `N_Question_3` (`N_Question`)
) ENGINE=MyISAM AUTO_INCREMENT=15 DEFAULT CHARSET=utf16;

--
-- Déchargement des données de la table `vrai_faux`
--

INSERT INTO `vrai_faux` (`ID`, `ID_Quizz`, `N_Question`, `Question`, `VraiFaux`) VALUES
(13, 28, 1, 'Laly elle a un QI ?', 0);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
