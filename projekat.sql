-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3307
-- Generation Time: Jun 21, 2022 at 02:10 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `projekat`
--

-- --------------------------------------------------------

--
-- Table structure for table `korisnik`
--

CREATE TABLE `korisnik` (
  `KorisnikID` int(11) NOT NULL,
  `Naziv` varchar(40) NOT NULL,
  `Adresa` varchar(40) NOT NULL,
  `Telefon` varchar(40) NOT NULL,
  `Email` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `korisnik`
--

INSERT INTO `korisnik` (`KorisnikID`, `Naziv`, `Adresa`, `Telefon`, `Email`) VALUES
(1, 'Igor Misic', 'Ozrenska 46', '0605000305', 'igormisic2000@gmail.com'),
(2, 'Pera Peric', 'Brace Jerkovic 32', '0632581729', 'peraperic123@gmail.com'),
(3, 'Nikola Nikolic', 'Brace Grim 20', '0692311234', 'nikolanikolic@yahoo.com');

-- --------------------------------------------------------

--
-- Table structure for table `porudzbina`
--

CREATE TABLE `porudzbina` (
  `PorudzbinaID` int(11) NOT NULL,
  `KorisnikID` int(11) DEFAULT NULL,
  `Obrok` varchar(40) NOT NULL,
  `Cena` int(11) NOT NULL,
  `Kolicina` int(11) NOT NULL,
  `Datum` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `porudzbina`
--

INSERT INTO `porudzbina` (`PorudzbinaID`, `KorisnikID`, `Obrok`, `Cena`, `Kolicina`, `Datum`) VALUES
(1, 1, 'Triple Cheeseburger', 440, 3, '2022-06-20 22:47:05'),
(2, 2, 'Twister Sendvič', 390, 2, '2022-06-20 22:50:30'),
(3, 3, 'Šejk čokolada', 200, 3, '2022-06-20 22:52:14'),
(4, 1, 'Classic kobasica', 340, 4, '2022-06-20 22:55:01');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `korisnik`
--
ALTER TABLE `korisnik`
  ADD PRIMARY KEY (`KorisnikID`),
  ADD UNIQUE KEY `Email` (`Email`);

--
-- Indexes for table `porudzbina`
--
ALTER TABLE `porudzbina`
  ADD PRIMARY KEY (`PorudzbinaID`),
  ADD KEY `FK_KorisnikPorudzbina` (`KorisnikID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `korisnik`
--
ALTER TABLE `korisnik`
  MODIFY `KorisnikID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `porudzbina`
--
ALTER TABLE `porudzbina`
  MODIFY `PorudzbinaID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `porudzbina`
--
ALTER TABLE `porudzbina`
  ADD CONSTRAINT `FK_KorisnikPorudzbina` FOREIGN KEY (`KorisnikID`) REFERENCES `korisnik` (`KorisnikID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
