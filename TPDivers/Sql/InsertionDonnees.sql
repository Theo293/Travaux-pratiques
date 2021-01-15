-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : mer. 28 oct. 2020 à 11:48
-- Version du serveur :  10.4.14-MariaDB
-- Version de PHP : 7.4.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `tpcompta`
--

-- --------------------------------------------------------

--
-- Structure de la table `article`
--

CREATE TABLE `article` (
  `Id_Article` int(11) NOT NULL,
  `Ref` varchar(255) DEFAULT NULL,
  `Designation` varchar(255) DEFAULT NULL,
  `Prix` decimal(7,2) DEFAULT NULL,
  `Id_Fournisseur` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `article`
--

INSERT INTO `article` (`Id_Article`, `Ref`, `Designation`, `Prix`, `Id_Fournisseur`) VALUES
(1, 'A01', 'Perceuse P1', '74.99', 1),
(2, 'F01', 'Boulon laiton 4 x 40 mm (sachet de 10)', '2.25', 2),
(3, 'F02', 'Boulon laiton 5 x 40 mm (sachet de 10)', '4.45', 2),
(4, 'D01', 'Boulon laiton 4 x 40 mm (sachet de 10)', '4.40', 3),
(5, 'A02', 'Meuleuse 125mm', '37.85', 1),
(6, 'D03', 'Boulon acier zingué 4 x 40mm (sachet de 10)', '1.80', 3),
(7, 'A03', 'Perceuse à colonne', '185.25', 1),
(8, 'D04', 'Coffret mêches à bois', '12.25', 3),
(9, 'F03', 'Coffret mêches plates', '6.25', 2),
(10, 'F04', 'Fraises d’encastrement', '8.14', 2);

-- --------------------------------------------------------

--
-- Structure de la table `bon`
--

CREATE TABLE `bon` (
  `Id_Bon` int(11) NOT NULL,
  `Numero` int(11) DEFAULT NULL,
  `Date_CMDE` date DEFAULT NULL,
  `Delai` int(11) DEFAULT NULL,
  `Id_Fournisseur` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `bon`
--

INSERT INTO `bon` (`Id_Bon`, `Numero`, `Date_CMDE`, `Delai`, `Id_Fournisseur`) VALUES
(1, 300021, '2020-10-28', 3, 1);

-- --------------------------------------------------------

--
-- Structure de la table `compo`
--

CREATE TABLE `compo` (
  `Id_Compo` int(11) NOT NULL,
  `Id_Article` int(11) DEFAULT NULL,
  `Id_BDC` int(11) DEFAULT NULL,
  `QTE` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `compo`
--

INSERT INTO `compo` (`Id_Compo`, `Id_Article`, `Id_BDC`, `QTE`) VALUES
(1, 1, 1, 3),
(2, 5, 1, 4),
(3, 7, 1, 1);

-- --------------------------------------------------------

--
-- Structure de la table `fournisseur`
--

CREATE TABLE `fournisseur` (
  `Id` int(11) NOT NULL,
  `Nom` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `fournisseur`
--

INSERT INTO `fournisseur` (`Id`, `Nom`) VALUES
(1, 'Française d\'imports'),
(2, 'FDM SA'),
(3, 'Dubois & Fils');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `article`
--
ALTER TABLE `article`
  ADD PRIMARY KEY (`Id_Article`),
  ADD KEY `Id_Fournisseur` (`Id_Fournisseur`);

--
-- Index pour la table `bon`
--
ALTER TABLE `bon`
  ADD PRIMARY KEY (`Id_Bon`),
  ADD KEY `Id_Fournisseur` (`Id_Fournisseur`);

--
-- Index pour la table `compo`
--
ALTER TABLE `compo`
  ADD PRIMARY KEY (`Id_Compo`),
  ADD KEY `Id_Article` (`Id_Article`),
  ADD KEY `Id_BDC` (`Id_BDC`);

--
-- Index pour la table `fournisseur`
--
ALTER TABLE `fournisseur`
  ADD PRIMARY KEY (`Id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `article`
--
ALTER TABLE `article`
  MODIFY `Id_Article` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT pour la table `bon`
--
ALTER TABLE `bon`
  MODIFY `Id_Bon` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `compo`
--
ALTER TABLE `compo`
  MODIFY `Id_Compo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `fournisseur`
--
ALTER TABLE `fournisseur`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `article`
--
ALTER TABLE `article`
  ADD CONSTRAINT `article_ibfk_1` FOREIGN KEY (`Id_Fournisseur`) REFERENCES `fournisseur` (`Id`);

--
-- Contraintes pour la table `bon`
--
ALTER TABLE `bon`
  ADD CONSTRAINT `bon_ibfk_1` FOREIGN KEY (`Id_Fournisseur`) REFERENCES `fournisseur` (`Id`);

--
-- Contraintes pour la table `compo`
--
ALTER TABLE `compo`
  ADD CONSTRAINT `compo_ibfk_1` FOREIGN KEY (`Id_Article`) REFERENCES `article` (`Id_Article`),
  ADD CONSTRAINT `compo_ibfk_2` FOREIGN KEY (`Id_BDC`) REFERENCES `bon` (`Id_Bon`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
