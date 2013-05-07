<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
  "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <title>Academic Advisor Home Page</title>
</head>
<body>
  <h2>Academic Advisor Home Page</h2>
  <h4>Students on Hold</h4>
  <?php
  session_start();

//Connect to the database
$dbc = mysql_connect("localhost", "cojennin", "Swnny.D8y!")
    or die('Error connecting to MySQL server.');
    
//Select my database
mysql_select_db("cojennin", $dbc);
$login = true;

$AdvID = $_SESSION['GWUID'];
  
	
if ($login) {
print '<form method="post" action="Holds.php">';
print "Here is the list of students who have a hold on their account. Select a student to view the courses they have selected. <br><br>";

//Query database get pensing graduation requests
	  $query = "Select * FROM tp_users, tp_users_meta WHERE meta_key ='waiting_approval' AND meta_val=1 AND uid = user_id";
	  
	  //Store the output of the query
	  $result = mysql_query($query)
		or die('Error querying database (2)');
	
	//Pull the id of each student in table
	$checkbox = ' ';
	$i = 0;
	while ($row = mysql_fetch_array($result)){
		$getGWUID = $row['uid'];
		print "$getGWUID	" . $row['fname'] . "	" . $row['lname'] . "	";		
		//Insert unique check box, title = GWUID
		echo '<tr>';
		$checkbox = "<td><input name='$getGWUID' type='checkbox' id='checkbox[]' value='approved'></td><br>";
		echo  $checkbox;
		echo'<tr>';
		print "<br>";
		$i++;
		}
if ($i ==0) print "No students on hold<br>";
else {
print '<input type="submit" value="Submit" name="submit" />';
}
print '</form>';
}
  
print "<h4>Your Students:</h4>";






print "Here are the list of your students. Select a student to view their transcript. You can also search for a record below.";

//Query database get advisor's students
	  $query = "Select * FROM Students, tp_student_advisors WHERE advisor_id = '$AdvID'";
	  
	  //Store the output of the query
	  $result = mysql_query($query)
		or die('Error querying database (2)');
	
print '<form method="post" action="view_transcript.php">';

	
	
	//Pull the id of each student in table
	$button = ' ';
	$j = 0;
	
// while ($row = mysql_fetch_array($result)) {
// 		$getGWUID = $row['user_id'];
// 		print "$getGWUID	" . $row['Fname'] . "	" . $row['Lname'] . "	";		
// 		//Insert unique  radio, title = GWUID
// 		echo '<tr>';
// 		print '<input type="radio" name="group" value="$getGWUID" checked> View<br>';
// 		echo '<tr>';
// 		print "<br>";
// 		$j++;
// 		}

		
if ($j == 0) print "You are not advising any students<br>";
else {
print '<input type="submit" value="View Transcript" name="submit" />';
}
print '</form>';
}

?>


</body>
</html>

