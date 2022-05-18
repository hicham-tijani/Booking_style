-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 27, 2020 at 03:18 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

-- --------------------------------------------------------

--
-- Table structure for table `booking`
--
CREATE TABLE `booking` (
  `paese` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `telefono` int NOT NULL,
  `chekin` date NOT NULL,
  `chekout` date NOT NULL,
  `adulti` int NOT NULL,
  `bambini` int NOT NULL,
  `trasporto` varchar(25) NOT NULL

) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

