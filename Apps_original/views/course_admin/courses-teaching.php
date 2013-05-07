<?php
	include_once '../../header.php'; 
	global $tp_user;
	$courses_teaching = get_courses_teaching( $tp_user->uid );
?>
<div id="manage-class">
	<?php foreach( $courses_teaching as $course ) {
			echo '<h3><a href="./course.php?course_id=' . $course['course_id'] . '">' . $course['course_name']['title'] . '</a></h3>';
		}
	?>
</div>

<?php include_once SITE_DIR . 'footer.php'; ?>