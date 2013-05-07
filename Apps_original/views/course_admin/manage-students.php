<?php
	include_once '../../header.php'; 
	global $tp_user;
	$students_and_courses = get_all_students_info();
?>
<div id="manage-students">
	<?php
		foreach( $students_and_courses as $student_id => $statuses ){
			$student_info = get_student_info( $student_id );
			echo '<div class="student-info">';
			echo '<h4>' . $student_info['fname'] . ' ' . $student_info['lname'] . '</h4>';

			if( count( $statuses ) < 1 ) {
				echo '<p>No classes yet.</p>';
				echo '<hr />';
				continue;
			}

			foreach( $statuses as $status_name => $status ) {
				if( $status_name == 'removed' ) 
					continue;

				echo '<h5>' . ucwords( $status_name ) . '</h5>';
				echo '<form action="" method=POST>';

				foreach( $status as $course ) {
					echo '<ul class="no-list-style">';
					echo '<li><input type="checkbox" class="margin-minus-three" name="course_to_delete[]" value="' . $course['course_id'] . '-' . $course['semester'] . '-' . $course['year'] . '" /> ' . $course['title']. ' - ' . $course['year'] . ' - ' . $course['semester'] . ' - ' . get_course_grade( $course['course_id'], $student_id ) . '</li>';
					echo '</ul>';
					generate_grade_dropdown();
				}
				if( count($status) < 1 )
					echo 'No classes yet.';
				else {
					echo '<p><input type="submit" value="Delete Course(s)" name="delete_courses" />';
					echo '<input type="submit" value="Change Grade(s)" name="change_grades" /></p>';
				}
				echo '<input type="hidden" value="' . $course['user_id'] . '" name="user_id" />';
				echo '</form>';
			}
			echo '</div>';
			echo '<hr />';
		}
	?>
</div>

<?php include_once SITE_DIR . 'footer.php'; ?>