-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Ven 18 Septembre 2015 à 10:21
-- Version du serveur :  5.6.17
-- Version de PHP :  5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données :  `clubmanager`
--

-- --------------------------------------------------------
-- Table game_set
-- reinitialize auto increment
ALTER TABLE game_set AUTO_INCREMENT = 0;


INSERT INTO `game_set` (`number`, `size`, `sexe`, `player_id`) VALUES
  (1, 'M', 'Men', 1),
  (2, 'M', 'Men', NULL),
  (3, 'M', 'Men', NULL),
  (4, 'M', 'Men', NULL),
  (5, 'M', 'Men', NULL),
  (9, 'M', 'Men', NULL),
  (10, 'M', 'Men', 1),
  (12, 'M', 'Men', 1),
  (13, 'M', 'Men', NULL),
  (14, 'M', 'Men', NULL),
  (16, 'M', 'Men', NULL),
  (20, 'M', 'Men', NULL),
  (22, 'XL', 'Men', NULL),
  (26, 'M', 'Women', NULL),
  (30, 'M', 'Women', NULL),
  (33, 'M', 'Women', NULL),
  (42, 'M', 'Women', NULL),
  (45, 'M', 'Men', NULL),
  (57, 'M', 'Women', NULL),
  (60, 'M', 'Men', 1),
  (61, 'M', 'Men', NULL),
  (63, 'L', 'Men', NULL),
  (69, 'M', 'Men', NULL),
  (79, 'M', 'Men', NULL),
  (84, 'M', 'Men', NULL),
  (87, 'M', 'Men', NULL),
  (88, 'S', 'Women', NULL),
  (89, 'L', 'Men', NULL),
  (91, 'M', 'Men', NULL),
  (96, 'M', 'Men', NULL);

-- --------------------------------------------------------

--
-- Table `player`
--
ALTER TABLE player AUTO_INCREMENT = 0;
--
-- Contenu de la table `player`
--

INSERT INTO `player` (`firstname`, `lastname`, `phonenumber`, `street`, `streetnumber`, `city`, `CP`, `email`) VALUES
  ('club', 'ucv', '0606060606', 'ucv', 0, 'Besancon', 25000, 'ucv@ucv.com'),
  ('joseph', 'Mesny', '0633644614', 'T rue des CRAS', 33, 'Besancon', 25000, 'joseph.mesny@gmail.com'),
  ('tommy', 'Quirico', '0606060606', 'rue des grands cypres', 0, 'Besancon', 25000, 'tommy.quirico@ucv.com'),
  ('clementine', 'Gamonet', '0606060606', 'T rue des CRAS', 33, 'Besancon', 25000, 'clementine.gamonet@ucv.com'),
  ('colin', 'Michoudet', '0606060606', 'grande rue', 78, 'Besancon', 25000, 'colin.michoudet@ucv.com'),
  ('gaetan', 'Masson', '0606060606', 'rue du poitout', 0, 'Besancon', 25000, 'gaetan.masson@ucv.com'),
  ('Thomas', 'Jeanin', '0606060606', 'ucv', 0, 'Besancon', 25000, 'ucv@ucv.com'),
  ('Alexandre', 'Patrin', '0606060606', 'ucv', 0, 'Besancon', 25000, 'ucv@ucv.com'),
  ('Alexandre', 'Vernotte', '0606060606', 'ucv', 0, 'Besancon', 25000, 'ucv@ucv.com'),
  ('Frédéric', 'Christ', '0606060606', 'ucv', 0, 'Besancon', 25000, 'ucv@ucv.com'),
  ('Valentin', 'Gasgne', '0606060606', 'ucv', 0, 'Besancon', 25000, 'ucv@ucv.com'),
  ('Gautier', 'Mary', '0606060606', 'ucv', 0, 'Besancon', 25000, 'ucv@ucv.com'),
  ('Danny', 'Poinsignon', '0606060606', 'ucv', 0, 'Besancon', 25000, 'ucv@ucv.com'),
  ('Léa', 'Gisquet', '0606060606', 'ucv', 0, 'Besancon', 25000, 'ucv@ucv.com'),
  ('Alexia', 'Bontempi', '0606060606', 'ucv', 0, 'Besancon', 25000, 'ucv@ucv.com'),
  ('Annick', 'Barthod-Malat', '0606060606', 'ucv', 0, 'Besancon', 25000, 'ucv@ucv.com'),
  ('Lucie', 'Cailleaux', '0606060606', 'ucv', 0, 'Besancon', 25000, 'ucv@ucv.com'),
  ('Lois', 'Andrey', '0606060606', 'ucv', 0, 'Besancon', 25000, 'ucv@ucv.com'),
  ('Lise', 'Martin Perceval', '0606060606', 'ucv', 0, 'Besancon', 25000, 'ucv@ucv.com'),
  ('Tristant', 'Cailleaux', '0606060606', 'ucv', 0, 'Besancon', 25000, 'ucv@ucv.com'),
  ('Florent', 'Bourquin', '0606060606', 'ucv', 0, 'Besancon', 25000, 'ucv@ucv.com'),
  ('Jean Guillaume', 'Monet', '0606060606', 'ucv', 0, 'Besancon', 25000, 'ucv@ucv.com'),
  ('Régis', 'Bect', '0606060606', 'ucv', 0, 'Besancon', 25000, 'ucv@ucv.com'),
  ('Jean', 'Lambert', '0606060606', 'ucv', 0, 'Besancon', 25000, 'ucv@ucv.com'),
  ('Romain', 'Terrier', '0606060606', 'ucv', 0, 'Besancon', 25000, 'ucv@ucv.com'),
  ('Emeric', 'Elphege', '0606060606', 'ucv', 0, 'Besancon', 25000, 'ucv@ucv.com'),
  ('Paul', 'Boillon', '0606060606', 'ucv', 0, 'Besancon', 25000, 'ucv@ucv.com');
-- --------------------------------------------------------

--
-- Table `season`
--
ALTER TABLE "season" AUTO_INCREMENT = 0;
--
-- Contenu de la table `season`
--

INSERT INTO `season` (`name`, `startDate`, `endDate`) VALUES
('2015-2016', '2015-09-01', '2016-08-31');

-- --------------------------------------------------------

--
-- Structure de la table `tournament`
--
ALTER TABLE "tournament" AUTO_INCREMENT = 0;

--
-- Contenu de la table `tournament`
--

INSERT INTO `tournament` (`name`, `address`, `city`, `country`, `startDate`, `endDate`, `category`, `division`, `surface`, `season_id`) VALUES
  ('Tournois de la patate', 'Gymnases Haberges et M.Roy', 'Vesoul', 'FR', '2015-09-27', '2015-09-27', 'Open', 'Amical', 'Indoor', 3),
  ('Flying Dahu', 'Le Landeron', 'canton de Neuchâtel', 'CH', '2015-10-17', '2015-10-18', 'Mixte', 'Amical', 'Indoor', 3),
  ('D2 Indoor', 'inconnu', 'inconnu', 'FR', '2015-10-24', '2015-10-25', 'Open', 'N2', 'Indoor', 3);
  ('KYF', 'gymnase inconnu', 'Erstein', 'FR', '2015-10-31', '2015-11-01', 'Feminin', 'Amical', 'Indoor', 3),
  ('Gaggloo', 'inconu', 'Bern', 'CH', '2015-11-14', '2015-11-15', 'Open', 'Amical', 'Indoor', 3),
  ('Gaggloo', 'inconu', 'Bern', 'CH', '2015-11-14', '2015-11-15', 'Feminin', 'Amical', 'Indoor', 3);