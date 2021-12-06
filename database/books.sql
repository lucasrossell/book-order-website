CREATE TABLE IF NOT EXISTS `books` (
  `title` varchar(50) NOT NULL,
  `author` varchar(50) NOT NULL,
  `edition` varchar(30) NOT NULL,
  `publisher` varchar(50) NOT NULL,
  `book_qty` varchar(50) NOT NULL,
  `order_id` integer(50) NOT NULL UNIQUE,
  `ISBN` varchar(15) NOT NULL UNIQUE,
  PRIMARY KEY (`order_id`)
)ENGINE=InnoDB  DEFAULT CHARSET=utf8;