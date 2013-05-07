<?php
include 'header.php';
session_start();

?>
	<div id="main" style="background-image:none">
		<div id="content" style="width:880px">
			<div align="center">
				Reviewer Page, List of pending applications<br /><br />
				<form name="search_status" action="list.php" method="get">
					<input type="text" name="search" value="Input Search Here">
					<input type="submit" value="Search For An Application">
				</form>
				<?php
					if($_GET["search"]){
						?>
						<table border="1" style="width:600px; margin:0 17px 0 0">
						<td>Click To REVIEW</td>
						<td>Appcationid</td>
						<td>Applicant Name</td>
						<td>Degree Seeking</td>
						<td>GPA</td>
						<td>Desired Semester</td>
						<td>Application Submission Time</td>
						<td>Application status</td>
						<?php
						$name = preg_split('/\s/', $_GET["search"]);
						$first = $name[0];
						$last = $name[1];
						$search_term=$_GET["search"];
						require_once "config.php";
						mysql_query("SET NAMES 'utf8'");
						$query=$db->query("select * from Applications, Student WHERE Student.studentid=Applications.studentid AND (applicationid='$search_term' OR firstname='$first' OR lastname='$last' OR lastname='$first')  order by 'subdate'");
						while($r=$db->fetch_array($query)){
							echo "<tr>";
							echo "<td><a href='view.php?id=".$r["applicationid"]."'>REVIEW</a></td>";
							echo "<td>".$r["applicationid"]."</td>";
							echo "<td>".$r["firstname"]." ".$r["lastname"]."</td>";
							echo "<td>".$r["dsought"]."</td>";
							echo "<td>".$r["pgpa"]."</td>";
							echo "<td>".$r["desdate"]."</td>";
							echo "<td>".$r["subdate"]."</td>";
							echo "<td>".$r["astatus"]."</td>";
							echo "</tr>";
						}
					}
					?>
				</table>
				<hr>
				<div style="overflow-y:scroll; height:260px">
				<table border="1" style="width:600px">
				<td>Click To REVIEW</td>
				<td>Appcationid</td>
				<td>Degree Seeking</td>
				<td>GPA</td>
				<td>Desired Semester</td>
				<td>Application Submission Time</td>
				<td>Application status</td>
				<?php
					require_once "config.php";
					mysql_query("SET NAMES 'utf8'");
					$query=$db->query("select * from Applications order by 'subdate'");
						while($r=$db->fetch_array($query)){
						echo "<tr>";
						echo "<td><a href='view.php?id=".$r["applicationid"]."'>REVIEW</a></td>";
						echo "<td>".$r["applicationid"]."</td>";
						echo "<td>".$r["dsought"]."</td>";
						echo "<td>".$r["pgpa"]."</td>";
						echo "<td>".$r["desdate"]."</td>";
						echo "<td>".$r["subdate"]."</td>";
						echo "<td>".$r["astatus"]."</td>";
						echo "</tr>";
					}
				?>
				</table></br>
				</div></br>
				</div>
	</div>
</div>

<?php include 'footer.php'; ?>
