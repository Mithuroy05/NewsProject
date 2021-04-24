-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 24, 2021 at 05:08 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 7.3.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `news-site`
--

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `category_id` int(11) NOT NULL,
  `category_name` varchar(100) CHARACTER SET utf8 NOT NULL,
  `post` int(11) NOT NULL DEFAULT 0
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`category_id`, `category_name`, `post`) VALUES
(30, 'BUSINESS', 2),
(37, 'SCIENCE', 2),
(33, 'INTERNATIONAL', 3),
(34, 'BUSINESS', 0),
(35, 'LIFESTYLE', 3),
(39, 'Covid-19', 1);

-- --------------------------------------------------------

--
-- Table structure for table `post`
--

CREATE TABLE `post` (
  `post_id` int(11) NOT NULL,
  `title` varchar(100) CHARACTER SET utf8 NOT NULL,
  `description` text CHARACTER SET utf8 NOT NULL,
  `category` varchar(100) CHARACTER SET utf8 NOT NULL,
  `post_date` varchar(50) NOT NULL,
  `author` int(11) NOT NULL,
  `post_img` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `post`
--

INSERT INTO `post` (`post_id`, `title`, `description`, `category`, `post_date`, `author`, `post_img`) VALUES
(55, 'India reels from second Covid wave as families beg for supplies on social media and news', 'A Fortnite Twitch streamer and YouTuber, ShelbyRenae makes hilarious (and often very telling) TikToks focusing on her conversations with the strangers she plays with, mostly teenage boys who chuck out endless bizarre insults and gigantically inappropriate comments.\r\n\r\nAllow TikTok content?\r\nThis article includes content provided by TikTok. We ask for your permission before anything is loaded, as they may be using cookies and other technologies. To view this content, click \'Allow and continue\'.\r\n\r\nAllow and continue\r\nLeslee Sullivant ? @famous_streamer\r\nSullivant is a veteran game developer who posts amusing and revealing sketches about life in the industry, from executive producers with really terrible ideas to the crappy way contractors are dealt with. A chilling insight into dysfunctional creative workplaces.\r\n\r\nAllow TikTok content?\r\nThis article includes content provided by TikTok. We ask for your permission before anything is loaded, as they may be using cookies and other technologies. To view this content, click \'Allow and continue\'.\r\n\r\nAllow and continue\r\nAlisha ? @alishakins_\r\nMainly a Twitch streamer, Alisha makes brilliant little TikToks of her experiences playing Call of Duty: Warzone, providing a turbo-charged voiceover, complete with her own sound effects ? mostly, ?Pew, pew, pew! He?s dead!?\r\n\r\nAllow TikTok content?\r\nThis article includes content provided by TikTok. We ask for your permission before anything is loaded, as they may be using cookies and other technologies. To view this content, click \'Allow and continue\'.\r\n\r\nAllow and continue\r\nPlay Leisure ? @play_leisure\r\nThis Devon-based company refurbishes and sells classic arcade machines, and its TikTok channel shows off exciting new finds. The latest video shows the amazing full-size cabinet for Sega?s Let?s Go Jungle, designed to resemble an offroad truck. A wonderful nostalgia ride.\r\n\r\nAllow TikTok content?\r\nThis article includes content provided by TikTok. We ask for your permission before anything is loaded, as they may be using cookies and other technologies. To view this content, click \'Allow and continue\'.\r\n\r\nAllow and continue\r\nAdvertisement\r\n\r\nDKOldies ? @dkoldies\r\nSimilar to the above, DKOldies is an online retro gaming store and its TikTok shows off interesting items from its vast stock including rare games, ancient consoles and weird controllers. I could scroll this for hours.\r\n\r\nAllow TikTok content?\r\nThis article includes content provided by TikTok. We ask for your permission before anything is loaded, as they may be using cookies and other technologies. To view this content, click \'Allow and continue\'.\r\n\r\nAllow and continue\r\nKomazawa Isolation ? @kmzwisolation\r\nA Japanese YouTuber who makes astonishingly accurate real-life reenactments of games such as Grand Theft Auto and Yakuza. His TikToks show off the highlights of his latest creations and they?re always wonderful.', '39', '21 Apr, 2021', 28, '5982.jpg'),
(37, 'Domestic flights to resume from tomorrow at 6;40PM', '                                Flight operations on all seven domestic routes in Bangladesh will resume from tomorrow on a limited scale, following a recess of 16 days.                                ', '37', '20 Apr, 2021', 26, 'flight_5.jpg'),
(38, 'US may soon reach', '                                \"Once this happens, efforts to encourage vaccination will become much harder, presenting a challenge to reaching the levels of herd immunity that are expected to be needed.\"                                ', '33', '20 Apr, 2021', 26, 'coronavirus_symbolic_13_4_2021_collected.jpg'),
(39, 'Alia Bhatt tests positive for Covid-19 today', '                Bollywood actor Alia Bhatt has tested positive for Covid-19. She is currently self-isolating at home.\r\n\r\n\"I have tested positive for COVID-19. I have immediately isolated myself and will be under home quarantine,\" she wrote in a note posted on Instagram.                ', '35', '20 Apr, 2021', 28, 'alia-bhat-tested-covid-19-positive-2.jpg'),
(40, 'In second wave, India has twice the number of 2020\'s active Covid-19 cases: Govt', 'India\'s second wave of coronavirus is more virulent than the first wave as the country is witnessing twice the number of maximum active Covid-19 cases seen last year, officials said on Wednesday.', '37', '21 Apr, 2021', 28, 'PTI04_21_2021_000062B_1619002467122_1619002490779 (1).webp'),
(46, 'STOP: Opt out of phone numbers as authentication tokens', 'Sullivant is a veteran game developer who posts amusing and revealing sketches about life in the industry, from executive producers with really terrible ideas to the crappy way contractors are dealt with. A chilling insight into dysfunctional creative workplaces.', '30', '21 Apr, 2021', 28, 'whatsapp-rachit-tank-unsplash.jpg'),
(42, 'SANDRA SMITH AND JOHN CONNELLY GETTING MARIAGE ', '                                                                They say Hollywood love stories only seem great on the movie screen but in reality, these relationships don?t last. It?s a fair assumption, since many celebrities have proved that fame, money, excessive lifestyle, alcohol and drug addiction, and even filing for bankruptcy can lead to the quick demise of a relationship or marriage. Lucky for us few, who still believe in fairy tale endings and glorious love stories, some famous couples have kept the hope alive by finding their one true love and sticking with them through thick and thin.\r\n\r\nThese long lasting unions have weathered it all, standing the test of time, and never even uttered the word ?divorce?. Now that dating is much easier in the age of smartphones and plenty of free dating apps                                                ', '39', '21 Apr, 2021', 28, 'pjimage2.jpg'),
(43, 'APT team attacks white hats: Google fingers North Korea', '                                                                North Korean state-sponsored hackers are targeting and attacking white-hat security researchers. They?re using a combination of zero-day exploits, Trojan-laced VS project bundles, and good old social engineering.                                                                ', '33', '21 Apr, 2021', 28, 'dprk-military-micha-brandli-unsplash.jpg'),
(44, 'Cryptominers flooding GitHub?and other cloudy dev services', '                Owners of public GitHub projects have been noticing weird stuff recently: Random users are forking repos, then pull-requesting a change that includes an obfuscated GitHub Action.                ', '33', '21 Apr, 2021', 28, 'bitcoin-buck-btc-keychain-cc-by.jpg'),
(57, 'Ground zero for gaming memes: 10 excellent video game TikTok accounts', '                A Fortnite Twitch streamer and YouTuber, ShelbyRenae makes hilarious (and often very telling) TikToks focusing on her conversations with the strangers she plays with, mostly teenage boys who chuck out endless bizarre insults and gigantically inappropriate comments.\r\n', '37', '21 Apr, 2021', 28, '4982.jpg'),
(58, 'PHP Arithmetic Operators', 'The PHP arithmetic operators are used with numeric values to perform common arithmetical operations, such as addition, subtraction, multiplication etc. The PHP arithmetic operators are used with numeric values to perform common arithmetical operations, such as addition, subtraction, multiplication etc.', '37', '22 Apr, 2021', 28, 'Screenshot_20200804-161236-01.jpeg');

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `settings_id` int(11) NOT NULL,
  `web_logo` varchar(255) NOT NULL,
  `footer_description` varchar(255) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`settings_id`, `web_logo`, `footer_description`) VALUES
(1, 'galileologo.png', '© Copyright 2021 The Galileo | Powered by Mithu Roy.');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(10) UNSIGNED NOT NULL,
  `first_name` varchar(30) NOT NULL,
  `last_name` varchar(30) NOT NULL,
  `username` varchar(30) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `role` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `first_name`, `last_name`, `username`, `password`, `role`) VALUES
(28, 'Mithu', 'Roy', 'mithuroy', '9bddb52f10fc69bd6bd0d4b40126e53e', 1),
(26, 'Faisal', 'Sarker', 'faisal', 'f4668288fdbf9773dd9779d412942905', 0),
(29, 'Tom', 'Crus', 'tomcrus', '34b7da764b21d298ef307d04d8152dc5', 0),
(31, 'Jon', 'Dip', 'jonydip', 'c2c8e798aecbc26d86e4805114b03c51', 0),
(32, 'Ethan', 'Hunt', 'Ethan', '7a56cb86e74d2afaacd7524253072fe3', 0),
(33, 'Mat', 'Damon', 'mat', '4a258d930b7d3409982d727ddbb4ba88', 0),
(34, 'Crish', 'Hamsthor', 'crish', '96e9850dc3bea8f1979769b83f500f72', 0),
(35, 'Joon', 'Weak', 'joon', '7f679f9651d00d7acafbbf3e361ebeba', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `post`
--
ALTER TABLE `post`
  ADD PRIMARY KEY (`post_id`),
  ADD UNIQUE KEY `post_id` (`post_id`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`settings_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=76;

--
-- AUTO_INCREMENT for table `post`
--
ALTER TABLE `post`
  MODIFY `post_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `settings_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
