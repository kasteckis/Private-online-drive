-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: 2019 m. Bal 11 d. 08:51
-- Server version: 10.3.13-MariaDB
-- PHP Version: 5.6.40

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `galgaldas_duombaze`
--

-- --------------------------------------------------------

--
-- Sukurta duomenų struktūra lentelei `DARBO_SUTARTYS`
--

CREATE TABLE `DARBO_SUTARTYS` (
  `sutarties_numeris` int(11) NOT NULL,
  `data` date NOT NULL,
  `etatas` double NOT NULL,
  `fiksuota_alga` int(11) NOT NULL,
  `dokumentas` int(11) NOT NULL,
  `fk_DARBUOTOJAS` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Sukurta duomenų kopija lentelei `DARBO_SUTARTYS`
--

INSERT INTO `DARBO_SUTARTYS` (`sutarties_numeris`, `data`, `etatas`, `fiksuota_alga`, `dokumentas`, `fk_DARBUOTOJAS`) VALUES
(1, '2019-01-24', 1, 646, 2, 1),
(2, '2018-08-02', 0.5, 628, 1, 2),
(3, '2018-07-18', 1, 435, 2, 3),
(4, '2018-10-14', 1, 922, 2, 4),
(5, '2018-08-31', 1, 964, 1, 5),
(6, '2018-09-09', 0.5, 480, 1, 6),
(7, '2018-09-13', 0.5, 552, 1, 7),
(8, '2019-03-04', 0.5, 947, 2, 8),
(9, '2018-09-26', 1, 788, 1, 9),
(10, '2018-06-21', 1, 790, 1, 10),
(11, '2018-10-02', 1, 955, 1, 11),
(12, '2018-09-12', 0.5, 861, 1, 12),
(13, '2018-09-11', 0.5, 406, 2, 13),
(14, '2018-03-16', 0.5, 506, 2, 14),
(15, '2018-04-04', 1, 415, 1, 15),
(16, '2018-12-15', 1, 564, 2, 16),
(17, '2018-06-10', 0.5, 734, 2, 17),
(18, '2018-08-19', 0.5, 542, 2, 18),
(19, '2018-07-12', 1, 687, 2, 19),
(20, '2018-12-05', 0.5, 590, 1, 20),
(21, '2018-07-12', 0.5, 547, 1, 21),
(22, '2018-03-21', 0.5, 802, 2, 22),
(23, '2018-08-03', 1, 976, 2, 23),
(24, '2018-06-08', 1, 774, 1, 24),
(25, '2018-11-23', 1, 640, 1, 25),
(26, '2018-08-18', 0, 695, 1, 26),
(27, '2018-12-11', 1, 615, 1, 27),
(28, '2018-11-28', 0.5, 427, 2, 28),
(29, '2018-07-19', 0.5, 861, 2, 29);

-- --------------------------------------------------------

--
-- Sukurta duomenų struktūra lentelei `DARBUOTOJAI`
--

CREATE TABLE `DARBUOTOJAI` (
  `vardas` varchar(255) NOT NULL,
  `pavarde` varchar(255) NOT NULL,
  `asmens_kodas` bigint(20) NOT NULL,
  `banko_saskaita` varchar(255) NOT NULL,
  `pozicija` int(11) NOT NULL,
  `lytis` int(11) NOT NULL,
  `id_` int(11) NOT NULL,
  `fk_PARDUOTUVE` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Sukurta duomenų kopija lentelei `DARBUOTOJAI`
--

INSERT INTO `DARBUOTOJAI` (`vardas`, `pavarde`, `asmens_kodas`, `banko_saskaita`, `pozicija`, `lytis`, `id_`, `fk_PARDUOTUVE`) VALUES
('Renaud', 'Beagley', 43861195764, 'AL73 1810 4870 WEX7 7HDV UMBV AVUG', 4, 2, 1, 22),
('Erena', 'Burdekin', 46205092546, 'LB35 0313 W20S KVMT Y2U5 Y0UE UPOD', 4, 2, 2, 9),
('Jae', 'Kulver', 43990967699, 'PL85 3418 1136 6666 8815 1992 9959', 3, 2, 3, 11),
('Perri', 'Nicholson', 40172164466, 'IE89 QTSV 1453 4276 6511 21', 1, 1, 4, 5),
('Elset', 'Hubery', 46126227527, 'MD72 JIOU JQXB GABL CWG9 IUCU', 4, 2, 5, 27),
('Maurise', 'Daburn', 49712998699, 'LU37 2306 OUWN 1FJT KR4Q', 2, 1, 6, 12),
('Elfrieda', 'Arne', 47214016994, 'HR94 0233 5443 9659 1052 2', 4, 1, 7, 28),
('Nike', 'Elsmere', 42299958278, 'DE81 6208 1517 8147 0481 71', 4, 1, 8, 24),
('Adelind', 'Dene', 42771539199, 'GB18 FAYN 7717 6009 2546 59', 4, 1, 9, 12),
('Marshall', 'McKeveney', 45592053733, 'GI27 PUNX JPR6 1JED GWKH DP9', 4, 2, 10, 20),
('Shina', 'Menichino', 44014444698, 'GI18 VOXT VFFX M6AA YIJP 5YL', 1, 2, 11, 28),
('Karia', 'Croft', 44325491188, 'DK38 1478 2575 3362 91', 3, 1, 12, 21),
('Andros', 'Kelson', 42465755319, 'IL10 9490 7441 4670 7926 498', 3, 2, 13, 8),
('Nikola', 'Naden', 48613530303, 'MT20 ENWN 5936 6AKO KVMW 6HOY CVRZ VL6', 2, 2, 14, 18),
('Biddy', 'Lightewood', 47077988591, 'AD02 5059 1978 HXUY FDYP JGMN', 4, 2, 15, 8),
('Addison', 'Drever', 43570418927, 'CZ59 9920 1720 4370 0291 3038', 3, 1, 16, 28),
('Christian', 'Broom', 46889375552, 'PK70 HIQV 1CD9 7G8W JBXN EU6G', 4, 1, 17, 23),
('Annabella', 'Punchard', 49700220491, 'MT20 AKQO 0512 7XVZ BEQG 3IUO XFHC OJS', 2, 2, 18, 9),
('Victor', 'Arlt', 47456907543, 'AD66 5270 7456 D6NT ZGKV 6SSF', 4, 2, 19, 15),
('Karita', 'Clutterham', 46844813902, 'FR83 1282 9538 12J3 AZSA U0BK U53', 4, 1, 20, 22),
('Carlota', 'Thorald', 49251455899, 'KZ63 110X DOOV PKLV 5F7V', 1, 1, 21, 8),
('Randell', 'Farrer', 43346412592, 'GE74 TJ02 2708 4168 8306 08', 1, 2, 22, 24),
('Breena', 'Gonnin', 40014159313, 'LB69 6874 CL2S UHW6 MFB4 PV7I IIDR', 3, 2, 23, 21),
('Guillermo', 'Sabberton', 45325831772, 'DK18 5287 7449 3661 57', 3, 1, 24, 21),
('Marguerite', 'Radden', 47774408486, 'MR38 3906 4265 3932 5494 8529 398', 2, 2, 25, 13),
('Margaret', 'Harling', 49081465239, 'GL73 6630 1744 0087 89', 1, 1, 26, 20),
('Odelinda', 'Buffy', 40571078615, 'AL75 0672 0755 G7KO 3QYA BPOS UFYF', 2, 1, 27, 21),
('Dietrich', 'Carlsen', 40653148682, 'NO31 7804 4026 779', 3, 1, 28, 19),
('Dovydas', 'Kapocius', 39809164454, 'LT75445454', 1, 2, 29, 27);

-- --------------------------------------------------------

--
-- Sukurta duomenų struktūra lentelei `DETALES_BUSENA`
--

CREATE TABLE `DETALES_BUSENA` (
  `id_` int(11) NOT NULL DEFAULT 0,
  `name` char(19) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Sukurta duomenų kopija lentelei `DETALES_BUSENA`
--

INSERT INTO `DETALES_BUSENA` (`id_`, `name`) VALUES
(1, 'Neuzsakyta'),
(2, 'Laukiamas_atvežimas'),
(3, 'Atvežta');

-- --------------------------------------------------------

--
-- Sukurta duomenų struktūra lentelei `DOKUMENTAS`
--

CREATE TABLE `DOKUMENTAS` (
  `id_` int(11) NOT NULL DEFAULT 0,
  `name` char(17) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Sukurta duomenų kopija lentelei `DOKUMENTAS`
--

INSERT INTO `DOKUMENTAS` (`id_`, `name`) VALUES
(1, 'pasas'),
(2, 'tapatybes_kortele');

-- --------------------------------------------------------

--
-- Sukurta duomenų struktūra lentelei `FIRMOS`
--

CREATE TABLE `FIRMOS` (
  `pavadinimas` varchar(255) NOT NULL,
  `id_` int(11) NOT NULL,
  `fk_PRODUKTAS` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Sukurta duomenų kopija lentelei `FIRMOS`
--

INSERT INTO `FIRMOS` (`pavadinimas`, `id_`, `fk_PRODUKTAS`) VALUES
('Aimbo', 1, 1),
('Yambee', 2, 2),
('Thoughtmix', 3, 3),
('Bluejam', 4, 4),
('Skipstorm', 5, 5),
('Feedfire', 6, 6),
('Meemm', 7, 7),
('Eare', 8, 8),
('Quinu', 9, 9),
('Roomm', 10, 10),
('Myworks', 11, 11),
('Vitz', 12, 12),
('Voolith', 13, 13),
('Oyoloo', 14, 14),
('Gabcube', 15, 15),
('Fanoodle', 16, 16),
('Divape', 17, 17),
('Latz', 18, 18),
('Realmix', 19, 19),
('Muxo', 20, 20),
('Youspan', 21, 21),
('Gigazoom', 22, 22),
('Yodoo', 23, 23),
('Photobean', 24, 24),
('Livefish', 25, 25),
('Camimbo', 26, 26),
('Demivee', 27, 27),
('Vinder', 28, 28),
('Mynte', 29, 29),
('Yotz', 30, 30);

-- --------------------------------------------------------

--
-- Sukurta duomenų struktūra lentelei `KATEGORIJOS`
--

CREATE TABLE `KATEGORIJOS` (
  `pavadinimas` varchar(255) NOT NULL,
  `id_` int(11) NOT NULL,
  `fk_PRODUKTAS` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Sukurta duomenų kopija lentelei `KATEGORIJOS`
--

INSERT INTO `KATEGORIJOS` (`pavadinimas`, `id_`, `fk_PRODUKTAS`) VALUES
('Solarbreeze', 1, 1),
('Viva', 2, 2),
('Bytecard', 3, 3),
('Solarbreeze', 4, 4),
('Fix San', 5, 5),
('Fintone', 6, 6),
('Wrapsafe', 7, 7),
('Cardguard', 8, 8),
('Veribet', 9, 9),
('Lotlux', 10, 10),
('Biodex', 11, 11),
('Alpha', 12, 12),
('Bitchip', 13, 13),
('Bigtax', 14, 14),
('Hatity', 15, 15),
('Home Ing', 16, 16),
('Ronstring', 17, 17),
('Toughjoyfax', 18, 18),
('Andalax', 19, 19),
('Daltfresh', 20, 20),
('Asoka', 21, 21),
('Cookley', 22, 22),
('Voyatouch', 23, 23),
('Fix San', 24, 24),
('Stringtough', 25, 25),
('Mat Lam Tam', 26, 26),
('Duobam', 27, 27),
('Cookley', 28, 28),
('Latlux', 29, 29),
('Mat Lam Tam', 30, 30);

-- --------------------------------------------------------

--
-- Sukurta duomenų struktūra lentelei `KLIENTAI`
--

CREATE TABLE `KLIENTAI` (
  `vardas` varchar(255) NOT NULL,
  `pavarde` varchar(255) NOT NULL,
  `asmens_kodas` bigint(20) NOT NULL,
  `dokumentas` int(11) NOT NULL,
  `id_` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Sukurta duomenų kopija lentelei `KLIENTAI`
--

INSERT INTO `KLIENTAI` (`vardas`, `pavarde`, `asmens_kodas`, `dokumentas`, `id_`) VALUES
('Dacie', 'Franzonello', 44465538838, 2, 1),
('Nolan', 'Dobbinson', 41026034628, 2, 2),
('Marsh', 'Ortega', 43298393498, 2, 3),
('Hammad', 'Creamen', 42773278748, 2, 4),
('Corena', 'Seiffert', 40043888064, 1, 5),
('Sloan', 'Ganing', 45487874864, 1, 6),
('Harriett', 'Lapidus', 41563770002, 2, 7),
('Delcina', 'Blockwell', 41380409093, 1, 8),
('Reinhard', 'Mickelwright', 41731241161, 2, 9),
('Lowe', 'Kestin', 41144170386, 1, 10),
('Orland', 'Longstreet', 44349225522, 1, 11),
('Modesty', 'Fullerd', 43065749581, 1, 12),
('Ulick', 'Schusterl', 43214354446, 1, 13),
('Monica', 'Hamblin', 45300676969, 2, 14),
('Levon', 'Stroyan', 49696700030, 1, 15),
('Kellyann', 'Ommundsen', 40067353919, 2, 16),
('Georgetta', 'Diaper', 46878939539, 2, 17),
('Rebe', 'Fellos', 47160994122, 2, 18),
('Rhett', 'Phizackarley', 48627407173, 2, 19),
('Giorgia', 'Warrell', 40588565725, 2, 20),
('Janenna', 'Digger', 41872908925, 1, 21),
('Jessey', 'Tebbutt', 46271783809, 2, 22),
('Hi', 'Birbeck', 42557504030, 1, 23),
('Dniren', 'Pedlow', 47081610610, 1, 24),
('Anabella', 'Gave', 40960786903, 2, 25),
('Tabbi', 'Billingham', 45338377233, 1, 26),
('Werner', 'Girkins', 47594927782, 2, 27),
('Juliana', 'Outhwaite', 43555210191, 2, 28),
('Flynn', 'Lutas', 44828705646, 1, 29),
('Wyndham', 'Lyles', 47243155523, 1, 30);

-- --------------------------------------------------------

--
-- Sukurta duomenų struktūra lentelei `KOMPIUTERIO_BUSENA`
--

CREATE TABLE `KOMPIUTERIO_BUSENA` (
  `id_` int(11) NOT NULL DEFAULT 0,
  `name` char(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Sukurta duomenų kopija lentelei `KOMPIUTERIO_BUSENA`
--

INSERT INTO `KOMPIUTERIO_BUSENA` (`id_`, `name`) VALUES
(1, 'Sutvarkytas'),
(2, 'Tvarkomas');

-- --------------------------------------------------------

--
-- Sukurta duomenų struktūra lentelei `LYTIS`
--

CREATE TABLE `LYTIS` (
  `id_` int(11) NOT NULL DEFAULT 0,
  `name` char(7) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Sukurta duomenų kopija lentelei `LYTIS`
--

INSERT INTO `LYTIS` (`id_`, `name`) VALUES
(1, 'vyras'),
(2, 'moteris');

-- --------------------------------------------------------

--
-- Sukurta duomenų struktūra lentelei `PALIKTI_KOMPIUTERIAI`
--

CREATE TABLE `PALIKTI_KOMPIUTERIAI` (
  `modelis` varchar(255) NOT NULL,
  `data` date NOT NULL,
  `gedimo_aprasymas` varchar(255) DEFAULT NULL,
  `marke` varchar(255) NOT NULL,
  `busena` int(11) NOT NULL,
  `id_` int(11) NOT NULL,
  `fk_DARBUOTOJAS` int(11) NOT NULL,
  `fk_UZSAKYMAS` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Sukurta duomenų kopija lentelei `PALIKTI_KOMPIUTERIAI`
--

INSERT INTO `PALIKTI_KOMPIUTERIAI` (`modelis`, `data`, `gedimo_aprasymas`, `marke`, `busena`, `id_`, `fk_DARBUOTOJAS`, `fk_UZSAKYMAS`) VALUES
('asus', '2018-05-24', 'broken pc fan', 'Dermamine', 1, 1, 5, 1),
('acer', '2018-07-04', 'random beeping from pc', 'Red Mulberry', 2, 2, 6, 2),
('asus', '2018-10-20', 'cant turn on pc', 'FLUARIX QUADRIVALENT', 1, 3, 28, 3),
('msi', '2018-07-12', 'random beeping from pc', 'Diphenhydramine HCl and Zinc Acetate', 2, 4, 10, 4),
('acer', '2018-09-22', 'cant turn on pc', 'Topcare Sinus Relief', 2, 5, 18, 5),
('asus', '2018-10-16', 'broken pc fan', 'Prochlorperazine Maleate', 1, 6, 12, 6),
('msi', '2018-10-16', 'random beeping from pc', 'Metronidazole', 2, 7, 29, 7),
('acer', '2018-09-13', 'cant turn on pc', 'Pantoprazole Sodium', 1, 8, 16, 8),
('acer', '2019-01-10', 'broken pc fan', 'Amlodipine Besylate and Benazepril Hydrochloride', 2, 9, 5, 9),
('msi', '2018-12-25', 'random beeping from pc', 'Clean and Clear Essentials Deep Cleaning Toner', 1, 10, 10, 10),
('msi', '2018-07-27', 'cant turn on pc', 'LEADER Povidone - Iodine', 1, 11, 18, 11),
('asus', '2018-11-22', 'random beeping from pc', 'Ranitidine', 1, 12, 4, 12),
('msi', '2018-08-10', 'random beeping from pc', 'Spironolactone and Hydrochlorothiazide', 1, 13, 14, 13),
('acer', '2019-01-27', 'cant turn on pc', 'Chaetomium', 2, 14, 13, 14),
('asus', '2018-12-22', 'random beeping from pc', 'Fludrocortisone Acetate', 1, 15, 5, 15),
('msi', '2018-04-02', 'random beeping from pc', 'Camptosar', 2, 16, 25, 16),
('msi', '2018-07-11', 'broken pc fan', 'Porcelana Day Skin Lightening', 2, 17, 23, 17),
('asus', '2018-05-04', 'gpu is not authtorised', 'Childrens Ibuprofen 100', 2, 18, 7, 18),
('msi', '2018-11-19', 'cpu doesnt work', 'Atenolol', 2, 19, 15, 19),
('asus', '2018-06-01', 'cant turn on pc', 'Warfarin Sodium', 2, 20, 2, 20),
('acer', '2018-12-20', 'random beeping from pc', 'Claritose', 2, 21, 12, 21),
('msi', '2018-08-13', 'gpu is not authtorised', 'Topical Anesthetic', 1, 22, 20, 22),
('asus', '2018-07-07', 'broken pc fan', 'Being Well Extra Strength Menthol Heat', 1, 23, 9, 23),
('msi', '2018-04-23', 'gpu is not authtorised', 'Ranitidine Hydrochloride', 1, 24, 3, 24),
('asus', '2018-07-08', 'cpu doesnt work', 'Claravis', 2, 25, 16, 25),
('msi', '2018-06-22', 'cant turn on pc', 'RISPERDAL', 2, 26, 22, 26),
('msi', '2018-07-21', 'cant turn on pc', 'LEADER Cough Drops Menthol Flavor', 2, 27, 17, 27),
('asus', '2018-07-16', 'broken pc fan', 'Buttermilk Time Frame Future Resist Foundation Broad Spectrum SPF 20', 2, 28, 8, 28),
('acer', '2019-02-20', 'cant turn on pc', 'Penicillin V Potassium', 1, 29, 25, 29),
('msi', '2018-04-04', 'broken pc fan', 'Kimvent Oral Care Toothbrush pack', 2, 30, 28, 30);

-- --------------------------------------------------------

--
-- Sukurta duomenų struktūra lentelei `PARDUOTUVES`
--

CREATE TABLE `PARDUOTUVES` (
  `salis` varchar(255) NOT NULL,
  `miestas` varchar(255) NOT NULL,
  `adresas` varchar(255) NOT NULL,
  `rajonas` varchar(255) NOT NULL,
  `pasto_kodas` varchar(255) NOT NULL,
  `id_` int(11) NOT NULL,
  `fk_SAVININKAS` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Sukurta duomenų kopija lentelei `PARDUOTUVES`
--

INSERT INTO `PARDUOTUVES` (`salis`, `miestas`, `adresas`, `rajonas`, `pasto_kodas`, `id_`, `fk_SAVININKAS`) VALUES
('United States', 'Tallahassee', '525 Sachtjen Way', 'Florida', '32304', 1, 0),
('United States', 'Saint Paul', '9 Clyde Gallagher Pass', 'Minnesota', '55146', 2, 0),
('United States', 'Peoria', '2 Sutherland Circle', 'Illinois', '61605', 3, 0),
('United States', 'Savannah', '145 Loomis Trail', 'Georgia', '31416', 4, 0),
('United States', 'New York City', '7968 Petterle Plaza', 'New York', '10249', 5, 0),
('United States', 'Pittsburgh', '81592 8th Street', 'Pennsylvania', '15235', 6, 0),
('United States', 'New York City', '0976 Mcguire Street', 'New York', '10184', 7, 0),
('United States', 'Jeffersonville', '86 Autumn Leaf Avenue', 'Indiana', '47134', 8, 0),
('United States', 'Memphis', '3 Anhalt Court', 'Tennessee', '38161', 9, 0),
('United States', 'Fort Lauderdale', '865 Village Green Road', 'Florida', '33355', 10, 0),
('United States', 'Stockton', '30257 Menomonie Point', 'California', '95219', 11, 0),
('United States', 'Houston', '7310 Grasskamp Place', 'Texas', '77010', 12, 0),
('United States', 'Syracuse', '5021 Merchant Terrace', 'New York', '13224', 13, 0),
('United States', 'Portland', '689 Union Road', 'Oregon', '97206', 14, 0),
('United States', 'Metairie', '1 Corry Hill', 'Louisiana', '70005', 15, 0),
('United States', 'Longview', '468 Ilene Alley', 'Texas', '75605', 16, 0),
('United States', 'Fargo', '11182 Summerview Court', 'North Dakota', '58122', 17, 0),
('United States', 'Orange', '22 Northview Center', 'California', '92862', 18, 0),
('United States', 'San Jose', '59716 Carioca Street', 'California', '95160', 19, 0),
('United States', 'Omaha', '72 Grim Crossing', 'Nebraska', '68117', 20, 0),
('United States', 'Delray Beach', '4252 Eastlawn Place', 'Florida', '33448', 21, 0),
('United States', 'South Bend', '31684 Rockefeller Junction', 'Indiana', '46614', 22, 0),
('United States', 'Houston', '330 Dixon Road', 'Texas', '77040', 23, 0),
('United States', 'Fort Wayne', '27 Stang Terrace', 'Indiana', '46814', 24, 0),
('United States', 'Saint Cloud', '14571 Kenwood Terrace', 'Minnesota', '56372', 25, 0),
('United States', 'Hattiesburg', '07902 Debs Avenue', 'Mississippi', '39404', 26, 0),
('United States', 'Raleigh', '06 Fallview Avenue', 'North Carolina', '27626', 27, 0),
('United States', 'Cheyenne', '51 Stang Drive', 'Wyoming', '82007', 28, 0),
('United States', 'Richmond', '2 Del Sol Trail', 'Virginia', '23237', 29, 0),
('United States', 'Newport Beach', '843 Darwin Lane', 'California', '92662', 30, 0),
('LIETUVA', 'KAUNAS', 'K MINDAUGO PR', 'CENTRAS', '443321', 31, 0);

-- --------------------------------------------------------

--
-- Sukurta duomenų struktūra lentelei `POZICIJOS_TIPAS`
--

CREATE TABLE `POZICIJOS_TIPAS` (
  `id_` int(11) NOT NULL DEFAULT 0,
  `name` char(23) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Sukurta duomenų kopija lentelei `POZICIJOS_TIPAS`
--

INSERT INTO `POZICIJOS_TIPAS` (`id_`, `name`) VALUES
(1, 'direktorius'),
(2, 'kompiuteriu_tvarkytojas'),
(3, 'kasininkas'),
(4, 'pagalbinis_darbuotojas');

-- --------------------------------------------------------

--
-- Sukurta duomenų struktūra lentelei `PRODUKTAI`
--

CREATE TABLE `PRODUKTAI` (
  `pavadinimas` varchar(255) NOT NULL,
  `pagaminimo_data` date NOT NULL,
  `bar_kodas` varchar(255) NOT NULL,
  `id_` int(11) NOT NULL,
  `fk_UZSAKYMAS` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Sukurta duomenų kopija lentelei `PRODUKTAI`
--

INSERT INTO `PRODUKTAI` (`pavadinimas`, `pagaminimo_data`, `bar_kodas`, `id_`, `fk_UZSAKYMAS`) VALUES
('usb 16gb kingston', '2018-08-01', '60429-286', 1, 31),
('mouse pad 50x50', '2019-02-06', '64117-220', 2, 32),
('usb 16gb kingston', '2018-11-21', '44911-0087', 3, 33),
('mouse pad 50x50', '2018-06-14', '36987-2654', 4, 34),
('usb 16gb kingston', '2018-05-31', '47781-308', 5, 35),
('steelseeries apexm500 keyboard', '2018-06-28', '63672-0051', 6, 36),
('mouse pad 50x50', '2018-05-27', '61941-0041', 7, 37),
('usb 16gb kingston', '2018-05-31', '0641-6020', 8, 38),
('steelseeries apexm500 keyboard', '2018-12-02', '62011-0152', 9, 39),
('mouse pad 50x50', '2019-01-06', '37808-873', 10, 40),
('usb 16gb kingston', '2018-07-05', '60681-7001', 11, 41),
('steelseeries apexm500 keyboard', '2018-08-24', '65517-0016', 12, 42),
('usb 16gb kingston', '2018-04-15', '68113-996', 13, 43),
('steelseeries apexm500 keyboard', '2018-07-11', '21695-995', 14, 44),
('mouse pad 50x50', '2018-07-22', '76189-535', 15, 45),
('usb 16gb kingston', '2018-04-15', '60429-305', 16, 46),
('mouse pad 50x50', '2018-10-24', '0019-1324', 17, 47),
('usb 16gb kingston', '2018-06-12', '52244-020', 18, 48),
('steelseeries apexm500 keyboard', '2018-03-22', '21695-210', 19, 49),
('usb 16gb kingston', '2018-05-27', '54569-0409', 20, 50),
('mouse pad 50x50', '2018-04-02', '0884-8411', 21, 51),
('mouse pad 50x50', '2018-03-16', '52862-013', 22, 52),
('usb 16gb kingston', '2018-03-26', '52862-001', 23, 53),
('steelseeries apexm500 keyboard', '2018-12-21', '14783-095', 24, 54),
('mouse pad 50x50', '2018-12-07', '63629-3210', 25, 55),
('usb 16gb kingston', '2018-07-19', '0363-0201', 26, 56),
('mouse pad 50x50', '2019-02-25', '64725-1324', 27, 57),
('usb 16gb kingston', '2019-02-05', '55301-226', 28, 58),
('steelseeries apexm500 keyboard', '2018-12-19', '21695-363', 29, 59),
('usb 16gb kingston', '2019-02-27', '24338-106', 30, 60);

-- --------------------------------------------------------

--
-- Sukurta duomenų struktūra lentelei `SAVININKAI`
--

CREATE TABLE `SAVININKAI` (
  `vardas` varchar(255) NOT NULL,
  `pavarde` varchar(255) NOT NULL,
  `asmens_kodas` bigint(20) NOT NULL,
  `banko_saskaita` varchar(255) NOT NULL,
  `lytis` varchar(255) NOT NULL,
  `adresas` varchar(255) NOT NULL,
  `id_` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Sukurta duomenų kopija lentelei `SAVININKAI`
--

INSERT INTO `SAVININKAI` (`vardas`, `pavarde`, `asmens_kodas`, `banko_saskaita`, `lytis`, `adresas`, `id_`) VALUES
('Valentinas', 'Kasteckis', 39809160616, 'LT000000000001', 'Vyras', 'Vilniaus g. 24-66', 0),
('Henrikas', 'JÄ—zus', 329855484, 'LT455474', 'Vyras', '15 barakas', 1),
('Elyga', 'Kiudys', 328468464684, 'LT5465464', 'Vyras', '2 barakas', 2);

-- --------------------------------------------------------

--
-- Sukurta duomenų struktūra lentelei `TRANSPORTAI`
--

CREATE TABLE `TRANSPORTAI` (
  `marke` varchar(255) NOT NULL,
  `modelis` varchar(255) NOT NULL,
  `numeriai` varchar(255) NOT NULL,
  `pagaminimo_data` date NOT NULL,
  `id_` int(11) NOT NULL,
  `fk_DARBUOTOJAS` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Sukurta duomenų kopija lentelei `TRANSPORTAI`
--

INSERT INTO `TRANSPORTAI` (`marke`, `modelis`, `numeriai`, `pagaminimo_data`, `id_`, `fk_DARBUOTOJAS`) VALUES
('Toyota', 'Sienna', '856601', '1631-06-18', 1, 1),
('GMC', 'Vandura 2500', '990604', '1272-10-16', 2, 2),
('BMW', '6 Series', '223121', '1309-03-02', 3, 3),
('Volkswagen', 'Cabriolet', '371648', '1464-05-04', 4, 4),
('BMW', '3 Series', '502732', '0501-11-29', 5, 5),
('Volkswagen', 'Passat', '271858', '1222-06-16', 6, 6),
('Subaru', 'Forester', '923426', '0517-09-19', 7, 7),
('Buick', 'Century', '612518', '0397-07-07', 8, 8),
('GMC', 'Savana 3500', '686519', '1809-01-03', 9, 9),
('Mitsubishi', 'Truck', '937009', '1566-06-12', 10, 10),
('Chevrolet', 'Suburban 2500', '102415', '1716-01-19', 11, 11),
('Jeep', 'Cherokee', '483916', '1148-01-05', 12, 12),
('GMC', 'Rally Wagon 3500', '246792', '1139-01-22', 13, 13),
('Subaru', 'Leone', '852938', '1625-11-30', 14, 14),
('GMC', 'Rally Wagon 3500', '955344', '1216-02-08', 15, 15),
('Volvo', '960', '556958', '1158-09-21', 16, 16),
('Saab', '900', '463447', '1941-04-12', 17, 17),
('Porsche', 'Cayman', '212089', '1326-05-03', 18, 18),
('Cadillac', 'STS', '647797', '1557-08-04', 19, 19);

-- --------------------------------------------------------

--
-- Sukurta duomenų struktūra lentelei `TRANSPORTO_DEFEKTAI`
--

CREATE TABLE `TRANSPORTO_DEFEKTAI` (
  `defektas` varchar(255) NOT NULL,
  `defekto_data` varchar(255) NOT NULL,
  `id_` int(11) NOT NULL,
  `fk_TRANSPORTAS` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Sukurta duomenų kopija lentelei `TRANSPORTO_DEFEKTAI`
--

INSERT INTO `TRANSPORTO_DEFEKTAI` (`defektas`, `defekto_data`, `id_`, `fk_TRANSPORTAS`) VALUES
('broken lamp', '2018-07-01', 1, 4),
('exploded air bag', '2019-02-24', 2, 3),
('broken lamp', '2018-12-05', 3, 6),
('turn signal is not bright', '2018-05-11', 4, 18),
('left tire is loose', '2018-07-23', 6, 11),
('broken lamp', '2018-12-28', 7, 16),
('left tire is loose', '2019-02-14', 8, 6),
('exploded air bag', '2018-08-04', 9, 2),
('turn signal is not bright', '2018-06-22', 10, 17),
('broken lamp', '2018-04-01', 11, 9),
('exploded air bag', '2018-03-25', 12, 7),
('left tire is loose', '2018-04-14', 13, 2),
('broken lamp', '2018-08-15', 14, 6),
('turn signal is not bright', '2019-02-09', 15, 3),
('left tire is loose', '2018-11-19', 16, 19),
('turn signal is not bright', '2018-11-18', 17, 16),
('exploded air bag', '2018-09-19', 18, 19),
('exploded air bag', '2018-08-11', 19, 5),
('turn signal is not bright', '2018-05-15', 20, 18);

-- --------------------------------------------------------

--
-- Sukurta duomenų struktūra lentelei `UZSAKYMAI`
--

CREATE TABLE `UZSAKYMAI` (
  `sutarties_nr` int(11) NOT NULL,
  `kaina` double NOT NULL,
  `avansas` double NOT NULL,
  `papildoma_info` varchar(255) DEFAULT NULL,
  `tipas` int(11) NOT NULL,
  `fk_KLIENTAS` int(11) NOT NULL,
  `fk_DARBUOTOJAS` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Sukurta duomenų kopija lentelei `UZSAKYMAI`
--

INSERT INTO `UZSAKYMAI` (`sutarties_nr`, `kaina`, `avansas`, `papildoma_info`, `tipas`, `fk_KLIENTAS`, `fk_DARBUOTOJAS`) VALUES
(1, 64, 18, '1', 1, 16, 14),
(2, 61, 14, '2', 1, 22, 1),
(3, 44, 14, '3', 1, 28, 4),
(4, 57, 13, '4', 1, 18, 22),
(5, 93, 13, '5', 1, 25, 18),
(6, 96, 15, '6', 1, 27, 7),
(7, 21, 12, '7', 1, 13, 14),
(8, 74, 12, '8', 1, 9, 6),
(9, 34, 11, '9', 1, 13, 5),
(10, 64, 19, '10', 1, 24, 17),
(11, 36, 11, '11', 1, 10, 1),
(12, 69, 17, '12', 1, 5, 21),
(13, 72, 15, '13', 1, 28, 10),
(14, 89, 15, '14', 1, 11, 5),
(15, 86, 15, '15', 1, 28, 12),
(16, 34, 11, '16', 1, 19, 20),
(17, 46, 11, '17', 1, 21, 8),
(18, 77, 10, '18', 1, 14, 26),
(19, 59, 20, '19', 1, 26, 26),
(20, 69, 20, '20', 1, 26, 22),
(21, 32, 10, '21', 1, 15, 22),
(22, 55, 14, '22', 1, 19, 4),
(23, 84, 12, '23', 1, 15, 11),
(24, 31, 13, '24', 1, 23, 23),
(25, 52, 17, '25', 1, 27, 17),
(26, 62, 13, '26', 1, 28, 27),
(27, 57, 19, '27', 1, 15, 20),
(28, 93, 13, '28', 1, 14, 15),
(29, 41, 14, '29', 1, 20, 15),
(30, 51, 10, '30', 1, 29, 28),
(31, 51, 13, '1', 2, 6, 8),
(32, 71, 10, '2', 2, 1, 26),
(33, 37, 20, '3', 2, 17, 10),
(34, 33, 19, '4', 2, 17, 17),
(35, 38, 19, '5', 2, 26, 16),
(36, 44, 17, '6', 2, 5, 13),
(37, 47, 14, '7', 2, 12, 24),
(38, 26, 12, '8', 2, 30, 19),
(39, 90, 16, '9', 2, 8, 19),
(40, 28, 20, '10', 2, 20, 1),
(41, 21, 15, '11', 2, 1, 19),
(42, 69, 18, '12', 2, 29, 18),
(43, 92, 14, '13', 2, 22, 11),
(44, 56, 12, '14', 2, 29, 29),
(45, 29, 12, '15', 2, 10, 14),
(46, 60, 14, '16', 2, 1, 14),
(47, 48, 13, '17', 2, 1, 17),
(48, 58, 17, '18', 2, 12, 26),
(49, 79, 13, '19', 2, 17, 19),
(50, 59, 16, '20', 2, 15, 29),
(51, 55, 20, '21', 2, 15, 19),
(52, 63, 20, '22', 2, 14, 16),
(53, 24, 20, '23', 2, 7, 8),
(54, 20, 10, '24', 2, 8, 26),
(55, 96, 18, '25', 2, 21, 24),
(56, 44, 15, '26', 2, 30, 21),
(57, 59, 20, '27', 2, 14, 1),
(58, 86, 15, '28', 2, 28, 9),
(59, 29, 12, '29', 2, 25, 10),
(60, 89, 11, '30', 2, 16, 27);

-- --------------------------------------------------------

--
-- Sukurta duomenų struktūra lentelei `UZSAKYMO_TIPAS`
--

CREATE TABLE `UZSAKYMO_TIPAS` (
  `id_` int(11) NOT NULL DEFAULT 0,
  `name` char(27) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Sukurta duomenų kopija lentelei `UZSAKYMO_TIPAS`
--

INSERT INTO `UZSAKYMO_TIPAS` (`id_`, `name`) VALUES
(1, 'kompiuterio_taisymas'),
(2, 'aparatines_irangos_pirkimas');

-- --------------------------------------------------------

--
-- Sukurta duomenų struktūra lentelei `UZSAKYTOS_DETALES`
--

CREATE TABLE `UZSAKYTOS_DETALES` (
  `pavadinimas` varchar(255) NOT NULL,
  `kaina` double NOT NULL,
  `busena` int(11) NOT NULL,
  `id_` int(11) NOT NULL,
  `fk_PALIKTAS_KOMPIUTERIS` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Sukurta duomenų kopija lentelei `UZSAKYTOS_DETALES`
--

INSERT INTO `UZSAKYTOS_DETALES` (`pavadinimas`, `kaina`, `busena`, `id_`, `fk_PALIKTAS_KOMPIUTERIS`) VALUES
('psu 600w', 97, 2, 1, 1),
('i5 2140', 154, 2, 2, 2),
('psu 600w', 64, 3, 3, 3),
('i5 2140', 49, 3, 4, 4),
('i5 2140', 145, 3, 5, 5),
('i5 2140', 94, 2, 6, 6),
('gtx 960 4gb', 118, 3, 7, 7),
('psu 450w', 87, 1, 8, 8),
('psu 600w', 111, 1, 9, 9),
('i5 2140', 43, 2, 10, 10),
('gtx 960 4gb', 10, 1, 11, 11),
('psu 450w', 131, 3, 12, 12),
('i5 2140', 62, 1, 13, 13),
('psu 450w', 94, 3, 14, 14),
('psu 600w', 128, 1, 15, 15),
('psu 450w', 80, 2, 16, 16),
('gtx 960 4gb', 78, 1, 17, 17),
('psu 600w', 108, 2, 18, 18),
('psu 450w', 118, 3, 19, 19),
('psu 600w', 135, 2, 20, 20),
('psu 450w', 20, 3, 21, 21),
('psu 600w', 74, 2, 22, 22),
('psu 450w', 49, 2, 23, 23),
('psu 600w', 49, 1, 24, 24),
('gtx 960 4gb', 127, 3, 25, 25),
('gtx 960 4gb', 81, 1, 26, 26),
('psu 450w', 68, 2, 27, 27),
('psu 600w', 10, 2, 28, 28),
('psu 450w', 180, 2, 29, 29),
('psu 600w', 62, 1, 30, 30);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `DARBO_SUTARTYS`
--
ALTER TABLE `DARBO_SUTARTYS`
  ADD PRIMARY KEY (`sutarties_numeris`),
  ADD UNIQUE KEY `fk_DARBUOTOJAS` (`fk_DARBUOTOJAS`),
  ADD KEY `dokumentas` (`dokumentas`);

--
-- Indexes for table `DARBUOTOJAI`
--
ALTER TABLE `DARBUOTOJAI`
  ADD PRIMARY KEY (`id_`),
  ADD KEY `lytis` (`lytis`),
  ADD KEY `pozicija` (`pozicija`),
  ADD KEY `_2` (`fk_PARDUOTUVE`);

--
-- Indexes for table `DETALES_BUSENA`
--
ALTER TABLE `DETALES_BUSENA`
  ADD PRIMARY KEY (`id_`);

--
-- Indexes for table `DOKUMENTAS`
--
ALTER TABLE `DOKUMENTAS`
  ADD PRIMARY KEY (`id_`);

--
-- Indexes for table `FIRMOS`
--
ALTER TABLE `FIRMOS`
  ADD PRIMARY KEY (`id_`),
  ADD UNIQUE KEY `fk_PRODUKTAS` (`fk_PRODUKTAS`);

--
-- Indexes for table `KATEGORIJOS`
--
ALTER TABLE `KATEGORIJOS`
  ADD PRIMARY KEY (`id_`),
  ADD UNIQUE KEY `fk_PRODUKTAS` (`fk_PRODUKTAS`);

--
-- Indexes for table `KLIENTAI`
--
ALTER TABLE `KLIENTAI`
  ADD PRIMARY KEY (`id_`),
  ADD KEY `dokumentas` (`dokumentas`);

--
-- Indexes for table `KOMPIUTERIO_BUSENA`
--
ALTER TABLE `KOMPIUTERIO_BUSENA`
  ADD PRIMARY KEY (`id_`);

--
-- Indexes for table `LYTIS`
--
ALTER TABLE `LYTIS`
  ADD PRIMARY KEY (`id_`);

--
-- Indexes for table `PALIKTI_KOMPIUTERIAI`
--
ALTER TABLE `PALIKTI_KOMPIUTERIAI`
  ADD PRIMARY KEY (`id_`),
  ADD KEY `busena` (`busena`),
  ADD KEY `_6` (`fk_DARBUOTOJAS`);

--
-- Indexes for table `PARDUOTUVES`
--
ALTER TABLE `PARDUOTUVES`
  ADD PRIMARY KEY (`id_`),
  ADD KEY `_1` (`fk_SAVININKAS`);

--
-- Indexes for table `POZICIJOS_TIPAS`
--
ALTER TABLE `POZICIJOS_TIPAS`
  ADD PRIMARY KEY (`id_`);

--
-- Indexes for table `PRODUKTAI`
--
ALTER TABLE `PRODUKTAI`
  ADD PRIMARY KEY (`id_`),
  ADD KEY `_7` (`fk_UZSAKYMAS`);

--
-- Indexes for table `SAVININKAI`
--
ALTER TABLE `SAVININKAI`
  ADD PRIMARY KEY (`id_`);

--
-- Indexes for table `TRANSPORTAI`
--
ALTER TABLE `TRANSPORTAI`
  ADD PRIMARY KEY (`id_`),
  ADD UNIQUE KEY `fk_DARBUOTOJAS` (`fk_DARBUOTOJAS`);

--
-- Indexes for table `TRANSPORTO_DEFEKTAI`
--
ALTER TABLE `TRANSPORTO_DEFEKTAI`
  ADD PRIMARY KEY (`id_`),
  ADD KEY `_8` (`fk_TRANSPORTAS`);

--
-- Indexes for table `UZSAKYMAI`
--
ALTER TABLE `UZSAKYMAI`
  ADD PRIMARY KEY (`sutarties_nr`),
  ADD KEY `tipas` (`tipas`),
  ADD KEY `_5` (`fk_KLIENTAS`);

--
-- Indexes for table `UZSAKYMO_TIPAS`
--
ALTER TABLE `UZSAKYMO_TIPAS`
  ADD PRIMARY KEY (`id_`);

--
-- Indexes for table `UZSAKYTOS_DETALES`
--
ALTER TABLE `UZSAKYTOS_DETALES`
  ADD PRIMARY KEY (`id_`),
  ADD KEY `busena` (`busena`),
  ADD KEY `_11` (`fk_PALIKTAS_KOMPIUTERIS`);

--
-- Apribojimai eksportuotom lentelėm
--

--
-- Apribojimai lentelei `DARBO_SUTARTYS`
--
ALTER TABLE `DARBO_SUTARTYS`
  ADD CONSTRAINT `DARBO_SUTARTYS_ibfk_1` FOREIGN KEY (`dokumentas`) REFERENCES `DOKUMENTAS` (`id_`),
  ADD CONSTRAINT `_3` FOREIGN KEY (`fk_DARBUOTOJAS`) REFERENCES `DARBUOTOJAI` (`id_`);

--
-- Apribojimai lentelei `DARBUOTOJAI`
--
ALTER TABLE `DARBUOTOJAI`
  ADD CONSTRAINT `DARBUOTOJAI_ibfk_1` FOREIGN KEY (`lytis`) REFERENCES `LYTIS` (`id_`),
  ADD CONSTRAINT `DARBUOTOJAI_ibfk_2` FOREIGN KEY (`pozicija`) REFERENCES `POZICIJOS_TIPAS` (`id_`),
  ADD CONSTRAINT `_2` FOREIGN KEY (`fk_PARDUOTUVE`) REFERENCES `PARDUOTUVES` (`id_`);

--
-- Apribojimai lentelei `FIRMOS`
--
ALTER TABLE `FIRMOS`
  ADD CONSTRAINT `_9` FOREIGN KEY (`fk_PRODUKTAS`) REFERENCES `PRODUKTAI` (`id_`);

--
-- Apribojimai lentelei `KATEGORIJOS`
--
ALTER TABLE `KATEGORIJOS`
  ADD CONSTRAINT `_10` FOREIGN KEY (`fk_PRODUKTAS`) REFERENCES `PRODUKTAI` (`id_`);

--
-- Apribojimai lentelei `KLIENTAI`
--
ALTER TABLE `KLIENTAI`
  ADD CONSTRAINT `KLIENTAI_ibfk_1` FOREIGN KEY (`dokumentas`) REFERENCES `DOKUMENTAS` (`id_`);

--
-- Apribojimai lentelei `PALIKTI_KOMPIUTERIAI`
--
ALTER TABLE `PALIKTI_KOMPIUTERIAI`
  ADD CONSTRAINT `PALIKTI_KOMPIUTERIAI_ibfk_1` FOREIGN KEY (`busena`) REFERENCES `KOMPIUTERIO_BUSENA` (`id_`),
  ADD CONSTRAINT `_6` FOREIGN KEY (`fk_DARBUOTOJAS`) REFERENCES `DARBUOTOJAI` (`id_`);

--
-- Apribojimai lentelei `PARDUOTUVES`
--
ALTER TABLE `PARDUOTUVES`
  ADD CONSTRAINT `_1` FOREIGN KEY (`fk_SAVININKAS`) REFERENCES `SAVININKAI` (`id_`);

--
-- Apribojimai lentelei `PRODUKTAI`
--
ALTER TABLE `PRODUKTAI`
  ADD CONSTRAINT `_7` FOREIGN KEY (`fk_UZSAKYMAS`) REFERENCES `UZSAKYMAI` (`sutarties_nr`);

--
-- Apribojimai lentelei `TRANSPORTAI`
--
ALTER TABLE `TRANSPORTAI`
  ADD CONSTRAINT `_4` FOREIGN KEY (`fk_DARBUOTOJAS`) REFERENCES `DARBUOTOJAI` (`id_`);

--
-- Apribojimai lentelei `TRANSPORTO_DEFEKTAI`
--
ALTER TABLE `TRANSPORTO_DEFEKTAI`
  ADD CONSTRAINT `_8` FOREIGN KEY (`fk_TRANSPORTAS`) REFERENCES `TRANSPORTAI` (`id_`);

--
-- Apribojimai lentelei `UZSAKYMAI`
--
ALTER TABLE `UZSAKYMAI`
  ADD CONSTRAINT `UZSAKYMAI_ibfk_1` FOREIGN KEY (`tipas`) REFERENCES `UZSAKYMO_TIPAS` (`id_`),
  ADD CONSTRAINT `_5` FOREIGN KEY (`fk_KLIENTAS`) REFERENCES `KLIENTAI` (`id_`);

--
-- Apribojimai lentelei `UZSAKYTOS_DETALES`
--
ALTER TABLE `UZSAKYTOS_DETALES`
  ADD CONSTRAINT `UZSAKYTOS_DETALES_ibfk_1` FOREIGN KEY (`busena`) REFERENCES `DETALES_BUSENA` (`id_`),
  ADD CONSTRAINT `_11` FOREIGN KEY (`fk_PALIKTAS_KOMPIUTERIS`) REFERENCES `PALIKTI_KOMPIUTERIAI` (`id_`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
