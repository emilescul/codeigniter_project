-- phpMyAdmin SQL Dump
-- version 4.1.12
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: May 25, 2015 at 09:05 AM
-- Server version: 5.6.16
-- PHP Version: 5.5.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `codeigniter_project_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `age_category`
--

CREATE TABLE IF NOT EXISTS `age_category` (
  `id` int(9) NOT NULL AUTO_INCREMENT,
  `a_category` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=12 ;

--
-- Dumping data for table `age_category`
--

INSERT INTO `age_category` (`id`, `a_category`) VALUES
(1, '18 - 25 years'),
(2, '26 - 50 years'),
(3, '51 - 65 years'),
(4, 'over 65 years'),
(7, 'under 18 years');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(9) NOT NULL AUTO_INCREMENT,
  `id_user_category` int(9) NOT NULL DEFAULT '2',
  `id_age_category` int(9) NOT NULL,
  `username` varchar(60) NOT NULL,
  `password` varchar(60) NOT NULL,
  `name` varchar(60) DEFAULT NULL,
  `email` varchar(60) NOT NULL,
  `phone_number` varchar(20) DEFAULT NULL,
  `description` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=12 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `id_user_category`, `id_age_category`, `username`, `password`, `name`, `email`, `phone_number`, `description`) VALUES
(1, 1, 2, 'admin1', 'a9e7f4848e40deb03cba8edd294d3a17', 'Pop Petre Emil', 'emi_lescu@yahoo.com', '0365-414444', 'Description Pop Petre Emil; Another description Pop Petre Emil; Description Pop Petre Emil; Another description Pop Petre Emil; Description Pop Petre Emil Description Pop Petre Emil; Description Pop Petre Emil Description Pop Petre Emil; Description Pop Petre Emil;'),
(2, 2, 2, 'auser1', '8eb1d299011fc3c333a258d9024c9a4b', 'User Test', 'pemilpop@gmail.com', '0721452755', 'Description User Test; Another Description User Test; Description User Test;Another Description User Test; Description User Test; Another Description User Test; Description User Test;Another Description User Test; Description User Test; Another Description User Test; '),
(4, 2, 2, 'cuser3', '9ce9fdbb8bb5d47a5b151fc856041f56', 'User Trei', 'user3@yahoo.com', '0721452755', 'descriptyion dasd da ds ad ad ad  '),
(5, 2, 3, 'cuser4', 'd1c50efb71ae02c99220b3b96e8435e3', 'User Patru', 'user4@yahoo.com', '07256987', 'asA a dsad dfsd s sdf safsasf '),
(6, 2, 1, 'user5', 'd41d8cd98f00b204e9800998ecf8427e', 'User Cinci', 'user5@yahoo.com', '654321', 'description'),
(7, 2, 7, 'user10', '8be95de3c205029df168e91575b046a5', 'User zece', 'uzece@yahoo.com', '121212121212', 'xxZX dsfscv '),
(8, 2, 3, 'user11', '8189d5d4551ef7c14034917663cdedf7', 'User zece sasa', 'uzecee@yahoo.com', '12121ds2121212', 'xxZX dsfscv  asdasdas asdad '),
(9, 2, 3, 'buser8', 'a509136ed16341f13df8f5b5a81d7d7d', 'User opt', 'user8@yahoo.com', '32313123', 'dsa dfa dsf sdgffg dfg g dsg '),
(10, 2, 3, 'user9', '12f0656988216893d545ffc61b543b11', 'User noua', 'user9@msg.ro', 'wqw', 'sAS  s AS FDSF DSFDF FS SFAS'),
(11, 2, 2, 'user12', '2b559fef23959fb3f921c68996f9b491', 'User Unu Doi', 'email12@gmail.com', '212155212', 'daddadsasd');

-- --------------------------------------------------------

--
-- Table structure for table `user_category`
--

CREATE TABLE IF NOT EXISTS `user_category` (
  `id` int(9) NOT NULL AUTO_INCREMENT,
  `u_category` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `user_category`
--

INSERT INTO `user_category` (`id`, `u_category`) VALUES
(1, 'admin'),
(2, 'user');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
