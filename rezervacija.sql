-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 14, 2022 at 03:55 PM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `rezervacija`
--

-- --------------------------------------------------------

--
-- Table structure for table `smestaj`
--

CREATE TABLE `smestaj` (
  `smestajid` int(11) NOT NULL,
  `kapacitet` int(20) NOT NULL,
  `cena` int(20) NOT NULL,
  `idtip` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `smestaj`
--

INSERT INTO `smestaj` (`smestajid`, `kapacitet`, `cena`, `idtip`) VALUES
(1, 2, 40, 1),
(2, 3, 50, 1),
(3, 4, 100, 2),
(4, 5, 120, 2),
(5, 4, 200, 3),
(6, 5, 250, 3);

-- --------------------------------------------------------

--
-- Table structure for table `tipsmestaja`
--

CREATE TABLE `tipsmestaja` (
  `idtip` int(11) NOT NULL,
  `nazivtipa` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tipsmestaja`
--

INSERT INTO `tipsmestaja` (`idtip`, `nazivtipa`) VALUES
(1, 'soba'),
(2, 'apartman'),
(3, 'lux apartman');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `name`, `password`) VALUES
(1, 'admin', 'admin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `smestaj`
--
ALTER TABLE `smestaj`
  ADD PRIMARY KEY (`smestajid`),
  ADD KEY `spoljni kljuc` (`idtip`);

--
-- Indexes for table `tipsmestaja`
--
ALTER TABLE `tipsmestaja`
  ADD PRIMARY KEY (`idtip`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `smestaj`
--
ALTER TABLE `smestaj`
  ADD CONSTRAINT `spoljni kljuc` FOREIGN KEY (`idtip`) REFERENCES `tipsmestaja` (`idtip`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
