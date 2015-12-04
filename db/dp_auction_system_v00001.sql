-- phpMyAdmin SQL Dump
-- version 4.1.4
-- http://www.phpmyadmin.net
--
-- Počítač: 127.0.0.1
-- Vytvořeno: Pát 04. pro 2015, 15:00
-- Verze serveru: 5.6.15-log
-- Verze PHP: 5.4.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Databáze: `dp_auction_system`
--

-- --------------------------------------------------------

--
-- Struktura tabulky `parameter`
--

CREATE TABLE IF NOT EXISTS `parameter` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=3 ;

--
-- Vypisuji data pro tabulku `parameter`
--

INSERT INTO `parameter` (`id`, `name`) VALUES
(1, 'SystemName'),
(2, 'MainMenu');

-- --------------------------------------------------------

--
-- Struktura tabulky `role`
--

CREATE TABLE IF NOT EXISTS `role` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(15) COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=3 ;

--
-- Vypisuji data pro tabulku `role`
--

INSERT INTO `role` (`id`, `name`) VALUES
(1, 'Admin'),
(2, 'User');

-- --------------------------------------------------------

--
-- Struktura tabulky `setings`
--

CREATE TABLE IF NOT EXISTS `setings` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_user` int(11) NOT NULL,
  `id_parameter` int(11) NOT NULL,
  `value` varchar(100) COLLATE utf8_bin NOT NULL,
  `changed` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `id_user` (`id_user`),
  KEY `id_parameter` (`id_parameter`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=11 ;

--
-- Vypisuji data pro tabulku `setings`
--

INSERT INTO `setings` (`id`, `id_user`, `id_parameter`, `value`, `changed`) VALUES
(1, 1, 1, 'Yes2Aukce.cz', '2015-11-25 16:00:00'),
(2, 1, 2, 'Automoto', '2015-11-25 16:44:38'),
(3, 1, 2, 'Domácnost', '2015-11-25 16:48:05'),
(4, 1, 2, 'Elektronika', '2015-11-25 16:48:05'),
(5, 1, 2, 'Hračky', '2015-11-25 16:48:05'),
(6, 1, 2, 'Nemovitosti', '2015-11-25 16:48:05'),
(7, 1, 2, 'Oblečení', '2015-11-25 16:48:05'),
(8, 1, 2, 'Potraviny', '2015-11-25 16:48:05'),
(9, 1, 2, 'Zahrada', '2015-11-25 16:48:05'),
(10, 1, 2, 'Ostatní', '2015-11-25 16:48:05');

-- --------------------------------------------------------

--
-- Struktura tabulky `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_role` int(11) NOT NULL,
  `id_gender` int(11) NOT NULL,
  `nick` varchar(15) COLLATE utf8_bin NOT NULL,
  `password` varchar(60) COLLATE utf8_bin NOT NULL,
  `name` varchar(100) COLLATE utf8_bin DEFAULT NULL,
  `email` varchar(60) COLLATE utf8_bin DEFAULT NULL,
  `phone` varchar(16) COLLATE utf8_bin DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `nick` (`nick`),
  KEY `id_role` (`id_role`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=2 ;

--
-- Vypisuji data pro tabulku `user`
--

INSERT INTO `user` (`id`, `id_role`, `id_gender`, `nick`, `password`, `name`, `email`, `phone`) VALUES
(1, 1, 1, 'prcharom', '$2a$07$zkaywp36fdes3k5cv4oh7uUY1VMqeXc/KBqeP4Q88ln08DWjSsoam', 'Roman Prchal', 'prcharom@gmail.com', '702297294');

--
-- Omezení pro exportované tabulky
--

--
-- Omezení pro tabulku `setings`
--
ALTER TABLE `setings`
  ADD CONSTRAINT `setings_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `setings_ibfk_2` FOREIGN KEY (`id_parameter`) REFERENCES `parameter` (`id`) ON DELETE CASCADE;

--
-- Omezení pro tabulku `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `user_ibfk_1` FOREIGN KEY (`id_role`) REFERENCES `role` (`id`) ON DELETE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
