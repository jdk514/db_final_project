<?php

if( isset( $_POST['submit_grades'] ) )
	make_course_transcript();

function get_courses_teaching( $uid ) {
	global $tp_query;

	$courses_and_students = array();
	$course_ids = $tp_query->query( "SELECT meta_val FROM tp_users_meta WHERE meta_key = 'teaching_course' AND user_id = $uid;" );

	foreach( $course_ids as $course_id ) {
		$course_id = $course_id['meta_val'];
		$course_name = $tp_query->query( "SELECT title FROM tp_course WHERE cid = $course_id; ");
		$course_info = array( 'course_id' => $course_id, 'course_name' => $course_name[0] );

		$course_id = (int)$course_id;
		$students_in_course = $tp_query->query( "SELECT user_id FROM tp_course_being_taken WHERE course_id = $course_id AND status <> 'transcript' ;" );

		$list_of_students = array();
		foreach( $students_in_course as $student_id ) {
			$student_id = $student_id['user_id'];
			$student = $tp_query->query( "SELECT fname,lname,uid FROM tp_users WHERE uid = $student_id;" );
			$list_of_students[] = $student[0];
		}
		$course_info['students'] = $list_of_students;
		$courses_and_students[] = $course_info;
	}
	return $courses_and_students;
}

function is_teaching_course( $uid, $cid ) {
	global $tp_query;

	$course_ids = $tp_query->query( "SELECT meta_val FROM tp_users_meta WHERE meta_key = 'teaching_course' AND user_id = $uid;" );

	foreach( $course_ids as $course_id ) {
		if( $cid == $course_id['meta_val'] )
			return true;
	}

	return false;
}

function get_students_in_course( $cid, $search = null ) {
	global $tp_query;

	$course_name = $tp_query->query( "SELECT title FROM tp_course WHERE cid = $cid; ");
	$course_info = array( 'course_id' => $cid, 'course_name' => $course_name[0] );

	if( !is_null( $search ) ) {
		$students_in_course = $tp_query->query( "SELECT DISTINCT user_id FROM tp_course_being_taken, tp_users WHERE course_id = 1 AND status <> 'transcript' AND tp_users.fname LIKE '%$search%' ");
	} else {
		$students_in_course = $tp_query->query( "SELECT user_id FROM tp_course_being_taken WHERE course_id = $cid AND status <> 'transcript';" );
	}

	$list_of_students = array();
	foreach( $students_in_course as $student_id ) {
		$student_id = $student_id['user_id'];
		$student = $tp_query->query( "SELECT fname,lname,uid FROM tp_users WHERE uid = $student_id;" );
		$list_of_students[] = $student[0];
	}
	$course_info['students'] = $list_of_students;
	$courses_and_students[] = $course_info;

	return $courses_and_students;
}

function make_course_transcript() {
	global $tp_query;

	$student_course_ids = $_POST['student_course_ids'];
	$grades = $_POST['course_grade'];

	$active_semester = get_option('active_semester');
	$active_year = get_option('active_year');

	$count = 0;
	foreach( $student_course_ids as $student_user_id ) {
		$student_course = explode( '_', $student_user_id );
		//var_dump($student_course);
		$student_id = $student_course[0];
		$course_id = $student_course[1];
		$grade = $grades[$count];

		if( $grade == "IP" )
			continue;

//		var_dump($course_id);

		
/*		$transcript_of_student = $tp_query->query( "SELECT tid FROM tp_transcript WHERE user_id = $user_id; ");
		$transcript_id_of_student = $transcript_of_student[0]['tid'];*/

		$tp_query->query( "INSERT INTO tp_transcript_courses(course_id, course_grade, course_semester, course_year, user_id) VALUES ($course_id,'$grade',$active_semester,$active_year,$student_id);" );

		//This will flip course to transcript

		$tp_query->query( "UPDATE tp_course_being_taken SET status = 'transcript' WHERE course_id = $course_id AND user_id = $student_id; ");

		$count++;
	}
}