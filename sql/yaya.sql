-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : jeu. 04 fév. 2021 à 11:05
-- Version du serveur :  10.4.17-MariaDB
-- Version de PHP : 8.0.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `yaya`
--

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `confirmation_token` varchar(60) DEFAULT NULL,
  `confirm_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`, `confirmation_token`, `confirm_at`) VALUES
(12, 'yaya', 'yayayarbanga@gmail.com', '$2y$10$K1uP4TeO3jcvNM7JL.jlleJUAWprYNmkVOYsaNraQMB1aUxsWUICO', '0123456789zerttyuiopqsdffghjklmwxcvbnAZERTYUIOPQSDFGHJKLMWXV', NULL),
(13, 'user', 'user@gmail.com', '$2y$10$K1uP4TeO3jcvNM7JL.jlleJUAWprYNmkVOYsaNraQMB1aUxsWUICO', '0123456789zerttyuiopqsdffghjklmwxcvbnAZERTYUIOPQSDFGHJKLMWXV', NULL),
(14, 'leila', 'leila@gmail.com', '$2y$10$K1uP4TeO3jcvNM7JL.jlleJUAWprYNmkVOYsaNraQMB1aUxsWUICO', '0123456789zerttyuiopqsdffghjklmwxcvbnAZERTYUIOPQSDFGHJKLMWXV', NULL),
(15, 'max', 'max@gmail.com', '$2y$10$K1uP4TeO3jcvNM7JL.jlleJUAWprYNmkVOYsaNraQMB1aUxsWUICO', '0123456789zerttyuiopqsdffghjklmwxcvbnAZERTYUIOPQSDFGHJKLMWXV', NULL);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
