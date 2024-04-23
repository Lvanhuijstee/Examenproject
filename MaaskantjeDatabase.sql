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
  `Gebruiker_id` int(11) NOT NULL,
  PRIMARY KEY (`id`,`Gebruiker_id`),
  KEY `fk_Adres_Gebruiker1_idx` (`Gebruiker_id`),
  CONSTRAINT `fk_Adres_Gebruiker1` FOREIGN KEY (`Gebruiker_id`) REFERENCES `gebruiker` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- Dumpen data van tabel maaskantje.adres: ~0 rows (ongeveer)
DELETE FROM `adres`;

-- Structuur van  tabel maaskantje.allergie wordt geschreven
CREATE TABLE IF NOT EXISTS `allergie` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `Allergienaam` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- Dumpen data van tabel maaskantje.allergie: ~0 rows (ongeveer)
DELETE FROM `allergie`;

-- Structuur van  tabel maaskantje.categorieen wordt geschreven
CREATE TABLE IF NOT EXISTS `categorieen` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `Categorieennaam` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- Dumpen data van tabel maaskantje.categorieen: ~0 rows (ongeveer)
DELETE FROM `categorieen`;

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

-- Dumpen data van tabel maaskantje.categorieen_has_product: ~0 rows (ongeveer)
DELETE FROM `categorieen_has_product`;

-- Structuur van  tabel maaskantje.gebruiker wordt geschreven
CREATE TABLE IF NOT EXISTS `gebruiker` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `Voornaam` varchar(45) NOT NULL,
  `Achternaam` varchar(45) NOT NULL,
  `Tussenvoegsel` varchar(45) DEFAULT NULL,
  `Geboortedatum` date NOT NULL,
  `Mobielnummer` int(11) NOT NULL,
  `Email` varchar(45) NOT NULL,
  `Wachtwoord` varchar(45) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `Email_UNIQUE` (`Email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- Dumpen data van tabel maaskantje.gebruiker: ~0 rows (ongeveer)
DELETE FROM `gebruiker`;

-- Structuur van  tabel maaskantje.inkomsten wordt geschreven
CREATE TABLE IF NOT EXISTS `inkomsten` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `Loon` int(11) DEFAULT NULL,
  `Uitkering` int(11) DEFAULT NULL,
  `Kindgebonden` int(11) DEFAULT NULL,
  `KlantReg_id` int(11) NOT NULL,
  PRIMARY KEY (`id`,`KlantReg_id`),
  KEY `fk_Inkomsten_KlantReg1_idx` (`KlantReg_id`),
  CONSTRAINT `fk_Inkomsten_KlantReg1` FOREIGN KEY (`KlantReg_id`) REFERENCES `klantreg` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- Dumpen data van tabel maaskantje.inkomsten: ~0 rows (ongeveer)
DELETE FROM `inkomsten`;

-- Structuur van  tabel maaskantje.klantreg wordt geschreven
CREATE TABLE IF NOT EXISTS `klantreg` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `Gebruiker_id` int(11) NOT NULL,
  PRIMARY KEY (`id`,`Gebruiker_id`),
  KEY `fk_KlantReg_Gebruiker1_idx` (`Gebruiker_id`),
  CONSTRAINT `fk_KlantReg_Gebruiker1` FOREIGN KEY (`Gebruiker_id`) REFERENCES `gebruiker` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- Dumpen data van tabel maaskantje.klantreg: ~0 rows (ongeveer)
DELETE FROM `klantreg`;

-- Structuur van  tabel maaskantje.klantreg_wensen wordt geschreven
CREATE TABLE IF NOT EXISTS `klantreg_wensen` (
  `KlantReg_id` int(11) NOT NULL,
  `Allergie_id` int(11) NOT NULL,
  `Voorkeur_id` int(11) NOT NULL,
  PRIMARY KEY (`KlantReg_id`,`Allergie_id`,`Voorkeur_id`),
  KEY `fk_KlantReg_has_Wensen_Wensen1_idx` (`Allergie_id`),
  KEY `fk_KlantReg_has_Wensen_KlantReg1_idx` (`KlantReg_id`),
  KEY `fk_KlantReg_Wensen_Voorkeur1_idx` (`Voorkeur_id`),
  CONSTRAINT `fk_KlantReg_Wensen_Voorkeur1` FOREIGN KEY (`Voorkeur_id`) REFERENCES `voorkeur` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_KlantReg_has_Wensen_KlantReg1` FOREIGN KEY (`KlantReg_id`) REFERENCES `klantreg` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_KlantReg_has_Wensen_Wensen1` FOREIGN KEY (`Allergie_id`) REFERENCES `allergie` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- Dumpen data van tabel maaskantje.klantreg_wensen: ~0 rows (ongeveer)
DELETE FROM `klantreg_wensen`;

-- Structuur van  tabel maaskantje.leverancier wordt geschreven
CREATE TABLE IF NOT EXISTS `leverancier` (
  `bedrijfsnummer` int(11) NOT NULL AUTO_INCREMENT,
  `Rollen_id` int(11) NOT NULL,
  `bedrijfsnaam` varchar(45) NOT NULL,
  `Contactpersoon` varchar(45) NOT NULL,
  `Bedrijfsemail` varchar(45) NOT NULL,
  `Telefoonnummer` int(11) NOT NULL,
  PRIMARY KEY (`bedrijfsnummer`,`Rollen_id`),
  KEY `fk_Leverancier_Rollen1_idx` (`Rollen_id`),
  CONSTRAINT `fk_Leverancier_Rollen1` FOREIGN KEY (`Rollen_id`) REFERENCES `rollen` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- Dumpen data van tabel maaskantje.leverancier: ~0 rows (ongeveer)
DELETE FROM `leverancier`;

-- Structuur van  tabel maaskantje.levering wordt geschreven
CREATE TABLE IF NOT EXISTS `levering` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `Leverancier_id` int(11) NOT NULL,
  `Datum` date NOT NULL,
  `Eerstvolgende` date NOT NULL,
  `Meestrecente` date DEFAULT NULL,
  PRIMARY KEY (`id`,`Leverancier_id`),
  KEY `fk_Levering_Leverancier1_idx` (`Leverancier_id`),
  CONSTRAINT `fk_Levering_Leverancier1` FOREIGN KEY (`Leverancier_id`) REFERENCES `leverancier` (`bedrijfsnummer`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- Dumpen data van tabel maaskantje.levering: ~0 rows (ongeveer)
DELETE FROM `levering`;

-- Structuur van  tabel maaskantje.pakket wordt geschreven
CREATE TABLE IF NOT EXISTS `pakket` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `Inpakdatum` date NOT NULL,
  `Uitgavedatum` date DEFAULT NULL,
  `THT` date NOT NULL,
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
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- Dumpen data van tabel maaskantje.product: ~0 rows (ongeveer)
DELETE FROM `product`;

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

-- Dumpen data van tabel maaskantje.product_has_levering: ~0 rows (ongeveer)
DELETE FROM `product_has_levering`;

-- Structuur van  tabel maaskantje.rollen wordt geschreven
CREATE TABLE IF NOT EXISTS `rollen` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `Rolnaam` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- Dumpen data van tabel maaskantje.rollen: ~0 rows (ongeveer)
DELETE FROM `rollen`;
INSERT INTO `rollen` (`id`, `Rolnaam`) VALUES
	(1, 'Admin'),
	(2, 'Medewerker'),
	(3, 'Vrijwilliger'),
	(4, 'Leverancier'),
	(5, 'Klant');

-- Structuur van  tabel maaskantje.rollen_gebruiker wordt geschreven
CREATE TABLE IF NOT EXISTS `rollen_gebruiker` (
  `Rollen_id` int(11) NOT NULL AUTO_INCREMENT,
  `Gebruiker_id` int(11) NOT NULL,
  PRIMARY KEY (`Rollen_id`,`Gebruiker_id`),
  KEY `fk_Rollen_has_Gebruiker_Gebruiker1_idx` (`Gebruiker_id`),
  KEY `fk_Rollen_has_Gebruiker_Rollen1_idx` (`Rollen_id`),
  CONSTRAINT `fk_Rollen_has_Gebruiker_Gebruiker1` FOREIGN KEY (`Gebruiker_id`) REFERENCES `gebruiker` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_Rollen_has_Gebruiker_Rollen1` FOREIGN KEY (`Rollen_id`) REFERENCES `rollen` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- Dumpen data van tabel maaskantje.rollen_gebruiker: ~0 rows (ongeveer)
DELETE FROM `rollen_gebruiker`;

-- Structuur van  tabel maaskantje.samenstelling wordt geschreven
CREATE TABLE IF NOT EXISTS `samenstelling` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `Volwassenen` int(11) NOT NULL,
  `Kinderen` int(11) DEFAULT NULL,
  `Babys` int(11) DEFAULT NULL,
  `KlantReg_id` int(11) NOT NULL,
  PRIMARY KEY (`id`,`KlantReg_id`),
  KEY `fk_Samenstelling_KlantReg1_idx` (`KlantReg_id`),
  CONSTRAINT `fk_Samenstelling_KlantReg1` FOREIGN KEY (`KlantReg_id`) REFERENCES `klantreg` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- Dumpen data van tabel maaskantje.samenstelling: ~0 rows (ongeveer)
DELETE FROM `samenstelling`;

-- Structuur van  tabel maaskantje.uitgaven wordt geschreven
CREATE TABLE IF NOT EXISTS `uitgaven` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `Terugkerend` int(11) DEFAULT NULL,
  `Boodschappen` int(11) DEFAULT NULL,
  `Specialiteiten` int(11) DEFAULT NULL,
  `KlantReg_id` int(11) NOT NULL,
  PRIMARY KEY (`id`,`KlantReg_id`),
  KEY `fk_Uitgaven_KlantReg1_idx` (`KlantReg_id`),
  CONSTRAINT `fk_Uitgaven_KlantReg1` FOREIGN KEY (`KlantReg_id`) REFERENCES `klantreg` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- Dumpen data van tabel maaskantje.uitgaven: ~0 rows (ongeveer)
DELETE FROM `uitgaven`;

-- Structuur van  tabel maaskantje.voorkeur wordt geschreven
CREATE TABLE IF NOT EXISTS `voorkeur` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `Voorkeurnaam` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- Dumpen data van tabel maaskantje.voorkeur: ~0 rows (ongeveer)
DELETE FROM `voorkeur`;

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
