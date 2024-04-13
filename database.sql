-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Czas generowania: 13 Kwi 2024, 21:42
-- Wersja serwera: 10.4.24-MariaDB
-- Wersja PHP: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Baza danych: `bezpieczny_system_erp`
--

CREATE DATABASE IF NOT EXISTS `bezpieczny_system_erp`;
USE `bezpieczny_system_erp`;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `crm`
--

CREATE TABLE `crm` (
  `id` int(11) NOT NULL,
  `name` varchar(45) NOT NULL,
  `email` varchar(45) NOT NULL,
  `subscription` enum('subscribed','unsubscribed') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Zrzut danych tabeli `crm`
--

INSERT INTO `crm` (`id`, `name`, `email`, `subscription`) VALUES
(1, 'John Doe', 'john.doe@example.com', 'subscribed'),
(2, 'Jane Doe', 'jane.doe@example.com', 'unsubscribed'),
(3, 'Michael Smith', 'michael.smith@example.com', 'subscribed'),
(4, 'Emily Johnson', 'emily.johnson@example.com', 'subscribed'),
(5, 'William Brown', 'william.brown@example.com', 'unsubscribed'),
(6, 'Emma Wilson', 'emma.wilson@example.com', 'subscribed'),
(7, 'Matthew Jones', 'matthew.jones@example.com', 'unsubscribed'),
(8, 'Olivia Taylor', 'olivia.taylor@example.com', 'subscribed'),
(9, 'David Martinez', 'david.martinez@example.com', 'subscribed'),
(10, 'Sophia Anderson', 'sophia.anderson@example.com', 'unsubscribed'),
(11, 'Daniel Thomas', 'daniel.thomas@example.com', 'subscribed'),
(12, 'Isabella White', 'isabella.white@example.com', 'unsubscribed'),
(13, 'James Harris', 'james.harris@example.com', 'subscribed'),
(14, 'Mia Martin', 'mia.martin@example.com', 'subscribed'),
(15, 'Joseph Thompson', 'joseph.thompson@example.com', 'unsubscribed'),
(16, 'Charlotte Garcia', 'charlotte.garcia@example.com', 'subscribed'),
(17, 'Jacob Robinson', 'jacob.robinson@example.com', 'subscribed'),
(18, 'Abigail Lee', 'abigail.lee@example.com', 'unsubscribed'),
(19, 'Ethan Walker', 'ethan.walker@example.com', 'subscribed'),
(20, 'Grace Hall', 'grace.hall@example.com', 'unsubscribed'),
(21, 'Alexander Young', 'alexander.young@example.com', 'subscribed'),
(22, 'Madison Allen', 'madison.allen@example.com', 'subscribed'),
(23, 'Benjamin King', 'benjamin.king@example.com', 'unsubscribed'),
(24, 'Chloe Hill', 'chloe.hill@example.com', 'subscribed'),
(25, 'Samuel Adams', 'samuel.adams@example.com', 'subscribed'),
(26, 'Ava Carter', 'ava.carter@example.com', 'unsubscribed'),
(27, 'Andrew Wright', 'andrew.wright@example.com', 'subscribed'),
(28, 'Harper Mitchell', 'harper.mitchell@example.com', 'subscribed'),
(29, 'William Moore', 'william.moore@example.com', 'unsubscribed'),
(30, 'Ella Nelson', 'ella.nelson@example.com', 'subscribed');

--
-- Indeksy dla zrzutów tabel
--

--
-- Indeksy dla tabeli `crm`
--
ALTER TABLE `crm`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT dla zrzuconych tabel
--

--
-- AUTO_INCREMENT dla tabeli `crm`
--
ALTER TABLE `crm`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
