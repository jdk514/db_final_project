<div id="transcript-wrapper">

<?php 
//display gpa
//$gpa = get_gpa($user_id);

//display courses taken

$grade_value = array( 'A' => 4, 'A-' => 3.6, 'B+' => 3.3, 'B' => 3.0, 'B-' => 2.6, 'C+' => 2.3, 'C' => 2.0, 'D' => 1.5, 'F' => 0 );
$grades_total = array('total' => 0, 'value' => 0);

$courses_taken = get_transcript_courses_taken( $user_id );

$courses_by_year = array();

foreach( $courses_taken as $course ) {
	if( array_key_exists( $course['year'], $courses_by_year ) ) {
		$year = $courses_by_year[$course['year']];
		$year[] = $course;
		$courses_by_year[$course['year']] = $year;
	} else {
		$year = array($course);
		$courses_by_year[$course['year']] = $year;
	}
}

foreach( $courses_by_year as $year_num => $courses ) {
	echo '<h4>' . $year_num . '</h4>';
	echo '<ul>';
	foreach( $courses as $course ) {
		echo '<li class="single_course">';
		echo '<h4>' . $course['title'] . '</h4>';
		echo 'Semester: <strong> ' . $course['semester'] . '</strong><br />';
		echo 'Credits: <em>' . $course['credits'] . '</em><br />';
		echo 'Year: <em>' . $course['year'] . '</em><br />';
		echo 'Grade: ' . $course['grade']; 
		$grades_total['total'] += 1;
		$grades_total['value'] += $grade_value[$course['grade']];
		echo '</li>';
	}
	echo '</ul>';
}

echo '<h1>GPA: ' . $grades_total['value'] / $grades_total['total'] . '</h1>';

?>
</div>