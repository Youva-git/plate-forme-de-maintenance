-- phpMyAdmin SQL Dump
-- version 4.9.5deb2
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:3306
-- Généré le : mer. 29 déc. 2021 à 20:19
-- Version du serveur :  8.0.27-0ubuntu0.20.04.1
-- Version de PHP : 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `testprojetlw1`
--

-- --------------------------------------------------------

--
-- Structure de la table `listeanomalie`
--

CREATE TABLE `listeanomalie` (
  `id` int NOT NULL,
  `anomalie` varchar(1024) NOT NULL,
  `ressource` int NOT NULL,
  `etat` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `listeanomalie`
--

INSERT INTO `listeanomalie` (`id`, `anomalie`, `ressource`, `etat`) VALUES
(3, 'Le poignet de la porte plus', 2, 0),
(140, 'jglmkmkm', 67, 1),
(141, 'dghfh', 67, 0),
(142, 'dghfh', 67, 1),
(158, 'jhlkjlj', 88, 1),
(159, 'jgklllkjg', 88, 1),
(166, 'test', 92, 0),
(167, 'test', 92, 0),
(168, 'test', 92, 1),
(174, 'dghfhjtyjtu', 94, 0),
(177, 'hjdghhjdhf', 95, 0);

-- --------------------------------------------------------

--
-- Structure de la table `ressource`
--

CREATE TABLE `ressource` (
  `id` int NOT NULL,
  `description` varchar(255) DEFAULT NULL,
  `localisation` varchar(255) DEFAULT NULL,
  `responsable` varchar(255) DEFAULT NULL,
  `idresponsable` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `ressource`
--

INSERT INTO `ressource` (`id`, `description`, `localisation`, `responsable`, `idresponsable`) VALUES
(93, 'test', 'test', 'test', 18),
(94, 'test', 'test', 'test', 18),
(95, 'sdfgdgh', 'fghfhfgh', 'test1', 2);

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id` int NOT NULL,
  `username` varchar(255) NOT NULL,
  `nom` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `prenom` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `admin` int NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `username`, `nom`, `prenom`, `password`, `email`, `admin`) VALUES
(1, 'admin', 'admin', 'admin', '$2y$10$UzOAbmXLfyLArt1k7EL.d.e3zezq1l0gfMWvxMiQRBN5ICQsvn5gK', 'admin@gmail.com', 1),
(2, 'test1', 'test1', 'test1', '$2y$10$UzOAbmXLfyLArt1k7EL.d.e3zezq1l0gfMWvxMiQRBN5ICQsvn5gK', 'test1@gmail.com', 0);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `listeanomalie`
--
ALTER TABLE `listeanomalie`
  ADD PRIMARY KEY (`id`),
  ADD KEY `listeanomalie_ressource_etr` (`ressource`);

--
-- Index pour la table `ressource`
--
ALTER TABLE `ressource`
  ADD PRIMARY KEY (`id`),
  ADD KEY `responsable_ressource_etr` (`responsable`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `listeanomalie`
--
ALTER TABLE `listeanomalie`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=179;

--
-- AUTO_INCREMENT pour la table `ressource`
--
ALTER TABLE `ressource`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=96;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
