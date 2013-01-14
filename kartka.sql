-- phpMyAdmin SQL Dump
-- version 3.4.5
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Czas wygenerowania: 14 Sty 2013, 08:49
-- Wersja serwera: 5.5.16
-- Wersja PHP: 5.3.8

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Baza danych: `kartka`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla  `kartki`
--

CREATE TABLE IF NOT EXISTS `kartki` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nazwa` varchar(45) NOT NULL,
  `tresc` longtext NOT NULL,
  `iduzytkownika` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=14 ;

--
-- Zrzut danych tabeli `kartki`
--

INSERT INTO `kartki` (`id`, `nazwa`, `tresc`, `iduzytkownika`) VALUES
(10, 'lol', '<!doctype html><html><head></head><body>sadassa<span style="background-color: rgb(255, 153, 102);">bvcbvbcvbvcbcv</span></body></html>', 23),
(11, 'hgj', '<!doctype html><html><head></head><body>bb</body></html>', 22),
(12, 'gfgdfgdf', '<!doctype html><html><head></head><body>fgfgd</body></html>', 22),
(13, 'jhhhh', '<!doctype html><html><head></head><body>uiu</body></html>', 22);

-- --------------------------------------------------------

--
-- Struktura tabeli dla  `uzytkownicy`
--

CREATE TABLE IF NOT EXISTS `uzytkownicy` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `login` varchar(45) CHARACTER SET utf8 COLLATE utf8_polish_ci NOT NULL,
  `haslo` varchar(45) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=25 ;

--
-- Zrzut danych tabeli `uzytkownicy`
--

INSERT INTO `uzytkownicy` (`id`, `login`, `haslo`) VALUES
(1, 'lol', '9cdfb439c7876e703e307864c9167a15'),
(2, 'lol', '9cdfb439c7876e703e307864c9167a15'),
(3, 'lol', '9cdfb439c7876e703e307864c9167a15'),
(4, 'lol', '9cdfb439c7876e703e307864c9167a15'),
(5, 'lol', '7815696ecbf1c96e6894b779456d330e'),
(6, 'lol', '845290f1ba3c13cca40ffe8f277b1768'),
(7, 'adsasds', '845290f1ba3c13cca40ffe8f277b1768'),
(8, 'aneta57', '1b74f37946d2ef4a6ab575b9e7de97b8'),
(9, 'aneta574', '1b74f37946d2ef4a6ab575b9e7de97b8'),
(10, 'anetadf', 'f598c0545e546f104f96c608456ab9b6'),
(11, 'anetadfetr', '06170ec89d0b12e02afc8825d84f385d'),
(12, 'anetadfetrewrw', 'a2c2c4126a68c6fb7bf933141af0cdca'),
(13, 'anetadfetrewrwfgd', 'b48917eeed6fec3c431f59975018ddf5'),
(14, 'fdgdf', '5854ad1b38138d929b8bc40940e4fe5d'),
(15, 'fdgdfdfs', '7d70663568cac5af684503681e3a4d41'),
(16, 'dfsdf', '4ec503be252d765ea37621a629afdaa6'),
(17, 'dfsdffdgf', 'bf22a1d0acfca4af517e1417a80e92d1'),
(18, 'dsf', 'd9729feb74992cc3482b350163a1a010'),
(19, 'dsfsf', 'd9729feb74992cc3482b350163a1a010'),
(20, 'dsfd', '3238b0f5af9931fc73a43eb02a2ee528'),
(21, 'fdfdf', 'd29aaa0b9cd402b4bfe2395a805f9ada'),
(22, 'x', '9dd4e461268c8034f5c8564e155c67a6'),
(23, 'y', '415290769594460e2e485922904f345d'),
(24, '', 'd41d8cd98f00b204e9800998ecf8427e');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
