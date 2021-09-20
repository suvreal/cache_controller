-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Počítač: 127.0.0.1
-- Vytvořeno: Pon 20. zář 2021, 13:41
-- Verze serveru: 10.4.21-MariaDB
-- Verze PHP: 7.4.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Databáze: `product_cache`
--

-- --------------------------------------------------------

--
-- Struktura tabulky `basic_data`
--

CREATE TABLE `basic_data` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `description` varchar(2000) NOT NULL,
  `keyword` varchar(100) NOT NULL,
  `notes` varchar(2000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Vypisuji data pro tabulku `basic_data`
--

INSERT INTO `basic_data` (`id`, `name`, `description`, `keyword`, `notes`) VALUES
(1, 'test data 1', 'test data popisek 1', 'testdata1', 'tohle jsou testovací data, tedy testovací záznam v pořadí 1'),
(2, 'a', 'b', 'c', 'd'),
(3, 'super name', 'my own description', 'keyword of my keys', 'asdadad'),
(4, 'super name of record', 'describe it by one', 'key of words', 'worlds of keys'),
(5, 'super name of record 2', 'describe it by one 2', 'key of words 2', 'worlds of keys 2'),
(6, 'super name of record 3', 'describe it by one 3', 'key of words 3', 'worlds of keys 3');

--
-- Indexy pro exportované tabulky
--

--
-- Indexy pro tabulku `basic_data`
--
ALTER TABLE `basic_data`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id_2` (`id`),
  ADD KEY `id` (`id`);

--
-- AUTO_INCREMENT pro tabulky
--

--
-- AUTO_INCREMENT pro tabulku `basic_data`
--
ALTER TABLE `basic_data`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
