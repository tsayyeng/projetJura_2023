-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : mer. 29 mars 2023 à 15:37
-- Version du serveur : 5.7.36
-- Version de PHP : 7.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `projet_jura`
--

-- --------------------------------------------------------

--
-- Structure de la table `admin`
--

DROP TABLE IF EXISTS `admin`;
CREATE TABLE IF NOT EXISTS `admin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `mdp` varchar(255) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `prenom` varchar(255) NOT NULL,
  `mail` varchar(255) NOT NULL,
  `admin` tinyint(4) NOT NULL,
  `identifiant` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `admin`
--

INSERT INTO `admin` (`id`, `mdp`, `nom`, `prenom`, `mail`, `admin`, `identifiant`) VALUES
(1, 'admin', 'oui', 'oui', 'oui', 1, 'admin');

-- --------------------------------------------------------

--
-- Structure de la table `client`
--

DROP TABLE IF EXISTS `client`;
CREATE TABLE IF NOT EXISTS `client` (
  `idClient` int(11) NOT NULL AUTO_INCREMENT,
  `nomClient` varchar(255) NOT NULL,
  `prenomClient` varchar(255) NOT NULL,
  `identifiant` varchar(255) NOT NULL,
  `mdp` varchar(255) NOT NULL,
  `mail` varchar(255) NOT NULL,
  PRIMARY KEY (`idClient`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `client`
--

INSERT INTO `client` (`idClient`, `nomClient`, `prenomClient`, `identifiant`, `mdp`, `mail`) VALUES
(6, 'oui', 'oui', 'oui', '3a3468fa89b2ab7cbfe5400858a8ec0066e9e8defa9a64c993b5f24210244df8', 'oui'),
(7, 'mathieu', 'mathieu', 'mathieu', '1ad656e5760e5fe19e9464397685a22dede512bfad2521458b192ea1abaa1ef9', 'mathieu');

-- --------------------------------------------------------

--
-- Structure de la table `hebergement`
--

DROP TABLE IF EXISTS `hebergement`;
CREATE TABLE IF NOT EXISTS `hebergement` (
  `idHebergement` int(11) NOT NULL AUTO_INCREMENT,
  `id_typeHebergement` int(11) DEFAULT NULL,
  PRIMARY KEY (`idHebergement`),
  KEY `fk_id_typeHebergement` (`id_typeHebergement`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `reservation`
--

DROP TABLE IF EXISTS `reservation`;
CREATE TABLE IF NOT EXISTS `reservation` (
  `idReservation` int(11) NOT NULL AUTO_INCREMENT,
  `dateArrivee` date DEFAULT NULL,
  `dateDepart` date DEFAULT NULL,
  `nbPersonne` int(11) DEFAULT NULL,
  `etatReservation` tinyint(1) DEFAULT NULL,
  `dateReservation` date DEFAULT NULL,
  `pension` tinyint(1) DEFAULT NULL,
  `idHebergement` int(11) DEFAULT NULL,
  `idClient` int(11) DEFAULT NULL,
  PRIMARY KEY (`idReservation`),
  KEY `fk_id_hebergement` (`idHebergement`),
  KEY `fk_idClient` (`idClient`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `typehebergement`
--

DROP TABLE IF EXISTS `typehebergement`;
CREATE TABLE IF NOT EXISTS `typehebergement` (
  `idType` int(11) NOT NULL AUTO_INCREMENT,
  `libelle` varchar(255) DEFAULT NULL,
  `descriptionHebergement` varchar(255) DEFAULT NULL,
  `batiment` char(1) DEFAULT NULL,
  PRIMARY KEY (`idType`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
