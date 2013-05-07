<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
  "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <title>View Transcript</title>
</head>
<body>
  <h2>Transcript</h2>
  <?php
    session_start();

$StudentID = $_SESSION['StudentID'];
    

//Connect to the database
$dbc = mysql_connect("localhost", "cojennin", "Swnny.D8y!")
    or die('Error connecting to MySQL server.');
    
//Select my database
mysql_select_db("cojennin", $dbc);

	  //Get student's Transcript courses from the database
	$query = "Select * FROM tp_users, tp_transcript_courses, tp_course_dept, tp_course			   
			WHERE user_id = $StudentID AND  cdid = course_id AND cdid = cid AND uid = user_id";
	  
	  //Store the output of the query
	  $result = mysql_query($query)
		or die('Error querying database (10)');
		
$row1 = mysql_fetch_array($result);
	
	print "Student Name: " . $row1['fname'] . " " . $row1['lname'];
	print "<br>GWU ID: $StudentID<br>";

print '<table border="1">';
print "<tr><td> Course ID <td> Course Number <td> Course Name <td> Grade <td> Semester <td> Year ";	
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
exit;

?>

</body>
</html>


