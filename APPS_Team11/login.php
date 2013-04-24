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

function query ($searchquery){
	if(is_numeric($searchquery["user"])){
		$gsid = $searchquery["user"];//should fix to check that this is an int value
	}else{
		$gsid = 0;
	}

	$pass = $searchquery["password"];
	$_SESSION["username"]=$gsid;
	if(substr($searchquery["user"], 0, 1)=='1'){
		login($gsid, $pass, "studentid", "Student", "login_Student", "student_page.php");
	}else if(substr($searchquery["user"], 0, 1)=='2'){
		login($gsid, $pass, "reviewerid", "Reviewers", "login_Reviewer", "list.php");
	}else if(substr($searchquery["user"], 0, 1)=='3'){
		login($gsid, $pass, "gsid", "GA", "login_GA", "ga_page.php");
	}else{
		$_SESSION["login"]="false";
	}
}

function login($gsid, $pass, $sqlid, $sqltable, $login, $redirect){
	require_once "config.php";
	$query = "SELECT $sqlid FROM $sqltable WHERE $sqlid = $gsid AND loginpassword ='$pass'";//check to see if the combo exists in db
    $result = mysql_query($query)
    or die('Error querying database.');
    $result = mysql_fetch_row($result);
    if(empty($result)){
    	$_SESSION["login"] = "false";
    }else{
    	$_SESSION[$login] = "true";
		?>
			<script>
			window.location = "<?=$redirect?>"
			</script>
		<?php
    }
}
?>
<head>
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
</head>

</html>
