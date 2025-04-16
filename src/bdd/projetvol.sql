-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : mer. 16 avr. 2025 à 16:14
-- Version du serveur : 8.3.0
-- Version de PHP : 8.2.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `projetvol`
--

-- --------------------------------------------------------

--
-- Structure de la table `avions`
--

DROP TABLE IF EXISTS `avions`;
CREATE TABLE IF NOT EXISTS `avions` (
  `id_avions` int NOT NULL AUTO_INCREMENT,
  `nom_avions` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `place_totale` int NOT NULL,
  PRIMARY KEY (`id_avions`)
) ENGINE=InnoDB AUTO_INCREMENT=63 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `avions`
--

INSERT INTO `avions` (`id_avions`, `nom_avions`, `place_totale`) VALUES
(53, 'airbusA305', 500),
(60, 'boeing707', 500);

-- --------------------------------------------------------

--
-- Structure de la table `pilotes`
--

DROP TABLE IF EXISTS `pilotes`;
CREATE TABLE IF NOT EXISTS `pilotes` (
  `id_pilotes` int NOT NULL AUTO_INCREMENT,
  `nomPilotes` varchar(50) CHARACTER SET latin1 COLLATE latin1_bin NOT NULL,
  `prenomPilotes` varchar(50) CHARACTER SET latin1 COLLATE latin1_bin NOT NULL,
  PRIMARY KEY (`id_pilotes`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1 COLLATE=latin1_bin;

--
-- Déchargement des données de la table `pilotes`
--

INSERT INTO `pilotes` (`id_pilotes`, `nomPilotes`, `prenomPilotes`) VALUES
(1, 'Capiaux', 'Yannick');

-- --------------------------------------------------------

--
-- Structure de la table `reservation`
--

DROP TABLE IF EXISTS `reservation`;
CREATE TABLE IF NOT EXISTS `reservation` (
  `id_reservation` int NOT NULL AUTO_INCREMENT,
  `nb_place_reserver` varchar(50) NOT NULL,
  `ref_vol` int NOT NULL,
  `ref_utilisateur` int NOT NULL,
  PRIMARY KEY (`id_reservation`),
  KEY `fk_reservation_seance` (`ref_vol`),
  KEY `fr_reservation_utilisateur` (`ref_utilisateur`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur`
--

DROP TABLE IF EXISTS `utilisateur`;
CREATE TABLE IF NOT EXISTS `utilisateur` (
  `id_utilisateur` int NOT NULL AUTO_INCREMENT,
  `nom` varchar(50) NOT NULL,
  `prenom` varchar(50) NOT NULL,
  `date_de_naissance` date NOT NULL,
  `ville` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `email` varchar(60) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `mdp` varchar(100) NOT NULL,
  `role` varchar(11) DEFAULT 'user',
  PRIMARY KEY (`id_utilisateur`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `utilisateur`
--

INSERT INTO `utilisateur` (`id_utilisateur`, `nom`, `prenom`, `date_de_naissance`, `ville`, `email`, `mdp`, `role`) VALUES
(1, 'langui', 'Thomas', '2006-06-09', 'Trembaly-en-France', 't.langui@lprs.fr', 'thomas', 'admin'),
(8, 'passard', 'ethan', '2006-05-23', 'livry-gargan', 'epassard@lprs.fr', '$2y$10$GtxHgTHvKR1wXFQIy/yuNenMYBGmyFuaZk/tR5qyLxoXC1eVTjNzi', 'admin'),
(9, 'admin', 'admin', '2006-06-09', 'admin', 'admin@admin.fr', '$2y$10$sENo79s8bjyHd2BHc6NzYecJHYWtslPF.VAUG/M9P/E.dC.sG/C9C', 'admin');

-- --------------------------------------------------------

--
-- Structure de la table `vol`
--

DROP TABLE IF EXISTS `vol`;
CREATE TABLE IF NOT EXISTS `vol` (
  `id_vol` int NOT NULL AUTO_INCREMENT,
  `destination` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `date` date NOT NULL,
  `heure_depart` time(6) NOT NULL,
  `heure_arrive` time NOT NULL,
  `ville_depart` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `ville_arrive` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `nb_place_dispo` int NOT NULL,
  `prix` int NOT NULL,
  `ref_avions` int NOT NULL,
  `ref_pilotes` int NOT NULL,
  PRIMARY KEY (`id_vol`),
  KEY `fk_seance_films` (`ref_avions`),
  KEY `ref_pilotes` (`ref_pilotes`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `vol`
--

INSERT INTO `vol` (`id_vol`, `destination`, `date`, `heure_depart`, `heure_arrive`, `ville_depart`, `ville_arrive`, `nb_place_dispo`, `prix`, `ref_avions`, `ref_pilotes`) VALUES
(1, '', '2025-03-26', '13:45:00.000000', '00:00:00', '', '', 600, 690, 1, 0);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
