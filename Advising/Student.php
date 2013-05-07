<html>
<head>
<title></title>
</head>
<body>
<h2>  
</h2>

<?php


$getSelected = $_POST['group1']; 

if ($getSelected == '0') header("Location: http://www.student.seas.gwu.edu/~awp1121/CourseForm.php");
if ($getSelected == '1') header("Location: http://www.student.seas.gwu.edu/~awp1121/ApplyForGraduation.php");

   exit;
?>
</body>
</html>
