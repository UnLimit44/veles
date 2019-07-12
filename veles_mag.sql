-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Июл 11 2019 г., 22:06
-- Версия сервера: 5.6.43
-- Версия PHP: 5.6.38

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `veles_mag`
--

-- --------------------------------------------------------

--
-- Структура таблицы `companys`
--

CREATE TABLE `companys` (
  `id_company` smallint(255) NOT NULL,
  `company` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `companys`
--

INSERT INTO `companys` (`id_company`, `company`) VALUES
(1, 'Samsung'),
(2, 'Apple'),
(3, 'Asus');

-- --------------------------------------------------------

--
-- Структура таблицы `goods`
--

CREATE TABLE `goods` (
  `id_goods` int(11) NOT NULL,
  `name_goods` varchar(128) NOT NULL,
  `description_goods` text NOT NULL,
  `price_goods` mediumint(9) NOT NULL,
  `best_sellers` tinyint(1) NOT NULL DEFAULT '0',
  `image_goods` varchar(128) NOT NULL,
  `id_company` smallint(6) NOT NULL,
  `id_type` smallint(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='таблица товаров';

--
-- Дамп данных таблицы `goods`
--

INSERT INTO `goods` (`id_goods`, `name_goods`, `description_goods`, `price_goods`, `best_sellers`, `image_goods`, `id_company`, `id_type`) VALUES
(1, 'Samsung A530 Galaxy A8', 'Технические характеристики\r\nПроизводитель	Samsung\r\nДиапазоны GSM	850, 900, 1800, 1900\r\nИнтернет	GPRS, EDGE, 3G, 4G\r\nДиагональ (дюйм)	5.6\r\nРазрешение (пикс)	2220x1080\r\nВстроенная память (Гб)	32\r\nФотокамера (Мп)	16\r\nЧастота процессора (МГц)	2200\r\nКоличество ядер	8\r\nОперативная память (Гб)	4\r\nПоддержка карт памяти	MicroSD, MicroSDHC, MicroSDXC\r\nСлот для карты памяти	отдельный\r\nОперационная система	Android 7.1 Nougat\r\nSIM-карта	nano-SIM\r\nАккумулятор (мАч)	3000\r\nВес (г)	172', 23490, 0, 'Galaxy_A8.jpg', 1, 1),
(2, 'Samsung J810 Galaxy J8', 'Технические характеристики\r\nПроизводитель	Samsung\r\nДиапазоны GSM	850, 900, 1800, 1900\r\nИнтернет	GPRS, EDGE, 3G, 4G\r\nДиагональ (дюйм)	6\r\nРазрешение (пикс)	1480x720\r\nВстроенная память (Гб)	32\r\nФотокамера (Мп)	16 + 5 (двойная)\r\nЧастота процессора (МГц)	1800\r\nКоличество ядер	8\r\nОперативная память (Гб)	3\r\nПоддержка карт памяти	MicroSD, MicroSDHC, MicroSDXC\r\nСлот для карты памяти	отдельный\r\nОперационная система	Android 8.0 Oreo\r\nSIM-карта	micro-SIM\r\nАккумулятор (мАч)	3500\r\nВес (г)	177', 14490, 0, 'Galaxy_J8.jpg', 1, 1),
(3, 'Apple iPhone X 64GB', 'Технические характеристики\r\nПроизводитель	Apple\r\nДиапазоны GSM	850, 900, 1800, 1900\r\nИнтернет	GPRS, EDGE, 3G, 4G\r\nДиагональ (дюйм)	5.8\r\nРазрешение (пикс)	2436x1125\r\nВстроенная память (Гб)	64\r\nФотокамера (Мп)	12 + 12 (двойная)\r\nКоличество ядер	6\r\nОперативная память (Гб)	3\r\nПоддержка карт памяти	нет\r\nОперационная система	iOS 12\r\nSIM-карта	nano-SIM\r\nАккумулятор (мАч)	2716\r\nВремя разговора (ч)	21\r\nВес (г)	174', 65990, 1, 'iphone_x.jpg', 2, 1),
(4, 'Samsung G955 Galaxy S8+', 'Технические характеристики\r\nПроизводитель	Samsung\r\nДиапазоны GSM	850, 900, 1800, 1900\r\nИнтернет	GPRS, EDGE, 3G, 4G\r\nДиагональ (дюйм)	6.2\r\nРазрешение (пикс)	2960x1440\r\nВстроенная память (Гб)	64\r\nФотокамера (Мп)	12\r\nЧастота процессора (МГц)	2300\r\nКоличество ядер	8\r\nОперативная память (Гб)	4\r\nПоддержка карт памяти	MicroSD, MicroSDHC, MicroSDXC\r\nСлот для карты памяти	совмещенный с одной из SIM-карт\r\nОперационная система	Android 7.0 Nougat\r\nSIM-карта	nano-SIM\r\nАккумулятор (мАч)	3500\r\nВес (г)	173', 53790, 1, 'Galaxy_S8.jpg', 2, 1),
(5, 'Apple iPhone 7 32GB', 'Технические характеристики\r\nПроизводитель	Apple\r\nДиапазоны GSM	850, 900, 1800, 1900\r\nИнтернет	GPRS, EDGE, 3G, 4G\r\nДиагональ (дюйм)	4.7\r\nРазрешение (пикс)	1334x750\r\nВстроенная память (Гб)	32\r\nФотокамера (Мп)	12\r\nЧастота процессора (МГц)	2340\r\nКоличество ядер	4\r\nОперативная память (Гб)	2\r\nПоддержка карт памяти	нет\r\nОперационная система	iOS 12\r\nSIM-карта	nano-SIM\r\nАккумулятор (мАч)	1960\r\nВес (г)	138', 34490, 0, 'iphone_7.jpg', 2, 1),
(6, 'Apple iPhone 8 64GB', 'Технические характеристики\r\nПроизводитель	Apple\r\nДиапазоны GSM	850, 900, 1800, 1900\r\nИнтернет	GPRS, EDGE, 3G, 4G\r\nДиагональ (дюйм)	4.7\r\nРазрешение (пикс)	1334x750\r\nВстроенная память (Гб)	64\r\nФотокамера (Мп)	12\r\nКоличество ядер	6\r\nОперативная память (Гб)	2\r\nПоддержка карт памяти	нет\r\nОперационная система	iOS 12\r\nSIM-карта	nano-SIM\r\nАккумулятор (мАч)	1821\r\nВремя разговора (ч)	14\r\nВес (г)	148', 46990, 0, 'iphone_8.jpg', 2, 1),
(7, 'Apple iPad Pro 11 Wi-Fi 64GB', 'Технические характеристики\r\nПроизводитель	Apple\r\nТип дисплея	Retina\r\nДиагональ дисплея (дюйм)	11\r\nРазрешение (пикс)	2388x1668\r\nВстроенная память (Гб)	64\r\nФотокамера (Мп)	12\r\nОС	iOS 12\r\nВес (г)	468', 65990, 1, 'iPad_Pro_11.jpg', 2, 2),
(8, 'Samsung Galaxy Tab A 10.5 LTE 32Gb', 'Технические характеристики\r\nПроизводитель	Samsung\r\nДиагональ дисплея (дюйм)	10.5\r\nРазрешение (пикс)	1900x1200\r\nЧастота процессора (МГц)	1800\r\nКоличество ядер	8\r\nОперативная память (Мб)	3072\r\nВстроенная память (Гб)	32\r\nФотокамера (Мп)	8.0\r\nИнтернет	3G, 4G\r\nВес (г)	534', 24990, 0, 'Samsung_Galaxy_Tab_A_10.5.jpg', 1, 2),
(9, 'Apple MacBook Air Retina 128 Gb', 'Технические характеристики\r\nПроизводитель	Apple\r\nДиагональ дисплея (дюйм)	13.3\r\nПроцессор	Intel® Core™ i5\r\nЧастота (МГц)	1600\r\nКоличество ядер	2\r\nОперативная память (Мб)	8192\r\nЕмкость SSD (Гб)	128\r\nРазрешение дисплея	2560x1600\r\nВидеокарта	Intel® UHD Graphics 617\r\nОперационная система	macOS Mojave', 102990, 0, 'MacBook_Air_Retina.jpg', 2, 3),
(10, 'ASUS X540NA-GQ008T', 'Технические характеристики\r\nПроизводитель	ASUS\r\nДиагональ дисплея (дюйм)	15.6\r\nПроцессор	Intel® Pentium® N4200\r\nЧастота (МГц)	1100\r\nКоличество ядер	4\r\nОперативная память (Мб)	4096\r\nЕмкость HDD (Гб)	500\r\nРазрешение дисплея	1366x768\r\nВидеокарта	Intel® HD Graphics\r\nКоличество USB-портов	3\r\nОперационная система	Windows 10 Home', 23140, 0, 'ASUS_X540NA-GQ008T.jpg', 3, 3);

-- --------------------------------------------------------

--
-- Структура таблицы `orders`
--

CREATE TABLE `orders` (
  `order_id` int(11) NOT NULL,
  `buyer_name` varchar(32) NOT NULL,
  `buyer_lastname` varchar(32) NOT NULL,
  `buyer_telephone` varchar(12) NOT NULL,
  `buyer_address` varchar(128) NOT NULL,
  `buyer_index` varchar(6) NOT NULL,
  `buyer_email` varchar(32) NOT NULL,
  `order_time` varchar(32) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `orders`
--

INSERT INTO `orders` (`order_id`, `buyer_name`, `buyer_lastname`, `buyer_telephone`, `buyer_address`, `buyer_index`, `buyer_email`, `order_time`, `status`) VALUES
(70, 'Василий', 'Петров', '89600902222', 'Казань', '654321', 'vas@mail.ru', 'Tue, 05 Mar 19 22:04:16 +0300', 0),
(71, 'Василий', 'Петров', '89600902222', 'Казань', '654321', 'vas@mail.ru', 'Tue, 05 Mar 19 22:05:02 +0300', 0),
(72, 'Александр', 'Нилин', '89053161616', 'Казань', '123', 'alex@mail.ru', 'Tue, 05 Mar 19 22:05:42 +0300', 0);

-- --------------------------------------------------------

--
-- Структура таблицы `order_list`
--

CREATE TABLE `order_list` (
  `id_goods` varchar(64) NOT NULL,
  `count_goods` smallint(16) NOT NULL,
  `order_id` int(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `order_list`
--

INSERT INTO `order_list` (`id_goods`, `count_goods`, `order_id`) VALUES
('2', 5, 13),
('3', 2, 13),
('4', 1, 13),
('7', 1, 13),
('2', 5, 14),
('3', 2, 14),
('4', 1, 14),
('7', 1, 14),
('4', 1, 15),
('7', 15, 16),
('2', 1, 17),
('1', 1, 66),
('7', 2, 67),
('9', 3, 68),
('1', 1, 68),
('2', 1, 68),
('3', 1, 68),
('7', 5, 69),
('1', 1, 70),
('6', 2, 70),
('8', 3, 70),
('5', 1, 71),
('10', 3, 72),
('2', 5, 72),
('4', 1, 72),
('6', 4, 73),
('3', 1, 73),
('2', 1, 73),
('3', 1, 74);

-- --------------------------------------------------------

--
-- Структура таблицы `types`
--

CREATE TABLE `types` (
  `id_type` smallint(255) NOT NULL,
  `name_type` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `types`
--

INSERT INTO `types` (`id_type`, `name_type`) VALUES
(1, 'telephone'),
(2, 'tablet'),
(3, 'laptop');

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `user_name` varchar(32) NOT NULL,
  `lastname` varchar(32) NOT NULL,
  `telephone` varchar(12) NOT NULL,
  `adres` varchar(256) NOT NULL,
  `user_index` int(6) NOT NULL,
  `user_password` varchar(32) NOT NULL,
  `email` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`user_id`, `user_name`, `lastname`, `telephone`, `adres`, `user_index`, `user_password`, `email`) VALUES
(2, 'admin', 'admin', '42', 'www', 123456, '202cb962ac59075b964b07152d234b70', 'admin'),
(3, 'Александр', 'Нилин', '89053161616', 'Казань', 123, '202cb962ac59075b964b07152d234b70', 'alex@mail.ru'),
(4, 'Василий', 'Петров', '89600902222', 'Казань', 654321, '202cb962ac59075b964b07152d234b70', 'vas@mail.ru');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `companys`
--
ALTER TABLE `companys`
  ADD PRIMARY KEY (`id_company`);

--
-- Индексы таблицы `goods`
--
ALTER TABLE `goods`
  ADD PRIMARY KEY (`id_goods`);

--
-- Индексы таблицы `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`);

--
-- Индексы таблицы `types`
--
ALTER TABLE `types`
  ADD PRIMARY KEY (`id_type`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `companys`
--
ALTER TABLE `companys`
  MODIFY `id_company` smallint(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT для таблицы `goods`
--
ALTER TABLE `goods`
  MODIFY `id_goods` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT для таблицы `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=73;

--
-- AUTO_INCREMENT для таблицы `types`
--
ALTER TABLE `types`
  MODIFY `id_type` smallint(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
