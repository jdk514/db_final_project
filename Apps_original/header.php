<?php
session_start();

//session_destroy();
include_once 'tp-configure.php';
include_once 'standard/tp-error.php';
include_once 'standard/tp-query.php';
include_once 'standard/tp-site-options.php';
include_once 'standard/tp-user.php';
include_once 'standard/tp-course-management.php';
include_once 'standard/tp-schedule-classes.php';
include_once 'standard/tp-utility-functions.php';
include_once 'standard/tp-teacher-functions.php';
include_once 'admin/tp-admin.php';
?>


<html>
	<head>
		<?php echo '<script type="text/javascript">var site_abs = "' . SITE_ABS . '";</script>'; ?>
		<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
		<script src="<?php echo SITE_ABS; ?>js/class-schedule.js"></script>
		<script src="<?php echo SITE_ABS; ?>js/class-management.js"></script>
		<link rel="stylesheet" type="text/css" href="<?php echo SITE_ABS; ?>css/bootstrap.min.css" />
		<link rel="stylesheet" type="text/css" href="<?php echo SITE_ABS; ?>css/main.css?<?php echo time(); ?>" />

	</head>
	
	<body>
		<div id="wrapper" class="shadow cf">
			<div id="header">
				<h1><a href="<?php echo SITE_ABS; ?>">Graduate Application</a></h1>
			</div>

			<ul id="header-navigation" class="cf">
				<li><a href="../index.php">Home</a></li>
				<?php
					global $pagenow;
				if( $pagenow != 'index.php' && is_user_logged_in() ) {
					show_user_top_links();
				}
				?>
			</ul>
			