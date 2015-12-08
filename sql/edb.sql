-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Mar 08 Décembre 2015 à 19:47
-- Version du serveur :  5.6.17
-- Version de PHP :  5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données :  `wordpress`
--

-- --------------------------------------------------------

--
-- Structure de la table `wp_edb_schoolings`
--

CREATE TABLE IF NOT EXISTS `wp_edb_schoolings` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `major` tinyint(1) NOT NULL DEFAULT '0',
  `speciality_id` int(11) NOT NULL,
  `semester_id` int(11) NOT NULL,
  `ue_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Contenu de la table `wp_edb_schoolings`
--

INSERT INTO `wp_edb_schoolings` (`id`, `major`, `speciality_id`, `semester_id`, `ue_id`) VALUES
(1, 0, 1, 1, 1),
(2, 0, 1, 1, 2),
(3, 0, 2, 1, 3),
(4, 0, 2, 1, 4);

-- --------------------------------------------------------

--
-- Structure de la table `wp_edb_semesters`
--

CREATE TABLE IF NOT EXISTS `wp_edb_semesters` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) NOT NULL,
  `wording` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Contenu de la table `wp_edb_semesters`
--

INSERT INTO `wp_edb_semesters` (`id`, `name`, `wording`) VALUES
(1, 'Semestre 1', 'Semestre 1 à l''ENSICAEN'),
(2, 'Semestre 2', 'Semestre 2 à l''ENSICAEN');

-- --------------------------------------------------------

--
-- Structure de la table `wp_edb_specialities`
--

CREATE TABLE IF NOT EXISTS `wp_edb_specialities` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) NOT NULL,
  `wording` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Contenu de la table `wp_edb_specialities`
--

INSERT INTO `wp_edb_specialities` (`id`, `name`, `wording`) VALUES
(1, 'Informatique', 'Diplôme d''ingénieur Informatique'),
(2, 'Génie Industriel', 'Diplôme d''ingénieur Génie Industriel');

-- --------------------------------------------------------

--
-- Structure de la table `wp_edb_ues`
--

CREATE TABLE IF NOT EXISTS `wp_edb_ues` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `code` varchar(45) NOT NULL,
  `wording` varchar(100) NOT NULL,
  `average_min` float NOT NULL DEFAULT '10',
  `ECTS` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Contenu de la table `wp_edb_ues`
--

INSERT INTO `wp_edb_ues` (`id`, `code`, `wording`, `average_min`, `ECTS`) VALUES
(1, '1L1AA', 'Langues & Culture de l''Entreprise ', 10, 6),
(2, '1I1AB', 'Mathematiques et signal', 10, 6),
(3, 'ATM3', 'Initiation ', 10, 8),
(4, 'GIA', 'Management et Communication', 10, 23);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
