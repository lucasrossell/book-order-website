CREATE TABLE IF NOT EXISTS `books` (
  `title` varchar(50) NOT NULL,
  `author` varchar(50) NOT NULL,
  `edition` varchar(30) NOT NULL,
  `publisher` varchar(50) NOT NULL,
  `book_qty` varchar(50) NOT NULL,
  `order_id` integer(50) NOT NULL AUTO_INCREMENT,
  `ISBN` varchar(15) NOT NULL,
  `class` varchar(30) NOT NULL,
  `semester` varchar(30) NOT NULL,
  `username` varchar(24) NOT NULL,
  PRIMARY KEY (`order_id`),
  FOREIGN KEY (`username`) REFERENCES users(`username`)
)ENGINE=InnoDB  DEFAULT CHARSET=utf8;