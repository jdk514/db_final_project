<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
  "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <title>Advising Form 1</title>
  <link rel="stylesheet" type="text/css" href="style.css" />
</head>
<body>
  <h2>Application for Graduation</h2>

<!-- 
    <label for="GWUID">Enter your GWU ID:</label>
    <input type="text" id="GWUID" name="GWUID" /><br /><br />
    <label for="group1">Select Degree:</label>
    <input type="radio" name="group1" value="MS" checked> MS<br>
 -->
 
<?php
	session_start();
	$form1 = true;

$GWUID = $_SESSION['GWUID'];

//Connect to the database
$dbc = mysql_connect("localhost", "cojennin", "Swnny.D8y!")
    or die('Error connecting to MySQL server.');
    
//Select my database
mysql_select_db("cojennin", $dbc);



//Get student's Form1 courses from the database
	$query = "Select * FROM Form1			   
			WHERE GWUID = '$GWUID'";

	//Store the output of the query
	  $result = mysql_query($query)
		or die('Error querying database');
	
//Query the database to check that Form 1 has been submitted for the GWUID entered
	  $query = "Select * 
	  			FROM Form1			   
				WHERE Form1.GWUID = $GWUID;";
	
	//Store the output of the query
	$result = mysql_query($query)
		or die('Error querying database(1)');
			 
	$row = mysql_fetch_array($result);
	

	if ($row['GWUID'] != $GWUID) {
		$form1 = false;
		echo 'You did not submit a Form1. Please go back and fill it out before applying. <br>';
		}
	else {
		
	//Store the output of the query
	  $result = mysql_query($query)
		or die('Error querying database');
	
	print "Student Name: " . $row1['fname'] . " " . $row1['lname'];
	print "<br>GWU ID: $StudentID<br>";
	
	
	print "Your Form 1 Courses: <br>";
	while ($row = mysql_fetch_array($result)) {
		print $row['CourseID'] . "<br>";
		}
		}
		
	$StudentID = $GWUID;
		
		  //Get student's Transcript courses from the database
	$query = "Select * FROM tp_users, tp_transcript_courses, tp_course_dept, tp_course			   
			WHERE user_id = '$StudentID' AND  cdid = course_id AND cdid = cid AND uid = user_id";
	  
	  //Store the output of the query
	  $result = mysql_query($query)
		or die('Error querying database (10)');
		
$row1 = mysql_fetch_array($result);
	


print "<br>Your Transcript:<br>";
print '<table border="1">';
print "<tr><td> Course<td> Course Number <td> Course Name <td> Grade <td> Semester <td> Year ";	
	//Pull the courses and grades
	while ($row = mysql_fetch_array($result)) {
	 	print "<tr>";
		print "<td>" . $row['cdid'];
	    print "<td>" . $row['dept_name'] . ' ' . $row['dept_num'];
	    print "<td>" . $row['title'];
	    print "<td>" . $row['course_grade'];
	    	
	    if ($row['course_semester'] == 1) $semester = "Spring";
	    if ($row['course_semester'] == 2) $semester = "Summer";
	    if ($row['course_semester'] == 3) $semester = "Fall";

	    print "<td>" . $semester;
	    print "<td>" . $row['course_year'];
		}
		
print "</table>";

if ($form1) {
print '<form method="post" action="GradApp.php">
    <input type="submit" value="Apply For Graduation" name="submit" />
  </form>';
  }
?>

    <br><br>
    <button onclick="location.href='http://www.student.seas.gwu.edu/~awp1121/StudentLogin.php'">
     Back</button>
     <br><br>
      
</body>
</html>
