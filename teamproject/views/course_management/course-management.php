<?php include_once '../../header.php'; 
global $tp_user;
get_active_courses( $tp_user->uid );
$active_year = get_option('active_year');
$active_semester = get_semester_name( get_option('active_semester') );
?>

<div id="manage-courses">
	<h2>Manage Courses</h2>

	<h4><?php echo $active_semester . ' Semester - ' . $active_year; ?></h4>
	<?php 
		$active_courses = user_active_courses( $tp_user->uid );
		echo '<ul id="active-course-list">';
		foreach( $active_courses as $course ) {
			echo '<li id="active-course-id-' . $course['cid'] . '">' . $course['title'] . ' - ' . $course['class_time'] . ' - ' . $course['class_day'] . ' - </span><a href="#" class="remove-course">remove</a></li>'; 
		}
		echo '</ul>';
	?>

	<hr />

	<h4> Pending Courses</h4>
	<?php
		$pending_courses = user_pending_courses( $tp_user->uid );
		echo '<ul id="pending-course-list">';
		foreach( $pending_courses as $course ) {
			echo '<li id="pending-course-id-' . $course['cid'] . '">' . $course['title'] . ' - ' . $course['class_time'] . ' - ' . $course['class_day'] . ' - <a href="#" class="add-course">add</a><span> | </span><a href="#" class="remove-course">remove</a></li>';
		}
		echo '</ul>';
	?>
</div>

<?php include_once SITE_DIR . 'footer.php'; ?>