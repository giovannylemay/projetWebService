-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Ven 23 Octobre 2015 à 21:48
-- Version du serveur :  5.6.17
-- Version de PHP :  5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données :  `webservices`
--
CREATE DATABASE IF NOT EXISTS `webservices` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `webservices`;

-- --------------------------------------------------------

--
-- Structure de la table `author`
--

DROP TABLE IF EXISTS `author`;
CREATE TABLE IF NOT EXISTS `author` (
  `idAuthor` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) DEFAULT NULL,
  `firstname` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`idAuthor`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Vider la table avant d'insérer `author`
--

TRUNCATE TABLE `author`;
--
-- Contenu de la table `author`
--

INSERT INTO `author` (`idAuthor`, `name`, `firstname`) VALUES
(1, 'Name1', 'Firsname1'),
(2, 'Name2', 'Firstname2');

-- --------------------------------------------------------

--
-- Structure de la table `belong`
--

DROP TABLE IF EXISTS `belong`;
CREATE TABLE IF NOT EXISTS `belong` (
  `idBook` int(11) NOT NULL,
  `idPlaylist` int(11) NOT NULL,
  PRIMARY KEY (`idBook`,`idPlaylist`),
  KEY `fk_Book_has_Playlist_Playlist1_idx` (`idPlaylist`),
  KEY `fk_Book_has_Playlist_Book1_idx` (`idBook`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Vider la table avant d'insérer `belong`
--

TRUNCATE TABLE `belong`;
--
-- Contenu de la table `belong`
--

INSERT INTO `belong` (`idBook`, `idPlaylist`) VALUES
(1, 5),
(1, 6),
(2, 6);

-- --------------------------------------------------------

--
-- Structure de la table `book`
--

DROP TABLE IF EXISTS `book`;
CREATE TABLE IF NOT EXISTS `book` (
  `idBook` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(45) DEFAULT NULL,
  `size` varchar(45) DEFAULT NULL,
  `duration` varchar(45) DEFAULT NULL,
  `idKind` int(11) NOT NULL,
  `idSeries` int(11) NOT NULL,
  `idAuthor` int(11) NOT NULL,
  `lien` varchar(255) NOT NULL,
  PRIMARY KEY (`idBook`,`idKind`,`idSeries`,`idAuthor`),
  KEY `fk_Book_Kind_idx` (`idKind`),
  KEY `fk_Book_Series1_idx` (`idSeries`),
  KEY `fk_Book_Author1_idx` (`idAuthor`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- Vider la table avant d'insérer `book`
--

TRUNCATE TABLE `book`;
--
-- Contenu de la table `book`
--

INSERT INTO `book` (`idBook`, `title`, `size`, `duration`, `idKind`, `idSeries`, `idAuthor`, `lien`) VALUES
(1, 'Un coup de rasoir', '100', '100', 1, 1, 1, '../upload/Eugene_Labiche_-_Un_coup_de_rasoir.mp3'),
(2, 'Mr Pivre', '200', '200', 2, 1, 2, '../upload/Alphonse_Allais_-_Mr_Pivre.mp3'),
(3, 'Sur les femmes', '200', '200', 2, 1, 2, '../upload/Denis_Diderot_-_Sur_les_femmes_V2.mp3'),
(4, 'La force des forts', '150', '150', 2, 1, 1, '../upload/London_-_La_force_des_forts.mp3'),
(5, 'L''amateur', '300', '300', 1, 1, 2, '../upload/Moselli_-_L_amateur.mp3');

-- --------------------------------------------------------

--
-- Structure de la table `comment`
--

DROP TABLE IF EXISTS `comment`;
CREATE TABLE IF NOT EXISTS `comment` (
  `idUser` int(11) NOT NULL,
  `idBook` int(11) NOT NULL,
  `comment` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`idUser`,`idBook`),
  KEY `fk_User_has_Book_Book1_idx` (`idBook`),
  KEY `fk_User_has_Book_User1_idx` (`idUser`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Vider la table avant d'insérer `comment`
--

TRUNCATE TABLE `comment`;
-- --------------------------------------------------------

--
-- Structure de la table `kind`
--

DROP TABLE IF EXISTS `kind`;
CREATE TABLE IF NOT EXISTS `kind` (
  `idKind` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) DEFAULT NULL,
  `definition` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`idKind`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Vider la table avant d'insérer `kind`
--

TRUNCATE TABLE `kind`;
--
-- Contenu de la table `kind`
--

INSERT INTO `kind` (`idKind`, `name`, `definition`) VALUES
(1, 'Kind1', 'Kind1'),
(2, 'Kind2', 'Kind2');

-- --------------------------------------------------------

--
-- Structure de la table `lasttime`
--

DROP TABLE IF EXISTS `lasttime`;
CREATE TABLE IF NOT EXISTS `lasttime` (
  `idLast` int(11) NOT NULL AUTO_INCREMENT,
  `time` varchar(45) DEFAULT NULL,
  `idUser` int(11) NOT NULL,
  `idBook` int(11) NOT NULL,
  PRIMARY KEY (`idLast`,`idUser`,`idBook`),
  KEY `fk_lastTime_User1_idx` (`idUser`),
  KEY `fk_lastTime_Book1_idx` (`idBook`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Vider la table avant d'insérer `lasttime`
--

TRUNCATE TABLE `lasttime`;
-- --------------------------------------------------------

--
-- Structure de la table `playlist`
--

DROP TABLE IF EXISTS `playlist`;
CREATE TABLE IF NOT EXISTS `playlist` (
  `idPlaylist` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) DEFAULT NULL,
  `dateCreation` date DEFAULT NULL,
  `idUser` int(11) NOT NULL,
  `idCreator` int(11) DEFAULT NULL,
  PRIMARY KEY (`idPlaylist`,`idUser`),
  KEY `fk_Playlist_User1_idx` (`idUser`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

--
-- Vider la table avant d'insérer `playlist`
--

TRUNCATE TABLE `playlist`;
--
-- Contenu de la table `playlist`
--

INSERT INTO `playlist` (`idPlaylist`, `name`, `dateCreation`, `idUser`, `idCreator`) VALUES
(5, 'Gio', '2015-10-23', 2, 2),
(6, 'Dim', '2015-10-23', 2, 2);

-- --------------------------------------------------------

--
-- Structure de la table `series`
--

DROP TABLE IF EXISTS `series`;
CREATE TABLE IF NOT EXISTS `series` (
  `idSeries` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) DEFAULT NULL,
  `detail` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`idSeries`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Vider la table avant d'insérer `series`
--

TRUNCATE TABLE `series`;
--
-- Contenu de la table `series`
--

INSERT INTO `series` (`idSeries`, `name`, `detail`) VALUES
(1, 'serie', 'serie');

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `idUser` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) DEFAULT NULL,
  `firstname` varchar(45) DEFAULT NULL,
  `email` varchar(45) DEFAULT NULL,
  `password` varchar(45) DEFAULT NULL,
  `isAdmin` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`idUser`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Vider la table avant d'insérer `user`
--

TRUNCATE TABLE `user`;
--
-- Contenu de la table `user`
--

INSERT INTO `user` (`idUser`, `name`, `firstname`, `email`, `password`, `isAdmin`) VALUES
(1, 'Lemay', 'Giovanny', 'giovanny.lemay@gmail.com', 'azerty', 0),
(2, 'admin', 'admin', 'admin@admin.fr', 'admin', 1),
(4, 'test', 'test', 'test@test.fr', 'test', 0);

--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `belong`
--
ALTER TABLE `belong`
  ADD CONSTRAINT `fk_Book_has_Playlist_Book1` FOREIGN KEY (`idBook`) REFERENCES `book` (`idBook`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Book_has_Playlist_Playlist1` FOREIGN KEY (`idPlaylist`) REFERENCES `playlist` (`idPlaylist`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Contraintes pour la table `book`
--
ALTER TABLE `book`
  ADD CONSTRAINT `fk_Book_Author1` FOREIGN KEY (`idAuthor`) REFERENCES `author` (`idAuthor`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Book_Kind` FOREIGN KEY (`idKind`) REFERENCES `kind` (`idKind`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Book_Series1` FOREIGN KEY (`idSeries`) REFERENCES `series` (`idSeries`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Contraintes pour la table `comment`
--
ALTER TABLE `comment`
  ADD CONSTRAINT `fk_User_has_Book_Book1` FOREIGN KEY (`idBook`) REFERENCES `book` (`idBook`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_User_has_Book_User1` FOREIGN KEY (`idUser`) REFERENCES `user` (`idUser`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Contraintes pour la table `lasttime`
--
ALTER TABLE `lasttime`
  ADD CONSTRAINT `fk_lastTime_Book1` FOREIGN KEY (`idBook`) REFERENCES `book` (`idBook`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_lastTime_User1` FOREIGN KEY (`idUser`) REFERENCES `user` (`idUser`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Contraintes pour la table `playlist`
--
ALTER TABLE `playlist`
  ADD CONSTRAINT `fk_Playlist_User1` FOREIGN KEY (`idUser`) REFERENCES `user` (`idUser`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
