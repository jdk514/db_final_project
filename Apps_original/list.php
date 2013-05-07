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
						<td><a>Click To REVIEW</a></td>
						<td><a>Appcationid</a></td>
						<td><a>Degree Seeking</a></td>
						<td><a>GPA</a></td>
						<td><a>Desired Semester</a></td>
						<td><a>Application Submission Time</a></td>
						<td><a>Application status</a></td>
						<?php
						$search_term=$_GET["search"];
						require_once "config.php";
						mysql_query("SET NAMES 'utf8'");
						$query=$db->query("select * from Applications WHERE applicationid='$search_term' order by 'subdate'");
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
