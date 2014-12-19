-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Ven 19 Décembre 2014 à 09:21
-- Version du serveur :  5.6.17
-- Version de PHP :  5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données :  `rentree`
--

-- --------------------------------------------------------

--
-- Structure de la table `data`
--

CREATE TABLE IF NOT EXISTS `data` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `identifiant` varchar(256) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `nom_fils` varchar(256) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `prenom_fils` varchar(256) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `ddn_fils` varchar(256) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `tel_mobile` varchar(256) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `courriel` varchar(256) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `date` datetime NOT NULL,
  `ip` varchar(32) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=140 ;

--
-- Contenu de la table `data`
--

INSERT INTO `data` (`id`, `identifiant`, `nom_fils`, `prenom_fils`, `ddn_fils`, `tel_mobile`, `courriel`, `date`, `ip`) VALUES
(132, 'riouallon.vincent@isen.fr', 'riouallon', 'vincent', '12/02/1993', '0658147529', 'riouallon.vincent@isen.fr', '2014-12-19 09:14:31', '127.0.0.1'),
(133, 'gilles.biannic@isen.fr', 'biannic', 'gilles', '10/12/1996', '0314754698', 'gilles.biannic@isen.fr', '2014-12-19 09:15:08', '127.0.0.1'),
(134, 'guy.yann@isen.fr', 'guy', 'yann', '14/08/1996', '0147528693', 'guy.yann@isen.fr', '2014-12-19 09:15:42', '127.0.0.1'),
(135, 'laurent.treguier@isen.fr', 'laurent', 'treguier', '08/05/1997', '0123457896', 'laurent.treguier@isen.fr', '2014-12-19 09:16:16', '127.0.0.1'),
(136, 'jean-pierre.gerval@isen.fr', ' jean-pierre', 'gerval', '01/05/1999', '0141255225', 'jean-pierre.gerval@isen.fr', '2014-12-19 09:17:10', '127.0.0.1'),
(137, 'pierre.yves@isen.fr', 'pierre', 'yves', '10/09/1997', '7894561230', 'pierre.yves@isen.fr', '2014-12-19 09:18:05', '127.0.0.1'),
(138, 'florentin.dubois@isen.fr', 'florentin', 'dubois', '18/07/1997', '4561237890', 'florentin.dubois@isen.fr', '2014-12-19 09:18:43', '127.0.0.1'),
(139, 'remi.collignon@isen.fr', 'remi', 'collignon', '16/12/1996', '7418529660', 'remi.collignon@isen.fr', '2014-12-19 09:19:16', '127.0.0.1');

-- --------------------------------------------------------

--
-- Structure de la table `document`
--

CREATE TABLE IF NOT EXISTS `document` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `rang` int(11) NOT NULL,
  `promo` varchar(256) COLLATE utf8_bin NOT NULL,
  `libelle` varchar(256) COLLATE utf8_bin NOT NULL,
  `fichier` varchar(256) COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=63 ;

--
-- Contenu de la table `document`
--

INSERT INTO `document` (`id`, `rang`, `promo`, `libelle`, `fichier`) VALUES
(1, 1, '', 'Dates des rentrées à l''ISEN-Brest/Rennes', 'datesRentreesISENBrestRennes1213.pdf'),
(2, 2, '', 'Sécurité Sociale étudiante mode d''emploi', 'secuModeEmploi1213.pdf'),
(3, 3, '', 'LMDE', 'LMDErentree2012.pdf'),
(4, 4, '', 'SMEBA', 'SMEBArentree2012.pdf'),
(5, 8, '', 'Isenien : mode d’emploi !', 'livretAccueilBDE.pdf'),
(6, 5, '', 'Offre banque BNP', 'BNPOffreRentree2012.pdf'),
(7, 6, '', 'Offre banque CMB', 'CMBOffreRentree2012.pdf'),
(8, 7, '', 'Offre banque Société Générale', 'SocieteGeneraleOffreRentree2012.pdf'),
(9, 1, 'CSI_A1', 'Informations pratiques', 'A12/infosPratiquesCSI1-CSI2.pdf'),
(10, 1, 'CSI_A2', 'Informations pratiques', 'A12/infosPratiquesCSI1-CSI2.pdf'),
(11, 3, 'CSI_A1', 'Calendrier Classes Préparatoires', 'A12/calendrier1213CSI1-CSI2.pdf'),
(12, 2, 'CSI_A2', 'Calendrier Classes Préparatoires', 'A12/calendrier1213CSI1-CSI2.pdf'),
(13, 3, 'CIR_BREST_A1', 'Calendrier CIR', 'A12/calendrier1213CIR1-CIR2-Brest.pdf'),
(14, 3, 'CIR_RENNES_A1', 'Calendrier CIR', 'A12/calendrier1213CIR1-CIR2-Rennes.pdf'),
(15, 2, 'CIR_BREST_A2', 'Calendrier CIR', 'A12/calendrier1213CIR1-CIR2-Brest.pdf'),
(16, 2, 'CIR_RENNES_A2', 'Calendrier CIR', 'A12/calendrier1213CIR1-CIR2-Rennes.pdf'),
(18, 1, 'CIR_A3_ALT', 'Informations pratiques', 'A345/infosPratiquesCIR3.pdf'),
(19, 1, 'CIR_A3_NONALT', 'Informations pratiques', 'A345/infosPratiquesCIR3.pdf'),
(20, 2, 'CSI_A3', 'Calendrier CSI3', 'A345/calendrier1213CSI3.pdf'),
(21, 2, 'CIR_A3_ALT', 'Calendrier CIR3 alternant', 'A345/calendrier1213CIR3alternant.pdf'),
(22, 2, 'CIR_A3_NONALT', 'Calendrier CIR3 non alternant', 'A345/calendrier1213CIR3nonAlternant.pdf'),
(23, 1, 'ITII_A3', 'Calendrier ITII3', 'A345/calendrier1213ITII3.pdf'),
(24, 7, 'ITII_A3', 'Intégration rentrée', 'A345/integrationRentree2012ITII3-ITII4.pdf'),
(25, 2, 'ITII_A4', 'Intégration rentrée', 'A345/integrationRentree2012ITII3-ITII4.pdf'),
(26, 1, 'ITII_A4', 'Calendrier ITII4', 'A345/calendrier1213ITII4.pdf'),
(27, 1, 'ITII_A5', 'Calendrier ITII5', 'A345/calendrier1213ITII5.pdf'),
(28, 2, 'M_A4', 'Calendrier M1', 'A345/calendrier1213M1.pdf'),
(29, 1, 'CSI_A3', 'Informations pratiques', 'A345/infosPratiquesCSI3-M1-M2.pdf'),
(30, 1, 'M_A4', 'Informations pratiques', 'A345/infosPratiquesCSI3-M1-M2.pdf'),
(31, 1, 'M_A5_ALT', 'Informations pratiques', 'A345/infosPratiquesCSI3-M1-M2.pdf'),
(32, 1, 'M_A5_NONALT', 'Informations pratiques', 'A345/infosPratiquesCSI3-M1-M2.pdf'),
(33, 2, 'M_A5_ALT', 'Calendrier M2 alternant', 'A345/calendrier1213M2alternant.pdf'),
(34, 2, 'M_A5_NONALT', 'Calendrier M2 non alternant', 'A345/calendrier1213M2nonAlternant.pdf'),
(35, 4, 'CIR_BREST_A1', 'Annonce ordinateur portable', 'A12/courrierAnnoncePortable2012CIR1.pdf'),
(36, 4, 'CIR_RENNES_A1', 'Annonce ordinateur portable', 'A12/courrierAnnoncePortable2012CIR1.pdf'),
(37, 5, 'CIR_BREST_A1', 'Contrat de mise à disposition ordinateur portable', 'A12/contratMiseDispositionPortable2012CIR1.pdf'),
(38, 5, 'CIR_RENNES_A1', 'Contrat de mise à disposition ordinateur portable', 'A12/contratMiseDispositionPortable2012CIR1.pdf'),
(39, 6, 'CIR_BREST_A1', 'Note d''information assurance ordinateur portable', 'A12/noteInformationAssurancePortable2012CIR1.pdf'),
(40, 6, 'CIR_RENNES_A1', 'Note d''information assurance ordinateur portable', 'A12/noteInformationAssurancePortable2012CIR1.pdf'),
(41, 1, 'CIR_BREST_A1', 'Informations pratiques', 'A12/infosPratiquesCIR1-CIR2.pdf'),
(42, 1, 'CIR_RENNES_A1', 'Informations pratiques', 'A12/infosPratiquesCIR1-CIR2.pdf'),
(43, 1, 'CIR_BREST_A2', 'Informations pratiques', 'A12/infosPratiquesCIR1-CIR2.pdf'),
(44, 1, 'CIR_RENNES_A2', 'Informations pratiques', 'A12/infosPratiquesCIR1-CIR2.pdf'),
(45, 2, 'CSI_A1', 'Affaires sociales étudiantes', 'A12/affairesSocialesEtudiantesCSI1-CIR1-BTS1.pdf'),
(46, 2, 'CIR_BREST_A1', 'Affaires sociales étudiantes', 'A12/affairesSocialesEtudiantesCSI1-CIR1-BTS1.pdf'),
(47, 2, 'CIR_RENNES_A1', 'Affaires sociales étudiantes', 'A12/affairesSocialesEtudiantesCSI1-CIR1-BTS1.pdf'),
(48, 1, 'BTSPREPA_A1', 'Affaires sociales étudiantes', 'A12/affairesSocialesEtudiantesCSI1-CIR1-BTS1.pdf'),
(49, 4, 'CSI_A1', 'Intégration', 'A12/integrationCSI1-BTS1-CIR1-Brest.pdf'),
(50, 2, 'BTSPREPA_A1', 'Intégration', 'A12/integrationCSI1-BTS1-CIR1-Brest.pdf'),
(51, 7, 'CIR_BREST_A1', 'Intégration', 'A12/integrationCSI1-BTS1-CIR1-Brest.pdf'),
(52, 3, 'CSI_A3', 'Annonce ordinateur portable', 'A345/courrierAnnoncePortable2012CSI3-ITII3.pdf'),
(53, 2, 'ITII_A3', 'Annonce ordinateur portable', 'A345/courrierAnnoncePortable2012CSI3-ITII3.pdf'),
(54, 4, 'CSI_A3', 'Dossier ordinateur portable', 'A345/dossierOrdinateurPortable2012CSI3-ITII3.pdf'),
(55, 3, 'ITII_A3', 'Dossier ordinateur portable', 'A345/dossierOrdinateurPortable2012CSI3-ITII3.pdf'),
(56, 5, 'CSI_A3', 'Bon de commande ordinateur portable', 'A345/bonDeCommandePortable2012CSI3-ITII3.pdf'),
(57, 4, 'ITII_A3', 'Bon de commande ordinateur portable', 'A345/bonDeCommandePortable2012CSI3-ITII3.pdf'),
(58, 6, 'CSI_A3', 'Note d''information assurance ordinateur portable', 'A345/noteInformationAssurancePortable2012CSI3-ITII3.pdf'),
(59, 5, 'ITII_A3', 'Note d''information assurance ordinateur portable', 'A345/noteInformationAssurancePortable2012CSI3-ITII3.pdf'),
(60, 7, 'CSI_A3', 'Fiche d''adhésion assurance ordinateur portable', 'A345/ficheAdhesionAssurancePortable2012CSI3-ITII3.pdf'),
(61, 6, 'ITII_A3', 'Fiche d''adhésion assurance ordinateur portable', 'A345/ficheAdhesionAssurancePortable2012CSI3-ITII3.pdf'),
(62, 9, '', 'Le mot du bureau des sports', 'BDS.pdf');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
