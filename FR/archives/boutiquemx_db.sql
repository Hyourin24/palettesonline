-- phpMyAdmin SQL Dump
-- version 2.7.0-pl1
-- http://www.phpmyadmin.net
-- 
-- Serveur: localhost
-- Généré le : Mardi 07 Février 2006 à 11:53
-- Version du serveur: 5.0.17
-- Version de PHP: 5.1.1
-- 
-- Base de données: `boutiquemx_db`
-- 

-- --------------------------------------------------------

-- 
-- Structure de la table `articles`
-- 

DROP TABLE IF EXISTS `articles`;
CREATE TABLE `articles` (
  `reference` varchar(10) NOT NULL default '',
  `titre` varchar(50) NOT NULL default '',
  `auteur` varchar(50) NOT NULL default '',
  `description` text NOT NULL,
  `rubriqueID` tinyint(4) NOT NULL default '0',
  `prix` decimal(5,2) NOT NULL default '0.00',
  `photo` varchar(50) NOT NULL default '',
  PRIMARY KEY  (`reference`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- 
-- Contenu de la table `articles`
-- 

INSERT INTO `articles` VALUES ('AUTOJMD1', 'Méhari de mon père', 'JM Defrance', 'Livre sur la Méhari', 1, '42.00', 'photo1.jpg');
INSERT INTO `articles` VALUES ('AUTOJMD2', 'Guide de la Méhari', 'JM Defrance', 'Guide technique', 1, '45.00', 'photo2.jpg');
INSERT INTO `articles` VALUES ('INFOAC', 'Dreamweaver MX', 'Arzhur Caousin', 'Le web design', 2, '38.00', 'photo3.jpg');

-- --------------------------------------------------------

-- 
-- Structure de la table `clients`
-- 

DROP TABLE IF EXISTS `clients`;
CREATE TABLE `clients` (
  `ID` smallint(6) NOT NULL auto_increment,
  `nom` varchar(30) NOT NULL default '',
  `prenom` varchar(30) NOT NULL default '',
  `adresse` varchar(50) NOT NULL default '',
  `ville` varchar(50) NOT NULL default '',
  `cp` varchar(5) NOT NULL default '',
  `tel` varchar(20) NOT NULL default '',
  `email` varchar(50) NOT NULL default '',
  `pass` varchar(20) NOT NULL default '',
  `statut` varchar(10) NOT NULL default 'client',
  PRIMARY KEY  (`ID`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

-- 
-- Contenu de la table `clients`
-- 

INSERT INTO `clients` VALUES (1, 'Defrance', 'Jean Marie', '143 rue d''Alésia', 'Paris', '75014', '00000022', 'jmdefrance@eyrolles.com', '1234', 'client');
INSERT INTO `clients` VALUES (3, 'Administrateur', '---', '---', '---', '---', '---', 'admin@eyrolles.com', '1234', 'admin');

-- --------------------------------------------------------

-- 
-- Structure de la table `commandes`
-- 

DROP TABLE IF EXISTS `commandes`;
CREATE TABLE `commandes` (
  `ID` smallint(6) NOT NULL auto_increment,
  `date` date NOT NULL default '0000-00-00',
  `clientID` smallint(6) NOT NULL default '0',
  `etat` enum('Attente','Livre') NOT NULL default 'Attente',
  `total` decimal(5,2) NOT NULL default '0.00',
  PRIMARY KEY  (`ID`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

-- 
-- Contenu de la table `commandes`
-- 

INSERT INTO `commandes` VALUES (1, '2003-04-16', 1, 'Attente', '215.00');
INSERT INTO `commandes` VALUES (2, '2003-04-16', 1, 'Livre', '40.00');
INSERT INTO `commandes` VALUES (3, '2003-05-01', 1, 'Attente', '116.00');
INSERT INTO `commandes` VALUES (4, '2006-02-06', 1, 'Attente', '135.00');

-- --------------------------------------------------------

-- 
-- Structure de la table `listes`
-- 

DROP TABLE IF EXISTS `listes`;
CREATE TABLE `listes` (
  `ID` smallint(6) NOT NULL auto_increment,
  `commandeID` smallint(6) NOT NULL default '0',
  `reference` varchar(10) NOT NULL default '',
  `quantite` tinyint(4) NOT NULL default '0',
  `prixArticle` decimal(5,2) NOT NULL default '0.00',
  PRIMARY KEY  (`ID`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

-- 
-- Contenu de la table `listes`
-- 

INSERT INTO `listes` VALUES (1, 1, 'AUTOJMD1', 2, '80.00');
INSERT INTO `listes` VALUES (2, 1, 'AUTOJMD2', 3, '135.00');
INSERT INTO `listes` VALUES (3, 2, 'AUTOJMD1', 1, '40.00');
INSERT INTO `listes` VALUES (4, 3, 'INFOAC', 2, '76.00');
INSERT INTO `listes` VALUES (5, 3, 'AUTOJMD1', 1, '40.00');
INSERT INTO `listes` VALUES (6, 4, 'AUTOJMD2', 3, '135.00');

-- --------------------------------------------------------

-- 
-- Structure de la table `rubriques`
-- 

DROP TABLE IF EXISTS `rubriques`;
CREATE TABLE `rubriques` (
  `ID` tinyint(4) NOT NULL auto_increment,
  `theme` varchar(20) NOT NULL default '',
  PRIMARY KEY  (`ID`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

-- 
-- Contenu de la table `rubriques`
-- 

INSERT INTO `rubriques` VALUES (1, 'Automobile');
INSERT INTO `rubriques` VALUES (2, 'Informatique');
