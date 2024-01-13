
SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";

-- База данных
CREATE DATABASE IF NOT EXISTS formcheck CHARACTER SET utf8 COLLATE utf8_general_ci;

-- Таблица пользователей
CREATE TABLE `formcheck`.`users` (
    `id` int(11)NOT NULL AUTO_INCREMENT ,
  `fio` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `tel` decimal(20.0) ,
  `login` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `pass` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
PRIMARY KEY (`id`)) ENGINE = InnoDB;

-- Таблица cпектаклей
CREATE TABLE `formcheck`.`spectacles` (
`id` INT(11) NOT NULL AUTO_INCREMENT ,
   `title` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
    `date` date,
  `cena` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
PRIMARY KEY (`id`)) ENGINE = InnoDB;

-- Таблица администратора
CREATE TABLE `formcheck`.`admins` (
`id` INT(11) NOT NULL AUTO_INCREMENT ,
 `login` VARCHAR(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL , 
 `password` VARCHAR(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL , 
PRIMARY KEY (`id`)) ENGINE = InnoDB;
