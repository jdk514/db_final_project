<html>
	<head>
		<link rel="stylesheet" type="text/css" href="teamproject/css/bootstrap.min.css" />
		<link rel="stylesheet" type="text/css" href="teamproject/css/main.css?<?php echo time(); ?>" />

	</head>
	
	<body>
		<div id="wrapper" class="shadow cf">
			<div id="header">
				<h1><a href="<?php echo SITE_ABS; ?>">Banner+++</a></h1>
			</div>
		<ul id="header-navigation" class="cf">
			<li>Home</li>
			<li><a href="./Apps_original/login.php">Student Application</a></li>
			<li><a href="./teamproject/">Student Registration</a></li>
			<li>Student Advising</li>
			<li><a href="./teamproject/standard/tp-setup.php?reset=all" style="color:red">Reset</a></li>
		</ul>

<?php include './teamproject/footer.php'; ?>