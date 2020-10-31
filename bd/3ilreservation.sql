-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : sam. 31 oct. 2020 à 19:14
-- Version du serveur :  8.0.21
-- Version de PHP : 7.4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `3ilreservation`
--

-- --------------------------------------------------------

--
-- Structure de la table `creneau`
--

DROP TABLE IF EXISTS `creneau`;
CREATE TABLE IF NOT EXISTS `creneau` (
  `id` int NOT NULL,
  `heure_d` varchar(10) NOT NULL,
  `heure_f` varchar(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

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
  `id` int NOT NULL,
  `idsalle` int NOT NULL,
  `date` date NOT NULL,
  `creneau1` int NOT NULL,
  `creneau2` int NOT NULL,
  `creneau3` int NOT NULL,
  `creneau4` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `idsalle` (`idsalle`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `horaire`
--

INSERT INTO `horaire` (`id`, `idsalle`, `date`, `creneau1`, `creneau2`, `creneau3`, `creneau4`) VALUES
(1, 1, '2020-10-02', 1, 0, 0, 1),
(2, 2, '2020-10-02', 1, 1, 1, 1),
(3, 3, '2020-10-02', 1, 1, 0, 1),
(4, 4, '2020-10-03', 1, 0, 1, 1),
(5, 5, '2020-10-03', 0, 1, 0, 0),
(6, 6, '2020-10-03', 1, 0, 0, 1),
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
  `id` int NOT NULL,
  `idutilisateur` int NOT NULL,
  `idsalle` int NOT NULL,
  `date` date NOT NULL,
  `creneau` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `idutilisateur` (`idutilisateur`),
  KEY `idsalle` (`idsalle`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `reservation`
--

INSERT INTO `reservation` (`id`, `idutilisateur`, `idsalle`, `date`, `creneau`) VALUES
(1, 1, 1, '2020-10-02', '08h30-10h00'),
(2, 2, 2, '2020-10-02', '15h15-16h45'),
(3, 3, 3, '2020-10-03', '08h30-10h00');

-- --------------------------------------------------------

--
-- Structure de la table `salle`
--

DROP TABLE IF EXISTS `salle`;
CREATE TABLE IF NOT EXISTS `salle` (
  `id` int NOT NULL,
  `numero` int NOT NULL,
  `nbplace` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `salle`
--

INSERT INTO `salle` (`id`, `numero`, `nbplace`) VALUES
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
  `id` int NOT NULL,
  `login` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` varchar(8) NOT NULL,
  `code_secret` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `utilisateur`
--

INSERT INTO `utilisateur` (`id`, `login`, `password`, `role`, `code_secret`) VALUES
(1, 'test@3il.fr', '$2y$10$KamOCWd7MJ45hd6Amkw4he2kF2JfIz0VtRqCR7clXBIMlNBnQRP.O', 'etudiant', 'ZKA-XZB-YCR-DGF-WMK-FVX'),
(2, 'erat.eget.tincidunt@etrutrum.net', '$2y$10$wiQ48ZuZyuTP/Vlzk8XYZ.ic4eevjAu0awkYmMxMbrPL6CE4kbAKq', 'etudiant', 'ZKA-DGF-FVX-AAB-BAD-ACD'),
(3, 'non.bibendum@commodoipsumSuspendisse.net', '$2y$10$Cc.B4ONpz54yg.w61uUUa.dBjZirHuo/1dopuIXRapI24c9yp0ATC', 'etudiant', 'YCR-XZB-ZKA-ACD-BAD-AAB'),
(4, 'volutpat.Nulla@parturientmontes.net', '$2y$10$mfT2Oz9hDM4hfyx425AFZecaj/GxchX.0o0LMZ445iZIBivAV5kCq', 'etudiant', '\'WMK-DGF-YCR-XZB-ZKA-ACD'),
(5, 'ornare@egestasligulaNullam.ca', '$2y$10$AlePS7FmwkyCZHkPrOctfu9eufcP/wbC/02dadb9nLmLP957qdZ4O', 'etudiant', 'OYC-FVX-WMK-DGF-YCR-XZB'),
(6, 'ut.ipsum@sapien.net', '$2y$10$1558969j/oxOBZuL1PhiS.MxfIYguRzINeGwBTwcxfKINJeDahdz6', 'etudiant', 'FVX-WMK-DGF-YCR-XZB-ZKA'),
(7, 'sollicitudin.adipiscing@eleifendnec.co.uk', '$2y$10$kYwx0N7reU4nAAyA0LMMO.gVNeLB/7OD8ruDtxymZh2QqbgpZB5ji', 'etudiant', 'DGF-YCR-XZB-ZKA-ACD-BAD'),
(8, 'varius.orci@risusMorbi.net', '$2y$10$rHSqEcWndUl9G5cs60y3cOCW00z3dkEGVDqlnAo5V0u.6RFPpB1/K', 'etudiant', 'DGF-WMK-YCR-XZB-ZKA-ACD'),
(9, 'tellus.eu@semsemper.net', '$2y$10$RHry.SV27nvmKSgEYWd0tenh1K3Y74XWt1oDYovlUFCEZpYA8EBh6', 'etudiant', 'BAD-ACD-ZKA-ZKA-YCR-YCR'),
(10, 'admin@3il.fr', '$2y$10$KqPJ9UBd2P4050RiHBuIB.2VaASzgfUpzdicllK.xYUy5Apke5fJG', 'admin', 'BAD-ACD-ZKA-XZB-YCR-DGF');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
