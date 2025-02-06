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
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `Postcode` varchar(6) NOT NULL,
  `Huisnummer` int(11) NOT NULL,
  `Straatnaam` varchar(45) NOT NULL,
  `Land` varchar(45) NOT NULL,
  `klant_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_adres_klant1_idx` (`klant_id`),
  CONSTRAINT `fk_adres_klant1` FOREIGN KEY (`klant_id`) REFERENCES `klant` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- Dumpen data van tabel maaskantje.adres: ~0 rows (ongeveer)
DELETE FROM `adres`;

-- Structuur van  tabel maaskantje.allergien_wensen wordt geschreven
CREATE TABLE IF NOT EXISTS `allergien_wensen` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `Naam` varchar(45) DEFAULT NULL,
  `isWens` tinyint(4) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- Dumpen data van tabel maaskantje.allergien_wensen: ~0 rows (ongeveer)
DELETE FROM `allergien_wensen`;

-- Structuur van  tabel maaskantje.categorieen wordt geschreven
CREATE TABLE IF NOT EXISTS `categorieen` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `Categorieennaam` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- Dumpen data van tabel maaskantje.categorieen: ~0 rows (ongeveer)
DELETE FROM `categorieen`;

-- Structuur van  tabel maaskantje.gebruiker_has_allergien_wensen wordt geschreven
CREATE TABLE IF NOT EXISTS `gebruiker_has_allergien_wensen` (
  `gebruiker_id` int(11) NOT NULL,
  `allergien_wensen_id` int(11) NOT NULL,
  PRIMARY KEY (`gebruiker_id`,`allergien_wensen_id`),
  KEY `fk_gebruiker_has_allergien_wensen_allergien_wensen1_idx` (`allergien_wensen_id`),
  KEY `fk_gebruiker_has_allergien_wensen_gebruiker1_idx` (`gebruiker_id`),
  CONSTRAINT `fk_gebruiker_has_allergien_wensen_allergien_wensen1` FOREIGN KEY (`allergien_wensen_id`) REFERENCES `allergien_wensen` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_gebruiker_has_allergien_wensen_gebruiker1` FOREIGN KEY (`gebruiker_id`) REFERENCES `klant` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- Dumpen data van tabel maaskantje.gebruiker_has_allergien_wensen: ~0 rows (ongeveer)
DELETE FROM `gebruiker_has_allergien_wensen`;

-- Structuur van  tabel maaskantje.klant wordt geschreven
CREATE TABLE IF NOT EXISTS `klant` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `Voornaam` varchar(45) NOT NULL,
  `Achternaam` varchar(45) NOT NULL,
  `Tussenvoegsel` varchar(45) DEFAULT NULL,
  `Geboortedatum` date NOT NULL,
  `Mobielnummer` varchar(12) NOT NULL,
  `Email` varchar(45) NOT NULL,
  `Wachtwoord` varchar(45) NOT NULL,
  `Volwassenen` varchar(45) DEFAULT NULL,
  `Kinderen` varchar(45) DEFAULT NULL,
  `Babys` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `Email_UNIQUE` (`Email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- Dumpen data van tabel maaskantje.klant: ~0 rows (ongeveer)
DELETE FROM `klant`;

-- Structuur van  tabel maaskantje.leverancier wordt geschreven
CREATE TABLE IF NOT EXISTS `leverancier` (
  `bedrijfsnummer` int(11) NOT NULL AUTO_INCREMENT,
  `bedrijfsnaam` varchar(45) NOT NULL,
  `Contactpersoon` varchar(45) NOT NULL,
  `Bedrijfsemail` varchar(45) NOT NULL,
  `Wachtwoord` varchar(45) NOT NULL,
  `Telefoonnummer` int(11) NOT NULL,
  `Eerstvolgende` date DEFAULT NULL,
  PRIMARY KEY (`bedrijfsnummer`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- Dumpen data van tabel maaskantje.leverancier: ~0 rows (ongeveer)
DELETE FROM `leverancier`;

-- Structuur van  tabel maaskantje.medewerker wordt geschreven
CREATE TABLE IF NOT EXISTS `medewerker` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `Naam` varchar(45) DEFAULT NULL,
  `Email` varchar(45) DEFAULT NULL,
  `Wachtwoord` varchar(45) DEFAULT NULL,
  `rollen_id` int(11) NOT NULL,
  PRIMARY KEY (`id`,`rollen_id`),
  KEY `fk_Medewerker_rollen1_idx` (`rollen_id`),
  CONSTRAINT `fk_Medewerker_rollen1` FOREIGN KEY (`rollen_id`) REFERENCES `rollen` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- Dumpen data van tabel maaskantje.medewerker: ~0 rows (ongeveer)
DELETE FROM `medewerker`;

-- Structuur van  tabel maaskantje.pakket wordt geschreven
CREATE TABLE IF NOT EXISTS `pakket` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `Inpakdatum` date NOT NULL,
  `Uitgavedatum` date DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- Dumpen data van tabel maaskantje.pakket: ~0 rows (ongeveer)
DELETE FROM `pakket`;

-- Structuur van  tabel maaskantje.pakket_has_product wordt geschreven
CREATE TABLE IF NOT EXISTS `pakket_has_product` (
  `Pakket_id` int(11) NOT NULL,
  `Product_id` int(11) NOT NULL,
  `Productnaam` varchar(45) NOT NULL,
  `Aantal` int(11) NOT NULL,
  PRIMARY KEY (`Pakket_id`,`Product_id`),
  KEY `fk_Pakket_has_Product_Product1_idx` (`Product_id`),
  KEY `fk_Pakket_has_Product_Pakket1_idx` (`Pakket_id`),
  CONSTRAINT `fk_Pakket_has_Product_Pakket1` FOREIGN KEY (`Pakket_id`) REFERENCES `pakket` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_Pakket_has_Product_Product1` FOREIGN KEY (`Product_id`) REFERENCES `product` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- Dumpen data van tabel maaskantje.pakket_has_product: ~0 rows (ongeveer)
DELETE FROM `pakket_has_product`;

-- Structuur van  tabel maaskantje.product wordt geschreven
CREATE TABLE IF NOT EXISTS `product` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `EAN` int(11) NOT NULL,
  `Naam` varchar(45) NOT NULL,
  `Aantal` int(11) DEFAULT NULL,
  `THT` date DEFAULT NULL,
  `categorieen_id` int(11) NOT NULL,
  PRIMARY KEY (`id`,`categorieen_id`),
  KEY `fk_product_categorieen1_idx` (`categorieen_id`),
  CONSTRAINT `fk_product_categorieen1` FOREIGN KEY (`categorieen_id`) REFERENCES `categorieen` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- Dumpen data van tabel maaskantje.product: ~0 rows (ongeveer)
DELETE FROM `product`;

-- Structuur van  tabel maaskantje.rollen wordt geschreven
CREATE TABLE IF NOT EXISTS `rollen` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `Naam` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- Dumpen data van tabel maaskantje.rollen: ~0 rows (ongeveer)
DELETE FROM `rollen`;

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
