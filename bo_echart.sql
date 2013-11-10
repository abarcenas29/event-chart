-- phpMyAdmin SQL Dump
-- version 4.0.6
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Nov 10, 2013 at 04:41 PM
-- Server version: 5.5.32-MariaDB
-- PHP Version: 5.4.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `bo_echart`
--

-- --------------------------------------------------------

--
-- Table structure for table `event_categories`
--

CREATE TABLE IF NOT EXISTS `event_categories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `event_id` int(11) NOT NULL,
  `category` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=14 ;

--
-- Dumping data for table `event_categories`
--

INSERT INTO `event_categories` (`id`, `event_id`, `category`, `created_at`) VALUES
(11, 4, 'Anime', '2013-11-10 15:37:50'),
(12, 4, 'Manga', '2013-11-10 15:37:52'),
(13, 4, 'Cosplay', '2013-11-10 15:37:53');

-- --------------------------------------------------------

--
-- Table structure for table `event_guests`
--

CREATE TABLE IF NOT EXISTS `event_guests` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `event_id` int(11) NOT NULL,
  `name` text NOT NULL,
  `type` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `event_guests`
--

INSERT INTO `event_guests` (`id`, `event_id`, `name`, `type`, `created_at`) VALUES
(2, 2, 'Joe Inoue', 'singer artist', '2013-11-10 14:12:05'),
(5, 2, 'Alodia Gosengfiao', 'cosplayer', '2013-11-10 14:13:27'),
(6, 2, 'Ashley Gosengfiao', 'cosplayer', '2013-11-10 14:13:36'),
(7, 2, 'Jiaki Darkness', 'cosplayer', '2013-11-10 14:13:51'),
(8, 2, 'Yuuki Godbless', 'cosplayer', '2013-11-10 14:13:58');

-- --------------------------------------------------------

--
-- Table structure for table `event_lists`
--

CREATE TABLE IF NOT EXISTS `event_lists` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `photo_id` int(11) DEFAULT NULL,
  `name` text NOT NULL,
  `description` text,
  `email` text,
  `venue` text,
  `main_org` text NOT NULL,
  `lat` double DEFAULT NULL,
  `long` double DEFAULT NULL,
  `start_at` date NOT NULL,
  `end_at` date NOT NULL,
  `facebook` text,
  `twitter` text,
  `website` text,
  `hashtag` text,
  `private` tinyint(1) NOT NULL,
  `created_by` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `event_lists`
--

INSERT INTO `event_lists` (`id`, `photo_id`, `name`, `description`, `email`, `venue`, `main_org`, `lat`, `long`, `start_at`, `end_at`, `facebook`, `twitter`, `website`, `hashtag`, `private`, `created_by`, `created_at`) VALUES
(2, 13, 'Best of Anime 2013', 'The Best of Anime&quot; has consistently reached thousands of visitors for the past four momentous years. Last year, the two-day event had more than 10,000 visitors who trooped to the venue to experience and witness once more what &ldquo;The Best of Anime&rdquo; showcased and offered. The anime convention had featured an impressive roster of talents, cosplayers, activities, and much more. Moreover, the convention has extended its horizons and upgraded the local Anime Conventions by having the Japanese-American Multi-talented musician Joe Inoue, and JPop Idol Group, Starmarie to include the growing list of international guests, which had begun with Japanese visual-kei rock band, Uchusentai Noiz. Pointing out the other various highlights from the previous year were the Cosplay and Quickdraw Competitions, Battle of the Bands, Fashion Show, and Various workshops. 	', 'boa@primetradeasia.com', 'Megamall Bldg 2. Death Hall 3.', '1', 14.533613991175592, 120.98370909690857, '2013-11-10', '2013-11-09', 'bestofanime', 'bestofanime', 'bestofanime', 'besetofanime', 1, 'aldrich.barcenas@gmail.com', '2013-11-07 04:36:17'),
(3, 18, 'Animax Carnival Philiipines 2013', 'This year&#039;s Animax Carnival combines exciting Japanese carnival games, Anime-inspired booths, and the highly anticipated cosplay competition!\n\nBut, we&#039;re not stopping there! Find out more what we have in store for you...	', 'info@animaxasia.com', 'Trinoma, Event Grounds.', '6', 14.652682958143942, 121.03358745574951, '2013-12-08', '2013-12-08', 'animaxasiatv', 'animaxasiatv', 'animax-asia.com/phcarnival', '#animaxcarnival', 1, 'aldrich.barcenas@gmail.com', '2013-11-08 03:20:06'),
(4, 57, 'UP AME Festival', 'As UP AME celebrates its 13th year, we bring you AME FEST!\nAME FEST is composed of four different and exciting events that will surely make your November a memorable one!	', 'execom@up-ame.org', 'UP Diliman Camput', '6', 14.725081172910235, 120.9261703491211, '2013-11-23', '2013-11-12', 'upame', 'upame', 'amefest.up-ame.org/', 'upame', 1, 'aldrich.barcenas@gmail.com', '2013-11-10 15:20:16');

-- --------------------------------------------------------

--
-- Table structure for table `event_organizations`
--

CREATE TABLE IF NOT EXISTS `event_organizations` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `event_id` int(11) NOT NULL,
  `org_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `event_posters`
--

CREATE TABLE IF NOT EXISTS `event_posters` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `event_id` int(11) NOT NULL,
  `photo_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=36 ;

--
-- Dumping data for table `event_posters`
--

INSERT INTO `event_posters` (`id`, `event_id`, `photo_id`, `created_at`) VALUES
(31, 2, 53, '2013-11-08 10:22:24'),
(32, 2, 54, '2013-11-08 10:22:24'),
(33, 2, 55, '2013-11-08 10:22:25'),
(34, 4, 58, '2013-11-10 15:36:34'),
(35, 4, 59, '2013-11-10 15:36:34');

-- --------------------------------------------------------

--
-- Table structure for table `event_tickets`
--

CREATE TABLE IF NOT EXISTS `event_tickets` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `event_id` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `note` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `event_tickets`
--

INSERT INTO `event_tickets` (`id`, `event_id`, `price`, `note`, `created_at`) VALUES
(1, 2, 250, 'Regular Ticket', '2013-11-10 08:54:09'),
(2, 2, 350, 'Meet and Greet with Joe Inoe', '2013-11-10 08:54:43');

-- --------------------------------------------------------

--
-- Table structure for table `organizations`
--

CREATE TABLE IF NOT EXISTS `organizations` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `photo_id` int(11) DEFAULT NULL,
  `name` text NOT NULL,
  `description` text NOT NULL,
  `facebook` text NOT NULL,
  `twitter` text NOT NULL,
  `website` text NOT NULL,
  `email` text NOT NULL,
  `created_by` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `organizations`
--

INSERT INTO `organizations` (`id`, `photo_id`, `name`, `description`, `facebook`, `twitter`, `website`, `email`, `created_by`, `created_at`) VALUES
(1, 1, 'Anime Alliance Philippines', 'blah blah	blah	', 'animeallianceph', 'aap', 'ph.animealliance.asia', 'ph.animealliance.asia', 'aldrich.barcenas@gmail.com', '2013-11-06 07:09:42'),
(2, 2, 'Cosplay Philippines', 'blah blah	', 'cosplayph', 'cosplayph', 'cosplay.ph', 'cosplay.ph', 'aldrich.barcenas@gmail.com', '2013-11-06 07:11:41'),
(3, 3, 'Naruto Cosplayers Philippines', 'blah blah yadi yar yar yat', 'ncph', 'ncph', 'narutocosplayersph.com', 'ncph@gmail.com', 'aldrich.barcenas@gmail.com', '2013-11-06 08:40:14'),
(4, 4, 'Cosplay Network Philippines', 'Blah Blah lorem ispum lor	', 'cnpn', 'cnph', 'ncph.com', 'ncph@gmail.com', 'aldrich.barcenas@gmail.com', '2013-11-06 08:52:07'),
(5, 5, 'Primetrade Asia', 'Primetrade Asia, Inc.&rsquo;s maiden event, the annual Manila International Book Fair, now celebrates its third decade of bringing books and the joy of reading to the Filipino public, and still draws an ever-growing crowd by the thousands on its five-day run. In the years past, the company has supplemented the book fair with co-located events to cater to book lovers&rsquo; other diverse interests:  Superkids, an early childhood development conference; The Best of Anime, an anime convention; and Dimensions of Wellness, a holistic health and wellness fair. ', 'primetradeasia', 'primestradeasia', 'primetradeasia.com', 'info@primetradeasia.com', 'aldrich.barcenas@gmail.com', '2013-11-07 04:25:42'),
(6, 14, 'Animax Asia', 'Launched on 1 January 2004, Animax is Asia&rsquo;s first channel brand specializing in Japanese animation &ndash; anime. Animax offers a wide variety of anime programs from across the most popular genres including action, romance, horror, supernatural, comedy to slice-of-life.	', 'animaxasiatv', 'animaxasiatv', 'www.animax-asia.com', '', 'aldrich.barcenas@gmail.com', '2013-11-08 03:17:32'),
(7, 56, 'Anime Manga Enthusiast', 'the University of the Philippines Anime Manga Enthusiasts is a College of Arts and Letters based non-political and non-sectarian organization which aims to gather anime and manga enthusiasts all over UP Diliman. The organization also exists to provide an atmosphere for an open exchange of ideas and share in-depth information on the nature of anime and manga.	', 'upame', 'upame', 'up-ame.org/', '', 'aldrich.barcenas@gmail.com', '2013-11-10 15:17:50');

-- --------------------------------------------------------

--
-- Table structure for table `photos`
--

CREATE TABLE IF NOT EXISTS `photos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `date` text NOT NULL,
  `filename` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=60 ;

--
-- Dumping data for table `photos`
--

INSERT INTO `photos` (`id`, `date`, `filename`, `created_at`) VALUES
(1, '2013-11-06', '54e2b8cd67223a37d7ec36aba.jpg', '2013-11-06 07:09:42'),
(2, '2013-11-06', '0bd55cace9740e08b2c5490a7.jpg', '2013-11-06 07:11:41'),
(3, '2013-11-06', 'df8757e39dbe259ff3de2f72c.jpg', '2013-11-06 08:48:20'),
(4, '2013-11-06', '760c432d9e936a86bc7ff3f6c.jpg', '2013-11-06 09:10:33'),
(5, '2013-11-07', '785dc3095265d94c6fe0c9608.jpg', '2013-11-07 04:25:41'),
(13, '2013-11-07', 'c37bad84ecb39868f03cb740a.jpg', '2013-11-07 04:36:17'),
(14, '2013-11-08', 'dbc1ffa6a138f580605d0c622.jpg', '2013-11-08 03:17:32'),
(15, '2013-11-08', 'f66a46448f7a49b284755f537.jpg', '2013-11-08 03:19:17'),
(16, '2013-11-08', '4e5218549b73ee2885990c877.jpg', '2013-11-08 03:19:26'),
(17, '2013-11-08', '65b673daa276c62aededdd80d.jpg', '2013-11-08 03:20:06'),
(18, '2013-11-08', '63480044155283f6064105358.jpg', '2013-11-08 05:03:03'),
(53, '2013-11-08', '1e5f012d26f148f73b2410823.jpg', '2013-11-08 10:22:24'),
(54, '2013-11-08', '902fae6d1f19bf1757375f209.jpg', '2013-11-08 10:22:24'),
(55, '2013-11-08', '9538e1e304bfbad6bd180721c.jpg', '2013-11-08 10:22:25'),
(56, '2013-11-10', 'aa90b4838c9fc0e3bf40b882e.jpg', '2013-11-10 15:18:26'),
(57, '2013-11-10', 'c8076f0797429adc73095fc4f.jpg', '2013-11-10 15:20:16'),
(58, '2013-11-10', 'f3563f98702ddcb7156c7dc8c.jpg', '2013-11-10 15:36:34'),
(59, '2013-11-10', 'ceac2edc0c028222b9c4e54b2.jpg', '2013-11-10 15:36:34');

-- --------------------------------------------------------

--
-- Table structure for table `regions`
--

CREATE TABLE IF NOT EXISTS `regions` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `location` text NOT NULL,
  `lat` double NOT NULL,
  `long` double NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `regions`
--

INSERT INTO `regions` (`id`, `location`, `lat`, `long`, `created_at`) VALUES
(1, 'Pasay - Mall of Asia', 14.533597946166992, 120.9837417602539, '2013-11-07 09:41:43'),
(2, 'Mandaluyong - Megamall', 14.583246001954471, 121.05715066194534, '2013-11-07 09:43:35'),
(3, 'North EDSA - SM/Trinoma', 14.653056634296368, 121.03740692138672, '2013-11-08 03:27:10');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` text NOT NULL,
  `username` tinytext NOT NULL,
  `salt` text NOT NULL,
  `hash` text NOT NULL,
  `type` enum('admin') NOT NULL,
  `su` tinyint(1) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=13 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `username`, `salt`, `hash`, `type`, `su`, `created_at`) VALUES
(12, 'aldrich.barcenas@gmail.com', 'abarcenas', 'FfWhwqeK0huCLEe1MlvuFDx88wxl0nE/eQqBn84X65k=', 'QwF1mhUJGLmHefOOhNodBC9tDlaxNoWXjyXAu+tGcvA=', 'admin', 0, '2013-11-04 10:45:48');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
