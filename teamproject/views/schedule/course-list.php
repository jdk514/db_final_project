<?php
include_once '../../header.php';

if( !isset( $_GET['year'] ) && !isset( $_GET['semester'] ) )
	return;

$departments = get_classes_in_dept_by_year_sem( $_GET['year'], $_GET['semester'] );

echo '<div id="list-of-departments-wrapper">';
echo '<p>For classes in semester <strong>' . $_GET['semester'] . '</strong> in <strong>' . $_GET['year'] . '</strong></p>';
echo '<h3>List of departments</h3>';
echo '<ul id ="list-of-departments">';
foreach( $departments as $department_name => $dept_info ) {
	echo '<li><a href="' . schedule_dir() . 'course-department.php?department=' . $dept_info['dept_name'] . '&year=' . $_GET['year'] . '&semester=' . $_GET['semester'] . '">' . $dept_info['dept_full_name'] . '</li>';
}	
echo '</ul>';
echo '</div>';

include_once SITE_DIR . 'footer.php';
?>