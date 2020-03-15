-- phpMyAdmin SQL Dump
-- version 4.9.4
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost
-- Généré le : mar. 28 jan. 2020 à 13:49
-- Version du serveur :  10.3.21-MariaDB
-- Version de PHP : 7.3.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `meetic`
--

-- --------------------------------------------------------

--
-- Structure de la table `compte_user`
--

CREATE TABLE `compte_user` (
  `id_user` int(11) NOT NULL,
  `mdp` varchar(255) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `prenom` varchar(255) NOT NULL,
  `genre` int(10) NOT NULL,
  `email` varchar(255) NOT NULL,
  `date_naissance` date NOT NULL,
  `ville` varchar(255) NOT NULL,
  `actif` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `compte_user`
--

INSERT INTO `compte_user` (`id_user`, `mdp`, `nom`, `prenom`, `genre`, `email`, `date_naissance`, `ville`, `actif`) VALUES
(1, 'mot de passe', 'navarro', 'christophe', 0, 'gmail@gmail.com', '2020-01-26', 'marseille', 1);

-- --------------------------------------------------------

--
-- Structure de la table `hobbies`
--

CREATE TABLE `hobbies` (
  `id_user` int(11) NOT NULL,
  `loisir` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `hobbies`
--

INSERT INTO `hobbies` (`id_user`, `loisir`) VALUES
(1, 'info'),
(1, 'volley-ball');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `compte_user`
--
ALTER TABLE `compte_user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `compte_user`
--
ALTER TABLE `compte_user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
