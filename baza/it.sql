-- it.sql - Database structure and sample data

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

--
-- Database: `it`
--
CREATE DATABASE IF NOT EXISTS `it` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
USE `it`;

-- --------------------------------------------------------

--
-- Table structure for table `stolovi`
--

CREATE TABLE `stolovi` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `naziv` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kapacitet` int(11) NOT NULL,
  `opis` text COLLATE utf8mb4_unicode_ci,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci AUTO_INCREMENT=6;

--
-- Dumping data for table `stolovi`
--

INSERT INTO `stolovi` (`id`, `naziv`, `kapacitet`, `opis`) VALUES
(1, 'Sto do prozora', 2, 'Mali romantični sto sa pogledom na baštu.'),
(2, 'Centralni sto', 4, 'Prostran sto u centru restorana pogodan za porodice.'),
(3, 'VIP Booth', 6, 'Privatni separe u mirnijem delu restorana.'),
(4, 'Barski sto 1', 2, 'Visoki sto pored bara, pogodan za brze obroke.'),
(5, 'Okrugli sto', 4, 'Klasični okrugli sto za četiri osobe.');

-- --------------------------------------------------------

--
-- Table structure for table `rezervacije`
--

CREATE TABLE `rezervacije` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `sto_id` int(11) NOT NULL,
  `ime_prezime` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `telefon` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `datum_vreme` datetime NOT NULL,
  `broj_osoba` int(11) NOT NULL,
  `zahtev` text COLLATE utf8mb4_unicode_ci,
  `status` enum('na_cekanju','odobrena','odbijena') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'na_cekanju',
  PRIMARY KEY (`id`),
  CONSTRAINT `fk_rezervacije_stolovi` FOREIGN KEY (`sto_id`) REFERENCES `stolovi` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci AUTO_INCREMENT=3;

--
-- Dumping data for table `rezervacije`
--

INSERT INTO `rezervacije` (`id`, `sto_id`, `ime_prezime`, `email`, `telefon`, `datum_vreme`, `broj_osoba`, `zahtev`, `status`) VALUES
(1, 2, 'Marko Marković', 'marko@example.com', '0641234567', '2026-02-25 19:00:00', 4, 'Proslava rođendana.', 'odobrena'),
(2, 1, 'Jelena Jović', 'jelena@example.com', '0639876543', '2026-02-26 20:30:00', 2, 'Želimo sto što bliže prozoru.', 'na_cekanju');

COMMIT;
