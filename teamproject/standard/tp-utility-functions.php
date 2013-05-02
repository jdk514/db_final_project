<?php
function get_semester_name( $semester_num ) {
	switch( $semester_num ) {
		case 1:
			return "Spring";
		break;
		case 2: 
			return "Summer";
		break;
		case 3:
			return "Fall";
		break;
	}
}

function get_gpa( $user_id ) {
	global $tp_query, $tp_user;

	$user_id = $tp_user->uid;

/*	$query = "SELECT tid FROM tp_transcript WHERE user_id = $user_id";
	$tid = $tp_query->query( $query );
	$tid = $tid[0]['tid'];*/

	$query = "SELECT course_grade FROM tp_transcript_courses WHERE user_id = $user_id";
	$gpas = $tp_query->query( $query );

	$total = 0;
	foreach( $gpas as $gpa ) {
		$total += $gpa['course_grade'];
	}

	return ($total / count($gpas));

}

function get_transcript_courses_taken( $user_id ) {
	global $tp_query;

	/*$query = "SELECT tid FROM tp_transcript WHERE user_id = $user_id; ";
	$tid = $tp_query->query( $query );
	$tid = $tid[0]['tid'];*/

	$query_for_courses = "SELECT course_id, course_grade FROM tp_transcript_courses WHERE user_id = $user_id;";
	$course_ids = $tp_query->query( $query_for_courses );
	$courses = array();

	foreach( $course_ids as $course_id ) {
		$course_id_value = $course_id['course_id'];
		$query = "SELECT title,semester,credits,year FROM tp_course WHERE cid = $course_id_value; ";
		$course_info = $tp_query->query( $query );
		$course_info = $course_info[0];
		$course_info['grade'] = $course_id['course_grade'];

		$courses[] = $course_info;
	}
	return $courses;
}

function get_courses_taken( $user_id ){
	global $tp_query;

	$query = "SELECT tp_course.title FROM tp_transcript_courses, tp_course WHERE tp_transcript_courses.user_id = $user_id AND tp_transcript_courses.course_id = tp_course.cid";

	return $tp_query->query( $query );

}