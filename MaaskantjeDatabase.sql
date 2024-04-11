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
  `Postcode` varchar(6) DEFAULT NULL,
  `Huisnummer` int(11) DEFAULT NULL,
  `Straatnaam` varchar(45) DEFAULT NULL,
  `Land` varchar(45) DEFAULT NULL,
  `Gebruiker_id` int(11) NOT NULL,
  PRIMARY KEY (`id`,`Gebruiker_id`),
  KEY `fk_Adres_Gebruiker1_idx` (`Gebruiker_id`),
  CONSTRAINT `fk_Adres_Gebruiker1` FOREIGN KEY (`Gebruiker_id`) REFERENCES `gebruiker` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- Dumpen data van tabel maaskantje.adres: ~0 rows (ongeveer)
DELETE FROM `adres`;

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
