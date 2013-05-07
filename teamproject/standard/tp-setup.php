<?php

include_once '../tp-configure.php';
//include_once SITE_DIR . 'standard/tp-query.php';
include_once 'tp-query.php';

/**
 * This class is the basic setup class for the project. It will stand inependently of most of the project,
 * only being used on setup.
 * To Do:
 * 	1. Check accuracy of table setup
 * 	1. Debug and test
 * 	2. Add in example data
 */
if( !class_exists('TP_Setup')):
class TP_Setup {

	var $engine = 'MyISAM';

	//To Do: Add in foreign key relations
	//and any constraints
	/*
	 * 1) Dump prequisites table in favor of adding columns
	 * 	  to the courses table?
	 */
	var $table_setup = array( 
		'tp_course_dept' => array(
			'cdid INT PRIMARY KEY AUTO_INCREMENT,',
			'dept_name VARCHAR(20),',
			'dept_num VARCHAR(10),',
			'dept_full_name VARCHAR(100)',
		),
		'tp_site_options' => array(
			'soid INT PRIMARY KEY AUTO_INCREMENT,',
			'option_key VARCHAR(200),',
			'option_value VARCHAR(200)',
		),
		'tp_course' => array(
			'cid INT PRIMARY KEY AUTO_INCREMENT,',
			'course_num INT,',
			'title VARCHAR(100),',
			//'semester VARCHAR(50),',
			'credits INT,',
			'status VARCHAR(75),',
			'class_time VARCHAR(75),',
			'class_day VARCHAR(15),',
			//'year VARCHAR(10),',
			'FOREIGN KEY (course_num) REFERENCES tp_course_dept(cdid)'
		), 
		'tp_degree' => array(
			'did INT PRIMARY KEY AUTO_INCREMENT,',
			'degree_type VARCHAR(20),',
			'college VARCHAR(100),',
			'name VARCHAR(100)',
		), 
		'tp_roles' => array(
			'rid INT PRIMARY KEY AUTO_INCREMENT,',
			'role_name VARCHAR(100),',
			'role_full_name VARCHAR(150)',
		), 
		'tp_address' => array(
			'aid INT PRIMARY KEY AUTO_INCREMENT,',
			'user_id INT NOT NULL,',
			'street1 VARCHAR(200),',
			'street2 VARCHAR(200),',
			'state_prov VARCHAR(200),',
			'zipcode VARCHAR(50),',
			'city VARCHAR(200),',
			'FOREIGN KEY (user_id) REFERENCES tp_users(uid)'
		), 
		'tp_users' => array(
			'uid INT PRIMARY KEY AUTO_INCREMENT,',
			'address_id INT NOT NULL,',
			'fname VARCHAR(100),',
			'lname VARCHAR(100),',
			'user_name VARCHAR(100),',
			'user_pass VARCHAR(250),',
			'user_email VARCHAR(200),',
			'date_registered TIMESTAMP,',
			'role_id INT NOT NULL,',
			'FOREIGN KEY (role_id) REFERENCES tp_roles(rid),',
			'FOREIGN KEY (address_id) REFERENCES tp_address(aid)'
		),
		'tp_course_being_taken' => array(
			'cbtid INT PRIMARY KEY AUTO_INCREMENT,',
			'user_id INT NOT NULL,',
			'course_id INT NOT NULL,',
			'year VARCHAR(10) NOT NULL,',
			'semester VARCHAR(10) NOT NULL,',
			'status VARCHAR(20),',
			'FOREIGN KEY (user_id) REFERENCES tp_users(uid),',
			'FOREIGN KEY (course_id) REFERENCES tp_course(cid)',
		),
		/*'tp_transcript' => array(
			'tid INT PRIMARY KEY AUTO_INCREMENT,',
			'user_id INT NOT NULL,',
			'gpa FLOAT,',
			'FOREIGN KEY (user_id) REFERENCES tp_users(uid)',
		),*/
		'tp_course_has_prereqs' => array (
			'chpid INT PRIMARY KEY AUTO_INCREMENT,',
			'course_id INT,',
			'prereq_id INT,',
			'FOREIGN KEY (course_id) REFERENCES tp_course(cid),',
			'FOREIGN KEY (prereq_id) REFERENCES tp_course(cid)',
		),
		'tp_transcript_courses' => array(
			'tcid INT PRIMARY KEY AUTO_INCREMENT,',
			//'transcript_id INT NOT NULL,',
			'user_id INT NOT NULL,',
			'course_id INT NOT NULL,',
			'course_grade VARCHAR(10),',
			'course_semester INT,',
			'course_year VARCHAR(10),',
			//'FOREIGN KEY(transcript_id) REFERENCES tp_transcript(tid),',
			'FOREIGN KEY(course_id) REFERENCES tp_course(cid)',
		),
		'tp_degree_being_sought' =>  array(
			'dbs INT PRIMARY KEY AUTO_INCREMENT,',
			'degree_id INT NOT NULL,',
			'user_id INT NOT NULL,',
			'FOREIGN KEY (degree_id) REFERENCES tp_degree(did),',
			'FOREIGN KEY (user_id) REFERENCES tp_users(uid)',
		),
		'tp_users_meta' => array(
			'umeta_id INT PRIMARY KEY AUTO_INCREMENT,',
			'user_id INT NOT NULL,',
			'meta_key VARCHAR(200),',
			'meta_val VARCHAR(250),',
			'FOREIGN KEY (user_id) REFERENCES tp_users(uid)',
		), /* END OF TEAM 16 TABLES */

		'Student' => array(
			'studentid INT Primary Key,',
    		'firstname Varchar (64) not null,',
    		'lastname Varchar (64) not null,',
			'email Varchar (50) not null,',
    		'loginpassword  Varchar (50) not null,',
    		'studentstatus Varchar (10) not null'
    	),

    	'Recommendation' => array(
			'Recid int(8) PRIMARY KEY,',
			'studentid INT default NULL,',
			'Authorname varchar(64) NOT NULL default "",',
			'Authortitle varchar(30) default NULL,',
			'Authoremail varchar(64) NOT NULL default "",',
			'Content text NOT NULL,',
			'Affiliation varchar(200) default NULL,',
			'rate varchar(250) default NULL,',
			'FOREIGN KEY (studentid) REFERENCES Student(studentid)',
		),
    	
		'Transcript' => array(
			'transid int(8) Primary Key,',
			'studentid INT,',
			'undergpa DECIMAL(4,2) not null,',
			'gre int (4),',
			'greverbal int (4),',
			'greana int (4),',
			'grequan int (4),',
			'tofel int (3),',
			'FOREIGN KEY (studentid) references Student(studentid)'
		),
		
		'app_to_reg' => array(
			'studentid INT Primary Key,',
		  	'firstname varchar(64) NOT NULL,',
		  	'lastname varchar(64) NOT NULL,',
		  	'email varchar(50) NOT NULL,',
		  	'loginpassword varchar(50) NOT NULL,',
		  	'dsought varchar(10) NOT NULL',
		),
		
		'GA' => array(
			'gsid int (8) Primary Key,',
			'loginpassword Varchar (50) not null'
		),

		'Reviewers' => array(
			'reviewerid int (8) Primary Key,',
			'loginpassword Varchar (50) not null'
		),

		'Applications' => array(
  			'applicationid int(8) PRIMARY KEY,',
			'aoi varchar(250) default NULL,',
			'studentid INT default NULL,',
			'dsought varchar(250) default NULL,',
			'pd varchar(250) default NULL,',
			'pmj varchar(250) default NULL,',
			'pdu varchar(250) default NULL,',
			'pgpa varchar(250) default NULL,',
			'pd2 varchar(250) default NULL,',
			'pmj2 varchar(250) default NULL,',
			'pdu2 varchar(250) default NULL,',
			'pgpa2 varchar(250) default NULL,',
			'subdate timestamp NULL default CURRENT_TIMESTAMP,',
			'workex varchar(250) default NULL,',
			'desdate varchar(250) default NULL,',
			'essayanswer text,',
			'astatus varchar(25) default NULL,',
			'bday varchar(11) default NULL,',
			'reviewcom varchar(250) default NULL,',
			'reviewsug varchar(250) default NULL,',
			'FOREIGN KEY (studentid) REFERENCES Student(studentid)'
		), /* End Team 11 */

		'Students' => array (
			'GWUID     varchar(60) primary key,',
		   	'Fname     varchar(60),',
		   	'Lname     varchar(60),',
		   	'GPA varchar(60),',
		    'Email    varchar(60),',
		    'Degree   varchar(60),',
		   	'PhoneNum  varchar(20),',
		   	'Address   varchar(60),',
		   	'Semester  varchar(60),',
		   	'Year      int(10)',
		),

		'Alumni' => array(
			'GWUID     varchar(60) primary key,',
		   	'Fname     varchar(60),',
		   	'Lname     varchar(60),',
		   	'GPA	     varchar(60),',
		    'Email    varchar(60),',
		    'Degree   varchar(60),',
		   	'PhoneNum  varchar(20),',
		   	'Address   varchar(60),',
		   	'DegreeType  varchar(60),',
		   	'YearGrad  varchar(60)'
		),

		'CourseRegistration' => array(
			'CourseID     varchar(60),',
			'CourseNum varchar(60),',
		   	'Title  varchar(60),',
		   	'CreditHrs    int(10),',
		   	'ClassDay     varchar(60),',
		   	'ClassTime    varchar(60),',
		   	'InameF       varchar(60),',
		   	'InameL       varchar(60)',
		),

		'CoursePrerequisites' => array(
			'CourseNum 	 varchar(60) primary key,',
		   	'MainPrereq    varchar(60),',
		   	'SecPrereq  	 varchar(60)'
		),
		
		'Grades' => array(
			'GPA         varchar(60),',
		   	'Semester    varchar(60),',
		   	'Year        int(10),',
		   	'CourseID    varchar(60),',
		   	'CreditHrs   varchar(60),',
   			'GWUID	   varchar(60) primary key',
   		),

   		'Advisors' => array(
			'AdvID varchar(60) PRIMARY KEY,',
   			'AnameF     varchar(60),',
   			'AnameL     varchar(60)',
   		),

   		'Form1' => array( 
			'GWUID varchar(60),',
		   	'Degree varchar(60),',
		   	'CourseID varchar(60),',
			'PRIMARY KEY (CourseID, GWUID)',
		),

		'PendingRequests' => array(
		   'GWUID   varchar(60) primary key,',
		   'Fname   varchar(60),',
		   'Lname  varchar(60)',
		),

		'RequiredCourses' => array(
			'Degree	varchar(60),',
			'CourseID varchar(60) primary key'
		),

		'DegreeReqs' => array(
			'Degree varchar(60) NOT NULL primary key,',
			'NumBadGrades varchar(60),',
			'NumReqCourses varchar(60),',
			'MinGpa varchar(60),',
			'LowGrade varchar(60)'
		),
	);

	function listen_for_setup() {
		global $tp_query;

		//Should always be able to force reset if setup.php?reset=all
		//is called
		if( isset( $_GET['reset'] ) && $_GET['reset'] == 'all')
			$this->create_database();
		else {
			if( $tp_query->check_db( TP_DB_NAME ) )
				return false;
			else
				$this->create_database();
		}
	}

	function create_database() {
		global $tp_query;
		//Create the database we need, then start
		//creating all the tables
		$this->intialize_database( TP_DB_NAME );
		
		if( defined( 'DEBUG' ) )
			echo '<p>Database setup complete.</p>';

		$this->load_in_data();

		if( defined( 'DEBUG' ) )
			echo '<p>Data loaded.</p>';
	}

	function intialize_database() {
		global $tp_query;

		$tp_query->create_database( TP_DB_NAME );

		foreach( $this->table_setup as $table_name => $table ) {

			$build_query = "CREATE TABLE $table_name ( ";
			foreach( $table as $line ) {
				$build_query .= $line . ' ';
			}
			$build_query .= ')';

			if( isset( $this->engine ) )
				$build_query .= ' ENGINE = ' . $this->engine;

			$build_query .= ';';

			$tp_query->create_table( $build_query, $table_name );
		}
	}

	//To Do: Add in sample data
	function load_in_data(){
		global $tp_query;

		include_once('tp-setup-data.php');

		foreach( $setup_data as $table ) {
			foreach( $table as $query ) {
				$tp_query->query($query);
			}
		}

	}
}

$tp_setup = new TP_Setup;
$tp_setup->listen_for_setup();
endif;