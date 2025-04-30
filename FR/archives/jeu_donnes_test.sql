-- phpMyAdmin SQL Dump
-- version 2.7.0-pl1
-- http://www.phpmyadmin.net
-- 
-- Serveur: localhost
-- Généré le : Lundi 06 Février 2006 à 16:23
-- Version du serveur: 5.0.17
-- Version de PHP: 5.1.1
-- 
-- Base de données: `boutiquemx_db`
-- 

-- 
-- Contenu de la table `articles`
-- 

INSERT INTO `articles` VALUES ('AUTOJMD1', 'Méhari de mon père', 'JM Defrance', 'Livre sur la Méhari', 1, '42.00', 'photo1.jpg');
INSERT INTO `articles` VALUES ('AUTOJMD2', 'Guide de la Méhari', 'JM Defrance', 'Guide technique', 1, '45.00', 'photo2.jpg');
INSERT INTO `articles` VALUES ('INFOAC', 'Dreamweaver MX', 'Arzhur Caousin', 'Le web design', 2, '38.00', 'photo3.jpg');

-- 
-- Contenu de la table `clients`
-- 

INSERT INTO `clients` VALUES (1, 'Defrance', 'Jean Marie', '143 rue d''Al?sia', 'Paris', '75014', '00000022', 'jmdefrance@eyrolles.com', '1234', 'client');

-- 
-- Contenu de la table `commandes`
-- 

INSERT INTO `commandes` VALUES (1, '2003-04-16', 1, 'Attente', '215.00');
INSERT INTO `commandes` VALUES (2, '2003-04-16', 1, 'Livre', '40.00');
INSERT INTO `commandes` VALUES (3, '2003-05-01', 1, 'Attente', '116.00');

-- 
-- Contenu de la table `listes`
-- 

INSERT INTO `listes` VALUES (1, 1, 'AUTOJMD1', 2, '80.00');
INSERT INTO `listes` VALUES (2, 1, 'AUTOJMD2', 3, '135.00');
INSERT INTO `listes` VALUES (3, 2, 'AUTOJMD1', 1, '40.00');
INSERT INTO `listes` VALUES (4, 3, 'INFOAC', 2, '76.00');
INSERT INTO `listes` VALUES (5, 3, 'AUTOJMD1', 1, '40.00');

-- 
-- Contenu de la table `rubriques`
-- 

INSERT INTO `rubriques` VALUES (1, 'Automobile');
INSERT INTO `rubriques` VALUES (2, 'Informatique');
