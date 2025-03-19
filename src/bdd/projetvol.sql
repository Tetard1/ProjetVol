-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost
-- Généré le : mer. 19 mars 2025 à 10:04
-- Version du serveur : 8.3.0
-- Version de PHP : 8.3.7

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

CREATE TABLE `avions` (
  `id_avions` int NOT NULL,
  `nom` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `nb_place` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `avions`
--

INSERT INTO `avions` (`id_avions`, `nom`, `nb_place`) VALUES
(53, 'benladen', 500);

-- --------------------------------------------------------

--
-- Structure de la table `pilotes`
--

CREATE TABLE `pilotes` (
  `id_pilotes` int NOT NULL,
  `nom` varchar(50) COLLATE latin1_bin NOT NULL,
  `prenom` varchar(50) COLLATE latin1_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_bin;

-- --------------------------------------------------------

--
-- Structure de la table `reservation`
--

CREATE TABLE `reservation` (
  `id_reservation` int NOT NULL,
  `nb_place_reserver` varchar(50) NOT NULL,
  `ref_vol` int NOT NULL,
  `ref_utilisateur` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur`
--

CREATE TABLE `utilisateur` (
  `id_utilisateur` int NOT NULL,
  `nom` varchar(50) NOT NULL,
  `prenom` varchar(50) NOT NULL,
  `date_naissance` date NOT NULL,
  `ville` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `email` varchar(60) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `mdp` varchar(100) NOT NULL,
  `role` varchar(11) DEFAULT 'user'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `utilisateur`
--

INSERT INTO `utilisateur` (`id_utilisateur`, `nom`, `prenom`, `date_naissance`, `ville`, `email`, `mdp`, `role`) VALUES
(1, 'langui', 'Thomas', '2006-06-09', 'Trembaly-en-France', 't.langui@lprs.fr', 'thomas', 'admin');

-- --------------------------------------------------------

--
-- Structure de la table `vol`
--

CREATE TABLE `vol` (
  `id_vol` int NOT NULL,
  `destination` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `date` date NOT NULL,
  `heure_depart` time(6) NOT NULL,
  `heure_arrive` time NOT NULL,
  `ville_depart` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `ville_arrive` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `nb_place_dispo` int NOT NULL,
  `prix` int NOT NULL,
  `ref_avions` int NOT NULL,
  `ref_pilotes` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `vol`
--

INSERT INTO `vol` (`id_vol`, `destination`, `date`, `heure_depart`, `heure_arrive`, `ville_depart`, `ville_arrive`, `nb_place_dispo`, `prix`, `ref_avions`, `ref_pilotes`) VALUES
(1, '', '2025-03-26', '13:45:00.000000', '00:00:00', '', '', 600, 690, 1, 0);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `avions`
--
ALTER TABLE `avions`
  ADD PRIMARY KEY (`id_avions`);

--
-- Index pour la table `pilotes`
--
ALTER TABLE `pilotes`
  ADD PRIMARY KEY (`id_pilotes`);

--
-- Index pour la table `reservation`
--
ALTER TABLE `reservation`
  ADD PRIMARY KEY (`id_reservation`),
  ADD KEY `fk_reservation_seance` (`ref_vol`),
  ADD KEY `fr_reservation_utilisateur` (`ref_utilisateur`);

--
-- Index pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  ADD PRIMARY KEY (`id_utilisateur`);

--
-- Index pour la table `vol`
--
ALTER TABLE `vol`
  ADD PRIMARY KEY (`id_vol`),
  ADD KEY `fk_seance_films` (`ref_avions`),
  ADD KEY `ref_pilotes` (`ref_pilotes`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `avions`
--
ALTER TABLE `avions`
  MODIFY `id_avions` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;

--
-- AUTO_INCREMENT pour la table `pilotes`
--
ALTER TABLE `pilotes`
  MODIFY `id_pilotes` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `reservation`
--
ALTER TABLE `reservation`
  MODIFY `id_reservation` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  MODIFY `id_utilisateur` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT pour la table `vol`
--
ALTER TABLE `vol`
  MODIFY `id_vol` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
