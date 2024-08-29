CREATE TABLE `hotels` (
  `id` bigint(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
  `hname` varchar(50) NOT NULL,
  `address` varchar(100) NOT NULL,
  `city` varchar(100) NOT NULL,
  `pcode` int(11) NOT NULL,
  `country` varchar(100) NOT NULL,
  `pnumber` varchar(50) NOT NULL,
  `review` float(10) NOT NULL,
  `price` float(20) NOT NULL,
  `class` int(1) NOT NULL,
  `mainphoto` varchar(255) NOT NULL,
  `photo1` varchar(255) NOT NULL,
  `photo2` varchar(255) NOT NULL,
  `photo3` varchar(255) NOT NULL,
  `photo4` varchar(255) NOT NULL,
  `timemodified` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
