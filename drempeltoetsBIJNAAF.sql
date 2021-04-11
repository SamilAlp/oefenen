-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Gegenereerd op: 11 apr 2021 om 21:37
-- Serverversie: 10.4.11-MariaDB
-- PHP-versie: 7.4.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `drempeltoets`
--

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `etendrinken`
--

CREATE TABLE `etendrinken` (
  `id` int(11) NOT NULL,
  `reservatie_id` int(11) DEFAULT NULL,
  `eten` varchar(255) DEFAULT NULL,
  `drinken` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `factuur`
--

CREATE TABLE `factuur` (
  `id` int(11) NOT NULL,
  `reservatie_id` int(11) NOT NULL,
  `factuurtotaal` int(255) DEFAULT NULL,
  `reserveringdatumvanaf` varchar(255) DEFAULT NULL,
  `reserveringdatumtot` varchar(255) DEFAULT NULL,
  `klant_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Gegevens worden geëxporteerd voor tabel `factuur`
--

INSERT INTO `factuur` (`id`, `reservatie_id`, `factuurtotaal`, `reserveringdatumvanaf`, `reserveringdatumtot`, `klant_id`) VALUES
(25, 282, 50, '2021-04-07', '2021-04-08', 100),
(26, 283, 100, '2021-04-09', '2021-04-11', 101),
(27, 284, 100, '2021-04-10', '2021-04-12', 102);

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `factuurroomservice`
--

CREATE TABLE `factuurroomservice` (
  `id` int(11) NOT NULL,
  `factuur` int(255) DEFAULT NULL,
  `factuur_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `kamer`
--

CREATE TABLE `kamer` (
  `id` int(11) NOT NULL,
  `naam` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `prijs` float NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Gegevens worden geëxporteerd voor tabel `kamer`
--

INSERT INTO `kamer` (`id`, `naam`, `prijs`) VALUES
(1, 'Kamer1', 60),
(2, 'Kamer2', 50),
(3, 'Kamer3', 20),
(4, 'Kamer4', 30),
(5, 'Kamer5', 50),
(6, 'Kamer6', 80),
(7, 'Kamer7', 50),
(8, 'Kamer8', 50),
(9, 'Kamer9', 50),
(10, 'Kamer10', 50),
(11, 'Kamer11', 70),
(12, 'Kamer12', 30),
(13, 'Kamer13', 40),
(14, 'Kamer14', 50),
(15, 'Kamer15', 50),
(16, 'Kamer16', 50),
(17, 'Kamer17', 50),
(18, 'Kamer18', 50),
(19, 'Kamer19', 50),
(20, 'Kamer20', 50),
(21, '', 60),
(22, '', 50),
(23, '', 20),
(24, '', 30),
(25, '', 50),
(26, '', 80),
(27, '', 50),
(28, '', 50),
(29, '', 50),
(30, '', 50),
(31, '', 70),
(32, '', 30),
(33, '', 40),
(34, '', 50),
(35, '', 50),
(36, '', 50),
(37, '', 50),
(38, '', 50),
(39, '', 50),
(40, '', 50);

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `klant`
--

CREATE TABLE `klant` (
  `id` int(11) NOT NULL,
  `klant` varchar(255) DEFAULT NULL,
  `adres` varchar(255) DEFAULT NULL,
  `postcode` varchar(255) DEFAULT NULL,
  `plaats` varchar(255) DEFAULT NULL,
  `telefoon` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Gegevens worden geëxporteerd voor tabel `klant`
--

INSERT INTO `klant` (`id`, `klant`, `adres`, `postcode`, `plaats`, `telefoon`) VALUES
(95, 'Pieter', 'Europaplein', '2942RY', 'Noord-Holland', '05534312355122'),
(96, 'Piet', 'Europaplein', '1093 GP', 'Noord-Holland', '05534312355122'),
(97, 'Piet', 'WaterPlein', '2942RY', 'Dronten', '05534312355122'),
(98, 'Pieter', 'Europaplein', '2942RY', 'Noord-Holland', '05534312355122'),
(99, 'Pieter', 'WaterPlein', '2942RY', 'Noord-Holland', '05534312355122'),
(100, 'Pieter', 'Europaplein', '2942RY', 'Noord-Holland', '0612345678'),
(101, 'Pieter', 'WaterPlein', '2942RY', 'Noord-Holland', '0612345678'),
(102, 'Pieter', 'WaterPlein', '2942RY', 'Noord-Holland', '0612345678');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `medewerker`
--

CREATE TABLE `medewerker` (
  `id` int(11) NOT NULL,
  `username` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Gegevens worden geëxporteerd voor tabel `medewerker`
--

INSERT INTO `medewerker` (`id`, `username`, `password`) VALUES
(2, 'adminonly1', '*DE60168EFD21A172576C351EAA853EB338BE3C91');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `reservatie`
--

CREATE TABLE `reservatie` (
  `id` int(11) NOT NULL,
  `naam` varchar(255) DEFAULT NULL,
  `kamernummer` varchar(255) DEFAULT NULL,
  `naam_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Gegevens worden geëxporteerd voor tabel `reservatie`
--

INSERT INTO `reservatie` (`id`, `naam`, `kamernummer`, `naam_id`) VALUES
(276, 'Pieter', '14', 95),
(277, 'Pieter', '17', 95),
(278, 'Piet', '1', 96),
(279, 'Piet', '15', 97),
(280, 'Pieter', '15', 98),
(281, 'Pieter', '14', 99),
(282, 'Pieter', '14', 100),
(283, 'Pieter', '8', 101),
(284, 'Pieter', '5', 102);

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `reservatiedatum`
--

CREATE TABLE `reservatiedatum` (
  `id` int(11) NOT NULL,
  `datumvanaf` varchar(255) DEFAULT NULL,
  `datumtot` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `reserveringen`
--

CREATE TABLE `reserveringen` (
  `id` int(11) NOT NULL,
  `gereserveerdeperiode` varchar(255) DEFAULT NULL,
  `kamernummer` varchar(255) DEFAULT NULL,
  `gereserveerd` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `reserveringinfo`
--

CREATE TABLE `reserveringinfo` (
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `reserveringsoverzicht`
--

CREATE TABLE `reserveringsoverzicht` (
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexen voor geëxporteerde tabellen
--

--
-- Indexen voor tabel `etendrinken`
--
ALTER TABLE `etendrinken`
  ADD PRIMARY KEY (`id`),
  ADD KEY `etendrinken_id` (`reservatie_id`);

--
-- Indexen voor tabel `factuur`
--
ALTER TABLE `factuur`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_klant` (`klant_id`),
  ADD KEY `fk_reservatie` (`reservatie_id`);

--
-- Indexen voor tabel `factuurroomservice`
--
ALTER TABLE `factuurroomservice`
  ADD PRIMARY KEY (`id`),
  ADD KEY `factuur_id` (`factuur_id`);

--
-- Indexen voor tabel `kamer`
--
ALTER TABLE `kamer`
  ADD PRIMARY KEY (`id`);

--
-- Indexen voor tabel `klant`
--
ALTER TABLE `klant`
  ADD PRIMARY KEY (`id`);

--
-- Indexen voor tabel `medewerker`
--
ALTER TABLE `medewerker`
  ADD PRIMARY KEY (`id`);

--
-- Indexen voor tabel `reservatie`
--
ALTER TABLE `reservatie`
  ADD PRIMARY KEY (`id`),
  ADD KEY `naam_id` (`naam_id`);

--
-- Indexen voor tabel `reservatiedatum`
--
ALTER TABLE `reservatiedatum`
  ADD PRIMARY KEY (`id`);

--
-- Indexen voor tabel `reserveringen`
--
ALTER TABLE `reserveringen`
  ADD PRIMARY KEY (`id`);

--
-- Indexen voor tabel `reserveringinfo`
--
ALTER TABLE `reserveringinfo`
  ADD PRIMARY KEY (`id`);

--
-- Indexen voor tabel `reserveringsoverzicht`
--
ALTER TABLE `reserveringsoverzicht`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT voor geëxporteerde tabellen
--

--
-- AUTO_INCREMENT voor een tabel `etendrinken`
--
ALTER TABLE `etendrinken`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT voor een tabel `factuur`
--
ALTER TABLE `factuur`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT voor een tabel `factuurroomservice`
--
ALTER TABLE `factuurroomservice`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT voor een tabel `kamer`
--
ALTER TABLE `kamer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT voor een tabel `klant`
--
ALTER TABLE `klant`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=103;

--
-- AUTO_INCREMENT voor een tabel `medewerker`
--
ALTER TABLE `medewerker`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT voor een tabel `reservatie`
--
ALTER TABLE `reservatie`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=285;

--
-- AUTO_INCREMENT voor een tabel `reservatiedatum`
--
ALTER TABLE `reservatiedatum`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT voor een tabel `reserveringen`
--
ALTER TABLE `reserveringen`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT voor een tabel `reserveringinfo`
--
ALTER TABLE `reserveringinfo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT voor een tabel `reserveringsoverzicht`
--
ALTER TABLE `reserveringsoverzicht`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Beperkingen voor geëxporteerde tabellen
--

--
-- Beperkingen voor tabel `etendrinken`
--
ALTER TABLE `etendrinken`
  ADD CONSTRAINT `etendrinken_ibfk_1` FOREIGN KEY (`reservatie_id`) REFERENCES `reservatie` (`id`);

--
-- Beperkingen voor tabel `factuur`
--
ALTER TABLE `factuur`
  ADD CONSTRAINT `fk_reservatie` FOREIGN KEY (`reservatie_id`) REFERENCES `reservatie` (`id`);

--
-- Beperkingen voor tabel `factuurroomservice`
--
ALTER TABLE `factuurroomservice`
  ADD CONSTRAINT `factuurroomservice_ibfk_1` FOREIGN KEY (`id`) REFERENCES `factuur` (`id`),
  ADD CONSTRAINT `factuurroomservice_ibfk_2` FOREIGN KEY (`factuur_id`) REFERENCES `factuur` (`id`);

--
-- Beperkingen voor tabel `reservatie`
--
ALTER TABLE `reservatie`
  ADD CONSTRAINT `reservatie_ibfk_1` FOREIGN KEY (`naam_id`) REFERENCES `klant` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
