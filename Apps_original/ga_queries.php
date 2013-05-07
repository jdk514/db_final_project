<?php
include 'header.php';
session_start();

	function sort_search(){
		if($_GET["query_type"]=='Statistics'){
			return Statistics_query();
		}else if($_GET["query_type"]=='Applicants'){
			return Applicants_query();
		}else{
			return Admitted_query();
		}
	}

	function Statistics_query(){
		$search_param=$_GET["search_name"];
		$failed="Nothing Found";
		require_once "config.php";
		$table = Array();//array to hold the results of the query
		$query = "SELECT studentstatus, COUNT(*) AS app_stat, AVG(Transcript.gre) AS avg_gre FROM Student, Applications, Transcript WHERE Student.studentid = Applications.studentid AND Transcript.studentid = Student.studentid GROUP BY studentstatus";
		$result = mysql_query($query)
	        or die('Error querying database.');
	    $prin='';
	    while($row = mysql_fetch_row($result)){
	    	$prin.='<p>'.$row[1].' Application(s) are(is) under the category '.$row[0].', with an average GRE of '.$row[2].'</p>';
	    }
	    if(is_null($result)){
	    	return $failed;
	    }else{
	    	return $prin;
	    }
	}

	function Admitted_query(){
		$search_param=$_GET["search_name"];
		$failed="Nothing Found";
		require_once "config.php";
		$table = Array();//array to hold the results of the query
		$query = "SELECT Student.studentid, firstname, lastname, studentstatus, Applications.pd, Applications.desdate, Applications.subdate FROM Student, Applications WHERE Student.studentid = Applications.studentid AND Student.studentstatus='You have been Admitted'";
		$result = mysql_query($query)
	        or die('Error querying database.');
	    while($row = mysql_fetch_row($result)){
			if($row[4]==$search_param or $row[5]==$search_param or substr($row[6], 0, 4)==$search_param){
	    		array_push($table, $row);//add each student to the array
	    	}
	    }
	    $prin = '';
	    foreach($table as $std => $value){
			$prin.='<p>'.$value[0].' '.$value[1].' '.$value[2].' '.$value[3].'</p>';
		}
	    if(is_null($result)){
	    	return $failed;
	    }else{
	    	return $prin;
	    }
	}

	function Applicants_query(){
		$search_param=$_GET["search_name"];
		$failed="Nothing Found";
		require_once "config.php";
		$table = Array();//array to hold the results of the query
		$query = "SELECT Student.studentid, firstname, lastname, studentstatus, Applications.pd, Applications.desdate, Applications.subdate FROM Student, Applications WHERE Student.studentid = Applications.studentid";
		$result = mysql_query($query)
	        or die('Error querying database.');
        while($row = mysql_fetch_row($result)){
			if($row[4]==$search_param or $row[5]==$search_param or substr($row[6], 0, 4)==$search_param){
        		array_push($table, $row);//add each student to the array
        	}
        }
	    $prin = '';
	    foreach($table as $std => $value){
			$prin.='<p>'.$value[0].' '.$value[1].' '.$value[2].' '.$value[3].'</p>';
		}
	    if($prin==''){
	    	return $failed;
	    }else{
	    	return $prin;
	    }
	}
?>
	<div id="main">
		<div id="content">
			<?php if ($_SESSION["login_GA"] == "true") :?>
				<div style="text-align:center">
					<h4>GA Queries Page</h4>
				<div>
					<form name="search_status" action="ga_queries.php" method="get">
						Statistics <input style="margin: 0 15px 0 0" type="radio" name="query_type" value="Statistics">
						Applicants <input style="margin: 0 15px 0 0" type="radio" name="query_type" value="Applicants">
						Admitted <input style="margin: 0 15px 0 0" type="radio" name="query_type" value="Admitted"></br></br>
						<input type="text" name="search_name" value="Enter Query">
						<input type="submit" Value="Search">
					</form>
					<form name="status_update" action="ga_queries.php" method="post"><!--form that is used to submit status alterations-->
						<?php
							if(!empty($_GET["search_name"])){
								$search = sort_search();
								?>
								<div style="overflow-y:scroll; height:200px">
								<?php
									print_r($search);
								?></div><?php
							}?>
					</form>
				</div>
				<a href="ga_page.php">Go Back to GS Page</a>
		<?php else : ?>
			<script>
				window.location = "login.php"
			</script>
		<?php endif ?>
			</div>
		</div>
<?php include 'footer.php'; ?>
