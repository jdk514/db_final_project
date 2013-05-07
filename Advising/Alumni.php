<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
  "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <title>Alumni Account Management</title>
</head>
<body>
  <h2>Alumni Account Management</h2>
  <?php
  	session_start();

//Connect to the database
$dbc = mysql_connect("localhost", "cojennin", "Swnny.D8y!")
    or die('Error connecting to MySQL server.');
    
//Select my database
mysql_select_db("cojennin", $dbc);
$login = true;

  $GWUID= $_SESSION['GWUID'];
  

     
	//Query database to check for valid Alumni
	  $query = "Select * FROM Alumni, tp_address
			WHERE GWUID = $GWUID AND user_id = $GWUID";	
			
	//Store the output of the query
	  $result = mysql_query($query)
		or die('Error querying database (1)');
	
	$row = mysql_fetch_array($result);
	$getID = $row['GWUID'];
	if (strlen($getID) < 1) {
		echo 'Error: Not a registered Alumni. Please conctact the system adminstrator.';
		$login = false;
	}
	
	//If they are a valid Alumni, print their informationa and provide a checkbox to edit contact information.
	if ($login) {
	echo "Welcome to the Alumni account management page!<br>Please make sure the information below is up to date.<br>";
	echo "<br>Name: " . $row['Fname'] ." ". $row['Lname'] . "<br>";
	echo "GWUID: $GWUID<br>";
	echo "Graduated: " . $row['SemesterGrad'] . " " . $row['YearGrad'] ."<br>";
	echo "GPA: ". $row['GPA'] . "<br><br>";
	
	echo '<form method="post" action="AlumniEdit.php">';
	echo "Contact Information (click the check box to edit):<br>";
	$checkbox1 = "<td><input name='Email' type='checkbox' id='checkbox[]' value='approved'>";
	$checkbox2 = "<td><input name='Phone' type='checkbox' id='checkbox[]' value='approved'>";
	$checkbox3 = "<td><input name='Street1' type='checkbox' id='checkbox[]' value='approved'>";
	$checkbox4 = "<td><input name='Street2' type='checkbox' id='checkbox[]' value='approved'>";
	$checkbox5 = "<td><input name='state_prov' type='checkbox' id='checkbox[]' value='approved'>";
	$checkbox6 = "<td><input name='zipcode' type='checkbox' id='checkbox[]' value='approved'>";
	$checkbox7 = "<td><input name='city' type='checkbox' id='checkbox[]' value='approved'>";

	echo "Email: " . $row['Email'] . $checkbox1 . "<br>";
	echo "Phone: " . $row['PhoneNum']. $checkbox2 . "<br>";
	echo "<br>Address:<br>";
	echo "Street 1: ".$row['street1']. $checkbox3 . "<br>";
	echo "Street 2: ".$row['street2']. $checkbox4 . "<br>";
	echo "State/Province: ".$row['state_prov']. $checkbox5 . "<br>";
	echo "Zipcpde: ".$row['zipcode']. $checkbox6 . "<br>";
	echo "City: ".$row['city']. $checkbox7 . "<br>";

	
	echo '<input type="submit" value="Edit" name="submit" />';

	echo "</form>";
	
	
	print '<form method="post" action="alumni_transcript.php">';
	echo '<input type="submit" value="View Transcript" name="submit" />';
	$_SESSION['StudentID'] = $GWUID;
	print '</form>';

	}
	?>


</body>
</html>



	

	
	
	