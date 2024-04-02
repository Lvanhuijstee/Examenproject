-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server versie:                10.4.32-MariaDB - mariadb.org binary distribution
-- Server OS:                    Win64
-- HeidiSQL Versie:              12.6.0.6765
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Databasestructuur van maaskantje wordt geschreven
CREATE DATABASE IF NOT EXISTS `maaskantje` /*!40100 DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci */;
USE `maaskantje`;

-- Structuur van  tabel maaskantje.adres wordt geschreven
CREATE TABLE IF NOT EXISTS `adres` (
  `id` int(11) NOT NULL,
  `Postcode` varchar(6) DEFAULT NULL,
  `Huisnummer` int(11) DEFAULT NULL,
  `Straatnaam` varchar(45) DEFAULT NULL,
  `Land` varchar(45) DEFAULT NULL,
  `Gebruiker_id` int(11) NOT NULL,
  PRIMARY KEY (`id`,`Gebruiker_id`),
  KEY `fk_Adres_Gebruiker1_idx` (`Gebruiker_id`),
  CONSTRAINT `fk_Adres_Gebruiker1` FOREIGN KEY (`Gebruiker_id`) REFERENCES `gebruiker` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- Data exporteren was gedeselecteerd

-- Structuur van  tabel maaskantje.allergieen wordt geschreven
CREATE TABLE IF NOT EXISTS `allergieen` (
  `id` int(11) NOT NULL,
  `Allergienaam` varchar(45) DEFAULT NULL,
  `Gebruiker_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_Allergieen_Gebruiker1_idx` (`Gebruiker_id`),
  CONSTRAINT `fk_Allergieen_Gebruiker1` FOREIGN KEY (`Gebruiker_id`) REFERENCES `gebruiker` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- Data exporteren was gedeselecteerd

-- Structuur van  tabel maaskantje.categorieen wordt geschreven
CREATE TABLE IF NOT EXISTS `categorieen` (
  `id` int(11) NOT NULL,
  `Categorieennaam` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- Data exporteren was gedeselecteerd

-- Structuur van  tabel maaskantje.categorieen_has_product wordt geschreven
CREATE TABLE IF NOT EXISTS `categorieen_has_product` (
  `Categorieen_id` int(11) NOT NULL,
  `Product_id` int(11) NOT NULL,
  PRIMARY KEY (`Categorieen_id`,`Product_id`),
  KEY `fk_Categorieen_has_Product_Product1_idx` (`Product_id`),
  KEY `fk_Categorieen_has_Product_Categorieen_idx` (`Categorieen_id`),
  CONSTRAINT `fk_Categorieen_has_Product_Categorieen` FOREIGN KEY (`Categorieen_id`) REFERENCES `categorieen` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_Categorieen_has_Product_Product1` FOREIGN KEY (`Product_id`) REFERENCES `product` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- Data exporteren was gedeselecteerd

-- Structuur van  tabel maaskantje.gebruiker wordt geschreven
CREATE TABLE IF NOT EXISTS `gebruiker` (
  `id` int(11) NOT NULL,
  `Voornaam` varchar(45) DEFAULT NULL,
  `Achternaam` varchar(45) DEFAULT NULL,
  `Tussenvoegsel` varchar(45) DEFAULT NULL,
  `Geboortedatum` varchar(45) DEFAULT NULL,
  `Mobielnummer` int(11) DEFAULT NULL,
  `Gebruikersnaam` varchar(45) DEFAULT NULL,
  `Wachtwoord` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- Data exporteren was gedeselecteerd

-- Structuur van  tabel maaskantje.inkomsten wordt geschreven
CREATE TABLE IF NOT EXISTS `inkomsten` (
  `id` int(11) NOT NULL,
  `Loon` int(11) DEFAULT NULL,
  `Uitkering` int(11) DEFAULT NULL,
  `Kindgebonden` int(11) DEFAULT NULL,
  `Gebruiker_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_Inkomsten_Gebruiker1_idx` (`Gebruiker_id`),
  CONSTRAINT `fk_Inkomsten_Gebruiker1` FOREIGN KEY (`Gebruiker_id`) REFERENCES `gebruiker` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- Data exporteren was gedeselecteerd

-- Structuur van  tabel maaskantje.leverancier wordt geschreven
CREATE TABLE IF NOT EXISTS `leverancier` (
  `bedrijfsnummer` int(11) NOT NULL,
  `Rollen_id` int(11) NOT NULL,
  `bedrijfsnaam` varchar(45) DEFAULT NULL,
  `contactpersoon` varchar(45) DEFAULT NULL,
  `email` varchar(45) DEFAULT NULL,
  `telefoonnummer` int(11) DEFAULT NULL,
  PRIMARY KEY (`bedrijfsnummer`,`Rollen_id`),
  KEY `fk_Leverancier_Rollen1_idx` (`Rollen_id`),
  CONSTRAINT `fk_Leverancier_Rollen1` FOREIGN KEY (`Rollen_id`) REFERENCES `rollen` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- Data exporteren was gedeselecteerd

-- Structuur van  tabel maaskantje.levering wordt geschreven
CREATE TABLE IF NOT EXISTS `levering` (
  `id` int(11) NOT NULL,
  `Leverancier_id` int(11) NOT NULL,
  `Datum` date DEFAULT NULL,
  `Eerstvolgende` date DEFAULT NULL,
  `Meestrecente` date DEFAULT NULL,
  PRIMARY KEY (`id`,`Leverancier_id`),
  KEY `fk_Levering_Leverancier1_idx` (`Leverancier_id`),
  CONSTRAINT `fk_Levering_Leverancier1` FOREIGN KEY (`Leverancier_id`) REFERENCES `leverancier` (`bedrijfsnummer`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- Data exporteren was gedeselecteerd

-- Structuur van  tabel maaskantje.pakket wordt geschreven
CREATE TABLE IF NOT EXISTS `pakket` (
  `id` int(11) NOT NULL,
  `Inpakdatum` date DEFAULT NULL,
  `Uitgavedatum` date DEFAULT NULL,
  `THT` date DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- Data exporteren was gedeselecteerd

-- Structuur van  tabel maaskantje.pakket_has_product wordt geschreven
CREATE TABLE IF NOT EXISTS `pakket_has_product` (
  `Pakket_id` int(11) NOT NULL,
  `Product_id` int(11) NOT NULL,
  PRIMARY KEY (`Pakket_id`,`Product_id`),
  KEY `fk_Pakket_has_Product_Product1_idx` (`Product_id`),
  KEY `fk_Pakket_has_Product_Pakket1_idx` (`Pakket_id`),
  CONSTRAINT `fk_Pakket_has_Product_Pakket1` FOREIGN KEY (`Pakket_id`) REFERENCES `pakket` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_Pakket_has_Product_Product1` FOREIGN KEY (`Product_id`) REFERENCES `product` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- Data exporteren was gedeselecteerd

-- Structuur van  tabel maaskantje.product wordt geschreven
CREATE TABLE IF NOT EXISTS `product` (
  `id` int(11) NOT NULL,
  `EAN` int(11) NOT NULL,
  `Naam` varchar(45) DEFAULT NULL,
  `Aantal` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- Data exporteren was gedeselecteerd

-- Structuur van  tabel maaskantje.product_has_levering wordt geschreven
CREATE TABLE IF NOT EXISTS `product_has_levering` (
  `Product_id` int(11) NOT NULL,
  `Levering_id` int(11) NOT NULL,
  PRIMARY KEY (`Product_id`,`Levering_id`),
  KEY `fk_Product_has_Levering_Levering1_idx` (`Levering_id`),
  KEY `fk_Product_has_Levering_Product1_idx` (`Product_id`),
  CONSTRAINT `fk_Product_has_Levering_Levering1` FOREIGN KEY (`Levering_id`) REFERENCES `levering` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_Product_has_Levering_Product1` FOREIGN KEY (`Product_id`) REFERENCES `product` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- Data exporteren was gedeselecteerd

-- Structuur van  tabel maaskantje.rollen wordt geschreven
CREATE TABLE IF NOT EXISTS `rollen` (
  `id` int(11) NOT NULL,
  `Rolnaam` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- Data exporteren was gedeselecteerd

-- Structuur van  tabel maaskantje.rollen_has_gebruiker wordt geschreven
CREATE TABLE IF NOT EXISTS `rollen_has_gebruiker` (
  `Rollen_id` int(11) NOT NULL,
  `Gebruiker_id` int(11) NOT NULL,
  PRIMARY KEY (`Rollen_id`,`Gebruiker_id`),
  KEY `fk_Rollen_has_Gebruiker_Gebruiker1_idx` (`Gebruiker_id`),
  KEY `fk_Rollen_has_Gebruiker_Rollen1_idx` (`Rollen_id`),
  CONSTRAINT `fk_Rollen_has_Gebruiker_Gebruiker1` FOREIGN KEY (`Gebruiker_id`) REFERENCES `gebruiker` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_Rollen_has_Gebruiker_Rollen1` FOREIGN KEY (`Rollen_id`) REFERENCES `rollen` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- Data exporteren was gedeselecteerd

-- Structuur van  tabel maaskantje.samenstelling wordt geschreven
CREATE TABLE IF NOT EXISTS `samenstelling` (
  `id` int(11) NOT NULL,
  `Volwassenen` int(11) DEFAULT NULL,
  `Kinderen` int(11) DEFAULT NULL,
  `Babys` int(11) DEFAULT NULL,
  `Gebruiker_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_Samenstelling_Gebruiker1_idx` (`Gebruiker_id`),
  CONSTRAINT `fk_Samenstelling_Gebruiker1` FOREIGN KEY (`Gebruiker_id`) REFERENCES `gebruiker` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- Data exporteren was gedeselecteerd

-- Structuur van  tabel maaskantje.uitgaven wordt geschreven
CREATE TABLE IF NOT EXISTS `uitgaven` (
  `id` int(11) NOT NULL,
  `Terugkerend` int(11) DEFAULT NULL,
  `Boodschappen` int(11) DEFAULT NULL,
  `Specialiteiten` int(11) DEFAULT NULL,
  `Gebruiker_Allergieen_id` int(11) NOT NULL,
  `Gebruiker_Voorkeuren_id` int(11) NOT NULL,
  `Gebruiker_id` int(11) NOT NULL,
  PRIMARY KEY (`id`,`Gebruiker_Allergieen_id`,`Gebruiker_Voorkeuren_id`),
  KEY `fk_Uitgaven_Gebruiker1_idx` (`Gebruiker_id`),
  CONSTRAINT `fk_Uitgaven_Gebruiker1` FOREIGN KEY (`Gebruiker_id`) REFERENCES `gebruiker` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- Data exporteren was gedeselecteerd

-- Structuur van  tabel maaskantje.voorkeuren wordt geschreven
CREATE TABLE IF NOT EXISTS `voorkeuren` (
  `id` int(11) NOT NULL,
  `Voorkeurnaam` varchar(45) DEFAULT NULL,
  `Gebruiker_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_Voorkeuren_Gebruiker1_idx` (`Gebruiker_id`),
  CONSTRAINT `fk_Voorkeuren_Gebruiker1` FOREIGN KEY (`Gebruiker_id`) REFERENCES `gebruiker` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- Data exporteren was gedeselecteerd

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
