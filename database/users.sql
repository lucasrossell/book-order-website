CREATE TABLE IF NOT EXISTS `users` (
  `username` varchar(24) NOT NULL UNIQUE,
  `password` varchar(50) NOT NULL,
  `fullName` varchar(100) NOT NULL,
  `userEmail` varchar(50) NOT NULL,
  'type' varchar(10) NOT NULL,
  PRIMARY KEY (`username`)
)ENGINE=InnoDB  DEFAULT CHARSET=utf8;

