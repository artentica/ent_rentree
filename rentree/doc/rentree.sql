-- phpMyAdmin SQL Dump
-- version 2.6.2-pl1
-- http://www.phpmyadmin.net
-- 
-- Serveur: localhost
-- Généré le : Lundi 27 Août 2012 à 16:25
-- Version du serveur: 5.0.22
-- Version de PHP: 5.1.6
-- 
-- Base de données: `rentree`
-- 

-- --------------------------------------------------------

-- 
-- Structure de la table `data`
-- 

CREATE TABLE `data` (
  `id` int(11) NOT NULL auto_increment,
  `identifiant` varchar(256) character set utf8 collate utf8_bin NOT NULL,
  `nom_fils` varchar(256) character set utf8 collate utf8_bin NOT NULL,
  `prenom_fils` varchar(256) character set utf8 collate utf8_bin NOT NULL,
  `ddn_fils` varchar(256) character set utf8 collate utf8_bin NOT NULL,
  `tel_mobile` varchar(256) character set utf8 collate utf8_bin NOT NULL,
  `courriel` varchar(256) character set utf8 collate utf8_bin NOT NULL,
  `date` datetime NOT NULL,
  `ip` varchar(32) character set utf8 collate utf8_bin NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=132 ;

-- 
-- Contenu de la table `data`
-- 

-- --------------------------------------------------------

-- 
-- Structure de la table `document`
-- 

CREATE TABLE `document` (
  `id` int(11) NOT NULL auto_increment,
  `rang` int(11) NOT NULL,
  `promo` varchar(256) collate utf8_bin NOT NULL,
  `libelle` varchar(256) collate utf8_bin NOT NULL,
  `fichier` varchar(256) collate utf8_bin NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=63 ;

-- 
-- Contenu de la table `document`
-- 

INSERT INTO `document` VALUES (1, 1, '', 0x4461746573206465732072656e7472c3a9657320c3a0206c274953454e2d42726573742f52656e6e6573, 0x646174657352656e74726565734953454e427265737452656e6e6573313231332e706466);
INSERT INTO `document` VALUES (2, 2, '', 0x53c3a96375726974c3a920536f6369616c6520c3a974756469616e7465206d6f6465206427656d706c6f69, 0x736563754d6f6465456d706c6f69313231332e706466);
INSERT INTO `document` VALUES (3, 3, '', 0x4c4d4445, 0x4c4d444572656e74726565323031322e706466);
INSERT INTO `document` VALUES (4, 4, '', 0x534d454241, 0x534d45424172656e74726565323031322e706466);
INSERT INTO `document` VALUES (5, 8, '', 0x4973656e69656e203a206d6f64652064e28099656d706c6f692021, 0x6c69767265744163637565696c4244452e706466);
INSERT INTO `document` VALUES (6, 5, '', 0x4f666672652062616e71756520424e50, 0x424e504f6666726552656e74726565323031322e706466);
INSERT INTO `document` VALUES (7, 6, '', 0x4f666672652062616e71756520434d42, 0x434d424f6666726552656e74726565323031322e706466);
INSERT INTO `document` VALUES (8, 7, '', 0x4f666672652062616e71756520536f6369c3a974c3a92047c3a96ec3a972616c65, 0x536f636965746547656e6572616c654f6666726552656e74726565323031322e706466);
INSERT INTO `document` VALUES (9, 1, 0x4353495f4131, 0x496e666f726d6174696f6e7320707261746971756573, 0x4131322f696e666f73507261746971756573435349312d435349322e706466);
INSERT INTO `document` VALUES (10, 1, 0x4353495f4132, 0x496e666f726d6174696f6e7320707261746971756573, 0x4131322f696e666f73507261746971756573435349312d435349322e706466);
INSERT INTO `document` VALUES (11, 3, 0x4353495f4131, 0x43616c656e647269657220436c6173736573205072c3a970617261746f69726573, 0x4131322f63616c656e647269657231323133435349312d435349322e706466);
INSERT INTO `document` VALUES (12, 2, 0x4353495f4132, 0x43616c656e647269657220436c6173736573205072c3a970617261746f69726573, 0x4131322f63616c656e647269657231323133435349312d435349322e706466);
INSERT INTO `document` VALUES (13, 3, 0x4349525f42524553545f4131, 0x43616c656e647269657220434952, 0x4131322f63616c656e647269657231323133434952312d434952322d42726573742e706466);
INSERT INTO `document` VALUES (14, 3, 0x4349525f52454e4e45535f4131, 0x43616c656e647269657220434952, 0x4131322f63616c656e647269657231323133434952312d434952322d52656e6e65732e706466);
INSERT INTO `document` VALUES (15, 2, 0x4349525f42524553545f4132, 0x43616c656e647269657220434952, 0x4131322f63616c656e647269657231323133434952312d434952322d42726573742e706466);
INSERT INTO `document` VALUES (16, 2, 0x4349525f52454e4e45535f4132, 0x43616c656e647269657220434952, 0x4131322f63616c656e647269657231323133434952312d434952322d52656e6e65732e706466);
INSERT INTO `document` VALUES (18, 1, 0x4349525f41335f414c54, 0x496e666f726d6174696f6e7320707261746971756573, 0x413334352f696e666f73507261746971756573434952332e706466);
INSERT INTO `document` VALUES (19, 1, 0x4349525f41335f4e4f4e414c54, 0x496e666f726d6174696f6e7320707261746971756573, 0x413334352f696e666f73507261746971756573434952332e706466);
INSERT INTO `document` VALUES (20, 2, 0x4353495f4133, 0x43616c656e64726965722043534933, 0x413334352f63616c656e647269657231323133435349332e706466);
INSERT INTO `document` VALUES (21, 2, 0x4349525f41335f414c54, 0x43616c656e6472696572204349523320616c7465726e616e74, 0x413334352f63616c656e64726965723132313343495233616c7465726e616e742e706466);
INSERT INTO `document` VALUES (22, 2, 0x4349525f41335f4e4f4e414c54, 0x43616c656e64726965722043495233206e6f6e20616c7465726e616e74, 0x413334352f63616c656e647269657231323133434952336e6f6e416c7465726e616e742e706466);
INSERT INTO `document` VALUES (23, 1, 0x495449495f4133, 0x43616c656e6472696572204954494933, 0x413334352f63616c656e64726965723132313349544949332e706466);
INSERT INTO `document` VALUES (24, 7, 0x495449495f4133, 0x496e74c3a967726174696f6e2072656e7472c3a965, 0x413334352f696e746567726174696f6e52656e747265653230313249544949332d49544949342e706466);
INSERT INTO `document` VALUES (25, 2, 0x495449495f4134, 0x496e74c3a967726174696f6e2072656e7472c3a965, 0x413334352f696e746567726174696f6e52656e747265653230313249544949332d49544949342e706466);
INSERT INTO `document` VALUES (26, 1, 0x495449495f4134, 0x43616c656e6472696572204954494934, 0x413334352f63616c656e64726965723132313349544949342e706466);
INSERT INTO `document` VALUES (27, 1, 0x495449495f4135, 0x43616c656e6472696572204954494935, 0x413334352f63616c656e64726965723132313349544949352e706466);
INSERT INTO `document` VALUES (28, 2, 0x4d5f4134, 0x43616c656e6472696572204d31, 0x413334352f63616c656e6472696572313231334d312e706466);
INSERT INTO `document` VALUES (29, 1, 0x4353495f4133, 0x496e666f726d6174696f6e7320707261746971756573, 0x413334352f696e666f73507261746971756573435349332d4d312d4d322e706466);
INSERT INTO `document` VALUES (30, 1, 0x4d5f4134, 0x496e666f726d6174696f6e7320707261746971756573, 0x413334352f696e666f73507261746971756573435349332d4d312d4d322e706466);
INSERT INTO `document` VALUES (31, 1, 0x4d5f41355f414c54, 0x496e666f726d6174696f6e7320707261746971756573, 0x413334352f696e666f73507261746971756573435349332d4d312d4d322e706466);
INSERT INTO `document` VALUES (32, 1, 0x4d5f41355f4e4f4e414c54, 0x496e666f726d6174696f6e7320707261746971756573, 0x413334352f696e666f73507261746971756573435349332d4d312d4d322e706466);
INSERT INTO `document` VALUES (33, 2, 0x4d5f41355f414c54, 0x43616c656e6472696572204d3220616c7465726e616e74, 0x413334352f63616c656e6472696572313231334d32616c7465726e616e742e706466);
INSERT INTO `document` VALUES (34, 2, 0x4d5f41355f4e4f4e414c54, 0x43616c656e6472696572204d32206e6f6e20616c7465726e616e74, 0x413334352f63616c656e6472696572313231334d326e6f6e416c7465726e616e742e706466);
INSERT INTO `document` VALUES (35, 4, 0x4349525f42524553545f4131, 0x416e6e6f6e6365206f7264696e617465757220706f727461626c65, 0x4131322f636f757272696572416e6e6f6e6365506f727461626c6532303132434952312e706466);
INSERT INTO `document` VALUES (36, 4, 0x4349525f52454e4e45535f4131, 0x416e6e6f6e6365206f7264696e617465757220706f727461626c65, 0x4131322f636f757272696572416e6e6f6e6365506f727461626c6532303132434952312e706466);
INSERT INTO `document` VALUES (37, 5, 0x4349525f42524553545f4131, 0x436f6e74726174206465206d69736520c3a020646973706f736974696f6e206f7264696e617465757220706f727461626c65, 0x4131322f636f6e747261744d697365446973706f736974696f6e506f727461626c6532303132434952312e706466);
INSERT INTO `document` VALUES (38, 5, 0x4349525f52454e4e45535f4131, 0x436f6e74726174206465206d69736520c3a020646973706f736974696f6e206f7264696e617465757220706f727461626c65, 0x4131322f636f6e747261744d697365446973706f736974696f6e506f727461626c6532303132434952312e706466);
INSERT INTO `document` VALUES (39, 6, 0x4349525f42524553545f4131, 0x4e6f7465206427696e666f726d6174696f6e206173737572616e6365206f7264696e617465757220706f727461626c65, 0x4131322f6e6f7465496e666f726d6174696f6e4173737572616e6365506f727461626c6532303132434952312e706466);
INSERT INTO `document` VALUES (40, 6, 0x4349525f52454e4e45535f4131, 0x4e6f7465206427696e666f726d6174696f6e206173737572616e6365206f7264696e617465757220706f727461626c65, 0x4131322f6e6f7465496e666f726d6174696f6e4173737572616e6365506f727461626c6532303132434952312e706466);
INSERT INTO `document` VALUES (41, 1, 0x4349525f42524553545f4131, 0x496e666f726d6174696f6e7320707261746971756573, 0x4131322f696e666f73507261746971756573434952312d434952322e706466);
INSERT INTO `document` VALUES (42, 1, 0x4349525f52454e4e45535f4131, 0x496e666f726d6174696f6e7320707261746971756573, 0x4131322f696e666f73507261746971756573434952312d434952322e706466);
INSERT INTO `document` VALUES (43, 1, 0x4349525f42524553545f4132, 0x496e666f726d6174696f6e7320707261746971756573, 0x4131322f696e666f73507261746971756573434952312d434952322e706466);
INSERT INTO `document` VALUES (44, 1, 0x4349525f52454e4e45535f4132, 0x496e666f726d6174696f6e7320707261746971756573, 0x4131322f696e666f73507261746971756573434952312d434952322e706466);
INSERT INTO `document` VALUES (45, 2, 0x4353495f4131, 0x416666616972657320736f6369616c657320c3a974756469616e746573, 0x4131322f6166666169726573536f6369616c65734574756469616e746573435349312d434952312d425453312e706466);
INSERT INTO `document` VALUES (46, 2, 0x4349525f42524553545f4131, 0x416666616972657320736f6369616c657320c3a974756469616e746573, 0x4131322f6166666169726573536f6369616c65734574756469616e746573435349312d434952312d425453312e706466);
INSERT INTO `document` VALUES (47, 2, 0x4349525f52454e4e45535f4131, 0x416666616972657320736f6369616c657320c3a974756469616e746573, 0x4131322f6166666169726573536f6369616c65734574756469616e746573435349312d434952312d425453312e706466);
INSERT INTO `document` VALUES (48, 1, 0x42545350524550415f4131, 0x416666616972657320736f6369616c657320c3a974756469616e746573, 0x4131322f6166666169726573536f6369616c65734574756469616e746573435349312d434952312d425453312e706466);
INSERT INTO `document` VALUES (49, 4, 0x4353495f4131, 0x496e74c3a967726174696f6e, 0x4131322f696e746567726174696f6e435349312d425453312d434952312d42726573742e706466);
INSERT INTO `document` VALUES (50, 2, 0x42545350524550415f4131, 0x496e74c3a967726174696f6e, 0x4131322f696e746567726174696f6e435349312d425453312d434952312d42726573742e706466);
INSERT INTO `document` VALUES (51, 7, 0x4349525f42524553545f4131, 0x496e74c3a967726174696f6e, 0x4131322f696e746567726174696f6e435349312d425453312d434952312d42726573742e706466);
INSERT INTO `document` VALUES (52, 3, 0x4353495f4133, 0x416e6e6f6e6365206f7264696e617465757220706f727461626c65, 0x413334352f636f757272696572416e6e6f6e6365506f727461626c6532303132435349332d49544949332e706466);
INSERT INTO `document` VALUES (53, 2, 0x495449495f4133, 0x416e6e6f6e6365206f7264696e617465757220706f727461626c65, 0x413334352f636f757272696572416e6e6f6e6365506f727461626c6532303132435349332d49544949332e706466);
INSERT INTO `document` VALUES (54, 4, 0x4353495f4133, 0x446f7373696572206f7264696e617465757220706f727461626c65, 0x413334352f646f73736965724f7264696e6174657572506f727461626c6532303132435349332d49544949332e706466);
INSERT INTO `document` VALUES (55, 3, 0x495449495f4133, 0x446f7373696572206f7264696e617465757220706f727461626c65, 0x413334352f646f73736965724f7264696e6174657572506f727461626c6532303132435349332d49544949332e706466);
INSERT INTO `document` VALUES (56, 5, 0x4353495f4133, 0x426f6e20646520636f6d6d616e6465206f7264696e617465757220706f727461626c65, 0x413334352f626f6e4465436f6d6d616e6465506f727461626c6532303132435349332d49544949332e706466);
INSERT INTO `document` VALUES (57, 4, 0x495449495f4133, 0x426f6e20646520636f6d6d616e6465206f7264696e617465757220706f727461626c65, 0x413334352f626f6e4465436f6d6d616e6465506f727461626c6532303132435349332d49544949332e706466);
INSERT INTO `document` VALUES (58, 6, 0x4353495f4133, 0x4e6f7465206427696e666f726d6174696f6e206173737572616e6365206f7264696e617465757220706f727461626c65, 0x413334352f6e6f7465496e666f726d6174696f6e4173737572616e6365506f727461626c6532303132435349332d49544949332e706466);
INSERT INTO `document` VALUES (59, 5, 0x495449495f4133, 0x4e6f7465206427696e666f726d6174696f6e206173737572616e6365206f7264696e617465757220706f727461626c65, 0x413334352f6e6f7465496e666f726d6174696f6e4173737572616e6365506f727461626c6532303132435349332d49544949332e706466);
INSERT INTO `document` VALUES (60, 7, 0x4353495f4133, 0x4669636865206427616468c3a973696f6e206173737572616e6365206f7264696e617465757220706f727461626c65, 0x413334352f66696368654164686573696f6e4173737572616e6365506f727461626c6532303132435349332d49544949332e706466);
INSERT INTO `document` VALUES (61, 6, 0x495449495f4133, 0x4669636865206427616468c3a973696f6e206173737572616e6365206f7264696e617465757220706f727461626c65, 0x413334352f66696368654164686573696f6e4173737572616e6365506f727461626c6532303132435349332d49544949332e706466);
INSERT INTO `document` VALUES (62, 9, '', 0x4c65206d6f7420647520627572656175206465732073706f727473, 0x4244532e706466);
