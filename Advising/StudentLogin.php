<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
  "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <title>Student Login</title>
  <link rel="stylesheet" type="text/css" href="style.css" />
</head>
<body>
  <h2>Student Login</h2>
  <?php
  	session_start();

print "Your User Name: " . $_SESSION['UserName'];

  ?>

  <p>Please select an action below:</p>
  <form method="post" action="Student.php">
<label for="group1">Select Status:</label><br>

    <input type="radio" name="group1" value="0" checked> Complete Form 1<br>
    <input type="radio" name="group1" value="1"> Apply for Graduation<br>
    <input type="submit" value="Submit" name="submit" />
  </form>
</body>
</html>
