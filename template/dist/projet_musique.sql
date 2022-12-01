-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : mer. 30 nov. 2022 à 12:04
-- Version du serveur : 10.4.25-MariaDB
-- Version de PHP : 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `projet_musique`
--

-- --------------------------------------------------------

--
-- Structure de la table `album`
--

CREATE TABLE `album` (
  `idAlbum` varchar(50) NOT NULL,
  `titre` varchar(50) DEFAULT NULL,
  `artiste` varchar(50) DEFAULT NULL,
  `annee` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `artiste`
--

CREATE TABLE `artiste` (
  `idArtiste` int(11) NOT NULL,
  `idAlbum` int(11) NOT NULL,
  `nom` varchar(50) DEFAULT NULL,
  `prenom` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `artiste`
--

INSERT INTO `artiste` (`idArtiste`, `idAlbum`, `nom`, `prenom`) VALUES
(1, 1, 'LLoris', 'hugo'),
(2, 2, 'Karim', 'Benzema');

-- --------------------------------------------------------

--
-- Structure de la table `chanson`
--

CREATE TABLE `chanson` (
  `idChanson` int(11) NOT NULL,
  `idArtiste` int(11) DEFAULT NULL,
  `titre` varchar(50) DEFAULT NULL,
  `style` varchar(50) DEFAULT NULL,
  `idAlbum` int(11) DEFAULT NULL,
  `duree` int(11) DEFAULT NULL,
  `playlist` int(11) DEFAULT NULL,
  `vote` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `chanson`
--

INSERT INTO `chanson` (`idChanson`, `idArtiste`, `titre`, `style`, `idAlbum`, `duree`, `playlist`, `vote`) VALUES
(1, 1, 'aoulou', 'classique', 1, 90, 1, 0),
(2, 2, 'Champion', 'rap', 2, 160, 2, 0),
(3, 3, 'voiture', 'jazz', 3, 160, 3, 0);

-- --------------------------------------------------------

--
-- Structure de la table `créer`
--

CREATE TABLE `créer` (
  `idAlbum` varchar(50) NOT NULL,
  `idArtiste` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `produit`
--

CREATE TABLE `produit` (
  `idChanson` int(11) NOT NULL,
  `idArtiste` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur`
--

CREATE TABLE `utilisateur` (
  `idUtilisateur` int(11) NOT NULL,
  `nom` varchar(50) DEFAULT NULL,
  `prenom` varchar(50) DEFAULT NULL,
  `adresseMail` varchar(50) DEFAULT NULL,
  `mdp` varchar(50) DEFAULT NULL,
  `role` varchar(50) DEFAULT NULL,
  `pseudo` varchar(50) DEFAULT NULL,
  `vote` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `utilisateur`
--

INSERT INTO `utilisateur` (`idUtilisateur`, `nom`, `prenom`, `adresseMail`, `mdp`, `role`, `pseudo`, `vote`) VALUES
(1, 'Hecto', 'Aphrodite', 'dui.lectus.rutrum@google.couk', 'HTH15XQU8OQ', 'Branch', 'admin', 0),
(2, 'Amir', 'Ruby', 'sociosqu@aol.edu', 'RXQ39ZMS4ZB', 'utlisateur', 'Donald', 1),
(3, 'Arthur', 'Franck', 'arthur@franck.com', 'Mbappe', 'utlisateur', 'Pogba', 1);

-- --------------------------------------------------------

--
-- Structure de la table `vote`
--

CREATE TABLE `vote` (
  `idUtilisateur` int(11) NOT NULL,
  `idChanson` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `album`
--
ALTER TABLE `album`
  ADD PRIMARY KEY (`idAlbum`);

--
-- Index pour la table `artiste`
--
ALTER TABLE `artiste`
  ADD PRIMARY KEY (`idArtiste`);

--
-- Index pour la table `chanson`
--
ALTER TABLE `chanson`
  ADD PRIMARY KEY (`idChanson`);

--
-- Index pour la table `créer`
--
ALTER TABLE `créer`
  ADD PRIMARY KEY (`idAlbum`,`idArtiste`),
  ADD KEY `idArtiste` (`idArtiste`);

--
-- Index pour la table `produit`
--
ALTER TABLE `produit`
  ADD PRIMARY KEY (`idChanson`,`idArtiste`),
  ADD KEY `idArtiste` (`idArtiste`);

--
-- Index pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  ADD PRIMARY KEY (`idUtilisateur`);

--
-- Index pour la table `vote`
--
ALTER TABLE `vote`
  ADD PRIMARY KEY (`idUtilisateur`,`idChanson`),
  ADD KEY `idChanson` (`idChanson`);

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `créer`
--
ALTER TABLE `créer`
  ADD CONSTRAINT `créer_ibfk_1` FOREIGN KEY (`idAlbum`) REFERENCES `album` (`idAlbum`),
  ADD CONSTRAINT `créer_ibfk_2` FOREIGN KEY (`idArtiste`) REFERENCES `artiste` (`idArtiste`);

--
-- Contraintes pour la table `produit`
--
ALTER TABLE `produit`
  ADD CONSTRAINT `produit_ibfk_1` FOREIGN KEY (`idChanson`) REFERENCES `chanson` (`idChanson`),
  ADD CONSTRAINT `produit_ibfk_2` FOREIGN KEY (`idArtiste`) REFERENCES `artiste` (`idArtiste`);

--
-- Contraintes pour la table `vote`
--
ALTER TABLE `vote`
  ADD CONSTRAINT `vote_ibfk_1` FOREIGN KEY (`idUtilisateur`) REFERENCES `utilisateur` (`idUtilisateur`),
  ADD CONSTRAINT `vote_ibfk_2` FOREIGN KEY (`idChanson`) REFERENCES `chanson` (`idChanson`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
