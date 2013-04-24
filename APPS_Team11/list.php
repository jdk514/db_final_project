<?php require_once "header.php"; ?>
	<div align="center">
	<a >Reviewer Page, List of pending applications</a><br /><br />
	<table border="1">
	<td><a>Click To REVIEW</a></td>
	<td><a>Appcationid</a></td>
	<td><a>Degree Seeking</a></td>
	<td><a>GPA</a></td>
	<td><a>Desired Semester</a></td>
	<td><a>Application Submission Time</a></td>
	<td><a>Application status</a></td>
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
	</table>
	</div>
