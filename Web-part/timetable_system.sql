-- phpMyAdmin SQL Dump
-- version 5.1.1deb5ubuntu1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Czas generowania: 22 Cze 2023, 20:19
-- Wersja serwera: 8.0.33-0ubuntu0.22.04.2
-- Wersja PHP: 8.1.2-1ubuntu2.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Baza danych: `timetable_system`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `line`
--

CREATE TABLE `line` (
  `ID` int NOT NULL,
  `name` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Zrzut danych tabeli `line`
--

INSERT INTO `line` (`ID`, `name`) VALUES
(0, 'null'),
(1, 'A'),
(2, 'rA');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `route`
--

CREATE TABLE `route` (
  `stationID` int NOT NULL,
  `lineID` int NOT NULL,
  `orderNumber` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Zrzut danych tabeli `route`
--

INSERT INTO `route` (`stationID`, `lineID`, `orderNumber`) VALUES
(1, 1, 1),
(2, 1, 2),
(3, 1, 3),
(3, 1, 3),
(1, 1, 4);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `stations`
--

CREATE TABLE `stations` (
  `ID` int NOT NULL,
  `address` text NOT NULL,
  `positionX` double(20,15) NOT NULL,
  `positionY` double(20,15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Zrzut danych tabeli `stations`
--

INSERT INTO `stations` (`ID`, `address`, `positionX`, `positionY`) VALUES
(0, 'null', 0.000000000000000, 0.000000000000000),
(1, 'Dzierżoniów Piłsudskiego 71', 50.730376434570026, 16.651905471051137),
(2, 'Dzierżoniów Staszica 120', 50.721326428245526, 16.662679271413978),
(3, 'Dzierżoniów Batalionów Chłopskich', 50.720056451461270, 16.650709912587747),
(4, 'Dzierżoniów Dworzec PKS młyn 70', 50.724840080501350, 16.653801438445605);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `vehicles`
--

CREATE TABLE `vehicles` (
  `ID` int NOT NULL,
  `line` int NOT NULL,
  `positionX` double(20,15) NOT NULL,
  `positionY` double(20,15) NOT NULL,
  `nextStation` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Zrzut danych tabeli `vehicles`
--

INSERT INTO `vehicles` (`ID`, `line`, `positionX`, `positionY`, `nextStation`) VALUES
(1, 1, 50.719343107864520, 16.640701020147993, 1);

--
-- Indeksy dla zrzutów tabel
--

--
-- Indeksy dla tabeli `line`
--
ALTER TABLE `line`
  ADD PRIMARY KEY (`ID`);

--
-- Indeksy dla tabeli `stations`
--
ALTER TABLE `stations`
  ADD PRIMARY KEY (`ID`);

--
-- Indeksy dla tabeli `vehicles`
--
ALTER TABLE `vehicles`
  ADD PRIMARY KEY (`ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
