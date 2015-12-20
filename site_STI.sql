-- phpMyAdmin SQL Dump
-- version 4.5.0.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Dec 20, 2015 at 02:11 
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
  `timestamp` int(11) DEFAULT NULL,
  `id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `connectes`
--

INSERT INTO `connectes` (`ip`, `timestamp`, `id`) VALUES
('127.0.0.1', 1450617027, 2);

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
(27, 'sauvegardes/Tom/gradientSobel_Clown.ppm', 24, 'gradientSobel_Clown.ppm'),
(28, 'sauvegardes/Alex/gradientSobel_Sheldon.pgm', 25, 'gradientSobel_Sheldon.pgm'),
(29, 'sauvegardes/Alex/Lena.ppm', 25, 'Lena.ppm'),
(30, 'sauvegardes/Alex/gradientSimple_Lena.ppm', 25, 'gradientSimple_Lena.ppm'),
(31, 'sauvegardes/Bob/clown.ppm', 3, 'clown.ppm'),
(32, 'sauvegardes/Bob/negatif_Clown.ppm', 3, 'negatif_Clown.ppm'),
(41, 'sauvegardes/Bouboulove23/negatif_Sheldon.pgm', 28, 'negatif_Sheldon.pgm'),
(42, 'sauvegardes/Bouboulove23/gradientSimple_Sheldon.pgm', 28, 'gradientSimple_Sheldon.pgm'),
(43, 'sauvegardes/Bouboulove23/Sheldon.pgm', 28, 'Sheldon.pgm'),
(44, 'sauvegardes/Bouboulove23/gradientSimple_Lena.ppm', 28, 'gradientSimple_Lena.ppm'),
(45, 'sauvegardes/admin/Sheldon.pgm', 2, 'Sheldon.pgm'),
(49, 'sauvegardes/admin/homer-simpson.ppm', 2, 'homer-simpson.ppm'),
(50, 'sauvegardes/admin/laplacien_homer-simpson.pgm', 2, 'laplacien_homer-simpson.pgm'),
(51, 'sauvegardes/admin/detectionContoursLaplacien_homer-simpson.pbm', 2, 'detectionContoursLaplacien_homer-simpson.pbm'),
(52, 'sauvegardes/admin/negatif_homer-simpson.ppm', 2, 'negatif_homer-simpson.ppm');

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
(2, 'admin', 'a1z2e3r4t5y6'),
(3, 'Bob', '14753'),
(24, 'Tom', 'mlkj'),
(25, 'Alex', '14753'),
(26, 'alexis', 'alexis'),
(27, 'Vince', 'adshjfir'),
(28, 'Bouboulove23', '1475369'),
(29, 'Alize', '1234'),
(30, 'Fred', 'azfd7'),
(31, 'GÃ©gÃ©', 'filature'),
(32, 'Gertrude', 'sfkg'),
(33, 'Vlad', 'fnsdgun');

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;
--
-- AUTO_INCREMENT for table `profil`
--
ALTER TABLE `profil`
  MODIFY `idProfil` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;
--
-- AUTO_INCREMENT for table `transformations`
--
ALTER TABLE `transformations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
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
