<?php
include 'header.php';
session_start();

function query ($searchquery){
	$pass = $searchquery["password"];
	$gsid = $searchquery["user"];
	$_SESSION["username"]=$gsid;
	if(substr($searchquery["user"], 0, 1)=='1'){
		login($gsid, $pass, "studentid", "Student", "login_Student", "student_page.php");
	}else if(!is_numeric($searchquery["user"])){
		login_faculty($gsid, $pass, "user_name", "tp_users", "login_Reviewer", "list.php");
	}else if(substr($searchquery["user"], 0, 1)=='3'){
		login($gsid, $pass, "gsid", "GA", "login_GA", "ga_page.php");
	}else{
		$_SESSION["login"]="false";
	}
}

function login($gsid, $pass, $sqlid, $sqltable, $login, $redirect){
	require_once "config.php";
	$query = "SELECT $sqlid FROM $sqltable WHERE $sqlid=$gsid AND loginpassword='$pass'";//check to see if the combo exists in db
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

function login_faculty($gsid, $pass, $sqlid, $sqltable, $login, $redirect){
	require_once 'include/db_mysql.php';
	$db = new db;
	$db->connect('localhost', 'cojennin', 'Swnny.D8y!', 'cojennin',1);
	$query = "SELECT $sqlid FROM $sqltable WHERE $sqlid = '$gsid' AND user_pass='$pass' AND role_id=3";//check to see if the combo exists in db
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
	<div id="main">
		<div id="content">
			<?php if(!empty($_POST)) query($_POST); ?>
			<div style="text-align:center">
				Application Login Page</br></br>
				<?php if($_SESSION["login"]=="false") echo ("Login Failed");
					$_SESSION["login"]=" ";
				?>
			<div>
				<form name="login" action="login.php" method="post">
					Username: <input type="text" name="user"></br>
					Password: <input type="text" name="password">
					<br/><input type="submit" Value="Login">
				</form>
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
