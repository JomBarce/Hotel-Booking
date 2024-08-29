CREATE TABLE `rooms` (
  `id` bigint(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
  `hotelid` bigint(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `price` bigint(11) NOT NULL,
  `accomodation` int NOT NULL,
  `child` int NOT NULL,
  `nbed` int NOT NULL,
  `tbed` varchar(50) NOT NULL,
  `bathroom` int NOT NULL,
  `kitchen` int NOT NULL,
  `balcony` int NOT NULL,
  `view` int NOT NULL,
  `service` int NOT NULL,
  `sound` int NOT NULL,
  `rphoto` varchar(255) NOT NULL,
  `timemodified` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
