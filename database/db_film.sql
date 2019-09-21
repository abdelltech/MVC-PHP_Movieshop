-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 01, 2018 at 03:33 PM
-- Server version: 10.1.30-MariaDB
-- PHP Version: 7.2.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `film`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `loginAdmin` varchar(10) NOT NULL,
  `pwAdmin` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`loginAdmin`, `pwAdmin`) VALUES
('abdelwahab', 'developer');

-- --------------------------------------------------------

--
-- Table structure for table `film`
--

CREATE TABLE `film` (
  `idFilm` int(11) NOT NULL,
  `titleFilm` varchar(40) DEFAULT NULL,
  `dateFilm` date DEFAULT NULL,
  `productorFilm` varchar(20) DEFAULT NULL,
  `idGenre` int(10) DEFAULT NULL,
  `durationFilm` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `film`
--

INSERT INTO `film` (`idFilm`, `titleFilm`, `dateFilm`, `productorFilm`, `idGenre`, `durationFilm`) VALUES
(1, 'Le diner de con', '1998-04-15', 'Francis Veber', 1, 90),
(2, 'Intouchable', '2012-03-28', 'Eric Toledano', 1, 125),
(3, 'Piege de cristal', '1988-09-21', 'John McTiernan', 3, 90),
(4, 'THE Indiana Jones', '1989-10-18', 'Steven Spielberg', 2, 125),
(5, 'Blade Runner', '1982-09-15', 'Ridley Scott', 2, 145),
(6, 'Alien', '1979-09-12', 'Ridley Scott', 2, 125),
(7, 'L Exorciste', '2001-03-14', 'William Friedkin', 6, 90),
(8, 'Psychose', '1960-11-02', 'Alfred Hitchcock', 6, 125),
(9, 'Toy Story', '1996-03-27', 'John Lasseter', 5, 90),
(10, 'Shrek', '2001-07-04', 'Andrew Adamson ', 5, 90),
(11, 'Les Deux Tours', '2002-12-18', 'Peter Jackson', 4, 152),
(12, 'Le Retour du roi', '2003-12-17', 'Peter Jackson', 4, 149),
(13, 'Harry Potter et la Coupe de feu', '2005-11-30', 'Mike Newell', 4, 125),
(14, 'Inception', '2010-07-08', 'Christopher Nolan', 2, 90),
(15, 'Warrior', '2011-09-14', 'Gavin O    Connor', 3, 120),
(16, 'Harry Potter et la Chambre des secrets', '2002-12-04', 'Chris Columbus', 4, 125);

-- --------------------------------------------------------

--
-- Table structure for table `genre`
--

CREATE TABLE `genre` (
  `idGenre` int(10) NOT NULL,
  `labelGenre` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `genre`
--

INSERT INTO `genre` (`idGenre`, `labelGenre`) VALUES
(1, 'Comedy'),
(2, 'Science-Fiction'),
(3, 'Action'),
(4, 'Fantasy'),
(5, 'Animation'),
(6, 'Horror');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `film`
--
ALTER TABLE `film`
  ADD PRIMARY KEY (`idFilm`),
  ADD KEY `idGenre` (`idGenre`);

--
-- Indexes for table `genre`
--
ALTER TABLE `genre`
  ADD PRIMARY KEY (`idGenre`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `film`
--
ALTER TABLE `film`
  MODIFY `idFilm` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `film`
--
ALTER TABLE `film`
  ADD CONSTRAINT `film_ibfk_1` FOREIGN KEY (`idGenre`) REFERENCES `genre` (`idGenre`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
