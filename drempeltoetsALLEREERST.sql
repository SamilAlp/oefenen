-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Gegenereerd op: 03 apr 2021 om 21:56
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
  `etendrinken_id` int(255) DEFAULT NULL,
  `eten` varchar(255) DEFAULT NULL,
  `drinken` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `factuur`
--

CREATE TABLE `factuur` (
  `id` int(11) NOT NULL,
  `factuur` int(255) DEFAULT NULL,
  `reserveringdatumvanaf` varchar(255) DEFAULT NULL,
  `reserveringdatumtot` varchar(255) DEFAULT NULL,
  `klant` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Gegevens worden geëxporteerd voor tabel `factuur`
--

INSERT INTO `factuur` (`id`, `factuur`, `reserveringdatumvanaf`, `reserveringdatumtot`, `klant`) VALUES
(1, 70, '12-10-2005', '12-12-2005', 'Piet');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `factuurroomservice`
--

CREATE TABLE `factuurroomservice` (
  `id` int(11) NOT NULL,
  `factuur` int(255) DEFAULT NULL,
  `factuur_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Gegevens worden geëxporteerd voor tabel `factuurroomservice`
--

INSERT INTO `factuurroomservice` (`id`, `factuur`, `factuur_id`) VALUES
(1, 60, NULL);

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `klant`
--

CREATE TABLE `klant` (
  `id` int(11) NOT NULL,
  `naam` varchar(255) DEFAULT NULL,
  `adres` varchar(255) DEFAULT NULL,
  `postcode` varchar(255) DEFAULT NULL,
  `plaats` varchar(255) DEFAULT NULL,
  `telefoon` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Gegevens worden geëxporteerd voor tabel `klant`
--

INSERT INTO `klant` (`id`, `naam`, `adres`, `postcode`, `plaats`, `telefoon`) VALUES
(1, 'Pieter', 'Norwaystaart', '4545YQ', 'Norway', '05534312355123'),
(56, 'Samil', 'WaterPlein', '2942RY', 'Dronten', '44444'),
(63, 'Peterer', 'WaterPlein', 'reyere', 'Dronten', '05534312355122'),
(64, 'Samil', '3131', '1348u3', 'Amsterdam', '05534312355122'),
(65, 'Pter', 'WaterPlein', '2942RY', 'Noord-Holland', '05534312355122');

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
  `kamernummer` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Gegevens worden geëxporteerd voor tabel `reservatie`
--

INSERT INTO `reservatie` (`id`, `naam`, `kamernummer`) VALUES
(159, 'Pter', '4'),
(243, NULL, '19'),
(248, NULL, '14'),
(249, NULL, '12');

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
  ADD KEY `etendrinken_id` (`etendrinken_id`);

--
-- Indexen voor tabel `factuur`
--
ALTER TABLE `factuur`
  ADD PRIMARY KEY (`id`);

--
-- Indexen voor tabel `factuurroomservice`
--
ALTER TABLE `factuurroomservice`
  ADD PRIMARY KEY (`id`),
  ADD KEY `factuur_id` (`factuur_id`);

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
  ADD PRIMARY KEY (`id`);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT voor een tabel `factuur`
--
ALTER TABLE `factuur`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT voor een tabel `factuurroomservice`
--
ALTER TABLE `factuurroomservice`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT voor een tabel `klant`
--
ALTER TABLE `klant`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=66;

--
-- AUTO_INCREMENT voor een tabel `medewerker`
--
ALTER TABLE `medewerker`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT voor een tabel `reservatie`
--
ALTER TABLE `reservatie`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=250;

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
  ADD CONSTRAINT `etendrinken_ibfk_1` FOREIGN KEY (`etendrinken_id`) REFERENCES `reservatie` (`id`);

--
-- Beperkingen voor tabel `factuurroomservice`
--
ALTER TABLE `factuurroomservice`
  ADD CONSTRAINT `factuurroomservice_ibfk_1` FOREIGN KEY (`id`) REFERENCES `factuur` (`id`),
  ADD CONSTRAINT `factuurroomservice_ibfk_2` FOREIGN KEY (`factuur_id`) REFERENCES `factuur` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
