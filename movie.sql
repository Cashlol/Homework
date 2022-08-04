-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 20, 2022 at 06:01 AM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `movie`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(11) NOT NULL,
  `admin_name` varchar(230) NOT NULL,
  `admin_email` varchar(230) NOT NULL,
  `admin_pass` varchar(230) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `admin_name`, `admin_email`, `admin_pass`) VALUES
(1, 'admin1234', 'freshpeeks72@gmail.com', 'adminsucks'),
(3, 'admin1234', 'freshpeeks73@gmail.com', 'ilikeadmin'),
(4, 'admin12345', 'freshpeeks74@gmail.com', 'movie');

-- --------------------------------------------------------

--
-- Table structure for table `booking`
--

CREATE TABLE `booking` (
  `booking_id` int(11) NOT NULL,
  `booking_date` date NOT NULL,
  `member_id` int(11) NOT NULL,
  `booking_price` float NOT NULL,
  `mov_id` int(11) NOT NULL,
  `booking_status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `booking`
--

INSERT INTO `booking` (`booking_id`, `booking_date`, `member_id`, `booking_price`, `mov_id`, `booking_status`) VALUES
(143, '2022-04-18', 1, 14.04, 130, 'Confirm'),
(144, '2022-04-18', 27, 28.08, 134, 'Confirm'),
(145, '2022-04-18', 27, 14.04, 130, 'Confirm');

-- --------------------------------------------------------

--
-- Table structure for table `hall`
--

CREATE TABLE `hall` (
  `hall_id` int(11) NOT NULL,
  `hall_no` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `hall`
--

INSERT INTO `hall` (`hall_id`, `hall_no`) VALUES
(51, 1),
(52, 2),
(53, 1),
(54, 2),
(55, 1),
(56, 2);

-- --------------------------------------------------------

--
-- Table structure for table `member`
--

CREATE TABLE `member` (
  `member_id` int(11) NOT NULL,
  `member_name` varchar(200) NOT NULL,
  `member_email` varchar(200) NOT NULL,
  `member_phone` varchar(20) NOT NULL,
  `member_pass` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `member`
--

INSERT INTO `member` (`member_id`, `member_name`, `member_email`, `member_phone`, `member_pass`) VALUES
(5, 'Henry', 'henry@hotmail.com', '01122334455', 'ilikejimin'),
(7, 'Jack', 'jack@gmail.com', '01831831318', 'ihateyourose'),
(12, 'Vinnie', 'vinnie@gmail.com', '014141411241', 'sleepingfishes'),
(13, 'Garry', 'gary@gmail.com', '01313141156', 'ilikemovies'),
(18, 'Luke', 'luke@gmail.com', '012245677', 'moviesarenice'),
(23, 'Eric', 'eric@gmail.com', '000000000000000000', 'ayamsedap'),
(24, 'Bob', 'bob@gmail.com', '012349921414', 'mynameisbob'),
(25, 'Ayam', 'ayam@hotmail.com', '019131031481', 'ayamayam'),
(26, 'Bob', 'bobby@gmail.com', '1413149184114', 'iambob'),
(27, 'Acashhhhh', 'acash@gmail.com', '0129312414515', 'acash');

-- --------------------------------------------------------

--
-- Table structure for table `movies`
--

CREATE TABLE `movies` (
  `mov_id` int(11) NOT NULL,
  `mov_name` varchar(200) NOT NULL,
  `mov_poster` varchar(250) NOT NULL,
  `background` varchar(200) NOT NULL,
  `mov_info` text NOT NULL,
  `mov_trailer` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `movies`
--

INSERT INTO `movies` (`mov_id`, `mov_name`, `mov_poster`, `background`, `mov_info`, `mov_trailer`) VALUES
(130, 'Spiderman Into The Spiderverse', 'https://m.media-amazon.com/images/M/MV5BMjMwNDkxMTgzOF5BMl5BanBnXkFtZTgwNTkwNTQ3NjM@._V1_.jpg', 'https://i.redd.it/d3h7ofnt73621.png', 'After gaining superpowers from a spider bite, Miles Morales protects the city as Spider-Man. Soon, he meets alternate versions of himself and gets embroiled in an epic battle to save the multiverse.', '<iframe width=\"620\" height=\"355\" src=\"https://www.youtube.com/embed/g4Hbz2jLxvQ\" title=\"YouTube video player\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>'),
(131, 'La La Land', 'https://www.goldenglobes.com/sites/default/files/articles/cover_images/2017-la_la_land.jpg', 'https://m.media-amazon.com/images/M/MV5BMGYyNDIyNWEtNTdiYS00Y2JhLThlZDAtMTMxOWZiMzM5OTc5XkEyXkFqcGdeQXVyNDg2MjUxNjM@._V1_.jpg', 'When Sebastian, a pianist, and Mia, an actress, follow their passion and achieve success in their respective fields, they find themselves torn between their love for each other and their careers.', '<iframe width=\"620\" height=\"355\" src=\"https://www.youtube.com/embed/0pdqf4P9MB8\" title=\"YouTube video player\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>'),
(132, 'Avengers Endgame', 'https://m.media-amazon.com/images/M/MV5BMTc5MDE2ODcwNV5BMl5BanBnXkFtZTgwMzI2NzQ2NzM@._V1_.jpg', 'https://images8.alphacoders.com/100/thumb-1920-1003220.png', 'After Thanos, an intergalactic warlord, disintegrates half of the universe, the Avengers must reunite and assemble again to reinvigorate their trounced allies and restore balance.', '<iframe width=\"620\" height=\"355\" src=\"https://www.youtube.com/embed/TcMBFSGVi1c\" title=\"YouTube video player\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>'),
(133, 'Joker', 'https://www.joblo.com/wp-content/uploads/2019/08/joker-poster-main2-1.jpg', 'https://media.wired.com/photos/5db0965e60047600090d3a68/16:9/w_2287,h_1286,c_limit/Culture_jokerstairs_rev-1-JOK-19666_High_Res_JPEG.jpg', 'Arthur Fleck, a party clown, leads an impoverished life with his ailing mother. However, when society shuns him and brands him as a freak, he decides to embrace the life of crime and chaos.', '<iframe width=\"560\" height=\"315\" src=\"https://www.youtube.com/embed/zAGVQLHvwOY\" title=\"YouTube video player\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>'),
(134, 'The Batman', 'https://m.media-amazon.com/images/M/MV5BOGE2NWUwMDItMjA4Yi00N2Y3LWJjMzEtMDJjZTMzZTdlZGE5XkEyXkFqcGdeQXVyODk4OTc3MTY@._V1_.jpg', 'https://images3.alphacoders.com/118/thumb-1920-1185634.jpg', 'Batman ventures into Gotham City\'s underworld when a sadistic killer leaves behind a trail of cryptic clues. ', '<iframe width=\"620\" height=\"355\" src=\"https://www.youtube.com/embed/mqqft2x_Aa4\" title=\"YouTube video player\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>');

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

CREATE TABLE `reviews` (
  `rev_id` int(11) NOT NULL,
  `rev_detail` varchar(200) NOT NULL,
  `rev_score` int(11) NOT NULL,
  `mov_id` int(11) NOT NULL,
  `member_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `reviews`
--

INSERT INTO `reviews` (`rev_id`, `rev_detail`, `rev_score`, `mov_id`, `member_id`) VALUES
(206, 'Spiderman is nice', 1, 130, 27);

-- --------------------------------------------------------

--
-- Table structure for table `seat`
--

CREATE TABLE `seat` (
  `seat_id` int(11) NOT NULL,
  `seat_no` varchar(11) NOT NULL,
  `hall_id` int(11) NOT NULL,
  `seat_status` int(11) NOT NULL,
  `booking_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `seat`
--

INSERT INTO `seat` (`seat_id`, `seat_no`, `hall_id`, `seat_status`, `booking_id`) VALUES
(917, '1B', 51, 0, NULL),
(918, '1C', 51, 0, NULL),
(919, '1D', 51, 0, NULL),
(920, '1E', 51, 0, NULL),
(921, '1F', 51, 0, NULL),
(922, '2A', 51, 0, NULL),
(923, '2B', 51, 0, NULL),
(924, '2C', 51, 0, NULL),
(925, '2D', 51, 0, NULL),
(926, '2E', 51, 0, NULL),
(927, '2F', 51, 0, NULL),
(928, '3A', 51, 0, NULL),
(929, '3B', 51, 0, NULL),
(931, '3D', 51, 0, NULL),
(932, '3E', 51, 0, NULL),
(933, '3F', 51, 0, NULL),
(934, '1A', 52, 0, NULL),
(935, '1B', 52, 0, NULL),
(936, '1C', 52, 0, NULL),
(937, '1D', 52, 0, NULL),
(938, '1E', 52, 0, NULL),
(939, '1F', 52, 0, NULL),
(940, '2A', 52, 0, NULL),
(941, '2B', 52, 1, 143),
(942, '2C', 52, 1, 145),
(943, '2D', 52, 0, NULL),
(944, '2E', 52, 0, NULL),
(945, '2F', 52, 0, NULL),
(946, '3A', 52, 0, NULL),
(947, '3B', 52, 0, NULL),
(948, '3C', 52, 0, NULL),
(949, '3D', 52, 0, NULL),
(950, '3E', 52, 0, NULL),
(951, '3F', 52, 0, NULL),
(953, '1B', 53, 0, NULL),
(954, '1C', 53, 0, NULL),
(955, '1D', 53, 0, NULL),
(956, '1E', 53, 0, NULL),
(957, '1F', 53, 0, NULL),
(958, '2A', 53, 0, NULL),
(960, '2C', 53, 0, NULL),
(961, '2D', 53, 0, NULL),
(962, '2E', 53, 0, NULL),
(963, '2F', 53, 0, NULL),
(965, '3B', 53, 0, NULL),
(966, '3C', 53, 0, NULL),
(967, '3D', 53, 0, NULL),
(968, '3E', 53, 0, NULL),
(969, '3F', 53, 0, NULL),
(970, '1A', 55, 0, NULL),
(971, '1B', 55, 0, NULL),
(972, '1C', 55, 0, NULL),
(973, '1D', 55, 0, NULL),
(974, '1E', 55, 0, NULL),
(975, '1F', 55, 0, NULL),
(976, '2A', 55, 0, NULL),
(977, '2B', 55, 0, NULL),
(978, '2C', 55, 0, NULL),
(979, '2D', 55, 0, NULL),
(980, '2E', 55, 0, NULL),
(981, '2F', 55, 0, NULL),
(982, '3A', 55, 0, NULL),
(983, '3B', 55, 0, NULL),
(984, '3C', 55, 0, NULL),
(985, '3D', 55, 0, NULL),
(986, '3E', 55, 0, NULL),
(987, '3F', 55, 0, NULL),
(988, '1A', 56, 1, 144),
(989, '1B', 56, 0, NULL),
(990, '1C', 56, 0, NULL),
(991, '1D', 56, 0, NULL),
(992, '1E', 56, 0, NULL),
(993, '1F', 56, 0, NULL),
(994, '2A', 56, 0, NULL),
(995, '2B', 56, 0, NULL),
(996, '2C', 56, 1, 144),
(997, '2D', 56, 0, NULL),
(998, '2E', 56, 0, NULL),
(999, '2F', 56, 0, NULL),
(1000, '3A', 56, 0, NULL),
(1001, '3B', 56, 0, NULL),
(1002, '3C', 56, 0, NULL),
(1003, '3D', 56, 0, NULL),
(1004, '3E', 56, 0, NULL),
(1005, '3F', 56, 0, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `showtime`
--

CREATE TABLE `showtime` (
  `showtime_id` int(11) NOT NULL,
  `mov_id` int(11) NOT NULL,
  `show_start` time NOT NULL,
  `show_end` time NOT NULL,
  `hall_id` int(11) NOT NULL,
  `show_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `showtime`
--

INSERT INTO `showtime` (`showtime_id`, `mov_id`, `show_start`, `show_end`, `hall_id`, `show_date`) VALUES
(53, 130, '16:00:00', '18:00:00', 52, '2022-04-15'),
(55, 131, '19:00:00', '21:00:00', 54, '2022-04-18'),
(56, 134, '17:00:00', '19:00:00', 55, '2022-04-18'),
(57, 134, '17:00:00', '19:00:00', 56, '2022-04-18');

-- --------------------------------------------------------

--
-- Table structure for table `wishlist`
--

CREATE TABLE `wishlist` (
  `wishlist_id` int(11) NOT NULL,
  `mov_id` int(11) NOT NULL,
  `member_id` int(11) NOT NULL,
  `check_stat` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `wishlist`
--

INSERT INTO `wishlist` (`wishlist_id`, `mov_id`, `member_id`, `check_stat`) VALUES
(22, 130, 13, 1),
(24, 131, 13, 1),
(27, 130, 27, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `booking`
--
ALTER TABLE `booking`
  ADD PRIMARY KEY (`booking_id`),
  ADD KEY `movid` (`mov_id`);

--
-- Indexes for table `hall`
--
ALTER TABLE `hall`
  ADD PRIMARY KEY (`hall_id`);

--
-- Indexes for table `member`
--
ALTER TABLE `member`
  ADD PRIMARY KEY (`member_id`);

--
-- Indexes for table `movies`
--
ALTER TABLE `movies`
  ADD PRIMARY KEY (`mov_id`);

--
-- Indexes for table `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`rev_id`),
  ADD KEY `Review` (`mov_id`),
  ADD KEY `Member` (`member_id`);

--
-- Indexes for table `seat`
--
ALTER TABLE `seat`
  ADD PRIMARY KEY (`seat_id`),
  ADD KEY `hall` (`hall_id`),
  ADD KEY `BookingID` (`booking_id`);

--
-- Indexes for table `showtime`
--
ALTER TABLE `showtime`
  ADD PRIMARY KEY (`showtime_id`),
  ADD KEY `movie` (`mov_id`),
  ADD KEY `hallid` (`hall_id`);

--
-- Indexes for table `wishlist`
--
ALTER TABLE `wishlist`
  ADD PRIMARY KEY (`wishlist_id`),
  ADD KEY `movie id` (`mov_id`),
  ADD KEY `member id` (`member_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `booking`
--
ALTER TABLE `booking`
  MODIFY `booking_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=146;

--
-- AUTO_INCREMENT for table `hall`
--
ALTER TABLE `hall`
  MODIFY `hall_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- AUTO_INCREMENT for table `member`
--
ALTER TABLE `member`
  MODIFY `member_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `movies`
--
ALTER TABLE `movies`
  MODIFY `mov_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=135;

--
-- AUTO_INCREMENT for table `reviews`
--
ALTER TABLE `reviews`
  MODIFY `rev_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=207;

--
-- AUTO_INCREMENT for table `seat`
--
ALTER TABLE `seat`
  MODIFY `seat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1006;

--
-- AUTO_INCREMENT for table `showtime`
--
ALTER TABLE `showtime`
  MODIFY `showtime_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;

--
-- AUTO_INCREMENT for table `wishlist`
--
ALTER TABLE `wishlist`
  MODIFY `wishlist_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `booking`
--
ALTER TABLE `booking`
  ADD CONSTRAINT `movid` FOREIGN KEY (`mov_id`) REFERENCES `movies` (`mov_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `reviews`
--
ALTER TABLE `reviews`
  ADD CONSTRAINT `Member` FOREIGN KEY (`member_id`) REFERENCES `member` (`member_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `Review` FOREIGN KEY (`mov_id`) REFERENCES `movies` (`mov_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `seat`
--
ALTER TABLE `seat`
  ADD CONSTRAINT `BookingID` FOREIGN KEY (`booking_id`) REFERENCES `booking` (`booking_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `hall` FOREIGN KEY (`hall_id`) REFERENCES `hall` (`hall_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `showtime`
--
ALTER TABLE `showtime`
  ADD CONSTRAINT `hallid` FOREIGN KEY (`hall_id`) REFERENCES `hall` (`hall_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `movie` FOREIGN KEY (`mov_id`) REFERENCES `movies` (`mov_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `wishlist`
--
ALTER TABLE `wishlist`
  ADD CONSTRAINT `member id` FOREIGN KEY (`member_id`) REFERENCES `member` (`member_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `movie id` FOREIGN KEY (`mov_id`) REFERENCES `movies` (`mov_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
