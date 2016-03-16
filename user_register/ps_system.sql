-- phpMyAdmin SQL Dump
-- version 3.4.10.1deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Mar 15, 2016 at 05:22 PM
-- Server version: 5.5.44
-- PHP Version: 5.6.12-1+deb.sury.org~precise+1

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `ps_system`
--

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE IF NOT EXISTS `login` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_name` varchar(50) NOT NULL,
  `email_id` varchar(100) NOT NULL,
  `password` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=23 ;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`id`, `user_name`, `email_id`, `password`) VALUES
(11, 'admin', 'admin@gmail.com', 'admin'),
(13, 'nikunj', 'nikunj@gmail.com', '202cb962ac59075b964b07152d234b70'),
(18, 'nikunj', 'nikunj@gmail.com', '202cb962ac59075b964b07152d234b70'),
(20, 'mayuri', 'nbraiyani89@gmail.com', '202cb962ac59075b964b07152d234b70'),
(21, 'nirali', 'nbraiyani89@gmail.com', '250cf8b51c773f3f8dc8b4be867a9a02'),
(22, 'vidhi', 'vidhi@gmail.com', '96de4eceb9a0c2b9b52c0b618819821b');

-- --------------------------------------------------------

--
-- Table structure for table `user_register`
--

CREATE TABLE IF NOT EXISTS `user_register` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `email_id` varchar(100) NOT NULL,
  `user_name` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `address_line1` varchar(255) NOT NULL,
  `address_line2` varchar(255) NOT NULL,
  `city` varchar(50) NOT NULL,
  `zipcode` bigint(6) NOT NULL,
  `state` varchar(50) NOT NULL,
  `country` varchar(50) NOT NULL,
  `profile_picture` varchar(200) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=23 ;

--
-- Dumping data for table `user_register`
--

INSERT INTO `user_register` (`id`, `first_name`, `last_name`, `email_id`, `user_name`, `password`, `address_line1`, `address_line2`, `city`, `zipcode`, `state`, `country`, `profile_picture`) VALUES
(18, 'Nikunj', 'Raiyani', 'nikunj@gmail.com', 'nikunj', '96de4eceb9a0c2b9b52c0b618819821b', 'Rajkot', 'Rajkot', 'Rajkot', 360020, 'Gujarat', 'India', 'image/profile_picture/images (56).jpg'),
(20, 'Mayuri', 'Pambhar', 'nbraiyani89@gmail.com', 'mayuri', '96de4eceb9a0c2b9b52c0b618819821b', 'Rajkot', 'Rajkot', 'Rajkot', 360020, 'Gujarat', 'India', ''),
(21, 'Nirali', 'Raiyani', 'nbraiyani89@gmail.com', 'nirali', '96de4eceb9a0c2b9b52c0b618819821b', 'Rajkot', 'Rajkot', 'Rajkot', 360020, 'Gujarat', 'India', ''),
(22, 'Vidhi', 'Katharotia', 'vidhi@gmail.com', 'vidhi', '96de4eceb9a0c2b9b52c0b618819821b', 'Rajkot', 'Rajkot', 'Rajkot', 360020, 'Gujarat', 'India', '');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
