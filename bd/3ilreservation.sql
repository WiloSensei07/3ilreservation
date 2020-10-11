-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  Dim 11 oct. 2020 à 14:36
-- Version du serveur :  5.7.31-log
-- Version de PHP :  7.4.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `3ilreservation`
--

-- --------------------------------------------------------

--
-- Structure de la table `creneau`
--

DROP TABLE IF EXISTS `creneau`;
CREATE TABLE IF NOT EXISTS `creneau` (
  `id` int(11) NOT NULL,
  `heure_d` varchar(10) NOT NULL,
  `heure_f` varchar(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `creneau`
--

INSERT INTO `creneau` (`id`, `heure_d`, `heure_f`) VALUES
(1, '08h00', '10h00'),
(2, '10h30', '12h00'),
(3, '13h30', '15h00'),
(4, '15h15', '16h45');

-- --------------------------------------------------------

--
-- Structure de la table `horaire`
--

DROP TABLE IF EXISTS `horaire`;
CREATE TABLE IF NOT EXISTS `horaire` (
  `id` int(11) NOT NULL,
  `idSalle` int(11) NOT NULL,
  `date` date NOT NULL,
  `creneau1` int(11) NOT NULL,
  `creneau2` int(11) NOT NULL,
  `creneau3` int(11) NOT NULL,
  `creneau4` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `idSalle` (`idSalle`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `horaire`
--

INSERT INTO `horaire` (`id`, `idSalle`, `date`, `creneau1`, `creneau2`, `creneau3`, `creneau4`) VALUES
(1, 1, '2020-10-02', 1, 0, 0, 1),
(2, 2, '2020-10-03', 1, 1, 1, 1),
(3, 3, '2020-10-04', 1, 1, 0, 1),
(4, 4, '2020-10-04', 1, 0, 1, 1),
(5, 5, '2020-10-05', 0, 1, 0, 0),
(6, 6, '2020-10-05', 1, 0, 0, 1),
(7, 7, '2020-10-05', 0, 0, 0, 1),
(8, 8, '2020-10-05', 1, 1, 1, 1),
(9, 9, '2020-10-05', 1, 1, 1, 0),
(10, 10, '2020-10-05', 0, 1, 1, 1);

-- --------------------------------------------------------

--
-- Structure de la table `reservation`
--

DROP TABLE IF EXISTS `reservation`;
CREATE TABLE IF NOT EXISTS `reservation` (
  `id` int(11) NOT NULL,
  `idUtilisateur` int(11) NOT NULL,
  `idHoraire` int(11) NOT NULL,
  `idCreneau` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `idUtilisateur` (`idUtilisateur`),
  KEY `idHoraire` (`idHoraire`),
  KEY `idCreneau` (`idCreneau`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `reservation`
--

INSERT INTO `reservation` (`id`, `idUtilisateur`, `idHoraire`, `idCreneau`) VALUES
(1, 1, 1, 1),
(2, 2, 2, 3),
(3, 3, 3, 4),
(4, 4, 4, 3),
(5, 5, 2, 2);

-- --------------------------------------------------------

--
-- Structure de la table `salles`
--

DROP TABLE IF EXISTS `salles`;
CREATE TABLE IF NOT EXISTS `salles` (
  `id` int(11) NOT NULL,
  `numero` int(11) NOT NULL,
  `nb_place` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `salles`
--

INSERT INTO `salles` (`id`, `numero`, `nb_place`) VALUES
(1, 100, 9),
(2, 101, 0),
(3, 102, 16),
(4, 103, 15),
(5, 104, 3),
(6, 105, 1),
(7, 106, 11),
(8, 107, 0),
(9, 108, 3),
(10, 109, 0);

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur`
--

DROP TABLE IF EXISTS `utilisateur`;
CREATE TABLE IF NOT EXISTS `utilisateur` (
  `id` int(11) NOT NULL,
  `login` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` varchar(8) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `utilisateur`
--

INSERT INTO `utilisateur` (`id`, `login`, `password`, `role`) VALUES
(1, 'test@3il.fr', '$2y$10$.vRtbtz2cPSVoo7iixYr.OHJHuygY8Db6aLtKZbM2411s0UyzyvU6', 'etudiant'),
(2, 'erat.eget.tincidunt@etrutrum.net', '$2y$10$mBZxOyf2kiTCeMR9y2qBgOCzh43AgjZcxIUfebQGZUhpOMt7RHz1e', 'etudiant'),
(3, 'non.bibendum@commodoipsumSuspendisse.net', '$2y$10$wg19kTnZ6SUJ4OVNaIX2Ce0O1COoX8rcK8oD7wyMuQinBd33mRjfS', 'etudiant'),
(4, 'volutpat.Nulla@parturientmontes.net', '$2y$10$MaQfQw2ziLZfj1JgXIaDEOftzCN3nUcSB/GHBog4OplAf25L3gasa', 'etudiant'),
(5, 'ornare@egestasligulaNullam.ca', '$2y$10$iImzYtUYgxdwe6ul1iGcxuGO25ORookO.MWMivl.hK2xoXxIyAH6m', 'etudiant'),
(6, 'ut.ipsum@sapien.net', '$2y$10$SmRsep6lqe1NpZdbkwTDM.Fw94BbGaAGnc9ICUKfh9/HNIbLW4psS', 'etudiant'),
(7, 'sollicitudin.adipiscing@eleifendnec.co.uk', '$2y$10$rtjFmEzcKqY7W6zX8w3/juCZrGYz2ugLagzcugBH4OcaBNVZPzbO6', 'etudiant'),
(8, 'varius.orci@risusMorbi.net', '$2y$10$Zkc7In/13jD/Ox2H0xbLCe/P3SU1DlT/8rUyiYHSrgDAHTGJt2U2.', 'etudiant'),
(9, 'tellus.eu@semsemper.net', '$2y$10$bCdOgCz1FWZCRpLT1WCRAe1qgqEvw0TmeIY1eLQOhGw09B92aJz/W', 'etudiant'),
(10, 'admin@3il.fr', '$2y$10$h1uzPfOWthPBj4ssxkYfdu864A4E2fOOWVz8nvizMa7CPUxMShdRi', 'admin');

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `horaire`
--
ALTER TABLE `horaire`
  ADD CONSTRAINT `horaire_ibfk_1` FOREIGN KEY (`idSalle`) REFERENCES `salles` (`id`);

--
-- Contraintes pour la table `reservation`
--
ALTER TABLE `reservation`
  ADD CONSTRAINT `reservation_ibfk_1` FOREIGN KEY (`idUtilisateur`) REFERENCES `utilisateur` (`id`),
  ADD CONSTRAINT `reservation_ibfk_2` FOREIGN KEY (`idHoraire`) REFERENCES `horaire` (`id`),
  ADD CONSTRAINT `reservation_ibfk_3` FOREIGN KEY (`idCreneau`) REFERENCES `creneau` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
