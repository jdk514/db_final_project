<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
  "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <title>Form 1 Submission</title>
</head>
<body>
  <h2>Advising Form 1 Submission</h2>

<?php
session_start();
$GWUID = $_SESSION['GWUID'];

echo "YOUD ID: " . $GWUID . "<br>";




//Connect to the databse
$dbc = mysql_connect("localhost", "cojennin", "Swnny.D8y!")
    or die('Error connecting to MySQL server.');
    
//Select my database
mysql_select_db("cojennin", $dbc);


  //Get post variables
  $first_name = $_POST['firstname'];
  $last_name = $_POST['lastname'];
  $error = 'Unkown';
  //Set default vaule of approved to true
  $approved = True;
  //Get the selected degree
  $degree = $_POST['group1'];
  
  
  //Get the requirements of the chosen degree
  //Query to get the requirements
  $query = "Select * FROM DegreeReqs
		WHERE Degree = '$degree'";
		

	//Store the output of the query
	  $result = mysql_query($query)
		or die('Error querying database (30)');
		
	$row = mysql_fetch_array($result);
		
  $numReqs = $row['NumReqCourses'];
  
  
  $courses = array($_POST['course1'], $_POST['course2'], $_POST['course3'], $_POST['course4'], $_POST['course5'], $_POST['course6'],
  			 $_POST['course7'], $_POST['course8'], $_POST['course9'], $_POST['course10'], $_POST['course11'], $_POST['course12']);
     
// if (strlen($GWUID) < 2) {
//   		$approved = FALSE;
//   		$error = 'Please provide your GWUID.';
//   }
  
  
   if (strlen($last_name) < 2) {
  		$approved = FALSE;
  		$error = 'Please provide your Last Name.';
  }
 
 if (strlen($first_name) < 2) {
  		$approved = FALSE;
  		$error = 'Please provide your First Name.';
  }

//If the form is filled out correctly check if valid student
  if ($approved) {
  
	  //Query database to check enrollment
	  $query = "Select * FROM Students
			WHERE GWUID = $GWUID";
		

	//Store the output of the query
	  $result = mysql_query($query)
		or die('Error querying database (1000000)');
	
	//Pull the name of the
	$row = mysql_fetch_array($result);
	$getID = $row['GWUID'];
	if (strlen($getID) < 1) {
		$approved = false;
		$error = 'Not a registered student. Please check your GWUID.';
		
	}
	
	$getFname = $row['Fname'];
	$getLname = $row['Lname'];
	if ((strcmp($getFname, $first_name) != 0) || (strcmp($getLname, $last_name) != 0)) {
		$approved = false;
		$error = 'Name does not match name in database. Please enter your legal name';
	}

}

//If valid GWUID, check if form previous filled out
  if ($approved) {
  	//See if the student as already submitted a form1
	  $query = "Select GWUID FROM Form1
			WHERE GWUID = $GWUID";
			
	//Store the output of the query
	  $result = mysql_query($query)
		or die('Error querying database (2)');
		
	$row = mysql_fetch_array($result);

	//If it exists in table, return error
	if ($row['GWUID'] != null) {
		$approved = false;
		$error =  "You have previosuly submitted a Form1. Please contact your advisor.<br>";
		}	
	}
  
  
  
//Create an array of selected courses (to remove blanks and duplicates)
if ($approved) {
  	  for ($i=0; $i < count($courses); $i++) {
  	  	//Make sure a course was entered in field
  		if ($courses[$i] != ''){
  		
  			//Check if course was already added on form
  			$add = True;
  			for ($j=0; $j<count($selected_courses); $j++){
  				if ((strcmp($selected_courses[$j] , $courses[$i]) == 0) && ($add)) {
  					$add = false;
  					print "Course " . ($i+1) . " (" . $courses[$i] . ") was already selected. <br>";
  					}
  				}
  					
  			if ($add) { 
				$selected_courses[$j] = $courses[$i];
				$j++;
				}		
  			}
  		}
  	}
  
  //Make sure the min number of courses for the chosen degree are chosen
  if ($approved && count($selected_courses) <  $numReqs) {
  		$approved = FALSE;
		$error = "Must select at least  " . $numReqs . " courses for the " . $degree . " Degree.";
		}
  

if ($approved) {	
//Go through each selected course, make sure it is a valid course 
//and check if the student has selected the prerequisites.
for ($i=0; $i<count($selected_courses); $i++) {
	
	//Query database get list of courses.
// 	print "****Checking course database for " . $selected_courses[$i] . "<br>";
	
	  $query = "Select * FROM CoursePrerequisites			   
			WHERE CourseNum = '$selected_courses[$i]'";
		

	//Store the output of the query
	  $result = mysql_query($query)
		or die('Error querying database (3)');
		
	$row = mysql_fetch_array($result);

	if (strlen($row['CourseNum']) < 1)  {
		echo $selected_courses[$i] . " is not a valid course. <br>";
		$approved = false;
		$error = 'Invalid course number(s)<br>';
		}
	}
}
  	
  	
//See if degree course requirements are met
if ($approved) {
	//Get the specific required courses from the database
	$query = "Select CourseID FROM RequiredCourses			   
			WHERE Degree = '$degree'";

	//Store the output of the query
	  $result = mysql_query($query)
		or die('Error querying database (4)');
		
	$i = 0;
	while ($row = mysql_fetch_array($result)) {
		$requiredCourses[$i] = $row['CourseID'];
		$i++;
		}
	}
	
	//Check that each required course was selected
	for ($i = 0; $i < count($requiredCourses); $i++) {
// 	echo "****Looking for required course: " . $requiredCourses[$i] . "<br>";
		$courseFound = FALSE;
		for ($j = 0; $j < count($selected_courses); $j++){
			if (strcmp($requiredCourses[$i], $selected_courses[$j]) == 0) {
				$courseFound = TRUE;
				}
		}
		if (!$courseFound) {
			$approved = false;
			$error = "Must take " . $requiredCourses[$i] . " to complete the " . $degree . " degree.<br>";
			}
	}



if ($approved) {
	  echo 'Thanks for submitting the form. Your form has been approved. <br />';
	  echo 'Your name: ' . $first_name . ' '. $last_name . '<br />';
	  echo 'GWU ID: ' . $GWUID . '<br />';
	  echo '<br />';
	  echo 'Courses selected: ' . '<br />';
	  
	  for ($i=0; $i < count($selected_courses); $i++) {
  			echo $selected_courses[$i] . '<br />';
  			//Store data into form1 table (change from harcode degree)
		     $query = "INSERT INTO Form1 values ($GWUID, '$degree', '$selected_courses[$i]')";

// 		     echo "****" .$query."<br>";
		     
		     //Store the output of the query
	  		$result = mysql_query($query)
			 	or die('Error querying database(5)');
  			}
  		}
  		  	
if(!$approved) {
	echo '<br>Your form has not been approved. <br />';
	echo 'Reason: ' . $error. '<br />';
	echo 'Please go back to correct this error and resubmit the form.';
}
exit;
?>

</body>
</html>
