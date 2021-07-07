-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jul 07, 2021 at 12:13 PM
-- Server version: 5.7.24
-- PHP Version: 7.4.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `protofusion_users`
--

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `user_login` varchar(32) CHARACTER SET utf8mb4 NOT NULL,
  `user_password` varchar(32) CHARACTER SET utf8mb4 NOT NULL,
  `user_mail` varchar(100) CHARACTER SET utf8mb4 NOT NULL,
  `user_hash` varchar(100) CHARACTER SET utf8mb4 DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `user_login`, `user_password`, `user_mail`, `user_hash`) VALUES
(5, 'teelors', '83ddd5c13ee3beeda05623620a574979', 'fromdz@mail.ru', '1ddca0d1603f3378f5409147e6172d42'),
(6, 'yoyoblank', '83ddd5c13ee3beeda05623620a574979', 'fromdz@mail.ru', '2525b2a927f78411e8aa5b72b4a04d72'),
(7, 'MrCat', '5e64fe04bfd8363b6c74ea86f5c867f1', 'mrcat@mail.ru', NULL),
(8, 'MrDog', 'afe7b5700a2fe1f8f23c28a8c087a602', 'mrdog@mail.ru', NULL),
(9, 'MrElephant', 'aed45d690811bc15097fe0b002c1e4c1', 'MrElephant@mail.ru', NULL),
(10, 'MrCrocodile', '010fc2056de3e5be5e99d163d3dc05e9', 'MrCrocodile@mail.ru', NULL),
(11, 'MrSheep', '0c5d9fd126491afd6700d2488fc1d0b4', 'MrSheep@mail.ru', NULL),
(12, 'MrTiger', 'f1b3a9d2bb304eb068a42238d955bb2e', 'MrTiger@mail.ru', NULL),
(13, 'MrWolf', '813eaefe462f5c36e1ed4b396e8b1c55', 'MrWolf', NULL),
(14, 'MrFox', '68d26be01e16e705b0e3c796328998b8', 'MrFox@mail.ru', NULL),
(15, 'MrSquirrel', '71b3283fab6067c811f3e4f6363576e8', 'MrSquirrel@mail.ru', NULL),
(16, 'MrLizard', 'aaebb2de95bc38193fe7da39cfdb6cd8', 'MrLizard@mail.ru', NULL),
(17, 'MrMonkey', '015fbc02c6997af24487264beef5b860', 'MrMonkey@mail.ru', NULL),
(18, 'MrParrot', 'e7cb1e977e896954fec46d2ea7832072', 'MrParrot@mail.ru', NULL),
(19, 'MrEagle', '7885830f9d3a8722f628e2985cd26daf', 'MrEagle@mail.ru', NULL),
(20, 'MrCow', 'fda04272e1bbee878a089b4cdd0665e3', 'MrCow@mail.ru', NULL),
(21, 'MrChicken', 'dfad2932d4b8e418618eb019934f52e2', 'MrChicken@mail.ru', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users_relation`
--

CREATE TABLE `users_relation` (
  `id` int(5) NOT NULL,
  `id_parent` int(10) NOT NULL,
  `id_child` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users_relation`
--

INSERT INTO `users_relation` (`id`, `id_parent`, `id_child`) VALUES
(7, 6, 20),
(24, 5, 19),
(25, 5, 18),
(26, 6, 13),
(27, 6, 12);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users_relation`
--
ALTER TABLE `users_relation`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `users_relation`
--
ALTER TABLE `users_relation`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
