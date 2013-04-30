Create Table GA (
	gsid int (8) Primary Key,
	loginpassword Varchar (50) not null
)

Create Table Reviewers(
	reviewerid int (8) Primary Key,
	loginpassword Varchar (50) not null
)

CREATE TABLE `Applications` (
  `applicationid` int(8) NOT NULL default '0',
  `aoi` varchar(250) default NULL,
  `studentid` int(8) default NULL,
  `dsought` varchar(250) default NULL,
  `pd` varchar(250) default NULL,
  `pmj` varchar(250) default NULL,
  `pdu` varchar(250) default NULL,
  `pgpa` varchar(250) default NULL,
  `pd2` varchar(250) default NULL,
  `pmj2` varchar(250) default NULL,
  `pdu2` varchar(250) default NULL,
  `pgpa2` varchar(250) default NULL,
  `subdate` timestamp NULL default CURRENT_TIMESTAMP,
  `workex` varchar(250) default NULL,
  `desdate` varchar(250) default NULL,
  `essayanswer` text,
  `astatus` varchar(25) default NULL,
  `bday` varchar(11) default NULL,
  `reviewcom` varchar(250) default NULL,
  `reviewsug` varchar(250) default NULL,
  PRIMARY KEY  (`applicationid`),
  KEY `studentid` (`studentid`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;