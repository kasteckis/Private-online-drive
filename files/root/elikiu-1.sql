-- phpMyAdmin SQL Dump
-- version 3.4.11.1deb2+deb7u8
-- http://www.phpmyadmin.net
--
-- Darbinė stotis: localhost
-- Atlikimo laikas: 2019 m. Bal 11 d. 07:51
-- Serverio versija: 1.0.35
-- PHP versija: 5.6.37-1~dotdeb+zts+7.1

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Duomenų bazė: `elikiu`
--

-- --------------------------------------------------------

--
-- Sukurta duomenų struktūra lentelei `AUGALAS`
--

CREATE TABLE IF NOT EXISTS `AUGALAS` (
  `augimo_laikas` float NOT NULL,
  `sejimo_laikas` float NOT NULL,
  `augalo_kokybe` float DEFAULT NULL,
  `tipas` int(11) NOT NULL,
  `_id` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`_id`),
  KEY `tipas` (`tipas`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Sukurta duomenų kopija lentelei `AUGALAS`
--

INSERT INTO `AUGALAS` (`augimo_laikas`, `sejimo_laikas`, `augalo_kokybe`, `tipas`, `_id`) VALUES
(71, 4, 8, 2, 1),
(86, 2, 3, 3, 2),
(90, 9, 7, 4, 3),
(40, 20, 9, 4, 4),
(78, 8, 2, 4, 5),
(57, 1, 4, 2, 6),
(66, 2, 5, 2, 7),
(78, 11, 4, 3, 8),
(73, 16, 6, 1, 9),
(5, 16, 3, 4, 10),
(63, 20, 7, 4, 11),
(47, 1, 4, 1, 12),
(59, 14, 7, 3, 13),
(48, 8, 8, 1, 14),
(42, 10, 6, 1, 15),
(74, 10, 9, 3, 16),
(22, 6, 2, 4, 17),
(58, 15, 3, 1, 18),
(75, 6, 7, 4, 19),
(15, 7, 9, 3, 20);

-- --------------------------------------------------------

--
-- Sukurta duomenų struktūra lentelei `AUGALAS_ENUM`
--

CREATE TABLE IF NOT EXISTS `AUGALAS_ENUM` (
  `_id` int(11) NOT NULL DEFAULT '0',
  `name` char(7) NOT NULL,
  PRIMARY KEY (`_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Sukurta duomenų kopija lentelei `AUGALAS_ENUM`
--

INSERT INTO `AUGALAS_ENUM` (`_id`, `name`) VALUES
(1, 'avizos'),
(2, 'bulves'),
(3, 'javai'),
(4, 'grikiai');

-- --------------------------------------------------------

--
-- Sukurta duomenų struktūra lentelei `DARBAS`
--

CREATE TABLE IF NOT EXISTS `DARBAS` (
  `pavadinimas` varchar(255) NOT NULL,
  `darbo_laikas` float DEFAULT NULL,
  `uzmokestis` float NOT NULL,
  `_id` int(11) NOT NULL DEFAULT '0',
  `fk_UKININKAS_id` int(11) DEFAULT NULL,
  `fk_DARBUOTOJAS_id` int(11) NOT NULL,
  PRIMARY KEY (`_id`),
  KEY `dirba` (`fk_UKININKAS_id`),
  KEY `atlieka` (`fk_DARBUOTOJAS_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Sukurta duomenų kopija lentelei `DARBAS`
--

INSERT INTO `DARBAS` (`pavadinimas`, `darbo_laikas`, `uzmokestis`, `_id`, `fk_UKININKAS_id`, `fk_DARBUOTOJAS_id`) VALUES
('VP Marketing', 7.19, 18.41, 1, 2, 9),
('Quality Engineer', 66.17, 44.78, 2, 17, 14),
('Civil Engineer', 67.47, 37.54, 3, 2, 18),
('Editor', 9.57, 11.48, 4, 6, 17),
('Research Nurse', 92.77, 33.84, 5, 2, 12),
('Developer IV', 84.99, 23.21, 6, 17, 11),
('Financial Advisor', 14.56, 16.8, 7, 9, 3),
('Account Executive', 9.43, 47.9, 8, 18, 17),
('Clinical Specialist', 89.41, 40.82, 9, 17, 17),
('Marketing Assistant', 34.12, 9.18, 10, 14, 8),
('Chemical Engineer', 20, 73.15, 11, 13, 9),
('Internal Auditor', 27, 65.13, 12, 1, 16),
('Staff Accountant III', 64, 27, 13, NULL, 3),
('Research Assistant I', 66, 74.2, 14, 5, 4),
('Speech Pathologist', 69, 62.69, 15, NULL, 12),
('Desktop Support Technician', 45, 37.06, 16, 18, 2),
('Project Manager', 62, 63.65, 17, 3, 12),
('Geologist III', 43, 62.06, 18, NULL, 18),
('Pharmacist', 99, 50.22, 19, 15, 4),
('Operator', 75, 58.45, 20, NULL, 20),
('Senior Editor', 93, 56.01, 21, 1, 4),
('VP Product Management', 64, 71.93, 22, NULL, 18),
('Research Associate', 66, 63.65, 23, NULL, 14),
('Software Test Engineer III', 75, 56.36, 24, NULL, 12),
('Director of Sales', 63, 48.88, 25, NULL, 20),
('Recruiter', 100, 78.61, 26, NULL, 3),
('Statistician I', 85, 31.73, 27, NULL, 1),
('Computer Systems Analyst IV', 40, 79.91, 28, 12, 15),
('Office Assistant I', 94, 76.08, 29, 8, 11),
('Senior Sales Associate', 57, 41.58, 30, 7, 14),
('Actuary', 61, 42.07, 31, 11, 19),
('Accountant II', 41, 58.76, 32, NULL, 1),
('Web Developer IV', 52, 70.07, 33, 19, 6),
('Nuclear Power Engineer', 12, 47.9, 34, 20, 3),
('Mechanical Systems Engineer', 75, 58.19, 35, 7, 5),
('Legal Assistant', 80, 67.5, 36, NULL, 19),
('Assistant Professor', 62, 36.21, 37, 19, 3),
('Director of Sales', 53, 63.1, 38, NULL, 10),
('Sales Representative', 48, 74.16, 39, NULL, 12),
('Senior Developer', 19, 38.84, 40, 5, 16),
('Financial Analyst', 48, 55.95, 41, NULL, 16),
('Senior Financial Analyst', 82, 70.83, 42, 7, 11),
('Executive Secretary', 51, 33.64, 43, NULL, 17),
('Media Manager II', 52, 27.54, 44, NULL, 3),
('VP Product Management', 71, 72.46, 45, 3, 9),
('Community Outreach Specialist', 23, 79.76, 46, 6, 16),
('Editor', 56, 43.17, 47, 3, 5),
('Systems Administrator I', 72, 73.05, 48, 5, 3),
('Research Associate', 21, 34.42, 49, NULL, 1),
('Actuary', 12, 68.28, 50, NULL, 20);

-- --------------------------------------------------------

--
-- Sukurta duomenų struktūra lentelei `DARBO_SUTARTIS`
--

CREATE TABLE IF NOT EXISTS `DARBO_SUTARTIS` (
  `sutarties_nr` int(11) NOT NULL,
  `rusis` varchar(255) NOT NULL,
  `data` date NOT NULL,
  `dokumentas` int(11) NOT NULL,
  `fiksuota_alga` float DEFAULT NULL,
  `_id` int(11) NOT NULL DEFAULT '0',
  `fk_UKININKAS_id` int(11) NOT NULL,
  PRIMARY KEY (`_id`),
  KEY `sudaro` (`fk_UKININKAS_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Sukurta duomenų kopija lentelei `DARBO_SUTARTIS`
--

INSERT INTO `DARBO_SUTARTIS` (`sutarties_nr`, `rusis`, `data`, `dokumentas`, `fiksuota_alga`, `_id`, `fk_UKININKAS_id`) VALUES
(1548, 'CYS^A', '2019-01-16', 1, 718.49, 1, 1),
(797, 'JRI', '2018-10-06', 2, 619.9, 2, 2),
(3845, 'RGLS', '2018-03-14', 1, 754.79, 3, 1),
(1799, 'C^J', '2018-11-12', 1, 699.54, 4, 4),
(3970, 'BBH', '2018-06-27', 1, 511.22, 5, 5),
(7194, 'DOW', '2018-08-17', 2, 487.69, 6, 6),
(5049, 'EAGLW', '2019-02-15', 1, 440.95, 7, 7),
(9534, 'KEQU', '2018-03-05', 2, 717.31, 8, 8),
(3234, 'NATH', '2018-03-23', 2, 646.32, 9, 2),
(4371, 'DRUA', '2019-01-15', 1, 728.35, 10, 10),
(9723, 'CNDT', '2018-04-30', 2, 765.64, 11, 11),
(949, 'SXCP', '2019-02-23', 2, 754.8, 12, 12),
(6528, 'FOF', '2018-06-25', 1, 310.01, 13, 13),
(2503, 'SCHN', '2018-03-08', 1, 351.22, 14, 14),
(7065, 'LXU', '2018-07-19', 1, 499.22, 15, 15),
(7013, 'NYCB', '2018-07-02', 1, 604.11, 16, 16),
(4955, 'CLW', '2018-11-18', 2, 301.67, 17, 17),
(1008, 'HRTX', '2018-08-27', 2, 381.04, 18, 18),
(2561, 'DX^A', '2018-06-26', 1, 515.11, 19, 19),
(2535, 'FHB', '2018-11-12', 2, 747.09, 20, 20);

-- --------------------------------------------------------

--
-- Sukurta duomenų struktūra lentelei `DARBUOTOJAS`
--

CREATE TABLE IF NOT EXISTS `DARBUOTOJAS` (
  `vardas` varchar(255) NOT NULL,
  `pavarde` varchar(255) NOT NULL,
  `banko_saskaita` varchar(255) NOT NULL,
  `dokumentas` int(11) NOT NULL,
  `lytis` int(11) NOT NULL,
  `_id` int(11) NOT NULL DEFAULT '0',
  `fk_DARBO_SUTARTIS_id` int(11) NOT NULL,
  PRIMARY KEY (`_id`),
  UNIQUE KEY `fk_DARBO_SUTARTIS_id` (`fk_DARBO_SUTARTIS_id`),
  KEY `dokumentas` (`dokumentas`),
  KEY `lytis` (`lytis`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Sukurta duomenų kopija lentelei `DARBUOTOJAS`
--

INSERT INTO `DARBUOTOJAS` (`vardas`, `pavarde`, `banko_saskaita`, `dokumentas`, `lytis`, `_id`, `fk_DARBO_SUTARTIS_id`) VALUES
('Gwenneth', 'Hyrons', '374288349939065', 1, 2, 1, 1),
('Ermin', 'Tupp', '67593026400895477', 1, 1, 2, 2),
('Kilian', 'Sauniere', '3540234553497518', 1, 2, 3, 3),
('Giselbert', 'Croson', '3581623719934267', 2, 1, 4, 4),
('Claude', 'Rizzillo', '67091213517258172', 2, 2, 5, 5),
('Mannie', 'Deave', '4041375118019248', 2, 2, 6, 6),
('Rivkah', 'Cowling', '561099714266254431', 2, 1, 7, 7),
('Nissie', 'Boyle', '4405443710204368', 2, 2, 8, 8),
('Miltie', 'Thyer', '5108755764975008', 1, 1, 9, 9),
('Zaria', 'Sheed', '3540164898169607', 2, 2, 10, 10),
('Bondon', 'Fairham', '3546229899775985', 1, 2, 11, 11),
('Linnell', 'Dorcey', '3562198425393754', 2, 1, 12, 12),
('Daile', 'Bayly', '36855755500803', 1, 1, 13, 13),
('Carey', 'Haste', '3579775761778721', 2, 1, 14, 14),
('Marlee', 'Kielty', '3560296903370369', 1, 2, 15, 15),
('Saxon', 'Margiotta', '5602253752922928', 1, 2, 16, 16),
('Yasmeen', 'Evason', '6392679497370654', 1, 1, 17, 17),
('Cahra', 'Nellies', '5038489750160723', 2, 1, 18, 18),
('Tabitha', 'Medgwick', '3585644445255047', 2, 2, 19, 19),
('Florance', 'Simkin', '3565197222578481', 1, 1, 20, 20);

-- --------------------------------------------------------

--
-- Sukurta duomenų struktūra lentelei `DOKUMENTAS`
--

CREATE TABLE IF NOT EXISTS `DOKUMENTAS` (
  `_id` int(11) NOT NULL DEFAULT '0',
  `name` char(24) NOT NULL,
  PRIMARY KEY (`_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Sukurta duomenų kopija lentelei `DOKUMENTAS`
--

INSERT INTO `DOKUMENTAS` (`_id`, `name`) VALUES
(1, 'pasas'),
(2, 'asmens_tapatybes_kortele');

-- --------------------------------------------------------

--
-- Sukurta duomenų struktūra lentelei `GYVULIU`
--

CREATE TABLE IF NOT EXISTS `GYVULIU` (
  `_id` int(11) NOT NULL DEFAULT '0',
  `name` char(9) NOT NULL,
  PRIMARY KEY (`_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Sukurta duomenų kopija lentelei `GYVULIU`
--

INSERT INTO `GYVULIU` (`_id`, `name`) VALUES
(1, 'karve'),
(2, 'visciukas'),
(3, 'kiaule');

-- --------------------------------------------------------

--
-- Sukurta duomenų struktūra lentelei `GYVULYS`
--

CREATE TABLE IF NOT EXISTS `GYVULYS` (
  `veisle` varchar(255) DEFAULT NULL,
  `produktas` varchar(255) NOT NULL,
  `produkto_pagaminimo_laikas` float DEFAULT NULL,
  `gimimo_data` date NOT NULL,
  `tipas` int(11) NOT NULL,
  `_id` int(11) NOT NULL DEFAULT '0',
  `fk_PASTATAS_id` int(11) DEFAULT NULL,
  `fk_DARBAS_id` int(11) NOT NULL,
  `fk_ZEMES_PLOTAS_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`_id`),
  KEY `tipas` (`tipas`),
  KEY `laikomas` (`fk_PASTATAS_id`),
  KEY `priziuri` (`fk_DARBAS_id`),
  KEY `auga` (`fk_ZEMES_PLOTAS_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Sukurta duomenų kopija lentelei `GYVULYS`
--

INSERT INTO `GYVULYS` (`veisle`, `produktas`, `produkto_pagaminimo_laikas`, `gimimo_data`, `tipas`, `_id`, `fk_PASTATAS_id`, `fk_DARBAS_id`, `fk_ZEMES_PLOTAS_id`) VALUES
('pricy', 'milk', 3, '2019-05-21', 1, 1, NULL, 1, 27),
('chianina', 'chicken nugets', 1, '2017-05-09', 3, 2, NULL, 1, 40),
('sorhonarai', 'horns', 3, '2018-03-24', 2, 3, NULL, 1, 25),
('pricy', 'milk', 1, '2017-03-19', 2, 4, NULL, 1, 35),
('longhorn', 'chicken nugets', 2, '2017-11-09', 2, 5, NULL, 1, 2),
('simental', 'pork', 3, '2017-08-07', 3, 6, NULL, 1, 17),
('simental', 'egg', 1, '2018-11-23', 3, 7, NULL, 1, 9),
('sorhonarai', 'pork', 2, '2018-04-13', 1, 8, NULL, 1, 31),
('svicia', 'egg', 2, '2018-01-22', 3, 9, NULL, 1, 39),
('beefmaster', 'milk', 3, '2019-05-10', 2, 10, NULL, 1, 12),
('hailend', 'chicken nugets', 3, '2019-11-27', 2, 11, 1, 41, NULL),
('limusine', 'chicken nugets', 5, '2019-07-26', 2, 12, 1, 4, NULL),
('limusine', 'beaf', 3, '2019-05-31', 1, 13, 1, 42, NULL),
('hailend', 'chicken nugets', 1, '2019-09-29', 3, 14, 1, 39, NULL),
('chianina', 'egg', 4, '2019-04-30', 2, 15, 1, 31, NULL),
('airysiria', 'beaf', 4, '2019-06-10', 3, 16, 1, 13, NULL),
('limusine', 'beaf', 2, '2019-11-18', 1, 17, 1, 46, NULL),
('hailend', 'horns', 4, '2019-09-12', 1, 18, 1, 2, NULL),
('limusine', 'egg', 2, '2020-02-17', 3, 19, 1, 16, NULL),
('chianina', 'pork', 3, '2019-05-05', 3, 20, 1, 36, NULL),
('airysiria', 'beaf', 5, '2019-07-05', 2, 21, 1, 27, NULL),
('simental', 'beaf', 5, '2019-05-20', 3, 22, 1, 19, NULL),
('pricy', 'egg', 5, '2019-06-07', 1, 23, 1, 16, NULL),
('chianina', 'chicken nugets', 5, '2019-09-26', 1, 24, 1, 8, NULL),
('simental', 'milk', 3, '2019-06-05', 2, 25, 1, 43, NULL),
('chianina', 'beaf', 2, '2019-04-18', 2, 26, 1, 33, NULL),
('simental', 'chicken nugets', 2, '2019-11-15', 3, 27, 1, 48, NULL),
('halostein', 'horns', 4, '2019-08-09', 1, 28, 1, 1, NULL),
('simental', 'chicken nugets', 2, '2019-05-14', 3, 29, 1, 23, NULL),
('sarole', 'horns', 4, '2019-11-24', 3, 30, 1, 6, NULL),
('svicia', 'horns', 1, '2020-02-21', 2, 31, 1, 4, NULL),
('sorhonarai', 'egg', 2, '2019-04-28', 1, 32, 1, 40, NULL),
('limusine', 'horns', 5, '2019-08-03', 3, 33, 1, 28, NULL),
('chianina', 'egg', 4, '2019-05-19', 1, 34, 1, 29, NULL),
('simental', 'chicken nugets', 4, '2019-08-04', 2, 35, 1, 41, NULL),
('airysiria', 'egg', 2, '2019-10-29', 2, 36, 1, 1, NULL),
('airysiria', 'beaf', 5, '2019-06-27', 3, 37, 1, 22, NULL),
('chianina', 'pork', 3, '2019-04-11', 2, 38, 1, 20, NULL),
('longhorn', 'chicken nugets', 1, '2019-04-10', 2, 39, 1, 3, NULL),
('sorhonarai', 'beaf', 4, '2019-09-09', 3, 40, 1, 2, NULL);

-- --------------------------------------------------------

--
-- Sukurta duomenų struktūra lentelei `LYTIS`
--

CREATE TABLE IF NOT EXISTS `LYTIS` (
  `_id` int(11) NOT NULL DEFAULT '0',
  `name` char(7) NOT NULL,
  PRIMARY KEY (`_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Sukurta duomenų kopija lentelei `LYTIS`
--

INSERT INTO `LYTIS` (`_id`, `name`) VALUES
(1, 'vyras'),
(2, 'moteris');

-- --------------------------------------------------------

--
-- Sukurta duomenų struktūra lentelei `naudojama`
--

CREATE TABLE IF NOT EXISTS `naudojama` (
  `fk_ZEMES_PLOTAS_id` int(11) NOT NULL DEFAULT '0',
  `fk_ZEMES_UKIO_TECHNIKA_id` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`fk_ZEMES_PLOTAS_id`,`fk_ZEMES_UKIO_TECHNIKA_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Sukurta duomenų kopija lentelei `naudojama`
--

INSERT INTO `naudojama` (`fk_ZEMES_PLOTAS_id`, `fk_ZEMES_UKIO_TECHNIKA_id`) VALUES
(2, 10),
(3, 8),
(5, 9),
(5, 37),
(6, 20),
(6, 38),
(7, 5),
(7, 36),
(9, 21),
(9, 35),
(10, 4),
(10, 19),
(12, 27),
(13, 28),
(13, 29),
(14, 6),
(14, 17),
(14, 23),
(14, 25),
(15, 32),
(15, 33),
(16, 22),
(18, 11),
(18, 31),
(19, 12),
(20, 34),
(21, 13),
(23, 1),
(23, 18),
(24, 14),
(29, 15),
(29, 24),
(30, 16),
(30, 26),
(32, 39),
(36, 40),
(37, 3),
(39, 7),
(39, 30),
(40, 2);

-- --------------------------------------------------------

--
-- Sukurta duomenų struktūra lentelei `NAUDOJAMAS_PASARAS`
--

CREATE TABLE IF NOT EXISTS `NAUDOJAMAS_PASARAS` (
  `kiekis` int(11) NOT NULL,
  `panaudojimo_laikas` date NOT NULL,
  `_id` int(11) NOT NULL DEFAULT '0',
  `fk_GYVULYS_id` int(11) NOT NULL,
  PRIMARY KEY (`_id`),
  KEY `eda` (`fk_GYVULYS_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Sukurta duomenų kopija lentelei `NAUDOJAMAS_PASARAS`
--

INSERT INTO `NAUDOJAMAS_PASARAS` (`kiekis`, `panaudojimo_laikas`, `_id`, `fk_GYVULYS_id`) VALUES
(26, '2019-03-11', 1, 25),
(12, '2019-03-15', 2, 32),
(24, '2019-03-20', 3, 21),
(21, '2019-03-10', 4, 32),
(12, '2019-03-15', 5, 26),
(12, '2019-03-27', 6, 21),
(16, '2019-03-24', 7, 3),
(20, '2019-03-08', 8, 6),
(28, '2019-03-20', 9, 13),
(25, '2019-03-16', 10, 35),
(19, '2019-03-18', 11, 28),
(24, '2019-03-28', 12, 7),
(22, '2019-03-22', 13, 17),
(11, '2019-03-21', 14, 25),
(15, '2019-03-08', 15, 15),
(24, '2019-03-17', 16, 27),
(18, '2019-03-14', 17, 19),
(15, '2019-03-28', 18, 38),
(16, '2019-03-15', 19, 7),
(20, '2019-03-06', 20, 40);

-- --------------------------------------------------------

--
-- Sukurta duomenų struktūra lentelei `PASARAS`
--

CREATE TABLE IF NOT EXISTS `PASARAS` (
  `pavadinimas` varchar(255) NOT NULL,
  `kiekis` int(11) NOT NULL,
  `naudojimas` varchar(255) NOT NULL,
  `galiojimo_laikas` date NOT NULL,
  `_id` int(11) NOT NULL DEFAULT '0',
  `fk_NAUDOJAMAS_PASARAS_id` int(11) NOT NULL,
  `fk_AUGALAS_id` int(11) NOT NULL,
  PRIMARY KEY (`_id`),
  KEY `paima` (`fk_NAUDOJAMAS_PASARAS_id`),
  KEY `naudojamas` (`fk_AUGALAS_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Sukurta duomenų kopija lentelei `PASARAS`
--

INSERT INTO `PASARAS` (`pavadinimas`, `kiekis`, `naudojimas`, `galiojimo_laikas`, `_id`, `fk_NAUDOJAMAS_PASARAS_id`, `fk_AUGALAS_id`) VALUES
('Bryum Moss', 13, 'silosas', '2019-03-17', 1, 1, 10),
('Aloina Moss', 4, 'siaudai', '2019-11-27', 2, 1, 20),
('Sheep Cinquefoil', 5, 'silosas', '2019-05-30', 3, 2, 10),
('Coccocarpia Lichen', 2, 'siaudai', '2020-02-05', 4, 1, 18),
('Peak Saxifrage', 13, 'sienas', '2019-09-09', 5, 1, 6),
('Otay Mesamint', 1, 'siaudai', '2020-01-09', 6, 4, 1),
('Red Manjack', 2, 'siaudai', '2019-04-02', 7, 4, 1),
('Sand Violet', 11, 'siaudai', '2020-02-12', 8, 3, 3),
('Basin Bladderpod', 6, 'silosas', '2019-05-10', 9, 2, 13),
('Hairy Solomon''s Seal', 5, 'silosas', '2019-09-09', 10, 2, 8),
('Thymeleaf Loosestrife', 8, 'sienas', '2020-02-27', 11, 2, 7),
('Ravenel''s Dot Lichen', 1, 'sienas', '2019-05-02', 12, 2, 20),
('Tufted Yellow Woodsorrel', 12, 'sienas', '2019-08-17', 13, 4, 16),
('Orange Lichen', 6, 'siaudai', '2019-12-22', 14, 4, 5),
('Lepidopilum Moss', 12, 'sienas', '2020-01-11', 15, 1, 19),
('Hay Sedge', 8, 'silosas', '2019-08-04', 16, 3, 8),
('Clustered Rush', 3, 'sienas', '2019-03-22', 17, 3, 12),
('Kahila Garland-lily', 5, 'silosas', '2019-06-30', 18, 1, 10),
('Lucy Braun''s Rosinweed', 7, 'siaudai', '2019-11-26', 19, 2, 13),
('Plummer''s Cliff Fern', 4, 'sienas', '2019-10-09', 20, 1, 8),
('Farr''s Willow', 6, 'siaudai', '2019-08-30', 21, 3, 10),
('Arthothelium Lichen', 4, 'silosas', '2019-05-26', 22, 1, 15),
('Arctic Alpine Forget-me-not', 4, 'sienas', '2019-11-27', 23, 3, 11),
('Oreas Moss', 8, 'siaudai', '2020-02-11', 24, 3, 8),
('Horsetail', 11, 'silosas', '2020-02-23', 25, 4, 1),
('Clubbed Creepingfern', 13, 'silosas', '2019-10-26', 26, 1, 8),
('Cherry Silverberry', 4, 'silosas', '2019-08-26', 27, 1, 13),
('Prairie Sandmat', 8, 'siaudai', '2019-12-21', 28, 2, 19),
('Garden Sorrel', 3, 'siaudai', '2020-02-07', 29, 1, 7),
('Kauai Colicwood', 8, 'silosas', '2019-06-10', 30, 3, 16);

-- --------------------------------------------------------

--
-- Sukurta duomenų struktūra lentelei `PASTATAS`
--

CREATE TABLE IF NOT EXISTS `PASTATAS` (
  `paskirtis` varchar(255) DEFAULT NULL,
  `talpa` float NOT NULL,
  `naudojimas` varchar(255) NOT NULL,
  `_id` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Sukurta duomenų kopija lentelei `PASTATAS`
--

INSERT INTO `PASTATAS` (`paskirtis`, `talpa`, `naudojimas`, `_id`) VALUES
('ukinis', 30, 'gyvuliai', 1),
('sandelis', 30, 'pasaro laikymas', 2),
('sandelis', 20, 'pasaro laikymas', 3);

-- --------------------------------------------------------

--
-- Sukurta duomenų struktūra lentelei `saugoma`
--

CREATE TABLE IF NOT EXISTS `saugoma` (
  `fk_PASTATAS_id` int(11) NOT NULL DEFAULT '0',
  `fk_PASARAS_id` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`fk_PASTATAS_id`,`fk_PASARAS_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Sukurta duomenų kopija lentelei `saugoma`
--

INSERT INTO `saugoma` (`fk_PASTATAS_id`, `fk_PASARAS_id`) VALUES
(2, 1),
(2, 2),
(2, 3),
(2, 4),
(2, 5),
(2, 6),
(2, 7),
(2, 8),
(2, 11),
(2, 13),
(2, 14),
(2, 15),
(2, 16),
(2, 18),
(2, 19),
(2, 20),
(2, 21),
(2, 23),
(2, 24),
(2, 25),
(2, 27),
(2, 28),
(2, 30),
(3, 9),
(3, 10),
(3, 12),
(3, 17),
(3, 22),
(3, 26),
(3, 29);

-- --------------------------------------------------------

--
-- Sukurta duomenų struktūra lentelei `TECHNIKA`
--

CREATE TABLE IF NOT EXISTS `TECHNIKA` (
  `_id` int(11) NOT NULL DEFAULT '0',
  `name` char(10) NOT NULL,
  PRIMARY KEY (`_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Sukurta duomenų kopija lentelei `TECHNIKA`
--

INSERT INTO `TECHNIKA` (`_id`, `name`) VALUES
(1, 'traktorius'),
(2, 'priekaba'),
(3, 'masina');

-- --------------------------------------------------------

--
-- Sukurta duomenų struktūra lentelei `UKININKAS`
--

CREATE TABLE IF NOT EXISTS `UKININKAS` (
  `vardas` varchar(255) NOT NULL,
  `pavarde` varchar(255) NOT NULL,
  `adresas` varchar(255) NOT NULL,
  `banko_saskaita` varchar(255) NOT NULL,
  `dokumentas` int(11) NOT NULL,
  `lytis` int(11) NOT NULL,
  `_id` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`_id`),
  KEY `dokumentas` (`dokumentas`),
  KEY `lytis` (`lytis`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Sukurta duomenų kopija lentelei `UKININKAS`
--

INSERT INTO `UKININKAS` (`vardas`, `pavarde`, `adresas`, `banko_saskaita`, `dokumentas`, `lytis`, `_id`) VALUES
('Trula', 'Priel', '350 Schurz Plaza', 'GB64 HWKX 6905 4505 6273 41', 2, 1, 1),
('Lillian', 'Eckh', '1 Petterle Parkway', 'IL51 0037 5326 1506 2806 822', 2, 1, 2),
('Layla', 'Neiland', '4814 Sutherland Junction', 'TR26 7695 6D7M DRYD 3BIC C4NA CZ', 1, 2, 3),
('Mavra', 'Bernardt', '221 Alpine Center', 'FR35 2167 9068 49J8 NMKG 8NFP S54', 2, 2, 4),
('Vinny', 'Pyper', '90897 Claremont Street', 'GI70 BPPP 0ZX7 3CDR RAN7 8J5', 2, 1, 5),
('Valentia', 'Shay', '49 Bonner Place', 'EE61 1924 0366 7959 5126', 1, 2, 6),
('Ninnette', 'Daviddi', '18267 Elgar Court', 'FO49 7885 5281 7502 53', 1, 1, 7),
('Miguel', 'Keenlayside', '6 Sherman Street', 'MU56 XAFC 6748 3823 5869 6687 675F XL', 2, 2, 8),
('Kipper', 'Dulieu', '81958 Briar Crest Center', 'IE22 GBNX 9700 2222 7251 61', 2, 1, 9),
('Ashlen', 'Ridges', '185 Onsgard Drive', 'ME06 5734 9300 1234 2687 97', 1, 2, 10),
('Suzanna', 'Dabling', '6808 Porter Court', 'IS59 2093 4710 3763 7710 0884 37', 1, 2, 11),
('Killian', 'Fysh', '2686 Coolidge Drive', 'GR61 3251 380L T2WR XXH8 VB6R MSD', 1, 1, 12),
('Brier', 'Beaconsall', '168 Crownhardt Court', 'FR42 5920 5472 75VD C3PV HC0N T00', 2, 1, 13),
('Leonardo', 'Hartil', '036 Graedel Lane', 'FR34 8798 2404 76DH TA3P PHGF Y26', 2, 2, 14),
('Mallory', 'Bromont', '27 Springs Place', 'RO81 ZDWG I9PS 1HB6 OMG7 9DKL', 1, 1, 15),
('Saundra', 'Baldam', '62 Scofield Pass', 'MD77 WPTR NSYV TKYD NXSK U4ZO', 1, 1, 16),
('Humfrid', 'McTeague', '6 Mallory Place', 'GL62 7028 3108 0994 18', 1, 2, 17),
('Gabbie', 'Stother', '69 Village Plaza', 'FR49 2612 9298 37QE QOHW B39I Q41', 2, 1, 18),
('Sigmund', 'Gheerhaert', '99 Porter Center', 'FR27 9051 7114 789R RHAG JJSO A48', 2, 2, 19),
('Gus', 'Dyball', '2 Forest Dale Lane', 'VG06 FPUD 7410 0946 2910 7792', 1, 2, 20);

-- --------------------------------------------------------

--
-- Sukurta duomenų struktūra lentelei `ZEMES_PLOTAS`
--

CREATE TABLE IF NOT EXISTS `ZEMES_PLOTAS` (
  `dydis` float NOT NULL,
  `naudojimas` varchar(255) NOT NULL,
  `nasumo_balas` float DEFAULT NULL,
  `naudojimo_laikas` float NOT NULL,
  `_id` int(11) NOT NULL DEFAULT '0',
  `fk_AUGALAS_id` int(11) NOT NULL,
  PRIMARY KEY (`_id`),
  KEY `yra` (`fk_AUGALAS_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Sukurta duomenų kopija lentelei `ZEMES_PLOTAS`
--

INSERT INTO `ZEMES_PLOTAS` (`dydis`, `naudojimas`, `nasumo_balas`, `naudojimo_laikas`, `_id`, `fk_AUGALAS_id`) VALUES
(118, 'rase', 1.01, 5.03, 1, 1),
(30, 'sienas', 4.85, 88.26, 2, 2),
(100, 'sienas', 4.65, 17.24, 3, 1),
(38, 'sienas', 2.96, 68.17, 4, 1),
(46, 'sienas', 3.41, 54.28, 5, 3),
(79, 'rase', 2.04, 90.52, 6, 2),
(114, 'sienas', 9.1, 87.96, 7, 2),
(93, 'rase', 9.85, 45.01, 8, 3),
(43, 'sienas', 4.25, 33.67, 9, 1),
(109, 'sienas', 9.26, 7.29, 10, 1),
(103, 'grow', 3.27, 28, 11, 10),
(95, 'grow', 4.31, 21, 12, 4),
(114, 'eat', 2.65, 27, 13, 7),
(97, 'eat', 7.41, 7, 14, 11),
(108, 'grow', 7.09, 16, 15, 16),
(110, 'eat', 5.88, 24, 16, 7),
(98, 'weed', 7.56, 24, 17, 1),
(83, 'eat', 7.04, 28, 18, 2),
(16, 'grow', 9.74, 7, 19, 4),
(39, 'eat', 8.07, 6, 20, 13),
(110, 'grow', 6.22, 15, 21, 8),
(55, 'weed', 5.38, 21, 22, 2),
(79, 'grow', 9.55, 7, 23, 20),
(115, 'grow', 1.85, 26, 24, 1),
(79, 'grow', 4.89, 21, 25, 20),
(25, 'weed', 6.11, 25, 26, 8),
(39, 'weed', 2.67, 19, 27, 4),
(99, 'weed', 9.6, 26, 28, 4),
(32, 'grow', 4.08, 24, 29, 13),
(68, 'weed', 8.01, 5, 30, 5),
(120, 'grow', 6.58, 14, 31, 17),
(40, 'weed', 7.92, 10, 32, 12),
(108, 'eat', 1.57, 14, 33, 19),
(112, 'grow', 9.21, 22, 34, 9),
(15, 'eat', 3.81, 12, 35, 10),
(104, 'grow', 3.2, 16, 36, 20),
(109, 'eat', 9.65, 28, 37, 1),
(117, 'grow', 1.98, 16, 38, 1),
(16, 'eat', 9.25, 22, 39, 1),
(10, 'grow', 9.03, 27, 40, 8);

-- --------------------------------------------------------

--
-- Sukurta duomenų struktūra lentelei `ZEMES_UKIO_TECHNIKA`
--

CREATE TABLE IF NOT EXISTS `ZEMES_UKIO_TECHNIKA` (
  `Valstybinis_numeris` varchar(255) NOT NULL,
  `naudojimas` varchar(255) NOT NULL,
  `iregistravimo_data` date NOT NULL,
  `tipas` int(11) NOT NULL,
  `_id` int(11) NOT NULL DEFAULT '0',
  `fk_DARBAS_id` int(11) NOT NULL,
  PRIMARY KEY (`_id`),
  KEY `tipas` (`tipas`),
  KEY `naudoja` (`fk_DARBAS_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Sukurta duomenų kopija lentelei `ZEMES_UKIO_TECHNIKA`
--

INSERT INTO `ZEMES_UKIO_TECHNIKA` (`Valstybinis_numeris`, `naudojimas`, `iregistravimo_data`, `tipas`, `_id`, `fk_DARBAS_id`) VALUES
('5252254', 'Civil Engineer', '2016-08-29', 1, 1, 32),
('4068668', 'Programmer Analyst II', '2017-09-06', 1, 2, 32),
('4877573', 'Food Chemist', '2017-09-28', 2, 3, 16),
('6261134', 'Senior Editor', '2016-06-30', 2, 4, 14),
('6170335', 'Analyst Programmer', '2018-12-20', 1, 5, 26),
('3391516', 'Professor', '2017-12-19', 2, 6, 44),
('1907942', 'Tax Accountant', '2016-08-19', 3, 7, 18),
('7660941', 'Civil Engineer', '2018-11-24', 3, 8, 48),
('4872434', 'Web Designer I', '2018-01-13', 1, 9, 7),
('2466207', 'Recruiting Manager', '2018-07-21', 2, 10, 29),
('6772514', 'Systems Administrator I', '2018-10-27', 2, 11, 8),
('9124009', 'Structural Analysis Engineer', '2018-10-03', 1, 12, 16),
('6696607', 'Tax Accountant', '2018-10-07', 3, 13, 25),
('7967939', 'Chemical Engineer', '2017-07-29', 1, 14, 29),
('5596558', 'Director of Sales', '2018-06-10', 2, 15, 10),
('7611736', 'Chief Design Engineer', '2018-09-29', 2, 16, 10),
('8822073', 'Actuary', '2017-12-08', 2, 17, 24),
('3579430', 'Analyst Programmer', '2017-11-12', 3, 18, 16),
('9108750', 'Editor', '2017-06-26', 2, 19, 13),
('1422782', 'Office Assistant I', '2016-06-12', 1, 20, 39),
('4436749', 'Registered Nurse', '2017-05-21', 1, 21, 45),
('1424029', 'Mechanical Systems Engineer', '2019-02-15', 1, 22, 9),
('2381801', 'Programmer Analyst II', '2018-11-08', 2, 23, 5),
('4566725', 'Teacher', '2016-11-26', 1, 24, 30),
('1832909', 'Assistant Professor', '2016-03-31', 2, 25, 45),
('9663468', 'Community Outreach Specialist', '2018-12-30', 1, 26, 43),
('9210276', 'Executive Secretary', '2016-07-01', 2, 27, 20),
('1222918', 'Executive Secretary', '2016-04-27', 2, 28, 12),
('1778053', 'Pharmacist', '2016-04-15', 3, 29, 12),
('4694272', 'Senior Editor', '2016-12-13', 1, 30, 33),
('2845067', 'Senior Developer', '2017-09-21', 2, 31, 1),
('6634727', 'Pharmacist', '2016-04-19', 2, 32, 15),
('7497864', 'Assistant Manager', '2018-01-13', 1, 33, 23),
('4004429', 'Teacher', '2017-08-03', 2, 34, 22),
('7382943', 'Dental Hygienist', '2017-09-29', 1, 35, 36),
('8207660', 'Budget/Accounting Analyst IV', '2017-03-19', 2, 36, 41),
('3251143', 'Safety Technician III', '2019-02-28', 1, 37, 9),
('7811571', 'Compensation Analyst', '2017-01-20', 3, 38, 17),
('5994552', 'Marketing Manager', '2018-06-12', 1, 39, 28),
('3302328', 'Structural Analysis Engineer', '2016-11-14', 3, 40, 10);

--
-- Apribojimai eksportuotom lentelėm
--

--
-- Apribojimai lentelei `AUGALAS`
--
ALTER TABLE `AUGALAS`
  ADD CONSTRAINT `AUGALAS_ibfk_1` FOREIGN KEY (`tipas`) REFERENCES `AUGALAS_ENUM` (`_id`);

--
-- Apribojimai lentelei `DARBAS`
--
ALTER TABLE `DARBAS`
  ADD CONSTRAINT `atlieka` FOREIGN KEY (`fk_DARBUOTOJAS_id`) REFERENCES `DARBUOTOJAS` (`_id`),
  ADD CONSTRAINT `dirba` FOREIGN KEY (`fk_UKININKAS_id`) REFERENCES `UKININKAS` (`_id`);

--
-- Apribojimai lentelei `DARBO_SUTARTIS`
--
ALTER TABLE `DARBO_SUTARTIS`
  ADD CONSTRAINT `sudaro` FOREIGN KEY (`fk_UKININKAS_id`) REFERENCES `UKININKAS` (`_id`);

--
-- Apribojimai lentelei `DARBUOTOJAS`
--
ALTER TABLE `DARBUOTOJAS`
  ADD CONSTRAINT `DARBUOTOJAS_ibfk_1` FOREIGN KEY (`dokumentas`) REFERENCES `DOKUMENTAS` (`_id`),
  ADD CONSTRAINT `DARBUOTOJAS_ibfk_2` FOREIGN KEY (`lytis`) REFERENCES `LYTIS` (`_id`),
  ADD CONSTRAINT `su` FOREIGN KEY (`fk_DARBO_SUTARTIS_id`) REFERENCES `DARBO_SUTARTIS` (`_id`);

--
-- Apribojimai lentelei `GYVULYS`
--
ALTER TABLE `GYVULYS`
  ADD CONSTRAINT `GYVULYS_ibfk_1` FOREIGN KEY (`tipas`) REFERENCES `GYVULIU` (`_id`),
  ADD CONSTRAINT `auga` FOREIGN KEY (`fk_ZEMES_PLOTAS_id`) REFERENCES `ZEMES_PLOTAS` (`_id`),
  ADD CONSTRAINT `laikomas` FOREIGN KEY (`fk_PASTATAS_id`) REFERENCES `PASTATAS` (`_id`),
  ADD CONSTRAINT `priziuri` FOREIGN KEY (`fk_DARBAS_id`) REFERENCES `DARBAS` (`_id`);

--
-- Apribojimai lentelei `naudojama`
--
ALTER TABLE `naudojama`
  ADD CONSTRAINT `naudojama` FOREIGN KEY (`fk_ZEMES_PLOTAS_id`) REFERENCES `ZEMES_PLOTAS` (`_id`);

--
-- Apribojimai lentelei `NAUDOJAMAS_PASARAS`
--
ALTER TABLE `NAUDOJAMAS_PASARAS`
  ADD CONSTRAINT `eda` FOREIGN KEY (`fk_GYVULYS_id`) REFERENCES `GYVULYS` (`_id`);

--
-- Apribojimai lentelei `PASARAS`
--
ALTER TABLE `PASARAS`
  ADD CONSTRAINT `naudojamas` FOREIGN KEY (`fk_AUGALAS_id`) REFERENCES `AUGALAS` (`_id`),
  ADD CONSTRAINT `paima` FOREIGN KEY (`fk_NAUDOJAMAS_PASARAS_id`) REFERENCES `NAUDOJAMAS_PASARAS` (`_id`);

--
-- Apribojimai lentelei `saugoma`
--
ALTER TABLE `saugoma`
  ADD CONSTRAINT `saugoma` FOREIGN KEY (`fk_PASTATAS_id`) REFERENCES `PASTATAS` (`_id`);

--
-- Apribojimai lentelei `UKININKAS`
--
ALTER TABLE `UKININKAS`
  ADD CONSTRAINT `UKININKAS_ibfk_1` FOREIGN KEY (`dokumentas`) REFERENCES `DOKUMENTAS` (`_id`),
  ADD CONSTRAINT `UKININKAS_ibfk_2` FOREIGN KEY (`lytis`) REFERENCES `LYTIS` (`_id`);

--
-- Apribojimai lentelei `ZEMES_PLOTAS`
--
ALTER TABLE `ZEMES_PLOTAS`
  ADD CONSTRAINT `yra` FOREIGN KEY (`fk_AUGALAS_id`) REFERENCES `AUGALAS` (`_id`) ON DELETE CASCADE;


--
-- Apribojimai lentelei `ZEMES_UKIO_TECHNIKA`
--
ALTER TABLE `ZEMES_UKIO_TECHNIKA`
  ADD CONSTRAINT `ZEMES_UKIO_TECHNIKA_ibfk_1` FOREIGN KEY (`tipas`) REFERENCES `TECHNIKA` (`_id`),
  ADD CONSTRAINT `naudoja` FOREIGN KEY (`fk_DARBAS_id`) REFERENCES `DARBAS` (`_id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
