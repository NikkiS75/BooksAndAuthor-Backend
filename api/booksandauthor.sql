-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Июл 10 2020 г., 20:24
-- Версия сервера: 10.3.13-MariaDB-log
-- Версия PHP: 7.1.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `booksandauthor`
--

-- --------------------------------------------------------

--
-- Структура таблицы `author`
--

CREATE TABLE `author` (
  `authorID` int(11) NOT NULL,
  `authorSurname` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `authorName` text COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `author`
--

INSERT INTO `author` (`authorID`, `authorSurname`, `authorName`) VALUES
(1, 'Оруэлл', 'Джордж'),
(91, 'Ли', 'Харпер');

-- --------------------------------------------------------

--
-- Структура таблицы `book`
--

CREATE TABLE `book` (
  `bookID` int(11) NOT NULL,
  `bookName` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `bookAnnotation` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `yearPublic` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `numberPages` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `authorID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `book`
--

INSERT INTO `book` (`bookID`, `bookName`, `bookAnnotation`, `yearPublic`, `numberPages`, `authorID`) VALUES
(1, '1984', 'Джордж Оруэлл (настоящее имя — Эрик А. Блэр), писатель острого, иронического ума, за свою недолгую жизнь создал множество произведений, из которых в нашей стране наиболее известны повесть-притча «Скотный двор» и знаменитый, ставший итогом жизненного и творческого пути своего создателя роман-антиутопия «1984», вошедший в данное издание. Написанный четыре с лишним десятилетия назад, этот роман и сегодня сохраняет свою актуальность.', '1949', '328', 1),
(74, 'Убить пересмешника', 'История маленького сонного городка на юге Америки, поведанная маленькой девочкой. История ее брата Джима, друга Дилла и ее отца – честного, принципиального адвоката Аттикуса Финча, одного из последних и лучших представителей старой «южной аристократии». История судебного процесса по делу чернокожего парня, обвиненного в насилии над белой девушкой. Но прежде всего – история переломной эпохи, когда ксенофобия, расизм, нетерпимость и ханжество, присущие американскому югу, постепенно уходят в прошлое. «Ветер перемен» только-только повеял над Америкой. Что он принесет?...', '1960', '296', 91);

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `userID` int(11) NOT NULL,
  `userLogin` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `userPassword` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `salt` text COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`userID`, `userLogin`, `userPassword`, `salt`) VALUES
(1, 'admin', '1e0739ed8005b7d44b95816d5f65bda7', 'iZ6otk4Q');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `author`
--
ALTER TABLE `author`
  ADD PRIMARY KEY (`authorID`);

--
-- Индексы таблицы `book`
--
ALTER TABLE `book`
  ADD PRIMARY KEY (`bookID`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`userID`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `author`
--
ALTER TABLE `author`
  MODIFY `authorID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=93;

--
-- AUTO_INCREMENT для таблицы `book`
--
ALTER TABLE `book`
  MODIFY `bookID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=76;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `userID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
