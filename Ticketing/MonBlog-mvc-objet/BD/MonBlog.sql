/* Testé sous MySQL 5.x */

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

DROP TABLE IF EXISTS `T_COMMENTAIRE`;
CREATE TABLE `T_COMMENTAIRE` (
  `COM_ID` int(11) NOT NULL AUTO_INCREMENT,
  `COM_DATE` datetime NOT NULL,
  `COM_AUTEUR` varchar(100) NOT NULL,
  `COM_CONTENU` varchar(200) NOT NULL,
  `TIC_ID` int(11) NOT NULL,
  PRIMARY KEY (`COM_ID`),
  KEY `fk_com_TIC` (`TIC_ID`),
  CONSTRAINT `fk_com_TIC` FOREIGN KEY (`TIC_ID`) REFERENCES `T_ticket` (`TIC_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `T_COMMENTAIRE` (`COM_ID`, `COM_DATE`, `COM_AUTEUR`, `COM_CONTENU`, `TIC_ID`) VALUES
(1,	'2021-10-05 16:34:35',	'A. Nonyme',	'Bravo pour ce début',	1),
(2,	'2021-10-05 16:34:35',	'Moi',	'Merci ! Je vais continuer sur ma lancée',	1);

SET NAMES utf8mb4;

DROP TABLE IF EXISTS `T_ETAT`;
CREATE TABLE `T_ETAT` (
  `ETAT_ID` int(11) NOT NULL AUTO_INCREMENT,
  `ETAT_LIB` varchar(33) NOT NULL,
  PRIMARY KEY (`ETAT_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `T_ETAT` (`ETAT_ID`, `ETAT_LIB`) VALUES
(1,	'[en cours]'),
(2,	'[ouvert]'),
(3,	'[fermé]');

DROP TABLE IF EXISTS `T_ticket`;
CREATE TABLE `T_ticket` (
  `TIC_ID` int(11) NOT NULL AUTO_INCREMENT,
  `TIC_DATE` datetime NOT NULL,
  `TIC_TITRE` varchar(100) NOT NULL,
  `TIC_CONTENU` varchar(400) NOT NULL,
  `URG_ID` int(11) NOT NULL,
  `ETAT_ID` int(11) NOT NULL,
  PRIMARY KEY (`TIC_ID`),
  KEY `ETAT_ID` (`ETAT_ID`),
  KEY `URG_ID` (`URG_ID`),
  CONSTRAINT `T_ticket_ibfk_2` FOREIGN KEY (`URG_ID`) REFERENCES `T_URGENCES` (`URG_ID`),
  CONSTRAINT `T_ticket_ibfk_3` FOREIGN KEY (`ETAT_ID`) REFERENCES `T_ETAT` (`ETAT_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `T_ticket` (`TIC_ID`, `TIC_DATE`, `TIC_TITRE`, `TIC_CONTENU`, `URG_ID`, `ETAT_ID`) VALUES
(1,	'2021-10-05 16:34:35',	'Premier ticket',	'Problème licence logiciel',	1,	1),
(2,	'2021-10-05 16:34:35',	'Ticket 2',	'Il y a une panne de réseau',	2,	2);

DROP TABLE IF EXISTS `T_URGENCES`;
CREATE TABLE `T_URGENCES` (
  `URG_ID` int(11) NOT NULL AUTO_INCREMENT,
  `URG_JOUR` int(11) NOT NULL,
  `URG_DATE` datetime NOT NULL,
  `URG_LIB` varchar(200) NOT NULL,
  PRIMARY KEY (`URG_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `T_URGENCES` (`URG_ID`, `URG_JOUR`, `URG_DATE`, `URG_LIB`) VALUES
(1,	4,	'2021-10-05 16:34:35',	'bas'),
(2,	8,	'2021-10-05 16:34:35',	'normal'),
(3,	10,	'2021-10-05 16:34:35',	'eleve');