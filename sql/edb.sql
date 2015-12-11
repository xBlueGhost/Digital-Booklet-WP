-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Jeu 10 Décembre 2015 à 16:00
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
-- Structure de la table `wp_edb_langs`
--

CREATE TABLE IF NOT EXISTS `wp_edb_langs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `code` varchar(2) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Contenu de la table `wp_edb_langs`
--

INSERT INTO `wp_edb_langs` (`id`, `name`, `code`) VALUES
(1, 'Français', 'FR'),
(2, 'Anglais', 'EN');

-- --------------------------------------------------------

--
-- Structure de la table `wp_edb_schoolings`
--

CREATE TABLE IF NOT EXISTS `wp_edb_schoolings` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `major` tinyint(1) NOT NULL DEFAULT '0',
  `speciality_num` int(11) NOT NULL,
  `semester_num` int(11) NOT NULL,
  `ue_num` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Contenu de la table `wp_edb_schoolings`
--

INSERT INTO `wp_edb_schoolings` (`id`, `major`, `speciality_num`, `semester_num`, `ue_num`) VALUES
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
  `semester_num` int(11) NOT NULL,
  `name` varchar(45) NOT NULL,
  `wording` varchar(100) NOT NULL,
  `lang_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Contenu de la table `wp_edb_semesters`
--

INSERT INTO `wp_edb_semesters` (`id`, `semester_num`, `name`, `wording`, `lang_id`) VALUES
(1, 1, 'Semestre 1', 'Semestre 1 à l''ENSICAEN', 1),
(2, 2, 'Semestre 2', 'Semestre 2 à l''ENSICAEN', 1),
(3, 1, 'Semester 1', 'Semester 1 at ENSICAEN', 2),
(4, 2, 'Semester 2', 'Semester 2 at ENSICAEN', 2);

-- --------------------------------------------------------

--
-- Structure de la table `wp_edb_specialities`
--

CREATE TABLE IF NOT EXISTS `wp_edb_specialities` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `speciality_num` int(11) NOT NULL,
  `name` varchar(45) NOT NULL,
  `wording` varchar(100) NOT NULL,
  `lang_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Contenu de la table `wp_edb_specialities`
--

INSERT INTO `wp_edb_specialities` (`id`, `speciality_num`, `name`, `wording`, `lang_id`) VALUES
(1, 1, 'Informatique', 'Diplôme d''ingénieur Informatique', 1),
(2, 2, 'Génie Industriel', 'Diplôme d''ingénieur Génie Industriel', 1),
(3, 1, 'Computer science', 'Computer engineering degree', 2),
(4, 2, 'Industrial Engineering', 'Engineering Degree Industrial Engineering', 2);

-- --------------------------------------------------------

--
-- Structure de la table `wp_edb_ues`
--

CREATE TABLE IF NOT EXISTS `wp_edb_ues` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ue_num` int(11) NOT NULL,
  `code` varchar(45) NOT NULL,
  `wording` varchar(100) NOT NULL,
  `average_min` float NOT NULL DEFAULT '10',
  `ECTS` int(11) NOT NULL,
  `lang_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=9 ;

--
-- Contenu de la table `wp_edb_ues`
--

INSERT INTO `wp_edb_ues` (`id`, `ue_num`, `code`, `wording`, `average_min`, `ECTS`, `lang_id`) VALUES
(1, 1, '1L1AA', 'Langues & Culture de l''Entreprise ', 10, 6, 1),
(2, 2, '1I1AB', 'Mathematiques et signal', 10, 6, 1),
(3, 3, 'ATM3', 'Initiation ', 10, 8, 1),
(4, 4, 'GIA', 'Management et Communication', 10, 23, 1),
(5, 1, '1L1AA', 'Languages & Culture of Enterprise', 10, 6, 2),
(6, 2, '1L1AB', 'Mathematics and Signal', 10, 6, 2),
(7, 3, 'ATM3', 'Initiation\r\n', 10, 8, 2),
(8, 4, 'GIA', 'Management and Communication', 10, 23, 2);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
