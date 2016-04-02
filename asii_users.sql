-- phpMyAdmin SQL Dump
-- version 4.0.10.7
-- http://www.phpmyadmin.net
--
-- Gazda: localhost:3306
-- Timp de generare: 02 Apr 2016 la 22:05
-- Versiune server: 5.0.96-community-log
-- Versiune PHP: 5.4.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Bază de date: `asii_website`
--

-- --------------------------------------------------------

--
-- Structura de tabel pentru tabelul `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL auto_increment,
  `nume` varchar(255) NOT NULL,
  `prenume` varchar(255) NOT NULL,
  `facebook` varchar(255) NOT NULL,
  `departament` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `telefon` varchar(13) NOT NULL,
  `image` varchar(255) NOT NULL,
  `it` int(1) NOT NULL,
  `ri` int(11) NOT NULL,
  `re` int(11) NOT NULL,
  `alumni` int(11) NOT NULL,
  `evaluari` int(11) NOT NULL,
  `proiecte` int(11) NOT NULL,
  `pr&media` int(11) NOT NULL,
  UNIQUE KEY `id` (`id`),
  UNIQUE KEY `facebook` (`facebook`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
