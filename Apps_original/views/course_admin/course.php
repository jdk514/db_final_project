<?php
	include_once '../../header.php'; 
	global $tp_user;
	if( isset( $_GET['course_id'] ) && isset( $_GET['student_search'] ) )
		$students = get_students_in_course( $_GET['course_id'], $_GET['search_for_student'] );
	else
		$students = get_students_in_course( $_GET['course_id'] );

	if( !is_teaching_course( $tp_user->uid, $_GET['course_id'] ) ):
		echo 'Not teaching course.';
	else:
?>

<div class="buffer">
	<form action="" method="GET" >
		<div style="float:right">
			<input type="text" name="search_for_student" /> <br />
			<input type="hidden" value="<?php echo $_GET['course_id']; ?>" name="course_id" />
			<input type="submit" name="student_search" value="Search for Student">
		</div>
	</form>
	<form action="" method="POST" >
		<?php
			if( empty( $students[0]['students' ] ) ):
				echo 'No students in class.';
			else:
				foreach( $students[0]['students'] as $student ) {
					echo '<p class="single-student">';
					echo '<h4>' . $student['fname'] . ' ' . $student['lname'] . '</h4>';
					generate_grade_dropdown(true);
					echo '<input type="hidden" value="' . $student['uid'] . '_' . $students[0]['course_id'] . '" name="student_course_ids[]" />';
					echo '<br />';
					echo '</p>';
				}
				echo '<p style="margin-top:20px"><input type="submit" value="Submit Grade(s)" name="submit_grades" /></p>';
			endif;
		?>
	</form>
</div>

<?php 
endif;
include_once SITE_DIR . 'footer.php'; ?>