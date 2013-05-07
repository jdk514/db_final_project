<html>
<head>
<title>Edit Contact Information</title>
</head>
<body>
<h2>  Edit Contact Information
</h2>


<?php
session_start();

$newEmail = $_POST['Email'];
$newPhone = $_POST['PhoneNum'];
$newStreet1 = $_POST['Street1'];
$newStreet2 = $_POST['Street2'];
$newState_prov = $_POST['state_prov'];
$newzipcode = $_POST['zipcode'];
$newCity = $_POST['city'];



$GWUID = $_SESSION['GWUID'];
$login = true;

//Connect to the database
$dbc = mysql_connect("localhost", "cojennin", "Swnny.D8y!")
    or die('Error connecting to MySQL server.');
    
//Select my database
mysql_select_db("cojennin", $dbc);

//Query database to check for valid Alumni
    $query1 = "Select * FROM Alumni
			WHERE GWUID = $GWUID";		

	//Store the output of the query
	  $result1 = mysql_query($query1)
		or die('Error querying database (1)');
	
	$row1 = mysql_fetch_array($result1);
	$getID = $row1['GWUID'];
	if (strlen($getID) < 1) {
		echo 'Error: Not a registered Alumni. Please check your Alumni ID.';
		$login = false;
	}


if ($login){
//If there is a value entered, modify the entry in the Alumni table
if ($newEmail != null) {
echo "New Email: $newEmail<br>";
	  $query = "Update Alumni SET Email = '$newEmail' WHERE GWUID = $GWUID";		

	//Store the output of the query
	  $result = mysql_query($query)
		or die('Error querying database (10)');
}

if ($newPhone != null) {
echo "New Phone: $newPhone<br>";
	  $query = "Update Alumni SET PhoneNum = $newPhone WHERE GWUID = $GWUID";		

	//Store the output of the query
	  $result = mysql_query($query)
		or die('Error querying database (9)');
}

if ($newStreet1 != null) {
echo "New Street 1: $newStreet1<br>";
	  $query = "Update tp_address SET street1 = '$newStreet1' WHERE user_id = $GWUID";		

	//Store the output of the query
	  $result = mysql_query($query)
		or die('Error querying database (8)');
}

if ($newStreet2 != null) {
echo "New Street 2: $newStreet2<br>";
	  $query = "Update tp_address SET street2 = '$newStreet2' WHERE user_id = $GWUID";		

	//Store the output of the query
	  $result = mysql_query($query)
		or die('Error querying database (8)');
}

if ($newState_prov != null) {
echo "New State / Province: $newState_prov<br>";
//Query database to check for valid Alumni
	  $query = "Update tp_address SET state_prov = '$newState_prov' WHERE user_id = $GWUID";		

	//Store the output of the query
	  $result = mysql_query($query)
		or die('Error querying database (8)');
}


if ($newzipcode != null) {
echo "New Zipcode: $newzipcode<br>";
//Query database to check for valid Alumni
	  $query = "Update tp_address SET zipcode = '$newzipcode' WHERE user_id = $GWUID";		

	//Store the output of the query
	  $result = mysql_query($query)
		or die('Error querying database (8)');
}

if ($newCity != null) {
echo "New City: $newCity<br>";
//Query database to check for valid Alumni
	  $query = "Update tp_address SET city = '$newCity' WHERE user_id = $GWUID";		

	//Store the output of the query
	  $result = mysql_query($query)
		or die('Error querying database (8)');
}

$link = "location.href='http://www.student.seas.gwu.edu/~awp1121/Alumni.php'";
echo "<button onclick=$link>";
echo "Return to Alumni Home</button>
     <br><br>";

}

?>
</body>
</html>
