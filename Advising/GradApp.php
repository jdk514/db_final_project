<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
  "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <title>Apply for graduation!</title>
</head>
<body>
  <h2>Application for Graduation</h2>
  <?php
  	session_start();

//Connect to the database
$dbc = mysql_connect("localhost", "cojennin", "Swnny.D8y!")
    or die('Error connecting to MySQL server.');
    
//Select my database
mysql_select_db("cojennin", $dbc);

  $GWUID = $_SESSION['GWUID'];
  $approved = True;
   
//Obsolete
//   //Check that GWUID entered is valid 
//   if (strlen($GWUID) < 1) {
//   		$approved = false;
//   		$error = "Please enter your GWID";
//   }

//If the form is filled out correctly check if valid student
  if ($approved) {
  
	   //Query database to check enrollment
	  $query = "Select GWUID FROM Students
			WHERE GWUID = $GWUID";
		

	//Store the output of the query
	  $result = mysql_query($query)
		or die('Error querying database (1)');
	
	//Pull the name of the
	$row = mysql_fetch_array($result);
	$getID = $row['GWUID'];
	
	if (strlen($getID) < 1) {
		$approved = false;
		$error = 'Not a registered student. Please check your GWUID.';
	}
}

//If valid GWUID, check if form previous filled out
  if ($approved) {
  	//See if the student as already applied to graduate
	  $query = "Select GWUID FROM PendingRequests
			WHERE GWUID = $GWUID";
			
	//Store the output of the query
	  $result = mysql_query($query)
		or die('Error querying database (2)');
		
	$row = mysql_fetch_array($result);

	//If it exists in table, return error
	if ($row['GWUID'] != null) {
		$approved = false;
		$error =  "You have already applied to graduate. An advisor will contact you shortly.<br>";
		}	
		
  //Make sure student hasn't already graduated
	  $query = "Select GWUID FROM Alumni
			WHERE GWUID = $GWUID";
			
	//Store the output of the query
	  $result = mysql_query($query)
		or die('Error querying database (2)');
		
	$row = mysql_fetch_array($result);

	//If it exists in table, return error
	if ($row['GWUID'] != null) {
		$approved = false;
		$error =  "According to our records, you have already graduated. Please contact your advisor.<br>";
		}	

	}
	

if ($approved){  
//Get the chosen degree from Form1
$degree = $row['Degree'];


//Get the requirements of the chosen degree
//Query to get the requirements
$query = "Select * FROM DegreeReqs
		WHERE Degree = '$degree'";
		

//Store the output of the query
 $result = mysql_query($query)
	or die('Error querying database (30)');
		
$row = mysql_fetch_array($result);
		
  
$minGPA = $row['MinGpa']; 
$NumBadGrades = $row['NumBadGrades']; 
$LowGrade = $row['LowGrade']; 
}
  

//Create an array of selected courses listed on Form 1 and 
//check if they were fulfilled against transcript

if ($approved) {
//Get student's Form1 courses from the database
	$query = "Select CourseID FROM Form1			   
			WHERE GWUID = '$GWUID'";

	//Store the output of the query
	  $result = mysql_query($query)
		or die('Error querying database');
		
	$i = 0;
	while ($row = mysql_fetch_array($result)) {
		$form1Courses[$i] = $row['CourseID'];
		$i++;
		}

//Print
echo "<br>Form 1 Courses <br>";
for ($i = 0; $i<count($form1Courses); $i++){
	echo $form1Courses[$i] . '<br>';
	}

$badGrades = 0;

	//Get student's Transcript courses from the database (TEAM 16)
	$query = "Select * FROM tp_transcript_courses, tp_course_dept, tp_course			   
			WHERE user_id = '$GWUID' AND  cdid = course_id AND cdid = cid";

	//Store the output of the query
	  $result = mysql_query($query)
		or die('Error querying database');		
		
	
	$i = 0;
	$totalCredits = 0;
	$qualityPoints = 0;
	
	while ($row = mysql_fetch_array($result)) {
	
		$transcriptCoursesNums[$i] = $row['cdid'];
		$transcriptCourses[$i] = $row['dept_name'] . ' ' . $row['dept_num'];
		
		//Add "quality points"
			$getGrade = $row['course_grade'];
			$getCredits = $row['credits'];
			
			if (strcmp($getGrade, 'A') == 0) $grade=4.0;
			if (strcmp($getGrade, 'A-') == 0) $grade=3.7;
			if (strcmp($getGrade, 'B+') == 0) $grade=3.3;
			if (strcmp($getGrade, 'B') == 0) $grade=3.0;
			if (strcmp($getGrade, 'B-') == 0) $grade=2.7;
			if (strcmp($getGrade, 'C+') == 0) $grade=2.3;
			if (strcmp($getGrade, 'C') == 0) $grade=2.0;
			if (strcmp($getGrade, 'C-') == 0) $grade=1.7;
			if (strcmp($getGrade, 'D+') == 0) $grade=1.3;
			if (strcmp($getGrade, 'D') == 0) $grade=1.0;
			if (strcmp($getGrade, 'D–') == 0) $grade=0.7;
			if (strcmp($getGrade, 'F') == 0) $grade=0;
			
			
			//Calculate quality points for the grade given
			$calcQuality = $grade * $getCredits;
			//Add total credit and quality points
			$qualityPoints += $calcQuality;
			$totalCredits += $getCredits;
}

//Calucluate GPA
echo "Total credits: $totalCredits<br>";
echo "Total quality points: $qualityPoints<br>";

$GPA = $qualityPoints / $totalCredits;
echo "GPA: $GPA<br>";
		

//Print
echo "<br>Transcript Courses <br>";
for ($i = 0; $i<count($transcriptCourses); $i++){
	echo $transcriptCourses[$i] . '<br>';
	}

//Check that each course on Form 1 is on the transcript
for ($i=0; $i<count($form1Courses); $i++) {
	$found = False;
	for ($j=0; $j<count($transcriptCourses); $j++) {

		if (strcmp($form1Courses[$i], $transcriptCourses[$j]) == 0) {
			$found = True;
			
			
			//Check for a "bad" grade for the form1 course

			$query = "Select * FROM tp_transcript_courses, tp_course_dept				   
			WHERE user_id = '$GWUID' AND course_id = '$transcriptCoursesNum[$j]' AND  cdid = course_id";

			//Store the output of the query
		  $result = mysql_query($query)
			or die('Error querying database');		
			
			$getGrade = $row['course_grade'];
			
			echo "******Checking:<br>";
			echo "Course: $transcriptCourses[$j]<br>";
			echo "Grade: $getGrade<br>";


			
		
			if (strcmp($getGrade, 'A') == 0) $grade=4.0;
			if (strcmp($getGrade, 'A-') == 0) $grade=3.7;
			if (strcmp($getGrade, 'B+') == 0) $grade=3.3;
			if (strcmp($getGrade, 'B') == 0) $grade=3.0;
			if (strcmp($getGrade, 'B-') == 0) $grade=2.7;
			if (strcmp($getGrade, 'C+') == 0) $grade=2.3;
			if (strcmp($getGrade, 'C') == 0) $grade=2.0;
			if (strcmp($getGrade, 'C-') == 0) $grade=1.7;
			if (strcmp($getGrade, 'D+') == 0) $grade=1.3;
			if (strcmp($getGrade, 'D') == 0) $grade=1.0;
			if (strcmp($getGrade, 'D–') == 0) $grade=0.7;
			if (strcmp($getGrade, 'F') == 0) $grade=0;
		
			if ($grade < $LowGrade) {
			echo "Grade is bad!<br>";
					$badGrades++;
					}		
}
			
			
		}
	}
	
	if (!$found) {
		$approved = false;
		$error = "You did not take $form1Courses[$i], listed on Form 1.<br>";
		}
}

if ($badGrades > 2) {
	$approved = false;
	$error = 'More than 2 grades below a B-';
	}

if ($approved) {
  //Perform check to ensure the student has a GPA of x >= 3.0 
  	$query = "Select GPA
  				FROM Students
  				WHERE GWUID = '$GWUID'";
  				
  	//Store the output of the query
	  $result = mysql_query($query)
		or die('Error querying database');
		
	$row = mysql_fetch_array($result);
	$getGPA = $row['GPA'];
  	print "<br>Your GPA: $getGPA<br>";
  		
 	if ($getGPA < 3.0)  {
 	$approved = False;
	$error =  'GPA is under 3.0  <br>';
	}
}

if ($approved) {
  //Query the database to check that Form 1 has been submitted for the GWUID entered
	  $query = "Select * 
	  			FROM Students			   
				WHERE GWUID = $GWUID;";
	
	//Store the output of the query
	$result = mysql_query($query)
		or die('Error querying database(1)');
			 
	$row = mysql_fetch_array($result);
	
	$Fname = $row['Fname'];
	$Lname = $row['Lname'];


	print "<br> Congratulations! You have been electronically approved to graduate. 
		An advisor will review your application shortly.<br>";
		
	//Add to pending graduates table
	$query = "INSERT INTO PendingRequests values ('$GWUID', '$Fname', '$Lname')";
  				
  	//Store the output of the query
	  $result = mysql_query($query)
		or die('Error querying database');
		}

if (!$approved) {
	print "<br> Denied. You are not approved to graduate<br>";
	print "Reason: $error<br>";
	print "Please contact you advisor for assistance.";
	
	}
  
exit;
?>

</body>
</html>