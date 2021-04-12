-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Apr 12, 2021 at 11:20 PM
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
-- Database: `restaurantverhoeven`
--

-- --------------------------------------------------------

--
-- Table structure for table `bestelling`
--

DROP TABLE IF EXISTS `bestelling`;
CREATE TABLE IF NOT EXISTS `bestelling` (
  `bestelling_id` int(11) NOT NULL AUTO_INCREMENT,
  `totaalprijs` float DEFAULT NULL,
  PRIMARY KEY (`bestelling_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `dessert`
--

DROP TABLE IF EXISTS `dessert`;
CREATE TABLE IF NOT EXISTS `dessert` (
  `dessert_id` int(11) NOT NULL AUTO_INCREMENT,
  `dessert_soorten` varchar(255) DEFAULT NULL,
  `menu_id` int(11) DEFAULT NULL,
  `prijs` float NOT NULL,
  PRIMARY KEY (`dessert_id`),
  KEY `prijs_id` (`menu_id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `dessert`
--

INSERT INTO `dessert` (`dessert_id`, `dessert_soorten`, `menu_id`, `prijs`) VALUES
(1, 'rijstvan', 1, 20.09),
(2, 'rijstvanbeter', 2, 15),
(3, 'rijstvanietsbeter', 3, 20),
(4, 'rijstvanbeste', 4, 20);

-- --------------------------------------------------------

--
-- Table structure for table `frisdranken`
--

DROP TABLE IF EXISTS `frisdranken`;
CREATE TABLE IF NOT EXISTS `frisdranken` (
  `frisdranken_id` int(11) NOT NULL AUTO_INCREMENT,
  `menu_id` int(11) DEFAULT NULL,
  `frisdranken_soorten` varchar(255) DEFAULT NULL,
  `prijs` int(11) NOT NULL,
  PRIMARY KEY (`frisdranken_id`),
  KEY `menu_id` (`menu_id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `frisdranken`
--

INSERT INTO `frisdranken` (`frisdranken_id`, `menu_id`, `frisdranken_soorten`, `prijs`) VALUES
(1, 5, 'sprite', 25),
(2, 6, 'spritebeter', 15),
(3, 7, 'spriteietsbeter', 12),
(4, 8, 'spritebeste', 25);

-- --------------------------------------------------------

--
-- Table structure for table `hoofdgerechten`
--

DROP TABLE IF EXISTS `hoofdgerechten`;
CREATE TABLE IF NOT EXISTS `hoofdgerechten` (
  `hoofdgerechten_id` int(11) NOT NULL AUTO_INCREMENT,
  `hoofdgerechten_soorten` varchar(255) DEFAULT NULL,
  `menu_id` int(11) DEFAULT NULL,
  `prijs` int(11) NOT NULL,
  PRIMARY KEY (`hoofdgerechten_id`),
  KEY `prijs_id` (`menu_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `hoofdgerechten`
--

INSERT INTO `hoofdgerechten` (`hoofdgerechten_id`, `hoofdgerechten_soorten`, `menu_id`, `prijs`) VALUES
(1, 'peterselie', 9, 14),
(2, 'peterseliebeter', 10, 12),
(3, 'peterselieietsbeter', 11, 41),
(4, 'peterseliebeste', 12, 12);

-- --------------------------------------------------------

--
-- Table structure for table `huiswijnen`
--

DROP TABLE IF EXISTS `huiswijnen`;
CREATE TABLE IF NOT EXISTS `huiswijnen` (
  `huiswijnen_id` int(11) NOT NULL AUTO_INCREMENT,
  `huiswijnen_soorten` varchar(255) DEFAULT NULL,
  `wittewijn` varchar(255) DEFAULT NULL,
  `rodewijn` varchar(255) DEFAULT NULL,
  `rosé` varchar(255) DEFAULT NULL,
  `menu_id` int(11) DEFAULT NULL,
  `prijs` int(11) NOT NULL,
  PRIMARY KEY (`huiswijnen_id`),
  KEY `prijs_id` (`menu_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `huiswijnen`
--

INSERT INTO `huiswijnen` (`huiswijnen_id`, `huiswijnen_soorten`, `wittewijn`, `rodewijn`, `rosé`, `menu_id`, `prijs`) VALUES
(1, 'wijntjegoed', 'wijntjebeter', 'wijntjeietsbeter', 'wijntjebeste', 13, 15),
(2, 'beetjebeter', 'wijntjebetermeer', 'wijntjebetermeerder', 'wijntjebetermeest', 14, 12),
(3, 'beetjebeterder', 'beetjebeternog', 'beetjebetermeer', 'beetjebetermeer', 15, 21),
(4, 'beterr', 'beteree', 'petere', 'peree', 16, 22);

-- --------------------------------------------------------

--
-- Table structure for table `klant`
--

DROP TABLE IF EXISTS `klant`;
CREATE TABLE IF NOT EXISTS `klant` (
  `klant_id` int(11) NOT NULL AUTO_INCREMENT,
  `klantnaam` varchar(255) DEFAULT NULL,
  `telefoonnummer` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`klant_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `klant`
--

INSERT INTO `klant` (`klant_id`, `klantnaam`, `telefoonnummer`) VALUES
(1, 'Pter', '0699234678'),
(2, 'Teew', '0699234678'),
(3, 'Pter', '0699234678'),
(4, 'Pter', '0699234678');

-- --------------------------------------------------------

--
-- Table structure for table `koffiethee`
--

DROP TABLE IF EXISTS `koffiethee`;
CREATE TABLE IF NOT EXISTS `koffiethee` (
  `koffiethee_id` int(11) NOT NULL AUTO_INCREMENT,
  `koffiethee_soorten` varchar(255) DEFAULT NULL,
  `menu_id` int(11) DEFAULT NULL,
  `prijs` int(11) NOT NULL,
  PRIMARY KEY (`koffiethee_id`),
  KEY `prijs_id` (`menu_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `koffiethee`
--

INSERT INTO `koffiethee` (`koffiethee_id`, `koffiethee_soorten`, `menu_id`, `prijs`) VALUES
(1, 'beterkoffie', 17, 14),
(2, 'beterekoffie', 18, 15),
(3, 'besekoffie', 19, 22),
(4, 'jesskoffie', 20, 20);

-- --------------------------------------------------------

--
-- Table structure for table `menu`
--

DROP TABLE IF EXISTS `menu`;
CREATE TABLE IF NOT EXISTS `menu` (
  `menu_id` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`menu_id`)
) ENGINE=InnoDB AUTO_INCREMENT=41 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `menu`
--

INSERT INTO `menu` (`menu_id`) VALUES
(1),
(2),
(3),
(4),
(5),
(6),
(7),
(8),
(9),
(10),
(11),
(12),
(13),
(14),
(15),
(16),
(17),
(18),
(19),
(20),
(21),
(22),
(23),
(24),
(25),
(26),
(27),
(28),
(29),
(30),
(31),
(32),
(33),
(34),
(35),
(36),
(37),
(38),
(39),
(40);

-- --------------------------------------------------------

--
-- Table structure for table `mineraalwaters`
--

DROP TABLE IF EXISTS `mineraalwaters`;
CREATE TABLE IF NOT EXISTS `mineraalwaters` (
  `mineraalwaters_id` int(11) NOT NULL AUTO_INCREMENT,
  `mineraalwaters_soorten` varchar(255) DEFAULT NULL,
  `menu_id` int(11) DEFAULT NULL,
  `prijs` int(11) NOT NULL,
  PRIMARY KEY (`mineraalwaters_id`),
  KEY `prijs_id` (`menu_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `mineraalwaters`
--

INSERT INTO `mineraalwaters` (`mineraalwaters_id`, `mineraalwaters_soorten`, `menu_id`, `prijs`) VALUES
(1, 'beetjewater', 21, 11),
(2, 'beetjewatere', 22, 12),
(3, 'beetjewateremeer', 23, 13),
(4, 'beetjewatermeest', 24, 15);

-- --------------------------------------------------------

--
-- Table structure for table `producten`
--

DROP TABLE IF EXISTS `producten`;
CREATE TABLE IF NOT EXISTS `producten` (
  `product_id` int(11) NOT NULL,
  `aantal` int(11) DEFAULT NULL,
  `prijsperstuk` varchar(255) DEFAULT NULL,
  `bestelling_id` int(11) NOT NULL,
  KEY `bestelling_id` (`bestelling_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `reservering`
--

DROP TABLE IF EXISTS `reservering`;
CREATE TABLE IF NOT EXISTS `reservering` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `datum` varchar(255) DEFAULT NULL,
  `tijd` varchar(255) DEFAULT NULL,
  `tafel` varchar(255) DEFAULT NULL,
  `klant_id` int(11) NOT NULL,
  `picked_up` bit(1) NOT NULL DEFAULT b'0',
  PRIMARY KEY (`id`),
  KEY `fk_reservering_klant` (`klant_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `reservering`
--

INSERT INTO `reservering` (`id`, `datum`, `tijd`, `tafel`, `klant_id`, `picked_up`) VALUES
(1, '2021-04-30', '17:16', '14', 4, b'0');

-- --------------------------------------------------------

--
-- Table structure for table `specialbier`
--

DROP TABLE IF EXISTS `specialbier`;
CREATE TABLE IF NOT EXISTS `specialbier` (
  `specialbier_id` int(11) NOT NULL AUTO_INCREMENT,
  `specialbier_soorten` varchar(255) DEFAULT NULL,
  `menu_id` int(11) DEFAULT NULL,
  `prijs` int(11) NOT NULL,
  PRIMARY KEY (`specialbier_id`),
  KEY `prijs_id` (`menu_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `specialbier`
--

INSERT INTO `specialbier` (`specialbier_id`, `specialbier_soorten`, `menu_id`, `prijs`) VALUES
(1, 'biertje', 25, 20),
(2, 'biertjebeter', 26, 10),
(3, 'biertjebeter', 27, 14),
(4, 'biertjeeee', 28, 15);

-- --------------------------------------------------------

--
-- Table structure for table `tafel`
--

DROP TABLE IF EXISTS `tafel`;
CREATE TABLE IF NOT EXISTS `tafel` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `naam` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=21 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tafel`
--

INSERT INTO `tafel` (`id`, `naam`) VALUES
(1, 'Table1'),
(2, 'Table2'),
(3, 'Table3'),
(4, 'Table4'),
(5, 'Table5'),
(6, 'Table6'),
(7, 'Table7'),
(8, 'Table8'),
(9, 'Table9'),
(10, 'Table10'),
(11, 'Table11'),
(12, 'Table12'),
(13, 'Table13'),
(14, 'Table14'),
(15, 'Table15'),
(16, 'Table16'),
(17, 'Table17'),
(18, 'Table18'),
(19, 'Table19'),
(20, 'Table20');

-- --------------------------------------------------------

--
-- Table structure for table `tapbier`
--

DROP TABLE IF EXISTS `tapbier`;
CREATE TABLE IF NOT EXISTS `tapbier` (
  `tapbier_id` int(11) NOT NULL AUTO_INCREMENT,
  `tapbier_soorten` varchar(255) DEFAULT NULL,
  `menu_id` int(11) DEFAULT NULL,
  `prijs` int(11) NOT NULL,
  PRIMARY KEY (`tapbier_id`),
  KEY `prijs_id` (`menu_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tapbier`
--

INSERT INTO `tapbier` (`tapbier_id`, `tapbier_soorten`, `menu_id`, `prijs`) VALUES
(1, 'tapbieer', 29, 12),
(2, 'tapbieertjee', 30, 41),
(3, 'tapbieerere', 31, 12),
(4, 'tapbieereq', 32, 15);

-- --------------------------------------------------------

--
-- Table structure for table `voordekleintjes`
--

DROP TABLE IF EXISTS `voordekleintjes`;
CREATE TABLE IF NOT EXISTS `voordekleintjes` (
  `voordekleintjes_id` int(11) NOT NULL AUTO_INCREMENT,
  `voordekleintjes_soorten` varchar(255) DEFAULT NULL,
  `menu_id` int(11) DEFAULT NULL,
  `prijs` int(11) NOT NULL,
  PRIMARY KEY (`voordekleintjes_id`),
  KEY `prijs_id` (`menu_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `voordekleintjes`
--

INSERT INTO `voordekleintjes` (`voordekleintjes_id`, `voordekleintjes_soorten`, `menu_id`, `prijs`) VALUES
(1, 'voordekleinee', 33, 21),
(2, 'voordekleinee', 34, 12),
(3, 'voordekleineeq', 35, 24),
(4, 'voordekleineeqqqq', 36, 22);

-- --------------------------------------------------------

--
-- Table structure for table `voorgerechten`
--

DROP TABLE IF EXISTS `voorgerechten`;
CREATE TABLE IF NOT EXISTS `voorgerechten` (
  `voorgerechten_id` int(11) NOT NULL AUTO_INCREMENT,
  `voorgerechten_soorten` varchar(255) DEFAULT NULL,
  `menu_id` int(11) DEFAULT NULL,
  `prijs` int(11) NOT NULL,
  PRIMARY KEY (`voorgerechten_id`),
  KEY `prijs_id` (`menu_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `voorgerechten`
--

INSERT INTO `voorgerechten` (`voorgerechten_id`, `voorgerechten_soorten`, `menu_id`, `prijs`) VALUES
(1, 'voorgerechteene', 37, 13),
(2, 'voorgerechteeneeee', 38, 12),
(3, 'voorgerechteenebetere', 39, 32),
(4, 'voorgerechteenebeter', 40, 12);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `dessert`
--
ALTER TABLE `dessert`
  ADD CONSTRAINT `dessert_ibfk_1` FOREIGN KEY (`menu_id`) REFERENCES `menu` (`menu_id`);

--
-- Constraints for table `frisdranken`
--
ALTER TABLE `frisdranken`
  ADD CONSTRAINT `frisdranken_ibfk_1` FOREIGN KEY (`menu_id`) REFERENCES `menu` (`menu_id`);

--
-- Constraints for table `hoofdgerechten`
--
ALTER TABLE `hoofdgerechten`
  ADD CONSTRAINT `hoofdgerechten_ibfk_1` FOREIGN KEY (`menu_id`) REFERENCES `menu` (`menu_id`);

--
-- Constraints for table `huiswijnen`
--
ALTER TABLE `huiswijnen`
  ADD CONSTRAINT `huiswijnen_ibfk_1` FOREIGN KEY (`menu_id`) REFERENCES `menu` (`menu_id`);

--
-- Constraints for table `koffiethee`
--
ALTER TABLE `koffiethee`
  ADD CONSTRAINT `koffiethee_ibfk_1` FOREIGN KEY (`menu_id`) REFERENCES `menu` (`menu_id`);

--
-- Constraints for table `mineraalwaters`
--
ALTER TABLE `mineraalwaters`
  ADD CONSTRAINT `mineraalwaters_ibfk_1` FOREIGN KEY (`menu_id`) REFERENCES `menu` (`menu_id`);

--
-- Constraints for table `producten`
--
ALTER TABLE `producten`
  ADD CONSTRAINT `producten_ibfk_1` FOREIGN KEY (`bestelling_id`) REFERENCES `bestelling` (`bestelling_id`);

--
-- Constraints for table `reservering`
--
ALTER TABLE `reservering`
  ADD CONSTRAINT `fk_reservering_klant` FOREIGN KEY (`klant_id`) REFERENCES `klant` (`klant_id`);

--
-- Constraints for table `specialbier`
--
ALTER TABLE `specialbier`
  ADD CONSTRAINT `specialbier_ibfk_1` FOREIGN KEY (`menu_id`) REFERENCES `menu` (`menu_id`);

--
-- Constraints for table `tapbier`
--
ALTER TABLE `tapbier`
  ADD CONSTRAINT `tapbier_ibfk_1` FOREIGN KEY (`menu_id`) REFERENCES `menu` (`menu_id`);

--
-- Constraints for table `voordekleintjes`
--
ALTER TABLE `voordekleintjes`
  ADD CONSTRAINT `voordekleintjes_ibfk_1` FOREIGN KEY (`menu_id`) REFERENCES `menu` (`menu_id`);

--
-- Constraints for table `voorgerechten`
--
ALTER TABLE `voorgerechten`
  ADD CONSTRAINT `voorgerechten_ibfk_1` FOREIGN KEY (`menu_id`) REFERENCES `menu` (`menu_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
