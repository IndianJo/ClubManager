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
-- Table `player`
--
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
-- Table game_set
-- reinitialize auto increment
ALTER TABLE game_set AUTO_INCREMENT = 0;


INSERT INTO `game_set` (`number`, `size`, `sexe`, `player_id`) VALUES
  (1, 'M', 'Men', 3),
  (2, 'M', 'Men', 9),
  (3, 'M', 'Men', 10),
  (4, 'M', 'Men', 11),
  (5, 'M', 'Men', 12),
  (9, 'M', 'Men', 7),
  (10, 'M', 'Men', 3),
  (12, 'M', 'Men', 3),
  (13, 'M', 'Men', 13),
  (14, 'M', 'Men', 14),
  (16, 'M', 'Men', 5),
  (20, 'M', 'Men', 15),
  (22, 'XL', 'Men', 8),
  (26, 'S', 'Women', 16),
  (30, 'S', 'Women', 17),
  (33, 'S', 'Women', 18),
  (42, 'M', 'Women', 19),
  (45, 'XL', 'Men', 20),
  (57, 'S', 'Women', 21),
  (60, 'M', 'Men', 3),
  (61, 'M', 'Men', 5),
  (63, 'L', 'Men', 22),
  (69, 'M', 'Men', 23),
  (79, 'M', 'Men', 24),
  (84, 'M', 'Men', 25),
  (87, 'M', 'Men', 4),
  (88, 'S', 'Women', 6),
  (89, 'L', 'Men', 27),
  (91, 'M', 'Men', 28),
  (96, 'M', 'Men', 29);

-- --------------------------------------------------------

--
-- Table `season`
--
ALTER TABLE season AUTO_INCREMENT = 0;
--
-- Contenu de la table `season`
--

INSERT INTO `season` (`name`, `startDate`, `endDate`) VALUES
('2015-2016', '2015-09-01', '2016-08-31');

-- --------------------------------------------------------

--
-- Structure de la table `tournament`
--
ALTER TABLE tournament AUTO_INCREMENT = 0;

--
-- Contenu de la table `tournament`
--

INSERT INTO `tournament` (`id`, `name`, `address`, `city`, `country`, `startDate`, `endDate`, `category`, `division`, `surface`, `season_id`) VALUES
(1, 'Tournois de la patate', 'Gymnases Haberges et M.Roy', 'Vesoul', 'FR', '2015-09-27', '2015-09-27', 'Open', 'Amical', 'Indoor', 3),
(2, 'Flying Dahu', 'Le Landeron', 'canton de Neuchâtel', 'CH', '2015-10-17', '2015-10-18', 'Mixte', 'Amical', 'Indoor', 3),
(3, 'D2 Indoor', 'inconnu', 'inconnu', 'FR', '2015-10-24', '2015-10-25', 'Open', 'N2', 'Indoor', 3),
(6, 'Gaggloo', 'inconu', 'Bern', 'CH', '2015-11-14', '2015-11-15', 'Open', 'Amical', 'Indoor', 3),
(7, 'Gaggloo', 'inconu', 'Bern', 'CH', '2015-11-14', '2015-11-15', 'Feminin', 'Amical', 'Indoor', 3),
(8, 'KYF', 'inconnu', 'Erstein', 'FR', '2015-10-31', '2015-11-01', 'Feminin', 'Amical', 'Indoor', 3),
(9, 'Coupe de l''EST', 'Axone', 'Montbéliard', 'FR', '2015-11-14', '2015-11-15', 'Open', 'DR1', 'Indoor', 3);

  -- --------------------------------------------------------
  
  --
-- Table `team`
--
ALTER TABLE team AUTO_INCREMENT = 0;
--
-- Contenu de la table `team`
--

  INSERT INTO `team` (`id`, `name`) VALUES
(1, 'UCV1'),
(2, 'UCV2'),
(3, 'DahuTeam'),
(4, 'UCV1');

  -- --------------------------------------------------------

--
-- Table `team_player`
--
ALTER TABLE team_player AUTO_INCREMENT = 0;

--
-- Contenu de la table `team_player`
--

INSERT INTO `team_player` (`team_id`, `player_id`) VALUES
(1, 4),
(1, 5),
(1, 7),
(1, 8),
(2, 10),
(2, 12),
(2, 13),
(3, 4),
(3, 5),
(3, 6),
(3, 7);
  -- --------------------------------------------------------

--
-- Table `tournament_team`
--
ALTER TABLE tournament_team AUTO_INCREMENT = 0;

--
-- Contenu de la table `tournament_team`
--

INSERT INTO `tournament_team` (`tournament_id`, `team_id`) VALUES
(1, 1),
(1, 2),
(2, 3),
(3, 4);
