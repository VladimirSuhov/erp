-- phpMyAdmin SQL Dump
-- version 4.4.15.7
-- http://www.phpmyadmin.net
--
-- Хост: 127.0.0.1:3306
-- Время создания: Янв 29 2018 г., 19:25
-- Версия сервера: 5.6.31
-- Версия PHP: 7.0.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `erp_db`
--

-- --------------------------------------------------------

--
-- Структура таблицы `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(300) NOT NULL,
  `register_date` date NOT NULL,
  `last_login` datetime NOT NULL,
  `notes` varchar(255) NOT NULL,
  `user_type` enum('Admin','Other') NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `user`
--

INSERT INTO `user` (`id`, `username`, `email`, `password`, `register_date`, `last_login`, `notes`, `user_type`) VALUES
(1, 'Vova', 'vladimir.s.sukhov@gmail.com', '$2y$08$M/skCNe.padwxZe2RohPOO37fKTg6Lc5ElGs7D/SkGud89OBgO/jW', '2018-01-29', '0000-00-00 00:00:00', '', 'Admin'),
(2, 'qweqwe', 'qwe@qwe.qwe', '$2y$08$bArxTuRo1J78G1QLYrOmye8wWNh5cqRlpk9ZO1kayTQgpw3VkAWsu', '2018-01-29', '0000-00-00 00:00:00', '', ''),
(3, 'Zaur', 'qwe@qwe.qw', '$2y$08$py9.CfVRlMqQwDUB5KWExeUxRtVPoap2okzDkNCjVs3eSFNxKnD9K', '2018-01-29', '0000-00-00 00:00:00', '', ''),
(4, 'zaur2', 'qwe@qqwe.qw', '$2y$08$oHiUrJq3SVYyMNTDMwyj7u5M2BlwP86ok/lL/piJ0BT7XBFAkBeKi', '2018-01-29', '0000-00-00 00:00:00', '', 'Admin');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
