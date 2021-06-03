-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 03, 2021 at 11:19 AM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 7.4.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `vanja_hotel`
--

-- --------------------------------------------------------

--
-- Table structure for table `administrator`
--

CREATE TABLE `administrator` (
  `admin_id` int(11) NOT NULL,
  `user_name` varchar(32) NOT NULL,
  `user_password` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `administrator`
--

INSERT INTO `administrator` (`admin_id`, `user_name`, `user_password`) VALUES
(1, 'sandip.silwal', '5ebe2294ecd0e0f08eab7690d2a6ee69'),
(2, 'anilsingh', '5ebe2294ecd0e0f08eab7690d2a6ee69'),
(3, 'radha', '5ebe2294ecd0e0f08eab7690d2a6ee69');

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

CREATE TABLE `contacts` (
  `contacts_id` int(11) NOT NULL,
  `name` varchar(32) NOT NULL,
  `email` varchar(32) NOT NULL,
  `telephone` varchar(16) NOT NULL,
  `comments` text NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `cid` int(11) NOT NULL,
  `f_name` varchar(28) NOT NULL,
  `m_name` varchar(28) NOT NULL,
  `l_name` varchar(28) NOT NULL,
  `address` varchar(64) NOT NULL,
  `email` varchar(32) NOT NULL,
  `contact` varchar(15) NOT NULL,
  `gender` varchar(7) NOT NULL,
  `country` varchar(32) NOT NULL,
  `user_name` varchar(64) NOT NULL,
  `password` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`cid`, `f_name`, `m_name`, `l_name`, `address`, `email`, `contact`, `gender`, `country`, `user_name`, `password`) VALUES
(1, 'sandip', '', 'silwal', 'Gongabu, Kathmandu, Nepal', 'sandip.silwal.ss@gmail.com', '9843180434', 'male', 'nepal', 'sandip.silwal', '5ebe2294ecd0e0f08eab7690d2a6ee69'),
(2, 'Ram', '', 'Thapa', 'Dhading', 'ram@gmail.com', '9843180434', 'male', 'china', 'ramthapa', '5ebe2294ecd0e0f08eab7690d2a6ee69'),
(3, 'hari', '', 'rana', 'kalanki', 'hari@gmail.com', '9843180434', 'male', 'nepal', 'hari', 'a152e841783914146e4bcd4f39100686');

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE `events` (
  `event_id` int(11) NOT NULL,
  `event_name` varchar(32) NOT NULL,
  `organizer` varchar(64) NOT NULL,
  `place` varchar(64) NOT NULL,
  `time` varchar(8) NOT NULL,
  `date` date NOT NULL,
  `ticket` varchar(64) NOT NULL,
  `rate` varchar(8) NOT NULL,
  `room_no` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`event_id`, `event_name`, `organizer`, `place`, `time`, `date`, `ticket`, `rate`, `room_no`) VALUES
(1, 'Concert', 'Vanja hotel', 'Vanja hotel', '15:00', '2019-02-20', 'Free', '', 102);

-- --------------------------------------------------------

--
-- Table structure for table `facilities`
--

CREATE TABLE `facilities` (
  `facility_id` int(11) NOT NULL,
  `facility_image` varchar(128) NOT NULL,
  `facility_name` varchar(32) NOT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `facilities`
--

INSERT INTO `facilities` (`facility_id`, `facility_image`, `facility_name`, `description`) VALUES
(1, '10811058original.jpg', 'Spa', 'We have best Spa facility'),
(2, '10171060cq5dam.thumbnail.300.164 (7).png', 'Transportation', 'We have the best transportation facility'),
(3, '1081SpecialEventSlider-1500px562-Sylvee01.jpg', 'This is second facility', 'this is the second facility of our hotel'),
(4, '1048events-management-3.jpg', 'this is third facility', 'this is third facility of our hotel'),
(5, '1019Free-Event-Concert-Slide-5abb280d34.jpg', 'this is fourth facility', 'this is the fourth faccility of our hotel');

-- --------------------------------------------------------

--
-- Table structure for table `receptionist`
--

CREATE TABLE `receptionist` (
  `rid` int(11) NOT NULL,
  `f_name` varchar(28) NOT NULL,
  `m_name` varchar(28) NOT NULL,
  `l_name` varchar(28) NOT NULL,
  `address` varchar(64) NOT NULL,
  `email` varchar(32) NOT NULL,
  `contact` varchar(16) NOT NULL,
  `gender` varchar(7) NOT NULL,
  `country` varchar(32) NOT NULL,
  `user_name` varchar(32) NOT NULL,
  `user_password` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `receptionist`
--

INSERT INTO `receptionist` (`rid`, `f_name`, `m_name`, `l_name`, `address`, `email`, `contact`, `gender`, `country`, `user_name`, `user_password`) VALUES
(1, 'sandip', '', 'silwal', 'Gongabu,Kathmandu,Nepal', 'sandip.silwal.ss@gmail.com', '9843180434', 'male', 'nepal', 'sandip.silwal', '5ebe2294ecd0e0f08eab7690d2a6ee69'),
(2, 'krishna', '', 'silwal', 'kathmandu', 'krishna@hotmail.com', '9843180434', 'male', 'nepal', 'krishna.silwal', '5ebe2294ecd0e0f08eab7690d2a6ee69');

-- --------------------------------------------------------

--
-- Table structure for table `rooms`
--

CREATE TABLE `rooms` (
  `room_id` int(11) NOT NULL,
  `room_name` varchar(32) NOT NULL,
  `room_image` varchar(128) NOT NULL,
  `room_number` int(11) NOT NULL,
  `room_capacity` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `description` text NOT NULL,
  `status` varchar(10) NOT NULL,
  `type_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rooms`
--

INSERT INTO `rooms` (`room_id`, `room_name`, `room_image`, `room_number`, `room_capacity`, `price`, `description`, `status`, `type_id`) VALUES
(1, 'Cat Room', '10711021tfss-3d87e450-bd33-483c-9550-764ab0a8c96b-Image_800.jpeg', 101, 1, 500, 'This is a Single room', 'booked', 9),
(2, 'Dog Room', '10241094executive-room-at-holiday-inn-express-hotel-and-suites-boston-garden.jpg', 102, 2, 800, 'This is Double Room', 'reserved', 10),
(3, 'Horse Room', '10181086deluxe-room-12.jpg', 103, 1, 2000, 'This is King Size Room', 'available', 11),
(4, 'Cow Room', '11001096superior-room.jpg', 104, 2, 1500, 'This is Queen Room', 'available', 12);

-- --------------------------------------------------------

--
-- Table structure for table `room_booking`
--

CREATE TABLE `room_booking` (
  `booking_id` int(11) NOT NULL,
  `in_date` date NOT NULL,
  `out_date` date NOT NULL,
  `adults` int(11) NOT NULL,
  `childrens` int(11) NOT NULL,
  `booked_time` date NOT NULL,
  `costumer_id` int(11) NOT NULL,
  `room_id` int(11) NOT NULL,
  `totals` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `room_booking`
--

INSERT INTO `room_booking` (`booking_id`, `in_date`, `out_date`, `adults`, `childrens`, `booked_time`, `costumer_id`, `room_id`, `totals`) VALUES
(11, '2021-06-03', '2021-08-26', 1, 0, '2021-06-03', 2, 101, 1),
(12, '2021-07-16', '2021-09-30', 1, 1, '2021-06-03', 2, 102, 2);

-- --------------------------------------------------------

--
-- Table structure for table `room_type`
--

CREATE TABLE `room_type` (
  `type_id` int(11) NOT NULL,
  `type_image` varchar(128) NOT NULL,
  `type_name` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `room_type`
--

INSERT INTO `room_type` (`type_id`, `type_image`, `type_name`) VALUES
(9, '10911023superior_room_yeatman_test_93680340558c7dcc660442.jpg', 'Single'),
(10, '10051050standard-double-queen-room--v9162.jpg', 'Double'),
(11, '103010511.jpg', 'King'),
(12, '10041043pari chambre.jpg', 'Queen');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `administrator`
--
ALTER TABLE `administrator`
  ADD PRIMARY KEY (`admin_id`),
  ADD UNIQUE KEY `user_name` (`user_name`);

--
-- Indexes for table `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`contacts_id`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`cid`),
  ADD UNIQUE KEY `user_name` (`user_name`);

--
-- Indexes for table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`event_id`);

--
-- Indexes for table `facilities`
--
ALTER TABLE `facilities`
  ADD PRIMARY KEY (`facility_id`);

--
-- Indexes for table `receptionist`
--
ALTER TABLE `receptionist`
  ADD PRIMARY KEY (`rid`),
  ADD UNIQUE KEY `user_name` (`user_name`);

--
-- Indexes for table `rooms`
--
ALTER TABLE `rooms`
  ADD PRIMARY KEY (`room_id`);

--
-- Indexes for table `room_booking`
--
ALTER TABLE `room_booking`
  ADD PRIMARY KEY (`booking_id`);

--
-- Indexes for table `room_type`
--
ALTER TABLE `room_type`
  ADD PRIMARY KEY (`type_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `administrator`
--
ALTER TABLE `administrator`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `contacts`
--
ALTER TABLE `contacts`
  MODIFY `contacts_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `cid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `event_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `facilities`
--
ALTER TABLE `facilities`
  MODIFY `facility_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `receptionist`
--
ALTER TABLE `receptionist`
  MODIFY `rid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `rooms`
--
ALTER TABLE `rooms`
  MODIFY `room_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `room_booking`
--
ALTER TABLE `room_booking`
  MODIFY `booking_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `room_type`
--
ALTER TABLE `room_type`
  MODIFY `type_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
