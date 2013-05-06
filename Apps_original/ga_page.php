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
div#select{
	padding: 15px 15px;}
</style>
<?php
	session_start();

	if(!empty($_POST)){//check to see if we have updated the fields
		update_query($_POST);//if it has we should update the db to reflect alterations
		echo("Students Updated");
	}

	function single_query($input){
		$name = preg_split('/\s/', $input);
		$first = $name[0];
		$last = $name[1];
		$id = (int)$input;
		require_once "config.php";
		$failed = "Nothing found";
		$table = Array();//array to hold the results of the query
		$query = "SELECT studentid, firstname, lastname, studentstatus FROM Student WHERE firstname='$first' OR lastname='$last' OR studentid=$id OR lastname='$first'";
		$result = mysql_query($query)
	        or die('Error querying database.');
        while($row = mysql_fetch_row($result)){
        	array_push($table, $row);//add each student to the array
        }
        if(is_null($result)){
        	return $failed;
        }else{
        	return $table;
        }
	}

	function query (){//initial query to find all of the students and their respective status
		    require_once "config.php";
			$failed = "Nothing found";//if nothing is found in the table
			$table = Array();//array to hold the results of the query
			$query = "UPDATE Student Set studentstatus='Waiting for Recommendation' Where studentstatus='Submitted'";
			mysql_query($query)
			or die('Error querying database');
			$query = "UPDATE Student, Recommendation Set Student.studentstatus='Waiting for Transcript' Where Student.studentid=Recommendation.studentid and Recommendation.Content>''
						and Student.studentstatus<>'Accepted' and Student.studentstatus<>'Rejected'and Student.studentstatus<>'Application has been Reviewed' and
						Student.studentstatus<>'Waiting for Review'";
			mysql_query($query)
			or die('Error querying database');
			$query = "UPDATE Student, Applications Set Student.studentstatus='Application has been Reviewed' where Student.studentid=Applications.studentid
						and Applications.reviewsug>'' and Student.studentstatus<>'Accepted' and Student.studentstatus<>'Rejected'";
			mysql_query($query)
			or die('Error querying database');
	        $query = "SELECT studentid, firstname, lastname, studentstatus FROM Student Where studentstatus!='Waiting for Recommendation'";//we take the name, status, and id (used to match students)
	        $result = mysql_query($query)
	        or die('Error querying database.');
	        while($row = mysql_fetch_row($result)){
	        	array_push($table, $row);//add each student to the array
	        }
	        if(is_null($result)){
	        	return $failed;
	        }else{
	        	return $table;
	        }
	}
	function update_query($update){//query to update the students
		foreach($update as $std=>$status){//go through each student and update their current status, pulls every student so not time efficent but easier coding
			require_once "config.php";
			if($status=="Waiting for Review"){
		        $query = "UPDATE Student, Recommendation SET Student.studentstatus='$status' WHERE Student.studentid=$std and Student.studentid=Recommendation.studentid and Recommendation.Content>''";//set studentstatus to the new status if the id's match
		       	mysql_query($query)
		    	or die('Error querying database.');
	    	}else if($status=="Accepted" | $status=="Rejected"){
	    		$query = "UPDATE Student, Applications SET Student.studentstatus='$status' WHERE Student.studentid=$std and Student.studentid=Applications.studentid and Applications.reviewsug>''";
	    		mysql_query($query)
		    	or die('Error querying database.');
	    	}else{
	    	}
	    }
	}
?>
<head>
	<?php if ($_SESSION["login_GA"] == "true") :?>
	<body class="body">
		<div id="header">
			GA Page
		<div id="main">
			<form name="search_status" action="ga_page.php" method="get">
				<input type="text" name="search_name" value="Search For a Name">
				<input type="submit" Value="Search">
			</form>
			<form name="status_update" action="ga_page.php" method="post"><!--form that is used to submit status alterations-->
				<?php
					$students = query();
					if(!empty($_GET["search_name"])){
						$search = single_query($_GET["search_name"]);
						?>
						<div style="overflow-y:scroll; height:200px">
						<?php
						foreach($search as $std => $value){
						?>
							<div id="select">
								<?php echo ($value[1]." ".$value[2]." is ");?>
								<select name="<?php print $value[0];?>">
									<option><?php print $value[3]; ?></option>
									<option>Waiting for Review</option>
									<option>Accepted</option>
									<option>Rejected</option>
								</select></br>
							</div>
							<?php
						}
						?></div><?php
					}else{
						?>
						<div style="overflow-y:scroll; height:200px">
						<?php
						foreach($students as $std => $value){
						?>
						<div id="select">
							<?php echo ($value[1]." ".$value[2]." is ");?>
							<select name="<?php print $value[0];?>">
								<option><?php print $value[3]; ?></option>
								<option>Waiting for Review</option>
								<option>Accepted</option>
								<option>Rejected</option>
							</select></br>
						</div>
						<?php
						}
						?></div><?php
					}
				?>
				<p>To see Student Reviews <a href="galist.php">click here.</a><br/><br/>
				<input type="submit" Value="Submit">
			</form>
		</div>
	</body>
<?php else : ?>
	<script>
		window.location = "login.php"
	</script>
<?php endif ?>
</head>