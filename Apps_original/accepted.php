<?php
include 'header.php';
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
	<div id="main">
		<div id="content">
			<div style="text-align:center">
            	Student Status Page</br></br>
			<div>
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
		</div>
	</div>
</div>
<!--<head>
		<?php if(!empty($_POST)) query($_POST); ?>
	<body class="body">
		<div id="header">
			GWU Login Page</br>
			<?php if($_SESSION["login"]=="false") echo ("Login Failed");
				$_SESSION["login"]=" ";
			?>
		<div id="main">
			<form name="login" action="login.php" method="post">
				Username: <input type="text" name="user"> Password: <input type="text" name="password">
				<br/> <br/> <input type="submit" Value="Login">
			</form>
		</div>
	</body>
</head>-->

<?php include 'footer.php'; ?>
