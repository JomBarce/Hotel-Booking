-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 30, 2021 at 05:42 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hotel_booking_user`
--

-- --------------------------------------------------------

--
-- Table structure for table `filter`
--

CREATE TABLE `filter` (
  `id` bigint(11) NOT NULL,
  `hotelid` bigint(11) NOT NULL,
  `cancellation` int(11) NOT NULL,
  `prepayment` int(11) NOT NULL,
  `creditcard` int(11) NOT NULL,
  `pool` int(11) NOT NULL,
  `wifi` int(11) NOT NULL,
  `aircon` int(11) NOT NULL,
  `spa` int(11) NOT NULL,
  `breakfast` int(11) NOT NULL,
  `pet` int(11) NOT NULL,
  `beach` int(11) NOT NULL,
  `restaurant` int(11) NOT NULL,
  `gym` int(11) NOT NULL,
  `wheelchair` int(11) NOT NULL,
  `dfacilities` int(11) NOT NULL,
  `timemodified` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `filter`
--

INSERT INTO `filter` (`id`, `hotelid`, `cancellation`, `prepayment`, `creditcard`, `pool`, `wifi`, `aircon`, `spa`, `breakfast`, `pet`, `beach`, `restaurant`, `gym`, `wheelchair`, `dfacilities`, `timemodified`) VALUES
(1, 1, 0, 1, 1, 1, 1, 1, 1, 1, 0, 0, 1, 1, 1, 1, '2021-05-21 18:04:23'),
(2, 2, 0, 0, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, '2021-05-19 17:51:27'),
(3, 3, 1, 0, 1, 1, 1, 1, 1, 1, 0, 1, 1, 1, 1, 1, '2021-05-19 18:27:24'),
(4, 4, 1, 1, 0, 1, 1, 1, 1, 1, 0, 0, 1, 1, 1, 1, '2021-05-21 18:05:23'),
(5, 5, 1, 0, 0, 1, 1, 1, 0, 1, 1, 1, 1, 1, 1, 1, '2021-05-29 07:29:49'),
(6, 6, 1, 0, 1, 1, 1, 1, 0, 1, 0, 0, 1, 1, 1, 1, '2021-05-29 07:34:17'),
(7, 7, 1, 0, 1, 1, 1, 0, 0, 1, 0, 0, 1, 1, 1, 1, '2021-05-29 07:39:01'),
(8, 8, 0, 0, 1, 1, 1, 1, 1, 1, 0, 0, 1, 1, 1, 1, '2021-05-29 07:40:32'),
(9, 9, 1, 0, 1, 1, 1, 1, 1, 1, 0, 0, 1, 0, 1, 1, '2021-05-29 07:41:43'),
(10, 10, 1, 0, 1, 1, 1, 1, 0, 1, 0, 0, 1, 1, 1, 1, '2021-05-29 07:42:48');

-- --------------------------------------------------------

--
-- Table structure for table `hotels`
--

CREATE TABLE `hotels` (
  `id` bigint(11) NOT NULL,
  `hname` varchar(50) NOT NULL,
  `address` varchar(100) NOT NULL,
  `city` varchar(100) NOT NULL,
  `pcode` int(11) NOT NULL,
  `country` varchar(100) NOT NULL,
  `pnumber` varchar(50) NOT NULL,
  `review` float NOT NULL,
  `price` float NOT NULL,
  `class` int(1) NOT NULL,
  `mainphoto` varchar(255) NOT NULL,
  `photo1` varchar(255) NOT NULL,
  `photo2` varchar(255) NOT NULL,
  `photo3` varchar(255) NOT NULL,
  `photo4` varchar(255) NOT NULL,
  `timemodified` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `hotels`
--

INSERT INTO `hotels` (`id`, `hname`, `address`, `city`, `pcode`, `country`, `pnumber`, `review`, `price`, `class`, `mainphoto`, `photo1`, `photo2`, `photo3`, `photo4`, `timemodified`) VALUES
(1, 'Radisson Blu Cebu', 'Serging Osmena Boulevard, Corner Juan Luna Avenue', 'Cebu City', 6000, 'Philippines', '(032) 505-1700', 9, 5000, 5, 'radisson.jpg', 'rblu1.jpg', 'rblu2.jpg', 'rblu3.jpg', 'rblu4.jpg', '2021-05-19 17:09:02'),
(2, 'Shangri-La Mactan', 'Punta Engaño Rd', 'Lapu-Lapu City', 6015, 'Philippines', '(032) 231-0288', 9.2, 10000, 5, 'shangri-la.jpg', 'shang1.jpg', 'shang2.jpg', 'shang3.jpg', 'shang4.jpg', '2021-05-19 17:08:50'),
(3, 'Sofitel Philippine Plaza Manila', 'Ccp Complex, Roxas Blvd', 'Pasay City', 1300, 'Philippines', '(02) 8573-5555', 9, 7000, 5, 'sofitel.jpg', 'soft1.jpg', 'soft2.jpg', 'soft3.jpg', 'soft4.jpg', '2021-05-19 17:08:29'),
(4, 'Marina Bay Sands', '10 Bayfront Ave', 'Downtown Core', 18956, 'Singapore', '+65 6688-8868', 9, 16500, 5, 'marinabay.jpg', 'marina1.jpg', 'marina2.jpg', 'marina3.jpg', 'marina4.jpg', '2021-05-28 11:18:41'),
(5, 'Bayview Beach Resort', 'Batu Ferringhi Beach, Batu Ferringhi, Pulau Pinang', 'George Town', 11100, 'Malaysia', '+60 4-886 1111', 8.4, 5000, 4, 'bayview0.jpg', 'bayview1.jpg', 'bayview2.jpg', 'bayview3.jpg', 'bayview4.jpg', '2021-05-29 07:14:53'),
(6, 'Seda Central Bloc Cebu Staycation Hotel', 'V. Padriga Street', 'Cebu City', 6000, 'Philippines', '(032) 410 8899', 9.3, 5300, 4, 'seda0.jpg', 'seda1.jpg', 'seda2.jpg', 'seda3.jpg', 'seda4.jpg', '2021-05-29 07:34:17'),
(7, 'Savoy Hotel Mactan Newtown', 'The Mactan Newtown, Newtown Blvd', 'Lapu-Lapu City', 6015, 'Philippines', '(032) 494 4000', 8.2, 3400, 4, 'savoy0.jpg', 'savoy1.jpg', 'savoy2.jpg', 'savoy3.jpg', 'savoy4.jpg', '2021-05-29 07:39:01'),
(8, 'Bangkok Marriott Hotel The Surawongse', '262 Thanon Surawong, Si Phraya, Bang Rak', 'Bangkok', 10500, 'Thailand', '+66 2 088 5666', 9.2, 5000, 5, 'marriott0.jpg', 'marriott1.jpg', 'marriott2.jpg', 'marriott3.jpg', 'marriott4.jpg', '2021-05-29 07:40:32'),
(9, 'Evergreen Place Siam by UHG', '318 Phayathai Rd, Thanon Phetchaburi, Ratchathewi', 'Bangkok', 10400, 'Thailand', '+66 2 219 1111', 8.4, 2000, 4, 'evergreen0.jpg', 'evergreen1.jpg', 'evergreen2.jpg', 'evergreen3.jpg', 'evergreen4.jpg', '2021-05-29 07:41:43'),
(10, 'Somerset Berlian Jakarta', 'Jl. Permata Berlian V, Permata Hijau', 'Jakarta', 12210, 'Indonesia', '+62 21 53668888', 8.2, 4000, 4, 'somerset0.jpg', 'somerset1.jpg', 'somerset2.jpg', 'somerset3.jpg', 'somerset4.jpg', '2021-05-29 07:42:48');

-- --------------------------------------------------------

--
-- Table structure for table `rooms`
--

CREATE TABLE `rooms` (
  `id` bigint(11) NOT NULL,
  `hotelid` bigint(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `price` bigint(11) NOT NULL,
  `accomodation` int(11) NOT NULL,
  `child` int(11) NOT NULL,
  `nbed` int(11) NOT NULL,
  `tbed` varchar(50) NOT NULL,
  `bathroom` int(11) NOT NULL,
  `kitchen` int(11) NOT NULL,
  `balcony` int(11) NOT NULL,
  `view` int(11) NOT NULL,
  `service` int(11) NOT NULL,
  `sound` int(11) NOT NULL,
  `rphoto` varchar(255) NOT NULL,
  `timemodified` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `rooms`
--

INSERT INTO `rooms` (`id`, `hotelid`, `name`, `price`, `accomodation`, `child`, `nbed`, `tbed`, `bathroom`, `kitchen`, `balcony`, `view`, `service`, `sound`, `rphoto`, `timemodified`) VALUES
(1, 1, 'Deluxe Room', 5000, 2, 1, 1, 'King Bed', 1, 1, 0, 3, 1, 1, 'deluxe.jpg', '2021-05-29 05:49:17'),
(2, 1, 'Junior Suite', 7500, 2, 2, 1, 'King Bed', 1, 1, 0, 2, 1, 0, 'junior.jpg', '2021-05-29 05:49:32'),
(3, 1, 'Superior Room', 8000, 3, 0, 1, 'King Bed', 1, 1, 0, 1, 1, 1, 'superior.jpg', '2021-05-29 05:49:50'),
(4, 1, 'Executive Room', 11000, 2, 1, 1, 'King Bed', 1, 1, 0, 1, 1, 0, 'executive.jpg', '2021-05-29 05:50:09'),
(5, 1, 'Business Class Room', 9000, 2, 0, 1, 'King Bed', 1, 1, 0, 3, 1, 1, 'businessclass.jpg', '2021-05-29 05:50:24'),
(6, 2, 'Main Wing Deluxe Room', 10000, 2, 2, 1, 'King Bed', 1, 1, 1, 6, 1, 0, 'shangR1.jpg', '2021-05-29 06:01:31'),
(7, 2, 'Main Wing Deluxe Twin Room', 10000, 2, 2, 2, 'Single Bed', 1, 1, 1, 6, 1, 0, 'shangR2.jpg', '2021-05-29 06:02:22'),
(8, 2, 'Deluxe Sea View Double Room', 12000, 2, 2, 1, 'King Bed', 1, 1, 1, 1, 1, 0, 'shangR3.jpg', '2021-05-29 06:08:54'),
(9, 2, 'Deluxe Sea View Twin Room', 12000, 2, 2, 2, 'Single Bed', 1, 1, 1, 1, 1, 0, 'shangR4.jpg', '2021-05-29 06:09:02'),
(10, 2, 'Main Wing Deluxe Family Room', 16000, 2, 4, 2, 'King Bed', 1, 1, 1, 1, 1, 0, 'shangR5.jpg', '2021-05-29 06:09:12'),
(11, 3, 'Superior King Room', 6500, 2, 0, 1, 'King Bed', 1, 0, 1, 4, 1, 0, 'sofitelR1.jpg', '2021-05-29 06:41:51'),
(12, 3, 'Superior Twin Room', 6500, 2, 0, 2, 'Single Bed', 1, 0, 1, 2, 1, 0, 'sofitelR2.jpg', '2021-05-29 06:42:03'),
(13, 3, 'King Suite', 6500, 2, 1, 1, 'King Bed', 1, 1, 1, 4, 1, 1, 'sofitelR3.jpg', '2021-05-29 06:43:32'),
(14, 4, 'Deluxe King Room', 15000, 2, 1, 1, 'King Bed', 1, 1, 1, 2, 1, 1, 'marinaR1.jpg', '2021-05-29 06:59:45'),
(15, 4, 'Deluxe Twin Room', 15000, 2, 2, 2, 'Single Bed', 1, 1, 1, 2, 1, 1, 'marinaR2.jpg', '2021-05-29 06:59:45'),
(16, 4, 'Premier King Room', 18000, 2, 1, 1, 'King Bed', 1, 1, 1, 6, 1, 1, 'marinaR3.jpg', '2021-05-29 07:00:04'),
(17, 4, 'Premier Twin Room', 18000, 2, 2, 2, 'Single Bed', 1, 1, 1, 6, 1, 1, 'marinaR4.jpg', '2021-05-29 07:00:05'),
(18, 4, 'Orchid Suite', 32000, 2, 2, 1, 'King Bed', 1, 1, 1, 6, 1, 1, 'marinaR5.jpg', '2021-05-29 07:00:05'),
(19, 5, 'Superior Double Room', 3000, 2, 2, 1, 'King Bed', 1, 0, 1, 3, 1, 0, 'bayviewR1.jpg', '2021-05-29 07:32:34'),
(20, 5, 'Superior Twin Room', 3000, 2, 2, 2, 'Single Bed', 1, 0, 1, 3, 1, 0, 'bayviewR2.jpg', '2021-05-29 07:32:34'),
(21, 5, 'Grand Deluxe Room', 5000, 2, 2, 1, 'King Bed', 1, 1, 1, 1, 1, 0, 'bayviewR3.jpg', '2021-05-29 07:32:34'),
(22, 5, 'Executive Suite', 12000, 2, 2, 1, 'King Bed', 1, 1, 1, 1, 1, 1, 'bayviewR4.jpg', '2021-05-29 07:32:34'),
(23, 5, 'Family Suite', 8000, 4, 4, 4, 'Single Bed', 1, 0, 1, 1, 1, 1, 'bayviewR5.jpg', '2021-05-29 07:32:34'),
(24, 6, 'Deluxe Double Room', 5300, 2, 2, 1, 'King Bed', 1, 0, 0, 2, 1, 0, 'room6-1.jpg', '2021-05-29 07:34:17'),
(25, 6, 'Deluxe Twin Room', 5300, 2, 2, 2, 'Single Bed', 1, 0, 0, 2, 1, 0, 'room6-2.jpg', '2021-05-29 07:34:17'),
(26, 6, 'Studio Room', 5800, 2, 2, 2, 'Single Bed', 1, 1, 0, 2, 1, 0, 'room6-3.jpg', '2021-05-29 07:34:17'),
(27, 7, 'Deluxe Twin Room', 3400, 1, 0, 1, 'Single Bed', 1, 0, 0, 2, 1, 0, 'room7-1.jpg', '2021-05-29 07:38:20'),
(28, 7, 'Deluxe Premiere Room', 5000, 2, 2, 1, 'King Bed', 1, 0, 0, 2, 1, 0, 'room7-2.jpg', '2021-05-29 07:39:01'),
(29, 7, 'Junior Suite Room', 6200, 2, 2, 1, 'King Bed', 1, 0, 0, 2, 1, 0, 'room7-3.jpg', '2021-05-29 07:39:01'),
(30, 8, 'One-Bedroom Residential Suite', 5000, 2, 2, 1, 'King Bed', 1, 0, 0, 2, 1, 1, 'room8-1.jpg', '2021-05-29 07:40:32'),
(31, 8, 'Two-Bedroom Residential Suite', 6000, 4, 2, 2, 'Single Bed', 1, 1, 0, 2, 1, 1, 'room8-2.jpg', '2021-05-29 07:40:32'),
(32, 9, 'Two-Bedroom Family Suites', 2000, 4, 4, 1, 'King Bed & Single Bed', 1, 1, 1, 2, 1, 1, 'room9-1.jpg', '2021-05-29 07:41:43'),
(33, 9, 'Standard Double Room', 1000, 2, 2, 1, 'King Bed', 1, 0, 0, 2, 1, 1, 'room9-2.jpg', '2021-05-29 07:41:43'),
(34, 9, 'Superior Double Room', 1200, 2, 2, 1, 'King Bed', 1, 0, 1, 2, 0, 1, 'room9-3.jpg', '2021-05-29 07:41:43'),
(35, 10, 'Three Bedroom Deluxe', 4000, 4, 4, 1, 'King Bed, Queen Bed, & Single Bed', 1, 1, 0, 4, 1, 1, 'room10-1.jpg', '2021-05-29 07:42:48'),
(36, 10, 'Two Bedroom Deluxe', 4000, 3, 3, 1, 'King Bed & Queen Bed', 1, 0, 0, 4, 0, 1, 'room10-1.jpg', '2021-05-29 07:42:48');

-- --------------------------------------------------------

--
-- Table structure for table `userbookings`
--

CREATE TABLE `userbookings` (
  `id` bigint(11) NOT NULL,
  `userid` bigint(11) NOT NULL,
  `hotelid` bigint(11) NOT NULL,
  `roomid` bigint(11) NOT NULL,
  `checkin` date NOT NULL,
  `checkout` date NOT NULL,
  `price` bigint(11) NOT NULL,
  `cancel` int(11) NOT NULL,
  `timemodified` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `userbookings`
--

INSERT INTO `userbookings` (`id`, `userid`, `hotelid`, `roomid`, `checkin`, `checkout`, `price`, `cancel`, `timemodified`) VALUES
(1, 1, 4, 18, '2021-06-01', '2021-06-02', 32000, 1, '2021-05-30 15:39:24');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(11) NOT NULL,
  `fname` varchar(50) NOT NULL,
  `lname` varchar(50) NOT NULL,
  `email` varchar(70) NOT NULL,
  `password` varchar(255) NOT NULL,
  `gender` varchar(50) NOT NULL,
  `birthday` date DEFAULT NULL,
  `country` varchar(100) NOT NULL,
  `cellphonenumber` varchar(50) NOT NULL,
  `phonenumber` varchar(50) NOT NULL,
  `recoveryemail` varchar(70) NOT NULL,
  `profilepicture` varchar(255) NOT NULL,
  `timemodified` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `fname`, `lname`, `email`, `password`, `gender`, `birthday`, `country`, `cellphonenumber`, `phonenumber`, `recoveryemail`, `profilepicture`, `timemodified`) VALUES
(1, 'User', 'One', 'user1@email.com', '$2y$10$Nq/OLng5WUh0/tQtAAhhfelmTl6jYD1kJL4jU0CyV8fp.G9Bnr9e.', 'Female', '2000-01-01', 'Philippines', '09123456789', '3401234', 'user1@recoveryemail.com', 'Laika.jpg', '2021-05-30 15:24:40');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `filter`
--
ALTER TABLE `filter`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hotels`
--
ALTER TABLE `hotels`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rooms`
--
ALTER TABLE `rooms`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `userbookings`
--
ALTER TABLE `userbookings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `filter`
--
ALTER TABLE `filter`
  MODIFY `id` bigint(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `hotels`
--
ALTER TABLE `hotels`
  MODIFY `id` bigint(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `rooms`
--
ALTER TABLE `rooms`
  MODIFY `id` bigint(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `userbookings`
--
ALTER TABLE `userbookings`
  MODIFY `id` bigint(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
