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

  <form method="post" action="GradApp.php">
<!-- 
    <label for="GWUID">Enter your GWU ID:</label>
    <input type="text" id="GWUID" name="GWUID" /><br /><br />
    <label for="group1">Select Degree:</label>
    <input type="radio" name="group1" value="MS" checked> MS<br>
 -->
 
<?php
	session_start();

$GWUID = $_SESSION['GWUID'];

//Connect to the database
$dbc = mysql_connect("localhost", "awp1121", "hrBBGI@U")
    or die('Error connecting to MySQL server.');
    
//Select my database
mysql_select_db("awp1121", $dbc);


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
		echo 'You did not submit a Form1. Please go back and fill it out before applying. <br>';
		}
	else {
		
	//Store the output of the query
	  $result = mysql_query($query)
		or die('Error querying database');
	
	print "Your GWUID: $GWUID <br><br>";
	print "Your Form 1 Courses: <br>";
	while ($row = mysql_fetch_array($result)) {
		print $row['CourseID'] . "<br>";
		}
		}

?>
    <input type="submit" value="Apply For Graduation" name="submit" />
  </form>
</body>
</html>
