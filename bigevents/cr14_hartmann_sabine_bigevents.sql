-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 13, 2018 at 12:13 AM
-- Server version: 10.1.30-MariaDB
-- PHP Version: 7.2.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cr14_hartmann_sabine_bigevents`
--

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE `events` (
  `id` int(11) NOT NULL,
  `eventName` varchar(150) NOT NULL,
  `startDate` datetime NOT NULL,
  `endDate` datetime NOT NULL,
  `description` text NOT NULL,
  `image` varchar(255) NOT NULL,
  `capacity` int(5) NOT NULL,
  `contactEmail` varchar(255) NOT NULL,
  `contactPhone` int(15) NOT NULL,
  `locName` varchar(100) NOT NULL,
  `eventLocStreet` varchar(100) NOT NULL,
  `eventLocCity` varchar(100) NOT NULL,
  `url` varchar(255) NOT NULL,
  `fk_eventType` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- RELATIONSHIPS FOR TABLE `events`:
--   `fk_eventType`
--       `eventtype` -> `eventTypeId`
--

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`id`, `eventName`, `startDate`, `endDate`, `description`, `image`, `capacity`, `contactEmail`, `contactPhone`, `locName`, `eventLocStreet`, `eventLocCity`, `url`, `fk_eventType`) VALUES
(1, 'Amazing Music Festival', '2018-03-18 10:00:00', '2018-03-20 20:00:00', 'Ultimate self salvation depths superiority self. Spirit derive ideal ideal virtues deceptions mountains.Law justice merciful right gains victorious philosophy joy. Endless virtues transvaluation ultimate overcome. Transvaluation selfish disgust aversion right intentions inexpedient aversion. Noble suicide battle play reason christianity against faithful will. Zarathustra gains hatred christianity good good right gains abstract burying justice gains.', 'music.jpg', 250, 'event@bigevents.com', 123456789, 'Arena', 'Schulgasse 22', '1180 Wien', 'www.music-event.com', 1),
(2, 'Awesome Movie Event', '2018-03-29 12:00:00', '2018-03-29 16:00:00', 'Ultimate enlightenment philosophy faithful salvation free insofar mountains society decieve. Christianity ascetic ideal evil ultimate morality aversion dead christianity. Chaos hatred oneself superiority spirit derive merciful. Free noble love passion contradict gains decieve. Marvelous decrepit christian snare spirit christianity against ascetic ocean disgust good.\r\n\r\nUltimate reason god love ubermensch ascetic ocean aversion transvaluation insofar merciful. Hope superiority hope god sexuality endless suicide overcome play decrepit christian convictions joy marvelous.', 'blackpanther.jpg', 50, 'movie@bigevents.com', 123456789, 'Bioscoop', 'Neubaugasse 17', '1060 Wien', 'www.movies.com', 3),
(3, 'Exciting Sports Event', '2018-03-18 10:00:00', '2018-03-20 20:00:00', 'Ultimate self salvation depths superiority self. Spirit derive ideal ideal virtues deceptions mountains.Law justice merciful right gains victorious philosophy joy. Endless virtues transvaluation ultimate overcome. Transvaluation selfish disgust aversion right intentions inexpedient aversion. Noble suicide battle play reason christianity against faithful will. Zarathustra gains hatred christianity good good right gains abstract burying justice gains.', 'sport.jpg', 250, 'event@bigevents.com', 123456789, 'Stadium 2', 'Mariahilfer Str. 27', '1060 Wien', 'www.music-event.com', 2),
(4, 'Challenging Theatre Event', '2018-03-29 12:00:00', '2018-03-29 16:00:00', 'Ultimate enlightenment philosophy faithful salvation free insofar mountains society decieve. Christianity ascetic ideal evil ultimate morality aversion dead christianity. Chaos hatred oneself superiority spirit derive merciful. Free noble love passion contradict gains decieve. Marvelous decrepit christian snare spirit christianity against ascetic ocean disgust good.\r\n\r\nUltimate reason god love ubermensch ascetic ocean aversion transvaluation insofar merciful. Hope superiority hope god sexuality endless suicide overcome play decrepit christian convictions joy marvelous.', 'theater.jpg', 50, 'movie@bigevents.com', 123456789, 'Burg', 'Nussdorfer Str. 34', '1190 Wien', 'www.movies.com', 4),
(5, 'Challenging Theatre Event', '2018-03-29 12:00:00', '2018-03-29 16:00:00', 'Ultimate enlightenment philosophy faithful salvation free insofar mountains society decieve. Christianity ascetic ideal evil ultimate morality aversion dead christianity. Chaos hatred oneself superiority spirit derive merciful. Free noble love passion contradict gains decieve. Marvelous decrepit christian snare spirit christianity against ascetic ocean disgust good.\r\n\r\nUltimate reason god love ubermensch ascetic ocean aversion transvaluation insofar merciful. Hope superiority hope god sexuality endless suicide overcome play decrepit christian convictions joy marvelous.', 'theater.jpg', 50, 'movie@bigevents.com', 123456789, 'Burg', 'Nussdorfer Str. 34', '1190 Wien', 'www.movies.com', 4),
(6, 'Exciting Sports Event', '2018-03-18 10:00:00', '2018-03-20 20:00:00', 'Ultimate self salvation depths superiority self. Spirit derive ideal ideal virtues deceptions mountains.\r\nLaw justice merciful right gains victorious philosophy joy. Endless virtues transvaluation ultimate overcome. Transvaluation selfish disgust aversion right intentions inexpedient aversion. Noble suicide battle play reason christianity against faithful will. Zarathustra gains hatred christianity good good right gains abstract burying justice gains.', 'sport.jpg', 250, 'event@bigevents.com', 123456789, 'Stadium', 'Mariahilfer Str. 27', '1060 Wien', 'www.music-event.com', 2),
(8, 'Awesome Movie Event', '2018-03-29 12:00:00', '2018-03-29 16:00:00', 'Ultimate enlightenment philosophy faithful salvation free insofar mountains society decieve. Christianity ascetic ideal evil ultimate morality aversion dead christianity. Chaos hatred oneself superiority spirit derive merciful. Free noble love passion contradict gains decieve. Marvelous decrepit christian snare spirit christianity against ascetic ocean disgust good.\r\n\r\nUltimate reason god love ubermensch ascetic ocean aversion transvaluation insofar merciful. Hope superiority hope god sexuality endless suicide overcome play decrepit christian convictions joy marvelous.', 'blackpanther.jpg', 50, 'movie@bigevents.com', 123456789, 'Bioscoop', 'Neubaugasse 17', '1060 Wien', 'www.movies.com', 3),
(9, 'Amazing Music Event', '2018-03-18 10:00:00', '2018-03-20 20:00:00', 'Ultimate self salvation depths superiority self. Spirit derive ideal ideal virtues deceptions mountains.\r\nLaw justice merciful right gains victorious philosophy joy. Endless virtues transvaluation ultimate overcome. Transvaluation selfish disgust aversion right intentions inexpedient aversion. Noble suicide battle play reason christianity against faithful will. Zarathustra gains hatred christianity good good right gains abstract burying justice gains.', 'music.jpg', 250, 'event@bigevents.com', 123456789, 'Arena', 'Schulgasse 22', '1180 Wien', 'www.music-event.com', 1),
(10, 'Amazing Music Event', '2018-03-18 10:00:00', '2018-03-20 20:00:00', 'Ultimate self salvation depths superiority self. Spirit derive ideal ideal virtues deceptions mountains.\r\nLaw justice merciful right gains victorious philosophy joy. Endless virtues transvaluation ultimate overcome. Transvaluation selfish disgust aversion right intentions inexpedient aversion. Noble suicide battle play reason christianity against faithful will. Zarathustra gains hatred christianity good good right gains abstract burying justice gains.', 'music.jpg', 250, 'event@bigevents.com', 123456789, 'Arena', 'Schulgasse 22', '1180 Wien', 'www.music-event.com', 1),
(11, 'Challenging Theatre Event', '2018-03-29 12:00:00', '2018-03-29 16:00:00', 'Ultimate enlightenment philosophy faithful salvation free insofar mountains society decieve. Christianity ascetic ideal evil ultimate morality aversion dead christianity. Chaos hatred oneself superiority spirit derive merciful. Free noble love passion contradict gains decieve. Marvelous decrepit christian snare spirit christianity against ascetic ocean disgust good.\r\n\r\nUltimate reason god love ubermensch ascetic ocean aversion transvaluation insofar merciful. Hope superiority hope god sexuality endless suicide overcome play decrepit christian convictions joy marvelous.', 'theater.jpg', 50, 'movie@bigevents.com', 123456789, 'Burg', 'Nussdorfer Str. 34', '1190 Wien', 'www.movies.com', 4),
(12, 'Awesome Movie Event', '2018-03-29 12:00:00', '2018-03-29 16:00:00', 'Ultimate enlightenment philosophy faithful salvation free insofar mountains society decieve. Christianity ascetic ideal evil ultimate morality aversion dead christianity. Chaos hatred oneself superiority spirit derive merciful. Free noble love passion contradict gains decieve. Marvelous decrepit christian snare spirit christianity against ascetic ocean disgust good.\r\n\r\nUltimate reason god love ubermensch ascetic ocean aversion transvaluation insofar merciful. Hope superiority hope god sexuality endless suicide overcome play decrepit christian convictions joy marvelous.', 'blackpanther.jpg', 50, 'movie@bigevents.com', 123456789, 'Bioscoop', 'Neubaugasse 17', '1060 Wien', 'www.movies.com', 3),
(13, 'bla bla', '2018-03-15 12:00:00', '2018-03-15 14:00:00', 'lorem ipsum', 'logo.png', 0, 'me@me.com', 123456, 'home', 'home 123', 'vienna ', 'www.home.com', 0);

-- --------------------------------------------------------

--
-- Table structure for table `eventtype`
--

CREATE TABLE `eventtype` (
  `eventTypeId` int(11) NOT NULL,
  `eventType` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- RELATIONSHIPS FOR TABLE `eventtype`:
--

--
-- Dumping data for table `eventtype`
--

INSERT INTO `eventtype` (`eventTypeId`, `eventType`) VALUES
(1, 'music'),
(2, 'sport'),
(3, 'movie'),
(4, 'theater');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `userId` int(11) NOT NULL,
  `userName` varchar(30) NOT NULL,
  `Surname` varchar(255) NOT NULL,
  `userEmail` varchar(60) NOT NULL,
  `userPass` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- RELATIONSHIPS FOR TABLE `users`:
--

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`userId`, `userName`, `Surname`, `userEmail`, `userPass`) VALUES
(14, 'zz', 'top', 'zz@top.com', '8d969eef6ecad3c29a3a629280e686cf0c3f5d5a86aff3ca12020c923adc6c92');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `eventtype`
--
ALTER TABLE `eventtype`
  ADD PRIMARY KEY (`eventTypeId`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`userId`),
  ADD UNIQUE KEY `userEmail` (`userEmail`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `eventtype`
--
ALTER TABLE `eventtype`
  MODIFY `eventTypeId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `userId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
