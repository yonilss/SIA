-- Adminer 4.8.1 MySQL 10.4.32-MariaDB dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

DROP TABLE IF EXISTS `employee`;
CREATE TABLE `employee` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `Employee_ID` int(11) NOT NULL,
  `First_Name` varchar(255) NOT NULL,
  `Last_Name` varchar(255) NOT NULL,
  `Age` int(11) NOT NULL,
  `E-mail` varchar(255) NOT NULL,
  `Address` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf16 COLLATE=utf16_general_ci;

INSERT INTO `employee` (`id`, `Employee_ID`, `First_Name`, `Last_Name`, `Age`, `E-mail`, `Address`) VALUES
(2,	102,	'Jane',	'Smith',	35,	'jane.smith@example.com',	'5678 Oak St, Metropolis, IL, USA'),
(3,	103,	'Michael',	'Brown',	42,	'michael.brown@example.com',	'9101 Pine St, Gotham, NY, USA'),
(4,	104,	'Emily',	'Clark',	30,	'emily.clark@example.com',	'1213 Maple St, Star City, CA, USA'),
(5,	105,	'Daniel',	'Johnson',	25,	'daniel.johnson@example.com',	'1415 Cedar St, Central City, TX, USA'),
(6,	1231,	'Earl',	'Panisa',	43,	'butakalgasapo@gmail.com',	'lacson');

-- 2024-09-15 13:10:19