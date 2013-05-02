<?php
	include_once '../../header.php'; 
	global $tp_user;
	$courses_teaching = get_courses_teaching( $tp_user->uid );
?>
<div id="manage-class">
	<form action="" method="POST" >
	<?php foreach( $courses_teaching as $course ) {
		echo '<h3>' . $course['course_name']['title'] . '</h3>';

		if( empty( $course['students' ] ) )
			echo 'No students in class.';
		
		foreach( $course['students'] as $student ) {
			echo '<p class="single-student">';
			echo '<h4>' . $student['fname'] . ' ' . $student['lname'] . '</h4>';
			generate_grade_dropdown(true);
			echo '<input type="hidden" value="' . $student['uid'] . '" name="student_user_id[]" />';
			echo '<input type="hidden" value="' . $course['course_id'] . '" name="student_course_id[]" />';
			echo '<br />';
			echo '</p>';
		}
	} 
	echo '<p style="margin-top:20px"><input type="submit" value="Submit Grade(s)" name="submit_grades" /></p>';
	?>
	</form>
</div>

<?php include_once SITE_DIR . 'footer.php'; ?>