<html>
<head>
	GA Login Page
</head>
<body>
	<?php if(!isnull($_POST["login"])): ?>
	<form method:POST Action:GA.php name:"login">
		<textfield>Username</textfield> <textfield>Password</textfield>
	</form>

	<?php else: ?>
	<form method:Post Action:Update.php>
		<?php
		foreach($results -> $field=>$value){
			echo("Applicant <?php $results[name]?> status of <dropdown><?php $results[status]?></dropdown>");
		?>
	</form>
	<?php endif ?>
</body>