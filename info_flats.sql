-- --------------------------------------------------------
-- Хост:                         localhost
-- Версия сервера:               5.7.37 - MySQL Community Server (GPL)
-- Операционная система:         Win64
-- HeidiSQL Версия:              9.4.0.5125
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Дамп структуры базы данных test
CREATE DATABASE IF NOT EXISTS `test` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `test`;

-- Дамп структуры для таблица test.info_flats
CREATE TABLE IF NOT EXISTS `info_flats` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `district` varchar(50) NOT NULL,
  `adjacent` int(11) NOT NULL DEFAULT '0',
  `total_rooms` int(11) NOT NULL DEFAULT '0',
  `area` float NOT NULL DEFAULT '0',
  `tel` varchar(30) NOT NULL DEFAULT '-',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

-- Дамп данных таблицы test.info_flats: 7 rows
/*!40000 ALTER TABLE `info_flats` DISABLE KEYS */;
INSERT INTO `info_flats` (`id`, `district`, `adjacent`, `total_rooms`, `area`, `tel`) VALUES
	(1, 'Ворошиловский', 3, 4, 80, '-'),
	(2, 'Ленинский', 0, 2, 22, '33-33-35'),
	(3, 'Ворошиловский', 1, 2, 35, '20-25-30'),
	(4, 'Кировский', 3, 3, 60, '59-59-59'),
	(5, 'Кировский', 2, 2, 34, '41-41-41'),
	(6, 'Калининский', 2, 4, 56, '54-56-56'),
	(7, 'Калининский', 2, 5, 58, '02-02-02');
/*!40000 ALTER TABLE `info_flats` ENABLE KEYS */;

-- Дамп структуры для таблица test.login
CREATE TABLE IF NOT EXISTS `login` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `login` varchar(50) NOT NULL COMMENT 'Логин для авторизоваться',
  `password` varchar(50) NOT NULL COMMENT 'Пароль для авторизоваться',
  `username` varchar(150) NOT NULL COMMENT 'Имя пользователя на сайте',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- Дамп данных таблицы test.login: 1 rows
/*!40000 ALTER TABLE `login` DISABLE KEYS */;
INSERT INTO `login` (`id`, `login`, `password`, `username`) VALUES
	(1, 'admin', 'qwe123', 'Admin Adminovich');
/*!40000 ALTER TABLE `login` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
