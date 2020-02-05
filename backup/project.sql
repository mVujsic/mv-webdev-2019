-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jan 31, 2020 at 10:01 PM
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
-- Database: `project`
--

-- --------------------------------------------------------

--
-- Table structure for table `songs`
--

DROP TABLE IF EXISTS `songs`;
CREATE TABLE IF NOT EXISTS `songs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ime` varchar(255) NOT NULL,
  `autor` varchar(255) NOT NULL,
  `glasovi` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=23 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `songs`
--

INSERT INTO `songs` (`id`, `ime`, `autor`, `glasovi`) VALUES
(11, 'Ratko Mladic', 'Goci Bend', 231),
(14, 'Golijske Vite Jele', 'Rajce Ilic', 343),
(5, 'Zmaj od Sipova', 'Zare i Goci', 200),
(16, 'Ne daj se generacijo', 'Aca Ilic', 10),
(17, 'Panteri', 'Radoslav Vulovic Roki', 192),
(15, 'Miljacka', 'Ivica Dacic', 121),
(18, 'Ptico moja beli labude', 'Baja Mali Knindza', 12),
(19, 'Zek Zek', 'Gagi Band', 8),
(20, 'Zasto nisam pticica', 'Marko BULAT', 4),
(21, 'Luda po tebe', 'KameliR', 53),
(22, 'Ginem ginem', 'Nedeljko Bajic BAJA', 500);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `vreme` datetime DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `vreme`) VALUES
(4, 'mateja.vujsic@blabla.com', '$2y$10$0AMD18PVThUYaBpVsaoM7Oi1TwrJbJ4Wx6O5gUOwY42bvH4RSOOuO', '2020-01-28 01:10:51'),
(3, 'admin@raksin.rs', '$2y$10$zJLEIOIwTnTiUkQJLkD1CegVT4OkfoNvi4E4zB7dnYc577PH5by8y', '2020-01-28 01:03:03'),
(5, 'mata@gmail.com', '$2y$10$K/M.A/bTZDiXjTSg2tSWpOEbWFXne895RLriMss2YptzZbjjKCXZ2', '2020-01-28 11:26:53'),
(6, 'admin@fink.rs', '$2y$10$z9V.UAqo8i0uPeJSyGBjxOpnGsiwGDNISU0DPzm4g3Craoymmj9Py', '2020-01-28 12:23:06'),
(7, 'mateja@vujsic.rs', '$2y$10$p3zofZ3zeE3LLAdjc0JNo.Lew1uC5yrUEt.0aaT2sqUbnvncV0ROq', '2020-01-29 15:14:02');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
