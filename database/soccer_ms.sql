-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Nov 07, 2022 at 07:23 PM
-- Server version: 5.7.34
-- PHP Version: 7.4.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `soccer_ms`
--

-- --------------------------------------------------------

--
-- Table structure for table `bookings`
--

CREATE TABLE `bookings` (
  `id` int(11) NOT NULL,
  `st_id` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `slot_id` int(11) NOT NULL,
  `owner_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `bookings`
--

INSERT INTO `bookings` (`id`, `st_id`, `userid`, `slot_id`, `owner_id`) VALUES
(11, 12, 1, 10, 1),
(13, 12, 2, 13, 1),
(21, 12, 1, 11, 1);

-- --------------------------------------------------------

--
-- Table structure for table `chat`
--

CREATE TABLE `chat` (
  `id` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `owner_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `chat`
--

INSERT INTO `chat` (`id`, `userid`, `owner_id`) VALUES
(2, 1, 1),
(3, 2, 1);

-- --------------------------------------------------------

--
-- Table structure for table `chat_message`
--

CREATE TABLE `chat_message` (
  `chat_message_id` int(11) NOT NULL,
  `to_user_id` int(11) NOT NULL,
  `from_user_id` int(11) NOT NULL,
  `chat_message` text NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` int(1) NOT NULL,
  `chatbox` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `chat_message`
--

INSERT INTO `chat_message` (`chat_message_id`, `to_user_id`, `from_user_id`, `chat_message`, `timestamp`, `status`, `chatbox`) VALUES
(1, 1, 1, 'Hi', '2022-09-19 18:56:15', 0, 2),
(2, 1, 1, 'Hi', '2022-09-19 18:56:34', 1, 2),
(3, 1, 1, 'Hi', '2022-09-19 19:03:05', 0, 2),
(4, 1, 1, 'Hi', '2022-09-19 19:03:11', 1, 2),
(5, 1, 1, 'Hi', '2022-09-19 19:03:29', 0, 2),
(6, 1, 1, 'Hi', '2022-09-20 08:07:02', 0, 2),
(7, 1, 1, 'Hi', '2022-09-20 08:26:05', 0, 2),
(8, 1, 1, 'Hi', '2022-09-20 10:20:00', 0, 2),
(9, 1, 1, 'Hi', '2022-09-20 10:20:16', 0, 2),
(12, 1, 1, 'Hi', '2022-10-06 10:04:03', 0, 2),
(26, 2, 1, 'yes', '2022-11-07 19:23:06', 1, 3);

-- --------------------------------------------------------

--
-- Table structure for table `renting_slots`
--

CREATE TABLE `renting_slots` (
  `id` int(11) NOT NULL,
  `st_id` int(11) NOT NULL,
  `s_from` varchar(200) NOT NULL,
  `s_to` varchar(255) NOT NULL,
  `s_date` varchar(255) NOT NULL,
  `s_status` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `renting_slots`
--

INSERT INTO `renting_slots` (`id`, `st_id`, `s_from`, `s_to`, `s_date`, `s_status`) VALUES
(1, 11, '01:00', '04:00', '11/11/2022', 0),
(3, 11, '05:00', '07:00', '11/11/2022', 0),
(4, 11, '08:00', '09:00', '11/11/2022', 0),
(10, 12, '01:00', '02:00', '11/12/2022', 1),
(11, 12, '02:00', '03:00', '11/11/2022', 1),
(12, 12, '03:00', '04:00', '11/11/2022', 0),
(13, 12, '05:00', '06:00', '11/11/2022', 1),
(14, 11, '02:00', '03:00', '11/12/2022', 0),
(15, 11, '04:00', '05:00', '11/12/2022', 0),
(16, 11, '08:00', '10:00', '11/12/2022', 0);

-- --------------------------------------------------------

--
-- Table structure for table `stadiums`
--

CREATE TABLE `stadiums` (
  `id` int(11) NOT NULL,
  `owner_id` int(11) NOT NULL,
  `st_name` varchar(200) NOT NULL,
  `st_location` varchar(255) NOT NULL,
  `st_facilities` varchar(255) NOT NULL,
  `st_desc` longtext NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `booked_times` int(11) DEFAULT '0',
  `cancelled_times` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `stadiums`
--

INSERT INTO `stadiums` (`id`, `owner_id`, `st_name`, `st_location`, `st_facilities`, `st_desc`, `created_at`, `booked_times`, `cancelled_times`) VALUES
(11, 1, 'Stadium 1', 'DC 1202, Near street 2, Saudia', 'Facilities 1, Facilities 2, Facilities 3', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry standard dummy text ever since the 1500s', '2022-11-01 18:44:57', 0, 6);

-- --------------------------------------------------------

--
-- Table structure for table `st_images`
--

CREATE TABLE `st_images` (
  `id` int(11) NOT NULL,
  `st_id` int(11) NOT NULL,
  `st_image` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `st_images`
--

INSERT INTO `st_images` (`id`, `st_id`, `st_image`) VALUES
(10, 11, 'the-ball-stadion-football-the-pitch-47730.jpeg'),
(11, 11, 'the-ball-stadion-football-the-pitch-47730.jpeg'),
(12, 11, 'the-ball-stadion-football-the-pitch-47730.jpeg'),
(13, 11, 'the-ball-stadion-football-the-pitch-47730.jpeg'),
(14, 12, 'the-ball-stadion-football-the-pitch-47730.jpeg'),
(15, 12, 'the-ball-stadion-football-the-pitch-47730.jpeg');

-- --------------------------------------------------------

--
-- Table structure for table `st_own`
--

CREATE TABLE `st_own` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(200) NOT NULL,
  `pass` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `st_own`
--

INSERT INTO `st_own` (`id`, `username`, `email`, `pass`) VALUES
(1, 'Stadium Owner', 'st_own@gmail.com', 'owner123');

-- --------------------------------------------------------

--
-- Table structure for table `user_login`
--

CREATE TABLE `user_login` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(200) NOT NULL,
  `pass` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user_login`
--

INSERT INTO `user_login` (`id`, `username`, `email`, `pass`) VALUES
(1, 'user 1', 'user1@gmail.com', 'user123'),
(2, 'user 2', 'user2@gmail.com', 'user123');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bookings`
--
ALTER TABLE `bookings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `chat`
--
ALTER TABLE `chat`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `chat_message`
--
ALTER TABLE `chat_message`
  ADD PRIMARY KEY (`chat_message_id`);

--
-- Indexes for table `renting_slots`
--
ALTER TABLE `renting_slots`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `stadiums`
--
ALTER TABLE `stadiums`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `st_images`
--
ALTER TABLE `st_images`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `st_own`
--
ALTER TABLE `st_own`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_login`
--
ALTER TABLE `user_login`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bookings`
--
ALTER TABLE `bookings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `chat`
--
ALTER TABLE `chat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `chat_message`
--
ALTER TABLE `chat_message`
  MODIFY `chat_message_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `renting_slots`
--
ALTER TABLE `renting_slots`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `stadiums`
--
ALTER TABLE `stadiums`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `st_images`
--
ALTER TABLE `st_images`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `st_own`
--
ALTER TABLE `st_own`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `user_login`
--
ALTER TABLE `user_login`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
