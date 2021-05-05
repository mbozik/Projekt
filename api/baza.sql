-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Czas generowania: 05 Maj 2021, 11:29
-- Wersja serwera: 10.4.18-MariaDB
-- Wersja PHP: 8.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Baza danych: `baza`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `ankieta`
--

CREATE TABLE `ankieta` (
  `a_id` int(11) NOT NULL,
  `a_temat` varchar(100) NOT NULL,
  `a_opis` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `hash`
--

CREATE TABLE `hash` (
  `h_id` int(11) NOT NULL,
  `hash` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `mail`
--

CREATE TABLE `mail` (
  `mail_id` int(11) NOT NULL,
  `mail` varchar(255) NOT NULL,
  `odpowiedz` tinyint(1) DEFAULT NULL,
  `m_a_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `odpowiedzi`
--

CREATE TABLE `odpowiedzi` (
  `o_id` int(11) NOT NULL,
  `odpowiedz` varchar(255) NOT NULL,
  `o_p_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `polacz`
--

CREATE TABLE `polacz` (
  `con_id` int(11) NOT NULL,
  `con_u_id` int(11) NOT NULL,
  `con_a_id` int(11) NOT NULL,
  `con_o_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `polacz_hash`
--

CREATE TABLE `polacz_hash` (
  `ph_id` int(11) NOT NULL,
  `ph_h_id` int(11) NOT NULL,
  `ph_o_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `pytania`
--

CREATE TABLE `pytania` (
  `p_id` int(11) NOT NULL,
  `pytanie` varchar(255) NOT NULL,
  `p_t_id` int(11) NOT NULL,
  `p_a_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `typpytania`
--

CREATE TABLE `typpytania` (
  `tp_id` int(11) NOT NULL,
  `tp_nazwa` varchar(55) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `users`
--

CREATE TABLE `users` (
  `u_id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `grupa` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Zrzut danych tabeli `users`
--

INSERT INTO `users` (`u_id`, `email`, `password`, `grupa`) VALUES
(1, 'bozik.kizob@gmail.com', '$2y$10$9ee9eFl7Xs4x.OhDH9lyE.bFhPyj5PbEV6m1zwmunpHp6MauzCNpe', '');

--
-- Indeksy dla zrzutów tabel
--

--
-- Indeksy dla tabeli `ankieta`
--
ALTER TABLE `ankieta`
  ADD PRIMARY KEY (`a_id`);

--
-- Indeksy dla tabeli `hash`
--
ALTER TABLE `hash`
  ADD PRIMARY KEY (`h_id`);

--
-- Indeksy dla tabeli `mail`
--
ALTER TABLE `mail`
  ADD PRIMARY KEY (`mail_id`),
  ADD KEY `m_a_id` (`m_a_id`);

--
-- Indeksy dla tabeli `odpowiedzi`
--
ALTER TABLE `odpowiedzi`
  ADD PRIMARY KEY (`o_id`),
  ADD KEY `o_p_id` (`o_p_id`);

--
-- Indeksy dla tabeli `polacz`
--
ALTER TABLE `polacz`
  ADD PRIMARY KEY (`con_id`),
  ADD KEY `con_a_id` (`con_a_id`),
  ADD KEY `con_u_id` (`con_u_id`),
  ADD KEY `con_o_id` (`con_o_id`);

--
-- Indeksy dla tabeli `polacz_hash`
--
ALTER TABLE `polacz_hash`
  ADD PRIMARY KEY (`ph_id`),
  ADD KEY `ph_o_id` (`ph_o_id`),
  ADD KEY `ph_h_id` (`ph_h_id`);

--
-- Indeksy dla tabeli `pytania`
--
ALTER TABLE `pytania`
  ADD PRIMARY KEY (`p_id`),
  ADD KEY `p_a_id` (`p_a_id`),
  ADD KEY `p_t_id` (`p_t_id`);

--
-- Indeksy dla tabeli `typpytania`
--
ALTER TABLE `typpytania`
  ADD PRIMARY KEY (`tp_id`);

--
-- Indeksy dla tabeli `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`u_id`);

--
-- AUTO_INCREMENT dla zrzuconych tabel
--

--
-- AUTO_INCREMENT dla tabeli `ankieta`
--
ALTER TABLE `ankieta`
  MODIFY `a_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT dla tabeli `hash`
--
ALTER TABLE `hash`
  MODIFY `h_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT dla tabeli `mail`
--
ALTER TABLE `mail`
  MODIFY `mail_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT dla tabeli `odpowiedzi`
--
ALTER TABLE `odpowiedzi`
  MODIFY `o_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT dla tabeli `polacz`
--
ALTER TABLE `polacz`
  MODIFY `con_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT dla tabeli `polacz_hash`
--
ALTER TABLE `polacz_hash`
  MODIFY `ph_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT dla tabeli `pytania`
--
ALTER TABLE `pytania`
  MODIFY `p_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT dla tabeli `typpytania`
--
ALTER TABLE `typpytania`
  MODIFY `tp_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT dla tabeli `users`
--
ALTER TABLE `users`
  MODIFY `u_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Ograniczenia dla zrzutów tabel
--

--
-- Ograniczenia dla tabeli `mail`
--
ALTER TABLE `mail`
  ADD CONSTRAINT `mail_ibfk_1` FOREIGN KEY (`m_a_id`) REFERENCES `ankieta` (`a_id`);

--
-- Ograniczenia dla tabeli `odpowiedzi`
--
ALTER TABLE `odpowiedzi`
  ADD CONSTRAINT `odpowiedzi_ibfk_1` FOREIGN KEY (`o_p_id`) REFERENCES `pytania` (`p_id`);

--
-- Ograniczenia dla tabeli `polacz`
--
ALTER TABLE `polacz`
  ADD CONSTRAINT `polacz_ibfk_1` FOREIGN KEY (`con_a_id`) REFERENCES `ankieta` (`a_id`),
  ADD CONSTRAINT `polacz_ibfk_2` FOREIGN KEY (`con_u_id`) REFERENCES `users` (`u_id`),
  ADD CONSTRAINT `polacz_ibfk_3` FOREIGN KEY (`con_o_id`) REFERENCES `odpowiedzi` (`o_id`);

--
-- Ograniczenia dla tabeli `polacz_hash`
--
ALTER TABLE `polacz_hash`
  ADD CONSTRAINT `polacz_hash_ibfk_1` FOREIGN KEY (`ph_o_id`) REFERENCES `odpowiedzi` (`o_id`),
  ADD CONSTRAINT `polacz_hash_ibfk_2` FOREIGN KEY (`ph_h_id`) REFERENCES `hash` (`h_id`);

--
-- Ograniczenia dla tabeli `pytania`
--
ALTER TABLE `pytania`
  ADD CONSTRAINT `pytania_ibfk_1` FOREIGN KEY (`p_a_id`) REFERENCES `ankieta` (`a_id`),
  ADD CONSTRAINT `pytania_ibfk_2` FOREIGN KEY (`p_t_id`) REFERENCES `typpytania` (`tp_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
