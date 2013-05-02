<?php

/** Schedule/Classes functions **/

function get_classes( $args = array() ) {
	global $tp_query;

	$defaults = array (
		'semester' => '',
		'credits' => '',
		'status' => '',
		'day' => '',
		'class_time' => '',
		'year' => '',
		'dept_name' => '',
	);
	$args = array_merge( $defaults, $args );

	$query = 'SELECT * FROM tp_course, tp_course_dept WHERE tp_course.course_num = tp_course_dept.cdid';

	foreach( $args as $arg => $value ) {
		if( !empty($value) )
			$query .= ' AND ' . $arg . ' LIKE \'%' . $value .'%\' ';

	} 
	$query .= ';';

	return $tp_query->query( $query );
}

function get_classes_in_dept_by_year_sem( $year, $sem ) {
	global $tp_query;

	$query = "SELECT dept_name, dept_full_name, COUNT(title) FROM tp_course_dept, tp_course WHERE tp_course.course_num = tp_course_dept.cdid AND semester = $sem AND year = $year GROUP BY dept_name;";
	return $tp_query->query( $query );
}

function get_department_names() {
	global $tp_query;

	$query = 'SELECT dept_name, COUNT(dept_name), dept_full_name FROM tp_course_dept GROUP BY dept_name;';
	$departments = $tp_query->query( $query );
	$departments_clean = array();
	foreach( $departments as $department_info ){
		if( count( $department_info ) > 0)
			$departments_clean[array_shift( $department_info )] = array(array_shift( $department_info ), array_shift( $department_info ) );
	}

	return $departments_clean;
}

function get_prereqs( $course_id ) {
	global $tp_query;

	$query = "SELECT * FROM tp_course WHERE cid = ANY( SELECT prereq_id FROM tp_course_has_prereqs WHERE tp_course_has_prereqs.course_id = $course_id );";
	return $tp_query->query( $query );
}

function get_semesters_years() {
	global $tp_query;

	$query = "SELECT DISTINCT semester,year FROM tp_course;";
	$sems_and_years = $tp_query->query( $query );
	$organize_sem_by_year = array();
	foreach( $sems_and_years as $sem_year ) {
		if( !array_key_exists( $sem_year['year'], $organize_sem_by_year ) )
			$organize_sem_by_year[$sem_year['year']] = array( $sem_year['semester'] );
		else {
			$temp_year = $organize_sem_by_year[$sem_year['year']];
			$temp_year[] = $sem_year['semester'];
			$organize_sem_by_year[$sem_year['year']] = $temp_year;
		}
	}

	return $organize_sem_by_year;
}

function schedule_dir() {
	return SITE_ABS . 'views/schedule/';	
}
