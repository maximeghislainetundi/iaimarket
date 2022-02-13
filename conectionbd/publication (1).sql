-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:3306
-- Généré le : sam. 08 jan. 2022 à 07:39
-- Version du serveur : 5.7.33
-- Version de PHP : 7.4.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `market`
--

-- --------------------------------------------------------

--
-- Structure de la table `publication`
--

CREATE TABLE `publication` (
  `idpost` int(255) NOT NULL,
  `extension` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `fichier` text COLLATE utf8_unicode_ci,
  `logo_article` text COLLATE utf8_unicode_ci,
  `nature` text COLLATE utf8_unicode_ci,
  `nbfichier` varchar(11) COLLATE utf8_unicode_ci DEFAULT NULL,
  `nom_article` text COLLATE utf8_unicode_ci,
  `posttext` text COLLATE utf8_unicode_ci,
  `recherche` text COLLATE utf8_unicode_ci,
  `timestamp` text COLLATE utf8_unicode_ci,
  `username` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `nom` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `prix` int(11) DEFAULT NULL,
  `idusershare` int(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `publication`
--

INSERT INTO `publication` (`idpost`, `extension`, `fichier`, `logo_article`, `nature`, `nbfichier`, `nom_article`, `posttext`, `recherche`, `timestamp`, `username`, `nom`, `prix`, `idusershare`) VALUES
(52, 'jpg ', '1618572948hopital0.jpg ', NULL, NULL, '1', NULL, 'SIMPLE et beau a porter', 'Simple et beau a porter', '1618572948', 'vestimentaire', 'Men\'s Sweat Shirt', 8250, 4),
(53, 'jpeg ', '1618658765hopital0.jpeg ', NULL, NULL, '1', NULL, 'VÃªtement descend ', 'vÃªtement descend ', '1618658765', 'vestimentaire', 'Women\'s Designer Top', 330000, 4),
(54, 'jpg ', '1618659216hopital0.jpg ', NULL, NULL, '1', NULL, 'Juste Simple', 'juste Simple', '1618659216', 'vestimentaire', 'Women\'s Plain Top', 4400, 4),
(58, 'jpeg ', '1618660118hopital0.jpeg ', NULL, NULL, '1', NULL, 'De tres bonne qualite', 'de tres bonne qualite', '1618660118', 'vestimentaire', 'Design Feminin', 329450, 4),
(59, 'jpg ', '1618660364hopital0.jpg ', NULL, NULL, '1', NULL, 'Bon en hiver', 'bon en hiver', '1618660364', 'vestimentaire', 'Tshirt Masculin', 2750, 4),
(60, 'jpg ', '1618660741hopital0.jpg ', NULL, NULL, '1', NULL, '\r\nJuste Ã‰lÃ©gant ', '\r\njuste Ã‰lÃ©gant ', '1618660741', 'vestimentaire', 'Men\'s blazer', 34925, 4),
(61, 'png ', '1641627016hopital0.png ', NULL, NULL, '1', NULL, 'SDGGFSDFSDS QSDFQSDS SFDQDFSQSQ WFSFSDF', NULL, '1641627016', 'electronique', 'coco', 60, 4);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `publication`
--
ALTER TABLE `publication`
  ADD PRIMARY KEY (`idpost`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `publication`
--
ALTER TABLE `publication`
  MODIFY `idpost` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
