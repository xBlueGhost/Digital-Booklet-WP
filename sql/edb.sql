-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Dim 10 Janvier 2016 à 21:28
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
  `lang_code` varchar(5) NOT NULL,
  PRIMARY KEY (`lang_num`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Contenu de la table `wp_edb_langs`
--

INSERT INTO `wp_edb_langs` (`lang_num`, `lang_name`, `lang_code`) VALUES
(1, 'Français', 'FR'),
(2, 'English', 'EN');

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
(1, 1, 2, 2),
(1, 2, 1, 3),
(1, 2, 2, 4),
(2, 1, 1, 5);

-- --------------------------------------------------------

--
-- Structure de la table `wp_edb_schooling_types`
--

CREATE TABLE IF NOT EXISTS `wp_edb_schooling_types` (
  `schooling_type_num` int(11) NOT NULL AUTO_INCREMENT,
  `schooling_type_name` varchar(50) NOT NULL,
  `schooling_type_order` int(11) NOT NULL,
  `lang_num` int(11) NOT NULL,
  PRIMARY KEY (`schooling_type_num`,`lang_num`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Contenu de la table `wp_edb_schooling_types`
--

INSERT INTO `wp_edb_schooling_types` (`schooling_type_num`, `schooling_type_name`, `schooling_type_order`, `lang_num`) VALUES
(1, 'Tronc commun', 1, 1),
(1, 'Common', 1, 2),
(2, 'Majeure', 2, 1),
(2, 'Major', 2, 2);

-- --------------------------------------------------------

--
-- Structure de la table `wp_edb_semesters`
--

CREATE TABLE IF NOT EXISTS `wp_edb_semesters` (
  `semester_num` int(11) NOT NULL AUTO_INCREMENT,
  `semester_order` int(11) NOT NULL,
  PRIMARY KEY (`semester_num`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Contenu de la table `wp_edb_semesters`
--

INSERT INTO `wp_edb_semesters` (`semester_num`, `semester_order`) VALUES
(1, 1),
(2, 2);

-- --------------------------------------------------------

--
-- Structure de la table `wp_edb_semesters_langs`
--

CREATE TABLE IF NOT EXISTS `wp_edb_semesters_langs` (
  `semester_num` int(11) NOT NULL,
  `semester_name` varchar(50) NOT NULL,
  `semester_wording` varchar(255) NOT NULL,
  `lang_num` int(11) NOT NULL,
  PRIMARY KEY (`semester_num`,`lang_num`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `wp_edb_semesters_langs`
--

INSERT INTO `wp_edb_semesters_langs` (`semester_num`, `semester_name`, `semester_wording`, `lang_num`) VALUES
(1, 'Semestre 1', 'Premier semestre à l''ENSICAEN', 1),
(1, 'Semester 1', 'First semester at ENSICAEN', 2),
(2, 'Semestre 2', 'Deuxième semestre à l''ENSICAEN', 1),
(2, 'Semester 2', 'Second semester at ENSICAEN', 2);

-- --------------------------------------------------------

--
-- Structure de la table `wp_edb_specialities`
--

CREATE TABLE IF NOT EXISTS `wp_edb_specialities` (
  `speciality_num` int(11) NOT NULL AUTO_INCREMENT,
  `speciality_order` int(11) NOT NULL,
  PRIMARY KEY (`speciality_num`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Contenu de la table `wp_edb_specialities`
--

INSERT INTO `wp_edb_specialities` (`speciality_num`, `speciality_order`) VALUES
(1, 1),
(2, 2);

-- --------------------------------------------------------

--
-- Structure de la table `wp_edb_specialities_langs`
--

CREATE TABLE IF NOT EXISTS `wp_edb_specialities_langs` (
  `speciality_num` int(11) NOT NULL,
  `speciality_name` varchar(50) NOT NULL,
  `speciality_wording` varchar(255) NOT NULL,
  `lang_num` int(11) NOT NULL,
  PRIMARY KEY (`speciality_num`,`lang_num`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `wp_edb_specialities_langs`
--

INSERT INTO `wp_edb_specialities_langs` (`speciality_num`, `speciality_name`, `speciality_wording`, `lang_num`) VALUES
(1, 'Informatique', 'Diplôme d''ingénieur informatique', 1),
(1, 'Computer Science', 'Computer engineering degree', 2),
(2, 'Matériaux et Mécanique', 'Diplôme d''ingénieur matériaux et mécanique', 1),
(2, 'Materials and mechanical engineering degree', '', 2);

-- --------------------------------------------------------

--
-- Structure de la table `wp_edb_ues`
--

CREATE TABLE IF NOT EXISTS `wp_edb_ues` (
  `ue_num` int(11) NOT NULL AUTO_INCREMENT,
  `ue_code` varchar(10) NOT NULL,
  `ue_average_min` float NOT NULL,
  `ue_ects` int(11) NOT NULL,
  `ue_order` int(11) NOT NULL,
  PRIMARY KEY (`ue_num`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- Contenu de la table `wp_edb_ues`
--

INSERT INTO `wp_edb_ues` (`ue_num`, `ue_code`, `ue_average_min`, `ue_ects`, `ue_order`) VALUES
(1, '1L1AA', 10, 3, 1),
(2, '1I1AB', 10, 3, 2),
(3, '1MAA', 10, 9, 1),
(4, '1MAB', 10, 6, 2),
(5, '2I2AD', 10, 5, 3);

-- --------------------------------------------------------

--
-- Structure de la table `wp_edb_ues_langs`
--

CREATE TABLE IF NOT EXISTS `wp_edb_ues_langs` (
  `ue_num` int(11) NOT NULL,
  `ue_wording` varchar(255) NOT NULL,
  `lang_num` int(11) NOT NULL,
  PRIMARY KEY (`ue_num`,`lang_num`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `wp_edb_ues_langs`
--

INSERT INTO `wp_edb_ues_langs` (`ue_num`, `ue_wording`, `lang_num`) VALUES
(1, 'Langues & Culture de l''Entreprise ', 1),
(1, 'Language and Culture of Enterprise', 2),
(2, 'Mathematiques et signal', 1),
(2, 'Mathematics and Signal', 2),
(3, 'Formation generale ', 1),
(3, 'General education', 2),
(4, 'Sciences pour l''Ingénieur ', 1),
(4, 'Engineering Sciences', 2),
(5, 'Image & Multimedia ', 1),
(5, 'Image & Multimedia ', 2);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
