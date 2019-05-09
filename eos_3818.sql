-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 25, 2018 at 08:05 PM
-- Server version: 10.1.30-MariaDB
-- PHP Version: 7.2.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `eos_3818`
--

-- --------------------------------------------------------

--
-- Table structure for table `business`
--

CREATE TABLE `business` (
  `id` int(10) UNSIGNED NOT NULL,
  `business_title` varchar(40) NOT NULL,
  `email` varchar(30) NOT NULL,
  `password` varchar(35) NOT NULL,
  `company_info` text NOT NULL,
  `addressL1` text NOT NULL,
  `addressL2` text NOT NULL,
  `phone` int(10) UNSIGNED NOT NULL,
  `cityid` int(10) UNSIGNED NOT NULL,
  `bustypeid` int(10) UNSIGNED NOT NULL,
  `bussubtypeid` int(10) UNSIGNED NOT NULL,
  `tegs` text NOT NULL,
  `type` varchar(1) NOT NULL,
  `company_tags` text NOT NULL,
  `status` varchar(20) NOT NULL,
  `website` varchar(40) NOT NULL,
  `picture` varchar(4) NOT NULL,
  `joinDate` datetime NOT NULL,
  `activeorinactive` int(11) UNSIGNED NOT NULL,
  `passRenew` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `business`
--

INSERT INTO `business` (`id`, `business_title`, `email`, `password`, `company_info`, `addressL1`, `addressL2`, `phone`, `cityid`, `bustypeid`, `bussubtypeid`, `tegs`, `type`, `company_tags`, `status`, `website`, `picture`, `joinDate`, `activeorinactive`, `passRenew`) VALUES
(17, 'fedx', 'fedx@gmail.com', '30f5cbc48a71cc1730b2f26d3f088ce8', 'fedex000fedex000fedex000fedex000fedex000', '', '', 0, 7, 6, 9, '', 'b', '', '', '', 'jpg', '2018-03-31 02:14:25', 1, ''),
(18, 'wiki', 'wiki@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'wiki000wiki000wiki000wiki000wiki000wiki000', '', '', 0, 7, 6, 9, '', 'b', '', '', '', 'jpg', '2018-03-31 02:14:57', 1, '0'),
(19, 'linkdin', 'linkdin@gmail.com', 'f5cab5d681dc5ddf192553741185fce2', 'linkdin000linkdin000linkdin000linkdin000linkdin000', '', '', 0, 7, 6, 9, '', 'b', '', '', '', 'jpg', '2018-03-31 02:15:31', 1, '0'),
(20, 'w.bros', 'w.bros@gmail.com', 'dc37d09f924a85604aafa91aa6cb3a5b', 'wbros000wbros000wbros000wbros000wbros000', '', '', 0, 7, 6, 9, '', 'b', '', '', '', 'jpg', '2018-03-31 02:16:04', 1, '0'),
(21, 'foxnews', 'foxnews@gmail.com', 'b9154b86c67b11202802a0cbc7f974c2', 'fox@000fox@000fox@000fox@000fox@000fox@000', '', '', 0, 7, 6, 9, '', 'b', '', '', '', 'jpg', '2018-03-31 02:16:39', 1, '0');

-- --------------------------------------------------------

--
-- Table structure for table `business_subtypes`
--

CREATE TABLE `business_subtypes` (
  `id` int(10) UNSIGNED NOT NULL,
  `subtype_name` varchar(20) NOT NULL,
  `typeid` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `business_subtypes`
--

INSERT INTO `business_subtypes` (`id`, `subtype_name`, `typeid`) VALUES
(1, 'Rock', 1),
(2, 'Opera', 1),
(3, 'Comedy play', 4),
(4, 'Historical', 5),
(5, 'Tragedy', 4),
(6, 'Golf', 3),
(7, 'Badminton', 2),
(8, 'Chess', 2),
(9, '', 6);

-- --------------------------------------------------------

--
-- Table structure for table `business_types`
--

CREATE TABLE `business_types` (
  `id` int(10) UNSIGNED NOT NULL,
  `type_name` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `business_types`
--

INSERT INTO `business_types` (`id`, `type_name`) VALUES
(1, 'Music'),
(2, 'Sports(Indoor)'),
(3, 'Sports(Outdoor)'),
(4, 'Drama'),
(5, 'Cinema'),
(6, '');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(10) UNSIGNED NOT NULL,
  `category_name` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `category_name`) VALUES
(9, 'Fairs / Markets'),
(10, 'Gathering / Meetings'),
(11, 'Concerts / Gigs'),
(12, 'Party / DJ'),
(13, 'Live Performance'),
(14, 'Movies / Plays'),
(15, 'Lecture / Workshop'),
(16, 'Sports Event');

-- --------------------------------------------------------

--
-- Table structure for table `cities`
--

CREATE TABLE `cities` (
  `id` int(10) UNSIGNED NOT NULL,
  `city_name` varchar(20) NOT NULL,
  `countryid` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cities`
--

INSERT INTO `cities` (`id`, `city_name`, `countryid`) VALUES
(2, 'Berlin', 11),
(3, 'Paris', 12),
(4, 'Genoa', 13),
(5, 'Amman', 14),
(6, 'Fes', 15),
(7, '', 16);

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` int(10) UNSIGNED NOT NULL,
  `comment` text NOT NULL,
  `eventid` int(10) UNSIGNED NOT NULL,
  `userid` int(10) UNSIGNED NOT NULL,
  `postDate` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `comment_replies`
--

CREATE TABLE `comment_replies` (
  `id` int(10) UNSIGNED NOT NULL,
  `replay` text NOT NULL,
  `commentid` int(10) UNSIGNED NOT NULL,
  `eventid` int(10) UNSIGNED NOT NULL,
  `userid` int(10) UNSIGNED NOT NULL,
  `replay_postDate` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `countries`
--

CREATE TABLE `countries` (
  `id` int(10) UNSIGNED NOT NULL,
  `country_name` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `countries`
--

INSERT INTO `countries` (`id`, `country_name`) VALUES
(11, 'Germany'),
(12, 'France'),
(13, 'Italy'),
(14, 'Jordan'),
(15, 'Morocco'),
(16, '');

-- --------------------------------------------------------

--
-- Table structure for table `eventpurpose`
--

CREATE TABLE `eventpurpose` (
  `id` int(10) UNSIGNED NOT NULL,
  `purpose_type` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `eventpurpose`
--

INSERT INTO `eventpurpose` (`id`, `purpose_type`) VALUES
(1, 'Education'),
(2, 'Kids / Baby'),
(3, 'Entertainment'),
(4, 'Culture');

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE `events` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(300) NOT NULL,
  `description` text NOT NULL,
  `eventLocationL1` text NOT NULL,
  `eventLocationL2` text NOT NULL,
  `userid` int(10) UNSIGNED NOT NULL,
  `businessid` int(11) UNSIGNED NOT NULL,
  `user_type` varchar(1) NOT NULL,
  `picture` varchar(4) NOT NULL,
  `categoryid` int(10) UNSIGNED NOT NULL,
  `countryid` int(11) NOT NULL,
  `cityid` int(10) UNSIGNED NOT NULL,
  `venueid` int(10) UNSIGNED NOT NULL,
  `purchaseid` int(11) NOT NULL,
  `price` int(10) UNSIGNED NOT NULL,
  `eventpurposeid` int(10) UNSIGNED NOT NULL,
  `totalSubcriber` int(11) NOT NULL,
  `startDate` date NOT NULL,
  `endDate` date NOT NULL,
  `startTime` time NOT NULL,
  `endTime` time NOT NULL,
  `postDate` date NOT NULL,
  `activation` int(10) UNSIGNED NOT NULL,
  `editActivation` int(11) NOT NULL,
  `activeorinactive` int(11) NOT NULL,
  `tags` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`id`, `title`, `description`, `eventLocationL1`, `eventLocationL2`, `userid`, `businessid`, `user_type`, `picture`, `categoryid`, `countryid`, `cityid`, `venueid`, `purchaseid`, `price`, `eventpurposeid`, `totalSubcriber`, `startDate`, `endDate`, `startTime`, `endTime`, `postDate`, `activation`, `editActivation`, `activeorinactive`, `tags`) VALUES
(39, 'The standard Lorem Ipsum passage.', 'The standard Lorem Ipsum passage.The standard Lorem Ipsum passage.The standard Lorem Ipsum passage.The standard Lorem Ipsum passage.The standard Lorem Ipsum passage.The standard Lorem Ipsum passage.The standard Lorem Ipsum passage.The standard Lorem Ipsum passage.The standard Lorem Ipsum passage.The standard Lorem Ipsum passage.The standard Lorem Ipsum passage.The standard Lorem Ipsum passage.The standard Lorem Ipsum passage.', '', '', 19, 0, 'u', 'jpg', 9, 11, 2, 1, 1, 1, 1, 0, '2018-05-22', '0000-00-00', '00:00:00', '00:00:00', '2018-05-13', 1, 1, 1, ''),
(40, 'The standard Lorem Ipsum passage........', 'The standard Lorem Ipsum passage.The standard Lorem Ipsum passage.The standard Lorem Ipsum passage.The standard Lorem Ipsum passage.The standard Lorem Ipsum passage.The standard Lorem Ipsum passage.The standard Lorem Ipsum passage.The standard Lorem Ipsum passage.The standard Lorem Ipsum passage.The standard Lorem Ipsum passage.The standard Lorem Ipsum passage.The standard Lorem Ipsum passage.The standard Lorem Ipsum passage.The standard Lorem Ipsum passage.', '', '', 19, 0, 'u', 'jpg', 9, 11, 2, 1, 1, 0, 1, 0, '2018-05-10', '0000-00-00', '00:00:00', '00:00:00', '2018-05-13', 1, 1, 1, ''),
(41, 'The standard Lorem Ipsum passage.', 'The standard Lorem Ipsum passage.The standard Lorem Ipsum passage.The standard Lorem Ipsum passage.The standard Lorem Ipsum passage.The standard Lorem Ipsum passage.The standard Lorem Ipsum passage.The standard Lorem Ipsum passage.The standard Lorem Ipsum passage.The standard Lorem Ipsum passage.The standard Lorem Ipsum passage.The standard Lorem Ipsum passage.The standard Lorem Ipsum passage.The standard Lorem Ipsum passage.The standard Lorem Ipsum passage.The standard Lorem Ipsum passage.The standard Lorem Ipsum passage.', '', '', 19, 0, 'u', 'jpg', 10, 11, 3, 2, 1, 0, 3, 0, '2018-05-22', '0000-00-00', '00:00:00', '00:00:00', '2018-05-13', 1, 1, 1, ''),
(42, 'The standard Lorem Ipsum passage.', 'The standard Lorem Ipsum passage.The standard Lorem Ipsum passage.The standard Lorem Ipsum passage.The standard Lorem Ipsum passage.The standard Lorem Ipsum passage.The standard Lorem Ipsum passage.The standard Lorem Ipsum passage.The standard Lorem Ipsum passage.The standard Lorem Ipsum passage.The standard Lorem Ipsum passage.The standard Lorem Ipsum passage.The standard Lorem Ipsum passage.The standard Lorem Ipsum passage.', '', '', 17, 0, 'u', 'jpg', 10, 12, 3, 2, 1, 0, 3, 0, '2018-05-25', '0000-00-00', '00:00:00', '00:00:00', '2018-05-13', 1, 1, 1, ''),
(43, 'The standard Lorem Ipsum passage.', 'The standard Lorem Ipsum passageThe standard Lorem Ipsum passageThe standard Lorem Ipsum passageThe standard Lorem Ipsum passageThe standard Lorem Ipsum passageThe standard Lorem Ipsum passageThe standard Lorem Ipsum passageThe standard Lorem Ipsum passageThe standard Lorem Ipsum passageThe standard Lorem Ipsum passageThe standard Lorem Ipsum passageThe standard Lorem Ipsum passageThe standard Lorem Ipsum passageThe standard Lorem Ipsum passageThe standard Lorem Ipsum passageThe standard Lorem Ipsum passage', '', '', 17, 0, 'u', 'jpg', 11, 11, 2, 3, 1, 0, 2, 0, '2018-05-26', '0000-00-00', '00:00:00', '00:00:00', '2018-05-13', 1, 1, 1, ''),
(44, 'The standard Lorem Ipsum passage.', 'The standard Lorem Ipsum passageThe standard Lorem Ipsum passageThe standard Lorem Ipsum passageThe standard Lorem Ipsum passageThe standard Lorem Ipsum passageThe standard Lorem Ipsum passageThe standard Lorem Ipsum passageThe standard Lorem Ipsum passageThe standard Lorem Ipsum passageThe standard Lorem Ipsum passageThe standard Lorem Ipsum passageThe standard Lorem Ipsum passageThe standard Lorem Ipsum passageThe standard Lorem Ipsum passageThe standard Lorem Ipsum passageThe standard Lorem Ipsum passage', '', '', 17, 0, 'u', 'jpg', 11, 11, 2, 3, 1, 0, 2, 0, '2018-05-26', '0000-00-00', '00:00:00', '00:00:00', '2018-05-13', 1, 1, 1, ''),
(45, 'The standard Lorem Ipsum passage.', 'The standard Lorem Ipsum passageThe standard Lorem Ipsum passageThe standard Lorem Ipsum passageThe standard Lorem Ipsum passageThe standard Lorem Ipsum passageThe standard Lorem Ipsum passageThe standard Lorem Ipsum passageThe standard Lorem Ipsum passageThe standard Lorem Ipsum passageThe standard Lorem Ipsum passageThe standard Lorem Ipsum passageThe standard Lorem Ipsum passageThe standard Lorem Ipsum passageThe standard Lorem Ipsum passageThe standard Lorem Ipsum passageThe standard Lorem Ipsum passage', '', '', 17, 0, 'u', 'jpg', 11, 11, 2, 3, 2, 0, 2, 0, '2018-05-26', '0000-00-00', '00:00:00', '00:00:00', '2018-05-13', 1, 1, 1, ''),
(46, 'The standard Lorem Ipsum passage.', 'The standard Lorem Ipsum passageThe standard Lorem Ipsum passageThe standard Lorem Ipsum passageThe standard Lorem Ipsum passageThe standard Lorem Ipsum passageThe standard Lorem Ipsum passageThe standard Lorem Ipsum passageThe standard Lorem Ipsum passageThe standard Lorem Ipsum passageThe standard Lorem Ipsum passageThe standard Lorem Ipsum passageThe standard Lorem Ipsum passageThe standard Lorem Ipsum passageThe standard Lorem Ipsum passageThe standard Lorem Ipsum passageThe standard Lorem Ipsum passage', '', '', 17, 0, 'u', 'jpg', 11, 11, 2, 3, 1, 0, 2, 0, '2018-05-26', '0000-00-00', '00:00:00', '00:00:00', '2018-05-13', 1, 1, 1, ''),
(47, 'The standard Lorem Ipsum passage.', 'The standard Lorem Ipsum passageThe standard Lorem Ipsum passageThe standard Lorem Ipsum passageThe standard Lorem Ipsum passageThe standard Lorem Ipsum passageThe standard Lorem Ipsum passageThe standard Lorem Ipsum passageThe standard Lorem Ipsum passageThe standard Lorem Ipsum passageThe standard Lorem Ipsum passageThe standard Lorem Ipsum passageThe standard Lorem Ipsum passageThe standard Lorem Ipsum passageThe standard Lorem Ipsum passageThe standard Lorem Ipsum passageThe standard Lorem Ipsum passage', '', '', 17, 0, 'u', 'jpg', 11, 11, 2, 3, 1, 0, 2, 0, '2018-05-26', '0000-00-00', '00:00:00', '00:00:00', '2018-05-13', 1, 1, 1, ''),
(48, 'The standard Lorem Ipsum passage.', 'The standard Lorem Ipsum passageThe standard Lorem Ipsum passageThe standard Lorem Ipsum passageThe standard Lorem Ipsum passageThe standard Lorem Ipsum passageThe standard Lorem Ipsum passageThe standard Lorem Ipsum passageThe standard Lorem Ipsum passageThe standard Lorem Ipsum passageThe standard Lorem Ipsum passageThe standard Lorem Ipsum passageThe standard Lorem Ipsum passageThe standard Lorem Ipsum passageThe standard Lorem Ipsum passageThe standard Lorem Ipsum passageThe standard Lorem Ipsum passage', '', '', 17, 0, 'u', 'jpg', 11, 11, 2, 3, 1, 0, 2, 0, '2018-05-26', '0000-00-00', '00:00:00', '00:00:00', '2018-05-13', 1, 1, 1, ''),
(49, 'The standard Lorem Ipsum passage.', 'The standard Lorem Ipsum passage.The standard Lorem Ipsum passage.The standard Lorem Ipsum passage.The standard Lorem Ipsum passage.The standard Lorem Ipsum passage.The standard Lorem Ipsum passage.The standard Lorem Ipsum passage.The standard Lorem Ipsum passage.The standard Lorem Ipsum passage.', '', '', 18, 0, 'u', 'jpg', 10, 13, 4, 3, 1, 0, 2, 0, '2018-05-24', '0000-00-00', '00:00:00', '00:00:00', '2018-05-13', 1, 1, 1, ''),
(50, 'The standard Lorem Ipsum passage.', 'The standard Lorem Ipsum passage.The standard Lorem Ipsum passage.The standard Lorem Ipsum passage.The standard Lorem Ipsum passage.The standard Lorem Ipsum passage.The standard Lorem Ipsum passage.The standard Lorem Ipsum passage.The standard Lorem Ipsum passage.The standard Lorem Ipsum passage.', '', '', 18, 0, 'u', 'jpg', 10, 13, 4, 3, 1, 0, 2, 0, '2018-05-24', '0000-00-00', '00:00:00', '00:00:00', '2018-05-13', 1, 1, 1, ''),
(51, 'The standard Lorem Ipsum passage.', 'The standard Lorem Ipsum passage.The standard Lorem Ipsum passage.The standard Lorem Ipsum passage.The standard Lorem Ipsum passage.The standard Lorem Ipsum passage.The standard Lorem Ipsum passage.The standard Lorem Ipsum passage.The standard Lorem Ipsum passage.The standard Lorem Ipsum passage.', '', '', 18, 0, 'u', 'jpg', 10, 13, 4, 3, 1, 0, 2, 0, '2018-05-24', '0000-00-00', '00:00:00', '00:00:00', '2018-05-13', 1, 1, 1, ''),
(52, 'The standard Lorem Ipsum passage.', 'The standard Lorem Ipsum passage.The standard Lorem Ipsum passage.The standard Lorem Ipsum passage.The standard Lorem Ipsum passage.The standard Lorem Ipsum passage.The standard Lorem Ipsum passage.The standard Lorem Ipsum passage.The standard Lorem Ipsum passage.The standard Lorem Ipsum passage.', '', '', 18, 0, 'u', 'jpg', 10, 13, 4, 3, 1, 0, 2, 0, '2018-05-24', '0000-00-00', '00:00:00', '00:00:00', '2018-05-13', 1, 1, 1, ''),
(53, 'The standard Lorem Ipsum passage.', 'The standard Lorem Ipsum passage.The standard Lorem Ipsum passage.The standard Lorem Ipsum passage.The standard Lorem Ipsum passage.The standard Lorem Ipsum passage.The standard Lorem Ipsum passage.The standard Lorem Ipsum passage.The standard Lorem Ipsum passage.The standard Lorem Ipsum passage.', '', '', 18, 0, 'u', 'jpg', 10, 13, 4, 3, 1, 0, 2, 0, '2018-05-24', '0000-00-00', '00:00:00', '00:00:00', '2018-05-13', 1, 1, 1, ''),
(54, 'The standard Lorem Ipsum passage.', 'The standard Lorem Ipsum passage.The standard Lorem Ipsum passage.The standard Lorem Ipsum passage.The standard Lorem Ipsum passage.The standard Lorem Ipsum passage.The standard Lorem Ipsum passage.The standard Lorem Ipsum passage.The standard Lorem Ipsum passage.The standard Lorem Ipsum passage.', '', '', 18, 0, 'u', 'jpg', 10, 13, 4, 3, 1, 0, 2, 0, '2018-05-24', '0000-00-00', '00:00:00', '00:00:00', '2018-05-13', 1, 1, 1, ''),
(55, 'The standard Lorem Ipsum passage.', 'The standard Lorem Ipsum passage.', '', '', 19, 0, 'u', 'jpg', 14, 12, 3, 5, 1, 12, 3, 0, '2018-05-25', '0000-00-00', '00:00:00', '00:00:00', '2018-05-15', 1, 1, 1, ''),
(56, 'Business', 'The standard Lorem Ipsum passage.The standard Lorem Ipsum passage.The standard Lorem Ipsum passage.The standard Lorem Ipsum passage.The standard Lorem Ipsum passage.The standard Lorem Ipsum passage.', '', '', 10, 17, 'b', 'jpg', 10, 12, 3, 3, 2, 0, 1, 0, '2018-05-17', '0000-00-00', '00:00:00', '00:00:00', '2018-05-20', 1, 1, 1, ''),
(57, 'Hello event', '', '', '', 19, 0, 'u', 'jpg', 11, 13, 3, 4, 2, 0, 3, 0, '2018-06-20', '0000-00-00', '00:00:00', '00:00:00', '2018-05-20', 1, 1, 1, ''),
(58, 'hello event', '', '', '', 19, 0, 'u', 'jpg', 11, 13, 3, 4, 2, 0, 3, 0, '2018-06-28', '0000-00-00', '00:00:00', '00:00:00', '2018-05-20', 1, 1, 1, ''),
(60, 'Lorem Ipsum Hello', 'Lorem Ipsum HelloLorem Ipsum HelloLorem Ipsum HelloLorem Ipsum HelloLorem Ipsum HelloLorem Ipsum HelloLorem Ipsum HelloLorem Ipsum Hello', '', '', 19, 0, 'u', 'jpg', 10, 11, 2, 3, 2, 0, 1, 0, '2018-05-24', '0000-00-00', '12:59:00', '12:58:00', '2018-05-21', 1, 1, 1, ''),
(61, 'report testreport testreport test', 'userprofileuserprofileuserprofileuserprofileuserprofileuserprofileuserprofileus', '', '', 19, 0, 'u', 'jpg', 12, 14, 5, 2, 2, 0, 2, 0, '2018-05-11', '0000-00-00', '10:57:00', '12:59:00', '2018-05-21', 1, 1, 1, ''),
(62, 'report test2', 'fedx@gmail.comfedx@gfedx@gmail.com', 'fedx@gmail.com', 'fedx@gmail.com', 10, 17, 'b', 'jpg', 16, 13, 4, 3, 2, 0, 2, 0, '2018-05-10', '0000-00-00', '00:59:00', '00:57:00', '2018-05-21', 1, 1, 1, ''),
(63, 'Pecha Kucha (Lightning Talk) Workshop', 'hELLO hELLO hELLO hELLO hELLO hELLO hELLO hELLO hELLO hELLO hELLO hELLO hELLO hELLO hELLO hELLO', 'hELLO hELLO hELLO hELLO hELLO', 'hELLO hELLO hELLO hELLO hELLO', 19, 0, 'u', 'jpg', 9, 11, 2, 1, 1, 420, 1, 0, '2018-05-18', '2018-05-29', '12:57:00', '12:59:00', '2018-05-31', 1, 1, 1, ''),
(64, 'New post New post New post New post', 'New postNew postNew postNew postNew post New postNew postNew postNew postNew post New postNew postNew postNew postNew post', 'New post New post', 'New post New post', 19, 0, 'u', 'jpg', 12, 12, 3, 1, 2, 0, 2, 0, '2018-06-21', '2018-06-22', '13:59:00', '12:59:00', '2018-06-10', 1, 1, 1, ''),
(65, 'New Business New Business', 'New Business New Business New Business New Business New Business New Business New Business New Business', 'New Business New Business', 'New Business New Business', 10, 17, 'b', 'jpg', 10, 11, 2, 1, 2, 0, 3, 0, '2018-06-20', '2018-06-29', '12:54:00', '22:58:00', '2018-06-10', 1, 1, 1, ''),
(66, 'New Business New Business', 'New Business New Business New Business New Business New Business New Business New Business New Business', 'New Business New Business', 'New Business New Business', 10, 17, 'b', 'jpg', 10, 11, 2, 1, 2, 0, 3, 0, '2018-06-20', '2018-06-29', '12:54:00', '22:58:00', '2018-06-10', 1, 1, 1, ''),
(67, 'The standard Lorem Ipsum passage. Test Update', 'Test Update Test UpdateTest Update Test UpdateTest Update Test UpdateTest Update Test UpdateTest Update Test Update', 'The standard Lorem Ipsummm', 'The standard Loremmmm', 19, 0, 'u', 'jpg', 9, 12, 3, 1, 2, 0, 3, 0, '2018-06-04', '2018-06-04', '23:59:00', '23:58:00', '2018-06-11', 1, 1, 1, ''),
(68, 'New Business titletttttt', 'New Business titleNew Business titleNew Business titleNew Business titleNew Business titleNew Business title', 'New Business title', 'New Business title', 10, 17, 'b', 'jpg', 9, 11, 2, 2, 2, 0, 4, 0, '2018-06-15', '2018-06-28', '12:59:00', '12:59:00', '2018-06-11', 1, 1, 1, ''),
(69, 'New Event Post Business', 'New Event Post BusinessNew Event Post BusinessNew Event Post BusinessNew Event Post BusinessNew Event Post BusinessNew Event Post Business', 'New Event Post Business', 'New Event Post Business', 10, 17, 'b', 'jpg', 13, 12, 3, 4, 2, 0, 2, 0, '2018-06-23', '2018-06-28', '12:59:00', '12:59:00', '2018-06-11', 1, 1, 1, ''),
(70, 'New Event Post User', 'New Event Post UserNew Event Post UserNew Event Post UserNew Event Post UserNew Event Post UserNew Event Post UserNew Event Post UserNew Event Post UserNew Event Post User', 'New Event Post User', 'New Event Post User', 19, 0, 'u', 'jpg', 11, 13, 4, 2, 1, 100, 4, 0, '2018-06-08', '2018-06-20', '12:59:00', '12:59:00', '2018-06-11', 1, 1, 1, ''),
(71, 'The standard Lorem Ipsum passage.', 'The standard Lorem Ipsum passage.The standard Lorem Ipsum passage.The standard Lorem Ipsum passage.The standard Lorem Ipsum passage.', 'The standard Lorem', 'The standard Lorem', 10, 17, 'b', 'jpg', 10, 11, 2, 2, 2, 0, 1, 0, '2018-06-14', '2018-06-29', '12:58:00', '12:59:00', '2018-06-13', 1, 1, 1, ''),
(72, 'The standard Lorem Ipsum passage. Test Update', 'The standard Lorem Ipsum passage. Test UpdateThe standard Lorem Ipsum passage. Test UpdateThe standard Lorem Ipsum passage. Test UpdateThe standard Lorem Ipsum passage. Test UpdateThe standard Lorem Ipsum passage. Test Update', 'The standard Lorem Ipsum passa', 'The standard Lorem Ipsum passa', 19, 0, 'u', 'jpg', 9, 12, 3, 2, 2, 0, 3, 0, '2018-06-21', '2018-06-29', '12:59:00', '12:59:00', '2018-06-17', 1, 1, 1, ''),
(73, 'The standard Lorem Ipsum passage.', 'The standard Lorem Ipsum passage.The standard Lorem Ipsum passage.The standard Lorem Ipsum passage.The standard Lorem Ipsum passage.The standard Lorem Ipsum passage.The standard Lorem Ipsum passage.The standard Lorem Ipsum passage.The standard Lorem Ipsum passage.', 'The standard Lorem Ipsum passa', 'The standard Lorem Ipsum passa', 19, 0, 'u', 'jpg', 11, 12, 3, 2, 2, 0, 4, 0, '2018-06-21', '2018-06-28', '12:59:00', '12:58:00', '2018-06-17', 1, 1, 1, ''),
(74, 'The standard Lorem Ipsum passage.', 'The standard Lorem Ipsum passage.The standard Lorem Ipsum passage.The standard Lorem Ipsum passage.The standard Lorem Ipsum passage.The standard Lorem Ipsum passage.The standard Lorem Ipsum passage.', 'The standard Lorem Ipsum passa', '', 19, 0, 'u', 'jpg', 9, 16, 2, 2, 2, 0, 2, 0, '2018-06-06', '0000-00-00', '12:59:00', '12:59:00', '2018-06-28', 1, 1, 1, ''),
(75, 'The standard Lorem Ipsum passage.', 'The standard Lorem Ipsum passage.The standard Lorem Ipsum passage.The standard Lorem Ipsum passage.The standard Lorem Ipsum passage.The standard Lorem Ipsum passage.The standard Lorem Ipsum passage.The standard Lorem Ipsum passage.The standard Lorem Ipsum passage.', 'The standard Lorem Ipsum passa', '', 19, 0, 'u', 'jpg', 10, 16, 4, 2, 2, 0, 3, 0, '2018-06-05', '2018-06-20', '12:58:00', '23:59:00', '2018-06-28', 1, 1, 1, ''),
(77, 'Perfact Event', 'Perfact EventPerfact EventPerfact EventPerfact EventPerfact EventPerfact EventPerfact EventPerfact EventPerfact EventPerfact EventPerfact EventPerfact EventPerfact EventPerfact EventPerfact Event', 'Perfact Event', '', 19, 0, 'u', 'jpg', 12, 16, 5, 1, 2, 0, 3, 0, '2018-06-11', '2018-06-22', '12:58:00', '12:59:00', '2018-06-28', 1, 1, 1, ''),
(78, 'Picture validation Picture validation', 'Picture validation Picture validation Picture validation Picture validation Picture validation Picture validation Picture validation Picture validation Picture validation Picture validation Picture validation Picture validation', 'Picture validation Picture val', '', 19, 0, 'u', 'jpg', 10, 16, 3, 3, 2, 0, 3, 0, '2018-06-05', '2018-06-29', '12:59:00', '12:59:00', '2018-06-28', 1, 1, 1, ''),
(79, 'New Pic upload 1New Pic upload 1New Pic upload 1New Pic', 'New Pic upload 1New Pic upload 1New Pic upload 1New Pic upload 1New Pic upload 1New Pic upload 1New Pic upload 1New Pic upload 1New Pic upload 1New Pic upload 1New Pic upload 1New Pic upload 1New Pic upload 1New Pic upload 1New Pic upload 1', 'New Pic upload 1New Pic upload', '', 17, 0, 'u', 'jpg', 10, 16, 2, 5, 2, 0, 4, 0, '2018-06-11', '2018-06-27', '12:59:00', '12:59:00', '2018-06-28', 1, 1, 1, ''),
(80, 'New Pic upload 2New Pic upload 2', 'New Pic upload 2New Pic upload 2New Pic upload 2New Pic upload 2New Pic upload 2New Pic upload 2New Pic upload 2New Pic upload 2New Pic upload 2New Pic upload 2New Pic upload 2New Pic upload 2New Pic upload 2New Pic upload 2', 'New Pic upload 2New Pic upload', '', 17, 0, 'u', 'jpg', 11, 16, 4, 3, 2, 0, 2, 0, '2018-06-07', '2018-06-29', '12:59:00', '23:59:00', '2018-06-28', 1, 1, 1, ''),
(81, 'Pic 100Pic 100Pic 100Pic 100Pic 100Pic 100Pic 100Pic 10', 'Pic 100Pic 100Pic 100Pic 100Pic 100Pic 100Pic 100Pic 100Pic 100Pic 100Pic 100Pic 100Pic 100Pic 100Pic 100Pic 100Pic 100Pic 100Pic 100Pic 100Pic 100Pic 100Pic 100Pic 100Pic 100Pic 100Pic 100Pic 100Pic 100Pic 100Pic 100Pic 100Pic 100Pic 100Pic 100', 'Pic 100Pic 100Pic 100Pic 100Pi', '', 17, 0, 'u', 'jpg', 10, 16, 2, 1, 2, 0, 3, 0, '2018-06-21', '2018-06-27', '12:59:00', '12:59:00', '2018-06-28', 1, 1, 1, ''),
(82, 'Just another picture', 'Just another pictureJust another pictureJust another pictureJust another pictureJust another pictureJust another pictureJust another pictureJust another pictureJust another picture', 'Just another pictureJust anoth', '', 19, 0, 'u', 'jpg', 11, 16, 2, 4, 2, 0, 2, 0, '2018-06-21', '0000-00-00', '12:59:00', '12:59:00', '2018-06-28', 1, 1, 1, ''),
(83, 'Picture upload test 10', 'Picture upload test 10Picture upload test 10Picture upload test 10Picture upload test 10Picture upload test 10Picture upload test 10Picture upload test 10Picture upload test 10Picture upload test 10Picture upload test 10Picture upload test 10', 'Picture upload test 10Picture', '', 19, 0, 'u', 'jpg', 12, 16, 2, 4, 2, 0, 4, 0, '2018-06-20', '0000-00-00', '12:59:00', '12:59:00', '2018-06-28', 1, 1, 1, ''),
(84, 'The standard Lorem Ipsum passage.', 'The standard Lorem Ipsum passage.The standard Lorem Ipsum passage.The standard Lorem Ipsum passage.The standard Lorem Ipsum passage.The standard Lorem Ipsum passage.The standard Lorem Ipsum passage.The standard Lorem Ipsum passage.The standard Lorem Ipsum passage.', 'The standard Lorem Ipsum passa', '', 19, 0, 'u', 'jpg', 11, 16, 2, 2, 2, 0, 3, 0, '2018-06-13', '2018-06-29', '12:59:00', '12:58:00', '2018-06-28', 1, 1, 1, ''),
(85, 'Post by me Post by me Post by me Post by me Post by me', 'Post by me Post by me Post by me Post by me Post by me Post by me Post by me Post by me Post by me Post by me Post by me Post by me Post by me Post by me Post by me Post by me Post by me Post by me Post by me Post by me Post by me Post by me Post by me Post by me Post by me Post by me Post by me Post by me Post by me Post by me Post by me Post by me Post by me Post by me Post by me', 'Post by me Post by me Post by', '', 19, 0, 'u', 'jpg', 11, 16, 4, 3, 2, 0, 3, 0, '2018-06-12', '0000-00-00', '12:59:00', '12:59:00', '2018-06-28', 1, 1, 1, ''),
(86, 'The standard Lorem Ipsum passage.', 'The standard Lorem Ipsum passage.The standard Lorem Ipsum passage.The standard Lorem Ipsum passage.The standard Lorem Ipsum passage.The standard Lorem Ipsum passage.The standard Lorem Ipsum passage.The standard Lorem Ipsum passage.The standard Lorem Ipsum passage.The standard Lorem Ipsum passage.', 'The standard Lorem Ipsum passa', '', 19, 0, 'u', 'jpg', 11, 16, 3, 3, 2, 0, 2, 0, '2018-06-07', '0000-00-00', '12:59:00', '23:59:00', '2018-06-28', 1, 1, 1, ''),
(87, 'The standard Lorem Ipsum passage.', 'The standard Lorem Ipsum passage.The standard Lorem Ipsum passage.The standard Lorem Ipsum passage.The standard Lorem Ipsum passage.The standard Lorem Ipsum passage.The standard Lorem Ipsum passage.The standard Lorem Ipsum passage.', 'The standard Lorem Ipsum passa', '', 19, 0, 'u', 'jpg', 10, 16, 3, 2, 2, 0, 2, 0, '2018-06-19', '0000-00-00', '12:59:00', '00:59:00', '2018-06-28', 1, 1, 1, 'School,College,University,'),
(88, 'The standard Lorem Ipsum passage.', 'The standard Lorem Ipsum passageThe standard Lorem Ipsum passageThe standard Lorem Ipsum passageThe standard Lorem Ipsum passageThe standard Lorem Ipsum passage', 'The standard Lorem Ipsum passa', '', 19, 0, 'u', 'jpg', 10, 16, 6, 2, 2, 0, 3, 0, '2018-06-20', '2018-06-23', '12:59:00', '12:59:00', '2018-06-28', 1, 1, 1, ''),
(89, 'The standard Lorem Ipsum passage. Test Update', 'The standard Lorem Ipsum passage. Test UpdateThe standard Lorem Ipsum passage. Test UpdateThe standard Lorem Ipsum passage. Test UpdateThe standard Lorem Ipsum passage. Test UpdateThe standard Lorem Ipsum passage. Test UpdateThe standard Lorem Ipsum passage. Test UpdateThe standard Lorem Ipsum passage. Test UpdateThe standard Lorem Ipsum passage. Test Update', 'The standard Lorem Ipsum passa', '', 19, 0, 'u', 'jpg', 11, 16, 5, 6, 2, 0, 4, 0, '2018-06-20', '0000-00-00', '12:58:00', '23:59:00', '2018-06-28', 1, 1, 1, ''),
(90, 'The standard Lorem Ipsum passage.', 'The standard Lorem Ipsum passage. Test UpdateThe standard Lorem Ipsum passage. Test UpdateThe standard Lorem Ipsum passage. Test UpdateThe standard Lorem Ipsum passage. Test UpdateThe standard Lorem Ipsum passage. Test UpdateThe standard Lorem Ipsum passage. Test UpdateThe standard Lorem Ipsum passage. Test Update', 'The standard Lorem Ipsum passa', '', 19, 0, 'u', 'jpg', 10, 16, 3, 3, 2, 0, 3, 0, '2018-06-16', '0000-00-00', '23:59:00', '12:59:00', '2018-06-28', 1, 1, 1, ''),
(91, 'The standard Lorem Ipsum passage.', 'The standard Lorem Ipsum passage.The standard Lorem Ipsum passage.The standard Lorem Ipsum passage.The standard Lorem Ipsum passage.', '$config[\'new_image\'] = \'./publ', '', 19, 0, 'u', 'jpg', 10, 16, 5, 3, 2, 0, 4, 0, '2018-06-14', '0000-00-00', '12:58:00', '23:59:00', '2018-06-28', 1, 1, 1, ''),
(92, 'The standard Lorem Ipsum passage. Test Update', 'The standard Lorem Ipsum passage. Test UpdateThe standard Lorem Ipsum passage. Test UpdateThe standard Lorem Ipsum passage. Test UpdateThe standard Lorem Ipsum passage. Test UpdateThe standard Lorem Ipsum passage. Test UpdateThe standard Lorem Ipsum passage. Test UpdateThe standard Lorem Ipsum passage. Test UpdateThe standard Lorem Ipsum passage. Test Update', 'The standard Lorem Ipsum passa', '', 19, 0, 'u', 'jpg', 11, 16, 4, 1, 2, 0, 3, 0, '2018-06-14', '0000-00-00', '12:59:00', '22:59:00', '2018-06-28', 1, 1, 1, ''),
(93, 'The standard Lorem Ipsum passage.', 'The standard Lorem Ipsum passage.The standard Lorem Ipsum passage.The standard Lorem Ipsum passage.The standard Lorem Ipsum passage.The standard Lorem Ipsum passage.The standard Lorem Ipsum passage.The standard Lorem Ipsum passage.The standard Lorem Ipsum passage.The standard Lorem Ipsum passage.', 'The standard Lorem Ipsum passa', '', 17, 0, 'u', 'jpg', 12, 16, 3, 3, 2, 0, 3, 0, '2018-06-14', '0000-00-00', '12:59:00', '23:59:00', '2018-06-29', 0, 1, 1, ''),
(94, 'The standard Lorem Ipsum passage.', 'The standard Lorem Ipsum passage.The standard Lorem Ipsum passage.The standard Lorem Ipsum passage.The standard Lorem Ipsum passage.The standard Lorem Ipsum passage.The standard Lorem Ipsum passage.The standard Lorem Ipsum passage.', 'The standard Lorem Ipsum passa', '', 19, 0, 'u', 'jpg', 10, 16, 2, 2, 2, 0, 3, 0, '2018-06-08', '0000-00-00', '12:59:00', '12:59:00', '2018-06-30', 0, 1, 1, 'sadasd,asdasd,asdasdasd,sdasd'),
(95, 'Tags input', 'Tags inputTags inputTags inputTags inputTags inputTags inputTags inputTags inputTags inputTags inputTags inputTags inputTags inputTags inputTags inputTags inputTags inputTags inputTags inputTags inputTags inputTags input', 'Tags inputTags inputTags input', '', 19, 0, 'u', 'jpg', 9, 16, 2, 1, 2, 0, 2, 0, '2018-07-31', '0000-00-00', '12:59:00', '12:59:00', '2018-06-30', 1, 1, 1, 'School,College,University,'),
(96, 'Test tags event', 'The standard Lorem Ipsum passage.The standard Lorem Ipsum passage.The standard Lorem Ipsum passage.The standard Lorem Ipsum passage.The standard Lorem Ipsum passage.The standard Lorem Ipsum passage.The standard Lorem Ipsum passage.The standard Lorem Ipsum passage.', 'The standard Lorem Ipsum passa', '', 17, 0, 'u', 'jpg', 9, 16, 2, 2, 2, 0, 2, 0, '2018-07-29', '2018-06-19', '12:58:00', '23:58:00', '2018-06-30', 1, 1, 1, 'tag1,tag2,tag3,tag4,');

-- --------------------------------------------------------

--
-- Table structure for table `price`
--

CREATE TABLE `price` (
  `id` int(10) UNSIGNED NOT NULL,
  `price` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `purchase`
--

CREATE TABLE `purchase` (
  `id` int(10) UNSIGNED NOT NULL,
  `purchase_type` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `purchase`
--

INSERT INTO `purchase` (`id`, `purchase_type`) VALUES
(1, 'Paid'),
(2, 'Free');

-- --------------------------------------------------------

--
-- Table structure for table `report`
--

CREATE TABLE `report` (
  `id` int(10) UNSIGNED NOT NULL,
  `report` varchar(50) NOT NULL,
  `complainer_id` int(11) NOT NULL,
  `event_id` int(11) NOT NULL,
  `guilty_id` int(11) NOT NULL,
  `guilty_type` varchar(2) NOT NULL,
  `comment` varchar(50) NOT NULL,
  `show` smallint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `report`
--

INSERT INTO `report` (`id`, `report`, `complainer_id`, `event_id`, `guilty_id`, `guilty_type`, `comment`, `show`) VALUES
(12, 'It\'s harassing me or someone i know.', 19, 62, 17, 'b', 'Shame', 1),
(13, 'It\'s harassing me or someone i know.', 17, 62, 17, 'b', '', 1),
(16, 'It\'s a scam.', 17, 61, 19, 'u', '', 1),
(17, 'It\'s harassing me or someone i know.', 19, 63, 19, 'u', '', 1);

-- --------------------------------------------------------

--
-- Table structure for table `subscribers`
--

CREATE TABLE `subscribers` (
  `id` int(10) UNSIGNED NOT NULL,
  `eventid` int(10) UNSIGNED NOT NULL,
  `userid` int(10) UNSIGNED NOT NULL,
  `user_type` varchar(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `subscribers`
--

INSERT INTO `subscribers` (`id`, `eventid`, `userid`, `user_type`) VALUES
(3, 63, 17, 'b'),
(4, 66, 17, 'b');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(40) NOT NULL,
  `email` varchar(30) NOT NULL,
  `password` varchar(35) NOT NULL,
  `bio` text NOT NULL,
  `type` varchar(1) NOT NULL,
  `status` varchar(40) NOT NULL,
  `passRenew` varchar(20) NOT NULL,
  `joinDate` datetime NOT NULL,
  `picture` varchar(4) NOT NULL,
  `activeorinactive` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `bio`, `type`, `status`, `passRenew`, `joinDate`, `picture`, `activeorinactive`) VALUES
(1, 'Fabio', 'fabio@admin.com', '6aabf9bdc597de71fd65ca995a9bc593', 'Founder of ourKalender.com', 'a', '', '', '2018-03-19 00:00:00', 'jpg', 1),
(10, 'Fake User', 'Fake User', 'Fake User', 'Fake User', 'u', '', '', '0000-00-00 00:00:00', '', 0),
(17, 'Hasan Mahmud', 'hasan@gmail.com', '8b5d27edbb07b500a39c0db2e6710683', '\"Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua', 'u', '', '', '2018-03-20 15:34:05', 'jpg', 1),
(18, 'Hasan Mamun', 'mamun@gmail.com', '773e8ad4711562e1e6b2de15e13d449e', '\"Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua', 'u', '', '', '2018-03-20 15:35:08', 'jpg', 1),
(19, 'saif ahmed', 'saif@gmail.com', '3d30ab09470c22eb8748e8da01ce4b9b', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.', 'u', '', '', '2018-03-30 23:54:40', 'jpg', 1),
(20, 'saifad', 'saifad087@gmail.com', '2fe77711a3c81fe50b2f81a99b4ec244', 'saifad087@gmail.com', 'u', '', '', '2018-04-02 01:39:07', 'jpg', 1);

-- --------------------------------------------------------

--
-- Table structure for table `venues`
--

CREATE TABLE `venues` (
  `id` int(10) UNSIGNED NOT NULL,
  `venue_type` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `venues`
--

INSERT INTO `venues` (`id`, `venue_type`) VALUES
(1, 'Park'),
(2, 'Public Space'),
(3, 'Bar'),
(4, 'Club'),
(5, 'Café / Restaura'),
(6, 'Sport Venue');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `business`
--
ALTER TABLE `business`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `business_email` (`email`),
  ADD KEY `cityid` (`cityid`),
  ADD KEY `bustypeid` (`bustypeid`),
  ADD KEY `bussubtypeid` (`bussubtypeid`);

--
-- Indexes for table `business_subtypes`
--
ALTER TABLE `business_subtypes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `typeid` (`typeid`);

--
-- Indexes for table `business_types`
--
ALTER TABLE `business_types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cities`
--
ALTER TABLE `cities`
  ADD PRIMARY KEY (`id`),
  ADD KEY `countryid` (`countryid`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `eventid` (`eventid`),
  ADD KEY `userid` (`userid`);

--
-- Indexes for table `comment_replies`
--
ALTER TABLE `comment_replies`
  ADD PRIMARY KEY (`id`),
  ADD KEY `eventid` (`eventid`),
  ADD KEY `userid` (`userid`),
  ADD KEY `commentid` (`commentid`);

--
-- Indexes for table `countries`
--
ALTER TABLE `countries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `eventpurpose`
--
ALTER TABLE `eventpurpose`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`id`),
  ADD KEY `userid` (`userid`),
  ADD KEY `categoryid` (`categoryid`),
  ADD KEY `cityid` (`cityid`);

--
-- Indexes for table `price`
--
ALTER TABLE `price`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `purchase`
--
ALTER TABLE `purchase`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `report`
--
ALTER TABLE `report`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subscribers`
--
ALTER TABLE `subscribers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `venues`
--
ALTER TABLE `venues`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `business`
--
ALTER TABLE `business`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `business_subtypes`
--
ALTER TABLE `business_subtypes`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `business_types`
--
ALTER TABLE `business_types`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `cities`
--
ALTER TABLE `cities`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `comment_replies`
--
ALTER TABLE `comment_replies`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `countries`
--
ALTER TABLE `countries`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `eventpurpose`
--
ALTER TABLE `eventpurpose`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=97;

--
-- AUTO_INCREMENT for table `price`
--
ALTER TABLE `price`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `purchase`
--
ALTER TABLE `purchase`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `report`
--
ALTER TABLE `report`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `subscribers`
--
ALTER TABLE `subscribers`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `venues`
--
ALTER TABLE `venues`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `business`
--
ALTER TABLE `business`
  ADD CONSTRAINT `business_ibfk_1` FOREIGN KEY (`cityid`) REFERENCES `cities` (`id`),
  ADD CONSTRAINT `business_ibfk_2` FOREIGN KEY (`bustypeid`) REFERENCES `business_types` (`id`),
  ADD CONSTRAINT `business_ibfk_3` FOREIGN KEY (`bussubtypeid`) REFERENCES `business_subtypes` (`id`);

--
-- Constraints for table `business_subtypes`
--
ALTER TABLE `business_subtypes`
  ADD CONSTRAINT `business_subtypes_ibfk_1` FOREIGN KEY (`typeid`) REFERENCES `business_types` (`id`);

--
-- Constraints for table `cities`
--
ALTER TABLE `cities`
  ADD CONSTRAINT `cities_ibfk_1` FOREIGN KEY (`countryid`) REFERENCES `countries` (`id`);

--
-- Constraints for table `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comments_ibfk_1` FOREIGN KEY (`eventid`) REFERENCES `events` (`id`),
  ADD CONSTRAINT `comments_ibfk_2` FOREIGN KEY (`userid`) REFERENCES `users` (`id`);

--
-- Constraints for table `comment_replies`
--
ALTER TABLE `comment_replies`
  ADD CONSTRAINT `comment_replies_ibfk_1` FOREIGN KEY (`eventid`) REFERENCES `events` (`id`),
  ADD CONSTRAINT `comment_replies_ibfk_2` FOREIGN KEY (`userid`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `comment_replies_ibfk_3` FOREIGN KEY (`commentid`) REFERENCES `comments` (`id`);

--
-- Constraints for table `events`
--
ALTER TABLE `events`
  ADD CONSTRAINT `events_ibfk_1` FOREIGN KEY (`userid`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `events_ibfk_2` FOREIGN KEY (`categoryid`) REFERENCES `category` (`id`),
  ADD CONSTRAINT `events_ibfk_3` FOREIGN KEY (`cityid`) REFERENCES `cities` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
