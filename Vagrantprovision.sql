GRANT ALL PRIVILEGES ON *.* TO 'root'@'%' IDENTIFIED BY 'root';
CREATE database interviewtest;
USE interviewtest;

CREATE TABLE `users` (
  `uid` int(10) unsigned NOT NULL DEFAULT '0' COMMENT 'Primary Key: Unique user ID.',
  `username` varchar(60) NOT NULL DEFAULT '' COMMENT 'Unique user name.',
  `email` varchar(60) NOT NULL DEFAULT '' COMMENT 'Email address.',
  `created` int(11) NOT NULL DEFAULT '0' COMMENT 'Timestamp for when user was created.',
  `firstname` varchar(50) DEFAULT NULL COMMENT 'User’s first name',
  `surname` varchar(50) DEFAULT NULL COMMENT 'User’s surname',
  `centreid` int(10) unsigned DEFAULT NULL COMMENT 'Centre ID',
  PRIMARY KEY (`uid`),
  UNIQUE KEY `username` (`username`),
  KEY `created` (`created`),
  KEY `centreid` (`centreid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Stores user data.';

INSERT INTO `users` (`uid`, `username`,email,`created`, `firstname`, `surname`, `centreid`)
VALUES
	(1045951, 'stuartcatbrain', 'stuart@catbrain.com', 1314022121, 'Stuart', 'Catbrain', 3421264),
  (1119061, 'davebamford', 'dave@gmail.com', 1322047951, 'Dave', 'Bamford', 3421265),
  (1160846, 'danjones', 'dandandan@alan.org', 1366370920, 'Dan', 'Jones', 3421266),
  (1169492, 'sarahcracknell', 'st@etienne.co.uk', 1369325699, 'Sarah', 'Cracknell', 3421264),
  (1380398, 'jamesspeake', 'james@tinderfoundation..org', 1314022121, 'James', 'Speake', 3421264),
  (1416733, 'johnsmith', 'john', 1369325699, 'John', 'Smith', 3421262),
  (1431399, 'barrybethel', 'barry@bethel.co.uk', 1373978942, 'Barry', 'Bethel', 3421264);


CREATE TABLE `centres` (
  `centreid` int(11) NOT NULL AUTO_INCREMENT,
  `centrename` varchar(255) DEFAULT NULL,
  `centreactive` int(10) DEFAULT NULL,
  PRIMARY KEY (`CentreID`),
  KEY `CentreID` (`CentreID`)
) ENGINE=InnoDB AUTO_INCREMENT=3457485 DEFAULT CHARSET=latin1;

INSERT INTO `centres` (`centreid`, `centrename`, `centreactive`)
VALUES
	(3421262, 'Salisbury Road Learning Centre', 1),
  (3421264, 'Big Town Centre', 1),
  (3421265, 'New Avenue Centre', 0),
  (3421266, 'Sheffield Central Library', 1)
