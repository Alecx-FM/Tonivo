-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: May 04, 2023 at 12:36 PM
-- Server version: 5.7.39
-- PHP Version: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `Tonivo`
--

-- --------------------------------------------------------

--
-- Table structure for table `client`
--

CREATE TABLE `client` (
  `id` int(11) NOT NULL,
  `nume` text NOT NULL,
  `prenume` text NOT NULL,
  `mail` text NOT NULL,
  `telefon` text NOT NULL,
  `adresa` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `client`
--

INSERT INTO `client` (`id`, `nume`, `prenume`, `mail`, `telefon`, `adresa`) VALUES
(4, 'Blaga', 'Mircea', 'Bmircea@yahoo.com', '0753373721', ''),
(5, 'Fechete', 'Alex', 'mihai0404@yahoo.com', '0752679931', 'Intrarea Siretului Nr.3'),
(6, 'Maximilean', 'Tutankamon', 'Faraonu@email.com', '0712345678', 'Strada Bogatiei Nr.1'),
(7, 'Corneliu', 'Aurel', 'Corneliu@gmail.com', '0584217654', 'Strada Strungarilor Nr.7');

-- --------------------------------------------------------

--
-- Table structure for table `rezervare`
--

CREATE TABLE `rezervare` (
  `id` int(11) NOT NULL,
  `checkin` date NOT NULL,
  `checkout` date NOT NULL,
  `numarpersoane` int(11) NOT NULL,
  `id_client` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `rezervare`
--

INSERT INTO `rezervare` (`id`, `checkin`, `checkout`, `numarpersoane`, `id_client`) VALUES
(2, '2023-05-19', '2023-05-28', 7, 4),
(3, '2023-05-19', '2023-05-28', 7, 4),
(4, '2023-05-21', '2023-06-28', 9, 4),
(5, '2023-05-22', '2023-05-24', 8, 5),
(6, '2023-07-19', '2023-09-20', 9, 5),
(7, '2023-08-05', '2023-08-07', 2, 6),
(8, '2023-08-05', '2023-08-07', 2, 6),
(9, '2023-08-05', '2023-08-07', 2, 6),
(10, '2023-08-05', '2023-08-07', 2, 6),
(11, '2023-08-05', '2023-08-07', 2, 6),
(12, '2023-05-05', '2023-05-06', 7, 7),
(13, '2023-05-07', '2023-05-08', 7, 7),
(14, '2023-05-08', '2023-05-09', 7, 7),
(15, '2023-06-14', '2023-06-15', 7, 7),
(16, '2023-06-14', '2023-06-15', 7, 7),
(17, '2023-06-14', '2023-06-15', 7, 7),
(18, '2023-06-14', '2023-06-15', 7, 7),
(19, '2023-06-14', '2023-06-15', 7, 7);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `client`
--
ALTER TABLE `client`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rezervare`
--
ALTER TABLE `rezervare`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_client` (`id_client`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `client`
--
ALTER TABLE `client`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `rezervare`
--
ALTER TABLE `rezervare`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `rezervare`
--
ALTER TABLE `rezervare`
  ADD CONSTRAINT `rezervare_ibfk_1` FOREIGN KEY (`id_client`) REFERENCES `client` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
