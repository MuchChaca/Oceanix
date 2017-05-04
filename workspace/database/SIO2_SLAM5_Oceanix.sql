-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: May 02, 2017 at 12:07 PM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 7.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+03:30";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `SIO2_SLAM5_Oceanix`
--

-- --------------------------------------------------------

--
-- Table structure for table `Administrateur`
--

CREATE TABLE `Administrateur` (
  `login` varchar(255) NOT NULL,
  `mdp` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `Administrateur`
--

INSERT INTO `Administrateur` (`login`, `mdp`) VALUES
('admin', '$2y$10$zzpjv0quL7lRGJTL6T33v.qhEnRMK3SBgBg2DQK6Ln5HTV9Tm1tLq');

-- --------------------------------------------------------

--
-- Table structure for table `Bateau`
--

CREATE TABLE `Bateau` (
  `id` smallint(6) NOT NULL,
  `nom` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `Bateau`
--

INSERT INTO `Bateau` (`id`, `nom`) VALUES
(1, 'Al\' Xi'),
(2, 'Luce Isle'),
(3, 'Santa Cruz'),
(4, 'Medina'),
(5, 'Kor\' Ant'),
(6, 'Minerva'),
(7, 'Ar Solen'),
(8, 'Tropico'),
(10, 'Riviera'),
(11, 'MaÃ«llys'),
(12, 'Petit mousse'),
(13, 'Beautoo'),
(16, 'Un petit bateau'),
(18, 'MonPetitBateauTropGrand'),
(19, 'Pourquoi Pas'),
(20, 'Ca marche ?'),
(21, 'ou pas');

-- --------------------------------------------------------

--
-- Table structure for table `Enregistrer`
--

CREATE TABLE `Enregistrer` (
  `numReserv` smallint(6) NOT NULL,
  `lettreCateg` varchar(1) NOT NULL,
  `numType` smallint(6) NOT NULL,
  `quantite` smallint(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `Enregistrer`
--

INSERT INTO `Enregistrer` (`numReserv`, `lettreCateg`, `numType`, `quantite`) VALUES
(18, 'A', 1, 2),
(18, 'A', 2, 1),
(18, 'A', 3, 2),
(18, 'B', 1, 1),
(18, 'C', 2, 1),
(19, 'A', 1, 2),
(19, 'A', 2, 1),
(19, 'A', 3, 2),
(19, 'B', 2, 1),
(20, 'A', 1, 1),
(20, 'A', 2, 2),
(20, 'A', 3, 3),
(20, 'B', 1, 4),
(20, 'C', 1, 3),
(20, 'C', 2, 2),
(20, 'C', 3, 1),
(21, 'A', 2, 1),
(21, 'A', 3, 2),
(21, 'B', 1, 1),
(21, 'C', 1, 4),
(22, 'A', 1, 1),
(22, 'A', 2, 2),
(22, 'A', 3, 3),
(22, 'B', 1, 2),
(22, 'B', 2, 1),
(22, 'C', 2, 2),
(22, 'C', 3, 2),
(23, 'G', 0, 8),
(24, 'A', 1, 2),
(24, 'A', 2, 1),
(24, 'C', 1, 1),
(25, 'A', 2, 2),
(25, 'A', 3, 2),
(26, 'A', 1, 2),
(26, 'A', 2, 2),
(26, 'A', 3, 1),
(27, 'A', 1, 2),
(27, 'A', 2, 2),
(27, 'A', 3, 2),
(27, 'B', 1, 1),
(28, 'A', 1, 2),
(28, 'A', 2, 2),
(28, 'A', 3, 2),
(29, 'A', 1, 1),
(29, 'A', 2, 2),
(29, 'A', 3, 2),
(29, 'B', 1, 2),
(29, 'B', 2, 2),
(30, 'A', 1, 1),
(30, 'A', 2, 2),
(30, 'A', 3, 2),
(30, 'B', 1, 2),
(30, 'B', 2, 2),
(30, 'C', 1, 2),
(30, 'C', 2, 2),
(30, 'C', 3, 2),
(31, 'A', 1, 1),
(31, 'A', 2, 2),
(31, 'A', 3, 2),
(31, 'B', 1, 2),
(31, 'B', 2, 2),
(31, 'C', 1, 2),
(31, 'C', 2, 2),
(31, 'C', 3, 2),
(32, 'A', 1, 1),
(32, 'B', 1, 1),
(32, 'B', 2, 1),
(32, 'C', 3, 1),
(21, 'A', 1, 1),
(21, 'A', 2, 1),
(21, 'C', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `Liaison`
--

CREATE TABLE `Liaison` (
  `code` varchar(10) NOT NULL,
  `idPortDep` smallint(6) NOT NULL,
  `idPortArr` smallint(6) NOT NULL,
  `distance` smallint(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `Liaison`
--

INSERT INTO `Liaison` (`code`, `idPortDep`, `idPortArr`, `distance`) VALUES
('LOC-QUI', 2, 1, 300),
('LP-QUI', 3, 1, 0),
('QUI-LOC', 1, 2, 0),
('QUI-LP', 1, 3, 100),
('QUI-QUI', 1, 1, 999),
('QUI-SAU', 1, 4, 0),
('SAU-QUI', 4, 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `Periode`
--

CREATE TABLE `Periode` (
  `dateDeb` date NOT NULL,
  `dateFin` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `Periode`
--

INSERT INTO `Periode` (`dateDeb`, `dateFin`) VALUES
('2015-09-01', '2016-06-15'),
('2016-06-16', '2016-09-15'),
('2016-09-16', '2017-05-31');

-- --------------------------------------------------------

--
-- Table structure for table `Port`
--

CREATE TABLE `Port` (
  `id` smallint(6) NOT NULL,
  `nom` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `Port`
--

INSERT INTO `Port` (`id`, `nom`) VALUES
(1, 'QUIBERON'),
(2, 'LOCMARIA'),
(3, 'LE PALAIS'),
(4, 'SAUZON');

-- --------------------------------------------------------

--
-- Table structure for table `Reservation`
--

CREATE TABLE `Reservation` (
  `num` smallint(6) NOT NULL,
  `nom` varchar(50) NOT NULL,
  `adr` varchar(50) NOT NULL,
  `cp` varchar(5) NOT NULL,
  `ville` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `Reservation`
--

INSERT INTO `Reservation` (`num`, `nom`, `adr`, `cp`, `ville`) VALUES
(18, 'Jean Mouloud', '52 AllÃ© de la libertÃ©e contrainte', '10510', 'CorÃ©eDuNord'),
(19, 'TIPREZ', '15 chemin des oliviers', '56 10', 'Lorient'),
(20, 'Monsieur Testeur', '123 rue des tests', '1234', 'SinTest'),
(21, 'Say My Name', 'heisenberoug', '12345', 'Cianow');

-- --------------------------------------------------------

--
-- Table structure for table `Tarifer`
--

CREATE TABLE `Tarifer` (
  `codeLiaison` varchar(10) NOT NULL,
  `dateDeb` date NOT NULL,
  `lettreCateg` varchar(1) NOT NULL,
  `numType` smallint(6) NOT NULL,
  `tarif` double(10,0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `Tarifer`
--

INSERT INTO `Tarifer` (`codeLiaison`, `dateDeb`, `lettreCateg`, `numType`, `tarif`) VALUES
('LOC-QUI', '2015-09-01', 'A', 1, 16),
('LOC-QUI', '2015-09-01', 'A', 2, 10),
('LOC-QUI', '2015-09-01', 'A', 3, 4),
('LOC-QUI', '2015-09-01', 'B', 1, 72),
('LOC-QUI', '2015-09-01', 'B', 2, 114),
('LOC-QUI', '2015-09-01', 'C', 1, 172),
('LOC-QUI', '2015-09-01', 'C', 2, 198),
('LOC-QUI', '2015-09-01', 'C', 3, 242),
('LOC-QUI', '2016-06-16', 'A', 1, 19),
('LOC-QUI', '2016-06-16', 'A', 2, 12),
('LOC-QUI', '2016-06-16', 'A', 3, 6),
('LOC-QUI', '2016-06-16', 'B', 1, 79),
('LOC-QUI', '2016-06-16', 'B', 2, 122),
('LOC-QUI', '2016-06-16', 'C', 1, 194),
('LOC-QUI', '2016-06-16', 'C', 2, 208),
('LOC-QUI', '2016-06-16', 'C', 3, 295),
('LOC-QUI', '2016-09-16', 'A', 1, 18),
('LOC-QUI', '2016-09-16', 'A', 2, 11),
('LOC-QUI', '2016-09-16', 'A', 3, 5),
('LOC-QUI', '2016-09-16', 'B', 1, 75),
('LOC-QUI', '2016-09-16', 'B', 2, 118),
('LOC-QUI', '2016-09-16', 'C', 1, 182),
('LOC-QUI', '2016-09-16', 'C', 2, 204),
('LOC-QUI', '2016-09-16', 'C', 3, 264),
('QUI-LP', '2015-09-01', 'A', 1, 18),
('QUI-LP', '2015-09-01', 'A', 2, 11),
('QUI-LP', '2015-09-01', 'A', 3, 6),
('QUI-LP', '2015-09-01', 'B', 1, 86),
('QUI-LP', '2015-09-01', 'B', 2, 129),
('QUI-LP', '2015-09-01', 'C', 1, 189),
('QUI-LP', '2015-09-01', 'C', 2, 205),
('QUI-LP', '2015-09-01', 'C', 3, 268),
('QUI-LP', '2016-06-16', 'A', 1, 20),
('QUI-LP', '2016-06-16', 'A', 3, 7),
('QUI-LP', '2016-06-16', 'B', 1, 95),
('QUI-LP', '2016-06-16', 'B', 2, 142),
('QUI-LP', '2016-06-16', 'C', 1, 208),
('QUI-LP', '2016-06-16', 'C', 2, 226),
('QUI-LP', '2016-06-16', 'C', 3, 295),
('QUI-LP', '2016-09-16', 'A', 1, 19),
('QUI-LP', '2016-09-16', 'A', 2, 12),
('QUI-LP', '2016-09-16', 'A', 3, 6),
('QUI-LP', '2016-09-16', 'B', 1, 91),
('QUI-LP', '2016-09-16', 'B', 2, 136),
('QUI-LP', '2016-09-16', 'C', 1, 199),
('QUI-LP', '2016-09-16', 'C', 2, 216),
('QUI-LP', '2016-09-16', 'C', 3, 282),
('QUI-LP', '2016-06-16', 'A', 2, 13);

-- --------------------------------------------------------

--
-- Table structure for table `Traversee`
--

CREATE TABLE `Traversee` (
  `num` smallint(6) NOT NULL,
  `dateTraversee` date NOT NULL,
  `heure` time NOT NULL,
  `idBateau` smallint(11) NOT NULL,
  `codeLiaison` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `Traversee`
--

INSERT INTO `Traversee` (`num`, `dateTraversee`, `heure`, `idBateau`, `codeLiaison`) VALUES
(1, '2016-07-10', '08:00:00', 3, 'QUI-LOC'),
(2, '2016-07-10', '09:00:00', 4, 'QUI-LOC'),
(3, '2016-07-10', '11:00:00', 6, 'QUI-LOC'),
(4, '2016-07-10', '17:00:00', 3, 'QUI-LOC'),
(5, '2016-07-10', '19:00:00', 4, 'QUI-LOC'),
(6, '2016-07-11', '08:00:00', 3, 'QUI-LOC'),
(7, '2016-07-11', '09:00:00', 4, 'QUI-LOC'),
(8, '2016-07-11', '11:00:00', 6, 'QUI-LOC'),
(9, '2016-07-11', '17:00:00', 3, 'QUI-LOC'),
(10, '2016-07-11', '19:00:00', 4, 'QUI-LOC'),
(11, '2016-07-10', '07:45:00', 5, 'QUI-LP'),
(12, '2016-07-10', '09:15:00', 7, 'QUI-LP'),
(13, '2016-07-10', '10:50:00', 1, 'QUI-LP'),
(14, '2016-07-10', '12:15:00', 2, 'QUI-LP'),
(15, '2016-07-10', '14:30:00', 5, 'QUI-LP'),
(16, '2016-07-10', '16:45:00', 7, 'QUI-LP'),
(17, '2016-07-10', '18:15:00', 1, 'QUI-LP'),
(18, '2016-07-10', '19:45:00', 11, 'QUI-LP'),
(19, '2016-07-11', '07:45:00', 5, 'QUI-LP'),
(20, '2016-07-11', '10:50:00', 1, 'QUI-LP'),
(21, '2016-07-11', '14:30:00', 5, 'QUI-LP'),
(22, '2016-07-11', '18:15:00', 1, 'QUI-LP'),
(23, '2016-07-20', '09:30:00', 3, 'LOC-QUI'),
(31, '2012-01-12', '08:30:00', 13, 'QUI-SAU'),
(32, '2012-01-12', '02:48:00', 13, 'QUI-LP');

-- --------------------------------------------------------

--
-- Table structure for table `TypeCateg`
--

CREATE TABLE `TypeCateg` (
  `lettreCategorie` varchar(1) NOT NULL,
  `numOrdre` smallint(6) NOT NULL,
  `libelle` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `TypeCateg`
--

INSERT INTO `TypeCateg` (`lettreCategorie`, `numOrdre`, `libelle`) VALUES
('A', 1, 'Adulte'),
('A', 2, 'Junior 8 Ã  12 ans'),
('A', 3, 'Enfant 0 Ã  7 ans'),
('B', 1, 'Voiture longueur inf Ã  4m'),
('B', 2, 'Voiture longueur inf Ã  5m '),
('C', 1, 'Fourgon'),
('C', 2, 'Camping Car'),
('C', 3, 'Camion');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `Administrateur`
--
ALTER TABLE `Administrateur`
  ADD PRIMARY KEY (`login`);

--
-- Indexes for table `Bateau`
--
ALTER TABLE `Bateau`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `Liaison`
--
ALTER TABLE `Liaison`
  ADD PRIMARY KEY (`code`);

--
-- Indexes for table `Periode`
--
ALTER TABLE `Periode`
  ADD PRIMARY KEY (`dateDeb`);

--
-- Indexes for table `Port`
--
ALTER TABLE `Port`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `Reservation`
--
ALTER TABLE `Reservation`
  ADD PRIMARY KEY (`num`);

--
-- Indexes for table `Traversee`
--
ALTER TABLE `Traversee`
  ADD PRIMARY KEY (`num`);

--
-- Indexes for table `TypeCateg`
--
ALTER TABLE `TypeCateg`
  ADD PRIMARY KEY (`lettreCategorie`,`numOrdre`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `Bateau`
--
ALTER TABLE `Bateau`
  MODIFY `id` smallint(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
--
-- AUTO_INCREMENT for table `Port`
--
ALTER TABLE `Port`
  MODIFY `id` smallint(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `Reservation`
--
ALTER TABLE `Reservation`
  MODIFY `num` smallint(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
--
-- AUTO_INCREMENT for table `Traversee`
--
ALTER TABLE `Traversee`
  MODIFY `num` smallint(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
