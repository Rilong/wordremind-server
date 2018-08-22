-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Авг 22 2018 г., 10:04
-- Версия сервера: 5.7.20-log
-- Версия PHP: 7.0.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `wordeng`
--

-- --------------------------------------------------------

--
-- Структура таблицы `sentences`
--

CREATE TABLE `sentences` (
  `id` int(11) NOT NULL,
  `word_id` int(11) NOT NULL,
  `text` text NOT NULL,
  `translation` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `sentences`
--

INSERT INTO `sentences` (`id`, `word_id`, `text`, `translation`) VALUES
(1, 1, 'I speak English fluently 2', 'Я розмовляю по англійські вільно'),
(2, 2, 'It happens', 'Це буває'),
(3, 3, 'He often plays computer games', 'Він часто грає в комп\'ютерні ігри'),
(4, 4, 'He usually relaxes in the day', 'Він зазвичай відпочиває вдень'),
(5, 5, 'I have a rest', 'Я відпочиваю'),
(6, 6, 'It seems interesting', 'Це здається цікавим'),
(7, 7, 'It costs 200 dollars', 'Це коштує 200 доларів'),
(8, 8, ' This dress costs 50 dollars', 'Це плаття коштує 50 доларів'),
(9, 9, 'I also think so', 'Я так теж думаю'),
(10, 10, 'I get up early', 'я прокидаюся рано'),
(11, 11, 'She eats late', 'Вона їсть пізно'),
(12, 12, 'She watches different videos', 'Вона дивиться різні відео'),
(13, 13, 'I want to buy this thing', 'Я хочу купити цю річ'),
(14, 14, 'I want order this phone', 'Я хочу замовити цей телефон'),
(15, 16, 'I want to go to abroad ', 'Я хочу поїхати за кордон'),
(17, 18, 'I want to have my own a house', 'Я хочу мати свій будинок'),
(18, 19, 'I want to know everything', 'Я хочу все знати'),
(19, 20, 'I would like to hear this story', 'Я хотів би почути цю історію'),
(20, 21, 'I want to earn more money', 'Я хочу заробляти більше грошей'),
(21, 22, 'I prefer to learn English on YouTube', 'Я віддаю перевагу вивчати англійську мову на YouTube'),
(22, 23, 'I don\'t walk to work', 'Я не ходжу на роботу'),
(23, 24, 'I need your advice', 'Мені потрібна ваша порада'),
(24, 25, 'I want to become a good programmer', 'Я хочу стати хорошим програмістом'),
(25, 26, 'I don\'t buy any newspapers and magazines', 'Я не купую Які небудь газети та журналі'),
(26, 27, 'I often make mistakes', 'Я часто роблю помилки'),
(27, 28, 'We live together', 'Ми живемо разом'),
(28, 29, 'I often forget this word', 'Я часто забуваю це слово'),
(29, 30, 'He feels bad', 'Він почуває себе погано'),
(30, 31, 'I need money urgently', 'Мені потрібні гроші терміново'),
(31, 32, 'It seems strange', 'Здається дивним'),
(32, 33, 'It seems boring', 'Це здається нудним'),
(33, 34, 'It look wonderful ', 'Це виглядає чудово'),
(34, 35, 'His rest include it', 'Його відпочинок включає це'),
(35, 36, 'I meet his very rarely', 'Я зустрічаю його зовсім рідко'),
(36, 38, 'My classmate wants to study with me, too', 'Мій однокласник хоче навчатися зі мною теж'),
(37, 39, 'My neighbors go shopping', 'Мої сусіди ходять по магазинах'),
(38, 40, ' I want to buy a expensive phone', 'Я хочу купити дорогий телефон'),
(39, 41, 'He buys cheap things', 'Він купує дешеві речі'),
(40, 42, 'She usually meets him in the evening', 'Вона зазвичай зустрічає його ввечері'),
(41, 43, 'I wait for it', 'Я чекаю на це'),
(42, 44, 'She offers him to buy this car', 'Вона пропонує йому купити цю машину'),
(43, 45, 'The book seems very useful', 'Книга здається дуже корисною'),
(44, 46, 'She explains it', 'Вона пояснює це'),
(45, 47, 'I promise you', 'я обіцяю тобі'),
(46, 48, 'It is an excellent result', 'Це чудовий результат'),
(47, 49, 'I am not lazy', 'Я не лінивий'),
(48, 50, 'I\'m hungry', 'я голодний'),
(49, 51, 'Today warm and sunny day', 'Сьогодні теплий та сонячний день'),
(50, 52, 'I\'m very tired and want to have a rest', 'Я дуже втомлений і хочу відпочити'),
(51, 53, 'He\'s very rich', 'Він дуже багатий'),
(52, 54, 'You\'re afraid of this thing', 'Ви боїтеся цієї речі'),
(53, 55, 'I have money enough', 'У мене є достатньо грошей'),
(54, 56, 'I\'d like to have a powerful computer', 'Я хотів би мати потужний комп\'ютер'),
(55, 57, 'Your partners aren\'t reliable', 'Ваші партнери не надійними'),
(56, 58, 'She\'s my a good acquaintance', 'Вона моя хороша знайома'),
(57, 59, 'You\'re wrong', 'Ти не правий'),
(58, 60, 'My brother lives very far from me ', 'Мій брат живе дуже далеко від мене'),
(59, 61, 'You\'re a good specialist in this area', 'Ви хороший спеціаліст у цій галузі'),
(60, 62, 'You\'re a pleasant person', 'Ви приємна людина'),
(61, 63, 'I\'m an independent person', 'Я незалежна людина'),
(62, 64, 'I\'m a famous person', 'Я знаменита людина'),
(63, 65, 'He\'s a outstanding singer', 'Він видатний співак'),
(64, 66, 'Knowledge is power', 'Знання це сила'),
(65, 67, 'I want to buy an available phone', 'Я хочу купити доступний телефон'),
(66, 68, 'He\'s an experienced worker', 'Він досвідчений працівник'),
(67, 69, 'My friend is quite reliable', 'Мій друг цілком надійний'),
(68, 70, 'Your offer is obvious', 'Ваша пропозиція очевидна'),
(69, 71, 'Everyone knows about this thing', 'Всі знають про цю річ'),
(70, 72, 'It\'s a good decision', 'Це хороше рішення'),
(72, 0, 'I want to have my own car', 'Я хочу мати свій автомобіль'),
(74, 15, 'I want to live in another country', 'Я хочу жити в іншій країні');

-- --------------------------------------------------------

--
-- Структура таблицы `sessions`
--

CREATE TABLE `sessions` (
  `id` int(11) UNSIGNED NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_520_ci DEFAULT NULL,
  `ip` varchar(191) COLLATE utf8mb4_unicode_520_ci DEFAULT NULL,
  `user_id` int(11) UNSIGNED DEFAULT NULL,
  `date` int(11) UNSIGNED DEFAULT NULL,
  `agent` varchar(191) COLLATE utf8mb4_unicode_520_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;

--
-- Дамп данных таблицы `sessions`
--

INSERT INTO `sessions` (`id`, `token`, `ip`, `user_id`, `date`, `agent`) VALUES
(2, '3snowpxh7vIGhGlepzxoBlp5Bvn44wzhs9ejp365vYznRx2wBn4816Dhw4K0', '127.0.0.1', 1, 1533723490, '46c361fa77875e1e354f88a5b5f50d43bb84bbc9'),
(4, 'T82o4al32oTYMYgka9RT05e09QM0zl45pV5ac3fRee4euc0k32a464ncJnd5', '127.0.0.1', 1, 1533734562, '03c171b498ba703f5a41dc0683b7575d74dc9f11');

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` int(11) UNSIGNED NOT NULL,
  `login` varchar(20) NOT NULL,
  `password` varchar(64) NOT NULL,
  `settings` text,
  `auth_token` varchar(255) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `login`, `password`, `settings`, `auth_token`) VALUES
(1, 'Rilong', '$2y$10$djsv5hpPKBqBsjlpnwhcAO7YhVxRzWwnttlEy//QHYUplef47gwHS', NULL, NULL),
(5, 'test1', '$2y$10$52LPNaTB1oXSyw8ONgAcge49ASFkJKuZnMchNPnM44H/tiduOoQoW', NULL, NULL);

-- --------------------------------------------------------

--
-- Структура таблицы `words`
--

CREATE TABLE `words` (
  `id` int(11) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `word` varchar(20) NOT NULL,
  `translation` varchar(255) NOT NULL,
  `created_date` int(255) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `words`
--

INSERT INTO `words` (`id`, `user_id`, `word`, `translation`, `created_date`) VALUES
(1, 1, 'Fluently', 'Вільно', 1527158001),
(2, 1, 'Happen', 'Буває', 1527158001),
(3, 1, 'Often', 'Часто', 1527158001),
(4, 1, 'Usually', 'Зазвичай', 1527158001),
(5, 1, 'Rest', 'Відпочинок', 1527158001),
(6, 1, 'Seem', 'Здається', 1527158001),
(7, 1, 'Cost', 'Коштує', 1527158001),
(8, 1, 'Dress', 'Плаття', 1527158001),
(9, 1, 'Also', 'Також', 1527158001),
(10, 1, 'Early', 'Рано', 1527158001),
(11, 1, 'Late', 'Пізно', 1527158001),
(12, 1, 'Different', 'Різний', 1527158001),
(13, 1, 'Thing', 'Річ', 1527158001),
(14, 1, 'Order', 'Замовлення', 1527158001),
(15, 1, 'Another', 'Інше', 1527158001),
(16, 1, 'Abroad', 'За кордоном', 1527158001),
(18, 1, 'Own', 'Власний', 1527158001),
(19, 1, 'Everything', 'Все', 1527158001),
(20, 1, 'Hear', 'Почути', 1527158001),
(21, 1, 'Earn', 'Заробляти', 1527158001),
(22, 1, 'Prefer', 'Віддавати перевагу ', 1527158001),
(23, 1, 'Walk', 'Ходити (Пішки)', 1527158001),
(24, 1, 'Advice', 'Порада', 1527158001),
(25, 1, 'Become', 'Стати', 1527158001),
(26, 1, 'Any', 'Будь-який', 1527158001),
(27, 1, 'Mistake', 'Помилка', 1527158001),
(28, 1, 'Together', 'Разом', 1527158001),
(29, 1, 'Forget', 'Забувати', 1527158001),
(30, 1, 'Feel', 'Відчути', 1527158001),
(31, 1, 'Urgently', 'Терміново', 1527158001),
(32, 1, 'Strange', 'Дивно', 1527158001),
(33, 1, 'Boring', 'Нудно', 1527158001),
(34, 1, 'Wonderful', 'Чодово', 1527158001),
(35, 1, 'Include', 'Включати', 1527158001),
(36, 1, 'Rarely / Seldom', 'Рідко', 1527158001),
(37, 1, 'Colleague', 'Колега', 1527158001),
(38, 1, 'Classmate', 'Однокласник', 1527158001),
(39, 1, 'Neighbor', 'Сусід', 1527158001),
(40, 1, 'Expensive', 'Дорого', 1527158001),
(41, 1, 'Cheap', 'Дешево', 1527158001),
(42, 1, 'Meet', 'Зуcтрічати', 1527158001),
(43, 1, 'Wait', 'Чекати', 1527158001),
(44, 1, 'Offer', 'Пропозиція', 1527158001),
(45, 1, 'Useful', 'Корисно', 1527158001),
(46, 1, 'Explain', 'Пояснити', 1527158001),
(47, 1, 'Promise', 'Обіцянка', 1527158001),
(48, 1, 'Excellent', 'Відмінно', 1527158001),
(49, 1, 'Lazy', 'Лінивий', 1527158001),
(50, 1, 'Hungry', 'Голодний', 1527158001),
(51, 1, 'Warm', 'Теплий', 1527158001),
(52, 1, 'Tired', 'Втомився', 1527158001),
(53, 1, 'Rich', 'Багатий', 1527158001),
(54, 1, 'Afraid', 'Боїться', 1527158001),
(55, 1, 'Enough', 'Достатньо', 1527158001),
(56, 1, 'Powerful', 'Потужний', 1527158001),
(57, 1, 'Reliable', 'Надійний', 1527158001),
(58, 1, 'Acquaintance', 'Знайомій', 1527158001),
(59, 1, 'Wrong', 'Неправий', 1527158001),
(60, 1, 'Far', 'Далеко', 1527158001),
(61, 1, 'Specialist', 'Cпеціаліст', 1527158001),
(62, 1, 'Pleasant', 'Приємний', 1527158001),
(63, 1, 'Independent', 'Незалежний', 1527158001),
(64, 1, 'Famous', 'Знаменитий', 1527158001),
(65, 1, 'Outstanding', 'Видатний', 1527158001),
(66, 1, 'Knowledge', 'Знання', 1527158001),
(67, 1, 'Available', 'Доступно', 1527158001),
(68, 1, 'Experienced', 'Досвідчений', 1527158001),
(69, 1, 'Quite', 'Цілком', 1527158001),
(70, 1, 'Obvious', 'Очевидний', 1527158001),
(71, 1, 'Everyone', 'Всі', 1527158001),
(72, 1, 'Decision', 'Рішення', 1527158005);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `sentences`
--
ALTER TABLE `sentences`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `index_foreignkey_sessions_user` (`user_id`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `login` (`login`);

--
-- Индексы таблицы `words`
--
ALTER TABLE `words`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `sentences`
--
ALTER TABLE `sentences`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=75;

--
-- AUTO_INCREMENT для таблицы `sessions`
--
ALTER TABLE `sessions`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT для таблицы `words`
--
ALTER TABLE `words`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=73;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
