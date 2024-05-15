-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Creato il: Mag 15, 2024 alle 10:34
-- Versione del server: 10.4.32-MariaDB
-- Versione PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `car_pooling`
--

-- --------------------------------------------------------

--
-- Struttura della tabella `automobile`
--

CREATE TABLE `automobile` (
  `targa` varchar(10) NOT NULL,
  `casa_produttrice` varchar(100) DEFAULT NULL,
  `modello` varchar(100) DEFAULT NULL,
  `numero_posti` int(11) DEFAULT NULL,
  `colore` varchar(50) DEFAULT NULL,
  `anno_immatricolazione` int(11) DEFAULT NULL,
  `chilometri` decimal(10,2) DEFAULT NULL,
  `carburante` varchar(50) DEFAULT NULL,
  `cilindrata` int(11) DEFAULT NULL,
  `id_utente` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dump dei dati per la tabella `automobile`
--

INSERT INTO `automobile` (`targa`, `casa_produttrice`, `modello`, `numero_posti`, `colore`, `anno_immatricolazione`, `chilometri`, `carburante`, `cilindrata`, `id_utente`) VALUES
('DL123PK', 'Ford', 'Kuga', 5, 'Rosso', 2021, 123000.00, 'Gasolio', 1600, 22);

-- --------------------------------------------------------

--
-- Struttura della tabella `citta`
--

CREATE TABLE `citta` (
  `id` int(11) NOT NULL,
  `cap` varchar(10) DEFAULT NULL,
  `nome` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struttura della tabella `passa_da`
--

CREATE TABLE `passa_da` (
  `id_viaggio` int(11) NOT NULL,
  `id_citta` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struttura della tabella `prenotazione`
--

CREATE TABLE `prenotazione` (
  `id` int(11) NOT NULL,
  `accettata` tinyint(1) DEFAULT NULL,
  `id_viaggio` int(11) DEFAULT NULL,
  `id_utente` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struttura della tabella `recensione`
--

CREATE TABLE `recensione` (
  `id` int(11) NOT NULL,
  `giudizio` text DEFAULT NULL,
  `voto` int(11) DEFAULT NULL,
  `id_utente_scrittore` int(11) DEFAULT NULL,
  `id_utente_ricevente` int(11) DEFAULT NULL,
  `data_inserimento_recensione` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struttura della tabella `utente`
--

CREATE TABLE `utente` (
  `id` int(11) NOT NULL,
  `nome` varchar(50) DEFAULT NULL,
  `cognome` varchar(50) DEFAULT NULL,
  `indirizzo` varchar(100) DEFAULT NULL,
  `data_nascita` date DEFAULT NULL,
  `luogo_nascita` varchar(100) DEFAULT NULL,
  `numero_patente` varchar(20) DEFAULT NULL,
  `numero_documento_identita` varchar(20) DEFAULT NULL,
  `data_scadenza_patente` date DEFAULT NULL,
  `numero_telefono` varchar(20) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `fotografia` blob DEFAULT NULL,
  `password` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dump dei dati per la tabella `utente`
--

INSERT INTO `utente` (`id`, `nome`, `cognome`, `indirizzo`, `data_nascita`, `luogo_nascita`, `numero_patente`, `numero_documento_identita`, `data_scadenza_patente`, `numero_telefono`, `email`, `fotografia`, `password`) VALUES
(22, 'Antonio', 'Ciccillo', 'via del ponte', '1968-06-19', 'Bari', '123', '123', '2025-12-12', '13', 'antonio@gmail.com', 0x53637265656e73686f7420323032332d31322d3238203231333631352e706e67, '0c88028bf3aa6a6a143e');

-- --------------------------------------------------------

--
-- Struttura della tabella `viaggio`
--

CREATE TABLE `viaggio` (
  `id` int(11) NOT NULL,
  `data_inizio` date DEFAULT NULL,
  `data_fine` date DEFAULT NULL,
  `numero_soste` int(11) DEFAULT NULL,
  `aperto` tinyint(1) DEFAULT NULL,
  `prezzo_passeggero` decimal(10,2) DEFAULT NULL,
  `animali` int(11) DEFAULT NULL,
  `bagaglio` int(11) DEFAULT NULL,
  `fumatori` tinyint(1) DEFAULT NULL,
  `numero_posti_disponibili` int(11) DEFAULT NULL,
  `id_utente` int(11) DEFAULT NULL,
  `partenza` varchar(255) DEFAULT NULL,
  `arrivo` varchar(255) DEFAULT NULL,
  `prenotato` tinyint(1) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dump dei dati per la tabella `viaggio`
--

INSERT INTO `viaggio` (`id`, `data_inizio`, `data_fine`, `numero_soste`, `aperto`, `prezzo_passeggero`, `animali`, `bagaglio`, `fumatori`, `numero_posti_disponibili`, `id_utente`, `partenza`, `arrivo`, `prenotato`) VALUES
(22, '2024-04-25', '2024-04-28', 2, 1, 25.00, 0, 1, 0, 4, 22, 'bari', 'milano', 0);

--
-- Indici per le tabelle scaricate
--

--
-- Indici per le tabelle `automobile`
--
ALTER TABLE `automobile`
  ADD PRIMARY KEY (`targa`),
  ADD KEY `id_utente` (`id_utente`);

--
-- Indici per le tabelle `citta`
--
ALTER TABLE `citta`
  ADD PRIMARY KEY (`id`);

--
-- Indici per le tabelle `passa_da`
--
ALTER TABLE `passa_da`
  ADD PRIMARY KEY (`id_viaggio`,`id_citta`),
  ADD KEY `id_citta` (`id_citta`);

--
-- Indici per le tabelle `prenotazione`
--
ALTER TABLE `prenotazione`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_viaggio` (`id_viaggio`),
  ADD KEY `id_utente` (`id_utente`);

--
-- Indici per le tabelle `recensione`
--
ALTER TABLE `recensione`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_utente_scrittore` (`id_utente_scrittore`),
  ADD KEY `id_utente_ricevente` (`id_utente_ricevente`);

--
-- Indici per le tabelle `utente`
--
ALTER TABLE `utente`
  ADD PRIMARY KEY (`id`);

--
-- Indici per le tabelle `viaggio`
--
ALTER TABLE `viaggio`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_utente` (`id_utente`);

--
-- AUTO_INCREMENT per le tabelle scaricate
--

--
-- AUTO_INCREMENT per la tabella `citta`
--
ALTER TABLE `citta`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT per la tabella `prenotazione`
--
ALTER TABLE `prenotazione`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT per la tabella `recensione`
--
ALTER TABLE `recensione`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT per la tabella `utente`
--
ALTER TABLE `utente`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT per la tabella `viaggio`
--
ALTER TABLE `viaggio`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- Limiti per le tabelle scaricate
--

--
-- Limiti per la tabella `automobile`
--
ALTER TABLE `automobile`
  ADD CONSTRAINT `Automobile_ibfk_1` FOREIGN KEY (`id_utente`) REFERENCES `utente` (`id`);

--
-- Limiti per la tabella `passa_da`
--
ALTER TABLE `passa_da`
  ADD CONSTRAINT `Passa_Da_ibfk_1` FOREIGN KEY (`id_viaggio`) REFERENCES `viaggio` (`id`),
  ADD CONSTRAINT `Passa_Da_ibfk_2` FOREIGN KEY (`id_citta`) REFERENCES `citta` (`id`);

--
-- Limiti per la tabella `prenotazione`
--
ALTER TABLE `prenotazione`
  ADD CONSTRAINT `Prenotazione_ibfk_1` FOREIGN KEY (`id_viaggio`) REFERENCES `viaggio` (`id`),
  ADD CONSTRAINT `Prenotazione_ibfk_2` FOREIGN KEY (`id_utente`) REFERENCES `utente` (`id`);

--
-- Limiti per la tabella `recensione`
--
ALTER TABLE `recensione`
  ADD CONSTRAINT `Recensione_ibfk_1` FOREIGN KEY (`id_utente_scrittore`) REFERENCES `utente` (`id`),
  ADD CONSTRAINT `Recensione_ibfk_2` FOREIGN KEY (`id_utente_ricevente`) REFERENCES `utente` (`id`);

--
-- Limiti per la tabella `viaggio`
--
ALTER TABLE `viaggio`
  ADD CONSTRAINT `Viaggio_ibfk_1` FOREIGN KEY (`id_utente`) REFERENCES `utente` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
