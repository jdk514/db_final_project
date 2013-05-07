<html>
<head>
<title>Approved Students</title>
</head>
<body>
<h2> Approved Students
</h2>

<?php
	session_start();

//Connect to the database
$dbc = mysql_connect("localhost", "cojennin", "Swnny.D8y!")
    or die('Error connecting to MySQL server.');
    
//Select my database
mysql_select_db("cojennin", $dbc);

//Query database to get pending graduation requests
$query = "Select * FROM PendingRequests";
    
	  //Store the output of the query
	  $result = mysql_query($query)
		or die('Error querying database (1)');
	
	//Pull the id of each student in table
	//For each id, see if the check box was checked
	while ($row = mysql_fetch_array($result)){
		$getGWUID = $row['GWUID'];
		//Check by using the id as the name of the checkbox
		if (isset($_POST[$getGWUID])) {
			echo "You have approved student $getGWUID.<br>";
			
			//Get the Students information from the 'Students' table
			$query2 = "Select * FROM Students WHERE GWUID = $getGWUID";
			
			 //Store the output of the query
				$result2 = mysql_query($query2)
				or die('Error: querying database (1)');
			
			$row2 = mysql_fetch_array($result2);
			
			$Fname = $row2['Fname'];
			$Lname = $row2['Lname'];
			$GPA = $row2['GPA'];
			$Email = $row2['Email'];
			$Degree = $row2['Degree'];
			$PhoneNum = $row2['PhoneNum'];
			$Address = $row2['Address'];
			$SemesterGrad = $row2['Semester'];
			$YearGrad = $row2['Year'];		
	
			//Add the checked student to the alumni table
			$query2 = "Insert into Alumni values($getGWUID, '$Fname', '$Lname', $GPA, '$Email',
							'$Degree', '$PhoneNum', '$Address', '$SemesterGrad', $YearGrad)";
			
			 //Store the output of the query
				$result2 = mysql_query($query2)
				or die('Error querying database (1)');
				
			//Drop from 'PendingRequests'
			$query2 = "DELETE FROM PendingRequests WHERE GWUID = $getGWUID";
			
			 //Store the output of the query
				$result2 = mysql_query($query2)
				or die('Error querying database (1)');
				
				
			//Drop from 'Students' Table
			$query2 = "DELETE FROM Students WHERE GWUID = $getGWUID";
			
			 //Store the output of the query
				$result2 = mysql_query($query2)
				or die('Error querying database (1)');
				
			//Change role in the users table from student to alumni
			$query2 = "UPDATE tp_users set role_id=6 WHERE userid = $getGWUID";
			
			 //Store the output of the query
				$result2 = mysql_query($query2)
				or die('Error querying database (30)');
			
		}

	}
?>

</body>
</html>
