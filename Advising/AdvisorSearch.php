<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
  "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <title>Student Search</title>
</head>
<body>
  <h2>Student Search</h2>
  <?php
  $searchBY = $_POST['group3'];
  $search = $_POST['Search'];
  
  if ($searchBY == 0) $field = 'uid';
  if ($searchBY == 1) $field = 'fname';
  if ($searchBY == 0) $field = 'lname';

/Connect to the database
$dbc = mysql_connect("localhost", "cojennin", "Swnny.D8y!")
    or die('Error connecting to MySQL server.');
    
//Select my database
mysql_select_db("cojennin", $dbc);

//Query database get advisor's students
	  $query = "Select  * FROM tp_users, tp_student_advisors WHERE role_id=1 AND $searchBY = '$search'";
	  
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
		print '<input type="radio" name="group" value="$getGWUID" checked> View<br>';
		print "<br>";
		$j++;
		}
print "</table>";

		
if ($j == 0) print "No Students Found<br>";
else {
print '<input type="submit" value="View Transcript" name="submit" />';
}
print '</form><br><br>';

?>


</body>
</html>

  
  