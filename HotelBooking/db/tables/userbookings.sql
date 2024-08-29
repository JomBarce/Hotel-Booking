CREATE TABLE `userbookings` (
  `id` bigint(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
  `userid` bigint(11) NOT NULL,
  `hotelid` bigint(11) NOT NULL,
  `roomid` bigint(11) NOT NULL,
  `checkin` date NOT NULL,
  `checkout` date NOT NULL,
  `price` bigint(11) NOT NULL,
  `cancel` int NOT NULL,
  `timemodified` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;