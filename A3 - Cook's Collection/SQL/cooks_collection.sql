-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Apr 22, 2022 at 08:52 PM
-- Server version: 5.7.36
-- PHP Version: 7.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cooks_collection`
--

-- --------------------------------------------------------

--
-- Table structure for table `recipes`
--

DROP TABLE IF EXISTS `recipes`;
CREATE TABLE IF NOT EXISTS `recipes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `category` varchar(80) NOT NULL,
  `name` varchar(80) NOT NULL,
  `description` longtext NOT NULL,
  `time` int(11) NOT NULL,
  `diff` int(11) NOT NULL,
  `ingredients` longtext,
  `instructions` longtext,
  `image` longtext NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=68 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `recipes`
--

INSERT INTO `recipes` (`id`, `category`, `name`, `description`, `time`, `diff`, `ingredients`, `instructions`, `image`) VALUES
(67, 'Lunch', 'Fish & Chips', 'fish and chips...', 123, 5, 'a:2:{i:1;a:3:{s:4:\"name\";s:4:\"fish\";s:6:\"amount\";s:3:\"123\";s:4:\"unit\";s:1:\"g\";}i:2;a:3:{s:4:\"name\";s:5:\"chips\";s:6:\"amount\";s:3:\"123\";s:4:\"unit\";s:1:\"g\";}}', 'a:2:{i:1;a:1:{s:4:\"step\";s:4:\"cook\";}i:2;a:1:{s:4:\"step\";s:3:\"eat\";}}', '62628c18ddaab.jpg'),
(66, 'Dessert', 'Chocolate Sundae', 'chocolate sundae...', 123, 5, 'a:2:{i:1;a:3:{s:4:\"name\";s:9:\"Ice cream\";s:6:\"amount\";s:3:\"123\";s:4:\"unit\";s:1:\"g\";}i:2;a:3:{s:4:\"name\";s:9:\"Chocolate\";s:6:\"amount\";s:3:\"123\";s:4:\"unit\";s:1:\"g\";}}', 'a:2:{i:1;a:1:{s:4:\"step\";s:5:\"Scoop\";}i:2;a:1:{s:4:\"step\";s:3:\"Eat\";}}', '6262247661639.png'),
(64, 'Breakfast', 'Bacon & Eggs', 'bacon and eggs...', 5, 5, 'a:2:{i:1;a:3:{s:4:\"name\";s:5:\"Bacon\";s:6:\"amount\";s:3:\"123\";s:4:\"unit\";s:1:\"g\";}i:2;a:3:{s:4:\"name\";s:4:\"Eggs\";s:6:\"amount\";s:3:\"123\";s:4:\"unit\";s:6:\"ounces\";}}', 'a:1:{i:1;a:1:{s:4:\"step\";s:4:\"Cook\";}}', '626223ad68711.jpg'),
(65, 'Dinner', 'Pizza', 'pizza...', 123, 5, 'a:2:{i:1;a:3:{s:4:\"name\";s:9:\"Pepperoni\";s:6:\"amount\";s:3:\"123\";s:4:\"unit\";s:1:\"g\";}i:2;a:3:{s:4:\"name\";s:6:\"Cheese\";s:6:\"amount\";s:3:\"123\";s:4:\"unit\";s:6:\"ounces\";}}', 'a:1:{i:1;a:1:{s:4:\"step\";s:4:\"Cook\";}}', '626223eec8e78.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_contact`
--

DROP TABLE IF EXISTS `tbl_contact`;
CREATE TABLE IF NOT EXISTS `tbl_contact` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `fldName` varchar(50) NOT NULL,
  `fldEmail` varchar(150) NOT NULL,
  `fldPhone` varchar(15) NOT NULL,
  `fldMessage` varchar(500) NOT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_contact`
--

INSERT INTO `tbl_contact` (`Id`, `fldName`, `fldEmail`, `fldPhone`, `fldMessage`) VALUES
(1, 'Nicholas Parker', 's3913624@student.rmit.edu.au', 'n/a', 'No comment available'),
(2, 'Lachlan Jensen', 's3922643@student.rmit.edu.au', 'n/a', 'Also no message to add'),
(3, 'Muhammad Al Ghifari', 's3918353@student.rmit.edu.au', 'n/a', 'Test only'),
(4, 'Zaidyn Melrose', 's3866949@student.rmit.edu.au', 'n/a', 'Yet another test message'),
(5, 'Joshua Salanitri', 's3917729@student.rmit.edu.au', 'n/a', 'A comment without content'),
(6, 'Daniel Coles', 's3937105@student.rmit.edu.au', 'n/a', 'Nothing to see here');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
