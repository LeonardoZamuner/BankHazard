-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Creato il: Apr 19, 2024 alle 15:56
-- Versione del server: 10.4.28-MariaDB
-- Versione PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bankhazarddb`
--

-- --------------------------------------------------------

--
-- Struttura della tabella `carta`
--

CREATE TABLE `carta` (
  `ID_Carta` int(11) NOT NULL,
  `IBAN` varchar(27) NOT NULL,
  `Scadenza` date NOT NULL,
  `NumeroCarta` int(11) NOT NULL,
  `SaldoDisponibile` float NOT NULL,
  `SaldoContabile` float NOT NULL,
  `CVV` int(11) NOT NULL,
  `Tipologia` enum('Bancomat','Debito','Credito','Prepagata') NOT NULL,
  `Intestatario` int(11) NOT NULL,
  `ContoCorrelato` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struttura della tabella `contocorrente`
--

CREATE TABLE `contocorrente` (
  `ID_conto` int(11) NOT NULL,
  `IBAN` varchar(27) NOT NULL,
  `SaldoCorrente` float NOT NULL,
  `SaldoContabile` float NOT NULL,
  `Intestatario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struttura della tabella `utenti`
--

CREATE TABLE `utenti` (
  `ID_utente` int(11) NOT NULL,
  `Nome` varchar(50) NOT NULL,
  `Cognome` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `CF` varchar(16) NOT NULL,
  `Password` varchar(40) NOT NULL,
  `Residenza` varchar(100) NOT NULL,
  `DataNascita` date NOT NULL,
  `LuogoNascita` varchar(100) NOT NULL,
  `Sesso` tinyint(1) NOT NULL,
  `CAP` int(11) NOT NULL,
  `NumeroTelefono` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indici per le tabelle scaricate
--

--
-- Indici per le tabelle `carta`
--
ALTER TABLE `carta`
  ADD PRIMARY KEY (`ID_Carta`),
  ADD UNIQUE KEY `CVV` (`CVV`),
  ADD UNIQUE KEY `NumeroCarta` (`NumeroCarta`),
  ADD UNIQUE KEY `IBAN` (`IBAN`),
  ADD KEY `Intestatario` (`Intestatario`),
  ADD KEY `ContoCorrelato` (`ContoCorrelato`);

--
-- Indici per le tabelle `contocorrente`
--
ALTER TABLE `contocorrente`
  ADD PRIMARY KEY (`ID_conto`),
  ADD UNIQUE KEY `IBAN` (`IBAN`),
  ADD KEY `Intestatario` (`Intestatario`);

--
-- Indici per le tabelle `utenti`
--
ALTER TABLE `utenti`
  ADD PRIMARY KEY (`ID_utente`),
  ADD UNIQUE KEY `CF` (`CF`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT per le tabelle scaricate
--

--
-- AUTO_INCREMENT per la tabella `carta`
--
ALTER TABLE `carta`
  MODIFY `ID_Carta` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT per la tabella `contocorrente`
--
ALTER TABLE `contocorrente`
  MODIFY `ID_conto` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT per la tabella `utenti`
--
ALTER TABLE `utenti`
  MODIFY `ID_utente` int(11) NOT NULL AUTO_INCREMENT;

--
-- Limiti per le tabelle scaricate
--

--
-- Limiti per la tabella `carta`
--
ALTER TABLE `carta`
  ADD CONSTRAINT `carta_ibfk_1` FOREIGN KEY (`Intestatario`) REFERENCES `utenti` (`ID_utente`),
  ADD CONSTRAINT `carta_ibfk_2` FOREIGN KEY (`ContoCorrelato`) REFERENCES `contocorrente` (`ID_conto`);

--
-- Limiti per la tabella `contocorrente`
--
ALTER TABLE `contocorrente`
  ADD CONSTRAINT `contocorrente_ibfk_1` FOREIGN KEY (`Intestatario`) REFERENCES `utenti` (`ID_utente`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
