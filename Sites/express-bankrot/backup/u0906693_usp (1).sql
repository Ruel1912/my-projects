-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Хост: localhost
-- Время создания: Июн 14 2023 г., 21:01
-- Версия сервера: 5.7.27-30
-- Версия PHP: 7.1.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `u0906693_usp`
--

-- --------------------------------------------------------

--
-- Структура таблицы `anketa`
--

CREATE TABLE `anketa` (
  `id` int(10) UNSIGNED NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `fio` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `city` varchar(255) NOT NULL,
  `status_soc` text,
  `work_place` text,
  `marital_status` text,
  `criminal_record` text,
  `dependents` text,
  `disability` text,
  `credit_debt` text,
  `other_debt` text,
  `additional_audit_info` text,
  `incoming_money` text,
  `property` text,
  `deals` text,
  `rationale` text,
  `cookie_token` varchar(255) NOT NULL,
  `client_param` varchar(255) DEFAULT NULL,
  `confirmed_status` int(11) NOT NULL DEFAULT '0',
  `send_to` int(11) DEFAULT NULL,
  `send_date` timestamp NULL DEFAULT NULL,
  `msg` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `articles`
--

CREATE TABLE `articles` (
  `id` int(11) NOT NULL COMMENT 'ID',
  `category` varchar(255) CHARACTER SET utf8mb4 NOT NULL COMMENT 'Категория',
  `title` varchar(255) CHARACTER SET utf8mb4 NOT NULL COMMENT 'Заголовок',
  `link` varchar(255) CHARACTER SET utf8mb4 NOT NULL COMMENT 'Ссылка на статью',
  `sub_title` varchar(255) CHARACTER SET utf8mb4 NOT NULL COMMENT 'Подзаголовок',
  `content` text CHARACTER SET utf8mb4 NOT NULL COMMENT 'Содержание статьи',
  `image` varchar(255) CHARACTER SET utf8mb4 NOT NULL COMMENT 'Иллюстрация',
  `views` int(11) NOT NULL COMMENT 'Просмотры',
  `likes` int(11) NOT NULL COMMENT 'Лайки',
  `dizlike` int(11) NOT NULL COMMENT 'Не нравится',
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT 'Дата публикации',
  `meta_desc` varchar(255) CHARACTER SET utf8mb4 NOT NULL COMMENT 'Мета описание',
  `meta_title` varchar(255) CHARACTER SET utf8mb4 NOT NULL COMMENT 'Мета заголовок',
  `keywords` varchar(255) COLLATE utf8mb4_danish_ci NOT NULL COMMENT 'Ключевые слова'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_danish_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `completed`
--

CREATE TABLE `completed` (
  `id` int(11) NOT NULL COMMENT 'ID',
  `summ` int(11) NOT NULL COMMENT 'Сумма долгов',
  `case_number` varchar(255) CHARACTER SET utf8mb4 NOT NULL COMMENT 'Номер дела',
  `image_case` varchar(255) CHARACTER SET utf8mb4 NOT NULL COMMENT 'Скрин первой страницы дела',
  `link_case` varchar(255) CHARACTER SET utf8mb4 NOT NULL COMMENT 'Ссылка на дело',
  `date_add` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT 'Дата добавления'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_danish_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `download_urls`
--

CREATE TABLE `download_urls` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `urls` text,
  `deal_id` int(11) NOT NULL,
  `stage_id` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Структура таблицы `knowledge_base`
--

CREATE TABLE `knowledge_base` (
  `id` int(11) NOT NULL COMMENT 'ID',
  `name` varchar(255) COLLATE utf8mb4_danish_ci NOT NULL COMMENT 'Название',
  `video` varchar(255) COLLATE utf8mb4_danish_ci NOT NULL COMMENT 'Видео',
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT 'Дата создания'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_danish_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `message_tiket`
--

CREATE TABLE `message_tiket` (
  `id` int(11) NOT NULL COMMENT 'ID',
  `tiket_id` int(11) NOT NULL COMMENT 'ID Тикета',
  `user_id` int(11) NOT NULL COMMENT 'ID юзера',
  `message` text CHARACTER SET utf8mb4 NOT NULL COMMENT 'сообщение',
  `attachments` varchar(255) CHARACTER SET utf8mb4 DEFAULT NULL COMMENT 'вложения',
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT 'дата',
  `isSupport` int(11) NOT NULL DEFAULT '0' COMMENT 'сообщение поддержки'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_danish_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `migration`
--

CREATE TABLE `migration` (
  `version` varchar(180) COLLATE utf8mb4_danish_ci NOT NULL,
  `apply_time` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_danish_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `notice`
--

CREATE TABLE `notice` (
  `id` int(11) NOT NULL COMMENT 'ID',
  `user_id` int(11) NOT NULL COMMENT 'ID Пользователя',
  `notice_params` text COLLATE utf8mb4_danish_ci NOT NULL COMMENT 'Параментры уведомлений'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_danish_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `reviews`
--

CREATE TABLE `reviews` (
  `id` int(11) NOT NULL COMMENT 'ID',
  `fio` varchar(255) CHARACTER SET utf8mb4 NOT NULL COMMENT 'Имя',
  `status` varchar(255) CHARACTER SET utf8mb4 NOT NULL COMMENT 'Положение',
  `region` varchar(255) CHARACTER SET utf8mb4 NOT NULL COMMENT 'Регион',
  `date_application` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP COMMENT 'Дата обращения',
  `summ` int(11) NOT NULL COMMENT 'Сумма долгов',
  `bankruptcy_date` timestamp NULL DEFAULT NULL COMMENT 'Дата банкротства',
  `case_number` varchar(255) CHARACTER SET utf8mb4 DEFAULT NULL COMMENT 'Номер дела',
  `link_case` varchar(255) CHARACTER SET utf8mb4 DEFAULT NULL COMMENT 'Ссылка на дело',
  `reviews` text CHARACTER SET utf8mb4 COMMENT 'Отзыв клиента',
  `video_link` varchar(255) CHARACTER SET utf8mb4 DEFAULT NULL COMMENT 'Ссылка на видео',
  `date_add` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT 'Дата добавления'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_danish_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `services`
--

CREATE TABLE `services` (
  `id` int(11) NOT NULL COMMENT 'ID',
  `title` varchar(255) CHARACTER SET utf8mb4 NOT NULL COMMENT 'Заголовок услуги',
  `smal_title` varchar(255) CHARACTER SET utf8mb4 NOT NULL COMMENT 'Подзаголовок услуги',
  `benefits` varchar(255) CHARACTER SET utf8mb4 NOT NULL COMMENT 'Преимущества',
  `image` varchar(255) CHARACTER SET utf8mb4 NOT NULL COMMENT 'Фоновое изображение',
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT 'Дата'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_danish_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `stages`
--

CREATE TABLE `stages` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `small_desc` text,
  `need_to_do` text,
  `files_provide` tinyint(4) NOT NULL DEFAULT '0',
  `files_accept` tinyint(4) NOT NULL DEFAULT '0',
  `status` varchar(255) NOT NULL,
  `days` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Структура таблицы `system_props`
--

CREATE TABLE `system_props` (
  `id` int(11) NOT NULL,
  `property` varchar(255) NOT NULL,
  `value` varchar(1024) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Структура таблицы `tariff`
--

CREATE TABLE `tariff` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `props` text NOT NULL,
  `full_price` int(11) NOT NULL,
  `first_pay` int(11) NOT NULL,
  `months` int(11) NOT NULL DEFAULT '8',
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Структура таблицы `text_stages`
--

CREATE TABLE `text_stages` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `text` text,
  `deal_id` int(11) NOT NULL,
  `stage_id` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Структура таблицы `tikets`
--

CREATE TABLE `tikets` (
  `id` int(11) NOT NULL COMMENT 'ID',
  `user_id` int(11) NOT NULL COMMENT 'ID юзера',
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT 'дата',
  `status` int(11) NOT NULL DEFAULT '1' COMMENT 'открыт\\закрыт'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_danish_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `auth_key` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `password_hash` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password_reset_token` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` smallint(6) NOT NULL DEFAULT '10',
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL,
  `verification_token` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `anketa_id` int(11) DEFAULT NULL,
  `region` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `fio` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `tariff_id` int(11) DEFAULT NULL,
  `contact_id` int(11) DEFAULT NULL COMMENT 'ID Контакта',
  `deal_id` int(11) NOT NULL,
  `stage_id` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `user_files`
--

CREATE TABLE `user_files` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `type` varchar(255) NOT NULL,
  `link` varchar(255) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Структура таблицы `user_payments`
--

CREATE TABLE `user_payments` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `date_create` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `date_exp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `expected_val` float NOT NULL,
  `val` float DEFAULT NULL,
  `status` int(11) NOT NULL,
  `bitrix_pay_id` varchar(255) NOT NULL,
  `link_payment` varchar(512) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Структура таблицы `user_stages`
--

CREATE TABLE `user_stages` (
  `id` int(11) NOT NULL COMMENT 'ID',
  `user_id` int(11) NOT NULL COMMENT 'Пользователь',
  `stage_id` varchar(255) NOT NULL COMMENT 'Стадия',
  `current_stage` tinyint(4) NOT NULL DEFAULT '1' COMMENT 'Это текущая стадия',
  `passed` tinyint(4) NOT NULL DEFAULT '0' COMMENT 'Стадия пройдена',
  `sort` tinyint(4) NOT NULL COMMENT 'Порядковый номер',
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT 'Дата',
  `deployments` tinyint(4) NOT NULL DEFAULT '0' COMMENT 'Загрузки',
  `deployment_passed` tinyint(4) NOT NULL DEFAULT '0' COMMENT 'Файлы загружены'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `anketa`
--
ALTER TABLE `anketa`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `articles`
--
ALTER TABLE `articles`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `completed`
--
ALTER TABLE `completed`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `download_urls`
--
ALTER TABLE `download_urls`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `knowledge_base`
--
ALTER TABLE `knowledge_base`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `message_tiket`
--
ALTER TABLE `message_tiket`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `migration`
--
ALTER TABLE `migration`
  ADD PRIMARY KEY (`version`);

--
-- Индексы таблицы `notice`
--
ALTER TABLE `notice`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `stages`
--
ALTER TABLE `stages`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `system_props`
--
ALTER TABLE `system_props`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `tariff`
--
ALTER TABLE `tariff`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `text_stages`
--
ALTER TABLE `text_stages`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `tikets`
--
ALTER TABLE `tikets`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `password_reset_token` (`password_reset_token`);

--
-- Индексы таблицы `user_files`
--
ALTER TABLE `user_files`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `user_payments`
--
ALTER TABLE `user_payments`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `user_stages`
--
ALTER TABLE `user_stages`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `anketa`
--
ALTER TABLE `anketa`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `articles`
--
ALTER TABLE `articles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'ID';

--
-- AUTO_INCREMENT для таблицы `completed`
--
ALTER TABLE `completed`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'ID';

--
-- AUTO_INCREMENT для таблицы `download_urls`
--
ALTER TABLE `download_urls`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `knowledge_base`
--
ALTER TABLE `knowledge_base`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'ID';

--
-- AUTO_INCREMENT для таблицы `message_tiket`
--
ALTER TABLE `message_tiket`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'ID';

--
-- AUTO_INCREMENT для таблицы `notice`
--
ALTER TABLE `notice`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'ID';

--
-- AUTO_INCREMENT для таблицы `reviews`
--
ALTER TABLE `reviews`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'ID';

--
-- AUTO_INCREMENT для таблицы `services`
--
ALTER TABLE `services`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'ID';

--
-- AUTO_INCREMENT для таблицы `stages`
--
ALTER TABLE `stages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `system_props`
--
ALTER TABLE `system_props`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `tariff`
--
ALTER TABLE `tariff`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `text_stages`
--
ALTER TABLE `text_stages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `tikets`
--
ALTER TABLE `tikets`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'ID';

--
-- AUTO_INCREMENT для таблицы `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `user_files`
--
ALTER TABLE `user_files`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `user_payments`
--
ALTER TABLE `user_payments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `user_stages`
--
ALTER TABLE `user_stages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'ID';
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
