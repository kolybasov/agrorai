-- phpMyAdmin SQL Dump
-- version 3.4.11.1deb2
-- http://www.phpmyadmin.net
--
-- Хост: localhost
-- Час створення: Бер 18 2014 р., 16:15
-- Версія сервера: 5.5.33
-- Версія PHP: 5.4.4-14+deb7u7

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- БД: `agrorai`
--

-- --------------------------------------------------------

--
-- Структура таблиці `ci_sessions`
--

CREATE TABLE IF NOT EXISTS `ci_sessions` (
  `session_id` varchar(40) COLLATE utf8_bin NOT NULL DEFAULT '0',
  `ip_address` varchar(16) COLLATE utf8_bin NOT NULL DEFAULT '0',
  `user_agent` varchar(150) COLLATE utf8_bin NOT NULL,
  `last_activity` int(10) unsigned NOT NULL DEFAULT '0',
  `user_data` text COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`session_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Дамп даних таблиці `ci_sessions`
--

INSERT INTO `ci_sessions` (`session_id`, `ip_address`, `user_agent`, `last_activity`, `user_data`) VALUES
('7ad450e4363803b2a272ba8edd69a505', '192.168.56.1', 'Mozilla/5.0 (Windows NT 6.3; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/32.0.1700.102 YaBrowser/14.2.1700.1250', 1395151218, ''),
('a709f0813564c23b1502097a3662799e', '192.168.56.1', 'Mozilla/5.0 (Windows NT 6.3; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/32.0.1700.102 YaBrowser/14.2.1700.1250', 1395152063, 'a:1:{s:9:"user_data";s:0:"";}');

-- --------------------------------------------------------

--
-- Структура таблиці `login_attempts`
--

CREATE TABLE IF NOT EXISTS `login_attempts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ip_address` varchar(40) COLLATE utf8_bin NOT NULL,
  `login` varchar(50) COLLATE utf8_bin NOT NULL,
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Структура таблиці `orders`
--

CREATE TABLE IF NOT EXISTS `orders` (
  `order_id` int(11) NOT NULL AUTO_INCREMENT,
  `pib` varchar(50) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `address` varchar(100) NOT NULL,
  `commodity` varchar(4) NOT NULL,
  `count` float NOT NULL,
  `date` datetime NOT NULL,
  `is_new` tinyint(1) NOT NULL DEFAULT '1',
  `is_archived` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`order_id`),
  UNIQUE KEY `order_id_2` (`order_id`),
  KEY `order_id` (`order_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=11 ;

--
-- Дамп даних таблиці `orders`
--

INSERT INTO `orders` (`order_id`, `pib`, `phone`, `address`, `commodity`, `count`, `date`, `is_new`, `is_archived`) VALUES
(6, 'Басов Микола Анатолійович', '0988881089', 'смт. Рафалівка, вул.1 Травня 14/2', 'bean', 436346, '2013-11-28 00:00:00', 0, 0),
(8, 'Березовий В.Я.', '0323252352', 'Кагалик, вул.Якась там', 'oil', 1234, '2013-11-29 00:00:00', 0, 1),
(9, 'Березовий Василь Ярославович', '093-333-4456', 'м.Кагарлик', 'oil', 0, '2013-12-11 01:11:05', 0, 0);

-- --------------------------------------------------------

--
-- Структура таблиці `other_info`
--

CREATE TABLE IF NOT EXISTS `other_info` (
  `info_id` int(11) NOT NULL AUTO_INCREMENT,
  `keywords` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `bean_price` float NOT NULL,
  `oil_price` float NOT NULL,
  `email` varchar(30) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `name` varchar(40) NOT NULL,
  PRIMARY KEY (`info_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Дамп даних таблиці `other_info`
--

INSERT INTO `other_info` (`info_id`, `keywords`, `description`, `bean_price`, `oil_price`, `email`, `phone`, `name`) VALUES
(1, 'агрорай, соєві боби, соя, соєва олія, макуха, Кагарлик, продаж олії, соєва макуха, купівля, купити', 'Агрорай — підприємство по переробці сої. А Бога немає.', 3500, 7000, 'test@test.com', '(099)-999-99-99', 'John Doe');

-- --------------------------------------------------------

--
-- Структура таблиці `pages`
--

CREATE TABLE IF NOT EXISTS `pages` (
  `page_id` int(11) NOT NULL AUTO_INCREMENT,
  `slug` varchar(20) NOT NULL,
  `title` varchar(50) NOT NULL,
  `text` text NOT NULL,
  PRIMARY KEY (`page_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=9 ;

--
-- Дамп даних таблиці `pages`
--

INSERT INTO `pages` (`page_id`, `slug`, `title`, `text`) VALUES
(1, 'index', 'Головна', '<img src="assets/img/soy.jpg" alt="Соєві боби" class="pull-right img-rounded">\n<h2>Переробка сої<br>\n<small>на соєву макуху і нерафіновану олію</small></h2>\n<p class="text-justify">\nПереробний цех ТОВ "Агрорай" переробляє сою на соєву макуху і нерафіновану соєву олію. Соєва макуха та олія підвищує калорійність корму, допомагає нарощуванню м’язової маси тварин і птиці, є джерелом вуглеводів і цінних білків, добре збалансованого за амінокислотами.</p><p class="text-justify"> Соєва олія не містить холестерину і багата насиченими і ненасиченими жирними кислотами. Крім того, одержуваний соєвий екструдат має підвищену засвоюваність білка (в порівнянні з пресованим соєвим шротом), високий вміст високоякісної олії з антиоксидантними властивостями (завдяки наявності вітаміну Е і лецитину), що збільшує терміни зберігання продукту. Взагалі, соєвий білок, підготовлений екструдуванням, більш перетравлюваний, ніж білок, оброблений теплом після екстракції. </p>'),
(2, 'beans', 'Соєва макуха', '<h2>Соєва макуха</h2>\n<p>\n	Соєва макуха (МАКУХА) &mdash; один з продуктів основного раціону сільськогосподарських тварин і птиці. Його отримують після віджиму олії з насіння сої в процесі екструдування. (Не плутати з соєвим шротом, який виготовляється за іншою технологією і відрізняється від макухи вмістом жирів і протеїнів).</p>\n<p>\n	Соєва макуха використовується для приготування повноцінних комбікормів і кормосумішей. Це високоякісний білковий інгредієнт, що дозволяє досягти високих результатів вигодовування. Соєвий білок добре засвоюється організмом і біологічною цінністю наближається до білків тваринного походження.</p>\n<p>\n	Високий вміст енергії і протеїну в макусі дозволяє складати високопротеїнові і висоенергетичні раціони без застосування дорогих жирів. Включення соєвої макухи в раціон дійних корів (по 1-2 кг на голову на добу) збільшує надій на 1,5-2,0 літра.</p>\n<p>\n	Несучість курей-несучок зростає на 22-30%, прирости у курчат збільшуються на 7%, у підсвинків &mdash; на 5%, а приріст живої маси бройлерів і свиней сягає на 25-30% більше, ніж при звичайному вигодовуванні.</p>\n\n<img src="assets/img/soybeanmeal.jpg" class="img img-thumbnail" alt="Соєва макуха">\n<p>\n	Соєва макуха відповідає вимогам ГОСТ 27149-95 (макуха соєва кормова), і має такі характеристики:</p>\n<table class="table">\n	<tbody>\n		<tr>\n			<td class="table-left"> \n				Рід</td>\n			<td class="table-right">\n				макуха</td>\n		</tr>\n		<tr>\n			<td class="table-left">\n				Вид</td>\n			<td class="table-right">\n				соєва</td>\n		</tr>\n		<tr>\n			<td class="table-left">\n				Спосіб отримання</td>\n			<td class="table-right">\n				пресовий</td>\n		</tr>\n		<tr>\n			<td class="table-left">\n				Запах</td>\n			<td class="table-right">\n				властивий соєвій макусі, без стороннього запаху</td>\n		</tr>\n		<tr>\n			<td class="table-left">\n				Колір</td>\n			<td class="table-right">\n				натуральний, від жовтого до світло-бурого</td>\n		</tr>\n		<tr>\n			<td class="table-left">\n				Масова частка сирого протеїну (в перерахунку на АСВ), %</td>\n			<td class="table-right">\n				40-41</td>\n		</tr>\n		<tr>\n			<td class="table-left">\n				Масова частка жиру (в перерахунку на АСВ), %</td>\n			<td class="table-right">\n				7-8</td>\n		</tr>\n		<tr>\n			<td class="table-left">\n				Суха речовина, г</td>\n			<td class="table-right">\n				900</td>\n		</tr>\n		<tr>\n			<td class="table-left">\n				Масова частка вологи і летких речовин, %</td>\n			<td class="table-right">\n				7-10</td>\n		</tr>\n		<tr>\n			<td class="table-left">\n				Масова частка золи нерозчинної в 10% НСЛ (в перерахунку на АСВ), %</td>\n			<td class="table-right">\n				4,5</td>\n		</tr>\n		<tr>\n			<td class="table-left">\n				Масова частка сирої клітковини (в перерахунку на АСВ), %</td>\n			<td class="table-right">\n				6-7</td>\n		</tr>\n		<tr>\n			<td class="table-left">\n				Перетравний протеїн (ВРХ), г</td>\n			<td class="table-right">\n				400</td>\n		</tr>\n		<tr>\n			<td class="table-left">\n				Перетравний протеїн (вівці), г</td>\n			<td class="table-right">\n				356,4</td>\n		</tr>\n		<tr>\n			<td class="table-left">\n				Обмінна енергія (ВРХ), МДж</td>\n			<td class="table-right">\n				12,9</td>\n		</tr>\n		<tr>\n			<td class="table-left">\n				Обмінна енергія (свині), МДж</td>\n			<td class="table-right">\n				15,5</td>\n		</tr>\n		<tr>\n			<td class="table-left">\n				Обмінна енергія (вівці), МДж</td>\n			<td class="table-right">\n				11,72</td>\n		</tr>\n		<tr>\n			<td class="table-left">\n				Кормові одиниці</td>\n			<td class="table-right">\n				1,35</td>\n		</tr>\n		<tr>\n			<td class="table-left">\n				Крохмаль, г</td>\n			<td class="table-right">\n				20</td>\n		</tr>\n		<tr>\n			<td class="table-left">\n				Цукор, г</td>\n			<td class="table-right">\n				100</td>\n		</tr>\n		<tr>\n			<td class="table-left">\n				Метіонін+цистин, г</td>\n			<td class="table-right">\n				15,8</td>\n		</tr>\n		<tr>\n			<td class="table-left">\n				Біологічні екстрактивні речовини (БЕР), г</td>\n			<td class="table-right">\n				297</td>\n		</tr>\n		<tr>\n			<td class="table-left">\n				Сторонні домішки</td>\n			<td class="table-right">\n				відсутні</td>\n		</tr>\n		<tr>\n			<td class="table-left">\n				Активність уреази</td>\n			<td class="table-right">\n				0,1-0,3</td>\n		</tr>\n		<tr>\n			<td class="table-left">\n				Масова частка металодомішок, %</td>\n			<td class="table-right">\n				немає</td>\n		</tr>\n	</tbody>\n</table>'),
(3, 'oil', 'Соєва олія', '<h2>Соєва олія</h2>\n<p>\n	Нерафінована соєва олія, що одержується в результаті обробки соєвих бобів &mdash; дуже  попитний продукт для приготування збагачених енергією комбікормів.</p>\n<p>\n	Вона має унікальні властивості, багата на вітаміни, фосфоліпіди та інші корисні речовини. У ній багато ненасичених жирних кислот, особливо лінолевої і ліноленової. Ці кислоти не можуть синтезуватися в організмі тварин, але життєво необхідні для побудови клітин і деяких гормонів. Соєва олія містить близько 60% натуральних антиоксидантів від їх загальної кількості в соєвих бобах. Все це робить її незамінним продуктом для тих, хто професійно займається вирощуванням свиней, великої рогатої худоби, курей, індиків, страусів та інших тварин і птахів.</p>\n<img src="assets/img/soybeanoil.jpg" class="img img-thumbnail" alt="Соєва олія">\n<p>\n	Якість соєвої олії, виробленої в Україні, визначається стандартом ДСТУ 4534-2006, і, як правило, має показники, наближені до нижчеподаних:</p>\n<table class="table">\n	<tbody>\n		<tr>\n			<td class="table-left">\n				Рід</td>\n			<td class="table-right">\n				олія рослинна</td>\n		</tr>\n		<tr>\n			<td class="table-left">\n				Вид</td>\n			<td class="table-right">\n				соєва</td>\n		</tr>\n		<tr>\n			<td class="table-left">\n				Спосіб отримання</td>\n			<td class="table-right">\n				пресовий</td>\n		</tr>\n		<tr>\n			<td class="table-left">\n				Запах і смак</td>\n			<td class="table-right">\n				запах і смак, властивий соєвій олії, без стороннього запаху, присмаку, гіркоти</td>\n		</tr>\n		<tr>\n			<td class="table-left">\n				Колір</td>\n			<td class="table-right">\n				натуральний, коричневий із зеленуватим відтінком</td>\n		</tr>\n		<tr>\n			<td class="table-left">\n				Прозорість</td>\n			<td class="table-right">\n				злегка мутнувата, допускається невеликий осад</td>\n		</tr>\n		<tr>\n			<td class="table-left">\n				Масова частка нежирових домішок, %, не більше</td>\n			<td class="table-right">\n				0,2</td>\n		</tr>\n		<tr>\n			<td class="table-left">\n				Масова частка вологи, %</td>\n			<td class="table-right">\n				0,36</td>\n		</tr>\n		<tr>\n			<td class="table-left">\n				Кислотне число, мг КОН/г</td>\n			<td class="table-right">\n				4,0</td>\n		</tr>\n		<tr>\n			<td class="table-left">\n				Перекисне число, 1/2 моль О/кг, не більше</td>\n			<td class="table-right">\n				5,0</td>\n		</tr>\n		<tr>\n			<td class="table-left">\n				Масова частка фосфоровмісних речовин, в перерахунку на стеароолеолецітін, %</td>\n			<td class="table-right">\n				4,0</td>\n		</tr>\n		<tr>\n			<td class="table-left">\n				Масова частка фосфоровмісних речовин, у перерахунку на P<sub>2</sub>O<sub>5</sub>, %, не більше</td>\n			<td class="table-right">\n				0,4</td>\n		</tr>\n		<tr>\n			<td class="table-left">\n				Кольорове число (Йод число, мг), не більше</td>\n			<td class="table-right">\n				100</td>\n		</tr>\n	</tbody>\n</table>'),
(4, 'order', 'Заявка на купівлю', '			<div class="row">\n\n				<div id="inputError" class="alert alert-danger hidden">\n  					<strong>Помилка!</strong> Неправильно заповнені поля!\n				</div>	\n<div id="connectionError" class="alert alert-danger hidden">\n  					<strong>Помилка!</strong> Не вдалося надіслати заявку!\n				</div>\n<div id="requestSucces" class="alert alert-success hidden">\n  					<strong>Вітаємо!</strong> Заявка успішно надіслана!\n				</div>\n				\n				<div class="col-md-6 col-md-offset-1">\n					<form action="pages/validator" method="POST" role="form">\n						<div class="form-group">\n							<label class="control-label" for="pib">П.І.Б.*</label>\n							<input type="text" name="pib" id="pib" class="form-control">\n						</div>\n						\n						<div class="form-group">\n							<label class="control-label" for="phone">Телефон*</label>\n							<input type="text" name="phone" id="phone" class="form-control">\n						</div>\n\n						<div class="form-group">\n							<label class="control-label" for="addr">Адреса</label>\n							<input type="text" name="addr" id="addr" class="form-control">\n						</div>\n                                                \n						<div class="radio">\n							<label>Макуха<input type="radio" name="commodity" value="bean" checked="checked"></label>\n						</div>\n\n						<div class="radio">\n							<label>Олія<input type="radio" name="commodity" value="oil"></label>\n						</div>\n                                                \n						<div class="form-group">\n							<label class="control-label" for="count">Кількість</label>\n							<input type="text" name="count" id="count" class="form-control">\n						</div>\n\n						<div class="form-group">\n							<label class="control-label" for="captcha">Введіть цифри з зображення*</label><br>\n							<img src="pages/captcha" id="captcha_img" alt="Captcha"><span class="glyphicon glyphicon-refresh"></span><br><br>\n							<input type="text" name="captcha" id="captcha" class="form-control">\n						</div>\n\n						<button id="submit" type="submit" class="btn btn-success btn-sm pull-right">Оформити заявку</button>\n					</form>\n				</div>\n			</div><br>'),
(5, 'orders', 'Замовлення', 'Список замовлень'),
(6, 'prices', 'Ціни', '<div class="container">\n    <div class="row">\n        <div class="col-md-4">\n            <div class="panel panel-success">\n                <div class="panel-heading">\n                    <h3 class="panel-title">Зміна цін</h3>\n                </div>\n                <div class="panel-body">\n                    <div class="alert alert-danger hidden" id="inputError">Помилка! Ціни не змінено. Введіть коректну ціну.</div>\n                    <div class="alert alert-success hidden" id="priceSuccess">Успіх! Ціни успішно змінено.</div>\n                    <div class="alert alert-danger hidden" id="connectionError">Помилка з''єднання! Ціни не змінено.</div>\n                    <form role="form" action="price_validator" method="post">\n                        <label class="control-label" for="bean_price">Ціна на макуху</label>\n                        <div class="input-group">\n                            <input class="form-control" type="text" id="bean_price" name="bean_price">\n                            <span class="input-group-addon">грн./т</span>\n                        </div>\n                        <label class="control-label" for="oil_price">Ціна на олію</label>\n                        <div class="input-group">\n                            <input class="form-control" type="text" id="oil_price" name="oil_price">\n                            <span class="input-group-addon">грн./т</span>\n                        </div>\n                        <br>\n                        <button class="btn btn-success btn-sm" id="change_price">Оновити ціну</button>\n                    </form>\n                </div>\n            </div>\n        </div>\n    </div>\n</div>'),
(7, 'other', 'Інша інформація', '<div class="container">\n    <div class="row">\n        <div class="col-md-4">\n            <div class="panel panel-success">\n                <div class="panel-heading">\n                    <h3 class="panel-title">Зміна додаткової інформації</h3>\n                </div>\n                <div class="panel-body">\n                    <div class="alert alert-danger hidden" id="inputError">Помилка! Інформацію не змінено. Введіть коректну інформацію.</div>\n                    <div class="alert alert-success hidden" id="priceSuccess">Успіх! Інформацію успішно змінено.</div>\n                    <div class="alert alert-danger hidden" id="connectionError">Помилка з''єднання! Інформацію не змінено.</div>\n                    <form role="form" action="price_validator" method="post">\n                        <label class="control-label" for="email">E-mail</label>\n                        <div class="input-group">\n                            <span class="input-group-addon">@</span><input class="form-control" type="text" id="email" name="email">\n                        </div>\n                        <label class="control-label" for="phone">Телефон</label>\n                        <div class="input-group">\n                            <span class="input-group-addon">\n        <span class="glyphicon glyphicon-phone"></span></span>\n                            <input class="form-control" type="text" id="phone" name="phone">\n                        </div>\n                        <label class="control-label" for="name">Ім''я</label>\n                        <div class="input-group">\n                            <span class="input-group-addon">\n        <span class="glyphicon glyphicon-user"></span></span>\n                            <input class="form-control" type="text" id="name" name="name">\n                        </div>\n                        <br>\n                        <button class="btn btn-success btn-sm" id="change_info">Оновити інформацію</button>\n                    </form>\n                </div>\n            </div>\n        </div>\n    </div>\n</div>'),
(8, 'admin', 'Андміністратор', '<h1 class="page-header text-center">У панелі управління можна легко змінити деяку інформацію, що відображається на сайті.</h1>');

-- --------------------------------------------------------

--
-- Структура таблиці `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) COLLATE utf8_bin NOT NULL,
  `password` varchar(255) COLLATE utf8_bin NOT NULL,
  `email` varchar(100) COLLATE utf8_bin NOT NULL,
  `activated` tinyint(1) NOT NULL DEFAULT '1',
  `banned` tinyint(1) NOT NULL DEFAULT '0',
  `ban_reason` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `new_password_key` varchar(50) COLLATE utf8_bin DEFAULT NULL,
  `new_password_requested` datetime DEFAULT NULL,
  `new_email` varchar(100) COLLATE utf8_bin DEFAULT NULL,
  `new_email_key` varchar(50) COLLATE utf8_bin DEFAULT NULL,
  `last_ip` varchar(40) COLLATE utf8_bin NOT NULL,
  `last_login` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `created` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `modified` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=5 ;

--
-- Дамп даних таблиці `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `email`, `activated`, `banned`, `ban_reason`, `new_password_key`, `new_password_requested`, `new_email`, `new_email_key`, `last_ip`, `last_login`, `created`, `modified`) VALUES
(4, 'test', '$P$Bqeh4l2ucYYjvu.F6OVX1CPgY0KREE1', 'test@test.com', 1, 0, NULL, NULL, NULL, NULL, NULL, '192.168.56.1', '2014-03-18 16:13:41', '2014-03-18 16:13:19', '2014-03-18 14:13:41');

-- --------------------------------------------------------

--
-- Структура таблиці `user_autologin`
--

CREATE TABLE IF NOT EXISTS `user_autologin` (
  `key_id` char(32) COLLATE utf8_bin NOT NULL,
  `user_id` int(11) NOT NULL DEFAULT '0',
  `user_agent` varchar(150) COLLATE utf8_bin NOT NULL,
  `last_ip` varchar(40) COLLATE utf8_bin NOT NULL,
  `last_login` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`key_id`,`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Структура таблиці `user_profiles`
--

CREATE TABLE IF NOT EXISTS `user_profiles` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `country` varchar(20) COLLATE utf8_bin DEFAULT NULL,
  `website` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=2 ;

--
-- Дамп даних таблиці `user_profiles`
--

INSERT INTO `user_profiles` (`id`, `user_id`, `country`, `website`) VALUES
(1, 4, NULL, NULL);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
