CREATE TABLE `filter` (
  `id` bigint(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
  `hotelid` bigint(11) NOT NULL,
  `cancellation` int NOT NULL,
  `prepayment` int NOT NULL,
  `creditcard` int NOT NULL,
  `pool` int NOT NULL,
  `wifi` int NOT NULL,
  `aircon` int NOT NULL,
  `spa` int NOT NULL,
  `breakfast` int NOT NULL,
  `pet` int NOT NULL,
  `beach` int NOT NULL,
  `restaurant` int NOT NULL,
  `gym` int NOT NULL,
  `wheelchair` int NOT NULL,
  `dfacilities` int NOT NULL,
  `timemodified` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;