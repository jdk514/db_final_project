<?php
include 'header.php';
session_start();
?>
	<div id="main" style="background-image:none">
		<div id="content">
			<div align="center" style="width:940">
				Reviewer Page, List of pending applications<br /><br />
				<table border="1">
				<td><center>Click To See the <br> Recommendation From Reviewer</center></td>
				<td>Appcationid</td>
				<td>Degree Seeking</td>
				<td>GPA</td>
				<td>Desired Semester</td>
				<td>Application Submission Time</td>
				<td>Application status</td>
				<?php
					require_once "config.php";
					mysql_query("SET NAMES 'utf8'");
					$update="viewed";
					$query=$db->query("select * from Applications where astatus='".$update."' order by 'subdate' ");
						while($r=$db->fetch_array($query)){
						echo "<tr>";
						echo "<td><center><a href='gaview.php?id=".$r["applicationid"]."'>Click</a></center></td>";
						echo "<td>".$r["applicationid"]."</td>";
						echo "<td>".$r["dsought"]."</td>";
						echo "<td>".$r["pgpa"]."</td>";
						echo "<td>".$r["desdate"]."</td>";
						echo "<td>".$r["subdate"]."</td>";
						echo "<td>".$r["astatus"]."</td>";
						echo "</tr>";
					}
				?>
				</table>
				<p>Return to <a href="ga_page.php">GA Page</a></p>
		</div>
	</div>
</div>

<?php include 'footer.php'; ?>
