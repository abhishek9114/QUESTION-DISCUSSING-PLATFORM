
-- phpMyAdmin SQL Dump
-- version 3.1.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jan 16, 2015 at 11:11 AM
-- Server version: 5.1.30
-- PHP Version: 5.2.8

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";

--
-- Database: `winterproject`
--

-- --------------------------------------------------------

--
-- Table structure for table `newposts`
--

CREATE TABLE IF NOT EXISTS `newposts` (
  `pocm_id` int(11) NOT NULL AUTO_INCREMENT,
  `pocm_ub` int(11) NOT NULL,
  `pocm_cp` text NOT NULL,
  `pocm_dt` date NOT NULL,
  PRIMARY KEY (`pocm_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=14 ;

--
-- Dumping data for table `newposts`
--

INSERT INTO `newposts` (`pocm_id`, `pocm_ub`, `pocm_cp`, `pocm_dt`) VALUES
(11, 11, 'What is Factorization..??', '2015-01-16'),
(12, 1, 'What is a prime number..??', '2015-01-16'),
(13, 10, 'what is whole number..??', '2015-01-16');

-- --------------------------------------------------------

--
-- Table structure for table `newpostscomment`
--

CREATE TABLE IF NOT EXISTS `newpostscomment` (
  `cm_id` int(11) NOT NULL AUTO_INCREMENT,
  `cm_cm` text NOT NULL,
  `cm_ub` int(11) NOT NULL,
  `cm_dt` date NOT NULL,
  `cm_co` int(11) NOT NULL,
  PRIMARY KEY (`cm_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=18 ;

--
-- Dumping data for table `newpostscomment`
--

INSERT INTO `newpostscomment` (`cm_id`, `cm_cm`, `cm_ub`, `cm_dt`, `cm_co`) VALUES
(14, 'The aim of factoring is usually to reduce something to “basic building blocks”.', 11, '2015-01-16', 11),
(13, 'In mathematics, factorization  or factoring is the decomposition of an object.', 10, '2015-01-16', 11),
(15, 'A prime number is a whole number greater than 1.', 11, '2015-01-16', 12),
(16, 'A Prime Number can be divided evenly only by 1, or itself.', 10, '2015-01-16', 12),
(17, 'a number without fractions.', 11, '2015-01-16', 13);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `us_fn` varchar(25) NOT NULL,
  `us_ln` varchar(25) NOT NULL,
  `us_un` varchar(25) NOT NULL,
  `us_p` varchar(32) NOT NULL,
  `us_cn` varchar(10) NOT NULL,
  `us_ei` varchar(25) NOT NULL,
  `us_s` varchar(7) NOT NULL,
  `us_id` int(11) NOT NULL AUTO_INCREMENT,
  `us_in` varchar(50) NOT NULL,
  `us_pl` varchar(50) NOT NULL,
  PRIMARY KEY (`us_id`),
  UNIQUE KEY `us_un` (`us_un`),
  UNIQUE KEY `us_un_2` (`us_un`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC AUTO_INCREMENT=12 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`us_fn`, `us_ln`, `us_un`, `us_p`, `us_cn`, `us_ei`, `us_s`, `us_id`, `us_in`, `us_pl`) VALUES
('abhishek', 'kumar', ' india', '202cb962ac59075b964b07152d234b70', '56656', '9914@', 'Male', 1, 'men', 'uploadedimage/16-01-2015-1421391763.jpg'),
(' ritwik', ' raghav', ' rrg', '202cb962ac59075b964b07152d234b70', ' 8792762', ' rryt@gmail.com', 'Male', 10, '', 'notuploaded'),
('satyam ', ' ray', ' sry', '202cb962ac59075b964b07152d234b70', ' 782378', ' sry@gmail.com', 'Male', 11, '', 'notuploaded'),
('admin', 'admin', 'admin', 'd81f9c1be2e08964bf9f24b15f0e4900', '3456', 'ghjhsah@gmail.com', 'Male', 9, 'women', 'notuploaded');
