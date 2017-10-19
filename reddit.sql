-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 19, 2017 at 09:06 PM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `reddit`
--

-- --------------------------------------------------------

--
-- Table structure for table `comment`
--

CREATE TABLE `comment` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `comment` text NOT NULL,
  `idpost` int(255) NOT NULL,
  `points` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `comment`
--

INSERT INTO `comment` (`id`, `name`, `comment`, `idpost`, `points`) VALUES
(47, 'rafalome', 'Teste do sistema de upvote!', 45, -3),
(48, 'rafalome', 'Comentario Sumido', 45, 3),
(49, 'rafalome', '123', 45, -3),
(50, 'rafalome', 'Does everything works?', 46, -3),
(51, 'rafalome', 'Testing again', 46, 1),
(52, 'rafalome', 'Second test', 46, -3),
(53, 'Troll', 'What the fuck did you just fucking say about me, you little bitch? Iâ€™ll have you know I graduated top of my class in the Navy Seals, and Iâ€™ve been involved in numerous secret raids on Al-Quaeda, and I have over 300 confirmed kills. I am trained in gorilla warfare and Iâ€™m the top sniper in the entire US armed forces. You are nothing to me but just another target. I will wipe you the fuck out with precision the likes of which has never been seen before on this Earth, mark my fucking words. You think you can get away with saying that shit to me over the Internet? Think again, fucker. As we speak I am contacting my secret network of spies across the USA and your IP is being traced right now so you better prepare for the storm, maggot. The storm that wipes out the pathetic little thing you call your life. Youâ€™re fucking dead, kid. I can be anywhere, anytime, and I can kill you in over seven hundred ways, and thatâ€™s just with my bare hands. Not only am I extensively trained in unarmed combat, but I have access to the entire arsenal of the United States Marine Corps and I will use it to its full extent to wipe your miserable ass off the face of the continent, you little shit. If only you could have known what unholy retribution your little â€œcleverâ€ comment was about to bring down upon you, maybe you would have held your fucking tongue. But you couldnâ€™t, you didnâ€™t, and now youâ€™re paying the price, you goddamn idiot. I will shit fury all over you and you will drown in it. Youâ€™re fucking dead, kiddo.\r\n', 49, -3),
(54, 'Troll', 'Trollando', 50, -3);

-- --------------------------------------------------------

--
-- Table structure for table `post`
--

CREATE TABLE `post` (
  `id` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `description` text NOT NULL,
  `name` varchar(100) NOT NULL,
  `points` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `post`
--

INSERT INTO `post` (`id`, `title`, `description`, `name`, `points`) VALUES
(45, 'Teste', 'Testando o Forum', 'rafalome', -3),
(47, 'asdas', 'asdasd', 'rafalome', -3),
(48, 'tss', 'adas', 'admin', -3),
(50, 'Teste de Criacao de post', '1211', 'admin', -3),
(52, 'Navy Seals', 'What the fuck did you just fucking say about me, you little bitch? Iâ€™ll have you know I graduated top of my class in the Navy Seals, and Iâ€™ve been involved in numerous secret raids on Al-Quaeda, and I have over 300 confirmed kills. I am trained in gorilla warfare and Iâ€™m the top sniper in the entire US armed forces. You are nothing to me but just another target. I will wipe you the fuck out with precision the likes of which has never been seen before on this Earth, mark my fucking words. You think you can get away with saying that shit to me over the Internet? Think again, fucker. As we speak I am contacting my secret network of spies across the USA and your IP is being traced right now so you better prepare for the storm, maggot. The storm that wipes out the pathetic little thing you call your life. Youâ€™re fucking dead, kid. I can be anywhere, anytime, and I can kill you in over seven hundred ways, and thatâ€™s just with my bare hands. Not only am I extensively trained in unarmed combat, but I have access to the entire arsenal of the United States Marine Corps and I will use it to its full extent to wipe your miserable ass off the face of the continent, you little shit. If only you could have known what unholy retribution your little â€œcleverâ€ comment was about to bring down upon you, maybe you would have held your fucking tongue. But you couldnâ€™t, you didnâ€™t, and now youâ€™re paying the price, you goddamn idiot. I will shit fury all over you and you will drown in it. Youâ€™re fucking dead, kiddo.\r\n', 'Troll', 0);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `login` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `login`, `password`) VALUES
(60, 'rafalome', 'c4ca4238a0b923820dcc509a6f75849b'),
(61, 'admin', '21232f297a57a5a743894a0e4a801fc3'),
(62, 'Troll', 'c20ad4d76fe97759aa27a0c99bff6710'),
(63, 'Rafalome', 'dba1184ba794c824c73f309509daedde');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `post`
--
ALTER TABLE `post`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `comment`
--
ALTER TABLE `comment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;
--
-- AUTO_INCREMENT for table `post`
--
ALTER TABLE `post`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
