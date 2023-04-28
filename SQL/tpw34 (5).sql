-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : ven. 25 nov. 2022 à 06:55
-- Version du serveur : 5.7.36
-- Version de PHP : 7.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `tpw34`
--

-- --------------------------------------------------------

--
-- Structure de la table `commande`
--

DROP TABLE IF EXISTS `commande`;
CREATE TABLE IF NOT EXISTS `commande` (
  `PK_IdCommande` int(11) NOT NULL AUTO_INCREMENT COMMENT 'id Commande',
  `FK_IdUtilisateur` int(11) NOT NULL COMMENT 'id utilisateur',
  `Fk_IdProduitCommande` int(11) NOT NULL COMMENT 'id produit',
  `CommandeDate` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `CommandeTotal` double NOT NULL COMMENT 'total facture',
  PRIMARY KEY (`PK_IdCommande`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `commande`
--

INSERT INTO `commande` (`PK_IdCommande`, `FK_IdUtilisateur`, `Fk_IdProduitCommande`, `CommandeDate`, `CommandeTotal`) VALUES
(1, 1, 1, '2022-11-19 00:00:00', 574);

-- --------------------------------------------------------

--
-- Structure de la table `produits`
--

DROP TABLE IF EXISTS `produits`;
CREATE TABLE IF NOT EXISTS `produits` (
  `PK_IdProduit` int(11) NOT NULL AUTO_INCREMENT COMMENT 'PK',
  `NomProduit` varchar(40) NOT NULL,
  `InfoProduit` text NOT NULL COMMENT 'Description du voyage',
  `image` varchar(256) DEFAULT NULL COMMENT 'photographie',
  `TempsProduit` int(11) NOT NULL COMMENT 'Durée du voyage',
  `PrixProduit` decimal(10,0) NOT NULL,
  `QteProduit` int(20) NOT NULL COMMENT 'Quantité du produit',
  `FK_IdCategorie` int(11) DEFAULT NULL COMMENT 'FK',
  PRIMARY KEY (`PK_IdProduit`)
) ENGINE=MyISAM AUTO_INCREMENT=33 DEFAULT CHARSET=utf8 COMMENT='TP W34 Web transactionnel';

--
-- Déchargement des données de la table `produits`
--

INSERT INTO `produits` (`PK_IdProduit`, `NomProduit`, `InfoProduit`, `image`, `TempsProduit`, `PrixProduit`, `QteProduit`, `FK_IdCategorie`) VALUES
(1, 'Cuba', 'Préparez-vous à faire votre entrée dans un monde à part.<br>Figé dans le temps, Cuba déploie tout son charme dès les premiers instants. Une fois la zone aéroportuaire franchie, la vraie vie cubaine s’ouvre à vous.<br>Les vielles bagnoles déambulent, les écoliers et écolières vêtus de leur joli uniforme gambadent sur le chemin de l’école et les jeunes adultes se courtisent sur un rythme de salsa sous le regard bienveillant des plus anciens qui, un cigare à la bouche, jouent aux échecs à l’ombre d’un arbre du parque central. <br>Il fait beau, il fait chaud, le rhum coule à flots', 'cuba.jpg', 5, '699', 7, 1),
(2, 'Mexique', 'Périple au cœur de la méso-Amérique <br>\r\nTreize sites inscrits au patrimoine mondial de l’UNESCO.<br>\r\nLe plus grand musée archéologique et ethnographique de l’Amérique latine.<br>\r\nVisite approfondie de Palenque, la plus célèbre des cités mayas.<br>\r\nOdyssée historique dans une culture vivante et colorée.', 'mexique.jpg', 7, '1300', 5, 2),
(3, 'Jamaïque', 'Troisième plus grande île des Caraïbes, on appelle aussi la Jamaïque l’île aux 100 000 trésors où mer et montagnes se côtoient.<br>\r\n\r\nBritanniques, Espagnols, Asiatiques, Africains et Taïnos ont façonné l’île, tant par son architecture, sa culture et son mode de vie que par son paysage.<br>\r\nIl est impossible d’y voyager sans goûter à la cuisine jerk ou assister à des concerts de reggae.', 'jamaique.jpg', 10, '1500', 5, 1),
(4, 'Les Alpes', 'Vous envisagez un séjour dans les Alpes ? <br> Hiver comme été, les Alpes sont des montagnes de renommée internationale avec l\'Eiger, le Mont Blanc ou encore le Gran Paradiso...<br>\r\nUn séjour dans les Alpes l\'hiver, c\'est la garantie de skier sur les plus beaux domaines skiables d\'Europe', 'alpes.jpg', 15, '3000', 5, 3),
(12, 'Quebec', 'Y fait frette', NULL, 21, '500', 3, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `utilisateurs`
--

DROP TABLE IF EXISTS `utilisateurs`;
CREATE TABLE IF NOT EXISTS `utilisateurs` (
  `PK_IdUtilisateur` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL COMMENT 'nom d''utilisateur',
  `userpass` varchar(50) NOT NULL COMMENT 'mot de passe',
  `adresse` varchar(250) NOT NULL COMMENT 'Adresse client',
  `level` int(10) DEFAULT NULL,
  PRIMARY KEY (`PK_IdUtilisateur`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COMMENT='Table user Pour TPW34';

--
-- Déchargement des données de la table `utilisateurs`
--

INSERT INTO `utilisateurs` (`PK_IdUtilisateur`, `username`, `userpass`, `adresse`, `level`) VALUES
(1, 'Jessika', '99a1675ae50fd59fda34d83852406b89', '23 rue des tulipes j3j 3j3 qc canada', NULL),
(2, 'Daniel', '3cc31cd246149aec68079241e71e98f6', '123 chu pardu j3j 2h2 Qc Canada', NULL);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
