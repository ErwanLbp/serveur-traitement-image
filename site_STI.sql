-- phpMyAdmin SQL Dump
-- version 4.5.0.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Nov 25, 2015 at 10:34 
-- Server version: 10.0.17-MariaDB
-- PHP Version: 5.6.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `site_STI`
--

-- --------------------------------------------------------

--
-- Table structure for table `connectes`
--

CREATE TABLE `connectes` (
  `ip` varchar(20) DEFAULT NULL,
  `timestamp` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `connectes`
--

INSERT INTO `connectes` (`ip`, `timestamp`) VALUES
('127.0.0.1', 1448444024);

-- --------------------------------------------------------

--
-- Table structure for table `images`
--

CREATE TABLE `images` (
  `id` int(11) NOT NULL,
  `chemin` varchar(255) NOT NULL DEFAULT '',
  `auteur` int(11) NOT NULL,
  `nom` varchar(100) NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `images`
--

INSERT INTO `images` (`id`, `chemin`, `auteur`, `nom`) VALUES
(4, 'sauvegardes/admin/Sheldon.pgm', 2, 'Sheldon.pgm'),
(18, 'sauvegardes/admin/detectionContoursLaplacien_Sheldon.pbm', 2, 'detectionContoursLaplacien_Sheldon.pbm'),
(19, 'sauvegardes/admin/gradientSimple_Sheldon.pgm', 2, 'gradientSimple_Sheldon.pgm'),
(26, 'sauvegardes/Vince/Lena.ppm', 23, 'Lena.ppm'),
(27, 'sauvegardes/Tom/gradientSobel_Clown.ppm', 24, 'gradientSobel_Clown.ppm'),
(28, 'sauvegardes/Alex/gradientSobel_Sheldon.pgm', 25, 'gradientSobel_Sheldon.pgm'),
(29, 'sauvegardes/Alex/Lena.ppm', 25, 'Lena.ppm'),
(30, 'sauvegardes/Alex/gradientSimple_Lena.ppm', 25, 'gradientSimple_Lena.ppm'),
(31, 'sauvegardes/Bob/clown.ppm', 3, 'clown.ppm'),
(32, 'sauvegardes/Bob/negatif_Clown.ppm', 3, 'negatif_Clown.ppm');

-- --------------------------------------------------------

--
-- Table structure for table `profil`
--

CREATE TABLE `profil` (
  `idProfil` int(11) NOT NULL,
  `pseudo` varchar(30) NOT NULL DEFAULT '',
  `mdp` varchar(20) NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `profil`
--

INSERT INTO `profil` (`idProfil`, `pseudo`, `mdp`) VALUES
(1, 'Erwan', 'azerty'),
(2, 'admin', 'a1z2e3r4t5y6'),
(3, 'Bob', '14753'),
(5, 'Jean', 'bite'),
(6, 'Anais', 'mdp'),
(7, 'Melina', 'aqw'),
(8, 'boby', ''),
(9, 'Francois', ''),
(10, 'Alexis', '1'),
(11, 'Julien', 'caca'),
(12, 'Alexis', 'alexis'),
(13, 'Gator', ''),
(14, 'Jaba', ''),
(23, 'Vince', 'aqwxsz'),
(24, 'Tom', 'mlkj'),
(25, 'Alex', '14753');

-- --------------------------------------------------------

--
-- Table structure for table `transformations`
--

CREATE TABLE `transformations` (
  `id` int(11) NOT NULL,
  `nom` varchar(255) NOT NULL DEFAULT 'no_name',
  `extension` varchar(10) NOT NULL DEFAULT 'egal',
  `auteur` int(11) NOT NULL,
  `description` varchar(255) NOT NULL DEFAULT 'no_description'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transformations`
--

INSERT INTO `transformations` (`id`, `nom`, `extension`, `auteur`, `description`) VALUES
(6, 'symetrieV', 'egal', 2, 'Applique une symÃ©trie verticale'),
(7, 'symetrieH', 'egal', 2, 'Applique une symÃ©trie horizontale'),
(8, 'reductionBruit', '.pgm', 2, 'Reduit le bruit ambiant'),
(9, 'niveauGris', '.pgm', 2, 'Met l''image en niveaux de gris'),
(10, 'negatif', 'egal', 2, 'Applique le filtre nÃ©gatif'),
(11, 'lissage', 'egal', 2, 'Lisse l''image'),
(12, 'laplacien', '.pgm', 2, 'Applique le masque laplacien'),
(13, 'gradientSobel', 'egal', 2, 'Fait le gradient de Sobel'),
(14, 'gradientSimple', 'egal', 2, 'Fait le gradient Simple'),
(15, 'detectionContoursSobel', '.pbm', 2, 'Detecte les contours avec Sobel'),
(16, 'detectionContoursLaplacien', '.pbm', 2, 'Detecte les contours avec le Laplacien'),
(17, 'binarisation', '.pbm', 2, 'Binarise l''image'),
(18, 'ameliorationConstraste', 'egal', 2, 'Ameliore le contraste de l''image');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`id`),
  ADD KEY `auteur` (`auteur`);

--
-- Indexes for table `profil`
--
ALTER TABLE `profil`
  ADD PRIMARY KEY (`idProfil`);

--
-- Indexes for table `transformations`
--
ALTER TABLE `transformations`
  ADD PRIMARY KEY (`id`),
  ADD KEY `auteur` (`auteur`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `images`
--
ALTER TABLE `images`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;
--
-- AUTO_INCREMENT for table `profil`
--
ALTER TABLE `profil`
  MODIFY `idProfil` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
--
-- AUTO_INCREMENT for table `transformations`
--
ALTER TABLE `transformations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `images`
--
ALTER TABLE `images`
  ADD CONSTRAINT `images_ibfk_1` FOREIGN KEY (`auteur`) REFERENCES `profil` (`idProfil`);

--
-- Constraints for table `transformations`
--
ALTER TABLE `transformations`
  ADD CONSTRAINT `transformations_ibfk_1` FOREIGN KEY (`auteur`) REFERENCES `profil` (`idProfil`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
