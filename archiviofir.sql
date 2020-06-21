-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Creato il: Giu 13, 2020 alle 15:20
-- Versione del server: 10.4.11-MariaDB
-- Versione PHP: 7.4.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `archiviofir`
--
CREATE DATABASE IF NOT EXISTS `archiviofir` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `archiviofir`;

-- --------------------------------------------------------

--
-- Struttura della tabella `addetto`
--

CREATE TABLE `addetto` (
  `id_Addetto` int(255) NOT NULL,
  `nome` varchar(255) DEFAULT NULL,
  `cognome` varchar(255) DEFAULT NULL,
  `mail` text DEFAULT NULL,
  `psw` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dump dei dati per la tabella `addetto`
--

INSERT INTO `addetto` (`id_Addetto`, `nome`, `cognome`, `mail`, `psw`) VALUES
(1, 'Pippo', 'Plutilde', 'sample1@sample.it', '5898722e026109acad0103e11741e448'),
(2, 'Rossi', 'Mario', 'sample2@sample.it', '5f4dcc3b5aa765d61d8327deb882cf99');

-- --------------------------------------------------------

--
-- Struttura della tabella `arbitro`
--

CREATE TABLE `arbitro` (
  `id_arbitro` int(11) NOT NULL,
  `nome_arbitro` varchar(255) DEFAULT NULL,
  `cognome_arbitro` varchar(255) DEFAULT NULL,
  `mail_arbitro` text DEFAULT NULL,
  `anno_di_nascita` int(255) DEFAULT NULL,
  `n_tessera` int(255) DEFAULT NULL,
  `id_addetto_garantisce_accesso` int(255) DEFAULT NULL,
  `id_comitato_appartenenza` int(255) DEFAULT NULL,
  `ref_psw` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dump dei dati per la tabella `arbitro`
--

INSERT INTO `arbitro` (`id_arbitro`, `nome_arbitro`, `cognome_arbitro`, `mail_arbitro`, `anno_di_nascita`, `n_tessera`, `id_addetto_garantisce_accesso`, `id_comitato_appartenenza`, `ref_psw`) VALUES
(1, 'Filippo', 'Rossi', 'arb.sample3@federugby.it', 1999, 379394, 1, 1, 'b4b0144527d176e7f08537cbabe3520b'),
(2, 'Oronzo', 'Oronzi', 'arb.sample4@sample.it', 1979, 354585, 1, 1, '0fcb70961600ea405ddff8a0244da332'),
(3, 'Vincenzo', 'Pippo', 'arb.sample5@sample.it', 1994, 381521, 1, 2, 'd5de63b965433920059bf515e2b438bf'),
(4, 'Filippo', 'Poggibonsi', 'arb.sample6@sample.it', 1967, 354578, 1, 2, 'a8a8bb7b7a09424023b13792f10eb106'),
(5, 'Andrea', 'Bianchi', 'arb.sample@sample7.it', 1966, 346598, 1, 3, '36b536c901d66629899c0e82b4c56d67'),
(6, 'Pluto', 'Paperino', 'arb.sample@sample8.it', 1989, 354962, 1, 1, 'eff3a10370a13bb3d890e2abe160b0ad');

-- --------------------------------------------------------

--
-- Struttura della tabella `comitato`
--

CREATE TABLE `comitato` (
  `id_comitato` int(255) NOT NULL,
  `nome_comitato` varchar(255) DEFAULT NULL,
  `regione` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dump dei dati per la tabella `comitato`
--

INSERT INTO `comitato` (`id_comitato`, `nome_comitato`, `regione`) VALUES
(1, 'F.I.R - Liguria', 'Liguria'),
(2, 'F.I.R - Lombardia', 'Lombardia'),
(3, 'F.I.R - Piemonte', 'Piemonte');

-- --------------------------------------------------------

--
-- Struttura della tabella `commissario`
--

CREATE TABLE `commissario` (
  `id_commissario` int(255) NOT NULL,
  `nome_commissario` varchar(255) DEFAULT NULL,
  `cognome_commissario` varchar(255) DEFAULT NULL,
  `mail_commissario` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struttura della tabella `partita_arbitrata`
--

CREATE TABLE `partita_arbitrata` (
  `id_partite` int(255) NOT NULL,
  `sq1` varchar(255) DEFAULT NULL,
  `sq2` varchar(255) DEFAULT NULL,
  `citta` varchar(255) DEFAULT NULL,
  `data_partita` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `id_arbitro_partita` int(255) DEFAULT NULL,
  `id_valutazione_commissario` int(255) DEFAULT NULL,
  `punti_sq_1` int(100) DEFAULT NULL,
  `punti_sq_2` int(100) DEFAULT NULL,
  `categoria` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dump dei dati per la tabella `partita_arbitrata`
--

INSERT INTO `partita_arbitrata` (`id_partite`, `sq1`, `sq2`, `citta`, `data_partita`, `id_arbitro_partita`, `id_valutazione_commissario`, `punti_sq_1`, `punti_sq_2`, `categoria`) VALUES
(1, 'Rovigo', 'Padova', 'Rovigo', '2020-06-11 15:55:47', 2, NULL, 22, 34, 'Serie A'),
(2, 'Genova Rugby', 'A.S.R Milano', 'Genova', '2020-06-11 15:55:54', 1, NULL, 35, 32, 'Under 18'),
(3, 'Padova', 'A.S.R Milano', 'Padova', '2019-11-10 16:30:00', 1, NULL, 51, 17, 'Serie A');

-- --------------------------------------------------------

--
-- Struttura della tabella `valutazione`
--

CREATE TABLE `valutazione` (
  `id_valutazione` int(255) NOT NULL,
  `voto` int(255) DEFAULT NULL,
  `descrizione` text DEFAULT NULL,
  `id_commissario_valutante` int(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indici per le tabelle scaricate
--

--
-- Indici per le tabelle `addetto`
--
ALTER TABLE `addetto`
  ADD PRIMARY KEY (`id_Addetto`);

--
-- Indici per le tabelle `arbitro`
--
ALTER TABLE `arbitro`
  ADD PRIMARY KEY (`id_arbitro`),
  ADD KEY `id_addetto_garantisce_accesso` (`id_addetto_garantisce_accesso`),
  ADD KEY `id_comitato_appartenenza` (`id_comitato_appartenenza`);

--
-- Indici per le tabelle `comitato`
--
ALTER TABLE `comitato`
  ADD PRIMARY KEY (`id_comitato`);

--
-- Indici per le tabelle `commissario`
--
ALTER TABLE `commissario`
  ADD PRIMARY KEY (`id_commissario`);

--
-- Indici per le tabelle `partita_arbitrata`
--
ALTER TABLE `partita_arbitrata`
  ADD PRIMARY KEY (`id_partite`),
  ADD KEY `id_arbitro_partita` (`id_arbitro_partita`),
  ADD KEY `id_valutazione_commissario` (`id_valutazione_commissario`);

--
-- Indici per le tabelle `valutazione`
--
ALTER TABLE `valutazione`
  ADD PRIMARY KEY (`id_valutazione`),
  ADD KEY `id_commissario_valutante` (`id_commissario_valutante`);

--
-- AUTO_INCREMENT per le tabelle scaricate
--

--
-- AUTO_INCREMENT per la tabella `addetto`
--
ALTER TABLE `addetto`
  MODIFY `id_Addetto` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT per la tabella `arbitro`
--
ALTER TABLE `arbitro`
  MODIFY `id_arbitro` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT per la tabella `comitato`
--
ALTER TABLE `comitato`
  MODIFY `id_comitato` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT per la tabella `commissario`
--
ALTER TABLE `commissario`
  MODIFY `id_commissario` int(255) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT per la tabella `partita_arbitrata`
--
ALTER TABLE `partita_arbitrata`
  MODIFY `id_partite` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT per la tabella `valutazione`
--
ALTER TABLE `valutazione`
  MODIFY `id_valutazione` int(255) NOT NULL AUTO_INCREMENT;

--
-- Limiti per le tabelle scaricate
--

--
-- Limiti per la tabella `arbitro`
--
ALTER TABLE `arbitro`
  ADD CONSTRAINT `arbitro_ibfk_1` FOREIGN KEY (`id_addetto_garantisce_accesso`) REFERENCES `addetto` (`id_Addetto`),
  ADD CONSTRAINT `arbitro_ibfk_2` FOREIGN KEY (`id_comitato_appartenenza`) REFERENCES `comitato` (`id_comitato`);

--
-- Limiti per la tabella `partita_arbitrata`
--
ALTER TABLE `partita_arbitrata`
  ADD CONSTRAINT `partita_arbitrata_ibfk_1` FOREIGN KEY (`id_arbitro_partita`) REFERENCES `arbitro` (`id_arbitro`),
  ADD CONSTRAINT `partita_arbitrata_ibfk_2` FOREIGN KEY (`id_valutazione_commissario`) REFERENCES `valutazione` (`id_valutazione`);

--
-- Limiti per la tabella `valutazione`
--
ALTER TABLE `valutazione`
  ADD CONSTRAINT `valutazione_ibfk_1` FOREIGN KEY (`id_commissario_valutante`) REFERENCES `commissario` (`id_commissario`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
