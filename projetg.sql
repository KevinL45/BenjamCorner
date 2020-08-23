-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  jeu. 25 avr. 2019 à 15:45
-- Version du serveur :  5.7.19
-- Version de PHP :  5.6.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `projetg`
--

-- --------------------------------------------------------

--
-- Structure de la table `annonce`
--

DROP TABLE IF EXISTS `annonce`;
CREATE TABLE IF NOT EXISTS `annonce` (
  `NumAnn` int(11) NOT NULL AUTO_INCREMENT,
  `contenu` varchar(255) COLLATE utf8_bin NOT NULL,
  `Pseudo` char(80) COLLATE utf8_bin NOT NULL,
  `NumT` int(11) DEFAULT NULL,
  `TitreT` char(60) COLLATE utf8_bin DEFAULT NULL,
  PRIMARY KEY (`NumAnn`),
  KEY `FK_Annonce_Pseudo` (`Pseudo`),
  KEY `FK_Annonce_numT` (`NumT`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Déchargement des données de la table `annonce`
--

INSERT INTO `annonce` (`NumAnn`, `contenu`, `Pseudo`, `NumT`, `TitreT`) VALUES
(1, 'Le Brésil, la République démocratique du Congo, l\'Indonésie, la Colombie et la Bolivie sont particulièrement concernés par la destruction de la forêt tropicale primaire.', 'kevin45', 7, 'Les forêts tropicales continuent à disparaître à grands pas'),
(2, 'A Vladivostok, Poutine s\'est favorable à un rétablissement complet des relations avec l\'Ukraine. Cette décision fait suite à l\'élection dimanche du nouveau président ukrainien, Volodymyr Zelensky', 'Guish', 11, 'Vladimir Poutine'),
(3, 'Le vieil homme à la moustache blanche, qui paraissait immortel pour les habitants du duché, avait incarné la résistance aux Allemands et la volonté de construire une Union européenne.', 'Shaly', 7, 'Le grand-duc Jean de Luxembourg');

-- --------------------------------------------------------

--
-- Structure de la table `article`
--

DROP TABLE IF EXISTS `article`;
CREATE TABLE IF NOT EXISTS `article` (
  `NumArt` int(11) NOT NULL AUTO_INCREMENT,
  `Titre` char(50) COLLATE utf8_bin NOT NULL,
  `Contenu` char(255) COLLATE utf8_bin NOT NULL,
  `dateArt` date NOT NULL,
  `image` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `Pseudo` char(80) COLLATE utf8_bin NOT NULL,
  `numT` int(11) NOT NULL,
  PRIMARY KEY (`NumArt`),
  KEY `FK_Article_Pseudo` (`Pseudo`),
  KEY `FK_Article_numT` (`numT`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Déchargement des données de la table `article`
--

INSERT INTO `article` (`NumArt`, `Titre`, `Contenu`, `dateArt`, `image`, `Pseudo`, `numT`) VALUES
(7, 'Les maths du chat de P. Geluck', 'Une belle conférence sur les maths du Chat de Philippe Geluck, par Daniel Justens. Le jeudi 4 avril 2019, en salle Léonard de Vinci.', '2019-04-04', 'http://www.lycee-benjamin-franklin.fr/php5/spip/local/cache-vignettes/L340xH340/la-mathematique-du-chat-cb35a.jpg', 'Guish', 1),
(8, 'Contre \"l’idée de Dieu\"', 'Le philosophe Harold Bernat s\'oppose à la possible introduction dans le programme de philosophie des classes terminales. Il y voit un recul potentiel de la pensée critique.', '2019-04-04', 'https://static.latribune.fr/full_width/965677/philo.jpg', 'kevin45', 3),
(9, 'Don de sang', 'Aujourd’hui, il n’existe aucun traitement ni médicament de synthèse capable de se substituer au sang humain et aux produits sanguins labiles (PSL), issus des dons de sang. Cet acte volontaire et bénévole est donc irremplaçable.\r\n\r\n', '2019-04-04', 'https://www.mairie-rumilly74.fr/wp-content/uploads/2018/06/2018-don-du-sang-750x364.png', 'kevin45', 2),
(10, 'Petit stage de maths pendant les vacances', 'Un stage de mathématiques ( soutien ou consolidation) est organisé les lundi 8 et mardi 9 avril 2019. \r\nIl est ouvert à tous les niveaux. \r\n', '2019-04-04', 'http://www.lycee-benjamin-franklin.fr/php5/spip/local/cache-vignettes/L100xH100/math-c4eec.gif', 'Guish', 1),
(11, 'Lycée Benjamin-Franklin d\'Orléans', 'Le lycée Benjamin-Franklin est un établissement d\'enseignement secondaire et supérieur français de l\'académie d\'Orléans-Tours situé dans le centre-ville d\'Orléans,le lycée est souvent nommé Benjam\'.', '2019-04-04', 'https://upload.wikimedia.org/wikipedia/fr/thumb/e/e2/Orl%C3%A9ans_Lyc%C3%A9e_Benjamin_Franklin.jpg/280px-Orl%C3%A9ans_Lyc%C3%A9e_Benjamin_Franklin.jpg', 'Guish', 7);

-- --------------------------------------------------------

--
-- Structure de la table `bonsplan`
--

DROP TABLE IF EXISTS `bonsplan`;
CREATE TABLE IF NOT EXISTS `bonsplan` (
  `NumBP` int(11) NOT NULL AUTO_INCREMENT,
  `TitreBP` char(60) COLLATE utf8_bin NOT NULL,
  `ResumeBP` char(255) COLLATE utf8_bin NOT NULL,
  `datebp` date NOT NULL,
  `image` blob,
  `Pseudo` char(80) COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`NumBP`),
  KEY `FK_BonsPlan_Pseudo` (`Pseudo`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Déchargement des données de la table `bonsplan`
--

INSERT INTO `bonsplan` (`NumBP`, `TitreBP`, `ResumeBP`, `datebp`, `image`, `Pseudo`) VALUES
(4, 'Rechercher emploi', 'C’est une idée reçue : avoir grandi avec un clavier et une souris sous la main ne veut pas forcément dire que vous saurez vous débrouiller dans un contexte professionnel.', '2019-04-04', 0x68747470733a2f2f63646e2d732d7777772e6c6570726f677265732e66722f696d616765732f37453346433234392d353639452d343241322d384445422d4434333142443437354141462f4c50525f76315f30322f6d65747472652d656e2d666f726d652d756e2d63762d6e65636573736974652d756e2d7065752d64652d6d6574686f64652d65742d64652d636f6e6e61697373616e6365732d70686f746f2d6c652d70726f677265732d79616e6e2d666f7261792d313535343231383732332e6a7067, 'Guish'),
(6, 'Un très bon PC pour les étudiants', 'Ce PC a un excellent rapport qualité-prix. Pour un tarif somme toute très raisonnable, compact, plutôt bien construit et fini, avec un bel écran, une autonomie très correcte et des performances globales en bureautique tout à fait à la hauteur du prix.', '2019-04-04', 0x68747470733a2f2f647977376e636e7131656e356c2e636c6f756466726f6e742e6e65742f6f7074696d2f70726f64756974732f3135302f35313334392f617375732d7669766f626f6f6b2d7331342d7334333066612d6562303631745f613332643131386337613038373764355f5f3435305f3430302e6a7067, 'kevin45'),
(7, 'Casio Graph 35+ E', 'La Graph 35+E est la meilleure calculatrice graphique pour les 3 ans du lycée, toutes sections confondues. Elle est conforme à la réglementation des examens de l\'enseignement scolaire 2018, dont le baccalauréat.', '2019-04-04', 0x68747470733a2f2f7777772e6275726561752d76616c6c65652e66722f667374727a2f722f732f63646e2e636e6574636f6e74656e742e636f6d2f64642f38662f64643866323533312d616564342d343966632d386464622d6338373964323962346633662e6a70673f66727a2d763d313533, 'kevin45'),
(8, 'Bureau informatique mobile Start Plus piètement bois', 'Optez pour le bureau informatique mobile Start Plus au design sobre. Le modèle se compose d’un plateau pour mettre l’écran de l’ordinateur, d’une tablette coulissante pour le clavier et la souris, d’une autre tablette pour l’imprimante.', '2019-04-04', 0x68747470733a2f2f6272756e6561752e6d656469612f4f4d4d2f496d616765735f42617373655f446566696e6974696f6e2f5a6f6f6d48442f38372f34392f38373439352e6a70673f77696474683d31323030266865696768743d31323030266d6f64653d44656661756c74267175616c6974793d3835267363616c653d75707363616c6563616e766173, 'kevin45'),
(9, 'Carnet Moleskine rigide 13 x 21 cm ivoire ligné 240 pages', 'Inscrivez vos notes dans ce carnet Moleskine rigide et pratique d’utilisation ! Muni d’une couverture en simili cuir noir, ce modèle allie résistance (reliure piquée) et élégance (coins arrondis).', '2019-04-04', 0x68747470733a2f2f6272756e6561752e6d656469612f4f4d4d2f496d616765735f42617373655f446566696e6974696f6e2f5a6f6f6d2f31302f35302f31303530372e6a70673f77696474683d31323030266865696768743d31323030266d6f64653d4d6178267175616c6974793d3835, 'kevin45');

-- --------------------------------------------------------

--
-- Structure de la table `categorie`
--

DROP TABLE IF EXISTS `categorie`;
CREATE TABLE IF NOT EXISTS `categorie` (
  `CodeCat` varchar(15) COLLATE utf8_bin NOT NULL,
  `nom` char(50) COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`CodeCat`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Déchargement des données de la table `categorie`
--

INSERT INTO `categorie` (`CodeCat`, `nom`) VALUES
('AE', 'Assistant d\'éducation'),
('CHEFTRAV', 'Chef de travaux'),
('CPE', 'Conseiller d\'éducation'),
('ENSEIGT', 'Enseignant'),
('ETUD', 'Etudiant'),
('INF', 'Infirmière'),
('LYC', 'Lyceen'),
('PEA', 'Personnel d\'entretien et d\'acueil'),
('PROV', 'Proviseur'),
('PROVAD', 'Proviseur adjoint');

-- --------------------------------------------------------

--
-- Structure de la table `theme`
--

DROP TABLE IF EXISTS `theme`;
CREATE TABLE IF NOT EXISTS `theme` (
  `numT` int(11) NOT NULL,
  `nomtheme` char(80) COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`numT`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Déchargement des données de la table `theme`
--

INSERT INTO `theme` (`numT`, `nomtheme`) VALUES
(1, 'Mathématique'),
(2, 'Science'),
(3, 'Philosophie'),
(4, 'Informatique'),
(5, 'Anglais'),
(6, 'Littérature'),
(7, 'Histoire & Geographie'),
(8, 'Management'),
(9, 'Jeux Vidéos'),
(10, 'Mangas'),
(11, 'Politique'),
(12, 'Multimédia');

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur`
--

DROP TABLE IF EXISTS `utilisateur`;
CREATE TABLE IF NOT EXISTS `utilisateur` (
  `Pseudo` char(80) COLLATE utf8_bin NOT NULL,
  `Nom` char(50) COLLATE utf8_bin NOT NULL,
  `Prenom` char(50) COLLATE utf8_bin NOT NULL,
  `Naissance` date NOT NULL,
  `Adresse` char(100) COLLATE utf8_bin NOT NULL,
  `Postal` char(10) COLLATE utf8_bin NOT NULL,
  `Ville` char(100) COLLATE utf8_bin NOT NULL,
  `mdp` char(255) COLLATE utf8_bin NOT NULL,
  `Email` char(100) COLLATE utf8_bin NOT NULL,
  `CodeCat` varchar(15) COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`Pseudo`),
  KEY `FK_Utilisateur_CodeCat` (`CodeCat`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Déchargement des données de la table `utilisateur`
--

INSERT INTO `utilisateur` (`Pseudo`, `Nom`, `Prenom`, `Naissance`, `Adresse`, `Postal`, `Ville`, `mdp`, `Email`, `CodeCat`) VALUES
('Guish', 'Yang', 'Guillaume', '1999-08-04', '111 de la l\'eau', '45240', 'Orléans', '$2y$10$szUKj5HmQuTpT0eRgXkhnekYkBFcRszt19dInIe0T1Em.pYzFAW/G', 'guish@hotmail.com', 'ETUD'),
('Shaly', 'Yang', 'Richard', '1999-08-02', '111 de la l\'eau', '45140', 'Orléans', '$2y$10$uqSTScMzp.BRFCi4VGumF.Dnrmf4koDk53L9jjXJSiEpel9Ih/lrW', 'shaly@hotmail.fr', 'ETUD'),
('kevin45', 'Lokoka', 'Kevin', '1999-03-12', 'IDK', '45000', 'Boigny', '$2y$10$ibLXkNOCLSckbexNachIouLfkV5ntJNweF.AeEBdUbiqE3kiyn6R.', 'kevlecoq@hotmail.fr', 'PEA');

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `annonce`
--
ALTER TABLE `annonce`
  ADD CONSTRAINT `FK_Annonce_Pseudo` FOREIGN KEY (`Pseudo`) REFERENCES `utilisateur` (`Pseudo`),
  ADD CONSTRAINT `FK_Annonce_numT` FOREIGN KEY (`NumT`) REFERENCES `theme` (`numT`);

--
-- Contraintes pour la table `article`
--
ALTER TABLE `article`
  ADD CONSTRAINT `FK_Article_Pseudo` FOREIGN KEY (`Pseudo`) REFERENCES `utilisateur` (`Pseudo`),
  ADD CONSTRAINT `FK_Article_numT` FOREIGN KEY (`numT`) REFERENCES `theme` (`numT`);

--
-- Contraintes pour la table `bonsplan`
--
ALTER TABLE `bonsplan`
  ADD CONSTRAINT `FK_BonsPlan_Pseudo` FOREIGN KEY (`Pseudo`) REFERENCES `utilisateur` (`Pseudo`);

--
-- Contraintes pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  ADD CONSTRAINT `FK_Utilisateur_CodeCat` FOREIGN KEY (`CodeCat`) REFERENCES `categorie` (`CodeCat`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
