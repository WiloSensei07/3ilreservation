-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  jeu. 08 oct. 2020 à 07:26
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
  `idCreneau` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `idSalle` (`idSalle`),
  KEY `idCreneau` (`idCreneau`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `horaire`
--

INSERT INTO `horaire` (`id`, `idSalle`, `idCreneau`) VALUES
(1, 1, 1),
(2, 1, 2),
(3, 1, 3),
(4, 1, 4),
(5, 1, 2),
(6, 2, 1),
(7, 2, 1),
(8, 2, 3),
(9, 3, 3),
(10, 3, 4);

-- --------------------------------------------------------

--
-- Structure de la table `reservation`
--

DROP TABLE IF EXISTS `reservation`;
CREATE TABLE IF NOT EXISTS `reservation` (
  `id` int(11) NOT NULL,
  `idUtilisateur` int(11) NOT NULL,
  `idHoraire` int(11) NOT NULL,
  `date` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `idUtilisateur` (`idUtilisateur`),
  KEY `idHoraire` (`idHoraire`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `reservation`
--

INSERT INTO `reservation` (`id`, `idUtilisateur`, `idHoraire`, `date`) VALUES
(1, 1, 1, '2020-10-02 00:00:00'),
(2, 2, 2, '2020-10-03 00:00:00'),
(3, 3, 3, '2020-10-04 00:00:00'),
(4, 4, 4, '2020-10-04 00:00:00'),
(5, 5, 2, '2020-10-05 00:00:00');

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
(2, 101, 15),
(3, 102, 16),
(4, 103, 15),
(5, 104, 3),
(6, 105, 10),
(7, 106, 11),
(8, 107, 3),
(9, 108, 3),
(10, 109, 17);

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
(1, 'test@3il.fr', '$2y$10$O0AUIrh77yrWaGVV4C04Ze6U6obz3FGihLI2yD4T8iAQQlw6J/K/q', 'etudiant'),
(2, 'erat.eget.tincidunt@etrutrum.net', '$2y$10$JhvqFT3MiQamX4hug3krz.i6F2a1dTE7GxRpkad46dgnhE88zzSsa', 'etudiant'),
(3, 'non.bibendum@commodoipsumSuspendisse.net', '$2y$10$n8JGTUsgPrf0k9pIRaUro.E5cwVZ/TgvA5J53wvBtpMPm4mHgyVcy', 'etudiant'),
(4, 'volutpat.Nulla@parturientmontes.net', '$2y$10$areicem1vQTPVoDsoh7T1eZAi.Xniag5NSNwfMAy/up0j0wFO5ntS', 'etudiant'),
(5, 'ornare@egestasligulaNullam.ca', '$2y$10$rPXJ6mknYe54sg9YhrJWbuzD32sEXaChIXd2TZRXJopyxUV5DBgpa', 'etudiant'),
(6, 'ut.ipsum@sapien.net', '$2y$10$f0zZK5ZZ5tVIWvFoQLnr8uK.NYgjxfaW9cv49kP/4pIcD15JZmOzK', 'etudiant'),
(7, 'sollicitudin.adipiscing@eleifendnec.co.uk', '$2y$10$ORHqYqjmXP/snkSvmwn1lebSwRCApso/MI77FPmCy70ClYXn8B7Ma', 'etudiant'),
(8, 'varius.orci@risusMorbi.net', '$2y$10$xEzCke9A2rcXH1COAcG9regVZnawXhyD3NHohIZIToxnw5y0YPuJu', 'etudiant'),
(9, 'admin@3il.fr', '$2y$10$hgl6easRn/TGx6OIJzd9gOyEhfdiGHJUNTWDUb1dnTbgd4qwF1R/6', 'admin'),
(10, 'qdqsd.d@ini.en', '$2y$10$SbITDJM7H.4Cnpli734oBOaGiz8Y28XL0vj2C/tzklhsnTQLOUWJ2', 'etudiant'),
(11, 'test', 'test', 'etudiant');

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `horaire`
--
ALTER TABLE `horaire`
  ADD CONSTRAINT `horaire_ibfk_1` FOREIGN KEY (`idSalle`) REFERENCES `salles` (`id`),
  ADD CONSTRAINT `horaire_ibfk_2` FOREIGN KEY (`idCreneau`) REFERENCES `creneau` (`id`);

--
-- Contraintes pour la table `reservation`
--
ALTER TABLE `reservation`
  ADD CONSTRAINT `reservation_ibfk_1` FOREIGN KEY (`idUtilisateur`) REFERENCES `utilisateur` (`id`),
  ADD CONSTRAINT `reservation_ibfk_2` FOREIGN KEY (`idHoraire`) REFERENCES `horaire` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
