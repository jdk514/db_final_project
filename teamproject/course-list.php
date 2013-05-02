<?php
$departments = get_department_names();
echo '<div id="list-of-departments-wrapper">';
echo '<h3>List of departments</h3>';
echo '<ul id ="list-of-departments">';
foreach( $departments as $department_name => $dept_info ) {
	echo '<li><a href="/schedule.php?department=' . $department_name . '">' . $dept_info[1] . '</li>';
}
echo '</ul>';
echo '</div>';
?>