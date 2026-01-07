-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : mer. 07 jan. 2026 à 08:49
-- Version du serveur : 9.1.0
-- Version de PHP : 8.3.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `mediatheque`
--

-- --------------------------------------------------------

--
-- Structure de la table `film`
--

DROP TABLE IF EXISTS `film`;
CREATE TABLE IF NOT EXISTS `film` (
  `id` int NOT NULL AUTO_INCREMENT,
  `titre` varchar(255) NOT NULL,
  `realisateur` varchar(255) NOT NULL,
  `genre` varchar(255) NOT NULL,
  `duree` varchar(255) NOT NULL,
  `synopsis` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `film`
--

INSERT INTO `film` (`id`, `titre`, `realisateur`, `genre`, `duree`, `synopsis`) VALUES
(1, 'La cité de la peur', 'Alain Berbérian', 'Comédie', '100', 'En 1990, durant le festival de Cannes, les projectionnistes d\'un mauvais film d\'horreur nommé Red Is Dead sont assassinés...'),
(2, 'Avatar', 'James Cameron', 'Science-Fiction', '162', 'Sur le monde extraterrestre luxuriant de Pandora vivent les Na\'vi, des êtres qui semblent primitifs, mais qui sont très évolués. Jake Sully, un ancien Marine paralysé, redevient mobile grâce à tel Avatar et tombe amoureux d\'une femme Na\'vi...'),
(3, 'Django Unchained', 'Quentin Tarantino', 'Western', '165', 'Deux ans avant la Guerre civile, un ancien esclave du nom de Django s\'associe avec un chasseur de primes d\'origine allemande qui l\'a libéré : il accepte de traquer avec lui des criminels recherchés ...'),
(4, 'Joker', 'Todd Phillips', 'Drame', '122', 'Le film suit Arthur Fleck qui travaille dans une agence de clowns à Gotham City. Méprisé et incompris, il mène une morne vie en marge de la société et habite dans un immeuble miteux avec sa mère Penny. Un soir, agressé dans le métro par trois traders de Wayne Enterprises alcoolisés, il les tue. Son geste inspire à une partie de la population l\'idée de s\'en prendre elle aussi aux puissants.'),
(5, 'Shrek', ' Andrew Adamson et Vicky Jenson', 'Animation', '90', 'Le film suit un ogre laid et misanthrope, Shrek, qui vit tranquille et heureux dans la saleté au milieu d\'un marais qu\'il croit un havre de paix. Mais un jour, son espace est envahi de créatures de contes de fées expulsées par le tyrannique Lord Farquaad. Shrek, flanqué d\'un âne très bavard, part demander des comptes au seigneur. ');

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nom` varchar(255) NOT NULL,
  `prenom` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`id`, `nom`, `prenom`, `password`) VALUES
(1, 'AUBERT', 'Thomas', ''),
(2, 'VACHIN', 'Julie', '');

-- --------------------------------------------------------

--
-- Structure de la table `user_film`
--

DROP TABLE IF EXISTS `user_film`;
CREATE TABLE IF NOT EXISTS `user_film` (
  `user_id` int NOT NULL,
  `film_id` int NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `user_film`
--

INSERT INTO `user_film` (`user_id`, `film_id`) VALUES
(1, 1),
(1, 3),
(1, 4),
(2, 2),
(2, 4),
(2, 5);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
