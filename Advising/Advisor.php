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
	print '<table border="1">';
	print "<tr><td> Student ID <td> First Name <td> Last Name <td> View Courses";
	while ($row = mysql_fetch_array($result)){
		print "<tr>";
		$getGWUID = $row['uid'];
		print "<td>$getGWUID  ";
		print "<td> " .$row['fname'];
		print "<td> ". $row['lname'];		
		//Insert unique check box, title = GWUID
		$checkbox = "<td><input name='$getGWUID' type='checkbox' id='checkbox[]' value='approved'></td><br>";
		echo  $checkbox;
		print "<br>";
		$i++;
		}
		
print "</table>";
if ($i ==0) print "No students on hold<br>";
else {
print '<input type="submit" value="Submit" name="submit" />';
}
print '</form>';
}
  
print "<h4>Your Students:</h4>";


print "Here are the list of the students you are advising. Select a student to view their transcript. You can also search for a record below.";

//Query database get advisor's students
	  $query = "Select  * FROM tp_users, tp_student_advisors WHERE advisor_id = '$AdvID' AND role_id=1 AND uid = user_id";
	  
	  //Store the output of the query
	  $result = mysql_query($query)
		or die('Error querying database (2)');
	
print '<form method="post" action="view_transcript.php">';

	
	
	//Pull the id of each student in table
	$button = ' ';
	$j = 0;
	
print '<table border="1">';
print "<tr><td> Student ID <td> First Name <td> Last Name <td> View Transcript";	
while ($row = mysql_fetch_array($result)) {
		print "<tr>";
		$getGWUID = $row['uid'];
		print "<td>$getGWUID  ";
		print "<td> " .$row['fname'];
		print "<td> ". $row['lname'];			
		//Insert unique  radio, title = GWUID
		echo '<td>';
		print '<input type="radio" name="StudentID" value="'.$getGWUID.'" checked> View<br>';
		print "<br>";
		$j++;
		}
print "</table>";

		
if ($j == 0) print "You are not advising any students<br>";
else {
print '<input type="submit" value="View Transcript" name="submit" />';
}
print '</form><br><br>';


print "<h4> Search for any registered student: <h4>";

//Search for a specific student
print ' <form method="post" action="AdvisorSearch.php">
    <label for="Search">Search:</label>
    <input type="text" id="Search" name="Search" /><br /><br />
        
    <label for="group3">Search by:</label><br>
    <input type="radio" name="group3" value="0" checked> GWU ID<br>
    <input type="radio" name="group3" value="1"> First Name<br>
    <input type="radio" name="group3" value="2"> Last Name<br>
 
    <br>
    <input type="submit" value="Search" name="submit" />
  </form>';
?>


</body>
</html>

