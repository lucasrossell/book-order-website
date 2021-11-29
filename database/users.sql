CREATE TABLE IF NOT EXISTS `users` (
  `username` varchar(24) NOT NULL UNIQUE,
  `password` varchar(50) NOT NULL,
  `fullname` varchar(100) NOT NULL,
  `email` varchar(50) NOT NULL,
  PRIMARY KEY (`username`)
)ENGINE=InnoDB  DEFAULT CHARSET=utf8;