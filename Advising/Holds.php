<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
  "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <title>Academic Advisor Page</title>
</head>
<body>
  <h2>Freshmen on Hold</h2>
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
print "Here is the list of students who have a hold on their account. Select a student to view the courses they have selected. <br>";

//Query database get pensing graduation requests
	  $query = "Select * FROM Students, tp_users_meta WHERE waiting_approval=1";
	  
	  //Store the output of the query
	  $result = mysql_query($query)
		or die('Error querying database (2)');
	
	//Pull the id of each student in table
	$checkbox = ' ';
	$i = 0;
	while ($row = mysql_fetch_array($result)){
		$getGWUID = $row['user_id'];

}
exit;
?>

</body>
</html>