<?php

include_once '../tp-configure.php';
include_once 'tp-error.php';
include_once 'tp-query.php';
include_once 'tp-site-options.php';
include_once 'tp-user.php';
include_once 'tp-course-management.php';
include_once 'tp-schedule-classes.php';


if( !isset( $_GET['func_to_call'] ) )
	return;

call_user_func( $_GET['func_to_call'] );

function add_class_to_user_bucket() {
	session_start();

	if( !isset( $_SESSION['user_login'] ) ) {
		die();
	}
	$course_added = user_add_course( $_GET['class_id'], $_SESSION['user_login'], 'pending' );
	echo "$course_added";
	session_write_close();
	die();
}

function ajax_add_class_from_pending_to_active() {
	session_start();

	if( !isset( $_SESSION['user_login'] ) ) {
		die();
	}

	global $tp_query;

	$number_of_active_courses = get_active_courses( $_SESSION['user_login'] );

	if( $number_of_active_courses >= 3 ) {
		echo 'Error: Too many courses. Please remove a course before adding a new one.';
		return;
		die();
	}

	$course_moved = move_course_from_pending_to_active( $_GET['class_id'], $_SESSION['user_login'] );
	
	if( is_array( $course_moved ) ) {
		echo 'Error: ' . $course_moved['error']; 
		die();
	}

	$course_id = $_GET['class_id'];
	$query = "SELECT * FROM tp_course WHERE cid = $course_id;";
	$course_info = $tp_query->query( $query );
	$course_info = $course_info[0];
	
	$course_html = '<li id="active-course-id-' . $course_info['cid'] . '">' . $course_info['title'] . ' - ' . $course_info['class_time'] . ' - ' . $course_info['class_day'] . ' - </span><a href="#" class="remove-course">remove</a></li>'; 
	echo "html: $course_html";

	session_write_close();
	die();
}

function ajax_move_class_to_removed() {

	session_start();

	if( !isset( $_SESSION['user_login'] ) ) {
		die();
	}

	$course_removed = move_course_to_removed( $_GET['class_id'], $_SESSION['user_login'] );
	echo "$course_removed";
	session_write_close();
	die();
}
