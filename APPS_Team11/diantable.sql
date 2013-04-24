Create Table Student (
	studentid int (8) Primary Key,
    firstname Varchar (64) not null ,
    lastname Varchar (64) not null ,
	email Varchar (50) not null,
    loginpassword  Varchar (50) not null,
    studentstatus Varchar (10) not null
)


CREATE TABLE `Recommendation` (
  `Recid` int(8) NOT NULL auto_increment,
  `studentid` int(8) default NULL,
  `Authorname` varchar(64) NOT NULL default '',
  `Authortitle` varchar(30) default NULL,
  `Authoremail` varchar(64) NOT NULL default '',
  `Content` text NOT NULL,
  `Affiliation` varchar(200) default NULL,
  `rate` varchar(250) default NULL,
  PRIMARY KEY  (`Recid`),
  KEY `studentid` (`studentid`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=142 ;


Create Table Transcript(
	transid int(8) Primary Key,
	studentid int(8),
	undergpa DECIMAL(4,2) not null,
	gre int (4),
	greverbal int (4),
	greana int (4),
	grequan int (4),
	tofel int (3),
	FOREIGN	KEY (studentid) references Student
)
