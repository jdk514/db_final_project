<html>
<head>
<title></title>
</head>
<body>
<h2>  
</h2>

<?php
$UserName = $_POST['UName'];
$Password = $_POST['Password']; 
$login = true;

//Connect to the database
$dbc = mysql_connect("localhost", "cojennin", "Swnny.D8y!")
    or die('Error connecting to MySQL server.');
    
//Select my database
mysql_select_db("cojennin", $dbc);

if (strlen($UserName) < 1) {
	$login = false;
	echo "Please enter a User Name";
	}

if ($login){
//Query login database to check for a valid user
$query = "Select * FROM tp_users
			WHERE user_name = '$UserName'";
		
//Store the output of the query
$result = mysql_query($query)
	or die('Error querying database (1)');
	
//Pull the user id from the databse and see if the user exists
$row = mysql_fetch_array($result);
	$getID = $row['uid'];
	if (strlen($getID) < 1) {
		echo 'Error: Not a registered user. Please check your User Name.';
		$login = false;
	}
	
	//If the user exists, get the password from the query result and compare with input password
	if ($login){
	$getPassword = $row['user_pass'];
	if (strcmp($getPassword, $Password) != 0){
		echo "Password incorrect<br>";
		$login = false;
	}
	}
	}
	
	
	//If login succesfull, query the database to get user role
	if ($login) {
	session_start();
	
		$_SESSION['GWUID']= $getID;
		$_SESSION['UserName']= $UserName;
		$_SESSION['fName']= $row['fname'];
		$_SESSION['lName']= $row['lname'];

		
		$getRole = $row['role_id'];
		
		//Depending on role, redirect to appropriate PHP page
		//1=grad student
		if ($getRole == 1) header("Location: http://www.student.seas.gwu.edu/~awp1121/StudentLogin.php");
		
		//2= GS
		if ($getRole == 2) header("Location: http://www.student.seas.gwu.edu/~awp1121/GS.php");

		//3=Professor
		if ($getRole == 3) {

		$query = "SELECT meta_val FROM tp_users_meta WHERE meta_key = 'is_advisor' AND user_id = '$getID'";
			$is_adv = mysql_query( $query );
			$is_advisor = mysql_fetch_array($is_adv);
			if( !is_null( $is_advisor ) ){
				echo "TEST<br>";
				header("Location: http://www.student.seas.gwu.edu/~awp1121/Advisor.php");
				}
			//else header("Location: http://www.student.seas.gwu.edu/~awp1121/Advisor.php");
			}
		
		//4=System Admin
		//5=Faculty Advisor
		//Depricated
 		if ($getRole == 5) header("Location: http://www.student.seas.gwu.edu/~awp1121/Advisor.php");

		
		//6=Alumni (added by Team 17)
		if ($getRole == 6) header("Location: http://www.student.seas.gwu.edu/~awp1121/Alumni.php");

	}
	
	
	
	
   exit;
?>
</body>
</html>