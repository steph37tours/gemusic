-- phpMyAdmin SQL Dump
-- version 4.5.2
-- http://www.phpmyadmin.net
--
-- Client :  localhost
-- Généré le :  Lun 12 Septembre 2016 à 19:05
-- Version du serveur :  10.1.13-MariaDB
-- Version de PHP :  5.6.20

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `gemusic`
--

-- --------------------------------------------------------

--
-- Structure de la table `COURSANNEE`
--

CREATE TABLE `COURSANNEE` (
  `id_cours_annee` smallint(5) NOT NULL,
  `liste_bool_cours` varchar(40) COLLATE utf8_bin DEFAULT NULL,
  `annee_en_cours` year(4) NOT NULL,
  `date_inscription` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `id_eleve` smallint(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Contenu de la table `COURSANNEE`
--

INSERT INTO `COURSANNEE` (`id_cours_annee`, `liste_bool_cours`, `annee_en_cours`, `date_inscription`, `id_eleve`) VALUES
(1, '1111111111000000000000000000000000000000', 2016, '2016-09-12 16:47:06', 8);

-- --------------------------------------------------------

--
-- Structure de la table `COURSCARTE`
--

CREATE TABLE `COURSCARTE` (
  `IDcourscarte` smallint(5) NOT NULL,
  `date_cours` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `annee_actuelle` year(4) NOT NULL,
  `id_eleve` smallint(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Structure de la table `ELEVE`
--

CREATE TABLE `ELEVE` (
  `ID` smallint(5) UNSIGNED ZEROFILL NOT NULL,
  `Nom` varchar(200) CHARACTER SET latin1 NOT NULL,
  `Prenom` varchar(200) CHARACTER SET latin1 NOT NULL,
  `adresse` varchar(400) CHARACTER SET latin1 NOT NULL,
  `Ville` varchar(200) CHARACTER SET latin1 NOT NULL,
  `CP` varchar(5) CHARACTER SET latin1 NOT NULL,
  `Tel` varchar(10) CHARACTER SET latin1 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Contenu de la table `ELEVE`
--

INSERT INTO `ELEVE` (`ID`, `Nom`, `Prenom`, `adresse`, `Ville`, `CP`, `Tel`) VALUES
(00001, 'Star', 'Joe', '20 rue des d&eacute;linquants', 'Paris', '75000', '0123456789'),
(00008, 'tonton', 'john', '1 rue victor Grossein', 'Tours', '37000', '0672149132');

--
-- Index pour les tables exportées
--

--
-- Index pour la table `COURSANNEE`
--
ALTER TABLE `COURSANNEE`
  ADD PRIMARY KEY (`id_cours_annee`);

--
-- Index pour la table `ELEVE`
--
ALTER TABLE `ELEVE`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `COURSANNEE`
--
ALTER TABLE `COURSANNEE`
  MODIFY `id_cours_annee` smallint(5) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `ELEVE`
--
ALTER TABLE `ELEVE`
  MODIFY `ID` smallint(5) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
