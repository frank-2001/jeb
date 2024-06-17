-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : lun. 17 juin 2024 à 04:01
-- Version du serveur : 10.4.32-MariaDB
-- Version de PHP : 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `jeb_easy`
--

-- --------------------------------------------------------

--
-- Structure de la table `paiement_achat`
--

CREATE TABLE `paiement_achat` (
  `id` int(11) NOT NULL,
  `id_client` int(11) DEFAULT NULL,
  `telephone_paiement` varchar(50) NOT NULL,
  `reference` varchar(100) NOT NULL,
  `montant` double NOT NULL,
  `article` int(11) NOT NULL,
  `code` int(11) NOT NULL,
  `channel` varchar(50) NOT NULL,
  `categorie` enum('investissement','achat','formation') NOT NULL,
  `flex_reference` varchar(100) NOT NULL,
  `status` int(11) DEFAULT NULL,
  `message` varchar(250) NOT NULL,
  `creation` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `paiement_achat`
--
ALTER TABLE `paiement_achat`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `paiement_achat`
--
ALTER TABLE `paiement_achat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
