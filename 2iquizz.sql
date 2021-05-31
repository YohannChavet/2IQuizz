-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : lun. 31 mai 2021 à 10:54
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
) ENGINE=MyISAM DEFAULT CHARSET=utf16;

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
) ENGINE=MyISAM DEFAULT CHARSET=utf16;

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
  `Type_Quizz` varchar(15) DEFAULT NULL,
  PRIMARY KEY (`ID`),
  KEY `Créa_Quizz` (`Créa_Quizz`),
  KEY `Cat_Quizz` (`Cat_Quizz`)
) ENGINE=MyISAM DEFAULT CHARSET=utf16;

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
-- Structure de la table `utilisateurs`
--

DROP TABLE IF EXISTS `utilisateurs`;
CREATE TABLE IF NOT EXISTS `utilisateurs` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `Pseudo` varchar(20) DEFAULT NULL,
  `username` varchar(50) NOT NULL,
  `mdp` varchar(25) NOT NULL,
  `IsAdmin` int(11) DEFAULT NULL,
  `blacklist` int(11) NOT NULL,
  `connecte` int(11) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf16;

--
-- Déchargement des données de la table `utilisateurs`
--

INSERT INTO `utilisateurs` (`ID`, `Pseudo`, `username`, `mdp`, `IsAdmin`, `blacklist`, `connecte`) VALUES
(1, 'Admin', 'Admin', '2IAdmin', 1, 0, 0),
(2, 'Krigbat', 'Thomas', 'mdp', 0, 0, 0);

-- --------------------------------------------------------

--
-- Structure de la table `vrai_faux`
--

DROP TABLE IF EXISTS `vrai_faux`;
CREATE TABLE IF NOT EXISTS `vrai_faux` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `ID_Quizz` int(11) DEFAULT NULL,
  `N_Question` int(11) DEFAULT NULL,
  `Question` varchar(240) DEFAULT NULL,
  `VraiFaux` int(11) DEFAULT NULL,
  PRIMARY KEY (`ID`),
  KEY `ID_Quizz` (`ID_Quizz`)
) ENGINE=MyISAM DEFAULT CHARSET=utf16;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
