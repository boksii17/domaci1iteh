-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 14, 2022 at 02:52 PM
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
  `idsmestaja` int(11) NOT NULL,
  `tip` varchar(255) NOT NULL,
  `kapacitet` int(20) NOT NULL,
  `cena` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `smestaj`
--

INSERT INTO `smestaj` (`idsmestaja`, `tip`, `kapacitet`, `cena`) VALUES
(1, 'soba', 2, 40),
(2, 'soba', 3, 50),
(3, 'soba', 4, 55),
(4, 'apartman', 4, 100),
(5, 'apartman', 5, 120),
(6, 'apartman', 6, 140),
(7, 'lux apartman', 4, 200),
(8, 'lux apartman', 5, 220),
(9, 'lux apartman', 6, 300);

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
(1, 'BojanaNovakovic', 'user');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `smestaj`
--
ALTER TABLE `smestaj`
  ADD PRIMARY KEY (`idsmestaja`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
