<html>
<style>
body {
    margin: 50px 0px;
    padding: 10px;
    text-align: center;
}

div#main {
    width: 600px;
    margin: 0px auto;
    padding: 15px;
    border: 1px solid #000000;
    background-color: lightblue;
    text-align: center;
    box-shadow: 10px 10px 5px #888888;
}
div#header{
	width: 600px;
	margin: 0px auto;
	text-align: center;
	padding: 15px 15px 15px 15px;
}
</style>

<?php

session_start();

function query(){
    $status = $_POST["Status"];
    $student = (int)$_SESSION["username"];
    require_once "config.php";
    $query = "UPDATE Student SET studentstatus='$status' WHERE studentid=$student";
    mysql_query($query)
    or die('Error querying database.');
    if($status=="Enroll"){
        $query = "INSERT INTO app_to_reg (studentid, firstname, lastname, email, loginpassword, dsought) SELECT
        Student.studentid, Student.firstname, Student.lastname, Student.email, Student.loginpassword, Applications.dsought FROM Student, Applications
        Where Student.studentid=$student AND Student.studentid=Applications.studentid";
        mysql_query($query)
        or die('Error querying database.');
    }
}

?>
<head>
    <body class="body">
        <div id="header">
            Student Status Page</br>
        <div id="main">
            <?php
                query();
                $status=$_POST["Status"];
                if($status=="Enroll"){
                    print("<p>You have been enrolled in GWU. You can click <a href='registration.php'>here</a> to begin registration");
                }else if($status=="Defer"){
                    print("<p>You have one year to officially enroll at GWU. We hope to hear from you soon");
                }else{
                    print("<p>We're glad we didn't want you here anyways");
                }
            ?>
        </div>
    </body>
</head>
</html>