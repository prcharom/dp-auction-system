-- phpMyAdmin SQL Dump
-- version 4.1.4
-- http://www.phpmyadmin.net
--
-- Počítač: 127.0.0.1
-- Vytvořeno: Stř 10. úno 2016, 19:36
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
-- Struktura tabulky `category`
--

CREATE TABLE IF NOT EXISTS `category` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) COLLATE utf8_bin NOT NULL,
  `color` varchar(6) COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=9 ;

--
-- Vypisuji data pro tabulku `category`
--

INSERT INTO `category` (`id`, `name`, `color`) VALUES
(1, 'Potraviny', 'E96043'),
(2, 'Automoto', '829FE3'),
(3, 'Domácnost', 'B0D95B'),
(4, 'Elektronika', 'F9E95B'),
(5, 'Hračky', 'AB8EDB'),
(6, 'Nemovitosti', 'FF8F59'),
(7, 'Oblečení', '333'),
(8, 'Ostatní', '333');

-- --------------------------------------------------------

--
-- Struktura tabulky `image`
--

CREATE TABLE IF NOT EXISTS `image` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_product` int(11) NOT NULL,
  `name` varchar(60) COLLATE utf8_bin NOT NULL,
  `extension` varchar(4) COLLATE utf8_bin NOT NULL,
  `added` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `order` int(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `id_poster` (`id_product`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=32 ;

--
-- Vypisuji data pro tabulku `image`
--

INSERT INTO `image` (`id`, `id_product`, `name`, `extension`, `added`, `order`) VALUES
(9, 42, 'wkwft2x017anrchkmo779b1761fglbzpkhl8ysjn6n8wgxj5ynfpw0m5axv2', 'jpg', '2016-02-03 14:20:50', 1),
(10, 42, 'iizszmru7j3wjd7j041bv2jcyz0rcurteabpao73l67il3aorzavzyr0zt30', 'jpg', '2016-02-03 14:20:50', 0),
(12, 6, 'jwpd1uuxa2vyr3ahg3a5meo71ds38tp24ka1t3wlcdldu60ne0zhl6zby1vd', 'jpg', '2016-02-03 16:23:51', 0),
(13, 6, '0i9ddehyru4z1xai9w6zl9ac0vcam7hruk55s8g4nvcbl7uflrtbfg1uk33j', 'jpg', '2016-02-03 16:23:51', 1),
(14, 6, '9ma01eb63bg0tkl49n0fp1pxm6t1163c9migul19ivqk88cmo63i84ynlmfb', 'jpg', '2016-02-03 16:23:51', 0),
(15, 6, 'bco2q71y88lb7vbx8rf2lx43duztf2iuhnsim6pzs8gtpyiawvl05xixzwxi', 'jpg', '2016-02-03 16:23:51', 0),
(16, 4, 'eazyi8zqc4kr7beubqgtfg3erlj5hx709jo0aujhjxbc9mdvsu0ltjxr3aid', 'jpg', '2016-02-03 16:25:34', 0),
(17, 4, 'h6ves44er711salxva0uixhpx3krc96x9bvlbx20gvaha17hkj087tufk8v8', 'jpg', '2016-02-03 16:25:34', 0),
(19, 3, 'bu0m2fm4zqhaab8nk2jcf5xoloou3v93c6fqf2lol5bbyy7nttcah8a7nnqi', 'jpg', '2016-02-03 16:28:20', 1),
(20, 3, 'l356u2h0dmbecqky569tqcta581lf8c2m28e5rbak4ws7axctci0nqakk62e', 'jpg', '2016-02-03 16:28:20', 0);

-- --------------------------------------------------------

--
-- Struktura tabulky `parameter`
--

CREATE TABLE IF NOT EXISTS `parameter` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=2 ;

--
-- Vypisuji data pro tabulku `parameter`
--

INSERT INTO `parameter` (`id`, `name`) VALUES
(1, 'SystemName');

-- --------------------------------------------------------

--
-- Struktura tabulky `product`
--

CREATE TABLE IF NOT EXISTS `product` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_user` int(11) NOT NULL,
  `id_category` int(11) NOT NULL,
  `name` varchar(40) COLLATE utf8_bin NOT NULL,
  `description` text COLLATE utf8_bin NOT NULL,
  `cost` double NOT NULL DEFAULT '0',
  `added` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `expire` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `id_user` (`id_user`),
  KEY `id_category` (`id_category`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=43 ;

--
-- Vypisuji data pro tabulku `product`
--

INSERT INTO `product` (`id`, `id_user`, `id_category`, `name`, `description`, `cost`, `added`, `expire`) VALUES
(3, 1, 2, 'Škoda Octavia RS', 'Jedná se o moderní automobil vyrobený v Mladé Boleslavi. Tato nová Škoda Octavia má samé klady. Škodováci si určitě zamilují novou poloautomatickou spojku, kterou se automobilka rozhodla nově zařadit do sériové výroby tohoto vozu. Toto vozítko vás prostě dostane, ne náhodou se řadí k největším aspirantům na titul auto roku 2015.', 1100000, '2015-12-16 16:03:17', '2016-02-29 16:45:41'),
(4, 1, 3, 'Kožená sedačka', 'Téměř nová sedačka za solidní peníz. Kdo nekoupí, ten jednoznačně prohloupí. ', 3200, '2015-12-21 22:17:57', '2016-03-22 22:00:00'),
(5, 1, 4, 'Model Punťa', 'Ideální na mazlení do každé rodiny. Model je přítulný a zdravotně nezávadný. Obdarujte jím své blízké ještě dnes.', 1250, '2016-01-05 22:29:07', '2016-04-06 22:00:00'),
(6, 1, 6, 'Byt 3+1', 'Byt v klidné oblasti. Původní majitelka po drogovém večírku vyskočila z okna. Byt je tedy volný a případnému zájemci ihned k dispozici.', 750000, '2016-01-05 22:37:19', '2016-04-06 22:00:00'),
(42, 1, 4, 'Přepravka jablek', 'Zboží je dodáváno v dřevěných přepravkách.', 150, '2016-02-02 23:15:00', '2016-03-05 23:00:00');

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=2 ;

--
-- Vypisuji data pro tabulku `setings`
--

INSERT INTO `setings` (`id`, `id_user`, `id_parameter`, `value`, `changed`) VALUES
(1, 1, 1, 'AuctionSystem', '2015-11-25 16:00:00');

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
  `address` varchar(150) COLLATE utf8_bin NOT NULL,
  `name` varchar(100) COLLATE utf8_bin NOT NULL,
  `email` varchar(60) COLLATE utf8_bin NOT NULL,
  `phone` varchar(16) COLLATE utf8_bin NOT NULL,
  `last_login` datetime DEFAULT NULL,
  `registered_since` datetime DEFAULT NULL,
  `photo` varchar(65) COLLATE utf8_bin DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `nick` (`nick`),
  KEY `id_role` (`id_role`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=6 ;

--
-- Vypisuji data pro tabulku `user`
--

INSERT INTO `user` (`id`, `id_role`, `id_gender`, `nick`, `password`, `address`, `name`, `email`, `phone`, `last_login`, `registered_since`, `photo`) VALUES
(1, 1, 1, 'prcharom', '$2a$07$46uhodvkzf8aews8dettqOzK6hqSnbVIx9map9AsMI7o9gCVKdeXW', 'Folknáře 32 Děčín 28', 'Roman Prchal', 'prcharom@gmail.com', '702297294', '2016-02-07 17:16:23', '2015-12-04 23:21:37', 'g6otud41piz71vl86fr0zayfma416mfkozkmtcaux58cupflio8k1wk934z4.gif'),
(2, 2, 2, 'nika', '$2a$07$6ixzne1wl8zotfqj3bspducIdBertZ7AeHHsWCNcPrl0qctkosJ6i', 'Folknáře 32 Děčín 28', 'Nikola Prchalová', 'nika@seznam.cz', '+420702297294', '2015-12-08 19:35:20', '2015-12-04 23:21:37', NULL),
(3, 2, 1, 'pepa', '$2a$07$87zx19s734s3vw6ru75yxenVY5rvJNDIu3OyR.PQqC0hGPh3Ihe6y', 'Kopečkova 17 Česká Lípa 9', 'Josef Komžík', 'pepa@seznam.cz', '+420606567567', NULL, '2015-12-05 13:42:27', NULL),
(4, 2, 1, 'hanz', '$2a$07$mykuolod5tx155c38fmhwurv4rNTK96tEukxiO5nOa1M.DAj/UTyq', 'Na kopci 10 Česká Lípa 3', 'Jan Zachrla', 'hanz@seznam.cz', '+420702333444', NULL, '2015-12-05 13:47:27', NULL),
(5, 2, 2, 'Lucka', '$2a$07$7wgcf9ag141fjasposgp9uM6e1o5p7PsEqPmogQ/X1Ff86AKpoR9y', 'Na kopci 10 Litoměřice', 'Lucie Kaščáková', 'lucka@email.cz', '+420 702297294', '2015-12-08 12:34:25', '2015-12-08 12:32:56', NULL);

--
-- Omezení pro exportované tabulky
--

--
-- Omezení pro tabulku `image`
--
ALTER TABLE `image`
  ADD CONSTRAINT `image_ibfk_1` FOREIGN KEY (`id_product`) REFERENCES `product` (`id`) ON DELETE CASCADE;

--
-- Omezení pro tabulku `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `product_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `product_ibfk_2` FOREIGN KEY (`id_category`) REFERENCES `category` (`id`) ON DELETE CASCADE;

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
