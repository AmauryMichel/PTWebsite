-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Dec 15, 2019 at 02:30 PM
-- Server version: 5.7.26
-- PHP Version: 7.2.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bd_pt`
--

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

DROP TABLE IF EXISTS `category`;
CREATE TABLE IF NOT EXISTS `category` (
  `idCat` int(11) NOT NULL AUTO_INCREMENT,
  `idGroup` int(11) NOT NULL,
  `catName` varchar(30) NOT NULL,
  PRIMARY KEY (`idCat`,`idGroup`) USING BTREE,
  KEY `FK_Group` (`idGroup`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`idCat`, `idGroup`, `catName`) VALUES
(1, 2, 'Politique'),
(2, 1, 'Musique'),
(3, 1, 'Jeu'),
(7, 10, 'qsd'),
(8, 1, 'test'),
(9, 1, 'a'),
(10, 1, 'b'),
(11, 2, 'ab');

-- --------------------------------------------------------

--
-- Table structure for table `comment`
--

DROP TABLE IF EXISTS `comment`;
CREATE TABLE IF NOT EXISTS `comment` (
  `idComment` int(11) NOT NULL AUTO_INCREMENT,
  `idProp` int(11) DEFAULT NULL,
  `idUser` int(11) DEFAULT NULL,
  `text` varchar(500) DEFAULT NULL,
  PRIMARY KEY (`idComment`),
  KEY `FK_Comment_Prop` (`idProp`),
  KEY `FK_Comment_User` (`idUser`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `comment`
--

INSERT INTO `comment` (`idComment`, `idProp`, `idUser`, `text`) VALUES
(1, 2, 5, 'Ceci est un comment'),
(2, 2, 5, 'test'),
(4, 2, 2, 'Je suis d\'accord avec cette proposition'),
(6, 1, 5, 'test'),
(7, 1, 5, 'test2'),
(8, 1, 5, 'bonjour'),
(9, 1, 5, 'qsdqsdqsd'),
(10, 1, 5, 'a'),
(11, 1, 5, 'fuck'),
(12, 1, 5, 'bonjour'),
(13, 1, 5, 'a'),
(14, 2, 5, 'aaqsd'),
(15, 2, 5, 'hello'),
(16, 2, 5, 'salut Daniel');

-- --------------------------------------------------------

--
-- Stand-in structure for view `detailscomment`
-- (See below for the actual view)
--
DROP VIEW IF EXISTS `detailscomment`;
CREATE TABLE IF NOT EXISTS `detailscomment` (
`idComment` int(11)
,`idProp` int(11)
,`idUser` int(11)
,`text` varchar(500)
,`surname` varchar(30)
,`name` varchar(20)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `detailsfriendrequest`
-- (See below for the actual view)
--
DROP VIEW IF EXISTS `detailsfriendrequest`;
CREATE TABLE IF NOT EXISTS `detailsfriendrequest` (
`idUser` int(11)
,`idUser2` int(11)
,`status` varchar(1)
,`surname` varchar(30)
,`name` varchar(20)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `detailsinvitation`
-- (See below for the actual view)
--
DROP VIEW IF EXISTS `detailsinvitation`;
CREATE TABLE IF NOT EXISTS `detailsinvitation` (
`idGroup` int(11)
,`idUser` int(11)
,`link` varchar(10)
,`groupName` varchar(100)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `detailsmember`
-- (See below for the actual view)
--
DROP VIEW IF EXISTS `detailsmember`;
CREATE TABLE IF NOT EXISTS `detailsmember` (
`idGroup` int(11)
,`groupName` varchar(100)
,`idUser` int(11)
,`surname` varchar(30)
,`name` varchar(20)
,`favorite` char(1)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `detailsprop`
-- (See below for the actual view)
--
DROP VIEW IF EXISTS `detailsprop`;
CREATE TABLE IF NOT EXISTS `detailsprop` (
`idProp` int(11)
,`idGroup` int(11)
,`propName` varchar(50)
,`idUser` int(11)
,`surname` varchar(30)
,`name` varchar(20)
,`idCat` int(11)
,`catName` varchar(30)
,`idCat2` int(11)
,`cat2Name` varchar(30)
,`description` varchar(1000)
,`voteFor` int(11)
,`voteAgainst` int(11)
,`dateLimit` date
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `detailsvote`
-- (See below for the actual view)
--
DROP VIEW IF EXISTS `detailsvote`;
CREATE TABLE IF NOT EXISTS `detailsvote` (
`idProp` int(11)
,`idUser` int(11)
,`isFor` char(1)
,`surname` varchar(30)
,`name` varchar(20)
);

-- --------------------------------------------------------

--
-- Table structure for table `friend`
--

DROP TABLE IF EXISTS `friend`;
CREATE TABLE IF NOT EXISTS `friend` (
  `idUser` int(11) NOT NULL,
  `idUser2` int(11) NOT NULL,
  `status` varchar(1) NOT NULL,
  PRIMARY KEY (`idUser`,`idUser2`),
  KEY `FK_Friend_User2` (`idUser2`),
  KEY `FK_Friend_User` (`idUser`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `friend`
--

INSERT INTO `friend` (`idUser`, `idUser2`, `status`) VALUES
(2, 5, '0'),
(6, 2, '1'),
(6, 5, '1');

-- --------------------------------------------------------

--
-- Table structure for table `group`
--

DROP TABLE IF EXISTS `group`;
CREATE TABLE IF NOT EXISTS `group` (
  `idGroup` int(11) NOT NULL AUTO_INCREMENT,
  `idAdmin` int(11) NOT NULL,
  `groupName` varchar(100) NOT NULL,
  PRIMARY KEY (`idGroup`,`idAdmin`),
  KEY `FK_Group_Admin` (`idAdmin`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `group`
--

INSERT INTO `group` (`idGroup`, `idAdmin`, `groupName`) VALUES
(1, 6, 'TP 3A2'),
(2, 5, 'TP 1J'),
(5, 2, 'test'),
(10, 5, 'aqsdsfd');

-- --------------------------------------------------------

--
-- Table structure for table `groupmember`
--

DROP TABLE IF EXISTS `groupmember`;
CREATE TABLE IF NOT EXISTS `groupmember` (
  `idGroup` int(11) NOT NULL,
  `idUser` int(11) NOT NULL,
  `favorite` char(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`idGroup`,`idUser`),
  KEY `FK_GM_User` (`idUser`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `groupmember`
--

INSERT INTO `groupmember` (`idGroup`, `idUser`, `favorite`) VALUES
(1, 2, '0'),
(1, 5, '1'),
(1, 6, '0'),
(2, 5, '0'),
(5, 2, '0');

-- --------------------------------------------------------

--
-- Table structure for table `invitation`
--

DROP TABLE IF EXISTS `invitation`;
CREATE TABLE IF NOT EXISTS `invitation` (
  `idGroup` int(11) NOT NULL,
  `idUser` int(11) NOT NULL,
  `link` varchar(10) NOT NULL,
  PRIMARY KEY (`idGroup`,`idUser`),
  KEY `FK_Invit_User` (`idUser`),
  KEY `FK_Invit_Group` (`idGroup`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `invitation`
--

INSERT INTO `invitation` (`idGroup`, `idUser`, `link`) VALUES
(2, 6, '28dbL5NnyB'),
(5, 5, 'NHVKUyQYyf'),
(5, 6, 'zEO83oREko');

-- --------------------------------------------------------

--
-- Table structure for table `proposition`
--

DROP TABLE IF EXISTS `proposition`;
CREATE TABLE IF NOT EXISTS `proposition` (
  `idProp` int(11) NOT NULL AUTO_INCREMENT,
  `idGroup` int(11) NOT NULL,
  `idUser` int(11) NOT NULL,
  `idCat` int(11) NOT NULL,
  `idCat2` int(11) DEFAULT NULL,
  `propName` varchar(50) NOT NULL,
  `description` varchar(1000) DEFAULT NULL,
  `voteFor` int(11) NOT NULL DEFAULT '0',
  `voteAgainst` int(11) NOT NULL DEFAULT '0',
  `dateLimit` date DEFAULT NULL,
  PRIMARY KEY (`idProp`),
  KEY `FK_Proposition_Cat` (`idCat`),
  KEY `FK_Proposition_Cat2` (`idCat2`),
  KEY `FK_Proposition_Group` (`idGroup`),
  KEY `FK_Proposition_User` (`idUser`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `proposition`
--

INSERT INTO `proposition` (`idProp`, `idGroup`, `idUser`, `idCat`, `idCat2`, `propName`, `description`, `voteFor`, `voteAgainst`, `dateLimit`) VALUES
(1, 1, 5, 3, NULL, 'Proposition test', 'qdsf', 0, 1, NULL),
(2, 1, 5, 3, 1, 'Augmenter le coef de prog web', 'qdsf', 3, 0, NULL),
(3, 1, 5, 2, NULL, 'AmÃ©liorer le S3', NULL, 1, 0, NULL),
(4, 1, 5, 2, NULL, 'tÃ©stssÃ©\"\'', 'Ã¨Ã __-Ã©', 1, 0, NULL),
(5, 1, 5, 2, NULL, 't\'es', NULL, 0, 1, NULL),
(7, 1, 5, 2, NULL, 'téstssé\"\'é', NULL, 0, 0, NULL),
(8, 1, 5, 2, NULL, 'ééé', 'é\"\'-(è_çà', 0, 1, NULL),
(10, 1, 5, 2, NULL, 'éééééééé', NULL, 1, 0, NULL),
(14, 10, 5, 7, NULL, 'qsd', 'qsd', 0, 0, NULL),
(15, 2, 5, 1, 11, 'aaaa', 'Bonjour', 0, 0, '2019-12-12');

-- --------------------------------------------------------

--
-- Table structure for table `reportcomment`
--

DROP TABLE IF EXISTS `reportcomment`;
CREATE TABLE IF NOT EXISTS `reportcomment` (
  `idComment` int(11) NOT NULL,
  `idUser` int(11) NOT NULL,
  PRIMARY KEY (`idComment`,`idUser`),
  KEY `FK_RC_User` (`idUser`),
  KEY `FK_RC_Comment` (`idComment`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `reportcomment`
--

INSERT INTO `reportcomment` (`idComment`, `idUser`) VALUES
(6, 5),
(7, 5),
(11, 5),
(12, 5);

-- --------------------------------------------------------

--
-- Table structure for table `reportprop`
--

DROP TABLE IF EXISTS `reportprop`;
CREATE TABLE IF NOT EXISTS `reportprop` (
  `idProp` int(11) NOT NULL,
  `idUser` int(11) NOT NULL,
  PRIMARY KEY (`idProp`,`idUser`),
  KEY `FK_RP_User` (`idUser`),
  KEY `FK_RP_Prop` (`idProp`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `reportprop`
--

INSERT INTO `reportprop` (`idProp`, `idUser`) VALUES
(1, 5),
(2, 5),
(3, 5),
(5, 5),
(10, 5);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `idUser` int(11) NOT NULL AUTO_INCREMENT,
  `mail` varchar(50) NOT NULL,
  `pass` varchar(256) NOT NULL,
  `surname` varchar(30) NOT NULL,
  `name` varchar(20) NOT NULL,
  `isAdminSite` char(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`idUser`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`idUser`, `mail`, `pass`, `surname`, `name`, `isAdminSite`) VALUES
(2, 'audran.bonnot@u-psud.fr', '$2y$10$FJazFloqs21ZKdeYzcQPpu37eTmXHVjm4YqOIenpH75LPcEIdBQx2', 'BONNOT', 'Audran', '1'),
(5, 'amaury.michel@u-psud.fr', '$2y$10$1aA/TFLG59hQC1oR8raFv.cGHsJnPF9./MW7us9mJNzHQ4nnOM9ui', 'MICHEL', 'Amaury', '0'),
(6, 'Amau78160@gmail.com', '$2y$10$z3qFzuKsz0roheCLthVoiOpGTvLaBfhSO1GtC.jHXXR25J2lPnY0i', 'MICHEL', 'Amaury', '0');

-- --------------------------------------------------------

--
-- Table structure for table `vote`
--

DROP TABLE IF EXISTS `vote`;
CREATE TABLE IF NOT EXISTS `vote` (
  `idProp` int(11) NOT NULL,
  `idUser` int(11) NOT NULL,
  `isFor` char(1) DEFAULT NULL,
  PRIMARY KEY (`idProp`,`idUser`),
  KEY `FK_Vote_User` (`idUser`),
  KEY `FK_Vote_Prop` (`idProp`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `vote`
--

INSERT INTO `vote` (`idProp`, `idUser`, `isFor`) VALUES
(1, 5, '0'),
(2, 2, '1'),
(2, 5, '1'),
(3, 5, '1'),
(4, 5, '1'),
(5, 5, '0'),
(8, 5, '0'),
(10, 5, '1');

--
-- Triggers `vote`
--
DROP TRIGGER IF EXISTS `incVote`;
DELIMITER $$
CREATE TRIGGER `incVote` AFTER INSERT ON `vote` FOR EACH ROW BEGIN
        IF(NEW.isFor = 0) THEN
    UPDATE
        proposition
    SET
        voteAgainst = voteAgainst + 1
    WHERE
        idProp = NEW.idProp; ELSE
    UPDATE
        proposition
    SET
        voteFor = voteFor + 1
    WHERE
        idProp = NEW.idProp;
    END IF;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Structure for view `detailscomment`
--
DROP TABLE IF EXISTS `detailscomment`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `detailscomment`  AS  select `comment`.`idComment` AS `idComment`,`comment`.`idProp` AS `idProp`,`comment`.`idUser` AS `idUser`,`comment`.`text` AS `text`,`user`.`surname` AS `surname`,`user`.`name` AS `name` from ((`comment` join `proposition` on((`comment`.`idProp` = `proposition`.`idProp`))) join `user` on((`comment`.`idUser` = `user`.`idUser`))) ;

-- --------------------------------------------------------

--
-- Structure for view `detailsfriendrequest`
--
DROP TABLE IF EXISTS `detailsfriendrequest`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `detailsfriendrequest`  AS  select `friend`.`idUser` AS `idUser`,`friend`.`idUser2` AS `idUser2`,`friend`.`status` AS `status`,`user`.`surname` AS `surname`,`user`.`name` AS `name` from (`friend` join `user` on((`friend`.`idUser` = `user`.`idUser`))) ;

-- --------------------------------------------------------

--
-- Structure for view `detailsinvitation`
--
DROP TABLE IF EXISTS `detailsinvitation`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `detailsinvitation`  AS  select `invitation`.`idGroup` AS `idGroup`,`invitation`.`idUser` AS `idUser`,`invitation`.`link` AS `link`,`group`.`groupName` AS `groupName` from (`invitation` join `group` on((`invitation`.`idGroup` = `group`.`idGroup`))) ;

-- --------------------------------------------------------

--
-- Structure for view `detailsmember`
--
DROP TABLE IF EXISTS `detailsmember`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `detailsmember`  AS  select `group`.`idGroup` AS `idGroup`,`group`.`groupName` AS `groupName`,`groupmember`.`idUser` AS `idUser`,`user`.`surname` AS `surname`,`user`.`name` AS `name`,`groupmember`.`favorite` AS `favorite` from ((`group` join `groupmember` on((`group`.`idGroup` = `groupmember`.`idGroup`))) join `user` on((`groupmember`.`idUser` = `user`.`idUser`))) ;

-- --------------------------------------------------------

--
-- Structure for view `detailsprop`
--
DROP TABLE IF EXISTS `detailsprop`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `detailsprop`  AS  select `p`.`idProp` AS `idProp`,`p`.`idGroup` AS `idGroup`,`p`.`propName` AS `propName`,`u`.`idUser` AS `idUser`,`u`.`surname` AS `surname`,`u`.`name` AS `name`,`p`.`idCat` AS `idCat`,`c`.`catName` AS `catName`,`p`.`idCat2` AS `idCat2`,`c2`.`catName` AS `cat2Name`,`p`.`description` AS `description`,`p`.`voteFor` AS `voteFor`,`p`.`voteAgainst` AS `voteAgainst`,`p`.`dateLimit` AS `dateLimit` from (((`user` `u` join `proposition` `p` on((`u`.`idUser` = `p`.`idUser`))) left join `category` `c` on((`p`.`idCat` = `c`.`idCat`))) left join `category` `c2` on((`p`.`idCat2` = `c2`.`idCat`))) ;

-- --------------------------------------------------------

--
-- Structure for view `detailsvote`
--
DROP TABLE IF EXISTS `detailsvote`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `detailsvote`  AS  select `proposition`.`idProp` AS `idProp`,`vote`.`idUser` AS `idUser`,`vote`.`isFor` AS `isFor`,`user`.`surname` AS `surname`,`user`.`name` AS `name` from ((`proposition` join `vote` on((`proposition`.`idProp` = `vote`.`idProp`))) join `user` on((`vote`.`idUser` = `user`.`idUser`))) ;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `category`
--
ALTER TABLE `category`
  ADD CONSTRAINT `FK_Cat_Group` FOREIGN KEY (`idGroup`) REFERENCES `group` (`idGroup`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `comment`
--
ALTER TABLE `comment`
  ADD CONSTRAINT `FK_Comment_Prop` FOREIGN KEY (`idProp`) REFERENCES `proposition` (`idProp`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_Comment_User` FOREIGN KEY (`idUser`) REFERENCES `user` (`idUser`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `friend`
--
ALTER TABLE `friend`
  ADD CONSTRAINT `FK_Friend_User` FOREIGN KEY (`idUser`) REFERENCES `user` (`idUser`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_Friend_User2` FOREIGN KEY (`idUser2`) REFERENCES `user` (`idUser`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `group`
--
ALTER TABLE `group`
  ADD CONSTRAINT `FK_Group_Admin` FOREIGN KEY (`idAdmin`) REFERENCES `user` (`idUser`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `groupmember`
--
ALTER TABLE `groupmember`
  ADD CONSTRAINT `FK_GM_Group` FOREIGN KEY (`idGroup`) REFERENCES `group` (`idGroup`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_GM_User` FOREIGN KEY (`idUser`) REFERENCES `user` (`idUser`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `invitation`
--
ALTER TABLE `invitation`
  ADD CONSTRAINT `FK_Invit_Group` FOREIGN KEY (`idGroup`) REFERENCES `group` (`idGroup`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_Invit_User` FOREIGN KEY (`idUser`) REFERENCES `user` (`idUser`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `proposition`
--
ALTER TABLE `proposition`
  ADD CONSTRAINT `FK_Proposition_Cat` FOREIGN KEY (`idCat`) REFERENCES `category` (`idCat`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_Proposition_Cat2` FOREIGN KEY (`idCat2`) REFERENCES `category` (`idCat`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_Proposition_Group` FOREIGN KEY (`idGroup`) REFERENCES `group` (`idGroup`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_Proposition_User` FOREIGN KEY (`idUser`) REFERENCES `user` (`idUser`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `reportcomment`
--
ALTER TABLE `reportcomment`
  ADD CONSTRAINT `FK_RC_Comment` FOREIGN KEY (`idComment`) REFERENCES `comment` (`idComment`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_RC_User` FOREIGN KEY (`idUser`) REFERENCES `user` (`idUser`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `reportprop`
--
ALTER TABLE `reportprop`
  ADD CONSTRAINT `FK_RP_Prop` FOREIGN KEY (`idProp`) REFERENCES `proposition` (`idProp`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_RP_User` FOREIGN KEY (`idUser`) REFERENCES `user` (`idUser`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `vote`
--
ALTER TABLE `vote`
  ADD CONSTRAINT `FK_Vote_Prop` FOREIGN KEY (`idProp`) REFERENCES `proposition` (`idProp`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_Vote_User` FOREIGN KEY (`idUser`) REFERENCES `user` (`idUser`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
