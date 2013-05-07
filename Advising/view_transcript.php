<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
  "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <title>Your Transcript</title>
</head>
<body>
  <h2>Transcript</h2>
  <?php
    session_start();

$GWUID = $_SESSION['GWUID'];
    

//Connect to the database
$dbc = mysql_connect("localhost", "cojennin", "Swnny.D8y!")
    or die('Error connecting to MySQL server.');
    
//Select my database
mysql_select_db("cojennin", $dbc);

	  //Get student's Transcript courses from the database
	$query = "Select * FROM tp_transcript_courses, tp_course_dept, tp_course			   
			WHERE user_id = '$GWUID' AND  cdid = course_id AND cdid = cid";
	  
	  //Store the output of the query
	  $result = mysql_query($query)
		or die('Error querying database (Oops)');
	
	//Pull the name of the
	while ($row = mysql_fetch_array($result)) {
	
		$transcriptCoursesNums[$i] = $row['cdid'];
		$transcriptCourses[$i] = $row['dept_name'] . ' ' . $row['dept_num'];
		}
	//Print
echo "<br>Transcript Courses <br>";
for ($i = 0; $i<count($transcriptCourses); $i++){
	echo $transcriptCourses[$i] . '<br>';
	}
	exit;

?>

</body>
</html>
