DROP TABLE backup;

CREATE TABLE `backup` (
  `name` varchar(300) NOT NULL,
  `size` varchar(300) NOT NULL,
  `path` varchar(300) NOT NULL,
  `date` varchar(300) NOT NULL,
  UNIQUE KEY `name` (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO backup VALUES("backup-2019-03-18-12-18-35pm","","backup/backup-2019-03-18-12-18-35pm","2019-03-18-12-18-48pm");
INSERT INTO backup VALUES("backup-2019-03-18-12-21-41pm","","backup/backup-2019-03-18-12-21-41pm","2019-03-18-12-21-51pm");
INSERT INTO backup VALUES("backup-2019-04-06-08-02-03am","","backup/backup-2019-04-06-08-02-03am","2019-04-06-08-02-59am");
INSERT INTO backup VALUES("backup-2019-04-06-08-03-00am","","backup/backup-2019-04-06-08-03-00am","2019-04-06-08-03-16am");



DROP TABLE compare;

CREATE TABLE `compare` (
  `org` varchar(300) NOT NULL,
  `citation` int(11) NOT NULL,
  `document` int(11) NOT NULL,
  `author` int(11) NOT NULL,
  `total` int(11) NOT NULL,
  `journal` int(11) NOT NULL,
  `conf` int(11) NOT NULL,
  `book` int(11) NOT NULL,
  `bookchapter` int(11) NOT NULL,
  `collaborator` int(11) NOT NULL,
  `contries` int(11) NOT NULL,
  UNIQUE KEY `org` (`org`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO compare VALUES("JSS","9268","1175","513","1175","722","416","0","19","145","40");
INSERT INTO compare VALUES("MAHE","7984","17887","1796","17887","14816","1337","8","195","145","134");
INSERT INTO compare VALUES("MUJ","1684","799","398","799","378","365","2","39","169","35");
INSERT INTO compare VALUES("s1","1","1","1","1","1","1","1","1","1","1");
INSERT INTO compare VALUES("Sastra","43392","7250","4388","7250","6162","969","0","73","159","81");
INSERT INTO compare VALUES("Shoolini","7984","845","326","845","755","32","4","45","161","63");



DROP TABLE login;

CREATE TABLE `login` (
  `name` varchar(100) NOT NULL,
  `id` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `pass` varchar(100) NOT NULL,
  `level` varchar(100) NOT NULL,
  `department` varchar(500) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO login VALUES("Punit","punitg07@gmail.com","punitg07@gmail.com","1234","admin","Department of Computer and Communication Engineering, Manipal University Jaipur, Jaipur;Department of Computer Science and Engineering, Manipal University Jaipur, Jaipur;Department of Information Technology, Manipal University Jaipur, Jaipur;Department of Chemical Engineering, Manipal University Jaipur, Jaipur;Department of Civil Engineering, Manipal University Jaipur, Jaipur;Department of Fine Arts (Applied Art), Manipal University Jaipur, Jaipur;Department of Mechatronics Engineering, Manipal ");



DROP TABLE project;

CREATE TABLE `project` (
  `data` varchar(300) NOT NULL,
  `project` varchar(300) NOT NULL,
  `path` varchar(300) NOT NULL,
  `header` varchar(300) NOT NULL,
  UNIQUE KEY `project` (`project`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO project VALUES("muj","Manipal University Jaipur","MUJPUB","MUJPUB");



DROP TABLE yearp;

CREATE TABLE `yearp` (
  `org` varchar(300) NOT NULL,
  `year` int(23) NOT NULL,
  `count` int(32) NOT NULL,
  `type` varchar(300) NOT NULL,
  UNIQUE KEY `org` (`org`,`year`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO yearp VALUES("JSS","2013","68","");
INSERT INTO yearp VALUES("JSS","2014","78","");
INSERT INTO yearp VALUES("JSS","2015","68","");
INSERT INTO yearp VALUES("JSS","2016","95","");
INSERT INTO yearp VALUES("JSS","2017","79","");
INSERT INTO yearp VALUES("JSS","2018","141","");
INSERT INTO yearp VALUES("JSS","2019","32","");
INSERT INTO yearp VALUES("MAHE","2013","1087","");
INSERT INTO yearp VALUES("MAHE","2014","1174","");
INSERT INTO yearp VALUES("MAHE","2015","1233","");
INSERT INTO yearp VALUES("MAHE","2016","1752","");
INSERT INTO yearp VALUES("MAHE","2017","1957","");
INSERT INTO yearp VALUES("MAHE","2018","2258","");
INSERT INTO yearp VALUES("MAHE","2019","410","");
INSERT INTO yearp VALUES("MUJ","2013","8","");
INSERT INTO yearp VALUES("MUJ","2014","22","");
INSERT INTO yearp VALUES("MUJ","2015","60","");
INSERT INTO yearp VALUES("MUJ","2016","152","");
INSERT INTO yearp VALUES("MUJ","2017","168","");
INSERT INTO yearp VALUES("MUJ","2018","302","");
INSERT INTO yearp VALUES("MUJ","2019","87","");
INSERT INTO yearp VALUES("Sastra","2013","746","");
INSERT INTO yearp VALUES("Sastra","2014","1061","");
INSERT INTO yearp VALUES("Sastra","2015","1032","");
INSERT INTO yearp VALUES("Sastra","2016","870","");
INSERT INTO yearp VALUES("Sastra","2017","873","");
INSERT INTO yearp VALUES("Sastra","2018","920","");
INSERT INTO yearp VALUES("Sastra","2019","202","");
INSERT INTO yearp VALUES("Shoolini","2013","59","");
INSERT INTO yearp VALUES("Shoolini","2014","90","");
INSERT INTO yearp VALUES("Shoolini","2015","80","");



