-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Dim 13 Décembre 2015 à 21:44
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
  `lang_num` int(11) NOT NULL AUTO_INCREMENT,
  `lang_name` varchar(50) NOT NULL,
  `lang_code` varchar(2) NOT NULL,
  PRIMARY KEY (`lang_num`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Contenu de la table `wp_edb_langs`
--

INSERT INTO `wp_edb_langs` (`lang_num`, `lang_name`, `lang_code`) VALUES
(1, 'Français', 'FR'),
(2, 'Anglais', 'EN');

-- --------------------------------------------------------

--
-- Structure de la table `wp_edb_schoolings`
--

CREATE TABLE IF NOT EXISTS `wp_edb_schoolings` (
  `schooling_type_num` int(11) NOT NULL,
  `speciality_num` int(11) NOT NULL,
  `semester_num` int(11) NOT NULL,
  `ue_num` int(11) NOT NULL,
  PRIMARY KEY (`schooling_type_num`,`speciality_num`,`semester_num`,`ue_num`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `wp_edb_schoolings`
--

INSERT INTO `wp_edb_schoolings` (`schooling_type_num`, `speciality_num`, `semester_num`, `ue_num`) VALUES
(1, 1, 1, 1),
(1, 1, 1, 2),
(1, 2, 1, 3),
(1, 2, 1, 4);

-- --------------------------------------------------------

--
-- Structure de la table `wp_edb_schooling_types`
--

CREATE TABLE IF NOT EXISTS `wp_edb_schooling_types` (
  `schooling_type_num` int(11) NOT NULL,
  `schooling_type_name` varchar(50) NOT NULL,
  `lang_num` int(11) NOT NULL,
  PRIMARY KEY (`lang_num`,`schooling_type_num`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `wp_edb_schooling_types`
--

INSERT INTO `wp_edb_schooling_types` (`schooling_type_num`, `schooling_type_name`, `lang_num`) VALUES
(1, 'Tronc commun', 1),
(2, 'Majeure', 1),
(1, 'Common', 2),
(2, 'Major', 2);

-- --------------------------------------------------------

--
-- Structure de la table `wp_edb_semesters`
--

CREATE TABLE IF NOT EXISTS `wp_edb_semesters` (
  `semester_num` int(11) NOT NULL,
  `semester_name` varchar(45) NOT NULL,
  `semester_wording` varchar(100) NOT NULL,
  `lang_num` int(11) NOT NULL,
  PRIMARY KEY (`semester_num`,`lang_num`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `wp_edb_semesters`
--

INSERT INTO `wp_edb_semesters` (`semester_num`, `semester_name`, `semester_wording`, `lang_num`) VALUES
(1, 'Semestre 1', 'Semestre 1 à l''ENSICAEN', 1),
(1, 'Semester 1', 'Semester 1 at ENSICAEN', 2),
(2, 'Semestre 2', 'Semestre 2 à l''ENSICAEN', 1),
(2, 'Semester 2', 'Semester 2 at ENSICAEN', 2);

-- --------------------------------------------------------

--
-- Structure de la table `wp_edb_specialities`
--

CREATE TABLE IF NOT EXISTS `wp_edb_specialities` (
  `speciality_num` int(11) NOT NULL,
  `speciality_name` varchar(45) NOT NULL,
  `speciality_wording` varchar(100) NOT NULL,
  `speciality_order` int(11) DEFAULT NULL,
  `lang_num` int(11) NOT NULL,
  PRIMARY KEY (`speciality_num`,`lang_num`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `wp_edb_specialities`
--

INSERT INTO `wp_edb_specialities` (`speciality_num`, `speciality_name`, `speciality_wording`, `speciality_order`, `lang_num`) VALUES
(1, 'Informatique', 'Diplôme d''ingénieur Informatique', -1, 1),
(1, 'Computer science', 'Computer engineering degree', -1, 2),
(2, 'Génie Industriel', 'Diplôme d''ingénieur Génie Industriel', -1, 1),
(2, 'Industrial Engineering', 'Engineering Degree Industrial Engineering', -1, 2);

-- --------------------------------------------------------

--
-- Structure de la table `wp_edb_ues`
--

CREATE TABLE IF NOT EXISTS `wp_edb_ues` (
  `ue_num` int(11) NOT NULL,
  `ue_code` varchar(45) NOT NULL,
  `ue_wording` varchar(100) NOT NULL,
  `ue_average_min` float NOT NULL DEFAULT '10',
  `ue_ECTS` int(11) NOT NULL,
  `ue_order` int(11) DEFAULT NULL,
  `lang_num` int(11) NOT NULL,
  PRIMARY KEY (`ue_num`,`lang_num`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `wp_edb_ues`
--

INSERT INTO `wp_edb_ues` (`ue_num`, `ue_code`, `ue_wording`, `ue_average_min`, `ue_ECTS`, `ue_order`, `lang_num`) VALUES
(1, '1L1AA', 'Langues & Culture de l''Entreprise ', 10, 6, -1, 1),
(1, '1L1AA', 'Languages & Culture of Enterprise', 10, 6, -6, 2),
(2, '1I1AB', 'Mathematiques et signal', 10, 6, -1, 1),
(2, '1L1AB', 'Mathematics and Signal', 10, 6, -1, 2),
(3, 'ATM3', 'Initiation ', 10, 8, -1, 1),
(3, 'ATM3', 'Initiation\r\n', 10, 8, -1, 2),
(4, 'GIA', 'Management et Communication', 10, 23, -1, 1),
(4, 'GIA', 'Management and Communication', 10, 23, -1, 2);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
