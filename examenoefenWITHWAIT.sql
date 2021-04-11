-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Apr 11, 2021 at 09:04 PM
-- Server version: 5.7.26
-- PHP Version: 7.2.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `examenoefen`
--

-- --------------------------------------------------------

--
-- Table structure for table `bar`
--

DROP TABLE IF EXISTS `bar`;
CREATE TABLE IF NOT EXISTS `bar` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `naam` varchar(255) NOT NULL,
  `prijs` float NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bar`
--

INSERT INTO `bar` (`id`, `naam`, `prijs`) VALUES
(1, 'Bols', 100),
(2, 'Sonnema', 90),
(3, 'Johnnie Walker', 120),
(4, 'Puschkin', 110);

-- --------------------------------------------------------

--
-- Table structure for table `barorders`
--

DROP TABLE IF EXISTS `barorders`;
CREATE TABLE IF NOT EXISTS `barorders` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `reservatie_bar_id` int(11) DEFAULT NULL,
  `bar` varchar(255) DEFAULT NULL,
  `bar_id` int(11) DEFAULT NULL,
  `bar_quantity` int(11) NOT NULL DEFAULT '0',
  `snack` varchar(255) DEFAULT NULL,
  `snack_id` int(11) NOT NULL DEFAULT '0',
  `snack_quantity` int(11) NOT NULL DEFAULT '0',
  `order_date` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `bar_id` (`reservatie_bar_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `barorders`
--

INSERT INTO `barorders` (`id`, `reservatie_bar_id`, `bar`, `bar_id`, `bar_quantity`, `snack`, `snack_id`, `snack_quantity`, `order_date`) VALUES
(1, 1, 'Sonnema', 2, 2, 'Chips', 2, 1, '2021-04-11 20:45:15'),
(2, 1, 'Johnnie Walker', 3, 1, NULL, 0, 0, '2021-04-11 20:45:40'),
(3, 1, NULL, NULL, 0, 'Croissant', 4, 1, '2021-04-11 20:45:40'),
(4, 1, NULL, NULL, 0, 'Pie', 3, 1, '2021-04-11 20:46:02'),
(5, 2, 'Johnnie Walker', 3, 1, 'Apple', 1, 1, '2021-04-11 21:03:05');

-- --------------------------------------------------------

--
-- Table structure for table `barsnacks`
--

DROP TABLE IF EXISTS `barsnacks`;
CREATE TABLE IF NOT EXISTS `barsnacks` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `naam` varchar(255) NOT NULL,
  `prijs` float NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `barsnacks`
--

INSERT INTO `barsnacks` (`id`, `naam`, `prijs`) VALUES
(1, 'Apple', 50),
(2, 'Chips', 30),
(3, 'Pie', 30),
(4, 'Croissant', 40);

-- --------------------------------------------------------

--
-- Table structure for table `drinken`
--

DROP TABLE IF EXISTS `drinken`;
CREATE TABLE IF NOT EXISTS `drinken` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `naam` varchar(255) NOT NULL,
  `prijs` float NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `drinken`
--

INSERT INTO `drinken` (`id`, `naam`, `prijs`) VALUES
(1, 'Fanta', 50),
(2, 'Sprite', 30),
(3, 'Coke', 5),
(4, 'Soda', 5);

-- --------------------------------------------------------

--
-- Table structure for table `eten`
--

DROP TABLE IF EXISTS `eten`;
CREATE TABLE IF NOT EXISTS `eten` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `naam` varchar(255) NOT NULL,
  `prijs` float NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `eten`
--

INSERT INTO `eten` (`id`, `naam`, `prijs`) VALUES
(1, 'Vis', 20),
(2, 'Vispesto', 25),
(3, 'Pasta', 15),
(4, 'Pesto', 20);

-- --------------------------------------------------------

--
-- Table structure for table `etendrinken`
--

DROP TABLE IF EXISTS `etendrinken`;
CREATE TABLE IF NOT EXISTS `etendrinken` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `reservatie_id` int(11) DEFAULT NULL,
  `eten` varchar(255) DEFAULT NULL,
  `drinken` varchar(255) DEFAULT NULL,
  `eten_id` int(11) DEFAULT NULL,
  `eten_quantity` int(11) NOT NULL DEFAULT '0',
  `drinken_id` int(11) DEFAULT NULL,
  `drinken_quantity` int(11) NOT NULL DEFAULT '0',
  `order_date` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `etendrinken_id` (`reservatie_id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `etendrinken`
--

INSERT INTO `etendrinken` (`id`, `reservatie_id`, `eten`, `drinken`, `eten_id`, `eten_quantity`, `drinken_id`, `drinken_quantity`, `order_date`) VALUES
(1, 1, 'Vispesto', 'Sprite', 2, 1, 2, 1, '2021-04-11 20:42:10'),
(2, 1, 'Pesto', NULL, 4, 1, NULL, 0, '2021-04-11 20:42:39'),
(3, 1, NULL, 'Coke', NULL, 0, 3, 1, '2021-04-11 20:42:39'),
(4, 1, 'Vis', NULL, 1, 1, NULL, 0, '2021-04-11 20:43:08'),
(5, 1, NULL, 'Fanta', NULL, 0, 1, 1, '2021-04-11 20:43:08'),
(6, 2, 'Pasta', 'Sprite', 3, 1, 2, 1, '2021-04-11 20:59:40'),
(7, 2, 'Pesto', NULL, 4, 1, NULL, 0, '2021-04-11 21:00:12'),
(8, 2, NULL, 'Coke', NULL, 0, 3, 1, '2021-04-11 21:00:12');

-- --------------------------------------------------------

--
-- Table structure for table `factuur`
--

DROP TABLE IF EXISTS `factuur`;
CREATE TABLE IF NOT EXISTS `factuur` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `reservatie_id` int(11) NOT NULL,
  `factuurtotaal` int(255) DEFAULT NULL,
  `reserveringdatumvanaf` varchar(255) DEFAULT NULL,
  `reserveringdatumtot` varchar(255) DEFAULT NULL,
  `klant_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_klant` (`klant_id`),
  KEY `fk_reservatie` (`reservatie_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `factuur`
--

INSERT INTO `factuur` (`id`, `reservatie_id`, `factuurtotaal`, `reserveringdatumvanaf`, `reserveringdatumtot`, `klant_id`) VALUES
(1, 1, 110, '', '', 3),
(2, 2, 50, '', '', 4);

-- --------------------------------------------------------

--
-- Table structure for table `factuurroomservice`
--

DROP TABLE IF EXISTS `factuurroomservice`;
CREATE TABLE IF NOT EXISTS `factuurroomservice` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `factuur` int(255) DEFAULT NULL,
  `factuur_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `factuur_id` (`factuur_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `factuur_bar`
--

DROP TABLE IF EXISTS `factuur_bar`;
CREATE TABLE IF NOT EXISTS `factuur_bar` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `reservatie_bar_id` int(11) NOT NULL,
  `factuurtotaal` int(255) DEFAULT NULL,
  `klant_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_klant` (`klant_id`),
  KEY `fk_reservatie` (`reservatie_bar_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `factuur_bar`
--

INSERT INTO `factuur_bar` (`id`, `reservatie_bar_id`, `factuurtotaal`, `klant_id`) VALUES
(1, 1, 400, 3),
(2, 2, 170, 4);

-- --------------------------------------------------------

--
-- Table structure for table `kamer`
--

DROP TABLE IF EXISTS `kamer`;
CREATE TABLE IF NOT EXISTS `kamer` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `naam` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `prijs` float NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=41 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `kamer`
--

INSERT INTO `kamer` (`id`, `naam`, `prijs`) VALUES
(1, 'Table1', 60),
(2, 'Table2', 50),
(3, 'Table3', 20),
(4, 'Table4', 30),
(5, 'Table5', 50),
(6, 'Table6', 80),
(7, 'Table7', 50),
(8, 'Table8\r\n', 50),
(9, 'Table9', 50),
(10, 'Table10\r\n', 50),
(11, 'Table11', 70),
(12, 'Table12', 30),
(13, 'Table13', 40),
(14, 'Table14', 50),
(15, 'Table15', 50),
(17, 'Table16', 50),
(19, 'Table17', 50),
(20, 'Table18', 50),
(26, 'Table19\r\n', 80),
(28, 'Table20', 50);

-- --------------------------------------------------------

--
-- Table structure for table `klant`
--

DROP TABLE IF EXISTS `klant`;
CREATE TABLE IF NOT EXISTS `klant` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `klant` varchar(255) DEFAULT NULL,
  `adres` varchar(255) DEFAULT NULL,
  `postcode` varchar(255) DEFAULT NULL,
  `plaats` varchar(255) DEFAULT NULL,
  `telefoon` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `klant`
--

INSERT INTO `klant` (`id`, `klant`, `adres`, `postcode`, `plaats`, `telefoon`) VALUES
(1, 'Tee', 'Hombre Residence', '102102', 'Maryland', '0699234678'),
(2, 'Tee', 'Hombre Residence', '102102', 'Maryland', '0699234678'),
(3, 'Tee', 'Hombre Residence', '102102', 'Maryland', '0699234678'),
(4, 'Tee', 'Afr', '102102', 'plaat', '0699234678');

-- --------------------------------------------------------

--
-- Table structure for table `medewerker`
--

DROP TABLE IF EXISTS `medewerker`;
CREATE TABLE IF NOT EXISTS `medewerker` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `medewerker`
--

INSERT INTO `medewerker` (`id`, `username`, `password`) VALUES
(2, 'adminonly1', '*DE60168EFD21A172576C351EAA853EB338BE3C91');

-- --------------------------------------------------------

--
-- Table structure for table `reservatie`
--

DROP TABLE IF EXISTS `reservatie`;
CREATE TABLE IF NOT EXISTS `reservatie` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `allow_klant` bit(1) NOT NULL DEFAULT b'0',
  `naam` varchar(255) DEFAULT NULL,
  `kamernummer` varchar(255) DEFAULT NULL,
  `naam_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `naam_id` (`naam_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `reservatie`
--

INSERT INTO `reservatie` (`id`, `allow_klant`, `naam`, `kamernummer`, `naam_id`) VALUES
(1, b'0', 'Tee', '11', 3),
(2, b'1', 'Tee', '9', 4);

-- --------------------------------------------------------

--
-- Table structure for table `reservatiedatum`
--

DROP TABLE IF EXISTS `reservatiedatum`;
CREATE TABLE IF NOT EXISTS `reservatiedatum` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `datumvanaf` varchar(255) DEFAULT NULL,
  `datumtot` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `reservatie_bar`
--

DROP TABLE IF EXISTS `reservatie_bar`;
CREATE TABLE IF NOT EXISTS `reservatie_bar` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `allow_klant` bit(1) NOT NULL DEFAULT b'0',
  `naam` varchar(255) DEFAULT NULL,
  `naam_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `naam_id` (`naam_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `reservatie_bar`
--

INSERT INTO `reservatie_bar` (`id`, `allow_klant`, `naam`, `naam_id`) VALUES
(1, b'1', 'Tee', 3),
(2, b'1', 'Tee', 4);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `barorders`
--
ALTER TABLE `barorders`
  ADD CONSTRAINT `bar_ibfk_1` FOREIGN KEY (`reservatie_bar_id`) REFERENCES `reservatie_bar` (`id`);

--
-- Constraints for table `etendrinken`
--
ALTER TABLE `etendrinken`
  ADD CONSTRAINT `etendrinken_ibfk_1` FOREIGN KEY (`reservatie_id`) REFERENCES `reservatie` (`id`);

--
-- Constraints for table `factuur`
--
ALTER TABLE `factuur`
  ADD CONSTRAINT `fk_reservatie` FOREIGN KEY (`reservatie_id`) REFERENCES `reservatie` (`id`);

--
-- Constraints for table `factuurroomservice`
--
ALTER TABLE `factuurroomservice`
  ADD CONSTRAINT `factuurroomservice_ibfk_1` FOREIGN KEY (`id`) REFERENCES `factuur` (`id`),
  ADD CONSTRAINT `factuurroomservice_ibfk_2` FOREIGN KEY (`factuur_id`) REFERENCES `factuur` (`id`);

--
-- Constraints for table `factuur_bar`
--
ALTER TABLE `factuur_bar`
  ADD CONSTRAINT `fk_reservatie_bar` FOREIGN KEY (`reservatie_bar_id`) REFERENCES `reservatie_bar` (`id`);

--
-- Constraints for table `reservatie`
--
ALTER TABLE `reservatie`
  ADD CONSTRAINT `reservatie_ibfk_1` FOREIGN KEY (`naam_id`) REFERENCES `klant` (`id`);

--
-- Constraints for table `reservatie_bar`
--
ALTER TABLE `reservatie_bar`
  ADD CONSTRAINT `reservatie_bar_ibfk_1` FOREIGN KEY (`naam_id`) REFERENCES `klant` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
