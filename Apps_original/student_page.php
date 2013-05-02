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

$_SESSION["login_Student"] = "true";

function query(){
    require_once "config.php";
    $student = (int)$_SESSION["username"];
    $query = "SELECT studentid, firstname, lastname, studentstatus FROM Student WHERE studentid=$student";
    $result = mysql_query($query)
    or die('Error querying database.');
    $result = mysql_fetch_row($result);
    return $result;
}

?>
<head>
    <?php if($_SESSION["login_Student"] = "true") :?>
    <body class="body">
        <div id="header">
            Student Status Page</br>
        <div id="main">
            <?php $status=query();
                echo ($status[1]." ".$status[2].": ".$status[3]);
                if($status[3]=="Accepted"){
                    ?>
                    <form name="Accept" action="accepted.php" method="post"><br/>
                        <input type="submit" name="Status" value="Enroll">
                        <input type="submit" name="Status" value="Reject">
                        <input type="submit" name="Status" value="Defer">
                    </form>
                    <?php
                }
                if ($status[3]=="Enroll"){
                    ?>
                    <p>Congratulations on your acceptance! Welcome to GWU, click <a href="registration.php">here</a>
                        to begin your registration.</p>
                        <?php
                }
            ?>
        </div>
    </body>
    <?php else :?>
        <script>
            window.location = "login.php"
        </script>
    <?php endif?>
</head>
</html>