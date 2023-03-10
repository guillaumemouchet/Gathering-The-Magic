-- Adminer 4.3.1 MySQL dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

DROP TABLE IF EXISTS `cards`;
CREATE TABLE `cards` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `cost` int(11) NOT NULL,
  `type` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `extension` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

INSERT INTO `cards` (`id`, `name`, `cost`, `type`, `description`, `extension`, `timestamp`) VALUES
(1,	'Chandra, Torch of defiance',	4,	'Legendary Planeswalker - Chandra',	'+1 - deal 2 damages to any target',	'Magic Origins',	'0000-00-00 00:00:00'),
(2,	'Yuriko, Tiger\'s shasow',	3,	'Legendary Creature - Ninja',	'{B}{U} Ninjutsu',	'Commander 2018',	'0000-00-00 00:00:00'),
(3,	'Hamza, Guardian of Arashin',	6,	'Legendary Creature - Elephant',	'This spell cost 1 less to cast for each creature with +1/+1 counter on it.',	'Commander Legends',	'0000-00-00 00:00:00'),
(4,	'Sol Ring',	1,	'Artifact',	'{tap} add {C}{C}',	'Commander Collection Green',	'0000-00-00 00:00:00'),
(5,	'Soul of the Harvest',	6,	'Creature - Elemental',	'Tample',	'Jumpstart',	'0000-00-00 00:00:00'),
(6,	'Victory\'s Envoy',	5,	'Creature - Human Cleric',	'At the beginning of your upkeep put a +1/+1 counter on each creature you control.',	'Theros beyond Death',	'0000-00-00 00:00:00'),
(7,	'Beast Whisperer',	4,	'Creature - Elf Druid',	'Whenever you cast a creature spell draw a card',	'Time Spiral',	'0000-00-00 00:00:00'),
(8,	'Cathars\' Crusage',	5,	'Enchantment',	'Whenever a creature enter the battlefield under your control, put a +1/+1 counter on each creature you control.',	'Jumpstart',	'0000-00-00 00:00:00'),
(9,	'Asmoranomardicadaistinaculdacar',	0,	'Legendary Creature - Human',	'As long as you\'ve discarded a card this turn you may pay {B}{R} to cast this card.',	'Modern Horizon 2',	'0000-00-00 00:00:00'),
(10,	'Feasting Troll King',	6,	'Creature - Troll Noble',	'Vigilance, trample',	'Throne of Eldraine',	'0000-00-00 00:00:00'),
(11,	'Cauldron Familiar',	1,	'Creature - Cat',	'Whenever it enter the battlefield deal 1 damage to target opponent and gain 1 life.',	'Throne of Eldraine',	'0000-00-00 00:00:00'),
(12,	'Counterspell',	2,	'Instant',	'Counter target spell',	'M20',	'0000-00-00 00:00:00'),
(15,	'Drogskol Reaver',	7,	'Creature - Spirit',	'Flying, double strike, lifelink',	'Dark ascension',	'0000-00-00 00:00:00'),
(16,	'Lutri Spellchaser',	3,	'Legendary Creature - Otter',	'Companion',	'Ikoria: Lair of Behemoths',	'0000-00-00 00:00:00'),
(26,	'Archon of Sun\'s Grace',	4,	'Creature - Archon',	'Flying, lifelink',	'Theros - Beyond Death',	'2022-06-05 12:21:04'),
(27,	'Seal of Cleansing',	2,	'Enchantment',	'Sacrifice Seal of Cleansing : Destroy target artifact or enchantment.',	'Time Spiral Remastered',	'2022-06-05 19:55:58'),
(28,	'Portable Hole',	3,	'Artifact',	'Exile permanent with 2 or less CMC.',	'Dungeon and Dragon ',	'2022-06-05 20:43:20'),
(29,	'Inquisition of Kozilek',	1,	'Sorcery',	'Target oponnent discard a card with 3 CMC or less from their hand.',	'Mystical Archive',	'2022-06-05 20:44:34'),
(30,	'Soul guiding lantern',	1,	'Artifact',	'',	'Theros Beyond Death',	'2022-06-05 20:54:15'),
(31,	'Lurrus of the DreamRender',	3,	'Legendary Creature Hound',	'Companion',	'Ikoria Behemot Lair',	'2022-06-06 10:30:14'),
(33,	'Urza\'s Saga',	0,	'Legendary Land - Saga',	'Saga Strange Stuff',	'Modern Horizon 2',	'2022-06-06 10:46:04'),
(34,	'Magda, Brazen Outlaws',	2,	'Legendary Creature - Dwarf',	'Whenever a drawf taps create a treasure token.',	'Kaldheim',	'2022-06-06 10:47:40'),
(35,	'Breakneck Berserker',	3,	'Creature - Dwarf Berserker',	'Haste',	'Kaldheim',	'2022-06-15 06:21:15'),
(44,	'Burning-Tree Emissary ',	2,	'Creature - Human Shaman ',	'Add red and green when it enters your battlefied',	'Dungeon and Dragon ',	'2022-06-08 17:59:59'),
(45,	'Thrill of Probability',	2,	'Instant',	'En tant que co????t suppl????mentaire d????fausser vous d\'une carte. Piocher deux cartes.',	'Theros - Beyond Death',	'2022-06-08 18:52:27');

DROP TABLE IF EXISTS `cards_color`;
CREATE TABLE `cards_color` (
  `card_id` int(11) NOT NULL,
  `color_id` int(11) NOT NULL,
  PRIMARY KEY (`card_id`,`color_id`),
  KEY `card_id` (`card_id`),
  KEY `color_id` (`color_id`),
  CONSTRAINT `cards_color_ibfk_2` FOREIGN KEY (`color_id`) REFERENCES `color` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `cards_color_ibfk_3` FOREIGN KEY (`card_id`) REFERENCES `cards` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

INSERT INTO `cards_color` (`card_id`, `color_id`) VALUES
(1,	4),
(2,	2),
(2,	3),
(3,	1),
(3,	5),
(4,	6),
(5,	5),
(6,	1),
(7,	5),
(8,	1),
(9,	3),
(9,	4),
(10,	5),
(11,	3),
(12,	2),
(15,	1),
(15,	2),
(16,	2),
(16,	4),
(26,	1),
(27,	1),
(28,	1),
(29,	3),
(30,	6),
(31,	1),
(31,	3),
(33,	6),
(34,	4),
(35,	4),
(44,	4),
(44,	5),
(45,	4);

DROP TABLE IF EXISTS `color`;
CREATE TABLE `color` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

INSERT INTO `color` (`id`, `name`) VALUES
(1,	'white'),
(2,	'blue'),
(3,	'black'),
(4,	'red'),
(5,	'green'),
(6,	'colorless');

DROP TABLE IF EXISTS `decks`;
CREATE TABLE `decks` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;


DROP TABLE IF EXISTS `user`;
CREATE TABLE `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `password` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `username` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

INSERT INTO `user` (`id`, `password`, `username`) VALUES
(1,	'd74ff0ee8da3b9806b18c877dbf29bbde50b5bd8e4dad7a3a725000feb82e8f1',	'toto'),
(2,	'71ea4dee4c387f40197e36666c87e07890650161455f2932a40fbeec47673cd7',	'aka');

DROP TABLE IF EXISTS `user_cards`;
CREATE TABLE `user_cards` (
  `user_id` int(11) NOT NULL,
  `card_id` int(11) NOT NULL,
  `quantity` int(11) unsigned NOT NULL,
  `owned` enum('true','false') COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`user_id`,`card_id`,`owned`),
  KEY `user_id` (`user_id`),
  KEY `card_id` (`card_id`),
  CONSTRAINT `user_cards_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE,
  CONSTRAINT `user_cards_ibfk_3` FOREIGN KEY (`card_id`) REFERENCES `cards` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

INSERT INTO `user_cards` (`user_id`, `card_id`, `quantity`, `owned`) VALUES
(1,	1,	3,	'true'),
(1,	5,	2,	'true'),
(1,	6,	1,	'true'),
(1,	26,	1,	'true'),
(1,	27,	3,	'true'),
(2,	1,	5,	'true'),
(2,	3,	9,	'true'),
(2,	4,	2,	'true'),
(2,	5,	3,	'true'),
(2,	6,	1,	'true'),
(2,	27,	4,	'true'),
(2,	29,	1,	'true'),
(2,	30,	1,	'true'),
(2,	45,	5,	'false');

DROP TABLE IF EXISTS `user_deck`;
CREATE TABLE `user_deck` (
  `user_id` int(11) NOT NULL,
  `deck_id` int(11) NOT NULL,
  `card_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  KEY `user_id` (`user_id`),
  KEY `deck_id` (`deck_id`),
  KEY `card_id` (`card_id`),
  CONSTRAINT `user_deck_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE,
  CONSTRAINT `user_deck_ibfk_2` FOREIGN KEY (`deck_id`) REFERENCES `decks` (`id`) ON DELETE CASCADE,
  CONSTRAINT `user_deck_ibfk_3` FOREIGN KEY (`card_id`) REFERENCES `cards` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

<<<<<<< HEAD
=======

-- 2022-06-15 06:21:57
>>>>>>> 55e90e4acae98e3f2e9ea395ddaea8eb923fecdd
