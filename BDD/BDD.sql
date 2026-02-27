-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : mer. 10 déc. 2025 à 10:46
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
-- Base de données : `eval_livre`
--

-- --------------------------------------------------------

--
-- Structure de la table `book`
--

CREATE TABLE `book` (
  `id` int(11) NOT NULL,
  `title` varchar(64) NOT NULL,
  `author` varchar(32) NOT NULL,
  `slug` varchar(100) NOT NULL,
  `description` text NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `book`
--

INSERT INTO `book` (`id`, `title`, `author`, `slug`, `description`, `date`) VALUES
(72, 'Book1', '1', 'https://google.com', 'ok', '2025-12-07'),
(73, '3', 'el MattB fake', 'https://google.com', 'ok', '2026-01-09');

-- --------------------------------------------------------

--
-- Structure de la table `booktype`
--

CREATE TABLE `booktype` (
  `book_id` int(11) NOT NULL,
  `type_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `booktype`
--

INSERT INTO `booktype` (`book_id`, `type_id`) VALUES
(72, 2),
(72, 3),
(73, 43),
(73, 44),
(73, 45);

-- --------------------------------------------------------

--
-- Structure de la table `type`
--

CREATE TABLE `type` (
  `id` int(11) NOT NULL,
  `categories` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `type`
--

INSERT INTO `type` (`id`, `categories`) VALUES
(1, 'contemporain'),
(2, 'historique'),
(3, 'policier'),
(4, 'sentimental'),
(5, 'science‑fiction'),
(6, 'fantasy'),
(7, 'horreur'),
(8, 'feel‑good'),
(9, 'jeunesse'),
(10, 'contes'),
(11, 'récits'),
(12, 'autobiographies'),
(13, 'biographies'),
(14, 'journaux intimes'),
(15, 'odes'),
(16, 'ballades'),
(17, 'épigrammes'),
(18, 'tragédie'),
(19, 'comédie'),
(20, 'drame'),
(21, 'farce'),
(22, 'Bandes dessinées'),
(23, 'comics'),
(24, 'mangas'),
(25, 'livres d’histoire'),
(26, 'sciences'),
(27, 'sciences humaines'),
(28, 'politique'),
(29, 'religion'),
(30, 'développement personnel'),
(31, 'guides pratiques'),
(32, 'livres scolaires'),
(33, 'livres scientifiques'),
(34, 'livres de voyage'),
(35, 'dictionnaires'),
(36, 'Livres de recettes'),
(37, 'livres de bricolage'),
(38, 'jardinage'),
(39, 'sport'),
(40, 'vie pratique'),
(41, 'livres d’art'),
(42, 'photo'),
(43, 'musique'),
(44, 'cinéma'),
(45, 'beaux‑livres'),
(46, 'livres de coloriage');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `book`
--
ALTER TABLE `book`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `booktype`
--
ALTER TABLE `booktype`
  ADD KEY `book_id` (`book_id`,`type_id`),
  ADD KEY `type_id` (`type_id`);

--
-- Index pour la table `type`
--
ALTER TABLE `type`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `book`
--
ALTER TABLE `book`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=74;

--
-- AUTO_INCREMENT pour la table `type`
--
ALTER TABLE `type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `booktype`
--
ALTER TABLE `booktype`
  ADD CONSTRAINT `booktype_ibfk_1` FOREIGN KEY (`book_id`) REFERENCES `book` (`id`),
  ADD CONSTRAINT `booktype_ibfk_2` FOREIGN KEY (`type_id`) REFERENCES `type` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
