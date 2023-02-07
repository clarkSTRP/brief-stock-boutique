-- phpMyAdmin SQL Dump
-- version 5.1.1deb5ubuntu1
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:3306
-- Généré le : mar. 07 fév. 2023 à 11:59
-- Version du serveur : 8.0.32-0ubuntu0.22.04.2
-- Version de PHP : 8.1.2-1ubuntu2.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `VapFactory`
--

-- --------------------------------------------------------

--
-- Structure de la table `vapoteuses_eliquides`
--

CREATE TABLE `vapoteuses_eliquides` (
  `id` int NOT NULL,
  `reference` bigint NOT NULL,
  `nom_article` varchar(255) NOT NULL,
  `description_article` text NOT NULL,
  `prix_achat` float(5,2) NOT NULL,
  `prix_vente` float(5,2) NOT NULL,
  `stock` bigint NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `vapoteuses_eliquides`
--

INSERT INTO `vapoteuses_eliquides` (`id`, `reference`, `nom_article`, `description_article`, `prix_achat`, `prix_vente`, `stock`) VALUES
(1, 1005, 'Vape-O-Matic', 'Un dispositif de vapotage performant et facile à utiliser.', 65.00, 130.00, 20),
(2, 1006, 'Vape Express', 'Un dispositif de vapotage compact et élégant pour une utilisation en déplacement.', 70.00, 140.00, 15),
(3, 1007, 'Vape-a-Lot', 'Un dispositif de vapotage polyvalent et résistant adapté à tous les niveaux d\'expérience.', 75.00, 150.00, 25),
(4, 2001, 'E-liquide saveur menthe', 'Un e-liquide saveur menthe fraîche pour une expérience de vapotage rafraîchissante.', 5.00, 10.00, 50),
(5, 2002, 'E-liquide saveur fruits rouges', 'Un e-liquide saveur fruits rouges pour une expérience de vapotage fruitée.', 5.00, 10.00, 60),
(6, 2003, 'E-liquide saveur chocolat', 'Un e-liquide saveur chocolat pour une expérience de vapotage sucrée.', 5.00, 10.00, 40);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `vapoteuses_eliquides`
--
ALTER TABLE `vapoteuses_eliquides`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `référence` (`reference`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `vapoteuses_eliquides`
--
ALTER TABLE `vapoteuses_eliquides`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
