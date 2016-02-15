-- phpMyAdmin SQL Dump
-- version 4.4.13.1
-- http://www.phpmyadmin.net
--
-- Client :  pattesdaxuadmin.mysql.db
-- Généré le :  Jeu 04 Février 2016 à 10:04
-- Version du serveur :  5.5.46-0+deb7u1-log
-- Version de PHP :  5.3.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Base de données :  `pattesdaxuadmin`
--

-- --------------------------------------------------------

--
-- Structure de la table `animal`
--

CREATE TABLE IF NOT EXISTS `animal` (
  `id` int(11) NOT NULL,
  `nom` varchar(30) NOT NULL,
  `sexe` int(1) NOT NULL DEFAULT '0',
  `age` datetime DEFAULT NULL,
  `soin` varchar(100) NOT NULL DEFAULT '',
  `commentaire` text NOT NULL,
  `plus` text NOT NULL,
  `moins` text NOT NULL,
  `okChat` int(1) NOT NULL DEFAULT '0',
  `okChien` int(1) NOT NULL DEFAULT '0',
  `okEnfant` int(1) NOT NULL DEFAULT '0',
  `categorie` varchar(20) NOT NULL DEFAULT 'adopte',
  `anneeAdoption` datetime DEFAULT NULL,
  `chatMois` int(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB AUTO_INCREMENT=131 DEFAULT CHARSET=utf8;

--
-- Contenu de la table `animal`
--

INSERT INTO `animal` (`id`, `nom`, `sexe`, `age`, `soin`, `commentaire`, `plus`, `moins`, `okChat`, `okChien`, `okEnfant`, `categorie`, `anneeAdoption`, `chatMois`) VALUES
(4, 'Gala', 2, '0001-11-30 00:00:00', '', '', '', '', 0, 0, 0, 'adopte', '2014-11-30 00:00:00', 0),
(5, 'Joker', 1, '0000-00-00 00:00:00', '', '', '', '', 0, 0, 0, 'adopte', '2015-00-00 00:00:00', 0),
(7, 'Jelly', 2, '0000-00-00 00:00:00', '', '', '', '', 0, 0, 0, 'adopte', '2015-00-00 00:00:00', 0),
(8, 'Jessica', 2, '0000-00-00 00:00:00', '', '', '', '', 0, 0, 0, 'adopte', '2015-00-00 00:00:00', 0),
(9, 'Jook', 1, '0000-00-00 00:00:00', '', '', '', '', 0, 0, 0, 'adopte', '2015-00-00 00:00:00', 0),
(10, 'Inaya', 2, '0000-00-00 00:00:00', '', '', '', '', 0, 0, 0, 'adopte', '2015-00-00 00:00:00', 0),
(11, 'Dyana', 2, '0000-00-00 00:00:00', '', '', '', '', 0, 0, 0, 'adopte', '2015-00-00 00:00:00', 0),
(12, 'Yellow', 1, '0000-00-00 00:00:00', '', '', '', '', 0, 0, 0, 'adopte', '2015-00-00 00:00:00', 0),
(13, 'Nougat', 1, '0000-00-00 00:00:00', '', '', '', '', 0, 0, 0, 'adopte', '2015-00-00 00:00:00', 0),
(15, 'Joliette', 2, '0000-00-00 00:00:00', '', '', '', '', 0, 0, 0, 'adopte', '2015-00-00 00:00:00', 0),
(16, 'Caramel', 1, '0000-00-00 00:00:00', '', '', '', '', 0, 0, 0, 'adopte', '2015-00-00 00:00:00', 0),
(17, 'Jérémi', 1, '0000-00-00 00:00:00', '', '', '', '', 0, 0, 0, 'adopte', '2015-00-00 00:00:00', 0),
(18, 'Jump', 1, '0000-00-00 00:00:00', '', '', '', '', 0, 0, 0, 'adopte', '2015-00-00 00:00:00', 0),
(19, 'Jina', 2, '0000-00-00 00:00:00', '', '', '', '', 0, 0, 0, 'adopte', '2015-00-00 00:00:00', 0),
(20, 'Caramel', 1, '0000-00-00 00:00:00', '', '', '', '', 0, 0, 0, 'adopte', '2015-00-00 00:00:00', 0),
(21, 'Joey', 2, '0000-00-00 00:00:00', '', '', '', '', 0, 0, 0, 'adopte', '2015-00-00 00:00:00', 0),
(22, 'Josh', 1, '0000-00-00 00:00:00', '', '', '', '', 0, 0, 0, 'adopte', '2015-00-00 00:00:00', 0),
(23, 'Safran', 1, '0000-00-00 00:00:00', '', '', '', '', 0, 0, 0, 'adopte', '2015-00-00 00:00:00', 0),
(24, 'Justin', 1, '0000-00-00 00:00:00', '', '', '', '', 0, 0, 0, 'adopte', '2015-00-00 00:00:00', 0),
(25, 'Jonas', 1, '0000-00-00 00:00:00', '', '', '', '', 0, 0, 0, 'adopte', '2015-00-00 00:00:00', 0),
(26, 'Jabba', 1, '0000-00-00 00:00:00', '', '', '', '', 0, 0, 0, 'adopte', '2015-00-00 00:00:00', 0),
(27, 'Jylan', 1, '0000-00-00 00:00:00', '', '', '', '', 0, 0, 0, 'adopte', '2015-00-00 00:00:00', 0),
(28, 'Bifidus', 1, '0000-00-00 00:00:00', '', '', '', '', 0, 0, 0, 'adopte', '2015-00-00 00:00:00', 0),
(29, 'Dougy', 1, '0000-00-00 00:00:00', '', '', '', '', 0, 0, 0, 'adopte', '2015-00-00 00:00:00', 0),
(30, 'Maya', 2, '0000-00-00 00:00:00', '', '', '', '', 0, 0, 0, 'adopte', '2015-00-00 00:00:00', 0),
(31, 'Baobao', 1, '0001-11-30 00:00:00', '', '', '', '', 0, 0, 0, 'adopte', '2014-11-30 00:00:00', 0),
(32, 'Joye', 2, '0000-00-00 00:00:00', '', '', '', '', 0, 0, 0, 'adopte', '2015-00-00 00:00:00', 0),
(33, 'Joly', 2, '0000-00-00 00:00:00', '', '', '', '', 0, 0, 0, 'adopte', '2015-00-00 00:00:00', 0),
(34, 'Iana', 2, '0000-00-00 00:00:00', '', '', '', '', 0, 0, 0, 'adopte', '2015-00-00 00:00:00', 0),
(35, 'Coco', 2, '0000-00-00 00:00:00', '', '', '', '', 0, 0, 0, 'adopte', '2015-00-00 00:00:00', 0),
(36, 'Lucky', 1, '0000-00-00 00:00:00', '', '', '', '', 0, 0, 0, 'adopte', '2015-00-00 00:00:00', 0),
(37, 'Lupo', 1, '0000-00-00 00:00:00', '', '', '', '', 0, 0, 0, 'adopte', '2015-00-00 00:00:00', 0),
(38, 'Sherkhan', 1, '0000-00-00 00:00:00', '', '', '', '', 0, 0, 0, 'adopte', '2015-00-00 00:00:00', 0),
(39, 'Napoleonne', 2, '0000-00-00 00:00:00', '', '', '', '', 0, 0, 0, 'adopte', '2015-00-00 00:00:00', 0),
(40, 'Cookie', 1, '0000-00-00 00:00:00', '', '', '', '', 0, 0, 0, 'adopte', '2015-00-00 00:00:00', 0),
(41, 'Litchie', 2, '0000-00-00 00:00:00', '', '', '', '', 0, 0, 0, 'adopte', '2015-00-00 00:00:00', 0),
(42, 'Loostik', 1, '0000-00-00 00:00:00', '', '', '', '', 0, 0, 0, 'adopte', '2015-00-00 00:00:00', 0),
(43, 'Fifi', 1, '0000-00-00 00:00:00', '', '', '', '', 0, 0, 0, 'adopte', '2015-00-00 00:00:00', 0),
(44, 'Neko', 1, '0000-00-00 00:00:00', '', '', '', '', 0, 0, 0, 'adopte', '2015-00-00 00:00:00', 0),
(45, 'Riri', 1, '0000-00-00 00:00:00', '', '', '', '', 0, 0, 0, 'adopte', '2015-00-00 00:00:00', 0),
(46, 'Loulou', 1, '0000-00-00 00:00:00', '', '', '', '', 0, 0, 0, 'adopte', '2015-00-00 00:00:00', 0),
(47, 'Loukhoum', 1, '0000-00-00 00:00:00', '', '', '', '', 0, 0, 0, 'adopte', '2015-00-00 00:00:00', 0),
(48, 'Luigi', 1, '0000-00-00 00:00:00', '', '', '', '', 0, 0, 0, 'adopte', '2015-00-00 00:00:00', 0),
(49, 'Loullou', 1, '0000-00-00 00:00:00', '', '', '', '', 0, 0, 0, 'adopte', '2015-00-00 00:00:00', 0),
(50, 'Ludo', 1, '0000-00-00 00:00:00', '', '', '', '', 0, 0, 0, 'adopte', '2015-00-00 00:00:00', 0),
(51, 'Judith', 2, '0000-00-00 00:00:00', '', '', '', '', 0, 0, 0, 'adopte', '2015-00-00 00:00:00', 0),
(52, 'Lolita', 2, '0000-00-00 00:00:00', '', '', '', '', 0, 0, 0, 'adopte', '2015-00-00 00:00:00', 0),
(53, 'Lemon', 1, '0000-00-00 00:00:00', '', '', '', '', 0, 0, 0, 'adopte', '2015-00-00 00:00:00', 0),
(54, 'Lucinda', 2, '0000-00-00 00:00:00', '', '', '', '', 0, 0, 0, 'adopte', '2015-00-00 00:00:00', 0),
(55, 'Link', 1, '0000-00-00 00:00:00', '', '', '', '', 0, 0, 0, 'adopte', '2015-00-00 00:00:00', 0),
(56, 'Koda', 1, '0000-00-00 00:00:00', '', '', '', '', 0, 0, 0, 'adopte', '2015-00-00 00:00:00', 0),
(57, 'Lana', 2, '0000-00-00 00:00:00', '', '', '', '', 0, 0, 0, 'adopte', '2015-00-00 00:00:00', 0),
(58, 'Lyla', 2, '0000-00-00 00:00:00', '', '', '', '', 0, 0, 0, 'adopte', '2015-00-00 00:00:00', 0),
(59, 'Poupi', 2, '0000-00-00 00:00:00', '', '', '', '', 0, 0, 0, 'adopte', '2015-00-00 00:00:00', 0),
(60, 'Lana', 2, '0000-00-00 00:00:00', '', '', '', '', 0, 0, 0, 'adopte', '2015-00-00 00:00:00', 0),
(61, 'liam', 2, '0000-00-00 00:00:00', '', '', '', '', 0, 0, 0, 'adopte', '2015-00-00 00:00:00', 0),
(62, 'Lysis', 2, '0001-11-30 00:00:00', '', '', '', '', 0, 0, 0, 'adopte', '2014-11-30 00:00:00', 0),
(63, 'Luna', 2, '0000-00-00 00:00:00', '', '', '', '', 0, 0, 0, 'adopte', '2015-00-00 00:00:00', 0),
(64, 'Loulou', 1, '0000-00-00 00:00:00', '', '', '', '', 0, 0, 0, 'adopte', '2015-00-00 00:00:00', 0),
(65, 'Jasmine', 1, '0000-00-00 00:00:00', '', '', '', '', 0, 0, 0, 'adopte', '2015-00-00 00:00:00', 0),
(66, 'Mulan', 1, '0000-00-00 00:00:00', '', '', '', '', 0, 0, 0, 'adopte', '2015-00-00 00:00:00', 0),
(67, 'Lady', 2, '0000-00-00 00:00:00', '', '', '', '', 0, 0, 0, 'adopte', '2015-00-00 00:00:00', 0),
(68, 'Lutin', 1, '0000-00-00 00:00:00', '', '', '', '', 0, 0, 0, 'adopte', '2015-00-00 00:00:00', 0),
(69, 'Filok', 1, '0000-00-00 00:00:00', '', '', '', '', 0, 0, 0, 'adopte', '2015-00-00 00:00:00', 0),
(70, 'Laskar', 1, '0000-00-00 00:00:00', '', '', '', '', 0, 0, 0, 'adopte', '2015-00-00 00:00:00', 0),
(71, 'Lange', 1, '0000-00-00 00:00:00', '', '', '', '', 0, 0, 0, 'adopte', '2015-00-00 00:00:00', 0),
(72, 'Lupin', 1, '0000-00-00 00:00:00', '', '', '', '', 0, 0, 0, 'adopte', '2015-00-00 00:00:00', 0),
(73, 'Loomis', 1, '0000-00-00 00:00:00', '', '', '', '', 0, 0, 0, 'adopte', '2015-00-00 00:00:00', 0),
(74, 'Lizzie', 2, '0000-00-00 00:00:00', '', '', '', '', 0, 0, 0, 'adopte', '2015-00-00 00:00:00', 0),
(75, 'Léonardo', 1, '0000-00-00 00:00:00', '', '', '', '', 0, 0, 0, 'adopte', '2015-00-00 00:00:00', 0),
(77, 'Lirico', 1, '0000-00-00 00:00:00', '', '', '', '', 0, 0, 0, 'adopte', '2015-00-00 00:00:00', 0),
(78, 'Légolas', 1, '0000-00-00 00:00:00', '', '', '', '', 0, 0, 0, 'adopte', '2015-00-00 00:00:00', 0),
(79, 'Louxor', 1, '0000-00-00 00:00:00', '', '', '', '', 0, 0, 0, 'adopte', '2015-00-00 00:00:00', 0),
(80, 'Lotus', 1, '0000-00-00 00:00:00', '', '', '', '', 0, 0, 0, 'adopte', '2015-00-00 00:00:00', 0),
(81, 'Lilith', 2, '0000-00-00 00:00:00', '', '', '', '', 0, 0, 0, 'adopte', '2015-00-00 00:00:00', 0),
(82, 'Lilia', 2, '0000-00-00 00:00:00', '', '', '', '', 0, 0, 0, 'adopte', '2015-00-00 00:00:00', 0),
(83, 'Liricou', 1, '0000-00-00 00:00:00', '', '', '', '', 0, 0, 0, 'adopte', '2015-00-00 00:00:00', 0),
(84, 'Larco', 1, '0000-00-00 00:00:00', '', '', '', '', 0, 0, 0, 'adopte', '2015-00-00 00:00:00', 0),
(85, 'Léonard', 1, '0000-00-00 00:00:00', '', '', '', '', 0, 0, 0, 'adopte', '2015-00-00 00:00:00', 0),
(86, 'Lanzarotte', 1, '0000-00-00 00:00:00', '', '', '', '', 0, 0, 0, 'adopte', '2015-00-00 00:00:00', 0),
(87, 'Lapsus', 1, '0000-00-00 00:00:00', '', '', '', '', 0, 0, 0, 'adopte', '2015-00-00 00:00:00', 0),
(88, 'Lysopaïne', 1, '0000-00-00 00:00:00', '', '', '', '', 0, 0, 0, 'adopte', '2015-00-00 00:00:00', 0),
(89, 'Lola', 2, '0000-00-00 00:00:00', '', '', '', '', 0, 0, 0, 'adopte', '2015-00-00 00:00:00', 0),
(90, 'Lubie', 2, '0000-00-00 00:00:00', '', '', '', '', 0, 0, 0, 'adopte', '2015-00-00 00:00:00', 0),
(91, 'Lakanaï', 1, '0000-00-00 00:00:00', '', '', '', '', 0, 0, 0, 'adopte', '2015-00-00 00:00:00', 0),
(92, 'Lia', 2, '0000-00-00 00:00:00', '', '', '', '', 0, 0, 0, 'adopte', '2015-00-00 00:00:00', 0),
(93, 'Lucky Luke', 1, '0000-00-00 00:00:00', '', '', '', '', 0, 0, 0, 'adopte', '2015-00-00 00:00:00', 0),
(94, 'Loooki', 1, '0000-00-00 00:00:00', '', '', '', '', 0, 0, 0, 'adopte', '2015-00-00 00:00:00', 0),
(95, 'Lenone', 1, '0000-00-00 00:00:00', '', '', '', '', 0, 0, 0, 'adopte', '2015-00-00 00:00:00', 0),
(96, 'Nutsy', 1, '0000-00-00 00:00:00', '', '', '', '', 0, 0, 0, 'adopte', '2015-00-00 00:00:00', 0),
(97, 'Lysette', 2, '0000-00-00 00:00:00', '', '', '', '', 0, 0, 0, 'adopte', '2015-00-00 00:00:00', 0),
(98, 'Lego', 1, '0000-00-00 00:00:00', '', '', '', '', 0, 0, 0, 'adopte', '2015-00-00 00:00:00', 0),
(99, 'Lexie', 2, '0000-00-00 00:00:00', '', '', '', '', 0, 0, 0, 'adopte', '2015-00-00 00:00:00', 0),
(100, 'Lulu', 1, '0000-00-00 00:00:00', '', '', '', '', 0, 0, 0, 'adopte', '2015-00-00 00:00:00', 0),
(101, 'Mogway', 1, '0000-00-00 00:00:00', '', '', '', '', 0, 0, 0, 'adopte', '2015-00-00 00:00:00', 0),
(102, 'Loustik', 1, '0000-00-00 00:00:00', '', '', '', '', 0, 0, 0, 'adopte', '2015-00-00 00:00:00', 0),
(103, 'Kynaï', 1, '0000-00-00 00:00:00', '', '', '', '', 0, 0, 0, 'adopte', '2015-00-00 00:00:00', 0),
(104, 'Laina', 2, '0000-00-00 00:00:00', '', '', '', '', 0, 0, 0, 'adopte', '2015-00-00 00:00:00', 0),
(105, 'Lumpy', 1, '0000-00-00 00:00:00', '', '', '', '', 0, 0, 0, 'adopte', '2015-00-00 00:00:00', 0),
(106, 'Lautus', 1, '0000-00-00 00:00:00', '', '', '', '', 0, 0, 0, 'adopte', '2015-00-00 00:00:00', 0),
(107, 'Lumie', 2, '0000-00-00 00:00:00', '', '', '', '', 0, 0, 0, 'adopte', '2015-00-00 00:00:00', 0),
(108, 'Leeroy', 1, '0000-00-00 00:00:00', '', '', '', '', 0, 0, 0, 'adopte', '2015-00-00 00:00:00', 0),
(109, 'Loggy', 1, '0000-00-00 00:00:00', '', '', '', '', 0, 0, 0, 'adopte', '2015-00-00 00:00:00', 0),
(110, 'Logan', 1, '0000-00-00 00:00:00', '', '', '', '', 0, 0, 0, 'adopte', '2015-00-00 00:00:00', 0),
(111, 'Lino', 1, '0000-00-00 00:00:00', '', '', '', '', 0, 0, 0, 'adopte', '2015-00-00 00:00:00', 0),
(112, 'Lautrec', 1, '0000-00-00 00:00:00', '', '', '', '', 0, 0, 0, 'adopte', '2015-00-00 00:00:00', 0),
(113, 'Lysiane', 2, '0000-00-00 00:00:00', '', '', '', '', 0, 0, 0, 'adopte', '2015-00-00 00:00:00', 0),
(114, 'Lila', 2, '0000-00-00 00:00:00', '', '', '', '', 0, 0, 0, 'adopte', '2015-00-00 00:00:00', 0),
(115, 'Lipton', 1, '0000-00-00 00:00:00', '', '', '', '', 0, 0, 0, 'adopte', '2015-00-00 00:00:00', 0),
(116, 'Lainoa', 2, '0000-00-00 00:00:00', '', '', '', '', 0, 0, 0, 'adopte', '2015-00-00 00:00:00', 0),
(117, 'Licad', 1, '0000-00-00 00:00:00', '', '', '', '', 0, 0, 0, 'adopte', '2015-00-00 00:00:00', 0),
(118, 'Leïa', 2, '0000-00-00 00:00:00', '', '', '', '', 0, 0, 0, 'adopte', '2015-00-00 00:00:00', 0),
(119, 'Mitzi', 2, '2016-01-01 00:00:00', 'aucun', 'MITZI, elle est la première arrivée dans la portée. Sa famille d''accueil a du aider Kristie, la maman, car la demoiselle était très grassouillette.\r\nSa Maman est une X Labrador et son Papa un Border Collie. \r\nVous pouvez la réserver dès aujourd''hui et elle partira à la fin de son sevrage vers 2 mois/2 mois et demi.', 'Elle est très curieuse et aventureuse.', '/', 1, 1, 1, 'adoptionChien', '0000-00-00 00:00:00', 0),
(120, 'Miki', 2, '2016-01-01 00:00:00', 'aucun', 'MIKI , née le 1er Janvier , troisième arrivée ,elle a pris son temps . Maman X Labrador , Papa Border Collie . vous pouvez la réserver dès aujourd''hui ,elle partira à la fin de son seuvrage vers 2 mois ,2 mois et demi', 'Une petite boule de poil toute calme', '', 1, 1, 1, 'adoptionChien', '0000-00-00 00:00:00', 0),
(122, 'Missy', 2, '2016-01-01 00:00:00', 'aucun', 'MISSY , née le 1er Janvier , la dernière arrivée bien longtemps après les autres. Toujours couchée à mes pieds . Maman X Labrador , Papa Border Collie . Vous pouvez la réserver dès aujourd''hui ,elle partira à la fin de son seuvrage vers 2 mois ,2 mois et demi', 'Une adorable petite boule de poil trés proche de l''homme.', '/', 1, 1, 1, 'adoptionChien', '0000-00-00 00:00:00', 0),
(123, 'Junny', 2, '2014-12-01 00:00:00', 'Vaccinée, testée leucose/vih négatif, identifiée par puce électronique, stérilisée et vermifugée.', 'Voici Junny, cette adorable minette a un peu plus d''un an. <br />\r\nC''est une rescapée de la rue qui a maintenant appris à faire confiance aux humains.<br />\r\nEn effet, c''est finalement très agréable de se laisser faire des câlins. <br />\r\nElle toujours vécu en liberté, il lui faudrait donc un coin de jardin.<br />\r\nJoliane mérite de trouver un foyer aimant et attentionné.<br />\r\nElle attend sa famille d''adoption avec grande impatience.\r\n\r\n\r\n\r\n', 'Gourmande surtout lorsqu''il s''agit de pâté.', 'Elle n''aime pas vraiment être soulevée de terre.', 1, 1, 1, 'adoptionChat', '0000-00-00 00:00:00', 0),
(124, 'Kristie', 2, '2014-01-01 00:00:00', 'aucun', 'Voici Kristie, une adorable louloute de 2 ans, croisée de labrador et peut-être d''épagneul ou de border collie.<br />\r\nKrisite a un lourd passif et grâce à sa famille d''accueil elle a pu commencer à reprendre confiance en l''humanité. <br />\r\nElle est craintive et vite terrorisée, mais malgré tout cela, elle est extrêmement gentille et douce.\r\nKristie mérite de trouver un foyer aimant et attentionné à qui elle pourra donner toute sa confiance sans crainte.\r\n', '/', '/', 1, 1, 1, 'adoptionChien', '0000-00-00 00:00:00', 0),
(125, 'Lully', 1, '2015-04-01 00:00:00', 'aucun', 'Voici Lully. Il s''agit d''un chat très gentil, câlin,... bref parfait.<br />\r\nCe loulou a été abandonné chaton dans la cour d''une ferme. <br />\r\nSa famille d''accueil la éduqué et s''est occupé de lui.\r\nMaintenant il recherche une vraie famille qui ne l''abandonnera pas encore une fois.<br />\r\nLully mérite de trouver un foyer aimant et attentionné pour la vie et il vous attend avec impatience.', '/', '/', 1, 1, 1, 'adoptionChaton', '0000-00-00 00:00:00', 0),
(126, 'Poupi', 1, '2006-01-01 00:00:00', 'aucun', 'Voici Poupi, un petit chien croisé terrier qui n''a pas eu une vie facile.\r\nSon maître est parti en maison de retraite en 2014. Il a vécu seul, dans la maison, avec des visites quotidiennes du frère de son maître, qui venait le sortir et le nourrir, pendant de longs mois jusqu''à ce qu''il arrive chez nous.\r\nIl est arrivé en mauvais état et apeuré. \r\nAprès plusieurs mois chez sa famille d''accueil, entouré d''attention et de patience, Poupi se révèle être un petit loulou encore bien vif et affectueux.\r\nPoupi adore la compagnie des chats et est à l''aise avec les chiens calmes.\r\nCe petit loulou écoute et est coopératif si on se montre doux et encourageant avec lui. \r\nIl aura besoin de règles pour pouvoir s''épanouir dans sa famille.\r\nQui donnera sa chance à ce mignon petit chien qui mérite tant d''être heureux ?\r\n\r\n', '/', '/', 1, 1, 1, 'adoptionChien', '0000-00-00 00:00:00', 0),
(127, 'Joliane', 1, '2014-02-03 00:00:00', 'Vaccinée, testée leucose/vih négatif, identifiée par puce électronique, stérilisée et vermifugée.', 'Voici Joliane, une jolie minette tigrée de type européenne.<br />\r\nElle a vécu dans un poulailler jusqu''à ce qu''elle soit recueillie par sa famille d''accueil où elle a pu apprendre les subtilités de la vie en société.<br />\r\nElle répond à son nom, adore chasser (vous savez qui!) et adore les câlins, qu''elle sait d''ailleurs réclamer...<br />\r\nElle est craintive quand elle ne connait pas les gens mais si vous lui laissez le temps de vous découvrir, vous verrez comme elle peut être câline.\r\nJoliane mérite de trouver un foyer aimant et attentionné.<br />\r\nElle toujours vécu en liberté, il lui faudrait donc un coin de jardin.<br />\r\nSi vous voulez œuvrer pour que des chats errants puissent enfin vivre une vraie vie de famille, alors adoptez-là.\r\n', '/', '/', 1, 1, 1, 'adoptionChat', '0000-00-00 00:00:00', 0),
(128, 'Lili', 2, '2015-04-01 00:00:00', '', 'Voici Lili une adorable écaille de tortue. Il s''agit de la sœur de Lola. \r\nLili et Lola sont nées d''une chatte errante, dans un jardin. \r\nElles sont restées là, élevées par leur mère et sous la protection de la propriétaire du jardin.\r\nDepuis, elles ont grandi et sont devenues sociables, gentilles et à la recherche de câlins.\r\nNous cherchons un foyer doux et aimant pour Lili ainsi que pour Lola (le bonheur parfait serait bien entendu qu''elles soient adoptées ensemble).\r\n', '/', '/', 1, 1, 1, 'adoptionChaton', '0000-00-00 00:00:00', 0),
(129, 'Lola', 2, '2015-04-01 00:00:00', 'aucun', 'Voici Lola une adorable minette rousse. Il s''agit de la sœur de Lili. \r\nLola et Lili sont nées d''une chatte errante, dans un jardin. \r\nElles sont restées là, élevées par leur mère et sous la protection de la propriétaire du jardin.\r\nDepuis, elles ont grandi et sont devenues sociables, gentilles et à la recherche de câlins.\r\nNous cherchons un foyer doux et aimant pour Lola ainsi que pour Lili (le bonheur parfait serait bien entendu qu''elles soient adoptées ensemble).\r\n', '/', '/', 1, 1, 1, 'adoptionChaton', '0000-00-00 00:00:00', 0),
(130, 'Larissa', 2, '2015-05-01 00:00:00', 'aucun', '', '/', '/', 1, 1, 1, 'adoptionChaton', '0000-00-00 00:00:00', 0);

-- --------------------------------------------------------

--
-- Structure de la table `page`
--

CREATE TABLE IF NOT EXISTS `page` (
  `id` int(11) NOT NULL,
  `libelle` varchar(30) NOT NULL,
  `titre` varchar(50) NOT NULL,
  `texte` text NOT NULL,
  `historique` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=utf8;

--
-- Contenu de la table `page`
--

INSERT INTO `page` (`id`, `libelle`, `titre`, `texte`, `historique`) VALUES
(1, 'association', 'L''association', '<h2>\r\n		<span class="bleu">31 Pattes d''amour - AMASA</span>\r\n		(association muretaine pour les animaux sans abris) est une association régie par la loi du \r\n		1er juillet 1901 et le décret du 16 août 1901.</br>Elle a été créée le 8 juin 2013 par des personnes touchées par la détresse animale \r\n		et qui ont constaté qu''il n''existait aucune structure juridique propre à la ville de Muret, sous-préfecture, 26000 habitants.\r\n		</br></br>\r\n		<span class="orange">Notre association a pour but,</span> dans la limite de ses moyens financiers et de la capacité d''accueil dont elle dispose:  \r\n		<ul><li>de recueillir, protéger, nourrir, soigner, sociabiliser les chats et chiens abandonnés. Elle les propose ensuite à l''adoption. \r\n		Tous nos animaux sont testés leucose/vih, vaccinés, identifiés par puce électronique, vermifugés, déparasités et stérilisés \r\n		selon leur âge.</li>\r\n		<li>de stériliser les chats errants qui seront ensuite relâchés sur site s''ils sont trop sauvages.</li></ul>\r\n		</br>\r\n		<span class="orange">Notre association fonctionne</span> uniquement grâce à des <span class="bleu">dons</span> et à votre générosité. \r\n		En effet, nous n''avons aucune subvention.. Et aussi grâce à des <span class="bleu">familles d''accueil</span> car nous n''avons ni local, ni refuge.\r\n		</br></br>\r\n\r\n		<span class="orange">Nos moyens humains et financiers étant limités,/span> nous ne pouvons malheureusement répondre à toutes les demandes \r\n		mais nous faisons le maximum.</br></br>\r\n\r\n		<span class="bleu">Jeune association, nous avons beaucoup progressé en peu de temps et cela nous donne encore plus de volonté \r\n		pour continuer...</span>\r\n	</h2>', 0),
(3, 'bureau', 'Le bureau', '<h2>\r\n		<span class="gras souligne">Composition du bureau :</span>\r\n		</br></br>\r\n		<span class="orange">Présidente : </span>Christine Cucchi-Leroy d''Auderic\r\n		</br></br>\r\n		<span class="orange">Trésorière : </span>Hélène Maillebiau\r\n		</br></br>\r\n		<span class="orange">Secrétaire : </span>Ludivine  Priego\r\n		</br></br>\r\n		<span class="bleu">... entourées d''une dynamique équipe de bénévoles, adhérents, sympathisants et de familles d''accueil \r\n		qui font un formidable travail de sociabilisation.</span>\r\n	</h2>', 0),
(4, 'condAdoption', 'Conditions d''adoption', '<h2>\r\n		Adopter un animal c''est prendre une <span class="orange">décision importante</span>. Il faut donc bien réfléchir car vous allez être <span class="orange">responsable</span>, pendant de nombreuses années, d''un <span class="gras">être vivant doué de sensibilité</span>.\r\n		</br></br>\r\n		Nous cherchons avec vous l''animal qui convient le mieux à votre façon de vivre, celui qui sera heureux avec vous.\r\n		</br></br>\r\n		<span class="gras">Une mauvaise adoption fait 2 malheureux :</span> l''adoptant et l''adopté.\r\n		</br></br>\r\n		Quand vous avez pris la décision d''adopter et trouver l''animal ; vous signez avec \r\n		l''association un contrat d''adoption dans lequel vous vous <span class="orange">engagez</span> à lui prodiguer \r\n		<span class="gras">soins et amour</span>. \r\n		Vous vous engagez aussi à faire stériliser ceux qui ne le sont pas au moment de l''adoption \r\n		car trop jeunes <span class="italic">(nous demandons maintenant un chèque de caution de 100 euros qui sera rendu à l''adoptant ou détruit  lorsque nous aurons reçu le certificat de stérilisation ou la facture)</span>.\r\n		</br></br>\r\n		Vous devez nous fournir une pièce d''identité.\r\n		</br></br>\r\n		Pour les chats, vous devez vous munir d''une cage de transport. Aucun chat ne partira s''il n''est pas enfermé.\r\n		Pour les chiens, il faut une laisse et un collier.\r\n		</br></br>\r\n	<h2>\r\n	<h3>\r\n		<span class="orange">Nous vous souhaitons une longue et heureuse vie avec nos protégés.</span>\r\n	</h3>', 0),
(5, 'devFamille', 'Devenir Famille d''accueil', '<h3>\r\n		<span class="orange gras">La famille d''accueil (FA) c''est le nerf de la guerre d''une association qui n''a pas de refuge.</span>\r\n		<br /><br />\r\n	</h3>\r\n	<h2>\r\n		<span class="gras souligne">Son rôle</span>: Quand un animal est récupéré, il doit bien être mis quelque part. Bien souvent, les sauvetages traînent \r\n		car tant que l''on n''a pas de solution d''accueil, on ne peut pas les prendre en charge. Beaucoup d''animaux \r\n		partent en refuge. Alors, imaginons le tableau. Vous avez un animal abandonné (le maître n''en veut plus) ou bien \r\n		il n''a connu que la rue, quelquefois même il a été maltraité. Alors pour le sortir de là vous le prenez et \r\n		vous le mettez en … cage. Vous pensez bien que ça ne l''aide pas à retrouver son équilibre et à surmonter son \r\n		traumatisme.\r\n		<br /><br />\r\n		Et là, arrivent <span class="gras souligne">les familles d''accueil</span>. Elles accueillent des pensionnaires sous leur toit, en prennent soin, \r\n		les intègrent dans leur famille et leur redonnent confiance et éducation. Elles les préparent à l''adoption.\r\n		<br /><br />\r\n		<span class="orange">FAMILLE D''ACCUEIL</span> est une excellente formation. On apprend à observer avec un oeil neuf, à tenir compte\r\n		du passé, à comprendre les réactions et à communiquer dans les 2 sens. Ce qui manque bien souvent, et est à \r\n		l''origine de la plupart des troubles du comportement de nos compagnons. On ne fait donc pas que nourrir et \r\n		héberger un animal... \r\n		<br />\r\n		On lui donne <span class="gras"> seconde chance dans sa vie</span>, on le voit évoluer et progresser au quotidien .. \r\n		<br />\r\n		<span class="bleu">C"est donc, au delà du bénévolat, une relation spéciale et forte qui s''établit avec un poilu et sa FA.</span>\r\n		<br /><br />\r\n	<h2>\r\n	<h3>\r\n		<span class="rouge gras">Malheureusement, les FA ne sont pas encore suffisantes. CA VOUS TENTE ?</span>\r\n	</h3>', 0),
(6, 'adherer', 'Adhérer à l''association', '<h3>En construction.</h3>', 0),
(7, 'don', 'Faire un don', '<h3>En construction.</h3>', 0),
(8, 'parrainer', 'Parrainer un animal', '<h3>En construction.</h3>', 2),
(11, 'test', 'Test', '0', 2),
(19, 'test', 'Test', '1', 3),
(22, 'test', 'Test', '3', 1),
(23, 'test', 'Test', '4', 0),
(24, 'parrainer', 'Parrainer un animal', '<h3>En construction.</h3>blabla', 1),
(25, 'parrainer', 'Parrainer un animal', '<h3>En construction.</h3>', 0);

-- --------------------------------------------------------

--
-- Structure de la table `photo`
--

CREATE TABLE IF NOT EXISTS `photo` (
  `id` int(11) NOT NULL,
  `idAnimal` int(11) NOT NULL,
  `lien` varchar(50) NOT NULL,
  `premiere` int(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB AUTO_INCREMENT=218 DEFAULT CHARSET=utf8;

--
-- Contenu de la table `photo`
--

INSERT INTO `photo` (`id`, `idAnimal`, `lien`, `premiere`) VALUES
(4, 5, 'joker.jpg', 1),
(5, 7, 'jelly.jpg', 1),
(6, 8, 'jessica.jpg', 1),
(7, 9, 'jook.jpg', 1),
(8, 10, 'inaya.jpg', 1),
(9, 11, 'dyana.jpg', 1),
(10, 12, 'yellow.jpg', 1),
(11, 13, 'nougat.jpg', 1),
(13, 15, 'joliette.jpg', 1),
(14, 16, 'caramel.jpg', 1),
(16, 17, 'jeremi.jpg', 1),
(17, 18, 'jump.jpg', 1),
(18, 19, 'jina.jpg', 1),
(19, 20, 'caramel2.jpg', 1),
(20, 21, 'joey.jpg', 1),
(21, 22, 'josh.jpg', 1),
(22, 23, 'safran.jpg', 1),
(23, 24, 'justin.jpg', 1),
(24, 25, 'jonas.jpg', 1),
(25, 26, 'jabba.jpg', 1),
(26, 27, 'jylan.jpg', 1),
(27, 28, 'bifidus.jpg', 1),
(28, 29, 'dougy.jpg', 1),
(29, 30, 'maya.jpg', 1),
(31, 32, 'joye.jpg', 1),
(32, 33, 'joly.jpg', 1),
(33, 34, 'iana.jpg', 1),
(34, 35, 'coco.jpg', 1),
(35, 36, 'lucky.jpg', 1),
(36, 37, 'lupo.jpg', 1),
(37, 38, 'sherkhan.jpg', 1),
(38, 39, 'napoleonne.jpg', 1),
(39, 40, 'cookie.jpg', 1),
(40, 41, 'litchie.jpg', 1),
(41, 42, 'loostik.jpg', 1),
(42, 43, 'fifi.jpg', 1),
(43, 44, 'neko.jpg', 1),
(44, 45, 'riri.jpg', 1),
(45, 46, 'loulou.jpg', 1),
(46, 47, 'loukhoum.jpg', 1),
(47, 48, 'luigi.jpg', 1),
(48, 49, 'loullou.jpg', 1),
(49, 50, 'ludo.jpg', 1),
(50, 51, 'judith.jpg', 1),
(51, 52, 'lolita.jpg', 1),
(52, 53, 'lemon.jpg', 1),
(53, 54, 'lucinda.jpg', 1),
(54, 55, 'link.jpg', 1),
(55, 56, 'koda.jpg', 1),
(56, 57, 'lana.jpg', 1),
(57, 58, 'lyla.jpg', 1),
(58, 59, 'poupy.jpg', 1),
(59, 60, 'lana2.jpg', 1),
(60, 61, 'liam.jpg', 1),
(62, 63, 'luna.jpg', 1),
(63, 64, 'loulou2.jpg', 1),
(64, 65, 'jasmine.jpg', 1),
(65, 66, 'mulan.jpg', 1),
(66, 67, 'lady.jpg', 1),
(67, 68, 'lutin.jpg', 1),
(68, 69, 'filok.jpg', 1),
(69, 70, 'laskar.jpg', 1),
(70, 71, 'lange.jpg', 1),
(71, 72, 'lupin.jpg', 1),
(72, 73, 'loomis.jpg', 1),
(73, 74, 'lizzie.jpg', 1),
(74, 75, 'leonardo.jpg', 1),
(75, 85, 'leonard.jpg', 1),
(76, 77, 'lirico.jpg', 1),
(77, 78, 'legolas.jpg', 1),
(78, 79, 'louxor.jpg', 1),
(79, 80, 'lotus.jpg', 1),
(80, 81, 'lilith.jpg', 1),
(81, 82, 'lilia.jpg', 1),
(82, 83, 'liricou.jpg', 1),
(83, 84, 'larco.jpg', 1),
(84, 86, 'lanzarotte.jpg', 1),
(85, 87, 'lapsus.jpg', 1),
(86, 88, 'lysopaine.jpg', 1),
(87, 89, 'lola.jpg', 1),
(88, 90, 'lubie.jpg', 1),
(89, 91, 'lakanai.jpg', 1),
(90, 92, 'lia.jpg', 1),
(91, 93, 'luckyluke.jpg', 1),
(92, 94, 'looki.jpg', 1),
(93, 95, 'lenone.jpg', 1),
(94, 96, 'nutsy.jpg', 1),
(95, 97, 'lysette.jpg', 1),
(96, 98, 'lego.jpg', 1),
(97, 99, 'lexie.jpg', 1),
(98, 100, 'lulu.jpg', 1),
(99, 101, 'mogway.jpg', 1),
(100, 102, 'loustik.jpg', 1),
(101, 103, 'kynai.jpg', 1),
(102, 104, 'laina.jpg', 1),
(103, 105, 'lumpy.jpg', 1),
(104, 106, 'lautus.jpg', 1),
(105, 107, 'lumie.jpg', 1),
(106, 108, 'leeroy.jpg', 1),
(107, 109, 'loggy.jpg', 1),
(108, 110, 'logan.jpg', 1),
(109, 111, 'lino.jpg', 1),
(110, 112, 'lautrec.jpg', 1),
(111, 113, 'lysiane.jpg', 1),
(112, 114, 'lila.jpg', 1),
(113, 115, 'lipton.jpg', 1),
(114, 116, 'lainoa.jpg', 1),
(115, 117, 'licad.jpg', 1),
(116, 118, 'leia.jpg', 1),
(118, 119, 'mitzi1.jpg', 1),
(119, 119, 'mitzi2.jpg', 0),
(120, 120, 'miki1.jpg', 1),
(121, 120, 'miki2.jpg', 0),
(141, 31, 'baobao.jpg', 1),
(143, 4, 'gala.jpg', 1),
(144, 122, 'missy1.jpg', 1),
(145, 122, 'missy2.jpg', 0),
(168, 62, 'lysis.jpg', 1),
(187, 124, 'kristie1.jpg', 1),
(188, 124, 'kristie2.jpg', 0),
(189, 124, 'kristie3.jpg', 0),
(190, 124, 'kristie4.jpg', 0),
(191, 127, 'joliane1.jpg', 1),
(192, 127, 'joliane2.jpg', 0),
(193, 127, 'joliane3.jpg', 0),
(194, 127, 'joliane4.jpg', 0),
(195, 123, 'juny1.jpg', 1),
(196, 123, 'juny2.jpg', 0),
(197, 123, 'juny3.jpg', 0),
(198, 125, 'lully1.jpg', 1),
(199, 125, 'lully2.jpg', 0),
(200, 125, 'lully3.jpg', 0),
(201, 125, 'lully4.jpg', 0),
(202, 126, 'poupi1.jpg', 1),
(203, 126, 'poupi2.jpg', 0),
(204, 126, 'poupi3.jpg', 0),
(205, 126, 'poupi4.jpg', 0),
(211, 128, 'lili1', 1),
(212, 128, 'lili2', 0),
(213, 128, 'lili3', 0),
(214, 129, 'lola1', 1),
(215, 129, 'lola2', 0),
(216, 130, 'larissa1', 1),
(217, 130, 'larissa2', 0);

--
-- Index pour les tables exportées
--

--
-- Index pour la table `animal`
--
ALTER TABLE `animal`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `page`
--
ALTER TABLE `page`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `photo`
--
ALTER TABLE `photo`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idAnimal` (`idAnimal`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `animal`
--
ALTER TABLE `animal`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=131;
--
-- AUTO_INCREMENT pour la table `page`
--
ALTER TABLE `page`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=26;
--
-- AUTO_INCREMENT pour la table `photo`
--
ALTER TABLE `photo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=218;
--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `photo`
--
ALTER TABLE `photo`
  ADD CONSTRAINT `photo_ibfk_1` FOREIGN KEY (`idAnimal`) REFERENCES `animal` (`id`);



CREATE TABLE IF NOT EXISTS `SOUS_page` (
  `id` int(11) NOT NULL,
  `idPage` int(11) NOT NULL,
  `libelle` varchar(30) NOT NULL,
  `titre` varchar(50) NOT NULL,
  `texte` text NOT NULL,
  `historique` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=utf8;


ALTER TABLE `sous_page`
  ADD PRIMARY KEY (`id`);
