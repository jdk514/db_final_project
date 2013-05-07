<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
  "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <title>Reset Page</title>
</head>
<body>
  <h2>Reset!</h2>
  <?php
//Connect to the database
$dbc = mysql_connect("localhost", "cojennin", "Swnny.D8y!")
    or die('Error connecting to MySQL server.');
    
//Select my database
mysql_select_db("cojennin", $dbc);

//Clear Form1 Table
    $query = "Truncate table Form1";		

	//Store the output of the query
	  $result = mysql_query($query)
		or die('Error querying database (9999)');
		
//Clear Alumni Table
$query = "Truncate table Alumni";		

//Store the output of the query
	  $result = mysql_query($query)
		or die('Error querying database (2)');
		
//Clear Advisors Table
$query = "Truncate table Advisors";		

//Store the output of the query
	  $result = mysql_query($query)
		or die('Error querying database (2)');
		
//Clear Students Table
$query = "Truncate table Students";		

//Store the output of the query
	  $result = mysql_query($query)
		or die('Error querying database (3)');

//Clear PendingRequests Table
$query = "Truncate table PendingRequests";		

//Store the output of the query
	  $result = mysql_query($query)
		or die('Error querying database (4)');
		
//Populating Tables

//POPULATE ADVISORS TABLE
//Get all advisors from tp_users
$query = "SELECT * FROM tp_users WHERE role_id = 5";		

//Store the output of the query
	  $result = mysql_query($query)
		or die('Error querying database (8888888)');	
		
while ($row = mysql_fetch_array($result)) {
	$query2 = "INSERT INTO Advisors values ( '".$row['uid']."', '".$row['fname']."', '".$row['lname']."')";

	//Store the output of the query
	  $result2 = mysql_query($query2)
		or die('Error querying database (6)');	
}


// //POPULATE ALUMNI TABLE
// //Get all alummi from tp_users
// $query = "SELECT * FROM tp_users WHERE role_id = 6";		
// 
// //Store the output of the query
// 	  $result = mysql_query($query)
// 		or die('Error querying database (99292)');	
// 		
// while ($row = mysql_fetch_array($result)) {
// 	$query2 = "INSERT INTO Alumni values ( '".$row['uid']."', '".$row['fname']."', '".$row['lname']."')";
// 	
// 	
// 	//Store the output of the query
// 	  $result2 = mysql_query($query2)
// 		or die('Error querying database (5)');	
// }


//POPULATE Students TABLE
//Get all students from tp_users
$query = "SELECT * FROM tp_users, tp_degree_being_sought WHERE role_id = 1 AND user_id=uid";		

//Store the output of the query
	  $result = mysql_query($query)
		or die('Error querying database (59)');	
		
while ($row = mysql_fetch_array($result)) {
	$user_id = $row['uid'];
	$fName = $row['fname'];
	$lName = $row['lname'];
	$GPA = NULL;
	$email = $row['user_email'];
	if ($row['degree_id'] == 1) $getDegree = 'MS';
	$PhoneNum = NULL;
	$AddressID = $row['address_id'];
	
	$query3 = "SELECT option_value FROM tp_site_options WHERE option_key = 'active_semester'";	

	//Store the output of the query
	  $result3 = mysql_query($query3)
		or die('Error querying database (51)');
	
	$row3 = mysql_fetch_array($result3);
	$Semester = $row3['option_value'];
	
	$query3 = "SELECT option_value FROM tp_site_options WHERE option_key = 'active_year'";

	//Store the output of the query
	  $result3 = mysql_query($query3)
		or die('Error querying database (5000000)');
		
	$row3 = mysql_fetch_array($result3);
	$Year = $row3['option_value'];
	

	
	
	$query2 = "INSERT INTO Students values('$user_id', '$fName', '$lName', '$GPA', '$email', 
				'$getDegree', '$PhoneNum', '$AddressID', '$Semester', '$Year')";
	
	//Store the output of the query
	  $result2 = mysql_query($query2)
		or die('Error querying database (50)');	
}

echo "Reset complete<br>";

//INSERT ADD QUERIES HERE		
// //Add students
// $query = "INSERT INTO Students(GWUID,Fname,Lname,GPA,Email,Degree,PhoneNum,Address,Semester,Year) values('333111111', 'Paul', 'McCartney', '3.5', 'AHolden@gwu.edu', 'Computer Science', '7564389178', '5 Pin Lane', 'Fall', '2010')";		
// 
// //Store the output of the query
// 	  $result = mysql_query($query)
// 		or die('Error querying database (6)');
// 		
// //Add students
// $query = "INSERT INTO Students(GWUID,Fname,Lname,GPA,Email,Degree,PhoneNum,Address,Semester,Year) values('444111111', 'George', 'Harrison', '3.0', 'SWalsh@gwu.edu', 'Computer Science', 70923876485, '10 King Ct', 'Fall', '2010' )";		
// 
// //Store the output of the query
// 	  $result = mysql_query($query)
// 		or die('Error querying database (7)');
// 		
// //Add students
// $query = "INSERT INTO Alumni(GWUID,Fname,Lname,GPA,Email,Degree,PhoneNum,Address,DegreeType,YearGrad) values('555111111', 'Eric', 'Clapton', '2.5', 'RGrimes@gwu.edu', 'Computer Science', 1276394586, '23 Mary St', 'MS', '2006' )";		
// 
// //Store the output of the query
// 	  $result = mysql_query($query)
// 		or die('Error querying database (8)');
// 		
// //Add students
// $query = "INSERT INTO Advisors(AdvID,AnameF,AnameL) values('2000','Jon','Snow')";	
// 
// //Store the output of the query
// 	  $result = mysql_query($query)
// 		or die('Error querying database (9)');
// 		
// //Add students
// $query = "INSERT INTO Transcripts(GWUID,CourseID,Grade) values('333111111', 'CS 6221', 'A')";	
// 
// //Store the output of the query
// 	  $result = mysql_query($query)
// 		or die('Error querying database (10)');
// 		
// 		//Add students
// $query = "INSERT INTO Transcripts(GWUID,CourseID,Grade) values('333111111', 'CS 6461', 'A')";	
// 
// //Store the output of the query
// 	  $result = mysql_query($query)
// 		or die('Error querying database (11)');
// 		
// 		//Add students
// $query = "INSERT INTO Transcripts(GWUID,CourseID,Grade) values('333111111', 'CS 6212', 'A')";	
// 
// //Store the output of the query
// 	  $result = mysql_query($query)
// 		or die('Error querying database (12)');
// 		
// 		//Add students
// $query = "INSERT INTO Transcripts(GWUID,CourseID,Grade) values('333111111', 'CS 6220', 'A')";	
// 
// //Store the output of the query
// 	  $result = mysql_query($query)
// 		or die('Error querying database (13)');
// 		
// 		//Add students
// $query = "INSERT INTO Transcripts(GWUID,CourseID,Grade) values('333111111', 'CS 6232', 'A')";	
// 
// //Store the output of the query
// 	  $result = mysql_query($query)
// 		or die('Error querying database (14)');
// 		
// 		//Add students
// $query = "INSERT INTO Transcripts(GWUID,CourseID,Grade) values('333111111', 'CS 6233', 'B')";	
// 
// //Store the output of the query
// 	  $result = mysql_query($query)
// 		or die('Error querying database (15)');
// 		
// 		//Add students
// $query = "INSERT INTO Transcripts(GWUID,CourseID,Grade) values('333111111', 'CS 6241', 'B')";	
// 
// //Store the output of the query
// 	  $result = mysql_query($query)
// 		or die('Error querying database (16)');
// 		
// 		//Add students
// $query = "INSERT INTO Transcripts(GWUID,CourseID,Grade) values('333111111', 'CS 6246', 'B')";	
// 
// //Store the output of the query
// 	  $result = mysql_query($query)
// 		or die('Error querying database (17)');
// 		
// 		//Add students
// $query = "INSERT INTO Transcripts(GWUID,CourseID,Grade) values('333111111', 'CS 6262', 'B')";	
// 
// //Store the output of the query
// 	  $result = mysql_query($query)
// 		or die('Error querying database (18)');
// 		
// 		//Add students
// $query = "INSERT INTO Transcripts(GWUID,CourseID,Grade) values('333111111', 'CS 6283', 'B')";	
// 
// //Store the output of the query
// 	  $result = mysql_query($query)
// 		or die('Error querying database (19)');
// 		
// 		//Add students
// $query = "INSERT INTO Transcripts(GWUID,CourseID,Grade) values('444111111', 'CS 6221', 'B')";	
// 
// //Store the output of the query
// 	  $result = mysql_query($query)
// 		or die('Error querying database (20)');
// 		
// 		//Add students
// $query = "INSERT INTO Transcripts(GWUID,CourseID,Grade) values('444111111', 'CS 6461', 'B')";	
// 
// //Store the output of the query
// 	  $result = mysql_query($query)
// 		or die('Error querying database (21)') ;
// 		
// 		//Add students
// $query = "INSERT INTO Transcripts(GWUID,CourseID,Grade) values('444111111', 'CS 6212', 'B')";	
// 
// //Store the output of the query
// 	  $result = mysql_query($query)
// 		or die('Error querying database (22)');
// 		
// 		//Add students
// $query = "INSERT INTO Transcripts(GWUID,CourseID,Grade) values('444111111', 'CS 6232', 'B')";	
// 
// //Store the output of the query
// 	  $result = mysql_query($query)
// 		or die('Error querying database (23)');
// 		
// 		//Add students
// $query = "INSERT INTO Transcripts(GWUID,CourseID,Grade) values('444111111', 'CS 6233', 'B')";	
// 
// //Store the output of the query
// 	  $result = mysql_query($query)
// 		or die('Error querying database (24)');
// 		
// 		//Add students
// $query = "INSERT INTO Transcripts(GWUID,CourseID,Grade) values('444111111', 'CS 6241', 'B')";	
// 
// //Store the output of the query
// 	  $result = mysql_query($query)
// 		or die('Error querying database (25)');
// 		
// 		//Add students
// $query = "INSERT INTO Transcripts(GWUID,CourseID,Grade) values('444111111', 'CS 6242', 'B')";	
// 
// //Store the output of the query
// 	  $result = mysql_query($query)
// 		or die('Error querying database (26)');
// 		
// 		//Add students
// $query = "INSERT INTO Transcripts(GWUID,CourseID,Grade) values('444111111', 'EE 6244', 'B')";	
// 
// //Store the output of the query
// 	  $result = mysql_query($query)
// 		or die('Error querying database (27)');
// 		
// 		//Add students
// $query = "INSERT INTO Transcripts(GWUID,CourseID,Grade) values('444111111', 'CS 6283', 'B')";	
// 
// //Store the output of the query
// 	  $result = mysql_query($query)
// 		or die('Error querying database (28)');
// 		
// 		//Add students
// $query = "INSERT INTO Transcripts(GWUID,CourseID,Grade) values('555111111', 'CS 6221', 'B')";	
// 
// //Store the output of the query
// 	  $result = mysql_query($query)
// 		or die('Error querying database (29)');
// 		
// 		//Add students
// $query = "INSERT INTO Transcripts(GWUID,CourseID,Grade) values('555111111', 'CS 6461', 'B')";	
// 
// //Store the output of the query
// 	  $result = mysql_query($query)
// 		or die('Error querying database (30)');
// 		
// 		//Add students
// $query = "INSERT INTO Transcripts(GWUID,CourseID,Grade) values('555111111', 'CS 6212', 'B')";	
// 
// //Store the output of the query
// 	  $result = mysql_query($query)
// 		or die('Error querying database (31)');
// 		
// 		//Add students
// $query = "INSERT INTO Transcripts(GWUID,CourseID,Grade) values('555111111', 'CS 6232', 'B')";	
// 
// //Store the output of the query
// 	  $result = mysql_query($query)
// 		or die('Error querying database (32)');
// 		
// 		//Add students
// $query = "INSERT INTO Transcripts(GWUID,CourseID,Grade) values('555111111', 'CS 6233', 'B')";	
// 
// //Store the output of the query
// 	  $result = mysql_query($query)
// 		or die('Error querying database (33)');
// 		
// 		//Add students
// $query = "INSERT INTO Transcripts(GWUID,CourseID,Grade) values('555111111', 'CS 6241', 'B')";	
// 
// //Store the output of the query
// 	  $result = mysql_query($query)
// 		or die('Error querying database (34)');
// 		
// 		//Add students
// $query = "INSERT INTO Transcripts(GWUID,CourseID,Grade) values('555111111', 'CS 6242', 'B')";	
// 
// //Store the output of the query
// 	  $result = mysql_query($query)
// 		or die('Error querying database (35)');
// 		
// 		//Add students
// $query = "INSERT INTO Transcripts(GWUID,CourseID,Grade) values('555111111', 'CS 6283', 'A')";	
// 
// //Store the output of the query
// 	  $result = mysql_query($query)
// 		or die('Error querying database (36)');
// 		
// 		//Add students
// $query = "INSERT INTO Transcripts(GWUID,CourseID,Grade) values('555111111', 'CS 6286', 'A')";	
// 
// //Store the output of the query
// 	  $result = mysql_query($query)
// 		or die('Error querying database (37)');
// 		
// 		//Add students
// $query = "INSERT INTO Transcripts(GWUID,CourseID,Grade) values('555111111', 'CS 6254', 'A')";	

// //Store the output of the query
// 	  $result = mysql_query($query)
// 		or die('Error querying database (38)');
		
		
		
		
	?>
</body>
</html>
