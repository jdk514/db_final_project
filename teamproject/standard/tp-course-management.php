<?php

function generate_grade_dropdown( $course_active = false ) {
	$grades = array('A', 'A-', 'B+', 'B', 'B-', 'C+', 'C', 'D', 'F');
	?>
		<select name="course_grade">
		<?php if( $course_active == true ) { 
			echo '<option value="IP">IP</option>';
		} ?>
		<?php foreach( $grades as $grade ) {
			echo '<option value="';
			if( !is_null( $course_id ) ) { echo 'course_id_' . $course_id . '_'; } 
			echo $grade . '" >' . $grade . '</option>';
		} ?>
		</select>
	<?php
}

function get_course_grade( $course_id, $student_id ) {
	global $tp_query;

	$query = "SELECT status FROM tp_course_being_taken WHERE user_id = $student_id AND course_id = $course_id;";
	$course_grade = $tp_query->query( $query );
	if( empty( $course_grade[0] ) )
		return false;
	else if ( $course_grade[0]['status'] == 'active' )
		return 'IP';
	else {
/*		$query = "SELECT tid FROM tp_transcript WHERE user_id = $student_id;";
		$user_tid = $tp_query->query( $query );
		if( empty( $user_tid[0] ) )
			return false;
		else
			$user_tid = $user_tid[0]['tid'];
*/
		$query = "SELECT course_grade FROM tp_transcript_courses WHERE user_id = $stuent_id AND course_id = $course_id;";
		$course_grade = $tp_query->query( $query );
		if( empty( $course_grade[0] ) )
			return false;
		else
			return $course_grade[0]['course_grade'];
	}

}

function user_add_course(  $cid, $uid, $status ) {
	if( !isset( $cid ) && !isset( $uid ) )
		return false;

	if( user_has_course( $cid, $uid, 'pending' ) === 'pending' )
		return true;

	global $tp_query;

	$query = "INSERT INTO tp_course_being_taken(user_id, course_id, status) VALUES ( $uid, $cid, '$status' );";
	$query_info = $tp_query->query( $query );

	return $query_info;
}

function user_has_course( $cid, $uid, $status ) {
	if( !isset( $cid ) || !isset( $uid ) )
		return false;

	global $tp_query;

	$query = "SELECT cbtid, status FROM tp_course_being_taken WHERE user_id = $uid AND course_id = $cid AND status = '$status';";
	$has_course = $tp_query->query( $query );
	$has_course = $has_course[0];

	if( !empty( $has_course ) )
		return $has_course['status'];
	else
		return false;
}

function user_pending_courses( $uid ) {
	if( !isset( $uid ) )
		return false;

	global $tp_query;

	$query = "SELECT course_id FROM tp_course_being_taken WHERE user_id = $uid AND status = 'pending';";
	$pending_courses = array_values( $tp_query->query( $query ) );
	$pending_course_info = array();
	foreach( $pending_courses as $course_id ) {
		$course_id = $course_id['course_id'];
		$query = "SELECT * FROM tp_course WHERE cid = $course_id;";
		$course = $tp_query->query( $query );
		$course_info = $course[0];
		$pending_course_info[] = $course_info;
	}

	return $pending_course_info;
}

function user_active_courses( $uid ) {
	if( !isset( $uid ) )
		return false;

	global $tp_query;

	$query = "SELECT course_id FROM tp_course_being_taken WHERE user_id = $uid AND status = 'active';";
	$active_courses = array_values( $tp_query->query( $query ) );
	$active_course_info = array();
	foreach( $active_courses as $course_id ) {
		$course_id = $course_id['course_id'];
		$query = "SELECT * FROM tp_course WHERE cid = $course_id;";
		$course = $tp_query->query( $query );
		$course_info = $course[0];
		$active_course_info[] = $course_info;
	}

	return $active_course_info;

}

function move_course_from_pending_to_active( $cid, $uid ) {
	if( !isset( $uid ) || !isset( $cid ) )
		return false;

	global $tp_query;

	$query = "SELECT class_time, class_day FROM tp_course WHERE cid = $cid;";
	$class_to_add_time = $tp_query->query( $query );
	$class_to_add_time = $class_to_add_time[0];

	//All the active class times/days
	$query = "SELECT class_time, class_day FROM tp_course WHERE cid = ANY( SELECT course_id FROM tp_course_being_taken WHERE user_id = $uid AND status = 'active');";
	$classes_and_times = $tp_query->query( $query );

	$add_time = explode('-', $class_to_add_time['class_time']);
	$add_time_start = $add_time[0];
	if( strpos( $add_time[1], 'pm' ) !== false ) {
		$add_time_am_pm = 'p.m.';
		$add_time_end = str_replace( 'pm', '', $add_time[1] ) . ' ' . $add_time_am_pm;
	} else {
		$add_time_am_pm = 'a.m.';
		$add_time_end = str_replace( 'am', '', $add_time[1] ) . ' ' . $add_time_am_pm;
	}


	foreach( $classes_and_times as $class_time_day ) {
		$class_time = explode('-', $class_time_day['class_time']);
		$class_time_start = $class_time[0];

		if( strpos( $class_time[1], 'pm' ) !== false ) {
			$class_time_am_pm = 'p.m.';
			$class_time_am_pm_no_dots = 'pm';
			$class_time_start .= ' ' . $class_time_am_pm;
			
			$class_time_end = str_replace( 'pm', '', $class_time[1] );
			
			$class_time_end .= ' ' . $class_time_am_pm;

		} else {
			$class_time_am_pm = 'a.m.';
			$class_time_am_pm_no_dots = 'am';
			$class_time_start .= ' ' . $class_time_am_pm;
			
			$class_time_end = str_replace( 'pm', '', $class_time[1] );
			
			$class_time_end .= ' ' . $class_time_am_pm;
		}

		if( $add_time_am_pm != $class_time_am_pm )
			continue;

		//If the end time of a class is within the time of another class, not good
		if ( strtotime( $add_time_end ) >= strtotime( $class_time_start ) && strtotime( $add_time_end ) <= strtotime( $class_time_end ) )
			return array('error' => 'Time conflict on ' . $class_time_day['class_day'] . ' at ' . $class_time_day['class_time'] ); 

		//If the end time of a class is within the time of another class, not good
		if ( strtotime( $add_time_start ) >= strtotime( $class_time_start ) - (60*30) && strtotime( $add_time_start ) <= strtotime( $class_time_end ) + (60*30) )
			return array('error' => 'Time conflict on ' . $class_time_day['class_day'] . ' at ' . $class_time_day['class_time'] ); 

	}

	$query = "UPDATE tp_course_being_taken SET status = 'active' WHERE course_id = $cid AND user_id = $uid AND status = 'pending';";
	$tp_query->query( $query );

	return true;
}

function get_active_courses ( $uid ) {
	if( !isset( $uid ) )
		return false;

	global $tp_query;

	$query = "SELECT COUNT(*) FROM tp_course_being_taken WHERE status = 'active' AND user_id = $uid;";
	$num_courses_active = $tp_query->query( $query );
	$num_courses_active = $num_courses_active[0];

	return array_shift( $num_courses_active );

}

function student_has_prereqs( $student_id, $course_id ) {

	global $tp_query;

	$query = "SELECT * FROM tp_course WHERE cid = ANY( SELECT prereq_id FROM tp_course_has_prereqs WHERE tp_course_has_prereqs.course_id = $course_id );";
	$prereqs = $tp_query->query( $query );

	$no_prereqs = array();

	foreach( $prereqs as $prereq ) {
		$pre_id = $prereq['cid'];
		$query = "SELECT * FROM tp_transcript_courses WHERE user_id = $student_id AND course_id = $pre_id;";
		$course_taken = $tp_query->query( $query );
		if( empty( $course_taken ) ) {
			$no_prereqs[] = $pre_id;
		}
	}
	return $no_prereqs;
}

function move_course_to_removed( $cid, $uid ) {
	if( !isset( $uid ) || !isset( $cid ) )
		return false;

	global $tp_query;

	$query = "UPDATE tp_course_being_taken SET status = 'removed' WHERE course_id = $cid AND user_id = $uid;";
	$tp_query->query( $query );

	return true;

}