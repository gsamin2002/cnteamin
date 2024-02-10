-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 11, 2024 at 12:45 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cnte_database`
--

-- --------------------------------------------------------

--
-- Table structure for table `directeur`
--

CREATE TABLE `directeur` (
  `Mat_Dir` int(8) NOT NULL,
  `Mdp_Dir` varchar(50) NOT NULL,
  `Nom_Dir` varchar(50) NOT NULL,
  `Pren_Dir` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `directeur`
--

INSERT INTO `directeur` (`Mat_Dir`, `Mdp_Dir`, `Nom_Dir`, `Pren_Dir`) VALUES
(2751597, 'khemaies1969', 'Guesmi', 'Khemaies'),
(10001234, 'hello.2002', 'Arfaoui', 'Asma'),
(14519135, 'amin.2002', 'Guesmi', 'Amine'),
(19652230, 'loli.2002', 'Guesmi', 'Bassem');

-- --------------------------------------------------------

--
-- Table structure for table `eleve`
--

CREATE TABLE `eleve` (
  `Mat_Ele` int(8) NOT NULL,
  `Mdp_Ele` varchar(50) NOT NULL,
  `Nom_Ele` varchar(50) NOT NULL,
  `Pren_Ele` varchar(50) NOT NULL,
  `Sexe_Ele` enum('Féminin','Masculin') NOT NULL,
  `Date_Nais_Ele` date NOT NULL,
  `Nom_Classe_Ele` varchar(50) NOT NULL,
  `Red_Ele` enum('0','1','2','3') NOT NULL,
  `Image_Ele` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `eleve`
--

INSERT INTO `eleve` (`Mat_Ele`, `Mdp_Ele`, `Nom_Ele`, `Pren_Ele`, `Sexe_Ele`, `Date_Nais_Ele`, `Nom_Classe_Ele`, `Red_Ele`, `Image_Ele`) VALUES
(10102540, '7bETbh', 'Mekni', 'Karim', 'Masculin', '2024-02-08', '3C', '1', '10102540.png'),
(10290033, 'O5dZob', 'Boukhili', 'Houssem', '', '2024-01-11', '1A', '3', '10290033.jpg'),
(10443884, 'ZiHZdf', 'Fadhlaoui', 'Maha', 'Féminin', '2024-02-06', '3C', '1', '10443884.png'),
(10483706, 'LZBc8Q', 'Atia', 'Ichrak', 'Féminin', '2024-02-06', '1A', '1', '10483706.png'),
(10548157, 'W9LhN4', 'Guesmi', 'Amine', 'Masculin', '2024-01-03', '3C', '0', '10548157.jpg'),
(10621185, 'CH1Ehh', 'CHRIF', 'Khemaies', 'Masculin', '2024-01-11', 'الأولي أ', '1', '10621185.jpg'),
(10675490, 'JMVgpG', 'Khedhri', 'Alma', 'Féminin', '2024-02-20', '3C', '1', '10675490.png'),
(10752167, 'apDJJo', 'CHRIF', 'Amine', '', '2024-01-24', '3B', '1', '10752167.jpg'),
(10798659, 'driFDn', 'Guesmi', 'Khemaies', '', '2024-01-17', '3C', '1', '10798659.png');

-- --------------------------------------------------------

--
-- Table structure for table `enseignant`
--

CREATE TABLE `enseignant` (
  `Mat_Ens` int(8) NOT NULL,
  `Mdp_Ens` varchar(50) NOT NULL,
  `Nom_Ens` varchar(50) NOT NULL,
  `Pren_Ens` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `enseignant`
--

INSERT INTO `enseignant` (`Mat_Ens`, `Mdp_Ens`, `Nom_Ens`, `Pren_Ens`) VALUES
(14519136, 'karim.2002', 'Mannai', 'Karim');

-- --------------------------------------------------------

--
-- Table structure for table `matiere`
--

CREATE TABLE `matiere` (
  `Nom_Mat` varchar(50) NOT NULL,
  `Note_Mat` decimal(6,2) NOT NULL,
  `Coef_Mat` int(2) NOT NULL,
  `Mat_Ele` int(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `matiere`
--

INSERT INTO `matiere` (`Nom_Mat`, `Note_Mat`, `Coef_Mat`, `Mat_Ele`) VALUES
('Arabe', 12.00, 1, 10798659),
('Français', 10.00, 1, 10798659),
('Anglais', 14.50, 2, 10798659),
('Math', 12.00, 3, 10798659),
('Physique', 1.00, 2, 10798659),
('Histoire', 12.00, 1, 10798659),
('Géographie', 10.00, 1, 10798659),
('Dessin', 14.00, 1, 10798659),
('Musique', 12.00, 1, 10798659),
('Sport', 13.00, 1, 10798659);

-- --------------------------------------------------------

--
-- Table structure for table `observation`
--

CREATE TABLE `observation` (
  `Mat_Ens` int(8) NOT NULL,
  `Mat_Ele` int(8) NOT NULL,
  `Alert_Text` varchar(1000) NOT NULL,
  `Date_Alert` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `observation`
--

INSERT INTO `observation` (`Mat_Ens`, `Mat_Ele`, `Alert_Text`, `Date_Alert`) VALUES
(14519136, 10752167, 'csdfdsfdfdfdsdsfdsfdsfdsklfhdsklgjlsdjkldsjglksjglkjdsklgjdlskjglkdsjg', NULL),
(14519136, 10290033, 'bhim', NULL),
(14519136, 10798659, 'ythyttttttttttttttttttttttttttrythygythythtyhythtrgeftrguthyrtgyuthgtrgyhyr', NULL),
(14519136, 10675490, 'لم ينجز العمله', NULL),
(14519136, 10675490, 'لفسقغيفغفق', NULL),
(14519136, 10290033, '121212121212', NULL),
(14519136, 10102540, 'jhjhhjghgjhgjhgh', '0000-00-00 00:00:00'),
(14519136, 10290033, 'dsdsdsdsd', '2024-02-10 23:55:41');

-- --------------------------------------------------------

--
-- Table structure for table `parent`
--

CREATE TABLE `parent` (
  `Nom_Pere_Ele` varchar(50) NOT NULL,
  `Nom_Mere_Ele` varchar(50) NOT NULL,
  `Tel_Pere_Ele` int(8) NOT NULL,
  `Tel_Mere_Ele` int(8) NOT NULL,
  `Mat_Ele` int(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `parent`
--

INSERT INTO `parent` (`Nom_Pere_Ele`, `Nom_Mere_Ele`, `Tel_Pere_Ele`, `Tel_Mere_Ele`, `Mat_Ele`) VALUES
('Guesmi Youcef', 'lklklkmlk', 15, 525, 10752167),
('Guesmi Youcef', 'Gouta barhoumi', 1000000, 145122222, 10798659),
('nouri', 'hayet', 25152522, 99895665, 10290033),
('dffdsfdsf', 'dsqdsqdsd', 56656565, 56532323, 10548157),
('خميس', 'صليحة', 2515263, 8596523, 10621185),
('hyg', 'popopo', 2012110, 698854, 10483706),
('Guesmi Youcef', 'hahha', 25143225, 21524125, 10443884),
('ati', 'momo', 25142222, 22552255, 10102540),
('mohsen', 'karima', 215252, 2152552, 10675490);

-- --------------------------------------------------------

--
-- Table structure for table `presence`
--

CREATE TABLE `presence` (
  `Date_P` datetime NOT NULL,
  `Statut` varchar(30) NOT NULL,
  `Mat_Ele` int(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `presence`
--

INSERT INTO `presence` (`Date_P`, `Statut`, `Mat_Ele`) VALUES
('2024-02-09 18:09:15', 'Absent(e)', 10548157),
('2024-02-09 18:09:15', 'Absent(e)', 10798659),
('2024-02-09 18:10:00', 'Present(e)', 10752167),
('2024-02-09 18:55:04', 'Present(e)', 10290033),
('2024-02-09 18:55:04', 'Present(e)', 10483706),
('2024-02-09 21:28:39', 'Present(e)', 10102540),
('2024-02-09 21:28:40', 'Absent(e)', 10443884),
('2024-02-09 21:28:40', 'Present(e)', 10548157),
('2024-02-09 21:28:40', 'Present(e)', 10675490),
('2024-02-09 21:28:40', 'Absent(e)', 10798659);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `directeur`
--
ALTER TABLE `directeur`
  ADD PRIMARY KEY (`Mat_Dir`);

--
-- Indexes for table `eleve`
--
ALTER TABLE `eleve`
  ADD PRIMARY KEY (`Mat_Ele`);

--
-- Indexes for table `enseignant`
--
ALTER TABLE `enseignant`
  ADD PRIMARY KEY (`Mat_Ens`);

--
-- Indexes for table `matiere`
--
ALTER TABLE `matiere`
  ADD KEY `Mat_Ele` (`Mat_Ele`);

--
-- Indexes for table `observation`
--
ALTER TABLE `observation`
  ADD KEY `Mat_Ens` (`Mat_Ens`),
  ADD KEY `Mat_Ele` (`Mat_Ele`);

--
-- Indexes for table `parent`
--
ALTER TABLE `parent`
  ADD KEY `Mat_Ele` (`Mat_Ele`);

--
-- Indexes for table `presence`
--
ALTER TABLE `presence`
  ADD KEY `Mat_Ele` (`Mat_Ele`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `matiere`
--
ALTER TABLE `matiere`
  ADD CONSTRAINT `matiere_ibfk_1` FOREIGN KEY (`Mat_Ele`) REFERENCES `eleve` (`Mat_Ele`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `observation`
--
ALTER TABLE `observation`
  ADD CONSTRAINT `observation_ibfk_1` FOREIGN KEY (`Mat_Ele`) REFERENCES `eleve` (`Mat_Ele`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `observation_ibfk_2` FOREIGN KEY (`Mat_Ens`) REFERENCES `enseignant` (`Mat_Ens`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `parent`
--
ALTER TABLE `parent`
  ADD CONSTRAINT `parent_ibfk_1` FOREIGN KEY (`Mat_Ele`) REFERENCES `eleve` (`Mat_Ele`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `presence`
--
ALTER TABLE `presence`
  ADD CONSTRAINT `presence_ibfk_1` FOREIGN KEY (`Mat_Ele`) REFERENCES `eleve` (`Mat_Ele`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
